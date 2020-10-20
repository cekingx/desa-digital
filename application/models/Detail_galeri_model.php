<?

class Detail_galeri_model extends CI_Model
{
	public $desa;
    private $table_detail_galeri = 'ta_detail_galeri';

    public $detail_galeri_id;
    public $detail_galeri_galeri_id;
    public $detail_galeri_foto = "default.jpg";

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll($detail_galeri_galeri_id)
    {
        return $this->db->get_where($this->table)
                        ->result();
    }

    public function getById($detail_galeri_id)
    {
        return $this->db->get_where($this->table)
                        ->row();
    }

	public function save($wilayah_id)
	{
		
	}

	private function upload_foto($detail_galeri_id, $nama_desa)
    {
        $file_name = 'foto-galeri' . '-' . $detail_galeri_id;
        $config['upload_path'] = './storage/desa/' . $nama_desa . '/galeri';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $file_name;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);
        if($this->upload->do_upload('foto_galeri')) {
            return $this->upload->data('file_name');
        }

        // die($this->upload->display_errors());
        return 'default-foto.png';
    }
	
}