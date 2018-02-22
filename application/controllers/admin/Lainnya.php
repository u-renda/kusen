<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lainnya extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('admin_role_model');
		$this->load->model('preferences_model');
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_admin_login')); }
    }
	
	function admin_create()
	{
		$data = array();
		
		if ($this->input->post('submit') == TRUE)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_message('required', '%s harus diisi');
			$this->form_validation->set_message('min_length', '%s min 6 karakter');
			$this->form_validation->set_rules('name', 'nama', 'required');
			$this->form_validation->set_rules('email', 'email', 'required|valid_email');
			$this->form_validation->set_rules('username', 'username', 'required');
			$this->form_validation->set_rules('password', 'password', 'required|min_length[6]');
			
			if ($this->form_validation->run() == TRUE)
			{
				$ori_password = $this->input->post('password');
				$param = array();
				$param['name'] = $this->input->post('name');
				$param['email'] = $this->input->post('email');
				$param['username'] = $this->input->post('username');
				$param['password'] = md5($ori_password);
				$param['created_date'] = date('Y-m-d H:i:s');
				$param['updated_date'] = date('Y-m-d H:i:s');
				$query = $this->admin_model->create($param);
				
				if ($query > 0)
				{
					// send email
					$param['ori_password'] = $ori_password;
					$send = $this->send_email_admin_create($param);
					
					redirect($this->config->item('link_admin_lists').'?msg=success&type=create');
				}
				else
				{
					redirect($this->config->item('link_admin_lists').'?msg=error&type=create');
				}
			}
		}
		
		// admin role
		$param2 = array();
		$param2['limit'] = 10;
		$param2['offset'] = 0;
		$param2['order'] = 'name';
		$param2['sort'] = 'asc';
		$query2 = $this->admin_role_model->lists($param2);
		
		if ($query2->num_rows() > 0)
		{
			$data['admin_role'] = $query2->result();
		}
		
		$data['view_content'] = 'admin/lainnya/admin_create';
		$this->display_view('admin/templates/frame', $data);
	}

    function admin_delete()
    {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');
        $data['grid'] = $this->input->post('grid');

        $get = $this->admin_model->info(array('id_admin' => $data['id']));

        if ($get->num_rows() > 0)
        {
            if ($this->input->post('delete') == TRUE)
            {
                $query = $this->admin_model->delete($data['id']);

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

	function admin_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'created_date';
        $sort = 'desc';

        $query = $this->admin_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $query->num_rows(), 'results' => array());

        foreach ($query->result() as $row)
        {
            $action = '<a title="Edit" href="'.$this->config->item('link_admin_update').'?id='.$row->id_admin.'"><i class="fa fa-pencil h4"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_admin.'" class="delete '.$row->id_admin.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>';
			
            $entry = array(
                'No' => $i,
                'Nama' => $row->name,
                'Email' => $row->email,
                'Username' => $row->username,
                'Aksi' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
	}

    function admin_lists()
	{
		$data = array();
		
		$data['type'] = $this->input->get('type');
		$data['msg'] = $this->input->get('msg');
		$data['view_content'] = 'admin/lainnya/admin_lists';
		$this->display_view('admin/templates/frame', $data);
	}
	
	function admin_role_create()
	{
		$data = array();
		
		if ($this->input->post('submit') == TRUE)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_message('required', '%s harus diisi');
			$this->form_validation->set_rules('name', 'nama', 'required');
			
			if ($this->form_validation->run() == TRUE)
			{
				$param = array();
				$param['name'] = $this->input->post('name');
				$param['created_date'] = date('Y-m-d H:i:s');
				$param['updated_date'] = date('Y-m-d H:i:s');
				$query = $this->admin_role_model->create($param);
				
				if ($query > 0)
				{
					redirect($this->config->item('link_admin_role_lists').'?msg=success&type=create');
				}
				else
				{
					redirect($this->config->item('link_admin_role_lists').'?msg=error&type=create');
				}
			}
		}
		
		$data['view_content'] = 'admin/lainnya/admin_role_create';
		$this->display_view('admin/templates/frame', $data);
	}

    function admin_role_delete()
    {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');
        $data['grid'] = $this->input->post('grid');

        $get = $this->admin_role_model->info(array('id_admin_role' => $data['id']));

        if ($get->num_rows() > 0)
        {
            if ($this->input->post('delete') == TRUE)
            {
                $query = $this->admin_role_model->delete($data['id']);

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

	function admin_role_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'name';
        $sort = 'asc';

        $query = $this->admin_role_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $query->num_rows(), 'results' => array());

        foreach ($query->result() as $row)
        {
            $action = '<a title="Edit" href="'.$this->config->item('link_admin_role_update').'?id='.$row->id_admin_role.'"><i class="fa fa-pencil h4"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_admin_role.'" class="delete '.$row->id_admin_role.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>';
			
            $entry = array(
                'No' => $i,
                'Nama' => $row->name,
                'Aksi' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
	}

    function admin_role_lists()
	{
		$data = array();
		
		$data['type'] = $this->input->get('type');
		$data['msg'] = $this->input->get('msg');
		$data['view_content'] = 'admin/lainnya/admin_role_lists';
		$this->display_view('admin/templates/frame', $data);
	}

    function admin_role_update()
    {
		$data = array();
        $data['id'] = $this->input->get_post('id');
		
		if ($data['id'] != '')
		{
			$get = $this->admin_role_model->info(array('id_admin_role' => $data['id']));

			if ($get->num_rows() > 0)
			{
				if ($this->input->post('submit') == TRUE)
				{
					$this->load->library('form_validation');
					$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
					$this->form_validation->set_message('required', '%s harus diisi');
					$this->form_validation->set_rules('name', 'nama', 'required');
					
					if ($this->form_validation->run() == TRUE)
					{
						$param = array();
						$param['name'] = $this->input->post('name');
						$param['updated_date'] = date('Y-m-d H:i:s');
						$query = $this->admin_role_model->update($data['id'], $param);
	
						if ($query > 0)
						{
							redirect($this->config->item('link_admin_role_lists').'?msg=success&type=edit');
						}
						else
						{
							redirect($this->config->item('link_admin_role_lists').'?msg=error&type=edit');
						}
					}
				}
	
				$data['result'] = $get->row();
				$data['view_content'] = 'admin/lainnya/admin_role_update';
			}
		}
        else
        {
            $data['view_content'] = 'admin/data_not_found';
        }
		
        $this->display_view('admin/templates/frame', $data);
    }

    function admin_update()
    {
		$data = array();
        $data['id'] = $this->input->get_post('id');
		
		if ($data['id'] != '')
		{
			$get = $this->admin_model->info(array('id_admin' => $data['id']));

			if ($get->num_rows() > 0)
			{
				if ($this->input->post('submit') == TRUE)
				{
					$this->load->library('form_validation');
					$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
					$this->form_validation->set_message('required', '%s harus diisi');
					$this->form_validation->set_message('min_length', '%s min 6 karakter');
					$this->form_validation->set_rules('name', 'nama', 'required');
					$this->form_validation->set_rules('email', 'email', 'required|valid_email');
					$this->form_validation->set_rules('username', 'username', 'required');
					
					if ($this->input->post('password') == TRUE)
					{
						$this->form_validation->set_rules('password', 'password', 'min_length[6]');
					}
	
					if ($this->form_validation->run() == TRUE)
					{
						$param = array();
						$param['name'] = $this->input->post('name');
						$param['email'] = $this->input->post('email');
						$param['username'] = $this->input->post('username');
						
						if ($this->input->post('password') == TRUE)
						{
							$param['password'] = md5($this->input->post('password'));
						}
						
						$param['updated_date'] = date('Y-m-d H:i:s');
						$query = $this->admin_model->update($data['id'], $param);
	
						if ($query > 0)
						{
							redirect($this->config->item('link_admin_lists').'?msg=success&type=edit');
						}
						else
						{
							redirect($this->config->item('link_admin_lists').'?msg=error&type=edit');
						}
					}
				}
	
				$data['result'] = $get->row();
				$data['view_content'] = 'admin/lainnya/admin_update';
			}
		}
        else
        {
            $data['view_content'] = 'admin/data_not_found';
        }
		
        $this->display_view('admin/templates/frame', $data);
    }

	function akun_saya()
	{
		$id = $this->session->userdata('id_admin');
        $get = $this->admin_model->info(array('id_admin' => $id));

        if ($get->num_rows() > 0)
        {
			$notif = '';
            if ($this->input->post('submit') == TRUE)
            {
                $this->load->library('form_validation');
				$this->form_validation->set_message('required', '%s harus diisi');
                $this->form_validation->set_rules('nama', 'nama', 'required');
                $this->form_validation->set_rules('email', 'email', 'required|valid_email');

                if ($this->form_validation->run() == TRUE)
                {
                    $param = array();
                    $param['name'] = $this->input->post('nama');
                    $param['email'] = $this->input->post('email');
                    $param['updated_date'] = date('Y-m-d H:i:s');
                    $query = $this->admin_model->update($id, $param);

                    if ($query > 0)
                    {
						$notif = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Perubahan data berhasil.</div>';
                    }
                    else
                    {
                        $notif = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Perubahan data gagal.</div>';
                    }
                }
            }
			elseif ($this->input->post('submit_password') == TRUE)
			{
				$this->load->library('form_validation');
				$this->form_validation->set_message('required', '%s harus diisi');
				$this->form_validation->set_message('min_length', '%s harus lebih dari 5 karakter');
                $this->form_validation->set_rules('username', 'username', 'required');
                $this->form_validation->set_rules('password_lama', 'password lama', 'required|callback_password_check');
                $this->form_validation->set_rules('password_baru', 'password baru', 'required|min_length[5]');
				
				if ($this->form_validation->run() == TRUE)
                {
                    $param = array();
                    $param['username'] = $this->input->post('username');
                    $param['password'] = md5($this->input->post('password_baru'));
                    $param['updated_date'] = date('Y-m-d H:i:s');
                    $query = $this->admin_model->update($id, $param);

                    if ($query > 0)
                    {
						$notif = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Perubahan data berhasil.</div>';
                    }
                    else
                    {
                        $notif = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Perubahan data gagal.</div>';
                    }
                }
			}

			$data['notif'] = $notif;
            $data['result'] = $get->row();
            $data['view_content'] = 'admin/lainnya/akun_saya';
			$this->display_view('admin/templates/frame', $data);
        }
        else
        {
            echo "Data not found";
        }
	}
	
	function password_check($param)
	{
		$query = $this->admin_model->info(array('password' => md5($param)));
		
		if ($query->num_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('password_check', '%s tidak sesuai/salah');
            return FALSE;
		}
	}
	
	function pengaturan_create()
	{
		$data = array();
		
		if ($this->input->post('submit') == TRUE)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_message('required', '%s harus diisi');
			$this->form_validation->set_rules('name', 'nama', 'required');
			$this->form_validation->set_rules('content', 'isi', 'required');
			
			if ($this->form_validation->run() == TRUE)
			{
				$url_title = url_title(strtolower($this->input->post('name')));
				$query2 = $this->preferences_model->info(array('slug' => $url_title));
				
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
				$param['name'] = $this->input->post('name');
				$param['slug'] = $slug;
				$param['content'] = $this->input->post('content');
				$param['created_date'] = date('Y-m-d H:i:s');
				$param['updated_date'] = date('Y-m-d H:i:s');
				$query = $this->preferences_model->create($param);
				
				if ($query > 0)
				{
					redirect($this->config->item('link_admin_pengaturan').'?msg=success&type=create');
				}
				else
				{
					redirect($this->config->item('link_admin_pengaturan').'?msg=error&type=create');
				}
			}
		}
		
		$data['view_content'] = 'admin/lainnya/pengaturan_create';
		$this->display_view('admin/templates/frame', $data);
	}

    function pengaturan_delete()
    {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');
        $data['grid'] = $this->input->post('grid');

        $get = $this->preferences_model->info(array('id_preferences' => $data['id']));

        if ($get->num_rows() > 0)
        {
            if ($this->input->post('delete') == TRUE)
            {
                $query = $this->preferences_model->delete($data['id']);

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

	function pengaturan_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'created_date';
        $sort = 'desc';

        $query = $this->preferences_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $query->num_rows(), 'results' => array());

        foreach ($query->result() as $row)
        {
            $action = '<a title="Edit" href="'.$this->config->item('link_admin_pengaturan_update').'?id='.$row->id_preferences.'"><i class="fa fa-pencil h4"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_preferences.'" class="delete '.$row->id_preferences.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>';
			
            $entry = array(
                'No' => $i,
                'Nama' => $row->name,
                'Kode' => $row->slug,
                'Isi' => $row->content,
                'Aksi' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
	}

    function pengaturan_lists()
	{
		$data = array();
		
		$data['type'] = $this->input->get('type');
		$data['msg'] = $this->input->get('msg');
		$data['view_content'] = 'admin/lainnya/pengaturan_lists';
		$this->display_view('admin/templates/frame', $data);
	}

    function pengaturan_update()
    {
		$data = array();
        $data['id'] = $this->input->get_post('id');
		
		if ($data['id'] != '')
		{
			$get = $this->preferences_model->info(array('id_preferences' => $data['id']));

			if ($get->num_rows() > 0)
			{
				if ($this->input->post('submit') == TRUE)
				{
					$this->load->library('form_validation');
					$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
					$this->form_validation->set_message('required', '%s harus diisi');
					$this->form_validation->set_rules('name', 'nama', 'required');
					$this->form_validation->set_rules('content', 'isi', 'required');
	
					if ($this->form_validation->run() == TRUE)
					{
						$param = array();
						$param['name'] = $this->input->post('name');
						$param['content'] = $this->input->post('content');
						$param['updated_date'] = date('Y-m-d H:i:s');
						$query = $this->preferences_model->update($data['id'], $param);
	
						if ($query > 0)
						{
							redirect($this->config->item('link_admin_pengaturan').'?msg=success&type=edit');
						}
						else
						{
							redirect($this->config->item('link_admin_pengaturan').'?msg=error&type=edit');
						}
					}
				}
	
				$data['result'] = $get->row();
				$data['view_content'] = 'admin/lainnya/pengaturan_update';
			}
		}
        else
        {
            $data['view_content'] = 'admin/data_not_found';
        }
		
        $this->display_view('admin/templates/frame', $data);
    }
	
	function send_email_admin_create($param)
	{
		$this->load->library('email');
		
		$config = array();
		$config['useragent'] = 'griyagemilang.com';
		$config['wordwrap'] = FALSE;
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		
		$message = '
		<html><head></head><body style="font-family: Arial; margin: 0px;">
		
		<p>Selamat bergabung dengan Griya Gemilang!</p>
		<p>Berikut adalah informasi untuk mengakses halaman admin:<br />
		URL: http://griyagemilang.com/admin<br />
		Username: '.$param['username'].'<br />
		Password: '.$param['ori_password'].'</p>
		<p>Silahkan login dengan informasi di atas. Terima kasih.</p>
		
		</body></html>
		';
		
		$this->email->from('admin@griyagemilang.com', 'Griya Gemilang');
		$this->email->to($param['email']);
		$this->email->subject('Akses Halaman Admin Griya Gemilang');
		$this->email->message('');
		$send = $this->email->send();
		
		if ( ! $send)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}
