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

        $this->rules($post);

        if($this->form_validation->run() != FALSE){

            if($_FILES['images']['name'] != null){
                $path = './upload/foto_profil';
                $file = $this->file_upload($path, 'images');
            }   

            $data = array(
                'nama_lengkap' => $post['name'],
                'images' => isset($file) ? $file['file_name'] : $oldimg,
            );

            $this->User_model->update($idus, $data);

            $this->index();

        } else {
            $this->index();
        }

    }

}

?>