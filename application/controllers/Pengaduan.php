<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengaduan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
		$this->load->model('Model_website');
        $this->load->library('form_validation');
    }

    public function index()
    {	

		$data = array(
            'button' => 'Laporkan',
            'action' => site_url('Pengaduan/save'),
	    'id' => set_value('id'),
		'id_lokasi'=> set_value('id_lokasi'),
		'id_asset'=> set_value('id_Asset'),
	    'telp_ruang' => set_value('telp_ruang'),
		'lokasi' => set_value('lokasi'),
	    'keluhan' => set_value('keluhan'));
		$data['lokasi'] = $this->db->get('ms_lokasi');
        $this->template->load('templateWeb','website/Pengaduan',$data);
    }

    public function save(){
    	$this->_rules();
    	if($this->form_validation->run()== FALSE){
			$this->index();
		}else{
			$config['upload_path']='./upload/keluhan';
	        $config['allowed_types']='jpg|png';
			$config['max_size']    = 1024;
			$config['encrypt_name']=TRUE;
	        $this->load->library('upload',$config);
			if($_FILES['userfile']['name'])
			{
				if ($this->upload->do_upload('userfile'))
				{
					$gbr = $this->upload->data();
					$data = array(
						'image' =>$gbr['file_name'],
						'id_member'		=> $this->session->userdata('id'),
						'id_instansi'	=> $this->session->userdata('instansi'),
						'id_lokasi'    	=>	$this->input->post('id_lokasi'),
						'nama_asset'    	=>	$this->input->post('nama_asset'),
						'bagian'    	=>	$this->input->post('bagian'),
						'sub_bag'    	=>	$this->input->post('sub_bag'),
						'waktu_lapor'   =>	date('Y-m-d H:i:s'),
						'create_at' 	=>  date('Y-m-d H:i:s'),
						'status'   		=>	1,
						'Confirmation_member'=>	1,
						'jenis_pesan'   =>	0,
						'keluhan'       =>	$this->input->post('keluhan'));
	
                $this->Model_website->insert_keluhan($data); //akses model untuk menyimpan ke database
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("message", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Selamat, pengaduan perbaikan Sarpras anda berhasil di laporkan untuk proses selanjutnya selalu pantau Profile anda untuk mengetahui update terbaru tentang pelaporan sarpras anda</div></div>");
                redirect('Profile'); //jika berhasil maka akan ditampilkan view vupload
            }else{
                echo $this->upload->display_errors();
				$data = array(
           		 'button' => 'Laporkan');
				 $this->template->load('templateWeb','website/Pengaduan',$data);
            }
        	}
		}
	}
	public function LoadAsset(){
		$lokasiID = $_GET['id'];
        $asset   = $this->db->get_where('ms_asset',array('id_lokasi'=>$lokasiID));
        echo " <div class='form-group'>
                <label>Nama Asset</label>
				<div class='input-group'>
                      <div class='input-group-addon'>
                        <i class='fa fa-briefcase'></i>
                      </div>";
        echo "<select  name='id_asset'  class='form-control'>";
        foreach ($asset->result() as $k)
        {
            echo "<option value='$k->id'>$k->nama_asset</option>";
        }
        echo "</select></div>";
	}

	public function _rules(){
	if (empty($_FILES['userfile']['name']))
		{
			$this->form_validation->set_rules('userfile', 'foto', 'required');
		}
	$this->form_validation->set_rules('keluhan', 'keluhan', 'trim|required');
	$this->form_validation->set_rules('nama_asset', 'nama_asset', 'trim|required');	
	$this->form_validation->set_rules('bagian', 'bagian', 'trim|required');	
	$this->form_validation->set_rules('sub_bag', 'sub_bag', 'trim|required');	
	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}    