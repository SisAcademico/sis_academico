-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generaciÃ³n: 11-06-2015 a las 19:41:14
-- VersiÃ³n del servidor: 5.6.17
-- VersiÃ³n de PHP: 5.5.12

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
  `estado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idadministrador`),
  KEY `idusuario` (`idusuario`),
  KEY `idfoto` (`idfoto`)
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
  `estado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idalumno`),
  KEY `idusuario` (`idusuario`),
  KEY `idfoto` (`idfoto`)
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
  `pre_requisito` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`idasignatura`),
  KEY `idmodulo` (`idmodulo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasignatura_cl`
--

CREATE TABLE IF NOT EXISTS `tasignatura_cl` (
  `idasignatura_cl` varchar(10) NOT NULL,
  `nombre_asig_cl` varchar(50) DEFAULT NULL,
  `horas_totales` int(11) DEFAULT NULL,
  PRIMARY KEY (`idasignatura_cl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasistencia_alumno`
--

CREATE TABLE IF NOT EXISTS `tasistencia_alumno` (
  `idasistencia_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_asist_alumn` datetime DEFAULT NULL,
  `observacion` varchar(10) DEFAULT NULL,
  `iddetalle_matricula` int(11) DEFAULT NULL,
  PRIMARY KEY (`idasistencia_alumno`),
  KEY `iddetalle_matricula` (`iddetalle_matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasistencia_docente`
--

CREATE TABLE IF NOT EXISTS `tasistencia_docente` (
  `idasistencia_docente` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_asist_doc` datetime DEFAULT NULL,
  `observacion` varchar(10) DEFAULT NULL,
  `tema` varchar(50) DEFAULT NULL,
  `idcarga_academica` int(11) DEFAULT NULL,
  PRIMARY KEY (`idasistencia_docente`),
  KEY `idcarga_academica` (`idcarga_academica`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taula`
--

CREATE TABLE IF NOT EXISTS `taula` (
  `idaula` varchar(10) NOT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `capacidad` int(11) DEFAULT NULL,
  `tipo` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idaula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taula_carga`
--

CREATE TABLE IF NOT EXISTS `taula_carga` (
  `idcarga_academica` int(11) NOT NULL DEFAULT '0',
  `idaula` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`idcarga_academica`,`idaula`),
  KEY `idcarga_academica` (`idcarga_academica`),
  KEY `idaula` (`idaula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcarga_academica`
--

CREATE TABLE IF NOT EXISTS `tcarga_academica` (
  `idcarga_academica` int(11) NOT NULL AUTO_INCREMENT,
  `grupo` varchar(20) DEFAULT NULL,
  `turno` varchar(20) DEFAULT NULL,
  `idsemestre` varchar(10) DEFAULT NULL,
  `idasignatura` varchar(10) DEFAULT NULL,
  `idasignatura_cl` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idcarga_academica`),
  KEY `idsemestre` (`idsemestre`),
  KEY `tcarga_academica_ibfk_2` (`idasignatura`),
  KEY `tcarga_academica_ibfk_3` (`idasignatura_cl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcarga_horario`
--

CREATE TABLE IF NOT EXISTS `tcarga_horario` (
  `idhorario` int(11) NOT NULL DEFAULT '0',
  `idcarga_academica` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idhorario`,`idcarga_academica`),
  KEY `idhorario` (`idhorario`),
  KEY `idcarga_academica` (`idcarga_academica`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcarrera`
--

CREATE TABLE IF NOT EXISTS `tcarrera` (
  `idcarrera` varchar(5) NOT NULL,
  `nombre_carrera` varchar(50) DEFAULT NULL,
  `nro_modulos` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcarrera`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdetalle_matricula`
--

CREATE TABLE IF NOT EXISTS `tdetalle_matricula` (
  `iddetalle_matricula` int(11) NOT NULL AUTO_INCREMENT,
  `idmatricula` int(11) DEFAULT NULL,
  `idasignatura` varchar(10) DEFAULT NULL,
  `idasignatura_cl` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`iddetalle_matricula`),
  KEY `idmatricula` (`idmatricula`),
  KEY `idasignatura` (`idasignatura`),
  KEY `tdetalle_matricula_ibfk_3` (`idasignatura_cl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdetalle_pago`
--

CREATE TABLE IF NOT EXISTS `tdetalle_pago` (
  `iddetalle_pago` int(11) NOT NULL AUTO_INCREMENT,
  `idpago` int(11) DEFAULT NULL,
  `concepto` varchar(50) DEFAULT NULL,
  `monto` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`iddetalle_pago`),
  KEY `idpago` (`idpago`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `idfoto` int(11) DEFAULT NULL,
  PRIMARY KEY (`iddocente`),
  KEY `idusuario` (`idusuario`),
  KEY `idfoto` (`idfoto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tfoto`
--

CREATE TABLE IF NOT EXISTS `tfoto` (
  `idfoto` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` longblob,
  PRIMARY KEY (`idfoto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `thorario`
--

CREATE TABLE IF NOT EXISTS `thorario` (
  `idhorario` int(11) NOT NULL AUTO_INCREMENT,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  PRIMARY KEY (`idhorario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmatricula`
--

CREATE TABLE IF NOT EXISTS `tmatricula` (
  `idmatricula` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) DEFAULT NULL,
  `fecha_matricula` datetime DEFAULT NULL,
  `idpago` int(11) DEFAULT NULL,
  `idalumno` varchar(10) NOT NULL,
  PRIMARY KEY (`idmatricula`),
  KEY `idpago` (`idpago`),
  KEY `idalumno` (`idalumno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmodulo`
--

CREATE TABLE IF NOT EXISTS `tmodulo` (
  `idmodulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_modulo` varchar(10) DEFAULT NULL,
  `idcarrera` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`idmodulo`),
  KEY `idcarrera` (`idcarrera`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tnotas`
--

CREATE TABLE IF NOT EXISTS `tnotas` (
  `idnota` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_nota` datetime DEFAULT NULL,
  `nota` decimal(10,2) DEFAULT NULL,
  `iddetalle_matricula` int(11) DEFAULT NULL,
  PRIMARY KEY (`idnota`),
  KEY `iddetalle_matricula` (`iddetalle_matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpago`
--

CREATE TABLE IF NOT EXISTS `tpago` (
  `idpago` int(11) NOT NULL AUTO_INCREMENT,
  `nro_boleta` varchar(10) DEFAULT NULL,
  `serie` varchar(10) DEFAULT NULL,
  `fecha_pago` datetime DEFAULT NULL,
  PRIMARY KEY (`idpago`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tsemestre`
--

CREATE TABLE IF NOT EXISTS `tsemestre` (
  `idsemestre` varchar(10) NOT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  PRIMARY KEY (`idsemestre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuario`
--

CREATE TABLE IF NOT EXISTS `tusuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tipo_usuario` varchar(20) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  ADD CONSTRAINT `tcarga_academica_ibfk_1` FOREIGN KEY (`idsemestre`) REFERENCES `tsemestre` (`idsemestre`),
  ADD CONSTRAINT `tcarga_academica_ibfk_2` FOREIGN KEY (`idasignatura`) REFERENCES `tasignatura` (`idasignatura`),
  ADD CONSTRAINT `tcarga_academica_ibfk_3` FOREIGN KEY (`idasignatura_cl`) REFERENCES `tasignatura_cl` (`idasignatura_cl`);

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
  ADD CONSTRAINT `tdetalle_matricula_ibfk_2` FOREIGN KEY (`idasignatura`) REFERENCES `tasignatura` (`idasignatura`),
  ADD CONSTRAINT `tdetalle_matricula_ibfk_3` FOREIGN KEY (`idasignatura_cl`) REFERENCES `tasignatura_cl` (`idasignatura_cl`);

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
