<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi extends CI_Controller
{
  // Load database
  public function __construct(){
    parent::__construct();
    // $this->load->model('home_model');
    $this->load->model('konfigurasi_model');

    if ($this->session->userdata('akses_level') != "Admin") {
      $this->session->set_flashdata('success','Oops.. Hak Akses Anda tidak mencukupi');
      redirect(base_url('login'),'refresh');
    }
    // $this->load->model('video_model');
    // $this->load->model('berita_model');
    // $this->load->model('produk_model');
    // $this->load->model('kategori_produk_model');
    // $this->load->model('kategori_berita_model');
    }

    public function index()
    {
      $konfigurasi = $this->konfigurasi_model->listing();

      $valid = $this->form_validation->set_rules('namaweb','Nama Website','required',
                  array('required'  => 'Nama Organisasi atau perusahaan harus diisi'));

      if($valid->run() === FALSE){

        $data = array('title' => 'Konfigurasi Website : '.$konfigurasi->namaweb,
                    'konfigurasi'   => $konfigurasi,
                    'isi'   => 'admin/konfigurasi/list'
                    );
        $this->load->view('admin/layout/file', $data, false);
      }else {
        $i = $this->input;
        $data = array('id'                => $konfigurasi->id,
                      'id_user'           => $this->session->userdata('id_user'),
                      'namaweb'           => $i->post('namaweb'),
                      'tagline'           => $i->post('tagline'),
                      'deskripsi'         => $i->post('deskripsi'),
                      'keywords'          => $i->post('keywords'),
                      'email'             => $i->post('email'),
                      'website'           => $i->post('website'),
                      'facebook'          => $i->post('facebook'),
                      'twitter'           => $i->post('twitter'),
                      'instagram'         => $i->post('instagram'),
                      'map'               => $i->post('map'),
                      'metatext'          => $i->post('metatext'),
                      'phone'             => $i->post('phone'),
                      'alamat'            => $i->post('alamat')
                    );
        $this->konfigurasi_model->edit($data);
        $this->session->set_flashdata('success','Edited is Successfully');
        redirect(base_url('admin/konfigurasi'),'refresh');
      }

    }

    public function logo()
    {
      $konfigurasi = $this->konfigurasi_model->listing();

      $valid = $this->form_validation->set_rules('id','ID Konfigurasi','required',
                  array('required'  => 'ID Organisasi atau perusahaan harus diisi'));

      if($valid->run()){
        $config['upload_path']   = './assets/upload/image/';
        $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
        $config['max_size']      = '20000'; // KB
        $this->upload->initialize($config);
        if (! $this->upload->do_upload('logo')) {
          $data = array('title' => 'Konfigurasi logo Website : '.$konfigurasi->namaweb,
                      'konfigurasi'   => $konfigurasi,
                      'error'  => $this->upload->display_errors(),
                      'isi'   => 'admin/konfigurasi/logo'
                      );
          $this->load->view('admin/layout/file', $data, false);
        }else {
          $upload_data        		    = array('uploads' =>$this->upload->data());

          // Image Editor
          $config['image_library']  	= 'gd2';
          $config['source_image']   	= './assets/upload/image/'.$upload_data['uploads']['file_name'];
          $config['new_image']      	= './assets/upload/image/thumbs/';
          $config['create_thumb']   	= true;
          $config['quality']        	= "100%";
          $config['maintain_ratio']   = true;
          $config['width']       		  = 360; // Pixel
          $config['height']       	  = 360; // Pixel
          $config['x_axis']         	= 0;
          $config['y_axis']         	= 0;
          $config['thumb_marker']   	= '';
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();

          // Hapus berita lama
          if ($konfigurasi->logo != "") {
              unlink('./assets/upload/image/'.$konfigurasi->logo);
              unlink('./assets/upload/image/thumbs/'.$konfigurasi->logo);
          }// end hapus

          $i = $this->input;
          $data = array('id'                => $konfigurasi->id,
                        'id_user'           => $this->session->userdata('id_user'),
                        'logo'              => $upload_data['uploads']['file_name']
                      );
          $this->konfigurasi_model->edit($data);
          $this->session->set_flashdata('success','Edited is Successfully');
          redirect(base_url('admin/konfigurasi/logo'),'refresh');
        }}
      $data = array('title' => 'Konfigurasi logo Website : '.$konfigurasi->namaweb,
                  'konfigurasi'   => $konfigurasi,
                  'isi'   => 'admin/konfigurasi/logo'
                  );
      $this->load->view('admin/layout/file', $data, false);
    }

    public function icon()
    {
      $konfigurasi = $this->konfigurasi_model->listing();

      $valid = $this->form_validation->set_rules('id','ID Konfigurasi','required',
                  array('required'  => 'ID Organisasi atau perusahaan harus diisi'));

      if($valid->run()){
        $config['upload_path']   = './assets/upload/image/';
        $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
        $config['max_size']      = '20000'; // KB
        $this->upload->initialize($config);
        if (! $this->upload->do_upload('icon')) {
          $data = array('title' => 'Konfigurasi icon Website : '.$konfigurasi->namaweb,
                      'konfigurasi'   => $konfigurasi,
                      'error'  => $this->upload->display_errors(),
                      'isi'   => 'admin/konfigurasi/icon'
                      );
          $this->load->view('admin/layout/file', $data, false);
        }else {
          $upload_data        		    = array('uploads' =>$this->upload->data());

          // Image Editor
          $config['image_library']  	= 'gd2';
          $config['source_image']   	= './assets/upload/image/'.$upload_data['uploads']['file_name'];
          $config['new_image']      	= './assets/upload/image/thumbs/';
          $config['create_thumb']   	= true;
          $config['quality']        	= "100%";
          $config['maintain_ratio']   = true;
          $config['width']       		  = 360; // Pixel
          $config['height']       	  = 360; // Pixel
          $config['x_axis']         	= 0;
          $config['y_axis']         	= 0;
          $config['thumb_marker']   	= '';
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();

          // Hapus berita lama
          if ($konfigurasi->icon != "") {
              unlink('./assets/upload/image/'.$konfigurasi->icon);
              unlink('./assets/upload/image/thumbs/'.$konfigurasi->icon);
          }// end hapus

          $i = $this->input;
          $data = array('id'                => $konfigurasi->id,
                        'id_user'           => $this->session->userdata('id_user'),
                        'icon'              => $upload_data['uploads']['file_name']
                      );
          $this->konfigurasi_model->edit($data);
          $this->session->set_flashdata('success','Edited is Successfully');
          redirect(base_url('admin/konfigurasi/icon'),'refresh');
        }}
      $data = array('title' => 'Konfigurasi icon Website : '.$konfigurasi->namaweb,
                  'konfigurasi'   => $konfigurasi,
                  'isi'   => 'admin/konfigurasi/icon'
                  );
      $this->load->view('admin/layout/file', $data, false);
    }

}
