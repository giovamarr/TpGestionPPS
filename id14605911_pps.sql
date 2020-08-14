-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-08-2020 a las 13:42:36
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id14605911_pps`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `finalreport`
--

CREATE TABLE `finalreport` (
  `idFR` int(11) NOT NULL,
  `idPPS_FP` int(11) NOT NULL,
  `conclusiones` varchar(300) NOT NULL,
  `aprobadaFR` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `finalreport`
--

INSERT INTO `finalreport` (`idFR`, `idPPS_FP`, `conclusiones`, `aprobadaFR`) VALUES
(1, 2, 'Muy buen reporte final, Aprobado', 1),
(2, 3, 'Aprobado reporte final ! Considere las correcciones realizadas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimientos`
--

CREATE TABLE `seguimientos` (
  `idSeguimientos` int(4) NOT NULL,
  `actividadesRealizadas` varchar(200) DEFAULT NULL,
  `actividadesProximas` varchar(200) DEFAULT NULL,
  `cuestionesPendientes` varchar(200) DEFAULT NULL,
  `experiencias` varchar(200) DEFAULT NULL,
  `hsTrabajadas` varchar(200) DEFAULT NULL,
  `TotalhsTrabajadas` varchar(200) DEFAULT NULL,
  `desvioCronograma` varchar(200) DEFAULT NULL,
  `id_PPS` int(4) NOT NULL,
  `aprobadoSeg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `seguimientos`
--

INSERT INTO `seguimientos` (`idSeguimientos`, `actividadesRealizadas`, `actividadesProximas`, `cuestionesPendientes`, `experiencias`, `hsTrabajadas`, `TotalhsTrabajadas`, `desvioCronograma`, `id_PPS`, `aprobadoSeg`) VALUES
(1, 'BackUps', 'Formatear', 'Programar', 'Buenas Practiucas', '7', '25', '2 dias', 2, 1),
(2, 'Clonar repositorio', 'Pullear repositorio', 'Pushear', 'Github', '5', '55', '1 dia', 2, 1),
(3, 'Descargar App Youtube', 'Ver un video', 'Dar like al video', 'Videos de PHP', '4', NULL, '12 horas', 2, 1),
(4, 'BackUps', 'Formatear', 'Programar', 'Buenas Practicas', '7', '25', '2 dias', 3, NULL),
(5, 'BackUps', 'Formatear', 'Programar', 'Buenas Practicas', '7', '25', '2 dias', 4, NULL),
(6, 'Clonar repositorio', 'Pullear repositorio', 'Pushear', 'Github', '5', '55', '1 dia', 3, NULL),
(7, 'Clonar repositorio', 'Pullear repositorio', 'Pushear', 'Github', '5', '55', '1 dia', 4, 1),
(8, 'Descargar App Youtube', 'Ver un video', 'Dar like al video', 'Videos de PHP', '4', NULL, '12 horas', 3, 1),
(9, 'Descargar App Youtube', 'Ver un video', 'Dar like al video', 'Videos de PHP', '4', NULL, '12 horas', 4, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `idPPS` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_Profe` int(10) DEFAULT NULL,
  `caractPPS` varchar(40) NOT NULL,
  `nombreEntidad` varchar(30) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `cp` varchar(10) NOT NULL,
  `localidad` varchar(20) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `emailE` varchar(30) NOT NULL,
  `contactoEntidad` varchar(20) NOT NULL,
  `PPSTerminada` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`idPPS`, `id_user`, `id_Profe`, `caractPPS`, `nombreEntidad`, `direccion`, `cp`, `localidad`, `tel`, `emailE`, `contactoEntidad`, `PPSTerminada`) VALUES
(2, 7, 9, 'Pasantia', 'Entidad S.A.', 'Mendoza 1515', '2000', 'Rosario', '444444', 'entidad@gmail.com', 'Jorge', 1),
(3, 10, 9, 'Pasantia', 'Drogueria', 'Santa fe 900', '2132', 'Funes', '4931234', 'drogueria@gmail.com', 'Pablo', NULL),
(4, 12, 14, 'Pasantia', 'EPE', 'San Juan 2000', '2000', 'Rosario', '4252020', 'epe@gmail.com', 'Pedro', NULL),
(7, 15, NULL, 'Pasantia', 'No asignado', 'No definida', 'Sin CP', 'Sin Ciudad', 'Sin telefono', 'sinemail@email.com', 'Sin Nombre', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `password` varchar(75) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tipo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `password`, `email`, `tipo`) VALUES
(7, 'Damian', 'Barzola', '$2y$10$N2rN.zl9RK3GUXWZ5SXDg.IxSIz9M5gifvtNaYvg4f/3YPZEhnMQa', 'damianbarzola@gmail.com', 1),
(9, 'Julian', 'Butti', '$2y$10$bXrCzex8LZBs2VyGlzzCkeDWUe1Q9ZXeLKOMjzjgGx4tObcOrxnTC', 'julianbutti@gmail.com', 2),
(10, 'Giovanni', 'Martin', '$2y$10$HssUX6dceKumLu71cWd0bO5hQf6nKP7HeJOovntf7dzEonSai99rq\r\n', 'giovannimartin@gmail.com', 1),
(12, 'Agustin', 'Etcheverry', '$2y$10$2kQvuJKq/ydpKcKHPiJdmexnzIXOCuofEEScrtaccSh.vCS9UDnnO', 'agustinetcheverry@gmail.com', 1),
(13, 'Responsable', 'Bedel', '$2y$10$BZK7EWqs1un4vsV.T/6VM.OjK68fH7Wt0KK801M6jZCBoz9PrKNa.', 'responsable@gmail.com', 3),
(14, 'Daniela', 'Diaz', '$2y$10$y.Jy9zcfi3DwxIoXPmRmpe6HuDgFw2BlwCCWkvTs5jIem0HVEO0Ka', 'danieladiaz@gmail.com', 2),
(15, 'Alumno', 'Sin Profesor', '$2y$10$ZegkrcKJn.VF8TzfAVmnCeWgtV4KKQJcSYuLCGERQ67e6AmRa0y1W', 'alumnosinprofesor@gmail.com', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `finalreport`
--
ALTER TABLE `finalreport`
  ADD PRIMARY KEY (`idFR`,`idPPS_FP`);

--
-- Indices de la tabla `seguimientos`
--
ALTER TABLE `seguimientos`
  ADD PRIMARY KEY (`idSeguimientos`,`id_PPS`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`idPPS`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `finalreport`
--
ALTER TABLE `finalreport`
  MODIFY `idFR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `seguimientos`
--
ALTER TABLE `seguimientos`
  MODIFY `idSeguimientos` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `idPPS` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
