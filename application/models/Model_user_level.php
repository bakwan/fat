<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_user_level extends CI_Model
{

    public $table = 'ms_user_level';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('create_at', $q);
	$this->db->or_like('update_at', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('create_at', $q);
	$this->db->or_like('update_at', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        $data=array(
        	'users'		=>  $this->session->userdata('username'),
        	'level'		=>  $this->session->userdata('level'),
        	'keterangan'	=>  $this->input->post('name'),
        	'tabel'	=>  $this->table,
        	'activity'	=>  'create_data_users_level',
        	'create_at'	=>  date('Y-m-d H:i:s'));
        	$this->db->insert('tb_log',$data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
        $data=array(
        	'users'		=>  $this->session->userdata('username'),
        	'level'		=>  $this->session->userdata('level'),
        	'keterangan'	=>  $this->input->post('name'),
        	'tabel'	=>  $this->table,
        	'activity'	=>  'update_data_users_level',
        	'create_at'	=>  date('Y-m-d H:i:s'));
        	$this->db->insert('tb_log',$data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        $data=array(
        	'users'		=>  $this->session->userdata('username'),
        	'level'		=>  $this->session->userdata('level'),
        	'tabel'	=>  $this->table,
        	'activity'	=>  'delete_data_users_level',
        	'create_at'	=>  date('Y-m-d H:i:s'));
        	$this->db->insert('tb_log',$data);
    }

}

/* End of file Model_user_level.php */
/* Location: ./application/models/Model_user_level.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-11-03 12:04:58 */
/* http://harviacode.com */