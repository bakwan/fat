<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Konsumsi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('Model_konsumsi');
        $this->load->library('form_validation');
    }

    public function index()
    {	
		$data = array(
            'button' => 'Ajukan',
            'action' => site_url('konsumsi/save'),
	    'id' => set_value('id'),
	    'nama' => set_value('nama'),
		'lokasi' => set_value('lokasi'),
	    'waktu' => set_value('waktu'),
	    'jenis' => set_value('jenis'),
	    'keperluan' => set_value('keperluan'),
	    'create_at' => date('Y-m-d H:i:s'),
	    'jumlah' => set_value('jumlah'));
        $this->template->load('templateWeb','website/konsumsi',$data);
    }

    public function save(){
		$this->_rules();
    	if($this->form_validation->run()== FALSE){
			$this->index();
			}else{
			$data=array(
			'id_member'		=> $this->session->userdata('id'),	
			'id_lokasi'     =>	$this->input->post('id_lokasi'),
			'id_instansi'	=> $this->session->userdata('instansi'),
			'waktu_kirim'   =>	$this->input->post('waktu_kirim'),
			'bagian'   =>	$this->input->post('bagian'),
			'sub_bag'   =>	$this->input->post('sub_bag'),
			'jenis'         =>	$this->input->post('jenis'),
			'jumlah'         =>	$this->input->post('jumlah'),
			'keperluan'     =>	$this->input->post('keperluan'),
			'create_at'		=> date('y-m-d H:i:s'),
			'status'   		=>	1,
			'jalur_pesan'	=>	0,  	
			'jumlah'        =>	$this->input->post('jumlah'));
			$this->db->insert('tb_konsumsi',$data);
			$this->session->set_flashdata('message', 'Pemesanan Konsumsi sedang diproses silahkan menunggu proses selanjutnya');
			redirect('Profile');
			}		
	}
	
	public function _rules(){
	$this->form_validation->set_rules('waktu_kirim', 'waktu_kirim', 'trim|required');
	$this->form_validation->set_rules('jenis', 'jenis', 'trim|required');
	$this->form_validation->set_rules('keperluan', 'keperluan', 'trim|required');
	$this->form_validation->set_rules('bagian', 'bagian', 'trim|required');
	$this->form_validation->set_rules('sub_bag', 'sub_bag', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'numeric|required');
	
	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}    