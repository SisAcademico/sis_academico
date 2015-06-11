-- phpMyAdmin SQL Dump
-- version 4.3.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Versión del servidor: 5.5.43
-- Versión de PHP: 5.4.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_sisacademico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tadministrador`
--

CREATE TABLE IF NOT EXISTS `tadministrador` (
  `idadministrador` varchar(10) NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(60) DEFAULT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `idfoto` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talumno`
--

CREATE TABLE IF NOT EXISTS `talumno` (
  `idalumno` varchar(10) NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(60) DEFAULT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `fecha_ingreso` datetime DEFAULT NULL,
  `idfoto` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasignatura`
--

CREATE TABLE IF NOT EXISTS `tasignatura` (
  `idasignatura` varchar(10) NOT NULL,
  `nombre_asignatura` varchar(50) DEFAULT NULL,
  `horas_semanales` int(11) DEFAULT NULL,
  `horas_totales` int(11) DEFAULT NULL,
  `idmodulo` int(11) DEFAULT NULL,
  `pre_requisito` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasignatura_cl`
--

CREATE TABLE IF NOT EXISTS `tasignatura_cl` (
  `idasignatura_cl` varchar(10) NOT NULL,
  `nombre_asig_cl` varchar(50) DEFAULT NULL,
  `horas_totales` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasistencia_alumno`
--

CREATE TABLE IF NOT EXISTS `tasistencia_alumno` (
  `idasistencia_alumno` int(11) NOT NULL,
  `fecha_asist_alumn` datetime DEFAULT NULL,
  `observacion` varchar(10) DEFAULT NULL,
  `iddetalle_matricula` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasistencia_docente`
--

CREATE TABLE IF NOT EXISTS `tasistencia_docente` (
  `idasistencia_docente` int(11) NOT NULL,
  `fecha_asist_doc` datetime DEFAULT NULL,
  `observacion` varchar(10) DEFAULT NULL,
  `tema` varchar(50) DEFAULT NULL,
  `idcarga_academica` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taula`
--

CREATE TABLE IF NOT EXISTS `taula` (
  `idaula` varchar(10) NOT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `capacidad` int(11) DEFAULT NULL,
  `tipo` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taula_carga`
--

CREATE TABLE IF NOT EXISTS `taula_carga` (
  `idcarga_academica` int(11) NOT NULL DEFAULT '0',
  `idaula` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcarga_academica`
--

CREATE TABLE IF NOT EXISTS `tcarga_academica` (
  `idcarga_academica` int(11) NOT NULL,
  `grupo` varchar(20) DEFAULT NULL,
  `turno` varchar(20) DEFAULT NULL,
  `idsemestre` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcarga_horario`
--

CREATE TABLE IF NOT EXISTS `tcarga_horario` (
  `idhorario` int(11) NOT NULL DEFAULT '0',
  `idcarga_academica` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcarrera`
--

CREATE TABLE IF NOT EXISTS `tcarrera` (
  `idcarrera` varchar(5) NOT NULL,
  `nombre_carrera` varchar(50) DEFAULT NULL,
  `nro_modulos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdetalle_matricula`
--

CREATE TABLE IF NOT EXISTS `tdetalle_matricula` (
  `iddetalle_matricula` int(11) NOT NULL,
  `idmatricula` int(11) DEFAULT NULL,
  `idasignatura` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdetalle_pago`
--

CREATE TABLE IF NOT EXISTS `tdetalle_pago` (
  `iddetalle_pago` int(11) NOT NULL,
  `idpago` int(11) DEFAULT NULL,
  `concepto` varchar(50) DEFAULT NULL,
  `monto` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdocente`
--

CREATE TABLE IF NOT EXISTS `tdocente` (
  `iddocente` varchar(10) NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(60) DEFAULT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `cargo` varchar(20) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `idfoto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tfoto`
--

CREATE TABLE IF NOT EXISTS `tfoto` (
  `idfoto` int(11) NOT NULL,
  `imagen` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `thorario`
--

CREATE TABLE IF NOT EXISTS `thorario` (
  `idhorario` int(11) NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmatricula`
--

CREATE TABLE IF NOT EXISTS `tmatricula` (
  `idmatricula` int(11) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `fecha_matricula` datetime DEFAULT NULL,
  `idpago` int(11) DEFAULT NULL,
  `idalumno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmodulo`
--

CREATE TABLE IF NOT EXISTS `tmodulo` (
  `idmodulo` int(11) NOT NULL,
  `nombre_modulo` varchar(10) DEFAULT NULL,
  `idcarrera` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tnotas`
--

CREATE TABLE IF NOT EXISTS `tnotas` (
  `idnota` int(11) NOT NULL,
  `fecha_nota` datetime DEFAULT NULL,
  `nota` decimal(10,2) DEFAULT NULL,
  `iddetalle_matricula` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpago`
--

CREATE TABLE IF NOT EXISTS `tpago` (
  `idpago` int(11) NOT NULL,
  `nro_boleta` varchar(10) DEFAULT NULL,
  `serie` varchar(10) DEFAULT NULL,
  `fecha_pago` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tsemestre`
--

CREATE TABLE IF NOT EXISTS `tsemestre` (
  `idsemestre` varchar(10) NOT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuario`
--

CREATE TABLE IF NOT EXISTS `tusuario` (
  `idusuario` int(11) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `tipo_usuario` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tadministrador`
--
ALTER TABLE `tadministrador`
  ADD PRIMARY KEY (`idadministrador`), ADD KEY `idusuario` (`idusuario`), ADD KEY `idfoto` (`idfoto`);

--
-- Indices de la tabla `talumno`
--
ALTER TABLE `talumno`
  ADD PRIMARY KEY (`idalumno`), ADD KEY `idusuario` (`idusuario`), ADD KEY `idfoto` (`idfoto`);

--
-- Indices de la tabla `tasignatura`
--
ALTER TABLE `tasignatura`
  ADD PRIMARY KEY (`idasignatura`), ADD KEY `idmodulo` (`idmodulo`);

--
-- Indices de la tabla `tasignatura_cl`
--
ALTER TABLE `tasignatura_cl`
  ADD PRIMARY KEY (`idasignatura_cl`);

--
-- Indices de la tabla `tasistencia_alumno`
--
ALTER TABLE `tasistencia_alumno`
  ADD PRIMARY KEY (`idasistencia_alumno`), ADD KEY `iddetalle_matricula` (`iddetalle_matricula`);

--
-- Indices de la tabla `tasistencia_docente`
--
ALTER TABLE `tasistencia_docente`
  ADD PRIMARY KEY (`idasistencia_docente`), ADD KEY `idcarga_academica` (`idcarga_academica`);

--
-- Indices de la tabla `taula`
--
ALTER TABLE `taula`
  ADD PRIMARY KEY (`idaula`);

--
-- Indices de la tabla `taula_carga`
--
ALTER TABLE `taula_carga`
  ADD PRIMARY KEY (`idcarga_academica`,`idaula`), ADD KEY `idcarga_academica` (`idcarga_academica`), ADD KEY `idaula` (`idaula`);

--
-- Indices de la tabla `tcarga_academica`
--
ALTER TABLE `tcarga_academica`
  ADD PRIMARY KEY (`idcarga_academica`), ADD KEY `idsemestre` (`idsemestre`);

--
-- Indices de la tabla `tcarga_horario`
--
ALTER TABLE `tcarga_horario`
  ADD PRIMARY KEY (`idhorario`,`idcarga_academica`), ADD KEY `idhorario` (`idhorario`), ADD KEY `idcarga_academica` (`idcarga_academica`);

--
-- Indices de la tabla `tcarrera`
--
ALTER TABLE `tcarrera`
  ADD PRIMARY KEY (`idcarrera`);

--
-- Indices de la tabla `tdetalle_matricula`
--
ALTER TABLE `tdetalle_matricula`
  ADD PRIMARY KEY (`iddetalle_matricula`), ADD KEY `idmatricula` (`idmatricula`), ADD KEY `idasignatura` (`idasignatura`);

--
-- Indices de la tabla `tdetalle_pago`
--
ALTER TABLE `tdetalle_pago`
  ADD PRIMARY KEY (`iddetalle_pago`), ADD KEY `idpago` (`idpago`);

--
-- Indices de la tabla `tdocente`
--
ALTER TABLE `tdocente`
  ADD PRIMARY KEY (`iddocente`), ADD KEY `idusuario` (`idusuario`), ADD KEY `idfoto` (`idfoto`);

--
-- Indices de la tabla `tfoto`
--
ALTER TABLE `tfoto`
  ADD PRIMARY KEY (`idfoto`);

--
-- Indices de la tabla `thorario`
--
ALTER TABLE `thorario`
  ADD PRIMARY KEY (`idhorario`);

--
-- Indices de la tabla `tmatricula`
--
ALTER TABLE `tmatricula`
  ADD PRIMARY KEY (`idmatricula`), ADD KEY `idpago` (`idpago`), ADD KEY `idalumno` (`idalumno`);

--
-- Indices de la tabla `tmodulo`
--
ALTER TABLE `tmodulo`
  ADD PRIMARY KEY (`idmodulo`), ADD KEY `idcarrera` (`idcarrera`);

--
-- Indices de la tabla `tnotas`
--
ALTER TABLE `tnotas`
  ADD PRIMARY KEY (`idnota`), ADD KEY `iddetalle_matricula` (`iddetalle_matricula`);

--
-- Indices de la tabla `tpago`
--
ALTER TABLE `tpago`
  ADD PRIMARY KEY (`idpago`);

--
-- Indices de la tabla `tsemestre`
--
ALTER TABLE `tsemestre`
  ADD PRIMARY KEY (`idsemestre`);

--
-- Indices de la tabla `tusuario`
--
ALTER TABLE `tusuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tasistencia_alumno`
--
ALTER TABLE `tasistencia_alumno`
  MODIFY `idasistencia_alumno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tasistencia_docente`
--
ALTER TABLE `tasistencia_docente`
  MODIFY `idasistencia_docente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tcarga_academica`
--
ALTER TABLE `tcarga_academica`
  MODIFY `idcarga_academica` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tdetalle_matricula`
--
ALTER TABLE `tdetalle_matricula`
  MODIFY `iddetalle_matricula` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tdetalle_pago`
--
ALTER TABLE `tdetalle_pago`
  MODIFY `iddetalle_pago` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tfoto`
--
ALTER TABLE `tfoto`
  MODIFY `idfoto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `thorario`
--
ALTER TABLE `thorario`
  MODIFY `idhorario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tmatricula`
--
ALTER TABLE `tmatricula`
  MODIFY `idmatricula` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tmodulo`
--
ALTER TABLE `tmodulo`
  MODIFY `idmodulo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tnotas`
--
ALTER TABLE `tnotas`
  MODIFY `idnota` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tpago`
--
ALTER TABLE `tpago`
  MODIFY `idpago` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tusuario`
--
ALTER TABLE `tusuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tadministrador`
--
ALTER TABLE `tadministrador`
ADD CONSTRAINT `tadministrador_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `tusuario` (`idusuario`),
ADD CONSTRAINT `tadministrador_ibfk_2` FOREIGN KEY (`idfoto`) REFERENCES `tfoto` (`idfoto`);

--
-- Filtros para la tabla `talumno`
--
ALTER TABLE `talumno`
ADD CONSTRAINT `talumno_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `tusuario` (`idusuario`),
ADD CONSTRAINT `talumno_ibfk_2` FOREIGN KEY (`idfoto`) REFERENCES `tfoto` (`idfoto`);

--
-- Filtros para la tabla `tasignatura`
--
ALTER TABLE `tasignatura`
ADD CONSTRAINT `tasignatura_ibfk_1` FOREIGN KEY (`idmodulo`) REFERENCES `tmodulo` (`idmodulo`);

--
-- Filtros para la tabla `tasistencia_alumno`
--
ALTER TABLE `tasistencia_alumno`
ADD CONSTRAINT `tasistencia_alumno_ibfk_1` FOREIGN KEY (`iddetalle_matricula`) REFERENCES `tdetalle_matricula` (`iddetalle_matricula`);

--
-- Filtros para la tabla `tasistencia_docente`
--
ALTER TABLE `tasistencia_docente`
ADD CONSTRAINT `tasistencia_docente_ibfk_1` FOREIGN KEY (`idcarga_academica`) REFERENCES `tcarga_academica` (`idcarga_academica`);

--
-- Filtros para la tabla `taula_carga`
--
ALTER TABLE `taula_carga`
ADD CONSTRAINT `taula_carga_ibfk_1` FOREIGN KEY (`idcarga_academica`) REFERENCES `tcarga_academica` (`idcarga_academica`),
ADD CONSTRAINT `taula_carga_ibfk_2` FOREIGN KEY (`idaula`) REFERENCES `taula` (`idaula`);

--
-- Filtros para la tabla `tcarga_academica`
--
ALTER TABLE `tcarga_academica`
ADD CONSTRAINT `tcarga_academica_ibfk_1` FOREIGN KEY (`idsemestre`) REFERENCES `tsemestre` (`idsemestre`);

--
-- Filtros para la tabla `tcarga_horario`
--
ALTER TABLE `tcarga_horario`
ADD CONSTRAINT `tcarga_horario_ibfk_1` FOREIGN KEY (`idhorario`) REFERENCES `thorario` (`idhorario`),
ADD CONSTRAINT `tcarga_horario_ibfk_2` FOREIGN KEY (`idcarga_academica`) REFERENCES `tcarga_academica` (`idcarga_academica`);

--
-- Filtros para la tabla `tdetalle_matricula`
--
ALTER TABLE `tdetalle_matricula`
ADD CONSTRAINT `tdetalle_matricula_ibfk_1` FOREIGN KEY (`idmatricula`) REFERENCES `tmatricula` (`idmatricula`),
ADD CONSTRAINT `tdetalle_matricula_ibfk_2` FOREIGN KEY (`idasignatura`) REFERENCES `tasignatura` (`idasignatura`);

--
-- Filtros para la tabla `tdetalle_pago`
--
ALTER TABLE `tdetalle_pago`
ADD CONSTRAINT `tdetalle_pago_ibfk_1` FOREIGN KEY (`idpago`) REFERENCES `tpago` (`idpago`);

--
-- Filtros para la tabla `tdocente`
--
ALTER TABLE `tdocente`
ADD CONSTRAINT `tdocente_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `tusuario` (`idusuario`),
ADD CONSTRAINT `tdocente_ibfk_2` FOREIGN KEY (`idfoto`) REFERENCES `tfoto` (`idfoto`);

--
-- Filtros para la tabla `tmatricula`
--
ALTER TABLE `tmatricula`
ADD CONSTRAINT `tmatricula_ibfk_1` FOREIGN KEY (`idpago`) REFERENCES `tpago` (`idpago`),
ADD CONSTRAINT `tmatricula_ibfk_2` FOREIGN KEY (`idalumno`) REFERENCES `talumno` (`idalumno`);

--
-- Filtros para la tabla `tmodulo`
--
ALTER TABLE `tmodulo`
ADD CONSTRAINT `tmodulo_ibfk_1` FOREIGN KEY (`idcarrera`) REFERENCES `tcarrera` (`idcarrera`);

--
-- Filtros para la tabla `tnotas`
--
ALTER TABLE `tnotas`
ADD CONSTRAINT `tnotas_ibfk_1` FOREIGN KEY (`iddetalle_matricula`) REFERENCES `tdetalle_matricula` (`iddetalle_matricula`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
