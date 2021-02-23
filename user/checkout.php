<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <?php include("header.php");
          if(isset($_SESSION['u_name'])){
        ?>
        <title></title>
    </head>
    <body>
        <div class="container-fluid" style="max-width:80%;margin-top: 5%;">
            <p class="h3">Enter Details</p>
            <?php

            //echo $_SESSION['u_name'];
            function checkout_data() {
                include("db.php");
                if (isset($_SESSION['u_name'])) {
                    $user_name = $_SESSION['u_name'];
                    $mysql = "select * from user where u_name='$user_name'";
                    $no_row = mysqli_query($conn, $mysql);
                    $result = mysqli_num_rows($no_row);
                    $row_f = mysqli_fetch_assoc($no_row);
                    $u_id = $row_f['u_id'];
                    $user_name_u_id = $row_f['u_name'];
                    $user_email_u_id = $row_f['u_email'];
                    $user_address_u_id = $row_f['address'];
                    ?>
                    <form name="user_register" action="checkout_detail_submit.php" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">User Name</label>
                            <input type="hidden" name="u_id" value="<?php echo $u_id; ?>"/>
                            <input type="name" class="form-control" id="exampleInputName" aria-describedby="nameHelp" name="user_name" value="<?php echo $user_name_u_id; ?>">
                            <div id="nameHelp" class="form-text">We'll never share your details with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail" class="form-label">User Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user_email" value="<?php echo $user_email_u_id; ?>">

                        </div>        

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Address</label>
                            <input type="address" class="form-control" id="exampleInputPassword1" name="address" value="<?php echo $user_address_u_id ?>">
                        </div> 
                        <div class="mb-3">
                            <label for="inputState" class="form-label">Payment type</label>
                            <select id="inputState" class="form-select" name="payment_type">
                               <option>Cash on Delivery</option>
                                <!--<option>Cash on Delivery</option>-->
                                <option disabled="">...</option>
                            </select>
                            <!--div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Phone Number</label>
                                <input type="number" class="form-control" id="exampleInputPassword1" name="phone">
                            </div>          
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div--->

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

                                    </tr>
                                </thead>
                                <?php
                                $mysql_all_data = "select user.u_id,user.u_name,user.address,
                                        product.p_id,product.p_image,product.p_name,product.p_price
                                        FROM
                                        cart INNER JOIN user ON cart.u_id=user.u_id
                                        INNER JOIN product on cart.p_id=product.p_id WHERE user.u_id='$u_id'";
                                $result2 = mysqli_query($conn, $mysql_all_data);
                                if (mysqli_num_rows($result2)) {
                                    $i = 0;
                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                        $i++;
                                        /* echo '<br>';
                                          echo $row2['u_id'];
                                          echo '<br>';
                                          //echo $row2['u_name'];
                                          echo '<br>';
                                          echo $row2['address'];
                                          echo '<br>';
                                          echo $row2['p_id'];
                                          echo '<br>';
                                          //echo $row2['p_name'];
                                          echo '<br>';
                                          echo $row2['p_price']; */
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><img src="/eshop/admin/imagefile/<?php echo $row2['p_image']; ?>" width="100px;"height="100px;" alt="product image"></td>
                                                <td><?php echo $row2['p_name']; ?></td>
                                                <td><?php echo $row2['p_price']; ?></td>
                                                <td>1</td>
                                                <td><?php echo $row2['p_price']; ?></td>
                                                <td><a href="checkout.php?remove_id=<?php echo $row2['p_id']; ?>">remove</a></td>
                                            </tr>

                <!--input type="text" name="u_id" value="<?php /* echo $row2['u_id']; */ ?>"/>
                <input type="text" name="u_address" value="<?php /* echo $row2['address']; */ ?>"/--->
                                        <input type="hidden" name="quantity[]" value="<?php echo 1; ?>"/>    
                                        <input type="hidden" name="p_id[]" value="<?php echo $row2['p_id']; ?>"/>
                                        <input type="hidden" name="p_name[]" value="<?php echo $row2['p_name']; ?>"/>
                                        <input type="hidden" name="p_price[]" value="<?php echo $row2['p_price']; ?>"/>


                                        <?php
                                    }
                                }
                            }
                        }

                        checkout_data();
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

                        <?php }
                    } ?>
                </tbody>
            </table>


                    <a href="all_product.php"><button type="button" class="btn btn-primary" style="float:left;">Continue Shopping</button> </a>          
                    <button type="submit" class="btn btn-primary" name="checkout_detail" style="float:right;">Submit</button>

            </form>  
        </div>
    </body>
</html>
<?php

function mydelete() {
    include("db.php");
    if (isset($_GET['remove_id'])) {
        $delete_id = $_GET['remove_id'];
//        $mysql_query = "delete from cart where p_id='$delete_id'";
        $mysql_query="DELETE FROM cart
WHERE p_id = '$delete_id'
ORDER BY cart_id DESC
LIMIT 1";
        if (mysqli_query($conn, $mysql_query)) {
            echo 'deleted';
            header("Location: checkout.php");
        }
    }
}

mydelete();
}else{
            header("Location: ulogin.php");
        }
?>
