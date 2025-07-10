-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
<<<<<<< HEAD
-- Generation Time: Jul 10, 2025 at 04:38 PM
=======
-- Generation Time: Jul 10, 2025 at 03:36 PM
>>>>>>> ef1fb95cd38ae2b8e6cf1822d105a6eb5eba3c7e
-- Server version: 8.0.30
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simfonia`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `pembeli_id` bigint UNSIGNED NOT NULL,
  `tanggal_mulai` datetime NOT NULL,
  `tanggal_kembali` datetime NOT NULL,
  `status` enum('pending','disetujui','ditolak','sedang digunakan','pengembalian','selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `nama_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `surat_pengajuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `product_id`, `pembeli_id`, `tanggal_mulai`, `tanggal_kembali`, `status`, `nama_kegiatan`, `instansi`, `email`, `nama_lengkap`, `no_hp`, `alamat`, `surat_pengajuan`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2025-07-10 00:00:00', '2025-07-11 00:00:00', 'pending', 'Seminar Nasional AI', 'Universitas Udayana', 'arimbi@mail.com', 'Arimbi WS', '087781537172', 'Jl. Ayani Utara', 'surat_pengajuan/surat_ajuan_ai.pdf', '2025-07-07 11:42:28', '2025-07-07 11:42:28'),
(4, 3, 2, '2025-07-13 00:00:00', '2025-07-14 00:00:00', 'pending', 'Seminar Informatika', 'Informatika', 'sarah@student.unud.ac.id', 'Sarah Raharja', '08921231231', 'Jl. Kampus Unud', 'surat_pengajuan/WB5PB8cipdlpOnASaA8sj0yRvpHwVLmWWsXvYlzH.pdf', '2025-07-07 21:00:03', '2025-07-07 21:00:03'),
(5, 4, 2, '2025-07-19 00:00:00', '2025-07-20 00:00:00', 'pending', 'Kuliah Bahasa Indonesia', 'Farmasi', 'ryan@gmail.com', 'Ryan Farmasi', '0899876655', 'Jl. Sudirman', 'surat_pengajuan/XJ2QfZG6pAVerPOvuBXZ1DBvMbAsfFyoEPAJKReP.pdf', '2025-07-07 21:05:20', '2025-07-07 21:05:20'),
(6, 8, 2, '2025-07-22 00:00:00', '2025-07-23 00:00:00', 'pending', 'Webinar Nusantara', 'Universitas Terbuka', 'widya@gmail.com', 'Widyastuti', '0899876655', 'Jl. Sesetan', 'surat_pengajuan/8UaR4xyNAhMNVcZhrUaRKwkVNfcJme4Ec4xjqpTH.pdf', '2025-07-07 21:30:39', '2025-07-07 21:30:39'),
(7, 5, 1, '2025-08-15 00:00:00', '2025-08-16 00:00:00', 'pending', 'Kuliah KWN', 'Informatika', 'arimbi@mail.com', 'arimbi', '87781537172', 'ayani utara', 'surat_pengajuan/ziSDxOgTIFgrUOTNHNWAQSiG5xhvAt1TpIsoL5lb.pdf', '2025-07-09 13:49:21', '2025-07-09 13:49:21'),
(8, 3, 33, '2025-07-11 00:00:00', '2025-07-11 00:00:00', 'pending', 'Webinar', 'Universitas Udayana', 'arimbiws@student.unud.ac.id', 'arimbi', '23456789', 'jimbaran', 'surat_pengajuan/DJrc3eFHK0XkCo2nEiYvGDdKco0aTffZeT9O3Ycn.pdf', '2025-07-09 20:18:55', '2025-07-09 20:18:55'),
<<<<<<< HEAD
(10, 3, 33, '2025-07-23 00:00:00', '2025-07-24 00:00:00', 'pending', 'Kuliah', 'Informatika', 'arimbiws@student.unud.ac.id', 'arimbi', '23456789', 'jimbaran', 'surat_pengajuan/vX2LYLIx29fDXwknuAmx1OC32lXvhYNyu3YV957g.pdf', '2025-07-10 07:23:23', '2025-07-10 07:23:23'),
(11, 5, 34, '2025-07-22 00:00:00', '2025-07-23 00:00:00', 'pending', 'Kuliahh', 'Informatika', 'there@yahoo.com', 'there', '30898978754', 'jallsansasd', 'surat_pengajuan/6fMEBXkRHNW52NklnUQhtWX7fEbM9tjXz7ZW9h7M.pdf', '2025-07-10 07:52:59', '2025-07-10 07:52:59'),
(12, 5, 34, '2025-07-24 00:00:00', '2025-07-25 00:00:00', 'pending', 'Kuliahhh', 'Informatika', 'there@yahoo.com', 'there', '30898978754', 'jallsansasd', 'surat_pengajuan/KlrXiPjQMddsNMe2L2JeyG1zHw6HSLL8kEQLLHnG.pdf', '2025-07-10 07:55:50', '2025-07-10 07:55:50'),
(14, 5, 34, '2025-07-26 00:00:00', '2025-07-27 00:00:00', 'pending', 'Seminar', 'Informatika', 'there@yahoo.com', 'there', '30898978754', 'jallsansasd', 'surat_pengajuan/SUcZS96wqanx5W5MkgdfHGJjpXYrxaff1DrIAFqG.pdf', '2025-07-10 08:00:12', '2025-07-10 08:00:12');
=======
(10, 3, 33, '2025-07-23 00:00:00', '2025-07-24 00:00:00', 'pending', 'Kuliah', 'Informatika', 'arimbiws@student.unud.ac.id', 'arimbi', '23456789', 'jimbaran', 'surat_pengajuan/vX2LYLIx29fDXwknuAmx1OC32lXvhYNyu3YV957g.pdf', '2025-07-10 07:23:23', '2025-07-10 07:23:23');
>>>>>>> ef1fb95cd38ae2b8e6cf1822d105a6eb5eba3c7e

--
-- Triggers `bookings`
--
DELIMITER $$
CREATE TRIGGER `auto_set_digunakan` BEFORE UPDATE ON `bookings` FOR EACH ROW BEGIN
  IF NEW.status = 'disetujui' AND NEW.tanggal_mulai = CURDATE() THEN
    SET NEW.status = 'sedang digunakan';
  END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `reject_overlapping_booking` BEFORE INSERT ON `bookings` FOR EACH ROW BEGIN
  DECLARE jumlah_conflict INT;

  SELECT COUNT(*) INTO jumlah_conflict
  FROM bookings
  WHERE product_id = NEW.product_id
    AND status = 'disetujui'
    AND (
      (NEW.tanggal_mulai BETWEEN tanggal_mulai AND tanggal_kembali)
      OR (NEW.tanggal_kembali BETWEEN tanggal_mulai AND tanggal_kembali)
      OR (tanggal_mulai BETWEEN NEW.tanggal_mulai AND NEW.tanggal_kembali)
    );

  IF jumlah_conflict > 0 THEN
    SET NEW.status = 'ditolak';
  END IF;
END
$$
DELIMITER ;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2025_06_09_192938_create_products_table', 3),
(10, '2025_06_09_193735_create_transactions_table', 4),
(11, '2025_06_09_184204_create_unit_bisnis_table', 5);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `penjual_id` bigint UNSIGNED NOT NULL,
  `unit_bisnis_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` bigint UNSIGNED NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `penjual_id`, `unit_bisnis_id`, `nama`, `slug`, `gambar`, `harga`, `deskripsi`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 'Ruang Lobby Dekanat FMIPA', '', 'images/products/OQNchw8eDmGW7rKiLgjU1Nl1zXkZsWWHtojLvaAJ.jpg', 150000, '\"Ruangan\" dalam bahasa Indonesia merujuk pada sebuah tempat atau area yang dibatasi oleh dinding dan memiliki fungsi tertentu. Bisa berupa kamar di dalam rumah, kelas di sekolah, atau area yang lebih luas seperti auditorium.', NULL, '2025-07-05 23:49:56', '2025-07-05 23:49:56'),
(4, 2, 1, 'Gedung Lama Informatika', '', 'images/products/CjuLoGWFzhKaD3g5BqC6TZNiGFLJE1KILrcUjQVW.jpg', 125000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '2025-07-06 08:23:26', '2025-07-06 08:23:26'),
(5, 2, 2, 'Proyektor Infocus In124-3200', '', 'images/products/ECmzUWkFONL8F39L6VHylK9YoQc81RwrY4a3LeKh.jpg', 320000, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', NULL, '2025-07-06 10:39:07', '2025-07-06 10:39:07'),
(6, 1, 2, 'TIK - Alat Ketik Tradisional', '', 'images/products/L7fdJbgjGfvUuvrWI2joEnD2ft0JjxGOOBxAAr4b.jpg', 156200, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', NULL, '2025-07-06 10:40:30', '2025-07-06 10:40:30'),
(7, 1, 1, 'Ruang Kuliah A101', 'ruang-kuliah-a101', 'images/products/ruang_a101.jpg', 200000, 'Ruang kuliah berkapasitas 50 orang dengan fasilitas AC, proyektor, dan sound system. Cocok untuk seminar, workshop, dan perkuliahan.', NULL, '2025-07-01 00:00:00', '2025-07-01 00:00:00'),
(8, 2, 1, 'Auditorium Lantai 3', 'auditorium-lantai-3', 'images/products/auditorium_lt3.jpg', 500000, 'Auditorium besar dengan kapasitas 200 orang, dilengkapi dengan sistem audio profesional dan pencahayaan yang memadai.', NULL, '2025-07-01 01:00:00', '2025-07-01 01:00:00'),
(9, 6, 1, 'Laboratorium Komputer', 'laboratorium-komputer', 'images/products/lab_komputer.jpg', 300000, 'Laboratorium komputer dengan 30 unit PC, koneksi internet high speed, dan software lengkap untuk programming dan desain.', NULL, '2025-07-01 02:00:00', '2025-07-01 02:00:00'),
(10, 7, 1, 'Ruang Meeting Eksekutif', 'ruang-meeting-eksekutif', 'images/products/meeting_eksekutif.jpg', 250000, 'Ruang meeting mewah untuk 15 orang dengan meja bundar, AC, dan fasilitas video conference.', NULL, '2025-07-01 03:00:00', '2025-07-01 03:00:00'),
(11, 8, 1, 'Aula Serbaguna', 'aula-serbaguna', 'images/products/aula_serbaguna.jpg', 400000, 'Aula serbaguna untuk acara besar dengan kapasitas 300 orang, panggung, dan sistem audio yang powerful.', NULL, '2025-07-01 04:00:00', '2025-07-01 04:00:00'),
(12, 9, 1, 'Ruang Diskusi Kecil', 'ruang-diskusi-kecil', 'images/products/ruang_diskusi.jpg', 150000, 'Ruang diskusi intimate untuk 8-10 orang dengan whiteboard, AC, dan suasana yang nyaman.', NULL, '2025-07-01 05:00:00', '2025-07-01 05:00:00'),
(13, 10, 1, 'Lapangan Indoor', 'lapangan-indoor', 'images/products/lapangan_indoor.jpg', 350000, 'Lapangan indoor multifungsi untuk olahraga, acara outdoor, dan kegiatan fisik lainnya.', NULL, '2025-07-01 06:00:00', '2025-07-01 06:00:00'),
(14, 11, 1, 'Ruang Seminar Lantai 2', 'ruang-seminar-lantai-2', 'images/products/seminar_lt2.jpg', 280000, 'Ruang seminar modern dengan kapasitas 80 orang, fasilitas multimedia, dan tata ruang yang fleksibel.', NULL, '2025-07-01 07:00:00', '2025-07-01 07:00:00'),
(15, 12, 1, 'Studio Rekaman', 'studio-rekaman', 'images/products/studio_rekaman.jpg', 450000, 'Studio rekaman profesional dengan peralatan audio high-end, kedap suara, dan mixing console.', NULL, '2025-07-01 08:00:00', '2025-07-01 08:00:00'),
(16, 1, 1, 'Ruang Kelas Praktikum', 'ruang-kelas-praktikum', 'images/products/kelas_praktikum.jpg', 220000, 'Ruang kelas praktikum dengan meja lab, wastafel, dan peralatan praktikum dasar untuk 25 orang.', NULL, '2025-07-01 09:00:00', '2025-07-01 09:00:00'),
(17, 2, 2, 'Kamera DSLR Canon EOS 90D', 'kamera-dslr-canon-eos-90d', 'images/products/canon_eos_90d.jpg', 450000, 'Kamera DSLR professional dengan sensor APS-C 32.5MP, video 4K, dan sistem autofocus yang cepat.', NULL, '2025-07-02 00:00:00', '2025-07-02 00:00:00'),
(18, 6, 2, 'Laptop Gaming ASUS ROG', 'laptop-gaming-asus-rog', 'images/products/asus_rog.jpg', 380000, 'Laptop gaming high-end dengan RTX 4060, Intel i7, RAM 16GB, dan storage SSD 512GB.', NULL, '2025-07-02 01:00:00', '2025-07-02 01:00:00'),
(19, 7, 2, 'Sound System Portable', 'sound-system-portable', 'images/products/sound_system.jpg', 250000, 'Sound system portable dengan power 1000W, wireless microphone, dan bluetooth connectivity.', NULL, '2025-07-02 02:00:00', '2025-07-02 02:00:00'),
(20, 8, 2, 'Proyektor Epson EB-X51', 'proyektor-epson-eb-x51', 'images/products/epson_x51.jpg', 200000, 'Proyektor dengan brightness 3800 lumens, resolusi XGA, dan port HDMI untuk presentasi yang jernih.', NULL, '2025-07-02 03:00:00', '2025-07-02 03:00:00'),
(21, 9, 2, 'Drone DJI Mini 3 Pro', 'drone-dji-mini-3-pro', 'images/products/dji_mini3.jpg', 400000, 'Drone compact dengan kamera 4K, gimbal 3-axis, dan flight time hingga 34 menit.', NULL, '2025-07-02 04:00:00', '2025-07-02 04:00:00'),
(22, 10, 2, 'Tablet Grafis Wacom', 'tablet-grafis-wacom', 'images/products/wacom_tablet.jpg', 180000, 'Tablet grafis professional dengan pressure sensitivity 8192 levels dan area kerja yang luas.', NULL, '2025-07-02 05:00:00', '2025-07-02 05:00:00'),
(23, 11, 2, 'Microphone Shure SM58', 'microphone-shure-sm58', 'images/products/shure_sm58.jpg', 150000, 'Microphone dynamic professional dengan kualitas suara yang jernih dan tahan lama.', NULL, '2025-07-02 06:00:00', '2025-07-02 06:00:00'),
(24, 12, 2, 'Lighting Kit Studio', 'lighting-kit-studio', 'images/products/lighting_kit.jpg', 320000, 'Set lighting studio dengan 3 lampu LED, softbox, dan tripod untuk fotografi dan videografi.', NULL, '2025-07-02 07:00:00', '2025-07-02 07:00:00'),
(26, 2, 2, 'Printer 3D Ender 3', 'printer-3d-ender-3', 'images/products/ender3.jpg', 280000, 'Printer 3D dengan build volume 220x220x250mm, heated bed, dan hasil print yang presisi.', NULL, '2025-07-02 09:00:00', '2025-07-02 09:00:00'),
(27, 6, 3, 'Paket Alat Tulis Lengkap', 'paket-alat-tulis-lengkap', 'images/products/alat_tulis.jpg', 75000, 'Paket alat tulis lengkap berisi pulpen, pensil, spidol, penggaris, dan berbagai kebutuhan tulis menulis.', NULL, '2025-07-03 00:00:00', '2025-07-03 00:00:00'),
(28, 7, 3, 'Mesin Fotocopy Xerox', 'mesin-fotocopy-xerox', 'product_gambar/xerox.jpg', 200000, 'Mesin fotocopy multi-fungsi dengan fitur print, scan, dan copy dengan kecepatan tinggi.', NULL, '2025-07-03 01:00:00', '2025-07-03 01:00:00'),
(29, 8, 3, 'Kertas A4 Premium 1 Rim', 'kertas-a4-premium-1-rim', 'product_gambar/kertas_a4.jpg', 45000, 'Kertas A4 premium 80gsm, putih bersih, cocok untuk dokumen resmi dan presentasi.', NULL, '2025-07-03 02:00:00', '2025-07-03 02:00:00'),
(30, 9, 3, 'Tinta Printer Set CMYK', 'tinta-printer-set-cmyk', 'product_gambar/tinta_cmyk.jpg', 150000, 'Set tinta printer original dengan 4 warna (Cyan, Magenta, Yellow, Black) untuk hasil print berkualitas.', NULL, '2025-07-03 03:00:00', '2025-07-03 03:00:00'),
(31, 10, 3, 'Jilid Spiral dan Binding', 'jilid-spiral-dan-binding', 'product_gambar/jilid_spiral.jpg', 35000, 'Jasa jilid spiral dan binding untuk dokumen, proposal, dan laporan dengan hasil yang rapi.', NULL, '2025-07-03 04:00:00', '2025-07-03 04:00:00'),
(32, 11, 4, 'Website Company Profile', 'website-company-profile', 'product_gambar/website.jpg', 2500000, 'Pembuatan website company profile responsive dengan CMS, SEO friendly, dan design modern.', NULL, '2025-07-04 00:00:00', '2025-07-04 00:00:00'),
(33, 12, 4, 'Aplikasi Mobile Android', 'aplikasi-mobile-android', 'images/products/mobile_app.png', 3500000, 'Pengembangan aplikasi mobile Android native dengan UI/UX yang menarik dan performa optimal.', NULL, '2025-07-04 01:00:00', '2025-07-04 01:00:00'),
(34, 1, 4, 'Sistem Informasi Manajemen', 'sistem-informasi-manajemen', 'images/products/sistem_info.jpg', 5000000, 'Pengembangan sistem informasi manajemen custom sesuai kebutuhan bisnis dengan database yang robust.', NULL, '2025-07-04 02:00:00', '2025-07-04 02:00:00'),
(35, 2, 5, 'Konsultasi Bisnis Startup', 'konsultasi-bisnis-startup', 'images/products/konsultasi.jpg', 500000, 'Konsultasi bisnis untuk startup meliputi business plan, market analysis, dan strategi pengembangan.', NULL, '2025-07-05 00:00:00', '2025-07-05 00:00:00'),
(36, 6, 5, 'Workshop Kewirausahaan', 'workshop-kewirausahaan', 'images/products/workshop.jpg', 350000, 'Workshop kewirausahaan intensif selama 2 hari dengan materi praktis dan studi kasus nyata.', NULL, '2025-07-05 01:00:00', '2025-07-05 01:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `penjual_id` bigint UNSIGNED NOT NULL,
  `pembeli_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `booking_id` bigint UNSIGNED DEFAULT NULL,
  `jumlah_item` int UNSIGNED NOT NULL DEFAULT '1',
  `total_harga` bigint UNSIGNED NOT NULL,
  `status_transaksi` tinyint(1) NOT NULL DEFAULT '0',
  `bukti_bayar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `penjual_id`, `pembeli_id`, `product_id`, `booking_id`, `jumlah_item`, `total_harga`, `status_transaksi`, `bukti_bayar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 3, NULL, 1, 150000, 1, 'proofs/transaction1.jpg', NULL, '2025-07-10 07:31:40', NULL),
