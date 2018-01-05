<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang_kami extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('features_model');
		$this->load->model('preferences_model');
    }

    function index()
	{
		$data = array();
		
		// TENTANG KAMI
		$query = $this->preferences_model->info(array('slug' => 'tentang_kami'));
		
		if ($query->num_rows() > 0)
		{
			$data['tentang_kami'] = $query->row()->content;
		}
		
		// FEATURES
		$param2 = array();
		$param2['limit'] = 6;
		$param2['offset'] = 0;
		$param2['order'] = 'created_date';
		$param2['sort'] = 'desc';
		$query2 = $this->features_model->lists($param2);
		
		if ($query2->num_rows() > 0)
		{
			$data['features'] = $query2->result();
		}
		
		// VISI
		$query = $this->preferences_model->info(array('slug' => 'visi'));
		
		if ($query->num_rows() > 0)
		{
			$data['visi'] = $query->row()->content;
		}
		
		$data['view_content'] = 'web/tentang_kami/index';
		$this->display_view('web/templates/frame', $data);
	}
}
