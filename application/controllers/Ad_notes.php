<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ad_notes extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_ad_notes');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $ad_notes = $this->Model_ad_notes->get_all();

        $data = array(
            'ad_notes_data' => $ad_notes
        );

        $this->template->load('templateadmin','ad_notes/tb_notes_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Model_ad_notes->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama' => $row->nama,
		'keterangan' => $row->keterangan,
		'users' => $row->users,
		'create_at' => $row->create_at,
	    );
            $this->template->load('template','ad_notes/tb_notes_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ad_notes'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ad_notes/create_action'),
	    'id' => set_value('id'),
	    'nama' => set_value('nama'),
	    'keterangan' => set_value('keterangan'),
	    'users' => set_value('users'),
	    'create_at' => set_value('create_at'),
	);
        $this->template->load('templateadmin','ad_notes/tb_notes_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'users' => $this->session->userdata('id'),
		'create_at'	=>  date('Y-m-d H:i:s'));
			
            $this->Model_ad_notes->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('Dashboard'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Model_ad_notes->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ad_notes/update_action'),
		'id' => set_value('id', $row->id),
		'nama' => set_value('nama', $row->nama),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'users' => set_value('users', $row->users),
		'create_at' => set_value('create_at', $row->create_at),
	    );
            $this->template->load('templateadmin','ad_notes/tb_notes_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ad_notes'));
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
		'keterangan' => $this->input->post('keterangan',TRUE),
		'users' => $this->session->userdata('id'),
		'create_at'	=>  date('Y-m-d H:i:s'));
	

            $this->Model_ad_notes->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ad_notes'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Model_ad_notes->get_by_id($id);

        if ($row) {
            $this->Model_ad_notes->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ad_notes'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ad_notes'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_notes.xls";
        $judul = "tb_notes";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Users");
	xlsWriteLabel($tablehead, $kolomhead++, "Create At");

	foreach ($this->Model_ad_notes->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->users);
	    xlsWriteLabel($tablebody, $kolombody++, $data->create_at);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_notes.doc");

        $data = array(
            'tb_notes_data' => $this->Model_ad_notes->get_all(),
            'start' => 0
        );
        
        $this->load->view('ad_notes/tb_notes_doc',$data);
    }

}

/* End of file Ad_notes.php */
/* Location: ./application/controllers/Ad_notes.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-11-05 06:12:35 */
/* http://harviacode.com */