(3, 1, 2, 6, NULL, 2, 312400, 1, 'proofs/transaction2.jpg', NULL, '2025-07-10 07:29:17', NULL),
(4, 2, 1, 4, NULL, 1, 250000, 1, 'proofs/transaction3.jpg', NULL, '2025-07-06 10:56:53', NULL),
(20, 1, 2, 3, NULL, 1, 150000, 1, '', '2025-07-07 21:00:03', '2025-07-09 20:21:54', NULL),
(21, 2, 2, 4, NULL, 1, 125000, 0, '', '2025-07-07 21:05:20', '2025-07-07 21:05:20', NULL),
(22, 2, 2, 8, NULL, 1, 500000, 0, '', '2025-07-07 21:30:39', '2025-07-07 21:30:39', NULL),
(23, 6, 2, 36, NULL, 1, 350000, 0, '', '2025-07-09 12:53:27', '2025-07-09 12:53:27', NULL),
(24, 6, 2, 36, NULL, 1, 350000, 0, '', '2025-07-09 12:53:35', '2025-07-09 12:53:35', NULL),
(25, 2, 2, 5, NULL, 1, 320000, 0, 'bukti_bayar/efsy5zwRzA551EWG3JNV4L6Hg1kOC95rnUR9LxL9.jpg', '2025-07-09 13:00:06', '2025-07-09 13:00:25', NULL),
<<<<<<< HEAD
(26, 2, 1, 5, NULL, 1, 320000, 0, 'bukti_bayar/Pcis5f0X35Q5JKxzyFu9C6ZqmAjIyX3bQDi0oiQ1.jpg', '2025-07-09 13:49:21', '2025-07-09 13:50:43', NULL),
(27, 2, 34, 5, NULL, 1, 320000, 0, '', '2025-07-10 07:52:59', '2025-07-10 07:52:59', NULL),
(28, 2, 34, 5, NULL, 1, 320000, 0, '', '2025-07-10 07:55:50', '2025-07-10 07:55:50', NULL),
(29, 2, 34, 5, NULL, 1, 320000, 0, '', '2025-07-10 08:00:13', '2025-07-10 08:00:13', NULL),
(30, 1, 34, 34, NULL, 1, 5000000, 0, 'bukti_bayar/jaoBLW74gmouGSlybAXwbx3yXetwnw3ZvfR9y62L.jpg', '2025-07-10 08:02:14', '2025-07-10 08:03:56', NULL),
(31, 12, 34, 33, NULL, 1, 3500000, 0, '', '2025-07-10 08:13:02', '2025-07-10 08:13:02', NULL),
(32, 12, 34, 33, NULL, 1, 3500000, 0, '', '2025-07-10 08:14:09', '2025-07-10 08:14:09', NULL);
=======
(26, 2, 1, 5, NULL, 1, 320000, 0, 'bukti_bayar/Pcis5f0X35Q5JKxzyFu9C6ZqmAjIyX3bQDi0oiQ1.jpg', '2025-07-09 13:49:21', '2025-07-09 13:50:43', NULL);
>>>>>>> ef1fb95cd38ae2b8e6cf1822d105a6eb5eba3c7e

