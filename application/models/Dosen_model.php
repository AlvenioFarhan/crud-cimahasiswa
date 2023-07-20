<?php
class Dosen_model extends CI_Model
{
    public function tampil_data()
    {
        // $this->db->join('fakultas'. 'fakultas.fakultas_id=tb_dosen.fakultas', 'left');
        return $this->db->get('tb_dosen')->result_array();
    }

    function  get_all_dosen($params = null, $search = null, $limit = null, $start = null, $order = null, $dir = null)
    {
        $this->set_params($params);
        $this->set_search($search);
        $this->set_join();

        if ($order) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('user_name', "asc");
        }

        if ($limit) {
            $this->db->limit($limit, $start);
        }
        return $this->db->get('tb_mahasiswa')->result_array();
    }

    function get_count_dosen($params = null, $search = null)
    {
        $this->set_params($params);
        $this->set_search($search);
        $this->set_join();
        return $this->db->from('tb_dosen')->count_all_results();
    }

    function set_params($params)
    {
        if ($params) {
            foreach ($params as $key => $value) {
                $this->db->where($key, $value);
            }
        }
    }

    function set_search($search)
    {
        if ($search) {
            $n = 0;
            $this->db->group_start();
            foreach ($search as $key => $value) {
                if ($n == 0) {
                    $this->db->like($key, $value);
                } else {
                    $this->db->or_like($key, $value);
                }

                $n++;
            }
            $this->db->group_end();
        }
    }

    function set_join()
    {
        $this->db->join('tb_fakultas', 'tb_fakultas.fakultas_id=dsn_fakultas', 'left');
    }
    //  CRUD 
    public function input_data($data)
    {
        return $this->db->insert('tb_dosen', $data);
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
        return $this->db->update('tb_mahasiswa', $data);
    }
}
