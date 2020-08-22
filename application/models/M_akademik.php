<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_akademik extends CI_Model{

    protected $table_jadwal = 'tbl_info_jadwal_kuliah as jadkul';
    protected $table_matkul = 'tbl_mata_kuliah as matkul';
    protected $table_pegawai = 'tbl_pegawai as pgw';
    protected $table_jurusan = 'tbl_jurusan as jrs';

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
        $this->datatables->select('jadkul.*, nama_lengkap_peg, semester_mata_kuliah, sks_mata_kuliah, nama_mata_kuliah, nama_jurusan');
        $this->datatables->from($this->table_jadwal);
        $this->datatables->join($this->table_pegawai, 'pgw.id_pegawai = jadkul.id_pegawai');
        $this->datatables->join($this->table_matkul, 'matkul.id_mata_kuliah = jadkul.id_mata_kuliah');
        $this->datatables->join($this->table_jurusan, 'matkul.id_jurusan = jrs.id_jurusan');
        $this->datatables->where('pgw.id_pegawai', $id);
        return $this->datatables->generate();
    }
    
    public function json_jadwal_mengajar($id)
    {
        $this->datatables->select('jadkul.*, nama_lengkap_peg, semester_mata_kuliah, sks_mata_kuliah, nama_mata_kuliah, nama_jurusan');
        $this->datatables->from($this->table_jadwal);
        $this->datatables->join($this->table_pegawai, 'pgw.id_pegawai = jadkul.id_pegawai');
        $this->datatables->join($this->table_matkul, 'matkul.id_mata_kuliah = jadkul.id_mata_kuliah');
        $this->datatables->join($this->table_jurusan, 'matkul.id_jurusan = jrs.id_jurusan');
        $this->datatables->where('matkul.id_jurusan', $id);
        
        return $this->datatables->generate();
    }
    
    public function get_dosen()
    {
        $this->db->select('nama_lengkap_peg, pgw.id_pegawai');
        $this->db->from('tbl_pegawai as pgw');

        $this->db->join('tbl_jabatan as jab', 'pgw.id_jabatan = jab.id_jab');
        $this->db->join('tbl_kategori_jabatan_struktur as struk', 'jab.id_kat_jab_struktural = struk.id_kat_jbt_struktur');

        $this->db->order_by('jab.id_jab', 'DESC');

        return $this->db->get();
    }
    
    public function get_jadkul_byid($id)
    {
        $this->db->select('id_jadwal_kuliah, nama_lengkap_peg, pgw.id_pegawai, matkul.id_mata_kuliah, hari_jadwal_kuliah, jam_masuk_kuliah, jam_keluar_kuliah');
        $this->db->from($this->table_jadwal);
        $this->db->join($this->table_pegawai, 'pgw.id_pegawai = jadkul.id_pegawai');
        $this->db->join($this->table_matkul, 'matkul.id_mata_kuliah = jadkul.id_mata_kuliah');  
        $this->db->where('id_jadwal_kuliah', $id);

        return $this->db->get();
    }

    //  ====================================== Mata Kuliah =============================== 
    public function json_mata_kuliah($id)
    {
        $this->datatables->select('id_mata_kuliah, nama_mata_kuliah, semester_mata_kuliah, sks_mata_kuliah');
        $this->datatables->from($this->table_matkul);
        $this->datatables->where('id_jurusan', $id);
        
        return $this->datatables->generate();
    }

    public function get_matkul_byid($where)
    {
        $this->db->select('matkul.*, jrs.nama_jurusan');
        $this->db->where('id_mata_kuliah', $where);
        $this->db->join($this->table_jurusan, 'jrs.id_jurusan = matkul.id_jurusan');
        return $this->db->get($this->table_matkul);
    }

    // =================================== Other =======================================
    public function get_jurusan($id)
    {
        $this->db->select('id_jurusan, nama_jurusan');
        $this->db->where('id_user', $id);
        return $this->db->get($this->table_jurusan);
    }

    public function get_matkul($id)
    {
        $this->db->select('id_mata_kuliah, nama_mata_kuliah');
        $this->db->where('id_jurusan', $id);
        return $this->db->get($this->table_matkul);
    }


}

?>

