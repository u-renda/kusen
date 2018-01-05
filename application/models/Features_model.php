<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Features_model extends CI_Model {

    var $table = 'features';
	var $table_id = 'id_features';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    function lists($param)
    {
        $where = array();
        
        $this->db->select($this->table_id.', title, description, logo, created_date, updated_date');
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->order_by($param['order'], $param['sort']);
        $this->db->limit($param['limit'], $param['offset']);
        $query = $this->db->get();
        return $query;
    }
}