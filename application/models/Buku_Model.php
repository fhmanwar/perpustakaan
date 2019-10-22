<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_Model extends CI_Model {

	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

  //----------- user ------------
  //Listing
  public function listing() {
    $this->db->select('buku.*,
                      jenis.nama_jenis,
                      jenis.kode_jenis,
                      bahasa.nama_bahasa,
                      bahasa.kode_bahasa,
                      user.nama
                      ');
    $this->db->from('buku');
    //JDin 4 table
    $this->db->join('jenis','jenis.id_jenis = buku.id_jenis','LEFT');
    $this->db->join('bahasa','bahasa.id_bahasa = buku.id_bahasa','LEFT');
    $this->db->join('user','user.id_user = buku.id_user','LEFT');
    //end join
    $this->db->order_by('id_buku','ASC');
    $query = $this->db->get();
    return $query->result();
  }

  //top peminjaman buku
  public function top_book() {
    $this->db->select('
        buku.*,
        count(*) as tot
    ');
    $this->db->from('buku');
    $this->db->join('peminjaman', 'peminjaman.id_buku = buku.id_buku','LEFT');
    $this->db->group_by('buku.id_buku');
    $this->db->order_by('count(judul_buku)','DESC');
    $this->db->limit(5);
    $query = $this->db->get();
    return $query->result();
  }
  //best peminjaman buku
  public function best_book() {
    $this->db->select('
        buku.*,
        count(*) as tot
    ');
    $this->db->from('buku');
    $this->db->join('peminjaman', 'peminjaman.id_buku = buku.id_buku','LEFT');
    $this->db->group_by('buku.id_buku');
    $this->db->order_by('count(judul_buku)','DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function bookLimit($lmt) {
    $this->db->select('
        buku.*,
        count(*) as tot
    ');
    $this->db->from('buku');
    $this->db->join('peminjaman', 'peminjaman.id_buku = buku.id_buku','LEFT');
    $this->db->group_by('buku.id_buku');
    $this->db->order_by('count(judul_buku)','DESC');
    $this->db->limit($lmt);
    $query = $this->db->get();
    return $query->result();
  }
  // public function bookLimit10() {
  //   $this->db->select('
  //       buku.*,
  //       count(*) as tot
  //   ');
  //   $this->db->from('buku');
  //   $this->db->join('peminjaman', 'peminjaman.id_buku = buku.id_buku','LEFT');
  //   $this->db->group_by('buku.id_buku');
  //   $this->db->order_by('count(judul_buku)','DESC');
  //   $this->db->limit(10);
  //   $query = $this->db->get();
  //   return $query->result();
  // }
  // public function bookLimit25() {
  //   $this->db->select('
  //       buku.*,
  //       count(*) as tot
  //   ');
  //   $this->db->from('buku');
  //   $this->db->join('peminjaman', 'peminjaman.id_buku = buku.id_buku','LEFT');
  //   $this->db->group_by('buku.id_buku');
  //   $this->db->order_by('count(judul_buku)','DESC');
  //   $this->db->limit(25);
  //   $query = $this->db->get();
  //   return $query->result();
  // }
  // public function bookLimit50() {
  //   $this->db->select('
  //       buku.*,
  //       count(*) as tot
  //   ');
  //   $this->db->from('buku');
  //   $this->db->join('peminjaman', 'peminjaman.id_buku = buku.id_buku','LEFT');
  //   $this->db->group_by('buku.id_buku');
  //   $this->db->order_by('count(judul_buku)','DESC');
  //   $this->db->limit(50);
  //   $query = $this->db->get();
  //   return $query->result();
  // }
  // public function bookLimit100() {
  //   $this->db->select('
  //       buku.*,
  //       count(*) as tot
  //   ');
  //   $this->db->from('buku');
  //   $this->db->join('peminjaman', 'peminjaman.id_buku = buku.id_buku','LEFT');
  //   $this->db->group_by('buku.id_buku');
  //   $this->db->order_by('count(judul_buku)','DESC');
  //   $this->db->limit(100);
  //   $query = $this->db->get();
  //   return $query->result();
  // }

	//Buku
  public function buku() {
    $this->db->select('buku.*,
                      jenis.nama_jenis,
                      jenis.kode_jenis,
                      bahasa.nama_bahasa,
                      bahasa.kode_bahasa,
                      user.nama
                      ');
    $this->db->from('buku');
    //JDin 4 table
    $this->db->join('jenis','jenis.id_jenis = buku.id_jenis','LEFT');
    $this->db->join('bahasa','bahasa.id_bahasa = buku.id_bahasa','LEFT');
    $this->db->join('user','user.id_user = buku.id_user','LEFT');
    //end join
		$this->db->where(array(	'buku.status_buku' => 'Publish'));
    $this->db->order_by('id_buku','ASC');
		// $this->db->limit(4);
    $query = $this->db->get();
    return $query->result();
  }

	//Buku Baru
  public function buku_baru() {
    $this->db->select('buku.*,
                      jenis.nama_jenis,
                      jenis.kode_jenis,
                      bahasa.nama_bahasa,
                      bahasa.kode_bahasa,
                      user.nama
                      ');
    $this->db->from('buku');
    //JDin 4 table
    $this->db->join('jenis','jenis.id_jenis = buku.id_jenis','LEFT');
    $this->db->join('bahasa','bahasa.id_bahasa = buku.id_bahasa','LEFT');
    $this->db->join('user','user.id_user = buku.id_user','LEFT');
    //end join
		$this->db->where(array(	'buku.status_buku' => 'Publish'));
    $this->db->order_by('id_buku','DESC');
		$this->db->limit(4);
    $query = $this->db->get();
    return $query->result();
  }

	//cari buku
  public function cari($keywords) {
    $this->db->select('buku.*,
                      jenis.nama_jenis,
                      jenis.kode_jenis,
                      bahasa.nama_bahasa,
                      bahasa.kode_bahasa,
                      user.nama
                      ');
    $this->db->from('buku');
    //JDin 4 table
    $this->db->join('jenis','jenis.id_jenis = buku.id_jenis','LEFT');
    $this->db->join('bahasa','bahasa.id_bahasa = buku.id_bahasa','LEFT');
    $this->db->join('user','user.id_user = buku.id_user','LEFT');
    //end join
		$this->db->where(array(	'buku.status_buku' => 'Publish'));
		$this->db->like('buku.judul_buku',$keywords);
    $this->db->order_by('id_buku','DESC');
		// $this->db->limit(4);
    $query = $this->db->get();
    return $query->result();
  }

  //kategori buku
  public function kategori($id_jenis) {
    $this->db->select('buku.*,
                      jenis.nama_jenis,
                      user.nama
                      ');
    $this->db->from('buku');
    //JDin 4 table
    $this->db->join('jenis','jenis.id_jenis = buku.id_jenis','LEFT');
    $this->db->join('user','user.id_user = buku.id_user','LEFT');
    //end join
    if ($id_jenis>0){
      $this->db->where(array(	
        'buku.id_jenis' => $id_jenis,
        'buku.status_buku' => 'Publish'
      ));
    }
    $this->db->order_by('id_buku','DESC');
    // $this->db->limit(4);
    $query = $this->db->get();
    return $query->result();
  }

	//detail buku
  public function detaill($id_buku) {
    $this->db->select('buku.*,
                      jenis.nama_jenis,
                      jenis.kode_jenis,
                      bahasa.nama_bahasa,
                      bahasa.kode_bahasa,
                      user.nama
                      ');
    $this->db->from('buku');
    //JDin 4 table
    $this->db->join('jenis','jenis.id_jenis = buku.id_jenis','LEFT');
    $this->db->join('bahasa','bahasa.id_bahasa = buku.id_bahasa','LEFT');
    $this->db->join('user','user.id_user = buku.id_user','LEFT');
    //end join
		$this->db->where(array(	'buku.status_buku' => 'Publish',
														'id_buku' => $id_buku
													));
    // $this->db->order_by('id_buku','DESC');
		// $this->db->limit(4);
    $query = $this->db->get();
    return $query->row();
  }

	// Tambah
	public function tambah ($data) {
		$this->db->insert('buku',$data);
	}

  public function detail($id_buku) {
    $this->db->select('*');
    $this->db->from('buku');
    $this->db->where('id_buku',$id_buku);
    $this->db->order_by('id_buku','ASC');
    $query = $this->db->get();
    return $query->row();
  }

  // Edit
  public function edit ($data) {
    $this->db->where('id_buku',$data['id_buku']);
    $this->db->update('buku',$data);
  }

  // Delete
	public function delete ($data){
		$this->db->where('id_buku',$data['id_buku']);
		$this->db->delete('buku',$data);
  }
  
  public function detailCart($id)
  {
    return $this->db->get_where('buku',['id_buku' => $id])->row(); 
  }


}
