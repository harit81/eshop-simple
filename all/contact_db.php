<?php
include 'header.php';
if (isset($_POST['contact_detail'])) {
    $user_name = $_POST['uname'];
    $user_email = $_POST['uemail'];
    $user_phone = $_POST['phoneno'];
    $user_message = $_POST['message'];
    $mysql = "insert into contact(contact_name,contact_email,contact_phone,message)values('$user_name','$user_email','$user_phone','$user_message')";
    if (mysqli_query($conn, $mysql)) {
        echo 'message send';
//        header("Location: /eshop/all/contact_us.php");
          echo ' <a href="http://localhost/eshop/user/all_product.php"><button type="submit" class="btn btn-primary" name="user_login_detail"><-Back to Home Page</button></a>';
 
    }
    else{
        echo 'Error'. mysqli_error($conn);
    }
}
?>