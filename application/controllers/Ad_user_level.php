<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ad_user_level extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Model_user_level','Model_keamanan'));
        $this->Model_keamanan->isAadmin();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $ad_user_level = $this->Model_user_level->get_all();

        $data = array(
            'ad_user_level_data' => $ad_user_level
        );

        $this->template->load('templateadmin','ad_user_level/ms_user_level_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Model_user_level->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'create_at' => $row->create_at,
		'update_at' => $row->update_at,
	    );
            $this->template->load('templateadmin','ad_user_level/ms_user_level_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ad_user_level'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ad_user_level/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'create_at' => set_value('create_at'),
	    'update_at' => set_value('update_at'),
	);
        $this->template->load('templateadmin','ad_user_level/ms_user_level_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'create_at' => date('Y-m-d H:i:s'),
	    );
			
            $this->Model_user_level->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('ad_user_level'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Model_user_level->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ad_user_level/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
	    );
            $this->template->load('templateadmin','ad_user_level/ms_user_level_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ad_user_level'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'update_at' => date('Y-m-d H:i:s'),
	    );

            $this->Model_user_level->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ad_user_level'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Model_user_level->get_by_id($id);

        if ($row) {
            $this->Model_user_level->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ad_user_level'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ad_user_level'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ms_user_level.xls";
        $judul = "ms_user_level";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Create At");
	xlsWriteLabel($tablehead, $kolomhead++, "Update At");

	foreach ($this->Model_user_level->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
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
        header("Content-Disposition: attachment;Filename=ms_user_level.doc");

        $data = array(
            'ms_user_level_data' => $this->Model_user_level->get_all(),
            'start' => 0
        );
        
        $this->load->view('ad_user_level/ms_user_level_doc',$data);
    }

}

/* End of file Ad_user_level.php */
/* Location: ./application/controllers/Ad_user_level.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-11-03 12:04:58 */
/* http://harviacode.com */