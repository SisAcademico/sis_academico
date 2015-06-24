-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2015 a las 15:08:52
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

-- Tiempo de generaciÃ³n: 24-06-2015 a las 15:08:52
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

--
-- Volcado de datos para la tabla `talumno`
--

INSERT INTO `talumno` (`idalumno`, `idusuario`, `dni`, `nombres`, `apellidos`, `direccion`, `telefono`, `correo`, `fecha_ingreso`, `idfoto`, `estado`) VALUES
('123112', 14, '98182313', 'juan', 'apa', 'kasd', '977123123', 'kaiqw@gmail.com.pq', '2015-06-04 00:00:00', 10, 'Activo'),
('128728', 13, '98712313', 'Juan', 'Apaza', 'Av. Tupac Amaru l-12', '98123123', 'juan@gmail.com', '2015-06-22 00:00:00', 3, 'Activo'),
('141231', 11, '74309743', 'Walter', 'Zarate Quispe', 'Cll. Los Nogales E-12', '98123123', 'walter@gmail.com', '1990-06-13 00:00:00', 1, 'activo'),
('152354', 2, '71344859', 'Juan', 'Diaz Cassa', 'San Judas T-4', '987235472', 'cl@gmail.com', '2015-03-24 00:00:00', NULL, 'Activo'),
('152358', 3, '72624859', 'Karen', 'Quispe Arana', 'San Sebastian H-4', '986235476', 'clsss@gmail.com', '2015-03-24 00:00:00', NULL, 'Activo'),
('153801', 9, '45633859', 'Luis', 'Quispe Titto', 'Miraflores G-3', '944235476', 'aasrF@gmail.com', '2015-03-24 00:00:00', NULL, 'Activo'),
('153824', 1, '71624859', 'Carlos', 'Fernandez Toro', 'Jr.Choque T-4', '987335476', 'clsrF@gmail.com', '2015-03-24 00:00:00', NULL, 'Activo'),
('153829', 4, '75624339', 'Julio', 'Mamani Arias', 'El bosque T-4', '987238476', 'clsddd@gmail.com', '2015-03-24 00:00:00', NULL, 'Activo'),
('153840', 5, '71024109', 'Ernesto', 'Guzman Pari', 'Unidos T-4', '98723576', 'cldd@gmail.com', '2015-03-24 00:00:00', NULL, 'Activo'),
('153855', 6, '23624859', 'Lucia', 'Rosas Quintanilla', 'Almirante T-4', '987435476', 'clsff@gmail.com', '2015-03-24 00:00:00', NULL, 'Activo'),
('153866', 7, '24624559', 'Paula', 'Farfan Hermoza', 'Independencia T-4', '927235476', 'clarF@gmail.com', '2015-03-24 00:00:00', NULL, 'Activo'),
('153877', 8, '72622259', 'Jorge', 'Condori Gonzales', 'Sta Monica', '985235476', 'TlsrF@gmail.com', '2015-03-24 00:00:00', NULL, 'Activo'),
('159087', 12, '98761232', 'Karen', 'Alvarez', 'Av. Tupac Amaru l-12', '987313212', 'karenAlvarez@gmail.com', '1990-06-21 00:00:00', 2, 'activo'),
('19213', 15, '09813182', 'jjasd', 'kasda', 'kasdasd', '91923123', 'aksdasd@gmail.com', '1995-06-10 00:00:00', 5, 'Activo');

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

--
-- Volcado de datos para la tabla `tasignatura`
--

INSERT INTO `tasignatura` (`idasignatura`, `nombre_asignatura`, `horas_semanales`, `horas_totales`, `idmodulo`, `pre_requisito`) VALUES
('A0001', 'Programacion 1', 10, 80, NULL, ''),
('A0002', 'Programacion 2', 10, 80, NULL, ''),
('A0003', 'Programacion 3', 10, 80, NULL, ''),
('A0004', 'DiseÃ±o 1', 10, 80, NULL, ''),
('A0005', 'DiseÃ±o 2', 10, 80, NULL, ''),
('A0006', 'Procesos 1', 10, 80, NULL, ''),
('A0007', 'Procesos 2', 10, 80, NULL, ''),
('A0008', 'Procesos 3', 10, 80, NULL, ''),
('A0009', 'Investigacion Linux', 10, 80, NULL, '');

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

--
-- Volcado de datos para la tabla `tasignatura_cl`
--

