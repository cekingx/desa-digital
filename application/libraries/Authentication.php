<?php defined('BASEPATH') or exit('No direct script access allowed');

class Authentication
{
	private $ci;
	private $db_masyarakat;

	function __construct()
	{
		$this->ci = &get_instance();
		$this->ci->load->database();
		$this->ci->load->library('session');
        $this->db_masyarakat = $this->ci->load->database('data_masyarakat', TRUE);
	}

	public function is_loggedin()
	{
        return (bool) $this->ci->session->userdata('user_id');
	}

	public function login($username, $password)
	{
		if ($username != "" || $password != "") {
			$this->ci->db->select('*');
			$this->ci->db->from('ref_user');
			$this->ci->db->where('user_username', $username);
			$user = $this->ci->db->get();
			if ($user->num_rows() == 0) {
				if($this->register_masyarakat($username, $password)) {
					return $this->login_after_register($username, $password);
				} else {
					return FALSE;
				};
			} else {
				if (password_verify($password, $user->row()->user_password)) {
					if ($user->row()) {
						$data_login = array(
							'user_login_at' => date('Y-m-d H:i:s')
						);
						$this->ci->db->where('user_id', $user->row()->user_id);
						$this->ci->db->update('ref_user', $data_login);
						$this->ci->session->set_userdata(array(
							'user_id'               => $user->row()->user_id,
							'wilayah_id'     	    => $user->row()->user_wilayah_id,
							'user_role_id'          => $user->row()->user_user_role_id,
							'user_nama'				=> $user->row()->user_nama,
						));
						if($user->row()->user_user_role_id == 4) {
							$this->ci->session->set_userdata(array(
								'nik_pemohon' => $username
							));
						}
						return TRUE;
					} else {
						return FALSE;
					}
				} else {
					return FALSE;
				}
			}
		} else {
			return FALSE;
        }
	}

	public function logout()
	{
		$this->ci->session->unset_userdata('user_id');
		$this->ci->session->unset_userdata('user_username');
		$this->ci->session->unset_userdata('user_role_id');
		$this->ci->session->unset_userdata('wilayah_id');
		$this->ci->session->unset_userdata('nik_pemohon');
		$this->ci->session->unset_userdata('user_nama');
		return TRUE;
	}

	public function login_after_register($username, $password)
	{
		$user = $this->ci->db->select('*')
							->from('ref_user')
							->where('user_username', $username)
							->get();

		if($user->num_rows() == 0) {
			return FALSE;
		}

		if(password_verify($password, $user->row()->user_password)) {
			if ($user->row()) {
				$data_login = array(
					'user_login_at' => date('Y-m-d H:i:s')
				);
				$this->ci->db->where('user_id', $user->row()->user_id);
				$this->ci->db->update('ref_user', $data_login);
				$this->ci->session->set_userdata(array(
					'user_id'               => $user->row()->user_id,
					'wilayah_id'     	    => $user->row()->user_wilayah_id,
					'user_role_id'          => $user->row()->user_user_role_id,
					'user_nama'				=> $user->row()->user_nama,
					'nik_pemohon'			=> $username
				));
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}

	public function register_masyarakat($nik, $no_kk)
	{
		if($this->cek_nik_ektp($nik, $no_kk) != FALSE) {
			$data = $this->cek_nik_ektp($nik, $no_kk);
			$wilayah_id = $this->get_wilayah_id($data->NO_KAB_EKTP, $data->NO_KEC_EKTP, $data->NO_KEL_EKTP);
			$this->save_user_ektp($data, $wilayah_id);

			return TRUE;
		} else if($this->cek_nik($nik, $no_kk) != FALSE) {
			$data = $this->cek_nik($nik, $no_kk);
			$wilayah_id = $this->get_wilayah_id($data->NO_KAB, $data->NO_KEC, $data->NO_KEL);
			$this->save_user($data, $wilayah_id);

			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function save_user_ektp($data_masyarakat, $wilayah_id) {
		$user['user_username'] 		= $data_masyarakat->NIK_EKTP;
		$user['user_wilayah_id'] 	= $wilayah_id;
		$user['user_password'] 		= password_hash($data_masyarakat->NO_KK_EKTP, PASSWORD_DEFAULT);
		$user['user_nama'] 			= $data_masyarakat->NAMA_LGKP_EKTP;
		$user['user_foto'] 			= 'default.jpg';
		$user['user_user_role_id'] 	= 4;

		$this->ci->db->insert('ref_user', $user);
	}

	public function save_user($data_masyarakat, $wilayah_id) {
		$user['user_username'] 		= $data_masyarakat->NIK;
		$user['user_wilayah_id'] 	= $wilayah_id;
		$user['user_password'] 		= password_hash($data_masyarakat->NO_KK, PASSWORD_DEFAULT);
		$user['user_nama'] 			= $data_masyarakat->NAMA_LGKP;
		$user['user_foto'] 			= 'default.jpg';
		$user['user_user_role_id'] 	= 4;

		$this->ci->db->insert('ref_user', $user);
	}

	public function cek_nik_ektp($nik, $no_kk)
	{
		$data_masyarakat = $this->db_masyarakat->select('*')
											->from('dat_masyarakat')
											->where('NIK_EKTP', $nik)
											->where('NO_KK_EKTP', $no_kk)
											->get()
											->row();

		if(!empty($data_masyarakat)) {
			return $data_masyarakat;
		} else {
			return FALSE;
		}
	}

	public function cek_nik($nik, $no_kk)
	{
		$data_masyarakat = $this->db_masyarakat->select('*')
											->from('dat_masyarakat')
											->where('NIK', $nik)
											->where('NO_KK', $no_kk)
											->get()
											->row();

		if(!empty($data_masyarakat)) {
			return $data_masyarakat;
		} else {
			return FALSE;
		}
	}

	public function get_wilayah_id($no_kab, $no_kec, $no_kel)
	{
		$wilayah_id = $this->ci->db->select('id')
								->from('ref_wilayah')
								->where('NO_KAB', $no_kab)
								->where('NO_KEC', $no_kec)
								->where('NO_KEL', $no_kel)
								->get()
								->row();
		return $wilayah_id->id;
	}
}
