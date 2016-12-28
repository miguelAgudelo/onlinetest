-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-12-2016 a las 05:20:13
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
-- Estructura de tabla para la tabla `bibliotecas`
--

CREATE TABLE `bibliotecas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `dir` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
(1, 'Programación', '2016-11-06 23:52:38', '2016-12-08 02:44:17'),
(2, 'Teoria de sistemas', '2016-11-07 04:11:47', '2016-11-07 04:11:47'),
(4, 'Matematica', '2016-11-07 21:50:12', '2016-11-07 21:50:12'),
(5, 'Principios de la Informatica', '2016-11-08 03:02:34', '2016-11-08 03:02:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriausers`
--

CREATE TABLE `categoriausers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoriausers`
--

INSERT INTO `categoriausers` (`id`, `user_id`, `categoria_id`, `created`, `modified`) VALUES
(3, 1, 2, '2016-11-23 02:29:45', '2016-11-23 02:29:45'),
(6, 2, 1, '2016-12-05 04:20:06', '2016-12-05 04:20:06'),
(7, 1, 1, '2016-12-06 05:43:23', '2016-12-06 05:43:23'),
(8, 4, 1, '2016-12-07 22:09:06', '2016-12-07 22:09:06'),
(9, 4, 2, '2016-12-07 22:09:06', '2016-12-07 22:09:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacionpreguntas`
--

CREATE TABLE `evaluacionpreguntas` (
  `id` int(11) NOT NULL,
  `evaluacion_id` int(11) NOT NULL,
  `pregunta_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ponderacion` float NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `evaluacionpreguntas`
--

INSERT INTO `evaluacionpreguntas` (`id`, `evaluacion_id`, `pregunta_id`, `user_id`, `ponderacion`, `created`, `modified`) VALUES
(13, 9, 5, 1, 33.3333, '2016-12-08 03:36:22', '2016-12-08 03:36:22'),
(14, 9, 1, 1, 33.3333, '2016-12-08 03:36:22', '2016-12-08 03:36:22'),
(15, 9, 4, 1, 33.3333, '2016-12-08 03:36:22', '2016-12-08 03:36:22'),
(16, 9, 6, 2, 33.3333, '2016-12-08 03:46:26', '2016-12-08 03:46:26'),
(17, 9, 1, 2, 33.3333, '2016-12-08 03:46:26', '2016-12-08 03:46:26'),
(18, 9, 4, 2, 33.3333, '2016-12-08 03:46:26', '2016-12-08 03:46:26'),
(25, 7, 3, 1, 20, '2016-12-27 00:25:36', '2016-12-27 00:25:36'),
(26, 7, 5, 1, 20, '2016-12-27 00:25:36', '2016-12-27 00:25:36'),
(27, 7, 6, 1, 20, '2016-12-27 00:25:36', '2016-12-27 00:25:36'),
(28, 7, 14, 1, 20, '2016-12-27 00:25:36', '2016-12-27 00:25:36'),
(29, 7, 15, 1, 20, '2016-12-27 00:25:36', '2016-12-27 00:25:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacions`
--

CREATE TABLE `evaluacions` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `ponderada` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `contiempo` datetime DEFAULT NULL,
  `reloj` date DEFAULT NULL,
  `expiracion` datetime NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `evaluacions`
--

INSERT INTO `evaluacions` (`id`, `nombre`, `ponderada`, `contiempo`, `reloj`, `expiracion`, `categoria_id`, `created`, `modified`) VALUES
(7, 'Prueba corta IV', 'No', NULL, NULL, '0000-00-00 00:00:00', 1, '2016-11-17 05:34:51', '2016-12-07 14:47:30'),
(9, 'Prueba Larga I', 'Si', NULL, NULL, '0000-00-00 00:00:00', 1, '2016-11-21 04:48:20', '2016-12-07 14:48:28'),
(10, 'Prueba de practica de principios de la informatica', 'No', NULL, NULL, '0000-00-00 00:00:00', 5, '2016-11-24 02:24:03', '2016-11-24 02:24:03');

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
  `nivel` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `texto`, `photo`, `dir`, `categoria_id`, `nivel`, `tipo`, `created`, `modified`) VALUES
(1, '¿Que es POO?', NULL, NULL, 1, 1, 1, '2016-11-06 23:53:31', '2016-11-06 23:53:31'),
(3, '¿Que es Java?', NULL, NULL, 1, 1, 1, '2016-11-07 04:09:52', '2016-11-07 04:09:52'),
(4, 'Describa el significado de MVC', NULL, NULL, 1, 2, 1, '2016-11-07 04:11:17', '2016-11-07 04:11:17'),
(5, 'Explique la labor de un desarrollador de frond - end', NULL, NULL, 1, 1, 1, '2016-11-21 02:54:19', '2016-11-21 02:54:19'),
(6, '¿Ques es back-end?', NULL, NULL, 1, 1, 1, '2016-11-21 02:55:46', '2016-11-21 02:55:46'),
(8, '¿Que es una computadora?', NULL, NULL, 5, 1, 1, '2016-11-24 02:22:17', '2016-11-24 02:22:17'),
(9, 'Historia del computador', NULL, NULL, 5, 1, 1, '2016-11-24 02:23:34', '2016-11-24 02:23:34'),
(13, 'La siguiente imagen que representa?', 'images.jpg', 'webroot\\files\\Preguntas\\photo\\', 2, 2, 1, '2016-12-23 02:50:37', '2016-12-23 02:50:37'),
(14, 'Segun el siguiente diagrama que es mvc', 'Make ink.png', 'webroot\\files\\Preguntas\\photo\\', 1, 2, 3, '2016-12-27 00:12:08', '2016-12-27 00:12:08'),
(15, '¿Cuales de los siguientes lenguajes sirven para desarrollo web', NULL, NULL, 1, 3, 2, '2016-12-27 00:13:41', '2016-12-27 00:13:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentados`
--

CREATE TABLE `presentados` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `evaluacion_id` int(11) NOT NULL,
  `presenta` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `presentados`
--

INSERT INTO `presentados` (`id`, `user_id`, `evaluacion_id`, `presenta`, `created`, `modified`) VALUES
(6, 1, 9, 2, '2016-12-08 03:36:22', '2016-12-08 03:36:22'),
(7, 2, 9, 2, '2016-12-08 03:46:25', '2016-12-08 03:46:25'),
(10, 1, 7, 1, '2016-12-27 00:25:36', '2016-12-27 00:25:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requisitos`
--

CREATE TABLE `requisitos` (
  `id` int(11) NOT NULL,
  `evaluacion_id` int(11) NOT NULL,
  `nivel` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `requisitos`
--

INSERT INTO `requisitos` (`id`, `evaluacion_id`, `nivel`, `tipo`, `cantidad`, `created`, `modified`) VALUES
(6, 7, 1, 1, 3, '2016-11-20 00:00:00', '2016-11-20 00:00:00'),
(8, 9, 1, 1, 2, '2016-11-21 04:48:20', '2016-11-21 04:48:20'),
(9, 9, 2, 1, 1, '2016-11-21 04:48:20', '2016-11-21 04:48:20'),
(10, 10, 1, 1, 2, '2016-11-24 02:24:03', '2016-11-24 02:24:03'),
(11, 7, 2, 3, 1, '2016-12-27 00:15:04', '2016-12-27 00:15:04'),
(12, 7, 3, 2, 1, '2016-12-27 00:15:19', '2016-12-27 00:15:19');

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
  `correcta` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id`, `pregunta_id`, `texto`, `photo`, `dir`, `correcta`, `created`, `modified`) VALUES
(1, 1, 'Programacion orientada a objetos', NULL, NULL, 1, '2016-11-06 23:53:31', '2016-11-06 23:53:31'),
(2, 1, 'lenguaje de programación para aplicaciones moviles', NULL, NULL, 0, '2016-11-06 23:53:32', '2016-11-06 23:53:32'),
(5, 3, 'Un lenguaje de programación ', NULL, NULL, 1, '2016-11-07 04:09:52', '2016-11-07 04:09:52'),
(6, 3, 'Es una plataforma de ventas para paginas web', NULL, NULL, 0, '2016-11-07 04:09:52', '2016-11-07 04:09:52'),
(7, 4, 'Modelo-Vista-Controlador', NULL, NULL, 1, '2016-11-07 04:11:17', '2016-11-07 04:11:17'),
(8, 4, 'Framework de diseño web', NULL, NULL, 0, '2016-11-07 04:11:17', '2016-11-07 04:11:17'),
(11, 5, 'Es el encargado de la gestion de base de datos', NULL, NULL, 0, '2016-11-21 02:54:19', '2016-11-21 02:54:19'),
(12, 5, 'Se encarga de pasear a los perros', NULL, NULL, 0, '2016-11-21 02:54:19', '2016-11-21 02:54:19'),
(13, 5, 'Es una arquitectura de software', NULL, NULL, 0, '2016-11-21 02:54:19', '2016-11-21 02:54:19'),
(14, 5, 'encargado de desarrollar el lado del cliente ', NULL, NULL, 1, '2016-11-21 02:54:19', '2016-11-21 02:54:19'),
(15, 6, 'backup para una pc en mantenimiento', NULL, NULL, 0, '2016-11-21 02:55:46', '2016-11-21 02:55:46'),
(16, 6, 'Es el la parte de desarrollo orientada al servidor', NULL, NULL, 1, '2016-11-21 02:55:46', '2016-11-21 02:55:46'),
(17, 7, 'Una maquina de algoritmica', NULL, NULL, 1, '2016-11-24 02:21:18', '2016-11-24 02:21:18'),
(18, 7, 'una cosa', NULL, NULL, 0, '2016-11-24 02:21:18', '2016-11-24 02:21:18'),
(19, 8, 'Una maquina de algoritmica', NULL, NULL, 1, '2016-11-24 02:22:17', '2016-11-24 02:22:17'),
(20, 8, 'Una cosa ', NULL, NULL, 0, '2016-11-24 02:22:17', '2016-11-24 02:22:17'),
(21, 9, 'Una historia muy interesante', NULL, NULL, 0, '2016-11-24 02:23:34', '2016-11-24 02:23:34'),
(22, 9, 'tiene 6 generaciones actualmente', NULL, NULL, 1, '2016-11-24 02:23:34', '2016-11-24 02:23:34'),
(23, 13, 'Una chica sexy', NULL, NULL, 1, '2016-12-23 02:50:38', '2016-12-23 02:50:38'),
(24, 13, 'Un pollo espacial', NULL, NULL, 0, '2016-12-23 02:50:38', '2016-12-23 02:50:38'),
(25, 15, 'PHP', NULL, NULL, 1, '2016-12-27 00:13:42', '2016-12-27 00:13:42'),
(26, 15, 'C++', NULL, NULL, 0, '2016-12-27 00:13:42', '2016-12-27 00:13:42'),
(27, 15, 'Python', NULL, NULL, 1, '2016-12-27 00:13:42', '2016-12-27 00:13:42'),
(28, 15, 'Ruby', NULL, NULL, 1, '2016-12-27 00:13:42', '2016-12-27 00:13:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `id` int(11) NOT NULL,
  `evaluacionpregunta_id` int(11) NOT NULL,
  `respuesta_id` int(11) NOT NULL,
  `correcta` int(11) NOT NULL,
  `puntos` float DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`id`, `evaluacionpregunta_id`, `respuesta_id`, `correcta`, `puntos`, `created`, `modified`) VALUES
(10, 12, 5, 1, 33.3333, '2016-12-08 02:26:18', '2016-12-08 02:26:18'),
(11, 11, 1, 1, 33.3333, '2016-12-08 02:26:20', '2016-12-08 02:26:20'),
(12, 10, 15, 0, 0, '2016-12-08 02:26:21', '2016-12-08 02:26:21'),
(13, 14, 1, 1, 33.3333, '2016-12-08 03:36:34', '2016-12-08 03:36:34'),
(14, 18, 7, 1, 33.3333, '2016-12-08 03:46:39', '2016-12-08 03:46:39'),
(15, 17, 1, 1, 33.3333, '2016-12-08 03:46:41', '2016-12-08 03:46:41');

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
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `cedula`, `sexo`, `direccion`, `username`, `password`, `email`, `role`, `created`, `modified`) VALUES
(1, 'Miguel', 'Agudelo', 23423654, 'masculino', 'la torre cuatricentenaria', 'miguelhxc', '$2y$10$XAlNsh0YAlnqv4D2bi1xq.VBT7Wg7Y7D5v5KdPTNBiGCnrqD0Q2f2', 'miguelhxc37@gmail.com', 'admin', '2016-11-21 02:47:48', '2016-11-21 02:47:48'),
(2, 'Gilberto', 'tonto', 25412345, 'Masculino', 'Por donde vive gilberto', 'soygilberto', '$2y$10$vsMOdd6GdDdwzFCwfc0nw.Kj4e5jfVk4cjvjH6uvk396c4hTm5X2S', 'soygilberto@gmail.com', 'user', '2016-12-05 04:19:09', '2016-12-05 04:19:09'),
(3, 'Profesor', 'Profesor', 4444541, 'Masculino', 'La casa del profesor', 'profesor', '$2y$10$tF7QUL8qLjomHDVTuz4y..Ly7LfptpkZNxshcadDRNJZ0urQ8xig6', 'profesor@escuela.com', 'admin', '2016-12-07 14:45:51', '2016-12-07 14:46:51'),
(5, 'caraepapa', 'caraepapa', 5564546, 'Masculino', 'asasdasd', 'caraepapa', '$2y$10$moUsH6j3bGgNDv.ac1giKuO5FJqzC4HGTo0p4OgL20atS2Ne9HcZO', 'caraepapa@caraepapa.com', 'user', '2016-12-08 02:43:05', '2016-12-08 02:43:05');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bibliotecas`
--
ALTER TABLE `bibliotecas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoriausers`
--
ALTER TABLE `categoriausers`
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
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `presentados`
--
ALTER TABLE `presentados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `requisitos`
--
ALTER TABLE `requisitos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
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
-- AUTO_INCREMENT de la tabla `bibliotecas`
--
ALTER TABLE `bibliotecas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `categoriausers`
--
ALTER TABLE `categoriausers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `evaluacionpreguntas`
--
ALTER TABLE `evaluacionpreguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `evaluacions`
--
ALTER TABLE `evaluacions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `presentados`
--
ALTER TABLE `presentados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `requisitos`
--
ALTER TABLE `requisitos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
