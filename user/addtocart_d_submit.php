<?php

include("header.php");
if(isset($_SESSION['u_name'])){
if (isset($_GET['p_id'])) {
    $p_id = $_GET['p_id'];

    $uname = $_SESSION['u_name'];
    $mysql = "select * from user where u_name='$uname'";
    $no_row = mysqli_query($conn, $mysql);
    $result = mysqli_num_rows($no_row);
    $row_f = mysqli_fetch_assoc($no_row);
    $u_id = $row_f['u_id'];
    $quantity=1;
    $mysql_for_insert = "insert into cart(u_id,p_id,quantity)values('$u_id','$p_id','$quantity')";
    if (mysqli_query($conn, $mysql_for_insert)) {
        echo 'inserted';
        header("Location: all_product.php");
    }
}}
else{
    header("Location: ulogin.php");
}
?>