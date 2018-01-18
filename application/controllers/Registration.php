<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Registration extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
		$this->load->model('Model_website');
		$this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index()
    {	

		$data = array(
            'button' => 'Save',
            'action' => site_url('Pengaduan/save'),
	    'id' => set_value('id'),
		'nik'=> set_value('nik'),
		'date'=> set_value('date'),
	    'name' => set_value('name'),
		'gender' => set_value('gender'),
		'fat' => set_value('fat'),
		'negara' => set_value('negara'),
		'status' => set_value('status'),
		'tbadan' => set_value('tbadan'),
		'bbadan' => set_value('bbadan'),
		'kacamata' => set_value('kacamata'),
		'domisili' => set_value('domisili'),
		'pendidikan' => set_value('pendidikan'),
		'telp' => set_value('telp'),
		'email' => set_value('email'),
		'motivasi' => set_value('motivasi'),
		'family' => set_value('family'),
		'kota' => set_value('kota'),
		'tanggal_lahir' => set_value('tanggal_lahir'));
        $this->template->load('templateWeb','website/Registration',$data);
    }

    public function save(){
    	$this->_rules();
    	if($this->form_validation->run()== FALSE){
			$this->index();
		}else{
			$config = array(
				'upload_path' 		=> './upload/asset/',
				'allowed_types'		=> 'jpg|png',
				'remove_space'		=> 'TRUE',
				'overwrite'			=> 'FALSE',
				'max_size'			=> '2048');
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('userfile_1')){
				$userfile_1 = array('upload_data'=>$this->upload->data());
				$dataupload['image1_rng']= str_replace("","_",$userfile_1['upload_data']['file_name']);
			}
			if($this->upload->do_upload('userfile_2')){
				$userfile_2 = array('upload_data'=>$this->upload->data());
				$dataupload['image1_rng']= str_replace("","_",$userfile_2['upload_data']['file_name']);
			}
	        $this->Model_website->simpan($dataupload['image1_rng'],$dataupload['image1_rng']);
	        $this->session->set_flashdata('message', 'Selamat pendaftaran anda berhasil di simpan');
            redirect(site_url('Registration'));
	        }
		}
	public function _rules(){
		if (empty($_FILES['userfile_1']['name']))
		{
			$this->form_validation->set_rules('userfile', 'masukan full foto', 'required');
		}
		if (empty($_FILES['userfile_2']['name']))
		{
			$this->form_validation->set_rules('userfile_2', 'masukan pas foto', 'required');
		}
		$this->form_validation->set_rules('nik', 'lokasi', 'trim|required');
		$this->form_validation->set_rules('name', 'waktu', 'trim|required');
		$this->form_validation->set_rules('telp', 'telp ruang', 'trim|required');
		$this->form_validation->set_rules('domisili', 'keluhan', 'trim|required');
		$this->form_validation->set_rules('gender', 'ket aksi', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'jalur pesan', 'trim|required');
		$this->form_validation->set_rules('fat', 'jam tangan', 'trim|required');
		$this->form_validation->set_rules('negara', 'jam selesai', 'trim|required');
		$this->form_validation->set_rules('status', 'status', 'trim|required');
		$this->form_validation->set_rules('tbadan', 'lokasi', 'trim|required');
		$this->form_validation->set_rules('bbadan', 'waktu', 'trim|required');
		$this->form_validation->set_rules('kacamata', 'telp ruang', 'trim|required');
		$this->form_validation->set_rules('pendidikan', 'keluhan', 'trim|required');
		$this->form_validation->set_rules('email', 'unit penanganan', 'trim|required');
		$this->form_validation->set_rules('motivasi', 'ket aksi', 'trim|required');
		$this->form_validation->set_rules('family', 'jalur pesan', 'trim|required');
		$this->form_validation->set_rules('kota', 'jam tangan', 'trim|required');
	
		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}    