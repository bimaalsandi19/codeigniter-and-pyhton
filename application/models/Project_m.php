<?php

class Project_m extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all($id = false)
    {

        if ($id == false) {
            $this->db->select('*');
            $this->db->from('project');
            $query = $this->db->get();
            return $query->result();
        }
    }
}
