<?php

function myupdate() {
    include("db.php");
    if (isset($_GET['edit_id'])) {
        $e_id = $_GET['edit_id'];
        $c_name = $_POST['category_name'];
        $c_image = $_FILES['category_image']['name'];
        $tempname = $_FILES['category_image']['tmp_name'];
        $folder = "imagefile/" . $c_image;
        move_uploaded_file($tempname, $folder);
        if (empty($c_image)) {
            $mysql_image = "select * from category where category_id='$e_id'";
            $result_image = mysqli_query($conn, $mysql_image);
            $m = mysqli_num_rows($result_image);
            $rows = mysqli_fetch_assoc($result_image);
            $c_image_if_empty = $rows['category_image'];


            $mysql_insert_query = "update category set category_name='$c_name',category_image='$c_image_if_empty' where category_id='$e_id'";
            if (mysqli_query($conn, $mysql_insert_query)) {
                header("Location: category_form.php");
            } else {
                echo 'error';
                header("Location: category_form.php");
            }
        } else {
            $mysql_insert_query = "update category set category_name='$c_name',category_image='$c_image' where category_id='$e_id'";
            if (mysqli_query($conn, $mysql_insert_query)) {
                header("Location: category_form.php");
            } else {
                echo 'error';
                header("Location: category_form.php");
            }
        }
    }
}

myupdate();
?>