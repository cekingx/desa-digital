<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_desa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Super/Admin_desa_model', 'admin_desa_model');
    }

    public function index()
    {
        $data['title'] = 'Admin Desa';
        $data['content'] = 'backend/super/admin_desa/index';
        $data['breadcrumbs'] = array(
            array(
                'url' => 'super',
                'title' => 'Super'
            ),
            array(
                'url' => 'super/admin-desa',
                'title' => 'Admin Desa'
            ),
        );

        $this->load->view('layouts/master', $data);
    }

    public function create()
    {
        $data['title'] = 'Buat Admin Desa';
        $data['content'] = 'backend/super/admin_desa/create';
        $data['wilayah'] = $this->admin_desa_model->get_kelurahan();
        $data['breadcrumbs'] = array(
            array(
                'url' => 'super',
                'title' => 'Super'
            ),
            array(
                'url' => 'super/admin-desa',
                'title' => 'Admin Desa'
            ),
            array(
                'url' => 'super/admin-desa/create',
                'title' => 'Buat Admin'
            )
        );

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
        $data['user_wilayah_id'] = $post['user_wilayah_id'];
        $this->admin_desa_model->save($data);
        
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

    public function get_admin_desa()
    {
        $admin_desa = $this->admin_desa_model->get_all();

        $this->output->set_content_type('application/json');
        echo json_encode($admin_desa);
    }
}