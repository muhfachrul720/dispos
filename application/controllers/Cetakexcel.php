<?php

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    class Cetakexcel extends CI_Controller 
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('m_pegawai');
        }

        function config_excel()
        {
            $styleArray = 
            [
                'alignment' => [
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];

            return $styleArray;
        }

	// ======================================================== Print Excel Cuti ====================================================
        public function print_excel_cuti_nonsk()
        {
            // Data
            $data = $this->m_pegawai->get_all_pegcuti(1)->result_array();

            // Export
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $no = 3;

            foreach(range('A','J') as $col){
                $sheet->getStyle($col)->applyFromArray($this->config_excel());
                $spreadsheet->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
            }

            $sheet->mergeCells('A1:J1');
            $sheet->getStyle('A1')->applyFromArray($this->config_excel());
            $sheet->setCellValue('A1', 'List Nama dan Pengajuan Cuti Pegawai Yang Siap Dibawa Ke Rektorat');
            
            foreach($data as $d){
                $lastday =  date('Y-m-d', strtotime('+'.$d['jml_thn_cuti'].' years +'.$d['jml_bln_cuti'].' months +'.$d['jml_hari_cuti'].' days', strtotime($d['tgl_cuti'])));

                $no++;// print_r($col[$no - 3]);
                
                $sheet->mergeCells('A2:A3');
                $sheet->setCellValue('A2', 'No.');
                $sheet->setCellValue('A'.$no, $no - 2);
                
                $sheet->mergeCells('B2:B3');
                $sheet->setCellValue('B2', 'Nama Pegawai (Tanpa Gelar)');
                $sheet->setCellValue('B'.$no, $d['nama_tanpa_gelar_peg']);
                
                $sheet->mergeCells('C2:C3');
                $sheet->setCellValue('C2', 'Nama Lengkap Pegawai');
                $sheet->setCellValue('C'.$no, $d['nama_lengkap_peg']);
                
                $sheet->mergeCells('D2:D3');
                $sheet->setCellValue('D2', 'Nip Pegawai');
                $sheet->setCellValue('D'.$no, ' '.$d['nip_peg']);
                
                $sheet->mergeCells('E2:E3');
                $sheet->setCellValue('E2', 'Jenis Cuti');
                $sheet->setCellValue('E'.$no, convert_cuti($d['jenis_pengajuan_cuti']));
                
                $sheet->mergeCells('F2:H2');
                $sheet->setCellValue('F2', 'Lama Cuti');
                $sheet->setCellValue('F3', 'Hari');
                $sheet->setCellValue('F'.$no, $d['jml_hari_cuti']);
                $sheet->setCellValue('G3', 'Bulan');
                $sheet->setCellValue('G'.$no, $d['jml_bln_cuti']);
                $sheet->setCellValue('H3', 'Tahun');
                $sheet->setCellValue('H'.$no, $d['jml_thn_cuti']);

                $sheet->mergeCells('I2:I3');
                $sheet->setCellValue('I2', 'Terhitung Tanggal Mulai Cuti');
                $sheet->setCellValue('I'.$no,  str_replace('-', ' ', $d['tgl_cuti']));
                
                $sheet->mergeCells('J2:J3');
                $sheet->setCellValue('J2', 'Terhitung Tanggal Berakhir Cuti');
                $sheet->setCellValue('J'.$no, $lastday);
            }

            $writer = new Xlsx($spreadsheet);

            $filename = "List Nama Pegawai Cuti";

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        }

        public function print_excel_cuti_all()
        {
             // Data
             $data = $this->m_pegawai->get_all_pegcuti(0)->result_array();

             // Export
             $spreadsheet = new Spreadsheet();
             $sheet = $spreadsheet->getActiveSheet();
 
             $no = 3;
 
             foreach(range('A','R') as $col){
                 $sheet->getStyle($col)->applyFromArray($this->config_excel());
                 $spreadsheet->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
             }
 
             $sheet->mergeCells('A1:R1');
             $sheet->getStyle('A1')->applyFromArray($this->config_excel());
             $sheet->setCellValue('A1', 'List Nama dan Pengajuan Cuti Pegawai');
             
             foreach($data as $d){
                 $lastday =  date('Y-m-d', strtotime('+'.$d['jml_thn_cuti'].' years +'.$d['jml_bln_cuti'].' months +'.$d['jml_hari_cuti'].' days', strtotime($d['tgl_cuti'])));
 
                 $no++;// print_r($col[$no - 3]);
                 
                 $sheet->mergeCells('A2:A3');
                 $sheet->setCellValue('A2', 'No.');
                 $sheet->setCellValue('A'.$no, $no - 2);
                 
                 $sheet->mergeCells('B2:B3');
                 $sheet->setCellValue('B2', 'Nama Pegawai (Tanpa Gelar)');
                 $sheet->setCellValue('B'.$no, $d['nama_tanpa_gelar_peg']);
                 
                 $sheet->mergeCells('C2:C3');
                 $sheet->setCellValue('C2', 'Nama Lengkap Pegawai');
                 $sheet->setCellValue('C'.$no, $d['nama_lengkap_peg']);
                 
                 $sheet->mergeCells('D2:D3');
                 $sheet->setCellValue('D2', 'Nip Pegawai');
                 $sheet->setCellValue('D'.$no, ' '.$d['nip_peg']);
                 
                 $sheet->mergeCells('E2:E3');
                 $sheet->setCellValue('E2', 'Jenis Cuti');
                 $sheet->setCellValue('E'.$no, convert_cuti($d['jenis_pengajuan_cuti']));
                 
                 $sheet->mergeCells('F2:H2');
                 $sheet->setCellValue('F2', 'Lama Cuti');
                 $sheet->setCellValue('F3', 'Hari');
                 $sheet->setCellValue('F'.$no, $d['jml_hari_cuti']);
                 $sheet->setCellValue('G3', 'Bulan');
                 $sheet->setCellValue('G'.$no, $d['jml_bln_cuti']);
                 $sheet->setCellValue('H3', 'Tahun');
                 $sheet->setCellValue('H'.$no, $d['jml_thn_cuti']);
 
                 $sheet->mergeCells('I2:I3');
                 $sheet->setCellValue('I2', 'Terhitung Tanggal Mulai Cuti');
                 $sheet->setCellValue('I'.$no,  str_replace('-', ' ', $d['tgl_cuti']));
                 
                 $sheet->mergeCells('J2:J3');
                 $sheet->setCellValue('J2', 'Terhitung Tanggal Berakhir Cuti');
                 $sheet->setCellValue('J'.$no, $lastday);

                 $sheet->mergeCells('K2:K3');
                 $sheet->setCellValue('K2', 'Alasan Cuti');
                 $sheet->setCellValue('K'.$no, $d['alasan_pengajuan_cuti']);

                 $sheet->mergeCells('L2:L3');
                 $sheet->setCellValue('L2', 'Alamat Selama Menjalankan Cuti');
                 $sheet->setCellValue('L'.$no, $d['alasan_pengajuan_cuti']);

                 $sheet->mergeCells('M2:M3');
                 $sheet->setCellValue('M2', 'Telepon Selama Menjalankan Cuti');
                 $sheet->setCellValue('M'.$no, $d['telepon_pengajuan_cuti']);

                 $sheet->mergeCells('O2:Q2');
                 $sheet->setCellValue('O2', 'Kuota Cuti');
                 $sheet->setCellValue('O3', 'Hari');
                 $sheet->setCellValue('O'.$no, $d['Kuota_cuti_thn_n']);
                 $sheet->setCellValue('P3', 'Bulan');
                 $sheet->setCellValue('P'.$no, $d['Kuota_cuti_thn_1']);
                 $sheet->setCellValue('Q3', 'Tahun');
                 $sheet->setCellValue('Q'.$no, $d['Kuota_cuti_thn_2']);

                 $sheet->mergeCells('R2:R3');
                 $sheet->setCellValue('R2', 'Telepon Selama Menjalankan Cuti');
                 $sheet->setCellValue('R'.$no, $d['report_pengajuan_cuti'] != null ? 'SK Belum Di Upload' : 'SK Telah Di Upload');
             }
 
             $writer = new Xlsx($spreadsheet);
 
             $filename = "List Nama Pegawai Cuti";
 
             header('Content-Type: application/vnd.ms-excel');
             header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
             header('Cache-Control: max-age=0');
 
             $writer->save('php://output');
        }
        
        // ========================================================= Print Excel Pensiun ================================================
        public function print_excel_pensiun_nonsk()
        {
            // Data
            $data = $this->m_pegawai->get_all_pegpensi(1)->result_array();

            // Export
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $no = 3;

            foreach(range('A','H') as $col){
                $sheet->getStyle($col)->applyFromArray($this->config_excel());
                $spreadsheet->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
            }

            $sheet->mergeCells('A1:H1');
            $sheet->getStyle('A1')->applyFromArray($this->config_excel());
            $sheet->setCellValue('A1', 'List Nama dan Pengajuan Pensiun, Pegawai Yang Siap Dibawa Ke Rektorat');
            
            foreach($data as $d){
                $no++;// print_r($col[$no - 3]);
                
                $sheet->mergeCells('A2:A3');
                $sheet->setCellValue('A2', 'No.');
                $sheet->setCellValue('A'.$no, $no - 2);
                
                $sheet->mergeCells('B2:B3');
                $sheet->setCellValue('B2', 'Nama Pegawai (Tanpa Gelar)');
                $sheet->setCellValue('B'.$no, $d['nama_tanpa_gelar_peg']);
                
                $sheet->mergeCells('C2:C3');
                $sheet->setCellValue('C2', 'Nama Lengkap Pegawai');
                $sheet->setCellValue('C'.$no, $d['nama_lengkap_peg']);
                
                $sheet->mergeCells('D2:D3');
                $sheet->setCellValue('D2', 'Nip Pegawai');
                $sheet->setCellValue('D'.$no, $d['nip_peg']);
                
                $sheet->mergeCells('E2:E3');
                $sheet->setCellValue('E2', 'Tmt Masuk Pegawai');
                $sheet->setCellValue('E'.$no, $d['tmt_masuk_peg']);

                $sheet->mergeCells('F2:F3');
                $sheet->setCellValue('F2', 'Tmt Pensiun Pegawai');
                $sheet->setCellValue('F'.$no, $d['tmt_pensiun_peg']);
                
                $sheet->mergeCells('G2:G3');
                $sheet->setCellValue('G2', 'Jabatan Fungsional');
                $sheet->setCellValue('G'.$no, $d['nama_kategori_fung']);
                
                $sheet->mergeCells('H2:H3');
                $sheet->setCellValue('H2', 'Jabatan Struktural');
                $sheet->setCellValue('H'.$no, $d['nama_jabatan_struktur']);
            }

            $writer = new Xlsx($spreadsheet);

            $filename = "List Nama Pegawai Pensiun";

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        }

        public function print_excel_pensiun_all()
        {
            // Data
            $data = $this->m_pegawai->get_all_pegpensi(0)->result_array();

            // Export
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $no = 3;

            foreach(range('A','H') as $col){
                $sheet->getStyle($col)->applyFromArray($this->config_excel());
                $spreadsheet->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
            }

            $sheet->mergeCells('A1:H1');
            $sheet->getStyle('A1')->applyFromArray($this->config_excel());
            $sheet->setCellValue('A1', 'List Nama dan Pengajuan Pegawai Pensiun');
            
            foreach($data as $d){
                $no++;// print_r($col[$no - 3]);
                
                $sheet->mergeCells('A2:A3');
                $sheet->setCellValue('A2', 'No.');
                $sheet->setCellValue('A'.$no, $no - 2);
                
                $sheet->mergeCells('B2:B3');
                $sheet->setCellValue('B2', 'Nama Pegawai (Tanpa Gelar)');
                $sheet->setCellValue('B'.$no, $d['nama_tanpa_gelar_peg']);
                
                $sheet->mergeCells('C2:C3');
                $sheet->setCellValue('C2', 'Nama Lengkap Pegawai');
                $sheet->setCellValue('C'.$no, $d['nama_lengkap_peg']);
                
                $sheet->mergeCells('D2:D3');
                $sheet->setCellValue('D2', 'Nip Pegawai');
                $sheet->setCellValue('D'.$no, ' '.$d['nip_peg']);
                
                $sheet->mergeCells('E2:E3');
                $sheet->setCellValue('E2', 'Tmt Masuk Pegawai');
                $sheet->setCellValue('E'.$no, $d['tmt_masuk_peg']);

                $sheet->mergeCells('F2:F3');
                $sheet->setCellValue('F2', 'Tmt Pensiun Pegawai');
                $sheet->setCellValue('F'.$no, $d['tmt_pensiun_peg']);
                
                $sheet->mergeCells('G2:G3');
                $sheet->setCellValue('G2', 'Jabatan Fungsional');
                $sheet->setCellValue('G'.$no, $d['nama_kategori_fung']);
                
                $sheet->mergeCells('H2:H3');
                $sheet->setCellValue('H2', 'Jabatan Struktural');
                $sheet->setCellValue('H'.$no, $d['nama_jabatan_struktur']);
            }

            $writer = new Xlsx($spreadsheet);

            $filename = "List Nama Pegawai Pensiun";

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        }

        // ================================================== Print DUK ============================================
        public function print_excel_duk_all()
        {
             // Data
             $data = $this->m_pegawai->get_all_peg(0)->result_array();

             // Export
             $spreadsheet = new Spreadsheet();
             $sheet = $spreadsheet->getActiveSheet();
 
             $no = 3;
 
             foreach(range('A','H') as $col){
                 $sheet->getStyle($col)->applyFromArray($this->config_excel());
                 $spreadsheet->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
             }
 
             $sheet->mergeCells('A1:H1');
             $sheet->getStyle('A1')->applyFromArray($this->config_excel());
             $sheet->setCellValue('A1', 'List Nama dan Pengajuan Pegawai Pensiun');
             
             foreach($data as $d){
                 $no++;// print_r($col[$no - 3]);
                 
                 $sheet->mergeCells('A2:A3');
                 $sheet->setCellValue('A2', 'No.');
                 $sheet->setCellValue('A'.$no, $no - 2);
                 
                 $sheet->mergeCells('B2:B3');
                 $sheet->setCellValue('B2', 'Nama Pegawai (Tanpa Gelar)');
                 $sheet->setCellValue('B'.$no, $d['nama_tanpa_gelar_peg']);
                 
                 $sheet->mergeCells('C2:C3');
                 $sheet->setCellValue('C2', 'Nama Lengkap Pegawai');
                 $sheet->setCellValue('C'.$no, $d['nama_lengkap_peg']);
                 
                 $sheet->mergeCells('D2:D3');
                 $sheet->setCellValue('D2', 'Nip Pegawai');
                 $sheet->setCellValue('D'.$no, ' '.$d['nip_peg']);
                 
                 $sheet->mergeCells('E2:E3');
                 $sheet->setCellValue('E2', 'Tmt Masuk Pegawai');
                 $sheet->setCellValue('E'.$no, $d['tmt_masuk_peg']);
 
                 $sheet->mergeCells('F2:F3');
                 $sheet->setCellValue('F2', 'Tmt Pensiun Pegawai');
                 $sheet->setCellValue('F'.$no, $d['tmt_pensiun_peg']);
                 
                 $sheet->mergeCells('G2:G3');
                 $sheet->setCellValue('G2', 'Jabatan Fungsional');
                 $sheet->setCellValue('G'.$no, $d['nama_kategori_fung']);
                 
                 $sheet->mergeCells('H2:H3');
                 $sheet->setCellValue('H2', 'Jabatan Struktural');
                 $sheet->setCellValue('H'.$no, $d['nama_jabatan_struktur']);
             }
 
             $writer = new Xlsx($spreadsheet);
 
             $filename = "List Nama Pegawai Pensiun";
 
             header('Content-Type: application/vnd.ms-excel');
             header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
             header('Cache-Control: max-age=0');
 
             $writer->save('php://output');
        }
    }


?>