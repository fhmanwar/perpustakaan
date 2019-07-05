<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katalog extends CI_Controller {

  public function __construct(){
		parent::__construct();
    $data = [
      'berita_model',
      'buku_model',
      'jenis_model',
      'bahasa_model',
      'file_model',
      'link_model',
      'peminjaman_model',
      'order_model'
    ];
    $this->load->model($data);

  }

  public function test()
  {
    // $x = $this->session->userdata('id_user');
    // $limit = $this->peminjaman_model->limit_peminjaman_anggota($x);
    // var_dump($limit);
    // $x = $this->jenis_model->listing();
    // var_dump($x);
    $cart = $this->cart->contents();
    echo '<pre>';
    print_r($cart);
    echo CI_VERSION;
    echo '</pre>';
  }

	public function index()
	{
    // $buku	= $this->buku_model->buku();
    $jenis = $this->jenis_model->listing();
    $url = ($this->uri->segment(3))?$this->uri->segment(3):0;
    $buku = $this->buku_model->kategori($url);

    $valid = $this->form_validation;
    $valid->set_rules('cari','Keywords','required',
                array('required' => 'Keywords harus diisi' ));

    if($valid->run()){
      $cari = strip_tags($this->input->post('cari'));
      $keywords = str_replace(' ','-',$cari);
      redirect(base_url('katalog/cari/'.$keywords),'refresh');
    }

    $data = array('title'  			=> 'Katalog Buku',//$site['namaweb'].' | '.$site['tagline']
									// 'produk'			=> $produk,
                  // 'new'					=> $new,
                  'buku'  		  => $buku,
                  'jenis' => $jenis,
									// 'berita'  		=> $berita,
									// 'slide'  			=> $slide,
                  'isi'    			=> 'katalog/list');

    $this->load->view('layout/file',$data,FALSE);
	}

  public function cari($keywords)
	{
    $keywords = str_replace(' ','-',strip_tags($keywords));
    $buku	= $this->buku_model->cari($keywords);


    $data = array('title'  			=> 'Hasil Pencarian "'.$keywords.'" ('.count($buku).')',//$site['namaweb'].' | '.$site['tagline']
									// 'produk'			=> $produk,
									// 'new'					=> $new,
                  'buku'  		  => $buku,
                  'keywords'  	=> $keywords,
									// 'berita'  		=> $berita,
									// 'slide'  			=> $slide,
                  'isi'    			=> 'katalog/cari');

    $this->load->view('layout/file',$data,FALSE);
	}

  public function detail($id_buku)
	{
    // $keywords = str_replace(' ','-',strip_tags($keywords));
    $bukus	= $this->buku_model->buku_baru();
    $buku	= $this->buku_model->detaill($id_buku);
    $file	= $this->file_model->buku($id_buku);
    $limit = $this->peminjaman_model->limit_peminjaman_anggota($id_buku);
    $cart = $this->cart->contents();

    $data = array('title'  			=> $buku->judul_buku,//$site['namaweb'].' | '.$site['tagline']
									// 'produk'			=> $produk,
									// 'new'					=> $new,
                  'buku'  		  => $buku,
                  'bukus'  		  => $bukus,
                  'file'  		  => $file,
                  'cart'        => $cart,
                  'limit'       =>  $limit,
                  'judul'       => 'Detail Buku',
                  'isi'    			=> 'katalog/detail');

    $this->load->view('layout/file',$data,FALSE);
	}

  public function read($id_file)
	{
    // $keywords = str_replace(' ','-',strip_tags($keywords));
    $bukus	= $this->buku_model->buku_baru();
    $file	= $this->file_model->detail($id_file);
    $id_buku = $file->id_buku;
    $buku	= $this->buku_model->detaill($id_buku);

    $data = array('title'  			=> $buku->judul_buku.' - '.$file->judul_file,
									// 'produk'			=> $produk,
									// 'new'					=> $new,
                  'buku'  		  => $buku,
                  'bukus'  		  => $bukus,
                  'file'  		  => $file,
                  // 'keywords'  	=> $keywords,
									// 'berita'  		=> $berita,
									// 'slide'  			=> $slide,
                  'judul'       => 'Detail Buku',
                  'isi'    			=> 'katalog/read');

    $this->load->view('layout/file',$data,FALSE);
  }

  public function addPinjam($id)
  {
    //proteksi halaman
    if($this->session->userdata('username') == ""){
      $this->session->set_flashdata('Success','Silahkan login terlebih dahulu');
      redirect(base_url('login'),'refresh');
    }

    $i = $this->input;
    $data = [
      'id_user' => $this->session->userdata('id_user'),
      'id_buku' => $i->post('id_buku'),
      'tanggal_pinjam'  => $i->post('tanggal_pinjam'),
      'tanggal_kembali'  => $i->post('tanggal_kembali'),
      'keterangan'  => $i->post('keterangan'),
      'status_kembali'  => 'Belum'
    ];
    $this->peminjaman_model->tambah($data);
    $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success" role="alert">
            Data Peminjaman Telah ditambahkan
        </div>'
    );
    redirect(base_url('katalog/detail/'.$id),'refresh');

  }

  public function listPinjam()
  {
    //proteksi halaman
    if($this->session->userdata('username') == ""){
      $this->session->set_flashdata('Success','Silahkan login terlebih dahulu');
      redirect(base_url('login'),'refresh');
    }
    $id = $this->session->userdata('id_user');
    $peminjaman = $this->peminjaman_model->anggota($id);
    $limit = $this->peminjaman_model->limit_peminjaman_anggota($id);
    // $anggota = $this->anggota_model->detailAnggota($id);
    // $buku = $this->buku_model->listing();
    // $konfigurasi = $this->konfigurasi_model->listing();
    $data = [
      'title'  			=> 'Peminjaman Buku',
      'peminjaman' => $peminjaman,
      'limit' => $limit,
      // 'konfigurasi' => $konfigurasi,
      // 'buku' => $buku,
      'isi' => 'katalog/pinjam'
    ];
    $this->load->view('layout/file', $data, FALSE);
  }

  public function delete($id_peminjaman) {
		$data = array('id_peminjaman'=> $id_peminjaman);
		$this->peminjaman_model->delete($data);
		$this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success" role="alert">
                Peminjaman Deleted successfully
            </div>'
        );
		redirect (base_url('katalog'),'refresh');
  }

  public function invoice()
  {
    $email = $this->session->userdata('email');
    $id = $this->session->userdata('id_user');
    $limit = $this->peminjaman_model->limit_peminjaman_anggota($id);
    // var_dump($id);

    $mpdf = new \Mpdf\Mpdf();

    $data = [
      'title'  			=> 'Invoice Peminjaman',
      'limit' => $limit
    ];
    $html = $this->load->view('katalog/invoice',$data,true);

    $mpdf->WriteHTML($html);
    // $mpdf->Output(APPPATH.'../assets/upload/files/'.$file['nama_file']);
    // $mpdf->Output(); // opens in browser
    $file = $mpdf->Output('','S'); // D sebagai Download it downloads the file into the user system, with give name

    $config = [
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.gmail.com', // ssl://smtp.googlemail.com
      'smtp_user' => 'testingsmtp82@gmail.com',
      'smtp_pass' => 'ASDqwe123',
      'smtp_port'=> '465',
      'mailtype' => 'html',
      'charset' => 'utf-8',
      'newline'=> "\r\n"
    ];
    $this->email->initialize($config);
    $this->load->library('email', $config);


    $this->email->from('no-reply@eLibrary.com', 'no-reply');
    $this->email->to($email);
    $this->email->subject('Invoice');
    $this->email->message('Your Invoice :');
    $this->email->attach($file, 'attachment', 'report.pdf', 'application/pdf');

    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
      die;
    }

    $this->session->set_flashdata(
      'pesan',
      '<div class="alert alert-success" role="alert">
          Invoice telah dikirim ke email
      </div>'
    );
    redirect(base_url('katalog/listPinjam'),'refresh');

  }

  public function addCart($id)
  {
    //proteksi halaman
    if($this->session->userdata('username') == ""){
      $this->session->set_flashdata('Success','Silahkan login terlebih dahulu');
      redirect(base_url('login'),'refresh');
    }

    $i = $this->input;
    $data = [
      'id_user' => $this->session->userdata('id_user'),
      'id_buku' => $id,
      'qty' => 1,
      'subtotal' => $i->post('harga'),
    ];
    $this->order_model->tambah($data);
    $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success" role="alert">
            Barang Telah ditambahkan
        </div>'
    );
    // redirect(base_url('katalog/detail/'.$id),'refresh');
    redirect(base_url('katalog/cart'),'refresh');
  }

  public function cart()
  {
    $id = $this->session->userdata('id_user');
    $order = $this->order_model->order_anggota($id);
    $data = [
      'title' => 'Keranjang Buku',
      'order' => $order,
      'isi' => 'katalog/keranjang'
    ];
    $this->load->view('layout/file', $data, FALSE);
  }

  public function updateCart($id)
  {
    //proteksi halaman
    if($this->session->userdata('username') == ""){
      $this->session->set_flashdata('Success','Silahkan login terlebih dahulu');
      redirect(base_url('login'),'refresh');
    }

    $i = $this->input;
    $data = [
      'id_order' => $id,
      'id_user' => $this->session->userdata('id_user'),
      'id_buku' => $i->post('id_buku'),
      'qty' => $i->post('qty'),
      'subtotal' => $i->post('harga')*$i->post('qty'),
    ];
    $this->order_model->edit($data);
    redirect(base_url('katalog/cart'),'refresh');
    // var_dump($data);
  }

  public function delCart($id)
  {
    $data = ['id_order'=> $id];
		$this->order_model->delete($data);
		$this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success" role="alert">
            Hapus barang berhasil
        </div>'
    );
    redirect(base_url('katalog/cart'),'refresh');
  }

  public function bayar()
  {
    $data = [
      'title'  			=> 'Bayar Buku',
      'isi' => 'katalog/pembayaran'
    ];
    $this->load->view('layout/file', $data, FALSE);
  }



}
