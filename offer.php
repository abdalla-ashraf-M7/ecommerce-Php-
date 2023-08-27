<?php
include "connect.php";

$statement=$con->prepare("SELECT items1view.*,1 as favs, items_price - (items_price * items_discount /100) as priceafterdiscount FROM items1view
INNER JOIN fav ON fav.fav_items = items1view.items_id 
WHERE items_discount!=0
UNION All
SELECT * ,0 as favs, items_price - (items_price * items_discount /100) as priceafterdiscount FROM items1view 
WHERE items_discount!=0 AND items_id NOT IN(SELECT items1view.items_id FROM items1view 
                        INNER JOIN fav ON fav.fav_items=items1view.items_id)");
$statement->execute();
$data=$statement->fetchAll(PDO::FETCH_ASSOC);
$count=$statement->rowCount();

if($count>0){
    echo json_encode(array("status"=>"success","data"=>$data));
}else{
    echo json_encode(array("status"=>"failure"));
    
}

