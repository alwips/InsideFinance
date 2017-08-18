/*
SQLyog Ultimate v12.4.1 (64 bit)
MySQL - 10.1.21-MariaDB : Database - db_keuangan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_keuangan` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_keuangan`;

/*Table structure for table `calendar_events` */

DROP TABLE IF EXISTS `calendar_events`;

CREATE TABLE `calendar_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `is_all_day` tinyint(1) DEFAULT NULL,
  `background_color` varchar(10) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `calendar_events` */

insert  into `calendar_events`(`id`,`title`,`start`,`end`,`is_all_day`,`background_color`,`userid`,`created_at`,`updated_at`) values 
(1,'Hmm','2017-08-21 08:00:00','2018-09-06 12:35:00',0,'#9100ff',1,'2017-08-15 03:50:29','2017-08-15 06:20:24'),
(2,'haha','2017-08-21 08:00:00','2017-08-15 19:00:00',0,'#ffe07a',1,'2017-08-15 03:52:54','2017-08-15 06:19:20'),
(3,'asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf&nbsp;','2017-08-15 13:18:00','2017-08-15 14:18:00',0,'#9c1f1f',1,'2017-08-15 06:18:56','2017-08-15 15:35:30'),
(4,'<p><b>Membuat dan mencari yang tidak ada :</b></p><ul><li>React JS</li><li>Laravel React JS</li><li>Laravel Angular JS</li><li>Web Hosting</li></ul>','2017-08-15 19:17:00','2017-08-15 19:17:00',0,'#ff0000',2,'2017-08-15 12:18:19','2017-08-15 12:19:32'),
(5,'<p>Launching <b>Aplikasi Logbook</b>, dan dihostingkan dengan nama domain&nbsp;<a href=\"http://logbook.insidestudio.id\">http://logbook.insidestudio.id</a><a href=\"http://logbook.insidestudio.id\" target=\"_blank\"></a>&nbsp;</p>','2017-08-16 09:54:00','2017-08-16 12:54:00',0,'#a2b00e',1,'2017-08-16 02:56:37','2017-08-16 02:56:37');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2016_06_01_000001_create_oauth_auth_codes_table',1),
(4,'2016_06_01_000002_create_oauth_access_tokens_table',1),
(5,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),
(6,'2016_06_01_000004_create_oauth_clients_table',1),
(7,'2016_06_01_000005_create_oauth_personal_access_clients_table',1);

/*Table structure for table `oauth_access_tokens` */

DROP TABLE IF EXISTS `oauth_access_tokens`;

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_access_tokens` */

/*Table structure for table `oauth_auth_codes` */

DROP TABLE IF EXISTS `oauth_auth_codes`;

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_auth_codes` */

/*Table structure for table `oauth_clients` */

DROP TABLE IF EXISTS `oauth_clients`;

CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_clients` */

insert  into `oauth_clients`(`id`,`user_id`,`name`,`secret`,`redirect`,`personal_access_client`,`password_client`,`revoked`,`created_at`,`updated_at`) values 
(1,NULL,'Inside Finance Personal Access Client','ogMrnZdSl8Uuz3zxpTsmwoQbM4uEyH2HwyvJbN7C','http://localhost',1,0,0,'2017-05-19 16:18:32','2017-05-19 16:18:32'),
(2,NULL,'Inside Finance Password Grant Client','k0zSjbG2c21uRpGg8U4hoVFTqJHgh0zoPnEE24AS','http://localhost',0,1,0,'2017-05-19 16:18:33','2017-05-19 16:18:33');

/*Table structure for table `oauth_personal_access_clients` */

DROP TABLE IF EXISTS `oauth_personal_access_clients`;

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_personal_access_clients` */

insert  into `oauth_personal_access_clients`(`id`,`client_id`,`created_at`,`updated_at`) values 
(1,1,'2017-05-19 16:18:32','2017-05-19 16:18:32');

/*Table structure for table `oauth_refresh_tokens` */

DROP TABLE IF EXISTS `oauth_refresh_tokens`;

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_refresh_tokens` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `tbl_alokasi` */

DROP TABLE IF EXISTS `tbl_alokasi`;

