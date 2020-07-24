<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model{

    protected $table_name = 'tbl_info_pegawai';
    protected $table_pensiun = 'tbl_ajuan_pensiun';

    public function getinfo_pegawai_individual($where)
    {
        $this->db->where('id_users', $where);
        $this->db->join('tbl_user', 'id_users = info_pegawai_iduser');
        return $this->db->get($this->table_name)->row();
    }

    public function get_userid($id)
    {
        $this->db->select('info_pegawai_iduser');
        $this->db->where('id', $id);
        return $this->db->get($this->table_name);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table_name, $data);
    }

    public function insert($data, $table = null)
    {
        if($table == null){
            return $this->db->insert($this->table_name, $data);
        }
        else {
            return $this->db->insert($table, $data);
        }
    }

    // Ajuan pensiun

    public function get_pensiun_status($where)
    {
        $this->db->select('ajuan_pensiun_status as status, ajuan_pensiun_keterangan as ket');
        $this->db->where('ajuan_pensiun_iduser', $where);
        $this->db->order_by('ajuan_pensiun_time', 'DESC');
        return $this->db->get($this->table_pensiun)->row();
    }

    public function json_pensiun_individual()
    {
        $this->datatables->select('ajuan_pensiun_iduser, ajuan_pensiun_status, ajuan_pensiun_keterangan, ajuan_pensiun_time');
        $this->datatables->from($this->table_pensiun);
        $this->datatables->add_column('action',anchor(site_url('user/update/$1'),'<i class="far fa-edit" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm'))." 
        ".anchor(site_url('user/delete/$1'),'<i class="far fa-trash-alt" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_users');
        return $this->datatables->generate();
    }
}
