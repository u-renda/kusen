<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('testimonials_model');
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_admin_login')); }
    }
	
	function testimonial_create()
	{
		$data = array();
		
		if ($this->input->post('submit') == TRUE)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_message('required', '%s harus diisi');
			$this->form_validation->set_rules('name', 'nama', 'required');
			$this->form_validation->set_rules('job_title', 'jabatan & perusahaan', 'required');
			$this->form_validation->set_rules('content', 'testimonial', 'required');
			
			if ($this->form_validation->run() == TRUE)
			{
				$param = array();
				$param['name'] = $this->input->post('name');
				$param['job_title'] = $this->input->post('job_title');
				$param['content'] = $this->input->post('content');
				$param['created_date'] = date('Y-m-d H:i:s');
				$param['updated_date'] = date('Y-m-d H:i:s');
				$query = $this->testimonials_model->create($param);
				
				if ($query > 0)
				{
					redirect($this->config->item('link_admin_testimonial').'?msg=success&type=create');
				}
				else
				{
					redirect($this->config->item('link_admin_testimonial').'?msg=error&type=create');
				}
			}
		}
		
		$data['view_content'] = 'admin/testimonial/testimonial_create';
		$this->display_view('admin/templates/frame', $data);
	}

    function testimonial_delete()
    {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');
        $data['grid'] = $this->input->post('grid');

        $get = $this->testimonials_model->info(array('id_testimonials' => $data['id']));

        if ($get->num_rows() > 0)
        {
            if ($this->input->post('delete') == TRUE)
            {
                $query = $this->testimonials_model->delete($data['id']);

                if ($query > 0)
                {
                    $response = array('text' => 'Success', 'type' => 'success', 'title' => 'Delete');
                }
                else
                {
                    $response = array('text' => 'Failed', 'type' => 'error', 'title' => 'Delete');
                }

                echo json_encode($response);
                exit();
            }
            else
            {
                $this->load->view('admin/delete_confirm', $data);
            }
        }
        else
        {
            echo "Data Not Found";
        }
    }

	function testimonial_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'created_date';
        $sort = 'desc';

        $query = $this->testimonials_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $query->num_rows(), 'results' => array());

        foreach ($query->result() as $row)
        {
            $action = '<a title="Edit" href="'.$this->config->item('link_admin_testimonial_update').'?id='.$row->id_testimonials.'"><i class="fa fa-pencil h4"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_testimonials.'" class="delete '.$row->id_testimonials.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>';
			
            $entry = array(
                'No' => $i,
                'Nama' => $row->name,
                'Jabatan' => $row->job_title,
                'Testimonial' => $row->content,
                'Aksi' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
	}

    function testimonial_lists()
	{
		$data = array();
		
		$data['type'] = $this->input->get('type');
		$data['msg'] = $this->input->get('msg');
		$data['view_content'] = 'admin/testimonial/testimonial_lists';
		$this->display_view('admin/templates/frame', $data);
	}

    function testimonial_update()
    {
		$data = array();
        $data['id'] = $this->input->get_post('id');
		
		if ($data['id'] != '')
		{
			$get = $this->testimonials_model->info(array('id_testimonials' => $data['id']));

			if ($get->num_rows() > 0)
			{
				if ($this->input->post('submit') == TRUE)
				{
					$this->load->library('form_validation');
					$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
					$this->form_validation->set_message('required', '%s harus diisi');
					$this->form_validation->set_rules('name', 'nama', 'required');
					$this->form_validation->set_rules('job_title', 'jabatan & perusahaan', 'required');
					$this->form_validation->set_rules('content', 'testimonial', 'required');
	
					if ($this->form_validation->run() == TRUE)
					{
						$param = array();
						$param['name'] = $this->input->post('name');
						$param['job_title'] = $this->input->post('job_title');
						$param['content'] = $this->input->post('content');
						$param['updated_date'] = date('Y-m-d H:i:s');
						$query = $this->testimonials_model->update($data['id'], $param);
	
						if ($query > 0)
						{
							redirect($this->config->item('link_admin_testimonial').'?msg=success&type=edit');
						}
						else
						{
							redirect($this->config->item('link_admin_testimonial').'?msg=error&type=edit');
						}
					}
				}
	
				$data['result'] = $get->row();
				$data['view_content'] = 'admin/testimonial/testimonial_update';
			}
		}
        else
        {
            $data['view_content'] = 'admin/data_not_found';
        }
		
        $this->display_view('admin/templates/frame', $data);
    }
}
