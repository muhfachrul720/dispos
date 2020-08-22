<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_pegawai');
		$this->load->model('user_model');
		$this->load->library('form_validation');
	}
	
	// ========================================== General ====================================
	function upload_file($id, $path){
		
		$config['upload_path']          = $path;
		$config['allowed_types']        = 'jpg|png|pdf';
		$config['file_name']        	= 'laporan_pegawai_'.$id;

		$this->load->library('upload', $config);
		if($this->upload->do_upload('sk')){
			return $this->upload->data();
		}else {
			return $this->upload->data();
		}

	}

	public function index(){

		$data = array(
			'countcuti' => $this->m_pegawai->count_cuti()->num_rows(),
			'countpensi' => $this->m_pegawai->count_pensi()->num_rows(),
			'countpegawai' => $this->m_pegawai->count_pegawai()->num_rows(),
			'countpgktfung' => $this->m_pegawai->count_fung()->num_rows(),
			'countpgktstruk' => $this->m_pegawai->count_struk()->num_rows(),
			// 'countpgktreguler' => $this->m_pegawai->count_reguler()->num_rows(),
			'countpgktijazah' => $this->m_pegawai->count_ijazah()->num_rows(),
		);

		$data['title'] = 'Dashboard Admin Pegawai';

		$this->template->load('template_admin', 'dashboard_adminpegawai', $data);
	}

	// =================================== Monitoring Ajuan Pegawai ===============================

	// ==================================== Cuti ========================================
	// >>>>>>>>>>>>>>>>> List Cuti
	public function mon_ajuan_cuti()
	{
		$this->template->load('template_admin', 'pegawai/cuti/monitoring_cuti/list_monitoringcuti');	
	}

	public function json_mon_ajuan_cuti()
	{
		$data = $this->m_pegawai->json_mon_cuti($check = true);
		echo $data;
	}

	public function mon_cuti()
	{
		$this->template->load('template_admin', 'pegawai/cuti/monitoring_cuti/list_verified');
	}

	public function json_mon_cuti()
	{	
		$data = $this->m_pegawai->json_mon_cuti();
		echo $data;
	}

	// >>>>>>>>>>>>>>>>> Verifikasi Cuti
	public function verifikasi_cuti()
	{
		$this->template->load('template_admin', 'pegawai/cuti/ajuan_cuti/list_ajuan_cuti');
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

		$this->template->load('template_admin', 'pegawai/cuti/ajuan_cuti/form_tinjau_cuti', $data);
	}

	public function action_tinjau_cuti()
	{
		$post = $this->input->post();
		$ket = '';

		// $this->form_validation->set_rules('ket', 'Keterangan', 'required|trim');
		// $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		for($i = 0; $i < count($post['ket']); $i++){
			$ket .= $i.'_'.$post['ket'][$i].'/';
		}

		$dataverif = array(
			'id_users' => $this->session->userdata('id_users'),
			'status_cuti' => $post['status'],
			'keterangan_pengajuan_cuti' => $ket,
			'kuota_cuti_thn_n' => $post['kuota_n'],
			'kuota_cuti_thn_1' => $post['kuota_n-1'],
			'kuota_cuti_thn_2' => $post['kuota_n-2'],
		);

		if($this->m_pegawai->update('tbl_pengajuan_cuti', array('id_pengajuan_cuti' => $post['id']), $dataverif)){
			redirect('pegawai/verifikasi_cuti');
		} 
		else {
			$this->tinjau_cuti($post['id']);
		}
	}

	// =================================== Pensiun ========================================

	// >>>>>>>>>>>>>>>>>>> List Pensiun
	public function monitoring_pensiun()
	{
		$this->template->load('template_admin', 'pegawai/pensiun/monitoring_pensiun/list_monitoringpensiun');	
	}

	public function json_mon_pensiun()
	{
		// header('Content-Type: application/json');	
		$data = $this->m_pegawai->json_peg_pensiun(strtotime(date('Y-m-d')));

		echo $data;
	}

	public function reporting_pensiun()
	{
		$this->template->load('template_admin', 'pegawai/pensiun/monitoring_pensiun/list_reportingpensiun');
	}

	public function json_reporting_pensiun()
	{
		// header('Content-Type: application/json');	
		$data = $this->m_pegawai->json_report_pensiun();
		echo $data;
	}
	
	public function monitoring_ajuan_pensiun()
	{
		$this->template->load('template_admin', 'pegawai/pensiun/ajuan_pensiun/list_monitoring_ajuanpensiun');	
	}
	
	public function json_ajuan_mon_pensiun()
	{
		// header('Content-Type: application/json');
		
		$data = $this->m_pegawai->json_ajuan_mon_pensiun();
		echo $data;
	}

	// >>>>>>>>>>>>>>>>>>> Verifikasi Pensiun
	public function verifikasi_pensiun()
	{
		$this->template->load('template_admin', 'pegawai/pensiun/ajuan_pensiun/list_ajuan_pensiun');
	}
	
	public function json_verifpensi()
	{
		header('Content-Type: application/json');
		
		$data = $this->m_pegawai->json_pensiun_verifikasi();
		echo $data;
	}

	public function tinjau_pensiun($id)
	{	
		$data = $this->m_pegawai->get_ajuan_pensiun($id)->row_array();
		$data['berkas'] = $this->m_pegawai->get_berkas_pensi($id)->row_array();

		$this->template->load('template_admin', 'pegawai/pensiun/ajuan_pensiun/form_tinjau_pensiun', $data);
	}

	public function action_tinjau_pensiun()
	{
		$post = $this->input->post();

		$this->form_validation->set_rules('ket', 'Keterangan', 'trim|required');

		if($this->form_validation->run() != FALSE){

			$dataaju = array(
				'id_users' => $this->session->userdata('id_users'),
				'status_pengajuan' => $post['status'],
				'keterangan_pengajuan_pensiun' => $post['ket'],
			);

			if($this->m_pegawai->update('tbl_pengajuan_pensiun', array('id_pengajuan_pensiun' => $post['id']), $dataaju)){

				if($post['status'] == 1){
					$this->m_pegawai->update('tbl_pegawai', array('id_pegawai' => $post['idpeg']), array('status_kepegawaian_peg' => 'Pensiun'));
				};

				$this->session->set_flashdata('msg', 'Berhasil Mengupdate Data');
				redirect('pegawai/verifikasi_pensiun');
			}
			else {
				$this->session->set_flashdata('msg', 'Gagal Mengupdate Data');
				$this->tinjau_pensiun($post['id']);
			}
		}
		else {
			$this->tinjau_pensiun($post['id']);
		}

	}

	public function upload_sk()
	{
		// var_dump($_FILES);
		$post = $this->input->post();
		
		if($_FILES['sk']['name'] != ""){
			$filename = $this->upload_file($post['ajupen'], './upload/report_pensiun');

			$datask = array(
				'laporan_pengajuan_pensiun' => $filename['file_name'],
			);

			$this->m_pegawai->update('tbl_pengajuan_pensiun', array('id_pengajuan_pensiun' => $post['ajupen']), $datask);

			redirect('pegawai/reporting_pensiun');
		}	
		else {
			$this->session->set_flashdata('msg', 'Berhasil Mengupdate Data');
			redirect('pegawai/reporting_pensiun');
		};
	}
	
	// ========================================================= Kenaikan Pangkat =========================================

	// >>>>>>>>>>>> General 
	public function ubah_jabatan_fungsional($id)
	{
		$pgw = $this->m_pegawai->get_idpegawai('tbl_aju_naikpangkat_fungsional', array('id_ajuan_fungsional' => $id));
		$data = $this->m_pegawai->get_jabatan_pegawai($pgw['id_pegawai'])->row_array();	

		$data['ajuan'] = $id;
		$data['check'] = 1;

		$this->template->load('template_admin', 'pegawai/kenaikan_pangkat/jabatan', $data);
	}
	
	public function ubah_jabatan_struktural($id)
	{
		$pgw = $this->m_pegawai->get_idpegawai('tbl_aju_naikpangkat_struktural', array('id_ajuan_struktural' => $id));
		$data = $this->m_pegawai->get_jabatan_pegawai($pgw['id_pegawai'])->row_array();	

		$data['ajuan'] = $id;
		$data['check'] = 2;

		$this->template->load('template_admin', 'pegawai/kenaikan_pangkat/jabatan', $data);
	}

	public function update_jabatan()
	{
		$post = $this->input->post();

		$datajab = array(
			'tmt_jab_fungsional' => $post['tmtfung'],
			'tmt_jab_struktural' => $post['tmtstruk'],
			'id_kategori_jab_fungsional' => $post['jabfung'],
			'id_kat_jab_struktural' => $post['jabstruk'],
			'id_pegawai' => $post['idpeg'],
		);

		$idjab =$this->m_pegawai->insert($datajab, 'tbl_jabatan');

		if($this->m_pegawai->update('tbl_pegawai', array('id_pegawai' => $post['idpeg']), array('id_jabatan' => $idjab))){
			$this->session->set_flashdata('msg', 'Berhasil Mengupdate Data');
			if($post['check'] == 1) {
				$this->m_pegawai->update('tbl_aju_naikpangkat_fungsional', array('id_ajuan_fungsional' => $post['idajuan']), array('status_kenaikan_pangkat' => 1));
				redirect('pegawai/mon_naikpangkat_fungsional');
			} else {
				$this->m_pegawai->update('tbl_aju_naikpangkat_struktural', array('id_ajuan_struktural' => $post['idajuan']), array('status_kenaikan_pangkat' => 1));
				redirect('pegawai/mon_naikpangkat_struktural');
			};
		}
		else {
			$this->session->set_flashdata('msg', 'Gagal Mengupdate Data');
			$post['check'] == 1 ? redirect('pegawai/mon_naikpangkat_fungsional') : redirect('pegawai/mon_naikpangkat_struktural');
		}

	}

	// >>>>>>>>>>>> Fungsional
	public function verifikasi_naikpangkat_fungsional()
	{
		$this->template->load('template_admin', 'pegawai/kenaikan_pangkat/fungsional/list');
	}
	
	public function json_naikpangkat_fungsional()
	{
		$data = $this->m_pegawai->json_ajuan_naikpangkat($this->session->userdata('id_pegawai'), 'tbl_aju_naikpangkat_fungsional as this', 'status_pengajuan_fungsional');
		echo $data;
	}
	
	public function tinjau_naikpangkat_fungsional($id)
	{
		
		$data = $this->m_pegawai->get_ajuan_naikpangkat('tbl_aju_naikpangkat_fungsional', 'tbl_berkas_pengajuan_fungsional', array('id_ajuan_fungsional' => $id))->row_array();
		$data['berkas'] = array($data['skpangkat'], $data['skjabfung'], $data['skjft'], $data['skp'], $data['pak']);

		$data['action'] = 'pegawai/action_tinjau_naikpangkat_fungsional';
		$this->template->load('template_admin', 'pegawai/kenaikan_pangkat/fungsional/tinjau', $data);
	}

	public function action_tinjau_naikpangkat_fungsional()
	{
		$post = $this->input->post();

		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if($this->form_validation->run() != FALSE){

			$dataaju = array(
				'id_users' => $this->session->userdata('id_users'),
				'status_pengajuan_fungsional' => $post['status'],
				'keterangan_pengajuan_fungsional' => $post['keterangan'],
			);
			
			if($this->m_pegawai->update('tbl_aju_naikpangkat_fungsional', array('id_ajuan_fungsional' => $post['id']), $dataaju)){

				$this->session->set_flashdata('msg', 'Berhasil Mengupdate Data');
				redirect('pegawai/verifikasi_naikpangkat_fungsional');
			}
			else {
				$this->session->set_flashdata('msg', 'Gagal Mengupdate Data');
				$this->tinjau_pensiun($post['id']);
			}

		} else {

			$this->tinjau_naikpangkat_fungsional($post['id']);

		};


	}

	public function mon_naikpangkat_fungsional()
	{
		$this->template->load('template_admin', 'pegawai/kenaikan_pangkat/fungsional/data');
	}

	public function json_mon_naikpangkat_fungsional()
	{
		$data = $this->m_pegawai->json_mon_naikpangkat('tbl_aju_naikpangkat_fungsional', 'status_pengajuan_fungsional');
		echo $data;
	}

	public function upload_feedback_fungsional()
	{
		$post = $this->input->post();
		
		if($_FILES['file']['name'] != ""){
			$filename = $this->upload_file($post['idaju'], './upload/report_naikpangkat/fungsional');

			$datask = array(
				'report_pengajuan_fungsional' => $filename['file_name'],
			);

			$this->m_pegawai->update('tbl_aju_naikpangkat_fungsional', array('id_ajuan_fungsional' => $post['idaju']), $datask);

			redirect('pegawai/mon_naikpangkat_fungsional');
		}	
		else {
			$this->session->set_flashdata('msg', 'Berhasil Mengupdate Data');
			redirect('pegawai/mon_naikpangkat_fungsional');
		};
	}

	// >>>>>>>>>>>> Struktural
	public function verifikasi_naikpangkat_struktural()
	{
		$this->template->load('template_admin', 'pegawai/kenaikan_pangkat/struktural/list');
	}

	public function json_naikpangkat_struktural()
	{
        $data = $this->m_pegawai->json_ajuan_naikpangkat($this->session->userdata('id_pegawai'), 'tbl_aju_naikpangkat_struktural as this', 'status_pengajuan_struktural');
		echo $data;
	}

	public function tinjau_naikpangkat_struktural($id)
	{
		$data = $this->m_pegawai->get_ajuan_naikpangkat('tbl_aju_naikpangkat_struktural', 'tbl_berkas_pengajuan_struktural', array('id_ajuan_struktural' => $id))->row_array();
		$data['berkas'] = array($data['skpangkat'], $data['srtjab'], $data['srtlatih'], $data['srtdukjab'], $data['srttgs'], $data['skp']);

		$data['action'] = 'pegawai/action_tinjau_naikpangkat_struktural';
		$this->template->load('template_admin', 'pegawai/kenaikan_pangkat/struktural/tinjau', $data);
	}

	public function action_tinjau_naikpangkat_struktural()
	{
		$post = $this->input->post();

		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if($this->form_validation->run() != FALSE){

			$dataaju = array(
				'id_users' => $this->session->userdata('id_users'),
				'status_pengajuan_struktural' => $post['status'],
				'keterangan_pengajuan_struktural' => $post['keterangan'],
			);
			
			if($this->m_pegawai->update('tbl_aju_naikpangkat_struktural', array('id_ajuan_struktural' => $post['id']), $dataaju)){

				$this->session->set_flashdata('msg', 'Berhasil Mengupdate Data');
				redirect('pegawai/verifikasi_naikpangkat_struktural');
			}
			else {
				$this->session->set_flashdata('msg', 'Gagal Mengupdate Data');
				$this->tinjau_pensiun($post['id']);
			}

		} else {

			$this->tinjau_naikpangkat_struktural($post['id']);

		};


	}

	public function mon_naikpangkat_struktural()
	{
		$this->template->load('template_admin', 'pegawai/kenaikan_pangkat/struktural/data');
	}

	public function json_mon_naikpangkat_struktural()
	{
		$data = $this->m_pegawai->json_mon_naikpangkat('tbl_aju_naikpangkat_struktural', 'status_pengajuan_struktural');
		echo $data;
	}

	public function upload_feedback_struktural()
	{
		$post = $this->input->post();
		
		if($_FILES['file']['name'] != ""){
			$filename = $this->upload_file($post['idaju'], './upload/report_naikpangkat/struktural');

			$datask = array(
				'report_pengajuan_struktural' => $filename['file_name'],
			);

			$this->m_pegawai->update('tbl_aju_naikpangkat_struktural', array('id_ajuan_struktural' => $post['idaju']), $datask);

			redirect('pegawai/mon_naikpangkat_struktural');
		}	
		else {
			$this->session->set_flashdata('msg', 'Berhasil Mengupdate Data');
			redirect('pegawai/mon_naikpangkat_struktural');
		};
	}

	// >>>>>>>>>>>> Ijazah 
	public function verifikasi_naikpangkat_ijazah()
	{
		$this->template->load('template_admin', 'pegawai/kenaikan_pangkat/ijazah/list');
	}

	public function json_naikpangkat_ijazah()
	{
        $data = $this->m_pegawai->json_ajuan_naikpangkat($this->session->userdata('id_pegawai'), 'tbl_aju_naikpangkat_ijazah as this', 'status_pengajuan_ijazah');
		echo $data;
	}

	public function tinjau_naikpangkat_ijazah($id)
	{
		$data = $this->m_pegawai->get_ajuan_naikpangkat('tbl_aju_naikpangkat_ijazah', 'tbl_berkas_pengajuan_ijazah', array('id_ajuan_ijazah' => $id))->row_array();
		$data['berkas'] = array($data['skpangkat'], $data['ijazah'], $data['srtlulus'], $data['srtbelajar'], $data['srttgs'], $data['skp']);

		$data['action'] = 'pegawai/action_tinjau_naikpangkat_ijazah';
		$this->template->load('template_admin', 'pegawai/kenaikan_pangkat/ijazah/tinjau', $data);
	}

	public function action_tinjau_naikpangkat_ijazah()
	{
		$post = $this->input->post();

		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if($this->form_validation->run() != FALSE){

			$dataaju = array(
				'id_users' => $this->session->userdata('id_users'),
				'status_pengajuan_ijazah' => $post['status'],
				'keterangan_pengajuan_ijazah' => $post['keterangan'],
			);
			
			if($this->m_pegawai->update('tbl_aju_naikpangkat_ijazah', array('id_ajuan_ijazah' => $post['id']), $dataaju)){

				$this->session->set_flashdata('msg', 'Berhasil Mengupdate Data');
				redirect('pegawai/verifikasi_naikpangkat_ijazah');
			}
			else {
				$this->session->set_flashdata('msg', 'Gagal Mengupdate Data');
				$this->tinjau_pensiun($post['id']);
			}

		} else {

			$this->tinjau_naikpangkat_ijazah($post['id']);

		};


	}

	public function mon_naikpangkat_ijazah()
	{
		$this->template->load('template_admin', 'pegawai/kenaikan_pangkat/ijazah/data');
	}

	public function json_mon_naikpangkat_ijazah()
	{
		$data = $this->m_pegawai->json_mon_naikpangkat('tbl_aju_naikpangkat_ijazah', 'status_pengajuan_ijazah');
		echo $data;
	}

	public function upload_feedback_ijazah()
	{
		$post = $this->input->post();
		
		if($_FILES['file']['name'] != ""){
			$filename = $this->upload_file($post['idaju'], './upload/report_naikpangkat/ijazah');

			$datask = array(
				'report_pengajuan_ijazah' => $filename['file_name'],
			);

			$this->m_pegawai->update('tbl_aju_naikpangkat_ijazah', array('id_ajuan_ijazah' => $post['idaju']), $datask);

			redirect('pegawai/mon_naikpangkat_ijazah');
		}	
		else {
			$this->session->set_flashdata('msg', 'Berhasil Mengupdate Data');
			redirect('pegawai/mon_naikpangkat_ijazah');
		};
	}

	// >>>>>>>>>>>> Reguler
	public function verifikasi_naikpangkat_reguler()
	{
		
	}

	// ========================================================== Data Duk =====================================================
	public function data_duk()
	{
		$data['title'] = 'Dashboard Admin';

		$this->template->load('template_admin', 'pegawai/duk/list_duk_pegawai', $data);
	}

	public function json_duk()
	{
		header('Content-Type: application/json');

		$data = $this->m_pegawai->json_duk();
		echo $data;
	}

	public function form_data_pegawai($id)
	{	
		$data = $this->m_pegawai->get_infopegawai_adminonly($id)->row_array();
		$data['action'] = base_url('pegawai/update_datapeg');
		$data['button'] = 'Save';
		$data['back'] = 'pegawai';

		$this->template->load('template_admin', 'pegawai/duk/form_data_pegawai', $data);	
	}

	public function update_datapeg()
	{
		$post = $this->input->post();

		$datajab = array(
			'tmt_jab_fungsional' => $post['tmtfungsional'],
			'tmt_jab_struktural' => $post['tmtstruktural'],
			'id_kategori_jab_fungsional' => $post['jabfungsi'],
			'id_kat_jab_struktural' => $post['jabstruktur'],
			'id_pegawai' => $post['idpeg'],
		);	

		$idjab =$this->m_pegawai->insert($datajab, 'tbl_jabatan');
		
		$datapeg = array(
			'status_kepegawaian_peg' => $post['statuspeg'],
			'tmt_masuk_peg' => $post['tmtmasuk'],
			'tgl_meninggal_dunia_peg' => $post['deaddate'],
			'id_jabatan' => $idjab,
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

	public function data_jabatan()
	{
		$data['title'] = 'Dashboard Admin';

		$this->template->load('template_admin', 'pegawai/duk/list_jabatan_pegawai', $data);
	}

	public function json_jab()
	{
		$data = $this->m_pegawai->json_jab();
		echo $data;
	}

	// ======================================================== Other ==========================================================
	public function json_jab_bypegawai()
	{
		$id = $this->input->post('id');

        $data = $this->m_pegawai->json_jabatan_byid($id);
		echo $data;
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */