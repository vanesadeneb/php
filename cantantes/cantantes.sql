-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-05-2018 a las 05:14:39
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `artistas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cantantes`
--

DROP TABLE IF EXISTS `cantantes`;
CREATE TABLE IF NOT EXISTS `cantantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `ap_paterno` varchar(50) NOT NULL,
  `ap_materno` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero_musical` varchar(50) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cantantes`
--

INSERT INTO `cantantes` (`id`, `nombre`, `ap_paterno`, `ap_materno`, `fecha_nacimiento`, `genero_musical`, `imagen`) VALUES
(1, 'Adele Laurie', 'Blue', 'Adkins', '1988-05-05', 'Soul, R&B, pop', 'imgs/adele.jpg'),
(2, 'Ariana', 'Grande', 'Butera', '1993-06-26', 'Pop, R&B, Electropop', 'imgs/ariana.jpg'),
(3, 'Beyonce', 'Knowles', 'Carter', '1981-09-04', 'R&B, soul, hip hop', 'imgs/beyonce.jpg'),
(4, 'Britney', 'Jean', 'Spears', '1981-12-02', 'Pop, dance pop y electropop', 'imgs/britney.jpg'),
(5, 'Jennifer', 'Lynn', 'Lopez', '1969-07-24', 'Pop latino, R&B, urban, pop, rap, reguetón, dance.', 'imgs/jennifer.jpg'),
(6, 'Katheryn Elizabeth', 'Hudson', '', '1984-10-25', 'Pop, rock, dance, góspel', 'imgs/katy.jpg'),
(7, 'Rihanna', 'Fenty', '', '1988-02-20', 'Pop, R&B, hip hop, dance, reggae', 'imgs/rihanna.jpg'),
(8, 'Madonna Louise', 'Veronica', 'Ciccone', '1958-08-16', 'Pop, dance, electrónica,  rock,  house', 'imgs/madonna.jpg'),
(9, 'Shakira Isabel', 'Mebarak', 'Ripoll', '1977-02-02', 'Pop latino, pop, pop rock, rock en español, world', 'imgs/shakira.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
