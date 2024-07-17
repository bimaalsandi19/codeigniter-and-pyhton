<?php

class Customer_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all($id = false)
    {
        if ($id == true) {
            $this->db->select('tb_customer.*, project.project as project_name');
            $this->db->from('tb_customer');
            $this->db->join('project', 'tb_customer.id_project = project.id');
            $this->db->where('id_project', $id);
            $query = $this->db->get();
            return $query->result();
        } else {
            return $this->db->get('tb_customer')->result();
        }
    }

    public function get_project($id)
    {
        $this->db->select('tb_customer.*, project.project as project_name');
        $this->db->from('tb_customer');
        $this->db->join('project', 'tb_customer.id_project = project.id');
        $this->db->limit(1);
        $this->db->where('id_project', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_by_id($id)
    {
        $query = $this->db->get_where('tb_customer', array('id' => $id));
        return $query->row_array();
    }

    public function upload()
    {
        $config['upload_path'] = './uploads/'; // Lokasi penyimpanan file
        $config['allowed_types'] = 'xls|xlsx'; // Tipe file yang diizinkan
        $config['max_size'] = 2048; // Ukuran maksimum file (dalam kilobita)

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            $data = $this->upload->data();
            // Lakukan sesuatu dengan data file yang diunggah, seperti menyimpannya ke database atau melakukan proses lainnya
            return $data['file_name'];
        } else {
            return $this->upload->display_errors();
        }
    }
}
