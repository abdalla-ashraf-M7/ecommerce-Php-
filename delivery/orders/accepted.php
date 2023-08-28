<?php
include "../../connect.php";

$deliveryid=filterRequest("deliveryid");

getAllData("orderview","orders_status=3 AND orders_delivery='$deliveryid'");