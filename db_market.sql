/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.20-MariaDB : Database - db_market
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_market` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_market`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` char(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `harga_jual` char(100) DEFAULT NULL,
  `stok` char(50) DEFAULT '0',
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `barang` */

insert  into `barang`(`id_barang`,`barcode`,`nama`,`harga_jual`,`stok`) values 
(1,'214118','Indomie Goreng Original','2000','68'),
(5,'415532','SilverQueen 62g','13000','35'),
(6,'435274','Aqua Botol 600ml','2500','0');

/*Table structure for table `beli_barang` */

DROP TABLE IF EXISTS `beli_barang`;

CREATE TABLE `beli_barang` (
  `id_beli_barang` int(11) NOT NULL AUTO_INCREMENT,
  `id_pembelian` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jumlah` char(20) DEFAULT NULL,
  `harga` char(20) DEFAULT NULL,
  PRIMARY KEY (`id_beli_barang`),
  KEY `id_barang` (`id_barang`),
  KEY `id_pembelian` (`id_pembelian`),
  CONSTRAINT `beli_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  CONSTRAINT `beli_barang_ibfk_2` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

/*Data for the table `beli_barang` */

insert  into `beli_barang`(`id_beli_barang`,`id_pembelian`,`id_barang`,`jumlah`,`harga`) values 
(21,109,1,'50','1500'),
(23,112,1,'12','2000'),
(24,112,1,'12','2000'),
(25,113,5,'5','12000');

/*Table structure for table `jual_barang` */

DROP TABLE IF EXISTS `jual_barang`;

CREATE TABLE `jual_barang` (
  `id_jual_barang` int(11) NOT NULL AUTO_INCREMENT,
  `id_penjualan` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jumlah` char(20) DEFAULT NULL,
  `harga` char(50) DEFAULT NULL,
  PRIMARY KEY (`id_jual_barang`),
  KEY `id_penjualan` (`id_penjualan`),
  KEY `id_barang` (`id_barang`),
  CONSTRAINT `jual_barang_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`),
  CONSTRAINT `jual_barang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=2147483648 DEFAULT CHARSET=utf8mb4;

/*Data for the table `jual_barang` */

/*Table structure for table `pembelian` */

DROP TABLE IF EXISTS `pembelian`;

CREATE TABLE `pembelian` (
  `id_pembelian` int(20) NOT NULL AUTO_INCREMENT,
  `waktu` datetime DEFAULT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `kode` char(20) DEFAULT NULL,
  PRIMARY KEY (`id_pembelian`),
  KEY `id_supplier` (`id_supplier`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`),
  CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pembelian` */

insert  into `pembelian`(`id_pembelian`,`waktu`,`id_supplier`,`id_user`,`kode`) values 
(108,'2022-03-08 07:03:35',1,21,'20220308070335'),
(109,'2022-03-08 07:03:47',1,21,'20220308070347'),
(111,'2022-03-10 04:03:08',1,21,'20220310040308'),
(112,'2022-03-10 04:03:46',1,21,'20220310040346'),
(113,'2022-03-10 06:24:38',1,21,'20220310062438'),
(115,'2022-03-10 09:11:24',1,20,'20220310091124'),
(117,'2022-03-10 09:56:04',1,21,'20220310095604'),
(118,'2022-03-11 01:37:28',2,20,'20220311013728'),
(119,'2022-03-11 01:50:18',2,20,'20220311015018'),
(120,'2022-03-11 01:50:27',1,20,'20220311015027');

/*Table structure for table `penjualan` */

DROP TABLE IF EXISTS `penjualan`;

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL AUTO_INCREMENT,
  `waktu` datetime DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `kode` char(14) DEFAULT NULL,
  PRIMARY KEY (`id_penjualan`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

/*Data for the table `penjualan` */

insert  into `penjualan`(`id_penjualan`,`waktu`,`id_user`,`kode`) values 
(12,'2022-03-14 02:18:33',20,'20220314021833'),
(13,'2022-03-14 02:20:39',20,'20220314022039'),
(14,'2022-03-14 02:29:57',20,'20220314022957'),
(15,'2022-03-14 02:32:36',20,'20220314023236');

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `telp` char(15) DEFAULT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `supplier` */

insert  into `supplier`(`id_supplier`,`nama`,`alamat`,`telp`) values 
(1,'Toko Hemat Bersahaja','Jln. Soklat No.55','5245434546'),
(2,'Toko Murah Bergaransi','Jln. Supratno No.35','85156525736');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(50) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(30) DEFAULT NULL,
  `Username` varchar(15) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Level` enum('pemilik','gudang','kasir') DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`id_user`,`Nama`,`Username`,`Password`,`Level`) values 
