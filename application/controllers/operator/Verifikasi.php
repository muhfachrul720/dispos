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
        
        public function verif_pelaksanasubseksi ()
        {
            $data['title'] = 'Verifikasi Berkas';
            $data['subtitle'] = 'Verifikasi Berkas dari Loket Pendaftaran';
            $data['verif'] = $this->M_pengajuan->get_tinjauan($this->session->userdata('id'), 6)->result_array();

            $this->template->load('template_admin','operator/list', $data);
        }

        public function verif_petugaspengolah ()
        {
            $data['title'] = 'Verifikasi Berkas';
            $data['subtitle'] = 'Verifikasi Berkas dari Loket Pendaftaran';
            $data['verif'] = $this->M_pengajuan->get_tinjauan($this->session->userdata('id'), 5)->result_array();

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

        public function form_tinjau($idriwayat)
        {
            $where = array();
            $level = $this->session->userdata('user_level');
            $aju = $this->M_pengajuan->get_aju_sender($idriwayat)->row_array();
            $alur = $this->M_alur->get_receiver($aju['user_level'], $this->session->userdata('user_level'))->result_array();

            foreach($alur as $al){
                array_push($where, array('us.user_level' => $al['level_receive']));
            }

            $data = $this->M_pengajuan->get_detail_tinjauan($aju['id_pengajuan'])->row_array();
            $data['idriwayat'] = $idriwayat;
            $data['riwayat'] = $this->M_pengajuan->get_riwayat($aju['id_pengajuan'])->result_array();
            $data['peninjau'] = $this->User_model->get_peninjau($where)->result_array();
            $data['title'] = 'Tinjau Permohonan';

            $this->template->load('template_admin','operator/form', $data);
        }

        public function tinjau_action()
        {
            $post = $this->input->post();
            $iduser = $this->session->userdata('id');

            // Update Old Riwayat
            $this->M_pengajuan->update('tbl_riwayat_perjalanan', array('id' => $post['idrw']), array('status' => $post['status']));

            if($post['status'] != 2){
                $data = array(
                    'waktu' => date('Y-m-d h:m:s'),
                    'id_user' => $iduser,
                    'next_user' => $post['peninjau'],
                    'id_pengajuan' => $post['idbrk'],
                    'keterangan' => $post['ket']
                );
    
                // Make New Riwayat
                $this->M_pengajuan->insert('tbl_riwayat_perjalanan', $data);
    
                if($this->session->userdata('user_level') == 4 || $this->session->userdata('user_level') == 9){
                    redirect('operator/admin/dashboard');
                } else {
                    redirect('operator/dashboard');
                }
            }
            else {
                redirect('operator/dashboard');
            }
        }

    }
?> 