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

        public function recap_pengajuan()
        {
            $post = $this->input->post();
            $data['tahun'] = isset($post['tahun']) ? $post['tahun'] : date('Y'); 

            $data['recap'] = array(
                array('Selesai' => 0, 'Proses' =>0, 'Total' => 0, 'Bulan' => 'Januari'), 
                array('Selesai' => 0, 'Proses' =>0, 'Total' => 0, 'Bulan' => 'Februari'), 
                array('Selesai' => 0, 'Proses' =>0, 'Total' => 0, 'Bulan' => 'Maret'), 
                array('Selesai' => 0, 'Proses' =>0, 'Total' => 0, 'Bulan' => 'April'), 
                array('Selesai' => 0, 'Proses' =>0, 'Total' => 0, 'Bulan' => 'Mei'), 
                array('Selesai' => 0, 'Proses' =>0, 'Total' => 0, 'Bulan' => 'Juni'), 
                array('Selesai' => 0, 'Proses' =>0, 'Total' => 0, 'Bulan' => 'Juli'), 
                array('Selesai' => 0, 'Proses' =>0, 'Total' => 0, 'Bulan' => 'Agustus'), 
                array('Selesai' => 0, 'Proses' =>0, 'Total' => 0, 'Bulan' => 'September'), 
                array('Selesai' => 0, 'Proses' =>0, 'Total' => 0, 'Bulan' => 'Oktober'), 
                array('Selesai' => 0, 'Proses' =>0, 'Total' => 0, 'Bulan' => 'November'), 
                array('Selesai' => 0, 'Proses' =>0, 'Total' => 0, 'Bulan' => 'Desember'), 
            );

            $r = $this->M_pengajuan->get_recap($data['tahun'])->result_array();
                foreach($r as $r){
                    $data['recap'][$r['bln'] - 1] = array('Selesai' => $r['Selesai'], 'Proses' => $r['Proses'], 'Total' => $r['Total'], 'Bulan' => $r['Bulan']);
                };

            
            $this->template->load('template_admin','recap_list', $data);
        }
    }

?>