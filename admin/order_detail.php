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
        <?php include('header.php');
         if(isset($_SESSION['a_name'])){
        ?>
    </head>
    <body>
        <div class="container-fluid" style="max-width: 80%;">
            <p class="h3" style="margin-top:50px;">All Order details</p>
          
            <table class="table table-hover">
                <thead>
                    <tr class="table-active">
                        <th class="table-active">S no.</th>
                        <th class="table-active">Order ID</th>
                        <th class="table-active">User Name</th> 
                        <th class="table-active">No of Product</th>
                        <th class="table-active">Total Amount</th>

                        <th class="table-active">Order Date</th>
                    </tr>
                </thead>



                <?php
                function get_order_id(){
                    include 'db.php';
                $mysql_get_order_id = "select DISTINCT(order_id) FROM order_product";
                $result_get_order_id = mysqli_query($conn, $mysql_get_order_id);
                if (mysqli_num_rows($result_get_order_id) > 0) {
                    $i = 0;
                    while ($row_get_order_id = mysqli_fetch_assoc($result_get_order_id)) {
                        $i++;
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
                                        $mysql_get_order_detail = "select COUNT(*),SUM(product_price) FROM order_product WHERE order_id='$order_iD'";
                                        $result_get_order_detail = mysqli_query($conn, $mysql_get_order_detail);
                                        if (mysqli_num_rows($result_get_order_detail) > 0) {
                                            while ($row_get_order_detail = mysqli_fetch_assoc($result_get_order_detail)) {
                                                $order_DETAIL_product = $row_get_order_detail['COUNT(*)'];
                                                $order_DETAIL_price = $row_get_order_detail['SUM(product_price)'];
                                                ?>

                                                <tbody><tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $order_iD; ?></td>
                                                        <td><?php echo $user_NAME; ?></td>
                                                        <td><?php echo $order_DETAIL_product; ?></td>
                                                        <td><?php echo $order_DETAIL_price; ?></td>
                                                        <td><?php echo $order_date; ?></td>

                                                    </tr></tbody>
                                                <?php
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }}

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

                        <?php }
                    }
                      } else {
      header("Location: login.php");       
}?>
                </tbody>
            </table>
            <a href="category_form.php"><button type="button" class="btn btn-primary" name="category_detail">Back to Home</button></a>
        </div>
    </body>
</html>
