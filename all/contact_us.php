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
        <div class="container-fluid" style="max-width: 80%;">
        <p class="h1" style="margin-top:50px;text-align: center;font-size: 100px;">Contact Us</p>
        <form name="f5" action="contact_db.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Your Name*</label>
                <input type="name" class="form-control" id="exampleInputName" aria-describedby="nameHelp" name="uname" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Your Email*</label>
                <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" name="uemail" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Contact No</label>
                <input type="number" class="form-control" id="exampleInputNumber" aria-describedby="numberHelp" name="phoneno" >
            </div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Your Message*</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message" required></textarea>
</div>
            <button type="submit" class="btn btn-primary" name="contact_detail">Submit</button>
        </form>
        </div>
    </body>
</html>
