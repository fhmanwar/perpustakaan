<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_Model extends CI_Model {

	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

  //Listing
  public function listing() {
    $this->db->select('file.*,
                      buku.judul_buku,
                      user.nama
                      ');
    $this->db->from('file');
    $this->db->join('buku','buku.id_buku = file.id_buku','LEFT');
    $this->db->join('user','user.id_user = file.id_user','LEFT');
    $this->db->order_by('urutan','ASC');
    $query = $this->db->get();
    return $query->result();
  }

  //Listing per buku
  public function buku($id_buku) {
    $this->db->select('file.*,
                      buku.judul_buku,
                      user.nama
                      ');
    $this->db->from('file');
    $this->db->join('buku','buku.id_buku = file.id_buku','LEFT');
    $this->db->join('user','user.id_user = file.id_user','LEFT');
    $this->db->where('file.id_buku',$id_buku);
    $this->db->order_by('urutan','ASC');
    $query = $this->db->get();
    return $query->result();
  }

	// Tambah
	public function tambah ($data) {
		$this->db->insert('file',$data);
	}

  public function detail($id_file) {
    $this->db->select('*');
    $this->db->from('file');
    $this->db->where('id_file',$id_file);
    $this->db->order_by('id_file','ASC');
    $query = $this->db->get();
    return $query->row();
  }

  // Edit
  public function edit ($data) {
    $this->db->where('id_file',$data['id_file']);
    $this->db->update('file',$data);
  }

  // Delete
	public function delete ($data){
		$this->db->where('id_file',$data['id_file']);
		$this->db->delete('file',$data);
	}

}
