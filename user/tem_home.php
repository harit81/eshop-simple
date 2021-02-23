<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include 'header.php'; ?>
    </head>
    <body>

        <div class="container">
            <p class="h3" style="margin-top:20px;">All Product</p>
            <table class="table">
                <thead>
                    <tr class="table-active">
                        <th class="table-active">s_no</th>
                        <th class="table-active">product name</th>
                        <th class="table-active">product price</th>
                        <th class="table-active">category</th>
                        <th class="table-active">view product</th>
                        <th class="table-active">add to cart</th>

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
                                    <td colspan="1" class="table-active"><?php echo $row['p_name']; ?></td>
                                    <td><?php echo $row['p_price']; ?></td>
                                    <td colspan="1" class="table-active"><?php echo $row['p_category']; ?></td>
                                    <td><a href="all_product.php?$edit_id=<?php echo $row['p_id'] ?>"><button type="button" class="btn btn-info">view product</button></a></td>
                                    <td><a href="tem_home.php?$cart_id=<?php echo $row['p_id'] ?>"><button type="button" class="btn btn-primary">add to cart</button></a></td>
<?php 
$p_id=$row['p_id'];
 $mysql = "select * from product where p_id='$p_id'";
                    $mysql_result = mysqli_query($conn, $mysql);
                    if (mysqli_num_rows($mysql_result) > 0) {
                        $row2 = mysqli_fetch_assoc($mysql_result);
                        echo '<br>';
                        echo $row2['p_id'];
                        echo '<br>';
                        echo $row2['p_name'];
                        echo '<br>';
                        echo $row2['p_price'];
                    }
?>
                            <form name="product" action="#" method="GET">
                                <input type="hidden" value="<?php echo $row['p_id']; ?>" name="product_id"/>
                                <input type="hidden" value="<?php echo $row['p_name']; ?>" name="product_name"/>
                                <input type="hidden" value="<?php echo $row['p_price']; ?>" name="product_id"/>
                                <input type="submit" value="add to cart">
                            </form>
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
