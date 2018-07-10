-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2018 a las 23:58:28
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colegio_alcazares`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_boletin`
--

CREATE TABLE `tbl_boletin` (
  `boletin_id` int(11) NOT NULL,
  `bol_nota_periodo_1` double NOT NULL DEFAULT '0',
  `bol_nota_periodo_2` double NOT NULL DEFAULT '0',
  `bol_nota_periodo_3` double NOT NULL DEFAULT '0',
  `boletin_nota_definitiva` double NOT NULL DEFAULT '0',
  `estudiante_id` int(11) NOT NULL DEFAULT '0',
  `curso_id` int(11) NOT NULL DEFAULT '0',
  `periodo_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cursos`
--

CREATE TABLE `tbl_cursos` (
  `curso_id` int(11) NOT NULL,
  `curso_codigo` varchar(15) NOT NULL DEFAULT '0',
  `curso_nombre` varchar(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_docentes`
--

CREATE TABLE `tbl_docentes` (
  `docente_id` int(11) NOT NULL,
  `docente_documento` varchar(50) NOT NULL DEFAULT '0',
  `docente_nombre` varchar(30) NOT NULL DEFAULT '0',
  `docente_apellido` varchar(30) NOT NULL DEFAULT '0',
  `docente_telefono` varchar(30) NOT NULL DEFAULT '0',
  `docente_email` varchar(30) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estudiantes`
--

CREATE TABLE `tbl_estudiantes` (
  `estudiante_id` int(11) NOT NULL,
  `estudiante_documento` varchar(50) NOT NULL DEFAULT '0',
  `estudiante_nombre` varchar(30) NOT NULL DEFAULT '0',
  `estudiante_apellido` varchar(30) NOT NULL DEFAULT '0',
  `estudiante_activo` int(11) NOT NULL DEFAULT '0',
  `estudiante_correo` varchar(30) DEFAULT '0',
  `estudiante_telefono` double DEFAULT NULL,
  `curso_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_logros`
--

CREATE TABLE `tbl_logros` (
  `logro_id` int(11) NOT NULL,
  `logro_curso` int(11) DEFAULT NULL,
  `logro_descripcion` varchar(50) DEFAULT NULL,
  `periodo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_materias`
--

CREATE TABLE `tbl_materias` (
  `materia_id` int(11) NOT NULL,
  `materia_codigo` varchar(15) NOT NULL DEFAULT '0',
  `materia_nombre` varchar(15) NOT NULL DEFAULT '0',
  `curso_id` int(11) NOT NULL DEFAULT '0',
  `docente_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_notas`
--

CREATE TABLE `tbl_notas` (
  `nota_id` int(11) NOT NULL,
  `nota_codigo` int(11) NOT NULL DEFAULT '0',
  `nota_1` double NOT NULL DEFAULT '0',
  `nota_2` double NOT NULL DEFAULT '0',
  `nota_3` double NOT NULL DEFAULT '0',
  `nota_definitiva` double NOT NULL DEFAULT '0',
  `estudiante_id` int(11) NOT NULL DEFAULT '0',
  `curso_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `periodo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_periodos`
--

CREATE TABLE `tbl_periodos` (
  `periodo_id` int(11) NOT NULL,
  `periodo_descripcion` varchar(100) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_boletin`
--
ALTER TABLE `tbl_boletin`
  ADD PRIMARY KEY (`boletin_id`),
  ADD KEY `FK_tbl_boletin_tbl_estudiantes` (`estudiante_id`),
  ADD KEY `FK_tbl_boletin_tbl_cursos` (`curso_id`),
  ADD KEY `FK_tbl_boletin_tbl_periodos` (`periodo_id`);

--
-- Indices de la tabla `tbl_cursos`
--
ALTER TABLE `tbl_cursos`
  ADD PRIMARY KEY (`curso_id`,`curso_codigo`),
  ADD UNIQUE KEY `curso_codigo` (`curso_codigo`);

--
-- Indices de la tabla `tbl_docentes`
--
ALTER TABLE `tbl_docentes`
  ADD PRIMARY KEY (`docente_id`),
  ADD UNIQUE KEY `doce_documento` (`docente_documento`);

--
-- Indices de la tabla `tbl_estudiantes`
--
ALTER TABLE `tbl_estudiantes`
  ADD PRIMARY KEY (`estudiante_id`),
  ADD UNIQUE KEY `estu_documento` (`estudiante_documento`),
  ADD KEY `FK_tbl_estudiantes_tbl_cursos` (`curso_id`);

--
-- Indices de la tabla `tbl_logros`
--
ALTER TABLE `tbl_logros`
  ADD PRIMARY KEY (`logro_id`),
  ADD KEY `FK_tbl_logros_tbl_periodos` (`periodo_id`);

--
-- Indices de la tabla `tbl_materias`
--
ALTER TABLE `tbl_materias`
  ADD PRIMARY KEY (`materia_id`),
  ADD KEY `FK_tbl_materias_tbl_cursos` (`curso_id`),
  ADD KEY `FK_tbl_materias_tbl_docentes` (`docente_id`);

--
-- Indices de la tabla `tbl_notas`
--
ALTER TABLE `tbl_notas`
  ADD PRIMARY KEY (`nota_id`),
  ADD UNIQUE KEY `nota_codigo` (`nota_codigo`),
  ADD KEY `FK_tbl_notas_tbl_cursos` (`curso_id`),
  ADD KEY `FK_tbl_notas_tbl_estudiantes` (`estudiante_id`),
  ADD KEY `FK_tbl_notas_tbl_materias` (`materia_id`),
  ADD KEY `FK_tbl_notas_tbl_periodos` (`periodo_id`);

--
-- Indices de la tabla `tbl_periodos`
--
ALTER TABLE `tbl_periodos`
  ADD PRIMARY KEY (`periodo_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_boletin`
--
ALTER TABLE `tbl_boletin`
  MODIFY `boletin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_cursos`
--
ALTER TABLE `tbl_cursos`
  MODIFY `curso_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_docentes`
--
ALTER TABLE `tbl_docentes`
  MODIFY `docente_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_estudiantes`
--
ALTER TABLE `tbl_estudiantes`
  MODIFY `estudiante_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_logros`
--
ALTER TABLE `tbl_logros`
  MODIFY `logro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_materias`
--
ALTER TABLE `tbl_materias`
  MODIFY `materia_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_notas`
--
ALTER TABLE `tbl_notas`
  MODIFY `nota_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_periodos`
--
ALTER TABLE `tbl_periodos`
  MODIFY `periodo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_boletin`
--
ALTER TABLE `tbl_boletin`
  ADD CONSTRAINT `FK_tbl_boletin_tbl_cursos` FOREIGN KEY (`curso_id`) REFERENCES `tbl_cursos` (`curso_id`),
  ADD CONSTRAINT `FK_tbl_boletin_tbl_estudiantes` FOREIGN KEY (`estudiante_id`) REFERENCES `tbl_estudiantes` (`estudiante_id`),
  ADD CONSTRAINT `FK_tbl_boletin_tbl_periodos` FOREIGN KEY (`periodo_id`) REFERENCES `tbl_periodos` (`periodo_id`);

--
-- Filtros para la tabla `tbl_estudiantes`
--
ALTER TABLE `tbl_estudiantes`
  ADD CONSTRAINT `FK_tbl_estudiantes_tbl_cursos` FOREIGN KEY (`curso_id`) REFERENCES `tbl_cursos` (`curso_codigo`);

--
-- Filtros para la tabla `tbl_logros`
--
ALTER TABLE `tbl_logros`
  ADD CONSTRAINT `FK_tbl_logros_tbl_periodos` FOREIGN KEY (`periodo_id`) REFERENCES `tbl_periodos` (`periodo_id`);

--
-- Filtros para la tabla `tbl_materias`
--
ALTER TABLE `tbl_materias`
  ADD CONSTRAINT `FK_tbl_materias_tbl_cursos` FOREIGN KEY (`curso_id`) REFERENCES `tbl_cursos` (`curso_id`),
  ADD CONSTRAINT `FK_tbl_materias_tbl_docentes` FOREIGN KEY (`docente_id`) REFERENCES `tbl_docentes` (`docente_id`);

--
-- Filtros para la tabla `tbl_notas`
--
ALTER TABLE `tbl_notas`
  ADD CONSTRAINT `FK_tbl_notas_tbl_cursos` FOREIGN KEY (`curso_id`) REFERENCES `tbl_cursos` (`curso_id`),
  ADD CONSTRAINT `FK_tbl_notas_tbl_estudiantes` FOREIGN KEY (`estudiante_id`) REFERENCES `tbl_estudiantes` (`estudiante_id`),
  ADD CONSTRAINT `FK_tbl_notas_tbl_materias` FOREIGN KEY (`materia_id`) REFERENCES `tbl_materias` (`materia_id`),
  ADD CONSTRAINT `FK_tbl_notas_tbl_periodos` FOREIGN KEY (`periodo_id`) REFERENCES `tbl_periodos` (`periodo_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
