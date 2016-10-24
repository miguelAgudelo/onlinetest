-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2016 a las 03:44:42
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebaonline`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `created`, `modified`) VALUES
(1, 'principios de la informatica', '2016-06-19 03:28:32', '2016-06-19 03:28:32'),
(3, 'programacion', '2016-06-23 03:33:18', '2016-06-23 03:33:18'),
(4, 'Matematica1', '2016-07-05 17:09:53', '2016-07-05 17:09:53'),
(5, 'informatica', '2016-07-05 23:53:06', '2016-07-05 23:53:06'),
(6, 'tutorial web', '2016-07-06 00:02:10', '2016-07-06 00:02:10'),
(7, 'miguel', '2016-07-06 00:34:03', '2016-07-06 00:34:03'),
(8, 'menol', '2016-07-06 00:35:40', '2016-07-06 00:35:40'),
(9, 'asdasd', '2016-07-06 00:52:19', '2016-07-06 00:52:19'),
(10, 'asdasdasd', '2016-07-06 00:54:15', '2016-07-06 00:54:15'),
(11, 'Leyes de la Informatica', '2016-07-06 01:01:47', '2016-07-06 01:01:47'),
(12, 'Teoria de Sistemas', '2016-07-06 01:06:48', '2016-07-06 01:06:48'),
(13, 'asdasd', '2016-07-06 01:11:34', '2016-07-06 01:11:34'),
(15, 'dasdasd', '2016-07-06 01:15:33', '2016-07-06 01:15:33'),
(16, 'dasdasd', '2016-07-06 01:16:09', '2016-07-06 01:16:09'),
(18, 'Matemática 3', '2016-10-19 22:14:52', '2016-10-19 22:14:52'),
(19, 'Matemática 4', '2016-10-19 22:38:53', '2016-10-19 22:38:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacionpreguntas`
--

