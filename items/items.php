<?php
include "../connect.php";
 //getAllData("itemsview",null,null,true);
$userid=filterRequest("userid");

$statement=$con->prepare("SELECT items1view.*,1 as favs FROM items1view
INNER JOIN fav ON fav.fav_items = items1view.items_id AND fav.fav_users=?
UNION All
SELECT * ,0 as favs FROM items1view 
WHERE items_id NOT IN(SELECT items1view.items_id FROM items1view 
                        INNER JOIN fav ON fav.fav_items=items1view.items_id AND fav.fav_users=?)");
$statement->execute(array($userid,$userid));
$data=$statement->fetchAll(PDO::FETCH_ASSOC);
$count=$statement->rowCount();

if($count>0){
    echo json_encode(array("status"=>"success","data"=>$data));
}else{
    echo json_encode(array("status"=>"failure"));
    
}

