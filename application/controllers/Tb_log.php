<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_log extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_log_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('tb_log/tb_log_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tb_log_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tb_log_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'users' => $row->users,
		'level' => $row->level,
		'activity' => $row->activity,
		'keterangan' => $row->keterangan,
		'tabel' => $row->tabel,
		'create_at' => $row->create_at,
	    );
            $this->load->view('tb_log/tb_log_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_log'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tb_log/create_action'),
	    'id' => set_value('id'),
	    'users' => set_value('users'),
	    'level' => set_value('level'),
	    'activity' => set_value('activity'),
	    'keterangan' => set_value('keterangan'),
	    'tabel' => set_value('tabel'),
	    'create_at' => set_value('create_at'),
	);
        $this->load->view('tb_log/tb_log_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'users' => $this->input->post('users',TRUE),
		'level' => $this->input->post('level',TRUE),
		'activity' => $this->input->post('activity',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'tabel' => $this->input->post('tabel',TRUE),
		'create_at' => $this->input->post('create_at',TRUE),
	    );

            $this->Tb_log_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tb_log'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tb_log_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tb_log/update_action'),
		'id' => set_value('id', $row->id),
		'users' => set_value('users', $row->users),
		'level' => set_value('level', $row->level),
		'activity' => set_value('activity', $row->activity),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'tabel' => set_value('tabel', $row->tabel),
		'create_at' => set_value('create_at', $row->create_at),
	    );
            $this->load->view('tb_log/tb_log_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_log'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'users' => $this->input->post('users',TRUE),
		'level' => $this->input->post('level',TRUE),
		'activity' => $this->input->post('activity',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'tabel' => $this->input->post('tabel',TRUE),
		'create_at' => $this->input->post('create_at',TRUE),
	    );

            $this->Tb_log_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tb_log'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tb_log_model->get_by_id($id);

        if ($row) {
            $this->Tb_log_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_log'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_log'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('users', 'users', 'trim|required');
	$this->form_validation->set_rules('level', 'level', 'trim|required');
	$this->form_validation->set_rules('activity', 'activity', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('tabel', 'tabel', 'trim|required');
	$this->form_validation->set_rules('create_at', 'create at', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_log.xls";
        $judul = "tb_log";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Users");
	xlsWriteLabel($tablehead, $kolomhead++, "Level");
	xlsWriteLabel($tablehead, $kolomhead++, "Activity");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tabel");
	xlsWriteLabel($tablehead, $kolomhead++, "Create At");

	foreach ($this->Tb_log_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->users);
	    xlsWriteNumber($tablebody, $kolombody++, $data->level);
	    xlsWriteLabel($tablebody, $kolombody++, $data->activity);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tabel);
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
        header("Content-Disposition: attachment;Filename=tb_log.doc");

        $data = array(
            'tb_log_data' => $this->Tb_log_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tb_log/tb_log_doc',$data);
    }

}

/* End of file Tb_log.php */
/* Location: ./application/controllers/Tb_log.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-11-29 07:31:59 */
/* http://harviacode.com */