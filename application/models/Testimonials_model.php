<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonials_model extends CI_Model {

    var $table = 'testimonials';
	var $table_id = 'id_testimonials';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    function lists($param)
    {
        $where = array();
        
        $this->db->select($this->table_id.', name, job_title, content, created_date, updated_date');
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->order_by($param['order'], $param['sort']);
        $this->db->limit($param['limit'], $param['offset']);
        $query = $this->db->get();
        return $query;
    }
}