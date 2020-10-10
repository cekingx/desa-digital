<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Layanan_model');
        $this->load->model('Pengajuan_model');
        $this->load->model('Data_masyarakat_model');
        $this->load->model('Identitas_desa_model');
    }

    public function index()
    {
        $data['content'] = 'backend/desa/pengajuan/index';
        $data['identitas_desa'] = $this->Identitas_desa_model->get_by_id($this->session->userdata('wilayah_id'));
        $data['title'] = $data['identitas_desa']->NAMA_KEL;
        if(!empty($data['identitas_desa']->LOGO)) {
            $data['logo'] = base_url('storage/desa/') . $data['identitas_desa']->NAMA_KEL . '/logo' . '/' . $data['identitas_desa']->LOGO; 
        } else {
            $data['logo'] = base_url('storage/desa/logo/') . 'default-logo.png';
        }

        $this->load->view('layouts/master_desa', $data);
    }

    public function pilih_layanan()
    {
        if(empty($this->session->userdata('nik_pemohon'))) {
            return redirect('desa/pengajuan');
        }

        $data['content'] = 'backend/desa/pengajuan/pilih-layanan';
        $data['identitas_desa'] = $this->Identitas_desa_model->get_by_id($this->session->userdata('wilayah_id'));
        $data['title'] = $data['identitas_desa']->NAMA_KEL;
        if(!empty($data['identitas_desa']->LOGO)) {
            $data['logo'] = base_url('storage/desa/') . $data['identitas_desa']->NAMA_KEL . '/logo' . '/' . $data['identitas_desa']->LOGO; 
        } else {
            $data['logo'] = base_url('storage/desa/logo/') . 'default-logo.png';
        }

        $this->load->view('layouts/master_desa', $data);
    }
    
    public function get_data_masyarakat()
    {
        $post = $this->input->post();
        $nik = $post['nik'];
        $data = $this->Data_masyarakat_model->get_by_nik($nik);

        if(empty($data)) {
            $this->output->set_status_header(404);
            $this->output->set_content_type('application/json');
            echo json_encode(array(
                'msg' => 'Not Found'
            ));
            return;
        }

        $this->output->set_content_type('application/json');
        echo json_encode($data);
    }

    public function set_nik_to_session()
    {
        $post = $this->input->post();
        $nik = $post['nik'];
        
        $this->session->set_userdata(array(
            'nik_pemohon' => $nik
        ));

        echo json_encode(array(
            'msg' => 'Success'
        ));
    }

    public function set_pengajuan()
    {
        $post = $this->input->post();
        $jenis_layanan = $post['jenis_layanan'];

        switch ($jenis_layanan) {
            case 1:
                if(!$this->pengajuan_penerbitan_kk_baru()) {
                    set_status_header(500);
                    echo json_encode(array(
                        'error' => 'Internal Error'
                    ));
                    break;
                }

                echo json_encode(array(
                    'msg' => 'Success'
                ));
                break;

            default:
                json_encode(array(
                    'msg' => 'layanan belum tersedia'
                ));
        }
    }

    public function wizard()
    {
        $data['content'] = 'backend/desa/pengajuan/wizard';
        $data['identitas_desa'] = $this->Identitas_desa_model->get_by_id($this->session->userdata('wilayah_id'));
        $data['title'] = $data['identitas_desa']->NAMA_KEL;
        if(!empty($data['identitas_desa']->LOGO)) {
            $data['logo'] = base_url('storage/desa/') . $data['identitas_desa']->NAMA_KEL . '/logo' . '/' . $data['identitas_desa']->LOGO; 
        } else {
            $data['logo'] = base_url('storage/desa/logo/') . 'default-logo.png';
        }

        $this->load->view('layouts/master_desa', $data);
    }

    private function pengajuan_penerbitan_kk_baru()
    {
        $pengajuan['wilayah_id'] = $this->session->userdata('wilayah_id');
        $pengajuan['nik'] = $this->session->userdata('nik_pemohon');
        $pengajuan['jenis_layanan'] = 1;

        $form = array(1);
        $lampiran = array();

        return $this->Pengajuan_model->set_pengajuan($pengajuan, $form, $lampiran);
    }
}