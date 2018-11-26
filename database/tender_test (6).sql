-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Nov 2018 pada 00.56
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tender_test`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_apicustom`
--

CREATE TABLE `cms_apicustom` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `responses` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_apikey`
--

CREATE TABLE `cms_apikey` (
  `id` int(10) UNSIGNED NOT NULL,
  `screetkey` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_dashboard`
--

CREATE TABLE `cms_dashboard` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_email_queues`
--

CREATE TABLE `cms_email_queues` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_email_templates`
--

CREATE TABLE `cms_email_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cms_email_templates`
--

INSERT INTO `cms_email_templates` (`id`, `name`, `slug`, `subject`, `content`, `description`, `from_name`, `from_email`, `cc_email`, `created_at`, `updated_at`) VALUES
(1, 'Email Template Forgot Password Backend', 'forgot_password_backend', NULL, '<p>Hi,</p><p>Someone requested forgot password, here is your new password : </p><p>[password]</p><p><br></p><p>--</p><p>Regards,</p><p>Admin</p>', '[password]', 'System', 'system@crudbooster.com', NULL, '2018-10-17 23:59:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_logs`
--

CREATE TABLE `cms_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ipaddress` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `useragent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `id_cms_users` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cms_logs`
--

INSERT INTO `cms_logs` (`id`, `ipaddress`, `useragent`, `url`, `description`, `details`, `id_cms_users`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/login', 'admin@crudbooster.com login with IP Address 127.0.0.1', '', 1, '2018-10-18 00:06:09', NULL),
(2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/module_generator/delete/12', 'Delete data siswa at Module Generator', '', 1, '2018-10-18 00:38:16', NULL),
(3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/delete/1', 'Delete data siswa at Menu Management', '', 1, '2018-10-18 00:38:28', NULL),
(4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/Siswa/delete/8', 'Delete data Dudi Iskadar at siswa', '', 1, '2018-10-18 01:00:36', NULL),
(5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/login', 'admin@crudbooster.com login with IP Address 127.0.0.1', '', 1, '2018-10-18 05:38:02', NULL),
(6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/users/edit-save/1', 'Update data Super Admin at Users Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>photo</td><td></td><td>uploads/1/2018-10/untitled.png</td></tr><tr><td>password</td><td>$2y$10$QaSjOfYA7lKfvuqidXyxQOZ5EjGLUp3duynbdnwbWmPv4x23tW242</td><td></td></tr><tr><td>status</td><td>Active</td><td></td></tr></tbody></table>', 1, '2018-10-18 05:42:14', NULL),
(7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/logout', 'admin@crudbooster.com logout', '', 1, '2018-10-18 05:42:27', NULL),
(8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/login', 'admin@crudbooster.com login with IP Address 127.0.0.1', '', 1, '2018-10-18 05:42:53', NULL),
(9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/users/edit-save/1', 'Update data Super Admin at Users Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>email</td><td>admin@crudbooster.com</td><td>admin@surveryor.id</td></tr><tr><td>password</td><td>$2y$10$QaSjOfYA7lKfvuqidXyxQOZ5EjGLUp3duynbdnwbWmPv4x23tW242</td><td></td></tr><tr><td>status</td><td>Active</td><td></td></tr></tbody></table>', 1, '2018-10-18 05:48:05', NULL),
(10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/users/add-save', 'Add New Data Team Marketing at Users Management', '', 1, '2018-10-18 05:48:42', NULL),
(11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/users/add-save', 'Add New Data Team Tender at Users Management', '', 1, '2018-10-18 05:49:20', NULL),
(12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/users/add-save', 'Add New Data Verifikator at Users Management', '', 1, '2018-10-18 05:49:50', NULL),
(13, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/logout', 'admin@surveryor.id logout', '', 1, '2018-10-18 05:52:29', NULL),
(14, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/login', 'admin@surveryor.id login with IP Address 127.0.0.1', '', 1, '2018-10-18 05:54:22', NULL),
(15, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/edit-save/4', 'Update data Kategori Pengguna Jasa at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr></tbody></table>', 1, '2018-10-18 06:42:06', NULL),
(16, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/tabel_kategori_pengguna_jasa/add-save', 'Add New Data BUMN at Kategori Pengguna Jasa', '', 1, '2018-10-18 06:45:15', NULL),
(17, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/tabel_pelanggan/add-save', 'Add New Data Jasa Marga at Daftar Pelanggan', '', 1, '2018-10-18 06:52:31', NULL),
(18, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/edit-save/3', 'Update data Daftar Pelanggan at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>sorting</td><td>2</td><td></td></tr></tbody></table>', 1, '2018-10-18 07:19:15', NULL),
(19, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/Siswa/add-save', 'Add New Data Dudi Iskandar at siswa', '', 1, '2018-10-18 07:23:02', NULL),
(20, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/statistic_builder/add-save', 'Add New Data TEst at Statistic Builder', '', 1, '2018-10-18 07:48:47', NULL),
(21, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/logout', 'admin@surveryor.id logout', '', 1, '2018-10-18 07:53:04', NULL),
(22, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/login', 'marketing@surveyor.id login with IP Address 127.0.0.1', '', 2, '2018-10-18 07:53:27', NULL),
(23, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/tabel_pelanggan', 'Try view the data :name at Daftar Pelanggan', '', 2, '2018-10-18 07:53:31', NULL),
(24, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/tabel_kategori_pengguna_jasa', 'Try view the data :name at Kategori Pengguna Jasa', '', 2, '2018-10-18 07:53:36', NULL),
(25, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/logout', 'marketing@surveyor.id logout', '', 2, '2018-10-18 07:53:49', NULL),
(26, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/login', 'admin@surveryor.id login with IP Address 127.0.0.1', '', 1, '2018-10-18 07:54:39', NULL),
(27, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/logout', ' logout', '', NULL, '2018-10-18 18:14:56', NULL),
(28, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/login', 'marketing@surveyor.id login with IP Address 127.0.0.1', '', 2, '2018-10-18 18:15:18', NULL),
(29, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/logout', 'marketing@surveyor.id logout', '', 2, '2018-10-18 18:15:59', NULL),
(30, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/login', 'admin@surveryor.id login with IP Address 127.0.0.1', '', 1, '2018-10-19 00:28:04', NULL),
(31, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/module_generator/delete/15', 'Delete data Kategori Pengguna Jasa at Module Generator', '', 1, '2018-10-19 00:33:04', NULL),
(32, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/module_generator/delete/14', 'Delete data Daftar Pelanggan at Module Generator', '', 1, '2018-10-19 00:36:24', NULL),
(33, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/module_generator/delete/13', 'Delete data Daftar Siswa at Module Generator', '', 1, '2018-10-19 00:36:36', NULL),
(34, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/add-save', 'Add New Data Master Data at Menu Management', '', 1, '2018-10-19 00:52:04', NULL),
(35, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/enumeration/edit-save/18', 'Update data  at Enumeration', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>updated_by</td><td></td><td>1</td></tr></tbody></table>', 1, '2018-10-19 02:00:44', NULL),
(36, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/pelanggan/add-save', 'Add New Data Jasa Marga at Daftar Pelanggan', '', 1, '2018-10-19 02:11:08', NULL),
(37, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/pelanggan/edit-save/1', 'Update data Jasa Marga at Daftar Pelanggan', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>negara</td><td></td><td>Indonesia</td></tr><tr><td>kecamatan</td><td></td><td>Dramaga</td></tr><tr><td>kelurahan</td><td></td><td>Purwasari</td></tr><tr><td>kode_pos</td><td></td><td>16680</td></tr><tr><td>updated_by</td><td></td><td>1</td></tr></tbody></table>', 1, '2018-10-19 02:13:05', NULL),
(38, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/edit-save/5', 'Update data Enumeration at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>parent_id</td><td>6</td><td></td></tr></tbody></table>', 1, '2018-10-19 02:13:47', NULL),
(39, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/edit-save/7', 'Update data Daftar Pelanggan at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>parent_id</td><td>6</td><td></td></tr><tr><td>sorting</td><td>2</td><td></td></tr></tbody></table>', 1, '2018-10-19 02:14:11', NULL),
(40, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/edit-save/8', 'Update data Daftar Tenaga Kerja at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>name</td><td>Tenaga Kerja</td><td>Daftar Tenaga Kerja</td></tr><tr><td>color</td><td></td><td>normal</td></tr><tr><td>parent_id</td><td>6</td><td></td></tr><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2018-10-19 02:41:32', NULL),
(41, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/tenaga_kerja/add-save', 'Add New Data Dudi Iskandar at Daftar Tenaga Kerja', '', 1, '2018-10-19 02:49:23', NULL),
(42, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/logout', 'admin@surveryor.id logout', '', 1, '2018-10-19 02:53:10', NULL),
(43, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/login', 'marketing@surveyor.id login with IP Address 127.0.0.1', '', 2, '2018-10-19 02:53:31', NULL),
(44, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/pelanggan', 'Try view the data :name at Daftar Pelanggan', '', 2, '2018-10-19 02:53:36', NULL),
(45, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/enumeration', 'Try view the data :name at Enumeration', '', 2, '2018-10-19 02:53:41', NULL),
(46, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/logout', 'marketing@surveyor.id logout', '', 2, '2018-10-19 02:53:47', NULL),
(47, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/login', 'admin@surveyor.id login with IP Address 127.0.0.1', '', 1, '2018-10-19 02:54:33', NULL),
(48, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/edit-save/7', 'Update data Daftar Pelanggan at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>parent_id</td><td>6</td><td></td></tr><tr><td>sorting</td><td>2</td><td></td></tr></tbody></table>', 1, '2018-10-19 02:55:52', NULL),
(49, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/login', 'marketing@surveyor.id login with IP Address 127.0.0.1', '', 2, '2018-10-19 15:10:09', NULL),
(50, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/pelanggan', 'Try view the data :name at Daftar Pelanggan', '', 2, '2018-10-19 15:10:16', NULL),
(51, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/enumeration', 'Try view the data :name at Enumeration', '', 2, '2018-10-19 15:10:24', NULL),
(52, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/login', 'admin@surveyor.id login with IP Address 127.0.0.1', '', 1, '2018-10-19 15:10:41', NULL),
(53, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/edit-save/5', 'Update data Enumeration at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>parent_id</td><td>6</td><td></td></tr></tbody></table>', 1, '2018-10-19 15:12:53', NULL),
(54, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/peralatan/add-save', 'Add New Data Kulkas at Daftar Peralatan', '', 1, '2018-10-19 15:34:46', NULL),
(55, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/surat_ijin_usaha/add-save', 'Add New Data  at Surat Ijin Usaha', '', 1, '2018-10-19 15:46:50', NULL),
(56, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/login', 'admin@surveyor.id login with IP Address 127.0.0.1', '', 1, '2018-10-19 19:44:04', NULL),
(57, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/enumeration/add-save', 'Add New Data  at Enumeration', '', 1, '2018-10-19 21:27:07', NULL),
(58, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/pengalaman_perusahaan/add-save', 'Add New Data Dudi Iskandar at Pengalaman perusahaan', '', 1, '2018-10-20 03:15:52', NULL),
(59, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/pengalaman_perusahaan/edit-save/1', 'Update data Dudi Iskandar at Pengalaman perusahaan', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>no_bast</td><td>uploads/</td><td>uploads/uploads/</td></tr><tr><td>updated_by</td><td></td><td></td></tr></tbody></table>', 1, '2018-10-20 03:54:09', NULL),
(60, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/pengalaman_perusahaan/add-save', 'Add New Data Pengerjaan Project Besar at Pengalaman perusahaan', '', 1, '2018-10-20 04:38:17', NULL),
(61, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/enumeration/delete/19', 'Delete data 19 at Enumeration', '', 1, '2018-10-20 04:57:30', NULL),
(62, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/pengalaman_perusahaan/edit-save/1', 'Update data Dudi Iskandar at Pengalaman perusahaan', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>tanggal_bast</td><td>2018-10-27</td><td>2018-10-25</td></tr><tr><td>no_bast</td><td>uploads/uploads/</td><td>uploads/uploads/uploads/</td></tr><tr><td>updated_by</td><td></td><td></td></tr></tbody></table>', 1, '2018-10-20 05:00:24', NULL),
(63, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/pengalaman_perusahaan/delete/1', 'Delete data Dudi Iskandar at Pengalaman perusahaan', '', 1, '2018-10-20 05:16:45', NULL),
(64, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/pengalaman_perusahaan/edit-save/2', 'Update data Pengerjaan Project Besar at Pengalaman perusahaan', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>no_bast</td><td>uploads/</td><td>uploads/uploads/</td></tr><tr><td>updated_by</td><td></td><td></td></tr></tbody></table>', 1, '2018-10-20 05:48:13', NULL),
(65, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/pengalaman_perusahaan/add-save', 'Add New Data Simple Project at Pengalaman perusahaan', '', 1, '2018-10-20 06:59:17', NULL),
(66, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/pengalaman_perusahaan/edit-save/3', 'Update data Simple Project at Pengalaman perusahaan', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>no_bast</td><td>uploads/</td><td>uploads/uploads/</td></tr><tr><td>updated_by</td><td></td><td></td></tr></tbody></table>', 1, '2018-10-20 07:13:57', NULL),
(67, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/login', 'admin@surveyor.id login with IP Address 127.0.0.1', '', 1, '2018-10-21 01:14:07', NULL),
(68, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/logout', 'admin@surveyor.id logout', '', 1, '2018-10-21 01:34:59', NULL),
(69, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/login', 'admin@surveyor.id login with IP Address 127.0.0.1', '', 1, '2018-10-21 01:40:51', NULL),
(70, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/pengalaman_perusahaan/edit-save/2', 'Update data Pengerjaan Project Besar at Pengalaman perusahaan', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>no_bast</td><td>uploads/uploads/</td><td>1237612367123</td></tr><tr><td>updated_by</td><td></td><td></td></tr><tr><td>file_bast</td><td></td><td>uploads/</td></tr></tbody></table>', 1, '2018-10-21 02:05:04', NULL),
(71, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/edit-save/6', 'Update data Master Data at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody></tbody></table>', 1, '2018-10-21 02:17:14', NULL),
(72, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/edit-save/9', 'Update data Daftar Peralatan at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>parent_id</td><td>6</td><td></td></tr><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2018-10-21 02:17:37', NULL),
(73, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/edit-save/8', 'Update data Daftar Tenaga Kerja at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>parent_id</td><td>6</td><td></td></tr><tr><td>sorting</td><td>4</td><td></td></tr></tbody></table>', 1, '2018-10-21 02:17:52', NULL),
(74, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/edit-save/11', 'Update data Syarat Kualifikasi at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>parent_id</td><td>6</td><td></td></tr><tr><td>sorting</td><td>6</td><td></td></tr></tbody></table>', 1, '2018-10-21 02:18:27', NULL),
(75, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/edit-save/12', 'Update data Pengalaman perusahaan at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>parent_id</td><td>6</td><td></td></tr><tr><td>sorting</td><td>7</td><td></td></tr></tbody></table>', 1, '2018-10-21 02:18:41', NULL),
(76, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/logout', 'admin@surveyor.id logout', '', 1, '2018-10-21 02:31:57', NULL),
(77, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/login', 'admin@surveyor.id login with IP Address 127.0.0.1', '', 1, '2018-10-21 02:58:48', NULL),
(78, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/logout', 'admin@surveyor.id logout', '', 1, '2018-10-21 02:59:02', NULL),
(79, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/login', 'marketing@surveyor.id login with IP Address 127.0.0.1', '', 2, '2018-10-21 02:59:20', NULL),
(80, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/logout', 'marketing@surveyor.id logout', '', 2, '2018-10-21 02:59:33', NULL),
(81, '103.119.49.30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 'http://158.69.130.15:8000/admin/login', 'admin@surveyor.id login with IP Address 103.119.49.30', '', 1, '2018-10-21 03:29:47', NULL),
(82, '114.4.82.71', 'Mozilla/5.0 (Linux; Android 8.1.0; ASUS_X00TD) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.64 Mobile Safari/537.36', 'http://158.69.130.15:8000/admin/login', 'admin@surveyor.id login with IP Address 114.4.82.71', '', 1, '2018-10-21 03:40:10', NULL),
(83, '36.70.155.106', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 'http://158.69.130.15:8000/admin/login', 'admin@surveyor.id login with IP Address 36.70.155.106', '', 1, '2018-10-21 19:22:57', NULL),
(84, '36.70.155.106', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 'http://158.69.130.15:8000/admin/logout', 'admin@surveyor.id logout', '', 1, '2018-10-21 19:28:24', NULL),
(85, '36.70.155.106', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 'http://158.69.130.15:8000/admin/login', 'admin@surveyor.id login with IP Address 36.70.155.106', '', 1, '2018-10-21 19:29:18', NULL),
(86, '203.128.68.178', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 'http://158.69.130.15:8000/admin/login', 'admin@surveyor.id login with IP Address 203.128.68.178', '', 1, '2018-10-21 20:27:02', NULL),
(87, '203.128.68.178', 'Mozilla/5.0 (Linux; Android 8.1.0; ASUS_X00TD) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.64 Mobile Safari/537.36', 'http://158.69.130.15:8000/admin/login', 'admin@surveyor.id login with IP Address 203.128.68.178', '', 1, '2018-10-21 20:33:07', NULL),
(88, '203.128.68.178', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 'http://158.69.130.15:8000/admin/pelanggan/add-save', 'Add New Data test at Daftar Pelanggan', '', 1, '2018-10-21 21:07:17', NULL),
(89, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 'http://localhost:8000/admin/login', 'admin@surveyor.id login with IP Address 127.0.0.1', '', 1, '2018-10-21 22:04:40', NULL),
(90, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 'http://localhost:8000/admin/pengalaman_perusahaan/add-save', 'Add New Data asdad at Pengalaman perusahaan', '', 1, '2018-10-22 00:27:54', NULL),
(91, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 'http://localhost:8000/admin/login', 'admin@surveyor.id login with IP Address 127.0.0.1', '', 1, '2018-10-22 06:31:59', NULL),
(92, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 'http://localhost:8000/admin/login', 'admin@surveyor.id login with IP Address 127.0.0.1', '', 1, '2018-10-22 16:48:22', NULL),
(93, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 'http://localhost:8000/admin/login', 'admin@surveyor.id login with IP Address 127.0.0.1', '', 1, '2018-10-23 15:55:12', NULL),
(94, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0', 'http://localhost:8000/admin/login', 'admin@surveyor.id login with IP Address 127.0.0.1', '', 1, '2018-10-30 16:17:47', NULL),
(95, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0', 'http://localhost:8000/admin/tender/add-save', 'Add New Data test at Daftar Tender', '', 1, '2018-10-30 16:40:36', NULL),
(96, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0', 'http://localhost:8000/admin/tender/edit-save/1', 'Update data test at Daftar Tender', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>dokument_tender_file</td><td></td><td>uploads/1/2018-10/eca171e2_7655_496a_9790_457d929e62f4.jpg</td></tr><tr><td>bidbond_file</td><td></td><td>uploads/1/2018-10/eca171e2_7655_496a_9790_457d929e62f4.jpg</td></tr><tr><td>status_dokumen</td><td></td><td></td></tr></tbody></table>', 1, '2018-10-30 16:45:09', NULL),
(97, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/login', 'marketing@surveyor.id login with IP Address 127.0.0.1', '', 2, '2018-11-01 01:08:08', NULL),
(98, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/enumeration', 'Try view the data :name at Enumeration', '', 2, '2018-11-01 01:08:17', NULL),
(99, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/enumeration', 'Try view the data :name at Enumeration', '', 2, '2018-11-01 01:08:18', NULL),
(100, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/enumeration', 'Try view the data :name at Enumeration', '', 2, '2018-11-01 01:08:19', NULL),
(101, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/logout', 'marketing@surveyor.id logout', '', 2, '2018-11-01 01:08:36', NULL),
(102, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/login', 'admin@surveyor.id login with IP Address 127.0.0.1', '', 1, '2018-11-01 01:09:30', NULL),
(103, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/add-save', 'Add New Data Master Syarat Kualifikasi at Menu Management', '', 1, '2018-11-01 02:00:34', NULL),
(104, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/edit-save/14', 'Update data Master Syarat Kualifikasi at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>path</td><td>MasterSyaratKualifikasiController@index</td><td>MasterSyaratKualifikasi@index</td></tr><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2018-11-01 02:02:02', NULL),
(105, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/edit-save/14', 'Update data Master Syarat Kualifikasi at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>path</td><td>MasterSyaratKualifikasi@index</td><td>MasterSyaratKualifikasiController@index</td></tr><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2018-11-01 02:03:29', NULL),
(106, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/edit-save/14', 'Update data Master Syarat Kualifikasi at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>type</td><td>Controller & Method</td><td>Route</td></tr><tr><td>path</td><td>MasterSyaratKualifikasiController@index</td><td>MasterSyaratKualifikasi</td></tr><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2018-11-01 02:07:12', NULL),
(107, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/delete/14', 'Delete data Master Syarat Kualifikasi at Menu Management', '', 1, '2018-11-01 02:08:43', NULL),
(108, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/delete/14', 'Delete data  at Menu Management', '', 1, '2018-11-01 02:08:44', NULL),
(109, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/add-save', 'Add New Data Master Syarat Kualifikasi at Menu Management', '', 1, '2018-11-01 02:14:41', NULL),
(110, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/delete/15', 'Delete data Master Syarat Kualifikasi at Menu Management', '', 1, '2018-11-01 02:22:21', NULL),
(111, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/edit-save/16', 'Update data Master Syarat Kualifikasi at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>type</td><td>Route</td><td>Module</td></tr><tr><td>path</td><td>AdminSiswa24ControllerGetIndex</td><td>siswa24</td></tr><tr><td>color</td><td></td><td>normal</td></tr><tr><td>icon</td><td>fa fa-glass</td><td>fa fa-th</td></tr><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2018-11-01 02:31:59', NULL),
(112, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/edit-save/16', 'Update data Master Syarat Kualifikasi at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>type</td><td>Module</td><td>Route</td></tr><tr><td>path</td><td>AdminMasterSyaratKualifikasi</td><td>AdminMasterSyaratKualifikasiControllerGetIndex</td></tr><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2018-11-01 02:45:02', NULL),
(113, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://localhost:8000/admin/login', 'admin@surveyor.id login with IP Address 127.0.0.1', '', 1, '2018-11-01 05:48:35', NULL),
(114, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 'http://localhost:8000/admin/login', 'admin@surveyor.id login with IP Address 127.0.0.1', '', 1, '2018-11-01 18:00:13', NULL),
(115, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0', 'http://localhost:8000/admin/login', 'admin@surveyor.id login with IP Address 127.0.0.1', '', 1, '2018-11-01 23:46:54', NULL),
(116, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://localhost:8000/admin/login', 'admin@surveyor.id login with IP Address 127.0.0.1', '', 1, '2018-11-02 23:54:57', NULL),
(117, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://localhost:8000/admin/login', 'admin@surveyor.id login with IP Address 127.0.0.1', '', 1, '2018-11-03 23:14:58', NULL),
(118, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://localhost:8000/admin/login', 'admin@surveyor.id login with IP Address 127.0.0.1', '', 1, '2018-11-03 23:15:01', NULL),
(119, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://localhost:8000/admin/module_generator/delete/25', 'Delete data Tender Syarat Kualifikasi at Module Generator', '', 1, '2018-11-03 23:21:53', NULL),
(120, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://localhost:8000/admin/tender/add-save', 'Add New Data asdadas at Daftar Tender', '', 1, '2018-11-04 01:12:15', NULL),
(121, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://localhost:8000/admin/tender/edit-save/2', 'Update data asdadas at Daftar Tender', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>status_dokumen</td><td></td><td></td></tr><tr><td>deleted_at</td><td></td><td></td></tr></tbody></table>', 1, '2018-11-04 01:19:15', NULL),
(122, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://localhost:8000/admin/tender/add-save', 'Add New Data asdadas at Daftar Tender', '', 1, '2018-11-04 01:19:52', NULL),
(123, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://localhost:8000/admin/tender/add-save', 'Add New Data asdadas at Daftar Tender', '', 1, '2018-11-04 01:23:14', NULL),
(124, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://localhost:8000/admin/login', 'admin@surveyor.id login with IP Address 127.0.0.1', '', 1, '2018-11-04 22:29:49', NULL),
(125, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://localhost:8000/admin/tender/add-save', 'Add New Data Web Sekolah at Daftar Tender', '', 1, '2018-11-04 22:35:04', NULL),
(126, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://localhost:8000/admin/tender/add-save', 'Add New Data  at Daftar Tender', '', 1, '2018-11-04 22:37:01', NULL),
(127, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://localhost:8000/admin/tender/delete/6', 'Delete data  at Daftar Tender', '', 1, '2018-11-04 22:42:09', NULL),
(128, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://localhost:8000/admin/tender/edit-save/5', 'Update data Web Sekolah at Daftar Tender', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>status_dokumen</td><td></td><td></td></tr><tr><td>deleted_at</td><td></td><td></td></tr></tbody></table>', 1, '2018-11-04 22:42:25', NULL),
(129, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://localhost:8000/admin/tender/edit-save/5', 'Update data Web Sekolah at Daftar Tender', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>status_dokumen</td><td></td><td></td></tr><tr><td>deleted_at</td><td></td><td></td></tr></tbody></table>', 1, '2018-11-04 22:50:05', NULL),
(130, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://localhost:8000/admin/tender/edit-save/5', 'Update data Web Sekolah at Daftar Tender', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>status_dokumen</td><td></td><td></td></tr><tr><td>deleted_at</td><td></td><td></td></tr></tbody></table>', 1, '2018-11-04 23:27:50', NULL),
(131, '140.213.33.83', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/login', 'admin@surveyor.id login with IP Address 140.213.33.83', '', 1, '2018-11-05 02:26:39', NULL),
(132, '203.128.68.178', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/tender/add-save', 'Add New Data testing at Daftar Tender', '', 1, '2018-11-05 02:48:47', NULL),
(133, '114.5.145.60', 'Mozilla/5.0 (Linux; Android 8.1.0; ASUS_X00TD) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.80 Mobile Safari/537.36', 'http://119.235.252.13:8000/admin/login', 'admin@surveyor.id login with IP Address 114.5.145.60', '', 1, '2018-11-05 14:18:43', NULL),
(134, '140.213.8.224', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/login', 'admin@surveyor.id login with IP Address 140.213.8.224', '', 1, '2018-11-05 20:06:47', NULL),
(135, '203.128.68.178', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/login', 'admin@surveyor.id login with IP Address 203.128.68.178', '', 1, '2018-11-05 20:13:56', NULL),
(136, '140.213.8.224', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/login', 'admin@surveyor.id login with IP Address 140.213.8.224', '', 1, '2018-11-05 20:16:36', NULL),
(137, '203.128.68.178', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/tender/add-save', 'Add New Data testing at Daftar Tender', '', 1, '2018-11-05 20:50:34', NULL),
(138, '140.213.8.224', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/login', 'admin@surveyor.id login with IP Address 140.213.8.224', '', 1, '2018-11-05 20:59:00', NULL),
(139, '203.128.68.178', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/login', 'admin@surveyor.id login with IP Address 203.128.68.178', '', 1, '2018-11-05 21:11:54', NULL),
(140, '140.213.8.224', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0', 'http://119.235.252.13:8000/admin/login', 'admin@surveyor.id login with IP Address 140.213.8.224', '', 1, '2018-11-05 21:15:23', NULL),
(141, '203.128.68.178', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/login', 'admin@surveyor.id login with IP Address 203.128.68.178', '', 1, '2018-11-05 21:16:01', NULL),
(142, '203.128.68.178', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0', 'http://119.235.252.13:8000/admin/login', 'admin@surveyor.id login with IP Address 203.128.68.178', '', 1, '2018-11-05 21:18:45', NULL),
(143, '203.128.68.178', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0', 'http://119.235.252.13:8000/admin/login', 'admin@surveyor.id login with IP Address 203.128.68.178', '', 1, '2018-11-05 21:20:56', NULL),
(144, '140.213.47.192', 'Mozilla/5.0 (Linux; Android 8.0.0; SM-A320Y Build/R16NW) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.126 Mobile Safari/537.36', 'http://119.235.252.13:8000/admin/login', 'admin@surveyor.id login with IP Address 140.213.47.192', '', 1, '2018-11-05 22:50:38', NULL),
(145, '64.233.173.140', 'Mozilla/5.0 (Linux; Android 8.0.0; SM-A320Y Build/R16NW) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.126 Mobile Safari/537.36', 'http://119.235.252.13:8000/admin/logout', 'admin@surveyor.id logout', '', 1, '2018-11-05 22:55:44', NULL),
(146, '139.255.60.147', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/login', 'admin@surveyor.id login with IP Address 139.255.60.147', '', 1, '2018-11-05 23:30:28', NULL),
(147, '139.255.60.147', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/pelanggan/delete/10', 'Delete data Jasa Marga at Daftar Pelanggan', '', 1, '2018-11-05 23:32:29', NULL),
(148, '139.255.60.147', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/pelanggan/edit-save/32', 'Update data Jasa Marga at Daftar Pelanggan', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>email</td><td>dudyiskandar325@gmail.com</td><td>dudiskandar325@gmail.com</td></tr><tr><td>alamat</td><td></td><td>Plaza Tol Taman Mini Indonesia Indah Jakarta, 13550 Indonesia</td></tr><tr><td>updated_by</td><td></td><td>1</td></tr></tbody></table>', 1, '2018-11-05 23:35:03', NULL),
(149, '139.255.60.147', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/pelanggan/edit-save/31', 'Update data Jasa Marga at Daftar Pelanggan', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>email</td><td>dudyiskandar325@gmail.com</td><td>iskandar325@gmail.com</td></tr><tr><td>alamat</td><td></td><td>Jln. Teuku Umar, Sepanjang Jaya, Rawa Lumbu Bekasi 17114</td></tr><tr><td>updated_by</td><td></td><td>1</td></tr></tbody></table>', 1, '2018-11-05 23:36:08', NULL),
(150, '139.255.60.147', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/pelanggan/add-save', 'Add New Data PT. PLN (Persero) Pusat Enjiniring Ketenaga Listrikan at Daftar Pelanggan', '', 1, '2018-11-05 23:53:21', NULL),
(151, '139.255.60.147', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/pelanggan/add-save', 'Add New Data PT Perikanan Nusantara (Persero) at Daftar Pelanggan', '', 1, '2018-11-05 23:54:23', NULL),
(152, '139.255.60.147', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/pelanggan/add-save', 'Add New Data sarana maju lestari at Daftar Pelanggan', '', 1, '2018-11-05 23:55:34', NULL);
INSERT INTO `cms_logs` (`id`, `ipaddress`, `useragent`, `url`, `description`, `details`, `id_cms_users`, `created_at`, `updated_at`) VALUES
(153, '139.255.60.147', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/peralatan/add-save', 'Add New Data MESIN TIK at Daftar Peralatan', '', 1, '2018-11-05 23:56:46', NULL),
(154, '139.255.60.147', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/peralatan/delete-image', 'Delete the image of MESIN TIK at Daftar Peralatan', '', 1, '2018-11-06 00:29:19', NULL),
(155, '139.255.60.147', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/peralatan/delete/1', 'Delete data Kulkas at Daftar Peralatan', '', 1, '2018-11-06 00:30:58', NULL),
(156, '139.255.60.147', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/tenaga_kerja/edit-save/1', 'Update data Dudi Iskandar at Daftar Tenaga Kerja', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>updated_by</td><td></td><td>1</td></tr></tbody></table>', 1, '2018-11-06 00:46:23', NULL),
(157, '139.255.60.147', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/logout', 'admin@surveyor.id logout', '', 1, '2018-11-06 04:32:01', NULL),
(158, '139.255.60.147', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/login', 'admin@surveyor.id login with IP Address 139.255.60.147', '', 1, '2018-11-06 04:32:23', NULL),
(159, '158.140.181.177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/login', 'admin@surveyor.id login with IP Address 158.140.181.177', '', 1, '2018-11-06 18:54:49', NULL),
(160, '158.140.181.177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/logout', 'admin@surveyor.id logout', '', 1, '2018-11-06 19:36:10', NULL),
(161, '158.140.181.177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/login', 'admin@surveyor.id login with IP Address 158.140.181.177', '', 1, '2018-11-06 19:39:14', NULL),
(162, '203.128.68.178', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/login', 'admin@surveyor.id login with IP Address 203.128.68.178', '', 1, '2018-11-06 20:18:58', NULL),
(163, '139.255.60.147', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/login', 'admin@surveyor.id login with IP Address 139.255.60.147', '', 1, '2018-11-06 21:39:44', NULL),
(164, '158.140.181.177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/login', 'admin@surveyor.id login with IP Address 158.140.181.177', '', 1, '2018-11-06 23:01:41', NULL),
(165, '158.140.181.177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/logout', 'admin@surveyor.id logout', '', 1, '2018-11-06 23:31:52', NULL),
(166, '158.140.181.177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/login', 'admin@surveyor.id login with IP Address 158.140.181.177', '', 1, '2018-11-07 01:43:20', NULL),
(167, '140.213.0.243', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/login', 'admin@surveyor.id login with IP Address 140.213.0.243', '', 1, '2018-11-07 17:27:57', NULL),
(168, '140.213.0.243', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/daftar_uraian_tugas/add-save', 'Add New Data PM at Daftar Uraian Tugas', '', 1, '2018-11-07 17:34:07', NULL),
(169, '140.213.0.243', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/kepemilikan_saham/add-save', 'Add New Data Elithe at Kepemilikan Saham', '', 1, '2018-11-07 17:55:33', NULL),
(170, '140.213.0.243', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/pengurus_badan_usaha/add-save', 'Add New Data Elithe at Pengurus Badan Usaha', '', 1, '2018-11-07 17:56:30', NULL),
(171, '140.213.0.243', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0', 'http://119.235.252.13:8000/admin/login', 'admin@surveyor.id login with IP Address 140.213.0.243', '', 1, '2018-11-07 18:14:01', NULL),
(172, '140.213.0.243', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://119.235.252.13:8000/admin/pengalaman_uraian_kerja/add-save', 'Add New Data Helo World at Pengalaman Uraian Kerja', '', 1, '2018-11-07 18:45:23', NULL),
(173, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://localhost:8000/admin/login', 'admin@surveyor.id login with IP Address 127.0.0.1', '', 1, '2018-11-10 18:50:34', NULL),
(174, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://localhost:8000/admin/tender/edit-save/1', 'Update data testing at Daftar Tender', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>status_dokumen</td><td></td><td></td></tr><tr><td>deleted_at</td><td></td><td></td></tr></tbody></table>', 1, '2018-11-10 19:41:55', NULL),
(175, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://localhost:8000/admin/tender/edit-save/1', 'Update data testing at Daftar Tender', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>status_dokumen</td><td></td><td></td></tr><tr><td>deleted_at</td><td></td><td></td></tr></tbody></table>', 1, '2018-11-10 19:48:10', NULL),
(176, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', 'http://localhost:8000/admin/login', 'admin@surveyor.id login with IP Address 127.0.0.1', '', 1, '2018-11-10 22:50:05', NULL),
(177, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36', 'http://localhost:8000/admin/login', 'admin@surveyor.id login with IP Address 127.0.0.1', '', 1, '2018-11-17 17:36:36', NULL),
(178, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36', 'http://localhost:8000/admin/login', 'admin@surveyor.id login with IP Address 127.0.0.1', '', 1, '2018-11-18 09:23:42', NULL),
(179, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36', 'http://localhost:8000/admin/logout', 'admin@surveyor.id logout', '', 1, '2018-11-18 11:28:24', NULL),
(180, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36', 'http://localhost:8000/admin/login', 'tender@surveyor.id login with IP Address 127.0.0.1', '', 3, '2018-11-18 11:29:09', NULL),
(181, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36', 'http://localhost:8000/admin/login', 'verivikator@surveyor.id login with IP Address 127.0.0.1', '', 4, '2018-11-18 11:31:06', NULL),
(182, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0', 'http://localhost:8000/admin/login', 'admin@surveyor.id login with IP Address 127.0.0.1', '', 1, '2018-11-18 11:36:16', NULL),
(183, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0', 'http://localhost:8000/admin/menu_management/edit-save/11', 'Update data Syarat Kualifikasi at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>parent_id</td><td>6</td><td></td></tr><tr><td>sorting</td><td>6</td><td></td></tr></tbody></table>', 1, '2018-11-18 11:37:18', NULL),
(184, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0', 'http://localhost:8000/admin/menu_management/edit-save/6', 'Update data Master Data at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody></tbody></table>', 1, '2018-11-18 11:39:59', NULL),
(185, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36', 'http://localhost:8000/admin/enumeration', 'Try view the data :name at Enumeration', '', 4, '2018-11-18 11:40:25', NULL),
(186, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36', 'http://localhost:8000/admin/tender/edit/1', 'Try edit the data testing at Daftar Tender', '', 4, '2018-11-18 12:39:32', NULL),
(187, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0', 'http://localhost:8000/admin/menu_management/edit-save/21', 'Update data Dashboard at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>parent_id</td><td>0</td><td></td></tr><tr><td>is_dashboard</td><td>0</td><td>1</td></tr><tr><td>sorting</td><td>4</td><td></td></tr></tbody></table>', 1, '2018-11-18 15:55:37', NULL),
(188, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0', 'http://localhost:8000/admin/menu_management/edit-save/21', 'Update data Dashboard at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>path</td><td>AdminDashboard1ControllerGetIndex</td><td>AdminDashboardControllerGetIndex</td></tr><tr><td>parent_id</td><td>0</td><td></td></tr><tr><td>sorting</td><td>4</td><td></td></tr></tbody></table>', 1, '2018-11-18 15:57:08', NULL),
(189, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36', 'http://localhost:8000/admin/login', 'tender@surveyor.id login with IP Address 127.0.0.1', '', 3, '2018-11-18 16:26:20', NULL),
(190, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36', 'http://localhost:8000/admin/enumeration', 'Try view the data :name at Enumeration', '', 3, '2018-11-18 16:26:37', NULL),
(191, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36', 'http://localhost:8000/admin/tender/edit/1', 'Try edit the data testing at Daftar Tender', '', 3, '2018-11-18 16:29:34', NULL),
(192, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36', 'http://localhost:8000/admin/enumeration', 'Try view the data :name at Enumeration', '', 4, '2018-11-18 16:36:32', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_menus`
--

CREATE TABLE `cms_menus` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cms_menus`
--

INSERT INTO `cms_menus` (`id`, `name`, `type`, `path`, `color`, `icon`, `parent_id`, `is_active`, `is_dashboard`, `id_cms_privileges`, `sorting`, `created_at`, `updated_at`) VALUES
(5, 'Enumeration', 'Route', 'AdminEnumerationControllerGetIndex', 'normal', 'fa fa-bars', 6, 1, 0, 1, 1, '2018-10-19 00:49:20', '2018-10-19 15:12:52'),
(6, 'Master Data', 'Module', 'enumeration', 'normal', 'fa fa-th-large', 0, 1, 0, 1, 1, '2018-10-19 00:52:04', '2018-11-18 11:39:59'),
(7, 'Daftar Pelanggan', 'Route', 'AdminPelangganControllerGetIndex', 'normal', 'fa fa-users', 6, 1, 0, 1, 2, '2018-10-19 01:04:07', '2018-10-19 02:55:51'),
(8, 'Daftar Tenaga Kerja', 'Route', 'AdminTenagaKerjaControllerGetIndex', 'normal', 'fa fa-user', 6, 1, 0, 1, 4, '2018-10-19 02:18:42', '2018-10-21 02:17:52'),
(9, 'Daftar Peralatan', 'Route', 'AdminPeralatanControllerGetIndex', 'normal', 'fa fa-cog', 6, 1, 0, 1, 3, '2018-10-19 15:22:59', '2018-10-21 02:17:37'),
(10, 'Surat Ijin Usaha', 'Route', 'AdminSuratIjinUsahaControllerGetIndex', NULL, 'fa fa-file-text-o', 6, 1, 0, 1, 5, '2018-10-19 15:43:32', NULL),
(11, 'Syarat Kualifikasi', 'Route', 'AdminSyaratKualifikasiControllerGetIndex', 'normal', 'fa fa-file-text-o', 6, 1, 0, 1, 6, '2018-10-19 15:51:48', '2018-11-18 11:37:18'),
(12, 'Pengalaman perusahaan', 'Route', 'AdminPengalamanPerusahaanControllerGetIndex', 'normal', 'fa fa-fax', 6, 1, 0, 1, 7, '2018-10-19 16:02:45', '2018-10-21 02:18:40'),
(13, 'Daftar Tender', 'Route', 'AdminTenderControllerGetIndex', NULL, 'fa fa-calendar', 0, 1, 0, 1, 3, '2018-10-30 16:20:12', NULL),
(16, 'Master Syarat Kualifikasi', 'Route', 'AdminMasterSyaratKualifikasiControllerGetIndex', 'normal', 'fa fa-th', 0, 1, 0, 1, 2, '2018-11-01 02:28:17', '2018-11-01 02:45:02'),
(17, 'Daftar Uraian Tugas', 'Route', 'AdminDaftarUraianTugasControllerGetIndex', NULL, 'fa fa-th-list', 6, 1, 0, 1, 8, '2018-11-06 18:59:40', NULL),
(18, 'Pengurus Badan Usaha', 'Route', 'AdminPengurusBadanUsahaControllerGetIndex', NULL, 'fa fa-users', 6, 1, 0, 1, 10, '2018-11-07 17:45:35', NULL),
(19, 'Kepemilikan Saham', 'Route', 'AdminKepemilikanSahamControllerGetIndex', NULL, 'fa fa-file-text-o', 6, 1, 0, 1, 9, '2018-11-07 17:49:22', NULL),
(20, 'Pengalaman Uraian Kerja', 'Route', 'AdminPengalamanUraianKerjaControllerGetIndex', NULL, 'fa fa-user', 6, 1, 0, 1, 11, '2018-11-07 18:32:20', NULL),
(21, 'Dashboard', 'Route', 'AdminDashboardControllerGetIndex', 'normal', 'fa fa-dashboard', 0, 1, 1, 1, 4, '2018-11-18 15:54:34', '2018-11-18 15:57:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_menus_privileges`
--

CREATE TABLE `cms_menus_privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_menus` int(11) DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cms_menus_privileges`
--

INSERT INTO `cms_menus_privileges` (`id`, `id_cms_menus`, `id_cms_privileges`) VALUES
(1, 1, 1),
(2, 2, 1),
(5, 4, 1),
(6, 4, 2),
(7, 3, 1),
(8, 3, 2),
(19, 7, 1),
(20, 7, 2),
(21, 5, 1),
(23, 10, 1),
(29, 9, 1),
(30, 9, 3),
(31, 8, 1),
(32, 8, 3),
(35, 12, 1),
(36, 12, 3),
(37, 13, 1),
(41, 14, 1),
(42, 15, 1),
(45, 16, 1),
(46, 17, 1),
(47, 17, 1),
(48, 18, 1),
(49, 19, 1),
(50, 20, 1),
(51, 11, 1),
(52, 11, 3),
(53, 11, 4),
(54, 6, 1),
(55, 6, 2),
(56, 6, 3),
(57, 6, 4),
(60, 21, 1),
(61, 21, 2),
(62, 21, 3),
(63, 21, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_moduls`
--

CREATE TABLE `cms_moduls` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_protected` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cms_moduls`
--

INSERT INTO `cms_moduls` (`id`, `name`, `icon`, `path`, `table_name`, `controller`, `is_protected`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Notifications', 'fa fa-cog', 'notifications', 'cms_notifications', 'NotificationsController', 1, 1, '2018-10-17 23:59:16', NULL, NULL),
(2, 'Privileges', 'fa fa-cog', 'privileges', 'cms_privileges', 'PrivilegesController', 1, 1, '2018-10-17 23:59:16', NULL, NULL),
(3, 'Privileges Roles', 'fa fa-cog', 'privileges_roles', 'cms_privileges_roles', 'PrivilegesRolesController', 1, 1, '2018-10-17 23:59:16', NULL, NULL),
(4, 'Users Management', 'fa fa-users', 'users', 'cms_users', 'AdminCmsUsersController', 0, 1, '2018-10-17 23:59:16', NULL, NULL),
(5, 'Settings', 'fa fa-cog', 'settings', 'cms_settings', 'SettingsController', 1, 1, '2018-10-17 23:59:16', NULL, NULL),
(6, 'Module Generator', 'fa fa-database', 'module_generator', 'cms_moduls', 'ModulsController', 1, 1, '2018-10-17 23:59:16', NULL, NULL),
(7, 'Menu Management', 'fa fa-bars', 'menu_management', 'cms_menus', 'MenusController', 1, 1, '2018-10-17 23:59:16', NULL, NULL),
(8, 'Email Templates', 'fa fa-envelope-o', 'email_templates', 'cms_email_templates', 'EmailTemplatesController', 1, 1, '2018-10-17 23:59:16', NULL, NULL),
(9, 'Statistic Builder', 'fa fa-dashboard', 'statistic_builder', 'cms_statistics', 'StatisticBuilderController', 1, 1, '2018-10-17 23:59:16', NULL, NULL),
(10, 'API Generator', 'fa fa-cloud-download', 'api_generator', '', 'ApiCustomController', 1, 1, '2018-10-17 23:59:16', NULL, NULL),
(11, 'Log User Access', 'fa fa-flag-o', 'logs', 'cms_logs', 'LogsController', 1, 1, '2018-10-17 23:59:16', NULL, NULL),
(12, 'siswa', 'fa fa-users', 'siswa', 'siswa', 'AdminSiswaController', 0, 0, '2018-10-18 00:06:43', NULL, '2018-10-18 00:38:17'),
(13, 'Daftar Siswa', 'fa fa-users', 'Siswa', 'siswa', 'AdminSiswaController', 0, 0, '2018-10-18 00:39:42', NULL, '2018-10-19 00:36:36'),
(14, 'Daftar Pelanggan', 'fa fa-users', 'tabel_pelanggan', 'tabel_pelanggan', 'AdminTabelPelangganController', 0, 0, '2018-10-18 06:21:11', NULL, '2018-10-19 00:36:24'),
(15, 'Kategori Pengguna Jasa', 'fa fa-glass', 'tabel_kategori_pengguna_jasa', 'tabel_kategori_pengguna_jasa', 'AdminKategoriPenggunaJasaController', 0, 0, '2018-10-18 06:32:33', NULL, '2018-10-19 00:33:04'),
(16, 'Enumeration', 'fa fa-bars', 'enumeration', 'enumeration', 'AdminEnumerationController', 0, 0, '2018-10-19 00:49:19', NULL, NULL),
(17, 'Daftar Pelanggan', 'fa fa-users', 'pelanggan', 'pelanggan', 'AdminPelangganController', 0, 0, '2018-10-19 01:04:06', NULL, NULL),
(18, 'Daftar Tenaga Kerja', 'fa fa-user', 'tenaga_kerja', 'tenaga_kerja', 'AdminTenagaKerjaController', 0, 0, '2018-10-19 02:18:42', NULL, NULL),
(19, 'Daftar Peralatan', 'fa fa-cog', 'peralatan', 'peralatan', 'AdminPeralatanController', 0, 0, '2018-10-19 15:22:58', NULL, NULL),
(20, 'Surat Ijin Usaha', 'fa fa-file-text-o', 'surat_ijin_usaha', 'surat_ijin_usaha', 'AdminSuratIjinUsahaController', 0, 0, '2018-10-19 15:43:32', NULL, NULL),
(21, 'Syarat Kualifikasi', 'fa fa-file-text-o', 'syarat_kualifikasi', 'tender', 'AdminSyaratKualifikasiController', 0, 0, '2018-10-19 15:51:47', NULL, NULL),
(22, 'Pengalaman perusahaan', 'fa fa-fax', 'pengalaman_perusahaan', 'pengalaman_perusahaan', 'AdminPengalamanPerusahaanController', 0, 0, '2018-10-19 16:02:44', NULL, NULL),
(23, 'Daftar Tender', 'fa fa-calendar', 'tender', 'tender', 'AdminTenderController', 0, 0, '2018-10-30 16:20:11', NULL, NULL),
(24, 'Master Syarat Kualifikasi', 'fa fa-cube', 'AdminMasterSyaratKualifikasi', 'siswa', 'AdminMasterSyaratKualifikasiController', 0, 0, '2018-11-01 02:28:16', NULL, NULL),
(25, 'Tender Syarat Kualifikasi', 'fa fa-glass', 'tender_syarat_kualifikasi', 'tender_syarat_kualifikasi', 'AdminTenderSyaratKualifikasiController', 0, 0, '2018-11-03 23:17:47', NULL, '2018-11-03 23:21:53'),
(26, 'Daftar Uraian Tugas', 'fa fa-th-list', 'daftar_uraian_tugas', 'daftar_uraian_tugas', 'AdminDaftarUraianTugasController', 0, 0, '2018-11-06 18:59:34', NULL, NULL),
(27, 'Pengurus Badan Usaha', 'fa fa-users', 'pengurus_badan_usaha', 'pengurus_badan_usaha', 'AdminPengurusBadanUsahaController', 0, 0, '2018-11-07 17:45:34', NULL, NULL),
(28, 'Kepemilikan Saham', 'fa fa-file-text-o', 'kepemilikan_saham', 'kepemilikan_saham', 'AdminKepemilikanSahamController', 0, 0, '2018-11-07 17:49:22', NULL, NULL),
(29, 'Pengalaman Uraian Kerja', 'fa fa-user', 'pengalaman_uraian_kerja', 'pengalaman_uraian_kerja', 'AdminPengalamanUraianKerjaController', 0, 0, '2018-11-07 18:32:20', NULL, NULL),
(30, 'Dashboard', 'fa fa-dashboard', 'dashboard', 'siswa', 'AdminDashboardController', 0, 0, '2018-11-18 15:54:33', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_notifications`
--

CREATE TABLE `cms_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_users` int(11) DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cms_notifications`
--

INSERT INTO `cms_notifications` (`id`, `id_cms_users`, `content`, `url`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 1, 'test test', '/admin/module_generator', 1, '2018-10-16 20:14:00', NULL),
(2, 1, 'Hellow World', 'http://localhost:8000/admin/tender/edit/1', 1, '2018-11-18 12:38:00', NULL),
(3, 2, 'Hellow World', 'http://localhost:8000/admin/tender/edit/1', 0, '2018-11-18 12:38:01', NULL),
(4, 3, 'Hellow World', 'http://localhost:8000/admin/tender/edit/1', 1, '2018-11-18 12:38:01', NULL),
(5, 4, 'Hellow World', 'http://localhost:8000/admin/tender/edit/1', 1, '2018-11-18 12:38:01', NULL),
(6, 5, 'Hellow World', 'http://localhost:8000/admin/tender/edit/1', 0, '2018-11-18 12:38:01', NULL),
(7, 3, 'Kelengkapan Syarat Kualifikasi (testing)', 'http://localhost:8000/admin/syarat_kualifikasi/edit/1', 1, '2018-11-18 13:02:03', NULL),
(8, 3, 'Kelengkapan Syarat Kualifikasi (testing)', 'http://localhost:8000/admin/syarat_kualifikasi/edit/1', 1, '2018-11-18 13:02:47', NULL),
(9, 3, 'Kelengkapan Syarat Kualifikasi (testing)', 'http://localhost:8000/admin/syarat_kualifikasi/edit/1', 1, '2018-11-18 13:05:05', NULL),
(10, 3, 'Kelengkapan Syarat Kualifikasi (testing)', 'http://localhost:8000/admin/syarat_kualifikasi/edit/1', 1, '2018-11-18 13:05:36', NULL),
(11, 3, 'Kelengkapan Syarat Kualifikasi (testing)', 'http://localhost:8000/admin/syarat_kualifikasi/edit/1', 1, '2018-11-18 13:08:50', NULL),
(12, 4, 'Kelengkapan Syarat Kualifikasi (testing)', 'http://localhost:8000/admin/syarat_kualifikasi/edit/1', 1, '2018-11-18 13:09:09', NULL),
(13, 4, 'Kelengkapan Syarat Kualifikasi (testing)', 'http://localhost:8000/admin/syarat_kualifikasi/edit/1', 1, '2018-11-18 13:09:11', NULL),
(14, 3, 'Dokumen belum lengkap  / salah dan masih butuh perbaikan', 'http://localhost:8000/admin/syarat_kualifikasi/edit/1', 1, '2018-11-18 16:37:57', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_privileges`
--

CREATE TABLE `cms_privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_superadmin` tinyint(1) DEFAULT NULL,
  `theme_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cms_privileges`
--

INSERT INTO `cms_privileges` (`id`, `name`, `is_superadmin`, `theme_color`, `created_at`, `updated_at`) VALUES
(1, 'Super Administrator', 1, 'skin-blue', '2018-10-17 23:59:16', NULL),
(2, 'Team Marketing', 0, 'skin-blue', NULL, NULL),
(3, 'Team Tender', 0, 'skin-red', NULL, NULL),
(4, 'Verifikator', 0, 'skin-red', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_privileges_roles`
--

CREATE TABLE `cms_privileges_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `is_visible` tinyint(1) DEFAULT NULL,
  `is_create` tinyint(1) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `is_edit` tinyint(1) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `id_cms_moduls` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cms_privileges_roles`
--

INSERT INTO `cms_privileges_roles` (`id`, `is_visible`, `is_create`, `is_read`, `is_edit`, `is_delete`, `id_cms_privileges`, `id_cms_moduls`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, 13, NULL, NULL),
(2, 1, 1, 1, 1, 1, 1, 4, NULL, NULL),
(6, 1, 1, 1, 1, 1, 1, 14, NULL, NULL),
(7, 1, 1, 1, 1, 1, 1, 15, NULL, NULL),
(11, 1, 1, 1, 1, 1, 1, 16, NULL, NULL),
(12, 1, 1, 1, 1, 1, 1, 17, NULL, NULL),
(13, 1, 1, 1, 1, 1, 1, 18, NULL, NULL),
(15, 1, 1, 1, 1, 1, 1, 19, NULL, NULL),
(16, 1, 1, 1, 1, 1, 1, 20, NULL, NULL),
(17, 1, 1, 1, 1, 1, 1, 21, NULL, NULL),
(18, 1, 1, 1, 1, 1, 1, 22, NULL, NULL),
(20, 1, 1, 1, 1, 1, 3, 19, NULL, NULL),
(21, 1, 1, 1, 1, 1, 3, 18, NULL, NULL),
(22, 1, 1, 1, 1, 1, 3, 22, NULL, NULL),
(23, 1, 1, 1, 1, 1, 3, 21, NULL, NULL),
(24, 1, 1, 1, 1, 1, 2, 17, NULL, NULL),
(25, 1, 1, 1, 1, 1, 4, 21, NULL, NULL),
(26, 1, 1, 1, 1, 1, 1, 23, NULL, NULL),
(27, 1, 1, 1, 1, 1, 1, 24, NULL, NULL),
(28, 1, 1, 1, 1, 1, 1, 25, NULL, NULL),
(29, 1, 1, 1, 1, 1, 1, 26, NULL, NULL),
(30, 1, 1, 1, 1, 1, 1, 27, NULL, NULL),
(31, 1, 1, 1, 1, 1, 1, 28, NULL, NULL),
(32, 1, 1, 1, 1, 1, 1, 29, NULL, NULL),
(33, 1, 1, 1, 1, 1, 1, 30, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_settings`
--

CREATE TABLE `cms_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `content_input_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dataenum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `helper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_setting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cms_settings`
--

INSERT INTO `cms_settings` (`id`, `name`, `content`, `content_input_type`, `dataenum`, `helper`, `created_at`, `updated_at`, `group_setting`, `label`) VALUES
(1, 'login_background_color', NULL, 'text', NULL, 'Input hexacode', '2018-10-17 23:59:16', NULL, 'Login Register Style', 'Login Background Color'),
(2, 'login_font_color', NULL, 'text', NULL, 'Input hexacode', '2018-10-17 23:59:16', NULL, 'Login Register Style', 'Login Font Color'),
(3, 'login_background_image', NULL, 'upload_image', NULL, NULL, '2018-10-17 23:59:16', NULL, 'Login Register Style', 'Login Background Image'),
(4, 'email_sender', 'support@crudbooster.com', 'text', NULL, NULL, '2018-10-17 23:59:16', NULL, 'Email Setting', 'Email Sender'),
(5, 'smtp_driver', 'mail', 'select', 'smtp,mail,sendmail', NULL, '2018-10-17 23:59:16', NULL, 'Email Setting', 'Mail Driver'),
(6, 'smtp_host', '', 'text', NULL, NULL, '2018-10-17 23:59:16', NULL, 'Email Setting', 'SMTP Host'),
(7, 'smtp_port', '25', 'text', NULL, 'default 25', '2018-10-17 23:59:16', NULL, 'Email Setting', 'SMTP Port'),
(8, 'smtp_username', '', 'text', NULL, NULL, '2018-10-17 23:59:16', NULL, 'Email Setting', 'SMTP Username'),
(9, 'smtp_password', '', 'text', NULL, NULL, '2018-10-17 23:59:16', NULL, 'Email Setting', 'SMTP Password'),
(10, 'appname', 'Surveyor Indonesia', 'text', NULL, NULL, '2018-10-17 23:59:16', NULL, 'Application Setting', 'Application Name'),
(11, 'default_paper_size', 'Legal', 'text', NULL, 'Paper size, ex : A4, Legal, etc', '2018-10-17 23:59:16', NULL, 'Application Setting', 'Default Paper Print Size'),
(12, 'logo', 'uploads/2018-10/ab789d7048ef0214e8e2dff475d64371.png', 'upload_image', NULL, NULL, '2018-10-17 23:59:16', NULL, 'Application Setting', 'Logo'),
(13, 'favicon', NULL, 'upload_image', NULL, NULL, '2018-10-17 23:59:16', NULL, 'Application Setting', 'Favicon'),
(14, 'api_debug_mode', 'true', 'select', 'true,false', NULL, '2018-10-17 23:59:16', NULL, 'Application Setting', 'API Debug Mode'),
(15, 'google_api_key', NULL, 'text', NULL, NULL, '2018-10-17 23:59:16', NULL, 'Application Setting', 'Google API Key'),
(16, 'google_fcm_key', NULL, 'text', NULL, NULL, '2018-10-17 23:59:16', NULL, 'Application Setting', 'Google FCM Key');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_statistics`
--

CREATE TABLE `cms_statistics` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cms_statistics`
--

INSERT INTO `cms_statistics` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'TEst', 'test', '2018-10-18 07:48:47', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_statistic_components`
--

CREATE TABLE `cms_statistic_components` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_statistics` int(11) DEFAULT NULL,
  `componentID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `component_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_name` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `config` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cms_statistic_components`
--

INSERT INTO `cms_statistic_components` (`id`, `id_cms_statistics`, `componentID`, `component_name`, `area_name`, `sorting`, `name`, `config`, `created_at`, `updated_at`) VALUES
(1, 1, 'd9239ad1e327bc5f04ab4e1126b110b1', 'smallbox', 'area1', 0, 'Untitled', NULL, '2018-10-18 07:49:31', NULL),
(2, 1, '7df62032a751fda4153608942aeeab44', 'chartarea', 'area2', 0, NULL, '{\"name\":\"Testing\",\"sql\":\"Test;\",\"area_name\":\"Test\",\"goals\":\"10\"}', '2018-10-18 07:49:36', NULL),
(3, 1, '22e099bc5f28bbf5a46f6492fba8ad68', 'chartline', 'area3', 0, 'Untitled', NULL, '2018-10-18 07:49:41', NULL),
(4, 1, 'a7fa3a693fda10dbd35422333e483497', 'chartbar', 'area4', 0, 'Untitled', NULL, '2018-10-18 07:49:46', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_users`
--

CREATE TABLE `cms_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cms_users`
--

INSERT INTO `cms_users` (`id`, `name`, `photo`, `email`, `password`, `id_cms_privileges`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Super Admin', 'uploads/1/2018-10/untitled.png', 'admin@surveyor.id', '$2y$10$QaSjOfYA7lKfvuqidXyxQOZ5EjGLUp3duynbdnwbWmPv4x23tW242', 1, '2018-10-17 23:59:15', '2018-10-18 05:48:05', 'Active'),
(2, 'Team Marketing', 'uploads/1/2018-10/untitled.png', 'marketing@surveyor.id', '$2y$10$99jS.6zAsv5YHAUbEdE.2uYGVkCP/M1jpP7NOhYNbJ/fwTEtcRKMK', 2, '2018-10-18 05:48:42', NULL, NULL),
(3, 'Team Tender', 'uploads/1/2018-10/untitled.png', 'tender@surveyor.id', '$2y$10$JtF201QEHxg2Yn6wvP4bJuP7U5SUYIRHTVkmyNFK41DxuuqZdrUMC', 3, '2018-10-18 05:49:20', NULL, NULL),
(4, 'Verifikator', 'uploads/1/2018-10/untitled.png', 'verivikator@surveyor.id', '$2y$10$2JvX8jZ9pVlgB.nBTO.Iw.7d.3eeoxPki8Vj5.j8MQK9LL00tua1a', 4, '2018-10-18 05:49:50', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_uraian_tugas`
--

CREATE TABLE `daftar_uraian_tugas` (
  `id` int(11) NOT NULL,
  `nama_posisi` varchar(100) NOT NULL,
  `nama_proyek` varchar(100) NOT NULL,
  `uraian_tugas` text NOT NULL,
  `waktu_pelaksanaan` date NOT NULL,
  `created_by` int(12) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(12) UNSIGNED DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftar_uraian_tugas`
--

INSERT INTO `daftar_uraian_tugas` (`id`, `nama_posisi`, `nama_proyek`, `uraian_tugas`, `waktu_pelaksanaan`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'PM', 'TEsting', 'Analisis', '2018-11-16', 1, '2018-11-08 00:34:07', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `enumeration`
--

CREATE TABLE `enumeration` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `enumeration`
--

INSERT INTO `enumeration` (`id`, `key`, `value`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(2, 'KategoriPenggunaJasa', 'BUMN', 1, NULL, NULL, NULL),
(3, 'KategoriPenggunaJasa', 'Kementrian', 1, NULL, NULL, NULL),
(4, 'KategoriPenggunaJasa', 'Swasta', 1, NULL, NULL, NULL),
(5, 'Teknik', 'Manajemen', 1, NULL, NULL, NULL),
(6, 'Teknik', 'Manajemen Informatika', 1, NULL, NULL, NULL),
(7, 'Teknik', 'Pemasaran', 1, NULL, NULL, NULL),
(8, 'Teknik', 'Sistem Komputer', 1, NULL, NULL, NULL),
(9, 'Teknik', 'Sistem Perkapalan', 1, NULL, NULL, NULL),
(10, 'Teknik', 'Teknik', 1, NULL, NULL, NULL),
(12, 'Strata', 'D3', 1, NULL, NULL, NULL),
(15, 'Strata', 'S1', 1, NULL, NULL, NULL),
(16, 'Strata', 'S2', 1, NULL, NULL, NULL),
(17, 'KondisiPeralatan', 'Baik', 1, NULL, NULL, NULL),
(18, 'KondisiPeralatan', 'Tidak Baik', 1, NULL, '2018-10-19 02:00:44', 1),
(20, 'MetodeKualifikasi', 'Pra Qualifikasi', 1, NULL, NULL, NULL),
(21, 'MetodeKualifikasi', 'Pasca Qualifikasi', 1, NULL, NULL, NULL),
(22, 'MetodeDokumen', 'Satu File', 1, NULL, NULL, NULL),
(23, 'MetodeDokumen', 'Dua File', 1, NULL, NULL, NULL),
(24, 'MetodeEvaluasi', 'Sistem Nilai', 1, NULL, NULL, NULL),
(25, 'MetodeEvaluasi', 'Harga Penawaran', 1, NULL, NULL, NULL),
(26, 'TypeField', 'Text', 1, '2018-11-13 17:00:00', NULL, NULL),
(27, 'TypeField', 'Numeric', 1, '2018-11-13 17:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepemilikan_saham`
--

CREATE TABLE `kepemilikan_saham` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_ktp` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `saham_presentase` varchar(255) NOT NULL,
  `created_by` int(12) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(12) UNSIGNED DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kepemilikan_saham`
--

INSERT INTO `kepemilikan_saham` (`id`, `nama`, `no_ktp`, `alamat`, `saham_presentase`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Elithe', '2342342342', 'fsdfsdfsdfsdf', '34', 1, '2018-11-08 00:55:33', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_syarat_kualifikasi`
--

CREATE TABLE `master_syarat_kualifikasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(250) NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `is_dokumen` tinyint(1) NOT NULL DEFAULT '0',
  `is_leaf` tinyint(1) DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_syarat_kualifikasi`
--

INSERT INTO `master_syarat_kualifikasi` (`id`, `nama`, `parent_id`, `is_dokumen`, `is_leaf`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'AKTA', NULL, 0, 0, NULL, '2018-11-06 03:37:13', '2018-11-06 03:38:09'),
(3, 'Akta Pendirian Perusahaan / Anggaran Dasar Koperasi', 2, 1, 1, NULL, '2018-11-06 03:38:09', '2018-11-06 07:07:37'),
(4, 'Akta perubahan Anggaran dasar Terakhir', 2, 1, 1, NULL, '2018-11-06 03:38:24', '2018-11-06 03:38:24'),
(5, 'Akta Perubahan Komisaris Terakhir', 2, 1, 1, NULL, '2018-11-06 03:38:39', '2018-11-06 03:38:39'),
(6, 'Akta Perubahan Direksi Terakhir', 2, 1, 1, NULL, '2018-11-06 03:38:53', '2018-11-06 03:38:53'),
(7, 'Surat Ijin Usaha', NULL, 0, 0, NULL, '2018-11-06 03:39:18', '2018-11-06 03:39:28'),
(8, 'SITUP', 7, 1, 1, NULL, '2018-11-06 03:39:28', '2018-11-06 03:39:28'),
(9, 'Tanda Daftar Perusahaan', 7, 1, 1, NULL, '2018-11-06 03:39:43', '2018-11-06 03:39:43'),
(10, 'Surat Keterangan Domisilli perusahaan', 7, 1, 1, NULL, '2018-11-06 03:39:54', '2018-11-06 03:39:54'),
(11, 'Surat Izin usaha Jasa Survey', 7, 1, 1, NULL, '2018-11-06 03:40:07', '2018-11-06 03:40:07'),
(12, 'SIUJK', 7, 1, 1, NULL, '2018-11-06 03:40:40', '2018-11-06 03:40:40'),
(13, 'IUJK KONSULTANSI KONTRUKSI', 7, 1, 1, NULL, '2018-11-06 03:41:55', '2018-11-06 03:42:14'),
(14, 'IUJK PENGAWAS KONTRUKSI', 7, 1, 1, NULL, '2018-11-06 03:42:32', '2018-11-06 03:42:32'),
(15, 'IUJK PERENCANAAN KONTRUKSI', 7, 1, 1, NULL, '2018-11-06 03:42:42', '2018-11-06 03:42:42'),
(16, 'Sertifikat Ijin Usaha dan Sertifikat Lainnya', NULL, 0, 0, NULL, '2018-11-06 03:43:57', '2018-11-06 03:44:13'),
(17, 'SMK3', 16, 1, 1, NULL, '2018-11-06 03:44:11', '2018-11-06 03:44:11'),
(18, 'LPJK-Perencana Rekayasa', 16, 1, 1, NULL, '2018-11-06 03:44:38', '2018-11-06 03:44:38'),
(19, 'LPJK - Pengawasan Rekayasa', 16, 1, 1, NULL, '2018-11-06 03:44:49', '2018-11-06 03:45:30'),
(20, 'LPJK Konsultansi Spesialis', 16, 1, 1, NULL, '2018-11-06 03:45:00', '2018-11-06 03:45:00'),
(21, 'LPJK Konsultanai Lainnya', 16, 1, 1, NULL, '2018-11-06 03:45:12', '2018-11-06 03:45:12'),
(22, 'LPJK Perencanaan Penataan Ruang', 19, 1, 1, '2018-11-06 03:45:30', '2018-11-06 03:45:23', '2018-11-06 03:45:30'),
(23, 'LPJK Perencanaan Penataan Ruang', 16, 1, 1, NULL, '2018-11-06 03:46:01', '2018-11-06 03:46:01'),
(24, 'SBU Inkindo Bidang Jasa Khusus', 16, 1, 1, NULL, '2018-11-06 03:46:13', '2018-11-06 03:46:13'),
(25, 'SBU Inkindo Bidang Jasa konsultansi Mana', 16, 1, 1, NULL, '2018-11-06 03:46:24', '2018-11-06 03:46:24'),
(26, 'SBU Inkindo Bidang Jasa Studi Penelitian', 16, 1, 1, NULL, '2018-11-06 03:46:35', '2018-11-06 03:46:35'),
(27, 'SBU Inkindo Bidang Jasa Survey', 16, 1, 1, NULL, '2018-11-06 03:46:45', '2018-11-06 03:46:45'),
(28, 'SBU Inkindo Bidang Keuangan', 16, 1, 1, NULL, '2018-11-06 03:46:53', '2018-11-06 03:46:53'),
(29, 'SBU Inkindo Bidang Pengembangan Pertania', 16, 1, 1, NULL, '2018-11-06 03:47:03', '2018-11-06 03:47:03'),
(30, 'SBU Inkindo Bidang Perindustrian', 16, 1, 1, NULL, '2018-11-06 03:47:13', '2018-11-06 03:47:13'),
(31, 'SBU Inkindo Bidang Pertambangan dan Ener', 16, 1, 1, NULL, '2018-11-06 03:47:24', '2018-11-06 03:47:24'),
(32, 'SBU Inkindo Bidang Telematika', 16, 1, 1, NULL, '2018-11-06 03:47:32', '2018-11-06 03:47:32'),
(33, 'SBU Inkindo Bidang Transportasi', 16, 1, 1, NULL, '2018-11-06 03:47:45', '2018-11-06 03:47:45'),
(34, 'ISO 9001:2015', 16, 1, 1, NULL, '2018-11-06 03:48:01', '2018-11-06 03:48:01'),
(35, 'Susunan Kepemilikan Saham', NULL, 0, 0, NULL, '2018-11-06 03:48:46', '2018-11-06 03:50:06'),
(36, 'Daftar Pemilik', 35, 1, 1, NULL, '2018-11-06 03:50:06', '2018-11-07 06:33:04'),
(37, 'Copy KTP/Scan KTP', 35, 1, 1, NULL, '2018-11-06 03:50:40', '2018-11-06 03:50:40'),
(38, 'Copy NPWP /Scan NPWP', 35, 1, 1, NULL, '2018-11-06 03:50:55', '2018-11-06 03:50:55'),
(39, 'Pengurus Badan Usaha', NULL, 0, 0, NULL, '2018-11-06 03:52:00', '2018-11-06 03:53:04'),
(40, 'Daftar Komisaris', 39, 1, 1, NULL, '2018-11-06 03:53:04', '2018-11-07 06:35:18'),
(41, 'Daftar Direksi', 39, 1, 1, NULL, '2018-11-06 03:53:48', '2018-11-07 06:35:29'),
(42, 'Copy KTP/Scan KTP', 39, 1, 1, NULL, '2018-11-06 03:54:10', '2018-11-06 03:54:10'),
(43, 'Kualifikasi Tenaga', NULL, 0, 1, '2018-11-06 06:00:10', '2018-11-06 03:54:39', '2018-11-06 06:00:10'),
(44, 'Kualifikasi Tenaga Ahli', NULL, 0, 1, NULL, '2018-11-06 03:57:27', '2018-11-06 06:00:03'),
(45, 'Kategori Peralatan', NULL, 0, 1, NULL, '2018-11-06 03:59:53', '2018-11-06 03:59:53'),
(46, 'Pengalaman Perusahaan', NULL, 1, 0, NULL, '2018-11-06 04:29:03', '2018-11-07 06:46:38'),
(47, 'Pajak', NULL, 0, 0, NULL, '2018-11-06 06:01:04', '2018-11-06 06:01:56'),
(48, 'Bukti laporan Pajak Terakhir', NULL, 1, 1, '2018-11-06 06:01:45', '2018-11-06 06:01:38', '2018-11-06 06:01:45'),
(49, 'Bukti laporan Pajak Terakhir', 47, 1, 1, NULL, '2018-11-06 06:01:56', '2018-11-06 06:01:56'),
(50, 'Bukti Laporan 3 Bulanan Terakhir', 47, 1, 1, NULL, '2018-11-06 06:02:13', '2018-11-06 06:02:23'),
(51, 'PPH Pasal 21', 47, 1, 1, NULL, '2018-11-06 06:03:16', '2018-11-06 06:03:16'),
(52, 'PPH Pasal 23', 47, 1, 1, NULL, '2018-11-06 06:03:44', '2018-11-06 06:03:44'),
(53, 'PPH Pasal 25/29', 47, 1, 1, NULL, '2018-11-06 06:04:06', '2018-11-06 06:04:06'),
(54, 'PPN', 47, 1, 1, NULL, '2018-11-06 06:04:21', '2018-11-06 06:04:21'),
(55, 'Surat Keterangan Fiskal', 47, 0, 1, NULL, '2018-11-06 06:04:41', '2018-11-06 06:04:41'),
(56, 'Dokumen Penawaran', NULL, 0, 0, NULL, '2018-11-06 06:05:32', '2018-11-06 06:06:09'),
(57, 'Dokumen Penawaran Administrasi dan Teknis', 56, 1, 1, NULL, '2018-11-06 06:06:09', '2018-11-06 06:06:09'),
(58, 'Dokumen Penawaran Harga', 56, 1, 1, NULL, '2018-11-06 06:06:29', '2018-11-06 06:06:29'),
(59, 'Syarat Lainnya', 56, 0, 1, '2018-11-06 06:21:34', '2018-11-06 06:07:11', '2018-11-06 06:21:34'),
(60, 'Syarat Lainnya', NULL, 0, 1, NULL, '2018-11-06 06:22:05', '2018-11-06 06:22:05'),
(61, 'qqq', 3, 0, 1, '2018-11-06 07:07:37', '2018-11-06 07:07:20', '2018-11-06 07:07:37'),
(62, 'Bidang / Sub Bidang', 46, 1, 1, NULL, '2018-11-07 06:46:38', '2018-11-07 06:46:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_syarat_kualifikasi_detail`
--

CREATE TABLE `master_syarat_kualifikasi_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `master_syarat_kualifikasi_id` int(10) UNSIGNED NOT NULL,
  `field_name` varchar(100) DEFAULT NULL,
  `field_type` int(11) DEFAULT NULL,
  `sequence` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_syarat_kualifikasi_detail`
--

INSERT INTO `master_syarat_kualifikasi_detail` (`id`, `master_syarat_kualifikasi_id`, `field_name`, `field_type`, `sequence`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 36, 'Nama', 26, 1, '2018-11-05 20:50:06', '2018-11-05 20:50:06', NULL),
(2, 36, 'No KTP', 26, 2, '2018-11-05 20:50:06', '2018-11-05 20:50:06', NULL),
(3, 36, 'Alamat', 26, 3, '2018-11-05 20:50:06', '2018-11-05 20:50:06', NULL),
(4, 36, 'Saham Persentase / Lembar', 26, 4, '2018-11-05 20:50:06', '2018-11-05 20:50:06', NULL),
(5, 40, 'Nama', 26, 1, '2018-11-05 20:53:04', '2018-11-05 20:53:04', NULL),
(6, 40, 'No KTP', 26, 2, '2018-11-05 20:53:04', '2018-11-05 20:53:04', NULL),
(7, 40, 'Jabatan dalam Badan Usaha', 26, 3, '2018-11-05 20:53:04', '2018-11-05 20:53:04', NULL),
(8, 41, 'Nama', 26, 1, '2018-11-05 20:53:48', '2018-11-05 20:53:48', NULL),
(9, 41, 'No KTP', 26, 2, '2018-11-05 20:53:48', '2018-11-05 20:53:48', NULL),
(10, 41, 'Jabatan dalam Badan Usaha', 26, 3, '2018-11-05 20:53:48', '2018-11-05 20:53:48', NULL),
(11, 43, 'Jabatan / Posisi', 26, 1, '2018-11-05 20:55:37', '2018-11-05 20:55:37', NULL),
(12, 44, 'Pengalaman', 26, 2, '2018-11-05 20:57:27', '2018-11-05 23:00:03', NULL),
(13, 44, 'Jumlah', 26, 3, '2018-11-05 20:57:27', '2018-11-05 23:00:03', NULL),
(14, 44, 'Pendidikan/Jurusan', 26, 4, '2018-11-05 20:57:27', '2018-11-05 23:00:03', NULL),
(15, 44, 'Profesi/Keahlian', 26, 5, '2018-11-05 20:57:27', '2018-11-05 23:00:03', NULL),
(16, 44, 'Sertifikat', 26, 6, '2018-11-05 20:57:28', '2018-11-05 23:00:03', NULL),
(17, 44, 'Catatan Lain', 26, 7, '2018-11-05 20:57:28', '2018-11-05 23:00:03', NULL),
(18, 45, 'Nama Peralatan', 26, 1, '2018-11-05 20:59:53', '2018-11-05 20:59:53', NULL),
(19, 45, 'Jumlah', 26, 2, '2018-11-05 20:59:53', '2018-11-05 20:59:53', NULL),
(20, 45, 'Kapasitas', 26, 3, '2018-11-05 20:59:53', '2018-11-05 20:59:53', NULL),
(21, 45, 'Merek', 26, 4, '2018-11-05 20:59:53', '2018-11-05 20:59:53', NULL),
(22, 46, 'Syarat Pengalaman Pekerjaan', 26, 1, '2018-11-05 21:29:03', '2018-11-05 21:29:03', NULL),
(23, 46, 'Bidang / Sub Bidang', 26, 2, '2018-11-05 21:29:03', '2018-11-05 21:29:03', NULL),
(24, 46, 'Ringkasan Lingkup', 26, 3, '2018-11-05 21:29:03', '2018-11-05 21:29:03', NULL),
(25, 46, 'Syarat Lama Pekerjaan', 26, 4, '2018-11-05 21:29:03', '2018-11-05 21:29:03', NULL),
(26, 44, 'Jabatan / Posisi', 26, 1, '2018-11-05 23:00:03', '2018-11-05 23:00:03', NULL),
(27, 59, 'Syarat', 26, 1, '2018-11-05 23:07:11', '2018-11-05 23:07:11', NULL),
(28, 60, 'Syarat', 26, 1, '2018-11-05 23:22:05', '2018-11-05 23:22:05', NULL),
(29, 61, 'sdsdsd', 26, 1, '2018-11-06 00:07:20', '2018-11-06 00:07:20', NULL),
(30, 61, 'sss', 26, 1, '2018-11-06 00:07:20', '2018-11-06 00:07:20', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_10_14_025842_create_cms_apicustom_table', 1),
(2, '2018_10_14_025842_create_cms_apikey_table', 1),
(3, '2018_10_14_025842_create_cms_dashboard_table', 1),
(4, '2018_10_14_025842_create_cms_email_queues_table', 1),
(5, '2018_10_14_025842_create_cms_email_templates_table', 1),
(6, '2018_10_14_025842_create_cms_logs_table', 1),
(7, '2018_10_14_025842_create_cms_menus_privileges_table', 1),
(8, '2018_10_14_025842_create_cms_menus_table', 1),
(9, '2018_10_14_025842_create_cms_moduls_table', 1),
(10, '2018_10_14_025842_create_cms_notifications_table', 1),
(11, '2018_10_14_025842_create_cms_privileges_roles_table', 1),
(12, '2018_10_14_025842_create_cms_privileges_table', 1),
(13, '2018_10_14_025842_create_cms_settings_table', 1),
(14, '2018_10_14_025842_create_cms_statistic_components_table', 1),
(15, '2018_10_14_025842_create_cms_statistics_table', 1),
(16, '2018_10_14_025842_create_cms_users_table', 1),
(17, '2018_10_14_025842_create_siswa_table', 1),
(18, '2018_10_14_025843_add_foreign_keys_to_siswa_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_pengguna_jasa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_pengguna_jasa_id` int(10) UNSIGNED DEFAULT NULL,
  `divisi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp_cp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama_pengguna_jasa`, `kategori_pengguna_jasa_id`, `divisi`, `email`, `no_telp`, `contact_person`, `no_telp_cp`, `alamat`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 'Jasa Marga', 2, 'Pemerintah', 'dudyiskandar325@gmail.com', '12310', 'QWERTY', '1231', 'Jauh Pake Helm', 1, '2018-10-19 02:11:08', '2018-10-19 02:13:04', 1),
(2, 'test', 3, 'ok', 'ariespratama96@gmail.com', '1287', 'asdjk', '2831923', 'ok', 1, '2018-10-21 21:07:17', NULL, NULL),
(9, 'test', 2, 'ok', 'ariespratama96@gmail.co2', '1287', 'asdjk', '2831923', NULL, 1, '2018-10-21 22:17:09', NULL, NULL),
(24, 'test', 2, 'ok', 'ariespratama96@gmail.com', '1287', 'asdjk', '2831923', NULL, 1, '2018-10-22 01:00:27', NULL, NULL),
(25, 'Jasa Marga', 2, 'Pemerintah', 'dudyiskandar325@gmail.com', '12310', 'QWERTY', '1231', NULL, 1, '2018-10-22 01:00:30', NULL, NULL),
(26, 'test', 2, 'ok', 'ariespratama96@gmail.com', '1287', 'asdjk', '2831923', NULL, 1, '2018-10-22 01:09:35', NULL, NULL),
(27, 'Jasa Marga', 2, 'Pemerintah', 'dudyiskandar325@gmail.com', '12310', 'QWERTY', '1231', NULL, 1, '2018-10-22 01:09:37', NULL, NULL),
(28, 'test', 2, 'ok', 'ariespratama96@gmail.com', '1287', 'asdjk', '2831923', NULL, 1, '2018-10-22 01:11:04', NULL, NULL),
(29, 'Jasa Marga', 2, 'Pemerintah', 'dudyiskandar325@gmail.com', '12310', 'QWERTY', '1231', NULL, 1, '2018-10-22 01:11:05', NULL, NULL),
(30, 'test', 2, 'ok', 'ariespratama96@gmail.com', '1287', 'asdjk', '2831923', NULL, 1, '2018-10-22 01:13:57', NULL, NULL),
(31, 'Jasa Marga', 2, 'Pemerintah', 'iskandar325@gmail.com', '12310', 'QWERTY', '1231', 'Jln. Teuku Umar, Sepanjang Jaya, Rawa Lumbu Bekasi 17114', 1, '2018-10-22 01:14:00', '2018-11-05 23:36:03', 1),
(32, 'Jasa Marga', 2, 'Pemerintah', 'dudiskandar325@gmail.com', '12310', 'QWERTY', '1231', 'Plaza Tol Taman Mini Indonesia Indah Jakarta, 13550 Indonesia', 1, '2018-10-22 17:10:32', '2018-11-05 23:35:03', 1),
(33, 'PT. PLN (Persero) Pusat Enjiniring Ketenaga Listrikan', 2, 'Gas & Fuel', 'contact@pln-enjiniring.com', '0211234567', 'Pak Listrik', '08151777888', 'Jl. KS Tubun I No.2, RT.3/RW.2, Kota Bambu Sel., Palmerah, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11420', 1, '2018-11-05 23:53:21', NULL, NULL),
(34, 'PT Perikanan Nusantara (Persero)', 4, 'Dok dan Bengkel', 'eproc@perinus.co.id', '02187654321', 'ikan kembung', '0812345678', 'Jln. K.H. Hasyim Asyhari No. 17 A, Jakarta Pusat Indonesia', 1, '2018-11-05 23:54:23', NULL, NULL),
(35, 'sarana maju lestari', 4, 'IT', 'smltech@co.id', '021888555', 'andi ruswandi', '08189101112', 'Jl. mampang prapatan 26', 1, '2018-11-05 23:55:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengalaman_perusahaan`
--

CREATE TABLE `pengalaman_perusahaan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_paket_perusahaan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bidang` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi_proyek` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pengguna_jasa` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_id` int(10) UNSIGNED DEFAULT NULL,
  `alamat_pengguna_jasa` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp_pengguna_jasa` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `periode_kerja_dari` date DEFAULT NULL,
  `periode_kerja_sampai` date DEFAULT NULL,
  `no_kontrak` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_kontrak` int(10) UNSIGNED DEFAULT NULL,
  `tanggal_selesai_kontrak` date DEFAULT NULL,
  `tanggal_bast` date DEFAULT NULL,
  `tahun` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_bast` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `file_bast` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengalaman_perusahaan`
--

INSERT INTO `pengalaman_perusahaan` (`id`, `nama_paket_perusahaan`, `bidang`, `lokasi_proyek`, `nama_pengguna_jasa`, `kategori_id`, `alamat_pengguna_jasa`, `no_telp_pengguna_jasa`, `periode_kerja_dari`, `periode_kerja_sampai`, `no_kontrak`, `nilai_kontrak`, `tanggal_selesai_kontrak`, `tanggal_bast`, `tahun`, `no_bast`, `created_by`, `created_at`, `updated_at`, `updated_by`, `file_bast`) VALUES
(2, 'Pengerjaan Project Besar', 'Informatika', 'Bogor', 'Dudi', 3, 'Long Distance', '085774216703', '2018-10-01', '2018-10-25', '010818001', 12000000, '2018-10-30', '2018-10-30', '2018', '1237612367123', 1, '2018-10-20 04:38:17', '2018-10-21 02:05:04', NULL, 'uploads/'),
(3, 'Simple Project', 'Sistem Informasi', 'New York', 'Foo Bar', 4, 'Sedney', '01611123', '2018-11-01', '2018-12-01', '010918012', 20000000, '2018-12-02', '2018-12-04', '2018', 'uploads/uploads/', 1, '2018-10-20 06:59:17', '2018-10-20 07:13:57', NULL, NULL),
(4, 'asdad', '213131', '12313', '1231321', 2, '12313', '123131', '2018-10-30', '2018-10-29', '12321312', 123131, '2018-10-29', '2018-10-29', '2015', '21312', 1, '2018-10-22 00:27:54', NULL, NULL, 'uploads/1/PengalamanPerusahaan/test/Report__-_22_Oct_2018__1_.xls');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengalaman_uraian_kerja`
--

CREATE TABLE `pengalaman_uraian_kerja` (
  `id` int(11) NOT NULL,
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
  `pengguna_jasa_id` int(11) UNSIGNED DEFAULT NULL,
  `status_kepegawaian` varchar(100) NOT NULL,
  `surat_referensi` varchar(100) NOT NULL,
  `waktu_pelaksanaan` date NOT NULL,
  `created_by` int(12) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(12) UNSIGNED DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengalaman_uraian_kerja`
--

INSERT INTO `pengalaman_uraian_kerja` (`id`, `nama_pekerjaan`, `nama_perusahaan`, `ttl`, `pendidikan_formal`, `pendidikan_non_formal`, `penguasaan_bahasa`, `posisi_yang_diusulkan`, `tahun`, `nama_proyek`, `lokasi_proyek`, `pengguna_jasa_id`, `status_kepegawaian`, `surat_referensi`, `waktu_pelaksanaan`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Helo World', 'Testing', '2018-11-08', 'S1', 'qwe', 'Baik', 'Analisis', '2018', 'qwe', 'qwe', 3, 'qwe', 'qwe', '2018-11-28', 1, '2018-11-08 01:45:23', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengurus_badan_usaha`
--

CREATE TABLE `pengurus_badan_usaha` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_ktp` varchar(100) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `created_by` int(12) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(12) UNSIGNED DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengurus_badan_usaha`
--

INSERT INTO `pengurus_badan_usaha` (`id`, `nama`, `no_ktp`, `jabatan`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Elithe', '2342342342', 'System Analisis', 1, '2018-11-08 00:56:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peralatan`
--

CREATE TABLE `peralatan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `merek` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_pembuatan` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` int(10) UNSIGNED DEFAULT NULL,
  `kapasitas` int(10) UNSIGNED DEFAULT NULL,
  `kondisi_id` int(10) UNSIGNED DEFAULT NULL,
  `lokasi` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peralatan`
--

INSERT INTO `peralatan` (`id`, `nama`, `merek`, `tahun_pembuatan`, `jumlah`, `kapasitas`, `kondisi_id`, `lokasi`, `bukti`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(2, 'MESIN TIK', 'Tata Hamburg', '2000', 10, 15, 17, 'jakarta', NULL, 1, '2018-11-05 23:56:46', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `alamat`, `image`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dudi Iskandar', 'bogor', 'uploads/1/2018-10/f147e140_33cd_4770_827f_d336c0108411_1.jpg', 1, NULL, '2018-10-13 18:21:39', '2018-10-13 18:22:21'),
(7, 'kiw', 'bogor', 'uploads/1/2018-10/f147e140_33cd_4770_827f_d336c0108411_1.jpg', 1, NULL, '2018-10-13 18:21:39', NULL),
(8, 'rizqi', 'asda', 'uploads/1/2018-10/f147e140_33cd_4770_827f_d336c0108411_1.jpg', 3, NULL, NULL, NULL),
(9, 'Dudi Iskandar', 'Jauh Pake Helm', 'uploads/1/2018-10/2.jpg', 1, '2018-10-18 07:23:02', NULL, NULL),
(10, 'sdada', 'asda', 'uploads/1/2018-10/26230462_338836063260327_1700062373891403441_n.jpg', 1, '2018-10-16 16:41:38', NULL, NULL),
(14, '', 'test', '', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_ijin_usaha`
--

CREATE TABLE `surat_ijin_usaha` (
  `id` int(10) UNSIGNED NOT NULL,
  `ijin_usaha` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_ijin_usaha` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_terbit` date DEFAULT NULL,
  `berlaku_sampai` date DEFAULT NULL,
  `instansi_pemberi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_ijin_usaha` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kualifikasi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `surat_ijin_usaha`
--

INSERT INTO `surat_ijin_usaha` (`id`, `ijin_usaha`, `no_ijin_usaha`, `tanggal_terbit`, `berlaku_sampai`, `instansi_pemberi`, `jenis_ijin_usaha`, `kualifikasi`, `keterangan`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 'Dagang', '20112312', '2018-10-25', '2018-12-08', 'Instusi', 'Dagang', 'Lulus', 'Hello World', 1, '2018-10-19 15:46:50', NULL, NULL),
(2, 'LPJK-Perencana Rekayasa', '323271', '1900-01-20', '1900-01-20', 'LPJK', 'RE102\nRE103\nRE106', 'Perusahaan Non Kecil', NULL, 1, '2018-11-06 00:55:02', NULL, NULL),
(3, 'LPJK - Pengawasan Rekayasa', '435902', '1900-01-21', '1900-01-20', 'LPJK', NULL, 'Perusahaan Non Kecil', NULL, 1, '2018-11-06 00:55:02', NULL, NULL),
(4, 'LPJK Konsultansi Spesialis', '547258', '1900-01-22', '1900-01-20', 'LPJK', NULL, 'Perusahaan Non Kecil', NULL, 1, '2018-11-06 00:55:02', NULL, NULL),
(5, 'LPJK Konsultanai Lainnya', '547257', '1900-01-23', '1900-01-20', 'LPJK', NULL, 'Perusahaan Non Kecil', NULL, 1, '2018-11-06 00:55:02', NULL, NULL),
(6, 'LPJK Perencanaan Penataan Ruang', '323270', '1900-01-24', '1900-01-20', 'LPJK', NULL, 'Perusahaan Non Kecil', NULL, 1, '2018-11-06 00:55:02', NULL, NULL),
(7, 'SBU Inkindo Bidang Jasa Khusus', '1.SC-20203-17-0041', '1900-01-25', '1900-01-04', 'INKINDO', NULL, 'Perusahaan Non Kecil', NULL, 1, '2018-11-06 00:55:02', NULL, NULL),
(8, 'SBU Inkindo Bidang Jasa konsultansi Mana', '1.MS-20203-17-0041', '1900-01-26', '1900-01-17', 'INKINDO', NULL, 'Perusahaan Non Kecil', NULL, 1, '2018-11-06 00:55:02', NULL, NULL),
(9, 'SBU Inkindo Bidang Jasa Studi Penelitian', '1.SI-20203-17-0041', NULL, '1900-01-04', 'INKINDO', NULL, 'Perusahaan Non Kecil', NULL, 1, '2018-11-06 00:55:02', NULL, NULL),
(10, 'SBU Inkindo Bidang Jasa Survey', '1.SS-20203-17-0041', NULL, '1900-01-04', 'INKINDO', NULL, 'Perusahaan Non Kecil', NULL, 1, '2018-11-06 00:55:02', NULL, NULL),
(11, 'SBU Inkindo Bidang Keuangan', '1.07-20203-17-0041', NULL, '1900-01-04', 'INKINDO', NULL, 'Perusahaan Non Kecil', NULL, 1, '2018-11-06 00:55:02', NULL, NULL),
(12, 'SBU Inkindo Bidang Pengembangan Pertania', '1.01.20203-17-0041', NULL, '1900-01-04', 'INKINDO', NULL, 'Perusahaan Non Kecil', NULL, 1, '2018-11-06 00:55:02', NULL, NULL),
(13, 'SBU Inkindo Bidang Perindustrian', '1.05-20203-17-0041', NULL, '1900-01-04', 'INKINDO', NULL, 'Perusahaan Non Kecil', NULL, 1, '2018-11-06 00:55:02', NULL, NULL),
(14, 'SBU Inkindo Bidang Pertambangan dan Ener', '1.06-20203-17-0041', NULL, '1900-01-04', 'INKINDO', NULL, 'Perusahaan Non Kecil', NULL, 1, '2018-11-06 00:55:02', NULL, NULL),
(15, 'SBU Inkindo Bidang Telematika', '1.03-20203-17-0041', NULL, '1900-01-04', 'INKINDO', NULL, 'Perusahaan Non Kecil', NULL, 1, '2018-11-06 00:55:02', NULL, NULL),
(16, 'SBU Inkindo Bidang Transportasi', '1.02-20203-17-0041', NULL, '1900-01-04', 'INKINDO', NULL, 'Perusahaan Non Kecil', NULL, 1, '2018-11-06 00:55:02', NULL, NULL),
(17, 'IUJK KONSULTANSI KONTRUKSI', '98/C.31.1/31.74/4/009500/2017', NULL, '1900-01-20', 'PEMPROP DKI', NULL, 'Perusahaan Non Kecil', NULL, 1, '2018-11-06 00:55:02', NULL, NULL),
(18, 'IUJK PENGAWAS KONTRUKSI', '97/C.31.1/31.74/4/009500/2017', NULL, '1900-01-20', 'PEMPROP DKI', NULL, 'Perusahaan Kecil', NULL, 1, '2018-11-06 00:55:02', NULL, NULL),
(19, 'IUJK PERENCANAAN KONTRUKSI', '96/C.31.1/31.74/4/009500/2017', NULL, '1900-01-20', 'PEMPROP DKI', NULL, 'Perusahaan Non Kecil', NULL, 1, '2018-11-06 00:55:02', NULL, NULL),
(20, 'ISO 9001:2015', 'QMS41127', NULL, '1900-01-26', 'SAI GLOBAL', NULL, 'Perusahaan Non Kecil', NULL, 1, '2018-11-06 00:55:02', NULL, NULL),
(21, 'SMKKKK', 'REG.SMK3.2016.JAN.SK-44', NULL, '1900-01-16', 'KEMENTERIAN TENAGA KERJA', NULL, 'Perusahaan Non Kecil', NULL, 1, '2018-11-06 00:55:02', NULL, NULL),
(22, 'NPWP', '01 069 474 3-093 000', NULL, '1900-01-30', 'Dirjen Pajak', NULL, 'Perusahaan Non Kecil', NULL, 1, '2018-11-06 00:55:02', NULL, NULL),
(23, 'Jasa Konsultansi Manajemen', '1.MS-20203-17-0041', NULL, '1900-01-17', 'INKINDO', NULL, 'Perusahaan Non Kecil', NULL, 1, '2018-11-06 00:55:02', NULL, NULL),
(24, 'DOMISILI PERUSAHAAN', '411/27.1BU.1/317402.1008/-071.562/e/2016', NULL, '2021-09-22', 'PEMERINTAH PROVINSI DKI JAKARTA', NULL, 'Perusahaan Non Kecil', NULL, 1, '2018-11-06 00:55:02', NULL, NULL),
(25, 'TANDA DAFTAR PERUSAHAAN', '09.03.1.82.14970', NULL, '1900-01-11', 'PEMERINTAH PROVINSI DKI JAKARTA', NULL, 'Perusahaan Non Kecil', NULL, 1, '2018-11-06 00:55:02', NULL, NULL),
(26, 'SURAT IZIN USAHA JASA SURVEY', '204.UMUM-SIUJS.0616', NULL, '1900-01-22', 'KEMENTERIAN PERDAGANGAN', NULL, 'Perusahaan Kecil', NULL, 1, '2018-11-06 00:55:02', NULL, NULL),
(27, 'SITUP', '19/T/PERDAGANGAN/1997', NULL, '1900-01-08', 'BADAN KOORDINASI PENANAMAN MODAL', NULL, 'Perusahaan Non Kecil', NULL, 1, '2018-11-06 00:55:02', NULL, NULL),
(28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-11-06 00:55:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `syarat_kualifikasi`
--

CREATE TABLE `syarat_kualifikasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_tender` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pemberi_tender` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jadwal_tender` date DEFAULT NULL,
  `status_dokument` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_kelengkapan` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_terkirim` date DEFAULT NULL,
  `progress` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tenaga_kerja`
--

CREATE TABLE `tenaga_kerja` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_ktp` int(11) DEFAULT NULL,
  `no_npwp` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_formal` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lama_pengalaman_kerja` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_ijazah` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teknik_id` int(10) UNSIGNED DEFAULT NULL,
  `strata_id` int(10) UNSIGNED DEFAULT NULL,
  `jurusan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institusi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_non_formal` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_kepegawaian` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sertifikat_training` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_sertifikat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tenaga_kerja`
--

INSERT INTO `tenaga_kerja` (`id`, `nama`, `jabatan`, `tempat_lahir`, `tanggal_lahir`, `no_ktp`, `no_npwp`, `pendidikan_formal`, `lama_pengalaman_kerja`, `tahun_ijazah`, `teknik_id`, `strata_id`, `jurusan`, `institusi`, `pendidikan_non_formal`, `status_kepegawaian`, `sertifikat_training`, `no_sertifikat`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 'Dudi Iskandar', 'Directur', 'Bogor', '2000-12-15', 1231220, '1233333333123123123', 'S1', '4', '2018', 6, 12, 'RPL', 'IPB', 'qwe', 'qwe', 'jakjakajk', '12312', 1, '2018-10-19 02:49:23', '2018-11-06 00:46:22', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tender`
--

CREATE TABLE `tender` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_tender` varchar(100) DEFAULT NULL,
  `no_tender` varchar(100) DEFAULT NULL,
  `no_berita_acara` varchar(50) DEFAULT NULL,
  `pengguna_jasa_id` int(10) UNSIGNED DEFAULT NULL,
  `metode_kualifikasi_id` int(10) UNSIGNED DEFAULT NULL,
  `no_kualifikasi` varchar(50) DEFAULT NULL,
  `dokumen_tender_text` varchar(50) DEFAULT NULL,
  `dokument_tender_file` varchar(500) DEFAULT NULL,
  `nilai_pagu` varchar(50) DEFAULT NULL,
  `nilai_hps` varchar(50) DEFAULT NULL,
  `metode_dokumen_id` int(10) UNSIGNED DEFAULT NULL,
  `metode_evaluasi_id` int(10) UNSIGNED DEFAULT NULL,
  `bidbond_text` varchar(50) DEFAULT NULL,
  `bidbond_file` varchar(500) DEFAULT NULL,
  `hasil_tender_text` varchar(50) DEFAULT NULL,
  `hasil_tender_file` varchar(500) DEFAULT NULL,
  `ao_name` varchar(100) DEFAULT NULL,
  `lainnya` varchar(200) DEFAULT NULL,
  `status_kelengkapan` varchar(200) DEFAULT 'Berjalan',
  `progress_kelengkapan` int(11) NOT NULL,
  `status_verifikasi` varchar(50) NOT NULL DEFAULT 'Not Ok',
  `tanggal_terkirim` date NOT NULL,
  `show_button` tinyint(1) NOT NULL DEFAULT '1',
  `jadwal_upload_dokumen_prakualifikasi` date DEFAULT NULL,
  `jadwal_pembuktian_prakualifikasi` date DEFAULT NULL,
  `jadwal_download_dokumen_pemilihan` date DEFAULT NULL,
  `jadwal_pemberian_penjelasan` date DEFAULT NULL,
  `jadwal_upload_dokumen_penawaran` date DEFAULT NULL,
  `jadwal_pengumuman_pemenang` date DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tender`
--

INSERT INTO `tender` (`id`, `nama_tender`, `no_tender`, `no_berita_acara`, `pengguna_jasa_id`, `metode_kualifikasi_id`, `no_kualifikasi`, `dokumen_tender_text`, `dokument_tender_file`, `nilai_pagu`, `nilai_hps`, `metode_dokumen_id`, `metode_evaluasi_id`, `bidbond_text`, `bidbond_file`, `hasil_tender_text`, `hasil_tender_file`, `ao_name`, `lainnya`, `status_kelengkapan`, `progress_kelengkapan`, `status_verifikasi`, `tanggal_terkirim`, `show_button`, `jadwal_upload_dokumen_prakualifikasi`, `jadwal_pembuktian_prakualifikasi`, `jadwal_download_dokumen_pemilihan`, `jadwal_pemberian_penjelasan`, `jadwal_upload_dokumen_penawaran`, `jadwal_pengumuman_pemenang`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'testing', '1234', '2345', 2, 21, '82734', 'wiuerkhwe', 'uploads/1/2018-11/test.pdf', '128386', '10', 22, 25, 'sdfsd', 'uploads/1/2018-11/test.pdf', 'ok', 'uploads/1/2018-11/test.pdf', '1837', 'ja', 'Berjalan', 11, 'Not Ok', '2018-11-13', 0, '2018-10-28', '2018-11-02', '2018-11-03', '2018-11-04', '2018-11-05', '2018-11-06', NULL, '2018-11-06 03:50:34', '2018-11-18 23:37:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tender_syarat_kualifikasi`
--

CREATE TABLE `tender_syarat_kualifikasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `tender_id` int(10) UNSIGNED NOT NULL,
  `master_syarat_kualifikasi_id` int(10) UNSIGNED NOT NULL,
  `value` varchar(500) DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tender_syarat_kualifikasi`
--

INSERT INTO `tender_syarat_kualifikasi` (`id`, `tender_id`, `master_syarat_kualifikasi_id`, `value`, `sequence`, `active`, `approved`, `verified`, `completed`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'uploads/tender/1/AVvHP89txtOjbzYFcQGosZsbxEfq4Kjmdje20jnJ.xls', 10, 1, 0, 0, 0, NULL, '2018-11-06 03:50:52', '2018-11-06 04:30:12'),
(2, 1, 4, 'uploads/tender/1/CLWPkciQywLEQaqgYBqeIKDENqTSKwXEc3fRHvbP.jpeg', 2, 1, 0, 1, 1, NULL, '2018-11-06 03:50:57', '2018-11-18 17:17:25'),
(3, 1, 5, 'uploads/tender/1/XF1fiAgDNcxQahG7YcG2cSlQwaK3R3PG1G6pnsCu.png', 3, 1, 0, 0, 1, NULL, '2018-11-06 03:51:00', '2018-11-18 16:46:48'),
(4, 1, 6, 'uploads/tender/1/hsfpmZv3QmdQp4yWSzpC8F4YRhYonjmmTYgajTg2.txt', 13, 1, 0, 0, 0, NULL, '2018-11-06 03:51:02', '2018-11-18 17:24:32'),
(5, 1, 8, 'uploads/tender/1/xeHxN9zlYoLdEIVi9Hq8VxRQx1WP5IDKh9CcF57F.txt', 2, 1, 0, 1, 1, NULL, '2018-11-06 04:08:06', '2018-11-18 05:37:35'),
(6, 1, 9, 'uploads/tender/1/vze0Uc9zRB69sBLu9rk3zsqxxE6wVlyKv6AVIgDI.txt', 3, 1, 0, 0, 0, NULL, '2018-11-06 04:12:20', '2018-11-18 17:21:28'),
(7, 1, 10, 'uploads/tender/1/HuHRI4lHqVHEsV5LnK4975E1LwQjSJCUqBPHlwmt.docx', NULL, 1, 0, 0, 0, NULL, '2018-11-06 04:16:20', '2018-11-06 04:16:37'),
(8, 1, 11, 'uploads/tender/1/2BMNc775151lhNWSO99x3UiK7xk0CCSJroz2NIMX.docx', NULL, 1, 0, 0, 0, NULL, '2018-11-06 04:18:08', '2018-11-06 04:19:06'),
(9, 1, 12, 'uploads/tender/1/nxQvgH2cXhm650gPIYghSJ7pAEqQEeCGpXwnGqQf.docx', NULL, 1, 0, 0, 0, NULL, '2018-11-06 04:19:34', '2018-11-06 06:19:54'),
(10, 1, 13, NULL, NULL, 1, 0, 0, 0, NULL, '2018-11-06 04:21:27', '2018-11-06 04:21:27'),
(11, 1, 44, NULL, 2, 1, 0, 0, 0, NULL, '2018-11-06 06:07:31', '2018-11-06 06:59:26'),
(12, 1, 42, NULL, NULL, 0, 0, 0, 0, NULL, '2018-11-06 06:25:15', '2018-11-06 06:25:24'),
(13, 1, 60, NULL, NULL, 1, 0, 0, 0, NULL, '2018-11-06 06:30:58', '2018-11-06 06:30:58'),
(14, 1, 14, NULL, NULL, 1, 0, 0, 0, NULL, '2018-11-06 11:32:52', '2018-11-06 11:32:52'),
(15, 1, 36, NULL, NULL, 1, 0, 0, 0, NULL, '2018-11-06 13:40:34', '2018-11-06 13:40:34'),
(16, 1, 37, NULL, NULL, 1, 0, 0, 0, NULL, '2018-11-06 13:41:32', '2018-11-06 13:41:32'),
(17, 1, 46, NULL, NULL, 1, 0, 0, 0, NULL, '2018-11-06 13:59:37', '2018-11-06 13:59:37'),
(18, 1, 62, NULL, NULL, 1, 0, 0, 0, NULL, '2018-11-07 06:46:56', '2018-11-07 06:46:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tender_syarat_kualifikasi_detail`
--

CREATE TABLE `tender_syarat_kualifikasi_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `tender_syarat_kualifikasi_id` int(10) UNSIGNED NOT NULL,
  `master_syarat_kualifikasi_detail_id` int(10) UNSIGNED NOT NULL,
  `value` varchar(500) DEFAULT NULL,
  `sequence` int(11) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tender_syarat_kualifikasi_detail`
--

INSERT INTO `tender_syarat_kualifikasi_detail` (`id`, `tender_syarat_kualifikasi_id`, `master_syarat_kualifikasi_detail_id`, `value`, `sequence`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 11, 26, 'test', 1, NULL, '2018-11-06 06:19:17', '2018-11-06 06:19:17'),
(2, 11, 12, 'test', 1, NULL, '2018-11-06 06:19:23', '2018-11-06 06:19:23'),
(3, 11, 13, 'test', 1, NULL, '2018-11-06 06:19:23', '2018-11-06 06:19:23'),
(4, 11, 14, 'test', 1, NULL, '2018-11-06 06:19:23', '2018-11-06 06:19:23'),
(5, 11, 15, 'test', 1, NULL, '2018-11-06 06:19:23', '2018-11-06 06:19:23'),
(6, 11, 16, 'test', 1, NULL, '2018-11-06 06:19:23', '2018-11-06 06:19:23'),
(7, 11, 17, 'test', 1, NULL, '2018-11-06 06:19:23', '2018-11-06 06:19:23'),
(8, 11, 26, 'asdad', 2, '2018-11-06 07:00:33', '2018-11-06 06:59:26', '2018-11-06 07:00:33'),
(9, 11, 12, 'asda', 2, '2018-11-06 07:00:33', '2018-11-06 06:59:26', '2018-11-06 07:00:33'),
(10, 11, 13, 'asda', 2, '2018-11-06 07:00:33', '2018-11-06 06:59:26', '2018-11-06 07:00:33'),
(11, 11, 14, 'asda', 2, '2018-11-06 07:00:33', '2018-11-06 06:59:26', '2018-11-06 07:00:33'),
(12, 11, 15, 'asda', 2, '2018-11-06 07:00:33', '2018-11-06 06:59:26', '2018-11-06 07:00:33'),
(13, 11, 16, 'asda', 2, '2018-11-06 07:00:33', '2018-11-06 06:59:26', '2018-11-06 07:00:33'),
(14, 11, 17, 'asda', 2, '2018-11-06 07:00:33', '2018-11-06 06:59:26', '2018-11-06 07:00:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cms_apicustom`
--
ALTER TABLE `cms_apicustom`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cms_apikey`
--
ALTER TABLE `cms_apikey`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cms_dashboard`
--
ALTER TABLE `cms_dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cms_email_queues`
--
ALTER TABLE `cms_email_queues`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cms_email_templates`
--
ALTER TABLE `cms_email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cms_logs`
--
ALTER TABLE `cms_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cms_menus`
--
ALTER TABLE `cms_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cms_menus_privileges`
--
ALTER TABLE `cms_menus_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cms_moduls`
--
ALTER TABLE `cms_moduls`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cms_notifications`
--
ALTER TABLE `cms_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cms_privileges`
--
ALTER TABLE `cms_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cms_privileges_roles`
--
ALTER TABLE `cms_privileges_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cms_settings`
--
ALTER TABLE `cms_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cms_statistics`
--
ALTER TABLE `cms_statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cms_statistic_components`
--
ALTER TABLE `cms_statistic_components`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cms_users`
--
ALTER TABLE `cms_users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `daftar_uraian_tugas`
--
ALTER TABLE `daftar_uraian_tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fki_daftar_uraian_tugas_updated_by_fk` (`updated_by`),
  ADD KEY `fki_daftar_uraian_tugas_created_by_fk` (`created_by`);

--
-- Indeks untuk tabel `enumeration`
--
ALTER TABLE `enumeration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fki_enumeration_created_by_fk` (`created_by`),
  ADD KEY `fki_enumeration_updated_by_fk` (`updated_by`);

--
-- Indeks untuk tabel `kepemilikan_saham`
--
ALTER TABLE `kepemilikan_saham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fki_kepemilikan_saham_updated_by_fk` (`updated_by`),
  ADD KEY `fki_kepemilikan_saham_created_by_fk` (`created_by`);

--
-- Indeks untuk tabel `master_syarat_kualifikasi`
--
ALTER TABLE `master_syarat_kualifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fki_master_syarat_kualifikasi_parent_id_fk` (`parent_id`);

--
-- Indeks untuk tabel `master_syarat_kualifikasi_detail`
--
ALTER TABLE `master_syarat_kualifikasi_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fki_master_syarat_kualifikasi_detail_msk_id_fk` (`master_syarat_kualifikasi_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fki_pelanggan_kategori_pengguna_jasa_id_fk` (`kategori_pengguna_jasa_id`),
  ADD KEY `fki_pelanggan_created_by_fk` (`created_by`),
  ADD KEY `fki_pelanggan_updated_by_fk` (`updated_by`);

--
-- Indeks untuk tabel `pengalaman_perusahaan`
--
ALTER TABLE `pengalaman_perusahaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fki_pengalaman_perusahaan_kategori_id_fk` (`kategori_id`),
  ADD KEY `fki_pengalaman_perusahaan_created_by_fk` (`created_by`),
  ADD KEY `fki_pengalaman_perusahaan_updated_by_fk` (`updated_by`);

--
-- Indeks untuk tabel `pengalaman_uraian_kerja`
--
ALTER TABLE `pengalaman_uraian_kerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fki_pengalaman_uraian_kerja_updated_by_fk` (`updated_by`),
  ADD KEY `fki_pengalaman_uraian_kerja_created_by_fk` (`created_by`),
  ADD KEY `fki_pengalaman_uraian_kerja_pengguna_jasa_id_fk` (`pengguna_jasa_id`);

--
-- Indeks untuk tabel `pengurus_badan_usaha`
--
ALTER TABLE `pengurus_badan_usaha`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fki_pengurus_badan_usaha_updated_by_fk` (`updated_by`),
  ADD KEY `fki_pengurus_badan_usaha_created_by_fk` (`created_by`);

--
-- Indeks untuk tabel `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fki_peralatan_kondisi_id_fk` (`kondisi_id`),
  ADD KEY `fki_peralatan_created_by_fk` (`created_by`),
  ADD KEY `fki_peralatan_updated_by_fk` (`updated_by`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `surat_ijin_usaha`
--
ALTER TABLE `surat_ijin_usaha`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fki_surat_ijin_usaha_created_by_fk` (`created_by`),
  ADD KEY `fki_surat_ijin_usaha_updated_by_fk` (`updated_by`);

--
-- Indeks untuk tabel `syarat_kualifikasi`
--
ALTER TABLE `syarat_kualifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fki_syarat_kualifikasi_created_by_fk` (`created_by`),
  ADD KEY `fki_syarat_kualifikasi_updated_by_fk` (`updated_by`);

--
-- Indeks untuk tabel `tenaga_kerja`
--
ALTER TABLE `tenaga_kerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fki_tenaga_kerja_teknik_id_fk` (`teknik_id`),
  ADD KEY `fki_tenaga_kerja_strata_id_fk` (`strata_id`),
  ADD KEY `fki_tenaga_kerja_created_by_fk` (`created_by`),
  ADD KEY `fki_tenaga_kerja_updated_by_fk` (`updated_by`);

--
-- Indeks untuk tabel `tender`
--
ALTER TABLE `tender`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fki_tender_pengguna_jasa_id_fk` (`pengguna_jasa_id`),
  ADD KEY `fki_tender_metode_kualifikasi_id_fk` (`metode_kualifikasi_id`),
  ADD KEY `fki_tender_metode_dokumen_id_fk` (`metode_dokumen_id`),
  ADD KEY `fki_tender_metode_evaluasi_id_fk` (`metode_evaluasi_id`);

--
-- Indeks untuk tabel `tender_syarat_kualifikasi`
--
ALTER TABLE `tender_syarat_kualifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fki_tender_syarat_kualifikasi_master_syarat_kualifikasi_id_fk` (`master_syarat_kualifikasi_id`),
  ADD KEY `fki_tender_syarat_kualifikasi_tender_id_fk` (`tender_id`);

--
-- Indeks untuk tabel `tender_syarat_kualifikasi_detail`
--
ALTER TABLE `tender_syarat_kualifikasi_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fki_tskd_master_syarat_kualifikasi_detail_id_fk` (`master_syarat_kualifikasi_detail_id`),
  ADD KEY `fki_tskd_tender_syarat_kualifikasi_id_fk` (`tender_syarat_kualifikasi_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cms_apicustom`
--
ALTER TABLE `cms_apicustom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cms_apikey`
--
ALTER TABLE `cms_apikey`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cms_dashboard`
--
ALTER TABLE `cms_dashboard`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cms_email_queues`
--
ALTER TABLE `cms_email_queues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cms_email_templates`
--
ALTER TABLE `cms_email_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `cms_logs`
--
ALTER TABLE `cms_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT untuk tabel `cms_menus`
--
ALTER TABLE `cms_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `cms_menus_privileges`
--
ALTER TABLE `cms_menus_privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `cms_moduls`
--
ALTER TABLE `cms_moduls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `cms_notifications`
--
ALTER TABLE `cms_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `cms_privileges`
--
ALTER TABLE `cms_privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `cms_privileges_roles`
--
ALTER TABLE `cms_privileges_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `cms_settings`
--
ALTER TABLE `cms_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `cms_statistics`
--
ALTER TABLE `cms_statistics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `cms_statistic_components`
--
ALTER TABLE `cms_statistic_components`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `cms_users`
--
ALTER TABLE `cms_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `daftar_uraian_tugas`
--
ALTER TABLE `daftar_uraian_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `enumeration`
--
ALTER TABLE `enumeration`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `kepemilikan_saham`
--
ALTER TABLE `kepemilikan_saham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `master_syarat_kualifikasi`
--
ALTER TABLE `master_syarat_kualifikasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `master_syarat_kualifikasi_detail`
--
ALTER TABLE `master_syarat_kualifikasi_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `pengalaman_perusahaan`
--
ALTER TABLE `pengalaman_perusahaan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengalaman_uraian_kerja`
--
ALTER TABLE `pengalaman_uraian_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengurus_badan_usaha`
--
ALTER TABLE `pengurus_badan_usaha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `peralatan`
--
ALTER TABLE `peralatan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `surat_ijin_usaha`
--
ALTER TABLE `surat_ijin_usaha`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `syarat_kualifikasi`
--
ALTER TABLE `syarat_kualifikasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tenaga_kerja`
--
ALTER TABLE `tenaga_kerja`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tender`
--
ALTER TABLE `tender`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tender_syarat_kualifikasi`
--
ALTER TABLE `tender_syarat_kualifikasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tender_syarat_kualifikasi_detail`
--
ALTER TABLE `tender_syarat_kualifikasi_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `daftar_uraian_tugas`
--
ALTER TABLE `daftar_uraian_tugas`
  ADD CONSTRAINT `daftar_uraian_tugas_created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `daftar_uraian_tugas_updated_by_fk` FOREIGN KEY (`updated_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `enumeration`
--
ALTER TABLE `enumeration`
  ADD CONSTRAINT `enumeration_created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `enumeration_updated_by_fk` FOREIGN KEY (`updated_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kepemilikan_saham`
--
ALTER TABLE `kepemilikan_saham`
  ADD CONSTRAINT `kepemilikan_saham_created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `kepemilikan_saham_updated_by_fk` FOREIGN KEY (`updated_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `master_syarat_kualifikasi`
--
ALTER TABLE `master_syarat_kualifikasi`
  ADD CONSTRAINT `master_syarat_kualifikasi_parent_id_fk` FOREIGN KEY (`parent_id`) REFERENCES `master_syarat_kualifikasi` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `master_syarat_kualifikasi_detail`
--
ALTER TABLE `master_syarat_kualifikasi_detail`
  ADD CONSTRAINT `master_syarat_kualifikasi_detail_msk_id_fk` FOREIGN KEY (`master_syarat_kualifikasi_id`) REFERENCES `master_syarat_kualifikasi` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pelanggan_kategori_pengguna_jasa_id_fk` FOREIGN KEY (`kategori_pengguna_jasa_id`) REFERENCES `enumeration` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pelanggan_updated_by_fk` FOREIGN KEY (`updated_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengalaman_perusahaan`
--
ALTER TABLE `pengalaman_perusahaan`
  ADD CONSTRAINT `pengalaman_perusahaan_created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pengalaman_perusahaan_kategori_id_fk` FOREIGN KEY (`kategori_id`) REFERENCES `enumeration` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pengalaman_perusahaan_updated_by_fk` FOREIGN KEY (`updated_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengalaman_uraian_kerja`
--
ALTER TABLE `pengalaman_uraian_kerja`
  ADD CONSTRAINT `pengalaman_uraian_kerja_created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pengalaman_uraian_kerja_pengguna_jasa_id` FOREIGN KEY (`pengguna_jasa_id`) REFERENCES `enumeration` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pengalaman_uraian_kerja_updated_by_fk` FOREIGN KEY (`updated_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengurus_badan_usaha`
--
ALTER TABLE `pengurus_badan_usaha`
  ADD CONSTRAINT `pengurus_badan_usaha_created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pengurus_badan_usaha_updated_by_fk` FOREIGN KEY (`updated_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peralatan`
--
ALTER TABLE `peralatan`
  ADD CONSTRAINT `peralatan_created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `peralatan_kondisi_id_fk` FOREIGN KEY (`kondisi_id`) REFERENCES `enumeration` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `peralatan_updated_by_fk` FOREIGN KEY (`updated_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_user_id` FOREIGN KEY (`user_id`) REFERENCES `cms_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `surat_ijin_usaha`
--
ALTER TABLE `surat_ijin_usaha`
  ADD CONSTRAINT `surat_ijin_usaha_created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_ijin_usaha_updated_by_fk` FOREIGN KEY (`updated_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `syarat_kualifikasi`
--
ALTER TABLE `syarat_kualifikasi`
  ADD CONSTRAINT `syarat_kualifikasi_created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `syarat_kualifikasi_updated_by_fk` FOREIGN KEY (`updated_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tenaga_kerja`
--
ALTER TABLE `tenaga_kerja`
  ADD CONSTRAINT `tenaga_kerja_created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tenaga_kerja_strata_id_fk` FOREIGN KEY (`strata_id`) REFERENCES `enumeration` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tenaga_kerja_teknik_id_fk` FOREIGN KEY (`teknik_id`) REFERENCES `enumeration` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tenaga_kerja_updated_by_fk` FOREIGN KEY (`updated_by`) REFERENCES `cms_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tender`
--
ALTER TABLE `tender`
  ADD CONSTRAINT `tender_metode_dokumen_id_fk` FOREIGN KEY (`metode_dokumen_id`) REFERENCES `enumeration` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tender_metode_evaluasi_id_fk` FOREIGN KEY (`metode_evaluasi_id`) REFERENCES `enumeration` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tender_metode_kualifikasi_id_fk` FOREIGN KEY (`metode_kualifikasi_id`) REFERENCES `enumeration` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tender_pengguna_jasa_id_fk` FOREIGN KEY (`pengguna_jasa_id`) REFERENCES `enumeration` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tender_syarat_kualifikasi`
--
ALTER TABLE `tender_syarat_kualifikasi`
  ADD CONSTRAINT `tender_syarat_kualifikasi_master_syarat_kualifikasi_id_fk` FOREIGN KEY (`master_syarat_kualifikasi_id`) REFERENCES `master_syarat_kualifikasi` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tender_syarat_kualifikasi_tender_id_fk` FOREIGN KEY (`tender_id`) REFERENCES `tender` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tender_syarat_kualifikasi_detail`
--
ALTER TABLE `tender_syarat_kualifikasi_detail`
  ADD CONSTRAINT `tskd_master_syarat_kualifikasi_detail_id_fk` FOREIGN KEY (`master_syarat_kualifikasi_detail_id`) REFERENCES `master_syarat_kualifikasi_detail` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tskd_tender_syarat_kualifikasi_id_fk` FOREIGN KEY (`tender_syarat_kualifikasi_id`) REFERENCES `tender_syarat_kualifikasi` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
