<?php

class Permohonan extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_permohonan');     
    }

    // Jenis
    public function list_jenis_permohonan()
    {
        $data['desa'] = $this->M_permohonan->get_all_jenis()->result_array();
        $data['title'] = 'Managemen Jenis Dan Hak Permohonan';
        $this->template->load('template_admin','superadmin/jenis/list', $data);   
    }

    public function form_permohonan()
    {
        $data = array('id' => 'hel', 'nama' => '');
        $data['title'] = 'Managemen Jenis Dan Hak Permohonan';
        $data['action'] = 'superadmin/permohonan/insert_jenis';

        $this->template->load('template_admin','superadmin/jenis/form', $data);   
    }

    public function insert_jenis()
    {
        $post = $this->input->post();
        $this->rules($post);

        if($this->form_validation->run() != FALSE){

            $data = array(
                'nama' => $post['name'],
            );

            if($this->M_permohonan->insert('tbl_jenis_permohonan', $data)){
                $this->list_jenis_permohonan();
            } else {
                $this->list_jenis_permohonan();
            };

        } else {
            echo 'Gagal';
        }
    }
    
    public function tinjau_jenis($id)
    {
        $data = $this->M_permohonan->get_jenis_byid($id)->row_array();
        $data['action'] = 'superadmin/permohonan/action_tinjau_jenis';
        $data['title'] = 'Managemen Jenis Dan Hak Permohonan';

        $this->template->load('template_admin','superadmin/jenis/form', $data);   
    }

    public function action_tinjau_jenis()
    {
        $post = $this->input->post();
        $this->rules($post);

        if($this->form_validation->run() != FALSE){

            $data = array(
                'nama' => $post['name'],
            );

            if($this->M_permohonan->update('tbl_jenis_permohonan', array('id' => $post['id']), $data)){
                $this->list_jenis_permohonan();
            } else {
                $this->list_jenis_permohonan();
            };

        } else {
            echo 'Gagal';
        }
    }

    public function delete_jenis($id)
    {
        $this->M_permohonan->delete('tbl_jenis_permohonan', array('id' => $id));
        $this->list_jenis_permohonan();
    }

    // Kecamatan
    public function list_hak_permohonan()
    {
        $data['desa'] = $this->M_permohonan->get_all_hak()->result_array();
        $data['title'] = 'Managemen Jenis Dan Hak Permohonan';
        $this->template->load('template_admin','superadmin/hak/list', $data);   
    }

    public function form_hak()
    {
        $data = array('id' => 'hel', 'nama' => '');
        $data['title'] = 'Managemen Jenis Dan Hak Permohonan';
        $data['action'] = 'superadmin/permohonan/insert_hak';

        $this->template->load('template_admin','superadmin/jenis/form', $data);   
    }

    public function insert_hak()
    {
        $post = $this->input->post();
        $this->rules($post);

        if($this->form_validation->run() != FALSE){

            $data = array(
                'nama' => $post['name'],
            );

            if($this->M_permohonan->insert('tbl_hak_permohonan', $data)){
                $this->list_hak_permohonan();
            } else {
                $this->list_hak_permohonan();
            };

        } else {
            echo 'Gagal';
        }
    }
    
    public function tinjau_hak($id)
    {
        $data = $this->M_permohonan->get_hak_byid($id)->row_array();
        $data['action'] = 'superadmin/permohonan/action_tinjau_hak';
        $data['title'] = 'Managemen Jenis Dan Hak Permohonan';

        $this->template->load('template_admin','superadmin/jenis/form', $data);   
    }

    public function action_tinjau_hak()
    {
        $post = $this->input->post();
        $this->rules($post);

        if($this->form_validation->run() != FALSE){

            $data = array(
                'nama' => $post['name'],
            );

            if($this->M_permohonan->update('tbl_hak_permohonan', array('id' => $post['id']), $data)){
                $this->list_hak_permohonan();
            } else {
                $this->list_hak_permohonan();
            };

        } else {
            echo 'Gagal';
        }
    }

    public function delete_hak($id)
    {
        $this->M_permohonan->delete('tbl_hak_permohonan', array('id' => $id));
        $this->list_hak_permohonan();
    }
}

?>