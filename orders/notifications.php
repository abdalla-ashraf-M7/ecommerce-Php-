<?php
include "../connect.php";

$userid= filterRequest("userid");

getAllData("notifications","notifications_user='$userid' ORDER BY notifications_id ASC");