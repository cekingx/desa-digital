<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_desa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_desa_model');
    }

    public function index()
    {
        $data['title'] = 'Admin Desa';
        $data['content'] = 'backend/super/admin_desa/index';

        $this->load->view('layouts/master', $data);
    }

    public function create()
    {
        $data['title'] = 'Buat Admin Desa';
        $data['content'] = 'backend/super/admin_desa/create';
        $data['wilayah'] = $this->Admin_desa_model->get_kelurahan();

        $this->load->view('layouts/master', $data);
    }

    public function show($user_id)
    {

    }

    public function store()
    {

    }

    public function reset_password()
    {

    }

    public function delete()
    {

    }

    public function get_admin_desa()
    {
        $admin_desa = $this->Admin_desa_model->get_all();

        $this->output->set_content_type('application/json');
        echo json_encode($admin_desa);
    }
}