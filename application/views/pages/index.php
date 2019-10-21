<?php
echo form_open('', array('class' => 'padding-top', 'id' => 'filterForm'));

    echo form_fieldset('Filter');
        echo("<div class='row'>");
            echo("<div class='col-sm-3'>");
                echo form_label('Customer', '', array());
                echo form_input(array(
                    'name'          => 'customer',
                    'id'            => 'customer',
                    'value'         => '',
                    'class'         => 'form-control'
                ));
            echo("</div >");

            echo("<div class='col-sm-3'>");
                echo form_label('Products', '', array());
                echo form_input(array(
                    'name'          => 'product',
                    'id'            => 'product',
                    'value'         => '',
                    'class'         => 'form-control'
                ));
            echo("</div >");

            echo("<div class='col-sm-3'>");
                echo form_label('Price', '', array());
                echo form_input(array(
                    'name'          => 'price',
                    'id'            => 'price',
                    'value'         => '',
                    'class'         => 'form-control'
                ));
            echo("</div >");

            echo form_hidden(array( 'product_id' => '', 'customer_id'=> ''));

            echo("<div class='col-sm-3 pt-4'>");
                echo form_submit(array(
                    'name'          => 'product',
                    'id'            => 'product',
                    'value'         => 'Search',
                    'class'         => 'btn btn-primary btn-sm mt-2'
                ));
            echo("</div >");
            echo("<div id='filter-error' class='ml-3 text-danger'></div>");
        echo("</div>");

    echo form_fieldset_close();

echo form_close();
?>

<div id="filter-data" class="text-center mt-4">

</div>
