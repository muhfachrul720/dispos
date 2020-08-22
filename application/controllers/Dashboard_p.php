<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_p extends CI_Controller {

	function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('pdf');
        $this->load->model('m_pegawai');
        $this->load->model('m_akademik');
		$this->load->model('user_model');
	}

	function upload_file_multiple($name, $path, $dir){

		$config['upload_path']          = $path;
		$config['allowed_types']        = 'gif|jpg|png|pdf';
		$config['overwrite']			= true;

		if(!is_dir($dir)){
			mkdir($path, 077, TRUE);
		}

		$this->load->library('upload', $config);

		if($bool = $this->upload->do_upload($name)){
			return $this->upload->data();
			// echo $bool;
		}else {
			// redirect('dashboard_p/ajukan_pensiun');
			return $this->upload->data();
			// echo $bool;
		}

	}

	function looping_upload($path, $dir){

		foreach($_FILES as $key => $val){

			if($_FILES[$key]['name'] != ''){

				$_FILES[$key]['name'] = $key.'.'.pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);

				$upload = $this->upload_file_multiple($key, $path, $dir);

				$array[$key] = $upload['file_name'];
				
			}
			else {
				$array[$key] = '';
			}
		}

		return $array;
	}

	// ================================ Duk Pegawai =====================================
	public function index()
	{	
		$data = $this->m_pegawai->get_pegawai_individual($this->session->userdata('id_users'));

		if(isset($data['pangkat_cpns'])){
			$gol = explode('/',$data['pangkat_cpns'])[1];
			$data['pangkat_cpns'] = explode('/', $data['pangkat_cpns'])[0].'/ '.convert_gol_to_roman($gol).'/ '.explode('/', $data['pangkat_cpns'])[2];			
		}

		$data['jumlah_anak'] = $this->m_pegawai->count_child($data['id_keluarga'])->num_rows();
		$data['sk_kemendikbud'] = $this->m_pegawai->get_sk_pensi($this->session->userdata('id_pegawai'))->row_array();

		$this->template->load('template_admin', 'pegawai/duk/detail_duk_pegawai', $data);	
	}

	public function json_jabatan()
	{
        $data = $this->m_pegawai->json_jabatan_byid($this->session->userdata('id_pegawai'));
		echo $data;
	}

	// ===========================================================================
	public function form_data_keluarga()
	{
		$data = $this->m_pegawai->get_dataother('tbl_keluarga', $this->session->userdata('id_pegawai'));

		$data['anak'] =  $this->m_pegawai->get_dataanak($data['id_keluarga']);
		$data['jumlah_anak'] = $this->m_pegawai->count_child($data['id_keluarga'])->num_rows();
		$data['action'] = base_url('dashboard_p/update_keluarga');

		$this->template->load('template_admin', 'pegawai/duk/form_data_keluarga', $data);
	}

	public function update_keluarga()
	{
		$post = $this->input->post();
		
		$dataklg = array(
			'nama_istri_suami_kel' => $post['partnername'],
			'tgl_nikah_kel' => $post['marrieddate'],
		);

		if($this->m_pegawai->update('tbl_keluarga', array('id_pegawai' => $this->session->userdata('id_pegawai')), $dataklg)){
			$this->session->set_flashdata('msg', 'Berhasil Mengupdate Data');
			redirect('dashboard_p');
		}
		else {
			$this->session->set_flashdata('msg', 'Gagal Mengupdate Data');
			redirect('dashboard_p/form_data_pegawai');
		}

	}

	// ====================================================================
	public function getAnak($id)
	{
		$result = $this->m_pegawai->get_child($id)->row();

		if($result){
			$data = array(
				'id_anak' 	 => set_value('nama_anak', $result->id_anak),
				'nama_anak' 	 => set_value('nama_anak', $result->nama_anak),
				'tgl_lahir_anak' => set_value('tgl_lahir_anak', $result->tgl_lahir_anak),
				'jk_anak' 		 => set_value('jk_anak', $result->jk_anak),
				'ket_anak' 		 => set_value('ket_anak', $result->ket_anak),
				'action'	 	 => set_value('action', base_url('dashboard_p/update_anak')),
				'button' 		 => 'Update ',
			);
		}

		return $data;
	}

	public function form_data_anak($id = null)
	{
		if($id != null){
			$data = $this->getAnak($id);
		}
		else {
			$data = array(
				'id_anak' => set_value('id_anak'),
				'nama_anak' => set_value('nama_anak'),
				'tgl_lahir_anak' => set_value('tgl_lahir_anak'),
				'jk_anak' => set_value('jk_anak'),
				'ket_anak' => set_value('ket_anak'),
				'action' => set_value('action', base_url('dashboard_p/insert_anak')),
				'button' => 'Save ',
			);
		}

		$this->template->load('template_admin', 'pegawai/duk/form_data_anak', $data);
	}

	public function insert_anak()
	{
		$post = $this->input->post();
		$age = get_age($post['birthdate']);

		$dataanak = array(
		'nama_anak' 		=> $post['name'],
		'tgl_lahir_anak' 	=> $post['birthdate'],
		'jk_anak' 			=> $post['jkanak'],
		'ket_anak' 			=> $post['ketanak'],
		'thn_usia_anak'		=> $age,
		'bln_usia_anak' 	=> $age * 12,
		);

		$dataanak['id_kel'] = $data = $this->m_pegawai->get_dataother('tbl_keluarga', $this->session->userdata('id_pegawai'), 'id_keluarga')['id_keluarga'];

		if($this->m_pegawai->insert($dataanak, 'tbl_anak')){
			$this->session->set_flashdata('msg', 'Berhasil Menambah Data');
			redirect('dashboard_p/form_data_keluarga');
		}
		else {
			$this->session->set_flashdata('msg', 'Gagal Menambah Data');
			redirect('dashboard_p/form_data_keluarga');
		};
	}

	public function delete_anak($id)
	{
		if($this->m_pegawai->delete('tbl_anak' , array('id_anak' => $id))){
			$this->session->set_flashdata('msg', 'Berhasil Menghapus Data');
			redirect('dashboard_p/form_data_keluarga');
		}
		else {
			$this->session->set_flashdata('msg', 'Gagal Menghapus Data');
			redirect('dashboard_p/form_data_keluarga');
		};
	}
	
	public function update_anak()
	{
		$post = $this->input->post();
		$age = get_age($post['birthdate']);

		$dataanak = array(
			'nama_anak' 		=> $post['name'],
			'tgl_lahir_anak' 	=> $post['birthdate'],
			'jk_anak' 			=> $post['jkanak'],
			'ket_anak' 			=> $post['ketanak'],
			'thn_usia_anak'		=> $age,
			'bln_usia_anak' 	=> $age * 12,
			);
		
		if($this->m_pegawai->update('tbl_anak', array('id_anak' => $post['idanak']), $dataanak)){
			$this->session->set_flashdata('msg', 'Berhasil MenambahData');
			redirect('dashboard_p/form_data_keluarga');
		}
		else {
			$this->session->set_flashdata('msg', 'Gagal Menambah Data');
			redirect('dashboard_p/form_data_keluarga');
		};
	}

	// ====================================================
	public function form_data_tgs_tambahan()
	{
		$data = $this->m_pegawai->get_dataother('tbl_tgs_tambahan_dosen', $this->session->userdata('id_pegawai'));
		$data['action'] = base_url('dashboard_p/update_tgs_tambahan');

		$this->template->load('template_admin', 'pegawai/duk/form_data_tgstambahan', $data);
	}

	public function update_tgs_tambahan()
	{
		$post= $this->input->post();

		$datatgs = array(
			'klasifikasi_jbt' 	=> $post['klafjab'],
			'tugas_tambahan' 	=> $post['tgstbh'],
			'nomor_sk' 			=> $post['nosk'],
			'tmt_jab' 			=> $post['tmttgs'],
		);

		if($this->m_pegawai->update('tbl_tgs_tambahan_dosen', array('id_pegawai' => $this->session->userdata('id_pegawai')), $datatgs)){
			$this->session->set_flashdata('msg', 'Berhasil Mengupdate Data');
			redirect('dashboard_p');
		}
		else {
			$this->session->set_flashdata('msg', 'Gagal Mengupdate Data');
			redirect('dashboard_p/form_data_pegawai');
		}
	}

	// ====================================================
	public function form_data_diklat()
	{
		$data = $this->m_pegawai->get_dataother('tbl_diklat_pelatihan', $this->session->userdata('id_pegawai'));
		$data['action'] = base_url('dashboard_p/update_diklat');

		$data['date'] = $data['time_diklat'][0] != null ? explode(" ",$data['time_diklat'])[0] : '';
		$data['time'] = $data['time_diklat'][0] != null ? explode(" ",$data['time_diklat'])[1] : '';

		$this->template->load('template_admin', 'pegawai/duk/form_data_diklatpelatihan', $data);
	}

	public function update_diklat()
	{
		$post= $this->input->post();

		$datadiklat = array(
			'latihan_jabatan_diklat' => $post['jabdik'],
			'time_diklat' 			 => $post['datedik']." ".$post['timedik'],
		);

		if($this->m_pegawai->update('tbl_diklat_pelatihan', array('id_pegawai' => $this->session->userdata('id_pegawai')), $datadiklat)){
			$this->session->set_flashdata('msg', 'Berhasil Mengupdate Data');
			redirect('dashboard_p');
		}
		else {
			$this->session->set_flashdata('msg', 'Gagal Mengupdate Data');
			redirect('dashboard_p/form_data_pegawai');
		}

	}
	//  ==================================================
	public function form_data_peter()
	{
		$data = $this->m_pegawai->get_dataother('tbl_pendidikan_terakhir',$this->session->userdata('id_pegawai'));
		$data['action'] = base_url('dashboard_p/update_peter');

		$this->template->load('template_admin', 'pegawai/duk/form_data_pendidikanakhir', $data);
	}

	public function update_peter()
	{
		$post= $this->input->post();

		$datapeter = array(
			'bidang_ilmu_peter' => $post['bidilmu'],
			'strata_peter' 		=> $post['studylevel'],
			'thn_lulus_peter' 	=> $post['yearpass'],
			'univ_peter' 		=> $post['school'],
		);

		if($this->m_pegawai->update('tbl_pendidikan_terakhir', array('id_pegawai' => $this->session->userdata('id_pegawai')), $datapeter)){
			$this->session->set_flashdata('msg', 'Berhasil Mengupdate Data');
			redirect('dashboard_p');
		}
		else {
			$this->session->set_flashdata('msg', 'Gagal Mengupdate Data');
			redirect('dashboard_p/form_data_pegawai');
		}

	}

	// =====================================================
	public function form_data_panghir()
	{
		$data = $this->m_pegawai->get_dataother('tbl_pangkat_terakhir',$this->session->userdata('id_pegawai'));
		$data['action'] = base_url('dashboard_p/update_datapanghir');

		if(isset($data['pangkat_terakhir'])){
			$data['golongan'] = explode('/', $data['pangkat_terakhir'])[1];
			$data['ruang'] = explode('/', $data['pangkat_terakhir'])[2];
		}
		else {
			$data['golongan'] = '';
			$data['ruang'] = '';
		}

		$this->template->load('template_admin', 'pegawai/duk/form_data_pangkatakhir', $data);
	}

	public function update_datapanghir()
	{
		$post= $this->input->post();

		$date = date_diff(date_create(date('Y-m-d')), date_create($post['panghirtmt']));

		$datapanghir = array(
			'no_sk_pangkat_terakhir' 		=> $post['nosk'],
			'tgl_sk_pangkat_terakhir' 		=> $post['skdate'],
			'oleh_pejabat_pangkat_terakhir' => $post['givedby'],
			'tmt_pangkat_terakhir' 			=> $post['panghirtmt'],
			// Rumus???
			'thn_pangkat_terakhir' 			=> 0,
			// 'thn_pangkat_terakhir' 			=> $date->y,
			'bln_pangkat_terakhir' 			=> 0,
			'pangkat_terakhir' 				=> get_pangkatcpns($post['gol'], $post['ruang']).'/'.$post['gol'].'/'.$post['ruang'],
		);

		if($this->m_pegawai->update('tbl_pangkat_terakhir', array('id_pegawai' => $this->session->userdata('id_pegawai')), $datapanghir)){
			$this->session->set_flashdata('msg', 'Berhasil Mengupdate Data');
			redirect('dashboard_p');
		}
		else {
			$this->session->set_flashdata('msg', 'Gagal Mengupdate Data');
			redirect('dashboard_p/form_data_pegawai');
		}

	}

	// ====================================================
	public function form_data_impassing()
	{
		$data = $this->m_pegawai->get_dataother('tbl_impassing',$this->session->userdata('id_pegawai'));
		$data['action'] = base_url('dashboard_p/update_dataimpassing');

		$this->template->load('template_admin', 'pegawai/duk/form_data_impassing', $data);
	}

	public function update_dataimpassing()
	{		
		$post = $this->input->post();
		
		$dataimp = array(
			'no_sk_impassing' 				=> $post['nosk'],
			'tgl_sk_impassing' 				=> $post['skdate'],
			'oleh_pejabat_impassing' 		=> $post['givedby'],
			'tmt_impassing' 				=> $post['imptmt'],
			// rumus???
			'mkg_thn_impassing' 			=> 0,
			'mkg_bln_impassing' 			=> 0,
			'thn_mkg_berikutnya_impassing' 	=> 0,
			'bln_mkg_berikutnya_impasssing' 	=> 0,
		);

		if($this->m_pegawai->update('tbl_impassing', array('id_pegawai' => $this->session->userdata('id_pegawai')), $dataimp)){
			$this->session->set_flashdata('msg', 'Berhasil Mengupdate Data');
			redirect('dashboard_p');
		}
		else {
			$this->session->set_flashdata('msg', 'Gagal Mengupdate Data');
			redirect('dashboard_p/form_data_pegawai');
		}
	}

	// =====================================================
	public function form_data_kgb()
	{
		$data = $this->m_pegawai->get_dataother('tbl_kgb',$this->session->userdata('id_pegawai'));
		$data['action'] = base_url('dashboard_p/update_datakgb');

		$this->template->load('template_admin', 'pegawai/duk/form_data_kgb', $data);
	}

	public function update_datakgb()
	{
		$post = $this->input->post();
		$cpnstmt = $this->m_pegawai->get_dataother('tbl_cpns', $this->session->userdata('id_pegawai'), 'tmt_real_cpns');

		if($post['lastkgb'] == null)$yearage=""; else $yearage = date_diff(date_create($cpnstmt['tmt_real_cpns']), date_create($post['lastkgb']));
		
		$datakgb = array(
			'no_sk_kgb' 		=> $post['nosk'],
			'tgl_sk_kgb' 		=> $post['skdate'],
			'oleh_pejabat_kgb' 	=> $post['givedby'],
			'terakhir_kgb' 		=> $post['lastkgb'],
			'thn_kgb' 			=> $yearage->y,
			'bln_kgb' 			=> $yearage->m,
		);
		
		if($datakgb['thn_kgb'] >= 32)$datakgb['berikutnya_kgb'] = '-'; else if($datakgb['thn_kgb'] == '')$datakgb['berikutnya_kgb'] = ''; else $datakgb['berikutnya_kgb'] = date('Y-m-d',strtotime('+2 years', strtotime($post['lastkgb'])));

		if($this->m_pegawai->update('tbl_kgb', array('id_pegawai' => $this->session->userdata('id_pegawai')), $datakgb)){
			$this->session->set_flashdata('msg', 'Berhasil Mengupdate Data');
			redirect('dashboard_p');
		}
		else {
			$this->session->set_flashdata('msg', 'Gagal Mengupdate Data');
			redirect('dashboard_p/form_data_pegawai');
		}
	}

	// ======================================================
	public function form_data_pmk()
	{
		$data = $this->m_pegawai->get_dataother('tbl_pmk',$this->session->userdata('id_pegawai'));
		$data['action'] = base_url('dashboard_p/update_datapmk');
		
		$this->template->load('template_admin', 'pegawai/duk/form_data_pmk', $data);
	}

	public function update_datapmk()
	{
		$post = $this->input->post();

		$datapmk = array(
			'no_pmk' 					=> $post['nopmk'],
			'tgl_pmk' 					=> $post['pmkdate'],
			'oleh_pejabat_pmk' 			=> $post['givedby'],
			'tmt_pmk' 					=> $post['pmktmt'],
			// Nda ditau Rumusnya
			'thn_masa_kerja_pmk' 		=> 0,
			'bln_masa_kerja_pmk' 		=> 0,
			'bln_selisih_pmk' 			=> 0,
			'thn_selisih_pmk' 			=> 0,
			'thn_tambah_masa_kerja_pmk' => 0,
			'bln_tambah_masa_kerja_pmk' => 0,
			'tgl_tambah_masa_kerja_pmk' => 0,
		);

		if($this->m_pegawai->update('tbl_pmk', array('id_pegawai' => $this->session->userdata('id_pegawai')), $datapmk)){
			$this->session->set_flashdata('msg', 'Berhasil Mengupdate Data');
			redirect('dashboard_p');
		}
		else {
			$this->session->set_flashdata('msg', 'Gagal Mengupdate Data');
			redirect('dashboard_p/form_data_pegawai');
		}
	}	

	// =====================================================
	public function form_data_uker()
	{
		$data = $this->m_pegawai->get_dataother('tbl_unit_kerja',$this->session->userdata('id_pegawai'));
		$data['action'] = base_url('dashboard_p/update_datauker');
		
		$this->template->load('template_admin', 'pegawai/duk/form_data_unit_kerja', $data);
	}

	public function update_datauker()
	{
		$post = $this->input->post();
		
		$datauker = array(
			'program_studi_uker' => $post['progstu'],
			'homebase_uker' => $post['hmbs'],
			'full_fakultas_uker' => $post['fkfull'],
			'singkat_fakultas_uker' => $post['fkpart'],
		);

		if($this->m_pegawai->update('tbl_unit_kerja', array('id_pegawai' => $this->session->userdata('id_pegawai')), $datauker)){
			$this->session->set_flashdata('msg', 'Berhasil Mengupdate Data');
			redirect('dashboard_p');
		}
		else {
			$this->session->set_flashdata('msg', 'Gagal Mengupdate Data');
			redirect('dashboard_p/form_data_pegawai');
		}
	}

	// =====================================================
	public function form_data_cpns()
	{
		$data = $this->m_pegawai->get_dataother('tbl_cpns',$this->session->userdata('id_pegawai'));

		$data['golongan_cpns'] = $data['pangkat_cpns'] != null ? explode('/', $data['pangkat_cpns'])[1] : '';
		$data['ruang_cpns'] = $data['pangkat_cpns'] != null ? explode('/', $data['pangkat_cpns'])[2] : '';

		$data['action'] = base_url('dashboard_p/update_datacpns');
		$data['button'] = 'Save';
		$data['back'] = 'dashboard_p';

		$this->template->load('template_admin', 'pegawai/duk/form_data_cpns', $data);
	}
	
	public function update_datacpns()
	{
		$post = $this->input->post(); 
		$date = date_diff(date_create(date('Y-m-d')), date_create($post['cpnstmt']));

		$datacpns = array(
			'nomor_sk_cpns' 		=> $post['nosk'],
			'tgl_sk_cpns' 			=> $post['skdate'],
			'oleh_pejabat_cpns' 	=> $post['givedby'],
			'tmt_cpns' 				=> $post['cpnstmt'],
			'thn_pmk_cpns' 			=> 0,
			'bln_pmk_cpns' 			=> 0,
			'pengurangan_thn_cpns' 	=> 0,
			'pangkat_cpns' 			=> get_pangkatcpns($post['cpnsgol'], $post['cpnsruang']).'/'.$post['cpnsgol'].'/'.$post['cpnsruang'],
			'tmt_real_cpns' 		=> $post['cpnstmt'],
			'mks_thn_cpns' 			=> $date->y,
			'mks_bln_cpns' 			=> $date->m,
		);

		$tmt = $this->m_pegawai->get_tmtpeg($this->session->userdata('id_pegawai'));
		$date2 = date_diff(date_create($tmt['tmt_pensiun_peg']), date_create($post['cpnstmt']));

		$masakerjapeg = array(
			'thn_masa_kerja_pensiun_peg' => $date2->y,
			'bln_masa_kerja_pensiun_peg' => $date2->m,
		);

		$this->m_pegawai->update('tbl_pegawai', array('id_pegawai' => $this->session->userdata('id_pegawai')), $masakerjapeg);

		if($this->m_pegawai->update('tbl_cpns', array('id_pegawai' => $this->session->userdata('id_pegawai')), $datacpns)){
			$this->session->set_flashdata('msg', 'Berhasil Mengupdate Data');
			redirect('dashboard_p');
		}
		else {
			$this->session->set_flashdata('msg', 'Gagal Mengupdate Data');
			redirect('dashboard_p/form_data_pegawai');
		}
	}
	
	// ====================================================
	public function form_data_pegawai()
	{
		$data = $this->m_pegawai->get_datapegandgelar($this->session->userdata('id_users'));

		$data['action'] = base_url('dashboard_p/update_datapeg');
		$data['button'] = 'Save';
		$data['back'] = 'dashboard_p';

		$this->template->load('template_admin', 'pegawai/duk/form_data_pegawai', $data);	
	}

	public function update_datapeg()
	{
		$post = $this->input->post();

		if($this->session->userdata('id_user_level' == 5)){

		}
		else {
			// Tambahan Variable
			$age = get_age($post['birthdate']);
			if($age<=30)$age_group = "21-30"; else if($age>30 && $age<=40)$age_group = "31-40";else $age_group = ">41";
			
			// Pegawai
			$data_peg = array(
				'nip_peg' 				=> $post['nip'],
				'nama_tanpa_gelar_peg' 	=> $post['name'],
				'nama_lengkap_peg'		=> $post['profgelar'].' '.$post['hajigelar'].' '.$post['doktorgelar'].' '.$post['name'].' '.$post['magistergelar'].' '.$post['strata1gelar'],
				'jk_peg' 				=> $post['gender'],
				'agama_peg' 			=> $post['religion'],
				'tempat_lahir_peg' 		=> $post['birthplace'],
				'kabupaten_lahir_peg' 	=> $post['birthkab'],
				'nidn_peg' 	=> $post['nidn'],
				'tgl_lahir_peg' 		=> $post['birthdate'],
				'usia_thn_lahir_peg' 	=> $age,
				'usia_bln_lahir_peg'	=> ($age * 12),
				'kelompok_umur_peg' 	=> $age_group,
				'karpeg_peg' 			=> $post['karpeg'],
				'sertifikat_dosen_peg' 	=> $post['sertif'],
				'alamat_rumah_peg' 		=> $post['address'],
				'kode_pos_peg' 			=> $post['postcode'],
				'tlp_kantor_peg' 		=> $post['officephone'],
				'fax_kntr_peg' 			=> $post['fax'],
				'tlp_rumah_peg' 		=> $post['homephone'],
				'hp_peg' 				=> $post['phonenumber'],
				'email_peg' 			=> $post['email'],
				'thn_selisih_pmk_peg'	=> 0,
				'bln_selisih_pmk_peg'	=> 0,
			);

			$check1 = $this->m_pegawai->update('tbl_pegawai', array('id_pegawai' => $post['id']), $data_peg);

			// Gelar
			$data_gel = array(
				'prof_gelar' 			=> $post['profgelar'],
				'h_hj_gelar' 			=> $post['hajigelar'],
				'doktor_gelar' 			=> $post['doktorgelar'],
				'magister_gelar' 			=> $post['magistergelar'],
				'strata_1_gelar' 		=> $post['strata1gelar'],
			);

			$check2 = $this->m_pegawai->update('tbl_gelar',array('id_gelar' => $post['idgelar']), $data_gel);
		}
			if($check1==true && $check2==true){
				$this->session->set_flashdata('msg', 'Berhasil Mengupdate Data');
				redirect('dashboard_p');
			}
			else {
				$this->session->set_flashdata('msg', 'Gagal Mengupdate Data');
				redirect('dashboard_p/form_data_pegawai');
			}
	}

	public function create_tmt_pensiun()
	{
		$post = $this->input->post();

		// var_dump($post);

		$this->cuti_rules($post);
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if($this->form_validation->run() == FALSE){
			redirect('dashboard_p');
		}
		else {
			// $limit = $post['dosen'] != 12 ? 58 : 
			if($post['prof'] == 1) $limit = 70; else if($post['dosen'] == 12) $limit = 65; else $limit = 58;

			$tmt = date('Y-m-d', strtotime('+'.$limit.' years', strtotime($post['umur'])));

			$data = array(
				'tgl_lahir_peg' => $post['umur'],
				'tmt_pensiun_peg' => $tmt,
				'notif_pensiun_peg' => strtotime('-1 years', strtotime(date('Y-m-d', strtotime($tmt)))),
			);

			$this->m_pegawai->update('tbl_pegawai', array('id_pegawai' => $this->session->userdata('id_pegawai')), $data);

			redirect('dashboard_p');
		}
	}

	// ======================================================== Ajuan Pensiun =====================================
	
	public function ajukan_pensiun($id = null)
	{
		if($id != null){
			$data['ajuan'] = $this->m_pegawai->get_ajuan_pensiun($id)->row_array();
			$data['result'] = $this->m_pegawai->get_berkas_pensi($id)->row_array();
			$data['action'] = 'dashboard_p/update_ajuan_pensiun';

			$this->template->load('template_admin', 'pegawai/pensiun/ajuan_pensiun/dashboard_ajuan_pensiun', $data);
			
		}
		else {
			
			$data['action'] = 'dashboard_p/create_ajuan_pensiun';
			$this->template->load('template_admin', 'pegawai/pensiun/ajuan_pensiun/dashboard_ajuan_pensiun', $data);
		}
	}

	public function json_pensiun_individual()
	{
		header('Content-Type: application/json');
		$id = $this->input->post('id');

        $data = $this->m_pegawai->json_pensiun_individual($id);
		echo $data;
	}

	public function create_ajuan_pensiun()
	{
		$id = $this->session->userdata('id_pegawai');
		$date = str_replace(':','_',date('y-m-d h:m:s'));

		$path = './upload/berkas_pensiun/pegawai_'.$id.'tgl_'.$date;
		$dir = 'upload/berkas_pensiun/pegawai_'.$id.'tgl_'.$date;

		if($_FILES != null){

			foreach($_FILES as $key => $val){

				if($_FILES[$key]['name'] != ''){

					$_FILES[$key]['name'] = $key.'.'.pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);

					$upload = $this->upload_file_multiple($key, $path, $dir);

					if($key == 'skjbt'){
						$upload = $this->upload_file_multiple($key, $path, $dir);
					}

					$array[$key] = $upload['file_name'];
					
				}
				else {
					$array[$key] = '';
				}
			}

			$data_berkas = array(
				'surat_pimpinan_uker' 						=> $array['supuk'],
				'surat_permohonan_pns' 						=> $array['sppyb'],
				'dpcp' 										=> $array['dpcpp'],
				'skcpns_skpangkat_akhir' 					=> $array['skcpskpt'],
				'sk_jabatan' 								=> $array['skjbt'],
				'karpeg' 									=> $array['kpe'],
				'surat_nikah_cerai' 						=> $array['askc'],
				'surat_kenal_anak' 							=> $array['askla25'],
				'kartu_keluarga' 							=> $array['kkdskys'],
				'pas_foto' 									=> $array['pfb3x4'],
				'formulir_permintaan_pembayaran_pensiun' 	=> $array['fppp'],
				'foto_kopi_buku_rekening' 					=> $array['fkbr'],
				'penilaian_prestasi' 						=> $array['pp1tr'],
				'surat_pernyataan_tidak_dijatuhi_hukum' 	=> $array['sptpdhdts'],
				'surat_pernyataan_tidak_berproses_pidana' 	=> $array['sptsmppapdpbpp'],
				'surat_kematian' 							=> $array['awys'],
				'surat_keterangan_janda_duda_anak_orangtua' => $array['ask'],
				'surat_ahli_waris' 							=> $array['skjdaot']
			);

			if($id_berkas = $this->m_pegawai->insert($data_berkas, 'tbl_berkas_pengajuan_pensiun')){

				$data_ajpen = array(
					'id_pegawai' => $id,
					'id_berkas_pengajuan_pensiun' => $id_berkas,
					'waktu_pengajuan_pensiun' => date('Y-m-d h:m:s'),
				);

				$this->m_pegawai->insert($data_ajpen, 'tbl_pengajuan_pensiun');

				$this->session->set_flashdata('msg', 1);
				redirect('dashboard_p/ajukan_pensiun');
			} 
			else {
				$this->session->set_flashdata('msg', 2);
				redirect('dashboard_p/ajukan_pensiun');
			}
			
		}
		else {
			$this->session->set_flashdata('msg', 2);
			redirect('dashboard_p/ajukan_pensiun');
		}

	}

	public function update_ajuan_pensiun()
	{
		$id = $this->session->userdata('id_pegawai');
		$date = substr(str_replace(':','_', $this->input->post('time')), 2);
		
		$path = './upload/berkas_pensiun/pegawai_'.$id.'tgl_'.$date;
		$dir = 'upload/berkas_pensiun/pegawai_'.$id.'tgl_'.$date;

		$column = array(
			'supuk' => 'surat_pimpinan_uker',
			'sppyb' => 'surat_permohonan_pns',
			'dpcpp' => 'dpcp',
			'skcpskpt' => 'skcpns_skpangkat_akhir',
			'skjbt' => 'sk_jabatan',
			'kpe' => 'karpeg',
			'askc' => 'surat_nikah_cerai',
			'askla25' => 'surat_kenal_anak',
			'kkdskys' => 'kartu_keluarga',
			'pfb3x4' => 'pas_foto',
			'fppp' => 'formulir_permintaan_pembayaran_pensiun',
			'fkbr' => 'foto_kopi_buku_rekening',
			'pp1tr' => 'penilaian_prestasi', 
			'sptpdhdts' => 'surat_pernyataan_tidak_dijatuhi_hukum',
			'sptsmppapdpbpp' => 'surat_pernyataan_tidak_berproses_pidana',
			'ask' => 'surat_kematian',
			'skjdaot' => 'surat_keterangan_janda_duda_anak_orangtua',
			'awys' => 'surat_ahli_waris',
		);

		if($_FILES != null){

			foreach($_FILES as $key => $val){

				if($_FILES[$key]['name'] != ''){

					$_FILES[$key]['name'] = $key.'.'.pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);

					$upload = $this->upload_file_multiple($key, $path, $dir);

					if($key == 'skjbt'){
						$upload = $this->upload_file_multiple($key, $path, $dir);
					}

					$array[$key] = $upload['file_name'];
				}
				else {
					$array[$key] = '';
				}

				if($array[$key] != ''){
					$data_berkas[$column[$key]] = $array[$key];
				}
			}

			if($this->m_pegawai->update('tbl_berkas_pengajuan_pensiun', array('id_berkas_pengajuan_pensiun' => $this->input->post('id')), $data_berkas)){

				$data_ajpen = array(
					'status_pengajuan' => 4,
				);

				if($this->m_pegawai->update('tbl_pengajuan_pensiun', array('id_pengajuan_pensiun' => $this->input->post('id_aju')), $data_ajpen)){
					$this->session->set_flashdata('msg', 1);
					$this->ajukan_pensiun();
				}
				else {
					$this->session->set_flashdata('msg', 2);
					$this->ajukan_pensiun($this->input->post('id_aju'));	
				}

			} 
			else {
				$this->session->set_flashdata('msg', 2);
				$this->ajukan_pensiun($this->input->post('id_aju'));
			}
		}
		else {
			$this->session->set_flashdata('msg', 2);
			$this->ajukan_pensiun($this->input->post('id_aju'));
		}
	}

	// ======================================================= Ajuan Cuti ==============================================
	public function pengajuan_cuti()
	{
		$data = $this->m_pegawai->get_datapeg_cuti($this->session->userdata('id_pegawai'));

		$this->template->load('template_admin', 'pegawai/cuti/ajuan_cuti/dashboard_ajuan_cuti', $data);	
	}

	public function json_cuti_individual()
	{
		// header('Content-Type: application/json');
		$id = $this->input->post('id');
		$data = $this->m_pegawai->json_cuti_individual($id);

		echo $data;
	}

	public function cuti_rules($post)
	{
		foreach($post as $p){
			$this->form_validation->set_rules(key($post), key($post), 'required|trim');
			next($post);
		}	
	}

	public function create_ajuan_cuti()
	{
		$post = $this->input->post();

		$this->cuti_rules($post);
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if($this->form_validation->run() == FALSE){
			$this->pengajuan_cuti();
		}
		else {
			$date = date_diff(date_create($post['startdate']), date_create($post['enddate']));

			$data_ajcuti = array(
				'id_pegawai' => $this->session->userdata('id_pegawai'),
				'jenis_pengajuan_cuti' => $post['jeniscuti'],
				'alasan_pengajuan_cuti' => $post['alasancuti'],
				'alamat_pengajuan_cuti' => $post['addresscuti'],
				'telepon_pengajuan_cuti' => $post['phonecuti'],
				'tgl_cuti' => $post['startdate'],
				'jml_thn_cuti' => $date->y,
				'jml_bln_cuti' => $date->m,
				'jml_hari_cuti' => $date->d,
				'waktu_pengajuan_cuti' => date('Y-m-d h:m:s'),
			);
	
			if($this->m_pegawai->insert($data_ajcuti, 'tbl_pengajuan_cuti')){
				$this->session->set_flashdata('msg', 1);
				redirect('dashboard_p/pengajuan_cuti');
			} 
			else {
				$this->session->set_flashdata('msg', 2);
				redirect('dashboard_p/pengajuan_cuti');
			}

		}

	}

	public function print_pdf_cuti($id)
	{
		
		$data = $this->m_pegawai->get_data_cuti_individual($id);
		$data['lastday'] = date('Y-m-d', strtotime('+'.$data['jml_thn_cuti'].' years +'.$data['jml_bln_cuti'].' months +'.$data['jml_hari_cuti'].' days', strtotime($data['tgl_cuti'])));

		$jenis = array();
		$catatan = array();
		
		$year = array(date('Y'), date('Y', strtotime("-1 year")), date('Y', strtotime("-2 year")));
		$kuota = array();

		for($i = 0; $i <= 6; $i++){
			if($i == $data['jenis_pengajuan_cuti'] - 1){
				$jenis[$i] = 'Dipilih';
				$catatan[$i] = $data['keterangan_pengajuan_cuti'];
			}
			else {
				$jenis[$i] = ' ';
				$catatan[$i] = ' ';
			}
		};

		if($data['jenis_pengajuan_cuti'] == 2){
			for($j=0; $j< count($year); $j++){
				if($data['tahun_pengajuan_cuti'] == $year[$j]){
					$kuota[$j] = $data['kuota_cuti'];
				} 
				else {
					$kuota[$j] = '';
				}
			}
		}
		else {
			$kuota = array(' ',' ',' ');
		}


		$lastday = date('Y-m-d', strtotime('+'.$data['jml_thn_cuti'].' years +'.$data['jml_bln_cuti'].' months +'.$data['jml_hari_cuti'].' days', strtotime($data['tgl_cuti'])));

		$data['alamat_pengajuan_cuti'] = 'Jalana Belimbing No 41 Poasia Kendari Sulawesi Tenggara Indonesia RT 13/ RW 11';


		//===================== Cetak ===============================
		$pdf = new FPDF('P', 'mm', array(210, 330));
		$pdf-> SetMargins(14,3, 3, 3);
		$pdf->AddPage();

		$pdf->SetFont('Times','',11);

		$pdf->Cell(181,12,'- 24 -',0,1,'C');

		$pdf->Cell(70,4.6,'',0,0,'L');
		$pdf->Cell(100,4.6,'ANAK LAMPIRAN 1.b',0,1,'L');

		$pdf->Cell(70,4.6,'',0,0,'L');
		$pdf->Cell(100,4.6,'PERATURAN BADAN KEPEGAWAIAN NEGARA',0,1,'L');

		$pdf->Cell(70,4.6,'',0,0,'L');
		$pdf->Cell(100,4.6,'REPUBLIK INDONESIA',0,1,'L');

		$pdf->Cell(70,4.6,'',0,0,'L');
		$pdf->Cell(100,4.6,'NOMOR 24 TAHUN 2017',0,1,'L');

		$pdf->Cell(70,4.6,'',0,0,'L');
		$pdf->Cell(100,4.6,'TENTANG',0,1,'L');

		$pdf->Cell(70,4.6,'',0,0,'L');
		$pdf->Cell(100,4.6,'TATA CARA PEMBERIAN CUTI PEGAWAI NEGERI SIPIL',0,1,'L');

		$pdf->Cell(70,14,'',0,0,'L');
		$pdf->Cell(100,14,'.............................., ...................................',0,1,'C');

		$pdf->Cell(70,0,'',0,0,'L');
		$pdf->Cell(100,0,'Kepada',0,1,'C');

		$pdf->Cell(70,12,'',0,0,'L');
		$pdf->Cell(100,12,'Yth, ...........................................',0,1,'C');

		$pdf->Cell(70,-2,'',0,0,'L');
		$pdf->Cell(100,-2,'di,                                      ',0,1,'C');

		$pdf->Cell(70,10,'',0,0,'L');
		$pdf->Cell(100,10,'.................................',0,1,'C');
		
		$pdf->Cell(181,10,'FORMULIR PERMINTAAN DAN PEMBERIAN CUTI',0,1,'C');
		
		// Data Pegawai
		$pdf->Cell(181,5,'I.     DATA PEGAWAI',1,1,'L');

		$pdf->Cell(25.5,5,'Nama',1,0,'L');
		$pdf->Cell(62,5, $data['nama_tanpa_gelar_peg'],1,0,'L');

		$pdf->Cell(27,5,'Nip',1,0,'L');
		$pdf->Cell(66.5,5,$data['nip_peg'],1,1,'L');

		$pdf->Cell(25.5,5,'Jabatan',1,0,'L');
		$pdf->Cell(62,5,'-',1,0,'L');

		$pdf->Cell(27,5,'Masa Kerja',1,0,'L');
		$pdf->Cell(66.5,5,$data['thn_masa_kerja_pensiun_peg'].' Tahun',1,1,'L');

		$pdf->Cell(25.5,5,'Unit Kerja',1,0,'L');
		$pdf->Cell(155.5,5,$data['program_studi_uker'],1,1,'L');

		$pdf->Cell(181,5,'',0,1,'L');

		// Jenis Cuti Yang diambil
		$pdf->Cell(181,5,'II.    JENIS CUTI YANG DIAMBIL **',1,1,'L');

		$pdf->Cell(62,5,'1. Cuti Tahunan',1,0,'L');
		$pdf->Cell(28.5,5,$jenis[1],1,0,'L');

		$pdf->Cell(62,5,'2. Cuti Besar',1,0,'L');
		$pdf->Cell(28.5,5,$jenis[0],1,1,'L');

		$pdf->Cell(62,5,'3. Cuti Sakit',1,0,'L');
		$pdf->Cell(28.5,5,$jenis[2],1,0,'L');

		$pdf->Cell(62,5,'4. Cuti Melahirkan',1,0,'L');
		$pdf->Cell(28.5,5,$jenis[3],1,1,'L');

		$pdf->Cell(62,5,'5. Cuti Karena Alasan Penting',1,0,'L');
		$pdf->Cell(28.5,5,$jenis[4],1,0,'L');

		$pdf->Cell(62,5,'6. Cuti Diluar Tanggungan Negara',1,0,'L');
		$pdf->Cell(28.5,5,$jenis[5],1,1,'L');

		$pdf->Cell(181,5,'',0,1,'L');

		// Alasan Cuti
		$pdf->Cell(181,5,'III.   ALASAN CUTI',1,1,'L');
		
		$pdf->Cell(181,12,$data['alasan_pengajuan_cuti'],1,1,'L');
		
		$pdf->Cell(181,5,'',0,1,'L');
		
		// Lama nya Cuti
		$pdf->Cell(181,5,'IV.    LAMANYA CUTI',1,1,'L');

		$pdf->Cell(23,5,'Selama',1,0,'L');
		$pdf->Cell(47,5,$data['jml_hari_cuti'].'hari/'.$data['jml_bln_cuti'].'bulan/'.$data['jml_thn_cuti'].'tahun',1,0,'L');
		$pdf->Cell(31,5,'Mulai Tanggal',1,0,'L');
		$pdf->Cell(32.5,5,$data['tgl_cuti'],1,0,'L');
		$pdf->Cell(15,5,'S/d',1,0,'L');
		$pdf->Cell(32.5,5,$lastday,1,1,'L');
		
		$pdf->Cell(181,5,'',0,1,'L');

		// Catatan Cuti
		$pdf->Cell(181,5,'V.     CATATAN CUTI',1,1,'L');
		
		$pdf->Cell(62,5,'1. CUTI TAHUNAN',1,0,'L');
		$pdf->Cell(80,5,'2. CUTI BESAR',1,0,'L');
		$pdf->Cell(39,5,$catatan[0],1,1,'L');
		
		$pdf->Cell(25.5,5,'Tahun',1,0,'L');
		$pdf->Cell(12,5,'Sisa',1,0,'L');
		$pdf->Cell(24.5,5,'Keterangan',1,0,'L');
		$pdf->Cell(80,5,'3. CUTI SAKIT',1,0,'L');
		$pdf->Cell(39,5,$catatan[2],1,1,'L');
		
		$pdf->Cell(25.5,5,$year[2],1,0,'L');
		$pdf->Cell(12,5,$kuota[2],1,0,'L');
		$pdf->Cell(24.5,5,'Hari',1,0,'L');
		$pdf->Cell(80,5,'4. CUTI MELAHIRKAN',1,0,'L');
		$pdf->Cell(39,5,$catatan[3],1,1,'L');
		
		$pdf->Cell(25.5,5,$year[1],1,0,'L');
		$pdf->Cell(12,5,$kuota[1],1,0,'L');
		$pdf->Cell(24.5,5,'Hari',1,0,'L');
		$pdf->Cell(80,5,'5. CUTI KARENA ALASAN PENTING',1,0,'L');
		$pdf->Cell(39,5,$catatan[4],1,1,'L');
		
		$pdf->Cell(25.5,5,$year[0],1,0,'L');
		$pdf->Cell(12,5,$kuota[0],1,0,'L');
		$pdf->Cell(24.5,5,'Hari',1,0,'L');
		$pdf->Cell(80,5,'6. CUTI DI LUAR TANGGUNGAN NEGARA',1,0,'L');
		$pdf->Cell(39,5,$catatan[5],1,1,'L');

		$pdf->Cell(181,5,'',0,1,'L');
		
		// Alamat dan telepon cuti
		$pdf->Cell(181,5,'VI.    ALAMAT SELAMA MENJALANKAN CUTI',1,1,'L');
		$pdf->Cell(45,5,'TELP',1,0,'L');
		$pdf->Cell(55,5,$data['telepon_pengajuan_cuti'],1,0,'L');
		$pdf->Cell(81,5,'Hormat Saya',1,1,'C');
		
		$cellWidth = 100;
		$cellHeight = 8;

		if($pdf->GetStringWidth($data['alamat_pengajuan_cuti']) < $cellWidth){
			$line = 1;
		}
		else {
			$textLength = strlen($data['alamat_pengajuan_cuti']);
			$errmargin = 10;
			$startchar = 0;
			$maxchar = 0;
			$textArray = array();
			$tmpstring = '';

			while($startchar < $textLength){
				while($pdf->GetStringWidth($tmpstring) < ($cellWidth - $errmargin) && ($startchar + $maxchar) < $textLength){
					$maxchar++;
					$tmpstring = substr($data['alamat_pengajuan_cuti'], $startchar, $maxchar);
				}
				$startchar = $startchar + $maxchar;
				array_push($textArray, $tmpstring);
				$maxchar = 0;
				$tmpstring = '';
			}

			$line = count($textArray);
		}

		$xpos = $pdf->getX();
		$ypos = $pdf->getY();
		$pdf->MultiCell($cellWidth, $cellHeight, $data['alamat_pengajuan_cuti'], 1);
		$pdf->SetXY($xpos + $cellWidth, $ypos);

		$pdf->Cell(81, ($line * $cellHeight), '', 1,1, 'C');
		
		$pdf->Cell(181,5,'',0,1,'L');
		
		// Pertimbangan Atasa
		$pdf->Cell(181,5,'VII.   PERTIMBANGAN ATASAN LANGSUNG',1,1,'L');
		$pdf->Cell(45.25,5,'DISETUJUI',1,0,'L');
		$pdf->Cell(45.25,5,'PERUBAHAN',1,0,'L');
		$pdf->Cell(45.25,5,'DITANGGUHKAN',1,0,'L');
		$pdf->Cell(45.25,5,'TIDAK DISETUJUI',1,1,'L');

		$pdf->Cell(45.25,5,'',1,0,'L');
		$pdf->Cell(45.25,5,'',1,0,'L');
		$pdf->Cell(45.25,5,'',1,0,'L');
		$pdf->Cell(45.25,5,'',1,1,'L');

		$pdf->Cell(135.75,10,'',0,0,'L');
		$pdf->Cell(45.25,10,'',1,1,'L');

		$pdf->Cell(181,5,'',0,1,'L');

		// kEPUTUSAN PEJABAT
		$pdf->Cell(181,5,'VIII.  KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI',1,1,'L');
		$pdf->Cell(45.25,5,'DISETUJUI',1,0,'L');
		$pdf->Cell(45.25,5,'PERUBAHAN',1,0,'L');
		$pdf->Cell(45.25,5,'DITANGGUHKAN',1,0,'L');
		$pdf->Cell(45.25,5,'TIDAK DISETUJUI',1,1,'L');

		$pdf->Cell(45.25,5,'',1,0,'L');
		$pdf->Cell(45.25,5,'',1,0,'L');
		$pdf->Cell(45.25,5,'',1,0,'L');
		$pdf->Cell(45.25,5,'',1,1,'L');

		$pdf->Cell(135.75,10,'',0,0,'L');
		$pdf->Cell(45.25,10,'',1,1,'L');

		
		
		
		$pdf->Output();

	}

	// ================================================== Jadwal Mengajar ============================================
	public function jadwal_mengajar()
	{
		$data = $this->m_pegawai->check_dosen($this->session->userdata('id_pegawai'))->row_array();

		$this->template->load('template_admin', 'pegawai/jadwal_mengajar/dashboard_jadwal_mengajar', $data);
	}

	public function json_jadwal_mengajar()
	{
		// header('Content-Type: application/json');
		$data = $this->m_akademik->json_jadwal_mengajar_individual($this->session->userdata('id_pegawai'));

		echo $data;
	}

	// ================================================= Ajukan Naik Pangkat ==========================================
	public function ajuan_naikpangkat_reguler()
	{
		$this->template->load('template_admin', 'pegawai/kenaikan_pangkat/fungsional/form');
	}

	// >>>>>>>>> Fungsional
	public function ajuan_naikpangkat_fungsional($id = null)
	{	

		$data = $this->m_pegawai->get_datapeg_cuti($this->session->userdata('id_pegawai'));
		$data['action'] = 'dashboard_p/create_naikpangkat_fungsional';
		
		$this->template->load('template_admin', 'pegawai/kenaikan_pangkat/fungsional/form', $data);
	}

	public function json_naikpangkat_fungsional()
	{
        $data = $this->m_pegawai->json_naikfung_pegawai($this->session->userdata('id_pegawai'));
		echo $data;
	}

	public function create_naikpangkat_fungsional()
	{
		$id = $this->session->userdata('id_pegawai');
		$date = str_replace(':','_',date('y-m-d h:m:s'));

		$path = './upload/berkas_naikpangkat/fungsional/pegawai_'.$id.'tgl_'.$date;
		$dir = 'upload/berkas_naikpangkat/fungsional/pegawai_'.$id.'tgl_'.$date;

		if($_FILES != null){
			$array = $this->looping_upload($path, $dir);

			$data_berkas = array(
				'skpangkat' 	=> $array['skpangkat'],
				'skjabfung' 	=> $array['skjabfung'],
				'skjft' 		=> $array['skjft'],
				'skp'			=> $array['skp'],
				'pak'			=> $array['pak']
			);

			if($id_berkas = $this->m_pegawai->insert($data_berkas, 'tbl_berkas_pengajuan_fungsional')){

				$data_ajpen = array(
					'id_pegawai' => $id,
					'id_berkas_ajuan' => $id_berkas,
					'waktu_pengajuan_fungsional' => date('Y-m-d h:m:s'),
				);

				$this->m_pegawai->insert($data_ajpen, 'tbl_aju_naikpangkat_fungsional');

				$this->session->set_flashdata('msg', 1);
				redirect('dashboard_p/ajuan_naikpangkat_fungsional');
			} 
			else {
				$this->session->set_flashdata('msg', 2);
				redirect('dashboard_p/ajukan_naikpangkat_fungsional');
			}
			
		}
		else {
			$this->session->set_flashdata('msg', 2);
			redirect('dashboard_p/ajukan_naikpangkat_fungsional');
		}
	}
	
	// >>>>>>>>>> Struktural
	public function ajuan_naikpangkat_struktural()
	{
		$data = $this->m_pegawai->get_datapeg_cuti($this->session->userdata('id_pegawai'));
		$data['action'] = 'dashboard_p/create_naikpangkat_struktural';
		
		$this->template->load('template_admin', 'pegawai/kenaikan_pangkat/struktural/form', $data);
	}

	public function json_naikpangkat_struktural()
	{
        $data = $this->m_pegawai->json_naikstruk_pegawai($this->session->userdata('id_pegawai'));
		echo $data;
	}

	public function create_naikpangkat_struktural()
	{
		$id = $this->session->userdata('id_pegawai');
		$date = str_replace(':','_',date('y-m-d h:m:s'));

		$path = './upload/berkas_naikpangkat/struktural/pegawai_'.$id.'tgl_'.$date;
		$dir = 'upload/berkas_naikpangkat/struktural/pegawai_'.$id.'tgl_'.$date;

		if($_FILES != null){
			$array = $this->looping_upload($path, $dir);

			$data_berkas = array(
				'skpangkat' 	=> $array['skpangkat'],
				'srtjab' 		=> $array['skjab'],
				'srtdukjab' 	=> $array['srtdukjab'],
				'srtlatih' 		=> $array['srtlatih'],
				'srttgs'		=> $array['srttgs'],
				'skp'			=> $array['skp']
			);

			if($id_berkas = $this->m_pegawai->insert($data_berkas, 'tbl_berkas_pengajuan_struktural')){

				$data_ajpen = array(
					'id_pegawai' => $id,
					'id_berkas_ajuan' => $id_berkas,
					'waktu_pengajuan_struktural' => date('Y-m-d h:m:s'),
					'usulan_jabatan_struktural' => $this->input->post('usuljab'),
 				);

				$this->m_pegawai->insert($data_ajpen, 'tbl_aju_naikpangkat_struktural');

				$this->session->set_flashdata('msg', 1);
				redirect('dashboard_p/ajuan_naikpangkat_struktural');
			} 
			else {
				$this->session->set_flashdata('msg', 2);
				redirect('dashboard_p/ajukan_naikpangkat_struktural');
			}
			
		}
		else {
			$this->session->set_flashdata('msg', 2);
			redirect('dashboard_p/ajukan_naikpangkat_struktural');
		}
	}

	// >>>>>>>>>>>>>> Ijazah
	public function ajuan_naikpangkat_ijazah()
	{
		$data = $this->m_pegawai->get_datapeg_cuti($this->session->userdata('id_pegawai'));
		$data['action'] = 'dashboard_p/create_naikpangkat_ijazah';

		$this->template->load('template_admin', 'pegawai/kenaikan_pangkat/ijazah/form', $data);	
	}

	public function json_naikpangkat_ijazah()
	{
        $data = $this->m_pegawai->json_naikijazah_pegawai($this->session->userdata('id_pegawai'));
		echo $data;
	}

	public function create_naikpangkat_ijazah()
	{
		$id = $this->session->userdata('id_pegawai');
		$date = str_replace(':','_',date('y-m-d h:m:s'));

		$path = './upload/berkas_naikpangkat/ijazah/pegawai_'.$id.'tgl_'.$date;
		$dir = 'upload/berkas_naikpangkat/ijazah/pegawai_'.$id.'tgl_'.$date;

		if($_FILES != null){
			$array = $this->looping_upload($path, $dir);

			$data_berkas = array(
				'skpangkat' 	=> $array['skpangkat'],
				'ijazah' 		=> $array['ijazah'],
				'srtlulus' 		=> $array['srtlulus'],
				'srtbelajar'	=> $array['srtbelajar'],
				'srttgs'		=> $array['srttgs'],
				'skp'			=> $array['skp']
			);

			if($id_berkas = $this->m_pegawai->insert($data_berkas, 'tbl_berkas_pengajuan_ijazah')){

				$data_ajpen = array(
					'id_pegawai' => $id,
					'id_berkas_ajuan' => $id_berkas,
					'waktu_pengajuan_ijazah' => date('Y-m-d h:m:s'),
				);

				$this->m_pegawai->insert($data_ajpen, 'tbl_aju_naikpangkat_ijazah');

				$this->session->set_flashdata('msg', 1);
				redirect('dashboard_p/ajuan_naikpangkat_ijazah');
			} 
			else {
				$this->session->set_flashdata('msg', 2);
				redirect('dashboard_p/ajukan_naikpangkat_ijazah');
			}
			
		}
		else {
			$this->session->set_flashdata('msg', 2);
			redirect('dashboard_p/ajukan_naikpangkat_ijazah');
		}
	}

	// ================================== Other ===================================
	public function mpdf(){
		{
			$mpdf = new \Mpdf\Mpdf();
			$mpdf->WriteHTML('<h1>KCDEV: Testing Composer dan MPDF</h1>');
			$mpdf->Output();
		}
	}
}


// 

/* End of file dashboard_d.php */
/* Location: ./application/controllers/dashboard_d.php */