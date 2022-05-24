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
('7110f066-daac-11ec-9950-acc8e72d2947','34966de6-d929-11ec-a34d-c947064b6724','Cipta Pratama','1234 5678 1234 4356','09 / 08','123'),
('dfe24f30-dab2-11ec-9950-acc8e72d2947','34966de6-d929-11ec-a34d-c947064b6724','Michael Krisnadhi','1234 5678 1234 5678','02 / 23','121');
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
  `default_shipping_address` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_credit_card` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ID_Member_Email` (`email`),
  KEY `FK_Member_DefaultCreditCard` (`default_credit_card`),
  KEY `FK_Member_DefaultShippingAddress` (`default_shipping_address`),
  CONSTRAINT `FK_Member_DefaultCreditCard` FOREIGN KEY (`default_credit_card`) REFERENCES `credit_card` (`id`) ON DELETE SET NULL,
  CONSTRAINT `FK_Member_DefaultShippingAddress` FOREIGN KEY (`default_shipping_address`) REFERENCES `shipping_address` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES
('34966de6-d929-11ec-a34d-c947064b6724','michaelrk02@localhost.localdomain','34966de6-d929-11ec-a34d-c947064b6724','Michael','Krisnadhi','7a1d9472-dab3-11ec-9950-acc8e72d2947','dfe24f30-dab2-11ec-9950-acc8e72d2947');
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
INSERT INTO `member_cart` VALUES
('34966de6-d929-11ec-a34d-c947064b6724','045e5c35-d99a-11ec-9238-987066b24a59','Glossy','Easy-clear','Sample',1,0),
('34966de6-d929-11ec-a34d-c947064b6724','d88bb3d8-d919-11ec-a34d-c947064b6724','Eggshell','Waterproof','2.5 litre',2,1);
/*!40000 ALTER TABLE `member_cart` ENABLE KEYS */;
UNLOCK TABLES;

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
('628c8958-dab8-11ec-9950-acc8e72d2947','#MO8457','2022-05-23 23:50:00','34966de6-d929-11ec-a34d-c947064b6724',432000,4000,436000,'mixing','2022-06-06'),
('77854f9c-dab8-11ec-9950-acc8e72d2947','#MO1506','2022-05-23 23:50:35','34966de6-d929-11ec-a34d-c947064b6724',432000,4000,436000,'mixing','2022-06-06');
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
('628c8958-dab8-11ec-9950-acc8e72d2947','045e5c35-d99a-11ec-9238-987066b24a59','Glossy','Easy-clear','Sample',1,140000,0,140000),
('628c8958-dab8-11ec-9950-acc8e72d2947','d88bb3d8-d919-11ec-a34d-c947064b6724','Eggshell','Waterproof','2.5 litre',2,136000,20000,292000),
('77854f9c-dab8-11ec-9950-acc8e72d2947','045e5c35-d99a-11ec-9238-987066b24a59','Glossy','Easy-clear','Sample',1,140000,0,140000),
('77854f9c-dab8-11ec-9950-acc8e72d2947','d88bb3d8-d919-11ec-a34d-c947064b6724','Eggshell','Waterproof','2.5 litre',2,136000,20000,292000);
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
  PRIMARY KEY (`order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_credit_card`
--

LOCK TABLES `order_credit_card` WRITE;
/*!40000 ALTER TABLE `order_credit_card` DISABLE KEYS */;
INSERT INTO `order_credit_card` VALUES
('628c8958-dab8-11ec-9950-acc8e72d2947','Michael Krisnadhi','1234 5678 1234 5678','02 / 23','121'),
('77854f9c-dab8-11ec-9950-acc8e72d2947','Michael Krisnadhi','1234 5678 1234 5678','02 / 23','121');
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
  PRIMARY KEY (`order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_shipping_address`
--

LOCK TABLES `order_shipping_address` WRITE;
/*!40000 ALTER TABLE `order_shipping_address` DISABLE KEYS */;
INSERT INTO `order_shipping_address` VALUES
('628c8958-dab8-11ec-9950-acc8e72d2947','Kampus ITB','Michael','Krisnadhi','Jl. Ganesha no. 10','Bandung','Jawa Barat',57554,'Indonesia','0895343845423','michaelkrisnadhi@gmail.com'),
('77854f9c-dab8-11ec-9950-acc8e72d2947','Kampus ITB','Michael','Krisnadhi','Jl. Ganesha no. 10','Bandung','Jawa Barat',57554,'Indonesia','0895343845423','michaelkrisnadhi@gmail.com');
/*!40000 ALTER TABLE `order_shipping_address` ENABLE KEYS */;
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
('045e5c35-d99a-11ec-9238-987066b24a59','#5673-WL-04M','Duck Egg Lime',140000,'Peaceful colors',5,100),
('d88bb3d8-d919-11ec-a34d-c947064b6724','#5672-WL-04M','Duck Egg Blue',136000,'Abolute matt emulsion. Water-based for interior use',4.9,120);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_address`
--

DROP TABLE IF EXISTS `shipping_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shipping_address` (
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
  KEY `FK_ShippingAddress_Member` (`member`),
  CONSTRAINT `FK_ShippingAddress_Member` FOREIGN KEY (`member`) REFERENCES `member` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_address`
--

LOCK TABLES `shipping_address` WRITE;
/*!40000 ALTER TABLE `shipping_address` DISABLE KEYS */;
INSERT INTO `shipping_address` VALUES
('499b82db-da8e-11ec-9950-acc8e72d2947','34966de6-d929-11ec-a34d-c947064b6724','Kampus ITS','Cipta','Pratama','Jl. Teknik Kimia, Keputih, Kec. Sukolilo','Surabaya','Jawa Timur',60111,'Indonesia','0818-2311-4488','cipta.design@gmail.com'),
('7a1d9472-dab3-11ec-9950-acc8e72d2947','34966de6-d929-11ec-a34d-c947064b6724','Kampus ITB','Michael','Krisnadhi','Jl. Ganesha no. 10','Bandung','Jawa Barat',57554,'Indonesia','0895343845423','michaelkrisnadhi@gmail.com');
/*!40000 ALTER TABLE `shipping_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'nalani'
--

--
-- Dumping routines for database 'nalani'
--

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
/*!50001 VIEW `member_cart_subtotal` AS select `mc`.`member` AS `id`,sum(`mc`.`quantity` * `p`.`price` + case when `mc`.`uses_painter_service` then 20000 else 0 end) AS `subtotal` from (`member_cart` `mc` join `product` `p` on(`p`.`id` = `mc`.`product`)) group by `mc`.`member` */;
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

-- Dump completed on 2022-05-24 22:58:37
