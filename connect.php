<?php

include "functions.php";
//if you want to use serverhost
$dsn = "mysql:host=sql309.infinityfree.com;dbname=if0_34810762_ecommerce";
$user = "if0_34810762";
$password = "HPvfZZrBSXRtYIj";

//if you want to use localhost 
//$dsn = "mysql:localhost;dbname=ecommerce";
//$user = "root";
//$password = "";

$option = array(
   PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"
);
$countrowinpage = 9;
try {
   $connect = new PDO($dsn, $user, $password, $option);
   $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   header("Access-Control-Allow-Origin: *");
   header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, Access-Control-Allow-Origin");
   header("Access-Control-Allow-Methods: POST, OPTIONS , GET");
  
   if (!isset($notAuth)) {
      // checkAuthenticate();
   }
} catch (PDOException $e) {
   echo $e->getMessage();
}
