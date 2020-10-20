<?php

/**
 * @group model
 */

class Penerbitan_kk_model_test extends TestCase
{
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        $CI =& get_instance();
        $CI->load->library('Seeder');
        $CI->seeder->call('PenerbitanKKSeeder');
    }

    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('Capil/Penerbitan_kk_model', 'penerbitan_kk_model');
        $this->obj = $this->CI->penerbitan_kk_model;
    }

    public function testWhenUpdateStatusPengajuanWithKomenThenStatusPengajuanUpdated()
    {
        $pengajuan_id = 1;
        $status_pengajuan = 7;
        $komentar = 'Kurang foto';
        $_POST = [
            'status_pengajuan' => $status_pengajuan,
            'komentar' => $komentar
        ];

        $output = $this->obj->set_status_pengajuan($pengajuan_id);
        $pengajuan = $this->obj->get_pengajuan_by_id($pengajuan_id)['pengajuan'];
        $this->assertTrue($output);
        $this->assertEquals($status_pengajuan, $pengajuan->pengajuan_status_pengajuan_id);
        $this->assertEquals($komentar, $pengajuan->pengajuan_komen);
    }

    public function testWhenUpdateStatusPengajuanWithoutKomenThenStatusPengajuanUpdated()
    {
        $pengajuan_id = 1;
        $status_pengajuan = 7;
        $_POST = [
            'status_pengajuan' => $status_pengajuan,
            'komentar' => ''
        ];

        $output = $this->obj->set_status_pengajuan($pengajuan_id);
        $pengajuan = $this->obj->get_pengajuan_by_id($pengajuan_id)['pengajuan'];
        $this->assertTrue($output);
        $this->assertEquals($status_pengajuan, $pengajuan->pengajuan_status_pengajuan_id);
        $this->assertEmpty($pengajuan->pengajuan_komen);
    }
}