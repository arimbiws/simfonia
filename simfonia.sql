-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
<<<<<<< HEAD
-- Generation Time: Jul 08, 2025 at 12:30 AM
=======
-- Generation Time: Jul 07, 2025 at 03:41 PM
>>>>>>> c8c56114ff07f745749ed958fe6e542e7efd01a1
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
<<<<<<< HEAD
  `pembeli_id` bigint UNSIGNED NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` enum('pending','disetujui','ditolak','sedang digunakan','pengembalian','selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `nama_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `surat_pengajuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
=======
  `user_id` bigint UNSIGNED NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `nama_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `surat_pengajuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','disetujui','ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
>>>>>>> c8c56114ff07f745749ed958fe6e542e7efd01a1
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

<<<<<<< HEAD
INSERT INTO `bookings` (`id`, `product_id`, `pembeli_id`, `tanggal_mulai`, `tanggal_kembali`, `status`, `nama_kegiatan`, `instansi`, `email`, `nama_lengkap`, `no_hp`, `alamat`, `surat_pengajuan`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2025-07-10', '2025-07-11', 'pending', 'Seminar Nasional AI', 'Universitas Udayana', 'arimbi@mail.com', 'Arimbi WS', '087781537172', 'Jl. Ayani Utara', 'uploads/surat_ajuan_ai.pdf', '2025-07-07 11:42:28', '2025-07-07 11:42:28');

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
=======
INSERT INTO `bookings` (`id`, `product_id`, `user_id`, `tanggal_mulai`, `tanggal_selesai`, `nama_kegiatan`, `instansi`, `nama_lengkap`, `email`, `no_hp`, `alamat`, `surat_pengajuan`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2025-07-10', '2025-07-11', 'Seminar Nasional AI', 'Universitas Udayana', 'Arimbi WS', 'arimbi@mail.com', '087781537172', 'Jl. Ayani Utara', 'uploads/surat_ajuan_ai.pdf', 'pending', '2025-07-07 11:42:28', '2025-07-07 11:42:28');
>>>>>>> c8c56114ff07f745749ed958fe6e542e7efd01a1

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
<<<<<<< HEAD
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
(25, 1, 2, 'Scanner Dokumen Canon', 'scanner-dokumen-canon', 'images/products/scanner_canon.jpg', 120000, 'Scanner dokumen high-speed dengan duplex scanning dan OCR software untuk digitalisasi dokumen.', NULL, '2025-07-02 08:00:00', '2025-07-02 08:00:00'),
(26, 2, 2, 'Printer 3D Ender 3', 'printer-3d-ender-3', 'images/products/ender3.jpg', 280000, 'Printer 3D dengan build volume 220x220x250mm, heated bed, dan hasil print yang presisi.', NULL, '2025-07-02 09:00:00', '2025-07-02 09:00:00'),
(27, 6, 3, 'Paket Alat Tulis Lengkap', 'paket-alat-tulis-lengkap', 'images/products/alat_tulis.jpg', 75000, 'Paket alat tulis lengkap berisi pulpen, pensil, spidol, penggaris, dan berbagai kebutuhan tulis menulis.', NULL, '2025-07-03 00:00:00', '2025-07-03 00:00:00'),
(28, 7, 3, 'Mesin Fotocopy Xerox', 'mesin-fotocopy-xerox', 'product_gambar/xerox.jpg', 200000, 'Mesin fotocopy multi-fungsi dengan fitur print, scan, dan copy dengan kecepatan tinggi.', NULL, '2025-07-03 01:00:00', '2025-07-03 01:00:00'),
(29, 8, 3, 'Kertas A4 Premium 1 Rim', 'kertas-a4-premium-1-rim', 'product_gambar/kertas_a4.jpg', 45000, 'Kertas A4 premium 80gsm, putih bersih, cocok untuk dokumen resmi dan presentasi.', NULL, '2025-07-03 02:00:00', '2025-07-03 02:00:00'),
(30, 9, 3, 'Tinta Printer Set CMYK', 'tinta-printer-set-cmyk', 'product_gambar/tinta_cmyk.jpg', 150000, 'Set tinta printer original dengan 4 warna (Cyan, Magenta, Yellow, Black) untuk hasil print berkualitas.', NULL, '2025-07-03 03:00:00', '2025-07-03 03:00:00'),
(31, 10, 3, 'Jilid Spiral dan Binding', 'jilid-spiral-dan-binding', 'product_gambar/jilid_spiral.jpg', 35000, 'Jasa jilid spiral dan binding untuk dokumen, proposal, dan laporan dengan hasil yang rapi.', NULL, '2025-07-03 04:00:00', '2025-07-03 04:00:00'),
(32, 11, 4, 'Website Company Profile', 'website-company-profile', 'product_gambar/website.jpg', 2500000, 'Pembuatan website company profile responsive dengan CMS, SEO friendly, dan design modern.', NULL, '2025-07-04 00:00:00', '2025-07-04 00:00:00'),
(33, 12, 4, 'Aplikasi Mobile Android', 'aplikasi-mobile-android', 'product_gambar/mobile_app.jpg', 3500000, 'Pengembangan aplikasi mobile Android native dengan UI/UX yang menarik dan performa optimal.', NULL, '2025-07-04 01:00:00', '2025-07-04 01:00:00'),
(34, 1, 4, 'Sistem Informasi Manajemen', 'sistem-informasi-manajemen', 'product_gambar/sistem_info.jpg', 5000000, 'Pengembangan sistem informasi manajemen custom sesuai kebutuhan bisnis dengan database yang robust.', NULL, '2025-07-04 02:00:00', '2025-07-04 02:00:00'),
(35, 2, 5, 'Konsultasi Bisnis Startup', 'konsultasi-bisnis-startup', 'product_gambar/konsultasi.jpg', 500000, 'Konsultasi bisnis untuk startup meliputi business plan, market analysis, dan strategi pengembangan.', NULL, '2025-07-05 00:00:00', '2025-07-05 00:00:00'),
(36, 6, 5, 'Workshop Kewirausahaan', 'workshop-kewirausahaan', 'product_gambar/workshop.jpg', 350000, 'Workshop kewirausahaan intensif selama 2 hari dengan materi praktis dan studi kasus nyata.', NULL, '2025-07-05 01:00:00', '2025-07-05 01:00:00');
=======
(3, 1, 1, 'Ruang Lobby Dekanat FMIPA', '', 'product_gambar/OQNchw8eDmGW7rKiLgjU1Nl1zXkZsWWHtojLvaAJ.jpg', 150000, '\"Ruangan\" dalam bahasa Indonesia merujuk pada sebuah tempat atau area yang dibatasi oleh dinding dan memiliki fungsi tertentu. Bisa berupa kamar di dalam rumah, kelas di sekolah, atau area yang lebih luas seperti auditorium.', NULL, '2025-07-05 23:49:56', '2025-07-05 23:49:56'),
(4, 2, 1, 'Gedung Lama Informatika', '', 'product_gambar/CjuLoGWFzhKaD3g5BqC6TZNiGFLJE1KILrcUjQVW.jpg', 125000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '2025-07-06 08:23:26', '2025-07-06 08:23:26'),
(5, 2, 2, 'Proyektor Infocus In124-3200', '', 'product_gambar/ECmzUWkFONL8F39L6VHylK9YoQc81RwrY4a3LeKh.jpg', 320000, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', NULL, '2025-07-06 10:39:07', '2025-07-06 10:39:07'),
(6, 1, 2, 'TIK - Alat Ketik Tradisional', '', 'product_gambar/L7fdJbgjGfvUuvrWI2joEnD2ft0JjxGOOBxAAr4b.jpg', 156200, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', NULL, '2025-07-06 10:40:30', '2025-07-06 10:40:30');
>>>>>>> c8c56114ff07f745749ed958fe6e542e7efd01a1

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `penjual_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `pembeli_id` bigint UNSIGNED NOT NULL,
  `jumlah_item` int UNSIGNED NOT NULL DEFAULT '1',
  `total_harga` bigint UNSIGNED NOT NULL,
  `status_transaksi` tinyint(1) NOT NULL DEFAULT '0',
  `bukti_bayar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

<<<<<<< HEAD
INSERT INTO `transactions` (`id`, `penjual_id`, `product_id`, `pembeli_id`, `jumlah_item`, `total_harga`, `status_transaksi`, `bukti_bayar`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 2, 1, 150000, 0, 'proofs/transaction1.jpg', NULL, NULL, NULL),
(3, 1, 6, 2, 2, 312400, 0, 'proofs/transaction2.jpg', NULL, NULL, NULL),
(4, 2, 4, 1, 1, 250000, 1, 'proofs/transaction3.jpg', NULL, NULL, '2025-07-06 10:56:53'),
(5, 2, 7, 13, 2, 400000, 0, 'proofs/t5.jpg', NULL, '2025-07-07 23:38:43', '2025-07-07 23:38:43'),
(6, 3, 9, 14, 1, 300000, 1, 'proofs/t6.jpg', NULL, '2025-07-07 23:47:09', '2025-07-07 23:47:09'),
(7, 6, 10, 15, 2, 500000, 0, 'proofs/t7.jpg', NULL, '2025-07-07 23:47:09', '2025-07-07 23:47:09'),
(8, 7, 11, 16, 1, 400000, 0, 'proofs/t8.jpg', NULL, '2025-07-07 23:47:09', '2025-07-07 23:47:09'),
(9, 8, 12, 17, 1, 150000, 1, 'proofs/t9.jpg', NULL, '2025-07-07 23:47:09', '2025-07-07 23:47:09'),
(10, 9, 13, 18, 1, 350000, 1, 'proofs/t10.jpg', NULL, '2025-07-07 23:47:09', '2025-07-07 23:47:09'),
(11, 10, 14, 19, 3, 840000, 1, 'proofs/t11.jpg', NULL, '2025-07-07 23:47:09', '2025-07-07 23:47:09'),
(12, 11, 15, 20, 1, 450000, 1, 'proofs/t12.jpg', NULL, '2025-07-07 23:47:09', '2025-07-07 23:47:09'),
(13, 12, 16, 21, 1, 220000, 1, 'proofs/t13.jpg', NULL, '2025-07-07 23:47:09', '2025-07-07 23:47:09'),
(14, 2, 17, 22, 1, 450000, 1, 'proofs/t14.jpg', NULL, '2025-07-07 23:47:09', '2025-07-07 23:47:09'),
(15, 3, 18, 23, 1, 380000, 1, 'proofs/t15.jpg', NULL, '2025-07-07 23:47:09', '2025-07-07 23:47:09'),
(16, 6, 19, 24, 2, 500000, 1, 'proofs/t16.jpg', NULL, '2025-07-07 23:47:09', '2025-07-07 23:47:09'),
(17, 7, 20, 25, 1, 200000, 1, 'proofs/t17.jpg', NULL, '2025-07-07 23:47:09', '2025-07-07 23:47:09'),
(18, 8, 21, 26, 1, 400000, 1, 'proofs/t18.jpg', NULL, '2025-07-07 23:47:09', '2025-07-07 23:47:09'),
(19, 9, 22, 27, 1, 180000, 1, 'proofs/t19.jpg', NULL, '2025-07-07 23:47:09', '2025-07-07 23:47:09');

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
=======
INSERT INTO `transactions` (`id`, `penjual_id`, `product_id`, `pembeli_id`, `total_harga`, `status_transaksi`, `bukti_bayar`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 2, 150000, 0, 'proofs/transaction1.jpg', NULL, NULL, NULL),
(3, 1, 6, 2, 312400, 0, 'proofs/transaction2.jpg', NULL, NULL, NULL),
(4, 2, 4, 1, 250000, 1, 'proofs/transaction3.jpg', NULL, NULL, '2025-07-06 10:56:53');
>>>>>>> c8c56114ff07f745749ed958fe6e542e7efd01a1

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
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik_nim` bigint UNSIGNED NOT NULL,
  `no_hp` bigint UNSIGNED NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

