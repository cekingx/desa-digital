<?php defined('BASEPATH') OR exit('No direct script access allowed');

class detail_galeri_model extends CI_Model
{	
	function __construct(){
        parent::__construct();
    }

	private $_table = "ta_detail_galeri";	

	public $detail_galeri_foto = "default.png";
	public $detail_galeri_galeri_id;
	public $detail_galeri_galeri_slug;		

	//ambil data seluruh media berdasarkan id galeri
	public function getAll($id)
	{
		return $this->db->get_where($this->_table, ["detail_galeri_galeri_id" => $id])->result();
		// return $this->db->get($this->_table)->result();
	}

	//ambil data media
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

	//save upload foto_galeri dan link
	public function save($id, $slug)
	{
    	$this->load->library('upload');
		$files = $_FILES;
		$cpt = count($_FILES["foto_galeri"]["name"]);
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
	            $this->upload->initialize($this->doUpload($file_name_upload));            
	            $this->upload->do_upload('foto_galeri');
	            // $dataInfo[] = $this->upload->data();

	        	$data1 = array(
					'detail_galeri_foto'=>$file_name,
					'detail_galeri_galeri_id'=>$id,
					'detail_galeri_galeri_slug'=>$slug
				);	  	    				  				   
				$this->db->insert($this->_table, $data1);	
	        } else {	        	
	        	$post = $this->input->post();		
				$this->detail_galeri_foto = $post["video_galeri"];
				$this->detail_galeri_galeri_id = $id;
				$this->detail_galeri_galeri_slug = $slug;
		    	$this->db->insert($this->_table, $this);	 	    		
	        }
	        
    	}	    	
    	
	}	
	
	//hapus data media
	public function delete($id)
	{
		$this->_deleteFile($id);
		return $this->db->delete($this->_table, array("detail_galeri_id" => $id));
	}

	//hapus seluruh media jika data galeri terhapus
	public function deleteAll($id)
	{
		$this->_deleteFileAll($id);
		return $this->db->delete($this->_table, array("detail_galeri_galeri_id" => $id));
	}	

	//config upload
	private function doUpload($file_name)
	{
		$config['upload_path']		= './storage/desa/BLAHBATUH/galeri';
		$config['allowed_types']	= 'gif|jpg|png';
		$config['file_name']		= $file_name;
		$config['overwrite']		= true;
		$config['max_size']			= 0; //2MB
		//$config['max_width']		= 1024;
		//$config['max_height']		= 768;

		return $config;
	}

	//hapus file satu satu
	private function _deleteFile($id)
	{
	    $detail_galeri = $this->getById($id);
	    if ($detail_galeri->detail_galeri_foto != "default.pdf") {
		    $filename = explode(".", $detail_galeri->detail_galeri_foto)[0];
			return array_map('unlink', glob(FCPATH."./storage/desa/BLAHBATUH/galeri/$filename.*"));
	    }
	}

	//hapus file keseluruhan berdasarkan id galeri
	private function _deleteFileAll($id)
	{
	    $detail_galeri = $this->getAll($id);
	    foreach($detail_galeri as $data){
	    	if ($data->detail_galeri_foto != "default.pdf") {
		    	$filename = explode(".", $data->detail_galeri_foto)[0];
				array_map('unlink', glob(FCPATH."./storage/desa/BLAHBATUH/galeri/$filename.*"));
	    	}
	    }	    	    		   	  
	}
	
}