<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends User_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');  
    }

    public function index()
    {
        $data['profile'] = $this->User_model->get_by_id($this->session->userdata('id'));
        $data['title'] = 'Edit Profile';
        $this->template->load('template_admin','profile', $data);
    }

    public function update_profile()
    {
        $post = $this->input->post();
        $idus = $this->session->userdata('id');
        $oldimg = $this->session->userdata('images');

        $this->form_validation->set_rules('name', 'nama_lengkap', 'required|trim');

        if($this->form_validation->run() != FALSE){

            $hashpass = password_hash($this->input->post('newpass'), PASSWORD_BCRYPT, array('cost' => 4));

            if($_FILES['images']['name'] != null){
                $path = './upload/foto_profil';
                $file = $this->file_upload($path, 'images');
            } 

            $data = array(
                'nama_lengkap' => $post['name'],
                'images' => isset($file) ? $file['file_name'] : $oldimg,
            );

            if($post['newpass']){
                $data['password'] = $hashpass;
            };

            $this->User_model->update($idus, $data);

            // redirect('profile');
            redirect('auth/logout');
            // $this->index();
            
        } else {
            redirect('profile');
            // $this->index();
        }

    }

}

?>