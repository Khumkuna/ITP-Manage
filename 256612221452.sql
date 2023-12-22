-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
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
INSERT INTO `account_tb` VALUES ('Acc-001','Admin-System','Admin','b9b3786a1084cae5c1ee67d31835b99f0e73fe1e','Admin'),('Acc-002','ปรัชญา คำกุณา','U001','b9b3786a1084cae5c1ee67d31835b99f0e73fe1e','User');
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
-- Table structure for table `call-device_tb`
--

DROP TABLE IF EXISTS `call-device_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `call-device_tb` (
  `Dev_ID` varchar(45) NOT NULL,
  `Brand_ID` varchar(45) DEFAULT NULL,
  `Type_ID` varchar(45) DEFAULT NULL,
  `Dev_Model` varchar(100) DEFAULT NULL,
  `Dev_Type` varchar(45) DEFAULT NULL,
  `Project_ID` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Dev_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `call-device_tb`
--

LOCK TABLES `call-device_tb` WRITE;
/*!40000 ALTER TABLE `call-device_tb` DISABLE KEYS */;
INSERT INTO `call-device_tb` VALUES ('Dev-001','Brn-001','Type-002','Optiplex-3080','Fix','Pro-003'),('Dev-002','Brn-001','Type-005','MS-2215S','None','Pro-003'),('Dev-003','Brn-001','Type-003','Latitude 5420','Fix','Pro-004');
/*!40000 ALTER TABLE `call-device_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `call-project_tb`
--

DROP TABLE IF EXISTS `call-project_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `call-project_tb` (
  `Project_ID` varchar(24) NOT NULL,
  `Project_Name` varchar(200) DEFAULT NULL,
  `Project_No` varchar(45) DEFAULT NULL,
  `Project_Datestart` varchar(45) DEFAULT NULL,
  `Project_SLA` varchar(45) DEFAULT NULL,
  `Project_Type_SLA` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Project_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `call-project_tb`
--

LOCK TABLES `call-project_tb` WRITE;
/*!40000 ALTER TABLE `call-project_tb` DISABLE KEYS */;
INSERT INTO `call-project_tb` VALUES ('Pro-003','MWA','12/2566','2023-10-12','48','No'),('Pro-004','สภากาชาดไทย','ซล.5/2566','2023-12-20','120','No');
/*!40000 ALTER TABLE `call-project_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `call-serial_tb`
--

