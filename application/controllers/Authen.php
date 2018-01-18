<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Authen extends CI_Controller{
    
	public function index(){
		$this->load->view('authen/login');
	}
	
	public function get_login(){
		$u = $this->input->post('email');
		$p = $this->input->post('password');
		$this->load->model('Model_login');
		$this->Model_login->getlogin($u,$p);
		$this->session->set_userdata('name', $valid_user->name);
	}
	function logout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata('success', 'Selamat anda berhasil logout dari aplikasi perpustakaan, pastikan password tetap menjadi rahasia seperti rahasia jodoh yang Tuhan berikan');
        redirect('Authen');
	}
}    
    	