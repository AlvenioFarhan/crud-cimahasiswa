<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dosen_model');
    }

    public function index()
    {
        $data['dosen'] = $this->Dosen_model->tampil_data()->result();
        $data['title'] = 'Contoh Dosen';
        $data['view'] = 'pages/templates/menu/dosen';
        $data['script'] = 'pages/templates/menu/dosen_js';
        $this->load->view('pages/templates/index', $data);
    }
}
