<?php

include "functions.php";

//connect 000webhost
$dsn = "mysql:host=localhost;dbname=id21141776_ecommerce";
$user = "id21141776_database_ecommerce";
$pass = "Database_ecommerce1";

//if you want to use serverhost
// $dsn = "mysql:host=sql309.infinityfree.com;dbname=if0_34810762_ecommerce";
// $user = "if0_34810762";
// $password = "HPvfZZrBSXRtYIj";

//if you want to use localhost 
// $dsn = "mysql:host=localhost;dbname=ecommerce";
// $user = "root";
// $pass = "";

$option = array(
   PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"
);
$countrowinpage = 9;
try {
   $con = new PDO($dsn, $user, $pass, $option);
   $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   header("Access-Control-Allow-Origin: *");
   header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, Access-Control-Allow-Origin");
   header("Access-Control-Allow-Methods: POST, OPTIONS , GET");
  
   if (!isset($notAuth)) {
      // checkAuthenticate();
   }
} catch (PDOException $e) {
   echo $e->getMessage();
}
