<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Authen_member extends CI_Controller{
    
	public function index(){
		$this->load->view('authen_member/login');
	}
	
	public function get_login(){
		$u = $this->input->post('email');
		$p = $this->input->post('password');
		$this->load->model('Model_login_member');
		$this->Model_login_member->getlogin($u,$p);
		$this->session->set_userdata('name', $valid_user->name);
	}
	function logout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata('success', 'Selamat anda berhasil logout dari aplikasi perpustakaan, pastikan password tetap menjadi rahasia seperti rahasia jodoh yang Tuhan berikan');
        redirect('Authen_member');
	}
}    
    	