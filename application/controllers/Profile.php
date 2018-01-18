<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model(array('Model_konsumsi','Model_keamanan','Model_ad_laporan'));
        $this->Model_keamanan->isUsers();
        $this->load->library('form_validation');
        $this->load->library('pdf');
    }

    public function index()
    {

        $id            = $this->session->userdata('id');
	    $sql ="SELECT tb1.*,tb2.nama_lokasi,tb3.nama_unit
				   FROM tb_laporan as tb1,ms_lokasi as tb2,ms_unit_penangan as tb3
				   WHERE tb1.id_lokasi=tb2.id and tb1.id_member=$id and tb1.id_penanganan=tb3.id ORDER BY create_at DESC";
        $data['pengaduan'] = $this->db->query($sql)->result();
        $sql2 ="SELECT tb1.*,tb2.nama_lokasi
				   FROM tb_konsumsi as tb1,ms_lokasi as tb2
				   WHERE tb1.id_lokasi=tb2.id and tb1.id_member=$id  ORDER BY create_at DESC";	  
        $data['konsumsi'] = $this->db->query($sql2)->result();
    	$this->template->load('templateWeb','profile/profile',$data);
    }
    public function detail(){
        $id = $this->uri->segment(3);
        $sql ="SELECT tb1.*,tb3.nama_lokasi,tb2.nama_unit
				   FROM tb_laporan as tb1, ms_lokasi as tb3, ms_unit_penangan as tb2
				   WHERE  tb1.id_penanganan=tb2.id and tb1.id_lokasi=tb3.id and tb1.id=$id";	  
            $data['order'] = $this->db->query($sql)->result();
        $this->template->load('templateweb','Profile/detail_lapor',$data);
    }
    public function konsum(){
        $id = $this->uri->segment(3);
        $sql2 ="SELECT tb1.*,tb2.nama_lokasi,tb3.*
				   FROM tb_konsumsi as tb1,ms_lokasi as tb2,ms_konsumsi_koordinator as tb3
				   WHERE tb1.id_lokasi=tb2.id and tb1.id=$id and tb1.id_pengantar=tb3.id ";	  
        $data['konsumsi'] = $this->db->query($sql2)->result();
    	$this->template->load('templateWeb','profile/detail_konsumsi',$data);
    }
    public function UpdateKonfirmasi($id){

        $row = $this->Model_ad_laporan->get_by_id($id);
        
                if ($row) {
                    $this->Model_ad_laporan->update_Konfirmasi($id);
                    $this->session->set_flashdata('message', 'selamat anda telah mengkonfirmasi bahwa kerusakan sudah dibenahi');
                    redirect(site_url('Profile'));
                } else {
                    $this->session->set_flashdata('message', 'Data tidak berhasil di update');
                    redirect(site_url('Profile'));
                }
    }
    public function cetak_keluhan(){
        $id            = $this->uri->segment(3);
        $data['laporan']= $this->db->get_where('tb_laporan', array('id'=>$id))->row_array();
        $data['row']   = $this->db->get_where('c10umumjate_layanan.ms_member',array('id'=>$data['laporan']['id_member']))->row_array();
        $data['instans']   = $this->db->get_where('c10umumjate_layanan.ms_instansi',array('id'=>$data['laporan']['id_instansi']))->row_array();
        $data['lokasi']   = $this->db->get_where('ms_lokasi',array('id'=>$data['laporan']['id_lokasi']))->row_array();
        $data['unit']   = $this->db->get_where('ms_unit_penangan',array('id'=>$data['laporan']['id_penanganan']))->row_array();
        $data['pesanan'] = $this->db->get_where('tb_laporan', array('id' => $id))->row_array();
        $this->pdf->setPaper('A4', 'potrait');
        $name   = $this->session->userdata('username');
        
        $this->pdf->filename = "$name laporan_pengaduan.pdf";
        $this->pdf->load_view('profile/cetak_keluhan', $data); 
    }
    public function cetak_konsumsi(){
        $id            = $this->uri->segment(3);
        $data['laporan']= $this->db->get_where('tb_konsumsi', array('id'=>$id))->row_array();
        $data['row']   = $this->db->get_where('c10umumjate_layanan.ms_member',array('id'=>$data['laporan']['id_member']))->row_array();
        $data['lokasi']   = $this->db->get_where('ms_lokasi',array('id'=>$data['laporan']['id_lokasi']))->row_array();
        $data['instans']   = $this->db->get_where('c10umumjate_layanan.ms_instansi',array('id'=>$data['laporan']['id_instansi']))->row_array();
        $data['pengantar']   = $this->db->get_where('ms_konsumsi_koordinator',array('id'=>$data['laporan']['id_pengantar']))->row_array();
        $data['pesanan'] = $this->db->get_where('tb_konsumsi', array('id' => $id))->row_array();
        $this->pdf->setPaper('A4', 'potrait');
        $name   = $this->session->userdata('username');
        
        $this->pdf->filename = "$name pengajuan_konsumsi.pdf";
        $this->pdf->load_view('profile/cetak_konsumsi', $data); 
    }
}    