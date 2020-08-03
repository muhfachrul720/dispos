<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('M_mahasiswa');
	}

	public function index()
	{

		// echo "<pre>";
		// print_r($_SESSION);
		// die;
		// echo "</pre>";


		$id = $this->session->userdata('id_mahasiswa');

		$data['data_mahasiswa'] = $this->M_mahasiswa->tampil_mahasiswa_by_id($id);

		// echo "<pre>";
		// print_r($data);
		// die;
		// echo "</pre>";
		
		$this->template->load('template_admin', 'mahasiswa/tampil_mahasiswa', $data);
	}

	public function pengajuan_skripsi(){

	}

	public function pengajuan_proposal(){
		
	}

	public function pengajuan_penelitian(){
		
	}

	public function pengajuan_aktif_kuliah(){
		
	}

}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */