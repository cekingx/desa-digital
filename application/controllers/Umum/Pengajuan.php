<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Umum/Pengajuan_model', 'pengajuan_model');
        $this->load->model('Ref_model');
    }

    public function index()
    {
        $data['content'] = 'backend/umum/pengajuan/index';
        $data['title'] = 'Daftar Pengajuan';
        $data['layanan']            = $this->pengajuan_model->get_all_layanan();
        $data['status_pengajuan']   = $this->pengajuan_model->get_all_status_pengajuan();
        $data['breadcrumbs']        = array(
            array(
                'url'       => 'umum/pengajuan/daftar-pengajuan',
                'title'     => 'Pengajuan'
            ),
        );

        $this->load->view('layouts/master_umum', $data);
    }

    public function show($pengajuan_id)
    {
        $data['content'] = 'backend/umum/pengajuan/show';
        $data['title'] = 'Pengajuan Anda';
        $data['pengajuan']          = $this->pengajuan_model->get_pengajuan_by_id($pengajuan_id);
        $data['jenis_layanan']      = json_encode($this->Ref_model->get_jenis_layanan());
        $data['status_pengajuan']   = json_encode($this->Ref_model->get_status_pengajuan());
        $data['breadcrumbs']        = array(
            array(
                'url'       => 'umum/pengajuan/daftar-pengajuan',
                'title'     => 'Pengajuan'
            ),
            array(
                'url'       => 'umum/pengajuan/show/'. $pengajuan_id,
                'title'     => $data['pengajuan']['pengajuan']->layanan
            )
        );

        $this->load->view('layouts/master_umum', $data);
    }

    public function get_data_pengajuan()
    {
        $data = $this->pengajuan_model->get_all();

        $this->output->set_content_type('application/json');
        echo json_encode(array(
            'data' => $data
        ));
    }

    public function pilih_layanan()
    {
        if(empty($this->session->userdata('nik_pemohon'))) {
            return redirect('umum/pengajuan');
        }

        $data['content'] = 'backend/umum/pengajuan/pilih-layanan';
        $data['title'] = 'Pilih layanan';
        $data['breadcrumbs']    = array(
            array(
                'url'       => 'umum/pengajuan/daftar-pengajuan',
                'title'     => 'Pengajuan'
            ),
            array(
                'url'       => 'umum/pengajuan/pilih-layanan/',
                'title'     => 'Pilih Layanan'
            )
        );

        $this->load->view('layouts/master_umum', $data);
    }
}