(1,'Rifki Nurmansyah','admin','21232f297a57a5a743894a0e4a801fc3','pemilik'),
(20,'Citra Rahayu','kasir','c7911af3adbd12a035b289556d96470a','kasir'),
(21,'Reza Ramadhan','gudang','202446dd1d6028084426867365b0c7a1','gudang');

/* Trigger structure for table `beli_barang` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `beli_barang_tambah` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `beli_barang_tambah` AFTER INSERT ON `beli_barang` FOR EACH ROW BEGIN
	update barang set stok=stok+new.`jumlah` where id_barang=new.`id_barang`;
    END */$$


DELIMITER ;

/* Trigger structure for table `beli_barang` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `beli_barang_batal` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `beli_barang_batal` BEFORE DELETE ON `beli_barang` FOR EACH ROW BEGIN
update barang set stok=stok-old.`jumlah` where id_barang=old.`id_barang`;
    END */$$


DELIMITER ;

/* Trigger structure for table `jual_barang` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `jual_barang_tambah` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `jual_barang_tambah` AFTER INSERT ON `jual_barang` FOR EACH ROW BEGIN
	update barang set stok=stok-NEW.jumlah where id_barang=NEW.id_barang;
    END */$$


DELIMITER ;

/* Trigger structure for table `jual_barang` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `jual_barang_hapus` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `jual_barang_hapus` BEFORE DELETE ON `jual_barang` FOR EACH ROW BEGIN
	UPDATE barang SET stok=stok+OLD.jumlah WHERE id_barang=OLD.id_barang;
    END */$$


DELIMITER ;

/* Trigger structure for table `pembelian` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `hapus_pembelian` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `hapus_pembelian` BEFORE DELETE ON `pembelian` FOR EACH ROW BEGIN
	delete from beli_barang where id_pembelian=old.id_pembelian;
    END */$$


DELIMITER ;

/* Trigger structure for table `penjualan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `hapus_penjualan` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `hapus_penjualan` BEFORE DELETE ON `penjualan` FOR EACH ROW BEGIN
	delete from jual_barang where id_penjualan=old.id_penjualan;
    END */$$


DELIMITER ;

/*Table structure for table `list_beli_barang` */

DROP TABLE IF EXISTS `list_beli_barang`;

/*!50001 DROP VIEW IF EXISTS `list_beli_barang` */;
/*!50001 DROP TABLE IF EXISTS `list_beli_barang` */;

/*!50001 CREATE TABLE  `list_beli_barang`(
 `id_beli_barang` int(11) ,
 `id_pembelian` int(11) ,
 `id_barang` int(11) ,
 `jumlah` char(20) ,
 `harga` char(20) ,
 `total` double ,
 `barcode` char(50) ,
 `nama` varchar(100) 
)*/;

/*Table structure for table `pembelian_list` */

DROP TABLE IF EXISTS `pembelian_list`;

/*!50001 DROP VIEW IF EXISTS `pembelian_list` */;
/*!50001 DROP TABLE IF EXISTS `pembelian_list` */;

/*!50001 CREATE TABLE  `pembelian_list`(
 `id_pembelian` int(20) ,
 `kode` char(20) ,
 `waktu` datetime ,
 `nama` varchar(200) ,
 `total` double 
)*/;

/*Table structure for table `penjualan_list` */

DROP TABLE IF EXISTS `penjualan_list`;

/*!50001 DROP VIEW IF EXISTS `penjualan_list` */;
/*!50001 DROP TABLE IF EXISTS `penjualan_list` */;

