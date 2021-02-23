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
        <?php include ('header.php');
          if(isset($_SESSION['u_name'])){?>
    </head>
    <body>
        <div class="container-fluid" style="margin-top: 100px;">
            <table class="table table-hover" style="width: 10%;">
                <thead>
                    <tr class="dark">
                        <th>My Account</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="table-active">Account Details</td>
                    </tr>
                    <tr>
                        <td><a href="my_order.php">Order</a></td>
                    </tr>
                    <tr>
                        <td><a href="/eshop/all/logout.php">Logout</a></td>
                    </tr>
                </tbody>
            </table>
            <?php 
          if(isset($_SESSION['u_name'])){
           $user_name = $_SESSION['u_name'];
           $mysql_q="select * from user where u_name='$user_name'";
           $mysql_query1= mysqli_query($conn, $mysql_q);
           if(mysqli_num_rows($mysql_query1)>0){
               $rows= mysqli_fetch_assoc($mysql_query1);
            
            ?>   
            <form name="user_register" action="update_user_data_by_user.php?u_id=<?php echo $rows['u_id'];?>" method="POST" style="width: 40%;margin-top: -180px;margin-left: 25%;">
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">User Name</label>
                    <input type="name" class="form-control" id="exampleInputName" aria-describedby="nameHelp" name="user_name" value="<?php echo $rows['u_name'];?>">
                    
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">User Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user_email" value="<?php echo $rows['u_email'];?>">

                </div>  
                 <p class="h5">Change Password</p>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Current Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="cupassword" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="npassword" required>
                </div>  
             
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Address</label>
                    <input type="address" class="form-control" id="exampleInputPassword1" name="address" value="<?php echo $rows['address'];?>">
                </div> 
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Phone Number</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="phone" value="<?php echo $rows['phone'];?>">
                </div>          
             
                <button type="submit" class="btn btn-primary" name="user_detail">Update</button>
            </form>
           
          <?php }}}else{
            header("Location: ulogin.php");
        }?>
            
            
        </div>

    </body>
</html>
