<?php
    class M_desa extends CI_Model
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
        public function get_all_kecamatan()
        {
            $this->db->select('*');
            $this->db->from('tbl_kecamatan');
            return $this->db->get();
        }

        public function get_kecamatan_byid($id)
        {
            $this->db->select('*');
            $this->db->from('tbl_kecamatan');
            $this->db->where('id', $id);
            return $this->db->get();   
        }

        public function get_all_desa()
        {
            $this->db->select('kc.kecamatan, ds.*');
            $this->db->from('tbl_kecamatan as kc');
            $this->db->join('tbl_desa as ds', 'ds.id_camat = kc.id');

            return $this->db->get();
        }

        public function get_desa_byid($id)
        {
            $this->db->select('kc.kecamatan, ds.*');
            $this->db->from('tbl_kecamatan as kc');
            $this->db->join('tbl_desa as ds', 'ds.id_camat = kc.id');

            $this->db->where('kc.id', $id);
            return $this->db->get();   
        }
    }
?>