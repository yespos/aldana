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
        if($this->session->userdata('id') && $this->session->userdata('user_id'))
        {
              redirect('dashboard');
        }
    }
    // CURD FUNCTION

    function login($data)
    {
      $query = $this->db->where($data)->get('admin');
      $data1 = $query->row_array();
    
      if(!empty($data1['design_id']))
      { 
        $design_id = $data1['design_id'];
        $query = $this->db->where('design_id',$design_id)->get('designation');
        $design_data = $query->row_array();
        $this->session->set_userdata($design_data);
      }
      
      if(!empty($data1))
      {
      $this->session->set_userdata($data1);
      $this->session->set_userdata('type','admin');
      $this->session->set_userdata('user_id',$data1['id']);
      $this->session->set_userdata('masteruser_id',$data1['user_id']);
      unset($_SESSION['password']);
      $branch_id = $data1['branch_id'];
      $query = $this->db->where('branch_id',$branch_id)->get('branch');
      $branch_data = $query->row_array();
      // print_r($branch_data); exit;
      $this->session->set_userdata($branch_data);
      return TRUE;
      }
      
      else
      {
        $this->session->set_flashdata('message', 'Username and Password does not Match'); 
        return FALSE; 
      }
      
    }

   /* function other_db()
    {
        $query = $this->db2->get('customer');
        return $query->result();
    }*/

   /* public function set_currency_in_session(){
    $dbs = $this->load->database('other_db', TRUE);
    $result =  $dbs->query('SELECT 
                c.name,c.symbol 
              FROM company_settings cs 
              INNER JOIN currency c ON c.id = cs.default_currency
            ')->row();
    
    if($result!=null){
      if($result->symbol=="INR"){
        $sym = "<span class='fa fa-rupee'></span>";
      }
      else{
        $sym = $result->symbol;
      }
      $data = array(
          'currency_name' => $result->name,
          'symbol' => $sym
        );
    }
    else{
      $data = array(
          'currency_name' => 'AED',
          'symbol' => 'AED'
        );
      }
    return $data;
  }*/

}