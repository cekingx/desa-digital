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

    public function get_all_kepemilikan_akta_cerai()
    {
        return $this->db_masyarakat->select('*')
                                ->from('ref_akta_cerai')
                                ->get()
                                ->result();
    }

    public function get_all_kepemilikan_akta_perkawinan()
    {
        return $this->db_masyarakat->select('*')
                                ->from('ref_akta_perkawinan')
                                ->get()
                                ->result();
    }

    public function get_all_kepemilikan_akta_lahir()
    {
        return $this->db_masyarakat->select('*')
                                ->from('ref_akta_lahir')
                                ->get()
                                ->result();
    }

    public function get_all_gelar()
    {
        return $this->db_masyarakat->select('*')
                                ->from('ref_gelar')
                                ->get()
                                ->result();
    }

    public function get_all_agama()
    {
        return $this->db_masyarakat->select('*')
                                ->from('ref_agama')
                                ->get()
                                ->result();
    }

    public function get_all_cacat()
    {
        return $this->db_masyarakat->select('*')
                                ->from('ref_cacat')
                                ->order_by('id', 'ASC')
                                ->get()
                                ->result();
    }

    public function get_all_goldar()
    {
        return $this->db_masyarakat->select('*')
                                ->from('ref_goldar')
                                ->get()
                                ->result();
    }

    public function get_all_hubkel()
    {
        return $this->db_masyarakat->select('*')
                                ->from('ref_hubkel')
                                ->get()
                                ->result();
    }

    public function get_all_kawin()
    {
        return $this->db_masyarakat->select('*')
                                ->from('ref_kawin')
                                ->get()
                                ->result();
    }

    public function get_all_kelainan()
    {
        return $this->db_masyarakat->select('*')
                                ->from('ref_kelainan')
                                ->get()
                                ->result();
    }

    public function get_all_kelamin()
    {
        return $this->db_masyarakat->select('*')
                                ->from('ref_kelamin')
                                ->get()
                                ->result();
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