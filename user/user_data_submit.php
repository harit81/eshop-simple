<?php

function myinsert() {
   // include("db.php");
    include 'header.php';
    if (isset($_POST['user_detail'])) {
        $u_name = $_POST['user_name'];
        $u_email = $_POST['user_email'];
        $u_pass = $_POST['password'];
        $uc_pass = $_POST['cpassword'];
        $u_address = $_POST['address'];
        $mobile = $_POST['phone'];

        $u_name_check = "select * from user where u_name='$u_name'";
        $mysql_uname_query = mysqli_query($conn, $u_name_check);
        $u_name_match_row = mysqli_num_rows($mysql_uname_query);

        $u_email_check = "select * from user where u_email='$u_email'";

        $mysql_uemail_query = mysqli_query($conn, $u_email_check);
        $u_email_match_row = mysqli_num_rows($mysql_uemail_query);
        if ($u_name_match_row == 0 && strlen($u_name) != 0) {
            if ($u_email_match_row == 0 && strlen($u_email) != 0) {
                if ($u_pass == $uc_pass && strlen($u_pass) != 0 && strlen($uc_pass) != 0) {
                    if (strlen($mobile) > 9) {
                        $mysql_insert_query = "insert into user(u_name,u_email,password,phone,address)values('$u_name','$u_email','$u_pass','$mobile','$u_address')";
                        if (mysqli_query($conn, $mysql_insert_query)) {
                            echo 'Register successfully click to Login <a href="ulogin.php"><button type="submit" class="btn btn-primary" name="user_login_detail">Login</button></a>';
                            //header("Location: ulogin.php");
                        } else {
                            echo 'error', mysqli_error($conn);
                        }
                    } else {
                        echo 'please enter 10 digit mobile number <a href="uregister.php"><button type="submit" class="btn btn-primary" name="user_login_detail"><-Back to Register Page</button></a>';
                        
                    }
                } else {
                    echo 'user password and confirm password not match <a href="uregister.php"><button type="submit" class="btn btn-primary" name="user_login_detail"><-Back to Register Page</button></a>';
                }
            } else {
                echo 'user email already exists <a href="uregister.php"><button type="submit" class="btn btn-primary" name="user_login_detail"><-Back to Register Page</button></a>';
            }
        } else {
            echo 'user name already exists <a href="uregister.php"><button type="submit" class="btn btn-primary" name="user_login_detail"><-Back to Register Page</button></a>';
        }
    }
}

myinsert();
?>