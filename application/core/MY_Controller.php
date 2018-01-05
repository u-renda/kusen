<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    var $global_data = array();

    function __construct()
    {
        parent::__construct();
    }

    function display_view($view, $local_data = array())
    {
        $this->load->model('preferences_model');
        $this->load->model('product_type_model');
        
        $query = $this->preferences_model->info(array('slug' => 'telp'));
        
        if ($query->num_rows() > 0)
        {
            $this->global_data['telp'] = $query->row()->content;
        }
        
        $query2 = $this->preferences_model->info(array('slug' => 'email'));
        
        if ($query2->num_rows() > 0)
        {
            $this->global_data['email'] = $query2->row()->content;
        }
		
        $query3 = $this->preferences_model->info(array('slug' => 'facebook'));
        
        if ($query3->num_rows() > 0)
        {
            $this->global_data['facebook'] = $query3->row()->content;
        }
		
        $query4 = $this->preferences_model->info(array('slug' => 'twitter'));
        
        if ($query4->num_rows() > 0)
        {
            $this->global_data['twitter'] = $query4->row()->content;
        }
		
        $query5 = $this->preferences_model->info(array('slug' => 'instagram'));
        
        if ($query5->num_rows() > 0)
        {
            $this->global_data['instagram'] = $query5->row()->content;
        }
		
        $query6 = $this->preferences_model->info(array('slug' => 'alamat'));
        
        if ($query6->num_rows() > 0)
        {
            $this->global_data['alamat'] = $query6->row()->content;
        }
		
		// PRODUCT TYPE
		$param = array();
		$param['limit'] = 10;
		$param['offset'] = 0;
		$param['order'] = 'number';
		$param['sort'] = 'asc';
        $query7 = $this->product_type_model->lists($param);
        
        if ($query7->num_rows() > 0)
        {
            $this->global_data['product_type'] = $query7->result();
        }
        
        $data = array_merge($this->global_data, $local_data);
        
        return $this->load->view($view, $data);
    }
}
