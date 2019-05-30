<?php  

if(! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_Model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function cekUser($user)
    {
        $this->db->select('id_level,id_status,username,password,nama,email');
        $this->db->from('user');
        $this->db->where('username', $user);
        return $this->db->get();
    }
    
    

}

/* End of file Auth_Model.php */
