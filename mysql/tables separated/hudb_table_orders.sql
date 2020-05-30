
-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `subtotal` decimal(50,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user`, `subtotal`, `date`) VALUES
(5, 6, '65.98', '2020-05-30 22:59:48'),
(6, 6, '35.98', '2020-05-30 23:00:08'),
(7, 7, '81.98', '2020-05-30 23:02:39'),
(8, 8, '49.99', '2020-05-30 23:06:16'),
(9, 8, '111.98', '2020-05-30 23:06:23'),
(10, 8, '51.97', '2020-05-30 23:06:34');
