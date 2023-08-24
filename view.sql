CREATE or REPLACE VIEW items1view AS
SELECT items.* ,cats.* FROM items
INNER JOIN cats ON items.items_cats =cats.cats_id


SELECT items1view.*,1 as favs FROM items1view
INNER JOIN fav ON fav.fav_items = items1view.items_id AND fav.fav_users=66
UNION All
SELECT * ,0 as favs FROM items1view 
WHERE items_id NOT IN(SELECT items1view.items_id FROM items1view 
                        INNER JOIN fav ON fav.fav_items=items1view.items_id AND fav.fav_users=66)



CREATE OR REPLACE VIEW myfav AS
SELECT fav.* , items.*,users.users_id FROM fav
INNER JOIN items ON items.items_id = fav.fav_items
INNER JOIN users ON users.users_id = fav.fav_users

CREATE OR REPLACE VIEW cartview as
SELECT SUM(items.items_price) as itemprice,SUM(items.items_price-(items.items_price*items.items_discount/100)) as itempriceafterdiscount ,COUNT(cart.cart_id) as itemcount, cart.*,items.* FROM cart 
INNER JOIN items ON items.items_id = cart.cart_items
GROUP BY cart.cart_users , cart.cart_items