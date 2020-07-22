<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model{

    protected $table_name = 'tbl_info_pegawai';

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

    public function insert($data)
    {
        $this->db->insert($this->table_name, $data);
    }
}
