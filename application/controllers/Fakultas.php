<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fakultas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Fakultas_model');
    }

    public function index()
    {
        // $data['fakultas'] = $this->Fakultas_model->tampil_data();
        $data['title'] = 'Contoh Fakultas';
        $data['view'] = 'pages/templates/menu/fakultas';
        $data['script'] = 'pages/templates/menu/fakultas_js';
        $this->load->view('pages/templates/index', $data);
    }

    function loadData()
    {
        $return = new \stdClass();
        $return->status = 0;
        $return->messages = 'Data Loaded';
        $columns = array(
            '0' => 'fakultas_id',
            '1' => 'fakultas_name',
        );
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $search = [];
        if ($this->input->post('search')['value']) {
            $searchs = $this->input->post('search')['value'];
            foreach ($columns as $key => $value) {
                $search[$value] = $searchs;
            }
        }

        $params = array();
        $datas = $this->Dosen_model->get_all_dosen($params, $search, $limit, $start, $order, $dir);
        $totaldata = $this->Dosen_model->get_count_dosen($params, $search);
        $return->recordsTotal = $totaldata;
        $return->recordsFiltered = $totaldata;
        $return->data = $datas;
        $return->status = 1;
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($return));
    }
}
