<?php

class Data_masyarakat_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_by_nik($nik)
    {
        return $this->db->select('*')
                        ->from('dat_masyarakat')
                        ->where('nik', $nik)
                        ->get()
                        ->row();
    }
}