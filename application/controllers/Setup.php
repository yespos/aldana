<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $data = array();
        $this->load->model('setup_model');

    }

    /* Service Type*/

	public function serviceType()
	{
		$data = array();
		$table_name = "servicetype";
		$data['lists'] = $this->setup_model->show_list($table_name,$where=NULL);
		$data['subview'] = $this->load->view('parking/setup/serviceType', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	}

	public function add_serviceType()
	{
		$data = array();
		$data['subview'] = $this->load->view('parking/setup/add_serviceType', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	}

	public function add_serviceType_act()
	{
		
        if(isset($_POST))
        {
                $data = array(
                    'name' => $_POST['name'],
                   /* 'price' => $_POST['price']*/
                     );
                $table_name = "servicetype";
                $last_id = $this->setup_model->insert_table($data,$table_name);
                redirect('setup/serviceType');
	    }
    }

    public function edit_serviceType($id)
	{
		$data = array();
		$table_name = 'servicetype';
		$key = 'id';
		$data['list'] = $this->setup_model->select_table($id,$key,$table_name);
		$data['subview'] = $this->load->view('parking/setup/edit_serviceType', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	}

	public function edit_serviceType_act()
	{
	
        if(isset($_POST))
        {
                $data = array(
                    'name' => $_POST['name']
                  /*  'price' => $_POST['price']*/
                     );
                $table_name = "servicetype";
                $where['id'] = $_POST['id'];
                $last_id = $this->setup_model->update_table($where,$table_name,$data);
                redirect('setup/serviceType');
	    }
    }


    public function delete_serviceType($id)
	{
		$data = array();
		$table_name = "servicetype";
		$where['id'] = $id;
		$data['list'] = $this->setup_model->delete_table($where,$table_name);
		redirect('setup/serviceType');
	}


	/* Service  Category */

	/* Flushing Oil*/

	public function flushing()
	{
		$data = array();
		$table_name = "flushing";
		$data['lists'] = $this->setup_model->show_list($table_name,$where=NULL);
		$data['subview'] = $this->load->view('parking/setup/flushing/flushing', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	}

	public function add_flushing()
	{
		$data = array();

		$data['subview'] = $this->load->view('parking/setup/flushing/add_flushing', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	
	}

	public function add_flushing_act()
	{	
        if(isset($_POST))
        {
                $data = array(
                    'name' => $_POST['name'],
                    'price' => $_POST['price']
                     );
                $table_name = "flushing";
                $last_id = $this->setup_model->insert_table($data,$table_name);
                redirect('setup/flushing');
	    }
    }

    public function edit_flushing($id)
	{
		$data = array();
		$table_name = 'flushing';
		$key = 'id';
		$data['list'] = $this->setup_model->select_table($id,$key,$table_name);
		$data['subview'] = $this->load->view('parking/setup/flushing/edit_flushing', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	}

	public function edit_flushing_act()
	{
	
        if(isset($_POST))
        {
                $data = array(
                    'name' => $_POST['name'],
                    'price' => $_POST['price']
                     );
                $table_name = "flushing";
                $where['id'] = $_POST['id'];
                $last_id = $this->setup_model->update_table($where,$table_name,$data);
                redirect('setup/flushing');
	    }
    }


    public function delete_flushing($id)
	{
		$data = array();
		$table_name = "flushing";
		$where['id'] = $id;
		$data['list'] = $this->setup_model->delete_table($where,$table_name);
		redirect('setup/flushing');
	}

	/* Washing Type*/

	public function washing()
	{
		$data = array();
		$table_name = "washing";
		$data['lists'] = $this->setup_model->show_list($table_name,$where=NULL);
		$data['subview'] = $this->load->view('parking/setup/washing/washing', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	}

	public function add_washing()
	{
		$data = array();
		$data['subview'] = $this->load->view('parking/setup/washing/add_washing', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	
	}

	public function add_washing_act()
	{	
        if(isset($_POST))
        {
                $data = array(
                    'name' => $_POST['name'],
                    'price' => $_POST['price']
                     );
                $table_name = "washing";
                $last_id = $this->setup_model->insert_table($data,$table_name);
                redirect('setup/washing');
	    }
    }

    public function edit_washing($id)
	{
		$data = array();
		$table_name = 'washing';
		$key = 'id';
		$data['list'] = $this->setup_model->select_table($id,$key,$table_name);
		$data['subview'] = $this->load->view('parking/setup/washing/edit_washing', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	}

	public function edit_washing_act()
	{
	
        if(isset($_POST))
        {
                $data = array(
                    'name' => $_POST['name'],
                    'price' => $_POST['price']
                     );
                $table_name = "washing";
                $where['id'] = $_POST['id'];
                $last_id = $this->setup_model->update_table($where,$table_name,$data);
                redirect('setup/washing');
	    }
    }


    public function delete_washing($id)
	{
		$data = array();
		$table_name = "washing";
		$where['id'] = $id;
		$data['list'] = $this->setup_model->delete_table($where,$table_name);
		redirect('setup/washing');
	}

	/* Service Type*/

	public function vehicletype()
	{
		$data = array();
		$table_name = "servicecate";
		$data['lists'] = $this->setup_model->show_list($table_name,$where=NULL);
		$data['subview'] = $this->load->view('parking/setup/serviceCat', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	}

	public function add_vehicletype()
	{
		$data = array();

		$data['subview'] = $this->load->view('parking/setup/add_serviceCat', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	
	}

	public function add_serviceCat_act()
	{	
        if(isset($_POST))
        {
                $data = array(
                    'name' => $_POST['name'],
                    'price' => $_POST['price']
                     );
                $table_name = "servicecate";
                $last_id = $this->setup_model->insert_table($data,$table_name);
                redirect('setup/vehicletype');
	    }
    }

    public function edit_vehicletype($id)
	{
		$data = array();
		$table_name = 'servicecate';
		$key = 'id';
		$data['list'] = $this->setup_model->select_table($id,$key,$table_name);
		$data['subview'] = $this->load->view('parking/setup/edit_serviceCat', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	}

	public function edit_serviceCat_act()
	{
	
        if(isset($_POST))
        {
                $data = array(
                    'name' => $_POST['name'],
                    'price' => $_POST['price']
                     );
                $table_name = "servicecate";
                $where['id'] = $_POST['id'];
                $last_id = $this->setup_model->update_table($where,$table_name,$data);
                redirect('setup/serviceCat');
	    }
    }


    public function delete_serviceCat($id)
	{
		$data = array();
		$table_name = "servicecate";
		$where['id'] = $id;
		$data['list'] = $this->setup_model->delete_table($where,$table_name);
		redirect('setup/vehicletype');
	}


	/* Job Service */


	/* Job Service */

   public function serviceJob()
	{
		$data = array();
		$table_name = "servicejob";
		$data['lists'] = $this->setup_model->show_list($table_name,$where=NULL);
		$data['subview'] = $this->load->view('parking/setup/serviceJob', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	}

	public function add_serviceJob()
	{
		$data = array();
		$data['subview'] = $this->load->view('parking/setup/add_serviceJob', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	}

	public function add_serviceJob_act()
	{	
        if(isset($_POST))
        {
                $data = array(
                    'name' => $_POST['name'],
                    'price' => $_POST['price']
                     );
                $table_name = "servicejob";
                $last_id = $this->setup_model->insert_table($data,$table_name);
                redirect('setup/serviceJob');
	    }
    }

    public function edit_serviceJob($id)
	{
		$data = array();
		$table_name = 'servicejob';
		$key = 'id';
		$data['list'] = $this->setup_model->select_table($id,$key,$table_name);
		$data['subview'] = $this->load->view('parking/setup/edit_serviceJob', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	}

	public function edit_serviceJob_act()
	{
        if(isset($_POST))
        {
                $data = array(
                    'name' => $_POST['name'],
                    'price' => $_POST['price']
                     );
                $table_name = "servicejob";
                $where['id'] = $_POST['id'];
                $last_id = $this->setup_model->update_table($where,$table_name,$data);
                redirect('setup/serviceJob');
	    }
    }


    public function delete_serviceJob($id)
	{
		$data = array();
		$table_name = "servicejob";
		$where['id'] = $id;
		$data['list'] = $this->setup_model->delete_table($where,$table_name);
		redirect('setup/serviceJob');
	}

   

	/* Location Type*/

	public function location()
	{
		$data = array();
		$table_name = "location";
		$data['lists'] = $this->setup_model->show_list($table_name,$where=NULL);
		$data['subview'] = $this->load->view('parking/setup/location', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	}

	public function add_location()
	{
		$data = array();
		$data['subview'] = $this->load->view('parking/setup/add_location', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	
	}

	public function add_location_act()
	{	
        if(isset($_POST))
        {

        	    $region = implode(",",$_POST['region']);
                $data = array(
                    'name' => $_POST['name'],
                    'region' => $region
                     );
                $table_name = "location";
                $last_id = $this->setup_model->insert_table($data,$table_name);
                redirect('setup/location');
	    }
    }

    public function edit_location($id)
	{
		$data = array();
		$table_name = 'location';
		$key = 'id';
		$data['list'] = $this->setup_model->select_table($id,$key,$table_name);
		$data['subview'] = $this->load->view('parking/setup/edit_location', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	}

	public function edit_location_act()
	{
	
        if(isset($_POST))
        {
                $region = implode(",",$_POST['region']);
                $data = array(
                    'name' => $_POST['name'],
                    'region' => $region
                     );
                $table_name = "location";
                $where['id'] = $_POST['id'];
                $last_id = $this->setup_model->update_table($where,$table_name,$data);
                redirect('setup/location');
	    }
    }


    public function delete_location($id)
	{
		$data = array();
		$table_name = "location";
		$where['id'] = $id;
		$data['list'] = $this->setup_model->delete_table($where,$table_name);
		redirect('setup/location');
	}

	/*  Car Brand */

	public function brand()
	{
		$data = array();
		$table_name = "car";
		$data['lists'] = $this->setup_model->show_list($table_name,$where=NULL);
		$data['subview'] = $this->load->view('parking/setup/brand', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	}

	public function add_brand()
	{
		$data = array();

		$data['subview'] = $this->load->view('parking/setup/add_brand', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	
	}

	public function add_brand_act()
	{
		
        if(isset($_POST))
        {
                $data = array(
                    'carName' => $_POST['name'],
                     );
                $table_name = "car";
                $last_id = $this->setup_model->insert_table($data,$table_name);
                redirect('setup/brand');
	    }
    }

    public function edit_brand($id)
	{
		$data = array();
		$table_name = 'car';
		$key = 'id';
		$data['list'] = $this->setup_model->select_table($id,$key,$table_name);
		$data['subview'] = $this->load->view('parking/setup/edit_brand', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	}

	public function edit_brand_act()
	{
	
        if(isset($_POST))
        {
                $data = array(
                    'carName' => $_POST['name'],
                     );
                $table_name = "car";
                $where['id'] = $_POST['id'];
                $last_id = $this->setup_model->update_table($where,$table_name,$data);
                redirect('setup/brand');
	    }
    }


    public function delete_brand($id)
	{
		$data = array();
		$table_name = "car";
		$where['id'] = $id;
		$data['list'] = $this->setup_model->delete_table($where,$table_name);
		redirect('setup/brand');
	}


	/* Company Details */

	/*  Company */

	public function company()
	{
		$data = array();
		$table_name = "company";
		$data['lists'] = $this->setup_model->show_list($table_name,$where=NULL);
		$data['subview'] = $this->load->view('parking/setup/company/index', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	}

	public function add_company()
	{
		$data = array();
		$data['subview'] = $this->load->view('parking/setup/company/add_company', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	
	}

	public function add_company_act()
	{
		
        if(isset($_POST))
        {
                $data = array(
                    'name' => $_POST['name'],
                   /* 'type' => $_POST['type'],*/
                    'status' => "Active"
                     );
                $table_name = "company";
                $last_id = $this->setup_model->insert_table($data,$table_name);
                redirect('setup/company');
	    }
    }

    public function edit_company($id)
	{
		$data = array();
		$table_name = 'company';
		$key = 'id';
		$data['list'] = $this->setup_model->select_table($id,$key,$table_name);
		$data['subview'] = $this->load->view('parking/setup/company/edit_company', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	}

	public function edit_company_act()
	{
	
        if(isset($_POST))
        {
                $data = array(
                    'name' => $_POST['name'],
                   /* 'type' => $_POST['type'],*/
                    'status' => $_POST['status']
                     );
                $table_name = "company";
                $where['id'] = $_POST['id'];
                $last_id = $this->setup_model->update_table($where,$table_name,$data);
                redirect('setup/company');
	    }
    }


    public function delete_company($id)
	{
		$data = array();
		$table_name = "company";
		$where['id'] = $id;
		$data['list'] = $this->setup_model->delete_table($where,$table_name);
		redirect('setup/company');
	}

	/*  Add Filter Company */

	

	public function filterService()
	{
            $data = array();
            $table_name = "filterservice";
            $data['lists'] = $this->setup_model->show_list($table_name,$where=NULL);
            $data['subview'] = $this->load->view('parking/setup/filterService/index', $data, TRUE);
            $this->load->view('_layout_main', $data); //page load
	}

	public function change_serviceType()
	{
	   	$data = array();
		$table_name = "company";
		$where['type'] = $_POST['type'];
		$data['company'] = $this->setup_model->show_list($table_name,$where);
       //  echo $this->db->last_query();
		 $this->load->view('parking/setup/filterService/ajax_serviceType',$data);
      
	}

	public function add_filterService()
	{
		    $this->load->model('purchase_model');
            $product_id = $this->setup_model->getLastRowId();
            $time = time();
            $data = array();
            $table_name = "company";
            $where['status'] = "Active";
            $data['company'] = $this->setup_model->show_list($table_name,$where);
            $data['supplier'] = $this->purchase_model->getSupplier();
            //$data['company'] = $this->setup_model->getLastRowId();
            $table_name = "servicetype";
            $data['servicetype'] = $this->setup_model->show_list($table_name,$where = null);
            $data['code']    = $time."".$product_id; 
            $data['subview'] = $this->load->view('parking/setup/filterService/add_filterService', $data, TRUE);
            $this->load->view('_layout_main', $data); //page load
	
	}

	public function add_filterService_act()
	{	
        if(isset($_POST))
        {
                $data = array(
                    'company_id' => $_POST['company_id'],
                    'code' => $_POST['code'],
                    'type' => $_POST['type'],
                    'price' => $_POST['price'],
                    'salesprice' => $_POST['salesprice'],
                    'quantity' => $_POST['quantity'],
                    'item' => $_POST['item'],
                    'status' => "Active"
                     );
                $table_name = "filterservice";
                $last_id = $this->setup_model->insert_table($data,$table_name);
                if(!empty($_POST['quantity']))
                {
                   $this->purchase_item($this->input->post(),$last_id);
                }
                redirect('setup/filterService');
	    }
    }

    function purchase_item($post,$last_id)
    {
       $this->load->model('purchase_model');
       $this->load->model('log_model');	
       $reference_no = $this->purchase_model->createReferenceNo();
       if($reference_no==null){
                        $no = sprintf('%06d',intval(1));
                    }
                    else{
                      foreach ($reference_no as $value) {
                        $no = sprintf('%06d',intval($value->purchase_id)+1); 
                      }
                    }
       $ref = "RE-$no";             

       $warehouse_id = 1;
            $data = array(
                "date" => date("Y-m-d"),
                "reference_no" => $ref,
                "supplier_id" => $this->input->post('supplier'),
                "warehouse_id" => $warehouse_id,
                "total" => $post['grand_total'],
                "discount_value" => 0,
                "tax_value" => $post['tax'],
                "note" => "",
                "user" => $this->session->userdata('id')
                );
            $invoice = array(
                "invoice_no" => $this->purchase_model->generateInvoiceNo(),
                "receipt_amount" => $post['grand_total'],
                "receipt_voucher_date" => date('Y-m-d')
            );
            if ($purchase_id = $this->purchase_model->addModel($data, $invoice)) {
                $log_data = array(
                    'user_id' => $this->session->userdata('user_id'),
                    'table_id' => $purchase_id,
                    'message' => 'Purchase Inserted'
                );
                $this->log_model->insert_log($log_data);
                $purchase_item_data = $this->input->post('table_data');

                $product_id = $value->product_id;
                $quantity = $value->quantity;
                $data = array(
                            "product_id" => $last_id,
                            "quantity" => $post['quantity'],
                            "gross_total" => $post['grand_total'],
                            "discount_id" => 0,
                            "discount_value" => 0,
                            "discount" => 0,
                            "tax_id" => 1,
                            "tax_value" => $post['tax'],
                            "tax" => 5,
                            "cost" => $_POST['price'],
                            "purchase_id" => $purchase_id
                             );
                $warehouse_data = array(
                            "product_id" => $last_id,
                            "warehouse_id" => $warehouse_id,
                            "quantity" => $post['quantity']
                            );
                        //$this->purchase_model->updateProductQuantity($value->product_id, $value->quantity);
                $this->purchase_model->addProductInWarehouse($product_id,$quantity,$warehouse_id,$warehouse_data);
                if ($this->purchase_model->addPurchaseItem($data)) {
                        }
                    }
    }

    public function add_filterService_ajax()
	{	
        if(isset($_POST))
        {
                $data = array(
                    'company_id' => $_POST['company_id'],
                    'code' => $_POST['code'],
                    'type' => $_POST['type'],
                    'price' => $_POST['price'],
                    'salesprice' => $_POST['salesprice'],
                    'item' => $_POST['item'],
                    'status' => "Active"
                     );
                $table_name = "filterservice";
                $last_id = $this->setup_model->insert_table($data,$table_name);

            $product_id = $this->setup_model->getLastRowId();
            $time = time();
            $data = array();
            $table_name = "company";
            $where['status'] = "Active";
            $data['company'] = $this->setup_model->show_list($table_name,$where);
            //$data['company'] = $this->setup_model->getLastRowId();
            $table_name = "servicetype";
            $data['servicetype'] = $this->setup_model->show_list($table_name,$where = null);
            $data['code']     = $time."".$product_id;
                
            echo $product_id;   
                
                // redirect('setup/filterService');
	    }
    }

    public function edit_filterService($id)
	{
		$data = array();
		$table_name = "company";
		$where['status'] = "Active";
		$data['company'] = $this->setup_model->show_list($table_name,$where);
		$table_name = "servicetype";
		$data['servicetype'] = $this->setup_model->show_list($table_name,$where = null);
		$table_name = 'filterservice';
		$key = 'id';
		$data['list'] = $this->setup_model->select_table($id,$key,$table_name);
		$data['subview'] = $this->load->view('parking/setup/filterService/edit_filterService', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	}

	public function edit_filterService_act()
	{
	//echo '<pre>';print_r($_POST);die;
        if(isset($_POST))
        {
                $data = array(
                    'company_id' => $_POST['company_id'],
                    'type' =>  $_POST['type'],
                    'price' => $_POST['price'],
                    'salesprice' => $_POST['salesprice'],
                    'item' =>  $_POST['item'],
                    'quantity' => $_POST['quantity'],
                    /* 'litre' => $_POST['litre'], */
                    'status' => $_POST['status']
                    
                     );
                $table_name = "filterservice";
                $where['id'] = $_POST['id'];
                $id = $_POST['id'];
                $last_id = $this->setup_model->update_table($where,$table_name,$data);
                if(!empty($_POST['quantity']))
                {
                   $this->purchase_item($this->input->post(),$id);
                  // echo $this->db->last_query(); exit;
                }
                redirect('setup/filterService');
	    }
    }


    public function delete_filterService($id)
	{
		$data = array();
		$table_name = "filterservice";
		$where['id'] = $id;
		$data['list'] = $this->setup_model->delete_table($where,$table_name);
		redirect('setup/filterService');
	}
	
	public function shift()
	{
		$data = array();
		$table_name = "shift";
		$where['IsDeleted'] = 0; 
		$data['lists'] = $this->setup_model->show_list($table_name,$where);
		$data['subview'] = $this->load->view('parking/setup/shift/index', $data, TRUE);
		$this->load->view('_layout_main',$data); //page load
	}
	public function shift_action($id = null)
	{   
		 if($this->input->post())
		 {
			 $post = $this->input->post(); 
			 $data = array(
				'name' => $post['name'],
				'startshift' =>  $post['startshift'],
				'endshift' => $post['endshift'],
				 );
			 if(isset($post['shift_id']))
			 {
				$id = $post['shift_id']; 
				$this->db->where('id',$id)->update('shift',$data); 
			 }
			 else{
				$this->db->insert('shift',$data);
				$last_id = $this->db->insert_id(); 
			 }
			 redirect('Setup/shift');	 
		 }
		 else{
			$data = array();
			if(!empty($id)) 
			{
			$table_name = "shift";
			$data['row'] = $this->db->where('id',$id)->get('shift')->row();
			}
			$data['subview'] = $this->load->view('parking/setup/shift/add_shift',$data, TRUE);
			$this->load->view('_layout_main',$data);
		   }
	}

	public function shift_delete($id)
	{
		$data = array();
		$data['IsDeleted'] = 1;
		$this->db->where('id',$id)->update('shift',$data); 
		redirect('Setup/shift');
	}

	







}
