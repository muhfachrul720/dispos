<?php 
    
    class Menu extends Admin_Controller {

        public function __construct() {

            parent::__construct();

        }

        public function index()
        {
            $this->template->load('template_admin','still_working');
        }

    }
?> 