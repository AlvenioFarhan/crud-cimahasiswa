<?php
class Mahasiswa_model extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tb_mahasiswa');
    }

    public function input_data($data)
    {
        return $this->db->insert('tb_mahasiswa', $data);
    }
}
