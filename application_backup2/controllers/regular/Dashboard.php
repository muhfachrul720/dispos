<?php 
    
    class Dashboard extends User_Controller {

        public function __construct() {

            parent::__construct();
            $this->load->model('m_pengajuan');

        }

        public function index()
        {
            $id = $this->session->userdata('id');
            $count = $this->m_pengajuan->count_pengajuan('tbl_pengajuan_berkas');
            $done = 0; $process = 0; $all = $count->num_rows();

            foreach($count->result() as $c){
                if($c->lvid == 7){$done++;}
                else {$process++;}
            }

            $data = array(
                'title' => 'Dashboard Pendaftar',
                'pengajuan' => $this->m_pengajuan->_countbyid('tbl_pengajuan_berkas', $id)->num_rows(),
                'done' => $done,
                'process' => $process,
                'all' => $all,
            );

            $this->template->load('template_admin','regular/dashboard', $data);
        }

    }