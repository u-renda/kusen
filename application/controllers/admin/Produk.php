<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends MY_Controller {

	private $processMedia;

	function __construct()
    {
        parent::__construct();
		$this->load->model('product_model');
		$this->load->model('product_type_detail_model');
		$this->load->model('product_type_model');
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_admin_login')); }
    }
	
	function check_media()
	{
		if ($_FILES["produk_url"]["error"] == 0)
		{
			$this->load->helper('my');
			$photo = upload_image($_FILES["produk_url"], 'produk');
			
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
	
	function produk_create()
	{
		$data = array();
		
		if ($this->input->post('submit') == TRUE)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_message('required', '%s harus diisi');
			$this->form_validation->set_message('numeric', '%s harus berisi angka');
			$this->form_validation->set_rules('id_product_type_detail', 'tipe produk', 'required');
			$this->form_validation->set_rules('name', 'nama', 'required');
			$this->form_validation->set_rules('description', 'keterangan', 'required');
			$this->form_validation->set_rules('produk_url', 'foto', 'callback_check_media');
			
			if ($this->form_validation->run() == TRUE)
			{
				$url_title = url_title(strtolower($this->input->post('name')));
				$query2 = $this->product_model->info(array('slug' => $url_title));
				
				if ($query2->num_rows() > 0)
				{
					$counter = random_string('numeric',5);
					$slug = url_title(strtolower(''.$this->input->post('name').'-'.$counter.''));
				}
				else
				{
					$slug = $url_title;
				}
				
				$param = array();
				$param['id_product_type_detail'] = $this->input->post('id_product_type_detail');
				$param['name'] = $this->input->post('name');
				$param['slug'] = $slug;
				$param['description'] = $this->input->post('description');
				$param['url'] = $this->processMedia;
				$param['created_date'] = date('Y-m-d H:i:s');
				$param['updated_date'] = date('Y-m-d H:i:s');
				$query = $this->product_model->create($param);
				
				if ($query > 0)
				{
					redirect($this->config->item('link_admin_produk').'?msg=success&type=create');
				}
				else
				{
					redirect($this->config->item('link_admin_produk').'?msg=error&type=create');
				}
			}
		}
		
		$query3 = $this->product_type_model->lists(array('limit' => 20, 'offset' => 0, 'order' => 'number', 'sort' => 'asc'));
		
		if ($query3->num_rows() > 0)
		{
			$data['product_type_lists'] = $query3->result();
		}
		
		$data['view_content'] = 'admin/produk/produk_create';
		$this->display_view('admin/templates/frame', $data);
	}

    function produk_delete()
    {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');
        $data['grid'] = $this->input->post('grid');

        $get = $this->product_model->info(array('id_product' => $data['id']));

        if ($get->num_rows() > 0)
        {
            if ($this->input->post('delete') == TRUE)
            {
                $query = $this->product_model->delete($data['id']);

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

	function produk_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'created_date';
        $sort = 'desc';

        $query = $this->product_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $query->num_rows(), 'results' => array());

        foreach ($query->result() as $row)
        {
            $action = '<a title="Edit" href="'.$this->config->item('link_admin_produk_update').'?id='.$row->id_product.'"><i class="fa fa-pencil h4"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_product.'" class="delete '.$row->id_product.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>';
			$foto = '<img src="'.$row->url.'" alt="'.$row->name.'" width="50%">';
			
			$query2 = $this->product_type_detail_model->info(array('id_product_type_detail' => $row->id_product_type_detail));
			
			if ($query2->num_rows() > 0)
			{
				$entry = array(
					'No' => $i,
					'Nama' => $row->name,
					'Tipe' => strtoupper($query2->row()->product_type_name.' - '.$query2->row()->name),
					'Keterangan' => $row->description,
					'Foto' => $foto,
					'Aksi' => $action
				);
	
				$jsonData['results'][] = $entry;
				$i++;
			}
        }

        echo json_encode($jsonData);
	}

    function produk_lists()
	{
		$data = array();
		
		$data['type'] = $this->input->get('type');
		$data['msg'] = $this->input->get('msg');
		$data['view_content'] = 'admin/produk/produk_lists';
		$this->display_view('admin/templates/frame', $data);
	}
	
	function produk_tipe_create()
	{
		$data = array();
		
		if ($this->input->post('submit') == TRUE)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_message('required', '%s harus diisi');
			$this->form_validation->set_message('numeric', '%s harus berisi angka');
			$this->form_validation->set_rules('name', 'nama', 'required');
			$this->form_validation->set_rules('number', 'urutan', 'required|numeric');
			
			if ($this->form_validation->run() == TRUE)
			{
				$param = array();
				$param['name'] = $this->input->post('name');
				$param['number'] = $this->input->post('number');
				$param['created_date'] = date('Y-m-d H:i:s');
				$param['updated_date'] = date('Y-m-d H:i:s');
				$query = $this->product_type_model->create($param);
				
				if ($query > 0)
				{
					redirect($this->config->item('link_admin_produk_tipe').'?msg=success&type=create');
				}
				else
				{
					redirect($this->config->item('link_admin_produk_tipe').'?msg=error&type=create');
				}
			}
		}
		
		$data['view_content'] = 'admin/produk/produk_tipe_create';
		$this->display_view('admin/templates/frame', $data);
	}

    function produk_tipe_delete()
    {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');
        $data['grid'] = $this->input->post('grid');

        $get = $this->product_type_model->info(array('id_product_type' => $data['id']));

        if ($get->num_rows() > 0)
        {
            if ($this->input->post('delete') == TRUE)
            {
                $query = $this->product_type_model->delete($data['id']);

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
	
	function produk_tipe_detail_create()
	{
		$data = array();
		$data['id_product_type'] = $this->input->get('id');
		
		if ($this->input->post('submit') == TRUE)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_message('required', '%s harus diisi');
			$this->form_validation->set_message('numeric', '%s harus berisi angka');
			$this->form_validation->set_rules('name', 'nama', 'required');
			$this->form_validation->set_rules('number', 'urutan', 'required|numeric');
			
			if ($this->form_validation->run() == TRUE)
			{
				$param = array();
				$param['id_product_type'] = $data['id_product_type'];
				$param['name'] = $this->input->post('name');
				$param['number'] = $this->input->post('number');
				$param['created_date'] = date('Y-m-d H:i:s');
				$param['updated_date'] = date('Y-m-d H:i:s');
				$query = $this->product_type_detail_model->create($param);
				
				if ($query > 0)
				{
					redirect($this->config->item('link_admin_produk_tipe_detail').'?msg=success&type=create');
				}
				else
				{
					redirect($this->config->item('link_admin_produk_tipe_detail').'?msg=error&type=create');
				}
			}
		}
		
		$query2 = $this->product_type_model->info(array('id_product_type' => $data['id_product_type']));
		
		if ($query2->num_rows() > 0)
		{
			$data['product_type'] = $query2->row();
		}
		
		$data['view_content'] = 'admin/produk/produk_tipe_detail_create';
		$this->display_view('admin/templates/frame', $data);
	}

    function produk_tipe_detail_delete()
    {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');
        $data['grid'] = $this->input->post('grid');

        $get = $this->product_type_detail_model->info(array('id_product_type_detail' => $data['id']));

        if ($get->num_rows() > 0)
        {
            if ($this->input->post('delete') == TRUE)
            {
                $query = $this->product_type_detail_model->delete($data['id']);

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

    function produk_tipe_detail_lists()
	{
		$data = array();
		$id = $this->input->get_post('id');
		
		$query = $this->product_type_model->info(array('id_product_type' => $id));
		
		if ($query->num_rows() > 0)
		{
			$data['product_type'] = $query->row();
		}
		
		$data['type'] = $this->input->get('type');
		$data['msg'] = $this->input->get('msg');
		$data['view_content'] = 'admin/produk/produk_tipe_detail_lists';
		$this->display_view('admin/templates/frame', $data);
	}

	function produk_tipe_detail_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'number';
        $sort = 'asc';

        $query = $this->product_type_detail_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $query->num_rows(), 'results' => array());

        foreach ($query->result() as $row)
        {
            $action = '<a title="Delete" id="'.$row->id_product_type_detail.'" class="delete '.$row->id_product_type_detail.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>';
			
            $entry = array(
                'No' => $i,
                'Nama' => $row->name,
                'Urutan' => $row->number,
                'Aksi' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
	}

	function produk_tipe_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'number';
        $sort = 'asc';

        $query = $this->product_type_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $query->num_rows(), 'results' => array());

        foreach ($query->result() as $row)
        {
            $action = '<a title="Delete" id="'.$row->id_product_type.'" class="delete '.$row->id_product_type.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>';
			$nama = $row->name;
			
			$param = array();
			$param['limit'] = 20;
			$param['offset'] = 0;
			$param['order'] = 'created_date';
			$param['sort'] = $sort;
			$param['id_product_type'] = $row->id_product_type;
			$query2 = $this->product_type_detail_model->lists($param);
			
			if (count($query2->result()) > 0)
			{
				$nama = '<a href="'.base_url().'admin/produk_tipe_detail?id='.$row->id_product_type.'">'.$row->name.'</a>';
			}
			
            $entry = array(
                'No' => $i,
                'Nama' => $nama,
                'Urutan' => $row->number,
                'Aksi' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
	}

    function produk_tipe_lists()
	{
		$data = array();
		
		$data['type'] = $this->input->get('type');
		$data['msg'] = $this->input->get('msg');
		$data['view_content'] = 'admin/produk/produk_tipe_lists';
		$this->display_view('admin/templates/frame', $data);
	}

    function produk_update()
    {
		$data = array();
        $data['id'] = $this->input->get_post('id');
		
		if ($data['id'] != '')
		{
			$get = $this->product_model->info(array('id_product' => $data['id']));

			if ($get->num_rows() > 0)
			{
				if ($this->input->post('submit') == TRUE)
				{
					$this->load->library('form_validation');
					$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
					$this->form_validation->set_message('required', '%s harus diisi');
					$this->form_validation->set_message('numeric', '%s harus berisi angka');
					$this->form_validation->set_rules('id_product_type_detail', 'tipe produk', 'required');
					$this->form_validation->set_rules('name', 'nama', 'required');
					$this->form_validation->set_rules('description', 'keterangan', 'required');
					
					if ($this->input->post('change_media') == TRUE)
					{
						$this->form_validation->set_rules('produk_url', 'foto', 'callback_check_media');
					}
	
					if ($this->form_validation->run() == TRUE)
					{
						$param = array();
						$param['id_product_type_detail'] = $this->input->post('id_product_type_detail');
						$param['name'] = $this->input->post('name');
						$param['description'] = $this->input->post('description');
						
						if ($this->input->post('change_media') == TRUE)
						{
							$param['url'] = $this->processMedia;
						}
						
						$param['updated_date'] = date('Y-m-d H:i:s');
						$query = $this->product_model->update($data['id'], $param);
	
						if ($query > 0)
						{
							redirect($this->config->item('link_admin_produk').'?msg=success&type=edit');
						}
						else
						{
							redirect($this->config->item('link_admin_produk').'?msg=error&type=edit');
						}
					}
				}
		
				$query3 = $this->product_type_detail_model->lists(array('limit' => 20, 'offset' => 0, 'order' => 'number', 'sort' => 'asc'));
				
				if ($query3->num_rows() > 0)
				{
					$data['product_type_detail_lists'] = $query3->result();
				}
		
				$query4 = $this->product_type_model->lists(array('limit' => 20, 'offset' => 0, 'order' => 'number', 'sort' => 'asc'));
				
				if ($query4->num_rows() > 0)
				{
					$data['product_type_lists'] = $query4->result();
				}
		
				$query5 = $this->product_type_detail_model->info(array('id_product_type_detail' => $get->row()->id_product_type_detail));
				
				if ($query5->num_rows() > 0)
				{
					$data['product_type_detail'] = $query5->row();
				}
				
				$data['result'] = $get->row();
				$data['view_content'] = 'admin/produk/produk_update';
			}
		}
        else
        {
            $data['view_content'] = 'admin/data_not_found';
        }
		
        $this->display_view('admin/templates/frame', $data);
    }
}
