/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.20-13.0.2-MariaDB, for osx10.20 (arm64)
--
-- Host: localhost    Database: trgovina
-- ------------------------------------------------------
-- Server version	13.0.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `kodovi`
--

DROP TABLE IF EXISTS `kodovi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `kodovi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `korisnik` int(11) DEFAULT NULL,
  `kod` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `korisnik` (`korisnik`),
  CONSTRAINT `kodovi_ibfk_1` FOREIGN KEY (`korisnik`) REFERENCES `korisnik` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kodovi`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `kodovi` WRITE;
/*!40000 ALTER TABLE `kodovi` DISABLE KEYS */;
INSERT INTO `kodovi` VALUES
(47,88,956722);
/*!40000 ALTER TABLE `kodovi` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(20) DEFAULT NULL,
  `prezime` varchar(20) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `lozinka` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `adresa` varchar(30) DEFAULT NULL,
  `broj_telefona` varchar(15) DEFAULT NULL,
  `verifikovan` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `korisnik`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `korisnik` WRITE;
/*!40000 ALTER TABLE `korisnik` DISABLE KEYS */;
INSERT INTO `korisnik` VALUES
(56,'Admin','Admin','admin@aotocomputers.com','admin','admin','nigdje','062-333-333',1),

/*!40000 ALTER TABLE `korisnik` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `korpa`
--

DROP TABLE IF EXISTS `korpa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `korpa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `korisnik` int(11) DEFAULT NULL,
  `proizvod` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `korisnik` (`korisnik`),
  KEY `proizvod` (`proizvod`),
  CONSTRAINT `korpa_ibfk_1` FOREIGN KEY (`korisnik`) REFERENCES `korisnik` (`id`),
  CONSTRAINT `korpa_ibfk_2` FOREIGN KEY (`proizvod`) REFERENCES `proizvod` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `korpa`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `korpa` WRITE;
/*!40000 ALTER TABLE `korpa` DISABLE KEYS */;
INSERT INTO `korpa` VALUES
(169,56,184),
(170,56,184);
/*!40000 ALTER TABLE `korpa` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `poredjenje`
--

DROP TABLE IF EXISTS `poredjenje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `poredjenje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proizvod` int(11) DEFAULT NULL,
  `korisnik` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `proizvod` (`proizvod`),
  KEY `korisnik` (`korisnik`),
  CONSTRAINT `poredjenje_ibfk_1` FOREIGN KEY (`proizvod`) REFERENCES `proizvod` (`id`),
  CONSTRAINT `poredjenje_ibfk_2` FOREIGN KEY (`korisnik`) REFERENCES `korisnik` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poredjenje`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `poredjenje` WRITE;
/*!40000 ALTER TABLE `poredjenje` DISABLE KEYS */;
INSERT INTO `poredjenje` VALUES
(63,188,56);
/*!40000 ALTER TABLE `poredjenje` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `poredjenje2`
--

DROP TABLE IF EXISTS `poredjenje2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `poredjenje2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proizvod` int(11) DEFAULT NULL,
  `korisnik` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `proizvod` (`proizvod`),
  KEY `korisnik` (`korisnik`),
  CONSTRAINT `poredjenje2_ibfk_1` FOREIGN KEY (`proizvod`) REFERENCES `proizvod` (`id`),
  CONSTRAINT `poredjenje2_ibfk_2` FOREIGN KEY (`korisnik`) REFERENCES `korisnik` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poredjenje2`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `poredjenje2` WRITE;
/*!40000 ALTER TABLE `poredjenje2` DISABLE KEYS */;
INSERT INTO `poredjenje2` VALUES
(110,189,56);
/*!40000 ALTER TABLE `poredjenje2` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `prodaja`
--

DROP TABLE IF EXISTS `prodaja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `prodaja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `korisnik` int(11) DEFAULT NULL,
  `proizvod` int(11) DEFAULT NULL,
  `potvrdjena` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `korisnik` (`korisnik`),
  KEY `proizvod` (`proizvod`),
  CONSTRAINT `prodaja_ibfk_1` FOREIGN KEY (`korisnik`) REFERENCES `korisnik` (`id`),
  CONSTRAINT `prodaja_ibfk_2` FOREIGN KEY (`proizvod`) REFERENCES `proizvod` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodaja`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `prodaja` WRITE;
