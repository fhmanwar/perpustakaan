<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model', 'buku');
    }

    public function index()
    {
        $buku       = $this->buku->listing();
        $response   = ([
            'result'        => $buku,
        ]);
        echo json_encode($response);
    }
}