CREATE TABLE `evaluacionpreguntas` (
  `id` int(11) NOT NULL,
  `evaluacion_id` int(11) NOT NULL,
  `pregunta_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `usada` int(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `evaluacionpreguntas`
--

INSERT INTO `evaluacionpreguntas` (`id`, `evaluacion_id`, `pregunta_id`, `user_id`, `usada`, `created`, `modified`) VALUES
(1, 3, 2, 0, 0, '2016-07-06 04:37:04', '2016-07-06 04:37:04'),
(2, 3, 3, 0, 0, '2016-07-06 04:37:04', '2016-07-06 04:37:04'),
(3, 3, 4, 0, 0, '2016-07-06 04:37:04', '2016-07-06 04:37:04'),
(4, 3, 2, 0, 0, '2016-07-06 04:38:13', '2016-07-06 04:38:13'),
(5, 3, 3, 0, 0, '2016-07-06 04:38:13', '2016-07-06 04:38:13'),
(6, 3, 4, 0, 0, '2016-07-06 04:38:13', '2016-07-06 04:38:13'),
(7, 3, 2, 0, 0, '2016-07-06 04:38:22', '2016-07-06 04:38:22'),
(8, 3, 3, 0, 0, '2016-07-06 04:38:22', '2016-07-06 04:38:22'),
(9, 3, 4, 0, 0, '2016-07-06 04:38:22', '2016-07-06 04:38:22'),
(10, 3, 2, 0, 0, '2016-07-06 05:51:01', '2016-07-06 05:51:01'),
(11, 3, 3, 0, 0, '2016-07-06 05:51:02', '2016-07-06 05:51:02'),
(12, 3, 4, 0, 0, '2016-07-06 05:51:02', '2016-07-06 05:51:02'),
(13, 14, 2, 0, 0, '2016-07-06 05:51:11', '2016-07-06 05:51:11'),
(14, 14, 3, 0, 0, '2016-07-06 05:51:11', '2016-07-06 05:51:11'),
(15, 14, 4, 0, 0, '2016-07-06 05:51:11', '2016-07-06 05:51:11'),
(16, 13, 1, 0, 0, '2016-07-06 05:51:19', '2016-07-06 05:51:19'),
(17, 24, 6, 0, 0, '2016-07-06 06:00:40', '2016-07-06 06:00:40'),
(18, 24, 6, 0, 0, '2016-07-06 06:00:59', '2016-07-06 06:00:59'),
(19, 13, 1, 0, 0, '2016-07-06 06:09:38', '2016-07-06 06:09:38'),
(20, 13, 7, 0, 0, '2016-07-06 06:09:38', '2016-07-06 06:09:38'),
(21, 3, 2, 0, 0, '2016-10-19 01:03:37', '2016-10-19 01:03:37'),
(22, 3, 3, 0, 0, '2016-10-19 01:03:37', '2016-10-19 01:03:37'),
(23, 3, 4, 0, 0, '2016-10-19 01:03:37', '2016-10-19 01:03:37'),
(24, 3, 2, 0, 0, '2016-10-19 01:03:40', '2016-10-19 01:03:40'),
(25, 3, 3, 0, 0, '2016-10-19 01:03:40', '2016-10-19 01:03:40'),
(26, 3, 4, 0, 0, '2016-10-19 01:03:40', '2016-10-19 01:03:40'),
(27, 3, 2, 0, 0, '2016-10-19 01:41:10', '2016-10-19 01:41:10'),
(28, 3, 3, 0, 0, '2016-10-19 01:41:10', '2016-10-19 01:41:10'),
(29, 3, 4, 0, 0, '2016-10-19 01:41:10', '2016-10-19 01:41:10'),
(30, 3, 2, 1, 0, '2016-10-19 01:51:30', '2016-10-19 01:51:30'),
(31, 3, 3, 1, 0, '2016-10-19 01:51:30', '2016-10-19 01:51:30'),
(32, 3, 4, 1, 0, '2016-10-19 01:51:30', '2016-10-19 01:51:30'),
(33, 3, 2, 1, 0, '2016-10-20 01:18:55', '2016-10-20 01:18:55'),
(34, 3, 3, 1, 0, '2016-10-20 01:18:56', '2016-10-20 01:18:56'),
(35, 3, 4, 1, 0, '2016-10-20 01:18:56', '2016-10-20 01:18:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacions`
--

CREATE TABLE `evaluacions` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `ponderada` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `evaluacions`
--

INSERT INTO `evaluacions` (`id`, `nombre`, `ponderada`, `cantidad`, `categoria_id`, `created`, `modified`) VALUES
(3, 'POO teoria', 'No', 6, 3, '2016-06-23 03:33:19', '2016-06-23 03:33:19'),
(4, 'Java', 'Si', 10, 3, '2016-06-23 03:33:19', '2016-06-23 03:33:19'),
(5, 'programacion1', 'No', 3, 3, '2016-07-05 03:07:58', '2016-07-05 03:07:58'),
(13, '¿Que es un computador?', 'No', 1, 1, '2016-07-05 04:18:06', '2016-07-05 04:18:06'),
(14, 'prueba sobre php', 'Si', 20, 3, '2016-07-05 17:08:27', '2016-07-05 17:08:27'),
(15, 'prueba1', 'No', 5, 4, '2016-07-05 17:09:53', '2016-07-05 17:09:53'),
(16, 'prueba2', 'No', 5, 4, '2016-07-05 17:09:53', '2016-07-05 17:09:53'),
(17, 'prueba3', 'Si', 5, 4, '2016-07-05 17:09:53', '2016-07-05 17:09:53'),
(18, 'prueba4', 'Si', 5, 4, '2016-07-05 17:09:53', '2016-07-05 17:09:53'),
(19, 'tutorial html', 'Si', 12, 6, '2016-07-06 00:55:45', '2016-07-06 00:55:45'),
(20, 'tutorial css', 'Si', 5, 6, '2016-07-06 00:57:36', '2016-07-06 00:57:36'),
(21, 'teoria1', 'Si', 4, 12, '2016-07-06 01:06:48', '2016-07-06 01:06:48'),
(22, 'Sistemas metodologia', 'Si', 10, 12, '2016-07-06 01:06:48', '2016-07-06 01:06:48'),
(23, 'aasdasdsad', 'Si', 2, 13, '2016-07-06 01:11:34', '2016-07-06 01:11:34'),
(24, 'prueba1', 'Si', 10, 17, '2016-07-06 05:56:58', '2016-07-06 05:56:58'),
(25, 'Mi primera prueba', 'Si', 3, 18, '2016-10-19 22:14:52', '2016-10-19 22:14:52'),
(26, 'Mi segunda Prueba', 'Si', 5, 18, '2016-10-19 22:14:52', '2016-10-19 22:14:52'),
(27, 'Un prueba facil', 'No', 2, 19, '2016-10-19 22:38:53', '2016-10-19 22:38:53'),
(28, 'Una dificil', 'Si', 4, 19, '2016-10-19 22:38:53', '2016-10-19 22:38:53'),
(29, 'asdasd', 'No', 2, 3, '2016-10-19 22:51:54', '2016-10-19 22:51:54'),
(30, 'ddddddd', 'No', 3, 3, '2016-10-19 22:51:54', '2016-10-19 22:51:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivels`
--

CREATE TABLE `nivels` (
  `id` int(11) NOT NULL,
  `dificultad` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nivels`
--

INSERT INTO `nivels` (`id`, `dificultad`, `created`, `modified`) VALUES
(1, 'facil', '2016-06-19 03:29:26', '2016-06-19 03:29:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `texto` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dir` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `categoria_id` int(11) NOT NULL,
  `nivel_id` int(11) NOT NULL,
  `tipo_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `texto`, `photo`, `dir`, `categoria_id`, `nivel_id`, `tipo_id`, `created`, `modified`) VALUES
(1, '¿que es la informatica?', '', '', 1, 1, 1, '2016-06-19 03:30:10', '2016-06-19 03:30:10'),
(2, 'Que es Java?', NULL, NULL, 3, 1, 1, '2016-07-05 04:51:24', '2016-07-05 04:51:24'),
(3, '¿Que es php?', NULL, NULL, 3, 1, 1, '2016-07-05 17:11:39', '2016-07-05 17:11:39'),
(4, '¿Que es programacion POO?', NULL, NULL, 3, 1, 1, '2016-07-05 23:56:22', '2016-07-05 23:56:22'),
(6, 'Quien soy', NULL, NULL, 17, 1, 1, '2016-07-06 06:00:07', '2016-07-06 06:00:07'),
(7, 'que hace un Ingeniero en Informática?', NULL, NULL, 1, 1, 1, '2016-07-06 06:09:08', '2016-07-06 06:09:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL,
  `pregunta_id` int(11) NOT NULL,
  `texto` varchar(400) COLLATE utf8_spanish_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dir` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correcta` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id`, `pregunta_id`, `texto`, `photo`, `dir`, `correcta`, `created`, `modified`) VALUES
(1, 1, 'es la materia que se encarga del estudio de tecnología de la computación y todo lo referente a la misma ', '', '', 1, '2016-06-19 03:31:26', '2016-06-19 03:31:26'),
(2, 1, 'es una clase de burrito hecho en peru', '', '', 0, '2016-06-19 03:32:05', '2016-06-19 03:32:05'),
(3, 2, 'es un lenguaje orientado al diseño de sistemas stand alone', NULL, NULL, 1, '2016-07-05 04:51:24', '2016-07-05 04:51:24'),
(4, 2, 'es un frameword de desarrollo web', NULL, NULL, 0, '2016-07-05 04:51:25', '2016-07-05 04:51:25'),
(5, 3, 'es una hamburguesa', NULL, NULL, 0, '2016-07-05 17:11:39', '2016-07-05 17:11:39'),
(6, 3, 'es un lenguaje orientado a servidor web', NULL, NULL, 1, '2016-07-05 17:11:40', '2016-07-05 17:11:40'),
(7, 5, 'sdasdasdasdasd', NULL, NULL, 1, '2016-07-06 01:17:17', '2016-07-06 01:17:17'),
(8, 4, 'en español refiere a las siglas de Programacion Orientada a Objestos es un paradigma', NULL, NULL, 1, '2016-07-06 00:00:00', '2016-07-06 00:00:00'),
(9, 4, 'Es un lenguaje de programacion para uso del cliente', NULL, NULL, 0, '2016-07-06 00:00:00', '2016-07-06 00:00:00'),
(10, 6, 'Una persona', NULL, NULL, 1, '2016-07-06 06:00:07', '2016-07-06 06:00:07'),
(11, 6, 'Una cosa', NULL, NULL, 0, '2016-07-06 06:00:07', '2016-07-06 06:00:07'),
(12, 7, 'Trabajar informaticamente hablando', NULL, NULL, 0, '2016-07-06 06:09:08', '2016-07-06 06:09:08'),
(13, 7, 'Ingeniarse, resolver problemas mediante el uso de sus conocimientos en las ciencias de la computación', NULL, NULL, 1, '2016-07-06 06:09:08', '2016-07-06 06:09:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id` int(11) NOT NULL,
  `tip` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `tip`, `created`, `modified`) VALUES
(1, 'seleccion simple', '2016-06-19 03:29:50', '2016-06-19 03:29:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` int(8) NOT NULL,
  `sexo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `role` enum('user','admin','super-admin','') COLLATE utf8_spanish_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evaluacionpreguntas`
--
ALTER TABLE `evaluacionpreguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evaluacions`
--
ALTER TABLE `evaluacions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nivels`
--
ALTER TABLE `nivels`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `evaluacionpreguntas`
--
ALTER TABLE `evaluacionpreguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT de la tabla `evaluacions`
--
ALTER TABLE `evaluacions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `nivels`
--
ALTER TABLE `nivels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
