<?php

class PenerbitanKTPSeeder extends Seeder
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
            'pengajuan_jenis_layanan'           => 2
        );

        $data_lampiran = array(
            'detail_pengajuan_lampiran_pengajuan_id'    => 1,
            'detail_pengajuan_lampiran_nama'            => 'KTP',
            'detail_pengajuan_lampiran_path'            => 'storage/penerbitan_ktp/1/',
            'detail_pengajuan_lampiran_nama_file'       => 'KTP.jpg'
        );

        $this->db->trans_start();
        $this->db->insert('ta_pengajuan', $data_pengajuan);
        $this->db->insert('ta_detail_pengajuan_lampiran', $data_lampiran);
        $this->db->trans_complete();
    }
}