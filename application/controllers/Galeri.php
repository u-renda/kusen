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
		
		$param = array();
		$param['limit'] = 12;
		$param['offset'] = 0;
		$param['order'] = 'created_date';
		$param['sort'] = 'desc';
		$query = $this->gallery_model->lists($param);
		
		if ($query->num_rows() > 0)
		{
			$data['result'] = $query->result();
		}
		$data['view_content'] = 'web/galeri/index';
		$this->display_view('web/templates/frame', $data);
	}
}
