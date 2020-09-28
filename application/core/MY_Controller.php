<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }
}


class User_Controller extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('user_level') == null){
            redirect('Auth');
        }
    }

    public function rules($post)
    {
        foreach($post as $p){
            $this->form_validation->set_rules(key($post), key($post), 'required|trim');
            next($post);
        }	
        
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
    }

    public function file_upload($path, $name)
    {
        $config['upload_path']          = $path;
        $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
        $config['overwrite']			= true;
        $config['encrypt_name']         = TRUE;

        $this->load->library('upload', $config);

        if($bool = $this->upload->do_upload($name)){
            return $this->upload->data();
        }else {
            echo $this->upload->display_errors();
            die;
        }
    }

}

class Admin_Controller extends User_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('user_level') != 1){
            redirect('Auth');
        }   
    }
}

class Operator_Controller extends User_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('user_level') < 4 && $this->session->userdata('user_level') > 9){
            redirect('Auth');
        }   
    }
}
