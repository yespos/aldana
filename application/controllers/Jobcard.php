<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobcard extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $data = array();
        $this->load->model('jobcard_model');
				$this->load->model('customer_model');
				$this->load->model('payment_model');
    }

  public function index()
	{ 
		$data = array();
		$table_name = 'jobcard';
	/* 	$last_id = $this->jobcard_model->getLastId($table_name);
	  $last_id = $last_id->id + 1;
		$last_id = sprintf('%05d', $last_id);  */
		$last_id = $this->jobcard_model->getLastjobcard_no("jobcard",2);
		$last_id = $last_id->id + 1;
		$last_id = sprintf('%05d', $last_id); 
		// $ref_no = "INVE-".$last_id;
		$data['last_id'] = $last_id;
		$table_name = "cartype";
		$data['cartype'] = $this->jobcard_model->show_list($table_name,$where=NULL);
		$table_name = "mainservice";
		$group = 'service_code';
		$data['mainservice'] = $this->jobcard_model->show_details($table_name,$group,$where,$order);
		$table_name = "servicetype";
		$data['servicetype'] = $this->jobcard_model->show_list($table_name,$where=NULL);
		$table_name = "servicecate";
		$data['vehicletype'] = $this->jobcard_model->show_list($table_name,$where=NULL); 
		$data['subview'] = $this->load->view('parking/jobcard/index', $data, TRUE);
    $this->load->view('_layout_main', $data); //page load
   }

    public function change_services()
    {
        $vehicleType = $_POST['vehicleType']; 
        $service = $_POST['service'];  
        $where = array(
           'service_code' => $service,
           'vehicleType' =>  $vehicleType
         );
       // print_r($where); exit;
    $table_name = "mainservice";
		$key = 'id';
		$data['list'] = $this->jobcard_model->select_table2($where,$table_name);
		$table_name = "servicetype";
		$data['servicetype'] = $this->jobcard_model->show_list($table_name,$where=NULL);
		$table_name = "servicecate";
		$data['servicecate'] = $this->jobcard_model->show_list($table_name,$where=NULL);
		$this->load->view('parking/jobcard/ajax_services', $data);
    }

    public function add_jobcard_act()
    {      // echo '<pre>';print_r($_POST);die;
				   //	$ref_no = $_POST['ref_no'];
				  $post = $this->input->post();
					$last_id = $this->jobcard_model->getLastjobcard_no("jobcard",2);
		      $last_id = $last_id->id + 1;
		      $last_id = sprintf('%05d', $last_id); 
		      $ref_no = "INVJ-".$last_id;
          /*$check_ref = $this->jobcard_model->check_ref($ref_no); 
          if($check_ref) 
          {
            redirect("jobcard/jobcard_print/$check_ref");
          } */ 
           if(empty(trim($post['car_plate']))){
            $response = array('success' => false, 'message' => 'Please enter Vehicle number.');
            echo json_encode($response);
            exit;
            }
           $customer_id = !empty($post['customer_id'])?$post['customer_id']:0;
           if($post['pay_type'] ==7)
           {
             $customerName = !empty($post['credit_customer'])?$post['credit_customer']:$post['customer_name'];
             $mobile = !empty($post['phone'])?$post['phone']:$post['mobile'];
             $isCredit = 1;
           }
           else
           {
               $customerName = $post['customer_name'];
               $mobile = $post['mobile'];
               $isCredit = 0;
           }
           $data = array();
           $result = $this->calcution($_POST);
           if(empty($result['total']))
           {
               $response = array('success' => false, 'message' => 'Please Select at least One Service.');
               echo json_encode($response);
               exit;
           }
            if($post['pay_type'] ==8){
            $totalsum = 0;
            $multipay = $this->input->post('multipay');
            foreach ($multipay as $key => $value) {
             $totalsum = $totalsum + $value;
            }
            if($totalsum > $result['total']){
            $response = array('success' => false, 'paymodal'=>'show', 'message' =>'The Entered Amount is exceeds the Total Service Amount.','totalamount' => $result['total']);
            echo json_encode($response);
            exit;
             }
            if($totalsum ==0){
            $response = array('success' => false, 'paymodal'=>'show', 'message' =>'The Entered Amount.','totalamount' => $result['total']);
            echo json_encode($response);
            exit;
             }
            }
            // echo '<pre>';print_r($result);die;
           $vehicleNumber = $_POST['car_plate'];
           $key = 'vehicleNumber';
           $table_name = 'vehicle';
           $list = $this->jobcard_model->select_table($vehicleNumber,$key,$table_name);
           $customerDetails = $this->db->where('localMobile',$mobile)->get('customer')->row();
          /* print_r($customerDetails);
           echo $this->db->last_query(); exit;*/
           if(empty($customerDetails))
           {
            $table_name = 'customer';
            $last_id = $this->jobcard_model->getLastId($table_name); 
            $lasts_id = $last_id->id + 1;
            $customerCode = "CUS-0000".$lasts_id;
            $customer_data = array(
                'vehicle_no' => $_POST['car_plate'],
                'customerName' => $customerName,
                'localMobile' => $_POST['mobile'],
                'customerCode' => $customerCode,
                'trn_no' => $_POST['reg_no'],
                'isCredit' => $isCredit
                             );
            $table_name = "customer";
            $last_id = $this->jobcard_model->insert_table($customer_data,$table_name);
            // $this->db->last_query();
            $customer_id = $last_id;
           }
           if(empty($list))
           {
            $table_name = "vehicle";
            $vcode = $this->jobcard_model->getLastId($table_name); 
            $code = $vcode->id + 1;
            $vehicleCode = "VH-0000".$code;
            $vehicledata = array(
                                 'vehicleNumber'=>$_POST['car_plate'],
                                 'vehicleCode' =>$vehicleCode,
                                 'Millage' => $_POST['mileage'],
                                 'Trim' =>$_POST['reg_no'],
                                 'customerId' =>$customer_id );
            $last_id = $this->jobcard_model->insert_table($vehicledata,$table_name);
           // $this->db->last_query();
           }
           else
           {
              $customer_id = $list->customerId;
					 }
					 
		    $rand = rand();
        if(isset($_POST))
        {
                $date = $_POST['DateIn']; 
                $curr_date = date("Y-m-d", strtotime($date));
                // date_format('Y-m-d',$date); 
                $data = array(
                    'ref_no' => $ref_no,
                    'date' => $curr_date,
                    'time' => $_POST['TimeIn'],
										'car_plate' => $_POST['car_plate'],
										'customer_id' => $customer_id,
                    'customer_name' => $customerName,
                    'model' => $_POST['model'],
                    'reg_no' => $_POST['reg_no'],
                    'invoice_ref' => $_POST['invoice_ref'],
                    'mileage' => $_POST['mileage'],
                    'mobile' => $_POST['mobile'],
                    'auth_by' => !empty($_POST['auth_by'])?$_POST['auth_by']:"",
                    'assigned_to' => $_POST['assigned_to'],
                    'pay_type' =>  !empty($_POST['pay_type'])?$_POST['pay_type']:"",
                    'status' => !empty($_POST['status'])?$_POST['status']:"",
                    'price'  => json_encode($result['price']),
                    'u_price'  => json_encode($result['u_price']),
                    'company'  => json_encode($result['company']),
                    'item'  => json_encode($result['item']),
                    'quantity'  => json_encode($result['quantity']),
                    'type'  => json_encode($result['type']),
                    's_price'  => json_encode($result['s_price']),
                    'us_price'  => json_encode($result['us_price']),
                    's_desc'  => json_encode($result['s_desc']),
                    's_quantity'  => json_encode($result['s_quantity']),
                    'service'  => json_encode($result['service']),
                    'wash_type' => $result['wash_type'],
                    'w_quantity' => $result['w_quantity'],
                    'w_price' => $result['w_price'],
                    'uw_price' => $result['uw_price'],
                    'vehicletype' => $result['vehicletype'],
                    'flush_oil' => $result['flush_oil'],
                    'f_quantity' => $result['f_quantity'],
                    'f_price' => $result['f_price'],
                    'uf_price' => $result['uf_price'],
                    'foc' => $result['foc_amount'],
                    'foc_service' => $result['foc_service'], 
                    'amount' => $result['subtotal'],
                    'vat' => $result['vat'],
										'discount' => $result['discount'],
										'discount_name' => $result['discount_name'],
										'discount_no' => $result['discount_no'],
										'total' => $result['total'],
                    'PaidAmount' => !empty($_POST['pay_type'])?$result['total']:0,
										'DueAmount' => !empty($_POST['pay_type'])?0:$result['total'],
										'shift_id' => $_POST['shift'],
					          'user_id' => $_POST['user_id'],
										'payment_status' => !empty($_POST['pay_type'])?19:17,
										'jobcardtype' => 2,
                    'offer' => $_POST['offer'],
                    'received_by' => $_POST['received_by'],
                    'tx_desc' => $_POST['tx_desc'],
										'created_at' => time(),
										'updated_at' => date('Y-m-d h:i:s'),
										 );
                $table_name = "jobcard";
                // echo "<pre>"; print_r($data); exit;
                $job_id = $this->jobcard_model->insert_table($data,$table_name);
                if($job_id)
                { 
                   $item = $result['item']; $quantity = $result['quantity'];
                   if(!empty($item) && !empty($quantity))
                   {
                     $this->detuct_product($item,$quantity,$job_id);
									 }
									 $this->add_jobcard_services($job_id,$post);
                   if(!empty($_POST['pay_type']))
                    {
                       $post['paid_amount'] = $result['total'];
                       $this->fullPayment($job_id,$post);
                    }
                }
                $car_plate = $_POST['car_plate'];
                $this->customer_service($result,$customer_id,$job_id,$car_plate);
                // $this->jobcard_print($job_id);

              if($job_id){
               $response = array('success' => true,'id'=>$job_id , 'message' => 'Jobcard draft successfully');
               echo json_encode($response);
               exit;
       // redirect("Jobcardwash/print/$addjobid", 'refresh');  
               }
              else
               {
                  $response = array('success' => false,'id'=>0, 'message' => 'Jobcard Not Updated');
                   echo json_encode($response);
                    exit;
                }

	     }
    
    }

  public function updatejobcard($id)
  { 
    $data = array();
    $whereJob['IsDeleted'] = 0;
    $whereJob['id'] = $id;
    $data['detail'] = $this->jobcard_model->getRow('jobcard',$whereJob);
   // echo "<pre>"; print_r($data['detail']); exit;
    // $data = array();
    $shift = getShift();
    // print_r($shift); exit;
        $table_name = 'jobcard';
       /*  $last_id = $this->jobcard_model->getLastId($table_name);
        $last_id = $last_id->id + 1;
        $last_id = sprintf('%05d', $last_id);  */
        $last_id = $this->jobcard_model->getLastjobcard_no("jobcard",2);
        $last_id = $last_id->id + 1;
        $last_id = sprintf('%05d', $last_id); 
    // $ref_no = "INVE-".$last_id;
        $data['last_id'] = $last_id;
        $table_name = "cartype";
        $data['cartype'] = $this->jobcard_model->show_list($table_name,$where=NULL);
        $table_name = "servicejob";
        $data['servicejob'] = $this->jobcard_model->show_list($table_name,$where=NULL);
        $table_name = "company";
        $where['status'] = "Active";
        $data['company'] = $this->jobcard_model->show_list($table_name,$where);
        $table_name = "servicetype";
        $data['servicetype'] = $this->jobcard_model->show_list($table_name,$where=null);
        $table_name = "filterservice";
        $data['filterservice'] = $this->jobcard_model->show_list($table_name,$where=NULL);
        $table_name = "servicecate";
        $data['vehicletype'] = $this->jobcard_model->show_list($table_name,$where=NULL);
        $table_name = "flushing";
        $data['flushing'] = $this->jobcard_model->show_list($table_name,$where=NULL);
        $table_name = "washing";
        $data['washing'] = $this->jobcard_model->show_list($table_name,$where=NULL);
        $data['worker'] =  $this->db->where('IsDeleted',0)->where('design_id',4)->get('admin')->result();
        $whereP['IsDeleted'] = 0;
        $data['paytype'] = $this->jobcard_model->show_list('payment_method',$whereP);
        $data['shifts'] = $this->db->where('IsDeleted',0)->get('shift')->result(); 
        /* $table_name = "company";
        $data['company'] = $this->jobcard_model->show_details($table_name,$group,$where= NULL,$order = NULL); */
         //echo "<pre>"; print_r($data); exit;
        $data['subview'] = $this->load->view('parking/jobcard/updatejobcard', $data, TRUE);
        $this->load->view('_layout_main', $data);
   } 


   public function update_jobcard_act()
    {      // echo '<pre>';print_r($_POST);die;
           // $ref_no = $_POST['ref_no'];
           $post = $this->input->post();
        
           if(empty(trim($post['car_plate']))){
            $response = array('success' => false, 'message' => 'Please enter Vehicle number.');
            echo json_encode($response);
            exit;
            }
           $customer_id = !empty($post['customer_id'])?$post['customer_id']:0;
           if($post['pay_type'] ==7)
           {
             $customerName = !empty($post['credit_customer'])?$post['credit_customer']:$post['customer_name'];
             $mobile = !empty($post['phone'])?$post['phone']:$post['mobile'];
             $isCredit = 1;
           }
           else
           {
               $customerName = $post['customer_name'];
               $mobile = $post['mobile'];
               $isCredit = 0;
           }
           $data = array();
           $result = $this->calcution($_POST);
           $PaidAmount = $this->input->post('PaidAmount');
           $DueAmount =  $result['total'] - $PaidAmount;
           if($DueAmount< 0)
           {
               $response = array('success' => false, 'message' => 'You Cannot Edit this Jobcard, Only Cancel is Allowed because Amount is Already Paid.');
               echo json_encode($response);
               exit;
           } 
           if(empty($result['total']))
           {
               $response = array('success' => false, 'message' => 'Please Select at least One Service.');
               echo json_encode($response);
               exit;
           }
            
            // echo '<pre>';print_r($result);die;
           $vehicleNumber = $_POST['car_plate'];
           $key = 'vehicleNumber';
           $table_name = 'vehicle';
           $list = $this->jobcard_model->select_table($vehicleNumber,$key,$table_name);
           $customerDetails = $this->db->where('localMobile',$mobile)->get('customer')->row();
          /* print_r($customerDetails);
           echo $this->db->last_query(); exit;*/
           if(empty($customerDetails))
           {
            $table_name = 'customer';
            $last_id = $this->jobcard_model->getLastId($table_name); 
            $lasts_id = $last_id->id + 1;
            $customerCode = "CUS-0000".$lasts_id;
            $customer_data = array(
                'vehicle_no' => $_POST['car_plate'],
                'customerName' => $customerName,
                'localMobile' => $_POST['mobile'],
                'customerCode' => $customerCode,
                'trn_no' => $_POST['reg_no'],
                'isCredit' => $isCredit
                             );
            $table_name = "customer";
            $last_id = $this->jobcard_model->insert_table($customer_data,$table_name);
            // $this->db->last_query();
            $customer_id = $last_id;
           }
           if(empty($list))
           {
            $table_name = "vehicle";
            $vcode = $this->jobcard_model->getLastId($table_name); 
            $code = $vcode->id + 1;
            $vehicleCode = "VH-0000".$code;
            $vehicledata = array(
                                 'vehicleNumber'=>$_POST['car_plate'],
                                 'vehicleCode' =>$vehicleCode,
                                 'Millage' => $_POST['mileage'],
                                 'Trim' =>$_POST['reg_no'],
                                 'customerId' =>$customer_id );
            $last_id = $this->jobcard_model->insert_table($vehicledata,$table_name);
           // $this->db->last_query();
           }
           else
           {
              $customer_id = $list->customerId;
           }
           
        $rand = rand();
        if(isset($_POST))
        {
          
                $date = $_POST['DateIn']; 
                $curr_date = date("Y-m-d", strtotime($date));
                // date_format('Y-m-d',$date); 
                $data = array(
                    'car_plate' => $_POST['car_plate'],
                    'customer_id' => $customer_id,
                    'customer_name' => $customerName,
                    'model' => $_POST['model'],
                    'reg_no' => $_POST['reg_no'],
                    'invoice_ref' => $_POST['invoice_ref'],
                    'mileage' => $_POST['mileage'],
                    'mobile' => $_POST['mobile'],
                    'auth_by' => !empty($_POST['auth_by'])?$_POST['auth_by']:"",
                    'assigned_to' => $_POST['assigned_to'],
                    'status' => !empty($_POST['status'])?$_POST['status']:"",
                    'price'  => json_encode($result['price']),
                    'u_price'  => json_encode($result['u_price']),
                    'company'  => json_encode($result['company']),
                    'item'  => json_encode($result['item']),
                    'quantity'  => json_encode($result['quantity']),
                    'type'  => json_encode($result['type']),
                    's_price'  => json_encode($result['s_price']),
                    'us_price'  => json_encode($result['us_price']),
                    's_desc'  => json_encode($result['s_desc']),
                    's_quantity'  => json_encode($result['s_quantity']),
                    'service'  => json_encode($result['service']),
                    'wash_type' => $result['wash_type'],
                    'w_quantity' => $result['w_quantity'],
                    'w_price' => $result['w_price'],
                    'uw_price' => $result['uw_price'],
                    'vehicletype' => $result['vehicletype'],
                    'flush_oil' => $result['flush_oil'],
                    'f_quantity' => $result['f_quantity'],
                    'f_price' => $result['f_price'],
                    'uf_price' => $result['uf_price'],
                    'foc' => $result['foc_amount'],
                    'foc_service' => $result['foc_service'], 
                    'amount' => $result['subtotal'],
                    'vat' => $result['vat'],
                    'discount' => $result['discount'],
                    'discount_name' => $result['discount_name'],
                    'discount_no' => $result['discount_no'],
                    'total' => $result['total'],
                    'PaidAmount' => $PaidAmount,
                    'DueAmount' => $DueAmount,
                    'shift_id' => $_POST['shift'],
                    'user_id' => $_POST['user_id'],
                    'payment_status' => !empty($_POST['pay_type'])?19:17,
                    'jobcardtype' => 2,
                    'offer' => $_POST['offer'],
                    'received_by' => $_POST['received_by'],
                    'tx_desc' => $_POST['tx_desc'],
                    'updated_at' => date('Y-m-d h:i:s'),
                     );
                $table_name = "jobcard";
                //print_r($_POST); exit;
                $jocard_id =$_POST['jobcard_id'];
                $where['id'] = $_POST['jobcard_id'];
                $job_id = $this->jobcard_model->update_table($where,'jobcard',$data);
               // echo $this->db->last_query(); exit;
                if($jocard_id)
                { 
                   $this->add_jobcardServicesItem($jocard_id);
                   $item = $result['item']; $quantity = $result['quantity'];
                   if(!empty($item) && !empty($quantity))
                   {
                     $this->detuct_product($item,$quantity,$jocard_id);
                   }

                   $this->add_jobcard_services($jocard_id,$post);
                   /*if(!empty($_POST['pay_type']))
                    {
                       $post['paid_amount'] = $result['total'];
                       $this->fullPayment($job_id,$post);
                    }*/
                }
                $car_plate = $_POST['car_plate'];
                // $this->customer_service($result,$customer_id,$job_id,$car_plate);
                // $this->jobcard_print($job_id);

              if($jocard_id){
               $response = array('success' => true,'id'=>$jocard_id , 'message' => 'Jobcard draft successfully');
               echo json_encode($response);
               exit;
       // redirect("Jobcardwash/print/$addjobid", 'refresh');  
               }
              else
               {
                  $response = array('success' => false,'id'=>0, 'message' => 'Jobcard Not Updated');
                   echo json_encode($response);
                    exit;
                }

       }
    
    }

   public function fullPayment($id,$post)
   {
      $whereJob['IsDeleted'] = 0;
      $whereJob['id'] = $id;
      $details = $this->jobcard_model->getRow('jobcard',$whereJob);
      // $details = $this->jobcard_model->JobcardDetals(); 
      if($post['pay_type'] ==8){
            $totalsum = 0;
            $multipay = $this->input->post('multipay');
            foreach($multipay as $key => $value){
              if(!empty($value)){
                $totalsum = $totalsum + $value;
                 }
            }
        $totalPaidAmount = $totalsum;     
          }
          else{
        $totalPaidAmount = $post['paid_amount']; 
          }
        $payments_id = $this->payment_model->paymentReferenceNo(); 
       // $totalPaidAmount = $post['paid_amount'] + $post['paid']; 
        $totalAmount =  $post['paid_amount'];
        $dueamount = ($totalAmount - $totalPaidAmount);
      $data = array(
      'UserSysId' => $this->session->id,
      'BranchSysId' => $this->session->id,
      'AgencySysId' => $this->session->id,
      'payment_date' => date('Y-m-d'),
      'particular_id' => $id,
      'ReferenceNo' => $payments_id,
      'payment_amount' => $totalPaidAmount,
      'mode_of_payment' => $post['pay_type'],
      'ChequeTrnRefNo' => isset($post['ChequeTrnRefNo'])?$post['ChequeTrnRefNo']:"",
      'ChequeTrnRefdate' =>isset($post['ChequeTrnRefdate'])?$post['ChequeTrnRefdate']:"",
      'bank_name' => isset($post['bank_name'])?$post['bank_name']:"",
      'receivers' => $post['received_by'],
      'description' => 'Payment',
      'particular_type' => 2,
      'jobcardtype' => 2,
      'created_at'=>date('Y-m-d h:i:s'),
      'updated_at'=>date('Y-m-d h:i:s'),
    );
     // echo "<pre>"; print_r($data);
     if($dueamount>0)
     {
        $updatedata= array('payment_status'=>24,'DueAmount' => $dueamount,'PaidAmount'=>$totalPaidAmount);
        $this->db->where('id',$id)->update('jobcard',$updatedata);

     }  
    //  echo $this->db->last_query(); exit;
        $payid = $this->payment_model->makePayments($data); 
        if($post['pay_type']==8){
            $totalsum = 0;
            $multipay = $this->input->post('multipay');
            foreach ($multipay as $key => $value){
              $totalsum = $totalsum + $value;
              $paymentdata = array('payment_method' =>$key,'jobcard_id'=>$id, 'payment_id'=>$payid,'amount'=>$value);
              $this->db->insert('multipayment',$paymentdata);
            }
          }
        return $payid;
   }

    function detuct_product($item,$quantity,$job_id)
    {
      //$count = count($item);
      $items = $item;
      foreach ($item as $key => $value) 
      {
      if(!empty($items[$key]) && !empty($quantity[$key]))
      { 
         $id = $items[$key];
         $qty = $quantity[$key];
         $this->db->set('quantity',"quantity-$qty", false);
         $this->db->where('id',$id);
         $this->db->update('filterservice');
         $data = array('jobcard_id'=>$job_id,'item_id'=>$id,'quantity'=>$qty,'date'=>date('Y-m-d'));
         $this->db->insert('job_sales',$data);
         // echo $this->db->last_query(); 
       }
      }
    }

    function add_jobcardServicesItem($jobcard_id){
       $jobcardservice = $this->db->where('IsDeleted',0)->where('jobcard_id',$jobcard_id)->get('jobcardservice')->result();
       // print_r($jobcardservice);
       foreach ($jobcardservice as $key => $value) {
         $this->db->set('quantity',"quantity+$value->quantity", false);
         $this->db->where('id',$value->service_id);
         $this->db->update('filterservice');
       }
       // echo $this->db->last_query();
       $this->db->where('jobcard_id',$jobcard_id)->delete('job_sales');
    }

    function  customer_service($result,$customer_id,$job_id,$car_plate)
    {  
        $item_id = array();
        $items = $result['item'];
        $item_id = $result['item'];
        $jobcard_id = $job_id;
        $count = count($item_id);
        foreach ($items as $key => $value) {
          if(!empty($item_id[$key]))
          {
            $data  = array(
                  'car_plate' =>$car_plate,
                  'customer_id' =>$customer_id,
                  'item_id' =>$item_id[$key],
                  'jobcard_id' =>$jobcard_id,
                  'created_at' => date("d-m-Y h:i:s")
                    );
        $table_name = "customer_service";
        $job_id = $this->jobcard_model->insert_table($data,$table_name);
         }
      }
		}
		
		public function add_jobcard_services($addjobid,$post)
    {
      $data  = $post;
			$type_count = count($data['type']);
       // echo "<pre>";
       //  print_r($post); exit;
			$type = !empty($post['type']) ? $post['type'] : '';
			   // print_r($type); exit;
      $data = array('IsDeleted'=>1);
                $where['jobcard_id'] = $addjobid;
               // $where['service_id'] = $value;
		  $this->db->where($where)->update('jobcardservice',$data);
		 	 	
          if($type) {
					foreach($type as $key => $value) {
					if(!empty($post['price'][$key]) && !empty($post['quantity'][$key]))
					{
                $vat = ($post['price'][$key] * 5)/100;
                $total = $post['price'][$key] + $vat;
                $product = array(
										'jobcard_id' => $addjobid,
										'type' => $post['type'][$key], 
										'service_id' => $post['item'][$key],
										'company' => $post['company'][$key],
                    'jobcardtype' => 2,
                    'quantity' => $post['quantity'][$key],    //$post['MQty'][$key],
                    'price' => $post['price'][$key]/$post['quantity'][$key],
                    'discount' => 0,
                    'discount_value' => 0,
                    'subtotal' => $post['price'][$key],
                    'tax' => 5,
                    'tax_amount' => $vat,
                    'total' => $total,
                    'IsDeleted' => 0,
                    'created_at'=>date('Y-m-d h:i:s'),
                    'updated_at'=>date('Y-m-d h:i:s')
                  );
                $this->jobcard_model->insert_table($product,'jobcardservice');
						}
					}
            return true;
        }else{
           return false; 
        }  

   } 

    function calcution($data)
    {
     // return $data; exit;
      $insert = array();
      $subtotal =0;
      $vat= 0;
      $type_total =0;
      $service_total =0;
      $dicount = 0;
      $foc = 0;

      $type_count = count($data['type']);
      for($i=0;$i<$type_count;$i++)
      {
        if(!empty($data['price'][$i]) && !empty($data['quantity'][$i]))
        {
           $type_total = $type_total + ($data['price'][$i]);
           $insert['price'][$i] = $data['price'][$i];
           $insert['quantity'][$i] = $data['quantity'][$i];
           $insert['type'][$i] = $data['type'][$i];
           $insert['company'][$i] = $data['company'][$i];
           $insert['item'][$i] = $data['item'][$i];
           $insert['u_price'][$i] = $data['u_price'][$i];
        }
      }
    //  exit;

      $service_count = count($data['service']);
      // for($i=0;$i<$service_count;$i++)
      foreach ($data['service'] as $key => $value) 
      {
        if(!empty($data['s_price'][$key]) && !empty($data['s_quantity'][$key]))
        {
           $service_total = $service_total + ($data['s_price'][$key]);
           $insert['s_price'][$key] = $data['s_price'][$key];
           $insert['s_quantity'][$key] = $data['s_quantity'][$key];
           $insert['service'][$key] = $data['service'][$key];
           $insert['s_desc'][$key] = $data['s_desc'][$key];
           $insert['us_price'][$key] = $data['us_price'][$key];
        }
      }

       if(!empty($data['wash_type']) && !empty($data['w_quantity']) && !empty($data['w_price']))
        {
           $wash_total = $wash_total + ($data['w_price']);
           $insert['wash_type'] = $data['wash_type'];
           $insert['w_quantity'] = $data['w_quantity'];
           $insert['w_price'] = $data['w_price'];
           $insert['vehicletype'] = $data['vehicletype'];
           $insert['uw_price'] = $data['uw_price'];

        }
       if(!empty($data['flush_oil']) && !empty($data['f_quantity']) && !empty($data['f_price']))
        {
          $flush_total = $flush_total + ($data['f_price']);
          $insert['flush_oil'] = $data['flush_oil'];
          $insert['f_quantity'] = $data['f_quantity'];
          $insert['f_price'] = $data['f_price'];
          $insert['uf_price'] = $data['uf_price'];
        }

       $subtotal = $type_total + $service_total + $wash_total + $flush_total;
       $insert['subtotal'] = $subtotal;

        if(!empty($data['discount']))
        {
          $insert['disc_type'] = $data['disc_type'];
          $insert['discount'] = $data['discount'];
          if($data['disc_type'] =='normal')
          {
           $dicount = $data['discount'];
           $subtotal = $subtotal - $data['discount'];
          }
          else
          {
           $dicount = ($subtotal * $data['discount'])/100;
           $subtotal = $subtotal - $dicount;
          }
        }
        if(!empty($data['foc_name']) && !empty($data['foc_amount']))
        {
           $subtotal = $subtotal - $data['foc_amount'];
           $foc = $data['foc_amount']; 
           $insert['foc_service'] = $data['foc_name'];
        } 
        
        $vat = ($subtotal * 5)/100;
        $total = $subtotal + $vat; 
        $insert['disc_amount'] = $dicount;
        $insert['foc_amount'] = $foc;
        $insert['vat'] = $vat;
        $insert['total'] = $total;
        return $insert;
    }

    public function add_jobcard()
    {
       
        $data = array();
        $shift = getShift();
        // print_r($shift); exit;
        $table_name = 'jobcard';
       /*  $last_id = $this->jobcard_model->getLastId($table_name);
        $last_id = $last_id->id + 1;
				$last_id = sprintf('%05d', $last_id);  */
				$last_id = $this->jobcard_model->getLastjobcard_no("jobcard",2);
		    $last_id = $last_id->id + 1;
		    $last_id = sprintf('%05d', $last_id); 
		// $ref_no = "INVE-".$last_id;
        $data['last_id'] = $last_id;
        $table_name = "cartype";
        $data['cartype'] = $this->jobcard_model->show_list($table_name,$where=NULL);
        $table_name = "servicejob";
        $data['servicejob'] = $this->jobcard_model->show_list($table_name,$where=NULL);
        $table_name = "company";
        $where['status'] = "Active";
        $data['company'] = $this->jobcard_model->show_list($table_name,$where);
        $table_name = "servicetype";
        $data['servicetype'] = $this->jobcard_model->show_list($table_name,$where=null);
        $table_name = "filterservice";
        $data['filterservice'] = $this->jobcard_model->show_list($table_name,$where=NULL);
        $table_name = "servicecate";
        $data['vehicletype'] = $this->jobcard_model->show_list($table_name,$where=NULL);
        $table_name = "flushing";
        $data['flushing'] = $this->jobcard_model->show_list($table_name,$where=NULL);
        $table_name = "washing";
        $data['washing'] = $this->jobcard_model->show_list($table_name,$where=NULL);
        $data['worker'] =  $this->db->where('IsDeleted',0)->where('design_id',4)->get('admin')->result();
        $whereP['IsDeleted'] = 0;
        $data['paytype'] = $this->jobcard_model->show_list('payment_method',$whereP);
        $data['shifts'] = $this->db->where('IsDeleted',0)->get('shift')->result(); 
        /* $table_name = "company";
        $data['company'] = $this->jobcard_model->show_details($table_name,$group,$where= NULL,$order = NULL); */
        $data['subview'] = $this->load->view('parking/jobcard/add_jobcard', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
    }

    public function change_company()
     {
       $where['type'] = $_POST['type'];
       $where['company_id'] = $_POST['company'];
       $where['quantity >'] = 0;

       $table_name = "filterservice";
       $data['filterservice'] = $this->jobcard_model->show_list($table_name,$where);
       // echo $this->db->last_query(); exit;
       $this->load->view('parking/jobcard/ajax_company',$data);
     }

    public function change_item()
    {
       $where['id'] = $_POST['id'];
       $table_name = "filterservice";
       $list= $this->jobcard_model->select_table2($where,$table_name);
       // echo $data['filterservice']->price;
       if(!empty($list))
       {
        $response = array('price' => $list->salesprice, 'quantity' => $list->quantity);
        echo json_encode($response); exit;
        // echo $list->customerName;
       }
     else
     {
        $response = array('price' => "", 'quantity' =>'');
        echo json_encode($response);
        exit;
     }
    }

    public function change_vehicletype()
    {
       $where['id'] = $_POST['id'];
       $table_name = "servicecate";
       $data['vehicletype'] = $this->jobcard_model->select_table2($where,$table_name);
       echo $data['vehicletype']->price;
     
    }

    public function check_item_offer()
    {
     $item = $_POST['id'];
     $where = array('item_id'=>$_POST['id'],'customer_id'=>$_POST['customer_id']);
     $table_name = "customer_service";
     $list = $this->jobcard_model->customer_service($table_name,$where);
     if(!empty($list))
     {
      $response = array('count' => $list->count, 'item' => $list->item_id);
      echo json_encode($response); exit;
     // echo $list->customerName;
     }
     else
     {
        $response = array('count' => "", 'item' =>'');
        echo json_encode($response);
        exit;
     }
    }

    public function change_flushing()
    {
       $where['id'] = $_POST['id'];
       $table_name = "flushing";
       $data['flushing'] = $this->jobcard_model->select_table2($where,$table_name);
       echo $data['flushing']->price;
     
    }
    public function change_washing()
    {
       $where['id'] = $_POST['id'];
       $table_name = "washing";
       $data['washing'] = $this->jobcard_model->select_table2($where,$table_name);
       echo $data['washing']->price;
     
    }

    public function jobcard_print($id)
    {  
        $service_name = array();
        $table_name = "jobcard";
        $where['id'] = $id;
        $data['list'] = $this->jobcard_model->select_table2($where,$table_name);
       // echo "<pre>"; print_r($data['list']); 
        $this->load->view('parking/jobcard/jobcard_print',$data);
    } 


    public function report()
    {
        $data = array(); 
        $table_name = "cartype";
        $where1['echo_status'] = 'Yes';
        $data['cartype'] = $this->jobcard_model->show_list($table_name,$where1);
        if($_POST)
        {
        $post = $this->input->post();
        $data['post'] = $post;  
         // $date = date('Y/m/d');
        $table_name = "jobcard";
        if(!empty($_POST['from']) && empty($_POST['to']))
        {
           $date = date_create($_POST['from']);
           $from =  date_format($date,"Y-m-d");    
           $where['date'] = $from; 
        }
        if(!empty($_POST['to']) && empty($_POST['from']))
        {
         $date = date_create($_POST['to']);
         $to = date_format($date,"Y-m-d");    
         $where['date'] = $to; 
        }
        if(!empty($_POST['to']) && !empty($_POST['from']))
        {
          $date = date_create($_POST['from']);
          $from = date_format($date,"Y-m-d");
          $date = date_create($_POST['to']);
          $to   = date_format($date,"Y-m-d");  
          $between['from'] = $from; 
          $between['to'] = $to; 
        }
        if(!empty($_POST['vehicleType']))
        {
          $where['vehicleType'] = $_POST['vehicleType']; 
        }
        if(!empty($_POST['pay_type']))
        {
          $where['pay_type'] = $_POST['pay_type']; 
				}
				if(!empty($_POST['shift']))
        {
          $where['shift_id'] = $_POST['shift']; 
				}
				if(!empty($_POST['assigned_to']))
        {
          $where['assigned_to'] = $_POST['assigned_to']; 
        }
        /*if(!empty($_POST['user_id']))
        {
          $where['user_id'] = $_POST['user_id']; 
        }*/
        if(!empty($_POST['tx_desc']))
        {
          $where['tx_desc'] = $_POST['tx_desc']; 
        }
        if(empty($between))
        {
           $between = NUll; 
				}
        $data['where'] = $where;
				$where['jobcardtype'] = 2;
        $where['IsDeleted'] = 0;
        $where['status!='] = 23;
        $data['lists'] = $this->jobcard_model->show_filter_jobcardlist($table_name,$where,$between);
        
        }
        else
        {
				$table_name = "jobcard";
				$where['jobcardtype'] = 2;
        $where['IsDeleted'] = 0;
        $where['status!='] = 23;
        $data['lists'] = $this->jobcard_model->show_jobcardlist($table_name,$where);
				}
				$data['shifts'] = $this->db->where('IsDeleted',0)->get('shift')->result();
				$data['worker'] =  $this->db->where('IsDeleted',0)->where('design_id',4)->get('admin')->result();
        $data['user'] =  $this->db->where('IsDeleted',0)->get('admin')->result();
        $whereP['IsDeleted'] = 0;
        $data['paytype'] = $this->jobcard_model->show_list('payment_method',$whereP);
        $data['subview'] = $this->load->view('parking/jobcard/report', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
    }

    public function lists()
    {
        /*echo "<pre>";
        print_r($_SESSION); exit;*/
        $data = array(); 
        $table_name = "cartype";
        $where1['echo_status'] = 'Yes';
        $data['cartype'] = $this->jobcard_model->show_list($table_name,$where1);
      
				$table_name = "jobcard";
				$where['jobcardtype'] = 2;
        $where['IsDeleted'] = 0;
        $where['status!='] = 23;
        if($this->session->id!=1){
          $where['user_id'] = $this->session->id;
        }
        $data['lists'] = $this->jobcard_model->show_jobcardlist($table_name,$where);
        $data['subview'] = $this->load->view('parking/jobcard/list', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
		}
		
		public function view()
    {
        $data = array(); 
        $table_name = "cartype";
        $where1['echo_status'] = 'Yes';
        $data['cartype'] = $this->jobcard_model->show_list($table_name,$where1);
      
				$table_name = "jobcard";
				$where['jobcardtype'] = 2;
        $data['lists'] = $this->jobcard_model->show_list($table_name,$where);
       
        $data['subview'] = $this->load->view('parking/jobcard/view', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
    }


    public function daily_report($action =null)
    {
        $data = array(); 
        $table_name = "cartype";
        $where1['echo_status'] = 'Yes';
        $data['cartype'] = $this->jobcard_model->show_list($table_name,$where1);
        if($_POST)
        {
         // $date = date('Y/m/d');
        $post = $this->input->post();
        $data['post'] = $post;
        $table_name = "jobcard";
        if(!empty($_POST['from']) && empty($_POST['to']))
        {
           $date = date_create($_POST['from']);
           $from =  date_format($date,"Y-m-d");    
           $where['date'] = $from; 
        }
        if(!empty($_POST['to']) && empty($_POST['from']))
        {
         $date = date_create($_POST['to']);
         $to = date_format($date,"Y-m-d");    
         $where['date'] = $to; 
        }
        if(!empty($_POST['to']) && !empty($_POST['from']))
        {
          $date = date_create($_POST['from']);
          $from = date_format($date,"Y-m-d");
          $date = date_create($_POST['to']);
          $to   = date_format($date,"Y-m-d");  
          $between['from'] = $from; 
          $between['to'] = $to; 
        }
        if(!empty($_POST['vehicleType']))
        {
          $where['vehicleType'] = $_POST['vehicleType']; 
        }
        if(!empty($_POST['pay_type']))
        {
          $where['pay_type'] = $_POST['pay_type']; 
        }
        if(empty($between))
        {
           $between = NUll; 
        }
        $where['IsDeleted'] = 0;
        $where['status!='] = 23;
        $data['job_lists'] = $this->jobcard_model->show_filter_list($table_name,$where,$between);
       // $table_name = "ecowash";
       // $data['eco_lists'] = $this->jobcard_model->show_filter_list($table_name,$where,$between);
        
        }
        else
        {
        $table_name = "jobcard";
        if(empty($action))
        {
        $where['date'] = $date = date('d/m/Y');
        } 
        $where['IsDeleted'] = 0;
        $where['status!='] = 23;
        $data['job_lists'] = $this->jobcard_model->show_jobcardlist($table_name,$where);
        // $table_name = "ecowash";
        // $data['eco_lists'] = $this->jobcard_model->show_list($table_name,$where);
        }
        $whereP['IsDeleted'] = 0;
        $data['paytype'] = $this->jobcard_model->show_list('payment_method',$whereP);
        $data['subview'] = $this->load->view('parking/jobcard/daily_report', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
    }
   
    public function tax_report($action=null)
    {
        $data = array(); 
        $table_name = "cartype";
        $where1['echo_status'] = 'Yes';
        $data['cartype'] = $this->jobcard_model->show_list($table_name,$where1);
        if($_POST)
        {
         // $date = date('Y/m/d');
        $post = $this->input->post();
        $data['post'] = $post;
        $table_name = "jobcard";
        if(!empty($_POST['from']) && empty($_POST['to']))
        {
           $date = date_create($_POST['from']);
           $from =  date_format($date,"Y-m-d");    
           $where['date'] = $from; 
        }
        if(!empty($_POST['to']) && empty($_POST['from']))
        {
         $date = date_create($_POST['to']);
         $to = date_format($date,"Y-m-d");    
         $where['date'] = $to; 
        }
        if(!empty($_POST['to']) && !empty($_POST['from']))
        {
          $date = date_create($_POST['from']);
          $from = date_format($date,"Y-m-d");
          $date = date_create($_POST['to']);
          $to   = date_format($date,"Y-m-d");  
          $between['from'] = $from; 
          $between['to'] = $to; 
        }
        if(!empty($_POST['vehicleType']))
        {
          $where['vehicleType'] = $_POST['vehicleType']; 
        }
        if(!empty($_POST['pay_type']))
        {
          $where['pay_type'] = $_POST['pay_type']; 
        }
        if(empty($between))
        {
           $between = NUll; 
        }
        $where['IsDeleted'] = 0;
        $where['status!='] = 23;
         $data['job_lists'] = $this->jobcard_model->show_filter_list($table_name,$where,$between);
         // echo $this->db->last_query(); exit;
         // $table_name = "ecowash";
        // $data['eco_lists'] = $this->jobcard_model->show_filter_list($table_name,$where,$between);
        
        }
        else
        {
        $table_name = "jobcard";
        if($action='all')
        {
           $where=null;
        }
        else{
           $where['date'] = $date = date('Y-m-d'); 
        }
        $where['IsDeleted'] = 0;
        $where['status!='] = 23;
        $data['job_lists'] = $this->jobcard_model->show_list($table_name,$where);
        $table_name = "ecowash";
        // $data['eco_lists'] = $this->jobcard_model->show_list($table_name,$where);
        }
        $whereP['IsDeleted'] = 0;
        $data['paytype'] = $this->jobcard_model->show_list('payment_method',$whereP);
        $data['subview'] = $this->load->view('parking/jobcard/tax_report', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
    }

  public function delete_jobcard($id)
   {
    $data = array();
    $table_name = "jobcard";
    $where['id'] = $id;
    $dataJob = array('IsDeleted'=>1);
    // $data['list'] = $this->jobcard_model->delete_table($where,$table_name);
    $data['list'] = $this->jobcard_model->update_table($where,'jobcard',$dataJob);
    
    redirect('jobcard/lists');
	 }

   public function cancel_jobcard($id)
   {
    $data = array();
    $table_name = "jobcard";
    $where['id'] = $id;
    $dataJob = array('status'=>23);
    // $data['list'] = $this->jobcard_model->delete_table($where,$table_name);
    $data['list'] = $this->jobcard_model->update_table($where,'jobcard',$dataJob);
    
    redirect('jobcard/lists');
   }

   public function paymentList($id)
   {
    $data = array();
    $table_name = "jobcard";
    $where['id'] = $id;
    $data['list'] = $this->jobcard_model->delete_table($where,$table_name);
    redirect('jobcard/lists');
   }
	 
	 public function makepayment($id)
	 {
			if($this->input->post())
			{
			$post = $this->input->post();
     /* echo "<pre>";
			 print_r($post); exit;*/
			$whereJob['IsDeleted'] = 0;
			$whereJob['id'] = $id;
			$details = $this->jobcard_model->getRow('jobcard',$whereJob);
			// $details = $this->jobcard_model->JobcardDetals();	
      if($post['paytype'] ==8){
            $totalsum = 0;
            $multipay = $this->input->post('multipay');
            foreach($multipay as $key => $value){
              if(!empty($value)){
                $totalsum = $totalsum + $value;
                 }
            }
        // $totalPaidAmount = $totalsum; 
        $totalPaidAmount =  $totalsum + $post['paid'];
        $payamount = $totalsum;
          }
          else{
        // $totalPaidAmount = $post['paid_amount'];
        $totalPaidAmount = $post['paid_amount'] + $post['paid']; 
        $payamount = $post['paid_amount']; 
          }

         

       if($post['paytype'] ==8){
          if($totalsum > $totalPaidAmount){
            $response = array('success' => false, 'paymodal'=>'show', 'message' =>'The Entered Amount is exceeds the Total Service Amount.','totalamount' => $result['total']);
            echo json_encode($response);
            exit;
             }
           if($payamount == 0){
            $response = array('success' => false, 'paymodal'=>'show', 'message' =>'Please Entered Amount.','totalamount' => $result['total']);
            echo json_encode($response);
            exit;
             }  
            }   
			
      $dueamount = $post['total_amount'] - $totalPaidAmount;
		  $data = array(
			'UserSysId' => $this->session->id,
			'BranchSysId' => $this->session->id,
			'AgencySysId' => $this->session->id,
			'payment_date' => $post['payment_date'],
			'particular_id' => $post['jobcard_id'],
			'ReferenceNo' => $post['ReferenceNo'],
			'payment_amount' => $payamount,
			'mode_of_payment' => $post['paytype'],
			'ChequeTrnRefNo' => isset($post['ChequeTrnRefNo'])?$post['ChequeTrnRefNo']:"",
			'ChequeTrnRefdate' =>isset($post['ChequeTrnRefdate'])?$post['ChequeTrnRefdate']:"",
			'bank_name' => isset($post['bank_name'])?$post['bank_name']:"",
			'receivers' => $post['recieced_by'],
			'description' => $post['note'],
			'particular_type' => 2,
			'jobcardtype' => 2,
			'created_at'=>date('Y-m-d h:i:s'),
			'updated_at'=>date('Y-m-d h:i:s'),
	);
	$payid = $this->payment_model->makePayments($data); 
 
	
	if($payid){
		$datajob = array();
		if($post['total_amount'] == $totalPaidAmount)
		{
				$status =19;
				$stat   =13;
		}
		elseif($post['total_amount'] > $totalPaidAmount)
		{
				$status = 21;
				$stat   = 16;
		}
		else
		{
				$status = 17;
				$stat   = 16;
		}
    
		$dataJob = array(
									"PaidAmount"     => $totalPaidAmount,
									"DueAmount"      => $dueamount,
									 // "Dateout"        => date("Y-m-d h:i:s"), 
                  'payment_status' =>$status,
									"status"   => $stat,
										);
    if(empty($details->payment_status)){
    $datajob["pay_type"] = $post['paytype'];
    }
    if($post['pay_type']==8){
     $datajob["pay_type"] = $post['paytype'];
    }
   /* print_r($dataJob);
		 exit;*/
   $where['id'] = $post['jobcard_id'];
   $addjobid = $this->jobcard_model->update_table($where,'jobcard',$dataJob);
   $jobcard_id = $post['jobcard_id'];

    if($post['paytype']==8){
            $totalsum = 0;
            $multipay = $this->input->post('multipay');
            foreach ($multipay as $key => $value){
              if($value){
              $paymentdata = array('payment_method' =>$key,'jobcard_id'=>$post['jobcard_id'], 'payment_id'=>$payid,'amount'=>$value);
              $this->db->insert('multipayment',$paymentdata);
             }
            }
        }

    // print_r($data['Invoice']); exit;
		// redirect("Jobcard/invoice/$jobcard_id", 'refresh');
		 if($status ==19)
		 {
         // $this->paymentReceipt($payid);
         $response = array('success' => true,'id'=>$payid , 'message' => 'Payment successfully');
               echo json_encode($response);
               exit;
		 }
		 else {
			    $response = array('success' => true,'id'=>$payid , 'message' => 'Payment successfully');
               echo json_encode($response);
               exit;
		 }
   // redirect("Jobcardwash/reciept/$payid", 'refresh');  
		 }
     else{
          $response = array('success' => false, 'message' => 'Payment Not successfully');
          echo json_encode($response);
          exit;
     }
		} 
		else{
			$whereJob['IsDeleted'] = 0;
			$whereJob['id'] = $id;
			$whereJob['jobcardtype'] = 2;
			$data['details'] = $this->jobcard_model->getRow('jobcard',$whereJob);
      if($data['details']->DueAmount == 0.00)
      {
          redirect('jobcard/lists');          
      }
		/* 	echo $this->db->last_query(); exit;
			echo "<pre>"; 
			print_r($data); exit; */
			$where['IsDeleted'] = 0;
			$data['paytype'] = $this->jobcard_model->show_list('payment_method',$where);
			$data['payments_id'] = $this->payment_model->paymentReferenceNo();
			$data['subview'] = $this->load->view('parking/jobcard/payment', $data, TRUE);
			$this->load->view('_layout_main', $data);
		}

	}

  public function GetPaymentReceipt() {
        if($this->input->post()){
            $jobcard_id = $this->input->post('jobcard_id');
            $data = $this->jobcard_model->GetPaymentReceipt($jobcard_id);
           //  print_r($data); exit;
            if($data){
                $response = array('success' => true, 'responseData' => $data);
                echo json_encode($response);
                exit;
            }else{
                $response = array('success' => false, 'responseData' => '','message'=>'Oops there is no record found!');
                echo json_encode($response);
                exit;
            }
        }
    }


  function change_CustomerNumber()
  {
     $phone = $_POST['phone'];
     $key = 'localMobile';
     $table_name = 'customer';
     $list = $this->customer_model->select_table($phone,$key,$table_name);
          // echo '<pre>';print_r($list);die;
     if(!empty($list))
     {       
              //  $Customerdata = $this->customer_model->getRecordRow($list->customerId);
               // $vehicleModel = vehicleModel($list->vehiclemodel);
                $response = array('customer_id' => $list->id, 'customer_name' => $list->customerName, 'mobile' => $list->localMobile,'trn_no' => $list->trn_no);
                echo json_encode($response); exit;
      
     }
     else
     {
       $response = array('customer_id' => 0, 'customer_name' => '', 'mobile' => '','trn' => '','Millage' => '','vehicleModel'=>'');
                echo json_encode($response);
                exit;
     }  
  }

  public function paymentReceipt($id){
        if($id){
            $data['data'] = $this->jobcard_model->GetPaymentReceiptDetails($id);
            /*$data['details'] = $this->jobcard_model->NewJobcardDetals($data['data']->particular_id);*/
            $data['details'] = $this->db->where('id',$data['data']->particular_id)->get('jobcard')->row();
            $data['list'] = $data['details'];
            // $data['Invoice'] = $CheckInvoiceExist = $this->payment_model->CheckInvoiceExist($data['data']->particular_id,2,3);
            // echo '<pre>';print_r($data);die;
            /*$data['subview'] = $this->load->view('parking/jobcard/paymentReceipt', $data, TRUE);
            $this->load->view('_layout_main', $data);*/
            $this->load->view('parking/jobcard/payReceipt',$data);
           }
   }
	



}
