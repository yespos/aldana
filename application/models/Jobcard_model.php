<?php
class Jobcard_model extends MY_Model
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
    }

    public function check_ref($ref_no)
    {
      return $this->db->where('ref_no',$ref_no)->get('jobcard')->row()->id;
    }

    public function check_ref_ecowash($ref_no)
    {
      return $this->db->where('ref_no',$ref_no)->get('ecowash')->row()->id;
		}
		
	public function getLastjobcard_no($table_name,$type) {
			$query = $this->db->select('id,jobcard_no')
							->limit(1)
							->where('jobcardtype',$type)
							->order_by('id','desc')
							->get($table_name);
			// echo $this->db->last_query(); exit;    
			return $query->row();
	}

	public function show_jobcardlist($table_name,$where=NULL)
    { 
         if(!empty($where))
           {
             $this->db->where($where);
		   } 
		  $this->db->order_by('id','desc');
          $query = $this->db->get($table_name);
           //  echo  $this->db->last_query(); 
          return  $query->result();
	}

    public function GetPaymentReceiptDetails($id=null) {
       // echo $id;
        $this->db->select('payment.*,payment_method.name as PaymentMode,s.customerName,s.localMobile as cmobile,s.email as cemail,jobcard.ref_no as ref_no')
                ->from('payment')
                ->join('payment_method', 'payment.mode_of_payment = payment_method.id','left')
                ->join('jobcard', 'payment.particular_id = jobcard.id')
                ->join('customer s', 'jobcard.customer_id = s.id');
        if($id){
            $this->db->where('payment.id',$id);
        }
        $this->db->where('payment.particular_type',2);
        $data = $this->db->get();
        return $data->row();
    }
	
	public function show_filter_jobcardlist($table_name,$where,$between)
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

     public function GetPaymentReceipt($id=null) {
        $this->db->select('payment.*,payment_method.name as PaymentMode')
                ->from('payment')
                ->join('payment_method', 'payment.mode_of_payment = payment_method.id');
        if($id){
            $this->db->where('payment.particular_id',$id);
        }
        $this->db->where('payment.particular_type',2);
        $this->db->order_by('id','ASC');
        $data = $this->db->get();
        return $data->result();
    }

    // CURD FUNCTION

}
