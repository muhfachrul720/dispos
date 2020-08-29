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
            array (
                'alignment' => array(
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ),
            );

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

            $filename = "List Nama Pegawai Siap Pensiun";

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
            //  // Data
             $data = $this->m_pegawai->get_all_pegawai(0)->result_array();
             
             // Export
             $spreadsheet = new Spreadsheet();
             $sheet = $spreadsheet->getActiveSheet();
             
             $no = 4;
             
            foreach(double_range('EO') as $col){
                 $sheet->getStyle($col)->applyFromArray($this->config_excel());
                 $spreadsheet->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
            }
                
                $sheet->mergeCells('A1:EO1');
                $sheet->getStyle('A1')->applyFromArray($this->config_excel());
                $sheet->setCellValue('A1', 'List Data Induk Kepegawaian Fakultas Ilmu Sosial dan Ilmu Politik');
                
            foreach($data as $d){
                $no++;
                $ex =  explode(' ',$d['time_diklat']);
                $ez = explode('-', $ex[0]);
                
                // Umum
                $sheet->mergeCells('A2:A4');
                $sheet->setCellValue('A2', 'No.');
                $sheet->setCellValue('A'.$no, $no - 4);

                $sheet->mergeCells('B2:B4');
                $sheet->setCellValue('B2', 'NIP');
                $sheet->setCellValue('B'.$no, ' '.$d['nip_peg']);

                $sheet->mergeCells('C2:C4');
                $sheet->setCellValue('C2', 'Status Pegawai');
                $sheet->setCellValue('C'.$no, ' '.$d['status_kepegawaian_peg']);

                $sheet->mergeCells('D2:D4');
                $sheet->setCellValue('D2', 'Nama Tanpa Gelar');
                $sheet->setCellValue('D'.$no, ' '.$d['nama_tanpa_gelar_peg']);

                $sheet->mergeCells('E2:E4');
                $sheet->setCellValue('E2', 'Nama Lengkap');
                $sheet->setCellValue('E'.$no, ' '.$d['nama_lengkap_peg']);

                // Gelar
                $sheet->mergeCells('F2:J2');
                $sheet->setCellValue('F2', 'Gelar');

                $sheet->mergeCells('F3:F4');
                $sheet->setCellValue('F3', 'Prof');
                $sheet->setCellValue('F'.$no, ' '.$d['prof_gelar']);

                $sheet->mergeCells('G3:G4');
                $sheet->setCellValue('G3', 'H / HJ');
                $sheet->setCellValue('G'.$no, ' '.$d['h_hj_gelar']);

                $sheet->mergeCells('H3:H4');
                $sheet->setCellValue('H3', 'Doktor');
                $sheet->setCellValue('H'.$no, ' '.$d['doktor_gelar']);

                $sheet->mergeCells('I3:I4');
                $sheet->setCellValue('I3', 'Magister');
                $sheet->setCellValue('I'.$no, ' '.$d['magister_gelar']);

                $sheet->mergeCells('J3:J4');
                $sheet->setCellValue('J3', 'Strata');
                $sheet->setCellValue('J'.$no, ' '.$d['strata_1_gelar']);

                // Umum
                $sheet->mergeCells('K2:K4');
                $sheet->setCellValue('K2', 'Jenis Kelamin');
                $sheet->setCellValue('K'.$no, ' '.$d['jk_peg']);

                $sheet->mergeCells('L2:L4');
                $sheet->setCellValue('L2', 'Agama');
                $sheet->setCellValue('L'.$no, ' '.$d['agama_peg']);

                // Kelahiran
                $sheet->mergeCells('M2:Q2');
                $sheet->setCellValue('M2', 'Kelahiran');

                $sheet->mergeCells('M3:M4');
                $sheet->setCellValue('M3', 'Tempat Lahir');
                $sheet->setCellValue('M'.$no, ' '.$d['tempat_lahir_peg']);

                $sheet->mergeCells('N3:N4');
                $sheet->setCellValue('N3', 'Kabupaten');
                $sheet->setCellValue('N'.$no, ' '.$d['kabupaten_lahir_peg']);

                $sheet->mergeCells('O3:O4');
                $sheet->setCellValue('O3', 'Tanggal Lahir');
                $sheet->setCellValue('O'.$no, ' '.$d['tgl_lahir_peg']);

                $sheet->mergeCells('P3:P4');
                $sheet->setCellValue('P3', 'Usia Thn');
                $sheet->setCellValue('P'.$no, ' '.$d['usia_thn_lahir_peg']);

                $sheet->mergeCells('Q3:Q4');
                $sheet->setCellValue('Q3', 'Usia Bln');
                $sheet->setCellValue('Q'.$no, ' '.$d['usia_bln_lahir_peg']);

                // Umum
                $sheet->mergeCells('R2:R4');
                $sheet->setCellValue('R2', 'Kelompok Umur');
                $sheet->setCellValue('R'.$no, ' '.$d['kelompok_umur_peg']);

                // Pensiun
                $sheet->mergeCells('S2:U2');
                $sheet->setCellValue('S2', 'Pensiun');

                $sheet->mergeCells('S3:S4');
                $sheet->setCellValue('S3', 'TMT Pensiun');
                $sheet->setCellValue('S'.$no, ' '.$d['tmt_pensiun_peg']);

                $sheet->mergeCells('T3:U3');
                $sheet->setCellValue('T3', 'Masa Kerja');
                $sheet->setCellValue('T4', 'Tahun');
                $sheet->setCellValue('T'.$no, ' '.$d['thn_masa_kerja_pensiun_peg']);
                $sheet->setCellValue('U4', 'Bulan');
                $sheet->setCellValue('U'.$no, ' '.$d['bln_masa_kerja_pensiun_peg']);

                // Umum
                $sheet->mergeCells('V2:V4');
                $sheet->setCellValue('V2', 'Karpeg');
                $sheet->setCellValue('V'.$no, ' '.$d['karpeg_peg']);

                $sheet->mergeCells('W2:W4');
                $sheet->setCellValue('W2', 'Sertifikat Dosen');
                $sheet->setCellValue('W'.$no, ' '.$d['sertifikat_dosen_peg']);

                $sheet->mergeCells('X2:X4');
                $sheet->setCellValue('X2', 'NIDN');
                $sheet->setCellValue('X'.$no, ' '.$d['nidn_peg']);

                // CPNS
                $sheet->mergeCells('Y2:AI2');
                $sheet->setCellValue('Y2', 'CPNS');

                $sheet->mergeCells('Y3:Y4');
                $sheet->setCellValue('Y3', 'Nomor SK');
                $sheet->setCellValue('Y'.$no, ' '.$d['nomor_sk_cpns']);

                $sheet->mergeCells('Z3:Z4');
                $sheet->setCellValue('Z3', 'Tanggal SK');
                $sheet->setCellValue('Z'.$no, ' '.$d['tgl_sk_cpns']);

                $sheet->mergeCells('AA3:AA4');
                $sheet->setCellValue('AA3', 'Oleh Pejabat');
                $sheet->setCellValue('AA'.$no, ' '.$d['oleh_pejabat_cpns']);

                $sheet->mergeCells('AB3:AB4');
                $sheet->setCellValue('AB3', 'TMT CPNS');
                $sheet->setCellValue('AB'.$no, ' '.$d['tmt_cpns']);

                $sheet->mergeCells('AC3:AD3');
                $sheet->setCellValue('AC3', 'PMK');
                $sheet->setCellValue('AC4', 'Tahun');
                $sheet->setCellValue('AC'.$no, ' '.$d['thn_pmk_cpns']);
                $sheet->setCellValue('AD4', 'Bulan');
                $sheet->setCellValue('AD'.$no, ' '.$d['bln_pmk_cpns']);

                $sheet->mergeCells('AE3:AE4');
                $sheet->setCellValue('AE3', 'Pengurangan Tahun');
                $sheet->setCellValue('AE'.$no, ' '.$d['pengurangan_thn_cpns']);

                $sheet->mergeCells('AF3:AF4');
                $sheet->setCellValue('AF3', 'Pangkat/Gol/Ruang');
                $sheet->setCellValue('AF'.$no, ' '.$d['pangkat_cpns']);

                $sheet->mergeCells('AG3:AG4');
                $sheet->setCellValue('AG3', 'TMT Real');
                $sheet->setCellValue('AG'.$no, ' '.$d['tmt_real_cpns']);

                $sheet->mergeCells('AH3:AH4');
                $sheet->setCellValue('AH3', 'MKS THN');
                $sheet->setCellValue('AH'.$no, ' '.$d['mks_thn_cpns']);

                $sheet->mergeCells('AI3:AI4');
                $sheet->setCellValue('AI3', 'MKS BLN');
                $sheet->setCellValue('AI'.$no, ' '.$d['mks_bln_cpns']);

                // PMK
                $sheet->mergeCells('AJ2:AT2');
                $sheet->setCellValue('AJ2', 'Penyesuaian Masa Kerja');

                $sheet->mergeCells('AJ3:AJ4');
                $sheet->setCellValue('AJ3', 'Nomor PMK');
                $sheet->setCellValue('AJ'.$no, ' '.$d['no_pmk']);
                
                $sheet->mergeCells('AK3:AK4');
                $sheet->setCellValue('AK3', 'Tanggal PMK');
                $sheet->setCellValue('AK'.$no, ' '.$d['tgl_pmk']);

                $sheet->mergeCells('AL3:AL4');
                $sheet->setCellValue('AL3', 'Oleh Pejabat');
                $sheet->setCellValue('AL'.$no, ' '.$d['oleh_pejabat_pmk']);

                $sheet->mergeCells('AM3:AM4');
                $sheet->setCellValue('AM3', 'TMT PMK');
                $sheet->setCellValue('AM'.$no, ' '.$d['tmt_pmk']);

                $sheet->mergeCells('AN3:AO3');
                $sheet->setCellValue('AN3', 'Masa Kerja');
                $sheet->setCellValue('AN4', 'Tahun');
                $sheet->setCellValue('AN'.$no, ' '.$d['thn_masa_kerja_pmk']);
                $sheet->setCellValue('AO4', 'Bulan');
                $sheet->setCellValue('AO'.$no, ' '.$d['bln_masa_kerja_pmk']);

                $sheet->mergeCells('AP3:AQ3');
                $sheet->setCellValue('AP3', 'Selisih');
                $sheet->setCellValue('AP4', 'Tahun');
                $sheet->setCellValue('AP'.$no, ' '.$d['thn_selisih_pmk']);
                $sheet->setCellValue('AQ4', 'Bulan');
                $sheet->setCellValue('AQ'.$no, ' '.$d['bln_selisih_pmk']);

                $sheet->mergeCells('AR3:AT3');
                $sheet->setCellValue('AR3', 'Tambahan Masa Kerja');
                $sheet->setCellValue('AR4', 'Tanggal');
                $sheet->setCellValue('AR'.$no, ' '.$d['tgl_tambah_masa_kerja_pmk']);
                $sheet->setCellValue('AS4', 'Tahun');
                $sheet->setCellValue('AS'.$no, ' '.$d['thn_tambah_masa_kerja_pmk']);
                $sheet->setCellValue('AT4', 'Bulan');
                $sheet->setCellValue('AT'.$no, ' '.$d['bln_tambah_masa_kerja_pmk']);

                // KGB
                $sheet->mergeCells('AU2:BA2');
                $sheet->setCellValue('AU2', 'KGB');

                $sheet->mergeCells('AU3:AU4');
                $sheet->setCellValue('AU3', 'Nomor SK KGB');
                $sheet->setCellValue('AU'.$no, ' '.$d['no_sk_kgb']);

                $sheet->mergeCells('AV3:AV4');
                $sheet->setCellValue('AV3', 'Tanggal SK KGB');
                $sheet->setCellValue('AV'.$no, ' '.$d['tgl_sk_kgb']);

                $sheet->mergeCells('AW3:AW4');
                $sheet->setCellValue('AW3', 'Oleh Pejabat');
                $sheet->setCellValue('AW'.$no, ' '.$d['oleh_pejabat_kgb']);
                
                $sheet->mergeCells('AX3:AX4');
                $sheet->setCellValue('AX3', 'KGB Terakhir');
                $sheet->setCellValue('AX'.$no, ' '.$d['terakhir_kgb']);

                $sheet->mergeCells('AY3:AZ3');
                $sheet->setCellValue('AY3', '');
                $sheet->setCellValue('AY4', 'Tahun');
                $sheet->setCellValue('AY'.$no, ' '.$d['thn_kgb']);
                $sheet->setCellValue('AZ4', 'Bulan');
                $sheet->setCellValue('AZ'.$no, ' '.$d['bln_kgb']);

                $sheet->mergeCells('BA3:BA4');
                $sheet->setCellValue('BA3', 'KGB Berikutnya');
                $sheet->setCellValue('BA'.$no, ' '.$d['berikutnya_kgb']);

                // Struktur
                $sheet->mergeCells('BB2:BC2');
                $sheet->setCellValue('BB2', 'Struktur');        
                
                $sheet->mergeCells('BB3:BC3');
                $sheet->setCellValue('BB3', 'Jab Struktur');
                $sheet->setCellValue('BB4', 'Nama Jabatan');
                $sheet->setCellValue('BB'.$no, ' '.$d['nama_jabatan_struktur']);
                $sheet->setCellValue('BC4', 'TMT');
                $sheet->setCellValue('BC'.$no, ' '.$d['tmt_jab_struktural']);      

                // Impassing
                $sheet->mergeCells('BD2:BK2');
                $sheet->setCellValue('BD2', 'Impassing');

                $sheet->mergeCells('BD3:BD4');
                $sheet->setCellValue('BD3', 'Nomor SK Impassing');
                $sheet->setCellValue('BD'.$no, ' '.$d['no_sk_impassing']);

                $sheet->mergeCells('BE3:BE4');
                $sheet->setCellValue('BE3', 'Tanggal SK Impassing');
                $sheet->setCellValue('BE'.$no, ' '.$d['tgl_sk_impassing']);

                $sheet->mergeCells('BF3:BF4');
                $sheet->setCellValue('BF3', 'Oleh Pejabat');
                $sheet->setCellValue('BF'.$no, ' '.$d['oleh_pejabat_impassing']);

                $sheet->mergeCells('BG3:BG4');
                $sheet->setCellValue('BG3', 'TMT Impassing');
                $sheet->setCellValue('BG'.$no, ' '.$d['tmt_impassing']);

                $sheet->mergeCells('BH3:BI3');
                $sheet->setCellValue('BH3', 'MKG');
                $sheet->setCellValue('BH4', 'Tahun');
                $sheet->setCellValue('BH'.$no, ' '.$d['mkg_thn_impassing']);
                $sheet->setCellValue('BI4', 'Bulan');
                $sheet->setCellValue('BI'.$no, ' '.$d['mkg_bln_impassing']);

                $sheet->mergeCells('BJ3:BK3');
                $sheet->setCellValue('BJ3', 'MKG Berikutnya');
                $sheet->setCellValue('BJ4', 'Tahun');
                $sheet->setCellValue('BJ'.$no, ' '.$d['thn_mkg_berikutnya_impassing']);
                $sheet->setCellValue('BK4', 'Bulan');
                $sheet->setCellValue('BK'.$no, ' '.$d['bln_mkg_berikutnya_impasssing']);      
                
                // Pangkat Akhir
                $sheet->mergeCells('BL2:BR2');
                $sheet->setCellValue('BL2', 'Pangkat Terakhir');

                $sheet->mergeCells('BL3:BL4');
                $sheet->setCellValue('BL3', 'Nomor SK Pangkat Terakhir');
                $sheet->setCellValue('BL'.$no, ' '.$d['no_sk_pangkat_terakhir']);

                $sheet->mergeCells('BM3:BM4');
                $sheet->setCellValue('BM3', 'Tanggal SK Pangkat Terakhir');
                $sheet->setCellValue('BM'.$no, ' '.$d['tgl_sk_pangkat_terakhir']);

                $sheet->mergeCells('BN3:BN4');
                $sheet->setCellValue('BN3', 'Oleh Pejabat');
                $sheet->setCellValue('BN'.$no, ' '.$d['oleh_pejabat_pangkat_terakhir']);

                $sheet->mergeCells('BO3:BO4');
                $sheet->setCellValue('BO3', 'Pangkat/Gol/Ruang');
                $sheet->setCellValue('BO'.$no, ' '.$d['pangkat_terakhir']);

                $sheet->mergeCells('BP3:BP4');
                $sheet->setCellValue('BP3', 'TMT Pangkat Terakhir');
                $sheet->setCellValue('BP'.$no, ' '.$d['tmt_pangkat_terakhir']);

                $sheet->mergeCells('BQ3:BQ4');
                $sheet->setCellValue('BQ3', 'THN');
                $sheet->setCellValue('BQ'.$no, ' '.$d['thn_pangkat_terakhir']);

                $sheet->mergeCells('BR3:BR4');
                $sheet->setCellValue('BR3', 'BLN');
                $sheet->setCellValue('BR'.$no, ' '.$d['bln_pangkat_terakhir']);

                // Gaji Pokok
                // ==================================== 

                // Fungsional;
                $sheet->mergeCells('BS2:BT2');
                $sheet->setCellValue('BS2', 'Fungsional');        
                
                $sheet->mergeCells('BS3:BT3');
                $sheet->setCellValue('BS3', 'Jab Fungsional');
                $sheet->setCellValue('BS4', 'Nama Jabatan');
                $sheet->setCellValue('BS'.$no, ' '.$d['nama_kategori_fung']);
                $sheet->setCellValue('BT4', 'TMT');
                $sheet->setCellValue('BT'.$no, ' '.$d['tmt_jab_fungsional']);      

                // Tugas Tambahan;
                $sheet->mergeCells('BU2:CA2');
                $sheet->setCellValue('BU2', 'Tugas Tambahan Dosen'); 

                $sheet->mergeCells('BU3:BV3');
                $sheet->setCellValue('BU3', 'Klasifikasi Jabatan');
                $sheet->setCellValue('BU4', '');
                $sheet->setCellValue('BU'.$no, ' '.$d['klasifikasi_jbt']);
                $sheet->setCellValue('BV4', '');
                $sheet->setCellValue('BV'.$no, 0);   

                $sheet->mergeCells('BW3:BW4');
                $sheet->setCellValue('BW3', 'Tugas Tambahan');
                $sheet->setCellValue('BW'.$no, ' '.$d['nama_kategori_tugastambahan']);

                $sheet->mergeCells('BX3:BX4');
                $sheet->setCellValue('BX3', 'Nomor SK');
                $sheet->setCellValue('BX'.$no, ' '.$d['nomor_sk']);

                $sheet->mergeCells('BY3:BY4');
                $sheet->setCellValue('BY3', 'TMT');
                $sheet->setCellValue('BY'.$no, ' '.$d['tmt_jab']);

                $sheet->mergeCells('BZ3:BZ4');
                $sheet->setCellValue('BZ3', 'MK JAB THN');
                $sheet->setCellValue('BZ'.$no, ' '.$d['thn_mk_jabatan']);

                $sheet->mergeCells('CA3:CA4');
                $sheet->setCellValue('CA3', 'MK JAB BLN');
                $sheet->setCellValue('CA'.$no, ' '.$d['bln_mk_jabatan']);

                // Unit Kerja
                $sheet->mergeCells('CB2:CE2');
                $sheet->setCellValue('CB2', 'Unit Kerja');

                $sheet->mergeCells('CB3:CB4');
                $sheet->setCellValue('CB3', 'Program Studi');
                $sheet->setCellValue('CB'.$no, ' '. $d['program_studi_uker']);

                $sheet->mergeCells('CC3:CC4');
                $sheet->setCellValue('CC3', 'Unit Kerja Sesuai Homebase');
                $sheet->setCellValue('CC'.$no, ' '.$d['homebase_uker']);
                
                $sheet->mergeCells('CD3:CE3');
                $sheet->setCellValue('CD3', 'Fakultas');
                $sheet->setCellValue('CD4', 'Full');
                $sheet->setCellValue('CD'.$no, ' '.$d['full_fakultas_uker']);
                $sheet->setCellValue('CE4', 'Singk.');
                $sheet->setCellValue('CE'.$no, ' '.$d['singkat_fakultas_uker']);  

                // Pendidikan Terakhir
                $sheet->mergeCells('CF2:CI2');
                $sheet->setCellValue('CF2', 'Pendidikan Terakhir');

                $sheet->mergeCells('CF3:CF4');
                $sheet->setCellValue('CF3', 'Bidang Ilmu');
                $sheet->setCellValue('CF'.$no, ' '. $d['bidang_ilmu_peter']);
                
                $sheet->mergeCells('CG3:CG4');
                $sheet->setCellValue('CG3', 'Strata');
                $sheet->setCellValue('CG'.$no, ' '. $d['strata_peter']);

                $sheet->mergeCells('CH3:CH4');
                $sheet->setCellValue('CH3', 'Tahun Lulus');
                $sheet->setCellValue('CH'.$no, ' '. $d['thn_lulus_peter']);

                $sheet->mergeCells('CI3:CI4');
                $sheet->setCellValue('CI3', 'Universitas');
                $sheet->setCellValue('CI'.$no, ' '. $d['univ_peter']);

                // Diklat Pelatihan
                $sheet->mergeCells('CJ2:CM2');
                $sheet->setCellValue('CJ2', 'Diklat Pelatihan');

                $sheet->mergeCells('CJ3:CJ4');
                $sheet->setCellValue('CJ3', 'Latihan Jabatan');
                $sheet->setCellValue('CJ'.$no, ' '. $d['latihan_jabatan_diklat']);
                
                $sheet->mergeCells('CK3:CK4');
                $sheet->setCellValue('CK3', 'Bln & Thn');
                $sheet->setCellValue('CK'.$no, ' '.$ez[0].'-'.$ez[1]);

                $sheet->mergeCells('CL3:CL4');
                $sheet->setCellValue('CL3', 'Hari');
                $sheet->setCellValue('CL'.$no, ' '. $ez[2]);

                $sheet->mergeCells('CM3:CM4');
                $sheet->setCellValue('CM3', 'Jam');
                $sheet->setCellValue('CM'.$no, ' '. $ex[1]);

                // Identitas Keluagra
                $sheet->mergeCells('CN2:DD2');
                $sheet->setCellValue('CN2', 'Identitas Keluarga');

                $sheet->mergeCells('CN3:CN4');
                $sheet->setCellValue('CN3', 'Nama Istri / Suami');
                $sheet->setCellValue('CN'.$no, ' '.$d['nama_istri_suami_kel']);

                $sheet->mergeCells('CO3:CO4');
                $sheet->setCellValue('CO3', 'Tgl Nikah');
                $sheet->setCellValue('CO'.$no, ' '.$d['tgl_nikah_kel']);

                $child = array();
                
                $rchild = $this->m_pegawai->get_all_child($d['id_keluarga'])->result_array();

                for($i = 0; $i < 3; $i++){
                    if(isset($rchild[$i])){
                        array_push($child, $rchild[$i]);
                    }
                    else {
                        array_push($child, array('nama_anak' => '', 'tgl_lahir_anak' => '', 'thn_usia_anak' => 0, 'bln_usia_anak' => 0, 'jk_anak' => 0));
                    }
                }

                $sheet->mergeCells('CP3:CT3');
                $sheet->setCellValue('CP3', 'Anak Kedua');
                $sheet->setCellValue('CP4', 'Nama Anak');
                $sheet->setCellValue('CP'.$no, ' '.$child[0]['nama_anak']);
                $sheet->setCellValue('CQ4', 'Tgl Lhr Anak.');
                $sheet->setCellValue('CQ'.$no, ' '.$child[0]['tgl_lahir_anak']);
                $sheet->setCellValue('CR4', 'Usia Thn');
                $sheet->setCellValue('CR'.$no, ' '.$child[0]['thn_usia_anak']);
                $sheet->setCellValue('CS4', 'Usia Bln');
                $sheet->setCellValue('CS'.$no, ' '.$child[0]['bln_usia_anak']);
                $sheet->setCellValue('CT4', 'JK');
                $sheet->setCellValue('CT'.$no, ' '.$child[0]['jk_anak']);

                $sheet->mergeCells('CU3:CY3');
                $sheet->setCellValue('CU3', 'Anak Kedua');
                $sheet->setCellValue('CU4', 'Nama Anak');
                $sheet->setCellValue('CU'.$no, ' '.$child[1]['nama_anak']);
                $sheet->setCellValue('CV4', 'Tgl Lhr Anak.');
                $sheet->setCellValue('CV'.$no, ' '.$child[1]['tgl_lahir_anak']);
                $sheet->setCellValue('CW4', 'Usia Thn');
                $sheet->setCellValue('CW'.$no, ' '.$child[1]['thn_usia_anak']);
                $sheet->setCellValue('CX4', 'Usia Bln');
                $sheet->setCellValue('CX'.$no, ' '.$child[1]['bln_usia_anak']);
                $sheet->setCellValue('CY4', 'JK');
                $sheet->setCellValue('CY'.$no, ' '.$child[1]['jk_anak']);

                $sheet->mergeCells('CZ3:DD3');
                $sheet->setCellValue('CZ3', 'Anak Ketiga');
                $sheet->setCellValue('CZ4', 'Nama Anak');
                $sheet->setCellValue('CZ'.$no, ' '.$child[2]['nama_anak']);
                $sheet->setCellValue('DA4', 'Tgl Lhr Anak.');
                $sheet->setCellValue('DA'.$no, ' '.$child[2]['tgl_lahir_anak']);
                $sheet->setCellValue('DB4', 'Usia Thn');
                $sheet->setCellValue('DB'.$no, ' '.$child[2]['thn_usia_anak']);
                $sheet->setCellValue('DC4', 'Usia Bln');
                $sheet->setCellValue('DC'.$no, ' '.$child[2]['bln_usia_anak']);
                $sheet->setCellValue('DD4', 'JK');
                $sheet->setCellValue('DD'.$no, ' '.$child[2]['jk_anak']);

                $sheet->mergeCells('DE3:DE4');
                $sheet->setCellValue('DE3', 'Alamat');
                $sheet->setCellValue('DE'.$no, ' '. $d['alamat_rumah_peg']);

                $sheet->mergeCells('DF3:DF4');
                $sheet->setCellValue('DF3', 'Kode Pos');
                $sheet->setCellValue('DF'.$no, ' '. $d['kode_pos_peg']);

                $sheet->mergeCells('DG3:DG4');
                $sheet->setCellValue('DG3', 'Telp Kantor');
                $sheet->setCellValue('DG'.$no, ' '. $d['tlp_kantor_peg']);

                $sheet->mergeCells('DH3:DH4');
                $sheet->setCellValue('DH3', 'Fax');
                $sheet->setCellValue('DH'.$no, ' '. $d['fax_kntr_peg']);

                $sheet->mergeCells('DI3:DI4');
                $sheet->setCellValue('DI3', 'Telp Rumah');
                $sheet->setCellValue('DI'.$no, ' '. $d['tlp_rumah_peg']);

                $sheet->mergeCells('DJ3:DJ4');
                $sheet->setCellValue('DJ3', 'Nomor HP');
                $sheet->setCellValue('DJ'.$no, ' '. $d['hp_peg']);

                $sheet->mergeCells('DK3:DK4');
                $sheet->setCellValue('DK3', 'Email');
                $sheet->setCellValue('DK'.$no, ' '. $d['email_peg']);

                $sheet->mergeCells('DL3:DL4');
                $sheet->setCellValue('DL3', 'Tanggal Meninggal Dunia');
                $sheet->setCellValue('DL'.$no, ' '. $d['tgl_meninggal_dunia_peg']);
            }

            $writer = new Xlsx($spreadsheet);
 
            $filename = "List Data Induk Kepegawaian Fakultas Ilmu Sosial Dan Ilmu Politik";
 
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
            header('Cache-Control: max-age=0');
 
            $writer->save('php://output');
        }

        public function print_excel_jab($id)
        {
             // Data
             $data = $this->m_pegawai->get_all_jab($id)->result_array();

             // Export
             $spreadsheet = new Spreadsheet();
             $sheet = $spreadsheet->getActiveSheet();
 
             $no = 6;
 
             foreach(range('A','G') as $col){
                 $sheet->getStyle($col)->applyFromArray($this->config_excel());
                 $spreadsheet->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
             }
 
             $sheet->mergeCells('A1:G1');
             $sheet->getStyle('A1')->applyFromArray($this->config_excel());
             $sheet->setCellValue('A1', 'List Jabatan Pegawai');
             
            // foreach($data as $d){
            //     echo $d['nama_kategori_fung'];
            // }

             foreach($data as $d){
                $no++;// print_r($col[$no - 3]);
                $nama = $d['nama_tanpa_gelar_peg'];

                $sheet->setCellValue('B3', 'Nama Pegawai');
                $sheet->setCellValue('C3', $d['nama_tanpa_gelar_peg']);

                $sheet->setCellValue('B4', 'Nip Pegawai');
                $sheet->setCellValue('C4', ' '.$d['nip_peg']);
                
                $sheet->setCellValue('A6', 'No.');
                $sheet->setCellValue('A'.$no, $no - 6);

                $sheet->setCellValue('B6', 'Jabatan Fungsional');
                $sheet->setCellValue('B'.$no, $d['nama_kategori_fung']);

                $sheet->setCellValue('C6', 'TMT Jabatan Fungsional');
                $sheet->setCellValue('C'.$no, $d['tmt_jab_fungsional']);

                $sheet->setCellValue('D6', 'Jabatan Struktural');
                $sheet->setCellValue('D'.$no, $d['nama_jabatan_struktur']);

                $sheet->setCellValue('E6', 'TMT Jabatan Struktural');
                $sheet->setCellValue('E'.$no, $d['tmt_jab_struktural']);
             }
 
             $writer = new Xlsx($spreadsheet);
 
             $filename = "List Jabatan Pegawai".$nama;
 
             header('Content-Type: application/vnd.ms-excel');
             header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
             header('Cache-Control: max-age=0');
 
             $writer->save('php://output');
        }

        // ================================================= Ajuan Kenaikan Pangkat =======================================
        public function print_excel_fungsional_nonsk()
        {
            // Data
            $data = $this->m_pegawai->get_aju_fung(1)->result_array();

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
            $sheet->setCellValue('A1', 'List Nama dan Pengajuan Kenaikan Pangkat, Pegawai Yang Siap Dibawa Ke Rektorat');
            
            foreach($data as $d){
                $panghir = $this->m_pegawai->get_jabatan_pegawai($d['id_pegawai'])->row_array();
                $no++;// print_r($col[$no - 3]);
                
                $sheet->setCellValue('A3', 'No.');
                $sheet->setCellValue('A'.$no, $no - 2);
                
                $sheet->setCellValue('B3', 'Nama Pegawai (Tanpa Gelar)');
                $sheet->setCellValue('B'.$no, $d['nama_tanpa_gelar_peg']);
                
                $sheet->setCellValue('C3', 'Nama Lengkap Pegawai');
                $sheet->setCellValue('C'.$no, $d['nama_lengkap_peg']);
                
                $sheet->setCellValue('D3', 'Nip Pegawai');
                $sheet->setCellValue('D'.$no, ' '.$d['nip_peg']);
                
                $sheet->setCellValue('E3', 'Pangkat Fungsional');
                $sheet->setCellValue('E'.$no, $panghir['nama_kategori_fung']);

                $sheet->setCellValue('F3', 'TMT Jabatan Fungsional');
                $sheet->setCellValue('F'.$no, $panghir['tmt_jab_fungsional']);

                $sheet->setCellValue('G3', 'Waktu Pengajuan');
                $sheet->setCellValue('G'.$no, $d['waktu_pengajuan_fungsional']);

                $sheet->setCellValue('H3', 'Keterangan');
                $sheet->setCellValue('H'.$no, $d['keterangan_pengajuan_fungsional']);

                $sheet->setCellValue('I3', 'Surat Keputusan');
                $sheet->setCellValue('I'.$no, $d['report_pengajuan_fungsional'] == null ? 'SK Belum Ada' : 'SK telah Ada');
            }

            $writer = new Xlsx($spreadsheet);

            $filename = "List Nama Dan Jabatan Fungsional Pegawai Non SK";

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        }

        public function print_excel_fungsional_all()
        {
            // Data
            $data = $this->m_pegawai->get_aju_fung(0)->result_array();

            // Export
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $no = 3;

            foreach(range('A','I') as $col){
                $sheet->getStyle($col)->applyFromArray($this->config_excel());
                $spreadsheet->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
            }

            $sheet->mergeCells('A1:I1');
            $sheet->getStyle('A1')->applyFromArray($this->config_excel());
            $sheet->setCellValue('A1', 'List Nama dan Pengajuan Kenaikan Pangkat, Pegawai Yang Siap Dibawa Ke Rektorat');
            
            foreach($data as $d){
                $panghir = $this->m_pegawai->get_jabatan_pegawai($d['id_pegawai'])->row_array();
                $no++;// print_r($col[$no - 3]);
                
                $sheet->setCellValue('A3', 'No.');
                $sheet->setCellValue('A'.$no, $no - 2);
                
                $sheet->setCellValue('B3', 'Nama Pegawai (Tanpa Gelar)');
                $sheet->setCellValue('B'.$no, $d['nama_tanpa_gelar_peg']);
                
                $sheet->setCellValue('C3', 'Nama Lengkap Pegawai');
                $sheet->setCellValue('C'.$no, $d['nama_lengkap_peg']);
                
                $sheet->setCellValue('D3', 'Nip Pegawai');
                $sheet->setCellValue('D'.$no, ' '.$d['nip_peg']);
                
                $sheet->setCellValue('E3', 'Pangkat Fungsional');
                $sheet->setCellValue('E'.$no, $panghir['nama_kategori_fung']);

                $sheet->setCellValue('F3', 'TMT Jabatan Fungsional');
                $sheet->setCellValue('F'.$no, $panghir['tmt_jab_fungsional']);

                $sheet->setCellValue('G3', 'Waktu Pengajuan');
                $sheet->setCellValue('G'.$no, $d['waktu_pengajuan_fungsional']);

                $sheet->setCellValue('H3', 'Keterangan');
                $sheet->setCellValue('H'.$no, $d['keterangan_pengajuan_fungsional']);

                $sheet->setCellValue('I3', 'Surat Keputusan');
                $sheet->setCellValue('I'.$no, $d['report_pengajuan_fungsional'] == null ? 'SK Belum Ada' : 'SK telah Ada');
            }

            $writer = new Xlsx($spreadsheet);

            $filename = "List Nama Dan Jabatan Fungsional Pegawai";

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        }

        public function print_excel_struktural_nonsk()
        {
            // Data
            $data = $this->m_pegawai->get_aju_struk(1)->result_array();

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
            $sheet->setCellValue('A1', 'List Nama dan Pengajuan Kenaikan Pangkat, Pegawai Yang Siap Dibawa Ke Rektorat');
            
            foreach($data as $d){
                $panghir = $this->m_pegawai->get_jabatan_pegawai($d['id_pegawai'])->row_array();
                $no++;// print_r($col[$no - 3]);
                
                $sheet->setCellValue('A3', 'No.');
                $sheet->setCellValue('A'.$no, $no - 2);
                
                $sheet->setCellValue('B3', 'Nama Pegawai (Tanpa Gelar)');
                $sheet->setCellValue('B'.$no, $d['nama_tanpa_gelar_peg']);
                
                $sheet->setCellValue('C3', 'Nama Lengkap Pegawai');
                $sheet->setCellValue('C'.$no, $d['nama_lengkap_peg']);
                
                $sheet->setCellValue('D3', 'Nip Pegawai');
                $sheet->setCellValue('D'.$no, ' '.$d['nip_peg']);
                
                $sheet->setCellValue('E3', 'Usulan Jabatan');
                $sheet->setCellValue('E'.$no, $d['nama_jabatan_struktur']);

                $sheet->setCellValue('F3', 'Pangkat Struktural');
                $sheet->setCellValue('F'.$no, $panghir['nama_jabatan_struktur']);

                $sheet->setCellValue('G3', 'TMT Pangkat');
                $sheet->setCellValue('G'.$no, $panghir['tmt_jab_struktural']);

                $sheet->setCellValue('H3', 'Waktu Pengajuan');
                $sheet->setCellValue('H'.$no, $d['waktu_pengajuan_struktural']);

                $sheet->setCellValue('I3', 'Keterangan');
                $sheet->setCellValue('I'.$no, $d['keterangan_pengajuan_struktural']);

                $sheet->setCellValue('J3', 'Surat Keputusan');
                $sheet->setCellValue('J'.$no, $d['report_pengajuan_struktural'] == null ? 'SK Belum Ada' : 'SK telah Ada');
            }

            $writer = new Xlsx($spreadsheet);

            $filename = "List Nama Pegawai Naik Pangkat Jabatan Struktural";

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        }

        public function print_excel_struktural_all()
        {
            // Data
            $data = $this->m_pegawai->get_aju_struk(0)->result_array();

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
            $sheet->setCellValue('A1', 'List Nama dan Pengajuan Kenaikan Pangkat, Pegawai Yang Siap Dibawa Ke Rektorat');
            
            foreach($data as $d){
                $panghir = $this->m_pegawai->get_jabatan_pegawai($d['id_pegawai'])->row_array();
                $no++;// print_r($col[$no - 3]);
                
                $sheet->setCellValue('A3', 'No.');
                $sheet->setCellValue('A'.$no, $no - 2);
                
                $sheet->setCellValue('B3', 'Nama Pegawai (Tanpa Gelar)');
                $sheet->setCellValue('B'.$no, $d['nama_tanpa_gelar_peg']);
                
                $sheet->setCellValue('C3', 'Nama Lengkap Pegawai');
                $sheet->setCellValue('C'.$no, $d['nama_lengkap_peg']);
                
                $sheet->setCellValue('D3', 'Nip Pegawai');
                $sheet->setCellValue('D'.$no, ' '.$d['nip_peg']);
                
                $sheet->setCellValue('E3', 'Usulan Jabatan');
                $sheet->setCellValue('E'.$no, $d['nama_jabatan_struktur']);

                $sheet->setCellValue('F3', 'Pangkat Struktural');
                $sheet->setCellValue('F'.$no, $panghir['nama_jabatan_struktur']);

                $sheet->setCellValue('G3', 'TMT Pangkat');
                $sheet->setCellValue('G'.$no, $panghir['tmt_jab_struktural']);

                $sheet->setCellValue('H3', 'Waktu Pengajuan');
                $sheet->setCellValue('H'.$no, $d['waktu_pengajuan_struktural']);

                $sheet->setCellValue('I3', 'Keterangan');
                $sheet->setCellValue('I'.$no, $d['keterangan_pengajuan_struktural']);

                $sheet->setCellValue('J3', 'Surat Keputusan');
                $sheet->setCellValue('J'.$no, $d['report_pengajuan_struktural'] == null ? 'SK Belum Ada' : 'SK telah Ada');
            }

            $writer = new Xlsx($spreadsheet);

            $filename = "List Nama Pegawai Naik Pangkat Jabatan Struktural";

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        }

        public function print_excel_ijazah_nonsk()
        {
            // Data
            $data = $this->m_pegawai->get_aju_ijazah(1)->result_array();

            // Export
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $no = 3;

            foreach(range('A','G') as $col){
                $sheet->getStyle($col)->applyFromArray($this->config_excel());
                $spreadsheet->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
            }

            $sheet->mergeCells('A1:G1');
            $sheet->getStyle('A1')->applyFromArray($this->config_excel());
            $sheet->setCellValue('A1', 'List Nama dan Pengajuan Kenaikan Pangkat, Pegawai Yang Siap Dibawa Ke Rektorat');
            
            foreach($data as $d){
                $no++;// print_r($col[$no - 3]);
                
                $sheet->setCellValue('A3', 'No.');
                $sheet->setCellValue('A'.$no, $no - 2);
                
                $sheet->setCellValue('B3', 'Nama Pegawai (Tanpa Gelar)');
                $sheet->setCellValue('B'.$no, $d['nama_tanpa_gelar_peg']);
                
                $sheet->setCellValue('C3', 'Nama Lengkap Pegawai');
                $sheet->setCellValue('C'.$no, $d['nama_lengkap_peg']);
                
                $sheet->setCellValue('D3', 'Nip Pegawai');
                $sheet->setCellValue('D'.$no, ' '.$d['nip_peg']);
                
                $sheet->setCellValue('E3', 'Waktu Pengajuan');
                $sheet->setCellValue('E'.$no, $d['waktu_pengajuan_ijazah']);

                $sheet->setCellValue('F3', 'Keterangan');
                $sheet->setCellValue('F'.$no, $d['keterangan_pengajuan_ijazah']);

                $sheet->setCellValue('G3', 'Surat Keputusan');
                $sheet->setCellValue('G'.$no, $d['report_pengajuan_ijazah'] == null ? 'SK Belum Ada' : 'SK telah Ada');
            }

            $writer = new Xlsx($spreadsheet);

            $filename = "List Nama Dan Penyesuaian Ijazah Pegawai ";

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        }

        public function print_excel_ijazah_all()
        {
            // Data
            $data = $this->m_pegawai->get_aju_ijazah(0)->result_array();

            // Export
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $no = 3;

            foreach(range('A','G') as $col){
                $sheet->getStyle($col)->applyFromArray($this->config_excel());
                $spreadsheet->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
            }

            $sheet->mergeCells('A1:G1');
            $sheet->getStyle('A1')->applyFromArray($this->config_excel());
            $sheet->setCellValue('A1', 'List Nama dan Pengajuan Kenaikan Pangkat, Pegawai Yang Siap Dibawa Ke Rektorat');
            
            foreach($data as $d){
                $no++;// print_r($col[$no - 3]);
                
                $sheet->setCellValue('A3', 'No.');
                $sheet->setCellValue('A'.$no, $no - 2);
                
                $sheet->setCellValue('B3', 'Nama Pegawai (Tanpa Gelar)');
                $sheet->setCellValue('B'.$no, $d['nama_tanpa_gelar_peg']);
                
                $sheet->setCellValue('C3', 'Nama Lengkap Pegawai');
                $sheet->setCellValue('C'.$no, $d['nama_lengkap_peg']);
                
                $sheet->setCellValue('D3', 'Nip Pegawai');
                $sheet->setCellValue('D'.$no, ' '.$d['nip_peg']);
                
                $sheet->setCellValue('E3', 'Waktu Pengajuan');
                $sheet->setCellValue('E'.$no, $d['waktu_pengajuan_ijazah']);

                $sheet->setCellValue('F3', 'Keterangan');
                $sheet->setCellValue('F'.$no, $d['keterangan_pengajuan_ijazah']);

                $sheet->setCellValue('G3', 'Surat Keputusan');
                $sheet->setCellValue('G'.$no, $d['report_pengajuan_ijazah'] == null ? 'SK Belum Ada' : 'SK telah Ada');
            }

            $writer = new Xlsx($spreadsheet);

            $filename = "List Nama Dan Penyesuaian Ijazah Pegawai ";

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        }

        public function print_excel_reguler_nonsk()
        {
            // Data
            $data = $this->m_pegawai->get_aju_reguler(1)->result_array();

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
            $sheet->setCellValue('A1', 'List Nama dan Pengajuan Kenaikan Pangkat, Pegawai Yang Siap Dibawa Ke Rektorat');
            
            foreach($data as $d){
                $panghir = $this->m_pegawai->get_panghir_pegawai($d['id_pegawai'])->row_array();

                $no++;// print_r($col[$no - 3]);
                
                $sheet->setCellValue('A3', 'No.');
                $sheet->setCellValue('A'.$no, $no - 2);
                
                $sheet->setCellValue('B3', 'Nama Pegawai (Tanpa Gelar)');
                $sheet->setCellValue('B'.$no, $d['nama_tanpa_gelar_peg']);
                
                $sheet->setCellValue('C3', 'Nama Lengkap Pegawai');
                $sheet->setCellValue('C'.$no, $d['nama_lengkap_peg']);
                
                $sheet->setCellValue('D3', 'Nip Pegawai');
                $sheet->setCellValue('D'.$no, ' '.$d['nip_peg']);
                
                $sheet->setCellValue('E3', 'Waktu Pengajuan');
                $sheet->setCellValue('E'.$no, $d['waktu_pengajuan_reguler']);

                $sheet->setCellValue('F3', 'Pangkat');
                $sheet->setCellValue('F'.$no, $panghir['pangkat_terakhir']);

                $sheet->setCellValue('G3', 'Keterangan');
                $sheet->setCellValue('G'.$no, $d['keterangan_pengajuan_reguler']);

                $sheet->setCellValue('H3', 'Surat Keputusan');
                $sheet->setCellValue('H'.$no, $d['report_pengajuan_reguler'] == null ? 'SK Belum Ada' : 'SK telah Ada');
            }

            $writer = new Xlsx($spreadsheet);

            $filename = "List Nama Dan Pangkat Golongan Pegawai";

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        }

        public function print_excel_reguler_all()
        {
            // Data
            $data = $this->m_pegawai->get_aju_reguler(0)->result_array();

            // Export
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $no = 3;

            foreach(range('A','G') as $col){
                $sheet->getStyle($col)->applyFromArray($this->config_excel());
                $spreadsheet->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
            }

            $sheet->mergeCells('A1:G1');
            $sheet->getStyle('A1')->applyFromArray($this->config_excel());
            $sheet->setCellValue('A1', 'List Nama dan Pengajuan Kenaikan Pangkat, Pegawai Yang Siap Dibawa Ke Rektorat');
            
            foreach($data as $d){
                $panghir = $this->m_pegawai->get_panghir_pegawai($d['id_pegawai'])->row_array();
                $no++;// print_r($col[$no - 3]);
                
                $sheet->setCellValue('A3', 'No.');
                $sheet->setCellValue('A'.$no, $no - 2);
                
                $sheet->setCellValue('B3', 'Nama Pegawai (Tanpa Gelar)');
                $sheet->setCellValue('B'.$no, $d['nama_tanpa_gelar_peg']);
                
                $sheet->setCellValue('C3', 'Nama Lengkap Pegawai');
                $sheet->setCellValue('C'.$no, $d['nama_lengkap_peg']);
                
                $sheet->setCellValue('D3', 'Nip Pegawai');
                $sheet->setCellValue('D'.$no, ' '.$d['nip_peg']);
                
                $sheet->setCellValue('E3', 'Waktu Pengajuan');
                $sheet->setCellValue('E'.$no, $d['waktu_pengajuan_reguler']);

                $sheet->setCellValue('F3', 'Pangkat');
                $sheet->setCellValue('F'.$no, $panghir['pangkat_terakhir']);

                $sheet->setCellValue('G3', 'Keterangan');
                $sheet->setCellValue('G'.$no, $d['keterangan_pengajuan_reguler']);

                $sheet->setCellValue('H3', 'Surat Keputusan');
                $sheet->setCellValue('H'.$no, $d['report_pengajuan_reguler'] == null ? 'SK Belum Ada' : 'SK telah Ada');
            }

            $writer = new Xlsx($spreadsheet);

            $filename = "List Nama Dan Pangkat Golongan Pegawai";

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        }

    }


        // =========================================

?>