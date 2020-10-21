<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Custom_error extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function unauthorized()
    {
        $data['title'] = 'Unauthorized';
        $data['content'] = 'errors/error_403';

        $this->load->view('layouts/master_error', $data);
    }
}