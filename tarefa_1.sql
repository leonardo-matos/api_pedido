show create table pedido;

CREATE TABLE `pedido` (
   `order_id` int(11) NOT NULL,
   `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
   `product_sku` varchar(12) NOT NULL,
   `size` varchar(2) NOT NULL,
   `color` varchar(50) DEFAULT NULL,
   `quantity` tinyint(4) NOT NULL,
   `price` float NOT NULL
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4