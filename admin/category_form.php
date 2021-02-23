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
        <?php include 'header.php'; 
        if(isset($_SESSION['a_name'])){?>
    </head>
    <body>

        <div class="container">
            <p class="h3" style="margin-top:20px;">Add New Category</p>
            <form name="user_register" action="category_submit.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Category Name</label>
                    <input type="name" class="form-control" id="exampleInputName" aria-describedby="nameHelp" name="category_name" required="required">

                </div>
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Category Image</label>
                    <input type="file" class="form-control" id="exampleInputName" aria-describedby="nameHelp" name="category_image" required="required">

                </div>

<!--                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Product Price</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="product_price" required="required">
                </div> 
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Product Category</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="product_category" required="required">
                </div>          -->

                <button type="submit" class="btn btn-primary" name="category_detail">Submit</button>
            </form>
            <p class="h3" style="margin-top:50px;">All Category</p>
            <table class="table">
                <thead>
                    <tr class="table-active">
                        <th class="table-active">s_no</th>
                          <th class="table-active">category image</th> 
                        <th class="table-active">category name</th>
                      
<!--                        <th class="table-active">product price</th>
                        <th class="table-active">category</th>-->
                        <th class="table-active">edit category details</th>
                        <th class="table-active">delete category</th>

                    </tr>
                </thead>
                <?php

                function myselect($select_query) {
                    include("db.php");
                    $select_result = mysqli_query($conn, $select_query);
                    if (mysqli_num_rows($select_result) > 0) {
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($select_result)) {
                            $i++;
                            ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    
                                    <td><img src="imagefile/<?php echo $row['category_image']; ?>" width="100px;"height="100px;"></td>
                                    <td colspan="1" class="table-active"><?php echo $row['category_name']; ?></td>
<!--                                    <td><?php // echo '<b>Rs </b>',$row['p_price']; ?></td>
                                    <td colspan="1" class="table-active"><?php // echo $row['p_category']; ?></td>-->
                                    <td><a href="edit_category.php?edit_id=<?php echo $row['category_id'] ?>"><button type="button" class="btn btn-secondary">edit</button></a></td>
                                    <td><a href="category_form.php?delete_id=<?php echo $row['category_id'] ?>"><button type="button" class="btn btn-danger">delete</button></a></td>
                                </tr>
                                <?php
                            }
                        }
                    }

                    myselect("select * from category");
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
<?php

function mydelete() {
    include("db.php");
    if (isset($_GET['delete_id'])) {
        $delete_id = $_GET['delete_id'];
        $mysql_check_category="select category.category_id,product.p_id,product.p_category FROM category INNER JOIN product ON category.category_name=product.p_category where category.category_id='$delete_id'";
        $my_result= mysqli_query($conn, $mysql_check_category);
        $my_row = mysqli_num_rows($my_result);
        if($my_row>0){
            // header("Location: category_form.php");
            echo 'Category not empty';
       
        }
        else{
        $mysql_query = "delete from category where category_id='$delete_id'";
        if (mysqli_query($conn, $mysql_query)) {
            echo 'deleted';
            header("Location: category_form.php");
        }
    }}
}

mydelete();
        } else {
      header("Location: login.php");       
}
?>
