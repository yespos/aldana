<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pda extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $data = array();
        $this->load->model('pda_model');
        /* if(!$this->session->userdata('pda'))
        {
        	redirect('dashboard');
        }*/

    }

    public function index()
	{
		$this->load->view('parking/layout/header');
		$this->load->view('parking/layout/sidebar');
		$this->load->view('parking/pda_dashboard');
	
	}

}
