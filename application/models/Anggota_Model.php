<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_Model extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function getAnggota()
    {
        $this->db->select('
            user.*,
            status.kode_status,
            status.status
        ');
        $this->db->from('user');
        $this->db->join('status','status.id_status = user.id_status','LEFT');
        $this->db->like('id_level','2');
        $this->db->order_by('id_user','ASC');
		$query = $this->db->get();
		return $query->result();
    }

    public function detailAnggota($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user',$id);
        $this->db->order_by('id_user','ASC');
        $query = $this->db->get();
        return $query->row();
    }

    public function createAnggota()
    {
        $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_'; 
        $random = str_repeat(str_shuffle($str),4);

        $email = $this->input->post('email');

        $ci = get_instance();
		$ci->load->library('email');
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.gmail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "testingemailmahasiswa@gmail.com";
		$config['smtp_pass'] = "akusayangkamu123";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
				
		$ci->email->initialize($config);

		$isi = '<table>';
		$isi .= '<tr><td><h4>Aktifkan Akun Sosial Bencana!</h4></td></tr>';
		$isi .= '<tr><td><p>Halo <b>' . $email . '</b> terima kasih telah melakukan pendaftaran di Sosial Bencana. Kami beritahukan kepada Anda untuk melakukan aktivasi akun agar bisa digunakan.</p></td></tr>';
		$isi .= '<tr><td><a href="'.base_url().'aktivasi/'.$random.'">AKTIVASI AKUN</a></td></tr>';
		$isi .= '<tr><td><p>Terima Kasih, Salam Hormat</p></td></tr>';
		$isi .= '</table>';
		
		$ci->email->from('noreply@sosben.com', 'noreply');
		$ci->email->to($email);
		$ci->email->subject('AKTIFASI AKUN SOSIAL BENCANA');
		$ci->email->message($isi);
		$this->email->send();

        $data = [
            'id_level' => 2,
            'id_status' => 2,
            'username' => htmlspecialchars($this->input->post('username',true)),
            'password' => password_hash($this->input->post('password'),PASSWORD_ARGON2ID),
            'token' => $random,
            'nama' => htmlspecialchars($this->input->post('nama',true)),
            'email' => htmlspecialchars($this->input->post('email',true)),
            'avatar' => 'default.jpg',
            
        ];
        return $this->db->insert('user',$data);
    }

    public function updateAnggota($id)
    {
        $i = $this->input;
        if(strlen($i->post('password')) > 6){
            $data = [
                'id_user' => $id,
                'id_level' => 2,
                'id_status' => 2,
                'password' => password_hash($this->input->post('password'),PASSWORD_ARGON2ID),
                'nama' => htmlspecialchars($this->input->post('nama',true)),
                'email' => htmlspecialchars($this->input->post('email',true)),
                'avatar' => 'default.jpg',
                
            ];
        }else {
            $data = [
                'id_user' => $id,
                'id_level' => 2,
                'id_status' => 2,
                'nama' => htmlspecialchars($this->input->post('nama',true)),
                'email' => htmlspecialchars($this->input->post('email',true)),
                'avatar' => 'default.jpg',
                
            ];
        }

        $this->db->where('id_user',$data['id_user']);
        return $this->db->update('user', $data);
    }

    public function deleteAnggota($id)
    {
        $data = [
            'id_user' => $id
        ];
        $this->db->where('id_user',$data['id_user']);
        return $this->db->delete('user');
    }

}

/* End of file Anggota_Model.php */
