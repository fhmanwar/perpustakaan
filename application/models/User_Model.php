<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function listing()
	{
		$this->db->select('
			user.*,
			level.kode_level,
			level.level,
			status.kode_status,
			status.status,
		');
		$this->db->from('user');

		$this->db->join('level','level.id_level = user.id_level','LEFT');
		$this->db->join('status','status.id_status = user.id_status','LEFT');
		
    $this->db->order_by('id_user','ASC');
    $query = $this->db->get();
    return $query->result();
	}

  // //Listing
  // public function listing() {
  //   $this->db->select('*');
  //   $this->db->from('user');
  //   $this->db->order_by('id_user','ASC');
  //   $query = $this->db->get();
  //   return $query->result();
  // }

	// Tambah
	public function tambah ($data) {
		$this->db->insert('user',$data);
	}

  public function detail($id_user) {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('id_user',$id_user);
    $this->db->order_by('id_user','ASC');
    $query = $this->db->get();
    return $query->row_array();
  }

  // Edit
  public function edit ($data) {
    $this->db->where('id_user',$data['id_user']);
    $this->db->update('user',$data);
  }

  // Delete
	public function delete ($data){
		$this->db->where('id_user',$data['id_user']);
		$this->db->delete('user',$data);
	}

	public function login($username, $password) {
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array('username'		=> $username,
													 'password'  	=> sha1($password)
										));
		$this->db->order_by('id_user','ASC');
		$query = $this->db->get();
		return $query->row();
	}

}
