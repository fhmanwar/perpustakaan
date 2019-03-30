<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usulan extends CI_Controller
{

    public function __construct() {
      parent::__construct();
      // $this->load->model('home_model');
      $this->load->model('usulan_model');
    }


    public function index(){
      $usulan = $this->usulan_model->listing();

      $data = array('title' => 'Data Usulan('.count($usulan).')',
                  'usulan'	=> 	$usulan,
                  'isi'   => 'admin/usulan/list'
                  );
        $this->load->view('admin/layout/file', $data, false);
    }

    public function tambah()
    {
      $valid = $this->form_validation;

      $valid->set_rules('judul','Judul','required|min_length[10]',
                        array(	'required'	=> '%s harus diisi',
                        'min_length'        => '%s minimal 10 karakter'
                      ));
      $valid->set_rules('penerbit','Penerbit','required|min_length[5]',
                        array(	'required'	=> '%s harus diisi',
                        'min_length'        => '%s minimal 5 karakter'
                      ));
      $valid->set_rules('penulis','Penulis','required|min_length[5]',
                        array(	'required'	=> '%s harus diisi',
                        'min_length'        => '%s minimal 5 karakter'
                      ));
      $valid->set_rules('nama_pengusul','Nama Pengusul','required|min_length[5]',
                        array(	'required'	=> '%s harus diisi',
                        'min_length'        => '%s minimal 5 karakter'
                      ));
      $valid->set_rules('email_pengusul','Email Pengusul','required|valid_email',
                        array(	'required'	=> '%s harus diisi',
                        'valid_email'        => '%s tidak valid'
                      ));

      if($valid->run()===FALSE){
        $data = array('title'  			=> 'Buat Usulan Baru',//$site['namaweb'].' | '.$site['tagline']
                      // 'produk'			=> $produk,
                      // 'new'					=> $new,
                      // 'usulan'  		  => $usulan,
                      // 'berita'  		=> $berita,
                      // 'slide'  			=> $slide,
                      'isi'    			=> 'admin/usulan/tambah');

        $this->load->view('admin/layout/file',$data,FALSE);
      }else {
        $i = $this->input;
   			$data = array( 	'judul'				     => $i->post('judul'),
   											'penulis'				   =>	$i->post('penulis'),
   											'penerbit'		     =>	$i->post('penerbit'),
   											'keterangan'		   =>	$i->post('keterangan'),
   											'nama_pengusul'	   =>	$i->post('nama_pengusul'),
                        'email_pengusul'   => $i->post('email_pengusul'),
                        'ip_add'	         => $i->ip_address(),
                        'status_usulan'    => $i->post('status_usulan'),
   											'tanggal_usulan'	 => date('Y-m-d H:i:s')
                      );
   			$this->usulan_model->tambah($data);
   			$this->session->set_flashdata('success','Terima kasih usulan anda telah kami terima. kami akan segera melengkapi buku sesuai usulan anda.');
   			redirect(base_url('admin/usulan'),'refresh');
      }
    }

    public function edit($id_usulan)
    {
      $usulan = $this->usulan_model->detail($id_usulan);

      $valid = $this->form_validation;

      $valid->set_rules('judul','Judul','required|min_length[10]',
                        array(	'required'	=> '%s harus diisi',
                        'min_length'        => '%s minimal 10 karakter'
                      ));
      $valid->set_rules('penerbit','Penerbit','required|min_length[5]',
                        array(	'required'	=> '%s harus diisi',
                        'min_length'        => '%s minimal 5 karakter'
                      ));
      $valid->set_rules('penulis','Penulis','required|min_length[5]',
                        array(	'required'	=> '%s harus diisi',
                        'min_length'        => '%s minimal 5 karakter'
                      ));
      $valid->set_rules('nama_pengusul','Nama Pengusul','required|min_length[5]',
                        array(	'required'	=> '%s harus diisi',
                        'min_length'        => '%s minimal 5 karakter'
                      ));
      $valid->set_rules('email_pengusul','Email Pengusul','required|valid_email',
                        array(	'required'	=> '%s harus diisi',
                        'valid_email'        => '%s tidak valid'
                      ));

      if($valid->run()===FALSE){
        $data = array('title'  			=> 'Edit Usulan',//$site['namaweb'].' | '.$site['tagline']
                      // 'produk'			=> $produk,
                      // 'new'					=> $new,
                      'usulan'  		  => $usulan,
                      // 'berita'  		=> $berita,
                      // 'slide'  			=> $slide,
                      'isi'    			=> 'admin/usulan/edit');

        $this->load->view('admin/layout/file',$data,FALSE);
      }else {
        $i = $this->input;
   			$data = array( 	'id_usulan'		     => $id_usulan,
                        'judul'				     => $i->post('judul'),
   											'penulis'				   =>	$i->post('penulis'),
   											'penerbit'		     =>	$i->post('penerbit'),
   											'keterangan'		   =>	$i->post('keterangan'),
   											'nama_pengusul'	   =>	$i->post('nama_pengusul'),
                        'email_pengusul'   => $i->post('email_pengusul'),
                        'ip_add'	         => $i->ip_address(),
                        'status_usulan'    => $i->post('status_usulan')
                      );
   			$this->usulan_model->edit($data);
   			$this->session->set_flashdata('success','Edited Successfully');
   			redirect(base_url('admin/usulan'),'refresh');
      }
    }

    // Delete Usulan
  	public function delete($id_usulan) {
        //proteksi halaman
        if($this->session->userdata('usulanname') == "" && $this->session->userdata('akses_level') == "" ){
          $this->session->set_flashdata('Success','Silahkan login terlebih dahulu');
          redirect(base_url('login'),'refresh');
        }

    		$data = array('id_usulan'=> $id_usulan);
    		$this->usulan_model->delete($data);
    		$this->session->set_flashdata('Success','Usulan Deleted successfully');
    		redirect (base_url('admin/usulan'),'refresh');
  	}
}
