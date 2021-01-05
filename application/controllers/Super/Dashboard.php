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
        $data['title'] = 'Dashboard Super';
        $data['content'] = 'backend/super/dashboard';
        $data['breadcrumbs'] = array(
            array(
                'url' => 'super',
                'title' => 'Dashboard'
            ),
        );

        $this->load->view('layouts/master', $data);
    }
}