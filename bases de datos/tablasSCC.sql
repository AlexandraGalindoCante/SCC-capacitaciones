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
-- Dumping data for table `modulo`
--

LOCK TABLES `modulo` WRITE;
/*!40000 ALTER TABLE `modulo` DISABLE KEYS */;
INSERT INTO `modulo` VALUES (12,'HABEAS DATA',12,'LEY 1266 2008',0),(13,'PROTECCION DE DATOS',6,'LEY 1581 DE 2012 ',1),(14,'REGIMEN DE PROTECCION AL CONSUMIDOR FINANCIERO',6,'Circular Externa  015 de 2010 S.A.C',1),(17,'CONDICIONES DE LA GESTION DE COBRANZA PREJUDICIAL',3,'Circular Externa 048 de 2008  ',0),(18,'SISTEMA DE CONTROL INTERNO',12,'Circular Externo   014 de  2009 ',1),(19,'SARO',12,'Circular  Externa 048 de 2006 ',1),(20,'SARLAFT ',12,'Circular  022 de 2007 ',1),(21,'VICTIMAS DEL CONFLICTO ARMADO',6,'Circular Externa 021 de 2012 ',1),(23,'CONTINUIDAD DEL NEGOCIO',6,'ninguna',0),(31,'ACTITUD',0,'LENGUAJE, EMOCIONALIDAD, CORPORALIDAD.',1),(32,'NEGOCIACION ',0,'TECNICAS, OBJECIONES Y CIERRE.',1),(33,'COMUNICACION I',4,'',1),(36,'GESTOR DE COBRANZA',0,'',1),(38,'NEUROCOBRANZA',0,' NEGOCIACION EN COBRANZA',1),(39,'SEGURIDAD DE LA INFORMACION R.',0,' REINDUCCION.',1),(41,'ACTUALIZACION DE CARTERA',0,' NEGOCIACIÃ“N Y CONOCIMIENTO DE CARTERA EN GENERAL.',1),(42,'MOTIVACION-LENGUAJE COMPLEMENTARIO',0,' ACTITUD.',1),(43,'MOTIVACIÃ“N- HACIA LA PRODUCTIVIDAD',0,' ',1);
/*!40000 ALTER TABLE `modulo` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `tema`
--

LOCK TABLES `tema` WRITE;
/*!40000 ALTER TABLE `tema` DISABLE KEYS */;
INSERT INTO `tema` VALUES (1,'partes del cerebro y caracteristicas','              cerebro reptilico',0),(2,'prueba ','PRUEBA              ',0),(3,'cerebro reptilico ','              ',1);
/*!40000 ALTER TABLE `tema` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` VALUES (1,'Calidad'),(2,'Cartera financiera'),(3,'Contabilidad'),(4,'Correspondencia'),(5,'Gestores de campo'),(6,'Gerencia'),(7,'Talento humano'),(8,'TIC'),(9,'Venta Directa'),(10,'Sin asignar'),(11,'Incapacitado');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `programacion`
--

LOCK TABLES `programacion` WRITE;
/*!40000 ALTER TABLE `programacion` DISABLE KEYS */;
INSERT INTO `programacion` VALUES (64,'2017-09-21','2017-09-21','INDUCTIVA','FORMACION','NIVEL BASICO',1,'2017-10-31','#1D6CD4',1,'14:00:00'),(65,'2017-09-20','2017-09-20','CORRECTIVA','PERFECCIONAMIENTO','NIVEL GENERAL',1,'2017-10-31','#FE2E2E',2,'14:00:00'),(66,'2017-09-12','2017-09-12','INDUCTIVA','FORMACION','NIVEL BASICO',1,'2017-10-31','#12BA60',2,'14:00:00'),(67,'2017-09-04','2017-09-04','INDUCTIVA','FORMACION','NIVEL BASICO',1,'2017-10-31','#5858FA',2,'14:00:00'),(68,'2017-10-27','2017-10-27','INDUCTIVA','ACTUALIZACION','NIVEL GENERAL',1,'2017-11-01','#5858FA',2,'14:30:00'),(69,'2017-10-13','2017-10-13','PREVENTIVA','ESPECIALIZACION','NIVEL GENERAL',1,'2017-11-01','#FE2E2E',2,'07:30:00'),(70,'2017-10-13','2017-10-13','INDUCTIVA','FORMACION','NIVEL GENERAL',1,'2017-11-01','#40E0D0',2,'11:00:00'),(71,'2017-10-05','2017-10-05','INDUCTIVA','PERFECCIONAMIENTO','NIVEL INTERMEDIO',0,'2017-11-01','#40E0D0',0,'11:00:00'),(72,'2017-10-05','2017-10-05','CORRECTIVA','PERFECCIONAMIENTO','NIVEL GENERAL',1,'2017-11-01','#FE2E2E',2,'11:00:00'),(73,'2017-10-06','2017-10-06','PREVENTIVA','PERFECCIONAMIENTO','NIVEL GENERAL',1,'2017-11-01','#12BA60',2,'10:30:00'),(74,'2017-11-01','2017-11-01','INDUCTIVA','ACTUALIZACION','NIVEL GENERAL',0,'2017-11-01','#5858FA',2,'09:00:00');
/*!40000 ALTER TABLE `programacion` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `contrato`
--

LOCK TABLES `contrato` WRITE;
/*!40000 ALTER TABLE `contrato` DISABLE KEYS */;
INSERT INTO `contrato` VALUES (949,'0-009','2013-02-01','',2,'GFC',1),(950,'0-426','2016-01-18','',2,'CyCP',1),(951,'0-006','2011-09-16',NULL,2,'GF',1),(952,'0-556','2016-06-27',NULL,2,'CYCP',1),(953,'0-648','2017-06-12','Definido 4 Meses',1,'GF',1),(954,'0-377','2015-11-17',NULL,2,'CYCP',1),(955,'0-576','2016-07-05',NULL,2,'GF',1),(956,'0-357','2015-09-16',NULL,2,'GF',1),(957,'0-545','2016-07-05',NULL,2,'GF',1),(958,'0-688','2017-09-13','Definido 4 Meses',1,'GF',1),(959,'0-001','2008-06-18',NULL,2,'GF',1),(960,'0-584','2016-07-25',NULL,2,'CYCP',1),(961,'0-003','2010-10-16',NULL,2,'GF',1),(962,'0-543','2016-07-05',NULL,2,'GF',1),(963,'0-619','2017-01-01',NULL,2,'CYCP',1),(964,'0-547','2016-07-06',NULL,2,'GF',1),(965,'0-541','2016-06-22',NULL,2,'GF',1),(966,'0-682','2017-09-04','Definido 4 Meses',1,'GF',1),(967,'0-642','2017-05-02','07 de Febrero de 2018',3,'GF',1),(968,'0-434','2015-12-01',NULL,2,'CYCP',1),(969,'0-704','2017-09-26','Definido 4 Meses',1,'GF',1),(970,'0-353','2015-09-16',NULL,2,'CYCP',1),(971,'0-053','2014-05-02',NULL,2,'GF',1),(972,'0-496','2016-04-04',NULL,2,'CYCP',1),(973,'0-657','2017-06-23','Definido 2 Meses',1,'GF',1),(974,'0-647','2017-06-12','Definido 4 Meses',1,'GF',1),(975,'0-489','2016-04-04',NULL,2,'CYCP',1),(976,'0-332','2015-09-16',NULL,2,'CYCP',1),(977,'0-403','2015-11-17',NULL,2,'GF',1),(978,'0-695','2017-09-21','Definido 4 Meses',1,'GF',1),(979,'0-386','2015-11-17',NULL,2,'CYCP',1),(980,'0-309','2015-06-16',NULL,2,'CYCP',1),(981,'0-011','2014-05-02',NULL,2,'CYCP',1),(982,'0-471','2016-03-17',NULL,2,'CYCP',1),(983,'0-446','2016-02-16',NULL,2,'CYCP',1),(984,'0-542','2016-07-05',NULL,2,'GF',1),(985,'0-318','2015-10-19',NULL,2,'CYCP',1),(986,'0-341','2015-09-16',NULL,2,'CYCP',1),(987,'0-587','2016-08-01',NULL,2,'CYCP',1),(988,'0-633','2017-04-01','Definido 4 Meses',1,'CYCP',1),(989,'0-458','2016-04-01',NULL,2,'CYCP',1),(990,'0-524','2016-04-20',NULL,2,'CYCP',1),(991,'0-195','2015-02-16',NULL,2,'CYCP',1),(992,'0-005','2011-09-01',NULL,2,'GF',1),(993,'0-661','2017-08-01','Definido 4 Meses',1,'CYCP',1),(994,'0-628','2017-01-01',NULL,2,'GF',1),(995,'0-102','2014-08-04',NULL,2,'GF',1),(996,'0-603','2016-10-10',NULL,2,'GF',1),(997,'0-347','2015-08-18',NULL,2,'GF',1),(998,'0-604','2016-10-10','Compensar 6 Meses ',1,'CYCP',1),(999,'0-615','2016-10-26','10 de Abril de 2018',3,'GF',1),(1000,'0-132','2014-10-16',NULL,2,'CYCP',1),(1001,'0-687','2017-09-13','Definido 4 Meses',1,'GF',1),(1002,'0-673','2017-08-17','Definido 4 Meses',1,'GF',1),(1003,'0-488','2016-04-04',NULL,2,'CYCP',1),(1004,'0-660','2017-07-25','13 de Septiembre de 2018',3,'CYCP',1),(1005,'0-501','2016-05-17','Compensar 6 Meses',2,'GF',1),(1006,'0-696','2017-09-21','Definido 4 Meses',1,'GF',1),(1007,'0-346','2015-08-18',NULL,2,'GF',1),(1008,'0-363','2015-10-19',NULL,2,'CYCP',1),(1009,'0-279','2015-04-16',NULL,2,'CYCP',1),(1010,'0-689','2017-09-13','Definido 4 Meses',1,'GF',1),(1011,'0-344','2015-09-16',NULL,2,'CYCP',1),(1012,'0-523','2016-04-18',NULL,2,'CYCP',1),(1013,'0-065','2014-09-01',NULL,2,'CYCP',1),(1014,'0-483','2016-03-17',NULL,2,'CYCP',1),(1015,'0-629','2017-02-27','Definido 2 Meses',2,'CYCP',1),(1016,'0-621','2016-10-31','Definido 4 Meses',1,'GF',1),(1017,'0-607','2016-10-10','Compensar 6 Meses ',1,'GF',1),(1018,'0-520','2016-04-18',NULL,2,'CYCP',1),(1019,'0-641','2017-04-19','Compensar 6 Meses ',1,'CYCP',1),(1020,'0-539','2016-04-22','1 Año',1,'CYCP',1),(1021,'0-502','2016-04-18',NULL,2,'CYCP',1),(1022,'0-466','2016-05-03',NULL,2,'GF',1),(1023,'0-651','2017-05-02','Compensar 6 Meses',1,'CYCP',1),(1024,'0-489C','2016-05-16',NULL,2,'GF',1),(1025,'0-651','2017-06-20',NULL,2,'GF',1),(1026,'0-013','2013-04-16',NULL,2,'GF',1),(1027,'0-675','2017-08-28','Definido 4 Meses',1,'GF',1),(1028,'0-515','2016-04-18',NULL,2,'CYCP',1),(1029,'0-694','2017-09-21','Definido 4 Meses',1,'GF',1),(1030,'0-572','2016-07-12',NULL,1,'GF',1),(1031,'0-657','2017-06-08','Definido 4 Meses',1,'CYCP',1),(1032,'0-550','2016-06-16',NULL,2,'CYCP',1),(1033,'0-641','2017-03-02','Definido 4 Meses',1,'GF',1),(1034,'0-365','2015-10-19',NULL,2,'CYCP',1),(1035,'0-407','2015-11-17',NULL,2,'GF',1),(1036,'0-483','2016-05-02',NULL,2,'GF',1),(1037,'0-418','2015-11-17',NULL,2,'CYCP',1),(1038,'0-650','2017-05-02','Compensar 6 Meses',1,'CYCP',1),(1039,'0-499','2016-04-14',NULL,2,'CYCP',1),(1040,'0-684','2017-09-04','Definido 4 Meses',1,'GF',1),(1041,'0-400','2015-11-17',NULL,2,'CYCP',1),(1042,'0-373','2015-11-03',NULL,2,'CYCP',1),(1043,'0-506','2016-04-18',NULL,2,'CYCP',1),(1044,'0-655','2017-05-02','Compensar 6 Meses',1,'CYCP',1),(1045,'0-525','2016-05-19',NULL,2,'GF',1),(1046,'0-655','2017-06-23','Definido 4 Meses',1,'GF',1),(1047,'0-674','2017-08-17','Definido 4 Meses',1,'GF',1),(1048,'0-486','2016-04-04',NULL,2,'CYCP',1),(1049,'0-517','2016-04-18',NULL,2,'CYCP',1),(1050,'0-354','2015-09-16',NULL,2,'GF',1),(1051,'0-405','2015-11-17',NULL,2,'GF',1),(1052,'0-579','2016-07-25',NULL,2,'CYCP',1),(1053,'0-487','2016-04-04',NULL,2,'CYCP',1),(1054,'0-575','2016-08-17','Compensar 6 Meses',2,'GF',1),(1055,'0-590','2016-09-29','Compensar 6 Meses',1,'GF',1),(1056,'0-656','2017-06-27','Definido 4 Meses',1,'GF',1),(1057,'0-439','2016-02-22','Compensar 6 Meses',2,'GF',1),(1058,'0-661','2017-07-04','Definido 4 Meses',1,'GF',1),(1059,'0-658','2017-07-07','17 de Abril de 2019',3,'CYCP',1),(1060,'0-589','2016-09-29','Compensar 6 Meses',1,'GF',1),(1061,'0-449','2016-02-16',NULL,2,'CYCP',1),(1062,'0-671','2017-08-17','Definido 4 Meses',1,'GF',1),(1063,'0-630','2017-02-27','Definido 2 Meses',2,'CYCP',1),(1064,'0-490','2016-05-16',NULL,2,'GF',1),(1065,'0-463','2016-05-03','1 Año / Pendiente Firma de Otro Si',1,'GF',1),(1066,'0-467','2016-03-17',NULL,2,'CYCP',1),(1067,'0-652','2017-05-02','Compensar 6 Meses',1,'CYCP',1),(1068,'0-624','2017-02-17','11 de Abril de 2018',3,'CYCP',1),(1069,'0-629','2017-03-16','21 de Agosto de 2018',3,'GF',1),(1070,'0-643','2017-04-19','Compensar 6 Meses ',1,'CYCP',1),(1071,'0-619','2016-10-31','Definido 4 Meses',1,'GF',1),(1072,'0-402','2015-12-01',NULL,2,'CYCP',1),(1073,'0-623','2017-02-04','10 de Abril de 2018',3,'CYCP',1),(1074,'0-490','2016-04-04',NULL,2,'CYCP',1),(1075,'0-594','2016-09-02',NULL,2,'CYCP',1),(1076,'0-659','2017-06-20','30 de Enero de 2018',3,'GF',1),(1077,'0-664','2017-09-20','19 de Marzo de 2018',3,'CYCP',1),(1078,'0-007','2012-05-16','Definido 2 Meses',1,'GF',1),(1079,'0-627','2017-02-23','25 de Enero 2018',3,'CYCP',1),(1080,'0-388','2015-10-19',NULL,2,'GF',1),(1081,'0-355','2015-09-16',NULL,2,'GF',1),(1082,'0-608','2016-10-10','Compensar 6 Meses ',1,'CYCP',1),(1083,'0-492','2016-05-16',NULL,2,'GF',1),(1084,'0-635','2017-04-06','Definido 4 Meses',1,'CYCP',1),(1085,'0-385','2015-10-19',NULL,2,'GF',1),(1086,'0-602','2016-10-10','Compensar 6 Meses ',1,'CYCP',1),(1087,'0-702','2017-09-25','Definido 4 Meses',1,'GF',1),(1088,'0-425','2015-12-01',NULL,2,'CYCP',1),(1089,'0-523','2016-06-01',NULL,2,'GF',1),(1090,'0-321','2015-08-18',NULL,2,'CYCP',1),(1091,'0-581','2016-07-25','1 Año',1,'CYCP',1),(1092,'0-658','2017-07-04','Definido 4 Meses',1,'GF',1),(1093,'0-477','2016-05-02',NULL,2,'GF',1),(1094,'0-650','2017-06-14','Definido 4 Meses',1,'GF',1),(1095,'0-578','2016-07-25',NULL,2,'CYCP',1),(1096,'0-470','2016-05-03',NULL,2,'GF',1),(1097,'0-612','2016-10-10','Compensar 6 Meses ',1,'CYCP',1),(1098,'0-322','2015-08-18',NULL,2,'CYCP',1),(1099,'0-401','2015-11-17',NULL,2,'CYCP',1),(1100,'0-646','2017-06-12','Definido 4 Meses',1,'GF',1),(1101,'0-665','2017-08-01','Definido 4 Meses',1,'GF',1),(1102,'0-392','2015-12-01',NULL,2,'CYCP',1),(1103,'0-605','2016-10-10','Compensar 6 Meses ',1,'GF',1),(1104,'0-677','2017-08-28','Definido 4 Meses',1,'GF',1),(1105,'0-539','2016-06-07',NULL,2,'GF',1),(1106,'0-652','2017-06-22','Definido 4 Meses',1,'GF',1),(1107,'0-647','2017-04-19','Compensar 6 Meses ',1,'CYCP',1),(1108,'0-679','2017-08-28','Definido 4 Meses',1,'GF',1),(1109,'0-504','2016-04-18','1 Año',1,'CYCP',1),(1110,'0-381','2015-11-17',NULL,2,'CYCP',1),(1111,'0-698','2017-09-25','Definido 4 Meses',1,'GF',1),(1112,'0-012','2014-05-02',NULL,2,'CYCP',1),(1113,'0-532','2016-06-07','1 Año / Pendiente Firma de Otro Si',1,'GF',1),(1114,'0-601','2016-10-10','Compensar 6 Meses ',1,'GF',1),(1115,'0-386','2015-10-19',NULL,2,'GF',1),(1116,'0-693','2017-09-21','Definido 4 Meses',1,'GF',1),(1117,'0-244','2015-04-16',NULL,2,'CYCP',1),(1118,'0-493','2016-05-16',NULL,2,'GF',1),(1119,'0-670','2017-08-08','Definido 4 Meses',1,'GF',1),(1120,'0-666','2017-08-01','21 de Agosto de 2018',3,'GF',1),(1121,'0-376','2015-12-01',NULL,2,'CYCP',1),(1122,'0-468','2016-03-17','1 Año',1,'CYCP',1),(1123,'0-518','2016-04-18',NULL,2,'CYCP',1),(1124,'0-686','2017-09-13','Definido 4 Meses',1,'GF',1),(1125,'0-685','2017-09-13','Definido 4 Meses',1,'GF',1),(1126,'0-466','2016-03-17',NULL,2,'CYCP',1),(1127,'0-664','2017-08-01','Definido 4 Meses',1,'GF',1),(1128,'0-474','2016-03-17',NULL,2,'CYCP',1),(1129,'0-697','2017-09-21','Definido 4 Meses',1,'GF',1),(1130,'0-226','2015-03-16',NULL,2,'CYCP',1),(1131,'0-572','2016-06-28',NULL,2,'CYCP',1),(1132,'0-463','2016-03-17',NULL,2,'CYCP',1),(1133,'0-349','2015-09-16',NULL,2,'CYCP',1),(1134,'0-493','2016-04-04',NULL,2,'CYCP',1),(1135,'0-692','2017-08-22',NULL,1,'GF',1),(1136,'0-606','2016-10-10','Compensar 6 Meses ',1,'GF',1),(1137,'0-683','2017-09-04','Definido 4 Meses',1,'GF',1),(1138,'0-485','2016-05-02',NULL,2,'GF',1),(1139,'0-397','2015-11-17',NULL,2,'CYCP',1),(1140,'0-563','2016-07-12',NULL,2,'GF',1),(1141,'0-595','2016-09-01',NULL,2,'CYCP',1),(1142,'0-438','2016-02-16',NULL,2,'CYCP',1),(1143,'0-021','2013-11-01',NULL,2,'GF',1),(1144,'0-495','2016-04-04',NULL,2,'CYCP',1),(1145,'0-476','2016-03-16',NULL,2,'CYCP',1),(1146,'0-042','2014-08-19',NULL,2,'CYCP',1),(1147,'0-175','2015-03-16',NULL,2,'GF',1),(1148,'0-699','2017-10-02','Definido 4 Meses',1,'GF',1),(1149,'0-634','2017-04-03','Definido 4 Meses',1,'CYCP',1),(1150,'0-487','2016-05-02',NULL,2,'GF',1),(1151,'0-491','2016-05-16',NULL,2,'GF',1),(1152,'0-663','2017-07-13','Definido 4 Meses',1,'GF',1),(1153,'0-350','2015-09-16',NULL,2,'GF',1),(1154,'0-653','2017-05-02','Compensar 6 Meses',1,'CYCP',1),(1155,'0-660','2017-07-04','Definido 4 Meses',1,'GF',1),(1156,'0-703','2017-09-25','Definido 4 Meses',1,'GF',1),(1157,'0-586','2016-07-25',NULL,2,'CYCP',1),(1158,'0-646','2017-04-19','Compensar 6 Meses ',1,'CYCP',1),(1159,'0-678','2017-08-28','Definido 4 Meses',1,'GF',1),(1160,'0-573','2016-07-12',NULL,2,'GF',1),(1161,'0-517','2016-05-23','Compensar 6 Meses',2,'GF',1),(1162,'0-680','2017-09-04','Definido 4 Meses',1,'GF',1),(1163,'0-681','2017-09-04','Definido 4 Meses',1,'GF',1),(1164,'0-659','2017-07-25','21 de Agosto de 2018',3,'CYCP',1),(1167,'12232222','2017-10-11','0000-00-00',2,'CYCP cobradores',0);
/*!40000 ALTER TABLE `contrato` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'Usuario'),(2,'Administrador');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `tipocontrato`
--

LOCK TABLES `tipocontrato` WRITE;
/*!40000 ALTER TABLE `tipocontrato` DISABLE KEYS */;
INSERT INTO `tipocontrato` VALUES (1,'Definido'),(2,'Indefinido'),(3,'Aprendizaje');
/*!40000 ALTER TABLE `tipocontrato` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `tiponivelescolar`
--

LOCK TABLES `tiponivelescolar` WRITE;
/*!40000 ALTER TABLE `tiponivelescolar` DISABLE KEYS */;
INSERT INTO `tiponivelescolar` VALUES (1,'Bachiller',NULL),(2,'Tecnico',NULL),(3,'Tecnologo',NULL),(4,'Profesional',NULL),(5,'Sin asignar',NULL);
/*!40000 ALTER TABLE `tiponivelescolar` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES ('1001077053','JORGE EDUARDO CRISTANCHO VEGA',NULL,'jocrisrap@hotmail.com',2,996,5,1),('1003556865','DIANA CAROLINA SERRANO RAMIREZ',NULL,'caro_lay102@hotmail.com',9,997,2,1),('1006595301','JESSICA ANDREA RIOS RIOS',NULL,'jessyrioss230@gmail.com',9,998,5,1),('1007530743','ANYI PAOLA SEGURA PAREDES',NULL,'angie196201@hotmail.com',7,999,5,1),('1007556146','OSCAR LEONARDO GARRIDO GARCIA',NULL,'leonardo0771@hotmail.com',5,1000,5,1),('101010100','pepe grillo','','william_gf@gmail.com',5,1167,2,0),('1010210079','JULY TATIANA GARCIA CATOLICO',NULL,'logitoto671@gmail.com',2,1001,5,1),('1010222719','DEIMER ADMIN VALERO HEREDIA',NULL,'dvalero@uan.edu.co',2,1002,5,1),('1010228520','KATHERIN YIRLEY PENA CEBALLOS',NULL,'kathe_2005@outlook.com',9,1003,4,1),('1010230628','EDISON ALEXANDER FLAUTERO RODRIGUEZ',NULL,'edizzonalex@gmail.com',10,1004,5,1),('1010232304','FAVIAN LEONARDO LOAIZA YARA',NULL,'leonardoloaiza@hotmail.com',9,1005,2,1),('1010243077','MARCELA CONTRERAS GONZALEZ',NULL,'marcecontreras55@gmail.com',9,1006,5,1),('1012380297','ERIKA SMITH RODRIGUEZ CHIGUASUQUE',NULL,NULL,9,1007,5,1),('1012393903','ANA MILENA GUAYANA TALERO',NULL,'ana.milena1306@live.com',9,1008,1,1),('1012400141','MAGDA ALEJANDRA MELO DIAZ',NULL,'magda_141516@hotmail.com',2,1009,1,1),('1012409896','LUDY GISETH GUAYANA BERNAL',NULL,'dieguito23022009@gmail.com',2,1010,5,1),('1012420674','DIEGO ALEJANDRO GUAYANA BERNAL',NULL,'diegoguayana@outbok.com',9,1011,2,1),('1012422094','JUAN DAVID NINO VARGAS',NULL,'juan65verde@hotmsil.com',9,1012,1,1),('1012428273','YESICA FERNANDA VARGAS DUENAS',NULL,'yesica.vargas@outlook.com',2,1013,1,1),('1012431154','LEIDY DAYANA MELO DIAZ',NULL,'leiddy_2502@hotmail.com',2,1014,1,1),('1012432976','CRISTIAN CAMILO GARCIA VIVAS',NULL,'laurayfelipe74@hotmail.com',2,1015,5,1),('1012437645','ANGIE JULIETH PEREA MEJIA',NULL,'juliethp11@hotmail.com',2,1016,2,1),('1012438377','DEISY MAYERLI JIMENEZ RIASCOS',NULL,'mayis-96@hotmail.com',2,1017,5,1),('1012438436','JEIMY ALEXANDRA RODRIGUEZ URREGO',NULL,'ccpjr08@gmail.com',9,1018,2,1),('1012444777','LEIDY VIVIANA ROJAS SANCHEZ',NULL,'vivi-841@hotmail.com',9,1019,5,1),('1012445448','ALEXANDRA HENAO DUQUE',NULL,NULL,11,1020,1,1),('1012447533','YESICA NATALIA MARTINEZ MOLINA',NULL,'3117864439nata@gmail.com',9,1021,2,1),('1012450563','NATALY VIVIANA MARTINEZ ARIZA',NULL,'natalymartinez1920@gmail.com ',2,1022,1,1),('1012458898','JEIDY NATALIA GUEVARA MORENO',NULL,'nata_heidy@hotmail.co',9,1023,5,1),('1013611562','DIANA MAYERLLY TAUTIVA VARGAS',NULL,'dianita-2015-04@outlook.com ',2,1024,2,1),('1013632969','DANIEL MAURICIO CRUZ CEBALLOS',NULL,'danielcruz0806@hotmail.com',3,1025,5,1),('1013636430','MIGUEL ANGEL ALFONSO GAITAN',NULL,'mianpunk@hotmail.com',9,1026,1,1),('1013664215','WENDY ALEXANDRA VARON CONTRERAS',NULL,'wexpik@gmail.com       ',9,1027,5,1),('1013672070','LUIS ALEJANDRO LOZANO LOPEZ',NULL,'alejandrolozano_9713@hotmail.com',9,1028,2,1),('1013683312','JOHAN SEBASTIAN TAUTIVA CABRERA',NULL,'tautiva98@hotmail.com',9,1029,5,1),('1014250156','PEDRO ALEXANDER DURAN PENARETE',NULL,'alexander199457@hotmail.com',9,1030,1,1),('1014256903','CARLOS ANDRES PAEZ RUIZ',NULL,'candres0212@gmail.com',4,1031,5,1),('1014274054','MARCO ANTONIO COY GARCIA',NULL,'maclowtter@oultook',9,1032,1,1),('1015425844','ANDRES FERNANDO AFRICANO PENA',NULL,NULL,2,1033,1,1),('1015446925','ANDRES FELIPE GONZALEZ GARCIA',NULL,'andresvne@hotmail.com',9,1034,1,1),('1015450304','CRISTIAN JAVIER MORENO PAEZ',NULL,'pat.yc1217@hotmail.com',9,1035,1,1),('1015455532','LUISA MILENA FERNANDEZ PENA',NULL,'luisapiopio@hotmail.com',9,1036,3,1),('1015459063','DAVID STIVEN MARTINEZ RODRIGUEZ',NULL,'stivenrodriguez.96@hotmail.com',9,1037,2,1),('1015466182','ANA ELIVET GARCIA GAMA',NULL,'chay-i1996@hotmail.com',9,1038,5,1),('1016021424','JORGE ANDRES SALAZAR GIRALDO',NULL,'andresnmnt@gmail.com',2,1039,3,1),('1016075645','RICARDO LANDETA LANDETA',NULL,'ricardolandetap@gmail.com',2,1040,5,1),('1016076557','VIVIAN ANDREA CASTRO MONROY',NULL,'viviancastro0107@gmail.com',9,1041,1,1),('1016088759','JUAN PABLO SOSA ARANGO',NULL,'juanpablososaarango@gmail.com',6,1042,3,1),('1016093334','ANGIE MICHEL HERNANDEZ VIVAS',NULL,'angievivas2010@hotmail.com',9,1043,1,1),('1016108573','RUBY TATIANA CUCHIMBA CARDENAS',NULL,'tkardenas36@gmail.com',2,1044,5,1),('1018443680','JULY MARCELA RODRIGUEZ VARGAS',NULL,'jrodriguez@estudianteareandina.edu.co',2,1045,1,1),('1018460186','SANTIAGO ALFONSO MARTINEZ',NULL,'santiagoamz101@gmail.com',9,1046,5,1),('1018473819','MYRIAM MARCELA IBARRA PEREZ',NULL,'marcela-perez1@hotmail.es',2,1047,5,1),('1018482181','DERLY DAYANNA BARACALDO SANCHEZ',NULL,'ddbaracaldo@misena.edu.co',2,1048,3,1),('1018495268','ARGIN JULIANA MONTES CORDOBA',NULL,'juliana1140@hotmail.com',9,1049,2,1),('1019019201','MAIRA ALEJANDRA FUENTES PORRAS',NULL,NULL,9,1050,1,1),('1019069025','CESAR AUGUSTO REYES CASTILLO',NULL,NULL,9,1051,2,1),('1019094026','JISELLE ESTEFANI MORENO TORRES',NULL,'tifan1294@hotmail.com',2,1052,1,1),('1019101049','DAVID ESTEVAN VENEGAS DUARTE',NULL,NULL,9,1053,1,1),('1019127295','DEYAN YEPES RUIZ',NULL,'deyan92@hotmail.com',2,1054,3,1),('1019127659','HENRY DAVID GUTIERREZ MAYA',NULL,'hdgm1996@gmail.com',9,1055,5,1),('1019129371','MARIA CAMILA LEON GARZON',NULL,'cami_l.g@live.com',2,1056,5,1),('1019135392','HELBER ALEJANDRO CASTILLO RUIDIAZ',NULL,'helber_castillo@hotmail.com',9,1057,1,1),('1020760147','MYLLER LANDIES MEIDER LOPEZ BOHORQUEZ',NULL,'lopez.millerlandy@yahoo.com',9,1058,5,1),('1020809540','CARMEN DELFINA VEGAS HERNANDEZ',NULL,'cdvegas@misena.edu.co',10,1059,5,1),('1020810058','ANGELA URBINA CIFUENTES',NULL,'angelacifuentes-26@hotmail.com',9,1060,5,1),('1020815741','JONATAN FERNANDEZ CANON',NULL,'jonfer.12@hotmail.com',2,1061,1,1),('1020841609','JESSICA DANIELA MAHECHA REYES',NULL,'danielamahecha09@gmail.com',2,1062,5,1),('1022323457','GINA YAMILE RIANO SAAVEDRA',NULL,'gina8612@hotmail.com',9,1063,5,1),('1022383416','ANGY PAOLA SAENZ SOLANO',NULL,'anpao0109@hotmail.com',2,1064,3,1),('1022391368','MAIRA ANGELICA CARO VERGARA',NULL,'mangelica1411@gmail.com ',11,1065,1,1),('1022399290','ERIKA YOHANA GALINDO ENDE',NULL,'johana.0616@hotmail.com',9,1066,3,1),('1022439355','LIZETH GARCIA FEO',NULL,'lizeth.garcia2212@gmail.com',9,1067,5,1),('1022439400','MARIA NELIDA MONTES PALOMA',NULL,'mnmontes5@misena.edu.co',8,1068,2,1),('1022440594','ARBEY GONZALO PEREZ LOZANO',NULL,'agpl1980@hotmail.com',10,1069,5,1),('1022440840','YULIETH ALEJANDRA PIRAQUIVE SEGOVIA',NULL,'yuliethpiraquive0119@gmail.com',9,1070,5,1),('1022999368','JUAN ESTEBAN GUIO MORENO',NULL,'guio13intel@hotmail.com',9,1071,5,1),('1023002353','DIEGO FERNANDO AGUILAR DIAZ',NULL,'d.fernando23@hotmail.com',9,1072,1,1),('1023034432','JEIMY ANDREA LOPEZ BURITICA',NULL,'jeimy815@hotmail.com',7,1073,5,1),('1023864048','SANDRA MILENA ACEVEDO DIAZ',NULL,'sandramacevedod@outlook.com',4,1074,2,1),('1023881241','ANGIE MAYERLY CASTANO LAMPREA',NULL,'anyimaye22@yahoo.com',9,1075,1,1),('1023897648','HEIDY KATHERINE HERNANDEZ SUAREZ',NULL,'hkhernandez8@misena.edu.co',7,1076,5,1),('1023907870','LINDA YINETH GRANADOS GONZALEZ',NULL,'gonzalezlindayineth@gmail.com',10,1077,5,1),('1023919587','NATHALY RAMIREZ CAMACHO',NULL,'natuchis_2008@hotmail.com',11,1078,5,1),('1023923155','PAOLA ALEXANDRA GALINDO CANTE',NULL,'pagalindo551@misena.edu.co',8,1079,3,1),('1023945083','LAURA DANIELA JIMENEZ RODRIGUEZ',NULL,'dannyvalentinajir@gmail.com',9,1080,2,1),('1023945975','JOSE DUVAN OBANDO BOLIVAR',NULL,'habbobord@hotmail.com',9,1081,2,1),('1023950219','LEIDY TATIANA PUERTO VARGAS',NULL,'tatianapuerto03@gmail.com',2,1082,5,1),('1023955248','KIMBERLY MARCELA NAVARRO RAMIREZ',NULL,'kimberlynavarro-96@hotmail.com',1,1083,1,1),('1023957812','JULIET NATALIA IBANEZ URREGO',NULL,'juliet-ibañez@hotmail.com',3,1084,5,1),('1023959465','LEIDY LORENA PEREZ AGUIRRE',NULL,'nidia100682@hotmail.com',2,1085,1,1),('1023959985','JEIMY TATIANA FRAILE NARANJO',NULL,'jeimyduwan19@hotmail.com',9,1086,5,1),('1023961972','KIMBERLY GALVIS VARGAS',NULL,'kimberlygalvis.022@gmail.com',2,1087,5,1),('1024488118','YEIMY PILAR TRIANA GAONA',NULL,'yeimytriana@yahoo.es',9,1088,2,1),('1024499135','ANGELICA MARIA PARRA MOTA',NULL,'angelicaparra2009@hotmail.com',9,1089,2,1),('1024511103','ADRIANA PAEZ APONTE',NULL,'adrianapa03@hotmail.com',9,1090,5,1),('1024537306','LAURA CAMILA MANRIQUE MENDEZ',NULL,'maria-pirula15@ hotmail.com',9,1091,1,1),('1024551965','BRIAN ERNESTO TORRES CABRERA',NULL,'britor15@hotmail.com',9,1092,1,1),('1024553330','LAURA JOHANA CUBIDES ORJUELA',NULL,'laracubides_17@hotmail.com',2,1093,2,1),('1024553980','JOHAN STEVEN VELANDIA AVILA',NULL,'johanvelandia49@gmail.com',9,1094,5,1),('1024562963','JESSICA YAMILE ALVARADO PALACIO',NULL,'jessicaalvaradopalacio.rh@gmail.com',9,1095,2,1),('1024575418','JEISON DAVID OVIEDO GARZON',NULL,'jeison32h@gmail.com ',2,1096,3,1),('1024584158','WENDY PAOLA VALENCIA DUARTE',NULL,'wndypvd79@gmail.com',2,1097,5,1),('1026251247','CAROLINA TORRES NIETO',NULL,'carotorresnieto@hotmail.com',9,1098,2,1),('1026275520','ERIKA CATHERINE GONZALEZ GARZON',NULL,'erikagonzalez3191@gmail.com',2,1099,1,1),('1026282992','ANGIE MARCELA MOYA MOYA',NULL,'angie_mm93@hotmail.com',2,1100,5,1),('1026284247','JENNY LIZETH FANDINO RODRIGUEZ',NULL,'krespa27@hotmail.com',2,1101,5,1),('1026295368','ASTRID CAROLINA MAMIAN PALACIOS',NULL,'carol141924@hotmail.com',9,1102,2,1),('1026295978','CHRISTIAN FELIPE CORREDOR CASTRO',NULL,'cfcorredor9@misena.edu.co',2,1103,5,1),('1026298378','VANESSA ALEJANDRA SANABRIA ROYO',NULL,'vanealeja22@hotmail.com',9,1104,5,1),('1026299913','YAN CARLOS CALDERON MEDINA',NULL,'carloscalderon.40mil@gmail.com',2,1105,1,1),('1026582055','LEIDI CAROLINA ESCUDERO LUJAN',NULL,'leidiescudero95@gmail.com',2,1106,5,1),('1027523358','NANCY ESTEFANNY BOHORQUEZ HERRERA',NULL,'nanstefany977@gmail.com',9,1107,5,1),('1030633291','LIZETH PAOLA CANO BENAVIDES',NULL,'palicabe18@hotmail.com',9,1108,5,1),('1030634447','ANA MARIA HOYOS MARIN',NULL,NULL,11,1109,1,1),('1030640896','SARA LUCIA CIFUENTES ARCE',NULL,'saralucifuentes@gmail.com',9,1110,3,1),('1030641921','JOHAN NICOLAS BARRERA GARCIA',NULL,'johanico26@hotmail.com',9,1111,5,1),('1030645060','EDISSON FABIAN CASTRO VARGAS',NULL,'castrovargase@gmail.com',5,1112,5,1),('1030680595','GABRIELA VIRGINIA ORTEGA CASTILLO',NULL,'gabrielaortega-912@outlook.com ',2,1113,1,1),('1030688884','GINETH DANIELA TELLEZ FANDINO',NULL,'d.tellez_@outlook.com',2,1114,5,1),('1031131041','ANDRES FELIPE MURILLO CORTES',NULL,'flacomurillo1991@hotmail.com',9,1115,1,1),('1031146650','CINDY PAOLA GARZON MICAN',NULL,'paolaevgg@gmail.com',9,1116,5,1),('1031155866','ANGIE LORENA BASTIDAS GONZALEZ',NULL,'lore201209@hotmail.om',9,1117,1,1),('1031160352','MARTA LILIANA SIERRA BERRIO',NULL,'lii-ziiera@outlook.com',2,1118,1,1),('1031164967','DILAN RICARDO VILLARRAGA ORTIZ',NULL,'dilanvillarraga92@gmail.com',9,1119,5,1),('1031178217','JULIAN ANDRES MEDINA NINO',NULL,'andrescraf10@gmail.com',10,1120,5,1),('1032406190','YESENIA PAOLA TORRES BUITRAGO',NULL,'paolabuitrago1987@gmail.com',9,1121,1,1),('1032458408','ERIKA CORTES NIETO',NULL,'erikakata2007@hotmail.com',11,1122,2,1),('1032474429','DIANA MARCELA MONTENEGRO GUTIERREZ',NULL,'diana.mon.95@hotmail.com',9,1123,1,1),('1032476156','JOAN ALEJANDRO AMADO CORREAL',NULL,'alejandro.amado59494gmail.com',2,1124,5,1),('1032478112','PAULA ANDREA BARRERA GARCIA',NULL,'paubarrera54@gmail.com',9,1125,5,1),('1032479819','DIANA MILENA BERNAL SUAREZ',NULL,'dianisbernal@hotmail.com',9,1126,2,1),('1032481402','JUAN DAVID ZUBIETA PABON',NULL,'davhid17@gmail.com',9,1127,5,1),('1033719990','CINDY PAOLA GALINDO MARTIN',NULL,'cindy13-29@hotmail.com',9,1128,2,1),('1033738820','ANDREA ZULENY ALVARADO COLORADO',NULL,'andreitaalvaradoc20@gmail.com',9,1129,5,1),('1033751505','MARIA DEL PILAR MURCIA MONTENEGRO',NULL,'mmurcia28@hotmail.com',2,1130,3,1),('1033782790','SARAY ANDREA RUIZ RODRIGUEZ',NULL,'saryruiz12@gmail.com ',2,1131,2,1),('1033792162','CLAUDIA ROCIO CONTRERAS CONTRERAS',NULL,'claudiacontreras355@gmail.com',2,1132,2,1),('1033798003','CARLOS DAVID BASTIDAS LEAL',NULL,'carlos.david970613@gmail.com',2,1133,1,1),('1053324927','EDILSA MARCELA COCA PENA',NULL,'marcela.cp45@yahoo.es',9,1134,2,1),('1057436359','NUBIA ASTRID PABON CRUZ',NULL,'astrid-pabon@hotmail.com',7,1135,5,1),('1062904044','DANNA SIRLEY QUINTERO LOZANO',NULL,'linda10201099@hotmail.com',9,1136,5,1),('1065895878','DOLLY SOFIA GUEVARA TRILLOS',NULL,'sofiguevarat@gmail.com',9,1137,5,1),('1067851999','SAMIR ANTONIO CAVADIA OLEA',NULL,'chamo1323@hotmail.com',9,1138,2,1),('1069053059','LEYDY LILIANA LEON MIRANDA',NULL,'leidylm@outlook.com',9,1139,1,1),('1069403172','JAGUI YUSIMAR FANDINO SILVA',NULL,'shaggi.9207@gmail.com ',9,1140,1,1),('1070614722','DAMARIS ASTRID VERU ROMERO',NULL,'damaris018@hotmail.com',2,1141,2,1),('1070618798','HAROLD ANDRES RODRIGUEZ RUEDA',NULL,'harold311_@hotmail.com',9,1142,2,1),('1070921458','NIDIA MAYERLI TRUJILLO ROJAS',NULL,'maye.t93@gmail.com',8,1143,2,1),('1071549444','JORGE EDISSON APOLINAR CHUQUEN',NULL,'edison-91@hotmail.com',9,1144,2,1),('1072651653','JONATHAN ARIEL RAMIREZ MARTINEZ',NULL,'tatan1989.jr@gmail.com',9,1145,1,1),('1073157229','YULIAN ERNESTO VARGAS PARDO',NULL,'sanayuvasa@hotmail.com',5,1146,5,1),('1074959235','SANDRA MILENA PEREZ PRIETO',NULL,'svaleria2006@hotmail.com',9,1147,1,1),('1077971698','GINNETH KARINA BERNAL GONZALEZ',NULL,'ginnethkbernal@hotmail.com',9,1148,3,1),('1083907127','JHON JAIRO BURBANO VARGAS',NULL,'jota_fs@hotmail.es',9,1149,5,1),('1101816353','YEISON ENRIQUE SIERRA BENITEZ',NULL,'jeison19_92@hotmail.com',9,1150,1,1),('1102868200','GERSON DE JESUS ARRIETA NARVAEZ',NULL,'gersonjesus78@hotmail.com',2,1151,2,1),('1106893809','KAREN PAOLA CASTANEDA RODRIGUEZ',NULL,'kpcastañeda9@misena.edu.co',7,1152,5,1),('1109382654','LUZ ANGELA GIL HERNANDEZ',NULL,'luzangel89@outlook.com',2,1153,1,1),('1109847745','YURI KATERINE BARRERO YACUMA',NULL,'kathy1115barrero@gmail.com',9,1154,5,1),('1110521319','JUAN CAMILO OVALLE JIMENEZ',NULL,'juank.pnk@hotmail.com',2,1155,5,1),('1151954755','DEYSI CAROLINA TAMAYO CASTRO',NULL,'d_ysi@outlook.com',2,1156,5,1),('1152707990','PEDRO ANDRES RONCANCIO CORREDOR',NULL,'paroncancioc@hotmail.com',9,1157,1,1),('1233488381','DIANA CAROLINA RUBIANO RINCON',NULL,'caroolaya97@gmail.com',9,1158,5,1),('1233492949','KEISA DANIELA AVENDANO MARTINEZ',NULL,'gloria.m.120302@gmail.com',9,1159,5,1),('1233496393','RUTH BIBIANA BENITEZ ESTEPA',NULL,'rikiss03@gmail.com',9,1160,2,1),('1233896748','PAULA ANDREA PABON VARON',NULL,'a-andrea76@hotmail.com',2,1161,1,1),('1233903691','BRANDON ENRIQUE NOVA MARTINEZ',NULL,'brandon-martinez172017@hotmail.com',2,1162,5,1),('1233904370','CRISTIAN DAVID ESCOBAR RODRIGUEZ',NULL,'davidcam159@hotmail.com',2,1163,5,1),('14211392','RAFAEL CESPEDES VARON','00000000','rael.andres.varon@hotmail.com',6,950,4,1),('15049486','EMELSO GUSTAVO RICARDO JARABA',NULL,'trotador06@hotmail.com',9,951,2,1),('16161764','ALEXANDER HENAO CAMACHO',NULL,'alexanderalejox @yahoo.com ',1,952,5,1),('25292452','ELIZABETH MAMIAN PALACIOS',NULL,'eliza.leox@hotmail.com',9,953,5,1),('37334141','LINA CONSTANZA SANCHEZ MONCADA',NULL,'anilxsan79@hotmail.com',9,954,1,1),('39564623','ISABEL SANCHEZ GUTIERREZ',NULL,'pollis_816@hotma8il.com',9,955,2,1),('39639137','LUCIA RUBIELA PRIETO CASTANEDA',NULL,'luciap_65@live.com',9,956,1,1),('45514645','ALEYDIZ RAMIREZ RODRIGUEZ',NULL,'aleidyznavarro@hotmail.com',9,957,1,1),('45528486','ANA MILENA NARVAEZ PEREZ',NULL,'ananarper82@gmail.com',2,958,5,1),('49739229','IDALMIS DEL CARMEN TORRES BARRERA',NULL,NULL,6,959,1,1),('51609768','MARIA CRISTINA DELGADO MERCHAN',NULL,'macris.delgado@gmail.com',9,960,2,1),('51654659','WILMA RUTH GONZALEZ VELA',NULL,'wilmaruth3027@gmail.com',6,961,2,1),('51973108','MARISOL CARDONA RONDON',NULL,NULL,9,962,2,1),('52054391','GUIOMAR VIDAL CESPEDES',NULL,'yomyvid@yahoo.com',6,963,4,1),('52161167','CLAUDIA PATRICIA RUBIO PARRA',NULL,'paty2406@yahoo.es ',2,964,1,1),('52203639','UBALDINA PATINO GALINDO',NULL,'ubitarococo@hotmail.com',9,965,2,1),('52227052','SANDRA LUCIA TORRES FORERO',NULL,'forerosandra2016@hotmail.com',2,966,5,1),('52269156','MARCELA GONZALEZ RODRIGUEZ',NULL,'marcela-gonzalez0221@hotmail.com',3,967,5,1),('52302466','JOHANNA MARCELA CASTRO PATINO',NULL,NULL,9,968,1,1),('52342696','LYDA MARCELA VANEGAS PINZON',NULL,'lmarcevanpin@gmail.com',7,969,5,1),('52360965','ANA MERCEDES ALFONSO MORENO',NULL,'anamalfo@hotmail.com',2,970,3,1),('52379137','DIANA MARCELA GARZON RAMOS',NULL,'dianaga_76@hotmail.com',9,971,2,1),('52443475','LUISA ANGELA MARQUEZ LEAL',NULL,'luisamarquez30@hotmail.com',9,972,2,1),('52447270','MARTHA IRENE BUENO BERNAL',NULL,'irenesan1308@gmail.com',9,973,5,1),('52495703','FRANCY LISBETH CUITIVA RONCANCIO',NULL,'fransamy12@gmail.com',4,974,5,1),('52753698','ZULY SALAS VALENCIA',NULL,'valezuly2014@gmail.com',9,975,1,1),('52760942','MARIA TERESA CHAGUENDO CERQUERA',NULL,'milkaruma@hotmail.com',9,976,1,1),('52819522','ADRIANA MARIA BAYONA SUREZ',NULL,NULL,2,977,1,1),('52832351','YOMARA PALACIOS AMAYA',NULL,'tata.yomara@hotmail.com',9,978,5,1),('52861352','DIANA DEL PILAR POVEDA FELICIANO',NULL,'dianapoveda_0926@hotmail.com',2,979,2,1),('52996310','MARY LUZ RAMOS AVENDANO',NULL,'jonatanm-@hotmail.com',9,980,1,1),('53135850','VIVIANA YOHELI MEJIA PEREZ',NULL,'geoalex14@hotmail.com',9,981,2,1),('53154249','JENY HASBLEIDY GRAJALES OCHOA',NULL,'hasbleidy.grajales@gmail.com',2,982,1,1),('53167630','ASTRID JASBLEIDY ORTIZ JIMENEZ',NULL,'asorjy.s@gmail.com',2,983,2,1),('53168013','LUISA FERNANDA GUERRERO',NULL,'lfguerrero@outlook.com',1,984,4,1),('53911263','LADY CATHERINE RAMIREZ MARTINEZ',NULL,'ladyramirezm@hotmail.com',7,985,4,1),('6002453','LUIS EDUARDO SANCHEZ ALVAREZ','00000000','jefeoperaciones@gfcobranzasjuridicas.com.co',9,949,4,1),('63251152','NUBIA TERESA FLOREZ',NULL,'nuteflo64@hotmail.com',9,986,1,1),('66813083','MARIA EUGENIA QUINTERO COLONIA',NULL,'asesoriasm.eugenia@gmail.com',6,987,4,1),('66826599','LEONOR ARANGO CABRERA',NULL,'leonor-arango@hotmail.com',9,988,5,1),('79572170','ORLANDO OCHOA HERRENO',NULL,'orlochoa@hotmail.com',8,989,4,1),('80096639','JOHAN MANUEL CHAPARRO MENDOZA',NULL,'johanch25@gmail.com ',2,990,3,1),('80190288','CARLOS HUMBERTO MORA AGUILAR',NULL,'carlosmora2502@hotmail.com',9,991,1,1),('80827698','JONATHAN PRIETO VARGAS',NULL,NULL,2,992,2,1),('80833526','WILLIAM ANDRES ESPINOSA ALDANA',NULL,'darkwill74@hotmail.com',8,993,5,1),('94380141','JHON FREDY CASTRO JARAMILLO',NULL,NULL,6,994,5,1),('94534764','RAMIRO ANTONIO CASTRO GARCES',NULL,'sofia2010org@gmail.com',5,995,5,1),('99111400381','SERGIO ALEJANDRO GOMEZ ROJAS',NULL,'sgomezrojas@misena.edu.co',10,1164,5,1);
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('1023923155','Alexandra Galindo Cante','1023923155',1,1),('1023923158','pepito suarez','1023923158',1,1),('14211392','Rafael Cespedes Varon','14211392',1,1),('79468337','Alejandro Contreras ','123',1,1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `capacitador`
--

LOCK TABLES `capacitador` WRITE;
/*!40000 ALTER TABLE `capacitador` DISABLE KEYS */;
INSERT INTO `capacitador` VALUES ('0','ANDRES BOLIVAR',1),('14211392','RAFAEL CÃ‰SPEDES  VARÃ“N',1),('15049486','EMERSON GUSTAVO RICARDO JARABA',1),('16161764','ALEXANDER HENAO CAMACHO',1),('49739229','IDALMIS DEL CARMEN TORRES BARRERA',1),('79572170','ORLANDO OCHOA HERRERO',1),('80096639','	JOHAN MANUEL CHAPARRO MENDOZA',1);
/*!40000 ALTER TABLE `capacitador` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `evaluacion`
--

LOCK TABLES `evaluacion` WRITE;
/*!40000 ALTER TABLE `evaluacion` DISABLE KEYS */;
INSERT INTO `evaluacion` VALUES (16,'Evaluado','Necesita entrenamientos periÃ³dicos.',3,1,273,99),(17,'Evaluado','CalificaciÃ³n de 3.5 en adelante tienen capacidades orientadas mas a lo practico.',4,1,270,99),(18,'Evaluado','CalificaciÃ³n de 3.5 en adelante tienen capacidades orientadas mas a lo practico.',3.5,1,272,99),(19,'Evaluado','CalificaciÃ³n de 3.5 en adelante tienen capacidades orientadas mas a lo practico.',3.5,1,271,99),(20,'Evaluado','Necesita entrenamientos periodicos.',3,1,274,99),(21,'Evaluado','CalificaciÃ³n de 3.5 en adelante tienen capacidades orientadas mas a lo practico.',3.5,1,275,99),(22,'Evaluado','',5,1,276,100),(23,'Evaluado','',5,1,277,100),(24,'Evaluado','',4.6,1,278,100),(25,'Evaluado','',4.8,1,279,100),(26,'Evaluado','',4.4,1,280,100),(27,'Evaluado','',4.7,1,281,100),(28,'Evaluado','',4.7,1,282,100),(29,'Evaluado','',4.8,1,283,100),(30,'Evaluado','',4.8,1,284,100),(31,'Evaluado','',4.6,1,285,100),(32,'Evaluado','',4.8,1,286,100),(33,'Evaluado','',4.7,1,287,100),(34,'Evaluado','',4.8,1,288,100),(35,'Evaluado','',4,1,289,100),(36,'Evaluado','',4.7,1,290,100),(37,'Evaluado','',5,1,291,100),(38,'Evaluado','',4.8,1,292,100),(39,'Evaluado','',4.8,1,293,100),(40,'Evaluado','',4.8,1,294,100),(41,'Evaluado','',4.8,1,295,100),(42,'Evaluado','',4.6,1,296,100),(43,'Evaluado','',5,1,297,100),(44,'Evaluado','',5,1,298,100),(45,'Evaluado','',5,1,299,100),(46,'Evaluado','',4.8,1,300,100),(47,'Evaluado','',4.8,1,301,100),(48,'Evaluado','',4.8,1,302,100),(49,'Evaluado','',4.8,1,303,100),(50,'Evaluado','',5,1,304,100),(51,'Evaluado','',4.8,1,305,100),(52,'Evaluado','',4.8,1,306,100),(53,'Evaluado','',4.8,1,307,100),(54,'Evaluado','',4.8,1,308,100),(55,'Evaluado','',5,1,309,100),(56,'Evaluado','',5,1,310,100),(57,'Evaluado','',5,1,311,100),(58,'Evaluado','',4.8,1,312,100),(59,'Evaluado','',4,1,313,100),(60,'Evaluado','',4.8,1,314,100),(61,'Evaluado','',4.6,1,315,100),(62,'Evaluado','',4.6,1,316,100),(63,'Evaluado','',4.8,1,318,100),(64,'Evaluado','',4.8,1,317,100),(65,'Evaluado','',4.8,1,319,100),(66,'Evaluado','Presenta un equilibrio entre el saber y el hacer (practico).',3,1,320,101),(67,'Evaluado','Presenta un equilibrio entre el saber y el hacer (practico).',3.5,1,321,101),(68,'Evaluado','Presenta un equilibrio entre el saber y el hacer (practico).',3,1,322,101),(69,'Evaluado','Presenta un equilibrio entre el saber y el hacer (practico).',3.5,1,323,101),(70,'Evaluado','Presenta un equilibrio entre el saber y el hacer (practico).',4,1,324,101),(71,'Evaluado','Necesita procesos de retroalimentacion y entrenamiento.',3,1,325,102),(72,'Evaluado','Necesita procesos de retroalimentacion y entrenamiento.',3,1,326,102),(73,'Evaluado','Perfil sobresaliente entre  el grupo de capacitaciÃ³n.',3.5,1,327,102),(74,'Evaluado','Necesita procesos de retroalimentacion y entrenamiento.',3,1,329,102),(75,'Evaluado','Perfil sobresaliente entre el grupo de capacitaciÃ³n.',3.5,1,328,102),(76,'Evaluado','',5,1,331,103),(77,'Evaluado','',5,1,332,103),(78,'Evaluado','',5,1,333,103),(79,'Evaluado','EL GESTOR MANIFIESTA FALTA DE INTERÃ‰S EN LA OPERACIÃ“N.',3,1,334,104),(80,'Evaluado','EL GESTOR MANIFIESTA PROBLEMAS FAMILIARES.',4,1,335,104),(81,'Evaluado','EL GESTOR MANIFIESTA ZONA DE CONFORT, MENTALIZACION.',3,1,336,104),(82,'Evaluado','EL GESTOR MANIFIESTA DESMOTIVACION POR PAGOS PERDIDOS.',4,1,337,104),(83,'Evaluado','EL GESTOR MANIFIESTA INASISTENCIA QUE LO HA PERJUDICADO.',5,1,338,104),(84,'Evaluado','EL GESTOR MANIFIESTA QUE EL  AMBIENTE  LE DIFICULTA LA OPERACION, YA QUE TIENE PROBLEMAS RESPIRATORI',3,1,339,104),(85,'Evaluado','EL GESTOR MANIFIESTA FALTA DE MOTIVACION.',5,1,340,104),(86,'Evaluado','EL GESTOR MANIFIESTA PROBLEMAS PERSONALES Y FALTA MOTIVACION.',4,1,341,104),(87,'Evaluado','EL GESTOR MANIFIESTA FALTA DE MOTIVACION.',4,1,342,104),(88,'Evaluado','MEJORO, NO FUE NECESARIA SEGUNDA SESION.',3,1,343,104),(89,'Evaluado','MEJORO, NO FUE NECESARIA SEGUNDA SESION.',3,1,344,104),(90,'Evaluado','EN ETAPA DE SEGUIMIENTO.',3,1,345,105),(91,'Evaluado','EN ETAPA DE SEGUIMIENTO.',3,1,346,105),(92,'Evaluado','EN ETAPA DE SEGUIMIENTO.',3.5,1,347,105),(93,'Evaluado','EN ETAPA DE SEGUIMIENTO.',3.5,1,348,105),(94,'Evaluado','EN ETAPA DE SEGUIMIENTO.',3.5,1,349,105),(95,'Evaluado','EN ETAPA DE SEGUIMIENTO.',3,1,350,105),(96,'Evaluado','EN ETAPA DE SEGUIMIENTO.',4,1,351,105),(97,'Evaluado','EN ETAPA DE SEGUIMIENTO.',3.5,1,352,105),(98,'Evaluado','EN ETAPA DE SEGUIMIENTO.',3,1,353,105),(99,'Evaluado','EN ETAPA DE SEGUIMIENTO.',3,1,354,105),(100,'Evaluado','EN ETAPA DE SEGUIMIENTO.',4,1,355,105),(101,'Evaluado','',5,1,357,108),(102,'Evaluado','',5,1,358,108),(103,'Evaluado','',5,1,359,108),(104,'Evaluado','',5,1,360,108),(105,'Evaluado','',5,1,361,108),(106,'Evaluado','',5,1,362,108),(107,'Evaluado','',5,1,363,108),(108,'Evaluado','',5,1,364,108),(109,'Evaluado','',5,1,365,108),(110,'Evaluado','',5,1,366,108),(111,'Evaluado','',5,1,367,108),(112,'Evaluado','',5,1,368,108),(113,'Evaluado','',5,1,370,108),(114,'Evaluado','',4.5,1,356,107),(115,'Evaluado','',5,1,369,108);
/*!40000 ALTER TABLE `evaluacion` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `asigmodulo`
--

LOCK TABLES `asigmodulo` WRITE;
/*!40000 ALTER TABLE `asigmodulo` DISABLE KEYS */;
INSERT INTO `asigmodulo` VALUES (99,64,'14211392',38,NULL),(100,65,'14211392',39,NULL),(101,66,'14211392',38,NULL),(102,67,'14211392',38,NULL),(103,68,'15049486',41,NULL),(104,69,'14211392',42,NULL),(105,70,'14211392',42,NULL),(106,71,'14211392',32,NULL),(107,72,'14211392',32,NULL),(108,73,'0',43,NULL),(109,74,'14211392',20,NULL),(110,74,'14211392',14,NULL);
/*!40000 ALTER TABLE `asigmodulo` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `asigempleado`
--

LOCK TABLES `asigempleado` WRITE;
/*!40000 ALTER TABLE `asigempleado` DISABLE KEYS */;
INSERT INTO `asigempleado` VALUES (270,'1031146650',64),(271,'1013683312',64),(272,'1030641921',64),(273,'1033738820',64),(274,'1010243077',64),(275,'52832351',64),(276,'1012432976',65),(277,'1026282992',65),(278,'1026582055',65),(279,'1110521319',65),(280,'1019094026',65),(281,'1024584158',65),(282,'1012437645',65),(283,'52161167',65),(284,'1012428273',65),(285,'53167630',65),(286,'1102868200',65),(287,'52861352',65),(288,'1020841609',65),(289,'1018473819',65),(290,'1026299913',65),(291,'1015425844',65),(292,'1016108573',65),(293,'1020815741',65),(294,'1012438377',65),(295,'1022383416',65),(296,'1070614722',65),(297,'1026275520',65),(298,'1010222719',65),(299,'1012431154',65),(300,'1024575418',65),(301,'53154249',65),(302,'1033751505',65),(303,'52360965',65),(304,'1023950219',65),(305,'80827698',65),(306,'1026295978',65),(307,'1033782790',65),(308,'1031160352',65),(309,'1033792162',65),(310,'1023959465',65),(311,'1030688884',65),(312,'1019129371',65),(313,'1024553330',65),(314,'1012450563',65),(315,'1233896748',65),(316,'1012400141',65),(317,'1033798003',65),(318,'52819522',65),(319,'1018482181',65),(320,'1032478112',66),(321,'1032476156',66),(322,'1010210079',66),(323,'45528486',66),(324,'1012409896',66),(325,'1065895878',67),(326,'1233903691',67),(327,'52227052',67),(328,'1016075645',67),(329,'1233904370',67),(330,'45528486',64),(331,'52227052',68),(332,'1016075645',68),(333,'1233903691',68),(334,'1031131041',69),(335,'1030640896',69),(336,'1083907127',69),(337,'1015450304',69),(338,'1019069025',69),(339,'53168013',69),(340,'1020760147',69),(341,'1032474429',69),(342,'1023002353',69),(343,'1062904044',69),(344,'52447270',69),(345,'1031146650',70),(346,'1010243077',70),(347,'52832351',70),(348,'1033738820',70),(349,'1030641921',70),(350,'1013664215',70),(351,'1030633291',70),(352,'1032478112',70),(353,'1233492949',70),(354,'1022391368',70),(355,'52447270',70),(356,'1022391368',72),(357,'1013636430',73),(358,'1001077053',73),(359,'1018443680',73),(360,'1013611562',73),(361,'1019127295',73),(362,'1067851999',73),(363,'1152707990',73),(364,'1022399290',73),(365,'1018460186',73),(366,'1072651653',73),(367,'1013672070',73),(368,'1012393903',73),(369,'1024553980',73),(370,'15049486',73);
/*!40000 ALTER TABLE `asigempleado` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `asigtema`
--

LOCK TABLES `asigtema` WRITE;
/*!40000 ALTER TABLE `asigtema` DISABLE KEYS */;
/*!40000 ALTER TABLE `asigtema` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-01 13:14:50
