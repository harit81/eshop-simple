<?php
//$cars=array
//  (
//  array("Volvo",100,96),
//  array("BMW",60,59),
//  array("Toyota",110,100)
//  );
//echo $cars[0][0],' ',$cars[0][1],' ',$cars[0][2];
//echo '<br>';
//echo $cars[1][0],' ',$cars[1][1],' ',$cars[1][2];
//echo '<br>';
//echo $cars[2][0],' ',$cars[2][1],' ',$cars[2][2];
//echo '<br>';
//$cars2=array('valvo','bmw','toyota');
//print_r(array_change_key_case($cars2,CASE_UPPER));
//
//$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
//print_r(array_change_key_case($age,CASE_UPPER));
//print_r(array_change_key_case($age,CASE_LOWER));
//$a = array(
//  array(
//    'id' => 5698,
//    'first_name' => 'Peter',
//    'last_name' => 'Griffin',
//  ),
//  array(
//    'id' => 4767,
//    'first_name' => 'Ben',
//    'last_name' => 'Smith',
//  ),
//  array(
//    'id' => 3809,
//    'first_name' => 'Joe',
//    'last_name' => 'Doe',
//  )
//);
//
//$last_names = array_column($a, 'last_name', 'id');
//print_r($last_names);
//$a=array(
//    array(
//        'id' => 134,
//        'firstName' => 'a',
//        'lastName' => 'b'
//    ),array(
//        'id' => 256,
//        'firstName' => 'b',
//        'lastName' => 'c'
//    )
//    ,array(
//        'id' => 352,
//        'firstName' => 'c',
//        'lastName' => 'd'
//    )
//);
//$c= array_column($a, 'firstName','id');
//print_r($c);
$fname=array("Peter","Ben","Joe");
$age=array("35","37","43");
$lname=array("xyz","abc","qes");
$c=array_combine($fname,$lname);
print_r($c);



















?>