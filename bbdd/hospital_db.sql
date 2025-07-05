-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-07-2025 a las 20:47:44
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hospital_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguros_salud`
--

CREATE TABLE `seguros_salud` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `seguros_salud`
--

INSERT INTO `seguros_salud` (`id`, `nombre`, `logo`) VALUES
(1, 'Adeslas', 'adeslas.png'),
(2, 'Adeslas Isfas', 'isfas.png'),
(3, 'Adeslas Muface', 'muface.png'),
(4, 'Adeslas Mugeju', 'mugeju.png'),
(5, 'Aegon', 'aegon.png'),
(6, 'Allianz (DKV)', 'allianz.png'),
(7, 'Asisa', 'asisa.png'),
(8, 'Asisa Isfas', 'isfas.png'),
(9, 'Asisa Muface', 'muface.png'),
(10, 'Asisa Mugeju', 'mugeju.png'),
(11, 'Axa Salud', 'axa.png'),
(12, 'Caser Salud', 'caser.png'),
(13, 'Cigna', 'cigna.png'),
(14, 'Divina Pastora Salud', 'divina_pastora.png'),
(15, 'DKV', 'dkv.png'),
(16, 'Fiatc', 'fiatc.png'),
(17, 'Generali (Sanitas)', 'generali.png'),
(18, 'SESCAM', 'sescam.png'),
(19, 'HNA', 'hna.png'),
(20, 'HNA SC', 'hna_sc.png'),
(21, 'La Unión Madrileña de Seguros', 'union_madrilena.png'),
(22, 'Legalitas Salud', 'legalitas.png'),
(23, 'Linea Directa (antes Vivaz) DKV', 'linea_directa.png'),
(24, 'Mapfre Salud', 'mapfre.png'),
(25, 'MUSA (Nueva Mutua Madrileña)', 'musa.png'),
(26, 'Occident', 'occident.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `seguros_salud`
--
ALTER TABLE `seguros_salud`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `seguros_salud`
--
ALTER TABLE `seguros_salud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
