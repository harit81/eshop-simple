<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>
        </title>
        <?php
        include 'header.php';
        if (isset($_SESSION['a_name'])) {
            ?>
            <style>

                .sidebar ul{
                    list-style: none;
                    margin-top: 20px;
                    background-color: #E6E2EB;
                    float: left;
                    width: 12%;
                    height: auto;
                }
                .sidebar ul li{
                    margin-top: 20px;
                }
                .sidebar ul li a{
                    text-decoration: none;
                    width: 12%;
                }
                .sidebar ul li a:hover{
                    text-decoration: none;
                    background-color: black;
                    color:white;
                    width: 12%;
                }
                .main{
                    margin-left: 15%;
                    /*                    background-color: gold;*/
                    width:80%;
                    height: auto;
                    margin-top: 20px;
                }

            </style>
        </head>
        <body>
            <div class="sidebar">
                <ul>
                    <li><a href="sidebar.php">DashBoard</a></li>
                    <li><a href="category_form.php">Category</a></li>
                    <li><a href="add_product_form.php">Product</a></li>
                    <li><a href="user_detail.php">User</a></li>
                    <li><a href="order_status.php">Order</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <?php
            $mysql_no_of_category = "select COUNT(*) from category";
            $result_of_category = mysqli_query($conn, $mysql_no_of_category);
            $no_of_row_category = mysqli_fetch_assoc($result_of_category);
            $mysql_no_of_product = "select COUNT(*) from product";
            $result_of_product = mysqli_query($conn, $mysql_no_of_product);
            $no_of_row_product = mysqli_fetch_assoc($result_of_product);


            $mysql_no_of_order = "SELECT COUNT(*) FROM `order_product`";
            $result_of_order = mysqli_query($conn, $mysql_no_of_order);
            $no_of_row_order = mysqli_fetch_assoc($result_of_order);

            $mysql_no_of_order_delivered = "SELECT COUNT(*) FROM order_product where order_status=1";
            $result_of_order_delivered = mysqli_query($conn, $mysql_no_of_order_delivered);
            $no_of_row_order_delivered = mysqli_fetch_assoc($result_of_order_delivered);

            $mysql_no_of_order_pending = "SELECT COUNT(*) FROM order_product where order_status=0";
            $result_of_order_pending = mysqli_query($conn, $mysql_no_of_order_pending);
            $no_of_row_order_pending = mysqli_fetch_assoc($result_of_order_pending);

            $mysql_no_of_user = "SELECT COUNT(*) FROM user";
            $result_of_user = mysqli_query($conn, $mysql_no_of_user);
            $no_of_row_user = mysqli_fetch_assoc($result_of_user);

            $mysql_no_of_contact_us = "SELECT COUNT(*) FROM contact";
            $result_of_contact_us = mysqli_query($conn, $mysql_no_of_contact_us);
            $no_of_row_contact_us = mysqli_fetch_assoc($result_of_contact_us);
            ?>
            <div class="main">
                <a href='category_form.php'><div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header">Category</div>
                        <div class="card-body">
                            <h5 class="card-title">Total No. of Category</h5>
                            <p class="card-text"><?php echo $no_of_row_category['COUNT(*)']; ?></p>
                        </div>
                    </div></a>
                <a href='add_product_form.php'>
                    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;margin-left: 16%;">
                        <div class="card-header">Product</div>
                        <div class="card-body">
                            <h5 class="card-title">Total No. of Product</h5>
                            <p class="card-text"><?php echo $no_of_row_product['COUNT(*)']; ?></p>
                        </div>
                    </div>
                </a> 
                <a href="http://localhost/eshop/admin/order_detail.php">
                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;float: right;margin-top: 0%;">
                        <div class="card-header">Order Delivered</div>
                        <div class="card-body">
                            <h5 class="card-title">Total No. of Order Delivered</h5>
                            <p class="card-text"><?php echo $no_of_row_order_delivered['COUNT(*)']; ?></p>
                        </div>
                    </div></a>
                <a href="http://localhost/eshop/admin/new_order_detail.php">
                    <div class="card text-white bg-danger mb-3" style="max-width: 18rem;float: right;margin-right: 5%;">
                        <div class="card-header">Order Pending</div>
                        <div class="card-body">
                            <h5 class="card-title">Total No. of Order Pending</h5>
                            <p class="card-text"><?php echo $no_of_row_order_pending['COUNT(*)']; ?></p>
                        </div>
                    </div>
                </a>
                <a href="http://localhost/eshop/admin/user_detail.php">
                    <div class="card text-dark bg-warning mb-3" style="max-width: 18rem;">
                        <div class="card-header">User</div>
                        <div class="card-body">
                            <h5 class="card-title">Total No. of User</h5>
                            <p class="card-text"><?php echo $no_of_row_user['COUNT(*)']; ?></p>
                        </div>
                    </div>
                </a>
                <div class="card text-dark bg-light mb-3" style="max-width: 18rem;float: right;margin-top: -30%;">
                    <div class="card-header">Order</div>
                    <div class="card-body">
                        <h5 class="card-title">Total No. of Order Received</h5>
                        <p class="card-text"><?php echo $no_of_row_order['COUNT(*)']; ?></p>
                    </div>
                </div>
                <div class="card text-dark bg-info mb-3" style="max-width: 18rem;float: right;margin-right:  36%;margin-top: 0%;">
                    <div class="card-header">Contact Us</div>
                    <div class="card-body">
                        <h5 class="card-title">Total No. of User Contact us</h5>
                        <p class="card-text"><?php echo $no_of_row_contact_us['COUNT(*)']; ?></p>
                    </div>
                </div>
            </div>

            <?php
        } else {
            header("Location: http://localhost/eshop/admin/login.php");
        }
        ?>

    </body>
</html>
