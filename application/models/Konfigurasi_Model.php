<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_Model extends CI_Model {

	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

  //Listing
  public function listing() {
    $query = $this->db->get('konfigurasi');
    return $query->row();
  }

  //Edit
  public function edit($data) {
    $this->db->where('id',$data['id']);
    $this->db->update('konfigurasi',$data);
  }
}
