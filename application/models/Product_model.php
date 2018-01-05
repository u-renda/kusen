<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    var $table = 'product';
	var $table_id = 'id_product';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    function lists($param)
    {
        $where = array();
        if (isset($param['id_product_type']) == TRUE)
        {
            $where += array($this->table.'.id_product_type' => $param['id_product_type']);
        }
        
        $this->db->select($this->table_id.', '.$this->table.'.id_product_type, '.$this->table.'.name,
						  slug, price, url, '.$this->table.'.created_date,
						  '.$this->table.'.updated_date');
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->join('product_type', $this->table.'.id_product_type = product_type.id_product_type', 'left');
        $this->db->order_by($param['order'], $param['sort']);
        $this->db->limit($param['limit'], $param['offset']);
        $query = $this->db->get();
        return $query;
    }
}