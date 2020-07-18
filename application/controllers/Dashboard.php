<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		// is_login();
		$this->load->helper('rupiah_helper');
	}


	public function index()
	{

		// $data['totalkan_penyerapan'] 	= $this->M_realisasi->tampil_total_penyerapan();

		// print_r($data);
		// die;

		// $totalkan_v_realisasi 			= $this->M_realisasi->tampil_kegiatan_mon_peg();
		// $data['totalkan_v_realisasi'] 	= count($totalkan_v_realisasi);

		// $totalkan_alarm 				= $this->M_alarm->tampil_list_alarm()->result_array();
		// $data['totalkan_alarm'] 		= count($totalkan_alarm);

		// $totalkan_lembaga 				= $this->M_lembaga->get_all();
		// $data['totalkan_lembaga'] 		= count($totalkan_lembaga);

		// print_r($data);
		// die;

		$this->template->load('template', 'dashboard');	
		// $this->template->load('template', 'dashboard', $data);	
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */