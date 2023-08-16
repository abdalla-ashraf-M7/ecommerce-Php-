<?php
include "../connect.php";

$email  = filterRequest("email") ; 
$newverifycode= rand(10000,99999);

$stmt = $con->prepare("SELECT * FROM users WHERE users_email =?") ; 

$stmt->execute(array ($email)) ; 

$count = $stmt->rowCount() ; 

result($count,"Email Found","Email Not Found");

if ($count > 0) {
    $data = array("users_verifycode" => $newverifycode) ; 
    updateData("users" , $data , "users_email = '$email'",false);
    sendEmail($email,"hi","new verification code is $newverifycode");
}


?>
