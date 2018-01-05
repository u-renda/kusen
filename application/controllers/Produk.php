<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('product_model');
		$this->load->model('product_type_model');
    }

    function upvc()
	{
		$data = array();
		
		$query2 = $this->product_type_model->info(array('name' => 'uPVC'));
		
		if ($query2->num_rows() > 0)
		{
			$param = array();
			$param['limit'] = 12;
			$param['offset'] = 0;
			$param['order'] = 'created_date';
			$param['sort'] = 'desc';
			$param['id_product_type'] = $query2->row()->id_product_type;
			$query = $this->product_model->lists($param);
			
			if ($query->num_rows() > 0)
			{
				$data['result'] = $query->result();
			}
		}
		
		$data['view_content'] = 'web/produk/upvc';
		$this->display_view('web/templates/frame', $data);
	}
	
	function alumunium()
	{
		
	}
	
	function kabinet()
	{
		
	}
}
