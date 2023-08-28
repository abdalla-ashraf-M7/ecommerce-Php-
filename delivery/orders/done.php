<?php
include "../../connect.php";

$orderid=filterRequest("orderid");
$userid= filterRequest("userid");
$deliveryid= filterRequest("deliveryid");

$data=array(
    "orders_status"=>4
);
$count=updateData("orders",$data,"orders_id=$orderid AND orders_status=3");

if($count>0){
    NotifySaveSend($userid,"Congrats","Your order has been deliverd","users$userid","none","myorders");

    sendGCM("News","The order has been  deliverd by delivery $deliveryid to the customer $userid","admin","none","none");
    
    
}
