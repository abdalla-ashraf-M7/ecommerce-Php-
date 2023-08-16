<?php
include "../connect.php";

$email  = filterRequest("email") ; 
$newpassword=sha1($_POST["password"]);

$statement=$con->prepare("SELECT * FROM `users` WHERE `users_password`=? AND `users_email`=?");
$statement->execute(array($newpassword,$email));
$count=$statement->rowCount();
if($count>0){
    printFailure("same old password");
}else{
     $data = array("users_password" => $newpassword) ; 
    updateData("users" , $data , "users_email = '$email'");
}
   
{

}
?>