<<<<<<< HEAD
INSERT INTO `users` (`id`, `role`, `tipe_pembeli`, `name`, `email`, `password`, `nik_nim`, `no_hp`, `alamat`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, 'arimbi', 'arimbi@mail.com', '$2y$10$pn/guB49fWywAstAA9qGKugvhf45ir1jkhPHUgJWZDpUOTGp1nIB2', 2308561112, 87781537172, 'ayani utara', NULL, 'FMtgDjyrVzZqeppBb2sIo8UGq2cvk0TsNqrWBdAkwjS3pFuA2Cg7T2tRkDkr', '2025-06-09 13:40:07', '2025-06-09 13:40:07'),
(2, 'penjual', NULL, 'Raka Pradipta', 'raka.pradipta@student.com', '$2y$10$fGsB3u4CzRY1evMghrsrYO8HrL4H/wk3T8c8UuwYUO9/G.L57dgvK', 2205551010, 81234567890, 'Jl. Mawar No. 123, Denpasar, Bali', NULL, NULL, '2025-06-23 15:48:43', '2025-06-23 15:48:43'),
(3, 'admin', NULL, ' Made Sukarsa', 'made.sukarsa@unud.ac.id', '$2y$10$pn/guB49fWywAstAA9qGKugvhf45ir1jkhPHUgJWZDpUOTGp1nIB2', 5171041208850003, 81234567890, 'Jl. Raya Kampus Unud, Jimbaran, Bali', NULL, NULL, NULL, NULL),
(4, 'admin', NULL, 'Ketut Gede Dharma Putra', 'ketut.dharma@student.unud.ac.id', '$2y$10$pn/guB49fWywAstAA9qGKugvhf45ir1jkhPHUgJWZDpUOTGp1nIB2', 1980041502, 81987654321, 'Jl. Sudirman No. 15, Denpasar, Bali', NULL, NULL, NULL, NULL),
(5, 'admin', NULL, 'Gede Jaya', 'gede.jaya@student.unud.ac.id', '$2y$10$pn/guB49fWywAstAA9qGKugvhf45ir1jkhPHUgJWZDpUOTGp1nIB2', 1975031201, 87765432109, 'Jl. Teuku Umar No. 28, Denpasar, Bali', NULL, NULL, NULL, NULL),
(6, 'penjual', 'internal', 'Putu Agus Divayana', 'agus.wirawan@gmail.com', '$2y$10$fGsB3u4CzRY1evMghrsrYO8HrL4H/wk3T8c8UuwYUO9/G.L57dgvK', 2090071505, 81345678901, 'Jl. Gatot Subroto No. 45, Denpasar, Bali', NULL, NULL, NULL, NULL),
(7, 'penjual', 'internal', 'Ni Luh Putu Sari', 'sari.bali@yahoo.com', '$2y$10$fGsB3u4CzRY1evMghrsrYO8HrL4H/wk3T8c8UuwYUO9/G.L57dgvK', 2492091707, 82456789012, 'Jl. Raya Sesetan No. 196, Denpasar, Bali', NULL, NULL, NULL, NULL),
(8, 'penjual', 'eksternal', 'I Wayan Gunawan', 'gunawan.tech@outlook.com', '$2y$10$fGsB3u4CzRY1evMghrsrYO8HrL4H/wk3T8c8UuwYUO9/G.L57dgvK', 5171041208880006, 83567890123, 'Jl. Diponegoro No. 67, Denpasar, Bali', NULL, NULL, NULL, NULL),
(9, 'penjual', 'eksternal', 'Putu Ayu Lestari', 'lestari.creative@gmail.com', '$2y$10$fGsB3u4CzRY1evMghrsrYO8HrL4H/wk3T8c8UuwYUO9/G.L57dgvK', 5171042208920007, 84678901234, 'Jl. Margonda Raya, Depok, Jawa Barat', NULL, NULL, NULL, NULL),
(10, 'penjual', 'eksternal', 'Made Indra Permana', 'indra.permana@hotmail.com', '$2y$10$fGsB3u4CzRY1evMghrsrYO8HrL4H/wk3T8c8UuwYUO9/G.L57dgvK', 5171041208870008, 85789012345, 'Jl. Grafika No. 2, Yogyakarta', NULL, NULL, NULL, NULL),
(11, 'penjual', 'internal', 'Komang Tri Wahyuni', 'tri.wahyuni@gmail.com', '$2y$10$fGsB3u4CzRY1evMghrsrYO8HrL4H/wk3T8c8UuwYUO9/G.L57dgvK', 2391111909, 86890123456, 'Jl. Kartini No. 56, Denpasar, Bali', NULL, NULL, NULL, NULL),
(12, 'penjual', 'internal', 'Gede Yoga Pratama', 'yoga.pratama@mail.com', '$2y$10$fGsB3u4CzRY1evMghrsrYO8HrL4H/wk3T8c8UuwYUO9/G.L57dgvK', 2392091707, 87901234567, 'Jl. Dharmawangsa Dalam, Surabaya, Jawa Timur', NULL, NULL, NULL, NULL),
(13, 'pembeli', 'eksternal', 'Andi Prasetyo', 'andi.prasetyo@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 3173051208950011, 81123456789, 'Jl. Kebon Jeruk No. 12, Jakarta Barat', NULL, NULL, NULL, NULL),
(14, 'pembeli', 'eksternal', 'Sari Dewi Maharani', 'sari.maharani@yahoo.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 3374062208920012, 82234567890, 'Jl. Malioboro No. 45, Yogyakarta', NULL, NULL, NULL, NULL),
(15, 'pembeli', 'eksternal', 'Bayu Satria Wibowo', 'bayu.satria@hotmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 3275031208880013, 83345678901, 'Jl. Asia Afrika No. 67, Bandung', NULL, NULL, NULL, NULL),
(16, 'pembeli', 'eksternal', 'Fitri Nur Azizah', 'fitri.azizah@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 3578042208940014, 84456789012, 'Jl. Tunjungan No. 89, Surabaya', NULL, NULL, NULL, NULL),
(17, 'pembeli', 'eksternal', 'Dimas Eka Putra', 'dimas.eka@outlook.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 3326051208900015, 85567890123, 'Jl. Sudirman No. 23, Semarang', NULL, NULL, NULL, NULL),
(18, 'pembeli', 'eksternal', 'Rina Safitri', 'rina.safitri@yahoo.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1371062208930016, 86678901234, 'Jl. Jenderal Sudirman No. 34, Medan', NULL, NULL, NULL, NULL),
(19, 'pembeli', 'eksternal', 'Rudi Hermawan', 'rudi.hermawan@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 5201071208910017, 87789012345, 'Jl. Pattimura No. 56, Makassar', NULL, NULL, NULL, NULL),
(20, 'pembeli', 'eksternal', 'Indira Kusuma', 'indira.kusuma@mail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 6471082208890018, 88890123456, 'Jl. Ahmad Yani No. 78, Samarinda', NULL, NULL, NULL, NULL),
(21, 'pembeli', 'eksternal', 'Agung Nugraha', 'agung.nugraha@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 3471091208920019, 89901234567, 'Jl. Diponegoro No. 90, Solo', NULL, NULL, NULL, NULL),
(22, 'pembeli', 'eksternal', 'Maya Sari Utami', 'maya.sari@hotmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 3216102208940020, 81012345678, 'Jl. Cihampelas No. 12, Bandung', NULL, NULL, NULL, NULL),
(23, 'pembeli', 'eksternal', 'Faisal Rahman', 'faisal.rahman@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 3674111208900021, 82123456789, 'Jl. Malang No. 34, Depok', NULL, NULL, NULL, NULL),
(24, 'pembeli', 'eksternal', 'Dewi Ratna Sari', 'dewi.ratna@yahoo.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 3313122208930022, 83234567890, 'Jl. Pemuda No. 56, Cilacap', NULL, NULL, NULL, NULL),
(25, 'pembeli', 'eksternal', 'Arief Budiman', 'arief.budiman@outlook.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 3517011208880023, 84345678901, 'Jl. Basuki Rahmat No. 78, Surabaya', NULL, NULL, NULL, NULL),
(26, 'pembeli', NULL, 'Lina Fitriani', 'lina.fitriani@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1472022208920024, 85456789012, 'Jl. Gajah Mada No. 90, Pekanbaru', NULL, NULL, NULL, NULL),
(27, 'pembeli', NULL, 'Hendra Wijaya', 'hendra.wijaya@mail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 3603031208910025, 86567890123, 'Jl. Diponegoro No. 123, Banjarbaru', NULL, NULL, NULL, NULL),
(28, 'pembeli', 'internal', 'theresia', 'theresia@student.unud.ac.id', 'there', 2308561076, 8789345678, 'Jl. Kampus Unud', NULL, NULL, NULL, NULL),
(29, 'pembeli', 'internal', 'Theresia', 'there@student.unud.ac.id', 'there', 230856076, 87654321234, 'Jl. Kampus Unud', NULL, NULL, NULL, NULL),
(31, 'pembeli', 'eksternal', 'Theresia', 'there@mail.com', 'there', 230856076, 87654321234, 'Jl. Kampus Unud', NULL, NULL, NULL, NULL);

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
=======
INSERT INTO `users` (`id`, `name`, `email`, `password`, `nik_nim`, `no_hp`, `alamat`, `is_admin`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'arimbi', 'arimbi@mail.com', '$2y$10$pn/guB49fWywAstAA9qGKugvhf45ir1jkhPHUgJWZDpUOTGp1nIB2', 2308561112, 87781537172, 'ayani utara', 1, NULL, 'aCQJ3bkSsFy2PSWOXFuTTBRz8SBeoNl1P8iixGqDuABGNY54tq3mjbYyr2lV', '2025-06-09 13:40:07', '2025-06-09 13:40:07'),
(2, 'Raka Pradipta', 'raka.pradipta@student.com', '$2y$10$fGsB3u4CzRY1evMghrsrYO8HrL4H/wk3T8c8UuwYUO9/G.L57dgvK', 2205551010, 81234567890, 'Jl. Mawar No. 123, Denpasar, Bali', 0, NULL, NULL, '2025-06-23 15:48:43', '2025-06-23 15:48:43');
>>>>>>> c8c56114ff07f745749ed958fe6e542e7efd01a1

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
<<<<<<< HEAD
  ADD UNIQUE KEY `product_id` (`product_id`,`tanggal_mulai`,`tanggal_kembali`),
  ADD KEY `user_id` (`pembeli_id`);
=======
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);
>>>>>>> c8c56114ff07f745749ed958fe6e542e7efd01a1

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
  ADD KEY `transactions_pembeli_id_foreign` (`pembeli_id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
<<<<<<< HEAD
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
=======
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
>>>>>>> c8c56114ff07f745749ed958fe6e542e7efd01a1

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
<<<<<<< HEAD
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
=======
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
>>>>>>> c8c56114ff07f745749ed958fe6e542e7efd01a1

--
-- AUTO_INCREMENT for table `unit_bisnis`
--
ALTER TABLE `unit_bisnis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
<<<<<<< HEAD
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`pembeli_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
=======
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
>>>>>>> c8c56114ff07f745749ed958fe6e542e7efd01a1

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
  ADD CONSTRAINT `transactions_pembeli_id_foreign` FOREIGN KEY (`pembeli_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_penjual_id_foreign` FOREIGN KEY (`penjual_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
