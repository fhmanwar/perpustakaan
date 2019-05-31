<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	
    
    // public function cekUser($user)
    // {
    //     $this->db->select('id_level,id_status,username,password,nama,email');
    //     $this->db->from('user');
    //     $this->db->where('username', $user);
    //     return $this->db->get();
    // }

    public function register($data)
    {
        $this->db->insert('user', $data);
    }

}

/* End of file Auth_Model.php */
