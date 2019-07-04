<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_Model extends CI_Model {

	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function list()
	{
		$this->db->select('
			peminjaman.*,
			user.*,
			buku.judul_buku,
			buku.penulis_buku,
			buku.kode_buku,
			buku.penerbit
		');
		$this->db->from('peminjaman');
		$this->db->join('user','user.id_user = peminjaman.id_user','LEFT');
        $this->db->join('buku','buku.id_buku = peminjaman.id_buku','LEFT');
        // $this->db->like('user.id_level','2');
		$this->db->order_by('id_peminjaman','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	//Listing peminjaman anggota
    public function anggota($id) {
        $this->db->select('
            peminjaman.*,
            user.*,
            buku.judul_buku,
            buku.kode_buku,
            buku.no_seri,
            buku.penerbit
        ');
        $this->db->from('peminjaman');
        $this->db->join('user', 'user.id_user = peminjaman.id_user','LEFT');
        $this->db->join('buku', 'buku.id_buku = peminjaman.id_buku','LEFT');
        $this->db->where('peminjaman.id_user', $id);
        $this->db->order_by('id_peminjaman','ASC');
        $query = $this->db->get();
        return $query->result();
    }

	//Listing peminjaman anggota
  public function limit_peminjaman_anggota($id_anggota) {
    $this->db->select('
        peminjaman.*,
        user.nama,
        buku.judul_buku,
        buku.kode_buku,
        buku.no_seri,
        buku.penerbit,
        buku.cover_buku
    ');
    $this->db->from('peminjaman');
		$this->db->join('user', 'user.id_user = peminjaman.id_user');
		$this->db->join('buku', 'buku.id_buku = peminjaman.id_buku');
		$this->db->where(array(	'peminjaman.id_user'	=> $id_anggota,
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


}
