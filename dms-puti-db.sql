# ************************************************************
# Sequel Ace SQL dump
# Version 20067
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.4.28-MariaDB)
# Database: new-puti-dms
# Generation Time: 2024-07-20 00:01:51 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table document_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `document_types`;

CREATE TABLE `document_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `document_types` WRITE;
/*!40000 ALTER TABLE `document_types` DISABLE KEYS */;

INSERT INTO `document_types` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(1,'Dokumen Perencanaan',NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(2,'Dokumen Kebijakan/Pedoman',NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(3,'Dokumen Proses',NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(4,'Dokumen Bisnis Proses',NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(5,'Dokumen Prosedur',NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(6,'Dokumen Instruksi Kerja',NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(7,'Dokumen SLA',NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(8,'Dokumen OLA',NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(9,'Dokumen NDA',NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(10,'Dokumen BAST',NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(11,'Dokumen Kontrak Magang/TLH',NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(12,'Dokumen Direktorat',NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(13,'Dokumen Bagian',NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(14,'Dokumen Urusan',NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(15,'Surat Keputusan',NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(16,'Dokumen RTM',NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(17,'Dokumen Rapat Koordinasi',NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(18,'Dokumen Sasaran Mutu',NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(19,'Dokumen Sasaran Layanan TI',NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(20,'Dokumen Kontrak Manajerial (KM)',NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(21,'Dokumen Aplikasi',NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(22,'Surat Tugas',NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(23,'Surat Balasan',NULL,'2024-04-26 15:40:11','2024-04-26 15:40:11'),
	(24,'Surat Keterangan',NULL,'2024-04-26 15:40:11','2024-04-26 15:40:11'),
	(25,'Dokumen Teknis',NULL,'2024-04-26 15:40:11','2024-04-26 15:40:11'),
	(26,'Dokumen Kekayaan Intelektual',NULL,'2024-04-26 15:40:11','2024-04-26 15:40:11'),
	(27,'Dokumen Lisensi',NULL,'2024-04-26 15:40:11','2024-04-26 15:40:11'),
	(28,'Dokumen Awareness',NULL,'2024-04-26 15:40:11','2024-04-26 15:40:11'),
	(29,'Dokumen Enterprise Architecture',NULL,'2024-04-26 15:40:11','2024-04-26 15:40:11'),
	(30,'SDM',NULL,'2024-04-26 15:40:11','2024-04-26 15:40:11');

/*!40000 ALTER TABLE `document_types` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table documents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `documents`;

CREATE TABLE `documents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_dokumen` varchar(255) NOT NULL,
  `nama_dokumen_asli` varchar(255) NOT NULL,
  `nomor_dokumen` varchar(255) NOT NULL,
  `pemilik_dokumen_id` bigint(20) unsigned NOT NULL,
  `tipe_dokumen_id` bigint(20) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `documents_tipe_dokumen_id_foreign` (`tipe_dokumen_id`),
  KEY `documents_pemilik_dokumen_id_foreign` (`pemilik_dokumen_id`),
  CONSTRAINT `documents_pemilik_dokumen_id_foreign` FOREIGN KEY (`pemilik_dokumen_id`) REFERENCES `users` (`id`),
  CONSTRAINT `documents_tipe_dokumen_id_foreign` FOREIGN KEY (`tipe_dokumen_id`) REFERENCES `document_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;

