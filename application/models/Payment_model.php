<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function makePayments($param){
        if($param){
			$post = $param;
			// print_r($post); exit;
            $data = array(
                'UserSysId' => $post['UserSysId'],
                'BranchSysId' => $post['BranchSysId'],
                'AgencySysId' => $post['AgencySysId'],
                'payment_date' => $post['payment_date'],
                'particular_id' => $post['particular_id'],
                'ReferenceNo' => $post['ReferenceNo'],
                'payment_amount' => $post['payment_amount'],
                'mode_of_payment' => $post['mode_of_payment'],
				/* 'cardNo'    => isset($post['cardNo'])?$post['cardNo']:"",
				'numpad' => $post['numpad'],
				'return_amount' =>$post['return_amount'], */
                'ChequeTrnRefNo' => $post['ChequeTrnRefNo'],
                'ChequeTrnRefdate' => $post['ChequeTrnRefdate'],
                'bank_name' => $post['bank_name'],
                'receivers' => $post['receivers'],
                'description' => $post['description'],
                'particular_type' => $post['particular_type'],
                'jobcardtype' => $post['jobcardtype'],
                'status' => !empty($post['status'])?$post['status']:'',
                'created_at'=>date('Y-m-d h:i:s'),
                'updated_at'=>date('Y-m-d h:i:s'),
            );
           // echo '<pre>';print_r($data);die;
            $this->db->insert('payment',$data);
            $lastinserId =  $this->db->insert_id();
            if (!empty($lastinserId)) {
                return $lastinserId;
            } else {
                return false;
            }
         }else{
             die('wrong request!');
        } 
    }
    public function Details($id){
        $this->db->select('payment.*');
        $this->db->from('payment');
        $this->db->where('id',$id);
        $data = $this->db->get()->row();
        //echo $this->db->last_query();die('dd');
        return $data;
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
    
    public function paymentReferenceNo(){
        $query = $this->db->select('ReferenceNo')->limit(1)->order_by('id','desc')->get('payment');
        $data = $query->row();
        $reference_no = str_replace('PP-', '', $data->ReferenceNo);
        $ReferenceNo = sprintf('%06d',intval($reference_no)+1);
        return  'PP-'.$ReferenceNo;
    }
    public function invoiceReferenceNo(){
        $query = $this->db->select('ReferenceNo')->limit(1)->order_by('id','desc')->get('invoice');
        $data = $query->row();
        $reference_no = str_replace('INV-', '', $data->ReferenceNo);
        $ReferenceNo = sprintf('%06d',intval($reference_no)+1);
        return  'INV-'.$ReferenceNo;
    }
    public function CheckInvoiceExist($particular_id,$particular_type,$jobcardtype=null){
        $this->db->select('invoice.*');
        $this->db->from('invoice');
        $this->db->where('particular_id',$particular_id);
        $this->db->where('particular_type',$particular_type);
        if($jobcardtype){
            $this->db->where('jobcardtype',$jobcardtype);
        }
        $data = $this->db->get()->row();
        return $data;
    }
    
    
    public function paymentvoucherList(){
        $this->db->select('payment_voucher.*,accounts_structure.name as bank_name,suppliers.company_name as supplier_name');
        $this->db->from('payment_voucher');
        $this->db->join('accounts_structure','accounts_structure.id = payment_voucher.bank_account_id','left');
        $this->db->join('suppliers', 'payment_voucher.supplier_id = suppliers.supplier_id');
        $this->db->where('payment_voucher.IsDeleted',0);
        $this->db->order_by('payment_voucher.id','DESC');
        $data = $this->db->get()->result();
        //echo $this->db->last_query();die('dd');
        return $data;
    }
    public function paymentvoucherDetails($id){
        $this->db->select('payment_voucher.*,accounts_structure.name as bank_name,suppliers.company_name as supplier_name');
        $this->db->from('payment_voucher');
        $this->db->join('accounts_structure','accounts_structure.id = payment_voucher.bank_account_id','left');
        $this->db->join('suppliers', 'payment_voucher.supplier_id = suppliers.supplier_id');
        $this->db->where('payment_voucher.id',$id);
        $this->db->where('payment_voucher.IsDeleted',0);
        $data = $this->db->get()->row();
        //echo $this->db->last_query();die('dd');
        return $data;
    }
    public function journalvoucherList($id=null){
        $this->db->select('journals_voucher.*,accounts_structure.name as account_name,accounts_structure.under_name');
        $this->db->from('journals_voucher');
        $this->db->join('accounts_structure','accounts_structure.id = journals_voucher.account_id','left');
        if(!empty($id)){
            $this->db->where('journals_voucher.parent_id',$id);
        }else{
            $this->db->where('journals_voucher.parent_id',0);
        }
        $this->db->where('journals_voucher.IsDeleted',0);
        $data = $this->db->get()->result();
        //echo $this->db->last_query();die('dd');
        return $data;
    }
    public function debitNoteList($id=null){
        $this->db->select('debit_note.*,accounts_structure.name as account_name,accounts_structure.under_name');
        $this->db->from('debit_note');
        $this->db->join('accounts_structure','accounts_structure.id = debit_note.account_id','left');
        if(!empty($id)){
            $this->db->where('debit_note.parent_id',$id);
        }else{
            $this->db->where('debit_note.parent_id',0);
        }
        $this->db->where('debit_note.IsDeleted',0);
        $data = $this->db->get()->result();
        //echo $this->db->last_query();die('dd');
        return $data;
    }
    public function creditNoteList($id=null){
        $this->db->select('credit_note.*,accounts_structure.name as account_name,accounts_structure.under_name');
        $this->db->from('credit_note');
        $this->db->join('accounts_structure','accounts_structure.id = credit_note.account_id','left');
        if(!empty($id)){
            $this->db->where('credit_note.parent_id',$id);
        }else{
            $this->db->where('credit_note.parent_id',0);
        }
        $this->db->where('credit_note.IsDeleted',0);
        $data = $this->db->get()->result();
        //echo $this->db->last_query();die('dd');
        return $data;
    }
    public function journalvoucherDetails($id){
        $this->db->select('journals_voucher.*');
        $this->db->from('journals_voucher');
        $this->db->where('journals_voucher.id',$id);
        $this->db->where('journals_voucher.IsDeleted',0);
        $data = $this->db->get()->row();
        //echo $this->db->last_query();die('dd');
        return $data;
    }
    public function debitNoteDetails($id){
        $this->db->select('debit_note.*,accounts_structure.name as account_name,accounts_structure.under_name');
        $this->db->join('accounts_structure','accounts_structure.id = debit_note.account_id','left');
        $this->db->from('debit_note');
        $this->db->where('debit_note.id',$id);
        $this->db->where('debit_note.IsDeleted',0);
        $data = $this->db->get()->row();
        //echo $this->db->last_query();die('dd');
        return $data;
    }
    public function creditNoteDetails($id){
        $this->db->select('credit_note.*,accounts_structure.name as account_name,accounts_structure.under_name');
        $this->db->join('accounts_structure','accounts_structure.id = credit_note.account_id','left');
        $this->db->from('credit_note');
        $this->db->where('credit_note.id',$id);
        $this->db->where('credit_note.IsDeleted',0);
        $data = $this->db->get()->row();
        //echo $this->db->last_query();die('dd');
        return $data;
    }

}
