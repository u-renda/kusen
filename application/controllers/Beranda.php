<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('features_model');
		$this->load->model('gallery_model');
		$this->load->model('slider_model');
		$this->load->model('testimonials_model');
    }

    function index()
	{
		$data = array();
		
		// SLIDER
		$param = array();
		$param['limit'] = 5;
		$param['offset'] = 0;
		$param['order'] = 'created_date';
		$param['sort'] = 'desc';
		$query = $this->slider_model->lists($param);
		
		if ($query->num_rows() > 0)
		{
			$data['slider'] = $query->result();
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
		
		// GALERI
		$param3 = array();
		$param3['limit'] = 4;
		$param3['offset'] = 0;
		$param3['order'] = 'created_date';
		$param3['sort'] = 'desc';
		$query3 = $this->gallery_model->lists($param3);
		
		if ($query3->num_rows() > 0)
		{
			$data['galeri'] = $query3->result();
		}
		
		// TESTIMONIAL
		$param4 = array();
		$param4['limit'] = 3;
		$param4['offset'] = 0;
		$param4['order'] = 'created_date';
		$param4['sort'] = 'desc';
		$query4 = $this->testimonials_model->lists($param4);
		
		if ($query4->num_rows() > 0)
		{
			$data['testimonial'] = $query4->result();
		}
		
		$data['view_content'] = 'web/beranda/index';
		$this->display_view('web/templates/frame', $data);
	}
}
