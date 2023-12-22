-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: invent_db
-- ------------------------------------------------------
-- Server version	8.0.17

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
-- Table structure for table `account_tb`
--

DROP TABLE IF EXISTS `account_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_tb` (
  `Acc_ID` varchar(20) NOT NULL,
  `Acc_Name` varchar(45) DEFAULT NULL,
  `Acc_User` varchar(45) DEFAULT NULL,
  `Acc_Password` varchar(45) DEFAULT NULL,
  `Acc_Status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Acc_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_tb`
--

LOCK TABLES `account_tb` WRITE;
/*!40000 ALTER TABLE `account_tb` DISABLE KEYS */;
INSERT INTO `account_tb` VALUES ('Acc-001','Admin-System','Admin','b9b3786a1084cae5c1ee67d31835b99f0e73fe1e','Admin'),('Acc-002','ปรัชญา คำกุณา','U001','b9b3786a1084cae5c1ee67d31835b99f0e73fe1e','User'),('Acc-003','อนุชา จำปาเทศ','U002','f1d12b8c8e3b539053ee04b3687d9a475a5f1d07','User');
/*!40000 ALTER TABLE `account_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brand_tb`
--

DROP TABLE IF EXISTS `brand_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brand_tb` (
  `Brand_ID` varchar(45) NOT NULL,
  `Brand_Name` varchar(45) DEFAULT NULL,
  `Brand_Logo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`Brand_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand_tb`
--

LOCK TABLES `brand_tb` WRITE;
/*!40000 ALTER TABLE `brand_tb` DISABLE KEYS */;
INSERT INTO `brand_tb` VALUES ('Brn-001','Dell','BrandIcon/Dell.png'),('Brn-002','HP','BrandIcon/HP.png'),('Brn-003','Lenovo','BrandIcon/Lenovo.png'),('Brn-004','Huawei','BrandIcon/Huawei.png');
/*!40000 ALTER TABLE `brand_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `device_tb`
--

DROP TABLE IF EXISTS `device_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `device_tb` (
  `Dev_ID` varchar(100) NOT NULL,
  `Brand_ID` varchar(45) DEFAULT NULL,
  `Type_ID` varchar(45) DEFAULT NULL,
  `Dev_Model` varchar(200) DEFAULT NULL,
  `Dev_Type` varchar(45) DEFAULT NULL,
  `Project_ID` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Dev_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `device_tb`
--

LOCK TABLES `device_tb` WRITE;
/*!40000 ALTER TABLE `device_tb` DISABLE KEYS */;
INSERT INTO `device_tb` VALUES ('Dev-001','Brn-001','Type-002','Optiplex-5080','Fix','Pro-002'),('Dev-002','Brn-001','Type-001','Optiplex-5050','Fix','Pro-002'),('Dev-003','Brn-001','Type-005','Latitude-5420','Fix','Pro-002');
/*!40000 ALTER TABLE `device_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_tb`
--

DROP TABLE IF EXISTS `project_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `project_tb` (
  `Project_ID` varchar(100) NOT NULL,
  `Project_Name` varchar(100) DEFAULT NULL,
  `Project_No` varchar(45) DEFAULT NULL,
  `Project_Datestart` varchar(45) DEFAULT NULL,
  `Project_Warranty` varchar(45) DEFAULT NULL,
  `Project_Type` varchar(45) DEFAULT NULL,
  `Project_Datecreate` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Project_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_tb`
--

LOCK TABLES `project_tb` WRITE;
/*!40000 ALTER TABLE `project_tb` DISABLE KEYS */;
INSERT INTO `project_tb` VALUES ('Pro-001','สภากาชาดไทย','36/2565','2023-01-21','3 ปี','ซื้ออุปกรณ์','21/01/2566'),('Pro-002','การประปานคร','ซล.5/2566','2023-02-01','3 ปี','เช่าอุปกรณ์','21/01/2566');
/*!40000 ALTER TABLE `project_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `serial_tb`
--

DROP TABLE IF EXISTS `serial_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `serial_tb` (
  `Ser_ID` varchar(45) NOT NULL,
  `Ser_Box` varchar(45) DEFAULT NULL,
  `Ser_Serial_First` varchar(45) DEFAULT NULL,
  `Ser_Serial_Second` varchar(45) DEFAULT NULL,
  `Ser_Status` varchar(45) DEFAULT NULL,
  `Ser_Remark` varchar(200) DEFAULT NULL,
  `Ser_Unit` varchar(45) DEFAULT NULL,
  `Dev_ID` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Ser_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `serial_tb`
--

LOCK TABLES `serial_tb` WRITE;
/*!40000 ALTER TABLE `serial_tb` DISABLE KEYS */;
INSERT INTO `serial_tb` VALUES ('Dev-001-1','1','AAA',NULL,'ปกติ','-','1','Dev-001'),('Dev-001-2','2','SSS',NULL,'ปกติ','-','1','Dev-001'),('Dev-001-3','3','DDD',NULL,'ปกติ','-','1','Dev-001'),('Dev-001-4','4','FFF',NULL,'ปกติ','-','1','Dev-001'),('Dev-001-5','5','GGG',NULL,'ปกติ','-','1','Dev-001'),('Dev-001-6','6','HHH',NULL,'ปกติ','-','1','Dev-001');
/*!40000 ALTER TABLE `serial_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_tb`
--

DROP TABLE IF EXISTS `sub_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sub_tb` (
  `Sub_ID` varchar(45) NOT NULL,
  `Sub_Name` varchar(45) DEFAULT NULL,
  `Sub_Site` varchar(45) DEFAULT NULL,
  `Sub_Address` varchar(200) DEFAULT NULL,
  `Sub_Tel` varchar(45) DEFAULT NULL,
  `Sub_Type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Sub_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_tb`
--

LOCK TABLES `sub_tb` WRITE;
/*!40000 ALTER TABLE `sub_tb` DISABLE KEYS */;
INSERT INTO `sub_tb` VALUES ('Sub-001','ปรีชา สมหมาย','Asys-ขอนแก่น','212/11 อำเภอเมือง จังหวัดขอนแก่น','084-226-2622','ทีมช่าง'),('Sub-002','มนูญ ใจปอง','บริษัท Reserv จำกัด','สาธรเหนือ จ.กทม.','084-115-2245','ศูนย์ซ่อม');
/*!40000 ALTER TABLE `sub_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_tb`
--

DROP TABLE IF EXISTS `type_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type_tb` (
  `Type_ID` varchar(45) NOT NULL,
  `Type_Name` varchar(100) DEFAULT NULL,
  `Type_Logo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Type_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_tb`
--

LOCK TABLES `type_tb` WRITE;
/*!40000 ALTER TABLE `type_tb` DISABLE KEYS */;
INSERT INTO `type_tb` VALUES ('Type-001','Computer (PC)','-'),('Type-002','Computer (AIO)','-'),('Type-003','Printer','-'),('Type-004','router','-'),('Type-005','Notebook','-');
/*!40000 ALTER TABLE `type_tb` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-26 14:00:19
