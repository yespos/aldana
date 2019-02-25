<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

    function __construct() {
        parent::__construct();
        $data = array();
        $this->load->model('user_model');
        $this->load->model('customer_model');
    }

    public function index() {
        $data = array();
		$table_name = "admin";
		$where['IsDeleted'] = 0;
        $data['lists'] = $this->user_model->show_list($table_name, $where);
        $data['subview'] = $this->load->view('parking/user/index', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
    }

    public function add_user() {
        $data = array();
        $table_name = "location";
        $data['lists'] = $this->user_model->show_list($table_name, $where = NULL);
		$data['country'] = $this->customer_model->getCountry();
		$data['shift'] = $this->db->get('shift')->result();
        $table_name = "designation";
        $data['designation'] = $this->user_model->show_list($table_name, $where = NULL);
        $data['subview'] = $this->load->view('parking/user/add_user', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
    }

    public function change_userType() {
        // print_r($_POST);
        $id = $_POST['location'];
        $usertype = $_POST['usertype'];
        if($usertype == 'Worker' && !empty($id)) {
            $table_name = "location";
            $key = 'id';
            $data['list'] = $this->user_model->select_table($id, $key, $table_name);
            //print_r($data['list']);die;
            $this->load->view('parking/user/ajax_region', $data);
        } else {
            echo "";
        }
    }
    
    
      public function add_user_act() {
       /* for Email Check*/ 
       $where['email'] = $this->input->post('str_Admin_ID'); //  "sabir@gmail.com";
       $post = $this->input->post();
       $data1 = $this->user_model->select_table2($where,"admin");
       if($data1)
       {
           $this->session->set_flashdata('message', 'Email Id Already Exits');
           redirect('user/add_user');
       }
       else
       { 
        $rand = rand();
        if ($_POST['region']) {
            $region = $_POST['region'];
        } else {
            $region = "";
        }
        $de = $this->input->post('usertype');
        $design = explode(',', $de);
        $con = $this->input->post('country');
        $co = explode(',', $con);
        $words = explode(" ", $_POST['str_name']);
        $name = "";
        foreach ($words as $w) {
            $name .= $w[0];
        }
        $name = strtoupper($name);
        $coun = mb_substr($co[1], 0, 3);
        $coun = strtoupper($coun);
        $gen = mb_substr($_POST['gender'], 0, 1);
        $join = str_replace("/", "", $_POST['joining']);
        $dob = substr($_POST['dob'], -2);
        $unique = "$name$dob$gen/$coun/$join";
        if (isset($_POST)) {
            $data = array(
                'name' => $_POST['str_name'],
                'admin_id' => $_POST['str_Admin_ID'],
                'email' => $_POST['str_Admin_ID'],
                'password' => md5($_POST['str_Password']),
                'location' => $_POST['location'],
                'gender' => $_POST['gender'],
                'dob' => $_POST['dob'],
                'joining' => $_POST['joining'],
                'country' => $_POST['country'],
                'usertype' => $design[1],
				'design_id' => $design[0],
				'shift_id' => $_POST['shift_id'],
                'unique_code' => $unique,
                'tx_desc' => $post['tx_desc'],
                'region' => $region,
                'ses_id' => $rand,
                'menu' => json_encode($_POST['menu']),
                'created_at' => date('Y-m-d h:m:s')
            );
            //echo '<pre>';print_r($data);die;

              if(!empty($_FILES['image']['name']))
              { 
                $config['upload_path'] = './assets/images/employee';
                $config['allowed_types'] = 'jpeg|jpg|png|JPG|JPEG';
                $config['max_size']     = '2048000';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('image'))
                {
                $fileData = $this->upload->data();
                $data['image'] = $fileData['file_name'];
                }
                else
                {
                  return $message =  $this->upload->display_errors();
                }
              }
            $table_name = "admin";
            $last_id = $this->user_model->insert_table($data, $table_name);
            //echo $this->db->last_query(); exit;
            redirect('user');
        }
      }
    }
    
//    public function add_user_act() {
//        $rand = rand();
//        $post = $this->input->post();
//        echo '<pre>';print_r($post);die;
//        if ($_POST['region']) {
//            $region = $_POST['region'];
//        } else {
//            $region = "NUll";
//        }
//        if (isset($_POST)) {
//            $data = array(
//                'name' => $_POST['str_name'],
//                'admin_id' => $_POST['str_Admin_ID'],
//                'password' => md5($_POST['str_Password']),
//                'location' => $_POST['location'],
//                'usertype' => $_POST['usertype'],
//                'region' => $region,
//                'ses_id' => $rand
//            );
//            $table_name = "admin";
//            $last_id = $this->user_model->insert_table($data, $table_name);
//
//
//            redirect('user');
//        }
//    }

    public function edit_user($id) {
        $data = array();
        $table_name = "admin";
        $key = 'id';
        $data['list'] = $this->user_model->select_table($id, $key, $table_name);
        $table_name = "location";
		$data['location'] = $this->user_model->show_list($table_name, $where = NULL);
		$data['shift'] = $this->db->get('shift')->result();
        $table_name = "designation";
        $data['designation'] = $this->user_model->show_list($table_name, $where = NULL);
        $data['country'] = $this->customer_model->getCountry();
        $data['subview'] = $this->load->view('parking/user/edit_user', $data, TRUE);
        $this->load->view('_layout_main', $data); //page load
    }
    
    public function edit_user_act() {

        $rand = rand();
        if ($_POST['region']) {
            $region = $_POST['region'];
        } else {
            $region = "NUll";
        }
        if (isset($_POST)) {
            $post = $this->input->post();
            $de = $this->input->post('usertype');
            $design = explode(',', $de);
            $con = $this->input->post('country');
            $co = explode(',', $con);
            $words = explode(" ", $_POST['str_name']);
            $name = "";
            foreach ($words as $w) {
                $name .= $w[0];
            }
            $name = strtoupper($name);
            $coun = mb_substr($co[1], 0, 3);
            $coun = strtoupper($coun);
            $gen = mb_substr($_POST['gender'], 0, 1);
            $join = str_replace("/", "", $_POST['joining']);
            $dob = substr($_POST['dob'], -2);
            $unique = "$name$dob$gen/$coun/$join";
            $design = explode(',', $de);
            $data = array(
                'name' => $_POST['str_name'],
                'admin_id' => $_POST['str_Admin_ID'],
                'email' => $_POST['str_Admin_ID'],
                'location' => $_POST['location'],
                'gender' => $_POST['gender'],
                'dob' => $_POST['dob'],
                'joining' => $_POST['joining'],
                'country' => $_POST['country'],
                'usertype' => $design[1],
				'design_id' => $design[0],
				'shift_id' =>$_POST['shift_id'],
                'unique_code' => $unique,
                'tx_desc' => $post['tx_desc'],
                'region' => $region,
                'ses_id' => $rand,
                'menu' => json_encode($_POST['menu'])
            );
            if(!empty($_FILES['image']['name']))
              { 
                $config['upload_path'] = './assets/images/employee';
                $config['allowed_types'] = 'jpeg|jpg|png|JPG|JPEG';
                $config['max_size']     = '2048000';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('image'))
                {
                $fileData = $this->upload->data();
                $data['image'] = $fileData['file_name'];
                }
                else
                {
                  return $message =  $this->upload->display_errors();
                }
              }
              else
              {
                $data['image'] = $this->input->post('old_image');
              }
            if(!empty($_POST['str_Password'])){
               $data['password'] =  md5($_POST['str_Password']);
            }
            //echo '<pre>';print_r($data);die;
            $table_name = "admin";
            $where['id'] = $_POST['id'];
            $last_id = $this->user_model->update_table($where, $table_name, $data);
            redirect('user');
        }
    }

//    public function edit_user_act() {
//        $rand = rand();
//        if (isset($_POST)) {
//            $data = array(
//                'name' => $_POST['str_name'],
//                'admin_id' => $_POST['str_Admin_ID'],
//                'password' => md5($_POST['str_Password']),
//                'location' => $_POST['location'],
//                'prefix' => $_POST['prefix'],
//                'invAmount' => $_POST['invAmount'],
//                'dailyAmount' => $_POST['dailyAmount'],
//                'monthlyAmount' => $_POST['monthlyAmount'],
//                'ses_id' => $rand
//            );
//            $table_name = "admin";
//            $where['id'] = $_POST['id'];
//            $last_id = $this->user_model->update_table($where, $table_name, $data);
//
//            redirect('user');
//        }
//    }

    public function delete_user($id) {
        $data = array();
        $table_name = "admin";
		$where['id'] = $id;
		$update['IsDeleted'] = 1;
		$this->db->where($where)->update('admin',$update);
        // $data['list'] = $this->user_model->delete_table($where, $table_name);
        redirect('user');
    }

}
