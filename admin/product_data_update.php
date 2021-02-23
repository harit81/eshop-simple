<?php

function myupdate() {
    include("db.php");
    if (isset($_GET['edit_id'])) {
        $e_id = $_GET['edit_id'];
        $p_name = $_POST['product_name'];
        $p_image = $_FILES['product_image']['name'];
        $tempname = $_FILES['product_image']['tmp_name'];
        $folder = "imagefile/" . $p_image;
        move_uploaded_file($tempname, $folder);
        $p_price = $_POST['product_price'];
        $p_cate = $_POST['product_category'];
         $p_stock = $_POST['product_stock'];
        if (empty($p_image)) {
            $mysql_image = "select * from product where p_id='$e_id'";
            $result_image = mysqli_query($conn, $mysql_image);
            $m = mysqli_num_rows($result_image);
            $rows = mysqli_fetch_assoc($result_image);
            $p_image_if_empty = $rows['p_image'];

            $mysql_insert_query = "update product set p_name='$p_name',p_image='$p_image_if_empty',p_price='$p_price',p_category='$p_cate',p_stock='$p_stock' where p_id='$e_id'";
            if (mysqli_query($conn, $mysql_insert_query)) {
                header("Location: add_product_form.php");
            } else {
                echo 'error';
                header("Location: add_product_form.php");
            }
        } else {
            $mysql_insert_query = "update product set p_name='$p_name',p_image='$p_image',p_price='$p_price',p_category='$p_cate',p_stock='$p_stock' where p_id='$e_id'";
            if (mysqli_query($conn, $mysql_insert_query)) {
                header("Location: add_product_form.php");
            } else {
                echo 'error';
                header("Location: add_product_form.php");
            }
        }
    }
}

myupdate();
?>