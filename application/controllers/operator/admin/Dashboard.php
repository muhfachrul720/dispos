<?php 
    
    class Dashboard extends Operator_Controller {

        public function __construct() {

            parent::__construct();
            $this->load->model('m_pengajuan');
        }

        public function index()
        {
            $id = $this->session->userdata('id');
            $check = $this->session->userdata('user_level') == 9 ? false : true;

            $data = array(
                'title' => 'Dashboard Admin Operator',
                'berkas' => $this->m_pengajuan->get_tinjauan($id)->num_rows(),
                'edit' => $this->m_pengajuan->get_pengajuan_all($check)->num_rows(),
                'verif_loket' => $this->m_pengajuan->get_tinjauan($this->session->userdata('id'), 10)->num_rows(),
                'verif_subseksi' => $this->m_pengajuan->get_tinjauan($this->session->userdata('id'), 6)->num_rows(),
            );

            $this->template->load('template_admin','operator/dashboard', $data);
        }

    }
?> 