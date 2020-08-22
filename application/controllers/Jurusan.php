<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('m_akademik');   
    }

    public function index()
    {
        $this->template->load('template_admin', 'dashboard_jurusan');	
    }

    public function rules($post)
	{
		foreach($post as $p){
			$this->form_validation->set_rules(key($post), key($post), 'required|trim');
			next($post);
		}	
	}

    //  ====================================== Jadwal Mengajar ==========================================
    public function data_jadwal_mengajar()
	{
		$this->template->load('template_admin', 'jurusan/jadwal_mengajar/list_jadwal_mengajar');
	}

	public function json_jadwal_mengajar()
	{
		$data = $this->m_akademik->json_jadwal_mengajar($this->input->post('id'));
		
		echo $data;
	}

	public function form_jadkul($id = null)
	{
		$jurusan = $this->m_akademik->get_jurusan($this->session->userdata('id_users'))->row_array();

		if($id == null){

			$data = array(
				'id_mata_kuliah' => '',
				'id_pegawai' => 0,
				'hari_jadwal_kuliah' => '',
				'jam_masuk_kuliah' => 0,
				'jam_keluar_kuliah' => 0,
				'nama_lengkap_peg' => 'Silahkan Memilih Dosen Pengajar',
				'matkul' => $this->m_akademik->get_matkul($jurusan['id_jurusan'])->result_array(),
				'dosen' => $this->m_akademik->get_dosen()->result_array(),
				'title' => 'Tambah Jadwal Mengajar',
				'action' => 'jurusan/create_jadkul', 
			);
			
			$this->template->load('template_admin', 'jurusan/jadwal_mengajar/form_jadwalkuliah', $data);
		}
		else {
			$data = $this->m_akademik->get_jadkul_byid($id)->row_array();
			$data['dosen'] = $this->m_akademik->get_dosen()->result_array();
			$data['matkul'] = $this->m_akademik->get_matkul($jurusan['id_jurusan'])->result_array();
			$data['title'] = 'Edit Jadwal Mengajar';
			$data['action'] = 'jurusan/update_jadkul';
			
			$this->template->load('template_admin', 'jurusan/jadwal_mengajar/form_jadwalkuliah', $data);
		}
	}
	
	public function create_jadkul()
	{
		$post = $this->input->post();
			
		if($post['dosen'] == ''){
			$this->session->set_flashdata('msg', 2);
			redirect('jurusan/form_jadkul');
		}	
		else {
			$this->form_validation->set_rules('timeIn', 'Jam Masuk', 'required|trim');
			$this->form_validation->set_rules('timeOut', 'Jam Keluar', 'required|trim');
			$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

			if($this->form_validation->run() == FALSE){
				$this->form_jadkul();
			}
			else {

				$data_jadkul = array(
					'id_mata_kuliah' => $post['matkul'],
					'id_pegawai' => $post['dosen'],
					'hari_jadwal_kuliah' => $post['date'],
					'jam_masuk_kuliah' => $post['timeIn'],
					'jam_keluar_kuliah' => $post['timeOut']
				);

				if($this->m_akademik->insert('tbl_info_jadwal_kuliah', $data_jadkul)){
					$this->session->set_flashdata('msg', 1);
					redirect('jurusan/form_jadkul');
				} 
				else {
					$this->session->set_flashdata('msg', 2);
					redirect('jurusan/form_jadkul');
				}
			}
		}
	}

	public function update_jadkul()
	{
		$post = $this->input->post();
			
		if($post['dosen'] == ''){
			$this->session->set_flashdata('msg', 2);
			$this->form_jadkul($post['id']);
		}	
		else {
			$this->form_validation->set_rules('timeIn', 'Jam Masuk', 'required|trim');
			$this->form_validation->set_rules('timeOut', 'Jam Keluar', 'required|trim');
			$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

			if($this->form_validation->run() == FALSE){
				$this->form_jadkul();
			}
			else {

				$data_jadkul = array(
					'id_mata_kuliah' => $post['matkul'],
					'id_pegawai' => $post['dosen'],
					'hari_jadwal_kuliah' => $post['date'],
					'jam_masuk_kuliah' => $post['timeIn'],
					'jam_keluar_kuliah' => $post['timeOut']
				);

				if($this->m_akademik->update('tbl_info_jadwal_kuliah', array('id_jadwal_kuliah' => $post['id']), $data_jadkul)){
					$this->session->set_flashdata('msg', 1);
					$this->form_jadkul($post['id']);
				} 
				else {
					$this->session->set_flashdata('msg', 2);
					$this->form_jadkul($post['id']);
				}
			}
		}
	}

	public function hapus_jadkul($id)
	{
		
		if($this->m_akademik->delete('tbl_info_jadwal_kuliah', array('id_jadwal_kuliah' => $id))){
			$this->session->set_flashdata('msg', 1);
			redirect('jurusan/data_jadwal_mengajar');
		} 
	}  

    
    //  ====================================== Mata Kuliah ==============================================
    public function mata_kuliah()
	{
		$this->template->load('template_admin', 'jurusan/Mata_kuliah/dashboard_matakuliah');
	}
	
	public function json_mata_kuliah()
	{
		$data = $this->m_akademik->json_mata_kuliah($this->input->post('id'));
		
		echo $data;
	}
	
	public function form_matkul($id = null)
	{
		if($id == null){
			$data = array(
				'nama_mata_kuliah' => '',
				'semester_mata_kuliah' => 0,
				'sks_mata_kuliah' => 0,
				// 'id_jurusan' => 0,
				// 'nama_jurusan' => 'Silahkan Pilih Jurusan',
			);
			$data['title'] = 'Tambah Mata Kuliah';
			$data['action'] = 'jurusan/create_matkul';
			// $data['jurusan'] = $this->m_akademik->get_jurusan($this->session->userdata('id_users'))->result_array();
			$data['jurusan'] = $this->m_akademik->get_jurusan($this->session->userdata('id_users'))->row_array();
			
			$this->template->load('template_admin', 'jurusan/Mata_kuliah/form_matakuliah', $data);
		}
		else {
			
			$data = $this->m_akademik->get_matkul_byid($id)->row_array();
			$data['title'] = 'Edit Mata Kuliah';
			$data['action'] = 'jurusan/update_matkul';
			$data['jurusan'] = $this->m_akademik->get_jurusan($this->session->userdata('id_users'))->row_array();

			$this->template->load('template_admin', 'jurusan/Mata_kuliah/form_matakuliah', $data);
		}
	}

	public function create_matkul()
	{
		$post = $this->input->post();

		$this->rules($post);	
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if($this->form_validation->run() == FALSE){
			$this->form_matkul();
		}
		else {

			$data_matkul = array(
				'nama_mata_kuliah' => $post['matkul'],
				'semester_mata_kuliah' => $post['semester'],
				'sks_mata_kuliah' => $post['sks'],
				'id_jurusan' => $post['jurusan']
			);

			if($this->m_akademik->insert('tbl_mata_kuliah', $data_matkul)){
				$this->session->set_flashdata('msg', 1);
				redirect('jurusan/form_matkul');
			} 
			else {
				$this->session->set_flashdata('msg', 2);
				redirect('jurusan/form_matkul');
			}
		}	
	}

	public function update_matkul()
	{
		$post = $this->input->post();

		$this->rules($post);	
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if($this->form_validation->run() == FALSE){
			$this->form_matkul();
		}
		else {

			$data_matkul = array(
				'nama_mata_kuliah' => $post['matkul'],
				'semester_mata_kuliah' => $post['semester'],
				'sks_mata_kuliah' => $post['sks'],
				'id_jurusan' => $post['jurusan'],
			);

			if($this->m_akademik->update('tbl_mata_kuliah', array('id_mata_kuliah' => $post['id']), $data_matkul)){
				$this->session->set_flashdata('msg', 1);
				$this->form_matkul($post['id']);
			} 
			else {
				$this->session->set_flashdata('msg', 2);
				$this->form_matkul($post['id']);
			}
		}	
	}

	public function hapus_matkul($id)
	{
		
		if($this->m_akademik->delete('tbl_mata_kuliah', array('id_mata_kuliah' => $id))){
			$this->session->set_flashdata('msg', 1);
			redirect('jurusan/mata_kuliah');
		} 
	}

}

?>