<?php
include "../connect.php";
$search= filterRequest("search");

getAllData("items1view","items1view.items_name LIKE '%$search%' OR items1view.items_name_ar LIKE '%$search%' OR items1view.cats_name LIKE '%$search%' OR items1view.cats_name_ar LIKE '%$search%' ");
