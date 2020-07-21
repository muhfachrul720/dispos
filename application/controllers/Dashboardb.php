<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboardb extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		// is_login();
		$this->load->helper('Rupiah_helper');
	}

	public function index()
	{
	
		$this->template->load('template', 'dashboard_staff');	
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */