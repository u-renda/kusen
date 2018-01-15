<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('product_model');
		$this->load->model('product_type_detail_model');
    }

    function index()
	{
		$data = array();
		$offset = $this->input->get('per_page') ? $this->input->get('per_page') : 0;
		$uri2 = $this->uri->segment(2);
		$uri3 = $this->uri->segment(3);
		
		if ($uri3 != '')
		{
			$query2 = $this->product_type_detail_model->info(array('name' => $uri3));
		
			if ($query2->num_rows() > 0)
			{
				$param = array();
				$param['limit'] = 12;
				$param['offset'] = $offset;
				$param['order'] = 'created_date';
				$param['sort'] = 'desc';
				$param['id_product_type_detail'] = $query2->row()->id_product_type_detail;
				$query = $this->product_model->lists($param);
				
				if ($query->num_rows() > 0)
				{
					$data['result'] = $query->result();
					$data['count'] = count($query->result()) + $offset;
					$data['offset'] = $offset + 1;
		
					// Total
					$query3 = $this->product_model->lists_count(array());
					$data['total'] = $query3;
					
					// Pagination
					$this->load->library('pagination');
			
					$config['base_url'] = $this->config->item('link_produk').'/'.$uri2.'/'.$uri3;
					$config['total_rows'] = $query3;
					$config['per_page'] = $param['limit'];
					
					$this->pagination->initialize($config);
					
					$data['product_type_detail'] = $query2->row();
					$data['view_content'] = 'web/produk/index';
					$this->display_view('web/templates/frame', $data);
				}
				else
				{
					redirect(base_url());
				}
			}
		}
		else
		{
			redirect(base_url());
		}
	}
}
