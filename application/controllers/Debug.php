<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Debug extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('pengajuan_model');
        // $this->load->model('layanan_model');
        $this->load->model('data_masyarakat_model');
    }

    public function index()
    {
        echo json_encode(array(
            'post' => $_POST,
            'session' => $_SESSION,
            'files' => $_FILES
        ));
    }

    public function cmd()
    {
        $data = $this->data_masyarakat_model->get_by_nik('5104036403820002');

        var_dump($data);
    }
}