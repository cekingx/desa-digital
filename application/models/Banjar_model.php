<?php

class Banjar_model extends CI_Model
{
    private $table = 'ref_banjar';

    public $banjar_id;
    public $banjar_wilayah_id;
    public $banjar_nama;
    public $banjar_is_deleted;

    public function __construct()
    {
        parent::__construct();
    }

    public function get_by_id($banjar_id)
    {
        return $this->db->select('*')
                        ->from($this->table)
                        ->where($this->banjar_id, $banjar_id)
                        ->get()
                        ->row();
    }

    public function get_by_wilayah_id($wilayah_id)
    {
        return $this->db->select('*')
                        ->from($this->table)
                        ->where($this->banjar_wilayah_id, $wilayah_id)
                        ->where($this->banjar_is_deleted, 0)
                        ->get()
                        ->result();
    }

    public function save($wilayah_id)
    {
        $post = $this->input->post();
        $this->banjar_wilayah_id = $wilayah_id;
        $this->banjar_nama = $post['banjar_nama'];
        $this->banjar_is_deleted = 0;
        $this->db->set('banjar_created_at', 'NOW()', FALSE);
        $this->db->set('banjar_updated_at', 'NOW()', FALSE);

        return $this->db->insert($this->table, $this);
    }

    public function update($banjar_id)
    {
        $post = $this->input->post();
        $this->banjar_id = $banjar_id;
        $this->banjar_nama = $post['banjar_nama'];
        $this->db->set('banjar_updated_at', 'NOW()', FALSE);

        return $this->db->where('banjar_id', $this->banjar_id)
                        ->update($this->table, $this);
    }

    public function delete($banjar_id)
    {
        $this->banjar_id = $banjar_id;
        $this->banjar_is_deleted = 1;
        $this->db->set('banjar_updated_at', 'NOW()', FALSE);

        return $this->db->where('banjar_id', $this->banjar_id)
                        ->update($this->table, $this);
    }
}