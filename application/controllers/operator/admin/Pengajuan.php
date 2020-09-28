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

        public function index()
        {
            $check = $this->session->userdata('user_level') == 4 ? true : false;

            $data['riwayat'] = $this->M_pengajuan->get_pengajuan_all($check)->result_array();
            $data['title'] = 'Dashboard Pengajuan';

            $this->template->load('template_admin','operator/admin/list', $data);
        }

        public function update_permit()
        {
            $post = $this->input->post();
            $permit = $post['permit'] != 'FALSE' ? 1 : 0;

            $this->M_pengajuan->update('tbl_pengajuan_berkas', array('id' => $post['id']), array('permit' => $permit));
        }

        public function form_edit($id)
        {
            $data = $this->M_pengajuan->get_detail_tinjauan($id)->row_array();;
            $data['riwayat'] = $this->M_pengajuan->get_riwayat($id)->result_array();
            $data['title'] = 'Detail Pengajuan';

            $this->template->load('template_admin','operator/admin/form', $data);
        }

        public function update()
        {
            $post = $this->input->post();

            $this->rules($post);

            if($this->form_validation->run() != FALSE){

                $data = array(
                    'no_berkas' => $post['berkas'],
                    'no_hak' => $post['hak'],
                    'jenis_hak' => $post['jenishak'],
                    'desa_kecamatan' => $post['camat'],
                    'nama_pemilik' => $post['owner'],
                    'jenis_permohonan' => $post['jenismohon'],
                );

                if($idaju = $this->M_pengajuan->update('tbl_pengajuan_berkas', array('id' => $post['id']), $data)){
                    redirect('operator/admin/pengajuan');
                }
                else {
                    echo 'Gagal Silahakan Kembali';
                }
            }
            else {
                redirect('operator/admin/pengajuan');
            }
        }

        public function delete($id)
        {
            $this->M_pengajuan->update('tbl_pengajuan_berkas', array('id' => $id), array('softdelete' => 1));
            redirect('operator/admin/pengajuan');
        }
    }
?>