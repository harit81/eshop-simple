<?php include('adminfun.php');?>
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
        <?php
        include 'header.php';
        if(isset($_SESSION['a_name'])){
//        $mysql="select * from category";
//        $result= mysqli_query($conn, $mysql);
//        if(mysqli_num_rows($result)>0){
//            while ($row= mysqli_fetch_assoc($result)){
//              echo  $row['category_name'];
        
        ?>
    </head>
    <body>

        <div class="container">
            <p class="h3" style="margin-top:20px;">Add New Product</p>
            <form name="user_register" action="product_data_submit.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Product Name</label>
                    <input type="name" class="form-control" id="exampleInputName" aria-describedby="nameHelp" name="product_name" required="required">

                </div>
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Product Image</label>
                    <input type="file" class="form-control" id="exampleInputName" aria-describedby="nameHelp" name="product_image" required="required">

                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Product Price</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="product_price" required="required">
                </div> 
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Product Category</label>
                        <select class="form-select form-select mb-3" aria-label=".form-select-lg example" name="product_category">
                            <option selected>select category</option>
                            <?php
                            $mysql = "select * from category";
                            $result = mysqli_query($conn, $mysql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>         

                                    <option value="<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></option>
                                <?php }
                            }
                            ?>   
                        </select>


                    </div>          
                 <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Product Stock</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="product_stock" required="required">
                </div> 
                    <button type="submit" class="btn btn-primary" name="product_detail">Submit</button>
            </form>
            <p class="h3" style="margin-top:50px;">All Product</p>
            <table class="table">
                <thead>
                    <tr class="table-active">
                        <th class="table-active">s_no</th>
                        <th class="table-active">product image</th> 
                        <th class="table-active">product name</th>

                        <th class="table-active">product price</th>
                        <th class="table-active">category</th>
                        <th class="table-active">edit product details</th>
                        <th class="table-active">delete product</th>

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

                                    <td><img src="imagefile/<?php echo $row['p_image']; ?>" width="100px;"height="100px;"></td>
                                    <td colspan="1" class="table-active"><?php echo $row['p_name']; ?></td>
                                    <td><?php echo '<b>Rs </b>', $row['p_price']; ?></td>
                                    <td colspan="1" class="table-active"><?php echo $row['p_category']; ?></td>
                                    <td><a href="edit_product.php?edit_id=<?php echo $row['p_id'] ?>"><button type="button" class="btn btn-secondary">edit</button></a></td>
                                    <td><a href="add_product_form.php?delete_id=<?php echo $row['p_id'] ?>"><button type="button" class="btn btn-danger">delete</button></a></td>
                                </tr>
                                <?php
                            }
                        }
                    }

                    myselect("select * from product");
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
<?php
//
//function mydelete() {
//    include("db.php");
//    if (isset($_GET['delete_id'])) {
//        $delete_id = $_GET['delete_id'];
//        $mysql_query = "delete from product where p_id='$delete_id'";
//        if (mysqli_query($conn, $mysql_query)) {
//            echo 'deleted';
//            header("Location: add_product_form.php");
//        }
//    }
//}
//
//mydelete();
if(isset($_GET['delete_id'])){
    mydelete();
}
} else {
header("Location: login.php");    
}
?>
