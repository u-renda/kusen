<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('gallery_model');
    }

    function index()
	{
		$data = array();
		$offset = $this->input->get('per_page') ? $this->input->get('per_page') : 0;
		
		$param = array();
		$param['limit'] = 12;
		$param['offset'] = $offset;
		$param['order'] = 'created_date';
		$param['sort'] = 'desc';
		$query = $this->gallery_model->lists($param);
		
		if ($query->num_rows() > 0)
		{
			$data['result'] = $query->result();
			$data['count'] = count($query->result()) + $offset;
			$data['offset'] = $offset + 1;
		}
		
		// Total
		$query2 = $this->gallery_model->lists_count(array());
		$data['total'] = $query2;
		
		// Pagination
		$this->load->library('pagination');

		$config['base_url'] = $this->config->item('link_galeri');
		$config['total_rows'] = $query2;
		$config['per_page'] = $param['limit'];
		
		$this->pagination->initialize($config);
		
		$data['view_content'] = 'web/galeri/index';
		$this->display_view('web/templates/frame', $data);
	}
}
