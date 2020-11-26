<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajemen_pengguna_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db_masyarakat = $this->load->database('data_masyarakat', TRUE);
    }

    public function get_old_password($user_id)
    {
        return $this->db->select('user_password')
                        ->from('ref_user')
                        ->where('user_id', $user_id)
                        ->get()
                        ->row();
    }

    public function ubah_password($user_id, $new_password)
    {
        $data = array(
            'user_password' => password_hash($new_password, PASSWORD_DEFAULT)
        );

        $this->db->where('user_id', $user_id)
                ->update('ref_user', $data);
    }

    public function get_masyarakat()
    {
        $wilayah_id = $this->session->userdata('wilayah_id');

        return $this->db->select('*')
                        ->from('ref_user')
                        ->where('user_wilayah_id', $wilayah_id)
                        ->where('user_user_role_id', 4)
                        ->get()
                        ->result();
    }

    public function get_masyarakat_by_id($user_id)
    {
        return $this->db->select('*')
                        ->from('ref_user')
                        ->where('user_id', $user_id)
                        ->get()
                        ->row();
    }

    public function reset_password_masyarakat($user_id, $nik)
    {
        if($this->cek_nik_ektp($nik) != FALSE) {
            $no_kk = $this->cek_nik_ektp($nik)->NO_KK_EKTP;
            $this->ubah_password($user_id, $no_kk);
        } else if($this->cek_nik($nik) != FALSE) {
            $no_kk = $this->cek_nik($nik)->NO_KK;
            $this->ubah_password($user_id, $no_kk);
        } 
    }

    public function is_nik_exist($nik)
    {
        if($this->cek_nik_ektp($nik) != FALSE) {
            return TRUE;
        } else if($this->cek_nik($nik) != FALSE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    private function cek_nik_ektp($nik)
    {
        $data_masyarakat = $this->db_masyarakat->select('NO_KK_EKTP')
                                                ->from('dat_masyarakat')
                                                ->where('NIK_EKTP', $nik)
                                                ->get()
                                                ->row();
        if(!empty($data_masyarakat)) {
            return $data_masyarakat;
        } else {
            return FALSE;
        }
    }

    private function cek_nik($nik)
    {
        $data_masyarakat = $this->db_masyarakat->select('NO_KK')
                                                ->from('dat_masyarakat')
                                                ->where('NIK', $nik)
                                                ->get()
                                                ->row();
        if(!empty($data_masyarakat)) {
            return $data_masyarakat;
        } else {
            return FALSE;
        }
    }
}