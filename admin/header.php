<?php
include 'db.php';
session_start();
function admin_id() {
    if(isset($_SESSION['a_name'])){
        include('db.php');
         $uname = $_SESSION['a_name'];
        $mysql = "select * from admin where a_name='$uname'";
        $no_row = mysqli_query($conn, $mysql);
        $result = mysqli_num_rows($no_row);
        $row_f = mysqli_fetch_assoc($no_row);
        $u_id = $row_f['a_id'];
    }

?>

    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>   

    </head>
    <body>
             <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="sidebar.php">eShop</a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php if(isset($_SESSION['a_name'])){?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="sidebar.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category_form.php">Add Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add_product_form.php"><!--Category-->Add product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user_detail.php">User Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="order_detail.php">Order Details</a>
                        </li>
                          <li class="nav-item">
                            <a class="nav-link" href="new_order_detail.php">Order Status</a>
                        </li>
<!--                        <li class="nav-item">
                            <a class="nav-link" href="#">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="uregister.php">Register</a>
                        </li>
                       -->
                         <li class="nav-item">
                             <a class="nav-link" href="logout.php">admin:<?php if(isset($_SESSION['a_name'])){echo $_SESSION['a_name']; ?>[Logout]<?php }?></a> 

                        </li>
                        <?php }
                        else{?>
                             <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                       <?php }?>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search not working" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </body>
    <?php 
    }admin_id();
    ?>