INSERT INTO `documents` (`id`, `nama_dokumen`, `nama_dokumen_asli`, `nomor_dokumen`, `pemilik_dokumen_id`, `tipe_dokumen_id`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(5,'$2y$12$ooGOX/5SzUQyqbRRBh4tyeq9J36e29JknYbDYjK6C4Ml68LeMZRam','testing','665352',5,3,NULL,'2024-04-26 16:50:02','2024-04-26 16:50:02'),
	(6,'$2y$12$Yvur8ioMiBiRmOk98VKBhOvR9jtDAW89ERSwvieLf1oe4ee6SMwUO','percobaan_file_ketiga','2008322',5,2,NULL,'2024-04-26 16:50:41','2024-04-26 16:50:41');

/*!40000 ALTER TABLE `documents` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_reset_tokens_table',1),
	(3,'2019_08_19_000000_create_failed_jobs_table',1),
	(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
	(5,'2024_03_14_055353_create_permission_tables',1),
	(6,'2024_03_25_150702_create_units_table',1),
	(7,'2024_04_21_154344_create_document_types_table',1),
	(8,'2024_04_26_134237_create_documents_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table model_has_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table model_has_roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`)
VALUES
	(1,'App\\Models\\User',1),
	(2,'App\\Models\\User',2),
	(3,'App\\Models\\User',3),
	(3,'App\\Models\\User',6),
	(4,'App\\Models\\User',4),
	(4,'App\\Models\\User',5),
	(4,'App\\Models\\User',7);

/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_reset_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`)
VALUES
	(1,'create user','web','2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(2,'update user','web','2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(3,'delete user','web','2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(4,'read user','web','2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(5,'create unit','web','2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(6,'update unit','web','2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(7,'delete unit','web','2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(8,'read unit','web','2024-04-26 15:40:10','2024-04-26 15:40:10');

/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table personal_access_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table role_has_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`)
VALUES
	(1,1),
	(2,1),
	(3,1),
	(4,1),
	(4,2),
	(4,3),
	(4,4),
	(4,5),
	(4,6),
	(5,1),
	(6,1),
	(7,1),
	(8,1),
	(8,2),
	(8,3),
	(8,4),
	(8,5),
	(8,6);

/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`)
VALUES
	(1,'superadmin','web','2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(2,'direktorat','web','2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(3,'bagian','web','2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(4,'urusan','web','2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(5,'urusan-cosmos','web','2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(6,'urusan-aplikasi','web','2024-04-26 15:40:10','2024-04-26 15:40:10');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table units
# ------------------------------------------------------------

DROP TABLE IF EXISTS `units`;

CREATE TABLE `units` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` bigint(20) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `units` WRITE;
/*!40000 ALTER TABLE `units` DISABLE KEYS */;

INSERT INTO `units` (`id`, `name`, `parent_id`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(1,'Direktorat Pusat Teknologi Informasi',NULL,NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(2,'Bagian Riset dan Layanan TI',1,NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(3,'Urusan Manajemen Mutu',2,NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(4,'Urusan Pengelolaan Konten dan Sumber Daya TI',2,NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(5,'Urusan Pengguna Layanan',2,NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(6,'Urusan Riset TI',2,NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(7,'Bagian Infrastruktur TI',1,NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10'),
	(8,'Urusan Infrastruktur Jaringan TI',7,NULL,'2024-04-26 15:40:10','2024-04-26 15:40:10');

/*!40000 ALTER TABLE `units` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unit_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_unit_id_foreign` (`unit_id`),
  CONSTRAINT `users_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `signature`, `jabatan`, `remember_token`, `deleted_at`, `created_at`, `updated_at`, `unit_id`)
VALUES
	(1,'Super Admin','superadmin','superadmin',NULL,'$2y$12$FHncSkip/r6oYwR1etbL/ej9eHNSMBHYwTj8EVh.mCmhdJOZlJJv2',NULL,NULL,NULL,NULL,'2024-04-26 15:40:11','2024-05-10 14:32:51',NULL),
	(2,'Direktorat Pusat Teknologi Informasi','direktorat-pusat','direktorat@localhost',NULL,'$2y$12$PCeUQpHvGCX3Y1TYGTglqe5L22hIYny2imwp67rSnHSVaQPejc3tS',NULL,NULL,NULL,NULL,'2024-04-26 15:40:11','2024-04-26 15:40:11',NULL),
	(3,'Bagian Riset dan Layanan TI','bagian-riset','bagian@localhost',NULL,'$2y$12$3YxDe0rhgyaKh3ds2SkD/OVHGoA3br3VbDtdpfe5oJP97On0faS1K',NULL,NULL,NULL,NULL,'2024-04-26 15:40:11','2024-04-26 15:40:11',NULL),
	(4,'Urusan Riset dan Layanan TI','urusan-riset','urusan@localhost',NULL,'$2y$12$y6wlYrVBz0PzBi.dM1h3P.rTbv2jVLGdW3Bf5wjw7eO1CoVliKqpW',NULL,NULL,NULL,NULL,'2024-04-26 15:40:12','2024-04-26 15:40:12',1),
	(5,'wildantesting','wildanardian','wildantesting@local',NULL,'$2y$12$xQyKx/4SQj/uM1K.Qupv3OgEeM1cVP8KRNobh6RfDMgcvZJQ1YTuG','$2y$12$KQ4IaiGIcK68H7u.RyE5Zu4MZb/ORHdRV5P.xvRL7qmL1NaH/qijS',NULL,NULL,NULL,'2024-04-26 15:40:46','2024-04-26 15:42:07',3),
	(6,'Wildan','wildanardianalamsyah','wildanalamsyah@local',NULL,'$2y$12$MobYMujSVJzpJJpcPa2KxeAZCYfQFeannD/am2RGWCAlrr8CwAsK2','$2y$12$VudI9NSTuNoxF2OYp9vFRu2cuwJHFKTq0rLodm4GK31QX3dY9wTO2',NULL,NULL,NULL,'2024-04-26 16:51:58','2024-04-26 16:51:58',7),
	(7,'Test','tescoba','testcobaa@local',NULL,'$2y$12$FrPtcKWaci9Lb.Td5E702.fHux3urWYTAiYbOpFBz1MtaR136HSaC','$2y$12$yM3f/PyUZqt08kq.fWa/JOF8MoX0eNdDvuq.RL6MbGUprOV6oBdn2',NULL,NULL,NULL,'2024-04-26 16:53:12','2024-04-26 16:53:12',3);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
