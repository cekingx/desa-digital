<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajemen_pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Super/Manajemen_pengguna_model', 'manajemen_pengguna_model');
        $this->load->helper('check_login_helper');
        check_login($this->session);
    }

    public function ubah_password()
    {
        $data['title']          = 'Ubah Password';
        $data['content']        = 'backend/super/manajemen_pengguna/ubah_password';
        $data['breadcrumbs']    = array(
            array(
                'url'   => 'super',
                'title' => 'Dashboard'
            ),
            array(
                'url'   => 'super/manajemen-pengguna/ubah-password',
                'title' => 'Ubah Password'
            )
        );

        $this->load->view('layouts/master', $data);
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

    public function reset_password_admin_desa($user_id)
    {
        $data['title']          = 'Reset Password';
        $data['content']        = 'backend/super/manajemen_pengguna/reset_password_admin_desa';
        $data['breadcrumbs']    = array(
            array(
                'url'   => 'super/admin-desa/',
                'title' => 'Admin Desa'
            ),
            array(
                'url'   => 'super/admin-desa/reset-password/' . $user_id,
                'title' => 'Reset Password'
            )
        );
        $data['user'] = $this->manajemen_pengguna_model->get_admin_desa_by_id($user_id);

        $this->load->view('layouts/master', $data);
    }

    public function store_reset_password_admin_desa()
    {
        $post       = $this->input->post();
        $user_id    = $post['user_id'];

        $this->manajemen_pengguna_model->reset_password($user_id);
        $this->output->set_status_header(200);
        echo 'Password berhasil di reset';
        return;
    }

    public function reset_password_admin_capil($user_id)
    {
        $data['title']          = 'Reset Password';
        $data['content']        = 'backend/super/manajemen_pengguna/reset_password_admin_capil';
        $data['breadcrumbs']    = array(
            array(
                'url'   => 'super/admin-capil/',
                'title' => 'Admin Capil'
            ),
            array(
                'url'   => 'super/admin-capil/reset-password/' . $user_id,
                'title' => 'Reset Password'
            )
        );
        $data['user'] = $this->manajemen_pengguna_model->get_admin_capil_by_id($user_id);

        $this->load->view('layouts/master', $data);
    }

    public function store_reset_password_admin_capil()
    {
        $post       = $this->input->post();
        $user_id    = $post['user_id'];

        $this->manajemen_pengguna_model->reset_password($user_id);
        $this->output->set_status_header(200);
        echo 'Password berhasil di reset';
        return;
    }

    private function compare_old_password($user_id, $old_password)
    {
        $data = $this->manajemen_pengguna_model->get_old_password($user_id);

        return password_verify($old_password, $data->user_password);
    }
}