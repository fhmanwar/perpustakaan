<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahasa_Model extends CI_Model {

	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

  //Listing
  public function listing() {
    $this->db->select('*');
    $this->db->from('bahasa');
    $this->db->order_by('urutan','ASC');
    $query = $this->db->get();
    return $query->result();
  }

	// Tambah
	public function tambah ($data) {
		$this->db->insert('bahasa',$data);
	}

  public function detail($id_bahasa) {
    $this->db->select('*');
    $this->db->from('bahasa');
    $this->db->where('id_bahasa',$id_bahasa);
    $this->db->order_by('id_bahasa','ASC');
    $query = $this->db->get();
    return $query->row();
  }

  // Edit
  public function edit ($data) {
    $this->db->where('id_bahasa',$data['id_bahasa']);
    $this->db->update('bahasa',$data);
  }

  // Delete
	public function delete ($data){
		$this->db->where('id_bahasa',$data['id_bahasa']);
		$this->db->delete('bahasa',$data);
	}

}