/*!50001 CREATE TABLE  `penjualan_list`(
 `id_jual_barang` int(11) ,
 `id_penjualan` int(11) ,
 `kode` char(14) ,
 `waktu` datetime ,
 `nama` varchar(30) ,
 `total` double 
)*/;

/*Table structure for table `struk_penjualan` */

DROP TABLE IF EXISTS `struk_penjualan`;

/*!50001 DROP VIEW IF EXISTS `struk_penjualan` */;
/*!50001 DROP TABLE IF EXISTS `struk_penjualan` */;

/*!50001 CREATE TABLE  `struk_penjualan`(
 `id_jual_barang` int(11) ,
 `id_penjualan` int(11) ,
 `id_barang` int(11) ,
 `jumlah` char(20) ,
 `harga` char(50) ,
 `barcode` char(50) ,
 `nama` varchar(100) 
)*/;

/*View structure for view list_beli_barang */

/*!50001 DROP TABLE IF EXISTS `list_beli_barang` */;
/*!50001 DROP VIEW IF EXISTS `list_beli_barang` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `list_beli_barang` AS (select `beli_barang`.`id_beli_barang` AS `id_beli_barang`,`beli_barang`.`id_pembelian` AS `id_pembelian`,`beli_barang`.`id_barang` AS `id_barang`,`beli_barang`.`jumlah` AS `jumlah`,`beli_barang`.`harga` AS `harga`,`beli_barang`.`jumlah` * `beli_barang`.`harga` AS `total`,`barang`.`barcode` AS `barcode`,`barang`.`nama` AS `nama` from (`beli_barang` join `barang`) where `beli_barang`.`id_barang` = `barang`.`id_barang`) */;

/*View structure for view pembelian_list */

/*!50001 DROP TABLE IF EXISTS `pembelian_list` */;
/*!50001 DROP VIEW IF EXISTS `pembelian_list` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pembelian_list` AS (select `pembelian`.`id_pembelian` AS `id_pembelian`,`pembelian`.`kode` AS `kode`,`pembelian`.`waktu` AS `waktu`,`supplier`.`nama` AS `nama`,sum(`beli_barang`.`jumlah` * `beli_barang`.`harga`) AS `total` from ((`supplier` join `pembelian`) join `beli_barang`) where `supplier`.`id_supplier` = `pembelian`.`id_supplier` and `pembelian`.`id_pembelian` = `beli_barang`.`id_pembelian` group by `pembelian`.`id_pembelian`) */;

/*View structure for view penjualan_list */

/*!50001 DROP TABLE IF EXISTS `penjualan_list` */;
/*!50001 DROP VIEW IF EXISTS `penjualan_list` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `penjualan_list` AS (select `jual_barang`.`id_jual_barang` AS `id_jual_barang`,`penjualan`.`id_penjualan` AS `id_penjualan`,`penjualan`.`kode` AS `kode`,`penjualan`.`waktu` AS `waktu`,`user`.`Nama` AS `nama`,sum(`jual_barang`.`jumlah` * `jual_barang`.`harga`) AS `total` from ((`user` join `penjualan`) join `jual_barang`) where `penjualan`.`id_penjualan` = `penjualan`.`id_user` and `penjualan`.`id_penjualan` = `jual_barang`.`id_penjualan` group by `penjualan`.`id_penjualan`) */;

/*View structure for view struk_penjualan */

/*!50001 DROP TABLE IF EXISTS `struk_penjualan` */;
/*!50001 DROP VIEW IF EXISTS `struk_penjualan` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `struk_penjualan` AS (select `jual_barang`.`id_jual_barang` AS `id_jual_barang`,`jual_barang`.`id_penjualan` AS `id_penjualan`,`barang`.`id_barang` AS `id_barang`,`jual_barang`.`jumlah` AS `jumlah`,`jual_barang`.`harga` AS `harga`,`barang`.`barcode` AS `barcode`,`barang`.`nama` AS `nama` from (`barang` join `jual_barang`) where `barang`.`id_barang` = `jual_barang`.`id_barang`) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
