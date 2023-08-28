<?php
include "../../connect.php";

$orderid=filterRequest("orderid");
getAllData("orderdetailsview","cart_order=$orderid");