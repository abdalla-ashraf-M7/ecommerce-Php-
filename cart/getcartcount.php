<?php
include "../connect.php";

$userid = filterRequest("userid");
$itemid = filterRequest("itemid");

$statement=$con->prepare("SELECT COUNT(cart_id) as cartcount FROM cart 
WHERE cart.cart_users=? AND cart.cart_items=? AND cart_order=0");
$statement->execute(array($userid,$itemid));
$count=$statement->rowCount();

$cartcount=$statement->fetchColumn();

if($count>0){
    echo json_encode(array("status"=>"success","count"=>$cartcount));
}else{
    echo json_encode(array("status"=>"failure","count"=>'0'));
}