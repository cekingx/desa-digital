<?php

class Identitas_desa_model extends CI_Model
{
    public $desa;

    public function __construct()
    {
        parent::__construct();
        $wilayah_id = $this->session->userdata('id');
        $this->desa = $this->db->select('*')
                            ->from('ref_wilayah') 
                            ->where('id', $wilayah_id)
                            ->get()
                            ->row();
    }

    public function get_by_id($wilayah_id)
    {
        return $this->db->get_where('ref_wilayah', array('id' => $wilayah_id))->row();
    }

    public function update($wilayah_id)
    {
        $post = $this->input->post();
        if(!empty($_FILES['logo']['name'])) {
            $logo = $this->upload_logo($this->desa->NAMA_KEL);
        } else {
            $logo = $post['old_logo'];
        }

        $data = array(
            'alamat_kantor' => $post['alamat_kantor'],
            'telp_desa'     => $post['telp_desa'],
            'sejarah'       => $post['sejarah'],
            'visi'          => $post['visi'],
            'misi'          => $post['misi'],
            'latitude'      => $post['latitude'],
            'longitude'     => $post['longitude'],
            'logo'          => $logo
        );

        $this->db->where('id', $wilayah_id)
                ->update('ref_wilayah', $data);
    }

    public function update_kades($wilayah_id)
    {
        $post = $this->input->post();
        if(!empty($_FILES['foto_kades']['name'])) {
            $foto = $this->upload_foto_kades($this->desa->NAMA_KEL);
        } else {
            $foto = $post['old_foto_kades'];
        }
        $data = array(
            'nama_kades' => $post['nama_kades'],
            'foto_kades' => $foto
        );

        $this->db->where('id', $wilayah_id)
                ->update('ref_wilayah', $data);
    }

    public function update_sekdes($wilayah_id)
    {
        $post = $this->input->post();
        if(!empty($_FILES['foto_sekdes']['name'])) {
            $foto = $this->upload_foto_sekdes($this->desa->NAMA_KEL);
        } else {
            $foto = $post['old_foto_sekdes'];
        }
        $data = array(
            'nama_sekdes' => $post['nama_sekdes'],
            'foto_sekdes' => $foto
        );

        $this->db->where('id', $wilayah_id)
                ->update('ref_wilayah', $data);
    }

    private function upload_logo($nama_desa)
    {
        $file_name = 'logo-' . $nama_desa;
        $config['upload_path'] = './storage/desa/' . $nama_desa . '/logo';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $file_name;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);
        if($this->upload->do_upload('logo')) {
            return $this->upload->data('file_name');
        }

        die($this->upload->display_errors());
        return 'default-logo.png';
    }

    private function upload_foto_kades($nama_desa)
    {
        $file_name = 'foto-kades' . '-' . $nama_desa;
        $config['upload_path'] = './storage/desa/' . $nama_desa . '/foto';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $file_name;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);
        if($this->upload->do_upload('foto_kades')) {
            return $this->upload->data('file_name');
        }

        // die($this->upload->display_errors());
        return 'default-foto.png';
    }

    private function upload_foto_sekdes($nama_desa)
    {
        $file_name = 'foto-sekdes' . '-' . $nama_desa;
        $config['upload_path'] = './storage/desa/' . $nama_desa . '/foto';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $file_name;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);
        if($this->upload->do_upload('foto_sekdes')) {
            return $this->upload->data('file_name');
        }

        // die($this->upload->display_errors());
        return 'default-foto.png';
    }
}