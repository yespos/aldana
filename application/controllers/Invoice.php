<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends MY_Controller {

    function __construct() {
        parent::__construct();
        $data = array();
        $this->load->model('user_model');
        $this->load->model('customer_model');
     // $this->load->model('invoice_model');
        $this->load->model('jobcard_model');
        }
   
    public function index()
    {
        $data = array(); 
        $table_name = "cartype";
        $where1['echo_status'] = 'Yes';
        $data['cartype'] = $this->jobcard_model->show_list($table_name,$where1);
        $table_name = "jobcard";
        $data['lists'] = $this->jobcard_model->show_list($table_name,$where=NULL);
        $data['subview'] = $this->load->view('parking/invoice/list', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
    }

    function print($id)
    {
    	$service_name = array();
        $table_name = "jobcard";
        $where['id'] = $id;
        $data['list'] = $this->jobcard_model->select_table2($where,$table_name);
        $this->load->view('parking/invoice/pdf',$data);
    }  


 }