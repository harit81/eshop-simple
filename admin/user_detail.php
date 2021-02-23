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
        <?php include('header.php'); 
         if(isset($_SESSION['a_name'])){
        ?>
    </head>
    <body>
        <div class="container-fluid" style="max-width: 80%;">
        <p class="h3" style="margin-top:50px;">All user details</p>
        <table class="table">
            <thead>
                <tr class="table-active">
                    <th class="table-active">s_no</th>
                    <th class="table-active">User Name</th> 
                    <th class="table-active">User Email</th>

                    <th class="table-active">User Password</th>
                    <th class="table-active">Phone No.</th>
                    <th class="table-active">Address</th>


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
                                <td colspan="1" class="table-active"><a href="user_oreder_detail.php?u_name=<?php echo $row['u_name']?>"><?php echo $row['u_name']; ?></a></td>
                                <td colspan="1" class="table-active"><?php echo $row['u_email']; ?></td>
                                <td><?php  $row['password']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                            </tr>
                            <?php
                        }
                    }
                }

                myselect("select * from user");
               } else {
      header("Location: login.php");      
                    } ?>
            </tbody>
        </table>
        <a href="category_form.php"><button type="button" class="btn btn-primary" name="category_detail">Back to Home</button></a>
        </div>
    </body>
</html>
