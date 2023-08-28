<?php
include "connect.php";

$alldata = array();

$alldata['status'] = "success";

$cats= getAllData("cats",null,null,false);
$cats=json_decode($cats,true);

$items= getAllData("topselling","1=1",null,false);
$items=json_decode($items,true); 

$text= getData("text","1=1",null,false,"none","none",true);
//$text=json_decode($text,true);//here it will return an array so we don't need to decode it

if($cats["status"]=="success"){
    $alldata['cats']=$cats['data'];
    if($text["status"]=="success"){
        $alldata['text']=$text['data'];
    }else{
        printFailure("somthing wrong with text");
    }
    if($items["status"]=="success"){
        $alldata['items']=$items['data'];
    }else{
        //printFailure("something worng with items");
        $items= getAllData("items1view","items_discount !=0",null,false);
        $items=json_decode($items,true);
        $alldata['items']=$items['data'];
    }
    echo json_encode($alldata);
}else{
    printFailure("something worng with categories");
} 