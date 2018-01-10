<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_admin_login')); }
    }

    function index()
	{
		$data = array();
		
		$data['view_content'] = 'admin/home/index';
		$this->display_view('admin/templates/frame', $data);
	}
}
