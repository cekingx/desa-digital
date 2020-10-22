<?php

class Admin_desa_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_kelurahan()
    {
        $kecamatan = $this->db->distinct()
                            ->select('NAMA_KEC')
                            ->from('ref_wilayah')
                            ->get()
                            ->result_array();

        foreach($kecamatan as $kecamatan) {
            $array_kelurahan = [];

            $kelurahan = $this->db->select('id, NAMA_KEL')
                                ->from('ref_wilayah')
                                ->where('NAMA_KEC', $kecamatan['NAMA_KEC'])
                                ->get()
                                ->result_array();

            foreach($kelurahan as $kelurahan) {
                $data_kelurahan['id']   = $kelurahan['id'];
                $data_kelurahan['nama'] = $kelurahan['NAMA_KEL'];
                array_push($array_kelurahan, $data_kelurahan);
            }

            $wilayah[$kecamatan['NAMA_KEC']] = $array_kelurahan;
        }

        return $wilayah;
    }

    public function get_all()
    {
        $admin_desa = $this->db->select('
                                            ref_user.user_id, 
                                            ref_user.user_username, 
                                            ref_user.user_nama,
                                            ref_wilayah.NAMA_KEL
                                        ')
                            ->from('ref_user')
                            ->join('ref_wilayah', 'ref_user.user_wilayah_id = ref_wilayah.id')
                            ->where('user_user_role_id', 3)
                            ->get()
                            ->result();

        return $admin_desa;
    }

    public function save($data)
    {
        $user['user_username'] = $data['user_username'];
        $user['user_wilayah_id'] = $data['user_wilayah_id'];
        $user['user_password'] = password_hash('defaultpass', PASSWORD_DEFAULT);
        $user['user_nama'] = $data['user_nama'];
        $user['user_foto'] = 'default.jpg';
        $user['user_user_role_id'] = 3;

        $this->db->insert('ref_user', $user);
    }
}
