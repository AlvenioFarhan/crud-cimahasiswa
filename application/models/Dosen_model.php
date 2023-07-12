<?php
class Dosen_model extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tb_dosen');
    }

    public function input_data($data)
    {
        return $this->db->insert('tb_dosen', $data);
    }
}
