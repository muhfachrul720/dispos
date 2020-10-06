<?php
Class Auth extends CI_Controller{
    
    public function __construct() {
        parent::__construct();

    }
    function index(){
        if($this->session->userdata('')){

        }
        $this->load->view('auth/login');
    }
    
    public function cheklogin(){
        $username      = $this->input->post('username');
        //$password   = $this->input->post('password');
        $password = $this->input->post('password',TRUE);
        $hashPass = password_hash($password,PASSWORD_DEFAULT);
        $test     = password_verify($password, $hashPass);

        // query chek users
        $this->db->where('username',$username);
        //$this->db->where('password',  $test);
        $users       = $this->db->get('tbl_user');

        if($users->num_rows()>0){
            $user = $users->row_array();
            if(password_verify($password,$user['password'])){
                $this->session->set_userdata($user); 
                if ($user['user_level'] == 1) {
                    redirect('superadmin/dashboard');
                } else if ($user['user_level'] ==  4 || $user['user_level'] == 9 || $user['user_level'] == 8) {
                    redirect('operator/admin/dashboard');
                } else if ($user['user_level'] > 4  && $user['user_level'] < 8) {
                    redirect('operator/dashboard');
                } else {
                    redirect('regular/dashboard');
                }
            }else{

                redirect('auth');
            }
        }else{
            $this->session->set_flashdata('status_login','username atau password yang anda input salah');
            redirect('auth');
        }
    }
    
    function logout(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('status_login','Anda sudah berhasil keluar dari aplikasi');
        redirect('auth');
    }
}
