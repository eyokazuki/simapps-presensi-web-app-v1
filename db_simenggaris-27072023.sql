-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 27, 2023 at 07:55 AM
-- Server version: 10.6.14-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1481356_db_simenggaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_absensi`
--

CREATE TABLE `detail_absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_uuid` text DEFAULT NULL,
  `id_employee` int(11) DEFAULT NULL,
  `tipe_absensi` int(11) DEFAULT NULL,
  `tanggal_absensi` datetime DEFAULT NULL,
  `latitude_absensi` text DEFAULT NULL,
  `longitude_absensi` text DEFAULT NULL,
  `lokasi_absensi` text DEFAULT NULL,
  `manhours` int(11) NOT NULL,
  `status_kerja` int(11) DEFAULT NULL,
  `lokasi_kerja` int(11) DEFAULT NULL,
  `kondisi_kesehatan` text DEFAULT NULL,
  `keterangan_kesehatan` text DEFAULT NULL,
  `device` varchar(45) DEFAULT NULL,
  `fake_gps` int(11) DEFAULT NULL,
  `aktif` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `detail_absensi`
--

INSERT INTO `detail_absensi` (`id_absensi`, `id_uuid`, `id_employee`, `tipe_absensi`, `tanggal_absensi`, `latitude_absensi`, `longitude_absensi`, `lokasi_absensi`, `manhours`, `status_kerja`, `lokasi_kerja`, `kondisi_kesehatan`, `keterangan_kesehatan`, `device`, `fake_gps`, `aktif`, `created_at`, `updated_at`) VALUES
(1, '6e3aae5e-1c94-11ee-9ddc-702771c071f4', 133, 1, '2023-07-07 14:03:52', '-6.9448343', '107.6588977', 'Jl. Yupiter Barat XXII No.H2 No.71, Sekejati, Kecamatan Buahbatu, 40286, Indonesia', 11, 1, 3, '1', NULL, 'Android', NULL, 1, '2023-07-07 14:03:52', NULL),
(2, '7e23d14a-1c95-11ee-9ddc-702771c071f4', 139, 1, '2023-07-07 14:11:28', '-6.9448341', '107.65889', 'Jl. Yupiter Barat XXII No.H2 No.71, Sekejati, Kecamatan Buahbatu, 40286, Indonesia', 8, 1, 1, '1', NULL, 'Android', NULL, 1, '2023-07-07 14:11:28', NULL),
(3, '6c535383-1c96-11ee-9ddc-702771c071f4', 160, 1, '2023-07-07 14:18:07', '-6.2265501', '106.8063942', 'Sequis Tower, Senayan, Kecamatan Kebayoran Baru, 12190, Indonesia', 8, 1, 1, '1', NULL, 'Android', NULL, 1, '2023-07-07 14:18:07', NULL),
(4, '87797e8f-1c96-11ee-9ddc-702771c071f4', 213, 1, '2023-07-07 14:18:53', '-6.2263249', '106.8065068', 'Jl. Tulodong Atas 2 No.12, Senayan, Kecamatan Kebayoran Baru, 12190, Indonesia', 8, 1, 1, '1', NULL, 'Android', NULL, 1, '2023-07-07 14:18:53', NULL),
(5, '057dfe7d-1c9a-11ee-9ddc-702771c071f4', 137, 1, '2023-07-07 14:43:53', '-6.2259079', '106.8066075', 'The Energy Building (2nd Floor, Senayan, Kecamatan Kebayoran Baru, 12190, Indonesia', 8, 1, 1, '1', NULL, 'Android', NULL, 1, '2023-07-07 14:43:53', NULL),
(6, '909e41a3-1c9a-11ee-9ddc-702771c071f4', 157, 1, '2023-07-07 14:47:46', '-6.2259111', '106.8066638', 'The Energy Building (2nd Floor, Senayan, Kecamatan Kebayoran Baru, 12190, Indonesia', 8, 1, 1, '1', NULL, 'Android', NULL, 1, '2023-07-07 14:47:46', NULL),
(7, 'b39ac8d5-1c9a-11ee-9ddc-702771c071f4', 207, 1, '2023-07-07 14:48:45', '-6.225791', '106.8066877', 'Energy, Senayan, Kebayoran Baru, 12190, Indonesia', 8, 1, 1, '1', NULL, 'Android', NULL, 1, '2023-07-07 14:48:45', NULL),
(8, 'dd419c30-1c9a-11ee-9ddc-702771c071f4', 158, 1, '2023-07-07 14:49:55', '-6.2265722', '106.8064129', 'Sequis Tower, Senayan, Kecamatan Kebayoran Baru, 12190, Indonesia', 8, 1, 1, '1', NULL, 'Android', NULL, 1, '2023-07-07 14:49:55', NULL),
(9, '59f3ea92-1f97-11ee-9ddc-702771c071f4', 135, 1, '2023-07-11 10:02:19', '-6.2256033', '106.8067249', 'The Energy Building, Senayan, Kecamatan Kebayoran Baru, 12190, Indonesia', 8, 1, 1, '1', NULL, 'Android', NULL, 1, '2023-07-11 10:02:19', NULL),
(10, 'fa134395-21ed-11ee-9ddc-702771c071f4', 137, 1, '2023-07-14 09:27:27', '-6.2258906', '106.8065843', 'Gedung The Energy, Senayan, Kecamatan Kebayoran Baru, 12190, Indonesia', 8, 1, 1, '1', NULL, 'Android', NULL, 1, '2023-07-14 09:27:27', NULL),
(11, '5f4839ff-21ee-11ee-9ddc-702771c071f4', 160, 1, '2023-07-14 09:30:17', '-6.2258682', '106.8066095', 'The Energy Building (2nd Floor, Senayan, Kecamatan Kebayoran Baru, 12190, Indonesia', 8, 1, 1, '1', NULL, 'Android', NULL, 1, '2023-07-14 09:30:17', NULL),
(12, '09df817f-21f2-11ee-9ddc-702771c071f4', 135, 1, '2023-07-14 09:56:32', '-6.9448407', '107.6589018', 'Jl. Yupiter Barat XXII No.H2 No.71, Sekejati, Kecamatan Buahbatu, 40286, Indonesia', 8, 1, 1, '1', NULL, 'Android', NULL, 1, '2023-07-14 09:56:32', NULL),
(13, 'c732c1d5-21f3-11ee-9ddc-702771c071f4', 154, 1, '2023-07-14 10:08:59', '-6.9448407', '107.6589039', 'Jl. Yupiter Barat XXII No.H2 No.71, Sekejati, Kecamatan Buahbatu, 40286, Indonesia', 8, 1, 1, '1', NULL, 'Android', NULL, 1, '2023-07-14 10:08:59', NULL),
(14, 'e298c588-21f3-11ee-9ddc-702771c071f4', 155, 1, '2023-07-14 10:09:45', '-6.944838', '107.6589023', 'Jl. Yupiter Barat XXII No.H2 No.71, Sekejati, Kecamatan Buahbatu, 40286, Indonesia', 8, 1, 1, '1', NULL, 'Android', NULL, 1, '2023-07-14 10:09:45', NULL),
(15, '1a2cdbf2-21f4-11ee-9ddc-702771c071f4', 141, 1, '2023-07-14 10:11:18', '-6.9448377', '107.6589014', 'Jl. Yupiter Barat XXII No.H2 No.71, Sekejati, Kecamatan Buahbatu, 40286, Indonesia', 8, 1, 1, '1', NULL, 'Android', NULL, 1, '2023-07-14 10:11:18', NULL),
(16, 'b46e8bc1-2211-11ee-9ddc-702771c071f4', 210, 1, '2023-07-14 13:43:12', '-6.208763', '106.845599', 'Jl. Sultan Agung, Pasar Manggis, Kecamatan Setiabudi, 12970, Indonesia', 8, 1, 2, '2', 'batuk', 'Android', NULL, 1, '2023-07-14 13:43:12', NULL),
(17, '061ce96a-2221-11ee-9ddc-702771c071f4', 130, 1, '2023-07-14 15:32:52', '37.785834', '-122.406417', '1 Stockton St, Union Square, San Francisco, 94108, United States', 8, 1, 1, '1', NULL, 'iOS', NULL, 1, '2023-07-14 15:32:52', NULL),
(18, '7c5d3510-250c-11ee-9f0b-e17fd5b1f8c5', 157, 1, '2023-07-18 08:43:25', '-6.2253314', '106.8069419', 'QRF4+VQX, Senayan, Kecamatan Kebayoran Baru, 12190, Indonesia', 8, 1, 1, '1', NULL, 'Android', NULL, 1, '2023-07-18 08:43:25', NULL),
(19, 'b6dd7e4e-250c-11ee-9f0b-e17fd5b1f8c5', 160, 1, '2023-07-18 08:45:03', '-6.2260258', '106.8066957', 'Jl. Jenderal Sudirman Blok Lot 11 No.Kav 58, Senayan, Kecamatan Kebayoran Baru, 12190, Indonesia', 8, 1, 1, '1', NULL, 'Android', NULL, 1, '2023-07-18 08:45:03', NULL),
(20, '66a77277-250d-11ee-9f0b-e17fd5b1f8c5', 190, 1, '2023-07-18 08:49:58', '-6.225328', '106.806917', 'QRF4+VQX, Senayan, Kecamatan Kebayoran Baru, 12190, Indonesia', 8, 1, 1, '1', NULL, 'Android', NULL, 1, '2023-07-18 08:49:58', NULL),
(21, 'bba69dad-250d-11ee-9f0b-e17fd5b1f8c5', 130, 1, '2023-07-18 08:52:20', '-6.2253216', '106.8069559', 'QRF4+VQX, Senayan, Kecamatan Kebayoran Baru, 12190, Indonesia', 8, 1, 1, '1', NULL, 'Android', NULL, 1, '2023-07-18 08:52:20', NULL),
(22, '37369323-250e-11ee-9f0b-e17fd5b1f8c5', 197, 1, '2023-07-18 08:55:47', '-6.2253189', '106.8068537', 'Jl. Tulodong Atas 2 No.10, Senayan, Kecamatan Kebayoran Baru, 12190, Indonesia', 11, 1, 3, '1', NULL, 'Android', NULL, 1, '2023-07-18 08:55:47', NULL),
(23, '9db5eee3-250e-11ee-9f0b-e17fd5b1f8c5', 137, 1, '2023-07-18 08:58:39', '-6.2253169', '106.8069502', 'QRF4+VQX, Senayan, Kecamatan Kebayoran Baru, 12190, Indonesia', 8, 1, 1, '1', NULL, 'Android', NULL, 1, '2023-07-18 08:58:39', NULL),
(24, '1527bbcd-251c-11ee-9f0b-e17fd5b1f8c5', 196, 1, '2023-07-18 10:35:03', '-6.2253245', '106.806954', 'QRF4+VQX, Senayan, Kecamatan Kebayoran Baru, 12190, Indonesia', 8, 1, 1, '2', 'radang', 'Android', NULL, 1, '2023-07-18 10:35:03', NULL),
(25, '65522cbd-251c-11ee-9f0b-e17fd5b1f8c5', 182, 1, '2023-07-18 10:37:18', '-6.2253257', '106.8069523', 'QRF4+VQX, Senayan, Kecamatan Kebayoran Baru, 12190, Indonesia', 0, 3, NULL, '2', 'Panas dingin', 'Android', NULL, 1, '2023-07-18 10:37:18', NULL),
(26, '8fb64471-251c-11ee-9f0b-e17fd5b1f8c5', 199, 1, '2023-07-18 10:38:29', '-6.2253231', '106.806953', 'QRF4+VQX, Senayan, Kecamatan Kebayoran Baru, 12190, Indonesia', 8, 1, 1, '1', NULL, 'Android', NULL, 1, '2023-07-18 10:38:29', NULL),
(27, 'a632a2d7-251c-11ee-9f0b-e17fd5b1f8c5', 156, 1, '2023-07-18 10:39:07', '-6.2253268', '106.8069484', 'QRF4+VQX, Senayan, Kecamatan Kebayoran Baru, 12190, Indonesia', 8, 1, 1, '1', NULL, 'Android', NULL, 1, '2023-07-18 10:39:07', NULL),
(28, 'c216a657-251c-11ee-9f0b-e17fd5b1f8c5', 209, 1, '2023-07-18 10:39:53', '-6.2253252', '106.8069492', 'QRF4+VQX, Senayan, Kecamatan Kebayoran Baru, 12190, Indonesia', 0, 2, NULL, '1', NULL, 'Android', NULL, 1, '2023-07-18 10:39:53', NULL),
(29, 'db0335b1-251c-11ee-9f0b-e17fd5b1f8c5', 131, 1, '2023-07-18 10:40:35', '-6.2253394', '106.8068218', 'Jl. Tulodong Atas 2 No.10, Senayan, Kecamatan Kebayoran Baru, 12190, Indonesia', 8, 1, 1, '1', NULL, 'Android', NULL, 1, '2023-07-18 10:40:35', NULL),
(30, 'fa4471eb-251c-11ee-9f0b-e17fd5b1f8c5', 214, 1, '2023-07-18 10:41:28', '-6.2253212', '106.8069542', 'QRF4+VQX, Senayan, Kecamatan Kebayoran Baru, 12190, Indonesia', 8, 1, 1, '2', 'Panas', 'Android', NULL, 1, '2023-07-18 10:41:28', NULL),
(31, '29fb002c-251d-11ee-9f0b-e17fd5b1f8c5', 170, 1, '2023-07-18 10:42:48', '-6.225277', '106.8069555', 'QRF4+VQX, Senayan, Kecamatan Kebayoran Baru, 12190, Indonesia', 8, 1, 1, '1', NULL, 'Android', NULL, 1, '2023-07-18 10:42:48', NULL),
(32, '5c061de0-251d-11ee-9f0b-e17fd5b1f8c5', 230, 1, '2023-07-18 10:44:12', '-6.2253343', '106.8068766', 'QRF4+VQX, Senayan, Kecamatan Kebayoran Baru, 12190, Indonesia', 8, 4, NULL, '1', NULL, 'Android', NULL, 1, '2023-07-18 10:44:12', NULL),
(33, '753e4219-251d-11ee-9f0b-e17fd5b1f8c5', 168, 1, '2023-07-18 10:44:54', '-6.225324', '106.806956', 'QRF4+VQX, Senayan, Kecamatan Kebayoran Baru, 12190, Indonesia', 11, 1, 3, '1', NULL, 'Android', NULL, 1, '2023-07-18 10:44:54', NULL),
(34, '4e022d2d-251e-11ee-9f0b-e17fd5b1f8c5', 211, 1, '2023-07-18 10:50:58', '-6.2253249', '106.8069517', 'QRF4+VQX, Senayan, Kecamatan Kebayoran Baru, 12190, Indonesia', 8, 1, 1, '1', NULL, 'Android', NULL, 1, '2023-07-18 10:50:58', NULL),
(35, '663a3223-251e-11ee-9f0b-e17fd5b1f8c5', 132, 1, '2023-07-18 10:51:38', '-6.2253362', '106.8068793', 'QRF4+VQX, Senayan, Kecamatan Kebayoran Baru, 12190, Indonesia', 8, 1, 1, '1', NULL, 'Android', NULL, 1, '2023-07-18 10:51:38', NULL),
(36, '98ced205-251e-11ee-9f0b-e17fd5b1f8c5', 191, 1, '2023-07-18 10:53:03', '-6.225254', '106.8069321', 'QRF4+VQX, Senayan, Kecamatan Kebayoran Baru, 12190, Indonesia', 8, 1, 1, '1', NULL, 'Android', NULL, 1, '2023-07-18 10:53:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_absensi_keluarga`
--

