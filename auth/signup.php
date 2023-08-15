<?php
include "../connect.php";

$username=filterRequest("username");
$email=filterRequest("email");
$password=sha1($_POST["password"]);

$phone=filterRequest("phone");
$verifycode= rand(10000,99999);

$statement=$con->prepare("SELECT * FROM `users` WHERE `users_email` =? OR `users_phone` =?");
$statement->execute(array($email,$phone));
$count=$statement->rowCount();

if ($count>0) {
    printFailure("Phone or Email has already used");
}else {
    $table= 'users';
    $data = array(
        "users_name" =>$username ,
        "users_email" => $email,
        "users_phone" => $phone,    
        "users_password" => $password,

        "users_verifycode" => $verifycode ,
    );
sendEmail($email,"hi","verification code is $verifycode");
        insertData($table, $data);
}
