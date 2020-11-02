<?php

/**
 * @group model
 */

class Penerbitan_ktp_model_test extends TestCase
{
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        $CI =& get_instance();
        $CI->load->library('Seeder');
        $CI->seeder->call('PenerbitanKTPSeeder');
    }

    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('Desa/Penerbitan_ktp_model', 'penerbitan_ktp_model');
        $this->obj = $this->CI->penerbitan_ktp_model;
    }

    public function testWhenSetPengajuanThenGetTwoPengajuan()
    {
        $data_pengajuan = array(
            'wilayah_id'    => 66,
            'nik'           => '5104023101640001'
        );

        $data_files = array(
            'kk'               => 'KK',
            'surat_pengantar'   => 'Surat Pengantar'
        );

        $this->obj->set_pengajuan_penerbitan_ktp($data_pengajuan, $data_files);
        $this->assertCount(2, $this->CI->db->get('ta_pengajuan')->result());
        $this->assertCount(3, $this->CI->db->get('ta_detail_pengajuan_lampiran')->result());
    }

    public static function tearDownAfterClass()
    {
        $dir_path = FCPATH . "/storage/penerbitan_ktp/2";
        if(is_dir($dir_path)) {
            rmdir($dir_path);
        }
    }
}