<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_model extends CI_Model
{	
	function __construct(){
        parent::__construct();
    }

	private $_table = "ta_galeri";	

    public $galeri_id;
    public $galeri_wilayah_id;
	public $galeri_judul;
	public $galeri_deskripsi;
	public $galeri_slug;	
	
	public function rules()
	{
		return [
			['field' => 'judul_galeri', 
			'label' => 'judul galeri', 
			'rules' => 'required'],

			['field' => 'deskripsi_galeri', 
			'label' => 'deskripsi galeri', 
			'rules' => 'required']							
		];
	}

	public function getNumRows()
	{
		return $this->db->get($this->_table)->num_rows();
	}

	public function getAll()
	{		
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["galeri_id" => $id])->row();
	}

	public function getBySlug($slug)
	{
		return $this->db->get_where($this->_table, ["galeri_slug" => $slug])->row();
	}	

	public function save($wilayah_id)
	{
		// return print_r($this->upload_image());
		$post = $this->input->post();
        $this->galeri_wilayah_id = $wilayah_id;
		$this->galeri_judul = $post["judul_galeri"];		
		$this->galeri_deskripsi = $post["deskripsi_galeri"];
        $this->galeri_slug = url_title($this->galeri_judul, '-', TRUE);
		$this->db->set('galeri_created_at', 'NOW()', FALSE);
        $this->db->set('galeri_updated_at', 'NOW()', FALSE);
		return $this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->galeri_id = $post["id"];
		$this->galeri_judul = $post["judul_galeri"];		
		$this->galeri_deskripsi = $post["deskripsi_galeri"];
		$this->galeri_slug = $post["slug_galeri"];
        $this->db->set('galeri_updated_at', 'NOW()', FALSE);
		return $this->db->update($this->_table, $this, array('galeri_id' => $post["id"]));
	}

	public function delete($id)
	{		
		return $this->db->delete($this->_table, array("galeri_id" => $id));
	}
}