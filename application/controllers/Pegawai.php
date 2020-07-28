<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_pegawai');
		$this->load->model('user_model');
		$this->load->library('form_validation');
	}

	function upload_foto($id){
		$filename = 'profil'.$id;

		$config['upload_path']          = './assets/foto_profil';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']        	= $filename;
		$config['overwrite']        	= TRUE;

		$this->load->library('upload', $config);
		if($this->upload->do_upload('images')){
			return $this->upload->data();
			die;
		}else {
			return $this->upload->data();
			die;
		}

	}

	public function index(){
		$this->template->load('template', 'dashboard_adminpegawai');
	}

	public function verifikasi_cuti(){

	}

	public function mon_pegawai(){

	}

	// Verifikasi Pensiun
	public function verifikasi_pensiun(){
		$this->template->load('template', 'pegawai/ajuan_pensiun/list_ajuan_pensiun');
	}

	public function json_verifpensi_netral(){
		header('Content-Type: application/json');

		$data = $this->m_pegawai->json_verifpensi_netral();
		echo $data;
	}

	public function json_verifpensi_terima(){
		header('Content-Type: application/json');

		$data = $this->m_pegawai->json_verifpensi_terima();
		echo $data;
	}
	
	public function json_verifpensi_tolak(){
		header('Content-Type: application/json');

		$data = $this->m_pegawai->json_verifpensi_tolak();
		echo $data;
	}

	// ===================================================================================================================
	public function verifikasi_kenaikan_pangkat(){

	}

	// Pensiun
	public function data_pensiun(){
	}

	public function data_pangkat_golongan(){

	}

	// ================================================================================================================================
	// Data Duk
	public function data_duk(){
		
		$this->template->load('template', 'pegawai/duk/list_duk_pegawai');
	}

	public function json_duk(){
		// header('Content-Type: application/json');

		$data = $this->m_pegawai->json_duk();
		echo $data;
	}

	public function form_data_pegawai($id)
	{	
		$data = $this->m_pegawai->get_infopegawai_adminonly($id)->row_array();
		$data['action'] = base_url('pegawai/update_datapeg');
		$data['button'] = 'Save';
		$data['back'] = 'pegawai';

		$this->template->load('template', 'pegawai/duk/form_data_pegawai', $data);	
	}

	public function update_datapeg(){
		$post = $this->input->post();

		$datapeg = array(
			'status_kepegawaian_peg' => $post['statuspeg'],
			'tgl_meninggal_dunia_peg' => $post['deaddate'],
			'tmt_pensiun_peg' => $post['tmtpensi'],
		);

		if($this->m_pegawai->update('tbl_pegawai', array('id_pegawai' => $post['idpeg']),$datapeg)){
		$this->session->set_flashdata('msg', 'Berhasil Mengupdate Data');
			redirect('pegawai/data_duk');
		}
		else {
			$this->session->set_flashdata('msg', 'Gagal Mengupdate Data');
			redirect('pegawai/data_duk');
		}
	}

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */