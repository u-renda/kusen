<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Preferences_model extends CI_Model {

    var $table = 'preferences';
	var $table_id = 'id_preferences';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    function info($param)
    {
        $where = array();
        if (isset($param['slug']) == TRUE)
        {
            $where += array('slug' => $param['slug']);
        }
        
        $this->db->select($this->table_id.', name, slug, content, created_date, updated_date');
        $this->db->from($this->table);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
}