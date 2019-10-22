<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_Model extends CI_Model {

	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

  //Listing
  public function listing() {
    $this->db->select('*');
    $this->db->from('anggota');
    $this->db->order_by('id_anggota','ASC');
    $query = $this->db->get();
    return $query->result();
  }

	// Tambah
	public function tambah ($data) {
		$this->db->insert('anggota',$data);
	}

  public function detail($id_anggota) {
    $this->db->select('*');
    $this->db->from('anggota');
    $this->db->where('id_anggota',$id_anggota);
    $this->db->order_by('id_anggota','ASC');
    $query = $this->db->get();
    return $query->row();
  }

  // Edit
  public function edit ($data) {
    $this->db->where('id_anggota',$data['id_anggota']);
    $this->db->update('anggota',$data);
	}
	
	public function update()
	{
		$this->db->where('id_anggota', $this->input->post('id_anggota'));
		$this->db->update('anggota', $data);
	}

	public function hapus()
	{
		$this->db->where('id_anggota', $this->input->post('id_anggota'));
		$this->db->delete('anggota');
	}

  // Delete
	public function delete ($data){
		$this->db->where('id_anggota',$data['id_anggota']);
		$this->db->delete('anggota',$data);
	}

	public function login($anggotaname, $password) {
		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->where(array('anggotaname'		=> $anggotaname,
													 'password'  	=> sha1($password)
										));
		$this->db->order_by('id_anggota','DESC');
		$query = $this->db->get();
		return $query->row();
	}

}
