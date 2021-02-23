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
        <?php include('header.php'); ?>
    </head>
    <body>
        <div class="container-fluid" style="max-width: 80%;">
            <p class="h3" style="margin-top:50px;">New Order details</p>

            <table class="table table-hover">
                <thead>
                    <tr class="table-active">
                        <th class="table-active">S no.</th>
                        <th class="table-active">Order ID</th>
                        <th class="table-active">User Name</th> 
                        <th class="table-active">Product ID</th>
                        <th class="table-active">No of Product</th>
                        <th class="table-active">Total Amount</th>
                        <th class="table-active">Order Date</th>
                        <th class="table-active">Order Status</th>
                    </tr>
                </thead>



                <?php

                function get_order_id() {
                                     
                    include 'db.php';
                  
                    $mysql_get_order_id = "select DISTINCT(order_id) FROM order_product";
                    $result_get_order_id = mysqli_query($conn, $mysql_get_order_id);
                    if (mysqli_num_rows($result_get_order_id) > 0) {
                      
                        while ($row_get_order_id = mysqli_fetch_assoc($result_get_order_id)) {
                          
                            $order_iD = $row_get_order_id['order_id'];
                            $mysql_get_user_id = "select * From order_detail where o_id='$order_iD'";
                            $result_get_user_id = mysqli_query($conn, $mysql_get_user_id);
                            if (mysqli_num_rows($result_get_user_id) > 0) {
                                while ($row_get_user_id = mysqli_fetch_assoc($result_get_user_id)) {
                                    $user_iD = $row_get_user_id['u_id'];
                                    $order_date = $row_get_user_id['o_date'];
                                    $mysql_get_user_name = "select * From user where u_id='$user_iD'";
                                    $result_get_user_name = mysqli_query($conn, $mysql_get_user_name);
                                    if (mysqli_num_rows($result_get_user_name) > 0) {
                                         
                                        while ($row_get_user_name = mysqli_fetch_assoc($result_get_user_name)) {
                                           
                                            $user_NAME = $row_get_user_name['u_name'];
//                                            COUNT(*),SUM(product_price)
                                            $mysql_get_order_detail = "select * FROM order_product WHERE order_id='$order_iD'";
                                            $result_get_order_detail = mysqli_query($conn, $mysql_get_order_detail);
                                            if (mysqli_num_rows($result_get_order_detail) > 0) {
                                                 
                                              while ($row_get_order_detail = mysqli_fetch_assoc($result_get_order_detail)) {
                                                    $order_DETAIL_product = $row_get_order_detail['quantity'];
                                                    $order_DETAIL_price = $row_get_order_detail['product_price'];
                                                    $order_DETAIL_product_ID = $row_get_order_detail['product_id'];
                                                    
                                                    $s_no = $row_get_order_detail['s_no'];
                                                
                                                    ?>

                                                    <tbody><tr>
                                                           
                                                            <td><?php // echo  $i; ?></td>
                                                            <td><?php echo $order_iD; ?></td>
                                                            <td><?php echo $user_NAME; ?></td>
                                                            <td><?php echo $order_DETAIL_product_ID; ?></td>
                                                            <td><?php echo $order_DETAIL_product; ?></td>
                                                            <td><?php echo $order_DETAIL_price; ?></td>
                                                            <td><?php echo $order_date; ?></td>
                                                    <form name="order_deatil" action="order_status.php?s_no=<?php echo $s_no; ?>" method="POST">
                                                        <input type="hidden" name="u_id" value="<?php echo $user_iD; ?>">
                                                        <input type="hidden" name="order_status" value="1">
                                                       

                                                        <td>
                                                             <?php 
                                                         $mysql_check_order_status="SELECT * FROM order_product where order_status=false AND order_id='$order_iD' AND product_id='$order_DETAIL_product_ID'";
                                                       
                                                         $result_check_order_status= mysqli_query($conn, $mysql_check_order_status);
                                                         $row_check = mysqli_num_rows($result_check_order_status);
                                                         if($row_check==0){
//                                                      ?>
                                                                 <a href="order_status.php"><button type="submit" class="btn btn-success" name="category_detail">Order Delivered</button></a></td>
                                             
                                                              <?php }
                                                         else{
                                                            ?>
                                                                <a href="#"><button type="button" class="btn btn-primary" name="category_detail">On Process</button></a>
                                                        
                                                            <a href="order_status.php"><button type="submit" class="btn btn-outline-success" name="category_detail">Order Delivered</button></a></td>
                                                      
                                                                <?php 
                                                         }?></td></form>
                                                    </tr></tbody>
                                                    <?php
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

                get_order_id();
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
                    ?>
                </tbody>
            </table>
            <a href="category_form.php"><button type="button" class="btn btn-primary" name="category_detail">Back to Home</button></a>
        </div>
    </body>
</html>
