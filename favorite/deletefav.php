<?php
include "../connect.php";
$userid=filterRequest("userid");
$itemid=filterRequest("itemid");

deleteData("fav","fav_users = $userid AND fav_items=$itemid");