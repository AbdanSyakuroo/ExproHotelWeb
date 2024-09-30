/*
SQLyog Community v13.2.1 (64 bit)
MySQL - 8.0.30 : Database - db_hotel2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_hotel2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `db_hotel2`;

/*Table structure for table `tbl_admin` */

DROP TABLE IF EXISTS `tbl_admin`;

CREATE TABLE `tbl_admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_admin` */

insert  into `tbl_admin`(`id_admin`,`nama`,`username`,`password`) values 
(3,'ALDRICH RYU DANENDRA','Admin23','password');

/*Table structure for table `tbl_jenis_kamar` */

DROP TABLE IF EXISTS `tbl_jenis_kamar`;

CREATE TABLE `tbl_jenis_kamar` (
  `id_kamar` int NOT NULL AUTO_INCREMENT,
  `jenis_kamar` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `harga` int NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_kamar`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_jenis_kamar` */

insert  into `tbl_jenis_kamar`(`id_kamar`,`jenis_kamar`,`harga`,`keterangan`) values 
(1,'Standard Room',1000000,'Dengan desain yang fungsional dan sederhana, kamar mandi pribadi yang bersih, serta perlengkapan mandi yang esensial, Standard Room kami menyediakan segala yang Anda butuhkan untuk istirahat yang menyenangkan.'),
(2,'Superior Room',1500000,'Dengan layanan kamar 24 jam dan pemandangan kota atau taman yang menawan, Superior Room kami menjamin pengalaman menginap yang memuaskan dan menyegarkan. '),
(3,'Deluxe Room',1800000,' Kamar mandi mewah dengan perlengkapan eksklusif, dan pemandangan indah ke arah kota atau taman. Layanan kamar 24 jam dan laundry memastikan kebutuhan Anda selalu terpenuhi.');

/*Table structure for table `tbl_penyewa` */

DROP TABLE IF EXISTS `tbl_penyewa`;

CREATE TABLE `tbl_penyewa` (
  `id_sewa` int NOT NULL AUTO_INCREMENT,
  `id_kamar` int NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `durasi` int NOT NULL,
  `no_identitas` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` int NOT NULL,
  `total` int NOT NULL,
  PRIMARY KEY (`id_sewa`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_penyewa` */

insert  into `tbl_penyewa`(`id_sewa`,`id_kamar`,`nama`,`check_in`,`check_out`,`durasi`,`no_identitas`,`no_hp`,`jumlah`,`total`) values 
(10,3,'Abdan','2024-06-05','2024-06-07',2,'123455','2147483647',2,7200000),
(19,3,'Guinevere','2024-06-06','2024-06-07',1,'08927272727','0081891891',2,3600000),
(29,2,'Raevan','2024-07-05','2024-06-08',27,'27789','0972161711',4,162000000);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
