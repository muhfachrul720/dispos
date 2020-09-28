<?php 
    
    class Cetakqr extends User_Controller {

        public function __construct() {

            parent::__construct();
            $this->load->model('M_pengajuan');

        }

        public function generate_qrcode($data)
        {

            $this->load->library('ciqrcode');

            $image_name = $data['no_berkas'].'.png';

            $params['data'] = $data['no_berkas'];
            $params['level'] = 'H';
            $params['size'] = 10;
            $params['savename'] = FCPATH.'./upload/qrcode/'.$image_name;

            $this->ciqrcode->generate($params);
        }

        public function print_berkas($id)
        {
            $data = $this->M_pengajuan->get_detail_tinjauan($id)->row_array();

            if(!file_exists('./upload/qrcode/'.$data['no_berkas'].'.png')){
                $this->generate_qrcode($data);
            }
            
            $mpdf = new \Mpdf\Mpdf();

            $html = $this->load->view('regular/print_qrcode', $data, true);

            $pdfFilePath = 'Print Berkas.pdf';

            $mpdf->AddPageByArray([
                'margin-top' => '5',
                'margin-bottom' => '5',
            ]);

            $mpdf->WriteHTML($html);
            $mpdf->Output($pdfFilePath, "I");

            
        }
    }

?>