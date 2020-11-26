<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajemen_pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Umum/Manajemen_pengguna_model', 'manajemen_pengguna_model');
    }

    public function ubah_password()
    {
        $data['title']          = 'Ubah Password';
        $data['content']        = 'backend/umum/manajemen_pengguna/ubah_password';
        $data['breadcrumbs']    = array(
            array(
                'url'   => 'umum',
                'title' => 'Dashboard'
            ),
            array(
                'url'   => 'umum/manajemen-pengguna/ubah-password',
                'title' => 'Ubah Password'
            )
        );

        $this->load->view('layouts/master_umum', $data);
    }

    public function store_ubah_password()
    {
        $post           = $this->input->post();
        $user_id        = $this->session->userdata('user_id');
        $old_password   = $post['current_password'];
        $new_password   = $post['new_password'];

        if($this->compare_old_password($user_id, $old_password) == FALSE) {
            $this->output->set_status_header(406, 'Password anda salah');
            return;
        }

        $this->manajemen_pengguna_model->ubah_password($user_id, $new_password);
        $this->output->set_status_header(201);
        echo 'Password berhasil diubah';
        return;
    }

    private function compare_old_password($user_id, $old_password)
    {
        $data = $this->manajemen_pengguna_model->get_old_password($user_id);

        return password_verify($old_password, $data->user_password);
    }
}