CREATE TABLE `tbl_alokasi` (
  `idalokasi` int(11) NOT NULL AUTO_INCREMENT,
  `nominal` double DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `keterangan` text,
  `idproyek` int(11) DEFAULT NULL,
  `iditem` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idalokasi`),
  KEY `danaproyek` (`idproyek`),
  KEY `danaitem` (`iditem`),
  CONSTRAINT `danaitem` FOREIGN KEY (`iditem`) REFERENCES `tbl_item` (`iditem`),
  CONSTRAINT `danaproyek` FOREIGN KEY (`idproyek`) REFERENCES `tbl_proyek` (`idproyek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_alokasi` */

/*Table structure for table `tbl_coa` */

DROP TABLE IF EXISTS `tbl_coa`;

CREATE TABLE `tbl_coa` (
  `idcoa` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL DEFAULT '0',
  `kode` char(8) NOT NULL DEFAULT '0000',
  `nama` varchar(255) NOT NULL DEFAULT '-',
  `tipe` enum('db','cr') NOT NULL DEFAULT 'db',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idcoa`),
  KEY `parent` (`parent`),
  CONSTRAINT `tbl_coa_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `tbl_coa` (`idcoa`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_coa` */

insert  into `tbl_coa`(`idcoa`,`parent`,`kode`,`nama`,`tipe`,`status`,`created_at`,`updated_at`) values 
(0,0,'0000','Root','db',0,'2017-05-31 14:31:30','0000-00-00 00:00:00'),
(1,0,'1000','Asset','db',1,'2017-05-31 15:56:47','2017-05-31 08:56:47'),
(2,0,'1001','Aset Lancar','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(3,2,'1002','Kas','db',1,'2017-06-05 10:52:30','2017-06-05 03:50:44'),
(4,0,'1010','Bank','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(5,4,'1011','BNI','db',1,'2017-06-05 14:30:14','2017-06-05 07:30:14'),
(6,4,'1012','Bank Mandiri','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(7,4,'1013','Bank BRI','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(8,0,'1100','Piutang usaha','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(9,8,'1101','Piutang usaha pihak istimewa','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(10,8,'1120','Piutang usaha pihak ketiga','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(11,0,'1150','Piutang lain-lain','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(12,11,'1151','Piutang Karyawan','db',1,'2017-06-05 14:34:43','2017-06-05 07:34:43'),
(14,0,'1200','Uang Muka','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(15,14,'1201','Sewa dibayar dimuka','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(16,14,'1202','Asuransi dibayar dimuka','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(17,14,'1203','Biaya dibayar dimuka','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(18,0,'1250','Pajak dibayar dimuka','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(19,18,'1251','PPn Masukan','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(20,18,'1252','PPh 22','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(21,18,'1253','PPh 23','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(22,18,'1254','PPh 25','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(23,0,'1300','Aset Tetap','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(24,23,'1310','Aset Tetap – Tanah','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(25,23,'1320','Aset Tetap – Bangunan','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(26,23,'1321','Akumulasi penyusutan bangunan','cr',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(27,23,'1330','Aset Tetap – Perlengkapan Kantor','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(28,23,'1331','Akumulasi penyusutan perlengkapan kantor','cr',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(29,23,'1340','Aset Tetap – Sewa Guna Usaha','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(30,23,'1341','Akumulasi penyusutan Aset Sewa Guna Usaha','cr',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(31,23,'1400','Aset tidak lancar lainnya','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(32,23,'1401','Aset pajak tangguhan','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(33,0,'2000','LIABILITAS','cr',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(34,0,'2001','Kewajiban Lancar','cr',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(35,0,'2010','Utang usaha','cr',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(36,35,'2011','Utang usaha pihak hub istimewa','cr',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(37,35,'2012','Utang usaha pihak ketiga','cr',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(38,0,'2050','Utang lainnya','cr',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(39,38,'2051','Utang lainnya pihak hub istimewa','cr',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(40,38,'2052','Utang lainnya pihak ketiga','cr',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(41,0,'2100','Utang Pajak','cr',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(42,41,'2101','Utang PPh 21','cr',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(43,41,'2102','Utang PPh 23','cr',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(44,41,'2103','Utang PPh 25','cr',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(45,41,'2104','Utang PPh 29','cr',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(46,0,'2110','Biaya masih harus dibayar','cr',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(47,46,'2111','Biaya listrik, air dan telepon','cr',1,'2017-06-05 10:49:26','2017-06-05 03:49:26'),
(48,0,'2200','Kewajiban Jangka Panjang','cr',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(49,48,'2201','Utang Bank','cr',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(50,48,'2210','Utang Pembiayaan konsumen','cr',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(51,48,'2220','Liabilitas imbal kerja','cr',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(52,48,'2230','Liabilitas pajak tangguhan','cr',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(53,0,'3000','EKUITAS','cr',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(54,53,'3001','Modal','cr',1,'2017-05-31 17:20:53','0000-00-00 00:00:00'),
(55,53,'3002','Tambahan Modal disetor','cr',1,'2017-05-31 17:20:54','0000-00-00 00:00:00'),
(56,53,'3003','Dividen','db',1,'2017-05-31 17:20:55','0000-00-00 00:00:00'),
(57,53,'3010','Saldo Laba','cr',1,'2017-05-31 17:20:55','0000-00-00 00:00:00'),
(58,53,'3011','Laba tahun berjalan','cr',1,'2017-05-31 17:21:09','0000-00-00 00:00:00'),
(59,0,'4000','PENDAPATAN','cr',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(60,59,'4001','Pendapatan Jasa','cr',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(61,0,'5000','BEBAN','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(62,61,'5010','Beban Pemasaran','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(63,61,'5011','Beban iklan','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(64,61,'5020','Beban Umum Administrasi','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(65,61,'5021','Gaji pegawai','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(66,61,'5022','Tunjangan','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(67,61,'5023','Perjalanan dinas','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(68,61,'5024','Transportasi','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(69,61,'5025','Listrik, air, telepon','db',1,'2017-06-05 10:49:49','2017-06-05 03:49:49'),
(70,61,'5026','Jasa profesional','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(71,61,'5027','Peralatan kantor dan ATK','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(72,61,'5028','Pos, materai dan pengiriman','db',1,'2017-06-05 10:48:57','2017-06-05 03:48:57'),
(73,61,'5029','Rumah tangga kantor','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(74,61,'5030','Jamuan dan Sumbangan','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(75,0,'5050','Penyusutan','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(76,75,'5051','Penyusutan Bangunan','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(77,75,'5052','Penyusutan Perlengkapan Kantor','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(78,75,'5053','Penyustan Sewa Guna Usaha','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(79,75,'5060','Beban Umum administrasi lainnya','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(80,0,'6000','PENDAPATAN DILUAR USAHA','cr',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(81,80,'6001','Jasa giro','cr',1,'2017-05-31 17:21:11','0000-00-00 00:00:00'),
(82,80,'6002','Laba (rugi) selisih kurs','cr',1,'2017-05-31 17:21:12','0000-00-00 00:00:00'),
(83,80,'6003','Pendapatan lainnya','cr',1,'2017-05-31 17:21:24','0000-00-00 00:00:00'),
(84,0,'7000','BEBAN DILUAR USAHA','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(85,84,'7001','Bunga utang bank','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(86,84,'7002','Administrasi bank','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(87,84,'7003','Biaya provisi','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(88,84,'7004','Selisih pembulatan','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(89,84,'7005','Beban lainnya','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(90,0,'8000','BEBAN PAJAK','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(91,90,'8001','Beban Pajak','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(92,90,'8002','Beban/(Manfaat) Pajak tangguhan','db',1,'2017-05-31 16:09:29','0000-00-00 00:00:00'),
(97,3,'1002-1','Kas Kecil','db',1,'2017-06-05 07:28:44','2017-06-05 07:28:44'),
(98,18,'1254','PPh 21 Perorangan','db',1,'2017-06-05 07:36:51','2017-06-05 07:36:51');

/*Table structure for table `tbl_document` */

DROP TABLE IF EXISTS `tbl_document`;

CREATE TABLE `tbl_document` (
  `iddocument` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(20) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`iddocument`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_document` */

insert  into `tbl_document`(`iddocument`,`kategori`,`type`,`path`,`status`,`created_at`,`updated_at`) values 
(62,'kegiatan','gambar','kegiatan/pOLMNBny6HhK55o9jIIIGVxoqseIL4tG4QlrUYzN.jpeg',NULL,'2017-08-14 15:31:18','2017-08-14 15:31:18'),
(63,'kegiatan','gambar','kegiatan/rHYwfT8fAELBA8pgFzH8JirKBvPxdtAYn3P6JxY6.jpeg',NULL,'2017-08-14 15:31:18','2017-08-14 15:31:18'),
(64,'kegiatan','gambar','kegiatan/OQHUo9UcdXh6DZ5BmhR2u0Euv7x86NUwFazdRaOr.jpeg',0,'2017-08-14 16:26:04','2017-08-14 16:26:04'),
(65,'kegiatan','gambar','kegiatan/5h5GUFgI6iHXFSO0nBn6qxIuxZo4fMgyUpWz1chM.jpeg',0,'2017-08-14 16:26:04','2017-08-14 16:26:04');

/*Table structure for table `tbl_item` */

DROP TABLE IF EXISTS `tbl_item`;

CREATE TABLE `tbl_item` (
  `iditem` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL DEFAULT '0',
  `nama` varchar(255) NOT NULL,
  `harga` double DEFAULT '0',
  `status` tinyint(4) DEFAULT '0',
  `idsatuan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`iditem`),
  KEY `tbl_item_ibfk_1` (`idsatuan`),
  KEY `tbl_item_ibfk_2` (`parent`),
  CONSTRAINT `tbl_item_ibfk_1` FOREIGN KEY (`idsatuan`) REFERENCES `tbl_satuan` (`idsatuan`) ON UPDATE CASCADE,
  CONSTRAINT `tbl_item_ibfk_2` FOREIGN KEY (`parent`) REFERENCES `tbl_item` (`iditem`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_item` */

insert  into `tbl_item`(`iditem`,`parent`,`nama`,`harga`,`status`,`idsatuan`,`created_at`,`updated_at`) values 
(0,0,'root',0,0,27,'2017-05-30 17:34:06','0000-00-00 00:00:00'),
(1,0,'Biaya Langsung Non Personil',0,1,39,'2017-06-08 12:05:06','2017-06-08 05:05:06'),
(2,8,'Ahli Sumber Daya Air',5000000,1,8,'2017-06-08 11:57:04','2017-06-08 04:57:04'),
(3,19,'Ahli Ekonomi Pembangunan',7500000,1,8,'2017-06-08 11:45:11','2017-06-08 04:45:11'),
(4,19,'Ahli Pemetaan',7500000,1,8,'2017-06-08 11:46:37','2017-06-08 04:46:37'),
(5,8,'Ahli Lingkungan Hidup dan Pertanahan',5000000,1,8,'2017-06-08 11:55:17','2017-06-08 04:55:17'),
(6,13,'Belanja Fotocopy',150,1,7,'2017-06-08 12:22:58','2017-06-08 05:22:58'),
(8,18,'Ahli Pendamping',0,1,39,'2017-06-08 11:47:13','2017-06-08 04:47:13'),
(9,8,'Ahli Perencanaan Wilayah (Planologi)',5000000,1,8,'2017-06-08 11:48:01','2017-06-08 04:48:01'),
(10,19,'Ahli Prasarana Wilayah',7500000,1,8,'2017-06-08 11:45:52','2017-06-08 04:45:52'),
(11,8,'Ahli Industri',5000000,1,8,'2017-06-08 11:48:33','2017-06-08 04:48:33'),
(12,8,'Ahli Persampahan',5000000,1,8,'2017-06-08 11:49:36','2017-06-08 04:49:36'),
(13,1,'Bahan dan Alat',0,1,39,'2017-06-08 12:06:54','2017-06-08 05:06:54'),
(14,13,'Pengadaan Alat Tulis Kantor',7981900,1,40,'2017-06-08 12:29:43','2017-06-08 05:29:43'),
(15,19,'Ahli Perencanaan dan Pembangunan Wilayah',9000000,1,8,'2017-06-08 11:43:31','2017-06-08 04:43:31'),
(16,19,'Ahli Lingkungan hidup dan Pertanahan',9000000,1,8,'2017-06-08 11:44:17','2017-06-08 04:44:17'),
(17,13,'Belanja Materai',660000,1,40,'2017-06-08 12:30:51','2017-06-08 05:30:51'),
(18,0,'Biaya Langsung Personil',0,1,39,'2017-06-08 11:41:58','2017-06-08 04:41:58'),
(19,18,'Tenaga Ahli',0,1,39,'2017-06-08 11:42:33','2017-06-08 04:42:33'),
(20,1,'Konsumsi dan Akomodasi Tim Ahli',0,1,39,'2017-06-08 05:37:34','2017-06-08 05:37:34'),
(21,20,'Uang Harian Tim Ahli (3 Hari x 2 Kali)',650000,1,27,'2017-06-08 05:38:45','2017-06-08 05:38:45'),
(22,20,'Uang Penginapan Tim Ahli (2 Hari x 2 Kali)',610000,1,27,'2017-06-08 05:40:15','2017-06-08 05:40:15'),
(23,20,'Transport Tim Ahli PP (Bandung - PKU)',3701000,1,42,'2017-06-08 05:41:12','2017-06-08 05:41:12'),
(24,20,'Transport Lokal/ Taksi',140000,1,42,'2017-06-08 05:42:17','2017-06-08 05:42:17'),
(25,1,'Biaya Survey',0,1,39,'2017-06-08 05:42:50','2017-06-08 05:42:50'),
(26,25,'Kabupaten Siak',2270000,1,41,'2017-06-08 05:43:43','2017-06-08 05:43:43'),
(27,25,'Kabupaten Pelalawan',2520000,1,41,'2017-06-08 12:46:34','2017-06-08 05:46:34'),
(28,25,'Kabupaten Bengkalis',3800000,1,41,'2017-06-08 05:46:06','2017-06-08 05:46:06'),
(29,25,'Kota Dumai',2900000,1,41,'2017-06-08 05:47:09','2017-06-08 05:47:09'),
(30,1,'Konsumsi dan Akomodasi Tim Ahli',0,1,43,'2017-06-08 05:48:04','2017-06-08 05:48:04'),
(31,20,'Makan',25000,0,43,'2017-07-04 02:23:16','2017-07-03 19:23:16'),
(32,20,'Snack',15000,0,43,'2017-07-04 02:23:17','2017-07-03 19:23:17'),
(33,1,'Laporan',0,1,39,'2017-06-08 05:50:04','2017-06-08 05:50:04'),
(34,33,'Cetak Draft Laporan Awal',200000,1,44,'2017-06-08 05:54:06','2017-06-08 05:54:06'),
(35,33,'Cetak Draft Laporan Akhir',200000,1,44,'2017-06-08 05:54:34','2017-06-08 05:54:34'),
(36,33,'Cetak Buku Laporan',200000,1,44,'2017-06-08 05:55:16','2017-06-08 05:55:16'),
(37,33,'Album Peta',500000,1,44,'2017-06-08 05:56:28','2017-06-08 05:56:28'),
(38,18,'Ahli Kelautan',8000000,1,8,'2017-06-08 05:57:55','2017-06-08 05:57:55'),
(39,18,'Ahli Kelembagaan',5000000,1,8,'2017-06-08 05:58:51','2017-06-08 05:58:51'),
(40,18,'Operator Komputer',130000,1,27,'2017-07-04 02:22:59','2017-07-03 19:22:59');

/*Table structure for table `tbl_koordinasi` */

DROP TABLE IF EXISTS `tbl_koordinasi`;

CREATE TABLE `tbl_koordinasi` (
  `idkoordinasi` int(11) NOT NULL AUTO_INCREMENT,
  `nominal` double DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `keterangan` text,
  `idproyek` int(11) DEFAULT NULL,
  `iditem` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idkoordinasi`),
  KEY `koorproyek` (`idproyek`),
  KEY `kooritem` (`iditem`),
  CONSTRAINT `kooritem` FOREIGN KEY (`iditem`) REFERENCES `tbl_item` (`iditem`),
  CONSTRAINT `koorproyek` FOREIGN KEY (`idproyek`) REFERENCES `tbl_proyek` (`idproyek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_koordinasi` */

/*Table structure for table `tbl_operasional` */

DROP TABLE IF EXISTS `tbl_operasional`;

CREATE TABLE `tbl_operasional` (
  `idoperasional` int(11) NOT NULL AUTO_INCREMENT,
  `nooperasional` char(1) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` text,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idoperasional`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_operasional` */

/*Table structure for table `tbl_operasional_detail` */

DROP TABLE IF EXISTS `tbl_operasional_detail`;

CREATE TABLE `tbl_operasional_detail` (
  `idopsdetail` int(11) NOT NULL AUTO_INCREMENT,
  `nominal` double DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `keterangan` text,
  `idoperasional` int(11) DEFAULT NULL,
  `iditem` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idopsdetail`),
  KEY `opsdtl` (`idoperasional`),
  KEY `opsitem` (`iditem`),
  CONSTRAINT `opsdtl` FOREIGN KEY (`idoperasional`) REFERENCES `tbl_operasional` (`idoperasional`),
  CONSTRAINT `opsitem` FOREIGN KEY (`iditem`) REFERENCES `tbl_item` (`iditem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_operasional_detail` */

/*Table structure for table `tbl_proyek` */

DROP TABLE IF EXISTS `tbl_proyek`;

CREATE TABLE `tbl_proyek` (
  `idproyek` int(11) NOT NULL AUTO_INCREMENT,
  `noproyek` char(10) DEFAULT NULL,
  `proyek` varchar(255) DEFAULT NULL,
  `singkatnama` varchar(100) DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `duedate` date DEFAULT NULL,
  `anggaran` double DEFAULT NULL,
  `color` char(7) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `keterangan` text,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idproyek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_proyek` */

/*Table structure for table `tbl_rab` */

DROP TABLE IF EXISTS `tbl_rab`;

CREATE TABLE `tbl_rab` (
  `idrab` int(11) NOT NULL AUTO_INCREMENT,
  `nominal` double DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `keterangan` text,
  `idproyek` int(11) DEFAULT NULL,
  `iditem` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idrab`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_rab` */

/*Table structure for table `tbl_realisasi_alokasi` */

DROP TABLE IF EXISTS `tbl_realisasi_alokasi`;

CREATE TABLE `tbl_realisasi_alokasi` (
  `idrealalok` int(11) NOT NULL AUTO_INCREMENT,
  `nominal` double DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `keterangan` text,
  `idrealproyek` int(11) DEFAULT NULL,
  `idalokasi` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idrealalok`),
  KEY `realproyekalok` (`idrealproyek`),
  KEY `realalok` (`idalokasi`),
  CONSTRAINT `realalok` FOREIGN KEY (`idalokasi`) REFERENCES `tbl_alokasi` (`idalokasi`),
  CONSTRAINT `realproyekalok` FOREIGN KEY (`idrealproyek`) REFERENCES `tbl_realisasi_proyek` (`idrealproyek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_realisasi_alokasi` */

/*Table structure for table `tbl_realisasi_koordinasi` */

DROP TABLE IF EXISTS `tbl_realisasi_koordinasi`;

CREATE TABLE `tbl_realisasi_koordinasi` (
  `idrealkoor` int(11) NOT NULL AUTO_INCREMENT,
  `nominal` double DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `keterangan` text,
  `idrealproyek` int(11) DEFAULT NULL,
  `idkoordinasi` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idrealkoor`),
  KEY `realkoor` (`idkoordinasi`),
  KEY `realproyekkoor` (`idrealproyek`),
  CONSTRAINT `realkoor` FOREIGN KEY (`idkoordinasi`) REFERENCES `tbl_koordinasi` (`idkoordinasi`),
  CONSTRAINT `realproyekkoor` FOREIGN KEY (`idrealproyek`) REFERENCES `tbl_realisasi_proyek` (`idrealproyek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_realisasi_koordinasi` */

/*Table structure for table `tbl_realisasi_operasional` */

DROP TABLE IF EXISTS `tbl_realisasi_operasional`;

CREATE TABLE `tbl_realisasi_operasional` (
  `idrealops` int(11) NOT NULL AUTO_INCREMENT,
  `norealops` char(1) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` text,
  `status` tinyint(4) DEFAULT NULL,
  `idoperasional` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idrealops`),
  KEY `realops` (`idoperasional`),
  CONSTRAINT `realops` FOREIGN KEY (`idoperasional`) REFERENCES `tbl_operasional` (`idoperasional`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_realisasi_operasional` */

/*Table structure for table `tbl_realisasi_operasional_dtl` */

DROP TABLE IF EXISTS `tbl_realisasi_operasional_dtl`;

CREATE TABLE `tbl_realisasi_operasional_dtl` (
  `idrealopsdtl` int(11) NOT NULL AUTO_INCREMENT,
  `nominal` double DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `keterangan` text,
  `idrealops` int(11) DEFAULT NULL,
  `idopsdetail` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idrealopsdtl`),
  KEY `realdtlops` (`idrealops`),
  KEY `opsdtlreal` (`idopsdetail`),
  CONSTRAINT `opsdtlreal` FOREIGN KEY (`idopsdetail`) REFERENCES `tbl_operasional_detail` (`idopsdetail`),
  CONSTRAINT `realdtlops` FOREIGN KEY (`idrealops`) REFERENCES `tbl_realisasi_operasional` (`idrealops`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_realisasi_operasional_dtl` */

/*Table structure for table `tbl_realisasi_proyek` */

DROP TABLE IF EXISTS `tbl_realisasi_proyek`;

CREATE TABLE `tbl_realisasi_proyek` (
  `idrealproyek` int(11) NOT NULL AUTO_INCREMENT,
  `norealisasi` char(1) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` text,
  `type` enum('Alokasi Dana','Biaya Koordinasi') DEFAULT 'Alokasi Dana',
  `status` tinyint(4) DEFAULT NULL,
  `idproyek` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idrealproyek`),
  KEY `realproyek` (`idproyek`),
  CONSTRAINT `realproyek` FOREIGN KEY (`idproyek`) REFERENCES `tbl_proyek` (`idproyek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_realisasi_proyek` */

/*Table structure for table `tbl_satuan` */

DROP TABLE IF EXISTS `tbl_satuan`;

CREATE TABLE `tbl_satuan` (
  `idsatuan` int(11) NOT NULL AUTO_INCREMENT,
  `satuan` varchar(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idsatuan`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_satuan` */

insert  into `tbl_satuan`(`idsatuan`,`satuan`,`keterangan`,`status`,`created_at`,`updated_at`) values 
(7,'Lbr','Lembar',1,'2017-06-08 11:31:03','2017-06-08 04:31:03'),
(8,'OB','Orang Bulan',1,'2017-06-08 11:27:31','2017-06-08 04:27:31'),
(23,'M','Meter',1,'2017-05-30 18:01:12','2017-05-30 11:01:12'),
(27,'OH','Orang Hari',1,'2017-05-30 18:01:25','2017-05-30 11:01:25'),
(29,'KM','KiloMeter',1,'2017-06-06 14:46:16','2017-06-06 07:46:16'),
(38,'Pcs','Pieces',1,'2017-06-06 14:46:17','2017-06-06 07:46:17'),
(39,'-','-',1,'2017-06-08 04:16:58','2017-06-08 04:16:58'),
(40,'Pkt','Paket',1,'2017-06-08 04:31:59','2017-06-08 04:31:59'),
(41,'Ls','Lumpsum',1,'2017-06-08 04:33:23','2017-06-08 04:33:23'),
(42,'OT','Orang Trip',1,'2017-06-08 04:34:09','2017-06-08 04:34:09'),
(43,'Pax','Porsi',1,'2017-06-08 04:35:03','2017-06-08 04:35:03'),
(44,'Eks','Eksemplar',1,'2017-06-08 04:35:27','2017-06-08 04:35:27');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('SuperAdmin','Keuangan','TenagaAhli') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'TenagaAhli',
  `status` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`username`,`password`,`role`,`status`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Alwi Permana Sutrisna','alwips@gmail.com','alwips','$2y$10$a2mhbdX1zMnXGxQPUUVxw.wn.xECPHiqkU9nrethADf8NtC10IfKu','SuperAdmin',1,'u26dPDP0vxMYvOk8ESMgr61nBqt0tf2zSvyyXb8AgnRGAiG3FFUcJwjrlbAg','2017-05-19 23:19:56','2017-06-06 16:18:25'),
(2,'Administrator','admin@admin.com','admin','$2y$10$dxDeJkJyVw987kOYc/HzW.wSa5nasvECQTvtlO3oZn1QWPG1lEdBK','SuperAdmin',1,'vv2mvXV1P2q63JEEpFfBLTRfC26qahYrlHo4NI34kr5qct0pA3F48VL5r7lL','2017-05-20 03:23:45','2017-06-06 16:18:26'),
(3,'Tri Nursito','tri.nursito@gmail.com','citeng','$2y$10$wrZKclZttKvmRAvnz.THyeBQ.zvFq1e3AFkdhfiJ0ahwUKxrwRh..','TenagaAhli',1,NULL,'2017-06-05 05:01:39','2017-06-06 16:18:22'),
(4,'Rizqika','rizqikaamalia.ra@gmail.com','rizqikaamalia.ra@gmail.com','$2y$10$lyj7SXXWPGoAH4Wbiso.UetMZT/h1LNZe3.3pWvXS8RBBqFdkGhAW','SuperAdmin',1,'','2017-06-08 04:14:35','2017-06-08 04:14:35');

/* Function  structure for function  `CoaChild` */

/*!50003 DROP FUNCTION IF EXISTS `CoaChild` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `CoaChild`(GivenID INT) RETURNS varchar(1024) CHARSET latin1
    DETERMINISTIC
BEGIN

    DECLARE rv,queue_children VARCHAR(1024);
    DECLARE parentid INT;

    SET rv = '';
    SET parentid = FORMAT(GivenID,0);
    
    SELECT IFNULL(qc,'') INTO queue_children
    FROM (SELECT GROUP_CONCAT(idcoa) qc
    FROM tbl_coa WHERE parent = parentid) A;

      IF LENGTH(rv) = 0 THEN
         SET rv = queue_children;
      ELSE
         SET rv = CONCAT(rv,',',queue_children);
      END IF;

    RETURN rv;

END */$$
DELIMITER ;

/* Function  structure for function  `GetAncestry` */

/*!50003 DROP FUNCTION IF EXISTS `GetAncestry` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `GetAncestry`(GivenID INT) RETURNS varchar(1024) CHARSET latin1
    DETERMINISTIC
BEGIN
    DECLARE rv VARCHAR(1024);
    DECLARE cm CHAR(1);
    DECLARE ch INT;

    SET rv = '';
    SET cm = '';
    SET ch = GivenID;
    WHILE ch > 0 DO
        SELECT IFNULL(parent,-1) INTO ch FROM
        (SELECT parent FROM tbl_item WHERE iditem = ch) A;
        IF ch > 0 THEN
            SET rv = CONCAT(rv,cm,ch);
            SET cm = ',';
        END IF;
    END WHILE;
    RETURN rv;
END */$$
DELIMITER ;

/* Function  structure for function  `GetChild` */

/*!50003 DROP FUNCTION IF EXISTS `GetChild` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `GetChild`(GivenID INT) RETURNS varchar(1024) CHARSET latin1
    DETERMINISTIC
BEGIN

    DECLARE rv,queue_children VARCHAR(1024);
    DECLARE parentid INT;

    SET rv = '';
    SET parentid = FORMAT(GivenID,0);
    
    SELECT IFNULL(qc,'') INTO queue_children
    FROM (SELECT GROUP_CONCAT(iditem) qc
    FROM tbl_item WHERE parent = parentid) A;

      IF LENGTH(rv) = 0 THEN
         SET rv = queue_children;
      ELSE
         SET rv = CONCAT(rv,',',queue_children);
      END IF;

    RETURN rv;

END */$$
DELIMITER ;

/* Function  structure for function  `GetFamilyTree` */

/*!50003 DROP FUNCTION IF EXISTS `GetFamilyTree` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `GetFamilyTree`(GivenID INT) RETURNS varchar(1024) CHARSET latin1
    DETERMINISTIC
BEGIN

    DECLARE rv,q,queue,queue_children VARCHAR(1024);
    DECLARE queue_length,front_id,pos INT;

    SET rv = '';
    SET queue = GivenID;
    SET queue_length = 1;

    WHILE queue_length > 0 DO
        SET front_id = FORMAT(queue,0);
        IF queue_length = 1 THEN
            SET queue = '';
        ELSE
            SET pos = LOCATE(',',queue) + 1;
            SET q = SUBSTR(queue,pos);
            SET queue = q;
        END IF;
        SET queue_length = queue_length - 1;

        SELECT IFNULL(qc,'') INTO queue_children
        FROM (SELECT GROUP_CONCAT(iditem) qc
        FROM tbl_item WHERE parent = front_id) A;

        IF LENGTH(queue_children) = 0 THEN
            IF LENGTH(queue) = 0 THEN
                SET queue_length = 0;
            END IF;
        ELSE
            IF LENGTH(rv) = 0 THEN
                SET rv = queue_children;
            ELSE
                SET rv = CONCAT(rv,',',queue_children);
            END IF;
            IF LENGTH(queue) = 0 THEN
                SET queue = queue_children;
            ELSE
                SET queue = CONCAT(queue,',',queue_children);
            END IF;
            SET queue_length = LENGTH(queue) - LENGTH(REPLACE(queue,',','')) + 1;
        END IF;
    END WHILE;

    RETURN rv;

END */$$
DELIMITER ;

/* Function  structure for function  `GetParentIDByID` */

/*!50003 DROP FUNCTION IF EXISTS `GetParentIDByID` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `GetParentIDByID`(GivenID INT) RETURNS int(11)
    DETERMINISTIC
BEGIN
    DECLARE rv INT;

    SELECT IFNULL(parent,-1) INTO rv FROM
    (SELECT parent FROM tbl_item WHERE iditem = GivenID) A;
    RETURN rv;
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
