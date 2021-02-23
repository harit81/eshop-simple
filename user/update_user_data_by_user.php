<?php

function my_user_update() {
    include("header.php");
    if (isset($_GET['u_id'])) {
        $u_id = $_GET['u_id'];
        $u_name = $_POST['user_name'];
        $u_email = $_POST['user_email'];
        $cuurent_pass = $_POST['cupassword'];
        $n_pass = $_POST['npassword'];
        $u_address = $_POST['address'];
        $mobile = $_POST['phone'];

        $password_check = "select password from user where u_id='$u_id'";
        $result = mysqli_query($conn, $password_check);
        $num_row = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);

        $curr_pass = $row['password'];
        if ($cuurent_pass === $curr_pass) {
            $mysql_update_query = "update user set u_name='$u_name',u_email='$u_email',password='$n_pass',address='$u_address',phone='$mobile' where u_id='$u_id'";
            if (mysqli_query($conn, $mysql_update_query)) {
                //echo 'insert suessfully';
                header("Location: /eshop/user/my_account.php");
            } else {
                echo 'current password not match<a href="my_account.php"><button type="submit" class="btn btn-primary" name="user_login_detail"><-Back to myaccount Page</button></a>';
            }
        }else{
             //header("Location: /eshop/user/my_account.php");
                      echo 'current password not match<a href="my_account.php"><button type="submit" class="btn btn-primary" name="user_login_detail"><-Back to myaccount Page</button></a>';
    
        }
    }
}

my_user_update();
?>