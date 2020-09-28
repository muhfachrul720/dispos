<?php
    class M_permohonan extends CI_Model
    {
        // Construct
        public function __construct()
        {
            parent::__construct();
        }

        // General
        public function insert($table, $data)
        {
            $this->db->insert($table, $data);
            return $this->db->insert_id();
        }

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

        // Get
        public function get_all_jenis()
        {
            $this->db->select('*');
            $this->db->from('tbl_jenis_permohonan');
            return $this->db->get();
        }

        public function get_jenis_byid($id)
        {
            $this->db->select('*');
            $this->db->from('tbl_jenis_permohonan');
            $this->db->where('id', $id);
            return $this->db->get();   
        }

        public function get_all_hak()
        {
            $this->db->select('*');
            $this->db->from('tbl_hak_permohonan');
            return $this->db->get();
        }

        public function get_hak_byid($id)
        {
            $this->db->select('*');
            $this->db->from('tbl_hak_permohonan');
            $this->db->where('id', $id);
            return $this->db->get();   
        }

    }
?>