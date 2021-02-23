1)
select user.u_id,user.u_name,user.address,
product.p_id,product.p_name,product.p_price
FROM
cart INNER JOIN user ON cart.u_id=user.u_id
INNER JOIN product on cart.p_id=product.p_id;

2)
select user.u_id,user.u_name,user.address,
product.p_id,product.p_name,product.p_price
FROM
cart INNER JOIN user ON cart.u_id=user.u_id
INNER JOIN product on cart.p_id=product.p_id WHERE user.u_id=4


select user.u_id,order_detail.o_id FROM order_detail INNER JOIN user ON user.u_id=order_detail.u_id
SELECT order_detail.o_id,order_product.product_id FROM order_product INNER JOIN order_detail ON order_detail.o_id=order_product.order_id



select user.u_id,order_detail.o_id,order_detail.o_date,order_product.product_id,order_product.product_name,order_product.product_price
From 
order_product INNER JOIN order_detail ON order_product.order_id=order_detail.o_id
INNER JOIN user ON order_detail.u_id=user.u_id;
 where u_name=''


DELETE FROM cart
WHERE p_id = 21
ORDER BY cart_id DESC
LIMIT 1


select user.u_id,user.u_name,cart.cart_id,product.p_id,product.p_name,product.p_price
FROM 
cart INNER JOIN product ON cart.p_id=product.p_id
INNER JOIN user ON cart.u_id=user.u_id


select user.u_id,user.u_name,cart.cart_id,product.p_id,product.p_name,SUM(p_price)
FROM 
cart INNER JOIN product ON cart.p_id=product.p_id
INNER JOIN user ON cart.u_id=user.u_id WHERE u_name='Monday'



select user.u_id,user.u_name,COUNT(*),product.p_id,product.p_name,SUM(p_price)
FROM 
cart INNER JOIN product ON cart.p_id=product.p_id
INNER JOIN user ON cart.u_id=user.u_id WHERE u_name='Monday'


select COUNT(*),SUM(p_price)
FROM 
cart INNER JOIN product ON cart.p_id=product.p_id
INNER JOIN user ON cart.u_id=user.u_id WHERE u_name='Monday'

select COUNT(*),SUM(product_price)
FROM 
order_product INNER JOIN order_detail.o_id=order_product.order_id;


select user.u_id,order_detail.o_id,order_detail.o_date,order_product.product_id,order_product.product_name,order_product.product_price
From 
order_product INNER JOIN order_detail ON order_product.order_id=order_detail.o_id
INNER JOIN user ON order_detail.u_id=user.u_id ORDER BY user.u_id



SELECT user.u_id,order_detail.o_id
FROM order_detail INNER JOIN user ON order_detail.u_id=user.u_id


SELECT user.u_id,user.u_name,order_detail.o_id,order_detail.o_address,order_detail.o_date
FROM order_detail INNER JOIN user ON order_detail.u_id=user.u_id


SELECT user.u_id,user.u_name,order_detail.o_id,order_detail.o_address,order_detail.o_date,order_product.quantity
FROM order_detail INNER JOIN user ON order_detail.u_id=user.u_id
INNER JOIN order_product ON order_detail.o_id=order_product.order_id





SELECT user.u_id,user.u_name,order_detail.o_id,order_detail.o_address,order_detail.o_date,order_product.quantity
FROM 
order_detail INNER JOIN user ON order_detail.u_id=user.u_id
INNER JOIN order_product ON order_detail.o_id=order_product.order_id


SELECT user.u_id,user.u_name,order_detail.o_id,order_detail.o_address,order_detail.o_date,order_product.quantity
FROM order_detail INNER JOIN user ON order_detail.u_id=user.u_id
INNER JOIN order_product ON order_detail.o_id=order_product.order_id where product_id=33 


SELECT user.u_id,user.u_name,order_detail.o_id,order_detail.o_address
FROM 
user INNER JOIN order_detail ON user.u_id=order_detail.u_id

SELECT user.u_id,user.u_name,order_detail.o_id,order_detail.o_address,order_product.quantity,order_product.product_price
FROM 
user INNER JOIN order_detail ON user.u_id=order_detail.u_id
INNER JOIN order_product ON order_product.order_id=order_detail.o_id;








select COUNT(*),SUM(product_price)
FROM 
order_product WHERE order_id=100

select DISTINCT(order_id) FROM order_product


select product.p_id,product.p_stock,cart.p_id,order_product.product_id
FROM 
product INNNER JOIN cart ON product.p_id=cart.p_id
INNER JOIN order_product ON cart.p_id=order_product.product_id ;

select product.p_id,cart.cart_id FROM product INNER JOIN cart ON product.p_id=cart.p_id




select product.p_id,cart.cart_id,order_product.order_id
FROM 
product INNER JOIN cart ON product.p_id=cart.p_id
INNER JOIN order_product ON cart.p_id=order_product.product_id


select product.p_id,cart.p_id,order_product.product_id
FROM 
product INNER JOIN cart ON product.p_id=cart.p_id
INNER JOIN order_product ON cart.p_id=order_product.product_id

select product.p_id,COUNT(cart.p_id),COUNT(order_product.product_id)
FROM 
product INNER JOIN cart ON product.p_id=cart.p_id
INNER JOIN order_product ON cart.p_id=order_product.product_id


select COUNT(*),SUM(product_price),user.u_id,user.u_name,order_detail.o_id
FROM
user INNER JOIN order_detail ON user.u_id=order_detail.u_id
INNER JOIN order_product ON order_detail.o_id=order_product.order_id



select user.u_id,order_detail.o_id,order_detail.o_date,order_product.order_id,SUM(order_product.product_price),
                        SUM(order_product.quantity) From order_product INNER JOIN order_detail ON order_product.order_id=order_detail.o_id
INNER JOIN user ON order_detail.u_id=user.u_id where order_product.order_id=152