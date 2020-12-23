-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: piano_shop
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `admin_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(130) NOT NULL,
  `password` varchar(130) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'pianoadmin','$2y$10$9iWxre3.4ZF8kckXvEvTOulDvfSHy/qObfm18JW4yKdaHgESUoPBa');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brands` (
  `brand_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'bösendorfer'),(2,'kawai'),(3,'bechstein'),(4,'steinway'),(5,'yamaha'),(6,'fazioli');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pianos`
--

DROP TABLE IF EXISTS `pianos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pianos` (
  `piano_id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(25) CHARACTER SET utf8 NOT NULL,
  `name` varchar(75) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `in_stock` tinyint(1) NOT NULL DEFAULT 0,
  `brand_id` tinyint(4) DEFAULT NULL,
  `type_id` tinyint(4) DEFAULT NULL,
  `img_url` varchar(100) NOT NULL,
  `video_url` varchar(100) NOT NULL,
  PRIMARY KEY (`piano_id`),
  KEY `brand_id` (`brand_id`),
  KEY `type_id` (`type_id`),
  CONSTRAINT `pianos_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE CASCADE,
  CONSTRAINT `pianos_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `types` (`type_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pianos`
--

LOCK TABLES `pianos` WRITE;
/*!40000 ALTER TABLE `pianos` DISABLE KEYS */;
INSERT INTO `pianos` VALUES (25,'D-282','C. Bechstein Concert',' The C. Bechstein D 282 concert grand piano is a top-class instrument. Thanks to its stupendous and beautiful sound, it’s the ideal grand for large concert halls.\n              The C. Bechstein engineers and master piano-makers developed the D 282 model after intensive discussions with international star pianists. This legendary instrument has set new standards with its transparent voice and unparalleled richness of tonal colors. The C. Bechstein D 282 concert grand piano embodies the synthesis of the brand’s legend and the demands of today’s pianists for power and dynamism.\nInternational star pianists confirm the outstanding characteristics of the C. Bechstein D 282 concert grand piano: surprisingly powerful sound, elegant and high-precision action. ',1,3,2,'img/CBD282.jpg','https://video.com'),(26,'Concert 8','C. Bechstein Concert 8','C. Bechstein Concert 8: an unsurpassed professional piano, in keeping with all the C. Bechstein instruments favored since more than 160 years for their unique sound, touch and durability.\nThe C. Bechstein Concert 8 professional piano is a non plus ultra upright that clearly surpasses many run-of-the-mill grands. Its acoustic assembly, sound volume and colored voice, as well as its precise and highly responsive action, surprise even the most demanding musicians who are used to the touch and sound volume of grand pianos. ',1,3,1,'img/Concert8.jpg','https://video.com'),(27,'Grand 290','Concert Grand 290 Imperial','        The Italian composer, conductor and pianist Ferruccio Busoni meticulously transcribes the famous organ works of J.S. Bach. He soon realises that he requires additional bass notes in order to do Bach’s masterpieces and the immersive sound of 16 to 32 feet bass pipes found in an organ justice. Ludwig Bösendorfer is ready to take on the challenge and builds the first prototype having full 8 octaves in tonal range. Not only Busoni starts to appreciate the exceptional qualities of the – later coined – Imperial Concert Grand: Bartók, Debussy and Ravel compose further works to exploit the tremendous resonance of this very instrument. These oeuvres can only played and interpreted as they were meant to on this Concert Grand. Evoking an extraordinary sound – sonorous and rich in expression and resonance – the timbre of the Imperial Grand seems to be orchestral. The additional deeper bass notes resonate with every key you strike and the massive soundboard supports the projection of any frequency. Ludwig Bösendorfer’s Imperial still to this day represents the precious heritage of the Bösendorfer piano manufactory. Impressive in sound, imposing in appearance.       ',1,1,2,'img/grand-290.webp','https://video.com'),(28,'Upright 130','Grand Upright 130','        The Bösendorfer 130 is indeed physically an upright piano, yet, surprises with subtle nuances and the powerful bass of a grand piano. We have transferred refined craftsmanship and our sound philosophy in an upright form to this instrument. The precise action offers freedom in articulation and play with maximum controllability. The grand sound of this upright is by no means a surprise since the very Bösendorfer Artisans building our Concert Grands design and craft the Bösendorfer Grand Upright 130, nearly two centuries of sound crafting experience.       ',1,1,1,'img/Grand-Upright-130-header.jpg','https://video.com'),(29,'F156','Fazioli F156','        The smallest model of the FAZIOLI collection. Despite its small size, this piano has a remarkably powerful and clear sound. Suitable for smaller settings where the player does not wish to renounce to the sound and action of a high-quality grand piano.       ',1,6,2,'img/piano-f156-nero.jpg','https://video.com'),(30,'F308','Fazioli F308','        Concert grand. The absolute “jewel in the crown” designed for modern large-capacity concert halls and very big spaces.it has immense power and extraordinary harmonic richness, owing to the increased string length in the bass section. It is endowed with a fourth pedal invented by Fazioli. Located to the left of the three traditional pedals, it reduces the hammer-blow distance THUS reducing the volume without modifying the timbre, at the same time facilitating the performance of glissandos, pianissimos, rapid passages and legatos.       ',1,6,2,'img/piano-f308-nero.jpg','https://video.com'),(31,'Model D','Concert Grand','        At 274 cm in length, this majestic musical instrument - the pinnacle of concert grands - is the overwhelming choice of the world\'s greatest pianists and for anyone who demands the highest level of musical expression.       ',1,4,2,'img/concert_grand.jpg','https://video.com'),(32,'Model K','Traditional K-52','        Introduced in 1903, this piano features a larger soundboard than many grands, for a more resonant voice. The choice for professional players seeking an upright instrument — and perfect for all sizes of homes and apartments.       ',1,4,1,'img/k-52.jpg','https://video.com'),(33,'GX-7','Kawai GX-7','        At the lofty pinnacle of the GX series, the regal GX-7 speaks with the transcendent character and authority that has made it the definitive choice of the consummate professional.       ',1,2,2,'img/kawaigx7.jpg','https://video.com'),(34,'K-700','Kawai K-700','        The K-700 offers quality tone and expression, boasting Kawai\'s traditional grand-style exterior design. The unsurpassed value will meet the demand of those who wish for a grand piano but have no space.       ',1,2,1,'img/K-700_top_pc2.jpg','https://video.com'),(35,'GB1K','Yamaha GB1K','        The GB1K, Yamaha\'s most compact and affordable grand, is a popular choice for locations where space is somewhat limited, with full resonant tone comparable to that of many substantially larger models.\r\nUnparalleled in their beauty and musical range, grand pianos are the ultimate expression of the piano maker\'s art. Embodying over 100 years of accumulated expertise, these instruments epitomize the quality, performance and value for which Yamaha has long been renowned, as we enter the second century of Yamaha grand pianos.       ',1,5,2,'img/GB1K-1-PolishedEbony-piano.jpg','https://video.com'),(36,'U1','Yamaha U1','        Designed for the experienced pianist and professional musician, Yamaha U1 upright pianos are made in Japan and feature outstanding tone, touch and durability. A perennial favorite among discerning pianists, U1 upright pianos offer outstanding musical performance, setting the standards by which many other upright pianos are measured.       ',1,5,1,'img/U1-1-c6f7e2c3.jpg','https://video.com'),(38,'michi','miau','        This piano is ...       ',1,3,2,'img/1608603114.png',''),(39,'yamaja3','yamaja3','                hola pianos, Bonjour!              ',1,5,2,'img/1608603660.svg','');
/*!40000 ALTER TABLE `pianos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `types` (
  `type_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types`
--

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` VALUES (1,'upright'),(2,'grand piano'),(3,'upright'),(4,'grand piano');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-21 22:03:33
