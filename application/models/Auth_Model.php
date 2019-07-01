<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function cekLogin($table,$where){		
		return $this->db->get_where($table,$where)->row_array();
	}	
    
    public function register($data)
    {
        $this->db->insert('user', $data);
    }

    public function forgot($data)
    {
        $this->db->where('email',$data['email']);
        $this->db->update('user', $data);
    }

    public function reset($pass,$email)
    {
        $this->db->set('password',$pass);
        $this->db->where('email', $email);
        $this->db->update('user');
    }

}

/* End of file Auth_Model.php */
