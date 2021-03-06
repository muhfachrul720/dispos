<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model
{

    public $table = 'tbl_user';
    public $id = 'tbl_user.id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {

        $this->datatables->select('us.*, us.id as usid, lv.name as lvname');
        $this->datatables->from('tbl_user as us');

        $this->datatables->join('tbl_user_level as lv', 'lv.id = us.user_level');
        return $this->datatables->generate();

    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_users', $q);
    $this->db->or_like('username', $q);
    $this->db->or_like('email', $q);
    $this->db->or_like('password', $q);
    $this->db->or_like('nama_lembaga', $q);
    $this->db->or_like('images', $q);
    $this->db->or_like('id_user_level', $q);
    $this->db->or_like('is_aktif', $q);
    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_users', $q);
    $this->db->or_like('username', $q);
    $this->db->or_like('email', $q);
    $this->db->or_like('password', $q);
    $this->db->or_like('nama_lembaga', $q);
    $this->db->or_like('images', $q);
    $this->db->or_like('id_user_level', $q);
    $this->db->or_like('is_aktif', $q);
    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    // other
    public function get_peninjau($where)
    {
        $this->db->select('us.id as usid, us.username, lv.name as lvname');
        $this->db->from('tbl_user as us');
        $this->db->join('tbl_user_level as lv', 'us.user_level = lv.id');

        foreach($where as $key){
            $this->db->or_where($key);
        }
        
        $this->db->order_by('us.id', 'ASC');
        return $this->db->get();
    }

    public function _count($table)
    {
        $this->db->select('cn.id');
        $this->db->from($table.' as cn');
        return $this->db->get();
    }

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-04 06:32:22 */
/* http://harviacode.com */