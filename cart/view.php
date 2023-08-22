<?php
include "../connect.php";

$userid = filterRequest("userid");

$data= getAllData2("cartview","cart_users=$userid",null,false);

$statement=$con->prepare("SELECT SUM(cartview.itemprice) as totalprice , SUM(cartview.itemcount) as totalcount FROM cartview WHERE cartview.cart_users =$userid
GROUP BY cartview.cart_users");
$statement->execute();
$datacountprice=$statement->fetch(PDO::FETCH_ASSOC);

echo json_encode(array(
    "status"=>"success",
    "data"=>$data,
    "countprice"=>$datacountprice
));