<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_type_model extends CI_Model {

    var $table = 'product_type';
	var $table_id = 'id_product_type';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    function create($param)
    {
        $this->db->set($this->table_id, 'UUID_SHORT()', FALSE);
		$query = $this->db->insert($this->table, $param);
		return $query;
    }
    
    function delete($id)
    {
        $this->db->where($this->table_id, $id);
        $query = $this->db->delete($this->table);
        return $query;
    }
    
    function info($param)
    {
        $where = array();
        if (isset($param['name']) == TRUE)
        {
            $where += array('name' => $param['name']);
        }
        if (isset($param['id_product_type']) == TRUE)
        {
            $where += array($this->table_id => $param['id_product_type']);
        }
        
        $this->db->select($this->table_id.', name, number, created_date, updated_date');
        $this->db->from($this->table);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
    
    function lists($param)
    {
        $where = array();
        
        $this->db->select($this->table_id.', name, number, created_date, updated_date');
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->order_by($param['order'], $param['sort']);
        $this->db->limit($param['limit'], $param['offset']);
        $query = $this->db->get();
        return $query;
    }
}