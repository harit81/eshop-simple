<?php
function mydelete() {
    include("db.php");
    if (isset($_GET['delete_id'])) {
        $delete_id = $_GET['delete_id'];
        $mysql_query = "delete from product where p_id='$delete_id'";
        if (mysqli_query($conn, $mysql_query)) {
            echo 'deleted';
            header("Location: add_product_form.php");
        }
    }
}

?>
