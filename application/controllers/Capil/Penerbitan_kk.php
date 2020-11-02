<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerbitan_kk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Capil/Penerbitan_kk_model', 'penerbitan_kk_model');
        $this->load->model('Ref_model');
    }

    public function index()
    {
        $data['content']    = 'backend/capil/penerbitan_kk/index';
        $data['title']      = 'Penerbitan KK';
        $data['wilayah']    = $this->penerbitan_kk_model->get_all_wilayah();
        $data['status_pengajuan'] = $this->penerbitan_kk_model->get_all_status_pengajuan();
        $data['breadcrumbs'] = array(
            array(
                'url' => 'capil/pengajuan/penerbitan-kk-baru',
                'title' => 'Pengajuan'
            ),
        );

        $this->load->view('layouts/master_capil', $data);
    }

    public function show($pengajuan_id)
    {
        $data['content']                = 'backend/capil/penerbitan_kk/show';
        $data['title']                  = 'Penerbitan KK';
        $data['pengajuan']              = $this->penerbitan_kk_model->get_pengajuan_by_id($pengajuan_id);
        $data['jenis_layanan']          = $this->Ref_model->get_jenis_layanan();
        $data['status_pengajuan']       = $this->Ref_model->get_status_pengajuan();
        $data['jenis_layanan_json']     = json_encode($data['jenis_layanan']);
        $data['status_pengajuan_json']  = json_encode($data['status_pengajuan']);
        $data['breadcrumbs'] = array(
            array(
                'url' => 'capil/pengajuan/penerbitan-kk-baru',
                'title' => 'Pengajuan'
            ),
            array(
                'url' => 'capil/pengajuan/penerbitan-kk-baru/show/' . $pengajuan_id,
                'title' => 'Penerbitan KK'
            )
        );

        $this->load->view('layouts/master_capil', $data);
    }

    public function get_data_pengajuan()
    {
        $data = $this->penerbitan_kk_model->get_all_penerbitan_kk_baru();
        $this->output->set_content_type('application/json');
        echo json_encode(array('data' => $data));
    }

    public function set_status_pengajuan()
    {
        $post = $this->input->post();
        $id_pengajuan = $post['id_pengajuan'];
        $status = $this->penerbitan_kk_model->set_status_pengajuan($id_pengajuan);

        if($status) {
            $this->output->set_content_type('application/json');
            echo json_encode(array(
                'msg' => 'Success'
            ));
        }
    }

}