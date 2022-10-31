-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2022 a las 16:27:32
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colegio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `id_detalle` int(11) NOT NULL,
  `n_materias` int(11) NOT NULL,
  `id_est` int(11) NOT NULL,
  `id_matricula` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`id_detalle`, `n_materias`, `id_est`, `id_matricula`) VALUES
(1, 6, 0, 5),
(2, 7, 0, 5),
(3, 7, 0, 6),
(4, 7, 0, 7),
(5, 7, 0, 8),
(6, 6, 0, 10),
(7, 7, 0, 11),
(8, 6, 0, 11),
(9, 7, 0, 12),
(10, 7, 0, 13),
(11, 7, 0, 14),
(12, 7, 0, 15),
(13, 7, 0, 16),
(14, 6, 0, 18),
(15, 7, 0, 18),
(16, 9, 0, 18),
(17, 7, 0, 20),
(18, 7, 0, 22),
(19, 7, 0, 23),
(20, 6, 0, 23),
(21, 7, 0, 24),
(22, 7, 0, 25),
(23, 7, 0, 25),
(24, 7, 0, 25),
(25, 7, 0, 28),
(26, 5, 0, 29),
(27, 6, 0, 5558),
(28, 7, 0, 5558),
(29, 7, 0, 5559),
(30, 7, 0, 5561),
(31, 7, 0, 5562),
(32, 7, 0, 5563),
(33, 6, 0, 5563),
(34, 6, 0, 5563);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalletemp`
--

CREATE TABLE `detalletemp` (
  `id_detalle` int(11) NOT NULL,
  `n_materias` int(11) DEFAULT NULL,
  `id_est` int(11) NOT NULL,
  `id_matricula` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id_est` int(11) NOT NULL,
  `nom_est` varchar(30) DEFAULT NULL,
  `apel_est` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `dir_est` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_est`, `nom_est`, `apel_est`, `email`, `dir_est`) VALUES
(1700, 'Santiago', 'Calle', 'Arturo@hotmail.com', 'Ibague'),
(1345, 'Emily', 'Hernan', 'Emilio@hotmail.edu', 'Bogota'),
(4440, 'Daniela', 'cupitra', 'Daniela@hotmail.co', 'natagaima');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `n_materias` int(11) NOT NULL,
  `nombre` varchar(24) DEFAULT NULL,
  `horas` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`n_materias`, `nombre`, `horas`) VALUES
(6, 'Español', 10000),
(7, 'Español', 2),
(9, 'Lenguaje', 3),
(11, 'ciencias', 7),
(5, 'Ciencias naturales', 6),
(1, 'ingles', 1),
(2, 'Arquologia', 4),
(3, 'Humanidades', 2),
(4, 'Filosofia', 2),
(8, 'Musica', 6),
(10, 'Etica', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `id_matricula` int(11) NOT NULL,
  `id_est` int(11) NOT NULL,
  `fecha` date DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`id_matricula`, `id_est`, `fecha`, `id_user`) VALUES
(333, 770, '2022-05-24', 11),
(888, 111, '2022-05-26', 890),
(5563, 1700, '2022-05-27', 33),
(5562, 1700, '2022-05-27', 33),
(777, 7877, '2022-05-28', 77),
(5561, 1700, '2022-05-27', 33),
(55, 888, '2022-05-27', 93),
(5559, 1700, '2022-05-27', 33);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rol_user` int(2) NOT NULL,
  `rol_nom` varchar(24) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rol_user`, `rol_nom`) VALUES
(1, 'Administrador'),
(2, 'Funcionario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `rol_user` int(2) DEFAULT NULL,
  `nom_user` varchar(30) DEFAULT NULL,
  `ap_user` varchar(30) DEFAULT NULL,
  `clave` varchar(200) DEFAULT NULL,
  `num_cel` int(10) DEFAULT NULL,
  `dir_user` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `rol_user`, `nom_user`, `ap_user`, `clave`, `num_cel`, `dir_user`) VALUES
(1234, 1, 'Alex', 'Cortez', 'juan1234', 31222, 'Calle 13'),
(3244, 1, 'Karen', 'Agudelo', 'Karen3244', 31122, 'calle 2 manzana'),
(6676, 2, 'Andres', 'Lopez', 'Lopez6676', 311113, 'calle 33'),
(34544, 1, 'Natalia', 'Ducuara', '$2y$12$Fxg3LriW7gXwP/5Wf7q90eW6V8P9TzFcune.Fpn.78FaGirCmHKG2', 32444, 'calle 50'),
(334, 1, 't', 'y', '$2y$12$ei/i/C1Bymoh.w49g2IzI.iwOCU3aNVX2oh21y8K6ilvJVMx8mmgC', 3433, 'calle 4'),
(4555, 1, 'Luis', 'Capera', '$2y$12$gTILBN6aZdxloNR7E6hjW.8bOzc4FjNEEavHSaAElp/RM1NBtjU2i', 3122, 'Calle 24'),
(33, 2, 'r', 't', '$2y$12$BRlKfAgUFFnM95if5NpRXujDFvgIS.KYdCG8nYo0o5Rw3DWGzo662', 4444, 'calle 44');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`id_detalle`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id_est`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`n_materias`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id_matricula`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol_user`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `rol_user` (`rol_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5564;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
