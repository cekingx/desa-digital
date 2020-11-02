<?php

class Identitas_desa_model extends CI_Model
{
    public $desa;

    public function __construct()
    {
        parent::__construct();
        $wilayah_id = $this->session->userdata('wilayah_id');
        $this->desa = $this->db->select('*')
                            ->from('ref_wilayah') 
                            ->where('id', $wilayah_id)
                            ->get()
                            ->row();
    }

    public function get_by_id($wilayah_id)
    {
        return $this->db->get_where('ref_wilayah', array('id' => $wilayah_id))->row();
    }
}