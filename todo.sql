-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2019 a las 21:06:51
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `todo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listausuarios`
--

CREATE TABLE `listausuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `usuario` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `listausuarios`
--

INSERT INTO `listausuarios` (`id`, `nombre`, `usuario`, `password`, `apellido`, `fecha`) VALUES
(2, '0', 'mauri', '$2y$10$5ASYrQbT8K7WVa7BH6J.8OWuA8wBE1kDHRBc0a2.ui0dxYHmNMrb.', 'mauri', '2019-10-18'),
(3, '0', 'juan', '$2y$10$si9TTvaHoOtPJSYyAZfxxew8NzlQ.9g39j0pW5lkcsAoXDdWXsI1G', 'pauluk', '2019-10-18'),
(4, '0', 'carlos', '$2y$10$ksOvklnvKREORvlrAiSWjuJstaZeGxOLaru4qNPdE52lCAWk8jf5.', 'perez', '2019-10-22'),
(5, '0', 'juan', '$2y$10$si9TTvaHoOtPJSYyAZfxxew8NzlQ.9g39j0pW5lkcsAoXDdWXsI1G', 'gomez', '2019-10-22'),
(6, '0', 'hernan', '$2y$10$EJ5WUtzw2uLpMDkEN6rdCOleG/DHv8ntjJF/LPLRvNMYO516M3qIC', 'cassiari', '2019-10-22'),
(7, 'Juan', 'juanpauluk', '$2y$10$cWr4ejY.UiqnmoV4aOvctOUc90poWyf36AvR.iaeic1so.PZU7BwC', 'Pauluk', '2019-10-23'),
(8, 'michelle', 'michi', '$2y$10$JJRg7v27iDF3PmQI3yvX9e3pnkL3akZOqyckT1fXoY2zEmuyODRs2', 'damario', '2019-10-23'),
(9, 'Tomas', 'ElSulivan', '$2y$10$vr6LRJFmy5biL.CBmTxM9Ony/UVfVOxtFd0gXxCdQhjjpKJsCTECS', 'Margiottiello', '2019-10-23'),
(10, 'ailon', 'Ailonchas', '$2y$10$Naps16jpVN/DEZre/0wNgeXiCyvigmIwWb3uEKAZbjvRFZA9hcvo6', 'chas', '2019-10-23'),
(11, 'caro', 'caro', '$2y$10$ZphEzqnU9iqUq/TAIllMROCt5rtMty7TRp16IXKFysDzxG.N5bmIi', 'caro', '2019-10-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas-pendientes`
--

CREATE TABLE `tareas-pendientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `realizada` tinyint(1) NOT NULL,
  `fecha` date NOT NULL,
  `fechalimite` date NOT NULL,
  `asignadoa` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tareas-pendientes`
--

INSERT INTO `tareas-pendientes` (`id`, `nombre`, `descripcion`, `realizada`, `fecha`, `fechalimite`, `asignadoa`) VALUES
(45, 'hola', 'hola', 0, '2019-10-25', '0000-00-00', '2'),
(47, 'pintar', 'puerta', 0, '2019-10-25', '2020-12-12', '5'),
(48, 'renovar', 'programar', 0, '2019-10-25', '2020-12-12', '2'),
(49, 'chau', 'gato', 0, '2019-10-25', '2121-03-12', '8'),
(50, 'mauri', 'mauri', 1, '2019-10-25', '1212-12-12', '8'),
(53, 'estudiar', 'paradigmas', 1, '2019-10-28', '2019-10-28', '2'),
(54, 'retomar', 'curso', 0, '2019-10-28', '2019-10-31', '11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `listausuarios`
--
ALTER TABLE `listausuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tareas-pendientes`
--
ALTER TABLE `tareas-pendientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_usuario` (`asignadoa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `listausuarios`
--
ALTER TABLE `listausuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tareas-pendientes`
--
ALTER TABLE `tareas-pendientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
