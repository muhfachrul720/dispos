<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model{

    protected $table_name = 'tbl_pegawai as pgw';
    protected $table_pensiun = 'tbl_ajuan_pensiun';
    protected $table_jfungsi = 'tbl_jab_fungsional';

    // DUK
    public function json_duk(){
        $this->datatables->select('id_users, pgw.id_pegawai as id_peg, nama_tanpa_gelar_peg, status_kepegawaian_peg, tmt_pensiun_peg, gaji_pokok_peg, tgl_meninggal_dunia_peg');
        $this->datatables->from($this->table_name);
        $this->datatables->join('tbl_user', 'id_users = id_user');
        return $this->datatables->generate();
    }
    
    public function getinfo_pegawai_individual($where)
    {
        $this->db->where('id_user', $where);
        
        $this->db->join('tbl_user', 'id_users = id_user');
        $this->db->join('tbl_gelar as gelar', 'pgw.id_gelar = gelar.id_gelar');
        $this->db->join('tbl_cpns as cpns', 'pgw.id_cpns = cpns.id_cpns');
        $this->db->join('tbl_pmk as pmk', 'pgw.id_pmk = pmk.id_pmk');
        $this->db->join('tbl_kgb as kgb', 'pgw.id_kgb = kgb.id_kgb');
        $this->db->join('tbl_impassing as imp', 'pgw.id_impassing = imp.id_impassing');
        
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

    public function delete($table, $where)
    {
        $this->db->where($id);
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

    // ===============================================================================================================
    // Ajuan pensiun
    public function get_pensiun_status($where)
    {
        $this->db->select('ajuan_pensiun_status as status, ajuan_pensiun_keterangan as ket');
        $this->db->where('ajuan_pensiun_iduser', $where);
        $this->db->order_by('ajuan_pensiun_time', 'DESC');
        return $this->db->get($this->table_pensiun)->row();
    }

    public function json_pensiun_individual($where)
    {
        $this->datatables->select('ajuan_pensiun_iduser, ajuan_pensiun_status, ajuan_pensiun_keterangan, ajuan_pensiun_time');
        $this->datatables->from($this->table_pensiun);
        $this->datatables->where('ajuan_pensiun_iduser', $where);
        $this->datatables->add_column('action',anchor(site_url('user/update/$1'),'<i class="far fa-edit" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm'))." 
        ".anchor(site_url('user/delete/$1'),'<i class="far fa-trash-alt" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_users');
        return $this->datatables->generate();
    }

    public function json_verifpensi_netral()
    {
        $this->datatables->select('*');
        $this->datatables->where('ajuan_pensiun_status', '3');
        $this->datatables->from($this->table_pensiun);
        return $this->datatables->generate();
    }

    public function json_verifpensi_terima()
    {
        $this->datatables->select('*');
        $this->datatables->where('ajuan_pensiun_status', '1');
        $this->datatables->from($this->table_pensiun);
        return $this->datatables->generate();
    }
    
    public function json_verifpensi_tolak()
    {
        $this->datatables->select('*');
        $this->datatables->where('ajuan_pensiun_status', '2');
        $this->datatables->from($this->table_pensiun);
        return $this->datatables->generate();
    }
}
