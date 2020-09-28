<?php

    class M_alur extends CI_Model
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
        public function get_receiver($level, $now)
        {
            $this->db->select('al.*');
            $this->db->from('tbl_alur_berkas as al');
            $this->db->where('level_sender', $level); 
            $this->db->where('level_now', $now); 
            return $this->db->get();
        }
    }

    ?>