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
       <?php include 'header.php';?>
    </head>
    <body>
   
        <div class="container">
            <p class="h3" style="margin-top:20px;">User Login</p>
            <form name="user_register" action="user_data_check.php" method="POST">
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">User Name</label>
                    <input type="name" class="form-control" id="exampleInputName" aria-describedby="nameHelp" name="user_name" required="required">
                 
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required="required">
                </div>
             
                <button type="submit" class="btn btn-primary" name="user_login_detail">Submit</button>
            </form>
        </div>
    </body>
</html>
