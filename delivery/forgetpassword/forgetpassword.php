<?php
include "../../connect.php";

$email  = filterRequest("email") ; 
$newverifycode= rand(10000,99999);

$stmt = $con->prepare("SELECT * FROM delivery WHERE delivery_email =?") ; 

$stmt->execute(array ($email)) ; 

$count = $stmt->rowCount() ; 

result($count,"Email Found","Email Not Found");

if ($count > 0) {
    $data = array("delivery_verifycode" => $newverifycode) ; 
    updateData("delivery" , $data , "delivery_email = '$email'",false);
   // sendEmail($email,"hi","new verification code is $newverifycode");
}


?>
