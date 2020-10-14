<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerbitan_kk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Identitas_desa_model');
        $this->load->model('Data_masyarakat_model');
        $this->load->model('Pengajuan_model');
        $this->load->model('Penerbitan_kk_model');
    }

    private function set_partial_data($content)
    {
        $data['content']        = $content;
        $data['identitas_desa'] = $this->Identitas_desa_model->get_by_id($this->session->userdata('wilayah_id'));
        $data['title']          = $data['identitas_desa']->NAMA_KEL;
        if(!empty($data['identitas_desa']->LOGO)) {
            $data['logo'] = base_url('storage/desa/') . $data['identitas_desa']->NAMA_KEL . '/logo' . '/' . $data['identitas_desa']->LOGO; 
        } else {
            $data['logo'] = base_url('storage/desa/logo/') . 'default-logo.png';
        }

        return $data;
    }

    public function index()
    {
        $data = $this->set_partial_data('backend/desa/penerbitan_kk/index');

        $this->load->view('layouts/master_desa', $data);
    }

    public function penerbitan_kk_baru()
    {
        $data = $this->set_partial_data('backend/desa/penerbitan_kk/create');

        $this->load->view('layouts/master_desa', $data);
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

        $this->Penerbitan_kk_model->set_pengajuan_penerbitan_kk($pengajuan, $data_f101, $data_detail_f101);
    }

    public function input_detail_f101()
    {
        $data = $this->set_partial_data('backend/desa/penerbitan_kk/input_detail');

        $data['agama']              = $this->Data_masyarakat_model->get_all_agama();
        $data['cacat']              = $this->Data_masyarakat_model->get_all_cacat();
        $data['goldar']             = $this->Data_masyarakat_model->get_all_goldar();
        $data['hubkel']             = $this->Data_masyarakat_model->get_all_hubkel();
        $data['kawin']              = $this->Data_masyarakat_model->get_all_kawin();
        $data['kelainan']           = $this->Data_masyarakat_model->get_all_kelainan();
        $data['kawin']              = $this->Data_masyarakat_model->get_all_kawin();
        $data['pekerjaan']          = $this->Data_masyarakat_model->get_all_pekerjaan();
        $data['pendidikan']         = $this->Data_masyarakat_model->get_all_pendidikan();

        $data['agama_json']         = json_encode($this->Data_masyarakat_model->get_all_agama());
        $data['cacat_json']         = json_encode($this->Data_masyarakat_model->get_all_cacat());
        $data['goldar_json']        = json_encode($this->Data_masyarakat_model->get_all_goldar());
        $data['hubkel_json']        = json_encode($this->Data_masyarakat_model->get_all_hubkel());
        $data['kawin_json']         = json_encode($this->Data_masyarakat_model->get_all_kawin());
        $data['kelainan_json']      = json_encode($this->Data_masyarakat_model->get_all_kelainan());
        $data['kelamin_json']       = json_encode($this->Data_masyarakat_model->get_all_kelamin());
        $data['pekerjaan_json']     = json_encode($this->Data_masyarakat_model->get_all_pekerjaan());
        $data['pendidikan_json']    = json_encode($this->Data_masyarakat_model->get_all_pendidikan());

        $this->load->view('layouts/master_desa', $data);
    }
}