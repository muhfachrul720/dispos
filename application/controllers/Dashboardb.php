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

		// $data['total_perencanaan_anggaran'] 	= $this->M_perencanaan->hitung_total_anggaran_perencanaan();

		// $data['total_realisasi_anggaran'] 		= $this->M_realisasi->hitung_total_anggaran_realisasi();

		// print_r($data['total_realisasi_anggaran']);
		// die;

		// $totalkan_realisasi 			= $this->M_realisasi->tampil_kegiatan_mon();
		// $data['totalkan_realisasi'] 	= count($totalkan_realisasi);

		// $totalkan_perencanaan 			= $this->M_perencanaan->tampil_kegiatan();
		// $data['totalkan_perencanaan'] 	= count($totalkan_perencanaan);


		

		// $data['data_alarm']			= $this->M_alarm->tampil_list_alarm_b()->row_array();

		// print_r($data['data_alarm']	);
		// die;

		// $this->template->load('template', 'dashboard_bendahara');	
		$this->template->load('template', 'dashboard_staff');	
		// $this->template->load('template', 'dashboard_bendahara', $data);	
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */