<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('check_login_helper');
        check_login($this->session);
    }

    public function index()
    {
        $data['title'] = 'Dashboard Capil';
        $data['content'] = 'backend/capil/dashboard';
        $data['breadcrumbs'] = array(
            array(
                'url' => 'capil',
                'title' => 'Dashboard'
            ),
        );
        
        $this->load->view('layouts/master_capil', $data);
    }
}