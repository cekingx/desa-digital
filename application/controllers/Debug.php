<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Debug extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('pengajuan_model');
        // $this->load->model('layanan_model');
        // $this->load->model('data_masyarakat_model');
        $this->load->model('admin_desa_model');
    }

    public function index()
    {
        echo '<pre>';
        print_r(array(
            'post'      => $_POST,
            'session'   => $_SESSION,
            'files'     => $_FILES,
        ));
        echo '</pre>';
    }

    public function cmd()
    {
        $data = $this->admin_desa_model->get_kelurahan();

        var_dump($data);
    }

    public function generate_pass($pass)
    {
        echo password_hash($pass, PASSWORD_DEFAULT) . PHP_EOL;
    }
}