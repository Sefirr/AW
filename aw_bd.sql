CREATE DATABASE aw_bd;
USE aw_bd;

-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2015 a las 10:20:56
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `aw_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `texto` varchar(2500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments_content`
--

CREATE TABLE IF NOT EXISTS `comments_content` (
  `id_content` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments_merchandising`
--

CREATE TABLE IF NOT EXISTS `comments_merchandising` (
  `id_comment` int(11) NOT NULL,
  `id_merchansing` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content`
--

CREATE TABLE IF NOT EXISTS `content` (
`id_content` int(11) NOT NULL,
  `tipo` int(3) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `caratula` varchar(50) NOT NULL,
  `sinopsis` varchar(2500) NOT NULL,
  `descripcion` varchar(2500) NOT NULL,
  `fechaestreno` date DEFAULT NULL,
  `director` varchar(100) NOT NULL,
  `duracion` int(11) NOT NULL,
  `valoracionpagina` int(11) NOT NULL,
  `publicado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content_merchandising`
--

CREATE TABLE IF NOT EXISTS `content_merchandising` (
  `id_content` int(11) NOT NULL,
  `id_merchandising` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content_ratings`
--

CREATE TABLE IF NOT EXISTS `content_ratings` (
`id_rating` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_content` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `details_order`
--

CREATE TABLE IF NOT EXISTS `details_order` (
`id_detorder` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_merchandising` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id_amigo1` int(11) NOT NULL,
  `id_amigo2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `merchandising`
--

CREATE TABLE IF NOT EXISTS `merchandising` (
`id_merchandising` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `foto1` varchar(125) NOT NULL,
  `foto2` varchar(125) NOT NULL,
  `descripcion` varchar(2500) NOT NULL,
  `unidades` int(11) NOT NULL,
  `proveedor` varchar(75) NOT NULL,
  `precio` float NOT NULL DEFAULT '0',
  `valoracion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `merchandising_ratings`
--

CREATE TABLE IF NOT EXISTS `merchandising_ratings` (
`id_rating` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_merchandising` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `descripcion` varchar(2500) NOT NULL,
  `foto` varchar(50) NOT NULL DEFAULT 'img/perfil.jpg',
  `rol` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id_comment`), ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `comments_content`
--
ALTER TABLE `comments_content`
 ADD PRIMARY KEY (`id_content`,`id_comment`), ADD KEY `id_comment` (`id_comment`);

--
-- Indices de la tabla `comments_merchandising`
--
ALTER TABLE `comments_merchandising`
 ADD PRIMARY KEY (`id_comment`,`id_merchansing`), ADD KEY `id_merchansing` (`id_merchansing`);

--
-- Indices de la tabla `content`
--
ALTER TABLE `content`
 ADD PRIMARY KEY (`id_content`), ADD UNIQUE KEY `titulo` (`titulo`);

--
-- Indices de la tabla `content_merchandising`
--
ALTER TABLE `content_merchandising`
 ADD PRIMARY KEY (`id_content`,`id_merchandising`), ADD KEY `id_content` (`id_content`,`id_merchandising`), ADD KEY `id_merchandising` (`id_merchandising`);

--
-- Indices de la tabla `content_ratings`
--
ALTER TABLE `content_ratings`
 ADD PRIMARY KEY (`id_rating`), ADD KEY `id_user` (`id_user`,`id_content`), ADD KEY `id_content` (`id_content`);

--
-- Indices de la tabla `details_order`
--
ALTER TABLE `details_order`
 ADD PRIMARY KEY (`id_detorder`,`id_order`), ADD KEY `id_merchandising` (`id_merchandising`), ADD KEY `id_merchandising_2` (`id_merchandising`), ADD KEY `id_merchandising_3` (`id_merchandising`), ADD KEY `id_merchandising_4` (`id_merchandising`), ADD KEY `id_order` (`id_order`);

--
-- Indices de la tabla `friends`
--
ALTER TABLE `friends`
 ADD PRIMARY KEY (`id_amigo1`,`id_amigo2`), ADD UNIQUE KEY `id_amigo2` (`id_amigo2`), ADD KEY `id_amigo1` (`id_amigo1`);

--
-- Indices de la tabla `merchandising`
--
ALTER TABLE `merchandising`
 ADD PRIMARY KEY (`id_merchandising`), ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `merchandising_ratings`
--
ALTER TABLE `merchandising_ratings`
 ADD PRIMARY KEY (`id_rating`), ADD KEY `id_user` (`id_user`,`id_merchandising`), ADD KEY `id_merchandising` (`id_merchandising`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id_order`,`id_user`), ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id_user`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `username_2` (`username`), ADD UNIQUE KEY `username_3` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT de la tabla `content`
--
ALTER TABLE `content`
MODIFY `id_content` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT de la tabla `content_ratings`
--
ALTER TABLE `content_ratings`
MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT de la tabla `details_order`
--
ALTER TABLE `details_order`
MODIFY `id_detorder` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT de la tabla `merchandising`
--
ALTER TABLE `merchandising`
MODIFY `id_merchandising` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT de la tabla `merchandising_ratings`
--
ALTER TABLE `merchandising_ratings`
MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Filtros para la tabla `comments_content`
--
ALTER TABLE `comments_content`
ADD CONSTRAINT `comments_content_ibfk_1` FOREIGN KEY (`id_content`) REFERENCES `content` (`id_content`) ON DELETE CASCADE,
ADD CONSTRAINT `comments_content_ibfk_2` FOREIGN KEY (`id_comment`) REFERENCES `comments` (`id_comment`) ON DELETE CASCADE;

--
-- Filtros para la tabla `comments_merchandising`
--
ALTER TABLE `comments_merchandising`
ADD CONSTRAINT `comments_merchandising_ibfk_1` FOREIGN KEY (`id_comment`) REFERENCES `comments` (`id_comment`) ON DELETE CASCADE,
ADD CONSTRAINT `comments_merchandising_ibfk_2` FOREIGN KEY (`id_merchansing`) REFERENCES `merchandising` (`id_merchandising`) ON DELETE CASCADE;

--
-- Filtros para la tabla `content_merchandising`
--
ALTER TABLE `content_merchandising`
ADD CONSTRAINT `content_merchandising_ibfk_1` FOREIGN KEY (`id_content`) REFERENCES `content` (`id_content`) ON DELETE CASCADE,
ADD CONSTRAINT `content_merchandising_ibfk_2` FOREIGN KEY (`id_merchandising`) REFERENCES `merchandising` (`id_merchandising`) ON DELETE CASCADE;

--
-- Filtros para la tabla `content_ratings`
--
ALTER TABLE `content_ratings`
ADD CONSTRAINT `content_ratings_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
ADD CONSTRAINT `content_ratings_ibfk_2` FOREIGN KEY (`id_content`) REFERENCES `content` (`id_content`) ON DELETE CASCADE;

--
-- Filtros para la tabla `details_order`
--
ALTER TABLE `details_order`
ADD CONSTRAINT `details_order_ibfk_2` FOREIGN KEY (`id_merchandising`) REFERENCES `merchandising` (`id_merchandising`) ON DELETE CASCADE,
ADD CONSTRAINT `details_order_ibfk_3` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE CASCADE;

--
-- Filtros para la tabla `friends`
--
ALTER TABLE `friends`
ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`id_amigo1`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
ADD CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`id_amigo2`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Filtros para la tabla `merchandising_ratings`
--
ALTER TABLE `merchandising_ratings`
ADD CONSTRAINT `merchandising_ratings_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
ADD CONSTRAINT `merchandising_ratings_ibfk_2` FOREIGN KEY (`id_merchandising`) REFERENCES `merchandising` (`id_merchandising`) ON DELETE CASCADE;

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE USER 'aw_root'@'localhost' IDENTIFIED BY 'aplicacionesweb';
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, INDEX, ALTER, CREATE TEMPORARY TABLES, EXECUTE, CREATE VIEW, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, EVENT, TRIGGER  ON `aw_bd`.* TO 'aw_root';