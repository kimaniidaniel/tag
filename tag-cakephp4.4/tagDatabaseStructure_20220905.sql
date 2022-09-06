-- MySQL dump 10.13  Distrib 8.0.30, for macos12 (x86_64)
--
-- Host: 127.0.0.1    Database: tag
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventory` (
  `id` int NOT NULL,
  `name` varchar(60) NOT NULL,
  `storageunit_id` int NOT NULL,
  `user_id` int NOT NULL,
  `description` varchar(100) NOT NULL,
  `number_of_items` int NOT NULL,
  `departure_date` date NOT NULL,
  `arival_date` date NOT NULL,
  `period` varchar(60) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` VALUES (1,'Test package',1,1,'General',1,'2022-07-07','2022-07-15','','2022-07-07 14:11:18'),(0,'Test Package 2',2,788072,'General packing',3,'2022-05-12','2022-09-17','','2022-07-17 08:14:40');
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `storagelocations`
--

DROP TABLE IF EXISTS `storagelocations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `storagelocations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `address` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UserID` (`user_id`),
  UNIQUE KEY `name` (`name`),
  KEY `id` (`id`,`user_id`),
  CONSTRAINT `assigned_userid_users_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `storagelocations`
--

LOCK TABLES `storagelocations` WRITE;
/*!40000 ALTER TABLE `storagelocations` DISABLE KEYS */;
INSERT INTO `storagelocations` VALUES (1,1,'Patrick Adams','Test location','Top Street','2022-07-17 08:01:22'),(2,788072,'High hills','red, blue and white','Grand Anse','2022-07-17 07:58:49'),(3,788075,'Eric Gary','white bag','Cherryhill','2022-07-18 23:04:33');
/*!40000 ALTER TABLE `storagelocations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `storageunits`
--

DROP TABLE IF EXISTS `storageunits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `storageunits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `storagelocation_id` int NOT NULL,
  `user_id` int NOT NULL,
  `identifier` varchar(60) NOT NULL,
  `name` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`storagelocation_id`,`user_id`),
  KEY `storage_location_id` (`storagelocation_id`,`user_id`),
  KEY `name` (`name`),
  KEY `storagelocation_id` (`storagelocation_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `Storage_location` FOREIGN KEY (`storagelocation_id`) REFERENCES `storagelocations` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `storageunits`
--

LOCK TABLES `storageunits` WRITE;
/*!40000 ALTER TABLE `storageunits` DISABLE KEYS */;
INSERT INTO `storageunits` VALUES (1,1,1,'BO01','Box1','2022-07-07 10:54:47'),(2,2,788072,'0012','Box2','2022-07-17 08:04:13'),(3,3,1,'223','trest','2022-08-22 13:39:19'),(4,3,1,'tttt','test 3','2022-08-22 13:42:31');
/*!40000 ALTER TABLE `storageunits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `personal_id` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('Admin','RA','Staff') NOT NULL,
  `identifier` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=788082 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Osborn','Mclawrence','','omclawre','Grenada','Admin','1223456','westerhall','omclaw@gmail.com'),(788072,'Clifford','Bostros','','CliffBostros','','RA','8072','St.Pauls','Cliffbos@sgu.edu'),(788073,'Alisha','Joseph','','Alijoseph','Grenada0209','RA','0012','St.David','Jadegc1@gmail.com'),(788074,'Susan','Joseph','','Alijoseph1','Grenada02093','RA','0012','St.David','Jadegc12@gmail.com'),(788075,'Jason','Matthew','','JasonMat','Jasonmat1','Staff','142','Cherryhill','jasonmat@sgu.edu'),(788076,'Marvin','Hosten','','marvinhostem','Marvinhosten','Admin','13','Gouyave','marvinhosten@gmail.com'),(788077,'Steven','john','','stevenjohn','Grenada0209','RA','15','St.Georges','stevenjohn@gmail.com'),(788078,'Maya','Charles','','mayacharles','maycharles123','Admin','7894','St.Patrick','mayacourt@gmail.com'),(788081,'Kim','Dan','','kimanii','$2y$10$NLLtcFVC8DPQresgXdHvHOUWMhT0MsHwZ5pqGI3462RRIm.Bychm.','','1111','testing','kdaniel5@sgu.edu');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-05 22:19:14
