<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_return_model extends CI_Model {

    public function index() {
        
    }

    /*
      return all purchase return details to display list
     */

    public function getPurchaseReturn() {
        $dbs = $this->load->database('default', TRUE);
        $dbs->select('purchase_return.*,suppliers.*')
                ->from('purchase_return')
                ->join('suppliers', 'purchase_return.supplier_id = suppliers.supplier_id');
        $data = $dbs->get();
        log_message('debug', print_r($data, true));
        return $data->result();
    }

    /*
      return warehouse detail use drop down
     */

    public function getWarehouse() {
        $dbs = $this->load->database('default', TRUE);
        return $dbs->where('IsDelete', 0)->get('warehouse')->result();
//		}
//		else{
//			$dbs->select('w.*')
//					 ->from('warehouse w')
//					 ->join('warehouse_management wm','wm.warehouse_id = w.warehouse_id')
//					 ->where('wm.user_id',$this->session->userdata('user_id'));
//			return $dbs->get()->result();
//		}
    }

    /*
      return supplier detail use drop down
     */

    public function getSupplier() {

        $dbs = $this->load->database('default', TRUE);
        return $dbs->get('suppliers')->result();
    }

    /*
      return last purchase id
     */

    public function createReferenceNo() {
        $dbs = $this->load->database('default', TRUE);
        $query = $dbs->query("SELECT * FROM purchase_return ORDER BY id DESC LIMIT 1");
        $result = $query->result();
        return $result;
    }

    /*
      return supplier name whose id get
     */

    public function getSupplierName($id) {
        $dbs = $this->load->database('default', TRUE);
        $sql = "select supplier_name from suppliers where supplier_id = ?";
        return $dbs->query($sql, array($id))->result();
    }

    /* add new purchase return record in database */

    public function addModel($data) {
        $dbs = $this->load->database('default', TRUE);
        $sql = "insert into purchase_return (date,reference_no,supplier_id,warehouse_id,total,discount_value,tax_value,note,user) values(?,?,?,?,?,?,?,?,?)";
        if ($dbs->query($sql, $data)) {
            return $dbs->insert_id();
        } else {
            return FALSE;
        }
    }

    /*
      update quantity in product table
     */

    public function updateProductQuantity($product_id, $quantity) {
        $dbs = $this->load->database('default', TRUE);
        $sql = "select * from filterservice where id = ?";
        $product_data = $dbs->query($sql, array($product_id));

        if ($product_data->num_rows() > 0) {
            $p_data = $product_data->result();
            foreach ($p_data as $pvalue) {
                $pquantity = $pvalue->quantity - $quantity;
                $sql = "update filterservice set quantity = ? where id = ?";
                $dbs->query($sql, array($pquantity, $product_id));
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
                $wquantity = $value->quantity - $quantity;
                $sql = "update warehouses_products set quantity = ? where product_id = ? AND warehouse_id = ?";
                $dbs->query($sql, array($wquantity, $product_id, $warehouse_id));
                $this->updateProductQuantity($product_id, $quantity);
            }
        }
    }

    /*
      add newly purchse items record in database
     */

    public function addPurchaseItem($data) {
        $dbs = $this->load->database('default', TRUE);
        if ($dbs->insert('purchase_return_items', $data)) {
            return true;
        } else {
            return false;
        }
    }

    /*
      add or update purchase items in database
     */

    public function addUpdatePurchaseItem($id, $product_id, $warehouse_id, $quantity, $data, $warehouse_data) {
        $dbs = $this->load->database('default', TRUE);
        $sql = "select * from purchase_return_items where purchase_return_id = ? AND product_id = ?";
        $result = $dbs->query($sql, array($id, $product_id));
        $where = "purchase_return_id = $id AND product_id = $product_id";

        if ($result->num_rows() > 0) {

            $purchase_quantity = $result->row()->quantity;
            $dbs->where($where);
            $dbs->update('purchase_return_items', $data);

            $sql = "select * from warehouses_products where warehouse_id = ? AND product_id = ?";
            $warehouse_quantity = $dbs->query($sql, array($warehouse_id, $product_id))->row()->quantity;

            $new_quantity = $warehouse_quantity - $quantity + $purchase_quantity;
            $sql = "update warehouses_products set quantity = ? where warehouse_id = ? AND product_id = ?";
            $dbs->query($sql, array($new_quantity, $warehouse_id, $product_id));

            $sql = "select * from filterservice where id = ?";
            $product_quantity = $dbs->query($sql, array($product_id))->row()->quantity;

            $new_quantity = $product_quantity - $quantity + $purchase_quantity;
            $sql = "update filterservice set quantity = ? where id = ?";
            $dbs->query($sql, array($new_quantity, $product_id));
        } else {
            $this->addProductInWarehouse($product_id, $quantity, $warehouse_id, $warehouse_data);
            $this->addPurchaseItem($data);
        }
    }

    /*
      return  single product to add dynamic table
     */

    public function getProduct($product_id, $warehouse_id) {
        $dbs = $this->load->database('default', TRUE);
        return $dbs->select('p.*,wp.quantity,wp.warehouse_id')
                        ->from('filterservice p')
                        ->join('warehouses_products wp', 'p.id = wp.product_id')
                        ->where('wp.warehouse_id', $warehouse_id)
                        ->where('wp.product_id', $product_id)
                        ->get()
                        ->result();
    }

    /* return  product list to add product dropdown */

    public function getProducts($warehouse_id) {
        $dbs = $this->load->database('default', TRUE);
        return $dbs->select('p.*, st.name as servicetype')
                        ->from('filterservice p')
                        ->join('warehouses_products wp', 'p.id = wp.product_id')
                        ->join('servicetype st', 'p.type = st.id')
                        ->where('wp.warehouse_id', $warehouse_id)
                        ->where('wp.quantity > 0')
                        ->get()
                        ->result();
    }

    /*
      return purchase return record to edit
     */

    public function getRecord($id) {
        $dbs = $this->load->database('default', TRUE);
        $sql = "select * from purchase_return where id = ?";
        if ($query = $dbs->query($sql, array($id))) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    /*
      return purchase return items to purchase
     */

    public function getPurchaseReturnItems($id, $warehouse_id) {
        $dbs = $this->load->database('default', TRUE);
        $dbs->select('pi.*,wp.quantity as warehouses_quantity,pr.id,pr.item,pr.price')
                ->from('purchase_return_items pi')
                ->join('filterservice pr', 'pi.product_id = pr.id')
                ->join('warehouses_products wp', 'wp.product_id = pr.id')
                ->where('pi.purchase_return_id', $id)
                ->where('wp.warehouse_id', $warehouse_id);
        if ($query = $dbs->get()) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    /*
      save edited record in database
     */

    public function editModel($id, $data) {
        $dbs = $this->load->database('default', TRUE);
        $data['id'] = $id;


        $sql = "update purchase_return set date = ?,reference_no = ?,supplier_id = ?,warehouse_id = ?,total = ?,discount_value = ?,tax_value = ?,note = ?,user = ? where id = ?";
        if ($dbs->query($sql, $data)) {
            return true;
        } else {
            return false;
        }
    }

    /*
      delete purchase return record in database
     */

    public function deleteModel($id) {
        $dbs = $this->load->database('default', TRUE);
        $sql = "delete from purchase_return where id = ?";
        if ($dbs->query($sql, array($id))) {
            $sql = "delete from purchase_return_items where purchase_return_id = ?";
            if ($dbs->query($sql, array($id))) {
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }

    /*
      delete old purchase return item when edit purchse
     */

    public function deletePurchaseReturnItems($id, $product_id, $warehouse_id) {
        $dbs = $this->load->database('default', TRUE);

        $where = "purchase_return_id = $id AND product_id = $product_id";
        $dbs->where($where);
        $delete_quantity = $dbs->get('purchase_return_items')->row()->quantity;

        $where = "warehouse_id = $warehouse_id AND product_id = $product_id";
        $dbs->where($where);
        $warehouse_quantity = $dbs->get('warehouses_products')->row()->quantity;
        $wquantity = $warehouse_quantity + $delete_quantity;

        $dbs->where($where);
        $dbs->update('warehouses_products', array("quantity" => $wquantity));

        $dbs->where('product_id', $product_id);
        $product_quantity = $dbs->get('products')->row()->quantity;
        $pquantity = $product_quantity + $delete_quantity;

        $dbs->where('product_id', $product_id);
        $dbs->update('products', array("quantity" => $pquantity));


        $where = "purchase_return_id = $id AND product_id = $product_id";
        $dbs->where($where);
        if ($dbs->delete('purchase_return_items')) {
            return true;
        } else {
            return false;
        }
    }

    /*
      return discount value
     */

    public function getDiscountValue($id) {
        $dbs = $this->load->database('default', TRUE);
        return $dbs->get_where('discount', array('discount_id' => $id))->result();
    }

    /*
      return discount value
     */

    public function getTaxValue($id) {
        $dbs = $this->load->database('default', TRUE);
        return $dbs->get_where('tax', array('tax_id' => $id))->result();
    }

}

?>