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
        $this->load->model('product_type_detail_model');
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
		
        $query4 = $this->preferences_model->info(array('slug' => 'youtube'));
        
        if ($query4->num_rows() > 0)
        {
            $this->global_data['youtube'] = $query4->row()->content;
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
		
        $query7 = $this->preferences_model->info(array('slug' => 'email2'));
        
        if ($query7->num_rows() > 0)
        {
            $this->global_data['email2'] = $query7->row()->content;
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
			$product_type = array();
			foreach ($query7->result() as $row)
			{
				$temp = array();
				$temp['name'] = $row->name;
				
				$param2 = array();
				$param2['limit'] = 10;
				$param2['offset'] = 0;
				$param2['order'] = 'number';
				$param2['sort'] = 'asc';
				$param2['id_product_type'] = $row->id_product_type;
				$query8 = $this->product_type_detail_model->lists($param2);
				
				if ($query8->num_rows() > 0)
				{
					$temp['detail'] = $query8->result_array();
				}
				
				$product_type[] = $temp;
			}
			
            $this->global_data['product_type'] = $product_type;
        }
        
        $data = array_merge($this->global_data, $local_data);
        
        return $this->load->view($view, $data);
    }
}
