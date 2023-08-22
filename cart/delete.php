<?php
include "../connect.php";

$userid = filterRequest("userid");
$itemid = filterRequest("itemid");

deleteData("cart","cart_id=(SELECT cart_id FROM cart WHERE cart_users=$userid AND cart_items=$itemid LIMIT 1)");