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

    }
?> 