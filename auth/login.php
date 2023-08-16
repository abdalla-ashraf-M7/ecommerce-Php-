<?php
include "../connect.php";

$email=filterRequest("email");
$password=sha1($_POST["password"]);
$newverifycode= rand(10000,99999);



$statement=$con->prepare("SELECT * FROM `users` WHERE `users_email`=? AND `users_password`=?");
$statement->execute(array($email,$password));
$count=$statement->rowCount();
if($count>0){
    $statement2=$con->prepare("SELECT * FROM `users` WHERE `users_email`=? AND `users_password`=? AND `users_approve`=1");
    $statement2->execute(array($email,$password));
    $count2=$statement2->rowCount();
    
    if($count2>0){
        printSuccess("email and password and approve");
    }
    else{
        $data = array("users_verifycode" => $newverifycode) ; 
        updateData("users" , $data , "users_email = '$email'",false);
        sendEmail($email,"hi","new verification code is $newverifycode");
        printFailure("xapprove");
        
    }
}else{printFailure("xwrong");}

