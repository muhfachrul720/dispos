<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_akademik extends CI_Model{

    protected $table_jadwal = 'tbl_info_jadwal_kuliah as jadkul';
    protected $table_matkul = 'tbl_mata_kuliah as matkul';
    protected $table_pegawai = 'tbl_pegawai as pgw';

    public function __construct()
    {
        parent::__construct();
    }

    // ====================================== Basic Crud =========================

    public function update($table, $where, $data)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    public function delete($table, $where)
    {
        $this->db->where($where);
        return $this->db->delete($table);
    }

    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    // =================================== Jadwal Mengajar ===============================
    public function json_jadwal_mengajar_individual($id)
    {
        $this->datatables->select('jadkul.*, nama_lengkap_peg, semester_mata_kuliah, sks_mata_kuliah, nama_mata_kuliah');
        $this->datatables->from($this->table_jadwal);
        $this->datatables->join($this->table_pegawai, 'pgw.id_pegawai = jadkul.id_pegawai');
        $this->datatables->join($this->table_matkul, 'matkul.id_mata_kuliah = jadkul.id_mata_kuliah');
        $this->datatables->where('pgw.id_pegawai', $id);
        return $this->datatables->generate();
    }

    public function json_jadwal_mengajar()
    {
        $this->datatables->select('jadkul.*, nama_lengkap_peg, semester_mata_kuliah, sks_mata_kuliah, nama_mata_kuliah');
        $this->datatables->from($this->table_jadwal);
        $this->datatables->join($this->table_pegawai, 'pgw.id_pegawai = jadkul.id_pegawai');
        $this->datatables->join($this->table_matkul, 'matkul.id_mata_kuliah = jadkul.id_mata_kuliah');
        return $this->datatables->generate();
    }
    
    public function get_dosen()
    {
        $this->db->select('nama_lengkap_peg, id_pegawai');
        $this->db->where('id_jab_struktural', 12);
        return $this->db->get('tbl_pegawai');
    }
    
    public function get_jadkul_byid($id)
    {
        $this->db->select('id_jadwal_kuliah, nama_lengkap_peg, pgw.id_pegawai, matkul.id_mata_kuliah, hari_jadwal_kuliah, waktu_jadwal_kuliah');
        $this->db->from($this->table_jadwal);
        $this->db->join($this->table_pegawai, 'pgw.id_pegawai = jadkul.id_pegawai');
        $this->db->join($this->table_matkul, 'matkul.id_mata_kuliah = jadkul.id_mata_kuliah');
        $this->db->where('id_jadwal_kuliah', $id);

        return $this->db->get();
    }

    //  ====================================== Mata Kuliah =============================== 
    public function json_mata_kuliah()
    {
        $this->datatables->from($this->table_matkul);
        return $this->datatables->generate();
    }

    public function get_matkul_byid($where)
    {
        $this->db->where('id_mata_kuliah', $where);
        return $this->db->get($this->table_matkul);
    }

}

?>