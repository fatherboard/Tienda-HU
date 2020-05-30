-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2020 at 01:10 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hudb`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user`, `content`, `date`) VALUES
(4, 7, 'Hola buenas, hace unos días me compré la Camiseta Oficial hu - L, pero me llegó una M.\r\nEl número de mi pedido es el 7.\r\nEspero respuesta, gracias.', '2020-05-30 23:04:39'),
(5, 8, 'Hola! Me gusta un montón vuestra marca y os quería dar mi apoyo.\r\nUn saludo!', '2020-05-30 23:07:34');

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

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(50,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`) VALUES
(1, 'Skate Deck hu', 'La tabla de skate que lo empezó todo, compuesta de 8 láminas de madera de arce y hecha con las mejores tecnologías de hoy en día.', '49.99'),
(2, 'Skate Deck hu - Azul', 'La tabla de skate que lo empezó todo, esta vez en azul! Compuesta de 8 láminas de madera de arce y hecha con las mejores tecnologías de hoy en día.', '55.99'),
(3, 'Skate Deck hu - Amarillo', 'La tabla de skate que lo empezó todo en color amarillo! Compuesta de 8 láminas de madera de arce y hecha con las mejores tecnologías de hoy en día.', '55.99'),
(4, 'Camiseta Oficial hu - L', '¡Luce con orgullo la camiseta de tu marca de skate favorita, hu!', '25.99'),
(5, 'Toalla Oficial hu', 'Después de una larga sesión de skate siempre viene bien quitarse el sudor de manera rápida, así que aquí tienes, una toalla.', '9.99'),
(6, 'Herramienta skate hu', 'Si necesitas ajustar los tornillos de tu tabla necesitarás herramientas. Con esta no necesitarás nada más, solo darle a la manivela.', '15.99');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `username`, `name`, `address`) VALUES
(6, 'hugo@hugo.com', '$2y$10$qqyQhAK/FfyrcaDh/nJ9eeH9K.9Z0ebeOUCb/wNctn.gsvWqrnYlS', 'hugo', 'Hugo Ribeiro', 'Calle de Atocha 1 Madrid España'),
(7, 'jaime@kaime.com', '$2y$10$BRboyeDE06vCgPqSwTBJqu1/Oiqm0HEn3AZYQVGcku310/OKh3eLG', 'legolas', 'Jaime Jiménez', 'Avenida de España 2 Alcobendas España'),
(8, 'paco@paco.com', '$2y$10$Kvz2NshrnNZL1cCKKXSGX.gJZ42NhBu4WItnIZPeUABP0.TD0.a4q', 'pacman21', 'Paco Gonzalo', 'Calle Inventada 3 Barcelona España');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`) USING BTREE,
  ADD KEY `item` (`item`) USING BTREE,
  ADD KEY `price` (`price`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `orders_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_products_ibfk_2` FOREIGN KEY (`item`) REFERENCES `products` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
