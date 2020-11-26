<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajemen_pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Identitas_desa_model');
        $this->load->model('Desa/Manajemen_pengguna_model', 'manajemen_pengguna_model');
    }

    private function set_partial_data($content)
    {
        $data['content']        = $content;
        $data['identitas_desa'] = $this->Identitas_desa_model->get_by_id($this->session->userdata('wilayah_id'));
        $data['title']          = $data['identitas_desa']->NAMA_KEL;
        if(!empty($data['identitas_desa']->LOGO)) {
            $data['logo'] = base_url('storage/desa/') . $data['identitas_desa']->NAMA_KEL . '/logo' . '/' . $data['identitas_desa']->LOGO; 
        } 

        return $data;
    }

    public function ubah_password()
    {
        $data = $this->set_partial_data('backend/desa/manajemen_pengguna/ubah_password');
        $data['breadcrumbs'] = array(
            array(
                'url' => 'desa',
                'title' => 'Manajemen Pengguna'
            ),
            array(
                'url' => 'desa/manajemen-pengguna/ubah-password',
                'title' => 'Ubah Password'
            )
        );
        $this->load->view('layouts/master_desa', $data);
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

    public function masyarakat()
    {
        $data = $this->set_partial_data('backend/desa/manajemen_pengguna/masyarakat');
        $data['breadcrumbs'] = array(
            array(
                'url' => 'desa',
                'title' => 'Manajemen Pengguna'
            ),
            array(
                'url' => 'desa/manajemen-pengguna/masyarakat',
                'title' => 'Masyarakat'
            )
        );
        $this->load->view('layouts/master_desa', $data);
    }

    public function get_masyarakat()
    {
        $data_masyarakat = $this->manajemen_pengguna_model->get_masyarakat();

        $this->output->set_content_type('application/json');
        echo json_encode(array(
            'data' => $data_masyarakat
        ));
    }

    public function reset_password_masyarakat($user_id)
    {
        $data = $this->set_partial_data('backend/desa/manajemen_pengguna/reset_password_masyarakat');
        $data['breadcrumbs'] = array(
            array(
                'url' => 'desa',
                'title' => 'Manajemen Pengguna'
            )
        );
        $data['user'] = $this->manajemen_pengguna_model->get_masyarakat_by_id($user_id);
        $this->load->view('layouts/master_desa', $data);
    }

    public function store_reset_password_masyarakat()
    {
        $post       = $this->input->post();
        $nik        = $post['user_username'];
        $user_id    = $post['user_id'];
        if($this->manajemen_pengguna_model->is_nik_exist($nik) == FALSE) {
            $this->output->set_status_header(404, 'NIK Tidak Ditemukan');
            return;
        }

        $this->manajemen_pengguna_model->reset_password_masyarakat($user_id, $nik);
        echo 'Password berhasil direset';
        return;
    }

    private function compare_old_password($user_id, $old_password)
    {
        $data = $this->manajemen_pengguna_model->get_old_password($user_id);

        return password_verify($old_password, $data->user_password);
    }
}