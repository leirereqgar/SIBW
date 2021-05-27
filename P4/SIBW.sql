-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 27, 2021 at 08:41 PM
-- Server version: 10.5.10-MariaDB
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SIBW`
--

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `texto_comentario` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `editado` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_evento`, `id_usuario`, `fecha`, `texto_comentario`, `editado`) VALUES
(7, 1, 5, '2021-05-27', 'dd ', NULL),
(8, 1, 5, '2021-05-27', 'comentario de prueba', NULL),
(9, 1, 5, '2021-05-27', 'comentario de prueba', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'NombreEvento',
  `organizacion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'OrganizaciónEvento',
  `fecha` date DEFAULT current_timestamp(),
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'img/placeholder_logo.jpg',
  `imagen1` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'img/placeholder.png',
  `imagen2` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'img/placeholder.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`id`, `nombre`, `organizacion`, `fecha`, `descripcion`, `logo`, `imagen1`, `imagen2`) VALUES
(1, 'Dia Joven Vara de Rey', 'Organización Juvenil Omega', '2021-07-31', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu commodo nulla, sed tristique leo. Pellentesque condimentum leo ut eros pellentesque, a lacinia lectus pellentesque. Etiam sed tincidunt elit, sit amet pellentesque purus. Etiam pulvinar nec lacus vel vestibulum. Nulla dictum molestie quam iaculis fermentum. Quisque nec lacus eu lectus aliquet pharetra sed in arcu. Morbi sagittis commodo tempor. Aliquam quis semper nisi. Donec at velit lacus. Nunc pellentesque dui dui. Nullam quis auctor elit. Suspendisse porttitor sed lacus nec viverra. Praesent ut enim gravida ex consectetur sodales nec a nibh.\r\n\r\nCras nisl sem, rutrum non sodales faucibus, dapibus sit amet risus. Nullam sollicitudin, elit ut imperdiet sodales, tellus augue ultrices arcu, eu pretium mauris metus eu ante. Curabitur faucibus cursus luctus. Nulla facilisi. Suspendisse libero ante, efficitur in elit ac, dictum pulvinar diam. Nullam nunc massa, tincidunt quis mi ultricies, laoreet interdum magna. Maecenas tempus enim sem, id rhoncus ex lacinia eget. Suspendisse diam leo, aliquam in molestie in, porttitor quis ligula. Fusce eleifend et sapien a vehicula. Suspendisse nec urna eget diam tincidunt ultricies. Fusce ligula turpis, rutrum ac ullamcorper ac, placerat non orci.\r\n\r\n', 'img/omega.png', 'img/espuma.jpg', 'img/plaza.jpg'),
(2, 'Fiestas Patronales Vara de Rey', 'Ayuntamiento Vara de Rey', '2021-08-15', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu commodo nulla, sed tristique leo. Pellentesque condimentum leo ut eros pellentesque, a lacinia lectus pellentesque. Etiam sed tincidunt elit, sit amet pellentesque purus. Etiam pulvinar nec lacus vel vestibulum. Nulla dictum molestie quam iaculis fermentum. Quisque nec lacus eu lectus aliquet pharetra sed in arcu. Morbi sagittis commodo tempor. Aliquam quis semper nisi. Donec at velit lacus. Nunc pellentesque dui dui. Nullam quis auctor elit. Suspendisse porttitor sed lacus nec viverra. Praesent ut enim gravida ex consectetur sodales nec a nibh.\r\n\r\nCras nisl sem, rutrum non sodales faucibus, dapibus sit amet risus. Nullam sollicitudin, elit ut imperdiet sodales, tellus augue ultrices arcu, eu pretium mauris metus eu ante. Curabitur faucibus cursus luctus. Nulla facilisi. Suspendisse libero ante, efficitur in elit ac, dictum pulvinar diam. Nullam nunc massa, tincidunt quis mi ultricies, laoreet interdum magna. Maecenas tempus enim sem, id rhoncus ex lacinia eget. Suspendisse diam leo, aliquam in molestie in, porttitor quis ligula. Fusce eleifend et sapien a vehicula. Suspendisse nec urna eget diam tincidunt ultricies. Fusce ligula turpis, rutrum ac ullamcorper ac, placerat non orci.\r\n\r\n', 'img/evdr.png', 'img/carretillas.jpg', 'img/procesion.jpg'),
(3, 'Fiesta la Marmota', 'Ayuntamiento San Clemente', '2021-07-23', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu commodo nulla, sed tristique leo. Pellentesque condimentum leo ut eros pellentesque, a lacinia lectus pellentesque. Etiam sed tincidunt elit, sit amet pellentesque purus. Etiam pulvinar nec lacus vel vestibulum. Nulla dictum molestie quam iaculis fermentum. Quisque nec lacus eu lectus aliquet pharetra sed in arcu. Morbi sagittis commodo tempor. Aliquam quis semper nisi. Donec at velit lacus. Nunc pellentesque dui dui. Nullam quis auctor elit. Suspendisse porttitor sed lacus nec viverra. Praesent ut enim gravida ex consectetur sodales nec a nibh.\r\n\r\nCras nisl sem, rutrum non sodales faucibus, dapibus sit amet risus. Nullam sollicitudin, elit ut imperdiet sodales, tellus augue ultrices arcu, eu pretium mauris metus eu ante. Curabitur faucibus cursus luctus. Nulla facilisi. Suspendisse libero ante, efficitur in elit ac, dictum pulvinar diam. Nullam nunc massa, tincidunt quis mi ultricies, laoreet interdum magna. Maecenas tempus enim sem, id rhoncus ex lacinia eget. Suspendisse diam leo, aliquam in molestie in, porttitor quis ligula. Fusce eleifend et sapien a vehicula. Suspendisse nec urna eget diam tincidunt ultricies. Fusce ligula turpis, rutrum ac ullamcorper ac, placerat non orci.\r\n\r\n', 'img/marmota.png', 'img/calle.jpg', 'img/disco.jpg'),
(4, 'Blue Summer Festival', 'DiscoPubBlue Teatinos', '2021-07-03', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu commodo nulla, sed tristique leo. Pellentesque condimentum leo ut eros pellentesque, a lacinia lectus pellentesque. Etiam sed tincidunt elit, sit amet pellentesque purus. Etiam pulvinar nec lacus vel vestibulum. Nulla dictum molestie quam iaculis fermentum. Quisque nec lacus eu lectus aliquet pharetra sed in arcu. Morbi sagittis commodo tempor. Aliquam quis semper nisi. Donec at velit lacus. Nunc pellentesque dui dui. Nullam quis auctor elit. Suspendisse porttitor sed lacus nec viverra. Praesent ut enim gravida ex consectetur sodales nec a nibh.\r\n\r\nCras nisl sem, rutrum non sodales faucibus, dapibus sit amet risus. Nullam sollicitudin, elit ut imperdiet sodales, tellus augue ultrices arcu, eu pretium mauris metus eu ante. Curabitur faucibus cursus luctus. Nulla facilisi. Suspendisse libero ante, efficitur in elit ac, dictum pulvinar diam. Nullam nunc massa, tincidunt quis mi ultricies, laoreet interdum magna. Maecenas tempus enim sem, id rhoncus ex lacinia eget. Suspendisse diam leo, aliquam in molestie in, porttitor quis ligula. Fusce eleifend et sapien a vehicula. Suspendisse nec urna eget diam tincidunt ultricies. Fusce ligula turpis, rutrum ac ullamcorper ac, placerat non orci.\r\n\r\n', 'img/blue.jpg', 'img/placeholder.png', 'img/placeholder.png'),
(5, 'Fiestas Patronales San Clemente', 'Ayuntamiento de San Clemente', '2021-08-22', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu commodo nulla, sed tristique leo. Pellentesque condimentum leo ut eros pellentesque, a lacinia lectus pellentesque. Etiam sed tincidunt elit, sit amet pellentesque purus. Etiam pulvinar nec lacus vel vestibulum. Nulla dictum molestie quam iaculis fermentum. Quisque nec lacus eu lectus aliquet pharetra sed in arcu. Morbi sagittis commodo tempor. Aliquam quis semper nisi. Donec at velit lacus. Nunc pellentesque dui dui. Nullam quis auctor elit. Suspendisse porttitor sed lacus nec viverra. Praesent ut enim gravida ex consectetur sodales nec a nibh.\r\n\r\nCras nisl sem, rutrum non sodales faucibus, dapibus sit amet risus. Nullam sollicitudin, elit ut imperdiet sodales, tellus augue ultrices arcu, eu pretium mauris metus eu ante. Curabitur faucibus cursus luctus. Nulla facilisi. Suspendisse libero ante, efficitur in elit ac, dictum pulvinar diam. Nullam nunc massa, tincidunt quis mi ultricies, laoreet interdum magna. Maecenas tempus enim sem, id rhoncus ex lacinia eget. Suspendisse diam leo, aliquam in molestie in, porttitor quis ligula. Fusce eleifend et sapien a vehicula. Suspendisse nec urna eget diam tincidunt ultricies. Fusce ligula turpis, rutrum ac ullamcorper ac, placerat non orci.\r\n\r\n', 'img/esc.png', 'img/placeholder.png', 'img/placeholder.png'),
(6, 'Fiestas Patronales Sisante', 'Ayuntamiento de Sisante', '2021-08-06', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu commodo nulla, sed tristique leo. Pellentesque condimentum leo ut eros pellentesque, a lacinia lectus pellentesque. Etiam sed tincidunt elit, sit amet pellentesque purus. Etiam pulvinar nec lacus vel vestibulum. Nulla dictum molestie quam iaculis fermentum. Quisque nec lacus eu lectus aliquet pharetra sed in arcu. Morbi sagittis commodo tempor. Aliquam quis semper nisi. Donec at velit lacus. Nunc pellentesque dui dui. Nullam quis auctor elit. Suspendisse porttitor sed lacus nec viverra. Praesent ut enim gravida ex consectetur sodales nec a nibh.\r\n\r\nCras nisl sem, rutrum non sodales faucibus, dapibus sit amet risus. Nullam sollicitudin, elit ut imperdiet sodales, tellus augue ultrices arcu, eu pretium mauris metus eu ante. Curabitur faucibus cursus luctus. Nulla facilisi. Suspendisse libero ante, efficitur in elit ac, dictum pulvinar diam. Nullam nunc massa, tincidunt quis mi ultricies, laoreet interdum magna. Maecenas tempus enim sem, id rhoncus ex lacinia eget. Suspendisse diam leo, aliquam in molestie in, porttitor quis ligula. Fusce eleifend et sapien a vehicula. Suspendisse nec urna eget diam tincidunt ultricies. Fusce ligula turpis, rutrum ac ullamcorper ac, placerat non orci.\r\n\r\n', 'img/esi.png', 'img/placeholder.png', 'img/placeholder.png');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `nickname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('registrado','moderador','gestor','superusuario') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'registrado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nickname`, `nombre`, `apellidos`, `password`, `correo`, `tipo`) VALUES
(5, 'noSpiderMan', 'Peter', 'Parker', '$2y$10$UmuJf2Oi7Dmk2qyHj6jO8OMAMwRz6RSu79R59UZewEd/Q1xcEqSve', 'peterP@correo.es', 'gestor'),
(6, 'caballero_oscuro', 'Bruce', 'Wayne', '$2y$10$.GaVA9Pz6T65qfFek8GCEOOEDsQobW4P4nBzKYjfC37ThPOPoB.EC', 'batman@batcorreo.es', 'registrado'),
(7, 'superman', 'Clark', 'Kent', '$2y$10$WAktZeoORppbtJbuWiYcw.3.xsQ54F1nfFFhZa/xlNUE9T8Qc5Q5e', 'c_kent@metropolis.com', 'superusuario');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_evento` (`id_evento`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
