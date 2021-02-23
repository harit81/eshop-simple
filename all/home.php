<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include ('header.php'); ?>
    </head>
    <body>

        <div class="container">
            <p class="h3" style="margin-top:20px;"></p>
            <table class="table table-hover" style="width: 10%;">
                <thead>
                    <tr class="table-active">
                        <th class="table-active">category</th>
                          </tr>
                </thead>
                <?php

                    include("db.php");
                    $select_query="select DISTINCT p_category from product";
                    $select_result = mysqli_query($conn, $select_query);
                    if (mysqli_num_rows($select_result) > 0) {
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($select_result)) {
                            $i++;
                            ?>
                            <tbody>
                                <tr>
                                  
                                    <td colspan="1" class="table-active"><a href="home.php?c_id=<?php echo $row['p_category'] ?>"><?php echo $row['p_category']; ?></a></td>
                                    </tr>
                    <?php }}?>              
                </tbody>
            </table>
            <table class="table table-hover" style="width: 80%;margin-left: 20%;margin-top:-200px;">
                <thead>
                    <tr class="table-active">
                        <th class="table-active">s_no.</th>
                        <th class="table-active">product image</th>
                        <th class="table-active">product name</th>
                        <th class="table-active">product price</th>
                        <th class="table-active">category</th>
                         <th class="table-active">view product</th>
                        <th class="table-active">add to cart</th>
                      

                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php 
                           if (isset($_GET['c_id'])) {
                              $c_id = $_GET['c_id'];
                        
                            $mysql_query = "select * from product where p_category='$c_id'";
                            $mysql_result = mysqli_query($conn, $mysql_query);
                            if (mysqli_num_rows($mysql_result) > 0) {
                                $i=0;
                                while ($row5 = mysqli_fetch_assoc($mysql_result)) {
                                    $i++;
                                
                                    ?>
                        <td><?php $i;?></td>
                       <td><img src="/eshop/admin/imagefile/<?php echo $row5['p_image']; ?>" width="100px;"height="100px;" alt="product image"></td>
                        <td><?php echo $row5['p_name']?></td>
                        <td><?php echo $row5['p_price']?></td>
                        <td><?php echo $row5['p_category']?></td>
                          <td><a href="/eshop/user/all_product_detail.php?p_id=<?php echo $row5['p_id'] ?>"><button type="button" class="btn btn-info">view product</button></a></td>
                                
                      <?php
                      $product_id=$row5['p_id'];
                                    $product_stock = $row5['p_stock'];
                                    $mysql_for_order_product = "select COUNT(product_id) FROM order_product where product_id='$product_id'";
                                    $result_for_order_product = mysqli_query($conn, $mysql_for_order_product);
                                    $row__for_order_product = mysqli_fetch_assoc($result_for_order_product);
                                    $total_order_product = $row__for_order_product['COUNT(product_id)'];

//                                    $mysql_for_cart_product = "select COUNT(p_id) FROM cart where p_id='$product_id'";
//                                    $result_for_cart_product = mysqli_query($conn, $mysql_for_cart_product);
//                                    $row_for_cart_product = mysqli_fetch_assoc($result_for_cart_product);
//                                    $total_cart_product = $row_for_cart_product['COUNT(p_id)'];

                                    $total_of_cart_and_order_product = $total_order_product ; //$total_cart_product;
                                    if ($product_stock > $total_of_cart_and_order_product) {
                                        ?>
                                        <td><a href="/eshop/user/addtocart_d_submit.php?p_id=<?php echo $row5['p_id'] ?>"><button type="button" class="btn btn-primary">add to cart</button></a></td>
                                        <?php } else {
                                        ?>
                                        <td><a href="#?p_id=<?php echo $row5['p_id'] ?>"><button type="button" class="btn btn-danger">out of stock</button></a></td>   
                                    <?php }
                                    ?>

                          </tr> <?php }}}?> 
                </tbody>
            </table>
<!--             <p class="h3" style="margin-top:20px;margin-left: 20%;">All Product</p>
            <table class="table" style="width: 80%;margin-left: 20%;margin-top:0px;">
                <thead>
                    <tr class="table-active">
                        <th class="table-active">s_no</th>
                        <th class="table-active">product image</th>
                        <th class="table-active">product name</th>
                        <th class="table-active">product price</th>
                        <th class="table-active">category</th>
                        <th class="table-active">view product</th>
                        <th class="table-active">add to cart</th>

                    </tr>
                </thead>-->
                <?php

//                function myselect($select_query) {
//                    //  $_SESSION['u_name'];
//                    include("db.php");
//                    $select_result = mysqli_query($conn, $select_query);
//                    if (mysqli_num_rows($select_result) > 0) {
//                        $j = 0;
//                        while ($row = mysqli_fetch_assoc($select_result)) {
//                            $j++;
//                            $product_id = $row['p_id'];
                            ?>
<!--                            <tbody>
                                <tr>-->
<!--                                    <th scope="row"><?php // echo $j; ?></th>
                                    <td><img src="/eshop/admin/imagefile/<?php // echo $row['p_image']; ?>" width="100px;"height="100px;" alt="product image"></td>
                                    <td colspan="1" class="table-active"><?php // echo $row['p_name']; ?></td>
                                    <td><?php // echo '<b>Rs </b>', $row['p_price']; ?></td>
                                    <td colspan="1" class="table-active"><?php // echo $row['p_category']; ?></td>
                                    <td><a href="/eshop/user/all_product_detail.php?p_id=<?php // echo $row['p_id'] ?>"><button type="button" class="btn btn-info">view product</button></a></td>-->
                                    <?php
//                                    $product_stock = $row['p_stock'];
//                                    $mysql_for_order_product = "select COUNT(product_id) FROM order_product where product_id='$product_id'";
//                                    $result_for_order_product = mysqli_query($conn, $mysql_for_order_product);
//                                    $row__for_order_product = mysqli_fetch_assoc($result_for_order_product);
//                                    $total_order_product = $row__for_order_product['COUNT(product_id)'];

//                                    $mysql_for_cart_product = "select COUNT(p_id) FROM cart where p_id='$product_id'";
//                                    $result_for_cart_product = mysqli_query($conn, $mysql_for_cart_product);
//                                    $row_for_cart_product = mysqli_fetch_assoc($result_for_cart_product);
//                                    $total_cart_product = $row_for_cart_product['COUNT(p_id)'];

//                                    $total_of_cart_and_order_product = $total_order_product ; //$total_cart_product;
//                                    if ($product_stock > $total_of_cart_and_order_product) {
//                                        ?>
                                        <!--<td><a href="/eshop/user/addtocart_d_submit.php?p_id=<?php // echo $row['p_id'] ?>"><button type="button" class="btn btn-primary">add to cart</button></a></td>-->
                                        <?php // } else {
                                        ?>
                                        <!--<td><a href="#?p_id=<?php // echo $row['p_id'] ?>"><button type="button" class="btn btn-danger">out of stock</button></a></td>-->   
                                    <?php // }
                                    ?>
                                </tr>
                                <?php //
//                            }
//                        }
//                    }

//                    myselect("select * from product");
                    ?>

                </tbody>
            </table>
        </div>
    </body>
</html>
