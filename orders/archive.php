<?php
include "../connect.php";

$userid=filterRequest("userid");
getAllData("orderview","orders_user='$userid' AND orders_status=4");