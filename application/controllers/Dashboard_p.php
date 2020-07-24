<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_p extends CI_Controller {

	function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->model('m_pegawai');
		$this->load->model('user_model');
		
		$this->load->library('datatables');
	}

	function upload_foto($id){
		$filename = 'profil'.$id;

		$config['upload_path']          = './assets/foto_profil';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']        	= $filename;
		$config['overwrite']        	= TRUE;

		$this->load->library('upload', $config);
		$this->upload->do_upload('images');
		return $this->upload->data();
	}

	// Duk Pegawai
	public function getDuk()
	{
		$result = $this->m_pegawai->getinfo_pegawai_individual($this->session->userdata('id_users'));

		if($result){
			$data = array(
				'id'				=> set_value('id', $result->id),
				'name'				=> set_value('name', $result->full_name),
				'email' 			=> set_value('email', $result->email),
				'birthdate' 		=> set_value('birthdate', $result->info_pegawai_tanggallahir),
			);
		};

		return $data;
	}

	public function index()
	{
		$data = $this->getDuk();
		$this->template->load('template', 'pegawai/duk/dashboard_pegawai', $data);	
	}
	
	public function form_duk()
	{
		$data = $this->getDuk();
		$data['action'] = base_url('pegawai/dashboard_p/update_duk');
		$data['button'] = 'Save';

		$this->template->load('template', 'pegawai/duk/form_duk_pegawai', $data);	
	}

	public function detail_duk()
	{
		$this->template->load('template', 'pegawai/duk/detail_duk_pegawai');
	}

	public function update_duk()
	{
		$this->form_validation->set_rules('name', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'trim|required');
		$this->form_validation->set_rules('birthplace', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('birthdate', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('married', 'Status Kawin', 'trim|required');
		$this->form_validation->set_rules('religion', 'Agama', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		$foto = $this->upload_foto($this->session->userdata('id_users'));
		$post = $this->input->post();
		
		if ($this->form_validation->run() == FALSE) {
			redirect('dashboard_p/form_duk');
		} 
		else {
			$data = array(
				'info_pegawai_telepon' => $post['telepon'],
				'info_pegawai_alamat' => $post['alamat'],
				'info_pegawai_kewarganegaraan' => $post['kewarganegaraan'],
				'info_pegawai_tempatlahir' => $post['birthplace'],
				'info_pegawai_tanggallahir' => $post['birthdate'],
				'info_pegawai_jeniskelamin' => $post['gender'],
				'info_pegawai_statusperkawinan' => $post['married'],
				'info_pegawai_agama' => $post['religion']
			);	
			
			$this->m_pegawai->update($post['id'], $data);
			
			$id = $this->m_pegawai->get_userid($post['id'])->row();
			
			$datab = array(
				'full_name' => $post['name'],
			);

			if($foto['file_name'] != ''){
				$datab['images'] = $foto['file_name'];
			}

			if($this->user_model->update($id->info_pegawai_iduser, $datab)){
				$this->session->set_flashdata('Message', 'Berhasil Mengedit Data Silahkan Login Ulang Untuk Melihat Perubahan');
				redirect('dashboard_p');
			}
			else {
				$this->session->set_flashdata('Message', 'Gagal Mengedit Data');
				redirect('dashboard_p/form_duk');
			};
		}

		// redirect('dashboard_p/form_duk');

	}

	// Ajuan Pensiun
	public function json_pensiun(){
		// header('Content-Type: application/json');
		$id = $this->input->post('id');

        $data = $this->m_pegawai->json_pensiun_individual($id);
		echo $data;
	}

	// public function getAjuanPensiun()
	// {
	// 	$result = $this->m_pegawai->get_pensiun_individual();

	// 	if($r)
	// }

	public function ajuan_pensiun(){
		
		$status = $this->m_pegawai->get_pensiun_status($this->session->userdata('id_users'));

		$data['status'] = 3;

		if($status) {
			$data = array(
				'status' => set_value('status', $status->status),
			);
		}

		$this->template->load('template', 'pegawai/ajuan_pensiun/dashboard_ajuan_pensiun', $data);	
	}

	public function form_ajuan_pensiun()
	{	
		$data = array(
			'action' 	=> base_url('dashboard_p/create_ajuan_pensiun'),
			'button' 	=> 'Create',
			'input1' 	=> set_value('input1'),
			'id' 	 	=> set_value('id')
		);

		$this->template->load('template', 'pegawai/ajuan_pensiun/form_ajuan_pensiun', $data);	
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
}

// 

/* End of file dashboard_d.php */
/* Location: ./application/controllers/dashboard_d.php */