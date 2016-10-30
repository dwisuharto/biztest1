<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Core_Model extends CI_Model {

    protected $table_name = "";

    function __construct() {
        parent::__construct();
    }

    public function insert($data = null)
    {
        $id = -1;
        if ($data != null) {
            $this->db->insert($this->table_name, $data);
            $id = $this->db->insert_id();
        }
        return $id;
    }

    public function update($data = null, $criteria = null)
    {

        if ($data != null && $criteria != null) {
            $this->db->update($this->table_name, $data, $criteria);
        }
    }

    public function delete($criteria = null)
    {
        if ($criteria != null) {
            $this->db->update($this->table_name, array('is_del' => 1), $criteria);
        }
    }

    public function real_delete($criteria = null)
    {
        if ($criteria != null) {
            $this->db->delete($this->table_name, $criteria);
        }
    }

    public function get_one($field_name = "", $field_value = "")
    {
        $data = null;
        $this->db->where($field_name, $field_value);
        $query = $this->db->get($this->table_name);
        $result = $query->result();
        if (isset($result[0])) {
            $data = $result[0];
        }
        return $data;
    }

    public function get_all($offset = -1, $count = -1, $where = null, $or_where = null, $order = null, $no_deleted = true)
    {
        if ($offset != -1 && $count != -1) {
            $this->db->limit($count, $offset);
        }

        if ($where != null) {
            $this->db->where($where);
        }
        if ($no_deleted) {
            $this->db->where('is_del', -1);
        }

        if ($or_where != null) {
            $this->db->or_where($or_where);
        }

        if (!is_null($order)) {
            $this->db->order_by($order[0], $order[1]);
        }

        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function count_all($where = null, $or_where = null, $no_deleted = true)
    {
        if ($where != null) {
            $this->db->where($where);
        }
        if ($no_deleted) {
            $this->db->where('is_del', -1);
        }

        if ($or_where != null) {
            $this->db->or_where($or_where);
        }

        $this->db->from($this->table_name);
        return $this->db->count_all_results();
    }


    public function get_by_criteria($where = null, $like = null, $offset = -1, $count = -1, $or_where = null, $join = null, $order = null, $where_in = null, $no_deleted = true)
    {
        if ($offset != -1 && $count != -1) {
            $this->db->limit($count, $offset);
        }

        if (!is_null($where)) {
            $this->db->where($where);
        }
        if ($no_deleted) {
            $this->db->where('is_del', -1);
        }

        if (!is_null($like)) {
            //$this->db->like($like[0], $like[1]);
            $this->db->like($like);
        }

        if (!is_null($where_in)) {
            $this->db->where_in($where_in);
        }

        if ($or_where != null) {
            $this->db->or_where($or_where);
        }

        if (!is_null($join)) {
            if (isset($join[2])) {
                $this->db->join($join[0], $join[1], $join[2]);
            } else {
                $this->db->join($join[0], $join[1]);
            }
        }

        if (!is_null($order)) {
            $this->db->order_by($order[0], $order[1]);
        }

        $query = $this->db->get($this->table_name);
//        var_dump($this->db->last_query());
        return $query->result();
    }

    public function count_by_criteria($where = null, $like = null, $or_where = null, $join = null, $where_in = null, $no_deleted = true)
    {
        if (!is_null($where)) {
            $this->db->where($where);
        }
        if ($no_deleted) {
            $this->db->where('is_del', -1);
        }

        if (!is_null($like)) {
            $this->db->like($like);
            //$this->db->like($like[0], $like[1]);
        }

        if (!is_null($where_in)) {
            $this->db->where_in($where_in);
        }

        if (!is_null($join)) {
            if (isset($join[2])) {
                $this->db->join($join[0], $join[1], $join[2]);
            } else {
                $this->db->join($join[0], $join[1]);
            }
        }

        if ($or_where != null) {
            $this->db->or_where($or_where);
        }

        $this->db->from($this->table_name);
        return $this->db->count_all_results();
    }

    public function combo($field_value = "", $field_text = "", $selected = "", $unselected = '-- Choose  --')
    {
        $this->db->where('is_del', -1);
        $query = $this->db->get($this->table_name);
        $results = $query->result();
        $list_options = '<option value="-1">' . $unselected . '</option>' . "\n";
        foreach ($results as $result) {
            if ($result->{$field_value} == $selected) {
                $str_selected = ' selected';
            } else {
                $str_selected = '';
            }
            $list_options .= '<option value="' . $result->{$field_value} . '"' . $str_selected . '>' . $result->{$field_text} . '</option>' . "\n";
        }
        return $list_options;
    }

}
