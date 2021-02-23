<?php

function myinsert() {
    include("header.php");
    if (isset($_POST['category_detail'])) {
        echo $c_name = $_POST['category_name'];
         $c_image = $_FILES['category_image']['name'];
        $tempname = $_FILES['category_image']['tmp_name'];
        $folder = "imagefile/" . $c_image;
        move_uploaded_file($tempname, $folder);
//         $p_price = $_POST['product_price'];
//         $p_cate = $_POST['product_category'];
        
         $c_name_check = "select * from category where category_name='$c_name'";
        $mysql_cname_query = mysqli_query($conn, $c_name_check);
        $c_name_match_row = mysqli_num_rows($mysql_cname_query);
        if ($c_name_match_row == 0 && strlen($c_name_check) != 0) {
        $mysql_insert_query = "insert into category(category_name,category_image)values('$c_name','$c_image')";
        if (mysqli_query($conn, $mysql_insert_query)) {
//            header("Location: category_form.php");
                echo 'Category created successfully <a href="http://localhost/eshop/admin/category_form.php"><button type="submit" class="btn btn-primary" name="user_login_detail"><-Back to Add category Page</button></a>';
        } else {
            echo 'error';
            header("Location: category_form.php");
        }
        } else {
            echo ' category name already exists <a href="category_form.php"><button type="submit" class="btn btn-primary" name="user_login_detail"><-Back to Add category Page</button></a>';
        }
    }
}

myinsert();
?>