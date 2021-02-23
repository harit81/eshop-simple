<?php

function myinsert() {
    include("header.php");
    if (isset($_POST['product_detail'])) {
        echo $p_name = $_POST['product_name'];
         $p_image = $_FILES['product_image']['name'];
        $tempname = $_FILES['product_image']['tmp_name'];
        $folder = "imagefile/" . $p_image;
        move_uploaded_file($tempname, $folder);
         $p_price = $_POST['product_price'];
         $p_cate = $_POST['product_category'];
          $p_stock = $_POST['product_stock'];
        
         $p_name_check = "select * from product where p_name='$p_name'";
        $mysql_pname_query = mysqli_query($conn, $p_name_check);
        $p_name_match_row = mysqli_num_rows($mysql_pname_query);
        if ($p_name_match_row == 0 && strlen($p_name) != 0) {
        $mysql_insert_query = "insert into product(p_name,p_image,p_price,p_category,p_stock)values('$p_name','$p_image','$p_price','$p_cate','$p_stock')";
        if (mysqli_query($conn, $mysql_insert_query)) {
//            header("Location: add_product_form.php");
                  echo ' Product created successfully <a href="http://localhost/eshop/admin/add_product_form.php"><button type="submit" class="btn btn-primary" name="user_login_detail"><-Back to Add category Page</button></a>';
 
        } else {
            echo 'error';
            header("Location: add_product_form.php");
        }
        } else {
            echo ' product name already exists <a href="add_product_form.php"><button type="submit" class="btn btn-primary" name="user_login_detail"><-Back to Add product Page</button></a>';
        }
    }
}

myinsert();
?>