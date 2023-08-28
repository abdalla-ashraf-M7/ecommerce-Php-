<?php
include "../../connect.php";

$orderid=filterRequest("orderid");
$userid= filterRequest("userid");
$ordertype= filterRequest("ordertype");

if($ordertype=="1"){
    $data=array(
    "orders_status"=>2
);

}else{
    $data=array(
    "orders_status"=>4
);
}

$count=updateData("orders",$data,"orders_id=$orderid AND orders_status=1");

if($count>0){
    if($ordertype=="1"){
        NotifySaveSend($userid,"Congrats","Your order is prepared and now it is the delivery turn","users$userid","none","myorders"); 

        sendGCM("Warning","There is an order waiting approval","delivery","none","none","2");
    }else{
        NotifySaveSend($userid,"Congrats","Your order is prepared So don't be late","users$userid","none","myorders"); 
    }
}
