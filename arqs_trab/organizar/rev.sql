DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `review` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fk_User_Id` int DEFAULT NULL,
  `fk_Product_Id` int DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `title` varchar(256) DEFAULT NULL,
  `text` varchar(2048) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Review_2` (`fk_User_Id`),
  KEY `FK_Review_3` (`fk_Product_Id`),
  CONSTRAINT `FK_Review_2` FOREIGN KEY (`fk_User_Id`) REFERENCES `user` (`id`) ON DELETE SET NULL,
  CONSTRAINT `FK_Review_3` FOREIGN KEY (`fk_Product_Id`) REFERENCES `product` (`id`) ON DELETE SET NULL
) AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;