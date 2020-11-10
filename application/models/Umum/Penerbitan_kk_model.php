<?php

class Penerbitan_kk_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param   $pengajuan      berisi wilayah_id, nik, id_layanan
     * @param   $f101           berisi data tabel f101
     * @param   $detail_f101    berisi array data dari tabel detail_f101
     * 
     * TODO:
     * - input ke pengajuan
     * - input ke detail_pengajuan_form
     * - input ke detail_pengajuan_lampiran
     * - input ke f101
     * - input ke detail_f101
     */
    public function set_pengajuan_penerbitan_kk($pengajuan, $f101, $detail_f101)
    {
        $data_pengajuan['pengajuan_wilayah_id']             = $pengajuan['wilayah_id'];
        $data_pengajuan['pengajuan_nik']                    = $pengajuan['nik'];
        $data_pengajuan['pengajuan_jenis_layanan']          = 1;
        $data_pengajuan['pengajuan_status_pengajuan_id']    = 1;

        $data_detail_form = array(1);
        $data_detail_lampiran = array(); 

        $this->db->trans_start();

        // input ke pengajuan
        $this->db->insert('ta_pengajuan', $data_pengajuan);
        $pengajuan_id = $this->db->insert_id();

        // input ke detail_pengajuan_form
        foreach($data_detail_form as $form) {
            $data_form = array(
                'detail_pengajuan_form_pengajuan_id'        => $pengajuan_id,
                'detail_pengajuan_form_jenis_form_id'       => $form
            );
            $this->db->insert('ta_detail_pengajuan_form', $data_form);
        }

        // input ke detail_pengajuan_lampiran
        foreach($data_detail_lampiran as $lampiran) {
            $data_lampiran = array(
                'detail_pengajuan_lampiran_pengajuan_id'    => $pengajuan_id,
                'detail_pengajuan_lampiran_nama'            => $lampiran
            );
            $this->db->insert('ta_detail_pengajuan_lampiran', $data_lampiran);
        }

        // input ke f101
        $data_f101 = array(
            'f101_pengajuan_id'                 => $pengajuan_id,
            'f101_nama_kepala_keluarga'         => $f101['nama_kepala_keluarga'],
            'f101_alamat'                       => $f101['alamat'],
            'f101_wilayah_id'                   => $pengajuan['wilayah_id'],
            'f101_rt'                           => $f101['rt'],
            'f101_rw'                           => $f101['rw'],
            'f101_jumlah_anggota_keluarga'      => $f101['jumlah_anggota_keluarga'],
            'f101_telepon'                      => $f101['telepon']
        );
        $this->db->insert('ta_f101', $data_f101);
        $f101_id = $this->db->insert_id();

        // input ke detail
        foreach($detail_f101 as $detail_f101_data) {
            $detail_f101 = (array) $detail_f101_data;

            $data_detail_f101 = array(
                'detail_f101_f101_id'                       => $f101_id,
                'detail_f101_nama_lengkap'                  => $detail_f101['nama_lengkap'],
                'detail_f101_gelar_id'                      => $detail_f101['gelar'],
                'detail_f101_nomor_penduduk'                => $detail_f101['nomor_penduduk'],
                'detail_f101_alamat_sebelumnya'             => $detail_f101['alamat_sebelumnya'],

                'detail_f101_nomor_paspor'                  => $detail_f101['nomor_paspor'],
                'detail_f101_tanggal_berakhir_paspor'       => $detail_f101['tanggal_berakhir_paspor'],
                'detail_f101_kelamin_id'                    => $detail_f101['kelamin'],
                'detail_f101_tempat_lahir'                  => $detail_f101['tempat_lahir'],
                'detail_f101_tanggal_lahir'                 => $detail_f101['tanggal_lahir'],

                'detail_f101_umur'                          => $detail_f101['umur'],
                'detail_f101_akta_lahir_id'                 => $detail_f101['kepemilikan_akta_lahir'],
                'detail_f101_nomor_akta_kelahiran'          => $detail_f101['nomor_akta_kelahiran'],
                'detail_f101_goldar_id'                     => $detail_f101['golongan_darah'],
                'detail_f101_agama_id'                      => $detail_f101['agama'],

                'detail_f101_kawin_id'                      => $detail_f101['status_kawin'],
                'detail_f101_akta_perkawinan_id'            => $detail_f101['kepemilikan_akta_perkawinan'],
                'detail_f101_nomor_akta_perkawinan'         => $detail_f101['nomor_akta_perkawinan'],
                'detail_f101_tanggal_perkawinan'            => $detail_f101['tanggal_perkawinan'],
                'detail_f101_akta_cerai_id'                 => $detail_f101['kepemilikan_akta_cerai'],

                'detail_f101_nomor_akta_perceraian'         => $detail_f101['nomor_akta_perceraian'],
                'detail_f101_hubkel_id'                     => $detail_f101['hubungan_keluarga'],
                'detail_f101_kelainan_id'                   => $detail_f101['kepemilikan_kelainan'],
                'detail_f101_cacat_id'                      => $detail_f101['penyandang_cacat'],
                'detail_f101_pendidikan'                    => $detail_f101['pendidikan'],

                'detail_f101_pekerjaan'                     => $detail_f101['pekerjaan'],
                'detail_f101_nik_ibu'                       => $detail_f101['nik_ibu'],
                'detail_f101_nama_lengkap_ibu'              => $detail_f101['nama_lengkap_ibu'],
                'detail_f101_nik_ayah'                      => $detail_f101['nik_ayah'],
                'detail_f101_nama_lengkap_ayah'             => $detail_f101['nama_lengkap_ayah'],

                'detail_f101_tanggal_perceraian'            => $detail_f101['tanggal_perceraian'],
                'detail_f101_kepercayaan_terhadap_tuhan_yme'    => $detail_f101['kepercayaan_terhadap_tuhan_yme']
            );

            $this->db->insert('ta_detail_f101', $data_detail_f101);
        }

        $this->db->trans_complete();
    }
}