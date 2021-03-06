<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_ad_asset extends CI_Model
{

    public $table = 'ms_asset';
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
    function getAll(){
         $sql = "SELECT tb1.*,tb2.nama_lokasi
                FROM ms_asset as tb1, ms_lokasi as tb2
                WHERE  tb1.id_lokasi=tb2.id  ORDER BY tb1.create_at DESC";
        return $this->db->query($sql)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('id_lokasi', $q);
	$this->db->or_like('nama_asset', $q);
	$this->db->or_like('image', $q);
	$this->db->or_like('create_at', $q);
	$this->db->or_like('update_at', $q);
	$this->db->or_like('delete_at', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('id_lokasi', $q);
	$this->db->or_like('nama_asset', $q);
	$this->db->or_like('image', $q);
	$this->db->or_like('create_at', $q);
	$this->db->or_like('update_at', $q);
	$this->db->or_like('delete_at', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Model_ad_asset.php */
/* Location: ./application/models/Model_ad_asset.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-07-25 17:14:50 */
/* http://harviacode.com */