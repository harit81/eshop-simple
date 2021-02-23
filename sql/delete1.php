<?php
$a;

include 'db.php';
$mysql_select_order_product = "select COUNT(*) from order_product where product_id='23'";
$result_order_product = mysqli_query($conn, $mysql_select_order_product);
$num_of_row_order_product = mysqli_num_rows($result_order_product);
$row_order_product = mysqli_fetch_assoc($result_order_product);
echo $row_order_product['COUNT(*)'];
function fds(){
echo $GLOBALS['a']="djgkd1";
}

fds();
function asd(){
   
    echo  $GLOBALS['a'];
}
asd();

?>
<input type="button" disabled="" value="button">