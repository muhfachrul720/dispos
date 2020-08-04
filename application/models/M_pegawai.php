<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model{

    protected $table_name = 'tbl_pegawai as pgw';
    protected $table_pensiun = 'tbl_pengajuan_pensiun';
    protected $table_jfungsi = 'tbl_jab_fungsional';

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

    // ========================================== DUK Pegawai ========================================================
    public function json_duk(){
        $this->datatables->select('id_users, pgw.id_pegawai as id_peg, nama_tanpa_gelar_peg, status_kepegawaian_peg, tmt_pensiun_peg, gaji_pokok_peg, tgl_meninggal_dunia_peg');
        $this->datatables->from($this->table_name);
        $this->datatables->join('tbl_user', 'id_users = id_user');
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
        
        $this->db->join('tbl_pangkat_terakhir as pgkt', 'pgw.id_pangkat_terakhir = pgkt.id_pangkat_terakhir');
        $this->db->join('tbl_tgs_tambahan_dosen as tgstbh', 'pgw.id_tgs_tambahan_dosen = tgstbh.id_tgs_tambahan_dosen');
        $this->db->join('tbl_diklat_pelatihan as dklt', 'pgw.id_diklat = dklt.id_diklat');
        $this->db->join('tbl_keluarga as klg', 'pgw.id_keluarga = klg.id_keluarga');
        $this->db->join('tbl_pendidikan_terakhir as peter', 'pgw.id_peter = peter.id_peter');
        
        return $this->db->get($this->table_name)->row_array();
    }

    public function get_infopegawai_adminonly($where)
    {
        $this->db->select('id_user, nama_tanpa_gelar_peg, status_kepegawaian_peg, tmt_pensiun_peg, gaji_pokok_peg, tgl_meninggal_dunia_peg, id_pegawai');
        $this->db->where('id_pegawai', $where);
        return $this->db->get($this->table_name);
    }
    
    public function get_datapegandgelar($where)
    {
        $this->db->select('pgw.*, prof_gelar, depan_gelar, belakang_gelar, h_hj_gelar, gelar.id_gelar');
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
    
    public function json_jab_fungsi($id)
    {
        $this->datatables->where('id_pegawai', $id);
        $this->datatables->from($this->table_jfungsi);
        $this->datatables->join('tbl_kategori_jabatan_fung', 'id_kategori_jabatan_fung = nama_jab_fungsional');
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
        $this->db->select('nama_tanpa_gelar_peg, nip_peg, thn_masa_kerja_pensiun_peg, program_studi_uker');
        $this->db->from($this->table_name);
        $this->db->join('tbl_unit_kerja as uker', 'pgw.id_uker = uker.id_uker');
        $this->db->where('pgw.id_pegawai', $id);
        return $this->db->get()->row_array();
    }

    public function json_cuti_individual($where)
    {
        $this->datatables->select('id_pengajuan_cuti, status_cuti, waktu_pengajuan_cuti, keterangan_pengajuan_cuti, username');
        $this->datatables->from('tbl_pengajuan_cuti as cuti');
        $this->datatables->join('tbl_user as us', 'us.id_users = cuti.id_users');
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
        $this->db->select('cuti.*, nama_tanpa_gelar_peg, nip_peg, thn_masa_kerja_pensiun_peg, program_studi_uker');
        $this->db->from('tbl_pengajuan_cuti as cuti');
        $this->db->join($this->table_name, 'pgw.id_pegawai = cuti.id_pegawai');
        $this->db->join('tbl_unit_kerja as uker', 'pgw.id_uker = uker.id_uker');
        $this->db->where('id_pengajuan_cuti', $id);
        return $this->db->get()->row_array();
    }


    // =================================================== Pensiun ================================================

    public function json_pensiun_individual($where)
    {
        $this->datatables->select('id_pengajuan_pensiun, status_pengajuan, waktu_pengajuan_pensiun, keterangan_pengajuan_pensiun, username');
        $this->datatables->from($this->table_pensiun.' as psn');
        $this->datatables->join('tbl_user as us', 'us.id_users = psn.id_users');
        $this->datatables->where('psn.id_pegawai', $where);
        return $this->datatables->generate();   
    }
    
    public function json_pensiun_verifikasi()
    {
        $this->datatables->select('id_pengajuan_pensiun, nama_tanpa_gelar_peg, status_pengajuan, waktu_pengajuan_pensiun');
        $this->datatables->from($this->table_pensiun.' as psn');
        $this->datatables->join($this->table_name, 'pgw.id_pegawai = psn.id_pegawai');
        $this->datatables->where('status_pengajuan', null);
        $this->datatables->or_where('status_pengajuan', 3);
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

    public function get_berkas_pensi($id)
    {   
        $this->db->from('tbl_berkas_pensiun as bpensi');
        $this->db->join('tbl_pengajuan_pensiun as pensi', 'pensi.id_pengajuan_pensiun = bpensi.id_pengajuan_pensiun');
        $this->db->where('pensi.id_pengajuan_pensiun', $id);
        
        return $this->db->get();

    }
}
