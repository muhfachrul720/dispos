<?php 
    class Dashboard extends Operator_Controller {
        public function __construct() {
            parent::__construct();
        }

        public function index()
        {
            $this->template->load('template_admin','operator/dashboard');
        }

    }
?> 