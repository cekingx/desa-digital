<?php
defined('BASEPATH') or exit('No direct access script allowed');

class Penerbitan_ktp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Identitas_desa_model');
        $this->load->model('Desa/Penerbitan_ktp_model', 'penerbitan_ktp_model');
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

    public function penerbitan_ktp_baru()
    {
        $data = $this->set_partial_data('backend/desa/penerbitan_ktp/create');

        $this->load->view('layouts/master_desa', $data);
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