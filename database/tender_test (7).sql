/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 10.1.36-MariaDB : Database - tender_test
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tender_test` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tender_test`;

/*Table structure for table `cms_apicustom` */

DROP TABLE IF EXISTS `cms_apicustom`;

CREATE TABLE `cms_apicustom` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permalink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tabel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kolom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_query_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sql_where` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `method_type` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci,
  `responses` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `cms_apikey` */

DROP TABLE IF EXISTS `cms_apikey`;

CREATE TABLE `cms_apikey` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `screetkey` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `cms_dashboard` */

DROP TABLE IF EXISTS `cms_dashboard`;

CREATE TABLE `cms_dashboard` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `cms_email_queues` */

DROP TABLE IF EXISTS `cms_email_queues`;

CREATE TABLE `cms_email_queues` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `send_at` datetime DEFAULT NULL,
  `email_recipient` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_cc_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_content` text COLLATE utf8mb4_unicode_ci,
  `email_attachments` text COLLATE utf8mb4_unicode_ci,
  `is_sent` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `cms_email_templates` */

DROP TABLE IF EXISTS `cms_email_templates`;

CREATE TABLE `cms_email_templates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `cms_logs` */

DROP TABLE IF EXISTS `cms_logs`;

CREATE TABLE `cms_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ipaddress` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `useragent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `id_cms_users` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `cms_menus` */

DROP TABLE IF EXISTS `cms_menus`;

CREATE TABLE `cms_menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'url',
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_dashboard` tinyint(1) NOT NULL DEFAULT '0',
  `id_cms_privileges` int(11) DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `cms_menus_privileges` */

DROP TABLE IF EXISTS `cms_menus_privileges`;

CREATE TABLE `cms_menus_privileges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_cms_menus` int(11) DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `cms_moduls` */

DROP TABLE IF EXISTS `cms_moduls`;

CREATE TABLE `cms_moduls` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_protected` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `cms_notifications` */

DROP TABLE IF EXISTS `cms_notifications`;

CREATE TABLE `cms_notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_cms_users` int(11) DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `cms_privileges` */

DROP TABLE IF EXISTS `cms_privileges`;

CREATE TABLE `cms_privileges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_superadmin` tinyint(1) DEFAULT NULL,
  `theme_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `cms_privileges_roles` */

DROP TABLE IF EXISTS `cms_privileges_roles`;

CREATE TABLE `cms_privileges_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `is_visible` tinyint(1) DEFAULT NULL,
  `is_create` tinyint(1) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `is_edit` tinyint(1) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `id_cms_moduls` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `cms_settings` */

DROP TABLE IF EXISTS `cms_settings`;

CREATE TABLE `cms_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `content_input_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dataenum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `helper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_setting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `cms_statistic_components` */

DROP TABLE IF EXISTS `cms_statistic_components`;

CREATE TABLE `cms_statistic_components` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_cms_statistics` int(11) DEFAULT NULL,
  `componentID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `component_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_name` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `config` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `cms_statistics` */

DROP TABLE IF EXISTS `cms_statistics`;

CREATE TABLE `cms_statistics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `cms_users` */

DROP TABLE IF EXISTS `cms_users`;

CREATE TABLE `cms_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `daftar_uraian_tugas` */

DROP TABLE IF EXISTS `daftar_uraian_tugas`;

