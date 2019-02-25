<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {


	function __construct()
    {
        parent::__construct();

        if($this->session->userdata('pda'))
        {
        	redirect('pda');
        }
    }

	public function index()
	{
		$this->load->view('parking/layout/header');
		$this->load->view('parking/layout/sidebar');
		$this->load->view('parking/dashboard');
	
	}
}
