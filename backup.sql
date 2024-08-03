CREATE DATABASE  IF NOT EXISTS `4000870` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;
USE `4000870`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: 4000870
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `amplificadores`
--

DROP TABLE IF EXISTS `amplificadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `amplificadores` (
  `COD_AMP` int(11) NOT NULL AUTO_INCREMENT,
  `TIPO_AMP` varchar(45) NOT NULL,
  `MARCA_AMP` varchar(45) NOT NULL,
  `MODELO_AMP` varchar(45) NOT NULL,
  `PRECO_AMP` decimal(10,2) NOT NULL,
  `FOTO_AMP` varchar(100) NOT NULL,
  `FILA_COMPRA_AMP` char(1) NOT NULL DEFAULT 'N',
  `VENDAS_COD_VEN` int(11) DEFAULT NULL,
  `FORNECEDORES_COD_FOR` int(11) DEFAULT NULL,
  PRIMARY KEY (`COD_AMP`),
  KEY `fk_IMPRESSORAS_VENDAS1_idx` (`VENDAS_COD_VEN`),
  KEY `fk_fornecedor_amplificador` (`FORNECEDORES_COD_FOR`),
  CONSTRAINT `fk_IMPRESSORAS_VENDAS1` FOREIGN KEY (`VENDAS_COD_VEN`) REFERENCES `vendas` (`COD_VEN`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_fornecedor_amplificador` FOREIGN KEY (`FORNECEDORES_COD_FOR`) REFERENCES `fornecedores` (`COD_FOR`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `amplificadores`
--

LOCK TABLES `amplificadores` WRITE;
/*!40000 ALTER TABLE `amplificadores` DISABLE KEYS */;
INSERT INTO `amplificadores` VALUES (1,'baixo','Boss','Katana 50 MkII EX',1210.00,'img/baixo_ampeg_ba108.jpg','V',4,5),(2,'violao','Marshall','ST20H JTM Studio',8410.00,'img/violao_borne_infinit.jpg','S',NULL,3),(3,'violao','Orange','Crush Mini',2500.00,'img/violao_borne_infinit.jpg','V',4,4),(4,'guitarra','Borne','Strike G30',3699.00,'img/guitarra_blackstar_ht5r_valvulado.jpg','N',NULL,3),(5,'baixo','Fender','Champion 100',4440.00,'img/baixo_ampeg_ba108.jpg','N',NULL,7);
/*!40000 ALTER TABLE `amplificadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fornecedores`
--

DROP TABLE IF EXISTS `fornecedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fornecedores` (
  `COD_FOR` int(11) NOT NULL AUTO_INCREMENT,
  `NOME_FOR` varchar(45) NOT NULL,
  `ENDERECO_FOR` varchar(255) DEFAULT NULL,
  `TELEFONE_FOR` varchar(20) DEFAULT NULL,
  `NOMECONTATO_FOR` varchar(45) DEFAULT NULL,
  `PRODUTO_FOR` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`COD_FOR`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedores`
--

LOCK TABLES `fornecedores` WRITE;
/*!40000 ALTER TABLE `fornecedores` DISABLE KEYS */;
INSERT INTO `fornecedores` VALUES (3,'Oneal Amplificadores','Rua Rio Grande do Norte, 1570, Cambé - PR, Brasil','+55 (43) 3174-0700','Paulo Cezar','violao'),(4,'Meteoro Amplificadores','Rua dos Três Mosqueteiros, 180, Vila Esperança, São Paulo - SP, Brasil','+55 (11) 2125-9600','Vitória da Silva','baixo'),(5,'Fender','Raymond Avenue, 500, em Fullerton, EUA','+55 (11) 3799-9600','Samuel Ribeiro','violao'),(6,'Laney Amplification','Steelpark Road, Halesowen, West Midlands, B62 8HD, Inglaterra','+44 121 508 6666','Vinicius','guitarra'),(7,'New Vox Amplificadores','Rua Arapá, 1080 - Bairro dos Casa, São Bernardo do Campo - SP, 09812-110','+55 (11) 2043-8700','Maria Luisa','baixo');
/*!40000 ALTER TABLE `fornecedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `funcionarios` (
  `COD_FUN` int(11) NOT NULL AUTO_INCREMENT,
  `NOME_FUN` varchar(45) NOT NULL,
  `LOGIN_FUN` varchar(45) NOT NULL,
  `SENHA_FUN` varchar(45) NOT NULL,
  `STATUS_FUN` varchar(45) NOT NULL DEFAULT 'ativo',
  `FUNCAO_FUN` varchar(45) NOT NULL,
  PRIMARY KEY (`COD_FUN`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionarios`
--

LOCK TABLES `funcionarios` WRITE;
/*!40000 ALTER TABLE `funcionarios` DISABLE KEYS */;
INSERT INTO `funcionarios` VALUES (1,'Administrador do sistema','admin','1','ativo','administrador'),(4,'José da Silva','ze','1','ativo','estoquista'),(6,'Joana D´Arc','jo','1','ativo','vendedor'),(7,'João Moreira','jm','1','ativo','estoquista'),(8,'Carla Nascimento','cnas','1','ativo','vendedor');
/*!40000 ALTER TABLE `funcionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendas`
--

DROP TABLE IF EXISTS `vendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendas` (
  `COD_VEN` int(11) NOT NULL AUTO_INCREMENT,
  `DATA_VEN` varchar(45) NOT NULL,
  `FUNCIONARIOS_COD_FUN` int(11) NOT NULL,
  PRIMARY KEY (`COD_VEN`),
  KEY `fk_VENDAS_FUNCIONARIOS_idx` (`FUNCIONARIOS_COD_FUN`),
  CONSTRAINT `fk_VENDAS_FUNCIONARIOS` FOREIGN KEY (`FUNCIONARIOS_COD_FUN`) REFERENCES `funcionarios` (`COD_FUN`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendas`
--

LOCK TABLES `vendas` WRITE;
/*!40000 ALTER TABLE `vendas` DISABLE KEYS */;
INSERT INTO `vendas` VALUES (4,'17/06/2024',1);
/*!40000 ALTER TABLE `vendas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database '4000870'
--

--
-- Dumping routines for database '4000870'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-18  0:59:12
