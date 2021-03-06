<?php

    class M_pengajuan extends CI_Model
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
        public function get_aju_sender($id)
        {
            $this->db->select('rw.id_pengajuan, us.user_level');
            $this->db->from('tbl_riwayat_perjalanan as rw');
            $this->db->join('tbl_user as us', 'rw.id_user = us.id');
            $this->db->where('rw.id', $id);
            return $this->db->get();
        }

        public function get_kecamatan($id)
        {
            $this->db->select('cm.nama, cm.id');
            $this->db->from('tbl_desa as cm');
            $this->db->join('tbl_kecamatan as ds', 'ds.id = cm.id_camat');
            $this->db->where('cm.id_camat', $id);

            return $this->db->get();
        }

        public function get_pengajuan_all($check = false)
        {   
            $this->db->select('max(aw.id)');
            $this->db->from('tbl_riwayat_perjalanan as aw');
            $this->db->group_by('aw.id_pengajuan');
            $max = $this->db->get_compiled_select();

            // MainSelect
            $this->db->select('br.*, br.id as brid, lv.name as posisi_akhir, aw.nama_lengkap');

            $this->db->from('tbl_riwayat_perjalanan as rw');
            $this->db->join('tbl_pengajuan_berkas as br', 'rw.id_pengajuan = br.id');
            $this->db->join('tbl_user as us', 'us.id = rw.id_user');
            $this->db->join('tbl_user_level as lv', 'us.user_level = lv.id');
            $this->db->join('tbl_user as aw', 'aw.id = br.id_user');

            if($check == true){$this->db->where("br.permit", 1);};
            $this->db->where("rw.id IN($max)");
            $this->db->where("br.softdelete", 0);

            return $this->db->get();
        }

        public function get_pengajuan($id = null, $status="all")
        {   
            $this->db->select('max(aw.id)');
            $this->db->from('tbl_riwayat_perjalanan as aw');
            $this->db->group_by('aw.id_pengajuan');
            $max = $this->db->get_compiled_select();

            // MainSelect
            $this->db->select('br.*, lv.name as posisi_akhir, aw.nama_lengkap, rw.waktu as rwaktu, lv.id as id_akhir');

            $this->db->from('tbl_riwayat_perjalanan as rw');
            $this->db->join('tbl_pengajuan_berkas as br', 'rw.id_pengajuan = br.id');
            $this->db->join('tbl_user as us', 'us.id = rw.id_user');
            $this->db->join('tbl_user_level as lv', 'us.user_level = lv.id');
            $this->db->join('tbl_user as aw', 'aw.id = br.id_user');

            if($id != null){
                $this->db->where("rw.id IN($max) AND br.id_user = $id");
            }
            else {
                $this->db->where("rw.id IN($max)");
            }
            $this->db->where("br.softdelete", 0);
            switch( $status )
            {
                case "process":
                    $this->db->where( "lv.id !=", "7" );
                    break;
                case "done":
                    $this->db->where( "lv.id =", "7" );
                    break;
            }
            return $this->db->get();
        }

        public function get_riwayat($id = null)
        {
            $this->db->select('br.*, rw.id as rwid, rw.waktu as rwaktu, YEAR(rw.waktu) as tahun, rw.keterangan, lv.name as posisi_akhir, aw.nama_lengkap');
            $this->db->from('tbl_riwayat_perjalanan as rw');
            $this->db->join('tbl_pengajuan_berkas as br', 'rw.id_pengajuan = br.id');
            $this->db->join('tbl_user as us', 'us.id = rw.id_user');
            $this->db->join('tbl_user_level as lv', 'us.user_level = lv.id');
            $this->db->join('tbl_user as aw', 'aw.id = br.id_user');

            if($id){
                $this->db->where('id_pengajuan', $id);
            }

            $this->db->where("br.softdelete", 0);
            $this->db->order_by('rw.id', 'ASC');
            return $this->db->get();
        }

        public function get_tinjauan($id, $place = null)
        {
             // MainSelect
            $this->db->select('br.*, rw.id as rwid, lv.name as posisi_akhir, aw.nama_lengkap, YEAR(rw.waktu) as tahun');

            $this->db->from('tbl_riwayat_perjalanan as rw');
            $this->db->join('tbl_pengajuan_berkas as br', 'rw.id_pengajuan = br.id');
            $this->db->join('tbl_user as us', 'us.id = rw.id_user');
            $this->db->join('tbl_user_level as lv', 'us.user_level = lv.id');
            $this->db->join('tbl_user as aw', 'aw.id = br.id_user');

            $this->db->where('next_user', $id);
            $this->db->where('status', 0);

            if($place){
                $this->db->where('us.user_level', $place);
            }

            return $this->db->get();
        }

        public function get_detail_tinjauan($id)
        {
            $this->db->select('br.*, cm.id_camat as desa, cm.nama, cm.id as idcmt');
            $this->db->from('tbl_pengajuan_berkas as br');
            $this->db->join('tbl_desa as cm', 'br.desa_kecamatan = cm.id');
            $this->db->where('br.id', $id);
            return $this->db->get();
        }

        public function get_detail_pdf($id)
        {
            $this->db->select('*, cm.nama as desa, cm.nama, cm.id as idcmt, jn.nama as jenis, hk.nama as hak');
            $this->db->from('tbl_pengajuan_berkas as br');
            $this->db->join('tbl_desa as cm', 'br.desa_kecamatan = cm.id');
            $this->db->join('tbl_kecamatan as d', 'cm.id_camat = d.id');
            $this->db->join('tbl_jenis_permohonan as jn', 'br.jenis_permohonan = jn.id');
            $this->db->join('tbl_hak_permohonan as hk', 'br.jenis_hak = hk.id');
            $this->db->where('br.id', $id);
            return $this->db->get();
        }

        public function _count($table)
        {
            $this->db->select('cn.id');
            $this->db->from($table.' as cn');
            $this->db->where('softdelete', 0);
            return $this->db->get();
        }

        public function _countbyid($table, $id)
        {
            $this->db->select('cn.id');
            $this->db->from($table.' as cn');
            $this->db->where('id_user', $id);
            $this->db->where('softdelete', 0);

            return $this->db->get();
        }

        public function count_pengajuan()
        {
            $this->db->select('max(aw.id)');
            $this->db->from('tbl_riwayat_perjalanan as aw');
            $this->db->group_by('aw.id_pengajuan');
            $max = $this->db->get_compiled_select();

            // MainSelect
            $this->db->select('br.id, lv.name, lv.id as lvid');

            $this->db->from('tbl_riwayat_perjalanan as rw');
            $this->db->join('tbl_pengajuan_berkas as br', 'rw.id_pengajuan = br.id');
            $this->db->join('tbl_user as us', 'us.id = rw.id_user');
            $this->db->join('tbl_user_level as lv', 'us.user_level = lv.id');
            $this->db->join('tbl_user as aw', 'aw.id = br.id_user');

            $this->db->where("rw.id IN($max)");

            $this->db->where("br.softdelete", 0);

            return $this->db->get();
        }

        public function get_recap($tahun)
        {
            $this->db->select('max(aw.id)');
            $this->db->from('tbl_riwayat_perjalanan as aw');
            $this->db->group_by('aw.id_pengajuan');
            $max = $this->db->get_compiled_select();

            // MainSelect
            $this->db->select(
                "
                sum(case when lv.id = 7 then 1 else 0 end) as Selesai,
                sum(case when lv.id != 7 then 1 else 0 end) as Proses, 
                count(rw.id) as Total, 
                date_format(br.waktu, '%M') as Bulan,
                month(br.waktu) as bln 
                "
            );

            $this->db->from('tbl_riwayat_perjalanan as rw');
            $this->db->join('tbl_pengajuan_berkas as br', 'rw.id_pengajuan = br.id');
            $this->db->join('tbl_user as us', 'us.id = rw.id_user');
            $this->db->join('tbl_user_level as lv', 'us.user_level = lv.id');
            $this->db->join('tbl_user as wa', 'wa.id = br.id_user');
            
            $this->db->where("rw.id IN($max)");
            $this->db->where("br.softdelete", 0);
            $this->db->where("year(br.waktu)", $tahun);
            
            $this->db->group_by('Bulan');
            $this->db->order_by('Bulan','DESC');

            return $this->db->get();
        }
        
    }

?>