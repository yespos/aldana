<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
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


      
 }  