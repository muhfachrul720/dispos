<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }
}

class Admin_Controller extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('user_level') != 1){
            redirect('Auth');
        }   
    }
}

class Operator_Controller extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('user_level') == null){
            redirect('Auth');
        }   
    }
}