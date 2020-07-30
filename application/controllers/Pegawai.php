<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_pegawai');
		$this->load->model('user_model');
		$this->load->library('form_validation');
	}
	
	// ==========================================
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

	public function index()
	{
		$this->template->load('template', 'dashboard_adminpegawai');
	}

	// ================================= Verifikasi Cuti =======================================
	public function verifikasi_cuti()
	{
		$this->template->load('template', 'pegawai/ajuan_cuti/list_ajuan_cuti');
	}

	public function json_verifcuti()
	{
		header('Content-Type: application/json');
		
		$data = $this->m_pegawai->json_cuti_verifikasi();
		echo $data;
	}

	public function tinjau_cuti($id)
	{
		$data = $this->m_pegawai->get_data_cuti_individual($id);
		$data['lastday'] = date('Y-m-d', strtotime('+'.$data['jml_thn_cuti'].' years +'.$data['jml_bln_cuti'].' months +'.$data['jml_hari_cuti'].' days', strtotime($data['tgl_cuti'])));

		$this->template->load('template', 'pegawai/ajuan_cuti/form_tinjau_cuti', $data);
	}

	public function action_tinjau_cuti()
	{
		$post = $this->input->post();

		if(isset($post['kuota'])){
			$this->form_validation->set_rules('kuota', 'Kuota', 'required|trim');
		}

		$this->form_validation->set_rules('ket', 'Keterangan', 'required|trim');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if($this->form_validation->run() == False){
			$this->tinjau_cuti($post['id']);
		}
		else {
			$dataverif = array(
				'id_users' => $this->session->userdata('id_users'),
				'status_cuti' => $post['status'],
				'keterangan_pengajuan_cuti' => $post['ket'],
				'kuota_cuti' => isset($post['kuota']) ? $post['kuota'] : null,
			);

			if($this->m_pegawai->update('tbl_pengajuan_cuti', array('id_pengajuan_cuti' => $post['id']), $dataverif)){
				redirect('pegawai/verifikasi_cuti');
			} 
			else {
				$this->tinjau_cuti($post['id']);
			}
		}
	}

	// ========================================================================================
	public function mon_pegawai(){

	}

	// ============================ Verifikasi Pensiun ========================================
	public function verifikasi_pensiun()
	{
		$this->template->load('template', 'pegawai/ajuan_pensiun/list_ajuan_pensiun');
	}
	
	public function json_verifpensi()
	{
		// header('Content-Type: application/json');
		
		$data = $this->m_pegawai->json_pensiun_verifikasi();
		echo $data;
	}
	
	// ===================================================================================================================
	public function verifikasi_kenaikan_pangkat(){
		
	}
	
	// ============================ Data Pensiun ================================================
	public function data_pensiun(){
	}

	public function data_pangkat_golongan(){

	}

	// ================================================================================================================================
	// Data Duk
	public function data_duk()
	{
		
		$this->template->load('template', 'pegawai/duk/list_duk_pegawai');
	}

	public function json_duk()
	{
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