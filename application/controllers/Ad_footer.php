<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ad_footer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model(array('Model_ad_footer','Model_keamanan'));
        $this->Model_keamanan->isAadmin();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $ad_footer = $this->Model_ad_footer->get_all();

        $data = array(
            'ad_footer_data' => $ad_footer
        );

        $this->template->load('templateadmin','ad_footer/ms_footer_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Model_ad_footer->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'link' => $row->link,
		'create_at' => $row->create_at,
		'update_at' => $row->update_at,
	    );
            $this->template->load('templateadmin','ad_footer/ms_footer_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ad_footer'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ad_footer/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'link' => set_value('link'),
	    'status' => set_value('status'),
	);
        $this->template->load('templateadmin','ad_footer/ms_footer_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'link' => $this->input->post('link',TRUE),
		'status' => $this->input->post('status',TRUE),
		'create_at' => date('Y-m-d H:i:s'),
	    );
			
            $this->Model_ad_footer->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('ad_footer'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Model_ad_footer->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ad_footer/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'link' => set_value('link', $row->link),
		'status' => set_value('status', $row->status),
	    );
            $this->template->load('templateadmin','ad_footer/ms_footer_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ad_footer'));
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
		'link' => $this->input->post('link',TRUE),
		'status' => $this->input->post('status',TRUE),
		'create_at' => date('Y-m-d H:i:s'),
	    );

            $this->Model_ad_footer->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ad_footer'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Model_ad_footer->get_by_id($id);

        if ($row) {
            $this->Model_ad_footer->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ad_footer'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ad_footer'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('link', 'link', 'trim|required');		

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ms_footer.xls";
        $judul = "ms_footer";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Link");
	xlsWriteLabel($tablehead, $kolomhead++, "Create At");
	xlsWriteLabel($tablehead, $kolomhead++, "Update At");

	foreach ($this->Model_ad_footer->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->link);
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
        header("Content-Disposition: attachment;Filename=ms_footer.doc");

        $data = array(
            'ms_footer_data' => $this->Model_ad_footer->get_all(),
            'start' => 0
        );
        
        $this->load->view('ad_footer/ms_footer_doc',$data);
    }

}

/* End of file Ad_footer.php */
/* Location: ./application/controllers/Ad_footer.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-11-02 10:50:46 */
/* http://harviacode.com */