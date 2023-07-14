<?php
class Mahasiswa_model extends CI_Model
{
    public function tampil_data()
    {
        $this->db->join('tb_fakultas', 'tb_fakultas.fakultas_id=tb_mahasiswa.fakultas', 'left');
        return $this->db->get('tb_mahasiswa')->result_array();
        // $this->db->select('*');
        // $this->db->from('tb_mahasiswa');
        // $this->db->join('tb_fakultas, tb_fakultas.fakultas_id = tb_mahasiswa.fakultas');
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
    public function edit_data($where)
    {
        $this->db->where('id', $where);
        return $this->db->get('tb_mahasiswa')->result_array();
    }

    public function update_data($where, $data)
    {
        $this->db->where($where);
        return $this->db->update('tb_mahasiswa',$data);
    }
}
