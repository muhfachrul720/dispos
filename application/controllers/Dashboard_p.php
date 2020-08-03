<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_p extends CI_Controller {

	function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->model('m_pegawai');
		$this->load->model('user_model');
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
		}else {
			return $this->upload->data();
		}

	}

	// Duk Pegawai
	public function index()
	{
		$data = $this->m_pegawai->getinfo_pegawai_individual($this->session->userdata('id_users'));
		$data['jumlah_anak'] = $this->m_pegawai->count_child($data['id_keluarga'])->num_rows();

		$this->template->load('template_admin', 'pegawai/duk/detail_duk_pegawai', $data);	
	}

	public function json_jab_fungsi()
	{
		header('Content-Type: application/json');
		$id = $this->input->post('id');

        $data = $this->m_pegawai->json_jab_fungsi($id);
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

	public function update_keluarga(Type $var = null)
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

		if($this->m_pegawai->insert('tbl_anak', $dataanak)){
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
		$data['date'] = explode(" ",$data['time_diklat'])[0];
		$data['time'] = explode(" ",$data['time_diklat'])[1];

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

		$data['golongan'] = explode('/', $data['pangkat_terakhir'])[1];
		$data['ruang'] = explode('/', $data['pangkat_terakhir'])[2];

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
	public function form_data_cpns()
	{
		$data = $this->m_pegawai->get_dataother('tbl_cpns',$this->session->userdata('id_pegawai'));

		$data['golongan_cpns'] = explode('/', $data['pangkat_cpns'])[1];
		$data['ruang_cpns'] = explode('/', $data['pangkat_cpns'])[2];

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
			'bln_thn_cpns' 			=> $date->m,
		);

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
				'nip_full_peg' 			=> $post['nipfull'],
				'nama_tanpa_gelar_peg' 	=> $post['name'],
				'nama_lengkap_peg'		=> $post['profgelar'].$post['frontgelar'].$post['hajigelar'].$post['name'].'.'.$post['backgelar'],
				'jk_peg' 				=> $post['gender'],
				'agama_peg' 			=> $post['religion'],
				'tempat_lahir_peg' 		=> $post['birthplace'],
				'kabupaten_lahir_peg' 	=> $post['birthkab'],
				'tgl_lahir_peg' 		=> $post['birthdate'],
				'usia_thn_lahir_peg' 	=> $age,
				'usia_bln_lahir_peg'	=> ($age * 12),
				'kelompok_umur_peg' 	=> $age_group,
				'nip_lama_peg' 			=> $post['oldnip'],
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
				'depan_gelar' 			=> $post['frontgelar'],
				'h_hj_gelar' 			=> $post['hajigelar'],
				'belakang_gelar' 		=> $post['backgelar'],
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

	// Ajuan Pensiun
	public function json_pensiun(){
		header('Content-Type: application/json');
		$id = $this->input->post('id');

        $data = $this->m_pegawai->json_pensiun_individual($id);
		echo $data;
	}

	// public function getAjuanPensiun()
	// {
	// 	$result = $this->m_pegawai->get_pensiun_individual();

	// 	if($r)
	// }

	public function ajukan_pensiun(){
		
		$status = $this->m_pegawai->get_pensiun_status($this->session->userdata('id_users'));

		$data['status'] = 3;

		if($status) {
			$data = array(
				'status' => set_value('status', $status->status),
			);
		}

		$this->template->load('template_admin', 'pegawai/ajuan_pensiun/dashboard_ajuan_pensiun', $data);	
	}

	public function form_ajuan_pensiun()
	{	
		$data = array(
			'action' 	=> base_url('dashboard_p/create_ajuan_pensiun'),
			'button' 	=> 'Create',
			'input1' 	=> set_value('input1'),
			'id' 	 	=> set_value('id')
		);

		$this->template->load('template_admin', 'pegawai/ajuan_pensiun/form_ajuan_pensiun', $data);	
	}

	public function create_ajuan_pensiun()
	{	
		$post = $this->input->post();
 
		if($post){
			$data = array(
				'ajuan_pensiun_tulisan' => $post['input1'],
				'ajuan_pensiun_status'  => 3,
				'ajuan_pensiun_iduser' 	=> $this->session->userdata('id_users'),
			);

			if($this->m_pegawai->insert($data, 'tbl_ajuan_pensiun')){
				$this->session->set_flashdata('Message', 'Silahkan Menunggu Verifikasi');
				$this->ajuan_pensiun();
			}
			else {
				$this->session->set_flashdata('Message', 'Gsagal Mengajukan Ajuan, Silahkan mengisi dengan baik dan benar');
				$this->ajuan_pensiun();
			};
		}
		else {
			$this->form_ajuan_pensiun();
		}
	}

	// Ajuan Kenaikan Pangkat

}

// 

/* End of file dashboard_d.php */
/* Location: ./application/controllers/dashboard_d.php */