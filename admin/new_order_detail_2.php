<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php
        include('header.php');
        if (isset($_SESSION['a_name'])) {
            ?>
        </head>
        <body>
            <div class="container-fluid" style="max-width: 80%;">
                <p class="h3" style="margin-top:50px;">New Order details</p>

                <table class="table table-hover">
                    <thead>
                        <tr class="table-active">
                            <th class="table-active">S no.</th>
                            <th class="table-active">Order ID</th>
                            <th class="table-active">User ID</th> 
                            <th class="table-active">Product ID</th>
                            <th class="table-active">No of Product</th>
                            <th class="table-active">Total Amount</th>
                            <th class="table-active">Order Date</th>
                            <th class="table-active">Order Status</th>
                        </tr>
                    </thead>



                    <?php
                    include 'db.php';
                    $mysql_get_order_id = "select DISTINCT(order_id),order_status FROM order_product ORDER BY order_status ASC";
                    $result_get_order_id = mysqli_query($conn, $mysql_get_order_id);
                    if (mysqli_num_rows($result_get_order_id) > 0) {

                        while ($row_get_order_id = mysqli_fetch_assoc($result_get_order_id)) {

                            $order_iD = $row_get_order_id['order_id'];
                            $mysql_get = "select user.u_id,order_detail.o_id,order_detail.o_date,order_product.order_id,SUM(order_product.product_price),
                        SUM(order_product.quantity),order_product.product_id From order_product INNER JOIN order_detail ON order_product.order_id=order_detail.o_id
INNER JOIN user ON order_detail.u_id=user.u_id where order_product.order_id='$order_iD'";
                            $result_get = mysqli_query($conn, $mysql_get);
                            if (mysqli_num_rows($result_get) > 0) {

                                while ($row_get = mysqli_fetch_assoc($result_get)) {
//                                    echo $row_get['u_id'];
//                                     echo $row_get['product_id'];
                                    $product_id_ID = $row_get['product_id'];
//                          echo $row_get_order_id['order_id'];
                                    ?>
<?php 

?>
                                    <tbody><tr>

                                            <td><?php // echo  $i;  ?></td>
                                            <td><?php echo $row_get['o_id']; ?></td>
                                            <td><?php  echo $row_get['u_id'];   ?></td>
                                            <td><?php // echo $order_DETAIL_product_ID;   ?></td>
                                            <td><?php echo $row_get['SUM(order_product.quantity)']; ?></td>
                                            <td><?php echo $row_get['SUM(order_product.product_price)']; ?></td>
                                            <td><?php echo $row_get['o_date']; ?></td>
                                    <form name="order_deatil" action="order_status.php?s_no=<?php echo $row_get['o_id']; ?>" method="POST">
                                        <input type="hidden" name="u_id" value="<?php echo $row_get['u_id']; ?>">
                                        <input type="hidden" name="order_status" value="1">


                                        <td>
                                            <?php
                                            $mysql_check_order_status = "SELECT * FROM order_product where order_status=false AND order_id='$order_iD' AND product_id='$product_id_ID'";

                                            $result_check_order_status = mysqli_query($conn, $mysql_check_order_status);
                                            $row_check = mysqli_num_rows($result_check_order_status);
                                            if ($row_check == 0) {
//                                                      
                                                ?>
                                                <a href="order_status.php"><button type="submit" class="btn btn-success" name="category_detail">Order Delivered</button></a></td>

                                            <?php
                                        } else {
                                            ?>
                                            <a href="#"><button type="button" class="btn btn-primary" name="category_detail">On Process</button></a>

                                            <a href="order_status.php"><button type="submit" class="btn btn-outline-success" name="category_detail">Order Delivered</button></a></td>

                                        <?php }
                                        ?></td></form>
                                    </tr></tbody>
                                    <?php
                                }
                            }
                        }
                    }
                    ?>

                </table>
                <table class="table  table-hover" style="margin-top: 0px; max-width: 100%;float:left;">
                    <thead class="table-dark ">

                    </thead>
                    <tbody>
                        <?php
                        $mysql_total_amount = "select COUNT(*),SUM(quantity),SUM(product_price)FROM order_product";
                        $mysql_result = mysqli_query($conn, $mysql_total_amount);
                        if (mysqli_num_rows($mysql_result) > 0) {
                            $total = 0;
                            while ($row_total = mysqli_fetch_assoc($mysql_result)) {
                                ?>
                                <tr>


                                    <td style="float: left;"><b>No of Product : <?php echo $row_total['SUM(quantity)']; ?></b></td>
                                    <td style="float: right;"><b>Total Amount : Rs <?php echo $row_total['SUM(product_price)']; ?></b></td>
                                </tr>

                                <?php
                            }
                        }
                    } else {
                        header("Location: login.php");
                    }
                    ?>
                </tbody>
            </table>
            <a href="category_form.php"><button type="button" class="btn btn-primary" name="category_detail">Back to Home</button></a>
        </div>
    </body>
</html>
