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
}