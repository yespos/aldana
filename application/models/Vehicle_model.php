<?php

class Vehicle_model extends MY_Model
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
    
    
    public function getVehicleList(){
        $data = $this->db->select('t1.*, t2.customerName,t2.localMobile as customermobile,t3.carName as brand')
                ->from('vehicle t1')
                ->join('customer t2','t1.customerId = t2.id','left')
                ->join('car t3','t1.vehicleBrand = t3.id','left')
                ->order_by('t1.id','DESC')
                ->get()
                ->result();
        return $data;
    }
    // CURD FUNCTION

}
