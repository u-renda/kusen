<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hubungi_kami extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('preferences_model');
    }

    function index()
	{
		$data = array();
		
		
		
		$data['view_content'] = 'web/hubungi_kami/index';
		$this->display_view('web/templates/frame', $data);
	}
}
