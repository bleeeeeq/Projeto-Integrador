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
-- Table structure for table `cadastro`
--

DROP TABLE IF EXISTS `cadastro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cadastro` (
  `idcadastro` int NOT NULL AUTO_INCREMENT,
  `numero` int NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `ra` int DEFAULT NULL,
  `nome` varchar(60) DEFAULT NULL,
  `emuso` tinyint NOT NULL,
  PRIMARY KEY (`idcadastro`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cadastro`
--

LOCK TABLES `cadastro` WRITE;
/*!40000 ALTER TABLE `cadastro` DISABLE KEYS */;
INSERT INTO `cadastro` VALUES (1,0,'Biblioteca',NULL,NULL,0),(2,0,'Auditório',NULL,NULL,0),(3,0,'Projeção e áudio',NULL,NULL,0),(4,0,'Almoxarifado',NULL,NULL,0),(5,0,'Administrativo',NULL,NULL,0),(6,0,'DML',NULL,NULL,0),(7,0,'Espaço docente',NULL,NULL,0),(8,102,'Sala de aula',NULL,NULL,0),(9,103,'Sala de aula',NULL,NULL,0),(10,104,'Cozinha didática',NULL,NULL,0),(11,105,'Estética',NULL,NULL,0),(12,106,'Salão Escola',NULL,NULL,0),(13,201,'Sala de aula',NULL,NULL,0),(14,202,'Sala de aula',NULL,NULL,0),(15,203,'Sala de aula',NULL,NULL,0),(16,204,'Lab. Informática',NULL,NULL,0),(17,205,'Estética',NULL,NULL,0),(18,206,'Estética',NULL,NULL,0),(19,207,'Lab. Informática',NULL,NULL,0),(20,208,'Sala de aula',NULL,NULL,0),(21,209,'Sala de aula',NULL,NULL,0),(22,210,'Lab. Informática',NULL,NULL,0);
/*!40000 ALTER TABLE `cadastro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chave`
--

DROP TABLE IF EXISTS `chave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chave` (
  `idchave` int NOT NULL AUTO_INCREMENT,
  `numero` int NOT NULL,
  `andar` varchar(20) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`idchave`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chave`
--

LOCK TABLES `chave` WRITE;
/*!40000 ALTER TABLE `chave` DISABLE KEYS */;
INSERT INTO `chave` VALUES (1,0,'Térreo','Biblioteca'),(2,0,'Térreo','Auditório'),(3,0,'Térreo','Projeção e áudio'),(4,0,'1° andar','Almoxarifado'),(5,0,'1° andar','Administrativo'),(6,0,'1° andar','DML'),(7,0,'1° andar','Espaço docente'),(8,102,'1° andar','Sala de aula'),(9,103,'1° andar','Sala de aula'),(10,104,'1° andar','Cozinha didática'),(11,105,'1° andar','Estética'),(12,106,'1° andar','Salão Escola'),(13,201,'2° andar','Sala de aula'),(14,202,'2° andar','Sala de aula'),(15,203,'2° andar','Sala de aula'),(16,204,'2° andar','Lab. Informática'),(17,205,'2° andar','Estética'),(18,206,'2° andar','Estética'),(19,207,'2° andar','Lab. Informática'),(20,208,'2° andar','Sala de aula'),(21,209,'2° andar','Sala de aula'),(22,210,'2° andar','Lab. Informática');
/*!40000 ALTER TABLE `chave` ENABLE KEYS */;
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

-- Dump completed on 2024-07-16 11:43:57
