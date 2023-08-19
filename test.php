<?php
include "connect.php";

$alldata = array();

$alldata['status'] = "success";
$cats= getAllData("cats",null,null,false);
$cats=json_decode($cats,true);
if($cats["status"]=="success"){
    $alldata['cats']=$cats['data'];
    echo json_encode($alldata);
}else{
    printFailure("something worng");
}


