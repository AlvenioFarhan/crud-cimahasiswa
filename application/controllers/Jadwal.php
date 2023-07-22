<?php
defined('BASEPATH') or exit('No direct Script access allowed');

class Jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jadwal_model');
    }

    public function index()
    {
        // $data['jadwal'] = $this->Jadwal_model->tampil_data();
        $data['title'] = 'Contoh Jadwal';
        $data['view'] = 'pages/templates/menu/jadwal';
        $data['script'] = 'pages/templates/menu/jadwal_js';
        $this->load->view('pages/templates/index', $data);
    }
}
