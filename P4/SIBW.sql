-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 27, 2021 at 03:14 PM
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
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `correo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texto_comentario` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_evento`, `nombre`, `apellidos`, `fecha`, `correo`, `texto_comentario`) VALUES
(1, 3, 'Nombre', 'Apellidos', '2021-04-29', 'correo@correo.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mollis, tortor at porta rutrum, massa elit efficitur nisi, et lacinia nisi metus id mauris. Etiam imperdiet sem et aliquet sollicitudin. Aenean varius aliquam ante, sed ultricies tortor ultrices sed. Curabitur et arcu nec leo posuere faucibus. Vivamus nec elit tempus, finibus purus sit amet, efficitur quam. Praesent volutpat dui quis nulla convallis vestibulum. Nunc commodo nunc non consequat lacinia.'),
(2, 1, 'Henar', 'Garcia', '2021-04-30', 'correo@correo.com', 'El pueblo se llena de demasiada gente pero esta bien'),
(3, 6, 'Lorem', 'Ipsun', '2021-02-23', 'loremipsun@correo.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mollis, tortor at porta rutrum, massa elit efficitur nisi, et lacinia nisi metus id mauris. Etiam imperdiet sem et aliquet sollicitudin. Aenean varius aliquam ante, sed ultricies tortor ultrices sed. Curabitur et arcu nec leo posuere faucibus. Vivamus nec elit tempus, finibus purus sit amet, efficitur quam. Praesent volutpat dui quis nulla convallis vestibulum. Nunc commodo nunc non consequat lacinia.');

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
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'img/placeholder_logo.jpg',
  `imagen1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'img/placeholder.png',
  `imagen2` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'img/placeholder.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`id`, `nombre`, `organizacion`, `fecha`, `descripcion`, `logo`, `imagen1`, `imagen2`) VALUES
(1, 'Dia Joven Vara de Rey', 'Asociación Juvenil Omega', '2021-07-31', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu commodo nulla, sed tristique leo. Pellentesque condimentum leo ut eros pellentesque, a lacinia lectus pellentesque. Etiam sed tincidunt elit, sit amet pellentesque purus. Etiam pulvinar nec lacus vel vestibulum. Nulla dictum molestie quam iaculis fermentum. Quisque nec lacus eu lectus aliquet pharetra sed in arcu. Morbi sagittis commodo tempor. Aliquam quis semper nisi. Donec at velit lacus. Nunc pellentesque dui dui. Nullam quis auctor elit. Suspendisse porttitor sed lacus nec viverra. Praesent ut enim gravida ex consectetur sodales nec a nibh.\r\n\r\nCras nisl sem, rutrum non sodales faucibus, dapibus sit amet risus. Nullam sollicitudin, elit ut imperdiet sodales, tellus augue ultrices arcu, eu pretium mauris metus eu ante. Curabitur faucibus cursus luctus. Nulla facilisi. Suspendisse libero ante, efficitur in elit ac, dictum pulvinar diam. Nullam nunc massa, tincidunt quis mi ultricies, laoreet interdum magna. Maecenas tempus enim sem, id rhoncus ex lacinia eget. Suspendisse diam leo, aliquam in molestie in, porttitor quis ligula. Fusce eleifend et sapien a vehicula. Suspendisse nec urna eget diam tincidunt ultricies. Fusce ligula turpis, rutrum ac ullamcorper ac, placerat non orci.\r\n\r\n', 'img/omega.png', 'img/espuma.jpg', 'img/plaza.jpg'),
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
(1, 'leirereqgar', 'Leire', 'Requena Garcia', '$2y$10$F53xljPckv/uIfi301AxEO4mzcETvCNYtvG0Y5jWUJe/Aqw92JESC', 'leirereqgar@correo.es', 'superusuario');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_evento` (`id_evento`);

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
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