INSERT INTO `tasignatura_cl` (`idasignatura_cl`, `nombre_asig_cl`, `horas_totales`) VALUES
('CL001', 'Metodos Programacion', 100),
('CL002', 'Programacion Android', 100),
('CL003', 'Gestion de Base de Datos', 100),
('CL004', 'Procesos Locales', 100),
('CL005', 'Programacion en Java', 100),
('CL006', 'Programacion .Net', 100),
('CL007', 'Linux', 80),
('CL008', 'Sistemas Operativos', 200);

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

--
-- Volcado de datos para la tabla `taula`
--

INSERT INTO `taula` (`idaula`, `estado`, `capacidad`, `tipo`) VALUES
('AUL001', 'DISPONIBLE', 30, 'LAB'),
('AUL002', 'DISPONIBLE', 35, 'LAB'),
('AUL003', 'DISPONIBLE', 20, 'TEORIA'),
('AUL004', 'DISPONIBLE', 40, 'LAB'),
('AUL005', 'NO DISPONIBLE', 30, 'TEORIA'),
('AUL006', 'DISPONIBLE', 25, 'TEORIA'),
('AUL007', 'NO DISPONIBLE', 20, 'LAB'),
('AUL008', 'DISPONIBLE', 20, 'LAB'),
('AUL009', 'DISPONIBLE', 30, 'TEORIA');

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
  `iddocente` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idcarga_academica`),
  KEY `idsemestre` (`idsemestre`),
  KEY `tcarga_academica_ibfk_2` (`idasignatura`),
  KEY `tcarga_academica_ibfk_3` (`idasignatura_cl`),
  KEY `tcarga_academica_ibfk_4` (`iddocente`)
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

--
-- Volcado de datos para la tabla `tcarrera`
--

INSERT INTO `tcarrera` (`idcarrera`, `nombre_carrera`, `nro_modulos`) VALUES
('info', 'informatica', 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `tdetalle_matricula`
--

INSERT INTO `tdetalle_matricula` (`iddetalle_matricula`, `idmatricula`, `idasignatura`, `idasignatura_cl`) VALUES
(1, 1, NULL, 'CL001'),
(2, 1, NULL, 'CL003'),
(3, 1, NULL, 'CL005'),
(4, 2, 'A0001', NULL),
(5, 2, 'A0004', NULL),
(6, 2, 'A0006', NULL),
(7, 3, 'A0001', NULL),
(8, 3, 'A0004', NULL),
(9, 3, 'A0006', NULL),
(10, 4, NULL, 'CL001'),
(11, 5, 'A0001', NULL),
(12, 5, 'A0004', NULL),
(13, 5, 'A0006', NULL),
(14, 6, 'A0002', NULL),
(15, 6, 'A0005', NULL),
(16, 6, 'A0007', NULL),
(17, 7, NULL, 'CL006'),
(18, 8, 'A0002', NULL),
(19, 8, 'A0005', NULL),
(20, 8, 'A0007', NULL),
(21, 9, 'A0003', NULL),
(22, 9, 'A0008', NULL),
(23, 9, 'A0009', NULL),
(24, 10, NULL, 'CL005'),
(25, 10, NULL, 'CL006');

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

--
-- Volcado de datos para la tabla `tdocente`
--

INSERT INTO `tdocente` (`iddocente`, `idusuario`, `dni`, `nombres`, `apellidos`, `direccion`, `telefono`, `correo`, `cargo`, `estado`, `fecha_inicio`, `idfoto`) VALUES
('d0001', 19, '71344859', 'Juan', 'Diaz Cassa', 'San Judas T-4', '987235472', 'cl@gmail.com', NULL, 'Activo', '2015-03-24 00:00:00', NULL),
('d0002', 20, '72624859', 'Karen', 'Quispe Arana', 'San Sebastian H-4', '986235476', 'clsss@gmail.com', NULL, 'Activo', '2015-03-24 00:00:00', NULL),
('d0003', 21, '45633859', 'Luis', 'Quispe Titto', 'Miraflores G-3', '944235476', 'aasrF@gmail.com', NULL, 'Activo', '2015-03-24 00:00:00', NULL),
('d0004', 22, '75624339', 'Julio', 'Mamani Arias', 'El bosque T-4', '987238476', 'clsddd@gmail.com', NULL, 'Activo', '2015-03-24 00:00:00', NULL),
('d0005', 23, '71024109', 'Ernesto', 'Guzman Pari', 'Unidos T-4', '98723576', 'cldd@gmail.com', NULL, 'Activo', '2015-03-24 00:00:00', NULL),
('d0006', 24, '23624859', 'Lucia', 'Rosas Quintanilla', 'Almirante T-4', '987435476', 'clsff@gmail.com', NULL, 'Activo', '2015-03-24 00:00:00', NULL),
('d0007', 25, '24624559', 'Paula', 'Farfan Hermoza', 'Independencia T-4', '927235476', 'clarF@gmail.com', NULL, 'Activo', '2015-03-24 00:00:00', NULL),
('d0008', 26, '72622259', 'Jorge', 'Condori Gonzales', 'Sta Monica', '985235476', 'TlsrF@gmail.com', NULL, 'Activo', '2015-03-24 00:00:00', NULL),
('d0009', 27, '71624859', 'Carlos', 'Fernandez Toro', 'Jr.Choque T-4', '987335476', 'clsrF@gmail.com', NULL, 'Activo', '2015-03-24 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tfoto`
--

