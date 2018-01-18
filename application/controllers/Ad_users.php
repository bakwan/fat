<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ad_users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_ad_users');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $ad_users = $this->Model_ad_users->select_join();

        $data = array(
            'ad_users_data' => $ad_users
        );

        $this->template->load('templateadmin','ad_users/ms_users_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Model_ad_users->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'username' => $row->username,
		'email' => $row->email,
		'name' => $row->name,
		'password' => $row->password,
		'last_login' => $row->last_login,
		'status' => $row->status,
		'level' => $row->level,
		'create_at' => $row->create_at,
		'update_at' => $row->update_at,
	    );
            $this->template->load('templateadmin','ad_users/ms_users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ad_users'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ad_users/create_action'),
	    'id' => set_value('id'),
	    'username' => set_value('username'),
	    'email' => set_value('email'),
	    'name' => set_value('name'),
	    'password' => set_value('password'),
	    'last_login' => set_value('last_login'),
	    'status' => set_value('status'),
	    'level' => set_value('level'),
	    'create_at' => set_value('create_at'),
	    'update_at' => set_value('update_at'),
	);
        $this->template->load('templateadmin','ad_users/ms_users_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'email' => $this->input->post('email',TRUE),
		'name' => $this->input->post('name',TRUE),
		'status' => $this->input->post('status',TRUE),
		'level' => $this->input->post('level',TRUE),
		'password' => set_password($this->input->post('password',TRUE)),
		'create_at' => date('Y-m-d H:i:s'),
	    );
			
            $this->Model_ad_users->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('ad_users'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Model_ad_users->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ad_users/update_action'),
		'id' => set_value('id', $row->id),
		'username' => set_value('username', $row->username),
		'email' => set_value('email', $row->email),
		'name' => set_value('name', $row->name),
		'password' => set_value('password', $row->password),
		'status' => set_value('status', $row->status),
		'level' => set_value('level', $row->level),
	    );
            $this->template->load('templateadmin','ad_users/ms_users_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ad_users'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'email' => $this->input->post('email',TRUE),
		'name' => $this->input->post('name',TRUE),
		'status' => $this->input->post('status',TRUE),
		'level' => $this->input->post('level',TRUE),
		'password' => set_password($this->input->post('password',TRUE)),
		'update_at' => date('Y-m-d H:i:s'),
	    );

            $this->Model_ad_users->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ad_users'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Model_ad_users->get_by_id($id);

        if ($row) {
            $this->Model_ad_users->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ad_users'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ad_users'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('level', 'level', 'trim|required');
	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ms_users.xls";
        $judul = "ms_users";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Username");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "Last Login");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Level");
	xlsWriteLabel($tablehead, $kolomhead++, "Create At");
	xlsWriteLabel($tablehead, $kolomhead++, "Update At");

	foreach ($this->Model_ad_users->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->last_login);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status);
	    xlsWriteNumber($tablebody, $kolombody++, $data->level);
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
        header("Content-Disposition: attachment;Filename=ms_users.doc");

        $data = array(
            'ms_users_data' => $this->Model_ad_users->get_all(),
            'start' => 0
        );
        
        $this->load->view('ad_users/ms_users_doc',$data);
    }

}

/* End of file Ad_users.php */
/* Location: ./application/controllers/Ad_users.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-11-03 10:10:36 */
/* http://harviacode.com */