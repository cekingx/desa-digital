<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_capil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Super/Admin_capil_model', 'admin_capil_model');
    }

    public function index()
    {
        $data['title'] = 'Admin Capil';
        $data['content'] = 'backend/super/admin_capil/index';

        $this->load->view('layouts/master', $data);
    }

    public function create()
    {
        $data['title'] = 'Buat Admin Capil';
        $data['content'] = 'backend/super/admin_capil/create';

        $this->load->view('layouts/master', $data);
    }

    public function show($user_id)
    {

    }

    public function store()
    {
        $post = $this->input->post();
        $data['user_username'] = $post['user_username'];
        $data['user_nama'] = $post['user_nama'];
        $this->admin_capil_model->save($data);
        
        echo json_encode(array(
            'msg' => 'Success'
        ));
    }

    public function reset_password()
    {

    }

    public function delete()
    {

    }

    public function get_admin_capil()
    {
        $admin_capil = $this->admin_capil_model->get_all();

        $this->output->set_content_type('application/json');
        echo json_encode($admin_capil);
    }
}