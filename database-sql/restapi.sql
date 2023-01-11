/*
SQLyog Professional v12.09 (64 bit)
MySQL - 8.0.17 : Database - restapi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`restapi` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `restapi`;

/*Table structure for table `tbl_sample` */

DROP TABLE IF EXISTS `tbl_sample`;

CREATE TABLE `tbl_sample` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `gender` enum('Men','Women') NOT NULL DEFAULT 'Men',
  `is_married` enum('Single','Married','Divorced') NOT NULL DEFAULT 'Single',
  `address` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_sample` */

insert  into `tbl_sample`(`id`,`name`,`email`,`password`,`gender`,`is_married`,`address`) values (2,'rizal','rizal.muh.rzl@gmail.com','admin123','Men','Married','Jl Cikoko Barat Dalam III No 20\r\nJl Cikoko Barat IV No 18A'),(3,'Marlina','marli@gmail.com','12345','Women','Single','Jl Cikoko Barat Dalam III No 20\r\nJl Cikoko Barat IV No 18A'),(4,'lia yulianingsih','lia@gmail.com','isi ya','Women','Married','Jl Cikoko Barat Dalam III No 20\r\nJl Cikoko Barat IV No 18A'),(7,'polar','sarpa@gmail.com','$2y$10$ViJ4PLF44l/6BoSju6q5d.k','Men','Single','Jl Cikoko Barat Dalam III No 20\r\nJl Cikoko Barat IV No 18A'),(8,'korlapsiappo','badan','admin22','Men','Single','Jl Cikoko Barat Dalam III No 20\r\nJl Cikoko Barat IV No 18A'),(9,'shanum','shanum@gmail.com','$2y$10$TtVSUNopCoZIc7oGTJRHPeL','Women','Single','Jl Cikoko Barat Dalam III No 20\r\nJl Cikoko Barat IV No 18A'),(10,'pomans','cawangbsi@gmail.com','$2y$10$bmJqad3h/u4Fx1Ez6wTFreV','Men','Married','Jl Cikoko Barat Dalam III No 20\r\nJl Cikoko Barat IV No 18A'),(11,'kilaf','kil@gmail.com','$2y$10$t3A80lIXt/JaBZ6zQrpCnuf','Men','Married','Jl Cikoko Barat Dalam III No 20\r\nJl Cikoko Barat IV No 18A');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