DROP TABLE IF EXISTS `call-serial_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `call-serial_tb` (
  `Ser_ID` varchar(45) NOT NULL,
  `Ser_Box` varchar(45) DEFAULT NULL,
  `Ser_Serial_First` varchar(45) DEFAULT NULL,
  `Ser_Serial_Second` varchar(45) DEFAULT NULL,
  `Ser_Status` varchar(45) DEFAULT NULL,
  `Ser_Remark` varchar(200) DEFAULT NULL,
  `Ser_Unit` varchar(45) DEFAULT NULL,
  `Ser_Out` varchar(45) DEFAULT NULL,
  `Ser_DateImport` varchar(45) DEFAULT NULL,
  `Ser_Update` varchar(45) DEFAULT NULL,
  `Ser_Insert` varchar(45) DEFAULT NULL,
  `Ser_Withdraw` varchar(45) DEFAULT NULL,
  `Ser_SN` varchar(45) DEFAULT NULL,
  `Dev_ID` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Ser_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `call-serial_tb`
--

LOCK TABLES `call-serial_tb` WRITE;
/*!40000 ALTER TABLE `call-serial_tb` DISABLE KEYS */;
INSERT INTO `call-serial_tb` VALUES ('Dev-001-0001','0001','KGJEXR2S','KGJEXR2S','ปกติ','-','1',NULL,'12/19/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0002','0002','IGFRGQ2S','IGFRGQ2S','ปกติ','-','1',NULL,'12/19/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0003','0003','IAMLIL2S','IAMLIL2S','ปกติ','-','1',NULL,'12/19/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0004','0004','LSPOCP2S','LSPOCP2S','ปกติ','-','1',NULL,'12/19/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0005','0005','OEIINJ2S','OEIINJ2S','ปกติ','-','1',NULL,'12/19/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0006','0006','YUJTHZ2S','YUJTHZ2S','ปกติ','-','1',NULL,'12/19/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0007','0007','KLHJJK2S','KLHJJK2S','ปกติ','-','1',NULL,'12/19/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0008','0008','MQPWWE2S','MQPWWE2S','ปกติ','-','1',NULL,'12/19/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0009','0009','LPXDBT2S','LPXDBT2S','ปกติ','-','1',NULL,'12/19/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0010','0010','WBWNLF2S','WBWNLF2S','ปกติ','-','1',NULL,'12/19/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0011','0011','XYPWCO2S','XYPWCO2S','ปกติ','-','1',NULL,'12/19/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0012','0012','HUIYLE2S','HUIYLE2S','ปกติ','-','1',NULL,'12/19/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0013','0013','KAYEFV2S','KAYEFV2S','ปกติ','-','1',NULL,'12/19/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0014','0014','OABSUZ2S','OABSUZ2S','ปกติ','-','1',NULL,'12/19/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0015','0015','GKEYKX2S','GKEYKX2S','ปกติ','-','1',NULL,'12/19/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0016','0016','OSQOVY2S','OSQOVY2S','ปกติ','-','1',NULL,'12/19/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0017','0017','BENIVJ2S','BENIVJ2S','ปกติ','-','1',NULL,'12/19/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0018','0018','KWCHTS2S','KWCHTS2S','ปกติ','-','1',NULL,'12/19/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0019','0019','KFHODZ2S','KFHODZ2S','ปกติ','-','1',NULL,'12/19/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0020','0020','USTNEI2S','USTNEI2S','ปกติ','-','1',NULL,'12/19/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-002-0001','001','Mouse-Pad-MS-2215S','Mouse-Pad-MS-2215S','ปกติ','-','20',NULL,'12/19/2023',NULL,NULL,'สร้างรายการโครงการ','None','Dev-002'),('Dev-003-0001','0001','KGJEXR2S','KGJEXR2S','ปกติ','-','1',NULL,'12/21/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-003'),('Dev-003-0002','0002','IGFRGQ2S','IGFRGQ2S','ปกติ','-','1',NULL,'12/21/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-003'),('Dev-003-0003','0003','IAMLIL2S','IAMLIL2S','ปกติ','-','1',NULL,'12/21/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-003'),('Dev-003-0004','0004','LSPOCP2S','LSPOCP2S','ปกติ','-','1',NULL,'12/21/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-003'),('Dev-003-0005','0005','OEIINJ2S','OEIINJ2S','ปกติ','-','1',NULL,'12/21/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-003'),('Dev-003-0006','0006','YUJTHZ2S','YUJTHZ2S','ปกติ','-','1',NULL,'12/21/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-003'),('Dev-003-0007','0007','KLHJJK2S','KLHJJK2S','ปกติ','-','1',NULL,'12/21/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-003'),('Dev-003-0008','0008','MQPWWE2S','MQPWWE2S','ปกติ','-','1',NULL,'12/21/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-003'),('Dev-003-0009','0009','LPXDBT2S','LPXDBT2S','ปกติ','-','1',NULL,'12/21/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-003'),('Dev-003-0010','0010','WBWNLF2S','WBWNLF2S','ปกติ','-','1',NULL,'12/21/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-003'),('Dev-003-0011','0011','XYPWCO2S','XYPWCO2S','ปกติ','-','1',NULL,'12/21/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-003'),('Dev-003-0012','0012','HUIYLE2S','HUIYLE2S','ปกติ','-','1',NULL,'12/21/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-003'),('Dev-003-0013','0013','KAYEFV2S','KAYEFV2S','ปกติ','-','1',NULL,'12/21/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-003'),('Dev-003-0014','0014','OABSUZ2S','OABSUZ2S','ปกติ','-','1',NULL,'12/21/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-003'),('Dev-003-0015','0015','GKEYKX2S','GKEYKX2S','ปกติ','-','1',NULL,'12/21/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-003'),('Dev-003-0016','0016','OSQOVY2S','OSQOVY2S','ปกติ','-','1',NULL,'12/21/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-003'),('Dev-003-0017','0017','BENIVJ2S','BENIVJ2S','ปกติ','-','1',NULL,'12/21/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-003'),('Dev-003-0018','0018','KWCHTS2S','KWCHTS2S','ปกติ','-','1',NULL,'12/21/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-003'),('Dev-003-0019','0019','KFHODZ2S','KFHODZ2S','ปกติ','-','1',NULL,'12/21/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-003'),('Dev-003-0020','0020','USTNEI2S','USTNEI2S','ปกติ','-','1',NULL,'12/21/2023',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-003');
/*!40000 ALTER TABLE `call-serial_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `call-site_tb`
--

DROP TABLE IF EXISTS `call-site_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `call-site_tb` (
  `CS_ID` varchar(45) NOT NULL,
  `CS_No` varchar(45) DEFAULT NULL,
  `CS_Name` varchar(200) DEFAULT NULL,
  `CS_Province` varchar(200) DEFAULT NULL,
  `CS_City` varchar(200) DEFAULT NULL,
  `CS_Subdistrict` varchar(200) DEFAULT NULL,
  `CS_Address` varchar(200) DEFAULT NULL,
  `Project_ID` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`CS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `call-site_tb`
--

