<?php
include "../../connect.php";

$newverifycode= rand(10000,99999);
$email=filterRequest("email");

$data = array("delivery_verifycode" => $newverifycode) ; 
updateData("delivery" , $data , "delivery_email = '$email'");