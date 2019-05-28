<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
    }

    public function index()
    {
        $user       = $this->user->listing();
        $response   = ([
            'result'        => $user,
        ]);
        echo json_encode($response);
    }
}
