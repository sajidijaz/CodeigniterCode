<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Customer Name</th>
            <th>Customer Email</th>
            <th>Product Name</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if(!empty($result)):
                $total = 0;
                foreach($result as $key => $value):
                    $total += $value['price'];
        ?>
            <tr>
                <td><?php echo $value['customer_name']; ?></td>
                <td><?php echo $value['customer_mail']; ?></td>
                <td><?php echo $value['product_name']; ?></td>
                <td><?php echo $value['price']; ?></td>
            </tr>
        <?php endforeach;
            $this->load->view('partial/total_row',array('total'=>$total));
            else:
        ?>
            <tr>
                <td colspan="4">No Record Found</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>