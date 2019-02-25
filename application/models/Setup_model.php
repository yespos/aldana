<?php

class Setup_model extends MY_Model
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
    
    public function getLastRowId()
    {
        return $this->db->order_by('id',"desc")
            ->limit(1)
            ->get('filterservice')
            ->row()->id;
    }
    // CURD FUNCTION

}
