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
-- Table structure for table `categoria_sabor`
--

DROP TABLE IF EXISTS `categoria_sabor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria_sabor` (
  `id_categoria` int(11) NOT NULL,
  `id_sabor` int(11) NOT NULL,
  KEY `fk_categoria_idx` (`id_categoria`),
  KEY `fk_sabor_idx` (`id_sabor`),
  CONSTRAINT `fk_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`),
  CONSTRAINT `fk_sabor` FOREIGN KEY (`id_sabor`) REFERENCES `sabores` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_sabor`
--

LOCK TABLES `categoria_sabor` WRITE;
/*!40000 ALTER TABLE `categoria_sabor` DISABLE KEYS */;
INSERT INTO `categoria_sabor` VALUES (3,1),(3,2),(3,3),(3,4),(3,5),(4,1),(4,4);
/*!40000 ALTER TABLE `categoria_sabor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `icone` varchar(155) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (3,'Sucos','f1f6b6f66e9a322f57ca06ca0a2e2184.png'),(4,'Refrigerantes','01c47d3d9e8c4a04cecb2c6c8e5daddf.png');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

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
  `email` varchar(100) NOT NULL DEFAULT '',
  `homepage` varchar(2048) DEFAULT NULL,
  `facebook` varchar(2048) DEFAULT NULL,
  `tipo` varchar(1) DEFAULT NULL,
  `mensagem` longtext NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `profissao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contatos`
--

