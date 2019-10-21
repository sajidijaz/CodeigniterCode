<?php 

$config = array(
        "json" => array(
            array(
                'field' => 'customer_name',
                'label' => 'Customer Name',
                'rules' => 'required|trim|xss_clean'
            ),
            array(
                'field' => 'product_name',
                'label' => 'Product Name',
                'rules' => 'required|trim|xss_clean'
            ),
            array(
                'field' => 'product_price',
                'label' => 'Product Price',
                'rules' => 'required|trim|decimal'
            ),
            array(
                'field' => 'customer_mail',
                'label' => 'Customer Email',
                'rules' => 'trim|valid_email|required'
            )
        )
);