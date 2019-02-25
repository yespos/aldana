<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $data = array();
        $this->load->model('customer_model');
        //$this->load->model('Customer_model');


    }

	public function index()
	{
            $data = array();
            $table_name = "customer";
            
            $data['lists'] = $this->customer_model->show_list($table_name,$where=NULL);
            $data['subview'] = $this->load->view('parking/customer/index', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	}

	public function add_customer()
	{
		$data = array();
		$table_name = "customer";
	    $last_id = $this->customer_model->getLastId($table_name); 
	    $lasts_id = $last_id->id;
	    $data['last_id'] = $last_id->id;
		$data['subview'] = $this->load->view('parking/customer/add_customer', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	}

	public function add_customer_act()
	{
		$rand = rand();
        if(isset($_POST))
        {
                $data = array(
                    'customerCode' => $_POST['customerCode'],
                    'customerName' => $_POST['customerName'],
                    'vehicle_no' => $_POST['vehicle_no'],
                    'companyName' => $_POST['companyName'],
                    'poBox' =>       $_POST['POBox'],
                    'IdcardNumber' => $_POST['IDcardNumber'],
                    'localMobile' => $_POST['LocalMobile'],
                    'telephone' => $_POST['Telephone'],
                    'address' => $_POST['Address'],
                    'email' => $_POST['email'],
                    'website' => $_POST['website']
                     );
                $table_name = "customer";
                $last_id = $this->customer_model->insert_table($data,$table_name);
                redirect('customer');
	    }
    }

    public function edit_customer($id)
	{
		$data = array();
		$table_name = "customer";
		$key = 'id';
		$data['list'] = $this->customer_model->select_table($id,$key,$table_name);
		$data['subview'] = $this->load->view('parking/customer/edit_customer', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
	}

	public function edit_customer_act()
	{
		$rand = rand();
        if(isset($_POST))
        {
                $data = array(
                    'customerCode' => $_POST['customerCode'],
                    'customerName' => $_POST['customerName'],
                    'vehicle_no' => $_POST['vehicle_no'],
                    'companyName' => $_POST['companyName'],
                    'poBox' =>       $_POST['POBox'],
                    'IdcardNumber' => $_POST['IDcardNumber'],
                    'localMobile' => $_POST['LocalMobile'],
                    'telephone' => $_POST['Telephone'],
                    'address' => $_POST['Address'],
                    'email' => $_POST['email'],
                    'website' => $_POST['website']
                     );
                $table_name = "customer";
                $where['id'] = $_POST['id'];
                $last_id = $this->customer_model->update_table($where,$table_name,$data);
                redirect('customer');
	    }
    }


    public function delete_customer($id)
	{
		$data = array();
		$table_name = "customer";
		$where['id'] = $id;
		$data['list'] = $this->customer_model->delete_table($where,$table_name);
		redirect('customer');
	}
}
