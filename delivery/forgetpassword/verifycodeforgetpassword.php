<?php
include "../../connect.php";

$email  = filterRequest("email") ; 
$verfiy = filterRequest("verifycode") ; 


$stmt = $con->prepare("SELECT * FROM delivery WHERE delivery_email =?  AND delivery_verifycode = ? ") ; 
$stmt->execute(array ($email,$verfiy)) ; 
$count = $stmt->rowCount() ;

if($count>0){

$stmt2 = $con->prepare("SELECT * FROM delivery WHERE `delivery_email` =?  AND `delivery_approve` = 0 ") ; 
$stmt2->execute(array ($email)) ; 
$count2 = $stmt2->rowCount() ; 

if($count2>0){
    $data = array("delivery_approve" => "1") ; 
    updateData("delivery" , $data , "delivery_email = '$email'",false);
    printSuccess("Verification code is correct and now approve");
}else{
    printSuccess("Verification code is correct and already approved");

}
}  else{
    printFailure("Verifycode is not correct");
} 

?>


