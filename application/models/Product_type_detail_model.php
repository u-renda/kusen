<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_type_detail_model extends CI_Model {

    var $table = 'product_type_detail';
	var $table_id = 'id_product_type_detail';
    
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
        if (isset($param['id_product_type_detail']) == TRUE)
        {
            $where += array($this->table_id => $param['id_product_type_detail']);
        }
        if (isset($param['name']) == TRUE)
        {
            $where += array($this->table.'.name' => $param['name']);
        }
        
        $this->db->select($this->table_id.', '.$this->table.'.id_product_type, '.$this->table.'.name,
						  '.$this->table.'.number, '.$this->table.'.created_date,
						  '.$this->table.'.updated_date, product_type.name AS product_type_name');
        $this->db->from($this->table);
        $this->db->join('product_type', $this->table.'.id_product_type = product_type.id_product_type', 'left');
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
    
    function lists($param)
    {
        $where = array();
        if (isset($param['id_product_type']) == TRUE)
        {
            $where += array('id_product_type' => $param['id_product_type']);
        }
        
        $this->db->select($this->table_id.', id_product_type, name, number, created_date,
						  updated_date');
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->order_by($param['order'], $param['sort']);
        $this->db->limit($param['limit'], $param['offset']);
        $query = $this->db->get();
        return $query;
    }
}