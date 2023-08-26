<?php
include "../connect.php";

$userid = filterRequest("userid");
$addressid = filterRequest("addressid");
$ordertype = filterRequest("ordertype");
$paymentmethod = filterRequest("paymentmethod");
$price = filterRequest("price");
$dileveryprice = filterRequest("dileveryprice");
$copounid = filterRequest("copounid");
$copoundiscount = filterRequest("copoundiscount");

$totalprice=$price+$dileveryprice;

//check Copoun
$now =date("Y-m-d H:i:s");
$checkCopoun = getData("copoun","copoun_id='$copounid' AND copoun_expire > '$now' AND copoun_count>0",null,false);

if($checkCopoun>0){
$totalprice=$totalprice-($price*$copoundiscount/100);
$statement=$con->prepare("UPDATE `copoun` SET `copoun_count`=`copoun_count`-1 WHERE `copoun_id`=$copounid");
$statement->execute();
}

$data=array(
    "orders_user"=> $userid ,
    "orders_addres"=> $addressid ,
    "orders_type"=> $ordertype,
    "orders_paymentmethod"=> $paymentmethod,
    "orders_price"=> $price,
    "orders_dileveryprice"=> $dileveryprice,
    "orders_totalprice"=>$totalprice,
    "orders_copoun"=> $copounid,
    
);
$count=insertData("orders",$data,false);

if($count>0){
    $statement=$con->prepare("SELECT MAX(orders_id) FROM orders");
    $statement->execute();
    $maxid=$statement->fetchColumn();

    $data=array("cart_order"=>$maxid);
    updateData("cart",$data,"cart_users =$userid AND cart_order = 0");
}
