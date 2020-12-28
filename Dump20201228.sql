-- MySQL dump 10.13  Distrib 5.7.32, for Linux (x86_64)
--
-- Host: localhost    Database: easy_accomod
-- ------------------------------------------------------
-- Server version	5.7.32-0ubuntu0.18.04.1

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
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wards` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinces` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` VALUES (1,'155','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(2,'155','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(3,'155','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(4,'155','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(5,'155','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(6,'155','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(7,'155','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(8,'155','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(9,'155','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(10,'155','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(11,'155','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(12,'155','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(13,'158','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(14,'158','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(15,'158','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(16,'158','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(17,'158','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(18,'158','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(19,'165','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(20,'165','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(21,'165','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(22,'165','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(23,'165','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(24,'165','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(25,'165','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(26,'165','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(27,'165','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(28,'165','Cầu Giấy','Quan Hoa','Cầu Giấy','Hà Nội'),(29,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(30,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(31,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(32,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(33,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(34,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(35,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(36,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(37,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(38,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(39,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(40,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(41,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(42,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(43,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(44,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(45,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(46,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(47,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(48,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(49,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(50,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(51,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(52,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(53,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(54,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(55,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(56,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(57,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(58,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(59,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(60,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(61,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(62,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(63,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(64,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(65,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(66,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(67,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(68,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(69,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(70,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(71,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(72,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội'),(73,'Ngõ 155',' Cầu giấy',' Quan Hoa',' Cầu Giấy',' Hà Nội');
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `boarding_furnitures`
--

DROP TABLE IF EXISTS `boarding_furnitures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boarding_furnitures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `furniture_id` int(10) unsigned NOT NULL,
  `boarding_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `boarding_furnitures_boarding_id_foreign` (`boarding_id`),
  KEY `boarding_furnitures_furniture_id_foreign` (`furniture_id`),
  CONSTRAINT `boarding_furnitures_boarding_id_foreign` FOREIGN KEY (`boarding_id`) REFERENCES `boardings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `boarding_furnitures_furniture_id_foreign` FOREIGN KEY (`furniture_id`) REFERENCES `furnitures` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boarding_furnitures`
--

LOCK TABLES `boarding_furnitures` WRITE;
/*!40000 ALTER TABLE `boarding_furnitures` DISABLE KEYS */;
INSERT INTO `boarding_furnitures` VALUES (1,1,20),(2,2,21),(3,3,21),(4,4,21),(5,2,22),(6,3,22),(7,4,22),(8,2,23),(9,3,23),(10,4,23),(11,2,23),(12,3,23),(13,4,23),(14,2,23),(15,3,23),(16,4,23),(17,2,23),(18,3,23),(19,4,23),(20,2,23),(21,3,23),(22,4,23),(23,2,24),(24,3,24),(25,4,24),(26,2,25),(27,3,25),(28,4,25),(29,2,26),(30,3,26),(31,4,26),(32,2,27),(33,3,27),(34,4,27),(35,2,28),(36,3,28),(37,4,28),(38,2,29),(39,3,29),(40,4,29),(41,2,30),(42,3,30),(43,4,30),(44,2,31),(45,3,31),(46,4,31),(47,2,32),(48,3,32),(49,4,32),(50,2,33),(51,3,33),(52,4,33);
/*!40000 ALTER TABLE `boarding_furnitures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `boarding_palce_arounds`
--

