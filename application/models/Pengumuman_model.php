<?php

class Pengumuman_model extends CI_Model
{
    private $table = 'ta_pengumuman';

    public $pengumuman_id;
    public $pengumuman_wilayah_id;
    public $pengumuman_judul;
    public $pengumuman_isi;
    public $pengumuman_is_deleted;

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function get_by_id($pengumuman_id)
    {
        return $this->db->select('*')
                        ->from($this->table)
                        ->where('pengumuman_id', $pengumuman_id)
                        ->get()
                        ->row();
    }

    public function get_by_wilayah_id($wilayah_id)
    {
        return $this->db->select('*')
                        ->from($this->table)
                        ->where($this->pengumuman_wilayah_id, $wilayah_id)
                        ->where($this->pengumuman_is_deleted, 0)
                        ->get()
                        ->result();
    }

    public function save($wilayah_id)
    {
        $post = $this->input->post();
        $this->pengumuman_wilayah_id = $wilayah_id;
        $this->pengumuman_judul = $post['pengumuman_judul'];
        $this->pengumuman_isi = $post['pengumuman_isi'];
        $this->pengumuman_is_deleted = 0;
        $this->db->set('pengumuman_created_at', 'NOW()', FALSE);
        $this->db->set('pengumuman_updated_at', 'NOW()', FALSE);

        return $this->db->insert($this->table, $this);
    }

    public function update($pengumuman_id)
    {
        $post = $this->input->post();
        $this->pengumuman_id = $pengumuman_id;
        $this->pengumuman_wilayah_id = $this->session->userdata('wilayah_id');
        $this->pengumuman_judul = $post['pengumuman_judul'];
        $this->pengumuman_isi = $post['pengumuman_isi'];
        $this->db->set('pengumuman_updated_at', 'NOW()', FALSE);

        return $this->db->where('pengumuman_id', $this->pengumuman_id)
                        ->update($this->table, $this);
    }

    public function delete($pengumuman_id)
    {
        return $this->db->delete($this->table, ['pengumuman_id' => $pengumuman_id]);
    }
}