LOCK TABLES `call-site_tb` WRITE;
/*!40000 ALTER TABLE `call-site_tb` DISABLE KEYS */;
INSERT INTO `call-site_tb` VALUES ('CS001',NULL,'MS-Siam Tower','Bangkok','Yannawa','Chongnonsri','test','Pro-003'),('Pro-004-0001','0001','Test A','นนทบุรี','AAAA','AAA','AA','Pro-004'),('Pro-004-0002','0002','Test B','นนทบุรี','BBBB','BBB','BB','Pro-004'),('Pro-004-0003','0003','Test C','ชลบุรี','CCCC','CCC','CC','Pro-004'),('Pro-004-0004','0004','Test D','ลำปาง','DDDD','DDD','DD','Pro-004');
/*!40000 ALTER TABLE `call-site_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deposit_detail_tb`
--

DROP TABLE IF EXISTS `deposit_detail_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `deposit_detail_tb` (
  `DEPD_ID` varchar(45) NOT NULL,
  `Brand_ID` varchar(45) DEFAULT NULL,
  `Type_ID` varchar(45) DEFAULT NULL,
  `DEPD_Model` varchar(45) DEFAULT NULL,
  `DEPD_Type` varchar(45) DEFAULT NULL,
  `Dep_ID` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`DEPD_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deposit_detail_tb`
--

LOCK TABLES `deposit_detail_tb` WRITE;
/*!40000 ALTER TABLE `deposit_detail_tb` DISABLE KEYS */;
INSERT INTO `deposit_detail_tb` VALUES ('DeD-001','Brn-001','Type-005','Rsesrr','None','Dep-001'),('DeD-002','Brn-001','Type-002','Optiplex-3050','Fix','Dep-001'),('DeD-003','Brn-002','Type-005','RTESTTTS','None','Dep-001');
/*!40000 ALTER TABLE `deposit_detail_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deposit_receive_tb`
--

DROP TABLE IF EXISTS `deposit_receive_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `deposit_receive_tb` (
  `DR_ID` varchar(45) NOT NULL,
  `DR_No` varchar(45) DEFAULT NULL,
  `DR_Date` varchar(45) DEFAULT NULL,
  `DR_Unit` varchar(45) DEFAULT NULL,
  `DR_Type` varchar(45) DEFAULT NULL,
  `DR_Remark` varchar(45) DEFAULT NULL,
  `SD_ID` varchar(45) DEFAULT NULL,
  `Dep_ID` varchar(45) DEFAULT NULL,
  `ACC_ID` varchar(45) DEFAULT NULL,
  `DEPD_ID` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`DR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deposit_receive_tb`
--

LOCK TABLES `deposit_receive_tb` WRITE;
/*!40000 ALTER TABLE `deposit_receive_tb` DISABLE KEYS */;
INSERT INTO `deposit_receive_tb` VALUES ('Rec-000001','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0001','-','Acc-001','DeD-002'),('Rec-000002','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0002','-','Acc-001','DeD-002'),('Rec-000003','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0003','-','Acc-001','DeD-002'),('Rec-000004','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0004','-','Acc-001','DeD-002'),('Rec-000005','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0005','-','Acc-001','DeD-002'),('Rec-000006','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0006','-','Acc-001','DeD-002'),('Rec-000007','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0007','-','Acc-001','DeD-002'),('Rec-000008','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0008','-','Acc-001','DeD-002'),('Rec-000009','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0009','-','Acc-001','DeD-002'),('Rec-000010','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0010','-','Acc-001','DeD-002'),('Rec-000011','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0011','-','Acc-001','DeD-002'),('Rec-000012','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0012','-','Acc-001','DeD-002'),('Rec-000013','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0013','-','Acc-001','DeD-002'),('Rec-000014','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0014','-','Acc-001','DeD-002'),('Rec-000015','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0015','-','Acc-001','DeD-002'),('Rec-000016','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0016','-','Acc-001','DeD-002'),('Rec-000017','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0017','-','Acc-001','DeD-002'),('Rec-000018','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0018','-','Acc-001','DeD-002'),('Rec-000019','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0019','-','Acc-001','DeD-002'),('Rec-000020','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0020','-','Acc-001','DeD-002'),('Rec-000021','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0021','-','Acc-001','DeD-002'),('Rec-000022','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0022','-','Acc-001','DeD-002'),('Rec-000023','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0023','-','Acc-001','DeD-002'),('Rec-000024','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0024','-','Acc-001','DeD-002'),('Rec-000025','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0025','-','Acc-001','DeD-002'),('Rec-000026','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0026','-','Acc-001','DeD-002'),('Rec-000027','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0027','-','Acc-001','DeD-002'),('Rec-000028','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0028','-','Acc-001','DeD-002'),('Rec-000029','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0029','-','Acc-001','DeD-002'),('Rec-000030','Test-IN-001','08/03/2566','1',NULL,'-','DeD-002-0030','-','Acc-001','DeD-002'),('Rec-000031','Test-IN-001','08/03/2566','30',NULL,'-','DeD-001-0001','-','Acc-001','DeD-001'),('Rec-000032','Test-IN-002','09/03/2566','20',NULL,'-','DeD-003-0001','-','Acc-001','DeD-003');
/*!40000 ALTER TABLE `deposit_receive_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deposit_tb`
--

DROP TABLE IF EXISTS `deposit_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `deposit_tb` (
  `Dep_ID` varchar(45) NOT NULL,
  `Dep_Name` varchar(100) DEFAULT NULL,
  `Dep_Tel` varchar(45) DEFAULT NULL,
  `Dep_Department` varchar(45) DEFAULT NULL,
  `ACC_ID` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Dep_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deposit_tb`
--

LOCK TABLES `deposit_tb` WRITE;
/*!40000 ALTER TABLE `deposit_tb` DISABLE KEYS */;
INSERT INTO `deposit_tb` VALUES ('Dep-001','นายสมใส อ่อนใส','083-2202200','ฝ่ายขาย','Acc-001');
/*!40000 ALTER TABLE `deposit_tb` ENABLE KEYS */;
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
INSERT INTO `device_tb` VALUES ('Dev-001','Brn-001','Type-003','Latitude 5420','Fix','Pro-003'),('Dev-002','Brn-001','Type-004','MS-2215S','None','Pro-003'),('Dev-003','Brn-001','Type-005','P-21551','None','Pro-003'),('Dev-004','Brn-001','Type-002','Optiplex-3080','Fix','Pro-002'),('Dev-005','Brn-001','Type-004','MS21400','Fix','Pro-002'),('Dev-006','Brn-001','Type-002','Optiplex-3080','Fix','Pro-002'),('Dev-007','Brn-001','Type-003','ssss','None','Pro-004'),('Dev-008','Brn-001','Type-002','Optiplex-3080','Fix','Pro-002'),('Dev-009','Brn-003','Type-004','P-21551','None','Pro-004');
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
INSERT INTO `project_tb` VALUES ('Pro-002','การประปานครหลวง','36/2565','2023-02-01','','',''),('Pro-003','สภากาชาดไทย','36/2565','2023-02-01','3 ปี','เช่าอุปกรณ์','30/01/2566'),('Pro-004','Test','aaaaaa','2023-02-23','5 เดือน','เช่าอุปกรณ์','23/02/2566');
/*!40000 ALTER TABLE `project_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receive_tb`
--

DROP TABLE IF EXISTS `receive_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `receive_tb` (
  `Rec_ID` varchar(45) NOT NULL,
  `Rec_No` varchar(45) DEFAULT NULL,
  `Rec_Date` varchar(45) DEFAULT NULL,
  `Rec_Unit` varchar(45) DEFAULT NULL,
  `Rec_Type` varchar(45) DEFAULT NULL,
  `Rec_Remark` varchar(200) DEFAULT NULL,
  `Ser_ID` varchar(45) DEFAULT NULL,
  `ACC_ID` varchar(45) DEFAULT NULL,
  `Sub_ID` varchar(45) DEFAULT NULL,
  `Dev_ID` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Rec_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receive_tb`
--

LOCK TABLES `receive_tb` WRITE;
/*!40000 ALTER TABLE `receive_tb` DISABLE KEYS */;
INSERT INTO `receive_tb` VALUES ('Rec-000000001','Rec-001','24/02/2566','1',NULL,'ทดสอบรับคืน','Dev-001-0029','Acc-001 ','Sub-001','Dev-001'),('Rec-000000002','Rec-001','24/02/2566','1',NULL,'ทดสอบรับคืน','Dev-002-0001','Acc-001 ','Sub-001','Dev-002'),('Rec-000000003','Rec-001','24/02/2566','1',NULL,'ทดสอบรับคืน','Dev-003-0001','Acc-001 ','Sub-001','Dev-003'),('Rec-000000004','Rec-002','23/02/2566','1',NULL,'ทดสอบรับคืน','Dev-001-0030','Acc-001 ','Sub-001','Dev-001'),('Rec-000000005','Rec-002','23/02/2566','1',NULL,'ทดสอบรับคืน','Dev-002-0001','Acc-001 ','Sub-001','Dev-002'),('Rec-000000006','Rec-002','23/02/2566','1',NULL,'ทดสอบรับคืน','Dev-003-0001','Acc-001 ','Sub-001','Dev-003'),('Rec-000000007','Rec-003','23/02/2566','1',NULL,'ทดสอบรับคืน','Dev-001-0003','Acc-001 ','Sub-001','Dev-001'),('Rec-000000008','Rec-003','23/02/2566','1',NULL,'ทดสอบรับคืน','Dev-001-0004','Acc-001 ','Sub-001','Dev-001'),('Rec-000000009','Rec-003','23/02/2566','1',NULL,'ทดสอบรับคืน','Dev-001-0005','Acc-001 ','Sub-001','Dev-001'),('Rec-000000010','Rec-003','23/02/2566','3',NULL,'ทดสอบรับคืน','Dev-002-0001','Acc-001 ','Sub-001','Dev-002'),('Rec-000000011','Rec-003','23/02/2566','3',NULL,'ทดสอบรับคืน','Dev-003-0001','Acc-001 ','Sub-001','Dev-003');
/*!40000 ALTER TABLE `receive_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `repair_tb`
--

DROP TABLE IF EXISTS `repair_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `repair_tb` (
  `Re_ID` varchar(100) NOT NULL,
  `Re_Device` varchar(500) DEFAULT NULL,
  `Re_Serial` varchar(500) DEFAULT NULL,
  `Re_Job` varchar(500) DEFAULT NULL,
  `Re_DateCreate` varchar(500) DEFAULT NULL,
  `Re_Fail` varchar(5000) DEFAULT NULL,
  `Re_DateUpdate` varchar(500) DEFAULT NULL,
  `Re_Edit` varchar(5000) DEFAULT NULL,
  `Re_Edit_Next` varchar(5000) DEFAULT NULL,
  `Re_Status` varchar(500) DEFAULT NULL,
  `Si_ID` varchar(45) DEFAULT NULL,
  `Re_Username` varchar(200) DEFAULT NULL,
  `Re_Tel` varchar(45) DEFAULT NULL,
  `Re_Work` varchar(45) DEFAULT NULL,
  `Re_Month` varchar(45) DEFAULT NULL,
  `Re_Phase` varchar(45) DEFAULT NULL,
  `Re_Call_By` varchar(200) DEFAULT NULL,
  `Re_Verify_By` varchar(200) DEFAULT NULL,
  `Re_Technical_By` varchar(200) DEFAULT NULL,
  `Re_Verify_Date` varchar(45) DEFAULT NULL,
  `Re_Technical_Start` varchar(45) DEFAULT NULL,
  `Re_Technical_End` varchar(45) DEFAULT NULL,
  `Re_Lastaction` varchar(45) DEFAULT NULL,
  `Re_Lastactionby` varchar(200) DEFAULT NULL,
  `Re_Sam_ID` varchar(200) DEFAULT NULL,
  `Pic_A` varchar(100) DEFAULT NULL,
  `Pic_B` varchar(100) DEFAULT NULL,
  `Pic_C` varchar(100) DEFAULT NULL,
  `Video_A` varchar(100) DEFAULT NULL,
  `Project_ID` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Re_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repair_tb`
--

LOCK TABLES `repair_tb` WRITE;
/*!40000 ALTER TABLE `repair_tb` DISABLE KEYS */;
INSERT INTO `repair_tb` VALUES ('Rep00002','Dev-003','HUIYLE2S','No-25661221-001','21/12/2566 16:52:11','aaaa',NULL,NULL,NULL,'Pending','','asdasd','ssss',NULL,NULL,'Phase-3',' ',NULL,NULL,NULL,NULL,NULL,'Call-Center','',NULL,'','','','','Pro-004');
/*!40000 ALTER TABLE `repair_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `serial_deposit_tb`
--

DROP TABLE IF EXISTS `serial_deposit_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `serial_deposit_tb` (
  `SD_ID` varchar(45) NOT NULL,
  `SD_No` varchar(45) DEFAULT NULL,
  `SD_Serial` varchar(45) DEFAULT NULL,
  `SD_QTY` varchar(45) DEFAULT NULL,
  `SD_CerIN` varchar(45) DEFAULT NULL,
  `SD_CerOut` varchar(45) DEFAULT NULL,
  `SD_Remark` varchar(45) DEFAULT NULL,
  `DEPD_ID` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`SD_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `serial_deposit_tb`
--

LOCK TABLES `serial_deposit_tb` WRITE;
/*!40000 ALTER TABLE `serial_deposit_tb` DISABLE KEYS */;
INSERT INTO `serial_deposit_tb` VALUES ('DeD-001-0001',NULL,'DEPD_ModelX','30','Test-IN-001','-','-','DeD-001'),('DeD-002-0001','0001','A11235S12','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0002','0002','A11235S13','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0003','0003','A11235S14','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0004','0004','A11235S15','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0005','0005','A11235S16','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0006','0006','A11235S17','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0007','0007','A11235S18','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0008','0008','A11235S19','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0009','0009','A11235S20','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0010','0010','A11235S21','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0011','0011','A11235S22','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0012','0012','A11235S23','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0013','0013','A11235S24','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0014','0014','A11235S25','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0015','0015','A11235S26','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0016','0016','A11235S27','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0017','0017','A11235S28','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0018','0018','A11235S29','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0019','0019','A11235S30','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0020','0020','A11235S31','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0021','0021','A11235S32','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0022','0022','A11235S33','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0023','0023','A11235S34','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0024','0024','A11235S35','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0025','0025','A11235S36','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0026','0026','A11235S37','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0027','0027','A11235S38','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0028','0028','A11235S39','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0029','0029','A11235S40','1','Test-IN-001','-','-','DeD-002'),('DeD-002-0030','0030','A11235S41','1','Test-IN-001','-','-','DeD-002'),('DeD-003-0001',NULL,'DEPD_ModelX','20','Test-IN-002','-','-','DeD-003');
/*!40000 ALTER TABLE `serial_deposit_tb` ENABLE KEYS */;
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
  `Ser_Out` varchar(45) DEFAULT NULL,
  `Ser_DateImport` varchar(45) DEFAULT NULL,
  `Ser_Update` varchar(45) DEFAULT NULL,
  `Ser_Insert` varchar(45) DEFAULT NULL,
  `Ser_Withdraw` varchar(45) DEFAULT NULL,
  `Ser_SN` varchar(45) DEFAULT NULL,
  `Dev_ID` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Ser_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `serial_tb`
