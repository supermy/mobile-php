<?php
$arr = array
       (
          'Name'=>'Peter',
          'Age'=>20
       );

$jsonencode = json_encode($arr);
echo $jsonencode;

$var = '{"Name":"Peter","Age":20}';
$jsondecode = json_decode($var);
print_r($jsondecode);


$var = '{"Name":"Peter","Age":20}';
$jsondecode = json_decode($var,true);
print_r($jsondecode);
?>
