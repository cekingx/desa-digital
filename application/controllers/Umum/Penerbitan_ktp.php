<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerbitan_ktp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Umum/Penerbitan_ktp_model', 'penerbitan_ktp_model');
    }

    public function penerbitan_ktp_baru()
    {
        $data['content']        = 'backend/umum/penerbitan_ktp/create';
        $data['title']          = 'Penerbitan KTP Baru';
        $data['breadcrumbs']    = array(
            array(
                'url'       => 'umum/pengajuan/daftar-pengajuan',
                'title'     => 'Pengajuan'
            ),
            array(
                'url'       => 'umum/pengajuan/penerbitan-ktp-baru/create',
                'title'     => 'Penerbitan KTP Baru'
            )
        );

        $this->load->view('layouts/master_umum', $data);
    }

    public function store_penerbitan_ktp_baru()
    {
        $post = $this->input->post();

        $pengajuan = array(
            'wilayah_id'    => $this->session->userdata('wilayah_id'),
            'nik'           => $this->session->userdata('nik_pemohon')
        );

        $files = array(
            'kk'                => 'KK',
            'surat_pengantar'   => 'Surat Pengantar'
        );

        $this->penerbitan_ktp_model->set_pengajuan_penerbitan_ktp($pengajuan, $files);

        $this->output->set_content_type('application/json');
        echo json_encode(array(
            'msg' => 'Success'
        ));
    }
}