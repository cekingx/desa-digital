<?php defined('BASEPATH') OR exit('No direct script access allowed');

class detail_galeri_model extends CI_Model
{	
	public $desa;
	
	function __construct()
	{
		parent::__construct();
		$wilayah_id = $this->session->userdata('wilayah_id');
		$this->desa = $this->db->select('*')
		->from('ref_wilayah') 
		->where('id', $wilayah_id)
		->get()
		->row();
    }
	private $_table = "ta_detail_galeri";
	public $detail_galeri_foto = "default.png";
	public $detail_galeri_galeri_id;
	public $detail_galeri_galeri_slug;

	public function getAll($id)
	{
		return $this->db->get_where($this->_table, ["detail_galeri_galeri_id" => $id])->result();
		// return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["detail_galeri_id" => $id])->row();
	}

	public function getFotoBySlug($slug)
	{
		$this->db->select('*');		
		$this->db->where($_table, $slug);		
		return $this->db->get($this->_table)->result();	
	}

	public function save($id, $slug)
	{
    	$this->load->library('upload');
		$files = $_FILES;
		$cpt = count($_FILES["foto_galeri"]["name"]);
		print_r($_FILES);
		print_r($id);
		for ($i=0; $i < $cpt; $i++){
			if (!empty($_FILES["foto_galeri"]["name"][$i])) {
				$_FILES['foto_galeri']['name']= $files['foto_galeri']['name'][$i];
		        $_FILES['foto_galeri']['type']= $files['foto_galeri']['type'][$i];
		        $_FILES['foto_galeri']['tmp_name']= $files['foto_galeri']['tmp_name'][$i];
		        $_FILES['foto_galeri']['error']= $files['foto_galeri']['error'][$i];
		        $_FILES['foto_galeri']['size']= $files['foto_galeri']['size'][$i];

	            $file_ext = pathinfo($files["foto_galeri"]["name"][$i], PATHINFO_EXTENSION);
	            $file_name_upload = 'foto_galeri'.'-' . date('Y-m-d-H:i:s').'-'. $i;
	            $file_name = 'foto_galeri'.'-' . date('Y-m-d-H:i:s') .'-'. $i .'.' . $file_ext;
	            $data = array(
	                'foto_galeri' => $file_name
	            );
				// $this->upload->initialize();
				$this->doUpload($file_name_upload,"foto_galeri");
	            // $this->upload->do_upload('foto_galeri');
	            $dataInfo[] = $this->upload->data();

	        	$data1 = array(
					'detail_galeri_foto'=>$file_name,
					'detail_galeri_galeri_id'=>$id,
					'detail_galeri_galeri_slug'=>$slug
				);	  	    				  				   
				$this->db->insert($this->_table, $data1);	
	        } else {	        	
	        	$post = $this->input->post();		
				$this->detail_galeri_foto = $post["foto_galeri"];
				$this->detail_galeri_galeri_id = $id;
				$this->detail_galeri_galeri_slug = $slug;
		    	$this->db->insert($this->_table, $this);	 	    		
	        }
    	}	    	
	}	
	
	public function delete($id)
	{
		$this->_deleteFile($id);
		return $this->db->delete($this->_table, array("detail_galeri_id" => $id));
	}

	public function deleteAll($id)
	{
		$this->_deleteFileAll($id);
		return $this->db->delete($this->_table, array("detail_galeri_galeri_id" => $id));
	}	

	private function doUpload($file_name,$key)
	{
			$config['upload_path']	 = './storage/desa/BLAHBATUH/galeri';
			$config['allowed_types'] = '*';
			$config['max_size']      = '0';
			$config['file_name']     = $file_name;
			$config['overwrite']     = 'TRUE';

			// $this->load->library('upload', $config);
 
			// if ( ! $this->upload->do_upload('foto_galeri[]')){
			// 	$error = array('error' => $this->upload->display_errors());
			// 	$this->load->view('layouts/master_desa', $error);
			// }else{
			// 	$data = array('upload_data' => $this->upload->data());
			// 	$this->load->view('layouts/master_desa', $data);
			// }
			
			// $this->upload->initialize($config);
			// $upload_data = $this->upload->data('foto_galeri[]');
			// return $upload_data['file_name'];

			$this->upload->initialize($config);
			$this->upload->do_upload($key);
			$upload_data = $this->upload->data();
			return $upload_data['file_name'];
	}

	private function _deleteFile($id)
	{
	    $detail_galeri = $this->getById($id);
	    if ($detail_galeri->detail_galeri_foto != "default.pdf") {
		    $filename = explode(".", $detail_galeri->detail_galeri_foto)[0];
			return array_map('unlink', glob(FCPATH."./storage/desa/BLAHBATUH/galeri/$filename.*"));
	    }
	}

	private function _deleteFileAll($id)
	{
	    $detail_galeri = $this->getAll($id);
	    foreach($detail_galeri as $data){
	    	if ($data->detail_galeri_foto != "default.pdf") {
		    	$filename = explode(".", $data->detail_galeri_foto)[0];
				array_map('unlink', glob(FCPATH.'./storage/desa/BLAHBATUH/galeri/$filename.*'));
	    	}
	    }	    	    		   	  
	}
}