-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-10-2019 a las 18:59:32
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `talamo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `ASI_ID` int(11) NOT NULL,
  `USU_ID` int(8) NOT NULL,
  `ASI_FECHA` date NOT NULL,
  `ASI_HORA_INGRESO` time NOT NULL,
  `ASI_HORA_SALIDA` time NOT NULL,
  `ASI_ESTADO` tinyint(1) NOT NULL,
  `ASI_OBSERVACION` text COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `USU_ID` int(8) NOT NULL,
  `USU_NOMBRES` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `USU_USUARIO` varchar(14) COLLATE utf8_spanish_ci NOT NULL,
  `USU_EMPRESA` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `USU_PASSWORD` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `USU_PERFIL` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `USU_ESTADO` tinyint(1) NOT NULL,
  `USU_ULTIMO_LOGIN` datetime NOT NULL,
  `USU_FECHA` timestamp NOT NULL DEFAULT current_timestamp(),
  `USU_DIA` int(11) NOT NULL,
  `USU_HORA` int(11) NOT NULL,
  `USU_MIN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`USU_ID`, `USU_NOMBRES`, `USU_USUARIO`, `USU_EMPRESA`, `USU_PASSWORD`, `USU_PERFIL`, `USU_ESTADO`, `USU_ULTIMO_LOGIN`, `USU_FECHA`, `USU_DIA`, `USU_HORA`, `USU_MIN`) VALUES
(1, 'BONE LUIS', 'u1718531021', 'LAM', '$2a$07$asxx54ahjppf45sd87a5auLUetrceRkngMl9PNanm.7xZm2KVUdoe', 'Administrador', 1, '2019-10-02 11:10:58', '2019-09-17 17:33:52', 0, 0, 0),
(2, 'LUNA ANITA', 'u1711890945', 'TALAMO', '$2a$07$asxx54ahjppf45sd87a5aug7YTJu/tM6j1X0KQRYb7DiqPGH6lZnm', 'Administrador', 1, '2019-09-30 15:49:16', '2019-09-17 17:33:52', 0, 0, 0),
(3, 'GRIJALVA MIREYA', 'u1710092360', 'TALAMO', '$2a$07$asxx54ahjppf45sd87a5aus4batBllQQcroXKzPTa4ltYaXWztJNS', 'Administrador', 1, '2019-09-30 15:49:59', '2019-09-17 17:33:52', 0, 0, 0),
(4, 'COLLAGUAZO BRYAN ', 'u1722500970', 'LAM', '$2a$07$asxx54ahjppf45sd87a5au7k.OF6T2aSn7uoMX2QvEgpm3laLryFG', 'Especial', 1, '2019-09-30 15:51:02', '2019-09-17 17:33:52', 0, 0, 0),
(5, 'LOPEZ ISABEL', 'u1758605248', 'TALAMO', '$2a$07$asxx54ahjppf45sd87a5auXD9zMrdzbYJcxELnC4KDLRu6PWRfo.y', 'Especial', 1, '2019-09-30 16:42:03', '2019-09-17 17:33:52', 0, 0, 0),
(6, 'PATINO DANIELA ', 'u1724976335', 'LAM', '$2a$07$asxx54ahjppf45sd87a5au6qIBEHDwMEtCAWVSkowdxZ5Eqz2YkoC', 'Especial', 1, '2019-09-30 16:46:59', '2019-09-17 17:33:52', 0, 0, 0),
(7, 'TENORIO KARINA', 'u0502981046', 'TALAMO', '$2a$07$asxx54ahjppf45sd87a5auiQkjbiFh/C.xH6YJbAbnX2d3BTOOKy.', 'Especial', 1, '2019-09-30 13:29:21', '2019-09-17 17:33:52', 0, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`ASI_ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`USU_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `ASI_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `USU_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
