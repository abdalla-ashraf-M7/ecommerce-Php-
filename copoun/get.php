<?php
include "../connect.php";

$name = filterRequest("name");
$now=date("Y-m-d H:i:s");

$count=getData("copoun","copoun_name='$name' AND copoun_count>0 AND copoun_expire>'$now'");
