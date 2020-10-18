<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F101 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Identitas_desa_model');
        $this->load->model('Data_masyarakat_model');
        $this->load->model('F101_model');
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
        $data = $this->set_partial_data('backend/desa/f101/index');

        $this->load->view('layouts/master_desa', $data);
    }

    public function get_f101()
    {
        $data_f101 = $this->F101_model->get_all();

        $this->output->set_content_type('application/json');
        echo json_encode(array(
            'data' => $data_f101
        ));
    }

    public function show($f101_id)
    {
        $data                       = $this->set_partial_data('backend/desa/f101/show');
        $data['f101']               = json_encode($this->F101_model->get_by_id($f101_id));
        $data['gelar']              = json_encode($this->Data_masyarakat_model->get_all_gelar());
        $data['kelamin']            = json_encode($this->Data_masyarakat_model->get_all_kelamin());
        $data['kelainan']           = json_encode($this->Data_masyarakat_model->get_all_kelainan());
        $data['goldar']             = json_encode($this->Data_masyarakat_model->get_all_goldar());
        $data['agama']              = json_encode($this->Data_masyarakat_model->get_all_agama());
        $data['cacat']              = json_encode($this->Data_masyarakat_model->get_all_cacat());
        $data['status_kawin']       = json_encode($this->Data_masyarakat_model->get_all_kawin());
        $data['hubkel']             = json_encode($this->Data_masyarakat_model->get_all_hubkel());
        $data['pendidikan']         = json_encode($this->Data_masyarakat_model->get_all_pendidikan());
        $data['pekerjaan']          = json_encode($this->Data_masyarakat_model->get_all_pekerjaan());
        $data['akta_cerai']         = json_encode($this->Data_masyarakat_model->get_all_kepemilikan_akta_cerai());
        $data['akta_perkawinan']    = json_encode($this->Data_masyarakat_model->get_all_kepemilikan_akta_perkawinan());
        $data['akta_lahir']         = json_encode($this->Data_masyarakat_model->get_all_kepemilikan_akta_lahir());

        $this->load->view('layouts/master_desa', $data);

        // echo $data['f101'];
    }

}