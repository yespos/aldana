<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ecowash extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $data = array();
        $this->load->model('jobcard_model');

    }

   /* public function index()
	{
		$data = array();
		$table_name = 'jobcard';
		$last_id = $this->jobcard_model->getLastId($table_name);
	    $last_id = $last_id->id + 1;
		$last_id = sprintf('%05d', $last_id); 
		$data['last_id'] = $last_id;
		$table_name = "cartype";
		$data['cartype'] = $this->jobcard_model->show_list($table_name,$where=NULL);
		$table_name = "mainservice";
		$group = 'service_code';
		$data['mainservice'] = $this->jobcard_model->show_details($table_name,$group,$where,$order);
		$table_name = "servicetype";
		$data['servicetype'] = $this->jobcard_model->show_list($table_name,$where=NULL);
		$table_name = "servicecate";
		$data['servicecate'] = $this->jobcard_model->show_list($table_name,$where=NULL);
		$data['subview'] = $this->load->view('parking/jobcard/index', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
    }*/

    public function index()
    {
		// echo "<pre>"; print_r($_SESSION); exit;
        $data = array();
        $table_name = 'ecowash';
        /* $last_id = $this->jobcard_model->getLastId($table_name);
        $last_id = $last_id->id + 1;
        $last_id = sprintf('%05d', $last_id); 
		$data['last_id'] = $last_id; */
	     $last_id = $this->jobcard_model->getLastjobcard_no("jobcard",1); 
		   $last_id = $last_id->jobcard_no + 1;
		   $last_id = sprintf('%05d', $last_id); 
		   $ref_no = "INVE-".$last_id;
		   $data['last_id'] = $last_id;
       $table_name = "cartype";
       $where['echo_status'] = 'Yes';
		   $data['cartype'] = $this->jobcard_model->show_list($table_name,$where);
		   $data['worker'] =  $this->db->where('IsDeleted',0)->where('design_id',4)->get('admin')->result();
       $whereP['IsDeleted'] = 0;
       $data['paytype'] = $this->jobcard_model->show_list('payment_method',$whereP);
		// $data['userlist'] = $this->db->where('IsDeleted',0)->get('admin');
        $data['subview'] = $this->load->view('parking/ecowash/add_ecowash', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
    }

    public function lists()
    {
        $data = array(); 
        $table_name = "cartype";
        $where1['echo_status'] = 'Yes';
        $data['cartype'] = $this->jobcard_model->show_list($table_name,$where1);
        if($_POST)
        {
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
		$where['jobcardtype'] = 1;
        $data['lists'] = $this->jobcard_model->show_filter_jobcardlist($table_name,$where,$between);
        }
        else
        {
		$table_name = "jobcard";
		$where['jobcardtype'] = 1;
        $data['lists'] = $this->jobcard_model->show_jobcardlist($table_name,$where);
		}
		$data['worker'] =  $this->db->where('IsDeleted',0)->where('design_id',4)->get('admin')->result();
        $data['subview'] = $this->load->view('parking/ecowash/list', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
    }

    public function report()
    {
        $data = array(); 
        $table_name = "cartype";
        $where1['echo_status'] = 'Yes';
        $data['cartype'] = $this->jobcard_model->show_list($table_name,$where1);
        if($_POST)
        {
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
          $where['service'] = $_POST['vehicleType']; 
        }
        if(!empty($_POST['pay_type']))
        {
          $where['pay_type'] = $_POST['pay_type']; 
        }
        if(empty($between))
        {
           $between = NUll; 
		    }
		if(!empty($_POST['shift']))
        {
          $where['shift_id'] = $_POST['shift']; 
		}
		if(!empty($_POST['assigned_to']))
        {
          $where['assigned_to'] = $_POST['assigned_to']; 
        }
		
		$where['jobcardtype'] = 1;
        $data['lists'] = $this->jobcard_model->show_filter_list($table_name,$where,$between);
        
        }
        else
        {
		$table_name = "jobcard";
		$where['jobcardtype'] = 1;
		$data['lists'] = $this->jobcard_model->show_list($table_name,$where);
		}
		$data['shifts'] = $this->db->get('shift')->result();
		$data['worker'] =  $this->db->where('IsDeleted',0)->where('design_id',4)->get('admin')->result();
    $whereP['IsDeleted'] = 0;
    $data['paytype'] = $this->jobcard_model->show_list('payment_method',$whereP);
    $data['subview'] = $this->load->view('parking/ecowash/report', $data, TRUE);
    $this->load->view('_layout_main', $data); //page load
    }

   
    public function add_ecowash_act()
    {
		  $last_id = $this->jobcard_model->getLastjobcard_no("jobcard",1);
		  $last_id = $last_id->id + 1;
		  $last_id = sprintf('%05d', $last_id); 
		  $ref_no = "INVE-".$last_id;
          $ref_no = $_POST['ref_no'];
		  $check_ref = $this->jobcard_model->check_ref_ecowash($ref_no); 
		 
         /*  if($check_ref) 
          {
            redirect("ecowash/eco_print/$check_ref");
		  } */
		  $last_id = $this->jobcard_model->getLastjobcard_no("jobcard",1);
		  $last_id = $last_id->jobcard_no + 1;
		  $jobcard_no = $last_id;
		  $last_id = sprintf('%05d', $last_id); 
		  $ref_no = "INVE-".$last_id;  
    	  // print_r($_POST); exit;
		  $vehicle = explode(",", $_POST['vehicleType']);
		  //  print_r($vehicle); exit;
		  $vehicleNumber = $_POST['car_plate'];
      $key = 'vehicleNumber';
      $table_name = 'vehicle';
          $list = $this->jobcard_model->select_table($vehicleNumber,$key,$table_name);
         
          if(empty($list))
          {
            $table_name = 'customer';
            $last_id = $this->jobcard_model->getLastId($table_name); 
            $lasts_id = $last_id->id + 1;
            $customerCode = "CUS-0000".$lasts_id;
            $customer_data = array(
                'vehicle_no' => $_POST['car_plate'],
                'customerName' => $_POST['customer_name'],
                'localMobile' => $_POST['mobile'],
								'customerCode' => $customerCode,
								'trn_no' => $_POST['reg_no']
                             );
            $table_name = "customer";
            $last_id = $this->jobcard_model->insert_table($customer_data,$table_name);
            // $this->db->last_query();
            $customer_id = $last_id;
            $table_name = "vehicle";
            $vcode = $this->jobcard_model->getLastId($table_name); 
            $code = $vcode->id + 1;
            $vehicleCode = "VH-0000".$code;
            $vehicledata = array(
                                 'vehicleNumber'=>$_POST['car_plate'],
                                 'vehicleCode' =>$vehicleCode,
                                 'Millage' => $_POST['mileage'],
                                 'Trim' =>$_POST['reg_no'],
                                 'customerId' =>$last_id );
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
                $data = array(
                    'ref_no' => $ref_no,
                    'invoice_ref' => $_POST['invoice_ref'],
                    'date' => $curr_date,
                    'time' => $_POST['TimeIn'],
					          'car_plate' => $_POST['car_plate'],
					          'customer_id' => $customer_id,
                    'customer_name' => $_POST['customer_name'],
					          'mobile' => $_POST['mobile'],
					          'jobcard_no' => $jobcard_no,
					          'service' => $vehicle[0],
                    'pay_type' => $_POST['pay_type'],
					          'shift_id' => $_POST['shift_id'],
					          'user_id' => $_POST['user_id'],
                    'amount' => $_POST['amount'],
                    'vat' => $_POST['vat'],
					          'total' => $_POST['total'],
					          'paidAmount' => $_POST['total'],
					          'payment_status' => 19,
					          'jobcardtype' => 1,
					          'received_by' => $_POST['received_by'],
					          'assigned_to' => $_POST['assigned_to'],
					          'created_at' => date('Y-m-d h:i:s'),
					          'updated_at' => date('Y-m-d h:i:s')
                     );
                $table_name = "jobcard";
				$last_id = $this->jobcard_model->insert_table($data,$table_name);
				// echo $this->db->last_query(); exit;
                $this->eco_print($last_id);
	    }
    
    }

    public function eco_print($id)
    {
        $table_name = "jobcard";
		$where['id'] = $id;
		$where['jobcardtype'] = 1;
		$data['list'] = $this->jobcard_model->select_table2($where,$table_name);
		// echo $this->db->last_query(); exit;
        $this->load->view('parking/ecowash/eco_print',$data);
    }

    public function edit_ecowash($id)
    {
        $data = array();
        $table_name = "ecowash";
        $key = 'id';
        $data['list'] = $this->jobcard_model->select_table($id,$key,$table_name);
        $data['subview'] = $this->load->view('parking/user/edit_user', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
    }

    public function edit_ecowash_act()
    {
        $rand = rand();
        if(isset($_POST))
        {
                $data = array(
                    'name' => $_POST['str_name'],
                    'admin_id' => $_POST['str_Admin_ID'],
                    'password' => md5($_POST['str_Password']),
                    'location' => $_POST['location'],
                    'prefix' => $_POST['prefix'],
                    'invAmount' => $_POST['invAmount'],
                    'dailyAmount' => $_POST['dailyAmount'],
                    'monthlyAmount' => $_POST['monthlyAmount'],
                    'ses_id' => $rand
                     );
                $table_name = "ecowash";
                $where['id'] = $_POST['id'];
                $last_id = $this->jobcard_model->update_table($where,$table_name,$data);

                redirect('ecowash/list');
        }
    }


   public function delete_ecowash($id)
    {
        $data = array();
        $table_name = "jobcard";
		$where['id'] = $id;
		$update['IsDeleted'] = 1;
		$this->db->where($where)->update($update,$table_name);
        // $data['list'] = $this->jobcard_model->delete_table($where,$table_name);
        redirect('ecowash/lists');
    }

}
