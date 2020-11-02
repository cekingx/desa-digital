<?php

class Pengajuan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        return $this->db->select('
                                    ta_pengajuan.*, 
                                    ref_layanan.layanan_nama as layanan,
                                    ref_status_pengajuan.status_pengajuan_deskripsi as pengajuan_status_pengajuan
                                ')
                        ->from('ta_pengajuan')
                        ->join('ref_layanan', 'ta_pengajuan.pengajuan_jenis_layanan = ref_layanan.layanan_id')
                        ->join('ref_status_pengajuan', 'ta_pengajuan.pengajuan_status_pengajuan_id = ref_status_pengajuan.status_pengajuan_id')
                        ->where('ta_pengajuan.pengajuan_nik', $this->session->userdata('nik_pemohon'))
                        ->get()
                        ->result();
    }

    public function get_all_layanan()
    {
        return $this->db->select('
                                    layanan_id, 
                                    layanan_nama as layanan
                                ')
                        ->from('ref_layanan')
                        ->get()
                        ->result();
    }

    public function get_all_status_pengajuan()
    {
        return $this->db->select('
                                    status_pengajuan_id,
                                    status_pengajuan_deskripsi as status_pengajuan
                                ')
                        ->from('ref_status_pengajuan')
                        ->get()
                        ->result();
    }

    public function get_pengajuan_by_id($id_pengajuan)
    {
        $data_pengajuan = $this->db->select('
                                                ta_pengajuan.*, 
                                                ref_layanan.layanan_nama as layanan
                                            ')
                                ->from('ta_pengajuan')
                                ->join('ref_layanan', 'ta_pengajuan.pengajuan_jenis_layanan = ref_layanan.layanan_id')
                                ->where('pengajuan_id', $id_pengajuan)
                                ->get()
                                ->row();

        $data_form_pengajuan = $this->db->select('*')
                                        ->from('ta_detail_pengajuan_form')
                                        ->join('ref_jenis_form', 'ta_detail_pengajuan_form.detail_pengajuan_form_jenis_form_id = ref_jenis_form.jenis_form_id')
                                        ->where('detail_pengajuan_form_pengajuan_id', $id_pengajuan)
                                        ->get()
                                        ->result();

        $data_lampiran_pengajuan = $this->db->select('*')
                                            ->from('ta_detail_pengajuan_lampiran')
                                            ->where('detail_pengajuan_lampiran_pengajuan_id', $id_pengajuan)
                                            ->get()
                                            ->result();

        $form_pengajuan = array();
        foreach($data_form_pengajuan as $form) {
            $nama_tabel = $form->jenis_form_nama_tabel;
            // mengubah dari ta_f* ke f*_id
            $field_id = str_replace('ta_f', 'f', $nama_tabel) . '_id';
            // mengubah dari ta_f* ke f*_pengajuan_id
            $field_pengajuan_id = str_replace('ta_f', 'f', $nama_tabel) . '_pengajuan_id';
            $used_form = $this->db->select($field_id)
                            ->from($nama_tabel)
                            ->where($field_pengajuan_id, $id_pengajuan)
                            ->get()
                            ->row();

            array_push($form_pengajuan, array(
                'nama_form' => $form->jenis_form_nama,
                'form_id'   => $used_form->$field_id,
                'url'       => $form->jenis_form_url
            ));
        } 

        $data = array(
            'pengajuan'             => $data_pengajuan,
            'form_pengajuan'        => $form_pengajuan,
            'lampiran_pengajuan'    => $data_lampiran_pengajuan
        );

        return $data;
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
}