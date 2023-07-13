<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edit extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('Mahasiswa_model');
	}

    public function index()
    {
        $data['mahasiswa'] = $this->Mahasiswa_model->tampil_data()->result();
        $data['title'] = 'Edit';
        $data['view'] = 'pages/templates/menu/edit';
        $data['script'] = '';
        $this->load->view('pages/templates/menu/edit', $data);
    }
}
