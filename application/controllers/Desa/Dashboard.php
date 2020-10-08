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
        $data['title'] = 'Dashboard Desa';
        $data['content'] = 'backend/desa/dashboard';

        $this->load->view('layouts/master_desa', $data);
    }
}