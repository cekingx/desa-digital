<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F101 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Identitas_desa_model');
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
        $data = $this->set_partial_data('backend/desa/f101/show');
        $data['f101'] = json_encode($this->F101_model->get_by_id($f101_id));

        $this->load->view('layouts/master_desa', $data);

        // echo $data['f101'];
    }

}