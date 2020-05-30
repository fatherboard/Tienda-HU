
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
