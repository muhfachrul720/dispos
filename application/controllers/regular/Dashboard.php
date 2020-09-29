<?php 
    
    class Dashboard extends User_Controller {

        public function __construct() {

            parent::__construct();
            $this->load->model('m_pengajuan');

        }

        public function index()
        {
            $id = $this->session->userdata('id');
            $data = array(
                'title' => 'Dashboard Pendaftar',
                'pengajuan' => $this->m_pengajuan->_countbyid('tbl_pengajuan_berkas', $id)->num_rows(),
            );

            $this->template->load('template_admin','regular/dashboard', $data);
        }

    }
?> 