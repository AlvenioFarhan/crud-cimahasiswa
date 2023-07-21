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
        $data['dosen'] = $this->Dosen_model->tampil_data();
        $data['title'] = 'Contoh Dosen';
        $data['view'] = 'pages/templates/menu/dosen';
        $data['script'] = 'pages/templates/menu/dosen_js';
        $this->load->view('pages/templates/index', $data);
    }

    public function tambah_aksi()
    {
        $return = new \stdClass;
        $data = array(
            'dsn_nama' => $this->input->post('nama'),
            'dsn_nim' => $this->input->post('nim'),
            'dsn_tgl_lahir' => $this->input->post('tgl_lahir'),
            'dsn_fakultas' => $this->input->post('fakultas'),
        );
        $status = $this->Dosen_model->input_data($data);
        if ($status) {
            $return->status = 1;
            $return->pesan = "Berhasil Menyimpan Data";
        } else {
            $return->status = 0;
            $return->pesan = "Gagal Menyimpan Data";
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($return));
    }

    public function delete()
    {
        $return = new stdClass();
        $return->status = 0;
        $return->message = '';
        $id = $this->input->post('dsn_id');
        if ($id > 0) {
            $where = array('dsn_id' => $id);
            $this->Dosen_model->delete_data($where, 'tb_dosen');
            $return->message = 'Berhasil menghapus';
        } else {
            $return->message = 'Id tidak ada';
        }

        // redirect('dosen');
        echo json_encode($return);
    }

    public function edit()
    {
        $id = $this->input->post('dsn_id');
        $data['dosen'] = $this->Dosen_model->edit_data($id);
        echo json_encode($data);
    }

    public function update()
    {
        $dsn_id = $this->input->post('dsn_id');
        $dsn_nama = $this->input->post('dsn_nama');
        $dsn_nim = $this->input->post('dsn_nim');
        $dsn_tgl_lahir = $this->input->post('dsn_tgl_lahir');
        $dsn_fakultas = $this->input->post('dsn_fakultas');
        // var_dump($this->input->post());
        $data = array(
            'dsn_nama'    => $dsn_nama,
            'dsn_nim'    => $dsn_nim,
            'dsn_tgl_lahir'    => $dsn_tgl_lahir,
            'dsn_fakultas'    => $dsn_fakultas
        );
        $where = array(
            'dsn_id' => $dsn_id
        );
        $this->Dosen_model->update_data($where, $data);
        // redirect('mahasiswa');
        echo json_encode('success');
    }

    function loadData()
    {
        $return = new \stdClass();
        $return->status = 0;
        $return->messages = 'Data Loaded';
        $columns = array(
            '0' => 'dsn_id',
            '1' => 'dsn_nama',
            '2' => 'dsn_nim',
            '3' => 'dsn_tgl_lahir',
            '4' => 'fakultas_name',
            '5' => 'dsn_id',
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
