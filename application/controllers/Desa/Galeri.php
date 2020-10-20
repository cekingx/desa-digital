<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('galeri_model');
        // $this->load->model('detail_galeri_model');
        $this->load->model('identitas_desa_model');
    }

    public function galeri_data()
    {
        $data = $this->galeri_model->get_all();

        echo json_encode($data);
    }

    public function index()
    {
        $data['content'] = 'backend/desa/galeri/index';
        $data['identitas_desa'] = $this->identitas_desa_model->get_by_id($this->session->userdata('wilayah_id'));
        if(!empty($data['identitas_desa']->LOGO)) {
            $data['logo'] = base_url('storage/desa/') . $data['identitas_desa']->NAMA_KEL . '/logo' . '/' . $data['identitas_desa']->LOGO; 
        } else {
            $data['logo'] = base_url('storage/desa/logo/') . 'default-logo.png';
        }

        $this->load->view('layouts/master_desa', $data);
    }
    
    public function create()
    {
        $data['content'] = 'backend/desa/galeri/create';
        $data['identitas_desa'] = $this->identitas_desa_model->get_by_id($this->session->userdata('wilayah_id'));
        if(!empty($data['identitas_desa']->LOGO)) {
            $data['logo'] = base_url('storage/desa/') . $data['identitas_desa']->NAMA_KEL . '/logo' . '/' . $data['identitas_desa']->LOGO; 
        } else {
            $data['logo'] = base_url('storage/desa/logo/') . 'default-logo.png';
        }

        $this->load->view('layouts/master_desa', $data);
    }

    public function store()
    {
        $wilayah_id = $this->session->userdata('wilayah_id');

        $this->galeri_model->save($wilayah_id);
        $this->detail_galeri_model->save($wilayah_id);

        echo json_encode('success');
    }

    public function edit($galeri_id)
    {
        $data['galeri'] = $this->galeri_model->get_by_id($galeri_id);
        $data['content'] = 'backend/desa/galeri/edit';
        $data['identitas_desa'] = $this->identitas_desa_model->get_by_id($this->session->userdata('wilayah_id'));
        if(!empty($data['identitas_desa']->LOGO)) {
            $data['logo'] = base_url('storage/desa/') . $data['identitas_desa']->NAMA_KEL . '/logo' . '/' . $data['identitas_desa']->LOGO; 
        } else {
            $data['logo'] = base_url('storage/desa/logo/') . 'default-logo.png';
        }
        
        $this->load->view('layouts/master_desa', $data);
    }

    public function update()
    {
        $post = $this->input->post();
		$galeri_id = $post['galeri_id'];
        $galeri = $this->galeri_model;

		$galeri->update($galeri_id);
        echo json_encode('success');
    }

    public function delete($galeri_id)
    {
        $this->galeri_model->get_by_id($galeri_id);
        $this->galeri_model->delete($galeri_id);
        echo json_encode('success');
    }

    public function show($galeri_id)
    {
        $data['identitas_desa'] = $this->identitas_desa_model->get_by_id($this->session->userdata('wilayah_id'));
        if(!empty($data['identitas_desa']->LOGO)) {
            $data['logo'] = base_url('storage/desa/') . $data['identitas_desa']->NAMA_KEL . '/logo' . '/' . $data['identitas_desa']->LOGO; 
        } else {
            $data['logo'] = base_url('storage/desa/logo/') . 'default-logo.png';
        }

        $data['galeri'] = $this->galeri_model->get_by_id($galeri_id);
        if (empty($data['galeri'])) {
            show_404();
        }

        $data['content'] = 'backend/desa/galeri/show';
        $data['title'] = $data['galeri']->galeri_judul;
        $this->load->view('layouts/master_desa', $data);
    }
}