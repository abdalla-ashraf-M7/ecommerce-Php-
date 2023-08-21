<?php
include "../connect.php";

$newverifycode= rand(10000,99999);
$email=filterRequest("email");

$data = array("users_verifycode" => $newverifycode) ; 
updateData("users" , $data , "users_email = '$email'");