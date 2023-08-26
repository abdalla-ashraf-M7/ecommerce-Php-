<?php
include "../../connect.php";

$orderid=filterRequest("orderid");
$userid= filterRequest("userid");

$data=array(
    "orders_status"=>1
);
$count=updateData("orders",$data,"orders_id=$orderid AND orders_status=0");

if($count>0){
    NotifySaveSend($userid,"Congrats","You Win!!!!!","users$userid","none","myorders");
}
