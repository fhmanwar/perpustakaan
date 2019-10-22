<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Level_model', 'level');
    }

    public function index()
    {
        $level       = $this->level->listing();
        $response   = ([
            'result'        => $level,
        ]);
        echo json_encode($response);
    }
}
