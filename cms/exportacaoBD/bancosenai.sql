CREATE DATABASE  IF NOT EXISTS `deliciagelada` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;
USE `deliciagelada`;
-- MySQL dump 10.13  Distrib 8.0.11, for Win64 (x86_64)
--
-- Host: localhost    Database: deliciagelada
-- ------------------------------------------------------
-- Server version	8.0.11

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `contatos`
--

DROP TABLE IF EXISTS `contatos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `contatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL DEFAULT '',
  `homepage` varchar(2048) DEFAULT NULL,
  `facebook` varchar(2048) DEFAULT NULL,
  `tipo` varchar(1) DEFAULT NULL,
  `mensagem` longtext NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `profissao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contatos`
--

LOCK TABLES `contatos` WRITE;
/*!40000 ALTER TABLE `contatos` DISABLE KEYS */;
INSERT INTO `contatos` VALUES (1,'Pedro','42062441','958819879','','http://google.com','http://facebook.com',NULL,'ola o site é lindo','M','programador'),(2,'tux','99999999','99999999','','','',NULL,'sdsasad asdasda','M','lenhador'),(3,'Fabio','(011)5555-5555','(888)98888-8888','','','',NULL,' asdad a asd as dsa','M','sadsadasdasdas '),(4,'Anderson','','(444)94444-4444','','https://www.youtube.com/watch?v=gLmcGkvJ-e0','',NULL,'oi, meu nome é NEO e sou viciado em pilulas vermelhas','M','rh'),(5,'sadasd','(222)2222-2222','(222)92222-2222','','','',NULL,'dasdsadasd','F','lenhador'),(6,'Odin','(777)7777-7777','(777)97777-7777','','','',NULL,'Meu filho tem um martelo','M','God'),(7,'Mozila','(444)4444-4444','(444)94444-4444','','','',NULL,'testando o mozila','M','mozila'),(8,'Edge','(111)1111-1111','(111)91111-1111','','','',NULL,'testando o IE Edge','M','Edge'),(9,'Chrome','(222)2222-2222','(222)92222-2222','','','',NULL,'testando o google Chrome','M','Chrome'),(10,'Internet Explorer','(222)2222-2222','(222)92222-2222','','','',NULL,'testando o internet explorer','M','internet explorer'),(11,'Pedro','(111)1111-1111','(111)91111-1111','','','',NULL,'oaosossd','M','lenhador'),(12,'kiko','(011)4220-6666','(015)95555-5555','','','',NULL,'validando a pagina de confirmação de cadastro','M','teste'),(13,'Arthas','(000)0000-0000','(777)97777-7777','arthas@blizz.com','','',NULL,'Frostmourne hunger','M','Paladino'),(14,'asdasdasddasd','(232)3232-3232','(232)93232-3232','adasdasddasdasdsada@asdasdads','','',NULL,'1231231231231sddadasdas','M','sadasdasd'),(15,'Jhonson','(111)1111-1111','(111)91111-1111','jhonson@jhonson.com','','',NULL,'oi','M','Joalheiro'),(16,'Marcel Teixeira','(456)4564-6464','(454)96465-4654','marcel@teste.com','https://www.uol.com.br','https://www.uol.com.br/teste',NULL,'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.\r\nAenean nec lorem. In porttitor. Donec laoreet nonummy augue.\r\nSuspendisse dui purus, scelerisque a','M','não sei'),(17,'dsfds','','(456)94654-6546','sdfsdfdsf@teste.com','','',NULL,'aasdasd','M','asdasd'),(19,'Yasmin','(111)1111-1111','(111)91111-1111','yasmin.cabelinho@uol.com','','','S','pare de me chamar de cabelinho','F','Programadora'),(20,'arthas','(111)1111-1111','(111)91111-1111','arthas@gmail.com','','','C','doaskdaskd','M','Lenhador');
/*!40000 ALTER TABLE `contatos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(155) NOT NULL,
  `link` varchar(2048) NOT NULL,
  `icone` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `niveis`
--

DROP TABLE IF EXISTS `niveis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `niveis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(155) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `niveis`
--

LOCK TABLES `niveis` WRITE;
/*!40000 ALTER TABLE `niveis` DISABLE KEYS */;
INSERT INTO `niveis` VALUES (1,'administrador'),(2,'Operador de conteudo'),(3,'Relacionamento com cliente');
/*!40000 ALTER TABLE `niveis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nivel_menu`
--

DROP TABLE IF EXISTS `nivel_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `nivel_menu` (
  `id_nivel` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  KEY `fknivel_idx` (`id_nivel`),
  KEY `fkmenu_idx` (`id_menu`),
  CONSTRAINT `fkmenu` FOREIGN KEY (`id_menu`) REFERENCES `menus` (`id`),
  CONSTRAINT `fknivel` FOREIGN KEY (`id_nivel`) REFERENCES `niveis` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nivel_menu`
--

LOCK TABLES `nivel_menu` WRITE;
/*!40000 ALTER TABLE `nivel_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `nivel_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setores`
--

DROP TABLE IF EXISTS `setores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `setores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(155) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setores`
--

LOCK TABLES `setores` WRITE;
/*!40000 ALTER TABLE `setores` DISABLE KEYS */;
INSERT INTO `setores` VALUES (1,'administrativo'),(2,'Comercial'),(3,'Operacional');
/*!40000 ALTER TABLE `setores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(155) NOT NULL,
  `email` varchar(155) NOT NULL,
  `senha` varchar(55) NOT NULL,
  `dt_nasc` date NOT NULL,
  `idsetor` int(11) NOT NULL,
  `idnivel` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fksetor_idx` (`idsetor`),
  KEY `fknivel_idx` (`idnivel`),
  KEY `fknivel_idx_idx` (`idnivel`),
  CONSTRAINT `fknivelusuario` FOREIGN KEY (`idnivel`) REFERENCES `niveis` (`id`),
  CONSTRAINT `fksetor` FOREIGN KEY (`idsetor`) REFERENCES `setores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-28 15:49:44
