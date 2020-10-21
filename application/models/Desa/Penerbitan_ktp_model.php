<?php

class Penerbitan_ktp_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
    }

    /**
     * @param   $pengajuan      berisi wilayah_id, nik, id_layanan
     * @param   $files          berisi array nama field di form dan nama lampiran
     * 
     * $files = [
     *      'kk'               => 'KK',
     *      'surat_pengantar'   => 'Surat Pengantar'
     * ]
     * 
     * TODO:
     * - input ke pengajuan
     * - input ke detail_pengajuan_lampiran
     * - tentukan path
     */
    public function set_pengajuan_penerbitan_ktp($pengajuan, $files)
    {
        $data_pengajuan['pengajuan_wilayah_id']             = $pengajuan['wilayah_id'];
        $data_pengajuan['pengajuan_nik']                    = $pengajuan['nik'];
        $data_pengajuan['pengajuan_jenis_layanan']          = 2;
        $data_pengajuan['pengajuan_status_pengajuan_id']    = 1;

        $this->db->trans_start();

        // input ke pengajuan
        $this->db->insert('ta_pengajuan', $data_pengajuan);
        $pengajuan_id = $this->db->insert_id();

        $path = $this->get_path($pengajuan_id);

        // input ke detail_pengajuan_lampiran
        foreach($files as $key => $nama) {
            $nama_file = $this->upload_file($key, $path);

            $data_lampiran = array(
                'detail_pengajuan_lampiran_pengajuan_id'    => $pengajuan_id,
                'detail_pengajuan_lampiran_nama'            => $nama,
                'detail_pengajuan_lampiran_nama_file'       => $nama_file,
                'detail_pengajuan_lampiran_path'            => $path
            );
            $this->db->insert('ta_detail_pengajuan_lampiran', $data_lampiran);
        }

        $this->db->trans_complete();
    }

    // $file = 'ktp'
    private function upload_file($file, $path)
    {
        $this->upload->initialize($this->upload_config($file, $path));
        $this->upload->do_upload($file);
        // die($this->upload->display_errors());
        return $this->upload->data('file_name');
    }

    private function get_path($pengajuan_id)
    {
        $dir_path = "storage/penerbitan_ktp/" . $pengajuan_id;
        if(!is_dir($dir_path)) {
            mkdir(FCPATH . '/' . $dir_path, 0777);
        }

        return $dir_path;
    }

    private function upload_config($filename, $path)
    {
        $config['upload_path']      = $path;
        $config['allowed_types']    = 'gif|jpeg|jpg|png|pdf';
        $config['file_name']        = $filename;
        $config['overwrite']        = true;
        $config['max_size']         = 2048;

        return $config;
    }
}