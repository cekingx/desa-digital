<?php

class F101_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        return $this->db->select('*')
                        ->from('ta_f101')
                        ->get()
                        ->result();
    }

    public function get_by_id($f101_id)
    {
        $data_f101 = $this->db->select('*')
                        ->from('ta_f101')
                        ->where('f101_id', $f101_id)
                        ->get()
                        ->row();

        $data_detail_f101 = $this->db->select('ta_detail_f101.*')
                                    ->from('ta_detail_f101')
                                    ->join('ta_f101', 'ta_detail_f101.detail_f101_f101_id = ta_f101.f101_id')
                                    ->where('ta_detail_f101.detail_f101_f101_id', $f101_id)
                                    ->get()
                                    ->result();

        return array(
            'f101'          => $data_f101,
            'detail_f101'   => $data_detail_f101
        );
    }
}