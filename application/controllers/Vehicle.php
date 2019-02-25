<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle extends MY_Controller {

    function __construct() {
        parent::__construct();
        $data = array();
        $this->load->model('vehicle_model');
        $this->load->model('log_model');
        $this->load->model('customer_model');
    }

    public function index() {
        //echo '<pre>';print_r($this->session);
        $data = array();
        $table_name = "vehicle";
//        $data['lists'] = $this->vehicle_model->show_list($table_name, $where = NULL);
        $data['lists'] = $this->vehicle_model->getVehicleList();
        $data['subview'] = $this->load->view('parking/vehicle/index', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
    }

    public function getvehiclefeatures_subcat($id) {
        $this->db->where('features_id', $id);
        $query = $this->db->get('vehiclefeatures_subcat');
        $data = $query->result();
        echo json_encode($data);
    }

    public function add_vehicle() {
        $data = array();
        $customer_table = 'customer';
        $data['customers'] = $this->vehicle_model->show_list($customer_table, $where = NULL);
        $car_table = 'car';
        $data['cars'] = $this->vehicle_model->show_list($car_table, $where = NULL);
        $cartype_table = 'cartype';
        $data['cartypes'] = $this->vehicle_model->show_list($cartype_table, $where = NULL);
        $color_table = 'color';
        $data['colors'] = $this->vehicle_model->show_list($color_table, $where = NULL);
        
        $vehicletype_name = "servicecate";
        $data['vehicletype'] = $this->vehicle_model->show_list($vehicletype_name,$where=NULL);

        $data['enginetype'] = $this->vehicle_model->show_list('enginetype', $where = NULL);
        $data['vehiclesize'] = $this->vehicle_model->show_list('vehiclesize', $where = NULL);
        $data['vehicleusage'] = $this->vehicle_model->show_list('vehicleusage', $where = NULL);
        $data['vehiclelegal'] = $this->vehicle_model->show_list('vehiclelegal', $where = NULL);
        $data['vehicleutil'] = $this->vehicle_model->show_list('vehicleutil', $where = NULL);
        $data['vehicleclass'] = $this->vehicle_model->show_list('vehicleclass', $where = NULL);
        $data['vehiclefeatures'] = $this->vehicle_model->show_list('vehiclefeatures', $where = NULL);
        $data['vehiclecondition'] = $this->vehicle_model->show_list('vehiclecondition', $where = NULL);
        $data['vehiclemodel'] = $this->vehicle_model->show_list('vehiclemodel', $where = NULL);
        $data['vehiclefeatures_subcat'] = $this->vehicle_model->show_list('vehiclefeatures_subcat', $where = NULL);

        $table_name = 'vehicle';
        $last_id = $this->vehicle_model->getLastId($table_name);
        $data['last_id'] = $last_id->id;

        $data['subview'] = $this->load->view('parking/vehicle/add_vehicle', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
    }

    public function add_vehicle_act() {
        if ($this->input->post()) {
            $post = $this->input->post();
            $this->db->where('vehicleNumber', $post['vehicleNumber']);
            $query = $this->db->get('vehicle');
            if ($query->num_rows() == 1) {
                $response = array('success' => false, 'message' => 'Oops this vehicle number already registered with us.');
                echo json_encode($response);
                exit;
            }
            $data = array(
                'vehicleCode' => $post['vehicleCode'],
                'vehicleNumber' => $post['vehicleNumber'],
                'customerId' => $post['customerID'],
                'vehicleColor' => $post['vehicleColor'],
                'vehicleBrand' => $post['vehicleBrand'],
                'vehiclemodel' => $post['vehiclemodel'],
                'vehicleType' => $post['vehicleType'],
                'enginetype' => $post['enginetype'],
                'vehiclesize' => $post['vehiclesize'],
                'vehicleusage' => $post['vehicleusage'],
                'vehiclelegal' => $post['vehiclelegal'],
                'vehicleutil' => $post['vehicleutil'],
                'vehicleclass' => $post['vehicleclass'],
                'vehiclefeatures' => $post['vehiclefeatures'],
                'vehiclecondition' => $post['vehiclecondition'],
                'Year' => $post['Year'],
                'VehicleChassisNumber' => $post['VehicleChassisNumber'],
                'VehicleRegistrationNumber' => $post['VehicleRegistrationNumber'],
                'Millage' => $post['Millage'],
                'Trim' => $post['Trim'],
                'vehiclefeatures_cat' => $post['vehiclefeatures_cat'],
            );
            $last_id = $this->vehicle_model->insert_table($data, 'vehicle');
            if (!empty($last_id) && $last_id > 0) {
                $log_data = array(
                    'user_id' => $this->session->userdata('id'),
                    'table_id' => $last_id,
                    'message' => 'Vehicle Inserted'
                );
                $this->log_model->insert_log($log_data);
                $response = array('success' => true, 'message' => 'Save successfully');
                echo json_encode($response);
                exit;
            } else {
                $response = array('success' => false, 'message' => 'Unable to  save. try again');
                echo json_encode($response);
                exit;
            }

            //redirect('vehicle');
        }
    }

    public function edit_vehicle($id) {
        $data = array();
        $customer_table = 'customer';
        $data['customers'] = $this->vehicle_model->show_list($customer_table, $where = NULL);
        $car_table = 'car';
        $data['cars'] = $this->vehicle_model->show_list($car_table, $where = NULL);
        $cartype_table = 'cartype';
        $data['cartypes'] = $this->vehicle_model->show_list($cartype_table, $where = NULL);
        $color_table = 'color';
        $data['colors'] = $this->vehicle_model->show_list($color_table, $where = NULL);
        
        $vehicletype_name = "servicecate";
        $data['vehicletype'] = $this->vehicle_model->show_list($vehicletype_name,$where=NULL);
        
        $data['enginetype'] = $this->vehicle_model->show_list('enginetype',$where=NULL);
        $data['vehiclesize'] = $this->vehicle_model->show_list('vehiclesize',$where=NULL);
        $data['vehicleusage'] = $this->vehicle_model->show_list('vehicleusage',$where=NULL);
        $data['vehiclelegal'] = $this->vehicle_model->show_list('vehiclelegal',$where=NULL);
        $data['vehicleutil'] = $this->vehicle_model->show_list('vehicleutil',$where=NULL);
        $data['vehicleclass'] = $this->vehicle_model->show_list('vehicleclass',$where=NULL);
        $data['vehiclefeatures'] = $this->vehicle_model->show_list('vehiclefeatures',$where=NULL);
        $data['vehiclecondition'] = $this->vehicle_model->show_list('vehiclecondition',$where=NULL);
        $data['vehiclemodel'] = $this->vehicle_model->show_list('vehiclemodel',$where=NULL);
        $data['vehiclefeatures_subcat'] = $this->vehicle_model->show_list('vehiclefeatures_subcat',$where=NULL);
        
        $table_name = 'vehicle';
        $key = 'id';
        $data['list'] = $this->vehicle_model->select_table($id, $key, $table_name);
        $data['subview'] = $this->load->view('parking/vehicle/edit_vehicle', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
    }

    public function edit_vehicle_act() {
        $rand = rand();
        
        if($this->input->post()){
            $post = $this->input->post();;
            $Details = $this->vehicle_model->select_table($post['id'],'id','vehicle');
            if($Details->vehicleNumber != trim($this->input->post('vehicleNumber'))){
                $this->db->where('vehicleNumber', $this->input->post('vehicleNumber'));
                $query = $this->db->get('vehicle');
                if($query->num_rows() == 1){
                    $response = array('success' => false, 'message' => 'Oops this vehicle number already registered with us.');
                    echo json_encode($response);
                    exit;
                }
            }
            $data = array(
                'vehicleCode' => $post['vehicleCode'],
                'vehicleNumber' => $post['vehicleNumber'],
                'customerId' => $post['customerID'],
                'vehicleColor' => $post['vehicleColor'],
                'vehicleBrand' => $post['vehicleBrand'],
                'vehiclemodel' => $post['vehiclemodel'],
                'vehicleType' => $post['vehicleType'],
                'enginetype' => $post['enginetype'],
                'vehiclesize' => $post['vehiclesize'],
                'vehicleusage' => $post['vehicleusage'],
                'vehiclelegal' => $post['vehiclelegal'],
                'vehicleutil' => $post['vehicleutil'],
                'vehicleclass' => $post['vehicleclass'],
                'vehiclefeatures' => $post['vehiclefeatures'],
                'vehiclecondition' => $post['vehiclecondition'],
                'Year' => $post['Year'],
                'VehicleChassisNumber' => $post['VehicleChassisNumber'],
                'VehicleRegistrationNumber' => $post['VehicleRegistrationNumber'],
                'Millage' => $post['Millage'],
                'Trim' => $post['Trim'],
                'vehiclefeatures_cat' => $post['vehiclefeatures_cat'],
            );
            $where['id'] = $post['id'];
            $last_id = $this->vehicle_model->update_table($where,'vehicle',$data);
            if (!empty($last_id) && $last_id > 0) {
                $log_data = array(
                        'user_id'  => $this->session->userdata('user_id'),
                        'table_id' => $post['id'],
                        'message'  => 'Vehicle Updated'
                    );
                $this->log_model->insert_log($log_data);
                $response = array('success' => true, 'message' => 'Update successfully');
                echo json_encode($response);
                exit;
            } else {
                $response = array('success' => false, 'message' => 'Unable to  save. try again');
                echo json_encode($response);
                exit;
            }

            //redirect('vehicle');

        }
        
        if (isset($_POST)) {
            $data = array(
                'vehicleCode' => $_POST['vehicleCode'],
                'vehicleNumber' => $_POST['vehicleNumber'],
                'customerId' => $_POST['customerID'],
                'vehicleColor' => $_POST['vehicleColor'],
                'vehicleBrand' => $_POST['vehicleBrand'],
                'vehicleType' => $_POST['vehicleType'],
            );
            $table_name = "vehicle";
            $where['id'] = $_POST['id'];
            $last_id = $this->vehicle_model->update_table($where, $table_name, $data);
            redirect('vehicle');
        }
    }

    public function delete_vehicle($id) {
        $data = array();
        $table_name = "vehicle";
        $where['id'] = $id;
        $data['list'] = $this->vehicle_model->delete_table($where, $table_name);
        redirect('vehicle');
    }

    /* Vechicle Type */

    public function vehicleType() {
        $data = array();
        $table_name = "cartype";
        $data['lists'] = $this->vehicle_model->show_list($table_name, $where = NULL);
        $data['subview'] = $this->load->view('parking/vehicle/vehicleType', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
    }

    public function add_vehicleType() {
        $data = array();
        $data['subview'] = $this->load->view('parking/vehicle/add_vehicleType', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
    }

    public function add_vehicleType_act() {

        if (isset($_POST)) {
            $data = array(
                'carType' => $_POST['carType'],
                'price' => $_POST['price'],
                'echo_price' => $_POST['echo_price'],
                'echo_status' => $_POST['echo_status']
            );
            $table_name = "cartype";
            $last_id = $this->vehicle_model->insert_table($data, $table_name);
            redirect('vehicle/vehicleType');
        }
    }

    public function edit_vehicleType($id) {
        $data = array();
        $table_name = 'cartype';
        $key = 'id';
        $data['list'] = $this->vehicle_model->select_table($id, $key, $table_name);
        $data['subview'] = $this->load->view('parking/vehicle/edit_vehicleType', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
    }

    public function edit_vehicleType_act() {

        if (isset($_POST)) {
            $data = array(
                'carType' => $_POST['carType'],
                'price' => $_POST['price'],
                'echo_price' => $_POST['echo_price'],
                'echo_status' => $_POST['echo_status']
            );
            $table_name = "cartype";
            $where['id'] = $_POST['id'];
            $last_id = $this->vehicle_model->update_table($where, $table_name, $data);
            redirect('vehicle/vehicleType');
        }
    }

    public function delete_vehicleType($id) {
        $data = array();
        $table_name = "cartype";
        $where['id'] = $id;
        $data['list'] = $this->vehicle_model->delete_table($where, $table_name);
        redirect('vehicle/vehicleType');
    }

    /*  Hourly Vehicle */

    public function vehicleIn() {
        $data = array();
        $table_name = 'vehicleInOut';
        $last_id = $this->vehicle_model->getLastId($table_name);
        $last_id = $last_id->id + 1;
        $last_id = sprintf('%05d', $last_id);
        $data['last_id'] = $last_id;
        $data['subview'] = $this->load->view('parking/vehicle/vehicleIn', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load

	
	}

	/*public function change_driver()
	{
	   $vehicleNumber = $_POST['vehicle_no'];
	   $key = 'vehicleNumber';
	   $table_name = 'vehicle';
	   $list = $this->vehicle_model->select_table($vehicleNumber,$key,$table_name);
	   if(!empty($list))
	   {
	   	$key ='id';
	   	$table_name = 'customer';
	   	$id = $list->customerId;
	   	$customer = $this->vehicle_model->select_table($id,$key,$table_name);
	   	echo $customer->customerName;
	   }
	   else
	   {
	   	echo "Driver-In-Customer";
	   }


	}*/

	public function change_driver()
	{
	   $vehicleNumber = $_POST['vehicle_no'];
	   $key = 'vehicleNumber';
	   $table_name = 'vehicle';
	   $list = $this->vehicle_model->select_table($vehicleNumber,$key,$table_name);
           //echo '<pre>';print_r($list);die;
	   if(!empty($list))
	   {
               
               $Customerdata = $this->customer_model->getRecordRow($list->customerId);
               $vehicleModel = vehicleModel($list->vehiclemodel);
               $response = array('customer_id' => $Customerdata->id, 'customer_name' => $Customerdata->customerName, 'mobile' => $Customerdata->localMobile,'trn' => $list->Trim,'trn_no' => $Customerdata->trn_no,'Millage' => $list->Millage,'vehicleModel'=>$vehicleModel);
                echo json_encode($response); exit;
	   //	echo $list->customerName;
	   }
	   else
	   {
	     $response = array('customer_id' => 0, 'customer_name' => 'Driver-In-Customer', 'mobile' => '','trn' => '','Millage' => '','vehicleModel'=>'');
                echo json_encode($response);
                exit;
	   }

	}

	

	public function in_act()
	{
		if(isset($_POST))
        {
                $data = array(
                    'invNumber' => $_POST['invoiceCode'],
                    'dateIn' => $_POST['DateIn'],
                    'timeIn' =>    $_POST['TimeIn'],
                    'VehicleNumber' => $_POST['VehicleNumber'],
                    'customerName' => $_POST['customerName'],
                    'InvType' => 'Hourly',
                    'status' => 'Open',
                    'createdBy' =>'Admin',
                    'created' =>$_POST['created']
                     );
                $table_name = "vehicleInOut";
                $last_id = $this->vehicle_model->insert_table($data,$table_name);
                redirect('vehicle/vehicleIn');
	    }
	}

//	public function vehicleOut()
//	{
//		$data = array();
//		$data['subview'] = $this->load->view('parking/vehicle/vehicleOut',$data, TRUE);
//    }

    /* public function change_driver()
      {
      $vehicleNumber = $_POST['vehicle_no'];
      $key = 'vehicleNumber';
      $table_name = 'vehicle';
      $list = $this->vehicle_model->select_table($vehicleNumber,$key,$table_name);
      if(!empty($list))
      {
      $key ='id';
      $table_name = 'customer';
      $id = $list->customerId;
      $customer = $this->vehicle_model->select_table($id,$key,$table_name);
      echo $customer->customerName;
      }
      else
      {
      echo "Driver-In-Customer";
      }


      } */

//    public function change_driver() {
//        $vehicleNumber = $_POST['vehicle_no'];
//        $key = 'vehicle_no';
//        $table_name = 'customer';
//        $list = $this->vehicle_model->select_table($vehicleNumber, $key, $table_name);
//        if (!empty($list)) {
//            echo $list->customerName;
//        } else {
//            echo "Driver-In-Customer";
//        }
//    }

//    public function in_act() {
//        if (isset($_POST)) {
//            $data = array(
//                'invNumber' => $_POST['invoiceCode'],
//                'dateIn' => $_POST['DateIn'],
//                'timeIn' => $_POST['TimeIn'],
//                'VehicleNumber' => $_POST['VehicleNumber'],
//                'customerName' => $_POST['customerName'],
//                'InvType' => 'Hourly',
//                'status' => 'Open',
//                'createdBy' => 'Admin',
//                'created' => $_POST['created']
//            );
//            $table_name = "vehicleInOut";
//            $last_id = $this->vehicle_model->insert_table($data, $table_name);
//            redirect('vehicle/vehicleIn');
//        }
//    }

    public function vehicleOut() {
        $data = array();
        $data['subview'] = $this->load->view('parking/vehicle/vehicleOut', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
    }

    public function getInvoice() {
        $InvNumber = $_POST['invoiceCode'];
        $key = 'InvNumber';
        $table_name = 'vehicleInOut';
        $list = $this->vehicle_model->select_table($InvNumber, $key, $table_name);
        if (!empty($list)) {
            redirect("vehicle/vehicleOut2/$list->id");
        } else {
            $this->session->set_flashdata('error', 'Invoice Number Not Match');
            redirect("vehicle/vehicleOut");
        }
    }

    public function vehicleOut2($id) {
        $data = array();
        $table_name = 'vehicleInOut';
        $key = 'id';
        $data['list'] = $this->vehicle_model->select_table($id, $key, $table_name);
        $data['subview'] = $this->load->view('parking/vehicle/vehicleOut2', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
    }

    public function out_act() {
        if (isset($_POST)) {
            $data = array(
                'dateOut' => $_POST['DateOut'],
                'timeOut' => $_POST['TimeOut'],
                'invAmount' => $_POST['invoiceAmount'],
                'invVat' => $_POST['invoiceVat'],
                'status' => 'Closed',
                'closedBy' => 'Admin'
            );
            $where['id'] = $_POST['id'];
            $table_name = "vehicleInOut";
            $last_id = $this->vehicle_model->update_table($where, $table_name, $data);
            redirect('vehicle/vehicleIn');
        }
    }

    /* Daily Vehicle */

    public function daily() {
        $data = array();
        $data['subview'] = $this->load->view('parking/vehicle/daily', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
    }

    /* Monthly Vehicle */

    public function monthly() {
        $data = array();
        $data['subview'] = $this->load->view('parking/vehicle/monthly', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
    }

    /* Invoice */

    public function invoices() {
        $data = array();
        $data['subview'] = $this->load->view('parking/vehicle/invoices', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
    }

    /* Report */

    public function rptdate() {
        $data = array();
        $data['subview'] = $this->load->view('parking/vehicle/rptdate', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
    }

    public function rptCustomer() {
        $data = array();
        $data['subview'] = $this->load->view('parking/vehicle/rptCustomer', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
    }

    public function rptLocation() {
        $data = array();
        $data['subview'] = $this->load->view('parking/vehicle/rptLocation', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
    }

    /* Print */

    public function Closedprint() {
        $data = array();
        $this->load->view('parking/vehicle/Closedprint', $data);
    }

}
