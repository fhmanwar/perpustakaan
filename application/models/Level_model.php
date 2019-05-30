<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level_model extends CI_Model {
    // Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
    }
    
    public function getLevel()
    {
        return $this->db->get('level');
    }

    private function autoIncrement()
    {
        $this->db->select_max('kode_level');
        $data = $this->db->get('level')->row_array();
        return $data['kode_level']+1;
    }

    public function createLevel()
    {
        $kode = $this->autoIncrement();
        $data = array(
            'kode_level'        => $kode,
            'level'             => $this->input->post('level'),
            'tanggal'           => date('Y-m-d H:i:s'),
        );
        return $this->db->insert('level', $data);
    }

    public function updateLevel($where)
    {
        $data = array(
            'level'             => $this->input->post('level'),
            'tanggal'           => date('Y-m-d H:i:s'),
        );
        $this->db->where('kode_level', $where);
        return $this->db->update('level', $data);
    }

    public function deleteLevel($where)
    {
        $this->db->where('kode_level', $where);
        return $this->db->delete('level');
    }

    //Listing
    public function listing() {
        $this->db->select('*');
        $this->db->from('level');
        $this->db->order_by('kode_level','ASC');
        $query = $this->db->get();
        return $query->result();
    }

    // Tambah
	public function tambah ($data) {
		$this->db->insert('level',$data);
	}

    public function detail($id) {
        $this->db->select('*');
        $this->db->from('level');
        $this->db->where('id_level',$id);
        $this->db->order_by('kode_level','ASC');
        $query = $this->db->get();
        return $query->row();
    }

    // Edit
    public function edit ($data) {
        $this->db->where('id_level',$data['id_level']);
        $this->db->update('level',$data);
    }

    // Delete
    public function delete ($data){
        $this->db->where('id_level',$data['id_level']);
        $this->db->delete('level',$data);
    }

}
