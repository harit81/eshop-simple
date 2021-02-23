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
            <p class="h3" style="margin-top:20px;">User Registration</p>
            <form name="user_register" action="user_data_submit.php" method="POST">
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">User Name</label>
                    <input type="name" class="form-control" id="exampleInputName" aria-describedby="nameHelp" name="user_name" required="required">
                    <div id="nameHelp" class="form-text">We'll never share your details with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">User Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user_email" required="required">

                </div>        
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required="required">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="cpassword" required="required">
                </div>  
                
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Address</label>
                    <input type="address" class="form-control" id="exampleInputPassword1" name="address">
                </div> 
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Phone Number</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="phone" required="required">
                </div>          
             
                <button type="submit" class="btn btn-primary" name="user_detail">Submit</button>
            </form>
        </div>
    </body>
</html>
