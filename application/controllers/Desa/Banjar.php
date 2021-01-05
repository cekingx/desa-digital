<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banjar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('banjar_model');
        $this->load->model('identitas_desa_model');
        $this->load->helper('check_login_helper');
        check_login($this->session);
    }

    public function banjar_data()
    {
        $data = $this->banjar_model->getAll();

        echo json_encode($data);
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

        $this->load->view('layouts/master_desa', $data);
    }
    
    public function create()
    {
        $data['content'] = 'backend/desa/banjar/create';
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

        $banjar = $this->banjar_model;
        $banjar->save($wilayah_id);
        echo json_encode('success');
    }

    public function edit($banjar_id)
    {
        $data['banjar'] = $this->banjar_model->get_by_id($banjar_id);
        $data['content'] = 'backend/desa/banjar/edit';
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
        $banjar_id = $post['banjar_id'];
        $banjar = $this->banjar_model;

        $banjar->update($banjar_id);
        echo json_encode('success');
    }

    public function delete($banjar_id)
    {
        $this->banjar_model->get_by_id($banjar_id);
        $this->banjar_model->delete($banjar_id);
        echo json_encode('success');
    }
}