/*!40000 ALTER TABLE `prodaja` DISABLE KEYS */;
INSERT INTO `prodaja` VALUES
(143,87,189,0),
(144,87,183,0),
(145,87,187,0),
(146,87,188,0),
(147,87,183,0),
(148,87,188,0),
(149,87,188,0),
(150,87,188,0),
(151,87,189,0),
(152,87,187,0);
/*!40000 ALTER TABLE `prodaja` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `proizvod`
--

DROP TABLE IF EXISTS `proizvod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `proizvod` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(30) DEFAULT NULL,
  `cijena` int(11) DEFAULT NULL,
  `opis` varchar(300) DEFAULT NULL,
  `vrsta` varchar(30) DEFAULT NULL,
  `slika` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=190 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proizvod`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `proizvod` WRITE;
/*!40000 ALTER TABLE `proizvod` DISABLE KEYS */;
INSERT INTO `proizvod` VALUES
(176,'Ryzen 7 3700x',807,'Ryzen,8 jezgara,16 threads, 4.4 GHz, Wraith Prism Cooler','procesor','5fa831ed162093.04690552.jpg'),
(177,'Ryzen 9 3700x',1223,'Ryzen,12 jezgara, 24 threads, 4.6 GHz, Wraith Prism Cooler','procesor','5fa8326593fca3.54456906.jpg'),
(178,'Ryzen 5 3500x',410,'Ryzen, 6 jezgara, 6 threads, 3.6/4.1 GHz Boost, Wraith Stealth cooler','procesor','5fa832e0f3d3f4.48318689.jpg'),
(179,'GTX 1050 TI',342,'NVIDIA, 4GB GDDR5, DVI/HDMI/DP, PCIe','graficka','5fa83370e9f0d5.74427695.jpg'),
(180,'GTX 1050 TI',398,'NVIDIA, 4GB GDDR5, DVI/HDMI/DP, PCIe','graficka','5fa833ecd5f026.52909528.jpg'),
(181,'RTX 2070 SUPER',1474,'NVIDIA, 8GB GDDR5, HDMI/3x DP, PCIe','graficka','5fa834465faae2.06438173.jpg'),
(182,'AOC Gaming 24G2U',389,'AOC,23.8“, 16:9, 1920×1080, 144Hz, VGA/2xHDMI/DP, 4 x USB 3.0/Speakers/Tilt/Swivel/VESA/Frameless','monitor','5fa8353eeec771.01916162.jpg'),
(183,'AOC C24G1',409,'AOC,24“, 16:9, 1920×1080, 144Hz,VGA/ 2xHDMI/DP, Audio OUT/Swivel/Tilt/H. Adjust/Ergonomic/Borderless','monitor','5fa835b9962719.59431890.jpg'),
(184,'ASUS ROG GLADIUS II',159,'ASUS, 16000 dpi,RGB, crna, Bluetooth, ergonomičan, 5 dugmadi','mis','5fa836f021b735.56784310.jpg'),
(185,'HyperX Pulsefire Core',98,'Hyper X,3200dpi,non RGB, crna, kabal, simetričan,7 dugmadi','mis','5fa8385a48d918.95473494.jpg'),
(186,'MS THUNDER PRO',68,'MS,80%,87 tipki,RGB,Mehanička,kabal','tastatura','5fa9768ba2e927.91674247.jpg'),
(187,'LOGITECH K270',75,'Logitech,100%,112 tipki,non RGB,Membrane,Wireless,','tastatura','5fa977561ca013.56213557.jpg'),
(188,'Dell Vostro 3671',814,'Core i3 9100, Asus MB A88XM, GTX 1070, 16 GB DDR4, 500 GB HDD/150 GB SSD, Dell Vostro, Cheftech a80','racunar','5fa97a7f015e65.44863767.jpg'),
(189,'Dell Vostro 3671',2000,'Core i5 9100, Asus MB A88XM, RTX 2080, 32 GB DDR4, 1TB HDD/150 GB SSD, Dell Vostro, Cheftech a80','racunar','5fa97af74974f8.17483324.jpg');
/*!40000 ALTER TABLE `proizvod` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2026-10-22 16:26:33
