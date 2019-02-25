<?php

class MY_Model extends CI_Model
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

        if(!$this->session->userdata('id') && !$this->session->userdata('ses_id'))
        {
              redirect('login');
        }
    }

    // CURD FUNCTION

    

    /*  our code */

    public function insert_table($data,$table_name)
    {
          $insert = $this->db->insert($table_name,$data);
     //  echo  $this->db->last_query();
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function select_table($id,$key,$table_name)
    {
        $query = $this->db->where($key,$id)
                          ->get($table_name);
        return  $query->row();
    }

    public function show_list($table_name,$where=NULL)
    { 
         if(!empty($where))
           {
             $this->db->where($where);
		   } 
		  // $this->db->order_by('id','desc');
          $query = $this->db->get($table_name);
           //  echo  $this->db->last_query(); 
          return  $query->result();
    }

    public function show_details($table_name,$group = NULL,$where= NULL,$order = NULL)
    {
          if(!empty($where))
          {
           $this->db->where($where);
          } 

          if(!empty($group))
          {
            $this->db->group_by($group);
          }

          if(!empty($order))
          { 
            $arr = array_keys($order);
            $key = $arr[0];
            $value = $order[$key];
            $this->db->order_by($key,$value);
		  }
		  
          $query = $this->db->get($table_name);
    // echo $this->db->last_query(); exit;
        return  $query->result();
    }

    /*public function update_table($id,$key,$table_name,$data)
    {
        $query = $this->db->where($key,$id)

                          ->update($table_name,$data);
       // echo $this->db->last_query(); exit;                  

        return  $query;
    }*/

    public function update_table($where,$table_name,$data)
    {

        $query = $this->db->where($where)
                          ->update($table_name,$data);
       // echo $this->db->last_query(); exit;                  

        return  $query;
    }

    public function delete_table($where,$table_name)
    {
        $query = $this->db->where($where)
                          ->delete($table_name);
        return  $query;

    }

    public function getLastId($table_name)
    {
        $query = $this->db->select('id')
                          ->limit(1)
                          ->order_by('id','desc')
                          ->get($table_name);
           // echo $this->db->last_query(); exit;    
        return  $query->row();
    }

     public function select_table2($where,$table_name)
     {
        $query = $this->db->where($where)
                          ->get($table_name);
      //  echo $this->db->last_query(); exit; 
        return  $query->row();

     }

     public function show_filter_list($table_name,$where,$between)
     {
         $this->db->select('*');
         $this->db->from($table_name);
         if(!empty($where))
         {
         $this->db->where($where);
         }
         if(!empty($between))
         {
         $where1 = "Date BETWEEN '".$between['from']."' AND '".$between['to']."'";
         $this->db->where($where1);
       //  $this->db->where("date BETWEEN ".$between['from']." AND ".$between['to']."");
         }
         $this->db->order_by('id','desc');
         $query = $this->db->get();
      //  echo $this->db->last_query(); exit;

        return  $query->result();
     }


    function daily_filter_list($table_name,$where,$between)
    {

         $this->db->select('*');
         $this->db->from('jobcard');
         $this->db->join('ecowash', 'jobcard.date = ecowash.date','LEFT');
         if(!empty($where))
         {
         $this->db->where($where);
         }
         if(!empty($between))
         {
         $where1 = "Date BETWEEN '".$between['from']."' AND '".$between['to']."'";
         $this->db->where($where1);
       //  $this->db->where("date BETWEEN ".$between['from']." AND ".$between['to']."");
         }
          $this->db->group_by('ref_no');
         $query = $this->db->get();
       // echo $this->db->last_query(); exit;

        return  $query->result();

    }

    function customer_service($table_name,$where)
    {
          $this->db->select('count(item_id) as count,item_id');
          $this->db->from($table_name);
          $this->db->where($where);
          $this->db->group_by('item_id');
          return  $query = $this->db->get()->row();
         // echo $this->db->last_query(); 
	}
	
	public function getRow($table_name,$where=NULL)
    {
         if(!empty($where))
           {
            $this->db->where($where);
           } 
         $query = $this->db->get($table_name);
         return  $query->row();
    }

   

}
