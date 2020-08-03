<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akademik extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Dashboard Admin';

		$this->template->load('template_admin', 'dashboard', $data);	
	}

	public function verifikasi_skripsi(){

	}

	public function verifikasi_proposal(){
		
	}

	public function verifikasi_penelitian(){
		
	}

	public function data_jadwal_mengajar(){
		
	}

	public function verifikasi_berkas_alumni(){
		
	}

}

/* End of file Akademik.php */
/* Location: ./application/controllers/Akademik.php */