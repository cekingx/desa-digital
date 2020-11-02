<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Identitas_desa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('Umum/Identitas_desa_model', 'identitas_desa_model');
    }

    public function index()
    {
        $data['identitas_desa'] = $this->identitas_desa_model->get_by_id($this->session->userdata('wilayah_id'));
        $data['title'] = $data['identitas_desa']->NAMA_KEL;
        $data['content'] = 'backend/umum/identitas_desa/index';

        $this->load->view('layouts/master_umum', $data);
        // echo json_encode($data['identitas_desa']);
    }

    public function kades_index()
    {
        $data['identitas_desa'] = $this->identitas_desa_model->get_by_id($this->session->userdata('wilayah_id'));
        $data['title'] = 'Kades ' . $data['identitas_desa']->NAMA_KEL;
        $data['content'] = 'backend/umum/identitas_desa/kades_index';

        $this->load->view('layouts/master_umum', $data);
    }

    public function sekdes_index()
    {
        $data['identitas_desa'] = $this->identitas_desa_model->get_by_id($this->session->userdata('wilayah_id'));
        $data['title'] = 'SEKDES ' . $data['identitas_desa']->NAMA_KEL;
        $data['content'] = 'backend/umum/identitas_desa/sekdes_index';

        $this->load->view('layouts/master_umum', $data);
    }
}