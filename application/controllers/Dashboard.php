<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Dashboard Admin';

		$this->template->load('template_admin', 'dashboard', $data);	
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */