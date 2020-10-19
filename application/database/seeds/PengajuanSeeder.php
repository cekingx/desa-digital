<?php

class PengajuanSeeder extends Seeder
{
    public function run()
    {
        $this->db->truncate('ta_detail_pengajuan_form');
        $this->db->truncate('ta_detail_pengajuan_lampiran');
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

        $this->db->insert('ta_pengajuan', $data_pengajuan);
        $this->db->insert('ta_detail_pengajuan_form', $data_form);
        $this->db->insert('ta_detail_pengajuan_lampiran', $data_lampiran);
    }
}