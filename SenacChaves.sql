CREATE DATABASE  IF NOT EXISTS `senacchaves` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `senacchaves`;
-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: senacchaves
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `agenda`
--

DROP TABLE IF EXISTS `agenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agenda` (
  `idagenda` int NOT NULL AUTO_INCREMENT,
  `chave` int NOT NULL,
  `nome` varchar(45) NOT NULL,
  `nomeUsuario` varchar(60) DEFAULT NULL,
  `emuso` varchar(25) NOT NULL,
  `acontecimento` varchar(50) DEFAULT NULL,
  `especificar` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`idagenda`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agenda`
--

LOCK TABLES `agenda` WRITE;
/*!40000 ALTER TABLE `agenda` DISABLE KEYS */;
INSERT INTO `agenda` VALUES (1,1,'Biblioteca','Jeff Feng','Disponível',NULL,NULL),(2,2,'Auditório',NULL,'Disponível',NULL,NULL),(3,3,'Projeção e áudio',NULL,'Disponível',NULL,NULL),(4,4,'Almoxarifado','Leon Martins','Não disponível',NULL,NULL),(5,5,'Administrativo',NULL,'Disponível',NULL,NULL),(6,6,'DML',NULL,'Disponível',NULL,NULL),(7,7,'Espaço docente',NULL,'Disponível',NULL,NULL),(8,102,'Sala de aula',NULL,'Disponível',NULL,NULL),(9,103,'Sala de aula',NULL,'Disponível',NULL,NULL),(10,104,'Cozinha didática',NULL,'Disponível',NULL,NULL),(11,105,'Estética',NULL,'Disponível',NULL,NULL),(12,106,'Salão Escola',NULL,'Disponível',NULL,NULL),(13,201,'Sala de aula',NULL,'Disponível',NULL,NULL),(14,202,'Sala de aula',NULL,'Disponível',NULL,NULL),(15,203,'Sala de aula',NULL,'Disponível',NULL,NULL),(16,204,'Lab. Informática',NULL,'Disponível',NULL,NULL),(17,205,'Estética',NULL,'Disponível',NULL,NULL),(18,206,'Estética',NULL,'Disponível',NULL,NULL),(19,207,'Lab. Informática',NULL,'Disponível',NULL,NULL),(20,208,'Sala de aula',NULL,'Disponível',NULL,NULL),(21,209,'Sala de aula',NULL,'Disponível',NULL,NULL),(22,210,'Lab. Informática',NULL,'Disponível',NULL,NULL);
/*!40000 ALTER TABLE `agenda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chave`
--

DROP TABLE IF EXISTS `chave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chave` (
  `idchave` int NOT NULL AUTO_INCREMENT,
  `numero` int DEFAULT NULL,
  `andar` varchar(20) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `registrado` varchar(25) DEFAULT NULL,
  `nome` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`idchave`),
  UNIQUE KEY `numero_UNIQUE` (`numero`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chave`
--

LOCK TABLES `chave` WRITE;
/*!40000 ALTER TABLE `chave` DISABLE KEYS */;
INSERT INTO `chave` VALUES (1,1,'Térreo','Biblioteca','Não disponível',NULL),(2,2,'Térreo','Auditório','Não disponível',NULL),(3,3,'Térreo','Projeção e áudio','Não disponível',NULL),(4,4,'1° andar','Almoxarifado','Disponivel',NULL),(5,5,'1° andar','Administrativo','Disponivel',NULL),(6,6,'1° andar','DML','Disponivel',NULL),(7,7,'1° andar','Espaço docente','Disponivel',NULL),(8,102,'1° andar','Sala de aula','Disponivel',NULL),(9,103,'1° andar','Sala de aula','Disponivel',NULL),(10,104,'1° andar','Cozinha didática','Disponivel',NULL),(11,105,'1° andar','Estética','Disponivel',NULL),(12,106,'1° andar','Salão Escola','Disponivel',NULL),(13,201,'2° andar','Sala de aula','Disponivel',NULL),(14,202,'2° andar','Sala de aula','Não disponível',NULL),(15,203,'2° andar','Sala de aula','Não disponível',NULL),(16,204,'2° andar','Lab. Informática','Não disponível',NULL),(17,205,'2° andar','Estética','Disponivel',NULL),(18,206,'2° andar','Estética','Não disponível',NULL),(19,207,'2° andar','Lab. Informática','Disponivel',NULL),(20,208,'2° andar','Sala de aula','Não disponível',NULL),(21,209,'2° andar','Sala de aula','Disponivel',NULL),(22,210,'2° andar','Lab. Informática','Não disponível',NULL);
/*!40000 ALTER TABLE `chave` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historicochave`
--

DROP TABLE IF EXISTS `historicochave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historicochave` (
  `idhistoricoChave` int NOT NULL AUTO_INCREMENT,
  `chave` varchar(45) DEFAULT NULL,
  `nome` varchar(55) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `nomeUsuario` varchar(60) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idhistoricoChave`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historicochave`
--

LOCK TABLES `historicochave` WRITE;
/*!40000 ALTER TABLE `historicochave` DISABLE KEYS */;
INSERT INTO `historicochave` VALUES (1,'4','Almoxarifado','2024-09-05','11:36:00','Leon Martins','Chave retirada');
/*!40000 ALTER TABLE `historicochave` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idusuario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL,
  `ra` varchar(10) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `cep` varchar(18) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `gerencia` tinyint DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  UNIQUE KEY `ra_UNIQUE` (`ra`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Leon Martins','coisadenerd@gmail.com','1234','111111','Santo Agostinho, Jardim das Américas, 22','Volta Redonda','RJ','27260-000','023.681.186-09',1),(2,'Nilce Moretto','nilmoretto@gmail.com','1234','222222','Jardim do Trevo, Rua José de Alencar, 44','Birigui','SP','16200-000','321.458.981-71',1),(3,'Jeff Feng','pokejeff@outlook.com','1234','333333','Bolo, de Cenoura, 16','Cidade dos bolos','AC','21421-849','423.817.382-17',NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'senacchaves'
--

--
-- Dumping routines for database 'senacchaves'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-05 11:41:13
