-- MariaDB dump 10.19  Distrib 10.7.3-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: nalani
-- ------------------------------------------------------
-- Server version	10.7.3-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `credit_card`
--

DROP TABLE IF EXISTS `credit_card`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `credit_card` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_on_card` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_number` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_date` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cvv` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_CreditCard_Member` (`member`),
  CONSTRAINT `FK_CreditCard_Member` FOREIGN KEY (`member`) REFERENCES `member` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credit_card`
--

LOCK TABLES `credit_card` WRITE;
/*!40000 ALTER TABLE `credit_card` DISABLE KEYS */;
INSERT INTO `credit_card` VALUES
('dfe24f30-dab2-11ec-9950-acc8e72d2947','34966de6-d929-11ec-a34d-c947064b6724','Sonny','1234 5678 1234 5678','02 / 25','121');
/*!40000 ALTER TABLE `credit_card` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(254) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` char(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_credit_card` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ID_Member_Email` (`email`),
  KEY `FK_Member_DefaultCreditCard` (`default_credit_card`),
  CONSTRAINT `FK_Member_DefaultCreditCard` FOREIGN KEY (`default_credit_card`) REFERENCES `credit_card` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES
('34966de6-d929-11ec-a34d-c947064b6724','michaelrk02@localhost.localdomain','34966de6-d929-11ec-a34d-c947064b6724','Sonny','Fadli','dfe24f30-dab2-11ec-9950-acc8e72d2947');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_cart`
--

DROP TABLE IF EXISTS `member_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member_cart` (
  `member` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finish` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `uses_painter_service` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`member`,`product`),
  KEY `FK_MemberCart_Product` (`product`),
  CONSTRAINT `FK_MemberCart_Member` FOREIGN KEY (`member`) REFERENCES `member` (`id`),
  CONSTRAINT `FK_MemberCart_Product` FOREIGN KEY (`product`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_cart`
--

LOCK TABLES `member_cart` WRITE;
/*!40000 ALTER TABLE `member_cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `member_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `member_cart_additive`
--

DROP TABLE IF EXISTS `member_cart_additive`;
/*!50001 DROP VIEW IF EXISTS `member_cart_additive`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `member_cart_additive` (
  `member` tinyint NOT NULL,
  `product` tinyint NOT NULL,
  `additive` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `member_cart_subtotal`
--

DROP TABLE IF EXISTS `member_cart_subtotal`;
/*!50001 DROP VIEW IF EXISTS `member_cart_subtotal`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `member_cart_subtotal` (
  `id` tinyint NOT NULL,
  `subtotal` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` char(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placed_at` datetime DEFAULT NULL,
  `member` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `shipping_fee` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `tracking_status` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimate_delivery` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ID_Order_Code` (`code`),
  KEY `FK_Order_Member` (`member`),
  CONSTRAINT `FK_Order_Member` FOREIGN KEY (`member`) REFERENCES `member` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES
('2ceafc7a-df34-11ec-b6bc-013b250ac1ad','#MO9157','2022-05-29 16:46:12','34966de6-d929-11ec-a34d-c947064b6724',270000,20000,290000,'mixing','2022-06-12'),
('62bcc4b8-dceb-11ec-a568-cab991d2ebb3','#MO6059','2022-05-26 19:00:09','34966de6-d929-11ec-a34d-c947064b6724',500000,4000,504000,'mixing','2022-06-09'),
('652f7129-df34-11ec-b6bc-013b250ac1ad','#MO8109','2022-05-29 16:47:47','34966de6-d929-11ec-a34d-c947064b6724',1145000,0,1145000,'mixing','2022-06-12'),
('a20fef65-dc2a-11ec-9800-a8b8a0f90118','#MO7096','2022-05-25 20:00:20','34966de6-d929-11ec-a34d-c947064b6724',888000,4000,892000,'mixing','2022-06-08');
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_cart`
--

DROP TABLE IF EXISTS `order_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_cart` (
  `order` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finish` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` int(11) DEFAULT NULL,
  `painter_service_fee` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`order`,`product`),
  KEY `FK_OrderCart_Product` (`product`),
  CONSTRAINT `FK_OrderCart_Order` FOREIGN KEY (`order`) REFERENCES `order` (`id`),
  CONSTRAINT `FK_OrderCart_Product` FOREIGN KEY (`product`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_cart`
--

LOCK TABLES `order_cart` WRITE;
/*!40000 ALTER TABLE `order_cart` DISABLE KEYS */;
INSERT INTO `order_cart` VALUES
('2ceafc7a-df34-11ec-b6bc-013b250ac1ad','2c4ba2ab-26e2-490d-9670-93450bdce590','Glossy','Waterproof','2.5 litre',2,125000,20000,270000),
('62bcc4b8-dceb-11ec-a568-cab991d2ebb3','045e5c35-d99a-11ec-9238-987066b24a59','Matt','Waterproof','2.5 litre',1,150000,0,150000),
('62bcc4b8-dceb-11ec-a568-cab991d2ebb3','880c1b4a-e699-4515-a1e9-a18658bba212','Glossy','Easy-clear','10 litre',1,350000,0,350000),
('652f7129-df34-11ec-b6bc-013b250ac1ad','d88bb3d8-d919-11ec-a34d-c947064b6724','Eggshell','Waterproof','10 litre',3,375000,20000,1145000),
('a20fef65-dc2a-11ec-9800-a8b8a0f90118','045e5c35-d99a-11ec-9238-987066b24a59','Glossy','Easy-clear','10 litre',1,440000,20000,460000),
('a20fef65-dc2a-11ec-9800-a8b8a0f90118','d88bb3d8-d919-11ec-a34d-c947064b6724','Eggshell','Standard','2.5 litre',3,136000,20000,428000);
/*!40000 ALTER TABLE `order_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_credit_card`
--

DROP TABLE IF EXISTS `order_credit_card`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_credit_card` (
  `order` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_on_card` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_number` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_date` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cvv` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`order`),
  CONSTRAINT `FK_OrderCreditCard_Order` FOREIGN KEY (`order`) REFERENCES `order` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_credit_card`
--

LOCK TABLES `order_credit_card` WRITE;
/*!40000 ALTER TABLE `order_credit_card` DISABLE KEYS */;
INSERT INTO `order_credit_card` VALUES
('2ceafc7a-df34-11ec-b6bc-013b250ac1ad','Sonny','1234 5678 1234 5678','02 / 25','121'),
('62bcc4b8-dceb-11ec-a568-cab991d2ebb3','Sonny','1234 5678 1234 5678','02 / 25','121'),
('652f7129-df34-11ec-b6bc-013b250ac1ad','Sonny','1234 5678 1234 5678','02 / 25','121'),
('a20fef65-dc2a-11ec-9800-a8b8a0f90118','Cipta','1234 5678 1234 5678','02 / 23','121');
/*!40000 ALTER TABLE `order_credit_card` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_shipping_address`
--

DROP TABLE IF EXISTS `order_shipping_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_shipping_address` (
  `order` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`order`),
  CONSTRAINT `FK_OrderShippingAddress_Order` FOREIGN KEY (`order`) REFERENCES `order` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_shipping_address`
--

LOCK TABLES `order_shipping_address` WRITE;
/*!40000 ALTER TABLE `order_shipping_address` DISABLE KEYS */;
INSERT INTO `order_shipping_address` VALUES
('2ceafc7a-df34-11ec-b6bc-013b250ac1ad','home'),
('62bcc4b8-dceb-11ec-a568-cab991d2ebb3','home'),
('652f7129-df34-11ec-b6bc-013b250ac1ad','point'),
('a20fef65-dc2a-11ec-9800-a8b8a0f90118','home');
/*!40000 ALTER TABLE `order_shipping_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_shipping_address_home`
--

DROP TABLE IF EXISTS `order_shipping_address_home`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_shipping_address_home` (
  `order` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_name` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` int(11) DEFAULT NULL,
  `country` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(254) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`order`),
  CONSTRAINT `FK_OrderShippingAddressHome_Order` FOREIGN KEY (`order`) REFERENCES `order_shipping_address` (`order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_shipping_address_home`
--

LOCK TABLES `order_shipping_address_home` WRITE;
/*!40000 ALTER TABLE `order_shipping_address_home` DISABLE KEYS */;
INSERT INTO `order_shipping_address_home` VALUES
('2ceafc7a-df34-11ec-b6bc-013b250ac1ad','Kampus ITS Cokroaminoto','Herwin','Priyandono','Jl. Cokroaminoto','Surabaya','Jawa Timur',61200,'Indonesia','081290999878','herwin.priyandono@gmail.com'),
('62bcc4b8-dceb-11ec-a568-cab991d2ebb3','Kampus ITS','Cipta','Pratama','Jl. Teknik Kimia, Keputih, Kec. Sukolilo','Surabaya','Jawa Timur',60111,'Indonesia','0818-2311-4488','cipta.design@gmail.com'),
('a20fef65-dc2a-11ec-9800-a8b8a0f90118','Kampus ITS Cokroaminoto','Herwin','Priyandono','Jl. Cokroaminoto','Surabaya','Jawa Timur',61200,'Indonesia','081290999878','herwin.priyandono@gmail.com');
/*!40000 ALTER TABLE `order_shipping_address_home` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `order_shipping_address_place`
--

DROP TABLE IF EXISTS `order_shipping_address_place`;
/*!50001 DROP VIEW IF EXISTS `order_shipping_address_place`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `order_shipping_address_place` (
  `order` tinyint NOT NULL,
  `type` tinyint NOT NULL,
  `place_name` tinyint NOT NULL,
  `place_address` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `order_shipping_address_point`
--

DROP TABLE IF EXISTS `order_shipping_address_point`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_shipping_address_point` (
  `order` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_location` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`order`),
  CONSTRAINT `FK_OrderShippingAddressPoint_Order` FOREIGN KEY (`order`) REFERENCES `order_shipping_address` (`order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_shipping_address_point`
--

LOCK TABLES `order_shipping_address_point` WRITE;
/*!40000 ALTER TABLE `order_shipping_address_point` DISABLE KEYS */;
INSERT INTO `order_shipping_address_point` VALUES
('652f7129-df34-11ec-b6bc-013b250ac1ad','Pickup Point Depo Surabaya','Jawa Timur, Indonesia');
/*!40000 ALTER TABLE `order_shipping_address_point` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_score` double DEFAULT NULL,
  `review_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `FK_Product_Code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES
('045e5c35-d99a-11ec-9238-987066b24a59','#5673-WL-04M','Cactus Green',100000,'Peaceful colors',5,100),
('2c4ba2ab-26e2-490d-9670-93450bdce590','#7366-TL-04M','Teal',50000,'Teal',5,100),
('55ef9773-0a42-4018-a739-0e29793549e0','#7366-WH-04M','White',50000,'Pure White',5,100),
('880c1b4a-e699-4515-a1e9-a18658bba212','#7366-BL-04M','Blue',50000,'Ocean Blue',5,100),
('cceb455d-e98c-4925-8821-ed4149bb0875','#7366-GR-04M','Grey',50000,'Grey',5,100),
('d88bb3d8-d919-11ec-a34d-c947064b6724','#5672-WL-04M','Duck Egg Blue',150000,'Abolute matt emulsion. Water-based for interior use',4.9,120);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_address_home`
--

DROP TABLE IF EXISTS `shipping_address_home`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shipping_address_home` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_name` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` int(11) DEFAULT NULL,
  `country` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(254) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ShippingAddressHome_Member` (`member`),
  CONSTRAINT `FK_ShippingAddressHome_Member` FOREIGN KEY (`member`) REFERENCES `member` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_address_home`
--

LOCK TABLES `shipping_address_home` WRITE;
/*!40000 ALTER TABLE `shipping_address_home` DISABLE KEYS */;
INSERT INTO `shipping_address_home` VALUES
('499b82db-da8e-11ec-9950-acc8e72d2947','34966de6-d929-11ec-a34d-c947064b6724','Kampus ITS','Cipta','Pratama','Jl. Teknik Kimia, Keputih, Kec. Sukolilo','Surabaya','Jawa Timur',60111,'Indonesia','0818-2311-4488','cipta.design@gmail.com'),
('7a1d9472-dab3-11ec-9950-acc8e72d2947','34966de6-d929-11ec-a34d-c947064b6724','Kampus ITS Cokroaminoto','Herwin','Priyandono','Jl. Cokroaminoto','Surabaya','Jawa Timur',61200,'Indonesia','081290999878','herwin.priyandono@gmail.com');
/*!40000 ALTER TABLE `shipping_address_home` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_address_point`
--

DROP TABLE IF EXISTS `shipping_address_point`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shipping_address_point` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_location` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_address_point`
--

LOCK TABLES `shipping_address_point` WRITE;
/*!40000 ALTER TABLE `shipping_address_point` DISABLE KEYS */;
INSERT INTO `shipping_address_point` VALUES
('6bbf7b84-df1f-11ec-b6bc-013b250ac1ad','Pickup Point Depo Surabaya','Jawa Timur, Indonesia'),
('7f7269ec-df1f-11ec-b6bc-013b250ac1ad','Pickup Point Depo Bandung','Jawa Barat, Indonesia'),
('a0a0df53-df1f-11ec-b6bc-013b250ac1ad','Pickup Point Depo Jakarta','DKI Jakarta, Indonesia');
/*!40000 ALTER TABLE `shipping_address_point` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'nalani'
--

--
-- Dumping routines for database 'nalani'
--

--
-- Final view structure for view `member_cart_additive`
--

/*!50001 DROP TABLE IF EXISTS `member_cart_additive`*/;
/*!50001 DROP VIEW IF EXISTS `member_cart_additive`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013  SQL SECURITY DEFINER */
/*!50001 VIEW `member_cart_additive` AS select `mc`.`member` AS `member`,`mc`.`product` AS `product`,case when `mc`.`finish` = 'Matt' then 25000 when `mc`.`finish` = 'Glossy' then 50000 else 0 end + case when `mc`.`property` = 'Waterproof' then 25000 when `mc`.`property` = 'Easy-clear' then 50000 else 0 end + case when `mc`.`size` = '5 litre' then 100000 when `mc`.`size` = '10 litre' then 200000 else 0 end AS `additive` from (`member_cart` `mc` join `product` `p` on(`p`.`id` = `mc`.`product`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `member_cart_subtotal`
--

/*!50001 DROP TABLE IF EXISTS `member_cart_subtotal`*/;
/*!50001 DROP VIEW IF EXISTS `member_cart_subtotal`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013  SQL SECURITY DEFINER */
/*!50001 VIEW `member_cart_subtotal` AS select `mc`.`member` AS `id`,sum(`mc`.`quantity` * (`p`.`price` + `mca`.`additive`) + case when `mc`.`uses_painter_service` then 20000 else 0 end) AS `subtotal` from ((`member_cart` `mc` join `member_cart_additive` `mca` on(`mc`.`member` = `mca`.`member` and `mc`.`product` = `mca`.`product`)) join `product` `p` on(`p`.`id` = `mc`.`product`)) group by `mc`.`member` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `order_shipping_address_place`
--

/*!50001 DROP TABLE IF EXISTS `order_shipping_address_place`*/;
/*!50001 DROP VIEW IF EXISTS `order_shipping_address_place`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013  SQL SECURITY DEFINER */
/*!50001 VIEW `order_shipping_address_place` AS select `osa`.`order` AS `order`,`osa`.`type` AS `type`,case when `osa`.`type` = 'home' then `osah`.`place_name` when `osa`.`type` = 'point' then `osap`.`pickup_location` end AS `place_name`,case when `osa`.`type` = 'home' then concat(`osah`.`city`,', ',`osah`.`province`,' ',`osah`.`postal_code`,', ',`osah`.`country`) when `osa`.`type` = 'point' then `osap`.`address` end AS `place_address` from ((`order_shipping_address` `osa` left join `order_shipping_address_home` `osah` on(`osah`.`order` = `osa`.`order`)) left join `order_shipping_address_point` `osap` on(`osap`.`order` = `osa`.`order`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-30 14:56:25
