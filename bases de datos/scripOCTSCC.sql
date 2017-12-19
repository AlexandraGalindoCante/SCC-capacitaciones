CREATE DATABASE  IF NOT EXISTS `dbcontrolcapacitacion` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbcontrolcapacitacion`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: dbcontrolcapacitacion
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.19-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `asigempleado`
--

DROP TABLE IF EXISTS `asigempleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asigempleado` (
  `idAsigEmpleado` int(10) NOT NULL AUTO_INCREMENT,
  `idEmpleado` varchar(100) DEFAULT NULL,
  `idProgramacion` int(10) DEFAULT NULL,
  PRIMARY KEY (`idAsigEmpleado`),
  KEY `fk_idAsigEmpleado_idEmpleado1_idx` (`idEmpleado`),
  KEY `fk_AsigEmpleado_idProgramacion1_idx` (`idProgramacion`),
  CONSTRAINT `fk_AsigEmpleado_idProgramacion1` FOREIGN KEY (`idProgramacion`) REFERENCES `programacion` (`idProgramacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_idAsigEmpleado_idEmpleado1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`documento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=371 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `asigmodulo`
--

DROP TABLE IF EXISTS `asigmodulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asigmodulo` (
  `idAsigModulo` int(10) NOT NULL AUTO_INCREMENT,
  `idProgramacion` int(10) DEFAULT NULL,
  `idCapacitador` varchar(100) DEFAULT NULL,
  `idModulo` int(10) DEFAULT NULL,
  `resultCapacitador` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idAsigModulo`),
  KEY `fk_AsigModulo_idProgramacion1_idx` (`idProgramacion`),
  KEY `fk_AsigModulo_idModulo1_idx` (`idModulo`),
  KEY `fk_AsigModulo_idCapacitador1_idx` (`idCapacitador`),
  CONSTRAINT `fk_AsigModulo_idCapacitador1` FOREIGN KEY (`idCapacitador`) REFERENCES `capacitador` (`documento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_AsigModulo_idProgramacion1` FOREIGN KEY (`idProgramacion`) REFERENCES `programacion` (`idProgramacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_AsigModulo_idTema1` FOREIGN KEY (`idModulo`) REFERENCES `modulo` (`idModulo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `asigtema`
--

DROP TABLE IF EXISTS `asigtema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asigtema` (
  `idAsigTema` int(10) NOT NULL AUTO_INCREMENT,
  `idModulo` int(10) DEFAULT NULL,
  `idTema` int(10) DEFAULT NULL,
  PRIMARY KEY (`idAsigTema`),
  KEY `fk_AsigTema_idModulo1_idx` (`idModulo`),
  KEY `fk_AsigTema_idTema1_idx` (`idTema`),
  CONSTRAINT `fk_AsigTema_idModulo1` FOREIGN KEY (`idModulo`) REFERENCES `modulo` (`idModulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_AsigTema_idTema1` FOREIGN KEY (`idTema`) REFERENCES `tema` (`idTema`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `capacitador`
--

DROP TABLE IF EXISTS `capacitador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `capacitador` (
  `documento` varchar(100) NOT NULL,
  `nombreCapacitador` varchar(100) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL,
  PRIMARY KEY (`documento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `cargarempleado`
--

DROP TABLE IF EXISTS `cargarempleado`;
/*!50001 DROP VIEW IF EXISTS `cargarempleado`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `cargarempleado` (
  `nombreCompleto` tinyint NOT NULL,
  `documento` tinyint NOT NULL,
  `telefono` tinyint NOT NULL,
  `visibilidad` tinyint NOT NULL,
  `correoElectronico` tinyint NOT NULL,
  `fechaInicioLaboral` tinyint NOT NULL,
  `fechaTerminacionContrato` tinyint NOT NULL,
  `empresa` tinyint NOT NULL,
  `numContrato` tinyint NOT NULL,
  `Tipocontrato` tinyint NOT NULL,
  `idTipoCon` tinyint NOT NULL,
  `idDep` tinyint NOT NULL,
  `area` tinyint NOT NULL,
  `nivelEscolar` tinyint NOT NULL,
  `idTipoNiv` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `consultarcapempleado`
--

DROP TABLE IF EXISTS `consultarcapempleado`;
/*!50001 DROP VIEW IF EXISTS `consultarcapempleado`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `consultarcapempleado` (
  `nombreCompleto` tinyint NOT NULL,
  `documento` tinyint NOT NULL,
  `estado` tinyint NOT NULL,
  `observaciones` tinyint NOT NULL,
  `calificacion` tinyint NOT NULL,
  `nombreModulo` tinyint NOT NULL,
  `fechaFin` tinyint NOT NULL,
  `modalidad` tinyint NOT NULL,
  `tipoCapacitacion` tinyint NOT NULL,
  `nivel` tinyint NOT NULL,
  `visibilidad` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `consultareprobados`
--

DROP TABLE IF EXISTS `consultareprobados`;
/*!50001 DROP VIEW IF EXISTS `consultareprobados`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `consultareprobados` (
  `documento` tinyint NOT NULL,
  `nombreCompleto` tinyint NOT NULL,
  `calificacion` tinyint NOT NULL,
  `tipoCapacitacion` tinyint NOT NULL,
  `nivel` tinyint NOT NULL,
  `fecha` tinyint NOT NULL,
  `idProgramacion` tinyint NOT NULL,
  `idModulo` tinyint NOT NULL,
  `nombreModulo` tinyint NOT NULL,
  `aprobado` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `consultarmodcycp`
--

DROP TABLE IF EXISTS `consultarmodcycp`;
/*!50001 DROP VIEW IF EXISTS `consultarmodcycp`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `consultarmodcycp` (
  `CyCP` tinyint NOT NULL,
  `nombreModulo` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `consultarmodgfc`
--

DROP TABLE IF EXISTS `consultarmodgfc`;
/*!50001 DROP VIEW IF EXISTS `consultarmodgfc`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `consultarmodgfc` (
  `GFC` tinyint NOT NULL,
  `nombreModulo` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `contrato`
--

DROP TABLE IF EXISTS `contrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contrato` (
  `idContrato` int(11) NOT NULL AUTO_INCREMENT,
  `numContrato` varchar(45) DEFAULT NULL,
  `fechaInicioLaboral` date DEFAULT NULL,
  `fechaTerminacionContrato` varchar(45) DEFAULT NULL,
  `tipoContrato_idtipoContrato` int(11) DEFAULT NULL,
  `empresa` varchar(45) DEFAULT NULL,
  `visibilidad` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idContrato`),
  KEY `fk_Contrato_tipoContrato1_idx` (`tipoContrato_idtipoContrato`),
  CONSTRAINT `fk_Contrato_tipoContrato1` FOREIGN KEY (`tipoContrato_idtipoContrato`) REFERENCES `tipocontrato` (`idtipoContrato`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1168 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamento` (
  `idDepartamento` int(10) NOT NULL AUTO_INCREMENT,
  `area` varchar(45) NOT NULL,
  PRIMARY KEY (`idDepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `documento` varchar(100) NOT NULL,
  `nombreCompleto` varchar(100) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `correoElectronico` varchar(45) DEFAULT NULL,
  `Departamento_idDepartamento` int(11) NOT NULL,
  `Contrato_idContrato` int(11) NOT NULL,
  `TipoNivelEscolar_idtipoNivelEscolar` int(11) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL,
  PRIMARY KEY (`documento`),
  KEY `fk_Empleado_Contrato1_idx` (`Contrato_idContrato`),
  KEY `fk_Empleado_TipoNivelEscolar1_idx` (`TipoNivelEscolar_idtipoNivelEscolar`),
  KEY `fk_Empleado_Departamento1_idx` (`Departamento_idDepartamento`),
  CONSTRAINT `fk_Empleado_Contrato1` FOREIGN KEY (`Contrato_idContrato`) REFERENCES `contrato` (`idContrato`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Empleado_Departamento1` FOREIGN KEY (`Departamento_idDepartamento`) REFERENCES `departamento` (`idDepartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Empleado_TipoNivelEscolar1` FOREIGN KEY (`TipoNivelEscolar_idtipoNivelEscolar`) REFERENCES `tiponivelescolar` (`idtipoNivelEscolar`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `empnivelavanzado`
--

DROP TABLE IF EXISTS `empnivelavanzado`;
/*!50001 DROP VIEW IF EXISTS `empnivelavanzado`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `empnivelavanzado` (
  `nombreCompleto` tinyint NOT NULL,
  `documento` tinyint NOT NULL,
  `area` tinyint NOT NULL,
  `visibilidad` tinyint NOT NULL,
  `dias` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `empnivelbasico`
--

DROP TABLE IF EXISTS `empnivelbasico`;
/*!50001 DROP VIEW IF EXISTS `empnivelbasico`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `empnivelbasico` (
  `nombreCompleto` tinyint NOT NULL,
  `documento` tinyint NOT NULL,
  `area` tinyint NOT NULL,
  `visibilidad` tinyint NOT NULL,
  `tiempo` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `empnivelintermedio`
--

DROP TABLE IF EXISTS `empnivelintermedio`;
/*!50001 DROP VIEW IF EXISTS `empnivelintermedio`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `empnivelintermedio` (
  `nombreCompleto` tinyint NOT NULL,
  `documento` tinyint NOT NULL,
  `area` tinyint NOT NULL,
  `visibilidad` tinyint NOT NULL,
  `dias` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `empprogramar`
--

DROP TABLE IF EXISTS `empprogramar`;
/*!50001 DROP VIEW IF EXISTS `empprogramar`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `empprogramar` (
  `nombreCompleto` tinyint NOT NULL,
  `nombreModulo` tinyint NOT NULL,
  `fecha` tinyint NOT NULL,
  `area` tinyint NOT NULL,
  `documento` tinyint NOT NULL,
  `diferencia` tinyint NOT NULL,
  `frecuencia` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `evaluacion`
--

DROP TABLE IF EXISTS `evaluacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluacion` (
  `idEvaluacion` int(10) NOT NULL AUTO_INCREMENT,
  `estado` varchar(45) DEFAULT NULL,
  `observaciones` varchar(100) DEFAULT NULL,
  `calificacion` float NOT NULL,
  `visibilidad` tinyint(1) NOT NULL,
  `idAsigEmpleado` int(10) NOT NULL,
  `idAsigModulo` int(10) NOT NULL,
  PRIMARY KEY (`idEvaluacion`),
  KEY `fk_evaluacion_idAsigEmpleado1_idx` (`idAsigEmpleado`),
  KEY `fk_evaluacion_asigmodulo1_idx` (`idAsigModulo`),
  CONSTRAINT `fk_evaluacion_asigmodulo1` FOREIGN KEY (`idAsigModulo`) REFERENCES `asigmodulo` (`idAsigModulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_evaluacion_idAsigEmpleado1` FOREIGN KEY (`idAsigEmpleado`) REFERENCES `asigempleado` (`idAsigEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `modulo`
--

DROP TABLE IF EXISTS `modulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modulo` (
  `idModulo` int(10) NOT NULL AUTO_INCREMENT,
  `nombreModulo` varchar(100) NOT NULL,
  `frecuencia` int(11) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `visibilidad` int(10) NOT NULL,
  PRIMARY KEY (`idModulo`),
  UNIQUE KEY `nombreModulo` (`nombreModulo`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `modulosprogramacion`
--

DROP TABLE IF EXISTS `modulosprogramacion`;
/*!50001 DROP VIEW IF EXISTS `modulosprogramacion`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `modulosprogramacion` (
  `nombreModulo` tinyint NOT NULL,
  `idModulo` tinyint NOT NULL,
  `idProgramacion` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `programacion`
--

DROP TABLE IF EXISTS `programacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `programacion` (
  `idProgramacion` int(10) NOT NULL AUTO_INCREMENT,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `tipoCapacitacion` varchar(45) NOT NULL,
  `modalidad` varchar(45) NOT NULL,
  `nivel` varchar(45) NOT NULL,
  `visibilidad` tinyint(1) NOT NULL,
  `fechaReg` date NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`idProgramacion`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `idRol` int(10) NOT NULL AUTO_INCREMENT,
  `rol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tema`
--

DROP TABLE IF EXISTS `tema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tema` (
  `idTema` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL,
  PRIMARY KEY (`idTema`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipocontrato`
--

DROP TABLE IF EXISTS `tipocontrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipocontrato` (
  `idtipoContrato` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idtipoContrato`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tiponivelescolar`
--

DROP TABLE IF EXISTS `tiponivelescolar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiponivelescolar` (
  `idtipoNivelEscolar` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtipoNivelEscolar`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `numeroDocumento` varchar(100) NOT NULL,
  `nombreUsuario` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `visibilidad` tinyint(1) NOT NULL,
  `rol` int(10) NOT NULL,
  PRIMARY KEY (`numeroDocumento`),
  KEY `fk_Usuario_Rol1_idx` (`rol`),
  CONSTRAINT `fk_Usuario_Rol1` FOREIGN KEY (`rol`) REFERENCES `rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `ver_programacion`
--

DROP TABLE IF EXISTS `ver_programacion`;
/*!50001 DROP VIEW IF EXISTS `ver_programacion`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ver_programacion` (
  `idProgramacion` tinyint NOT NULL,
  `tipoCapacitacion` tinyint NOT NULL,
  `modalidad` tinyint NOT NULL,
  `fechaInicio` tinyint NOT NULL,
  `fechaFin` tinyint NOT NULL,
  `nivel` tinyint NOT NULL,
  `modulo` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `ver_programacionesproximas`
--

DROP TABLE IF EXISTS `ver_programacionesproximas`;
/*!50001 DROP VIEW IF EXISTS `ver_programacionesproximas`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ver_programacionesproximas` (
  `idProgramacion` tinyint NOT NULL,
  `fechaInicio` tinyint NOT NULL,
  `fechaFin` tinyint NOT NULL,
  `modalidad` tinyint NOT NULL,
  `nivel` tinyint NOT NULL,
  `tipoCapacitacion` tinyint NOT NULL,
  `fechaReg` tinyint NOT NULL,
  `color` tinyint NOT NULL,
  `estado` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `ver_programacionfinalizadas`
--

DROP TABLE IF EXISTS `ver_programacionfinalizadas`;
/*!50001 DROP VIEW IF EXISTS `ver_programacionfinalizadas`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ver_programacionfinalizadas` (
  `idProgramacion` tinyint NOT NULL,
  `fechaInicio` tinyint NOT NULL,
  `fechaFin` tinyint NOT NULL,
  `modalidad` tinyint NOT NULL,
  `nivel` tinyint NOT NULL,
  `tipoCapacitacion` tinyint NOT NULL,
  `fechaReg` tinyint NOT NULL,
  `color` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `verempprogramados`
--

DROP TABLE IF EXISTS `verempprogramados`;
/*!50001 DROP VIEW IF EXISTS `verempprogramados`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `verempprogramados` (
  `nombreCompleto` tinyint NOT NULL,
  `documento` tinyint NOT NULL,
  `idProgramacion` tinyint NOT NULL,
  `area` tinyint NOT NULL,
  `nivelEscolar` tinyint NOT NULL,
  `empresa` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Dumping events for database 'dbcontrolcapacitacion'
--

--
-- Dumping routines for database 'dbcontrolcapacitacion'
--
/*!50003 DROP PROCEDURE IF EXISTS `actualizarEmpleado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarEmpleado`(
 _documento  VARCHAR(45),
_nombreCompleto VARCHAR(45),
_telefono VARCHAR(45),
_correo VARCHAR(45),
_departamento int(10),
_tipoNivelEscolar int(10),
_tipoContrato INT(10),
_fechaInicio DATE,
_fechaFin varchar(45),
_empresa VARCHAR(45),
_numContrato VARCHAR(45)
)
BEGIN

	UPDATE Contrato  SET 
    TipoContrato_idTipoContrato=_tipocontrato,
    fechaInicioLaboral=_fechaInicio, 
    fechaTerminacionContrato=_fechaFin,
    empresa =_empresa,numContrato=_numContrato
    WHERE idContrato = (SELECT Contrato_idContrato FROM Empleado WHERE documento = _documento);
    
	UPDATE Empleado SET 
    nombreCompleto=_nombreCompleto,
    telefono=_telefono,correoElectronico=_correo,
    Departamento_idDepartamento=_departamento,
    tipoNivelEscolar_idTipoNivelEscolar=_tipoNivelEscolar
    WHERE documento=_documento;
    
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `actualizarEvaluacion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarEvaluacion`(
_estado VARCHAR(45),
_observaciones VARCHAR(100),
_calificacion int(10),
_idAsigEmpleado int(10),
_idAsigModulo int(10))
BEGIN
	
    UPDATE evaluacion SET estado = _estado, observaciones = _observaciones,
     calificacion = _calificacion
     WHERE idAsigEmpleado = _idAsigEmpleado AND idAsigModulo = _idAsigModulo;
 
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `actualizarProgramacion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarProgramacion`(
	_idProgramacion INT(10),
	_fechaInicio DATE,
    _fechaFin DATE,
    _tipoCap varchar (45),
    _modalidad VARCHAR(45),
    _nivel VARCHAR(45),
	_hora time)
BEGIN

	UPDATE programacion SET fechaInicio=_fechaInicio,fechaFin=_fechaFin,tipoCapacitacion=_tipoCap,modalidad= _modalidad,nivel=_nivel,hora=_hora
    where idProgramacion=_idProgramacion;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `actualizarUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarUsuario`(
_numeroDocumento VARCHAR(45),
_nombreUsuario VARCHAR (45),
_contrasena VARCHAR(100),
_rol int(10)
)
BEGIN
UPDATE Usuario SET nombreUsuario = _nombreUsuario,numeroDocumento=_numeroDocumento,contrasena=_contrasena,
rol=_rol 
WHERE numeroDocumento=_numeroDocumento;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `asignarTema` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `asignarTema`(
_idTema int(10),
_idModulo int(10))
BEGIN
	
   INSERT INTO AsigTema(idModulo,idTema)VALUES(_idTema,_idModulo);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `buscarCorreo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarCorreo`(
 _documento VARCHAR(45)
 )
BEGIN
    SELECT count(*) AS usuario
    FROM Usuario
    where documento= _documento AND visibilidad = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `buscarUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarUsuario`(
_documento VARCHAR(50)
)
BEGIN
 SELECT contrasena,numeroDocumento
 from Usuario 
 where numeroDocumento=_documento;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `califCapacitador` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `califCapacitador`(
_idAsigModulo int(10),
_resultado VARCHAR(250)
)
BEGIN
	UPDATE AsigModulo set  resultCapacitador=_resultado
    WHERE idAsigModulo=_idAsigModulo;
  
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `cambiarContrasena` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `cambiarContrasena`(
 _doc VARCHAR(50),
 _pass varchar(255)
 )
BEGIN
    UPDATE usuario
    SET contrasena = _pass
    where numeroDocumento = _doc AND visibilidad = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `consultarRol` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarRol`(
_rol varchar (45)
)
BEGIN
SELECT idRol from Rol WHERE rol=_rol;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `crearAsigancion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `crearAsigancion`(
_estado VARCHAR (45),
_programacion_id VARCHAR (45),
_empleado_documento VARCHAR (45)
)
BEGIN
	INSERT INTO asignacion (estado,programacion_idProgramacion,empleado_documento) VALUES (_estado,_programacion_id,_empleado_documento);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `crearAsigEmpleado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `crearAsigEmpleado`(
    _idprogramacion int (10),
    _idEmpleado VARCHAR(100)
)
BEGIN
    
        INSERT INTO asigEmpleado(idEmpleado,idProgramacion) VALUES
        (_idEmpleado,_idProgramacion);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `crearasignacionModulo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `crearasignacionModulo`(
_idCapacitador VARCHAR (45),
_idProgramacion INT (10),
_idModulo INT(10))
BEGIN
INSERT INTO AsigModulo(idCapacitador,idProgramacion,idModulo)
VALUES(_idCapacitador,_idProgramacion,_idModulo);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `crearAsignacionTema` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `crearAsignacionTema`(
_idAsignacionTema INT(10),
_idmodulo int (10),
_idtema int(10)
)
BEGIN
	INSERT INTO asignaciontema (idmodulo,idtema)VALUES(_idmodulo,_idtema);
       
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `crearCapacitador` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `crearCapacitador`(
_documento int(20),
_nombre VARCHAR(45))
BEGIN
	
    INSERT INTO capacitador(documento,nombreCapacitador,visibilidad)VALUES(_documento,_nombre,1);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `crearModulo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `crearModulo`(
_nombreModulo VARCHAR(45),
_frecuencia INT(10),
_descripcion VARCHAR (200))
BEGIN
	INSERT INTO modulo (nombreModulo,frecuencia,descripcion,visibilidad) VALUES(_nombreModulo,_frecuencia,_descripcion,1);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `crearProgramacion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `crearProgramacion`(
		
	_fechaInicio DATE,
    _fechaFin DATE,
    _tipoCap varchar (45),
    _modalidad VARCHAR(45),
    _nivel VARCHAR(45),
_color varchar(7),
_hora time

    )
BEGIN

	INSERT INTO programacion(fechaInicio,fechaFin,tipoCapacitacion,modalidad,nivel,visibilidad,fechaReg,color,estado,hora) 
    VALUES(_fechaInicio,_fechaFin,_tipoCap,_modalidad,_nivel,1,NOW(),_color,0,_hora);
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `crearTema` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `crearTema`(
_nombre varchar(45),
_descripcion varchar(250))
BEGIN
	INSERT INTO TEMA (nombre,descripcion,visibilidad) VALUES(_nombre,_descripcion,1);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `elimAsigEmpleado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `elimAsigEmpleado`(
_idAsignacion INT (10)

)
BEGIN
	DELETE FROM evaluacion 
	WHERE idAsigEmpleado = _idAsignacion;

	DELETE FROM asigEmpleado 
	WHERE idAsigEmpleado = _idAsignacion;


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `eliminarAsigModulo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarAsigModulo`(
_idAsigModulo int (10)
)
BEGIN
DELETE  asigModulo FROM asigmodulo
WHERE idAsigModulo=_idAsigModulo;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `eliminarAsignacionTema` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarAsignacionTema`(
_idAsignacionTema INT(10)
)
BEGIN

		DELETE FROM  asignaciontema 
		WHERE idAsignacionTema=_idAsignacionTema;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `eliminarCapacitador` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarCapacitador`(
_documento int(10))
BEGIN
	
   DELETE Capacitador from Capacitador where documento=_documento;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `eliminarTema` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarTema`(
_idtema INT(10)
)
BEGIN

		UPDATE tema SET visibilidad =0
        WHERE idtema =_idtema ;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `eliminarUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarUsuario`(
_numeroDocumento VARCHAR(20)
)
BEGIN
	DELETE usuario
    from usuario
    WHERE 
    numeroDocumento=_numeroDocumento;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `elimModulo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `elimModulo`(
_idModulo int(10)
)
BEGIN
UPDATE  modulo SET visibilidad=0
where idModulo=_idModulo;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Evaluacion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Evaluacion`(
_asignacion int (10),
_asignacionTema int (10),
_programacion int (10),
_estado VARCHAR (45),
_observacion VARCHAR (45),
_calificacion int (10),
_idEmpleado VARCHAR(45),
_idAsModulo INT (10))
BEGIN

INSERT INTO Evaluacion (asignacion_idAsignacion,asignacionTema_idAsignacionTema,programacion,estado,observacion,calificacion,idEmpleado,idAsigModulo,visibilidad) VALUES
(_asignacion,_asignaciontema,_programacion,_estado,_observacion,_calificacion,_idEmpleado,_idAsModulo,1);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `inhabilitarAsignacion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `inhabilitarAsignacion`(
_idAsignacion INT (10))
BEGIN
	UPDATE  Evaluacion SET visibilidad=0
	WHERE idAsignacion=_idAsignacion;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `inhabilitarEmpleado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `inhabilitarEmpleado`(
_documento VARCHAR(45))
BEGIN

  UPDATE empleado set visibilidad=0 
  where documento=_documento;
  Update contrato set visibilidad = 0
 where Idcontrato = ( select contrato_idContrato from empleado where documento = _documento);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `inhabilitarEvaluacion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `inhabilitarEvaluacion`(
_idEvaluacion INT (10))
BEGIN

UPDATE  Evaluacion SET visibilidad=0
WHERE idEvaluacion=_idEvaluacion;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `inhabilitarProgramacion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `inhabilitarProgramacion`(
	_idProgramacion INT(10))
BEGIN

	UPDATE programacion SET visibilidad=0
    WHERE idProgramacion=_idProgramacion;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `login` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `login`(
 _documento VARCHAR(45)
 )
BEGIN
    SELECt Usuario.*, Rol.idRol, Rol.rol  FROM Usuario
    INNER JOIN Rol ON usuario.rol = rol.idRol
    where numeroDocumento= _documento AND visibilidad = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `modificarAsignacion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarAsignacion`(
_idAsignacion INT (10),
_estado VARCHAR (45),
_programacion_id VARCHAR (45),
_empleado_documento VARCHAR (45)
)
BEGIN

	UPDATE Asignacion SET estado=_estado,programacion=_programacion,empleado_documento=_empleado_documento
	WHERE idAsignacion=_idAsignacion;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `modificarAsignacionTema` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarAsignacionTema`(
_idAsignacionTema INT(10),
_idmodulo int (10),
_idtema int(10)
)
BEGIN

		UPDATE asignaciontema SET idModulo=_idmodulo,idProgramacion=idTema
        WHERE idAsignacionTema=_idAsignacionTema;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `modificarCapacitador` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarCapacitador`(
_documento VARCHAR(45),
_nombre VARCHAR (45)
)
BEGIN
	
  Update Capacitador set documento=_documento,nombreCapacitador=_nombre 
  where documento=_documento;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `modificarEvaluacion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarEvaluacion`(
_idAEvaluacion INT (10),
_asignacion int (10),
_asignacionTema int (10),
_programacion int (10),
_estado VARCHAR (45),
_calificacion float,
_idEmpleado VARCHAR(45),
_idAsModulo INT (10))
BEGIN

UPDATE  Evaluacion SET asignacion_idAsignacion=_asignacion,asignacionTema_idAsignacionTema=_asignaciontema,programacion=_programacion,
estado=_estado,calificacion=_calificacion,idEmpleado=_idEmpleado,idAsigModulo=_idAsModulo
WHERE idEvaluacion=_idEvaluacion;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `modificarModulo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarModulo`(
_idModulo INT (10),
_nombreModulo VARCHAR(45),
_frecuencia INT(10),
_descripcion VARCHAR (200))
BEGIN
	UPDATE  MODULO SET nombreModulo=_nombreModulo,frecuencia=_frecuencia,descripcion=_descripcion
    WHERE idModulo=_idModulo;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `modificarTema` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarTema`(
_idTema int(10),
_nombre varchar(45),
_estado varchar(45),
descripcion varchar(250))
BEGIN
	INSERT INTO TEMA (nombre,estado,descripcion) VALUES(_nombre,_estado,_descripcion);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `registrarEmpleado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `registrarEmpleado`(
_documento VARCHAR(45),
_nombreCompleto VARCHAR(45),
_telefono VARCHAR(45),
_correoElectronico VARCHAR(45),
_tipoNivelEscolar int(10),
_tipoContrato INT(10),
_fechaInicioLaboral DATE,
_fechaTerminacionContrato DATE,
_idDepartamento int(10),
_empresa VARCHAR(45),
_numContrato VARCHAR (45))
BEGIN

	INSERT INTO Contrato(numContrato,fechaInicioLaboral,fechaTerminacionContrato,tipoContrato_idtipoContrato,empresa,visibilidad)
    VALUES(_numContrato,_fechaInicioLaboral,_fechaTerminacionContrato,_tipocontrato,_empresa,1);

	INSERT INTO Empleado(documento,nombreCompleto,telefono,correoElectronico,departamento_idDepartamento,Contrato_idContrato,tipoNivelEscolar_idtipoNivelEscolar,visibilidad) VALUES
    (_documento,_nombreCompleto,_telefono,_correoElectronico,_idDepartamento,(select contrato.idContrato FROM Contrato WHERE contrato.numContrato =_numContrato),_tipoNivelEscolar,1);

    
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `registrarEvaluacion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `registrarEvaluacion`(
_estado VARCHAR(45),
_observaciones VARCHAR(100),
_calificacion float,
_idAsigEmpleado int(10),
_idAsigModulo int(10))
BEGIN
	
    INSERT INTO evaluacion (estado, observaciones, calificacion, visibilidad, idAsigEmpleado, idAsigmodulo) 
	values (_estado,_observaciones,_calificacion,1,_idAsigEmpleado,_idAsigmodulo);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `registrarUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `registrarUsuario`(
_numeroDocumento VARCHAR(45),
_nombreUsuario VARCHAR (45),
_contrasena VARCHAR(100),
_rol int(10)
)
BEGIN
INSERT INTO usuario (numeroDocumento,nombreUsuario,contrasena,rol,visibilidad)VALUES 
(_numeroDocumento,_nombreUsuario,_contrasena,_rol,1);


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `cargarempleado`
--

/*!50001 DROP TABLE IF EXISTS `cargarempleado`*/;
/*!50001 DROP VIEW IF EXISTS `cargarempleado`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `cargarempleado` AS select `empleado`.`nombreCompleto` AS `nombreCompleto`,`empleado`.`documento` AS `documento`,`empleado`.`telefono` AS `telefono`,`empleado`.`visibilidad` AS `visibilidad`,`empleado`.`correoElectronico` AS `correoElectronico`,`contrato`.`fechaInicioLaboral` AS `fechaInicioLaboral`,`contrato`.`fechaTerminacionContrato` AS `fechaTerminacionContrato`,`contrato`.`empresa` AS `empresa`,`contrato`.`numContrato` AS `numContrato`,`tipocontrato`.`nombre` AS `Tipocontrato`,`tipocontrato`.`idtipoContrato` AS `idTipoCon`,`departamento`.`idDepartamento` AS `idDep`,`departamento`.`area` AS `area`,`tiponivelescolar`.`nombre` AS `nivelEscolar`,`tiponivelescolar`.`idtipoNivelEscolar` AS `idTipoNiv` from ((((`empleado` join `contrato` on((`empleado`.`Contrato_idContrato` = `contrato`.`idContrato`))) join `departamento` on((`departamento`.`idDepartamento` = `empleado`.`Departamento_idDepartamento`))) join `tiponivelescolar` on((`tiponivelescolar`.`idtipoNivelEscolar` = `empleado`.`TipoNivelEscolar_idtipoNivelEscolar`))) join `tipocontrato` on((`tipocontrato`.`idtipoContrato` = `contrato`.`tipoContrato_idtipoContrato`))) where (`empleado`.`visibilidad` = '1') order by `empleado`.`nombreCompleto` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `consultarcapempleado`
--

/*!50001 DROP TABLE IF EXISTS `consultarcapempleado`*/;
/*!50001 DROP VIEW IF EXISTS `consultarcapempleado`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `consultarcapempleado` AS select `e`.`nombreCompleto` AS `nombreCompleto`,`e`.`documento` AS `documento`,`ev`.`estado` AS `estado`,`ev`.`observaciones` AS `observaciones`,`ev`.`calificacion` AS `calificacion`,`m`.`nombreModulo` AS `nombreModulo`,`pr`.`fechaFin` AS `fechaFin`,`pr`.`modalidad` AS `modalidad`,`pr`.`tipoCapacitacion` AS `tipoCapacitacion`,`pr`.`nivel` AS `nivel`,`ev`.`visibilidad` AS `visibilidad` from (((((`empleado` `e` join `asigempleado` `ae` on((`ae`.`idEmpleado` = `e`.`documento`))) join `programacion` `pr` on((`pr`.`idProgramacion` = `ae`.`idProgramacion`))) join `asigmodulo` `am` on((`am`.`idProgramacion` = `pr`.`idProgramacion`))) join `modulo` `m` on((`m`.`idModulo` = `am`.`idModulo`))) left join `evaluacion` `ev` on(((`ev`.`idAsigEmpleado` = `ae`.`idAsigEmpleado`) and (`ev`.`idAsigModulo` = `am`.`idAsigModulo`)))) where ((isnull(`ev`.`visibilidad`) or (`ev`.`visibilidad` = 1)) and (`ev`.`calificacion` is not null)) order by `pr`.`fechaFin` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `consultareprobados`
--

/*!50001 DROP TABLE IF EXISTS `consultareprobados`*/;
/*!50001 DROP VIEW IF EXISTS `consultareprobados`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `consultareprobados` AS select `empl`.`documento` AS `documento`,`empl`.`nombreCompleto` AS `nombreCompleto`,`eva`.`calificacion` AS `calificacion`,`pro`.`tipoCapacitacion` AS `tipoCapacitacion`,`pro`.`nivel` AS `nivel`,max(`pro`.`fechaFin`) AS `fecha`,`pro`.`idProgramacion` AS `idProgramacion`,`mo`.`idModulo` AS `idModulo`,`mo`.`nombreModulo` AS `nombreModulo`,(case when (`eva`.`calificacion` >= 3.5) then 1 else 0 end) AS `aprobado` from (((((`empleado` `empl` join `asigempleado` `aem` on((`aem`.`idEmpleado` = `empl`.`documento`))) join `programacion` `pro` on((`pro`.`idProgramacion` = `aem`.`idProgramacion`))) join `asigmodulo` `amo` on((`amo`.`idProgramacion` = `pro`.`idProgramacion`))) join `modulo` `mo` on((`mo`.`idModulo` = `amo`.`idModulo`))) left join `evaluacion` `eva` on(((`eva`.`idAsigEmpleado` = `aem`.`idAsigEmpleado`) and (`eva`.`idAsigModulo` = `amo`.`idAsigModulo`)))) where ((`empl`.`visibilidad` = '1') and ((case when (`eva`.`calificacion` >= 3.5) then 1 else 0 end) = 0) and (`eva`.`calificacion` is not null)) group by `empl`.`documento`,`empl`.`nombreCompleto`,`eva`.`calificacion`,`pro`.`tipoCapacitacion`,`pro`.`nivel`,`pro`.`fechaFin`,`pro`.`idProgramacion`,`mo`.`idModulo`,`mo`.`nombreModulo` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `consultarmodcycp`
--

/*!50001 DROP TABLE IF EXISTS `consultarmodcycp`*/;
/*!50001 DROP VIEW IF EXISTS `consultarmodcycp`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `consultarmodcycp` AS select round(avg(`ev`.`calificacion`),2) AS `CyCP`,`mo`.`nombreModulo` AS `nombreModulo` from (((((`empleado` `em` join `contrato` `co` on((`em`.`Contrato_idContrato` = `co`.`idContrato`))) join `asigempleado` `ae` on((`em`.`documento` = `ae`.`idEmpleado`))) join `evaluacion` `ev` on((`ae`.`idAsigEmpleado` = `ev`.`idAsigEmpleado`))) join `asigmodulo` `am` on((`ev`.`idAsigModulo` = `am`.`idAsigModulo`))) join `modulo` `mo` on((`am`.`idModulo` = `mo`.`idModulo`))) where (`co`.`empresa` = 'CyCP') group by `mo`.`nombreModulo`,`co`.`empresa` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `consultarmodgfc`
--

/*!50001 DROP TABLE IF EXISTS `consultarmodgfc`*/;
/*!50001 DROP VIEW IF EXISTS `consultarmodgfc`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `consultarmodgfc` AS select round(avg(`ev`.`calificacion`),2) AS `GFC`,`mo`.`nombreModulo` AS `nombreModulo` from (((((`empleado` `em` join `contrato` `co` on((`em`.`Contrato_idContrato` = `co`.`idContrato`))) join `asigempleado` `ae` on((`em`.`documento` = `ae`.`idEmpleado`))) join `evaluacion` `ev` on((`ae`.`idAsigEmpleado` = `ev`.`idAsigEmpleado`))) join `asigmodulo` `am` on((`ev`.`idAsigModulo` = `am`.`idAsigModulo`))) join `modulo` `mo` on((`am`.`idModulo` = `mo`.`idModulo`))) where (`co`.`empresa` = 'GFC') group by `mo`.`nombreModulo`,`co`.`empresa` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `empnivelavanzado`
--

/*!50001 DROP TABLE IF EXISTS `empnivelavanzado`*/;
/*!50001 DROP VIEW IF EXISTS `empnivelavanzado`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `empnivelavanzado` AS select `cargarempleado`.`nombreCompleto` AS `nombreCompleto`,`cargarempleado`.`documento` AS `documento`,`cargarempleado`.`area` AS `area`,`cargarempleado`.`visibilidad` AS `visibilidad`,timestampdiff(DAY,`cargarempleado`.`fechaInicioLaboral`,curdate()) AS `dias` from `cargarempleado` where (timestampdiff(DAY,`cargarempleado`.`fechaInicioLaboral`,curdate()) > 365) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `empnivelbasico`
--

/*!50001 DROP TABLE IF EXISTS `empnivelbasico`*/;
/*!50001 DROP VIEW IF EXISTS `empnivelbasico`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `empnivelbasico` AS select `cargarempleado`.`nombreCompleto` AS `nombreCompleto`,`cargarempleado`.`documento` AS `documento`,`cargarempleado`.`area` AS `area`,`cargarempleado`.`visibilidad` AS `visibilidad`,timestampdiff(DAY,`cargarempleado`.`fechaInicioLaboral`,curdate()) AS `tiempo` from `cargarempleado` where (timestampdiff(DAY,`cargarempleado`.`fechaInicioLaboral`,curdate()) < 90) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `empnivelintermedio`
--

/*!50001 DROP TABLE IF EXISTS `empnivelintermedio`*/;
/*!50001 DROP VIEW IF EXISTS `empnivelintermedio`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `empnivelintermedio` AS select `cargarempleado`.`nombreCompleto` AS `nombreCompleto`,`cargarempleado`.`documento` AS `documento`,`cargarempleado`.`area` AS `area`,`cargarempleado`.`visibilidad` AS `visibilidad`,timestampdiff(DAY,`cargarempleado`.`fechaInicioLaboral`,curdate()) AS `dias` from `cargarempleado` where ((timestampdiff(DAY,`cargarempleado`.`fechaInicioLaboral`,curdate()) > 90) and (timestampdiff(DAY,`cargarempleado`.`fechaInicioLaboral`,curdate()) < 365)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `empprogramar`
--

/*!50001 DROP TABLE IF EXISTS `empprogramar`*/;
/*!50001 DROP VIEW IF EXISTS `empprogramar`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `empprogramar` AS select `e`.`nombreCompleto` AS `nombreCompleto`,`m`.`nombreModulo` AS `nombreModulo`,max(`pr`.`fechaFin`) AS `fecha`,`dep`.`area` AS `area`,`e`.`documento` AS `documento`,timestampdiff(MONTH,max(`pr`.`fechaFin`),curdate()) AS `diferencia`,`m`.`frecuencia` AS `frecuencia` from (((((`empleado` `e` join `asigempleado` `ae` on((`ae`.`idEmpleado` = `e`.`documento`))) join `programacion` `pr` on((`pr`.`idProgramacion` = `ae`.`idProgramacion`))) join `asigmodulo` `am` on((`am`.`idProgramacion` = `pr`.`idProgramacion`))) join `modulo` `m` on((`m`.`idModulo` = `am`.`idModulo`))) join `departamento` `dep` on((`dep`.`idDepartamento` = `e`.`Departamento_idDepartamento`))) where ((`e`.`visibilidad` = 1) and (`m`.`frecuencia` <> 0)) group by `e`.`nombreCompleto`,`m`.`nombreModulo`,`dep`.`area`,`e`.`documento`,`m`.`frecuencia` having (timestampdiff(MONTH,`fecha`,curdate()) >= `frecuencia`) order by `e`.`nombreCompleto` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `modulosprogramacion`
--

/*!50001 DROP TABLE IF EXISTS `modulosprogramacion`*/;
/*!50001 DROP VIEW IF EXISTS `modulosprogramacion`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `modulosprogramacion` AS select `m`.`nombreModulo` AS `nombreModulo`,`m`.`idModulo` AS `idModulo`,`a`.`idProgramacion` AS `idProgramacion` from (`modulo` `m` join `asigmodulo` `a` on((`a`.`idModulo` = `m`.`idModulo`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ver_programacion`
--

/*!50001 DROP TABLE IF EXISTS `ver_programacion`*/;
/*!50001 DROP VIEW IF EXISTS `ver_programacion`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `ver_programacion` AS select `p`.`idProgramacion` AS `idProgramacion`,`p`.`tipoCapacitacion` AS `tipoCapacitacion`,`p`.`modalidad` AS `modalidad`,`p`.`fechaInicio` AS `fechaInicio`,`p`.`fechaFin` AS `fechaFin`,`p`.`nivel` AS `nivel`,`mp`.`nombreModulo` AS `modulo` from (`programacion` `p` join `modulosprogramacion` `mp`) where ((`mp`.`idProgramacion` = `p`.`idProgramacion`) and (`p`.`visibilidad` = 1)) group by `p`.`idProgramacion`,`mp`.`nombreModulo` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ver_programacionesproximas`
--

/*!50001 DROP TABLE IF EXISTS `ver_programacionesproximas`*/;
/*!50001 DROP VIEW IF EXISTS `ver_programacionesproximas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `ver_programacionesproximas` AS select `programacion`.`idProgramacion` AS `idProgramacion`,`programacion`.`fechaInicio` AS `fechaInicio`,`programacion`.`fechaFin` AS `fechaFin`,`programacion`.`modalidad` AS `modalidad`,`programacion`.`nivel` AS `nivel`,`programacion`.`tipoCapacitacion` AS `tipoCapacitacion`,`programacion`.`fechaReg` AS `fechaReg`,`programacion`.`color` AS `color`,`programacion`.`estado` AS `estado` from `programacion` where ((`programacion`.`visibilidad` = '1') and (`programacion`.`fechaFin` >= curdate())) order by `programacion`.`fechaReg` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ver_programacionfinalizadas`
--

/*!50001 DROP TABLE IF EXISTS `ver_programacionfinalizadas`*/;
/*!50001 DROP VIEW IF EXISTS `ver_programacionfinalizadas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `ver_programacionfinalizadas` AS select `programacion`.`idProgramacion` AS `idProgramacion`,`programacion`.`fechaInicio` AS `fechaInicio`,`programacion`.`fechaFin` AS `fechaFin`,`programacion`.`modalidad` AS `modalidad`,`programacion`.`nivel` AS `nivel`,`programacion`.`tipoCapacitacion` AS `tipoCapacitacion`,`programacion`.`fechaReg` AS `fechaReg`,`programacion`.`color` AS `color` from `programacion` where (((`programacion`.`visibilidad` = '1') and (`programacion`.`fechaFin` < curdate())) or (not(curdate()))) order by `programacion`.`fechaReg` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `verempprogramados`
--

/*!50001 DROP TABLE IF EXISTS `verempprogramados`*/;
/*!50001 DROP VIEW IF EXISTS `verempprogramados`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `verempprogramados` AS select `viewe`.`nombreCompleto` AS `nombreCompleto`,`viewe`.`documento` AS `documento`,`ag`.`idProgramacion` AS `idProgramacion`,`viewe`.`area` AS `area`,`viewe`.`nivelEscolar` AS `nivelEscolar`,`viewe`.`empresa` AS `empresa` from (`cargarempleado` `viewe` join `asigempleado` `ag` on((`ag`.`idEmpleado` = `viewe`.`documento`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-01 13:08:28
