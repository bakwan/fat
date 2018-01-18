<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ad_registration extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('Model_ad_Registration');
        $this->load->library('form_validation');
        $this->load->library('pdf');
    }
    public function index(){
        $ad_Registration = $this->Model_ad_Registration->get_all();

        $data = array(
            'ad_Registration_data' => $ad_Registration
        );
        $this->template->load('templateadmin','ad_registration/list',$data);
    }
    public function read($id) 
    {
        $row = $this->Model_ad_Registration->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nik' => $row->nik,
		'date' => $row->date,
		'name' => $row->name,
		'gender' => $row->gender,
		'tanggal_lahir' => $row->tanggal_lahir,
		'fat' => $row->fat,
		'negara' => $row->negara,
		'status' => $row->status,
		'tbadan' => $row->tbadan,
		'bbadan' => $row->bbadan,
		'kacamata' => $row->kacamata,
        'pendidikan' => $row->pendidikan,
        'domisili' => $row->domisili,
		'telp' => $row->telp,
		'email' => $row->email,
		'motivasi' => $row->motivasi,
		'family' => $row->family,
		'full_foto' => $row->full_foto,
		'pas_foto' => $row->pas_foto,
        'kota' => $row->kota,
        
	    );
            $this->template->load('templateadmin','ad_registrasi/detail', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ad_registration`'));
        }
    }

		public function cetak(){
			$id            = $this->uri->segment(3);
			$data['pesanan'] = $this->db->get_where('tb_users_gi', array('id' => $id))->row_array();
			$this->pdf->setPaper('A4', 'potrait');
			$name   = $this->session->userdata('username');
			$this->pdf->filename = "$name exportPdf.pdf";
			$this->pdf->load_view('ad_registration/cetak', $data); 
        }
        public function detail(){
            $id            = $this->uri->segment(3);
            $data['pesanan'] = $this->db->get_where('tb_users_gi', array('id' => $id))->row_array();
            $this->load->view('ad_registration/detail',$data);
        }
}