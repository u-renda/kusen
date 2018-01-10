<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keunggulan extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('features_model');
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_admin_login')); }
    }
	
	function keunggulan_create()
	{
		$data = array();
		
		if ($this->input->post('submit') == TRUE)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_message('required', '%s harus diisi');
			$this->form_validation->set_rules('title', 'judul', 'required');
			$this->form_validation->set_rules('description', 'isi', 'required');
			$this->form_validation->set_rules('logo', 'logo', 'required');
			
			if ($this->form_validation->run() == TRUE)
			{
				$param = array();
				$param['title'] = $this->input->post('title');
				$param['description'] = $this->input->post('description');
				$param['logo'] = $this->input->post('logo');
				$param['created_date'] = date('Y-m-d H:i:s');
				$param['updated_date'] = date('Y-m-d H:i:s');
				$query = $this->features_model->create($param);
				
				if ($query > 0)
				{
					redirect($this->config->item('link_admin_keunggulan').'?msg=success&type=create');
				}
				else
				{
					redirect($this->config->item('link_admin_keunggulan').'?msg=error&type=create');
				}
			}
		}
		
		$data['view_content'] = 'admin/keunggulan/keunggulan_create';
		$this->display_view('admin/templates/frame', $data);
	}

    function keunggulan_delete()
    {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');
        $data['grid'] = $this->input->post('grid');

        $get = $this->features_model->info(array('id_features' => $data['id']));

        if ($get->num_rows() > 0)
        {
            if ($this->input->post('delete') == TRUE)
            {
                $query = $this->features_model->delete($data['id']);

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

	function keunggulan_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'created_date';
        $sort = 'desc';

        $query = $this->features_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $query->num_rows(), 'results' => array());

        foreach ($query->result() as $row)
        {
            $action = '<a title="Edit" href="'.$this->config->item('link_admin_keunggulan_update').'?id='.$row->id_features.'"><i class="fa fa-pencil h4"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_features.'" class="delete '.$row->id_features.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>';
			$logo = '<i class="fa fa-'.$row->logo.'"></i>';
			
            $entry = array(
                'No' => $i,
                'Logo' => $logo,
                'Judul' => $row->title,
                'Deskripsi' => $row->description,
                'Aksi' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
	}

    function keunggulan_lists()
	{
		$data = array();
		
		$data['type'] = $this->input->get('type');
		$data['msg'] = $this->input->get('msg');
		$data['view_content'] = 'admin/keunggulan/keunggulan_lists';
		$this->display_view('admin/templates/frame', $data);
	}

    function keunggulan_update()
    {
		$data = array();
        $data['id'] = $this->input->get_post('id');
		
		if ($data['id'] != '')
		{
			$get = $this->features_model->info(array('id_features' => $data['id']));

			if ($get->num_rows() > 0)
			{
				if ($this->input->post('submit') == TRUE)
				{
					$this->load->library('form_validation');
					$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
					$this->form_validation->set_message('required', '%s harus diisi');
					$this->form_validation->set_rules('title', 'judul', 'required');
					$this->form_validation->set_rules('description', 'isi', 'required');
					$this->form_validation->set_rules('logo', 'logo', 'required');
	
					if ($this->form_validation->run() == TRUE)
					{
						$param = array();
						$param['title'] = $this->input->post('title');
						$param['description'] = $this->input->post('description');
						$param['logo'] = $this->input->post('logo');
						$param['updated_date'] = date('Y-m-d H:i:s');
						$query = $this->features_model->update($data['id'], $param);
	
						if ($query > 0)
						{
							redirect($this->config->item('link_admin_keunggulan').'?msg=success&type=edit');
						}
						else
						{
							redirect($this->config->item('link_admin_keunggulan').'?msg=error&type=edit');
						}
					}
				}
	
				$data['result'] = $get->row();
				$data['view_content'] = 'admin/keunggulan/keunggulan_update';
			}
		}
        else
        {
            $data['view_content'] = 'admin/data_not_found';
        }
		
        $this->display_view('admin/templates/frame', $data);
    }
}
