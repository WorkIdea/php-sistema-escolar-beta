-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-05-2014 a las 14:09:42
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `system_info`
--
CREATE DATABASE IF NOT EXISTS `system_info` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `system_info`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ae_colegio`
--

CREATE TABLE IF NOT EXISTS `ae_colegio` (
  `idcol` int(2) NOT NULL,
  `idanio` int(1) NOT NULL,
  PRIMARY KEY (`idanio`,`idcol`),
  UNIQUE KEY `idanio` (`idanio`,`idcol`),
  KEY `idanio_2` (`idanio`,`idcol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ae_colegio`
--

INSERT INTO `ae_colegio` (`idcol`, `idanio`) VALUES
(1, 1),
(2, 1),
(3, 1),
(1, 2),
(2, 2),
(3, 2),
(1, 3),
(2, 3),
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alu_ae_colegio`
--

CREATE TABLE IF NOT EXISTS `alu_ae_colegio` (
  `idcol` int(2) NOT NULL,
  `idanio` int(1) NOT NULL,
  `idalu` int(3) NOT NULL,
  PRIMARY KEY (`idalu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alu_rep`
--

CREATE TABLE IF NOT EXISTS `alu_rep` (
  `idrep` int(3) NOT NULL,
  `idalu` int(3) NOT NULL,
  PRIMARY KEY (`idrep`,`idalu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alu_rep`
--

INSERT INTO `alu_rep` (`idrep`, `idalu`) VALUES
(4, 1),
(4, 2),
(4, 6),
(9, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anio_escolar`
--

CREATE TABLE IF NOT EXISTS `anio_escolar` (
  `idanio` int(1) NOT NULL,
  `nomanio` varchar(50) NOT NULL,
  PRIMARY KEY (`idanio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anio_escolar`
--

INSERT INTO `anio_escolar` (`idanio`, `nomanio`) VALUES
(1, 'SEPTIMO ANIO'),
(2, 'OCTAVO ANIO'),
(3, 'NOVENO ANIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE IF NOT EXISTS `asignatura` (
  `idasig` int(1) NOT NULL,
  `nomasig` varchar(100) NOT NULL,
  PRIMARY KEY (`idasig`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`idasig`, `nomasig`) VALUES
(1, 'CASTELLANO Y LITERATURA'),
(2, 'INGLES'),
(3, 'MATEMATICA'),
(4, 'ESTUDIOS DE LA NATURALEZA'),
(5, 'HISTORIA DE VENEZUELA'),
(6, 'EDUCACION FAMILIAR Y CIUDADANA'),
(7, 'GEOGRAFIA DE VENEZUELA'),
(8, 'EDUCACION ARTISTICA'),
(9, 'EDUCACION FISICA Y DEPORTE'),
(10, 'EDUCACION PARA EL TRABAJO'),
(11, 'EDUCACION PARA LA SALUD'),
(12, 'CIENCIAS BIOLOGICAS'),
(13, 'HISTORIA UNIVERSAL'),
(14, 'FISICA'),
(15, 'QUIMICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura_ae`
--

CREATE TABLE IF NOT EXISTS `asignatura_ae` (
  `idanio` int(1) NOT NULL,
  `idasig` int(1) NOT NULL,
  PRIMARY KEY (`idanio`,`idasig`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignatura_ae`
--

INSERT INTO `asignatura_ae` (`idanio`, `idasig`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(2, 1),
(2, 2),
(2, 3),
(2, 5),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(3, 1),
(3, 2),
(3, 3),
(3, 5),
(3, 7),
(3, 9),
(3, 10),
(3, 12),
(3, 14),
(3, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asisten_asig_alu`
--

CREATE TABLE IF NOT EXISTS `asisten_asig_alu` (
  `idalu` int(3) NOT NULL,
  `idasig` int(1) NOT NULL,
  `dia` date NOT NULL,
  `asistio` varchar(1) NOT NULL,
  PRIMARY KEY (`idalu`,`idasig`,`dia`),
  UNIQUE KEY `idalu` (`idalu`,`idasig`,`dia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calif_asig_alu`
--

CREATE TABLE IF NOT EXISTS `calif_asig_alu` (
  `idalu` int(3) NOT NULL,
  `idasig` int(1) NOT NULL,
  `calif` int(2) NOT NULL,
  PRIMARY KEY (`idalu`,`idasig`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calif_asig_alu_lapso`
--

CREATE TABLE IF NOT EXISTS `calif_asig_alu_lapso` (
  `idalu` int(3) NOT NULL,
  `idasig` int(1) NOT NULL,
  `idlap` int(1) NOT NULL,
  `calif` int(2) NOT NULL,
  PRIMARY KEY (`idalu`,`idasig`,`idlap`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colegio`
--

CREATE TABLE IF NOT EXISTS `colegio` (
  `idcol` int(2) NOT NULL,
  `nomcol` varchar(50) NOT NULL,
  `direcol` varchar(50) NOT NULL,
  PRIMARY KEY (`idcol`),
  UNIQUE KEY `codins` (`idcol`),
  KEY `codins_2` (`idcol`),
  KEY `idcol` (`idcol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `colegio`
--

INSERT INTO `colegio` (`idcol`, `nomcol`, `direcol`) VALUES
(1, 'E.N.B SEVERIANO RODRIGUEZ', 'MARACAIBO'),
(2, 'E.N.B ROMULO GALLEGOS', 'MARACAIBO'),
(3, 'U.E SAN IGNACIO, FE Y ALEGRIA', 'SAN FRANCISCO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doc_asig_ae_colegio`
--

CREATE TABLE IF NOT EXISTS `doc_asig_ae_colegio` (
  `idcol` int(2) NOT NULL,
  `idanio` int(1) NOT NULL,
  `idasig` int(1) NOT NULL,
  `iddoc` int(3) NOT NULL,
  PRIMARY KEY (`idcol`,`idanio`,`idasig`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo_escolar`
--

CREATE TABLE IF NOT EXISTS `periodo_escolar` (
  `idperi` int(1) NOT NULL,
  `nomperi` varchar(50) NOT NULL,
  `desde` date NOT NULL,
  `hasta` date NOT NULL,
  PRIMARY KEY (`idperi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `periodo_escolar`
--

INSERT INTO `periodo_escolar` (`idperi`, `nomperi`, `desde`, `hasta`) VALUES
(1, 'PERIODO ESCOLAR 2014', '2014-01-01', '2014-01-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rep_colegio`
--

CREATE TABLE IF NOT EXISTS `rep_colegio` (
  `idcol` int(2) NOT NULL,
  `idrep` int(3) NOT NULL,
  PRIMARY KEY (`idcol`,`idrep`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_central`
--

CREATE TABLE IF NOT EXISTS `tab_central` (
  `tipotab` varchar(10) NOT NULL,
  `codtab` varchar(3) NOT NULL,
  `desctab` varchar(50) NOT NULL,
  PRIMARY KEY (`tipotab`,`codtab`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tab_central`
--

INSERT INTO `tab_central` (`tipotab`, `codtab`, `desctab`) VALUES
('ROLUSU', 'ALU', 'ALUMNO'),
('ROLUSU', 'DOC', 'DOCENTE'),
('ROLUSU', 'REP', 'REPRESENTANTE'),
('TIPOID', 'E', 'EXTRANJERO'),
('TIPOID', 'V', 'VENEZOLANO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_info`
--

CREATE TABLE IF NOT EXISTS `usuario_info` (
  `idusu` int(3) NOT NULL,
  `tipoid` varchar(1) NOT NULL,
  `numid` int(14) NOT NULL,
  `nomusu` varchar(50) NOT NULL,
  `apeusu` varchar(50) NOT NULL,
  `direcusu` varchar(50) NOT NULL,
  PRIMARY KEY (`tipoid`,`numid`),
  UNIQUE KEY `tipoid` (`tipoid`,`numid`),
  KEY `tipoid_2` (`tipoid`,`numid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_info`
--

INSERT INTO `usuario_info` (`idusu`, `tipoid`, `numid`, `nomusu`, `apeusu`, `direcusu`) VALUES
(9, 'V', 123, 'PROFESOR', 'PRUEBA', 'MARACAIBO'),
(4, 'V', 9713096, 'MARI', 'HERNANDEZ', 'MARACAIBO'),
(7, 'V', 19016130, 'RICHARD', 'ARRIETA', 'MARACAIBO'),
(1, 'V', 20660429, 'EMILIO', 'GRATEROL', 'MARACAIBO'),
(5, 'V', 21230824, 'JEAN', 'BECERRA', 'SAN FCO'),
(6, 'V', 21230829, 'ARGENIS', 'PEÃ‘A', 'SAN FCO'),
(3, 'V', 21359647, 'EVER', 'HERNANDEZ', 'SAN FCO'),
(2, 'V', 24738616, 'DOUGLAS', 'GONZALEZ', 'SAN FCO'),
(8, 'V', 25334288, 'ANDRES', 'GONZALEZ', 'SAN FCO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_login`
--

CREATE TABLE IF NOT EXISTS `usuario_login` (
  `idusu` int(3) NOT NULL,
  `tipoid` varchar(1) NOT NULL,
  `numid` int(14) NOT NULL,
  `passusu` varchar(50) NOT NULL,
  PRIMARY KEY (`tipoid`,`numid`),
  UNIQUE KEY `tipoid` (`tipoid`,`numid`),
  KEY `tipoid_2` (`tipoid`,`numid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_login`
--

INSERT INTO `usuario_login` (`idusu`, `tipoid`, `numid`, `passusu`) VALUES
(9, 'V', 123, '123'),
(4, 'V', 9713096, '123'),
(7, 'V', 19016130, '123'),
(1, 'V', 20660429, '123'),
(5, 'V', 21230824, '123'),
(6, 'V', 21230829, '123'),
(3, 'V', 21359647, '123'),
(2, 'V', 24738616, '123'),
(8, 'V', 25334288, '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_rol`
--

CREATE TABLE IF NOT EXISTS `usuario_rol` (
  `idusu` int(3) NOT NULL,
  `rolusu` varchar(3) NOT NULL,
  PRIMARY KEY (`idusu`,`rolusu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_rol`
--

INSERT INTO `usuario_rol` (`idusu`, `rolusu`) VALUES
(1, 'ALU'),
(2, 'ALU'),
(3, 'ALU'),
(4, 'REP'),
(5, 'ALU'),
(6, 'ALU'),
(7, 'ALU'),
(8, 'ALU'),
(9, 'DOC'),
(9, 'REP');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