--

LOCK TABLES `serial_tb` WRITE;
/*!40000 ALTER TABLE `serial_tb` DISABLE KEYS */;
INSERT INTO `serial_tb` VALUES ('-0001','001','','','ปกติ','-','',NULL,'03/07/2023',NULL,NULL,'สร้างรายการโครงการ','None',''),('Array-0001','0001','KGJEXR2S','KGJEXR2S','ปกติ','-','1',NULL,'19/12/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Array'),('Array-0002','0002','IGFRGQ2S','IGFRGQ2S','ปกติ','-','1',NULL,'19/12/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Array'),('Array-0003','0003','IAMLIL2S','IAMLIL2S','ปกติ','-','1',NULL,'19/12/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Array'),('Array-0004','0004','LSPOCP2S','LSPOCP2S','ปกติ','-','1',NULL,'19/12/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Array'),('Array-0005','0005','OEIINJ2S','OEIINJ2S','ปกติ','-','1',NULL,'19/12/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Array'),('Array-0006','0006','YUJTHZ2S','YUJTHZ2S','ปกติ','-','1',NULL,'19/12/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Array'),('Array-0007','0007','KLHJJK2S','KLHJJK2S','ปกติ','-','1',NULL,'19/12/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Array'),('Array-0008','0008','MQPWWE2S','MQPWWE2S','ปกติ','-','1',NULL,'19/12/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Array'),('Array-0009','0009','LPXDBT2S','LPXDBT2S','ปกติ','-','1',NULL,'19/12/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Array'),('Array-0010','0010','WBWNLF2S','WBWNLF2S','ปกติ','-','1',NULL,'19/12/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Array'),('Array-0011','0011','XYPWCO2S','XYPWCO2S','ปกติ','-','1',NULL,'19/12/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Array'),('Array-0012','0012','HUIYLE2S','HUIYLE2S','ปกติ','-','1',NULL,'19/12/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Array'),('Array-0013','0013','KAYEFV2S','KAYEFV2S','ปกติ','-','1',NULL,'19/12/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Array'),('Array-0014','0014','OABSUZ2S','OABSUZ2S','ปกติ','-','1',NULL,'19/12/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Array'),('Array-0015','0015','GKEYKX2S','GKEYKX2S','ปกติ','-','1',NULL,'19/12/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Array'),('Array-0016','0016','OSQOVY2S','OSQOVY2S','ปกติ','-','1',NULL,'19/12/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Array'),('Array-0017','0017','BENIVJ2S','BENIVJ2S','ปกติ','-','1',NULL,'19/12/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Array'),('Array-0018','0018','KWCHTS2S','KWCHTS2S','ปกติ','-','1',NULL,'19/12/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Array'),('Array-0019','0019','KFHODZ2S','KFHODZ2S','ปกติ','-','1',NULL,'19/12/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Array'),('Array-0020','0020','USTNEI2S','USTNEI2S','ปกติ','-','1',NULL,'19/12/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Array'),('Dev-001-0001','0001','A11235S12','A11235S12','ปกติ','-','1','1','23/02/2566',NULL,NULL,'Out-Test-001','Fix','Dev-001'),('Dev-001-0002','0002','A11235S13','A11235S13','ปกติ','-','1','1','23/02/2566',NULL,NULL,'Out-Test-001','Fix','Dev-001'),('Dev-001-0003','0003','A11235S14','A11235S14','ปกติ','-','1','1','23/02/2566',NULL,NULL,'Out-sssss','Fix','Dev-001'),('Dev-001-0004','0004','A11235S15','A11235S15','ปกติ','-','1','1','23/02/2566',NULL,NULL,'Out-sssss','Fix','Dev-001'),('Dev-001-0005','0005','A11235S16','A11235S16','ปกติ','-','1','0','23/02/2566',NULL,NULL,'Insert-Rec-003','Fix','Dev-001'),('Dev-001-0006','0006','A11235S17','A11235S17','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0007','0007','A11235S18','A11235S18','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0008','0008','A11235S19','A11235S19','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0009','0009','A11235S20','A11235S20','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0010','0010','A11235S21','A11235S21','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0011','0011','A11235S22','A11235S22','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0012','0012','A11235S23','A11235S23','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0013','0013','A11235S24','A11235S24','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0014','0014','A11235S25','A11235S25','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0015','0015','A11235S26','A11235S26','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0016','0016','A11235S27','A11235S27','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0017','0017','A11235S28','A11235S28','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0018','0018','A11235S29','A11235S29','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0019','0019','A11235S30','A11235S30','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0020','0020','A11235S31','A11235S31','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0021','0021','A11235S32','A11235S32','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0022','0022','A11235S33','A11235S33','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0023','0023','A11235S34','A11235S34','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0024','0024','A11235S35','A11235S35','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0025','0025','A11235S36','A11235S36','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0026','0026','A11235S37','A11235S37','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0027','0027','A11235S38','A11235S38','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0028','0028','A11235S39','A11235S39','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'สร้างรายการโครงการ','Fix','Dev-001'),('Dev-001-0029','0029','A11235S40','A11235S40','ปกติ','-','1','0','23/02/2566',NULL,NULL,'Insert-Rec-001','Fix','Dev-001'),('Dev-001-0030','0030','A11235S41','A11235S41','ปกติ','-','1','0','23/02/2566',NULL,NULL,'Insert-Rec-002','Fix','Dev-001'),('Dev-001-0031','0031','ssssssss','ssssssss','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'test-Add','Fix','Dev-001'),('Dev-001-0032','0032','aaaaaaa','aaaaaaa','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'test-Add','Fix','Dev-001'),('Dev-001-33','0033','Test001','Test001','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'ฺbook-1','Fix','Dev-001'),('Dev-001-34','0034','Test002','Test002','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'ฺbook-1','Fix','Dev-001'),('Dev-001-35','0035','Test003','Test003','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'ฺbook-1','Fix','Dev-001'),('Dev-001-36','0036','Test004','Test004','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'ฺbook-1','Fix','Dev-001'),('Dev-001-37','0037','Test005','Test005','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'ฺbook-1','Fix','Dev-001'),('Dev-001-38','0038','Test006','Test006','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'ฺbook-1','Fix','Dev-001'),('Dev-001-39','0039','Test007','Test007','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'ฺbook-1','Fix','Dev-001'),('Dev-001-40','0040','Test008','Test008','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'ฺbook-1','Fix','Dev-001'),('Dev-001-41','0041','Test009','Test009','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'ฺbook-1','Fix','Dev-001'),('Dev-001-42','0042','Test010','Test010','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'ฺbook-1','Fix','Dev-001'),('Dev-001-43','0043','Test011','Test011','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'ฺbook-1','Fix','Dev-001'),('Dev-001-44','0044','Test012','Test012','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'ฺbook-1','Fix','Dev-001'),('Dev-001-45','0045','Test013','Test013','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'ฺbook-1','Fix','Dev-001'),('Dev-001-46','0046','Test014','Test014','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'ฺbook-1','Fix','Dev-001'),('Dev-001-47','0047','Test015','Test015','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'ฺbook-1','Fix','Dev-001'),('Dev-001-48','0048','Test016','Test016','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'ฺbook-1','Fix','Dev-001'),('Dev-001-49','0049','Test017','Test017','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'ฺbook-1','Fix','Dev-001'),('Dev-001-50','0050','Test018','Test018','ปกติ','-','1',NULL,'23/02/2566',NULL,NULL,'ฺbook-1','Fix','Dev-001'),('Dev-002-0001','001','Mouse-MS-2215S','Mouse-MS-2215S','ปกติ','-','40','4','02/23/2023',NULL,NULL,'Out-sssss','None','Dev-002'),('Dev-003-0001','001','Mouse-Pad-P-21551','Mouse-Pad-P-21551','ปกติ','-','40','4','02/23/2023',NULL,NULL,'Out-sssss','None','Dev-003'),('Dev-007-0001','001','Notebook-ssss','Notebook-ssss','ปกติ','-','',NULL,'08/03/2566',NULL,NULL,'สร้างรายการโครงการ','None','Dev-007'),('Dev-009-0001','001','Mouse-P-21551','Mouse-P-21551','ปกติ','-','10',NULL,'19/12/2566',NULL,NULL,'สร้างรายการโครงการ','None','Dev-009');
/*!40000 ALTER TABLE `serial_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_tb`
--

DROP TABLE IF EXISTS `site_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `site_tb` (
  `Si_ID` varchar(50) NOT NULL,
  `Si_Name` varchar(45) DEFAULT NULL,
  `Si_Province` varchar(45) DEFAULT NULL,
  `Si_City` varchar(45) DEFAULT NULL,
  `Si_Subdistrict` varchar(45) DEFAULT NULL,
  `Si_Address` varchar(45) DEFAULT NULL,
  `Project_ID` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Si_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_tb`
--

LOCK TABLES `site_tb` WRITE;
/*!40000 ALTER TABLE `site_tb` DISABLE KEYS */;
INSERT INTO `site_tb` VALUES ('Si001','MS-Siam Tower','กรุงเทพมหานคร','ช่องนนทรี','ยานนาวา','1023 อาคาร เอ็มเอส สยาม ทาวเวอร์','Pro-002');
/*!40000 ALTER TABLE `site_tb` ENABLE KEYS */;
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
INSERT INTO `type_tb` VALUES ('Type-001','Computer (PC)','-'),('Type-002','Computer (AIO)','-'),('Type-003','Notebook','-'),('Type-004','Mouse','-'),('Type-005','Mouse-Pad','-');
/*!40000 ALTER TABLE `type_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `withdraw_tb`
--

DROP TABLE IF EXISTS `withdraw_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `withdraw_tb` (
  `WD_ID` varchar(45) NOT NULL,
  `WD_No` varchar(45) DEFAULT NULL,
  `WD_Date` varchar(45) DEFAULT NULL,
  `WD_Unit` varchar(45) DEFAULT NULL,
  `WD_Type` varchar(45) DEFAULT NULL,
  `WD_Remark` varchar(200) DEFAULT NULL,
  `Ser_ID` varchar(45) DEFAULT NULL,
  `ACC_ID` varchar(45) DEFAULT NULL,
  `Sub_ID` varchar(45) DEFAULT NULL,
  `Dev_ID` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`WD_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `withdraw_tb`
--

LOCK TABLES `withdraw_tb` WRITE;
/*!40000 ALTER TABLE `withdraw_tb` DISABLE KEYS */;
INSERT INTO `withdraw_tb` VALUES ('WDR-000000001','Withdraw-001','23/02/2566','1',NULL,'ทดสอบเบิก1','Dev-001-0029','Acc-001 ','Sub-001','Dev-001'),('WDR-000000002','Withdraw-001','23/02/2566','1',NULL,'ทดสอบเบิก1','Dev-001-0030','Acc-001 ','Sub-001','Dev-001'),('WDR-000000003','Withdraw-001','23/02/2566','2',NULL,'ทดสอบเบิก1','Dev-002-0001','Acc-001 ','Sub-001','Dev-002'),('WDR-000000004','Withdraw-001','23/02/2566','2',NULL,'ทดสอบเบิก1','Dev-003-0001','Acc-001 ','Sub-001','Dev-003'),('WDR-000000005','Test-001','23/02/2566','1',NULL,'','Dev-001-0001','Acc-001 ','Sub-001','Dev-001'),('WDR-000000006','Test-001','23/02/2566','1',NULL,'','Dev-001-0002','Acc-001 ','Sub-001','Dev-001'),('WDR-000000007','Test-001','23/02/2566','1',NULL,'','Dev-001-0003','Acc-001 ','Sub-001','Dev-001'),('WDR-000000008','Test-001','23/02/2566','3',NULL,'','Dev-002-0001','Acc-001 ','Sub-001','Dev-002'),('WDR-000000009','Test-001','23/02/2566','3',NULL,'','Dev-003-0001','Acc-001 ','Sub-001','Dev-003'),('WDR-000000010','2566-003','23/02/2566','1',NULL,'ทดสอบเบิก1','Dev-001-0004','Acc-001 ','Sub-001','Dev-001'),('WDR-000000011','2566-003','23/02/2566','1',NULL,'ทดสอบเบิก1','Dev-001-0005','Acc-001 ','Sub-001','Dev-001'),('WDR-000000012','2566-003','23/02/2566','2',NULL,'ทดสอบเบิก1','Dev-002-0001','Acc-001 ','Sub-001','Dev-002'),('WDR-000000013','2566-003','23/02/2566','2',NULL,'ทดสอบเบิก1','Dev-003-0001','Acc-001 ','Sub-001','Dev-003'),('WDR-000000014','sssss','12/10/2566','1',NULL,'asdasd','Dev-001-0003','Acc-004 ','Sub-001','Dev-001'),('WDR-000000015','sssss','12/10/2566','1',NULL,'asdasd','Dev-001-0004','Acc-004 ','Sub-001','Dev-001'),('WDR-000000016','sssss','12/10/2566','2',NULL,'asdasd','Dev-002-0001','Acc-004 ','Sub-001','Dev-002'),('WDR-000000017','sssss','12/10/2566','2',NULL,'asdasd','Dev-003-0001','Acc-004 ','Sub-001','Dev-003');
/*!40000 ALTER TABLE `withdraw_tb` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-22 14:22:07
