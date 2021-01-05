<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerbitan_ktp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Capil/Penerbitan_ktp_model', 'penerbitan_ktp_model');
        $this->load->model('Ref_model');
        $this->load->helper('check_login_helper');
        check_login($this->session);
    }

    public function index()
    {
        $data['content']    = 'backend/capil/penerbitan_ktp/index';
        $data['title']      = 'Penerbitan KTP';
        $data['wilayah']    = $this->penerbitan_ktp_model->get_all_wilayah();
        $data['status_pengajuan'] = $this->penerbitan_ktp_model->get_all_status_pengajuan();
        $data['breadcrumbs'] = array(
            array(
                'url' => 'capil/pengajuan/penerbitan-ktp-baru',
                'title' => 'Pengajuan'
            ),
        );

        $this->load->view('layouts/master_capil', $data);
    }

    public function show($pengajuan_id)
    {
        $data['content']                = 'backend/capil/penerbitan_ktp/show';
        $data['title']                  = 'Penerbitan KTP';
        $data['pengajuan']              = $this->penerbitan_ktp_model->get_pengajuan_by_id($pengajuan_id);
        $data['jenis_layanan']          = $this->Ref_model->get_jenis_layanan();
        $data['status_pengajuan']       = $this->Ref_model->get_status_pengajuan();
        $data['jenis_layanan_json']     = json_encode($data['jenis_layanan']);
        $data['status_pengajuan_json']  = json_encode($data['status_pengajuan']);
        $data['breadcrumbs'] = array(
            array(
                'url' => 'capil/pengajuan/penerbitan-ktp-baru',
                'title' => 'Pengajuan'
            ),
            array(
                'url' => 'capil/pengajuan/penerbitan-ktp-baru/show/' . $pengajuan_id,
                'title' => 'Penerbitan KTP'
            )
        );

        $this->load->view('layouts/master_capil', $data);
    }

    public function get_data_pengajuan()
    {
        $data = $this->penerbitan_ktp_model->get_all_penerbitan_ktp_baru();
        $this->output->set_content_type('application/json');
        echo json_encode(array('data' => $data));
    }

    public function set_status_pengajuan()
    {
        $post = $this->input->post();
        $id_pengajuan = $post['id_pengajuan'];
        $status = $this->penerbitan_ktp_model->set_status_pengajuan($id_pengajuan);

        if($status) {
            $this->output->set_content_type('application/json');
            echo json_encode(array(
                'msg' => 'Success'
            ));
        }
    }
}