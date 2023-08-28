<?php
include "../../connect.php";

$email  = filterRequest("email") ; 
$newpassword=sha1($_POST["password"]);

$statement=$con->prepare("SELECT * FROM `delivery` WHERE `delivery_password`=? AND `delivery_email`=?");
$statement->execute(array($newpassword,$email));
$count=$statement->rowCount();
if($count>0){
    printFailure("same old password");
}else{
     $data = array("delivery_password" => $newpassword) ; 
    updateData("delivery" , $data , "delivery_email = '$email'");
}
   
{

}
?>
