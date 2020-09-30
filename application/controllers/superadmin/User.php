<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // is_login();
        $this->load->model('User_model');
    }
    
    public function index()
    {
        $data['title'] = 'Dashboard Admin';
        
        $this->template->load('template_admin', 'superadmin/user/tbl_user_list', $data);
    }
    
    public function json()
    {
        header('Content-Type: application/json');
        
        $hello = $this->User_model->json();
        echo $hello;
        // var_dump($hello);
    }
    
    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('superadmin/user/create_action'),
            'id_users' => set_value('id_users'),
            'username' => set_value('username'),
            'email' => set_value('email'),
            'password' => set_value('password'),
            'images' => set_value('images'),
            'level' => set_value('id_user_level'),
            'title' => 'Tambah Pengguna'
        );
        $this->template->load('template_admin', 'superadmin/user/tbl_user_form', $data);
    }
    
    
    public function create_action()
    {
        $this->_rules();
        $foto = $this->upload_foto();
        
        if ($this->form_validation->run() == FALSE) {
            // echo "Gagal";
            $this->create();
        } else {
            $password     = $this->input->post('password', TRUE);
            $options      = array(
                "cost" => 4
            );
            $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
            
            $data = array(
                'username' => $this->input->post('username', TRUE),
                'email' => $this->input->post('email', TRUE),
                'password' => $hashPassword,
                'images' => $foto['file_name'],
                'user_level' => $this->input->post('id_user_level', TRUE)
            );
            
            $last_id = $this->User_model->insert($data);
            
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('superadmin/user'));
        }
    }
    
    public function update($id)
    {
        $row = $this->User_model->get_by_id($id);
        
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
                'id_users' => set_value('id_users', $row->id),
                'username' => set_value('username', $row->username),
                'email' => set_value('email', $row->email),
                'password' => set_value('password', $row->password),
                'images' => set_value('images', $row->images),
                'level' => set_value('level', $row->user_level),
                'title' => 'Edit Pengguna',
                'action' => base_url('superadmin/user/update_action')
            );
            $this->template->load('template_admin', 'superadmin/user/tbl_user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('superadmin/user'));
        }
    }
    
    public function update_action()
    {
        $this->_rules();
        $foto = $this->upload_foto();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_users', TRUE));
        } else {
            if ($foto['file_name'] == '') {
                
                $password     = $this->input->post('password', TRUE);
                $options      = array(
                    "cost" => 4
                );
                $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
                
                $data = array(
                    'username' => $this->input->post('username', TRUE),
                    'email' => $this->input->post('email', TRUE),
                    // 'password' => $hashPassword,
                    'user_level' => $this->input->post('id_user_level', TRUE)
                );
            } else {
                
                $password     = $this->input->post('password', TRUE);
                $options      = array(
                    "cost" => 4
                );
                $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
                
                $data = array(
                    'username' => $this->input->post('username', TRUE),
                    'email' => $this->input->post('email', TRUE),
                    // 'password' => $hashPassword,
                    'images' => $foto['file_name'],
                    'user_level' => $this->input->post('id_user_level', TRUE)
                );
                // ubah foto profil yang aktif
                $this->session->set_userdata('images', $foto['file_name']);
            }
            if( $password )
                $data['password'] = $hashPassword;
            
            $this->User_model->update($this->input->post('id_users', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('superadmin/user'));
        }
    }
    
    function upload_foto()
    {
        $config['upload_path']   = './upload/foto_profil';
        $config['allowed_types'] = 'jpg|png';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('images')) {
            // echo $this->upload->display_errors();
        }
        
        return $this->upload->data();
    }
    
    public function delete($id)
    {
        $row = $this->User_model->get_by_id($id);
        
        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('superadmin/user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('superadmin/user'));
        }
    }
    
    public function _rules()
    {
        $this->form_validation->set_rules('username', 'full name', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        //$this->form_validation->set_rules('password', 'password', 'trim|required');
        //$this->form_validation->set_rules('images', 'images', 'trim|required');
        $this->form_validation->set_rules('id_user_level', 'id user level', 'trim|required');
        
        $this->form_validation->set_rules('id_users', 'id_users', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    
    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile  = "tbl_user.xls";
        $judul     = "tbl_user";
        $tablehead = 0;
        $tablebody = 1;
        $nourut    = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");
        
        xlsBOF();
        
        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Full Name");
        xlsWriteLabel($tablehead, $kolomhead++, "Email");
        xlsWriteLabel($tablehead, $kolomhead++, "Password");
        xlsWriteLabel($tablehead, $kolomhead++, "id_lembaga");
        xlsWriteLabel($tablehead, $kolomhead++, "Images");
        xlsWriteLabel($tablehead, $kolomhead++, "Id User Level");
        xlsWriteLabel($tablehead, $kolomhead++, "Is Aktif");
        
        foreach ($this->User_model->get_all() as $data) {
            $kolombody = 0;
            
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->username);
            xlsWriteLabel($tablebody, $kolombody++, $data->email);
            xlsWriteLabel($tablebody, $kolombody++, $data->password);
            xlsWriteLabel($tablebody, $kolombody++, $data->id_lembaga);
            xlsWriteLabel($tablebody, $kolombody++, $data->images);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_user_level);
            xlsWriteLabel($tablebody, $kolombody++, $data->is_aktif);
            
            $tablebody++;
            $nourut++;
        }
        
        xlsEOF();
        exit();
    }
    
    
    
    function profile()
    {
        
    }
    
}