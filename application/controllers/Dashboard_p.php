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
			);
		};

		return $data;
	}

	public function index()
	{
		$data = $this->getDuk();
		$this->template->load('template', 'dashboard_pegawai', $data);	
	}
	
	public function form_duk()
	{
		$data = $this->getDuk();
		$data['button'] = 'Save';
		$data['action'] = base_url('dashboard_p/update_duk');

		$this->template->load('template', 'pegawai/duk/form_duk_pegawai', $data);	
	}

	public function detail_duk()
	{
		
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

	public function ajukan_pensiun(){

	}

	public function ajukan_kenaikan_pangkat(){
		
	}

}

/* End of file dashboard_d.php */
/* Location: ./application/controllers/dashboard_d.php */