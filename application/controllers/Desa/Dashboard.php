<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Identitas_desa_model');
        $this->load->helper('authorization_helper');
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
        $data = $this->set_partial_data('backend/desa/dashboard');
        $data['breadcrumbs'] = array(
            array(
                'url' => 'desa',
                'title' => 'Dashboard'
            ),
        );

        $this->load->view('layouts/master_desa', $data);
    }
}