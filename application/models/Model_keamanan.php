<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_keamanan extends CI_Model {

    public function getUSer()
    {
        $userdata = $this->session->userdata();
        return $userdata;
    }
    public function isAadmin(){
        $userdata = $this->getUSer();
        if ($userdata['level']!== '1'){
            
            redirect('NotFound','refresh');
            
        }
    }
    public function isUsers(){
        
        if($this->session->userdata('id') == ''){
            
            redirect('Authen_member','refresh');
            
        }
    }
}