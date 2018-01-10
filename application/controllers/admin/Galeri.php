<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends MY_Controller {

	private $processMedia;

	function __construct()
    {
        parent::__construct();
		$this->load->model('gallery_model');
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_admin_login')); }
    }
	
	function check_media()
	{
		if ($_FILES["galeri_url"]["error"] == 0)
		{
			$this->load->helper('my');
			$photo = upload_image($_FILES["galeri_url"], 'galeri');
			
			if (is_array($photo) == FALSE)
			{
				$this->processMedia = $photo;
				return TRUE;
			}
			else
			{
				$this->form_validation->set_message('check_media', $photo[0]);
				return FALSE;
			}
		}
		else
		{
			$this->form_validation->set_message('check_media', '%s tidak boleh kosong');
			return FALSE;
		}
	}
	
	function galeri_create()
	{
		$data = array();
		
		if ($this->input->post('submit') == TRUE)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_message('required', '%s harus diisi');
			$this->form_validation->set_rules('name', 'nama', 'required');
			$this->form_validation->set_rules('galeri_url', 'foto', 'callback_check_media');
			
			if ($this->form_validation->run() == TRUE)
			{
				$param = array();
				$param['name'] = $this->input->post('name');
				$param['url'] = $this->processMedia;
				$param['created_date'] = date('Y-m-d H:i:s');
				$param['updated_date'] = date('Y-m-d H:i:s');
				$query = $this->gallery_model->create($param);
				
				if ($query > 0)
				{
					redirect($this->config->item('link_admin_galeri').'?msg=success&type=create');
				}
				else
				{
					redirect($this->config->item('link_admin_galeri').'?msg=error&type=create');
				}
			}
		}
		
		$data['view_content'] = 'admin/galeri/galeri_create';
		$this->display_view('admin/templates/frame', $data);
	}

    function galeri_delete()
    {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');
        $data['grid'] = $this->input->post('grid');

        $get = $this->gallery_model->info(array('id_gallery' => $data['id']));

        if ($get->num_rows() > 0)
        {
            if ($this->input->post('delete') == TRUE)
            {
                $query = $this->gallery_model->delete($data['id']);

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

	function galeri_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'created_date';
        $sort = 'desc';

        $query = $this->gallery_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $query->num_rows(), 'results' => array());

        foreach ($query->result() as $row)
        {
            $action = '<a title="Edit" href="'.$this->config->item('link_admin_galeri_update').'?id='.$row->id_gallery.'"><i class="fa fa-pencil h4"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_gallery.'" class="delete '.$row->id_gallery.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>';
			$foto = '<img src="'.$row->url.'" alt="'.$row->name.'" width="50%">';
			
            $entry = array(
                'No' => $i,
                'Nama' => $row->name,
                'Foto' => $foto,
                'Aksi' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
	}

    function galeri_lists()
	{
		$data = array();
		
		$data['type'] = $this->input->get('type');
		$data['msg'] = $this->input->get('msg');
		$data['view_content'] = 'admin/galeri/galeri_lists';
		$this->display_view('admin/templates/frame', $data);
	}

    function galeri_update()
    {
		$data = array();
        $data['id'] = $this->input->get_post('id');
		
		if ($data['id'] != '')
		{
			$get = $this->gallery_model->info(array('id_gallery' => $data['id']));

			if ($get->num_rows() > 0)
			{
				if ($this->input->post('submit') == TRUE)
				{
					$this->load->library('form_validation');
					$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
					$this->form_validation->set_message('required', '%s harus diisi');
					$this->form_validation->set_rules('name', 'nama', 'required');
					
					if ($this->input->post('change_media') == TRUE)
					{
						$this->form_validation->set_rules('galeri_url', 'foto', 'callback_check_media');
					}
	
					if ($this->form_validation->run() == TRUE)
					{
						$param = array();
						$param['name'] = $this->input->post('name');
						
						if ($this->input->post('change_media') == TRUE)
						{
							$param['url'] = $this->processMedia;
						}
						
						$param['updated_date'] = date('Y-m-d H:i:s');
						$query = $this->gallery_model->update($data['id'], $param);
	
						if ($query > 0)
						{
							redirect($this->config->item('link_admin_galeri').'?msg=success&type=edit');
						}
						else
						{
							redirect($this->config->item('link_admin_galeri').'?msg=error&type=edit');
						}
					}
				}
	
				$data['result'] = $get->row();
				$data['view_content'] = 'admin/galeri/galeri_update';
			}
		}
        else
        {
            $data['view_content'] = 'admin/data_not_found';
        }
		
        $this->display_view('admin/templates/frame', $data);
    }
}
