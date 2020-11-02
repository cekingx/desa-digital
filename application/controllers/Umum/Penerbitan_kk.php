<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerbitan_kk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Data_masyarakat_model');
        $this->load->model('Umum/Penerbitan_kk_model', 'penerbitan_kk_model');
    }

    public function penerbitan_kk_baru()
    {
        $data['content']        = 'backend/umum/penerbitan_kk/create';
        $data['title']          = 'Penerbitan KK Baru';
        $data['breadcrumbs']    = array(
            array(
                'url'       => 'umum',
                'title'     => 'Umum'
            ),
            array(
                'url'       => 'umum/pengajuan/daftar-pengajuan',
                'title'     => 'Pengajuan'
            ),
            array(
                'url'       => 'umum/pengajuan/penerbitan-kk-baru/create',
                'title'     => 'Penerbitan KK Baru'
            )
        );

        $this->load->view('layouts/master_umum', $data);
    }

    public function store_penerbitan_kk_baru()
    {
        $post = $this->input->post();
        $pengajuan = array(
            'wilayah_id'    => $this->session->userdata('wilayah_id'),
            'nik'           => $this->session->userdata('nik_pemohon')
        );

        $data_f101 = array(
            'nama_kepala_keluarga'      => $post['nama_kepala_keluarga'],
            'alamat'                    => $post['alamat'],
            'rt'                        => $post['rt'],
            'rw'                        => $post['rw'],
            'jumlah_anggota_keluarga'   => $post['jumlah_anggota_keluarga'],
            'telepon'                   => $post['telepon']
        );

        $data_detail_f101 = json_decode($post['detail_f101']);

        $this->penerbitan_kk_model->set_pengajuan_penerbitan_kk($pengajuan, $data_f101, $data_detail_f101);
    }

    public function input_detail_f101()
    {
        $data['content']        = 'backend/umum/penerbitan_kk/input_detail';
        $data['title']          = 'Penerbitan KK Baru';

        $data['gelar']              = $this->Data_masyarakat_model->get_all_gelar();
        $data['agama']              = $this->Data_masyarakat_model->get_all_agama();
        $data['cacat']              = $this->Data_masyarakat_model->get_all_cacat();
        $data['goldar']             = $this->Data_masyarakat_model->get_all_goldar();
        $data['hubkel']             = $this->Data_masyarakat_model->get_all_hubkel();
        $data['kawin']              = $this->Data_masyarakat_model->get_all_kawin();
        $data['kelainan']           = $this->Data_masyarakat_model->get_all_kelainan();
        $data['kelamin']            = $this->Data_masyarakat_model->get_all_kelamin();
        $data['pekerjaan']          = $this->Data_masyarakat_model->get_all_pekerjaan();
        $data['pendidikan']         = $this->Data_masyarakat_model->get_all_pendidikan();

        $data['gelar_json']         = json_encode($data['gelar']);
        $data['agama_json']         = json_encode($data['agama']);
        $data['cacat_json']         = json_encode($data['cacat']);
        $data['goldar_json']        = json_encode($data['goldar']);
        $data['hubkel_json']        = json_encode($data['hubkel']);
        $data['kawin_json']         = json_encode($data['kawin']);
        $data['kelainan_json']      = json_encode($data['kelainan']);
        $data['kelamin_json']       = json_encode($data['kelamin']);
        $data['pekerjaan_json']     = json_encode($data['pekerjaan']);
        $data['pendidikan_json']    = json_encode($data['pendidikan']);

        $this->load->view('layouts/master_no_aside', $data);
    }
}