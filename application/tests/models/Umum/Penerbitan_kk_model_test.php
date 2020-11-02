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
            'nik'           => '5104023101640001'
        );

        $data_f101 = array(
            'nama_kepala_keluarga'      => 'I Wayan Sudira',
            'alamat'                    => 'Sidan',
            'rt'                        => 2,
            'rw'                        => 2,
            'jumlah_anggota_keluarga'   => 2,
            'telepon'                   => '081339523474'
        );

        $data_detail_f101 = array(
            array(
                'nama_lengkap'                  => 'I Wayan Sudira',
                'gelar'                         => 1,
                'nomor_penduduk'                => '5104031307990001',
                'alamat_sebelumnya'             => 'Sidan',
                'nomor_paspor'                  => '2309',
                'tanggal_berakhir_paspor'       => '2020-12-21',
                'kelamin'                       => 1,
                'tempat_lahir'                  => 'Gianyar',
                'tanggal_lahir'                 => '1969-07-13',
                'umur'                          => 40,
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
                'nama_lengkap_ibu'              => 'Desak',
                'nik_ayah'                      => '0127340',
                'nama_lengkap_ayah'             => 'Dewa Putu'
            ),
            array(
                'nama_lengkap'                  => 'Ketut',
                'gelar'                         => 1,
                'nomor_penduduk'                => '5104031307990002',
                'alamat_sebelumnya'             => 'Klungkung',
                'nomor_paspor'                  => '2309',
                'tanggal_berakhir_paspor'       => '2020-12-21',
                'kelamin'                       => 1,
                'tempat_lahir'                  => 'Klungkung',
                'tanggal_lahir'                 => '1975-04-14',
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
                'nama_lengkap_ibu'              => 'Ni Nyoman',
                'nik_ayah'                      => '0127340',
                'nama_lengkap_ayah'             => 'I Wayan'
            ),
            array(
                'nama_lengkap'                  => 'Ketut',
                'gelar'                         => 1,
                'nomor_penduduk'                => '5104031307990011',
                'alamat_sebelumnya'             => 'Sidan',
                'nomor_paspor'                  => '2309',
                'tanggal_berakhir_paspor'       => '2020-12-21',
                'kelamin'                       => 1,
                'tempat_lahir'                  => 'Gianyar',
                'tanggal_lahir'                 => '1999-07-13',
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
                'nama_lengkap_ibu'              => 'Nyoman',
                'nik_ayah'                      => '0127340',
                'nama_lengkap_ayah'             => 'I Wayan Sudira'
            )
        );

        $this->obj->set_pengajuan_penerbitan_kk($data_pengajuan, $data_f101, $data_detail_f101);
        $this->assertCount(2, $this->CI->db->get('ta_pengajuan')->result());
        $this->assertCount(4, $this->CI->db->get('ta_detail_f101')->result());
    }
}