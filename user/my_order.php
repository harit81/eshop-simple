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
        <?php include("header.php");
         if(isset($_SESSION['u_name'])){?>
    </head>
    <body>
        <div class="container-fluid" style="max-width: 50%;">
            <table class="table  table-hover" style="margin-top: 50px;">
                <thead class="table-dark ">
                    <tr class="table-active">
                        <th class="table-active">S.No</th>
                        <th class="table-active">Product Name</th>
                        <th class="table-active">Product Price</th>
                        <th>Order Date</th>
                        <th>Order Status</th>

                    </tr>
                </thead>
                <tbody>

                    <?php

                    function get_user_id() {
                        include("db.php");
                        if (isset($_SESSION['u_name'])) {
                            $user_name = $_SESSION['u_name'];
                            $order_detail = "select user.u_id,order_detail.o_id,order_detail.o_date,order_product.order_id,order_product.product_id,
                        order_product.product_name,order_product.product_price From order_product INNER JOIN order_detail ON order_product.order_id=order_detail.o_id
INNER JOIN user ON order_detail.u_id=user.u_id where u_name='$user_name'";
                            $result_order_detail = mysqli_query($conn, $order_detail);
                            if (mysqli_num_rows($result_order_detail) > 0) {
                                $i = 0;
                                while ($row = mysqli_fetch_assoc($result_order_detail)) {
                                    $i++;
                                    ?>

                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['product_name']; ?></td>
                                        <td><?php echo $row['product_price']; ?></td>
                                        <td><?php echo $row['o_date']; ?></td>
                                        <td>
                                            <?php 
                                            $user_id=$row['u_id'];
                                            $product_id=$row['product_id'];
                                            $order_id=$row['order_id'];
                                              $mysql_check_order_status="SELECT * FROM order_product where order_status=false AND order_id='$order_id' AND product_id='$product_id' ORDER BY s_no DESC LIMIT 1 ";
                                                         $result_check_order_status= mysqli_query($conn, $mysql_check_order_status);
                                                         $row_check = mysqli_num_rows($result_check_order_status);
                                                         if($row_check==0){
//                                                        
                                            ?>
                                                <a href="order_status.php"><button type="submit" class="btn btn-success" name="category_detail">Order Delivered</button></a></td>
                                        
                                                   <?php
                                                         }else{?> 
                                                      <a href="#"><button type="button" class="btn btn-primary" name="category_detail">On Process</button></a>
                                           
                                        
                                                     
                                                         <?php }?>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            }
                        }
                    }

                    get_user_id();
                    }else{
            header("Location: ulogin.php");
        }
                    ?>
                </tbody>
            </table>
        </div>     



    </body>
</html>
