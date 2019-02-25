<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $data = array();
        if(!$this->session->userdata('id') && !$this->session->userdata('ses_id'))
        {
              redirect('login');
        }

    }


  function index()
    {

    	$data = $_SESSION;
    	// print_r($data); exit;
    	$this->session->sess_destroy();
    	redirect('login');
    }

    function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
  }