
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
