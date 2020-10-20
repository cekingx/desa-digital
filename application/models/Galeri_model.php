<?php

class Galeri_model extends CI_Model
{
    private $table_galeri = 'ta_galeri';

    public $galeri_id;
    public $galeri_wilayah_id;
	public $galeri_judul;
	public $galeri_deskripsi;
    public $galeri_is_deleted;

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all() 
    {
        return $this->db->get($this->table_galeri)->result_array();
    }

    public function get_by_id($galeri_id)
    {
        return $this->db->select('*')
                        ->from($this->table_galeri)
                        ->where('galeri_id', $galeri_id)
                        ->get()
                        ->row();
    }

    public function get_by_wilayah_id($wilayah_id)
    {
        return $this->db->select('*')
                        ->from($this->table_galeri)
                        ->where($this->galeri_wilayah_id, $wilayah_id)
                        ->where($this->galeri_is_deleted, 0)
                        ->get()
                        ->result();
    }

    public function save($wilayah_id)
    {
        $post = $this->input->post();
        $this->galeri_wilayah_id = $wilayah_id;
		$this->galeri_judul = $post['galeri_judul'];
        $this->galeri_deskripsi = $post['galeri_deskripsi'];
        $this->galeri_is_deleted = 0;
        $this->db->set('galeri_created_at', 'NOW()', FALSE);

        return $this->db->insert($this->table_galeri, $this);
    }

    public function update($galeri_id)
    {
        $post = $this->input->post();
		$this->galeri_id = $galeri_id;
        $this->galeri_wilayah_id = $post['galeri_wilayah_id'];
        $this->galeri_judul = $post['galeri_judul'];
		$this->galeri_deskripsi = $post['galeri_deskripsi'];
        $this->db->set('galeri_updated_at', 'NOW()', FALSE);

        if (!empty($_FILES["detail_galeri_foto"]["name"])) {
            $this->detail_galeri_foto = $this->uploadImage();
        } else {
            $this->detail_galeri_foto = $post["old_image"];
		}

        return $this->db->where('galeri_id', $this->galeri_id)
                        ->update($this->table_galeri, $this);
    }

    public function delete($galeri_id)
    {
        return $this->db->delete($this->table_galeri, ['galeri_id' => $galeri_id]);
    }

}