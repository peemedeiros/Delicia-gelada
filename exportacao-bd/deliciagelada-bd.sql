CREATE DATABASE  IF NOT EXISTS `deliciagelada` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `deliciagelada`;
-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: localhost    Database: deliciagelada
-- ------------------------------------------------------
-- Server version	8.0.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) NOT NULL,
  `homepage` varchar(2048) DEFAULT NULL,
  `facebook` varchar(2048) DEFAULT NULL,
  `criticas` tinytext,
  `mensagem` longtext NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `profissao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contatos`
--

LOCK TABLES `contatos` WRITE;
/*!40000 ALTER TABLE `contatos` DISABLE KEYS */;
INSERT INTO `contatos` VALUES (1,'Pedro','42062441','958819879','http://google.com','http://facebook.com','muito bom','ola o site é lindo','M','programador'),(2,'tux','99999999','99999999','','','','sdsasad asdasda','M','lenhador'),(3,'Fabio','(011)5555-5555','(888)98888-8888','','','',' asdad a asd as dsa','M','sadsadasdasdas '),(4,'Anderson','','(444)94444-4444','https://www.youtube.com/watch?v=gLmcGkvJ-e0','','say hello to my little friend!','oi, meu nome é NEO e sou viciado em pilulas vermelhas','M','rh'),(5,'sadasd','(222)2222-2222','(222)92222-2222','','','','dasdsadasd','F','lenhador'),(6,'Odin','(777)7777-7777','(777)97777-7777','','','Eu sou o melhor','Meu filho tem um martelo','M','God'),(7,'Mozila','(444)4444-4444','(444)94444-4444','','','','testando o mozila','M','mozila'),(8,'Edge','(111)1111-1111','(111)91111-1111','','','','testando o IE Edge','M','Edge'),(9,'Chrome','(222)2222-2222','(222)92222-2222','','','','testando o google Chrome','M','Chrome'),(10,'Internet Explorer','(222)2222-2222','(222)92222-2222','','','','testando o internet explorer','M','internet explorer'),(11,'Pedro','(111)1111-1111','(111)91111-1111','','','','oaosossd','M','lenhador'),(12,'kiko','(011)4220-6666','(015)95555-5555','','','','validando a pagina de confirmação de cadastro','M','teste');
/*!40000 ALTER TABLE `contatos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-23  0:41:38
