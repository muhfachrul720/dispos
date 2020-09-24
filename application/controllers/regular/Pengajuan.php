<?php 
    
    class Pengajuan extends User_Controller {

        public function __construct() {

            parent::__construct();
            $this->load->model('M_pengajuan');
            $this->load->model('User_model');
        }

        // General Function

        public function rules($post)
        {
            foreach($post as $p){
                $this->form_validation->set_rules(key($post), key($post), 'required|trim');
                next($post);
            }	
            
            $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        }

        public function file_upload($path, $name)
        {
            $config['upload_path']          = $path;
            $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
            $config['overwrite']			= true;
            $config['encrypt_name']         = TRUE;
    
            $this->load->library('upload', $config);
    
            if($bool = $this->upload->do_upload($name)){
                return $this->upload->data();
            }else {
                echo $this->upload->display_errors();
                die;
            }
        }

        // 

        public function index()
        {
            $data['riwayat'] = $this->M_pengajuan->get_pengajuan($this->session->userdata('id'))->result_array();
            $data['title'] = 'Dashboard Pengajuan';

            $this->template->load('template_admin','regular/list', $data);
        }

        public function form_insert()
        {   
            $data['title'] = 'Tambahkan Pengajuan';
            $where = array(
                array('us.user_level' => 4), 
            );

            $data['peninjau'] = $this->User_model->get_peninjau($where)->result_array();

            $this->template->load('template_admin','regular/form', $data);
        }

        public function insert()
        {
            $post = $this->input->post();
            $idus = $this->session->userdata('id');

            $this->rules($post);

            if($this->form_validation->run() != FALSE){

                if($_FILES['fileUp']['name'] != null){
                    $path = './upload/berkas_permohonan';
                    $file = $this->file_upload($path, 'fileUp');
                }   

                $data = array(
                    'no_berkas' => $post['berkas'],
                    'no_hak' => $post['hak'],
                    'jenis_hak' => $post['jenishak'],
                    'desa_kecamatan' => $post['camat'],
                    'nama_pemilik' => $post['owner'],
                    'waktu' => $post['date'].' '.$post['time'],
                    'jatuh_tempo' => date('Y-m-d',strtotime('+7 days', strtotime($post['date']))).' '.$post['time'],
                    'jenis_permohonan' => $post['jenismohon'],
                    'id_user' => $idus,
                );

                if($idaju = $this->M_pengajuan->insert('tbl_pengajuan_berkas', $data)){
                    
                    $riwayat = array(
                        'waktu' =>  $data['waktu'], 
                        'id_user' => $idus, 
                        'next_user' => $post['peninjau'], 
                        'id_pengajuan' => $idaju, 
                        'keterangan' => 'Permohonan Dibuat', 
                    );

                    $this->M_pengajuan->insert('tbl_riwayat_perjalanan', $riwayat);

                    $this->session->set_flashdata('msg', 'Permohonan berhasil diajukan mohon menunggu');
                    redirect('regular/pengajuan');
                }
                else {
                    echo 'FAK';
                }
            }
            else {
                $this->form_insert();
            }
        }

    }
?> 