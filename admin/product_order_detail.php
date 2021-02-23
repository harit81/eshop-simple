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
        <?php include 'header.php';
         if(isset($_SESSION['a_name'])){
        ?>
         
    </head>
    <body>
        <div class="container-fluid" style="max-width: 80%;">
            <p class="h3"><?php if(isset($_GET['p_name'])){echo  $_GET['p_name']; }?></p>
            <table class="table table-hover" style="max-width: 100%;margin-top: 50px;">
                <thead>
                    <tr class="table-active">
                        <th class="table-active">S no.</th>
                        <th class="table-active">User Name</th> 
                        <th class="table-active">Quantity</th>
                        <th class="table-active">Price</th>
                        <th class="table-active">Order Date</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['p_id'])) {
                        $product_id = $_GET['p_id'];
                        $mysql = "SELECT user.u_id,user.u_name,order_detail.o_id,order_detail.o_address,order_detail.o_date,order_product.product_price,order_product.quantity
FROM order_detail INNER JOIN user ON order_detail.u_id=user.u_id
INNER JOIN order_product ON order_detail.o_id=order_product.order_id where product_id='$product_id'";
                        $result = mysqli_query($conn, $mysql);
                        if (mysqli_num_rows($result) > 0) {
                            $i = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $i++;
                                ?> 
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['u_name'] ?></td>
                                    <td><?php echo $row['quantity'] ?></td>
                                    <td><b>Rs <?php echo $row['product_price'] ?></b></td>
                                    <td><?php echo $row['o_date'] ?></td>



                                </tr>
                                <?php
                            }
                        }
                    }
                    } else {
      header("Location: login.php");      
                    }?></tbody></table>
              <a href="order_detail.php"><button type="button" class="btn btn-primary" name="category_detail">Back</button></a>
        </div>
    </body>
</html>
