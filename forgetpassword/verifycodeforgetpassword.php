<?php
include "../connect.php";

$email  = filterRequest("email") ; 
$verfiy = filterRequest("verifycode") ; 


$stmt = $con->prepare("SELECT * FROM users WHERE users_email =?  AND users_verifycode = ? ") ; 
$stmt->execute(array ($email,$verfiy)) ; 
$count = $stmt->rowCount() ;

if($count>0){

$stmt2 = $con->prepare("SELECT * FROM users WHERE `users_email` =?  AND `users_approve` = 0 ") ; 
$stmt2->execute(array ($email)) ; 
$count2 = $stmt2->rowCount() ; 

if($count2>0){
    $data = array("users_approve" => "1") ; 
    updateData("users" , $data , "users_email = '$email'",false);
    printSuccess("Verification code is correct and now approve");
}else{
    printSuccess("Verification code is correct and already approved");

}
}  else{
    printFailure("Verifycode is not correct");
} 

?>


