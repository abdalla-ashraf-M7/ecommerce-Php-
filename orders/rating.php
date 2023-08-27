<?php
include "../connect.php";

$orderid =filterRequest("orderid");
$rating =filterRequest("rating");
$comment =filterRequest("comment");

$data = array(
    "orders_rating"=>$rating,
    "orders_comment"=>$comment,
);
updateData("orders",$data,"orders_id='$orderid'");