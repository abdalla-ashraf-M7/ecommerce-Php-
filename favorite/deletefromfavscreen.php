<?php
include "../connect.php";
$favid=filterRequest("favid");

deleteData("fav","fav_id=$favid");