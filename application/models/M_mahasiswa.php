<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mahasiswa extends CI_Model {

	function tampil_mahasiswa_by_id($id) {

        $this->db->where('id_mahasiswa', $id);
        $data = $this->db->get('tbl_data_mahasiswa'); 
        return $data->row_array();

        }

}

/* End of file M_mahasiswa.php */
/* Location: ./application/models/M_mahasiswa.php */