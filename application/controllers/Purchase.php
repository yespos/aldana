<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('purchase_model');
        $this->load->model('log_model');
    }

    public function index() {
        $_SESSION['type'] = "admin";
        $data['data'] = $this->purchase_model->getPurchase();
        // echo "<pre>"; print_r($data['data']); exit;
        $data['subview'] = $this->load->view('parking/purchase/list', $data, TRUE);
        $this->load->view('_layout_main', $data);
    }

    public function add() {
        $this->load->model('setup_model');
        $table_name = "filterservice";
        $data['product'] = $this->purchase_model->show_list($table_name, $where = NULL);
        $data['supplier'] = $this->purchase_model->getSupplier();
        $data['reference_no'] = $this->purchase_model->createReferenceNo();
        //$this->load->view('purchase/add',$data);
        $data['subview'] = $this->load->view('parking/purchase/add', $data, TRUE);
        $this->load->view('_layout_main', $data);
    }

    public function getProductAjax($id) {
        $data = $this->purchase_model->getProductAjax($id);
        /* $data['discount'] = $this->purchase_model->getDiscount();
          $data['tax'] = $this->purchase_model->getTax(); */
        echo json_encode($data);
        //print_r($data);
    }

    public function addPurchase() {
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('reference_no', 'Reference No', 'trim|required');

        if ($this->form_validation->run() == false) {

            $this->add();
        } else {
            $warehouse_id = $this->input->post('warehouse');
            $data = array(
                "date" => $this->input->post('date'),
                "reference_no" => $this->input->post('reference_no'),
                "supplier_id" => $this->input->post('supplier'),
                "warehouse_id" => $warehouse_id,
                "total" => $this->input->post('grand_total'),
                "discount_value" => $this->input->post('total_discount'),
                "tax_value" => $this->input->post('total_tax'),
                "DueAmount" => $this->input->post('total'),
                "PaidAmount" => 0.00,
                "note" => $this->input->post('note'),
                "user" => $this->session->userdata('id')
             );
             $invoice = array(
                "invoice_no" => $this->purchase_model->generateInvoiceNo(),
                "receipt_amount" => $this->input->post('grand_total'),
                "receipt_voucher_date" => date('Y-m-d')
            );
            if ($purchase_id = $this->purchase_model->addModel($data, $invoice)) {
                $log_data = array(
                    'user_id' => $this->session->userdata('user_id'),
                    'table_id' => $purchase_id,
                    'message' => 'Purchase Inserted'
                );
                $this->log_model->insert_log($log_data);
                $purchase_item_data = $this->input->post('table_data');
                $js_data = json_decode($purchase_item_data);

                foreach ($js_data as $key => $value) {
                    if ($value == null) {
                        
                    }else {
                        $product_id = $value->product_id;
                        $quantity = $value->quantity;
                        $data = array(
                            "product_id" => $value->product_id,
                            "quantity" => $value->quantity,
                            "gross_total" => $value->total,
                            "discount_id" => $value->discount_id,
                            "discount_value" => $value->discount_value,
                            "discount" => $value->discount,
                            "tax_id" => $value->tax_id,
                            "tax_value" => $value->tax_value,
                            "tax" => $value->tax,
                            "cost" => $value->cost,
                            "purchase_id" => $purchase_id
                        );
                        $warehouse_data = array(
                            "product_id" => $value->product_id,
                            "warehouse_id" => $warehouse_id,
                            "quantity" => $value->quantity
                        );
                        //$this->purchase_model->updateProductQuantity($value->product_id, $value->quantity);
                        $this->purchase_model->addProductInWarehouse($product_id,$quantity,$warehouse_id,$warehouse_data);
                        if($this->purchase_model->addPurchaseItem($data)) {
                            
                        }else {
                            
                        }
                    }
                }
                redirect('purchase', 'refresh');
            } else {
                
            }
        }
    }

    public function edit($id) {
        $table_name = "filterservice";
        $data['product'] = $this->purchase_model->show_list($table_name, $where = NULL);
        // $data['warehouse'] = $this->purchase_model->getWarehouse(); 
        $data['supplier'] = $this->purchase_model->getSupplier();
        $data['data'] = $this->purchase_model->getRecord($id);

        // $data['discount'] = $this->purchase_model->getDiscount();
        // $data['tax'] = $this->purchase_model->getTax();
        //echo "<pre>";print_r($data['data']);echo "</pre>";
        foreach ($data['data'] as $key) {
            $purchase_id = $key->purchase_id;
            $warehouse_id = $key->warehouse_id;
            $data['items'] = $this->purchase_model->getPurchaseItems($purchase_id, $warehouse_id);
        }
        //echo "<pre>";print_r($data['items']);echo "</pre>";
        // $this->load->view('purchase/edit',$data);
        $data['subview'] = $this->load->view('parking/purchase/edit', $data, TRUE);
        $this->load->view('_layout_main', $data);
    }

    public function editPurchase() {
        $id = $this->input->post('purchase_id');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('reference_no', 'Reference No', 'trim|required');
        //$this->form_validation->set_rules('supplier_id','Supplier ID','trim|required');
        //$this->form_validation->set_rules('warehouse_id','Warehouse ID','trim|required');
        $post = $this->input->post();
        //echo "<pre>";print_r($post);echo "</pre>";die;
//        $quantity = $post['qty'][1];
//        $sql = "select * from purchase_items where purchase_id = ? AND product_id = ?";
//        $delete_quantity = $this->db->query($sql,array($id,$post['product_id'][1]))->row()->quantity;
//        
//        $sql = "select * from filterservice where id = ?";
//        $product_quantity = $this->db->query($sql,array($post['product_id'][1]))->row()->quantity;
//        if($quantity >= $delete_quantity){
//            $check_qty = $quantity - $delete_quantity;
//            $pquantity = $product_quantity + $check_qty;
//        }elseif($quantity <= $delete_quantity){
//            $check_qty = $delete_quantity - $quantity;
//            $pquantity = $product_quantity - $check_qty;
//        }
//        echo "<pre>";print_r($delete_quantity);echo "</pre>";
//        echo "<pre>";print_r($product_quantity);echo "</pre>";
//        echo "<pre>";print_r($check_qty);echo "</pre>";
//        echo "<pre>";print_r($pquantity);echo "</pre>";
//        echo "<pre>";print_r($post);echo "</pre>";
//        
//        die;
        if ($this->form_validation->run() == false) {

            $this->edit($id);
        } else {
            $warehouse_id = $this->input->post('warehouse');
            $data = array(
                "date" => $this->input->post('date'),
                "reference_no" => $this->input->post('reference_no'),
                "supplier_id" => $this->input->post('supplier'),
                "warehouse_id" => $this->input->post('warehouse'),
                "total" => $this->input->post('grand_total'),
                "discount_value" => $this->input->post('total_discount'),
                "tax_value" => $this->input->post('total_tax'),
                "note" => $this->input->post('note'),
                "user" => $this->session->userdata('id'),
                    //"table_data"=>$this->input->post('table_data'),
                    //"table_data1"=>$this->input->post('table_data1')
            );

            $purchase_item_data = $this->input->post('table_data');
            $js_data = json_decode($purchase_item_data);
            //echo "<pre>";print_r($js_data);echo "</pre>";die;
            $php_data = json_decode($this->input->post('table_data'));
            $this->db->where('purchase_id',$id);
            if ($this->db->update('purchases',$data)) {
                $log_data = array(
                    'user_id' => $this->session->userdata('id'),
                    'table_id' => $id,
                    'message' => 'Purchase Updated'
                );
                $this->log_model->insert_log($log_data);
                foreach ($post['product_id'] as $key => $value) {
                    $quantity = isset($post['qty'][$key])?$post['qty'][$key]:'0';
                    $product_id = isset($post['product_id'][$key])?$post['product_id'][$key]:'0';
                    $data = array(
                        "product_id" => $post['product_id'][$key],
                        "quantity" => $post['qty'][$key],
                        "gross_total" => $post['linetotal'][$key],
                        "discount_id" => $post['discount_value'][$key],
                        "discount_value" => $post['discount_value'][$key],
                        "discount" => $post['hidden_discount'][$key],
                        "tax_id" => $post['item_tax'][$key],
                        "tax_value" => $post['tax_value'][$key],
                        "tax" => $post['hidden_tax'][$key],
                        "cost" => $post['price'][$key],
                        "purchase_id" => $id
                    );
                    $warehouse_data = array(
                        "product_id" => $post['product_id'][$key],
                        "warehouse_id" => $warehouse_id,
                        "quantity" => $post['qty'][$key]
                    );
                    if($this->purchase_model->addUpdatePurchaseItem($id,$product_id,$warehouse_id,$quantity,$data,$warehouse_data)){
                        //echo " 1 Asuccess add";
                    }
                    else{

                    }
//                    $this->db->where(array('purchase_id' => $id, 'product_id' => $value));
//                    $query = $this->db->get('purchase_items');
//                    if($query->num_rows() == 1){
//                        $data = array(
//                            "product_id" => $post['product_id'][$key],
//                            "quantity" => $post['qty'][$key],
//                            "gross_total" => $post['linetotal'][$key],
//                            "discount_id" => $post['discount_value'][$key],
//                            "discount_value" => $post['discount_value'][$key],
//                            "discount" => $post['hidden_discount'][$key],
//                            "tax_id" => $post['item_tax'][$key],
//                            "tax_value" => $post['tax_value'][$key],
//                            "tax" => $post['hidden_tax'][$key],
//                            "cost" => $post['price'][$key],
//                            "purchase_id" => $id
//                        );
//                        $this->purchase_model->deletePurchaseItems($id, $value, $quantity);
//                        $this->db->where(array('purchase_id' => $id, 'product_id' => $value));
//                        $this->db->update('purchase_items',$data);
//                    }else{
//                        $data = array(
//                            "product_id" => $post['product_id'][$key],
//                            "quantity" => $post['qty'][$key],
//                            "gross_total" => $post['linetotal'][$key],
//                            "discount_id" => $post['discount_value'][$key],
//                            "discount_value" => $post['discount_value'][$key],
//                            "discount" => $post['hidden_discount'][$key],
//                            "tax_id" => $post['item_tax'][$key],
//                            "tax_value" => $post['tax_value'][$key],
//                            "tax" => $post['hidden_tax'][$key],
//                            "cost" => $post['price'][$key],
//                            "purchase_id" => $id
//                        );
//                        $this->purchase_model->deletePurchaseItems($id, $value, $quantity);
//                        $this->db->insert('purchase_items',$data);
//                    }
                }
//                echo "<pre>";print_r($post);echo "</pre>";die;
//                die;
                
                redirect('purchase');
            }
        }
    }


    public function view($id){
        $data['data'] = $this->purchase_model->getDetails($id);
        $data['items'] = $this->purchase_model->getItems($id);
        $data['company'] = $this->purchase_model->getCompany();

        // $this->load->view('purchase/view',$data);
        $data['subview'] = $this->load->view('parking/purchase/view', $data, TRUE);
        $this->load->view('_layout_main', $data);
    }

     public function payment($id) {
        $data['data'] = $this->purchase_model->getDetails($id);
        $data['items'] = $this->purchase_model->getItems($id);
        $data['company'] = $this->purchase_model->getCompany();
        $data['ledger'] = $this->purchase_model->getLedger();
        $data['p_reference_no'] = $this->purchase_model->generateReferenceNo();
        $whereP['IsDeleted'] = 0;
        $data['paytype'] = $this->purchase_model->show_list('payment_method',$whereP);
        $data['subview'] = $this->load->view('parking/purchase/payment', $data, TRUE);
        $this->load->view('_layout_main', $data);
      }

       public function addPayment() {
        $id = $this->input->post('id');
        $paying_by = $this->input->post('paying_by');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('paying_by', 'Paying By', 'trim|required');
        if ($paying_by == "Cheque") {
            $this->form_validation->set_rules('bank_name', 'Bank Name', 'trim|required');
            $this->form_validation->set_rules('cheque_no', 'Cheque No', 'trim|required|numeric');
        }
        if ($this->form_validation->run() == false) {
            $this->payment($id);
        } else {
            if ($paying_by == "Cheque") {
                $bank_name = $this->input->post('bank_name');
                $cheque_no = $this->input->post('cheque_no');
               }else {
                $bank_name = "";
                $cheque_no = "";
              }
            $data = array(
                "purchase_id" => $id,
                "payment_voucher_date" => $this->input->post('date'),
                "invoice_no" => $this->input->post('reference_no'),
                "payment_ledger" => $this->input->post('ledger'),
                "payment_amount" => $this->input->post('amount'),
                "mode_of_payment" => $this->input->post('paying_by'),
                "bank_name" => $bank_name,
                "cheque_no" => $cheque_no,
                "description" => $this->input->post('note')
            );

            if ($this->purchase_model->addPayment($data)) {
                $log_data = array(
                    'user_id' => $this->session->userdata('user_id'),
                    'table_id' => $id,
                    'message' => 'Purchase Payable'
                );
                $this->log_model->insert_log($log_data);
                redirect('purchase', 'refresh');
            } else {
                redirect("purchase", 'refresh');
            }
        }
        
    }

    public function report() {
        $_SESSION['type'] = "admin";
        $data['data'] = $this->purchase_model->getPurchaseReport();
        $table_name = "filterservice";
        $data['products'] = $this->purchase_model->show_list($table_name, $where = NULL);
        // echo "<pre>"; print_r($data['data']); exit;
        $data['subview'] = $this->load->view('parking/purchase/report', $data, TRUE);
        $this->load->view('_layout_main', $data);
        }
    


}
