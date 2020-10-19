<?php

class PenerbitanKKSeeder extends Seeder
{
    public function run()
    {
        $this->db->truncate('ta_detail_pengajuan_form');
        $this->db->truncate('ta_detail_pengajuan_lampiran');
        $this->db->empty_table('ta_detail_f101');
        $this->db->query('ALTER TABLE ta_detail_f101 AUTO_INCREMENT=1');
        $this->db->empty_table('ta_f101');
        $this->db->query('ALTER TABLE ta_f101 AUTO_INCREMENT=1');
        $this->db->empty_table('ta_pengajuan');
        $this->db->query('ALTER TABLE ta_pengajuan AUTO_INCREMENT=1');

        $data_pengajuan = array(
            'pengajuan_wilayah_id'              => 66,
            'pengajuan_nik'                     => '5104031307990004',
            'pengajuan_status_pengajuan_id'     => 1,
            'pengajuan_jenis_layanan'           => 1
        );

        $data_form = array(
            'detail_pengajuan_form_pengajuan_id'    => 1,
            'detail_pengajuan_form_jenis_form_id'   => 1
        );

        $data_lampiran = array(
            'detail_pengajuan_lampiran_pengajuan_id'    => 1,
            'detail_pengajuan_lampiran_nama'            => 'KTP'
        );

        $data_f101 = array(
            'f101_pengajuan_id'                 => 1,
            'f101_nama_kepala_keluarga'         => 'Dirga',
            'f101_alamat'                       => 'Sidan',
            'f101_wilayah_id'                   => 66,
            'f101_rt'                           => 1,
            'f101_rw'                           => 1,
            'f101_jumlah_anggota_keluarga'      => 1,
            'f101_telepon'                      => '08978979'
        );

        $data_detail_f101 = array(
            'detail_f101_f101_id'                       => 1,
            'detail_f101_nama_lengkap'                  => 'Dirga',
            'detail_f101_gelar_id'                      => 1,
            'detail_f101_nomor_penduduk'                => '404040',
            'detail_f101_alamat_sebelumnya'             => 'sidan',

            'detail_f101_nomor_paspor'                  => '39247',
            'detail_f101_tanggal_berakhir_paspor'       => '2020-10-12',
            'detail_f101_kelamin_id'                    => 1,
            'detail_f101_tempat_lahir'                  => 'Gianyar',
            'detail_f101_tanggal_lahir'                 => '1999-07-13',

            'detail_f101_umur'                          => 20,
            'detail_f101_akta_lahir_id'                 => 1,
            'detail_f101_nomor_akta_kelahiran'          => '79347',
            'detail_f101_goldar_id'                     => 1,
            'detail_f101_agama_id'                      => 1,

            'detail_f101_kawin_id'                      => 1,
            'detail_f101_akta_perkawinan_id'            => 1,
            'detail_f101_nomor_akta_perkawinan'         => '23947',
            'detail_f101_tanggal_perkawinan'            => '2003-12-09',
            'detail_f101_akta_cerai_id'                 => 1,

            'detail_f101_nomor_akta_perceraian'         => '9034',
            'detail_f101_hubkel_id'                     => 1,
            'detail_f101_kelainan_id'                   => 1,
            'detail_f101_cacat_id'                      => 1,
            'detail_f101_pendidikan'                    => 1,

            'detail_f101_pekerjaan'                     => 1,
            'detail_f101_nik_ibu'                       => '48938',
            'detail_f101_nama_lengkap_ibu'              => 'asdlj',
            'detail_f101_nik_ayah'                      => '29347',
            'detail_f101_nama_lengkap_ayah'             => 'asdf'
        );

        $this->db->trans_start();
        $this->db->insert('ta_pengajuan', $data_pengajuan);
        $this->db->insert('ta_detail_pengajuan_form', $data_form);
        $this->db->insert('ta_detail_pengajuan_lampiran', $data_lampiran);
        $this->db->insert('ta_f101', $data_f101);
        $this->db->insert('ta_detail_f101', $data_detail_f101);
        $this->db->trans_complete();
    }
}