<?php 
    
    class Dashboard extends Admin_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('user_level_model');
            $this->load->model('user_model');
            $this->load->model('m_desa');
            $this->load->model('m_permohonan');

        }

        public function index()
        {
        
            $data = array(
                'title' => 'Dashboard Admin',
                'user_level' => $this->user_level_model->_count('tbl_user_level')->num_rows(),
                'user' => $this->user_model->_count('tbl_user')->num_rows(),
                'desa' => $this->m_desa->_count('tbl_desa')->num_rows(),
                'kecamatan' => $this->m_desa->_count('tbl_kecamatan')->num_rows(),
                'jenis_mohon' => $this->m_permohonan->_count('tbl_jenis_permohonan')->num_rows(),
                'hak_mohon' => $this->m_permohonan->_count('tbl_hak_permohonan')->num_rows(),
            );

            $this->template->load('template_admin','superadmin/dashboard', $data);
        }

    }