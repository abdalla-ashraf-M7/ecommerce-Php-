<?php
include "connect.php";

$email=filterRequest("email");
$password=sha1($_POST["password"]);


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
        printFailure("You need to verify you email first");
    }
}else{printFailure("email or password is wrong");}

//result($count,"Email and password are correct","Email or Password is Wrong");
