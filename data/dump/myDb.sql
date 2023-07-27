-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: mysql
-- Tiempo de generación: 22-07-2023 a las 02:40:28
-- Versión del servidor: 8.0.33
-- Versión de PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `myDb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MusicalInstruments`
--

CREATE TABLE `MusicalInstruments` (
  `id` bigint NOT NULL,
  `alias` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `createdat` datetime NOT NULL,
  `enable` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `MusicalInstruments`
--

INSERT INTO `MusicalInstruments` (`id`, `alias`, `name`, `description`, `createdat`, `enable`) VALUES
(1, 'GIB', 'Gibson', 'Gibson', '2023-07-18 01:27:14', 1),
(2, 'FEN', 'Fender', 'Fender', '2023-07-18 01:28:17', 1),
(3, 'PRS', 'Paul Reed Smith', 'Paul Reed Smith', '2023-07-18 01:29:05', 1),
(4, 'IBZ', 'Ibanez', 'Ibanez', '2023-07-18 01:29:31', 1),
(5, 'CHA', 'Chancho', 'Chancho', '2023-07-18 01:58:19', 1),
(6, 'EPI', 'Epiphone', 'Epiphone for every stage', '2023-07-18 05:02:59', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MusicalInstrumentsSelected`
--

CREATE TABLE `MusicalInstrumentsSelected` (
  `alias` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `MusicalInstrumentsSelected`
--

INSERT INTO `MusicalInstrumentsSelected` (`alias`) VALUES
('EPI'),
('FEN'),
('GIB'),
('PRS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Session`
--

CREATE TABLE `Session` (
  `Session_Id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Session_Create` datetime NOT NULL,
  `Session_Expires` datetime NOT NULL,
  `Session_Data` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `Session`
--

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `MusicalInstruments`
--
ALTER TABLE `MusicalInstruments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `MusicalInstrumentsSelected`
--
ALTER TABLE `MusicalInstrumentsSelected`
  ADD PRIMARY KEY (`alias`);

--
-- Indices de la tabla `Session`
--
ALTER TABLE `Session`
  ADD PRIMARY KEY (`Session_Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `MusicalInstruments`
--
ALTER TABLE `MusicalInstruments`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;


CREATE TABLE `files` (
  `id` int NOT NULL,
  `filename` varchar(100) NOT NULL,
  `filetype` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `state` int NOT NULL,
  `path` varchar(255) NOT NULL,
  `owner` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;
