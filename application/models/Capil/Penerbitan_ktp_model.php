<?php

class Penerbitan_ktp_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_wilayah()
    {
        return $this->db->select('
                                    id, 
                                    NAMA_KEL as wilayah
                                ')
                        ->from('ref_wilayah')
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

    public function get_all_penerbitan_ktp_baru()
    {
        return $this->db->select('
                                    ta_pengajuan.*, 
                                    ref_wilayah.NAMA_KEL as pengajuan_wilayah,
                                    ref_status_pengajuan.status_pengajuan_deskripsi as pengajuan_status_pengajuan
                                ')
                        ->from('ta_pengajuan')
                        ->join('ref_wilayah', 'ta_pengajuan.pengajuan_wilayah_id = ref_wilayah.id')
                        ->join('ref_status_pengajuan', 'ta_pengajuan.pengajuan_status_pengajuan_id = ref_status_pengajuan.status_pengajuan_id')
                        ->where('pengajuan_jenis_layanan', 2)
                        ->get()
                        ->result();
    }

    public function get_pengajuan_by_id($id_pengajuan)
    {
        $data_pengajuan = $this->db->select('*')
                                ->from('ta_pengajuan')
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

    public function set_status_pengajuan($id_pengajuan)
    {
        $post = $this->input->post();
        $status_pengajuan = $post['status_pengajuan'];
        if(!empty($post['komentar']) or $post['komentar'] != '') {
            $komentar = $post['komentar'];
        } else {
            $komentar = null;
        }

        $data = array(
            'pengajuan_status_pengajuan_id' => $status_pengajuan,
            'pengajuan_komen' => $komentar
        );

        $this->db->where('pengajuan_id', $id_pengajuan);
        return $this->db->update('ta_pengajuan', $data);
    }
}