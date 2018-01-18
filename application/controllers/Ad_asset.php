<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ad_asset extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model(array('Model_ad_asset','Model_keamanan'));
        $this->Model_keamanan->isAadmin();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $ad_asset = $this->Model_ad_asset->getAll();

        $data = array(
            'ad_asset_data' => $ad_asset
        );

        $this->template->load('templateadmin','ad_asset/ms_asset_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Model_ad_asset->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_lokasi' => $row->id_lokasi,
		'nama_asset' => $row->nama_asset,
		'image' => $row->image,
	    );
            $this->template->load('templateadmin','ad_asset/ms_asset_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ad_asset'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ad_asset/create_action'),
	    'id' => set_value('id'),
	    'id_lokasi' => set_value('id_lokasi'),
	    'nama_asset' => set_value('nama_asset'),
	    'image' => set_value('image'),
	);
        $this->template->load('templateadmin','ad_asset/ms_asset_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $config['upload_path']='./upload/asset';
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
						'id_lokasi'    	=>	$this->input->post('id_lokasi'),
						'nama_asset'    =>	$this->input->post('nama_asset'),
						'create_at' 	=>  date('Y-m-d H:i:s'));
	
                $this->Model_ad_asset->insert($data); //akses model untuk menyimpan ke database
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Data berhasil Dibuat !!</div></div>");
                redirect('Ad_asset'); //jika berhasil maka akan ditampilkan view vupload
            }else{
                echo $this->upload->display_errors();
				$data = array(
           		 'button' => 'Laporkan');
				 $this->template->load('templateadmin','Ad_asset/ms_asset_form',$data);
            }
        	}
        }
    }
    
    public function update($id) 
    {
        $row = $this->Model_ad_asset->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ad_asset/update_action'),
		'id' => set_value('id', $row->id),
		'id_lokasi' => set_value('id_lokasi', $row->id_lokasi),
		'nama_asset' => set_value('nama_asset', $row->nama_asset),
		'image' => set_value('image', $row->image),
	    );
            $this->template->load('templateadmin','ad_asset/ms_asset_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ad_asset'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_lokasi' => $this->input->post('id_lokasi',TRUE),
		'nama_asset' => $this->input->post('nama_asset',TRUE),
		'image' => $this->input->post('image',TRUE),
	    );

            $this->Model_ad_asset->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ad_asset'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Model_ad_asset->get_by_id($id);

        if ($row) {
            $this->Model_ad_asset->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ad_asset'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ad_asset'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_asset', 'nama asset', 'trim|required');
	if (empty($_FILES['userfile']['name']))
		{
			$this->form_validation->set_rules('userfile', 'foto', 'required');
		}
	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ms_asset.xls";
        $judul = "ms_asset";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Lokasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Asset");
	xlsWriteLabel($tablehead, $kolomhead++, "Image");
	xlsWriteLabel($tablehead, $kolomhead++, "Create At");
	xlsWriteLabel($tablehead, $kolomhead++, "Update At");
	xlsWriteLabel($tablehead, $kolomhead++, "Delete At");

	foreach ($this->Model_ad_asset->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_lokasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_asset);
	    xlsWriteLabel($tablebody, $kolombody++, $data->image);
	    xlsWriteLabel($tablebody, $kolombody++, $data->create_at);
	    xlsWriteLabel($tablebody, $kolombody++, $data->update_at);
	    xlsWriteLabel($tablebody, $kolombody++, $data->delete_at);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=ms_asset.doc");

        $data = array(
            'ms_asset_data' => $this->Model_ad_asset->get_all(),
            'start' => 0
        );
        
        $this->load->view('ad_asset/ms_asset_doc',$data);
    }

}

/* End of file Ad_asset.php */
/* Location: ./application/controllers/Ad_asset.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-07-25 17:14:50 */
/* http://harviacode.com */