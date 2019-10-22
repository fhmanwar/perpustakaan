<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_Model extends CI_Model {

	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

  //Listing
  public function listing() {
    $this->db->select('peminjaman.*,
											anggota.nama_anggota,
											buku.judul_buku,
											buku.kode_buku,
											buku.no_seri,
											buku.penerbit
											');
    $this->db->from('peminjaman');
		$this->db->join('anggota', 'anggota.id_anggota = peminjaman.id_anggota');
		$this->db->join('buku', 'buku.id_buku = peminjaman.id_buku');
    $this->db->order_by('id_peminjaman','ASC');
    $query = $this->db->get();
    return $query->result();
  }

	//Listing peminjaman anggota
  public function anggota($id_anggota) {
    $this->db->select('peminjaman.*,
											anggota.nama_anggota,
											buku.judul_buku,
											buku.kode_buku,
											buku.no_seri,
											buku.penerbit
											');
    $this->db->from('peminjaman');
		$this->db->join('anggota', 'anggota.id_anggota = peminjaman.id_anggota');
		$this->db->join('buku', 'buku.id_buku = peminjaman.id_buku');
		$this->db->where('peminjaman.id_anggota', $id_anggota);
    $this->db->order_by('id_peminjaman','ASC');
    $query = $this->db->get();
    return $query->result();
  }

	//Listing peminjaman anggota
  public function limit_peminjaman_anggota($id_anggota) {
    $this->db->select('peminjaman.*,
											anggota.nama_anggota,
											buku.judul_buku,
											buku.kode_buku,
											buku.no_seri,
											buku.penerbit
											');
    $this->db->from('peminjaman');
		$this->db->join('anggota', 'anggota.id_anggota = peminjaman.id_anggota');
		$this->db->join('buku', 'buku.id_buku = peminjaman.id_buku');
		$this->db->where(array(	'peminjaman.id_anggota'	=> $id_anggota,
														'peminjaman.status_kembali <>' => 'Sudah'
										));
    $this->db->order_by('id_peminjaman','ASC');
    $query = $this->db->get();
    return $query->result();
  }

	// Tambah
	public function tambah ($data) {
		$this->db->insert('peminjaman',$data);
	}

  public function detail($id_peminjaman) {
    $this->db->select('*');
    $this->db->from('peminjaman');
    $this->db->where('id_peminjaman',$id_peminjaman);
    $this->db->order_by('id_peminjaman','ASC');
    $query = $this->db->get();
    return $query->row();
  }

  // Edit
  public function edit ($data) {
    $this->db->where('id_peminjaman',$data['id_peminjaman']);
    $this->db->update('peminjaman',$data);
  }

  // Delete
	public function delete ($data){
		$this->db->where('id_peminjaman',$data['id_peminjaman']);
		$this->db->delete('peminjaman',$data);
	}

	public function login($username, $password) {
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->where(array('username'		=> $username,
													 'password'  	=> sha1($password)
										));
		$this->db->order_by('id_peminjaman','DESC');
		$query = $this->db->get();
		return $query->row();
	}

}
