<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (empty($this->session->userdata('kode_wilayah'))) {
            $data['title'] = 'Login | Desa Digital';
            $data['content'] = 'auth/login';

            $this->load->view('layouts/master_auth', $data);
        } else {
            redirect('/');
        }
    }

    public function login()
    {
        $this->session->set_userdata(array(
            'wilayah_id'    => '66',
        ));

        echo json_encode(array('msg' => 'success'));
    }

    public function logout()
    {
        $this->session->unset_userdata('wilayah_id');
        redirect('login');
    }
}
