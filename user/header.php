<?php
include 'db.php';
session_start();
function user_id() {
        include('db.php');
        $uname = $_SESSION['u_name'];
        $mysql = "select * from user where u_name='$uname'";
        $no_row = mysqli_query($conn, $mysql);
        $result = mysqli_num_rows($no_row);
        $row_f = mysqli_fetch_assoc($no_row);
        $u_id = $row_f['u_id'];
        
        $mysql_select="select * from cart where u_id='$u_id'";
        $result_select= mysqli_query($conn, $mysql_select);
        $cart_product=mysqli_num_rows($result_select);
        if($cart_product==0){
        
        }else{
        echo '<a href="cart_view.php"><span style="font-size:15px;">',$cart_product.'</span></a>'; 
        }  
 
        
    }



?>

<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">eShop</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/eshop/user/all_product.php" >Home</a>
                    </li>
<!--                    <li class="nav-item">
                        <a class="nav-link" href="all_product.php">All Product</a>
                    </li>-->
<!--                    <li class="nav-item">
                        <a class="nav-link" href="/eshop/all/category.php">Category</a>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link" href="/eshop/all/about_us.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/eshop/all/contact_us.php">Contact Us</a>
                    </li>
                      <?php 
                        
                        if(isset($_SESSION['u_name'])){
                            
                       
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/eshop/user/my_account.php">My Account</a>
                        </li>
                      
                        <li class="nav-item">
                            <a class="nav-link" href="/eshop/all/logout.php"><?php echo $_SESSION['u_name']; ?>[Logout]</a> 

                        </li>
                             <li class="nav-item">
                            <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 20px;line-height: 40px; ">
         <?php user_id();?></i>

                        </li>
                            <?php 
                        }
                        else{
                            ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/eshop/user/uregister.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/eshop/user/ulogin.php">Login</a>
                        </li>
                     <?php
                     
                     }?>
                       
                </ul>
                <form class="d-flex" name="searchbox" action="searchresult.php">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                   
                </form>
               
                
            </div>
        </div>
    </nav>
    <!--a href="cart_view.php"--> <!--/a--->
                
</body>
