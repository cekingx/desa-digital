<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Layanan_model');
        $this->load->model('Pengajuan_model');
        $this->load->model('Data_masyarakat_model');
        $this->load->model('Identitas_desa_model');
        $this->load->model('Ref_model');
    }

    private function set_partial_data($content)
    {
        $data['content']        = $content;
        $data['identitas_desa'] = $this->Identitas_desa_model->get_by_id($this->session->userdata('wilayah_id'));
        $data['title']          = $data['identitas_desa']->NAMA_KEL;
        if(!empty($data['identitas_desa']->LOGO)) {
            $data['logo'] = base_url('storage/desa/') . $data['identitas_desa']->NAMA_KEL . '/logo' . '/' . $data['identitas_desa']->LOGO; 
        } else {
            $data['logo'] = base_url('storage/desa/logo/') . 'default-logo.png';
        }

        return $data;
    }

    public function index()
    {
        $data                       = $this->set_partial_data('backend/desa/pengajuan/index');
        $data['layanan']            = $this->Pengajuan_model->get_all_layanan();
        $data['status_pengajuan']   = $this->Pengajuan_model->get_all_status_pengajuan();
        $data['breadcrumbs']        = array(
            array(
                'url'       => 'desa/pengajuan',
                'title'     => 'Pengajuan'
            ),
        );

        $this->load->view('layouts/master_desa', $data);
    }

    public function show($pengajuan_id)
    {
        $data                       = $this->set_partial_data('backend/desa/pengajuan/show');
        $data['pengajuan']          = $this->Pengajuan_model->get_pengajuan_by_id($pengajuan_id);
        $data['jenis_layanan']      = json_encode($this->Ref_model->get_jenis_layanan());
        $data['status_pengajuan']   = json_encode($this->Ref_model->get_status_pengajuan());
        $data['breadcrumbs']        = array(
            array(
                'url'       => 'desa/pengajuan',
                'title'     => 'Pengajuan'
            ),
            array(
                'url'       => 'desa/pengajuan/show/'. $pengajuan_id,
                'title'     => $data['pengajuan']['pengajuan']->layanan
            )
        );

        $this->load->view('layouts/master_desa', $data);
    }

    public function buat_pengajuan()
    {
        $data                   = $this->set_partial_data('backend/desa/pengajuan/buat-pengajuan');
        $data['breadcrumbs']    = array(
            array(
                'url'       => 'desa/pengajuan',
                'title'     => 'Pengajuan'
            ),
            array(
                'url'       => 'desa/pengajuan/buat-pengajuan/',
                'title'     => 'Buat Pengajuan'
            )
        );

        $this->load->view('layouts/master_desa', $data);
    }

    public function pilih_layanan()
    {
        if(empty($this->session->userdata('nik_pemohon'))) {
            return redirect('desa/pengajuan');
        }

        $data                   = $this->set_partial_data('backend/desa/pengajuan/pilih-layanan');
        $data['breadcrumbs']    = array(
            array(
                'url'       => 'desa/pengajuan',
                'title'     => 'Pengajuan'
            ),
            array(
                'url'       => 'desa/pengajuan/pilih-layanan/',
                'title'     => 'Pilih Layanan'
            )
        );

        $this->load->view('layouts/master_desa', $data);
    }
    
    public function get_data_masyarakat()
    {
        $post = $this->input->post();
        $nik = $post['nik'];
        $data = $this->Data_masyarakat_model->get_by_nik($nik);

        if(empty($data)) {
            $this->output->set_status_header(404);
            $this->output->set_content_type('application/json');
            echo json_encode(array(
                'msg' => 'Not Found'
            ));
            return;
        }

        $this->output->set_content_type('application/json');
        echo json_encode($data);
    }

    public function get_pengajuan()
    {
        $data = $this->Pengajuan_model->get_all();

        $this->output->set_content_type('application/json');
        echo json_encode(array(
            'data' => $data
        ));
    }

    public function set_nik_to_session()
    {
        $post = $this->input->post();
        $nik = $post['nik'];
        
        $this->session->set_userdata(array(
            'nik_pemohon' => $nik
        ));

        echo json_encode(array(
            'msg' => 'Success'
        ));
    }
}