CREATE TABLE IF NOT EXISTS `tfoto` (
  `idfoto` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` longblob,
  PRIMARY KEY (`idfoto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `tfoto`
--

INSERT INTO `tfoto` (`idfoto`, `imagen`) VALUES
(1, NULL),
(2, 0x433a5c77616d705c746d705c706870454634442e746d70),
(3, NULL),
(4, 0x433a5c77616d705c746d705c706870464132372e746d70),
(5, 0x433a5c77616d705c746d705c706870383732312e746d70),
(6, NULL),
(7, NULL),
(8, NULL),
(9, NULL),
(10, NULL),
(11, NULL),
(12, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `thorario`
--

CREATE TABLE IF NOT EXISTS `thorario` (
  `idhorario` int(11) NOT NULL AUTO_INCREMENT,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  PRIMARY KEY (`idhorario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `thorario`
--

INSERT INTO `thorario` (`idhorario`, `hora_inicio`, `hora_fin`) VALUES
(1, '07:00:00', '09:00:00'),
(2, '09:00:00', '11:00:00'),
(3, '11:00:00', '13:00:00'),
(4, '13:00:00', '15:00:00'),
(5, '15:00:00', '17:00:00'),
(6, '17:00:00', '19:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `tmatricula`
--

INSERT INTO `tmatricula` (`idmatricula`, `tipo`, `fecha_matricula`, `idpago`, `idalumno`) VALUES
(1, 'CURSO LIBRE', '2015-04-12 00:00:00', NULL, '153824'),
(2, 'CARRERA PROFESIONAL', '2015-04-12 00:00:00', NULL, '152354'),
(3, 'CARRERA PROFESIONAL', '2015-04-12 00:00:00', NULL, '152358'),
(4, 'CURSO LIBRE', '2015-04-12 00:00:00', NULL, '153829'),
(5, 'CARRERA PROFESIONAL', '2015-04-12 00:00:00', NULL, '153840'),
(6, 'CARRERA PROFESIONAL', '2015-04-12 00:00:00', NULL, '153855'),
(7, 'CURSO LIBRE', '2015-04-12 00:00:00', NULL, '153866'),
(8, 'CARRERA PROFESIONAL', '2015-04-12 00:00:00', NULL, '153877'),
(9, 'CARRERA PROFESIONAL', '2015-04-12 00:00:00', NULL, '153801'),
(10, 'CURSO LIBRE', '2015-04-12 00:00:00', NULL, '153801');

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
  `nro_parcial` int(11) NOT NULL,
  PRIMARY KEY (`idnota`),
  KEY `iddetalle_matricula` (`iddetalle_matricula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tnotas`
--

INSERT INTO `tnotas` (`idnota`, `fecha_nota`, `nota`, `iddetalle_matricula`, `nro_parcial`) VALUES
(1, '2015-06-18 21:59:00', '17.00', 4, 0),
(2, '2015-06-18 22:01:38', '15.00', 4, 1),
(3, '2015-06-18 22:07:04', '14.00', 7, 0),
(4, '2015-06-18 22:07:04', '15.12', 7, 1),
(5, '2015-06-18 22:07:04', '18.00', 11, 0),
(6, '2015-06-18 22:07:04', '13.50', 11, 1);

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

--
-- Volcado de datos para la tabla `tsemestre`
--

INSERT INTO `tsemestre` (`idsemestre`, `fecha_inicio`, `fecha_fin`) VALUES
('2001-I', '2010-01-01 00:00:00', '2010-03-01 00:00:00'),
('2010-I', '2010-01-01 00:00:00', '2010-03-01 00:00:00'),
('2010-II', '2010-03-02 00:00:00', '2010-06-01 00:00:00'),
('2010-III', '2010-06-02 00:00:00', '2010-09-01 00:00:00'),
('2010-VI', '2010-09-02 00:00:00', '2010-12-31 00:00:00'),
('2011-I', '2011-01-01 00:00:00', '2011-03-01 00:00:00'),
('2011-II', '2011-03-02 00:00:00', '2011-06-01 00:00:00'),
('2011-III', '2011-06-02 00:00:00', '2011-09-01 00:00:00'),
('2011-VI', '2011-09-02 00:00:00', '2011-12-31 00:00:00'),
('2012-I', '2012-01-01 00:00:00', '2012-03-01 00:00:00'),
('2012-II', '2012-03-02 00:00:00', '2012-06-01 00:00:00'),
('2012-III', '2012-06-02 00:00:00', '2012-09-01 00:00:00'),
('2012-VI', '2012-09-02 00:00:00', '2012-12-31 00:00:00'),
('2013-I', '2013-01-01 00:00:00', '2013-03-01 00:00:00'),
('2013-II', '2013-03-02 00:00:00', '2013-06-01 00:00:00'),
('2013-III', '2013-06-02 00:00:00', '2013-09-01 00:00:00'),
('2013-VI', '2013-09-02 00:00:00', '2013-12-31 00:00:00'),
('2014-I', '2014-01-01 00:00:00', '2014-03-01 00:00:00'),
('2014-II', '2014-03-02 00:00:00', '2014-06-01 00:00:00'),
('2014-III', '2014-06-02 00:00:00', '2014-09-01 00:00:00'),
('2014-VI', '2014-09-02 00:00:00', '2014-12-31 00:00:00'),
('2015-I', '2015-01-01 00:00:00', '2015-03-01 00:00:00'),
('2015-II', '2015-03-02 00:00:00', '2015-06-01 00:00:00'),
('2015-III', '2015-06-02 00:00:00', '2015-09-01 00:00:00'),
('2015-VI', '2015-09-02 00:00:00', '2015-12-31 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `tusuario`
--

INSERT INTO `tusuario` (`idusuario`, `login`, `password`, `tipo_usuario`) VALUES
(1, 'us1', 'us2', 'Alumno'),
(2, 'us1', 'us2', 'Alumno'),
(3, 'us1', 'us2', 'Alumno'),
(4, 'us1', 'us2', 'Alumno'),
(5, 'us1', 'us2', 'Alumno'),
(6, 'us1', 'us2', 'Alumno'),
(7, 'us1', 'us2', 'Alumno'),
(8, 'us1', 'us2', 'Alumno'),
(9, 'us1', 'us2', 'Alumno'),
(10, 'us1', 'us2', 'Alumno'),
(11, '', '141231i', 'alumno'),
(12, '', '159087i', 'alumno'),
(13, '', '128728i', 'alumno'),
(14, '', '123112i', 'alumno'),
(15, '', '19213i', 'alumno'),
(16, '', 'i', 'administrador'),
(17, '', 'i', 'administrador'),
(18, '', 'i', 'administrador'),
(19, 'us1', 'us1', 'docente'),
(20, 'us1', 'us1', 'docente'),
(21, 'us1', 'us1', 'docente'),
(22, 'us1', 'us1', 'docente'),
(23, 'us1', 'us1', 'docente'),
(24, 'us1', 'us1', 'docente'),
(25, 'us1', 'us1', 'docente'),
(26, 'us1', 'us1', 'docente'),
(27, 'us1', 'us1', 'docente'),
(28, 'us1', 'us1', 'docente'),
(29, 'us1', 'us1', 'docente'),
(30, 'us1', 'us1', 'docente'),
(31, 'us1', 'us1', 'docente'),
(32, 'us1', 'us1', 'docente'),
(33, 'us1', 'us1', 'docente'),
(34, '', 'i', 'administrador'),
(35, '', 'i', 'administrador');

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
  ADD CONSTRAINT `tcarga_academica_ibfk_3` FOREIGN KEY (`idasignatura_cl`) REFERENCES `tasignatura_cl` (`idasignatura_cl`),
  ADD CONSTRAINT `tcarga_academica_ibfk_4` FOREIGN KEY (`iddocente`) REFERENCES `tdocente` (`iddocente`);

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
