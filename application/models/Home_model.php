<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    public function filter($data){
        $where = array();
        if($data['customer_id'] <> "")
            $where['s.customer_id'] = $data['customer_id'];
        if($data['product_id'] <> "")
            $where['s.product_id']  = $data['product_id'];
        return $this->db->select('c.name as customer_name, c.email as customer_mail, p.price, p.name as product_name')
                        ->from('sales s')
                        ->join('customers c','c.id = s.customer_id','inner')
                        ->join('products p','p.id = s.product_id','inner')
                        ->where($where)->like('p.price', $data['price'], 'both')
                        ->get()
                        ->result_array();
    }

}
