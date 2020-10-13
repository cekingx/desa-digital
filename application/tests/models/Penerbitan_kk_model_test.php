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
        $this->CI->load->model('Penerbitan_kk_model');
        $this->obj = $this->CI->Penerbitan_kk_model;
    }

    public function test_WhenSetPengajuanPenerbitanThenGetTwoPengajuan()
    {
        $data_pengajuan = array(
            'wilayah_id'    => 66,
            'nik'           => '510408230230'
        );

        $data_f101 = array(
            'nama_kepala_keluarga'      => 'Dirga',
            'alamat'                    => 'Sidan',
            'rt'                        => 2,
            'rw'                        => 2,
            'jumlah_anggota_keluarga'   => 2,
            'telepon'                   => '091203'
        );

        $data_detail_f101 = array(
            array(
                'nama_lengkap'                  => 'dirga',
                'gelar'                         => 1,
                'nomor_penduduk'                => '120819',
                'alamat_sebelumnya'             => 'Sidan',
                'nomor_paspor'                  => '2309',
                'tanggal_berakhir_paspor'       => '2020-12-21',
                'kelamin'                       => 1,
                'tempat_lahir'                  => 'Gianyar',
                'tanggal_lahir'                 => '2020-12-12',
                'umur'                          => 20,
                'kepemilikan_akta_lahir'        => 1,
                'nomor_akta_kelahiran'          => '01y4',
                'golongan_darah'                => 1,
                'agama'                         => 1,
                'status_kawin'                  => 1,
                'kepemilikan_akta_perkawinan'   => 1,
                'nomor_akta_perkawinan'         => '70973',
                'tanggal_perkawinan'            => '2020-12-12',
                'kepemilikan_akta_cerai'        => 1,
                'nomor_akta_perceraian'         => '7097',
                'hubungan_keluarga'             => 1,
                'kepemilikan_kelainan'          => 1,
                'penyandang_cacat'              => 1,
                'pendidikan'                    => 1,
                'pekerjaan'                     => 1,
                'nik_ibu'                       => '098712847',
                'nama_lengkap_ibu'              => 'hglej',
                'nik_ayah'                      => '0127340',
                'nama_lengkap_ayah'             => 'lkasd'
            ),
            array(
                'nama_lengkap'                  => 'yasa',
                'gelar'                         => 1,
                'nomor_penduduk'                => '120819',
                'alamat_sebelumnya'             => 'Sidan',
                'nomor_paspor'                  => '2309',
                'tanggal_berakhir_paspor'       => '2020-12-21',
                'kelamin'                       => 1,
                'tempat_lahir'                  => 'Gianyar',
                'tanggal_lahir'                 => '2020-12-12',
                'umur'                          => 20,
                'kepemilikan_akta_lahir'        => 1,
                'nomor_akta_kelahiran'          => '01y4',
                'golongan_darah'                => 1,
                'agama'                         => 1,
                'status_kawin'                  => 1,
                'kepemilikan_akta_perkawinan'   => 1,
                'nomor_akta_perkawinan'         => '70973',
                'tanggal_perkawinan'            => '2020-12-12',
                'kepemilikan_akta_cerai'        => 1,
                'nomor_akta_perceraian'         => '7097',
                'hubungan_keluarga'             => 1,
                'kepemilikan_kelainan'          => 1,
                'penyandang_cacat'              => 1,
                'pendidikan'                    => 1,
                'pekerjaan'                     => 1,
                'nik_ibu'                       => '098712847',
                'nama_lengkap_ibu'              => 'hglej',
                'nik_ayah'                      => '0127340',
                'nama_lengkap_ayah'             => 'lkasd'
            )
        );

        $this->obj->set_pengajuan_penerbitan_kk($data_pengajuan, $data_f101, $data_detail_f101);
        $this->assertCount(2, $this->CI->db->get('ta_pengajuan')->result());
        $this->assertCount(3, $this->CI->db->get('ta_detail_f101')->result());
    }
}