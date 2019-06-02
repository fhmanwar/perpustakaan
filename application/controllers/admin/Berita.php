<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        //proteksi halaman
        if ($this->session->userdata('username') == "" && $this->session->userdata('level') != "Admin") {
            $this->session->set_flashdata('Success', 'Silahkan login terlebih dahulu');
            redirect(base_url('login'), 'refresh');
        }

        // $this->load->model('home_model');
        $this->load->model('berita_model');
    }


    public function index()
    {
        $berita = $this->berita_model->listing();

        $data = array(
            'title' => 'Data Berita ('.count($berita).')',
            'berita'	=> 	$berita,
            'isi'   => 'admin/berita/list'
        );
        $this->load->view('admin/layout/file', $data, false);
    }

    //kelola berita buku
    public function tambah()
    {
        $berita = $this->berita_model->listing();
        
        $valid = $this->form_validation;
        $valid->set_rules('judul_berita', 'Judul Berita', 'required', array( 'required' => '%s harus diisi'));
        $valid->set_rules('isi', 'Isi', 'required', array( 'required' => '%s harus diisi'));

        if ($valid->run()) {
            $config['upload_path']   = './assets/upload/berita/';
            $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
            $config['max_size']      = '200000'; // KB
            $this->upload->initialize($config);
            if (! $this->upload->do_upload('gambar')) {
                // End validasi
                $i = $this->input;
                $slug_berita = url_title($this->input->post('judul_berita'), 'dash', true);
                $data = array( 	
                    'id_user'		=> 	$this->session->userdata('id_user'),
                    'slug_berita'	=>	$slug_berita,
                    'judul_berita'	=>	$i->post('judul_berita'),
                    'isi'		    =>	$i->post('isi'),
                    'status_berita'	=>  'Draft',
                    'jenis_berita'  =>  $i->post('jenis_berita')
                );
                $this->berita_model->tambah($data);
                $this->session->set_flashdata('pesan', ' Berita created successfully tetapi tersimpan di draft');
                redirect(base_url('admin/berita/'), 'refresh');
            // masuk database
            } else {
                $upload_data        		    = array('uploads' =>$this->upload->data());
                // Image Editor
                $config['image_library']  	= 'gd2';
                $config['source_image']   	= './assets/upload/berita/'.$upload_data['uploads']['file_name'];
                $config['new_image']      	= './assets/upload/berita/thumbs/';
                $config['create_thumb']   	= true;
                $config['quality']        	= "100%";
                $config['maintain_ratio']   = true;
                $config['width']       		= 360; // Pixel
                $config['height']       	= 360; // Pixel
                $config['x_axis']         	= 0;
                $config['y_axis']         	= 0;
                $config['thumb_marker']   	= '';
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $i = $this->input;
                $slug_berita = url_title($this->input->post('judul_berita'), 'dash', true);
                $data = array( 	
                    'id_user'		=> 	$this->session->userdata('id_user'),
                    'slug_berita'	=>	$slug_berita,
                    'judul_berita'	=>	$i->post('judul_berita'),
                    'isi'		    =>	$i->post('isi'),
                    'gambar'	    =>  $upload_data['uploads']['file_name'],
                    'status_berita'	=>  $i->post('status_berita'),
                    'jenis_berita'  =>  $i->post('jenis_berita')
                );
                $this->berita_model->tambah($data);
                $this->session->set_flashdata('pesan', ' Berita created successfully');
                redirect(base_url('admin/berita/'), 'refresh');
            }   
        }
        $data = array(
            'title' => 'Data Berita ('.count($berita).')',
            'berita'	=> 	$berita,
            'isi'   => 'admin/berita/list'
        );
        $this->load->view('admin/layout/file', $data, false);
    }

    // Edit Berita
    public function edit($id_berita)
    {
        $berita = $this->berita_model->detail($id_berita);


        $valid = $this->form_validation;
        $valid->set_rules('judul_berita', 'Judul Berita', 'required', array( 'required' => '%s harus diisi'));
        $valid->set_rules('isi', 'Isi', 'required', array( 'required' => '%s harus diisi'));


        if ($valid->run()) {
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path']   = './assets/upload/berita/';
                $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
                $config['max_size']      = '20000'; // KB
                $this->upload->initialize($config);
                if (! $this->upload->do_upload('gambar')) {
                    // End validasi
                    $data = array('title' => 'Edit Berita Buku : '.$berita->judul_berita,
                      'berita'	=> $berita,
                      'error'  => $this->upload->display_errors(),
                      'isi'   => 'admin/berita/list'
                      );
                    $this->load->view('admin/layout/file', $data, false);
                // masuk database
                } else {
                    $upload_data        		    = array('uploads' =>$this->upload->data());

                    // Image Editor
                    $config['image_library']  	= 'gd2';
                    $config['source_image']   	= './assets/upload/berita/'.$upload_data['uploads']['file_name'];
                    $config['new_image']      	= './assets/upload/berita/thumbs/';
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
                    if ($berita->gambar != "") {
                        unlink('./assets/upload/berita/'.$berita->gambar);
                        unlink('./assets/upload/berita/thumbs/'.$berita->gambar);
                    }// end hapus
                    $i = $this->input;
                    $slug_berita = url_title($this->input->post('judul_berita'), 'dash', true);
                    $data = array( 	'id_berita'     => $id_berita,
                          'id_user'				=> 	$this->session->userdata('id_user'),
                          'slug_berita'		=>	$slug_berita,
                          'judul_berita'	=>	$i->post('judul_berita'),
                          'isi'		        =>	$i->post('isi'),
                          'gambar'	      =>  $upload_data['uploads']['file_name'],
                          'status_berita'	=>  $i->post('status_berita'),
                          'jenis_berita'  =>  $i->post('jenis_berita')
                       );
                    $this->berita_model->edit($data);
                    $this->session->set_flashdata('pesan', ' News Edited successfully');
                    redirect(base_url('admin/berita/'), 'refresh');
                }
            } else {
                $i = $this->input;
                $slug_berita = url_title($this->input->post('judul_berita'), 'dash', true);
                $data = array(  'id_berita'      => $id_berita,
                         'id_user'				=> 	$this->session->userdata('id_user'),
                         'slug_berita'		=>	$slug_berita,
                         'judul_berita' 	=>	$i->post('judul_berita'),
                         'isi'		        =>	$i->post('isi'),
                         'status_berita'	=>  'Draft',
                         'jenis_berita'   =>  $i->post('jenis_berita')
                      );
                $this->berita_model->edit($data);
                $this->session->set_flashdata('pesan', ' Berita Edited successfully tapi tetap tersimpan sebagai draft');
                redirect(base_url('admin/berita/'), 'refresh');
            }
        }
        $data = array('title' => 'Edit Berita : '.$berita->judul_berita,
                    'berita'	=> $berita,
                    'isi'   => 'admin/berita/list'
                   );
        $this->load->view('admin/layout/file', $data, false);
    }

    // Delete Berita
    public function delete($id_berita)
    {
        $berita = $this->berita_model->detail($id_berita);

        // if ($berita->gambar != "") {
        //     // Hapus berita lama
        //     unlink('./assets/upload/berita/'.$berita->gambar);
        //     unlink('./assets/upload/berita//thumbs/'.$berita->gambar);
        //     // end hapus
        // }

        $data = array('id_berita'=> $id_berita);
        $this->berita_model->delete($data);
        $this->session->set_flashdata('pesan', 'Berita Deleted successfully');
        redirect(base_url('admin/berita/'), 'refresh');
    }
}
