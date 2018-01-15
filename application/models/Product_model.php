<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    var $table = 'product';
	var $table_id = 'id_product';
    
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
        if (isset($param['id_product']) == TRUE)
        {
            $where += array($this->table_id => $param['id_product']);
        }
        if (isset($param['slug']) == TRUE)
        {
            $where += array('slug' => $param['slug']);
        }
        
        $this->db->select($this->table_id.', '.$this->table.'.id_product_type_detail,
						  '.$this->table.'.name, slug, description, url, '.$this->table.'.created_date,
						  '.$this->table.'.updated_date,
						  product_type_detail.name as product_type_detail_name');
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->join('product_type_detail', $this->table.'.id_product_type_detail = product_type_detail.id_product_type_detail', 'left');
        $query = $this->db->get();
        return $query;
    }
    
    function lists($param)
    {
        $where = array();
        if (isset($param['id_product_type_detail']) == TRUE)
        {
            $where += array($this->table.'.id_product_type_detail' => $param['id_product_type_detail']);
        }
        
        $this->db->select($this->table_id.', '.$this->table.'.id_product_type_detail,
						  '.$this->table.'.name, slug, description, url, '.$this->table.'.created_date,
						  '.$this->table.'.updated_date,
						  product_type_detail.name as product_type_detail_name');
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->join('product_type_detail', $this->table.'.id_product_type_detail = product_type_detail.id_product_type_detail', 'left');
        $this->db->order_by($param['order'], $param['sort']);
        $this->db->limit($param['limit'], $param['offset']);
        $query = $this->db->get();
        return $query;
    }
    
    function lists_count($param)
    {
        $where = array();
        
        $this->db->select($this->table_id);
        $this->db->from($this->table);
        $this->db->where($where);
        $query = $this->db->count_all_results();
        return $query;
    }
    
    function update($id, $param)
    {
        $this->db->where($this->table_id, $id);
        $query = $this->db->update($this->table, $param);
        return $query;
    }
}