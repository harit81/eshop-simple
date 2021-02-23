<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <?php
        include("header.php");
        ini_set("display_errors", 0);
        if (isset($_SESSION['u_name'])) {
            $product_stock;
            $total_of_cart_and_order_product;
            $product_data;
            ?>
            <title></title>
        </head>
        <body>
            <div class="container-fluid" style="max-width: 90%;">
                <p class="h1" style="margin-top: 50px;">Shopping Cart</h3>
                <table class="table  table-hover" style="margin-top: 50px;">
                    <thead class="table-dark ">
                        <tr class="table-active">
                            <th class="table-active">s_no</th>
                            <th class="table-active">product image</th>
                            <th class="table-active">product name</th>
                            <th class="table-active">product price</th>
                            <th>quantity</th>
                            <th>total price</th>
                            <th class="table-active">delete</th>
                            <th class="table-active">Product Status</th>
                        </tr>
                    </thead>
                    <?php

                    function user_name() {
                        include('db.php');
                        $uname = $_SESSION['u_name'];
                        $mysql = "select * from user where u_name='$uname'";
                        $no_row = mysqli_query($conn, $mysql);
                        $result = mysqli_num_rows($no_row);
                        $row_f = mysqli_fetch_assoc($no_row);
                        $u_id = $row_f['u_id'];

                        $mysql_select = "select * from cart where u_id='$u_id'";
                        $result_select = mysqli_query($conn, $mysql_select);
                        if (mysqli_num_rows($result_select) > 0) {
                            $i = 0;
                            while ($row_cart = mysqli_fetch_assoc($result_select)) {
                                $i++;
                                $product_id = $row_cart['p_id'];

                                $mysql_product_name = "select * from product where p_id='$product_id'";
                                $result_product_name = mysqli_query($conn, $mysql_product_name);
                                if (mysqli_num_rows($result_product_name) > 0) {

                                    while ($row_peoduct_name = mysqli_fetch_assoc($result_product_name)) {
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><img src="/eshop/admin/imagefile/<?php echo $row_peoduct_name['p_image']; ?>" width="100px;"height="100px;" alt="product image"></td>
                                                <td><?php echo $row_peoduct_name['p_name']; ?></td>
                                                <td><?php echo '<b>Rs </b>', $row_peoduct_name['p_price']; ?></td>
                                                <td>1</td>
                                                <td><?php echo '<b>Rs </b>', $row_peoduct_name['p_price']; ?></td>
                                                <td><a href="cart_view.php?remove_id=<?php echo $row_peoduct_name['p_id']; ?>">remove</a></td>
                                                <td><?php
                                                
                                               
                                                    $GLOBALS['product_stock'] = $row_peoduct_name['p_stock'];
                                                    $mysql_select_order_product = "select COUNT(*) from order_product where product_id='$product_id'";
                                                    $result_order_product = mysqli_query($conn, $mysql_select_order_product);
                                                    $num_of_row_order_product = mysqli_num_rows($result_order_product);
                                                    $row_order_product = mysqli_fetch_assoc($result_order_product);
                                                    $order_product = $row_order_product['COUNT(*)'];

                                                    $mysql_select_cart_product = "select COUNT(*),SUM(quantity) from cart where u_id='$u_id' AND p_id='$product_id'";
                                                    $result_cart_product = mysqli_query($conn, $mysql_select_cart_product);

                                                    $num_of_row_cart_product = mysqli_num_rows($result_cart_product);
                                                    $cart_quantity_total = mysqli_fetch_assoc($result_cart_product);
                                                    $cart_same_product_total = $cart_quantity_total['SUM(quantity)'];

                                                    $GLOBALS['total_of_cart_and_order_product'] = $order_product + 0; //$num_of_row_cart_product;
                                                    if ($GLOBALS['product_stock'] > $GLOBALS['total_of_cart_and_order_product']) {
                                                       
                                                        ?>
                                                        <button type="button" class="btn btn-success">available</button>
                                                    <?php } else {
                                                             echo 'remove out of stock item first';
                                                        ?>
                                                        <button type="button" class="btn btn-danger">out of stock</button>  
                                                    <?php }
                                                    ?></td>
                                            </tr>


                                        </tbody>


                                        <?php
                                    }
                                }
                            }
                        }
                    }

                    user_name();

                    function mydelete() {
                        include("db.php");
                        if (isset($_GET['remove_id'])) {
                            $delete_id = $_GET['remove_id'];
//                        $mysql_query = "delete from cart where p_id='$delete_id'";
                            $mysql_query = "DELETE FROM cart WHERE p_id = '$delete_id' ORDER BY cart_id DESC LIMIT 1";
                            if (mysqli_query($conn, $mysql_query)) {
                                echo 'deleted';
                                header("Location: cart_view.php");
                            }
                        }
                    }

                    mydelete();
                    ?>
                </table>
                <table class="table  table-hover" style="margin-top: 0px; max-width: 100%;float:left;">
                    <thead class="table-dark ">

                    </thead>
                    <tbody>
                        <?php
                        $username = $_SESSION['u_name'];
                        $mysql_total_amount = "select COUNT(*),SUM(p_price)
FROM 
cart INNER JOIN product ON cart.p_id=product.p_id
INNER JOIN user ON cart.u_id=user.u_id WHERE u_name='$username'";
                        $mysql_result = mysqli_query($conn, $mysql_total_amount);
                        if (mysqli_num_rows($mysql_result) > 0) {
                            $total = 0;
                            while ($row_total = mysqli_fetch_assoc($mysql_result)) {
                                ?>
                                <tr>

                                    <td style="float: left;"><b>No of Product : <?php echo $row_total['COUNT(*)']; ?></b></td>
                                    <td style="float: right;"><b>Total Amount : Rs <?php echo $row_total['SUM(p_price)']; ?></b></td>
                                </tr>

                                <?php
                            }
                        }
                    } else {
                        header("Location: ulogin.php");
                    }
                    ?>
                </tbody>
            </table>

            <a href="all_product.php"><button type="button" class="btn btn-primary" style="float:left;position: relative;">Continue Shopping</button> </a>   
            <?php
            if ($GLOBALS['product_stock'] > $GLOBALS['total_of_cart_and_order_product']) {
               $GLOBALS['product_data']=1;
               
                ?>
                        <?php
      ?>
                <a href="checkout.php"><button type="button" class="btn btn-primary" style="float: right;">Checkout</button> </a>  
                <?php 
            } else {
                echo 'remove out of stock item first';
                ?>
                <a href="checkout.php"><button type="button" class="btn btn-primary" disabled="" style="float: right;">Checkout</button> </a>
            <?php }
            ?>

        </div>       
    </body>
</html>
