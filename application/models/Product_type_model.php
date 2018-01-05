<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_type_model extends CI_Model {

    var $table = 'product_type';
	var $table_id = 'id_product_type';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    function info($param)
    {
        $where = array();
        if (isset($param['name']) == TRUE)
        {
            $where += array('name' => $param['name']);
        }
        
        $this->db->select($this->table_id.', name, created_date, updated_date');
        $this->db->from($this->table);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
    
    function lists($param)
    {
        $where = array();
        
        $this->db->select($this->table_id.', name, created_date, updated_date');
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->order_by($param['order'], $param['sort']);
        $this->db->limit($param['limit'], $param['offset']);
        $query = $this->db->get();
        return $query;
    }
}