<?php 
    
    class Dashboard extends Admin_Controller {

        public function __construct() {

            parent::__construct();

        }

        public function index()
        {
            $this->template->load('template_admin','superadmin/dashboard');
        }

    }
?> 