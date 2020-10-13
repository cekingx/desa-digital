<?php

class Data_masyarakat_model extends CI_Model
{
    private $db_masyarakat;

    public function __construct()
    {
        parent::__construct();
        $this->db_masyarakat = $this->load->database('data_masyarakat', TRUE);
    }

    public function get_by_nik($nik)
    {
        return $this->db_masyarakat->select('*')
                                ->from('dat_masyarakat')
                                ->where('nik', $nik)
                                ->get()
                                ->row();
    }

    public function get_all_pekerjaan()
    {
        return $this->db_masyarakat->select('*')
                                ->from('ref_pekerjaan')
                                ->get()
                                ->result();
    }

    public function get_all_pendidikan()
    {
        return $this->db_masyarakat->select('*')
                                ->from('ref_pendidikan')
                                ->where('pendidikan IS NOT NULL')
                                ->get()
                                ->result();
    }
}