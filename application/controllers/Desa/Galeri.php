<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller
{
	public function __construct()
	{
        parent::__construct();
        $this->load->model('identitas_desa_model');
		$this->load->model('detail_galeri_model');
        $this->load->model('galeri_model');
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		$data['content'] = 'backend/desa/banjar/index';
        $data['identitas_desa'] = $this->identitas_desa_model->get_by_id($this->session->userdata('wilayah_id'));
        if(!empty($data['identitas_desa']->LOGO)) {
            $data['logo'] = base_url('storage/desa/') . $data['identitas_desa']->NAMA_KEL . '/logo' . '/' . $data['identitas_desa']->LOGO; 
        } else {
            $data['logo'] = base_url('storage/desa/logo/') . 'default-logo.png';
		}
		
		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }

        $data['content'] = 'backend/desa/galeri/index';
		$this->load->view('layouts/master_desa', $data);
		
	}

	public function show($id)
	{
		$data['content'] = 'backend/desa/banjar/index';
        $data['identitas_desa'] = $this->identitas_desa_model->get_by_id($this->session->userdata('wilayah_id'));
        if(!empty($data['identitas_desa']->LOGO)) {
            $data['logo'] = base_url('storage/desa/') . $data['identitas_desa']->NAMA_KEL . '/logo' . '/' . $data['identitas_desa']->LOGO; 
        } else {
            $data['logo'] = base_url('storage/desa/logo/') . 'default-logo.png';
		}
		
		$data['galeri'] = $this->galeri_model->getById($id);		
        if (empty($data['galeri'])) {
            show_404();
        }
        $data['content'] = 'backend/desa/galeri/show';
        $data['title'] = $data['galeri']->galeri_judul;
        // echo json_encode($data);
        $this->load->view('layouts/master_desa', $data);
	}

	//index data galeri
	public function galeri_data()
	{
		$data = $this->galeri_model->getAll();
		echo json_encode($data);
	}

	public function detail_galeri_data($id)
	{
		$data = $this->detail_galeri_model->getAll($id);
		echo json_encode($data);
	}

	//menampilkan halaman create galeri
	public function create()
	{
		$data['content'] = 'backend/desa/banjar/index';
        $data['identitas_desa'] = $this->identitas_desa_model->get_by_id($this->session->userdata('wilayah_id'));
        if(!empty($data['identitas_desa']->LOGO)) {
            $data['logo'] = base_url('storage/desa/') . $data['identitas_desa']->NAMA_KEL . '/logo' . '/' . $data['identitas_desa']->LOGO; 
        } else {
            $data['logo'] = base_url('storage/desa/logo/') . 'default-logo.png';
		}
		
		$data['content'] = 'backend/desa/galeri/create';		
		$this->load->view('layouts/master_desa', $data);
		echo json_encode(array(
            'msg' => 'Success'
        ));
	}	

	//store galeri include gambar dan link video
	public function store()
	{
		$wilayah_id = $this->session->userdata('wilayah_id');

		$galeri = $this->galeri_model;
		$detail_galeri = $this->detail_galeri_model;		
		$validation = $this->form_validation;
		$validation->set_rules($galeri->rules());		 	
		if ($validation->run() == false) {
			$data = [
				'judul' => form_error('judul'),
				'deskripsi' => form_error('deskripsi')											
			];
			echo json_encode($data);
		
			
		} else {
			print_r('testing');
			$galeri->save($wilayah_id);
			$galeri_id = $this->db->insert_id($galeri);
			$slug_galeri = $galeri->galeri_slug;						
			$detail_galeri->save($galeri_id, $slug_galeri);									
			$data_galeri = [
				'galeri' => $galeri,
				'detail_galeri'=> $detail_galeri,
				'slug' => $slug_galeri
			];
			echo json_encode($data_galeri);
					
		}
		
	}

	//menampilkan halaman edit galeri
	public function edit($id)
	{
		$data['content'] = 'backend/desa/banjar/index';
        $data['identitas_desa'] = $this->identitas_desa_model->get_by_id($this->session->userdata('wilayah_id'));
        if(!empty($data['identitas_desa']->LOGO)) {
            $data['logo'] = base_url('storage/desa/') . $data['identitas_desa']->NAMA_KEL . '/logo' . '/' . $data['identitas_desa']->LOGO; 
        } else {
            $data['logo'] = base_url('storage/desa/logo/') . 'default-logo.png';
		}
		
		$galeri = $this->galeri_model;	
		$data['content'] = 'backend/desa/galeri/edit';
		$data['galeri'] = $galeri->getById($id);				
		if(!$data['galeri']) show_404();

		$this->load->view('layouts/master_desa', $data);
	}

	//edit hanya galeri tidak medianya
	public function update()
	{
		$galeri = $this->galeri_model;	
		$detail_galeri = $this->detail_galeri_model;	
		$validation = $this->form_validation;
		$validation->set_rules($galeri->rules());

		if ($validation->run()) {
			$galeri->update();						

			echo json_encode($galeri);			
		}			
	}

	//hapus galeri sekaligus media
	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		$this->galeri_model->delete($id);
		$this->detail_galeri_model->deleteAll($id);
		$this->session->set_flashdata('hapus', 'Data Berhasil di Hapus');			
		
		echo json_encode($this);		
	}

	//input data/store media berdasarkan id galeri
	public function store_media($id, $slug)
	{
		$detail_galeri = $this->detail_galeri_model;		
		$validation = $this->form_validation;			
		
		$detail_galeri->save($id, $slug);	

		echo json_encode($detail_galeri);
	}

	//delete media berdasarkan id galeri
	public function delete_media($galeri_id, $detail_galeri_id)
	{
		if (!isset($id)) show_404();

		$data["galeri"] = $this->galeri_model->getById($galeri_id);
		$data["detail_galeri"] = $this->detail_galeri_model->getAll($detail_galeri_id);		

		if (empty($data["detail_galeri"])) {

			$this->session->set_flashdata('hapus', 'Data Media Tidak Tersedia');
			redirect(site_url('backend/desa/galeri'));
		}

		$this->detail_galeri_model->delete($id);
		$this->session->set_flashdata('hapus', 'Data Berhasil di Hapus');				
		
		echo json_encode($data);
	}	
	
}