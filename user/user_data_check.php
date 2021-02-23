<?php

function check_login_detail() {
    include("db.php");
    include('header.php');
//session_start();
    if (isset($_POST['user_login_detail'])) {
        $uname = $_POST['user_name'];
        $password = $_POST['password'];

        $check = "select u_name,password from user where u_name='$uname' and password='$password'";
        $result = mysqli_query($conn, $check);
        $count_log = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);

        if ($count_log == 1) {
            $uname = $row['u_name'];
            $pass = $row['password'];

            $_SESSION['u_name'] = $uname;
            $_SESSION['password'] = $pass;
            header("Location: all_product.php");
        } else {
            echo '<h1>please enter correct user name and password</h1>';
        }
    }
}

check_login_detail();
?>
<a href="ulogin.php"><button type="submit" class="btn btn-primary" name="user_login_detail"><-Back to Login Page</button></a>