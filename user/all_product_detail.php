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
        include("header.php");
        ?>
    </head>
    <body>
        <?php

        function product_detail() {
            include("db.php");
            if (isset($_GET['p_id'])) {
                $p_id = $_GET['p_id'];
                $mysql = "select * from product where p_id='$p_id'";
                $result = mysqli_query($conn, $mysql);
                $no_row = mysqli_num_rows($result);
                $row = mysqli_fetch_assoc($result);
                ?>
                <div class="card" style="width: 28rem;margin: 100px 0px 0px 40%;">
                    <img src="/eshop/admin/imagefile/<?php echo $row['p_image']; ?>" width="400px;"height="350px;" alt="product image">

                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['p_name']; ?></h5>
                        <p class="card-text">₹ <?php echo $row['p_price']; ?></p>
                        <a href="all_product.php" class="btn btn-primary">Back</a>
                        
                         <?php
                                    $product_stock = $row['p_stock'];
                                    $mysql_for_order_product = "select COUNT(product_id) FROM order_product where product_id='$p_id'";
                                    $result_for_order_product = mysqli_query($conn, $mysql_for_order_product);
                                    $row__for_order_product = mysqli_fetch_assoc($result_for_order_product);
                                    $total_order_product = $row__for_order_product['COUNT(product_id)'];

                                    $mysql_for_cart_product = "select COUNT(p_id) FROM cart where p_id='$p_id'";
                                    $result_for_cart_product = mysqli_query($conn, $mysql_for_cart_product);
                                    $row_for_cart_product = mysqli_fetch_assoc($result_for_cart_product);
                                    $total_cart_product = $row_for_cart_product['COUNT(p_id)'];

                                    $total_of_cart_and_order_product = $total_order_product + $total_cart_product;
                                    if ($product_stock > $total_of_cart_and_order_product) {
                                        ?>
                        
                        <a href="addtocart_d_submit.php?p_id=<?php echo $row['p_id'] ?>"><button type="button" class="btn btn-primary" style="float: right;">Add to cart</button></a>
                    <?php } else {
                                        ?>
                                        <a href="#?p_id=<?php echo $row['p_id'] ?>"><button type="button" class="btn btn-danger" style="float: right;">out of stock</button></a></td>   
                                    <?php }
                                    ?>
                    </div>
                </div>
        <?php
    }
}

product_detail();
?>
    </body>
</html>
