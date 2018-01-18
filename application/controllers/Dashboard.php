<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index()
	{
		$this->session->set_flashdata('message', 'Selamat datang di halaman admin');
		$this->template->load('templateadmin','dashboard');
	}
}
