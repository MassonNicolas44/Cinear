-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: sql101.byetcluster.com
-- Tiempo de generación: 06-09-2024 a las 23:47:34
-- Versión del servidor: 10.6.19-MariaDB
-- Versión de PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `if0_36004005_ecocine`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actor`
--

CREATE TABLE `actor` (
  `id` int(11) NOT NULL,
  `id_Nacionalidad_Act` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actor`
--

INSERT INTO `actor` (`id`, `id_Nacionalidad_Act`, `nombre`, `apellido`, `created_at`, `updated_at`) VALUES
(1, 2, 'Juan', 'Perez', '2024-02-09 01:07:45', '2024-02-09 01:07:45'),
(2, 2, 'Sofia', 'Gutierrez', '2024-02-09 01:09:39', '2024-02-09 01:09:39'),
(3, 4, 'Ruben', 'Zvend', '2024-02-09 01:10:37', '2024-02-09 01:10:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Accion', '2024-02-10 00:45:27', '2024-04-01 23:37:59'),
(2, 'Drama', '2024-02-10 00:46:03', '2024-02-10 00:46:03'),
(3, 'Terror', '2024-02-10 00:46:09', '2024-02-10 00:46:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcion`
--

CREATE TABLE `funcion` (
  `id` int(11) NOT NULL,
  `id_Sala` int(11) NOT NULL,
  `id_Pelicula` int(11) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(255) NOT NULL,
  `lvhorario1` time DEFAULT NULL,
  `lvhorario2` time DEFAULT NULL,
  `lvhorario3` time DEFAULT NULL,
  `lvhorario4` time DEFAULT NULL,
  `sdhorario1` time DEFAULT NULL,
  `sdhorario2` time DEFAULT NULL,
  `sdhorario3` time DEFAULT NULL,
  `sdhorario4` time DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `funcion`
--

INSERT INTO `funcion` (`id`, `id_Sala`, `id_Pelicula`, `fechaInicio`, `fechaFin`, `fecha`, `estado`, `lvhorario1`, `lvhorario2`, `lvhorario3`, `lvhorario4`, `sdhorario1`, `sdhorario2`, `sdhorario3`, `sdhorario4`, `created_at`, `updated_at`) VALUES
(159, 4, 26, '2024-04-17', '2024-04-24', '2024-04-23', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-04-19 19:16:06', '2024-04-19 20:58:18'),
(160, 1, 26, '2024-04-17', '2024-04-24', '2024-04-24', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-04-19 19:16:19', '2024-05-09 18:10:47'),
(161, 5, 26, '2024-04-17', '2024-04-24', '2024-04-19', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-04-19 19:20:00', '2024-05-09 18:21:50'),
(162, 5, 26, '2024-04-17', '2024-04-24', '2024-04-20', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-04-19 19:20:00', '2024-05-09 18:21:50'),
(163, 5, 26, '2024-04-17', '2024-04-24', '2024-04-21', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-04-19 19:20:00', '2024-05-09 18:21:50'),
(164, 5, 26, '2024-04-17', '2024-04-24', '2024-04-22', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-04-19 19:20:00', '2024-05-09 18:21:50'),
(166, 5, 26, '2024-04-17', '2024-04-23', '2024-04-23', 'Habilitada', '00:45:00', NULL, NULL, NULL, NULL, '04:15:00', NULL, NULL, '2024-04-19 19:20:34', '2024-04-19 19:20:34'),
(173, 5, 26, '2024-04-17', '2024-04-24', '2024-04-17', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-05-09 18:10:47', '2024-05-09 18:21:50'),
(174, 5, 26, '2024-04-17', '2024-04-24', '2024-04-18', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-05-09 18:10:47', '2024-05-09 18:21:50'),
(175, 5, 26, '2024-04-17', '2024-04-24', '2024-04-19', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-05-09 18:10:47', '2024-05-09 18:21:50'),
(176, 5, 26, '2024-04-17', '2024-04-24', '2024-04-20', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-05-09 18:10:47', '2024-05-09 18:21:50'),
(177, 5, 26, '2024-04-17', '2024-04-24', '2024-04-21', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-05-09 18:10:47', '2024-05-09 18:21:50'),
(178, 5, 26, '2024-04-17', '2024-04-24', '2024-04-22', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-05-09 18:10:47', '2024-05-09 18:21:50'),
(179, 5, 26, '2024-04-17', '2024-04-24', '2024-04-23', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-05-09 18:10:47', '2024-05-09 18:21:50'),
(180, 5, 26, '2024-04-17', '2024-04-24', '2024-04-24', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-05-09 18:10:47', '2024-05-09 18:21:50'),
(181, 5, 26, '2024-04-17', '2024-04-24', '2024-04-17', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-05-09 18:21:50', '2024-05-09 18:21:50'),
(182, 5, 26, '2024-04-17', '2024-04-24', '2024-04-18', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-05-09 18:21:50', '2024-05-09 18:21:50'),
(183, 5, 26, '2024-04-17', '2024-04-24', '2024-04-19', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-05-09 18:21:50', '2024-05-09 18:21:50'),
(184, 5, 26, '2024-04-17', '2024-04-24', '2024-04-20', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-05-09 18:21:50', '2024-05-09 18:21:50'),
(185, 5, 26, '2024-04-17', '2024-04-24', '2024-04-21', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-05-09 18:21:50', '2024-05-09 18:21:50'),
(186, 5, 26, '2024-04-17', '2024-04-24', '2024-04-22', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-05-09 18:21:50', '2024-05-09 18:21:50'),
(187, 5, 26, '2024-04-17', '2024-04-24', '2024-04-24', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-05-09 18:21:50', '2024-05-09 18:21:50'),
(188, 4, 26, '2024-04-17', '2024-04-24', '2024-04-17', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-05-09 18:22:25', '2024-05-09 18:22:25'),
(189, 4, 26, '2024-04-17', '2024-04-24', '2024-04-18', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-05-09 18:22:25', '2024-05-09 18:22:25'),
(190, 4, 26, '2024-04-17', '2024-04-24', '2024-04-19', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-05-09 18:22:25', '2024-05-09 18:22:25'),
(191, 4, 26, '2024-04-17', '2024-04-24', '2024-04-20', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-05-09 18:22:25', '2024-05-09 18:22:25'),
(192, 4, 26, '2024-04-17', '2024-04-24', '2024-04-21', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-05-09 18:22:25', '2024-05-09 18:22:25'),
(193, 4, 26, '2024-04-17', '2024-04-24', '2024-04-22', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-05-09 18:22:25', '2024-05-09 18:22:25'),
(194, 4, 26, '2024-04-17', '2024-04-24', '2024-04-24', 'Habilitada', '01:00:00', '01:15:00', NULL, NULL, '02:15:00', '02:45:00', NULL, NULL, '2024-05-09 18:22:25', '2024-05-09 18:22:25'),
(196, 4, 24, '2024-05-09', '2024-05-13', '2024-05-10', 'Habilitada', NULL, '03:00:00', NULL, NULL, NULL, NULL, '04:15:00', NULL, '2024-05-09 18:25:33', '2024-05-09 18:49:21'),
(197, 4, 24, '2024-05-09', '2024-05-13', '2024-05-11', 'Habilitada', NULL, '03:00:00', NULL, NULL, NULL, NULL, '04:15:00', NULL, '2024-05-09 18:25:33', '2024-05-09 18:49:21'),
(198, 4, 24, '2024-05-09', '2024-05-13', '2024-05-12', 'Habilitada', NULL, '03:00:00', NULL, NULL, NULL, NULL, '04:15:00', NULL, '2024-05-09 18:25:33', '2024-05-09 18:49:21'),
(199, 4, 24, '2024-05-09', '2024-05-13', '2024-05-13', 'Habilitada', NULL, '03:00:00', NULL, NULL, NULL, NULL, '04:15:00', NULL, '2024-05-09 18:25:33', '2024-05-09 18:49:21'),
(200, 4, 24, '2024-05-09', '2024-05-13', '2024-05-09', 'Habilitada', NULL, '03:15:00', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-09 18:26:12', '2024-05-09 18:51:47'),
(205, 1, 26, '2024-05-09', '2024-05-13', '2024-05-09', 'Habilitada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-09 19:03:26', '2024-05-09 19:03:26'),
(206, 1, 26, '2024-05-09', '2024-05-13', '2024-05-10', 'Habilitada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-09 19:03:26', '2024-05-09 19:03:26'),
(207, 1, 26, '2024-05-09', '2024-05-13', '2024-05-11', 'Habilitada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-09 19:03:26', '2024-05-09 19:03:26'),
(208, 1, 26, '2024-05-09', '2024-05-13', '2024-05-12', 'Habilitada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-09 19:03:26', '2024-05-09 19:03:26'),
(209, 1, 26, '2024-05-09', '2024-05-13', '2024-05-13', 'Habilitada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-09 19:03:26', '2024-05-09 19:03:26'),
(210, 1, 25, '2024-05-09', '2024-05-14', '2024-05-09', 'Habilitada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-09 19:03:37', '2024-05-09 19:03:37'),
(211, 1, 25, '2024-05-09', '2024-05-14', '2024-05-10', 'Habilitada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-09 19:03:37', '2024-05-09 19:03:37'),
(212, 1, 25, '2024-05-09', '2024-05-14', '2024-05-11', 'Habilitada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-09 19:03:37', '2024-05-09 19:03:37'),
(213, 1, 25, '2024-05-09', '2024-05-14', '2024-05-12', 'Habilitada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-09 19:03:37', '2024-05-09 19:03:37'),
(214, 1, 25, '2024-05-09', '2024-05-14', '2024-05-13', 'Habilitada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-09 19:03:37', '2024-05-09 19:03:37'),
(215, 1, 25, '2024-05-09', '2024-05-14', '2024-05-14', 'Habilitada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-09 19:03:37', '2024-05-09 19:03:37'),
(216, 1, 24, '2024-05-15', '2024-05-20', '2024-05-15', 'Habilitada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-15 22:46:54', '2024-05-15 22:46:54'),
(217, 1, 24, '2024-05-15', '2024-05-20', '2024-05-16', 'Habilitada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-15 22:46:54', '2024-05-15 22:46:54'),
(218, 1, 24, '2024-05-15', '2024-05-20', '2024-05-17', 'Habilitada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-15 22:46:54', '2024-05-15 22:46:54'),
(219, 1, 24, '2024-05-15', '2024-05-20', '2024-05-18', 'Habilitada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-15 22:46:54', '2024-05-15 22:46:54'),
(220, 1, 24, '2024-05-15', '2024-05-20', '2024-05-19', 'Habilitada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-15 22:46:54', '2024-05-15 22:46:54'),
(221, 1, 24, '2024-05-15', '2024-05-20', '2024-05-20', 'Habilitada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-15 22:46:54', '2024-05-15 22:46:54'),
(222, 1, 24, '2024-05-22', '2024-05-22', '2024-05-22', 'Habilitada', NULL, '01:00:00', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-22 18:10:23', '2024-05-22 18:12:17'),
(223, 1, 88, '2024-05-22', '2024-05-22', '2024-05-22', 'Habilitada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-22 20:38:22', '2024-05-22 20:38:22'),
(224, 1, 24, '2024-05-24', '2024-05-25', '2024-05-24', 'Habilitada', '00:15:00', '01:30:00', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-24 18:17:43', '2024-05-24 18:17:43'),
(225, 1, 24, '2024-05-24', '2024-05-25', '2024-05-25', 'Habilitada', '00:15:00', '01:30:00', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-24 18:17:43', '2024-05-24 18:17:43'),
(226, 4, 90, '2024-05-28', '2024-06-11', '2024-05-28', 'Habilitada', '18:00:00', '20:30:00', '23:00:00', NULL, '15:30:00', '18:00:00', '20:30:00', '23:00:00', '2024-05-29 00:01:56', '2024-05-29 00:01:56'),
(227, 4, 90, '2024-05-28', '2024-06-11', '2024-05-29', 'Habilitada', '18:00:00', '20:30:00', '23:00:00', NULL, '15:30:00', '18:00:00', '20:30:00', '23:00:00', '2024-05-29 00:01:56', '2024-05-29 00:01:56'),
(228, 4, 90, '2024-05-28', '2024-06-11', '2024-05-30', 'Habilitada', '18:00:00', '20:30:00', '23:00:00', NULL, '15:30:00', '18:00:00', '20:30:00', '23:00:00', '2024-05-29 00:01:56', '2024-05-29 00:01:56'),
(229, 4, 90, '2024-05-28', '2024-06-11', '2024-05-31', 'Habilitada', '18:00:00', '20:30:00', '23:00:00', NULL, '15:30:00', '18:00:00', '20:30:00', '23:00:00', '2024-05-29 00:01:56', '2024-05-29 00:01:56'),
(230, 4, 90, '2024-05-28', '2024-06-11', '2024-06-01', 'Habilitada', '18:00:00', '20:30:00', '23:00:00', NULL, '15:30:00', '18:00:00', '20:30:00', '23:00:00', '2024-05-29 00:01:56', '2024-05-29 00:01:56'),
(231, 4, 90, '2024-05-28', '2024-06-11', '2024-06-02', 'Habilitada', '18:00:00', '20:30:00', '23:00:00', NULL, '15:30:00', '18:00:00', '20:30:00', '23:00:00', '2024-05-29 00:01:56', '2024-05-29 00:01:56'),
(232, 4, 90, '2024-05-28', '2024-06-11', '2024-06-03', 'Habilitada', '18:00:00', '20:30:00', '23:00:00', NULL, '15:30:00', '18:00:00', '20:30:00', '23:00:00', '2024-05-29 00:01:56', '2024-05-29 00:01:56'),
(233, 4, 90, '2024-05-28', '2024-06-11', '2024-06-04', 'Habilitada', '18:00:00', '20:30:00', '23:00:00', NULL, '15:30:00', '18:00:00', '20:30:00', '23:00:00', '2024-05-29 00:01:56', '2024-05-29 00:01:56'),
(234, 4, 90, '2024-05-28', '2024-06-11', '2024-06-05', 'Habilitada', '18:00:00', '20:30:00', '23:00:00', NULL, '15:30:00', '18:00:00', '20:30:00', '23:00:00', '2024-05-29 00:01:56', '2024-05-29 00:01:56'),
(235, 4, 90, '2024-05-28', '2024-06-11', '2024-06-06', 'Habilitada', '18:00:00', '20:30:00', '23:00:00', NULL, '15:30:00', '18:00:00', '20:30:00', '23:00:00', '2024-05-29 00:01:56', '2024-05-29 00:01:56'),
(236, 4, 90, '2024-05-28', '2024-06-11', '2024-06-07', 'Habilitada', '18:00:00', '20:30:00', '23:00:00', NULL, '15:30:00', '18:00:00', '20:30:00', '23:00:00', '2024-05-29 00:01:56', '2024-05-29 00:01:56'),
(237, 4, 90, '2024-05-28', '2024-06-11', '2024-06-08', 'Habilitada', '18:00:00', '20:30:00', '23:00:00', NULL, '15:30:00', '18:00:00', '20:30:00', '23:00:00', '2024-05-29 00:01:56', '2024-05-29 00:01:56'),
(238, 4, 90, '2024-05-28', '2024-06-11', '2024-06-09', 'Habilitada', '18:00:00', '20:30:00', '23:00:00', NULL, '15:30:00', '18:00:00', '20:30:00', '23:00:00', '2024-05-29 00:01:56', '2024-05-29 00:01:56'),
(239, 4, 90, '2024-05-28', '2024-06-11', '2024-06-10', 'Habilitada', '18:00:00', '20:30:00', '23:00:00', NULL, '15:30:00', '18:00:00', '20:30:00', '23:00:00', '2024-05-29 00:01:56', '2024-05-29 00:01:56'),
(240, 4, 90, '2024-05-28', '2024-06-11', '2024-06-11', 'Habilitada', '18:00:00', '20:30:00', '23:00:00', NULL, '15:30:00', '18:00:00', '20:30:00', '23:00:00', '2024-05-29 00:01:56', '2024-05-29 00:01:56'),
(241, 1, 89, '2024-05-28', '2024-06-11', '2024-05-28', 'Habilitada', '16:00:00', '18:30:00', '21:00:00', NULL, '13:30:00', '16:00:00', '21:00:00', '23:30:00', '2024-05-29 00:02:30', '2024-05-29 00:02:30'),
(242, 1, 89, '2024-05-28', '2024-06-11', '2024-05-29', 'Habilitada', '16:00:00', '18:30:00', '21:00:00', NULL, '13:30:00', '16:00:00', '21:00:00', '23:30:00', '2024-05-29 00:02:30', '2024-05-29 00:02:30'),
(243, 1, 89, '2024-05-28', '2024-06-11', '2024-05-30', 'Habilitada', '16:00:00', '18:30:00', '21:00:00', NULL, '13:30:00', '16:00:00', '21:00:00', '23:30:00', '2024-05-29 00:02:30', '2024-05-29 00:02:30'),
(244, 1, 89, '2024-05-28', '2024-06-11', '2024-05-31', 'Habilitada', '16:00:00', '18:30:00', '21:00:00', NULL, '13:30:00', '16:00:00', '21:00:00', '23:30:00', '2024-05-29 00:02:30', '2024-05-29 00:02:30'),
(245, 1, 89, '2024-05-28', '2024-06-11', '2024-06-01', 'Habilitada', '16:00:00', '18:30:00', '21:00:00', NULL, '13:30:00', '16:00:00', '21:00:00', '23:30:00', '2024-05-29 00:02:30', '2024-05-29 00:02:30'),
(246, 1, 89, '2024-05-28', '2024-06-11', '2024-06-02', 'Habilitada', '16:00:00', '18:30:00', '21:00:00', NULL, '13:30:00', '16:00:00', '21:00:00', '23:30:00', '2024-05-29 00:02:30', '2024-05-29 00:02:30'),
(247, 1, 89, '2024-05-28', '2024-06-11', '2024-06-03', 'Habilitada', '16:00:00', '18:30:00', '21:00:00', NULL, '13:30:00', '16:00:00', '21:00:00', '23:30:00', '2024-05-29 00:02:30', '2024-05-29 00:02:30'),
(248, 1, 89, '2024-05-28', '2024-06-11', '2024-06-04', 'Habilitada', '16:00:00', '18:30:00', '21:00:00', NULL, '13:30:00', '16:00:00', '21:00:00', '23:30:00', '2024-05-29 00:02:30', '2024-05-29 00:02:30'),
(249, 1, 89, '2024-05-28', '2024-06-11', '2024-06-05', 'Habilitada', '16:00:00', '18:30:00', '21:00:00', NULL, '13:30:00', '16:00:00', '21:00:00', '23:30:00', '2024-05-29 00:02:30', '2024-05-29 00:02:30'),
(250, 1, 89, '2024-05-28', '2024-06-11', '2024-06-06', 'Habilitada', '16:00:00', '18:30:00', '21:00:00', NULL, '13:30:00', '16:00:00', '21:00:00', '23:30:00', '2024-05-29 00:02:30', '2024-05-29 00:02:30'),
(251, 1, 89, '2024-05-28', '2024-06-11', '2024-06-07', 'Habilitada', '16:00:00', '18:30:00', '21:00:00', NULL, '13:30:00', '16:00:00', '21:00:00', '23:30:00', '2024-05-29 00:02:30', '2024-05-29 00:02:30'),
(252, 1, 89, '2024-05-28', '2024-06-11', '2024-06-08', 'Habilitada', '16:00:00', '18:30:00', '21:00:00', NULL, '13:30:00', '16:00:00', '21:00:00', '23:30:00', '2024-05-29 00:02:30', '2024-05-29 00:02:30'),
(253, 1, 89, '2024-05-28', '2024-06-11', '2024-06-09', 'Habilitada', '16:00:00', '18:30:00', '21:00:00', NULL, '13:30:00', '16:00:00', '21:00:00', '23:30:00', '2024-05-29 00:02:30', '2024-05-29 00:02:30'),
(254, 1, 89, '2024-05-28', '2024-06-11', '2024-06-10', 'Habilitada', '16:00:00', '18:30:00', '21:00:00', NULL, '13:30:00', '16:00:00', '21:00:00', '23:30:00', '2024-05-29 00:02:30', '2024-05-29 00:02:30'),
(255, 1, 89, '2024-05-28', '2024-06-11', '2024-06-11', 'Habilitada', '16:00:00', '18:30:00', '21:00:00', NULL, '13:30:00', '16:00:00', '21:00:00', '23:30:00', '2024-05-29 00:02:30', '2024-05-29 00:02:30'),
(256, 1, 88, '2024-05-29', '2024-06-12', '2024-05-29', 'Habilitada', '18:00:00', '20:00:00', '22:00:00', NULL, '16:00:00', '18:00:00', '20:00:00', '22:00:00', '2024-05-29 00:03:45', '2024-05-29 00:03:45'),
(257, 1, 88, '2024-05-29', '2024-06-12', '2024-05-30', 'Habilitada', '18:00:00', '20:00:00', '22:00:00', NULL, '16:00:00', '18:00:00', '20:00:00', '22:00:00', '2024-05-29 00:03:45', '2024-05-29 00:03:45'),
(258, 1, 88, '2024-05-29', '2024-06-12', '2024-05-31', 'Habilitada', '18:00:00', '20:00:00', '22:00:00', NULL, '16:00:00', '18:00:00', '20:00:00', '22:00:00', '2024-05-29 00:03:45', '2024-05-29 00:03:45'),
(259, 1, 88, '2024-05-29', '2024-06-12', '2024-06-01', 'Habilitada', '18:00:00', '20:00:00', '22:00:00', NULL, '16:00:00', '18:00:00', '20:00:00', '22:00:00', '2024-05-29 00:03:45', '2024-05-29 00:03:45'),
(260, 1, 88, '2024-05-29', '2024-06-12', '2024-06-02', 'Habilitada', '18:00:00', '20:00:00', '22:00:00', NULL, '16:00:00', '18:00:00', '20:00:00', '22:00:00', '2024-05-29 00:03:45', '2024-05-29 00:03:45'),
(261, 1, 88, '2024-05-29', '2024-06-12', '2024-06-03', 'Habilitada', '18:00:00', '20:00:00', '22:00:00', NULL, '16:00:00', '18:00:00', '20:00:00', '22:00:00', '2024-05-29 00:03:45', '2024-05-29 00:03:45'),
(262, 1, 88, '2024-05-29', '2024-06-12', '2024-06-04', 'Habilitada', '18:00:00', '20:00:00', '22:00:00', NULL, '16:00:00', '18:00:00', '20:00:00', '22:00:00', '2024-05-29 00:03:45', '2024-05-29 00:03:45'),
(263, 1, 88, '2024-05-29', '2024-06-12', '2024-06-05', 'Habilitada', '18:00:00', '20:00:00', '22:00:00', NULL, '16:00:00', '18:00:00', '20:00:00', '22:00:00', '2024-05-29 00:03:45', '2024-05-29 00:03:45'),
(264, 1, 88, '2024-05-29', '2024-06-12', '2024-06-06', 'Habilitada', '18:00:00', '20:00:00', '22:00:00', NULL, '16:00:00', '18:00:00', '20:00:00', '22:00:00', '2024-05-29 00:03:45', '2024-05-29 00:03:45'),
(265, 1, 88, '2024-05-29', '2024-06-12', '2024-06-07', 'Habilitada', '18:00:00', '20:00:00', '22:00:00', NULL, '16:00:00', '18:00:00', '20:00:00', '22:00:00', '2024-05-29 00:03:45', '2024-05-29 00:03:45'),
(266, 1, 88, '2024-05-29', '2024-06-12', '2024-06-08', 'Habilitada', '18:00:00', '20:00:00', '22:00:00', NULL, '16:00:00', '18:00:00', '20:00:00', '22:00:00', '2024-05-29 00:03:45', '2024-05-29 00:03:45'),
(267, 1, 88, '2024-05-29', '2024-06-12', '2024-06-09', 'Habilitada', '18:00:00', '20:00:00', '22:00:00', NULL, '16:00:00', '18:00:00', '20:00:00', '22:00:00', '2024-05-29 00:03:45', '2024-05-29 00:03:45'),
(268, 1, 88, '2024-05-29', '2024-06-12', '2024-06-10', 'Habilitada', '18:00:00', '20:00:00', '22:00:00', NULL, '16:00:00', '18:00:00', '20:00:00', '22:00:00', '2024-05-29 00:03:45', '2024-05-29 00:03:45'),
(269, 1, 88, '2024-05-29', '2024-06-12', '2024-06-11', 'Habilitada', '18:00:00', '20:00:00', '22:00:00', NULL, '16:00:00', '18:00:00', '20:00:00', '22:00:00', '2024-05-29 00:03:45', '2024-05-29 00:03:45'),
(270, 1, 88, '2024-05-29', '2024-06-12', '2024-06-12', 'Habilitada', '18:00:00', '20:00:00', '22:00:00', NULL, '16:00:00', '18:00:00', '20:00:00', '22:00:00', '2024-05-29 00:03:45', '2024-05-29 00:03:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idioma`
--

CREATE TABLE `idioma` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `idioma`
--

INSERT INTO `idioma` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(2, 'Español', '2024-01-31 03:04:19', '2024-01-31 03:04:19'),
(3, 'Ingles', '2024-01-31 03:04:23', '2024-01-31 03:04:23'),
(4, 'Frances', '2024-01-31 03:04:27', '2024-01-31 03:04:27'),
(5, 'Aleman', '2024-01-31 03:04:32', '2024-01-31 03:04:32'),
(7, 'Ruso', '2024-01-31 03:05:29', '2024-01-31 03:05:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nacionalidad`
--

CREATE TABLE `nacionalidad` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `sigla` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nacionalidad`
--

INSERT INTO `nacionalidad` (`id`, `descripcion`, `sigla`, `created_at`, `updated_at`) VALUES
(1, 'Argentina', 'ARG', '2024-01-26 22:53:32', '2024-01-26 22:53:32'),
(2, 'Chile', 'CHI', '2024-01-26 22:58:30', '2024-01-31 02:09:09'),
(4, 'Russia', 'RUS', '2024-02-09 01:10:28', '2024-02-09 01:10:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id` int(11) NOT NULL,
  `id_Categoria` int(11) NOT NULL,
  `id_Nacionalidad_Pel` int(11) NOT NULL,
  `id_Idioma` int(11) NOT NULL,
  `id_Tipo` int(11) NOT NULL,
  `id_Restriccion` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `año` int(11) NOT NULL,
  `duracion` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precio` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id`, `id_Categoria`, `id_Nacionalidad_Pel`, `id_Idioma`, `id_Tipo`, `id_Restriccion`, `nombre`, `año`, `duracion`, `descripcion`, `precio`, `image_path`, `url`, `estado`, `created_at`, `updated_at`) VALUES
(24, 3, 2, 4, 6, 1, 'Buscar', 2005, 128, 'Imagen de buscar', 50, '17077745882.jpg', 'https://www.youtube.com/watch?v=YQHsXMglC9A', 'Habilitada', '2024-02-12 21:49:48', '2024-05-16 18:45:55'),
(25, 1, 1, 5, 6, 1, 'Imagen Vacia', 2006, 7, 'imagen vacia', 4, '17077746054.jpeg', '', 'Habilitada', '2024-02-12 21:50:05', '2024-04-22 21:52:45'),
(26, 1, 1, 2, 5, 2, 'Dune', 2023, 280, 'Segunda Parte', 100, 'noImagen.png', '', 'Habilitada', '2024-02-12 21:59:14', '2024-03-14 16:56:34'),
(88, 1, 1, 2, 6, 1, 'Mision Imposible 8', 2022, 160, 'Sentencia Mortal Parte 1', 100, '1716420985mision_imposible.jpg', 'https://www.youtube.com/watch?v=XoDmKCZBeeI', 'Habilitada', '2024-05-22 19:47:29', '2024-05-29 00:04:03'),
(89, 1, 1, 2, 5, 3, 'Dune: Parte 1', 2021, 166, 'Arrakis, también denominado \"Dune\", se ha convertido en el planeta más importante del universo. A su alrededor comienza una gigantesca lucha por el poder que culmina en una guerra interestelar.', 3000, '1716951440dune_parte_1.jpg', 'https://www.youtube.com/watch?v=kPjOcWHVNGo', 'Habilitada', '2024-05-28 23:57:21', '2024-05-28 23:57:21'),
(90, 1, 1, 2, 5, 3, 'Dune: Parte 2', 2024, 180, 'Paul Atreides se une a Chani y a los Fremen mientras busca venganza contra los conspiradores que destruyeron a su familia. Paul se enfrenta a una elección entre el amor de su vida y el destino del universo, y debe evitar un futuro terrible.', 3000, '1716951496dune_parte_2.jpg', 'https://www.youtube.com/watch?v=esezQhsrix0', 'Habilitada', '2024-05-28 23:58:16', '2024-05-28 23:58:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparto`
--

CREATE TABLE `reparto` (
  `id` int(11) NOT NULL,
  `id_Pelicula` int(11) NOT NULL,
  `id_Actor` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reparto`
--

INSERT INTO `reparto` (`id`, `id_Pelicula`, `id_Actor`, `created_at`, `updated_at`) VALUES
(10, 24, 3, '2024-02-13 23:30:45', '2024-02-13 23:30:45'),
(11, 24, 2, '2024-02-13 23:31:40', '2024-02-13 23:31:40'),
(13, 25, 2, '2024-02-14 00:05:20', '2024-02-14 00:05:20'),
(14, 26, 3, '2024-03-06 01:16:40', '2024-03-06 01:16:40'),
(15, 24, 1, '2024-03-07 00:54:20', '2024-03-07 00:54:20'),
(18, 26, 2, '2024-03-08 01:18:29', '2024-03-08 01:18:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `id_Funcion` int(11) NOT NULL,
  `fecha_funcion` date NOT NULL,
  `hora_funcion` time NOT NULL,
  `cantidad_boleto` int(11) NOT NULL,
  `precio_final` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id`, `id_Funcion`, `fecha_funcion`, `hora_funcion`, `cantidad_boleto`, `precio_final`, `estado`, `created_at`, `updated_at`) VALUES
(51, 159, '2024-04-23', '01:00:00', 2, 200, 'Inhabilitada', '2024-04-23 21:04:19', '2024-04-23 21:05:31'),
(52, 159, '2024-04-23', '01:15:00', 3, 300, 'En Proceso', '2024-04-23 21:04:30', '2024-04-23 21:04:30'),
(53, 166, '2024-04-23', '00:45:00', 1, 100, 'En Proceso', '2024-04-23 21:04:41', '2024-04-23 21:04:41'),
(54, 159, '2024-04-23', '01:00:00', 50, 5000, 'Habilitada', '2024-04-23 21:05:39', '2024-04-23 21:05:39'),
(55, 160, '2024-04-24', '01:00:00', 1, 100, 'En Proceso', '2024-04-24 22:24:55', '2024-04-24 22:24:55'),
(56, 160, '2024-04-24', '01:15:00', 2, 200, 'Habilitada', '2024-04-24 22:45:26', '2024-04-24 22:45:26'),
(63, 200, '2024-05-09', '03:00:00', 1, 50, 'Habilitada', '2024-05-09 18:51:07', '2024-05-09 18:51:07'),
(64, 222, '2024-05-22', '01:00:00', 1, 50, 'Habilitada', '2024-05-22 18:12:25', '2024-05-22 18:12:25'),
(65, 224, '2024-05-24', '00:15:00', 2, 100, 'Inhabilitada', '2024-05-24 18:17:55', '2024-05-24 19:01:09'),
(66, 224, '2024-05-24', '01:30:00', 1, 50, 'Inhabilitada', '2024-05-24 18:18:07', '2024-05-24 18:19:06'),
(67, 242, '2024-05-29', '16:00:00', 2, 6000, 'En Proceso', '2024-05-29 00:39:17', '2024-05-29 00:39:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restriccion`
--

CREATE TABLE `restriccion` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `restriccion`
--

INSERT INTO `restriccion` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, '+13', '2024-01-31 03:13:19', '2024-01-31 03:13:19'),
(2, '+16', '2024-01-31 03:13:23', '2024-01-31 03:13:23'),
(3, '+18', '2024-01-31 03:13:26', '2024-01-31 03:13:26'),
(4, '+21', '2024-01-31 03:13:28', '2024-01-31 03:13:28'),
(5, 'ATP', '2024-01-31 03:13:33', '2024-04-01 23:48:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cantidad_asiento` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`id`, `nombre`, `cantidad_asiento`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Sala 1', 25, 'Habilitada', '2024-03-12 18:35:40', '2024-05-03 22:28:12'),
(4, 'Sala 2', 50, 'Habilitada', '2024-03-14 16:53:12', '2024-04-22 21:57:44'),
(5, 'Sala 3', 35, 'Habilitada', '2024-03-14 16:53:31', '2024-04-22 21:10:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(5, '3D', '2024-01-31 02:58:17', '2024-01-31 02:58:17'),
(6, '2D', '2024-01-31 02:58:31', '2024-01-31 02:58:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `dni` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `rol` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `codigo`, `password`, `nombre`, `apellido`, `dni`, `email`, `telefono`, `direccion`, `rol`, `estado`, `created_at`, `updated_at`) VALUES
(15, 'prueba', '$2y$12$GyRG3W8jpUWsQBasWez64Oc6xbT.pCK7UoLvtTNa0D.rREQeJo6je', 'Prueba', 'Sistema', '4569852', 'prueba@hotmail.com', '5487511', 'Avenida perez 234', 'prueba', 'Inhabilitada', '2024-01-26 20:32:15', '2024-05-29 00:37:32'),
(16, 'admin', '$2y$12$3a2mpAyWzEmkv1P9D1FvFeTDefflQg4hqliJUBTeetAqFmdsoYiVW', 'administrador', 'servidor', '5456123', 'admin@hotmail.com', '4548654213', 'avenida robles 6512', 'Administrador', 'Habilitada', '2024-04-24 21:18:21', '2024-04-24 22:06:05'),
(17, 'cajero', '$2y$12$LhdB1Yc5nlPhTuVZxfS3QeMynGtUrkv8XTSAqsSLYgDmRhdcjwddq', 'cajero', 'prueba', '465879546', 'cajero@gmail.com.ar', '546897213', 'avenida renza 953', 'Cajero/a', 'Habilitada', '2024-04-24 21:19:00', '2024-04-26 21:18:03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_Nacionalidad_Act` (`id_Nacionalidad_Act`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `funcion`
--
ALTER TABLE `funcion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Sala` (`id_Sala`),
  ADD KEY `id_Pelicula` (`id_Pelicula`);

--
-- Indices de la tabla `idioma`
--
ALTER TABLE `idioma`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nacionalidad`
--
ALTER TABLE `nacionalidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_Idioma` (`id_Idioma`),
  ADD KEY `Id_Tipo` (`id_Tipo`),
  ADD KEY `Id_Categoria` (`id_Categoria`),
  ADD KEY `Id_Nacionalidad_Pel` (`id_Nacionalidad_Pel`),
  ADD KEY `id_Restriccion` (`id_Restriccion`);

--
-- Indices de la tabla `reparto`
--
ALTER TABLE `reparto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_Pelicula` (`id_Pelicula`),
  ADD KEY `Id_Actor` (`id_Actor`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Sala_Pelicula` (`id_Funcion`);

--
-- Indices de la tabla `restriccion`
--
ALTER TABLE `restriccion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actor`
--
ALTER TABLE `actor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `funcion`
--
ALTER TABLE `funcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- AUTO_INCREMENT de la tabla `idioma`
--
ALTER TABLE `idioma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `nacionalidad`
--
ALTER TABLE `nacionalidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `reparto`
--
ALTER TABLE `reparto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `restriccion`
--
ALTER TABLE `restriccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actor`
--
ALTER TABLE `actor`
  ADD CONSTRAINT `actor_ibfk_1` FOREIGN KEY (`id_Nacionalidad_Act`) REFERENCES `nacionalidad` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `funcion`
--
ALTER TABLE `funcion`
  ADD CONSTRAINT `funcion_ibfk_1` FOREIGN KEY (`id_Sala`) REFERENCES `sala` (`id`),
  ADD CONSTRAINT `funcion_ibfk_2` FOREIGN KEY (`id_Pelicula`) REFERENCES `pelicula` (`id`);

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `pelicula_ibfk_2` FOREIGN KEY (`id_Nacionalidad_Pel`) REFERENCES `nacionalidad` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pelicula_ibfk_3` FOREIGN KEY (`id_Tipo`) REFERENCES `tipo` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pelicula_ibfk_4` FOREIGN KEY (`id_Categoria`) REFERENCES `categoria` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pelicula_ibfk_5` FOREIGN KEY (`id_Idioma`) REFERENCES `idioma` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pelicula_ibfk_6` FOREIGN KEY (`id_Restriccion`) REFERENCES `restriccion` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `reparto`
--
ALTER TABLE `reparto`
  ADD CONSTRAINT `reparto_ibfk_1` FOREIGN KEY (`id_Pelicula`) REFERENCES `pelicula` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reparto_ibfk_2` FOREIGN KEY (`id_Actor`) REFERENCES `actor` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_Funcion`) REFERENCES `funcion` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
