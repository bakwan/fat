<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ad_header extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model(array('Model_ad_header','Model_keamanan'));
        $this->Model_keamanan->isAadmin();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $ad_header = $this->Model_ad_header->get_all();

        $data = array(
            'ad_header_data' => $ad_header
        );

        $this->template->load('templateadmin','ad_header/ms_header_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Model_ad_header->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama' => $row->nama,
		'link' => $row->link,
		'image' => $row->image,
		'create_at' => $row->create_at,
		'update_at' => $row->update_at,
	    );
            $this->template->load('templateadmin','ad_header/ms_header_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ad_header'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ad_header/create_action'),
	    'id' => set_value('id'),
	    'nama' => set_value('nama'),
	    'link' => set_value('link'),
	    'image' => set_value('image'),
	    'create_at' => set_value('create_at'),
	);
        $this->template->load('templateadmin','ad_header/ms_header_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'link' => $this->input->post('link',TRUE),
		'image' => $this->input->post('image',TRUE),
		'create_at' => date('Y-m-d H:i:s'),
	    );
			
            $this->Model_ad_header->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('ad_header'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Model_ad_header->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ad_header/update_action'),
		'id' => set_value('id', $row->id),
		'nama' => set_value('nama', $row->nama),
		'link' => set_value('link', $row->link),
		'image' => set_value('image', $row->image),
		'update_at' => set_value('update_at', $row->update_at),
	    );
            $this->template->load('templateadmin','ad_header/ms_header_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ad_header'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'link' => $this->input->post('link',TRUE),
		'image' => $this->input->post('image',TRUE),
		'update_at' => date('Y-m-d H:i:s'),
	    );

            $this->Model_ad_header->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ad_header'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Model_ad_header->get_by_id($id);

        if ($row) {
            $this->Model_ad_header->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ad_header'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ad_header'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('link', 'link', 'trim|required');
	$this->form_validation->set_rules('image', 'image', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ms_header.xls";
        $judul = "ms_header";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Link");
	xlsWriteLabel($tablehead, $kolomhead++, "Image");
	xlsWriteLabel($tablehead, $kolomhead++, "Create At");
	xlsWriteLabel($tablehead, $kolomhead++, "Update At");

	foreach ($this->Model_ad_header->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->link);
	    xlsWriteLabel($tablebody, $kolombody++, $data->image);
	    xlsWriteLabel($tablebody, $kolombody++, $data->create_at);
	    xlsWriteLabel($tablebody, $kolombody++, $data->update_at);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=ms_header.doc");

        $data = array(
            'ms_header_data' => $this->Model_ad_header->get_all(),
            'start' => 0
        );
        
        $this->load->view('ad_header/ms_header_doc',$data);
    }

}

/* End of file Ad_header.php */
/* Location: ./application/controllers/Ad_header.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-11-02 11:11:12 */
/* http://harviacode.com */