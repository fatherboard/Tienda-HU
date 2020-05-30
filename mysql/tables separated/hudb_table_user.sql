
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
