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
        <div class="container-fluid" style="max-width: 80%; margin-top: 20px;">
            <p class="h3">user name : <?php echo $_GET['u_name'] ?></p>
            <table class="table table-hover" style="max-width: 100%;margin-top: 50px;">
                <thead>
                    <tr class="table-active">
                        <th class="table-active">S no.</th>
                        <th class="table-active">Product Name</th> 
                        <th class="table-active">Quantity</th>
                        <th class="table-active">Price</th>
                        <th class="table-active">Order Date</th>
                        <th class="table-active">Order Address</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['u_name'])) {
                        $user_name = $_GET['u_name'];
                        $mysql = "select user.u_id,order_detail.o_id,order_detail.o_date,order_detail.o_address,order_product.product_id,order_product.product_name,order_product.product_price,order_product.quantity
From 
order_product INNER JOIN order_detail ON order_product.order_id=order_detail.o_id
INNER JOIN user ON order_detail.u_id=user.u_id 
 where u_name='$user_name'";
                        $result = mysqli_query($conn, $mysql);
                        if (mysqli_num_rows($result) > 0) {
                            $i = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $i++;
                                ?> 
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['product_name'] ?></td>
                                    <td><?php echo $row['quantity'] ?></td>
                                    <td><b>Rs <?php echo $row['product_price'] ?></b></td>
                                    <td><?php echo $row['o_date'] ?></td>
                                    <td><?php echo $row['o_address'] ?></td>


                                </tr>
                                <?php
                            }
                        }
                    }
                    ?></tbody></table>
               <table class="table  table-hover" style="margin-top: 0px; max-width: 100%;float:left;">
                <thead class="table-dark ">

                </thead>
                <tbody>
                    <?php
                    $username = $_GET['u_name'];
                    $mysql_total_amount = "select COUNT(*),SUM(product_price),user.u_id,user.u_name,order_detail.o_id
FROM
user INNER JOIN order_detail ON user.u_id=order_detail.u_id
INNER JOIN order_product ON order_detail.o_id=order_product.order_id where user.u_name='$username'";
                    $mysql_result = mysqli_query($conn, $mysql_total_amount);
                    if (mysqli_num_rows($mysql_result) > 0) {
                        $total = 0;
                        while ($row_total = mysqli_fetch_assoc($mysql_result)) {
                            ?>
                            <tr>

                                <td style="float: left;"><b>No of Product : <?php echo $row_total['COUNT(*)']; ?></b></td>
                                <td style="float: right;"><b>Total Amount : Rs <?php echo $row_total['SUM(product_price)']; ?></b></td>
                            </tr>

                        <?php }
                    }} else {
      header("Location: login.php");      
                    } ?>
                </tbody>
            </table>

            <a href="user_detail.php"><button type="button" class="btn btn-primary" name="category_detail">Back</button></a>
        </div>
    </body>
</html>