CREATE TABLE `daftar_uraian_tugas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_posisi` varchar(100) NOT NULL,
  `nama_proyek` varchar(100) NOT NULL,
  `uraian_tugas` text NOT NULL,
  `waktu_pelaksanaan` date NOT NULL,
  `created_by` int(12) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(12) unsigned DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fki_daftar_uraian_tugas_updated_by_fk` (`updated_by`),
  KEY `fki_daftar_uraian_tugas_created_by_fk` (`created_by`),
  CONSTRAINT `daftar_uraian_tugas_created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `daftar_uraian_tugas_updated_by_fk` FOREIGN KEY (`updated_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `enumeration` */

DROP TABLE IF EXISTS `enumeration`;

CREATE TABLE `enumeration` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fki_enumeration_created_by_fk` (`created_by`),
  KEY `fki_enumeration_updated_by_fk` (`updated_by`),
  CONSTRAINT `enumeration_created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `enumeration_updated_by_fk` FOREIGN KEY (`updated_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `kepemilikan_saham` */

DROP TABLE IF EXISTS `kepemilikan_saham`;

CREATE TABLE `kepemilikan_saham` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `no_ktp` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `saham_presentase` varchar(255) NOT NULL,
  `created_by` int(12) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(12) unsigned DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fki_kepemilikan_saham_updated_by_fk` (`updated_by`),
  KEY `fki_kepemilikan_saham_created_by_fk` (`created_by`),
  CONSTRAINT `kepemilikan_saham_created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `kepemilikan_saham_updated_by_fk` FOREIGN KEY (`updated_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `master_syarat_kualifikasi` */

DROP TABLE IF EXISTS `master_syarat_kualifikasi`;

CREATE TABLE `master_syarat_kualifikasi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `is_dokumen` tinyint(1) NOT NULL DEFAULT '0',
  `is_leaf` tinyint(1) DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fki_master_syarat_kualifikasi_parent_id_fk` (`parent_id`),
  CONSTRAINT `master_syarat_kualifikasi_parent_id_fk` FOREIGN KEY (`parent_id`) REFERENCES `master_syarat_kualifikasi` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

/*Table structure for table `master_syarat_kualifikasi_detail` */

DROP TABLE IF EXISTS `master_syarat_kualifikasi_detail`;

CREATE TABLE `master_syarat_kualifikasi_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `master_syarat_kualifikasi_id` int(10) unsigned NOT NULL,
  `field_name` varchar(100) DEFAULT NULL,
  `field_type` int(11) DEFAULT NULL,
  `sequence` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fki_master_syarat_kualifikasi_detail_msk_id_fk` (`master_syarat_kualifikasi_id`),
  CONSTRAINT `master_syarat_kualifikasi_detail_msk_id_fk` FOREIGN KEY (`master_syarat_kualifikasi_id`) REFERENCES `master_syarat_kualifikasi` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_pengguna_jasa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_pengguna_jasa_id` int(10) unsigned DEFAULT NULL,
  `divisi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp_cp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fki_pelanggan_kategori_pengguna_jasa_id_fk` (`kategori_pengguna_jasa_id`),
  KEY `fki_pelanggan_created_by_fk` (`created_by`),
  KEY `fki_pelanggan_updated_by_fk` (`updated_by`),
  CONSTRAINT `pelanggan_created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `pelanggan_kategori_pengguna_jasa_id_fk` FOREIGN KEY (`kategori_pengguna_jasa_id`) REFERENCES `enumeration` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `pelanggan_updated_by_fk` FOREIGN KEY (`updated_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `pengalaman_perusahaan` */

DROP TABLE IF EXISTS `pengalaman_perusahaan`;

CREATE TABLE `pengalaman_perusahaan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_paket_perusahaan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bidang` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi_proyek` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pengguna_jasa` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_id` int(10) unsigned DEFAULT NULL,
  `alamat_pengguna_jasa` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp_pengguna_jasa` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `periode_kerja_dari` date DEFAULT NULL,
  `periode_kerja_sampai` date DEFAULT NULL,
  `no_kontrak` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_kontrak` int(10) unsigned DEFAULT NULL,
  `tanggal_selesai_kontrak` date DEFAULT NULL,
  `tanggal_bast` date DEFAULT NULL,
  `tahun` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_bast` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `file_bast` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fki_pengalaman_perusahaan_kategori_id_fk` (`kategori_id`),
  KEY `fki_pengalaman_perusahaan_created_by_fk` (`created_by`),
  KEY `fki_pengalaman_perusahaan_updated_by_fk` (`updated_by`),
  CONSTRAINT `pengalaman_perusahaan_created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `pengalaman_perusahaan_kategori_id_fk` FOREIGN KEY (`kategori_id`) REFERENCES `enumeration` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `pengalaman_perusahaan_updated_by_fk` FOREIGN KEY (`updated_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `pengalaman_uraian_kerja` */

DROP TABLE IF EXISTS `pengalaman_uraian_kerja`;

CREATE TABLE `pengalaman_uraian_kerja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pekerjaan` varchar(100) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `ttl` date NOT NULL,
  `pendidikan_formal` varchar(255) NOT NULL,
  `pendidikan_non_formal` varchar(255) NOT NULL,
  `penguasaan_bahasa` varchar(100) NOT NULL,
  `posisi_yang_diusulkan` varchar(100) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `nama_proyek` varchar(255) NOT NULL,
  `lokasi_proyek` varchar(255) DEFAULT NULL,
  `pengguna_jasa_id` int(11) unsigned DEFAULT NULL,
  `status_kepegawaian` varchar(100) NOT NULL,
  `surat_referensi` varchar(100) NOT NULL,
  `waktu_pelaksanaan` date NOT NULL,
  `created_by` int(12) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(12) unsigned DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fki_pengalaman_uraian_kerja_updated_by_fk` (`updated_by`),
  KEY `fki_pengalaman_uraian_kerja_created_by_fk` (`created_by`),
  KEY `fki_pengalaman_uraian_kerja_pengguna_jasa_id_fk` (`pengguna_jasa_id`),
  CONSTRAINT `pengalaman_uraian_kerja_created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `pengalaman_uraian_kerja_pengguna_jasa_id` FOREIGN KEY (`pengguna_jasa_id`) REFERENCES `enumeration` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `pengalaman_uraian_kerja_updated_by_fk` FOREIGN KEY (`updated_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `pengurus_badan_usaha` */

DROP TABLE IF EXISTS `pengurus_badan_usaha`;

CREATE TABLE `pengurus_badan_usaha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `no_ktp` varchar(100) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `created_by` int(12) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(12) unsigned DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fki_pengurus_badan_usaha_updated_by_fk` (`updated_by`),
  KEY `fki_pengurus_badan_usaha_created_by_fk` (`created_by`),
  CONSTRAINT `pengurus_badan_usaha_created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `pengurus_badan_usaha_updated_by_fk` FOREIGN KEY (`updated_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `peralatan` */

DROP TABLE IF EXISTS `peralatan`;

CREATE TABLE `peralatan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `merek` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_pembuatan` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` int(10) unsigned DEFAULT NULL,
  `kapasitas` int(10) unsigned DEFAULT NULL,
  `kondisi_id` int(10) unsigned DEFAULT NULL,
  `lokasi` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fki_peralatan_kondisi_id_fk` (`kondisi_id`),
  KEY `fki_peralatan_created_by_fk` (`created_by`),
  KEY `fki_peralatan_updated_by_fk` (`updated_by`),
  CONSTRAINT `peralatan_created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `peralatan_kondisi_id_fk` FOREIGN KEY (`kondisi_id`) REFERENCES `enumeration` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `peralatan_updated_by_fk` FOREIGN KEY (`updated_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `siswa_user_id` FOREIGN KEY (`user_id`) REFERENCES `cms_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `surat_ijin_usaha` */

DROP TABLE IF EXISTS `surat_ijin_usaha`;

CREATE TABLE `surat_ijin_usaha` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ijin_usaha` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_ijin_usaha` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_terbit` date DEFAULT NULL,
  `berlaku_sampai` date DEFAULT NULL,
  `instansi_pemberi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_ijin_usaha` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kualifikasi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fki_surat_ijin_usaha_created_by_fk` (`created_by`),
  KEY `fki_surat_ijin_usaha_updated_by_fk` (`updated_by`),
  CONSTRAINT `surat_ijin_usaha_created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `surat_ijin_usaha_updated_by_fk` FOREIGN KEY (`updated_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `syarat_kualifikasi` */

DROP TABLE IF EXISTS `syarat_kualifikasi`;

CREATE TABLE `syarat_kualifikasi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_tender` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pemberi_tender` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jadwal_tender` date DEFAULT NULL,
  `status_dokument` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_kelengkapan` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_terkirim` date DEFAULT NULL,
  `progress` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fki_syarat_kualifikasi_created_by_fk` (`created_by`),
  KEY `fki_syarat_kualifikasi_updated_by_fk` (`updated_by`),
  CONSTRAINT `syarat_kualifikasi_created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `syarat_kualifikasi_updated_by_fk` FOREIGN KEY (`updated_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `tenaga_kerja` */

DROP TABLE IF EXISTS `tenaga_kerja`;

CREATE TABLE `tenaga_kerja` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_ktp` int(11) DEFAULT NULL,
  `no_npwp` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_formal` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lama_pengalaman_kerja` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_ijazah` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teknik_id` int(10) unsigned DEFAULT NULL,
  `strata_id` int(10) unsigned DEFAULT NULL,
  `jurusan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institusi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_non_formal` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_kepegawaian` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sertifikat_training` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_sertifikat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fki_tenaga_kerja_teknik_id_fk` (`teknik_id`),
  KEY `fki_tenaga_kerja_strata_id_fk` (`strata_id`),
  KEY `fki_tenaga_kerja_created_by_fk` (`created_by`),
  KEY `fki_tenaga_kerja_updated_by_fk` (`updated_by`),
  CONSTRAINT `tenaga_kerja_created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `tenaga_kerja_strata_id_fk` FOREIGN KEY (`strata_id`) REFERENCES `enumeration` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `tenaga_kerja_teknik_id_fk` FOREIGN KEY (`teknik_id`) REFERENCES `enumeration` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `tenaga_kerja_updated_by_fk` FOREIGN KEY (`updated_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `tender` */

DROP TABLE IF EXISTS `tender`;

CREATE TABLE `tender` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_tender` varchar(100) DEFAULT NULL,
  `no_tender` varchar(100) DEFAULT NULL,
  `no_berita_acara` varchar(50) DEFAULT NULL,
  `pengguna_jasa_id` int(10) unsigned DEFAULT NULL,
  `metode_kualifikasi_id` int(10) unsigned DEFAULT NULL,
  `no_kualifikasi` varchar(50) DEFAULT NULL,
  `dokumen_tender_text` varchar(50) DEFAULT NULL,
  `dokument_tender_file` varchar(500) DEFAULT NULL,
  `nilai_pagu` varchar(50) DEFAULT NULL,
  `nilai_hps` varchar(50) DEFAULT NULL,
  `metode_dokumen_id` int(10) unsigned DEFAULT NULL,
  `metode_evaluasi_id` int(10) unsigned DEFAULT NULL,
  `bidbond_text` varchar(50) DEFAULT NULL,
  `bidbond_file` varchar(500) DEFAULT NULL,
  `hasil_tender_text` varchar(50) DEFAULT NULL,
  `hasil_tender_file` varchar(500) DEFAULT NULL,
  `ao_name` varchar(100) DEFAULT NULL,
  `lainnya` varchar(200) DEFAULT NULL,
  `status_kelengkapan` varchar(200) DEFAULT 'Berjalan',
  `progress_kelengkapan` int(11) NOT NULL DEFAULT '0',
  `status_verifikasi` varchar(50) NOT NULL DEFAULT 'Not Ok',
  `tanggal_terkirim` date DEFAULT NULL,
  `show_button` tinyint(1) NOT NULL DEFAULT '1',
  `jadwal_upload_dokumen_prakualifikasi` date DEFAULT NULL,
  `jadwal_pembuktian_prakualifikasi` date DEFAULT NULL,
  `jadwal_download_dokumen_pemilihan` date DEFAULT NULL,
  `jadwal_pemberian_penjelasan` date DEFAULT NULL,
  `jadwal_upload_dokumen_penawaran` date DEFAULT NULL,
  `jadwal_pengumuman_pemenang` date DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fki_tender_pengguna_jasa_id_fk` (`pengguna_jasa_id`),
  KEY `fki_tender_metode_kualifikasi_id_fk` (`metode_kualifikasi_id`),
  KEY `fki_tender_metode_dokumen_id_fk` (`metode_dokumen_id`),
  KEY `fki_tender_metode_evaluasi_id_fk` (`metode_evaluasi_id`),
  CONSTRAINT `tender_metode_dokumen_id_fk` FOREIGN KEY (`metode_dokumen_id`) REFERENCES `enumeration` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `tender_metode_evaluasi_id_fk` FOREIGN KEY (`metode_evaluasi_id`) REFERENCES `enumeration` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `tender_metode_kualifikasi_id_fk` FOREIGN KEY (`metode_kualifikasi_id`) REFERENCES `enumeration` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `tender_pengguna_jasa_id_fk` FOREIGN KEY (`pengguna_jasa_id`) REFERENCES `enumeration` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `tender_syarat_kualifikasi` */

DROP TABLE IF EXISTS `tender_syarat_kualifikasi`;

CREATE TABLE `tender_syarat_kualifikasi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tender_id` int(10) unsigned NOT NULL,
  `master_syarat_kualifikasi_id` int(10) unsigned NOT NULL,
  `value` varchar(500) DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fki_tender_syarat_kualifikasi_master_syarat_kualifikasi_id_fk` (`master_syarat_kualifikasi_id`),
  KEY `fki_tender_syarat_kualifikasi_tender_id_fk` (`tender_id`),
  CONSTRAINT `tender_syarat_kualifikasi_master_syarat_kualifikasi_id_fk` FOREIGN KEY (`master_syarat_kualifikasi_id`) REFERENCES `master_syarat_kualifikasi` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `tender_syarat_kualifikasi_tender_id_fk` FOREIGN KEY (`tender_id`) REFERENCES `tender` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Table structure for table `tender_syarat_kualifikasi_detail` */

DROP TABLE IF EXISTS `tender_syarat_kualifikasi_detail`;

CREATE TABLE `tender_syarat_kualifikasi_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tender_syarat_kualifikasi_id` int(10) unsigned NOT NULL,
  `master_syarat_kualifikasi_detail_id` int(10) unsigned NOT NULL,
  `value` varchar(500) DEFAULT NULL,
  `sequence` int(11) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fki_tskd_master_syarat_kualifikasi_detail_id_fk` (`master_syarat_kualifikasi_detail_id`),
  KEY `fki_tskd_tender_syarat_kualifikasi_id_fk` (`tender_syarat_kualifikasi_id`),
  CONSTRAINT `tskd_master_syarat_kualifikasi_detail_id_fk` FOREIGN KEY (`master_syarat_kualifikasi_detail_id`) REFERENCES `master_syarat_kualifikasi_detail` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `tskd_tender_syarat_kualifikasi_id_fk` FOREIGN KEY (`tender_syarat_kualifikasi_id`) REFERENCES `tender_syarat_kualifikasi` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
