<?php

class Layanan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_by_id($layanan_id)
    {
        return $this->db->select('*')
                        ->from('ref_layanan')
                        ->join('ref_detail_layanan_form', 'ref_layanan.layanan_id = ref_detail_layanan_form.detail_layanan_form_layanan_id')
                        ->join('ref_jenis_form', 'ref_detail_layanan_form.detail_layanan_form_jenis_form_id = ref_jenis_form.jenis_form_id')
                        ->where('ref_layanan.layanan_id', $layanan_id)
                        ->get()
                        ->result();
    }
}