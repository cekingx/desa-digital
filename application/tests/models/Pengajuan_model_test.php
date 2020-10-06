<?php

/**
 * @group model
 */
class Pengajuan_model_test extends TestCase
{
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        $CI =& get_instance();

        $CI->load->library('Seeder');
        $CI->seeder->call('PengajuanSeeder');
    }

    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('pengajuan_model');
        $this->obj = $this->CI->pengajuan_model;
    }

    public function test_WhenGetAllPengajuanThenGetOnePengajuan()
    {
        $result = $this->obj->get_all();
        $this->assertCount(1, $result);
    }

    public function test_WhenSetPengajuanThenGetTwoPengajuan()
    {
        $data_pengajuan = array(
            'wilayah_id'    => 66,
            'nik'           => '5104031307990004',
            'jenis_layanan' => 'penerbitan-kk-baru'
        );

        $data_form      = array(1,2);
        $data_lampiran  = array('KTP', 'KK');

        $this->obj->set_pengajuan($data_pengajuan, $data_form, $data_lampiran);
        $result = $this->obj->get_all();
        $this->assertCount(2, $result);
        $this->assertCount(3, $this->obj->get_pengajuan_form_by_nik($data_pengajuan['nik']));
        $this->assertCount(3, $this->obj->get_pengajuan_lampiran_by_nik($data_pengajuan['nik']));
    }

    public function test_WhenSetPengajuanWithoutFormThenGetThreePengajuan()
    {
        $data_pengajuan = array(
            'wilayah_id'    => 66,
            'nik'           => '5104031307990004',
            'jenis_layanan' => 'penerbitan-kk-baru'
        );

        $data_form      = array();
        $data_lampiran  = array('KTP', 'KK');

        $this->obj->set_pengajuan($data_pengajuan, $data_form, $data_lampiran);
        $result = $this->obj->get_all();
        $this->assertCount(3, $result);
        $this->assertCount(3, $this->obj->get_pengajuan_form_by_nik($data_pengajuan['nik']));
        $this->assertCount(5, $this->obj->get_pengajuan_lampiran_by_nik($data_pengajuan['nik']));
    }
}