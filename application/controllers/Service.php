<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $data = array();
        $this->load->model('vehicle_model');

    }

	public function index()
	{
		$data = array();
		$table_name = "mainService";
		$data['lists'] = $this->vehicle_model->show_list($table_name,$where=NULL);
		$data['subview'] = $this->load->view('parking/service/index', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	}

	public function change_vehicle()
	{
		$id = $_POST['id'];

		$table_name = "cartype";
		$key = 'id';
		$list = $this->vehicle_model->select_table($id,$key,$table_name);
		if(!empty($list))
		{
			echo $list->price;
		}
		else
		{
			echo "00";
		}

	}

	public function add_service()
	{
		$data = array();
		$table_name = "mainservice";
		$last_id = $this->vehicle_model->getLastId($table_name); 
	    $lasts_id = $last_id->id;
	    $data['last_id'] =  sprintf("%05d",$last_id->id + 1);
		$table_name = "cartype";
		$data['cartype'] = $this->vehicle_model->show_list($table_name,$where=NULL);
		$table_name = "servicetype";
		$data['servicetype'] = $this->vehicle_model->show_list($table_name,$where=NULL);
		$table_name = "servicecate";
		$data['servicecate'] = $this->vehicle_model->show_list($table_name,$where=NULL);
		$data['subview'] = $this->load->view('parking/service/add_service', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	
	}

	public function add_service_act()
	{
		// print_r($_POST); exit;
		
        if(isset($_POST))
        {  
        	  $name = $_POST['name'];
        	  $vehicleType = $_POST['vehicleType'];
        	  $price = $_POST['price'];
        	  $serviceType = json_encode($_POST["serviceType"]);
        	  $serviceCat = json_encode($_POST["serviceCat"]);
              $data = array(
                	'service_code' => $_POST['service_code'],
                    'name' => $name,
                    'vehicleType' => $vehicleType,
                    'price'       => $price,
                    'serviceType' => $serviceType,
                    'serviceCat' =>  $serviceCat
                      );
              $table_name = "mainservice";
              $last_id = $this->vehicle_model->insert_table($data,$table_name);

              $count =   end(array_keys($_POST['key']));

            for($i=2; $i <=$count ; $i++) {
            	if(!empty($_POST["vehicleType$i"]))
            	{
              $serviceType2 = json_encode($_POST["serviceType$i"]);
        	  $serviceCat2 = json_encode($_POST["serviceCat$i"]);
        	  $vehicleType2 = $_POST["vehicleType$i"];
        	  $price2 = $_POST["price$i"];
              $data = array(
                	'service_code' => $_POST['service_code'],
                    'name' => $name,
                    'vehicleType' => $vehicleType2,
                    'price'       => $price2,
                    'serviceType' => $serviceType2,
                    'serviceCat' =>  $serviceCat2
                       ); 
              $last_id = $this->vehicle_model->insert_table($data,$table_name);
              }
             }

        }
               redirect('service');
    }

    public function edit_service($id)
	{
		$data = array();
		$table_name = 'servicetype';
		$key = 'id';
		$data['list'] = $this->setup_model->select_table($id,$key,$table_name);
		$data['subview'] = $this->load->view('parking/service/edit_service', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	}

	public function edit_service_act()
	{
	
        if(isset($_POST))
        {
                $data = array(
                    'name' => $_POST['name'],
                    'price' => $_POST['price']
                     );
                $table_name = "servicetype";
                $where['id'] = $_POST['id'];
                $last_id = $this->setup_model->update_table($where,$table_name,$data);
                redirect('service');
	    }
    }


    public function delete_service($id)
	{
		$data = array();
		$table_name = "servicetype";
		$where['id'] = $id;
		$data['list'] = $this->setup_model->delete_table($where,$table_name);
		redirect('service');
	}
}