<?php
include "../connect.php";

$userid= filterRequest("userid");
$itemid= filterRequest("itemid");

$count = getData("cart","cart_users=$userid AND cart_items=$itemid AND cart_order=0",null,false);

$data= array(
    "cart_users"=>$userid,
    "cart_items"=>$itemid,
);

insertData("cart",$data);