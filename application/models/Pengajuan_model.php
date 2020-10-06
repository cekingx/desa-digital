<?php

class Pengajuan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        return $this->db->get('ta_pengajuan')
                        ->result();
    }

    public function get_pengajuan_by_nik($nik_pemohon)
    {
        return $this->db->select('*')
                        ->from('ta_pengajuan')
                        ->where('pengajuan_nik', $nik_pemohon)
                        ->get()
                        ->result();
    }

    public function get_pengajuan_form_by_nik($nik_pemohon)
    {
        return $this->db->select('*')
                        ->from('ta_pengajuan')
                        ->join('ta_detail_pengajuan_form', 'ta_pengajuan.pengajuan_id = ta_detail_pengajuan_form.detail_pengajuan_form_pengajuan_id')
                        ->where('ta_pengajuan.pengajuan_nik', $nik_pemohon)
                        ->get()
                        ->result();
    }

    public function get_pengajuan_lampiran_by_nik($nik_pemohon)
    {
        return $this->db->select('*')
                        ->from('ta_pengajuan')
                        ->join('ta_detail_pengajuan_lampiran', 'ta_pengajuan.pengajuan_id = ta_detail_pengajuan_lampiran.detail_pengajuan_lampiran_pengajuan_id')
                        ->where('ta_pengajuan.pengajuan_nik', $nik_pemohon)
                        ->get()
                        ->result();
    }

    /**
     * 
     * @param   array     $pengajuan      berisi wilayah_id dan nik
     * @param   array     $form           berisi id jenis form yang digunakan
     * @param   array     $lampiran       berisi nama lampiran yang digunakan 
     */
    public function set_pengajuan($pengajuan, $form, $lampiran)
    {
        $data_pengajuan['pengajuan_wilayah_id']             = $pengajuan['wilayah_id'];
        $data_pengajuan['pengajuan_nik']                    = $pengajuan['nik'];
        $data_pengajuan['pengajuan_status_pengajuan_id']    = 1;
        $data_pengajuan['pengajuan_jenis_layanan']          = $pengajuan['jenis_layanan']; 

        $this->db->insert('ta_pengajuan', $data_pengajuan);
        $pengajuan_id = $this->db->insert_id();

        foreach($form as $form) {
            $data_form = array(
                'detail_pengajuan_form_pengajuan_id'        => $pengajuan_id,
                'detail_pengajuan_form_jenis_form_id'       => $form
            );
            $this->db->insert('ta_detail_pengajuan_form', $data_form);
        }

        foreach($lampiran as $lampiran) {
            $data_lampiran = array(
                'detail_pengajuan_lampiran_pengajuan_id'    => $pengajuan_id,
                'detail_pengajuan_lampiran_nama'            => $lampiran
            );
            $this->db->insert('ta_detail_pengajuan_lampiran', $data_lampiran);
        }
    }
}