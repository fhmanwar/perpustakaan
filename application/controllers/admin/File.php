<?php
defined('BASEPATH') or exit('No direct script access allowed');

class File extends CI_Controller
{

    public function __construct() {
      parent::__construct();
      // $this->load->model('home_model');
      $this->load->model('file_model');
      $this->load->model('buku_model');
    }


    public function index(){
      $file = $this->file_model->listing();

      $data = array('title' => 'Data File Buku ('.count($file).')',
                  'file'	=> 	$file,
                  'isi'   => 'admin/file/list'
                  );
        $this->load->view('admin/layout/file', $data, false);
    }

    public function download($id_file){
      $file = $this->file_model->detail($id_file);

      //proses download
      $path = './assets/upload/files/';
      $file = $file->nama_file;
      force_download($path.$file, NUll);
    }


  //kelola file buku
  public function kelola($id_buku){
    $file = $this->file_model->buku($id_buku);
    $buku = $this->buku_model->detail($id_buku);

    $valid = $this->form_validation;
    $valid->set_rules('judul_file','Judul File','required', array( 'required' => '%s harus diisi'));
    if($valid->run()) {
      $config['upload_path']   = './assets/upload/files/';
      $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx';
      $config['max_size']      = '20000'; // KB
      $this->upload->initialize($config);
      if(! $this->upload->do_upload('nama_file')) {
        // End validasi
        $data = array('title' => 'Data File Buku : '.$buku->judul_buku.'('.count($file).')',
                      'file'	=> $file,
                      'buku'  => $buku,
                      'error'  => $this->upload->display_errors(),
                      'isi'   => 'admin/file/list'
                      );
        $this->load->view('admin/layout/file', $data, false);
      // masuk database
      }else{
          $upload_data        		    = array('uploads' =>$this->upload->data());
          $i = $this->input;
          $data = array( 	'id_user'				=> 	$this->session->userdata('id_user'),
                          'id_buku'				=>	$id_buku,
                          'judul_file'		=>	$i->post('judul_file'),
                          'nama_file'	    =>  $upload_data['uploads']['file_name'],
                          'keterangan'	  =>  $i->post('keterangan'),
                          'urutan'   	    =>  $i->post('urutan')
                        );
          $this->file_model->tambah($data);
          $this->session->set_flashdata('success',' File created successfully');
          redirect(base_url('admin/file/kelola/'.$id_buku),'refresh');
        }}
        $data = array('title' => 'Data File Buku : '.$buku->judul_buku.'('.count($file).')',
                    'file'	=> $file,
                    'buku'  => $buku,
                    'isi'   => 'admin/file/list'
                    );
      $this->load->view('admin/layout/file', $data, false);
  }

  // Edit File
  public function edit($id_file){
    $file = $this->file_model->detail($id_file);
    $id_buku = $file->id_buku;
    $buku  = $this->buku_model->detail($id_buku);


    $valid = $this->form_validation;
    $valid->set_rules('judul_file','Judul File','required', array( 'required' => '%s harus diisi'));
    if($valid->run()) {
      if(!empty($_FILES['nama_file']['name'])){
        $config['upload_path']   = './assets/upload/files/';
        $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx';
        $config['max_size']      = '20000'; // KB
        $this->upload->initialize($config);
        if(! $this->upload->do_upload('nama_file')) {
        // End validasi
          $data = array('title' => 'Edit File Buku : '.$buku->judul_buku.'('.count($file).')',
                        'file'	=> $file,
                        'buku'  => $buku,
                        'error'  => $this->upload->display_errors(),
                        'isi'   => 'admin/file/list'
                        );
          $this->load->view('admin/layout/file', $data, false);
        // masuk database
        }else{
          $upload_data        		    = array('uploads' =>$this->upload->data());

          // Hapus file lama
          unlink('./assets/upload/files/'.$file->nama_file);
          // end hapus

            $i = $this->input;
            $data = array( 	'id_file'				=> 	$id_file,
                            'id_user'				=> 	$this->session->userdata('id_user'),
                            'id_buku'				=>	$id_buku,
                            'judul_file'		=>	$i->post('judul_file'),
                            'nama_file'	    =>  $upload_data['uploads']['file_name'],
                            'keterangan'	  =>  $i->post('keterangan'),
                            'urutan'   	    =>  $i->post('urutan')
                        );
            $this->file_model->edit($data);
            $this->session->set_flashdata('success',' File created successfully');
            redirect(base_url('admin/file/kelola/'.$id_buku),'refresh');
        }}else {
          $i = $this->input;
          $data = array( 	'id_file'				=> 	$id_file,
                          'id_user'				=> 	$this->session->userdata('id_user'),
                          'id_buku'				=>	$id_buku,
                          'judul_file'		  =>	$i->post('judul_file'),
                          'keterangan'	    =>  $i->post('keterangan'),
                          'urutan'   	    =>  $i->post('urutan')
                        );
          $this->file_model->edit($data);
          $this->session->set_flashdata('success',' File created successfully');
          redirect(base_url('admin/file/kelola/'.$id_buku),'refresh');
        }}
      $data = array('title' => 'Edit File Buku : '.$buku->judul_buku.'('.count($file).')',
                    'file'	=> $file,
                    'buku'  => $buku,
                    'isi'   => 'admin/file/list'
                  );
      $this->load->view('admin/layout/file', $data, false);
    }

  // Delete File
	public function delete($id_file,$id_buku) {
    //proteksi halaman
    if($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "" ){
      $this->session->set_flashdata('Success','Silahkan login terlebih dahulu');
      redirect(base_url('login'),'refresh');
    }

    $file = $this->file_model->detail($id_file);

    if($file->nama_file != ""){
      // Hapus file lama
      unlink('./assets/upload/files/'.$file->nama_file);
      // end hapus
    }

		$data = array('id_file'=> $id_file);
		$this->file_model->delete($data);
		$this->session->set_flashdata('Success','File Deleted successfully');
		redirect (base_url('admin/file/kelola/'.$id_buku),'refresh');
	}
}
