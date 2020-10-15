<?php

class Ref_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_jenis_layanan()
    {
        return $this->db->select('*')
                        ->from('ref_layanan')
                        ->get()
                        ->result();
    }

    public function get_status_pengajuan()
    {
        return $this->db->select('*')
                        ->from('ref_status_pengajuan')
                        ->get()
                        ->result();
    }
}