/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.3.27-MariaDB : Database - cekingxm_sidila
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cekingxm_sidila` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `cekingxm_sidila`;

/*Table structure for table `ref_agama` */

DROP TABLE IF EXISTS `ref_agama`;

CREATE TABLE `ref_agama` (
  `id` int(11) NOT NULL,
  `agama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ref_agama` */

insert  into `ref_agama`(`id`,`agama`) values (1,'Islam'),(2,'Kristen'),(3,'Katholik'),(4,'Hindu'),(5,'Budha'),(6,'Kong Hucu'),(7,'Kepercayaan Terhadap Tuhan Yang Maha Esa'),(8,'Lainnya');

/*Table structure for table `ref_akta_cerai` */

DROP TABLE IF EXISTS `ref_akta_cerai`;

CREATE TABLE `ref_akta_cerai` (
  `id` int(11) NOT NULL,
  `akta_cerai` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ref_akta_cerai` */

insert  into `ref_akta_cerai`(`id`,`akta_cerai`) values (1,'Tidak Ada'),(2,'Ada');

/*Table structure for table `ref_akta_lahir` */

DROP TABLE IF EXISTS `ref_akta_lahir`;

CREATE TABLE `ref_akta_lahir` (
  `id` int(11) NOT NULL,
  `akta_lahir` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ref_akta_lahir` */

insert  into `ref_akta_lahir`(`id`,`akta_lahir`) values (1,'Tidak Ada'),(2,'Ada');

/*Table structure for table `ref_akta_perkawinan` */

DROP TABLE IF EXISTS `ref_akta_perkawinan`;

CREATE TABLE `ref_akta_perkawinan` (
  `id` int(11) NOT NULL,
  `akta_perkawinan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ref_akta_perkawinan` */

insert  into `ref_akta_perkawinan`(`id`,`akta_perkawinan`) values (1,'Tidak Ada'),(2,'Ada');

/*Table structure for table `ref_banjar` */

DROP TABLE IF EXISTS `ref_banjar`;

CREATE TABLE `ref_banjar` (
  `banjar_id` int(11) NOT NULL AUTO_INCREMENT,
  `banjar_wilayah_id` int(11) DEFAULT NULL,
  `banjar_nama` varchar(255) DEFAULT NULL,
  `banjar_created_at` timestamp NULL DEFAULT current_timestamp(),
  `banjar_updated_at` timestamp NULL DEFAULT current_timestamp(),
  `banjar_is_deleted` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`banjar_id`),
  KEY `ref_banjar_FK` (`banjar_wilayah_id`),
  CONSTRAINT `ref_banjar_FK` FOREIGN KEY (`banjar_wilayah_id`) REFERENCES `ref_wilayah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `ref_banjar` */

insert  into `ref_banjar`(`banjar_id`,`banjar_wilayah_id`,`banjar_nama`,`banjar_created_at`,`banjar_updated_at`,`banjar_is_deleted`) values (1,66,'Banjar Dinas Blangsinge','2020-10-07 17:41:21','2020-10-22 07:49:09',NULL),(2,66,'Banjar Dinas Sema','2020-10-07 17:41:29','2020-10-07 17:41:29',0),(3,66,'Banjar Dinas Kawan','2020-10-07 17:41:39','2020-10-07 17:41:39',0),(4,66,'Banjar Dinas Tengah','2020-10-07 17:41:48','2020-10-07 17:41:48',0),(5,66,'Banjar Dinas Tegallulung','2020-10-07 17:42:00','2020-10-07 17:42:00',0),(6,66,'Banjar Dinas Banda','2020-10-07 17:42:10','2020-10-07 17:42:10',0),(7,66,'Banjar Dinas Pinda','2020-10-07 17:42:17','2020-10-07 17:42:17',0),(8,66,'Banjar Dinas Saba','2020-10-07 17:42:26','2020-10-09 07:35:54',NULL),(9,66,'Banjar Kaja Kangin','2020-11-13 10:02:39','2020-11-13 10:02:39',0);

/*Table structure for table `ref_cacat` */

DROP TABLE IF EXISTS `ref_cacat`;

CREATE TABLE `ref_cacat` (
  `id` int(11) NOT NULL,
  `cacat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ref_cacat` */

insert  into `ref_cacat`(`id`,`cacat`) values (0,'Tidak Ada'),(1,'Cacat  Fisik'),(2,'Cacat Netra atau Buta'),(3,'Cacat Rungu atau Wicara'),(4,'Cacat Mental atau Jiwa'),(5,'Cacat FIsik dan Mental'),(6,'Cacat Lainnya');

/*Table structure for table `ref_detail_layanan_form` */

DROP TABLE IF EXISTS `ref_detail_layanan_form`;

CREATE TABLE `ref_detail_layanan_form` (
  `detail_layanan_form_id` int(11) NOT NULL AUTO_INCREMENT,
  `detail_layanan_form_layanan_id` int(11) DEFAULT NULL,
  `detail_layanan_form_jenis_form_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`detail_layanan_form_id`),
  KEY `detail_layanan_form_jenis_form_id` (`detail_layanan_form_jenis_form_id`),
  KEY `detail_layanan_form_layanan_id` (`detail_layanan_form_layanan_id`),
  CONSTRAINT `ref_detail_layanan_form_ibfk_2` FOREIGN KEY (`detail_layanan_form_jenis_form_id`) REFERENCES `ref_jenis_form` (`jenis_form_id`),
  CONSTRAINT `ref_detail_layanan_form_ibfk_3` FOREIGN KEY (`detail_layanan_form_layanan_id`) REFERENCES `ref_layanan` (`layanan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `ref_detail_layanan_form` */

insert  into `ref_detail_layanan_form`(`detail_layanan_form_id`,`detail_layanan_form_layanan_id`,`detail_layanan_form_jenis_form_id`) values (1,1,1),(2,3,5);

/*Table structure for table `ref_detail_layanan_lampiran` */

DROP TABLE IF EXISTS `ref_detail_layanan_lampiran`;

CREATE TABLE `ref_detail_layanan_lampiran` (
  `detail_layanan_lampiran_id` int(11) NOT NULL AUTO_INCREMENT,
  `detail_layanan_lampiran_layanan_id` int(11) DEFAULT NULL,
  `detail_layanan_lampiran_nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`detail_layanan_lampiran_id`),
  KEY `detail_layanan_lampiran_layanan_id` (`detail_layanan_lampiran_layanan_id`),
  CONSTRAINT `ref_detail_layanan_lampiran_ibfk_1` FOREIGN KEY (`detail_layanan_lampiran_layanan_id`) REFERENCES `ref_layanan` (`layanan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `ref_detail_layanan_lampiran` */

insert  into `ref_detail_layanan_lampiran`(`detail_layanan_lampiran_id`,`detail_layanan_lampiran_layanan_id`,`detail_layanan_lampiran_nama`) values (1,2,'Surat Pengantar dari Desa'),(2,2,'Fotocopy KK');

/*Table structure for table `ref_gelar` */

DROP TABLE IF EXISTS `ref_gelar`;

CREATE TABLE `ref_gelar` (
  `id` int(11) NOT NULL,
  `gelar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ref_gelar` */

insert  into `ref_gelar`(`id`,`gelar`) values (1,'Gelar 1'),(2,'Gelar 2'),(3,'Gelar 3');

/*Table structure for table `ref_goldar` */

DROP TABLE IF EXISTS `ref_goldar`;

CREATE TABLE `ref_goldar` (
  `id` int(11) NOT NULL,
  `goldar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ref_goldar` */

insert  into `ref_goldar`(`id`,`goldar`) values (1,'A'),(2,'B'),(3,'AB'),(4,'O'),(5,'A Positif'),(6,'A Negatif'),(7,'B Positif'),(8,'B Negatif'),(9,'AB Positif'),(10,'AB Negatif'),(11,'O Positif'),(12,'O Negatif'),(13,'Tidak Tahu');

/*Table structure for table `ref_hubkel` */

DROP TABLE IF EXISTS `ref_hubkel`;

CREATE TABLE `ref_hubkel` (
  `id` int(11) NOT NULL,
  `hkkel` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ref_hubkel` */

insert  into `ref_hubkel`(`id`,`hkkel`) values (1,'Kepala Keluarga'),(2,'Suami'),(3,'Istri'),(4,'Anak'),(5,'Menantu'),(6,'Cucu'),(7,'Orang Tua'),(8,'Mertua'),(9,'Famili Lain'),(10,'Pembantu'),(11,'Lainnya');

/*Table structure for table `ref_jenis_form` */

DROP TABLE IF EXISTS `ref_jenis_form`;

CREATE TABLE `ref_jenis_form` (
  `jenis_form_id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_form_nama_tabel` varchar(255) DEFAULT NULL,
  `jenis_form_id_tabel` varchar(255) DEFAULT NULL COMMENT 'Nama field id di tabel bersangkutan',
  `jenis_form_id_pengajuan` varchar(255) DEFAULT NULL COMMENT 'Nama field foreign key ke ta_pengajuan di tabel bersangkutan',
  `jenis_form_nama` varchar(255) DEFAULT NULL,
  `jenis_form_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`jenis_form_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `ref_jenis_form` */

insert  into `ref_jenis_form`(`jenis_form_id`,`jenis_form_nama_tabel`,`jenis_form_id_tabel`,`jenis_form_id_pengajuan`,`jenis_form_nama`,`jenis_form_url`) values (1,'ta_f101','f101_id','f101_pengajuan_id','f-1.01','pengajuan/f101/'),(2,'ta_f202','f202_id','f202_pengajuan_id','f-2.02','pengajuan/f202/'),(3,'ta_f212','f212_id','f212_pengajuan_id','f-2.12','pengajuan/f212/'),(4,'ta_f219','f219_id','f219_pengajuan_id','f-2.19','pengajuan/f219/'),(5,'ta_ket_tidak_mampu','ktm_id','ktm_pengajuan_id','Keterangan Tidak Mampu','permohonan/surat-keterangan/ket-tidak-mampu');

/*Table structure for table `ref_jenis_kelahiran` */

DROP TABLE IF EXISTS `ref_jenis_kelahiran`;

CREATE TABLE `ref_jenis_kelahiran` (
  `jenis_kelahiran_id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_kelahiran_nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`jenis_kelahiran_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `ref_jenis_kelahiran` */

insert  into `ref_jenis_kelahiran`(`jenis_kelahiran_id`,`jenis_kelahiran_nama`) values (1,'Tunggal'),(2,'Kembar 2'),(3,'Kembar 3'),(4,'Kembar 4'),(5,'Lainnya');

/*Table structure for table `ref_kawin` */

DROP TABLE IF EXISTS `ref_kawin`;

CREATE TABLE `ref_kawin` (
  `id` int(11) NOT NULL,
  `kawin` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ref_kawin` */

insert  into `ref_kawin`(`id`,`kawin`) values (1,'Belum Kawin'),(2,'Kawin'),(3,'Cerai Hidup'),(4,'Cerai Mati');

/*Table structure for table `ref_kelainan` */

DROP TABLE IF EXISTS `ref_kelainan`;

CREATE TABLE `ref_kelainan` (
  `id` int(11) NOT NULL,
  `kelainan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ref_kelainan` */

insert  into `ref_kelainan`(`id`,`kelainan`) values (1,'Tidak Ada'),(2,'Ada');

/*Table structure for table `ref_kelamin` */

DROP TABLE IF EXISTS `ref_kelamin`;

CREATE TABLE `ref_kelamin` (
  `id` int(11) NOT NULL,
  `kelamin` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ref_kelamin` */

insert  into `ref_kelamin`(`id`,`kelamin`) values (1,'Laki-laki'),(2,'Perempuan');

/*Table structure for table `ref_kewarganegaraan` */

DROP TABLE IF EXISTS `ref_kewarganegaraan`;

CREATE TABLE `ref_kewarganegaraan` (
  `kewarganegaraan_id` int(11) NOT NULL AUTO_INCREMENT,
  `kewarganegaraan_nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kewarganegaraan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `ref_kewarganegaraan` */

insert  into `ref_kewarganegaraan`(`kewarganegaraan_id`,`kewarganegaraan_nama`) values (1,'WNI'),(2,'WNA');

/*Table structure for table `ref_layanan` */

DROP TABLE IF EXISTS `ref_layanan`;

CREATE TABLE `ref_layanan` (
  `layanan_id` int(11) NOT NULL AUTO_INCREMENT,
  `layanan_nama` varchar(255) DEFAULT NULL,
  `layanan_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `layanan_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `layanan_is_deleted` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`layanan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `ref_layanan` */

insert  into `ref_layanan`(`layanan_id`,`layanan_nama`,`layanan_created_at`,`layanan_updated_at`,`layanan_is_deleted`) values (1,'Penerbitan KK Baru','2020-10-06 09:12:48','0000-00-00 00:00:00',0),(2,'Penerbitan KTP Baru','2020-12-17 19:39:40','0000-00-00 00:00:00',0),(3,'Permohonan Surat Keterangan Tidak mampu','2020-12-17 19:39:40','0000-00-00 00:00:00',0);

/*Table structure for table `ref_pekerjaan` */

DROP TABLE IF EXISTS `ref_pekerjaan`;

CREATE TABLE `ref_pekerjaan` (
  `id` int(11) NOT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ref_pekerjaan` */

insert  into `ref_pekerjaan`(`id`,`pekerjaan`) values (1,'Belum atau Tidak Bekerja'),(2,'Mengurus Rumah Tangga'),(3,'Pelajar atau Mahasiswa'),(4,'Pensiunan'),(5,'Pegawai Negeri Sipil (PNS)'),(6,'Tentara Nasional Indonesia (TNI)'),(7,'Kepolisian RI (POLRI)'),(8,'Perdagangan'),(9,'Petani atau Pekebun'),(10,'Peternak'),(11,'Nelayan atau Perikanan'),(12,'Industri'),(13,'Konstruksi'),(14,'Transportasi'),(15,'Karyawan Swasta'),(16,'Karyawan BUMN'),(17,'Karyawan BUMD'),(18,'Karyawan Honor'),(19,'Buruh Harian Lepas'),(20,'Buruh Tani atau Perkebunan'),(21,'Buruh Nelayan atau Perikanan'),(22,'Buruh Peternakan'),(23,'Pembantu Rumah Tangga'),(24,'Tukang Cukur'),(25,'Tukang Listrik '),(26,'Tukang Batu'),(27,'Tukang Kayu'),(28,'Tukang Sol Sepatu'),(29,'Tukang Las atau Pandai Besi'),(30,'Tukang Jahit'),(31,'Tukang Gigi'),(32,'Penata Rias'),(33,'Penata Busana'),(34,'Penata Rambut'),(35,'Mekanik'),(36,'Seniman'),(37,'Tabib'),(38,'Paraji'),(39,'Perancang Busana'),(40,'Penterjemah'),(41,'Imam Masjid'),(42,'Pendeta'),(43,'Pastor'),(44,'Wartawan'),(45,'Uztad atau Mubaligh'),(46,'Juru Masak'),(47,'Promotor Acara'),(48,'Anggota DPR RI'),(49,'Anggota DPD'),(50,'Anggota BPK'),(51,'Presiden'),(52,'Wakil Presiden'),(53,'Anggota Mahkamah Konstitusi'),(54,'Anggota Kabinet atau Kementerian'),(55,'Duta Besar'),(56,'Gubernur'),(57,'Wakil Gubernur'),(58,'Bupati'),(59,'Wakil Bupati'),(60,'Walikota'),(61,'Wakil Walikota'),(62,'Anggota DPRD Provinsi'),(63,'Anggota DPRD Kabupaten atau Kota'),(64,'Dosen'),(65,'Guru'),(66,'Pilot'),(67,'Pengacara'),(68,'Notaris'),(69,'Arsitek'),(70,'Akuntan'),(71,'Konsultan'),(72,'Dokter'),(73,'Bidan'),(74,'Perawat'),(75,'Apoteker'),(76,'Psikiater atau Psikolog'),(77,'Penyiar Tekevisi'),(78,'Penyiar Radio'),(79,'Pelaut'),(80,'Peneliti'),(81,'Sopir'),(82,'Pialang'),(83,'Paranormal'),(84,'Pedagang'),(85,'Perangkat Desa'),(86,'Kepala Desa'),(87,'Biarawati'),(88,'Wiraswasta'),(89,'Lainnya');

/*Table structure for table `ref_pendidikan` */

DROP TABLE IF EXISTS `ref_pendidikan`;

CREATE TABLE `ref_pendidikan` (
  `id` int(11) NOT NULL,
  `pendidikan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ref_pendidikan` */

insert  into `ref_pendidikan`(`id`,`pendidikan`) values (0,NULL),(1,'Tidak atau Belum Sekolah'),(2,'Belum Tamat SD atau Sederajat'),(3,'Tamat SD atau Sederajat'),(4,'SLTP atau Sederajat'),(5,'SLTA atau Sederajat'),(6,'Diploma I atau II'),(7,'Akademi atau Diploma III atau Sarjana Muda'),(8,'Diploma IV atau Strata I'),(9,'Strata II'),(10,'Strata III');

/*Table structure for table `ref_penolong_kelahirann` */

DROP TABLE IF EXISTS `ref_penolong_kelahirann`;

CREATE TABLE `ref_penolong_kelahirann` (
  `penolong_kelahiran_id` int(11) NOT NULL AUTO_INCREMENT,
  `penolong_kelahiran_nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`penolong_kelahiran_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `ref_penolong_kelahirann` */

insert  into `ref_penolong_kelahirann`(`penolong_kelahiran_id`,`penolong_kelahiran_nama`) values (1,'Dokter'),(2,'Bidan/Perawat'),(3,'Dukun'),(4,'Lainnya');

/*Table structure for table `ref_status_pengajuan` */

DROP TABLE IF EXISTS `ref_status_pengajuan`;

CREATE TABLE `ref_status_pengajuan` (
  `status_pengajuan_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_pengajuan_deskripsi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`status_pengajuan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `ref_status_pengajuan` */

insert  into `ref_status_pengajuan`(`status_pengajuan_id`,`status_pengajuan_deskripsi`) values (1,'DALAM PENGAJUAN'),(2,'DIPROSES'),(3,'TAHAP 3'),(4,'TAHAP 4'),(5,'TAHAP 5'),(6,'TAHAP 6'),(7,'DITOLAK'),(8,'SELESAI'),(9,'MENUNGGU KEDATANGAN KE CAPIL');

/*Table structure for table `ref_tempat_dilahirkan` */

DROP TABLE IF EXISTS `ref_tempat_dilahirkan`;

CREATE TABLE `ref_tempat_dilahirkan` (
  `tempat_dilahirkan_id` int(11) NOT NULL AUTO_INCREMENT,
  `tempat_dilahirkan_nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tempat_dilahirkan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `ref_tempat_dilahirkan` */

insert  into `ref_tempat_dilahirkan`(`tempat_dilahirkan_id`,`tempat_dilahirkan_nama`) values (1,'RS/RB'),(2,'Puskesmas'),(3,'Polindes'),(4,'Rumah'),(5,'Lainnya');

/*Table structure for table `ref_user` */

DROP TABLE IF EXISTS `ref_user`;

CREATE TABLE `ref_user` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(255) COLLATE latin1_bin NOT NULL,
  `user_password` varchar(255) COLLATE latin1_bin NOT NULL,
  `user_nama` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `user_foto` varchar(255) COLLATE latin1_bin NOT NULL,
  `user_wilayah_id` int(11) DEFAULT NULL,
  `user_user_role_id` int(11) NOT NULL,
  `user_created_at` timestamp NULL DEFAULT current_timestamp(),
  `user_updated_at` timestamp NULL DEFAULT NULL,
  `user_is_deleted` tinyint(4) DEFAULT 0,
  `user_login_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`),
  KEY `ref_user_FK` (`user_user_role_id`),
  KEY `ref_user_FK_1` (`user_wilayah_id`),
  CONSTRAINT `ref_user_FK` FOREIGN KEY (`user_user_role_id`) REFERENCES `ref_user_role` (`user_role_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ref_user_FK_1` FOREIGN KEY (`user_wilayah_id`) REFERENCES `ref_wilayah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

/*Data for the table `ref_user` */

insert  into `ref_user`(`user_id`,`user_username`,`user_password`,`user_nama`,`user_foto`,`user_wilayah_id`,`user_user_role_id`,`user_created_at`,`user_updated_at`,`user_is_deleted`,`user_login_at`) values (1,'superadmin','$2y$10$uj4PY724a5eEILvHcmYnjeBFWaKddZpdLtKSmipj9.7PjHOnTFWbq','SUPER','default.jpg',NULL,1,'2020-09-28 08:58:46',NULL,NULL,'2020-11-26 02:45:47'),(2,'admincapil1','$2y$10$6sXMyLXvNO9LQg2BnVKFje83IcyIUQzHRYeSuP2oC/2GUvJK9C9Lm','CAPIL 1','default.jpg',NULL,2,'2020-09-28 09:47:20',NULL,NULL,'2020-10-22 02:28:55'),(3,'admin-blahbatuh','$2y$10$TDgqCatKwaeUVYg7I.oQKu9ui98gpt2jfhgD.OtlH0tIa6GCNlENe','KADEK ADI','default.jpg',66,3,'2020-10-07 10:54:03',NULL,0,'2020-10-08 02:18:53'),(4,'cekingx','$2y$10$tRG2nnZWPc9K6sd2dXtWD.pN3OJ/VFWjXDYkrURfPQwEIxL57ooSm','WAYAN RAKA','default.jpg',66,3,'2020-10-08 10:22:05',NULL,0,'2020-12-17 12:36:11'),(5,'cekingxcapil','$2y$10$gXNtwjDC80.u.lGGUvOQiuh5WmUKMv6eBSXdMzZWU3v1vEofuFvsy','Ketut Joni','default.jpg',NULL,2,'2020-10-22 10:41:22',NULL,0,'2020-11-26 02:46:46'),(6,'5104054107400135','$2y$10$fW/Q0HXftOeHE5vKbsF09ud/iC4QMBeLKg4MoGnrGTne90ny1Bnoa','NI MADE RUTIT','default.jpg',57,4,'2020-10-26 21:57:56',NULL,0,'2020-10-27 05:06:11'),(7,'5104023101640001','$2y$10$fjtPlXnNGrvTHMDGVy3oCecQNJTr27K5pUUZoyHLNUUA/ZrlI15Ye','I WAYAN SUDIRA','default.jpg',66,4,'2020-10-27 07:54:19',NULL,0,'2020-12-20 11:16:55'),(8,'cekingx2','$2y$10$8xGYTrZCe4V03HSP3Nbs3eeFXOgwlkEVlUUB..bdkERWk6TDruYIe','Wayan Nadi','default.jpg',61,3,'2020-11-03 08:04:00',NULL,0,'2020-11-13 03:00:47'),(10,'cekingx2','$2y$10$D/d4siee31lUHOpT4VQPGOmh/jiRBn93R3IgB.QYiwit1mvWI/vg2','Wayan Kasih','default.jpg',61,3,'2020-11-13 10:00:02',NULL,0,'2020-11-13 10:00:02'),(11,'cekingx-sidan','$2y$10$0CczPXpZkDwMRPziBARxTeKxDjoGqL08feNc6x1MmyfvAQim0BImi','Dirga','default.jpg',61,3,'2020-11-21 08:43:08',NULL,0,'2020-11-21 01:44:41');

/*Table structure for table `ref_user_role` */

DROP TABLE IF EXISTS `ref_user_role`;

CREATE TABLE `ref_user_role` (
  `user_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role_nama` varchar(255) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`user_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

/*Data for the table `ref_user_role` */

insert  into `ref_user_role`(`user_role_id`,`user_role_nama`) values (1,'SUPER_ADMIN'),(2,'ADMIN_CAPIL'),(3,'ADMIN_DESA'),(4,'UMUM');

/*Table structure for table `ref_wilayah` */

DROP TABLE IF EXISTS `ref_wilayah`;

CREATE TABLE `ref_wilayah` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `KODE` varchar(255) DEFAULT NULL,
  `NO_PROP` int(255) DEFAULT NULL,
  `NAMA_PROP` varchar(255) DEFAULT NULL,
  `NO_KAB` int(255) DEFAULT NULL,
  `NAMA_KAB` varchar(255) DEFAULT NULL,
  `NO_KEC` int(255) DEFAULT NULL,
  `NAMA_KEC` varchar(255) DEFAULT NULL,
  `NO_KEL` int(255) DEFAULT NULL,
  `NAMA_KEL` varchar(255) DEFAULT NULL,
  `KODE_POS` int(11) DEFAULT NULL,
  `NAMA_KADES` varchar(255) DEFAULT NULL,
  `FOTO_KADES` varchar(255) DEFAULT NULL,
  `NAMA_SEKDES` varchar(255) DEFAULT NULL,
  `FOTO_SEKDES` varchar(255) DEFAULT NULL,
  `ALAMAT_KANTOR` varchar(255) DEFAULT NULL,
  `TELP_DESA` varchar(255) DEFAULT NULL,
  `SEJARAH` text DEFAULT NULL,
  `VISI` text DEFAULT NULL,
  `MISI` text DEFAULT NULL,
  `LOGO` varchar(255) DEFAULT NULL,
  `LATITUDE` double DEFAULT NULL,
  `LONGITUDE` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ref_wilayah` */

insert  into `ref_wilayah`(`id`,`KODE`,`NO_PROP`,`NAMA_PROP`,`NO_KAB`,`NAMA_KAB`,`NO_KEC`,`NAMA_KEC`,`NO_KEL`,`NAMA_KEL`,`KODE_POS`,`NAMA_KADES`,`FOTO_KADES`,`NAMA_SEKDES`,`FOTO_SEKDES`,`ALAMAT_KANTOR`,`TELP_DESA`,`SEJARAH`,`VISI`,`MISI`,`LOGO`,`LATITUDE`,`LONGITUDE`) values (1,'51.04.01.2008',51,'BALI',4,'KAB. GIANYAR',1,'SUKAWATI',2008,'KEMENUH',80582,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'51.04.02.2008',51,'BALI',4,'KAB. GIANYAR',2,'BLAHBATUH',2008,'MEDAHAN',80581,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'51.04.03.2011',51,'BALI',4,'KAB. GIANYAR',3,'GIANYAR',2011,'SUWAT',80515,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'51.04.04.2006',51,'BALI',4,'KAB. GIANYAR',4,'TAMPAKSIRING',2006,'PEJENG KAJA',80552,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'51.04.06.2002',51,'BALI',4,'KAB. GIANYAR',6,'TEGALLALANG',2002,'TEGALLALANG',80561,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'51.04.07.2007',51,'BALI',4,'KAB. GIANYAR',7,'PAYANGAN',2007,'MELINGGIH KELOD',80572,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'51.04.01.2009',51,'BALI',4,'KAB. GIANYAR',1,'SUKAWATI',2009,'BATUBULAN KANGIN',80582,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'51.04.02.2009',51,'BALI',4,'KAB. GIANYAR',2,'BLAHBATUH',2009,'BONA',80581,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'51.04.03.2012',51,'BALI',4,'KAB. GIANYAR',3,'GIANYAR',2012,'PETAK',80515,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'51.04.04.2007',51,'BALI',4,'KAB. GIANYAR',4,'TAMPAKSIRING',2007,'PEJENG KANGIN',80552,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,'51.04.06.2003',51,'BALI',4,'KAB. GIANYAR',6,'TEGALLALANG',2003,'KENDERAN',80561,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,'51.04.07.2008',51,'BALI',4,'KAB. GIANYAR',7,'PAYANGAN',2008,'BUAHAN KAJA',80572,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,'51.04.01.2012',51,'BALI',4,'KAB. GIANYAR',1,'SUKAWATI',2012,'BATUAN KALER',80582,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,'51.04.03.1006',51,'BALI',4,'KAB. GIANYAR',3,'GIANYAR',1006,'GIANYAR',80511,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,'51.04.03.2015',51,'BALI',4,'KAB. GIANYAR',3,'GIANYAR',2015,'TEMESI',80515,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,'51.04.05.2001',51,'BALI',4,'KAB. GIANYAR',5,'UBUD',2001,'LODTUNDUH',80571,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,'51.04.06.2006',51,'BALI',4,'KAB. GIANYAR',6,'TEGALLALANG',2006,'SEBATU',80561,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,'51.04.01.2011',51,'BALI',4,'KAB. GIANYAR',1,'SUKAWATI',2011,'SINGAPADU KALER',80582,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,'51.04.03.1005',51,'BALI',4,'KAB. GIANYAR',3,'GIANYAR',1005,'ABIANBASE',80515,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,'51.04.03.2014',51,'BALI',4,'KAB. GIANYAR',3,'GIANYAR',2014,'PETAK KAJA',80515,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,'51.04.05.1005',51,'BALI',4,'KAB. GIANYAR',5,'UBUD',1005,'UBUD',80571,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,'51.04.06.2005',51,'BALI',4,'KAB. GIANYAR',6,'TEGALLALANG',2005,'PUPUAN',80561,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,'51.04.01.2001',51,'BALI',4,'KAB. GIANYAR',1,'SUKAWATI',2001,'BATUBULAN',80582,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,'51.04.02.2001',51,'BALI',4,'KAB. GIANYAR',2,'BLAHBATUH',2001,'SABA',80581,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(25,'51.04.03.1007',51,'BALI',4,'KAB. GIANYAR',3,'GIANYAR',1007,'BITERA',80515,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,'51.04.03.2016',51,'BALI',4,'KAB. GIANYAR',3,'GIANYAR',2016,'SUMITA',80515,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,'51.04.05.2002',51,'BALI',4,'KAB. GIANYAR',5,'UBUD',2002,'MAS',80571,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(28,'51.04.06.2007',51,'BALI',4,'KAB. GIANYAR',6,'TEGALLALANG',2007,'TARO',80561,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(29,'51.04.01.2007',51,'BALI',4,'KAB. GIANYAR',1,'SUKAWATI',2007,'BATUAN',80582,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(30,'51.04.02.2007',51,'BALI',4,'KAB. GIANYAR',2,'BLAHBATUH',2007,'BEDULU',80581,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(31,'51.04.03.2010',51,'BALI',4,'KAB. GIANYAR',3,'GIANYAR',2010,'SIANGAN',80515,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(32,'51.04.04.2005',51,'BALI',4,'KAB. GIANYAR',4,'TAMPAKSIRING',2005,'PEJENG KAWAN',80552,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(33,'51.04.06.2001',51,'BALI',4,'KAB. GIANYAR',6,'TEGALLALANG',2001,'KELIKI',80561,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(34,'51.04.07.2006',51,'BALI',4,'KAB. GIANYAR',7,'PAYANGAN',2006,'KERTA',80572,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(35,'51.04.01.2002',51,'BALI',4,'KAB. GIANYAR',1,'SUKAWATI',2002,'KETEWEL',80582,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(36,'51.04.02.2002',51,'BALI',4,'KAB. GIANYAR',2,'BLAHBATUH',2002,'PERING',80581,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(37,'51.04.03.1008',51,'BALI',4,'KAB. GIANYAR',3,'GIANYAR',1008,'BENG',80513,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(38,'51.04.03.2017',51,'BALI',4,'KAB. GIANYAR',3,'GIANYAR',2017,'TEGAL TUGU',80515,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(39,'51.04.05.2003',51,'BALI',4,'KAB. GIANYAR',5,'UBUD',2003,'SINGAKERTA',80571,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(40,'51.04.07.2001',51,'BALI',4,'KAB. GIANYAR',7,'PAYANGAN',2001,'MELINGGIH',80572,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(41,'51.04.01.2003',51,'BALI',4,'KAB. GIANYAR',1,'SUKAWATI',2003,'GUWANG',80582,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(42,'51.04.02.2003',51,'BALI',4,'KAB. GIANYAR',2,'BLAHBATUH',2003,'KERAMAS',80581,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(43,'51.04.03.2001',51,'BALI',4,'KAB. GIANYAR',3,'GIANYAR',2001,'TULIKUP',80515,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(44,'51.04.04.2001',51,'BALI',4,'KAB. GIANYAR',4,'TAMPAKSIRING',2001,'PEJENG',80552,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(45,'51.04.05.2004',51,'BALI',4,'KAB. GIANYAR',5,'UBUD',2004,'KEDEWATAN',80571,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(46,'51.04.07.2002',51,'BALI',4,'KAB. GIANYAR',7,'PAYANGAN',2002,'KELUSA',80572,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(47,'51.04.01.2010',51,'BALI',4,'KAB. GIANYAR',1,'SUKAWATI',2010,'SINGAPADU TENGAH',80582,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(48,'51.04.03.1003',51,'BALI',4,'KAB. GIANYAR',3,'GIANYAR',1003,'SAMPLANGAN',80512,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(49,'51.04.03.2013',51,'BALI',4,'KAB. GIANYAR',3,'GIANYAR',2013,'SERONGGA',80515,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(50,'51.04.04.2008',51,'BALI',4,'KAB. GIANYAR',4,'TAMPAKSIRING',2008,'PEJENG KELOD',80552,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(51,'51.04.06.2004',51,'BALI',4,'KAB. GIANYAR',6,'TEGALLALANG',2004,'KEDISAN',80561,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(52,'51.04.07.2009',51,'BALI',4,'KAB. GIANYAR',7,'PAYANGAN',2009,'BRESELA',80572,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(53,'51.04.01.2006',51,'BALI',4,'KAB. GIANYAR',1,'SUKAWATI',2006,'SINGAPADU',80582,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(54,'51.04.02.2006',51,'BALI',4,'KAB. GIANYAR',2,'BLAHBATUH',2006,'BURUAN',80581,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(55,'51.04.03.2009',51,'BALI',4,'KAB. GIANYAR',3,'GIANYAR',2009,'BAKBAKAN',80515,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(56,'51.04.04.2004',51,'BALI',4,'KAB. GIANYAR',4,'TAMPAKSIRING',2004,'MANUKAYA',80552,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(57,'51.04.05.2008',51,'BALI',4,'KAB. GIANYAR',5,'UBUD',2008,'SAYAN',80571,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(58,'51.04.07.2005',51,'BALI',4,'KAB. GIANYAR',7,'PAYANGAN',2005,'BUAHAN',80572,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(59,'51.04.01.2004',51,'BALI',4,'KAB. GIANYAR',1,'SUKAWATI',2004,'SUKAWATI',80582,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(60,'51.04.02.2004',51,'BALI',4,'KAB. GIANYAR',2,'BLAHBATUH',2004,'BELEGA',80581,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(61,'51.04.03.2002',51,'BALI',4,'KAB. GIANYAR',3,'GIANYAR',2002,'SIDAN',80515,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(62,'51.04.04.2002',51,'BALI',4,'KAB. GIANYAR',4,'TAMPAKSIRING',2002,'SANDING',80552,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(63,'51.04.05.2006',51,'BALI',4,'KAB. GIANYAR',5,'UBUD',2006,'PELIATAN',80571,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(64,'51.04.07.2003',51,'BALI',4,'KAB. GIANYAR',7,'PAYANGAN',2003,'BUKIAN',80572,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(65,'51.04.01.2005',51,'BALI',4,'KAB. GIANYAR',1,'SUKAWATI',2005,'CELUK',80582,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(66,'51.04.02.2005',51,'BALI',4,'KAB. GIANYAR',2,'BLAHBATUH',2005,'BLAHBATUH',80581,'GEDE SATYA KUSUMA, SH','foto-kades-BLAHBATUH.jpg','I WAYAN SUMARSA','foto-sekdes-BLAHBATUH.jpg','Blahbatuh 2','03612986831','As they rounded a bend in the path that ran beside the river, Lara recognized the silhouette of a fig tree atop a nearby hill. The weather was hot and the days were long. The fig tree was in full leaf, but not yet bearing fruit.\r\nSoon Lara spotted other landmarks—an outcropping of limestone beside the path that had a silhouette like a man’s face, a marshy spot beside the river where the waterfowl were easily startled, a tall tree that looked like a man with his arms upraised. They were drawing near to the place where there was an island in the river. The island was a good spot to make camp. They would sleep on the island tonight.\r\nLara had been back and forth along the river path many times in her short life. Her people had not created the path—it had always been there, like the river—but their deerskin-shod feet and the wooden wheels of their handcarts kept the path well worn. Lara’s people were salt traders, and their livelihood took them on a continual journey.\r\nAt the mouth of the river, the little group of half a dozen intermingled families gathered salt from the great salt beds beside the sea. They groomed and sifted the salt and loaded it into handcarts. When the carts were full, most of the group would stay behind, taking shelter amid rocks and simple lean-tos, while a band of fifteen or so of the heartier members set out on the path that ran alongside the river.\r\nWith their precious cargo of salt, the travelers crossed the coastal lowlands and traveled toward the mountains. But Lara’s people never reached the mountaintops; they traveled only as far as the foothills. Many people lived in the forests and grassy meadows of the foothills, gathered in small villages. In return for salt, these people would give Lara’s people dried meat, animal skins, cloth spun from wool, clay pots, needles and scraping tools carved from bone, and little toys made of wood.\r\nTheir bartering done, Lara and her people would travel back down the river path to the sea. The cycle would begin again.\r\nIt had always been like this. Lara knew no other life. She traveled back and forth, up and down the river path. No single place was home. She liked the seaside, where there was always fish to eat, and the gentle lapping of the waves lulled her to sleep at night. She was less fond of the foothills, where the path grew steep, the nights could be cold, and views of great distances made her dizzy. She felt uneasy in the villages, and was often shy around strangers. The path itself was where she felt most at home. She loved the smell of the river on a hot day, and the croaking of frogs at night. Vines grew amid the lush foliage along the river, with berries that were good to eat. Even on the hottest day, sundown brought a cool breeze off the water, which sighed and sang amid the reeds and tall grasses.\r\nOf all the places along the path, the area they were approaching, with the island in the river, was Lara’s favorite.\r\nThe terrain along this stretch of the river was mostly flat, but in the immediate vicinity of the island, the land on the sunrise side was like a rumpled cloth, with hills and ridges and valleys. Among Lara’s people, there was a wooden baby’s crib, suitable for strapping to a cart, that had been passed down for generations. The island was shaped like that crib, longer than it was wide and pointed at the upriver end, where the flow had eroded both banks. The island was like a crib, and the group of hills on the sunrise side of the river were like old women mantled in heavy cloaks gathered to have a look at the baby in the crib—that was how Lara’s father had once described the lay of the land.\r\nLarth spoke like that all the time, conjuring images of giants and monsters in the landscape. He could perceive the spirits, called numina, that dwelled in rocks and trees. Sometimes he could speak to them and hear what they had to say. The river was his oldest friend and told him where the fishing would be best. From whispers in the wind he could foretell the next day’s weather. Because of such skills, Larth was the leader of the group.\r\n“We’re close to the island, aren’t we, Papa?” said Lara.\r\n“How did you know?”\r\n“The hills. First we start to see the hills, off to the right. The hills grow bigger. And just before we come to the island, we can see the silhouette of that fig tree up there, along the crest of that hill.”\r\n“Good girl!” said Larth, proud of his daughter’s memory and powers of observation. He was a strong, handsome man with flecks of gray in his black beard. His wife had borne several children, but all had died very young except Lara, the last, whom his wife had died bearing. Lara was very precious to him. Like her mother, she had golden hair. Now that she had reached the age of childbearing, Lara was beginning to display the fullness of a woman’s hips and breasts. It was Larth’s greatest wish that he might live to see his own grandchildren. Not every man lived that long, but Larth was hopeful. He had been healthy all his life, partly, he believed, because he had always been careful to show respect to the numina he encountered on his journeys.\r\nRespecting the numina was important. The numen of the river could suck a man under and drown him. The numen of a tree could trip a man with its roots, or drop a rotten branch on his head. Rocks could give way underfoot, chuckling with amusement at their own treachery. Even the sky, with a roar of fury, sometimes sent down fingers of fire that could roast a man like a rabbit on a spit, or worse, leave him alive but robbed of his senses. Larth had heard that the earth itself could open and swallow a man; though he had never actually seen such a thing, he nevertheless performed a ritual each morning, asking the earth’s permission before he went striding across it.\r\n“There’s something so special about this place,” said Lara, gazing at the sparkling river to her left and then at the rocky, tree-spotted hills ahead and to her right. “How was it made? Who made it?”\r\nLarth frowned. The question made no sense to him. A place was never made, it simply was. Small features might change over time. Uprooted by a storm, a tree might fall into the river. A boulder might decide to tumble down the hillside. The numina that animated all things went about reshaping the landscape from day to day, but the essential things never changed, and had always existed: the river, the hills, the sky, the sun, the sea, the salt beds at the mouth of the river.\r\nHe was trying to think of some way to express these thoughts to Lara, when a deer, drinking at the river, was startled by their approach. The deer bolted up the brushy bank and onto the path. Instead of running to safety, the creature stood and stared at them. As clearly as if the animal had whispered aloud, Larth heard the words “Eat me.” The deer was offering herself.\r\nLarth turned to shout an order, but the most skilled hunter of the group, a youth called Po, was already in motion. Po ran forward, raised the sharpened stick he always carried and hurled it whistling through the air between Larth and Lara.\r\nA heartbeat later, the spear struck the deer’s breast with such force that the creature was knocked to the ground. Unable to rise, she thrashed her neck and flailed her long, slender legs. Po ran past Larth and Lara. When he reached the deer, he pulled the spear free and stabbed the creature again. The deer released a stifled noise, like a gasp, and stopped moving.\r\nThere was a cheer from the group. Instead of yet another dinner of fish from th','Visi2','Misi2','logo-BLAHBATUH.png',-8.4095178,115.188916),(67,'51.04.03.2004',51,'BALI',4,'KAB. GIANYAR',3,'GIANYAR',2004,'LEBIH',80515,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(68,'51.04.04.2003',51,'BALI',4,'KAB. GIANYAR',4,'TAMPAKSIRING',2003,'TAMPAKSIRING',80552,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(69,'51.04.05.2007',51,'BALI',4,'KAB. GIANYAR',5,'UBUD',2007,'PETULU',80571,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(70,'51.04.07.2004',51,'BALI',4,'KAB. GIANYAR',7,'PAYANGAN',2004,'PUHU',80572,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `ta_berita` */

DROP TABLE IF EXISTS `ta_berita`;

CREATE TABLE `ta_berita` (
  `berita_id` int(11) NOT NULL AUTO_INCREMENT,
  `berita_tanggal` date DEFAULT NULL,
  `berita_publish_user_id` varchar(11) DEFAULT NULL,
  `berita_sumber` varchar(255) DEFAULT NULL,
  `berita_judul` varchar(255) DEFAULT NULL,
  `berita_isi` text DEFAULT NULL,
  PRIMARY KEY (`berita_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ta_berita` */

/*Table structure for table `ta_detail_f101` */

DROP TABLE IF EXISTS `ta_detail_f101`;

CREATE TABLE `ta_detail_f101` (
  `detail_f101_id` int(11) NOT NULL AUTO_INCREMENT,
  `detail_f101_f101_id` bigint(20) DEFAULT NULL,
  `detail_f101_nama_lengkap` varchar(255) DEFAULT NULL,
  `detail_f101_gelar_id` int(11) DEFAULT NULL,
  `detail_f101_nomor_penduduk` varchar(255) DEFAULT NULL,
  `detail_f101_alamat_sebelumnya` text DEFAULT NULL,
  `detail_f101_nomor_paspor` varchar(255) DEFAULT NULL,
  `detail_f101_tanggal_berakhir_paspor` date DEFAULT NULL,
  `detail_f101_kelamin_id` int(11) DEFAULT NULL,
  `detail_f101_tempat_lahir` varchar(255) DEFAULT NULL,
  `detail_f101_tanggal_lahir` date DEFAULT NULL,
  `detail_f101_umur` int(11) DEFAULT NULL,
  `detail_f101_akta_lahir_id` int(11) DEFAULT NULL,
  `detail_f101_nomor_akta_kelahiran` varchar(255) DEFAULT NULL,
  `detail_f101_goldar_id` int(11) DEFAULT NULL,
  `detail_f101_agama_id` int(11) DEFAULT NULL,
  `detail_f101_kepercayaan_terhadap_tuhan_yme` varchar(255) DEFAULT NULL,
  `detail_f101_kawin_id` int(11) DEFAULT NULL,
  `detail_f101_akta_perkawinan_id` int(11) DEFAULT NULL,
  `detail_f101_nomor_akta_perkawinan` varchar(255) DEFAULT NULL,
  `detail_f101_tanggal_perkawinan` date DEFAULT NULL,
  `detail_f101_akta_cerai_id` int(11) DEFAULT NULL,
  `detail_f101_nomor_akta_perceraian` varchar(255) DEFAULT NULL,
  `detail_f101_tanggal_perceraian` date DEFAULT NULL,
  `detail_f101_hubkel_id` int(11) DEFAULT NULL,
  `detail_f101_kelainan_id` int(11) DEFAULT NULL,
  `detail_f101_cacat_id` int(11) DEFAULT NULL,
  `detail_f101_pendidikan` int(11) DEFAULT NULL,
  `detail_f101_pekerjaan` int(11) DEFAULT NULL,
  `detail_f101_nik_ibu` varchar(255) DEFAULT NULL,
  `detail_f101_nama_lengkap_ibu` varchar(255) DEFAULT NULL,
  `detail_f101_nik_ayah` varchar(255) DEFAULT NULL,
  `detail_f101_nama_lengkap_ayah` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`detail_f101_id`),
  KEY `detail_f101_gelar_id` (`detail_f101_gelar_id`),
  KEY `detail_f101_kelamin_id` (`detail_f101_kelamin_id`),
  KEY `detail_f101_akta_lahir_id` (`detail_f101_akta_lahir_id`),
  KEY `detail_f101_goldar_id` (`detail_f101_goldar_id`),
  KEY `detail_f101_agama_id` (`detail_f101_agama_id`),
  KEY `detail_f101_kawin_id` (`detail_f101_kawin_id`),
  KEY `detail_f101_akta_perkawinan_id` (`detail_f101_akta_perkawinan_id`),
  KEY `detail_f101_akta_cerai_id` (`detail_f101_akta_cerai_id`),
  KEY `detail_f101_hubkel_id` (`detail_f101_hubkel_id`),
  KEY `detail_f101_kelainan_id` (`detail_f101_kelainan_id`),
  KEY `detail_f101_cacat_id` (`detail_f101_cacat_id`),
  KEY `detail_f101_pendidikan` (`detail_f101_pendidikan`),
  KEY `detail_f101_pekerjaan` (`detail_f101_pekerjaan`),
  KEY `detail_f101_f101_id` (`detail_f101_f101_id`),
  CONSTRAINT `ta_detail_f101_ibfk_1` FOREIGN KEY (`detail_f101_gelar_id`) REFERENCES `ref_gelar` (`id`),
  CONSTRAINT `ta_detail_f101_ibfk_10` FOREIGN KEY (`detail_f101_kelainan_id`) REFERENCES `ref_kelainan` (`id`),
  CONSTRAINT `ta_detail_f101_ibfk_11` FOREIGN KEY (`detail_f101_cacat_id`) REFERENCES `ref_cacat` (`id`),
  CONSTRAINT `ta_detail_f101_ibfk_12` FOREIGN KEY (`detail_f101_pendidikan`) REFERENCES `ref_pendidikan` (`id`),
  CONSTRAINT `ta_detail_f101_ibfk_13` FOREIGN KEY (`detail_f101_pekerjaan`) REFERENCES `ref_pekerjaan` (`id`),
  CONSTRAINT `ta_detail_f101_ibfk_14` FOREIGN KEY (`detail_f101_f101_id`) REFERENCES `ta_f101` (`f101_id`),
  CONSTRAINT `ta_detail_f101_ibfk_2` FOREIGN KEY (`detail_f101_kelamin_id`) REFERENCES `ref_kelamin` (`id`),
  CONSTRAINT `ta_detail_f101_ibfk_3` FOREIGN KEY (`detail_f101_akta_lahir_id`) REFERENCES `ref_akta_lahir` (`id`),
  CONSTRAINT `ta_detail_f101_ibfk_4` FOREIGN KEY (`detail_f101_goldar_id`) REFERENCES `ref_goldar` (`id`),
  CONSTRAINT `ta_detail_f101_ibfk_5` FOREIGN KEY (`detail_f101_agama_id`) REFERENCES `ref_agama` (`id`),
  CONSTRAINT `ta_detail_f101_ibfk_6` FOREIGN KEY (`detail_f101_kawin_id`) REFERENCES `ref_kawin` (`id`),
  CONSTRAINT `ta_detail_f101_ibfk_7` FOREIGN KEY (`detail_f101_akta_perkawinan_id`) REFERENCES `ref_akta_perkawinan` (`id`),
  CONSTRAINT `ta_detail_f101_ibfk_8` FOREIGN KEY (`detail_f101_akta_cerai_id`) REFERENCES `ref_akta_cerai` (`id`),
  CONSTRAINT `ta_detail_f101_ibfk_9` FOREIGN KEY (`detail_f101_hubkel_id`) REFERENCES `ref_hubkel` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `ta_detail_f101` */

insert  into `ta_detail_f101`(`detail_f101_id`,`detail_f101_f101_id`,`detail_f101_nama_lengkap`,`detail_f101_gelar_id`,`detail_f101_nomor_penduduk`,`detail_f101_alamat_sebelumnya`,`detail_f101_nomor_paspor`,`detail_f101_tanggal_berakhir_paspor`,`detail_f101_kelamin_id`,`detail_f101_tempat_lahir`,`detail_f101_tanggal_lahir`,`detail_f101_umur`,`detail_f101_akta_lahir_id`,`detail_f101_nomor_akta_kelahiran`,`detail_f101_goldar_id`,`detail_f101_agama_id`,`detail_f101_kepercayaan_terhadap_tuhan_yme`,`detail_f101_kawin_id`,`detail_f101_akta_perkawinan_id`,`detail_f101_nomor_akta_perkawinan`,`detail_f101_tanggal_perkawinan`,`detail_f101_akta_cerai_id`,`detail_f101_nomor_akta_perceraian`,`detail_f101_tanggal_perceraian`,`detail_f101_hubkel_id`,`detail_f101_kelainan_id`,`detail_f101_cacat_id`,`detail_f101_pendidikan`,`detail_f101_pekerjaan`,`detail_f101_nik_ibu`,`detail_f101_nama_lengkap_ibu`,`detail_f101_nik_ayah`,`detail_f101_nama_lengkap_ayah`) values (1,1,'Dirga',1,'404040','sidan','39247','2020-10-12',1,'Gianyar','1999-07-13',20,1,'79347',1,1,NULL,1,1,'23947','2003-12-09',1,'9034',NULL,1,1,1,1,1,'48938','asdlj','29347','asdf'),(2,2,'I Wayan Sudira',1,'5104031307990001','Sidan',NULL,NULL,1,'Gianyar','1969-07-13',40,1,'01y4',1,7,'Shinto',1,1,'70973','2020-12-12',1,NULL,NULL,1,1,1,1,1,'098712847','Desak','0127340','Dewa Putu'),(3,2,'Ketut',1,'5104031307990002','Klungkung',NULL,NULL,1,'Klungkung','1975-04-14',20,1,'01y4',1,1,NULL,1,1,'70973','2020-12-12',1,NULL,NULL,1,1,1,1,1,'098712847','Ni Nyoman','0127340','I Wayan'),(4,2,'Wayan',1,'5104031307990011','Sidan',NULL,NULL,1,'Gianyar','1999-07-13',20,1,'01y4',1,6,NULL,1,1,NULL,NULL,1,NULL,NULL,1,1,1,1,1,'098712847','Nyoman','0127340','I Wayan Sudira'),(5,3,'asdf',1,'123421','asdfa','132421','0000-00-00',1,'asdfa','0000-00-00',12,1,NULL,1,7,'Shinto',1,1,NULL,NULL,1,NULL,NULL,1,1,0,8,3,'1234','asdfas','1234','asdfas');

/*Table structure for table `ta_detail_f212` */

DROP TABLE IF EXISTS `ta_detail_f212`;

CREATE TABLE `ta_detail_f212` (
  `detail_f212_id` int(11) NOT NULL AUTO_INCREMENT,
  `detail_f212_f212_id` int(11) DEFAULT NULL,
  `detail_f212_nama_anak` varchar(255) DEFAULT NULL,
  `detail_f212_tgl_akta_kelahiran` date DEFAULT NULL,
  PRIMARY KEY (`detail_f212_id`),
  KEY `detail_f212_f212_id` (`detail_f212_f212_id`),
  CONSTRAINT `ta_detail_f212_ibfk_1` FOREIGN KEY (`detail_f212_f212_id`) REFERENCES `ta_f212` (`f212_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ta_detail_f212` */

/*Table structure for table `ta_detail_galeri` */

DROP TABLE IF EXISTS `ta_detail_galeri`;

CREATE TABLE `ta_detail_galeri` (
  `detail_galeri_id` int(11) NOT NULL AUTO_INCREMENT,
  `detail_galeri_galeri_id` int(11) DEFAULT NULL,
  `detail_galeri_foto` varchar(255) DEFAULT NULL,
  `detail_galeri_galeri_slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`detail_galeri_id`),
  KEY `detail_galeri_galeri_id` (`detail_galeri_galeri_id`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=latin1;

/*Data for the table `ta_detail_galeri` */

insert  into `ta_detail_galeri`(`detail_galeri_id`,`detail_galeri_galeri_id`,`detail_galeri_foto`,`detail_galeri_galeri_slug`) values (126,72,'foto_galeri-2020-11-02-01:51:38-0.png','test1'),(127,72,'foto_galeri-2020-11-02-01:51:51-0.png','test1'),(128,73,'foto_galeri-2020-11-02-01:55:43-0.png','tst'),(129,74,'foto_galeri-2020-11-02-01:56:19-0.png','qwe'),(130,75,'foto_galeri-2020-11-02-02:06:04-0.png','qwe');

/*Table structure for table `ta_detail_pengajuan_form` */

DROP TABLE IF EXISTS `ta_detail_pengajuan_form`;

CREATE TABLE `ta_detail_pengajuan_form` (
  `detail_pengajuan_form_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `detail_pengajuan_form_pengajuan_id` bigint(20) DEFAULT NULL,
  `detail_pengajuan_form_jenis_form_id` int(11) DEFAULT NULL,
  `detail_pengajuan_form_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `detail_pengajuan_form_updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `detail_pengajuan_form_is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`detail_pengajuan_form_id`),
  KEY `detail_pengajuan_form_jenis_form_id` (`detail_pengajuan_form_jenis_form_id`),
  KEY `detail_pengajuan_form_pengajuan_id` (`detail_pengajuan_form_pengajuan_id`),
  CONSTRAINT `ta_detail_pengajuan_form_ibfk_2` FOREIGN KEY (`detail_pengajuan_form_jenis_form_id`) REFERENCES `ref_jenis_form` (`jenis_form_id`),
  CONSTRAINT `ta_detail_pengajuan_form_ibfk_3` FOREIGN KEY (`detail_pengajuan_form_pengajuan_id`) REFERENCES `ta_pengajuan` (`pengajuan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `ta_detail_pengajuan_form` */

insert  into `ta_detail_pengajuan_form`(`detail_pengajuan_form_id`,`detail_pengajuan_form_pengajuan_id`,`detail_pengajuan_form_jenis_form_id`,`detail_pengajuan_form_created_at`,`detail_pengajuan_form_updated_at`,`detail_pengajuan_form_is_deleted`) values (1,1,1,'2020-11-14 07:39:04','2020-11-14 07:39:04',0),(2,2,1,'2020-11-14 07:39:05','2020-11-14 07:39:05',0),(3,3,1,'2020-11-21 08:57:29','2020-11-21 08:57:29',0),(4,5,5,'2020-12-18 10:23:45','2020-12-18 10:23:45',0),(6,7,5,'2020-12-18 10:34:03','2020-12-18 10:34:03',0);

/*Table structure for table `ta_detail_pengajuan_lampiran` */

DROP TABLE IF EXISTS `ta_detail_pengajuan_lampiran`;

CREATE TABLE `ta_detail_pengajuan_lampiran` (
  `detail_pengajuan_lampiran_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `detail_pengajuan_lampiran_pengajuan_id` bigint(20) DEFAULT NULL,
  `detail_pengajuan_lampiran_nama` varchar(255) DEFAULT NULL,
  `detail_pengajuan_lampiran_path` varchar(255) DEFAULT NULL,
  `detail_pengajuan_lampiran_nama_file` varchar(255) DEFAULT NULL,
  `detail_pengajuan_lampiran_created_at` timestamp NULL DEFAULT current_timestamp(),
  `detail_pengajuan_lampiran_updated_at` timestamp NULL DEFAULT current_timestamp(),
  `detail_pengajuan_lampiran_is_deleted` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`detail_pengajuan_lampiran_id`),
  KEY `detail_pengajuan_lampiran_pengajuan_id` (`detail_pengajuan_lampiran_pengajuan_id`),
  CONSTRAINT `ta_detail_pengajuan_lampiran_ibfk_1` FOREIGN KEY (`detail_pengajuan_lampiran_pengajuan_id`) REFERENCES `ta_pengajuan` (`pengajuan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `ta_detail_pengajuan_lampiran` */

insert  into `ta_detail_pengajuan_lampiran`(`detail_pengajuan_lampiran_id`,`detail_pengajuan_lampiran_pengajuan_id`,`detail_pengajuan_lampiran_nama`,`detail_pengajuan_lampiran_path`,`detail_pengajuan_lampiran_nama_file`,`detail_pengajuan_lampiran_created_at`,`detail_pengajuan_lampiran_updated_at`,`detail_pengajuan_lampiran_is_deleted`) values (1,4,'KK','storage/penerbitan_ktp/4','kk.pdf','2020-11-21 08:59:43','2020-11-21 08:59:43',0),(2,4,'Surat Pengantar','storage/penerbitan_ktp/4','surat_pengantar.pdf','2020-11-21 08:59:43','2020-11-21 08:59:43',0);

/*Table structure for table `ta_f101` */

DROP TABLE IF EXISTS `ta_f101`;

CREATE TABLE `ta_f101` (
  `f101_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `f101_pengajuan_id` bigint(20) DEFAULT NULL,
  `f101_nama_kepala_keluarga` varchar(255) DEFAULT NULL,
  `f101_alamat` varchar(255) DEFAULT NULL,
  `f101_wilayah_id` int(11) DEFAULT NULL,
  `f101_rt` tinyint(4) DEFAULT NULL,
  `f101_rw` tinyint(4) DEFAULT NULL,
  `f101_jumlah_anggota_keluarga` tinyint(4) DEFAULT NULL,
  `f101_telepon` varchar(255) DEFAULT NULL,
  `f101_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `f101_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `f101_is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`f101_id`),
  KEY `ta_f101_ibfk_2` (`f101_wilayah_id`),
  KEY `f101_pengajuan_id` (`f101_pengajuan_id`),
  CONSTRAINT `ta_f101_ibfk_2` FOREIGN KEY (`f101_wilayah_id`) REFERENCES `ref_wilayah` (`id`),
  CONSTRAINT `ta_f101_ibfk_3` FOREIGN KEY (`f101_pengajuan_id`) REFERENCES `ta_pengajuan` (`pengajuan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `ta_f101` */

insert  into `ta_f101`(`f101_id`,`f101_pengajuan_id`,`f101_nama_kepala_keluarga`,`f101_alamat`,`f101_wilayah_id`,`f101_rt`,`f101_rw`,`f101_jumlah_anggota_keluarga`,`f101_telepon`,`f101_created_at`,`f101_updated_at`,`f101_is_deleted`) values (1,1,'Dirga','Sidan',66,1,1,1,'08978979','2020-11-14 07:39:04','2020-11-14 07:39:04',0),(2,2,'I Wayan Sudira','Sidan',66,2,2,2,'081339523474','2020-11-14 07:39:05','2020-11-14 07:39:05',0),(3,3,'I Dewa Gede Dirga Yasa','Br. Sidan Kelod, Desa Sidan',66,1,1,1,'1','2020-11-21 08:57:29','2020-11-21 08:57:29',0);

/*Table structure for table `ta_f202` */

DROP TABLE IF EXISTS `ta_f202`;

CREATE TABLE `ta_f202` (
  `f202_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `f202_pengajuan_id` bigint(20) DEFAULT NULL,
  `f202_tempat_dilahirkan_id` int(11) DEFAULT NULL,
  `f202_jenis_kelahiran` int(11) DEFAULT NULL,
  `f202_penolong_kelahiran_id` int(11) DEFAULT NULL,
  `f202_nama_kepala_keluarga` varchar(255) DEFAULT NULL,
  `f202_nomor_kartu_keluarga` varchar(255) DEFAULT NULL,
  `f202_nama_bayi` varchar(255) DEFAULT NULL,
  `f202_bayi_kelamin_id` int(11) DEFAULT NULL,
  `f202_tempat_kelahiran` varchar(255) DEFAULT NULL,
  `f202_hari_lahir` varchar(255) DEFAULT NULL,
  `f202_tanggal_lahir` datetime DEFAULT NULL,
  `f202_kelahiran_ke` tinyint(4) DEFAULT NULL,
  `f202_berat_bayi` tinyint(4) DEFAULT NULL,
  `f202_panjang_bayi` tinyint(4) DEFAULT NULL,
  `f202_NIK_ibu` varchar(255) DEFAULT NULL,
  `f202_nama_ibu` varchar(255) DEFAULT NULL,
  `f202_tanggal_lahir_ibu` date DEFAULT NULL,
  `f202_umur_ibu` tinyint(4) DEFAULT NULL,
  `f202_ibu_pekerjaan_id` int(11) DEFAULT NULL,
  `f202_alamat_ibu` varchar(255) DEFAULT NULL,
  `f202_desa_ibu` varchar(255) DEFAULT NULL,
  `f202_kecamatan_ibu` varchar(255) DEFAULT NULL,
  `f202_kabupaten_ibu` varchar(255) DEFAULT NULL,
  `f202_provinsi_ibu` varchar(255) DEFAULT NULL,
  `f202_ibu_kewarganegaraan_id` int(11) DEFAULT NULL,
  `f202_kebangsaan_ibu` varchar(255) DEFAULT NULL,
  `f202_tgl_perkawinan` date DEFAULT NULL,
  `f202_NIK_ayah` varchar(255) DEFAULT NULL,
  `f202_nama_ayah` varchar(255) DEFAULT NULL,
  `f202_tanggal_lahir_ayah` date DEFAULT NULL,
  `f202_umur_ayah` tinyint(4) DEFAULT NULL,
  `f202_ayah_pekerjaan_id` int(11) DEFAULT NULL,
  `f202_alamat_ayah` varchar(255) DEFAULT NULL,
  `f202_desa_ayah` varchar(255) DEFAULT NULL,
  `f202_kecamatan_ayah` varchar(255) DEFAULT NULL,
  `f202_kabupaten_ayah` varchar(255) DEFAULT NULL,
  `f202_provinsi_ayah` varchar(255) DEFAULT NULL,
  `f202_ayah_kewarganegaraan_id` int(11) DEFAULT NULL,
  `f202_kebangsaan_ayah` varchar(255) DEFAULT NULL,
  `f202_NIK_pelapor` varchar(255) DEFAULT NULL,
  `f202_nama_pelapor` varchar(255) DEFAULT NULL,
  `f202_umur_pelapor` tinyint(4) DEFAULT NULL,
  `f202_pelapor_kelamin_id` int(11) DEFAULT NULL,
  `f202_pelapor_pekerjaan_id` int(11) DEFAULT NULL,
  `f202_alamat_pelapor` varchar(255) DEFAULT NULL,
  `f202_desa_pelapor` varchar(255) DEFAULT NULL,
  `f202_kecamatan_pelapor` varchar(255) DEFAULT NULL,
  `f202_kabupaten_pelapor` varchar(255) DEFAULT NULL,
  `f202_provinsi_pelapor` varchar(255) DEFAULT NULL,
  `f202_NIK_saksi_1` varchar(255) DEFAULT NULL,
  `f202_nama_saksi_1` varchar(255) DEFAULT NULL,
  `f202_umur_saksi_1` tinyint(4) DEFAULT NULL,
  `f202_saksi_1_pekerjaan_id` int(11) DEFAULT NULL,
  `f202_alamat_saksi_1` varchar(255) DEFAULT NULL,
  `f202_desa_saksi_1` varchar(255) DEFAULT NULL,
  `f202_kecamatan_saksi_1` varchar(255) DEFAULT NULL,
  `f202_kabupaten_saksi_1` varchar(255) DEFAULT NULL,
  `f202_provinsi_saksi_1` varchar(255) DEFAULT NULL,
  `f202_NIK_saksi_2` varchar(255) DEFAULT NULL,
  `f202_nama_saksi_2` varchar(255) DEFAULT NULL,
  `f202_umur_saksi_2` tinyint(4) DEFAULT NULL,
  `f202_saksi_2_pekerjaan_id` int(11) DEFAULT NULL,
  `f202_alamat_saksi_2` varchar(255) DEFAULT NULL,
  `f202_desa_saksi_2` varchar(255) DEFAULT NULL,
  `f202_kecamatan_saksi_2` varchar(255) DEFAULT NULL,
  `f202_kabupaten_saksi_2` varchar(255) DEFAULT NULL,
  `f202_provinsi_saksi_2` varchar(255) DEFAULT NULL,
  `f202_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `f202_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `f202_is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`f202_id`),
  KEY `f202_pengajuan_id` (`f202_pengajuan_id`),
  KEY `f202_tempat_dilahirkan_id` (`f202_tempat_dilahirkan_id`),
  KEY `f202_jenis_kelahiran` (`f202_jenis_kelahiran`),
  KEY `f202_penolong_kelahiran_id` (`f202_penolong_kelahiran_id`),
  KEY `f202_ibu_kewarganegaraan_id` (`f202_ibu_kewarganegaraan_id`),
  KEY `f202_ibu_pekerjaan_id` (`f202_ibu_pekerjaan_id`),
  KEY `f202_ayah_pekerjaan_id` (`f202_ayah_pekerjaan_id`),
  KEY `f202_ayah_kewarganegaraan_id` (`f202_ayah_kewarganegaraan_id`),
  KEY `f202_pelapor_kelamin_id` (`f202_pelapor_kelamin_id`),
  KEY `f202_pelapor_pekerjaan_id` (`f202_pelapor_pekerjaan_id`),
  KEY `f202_saksi_1_pekerjaan_id` (`f202_saksi_1_pekerjaan_id`),
  KEY `f202_saksi_2_pekerjaan_id` (`f202_saksi_2_pekerjaan_id`),
  CONSTRAINT `ta_f202_ibfk_1` FOREIGN KEY (`f202_pengajuan_id`) REFERENCES `ta_pengajuan` (`pengajuan_id`),
  CONSTRAINT `ta_f202_ibfk_10` FOREIGN KEY (`f202_pelapor_pekerjaan_id`) REFERENCES `ref_pekerjaan` (`id`),
  CONSTRAINT `ta_f202_ibfk_11` FOREIGN KEY (`f202_pelapor_pekerjaan_id`) REFERENCES `ref_pekerjaan` (`id`),
  CONSTRAINT `ta_f202_ibfk_12` FOREIGN KEY (`f202_saksi_1_pekerjaan_id`) REFERENCES `ref_pekerjaan` (`id`),
  CONSTRAINT `ta_f202_ibfk_13` FOREIGN KEY (`f202_saksi_2_pekerjaan_id`) REFERENCES `ref_pekerjaan` (`id`),
  CONSTRAINT `ta_f202_ibfk_2` FOREIGN KEY (`f202_tempat_dilahirkan_id`) REFERENCES `ref_tempat_dilahirkan` (`tempat_dilahirkan_id`),
  CONSTRAINT `ta_f202_ibfk_3` FOREIGN KEY (`f202_jenis_kelahiran`) REFERENCES `ref_jenis_kelahiran` (`jenis_kelahiran_id`),
  CONSTRAINT `ta_f202_ibfk_4` FOREIGN KEY (`f202_penolong_kelahiran_id`) REFERENCES `ref_penolong_kelahirann` (`penolong_kelahiran_id`),
  CONSTRAINT `ta_f202_ibfk_5` FOREIGN KEY (`f202_ibu_kewarganegaraan_id`) REFERENCES `ref_kewarganegaraan` (`kewarganegaraan_id`),
  CONSTRAINT `ta_f202_ibfk_6` FOREIGN KEY (`f202_ibu_pekerjaan_id`) REFERENCES `ref_pekerjaan` (`id`),
  CONSTRAINT `ta_f202_ibfk_7` FOREIGN KEY (`f202_ayah_pekerjaan_id`) REFERENCES `ref_pekerjaan` (`id`),
  CONSTRAINT `ta_f202_ibfk_8` FOREIGN KEY (`f202_ayah_kewarganegaraan_id`) REFERENCES `ref_kewarganegaraan` (`kewarganegaraan_id`),
  CONSTRAINT `ta_f202_ibfk_9` FOREIGN KEY (`f202_pelapor_kelamin_id`) REFERENCES `ref_kelamin` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ta_f202` */

/*Table structure for table `ta_f212` */

DROP TABLE IF EXISTS `ta_f212`;

CREATE TABLE `ta_f212` (
  `f212_id` int(20) NOT NULL AUTO_INCREMENT,
  `f212_pengajuan_id` int(11) DEFAULT NULL,
  `f212_NIK_suami` varchar(255) DEFAULT NULL,
  `f212_nomor_KK_suami` varchar(255) DEFAULT NULL,
  `f212_nomor_paspor_suami` varchar(255) DEFAULT NULL,
  `f212_nama_suami` varchar(255) DEFAULT NULL,
  `f212_tempat_lahir_suami` varchar(255) DEFAULT NULL,
  `f212_tanggal_lahir_suami` date DEFAULT NULL,
  `f212_alamat_suami` varchar(255) DEFAULT NULL,
  `f212_RT_suami` varchar(255) DEFAULT NULL,
  `f212_RW_suami` varchar(255) DEFAULT NULL,
  `f212_suami_wilayah_id` int(11) DEFAULT NULL,
  `f212_telepon_suami` varchar(15) DEFAULT NULL,
  `f212_desa_suami` varchar(255) DEFAULT NULL,
  `f212_kecamatan_suami` varchar(255) DEFAULT NULL,
  `f212_kabupaten_suami` varchar(255) DEFAULT NULL,
  `f212_provinsi_suami` varchar(255) DEFAULT NULL,
  `f212_suami_pendidikan_id` int(11) DEFAULT NULL,
  `f212_suami_agama_id` int(11) DEFAULT NULL,
  `f212_nama_organisasi_kepercayaan_suami` varchar(255) DEFAULT NULL,
  `f212_suami_pekerjaan_id` int(11) DEFAULT NULL,
  `f212_suami_anak_ke` tinyint(4) DEFAULT NULL,
  `f212_suami_status_kawin_id` int(11) DEFAULT NULL,
  `f212_suami_perkawinan_ke` tinyint(11) DEFAULT NULL,
  `f212_istri_yang_ke` tinyint(11) DEFAULT NULL,
  `f212_suami_kewarganegaraan_id` int(11) DEFAULT NULL,
  `f212_kebangsaan_suami` varchar(255) DEFAULT NULL,
  `f212_NIK_ayah_dari_suami` int(11) DEFAULT NULL,
  `f212_nama_ayah_dari_suami` varchar(255) DEFAULT NULL,
  `f212_ayah_dari_suami_agama_id` int(11) DEFAULT NULL,
  `f212_nama_organisasi_kepercayaan_ayah_dari_suami` varchar(255) DEFAULT NULL,
  `f212_tempat_lahir_ayah_dari_suami` varchar(255) DEFAULT NULL,
  `f212_tanggal_lahir_ayah_dari_suami` date DEFAULT NULL,
  `f212_alamat_ayah_dari_suami` varchar(255) DEFAULT NULL,
  `f212_RT_ayah_dari_suami` varchar(255) DEFAULT NULL,
  `f212_RW_ayah_dari_suami` varchar(255) DEFAULT NULL,
  `f212_ayah_dari_suami_wilayah_id` int(11) DEFAULT NULL,
  `f212_telepon_ayah_dari_suami` varchar(15) DEFAULT NULL,
  `f212_desa_ayah_dari_suami` varchar(255) DEFAULT NULL,
  `f212_kecamatan_ayah_dari_suami` varchar(255) DEFAULT NULL,
  `f212_kabupaten_ayah_dari_suami` varchar(255) DEFAULT NULL,
  `f212_provinsi_ayah_dari_suami` varchar(255) DEFAULT NULL,
  `f212_ayah_dari_suami_pekerjaan_id` int(11) DEFAULT NULL,
  `f212_NIK_ibu_dari_suami` int(11) DEFAULT NULL,
  `f212_nama_ibu_dari_suami` varchar(255) DEFAULT NULL,
  `f212_ibu_dari_suami_agama_id` int(11) DEFAULT NULL,
  `f212_nama_organisasi_kepercayaan_ibu_dari_suami` varchar(255) DEFAULT NULL,
  `f212_tempat_lahir_ibu_dari_suami` varchar(255) DEFAULT NULL,
  `f212_tanggal_lahir_ibu_dari_suami` date DEFAULT NULL,
  `f212_alamat_ibu_dari_suami` varchar(255) DEFAULT NULL,
  `f212_RT_ibu_dari_suami` varchar(255) DEFAULT NULL,
  `f212_RW_ibu_dari_suami` varchar(255) DEFAULT NULL,
  `f212_ibu_dari_suami_wilayah_id` int(11) DEFAULT NULL,
  `f212_telepon_ibu_dari_suami` varchar(15) DEFAULT NULL,
  `f212_desa_ibu_dari_suami` varchar(255) DEFAULT NULL,
  `f212_kecamatan_ibu_dari_suami` varchar(255) DEFAULT NULL,
  `f212_kabupaten_ibu_dari_suami` varchar(255) DEFAULT NULL,
  `f212_provinsi_ibu_dari_suami` varchar(255) DEFAULT NULL,
  `f212_ibu_dari_suami_pekerjaan_id` int(11) DEFAULT NULL,
  `f212_NIK_istri` varchar(255) DEFAULT NULL,
  `f212_nomor_KK_istri` varchar(255) DEFAULT NULL,
  `f212_nomor_paspor_istri` varchar(255) DEFAULT NULL,
  `f212_nama_istri` varchar(255) DEFAULT NULL,
  `f212_tempat_lahir_istri` varchar(255) DEFAULT NULL,
  `f212_tanggal_lahir_istri` date DEFAULT NULL,
  `f212_alamat_istri` varchar(255) DEFAULT NULL,
  `f212_RT_istri` varchar(255) DEFAULT NULL,
  `f212_RW_istri` varchar(255) DEFAULT NULL,
  `f212_istri_wilayah_id` int(11) DEFAULT NULL,
  `f212_telepon_istri` varchar(15) DEFAULT NULL,
  `f212_desa_istri` varchar(255) DEFAULT NULL,
  `f212_kecamatan_istri` varchar(255) DEFAULT NULL,
  `f212_kabupaten_istri` varchar(255) DEFAULT NULL,
  `f212_provinsi_istri` varchar(255) DEFAULT NULL,
  `f212_istri_pendidikan_terkahir_id` int(11) DEFAULT NULL,
  `f212_istri_agama_id` int(11) DEFAULT NULL,
  `f212_nama_organisasi_kepercayaan_istri` varchar(255) DEFAULT NULL,
  `f212_istri_pekerjaan_id` int(11) DEFAULT NULL,
  `f212_istri_anak_ke` tinyint(4) DEFAULT NULL,
  `f212_istri_status_kawin_id` int(11) DEFAULT NULL,
  `f212_istri_perkawinan_ke` tinyint(4) DEFAULT NULL,
  `f212_istri_kewarganegaraan_id` int(11) DEFAULT NULL,
  `f212_kebangsaan_istri` varchar(255) DEFAULT NULL,
  `f212_NIK_ayah_dari_istri` varchar(255) DEFAULT NULL,
  `f212_nama_ayah_dari_istri` varchar(255) DEFAULT NULL,
  `f212_ayah_dari_istri_agama_id` int(11) DEFAULT NULL,
  `f212_nama_organisasi_kepercayaan_ayah_dari_istri` varchar(255) DEFAULT NULL,
  `f212_tempat_lahir_ayah_dari_istri` varchar(255) DEFAULT NULL,
  `f212_tanggal_lahir_ayah_dari_istri` date DEFAULT NULL,
  `f212_alamat_ayah_dari_istri` varchar(255) DEFAULT NULL,
  `f212_RT_ayah_dari_istri` varchar(255) DEFAULT NULL,
  `f212_RW_ayah_dari_istri` varchar(255) DEFAULT NULL,
  `f212_ayah_dari_istri_wilayah_id` int(11) DEFAULT NULL,
  `f212_telepon_ayah_dari_istri` varchar(15) DEFAULT NULL,
  `f212_desa_ayah_dari_istri` varchar(255) DEFAULT NULL,
  `f212_kecamatan_ayah_dari_istri` varchar(255) DEFAULT NULL,
  `f212_kabupaten_ayah_dari_istri` varchar(255) DEFAULT NULL,
  `f212_provinsi_ayah_dari_istri` varchar(255) DEFAULT NULL,
  `f212_ayah_dari_istri_pekerjaan_id` int(11) DEFAULT NULL,
  `f212_NIK_ibu_dari_istri` varchar(255) DEFAULT NULL,
  `f212_nama_ibu_dari_istri` varchar(255) DEFAULT NULL,
  `f212_ibu_dari_istri_agama_id` int(11) DEFAULT NULL,
  `f212_nama_organisasi_kepercayaan_ibu_dari_istri` varchar(255) DEFAULT NULL,
  `f212_tempat_lahir_ibu_dari_istri` varchar(255) DEFAULT NULL,
  `f212_tanggal_lahir_ibu_dari_istri` date DEFAULT NULL,
  `f212_alamat_ibu_dari_istri` varchar(255) DEFAULT NULL,
  `f212_RT_ibu_dari_istri` varchar(255) DEFAULT NULL,
  `f212_RW_ibu_dari_istri` varchar(255) DEFAULT NULL,
  `f212_ibu_dari_istri_wilayah_id` int(11) DEFAULT NULL,
  `f212_telepon_ibu_dari_istri` varchar(15) DEFAULT NULL,
  `f212_desa_ibu_dari_istri` varchar(255) DEFAULT NULL,
  `f212_kecamatan_ibu_dari_istri` varchar(255) DEFAULT NULL,
  `f212_kabupaten_ibu_dari_istri` varchar(255) DEFAULT NULL,
  `f212_provinsi_ibu_dari_istri` varchar(255) DEFAULT NULL,
  `f212_ibu_dari_istri_pekerjaan_id` int(11) DEFAULT NULL,
  `f212_NIK_saksi_1` varchar(255) DEFAULT NULL,
  `f212_nama_saksi_1` varchar(255) DEFAULT NULL,
  `f212_tempat_lahir_saksi_1` varchar(255) DEFAULT NULL,
  `f212_tanggal_lahir_saksi_1` date DEFAULT NULL,
  `f212_saksi_1_agama_id` int(11) DEFAULT NULL,
  `f212_nama_organisasi_kepercayaan_saksi_1` varchar(255) DEFAULT NULL,
  `f212_alamat_saksi_1` varchar(255) DEFAULT NULL,
  `f212_RT_saksi_1` varchar(255) DEFAULT NULL,
  `f212_RW_saksi_1` varchar(255) DEFAULT NULL,
  `f212_saksi_1_wilayah_id` int(11) DEFAULT NULL,
  `f212_telepon_saksi_1` varchar(15) DEFAULT NULL,
  `f212_desa_saksi_1` varchar(255) DEFAULT NULL,
  `f212_kecamatan_saksi_1` varchar(255) DEFAULT NULL,
  `f212_kabupaten_saksi_1` varchar(255) DEFAULT NULL,
  `f212_provinsi_saksi_1` varchar(255) DEFAULT NULL,
  `f212_saksi_1_pekerjaan_id` int(11) DEFAULT NULL,
  `f212_NIK_saksi_2` varchar(255) DEFAULT NULL,
  `f212_nama_saksi_2` varchar(255) DEFAULT NULL,
  `f212_tempat_lahir_saksi_2` varchar(255) DEFAULT NULL,
  `f212_tanggal_lahir_saksi_2` date DEFAULT NULL,
  `f212_saksi_2_agama_id` int(11) DEFAULT NULL,
  `f212_nama_organisasi_kepercayaan_saksi_2` varchar(255) DEFAULT NULL,
  `f212_alamat_saksi_2` varchar(255) DEFAULT NULL,
  `f212_RT_saksi_2` varchar(255) DEFAULT NULL,
  `f212_RW_saksi_2` varchar(255) DEFAULT NULL,
  `f212_saksi_2_wilayah_id` int(11) DEFAULT NULL,
  `f212_telepon_saksi_2` varchar(15) DEFAULT NULL,
  `f212_desa_saksi_2` varchar(255) DEFAULT NULL,
  `f212_kecamatan_saksi_2` varchar(255) DEFAULT NULL,
  `f212_kabupaten_saksi_2` varchar(255) DEFAULT NULL,
  `f212_provinsi_saksi_2` varchar(255) DEFAULT NULL,
  `f212_saksi_2_pekerjaan_id` int(11) DEFAULT NULL,
  `f212_tanggal_pemberkatan_perkawinan` date DEFAULT NULL,
  `f212_hari_melapor` varchar(255) DEFAULT NULL,
  `f212_tanggal_melapor` datetime DEFAULT NULL,
  `f212_perkawinan_agama_id` int(11) DEFAULT NULL,
  `f212_nama_organisasi_kepercayaan_perkawinan` varchar(255) DEFAULT NULL,
  `f212_nama_badan_peradilan` varchar(255) DEFAULT NULL,
  `f212_nomor_putusan_pengadilan` varchar(255) DEFAULT NULL,
  `f212_tanggal_putusan_pengadilan` date DEFAULT NULL,
  `f212_nama_pemuka_agama` varchar(255) DEFAULT NULL,
  `f212_ijin_perwakilan_WNA` varchar(255) DEFAULT NULL,
  `f212_jumlah_anak_disahkan` tinyint(4) DEFAULT NULL,
  `f212_nomor_akta_perkawinan` varchar(255) DEFAULT NULL,
  `f212_tanggal_akta_perkawinan` date DEFAULT NULL,
  `f212_tanggal_cetak_kutipan_akta` date DEFAULT NULL,
  `f212_nama_petugas_entry_data` varchar(255) DEFAULT NULL,
  `f212_tanggal_entry_data` date DEFAULT NULL,
  PRIMARY KEY (`f212_id`),
  KEY `f212_perkawinan_ke_suami` (`f212_suami_perkawinan_ke`),
  KEY `f212_pengajuan_id` (`f212_pengajuan_id`),
  KEY `f212_suami_wilayah_id` (`f212_suami_wilayah_id`),
  KEY `f212_suami_pendidikan_id` (`f212_suami_pendidikan_id`),
  KEY `f212_suami_agama_id` (`f212_suami_agama_id`),
  KEY `f212_suami_pekerjaan_id` (`f212_suami_pekerjaan_id`),
  KEY `f212_suami_status_kawin_id` (`f212_suami_status_kawin_id`),
  KEY `f212_suami_kewarganegaraan_id` (`f212_suami_kewarganegaraan_id`),
  KEY `f212_ayah_dari_suami_agama_id` (`f212_ayah_dari_suami_agama_id`),
  KEY `f212_ayah_dari_suami_wilayah_id` (`f212_ayah_dari_suami_wilayah_id`),
  KEY `f212_ayah_dari_suami_pekerjaan_id` (`f212_ayah_dari_suami_pekerjaan_id`),
  KEY `f212_ibu_dari_suami_agama_id` (`f212_ibu_dari_suami_agama_id`),
  KEY `f212_ibu_dari_suami_wilayah_id` (`f212_ibu_dari_suami_wilayah_id`),
  KEY `f212_ibu_dari_suami_pekerjaan_id` (`f212_ibu_dari_suami_pekerjaan_id`),
  KEY `f212_istri_wilayah_id` (`f212_istri_wilayah_id`),
  KEY `f212_istri_pendidikan_terkahir_id` (`f212_istri_pendidikan_terkahir_id`),
  KEY `f212_istri_agama_id` (`f212_istri_agama_id`),
  KEY `f212_istri_pekerjaan_id` (`f212_istri_pekerjaan_id`),
  KEY `f212_istri_status_kawin_id` (`f212_istri_status_kawin_id`),
  KEY `f212_istri_kewarganegaraan_id` (`f212_istri_kewarganegaraan_id`),
  KEY `f212_ayah_dari_istri_agama_id` (`f212_ayah_dari_istri_agama_id`),
  KEY `f212_ayah_dari_istri_wilayah_id` (`f212_ayah_dari_istri_wilayah_id`),
  KEY `f212_ayah_dari_istri_pekerjaan_id` (`f212_ayah_dari_istri_pekerjaan_id`),
  KEY `f212_ibu_dari_istri_agama_id` (`f212_ibu_dari_istri_agama_id`),
  KEY `f212_ibu_dari_istri_wilayah_id` (`f212_ibu_dari_istri_wilayah_id`),
  KEY `f212_ibu_dari_istri_pekerjaan_id` (`f212_ibu_dari_istri_pekerjaan_id`),
  KEY `f212_saksi_1_agama_id` (`f212_saksi_1_agama_id`),
  KEY `f212_saksi_1_wilayah_id` (`f212_saksi_1_wilayah_id`),
  KEY `f212_saksi_1_pekerjaan_id` (`f212_saksi_1_pekerjaan_id`),
  KEY `f212_saksi_2_agama_id` (`f212_saksi_2_agama_id`),
  KEY `f212_saksi_2_wilayah_id` (`f212_saksi_2_wilayah_id`),
  KEY `f212_saksi_2_pekerjaan_id` (`f212_saksi_2_pekerjaan_id`),
  KEY `f212_perkawinan_agama_id` (`f212_perkawinan_agama_id`),
  CONSTRAINT `ta_f212_ibfk_1` FOREIGN KEY (`f212_pengajuan_id`) REFERENCES `ta_pengajuan` (`pengajuan_wilayah_id`),
  CONSTRAINT `ta_f212_ibfk_10` FOREIGN KEY (`f212_ayah_dari_suami_pekerjaan_id`) REFERENCES `ref_pekerjaan` (`id`),
  CONSTRAINT `ta_f212_ibfk_11` FOREIGN KEY (`f212_ayah_dari_suami_pekerjaan_id`) REFERENCES `ref_pekerjaan` (`id`),
  CONSTRAINT `ta_f212_ibfk_12` FOREIGN KEY (`f212_ibu_dari_suami_agama_id`) REFERENCES `ref_agama` (`id`),
  CONSTRAINT `ta_f212_ibfk_13` FOREIGN KEY (`f212_ibu_dari_suami_wilayah_id`) REFERENCES `ref_wilayah` (`id`),
  CONSTRAINT `ta_f212_ibfk_14` FOREIGN KEY (`f212_ibu_dari_suami_pekerjaan_id`) REFERENCES `ref_pekerjaan` (`id`),
  CONSTRAINT `ta_f212_ibfk_15` FOREIGN KEY (`f212_istri_wilayah_id`) REFERENCES `ref_wilayah` (`id`),
  CONSTRAINT `ta_f212_ibfk_16` FOREIGN KEY (`f212_istri_pendidikan_terkahir_id`) REFERENCES `ref_pendidikan` (`id`),
  CONSTRAINT `ta_f212_ibfk_17` FOREIGN KEY (`f212_istri_agama_id`) REFERENCES `ref_agama` (`id`),
  CONSTRAINT `ta_f212_ibfk_18` FOREIGN KEY (`f212_istri_pekerjaan_id`) REFERENCES `ref_pekerjaan` (`id`),
  CONSTRAINT `ta_f212_ibfk_19` FOREIGN KEY (`f212_istri_status_kawin_id`) REFERENCES `ref_kawin` (`id`),
  CONSTRAINT `ta_f212_ibfk_2` FOREIGN KEY (`f212_suami_wilayah_id`) REFERENCES `ref_wilayah` (`id`),
  CONSTRAINT `ta_f212_ibfk_20` FOREIGN KEY (`f212_istri_kewarganegaraan_id`) REFERENCES `ref_kewarganegaraan` (`kewarganegaraan_id`),
  CONSTRAINT `ta_f212_ibfk_21` FOREIGN KEY (`f212_ayah_dari_istri_agama_id`) REFERENCES `ref_agama` (`id`),
  CONSTRAINT `ta_f212_ibfk_22` FOREIGN KEY (`f212_ayah_dari_istri_wilayah_id`) REFERENCES `ref_wilayah` (`id`),
  CONSTRAINT `ta_f212_ibfk_23` FOREIGN KEY (`f212_ayah_dari_istri_pekerjaan_id`) REFERENCES `ref_pekerjaan` (`id`),
  CONSTRAINT `ta_f212_ibfk_24` FOREIGN KEY (`f212_ibu_dari_istri_agama_id`) REFERENCES `ref_agama` (`id`),
  CONSTRAINT `ta_f212_ibfk_25` FOREIGN KEY (`f212_ibu_dari_istri_wilayah_id`) REFERENCES `ref_wilayah` (`id`),
  CONSTRAINT `ta_f212_ibfk_26` FOREIGN KEY (`f212_ibu_dari_istri_pekerjaan_id`) REFERENCES `ref_pekerjaan` (`id`),
  CONSTRAINT `ta_f212_ibfk_27` FOREIGN KEY (`f212_saksi_1_agama_id`) REFERENCES `ref_agama` (`id`),
  CONSTRAINT `ta_f212_ibfk_28` FOREIGN KEY (`f212_saksi_1_wilayah_id`) REFERENCES `ref_wilayah` (`id`),
  CONSTRAINT `ta_f212_ibfk_29` FOREIGN KEY (`f212_saksi_1_pekerjaan_id`) REFERENCES `ref_pekerjaan` (`id`),
  CONSTRAINT `ta_f212_ibfk_3` FOREIGN KEY (`f212_suami_pendidikan_id`) REFERENCES `ref_pendidikan` (`id`),
  CONSTRAINT `ta_f212_ibfk_30` FOREIGN KEY (`f212_saksi_2_agama_id`) REFERENCES `ref_agama` (`id`),
  CONSTRAINT `ta_f212_ibfk_31` FOREIGN KEY (`f212_saksi_2_wilayah_id`) REFERENCES `ref_wilayah` (`id`),
  CONSTRAINT `ta_f212_ibfk_32` FOREIGN KEY (`f212_saksi_2_pekerjaan_id`) REFERENCES `ref_pekerjaan` (`id`),
  CONSTRAINT `ta_f212_ibfk_33` FOREIGN KEY (`f212_perkawinan_agama_id`) REFERENCES `ref_agama` (`id`),
  CONSTRAINT `ta_f212_ibfk_4` FOREIGN KEY (`f212_suami_agama_id`) REFERENCES `ref_agama` (`id`),
  CONSTRAINT `ta_f212_ibfk_5` FOREIGN KEY (`f212_suami_pekerjaan_id`) REFERENCES `ref_pekerjaan` (`id`),
  CONSTRAINT `ta_f212_ibfk_6` FOREIGN KEY (`f212_suami_status_kawin_id`) REFERENCES `ref_kawin` (`id`),
  CONSTRAINT `ta_f212_ibfk_7` FOREIGN KEY (`f212_suami_kewarganegaraan_id`) REFERENCES `ref_kewarganegaraan` (`kewarganegaraan_id`),
  CONSTRAINT `ta_f212_ibfk_8` FOREIGN KEY (`f212_ayah_dari_suami_agama_id`) REFERENCES `ref_agama` (`id`),
  CONSTRAINT `ta_f212_ibfk_9` FOREIGN KEY (`f212_ayah_dari_suami_wilayah_id`) REFERENCES `ref_wilayah` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ta_f212` */

/*Table structure for table `ta_f219` */

DROP TABLE IF EXISTS `ta_f219`;

CREATE TABLE `ta_f219` (
  `f219_id` int(20) NOT NULL AUTO_INCREMENT,
  `f219_pengajuan_id` int(12) DEFAULT NULL,
  `f219_NIK_suami` varchar(255) DEFAULT NULL,
  `f219_nomor_KK_suami` varchar(255) DEFAULT NULL,
  `f219_nomor_paspor_suami` varchar(255) DEFAULT NULL,
  `f219_nama_suami` varchar(255) DEFAULT NULL,
  `f219_tempat_lahir_suami` varchar(255) DEFAULT NULL,
  `f219_tanggal_lahir_suami` date DEFAULT NULL,
  `f219_alamat_suami` varchar(255) DEFAULT NULL,
  `f219_RT_suami` varchar(255) DEFAULT NULL,
  `f219_RW_suami` varchar(255) DEFAULT NULL,
  `f219_suami_wilayah_id` int(11) DEFAULT NULL,
  `f219_telepon_suami` varchar(255) DEFAULT NULL,
  `f219_desa_suami` varchar(255) DEFAULT NULL,
  `f219_kecamatan_suami` varchar(255) DEFAULT NULL,
  `f219_kabupaten_suami` varchar(255) DEFAULT NULL,
  `f219_provinsi_suami` varbinary(255) DEFAULT NULL,
  `f219_suami_pendidikan_terakhir_id` int(11) DEFAULT NULL,
  `f219_suami_agama_id` int(11) DEFAULT NULL,
  `f219_nama_organisasi_kepercayaan_suami` varchar(255) DEFAULT NULL,
  `f219_suami_pekerjaan_id` int(11) DEFAULT NULL,
  `f219_suami_perceraian_ke` varchar(255) DEFAULT NULL,
  `f219_suami_kewarganegaraan_id` int(11) DEFAULT NULL,
  `f219_kebangsaan_suami` varchar(255) DEFAULT NULL,
  `f219_NIK_istri` varchar(255) DEFAULT NULL,
  `f219_nomor_KK_istri` varchar(255) DEFAULT NULL,
  `f219_nomor_paspor_istri` varchar(255) DEFAULT NULL,
  `f219_nama_istri` varchar(255) DEFAULT NULL,
  `f219_tempat_lahir_istri` varchar(255) DEFAULT NULL,
  `f219_tanggal_lahir_istri` date DEFAULT NULL,
  `f219_alamat_istri` varchar(255) DEFAULT NULL,
  `f219_RT_istri` varchar(255) DEFAULT NULL,
  `f219_RW_istri` varchar(255) DEFAULT NULL,
  `f219_istri_wilayah_id` int(11) DEFAULT NULL,
  `f219_telepon_istri` varchar(255) DEFAULT NULL,
  `f219_desa_istri` varchar(255) DEFAULT NULL,
  `f219_kecamatan_istri` varchar(255) DEFAULT NULL,
  `f219_kabupaten_istri` varchar(255) DEFAULT NULL,
  `f219_provinsi_istri` varchar(255) DEFAULT NULL,
  `f219_istri_pendidikan_id` int(11) DEFAULT NULL,
  `f219_istri_agama_id` int(11) DEFAULT NULL,
  `f219_nama_organisasi_kepercayaan_istri` varchar(255) DEFAULT NULL,
  `f219_istri_pekerjaan_id` int(11) DEFAULT NULL,
  `f219_istri_kewarganegaraan_id` int(11) DEFAULT NULL,
  `f219_kebangsaan_istri` varchar(255) DEFAULT NULL,
  `f219_yang_mengajukan_perceraian` varchar(225) DEFAULT NULL,
  `f219_nomor_akta_perkawinan` varchar(255) DEFAULT NULL,
  `f219_tanggal_akta_perkawinan` date DEFAULT NULL,
  `f219_tempat_pencatatan_perkawinan` varchar(255) DEFAULT NULL,
  `f219_nomor_putusan_pengadilan` varchar(255) DEFAULT NULL,
  `f219_tanggal_putusan_pengadilan` date DEFAULT NULL,
  `f219_nama_dan_tingkat_peradilan_yang_memutuskan` varchar(255) DEFAULT NULL,
  `f219_tempat_kedudukan_lembaga_peradilan` varchar(255) DEFAULT NULL,
  `f219_nama_lembaga_peradilan_yang_menerbitkan` varchar(255) DEFAULT NULL,
  `f219_sebab_perceraian` varchar(255) DEFAULT NULL,
  `f219_hari_melapor` varchar(255) DEFAULT NULL,
  `f219_tanggal_melapor` date DEFAULT NULL,
  `f219_nomor_akta_perceraian` varchar(255) DEFAULT NULL,
  `f219_tanggal_akta_perceraian` date DEFAULT NULL,
  `f219_tanggal_cetak_kutipan_akta_perceraian` varchar(255) DEFAULT NULL,
  `f219_nama_petugas_entri_data` varchar(255) DEFAULT NULL,
  `f219_tanggal_entri_data` date DEFAULT NULL,
  PRIMARY KEY (`f219_id`),
  KEY `f219_suami_wilayah_id` (`f219_suami_wilayah_id`),
  KEY `f219_suami_pendidikan_terakhir_id` (`f219_suami_pendidikan_terakhir_id`),
  KEY `f219_suami_agama_id` (`f219_suami_agama_id`),
  KEY `f219_suami_pekerjaan_id` (`f219_suami_pekerjaan_id`),
  KEY `f219_suami_kewarganegaraan_id` (`f219_suami_kewarganegaraan_id`),
  KEY `f219_istri_wilayah_id` (`f219_istri_wilayah_id`),
  KEY `f219_istri_agama_id` (`f219_istri_agama_id`),
  KEY `f219_istri_pekerjaan_id` (`f219_istri_pekerjaan_id`),
  KEY `f219_istri_kewarganegaraan_id` (`f219_istri_kewarganegaraan_id`),
  KEY `f219_istri_pendidikan_id` (`f219_istri_pendidikan_id`),
  KEY `f219_pengajuan_id` (`f219_pengajuan_id`),
  CONSTRAINT `ta_f219_ibfk_1` FOREIGN KEY (`f219_suami_wilayah_id`) REFERENCES `ref_wilayah` (`id`),
  CONSTRAINT `ta_f219_ibfk_10` FOREIGN KEY (`f219_istri_pendidikan_id`) REFERENCES `ref_pendidikan` (`id`),
  CONSTRAINT `ta_f219_ibfk_11` FOREIGN KEY (`f219_pengajuan_id`) REFERENCES `ta_pengajuan` (`pengajuan_wilayah_id`),
  CONSTRAINT `ta_f219_ibfk_2` FOREIGN KEY (`f219_suami_pendidikan_terakhir_id`) REFERENCES `ref_pendidikan` (`id`),
  CONSTRAINT `ta_f219_ibfk_3` FOREIGN KEY (`f219_suami_agama_id`) REFERENCES `ref_agama` (`id`),
  CONSTRAINT `ta_f219_ibfk_4` FOREIGN KEY (`f219_suami_pekerjaan_id`) REFERENCES `ref_pekerjaan` (`id`),
  CONSTRAINT `ta_f219_ibfk_5` FOREIGN KEY (`f219_suami_kewarganegaraan_id`) REFERENCES `ref_kewarganegaraan` (`kewarganegaraan_id`),
  CONSTRAINT `ta_f219_ibfk_6` FOREIGN KEY (`f219_istri_wilayah_id`) REFERENCES `ref_wilayah` (`id`),
  CONSTRAINT `ta_f219_ibfk_7` FOREIGN KEY (`f219_istri_agama_id`) REFERENCES `ref_agama` (`id`),
  CONSTRAINT `ta_f219_ibfk_8` FOREIGN KEY (`f219_istri_pekerjaan_id`) REFERENCES `ref_pekerjaan` (`id`),
  CONSTRAINT `ta_f219_ibfk_9` FOREIGN KEY (`f219_istri_kewarganegaraan_id`) REFERENCES `ref_kewarganegaraan` (`kewarganegaraan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ta_f219` */

/*Table structure for table `ta_foto_berita` */

DROP TABLE IF EXISTS `ta_foto_berita`;

CREATE TABLE `ta_foto_berita` (
  `foto_berita_id` int(11) NOT NULL AUTO_INCREMENT,
  `foto_berita_berita_id` int(11) DEFAULT NULL,
  `foto_berita_foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`foto_berita_id`),
  KEY `berita_id` (`foto_berita_berita_id`),
  CONSTRAINT `ta_foto_berita_ibfk_1` FOREIGN KEY (`foto_berita_berita_id`) REFERENCES `ta_berita` (`berita_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `ta_foto_berita` */

insert  into `ta_foto_berita`(`foto_berita_id`,`foto_berita_berita_id`,`foto_berita_foto`) values (1,NULL,'http://cekingx.my.id/desa-digital/storage/desa/BLAHBATUH/berita/foto/a.jpg'),(2,NULL,'http://cekingx.my.id/desa-digital/storage/desa/BLAHBATUH/berita/foto/a.jpg');

/*Table structure for table `ta_galeri` */

DROP TABLE IF EXISTS `ta_galeri`;

CREATE TABLE `ta_galeri` (
  `galeri_id` int(11) NOT NULL AUTO_INCREMENT,
  `galeri_wilayah_id` int(11) DEFAULT NULL,
  `galeri_judul` varchar(255) DEFAULT NULL,
  `galeri_deskripsi` varchar(255) DEFAULT NULL,
  `galeri_slug` varchar(255) DEFAULT NULL,
  `galeri_created_at` timestamp NULL DEFAULT current_timestamp(),
  `galeri_updated_at` timestamp NULL DEFAULT current_timestamp(),
  `galeri_is_deleted` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`galeri_id`),
  KEY `galeri_wilayah_id` (`galeri_wilayah_id`),
  CONSTRAINT `ta_galeri_ibfk_1` FOREIGN KEY (`galeri_wilayah_id`) REFERENCES `ref_wilayah` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

/*Data for the table `ta_galeri` */

insert  into `ta_galeri`(`galeri_id`,`galeri_wilayah_id`,`galeri_judul`,`galeri_deskripsi`,`galeri_slug`,`galeri_created_at`,`galeri_updated_at`,`galeri_is_deleted`) values (72,66,'test1','1','test1','2020-11-02 07:51:40','2020-11-02 07:51:40',0),(73,66,'tst','1','tst','2020-11-02 07:55:45','2020-11-02 07:55:45',0),(74,66,'qwe','qwe','qwe','2020-11-02 07:56:21','2020-11-02 07:56:21',0),(75,66,'qwe','qwe','qwe','2020-11-02 08:06:06','2020-11-02 08:06:06',0);

/*Table structure for table `ta_ket_tidak_mampu` */

DROP TABLE IF EXISTS `ta_ket_tidak_mampu`;

CREATE TABLE `ta_ket_tidak_mampu` (
  `ktm_id` int(11) NOT NULL AUTO_INCREMENT,
  `ktm_pengajuan_id` bigint(20) DEFAULT NULL,
  `ktm_nomor_permohonan` varchar(255) DEFAULT NULL,
  `ktm_tanggal_permohonan` date DEFAULT NULL,
  `ktm_petugas_entry` varchar(255) DEFAULT NULL,
  `ktm_nik` varchar(255) DEFAULT NULL,
  `ktm_nama_lengkap` varchar(255) DEFAULT NULL,
  `ktm_tempat_lahir` varchar(255) DEFAULT NULL,
  `ktm_tanggal_lahir` date DEFAULT NULL,
  `ktm_no_kk` varchar(255) DEFAULT NULL,
  `ktm_alamat` text DEFAULT NULL,
  `ktm_desa` varchar(255) DEFAULT NULL,
  `ktm_kecamatan` varchar(255) DEFAULT NULL,
  `ktm_no_telp` varchar(255) DEFAULT NULL,
  `ktm_kelamin_id` int(11) DEFAULT NULL,
  `ktm_pekerjaan_id` int(11) DEFAULT NULL,
  `ktm_agama_id` int(11) DEFAULT NULL,
  `ktm_kewarganegaraan_id` int(11) DEFAULT NULL,
  `ktm_kawin_id` int(11) DEFAULT NULL,
  `ktm_kabupaten` varchar(255) DEFAULT NULL,
  `ktm_provinsi` varchar(255) DEFAULT NULL,
  `ktm_email` varchar(255) DEFAULT NULL,
  `ktm_keperluan` varchar(255) DEFAULT NULL,
  `ktm_keterangan_lainnya` varchar(255) DEFAULT NULL,
  `ktm_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ktm_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ktm_is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ktm_id`),
  KEY `ktm_id` (`ktm_id`),
  KEY `ktm_kelamin_id` (`ktm_kelamin_id`),
  KEY `ktm_pekerjaan_id` (`ktm_pekerjaan_id`),
  KEY `ktm_agama_id` (`ktm_agama_id`),
  KEY `ktm_kewarganegaraan_id` (`ktm_kewarganegaraan_id`),
  KEY `ktm_kawin_id` (`ktm_kawin_id`),
  KEY `ktm_pengajuan_id` (`ktm_pengajuan_id`),
  CONSTRAINT `ta_ket_tidak_mampu_ibfk_1` FOREIGN KEY (`ktm_kelamin_id`) REFERENCES `ref_kelamin` (`id`),
  CONSTRAINT `ta_ket_tidak_mampu_ibfk_2` FOREIGN KEY (`ktm_pekerjaan_id`) REFERENCES `ref_pekerjaan` (`id`),
  CONSTRAINT `ta_ket_tidak_mampu_ibfk_3` FOREIGN KEY (`ktm_agama_id`) REFERENCES `ref_agama` (`id`),
  CONSTRAINT `ta_ket_tidak_mampu_ibfk_4` FOREIGN KEY (`ktm_kewarganegaraan_id`) REFERENCES `ref_kewarganegaraan` (`kewarganegaraan_id`),
  CONSTRAINT `ta_ket_tidak_mampu_ibfk_5` FOREIGN KEY (`ktm_kawin_id`) REFERENCES `ref_kawin` (`id`),
  CONSTRAINT `ta_ket_tidak_mampu_ibfk_6` FOREIGN KEY (`ktm_pengajuan_id`) REFERENCES `ta_pengajuan` (`pengajuan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `ta_ket_tidak_mampu` */

insert  into `ta_ket_tidak_mampu`(`ktm_id`,`ktm_pengajuan_id`,`ktm_nomor_permohonan`,`ktm_tanggal_permohonan`,`ktm_petugas_entry`,`ktm_nik`,`ktm_nama_lengkap`,`ktm_tempat_lahir`,`ktm_tanggal_lahir`,`ktm_no_kk`,`ktm_alamat`,`ktm_desa`,`ktm_kecamatan`,`ktm_no_telp`,`ktm_kelamin_id`,`ktm_pekerjaan_id`,`ktm_agama_id`,`ktm_kewarganegaraan_id`,`ktm_kawin_id`,`ktm_kabupaten`,`ktm_provinsi`,`ktm_email`,`ktm_keperluan`,`ktm_keterangan_lainnya`,`ktm_created_at`,`ktm_updated_at`,`ktm_is_deleted`) values (1,7,'1','2020-12-17','admin_blahbatuh','1705552012','ngurah','denpasar','1999-07-28','1705552012','gianyar','serongga','gianyar','08123456789',1,7,4,1,1,'gianyar','bali','dummy@gmail.com','mencari beasiswa','-','2020-12-17 19:44:31','0000-00-00 00:00:00',0),(3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-12-18 10:23:46','0000-00-00 00:00:00',0),(5,NULL,'a','0000-00-00','a','a','a','a','0000-00-00','a','a','a','a','a',1,1,1,1,1,'a','a','a','a','a','2020-12-18 10:34:12','0000-00-00 00:00:00',0);

/*Table structure for table `ta_lampiran_pengumuman` */

DROP TABLE IF EXISTS `ta_lampiran_pengumuman`;

CREATE TABLE `ta_lampiran_pengumuman` (
  `lampiran_pengumuman_id` int(11) NOT NULL AUTO_INCREMENT,
  `lampiran_pengumuman_pengumuman_id` int(11) DEFAULT NULL,
  `lampiran_pengumuman_lampiran` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`lampiran_pengumuman_id`),
  KEY `lampiran_pengumuman_pengumuman_id` (`lampiran_pengumuman_pengumuman_id`),
  CONSTRAINT `ta_lampiran_pengumuman_ibfk_1` FOREIGN KEY (`lampiran_pengumuman_pengumuman_id`) REFERENCES `ta_pengumuman` (`pengumuman_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ta_lampiran_pengumuman` */

/*Table structure for table `ta_pengajuan` */

DROP TABLE IF EXISTS `ta_pengajuan`;

CREATE TABLE `ta_pengajuan` (
  `pengajuan_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pengajuan_wilayah_id` int(11) DEFAULT NULL,
  `pengajuan_nik` varchar(255) DEFAULT NULL,
  `pengajuan_komen` varchar(255) DEFAULT NULL,
  `pengajuan_status_pengajuan_id` int(11) DEFAULT NULL,
  `pengajuan_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `pengajuan_updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `pengajuan_is_deleted` tinyint(4) DEFAULT 0,
  `pengajuan_jenis_layanan` int(11) DEFAULT NULL,
  PRIMARY KEY (`pengajuan_id`),
  KEY `pengajuan_wilayah_id` (`pengajuan_wilayah_id`),
  KEY `ta_pengajuan_ibfk_2` (`pengajuan_status_pengajuan_id`),
  KEY `ta_pengajuan_FK` (`pengajuan_jenis_layanan`),
  CONSTRAINT `ta_pengajuan_FK` FOREIGN KEY (`pengajuan_jenis_layanan`) REFERENCES `ref_layanan` (`layanan_id`),
  CONSTRAINT `ta_pengajuan_ibfk_1` FOREIGN KEY (`pengajuan_wilayah_id`) REFERENCES `ref_wilayah` (`id`),
  CONSTRAINT `ta_pengajuan_ibfk_2` FOREIGN KEY (`pengajuan_status_pengajuan_id`) REFERENCES `ref_status_pengajuan` (`status_pengajuan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `ta_pengajuan` */

insert  into `ta_pengajuan`(`pengajuan_id`,`pengajuan_wilayah_id`,`pengajuan_nik`,`pengajuan_komen`,`pengajuan_status_pengajuan_id`,`pengajuan_created_at`,`pengajuan_updated_at`,`pengajuan_is_deleted`,`pengajuan_jenis_layanan`) values (1,66,'5104031307990004',NULL,1,'2020-11-14 07:39:04','2020-11-14 07:39:04',0,1),(2,66,'5104023101640001',NULL,1,'2020-11-14 07:39:05','2020-11-14 07:39:05',0,1),(3,66,'5104023101640001',NULL,1,'2020-11-21 08:57:29','2020-11-21 08:57:29',0,1),(4,66,'5104023101640001',NULL,1,'2020-11-21 08:59:43','2020-11-21 08:59:43',0,2),(5,66,'5104023101640001',NULL,1,'2020-12-18 10:23:45','2020-12-18 10:23:45',0,3),(7,66,'5104023101640001',NULL,1,'2020-12-18 10:33:57','2020-12-18 10:33:57',0,3);

/*Table structure for table `ta_pengumuman` */

DROP TABLE IF EXISTS `ta_pengumuman`;

CREATE TABLE `ta_pengumuman` (
  `pengumuman_id` int(11) NOT NULL AUTO_INCREMENT,
  `pengumuman_publish_user_id` int(11) DEFAULT NULL,
  `pengumuman_wilayah_id` int(11) DEFAULT NULL,
  `pengumuman_judul` varchar(255) DEFAULT NULL,
  `pengumuman_isi` text DEFAULT NULL,
  `pengumuman_created_at` timestamp NULL DEFAULT current_timestamp(),
  `pengumuman_updated_at` timestamp NULL DEFAULT current_timestamp(),
  `pengumuman_is_deleted` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`pengumuman_id`),
  KEY `pengumuman_wilayah_id` (`pengumuman_wilayah_id`),
  CONSTRAINT `ta_pengumuman_ibfk_1` FOREIGN KEY (`pengumuman_wilayah_id`) REFERENCES `ref_wilayah` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `ta_pengumuman` */

insert  into `ta_pengumuman`(`pengumuman_id`,`pengumuman_publish_user_id`,`pengumuman_wilayah_id`,`pengumuman_judul`,`pengumuman_isi`,`pengumuman_created_at`,`pengumuman_updated_at`,`pengumuman_is_deleted`) values (10,NULL,NULL,'test123','Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam inventore nulla minus commodi accusamus, esse nisi? Nam, nobis soluta repudiandae quo recusandae commodi amet quam quod accusantium ad aliquam eum.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam inventore nulla minus commodi accusamus, esse nisi? Nam, nobis soluta repudiandae quo recusandae commodi amet quam quod accusantium ad aliquam eum.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam inventore nulla minus commodi accusamus, esse nisi? Nam, nobis soluta repudiandae quo recusandae commodi amet quam quod accusantium ad aliquam eum.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam inventore nulla minus commodi accusamus, esse nisi? Nam, nobis soluta repudiandae quo recusandae commodi amet quam quod accusantium ad aliquam eum.','2020-10-14 11:53:59','2020-10-22 10:54:14',NULL),(11,NULL,66,'asdasd','asdasd','2020-11-02 11:44:06','2020-11-02 11:44:06',0),(12,NULL,66,'a','a','2020-11-02 11:55:08','2020-11-02 11:55:08',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
