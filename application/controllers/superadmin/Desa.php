<?php

class Desa extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_desa');     
    }

    // Desa
    public function list_kecamatan()
    {
        $data['desa'] = $this->M_desa->get_all_kecamatan()->result_array();
        $data['title'] = 'Kelola Kecamatan';
        $this->template->load('template_admin','superadmin/kecamatan/list', $data);   
    }

    public function form_kecamatan()
    {
        $data = array('id' => 'hel', 'kecamatan' => '');
        $data['title'] = 'Tambah Kecamatan';
        $data['action'] = 'superadmin/desa/insert_kecamatan';

        $this->template->load('template_admin','superadmin/kecamatan/form', $data);   
    }

    public function insert_kecamatan()
    {
        $post = $this->input->post();
        $this->rules($post);

        if($this->form_validation->run() != FALSE){

            $data = array(
                'kecamatan' => $post['nama_desa'],
            );

            if($this->M_desa->insert('tbl_kecamatan', $data)){
                redirect('superadmin/desa/list_kecamatan');
            } else {
                redirect('superadmin/desa/list_kecamatan');
            };

        } else {
            echo 'Gagal';
        }
    }
    
    public function tinjau_kecamatan($id)
    {
        $data = $this->M_desa->get_kecamatan_byid($id)->row_array();
        $data['action'] = 'superadmin/desa/action_tinjau_kecamatan';
        $data['title'] = 'Edit Kecamatan';

        $this->template->load('template_admin','superadmin/kecamatan/form', $data);   
    }

    public function action_tinjau_kecamatan()
    {
        $post = $this->input->post();
        $this->rules($post);

        if($this->form_validation->run() != FALSE){

            $data = array(
                'kecamatan' => $post['nama_desa'],
            );

            if($this->M_desa->update('tbl_kecamatan', array('id' => $post['id']), $data)){
                redirect('superadmin/desa/list_kecamatan');
            } else {
                redirect('superadmin/desa/list_kecamatan');
            };

        } else {
            echo 'Gagal';
        }
    }

    public function delete_kecamatan($id)
    {
        $this->M_desa->delete('tbl_kecamatan', array('id' => $id));
        redirect('superadmin/desa/list_kecamatan');
    }

    // Kecamatan
    public function list_desa()
    {
        $data['desa'] = $this->M_desa->get_all_desa()->result_array();
        $data['title'] = 'Kelola Desa';
        $this->template->load('template_admin','superadmin/desa/list', $data);   
    }

    public function form_desa()
    {
        $data = array('id' => 'hel', 'nama' => '', 'id_camat' => '');
        $data['title'] = 'Tambah Desa';
        $data['action'] = 'superadmin/desa/insert_desa';

        $this->template->load('template_admin','superadmin/desa/form', $data);   
    }

    public function insert_desa()
    {
        $post = $this->input->post();
        $this->rules($post);

        if($this->form_validation->run() != FALSE){

            $data = array(
                'id_camat' => $post['id_desa'],
                'nama' => $post['nama_kecamatan'],
            );

            if($this->M_desa->insert('tbl_desa', $data)){
                redirect('superadmin/desa/list_desa');
            } else {
                redirect('superadmin/desa/list_desa');
            };

        } else {
            echo 'Gagal';
        }
    }
    
    public function tinjau_desa($id)
    {
        $data = $this->M_desa->get_desa_byid($id)->row_array();

        $data['action'] = 'superadmin/desa/action_tinjau_desa';
        $data['title'] = 'Edit Desa';

        $this->template->load('template_admin','superadmin/desa/form', $data);   
    }

    public function action_tinjau_desa()
    {
        $post = $this->input->post();
        $this->rules($post);

        if($this->form_validation->run() != FALSE){

            $data = array(
                'id_camat' => $post['id_desa'],
                'nama' => $post['nama_kecamatan'],
            );

            if($this->M_desa->update('tbl_desa', array('id' => $post['id']), $data)){
                redirect('superadmin/desa/list_desa');
            } else {
                redirect('superadmin/desa/list_desa');
            };

        } else {
            echo 'Gagal';
        }
    }

    public function delete_desa($id)
    {
        $this->M_desa->delete('tbl_desa', array('id' => $id));
        redirect('superadmin/desa/list_desa');
    }
}