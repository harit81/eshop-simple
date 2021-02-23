<?php

include 'header.php';
if (isset($_GET['s_no'])) {
    $s_no = $_GET['s_no'];
    $o_status = $_POST['order_status'];

     $mysql = "update order_product set order_status='$o_status' WHERE order_id='$s_no'";
    if (mysqli_query($conn, $mysql)) {
        echo "order_delivered";
     header("Location: new_order_detail_2.php");
    }
}
?>