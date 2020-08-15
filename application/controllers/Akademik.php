<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akademik extends CI_Controller {

	// ================================= General =====================================
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_akademik');
	}

	public function index()
	{
		$data['title'] = 'Dashboard Admin Akademik';

		$this->template->load('template_admin', 'dashboard_adminakademik', $data);	
	}

	// 
	public function verifikasi_skripsi(){

	}

	public function verifikasi_proposal(){
		
	}

	public function verifikasi_penelitian(){
		
	}
	
	// ======================================================
	public function verifikasi_berkas_alumni()
	{
		
	}

}

/* End of file Akademik.php */
/* Location: ./application/controllers/Akademik.php */