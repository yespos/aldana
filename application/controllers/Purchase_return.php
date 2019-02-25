<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_return extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('purchase_return_model');
        $this->load->model('purchase_model');
        $this->load->model('log_model');
    }

    public function index() {
        //get purchase return to display list
        $data['data'] = $this->purchase_return_model->getPurchaseReturn();
        // $this->load->view('purchase_return/list',$data);
        $data['subview'] = $this->load->view('parking/purchase_return/list', $data, TRUE);
        $this->load->view('_layout_main', $data);
    }

    /* call add view to add purchase return   */

    public function add() {
        //$data['product'] = $this->purchase_model->getProduct();
        $data['warehouse'] = $this->purchase_return_model->getWarehouse();
        $data['supplier'] = $this->purchase_return_model->getSupplier();
        $data['reference_no'] = $this->purchase_return_model->createReferenceNo();
        //echo '<pre>';print_r($data['warehouse']);
        // $this->load->view('purchase_return/add',$data);
        $data['subview'] = $this->load->view('parking/purchase_return/add', $data, TRUE);
        $this->load->view('_layout_main', $data);
    }

    /* get single product */

    public function getProduct($product_id, $warehouse_id) {
        $data = $this->purchase_return_model->getProduct($product_id, $warehouse_id);
        $data['discount'] = $this->purchase_model->getDiscount();
        $data['tax'] = $this->purchase_model->getTax();
        echo json_encode($data);
        //print_r($data);
    }

    /* get all product warehouse wise */

    public function getProducts($warehouse_id) {
        $data = $this->purchase_return_model->getProducts($warehouse_id);
        echo json_encode($data);
        //print_r($data);
    }

    /* This function is used to search product code / name in database */

    public function getAutoCodeName($code, $search_option, $warehouse) {
        //$code = strtolower($code);
        $p_code = $this->input->post('p_code');
        $p_search_option = $this->input->post('p_search_option');
        $data = $this->purchase_return_model->getProductCodeName($p_code, $p_search_option, $warehouse);
        if ($search_option == "Code") {
            $list = "<ul class='auto-product'>";
            foreach ($data as $val) {
                $list .= "<li value=" . $val->code . ">" . $val->code . "</li>";
            }
            $list .= "</ul>";
        } else {
            $list = "<ul class='auto-product'>";
            foreach ($data as $val) {
                $list .= "<li value=" . $val->product_id . ">" . $val->name . "</li>";
            }
            $list .= "</ul>";
        }

        echo $list;
        //echo json_encode($data);
        //print_r($list);
    }

    /* This function is used to add purchase return in database */

    public function addPurchaseReturn() {
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('reference_no', 'Reference No', 'trim|required');
        //$this->form_validation->set_rules('supplier_id','Supplier ID','trim|required');
        //$this->form_validation->set_rules('warehouse_id','Warehouse ID','trim|required');
        $post = $this->input->post();
//        echo "<pre>";
//        print_r($post);
//        echo "</pre>";
//        die;
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
                "note" => $this->input->post('note'),
                "user" => $this->session->userdata('id')
            );
            $this->db->insert('purchase_return',$data);
            if ($id = $this->db->insert_id()) {
                $purchase_item_data = $this->input->post('table_data');
                $log_data = array(
                    'user_id' => $this->session->userdata('id'),
                    'table_id' => $id,
                    'message' => 'Purchase Return Inserted'
                );
                $this->log_model->insert_log($log_data);
                $js_data = json_decode($purchase_item_data);
                foreach ($js_data as $key => $value) {
                    if ($value == null) {
                        
                    } else {
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
                            "purchase_return_id" => $id
                        );
                        $warehouse_data = array(
                            "product_id" => $value->product_id,
                            "warehouse_id" => $warehouse_id,
                            "quantity" => $value->quantity
                        );
                        $this->purchase_return_model->addProductInWarehouse($product_id, $quantity, $warehouse_id, $warehouse_data);
                        if ($this->purchase_return_model->addPurchaseItem($data)) {
                            
                        } else {
                            
                        }
                    }
                }
                redirect('purchase_return', 'refresh');
            } else {
                
            }
        }
    }

    /* This function is used to call view  edit purchase return */

    public function edit($id) {
        $data['warehouse'] = $this->purchase_return_model->getWarehouse();
        $data['supplier'] = $this->purchase_return_model->getSupplier();
        $data['data'] = $this->purchase_return_model->getRecord($id);
        $data['product'] = $this->purchase_return_model->getProducts($data['data'][0]->warehouse_id);
        $data['discount'] = $this->purchase_model->getDiscount();
        $data['tax'] = $this->purchase_model->getTax();
        $data['items'] = $this->purchase_return_model->getPurchaseReturnItems($data['data'][0]->id, $data['data'][0]->warehouse_id);

        // $this->load->view('purchase_return/edit',$data);
        $data['subview'] = $this->load->view('parking/purchase_return/edit', $data, TRUE);
        $this->load->view('_layout_main', $data);
    }

    /* This function is used to delete discount record in databse */

    public function delete($id) {
        if ($this->purchase_return_model->deleteModel($id)) {
            $log_data = array(
                'user_id' => $this->session->userdata('user_id'),
                'table_id' => $id,
                'message' => 'Purchase Return Deleted'
            );
            $this->log_model->insert_log($log_data);
            redirect('purchase_return', 'return');
        } else {
            redirect('purchase_return', 'return');
        }
    }

    /* This function is to edit purchase return record in database */

    public function editPurchaseReturn() {
        $id = $this->input->post('purchase_return_id');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('reference_no', 'Reference No', 'trim|required');
        //$this->form_validation->set_rules('supplier_id','Supplier ID','trim|required');
        //$this->form_validation->set_rules('warehouse_id','Warehouse ID','trim|required');
        $post = $this->input->post();
        //echo "<pre>";print_r($post);echo "</pre>";die;
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
                "user" => $this->session->userdata('id')
            );

            //$id = $this->input->post('purchase_return_id');
            $js_data = json_decode($this->input->post('table_data1'));
            $php_data = json_decode($this->input->post('table_data'));
            $this->db->where('id',$id);
            if ($this->db->update('purchase_return',$data)) {
                $log_data = array(
                    'user_id' => $this->session->userdata('user_id'),
                    'table_id' => $id,
                    'message' => 'Purchase Return Updated'
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
                        "purchase_return_id" => $id
                    );
                    $warehouse_data = array(
                        "product_id" => $post['product_id'][$key],
                        "warehouse_id" => $warehouse_id,
                        "quantity" => $post['qty'][$key]
                    );
                    if($this->purchase_return_model->addUpdatePurchaseItem($id,$product_id,$warehouse_id,$quantity,$data,$warehouse_data)){
                        //echo " 1 Asuccess add";
                    }
                    else{

                    }
                }
                redirect('purchase_return');
            }
            /* echo "<pre>";
              print_r($js_data);
              print_r($php_data); */
        }
    }

}

?>