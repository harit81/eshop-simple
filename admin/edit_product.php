<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include("header.php"); 
        if(isset($_SESSION['a_name'])){?>
    </head>
    <body>
        <div class="container-fluid" style="max-width: 80%;">
            <?php

            // put your code here
            function myedit() {
                include("db.php");
                if (isset($_GET['edit_id'])) {
                    $edit_id = $_GET['edit_id'];
                    $mysql_query = "select * from product where p_id='$edit_id'";
                    $mysql_result = mysqli_query($conn, $mysql_query);
                    if (mysqli_num_rows($mysql_result) > 0) {
                        $row = mysqli_fetch_assoc($mysql_result);
                        ?>  
                        <p class="h3" style="margin-top:20px;">Edit Product Details</p>
                        <form name="user_register" action="product_data_update.php?edit_id=<?php echo $row['p_id']; ?>" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">Product Name</label>
                                <input type="name" class="form-control" id="exampleInputName" aria-describedby="nameHelp" name="product_name" value="<?php echo $row['p_name']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">Product Image</label>
                                  <img src="imagefile/<?php echo $row['p_image']?>" width="100px;"height="100px;"alt="current image" style="float: right">
                                <input type="file" class="form-control" id="exampleInputName" aria-describedby="nameHelp" name="product_image" value="<?php echo $row['p_image']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Product Price</label>
                                <input type="number" class="form-control" id="exampleInputPassword1" name="product_price" value="<?php echo $row['p_price']; ?>">
                            </div> 
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Product Category</label>
                                <select class="form-select form-select mb-3" aria-label=".form-select-lg example" name="product_category">
                                  
                                    <?php
                                    $product_id = $_GET['edit_id'];
                                    $mysql = "select * from product where p_id='$product_id'";
                                    $result = mysqli_query($conn, $mysql);
                                    $rows = mysqli_num_rows($result);
                                    echo $row = mysqli_fetch_assoc($result);
                                    ?>         
                                    <option value="<?php echo $row['p_category']; ?>" selected=""><?php echo $row['p_category']; ?></option>




                                    <?php
                                    $mysql = "select * from category";
                                    $result = mysqli_query($conn, $mysql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row2 = mysqli_fetch_assoc($result)) {
                                            ?>     

                                            <option value="<?php echo $row2['category_name']; ?>"><?php echo $row2['category_name']; ?></option>
                                        <?php }
                                    }
                                    ?>   
                                </select>

                            </div>  
                             <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Product Stock</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="product_stock" required="required" value="<?php echo $row['p_stock']; ?>">
                </div> 
<a href="add_product_form.php"><button type="button" class="btn btn-primary" name="category_detail">Back</button></a>
                            <button type="submit" class="btn btn-primary" name="product_detail">Submit</button>
                        </form>
                        <?php
                    }
                }
            }

            myedit();
                } else {
      header("Location: login.php");       
}
            ?>
        </div>
    </body>
</html>
