<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ad_menu_admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model(array('Model_ad_menu_admin','Model_keamanan'));
        $this->Model_keamanan->isAadmin();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $ad_menu_admin = $this->Model_ad_menu_admin->select_all();

        $data = array(
            'ad_menu_admin_data' => $ad_menu_admin
        );

        $this->template->load('templateadmin','ad_menu_admin/ms_menu_admin_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Model_ad_menu_admin->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama' => $row->nama,
		'link' => $row->link,
		'icon' => $row->icon,
		'akses' => $row->akses,
		'parent' => $row->parent,
		'status' => $row->status,
	    );
            $this->template->load('templateadmin','ad_menu_admin/ms_menu_admin_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ad_menu_admin'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ad_menu_admin/create_action'),
	    'id' => set_value('id'),
	    'nama' => set_value('nama'),
	    'link' => set_value('link'),
	    'icon' => set_value('icon'),
	    'akses' => set_value('akses'),
	    'parent' => set_value('parent'),
	    'status' => set_value('status'),
	);
        $this->template->load('templateadmin','ad_menu_admin/ms_menu_admin_form', $data);
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
		'icon' => $this->input->post('icon',TRUE),
		'akses' => $this->input->post('akses',TRUE),
		'parent' => $this->input->post('parent',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );
			
            $this->Model_ad_menu_admin->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('ad_menu_admin'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Model_ad_menu_admin->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ad_menu_admin/update_action'),
		'id' => set_value('id', $row->id),
		'nama' => set_value('nama', $row->nama),
		'link' => set_value('link', $row->link),
		'icon' => set_value('icon', $row->icon),
		'akses' => set_value('akses', $row->akses),
		'parent' => set_value('parent', $row->parent),
		'status' => set_value('status', $row->status),
	    );
            $this->template->load('templateadmin','ad_menu_admin/ms_menu_admin_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ad_menu_admin'));
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
		'icon' => $this->input->post('icon',TRUE),
		'akses' => $this->input->post('akses',TRUE),
		'parent' => $this->input->post('parent',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Model_ad_menu_admin->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ad_menu_admin'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Model_ad_menu_admin->get_by_id($id);

        if ($row) {
            $this->Model_ad_menu_admin->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ad_menu_admin'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ad_menu_admin'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('link', 'link', 'trim|required');
	$this->form_validation->set_rules('icon', 'icon', 'trim|required');
	$this->form_validation->set_rules('akses', 'akses', 'trim|required');
	$this->form_validation->set_rules('parent', 'parent', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ms_menu_admin.xls";
        $judul = "ms_menu_admin";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Icon");
	xlsWriteLabel($tablehead, $kolomhead++, "Akses");
	xlsWriteLabel($tablehead, $kolomhead++, "Parent");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Model_ad_menu_admin->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->link);
	    xlsWriteLabel($tablebody, $kolombody++, $data->icon);
	    xlsWriteNumber($tablebody, $kolombody++, $data->akses);
	    xlsWriteNumber($tablebody, $kolombody++, $data->parent);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=ms_menu_admin.doc");

        $data = array(
            'ms_menu_admin_data' => $this->Model_ad_menu_admin->get_all(),
            'start' => 0
        );
        
        $this->load->view('ad_menu_admin/ms_menu_admin_doc',$data);
    }

}

/* End of file Ad_menu_admin.php */
/* Location: ./application/controllers/Ad_menu_admin.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-10-20 11:51:30 */
/* http://harviacode.com */