DROP TABLE IF EXISTS `boarding_palce_arounds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boarding_palce_arounds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `palce_around_id` int(10) unsigned NOT NULL,
  `boarding_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `boarding_palce_arounds_boarding_id_foreign` (`boarding_id`),
  KEY `boarding_palce_arounds_palce_around_id_foreign` (`palce_around_id`),
  CONSTRAINT `boarding_palce_arounds_boarding_id_foreign` FOREIGN KEY (`boarding_id`) REFERENCES `boardings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `boarding_palce_arounds_palce_around_id_foreign` FOREIGN KEY (`palce_around_id`) REFERENCES `place_arounds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boarding_palce_arounds`
--

LOCK TABLES `boarding_palce_arounds` WRITE;
/*!40000 ALTER TABLE `boarding_palce_arounds` DISABLE KEYS */;
INSERT INTO `boarding_palce_arounds` VALUES (1,1,3),(2,1,4),(3,1,5),(4,1,6),(5,1,7),(6,1,8),(7,1,9),(8,1,10),(9,1,11),(10,1,12),(11,2,13),(12,3,13),(13,2,14),(14,3,14),(18,2,15),(19,3,15),(23,2,16),(24,3,16),(25,2,17),(26,3,17),(27,2,18),(28,3,18),(29,2,19),(30,3,19),(31,2,20),(32,3,20),(33,2,21),(34,3,21),(35,2,22),(36,3,22),(37,2,23),(38,3,23),(39,2,23),(40,3,23),(41,2,23),(42,3,23),(43,2,23),(44,3,23),(45,2,23),(46,3,23),(47,2,24),(48,3,24),(49,2,25),(50,3,25),(51,2,26),(52,3,26),(53,2,27),(54,3,27),(55,2,28),(56,3,28),(57,2,29),(58,3,29),(59,2,30),(60,3,30),(61,2,31),(62,3,31),(63,2,32),(64,3,32),(65,2,33),(66,3,33);
/*!40000 ALTER TABLE `boarding_palce_arounds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `boardings`
--

DROP TABLE IF EXISTS `boardings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boardings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `price` bigint(20) NOT NULL,
  `area` double(8,2) NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  `address_id` int(10) unsigned NOT NULL,
  `images` json NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_owner` tinyint(4) NOT NULL,
  `electricity_water` int(10) DEFAULT NULL,
  `electricity_price` bigint(20) DEFAULT NULL,
  `water_price` bigint(20) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `boardings_address_id_foreign` (`address_id`),
  KEY `boardings_type_id_foreign` (`type_id`),
  CONSTRAINT `boardings_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `boardings_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `type_boardings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boardings`
--

