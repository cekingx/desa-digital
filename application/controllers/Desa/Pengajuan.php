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
    }

    public function index()
    {
        $data['content'] = 'backend/desa/pengajuan/index';
        $data['identitas_desa'] = $this->Identitas_desa_model->get_by_id($this->session->userdata('wilayah_id'));
        $data['title'] = $data['identitas_desa']->NAMA_KEL;
        if(!empty($data['identitas_desa']->LOGO)) {
            $data['logo'] = base_url('storage/desa/') . $data['identitas_desa']->NAMA_KEL . '/logo' . '/' . $data['identitas_desa']->LOGO; 
        } else {
            $data['logo'] = base_url('storage/desa/logo/') . 'default-logo.png';
        }

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