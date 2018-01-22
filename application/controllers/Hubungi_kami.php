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
		
		if ($this->input->post('submit') == TRUE)
		{
			$this->load->library('email');

			$this->email->from($this->input->post('email'), $this->input->post('name'));
			$this->email->to('testing@griyagemilang.com');
			//$this->email->to('rosy@griyagemilang.com');
			//$this->email->cc('edi@griyagemilang.com');
			
			$this->email->subject('Pertanyaan dari Website');
			$this->email->message($this->input->post('message'));
			
			$send = $this->email->send();
			
			if ($send == TRUE)
			{
				echo "berhasil";die();
			}
			else
			{
				echo "gagal";die();
			}
		}
		
		$data['view_content'] = 'web/hubungi_kami/index';
		$this->display_view('web/templates/frame', $data);
	}
}
