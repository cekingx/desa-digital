<?php defined('BASEPATH') or exit('No direct script access allowed');

class Authentication
{
	private $ci;
	function __construct()
	{
		$this->ci = &get_instance();
		$this->ci->load->database();
		$this->ci->load->library('session');
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
				return FALSE;
			} else {
				if (password_verify($password, $user->row()->user_password)) {
					if ($user->row()) {
						$data_login = array(
							'user_login_at' => date('Y-m-d H:i:s')
						);
						$this->ci->db->where('user_id', $user->row()->user_id);
						$this->ci->db->update('ref_user', $data_login);
						$this->ci->session->set_userdata(array(
							'user_id'           => $user->row()->user_id,
							'user_nama'     	=> $user->row()->user_nama,
							'user_username'     => $user->row()->user_username,
							'user_prev_id'     	=> $user->row()->user_prev_id,
						));
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
		$this->ci->session->unset_userdata('user_nama');
		$this->ci->session->unset_userdata('user_username');
		$this->ci->session->unset_userdata('user_prev_id');
		return TRUE;
	}
}
