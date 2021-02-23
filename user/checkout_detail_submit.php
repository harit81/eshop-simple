<?php

function order_insert() {
    include("db.php");

    if (isset($_POST['checkout_detail'])) {
        $user_id = $_POST['u_id'];

        $user_address = $_POST['address'];


        $mysql_insert_query = "insert into order_detail(u_id,o_address)values('$user_id','$user_address')";
        if (mysqli_query($conn, $mysql_insert_query)) {
            // header("Location: add_product_form.php");

            $mysql_2 = "SELECT * FROM order_detail ORDER BY o_id DESC LIMIT 1";
            $result_2 = mysqli_query($conn, $mysql_2);
            $no_row = mysqli_num_rows($result_2);
            $row5 = mysqli_fetch_assoc($result_2);
            $order_id = $row5['o_id'];


            $count_pro_id = count($_POST['p_id']);


            $count_pro_name = count($_POST['p_name']);

            $count_pro_price = count($_POST['p_price']);

            for ($i = 0; $i < $count_pro_id; $i++) {
                echo '<br>', $_POST['p_id'][$i];
                $product_id = $_POST['p_id'][$i];
                echo '<br>', $_POST['p_name'][$i];
                $product_name = $_POST['p_name'][$i];
                echo '<br>', $_POST['p_price'][$i];
                $product_price = $_POST['p_price'][$i];
                  echo '<br>', $_POST['quantity'][$i];
                $product_quantity = $_POST['quantity'][$i];
                $mysql_insert_order_product = "insert into order_product(order_id,product_id,product_name,product_price,quantity)values('$order_id','$product_id','$product_name','$product_price','$product_quantity')";
                if (mysqli_query($conn, $mysql_insert_order_product)) {
                    echo 'OK';
                    $product_remove_cart = "delete from cart where u_id='$user_id'";
                    if (mysqli_query($conn, $product_remove_cart)) {
                        echo "Product removed";
                        header("Location: thanku.php");
                    }
                }
            }
        }
    }
}

order_insert();
?>