LOCK TABLES `boardings` WRITE;
/*!40000 ALTER TABLE `boardings` DISABLE KEYS */;
INSERT INTO `boardings` VALUES (1,1300000,12.00,1,39,'\"phong1.png\"','Đây là phòng trọ 1',1,2,NULL,NULL,NULL),(2,1300000,12.00,1,40,'\"phong1.png\"','Đây là phòng trọ 1',1,2,NULL,NULL,NULL),(3,1300000,12.00,1,41,'\"phong1.png\"','Đây là phòng trọ 1',1,2,NULL,NULL,NULL),(4,1300000,12.00,1,42,'\"phong1.png\"','Đây là phòng trọ 1',1,2,NULL,NULL,NULL),(5,1300000,12.00,1,43,'\"phong1.png\"','Đây là phòng trọ 1',1,2,NULL,NULL,NULL),(6,1300000,12.00,1,44,'\"phong1.png\"','Đây là phòng trọ 1',1,2,NULL,NULL,NULL),(7,1300000,12.00,1,45,'\"phong1.png\"','Đây là phòng trọ 1',1,2,NULL,NULL,NULL),(8,1300000,12.00,1,46,'\"phong1.png\"','Đây là phòng trọ 1',1,2,NULL,NULL,NULL),(9,1300000,12.00,1,47,'\"phong1.png\"','Đây là phòng trọ 1',1,2,NULL,NULL,NULL),(10,1300000,12.00,1,48,'\"phong1.png\"','Đây là phòng trọ 1',1,2,NULL,NULL,NULL),(11,1300000,12.00,1,49,'\"phong1.png\"','Đây là phòng trọ 1',1,2,NULL,NULL,NULL),(12,1300000,12.00,1,50,'\"phong1.png\"','Đây là phòng trọ 1',1,2,NULL,NULL,NULL),(13,1300000,12.00,1,51,'\"phong1.png\"','Đây là phòng trọ 1',1,2,NULL,NULL,NULL),(14,1300000,12.00,1,52,'\"phong1.png\"','Đây là phòng trọ 1',1,2,NULL,NULL,NULL),(15,1300000,12.00,1,53,'\"phong1.png\"','Đây là phòng trọ 1',1,2,NULL,NULL,NULL),(16,1300000,12.00,1,54,'\"phong1.png\"','Đây là phòng trọ 1',1,2,NULL,NULL,NULL),(17,1300000,12.00,1,55,'\"phong1.png\"','Đây là phòng trọ 1',1,2,NULL,NULL,NULL),(18,1300000,12.00,1,56,'\"phong1.png\"','Đây là phòng trọ 1',1,2,NULL,NULL,NULL),(19,1300000,12.00,1,57,'\"phong1.png\"','Đây là phòng trọ 1',1,2,NULL,NULL,NULL),(20,1300000,12.00,1,58,'\"phong1.png\"','Đây là phòng trọ 1',1,2,NULL,NULL,NULL),(21,1300000,12.00,1,59,'\"phong1.png\"','Đây là phòng trọ 1',1,2,NULL,NULL,NULL),(22,1300000,12.00,1,61,'{\"0\": \"no_img_room.png\"}','Đây là phòng trọ 1',1,2,NULL,NULL,NULL),(23,1300000,12.00,1,62,'{\"0\": \"no_img_room.png\"}','Đây là phòng trọ 1',1,2,NULL,NULL,1),(24,1300000,12.00,1,63,'{\"0\": \"no_img_room.png\"}','Đây là phòng trọ 1',1,2,NULL,NULL,0),(25,1300000,12.00,1,64,'{\"0\": \"no_img_room.png\"}','Đây là phòng trọ 1',1,2,NULL,NULL,0),(26,1300000,12.00,1,65,'{\"0\": \"no_img_room.png\"}','Đây là phòng trọ 1',1,2,NULL,NULL,0),(27,1300000,12.00,1,66,'{\"0\": \"no_img_room.png\"}','Đây là phòng trọ 1',1,2,NULL,NULL,0),(28,1300000,12.00,1,67,'{\"0\": \"no_img_room.png\"}','Đây là phòng trọ 1',1,2,NULL,NULL,0),(29,1300000,12.00,1,68,'{\"0\": \"no_img_room.png\"}','Đây là phòng trọ 1',1,2,NULL,NULL,0),(30,1300000,12.00,1,69,'{\"0\": \"no_img_room.png\"}','Đây là phòng trọ 1',1,2,NULL,NULL,0),(31,1300000,12.00,1,70,'{\"0\": \"no_img_room.png\"}','Đây là phòng trọ 1',1,2,NULL,NULL,0),(32,1300000,12.00,1,71,'{\"0\": \"no_img_room.png\"}','Đây là phòng trọ 1',1,2,NULL,NULL,0),(33,1300000,12.00,1,72,'{\"0\": \"no_img_room.png\"}','Đây là phòng trọ 1',1,2,NULL,NULL,0),(34,1300000,12.00,1,73,'{\"0\": \"no_img_room.png\"}','Đây là phòng trọ 1',1,2,NULL,NULL,0);
/*!40000 ALTER TABLE `boardings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `reply_for` int(10) unsigned NOT NULL,
  `rating` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_post_id_foreign` (`post_id`),
  KEY `comments_reply_for_foreign` (`reply_for`),
  CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comments_reply_for_foreign` FOREIGN KEY (`reply_for`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `furnitures`
--

DROP TABLE IF EXISTS `furnitures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `furnitures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `furnitures`
--

LOCK TABLES `furnitures` WRITE;
/*!40000 ALTER TABLE `furnitures` DISABLE KEYS */;
INSERT INTO `furnitures` VALUES (1,'',NULL),(2,'Điều hòa',NULL),(3,'Nóng lạnh',NULL),(4,'Tủ quần áo',NULL);
/*!40000 ALTER TABLE `furnitures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `like_posts`
--

DROP TABLE IF EXISTS `like_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `like_posts` (
  `post_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  KEY `like_posts_post_id_foreign` (`post_id`),
  KEY `like_posts_user_id_foreign` (`user_id`),
  CONSTRAINT `like_posts_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `like_posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `like_posts`
--

LOCK TABLES `like_posts` WRITE;
/*!40000 ALTER TABLE `like_posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `like_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_create` int(10) unsigned NOT NULL,
  `user_recv` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_user_create_foreign` (`user_create`),
  KEY `messages_user_recv_foreign` (`user_recv`),
  CONSTRAINT `messages_user_create_foreign` FOREIGN KEY (`user_create`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `messages_user_recv_foreign` FOREIGN KEY (`user_recv`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_resets_table',1),(2,'2019_08_19_000000_create_failed_jobs_table',1),(3,'2020_11_10_074538_create_addresses_table',1),(4,'2020_11_10_074920_create_roles_table',1),(5,'2020_11_10_074921_create_users_table',1),(6,'2020_11_12_001927_create_type_boardings_table',1),(7,'2020_11_12_002102_create_place_arounds_table',1),(8,'2020_11_12_002220_create_boardings_table',1),(9,'2020_11_12_004030_create_posts_table',1),(10,'2020_11_12_004625_create_furniture_table',1),(11,'2020_11_12_004856_create_boarding_furnitures',1),(12,'2020_11_12_005739_create_like_post',1),(13,'2020_11_12_010104_create_seen_posts',1),(14,'2020_11_12_010335_create_payments',1),(15,'2020_11_12_010716_create_reports',1),(16,'2020_11_12_011136_create_comments',1),(17,'2020_11_12_011642_create_messages',1),(18,'2020_11_12_011858_create_notifications',1),(19,'2016_06_01_000001_create_oauth_auth_codes_table',2),(20,'2016_06_01_000002_create_oauth_access_tokens_table',2),(21,'2016_06_01_000003_create_oauth_refresh_tokens_table',2),(22,'2016_06_01_000004_create_oauth_clients_table',2),(23,'2016_06_01_000005_create_oauth_personal_access_clients_table',2),(24,'2020_10_12_100000_create_password_resets_table',3),(25,'2020_12_26_030728_create_boarding_palce_arounds_table',4),(26,'2020_12_26_030729_create_boarding_palce_arounds_table',5),(27,'2020_12_27_072920_add_column_slug_table_motelroom',6),(28,'2020_12_27_072920_add_column_slug_table_post',7),(29,'2020_12_27_084140_create_visits_table',7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` int(10) unsigned NOT NULL,
  `to_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_from_id_foreign` (`from_id`),
  KEY `notifications_to_id_foreign` (`to_id`),
  CONSTRAINT `notifications_from_id_foreign` FOREIGN KEY (`from_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `notifications_to_id_foreign` FOREIGN KEY (`to_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` VALUES ('051e940efbddeac5557d3d148fb5ad35850b7194ace78fa291fd040697c3997b127e965287312e77',10,5,'Personal Access Token','[]',0,'2020-12-25 21:49:39','2020-12-25 21:49:39','2021-06-26 04:49:38'),('1799dc3be6bac22fd813a41626dad9c49f85c7347e4fab2aab6cefd3802e5775126c29a7e9fe2ce0',10,5,'Personal Access Token','[]',0,'2020-12-23 02:43:27','2020-12-23 02:43:27','2021-06-23 09:43:27'),('1aae390e20e74bd8e513ee05130ed3c714e271c0030b55715ccd49810e0b5397624992eac088041d',22,5,'Personal Access Token','[]',0,'2020-12-23 08:20:42','2020-12-23 08:20:42','2021-06-23 15:20:42'),('3112377b0ff93dad547e7d12c2de52163136f3719556e13ca9f71304024bffba3e0c9d43057ffcf1',24,5,'Personal Access Token','[]',0,'2020-12-26 01:53:25','2020-12-26 01:53:25','2021-06-26 08:53:25'),('33e1b6312b54409fbfbda7726c1965c7abfc1c3e0801776981bc93af32e9b5be1c0a859c4b591599',10,1,'Personal Access Token','[]',0,'2020-12-22 20:28:43','2020-12-22 20:28:43','2021-06-23 03:28:43'),('3da3746dc51dd3672aefa2139e645a55c2621ffc82e13fd65db506f8d96110a9140d6f5df4d1edd1',10,1,'Personal Access Token','[]',0,'2020-12-22 20:43:27','2020-12-22 20:43:27','2021-06-23 03:43:27'),('4a51328881bea9ed8b7cfba352cff35dc7351d29de421f79c8d7fd6aa270756df3204fc831805088',10,1,'Personal Access Token','[]',0,'2020-12-22 20:47:53','2020-12-22 20:47:53','2021-06-23 03:47:53'),('5f163ca8cf32bd60bb1dab866dd17386c5a95d86fe2df2531eae8c7ffbc2f79e9b0deb26aefce000',10,1,'Personal Access Token','[]',0,'2020-12-22 20:28:41','2020-12-22 20:28:41','2021-06-23 03:28:40'),('607f08d4f9569f72f426965e886de16f8d357c90b82e880f215362c0968e153fbbaf870d25171f47',24,5,'Personal Access Token','[]',0,'2020-12-26 01:54:14','2020-12-26 01:54:14','2021-06-26 08:54:14'),('64add006e4c17606a0c4fbfbb96cb8ccdfabcdb1927771ca9d7dfccfb8991dd1edc69d532530d5c9',10,5,'Personal Access Token','[]',0,'2020-12-23 07:30:22','2020-12-23 07:30:22','2021-06-23 14:30:21'),('78f4e32f7927940060c028fafa63ddc4419674b33e0c2b91d652362f90c2cc39355c16b397fca29f',10,5,'Personal Access Token','[]',0,'2020-12-23 08:31:53','2020-12-23 08:31:53','2021-06-23 15:31:53'),('7ff56f1a5d746cbf53130743585a23aa0e5fc6159fc90307932bbd9c570487821ecbec34fffdc6b3',25,5,'Personal Access Token','[]',0,'2020-12-26 01:44:25','2020-12-26 01:44:25','2021-06-26 08:44:25'),('874d0afab0fbfcb80cd27fb86fa3c97076c5d25c701a88715513741560d0858ce0eced0fd8dd87fd',22,5,'Personal Access Token','[]',0,'2020-12-26 01:38:54','2020-12-26 01:38:54','2021-06-26 08:38:54'),('9cbd32fa679e4d9627d2d35044ae88dace90bafd0fe07ff9905a8588797c1f38bf1e1934a4b01f12',22,5,'Personal Access Token','[]',0,'2020-12-25 21:51:13','2020-12-25 21:51:13','2021-06-26 04:51:13'),('9f5c4794545049571303bff579496e19e815d9379098893771f3247cd72e90bf700fbd1d8cdd5c26',10,1,'Personal Access Token','[]',0,'2020-12-22 20:40:02','2020-12-22 20:40:02','2021-06-23 03:40:02'),('aaa5cedf021584aeb51176d52ac2f4dbb2ae64755417f05b519b981f82a61f8c53e7103239f98270',24,5,'Personal Access Token','[]',0,'2020-12-27 00:37:21','2020-12-27 00:37:21','2021-06-27 07:37:21'),('b3dc72ea6c83222be5df97ea840e38987de982ffbc305a7f2848b4316db7d3a1bb6caa54cee02885',25,5,'Personal Access Token','[]',0,'2020-12-26 03:35:37','2020-12-26 03:35:37','2021-06-26 10:35:37'),('be50297be8ee9698e158a7267cb4e6c89747d9e7631592d58dced531d407b29f55932f9e8ec1e5fa',25,5,'Personal Access Token','[]',0,'2020-12-26 20:58:04','2020-12-26 20:58:04','2021-06-27 03:58:04'),('c40caac240d379d75f6a2e267a356bb1ea615c6c1dc9203382d8b45e9937d4a424338849b7eca003',10,1,'Personal Access Token','[]',0,'2020-12-22 20:37:23','2020-12-22 20:37:23','2021-06-23 03:37:23'),('cc361f9b098613148c752a5748d93c42afba3b14a1568df3b76ed35ec99a021ff3446df02792b18d',10,1,'Personal Access Token','[]',0,'2020-12-22 20:49:53','2020-12-22 20:49:53','2021-06-23 03:49:52'),('cf3fb64245ee997f73fa8091172bb9777b8b296fe75b93dbbb1ca9ceba54fff74e3ccad922001014',22,5,'Personal Access Token','[]',0,'2020-12-25 21:51:47','2020-12-25 21:51:47','2021-06-26 04:51:47'),('d91ebe3c4878af0b8e01cbde6a7b23c8ff7fc399071a228bfa5319f913bfa89f9958e914e09c19bf',24,5,'Personal Access Token','[]',0,'2020-12-27 00:32:51','2020-12-27 00:32:51','2021-06-27 07:32:51'),('efff6f9c3b2a94392521e2556f2501a6ddfc663f3b03ab537a5509176815f8be4118eebda8a73dec',25,5,'Personal Access Token','[]',0,'2020-12-26 01:50:11','2020-12-26 01:50:11','2021-06-26 08:50:11'),('f030a805d0e67d19ec8f87e755da91b5472c9ad5c951e2bfc6ae23c4e839ae6f9c0ab2c45a2e6c47',10,5,'Personal Access Token','[]',0,'2020-12-23 06:45:17','2020-12-23 06:45:17','2021-06-23 13:45:17'),('f237922350628f333e0f682db1016b2049f62bd0983eb65d71ce6e6c93a70bc43265eda2c8ce1325',10,1,'Personal Access Token','[]',0,'2020-12-22 20:29:40','2020-12-22 20:29:40','2021-06-23 03:29:40');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES (1,NULL,'Laravel Personal Access Client','h8TQZv9PkwkUCauHs40z63T7Q7Oa6gLaweQ1KtU7',NULL,'http://localhost',1,0,0,'2020-12-22 00:28:09','2020-12-22 00:28:09'),(2,NULL,'Laravel Password Grant Client','WTG510CXfFZsoSjV3tZfeRqdoKQeMyIM9HBPi0CD','users','http://localhost',0,1,0,'2020-12-22 00:28:09','2020-12-22 00:28:09'),(3,NULL,'Laravel Personal Access Client','b7xcpO3CVQnyOC8UjTy6DB6BrGYUB7MAerDO2OS8',NULL,'http://localhost',1,0,0,'2020-12-23 02:42:45','2020-12-23 02:42:45'),(4,NULL,'Laravel Password Grant Client','fNgkB5XT6caFXVZJsmPWSooYU9xSP6SecKWyVwBA','users','http://localhost',0,1,0,'2020-12-23 02:42:45','2020-12-23 02:42:45'),(5,NULL,'Laravel Personal Access Client','fOxpnARFmikIoZSxJZIPRPmgEgpD8VblRrQsrbtl',NULL,'http://localhost',1,0,0,'2020-12-23 02:43:18','2020-12-23 02:43:18'),(6,NULL,'Laravel Password Grant Client','LvyyCeKIH8PQlX6phakuIDqyPgtMzt6QKgnL2l80','users','http://localhost',0,1,0,'2020-12-23 02:43:18','2020-12-23 02:43:18');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` VALUES (1,1,'2020-12-22 00:28:09','2020-12-22 00:28:09'),(2,3,'2020-12-23 02:42:45','2020-12-23 02:42:45'),(3,5,'2020-12-23 02:43:18','2020-12-23 02:43:18');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES (1,'Chau@gmail.com','6mN6ORCB7VPUoBLalBf8AqypGXAuxqKCa3pJXXggeJ8n4fjcDZvlBH0S6IdZ',NULL,'2020-12-23 04:28:55'),(2,'Chau@gmail.com','mWrexYpWlfZhrDs4CcUcn9HhieexFyUtXvEwuqfaqByVoHaP2Omjgwp7ZP9v','2020-12-23 03:51:18',NULL),(3,'vuthaouet@gmail.com','c44featdlICzhfJV3l1yWNdsCKsSEIQwbiuq9yz922jLa1MuY7eeZ8S8VNgO','2020-12-23 04:37:19','2020-12-23 05:01:15');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `money` bigint(20) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_post_id_foreign` (`post_id`),
  CONSTRAINT `payments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `place_arounds`
--

DROP TABLE IF EXISTS `place_arounds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `place_arounds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `place_arounds`
--

LOCK TABLES `place_arounds` WRITE;
/*!40000 ALTER TABLE `place_arounds` DISABLE KEYS */;
INSERT INTO `place_arounds` VALUES (1,''),(2,'Công viên cầu Giấy'),(3,'Đại học Quốc Gia');
/*!40000 ALTER TABLE `place_arounds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `boarding_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `time_display` datetime DEFAULT NULL,
  `status_review` tinyint(4) DEFAULT '0',
  `number_date` bigint(20) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_boarding_id_foreign` (`boarding_id`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_boarding_id_foreign` FOREIGN KEY (`boarding_id`) REFERENCES `boardings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'2020-12-25 22:25:58','2020-12-25 22:25:58',12,'Phòng trọ 1',22,'2020-12-26 05:25:27',0,0,''),(2,'2020-12-25 22:30:07','2020-12-25 22:30:07',13,'Phòng trọ 1',22,'2020-12-26 05:25:27',0,0,''),(3,'2020-12-25 22:39:30','2020-12-25 22:39:30',14,'Phòng trọ 1',22,'2020-12-26 05:25:27',0,0,''),(4,'2020-12-25 22:40:44','2020-12-25 22:40:44',15,'Phòng trọ 1',22,'2020-12-26 05:25:27',0,0,''),(5,'2020-12-25 22:49:08','2020-12-25 22:49:08',20,'Phòng trọ 1',22,'2020-12-26 05:25:27',0,0,''),(6,'2020-12-25 22:50:00','2020-12-25 22:50:00',21,'Phòng trọ 2',22,'2020-12-26 05:25:27',0,0,'');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `reports_post_id_foreign` (`post_id`),
  CONSTRAINT `reports_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports`
--

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin'),(2,'owner'),(3,'renter');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seen_posts`
--

DROP TABLE IF EXISTS `seen_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seen_posts` (
  `post_id` int(10) unsigned NOT NULL,
  `count` bigint(20) NOT NULL DEFAULT '0',
  `time_seen` datetime NOT NULL,
  KEY `seen_posts_post_id_foreign` (`post_id`),
  CONSTRAINT `seen_posts_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seen_posts`
--

LOCK TABLES `seen_posts` WRITE;
/*!40000 ALTER TABLE `seen_posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `seen_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_boardings`
--

DROP TABLE IF EXISTS `type_boardings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_boardings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_boardings`
--

LOCK TABLES `type_boardings` WRITE;
/*!40000 ALTER TABLE `type_boardings` DISABLE KEYS */;
INSERT INTO `type_boardings` VALUES (1,'phòng trọ'),(2,'chung cư mini'),(3,'nhà nguyên căn'),(4,'chung cư nguyên căn'),(5,'chung chủ'),(6,'không chung chủ');
/*!40000 ALTER TABLE `type_boardings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cmnd` char(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_id` int(10) unsigned NOT NULL,
  `phone_number` char(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_address_id_foreign` (`address_id`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'Vu Thanh','Thao','1213242435','vuthao.ak56ht@gmail.com',NULL,'1234',7,'0327360602',NULL,'2020-12-06 07:36:26','2020-12-06 07:36:26',NULL,1),(6,'Vu Thanh','Thao','1213242435','vuthao.ak561ht@gmail.com',NULL,'$2y$10$xZAOIK8jrgVRi.OpAG1bsO8bnJrHbbAvr7ywmjfr8XT7PcHDqueo6',9,'0327360602',NULL,'2020-12-06 07:37:56','2020-12-06 07:37:56',NULL,1),(8,'Vu Thanh','Thao',NULL,'vuthao.ak563ht@gmail.com',NULL,'$2y$10$pwLa4lii48NbScoUVEN9m.IbqZrz0V9sWdsx62ML9yBOPOuWqeMy2',11,'0327360602',NULL,'2020-12-06 07:40:46','2020-12-06 07:40:46',NULL,1),(9,'Vu Thanh','Thao',NULL,'vuthao.ak562ht@gmail.com',NULL,'$2y$10$KvlGnKlQDjYAO2VeiO3HHe2lyqlT..E/nDSuqiWFpTc0ngvfIWpau',12,'0327360602',NULL,'2020-12-06 07:41:20','2020-12-06 07:41:20',NULL,1),(10,'Vu Ngoc','Chau',NULL,'Chau@gmail.com',NULL,'$2y$10$JynrggYZWKCmPGApwR/IdudR883FcncAlRIcP/UPYIEt52mnaJzLq',13,'0327360602',NULL,'2020-12-06 07:57:33','2020-12-23 08:02:34',NULL,1),(11,'Vu Ngoc','Chau',NULL,'Chau1@gmail.com',NULL,'$2y$10$4jmFxkKFwyOKyp3BUJUgBO0X75ghJBSrC3BXKPcBp67hkwNWNywz6',14,'0327360602',NULL,'2020-12-06 07:58:32','2020-12-06 07:58:32',NULL,1),(12,'Vu Ngoc','Chau',NULL,'Chau2@gmail.com',NULL,'$2y$10$D6SpbQvHgHACgeSoQGVjEe5f8anCYR0/hbfaAZc//DNXFLPuQJWIC',15,'0327360602',NULL,'2020-12-06 08:01:43','2020-12-06 08:01:43',NULL,1),(13,'Vu Ngoc','Chau',NULL,'Chautest@gmail.com',NULL,'$2y$10$heYLj.wSVGQoM7GNyFT1CuxC2V4t8ciahQED5AaUjFDXupo0PxRFu',16,'0327360602',NULL,'2020-12-06 08:52:27','2020-12-06 08:52:27',NULL,1),(14,'Vu Ngoc','Chau',NULL,'Chautest2@gmail.com',NULL,'$2y$10$kGX6nkn9ytG0zekvL59ao.HFgi/0XGbawha8SfVc6gSsNp0i7uz2m',17,'0327360602',NULL,'2020-12-06 08:54:01','2020-12-06 08:54:01',NULL,1),(15,'Vu Ngoc','Chau',NULL,'Chautest3@gmail.com',NULL,'$2y$10$e6iERXcMNbd83.g27ysWauyUqVogLWDqT9cXZmLP/i8R70PG4chEa',18,'0327360602',NULL,'2020-12-06 08:54:07','2020-12-06 08:54:07',NULL,1),(16,'Vu Ngoc','Chau',NULL,'Chautest8@gmail.com',NULL,'$2y$10$UQ6cspOWPiTNprj4c5xp7ucXcYhS3EqRtmZcdCgO9/n6hhK2jYjgW',19,'0327360602',NULL,'2020-12-06 08:54:53','2020-12-06 08:54:53',NULL,1),(17,'Vu Thuy','Ha',NULL,'ThuyHa@gmail.com',NULL,'$2y$10$vSGHP87v/TljVu34kvh9GufToc2aujaZnbWMLPZKp76BRqdE22Y02',21,'0327360602',NULL,'2020-12-06 08:59:48','2020-12-06 08:59:48',NULL,1),(18,'Vu Thuy','Ha',NULL,'ThuyHa123@gmail.com',NULL,'$2y$10$.4.GdQ01nEJMLaWA8V1xlOOh.CJO2RdrG4Vy/umGyqJsPkrwyrNHC',22,'0975187959',NULL,'2020-12-22 20:36:35','2020-12-22 20:36:35',NULL,2),(19,'Vu Thuy','Ha',NULL,'ThuyHa123werw@gmail.com',NULL,'$2y$10$uLaaUhdDTsjK7lcNzQjIZedTHrk.2d3gjAIKP0e67cx6bdJK.uXba',23,'0975187959',NULL,'2020-12-23 02:44:07','2020-12-23 02:44:07',NULL,2),(20,'Vu Thuy','Ha',NULL,'ThuyHa123wFFerw@gmail.comH',NULL,'$2y$10$tmgd2hNdn1tDEPNCsw6M3.7G38oW9hIOIhG9qa9o/tfjjy29mIy/m',24,'0975187959',NULL,'2020-12-23 03:47:57','2020-12-23 03:47:57',NULL,2),(21,'Vu Thuy','Ha',NULL,'vuthaouet@gmail.com',NULL,'$2y$10$7d83QaQibWse7xuRu.PSVOHzx5d6MuR6KyGP6ryGQpENX.8rqnv5y',25,'0975187959',NULL,'2020-12-23 04:37:08','2020-12-23 04:37:08',NULL,2),(22,'Vu Thuy','Ha',NULL,'vuthaouet123@gmail.com',NULL,'$2y$10$B4IFANuXA/inAm98En1oHOfNrO1jlBamXNUdtmn09fZLsgDg8u5Qm',26,'0975187959',NULL,'2020-12-23 07:00:07','2020-12-23 07:00:07',NULL,2),(23,'Vu Thuy','Ha',NULL,'vuthaouet123123@gmail.com',NULL,'$2y$10$4L4N9A3BiMRyDJGFFDktZe0BalcSkBKezLkYVN.eqDfnSRCwM9feC',27,'0975187959',NULL,'2020-12-25 18:44:52','2020-12-25 18:44:52',NULL,2),(25,'Admin','Admin',NULL,'admin@gmail.com',NULL,'$2y$10$0sswtEJSzn/7NDIWkk8GguLllgEb6.bpdg395rsBppZd/FyMir9iu',60,'0975187959',NULL,'2020-12-26 01:43:47','2020-12-26 01:43:47',NULL,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visits`
--

DROP TABLE IF EXISTS `visits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `primary_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondary_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` bigint(20) unsigned NOT NULL,
  `list` json DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `visits_primary_key_secondary_key_unique` (`primary_key`,`secondary_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visits`
--

LOCK TABLES `visits` WRITE;
/*!40000 ALTER TABLE `visits` DISABLE KEYS */;
/*!40000 ALTER TABLE `visits` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-28  9:29:49
