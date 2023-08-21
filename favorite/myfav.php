<?php
include "../connect.php";

$userid=filterRequest("userid");
getAllData('myfav',"fav_users=?",array($userid),true,"success",'fail');