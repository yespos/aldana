<?php

class Login_model extends CI_Model
{

    protected $_table_name = '';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = '';
    public $rules = array();
    protected $_timestamps = FALSE;

    function __construct()
    {
        parent::__construct();

        if($this->session->userdata('id') && $this->session->userdata('ses_id'))
        {
              redirect('dashboard');
        }
    }
    // CURD FUNCTION

    function login($data)
    {
      $query = $this->db->where($data)->get('admin');
    //  echo $this->db->last_query();
      $data = $query->row_array();
      if(!empty($data))
      {
      $this->session->set_userdata($data);
     // print_r($data); print_r($_SESSION); exit;
      return TRUE;
      }
      else
      {
        exit;
        return FALSE; 
      }
      
    }

   /* function other_db()
    {
        $query = $this->db2->get('customer');
        return $query->result();
    }*/

}