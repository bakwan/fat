<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_login extends CI_Model {

	public function getlogin($u,$p)
	{	
		$condition = "email =" . "'" . $u . "' AND " . "password =" . "'" .set_password($p). "' AND "."status=1"." ";
		$this->db->select('*');
		$this->db->from('ms_users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			$row = $query -> row_array();
			$this->session->set_userdata($row);
			$this->session->set_flashdata('success', 'Selamat anda berhasil login sebagai administrator');
			redirect('dashboard');
		} 
		else {
			$this->session->set_flashdata('info','username atau password salah');
			redirect('Authen');
		}	
	}

}
