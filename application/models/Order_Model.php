<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_Model extends CI_Model {

	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function list()
	{
		$this->db->select('
			order.*,
			user.*,
			buku.judul_buku,
			buku.penulis_buku,
			buku.kode_buku,
			buku.penerbit
		');
		$this->db->from('order');
		$this->db->join('user','user.id_user = order.id_user','LEFT');
        $this->db->join('buku','buku.id_buku = order.id_buku','LEFT');
        // $this->db->like('user.id_level','2');
		$this->db->order_by('id_order','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	//Listing order anggota
    public function anggota($id) {
        $this->db->select('
            order.*,
            user.*,
            buku.judul_buku,
            buku.kode_buku,
            buku.no_seri,
            buku.penerbit
        ');
        $this->db->from('order');
        $this->db->join('user', 'user.id_user = order.id_user','LEFT');
        $this->db->join('buku', 'buku.id_buku = order.id_buku','LEFT');
        $this->db->where('order.id_user', $id);
        $this->db->order_by('id_order','ASC');
        $query = $this->db->get();
        return $query->result();
    }

	//Listing order anggota
  public function limit_order_anggota($id_anggota) {
    $this->db->select('
        order.*,
        user.nama,
        buku.judul_buku,
        buku.kode_buku,
        buku.no_seri,
        buku.penerbit,
        buku.cover_buku
    ');
    $this->db->from('order');
		$this->db->join('user', 'user.id_user = order.id_user');
		$this->db->join('buku', 'buku.id_buku = order.id_buku');
		$this->db->where(array(	'order.id_user'	=> $id_anggota,
														'order.status_kembali <>' => 'Sudah'
										));
    $this->db->order_by('id_order','ASC');
    $query = $this->db->get();
    return $query->result();
  }

	// Tambah
	public function tambah ($data) {
		$this->db->insert('order',$data);
	}

  public function detail($id_order) {
    $this->db->select('*');
    $this->db->from('order');
    $this->db->where('id_order',$id_order);
    $this->db->order_by('id_order','ASC');
    $query = $this->db->get();
    return $query->row();
  }

  // Edit
  public function edit ($data) {
    $this->db->where('id_order',$data['id_order']);
    $this->db->update('order',$data);
  }

  // Delete
	public function delete ($data){
		$this->db->where('id_order',$data['id_order']);
		$this->db->delete('order',$data);
	}


}
