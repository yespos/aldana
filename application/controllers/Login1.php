<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $data = array();
        $this->load->model('login_model');
        if($this->session->userdata('id') && $this->session->userdata('ses_id'))
        {
              redirect('dashboard');
        }

       // $this->db2 = $this->load->database('other_db',TRUE);
    
    }

    function index()
    { 
    	//  print_r($_SESSION); exit;
    	$this->load->view("login");
    }

    function login_act()
    {
      if(isset($_POST))
        {
                $data = array(
                    'admin_id' => $_POST['admin_id'],
                    'password' => md5($_POST['password']),
                     );
                $table_name = "admin";
                $status = $this->login_model->login($data);
                if($status)
                {
                	$isMobile = $this->isMobile();

                	if($isMobile)
                	{
                		$this->session->set_userdata('pda',$isMobile);
                	    redirect('pda');
                	}
                	else
                	{
                	 redirect('dashboard');
                	}
                }
                else
                {
                redirect('login');
                }
	     }

	    redirect('login');
     }


    function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }

    function otherdb()
    {  
        $data = $this->login_model->other_db();
        print_r($data);
    }

    


}