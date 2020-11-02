<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengumuman_model');
        $this->load->model('identitas_desa_model');
    }

    public function pengumuman_data()
    {
        $data = $this->pengumuman_model->getAll();
        echo json_encode($data);
    }

    public function index()
    {
        $data['content'] = 'backend/desa/pengumuman/index';
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
        $data['content'] = 'backend/desa/pengumuman/create';
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

        $pengumuman = $this->pengumuman_model;
        $pengumuman->save($wilayah_id);
        echo json_encode('success');
    }

    public function edit($pengumuman_id)
    {
        $data['pengumuman'] = $this->pengumuman_model->get_by_id($pengumuman_id);
        $data['content'] = 'backend/desa/pengumuman/edit';
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
        $pengumuman_id = $post['pengumuman_id'];
        $pengumuman = $this->pengumuman_model;

        $pengumuman->update($pengumuman_id);
        echo json_encode('success');
    }

    public function delete($pengumuman_id)
    {
        $this->pengumuman_model->get_by_id($pengumuman_id);
        $this->pengumuman_model->delete($pengumuman_id);
        echo json_encode('success');
    }
    
    public function show($pengumuman_id)
    {
        $data['identitas_desa'] = $this->identitas_desa_model->get_by_id($this->session->userdata('wilayah_id'));
        if(!empty($data['identitas_desa']->LOGO)) {
            $data['logo'] = base_url('storage/desa/') . $data['identitas_desa']->NAMA_KEL . '/logo' . '/' . $data['identitas_desa']->LOGO; 
        } else {
            $data['logo'] = base_url('storage/desa/logo/') . 'default-logo.png';
        }

        $data['pengumuman'] = $this->pengumuman_model->get_by_id($pengumuman_id);
        if (empty($data['pengumuman'])) {
            show_404();
        }

        $data['content'] = 'backend/desa/pengumuman/show';
        $data['title'] = $data['pengumuman']->pengumuman_judul;
        $this->load->view('layouts/master_desa', $data);
    }
}