<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller
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
    	$this->template->load('templateWeb','website/pages');
    }
    public function Create_Pengaduan(){
        $this -> __rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
        $data = array(
            'keluhan' => $this->input->post('keluhan'), 
            'id_member'=> $this->session->userdata('id'),
            'waktu' => date('Y-m-d H:i:s'),
            'create_at' => date('Y-m-d H:i:s'),
            'lokasi'  => $this->input->post('lokasi'));
        $this->db->insert('ms_keluhan',$data);
        }    
    }
    public function Create_konsumsi(){
        $data = array(
            'id_member'=> $this->session->userdata('id'),
            'lokasi' =>$this->input->post('lokasi'), 
            'waktu' =>$this->input->post('waktu'),
            'jenis' =>$this->input->post('jenis'),
            'jumlah' =>$this->input->post('jumlah'),
            'keperluan' =>$this->input->post('keperluan'),
            'create_at' => date('Y-m-d H:i:s'));
         $this->db->insert('ms_konsumsi',$data);    
    }
    public function __rules(){

        $this->form_validation->set_rules('keluhan', 'keluhan', 'trim|required');
        $this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');   
    }
    public function __rules_konsumsi(){

        $this->form_validation->set_rules('keperluan', 'keperluan', 'trim|required');
        $this->form_validation->set_rules('waktu', 'waktu', 'trim|required');
        $this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required');
        $this->form_validation->set_rules('jumlah', 'keperluan', 'trim|required');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');   
    }
}    
