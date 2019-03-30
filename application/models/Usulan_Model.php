<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usulan_Model extends CI_Model {

	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

  //Listing
  public function listing() {
    $this->db->select('*');
    $this->db->from('usulan');
    $this->db->order_by('id_usulan','ASC');
    $query = $this->db->get();
    return $query->result();
  }

	// Tambah
	public function tambah ($data) {
		$this->db->insert('usulan',$data);
	}

  public function detail($id_usulan) {
    $this->db->select('*');
    $this->db->from('usulan');
    $this->db->where('id_usulan',$id_usulan);
    $this->db->order_by('id_usulan','ASC');
    $query = $this->db->get();
    return $query->row();
  }

  // Edit
  public function edit ($data) {
    $this->db->where('id_usulan',$data['id_usulan']);
    $this->db->update('usulan',$data);
  }

  // Delete
	public function delete ($data){
		$this->db->where('id_usulan',$data['id_usulan']);
		$this->db->delete('usulan',$data);
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
