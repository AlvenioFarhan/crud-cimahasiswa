<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mahasiswa_model');
	}

	public function index()
	{
		$data['mahasiswa'] = $this->Mahasiswa_model->tampil_data();
		$data['title'] = 'Contoh Mahasiswa';
		$data['view'] = 'pages/templates/menu/mahasiswa';
		$data['script'] = 'pages/templates/menu/mahasiswa_js';
		$this->load->view('pages/templates/index', $data);
	}

	public function tambah_aksi()
	{
		$return = new \stdClass;
		$data = array(
			'nama' => $this->input->post('nama'),
			'nim' => $this->input->post('nim'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'fakultas' => $this->input->post('fakultas'),
		);
		$status = $this->Mahasiswa_model->input_data($data);
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

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->Mahasiswa_model->delete_data($where, 'tb_mahasiswa');
		redirect('mahasiswa');
	}

	public function edit($id)
	{
		// $id = $this->input->post('id');
		// var_dump($id); die;
		// $where = array('id' => $id);
		$data['mahasiswa'] = $this->Mahasiswa_model->edit_data($id);
		$data['view'] = 'pages/templates/menu/edit';
		$this->load->view('pages/templates/index', $data);
	}

	public function update()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$nim = $this->input->post('nim');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$fakultas = $this->input->post('fakultas');
	$data = array (
		'nama'	=> $nama,
		'nim'	=> $nim,
		'tgl_lahir'	=> $tgl_lahir,
		'fakultas'	=> $fakultas
	);
	$where = array (
		'id' => $id
	);
	$this->Mahasiswa_model->update_data($where, $data);
	redirect('mahasiswa');
	}

}
