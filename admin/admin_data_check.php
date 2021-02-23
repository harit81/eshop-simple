<?php

function check_login_detail() {
    include('header.php');
//session_start();
    if (isset($_POST['admin_login_detail'])) {
        $uname = $_POST['admin_name'];
        $password = $_POST['password'];

        $check = "select a_name,password from admin where a_name='$uname' and password='$password'";
        $result = mysqli_query($conn, $check);
        $count_log = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);

        if ($count_log == 1) {
            $aname = $row['a_name'];
//            $pass = $row['password'];

            $_SESSION['a_name'] = $aname;
//            $_SESSION['password'] = $pass;
            header("Location: sidebar.php");
        } else {
            echo '<h1>please enter correct user name and password</h1>';
        }
    }
}

check_login_detail();
?>
<a href="adminlogin.php"><button type="submit" class="btn btn-primary" name="user_login_detail"><-Back to Login Page</button></a>