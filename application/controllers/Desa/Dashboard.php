<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('identitas_desa_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['content'] = 'backend/desa/dashboard';
        $data['logo'] = base_url('storage/desa/logo/') . 'default-logo.png';

        $this->load->view('layouts/master_desa', $data);
    }
}