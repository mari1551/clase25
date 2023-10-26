-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2023 a las 04:45:18
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_clase25`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_libros`
--

CREATE TABLE `tabla_libros` (
  `id` int(10) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `genero` varchar(30) NOT NULL,
  `anio` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tabla_libros`
--

INSERT INTO `tabla_libros` (`id`, `titulo`, `autor`, `genero`, `anio`) VALUES
(1, 'LA CASA NEVILLE . LA FORMIDABLE SEÑORITA MANON', 'BONELLI, FLORENCIA', 'Ficcion', 2003),
(2, 'Bases de Datos', 'Ángel Perez', 'Informativo', 2010),
(3, 'El pensamiento aleatorio y los sistemas de datos e', 'Saray Burbano Valdivieso', 'Informativo', 2021),
(4, 'Bases de Datos', 'Ángel Perez', 'Informativo', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tabla_libros`
--
ALTER TABLE `tabla_libros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tabla_libros`
--
ALTER TABLE `tabla_libros`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
