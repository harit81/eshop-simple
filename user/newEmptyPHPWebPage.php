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
    </head>
    <body>
        <?php
//        $i = 0;
//        for ($i = 1; $i <= 14; $i++) {
//
//            if ($i % 2 != 0) {
//
//                echo '<br>  ', $i;
//            }else{
//                 echo  ' ',$i;
//            }
//        }
//        
//        echo '<br>';
//        for($b=1;$b<=14;$b++){
//            if($b%2!=0){
//                echo ' ',$b;
//            }
//        }echo '<br>';
//        for($a=1;$a<=14;$a++){
//            if($a%2==0){
//                echo ' ',$a;
//            }
//        }
        for ($i = 1; $i < 20; $i++) {
          
            do {
               
                echo ' ', $i;
            } while ($i < 0);
            echo ' ', $i;
        }
        ?>
    </body>
</html>
