<?php
class Mahasiswa_model extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tb_mahasiswa');
        // $this->db->select('*');
        // $this->db->from('tb_mahasiswa');
        // $this->db->join('tb_fakultas, tb_fakultas_id = tb_mahasiswa.fakultas');
        // $query = $this->db->get();
        // return $query;
    }

    public function input_data($data)
    {
        return $this->db->insert('tb_mahasiswa', $data);
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }
}
