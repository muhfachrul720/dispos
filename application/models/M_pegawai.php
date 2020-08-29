<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model{

    protected $table_name = 'tbl_pegawai as pgw';
    protected $table_pensiun = 'tbl_pengajuan_pensiun';
    protected $table_jfungsi = 'tbl_jabatan';

    // ================================================ Basic CRUD ======================================= 
    public function delete($table, $where)
    {
        $this->db->where($where);
        return $this->db->delete($table);
    }

    public function update($table, $where, $data)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    public function insert($data, $table = null)
    {
        if($table == null){
            return $this->db->insert($this->table_name, $data);
        }
        else {
            $this->db->insert($table, $data);
            return $this->db->insert_id();
        }
    }

    // ========================================= Dashboard =========================================================
    public function count_cuti()
    {
        $this->db->select('id_pengajuan_cuti');
        $this->db->where('status_cuti', null);
        return $this->db->get('tbl_pengajuan_cuti');
    }

    public function count_pensi()
    {
        $this->db->select('id_pengajuan_pensiun');
        $this->db->where('status_pengajuan', null);
        $this->db->or_where('status_pengajuan', 4);
        return $this->db->get('tbl_pengajuan_pensiun');
    }

    public function count_pegawai()
    {
        $this->db->select('id_pegawai');
        $this->db->where('status_kepegawaian_peg', null);
        $this->db->or_where('status_kepegawaian_peg', 'Tidak Aktif');
        return $this->db->get('tbl_pegawai');
    }

    public function count_fung()
    {
        $this->db->select('id_ajuan_fungsional');
        $this->db->where('status_pengajuan_fungsional', null);
        $this->db->or_where('status_pengajuan_fungsional', 4);
        return $this->db->get('tbl_aju_naikpangkat_fungsional');
    }

    public function count_struk()
    {
        $this->db->select('id_ajuan_struktural');
        $this->db->where('status_pengajuan_struktural', null);
        $this->db->or_where('status_pengajuan_struktural', 4);
        return $this->db->get('tbl_aju_naikpangkat_struktural');
    }

    public function count_ijazah()
    {
        $this->db->select('id_ajuan_ijazah');
        $this->db->where('status_pengajuan_ijazah', null);
        $this->db->or_where('status_pengajuan_ijazah', 4);
        return $this->db->get('tbl_aju_naikpangkat_ijazah');
    }
    
    // public function count_reguler()
    // {
    //     $this->db->select('id_ajuan_fungsional');
    //     $this->db->where('status_pengajuan', null);
    //     $this->db->or_where('status_pengajuan', 4);
    //     return $this->db->get('tbl_aju_naikpangkat_fungsional');
    // }


    // ========================================== Monitoring Pegawai ================================================
    public function json_ajuan_mon_pensiun()
    {
        $this->datatables->select('id_pengajuan_pensiun, nip_peg, nama_tanpa_gelar_peg, status_pengajuan, waktu_pengajuan_pensiun');
        $this->datatables->from($this->table_pensiun.' as psn');
        $this->datatables->join($this->table_name, 'pgw.id_pegawai = psn.id_pegawai');
        $this->datatables->where('status_pengajuan', 1);
        $this->datatables->or_where('status_pengajuan', 2);
        $this->datatables->or_where('status_pengajuan', 3);
        return $this->datatables->generate();
        // $this->datatables->where('', $where);
        return $this->datatables->generate();   
    }

    public function json_peg_pensiun($where)
    {
        // $this->datatables->select('id_pengajuan_cuti, nama_tanpa_gelar_peg, status_cuti, waktu_pengajuan_cuti, jenis_pengajuan_cuti');
        $this->datatables->from('tbl_pegawai as pgw');
        $this->datatables->where('notif_pensiun_peg <=', $where);
        return $this->datatables->generate();
    }

    public function json_report_pensiun()
    {
        $this->datatables->select('*, pgw.id_pegawai as idpgw');
        $this->datatables->from('tbl_pegawai as pgw');
        $this->datatables->join('tbl_pengajuan_pensiun as ajupns', 'pgw.id_pegawai = ajupns.id_pegawai');
        $this->datatables->where('ajupns.status_pengajuan', 1);
        return $this->datatables->generate();
    }

    public function json_mon_cuti($check = false)
    {
        $this->datatables->select('id_pengajuan_cuti, waktu_pengajuan_cuti, nama_tanpa_gelar_peg, status_cuti, report_pengajuan_cuti, jenis_pengajuan_cuti, nip_peg, tgl_cuti, jml_hari_cuti, jml_bln_cuti, jml_thn_cuti');
        $this->datatables->from('tbl_pengajuan_cuti as cuti');
        $this->datatables->join($this->table_name, 'pgw.id_pegawai = cuti.id_pegawai');
        $this->datatables->where('status_cuti', 1);
        if($check == true){$this->datatables->or_where('status_cuti', 2);}
        return $this->datatables->generate();
    }

    public function json_mon_naikpangkat($table, $column, $check = 0)
    {
        $this->datatables->select('this.*, nama_tanpa_gelar_peg, nip_peg');
        $this->datatables->from($table.' as this');
        $this->datatables->join('tbl_pegawai as pgw', 'pgw.id_pegawai = this.id_pegawai');
        $this->datatables->where('this.'.$column, 1);
        if($check == 0){
            $this->datatables->where('status_kenaikan_pangkat', 0);
        }
        return $this->datatables->generate();   
    }

    // ========================================== DUK Pegawai ========================================================
    public function json_duk(){
        $this->datatables->select('id_users, pgw.id_pegawai as id_peg, nama_tanpa_gelar_peg, status_kepegawaian_peg, tmt_pensiun_peg, gaji_pokok_peg, tgl_meninggal_dunia_peg');
        $this->datatables->from($this->table_name);
        $this->datatables->join('tbl_user', 'id_users = id_user');
        return $this->datatables->generate();
    }

    public function json_jab()
    {
        $this->datatables->select('pgw.id_pegawai as id_peg, nama_tanpa_gelar_peg, nip_peg, tmt_jab_fungsional, tmt_jab_struktural, nama_kategori_fung, nama_jabatan_struktur');
        $this->datatables->from($this->table_name);
        
        $this->datatables->join('tbl_jabatan as jab', 'pgw.id_jabatan = jab.id_jab');
        $this->datatables->join('tbl_kategori_jabatan_fung as fung', 'jab.id_kategori_jab_fungsional = fung.id_kategori_jabatan_fung');
        $this->datatables->join('tbl_kategori_jabatan_struktur as stru', 'jab.id_kat_jab_struktural = stru.id_kat_jbt_struktur');
        
        return $this->datatables->generate();
    }

    public function json_panghir()
    {
        $this->datatables->select('pgw.id_pegawai as id_peg, nama_tanpa_gelar_peg, nip_peg, panghir.*');
        $this->datatables->from('tbl_pangkat_terakhir as panghir');

        $this->datatables->join('tbl_pegawai as pgw', 'pgw.id_pangkat_terakhir = panghir.id_pangkat_terakhir');

        return $this->datatables->generate();
    }
    
    public function get_pegawai_individual($where)
    {
        $this->db->where('id_user', $where);
        
        $this->db->join('tbl_user', 'id_users = id_user');
        $this->db->join('tbl_gelar as gelar', 'pgw.id_gelar = gelar.id_gelar');
        $this->db->join('tbl_cpns as cpns', 'pgw.id_cpns = cpns.id_cpns');
        $this->db->join('tbl_pmk as pmk', 'pgw.id_pmk = pmk.id_pmk');
        $this->db->join('tbl_kgb as kgb', 'pgw.id_kgb = kgb.id_kgb');
        $this->db->join('tbl_impassing as imp', 'pgw.id_impassing = imp.id_impassing');
        $this->db->join('tbl_unit_kerja as uker', 'pgw.id_uker = uker.id_uker');
        $this->db->join('tbl_jabatan as jab', 'pgw.id_jabatan = jab.id_jab');
        $this->db->join('tbl_pangkat_terakhir as pgkt', 'pgw.id_pangkat_terakhir = pgkt.id_pangkat_terakhir');
        $this->db->join('tbl_tgs_tambahan_dosen as tgstbh', 'pgw.id_tgs_tambahan_dosen = tgstbh.id_tgs_tambahan_dosen');
        $this->db->join('tbl_diklat_pelatihan as dklt', 'pgw.id_diklat = dklt.id_diklat');
        $this->db->join('tbl_keluarga as klg', 'pgw.id_keluarga = klg.id_keluarga');
        $this->db->join('tbl_pendidikan_terakhir as peter', 'pgw.id_peter = peter.id_peter');
        
        return $this->db->get($this->table_name)->row_array();
    }

    public function get_infopegawai_adminonly($where)
    {
        $this->db->select('id_user, pgw.id_pegawai, id_jabatan, tmt_masuk_peg, nama_tanpa_gelar_peg, nip_peg, status_kepegawaian_peg, gaji_pokok_peg, tgl_meninggal_dunia_peg, pgw.id_pegawai, tmt_jab_fungsional, id_kategori_jab_fungsional, tmt_jab_struktural, id_kat_jab_struktural');
        $this->db->from($this->table_name);
        $this->db->join('tbl_jabatan as jab', 'pgw.id_pegawai = jab.id_pegawai');
        $this->db->where('pgw.id_pegawai', $where);
        $this->db->order_by('jab.id_jab', 'DESC');
        $this->db->limit('1');
        return $this->db->get();
    }
    
    public function get_datapegandgelar($where)
    {
        $this->db->select('pgw.*, prof_gelar, doktor_gelar, magister_gelar, strata_1_gelar, h_hj_gelar, gelar.id_gelar');
        $this->db->where('id_user', $where);
        $this->db->join('tbl_gelar as gelar', 'pgw.id_gelar = gelar.id_gelar');
        return $this->db->get($this->table_name)->row_array();
    }
    
    public function get_dataother($table, $where, $select = null)
    {
        if($select != null){
            $this->db->select($select);
        }

        $this->db->where('id_pegawai', $where);
        return $this->db->get($table)->row_array();
    }

    public function get_dataanak($where)
    {
        $this->db->where('id_kel', $where);
        return $this->db->get('tbl_anak')->result_array();
    }
    
    public function json_jabatan_byid($id)
    {
        $this->datatables->where('id_pegawai', $id);
        $this->datatables->from($this->table_jfungsi.' as jab');
        $this->datatables->join('tbl_kategori_jabatan_fung', 'id_kategori_jabatan_fung = jab.id_kategori_jab_fungsional');
        $this->datatables->join('tbl_kategori_jabatan_struktur', 'id_kat_jbt_struktur= jab.id_kat_jab_struktural');
        return $this->datatables->generate();
    }
    
    public function json_panghir_byid($id)
    {
        $this->datatables->where('id_pegawai', $id);
        $this->datatables->from('tbl_pangkat_terakhir as panghir');
        return $this->datatables->generate();
    }

    public function count_child($id)
    {
        $this->db->where('id_kel', $id);
        return $this->db->get('tbl_anak');
    }

    public function get_child($id)
    {
        $this->db->where('id_anak', $id);
        return $this->db->get('tbl_anak');
    }

    public function get_tmtpeg($id)
    {
        $this->db->select('tmt_pensiun_peg');
        $this->db->where('id_pegawai', $id);
        return $this->db->get($this->table_name)->row_array();
    }

    // =================================================== Cuti ==================================================
    public function get_datapeg_cuti($id)
    {
        $this->db->select('nama_kategori_fung, nama_jabatan_struktur, nama_tanpa_gelar_peg, nip_peg, thn_masa_kerja_pensiun_peg, program_studi_uker, id_kategori_jabatan_fung, id_kat_jbt_struktur, tmt_jab_fungsional, tmt_jab_struktural, tmt_pangkat_terakhir');
        $this->db->from($this->table_name);

        $this->db->join('tbl_unit_kerja as uker', 'pgw.id_uker = uker.id_uker');
        $this->db->join('tbl_jabatan as jab', 'pgw.id_jabatan = jab.id_jab');
        $this->db->join('tbl_kategori_jabatan_fung as fung', 'jab.id_kategori_jab_fungsional = fung.id_kategori_jabatan_fung');
        $this->db->join('tbl_kategori_jabatan_struktur as struk', 'jab.id_kat_jab_struktural = struk.id_kat_jbt_struktur');
        $this->db->join('tbl_pangkat_terakhir as panghir', 'pgw.id_pangkat_terakhir = panghir.id_pangkat_terakhir');
        
        $this->db->order_by('jab.id_jab', 'DESC');
        $this->db->limit(1);
        $this->db->where('pgw.id_pegawai', $id);

        return $this->db->get()->row_array();
    }

    public function json_cuti_individual($where)
    {
        $this->datatables->select('id_pengajuan_cuti, status_cuti, waktu_pengajuan_cuti, keterangan_pengajuan_cuti, username, report_pengajuan_cuti');
        $this->datatables->from('tbl_pengajuan_cuti as cuti');
        $this->datatables->join('tbl_user as us', 'us.id_users = cuti.id_users', 'LEFT');
        $this->datatables->where('cuti.id_pegawai', $where);
        return $this->datatables->generate();   
    }

    public function json_cuti_verifikasi()
    {
        $this->datatables->select('id_pengajuan_cuti, nama_tanpa_gelar_peg, status_cuti, waktu_pengajuan_cuti, jenis_pengajuan_cuti');
        $this->datatables->from('tbl_pengajuan_cuti as cuti');
        $this->datatables->join($this->table_name, 'pgw.id_pegawai = cuti.id_pegawai');
        $this->datatables->where('status_cuti', null);
        return $this->datatables->generate();
    }

    public function get_data_cuti_individual($id)
    {
        $this->db->select('cuti.*, nama_kategori_fung, nama_jabatan_struktur, nama_tanpa_gelar_peg, nip_peg, thn_masa_kerja_pensiun_peg, program_studi_uker');
        $this->db->from('tbl_pengajuan_cuti as cuti');

        $this->db->join($this->table_name, 'pgw.id_pegawai = cuti.id_pegawai');
        $this->db->join('tbl_unit_kerja as uker', 'pgw.id_uker = uker.id_uker');
        $this->db->join('tbl_jabatan as jab', 'pgw.id_jabatan = jab.id_jab');
        $this->db->join('tbl_kategori_jabatan_fung as fung', 'jab.id_kategori_jab_fungsional = fung.id_kategori_jabatan_fung');
        $this->db->join('tbl_kategori_jabatan_struktur as struk', 'jab.id_kat_jab_struktural = struk.id_kat_jbt_struktur');

        $this->db->order_by('jab.id_jab', 'DESC');
        $this->db->limit(1);


        $this->db->where('id_pengajuan_cuti', $id);
        return $this->db->get()->row_array();
    }


    // =================================================== Pensiun ================================================

    public function json_pensiun_individual($where)
    {
        $this->datatables->select('id_pengajuan_pensiun, status_pengajuan, waktu_pengajuan_pensiun, username, keterangan_pengajuan_pensiun, id_berkas_pengajuan_pensiun, laporan_pengajuan_pensiun');
        $this->datatables->from($this->table_pensiun.' as psn');
        $this->datatables->join('tbl_user as us', 'us.id_users = psn.id_users', 'LEFT');
        $this->datatables->where('psn.id_pegawai', $where);
        return $this->datatables->generate();   
    }
    
    public function json_pensiun_verifikasi()
    {
        $this->datatables->select('id_pengajuan_pensiun, nama_tanpa_gelar_peg, status_pengajuan, waktu_pengajuan_pensiun');
        $this->datatables->from($this->table_pensiun.' as psn');
        $this->datatables->join($this->table_name, 'pgw.id_pegawai = psn.id_pegawai');
        $this->datatables->where('status_pengajuan', null);
        $this->datatables->or_where('status_pengajuan', 4);
        return $this->datatables->generate();
    }

    public function get_ajuan_pensiun($where)
    {
        $this->db->select('psn.*, nama_tanpa_gelar_peg, nip_peg');
        $this->db->where('id_pengajuan_pensiun', $where);
        $this->db->from('tbl_pengajuan_pensiun as psn');
        $this->db->join($this->table_name, 'pgw.id_pegawai = psn.id_pegawai');
        return $this->db->get();
    }

    public function get_berkas_pensi($where)
    { 
        $this->db->select('brk.*');
        $this->db->from('tbl_pengajuan_pensiun as pns'); 
        $this->db->where('id_pengajuan_pensiun', $where); 
        $this->db->join('tbl_berkas_pengajuan_pensiun as brk', 'pns.id_berkas_pengajuan_pensiun = brk.id_berkas_pengajuan_pensiun');
        
        return $this->db->get();
    }

    // ====================================== Ajuan Naik Pangkat =================================
    public function json_ajuan_naikpangkat($where, $table, $column)
    {
        // $this->datatables->select('id_ajuan_fungsional, status_pengajuan_fungsional, waktu_pengajuan_fungsional, username, keterangan_pengajuan_fungsional, report_pengajuan_fungsional');
        $this->datatables->select('this.*, nama_tanpa_gelar_peg, nip_peg');
        $this->datatables->from($table);
        $this->datatables->join('tbl_pegawai as pgw', 'pgw.id_pegawai = this.id_pegawai');
        $this->datatables->where('this.'.$column, null);
        return $this->datatables->generate();   
        
    }

    public function get_ajuan_naikpangkat($table, $join, $where)
    {
        $this->db->select('berkas.*, aju.*, nama_tanpa_gelar_peg, nip_peg, thn_masa_kerja_pensiun_peg, program_studi_uker, pgw.id_pegawai');
        $this->db->from($table.' as aju');
        $this->db->join('tbl_pegawai as pgw', 'pgw.id_pegawai = aju.id_pegawai');
        $this->db->join($join.' as berkas', 'aju.id_berkas_ajuan = berkas.id_berkas');
        $this->db->join('tbl_unit_kerja as uker', 'pgw.id_uker = uker.id_uker');
        $this->db->where($where);
        return $this->db->get();
    }

    public function json_naikfung_pegawai($where)
    {
        $this->datatables->select('id_ajuan_fungsional, status_pengajuan_fungsional, waktu_pengajuan_fungsional, username, keterangan_pengajuan_fungsional, report_pengajuan_fungsional');
        $this->datatables->from('tbl_aju_naikpangkat_fungsional as fung');
        $this->datatables->join('tbl_user as us', 'us.id_users = fung.id_users', 'LEFT');
        $this->datatables->where('fung.id_pegawai', $where);
        return $this->datatables->generate();   
    }

    public function json_naikstruk_pegawai($where)
    {
        $this->datatables->select('id_ajuan_struktural, status_pengajuan_struktural, waktu_pengajuan_struktural, username, keterangan_pengajuan_struktural, report_pengajuan_struktural');
        $this->datatables->from('tbl_aju_naikpangkat_struktural as struk');
        $this->datatables->join('tbl_user as us', 'us.id_users = struk.id_users', 'LEFT');
        $this->datatables->where('struk.id_pegawai', $where);
        return $this->datatables->generate();   
    }

    public function json_naikijazah_pegawai($where)
    {
        $this->datatables->select('id_ajuan_ijazah, status_pengajuan_ijazah, waktu_pengajuan_ijazah, username, keterangan_pengajuan_ijazah, report_pengajuan_ijazah');
        $this->datatables->from('tbl_aju_naikpangkat_ijazah as ija');
        $this->datatables->join('tbl_user as us', 'us.id_users = ija.id_users', 'LEFT');
        $this->datatables->where('ija.id_pegawai', $where);
        return $this->datatables->generate();   
    }

    public function json_naikreguler_pegawai($where)
    {
        $this->datatables->select('id_ajuan_reguler, status_pengajuan_reguler, waktu_pengajuan_reguler, username, keterangan_pengajuan_reguler, report_pengajuan_reguler');
        $this->datatables->from('tbl_aju_naikpangkat_reguler as reg');
        $this->datatables->join('tbl_user as us', 'us.id_users = reg.id_users', 'LEFT');
        $this->datatables->where('reg.id_pegawai', $where);
        return $this->datatables->generate();   
    }
    

    // ====================================== Tambahan ==================================
    public function check_dosen($id)
    {
        $this->db->select('id_kat_jab_struktural as dosen');
        $this->db->from($this->table_name);
        $this->db->join('tbl_jabatan as jab', 'pgw.id_jabatan = jab.id_jab');
        $this->db->where('pgw.id_pegawai', $id);
        return $this->db->get();
    }

    public function get_sk_pensi($id)
    {
        $this->db->select('laporan_pengajuan_pensiun');
        $this->db->from('tbl_pengajuan_pensiun');
        $this->db->where('id_pegawai', $id);
        $this->db->order_by('id_pengajuan_pensiun','DESC');
        $this->db->limit('1');
        return $this->db->get();
    }

    public function get_idpegawai($table, $where)
    {
        $this->db->select('id_pegawai');
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get()->row_array();
    }

    public function get_jabatan_pegawai($where)
    {
        $this->db->select('pgw.nama_tanpa_gelar_peg, pgw.nip_peg, pgw.id_pegawai, id_jab, tmt_jab_fungsional, id_kategori_jab_fungsional, tmt_jab_struktural, id_kat_jab_struktural, fung.nama_kategori_fung, struk.nama_jabatan_struktur');
        $this->db->from('tbl_jabatan as jab');
        $this->db->join('tbl_pegawai as pgw', 'pgw.id_pegawai = jab.id_pegawai');

        // Change
        $this->db->join('tbl_kategori_jabatan_fung as fung', 'jab.id_kategori_jab_fungsional = fung.id_kategori_jabatan_fung');
        $this->db->join('tbl_kategori_jabatan_struktur as struk', 'jab.id_kat_jab_struktural = struk.id_kat_jbt_struktur');

        $this->db->where('pgw.id_pegawai', $where);
        $this->db->order_by('id_jab', 'DESC');
        $this->db->limit('1');

        return $this->db->get();
    }

    public function get_panghir_pegawai($where)
    {
        $this->db->select('pgw.nama_tanpa_gelar_peg, pgw.nip_peg, pgw.id_pegawai, reg.*');
        $this->db->from('tbl_pegawai as pgw');
        $this->db->join('tbl_pangkat_terakhir as reg', 'pgw.id_pangkat_terakhir = reg.id_pangkat_terakhir');
        $this->db->where('pgw.id_pegawai', $where);
        
        return $this->db->get();
    }

    // ======================= Data Excel =======================
    public function get_all_pegcuti($status = 0)
    {
        $this->db->select('cuti.*, pgw.nama_lengkap_peg, pgw.nama_tanpa_gelar_peg, pgw.nip_peg');
        $this->db->from('tbl_pengajuan_cuti as cuti');
        $this->db->join('tbl_pegawai as pgw', 'pgw.id_pegawai = cuti.id_pegawai');

        if($status == 1){
            $this->db->where('cuti.status_cuti', 1);
            $this->db->where('cuti.report_pengajuan_cuti');
        }

        $this->db->order_by('waktu_pengajuan_cuti', 'DESC');

        return $this->db->get();
    }

    public function get_all_pegpensi($status = 0)
    {
        $this->db->select('pensi.*, pgw.nama_lengkap_peg, pgw.nama_tanpa_gelar_peg, pgw.nip_peg, pgw.tmt_masuk_peg, pgw.tmt_pensiun_peg, nama_jabatan_struktur, nama_kategori_fung');
        $this->db->from('tbl_pengajuan_pensiun as pensi');
        $this->db->join('tbl_pegawai as pgw', 'pgw.id_pegawai = pensi.id_pegawai');
        $this->db->join('tbl_jabatan as jab', 'pgw.id_jabatan = jab.id_jab');
        $this->db->join('tbl_kategori_jabatan_fung as fung', 'jab.id_kategori_jab_fungsional = fung.id_kategori_jabatan_fung');
        $this->db->join('tbl_kategori_jabatan_struktur as struk', 'jab.id_kat_jab_struktural = struk.id_kat_jbt_struktur');

        if($status == 1){
            $this->db->where('pensi.status_pengajuan', 1);
            $this->db->where('pensi.laporan_pengajuan_pensiun');
        }

        $this->db->order_by('pensi.waktu_pengajuan_pensiun', 'DESC');

        return $this->db->get();
    }

    public function get_all_pegawai()
    {  
        $this->db->join('tbl_user', 'id_users = id_user');
        $this->db->join('tbl_gelar as gelar', 'pgw.id_gelar = gelar.id_gelar');
        $this->db->join('tbl_cpns as cpns', 'pgw.id_cpns = cpns.id_cpns');
        $this->db->join('tbl_pmk as pmk', 'pgw.id_pmk = pmk.id_pmk');
        $this->db->join('tbl_kgb as kgb', 'pgw.id_kgb = kgb.id_kgb');
        $this->db->join('tbl_impassing as imp', 'pgw.id_impassing = imp.id_impassing');
        $this->db->join('tbl_unit_kerja as uker', 'pgw.id_uker = uker.id_uker');
        $this->db->join('tbl_jabatan as jab', 'pgw.id_jabatan = jab.id_jab');

        $this->db->join('tbl_kategori_jabatan_fung as fung', 'jab.id_kategori_jab_fungsional = fung.id_kategori_jabatan_fung');
        $this->db->join('tbl_kategori_jabatan_struktur as struk', 'jab.id_kat_jab_struktural = struk.id_kat_jbt_struktur');
        
        $this->db->join('tbl_tgs_tambahan_dosen as tgstbh', 'pgw.id_tgs_tambahan_dosen = tgstbh.id_tgs_tambahan_dosen');
        $this->db->join('tbl_kategori_tugastambahan as kattug', 'tgstbh.tugas_tambahan = kattug.id_kategori_tugastambahan');

        $this->db->join('tbl_pangkat_terakhir as pgkt', 'pgw.id_pangkat_terakhir = pgkt.id_pangkat_terakhir');
        $this->db->join('tbl_diklat_pelatihan as dklt', 'pgw.id_diklat = dklt.id_diklat');
        $this->db->join('tbl_keluarga as klg', 'pgw.id_keluarga = klg.id_keluarga');
        $this->db->join('tbl_pendidikan_terakhir as peter', 'pgw.id_peter = peter.id_peter');
        
        return $this->db->get($this->table_name);
    }

    public function get_all_child($where)
    {
        $this->db->where('id_kel', $where);
        $this->db->limit(3);
        return $this->db->get('tbl_anak');  
    }

    public function get_all_jab($id)
    {
        $this->db->select('pgw.nama_tanpa_gelar_peg, pgw.nip_peg, tmt_jab_fungsional, tmt_jab_struktural, nama_kategori_fung, nama_jabatan_struktur');
        $this->db->from('tbl_jabatan as jab');

        $this->db->join('tbl_pegawai as pgw', 'pgw.id_pegawai = jab.id_pegawai');
        $this->db->join('tbl_kategori_jabatan_fung as fung', 'jab.id_kategori_jab_fungsional = fung.id_kategori_jabatan_fung');
        $this->db->join('tbl_kategori_jabatan_struktur as struk', 'jab.id_kat_jab_struktural = struk.id_kat_jbt_struktur');

        $this->db->where('jab.id_pegawai', $id);
        $this->db->order_by('jab.id_jab');

        return $this->db->get();
    }

    public function get_aju_fung($status = 0)
    {
        $this->db->select('fung.*, pgw.nama_lengkap_peg, pgw.nama_tanpa_gelar_peg, pgw.nip_peg');
        $this->db->from('tbl_aju_naikpangkat_fungsional as fung');
        $this->db->join('tbl_pegawai as pgw', 'pgw.id_pegawai = fung.id_pegawai');

        if($status == 1){
            $this->db->where('fung.status_pengajuan_fungsional', 1);
            $this->db->where('fung.report_pengajuan_fungsional', null);
        }

        $this->db->order_by('waktu_pengajuan_fungsional', 'DESC');

        return $this->db->get();
    }

    public function get_aju_struk($status = 0)
    {
        $this->db->select('struk.*, pgw.nama_lengkap_peg, pgw.nama_tanpa_gelar_peg, pgw.nip_peg, nama_jabatan_struktur');
        $this->db->from('tbl_aju_naikpangkat_struktural as struk');
        $this->db->join('tbl_pegawai as pgw', 'pgw.id_pegawai = struk.id_pegawai');
        $this->db->join('tbl_kategori_jabatan_struktur as kat', 'struk.usulan_jabatan_struktural = kat.id_kat_jbt_struktur');

        if($status == 1){
            $this->db->where('struk.status_pengajuan_struktural', 1);
            $this->db->where('struk.report_pengajuan_struktural', null);
        }

        $this->db->order_by('waktu_pengajuan_struktural', 'DESC');

        return $this->db->get();
    }

    public function get_aju_ijazah($status = 0)
    {
        $this->db->select('ijazah.*, pgw.nama_lengkap_peg, pgw.nama_tanpa_gelar_peg, pgw.nip_peg');
        $this->db->from('tbl_aju_naikpangkat_ijazah as ijazah');
        $this->db->join('tbl_pegawai as pgw', 'pgw.id_pegawai = ijazah.id_pegawai');

        if($status == 1){
            $this->db->where('ijazah.status_pengajuan_ijazah', 1);
            $this->db->where('ijazah.report_pengajuan_ijazah', null);
        }

        $this->db->order_by('waktu_pengajuan_ijazah', 'DESC');

        return $this->db->get();
    }

    public function get_aju_reguler($status = 0)
    {
        $this->db->select('reguler.*, pgw.nama_lengkap_peg, pgw.nama_tanpa_gelar_peg, pgw.nip_peg');
        $this->db->from('tbl_aju_naikpangkat_reguler as reguler');
        $this->db->join('tbl_pegawai as pgw', 'pgw.id_pegawai = reguler.id_pegawai');

        if($status == 1){
            $this->db->where('reguler.status_pengajuan_reguler', 1);
            $this->db->where('reguler.report_pengajuan_reguler', null);
        }

        $this->db->order_by('waktu_pengajuan_reguler', 'DESC');

        return $this->db->get();
    }

    // ======================== OTHER =================== 
    public function get_jab_usul($where)
    {
        $this->db->select('usulan_jabatan_struktural');
        $this->db->from('tbl_aju_naikpangkat_struktural');
        $this->db->where('id_ajuan_struktural', $where);
        
        return $this->db->get();
    }
}
