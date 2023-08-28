<?php
include "../../connect.php";

$email=filterRequest("email");
$password=sha1($_POST["password"]);
$newverifycode= rand(10000,99999);

$count=getData("delivery","delivery_email=? AND delivery_password=?",array($email,$password),false);
if($count>0){

    $count2=getData("delivery","delivery_email=? AND delivery_password=? AND delivery_approve=1",array($email,$password),true,"mail and password and approve","xapprove",);

    if($count2>0)
    {
    }
    else
    {
        $data = array("delivery_verifycode" => $newverifycode) ; 
        updateData("delivery" , $data , "delivery_email = '$email'",false);
        //sendEmail($email,"hi","new verification code is $newverifycode");        
    }
}else{printFailure("xwrong");}
