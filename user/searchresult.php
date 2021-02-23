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
        <?php include("header.php"); ?>
    </head>
    <body>
        <div class="container">
            <p class="h3" style="margin-top:20px;">Search Result</p>
            <table class="table">
                <thead>
                    <tr class="table-active">
                        <th class="table-active">s_no</th>
                        <th class="table-active">product image</th>
                        <th class="table-active">product name</th>
                        <th class="table-active">product price</th>
                        <th class="table-active">category</th>
                        <th class="table-active">view product</th>
                        <th class="table-active">add to cart</th>

                    </tr>
                </thead>
                <tbody>

                    <?php
                    if (isset($_GET['search'])) {
                        $mysearch = $_GET['search'];
                        $mysql_search = "select * from product where p_name LIKE '%$mysearch%'";
                        $result_search = mysqli_query($conn, $mysql_search);
                        if (mysqli_num_rows($result_search) > 0) {
                            $i = 0;
                            while ($row_search = mysqli_fetch_assoc($result_search)) {
                                $i++;
                                ?>        

                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><img src="/eshop/admin/imagefile/<?php echo $row_search['p_image']; ?>" width="100px;"height="100px;" alt="product image"></td>     
                                    <td><?php echo $row_search['p_name'] ?></td>
                                    <td><?php echo $row_search['p_price'] ?></td>
                                    <td><?php echo $row_search['p_category'] ?></td>
                                    <td><a href="all_product_detail.php?p_id=<?php echo $row_search['p_id'] ?>"><button type="button" class="btn btn-info">view product</button></a></td>
                                    <td><a href="addtocart_d_submit.php?p_id=<?php echo $row_search['p_id'] ?>"><button type="button" class="btn btn-primary">add to cart</button></a></td>

                                </tr>
                                <?php
                            }
                        }
                    }
                    ?>
                </tbody>
                </body>
                </html>
