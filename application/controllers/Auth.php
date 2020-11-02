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
        if (empty($this->session->userdata('user_id'))) {
            $data['title'] = 'Login | Desa Digital';
            $data['content'] = 'auth/login';

            $this->load->view('layouts/master_auth', $data);
        } else if($this->session->userdata('user_role_id') == 1) {
            redirect('/super');
        } else if($this->session->userdata('user_role_id') == 2) {
            redirect('/capil');
        } else if($this->session->userdata('user_role_id') == 3) {
            redirect('/desa');
        } else if($this->session->userdata('user_role_id') == 4) {
            redirect('/umum');
        } else {
            redirect('/');
        }
    }

    public function login()
    {
        $post = $this->input->post();
        $username = $post['username'];
        $password = $post['password'];

        if($this->authentication->login($username, $password)) {
            echo json_encode(array(
                'status'        => true,
                'user_role_id'  => $this->session->userdata('user_role_id')
            ));
        } else {
            echo json_encode(array(
                'status' => false
            ));
        }
    }

    public function logout()
    {
        $this->authentication->logout();
        redirect('login');
    }
}
