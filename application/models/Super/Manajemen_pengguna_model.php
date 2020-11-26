<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajemen_pengguna_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
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

    public function reset_password($user_id)
    {
        $data = array(
            'user_password' => password_hash(DEFAULT_USER_PASS, PASSWORD_DEFAULT)
        );

        $this->db->where('user_id', $user_id)
                ->update('ref_user', $data);
    }

    public function get_admin_desa_by_id($user_id)
    {
        return $this->db->select('ref_user.*, ref_wilayah.*')
                        ->from('ref_user')
                        ->join('ref_wilayah', 'ref_user.user_wilayah_id=ref_wilayah.id')
                        ->where('user_id', $user_id)
                        ->get()
                        ->row();
    }

    public function get_admin_capil_by_id($user_id)
    {
        return $this->db->select('*')
                        ->from('ref_user')
                        ->where('user_id', $user_id)
                        ->where('user_wilayah_id', NULL)
                        ->get()
                        ->row();
    }
}