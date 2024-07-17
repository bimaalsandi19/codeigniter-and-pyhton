<?php

class Project extends CI_Controller
{

    public $project_m;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('project_m');
        // $this->load->helper(['url', 'debug_helper']);
        // $this->load->database();
    }

    public function index()
    {

        $data = [
            'project' => $this->project_m->get_all()
        ];

        $this->load->view('project/index', $data);
    }
}
