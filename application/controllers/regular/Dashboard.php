<?php 
    
    class Dashboard extends User_Controller {

        public function __construct() {

            parent::__construct();
            $this->load->model('M_pengajuan');

        }

        public function index()
        {
            $this->template->load('template_admin','regular/dashboard');
        }
        
        public function pengajuan_hak()
        {
            $data['title'] = 'Dashboard Pengajuan';
            $this->template->load('template_admin','regular/list', $data);
        }

        public function pengajuan_json()
        {
            $data = $this->M_pengajuan->pengajuan_json($this->session->userdata('id_user'));
            echo $data;
        }

    }
?> 