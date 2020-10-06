<?php

/**
 * @group model
 */

class Pengumuman_model_test extends TestCase
{
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        $CI =& get_instance();

        $CI->load->library('Seeder');
        $CI->seeder->call('PengumumanSeeder');
    }

    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('pengumuman_model');
        $this->obj = $this->CI->pengumuman_model;
    }

    public function test_WhenYouGetAllPengumumanThenYouGetOnePengumuman()
    {
        $result = $this->obj->getAll();
        $this->assertCount(1, $result);
    }

    public function test_WhenYouSetPengumumanThenYouGetTwoPengumuman()
    {
        $_POST = [
            'pengumuman_judul' => 'Pengumuman Dua',
            'pengumuman_isi' => 'Lowongan untuk pegawai kontrak',
        ];

        $result = $this->obj->save();
        $this->assertTrue($result);
        $this->assertCount(2, $this->obj->getAll());
        $this->assertEquals('pengumuman-dua', $this->obj->getById(2)['pengumuman_slug']);
    }

    public function test_WhenYouGetPengumumanByIdThenYouGetThePengumuman()
    {
        $result = $this->obj->getById(2);
        $this->assertEquals('Pengumuman Dua', $result['pengumuman_judul']);
    }

    public function test_WhenYouGetPengumumanBySlugThenGetThePengumuman()
    {
        $result = $this->obj->getBySlug('pengumuman-dua');
        $this->assertEquals('Pengumuman Dua', $result['pengumuman_judul']);
    }

    public function test_WhenYouUpdatePengumumanThenThePengumumanChanged()
    {
        $pengumuman = $this->obj->getById(2);
        $pengumuman['pengumuman_judul'] = 'Pengumuman Tiga';

        $_POST = [
            'pengumuman_judul' => $pengumuman['pengumuman_judul'],
            'pengumuman_isi' => $pengumuman['pengumuman_isi'],
        ];

        $status = $this->obj->update(2);
        $result = $this->obj->getById(2);
        $this->assertTrue($status);
        $this->assertEquals('Pengumuman Tiga', $result['pengumuman_judul']);
        $this->assertEquals('pengumuman-tiga', $result['pengumuman_slug']);
    }

    public function test_WhenYouDeleteAPengumumanThenReturnTrue()
    {
        $result = $this->obj->delete(2);
        $this->assertTrue($result);
    }
}