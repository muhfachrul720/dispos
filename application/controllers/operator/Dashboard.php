<?php 
    
    class Dashboard extends Operator_Controller {

        public function __construct() {

            parent::__construct();
            $this->load->model('m_pengajuan');

        }

        public function index()
        {
            $id = $this->session->userdata('id');
            $data = array(
                'title' => 'Dashboard Operator',
                'berkas' => $this->m_pengajuan->get_tinjauan($id)->num_rows(),
            );

            if($this->session->userdata('user_level') == 6){
                $data['verif_pengolah'] = $this->m_pengajuan->get_tinjauan($id, 5)->num_rows();
                $data['verif_tanah'] = $this->m_pengajuan->get_tinjauan($id, 9)->num_rows();
            }

            $this->template->load('template_admin','operator/dashboard', $data);
        }

    }
?> 