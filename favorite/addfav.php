<?php
include "../connect.php";

$userid=filterRequest("userid");
$itemid=filterRequest("itemid");

$data =array("fav_users"=>$userid ,"fav_items"=>$itemid);
insertData('fav',$data);