<?php
include "../connect.php";

$username=security("username");
$email=security("email");
$password=sha1(security("password"));
$phone=security("phone");
$verifycode="0";

$statement=$connect->prepare("SELECT * FROM `users` WHERE `users_email` =? OR `users_phone` =?");
$statement->execute(array($email,$phone));
$count=$statement->rowCount();

if ($count>0) {
    printfailed("Phone or Email has already used");
}else {
    $table= 'users';
    $data = array(
        "users_name" =>$username ,
        "users_email" => $email,
        "users_password" => $password,
        "users_phone" => $phone,
        "users_verifycode" =>"0" ,
    );
        insertData($table, $data);

      
}
