DROP DATABASE IF EXISTS cake_cms;

CREATE DATABASE IF NOT EXISTS cake_cms;

USE cake_cms;

DROP TABLE IF EXISTS `info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `info` (
  `id` int NOT NULL,
  `dimension` varchar(256) DEFAULT NULL,
  `weight` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS `manufacturer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `manufacturer` (
  `id` int NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `url` varchar(2048) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `asin` varchar(256) DEFAULT NULL,
  `brand` varchar(256) DEFAULT NULL,
  `source_url` varchar(2048) DEFAULT NULL,
  `description` varchar(2048) DEFAULT NULL,
  `fk_info_info_PK` int DEFAULT NULL,
  `fk_Manufacturer_Id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Product_3` (`fk_info_info_PK`),
  KEY `FK_Product_4` (`fk_Manufacturer_Id`),
  CONSTRAINT `FK_Product_3` FOREIGN KEY (`fk_info_info_PK`) REFERENCES `info` (`id`) ON DELETE SET NULL,
  CONSTRAINT `FK_Product_4` FOREIGN KEY (`fk_Manufacturer_Id`) REFERENCES `manufacturer` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorie` (
  /*`id` int NOT NULL,*/
  `nome_categorie` varchar(256) NOT NULL,
  `product_fk` int DEFAULT NULL,
  /*`categorie_fk` int DEFAULT NULL,*/

  PRIMARY KEY (`nome_categorie`) /*, `product_fk`*/

  /*KEY `FK_product_categorie_1` (`product_fk`),*
  /*KEY `FK_product_categorie_2` (`categorie_fk`),*/

  /*CONSTRAINT `FK_product_categorie_1` FOREIGN KEY (`product_fk`) REFERENCES `product` (`id`) ON DELETE SET NULL*/
  /*CONSTRAINT `FK_product_categorie_2` FOREIGN KEY (`categorie_fk`) REFERENCES `categorie` (`id`) ON DELETE SET NULL*/

); /*ENGINE=InnoDB DEFAULT CHARSET=utf8mb4*/
/*!40101 SET character_set_client = @saved_cs_client */;


/*DROP TABLE IF EXISTS `product_categorie`;*/
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
/*
CREATE TABLE `product_categorie` (
  `product_fk` int DEFAULT NULL,
  `categorie_fk` int DEFAULT NULL,
  KEY `FK_product_categorie_1` (`product_fk`),
  KEY `FK_product_categorie_2` (`categorie_fk`),
  CONSTRAINT `FK_product_categorie_1` FOREIGN KEY (`product_fk`) REFERENCES `product` (`id`) ON DELETE SET NULL,
  CONSTRAINT `FK_product_categorie_2` FOREIGN KEY (`categorie_fk`) REFERENCES `categorie` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; */
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `review` (
  `fk_User_Id` int DEFAULT NULL,
  `fk_Product_Id` int DEFAULT NULL,
  `Id` int NOT NULL,
  `rating` int DEFAULT NULL,
  `title` varchar(256) DEFAULT NULL,
  `text` varchar(2048) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_Review_2` (`fk_User_Id`),
  KEY `FK_Review_3` (`fk_Product_Id`),
  CONSTRAINT `FK_Review_2` FOREIGN KEY (`fk_User_Id`) REFERENCES `user` (`id`) ON DELETE SET NULL,
  CONSTRAINT `FK_Review_3` FOREIGN KEY (`fk_Product_Id`) REFERENCES `product` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS `sells`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sells` (
  `fk_Product_Id` int DEFAULT NULL,
  `fk_Store_Id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS `store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `store` (
  `id` int NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `url` varchar(2048) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(256) DEFAULT NULL,
  `city` varchar(256) DEFAULT NULL,
  `province` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;