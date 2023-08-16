<?php
include "../connect.php";

$email=filterRequest("email");
$password=sha1($_POST["password"]);
$newverifycode= rand(10000,99999);

$count=getData("users","users_email=? AND users_password=?",array($email,$password),false);
if($count>0){

    $count2=getData("users","users_email=? AND users_password=? AND users_approve=1",array($email,$password),true,"mail and password and approve","xapprove");

    if($count2>0)
    {
    }
    else
    {
        $data = array("users_verifycode" => $newverifycode) ; 
        updateData("users" , $data , "users_email = '$email'",false);
        //sendEmail($email,"hi","new verification code is $newverifycode");        
    }
}else{printFailure("xwrong");}
