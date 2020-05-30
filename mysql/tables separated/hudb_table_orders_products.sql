
-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item` int(11) DEFAULT NULL,
  `price` decimal(50,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `item`, `price`) VALUES
(11, 5, 1, '49.99'),
(12, 5, 6, '15.99'),
(13, 6, 4, '25.99'),
(14, 6, 5, '9.99'),
(15, 7, 3, '55.99'),
(16, 7, 4, '25.99'),
(17, 8, 1, '49.99'),
(18, 9, 2, '55.99'),
(19, 9, 3, '55.99'),
(20, 10, 4, '25.99'),
(21, 10, 5, '9.99'),
(22, 10, 6, '15.99');
