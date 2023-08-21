<?php
include "connect.php";

$alldata = array();

$alldata['status'] = "success";

$cats= getAllData("cats",null,null,false);
$cats=json_decode($cats,true);

$items= getAllData("items1view","items_discount!=0",null,false);
$items=json_decode($items,true);

if($cats["status"]=="success"){
    $alldata['cats']=$cats['data'];
    if($items["status"]=="success"){
        $alldata['items']=$items['data'];
    }else{
        printFailure("something worng with items");
    }
    echo json_encode($alldata);
}else{
    printFailure("something worng with categories");
} 