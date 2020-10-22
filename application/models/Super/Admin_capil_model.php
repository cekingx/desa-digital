<?php

class Admin_capil_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        $admin_capil = $this->db->select('
                                            ref_user.user_id, 
                                            ref_user.user_username, 
                                            ref_user.user_nama,
                                        ')
                            ->from('ref_user')
                            ->where('user_user_role_id', 2)
                            ->get()
                            ->result();

        return $admin_capil;
    }

    public function save($data)
    {
        $user['user_username']      = $data['user_username'];
        $user['user_password']      = password_hash('defaultpass', PASSWORD_DEFAULT);
        $user['user_nama']          = $data['user_nama'];
        $user['user_foto']          = 'default.jpg';
        $user['user_user_role_id']  = 2;

        $this->db->insert('ref_user', $user);
    }
}
