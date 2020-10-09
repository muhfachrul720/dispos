<?php 
    
    class Riwayat extends User_Controller {

        public function __construct() {

            parent::__construct();
            $this->load->model('M_pengajuan');

        }

        public function index()
        {
            $status = $this->input->get("status", TRUE );
            $status = $status ? $status :  "all";
            $data['riwayat']=[];
            $data['riwayat'] = $this->M_pengajuan->get_pengajuan(NULL, $status)->result_array();
            $data['title'] = 'Dashboard Pengajuan';

            $this->template->load('template_admin','riwayat_list', $data);
        }

        public function riwayat()
        {
            $data['title'] = 'Riwayat Perjalanan';

            $data['riwayat'] = $this->M_pengajuan->get_riwayat()->result_array();

            $this->template->load('template_admin','riwayat_list', $data);
        }
        
        public function detail_pengajuan($id)
        {
            $data = $this->M_pengajuan->get_detail_tinjauan($id)->row_array();
            $data['riwayat'] = $this->M_pengajuan->get_riwayat($id)->result_array();
            $data['title'] = 'Detail Pengajuan';

            $this->template->load('template_admin','detail', $data);
        }
    }

?>