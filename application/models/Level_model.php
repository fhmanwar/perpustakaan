<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level_Model extends CI_Model {
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

    public function create()
    {
        $kode = $this->autoIncrement();
        $data = array(
            'kode_level'        => $kode,
            'level'             => $this->input->post('level')
        );
        return $this->db->insert('level', $data);
    }

    public function update($id)
    {
        $data = array(
            'id_level' => $id,
            'level'      => $this->input->post('level')
        );
        $this->db->where('id_level',$data['id_level']);
        // $this->db->where('id_level', $id);
        return $this->db->update('level', $data);
    }

    public function delete($id)
    {
        $data = [
            'id_level' => $id
        ];
        $this->db->where('id_level',$data['id_level']);
        return $this->db->delete('level');
    }

    //Listing
    public function listing() {
        $this->db->select('*');
        $this->db->from('level');
        $this->db->order_by('id_level','ASC');
        $query = $this->db->get();
        return $query->result();
    }

}