--
-- Triggers `transactions`
--
DELIMITER $$
CREATE TRIGGER `before_insert_transaction` BEFORE INSERT ON `transactions` FOR EACH ROW BEGIN
  DECLARE harga_produk BIGINT;
  SELECT harga INTO harga_produk FROM products WHERE id = NEW.product_id;
  SET NEW.total_harga = harga_produk * NEW.jumlah_item;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_update_transaction` BEFORE UPDATE ON `transactions` FOR EACH ROW BEGIN
  DECLARE harga_produk BIGINT;
  
  -- Ambil harga produk
  SELECT harga INTO harga_produk FROM products WHERE id = NEW.product_id;
  
  -- Hitung ulang total_harga
  SET NEW.total_harga = harga_produk * NEW.jumlah_item;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `unit_bisnis`
--

CREATE TABLE `unit_bisnis` (
  `id` bigint UNSIGNED NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_bisnis`
--

INSERT INTO `unit_bisnis` (`id`, `gambar`, `nama_unit`, `slug`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'images/gambar_ruangan.png', 'Ruangan', 'ruangan', 'Unit ini bertanggung jawab atas pengelolaan ruang-ruang yang tersedia di lingkungan kampus, seperti ruang kelas, laboratorium, aula, dan lahan yang dapat disewakan.', '2025-06-09 03:09:44', '2025-06-09 03:09:44'),
(2, 'images/gambar_inventaris.png', 'Inventaris', 'inventaris', '', '2025-06-09 03:09:44', '2025-06-09 03:09:44'),
(3, 'images/gambar_atk_print.png', 'Alat Tulis & Printing', 'atk_print', '', '2025-06-09 03:24:58', '2025-06-09 03:24:58'),
(4, 'images/gambar_software.png', 'Pengembangan Software', 'software', '', '2025-06-09 03:24:58', '2025-06-09 03:24:58'),
(5, 'images/gambar_kewirausahaan.png', 'Kewirausahaan', 'kewirausahaan', '', '2025-06-09 03:24:58', '2025-06-09 03:24:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role` enum('admin','penjual','pembeli') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pembeli',
  `tipe_pembeli` enum('internal','eksternal') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'eksternal',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik_nim` bigint UNSIGNED NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` bigint UNSIGNED NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
<<<<<<< HEAD
=======
  `nama_bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_akun_bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_rekening` bigint NOT NULL,
>>>>>>> ef1fb95cd38ae2b8e6cf1822d105a6eb5eba3c7e
  `surat_persetujuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

<<<<<<< HEAD
INSERT INTO `users` (`id`, `role`, `tipe_pembeli`, `name`, `email`, `nik_nim`, `password`, `no_hp`, `alamat`, `surat_persetujuan`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'eksternal', 'arimbi', 'arimbi@mail.com', 2308561112, '$2y$10$pn/guB49fWywAstAA9qGKugvhf45ir1jkhPHUgJWZDpUOTGp1nIB2', 87781537172, 'ayani utara', NULL, NULL, 'RDeSRtl9Oy7KVjyiWww2oqRW5EJ7Oc4cHRP5TcvpwICISw28NFMtBkFB4tug', '2025-06-09 13:40:07', '2025-06-09 13:40:07'),
(2, 'penjual', 'eksternal', 'Raka Pradipta', 'raka.pradipta@student.com', 2205551010, '$2y$10$fGsB3u4CzRY1evMghrsrYO8HrL4H/wk3T8c8UuwYUO9/G.L57dgvK', 81234567890, 'Jl. Mawar No. 123, Denpasar, Bali', NULL, NULL, 'u2w4xGz0kwjj3EpxOEbFQBLVYLI1aY3KLwiTEO0K9z96Q1U2GExzOCTvdK9p', '2025-06-23 15:48:43', '2025-06-23 15:48:43'),
(3, 'admin', 'internal', ' Made Sukarsa', 'made.sukarsa@unud.ac.id', 5171041208850003, '$2y$10$pn/guB49fWywAstAA9qGKugvhf45ir1jkhPHUgJWZDpUOTGp1nIB2', 81234567890, 'Jl. Raya Kampus Unud, Jimbaran, Bali', NULL, NULL, NULL, NULL, NULL),
(4, 'admin', 'internal', 'Ketut Gede Dharma Putra', 'ketut.dharma@student.unud.ac.id', 1980041502, '$2y$10$pn/guB49fWywAstAA9qGKugvhf45ir1jkhPHUgJWZDpUOTGp1nIB2', 81987654321, 'Jl. Sudirman No. 15, Denpasar, Bali', NULL, NULL, NULL, NULL, NULL),
(5, 'admin', 'internal', 'Gede Jaya', 'gede.jaya@student.unud.ac.id', 1975031201, '$2y$10$pn/guB49fWywAstAA9qGKugvhf45ir1jkhPHUgJWZDpUOTGp1nIB2', 87765432109, 'Jl. Teuku Umar No. 28, Denpasar, Bali', NULL, NULL, NULL, NULL, NULL),
(6, 'penjual', 'internal', 'Putu Agus Divayana', 'agus.wirawan@gmail.com', 2090071505, '$2y$10$fGsB3u4CzRY1evMghrsrYO8HrL4H/wk3T8c8UuwYUO9/G.L57dgvK', 81345678901, 'Jl. Gatot Subroto No. 45, Denpasar, Bali', NULL, NULL, NULL, NULL, NULL),
(7, 'penjual', 'internal', 'Ni Luh Putu Sari', 'sari.bali@yahoo.com', 2492091707, '$2y$10$fGsB3u4CzRY1evMghrsrYO8HrL4H/wk3T8c8UuwYUO9/G.L57dgvK', 82456789012, 'Jl. Raya Sesetan No. 196, Denpasar, Bali', NULL, NULL, NULL, NULL, NULL),
(8, 'penjual', 'eksternal', 'I Wayan Gunawan', 'gunawan.tech@outlook.com', 5171041208880006, '$2y$10$fGsB3u4CzRY1evMghrsrYO8HrL4H/wk3T8c8UuwYUO9/G.L57dgvK', 83567890123, 'Jl. Diponegoro No. 67, Denpasar, Bali', NULL, NULL, NULL, NULL, NULL),
(9, 'penjual', 'eksternal', 'Putu Ayu Lestari', 'lestari.creative@gmail.com', 5171042208920007, '$2y$10$fGsB3u4CzRY1evMghrsrYO8HrL4H/wk3T8c8UuwYUO9/G.L57dgvK', 84678901234, 'Jl. Margonda Raya, Depok, Jawa Barat', NULL, NULL, NULL, NULL, NULL),
(10, 'penjual', 'eksternal', 'Made Indra Permana', 'indra.permana@hotmail.com', 5171041208870008, '$2y$10$fGsB3u4CzRY1evMghrsrYO8HrL4H/wk3T8c8UuwYUO9/G.L57dgvK', 85789012345, 'Jl. Grafika No. 2, Yogyakarta', NULL, NULL, NULL, NULL, NULL),
(11, 'penjual', 'internal', 'Komang Tri Wahyuni', 'tri.wahyuni@gmail.com', 2391111909, '$2y$10$fGsB3u4CzRY1evMghrsrYO8HrL4H/wk3T8c8UuwYUO9/G.L57dgvK', 86890123456, 'Jl. Kartini No. 56, Denpasar, Bali', NULL, NULL, NULL, NULL, NULL),
(12, 'penjual', 'internal', 'Gede Yoga Pratama', 'yoga.pratama@mail.com', 2392091707, '$2y$10$fGsB3u4CzRY1evMghrsrYO8HrL4H/wk3T8c8UuwYUO9/G.L57dgvK', 87901234567, 'Jl. Dharmawangsa Dalam, Surabaya, Jawa Timur', NULL, NULL, NULL, NULL, NULL),
(13, 'pembeli', 'eksternal', 'Andi Prasetyo', 'andi.prasetyo@gmail.com', 3173051208950011, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 81123456789, 'Jl. Kebon Jeruk No. 12, Jakarta Barat', NULL, NULL, NULL, NULL, NULL),
(14, 'pembeli', 'eksternal', 'Sari Dewi Maharani', 'sari.maharani@yahoo.com', 3374062208920012, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 82234567890, 'Jl. Malioboro No. 45, Yogyakarta', NULL, NULL, NULL, NULL, NULL),
(15, 'pembeli', 'eksternal', 'Bayu Satria Wibowo', 'bayu.satria@hotmail.com', 3275031208880013, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 83345678901, 'Jl. Asia Afrika No. 67, Bandung', NULL, NULL, NULL, NULL, NULL),
(16, 'pembeli', 'eksternal', 'Fitri Nur Azizah', 'fitri.azizah@gmail.com', 3578042208940014, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 84456789012, 'Jl. Tunjungan No. 89, Surabaya', NULL, NULL, NULL, NULL, NULL),
(17, 'pembeli', 'eksternal', 'Dimas Eka Putra', 'dimas.eka@outlook.com', 3326051208900015, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 85567890123, 'Jl. Sudirman No. 23, Semarang', NULL, NULL, NULL, NULL, NULL),
(18, 'pembeli', 'eksternal', 'Rina Safitri', 'rina.safitri@yahoo.com', 1371062208930016, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 86678901234, 'Jl. Jenderal Sudirman No. 34, Medan', NULL, NULL, NULL, NULL, NULL),
(19, 'pembeli', 'eksternal', 'Rudi Hermawan', 'rudi.hermawan@gmail.com', 5201071208910017, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 87789012345, 'Jl. Pattimura No. 56, Makassar', NULL, NULL, NULL, NULL, NULL),
(20, 'pembeli', 'eksternal', 'Indira Kusuma', 'indira.kusuma@mail.com', 6471082208890018, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 88890123456, 'Jl. Ahmad Yani No. 78, Samarinda', NULL, NULL, NULL, NULL, NULL),
(21, 'pembeli', 'eksternal', 'Agung Nugraha', 'agung.nugraha@gmail.com', 3471091208920019, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 89901234567, 'Jl. Diponegoro No. 90, Solo', NULL, NULL, NULL, NULL, NULL),
(22, 'pembeli', 'eksternal', 'Maya Sari Utami', 'maya.sari@hotmail.com', 3216102208940020, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 81012345678, 'Jl. Cihampelas No. 12, Bandung', NULL, NULL, NULL, NULL, NULL),
(23, 'pembeli', 'eksternal', 'Faisal Rahman', 'faisal.rahman@gmail.com', 3674111208900021, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 82123456789, 'Jl. Malang No. 34, Depok', NULL, NULL, NULL, NULL, NULL),
(24, 'pembeli', 'eksternal', 'Dewi Ratna Sari', 'dewi.ratna@yahoo.com', 3313122208930022, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 83234567890, 'Jl. Pemuda No. 56, Cilacap', NULL, NULL, NULL, NULL, NULL),
(25, 'pembeli', 'eksternal', 'Arief Budiman', 'arief.budiman@outlook.com', 3517011208880023, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 84345678901, 'Jl. Basuki Rahmat No. 78, Surabaya', NULL, NULL, NULL, NULL, NULL),
(26, 'pembeli', NULL, 'Lina Fitriani', 'lina.fitriani@gmail.com', 1472022208920024, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 85456789012, 'Jl. Gajah Mada No. 90, Pekanbaru', NULL, NULL, NULL, NULL, NULL),
(27, 'pembeli', NULL, 'Hendra Wijaya', 'hendra.wijaya@mail.com', 3603031208910025, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 86567890123, 'Jl. Diponegoro No. 123, Banjarbaru', NULL, NULL, NULL, NULL, NULL),
(28, 'pembeli', 'internal', 'theresia', 'theresia@student.unud.ac.id', 2308561076, 'there', 8789345678, 'Jl. Kampus Unud', NULL, NULL, NULL, NULL, NULL),
(29, 'pembeli', 'internal', 'Theresia', 'there@student.unud.ac.id', 230856076, 'there', 87654321234, 'Jl. Kampus Unud', NULL, NULL, NULL, NULL, NULL),
(31, 'pembeli', 'eksternal', 'Theresia', 'there@mail.com', 230856076, 'there', 87654321234, 'Jl. Kampus Unud', NULL, NULL, NULL, NULL, NULL),
(32, 'pembeli', 'internal', 'Dewa Made Perantara', 'perantara@unud.ac.id', 2105551001, '$2y$10$QNfvJV4A8KkDPU2gT4Dd0.VnYxoADtre4BesQs5bY3ag/pjlhXeLO', 81234567890, 'Denpasar, Bali', NULL, NULL, NULL, '2025-07-09 10:27:02', '2025-07-09 10:27:02'),
(33, 'pembeli', 'internal', 'arimbi', 'arimbiws@student.unud.ac.id', 23456778, '$2y$10$2CuZK4Pq555tNN6hzIT5MuwbNepYZYnT/DcMCtgqAwQZmkJrzfCsm', 23456789, 'jimbaran', NULL, NULL, NULL, '2025-07-09 20:16:09', '2025-07-09 20:16:09'),
(34, 'pembeli', 'eksternal', 'there', 'there@yahoo.com', 234349342342, '$2y$10$3RboGDlS0nr4Cy/Lvjepceo0H1wTxmTqhZaC8LinnMG5ULOMa9Xha', 30898978754, 'jallsansasd', NULL, NULL, NULL, '2025-07-10 07:50:13', '2025-07-10 07:50:13');
=======
INSERT INTO `users` (`id`, `role`, `tipe_pembeli`, `name`, `email`, `nik_nim`, `password`, `no_hp`, `alamat`, `nama_bank`, `nama_akun_bank`, `nomor_rekening`, `surat_persetujuan`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'eksternal', 'arimbi', 'arimbi@mail.com', 2308561112, '$2y$10$pn/guB49fWywAstAA9qGKugvhf45ir1jkhPHUgJWZDpUOTGp1nIB2', 87781537172, 'ayani utara', 'BRI', 'ARIMBI', 789012345678, NULL, NULL, 'vZ2WQNOqOKQP6nBr2ebc2fp3GrE5JnbSzyvOtrS8i8x0TttoFGKNsNTrOsJk', '2025-06-09 13:40:07', '2025-06-09 13:40:07'),
(2, 'penjual', 'internal', 'Raka Pradipta', 'raka.pradipta@student.com', 2205551010, '$2y$10$fGsB3u4CzRY1evMghrsrYO8HrL4H/wk3T8c8UuwYUO9/G.L57dgvK', 81234567890, 'Jl. Mawar No. 123, Denpasar, Bali', 'BNI', 'RAKA PRADIPTA', 789012345678, NULL, NULL, 'nCMhcmpfchVjaRtrv0Ehh95PtEQZEhC4kHarlyjxdVPPR9lha5x33WrsWxDK', '2025-06-23 15:48:43', '2025-06-23 15:48:43'),
(3, 'admin', 'internal', ' Made Sukarsa', 'made.sukarsa@unud.ac.id', 5171041208850003, '$2y$10$pn/guB49fWywAstAA9qGKugvhf45ir1jkhPHUgJWZDpUOTGp1nIB2', 81234567890, 'Jl. Raya Kampus Unud, Jimbaran, Bali', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(4, 'admin', 'internal', 'Ketut Gede Dharma Putra', 'ketut.dharma@student.unud.ac.id', 1980041502, '$2y$10$pn/guB49fWywAstAA9qGKugvhf45ir1jkhPHUgJWZDpUOTGp1nIB2', 81987654321, 'Jl. Sudirman No. 15, Denpasar, Bali', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(5, 'admin', 'internal', 'Gede Jaya', 'gede.jaya@student.unud.ac.id', 1975031201, '$2y$10$pn/guB49fWywAstAA9qGKugvhf45ir1jkhPHUgJWZDpUOTGp1nIB2', 87765432109, 'Jl. Teuku Umar No. 28, Denpasar, Bali', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(6, 'penjual', 'internal', 'Putu Agus Divayana', 'agus.wirawan@gmail.com', 2090071505, '$2y$10$fGsB3u4CzRY1evMghrsrYO8HrL4H/wk3T8c8UuwYUO9/G.L57dgvK', 81345678901, 'Jl. Gatot Subroto No. 45, Denpasar, Bali', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(7, 'penjual', 'internal', 'Ni Luh Putu Sari', 'sari.bali@yahoo.com', 2492091707, '$2y$10$fGsB3u4CzRY1evMghrsrYO8HrL4H/wk3T8c8UuwYUO9/G.L57dgvK', 82456789012, 'Jl. Raya Sesetan No. 196, Denpasar, Bali', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(8, 'penjual', 'eksternal', 'I Wayan Gunawan', 'gunawan.tech@outlook.com', 5171041208880006, '$2y$10$fGsB3u4CzRY1evMghrsrYO8HrL4H/wk3T8c8UuwYUO9/G.L57dgvK', 83567890123, 'Jl. Diponegoro No. 67, Denpasar, Bali', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(9, 'penjual', 'eksternal', 'Putu Ayu Lestari', 'lestari.creative@gmail.com', 5171042208920007, '$2y$10$fGsB3u4CzRY1evMghrsrYO8HrL4H/wk3T8c8UuwYUO9/G.L57dgvK', 84678901234, 'Jl. Margonda Raya, Depok, Jawa Barat', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(10, 'penjual', 'eksternal', 'Made Indra Permana', 'indra.permana@hotmail.com', 5171041208870008, '$2y$10$fGsB3u4CzRY1evMghrsrYO8HrL4H/wk3T8c8UuwYUO9/G.L57dgvK', 85789012345, 'Jl. Grafika No. 2, Yogyakarta', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(11, 'penjual', 'internal', 'Komang Tri Wahyuni', 'tri.wahyuni@gmail.com', 2391111909, '$2y$10$fGsB3u4CzRY1evMghrsrYO8HrL4H/wk3T8c8UuwYUO9/G.L57dgvK', 86890123456, 'Jl. Kartini No. 56, Denpasar, Bali', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(12, 'penjual', 'internal', 'Gede Yoga Pratama', 'yoga.pratama@mail.com', 2392091707, '$2y$10$fGsB3u4CzRY1evMghrsrYO8HrL4H/wk3T8c8UuwYUO9/G.L57dgvK', 87901234567, 'Jl. Dharmawangsa Dalam, Surabaya, Jawa Timur', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(13, 'pembeli', 'eksternal', 'Andi Prasetyo', 'andi.prasetyo@gmail.com', 3173051208950011, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 81123456789, 'Jl. Kebon Jeruk No. 12, Jakarta Barat', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(14, 'pembeli', 'eksternal', 'Sari Dewi Maharani', 'sari.maharani@yahoo.com', 3374062208920012, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 82234567890, 'Jl. Malioboro No. 45, Yogyakarta', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(15, 'pembeli', 'eksternal', 'Bayu Satria Wibowo', 'bayu.satria@hotmail.com', 3275031208880013, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 83345678901, 'Jl. Asia Afrika No. 67, Bandung', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(16, 'pembeli', 'eksternal', 'Fitri Nur Azizah', 'fitri.azizah@gmail.com', 3578042208940014, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 84456789012, 'Jl. Tunjungan No. 89, Surabaya', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(17, 'pembeli', 'eksternal', 'Dimas Eka Putra', 'dimas.eka@outlook.com', 3326051208900015, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 85567890123, 'Jl. Sudirman No. 23, Semarang', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(18, 'pembeli', 'eksternal', 'Rina Safitri', 'rina.safitri@yahoo.com', 1371062208930016, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 86678901234, 'Jl. Jenderal Sudirman No. 34, Medan', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(19, 'pembeli', 'eksternal', 'Rudi Hermawan', 'rudi.hermawan@gmail.com', 5201071208910017, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 87789012345, 'Jl. Pattimura No. 56, Makassar', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(20, 'pembeli', 'eksternal', 'Indira Kusuma', 'indira.kusuma@mail.com', 6471082208890018, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 88890123456, 'Jl. Ahmad Yani No. 78, Samarinda', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(21, 'pembeli', 'eksternal', 'Agung Nugraha', 'agung.nugraha@gmail.com', 3471091208920019, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 89901234567, 'Jl. Diponegoro No. 90, Solo', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(22, 'pembeli', 'eksternal', 'Maya Sari Utami', 'maya.sari@hotmail.com', 3216102208940020, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 81012345678, 'Jl. Cihampelas No. 12, Bandung', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(23, 'pembeli', 'eksternal', 'Faisal Rahman', 'faisal.rahman@gmail.com', 3674111208900021, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 82123456789, 'Jl. Malang No. 34, Depok', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(24, 'pembeli', 'eksternal', 'Dewi Ratna Sari', 'dewi.ratna@yahoo.com', 3313122208930022, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 83234567890, 'Jl. Pemuda No. 56, Cilacap', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(25, 'pembeli', 'eksternal', 'Arief Budiman', 'arief.budiman@outlook.com', 3517011208880023, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 84345678901, 'Jl. Basuki Rahmat No. 78, Surabaya', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(26, 'pembeli', NULL, 'Lina Fitriani', 'lina.fitriani@gmail.com', 1472022208920024, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 85456789012, 'Jl. Gajah Mada No. 90, Pekanbaru', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(27, 'pembeli', NULL, 'Hendra Wijaya', 'hendra.wijaya@mail.com', 3603031208910025, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 86567890123, 'Jl. Diponegoro No. 123, Banjarbaru', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(28, 'pembeli', 'internal', 'theresia', 'theresia@student.unud.ac.id', 2308561076, 'there', 8789345678, 'Jl. Kampus Unud', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(29, 'pembeli', 'internal', 'Theresia', 'there@student.unud.ac.id', 230856076, 'there', 87654321234, 'Jl. Kampus Unud', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(31, 'pembeli', 'eksternal', 'Theresia', 'there@mail.com', 230856076, 'there', 87654321234, 'Jl. Kampus Unud', '', '', 0, NULL, NULL, NULL, NULL, NULL),
(32, 'pembeli', 'internal', 'Dewa Made Perantara', 'perantara@unud.ac.id', 2105551001, '$2y$10$QNfvJV4A8KkDPU2gT4Dd0.VnYxoADtre4BesQs5bY3ag/pjlhXeLO', 81234567890, 'Denpasar, Bali', 'BNI', 'DEWA MADE PERANTARA', 1234567890, NULL, NULL, NULL, '2025-07-09 10:27:02', '2025-07-09 10:27:02'),
(33, 'pembeli', 'internal', 'arimbi', 'arimbiws@student.unud.ac.id', 23456778, '$2y$10$2CuZK4Pq555tNN6hzIT5MuwbNepYZYnT/DcMCtgqAwQZmkJrzfCsm', 23456789, 'jimbaran', 'BCA', 'Arimbi irasetya', 23456789, NULL, NULL, NULL, '2025-07-09 20:16:09', '2025-07-09 20:16:09');
>>>>>>> ef1fb95cd38ae2b8e6cf1822d105a6eb5eba3c7e

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `isi_tipe_pembeli` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
  IF NEW.email LIKE '%@student.unud.ac.id' OR NEW.nik_nim REGEXP '^[0-9]{10}$' THEN
    SET NEW.tipe_pembeli = 'internal';
  ELSE
    SET NEW.tipe_pembeli = 'eksternal';
  END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_id` (`product_id`,`tanggal_mulai`,`tanggal_kembali`),
  ADD KEY `user_id` (`pembeli_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`,`penjual_id`),
  ADD KEY `products_penjual_id_foreign` (`penjual_id`),
  ADD KEY `products_unit_bisnis_id_foreign` (`unit_bisnis_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_product_id_foreign` (`product_id`),
  ADD KEY `transactions_penjual_id_foreign` (`penjual_id`),
  ADD KEY `transactions_pembeli_id_foreign` (`pembeli_id`),
  ADD KEY `fk_transactions_booking` (`booking_id`);

--
-- Indexes for table `unit_bisnis`
--
ALTER TABLE `unit_bisnis`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
<<<<<<< HEAD
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
=======
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
>>>>>>> ef1fb95cd38ae2b8e6cf1822d105a6eb5eba3c7e

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
<<<<<<< HEAD
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
=======
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
>>>>>>> ef1fb95cd38ae2b8e6cf1822d105a6eb5eba3c7e

--
-- AUTO_INCREMENT for table `unit_bisnis`
--
ALTER TABLE `unit_bisnis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
<<<<<<< HEAD
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
=======
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
>>>>>>> ef1fb95cd38ae2b8e6cf1822d105a6eb5eba3c7e

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`pembeli_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_penjual_id_foreign` FOREIGN KEY (`penjual_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_unit_bisnis_id_foreign` FOREIGN KEY (`unit_bisnis_id`) REFERENCES `unit_bisnis` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_transactions_booking` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `transactions_pembeli_id_foreign` FOREIGN KEY (`pembeli_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_penjual_id_foreign` FOREIGN KEY (`penjual_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