LOCK TABLES `contatos` WRITE;
/*!40000 ALTER TABLE `contatos` DISABLE KEYS */;
INSERT INTO `contatos` VALUES (1,'Pedro','42062441','958819879','','http://google.com','http://facebook.com',NULL,'ola o site é lindo','M','programador'),(2,'tux','99999999','99999999','','','',NULL,'sdsasad asdasda','M','lenhador'),(3,'Fabio','(011)5555-5555','(888)98888-8888','','','',NULL,' asdad a asd as dsa','M','sadsadasdasdas '),(4,'Anderson','','(444)94444-4444','','https://www.youtube.com/watch?v=gLmcGkvJ-e0','',NULL,'oi, meu nome é NEO e sou viciado em pilulas vermelhas','M','rh'),(6,'Odin','(777)7777-7777','(777)97777-7777','','','',NULL,'Meu filho tem um martelo','M','God'),(7,'Mozila','(444)4444-4444','(444)94444-4444','','','',NULL,'testando o mozila','M','mozila'),(8,'Edge','(111)1111-1111','(111)91111-1111','','','',NULL,'testando o IE Edge','M','Edge'),(9,'Chrome','(222)2222-2222','(222)92222-2222','','','',NULL,'testando o google Chrome','M','Chrome'),(10,'Internet Explorer','(222)2222-2222','(222)92222-2222','','','',NULL,'testando o internet explorer','M','internet explorer'),(11,'Pedro','(111)1111-1111','(111)91111-1111','','','',NULL,'oaosossd','M','lenhador'),(12,'kiko','(011)4220-6666','(015)95555-5555','','','',NULL,'validando a pagina de confirmação de cadastro','M','teste'),(13,'Arthas','(000)0000-0000','(777)97777-7777','arthas@blizz.com','','',NULL,'Frostmourne hunger','M','Paladino'),(14,'asdasdasddasd','(232)3232-3232','(232)93232-3232','adasdasddasdasdsada@asdasdads','','',NULL,'1231231231231sddadasdas','M','sadasdasd'),(15,'Jhonson','(111)1111-1111','(111)91111-1111','jhonson@jhonson.com','','',NULL,'oi','M','Joalheiro'),(16,'Marcel Teixeira','(456)4564-6464','(454)96465-4654','marcel@teste.com','https://www.uol.com.br','https://www.uol.com.br/teste',NULL,'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.\r\nAenean nec lorem. In porttitor. Donec laoreet nonummy augue.\r\nSuspendisse dui purus, scelerisque a','M','não sei'),(17,'dsfds','','(456)94654-6546','sdfsdfdsf@teste.com','','',NULL,'aasdasd','M','asdasd'),(19,'Yasmin','(111)1111-1111','(111)91111-1111','yasmin.cabelinho@uol.com','','','S','pare de me chamar de cabelinho','F','Programadora'),(20,'arthas','(111)1111-1111','(111)91111-1111','arthas@gmail.com','','','C','doaskdaskd','M','Lenhador'),(21,'João Arcanjo','(111)1111-1111','(111)91111-1111','joao.arcanjo10@gmail.com','','','S','qualquer coisa','M','Datilógrafo'),(23,'Nicolas Moises','(111)1111-1111','(111)91111-1111','nic.boy@gmail.com','','','C','Essas bebidas são muito caras, e contém muito açucar.','M','God of war');
/*!40000 ALTER TABLE `contatos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `uf` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` VALUES (1,'Rondônia','RO'),(2,'Acre','AC'),(3,'Amazonas','AM'),(4,'Roraima','RR'),(5,'Pará','PA'),(6,'Amapá','AP'),(7,'Tocantins','TO'),(8,'Maranhão','MA'),(9,'Piauí','PI'),(10,'Ceará','CE'),(11,'Rio Grande do Norte','RN'),(12,'Paraíba','PB'),(13,'Pernambuco','PE'),(14,'Alagoas','AL'),(15,'Sergipe','SE'),(16,'Bahia','BA'),(17,'Minas Gerais','MG'),(18,'Espírito Santo','ES'),(19,'Rio de Janeiro','RJ'),(20,'São Paulo','SP'),(21,'Paraná','PR'),(22,'Santa Catarina','SC'),(23,'Rio Grande do Sul','RS'),(24,'Mato Grosso do Sul','MS'),(25,'Mato Grosso','MT'),(26,'Goiás','GO'),(27,'Distrito Federal','DF');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(155) NOT NULL,
  `link` varchar(2048) NOT NULL,
  `icone` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'adm_conteudo','home.php','responsive.png'),(2,'adm_contato','adm-contato.php','customer-service.png'),(3,'adm_user','adm-users.php','boss.png');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `niveis`
--

DROP TABLE IF EXISTS `niveis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `niveis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(155) NOT NULL,
  `ativado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `niveis`
--

LOCK TABLES `niveis` WRITE;
/*!40000 ALTER TABLE `niveis` DISABLE KEYS */;
INSERT INTO `niveis` VALUES (28,'Relacionamento com cliente',1),(29,'Administrador',1),(30,'Operador de conteudo PRO',1);
/*!40000 ALTER TABLE `niveis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nivel_menu`
--

DROP TABLE IF EXISTS `nivel_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nivel_menu` (
  `id_nivel` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  PRIMARY KEY (`id_nivel`,`id_menu`),
  KEY `fkey-niveis_idx` (`id_nivel`),
  KEY `fkey-menus_idx` (`id_menu`),
  CONSTRAINT `fkey-menus` FOREIGN KEY (`id_menu`) REFERENCES `menus` (`id`),
  CONSTRAINT `fkey-niveis` FOREIGN KEY (`id_nivel`) REFERENCES `niveis` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nivel_menu`
--

LOCK TABLES `nivel_menu` WRITE;
/*!40000 ALTER TABLE `nivel_menu` DISABLE KEYS */;
INSERT INTO `nivel_menu` VALUES (28,2),(29,1),(29,2),(29,3),(30,1);
/*!40000 ALTER TABLE `nivel_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagina_curiosidades`
--

DROP TABLE IF EXISTS `pagina_curiosidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pagina_curiosidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(155) NOT NULL,
  `texto` text NOT NULL,
  `background` varchar(255) DEFAULT NULL,
  `ativado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagina_curiosidades`
--

LOCK TABLES `pagina_curiosidades` WRITE;
/*!40000 ALTER TABLE `pagina_curiosidades` DISABLE KEYS */;
INSERT INTO `pagina_curiosidades` VALUES (1,'Um pouco sobre nossa coca!','Um pouco sobre nossa coca!\r\nMuito boa','ffb33512786c32d697cf433938e940f7.jpg',1),(8,' VOCÊ SABIA?',' VOCÊ SABIA? Nao',NULL,1);
/*!40000 ALTER TABLE `pagina_curiosidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagina_lojas`
--

DROP TABLE IF EXISTS `pagina_lojas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pagina_lojas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(155) NOT NULL,
  `cep` varchar(45) NOT NULL,
  `logradouro` varchar(155) NOT NULL,
  `bairro` varchar(155) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `cidade` varchar(155) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `link` varchar(2048) NOT NULL,
  `ativado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagina_lojas`
--

LOCK TABLES `pagina_lojas` WRITE;
/*!40000 ALTER TABLE `pagina_lojas` DISABLE KEYS */;
INSERT INTO `pagina_lojas` VALUES (1,'Loja 4','06622330','Rua Embu','Parque Santa Tereza','37','Jandira','SP','https://www.google.com.br/maps/place/Parque+Santa+Tereza,+Jandira+-+SP,+06622-330/@-23.5476825,-46.9019944,17z/data=!3m1!4b1!4m5!3m4!1s0x94cf0134f5d9d4e9:0x129184b28d6dfd0e!8m2!3d-23.5476058!4d-46.9002141',1),(10,'LOJA TEREZA','06622330','Rua Embu','Parque Santa Tereza','12','Jandira','SP','https://www.google.com.br/maps/place/Parque+Santa+Tereza,+Jandira+-+SP,+06622-330/@-23.54768,-46.9009001,18z/data=!3m1!4b1!4m5!3m4!1s0x94cf0134f5d9d4e9:0x129184b28d6dfd0e!8m2!3d-23.5476058!4d-46.9002141',1),(11,'Loja6','23830135','Rua Rio de Janeiro','Parque Primavera','51','Itaguaí','RJ','https://www.google.com.br/maps/place/Parque+Santa+Tereza,+Jandira+-+SP,+06622-330/@-23.5476825,-46.9019944,17z/data=!3m1!4b1!4m5!3m4!1s0x94cf0134f5d9d4e9:0x129184b28d6dfd0e!8m2!3d-23.5476058!4d-46.9002141',1),(13,'Mais uma Loja','06622-330','Rua Embu','Parque Santa Tereza','55','Jandira','SP','',1),(14,'Mais outra loja','06622-330','Rua Embu','Parque Santa Tereza','2222','Jandira','SP','',0),(16,'Loja do Dé','06622-600','Avenida Andradina','Parque das Iglesias','220','Jandira','SP','https://www.google.com.br/maps/place/Parque+das+Iglesias,+Jandira+-+SP,+06622-600/@-23.5526911,-46.9044199,17z/data=!3m1!4b1!4m5!3m4!1s0x94cf06cd32c74187:0x1f430606c33151f!8m2!3d-23.5520251!4d-46.9008898',1);
/*!40000 ALTER TABLE `pagina_lojas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagina_sobre`
--

DROP TABLE IF EXISTS `pagina_sobre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pagina_sobre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(155) NOT NULL,
  `texto` text,
  `imagem` varchar(155) DEFAULT NULL,
  `ativado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagina_sobre`
--

LOCK TABLES `pagina_sobre` WRITE;
/*!40000 ALTER TABLE `pagina_sobre` DISABLE KEYS */;
INSERT INTO `pagina_sobre` VALUES (9,'origem da empresa','Dos campos verdejantes do interior do estado de São Paulo, surge a ideia, dois amigos muito unidos começam uma pesquisa de campo simples, com a intenção de iniciar um negócio em Bofete – SP, cidade onde ambos viviam. A pesquisa era simples, saber se as pessoas, nos horários das refeições principais, tinham alguma bebida de acompanhamento. A resposta não foi uma surpresa, mais de 80% responderam que possuíam bebidas como acompanhamento.\r\n\r\n\r\nCom os resultados seguiram com a ideia, fundaram primeiramente uma adega Delícia Gelada em Bofete e Botucatú, ambas cidades do interior de São Paulo e hoje já contam com lojas em quase todos os estados do Brasil, atendendo diversas famílias direta e indiretamente.','f33bb966d975a0de83dffcbe2ce03e5e.jpg',1),(12,'1212','asdsad','808226c0a0748d2c7b1d1969c7b3082e.jpg',1),(13,'PRAYA','asdad','1ff33838300b6d54feb5049625a8bde5.png',1),(14,'Android 2','goiabas','7b483d6a8a3ed4033c324b2b8fe86b03.jpg',1),(15,'Wow','Wow','a276bc8d999c88d46257b1b87dc92e7e.png',1);
/*!40000 ALTER TABLE `pagina_sobre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `preco` decimal(9,2) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(155) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_sabor` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fksabor-produto_idx` (`id_sabor`),
  KEY `fkcategoria-produto_idx` (`id_categoria`),
  CONSTRAINT `fkcategoria-produto` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`),
  CONSTRAINT `fksabor-produto` FOREIGN KEY (`id_sabor`) REFERENCES `sabores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (1,'Xtapa',2.00,'as','6cb128784e2ce1121ed22aeebdfe34ef.png',3,2),(2,'Del valle',6.99,'del valle','fc16494902a61fcb80eaeff58e275e78.png',3,4),(3,'refr',6.99,'asa','edcfb60c84b0446373bbf557e945f6fe.png',4,5),(4,'Del valle maçã',6.99,'asdasdas','0f5f0492112ed08caec0d5451266efc2.png',3,3);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sabores`
--

DROP TABLE IF EXISTS `sabores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sabores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `icone` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sabores`
--

LOCK TABLES `sabores` WRITE;
/*!40000 ALTER TABLE `sabores` DISABLE KEYS */;
INSERT INTO `sabores` VALUES (1,'Limão','6fac2b83ac45eb505247609b9635f9d6.png'),(2,'Laranja','04810851c5c7e0c9b4870654a3973a31.png'),(3,'Maçã','b46f310db584d7086da9a3a55a6493c0.png'),(4,'Pêra','7891145bb8f2b8b2d2fdba5981de5c3e.png'),(5,'Banana','092b90d04b16608f3263ba4c99b25175.png');
/*!40000 ALTER TABLE `sabores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setores`
--

DROP TABLE IF EXISTS `setores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(155) NOT NULL,
  `email` varchar(155) NOT NULL,
  `senha` varchar(55) NOT NULL,
  `dt_nasc` date NOT NULL,
  `ativado` tinyint(1) DEFAULT '1',
  `idsetor` int(11) NOT NULL,
  `idnivel` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fksetor_idx` (`idsetor`),
  KEY `fknivel_idx` (`idnivel`),
  KEY `fknivel_idx_idx` (`idnivel`),
  CONSTRAINT `fknivelusuario` FOREIGN KEY (`idnivel`) REFERENCES `niveis` (`id`),
  CONSTRAINT `fksetor` FOREIGN KEY (`idsetor`) REFERENCES `setores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (15,'Pedro','pedro@pedro','202cb962ac59075b964b07152d234b70','2000-02-02',1,1,29),(20,'Fernando Henrique','fernando@fernando','202cb962ac59075b964b07152d234b70','1994-03-06',1,2,28);
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

-- Dump completed on 2019-12-09 11:56:25
