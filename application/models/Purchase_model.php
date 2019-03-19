<?php

class Purchase_model extends MY_Model {

    protected $_table_name = '';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = '';
    public $rules = array();
    protected $_timestamps = FALSE;

    function __construct() {
        parent::__construct();
    }

    public function getProduct() {
        return $this->db->get('filterservice')->result();
    }

    public function getRecord($id) {
        $sql = "select * from purchases where purchase_id = ?";
        if ($query = $this->db->query($sql, array($id))) {

            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function getPurchaseItems($purchase_id, $warehouse_id) {

        $this->db->select('purchase_items.*,filterservice.item, filterservice.id, filterservice.price, filterservice.quantity as product_quantity')
                ->from('purchase_items')
                ->join('filterservice', 'purchase_items.product_id = filterservice.id')
                ->where('purchase_items.purchase_id', $purchase_id);
        if ($query = $this->db->get()) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function getPurchaseReport(){
        $this->db->select('p.date,p.reference_no,p.total,s.supplier_name,pi.purchase_id,pi.quantity,pr.item')
                 ->from('purchases p')
                 ->join('suppliers s','s.supplier_id = p.supplier_id')
                 ->join('purchase_items pi','pi.purchase_id = p.purchase_id')
                 ->join('filterservice pr','pr.id = pi.product_id')
                 ->group_by('p.reference_no');
        return $this->db->get()->result();
    }

    public function getPurchase() {

        $this->db->select('purchases.*,suppliers.*,account_receipts.*')
                 ->from('purchases')
                 ->join('suppliers', 'purchases.supplier_id = suppliers.supplier_id')
                 ->join('account_receipts', 'purchases.purchase_id = account_receipts.purchase_id')->order_by('purchases.purchase_id', 'desc');
        $data = $this->db->get();
        // echo $dbs->last_query(); exit;
        // log_message('debug', print_r($data, true));
        return $data->result();
    }

    public function getSupplier() {
        return $this->db->get('suppliers')->result();
    }

    public function createReferenceNo() {
        $query = $this->db->query("SELECT * FROM purchases ORDER BY purchase_id DESC LIMIT 1");
        $result = $query->result();
        return $result;
    }

    public function getProductAjax($id) {
        $sql = "select * from filterservice where id = ?";
        $data = $this->db->query($sql, array($id));
        return $data->result();
    }

    public function generateInvoiceNo() {
        $query = $this->db->query("SELECT * FROM account_receipts ORDER BY receipt_voucher_no DESC LIMIT 1");
        $result = $query->result();
        if ($result == null) {
            $no = sprintf('%06d', intval(1));
        } else {
            foreach ($result as $value) {
                $no = sprintf('%06d', intval($value->receipt_voucher_no) + 1);
            }
        }
        return "P-INV-" . $no;
    }

    public function addModel($data, $invoice) {

        $sql = "insert into purchases (date,reference_no,supplier_id,warehouse_id,total,discount_value,tax_value,note,user) values(?,?,?,?,?,?,?,?,?)";
        if ($this->db->insert("purchases", $data)) {
            /* print_r($sql);
              print_r($data);
              exit(); */
            /* if($dbs->insert('purchases',$data)){ */
            $insert_id = $this->db->insert_id();
            $invoice['purchase_id'] = $insert_id;
            $this->db->insert('account_receipts', $invoice);
            return $insert_id;
        } else {
            return FALSE;
        }
    }

    public function addPurchaseItem($data) {
        $sql = "insert into purchase_items(product_id,quantity,gross_total,discount_id,discount_value,discount,tax_id,tax_value,tax,cost,purchase_id) values (?,?,?,?,?,?,?,?,?,?,?)";
        if ($this->db->query($sql, $data)) {
            /* if($dbs->insert('purchase_items',$data)){ */
            return true;
        } else {
            return false;
        }
    }

    public function updateProductQuantity($product_id, $quantity) {
        $sql = "select * from filterservice where id = ?";
        $product_data = $this->db->query($sql, array($product_id));
        if ($product_data->num_rows() > 0) {
            $p_data = $product_data->result();
            foreach ($p_data as $pvalue) {
                $pquantity = $quantity + $pvalue->quantity;
                $sql = "update filterservice set quantity = ? where id = ?";
                $this->db->query($sql, array($pquantity, $product_id));
            }
        }
    }

    /*
      add new record or update quantity in warehouse_products table
     */

    public function addProductInWarehouse($product_id, $quantity, $warehouse_id, $warehouse_data) {
        $dbs = $this->load->database('default', TRUE);
        $sql = "select * from warehouses_products where product_id = ? AND warehouse_id = ?";
        $query = $dbs->query($sql, array($product_id, $warehouse_id));

        if ($query->num_rows() > 0) {
            $result = $query->result();
            foreach ($result as $value) {
                $wquantity = $quantity + $value->quantity;
                $sql = "update warehouses_products set quantity = ? where product_id = ? AND warehouse_id = ?";
                $dbs->query($sql, array($wquantity, $product_id, $warehouse_id));
                $this->updateProductQuantity($product_id, $quantity);
            }
        } else {
            $sql = "insert into warehouses_products (product_id,warehouse_id,quantity) values (?,?,?)";
            $dbs->query($sql, $warehouse_data);
            $this->updateProductQuantity($product_id, $quantity);
        }
    }

    /*
      delete old purchase item when edit purchse
     */

    public function deletePurchaseItems($purchase_id, $product_id, $quantity = null, $warehouse_id = null) {

        $sql = "select * from purchase_items where purchase_id = ? AND product_id = ?";
        $delete_quantity = $this->db->query($sql, array($purchase_id, $product_id))->row()->quantity;


//        $sql = "select * from warehouses_products where warehouse_id = ? AND product_id = ?";
//        $warehouse_quantity = $this->db->query($sql,array($warehouse_id,$product_id))->row()->quantity;
//
//        $wquantity = $warehouse_quantity - $delete_quantity;
//        $sql = "update warehouses_products set quantity = ? where warehouse_id = ? AND product_id = ?";
//        $this->db->query($sql,array($wquantity,$warehouse_id,$product_id));

        $sql = "select * from filterservice where id = ?";
        $product_quantity = $this->db->query($sql, array($product_id))->row()->quantity;
        if ($quantity >= $delete_quantity) {
            $check_qty = $quantity - $delete_quantity;
            $pquantity = $product_quantity + $check_qty;
        } elseif ($quantity <= $delete_quantity) {
            $check_qty = $delete_quantity - $quantity;
            $pquantity = $product_quantity - $check_qty;
        }

        //$pquantity = $product_quantity - $delete_quantity;
        $sql = "update filterservice set quantity = ? where id = ?";
        $this->db->query($sql, array($pquantity, $product_id));

//        $sql = "delete from purchase_items where purchase_id = ? AND product_id = ?";
//        $this->db->query($sql,array($purchase_id,$product_id));

        if ($this->db->query($sql, array($pquantity, $product_id))) {
            return true;
        } else {
            return false;
        }
    }
    
    /* 
		add or update purchase items in database 
	*/
	public function addUpdatePurchaseItem($purchase_id,$product_id,$warehouse_id,$quantity,$data,$warehouse_data){
            $dbs = $this->load->database('default', TRUE);
            $sql = "select * from purchase_items where purchase_id = ? AND product_id = ?";
            $result = $dbs->query($sql,array($purchase_id,$product_id));

            if($result->num_rows()>0){
                $purchase_quantity = $result->row()->quantity;
                $where = "purchase_id = $purchase_id AND product_id = $product_id";
                $dbs->where($where);
                $dbs->update('purchase_items',$data);
                $sql = "select * from warehouses_products where warehouse_id = ? AND product_id = ?";
                $warehouse_quantity = $dbs->query($sql,array($warehouse_id,$product_id))->row()->quantity;

                $new_quantity = $warehouse_quantity + $quantity - $purchase_quantity;
                $sql = "update warehouses_products set quantity = ? where warehouse_id = ? AND product_id = ?";
                $dbs->query($sql,array($new_quantity,$warehouse_id,$product_id));


                $sql = "select * from filterservice where id = ?";
                $product_quantity = $dbs->query($sql,array($product_id))->row()->quantity;

                $new_quantity = $product_quantity + $quantity - $purchase_quantity;
                $sql = "update filterservice set quantity = ? where id = ?";
                $dbs->query($sql,array($new_quantity,$product_id));

            }
            else{
                $this->addProductInWarehouse($product_id,$quantity,$warehouse_id,$warehouse_data);
                $this->addPurchaseItem($data);
            }

	}
    
    
    /* 
		return discount detail use drop down 
	*/
	public function getDiscount(){
		return $this->db->get('discount')->result();
	}
        /* 
		return tax detail use dynamic table
	*/
	public function getTax(){
		return $this->db->get_where('tax',array('delete_status'=>0))->result();
	}

    // CURD FUNCTION

    public function getDetails($id){
        
        return $this->db->select('p.*,
                                  w.warehouse_name,
                                  b.city as branch_city,
                                  b.address as branch_address,
                                  s.supplier_name,
                                  s.address as supplier_address,
                                  s.mobile as supplier_mobile,
                                  s.email as supplier_email,
                                  '
                                )
                         ->from('purchases p')
                         ->join('warehouse w','p.warehouse_id = w.warehouse_id')
                         ->join('branch b','w.branch_id = b.branch_id')
                         ->join('suppliers s','p.supplier_id = s.supplier_id')
                        // ->join('cities ct','s.city_id = ct.id')
                         // ->join('users u','p.user = u.id')
                         ->where('purchase_id',$id)
                         ->get()
                         ->result();
    }

    public function getItems($id){
       
        return $this->db->select('pi.*,pr.*')
                         ->from('purchase_items pi')
                         ->join('filterservice pr','pi.product_id = pr.id')
                         ->where('pi.purchase_id',$id)
                         ->get()
                         ->result();
    }

    public function getCompany(){
        return $this->db->select('cs.*,s.name as state_name,co.name as country_name')
                        ->from('company_settings cs')
                     /* ->join('cities c','cs.city_id = c.id') */
                        ->join('states s','cs.state_id = s.id')
                        ->join('countries co','cs.country_id = co.id')
                        ->get()
                        ->result();
      }

      public function generateReferenceNo(){
        
        $query = $this->db->query("SELECT * FROM account_payments ORDER BY payment_voucher_no DESC LIMIT 1");
        $result = $query->result();
        return $result;
    }

    public function getLedger(){
        return $this->db->get('ledger')->result();
    }

    public function addPayment($data){
        if($this->db->insert('account_payments',$data)){
           $this->db->where('purchase_id',$data['purchase_id']);
           $this->db->update('account_receipts',array("paid_amount"=>$data['payment_amount']));
          return true;
        }else{
            return false;
        }
    }
}
