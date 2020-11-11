<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F101 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Data_masyarakat_model');
        $this->load->model('Umum/F101_model', 'f101_model');
    }

    public function show($f101_id)
    {
        $data['content']            = 'backend/umum/f101/show';
        $data['title']              = 'F-1.01';
        $data['breadcrumbs']        = array(
            array(
                'url'       => 'umum/pengajuan/daftar-pengajuan',
                'title'     => 'Pengajuan'
            ),
            array(
                'url'       => 'umum/pengajuan/f101/' . $f101_id,
                'title'     => 'F-1.01'
            )
        );
        $data['f101']               = json_encode($this->f101_model->get_by_id($f101_id));
        $data['gelar']              = json_encode($this->Data_masyarakat_model->get_all_gelar());
        $data['kelamin']            = json_encode($this->Data_masyarakat_model->get_all_kelamin());
        $data['kelainan']           = json_encode($this->Data_masyarakat_model->get_all_kelainan());
        $data['goldar']             = json_encode($this->Data_masyarakat_model->get_all_goldar());
        $data['agama']              = json_encode($this->Data_masyarakat_model->get_all_agama());
        $data['cacat']              = json_encode($this->Data_masyarakat_model->get_all_cacat());
        $data['status_kawin']       = json_encode($this->Data_masyarakat_model->get_all_kawin());
        $data['hubkel']             = json_encode($this->Data_masyarakat_model->get_all_hubkel());
        $data['pendidikan']         = json_encode($this->Data_masyarakat_model->get_all_pendidikan());
        $data['pekerjaan']          = json_encode($this->Data_masyarakat_model->get_all_pekerjaan());
        $data['akta_cerai']         = json_encode($this->Data_masyarakat_model->get_all_kepemilikan_akta_cerai());
        $data['akta_perkawinan']    = json_encode($this->Data_masyarakat_model->get_all_kepemilikan_akta_perkawinan());
        $data['akta_lahir']         = json_encode($this->Data_masyarakat_model->get_all_kepemilikan_akta_lahir());

        $this->load->view('layouts/master_umum', $data);
    }

    public function generate($f101_id)
    {
        $f101 = $this->f101_model->get_by_id_with_wilayah($f101_id);
        $data['data_f101']          = $f101['data_f101'];
        $data['data_detail_f101']   =  $f101['data_detail_f101'];

        $this->load->view('layouts/generate-pdf/f101', $data);
    }
}