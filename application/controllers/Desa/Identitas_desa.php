<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Identitas_desa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('identitas_desa_model');
        $this->load->helper('check_login_helper');
        check_login($this->session);
    }

    public function index()
    {
        $data['identitas_desa'] = $this->identitas_desa_model->get_by_id($this->session->userdata('wilayah_id'));
        $data['title'] = $data['identitas_desa']->NAMA_KEL;
        $data['content'] = 'backend/desa/identitas_desa/index';
        if(!empty($data['identitas_desa']->LOGO)) {
            $data['logo'] = base_url('storage/desa/') . $data['identitas_desa']->NAMA_KEL . '/logo' . '/' . $data['identitas_desa']->LOGO; 
        } 

        $this->load->view('layouts/master_desa', $data);
        // echo json_encode($data['identitas_desa']);
    }

    public function edit()
    {
        $data['identitas_desa'] = $this->identitas_desa_model->get_by_id($this->session->userdata('wilayah_id'));
        $data['title'] = 'Edit Identitas ' . $data['identitas_desa']->NAMA_KEL;
        $data['content'] = 'backend/desa/identitas_desa/edit';
        if(!empty($data['identitas_desa']->LOGO)) {
            $data['logo'] = base_url('storage/desa/') . $data['identitas_desa']->NAMA_KEL . '/logo' . '/' . $data['identitas_desa']->LOGO; 
        } 

        $this->load->view('layouts/master_desa', $data);
    }

    public function update()
    {
        $wilayah_id = $this->session->userdata('wilayah_id');
        $this->identitas_desa_model->update($wilayah_id);

        return redirect('/desa/identitas-desa');
    }

    public function kades_index()
    {
        $data['identitas_desa'] = $this->identitas_desa_model->get_by_id($this->session->userdata('wilayah_id'));
        $data['title'] = 'Kades ' . $data['identitas_desa']->NAMA_KEL;
        $data['content'] = 'backend/desa/identitas_desa/kades_index';
        if(!empty($data['identitas_desa']->LOGO)) {
            $data['logo'] = base_url('storage/desa/') . $data['identitas_desa']->NAMA_KEL . '/logo' . '/' . $data['identitas_desa']->LOGO; 
        } 

        $this->load->view('layouts/master_desa', $data);
    }

    public function kades_edit()
    {
        $data['identitas_desa'] = $this->identitas_desa_model->get_by_id($this->session->userdata('wilayah_id'));
        $data['title'] = 'Edit Kades ' . $data['identitas_desa']->NAMA_KEL;
        $data['content'] = 'backend/desa/identitas_desa/kades_edit';
        if(!empty($data['identitas_desa']->LOGO)) {
            $data['logo'] = base_url('storage/desa/') . $data['identitas_desa']->NAMA_KEL . '/logo' . '/' . $data['identitas_desa']->LOGO; 
        } 

        $this->load->view('layouts/master_desa', $data);
    }

    public function kades_update()
    {
        $wilayah_id = $this->session->userdata('wilayah_id');
        $this->identitas_desa_model->update_kades($wilayah_id);

        redirect('desa/identitas-desa/kades');
    }

    public function sekdes_index()
    {
        $data['identitas_desa'] = $this->identitas_desa_model->get_by_id($this->session->userdata('wilayah_id'));
        $data['title'] = 'SEKDES ' . $data['identitas_desa']->NAMA_KEL;
        $data['content'] = 'backend/desa/identitas_desa/sekdes_index';
        if(!empty($data['identitas_desa']->LOGO)) {
            $data['logo'] = base_url('storage/desa/') . $data['identitas_desa']->NAMA_KEL . '/logo' . '/' . $data['identitas_desa']->LOGO; 
        } 

        $this->load->view('layouts/master_desa', $data);
    }

    public function sekdes_edit()
    {
        $data['identitas_desa'] = $this->identitas_desa_model->get_by_id($this->session->userdata('wilayah_id'));
        $data['title'] = 'Edit Kades ' . $data['identitas_desa']->NAMA_KEL;
        $data['content'] = 'backend/desa/identitas_desa/sekdes_edit';
        if(!empty($data['identitas_desa']->LOGO)) {
            $data['logo'] = base_url('storage/desa/') . $data['identitas_desa']->NAMA_KEL . '/logo' . '/' . $data['identitas_desa']->LOGO; 
        } 

        $this->load->view('layouts/master_desa', $data);
    }

    public function sekdes_update()
    {
        $wilayah_id = $this->session->userdata('wilayah_id');
        $this->identitas_desa_model->update_sekdes($wilayah_id);

        redirect('desa/identitas-desa/sekdes');
    }
}