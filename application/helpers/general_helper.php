<?php
/**
 * Created by PhpStorm.
 * User: sajid
 * Date: 10/20/2019
 * Time: 10:28 PM
 */


if ( !function_exists('save_customer')) {
    function save_customer($value){
        $CI =& get_instance();
        $CI->load->model('Customers','customers');
        /* Customers Insertion / Updation */
        $customers = array(
            'name'  => $value['customer_name'],
            'email' => $value['customer_mail']
        );
        $is_exists = $CI->customers->exists(array('email' => $value['customer_mail']));
        if($is_exists){
            $customer_id = $is_exists['id'];
            $CI->customers->update($customers,$is_exists['id']);
        }else{
            $customer_id = $CI->customers->save($customers);
        }
        return $customer_id;
    }
}
if ( !function_exists('save_product')) {
    function save_product($value){
        $CI =& get_instance();
        $CI->load->model('Products','products');
        /* Products Insertion / Updation */
        $product_name = "";
        if(isset($value['product_name'])){
            $product_name = $value['product_name'];
        }elseif(isset($value['name'])){
            $product_name = $value['name'];
        }
        $products = array(
            'name'   => $product_name,
            'price'  => $value['product_price']
        );
        $exists = $CI->products->exists(array( 'name'  => $product_name ));
        if($exists){
            $product_id = $exists['id'];
            $CI->products->update($products,$exists['id']);
        }else{
            $product_id = $CI->products->save($products);
        }
        return $product_id;
    }
}