CREATE TABLE `detail_absensi_keluarga` (
  `id_detail_absensi_keluarga` int(11) NOT NULL,
  `id_keluarga` int(11) DEFAULT NULL,
  `id_employee` int(11) DEFAULT NULL,
  `tanggal_absensi` datetime DEFAULT current_timestamp(),
  `kondisi_kesehatan` int(11) DEFAULT NULL,
  `keterangan_kesehatan` text DEFAULT NULL,
  `aktif` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_absensi_pegawai_lainnya`
--

CREATE TABLE `detail_absensi_pegawai_lainnya` (
  `id_detail_absensi_pegawai_lainnya` int(11) NOT NULL,
  `id_uuid` varchar(100) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `id_pegawai_lainnya` int(11) DEFAULT NULL,
  `aktif` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `detail_absensi_pegawai_lainnya`
--

INSERT INTO `detail_absensi_pegawai_lainnya` (`id_detail_absensi_pegawai_lainnya`, `id_uuid`, `id_pegawai`, `id_pegawai_lainnya`, `aktif`, `created_at`, `updated_at`) VALUES
(16, '825d27d8-2220-11ee-9ddc-702771c071f4', 137, 213, 1, '2023-07-14 15:29:11', NULL),
(17, '93153f9a-2220-11ee-9ddc-702771c071f4', 137, 130, 1, '2023-07-14 15:29:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_history_employee_status`
--

CREATE TABLE `detail_history_employee_status` (
  `id_detail_history_employee_status` int(11) NOT NULL,
  `id_employee` int(11) DEFAULT NULL,
  `id_employee_status` int(11) DEFAULT NULL,
  `tanggal_berubah` date DEFAULT NULL,
  `aktif` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_riwayat_vaksin`
--

CREATE TABLE `detail_riwayat_vaksin` (
  `id_detail_riwayat_vaksin` int(11) NOT NULL,
  `id_uuid` varchar(100) DEFAULT NULL,
  `id_employee` int(11) DEFAULT NULL,
  `id_tipe_vaksin` varchar(45) DEFAULT NULL,
  `tanggal_vaksin` date DEFAULT NULL,
  `aktif` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `detail_riwayat_vaksin`
--

INSERT INTO `detail_riwayat_vaksin` (`id_detail_riwayat_vaksin`, `id_uuid`, `id_employee`, `id_tipe_vaksin`, `tanggal_vaksin`, `aktif`, `created_at`, `updated_at`) VALUES
(13, 'd97acb3f-221f-11ee-9ddc-702771c071f4', 137, '1', '2014-01-01', 1, '2023-07-14 15:24:27', '2023-07-14 15:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `m_agenda`
--

CREATE TABLE `m_agenda` (
  `id_agenda` int(11) NOT NULL,
  `id_uuid` varchar(100) DEFAULT NULL,
  `judul_agenda` text DEFAULT NULL,
  `isi_agenda` text DEFAULT NULL,
  `file_location` text DEFAULT NULL,
  `aktif` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `m_agenda`
--

INSERT INTO `m_agenda` (`id_agenda`, `id_uuid`, `judul_agenda`, `isi_agenda`, `file_location`, `aktif`, `created_at`, `updated_at`) VALUES
(1, '34a552dd-001f-11ee-ad02-2cea7f97077c', 'Januari', 'Bulan Januari\r\nTanggal 1 Tahun Baru', 'Januari.jpg', 1, '2023-04-21 20:20:16', '2023-06-09 14:52:13'),
(2, '34a554d7-001f-11ee-ad02-2cea7f97077c', 'Februari', 'Bulan Februari', 'Februari.jpg', 1, '2023-04-21 20:20:16', '2023-06-05 09:51:16'),
(3, '34a55576-001f-11ee-ad02-2cea7f97077c', 'Maret', 'Bulan Maret', 'Maret.jpg', 1, '2023-04-21 20:20:16', '2023-06-05 09:51:37'),
(4, '34a555f6-001f-11ee-ad02-2cea7f97077c', 'April', 'Bulan April', 'April.jpg', 1, '2023-04-21 20:20:16', '2023-06-05 09:51:46'),
(5, '34a5565f-001f-11ee-ad02-2cea7f97077c', 'Mei', 'Bulan Mei', 'Mei.jpg', 1, '2023-04-21 20:20:16', '2023-06-05 09:52:00'),
(6, '34a556c7-001f-11ee-ad02-2cea7f97077c', 'Juni', 'Bulan Juni', 'Juni.jpg', 1, '2023-04-21 20:20:16', '2023-06-05 09:52:31'),
(7, '34a5571a-001f-11ee-ad02-2cea7f97077c', 'Juli', 'Bulan Juli', 'Juli.jpg', 1, '2023-04-21 20:20:16', '2023-06-05 09:52:43'),
(8, '34a5576e-001f-11ee-ad02-2cea7f97077c', 'Agustus', 'Bulan Agustus', 'Agustus.jpg', 1, '2023-04-21 20:20:16', '2023-06-05 09:52:54'),
(9, '34a557c5-001f-11ee-ad02-2cea7f97077c', 'September', 'Bulan September', 'September.jpg', 1, '2023-04-21 20:20:16', '2023-06-05 09:53:07'),
(10, '34a5582d-001f-11ee-ad02-2cea7f97077c', 'Oktober', 'Bulan Oktober', 'Oktober.jpg', 1, '2023-06-01 08:53:35', '2023-06-05 09:52:16'),
(11, '34a55bef-001f-11ee-ad02-2cea7f97077c', 'November', 'Bulan November\r\n', 'Nopember.jpg', 1, '2023-06-01 08:53:35', '2023-06-05 09:55:31'),
(12, '34a55d9c-001f-11ee-ad02-2cea7f97077c', 'Desember', 'Bulan Desember', 'Desember.jpg', 1, '2023-06-01 08:53:35', '2023-06-05 09:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `m_banner`
--

CREATE TABLE `m_banner` (
  `id_banner` int(11) NOT NULL,
  `id_uuid` varchar(100) DEFAULT NULL,
  `file_location` text DEFAULT NULL,
  `aktif` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `m_banner`
--

INSERT INTO `m_banner` (`id_banner`, `id_uuid`, `file_location`, `aktif`, `created_at`, `updated_at`) VALUES
(1, 'e2971436-e048-11ed-8239-8c48c505c8dd', 'img1.jpg', 1, '2023-04-21 14:17:43', NULL),
(2, 'e2971d96-e048-11ed-8239-8c48c505c8dd', 'img2.jpg', 1, '2023-04-21 14:17:43', NULL),
(3, 'e29720ac-e048-11ed-8239-8c48c505c8dd', 'img3.jpg', 1, '2023-04-21 14:17:43', NULL),
(4, 'e297223c-e048-11ed-8239-8c48c505c8dd', 'img4.jpg', 1, '2023-04-21 14:17:43', NULL),
(5, '3780b9f3-001c-11ee-ad02-2cea7f97077c', 'img5.jpg', 1, '2023-06-01 08:31:57', NULL),
(6, '3780bc88-001c-11ee-ad02-2cea7f97077c', 'img6.jpg', 1, '2023-06-01 08:31:57', NULL),
(7, '3780bd4c-001c-11ee-ad02-2cea7f97077c', 'img7.jpg', 1, '2023-06-01 08:31:57', NULL),
(8, '3780be26-001c-11ee-ad02-2cea7f97077c', 'img8.jpg', 1, '2023-06-01 08:31:57', NULL),
(9, '3780beac-001c-11ee-ad02-2cea7f97077c', 'img9.jpg', 1, '2023-06-01 08:31:57', NULL),
(10, '3780bf35-001c-11ee-ad02-2cea7f97077c', 'img10.jpg', 1, '2023-06-01 08:31:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_base`
--

CREATE TABLE `m_base` (
  `id_base` int(11) NOT NULL,
  `id_uuid` varchar(100) DEFAULT NULL,
  `base` varchar(150) DEFAULT NULL,
  `aktif` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `m_base`
--

INSERT INTO `m_base` (`id_base`, `id_uuid`, `base`, `aktif`, `created_at`, `updated_at`) VALUES
(1, '8384869f-1c04-11ee-9ddc-702771c071f4', 'Jakarta', 1, '2023-07-06 20:53:32', NULL),
(2, '838488b9-1c04-11ee-9ddc-702771c071f4', 'Tarakan', 1, '2023-07-06 20:53:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_company`
--

CREATE TABLE `m_company` (
  `id_company` int(11) NOT NULL,
  `id_uuid` varchar(100) DEFAULT NULL,
  `company` varchar(150) DEFAULT NULL,
  `aktif` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `m_company`
--

INSERT INTO `m_company` (`id_company`, `id_uuid`, `company`, `aktif`, `created_at`, `updated_at`) VALUES
(1, '1ca68839-1c03-11ee-9ddc-702771c071f4', 'PERMANENT PERTAMINA SECONDEE', 1, '2023-07-06 20:43:01', NULL),
(2, '1ca68bba-1c03-11ee-9ddc-702771c071f4', 'PERMANENT MEDCO SECONDEE', 1, '2023-07-06 20:43:01', NULL),
(3, '1ca68de8-1c03-11ee-9ddc-702771c071f4', 'JOB HIRE PWTT (PERMANENT)', 1, '2023-07-06 20:43:01', NULL),
(4, '1ca68f3b-1c03-11ee-9ddc-702771c071f4', 'JOB HIRE PWT (DIRECT CONTRACT)', 1, '2023-07-06 20:43:01', NULL),
(5, '1ca690b3-1c03-11ee-9ddc-702771c071f4', 'OUTSOURCE MANPOWER PT MITRA ENERGY SUPPLY', 1, '2023-07-06 20:43:01', NULL),
(6, '1ca6924b-1c03-11ee-9ddc-702771c071f4', 'OUTSOURCE MANPOWER PT ORYX SERVICES', 1, '2023-07-06 20:43:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_departemen`
--

CREATE TABLE `m_departemen` (
  `id_departemen` int(11) NOT NULL,
  `id_uuid` varchar(100) DEFAULT NULL,
  `id_company` int(11) DEFAULT NULL,
  `departemen` text DEFAULT NULL,
  `inisial` varchar(255) DEFAULT NULL,
  `aktif` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `m_departemen`
--

INSERT INTO `m_departemen` (`id_departemen`, `id_uuid`, `id_company`, `departemen`, `inisial`, `aktif`, `created_at`, `updated_at`) VALUES
(1, 'b1bfab5d-17db-11ee-9ddc-702771c071f4', NULL, 'Technical Planning', 'TPL', 1, '2023-07-01 13:48:36', NULL),
(2, 'b1bfae4d-17db-11ee-9ddc-702771c071f4', NULL, 'General Affairs', 'GA', 1, '2023-07-01 13:48:36', NULL),
(3, 'b1bfaf09-17db-11ee-9ddc-702771c071f4', NULL, 'Supply Chain Management', 'SCM', 1, '2023-07-01 13:48:36', NULL),
(4, 'b1bfaf96-17db-11ee-9ddc-702771c071f4', NULL, 'Project Development', 'PROJECT', 1, '2023-07-01 13:48:36', NULL),
(5, 'b1bfb01a-17db-11ee-9ddc-702771c071f4', NULL, 'Field', 'FIELD', 1, '2023-07-01 13:48:36', NULL),
(6, 'b1bfb09a-17db-11ee-9ddc-702771c071f4', NULL, 'QHSSE', 'HSSE', 1, '2023-07-01 13:48:36', NULL),
(7, 'b1bfb114-17db-11ee-9ddc-702771c071f4', NULL, 'Drilling ', 'DRILLING', 1, '2023-07-01 13:48:36', NULL),
(8, 'b1bfb1b7-17db-11ee-9ddc-702771c071f4', NULL, 'Management', 'MGMT', 1, '2023-07-01 13:48:36', NULL),
(9, 'b1bfb232-17db-11ee-9ddc-702771c071f4', NULL, 'Finance', 'FINANCE', 1, '2023-07-01 13:48:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_employee`
--

CREATE TABLE `m_employee` (
  `id_employee` int(11) NOT NULL,
  `id_uuid` varchar(100) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `nama` text DEFAULT NULL,
  `nik` varchar(45) DEFAULT NULL,
  `no_hp` varchar(45) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `id_employee_status` int(11) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `id_company` int(11) DEFAULT NULL,
  `id_departemen` int(11) DEFAULT NULL,
  `id_section` int(11) DEFAULT NULL,
  `parent_position_id` int(11) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `id_base` int(11) DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL,
  `pass_reset` varchar(100) DEFAULT NULL,
  `allow_broadcast` int(11) DEFAULT 0,
  `aktif` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `m_employee`
--

INSERT INTO `m_employee` (`id_employee`, `id_uuid`, `code`, `nama`, `nik`, `no_hp`, `alamat`, `email`, `foto`, `password`, `tanggal_lahir`, `id_employee_status`, `jenis_kelamin`, `id_jabatan`, `id_company`, `id_departemen`, `id_section`, `parent_position_id`, `position_id`, `id_base`, `id_level`, `pass_reset`, `allow_broadcast`, `aktif`, `created_at`, `updated_at`) VALUES
(128, '1176ab28-1c1a-11ee-9ddc-702771c071f4', '20183005', 'Edin Akhmad Syaripudin', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 1, 1, 1, NULL, 10, NULL, 1, 1, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(129, '1176ae2f-1c1a-11ee-9ddc-702771c071f4', '20203010', 'Fanny Rosdiawan', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 3, 1, 1, 2, 1, NULL, 1, 2, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(130, '1176af3e-1c1a-11ee-9ddc-702771c071f4', '20183006', 'Indriyani Rasyid', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 2, 1, 2, 1, 11, NULL, 1, 2, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(131, '1176b016-1c1a-11ee-9ddc-702771c071f4', '20203014', 'Rini Novitasari', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 4, 1, 3, NULL, 131, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(132, '1176b0e2-1c1a-11ee-9ddc-702771c071f4', '20213009', 'Tanto Retijono', NULL, NULL, NULL, '20213009@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 8, 1, 6, 3, 13, NULL, 1, 2, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(133, '1176b1b5-1c1a-11ee-9ddc-702771c071f4', '20213015', 'Irwan Iskandar', NULL, NULL, NULL, '20213015@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 9, 1, 7, 4, 16, NULL, 1, 2, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(134, '1176b27c-1c1a-11ee-9ddc-702771c071f4', '20213001', 'Dedy Parsaoran Sianturi', NULL, NULL, NULL, '20213001@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 5, 1, 4, NULL, 129, NULL, 1, 2, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(135, '1176b345-1c1a-11ee-9ddc-702771c071f4', '20213002', 'Purnomo Rusdiono', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 6, 1, 4, NULL, 129, NULL, 1, 2, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(136, '1176b407-1c1a-11ee-9ddc-702771c071f4', '20213008', 'Yusuf Prijono', NULL, NULL, NULL, '20213008@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 7, 1, 5, NULL, 14, NULL, 2, 4, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(137, '1176b4ca-1c1a-11ee-9ddc-702771c071f4', '20223012', 'Fransisca Geronica', '', '', '', 'fransisca.geronica@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '0000-00-00', 2, 'L', 11, 1, 2, NULL, 10, 0, 1, 1, NULL, 0, 1, '2023-07-06 23:19:23', '2023-07-07 14:42:17'),
(138, '1176b597-1c1a-11ee-9ddc-702771c071f4', '20233006', 'Ricky Therademaker', NULL, NULL, NULL, 'Ricky.Therademaker0@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 13, 1, 6, NULL, 10, NULL, 1, 1, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(139, '1176b653-1c1a-11ee-9ddc-702771c071f4', '20233008', 'Cahyo Nugroho', NULL, NULL, NULL, 'Cahyo.Nugroho@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 14, 1, 5, NULL, 10, NULL, 2, 1, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(140, '1176b784-1c1a-11ee-9ddc-702771c071f4', '20233005', 'Ahmad Nasrul Hakim', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 12, 1, 9, 5, 19, NULL, 1, 2, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(141, '1176b850-1c1a-11ee-9ddc-702771c071f4', '20223008', 'Djudjuwanto', NULL, NULL, NULL, '20223008@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 10, 1, 8, NULL, NULL, NULL, 1, 5, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(142, '1176b918-1c1a-11ee-9ddc-702771c071f4', '20193006', 'Sanny Suprihono', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 16, 2, 7, NULL, 10, NULL, 1, 1, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(143, '1176b9dd-1c1a-11ee-9ddc-702771c071f4', '20183009', 'Balok Sutarto Lugijandoko', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 15, 2, 1, 6, 1, NULL, 1, 2, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(144, '1176bac9-1c1a-11ee-9ddc-702771c071f4', '20203003', 'Copito Sumantri', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 17, 2, 2, 7, 11, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(145, '1176bda1-1c1a-11ee-9ddc-702771c071f4', '20203004', 'Muhammad Iqbal Hamzah', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 18, 2, 3, 8, 131, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(146, '1176be67-1c1a-11ee-9ddc-702771c071f4', '20213004', 'Richard Anglo Rumamby', NULL, NULL, NULL, '20213004@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 19, 2, 9, NULL, 10, NULL, 1, 1, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(147, '1176bf40-1c1a-11ee-9ddc-702771c071f4', '20203006', 'Hardianto', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 14, 2, 5, NULL, 10, NULL, 2, 1, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(148, '1176c005-1c1a-11ee-9ddc-702771c071f4', '20213011', 'Aviantoro Nugroho', NULL, NULL, NULL, '20213011@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 21, 2, 6, 10, 13, NULL, 1, 2, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(149, '1176f50c-1c1a-11ee-9ddc-702771c071f4', '20213006', 'Andre Manuel Winokan', NULL, NULL, NULL, '20213006@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 20, 2, 4, 9, 129, NULL, 1, 2, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(150, '1176f845-1c1a-11ee-9ddc-702771c071f4', '20223006', 'Audy Armyanto', NULL, NULL, NULL, '20223006@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 7, 2, 5, 11, 14, NULL, 2, 4, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(151, '1176fa1b-1c1a-11ee-9ddc-702771c071f4', '20223010', 'Prayudha Erlangga Barnas', NULL, NULL, NULL, '20223010@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 22, 2, 3, NULL, 10, NULL, 1, 1, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(152, '1176fbad-1c1a-11ee-9ddc-702771c071f4', '20223011', 'Puluh Agus Nampan Rianto', NULL, NULL, NULL, '20223011@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 23, 2, 2, 12, 11, NULL, 1, 2, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(153, '1176fd26-1c1a-11ee-9ddc-702771c071f4', '20233001', 'Irfano Budiyanto', NULL, NULL, NULL, 'Irfano.Budiyanto@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 24, 2, 2, 12, 23, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(154, '1176fe92-1c1a-11ee-9ddc-702771c071f4', '20233007', 'Carla Femilia', NULL, NULL, NULL, 'Carla.Femilia@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 25, 2, 3, 8, 131, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(155, '1176fffd-1c1a-11ee-9ddc-702771c071f4', '20233013', 'Firly Saniristy', NULL, NULL, NULL, '-', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 26, 2, 3, 13, 22, NULL, 1, 2, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(156, '1177017d-1c1a-11ee-9ddc-702771c071f4', '20090029', 'Frily Indira', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 28, 3, 9, 5, 12, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(157, '117702de-1c1a-11ee-9ddc-702771c071f4', '20080213', 'Yunita Feronica Handayani', '', '', '', 'yunita.feronica@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '0000-00-00', 2, 'L', 27, 3, 2, 12, 23, 0, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', '2023-07-07 14:43:07'),
(158, '11770444-1c1a-11ee-9ddc-702771c071f4', '20090045', 'Meilyano Friza Siregar', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 29, 3, 2, 12, 23, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(159, '11770627-1c1a-11ee-9ddc-702771c071f4', '20090055', 'Antonia Asih Murniati', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 31, 3, 6, 3, 8, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(160, '1177078e-1c1a-11ee-9ddc-702771c071f4', '20090051', 'Made Agus Dwi Suarjana', '', '', '', 'made.suarjana2@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '0000-00-00', 2, 'L', 30, 3, 2, 14, 11, 14, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', '2023-07-07 14:36:31'),
(161, '117708e2-1c1a-11ee-9ddc-702771c071f4', '20090057', 'Indra Setyawan', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 33, 3, 3, 13, 26, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(162, '11770a3f-1c1a-11ee-9ddc-702771c071f4', '20090056', 'Alexander Victory Maris', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 32, 3, 8, 15, 128, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(163, '11770b98-1c1a-11ee-9ddc-702771c071f4', '20113003', 'Fitriyadi', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 36, 3, 1, 6, 15, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(164, '11770ceb-1c1a-11ee-9ddc-702771c071f4', '20100051', 'Chandra Bernard Olii', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 4, 3, 3, 8, 131, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(165, '11770e40-1c1a-11ee-9ddc-702771c071f4', '20100054', 'Primadian Sari Dewi', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 35, 3, 9, 16, 132, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(166, '11770f94-1c1a-11ee-9ddc-702771c071f4', '20100053', 'Franciscus Aditya Priyawan', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 34, 3, 5, 11, 133, NULL, 2, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(167, '117710e5-1c1a-11ee-9ddc-702771c071f4', '20113004', 'Theresia Legio Maria Lira', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 37, 3, 2, 12, 23, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(168, '1177123a-1c1a-11ee-9ddc-702771c071f4', '20123006', 'Salakhudin Afif', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 41, 3, 4, 9, 20, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(169, '1177138e-1c1a-11ee-9ddc-702771c071f4', '20113013', 'Tulus Wibisono', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 38, 3, 1, 17, 3, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(170, '11771554-1c1a-11ee-9ddc-702771c071f4', '20123005', 'Arief Cahyono', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 40, 3, 7, 18, 130, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(171, '117716b5-1c1a-11ee-9ddc-702771c071f4', '20123003', 'Rully Charles Rotty', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 39, 3, 6, 3, 8, NULL, 2, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(172, '1177180a-1c1a-11ee-9ddc-702771c071f4', '20123009', 'Fredy Christianto', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 42, 3, 6, 3, 8, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(173, '1177195d-1c1a-11ee-9ddc-702771c071f4', '20133002', 'Arif Rahman', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 43, 3, 5, 11, 34, NULL, 2, 6, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(174, '11771ab5-1c1a-11ee-9ddc-702771c071f4', '20133003', 'Hadriansyah', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 43, 3, 5, 11, 34, NULL, 2, 6, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(175, '11771c05-1c1a-11ee-9ddc-702771c071f4', '20133004', 'Handriansyah', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 43, 3, 5, 11, 34, NULL, 2, 6, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(176, '11771d56-1c1a-11ee-9ddc-702771c071f4', '20133005', 'Ismail', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 44, 3, 5, 11, 34, NULL, 2, 6, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(177, '11771ea7-1c1a-11ee-9ddc-702771c071f4', '20133008', 'Purwanto', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 43, 3, 5, 11, 34, NULL, 2, 6, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(178, '11771ff9-1c1a-11ee-9ddc-702771c071f4', '20133006', 'Kamimi Rahman', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 44, 3, 5, 11, 34, NULL, 2, 6, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(179, '11772150-1c1a-11ee-9ddc-702771c071f4', '20133007', 'Kisnadi', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 44, 3, 5, 11, 34, NULL, 2, 6, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(180, '1177229f-1c1a-11ee-9ddc-702771c071f4', '20133009', 'Suriansyah', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 44, 3, 5, 11, 34, NULL, 2, 6, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(181, '11772d74-1c1a-11ee-9ddc-702771c071f4', '20143004', 'Tangi Reka Ricardo Simamora', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 46, 3, 9, 16, 132, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(182, '11773050-1c1a-11ee-9ddc-702771c071f4', '20133019', 'Isnianto Saputra', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 45, 3, 1, 17, NULL, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(183, '1177321a-1c1a-11ee-9ddc-702771c071f4', '20133010', 'Surya Junaidi', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 43, 3, 5, 11, 34, NULL, 2, 6, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(184, '117733a3-1c1a-11ee-9ddc-702771c071f4', '20133011', 'Umar ', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 43, 3, 5, 11, 34, NULL, 2, 6, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(185, '11773511-1c1a-11ee-9ddc-702771c071f4', '20133012', 'Yahya', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 44, 3, 5, 11, 34, NULL, 2, 6, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(186, '1177367b-1c1a-11ee-9ddc-702771c071f4', '20183008', 'Sudibyo', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 48, 3, 6, 3, 8, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(187, '117737dc-1c1a-11ee-9ddc-702771c071f4', '20183007', 'Eddy Himawan Sulistianto', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 47, 3, 4, 9, 20, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(188, '11773948-1c1a-11ee-9ddc-702771c071f4', '20203007', 'Lukas Singgih', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 50, 3, 4, 9, NULL, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(189, '11773aa2-1c1a-11ee-9ddc-702771c071f4', '20183010', 'Avesta Yudha Prasetya', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 49, 3, 1, 17, 3, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(190, '11773cf7-1c1a-11ee-9ddc-702771c071f4', '20193002', 'Bayu Anggara Putra', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 52, 4, 2, 1, 2, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(191, '11773e61-1c1a-11ee-9ddc-702771c071f4', '20233002', 'Dewa Ayu Srimahoni', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 51, 3, 8, NULL, 10, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(192, '11773fc5-1c1a-11ee-9ddc-702771c071f4', '20203008', 'Ade Yuhendra', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 53, 4, 4, 9, 20, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(193, '11774122-1c1a-11ee-9ddc-702771c071f4', '20193008', 'Iwan Juswandi', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 44, 4, 5, 11, 34, NULL, 2, 6, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(194, '11774284-1c1a-11ee-9ddc-702771c071f4', '20213012', 'Doni Novianto', NULL, NULL, NULL, '20213012@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 54, 4, 6, 3, 8, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(195, '117743df-1c1a-11ee-9ddc-702771c071f4', '20223005', 'Dony Bona Vena', NULL, NULL, NULL, '20223005@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 57, 4, 6, 10, 21, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(196, '11774531-1c1a-11ee-9ddc-702771c071f4', '20213014', 'M. Okta Rizaldi', NULL, NULL, NULL, '20213014@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 36, 4, 1, 17, NULL, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(197, '11774688-1c1a-11ee-9ddc-702771c071f4', '20223001', 'Ariesando', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 55, 4, 2, 1, 2, NULL, 2, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(198, '117747dc-1c1a-11ee-9ddc-702771c071f4', '20223002', 'Nurcahyo', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 56, 4, 5, 19, 7, NULL, 2, 7, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(199, '11774933-1c1a-11ee-9ddc-702771c071f4', '20223009', 'Farahdila Gayatri', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 58, 4, 9, 5, 12, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(200, '11774a86-1c1a-11ee-9ddc-702771c071f4', '20233003', 'Muhammad Anugerah Lukytha', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 55, 4, 2, 1, 2, NULL, 2, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(201, '11774bd9-1c1a-11ee-9ddc-702771c071f4', '20233004', 'Imat Rohimat', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 59, 4, 5, 19, 56, NULL, 2, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(202, '11774d7f-1c1a-11ee-9ddc-702771c071f4', '20223007', 'Adji Lukman Hakim', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 56, 4, 5, 19, 7, NULL, 2, 7, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(203, '11774e3c-1c1a-11ee-9ddc-702771c071f4', '20233011', 'Yosi Carolina', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 62, 4, 6, 3, 8, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(204, '11774ef8-1c1a-11ee-9ddc-702771c071f4', '20233012', 'Edwin Mulyawan', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 63, 4, 9, 16, 132, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(205, '11774fb5-1c1a-11ee-9ddc-702771c071f4', '20233009', 'Wahyu Indrianto ', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 60, 4, 5, 19, 7, NULL, 2, 7, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(206, '11775070-1c1a-11ee-9ddc-702771c071f4', '20233010', 'Siswanto', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 61, 4, 3, 13, 26, NULL, 2, 7, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(207, '1177512d-1c1a-11ee-9ddc-702771c071f4', '90000324', 'Abdul Wahab', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 64, 5, 2, 7, 17, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(208, '117751e4-1c1a-11ee-9ddc-702771c071f4', '91600027', 'Paramitha Prameswari Putri', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 67, 5, 2, 12, 23, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(209, '117752a2-1c1a-11ee-9ddc-702771c071f4', '91600026', 'Cindy Tri Oktavia', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 66, 5, 3, 8, 131, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(210, '1177535f-1c1a-11ee-9ddc-702771c071f4', '20123010', 'Caroline Fernandez', '', '', '', '', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '0000-00-00', 1, 'L', 65, 5, 5, 7, 17, 7, 2, 3, NULL, 0, 1, '2023-07-06 23:19:23', '2023-07-14 13:50:43'),
(211, '1177541d-1c1a-11ee-9ddc-702771c071f4', '91600102', 'Mustika Arya Dewi', NULL, NULL, NULL, '91600102@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 69, 5, 6, NULL, 8, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(212, '117754e2-1c1a-11ee-9ddc-702771c071f4', NULL, 'Desi Yulinar', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 71, 5, 1, NULL, 1, NULL, 1, 6, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(213, '117755a9-1c1a-11ee-9ddc-702771c071f4', '91600148', 'Adji Mayumi Vannia', '3571011701790000', '081214988094', 'Kp.Kedung gede', 'adji.vannia@medcoenergi.com', NULL, '$2y$10$tSGvFL/2rQ7WXuVQJbR43uzBRMWQYFUy4bVfMvkxxGfHIJDXshh/S', '2018-02-07', 3, 'P', 70, 5, 2, 1, 2, 1, 1, 6, '1688715108', 0, 1, '2023-07-06 23:19:23', '2023-07-07 14:31:15'),
(214, '11775668-1c1a-11ee-9ddc-702771c071f4', '92001539', 'Nadya Ridzqi Amalia', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 68, 5, 7, NULL, 16, NULL, 1, 6, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(215, '1177572c-1c1a-11ee-9ddc-702771c071f4', NULL, 'Tengku Shahindra', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 72, 5, 2, 12, 23, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(216, '117757ee-1c1a-11ee-9ddc-702771c071f4', NULL, 'Willy Hardhika', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 64, 5, 2, 7, 134, NULL, 1, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(217, '117758ae-1c1a-11ee-9ddc-702771c071f4', '91600071', 'Darisman', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 74, 6, 5, 19, 56, NULL, 2, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(218, '1177596b-1c1a-11ee-9ddc-702771c071f4', '90000815', 'Zaldy Sofyan', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 73, 5, 5, 7, 17, NULL, 2, 6, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(219, '11775c20-1c1a-11ee-9ddc-702771c071f4', '91600097', 'Achmad Nur Firmanto', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 75, 6, 5, 19, 56, NULL, 2, 6, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(220, '11775cdf-1c1a-11ee-9ddc-702771c071f4', '91600095', 'Andi Lao', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 76, 6, 5, 19, 56, NULL, 2, 6, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(221, '11775d99-1c1a-11ee-9ddc-702771c071f4', NULL, 'Andrie Dhalles ', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 76, 6, 5, 19, 56, NULL, 2, 6, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(222, '11775e55-1c1a-11ee-9ddc-702771c071f4', NULL, 'Ruslan', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 77, 6, 5, 19, 56, NULL, 2, 6, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(223, '11775f19-1c1a-11ee-9ddc-702771c071f4', '91600088', 'Tarmuji', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 77, 6, 5, 19, 56, NULL, 2, 6, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(224, '11775fd4-1c1a-11ee-9ddc-702771c071f4', NULL, 'Maghfuri', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 77, 6, 5, 19, 56, NULL, 2, 6, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(225, '1177608f-1c1a-11ee-9ddc-702771c071f4', NULL, 'Ahyar', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 77, 6, 5, 19, 56, NULL, 2, 6, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(226, '11776149-1c1a-11ee-9ddc-702771c071f4', '91600098', 'Damar', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 77, 6, 5, 19, 56, NULL, 2, 6, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(227, '11776254-1c1a-11ee-9ddc-702771c071f4', '91600067', 'Ardi Gumelar', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 78, 6, 5, 11, 81, NULL, 2, 6, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(228, '1177631e-1c1a-11ee-9ddc-702771c071f4', '91600083', 'Nur halim, S.IP', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 78, 6, 5, 11, 81, NULL, 2, 6, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(229, '117763db-1c1a-11ee-9ddc-702771c071f4', '90800024', 'Yopie Handrian ', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 79, 6, 6, 3, 8, NULL, 2, 3, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(230, '11776495-1c1a-11ee-9ddc-702771c071f4', '91600046', 'Muhammad Ifdal Akbar', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 80, 6, 4, 9, 20, NULL, 1, 6, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(231, '11776551-1c1a-11ee-9ddc-702771c071f4', NULL, 'Ali Akbar Sammalis Galenggang Nasution', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 81, 6, 5, 20, NULL, NULL, 2, NULL, NULL, 0, 1, '2023-07-06 23:19:23', NULL),
(232, '11776615-1c1a-11ee-9ddc-702771c071f4', NULL, 'Rusmin Hidayat', NULL, NULL, NULL, NULL, NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, NULL, 56, 6, 5, 21, NULL, NULL, 2, NULL, NULL, 0, 1, '2023-07-06 23:19:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_employee_old`
--

CREATE TABLE `m_employee_old` (
  `id_employee` int(11) NOT NULL,
  `id_uuid` varchar(100) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `nama` text DEFAULT NULL,
  `nik` varchar(45) DEFAULT NULL,
  `no_hp` varchar(45) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `id_employee_status` int(11) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `id_company` int(11) DEFAULT NULL,
  `id_departemen` int(11) DEFAULT NULL,
  `id_section` int(11) DEFAULT NULL,
  `parent_position_id` int(11) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `id_base` int(11) DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL,
  `pass_reset` varchar(100) DEFAULT NULL,
  `allow_broadcast` int(11) DEFAULT 0,
  `aktif` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `m_employee_old`
--

INSERT INTO `m_employee_old` (`id_employee`, `id_uuid`, `code`, `nama`, `nik`, `no_hp`, `alamat`, `email`, `foto`, `password`, `tanggal_lahir`, `id_employee_status`, `jenis_kelamin`, `id_jabatan`, `id_company`, `id_departemen`, `id_section`, `parent_position_id`, `position_id`, `id_base`, `id_level`, `pass_reset`, `allow_broadcast`, `aktif`, `created_at`, `updated_at`) VALUES
(174, 'fb2c8ab4-e6ef-11ed-8239-8c48c505c8dd', '20213001', 'DEDY PARSAORAN SIANTURI', '3217011509760007', '0818176919', '', '20213001@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1976-09-15', 2, 'L', 5, 1, 4, 94, 128, 0, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', '2023-07-01 14:34:29'),
(175, 'fb2b7d18-e6ef-11ed-8239-8c48c505c8dd', '20213003', 'DWI MARYATI', '3175045112650002', '0811162426', NULL, '20213003@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1965-12-11', 2, 'P', 42, NULL, 4, 45, 46, 45, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(176, 'fb2b5842-e6ef-11ed-8239-8c48c505c8dd', '20213004', 'RICHARD ANGLO RUMAMBY', '3173050110670001', '0811984314', '', '20213004@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1967-10-01', 2, 'L', 19, 2, 9, 43, 10, 0, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', '2023-07-01 15:41:05'),
(177, 'fb2b4ad2-e6ef-11ed-8239-8c48c505c8dd', '20213005', 'TOMPINER S. NAIBAHO', '3201071709710010', '0811105614', NULL, '20213005@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1971-09-17', 2, 'L', 30, NULL, 4, 33, 46, 33, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(178, 'fb2bf13a-e6ef-11ed-8239-8c48c505c8dd', '91600102', 'MUSTIKA ARYA DEWI', '3511116307970001', '082245966747', NULL, '91600102@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1997-07-23', 1, 'P', 56, NULL, 7, 59, 57, 59, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(179, 'fb2c93c4-e6ef-11ed-8239-8c48c505c8dd', '20213006', 'ANDRE MANUEL WINOKAN', '3275112504750006', '08115407250', '', '20213006@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1975-04-25', 2, 'L', 20, 2, 4, 96, 128, 0, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', '2023-07-01 15:42:12'),
(180, 'fb2b86be-e6ef-11ed-8239-8c48c505c8dd', '20213007', 'KRISNA', '1674011804740006', '08127104019', NULL, '20213007@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1974-04-18', 2, 'L', 43, NULL, 4, 46, NULL, 46, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(181, 'fb2bf54a-e6ef-11ed-8239-8c48c505c8dd', '20213010', 'ANDHIYONO', '3174072501670003', '08118587382', NULL, '20213010@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1967-01-25', 2, 'L', 57, NULL, 6, 60, 46, 60, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(182, 'fb2bed52-e6ef-11ed-8239-8c48c505c8dd', '20213009', 'TANTO RETIJONO', '3175031810710011', '08111624416', '', '20213009@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1971-10-18', 2, 'L', 8, 1, 6, 57, 8, 0, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', '2023-07-01 14:24:37'),
(183, 'fb2c5dbe-e6ef-11ed-8239-8c48c505c8dd', '20213008', 'YUSUF PRIJONO', '3517102411700001', '08119109466', '', '20213008@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1970-11-24', 2, 'L', 7, 1, 5, 80, 14, 0, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', '2023-07-01 14:25:41'),
(184, 'fb2cc290-e6ef-11ed-8239-8c48c505c8dd', '20213011', 'AVIANTORO NUGROHO', '3174102403830009', '081380639633', '', '20213011@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1983-03-24', 2, 'L', 8, 2, 6, 107, 13, 0, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', '2023-07-01 15:43:19'),
(185, 'fb2c4f04-e6ef-11ed-8239-8c48c505c8dd', '91600104', 'NISA NURJANAH', '', '', NULL, '91600104@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, 1, 'P', 74, NULL, 7, 77, 8, 77, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(186, 'fb2b12e2-e6ef-11ed-8239-8c48c505c8dd', 'TKJP0074', 'SUDARSONO', '', '085310809174', NULL, '', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, 1, 'L', 20, NULL, 7, 20, 42, 20, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(187, 'fb290b78-e6ef-11ed-8239-8c48c505c8dd', 'TKJP0075', 'MUHAMMAD ROISI\r\n', '', '', NULL, '', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, 1, 'L', 5, NULL, 4, 5, 80, 5, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(188, 'fb2c53aa-e6ef-11ed-8239-8c48c505c8dd', 'TKJP0076', 'ANTO WIJAYA', '', '', NULL, '', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, 1, 'L', 75, NULL, 9, 2, 80, 2, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(189, 'fb28f5de-e6ef-11ed-8239-8c48c505c8dd', 'TKJP0077', 'WAHYUDI', '', '', NULL, '', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, 1, 'L', 2, NULL, 6, 2, 80, 2, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(190, 'fb2cf738-e6ef-11ed-8239-8c48c505c8dd', 'TKJP0078', 'MUHAMMAD SYAHRIR', '', '', NULL, '', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, 1, 'L', 103, NULL, 1, 3, 107, 3, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(191, 'fb2cf7a6-e6ef-11ed-8239-8c48c505c8dd', 'TKJP0079', 'RIADI', '', '', NULL, '', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, 1, 'L', 103, NULL, 5, 3, 107, 3, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(192, 'fb28f692-e6ef-11ed-8239-8c48c505c8dd', 'TKJP0080', 'HABIBIE', '', '', NULL, '', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, 1, 'L', 2, NULL, 3, 2, 80, 2, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(193, 'fb28f728-e6ef-11ed-8239-8c48c505c8dd', 'TKJP0081', 'MUHAMMAD ROZAQI', '', '', NULL, '', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, 1, 'L', 2, NULL, 1, 1, 80, 1, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(194, 'fb2beae6-e6ef-11ed-8239-8c48c505c8dd', '20213012', 'DONI NOVIANTO', '3275092011760013', '08118842076', NULL, '20213012@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1976-11-20', 3, 'L', 53, NULL, 5, 56, 57, 56, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(195, 'fb29270c-e6ef-11ed-8239-8c48c505c8dd', '20213013', 'SIGIT PRAYITNO', '3375031308890005', '08118703132', NULL, '20120124@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1989-08-13', 2, 'L', 9, NULL, 1, 9, 19, 9, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(196, 'fb2ca576-e6ef-11ed-8239-8c48c505c8dd', '20213014', 'M. OKTA RIZALDI', '3578101106960012', '628133059024', NULL, '20213014@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1996-06-11', 3, 'L', 94, NULL, 7, 100, 27, 100, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(197, 'fb2afaa0-e6ef-11ed-8239-8c48c505c8dd', '20213015', 'IRWAN ISKANDAR', '3271020311760005', '628111390522', '', '20213015@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1976-11-03', 2, 'L', 9, 1, 7, 16, 16, 0, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', '2023-07-01 14:26:46'),
(198, 'fb2beef6-e6ef-11ed-8239-8c48c505c8dd', '91600103', 'STEFANUS TRI NUGROHO', '', '', NULL, '91600103@MEDCOENERGI.COM', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, 1, 'L', 55, NULL, 7, 58, 61, 58, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(199, 'fb2b13a0-e6ef-11ed-8239-8c48c505c8dd', 'TKJP0082', 'FIRMANSYAH', NULL, NULL, NULL, '', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, 1, NULL, 20, NULL, 8, 21, 80, 21, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(200, 'fb2b0838-e6ef-11ed-8239-8c48c505c8dd', '20223003', 'ARUM PRABOWO', '', '', NULL, 'ARUM.PRABOWO@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1977-02-26', 2, 'L', 19, NULL, 1, 19, 18, 19, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(201, 'fb2b8132-e6ef-11ed-8239-8c48c505c8dd', '20223004', 'ABIMANYU SURYADI', '', '', NULL, '20223004@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1979-07-06', 2, 'L', 42, NULL, 7, 45, 46, 45, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(202, 'fb2847ec-e6ef-11ed-8239-8c48c505c8dd', 'guest', 'GUEST', '', '', NULL, '', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, '', 1, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(203, 'fb2c6b42-e6ef-11ed-8239-8c48c505c8dd', '20223005', 'DONY BONA VENA', '', '', NULL, '20223005@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, 4, 'L', 80, NULL, 8, 86, 107, 86, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(204, 'fb28eb84-e6ef-11ed-8239-8c48c505c8dd', 'admin', 'admin', '', '', NULL, '', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, NULL, '', 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(205, 'fb2b8790-e6ef-11ed-8239-8c48c505c8dd', '20223008', 'Djudjuwanto', '3674012811730004', '08121045049', '', '20223008@medcoenergi.com', NULL, '$2y$10$22vOeVk6Yjn27qM7CegReu/L2OBtoktg9PEUoxxjvH6/6ZzJkWWue', '1973-11-28', 2, 'L', 10, 1, 8, 46, NULL, 0, NULL, NULL, NULL, 1, 1, '2023-04-30 07:43:10', '2023-07-01 14:27:33'),
(206, 'fb2c5e72-e6ef-11ed-8239-8c48c505c8dd', '20223006', 'AUDY ARMYANTO', '3201020201760010', '081367727432', '', '20223006@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1976-01-02', 2, 'L', 7, 2, 5, 81, 14, 0, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', '2023-07-01 15:44:19'),
(207, 'fb2cb584-e6ef-11ed-8239-8c48c505c8dd', '20223010', 'PRAYUDHA ERLANGGA BARNAS', '3374110709780006', '08127362099', '', '20223010@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1981-02-16', 2, 'L', 22, 2, 3, 104, 10, 0, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', '2023-07-01 15:44:56'),
(208, 'fb2b780e-e6ef-11ed-8239-8c48c505c8dd', '91600148', 'Adji Mayumi Vannia', '3172046411950004', '', '', '91600148@medcoenergi.com', NULL, '$2y$10$wgadNa1FldMvnlROToAVVeqw4B6RiPNuJfMD1F.n2ZX2qBfImZkcC', '0000-00-00', 2, 'P', 70, 1, 2, 44, 30, 0, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', '2023-07-01 21:57:50'),
(209, 'fb2cf81e-e6ef-11ed-8239-8c48c505c8dd', 'TKJP0083', 'SELAMET RIANSYAH', '6406072512920001', '085391034658', NULL, '', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1992-12-25', 1, 'L', 103, NULL, 9, 3, 107, 3, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(211, 'fb2be58c-e6ef-11ed-8239-8c48c505c8dd', '20223011', 'PULUH AGUS NAMPAN RIANTO', '3276021008680030', '0811144967', '', '20223011@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1968-08-10', 2, 'L', 23, 2, 2, 54, 11, 0, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', '2023-07-01 15:46:09'),
(212, 'fb2c65d4-e6ef-11ed-8239-8c48c505c8dd', 'TKJP0084', 'Arif Prakosa', '3275050308640011', '021658326', NULL, 'oryx@oryx.co.id', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1964-08-03', 1, 'L', 79, NULL, 9, 85, 71, 85, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(213, 'fb2b8218-e6ef-11ed-8239-8c48c505c8dd', '20223012', 'FRANSISCA GERONICA', '3173025909810009', '', '', 'FRANSISCA.GERONICA@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1981-09-19', 2, 'P', 11, 1, 2, 45, 10, 0, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', '2023-07-01 14:28:40'),
(214, 'fb2d0a66-e6ef-11ed-8239-8c48c505c8dd', '91600153', 'DESI YULINAR', '1671015011980002', '081286003070', NULL, 'DESI.YULINAR@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1981-10-20', 1, 'P', 107, NULL, 1, 114, 115, 114, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(215, 'fb2d01e2-e6ef-11ed-8239-8c48c505c8dd', 'TKJP0085', 'MUKADIN', '3578152607690004', '', NULL, 'security.supervisor@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1969-07-26', 1, 'L', 105, NULL, 6, 3, 107, 3, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(216, 'fb2c6ec6-e6ef-11ed-8239-8c48c505c8dd', '20233001', 'Irfano Budiyanto', '3276026304610023', '628129624390', '', 'Irfano.Budiyanto@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1971-01-14', 2, 'L', 24, 0, 2, 87, 11, 0, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', '2023-07-01 15:46:56'),
(217, 'fb2d025a-e6ef-11ed-8239-8c48c505c8dd', '91623006', 'HERIANSYAH', '', '', NULL, 'Heriansyah.Heriansyah@energibiz.com\r\n', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', NULL, 1, 'L', 105, NULL, 2, 3, 107, 3, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', NULL),
(218, 'fb2bf5cc-e6ef-11ed-8239-8c48c505c8dd', '20233006', 'Ricky Therademaker', '3374020312680001', '08118587382', '', 'Ricky.Therademaker0@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1968-12-03', 2, 'L', 13, 1, 6, 60, 10, 0, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', '2023-07-01 14:31:19'),
(219, 'fb293f94-e6ef-11ed-8239-8c48c505c8dd', '20233007', 'Carla Femilia', '3174055809780015', '08118898886', '', 'Carla.Femilia@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1978-09-18', 2, 'P', 25, 2, 3, 11, 22, 0, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', '2023-07-01 15:47:46'),
(220, 'fb2b4bcc-e6ef-11ed-8239-8c48c505c8dd', '20233008', 'CAHYO NUGROHO', '3308012212780002', '0811584891', '', 'Cahyo.Nugroho@medcoenergi.com', NULL, '$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq', '1973-10-12', 2, 'L', 14, 1, 5, 33, 14, 0, NULL, NULL, NULL, 0, 1, '2023-04-30 07:43:10', '2023-07-01 14:32:38'),
(225, '250a5868-17e1-11ee-9ddc-702771c071f4', '20233005', 'Ahmad Nasrul Hakim', '', '', '', '', NULL, '$2y$10$xP3SYwXIISbje63R3roYuOhquFz3q0XdyuaYUxG23k/XYdzRbxGAS', '0000-00-00', 2, 'L', 12, 1, 9, NULL, 19, 0, NULL, NULL, NULL, 0, 1, '2023-07-01 14:30:24', NULL),
(230, 'bc181633-17ec-11ee-9ddc-702771c071f4', '20233013', 'Firly Saniristy', '0', '0', '-', '-', NULL, '$2y$10$rQBzR8/CtUNlRisgVCjkj.tP2HRHNGNzhjeRlwiL5yI91aJtlJJ/2', '2023-07-01', 2, 'L', 26, 2, 3, NULL, 22, 0, NULL, NULL, NULL, 0, 1, '2023-07-01 15:53:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_employee_status`
--

CREATE TABLE `m_employee_status` (
  `id_employee_status` int(11) NOT NULL,
  `id_uuid` varchar(100) DEFAULT NULL,
  `employee_status` text DEFAULT NULL,
  `aktif` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `m_employee_status`
--

INSERT INTO `m_employee_status` (`id_employee_status`, `id_uuid`, `employee_status`, `aktif`, `created_at`, `updated_at`) VALUES
(1, '77737bd6-e444-11ed-8239-8c48c505c8dd', 'Outsource', 1, '2023-04-26 22:10:23', NULL),
(2, '7773813a-e444-11ed-8239-8c48c505c8dd', 'Permanent', 1, '2023-04-26 22:10:23', NULL),
(3, '77738216-e444-11ed-8239-8c48c505c8dd', 'PWT', 1, '2023-04-26 22:10:23', NULL),
(4, '7773827a-e444-11ed-8239-8c48c505c8dd', 'PWTT', 1, '2023-04-26 22:10:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_jabatan`
--

CREATE TABLE `m_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `id_uuid` varchar(100) DEFAULT NULL,
  `jabatan` text DEFAULT NULL,
  `aktif` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `m_jabatan`
--

INSERT INTO `m_jabatan` (`id_jabatan`, `id_uuid`, `jabatan`, `aktif`, `created_at`, `updated_at`) VALUES
(1, 'fc33a1f6-1c03-11ee-9ddc-702771c071f4', 'Technical Planning Manager', 1, '2023-07-06 20:49:28', NULL),
(2, 'fc33a70b-1c03-11ee-9ddc-702771c071f4', 'Relations Section Head', 1, '2023-07-06 20:49:28', NULL),
(3, 'fc33a829-1c03-11ee-9ddc-702771c071f4', 'G & G Section Head', 1, '2023-07-06 20:49:28', NULL),
(4, 'fc33a8fd-1c03-11ee-9ddc-702771c071f4', 'Buyer', 1, '2023-07-06 20:49:28', NULL),
(5, 'fc33a9cf-1c03-11ee-9ddc-702771c071f4', 'Project Construction Section Head', 1, '2023-07-06 20:49:28', NULL),
(6, 'fc33abd0-1c03-11ee-9ddc-702771c071f4', 'Project Planning & Control Section Head', 1, '2023-07-06 20:49:28', NULL),
(7, 'fc33ac9b-1c03-11ee-9ddc-702771c071f4', 'Operations Superintendent', 1, '2023-07-06 20:49:28', NULL),
(8, 'fc33ad5f-1c03-11ee-9ddc-702771c071f4', 'QHSE Section Head', 1, '2023-07-06 20:49:28', NULL),
(9, 'fc33ae19-1c03-11ee-9ddc-702771c071f4', 'Drilling & WOWS Section Head', 1, '2023-07-06 20:49:28', NULL),
(10, 'fc33aed1-1c03-11ee-9ddc-702771c071f4', 'General Manager', 1, '2023-07-06 20:49:28', NULL),
(11, 'fc33af88-1c03-11ee-9ddc-702771c071f4', 'General Affairs Manager', 1, '2023-07-06 20:49:28', NULL),
(12, 'fc33b03d-1c03-11ee-9ddc-702771c071f4', 'Finance & Treasury Section Head', 1, '2023-07-06 20:49:28', NULL),
(13, 'fc33b0f5-1c03-11ee-9ddc-702771c071f4', 'QHSSE Manager', 1, '2023-07-06 20:49:28', NULL),
(14, 'fc33b1aa-1c03-11ee-9ddc-702771c071f4', 'Field Manager', 1, '2023-07-06 20:49:28', NULL),
(15, 'fc33b262-1c03-11ee-9ddc-702771c071f4', 'Engineering Section Head', 1, '2023-07-06 20:49:28', NULL),
(16, 'fc33b31a-1c03-11ee-9ddc-702771c071f4', 'Drilling Manager', 1, '2023-07-06 20:49:28', NULL),
(17, 'fc33b3d3-1c03-11ee-9ddc-702771c071f4', 'General Services Sr Officer', 1, '2023-07-06 20:49:28', NULL),
(18, 'fc33b487-1c03-11ee-9ddc-702771c071f4', 'Field Buyer', 1, '2023-07-06 20:49:28', NULL),
(19, 'fc33b53b-1c03-11ee-9ddc-702771c071f4', 'Finance Manager', 1, '2023-07-06 20:49:28', NULL),
(20, 'fc33b5eb-1c03-11ee-9ddc-702771c071f4', 'Project Facilities Engineering Section Head', 1, '2023-07-06 20:49:28', NULL),
(21, 'fc33b6a3-1c03-11ee-9ddc-702771c071f4', 'Security Section Head', 1, '2023-07-06 20:49:28', NULL),
(22, 'fc33b754-1c03-11ee-9ddc-702771c071f4', 'Supply Chain Management Manager', 1, '2023-07-06 20:49:28', NULL),
(23, 'fc33b803-1c03-11ee-9ddc-702771c071f4', 'HR Section Head', 1, '2023-07-06 20:49:28', NULL),
(24, 'fc33b8b4-1c03-11ee-9ddc-702771c071f4', 'Organization Development & Industrial Relations Analyst', 1, '2023-07-06 20:49:28', NULL),
(25, 'fc33b968-1c03-11ee-9ddc-702771c071f4', 'Contract Analyst', 1, '2023-07-06 20:49:28', NULL),
(26, 'fc33ba19-1c03-11ee-9ddc-702771c071f4', 'Material & Logistic Section Head', 1, '2023-07-06 20:49:28', NULL),
(27, 'fc33baca-1c03-11ee-9ddc-702771c071f4', 'HRIS & Employees Services Analyst', 1, '2023-07-06 20:49:28', NULL),
(28, 'fc33bb78-1c03-11ee-9ddc-702771c071f4', 'Tax & Treasury Accountant', 1, '2023-07-06 20:49:28', NULL),
(29, 'fc33bc26-1c03-11ee-9ddc-702771c071f4', 'C&B And Payroll Analyst', 1, '2023-07-06 20:49:28', NULL),
(30, 'fc33bcd5-1c03-11ee-9ddc-702771c071f4', 'Information & Communication Technology Analyst', 1, '2023-07-06 20:49:28', NULL),
(31, 'fc33bd89-1c03-11ee-9ddc-702771c071f4', 'Industrial Hygine Analyst', 1, '2023-07-06 20:49:28', NULL),
(32, 'fc33be33-1c03-11ee-9ddc-702771c071f4', 'Legal Counsel', 1, '2023-07-06 20:49:28', NULL),
(33, 'fc33bedd-1c03-11ee-9ddc-702771c071f4', 'Materials Management Analyst', 1, '2023-07-06 20:49:28', NULL),
(34, 'fc33bf92-1c03-11ee-9ddc-702771c071f4', 'Production Operations Supervisor', 1, '2023-07-06 20:49:28', NULL),
(35, 'fc33c040-1c03-11ee-9ddc-702771c071f4', 'JV Reporting Accountant', 1, '2023-07-06 20:49:28', NULL),
(36, 'fc33c0ee-1c03-11ee-9ddc-702771c071f4', 'Petroleum Engineer', 1, '2023-07-06 20:49:28', NULL),
(37, 'fc33c19e-1c03-11ee-9ddc-702771c071f4', 'Talent Development Analyst', 1, '2023-07-06 20:49:28', NULL),
(38, 'fc33c250-1c03-11ee-9ddc-702771c071f4', 'Production Geologist', 1, '2023-07-06 20:49:28', NULL),
(39, 'fc33c302-1c03-11ee-9ddc-702771c071f4', 'Field HSE Analyst', 1, '2023-07-06 20:49:28', NULL),
(40, 'fc33c3b1-1c03-11ee-9ddc-702771c071f4', 'Drilling Contract Analyst', 1, '2023-07-06 20:49:28', NULL),
(41, 'fc33c460-1c03-11ee-9ddc-702771c071f4', 'Electrical Engineer', 1, '2023-07-06 20:49:28', NULL),
(42, 'fc33c511-1c03-11ee-9ddc-702771c071f4', 'Occupational Health Analyst', 1, '2023-07-06 20:49:28', NULL),
(43, 'fc33c5c0-1c03-11ee-9ddc-702771c071f4', 'Production Operator', 1, '2023-07-06 20:49:28', NULL),
(44, 'fc33c66e-1c03-11ee-9ddc-702771c071f4', 'Well, Pipeline, Jetty Operator', 1, '2023-07-06 20:49:28', NULL),
(45, 'fc33c783-1c03-11ee-9ddc-702771c071f4', 'Exploration Geologist', 1, '2023-07-06 20:49:28', NULL),
(46, 'fc33c830-1c03-11ee-9ddc-702771c071f4', 'Cost Performance Analyst', 1, '2023-07-06 20:49:28', NULL),
(47, 'fc33c8db-1c03-11ee-9ddc-702771c071f4', 'Process Engineer', 1, '2023-07-06 20:49:28', NULL),
(48, 'fc33c988-1c03-11ee-9ddc-702771c071f4', 'Environment Analyst', 1, '2023-07-06 20:49:28', NULL),
(49, 'fc33ca3b-1c03-11ee-9ddc-702771c071f4', 'Geophisicist', 1, '2023-07-06 20:49:28', NULL),
(50, 'fc33caec-1c03-11ee-9ddc-702771c071f4', 'Civil Engineer', 1, '2023-07-06 20:49:28', NULL),
(51, 'fc33cba7-1c03-11ee-9ddc-702771c071f4', 'Secretary', 1, '2023-07-06 20:49:28', NULL),
(52, 'fc33cc4f-1c03-11ee-9ddc-702771c071f4', 'Communication & Relations Officer', 1, '2023-07-06 20:49:28', NULL),
(53, 'fc33ccfb-1c03-11ee-9ddc-702771c071f4', 'Mechanical & Piping Engineer', 1, '2023-07-06 20:49:28', NULL),
(54, 'fc33cdaa-1c03-11ee-9ddc-702771c071f4', 'Safety & ERCM Analyst', 1, '2023-07-06 20:49:28', NULL),
(55, 'fc33ce59-1c03-11ee-9ddc-702771c071f4', 'Field Relations Officer', 1, '2023-07-06 20:49:28', NULL),
(56, 'fc33cf07-1c03-11ee-9ddc-702771c071f4', 'Maintenance Supervisor', 1, '2023-07-06 20:49:28', NULL),
(57, 'fc33cfb9-1c03-11ee-9ddc-702771c071f4', 'Operations Security Officer', 1, '2023-07-06 20:49:28', NULL),
(58, 'fc33d06d-1c03-11ee-9ddc-702771c071f4', 'AP/AR Accountant', 1, '2023-07-06 20:49:28', NULL),
(59, 'fc33d122-1c03-11ee-9ddc-702771c071f4', 'Maintenance Planner & Controller', 1, '2023-07-06 20:49:28', NULL),
(60, 'fc33d23a-1c03-11ee-9ddc-702771c071f4', 'Maintenance Support Supervisor', 1, '2023-07-06 20:49:28', NULL),
(61, 'fc33d2e7-1c03-11ee-9ddc-702771c071f4', 'Area Warehouse Supervior', 1, '2023-07-06 20:49:28', NULL),
(62, 'fc33d39a-1c03-11ee-9ddc-702771c071f4', 'Process Safety Assurance Analyst', 1, '2023-07-06 20:49:28', NULL),
(63, 'fc33d487-1c03-11ee-9ddc-702771c071f4', 'Material & Asset Accountant', 1, '2023-07-06 20:49:28', NULL),
(64, 'fc33d537-1c03-11ee-9ddc-702771c071f4', 'General Services Administration', 1, '2023-07-06 20:49:28', NULL),
(65, 'fc33d5e3-1c03-11ee-9ddc-702771c071f4', 'Tarakan Office Administration', 1, '2023-07-06 20:49:28', NULL),
(66, 'fc33d691-1c03-11ee-9ddc-702771c071f4', 'Procurement Support Analyst', 1, '2023-07-06 20:49:28', NULL),
(67, 'fc33d73e-1c03-11ee-9ddc-702771c071f4', 'HR Administration', 1, '2023-07-06 20:49:28', NULL),
(68, 'fc33d7ea-1c03-11ee-9ddc-702771c071f4', 'Driling Clerk', 1, '2023-07-06 20:49:28', NULL),
(69, 'fc33d895-1c03-11ee-9ddc-702771c071f4', 'QHSSE Administration', 1, '2023-07-06 20:49:28', NULL),
(70, 'fc33d945-1c03-11ee-9ddc-702771c071f4', 'General Affairs Clerk', 1, '2023-07-06 20:49:28', NULL),
(71, 'fc33da09-1c03-11ee-9ddc-702771c071f4', 'Technical Planning Clerk', 1, '2023-07-06 20:49:28', NULL),
(72, 'fc33dac0-1c03-11ee-9ddc-702771c071f4', 'HR Consultant', 1, '2023-07-06 20:49:28', NULL),
(73, 'fc33db6f-1c03-11ee-9ddc-702771c071f4', 'Admin Tarakan Office', 1, '2023-07-06 20:49:28', NULL),
(74, 'fc33dc21-1c03-11ee-9ddc-702771c071f4', 'Supervisor Maintenance Support', 1, '2023-07-06 20:49:28', NULL),
(75, 'fc33dcd4-1c03-11ee-9ddc-702771c071f4', 'Foreman', 1, '2023-07-06 20:49:28', NULL),
(76, 'fc33dd89-1c03-11ee-9ddc-702771c071f4', 'Maintenance Technician', 1, '2023-07-06 20:49:28', NULL),
(77, 'fc33de3b-1c03-11ee-9ddc-702771c071f4', 'Support Technician', 1, '2023-07-06 20:49:28', NULL),
(78, 'fc33deef-1c03-11ee-9ddc-702771c071f4', 'Field Admin', 1, '2023-07-06 20:49:28', NULL),
(79, 'fc33dfa9-1c03-11ee-9ddc-702771c071f4', 'Field HSE Officer', 1, '2023-07-06 20:49:28', NULL),
(80, 'fc33e05c-1c03-11ee-9ddc-702771c071f4', 'Project Clerk', 1, '2023-07-06 20:49:28', NULL),
(81, 'fc33e112-1c03-11ee-9ddc-702771c071f4', 'Production Supervisor', 1, '2023-07-06 20:49:28', NULL),
(128, '258bd3bc-1c74-11ee-9ddc-702771c071f4', 'Legal & Commercial Section Head', 1, '2023-07-07 10:12:46', NULL),
(129, '86353d74-1c74-11ee-9ddc-702771c071f4', 'Project Manager', 1, '2023-07-07 10:15:28', NULL),
(130, 'c57b2ac3-1c74-11ee-9ddc-702771c071f4', 'Drilling Support Section Head', 1, '2023-07-07 10:17:14', NULL),
(131, '428a69af-1c75-11ee-9ddc-702771c071f4', 'Procurement & Systems Section Head', 1, '2023-07-07 10:20:44', NULL),
(132, 'f3ebefb1-1c75-11ee-9ddc-702771c071f4', 'Accounting & Reporting Section Head', 1, '2023-07-07 10:25:41', NULL),
(133, '43fffea2-1c76-11ee-9ddc-702771c071f4', 'Operations Section Head', 1, '2023-07-07 10:27:56', NULL),
(134, 'b4c2f0da-1c76-11ee-9ddc-702771c071f4', 'General Services Hr Officer', 1, '2023-07-07 10:31:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_keluarga`
--

CREATE TABLE `m_keluarga` (
  `id_keluarga` int(11) NOT NULL,
  `id_uuid` text DEFAULT NULL,
  `id_employee` int(11) DEFAULT NULL,
  `status_keluarga` int(11) DEFAULT NULL,
  `nama` text DEFAULT NULL,
  `jenis_kelamin` varchar(2) DEFAULT NULL,
  `aktif` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_kondisi_kesehatan`
--

CREATE TABLE `m_kondisi_kesehatan` (
  `id_kondisi_kesehatan` int(11) NOT NULL,
  `id_uuid` text DEFAULT NULL,
  `kondisi_kesehatan` text DEFAULT NULL,
  `aktif` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `m_kondisi_kesehatan`
--

INSERT INTO `m_kondisi_kesehatan` (`id_kondisi_kesehatan`, `id_uuid`, `kondisi_kesehatan`, `aktif`, `created_at`, `updated_at`) VALUES
(1, '9d5084c2-07c9-11ee-abc0-98d5636f06cf', 'Sehat', 1, '2023-05-02 22:18:24', NULL),
(2, '9d5086c2-07c9-11ee-abc0-98d5636f06cf', 'Sakit', 1, '2023-05-02 22:18:24', '2023-05-23 00:30:50');

-- --------------------------------------------------------

--
-- Table structure for table `m_level`
--

CREATE TABLE `m_level` (
  `id_level` int(11) NOT NULL,
  `id_uuid` varchar(100) DEFAULT NULL,
  `level` text DEFAULT NULL,
  `aktif` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `m_level`
--

INSERT INTO `m_level` (`id_level`, `id_uuid`, `level`, `aktif`, `created_at`, `updated_at`) VALUES
(1, '4afaa22a-1c04-11ee-9ddc-702771c071f4', 'Manager', 1, '2023-07-06 20:51:56', NULL),
(2, '4afaa63b-1c04-11ee-9ddc-702771c071f4', 'Section Head', 1, '2023-07-06 20:51:56', NULL),
(3, '4afaa7ff-1c04-11ee-9ddc-702771c071f4', 'Staff', 1, '2023-07-06 20:51:56', NULL),
(4, '4afaa94e-1c04-11ee-9ddc-702771c071f4', 'Superintendent', 1, '2023-07-06 20:51:56', NULL),
(5, '4afaaa93-1c04-11ee-9ddc-702771c071f4', 'General Manager', 1, '2023-07-06 20:51:56', NULL),
(6, '4afaabd2-1c04-11ee-9ddc-702771c071f4', 'Non Staff', 1, '2023-07-06 20:51:56', NULL),
(7, '4afaad09-1c04-11ee-9ddc-702771c071f4', 'Supervisor', 1, '2023-07-06 20:51:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_log`
--

CREATE TABLE `m_log` (
  `id_log` int(11) NOT NULL,
  `id_uuid` varchar(100) DEFAULT NULL,
  `tabel_log` varchar(100) DEFAULT NULL,
  `jenis_log` varchar(55) DEFAULT NULL,
  `user_log` int(11) DEFAULT NULL,
  `date_log` datetime DEFAULT NULL,
  `data_log` text DEFAULT NULL,
  `ip` varchar(30) DEFAULT NULL,
  `os` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `platform` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `m_log`
--

INSERT INTO `m_log` (`id_log`, `id_uuid`, `tabel_log`, `jenis_log`, `user_log`, `date_log`, `data_log`, `ip`, `os`, `browser`, `platform`, `city`, `country`, `region`) VALUES
(1, NULL, 'm_employee', 'update', 1, '2023-07-01 14:10:31', '{\"id_employee\":\"160\",\"id_uuid\":\"fb2d0f7a-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20183005\",\"nama\":\"EDIN AKHMAD SYARIPUDIN\",\"nik\":\"3674010301810002\",\"no_hp\":\"08119100325\",\"alamat\":null,\"email\":\"20183005@MEDCOENERGI.COM\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1981-01-03\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"108\",\"id_company\":null,\"id_departemen\":\"4\",\"id_section\":\"115\",\"parent_position_id\":\"46\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"46\",\"departemen\":\"Project Development\",\"company\":null,\"jabatan\":null,\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Cost Performance Analyst\",\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(2, NULL, 'm_employee', 'update', 1, '2023-07-01 14:14:21', '{\"id_employee\":\"84\",\"id_uuid\":\"fb2ca012-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20183006\",\"nama\":\"INDRIYANI RASYID\",\"nik\":\"3172024411760011\",\"no_hp\":\"08111849513\",\"alamat\":null,\"email\":\"20183006@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1976-11-04\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"P\",\"id_jabatan\":\"93\",\"id_company\":null,\"id_departemen\":\"5\",\"id_section\":\"99\",\"parent_position_id\":\"45\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"45\",\"departemen\":\"Field\",\"company\":null,\"jabatan\":null,\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Exploration Geologist\",\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(3, NULL, 'm_employee', 'update', 1, '2023-07-01 14:15:45', '{\"id_employee\":\"162\",\"id_uuid\":\"fb2b5c2a-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20203010\",\"nama\":\"FANNY ROSDIAWAN\",\"nik\":\"3273161307840001\",\"no_hp\":\"08111244371\",\"alamat\":null,\"email\":\"20203010@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1984-07-13\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"34\",\"id_company\":null,\"id_departemen\":\"2\",\"id_section\":\"37\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"115\",\"departemen\":\"General Affairs\",\"company\":null,\"jabatan\":\"Production Operations Supervisor\",\"employee_status\":\"Permanent\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(4, NULL, 'm_employee', 'update', 1, '2023-07-01 14:18:36', '{\"id_employee\":\"172\",\"id_uuid\":\"fb2b4140-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20203014\",\"nama\":\"RINI NOVITASARI\",\"nik\":\"3173056611770007\",\"no_hp\":\"08129381239\",\"alamat\":null,\"email\":\"20203014@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1977-11-26\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"P\",\"id_jabatan\":\"28\",\"id_company\":null,\"id_departemen\":\"1\",\"id_section\":\"31\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"104\",\"departemen\":\"Technical Planning\",\"company\":null,\"jabatan\":\"Tax & Treasury Accountant\",\"employee_status\":\"Permanent\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(5, NULL, 'm_employee', 'update', 1, '2023-07-01 14:20:41', '{\"id_employee\":\"174\",\"id_uuid\":\"fb2c8ab4-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20213001\",\"nama\":\"DEDY PARSAORAN SIANTURI\",\"nik\":\"3217011509760007\",\"no_hp\":\"0818176919\",\"alamat\":null,\"email\":\"20213001@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1976-09-15\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"88\",\"id_company\":null,\"id_departemen\":\"3\",\"id_section\":\"94\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"95\",\"departemen\":\"Supply Chain Management\",\"company\":null,\"jabatan\":null,\"employee_status\":\"Permanent\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(6, NULL, 'm_employee', 'update', 1, '2023-07-01 14:21:30', '{\"id_employee\":\"173\",\"id_uuid\":\"fb2c86e0-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20213002\",\"nama\":\"PURNOMO RUSDIONO\",\"nik\":\"3277032705760005\",\"no_hp\":\"081219757323\",\"alamat\":null,\"email\":\"20213002@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1976-05-27\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"87\",\"id_company\":null,\"id_departemen\":\"6\",\"id_section\":\"93\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"95\",\"departemen\":\"QHSSE\",\"company\":null,\"jabatan\":null,\"employee_status\":\"Permanent\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(7, NULL, 'm_employee', 'update', 1, '2023-07-01 14:21:45', '{\"id_employee\":\"174\",\"id_uuid\":\"fb2c8ab4-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20213001\",\"nama\":\"DEDY PARSAORAN SIANTURI\",\"nik\":\"3217011509760007\",\"no_hp\":\"0818176919\",\"alamat\":\"\",\"email\":\"20213001@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1976-09-15\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"6\",\"id_company\":\"1\",\"id_departemen\":\"4\",\"id_section\":\"94\",\"parent_position_id\":\"6\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":\"2023-07-01 14:20:41\",\"section_parent\":\"95\",\"departemen\":\"Project Development\",\"company\":\"PERMANENT PERTAMINA SECONDEE\",\"jabatan\":\"Project Planning & Control Section Head\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Project Planning & Control Section Head\",\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(8, NULL, 'm_employee', 'update', 1, '2023-07-01 14:24:37', '{\"id_employee\":\"182\",\"id_uuid\":\"fb2bed52-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20213009\",\"nama\":\"TANTO RETIJONO\",\"nik\":\"3175031810710011\",\"no_hp\":\"08111624416\",\"alamat\":null,\"email\":\"20213009@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1971-10-18\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"54\",\"id_company\":null,\"id_departemen\":\"6\",\"id_section\":\"57\",\"parent_position_id\":\"60\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"60\",\"departemen\":\"QHSSE\",\"company\":null,\"jabatan\":\"Safety & ERCM Analyst\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Maintenance Support Supervisor\",\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(9, NULL, 'm_employee', 'update', 1, '2023-07-01 14:25:41', '{\"id_employee\":\"183\",\"id_uuid\":\"fb2c5dbe-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20213008\",\"nama\":\"YUSUF PRIJONO\",\"nik\":\"3517102411700001\",\"no_hp\":\"08119109466\",\"alamat\":null,\"email\":\"20213008@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1970-11-24\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"77\",\"id_company\":null,\"id_departemen\":\"4\",\"id_section\":\"80\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"81\",\"departemen\":\"Project Development\",\"company\":null,\"jabatan\":\"Support Technician\",\"employee_status\":\"Permanent\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(10, NULL, 'm_employee', 'update', 1, '2023-07-01 14:26:46', '{\"id_employee\":\"197\",\"id_uuid\":\"fb2afaa0-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20213015\",\"nama\":\"IRWAN ISKANDAR\",\"nik\":\"3271020311760005\",\"no_hp\":\"628111390522\",\"alamat\":null,\"email\":\"20213015@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1976-11-03\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"16\",\"id_company\":null,\"id_departemen\":\"6\",\"id_section\":\"16\",\"parent_position_id\":\"18\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"18\",\"departemen\":\"QHSSE\",\"company\":null,\"jabatan\":\"Drilling Manager\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Field Buyer\",\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(11, NULL, 'm_employee', 'update', 1, '2023-07-01 14:27:33', '{\"id_employee\":\"205\",\"id_uuid\":\"fb2b8790-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20223008\",\"nama\":\"Djudjuwanto\",\"nik\":\"3674012811730004\",\"no_hp\":\"08121045049\",\"alamat\":null,\"email\":\"20223008@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$22vOeVk6Yjn27qM7CegReu\\/L2OBtoktg9PEUoxxjvH6\\/6ZzJkWWue\",\"tanggal_lahir\":\"1973-11-28\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"43\",\"id_company\":null,\"id_departemen\":\"7\",\"id_section\":\"46\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"1\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":null,\"departemen\":\"Drilling \",\"company\":null,\"jabatan\":\"Production Operator\",\"employee_status\":\"Permanent\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(12, NULL, 'm_employee', 'update', 1, '2023-07-01 14:28:41', '{\"id_employee\":\"213\",\"id_uuid\":\"fb2b8218-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20223012\",\"nama\":\"FRANSISCA GERONICA\",\"nik\":\"3173025909810009\",\"no_hp\":\"\",\"alamat\":null,\"email\":\"FRANSISCA.GERONICA@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1981-09-19\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"P\",\"id_jabatan\":\"42\",\"id_company\":null,\"id_departemen\":\"9\",\"id_section\":\"45\",\"parent_position_id\":\"46\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"46\",\"departemen\":\"Finance\",\"company\":null,\"jabatan\":\"Occupational Health Analyst\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Cost Performance Analyst\",\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(13, NULL, 'm_employee', 'insert', 1, '2023-07-01 14:30:25', '{\"code\":\"20233005\",\"nama\":\"Ahmad Nasrul Hakim\",\"nik\":\"\",\"no_hp\":\"\",\"tanggal_lahir\":\"\",\"alamat\":\"\",\"password\":\"$2y$10$xP3SYwXIISbje63R3roYuOhquFz3q0XdyuaYUxG23k\\/XYdzRbxGAS\",\"email\":\"\",\"jenis_kelamin\":\"L\",\"parent_position_id\":\"19\",\"position_id\":\"\",\"id_jabatan\":\"12\",\"id_employee_status\":\"2\",\"id_company\":\"1\",\"id_departemen\":\"9\",\"aktif\":1}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(14, NULL, 'm_employee', 'update', 1, '2023-07-01 14:31:20', '{\"id_employee\":\"218\",\"id_uuid\":\"fb2bf5cc-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20233006\",\"nama\":\"Ricky Therademaker\",\"nik\":\"3374020312680001\",\"no_hp\":\"08118587382\",\"alamat\":null,\"email\":\"Ricky.Therademaker0@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1968-12-03\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"57\",\"id_company\":null,\"id_departemen\":\"3\",\"id_section\":\"60\",\"parent_position_id\":\"46\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"46\",\"departemen\":\"Supply Chain Management\",\"company\":null,\"jabatan\":\"Operations Security Officer\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Cost Performance Analyst\",\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(15, NULL, 'm_employee', 'update', 1, '2023-07-01 14:32:39', '{\"id_employee\":\"220\",\"id_uuid\":\"fb2b4bcc-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20233008\",\"nama\":\"CAHYO NUGROHO\",\"nik\":\"3308012212780002\",\"no_hp\":\"0811584891\",\"alamat\":null,\"email\":\"Cahyo.Nugroho@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1973-10-12\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"30\",\"id_company\":null,\"id_departemen\":\"8\",\"id_section\":\"33\",\"parent_position_id\":\"46\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"46\",\"departemen\":\"Management\",\"company\":null,\"jabatan\":\"Information & Communication Technology Analyst\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Cost Performance Analyst\",\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(16, NULL, 'm_jabatan', 'insert', 1, '2023-07-01 14:33:07', '{\"jabatan\":\"Project Manager\",\"aktif\":1}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(17, NULL, 'm_jabatan', 'insert', 1, '2023-07-01 14:33:27', '{\"jabatan\":\"Procurement &amp; System Section Head\",\"aktif\":1}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(18, NULL, 'm_employee', 'update', 1, '2023-07-01 14:34:29', '{\"id_employee\":\"174\",\"id_uuid\":\"fb2c8ab4-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20213001\",\"nama\":\"DEDY PARSAORAN SIANTURI\",\"nik\":\"3217011509760007\",\"no_hp\":\"0818176919\",\"alamat\":\"\",\"email\":\"20213001@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1976-09-15\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"5\",\"id_company\":\"1\",\"id_departemen\":\"4\",\"id_section\":\"94\",\"parent_position_id\":\"6\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":\"2023-07-01 14:21:45\",\"section_parent\":\"95\",\"departemen\":\"Project Development\",\"company\":\"PERMANENT PERTAMINA SECONDEE\",\"jabatan\":\"Project Construction Section Head\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Project Planning & Control Section Head\",\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(19, NULL, 'm_employee', 'update', 1, '2023-07-01 14:35:04', '{\"id_employee\":\"173\",\"id_uuid\":\"fb2c86e0-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20213002\",\"nama\":\"PURNOMO RUSDIONO\",\"nik\":\"3277032705760005\",\"no_hp\":\"081219757323\",\"alamat\":\"\",\"email\":\"20213002@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1976-05-27\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"6\",\"id_company\":\"1\",\"id_departemen\":\"4\",\"id_section\":\"93\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":\"2023-07-01 14:21:30\",\"section_parent\":\"95\",\"departemen\":\"Project Development\",\"company\":\"PERMANENT PERTAMINA SECONDEE\",\"jabatan\":\"Project Planning & Control Section Head\",\"employee_status\":\"Permanent\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(20, NULL, 'm_employee', 'update', 1, '2023-07-01 14:35:47', '{\"id_employee\":\"172\",\"id_uuid\":\"fb2b4140-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20203014\",\"nama\":\"RINI NOVITASARI\",\"nik\":\"3173056611770007\",\"no_hp\":\"08129381239\",\"alamat\":\"\",\"email\":\"20203014@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1977-11-26\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"P\",\"id_jabatan\":\"4\",\"id_company\":\"1\",\"id_departemen\":\"3\",\"id_section\":\"31\",\"parent_position_id\":\"66\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":\"2023-07-01 14:18:36\",\"section_parent\":\"104\",\"departemen\":\"Supply Chain Management\",\"company\":\"PERMANENT PERTAMINA SECONDEE\",\"jabatan\":\"Buyer\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Procurement Support Analyst\",\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(21, NULL, 'm_employee', 'update', 1, '2023-07-01 14:37:15', '{\"id_employee\":\"161\",\"id_uuid\":\"fb2b24b2-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20183009\",\"nama\":\"BALOK SUTARTO L\",\"nik\":\"3271021807710008\",\"no_hp\":\"08129674115\",\"alamat\":null,\"email\":\"20183009@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1971-07-18\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"24\",\"id_company\":null,\"id_departemen\":\"7\",\"id_section\":\"27\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"115\",\"departemen\":\"Drilling \",\"company\":null,\"jabatan\":\"Organization Development & Industrial Relations Analyst\",\"employee_status\":\"Permanent\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(22, NULL, 'm_employee', 'update', 1, '2023-07-01 14:38:06', '{\"id_employee\":\"2\",\"id_uuid\":\"fb2b027a-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20193006\",\"nama\":\"SANNY SUPRIHONO\",\"nik\":\"3276012610720008\",\"no_hp\":\"0811900552\",\"alamat\":null,\"email\":\"SANNY.SUPRIHONO@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1972-10-26\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"18\",\"id_company\":null,\"id_departemen\":\"5\",\"id_section\":\"18\",\"parent_position_id\":\"46\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"46\",\"departemen\":\"Field\",\"company\":null,\"jabatan\":\"Field Buyer\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Cost Performance Analyst\",\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(23, NULL, 'm_employee', 'update', 1, '2023-07-01 14:39:04', '{\"id_employee\":\"87\",\"id_uuid\":\"fb2b7070-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20203003\",\"nama\":\"COPITO SUMANTRI\",\"nik\":\"3674031212700010\",\"no_hp\":\"08129294171\",\"alamat\":null,\"email\":\"20203003@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1970-12-12\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"39\",\"id_company\":null,\"id_departemen\":\"1\",\"id_section\":\"42\",\"parent_position_id\":\"54\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"54\",\"departemen\":\"Technical Planning\",\"company\":null,\"jabatan\":\"Field HSE Analyst\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Safety & ERCM Analyst\",\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(24, NULL, 'm_employee', 'update', 1, '2023-07-01 14:40:13', '{\"id_employee\":\"153\",\"id_uuid\":\"fb2c4040-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20203004\",\"nama\":\"MUHAMMAD IQBAL HAMZAH\",\"nik\":\"3173070501740010\",\"no_hp\":\"0816808039\",\"alamat\":null,\"email\":\"20203004@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1974-01-05\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"70\",\"id_company\":null,\"id_departemen\":\"2\",\"id_section\":\"73\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"104\",\"departemen\":\"General Affairs\",\"company\":null,\"jabatan\":\"General Affairs Clerk\",\"employee_status\":\"Permanent\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(25, NULL, 'm_employee', 'update', 1, '2023-07-01 15:40:26', '{\"id_employee\":\"18\",\"id_uuid\":\"fb2b496a-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20203006\",\"nama\":\"HARDIANTO\",\"nik\":\"3573051210730000\",\"no_hp\":\"0811584891\",\"alamat\":null,\"email\":\"20203006@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1973-10-12\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"30\",\"id_company\":null,\"id_departemen\":\"1\",\"id_section\":\"33\",\"parent_position_id\":\"46\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"46\",\"departemen\":\"Technical Planning\",\"company\":null,\"jabatan\":\"Information & Communication Technology Analyst\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Cost Performance Analyst\",\"position_nm\":null}', '103.180.118.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(26, NULL, 'm_employee', 'update', 1, '2023-07-01 15:41:05', '{\"id_employee\":\"176\",\"id_uuid\":\"fb2b5842-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20213004\",\"nama\":\"RICHARD ANGLO RUMAMBY\",\"nik\":\"3173050110670001\",\"no_hp\":\"0811984314\",\"alamat\":null,\"email\":\"20213004@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1967-10-01\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"33\",\"id_company\":null,\"id_departemen\":\"3\",\"id_section\":\"43\",\"parent_position_id\":\"46\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"46\",\"departemen\":\"Supply Chain Management\",\"company\":null,\"jabatan\":\"Materials Management Analyst\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Cost Performance Analyst\",\"position_nm\":null}', '103.180.118.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(27, NULL, 'm_employee', 'update', 1, '2023-07-01 15:42:13', '{\"id_employee\":\"179\",\"id_uuid\":\"fb2c93c4-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20213006\",\"nama\":\"ANDRE MANUEL WINOKAN\",\"nik\":\"3275112504750006\",\"no_hp\":\"08115407250\",\"alamat\":null,\"email\":\"20213006@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1975-04-25\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"90\",\"id_company\":null,\"id_departemen\":\"5\",\"id_section\":\"96\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"95\",\"departemen\":\"Field\",\"company\":null,\"jabatan\":null,\"employee_status\":\"Permanent\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.118.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(28, NULL, 'm_employee', 'update', 1, '2023-07-01 15:43:19', '{\"id_employee\":\"184\",\"id_uuid\":\"fb2cc290-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20213011\",\"nama\":\"AVIANTORO NUGROHO\",\"nik\":\"3174102403830009\",\"no_hp\":\"081380639633\",\"alamat\":null,\"email\":\"20213011@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1983-03-24\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"101\",\"id_company\":null,\"id_departemen\":\"9\",\"id_section\":\"107\",\"parent_position_id\":\"60\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"60\",\"departemen\":\"Finance\",\"company\":null,\"jabatan\":null,\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Maintenance Support Supervisor\",\"position_nm\":null}', '103.180.118.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(29, NULL, 'm_employee', 'update', 1, '2023-07-01 15:44:20', '{\"id_employee\":\"206\",\"id_uuid\":\"fb2c5e72-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20223006\",\"nama\":\"AUDY ARMYANTO\",\"nik\":\"3201020201760010\",\"no_hp\":\"081367727432\",\"alamat\":null,\"email\":\"20223006@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1976-01-02\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"77\",\"id_company\":null,\"id_departemen\":\"5\",\"id_section\":\"81\",\"parent_position_id\":\"46\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"46\",\"departemen\":\"Field\",\"company\":null,\"jabatan\":\"Support Technician\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Cost Performance Analyst\",\"position_nm\":null}', '103.180.118.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(30, NULL, 'm_employee', 'update', 1, '2023-07-01 15:44:56', '{\"id_employee\":\"207\",\"id_uuid\":\"fb2cb584-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20223010\",\"nama\":\"PRAYUDHA ERLANGGA BARNAS\",\"nik\":\"3374110709780006\",\"no_hp\":\"08127362099\",\"alamat\":null,\"email\":\"20223010@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1981-02-16\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"98\",\"id_company\":null,\"id_departemen\":\"5\",\"id_section\":\"104\",\"parent_position_id\":\"46\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"46\",\"departemen\":\"Field\",\"company\":null,\"jabatan\":null,\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Cost Performance Analyst\",\"position_nm\":null}', '103.180.118.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(31, NULL, 'm_employee', 'update', 1, '2023-07-01 15:46:09', '{\"id_employee\":\"211\",\"id_uuid\":\"fb2be58c-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20223011\",\"nama\":\"PULUH AGUS NAMPAN RIANTO\",\"nik\":\"3276021008680030\",\"no_hp\":\"0811144967\",\"alamat\":null,\"email\":\"20223011@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1968-08-10\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"51\",\"id_company\":null,\"id_departemen\":\"5\",\"id_section\":\"54\",\"parent_position_id\":\"45\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"45\",\"departemen\":\"Field\",\"company\":null,\"jabatan\":\"Secretary\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Exploration Geologist\",\"position_nm\":null}', '103.180.118.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(32, NULL, 'm_employee', 'update', 1, '2023-07-01 15:46:56', '{\"id_employee\":\"216\",\"id_uuid\":\"fb2c6ec6-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20233001\",\"nama\":\"Irfano Budiyanto\",\"nik\":\"3276026304610023\",\"no_hp\":\"628129624390\",\"alamat\":null,\"email\":\"Irfano.Budiyanto@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1971-01-14\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"81\",\"id_company\":null,\"id_departemen\":\"8\",\"id_section\":\"87\",\"parent_position_id\":\"54\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"54\",\"departemen\":\"Management\",\"company\":null,\"jabatan\":null,\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Safety & ERCM Analyst\",\"position_nm\":null}', '103.180.118.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(33, NULL, 'm_employee', 'update', 1, '2023-07-01 15:47:47', '{\"id_employee\":\"219\",\"id_uuid\":\"fb293f94-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20233007\",\"nama\":\"Carla Femilia\",\"nik\":\"3174055809780015\",\"no_hp\":\"08118898886\",\"alamat\":null,\"email\":\"Carla.Femilia@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1978-09-18\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"P\",\"id_jabatan\":\"11\",\"id_company\":null,\"id_departemen\":\"9\",\"id_section\":\"11\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"104\",\"departemen\":\"Finance\",\"company\":null,\"jabatan\":\"General Affairs Manager\",\"employee_status\":\"Permanent\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.118.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(34, NULL, 'm_employee', 'insert', 1, '2023-07-01 15:53:23', '{\"code\":\"20233013\",\"nama\":\"Firly Saniristy\",\"nik\":\"0\",\"no_hp\":\"0\",\"tanggal_lahir\":\"2023-07-01\",\"alamat\":\"-\",\"password\":\"$2y$10$rQBzR8\\/CtUNlRisgVCjkj.tP2HRHNGNzhjeRlwiL5yI91aJtlJJ\\/2\",\"email\":\"-\",\"jenis_kelamin\":\"L\",\"parent_position_id\":\"22\",\"position_id\":\"\",\"id_jabatan\":\"26\",\"id_employee_status\":\"2\",\"id_company\":\"2\",\"id_departemen\":\"3\",\"aktif\":1}', '103.180.118.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(35, NULL, 'm_employee', 'update', 1, '2023-07-01 15:54:38', '{\"id_employee\":\"78\",\"id_uuid\":\"fb2bdfc4-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20080213\",\"nama\":\"YUNITA FERONICA\",\"nik\":\"3174065905770000\",\"no_hp\":\"081510104243\",\"alamat\":\"-\",\"email\":\"20080213@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1977-05-19\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"P\",\"id_jabatan\":\"49\",\"id_company\":\"4\",\"id_departemen\":\"1\",\"id_section\":null,\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":\"2023-06-11 00:18:18\",\"section_parent\":null,\"departemen\":\"Technical Planning\",\"company\":\"JOB HIRE PWT (DIRECT CONTRACT)\",\"jabatan\":\"Geophisicist\",\"employee_status\":\"Permanent\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.118.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(36, NULL, 'm_employee', 'update', 1, '2023-07-01 15:55:58', '{\"id_employee\":\"71\",\"id_uuid\":\"fb2bdd3a-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20090029\",\"nama\":\"FRILY INDIRA\",\"nik\":\"3671134804800004\",\"no_hp\":\"082110412515\",\"alamat\":\"-\",\"email\":\"20090029@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1980-04-08\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"P\",\"id_jabatan\":\"48\",\"id_company\":\"4\",\"id_departemen\":\"8\",\"id_section\":null,\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":\"2023-06-13 12:33:47\",\"section_parent\":null,\"departemen\":\"Management\",\"company\":\"JOB HIRE PWT (DIRECT CONTRACT)\",\"jabatan\":\"Environment Analyst\",\"employee_status\":\"Permanent\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.118.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(37, NULL, 'm_employee', 'update', 1, '2023-07-01 15:56:56', '{\"id_employee\":\"79\",\"id_uuid\":\"fb2c766e-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20090045\",\"nama\":\"MEILYANO FRIZA SIREGAR\",\"nik\":\"3276021405810010\",\"no_hp\":\"0811987211\",\"alamat\":null,\"email\":\"20090045@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1981-05-14\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"83\",\"id_company\":null,\"id_departemen\":\"5\",\"id_section\":\"89\",\"parent_position_id\":\"54\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"54\",\"departemen\":\"Field\",\"company\":null,\"jabatan\":null,\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Safety & ERCM Analyst\",\"position_nm\":null}', '103.180.118.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(38, NULL, 'm_employee', 'update', 1, '2023-07-01 15:58:17', '{\"id_employee\":\"80\",\"id_uuid\":\"fb2bfa04-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20090051\",\"nama\":\"MADE AGUS DWI SUARJANA\",\"nik\":\"3571011701790000\",\"no_hp\":\"08121276856\",\"alamat\":\"-\",\"email\":\"made.suarjana2@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1979-01-17\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"59\",\"id_company\":\"3\",\"id_departemen\":\"1\",\"id_section\":null,\"parent_position_id\":\"42\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":\"2023-06-24 21:38:20\",\"section_parent\":null,\"departemen\":\"Technical Planning\",\"company\":\"JOB HIRE PWTT (PERMANENT)\",\"jabatan\":\"Maintenance Planner & Controller\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Occupational Health Analyst\",\"position_nm\":null}', '103.180.118.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(39, NULL, 'm_employee', 'update', 1, '2023-07-01 15:59:08', '{\"id_employee\":\"102\",\"id_uuid\":\"fb2bf7b6-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20090055\",\"nama\":\"ANTONIA ASIH MURNIATI\",\"nik\":\"33281047108500020\",\"no_hp\":\"08118704387\",\"alamat\":null,\"email\":\"20090055@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1986-10-07\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"P\",\"id_jabatan\":\"58\",\"id_company\":null,\"id_departemen\":\"7\",\"id_section\":\"61\",\"parent_position_id\":\"57\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"57\",\"departemen\":\"Drilling \",\"company\":null,\"jabatan\":\"AP\\/AR Accountant\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Operations Security Officer\",\"position_nm\":null}', '103.180.118.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(40, NULL, 'm_employee', 'update', 1, '2023-07-01 15:59:50', '{\"id_employee\":\"136\",\"id_uuid\":\"fb2943a4-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20090056\",\"nama\":\"ALEXANDER VICTORY MARIS\",\"nik\":\"3275010701870026\",\"no_hp\":\"081298559961\",\"alamat\":null,\"email\":\"20090056@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1987-01-07\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"12\",\"id_company\":null,\"id_departemen\":\"9\",\"id_section\":\"12\",\"parent_position_id\":\"46\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"46\",\"departemen\":\"Finance\",\"company\":null,\"jabatan\":\"Finance & Treasury Section Head\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Cost Performance Analyst\",\"position_nm\":null}', '103.180.118.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(41, NULL, 'm_employee', 'update', 1, '2023-07-01 16:00:33', '{\"id_employee\":\"150\",\"id_uuid\":\"fb2c4400-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20090057\",\"nama\":\"INDRA SETYAWAN\",\"nik\":\"3175042101780001\",\"no_hp\":\"081184488043\",\"alamat\":null,\"email\":\"20090057@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1978-01-21\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"71\",\"id_company\":null,\"id_departemen\":\"7\",\"id_section\":\"74\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"104\",\"departemen\":\"Drilling \",\"company\":null,\"jabatan\":\"Technical Planning Clerk\",\"employee_status\":\"Permanent\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.118.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(42, NULL, 'm_employee', 'update', 1, '2023-07-01 16:01:24', '{\"id_employee\":\"151\",\"id_uuid\":\"fb2cc682-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20100051\",\"nama\":\"CHANDRA BERNARD OLII\",\"nik\":\"3175041302711001\",\"no_hp\":\"08161323638\",\"alamat\":null,\"email\":\"20100051@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1971-02-13\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"102\",\"id_company\":null,\"id_departemen\":\"3\",\"id_section\":\"11\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"104\",\"departemen\":\"Supply Chain Management\",\"company\":null,\"jabatan\":null,\"employee_status\":\"Permanent\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.118.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(43, NULL, 'm_employee', 'update', 1, '2023-07-01 16:02:23', '{\"id_employee\":\"139\",\"id_uuid\":\"fb2c5c6a-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20100053\",\"nama\":\"FRANCISCUS ADITYA PRIYAWAN\",\"nik\":\"3404160404860001\",\"no_hp\":\"081316889939\",\"alamat\":null,\"email\":\"20100053@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1986-04-04\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"77\",\"id_company\":null,\"id_departemen\":\"7\",\"id_section\":\"80\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"95\",\"departemen\":\"Drilling \",\"company\":null,\"jabatan\":\"Support Technician\",\"employee_status\":\"Permanent\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.118.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(44, NULL, 'm_employee', 'update', 1, '2023-07-01 16:03:41', '{\"id_employee\":\"73\",\"id_uuid\":\"fb2c0670-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20100054\",\"nama\":\"PRIMADIAN SARI DEWI\",\"nik\":\"3172024502820010\",\"no_hp\":\"0817775282\",\"alamat\":null,\"email\":\"20100054@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1982-02-05\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"P\",\"id_jabatan\":\"64\",\"id_company\":null,\"id_departemen\":\"8\",\"id_section\":\"67\",\"parent_position_id\":\"43\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"43\",\"departemen\":\"Management\",\"company\":null,\"jabatan\":\"General Services Administration\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Production Operator\",\"position_nm\":null}', '103.180.118.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(45, NULL, 'm_employee', 'update', 1, '2023-07-01 16:37:58', '{\"id_employee\":\"156\",\"id_uuid\":\"fb2c82ee-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20113003\",\"nama\":\"FITRIYADI\",\"nik\":\"3205091205870002\",\"no_hp\":\"085220087393\",\"alamat\":null,\"email\":\"20113003@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1987-05-12\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"86\",\"id_company\":null,\"id_departemen\":\"6\",\"id_section\":\"92\",\"parent_position_id\":\"27\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"27\",\"departemen\":\"QHSSE\",\"company\":null,\"jabatan\":null,\"employee_status\":\"Permanent\",\"parent_position_nm\":\"HRIS & Employees Services Analyst\",\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(46, NULL, 'm_employee', 'update', 1, '2023-07-01 16:39:09', '{\"id_employee\":\"137\",\"id_uuid\":\"fb2cb91c-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20113004\",\"nama\":\"THERESIA LEGIO MARIA LIRA\",\"nik\":\"3276025712840013\",\"no_hp\":\"08111461822\",\"alamat\":null,\"email\":\"20113004@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1984-12-17\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"P\",\"id_jabatan\":\"99\",\"id_company\":null,\"id_departemen\":\"9\",\"id_section\":\"105\",\"parent_position_id\":\"46\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"46\",\"departemen\":\"Finance\",\"company\":null,\"jabatan\":null,\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Cost Performance Analyst\",\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', '');
INSERT INTO `m_log` (`id_log`, `id_uuid`, `tabel_log`, `jenis_log`, `user_log`, `date_log`, `data_log`, `ip`, `os`, `browser`, `platform`, `city`, `country`, `region`) VALUES
(47, NULL, 'm_employee', 'update', 1, '2023-07-01 16:41:05', '{\"id_employee\":\"157\",\"id_uuid\":\"fb2b9e60-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20113013\",\"nama\":\"TULUS WIBISONO\",\"nik\":\"6471040301900003\",\"no_hp\":\"081380123307\",\"alamat\":null,\"email\":\"20113013@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1990-01-03\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"45\",\"id_company\":null,\"id_departemen\":\"8\",\"id_section\":\"48\",\"parent_position_id\":\"37\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"37\",\"departemen\":\"Management\",\"company\":null,\"jabatan\":\"Exploration Geologist\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Talent Development Analyst\",\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(48, NULL, 'm_employee', 'update', 1, '2023-07-01 16:43:15', '{\"id_employee\":\"101\",\"id_uuid\":\"fb2b4582-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20123003\",\"nama\":\"RULLY CHARLES ROTTY\",\"nik\":\"3171042202730005\",\"no_hp\":\"628129819777\",\"alamat\":null,\"email\":\"20123003@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1973-02-22\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"29\",\"id_company\":null,\"id_departemen\":\"3\",\"id_section\":\"32\",\"parent_position_id\":\"57\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"57\",\"departemen\":\"Supply Chain Management\",\"company\":null,\"jabatan\":\"C&B And Payroll Analyst\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Operations Security Officer\",\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(49, NULL, 'm_employee', 'update', 1, '2023-07-01 16:44:23', '{\"id_employee\":\"5\",\"id_uuid\":\"fb2cfd46-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20123005\",\"nama\":\"ARIEF CAHYONO\",\"nik\":\"6402040912710004\",\"no_hp\":\"081347250117\",\"alamat\":null,\"email\":\"20123005@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1971-12-09\",\"id_employee_status\":\"3\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"104\",\"id_company\":null,\"id_departemen\":\"4\",\"id_section\":\"111\",\"parent_position_id\":\"19\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"19\",\"departemen\":\"Project Development\",\"company\":null,\"jabatan\":null,\"employee_status\":\"PWT\",\"parent_position_nm\":\"Finance Manager\",\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(50, NULL, 'm_employee', 'update', 1, '2023-07-01 16:45:39', '{\"id_employee\":\"142\",\"id_uuid\":\"fb2b2084-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20123006\",\"nama\":\"SALAKHUDIN AFIF\",\"nik\":\"3517011001850006\",\"no_hp\":\"085249403799\",\"alamat\":null,\"email\":\"20123006@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1985-01-10\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"23\",\"id_company\":null,\"id_departemen\":\"4\",\"id_section\":\"26\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"95\",\"departemen\":\"Project Development\",\"company\":null,\"jabatan\":\"HR Section Head\",\"employee_status\":\"Permanent\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(51, NULL, 'm_employee', 'update', 1, '2023-07-01 16:46:44', '{\"id_employee\":\"100\",\"id_uuid\":\"fb291cee-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20123009\",\"nama\":\"FREDY CHRISTIANTO\",\"nik\":\"3603182909770008\",\"no_hp\":\"628811377118\",\"alamat\":null,\"email\":\"20123009@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1977-11-29\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"8\",\"id_company\":null,\"id_departemen\":\"3\",\"id_section\":\"8\",\"parent_position_id\":\"57\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"57\",\"departemen\":\"Supply Chain Management\",\"company\":null,\"jabatan\":\"QHSE Section Head\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Operations Security Officer\",\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(52, NULL, 'm_employee', 'update', 1, '2023-07-01 16:47:27', '{\"id_employee\":\"6\",\"id_uuid\":\"fb2b640e-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20133002\",\"nama\":\"ARIF RAHMAN\",\"nik\":\"6405023112910007\",\"no_hp\":\"081251029313\",\"alamat\":null,\"email\":\"20133002@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$E.\\/JxYX8IDPMNknRpM6XHeCab\\/gQIi89o05IRtFu7L.r371RblkvS\",\"tanggal_lahir\":\"1991-12-31\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"36\",\"id_company\":null,\"id_departemen\":\"9\",\"id_section\":\"39\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":\"1686666927\",\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"81\",\"departemen\":\"Finance\",\"company\":null,\"jabatan\":\"Petroleum Engineer\",\"employee_status\":\"Permanent\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(53, NULL, 'm_employee', 'update', 1, '2023-07-01 16:48:18', '{\"id_employee\":\"7\",\"id_uuid\":\"fb2d16d2-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20133003\",\"nama\":\"HADRIANSYAH\",\"nik\":\"6405010101910001\",\"no_hp\":\"081256919150\",\"alamat\":null,\"email\":\"20133003@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1991-01-01\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"110\",\"id_company\":null,\"id_departemen\":\"3\",\"id_section\":\"117\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"81\",\"departemen\":\"Supply Chain Management\",\"company\":null,\"jabatan\":null,\"employee_status\":\"Permanent\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(54, NULL, 'm_employee', 'update', 1, '2023-07-01 16:48:54', '{\"id_employee\":\"8\",\"id_uuid\":\"fb2b681e-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20133004\",\"nama\":\"HANDRIANSYAH\",\"nik\":\"6473012903840009\",\"no_hp\":\"085247123456\",\"alamat\":null,\"email\":\"20133004@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1984-03-29\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"37\",\"id_company\":null,\"id_departemen\":\"5\",\"id_section\":\"40\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"81\",\"departemen\":\"Field\",\"company\":null,\"jabatan\":\"Talent Development Analyst\",\"employee_status\":\"Permanent\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(55, NULL, 'm_employee', 'update', 1, '2023-07-01 16:49:31', '{\"id_employee\":\"9\",\"id_uuid\":\"fb2b17f6-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20133005\",\"nama\":\"ISMAIL\",\"nik\":\"6404110202880001\",\"no_hp\":\"082255333099\",\"alamat\":null,\"email\":\"20133005@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1988-02-02\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"21\",\"id_company\":null,\"id_departemen\":\"7\",\"id_section\":\"24\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"81\",\"departemen\":\"Drilling \",\"company\":null,\"jabatan\":\"Security Section Head\",\"employee_status\":\"Permanent\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(56, NULL, 'm_employee', 'update', 1, '2023-07-01 16:50:09', '{\"id_employee\":\"10\",\"id_uuid\":\"fb2bfe8c-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20133006\",\"nama\":\"KAMIMI RAHMAN\",\"nik\":\"6473041207840003\",\"no_hp\":\"082357877776\",\"alamat\":null,\"email\":\"20133006@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1984-07-12\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"61\",\"id_company\":null,\"id_departemen\":\"2\",\"id_section\":\"64\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"81\",\"departemen\":\"General Affairs\",\"company\":null,\"jabatan\":\"Area Warehouse Supervior\",\"employee_status\":\"Permanent\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(57, NULL, 'm_employee', 'update', 1, '2023-07-01 16:50:46', '{\"id_employee\":\"11\",\"id_uuid\":\"fb2c4b30-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20133007\",\"nama\":\"KISNADI\",\"nik\":\"6405021707870005\",\"no_hp\":\"081233738294\",\"alamat\":null,\"email\":\"20133007@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1987-07-17\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"73\",\"id_company\":null,\"id_departemen\":\"5\",\"id_section\":\"76\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"81\",\"departemen\":\"Field\",\"company\":null,\"jabatan\":\"Admin Tarakan Office\",\"employee_status\":\"Permanent\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(58, NULL, 'm_employee', 'update', 1, '2023-07-01 16:51:41', '{\"id_employee\":\"12\",\"id_uuid\":\"fb2b6c38-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20133008\",\"nama\":\"PURWANTO\",\"nik\":\"6410012002910001\",\"no_hp\":\"081233738297\",\"alamat\":null,\"email\":\"20133008@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1991-02-20\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"38\",\"id_company\":null,\"id_departemen\":\"9\",\"id_section\":\"41\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"81\",\"departemen\":\"Finance\",\"company\":null,\"jabatan\":\"Production Geologist\",\"employee_status\":\"Permanent\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(59, NULL, 'm_employee', 'update', 1, '2023-07-01 16:52:21', '{\"id_employee\":\"13\",\"id_uuid\":\"fb2c01ac-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20133009\",\"nama\":\"SURIANSYAH\",\"nik\":\"6410020701850001\",\"no_hp\":\"085247537479\",\"alamat\":null,\"email\":\"20133009@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1985-01-07\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"62\",\"id_company\":null,\"id_departemen\":\"2\",\"id_section\":\"65\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"81\",\"departemen\":\"General Affairs\",\"company\":null,\"jabatan\":\"Process Safety Assurance Analyst\",\"employee_status\":\"Permanent\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(60, NULL, 'm_employee', 'update', 1, '2023-07-01 16:53:00', '{\"id_employee\":\"14\",\"id_uuid\":\"fb2d1aba-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20133010\",\"nama\":\"SURYA JUNAIDI\",\"nik\":\"6404113003860001\",\"no_hp\":\"082253130243\",\"alamat\":null,\"email\":\"20133010@nedcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1986-03-30\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"111\",\"id_company\":null,\"id_departemen\":\"1\",\"id_section\":\"118\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"81\",\"departemen\":\"Technical Planning\",\"company\":null,\"jabatan\":null,\"employee_status\":\"Permanent\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(61, NULL, 'm_employee', 'update', 1, '2023-07-01 16:53:48', '{\"id_employee\":\"15\",\"id_uuid\":\"fb2b1c1a-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20133011\",\"nama\":\"UMAR\",\"nik\":\"6404052502860007\",\"no_hp\":\"085247997622\",\"alamat\":null,\"email\":\"20133011@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1986-02-25\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"22\",\"id_company\":null,\"id_departemen\":\"8\",\"id_section\":\"25\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"81\",\"departemen\":\"Management\",\"company\":null,\"jabatan\":\"Supply Chain Management Manager\",\"employee_status\":\"Permanent\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(62, NULL, 'm_employee', 'update', 1, '2023-07-01 17:22:18', '{\"id_employee\":\"159\",\"id_uuid\":\"fb2b99b0-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20133019\",\"nama\":\"ISNIANTO SAPUTRA\",\"nik\":\"6104111305910003\",\"no_hp\":\"085245501313\",\"alamat\":null,\"email\":\"20133019@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1991-05-13\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"44\",\"id_company\":null,\"id_departemen\":\"8\",\"id_section\":\"47\",\"parent_position_id\":\"37\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"37\",\"departemen\":\"Management\",\"company\":null,\"jabatan\":\"Well, Pipeline, Jetty Operator\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Talent Development Analyst\",\"position_nm\":null}', '103.180.118.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(63, NULL, 'm_employee', 'update', 1, '2023-07-01 17:23:08', '{\"id_employee\":\"74\",\"id_uuid\":\"fb2d0674-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20143004\",\"nama\":\"TANGI REKA RICARDO SIMAMORA\",\"nik\":\"3173070412870000\",\"no_hp\":\"081280882802\",\"alamat\":null,\"email\":\"20143004@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1987-12-04\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"106\",\"id_company\":null,\"id_departemen\":\"3\",\"id_section\":\"113\",\"parent_position_id\":\"43\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"43\",\"departemen\":\"Supply Chain Management\",\"company\":null,\"jabatan\":null,\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Production Operator\",\"position_nm\":null}', '103.180.118.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(64, NULL, 'm_employee', 'update', 1, '2023-07-01 17:26:53', '{\"id_employee\":\"141\",\"id_uuid\":\"fb2c7fd8-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20183007\",\"nama\":\"EDDY HIMAWAN SULISTIANTO\",\"nik\":\"3175072601890002\",\"no_hp\":\"082111431773\",\"alamat\":null,\"email\":\"20183007@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1989-01-26\",\"id_employee_status\":\"3\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"85\",\"id_company\":null,\"id_departemen\":\"3\",\"id_section\":\"91\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"95\",\"departemen\":\"Supply Chain Management\",\"company\":null,\"jabatan\":null,\"employee_status\":\"PWT\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.118.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(65, NULL, 'm_employee', 'update', 1, '2023-07-01 17:28:02', '{\"id_employee\":\"135\",\"id_uuid\":\"fb2b3308-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20183008\",\"nama\":\"SUDIBYO\",\"nik\":\"3516152204880002\",\"no_hp\":\"082116329252\",\"alamat\":null,\"email\":\"20183008@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1988-04-22\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"25\",\"id_company\":null,\"id_departemen\":\"9\",\"id_section\":\"28\",\"parent_position_id\":\"57\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"57\",\"departemen\":\"Finance\",\"company\":null,\"jabatan\":\"Contract Analyst\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Operations Security Officer\",\"position_nm\":null}', '103.180.118.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(66, NULL, 'm_employee', 'update', 1, '2023-07-01 17:37:17', '{\"id_employee\":\"163\",\"id_uuid\":\"fb2bd7d6-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20183010\",\"nama\":\"AVESTA YUDHA PRASETYA\",\"nik\":\"3305193012900003\",\"no_hp\":\"082282222018\",\"alamat\":null,\"email\":\"91600019@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1990-12-30\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"46\",\"id_company\":null,\"id_departemen\":\"9\",\"id_section\":\"49\",\"parent_position_id\":\"37\",\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"37\",\"departemen\":\"Finance\",\"company\":null,\"jabatan\":\"Cost Performance Analyst\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Talent Development Analyst\",\"position_nm\":null}', '103.180.118.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(67, NULL, 'm_employee', 'update', 1, '2023-07-01 17:38:21', '{\"id_employee\":\"144\",\"id_uuid\":\"fb291136-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20203007\",\"nama\":\"LUKAS SINGGIH\",\"nik\":\"3275122904840006\",\"no_hp\":\"0811997169\",\"alamat\":null,\"email\":\"20203007@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1984-04-29\",\"id_employee_status\":\"3\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"6\",\"id_company\":null,\"id_departemen\":\"4\",\"id_section\":\"6\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"95\",\"departemen\":\"Project Development\",\"company\":null,\"jabatan\":\"Project Planning & Control Section Head\",\"employee_status\":\"PWT\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.118.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(68, NULL, 'm_employee', 'update', 1, '2023-07-01 17:39:44', '{\"id_employee\":\"155\",\"id_uuid\":\"fb2d0c5a-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"20113007\",\"nama\":\"DEWA AYU SRIMAHONI\",\"nik\":\"3276056010810015\",\"no_hp\":\"081286003070\",\"alamat\":null,\"email\":\"20113007@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"1981-10-20\",\"id_employee_status\":\"3\",\"jenis_kelamin\":\"P\",\"id_jabatan\":\"107\",\"id_company\":null,\"id_departemen\":\"4\",\"id_section\":\"114\",\"parent_position_id\":null,\"position_id\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"section_parent\":\"115\",\"departemen\":\"Project Development\",\"company\":null,\"jabatan\":null,\"employee_status\":\"PWT\",\"parent_position_nm\":null,\"position_nm\":null}', '103.180.118.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(69, NULL, 'm_modul', 'insert', 1, '2023-07-01 19:43:14', '{\"nama_menu\":\"Level\",\"controller\":\"level\",\"icon_menu\":\"fa fa-users\",\"breadcumb_menu\":\"nav-sub-menu menu-level\",\"has_child\":0,\"is_child\":1,\"parent_id\":\"84\",\"urutan\":\"309\",\"is_menu\":1,\"need_auth\":1}', '180.253.161.148', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/114.0', 'Firefox', 'Mac OS X', '', '', ''),
(70, NULL, 'm_level', 'update', 1, '2023-07-01 20:35:03', '{\"id_level\":\"5\",\"id_uuid\":\"68ad4865-180c-11ee-9ddc-702771c071f4\",\"level\":\"General Manager\",\"aktif\":\"1\",\"created_at\":\"2023-07-01 19:39:38\",\"updated_at\":null}', '180.253.161.148', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/114.0', 'Firefox', 'Mac OS X', '', '', ''),
(71, NULL, 'm_level', 'update', 1, '2023-07-01 20:35:10', '{\"id_level\":\"5\",\"id_uuid\":\"68ad4865-180c-11ee-9ddc-702771c071f4\",\"level\":\"General Manager Edit\",\"aktif\":\"1\",\"created_at\":\"2023-07-01 19:39:38\",\"updated_at\":\"2023-07-01 20:35:03\"}', '180.253.161.148', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/114.0', 'Firefox', 'Mac OS X', '', '', ''),
(72, NULL, 'm_level', 'update', 1, '2023-07-01 20:35:20', '{\"id_level\":\"5\",\"id_uuid\":\"68ad4865-180c-11ee-9ddc-702771c071f4\",\"level\":\"General Manager Edit\",\"aktif\":\"0\",\"created_at\":\"2023-07-01 19:39:38\",\"updated_at\":\"2023-07-01 20:35:10\"}', '180.253.161.148', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/114.0', 'Firefox', 'Mac OS X', '', '', ''),
(73, NULL, 'm_employee', 'update', 1, '2023-07-01 21:41:12', '{\"id_employee\":\"208\",\"id_uuid\":\"fb2b780e-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"91600148\",\"nama\":\"Adji Mayumi Vannia\",\"nik\":\"3172046411950004\",\"no_hp\":\"\",\"alamat\":\"\",\"email\":\"91600148@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$wgadNa1FldMvnlROToAVVeqw4B6RiPNuJfMD1F.n2ZX2qBfImZkcC\",\"tanggal_lahir\":\"0000-00-00\",\"id_employee_status\":\"1\",\"jenis_kelamin\":\"P\",\"id_jabatan\":\"41\",\"id_company\":\"0\",\"id_departemen\":\"6\",\"id_section\":\"44\",\"parent_position_id\":\"59\",\"position_id\":null,\"id_base\":null,\"id_level\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":\"2023-06-24 22:06:50\",\"departemen\":\"QHSSE\",\"company\":null,\"jabatan\":\"Electrical Engineer\",\"employee_status\":\"Outsource\",\"parent_position_nm\":\"Maintenance Planner & Controller\",\"position_nm\":null}', '180.253.160.181', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(74, NULL, 'm_employee', 'update', 1, '2023-07-01 21:57:37', '{\"id_employee\":\"208\",\"id_uuid\":\"fb2b780e-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"91600148\",\"nama\":\"Adji Mayumi Vannia\",\"nik\":\"3172046411950004\",\"no_hp\":\"\",\"alamat\":\"\",\"email\":\"91600148@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$wgadNa1FldMvnlROToAVVeqw4B6RiPNuJfMD1F.n2ZX2qBfImZkcC\",\"tanggal_lahir\":\"0000-00-00\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"P\",\"id_jabatan\":\"70\",\"id_company\":\"1\",\"id_departemen\":\"2\",\"id_section\":\"44\",\"parent_position_id\":\"30\",\"position_id\":null,\"id_base\":null,\"id_level\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":\"2023-07-01 21:41:12\",\"departemen\":\"General Affairs\",\"company\":\"PERMANENT PERTAMINA SECONDEE\",\"jabatan\":\"General Affairs Clerk\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Information & Communication Technology Analyst\",\"position_nm\":null}', '180.253.160.181', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(75, NULL, 'm_employee', 'update', 1, '2023-07-01 21:57:51', '{\"id_employee\":\"208\",\"id_uuid\":\"fb2b780e-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"91600148\",\"nama\":\"Adji Mayumi Vannia\",\"nik\":\"3172046411950004\",\"no_hp\":\"\",\"alamat\":\"\",\"email\":\"91600148@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$wgadNa1FldMvnlROToAVVeqw4B6RiPNuJfMD1F.n2ZX2qBfImZkcC\",\"tanggal_lahir\":\"0000-00-00\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"P\",\"id_jabatan\":\"70\",\"id_company\":\"1\",\"id_departemen\":\"2\",\"id_section\":\"44\",\"parent_position_id\":\"30\",\"position_id\":null,\"id_base\":null,\"id_level\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"0\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":\"2023-07-01 21:57:37\",\"departemen\":\"General Affairs\",\"company\":\"PERMANENT PERTAMINA SECONDEE\",\"jabatan\":\"General Affairs Clerk\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"Information & Communication Technology Analyst\",\"position_nm\":null}', '180.253.160.181', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(76, NULL, 'm_employee', 'update', 1, '2023-07-01 23:11:42', '{\"id_employee\":\"24\",\"id_uuid\":\"fb2b3a9c-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"91600071\",\"nama\":\"DARISMAN\",\"nik\":\"6473030703820009\",\"no_hp\":\"\",\"alamat\":null,\"email\":\"91600071@medcoenergi.com\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":null,\"id_employee_status\":\"1\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"27\",\"id_company\":null,\"id_departemen\":\"6\",\"id_section\":\"30\",\"parent_position_id\":\"80\",\"position_id\":null,\"id_base\":null,\"id_level\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"departemen\":\"QHSSE\",\"company\":null,\"jabatan\":\"HRIS & Employees Services Analyst\",\"employee_status\":\"Outsource\",\"parent_position_nm\":\"Project Clerk\",\"position_nm\":null}', '180.253.160.181', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(77, NULL, 'm_employee', 'update', 1, '2023-07-01 23:28:32', '{\"id_employee\":\"61\",\"id_uuid\":\"fb2c2efc-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"91600014\",\"nama\":\"AHMAD NURFIRMANTO\",\"nik\":\"3302190306770003\",\"no_hp\":\"\",\"alamat\":null,\"email\":\"\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":null,\"id_employee_status\":\"1\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"67\",\"id_company\":null,\"id_departemen\":\"4\",\"id_section\":\"70\",\"parent_position_id\":\"80\",\"position_id\":null,\"id_base\":null,\"id_level\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":null,\"departemen\":\"Project Development\",\"company\":null,\"jabatan\":\"HR Administration\",\"employee_status\":\"Outsource\",\"parent_position_nm\":\"Project Clerk\",\"position_nm\":null}', '180.253.160.181', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(78, NULL, 'm_employee', 'update', 1, '2023-07-01 23:30:57', '{\"id_employee\":\"61\",\"id_uuid\":\"fb2c2efc-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"91600014\",\"nama\":\"AHMAD NURFIRMANTO\",\"nik\":\"3302190306770003\",\"no_hp\":\"\",\"alamat\":\"\",\"email\":\"\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"0000-00-00\",\"id_employee_status\":\"1\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"78\",\"id_company\":\"6\",\"id_departemen\":\"2\",\"id_section\":\"70\",\"parent_position_id\":\"70\",\"position_id\":null,\"id_base\":null,\"id_level\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":\"2023-07-01 23:28:31\",\"departemen\":\"General Affairs\",\"company\":\"OUTSOURCE MANPOWER PT ORYX SERVICES\",\"jabatan\":\"Field Admin\",\"employee_status\":\"Outsource\",\"parent_position_nm\":\"General Affairs Clerk\",\"position_nm\":null}', '180.253.160.181', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(79, NULL, 'm_employee', 'update', 1, '2023-07-01 23:31:52', '{\"id_employee\":\"61\",\"id_uuid\":\"fb2c2efc-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"91600014\",\"nama\":\"AHMAD NURFIRMANTO\",\"nik\":\"3302190306770003\",\"no_hp\":\"\",\"alamat\":\"\",\"email\":\"\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"0000-00-00\",\"id_employee_status\":\"1\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"78\",\"id_company\":\"6\",\"id_departemen\":\"2\",\"id_section\":\"70\",\"parent_position_id\":\"70\",\"position_id\":null,\"id_base\":null,\"id_level\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":\"2023-07-01 23:30:57\",\"departemen\":\"General Affairs\",\"company\":\"OUTSOURCE MANPOWER PT ORYX SERVICES\",\"jabatan\":\"Field Admin\",\"employee_status\":\"Outsource\",\"parent_position_nm\":\"General Affairs Clerk\",\"position_nm\":null}', '180.253.160.181', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(80, NULL, 'm_employee', 'update', 1, '2023-07-01 23:32:46', '{\"id_employee\":\"61\",\"id_uuid\":\"fb2c2efc-e6ef-11ed-8239-8c48c505c8dd\",\"code\":\"91600014\",\"nama\":\"AHMAD NURFIRMANTO\",\"nik\":\"3302190306770003\",\"no_hp\":\"\",\"alamat\":\"\",\"email\":\"\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"0000-00-00\",\"id_employee_status\":\"1\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"78\",\"id_company\":\"6\",\"id_departemen\":\"2\",\"id_section\":\"70\",\"parent_position_id\":\"30\",\"position_id\":null,\"id_base\":null,\"id_level\":null,\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-04-30 07:43:10\",\"updated_at\":\"2023-07-01 23:31:51\",\"departemen\":\"General Affairs\",\"company\":\"OUTSOURCE MANPOWER PT ORYX SERVICES\",\"jabatan\":\"Field Admin\",\"employee_status\":\"Outsource\",\"parent_position_nm\":\"Information & Communication Technology Analyst\",\"position_nm\":null}', '180.253.160.181', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(81, NULL, 'm_employee', 'update', 1, '2023-07-06 23:34:45', '{\"id_employee\":\"160\",\"id_uuid\":\"1177078e-1c1a-11ee-9ddc-702771c071f4\",\"code\":\"20090051\",\"nama\":\"Made Agus Dwi Suarjana\",\"nik\":null,\"no_hp\":null,\"alamat\":null,\"email\":null,\"foto\":null,\"password\":null,\"tanggal_lahir\":null,\"id_employee_status\":null,\"jenis_kelamin\":null,\"id_jabatan\":\"30\",\"id_company\":\"3\",\"id_departemen\":\"2\",\"id_section\":\"14\",\"parent_position_id\":\"11\",\"position_id\":null,\"id_base\":\"1\",\"id_level\":\"3\",\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-07-06 23:19:23\",\"updated_at\":null,\"departemen\":\"General Affairs\",\"company\":\"JOB HIRE PWTT (PERMANENT)\",\"jabatan\":\"Information & Communication Technology Analyst\",\"employee_status\":null,\"parent_position_nm\":\"General Affairs Manager\",\"position_nm\":null}', '180.253.161.117', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(82, NULL, 'm_employee', 'update', 1, '2023-07-06 23:41:51', '{\"id_employee\":\"160\",\"id_uuid\":\"1177078e-1c1a-11ee-9ddc-702771c071f4\",\"code\":\"20090051\",\"nama\":\"Made Agus Dwi Suarjana\",\"nik\":\"\",\"no_hp\":\"\",\"alamat\":\"\",\"email\":\"\",\"foto\":null,\"password\":null,\"tanggal_lahir\":\"0000-00-00\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"30\",\"id_company\":\"3\",\"id_departemen\":\"2\",\"id_section\":\"14\",\"parent_position_id\":\"11\",\"position_id\":\"14\",\"id_base\":\"1\",\"id_level\":\"3\",\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-07-06 23:19:23\",\"updated_at\":\"2023-07-06 23:34:45\",\"departemen\":\"General Affairs\",\"company\":\"JOB HIRE PWTT (PERMANENT)\",\"jabatan\":\"Information & Communication Technology Analyst\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"General Affairs Manager\",\"position_nm\":\"ICT\"}', '180.253.161.117', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(83, NULL, 'm_employee', 'update', 1, '2023-07-06 23:42:24', '{\"id_employee\":\"160\",\"id_uuid\":\"1177078e-1c1a-11ee-9ddc-702771c071f4\",\"code\":\"20090051\",\"nama\":\"Made Agus Dwi Suarjana\",\"nik\":\"\",\"no_hp\":\"\",\"alamat\":\"\",\"email\":\"\",\"foto\":null,\"password\":null,\"tanggal_lahir\":\"0000-00-00\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"30\",\"id_company\":\"3\",\"id_departemen\":\"2\",\"id_section\":\"14\",\"parent_position_id\":\"11\",\"position_id\":\"12\",\"id_base\":\"1\",\"id_level\":\"3\",\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-07-06 23:19:23\",\"updated_at\":\"2023-07-06 23:41:50\",\"departemen\":\"General Affairs\",\"company\":\"JOB HIRE PWTT (PERMANENT)\",\"jabatan\":\"Information & Communication Technology Analyst\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"General Affairs Manager\",\"position_nm\":\"HR\"}', '180.253.161.117', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(84, NULL, 'm_jabatan', 'insert', 1, '2023-07-07 10:12:46', '{\"jabatan\":\"Legal &amp; Commercial Section Head\",\"aktif\":1}', '103.177.212.4', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/114.0', 'Firefox', 'Mac OS X', 'Kebomas', 'ID', 'East Java'),
(85, NULL, 'm_jabatan', 'insert', 1, '2023-07-07 10:15:28', '{\"jabatan\":\"Project Manager\",\"aktif\":1}', '103.177.212.4', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/114.0', 'Firefox', 'Mac OS X', 'Kebomas', 'ID', 'East Java'),
(86, NULL, 'm_jabatan', 'insert', 1, '2023-07-07 10:17:14', '{\"jabatan\":\"Drilling Support Section Head\",\"aktif\":1}', '103.177.212.4', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/114.0', 'Firefox', 'Mac OS X', 'Kebomas', 'ID', 'East Java'),
(87, NULL, 'm_jabatan', 'insert', 1, '2023-07-07 10:20:44', '{\"jabatan\":\"Procurement &amp; Systems Section Head\",\"aktif\":1}', '103.177.212.4', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/114.0', 'Firefox', 'Mac OS X', 'Kebomas', 'ID', 'East Java'),
(88, NULL, 'm_jabatan', 'insert', 1, '2023-07-07 10:25:42', '{\"jabatan\":\"Accounting &amp; Reporting Section Head\",\"aktif\":1}', '103.177.212.4', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/114.0', 'Firefox', 'Mac OS X', 'Kebomas', 'ID', 'East Java'),
(89, NULL, 'm_jabatan', 'insert', 1, '2023-07-07 10:27:56', '{\"jabatan\":\"Operations Section Head\",\"aktif\":1}', '103.177.212.4', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/114.0', 'Firefox', 'Mac OS X', 'Kebomas', 'ID', 'East Java'),
(90, NULL, 'm_jabatan', 'insert', 1, '2023-07-07 10:31:05', '{\"jabatan\":\"General Services Hr Officer\",\"aktif\":1}', '103.177.212.4', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/114.0', 'Firefox', 'Mac OS X', 'Kebomas', 'ID', 'East Java'),
(91, NULL, 'm_employee', 'update', 8, '2023-07-07 14:31:15', '{\"id_employee\":\"213\",\"id_uuid\":\"117755a9-1c1a-11ee-9ddc-702771c071f4\",\"code\":\"91600148\",\"nama\":\"Adji Mayumi Vannia\",\"nik\":null,\"no_hp\":null,\"alamat\":null,\"email\":null,\"foto\":null,\"password\":\"$2y$10$VWYikSw\\/iAimut1Iq2\\/s4.uwuIsZ7fIY3HZi3URAFmpXVC5FDG\\/yi\",\"tanggal_lahir\":null,\"id_employee_status\":null,\"jenis_kelamin\":null,\"id_jabatan\":\"70\",\"id_company\":\"5\",\"id_departemen\":\"2\",\"id_section\":\"1\",\"parent_position_id\":\"2\",\"position_id\":null,\"id_base\":\"1\",\"id_level\":\"6\",\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-07-06 23:19:23\",\"updated_at\":null,\"departemen\":\"General Affairs\",\"company\":\"OUTSOURCE MANPOWER PT MITRA ENERGY SUPPLY\",\"jabatan\":\"General Affairs Clerk\",\"employee_status\":null,\"parent_position_nm\":\"Relations Section Head\",\"position_nm\":null}', '114.5.237.82', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'Chrome', 'Windows 10', 'Jakarta', 'ID', 'Jakarta'),
(92, NULL, 'm_employee', 'update', 8, '2023-07-07 14:36:31', '{\"id_employee\":\"160\",\"id_uuid\":\"1177078e-1c1a-11ee-9ddc-702771c071f4\",\"code\":\"20090051\",\"nama\":\"Made Agus Dwi Suarjana\",\"nik\":\"\",\"no_hp\":\"\",\"alamat\":\"\",\"email\":\"\",\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":\"0000-00-00\",\"id_employee_status\":\"2\",\"jenis_kelamin\":\"L\",\"id_jabatan\":\"30\",\"id_company\":\"3\",\"id_departemen\":\"2\",\"id_section\":\"14\",\"parent_position_id\":\"11\",\"position_id\":\"14\",\"id_base\":\"1\",\"id_level\":\"3\",\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-07-06 23:19:23\",\"updated_at\":\"2023-07-06 23:42:24\",\"departemen\":\"General Affairs\",\"company\":\"JOB HIRE PWTT (PERMANENT)\",\"jabatan\":\"Information & Communication Technology Analyst\",\"employee_status\":\"Permanent\",\"parent_position_nm\":\"General Affairs Manager\",\"position_nm\":\"ICT\"}', '114.5.237.82', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'Chrome', 'Windows 10', 'Jakarta', 'ID', 'Jakarta'),
(93, NULL, 'm_employee', 'update', 8, '2023-07-07 14:42:17', '{\"id_employee\":\"137\",\"id_uuid\":\"1176b4ca-1c1a-11ee-9ddc-702771c071f4\",\"code\":\"20223012\",\"nama\":\"Fransisca Geronica\",\"nik\":null,\"no_hp\":null,\"alamat\":null,\"email\":null,\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":null,\"id_employee_status\":null,\"jenis_kelamin\":null,\"id_jabatan\":\"11\",\"id_company\":\"1\",\"id_departemen\":\"2\",\"id_section\":null,\"parent_position_id\":\"10\",\"position_id\":null,\"id_base\":\"1\",\"id_level\":\"1\",\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-07-06 23:19:23\",\"updated_at\":null,\"departemen\":\"General Affairs\",\"company\":\"PERMANENT PERTAMINA SECONDEE\",\"jabatan\":\"General Affairs Manager\",\"employee_status\":null,\"parent_position_nm\":\"General Manager\",\"position_nm\":null}', '114.5.237.82', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'Chrome', 'Windows 10', 'Jakarta', 'ID', 'Jakarta'),
(94, NULL, 'm_employee', 'update', 8, '2023-07-07 14:43:07', '{\"id_employee\":\"157\",\"id_uuid\":\"117702de-1c1a-11ee-9ddc-702771c071f4\",\"code\":\"20080213\",\"nama\":\"Yunita Feronica Handayani\",\"nik\":null,\"no_hp\":null,\"alamat\":null,\"email\":null,\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":null,\"id_employee_status\":null,\"jenis_kelamin\":null,\"id_jabatan\":\"27\",\"id_company\":\"3\",\"id_departemen\":\"2\",\"id_section\":\"12\",\"parent_position_id\":\"23\",\"position_id\":null,\"id_base\":\"1\",\"id_level\":\"3\",\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-07-06 23:19:23\",\"updated_at\":null,\"departemen\":\"General Affairs\",\"company\":\"JOB HIRE PWTT (PERMANENT)\",\"jabatan\":\"HRIS & Employees Services Analyst\",\"employee_status\":null,\"parent_position_nm\":\"HR Section Head\",\"position_nm\":null}', '114.5.237.82', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'Chrome', 'Windows 10', 'Jakarta', 'ID', 'Jakarta'),
(95, NULL, 'm_modul', 'insert', 1, '2023-07-12 22:16:56', '{\"nama_menu\":\"Detail Absen\",\"controller\":\"detailabsen\",\"icon_menu\":\"fa fa-list\",\"breadcumb_menu\":\"nav-menu sub-menu-detailabsen\",\"has_child\":0,\"is_child\":0,\"parent_id\":0,\"urutan\":\"2\",\"is_menu\":0,\"need_auth\":0}', '180.253.163.129', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/114.0', 'Firefox', 'Mac OS X', '', '', ''),
(96, NULL, 'm_modul', 'update', 1, '2023-07-12 22:20:22', '{\"id_menu\":\"100\",\"id_uuid\":\"23fe3f86-20c7-11ee-9ddc-702771c071f4\",\"nama_menu\":\"Detail Absen\",\"controller\":\"detailabsen\",\"icon_menu\":\"fa fa-list\",\"breadcumb_menu\":\"nav-menu sub-menu-detailabsen\",\"has_child\":\"0\",\"is_child\":\"0\",\"parent_id\":\"0\",\"urutan\":\"2\",\"is_menu\":\"0\",\"need_auth\":\"0\",\"created_at\":\"2023-07-12 22:16:56\",\"updated_at\":null}', '180.253.163.129', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/114.0', 'Firefox', 'Mac OS X', '', '', ''),
(97, NULL, 'm_modul', 'update', 1, '2023-07-12 22:23:55', '{\"id_menu\":\"100\",\"id_uuid\":\"23fe3f86-20c7-11ee-9ddc-702771c071f4\",\"nama_menu\":\"Detail Absen\",\"controller\":\"detailabsen\",\"icon_menu\":\"fa fa-list\",\"breadcumb_menu\":\"nav-menu sub-menu-detailabsen\",\"has_child\":\"0\",\"is_child\":\"0\",\"parent_id\":\"0\",\"urutan\":\"2\",\"is_menu\":\"1\",\"need_auth\":\"0\",\"created_at\":\"2023-07-12 22:16:56\",\"updated_at\":\"2023-07-12 22:20:22\"}', '180.253.163.129', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/114.0', 'Firefox', 'Mac OS X', '', '', ''),
(98, NULL, 'm_mailreport', 'update', 1, '2023-07-14 00:35:44', '{\"id_mailreport\":\"2\",\"id_uuid\":\"0\",\"mailreport\":\"kho.alfuady@gmail.com\",\"aktif\":\"1\",\"created_at\":null,\"updated_at\":\"2023-06-15 20:48:50\"}', '103.180.119.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(99, NULL, 'm_employee', 'update', 8, '2023-07-14 13:51:00', '{\"id_employee\":\"210\",\"id_uuid\":\"1177535f-1c1a-11ee-9ddc-702771c071f4\",\"code\":\"20123010\",\"nama\":\"Caroline Fernandez\",\"nik\":null,\"no_hp\":null,\"alamat\":null,\"email\":null,\"foto\":null,\"password\":\"$2y$10$.i1P8EphkM.yYs5W44rMEuKWf0joBShDevzs9t1OiLcqZ.0Sy.6aq\",\"tanggal_lahir\":null,\"id_employee_status\":null,\"jenis_kelamin\":null,\"id_jabatan\":\"65\",\"id_company\":\"5\",\"id_departemen\":\"5\",\"id_section\":\"7\",\"parent_position_id\":\"17\",\"position_id\":null,\"id_base\":\"2\",\"id_level\":\"3\",\"pass_reset\":null,\"allow_broadcast\":\"0\",\"aktif\":\"1\",\"created_at\":\"2023-07-06 23:19:23\",\"updated_at\":null,\"departemen\":\"Field\",\"company\":\"OUTSOURCE MANPOWER PT MITRA ENERGY SUPPLY\",\"jabatan\":\"Tarakan Office Administration\",\"employee_status\":null,\"parent_position_nm\":\"General Services Sr Officer\",\"position_nm\":null}', '202.152.42.150', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'Chrome', 'Windows 10', '', '', ''),
(100, NULL, 'detail_absensi_pegawai_lainnya', 'insert', 1, '2023-07-14 15:29:11', '{\"id_pegawai\":\"137\",\"id_pegawai_lainnya\":\"213\",\"aktif\":1}', '114.5.103.112', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(101, NULL, 'detail_absensi_pegawai_lainnya', 'insert', 1, '2023-07-14 15:29:39', '{\"id_pegawai\":\"137\",\"id_pegawai_lainnya\":\"130\",\"aktif\":1}', '114.5.103.112', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5.1 Safari/605.1.15', 'Safari', 'Mac OS X', '', '', ''),
(102, NULL, 'm_modul', 'insert', 1, '2023-07-16 20:39:46', '{\"nama_menu\":\"Import Employee\",\"controller\":\"employee_import\",\"icon_menu\":\"fa fa-user\",\"breadcumb_menu\":\"nav-sub-menu menu-import-employee\",\"has_child\":0,\"is_child\":1,\"parent_id\":\"2\",\"urutan\":\"314\",\"is_menu\":1,\"need_auth\":1}', '180.253.160.100', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/115.0', 'Firefox', 'Mac OS X', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `m_lokasi_kerja`
--

CREATE TABLE `m_lokasi_kerja` (
  `id_lokasi_kerja` int(11) NOT NULL,
  `id_uuid` text DEFAULT NULL,
  `lokasi_kerja` text DEFAULT NULL,
  `manhours` int(11) NOT NULL,
  `id_status_kerja` int(11) DEFAULT NULL,
  `tipe` int(11) DEFAULT NULL,
  `aktif` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `m_lokasi_kerja`
--

INSERT INTO `m_lokasi_kerja` (`id_lokasi_kerja`, `id_uuid`, `lokasi_kerja`, `manhours`, `id_status_kerja`, `tipe`, `aktif`, `created_at`, `updated_at`) VALUES
(0, 'a700f9c0-07c9-11ee-abc0-98d5636f06cf', 'Pilih Lokasi', 0, 0, 0, 1, '2023-05-10 12:24:55', NULL),
(1, 'a700fbf1-07c9-11ee-abc0-98d5636f06cf', 'Office Jakarta', 8, 1, 1, 1, '2023-05-02 22:11:28', NULL),
(2, 'a700fc60-07c9-11ee-abc0-98d5636f06cf', 'Office Tarakan', 8, 1, 1, 1, '2023-05-02 22:11:28', NULL),
(3, 'a700fca9-07c9-11ee-abc0-98d5636f06cf', 'Site Simenggaris', 11, 1, 1, 1, '2023-05-02 22:11:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_mailreport`
--

CREATE TABLE `m_mailreport` (
  `id_mailreport` int(11) NOT NULL,
  `id_uuid` int(11) DEFAULT NULL,
  `mailreport` varchar(255) DEFAULT NULL,
  `aktif` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `m_mailreport`
--

INSERT INTO `m_mailreport` (`id_mailreport`, `id_uuid`, `mailreport`, `aktif`, `created_at`, `updated_at`) VALUES
(1, 0, 'made.suarjana2@medcoenergi.com', 1, NULL, '2023-06-22 14:59:51'),
(2, 0, 'kho.alfuady@gmail.com', 0, NULL, '2023-07-14 00:35:44'),
(3, 16, 'email-tiga@gmail.com', 0, NULL, '2023-06-15 21:19:58'),
(4, 6, 'made.suarjana2@medcoenergi.com', 0, NULL, '2023-06-22 14:59:36');

-- --------------------------------------------------------

--
-- Table structure for table `m_menu`
--

CREATE TABLE `m_menu` (
  `id_menu` int(11) NOT NULL,
  `id_uuid` varchar(100) DEFAULT NULL,
  `nama_menu` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `controller` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `icon_menu` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `breadcumb_menu` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `has_child` int(11) DEFAULT NULL,
  `is_child` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `is_menu` tinyint(4) DEFAULT 1,
  `need_auth` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `m_menu`
--

INSERT INTO `m_menu` (`id_menu`, `id_uuid`, `nama_menu`, `controller`, `icon_menu`, `breadcumb_menu`, `has_child`, `is_child`, `parent_id`, `urutan`, `is_menu`, `need_auth`, `created_at`, `updated_at`) VALUES
(1, 'd8328b74-d698-11ed-9d8d-8548da6d949c', 'Dashboard', 'dashboard', 'tf-icons ti ti-smart-home', 'nav-menu menu-dashboard', 0, 0, 0, 2, 1, 1, '2022-11-15 02:57:58', '2022-11-17 01:15:45'),
(2, 'd8328eb2-d698-11ed-9d8d-8548da6d949c', 'Manajemen User', 'Manajemen User', 'tf-icons ti ti-users', 'treeview nav-menu menu-master', 1, 0, 0, 300, 1, 1, '2022-11-15 02:57:58', '2022-12-21 21:33:47'),
(3, 'd8328fde-d698-11ed-9d8d-8548da6d949c', 'User', 'user', 'fa fa-users', 'nav-sub-menu menu-user', 0, 1, 2, 302, 1, 1, '2022-11-15 02:57:58', '2023-04-09 10:19:05'),
(4, 'd832909c-d698-11ed-9d8d-8548da6d949c', 'Privilege', 'privilege', 'fa fa-stack-overflow', 'nav-sub-menu menu-privilege', 0, 1, 2, 301, 1, 1, '2022-11-15 02:57:58', '2023-04-09 10:19:11'),
(5, 'd8329150-d698-11ed-9d8d-8548da6d949c', 'Modul', 'modul', 'fa fa-snowflake-o', 'nav-sub-menu menu-modul', 0, 1, 2, 303, 1, 1, '2022-11-15 02:57:58', NULL),
(6, 'd83291fa-d698-11ed-9d8d-8548da6d949c', 'Akses Modul', 'aksesmodul', 'fa fa-ticket', 'nav-sub-menu menu-aksesmodul', 0, 1, 2, 304, 1, 1, '2022-11-15 02:57:58', '2022-12-21 21:34:32'),
(38, 'd832929a-d698-11ed-9d8d-8548da6d949c', 'Home', 'home', 'fa fa-home', 'nav-menu menu-dashboard', 0, 0, 0, 101, 0, 0, '2022-11-15 02:57:58', '2022-11-17 01:15:45'),
(39, 'd832933a-d698-11ed-9d8d-8548da6d949c', 'Login', 'login', 'fa fa-lock', 'nav-menu sub-menu-login', 0, 0, 0, 1, 0, 0, '2022-11-17 02:53:58', NULL),
(84, '8ff2a93a-d69c-11ed-9d8d-8548da6d949c', 'Departemen', 'dept', 'tf-icons ti ti-building-skyscraper', 'treeview nav-menu menu-departemen', 1, 0, 0, 400, 1, 1, '2023-04-09 13:05:43', '2023-04-09 22:24:51'),
(85, '43450bcc-d69d-11ed-9d8d-8548da6d949c', 'Departemen', 'departemen', 'tif-icons ti ti-building-skycrapper', 'nav-sub-menu menu-dept', 0, 1, 84, 401, 1, 1, '2023-04-09 13:10:44', '2023-04-09 22:25:09'),
(86, '4ddb4120-d6e1-11ed-8239-8c48c505c8dd', 'Company', 'company', 'tif-icons ti ti-building', 'nav-sub-menu menu-company', 0, 1, 84, 402, 1, 1, '2023-04-09 21:17:48', '2023-04-09 22:07:20'),
(87, 'cd324272-f70e-11ed-ad02-2cea7f97077c', 'Position', 'jabatan', 'fa fa-users', 'nav-sub-menu menu-jabatan', 0, 1, 84, 403, 1, 1, '2023-05-20 20:04:06', NULL),
(88, '43f55201-f8c4-11ed-ad02-2cea7f97077c', 'Kondisi Kesehatan', 'kondisikesehatan', 'fa fa-users', 'nav-sub-menu menu-kondisikesehatan', 0, 1, 84, 404, 1, 1, '2023-05-23 00:15:34', NULL),
(89, '9541c4e0-f8c7-11ed-ad02-2cea7f97077c', 'Tipe Vaksin', 'tipevaksin', 'fa fa-users', 'nav-sub-menu menu-tipevaksin', 0, 1, 84, 405, 1, 1, '2023-05-23 00:39:19', NULL),
(90, '5320eb74-f8cd-11ed-ad02-2cea7f97077c', 'Status Kerja', 'statuskerja', 'fa fa-users', 'nav-sub-menu menu-statuskerja', 0, 1, 84, 406, 1, 1, '2023-05-23 01:20:26', NULL),
(91, 'fda200fb-f8cf-11ed-ad02-2cea7f97077c', 'Status Keluarga', 'statuskeluarga', 'fa fa-users', 'nav-sub-menu menu-statuskeluarga', 0, 1, 84, 407, 1, 1, '2023-05-23 01:39:31', NULL),
(92, '539d55ce-f8ec-11ed-ad02-2cea7f97077c', 'Lokasi Kerja', 'lokasikerja', 'fa fa-users', 'nav-sub-menu menu-lokasikerja', 0, 1, 84, 408, 1, 1, '2023-05-23 05:02:21', NULL),
(93, 'ecdb66e2-fee1-11ed-ad02-2cea7f97077c', 'Employee', 'employee', 'fa fa-users', 'nav-sub-menu menu-employee', 0, 1, 84, 412, 1, 1, '2023-05-30 19:03:01', '2023-06-10 23:38:06'),
(94, '6e8e3554-02c9-11ee-abc0-98d5636f06cf', 'Kalender', 'kalender', 'fa fa-users', 'nav-sub-menu menu-kalender', 0, 1, 84, 410, 1, 1, '2023-06-04 18:17:46', NULL),
(95, '85daacff-02c9-11ee-abc0-98d5636f06cf', 'Banner', 'banner', 'fa fa-users', 'nav-sub-menu menu-banner', 0, 1, 84, 411, 1, 1, '2023-06-04 18:18:25', NULL),
(96, '11db3ddd-07a8-11ee-abc0-98d5636f06cf', 'Section', 'section', 'tif-icons ti ti-section', 'nav-sub-menu menu-section', 0, 1, 84, 409, 1, 1, '2023-06-10 23:01:32', '2023-06-10 23:38:21'),
(97, 'a90d556d-07bd-11ee-abc0-98d5636f06cf', 'Absensi Pegawai', 'absensilainnya', 'tif-icons ti ti-section', 'nav-sub-menu menu-absenlainnya', 0, 1, 84, 413, 1, 1, '2023-06-11 01:36:06', NULL),
(98, '6581f693-0b82-11ee-8b0f-f15f07050407', 'Mail Report', 'mailreport', 'fa fa-pencil', 'nav-sub-menu menu-mailreport', 0, 1, 84, 414, 1, 1, '2023-06-15 20:41:57', NULL),
(99, 'd84cd7b2-180c-11ee-9ddc-702771c071f4', 'Level', 'level', 'fa fa-users', 'nav-sub-menu menu-level', 0, 1, 84, 309, 1, 1, '2023-07-01 19:43:14', NULL),
(100, '23fe3f86-20c7-11ee-9ddc-702771c071f4', 'Detail Absen', 'detailabsen', 'fa fa-list', 'nav-menu sub-menu-detailabsen', 0, 1, 84, 415, 1, 1, '2023-07-12 22:16:56', '2023-07-12 22:23:55'),
(101, '3ab0dc7b-23de-11ee-9ddc-702771c071f4', 'Import Employee', 'employee_import', 'fa fa-user', 'nav-sub-menu menu-import-employee', 0, 1, 84, 416, 1, 1, '2023-07-16 20:39:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_priv`
--

CREATE TABLE `m_priv` (
  `id_priv` int(11) NOT NULL,
  `id_uuid` varchar(100) DEFAULT NULL,
  `priv` varchar(45) DEFAULT NULL,
  `aktif` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `m_priv`
--

INSERT INTO `m_priv` (`id_priv`, `id_uuid`, `priv`, `aktif`, `created_at`, `updated_at`) VALUES
(1, '26ee39f8-d698-11ed-9d8d-8548da6d949c', 'Super User', 1, '2022-11-13 18:09:15', '2022-11-13 22:19:50'),
(2, '26ee3c8c-d698-11ed-9d8d-8548da6d949c', 'Admin Simenggaris', 1, '2022-11-13 18:09:15', '2023-06-06 14:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `m_section`
--

CREATE TABLE `m_section` (
  `id_section` int(11) NOT NULL,
  `id_uuid` varchar(100) DEFAULT NULL,
  `section` varchar(150) DEFAULT NULL,
  `aktif` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `m_section`
--

INSERT INTO `m_section` (`id_section`, `id_uuid`, `section`, `aktif`, `created_at`, `updated_at`) VALUES
(1, 'a0561283-1c03-11ee-9ddc-702771c071f4', 'Relations', 1, '2023-07-06 20:46:44', NULL),
(2, 'a05615ed-1c03-11ee-9ddc-702771c071f4', 'G & G', 1, '2023-07-06 20:46:44', NULL),
(3, 'a0561704-1c03-11ee-9ddc-702771c071f4', 'QHSE', 1, '2023-07-06 20:46:44', NULL),
(4, 'a05617d5-1c03-11ee-9ddc-702771c071f4', 'Drilling & WOWS', 1, '2023-07-06 20:46:44', NULL),
(5, 'a056189d-1c03-11ee-9ddc-702771c071f4', 'Finance & Treasury', 1, '2023-07-06 20:46:44', NULL),
(6, 'a0561962-1c03-11ee-9ddc-702771c071f4', 'Engineering', 1, '2023-07-06 20:46:44', NULL),
(7, 'a0561a22-1c03-11ee-9ddc-702771c071f4', 'General Services', 1, '2023-07-06 20:46:44', NULL),
(8, 'a0561ae3-1c03-11ee-9ddc-702771c071f4', 'Procurement & Systems', 1, '2023-07-06 20:46:44', NULL),
(9, 'a0561ba0-1c03-11ee-9ddc-702771c071f4', 'Project Facilities Engineering', 1, '2023-07-06 20:46:44', NULL),
(10, 'a0561c65-1c03-11ee-9ddc-702771c071f4', 'Security', 1, '2023-07-06 20:46:44', NULL),
(11, 'a0561d1f-1c03-11ee-9ddc-702771c071f4', 'Operations', 1, '2023-07-06 20:46:44', NULL),
(12, 'a0561dde-1c03-11ee-9ddc-702771c071f4', 'HR', 1, '2023-07-06 20:46:44', NULL),
(13, 'a0561e9d-1c03-11ee-9ddc-702771c071f4', 'Material & Logistic', 1, '2023-07-06 20:46:44', NULL),
(14, 'a0561f59-1c03-11ee-9ddc-702771c071f4', 'ICT', 1, '2023-07-06 20:46:44', NULL),
(15, 'a0562014-1c03-11ee-9ddc-702771c071f4', 'Legal & Commercial', 1, '2023-07-06 20:46:44', NULL),
(16, 'a05620cf-1c03-11ee-9ddc-702771c071f4', 'Accounting & Reporting', 1, '2023-07-06 20:46:44', NULL),
(17, 'a056218a-1c03-11ee-9ddc-702771c071f4', 'G&G', 1, '2023-07-06 20:46:44', NULL),
(18, 'a0562248-1c03-11ee-9ddc-702771c071f4', 'Drilling Support ', 1, '2023-07-06 20:46:44', NULL),
(19, 'a056230a-1c03-11ee-9ddc-702771c071f4', 'Maintenance', 1, '2023-07-06 20:46:44', NULL),
(20, 'a05623cb-1c03-11ee-9ddc-702771c071f4', 'Lab Technician', 1, '2023-07-06 20:46:44', NULL),
(21, 'a056248d-1c03-11ee-9ddc-702771c071f4', 'Maint. Technician', 1, '2023-07-06 20:46:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_setting`
--

CREATE TABLE `m_setting` (
  `id_setting` int(11) NOT NULL,
  `id_uuid` varchar(100) DEFAULT NULL,
  `aplikasi` varchar(45) DEFAULT NULL,
  `title_url` varchar(100) DEFAULT NULL,
  `image_aplikasi` varchar(100) DEFAULT NULL,
  `image_login` varchar(100) DEFAULT NULL,
  `nama_instansi` varchar(100) DEFAULT NULL,
  `maks_file` varchar(45) DEFAULT NULL,
  `batas_waktu` varchar(45) DEFAULT NULL,
  `sk_node` varchar(45) DEFAULT NULL,
  `allow_mime` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `m_setting`
--

INSERT INTO `m_setting` (`id_setting`, `id_uuid`, `aplikasi`, `title_url`, `image_aplikasi`, `image_login`, `nama_instansi`, `maks_file`, `batas_waktu`, `sk_node`, `allow_mime`) VALUES
(1, '22e3c372-d699-11ed-9d8d-8548da6d949c', 'HOC', 'HOC', 'assets/img/logo_gresik.png', 'assets/img/logo_gresik.png', 'JOB Simenggaris', '10000', '1500000', '182129202122', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_setting_api`
--

CREATE TABLE `m_setting_api` (
  `id_setting_api` int(11) NOT NULL,
  `secret_key` varchar(100) DEFAULT NULL,
  `device` varchar(45) DEFAULT NULL,
  `limit_time` int(11) DEFAULT NULL,
  `aktif` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `m_setting_api`
--

INSERT INTO `m_setting_api` (`id_setting_api`, `secret_key`, `device`, `limit_time`, `aktif`, `created_at`, `updated_at`) VALUES
(1, '7a6302d6-db47-11ed-8239-8c48c505c8dd', 'Android', 2147483647, 1, '2023-04-15 11:39:09', NULL),
(2, '825a318a-db47-11ed-8239-8c48c505c8dd', 'iOS', 2147483647, 1, '2023-04-15 11:39:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_status_keluarga`
--

CREATE TABLE `m_status_keluarga` (
  `id_status_keluarga` int(11) NOT NULL,
  `status` varchar(150) DEFAULT NULL,
  `kode_status` varchar(1) NOT NULL,
  `tipe` int(11) DEFAULT NULL,
  `aktif` int(11) DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `m_status_keluarga`
--

INSERT INTO `m_status_keluarga` (`id_status_keluarga`, `status`, `kode_status`, `tipe`, `aktif`, `created_at`, `updated_at`) VALUES
(0, 'Pilih Status Keluarga', '0', 0, 1, '2023-05-11 21:26:44', '2023-05-23 01:42:49'),
(1, 'Suami', '1', 1, 1, '2023-05-11 21:26:44', NULL),
(2, 'Istri', '2', 0, 1, '2023-05-11 21:26:44', NULL),
(3, 'Anak', '3', 0, 1, '2023-05-11 21:26:44', '2023-05-23 01:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `m_status_kerja`
--

CREATE TABLE `m_status_kerja` (
  `id_status_kerja` int(11) NOT NULL,
  `status_kerja` varchar(150) DEFAULT NULL,
  `site` tinyint(1) NOT NULL,
  `manhours` int(11) NOT NULL,
  `tipe` int(11) DEFAULT NULL,
  `aktif` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `m_status_kerja`
--

INSERT INTO `m_status_kerja` (`id_status_kerja`, `status_kerja`, `site`, `manhours`, `tipe`, `aktif`, `created_at`, `updated_at`) VALUES
(0, 'Pilih Status Bekerja', 0, 0, 0, 1, '2023-05-10 08:00:08', NULL),
(1, 'Working In Office', 1, 8, 1, 1, '2023-05-01 22:05:12', NULL),
(2, 'Cuti', 0, 0, 1, 1, '2023-05-01 22:05:12', NULL),
(3, 'Sakit', 0, 0, 1, 1, '2023-05-01 22:05:12', NULL),
(4, 'Perjalanan Dinas', 0, 8, 1, 1, '2023-05-01 22:05:12', NULL),
(5, 'Holiday / Off Duty / Weekend', 0, 0, 1, 1, '2023-05-01 22:05:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_tipe_vaksin`
--

CREATE TABLE `m_tipe_vaksin` (
  `id_tipe_vaksin` int(11) NOT NULL,
  `id_uuid` varchar(100) DEFAULT NULL,
  `tipe_vaksin` varchar(100) DEFAULT NULL,
  `tipe` int(11) DEFAULT 1,
  `aktif` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `m_tipe_vaksin`
--

INSERT INTO `m_tipe_vaksin` (`id_tipe_vaksin`, `id_uuid`, `tipe_vaksin`, `tipe`, `aktif`, `created_at`, `updated_at`) VALUES
(0, 'b80e88aa-07c9-11ee-abc0-98d5636f06cf', 'Pilih Jenis Vaksin', 0, 1, '2023-05-11 23:06:34', '2023-05-23 00:56:10'),
(1, 'b80e8a42-07c9-11ee-abc0-98d5636f06cf', 'Vaksin 1', 1, 1, '2023-05-11 21:53:14', NULL),
(2, 'b80e8aaf-07c9-11ee-abc0-98d5636f06cf', 'Vaksin 2', 1, 1, '2023-05-11 21:53:14', '2023-06-10 22:43:38'),
(3, 'b80e8af7-07c9-11ee-abc0-98d5636f06cf', 'Vaksin Booster 1', 1, 1, '2023-05-11 21:53:14', '2023-06-10 22:40:52'),
(4, 'b80e8b38-07c9-11ee-abc0-98d5636f06cf', 'Vaksin Booster 2', 1, 1, '2023-05-11 21:53:14', '2023-06-10 22:40:00'),
(5, 'b80e8b77-07c9-11ee-abc0-98d5636f06cf', 'Vaksin Booster 3', 1, 0, '2023-05-11 21:53:14', '2023-06-10 22:40:05'),
(6, 'b80e8bb1-07c9-11ee-abc0-98d5636f06cf', 'Vaksin Booster 4', 1, 0, '2023-05-11 21:53:14', '2023-06-10 22:40:39'),
(9, 'b80e8bee-07c9-11ee-abc0-98d5636f06cf', 'Vaksin Booster 5', 1, 0, '2023-05-25 12:32:44', '2023-06-10 22:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `id_user` int(11) NOT NULL,
  `id_uuid` varchar(100) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `password` varchar(254) DEFAULT NULL,
  `id_priv` int(11) DEFAULT NULL,
  `aktif` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`id_user`, `id_uuid`, `username`, `nama`, `password`, `id_priv`, `aktif`, `created_at`, `updated_at`) VALUES
(1, '73efffa2-d698-11ed-9d8d-8548da6d949c', 'super', 'Muhammad Nizam Al Anshori', '$2y$10$CqQ45LJD3CYyeUaKIhV2ieMCYQ3i029t/IIqIj.FnhCQ8b7H.llLW', 1, 1, '2022-11-13 19:40:13', '2022-11-13 20:11:59'),
(8, '73f002cc-d698-11ed-9d8d-8548da6d949c', 'admin_uss', 'Haris USS', '$2y$10$za.b1b7FAMrQW.GljbQi5.fSvV65VaSKfLdI6mVwOv94cyb33KaCy', 2, 1, '2023-04-09 09:45:46', '2023-06-14 15:41:04'),
(10, '637855af-fac2-11ed-ad02-2cea7f97077c', 'admin', 'Super Admin', '$2y$10$gaJXCBdfiNPKV2NnQfD3ZORFG/SL2GXMUkl2EkrgcP/5LSZ3oNsPq', 1, 1, '2023-05-25 13:07:11', '2023-05-25 13:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `privilege_menu`
--

CREATE TABLE `privilege_menu` (
  `id_priv_menu` int(11) NOT NULL,
  `id_uuid` varchar(100) DEFAULT NULL,
  `id_privilege` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `akses_create` tinyint(4) DEFAULT 1,
  `akses_edit` tinyint(4) DEFAULT 1,
  `akses_delete` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `privilege_menu`
--

INSERT INTO `privilege_menu` (`id_priv_menu`, `id_uuid`, `id_privilege`, `id_menu`, `akses_create`, `akses_edit`, `akses_delete`) VALUES
(2, '04b0e93e-d699-11ed-9d8d-8548da6d949c', 1, 2, 1, 1, 1),
(4, '04b0ed30-d699-11ed-9d8d-8548da6d949c', 1, 4, 1, 1, 1),
(5, '04b0ee5c-d699-11ed-9d8d-8548da6d949c', 1, 6, 1, 1, 1),
(88, '04b0ef06-d699-11ed-9d8d-8548da6d949c', 1, 3, 1, 1, 1),
(101, '04b0ef9c-d699-11ed-9d8d-8548da6d949c', 1, 1, 1, 1, 1),
(106, '04b0f028-d699-11ed-9d8d-8548da6d949c', 1, 5, 1, 1, 1),
(107, '85144714-d69a-11ed-9d8d-8548da6d949c', 2, 1, 1, 1, 1),
(108, '863ddc40-d69a-11ed-9d8d-8548da6d949c', 2, 2, 1, 1, 1),
(109, '875c58f4-d69a-11ed-9d8d-8548da6d949c', 2, 3, 1, 1, 1),
(110, 'bf6b359c-d69c-11ed-9d8d-8548da6d949c', 1, 84, 1, 1, 1),
(112, '529d6f44-d6e1-11ed-8239-8c48c505c8dd', 1, 86, 1, 1, 1),
(113, 'df9a2777-f70e-11ed-ad02-2cea7f97077c', 1, 87, 1, 1, 1),
(114, '54973c00-f8c4-11ed-ad02-2cea7f97077c', 1, 88, 1, 1, 1),
(115, 'a096e43d-f8c7-11ed-ad02-2cea7f97077c', 1, 89, 1, 1, 1),
(116, '5d9813f7-f8cd-11ed-ad02-2cea7f97077c', 1, 90, 1, 1, 1),
(117, '045814e5-f8d0-11ed-ad02-2cea7f97077c', 1, 91, 1, 1, 1),
(118, '64a7899b-f8ec-11ed-ad02-2cea7f97077c', 1, 92, 1, 1, 1),
(119, 'f45a84b5-fee1-11ed-ad02-2cea7f97077c', 1, 93, 1, 1, 1),
(120, '4e09e6d2-0244-11ee-abc0-98d5636f06cf', 1, 85, 1, 1, 1),
(121, '8ec8177b-02c9-11ee-abc0-98d5636f06cf', 1, 94, 1, 1, 1),
(122, '907c2a54-02c9-11ee-abc0-98d5636f06cf', 1, 95, 1, 1, 1),
(123, '81e0eaa1-0340-11ee-abc0-98d5636f06cf', 2, 84, 1, 1, 1),
(124, '827de6ec-0340-11ee-abc0-98d5636f06cf', 2, 85, 1, 1, 1),
(125, '82f4d7f3-0340-11ee-abc0-98d5636f06cf', 2, 86, 1, 1, 1),
(126, '836d464b-0340-11ee-abc0-98d5636f06cf', 2, 87, 1, 1, 1),
(127, '83e79fd9-0340-11ee-abc0-98d5636f06cf', 2, 88, 1, 1, 1),
(128, '845dbd94-0340-11ee-abc0-98d5636f06cf', 2, 89, 1, 1, 1),
(129, '84d53d5b-0340-11ee-abc0-98d5636f06cf', 2, 90, 1, 1, 1),
(130, '854395dc-0340-11ee-abc0-98d5636f06cf', 2, 91, 1, 1, 1),
(131, '85b60244-0340-11ee-abc0-98d5636f06cf', 2, 92, 1, 1, 1),
(132, '8623a314-0340-11ee-abc0-98d5636f06cf', 2, 93, 1, 1, 1),
(133, '86914a1a-0340-11ee-abc0-98d5636f06cf', 2, 94, 1, 1, 1),
(134, '8730bdb1-0340-11ee-abc0-98d5636f06cf', 2, 95, 1, 1, 1),
(138, '1cb366db-07a8-11ee-abc0-98d5636f06cf', 1, 96, 1, 1, 1),
(139, 'af7b0420-07bd-11ee-abc0-98d5636f06cf', 1, 97, 1, 1, 1),
(140, 'a8f63109-0a8f-11ee-8b0f-f15f07050407', 2, 96, 1, 1, 1),
(141, 'a962c8d6-0a8f-11ee-8b0f-f15f07050407', 2, 97, 1, 1, 1),
(142, '6a5c40c9-0b82-11ee-8b0f-f15f07050407', 1, 98, 1, 1, 1),
(143, '8e0b6f78-10d2-11ee-9ddc-702771c071f4', 2, 98, 1, 1, 1),
(144, 'de356a52-180c-11ee-9ddc-702771c071f4', 2, 99, 1, 1, 1),
(145, 'fba19814-180c-11ee-9ddc-702771c071f4', 1, 99, 1, 1, 1),
(146, 'bbca2424-20c8-11ee-9ddc-702771c071f4', 1, 100, 1, 1, 1),
(147, '9f0ee98a-23de-11ee-9ddc-702771c071f4', 1, 101, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `simenggaris_karyawan`
--

CREATE TABLE `simenggaris_karyawan` (
  `No` int(11) DEFAULT NULL,
  `ID_NO` int(11) DEFAULT NULL,
  `NAME` text DEFAULT NULL,
  `DEPARTMENT` text DEFAULT NULL,
  `SECTION` text DEFAULT NULL,
  `POSITION` text DEFAULT NULL,
  `PARENT` text DEFAULT NULL,
  `LEVEL` text DEFAULT NULL,
  `Base` text DEFAULT NULL,
  `Perusahaan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `simenggaris_karyawan`
--

INSERT INTO `simenggaris_karyawan` (`No`, `ID_NO`, `NAME`, `DEPARTMENT`, `SECTION`, `POSITION`, `PARENT`, `LEVEL`, `Base`, `Perusahaan`) VALUES
(1, 20183005, 'Edin Akhmad Syaripudin', 'Technical Planning', '-', 'Technical Planning Manager', 'General Manager', 'Manager', 'Jakarta', 'PERMANENT PERTAMINA SECONDEE'),
(2, 20183006, 'Indriyani Rasyid', 'General Affairs', 'Relations', 'Relations Section Head', 'General Affairs Manager', 'Section Head', 'Jakarta', 'PERMANENT PERTAMINA SECONDEE'),
(3, 20203010, 'Fanny Rosdiawan', 'Technical Planning', 'G & G', 'G & G Section Head', 'Technical Planning Manager', 'Section Head', 'Jakarta', 'PERMANENT PERTAMINA SECONDEE'),
(4, 20203014, 'Rini Novitasari', 'Supply Chain Management', '', 'Buyer', 'Procurement & System Section Head', 'Staff', 'Jakarta', 'PERMANENT PERTAMINA SECONDEE'),
(5, 20213001, 'Dedy Parsaoran Sianturi', 'Project Development', '', 'Project Construction Section Head', 'Project Manager', 'Section Head', 'Jakarta', 'PERMANENT PERTAMINA SECONDEE'),
(6, 20213002, 'Purnomo Rusdiono', 'Project Development', '', 'Project Planning & Control Section Head', 'Project Manager', 'Section Head', 'Jakarta', 'PERMANENT PERTAMINA SECONDEE'),
(7, 20213008, 'Yusuf Prijono', 'Field', '', 'Operations Superintendent', 'Field Manager', 'Superintendent', 'Tarakan', 'PERMANENT PERTAMINA SECONDEE'),
(8, 20213009, 'Tanto Retijono', 'QHSSE', 'QHSE', 'QHSE Section Head', 'QHSSE Manager', 'Section Head', 'Jakarta', 'PERMANENT PERTAMINA SECONDEE'),
(9, 20213015, 'Irwan Iskandar', 'Drilling ', 'Drilling & WOWS', 'Drilling & WOWS Section Head', 'Drilling Manager', 'Section Head', 'Jakarta', 'PERMANENT PERTAMINA SECONDEE'),
(10, 20223008, 'Djudjuwanto', 'Management', '-', 'General Manager', '-', 'General Manager', 'Jakarta', 'PERMANENT PERTAMINA SECONDEE'),
(11, 20223012, 'Fransisca Geronica', 'General Affairs', '', 'General Affairs Manager', 'General Manager', 'Manager', 'Jakarta', 'PERMANENT PERTAMINA SECONDEE'),
(12, 20233005, 'Ahmad Nasrul Hakim', 'Finance', 'Finance & Treasury', 'Finance & Treasury Section Head', 'Finance Manager', 'Section Head', 'Jakarta', 'PERMANENT PERTAMINA SECONDEE'),
(13, 20233006, 'Ricky Therademaker', 'QHSSE', '-', 'QHSSE Manager', 'General Manager', 'Manager', 'Jakarta', 'PERMANENT PERTAMINA SECONDEE'),
(14, 20233008, 'Cahyo Nugroho', 'Field', '-', 'Field Manager', 'General Manager', 'Manager', 'Tarakan', 'PERMANENT PERTAMINA SECONDEE'),
(15, 20183009, 'Balok Sutarto Lugijandoko', 'Technical Planning', 'Engineering', 'Engineering Section Head', 'Technical Planning Manager', 'Section Head', 'Jakarta', 'PERMANENT MEDCO SECONDEE'),
(16, 20193006, 'Sanny Suprihono', 'Drilling ', '-', 'Drilling Manager', 'General Manager', 'Manager', 'Jakarta', 'PERMANENT MEDCO SECONDEE'),
(17, 20203003, 'Copito Sumantri', 'General Affairs', 'General Services', 'General Services Sr Officer', 'General Affairs Manager', 'Staff', 'Jakarta', 'PERMANENT MEDCO SECONDEE'),
(18, 20203004, 'Muhammad Iqbal Hamzah', 'Supply Chain Management', 'Procurement & Systems', 'Field Buyer', 'Procurement & Systems Section Head', 'Staff', 'Jakarta', 'PERMANENT MEDCO SECONDEE'),
(19, 20203006, 'Hardianto', 'Field', '-', 'Field Manager', 'General Manager', 'Manager', 'Tarakan', 'PERMANENT MEDCO SECONDEE'),
(20, 20213004, 'Richard Anglo Rumamby', 'Finance', '-', 'Finance Manager', 'General Manager', 'Manager', 'Jakarta', 'PERMANENT MEDCO SECONDEE'),
(21, 20213006, 'Andre Manuel Winokan', 'Project Development', 'Project Facilities Engineering', 'Project Facilities Engineering Section Head', 'Project Manager', 'Section Head', 'Jakarta', 'PERMANENT MEDCO SECONDEE'),
(22, 20213011, 'Aviantoro Nugroho', 'QHSSE', 'Security', 'Security Section Head', 'QHSSE Manager', 'Section Head', 'Jakarta', 'PERMANENT MEDCO SECONDEE'),
(23, 20223006, 'Audy Armyanto', 'Field', 'Operations', 'Operations Superintendent', 'Field Manager', 'Superintendent', 'Tarakan', 'PERMANENT MEDCO SECONDEE'),
(24, 20223010, 'Prayudha Erlangga Barnas', 'Supply Chain Management', '-', 'Supply Chain Management Manager', 'General Manager', 'Manager', 'Jakarta', 'PERMANENT MEDCO SECONDEE'),
(25, 20223011, 'Puluh Agus Nampan Rianto', 'General Affairs', 'HR', 'HR Section Head', 'General Affairs Manager', 'Section Head', 'Jakarta', 'PERMANENT MEDCO SECONDEE'),
(26, 20233001, 'Irfano Budiyanto', 'General Affairs', 'HR', 'Organization Development & Industrial Relations Analyst', 'HR Section Head', 'Staff', 'Jakarta', 'PERMANENT MEDCO SECONDEE'),
(27, 20233007, 'Carla Femilia', 'Supply Chain Management', 'Procurement & Systems', 'Contract Analyst', 'Procurement & Systems Section Head', 'Staff', 'Jakarta', 'PERMANENT MEDCO SECONDEE'),
(28, 20233013, 'Firly Saniristy', 'Supply Chain Management', 'Material & Logistic', 'Material & Logistic Section Head', 'Supply Chain Management Manager', 'Section Head', 'Jakarta', 'PERMANENT MEDCO SECONDEE'),
(29, 20080213, 'Yunita Feronica Handayani', 'General Affairs', 'HR', 'HRIS & Employees Services Analyst', 'HR Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWTT (PERMANENT)'),
(30, 20090029, 'Frily Indira', 'Finance', 'Finance & Treasury', 'Tax & Treasury Accountant', 'Finance & Treasury Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWTT (PERMANENT)'),
(31, 20090045, 'Meilyano Friza Siregar', 'General Affairs', 'HR', 'C&B And Payroll Analyst', 'HR Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWTT (PERMANENT)'),
(32, 20090051, 'Made Agus Dwi Suarjana', 'General Affairs', 'ICT', 'Information & Communication Technology Analyst', 'General Affairs Manager', 'Staff', 'Jakarta', 'JOB HIRE PWTT (PERMANENT)'),
(33, 20090055, 'Antonia Asih Murniati', 'QHSSE', 'QHSE', 'Industrial Hygine Analyst', 'QHSE Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWTT (PERMANENT)'),
(34, 20090056, 'Alexander Victory Maris', 'Management', 'Legal & Commercial', 'Legal Counsel', 'Legal & Commercial Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWTT (PERMANENT)'),
(35, 20090057, 'Indra Setyawan', 'Supply Chain Management', 'Material & Logistic', 'Materials Management Analyst', 'Material & Logistic Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWTT (PERMANENT)'),
(36, 20100051, 'Chandra Bernard Olii', 'Supply Chain Management', 'Procurement & Systems', 'Buyer', 'Procurement & Systems Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWTT (PERMANENT)'),
(37, 20100053, 'Franciscus Aditya Priyawan', 'Field', 'Operations', 'Production Operations Supervisor', 'Operations Section Head', 'Staff', 'Tarakan', 'JOB HIRE PWTT (PERMANENT)'),
(38, 20100054, 'Primadian Sari Dewi', 'Finance', 'Accounting & Reporting', 'JV Reporting Accountant', 'Accounting & Reporting Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWTT (PERMANENT)'),
(39, 20113003, 'Fitriyadi', 'Technical Planning', 'Engineering', 'Petroleum Engineer', 'Engineering Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWTT (PERMANENT)'),
(40, 20113004, 'Theresia Legio Maria Lira', 'General Affairs', 'HR', 'Talent Development Analyst', 'HR Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWTT (PERMANENT)'),
(41, 20113013, 'Tulus Wibisono', 'Technical Planning', 'G&G', 'Production Geologist', 'G&G Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWTT (PERMANENT)'),
(42, 20123003, 'Rully Charles Rotty', 'QHSSE', 'QHSE', 'Field HSE Analyst', 'QHSE Section Head', 'Staff', 'Tarakan', 'JOB HIRE PWTT (PERMANENT)'),
(43, 20123005, 'Arief Cahyono', 'Drilling ', 'Drilling Support ', 'Drilling Contract Analyst', 'Drilling Support Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWTT (PERMANENT)'),
(44, 20123006, 'Salakhudin Afif', 'Project Development', 'Project Facilities Engineering', 'Electrical Engineer', 'Project Facilites Engineering Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWTT (PERMANENT)'),
(45, 20123009, 'Fredy Christianto', 'QHSSE', 'QHSE', 'Occupational Health Analyst', 'QHSE Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWTT (PERMANENT)'),
(46, 20133002, 'Arif Rahman', 'Field', 'Operations', 'Production Operator', 'Production Operations Supervisor', 'Non Staff', 'Tarakan', 'JOB HIRE PWTT (PERMANENT)'),
(47, 20133003, 'Hadriansyah', 'Field', 'Operations', 'Production Operator', 'Production Operations Supervisor', 'Non Staff', 'Tarakan', 'JOB HIRE PWTT (PERMANENT)'),
(48, 20133004, 'Handriansyah', 'Field', 'Operations', 'Production Operator', 'Production Operations Supervisor', 'Non Staff', 'Tarakan', 'JOB HIRE PWTT (PERMANENT)'),
(49, 20133005, 'Ismail', 'Field', 'Operations', 'Well, Pipeline, Jetty Operator', 'Production Operations Supervisor', 'Non Staff', 'Tarakan', 'JOB HIRE PWTT (PERMANENT)'),
(50, 20133006, 'Kamimi Rahman', 'Field', 'Operations', 'Well, Pipeline, Jetty Operator', 'Production Operations Supervisor', 'Non Staff', 'Tarakan', 'JOB HIRE PWTT (PERMANENT)'),
(51, 20133007, 'Kisnadi', 'Field', 'Operations', 'Well, Pipeline, Jetty Operator', 'Production Operations Supervisor', 'Non Staff', 'Tarakan', 'JOB HIRE PWTT (PERMANENT)'),
(52, 20133008, 'Purwanto', 'Field', 'Operations', 'Production Operator', 'Production Operations Supervisor', 'Non Staff', 'Tarakan', 'JOB HIRE PWTT (PERMANENT)'),
(53, 20133009, 'Suriansyah', 'Field', 'Operations', 'Well, Pipeline, Jetty Operator', 'Production Operations Supervisor', 'Non Staff', 'Tarakan', 'JOB HIRE PWTT (PERMANENT)'),
(54, 20133010, 'Surya Junaidi', 'Field', 'Operations', 'Production Operator', 'Production Operations Supervisor', 'Non Staff', 'Tarakan', 'JOB HIRE PWTT (PERMANENT)'),
(55, 20133011, 'Umar ', 'Field', 'Operations', 'Production Operator', 'Production Operations Supervisor', 'Non Staff', 'Tarakan', 'JOB HIRE PWTT (PERMANENT)'),
(56, 20133012, 'Yahya', 'Field', 'Operations', 'Well, Pipeline, Jetty Operator', 'Production Operations Supervisor', 'Non Staff', 'Tarakan', 'JOB HIRE PWTT (PERMANENT)'),
(57, 20133019, 'Isnianto Saputra', 'Technical Planning', 'G&G', 'Exploration Geologist', 'G&G Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWTT (PERMANENT)'),
(58, 20143004, 'Tangi Reka Ricardo Simamora', 'Finance', 'Accounting & Reporting', 'Cost Performance Analyst', 'Accounting & Reporting Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWTT (PERMANENT)'),
(59, 20183007, 'Eddy Himawan Sulistianto', 'Project Development', 'Project Facilities Engineering', 'Process Engineer', 'Project Facilites Engineering Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWTT (PERMANENT)'),
(60, 20183008, 'Sudibyo', 'QHSSE', 'QHSE', 'Environment Analyst', 'QHSE Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWTT (PERMANENT)'),
(61, 20183010, 'Avesta Yudha Prasetya', 'Technical Planning', 'G&G', 'Geophisicist', 'G&G Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWTT (PERMANENT)'),
(62, 20203007, 'Lukas Singgih', 'Project Development', 'Project Facilities Engineering', 'Civil Engineer', 'Project Facilites Engineering Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWTT (PERMANENT)'),
(63, 20233002, 'Dewa Ayu Srimahoni', 'Management', '-', 'Secretary', 'General Manager', 'Staff', 'Jakarta', 'JOB HIRE PWTT (PERMANENT)'),
(64, 20193002, 'Bayu Anggara Putra', 'General Affairs', 'Relations', 'Communication & Relations Officer', 'Relations Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWT (DIRECT CONTRACT)'),
(65, 20193008, 'Iwan Juswandi', 'Field', 'Operations', 'Well, Pipeline, Jetty Operator', 'Production Operations Supervisor', 'Non Staff', 'Tarakan', 'JOB HIRE PWT (DIRECT CONTRACT)'),
(66, 20203008, 'Ade Yuhendra', 'Project Development', 'Project Facilities Engineering', 'Mechanical & Piping Engineer', 'Project Facilites Engineering Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWT (DIRECT CONTRACT)'),
(67, 20213012, 'Doni Novianto', 'QHSSE', 'QHSE', 'Safety & ERCM Analyst', 'QHSE Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWT (DIRECT CONTRACT)'),
(68, 20213014, 'M. Okta Rizaldi', 'Technical Planning', 'G&G', 'Petroleum Engineer', 'G&G Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWT (DIRECT CONTRACT)'),
(69, 20223001, 'Ariesando', 'General Affairs', 'Relations', 'Field Relations Officer', 'Relations Section Head', 'Staff', 'Tarakan', 'JOB HIRE PWT (DIRECT CONTRACT)'),
(70, 20223002, 'Nurcahyo', 'Field', 'Maintenance', 'Maintenance Supervisor', 'Operations Superintendent', 'Supervisor', 'Tarakan', 'JOB HIRE PWT (DIRECT CONTRACT)'),
(71, 20223005, 'Dony Bona Vena', 'QHSSE', 'Security', 'Operations Security Officer', 'Security Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWT (DIRECT CONTRACT)'),
(72, 20223007, 'Adji Lukman Hakim', 'Field', 'Maintenance', 'Maintenance Supervisor', 'Operations Superintendent', 'Supervisor', 'Tarakan', 'JOB HIRE PWT (DIRECT CONTRACT)'),
(73, 20223009, 'Farahdila Gayatri', 'Finance', 'Finance & Treasury', 'AP/AR Accountant', 'Finance & Treasury Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWT (DIRECT CONTRACT)'),
(74, 20233003, 'Muhammad Anugerah Lukytha', 'General Affairs', 'Relations', 'Field Relations Officer', 'Relations Section Head', 'Staff', 'Tarakan', 'JOB HIRE PWT (DIRECT CONTRACT)'),
(75, 20233004, 'Imat Rohimat', 'Field', 'Maintenance', 'Maintenance Planner & Controller', 'Maintenance Supervisor', 'Staff', 'Tarakan', 'JOB HIRE PWT (DIRECT CONTRACT)'),
(76, 20233009, 'Wahyu Indrianto ', 'Field', 'Maintenance', 'Maintenance Support Supervisor', 'Operations Superintendent', 'Supervisor', 'Tarakan', 'JOB HIRE PWT (DIRECT CONTRACT)'),
(77, 20233010, 'Siswanto', 'Supply Chain Management', 'Material & Logistic', 'Area Warehouse Supervior', 'Material & Logistic Section Head', 'Supervisor', 'Tarakan', 'JOB HIRE PWT (DIRECT CONTRACT)'),
(78, 20233011, 'Yosi Carolina', 'QHSSE', 'QHSE', 'Process Safety Assurance Analyst', 'QHSE Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWT (DIRECT CONTRACT)'),
(79, 20233012, 'Edwin Mulyawan', 'Finance', 'Accounting & Reporting', 'Material & Asset Accountant', 'Accounting & Reporting Section Head', 'Staff', 'Jakarta', 'JOB HIRE PWT (DIRECT CONTRACT)'),
(80, 90000324, 'Abdul Wahab', 'General Affairs', 'General Services', 'General Services Administration', 'General Services Sr Officer', 'Staff', 'Jakarta', 'OUTSOURCE MANPOWER PT MITRA ENERGY SUPPLY'),
(81, 20123010, 'Caroline Fernandez', 'Field', 'General Services', 'Tarakan Office Administration', 'General Services Sr Officer', 'Staff', 'Tarakan', 'OUTSOURCE MANPOWER PT MITRA ENERGY SUPPLY'),
(82, 91600026, 'Cindy Tri Oktavia', 'Supply Chain Management', 'Procurement & Systems', 'Procurement Support Analyst', 'Procurements & System Section Head', 'Staff', 'Jakarta', 'OUTSOURCE MANPOWER PT MITRA ENERGY SUPPLY'),
(83, 91600027, 'Paramitha Prameswari Putri', 'General Affairs', 'HR', 'HR Administration', 'HR Section Head', 'Staff', 'Jakarta', 'OUTSOURCE MANPOWER PT MITRA ENERGY SUPPLY'),
(84, 92001539, 'Nadya Ridzqi Amalia', 'Drilling ', '-', 'Driling Clerk', 'Drilling Manager', 'Non Staff', 'Jakarta', 'OUTSOURCE MANPOWER PT MITRA ENERGY SUPPLY'),
(85, 91600102, 'Mustika Arya Dewi', 'QHSSE', '-', 'QHSSE Administration', 'QHSSE Section Head', 'Staff', 'Jakarta', 'OUTSOURCE MANPOWER PT MITRA ENERGY SUPPLY'),
(86, 91600148, 'Adji Mayumi Vannia', 'General Affairs', 'Relations', 'General Affairs Clerk', 'Relations Section Head', 'Non Staff', 'Jakarta', 'OUTSOURCE MANPOWER PT MITRA ENERGY SUPPLY'),
(87, 0, 'Desi Yulinar', 'Technical Planning', '-', 'Technical Planning Clerk', 'Technical Planning Manager', 'Non Staff', 'Jakarta', 'OUTSOURCE MANPOWER PT MITRA ENERGY SUPPLY'),
(88, 0, 'Willy Hardhika', 'General Affairs', 'General Services', 'General Services Administration', 'General Services Hr Officer', 'Staff', 'Jakarta', 'OUTSOURCE MANPOWER PT MITRA ENERGY SUPPLY'),
(89, 0, 'Tengku Shahindra', 'General Affairs', 'HR', 'HR Consultant', 'HR Section Head', 'Staff', 'Jakarta', 'OUTSOURCE MANPOWER PT MITRA ENERGY SUPPLY'),
(90, 90000815, 'Zaldy Sofyan', 'Field', 'General Services', 'Admin Tarakan Office', 'General Services Sr Officer', 'Non Staff', 'Tarakan', 'OUTSOURCE MANPOWER PT MITRA ENERGY SUPPLY'),
(91, 91600071, 'Darisman', 'Field', 'Maintenance', 'Supervisor Maintenance Support', 'Maintenance Supervisor', 'Staff', 'Tarakan', 'OUTSOURCE MANPOWER PT ORYX SERVICES'),
(92, 91600097, 'Achmad Nur Firmanto', 'Field', 'Maintenance', 'Foreman', 'Maintenance Supervisor', 'Non Staff', 'Tarakan', 'OUTSOURCE MANPOWER PT ORYX SERVICES'),
(93, 91600095, 'Andi Lao', 'Field', 'Maintenance', 'Maintenance Technician', 'Maintenance Supervisor', 'Non Staff', 'Tarakan', 'OUTSOURCE MANPOWER PT ORYX SERVICES'),
(94, 0, 'Andrie Dhalles ', 'Field', 'Maintenance', 'Maintenance Technician', 'Maintenance Supervisor', 'Non Staff', 'Tarakan', 'OUTSOURCE MANPOWER PT ORYX SERVICES'),
(95, 0, 'Ruslan', 'Field', 'Maintenance', 'Support Technician', 'Maintenance Supervisor', 'Non Staff', 'Tarakan', 'OUTSOURCE MANPOWER PT ORYX SERVICES'),
(96, 91600088, 'Tarmuji', 'Field', 'Maintenance', 'Support Technician', 'Maintenance Supervisor', 'Non Staff', 'Tarakan', 'OUTSOURCE MANPOWER PT ORYX SERVICES'),
(97, 0, 'Maghfuri', 'Field', 'Maintenance', 'Support Technician', 'Maintenance Supervisor', 'Non Staff', 'Tarakan', 'OUTSOURCE MANPOWER PT ORYX SERVICES'),
(98, 0, 'Ahyar', 'Field', 'Maintenance', 'Support Technician', 'Maintenance Supervisor', 'Non Staff', 'Tarakan', 'OUTSOURCE MANPOWER PT ORYX SERVICES'),
(99, 91600098, 'Damar', 'Field', 'Maintenance', 'Support Technician', 'Maintenance Supervisor', 'Non Staff', 'Tarakan', 'OUTSOURCE MANPOWER PT ORYX SERVICES'),
(100, 91600067, 'Ardi Gumelar', 'Field', 'Operations', 'Field Admin', 'Production Supervisor', 'Non Staff', 'Tarakan', 'OUTSOURCE MANPOWER PT ORYX SERVICES'),
(101, 91600083, 'Nur halim, S.IP', 'Field', 'Operations', 'Field Admin', 'Production Supervisor', 'Non Staff', 'Tarakan', 'OUTSOURCE MANPOWER PT ORYX SERVICES'),
(102, 90800024, 'Yopie Handrian ', 'QHSSE', 'QHSE', 'Field HSE Officer', 'QHSE Section Head', 'Staff', 'Tarakan', 'OUTSOURCE MANPOWER PT ORYX SERVICES'),
(103, 91600046, 'Muhammad Ifdal Akbar', 'Project Development', 'Project Facilities Engineering', 'Project Clerk', 'Project Facilities Engineering Section Head', 'Non Staff', 'Jakarta', 'OUTSOURCE MANPOWER PT ORYX SERVICES'),
(104, 0, 'Ali Akbar Sammalis Galenggang Nasution', 'Field', 'Lab Technician', 'Production Supervisor', '', '', 'Tarakan', 'OUTSOURCE MANPOWER PT ORYX SERVICES'),
(105, 0, 'Rusmin Hidayat', 'Field', 'Maint. Technician', 'Maintenance Supervisor', '', '', 'Tarakan', 'OUTSOURCE MANPOWER PT ORYX SERVICES');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_absensi`
--
ALTER TABLE `detail_absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `detail_absensi_keluarga`
--
ALTER TABLE `detail_absensi_keluarga`
  ADD PRIMARY KEY (`id_detail_absensi_keluarga`);

--
-- Indexes for table `detail_absensi_pegawai_lainnya`
--
ALTER TABLE `detail_absensi_pegawai_lainnya`
  ADD PRIMARY KEY (`id_detail_absensi_pegawai_lainnya`);

--
-- Indexes for table `detail_history_employee_status`
--
ALTER TABLE `detail_history_employee_status`
  ADD PRIMARY KEY (`id_detail_history_employee_status`);

--
-- Indexes for table `detail_riwayat_vaksin`
--
ALTER TABLE `detail_riwayat_vaksin`
  ADD PRIMARY KEY (`id_detail_riwayat_vaksin`);

--
-- Indexes for table `m_agenda`
--
ALTER TABLE `m_agenda`
  ADD PRIMARY KEY (`id_agenda`),
  ADD UNIQUE KEY `id_uuid_UNIQUE` (`id_uuid`);

--
-- Indexes for table `m_banner`
--
ALTER TABLE `m_banner`
  ADD PRIMARY KEY (`id_banner`),
  ADD UNIQUE KEY `id_uuid_UNIQUE` (`id_uuid`);

--
-- Indexes for table `m_base`
--
ALTER TABLE `m_base`
  ADD PRIMARY KEY (`id_base`);

--
-- Indexes for table `m_company`
--
ALTER TABLE `m_company`
  ADD PRIMARY KEY (`id_company`),
  ADD UNIQUE KEY `id_uuid_UNIQUE` (`id_uuid`);

--
-- Indexes for table `m_departemen`
--
ALTER TABLE `m_departemen`
  ADD PRIMARY KEY (`id_departemen`),
  ADD UNIQUE KEY `id_uuid_UNIQUE` (`id_uuid`);

--
-- Indexes for table `m_employee`
--
ALTER TABLE `m_employee`
  ADD PRIMARY KEY (`id_employee`),
  ADD UNIQUE KEY `id_uuid_UNIQUE` (`id_uuid`),
  ADD UNIQUE KEY `code_UNIQUE` (`code`),
  ADD KEY `employee_employee_status_idx` (`id_employee_status`);

--
-- Indexes for table `m_employee_status`
--
ALTER TABLE `m_employee_status`
  ADD PRIMARY KEY (`id_employee_status`);

--
-- Indexes for table `m_jabatan`
--
ALTER TABLE `m_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `m_keluarga`
--
ALTER TABLE `m_keluarga`
  ADD PRIMARY KEY (`id_keluarga`);

--
-- Indexes for table `m_kondisi_kesehatan`
--
ALTER TABLE `m_kondisi_kesehatan`
  ADD PRIMARY KEY (`id_kondisi_kesehatan`);

--
-- Indexes for table `m_level`
--
ALTER TABLE `m_level`
  ADD PRIMARY KEY (`id_level`),
  ADD UNIQUE KEY `id_uuid_UNIQUE` (`id_uuid`);

--
-- Indexes for table `m_log`
--
ALTER TABLE `m_log`
  ADD PRIMARY KEY (`id_log`),
  ADD UNIQUE KEY `id_uuid_UNIQUE` (`id_uuid`);

--
-- Indexes for table `m_lokasi_kerja`
--
ALTER TABLE `m_lokasi_kerja`
  ADD PRIMARY KEY (`id_lokasi_kerja`);

--
-- Indexes for table `m_mailreport`
--
ALTER TABLE `m_mailreport`
  ADD PRIMARY KEY (`id_mailreport`) USING BTREE;

--
-- Indexes for table `m_menu`
--
ALTER TABLE `m_menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD UNIQUE KEY `id_uuid_UNIQUE` (`id_uuid`);

--
-- Indexes for table `m_priv`
--
ALTER TABLE `m_priv`
  ADD PRIMARY KEY (`id_priv`),
  ADD UNIQUE KEY `id_uuid_UNIQUE` (`id_uuid`);

--
-- Indexes for table `m_section`
--
ALTER TABLE `m_section`
  ADD PRIMARY KEY (`id_section`);

--
-- Indexes for table `m_setting`
--
ALTER TABLE `m_setting`
  ADD PRIMARY KEY (`id_setting`),
  ADD UNIQUE KEY `id_uuid_UNIQUE` (`id_uuid`);

--
-- Indexes for table `m_setting_api`
--
ALTER TABLE `m_setting_api`
  ADD PRIMARY KEY (`id_setting_api`);

--
-- Indexes for table `m_status_keluarga`
--
ALTER TABLE `m_status_keluarga`
  ADD PRIMARY KEY (`id_status_keluarga`);

--
-- Indexes for table `m_status_kerja`
--
ALTER TABLE `m_status_kerja`
  ADD PRIMARY KEY (`id_status_kerja`);

--
-- Indexes for table `m_tipe_vaksin`
--
ALTER TABLE `m_tipe_vaksin`
  ADD PRIMARY KEY (`id_tipe_vaksin`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_uuid_UNIQUE` (`id_uuid`),
  ADD KEY `user_priv_idx` (`id_priv`);

--
-- Indexes for table `privilege_menu`
--
ALTER TABLE `privilege_menu`
  ADD PRIMARY KEY (`id_priv_menu`),
  ADD UNIQUE KEY `id_uuid_UNIQUE` (`id_uuid`),
  ADD KEY `privilege_menu_priv_idx` (`id_privilege`),
  ADD KEY `privilege_menu_menu_idx` (`id_menu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_absensi`
--
ALTER TABLE `detail_absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `detail_absensi_keluarga`
--
ALTER TABLE `detail_absensi_keluarga`
  MODIFY `id_detail_absensi_keluarga` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_absensi_pegawai_lainnya`
--
ALTER TABLE `detail_absensi_pegawai_lainnya`
  MODIFY `id_detail_absensi_pegawai_lainnya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `detail_history_employee_status`
--
ALTER TABLE `detail_history_employee_status`
  MODIFY `id_detail_history_employee_status` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_riwayat_vaksin`
--
ALTER TABLE `detail_riwayat_vaksin`
  MODIFY `id_detail_riwayat_vaksin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `m_agenda`
--
ALTER TABLE `m_agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `m_banner`
--
ALTER TABLE `m_banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `m_base`
--
ALTER TABLE `m_base`
  MODIFY `id_base` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_company`
--
ALTER TABLE `m_company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_departemen`
--
ALTER TABLE `m_departemen`
  MODIFY `id_departemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `m_employee`
--
ALTER TABLE `m_employee`
  MODIFY `id_employee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `m_employee_status`
--
ALTER TABLE `m_employee_status`
  MODIFY `id_employee_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `m_jabatan`
--
ALTER TABLE `m_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `m_keluarga`
--
ALTER TABLE `m_keluarga`
  MODIFY `id_keluarga` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_kondisi_kesehatan`
--
ALTER TABLE `m_kondisi_kesehatan`
  MODIFY `id_kondisi_kesehatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_level`
--
ALTER TABLE `m_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `m_log`
--
ALTER TABLE `m_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `m_lokasi_kerja`
--
ALTER TABLE `m_lokasi_kerja`
  MODIFY `id_lokasi_kerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_mailreport`
--
ALTER TABLE `m_mailreport`
  MODIFY `id_mailreport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_menu`
--
ALTER TABLE `m_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `m_priv`
--
ALTER TABLE `m_priv`
  MODIFY `id_priv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_section`
--
ALTER TABLE `m_section`
  MODIFY `id_section` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `m_setting`
--
ALTER TABLE `m_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_setting_api`
--
ALTER TABLE `m_setting_api`
  MODIFY `id_setting_api` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_status_keluarga`
--
ALTER TABLE `m_status_keluarga`
  MODIFY `id_status_keluarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_status_kerja`
--
ALTER TABLE `m_status_kerja`
  MODIFY `id_status_kerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `m_tipe_vaksin`
--
ALTER TABLE `m_tipe_vaksin`
  MODIFY `id_tipe_vaksin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `privilege_menu`
--
ALTER TABLE `privilege_menu`
  MODIFY `id_priv_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_employee`
--
ALTER TABLE `m_employee`
  ADD CONSTRAINT `employee_employee_status` FOREIGN KEY (`id_employee_status`) REFERENCES `m_employee_status` (`id_employee_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `m_user`
--
ALTER TABLE `m_user`
  ADD CONSTRAINT `user_priv` FOREIGN KEY (`id_priv`) REFERENCES `m_priv` (`id_priv`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `privilege_menu`
--
ALTER TABLE `privilege_menu`
  ADD CONSTRAINT `privilege_menu_menu` FOREIGN KEY (`id_menu`) REFERENCES `m_menu` (`id_menu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `privilege_menu_priv` FOREIGN KEY (`id_privilege`) REFERENCES `m_priv` (`id_priv`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
