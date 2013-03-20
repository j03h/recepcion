-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-03-2013 a las 17:06:38
-- Versión del servidor: 5.5.30
-- Versión de PHP: 5.4.12-1~dotdeb.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `recepcion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control`
--

CREATE TABLE IF NOT EXISTS `control` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` text COLLATE utf8_spanish_ci NOT NULL,
  `hora` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `rut` text COLLATE utf8_spanish_ci NOT NULL,
  `nombrev` text COLLATE utf8_spanish_ci NOT NULL,
  `nombrea` text COLLATE utf8_spanish_ci NOT NULL,
  `motivo` text COLLATE utf8_spanish_ci NOT NULL,
  `obs` text COLLATE utf8_spanish_ci NOT NULL,
  `sale` text COLLATE utf8_spanish_ci NOT NULL,
  `user_sale` text COLLATE utf8_spanish_ci NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `control`
--

