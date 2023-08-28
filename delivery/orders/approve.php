<?php
include "../../connect.php";

$orderid=filterRequest("orderid");
$userid= filterRequest("userid");
$deliveryid= filterRequest("deliveryid");

$data=array(
    "orders_status"=>3,
    "orders_delivery"=>$deliveryid
);
$count=updateData("orders",$data,"orders_id=$orderid AND orders_status=2");

if($count>0){
    NotifySaveSend($userid,"Congrats","The delivery got your order now and  he is on the way","users$userid","none","myorders");

    sendGCM("News","The order has been  approved by delivery you admin $deliveryid","admin","none","none");
    
    sendGCM("News","The order has been  approved by delivery $deliveryid","delivery","none","none","2");
}
