<?php 
    
    class Verifikasi extends Operator_Controller {

        public function __construct() {

            parent::__construct();
            $this->load->model('M_pengajuan');
            $this->load->model('M_alur');
            $this->load->model('User_model');

        }

        public function verif_all()
        {
            $data['title'] = 'Verifikasi Berkas';
            $data['verif'] = $this->M_pengajuan->get_tinjauan($this->session->userdata('id'))->result_array();
            $data['subtitle'] = 'Menu Untuk Memverifikasi Berkas';

            $this->template->load('template_admin','operator/list', $data);
        }
        
        public function verif_loketpendaftaran ()
        {
            $data['title'] = 'Verifikasi Berkas';
            $data['subtitle'] = 'Verifikasi Berkas dari Loket Pendaftaran';
            $data['verif'] = $this->M_pengajuan->get_tinjauan($this->session->userdata('id'), 10)->result_array();

            $this->template->load('template_admin','operator/list', $data);
        }

        public function verif_kepalakantortanah()
        {
            $data['title'] = 'Verifikasi Berkas';
            $data['subtitle'] = 'Verifikasi Berkas dari Kepala Kantor Pertanahan';
            $data['verif'] = $this->M_pengajuan->get_tinjauan($this->session->userdata('id'), 9)->result_array();

            $this->template->load('template_admin','operator/list', $data);
        }

        public function form_tinjau($idaju)
        {
            $level = $this->session->userdata('user_level');
            $where = array();
            $alur = $this->M_alur->get_receiver($level)->result_array();

            foreach($alur as $al){
                array_push($where, array('us.user_level' => $al['level_receive']));
            }

            $data['permohonan'] = $this->M_pengajuan->get_detail_tinjauan($idaju);
            $data['riwayat'] = $this->M_pengajuan->
            $data['peninjau'] = $this->User_model->get_peninjau($where)->result_array();
            $data['title'] = 'Tinjau Permohonan';

            $this->template->load('template_admin','operator/form', $data);
        }

    }
?> 