<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lembaga extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_lembaga');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/lembaga/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/lembaga/index/';
            $config['first_url'] = base_url() . 'index.php/lembaga/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->M_lembaga->total_rows($q);
        $lembaga = $this->M_lembaga->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'lembaga_data' => $lembaga,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','lembaga/tbl_lembaga_list', $data);
    }

    public function read($id) 
    {
        $row = $this->M_lembaga->get_by_id($id);
        if ($row) {
            $data = array(
		'id_lembaga' => $row->id_lembaga,
		'nama_lembaga' => $row->nama_lembaga,
		'keterangan' => $row->keterangan,
	    );
            $this->template->load('template','lembaga/tbl_lembaga_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lembaga'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('lembaga/create_action'),
	    'id_lembaga' => set_value('id_lembaga'),
	    'nama_lembaga' => set_value('nama_lembaga'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('template','lembaga/tbl_lembaga_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_lembaga' => $this->input->post('nama_lembaga',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->M_lembaga->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('lembaga'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_lembaga->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('lembaga/update_action'),
		'id_lembaga' => set_value('id_lembaga', $row->id_lembaga),
		'nama_lembaga' => set_value('nama_lembaga', $row->nama_lembaga),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('template','lembaga/tbl_lembaga_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lembaga'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_lembaga', TRUE));
        } else {
            $data = array(
		'nama_lembaga' => $this->input->post('nama_lembaga',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->M_lembaga->update($this->input->post('id_lembaga', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('lembaga'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_lembaga->get_by_id($id);

        if ($row) {
            $this->M_lembaga->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('lembaga'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lembaga'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_lembaga', 'nama lembaga', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_lembaga', 'id_lembaga', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_lembaga.xls";
        $judul = "tbl_lembaga";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Lembaga");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->M_lembaga->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_lembaga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Lembaga.php */
/* Location: ./application/controllers/Lembaga.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-25 23:20:44 */
/* http://harviacode.com */