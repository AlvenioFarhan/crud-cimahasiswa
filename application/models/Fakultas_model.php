<?php
class Fakultas_model extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tb_fakultas')->result_array();
    }

    function  get_all_fakultas($params = null, $search = null, $limit = null, $start = null, $order = null, $dir = null)
    {
        $this->set_params($params);
        $this->set_search($search);

        if ($order) {
            $this->db->order_by($order, $dir);
        } else {
            $this->db->order_by('user_name', "asc");
        }

        if ($limit) {
            $this->db->limit($limit, $start);
        }
        return $this->db->get('tb_fakultas')->result_array();
    }

    function get_count_fakultas($params = null, $search = null)
    {
        $this->set_params($params);
        $this->set_search($search);
        return $this->db->from('tb_fakultas')->count_all_results();
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
}
