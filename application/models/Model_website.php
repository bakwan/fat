<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_website extends CI_Model
{
    public $table = 'tb_users_gi';
    public $id = 'id';
    public $order = 'DESC';
    // insert data
    function simpan($cover,$file){
        $data=array(
            'nik'      =>  $this->input->post('nik'),
            'date'            =>  date('Y-m-d H:i:s'),
            'name'            =>  $this->input->post('name'),
            'gender'         =>  $this->input->post('gender'),
            'tanggal_lahir'             =>  $this->input->post('tanggal_lahir'),
            'fat'          =>  $this->input->post('fat'),
            'negara'         =>  $this->input->post('negara'),
            'status'          =>  $this->input->post('status'),
            'pas_foto'			   =>  $file,
            'full_foto'			   =>  $cover,
            'tbadan'         =>  $this->input->post('tbadan'),
            'bbadan'         =>  $this->input->post('bbadan'),
            'kacamata'         =>  $this->input->post('kacamata'),
            'pendidikan'         =>  $this->input->post('pendidikan'),
            'domisili'         =>  $this->input->post('domisili'),
            'telp'         =>  $this->input->post('telp'),
            'email'         =>  $this->input->post('email'),
            'motivasi'         =>  $this->input->post('motivasi'),
            'family'         =>  $this->input->post('family'),
            'kota'         =>  $this->input->post('kota'));
        $this->db->insert('tb_users_gi',$data);
        echo "<script>alert('berhasil');</script>";
    }    
}