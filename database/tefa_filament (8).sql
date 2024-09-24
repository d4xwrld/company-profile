-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 24, 2024 at 02:18 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tefa_filament`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('1896c0e1cdd889877fb52279b20e666cda94b62c', 'i:1;', 1727050533),
('1896c0e1cdd889877fb52279b20e666cda94b62c:timer', 'i:1727050533;', 1727050533),
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1727086137),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1727086137;', 1727086137),
('a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1727182741),
('a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1727182741;', 1727182741),
('d69949d53748f5211b9dba9853961401bd7fbce2', 'i:1;', 1726147749),
('d69949d53748f5211b9dba9853961401bd7fbce2:timer', 'i:1726147749;', 1726147749);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Website', '2024-09-05 08:12:59', '2024-09-05 08:12:59'),
(2, 'Mobile', '2024-09-05 08:13:16', '2024-09-05 08:13:16'),
(3, 'Dekstop', '2024-09-05 08:13:26', '2024-09-05 08:13:26');

--
-- Triggers `categories`
--
DELIMITER $$
CREATE TRIGGER `category_actions` AFTER INSERT ON `categories` FOR EACH ROW BEGIN
INSERT INTO logs VALUES ("Menambahkan Category Baru", NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 11, 1, 'Usefull', '2024-09-23 03:08:35', '2024-09-23 03:08:35'),
(6, 8, 1, 'Bagus!', '2024-09-24 06:51:11', '2024-09-24 06:51:11'),
(7, 7, 1, 'Recommend sekali!', '2024-09-24 07:08:10', '2024-09-24 07:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `photo_actions` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`photo_actions`, `timestamp`) VALUES
('Menambahkan Foto Baru', '2024-09-23 03:31:47'),
('Menambahkan Foto Baru', '2024-09-23 03:32:43'),
('Menambahkan Foto Baru', '2024-09-23 10:08:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_06_070939_slug', 2),
(5, '2024_09_06_072157_create_comments_table', 3),
(6, '2024_09_06_072221_commentar', 4),
(7, '2024_09_11_053235_create_photos_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `image_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `post_id`, `image_path`, `alt_text`, `created_at`, `updated_at`) VALUES
(5, 7, '01J7K3MY6ZE1YMSA870GYGA22W.png', 'register page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(6, 7, '01J7K3PK6M7T4Q9JYKR4788SDC.png', 'update page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(8, 7, '01J7K3T08CZNT4AR0VDX94DPNY.png', 'data petugas page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(9, 7, '01J7K3TQPWCZ3DSGD2GPCTPGRH.png', 'data member page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(11, 7, '01J7K3WKRDJRSFA8VNHF8B4YHW.png', 'logout page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(12, 7, '01J7K3ZV8330PTEFY6HPBF2JZX.png', 'laporan petugasa page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(13, 7, '01J7K44X2GAJCTEYXB34FT8EKV.png', 'laporan admin page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(15, 7, '01J7K496FCEGY47GF32JDQJP8K.png', 'delete page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(16, 7, '01J7K4A1N7535TVPZ4JVPXQACG.png', 'dashboard petugas page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(17, 7, '01J7K4AGNVG7BQEYHC7WZQFJ4K.png', 'dasoard admin page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(18, 7, '01J7K4B632JKA32X795Y615KGW.png', 'barang admin page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(19, 7, '01J7K4BV524KN4HRFGY7QGX4S7.png', 'barang petugas page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(21, 7, '01J7K57G7JWS6DPSNKFNAZG17D.png', 'transaksi petugas page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(22, 7, '01J7K5892FY5SXW4E7FBD8TNF5.png', 'lanjutan transaksi petugas page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(23, 8, '01J7K5BCG24PHHWW9RRQ3HB28H.png', 'home page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(25, 8, '01J7K5DSY2Q4CXNC6B6Z7Y4CFD.png', 'Login page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(26, 8, '01J7K5EJ40MW6DHPYJTRRVX64B.png', 'Register page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(27, 8, '01J7K5FXYB7H2Q593BNK16JYYJ.png', 'Library page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(28, 8, '01J7K5GHNW4XBGW2ZZ63GJKNRF.png', 'Detail page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(29, 8, '01J7K5HBTFF8FHZHC53FMM6547.png', 'form peminjaman page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(31, 8, '01J7K5JCGAPBHRPGAM9PZQ99VW.png', 'daftar peminjaman page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(33, 8, '01J7K6TXPQKS97WF600PYGYBSD.jpg', 'dashard admin page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(34, 8, '01J7K6X2WKC6MTKRKG4TQAE3SZ.png', 'Kelola Petugas page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(35, 8, '01J7K752AK3E5SZM71905ZY0SB.png', 'Kelola kategori page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(36, 8, '01J7K767XZ0G21P04ST9GKA1K5.png', 'Kelola buku page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(37, 8, '01J7K76ZWJ9C4R0Q7YX7S6RQD6.png', 'Kolola pengembalian page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(38, 8, '01J7K790X9HS0KB2A2255Z0YDH.png', 'Laporan peminjaman page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(39, 8, '01J7K7A80SWTGTS6R94G2BT7M2.png', 'Laporan Pengembalian page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(40, 8, '01J7K80Z99WTXYMMT764GR6Y9W.png', 'Tambah buku page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(41, 8, '01J7K81PCTF0BYXGYGBNXTDCNS.png', 'Tambah Kategori page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(42, 8, '01J7K82PRKKXNGVZX2TYYGGVTE.png', 'Tambah Petugas page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(43, 8, '01J7K86E94JA8F9JZ1CN1398A6.png', 'Edit buku page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(44, 8, '01J7K86YB7BZNCR5E64JFZ4NPN.png', 'Edit petugas page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(45, 8, '01J7K87GB63H6NZMJWEJ2NRZCW.png', 'Edit kategori page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(46, 13, '01J7KB7DE7EATWHG5TJ48WKJB7.jpg', 'Login page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(47, 13, '01J7KB8EXYSN4NK0Q2F9QVVJP7.jpg', 'input kehadiran page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(48, 13, '01J7KB9QC0PDQCS3EDQMS32RB6.jpg', 'alert konfirmasi pengiriman page', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(49, 13, '01J7KBEGJBYJYE0KZ2M67Q4109.jpg', 'absensi telah berhasil dikirim', '2024-09-23 03:30:54', '2024-09-23 03:30:54'),
(54, 11, '01J8F5ME3Z1K1JRB4V7597XBV7.png', 'home', '2024-09-23 03:08:02', '2024-09-23 03:08:02');

--
-- Triggers `photos`
--
DELIMITER $$
CREATE TRIGGER `photo_actions` AFTER INSERT ON `photos` FOR EACH ROW BEGIN
INSERT INTO logs VALUES ("Menambahkan Foto Baru", NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `uploaded`, `image_url`, `slug`, `category_id`, `user_id`, `created_at`, `updated_at`) VALUES
(7, 'Simple Cashier Web Based Application', 'Website pengelolaan pendataan barang, transaksi, dan karyawan yang efisien dan cocok digunakan bagi toko swalayan', '2024-09-05 10:44:26', '01J70WJ5J8XMTNCFRB09KYGAR3.png', 'simple-cashier-web-based-application-7', 1, 1, '2024-09-23 03:30:40', '2024-09-23 03:30:40'),
(8, 'Library Management System', 'Sistem manajemen untuk perpustakaan yang dapat memberikan kesempatan membaca bagi pengguna dan akses manajemen data buku secara langsung', '2024-09-05 11:00:16', '01J70XF53ND1KCB8DD1V5K4VP4.png', 'library-management-system-8', 1, 1, '2024-09-23 03:30:40', '2024-09-23 03:30:40'),
(11, 'Educational Games', 'Game edukasi untuk anak usia dini yang dapat melatih daya ingat, kemampuan otak, dan kemampuan memecahkan masalah', '2024-09-06 02:20:33', '01J72J47X416437QF90RZPXZ13.png', 'educational-games-11', 2, 1, '2024-09-23 03:30:40', '2024-09-23 03:30:40'),
(13, 'Student Attendance', 'aplikasi manajemen kehadiran siswa yang dirancang untuk mempermudah pencatatan dan pemantauan kehadiran siswa di sekolah. ', '2024-09-12 14:30:45', '01J7KA9K9QBZ3APBW9Z4899P91.jpg', 'student-attendance', 2, 1, '2024-09-23 03:30:40', '2024-09-23 03:30:40');

--
-- Triggers `posts`
--
DELIMITER $$
CREATE TRIGGER `post_actions` AFTER INSERT ON `posts` FOR EACH ROW BEGIN
INSERT INTO logs VALUES ("Menambahkan Postingan Baru", NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('e4EYb4IdgtRAqPqG0Hc1SXQkg3XxEhnugCBAXEsQ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 OPR/112.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZERSUjhCNXNibjNSeUh6Y05OTld4RzlnSTBzWk9WaVhrSnhLZGEyNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiRrOG5aaUoydmh3OUN4Uk00bjBILjB1SkdLUGJWNVUxbTN4MUxMMWZCaXRtZE4ySnB3YnlBZSI7fQ==', 1727187500);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'teamtefa@rplnekat.com', 'admin', '2024-09-05 00:21:30', '$2y$12$k8nZiJ2vhw9CxRM4n0H.0uJGKPbV5U1m3x1LL1fBitmdN2JpwbyAe', 'pHNmR9AavS5hnJBYitx63PkXAENsvyAEQ3so6KRkQlVvn4UzjDrxJnp35PLB', '2024-09-05 00:21:30', '2024-09-13 01:24:43');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `user_actions` AFTER INSERT ON `users` FOR EACH ROW BEGIN
INSERT INTO logs VALUES ("Menambahkan User Baru", NOW());
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_post_id_foreign` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
