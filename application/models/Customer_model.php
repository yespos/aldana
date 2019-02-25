<?php

class Customer_model extends MY_Model
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
    
    
    public function PurchaseReport(){
        $this->db->select('purchase_join.PurchaseID,purchase_join.ProductID,product.ProductCode,product.ProductName,purchase_join.Warehouse, SUM(purchase_join.Qty) as PurchaseQty,SUM(purchase_join.availableQty) as availableQty,SUM(purchase_join.TotalAmount) as TotalAmount');
        $this->db->from('product');
        $this->db->join('purchase_join',' product.PID = purchase_join.ProductID');
        //$this->db->where('product.PID','purchase_join.ProductID');
        $this->db->where('purchase_join.IsTransfer',0);
        $this->db->group_by(['purchase_join.Warehouse', 'purchase_join.ProductID']);
        
        $data = $this->db->get()->result();
        //echo $this->db->last_query();die('dd');
        return $data;
    }
    public function warehouseTowarehouse(){
        $this->db->select('*');
        $this->db->from('purchase_join');
        $this->db->where('purchase_join.ProductID',2);
        $this->db->where('purchase_join.Warehouse','WP1');
        $this->db->where('purchase_join.PurchaseID',4);
        //$this->db->where('purchase_join.availableQty >=',20);
        $this->db->order_by('purchase_join.SP_ID','ASC');
        $data = $this->db->get()->result();
        return $data;
    }
    
    public function getRecordRow($id){
        $sql = "select * from customer where id = ?";
        if($query = $this->db->query($sql,array($id))){
        /*$dbs->where('customer_id',$data);
        if($query = $dbs->get('customer')){*/
            return $query->row();
        }
        else{
            return FALSE;
        }
    }
    
    public function getCountry(){
        return $this->db->get('countries')->result();
    }

    // CURD FUNCTION

}
