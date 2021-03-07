-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Feb 2021 pada 05.45
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_program_studi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_peminatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nilai_SIE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nilai_MLP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nilai_MLTI` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nilai_PITI` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nilai_KK` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nilai_NKB` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nilai_VVPL` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nilai_KA` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nilai_PAG` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nilai_JKKG` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nilai_KJK` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nilai_MJ` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nilai_PCD` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nilai_TA` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nilai_MP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nilai_PBD` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nilai_PPF` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nilai_JKL` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id`, `foto`, `nama`, `id_kota`, `alamat`, `kuota`, `id_program_studi`, `id_peminatan`, `Nilai_SIE`, `Nilai_MLP`, `Nilai_MLTI`, `Nilai_PITI`, `Nilai_KK`, `Nilai_NKB`, `Nilai_VVPL`, `Nilai_KA`, `Nilai_PAG`, `Nilai_JKKG`, `Nilai_KJK`, `Nilai_MJ`, `Nilai_PCD`, `Nilai_TA`, `Nilai_MP`, `Nilai_PBD`, `Nilai_PPF`, `Nilai_JKL`, `created_at`, `updated_at`) VALUES
(1, 'alit indonesia .png', 'Alit Indonesia', '1', 'Jl. Ketintang Madya', '100', '1', '1', '4', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 02:13:02', '2021-02-06 08:40:27'),
(2, NULL, 'Badan Penelitian dan Pengembangan Provinsi Jawa Timur', '1', 'Jl. Gayung Kebonsari No 57', '100', '1', '2', NULL, NULL, '3.75', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 02:13:37', '2021-02-05 02:13:37'),
(3, 'BPS kota Sby.jpg', 'Badan Pusat Statistika Kota Surabaya', '1', 'A. Yani 121 E Surabaya', '100', '1', NULL, '4', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 02:38:57', '2021-02-05 02:38:57'),
(4, NULL, 'BID TIK Polda Jatim', '1', 'Jl. Ahmad Yani No.116, Gayungan, Kec. Wonocolo, Kota SBY, Jawa Timur 60231', '100', '1', '1', '4', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 02:47:38', '2021-02-05 02:47:38'),
(5, NULL, 'Delta Sinergi Prima', '1', '\"Semampir Tengah No 69, Surabaya \"', '100', '1', '1', '4', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 02:48:55', '2021-02-05 02:48:55'),
(6, NULL, 'Dinas Pekerjaan Umum Sumber Daya Air Provinsi Jawa Timur', '1', 'Jl. Gayung Kebonsari No.169, Ketintang, Kec. Gayungan, Kota SBY, Jawa Timur 60235', '100', '1', '2', NULL, NULL, '3.75', '3.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 02:51:26', '2021-02-05 02:51:26'),
(7, 'Dinas PU Bina Marga Provinsi Jawa Timur.jpg', 'Dinas PU Bina Marga Provinsi Jawa Timur', '1', 'Jl. Gayung Kebonsari No. 167', '100', '1', NULL, NULL, NULL, '3.75', '3.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 02:52:46', '2021-02-05 02:52:46'),
(8, 'Dinas Tenaga Kerja  dan Transmigrasi Provinsi Jatim.jpg', 'Dinas Tenaga Kerja dan Transmigrasi Provinsi Jawa Timur', '1', 'Menanggal', '100', '1', '1', '4', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 02:55:38', '2021-02-05 02:55:38'),
(9, NULL, 'Distrik Navigasi Kelas 1 Surabaya', '1', 'Jl. Perak Barat No. 435 A', '100', '1', '1', '4', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 02:57:50', '2021-02-05 02:57:50'),
(10, NULL, 'IT Nusaindotechnolog', '1', 'Penjaringan Sari 1i-31, Surabaya', '100', '1', '1', '3.75', '3.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 03:01:00', '2021-02-06 11:30:39'),
(11, NULL, 'Jahitin', '2', 'jahitin.com', '100', '1', '2', NULL, NULL, '3.75', '3.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 03:02:53', '2021-02-05 03:02:53'),
(12, NULL, 'KPP PRATAMA MOJOKERTO', '3', 'Jl. R.A Basuni, Jampirogo, Sooko, Mojokerto', '100', '1', '1', '4', '3.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 03:04:54', '2021-02-05 03:04:54'),
(13, NULL, 'Pelindo III', '1', 'Perak Timur No 610, Surabaya', '98', '1', '1', '3.5', '3.5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 03:06:31', '2021-02-07 06:03:30'),
(14, NULL, 'PT BOEMI WELIRANG MODJOPAHIT', '3', 'JALAN RAYA CLAKET', '100', '1', '1', '4', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 03:08:15', '2021-02-05 03:08:15'),
(15, NULL, 'PT Kasir Pintar Internasional', '1', 'Sukolilo', '100', '1', '1', '4', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 03:09:30', '2021-02-05 03:09:30'),
(16, NULL, 'PT. Eastern Logistics', '4', 'JL. Raya Daendels, Km. 64- 65, Paciran, Sedayulawas, Brondong, Kabupaten Lamongan, Jawa Timur', '100', '1', '2', NULL, NULL, '3.5', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 03:11:06', '2021-02-05 03:11:06'),
(17, NULL, 'PT. INKA Madiun', '5', 'Jl.Yos Yudarso No 71, Madiun', '100', '1', '2', '3.75', '3.5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 03:12:46', '2021-02-05 03:12:46'),
(18, NULL, 'PT. Kinetic Digital Indonesia', '1', 'Puri Gununganar Regency', '100', '1', '2', '3.5', '3.5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 03:14:08', '2021-02-05 03:14:08'),
(19, NULL, 'PT. Perkebunan Nusantara XII', '1', 'Jl. Rajawali 44 Surabaya', '100', '1', '2', NULL, NULL, '3.5', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 03:15:32', '2021-02-06 13:08:14'),
(20, NULL, 'PT. POS', '2', 'Jl. Sultan Aguang No 50, Sidaorjo', '100', '1', '1', '3.75', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 03:16:33', '2021-02-05 03:16:33'),
(21, NULL, 'PT. SPINDO,Tbk', '1', 'Jl. Kalibutuh no. 191', '100', '1', '2', NULL, NULL, '3.75', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 03:18:01', '2021-02-05 03:18:01'),
(22, NULL, 'PT. Taspen', '1', 'Jl. Raya Diponegoro No 193, Surabaya', '100', '1', '2', NULL, NULL, '3.5', '3.5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 03:18:58', '2021-02-05 03:18:58'),
(23, NULL, 'PT. Wilmar Nabati Indonesia', '6', 'Jl. Kapten Darmo Sugondo No.56, Jupuro, Indro, Kebomas, Kabupaten Gresik, Jawa Timur 61125', '100', '1', '2', NULL, NULL, '4', '3.5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 03:20:01', '2021-02-05 03:20:01'),
(25, NULL, 'Badan Perencanaan Pembangunan Kota Surabaya', '1', 'Jl. Pacar No. 8 , 60272, Kota Surabaya Jawa Timur', '100', '4', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', '3.75', NULL, NULL, NULL, NULL, '2021-02-05 03:26:19', '2021-02-05 03:26:19'),
(26, 'Balai Riset dan Standarisasi Industri.jpeg', 'Balai Riset dan Standardisasi Industri Surabaya', '1', 'jln Jagir wonokromo', '100', '4', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3.5', '4', NULL, NULL, NULL, NULL, '2021-02-05 03:28:40', '2021-02-05 03:28:40'),
(27, NULL, 'CV. ELECTRA GROUP', '1', 'Jl. Rungkut Menanggal Harapan No.X /19', '100', '4', '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '3', NULL, NULL, '2021-02-05 03:30:04', '2021-02-05 03:30:04'),
(28, NULL, 'Dinas Kebudayaan dan Pariwisata Provinsi Jawa Timur', '1', 'Jl. Wisata Menanggal, Dukuh Menanggal, Kec. Gayungan, Kota SBY', '100', '4', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3.75', '4', NULL, NULL, NULL, NULL, '2021-02-05 03:32:17', '2021-02-05 03:32:17'),
(29, NULL, 'Dinas Pendidikan Kota Surabaya', '1', 'Jl. Jagir Wonokromo No.356, Sidosermo, Kec. Wonocolo, Kota SBY, Jawa Timur', '100', '4', '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', '4', NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 03:34:54', '2021-02-05 03:34:54'),
(30, NULL, 'DINAS PENDIDIKAN UPT. TIKP', '1', 'Sidosermo, Kec. Wonocolo, Kota SBY, Jawa Timur 60244', '100', '4', '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3.5', '4', NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 03:36:58', '2021-02-05 03:36:58'),
(31, NULL, 'DINAS SOSIAL JAWA TIMUR', '1', 'Jl. Gayung Kebonsari No.56b, Gayungan', '100', '4', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', '4', NULL, NULL, NULL, NULL, '2021-02-05 03:38:41', '2021-02-05 03:38:41'),
(32, NULL, 'Dinas sosial Kabupaten Sidoarjo', '2', 'Jl.Pahlawan No.1 . Sidoarjo', '100', '4', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', '4', NULL, '3', NULL, NULL, '2021-02-05 03:40:09', '2021-02-05 03:40:09'),
(33, NULL, 'Dispendukcapil Kota Surabaya', '1', 'Jl. Tunjungan No.1-3, Genteng, Kec. Genteng, Kota SBY, Jawa Timur 60275', '100', '4', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3.75', '4', NULL, NULL, NULL, NULL, '2021-02-05 03:41:38', '2021-02-05 03:41:38'),
(34, NULL, 'Graha Kreatif Investama Group', '1', 'Jl Rungkut Menanggal Harapan Blok X no 19', '100', '4', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '3', NULL, NULL, NULL, NULL, '2021-02-05 03:43:28', '2021-02-05 03:43:28'),
(35, NULL, 'Kantor Dinas Kependudukan dan Pencatatan Sipil Kota Surabaya', '1', 'Jl. Tunjungan no 1-3', '100', '4', '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', '4', NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 03:44:44', '2021-02-05 03:44:44'),
(36, NULL, 'Kantor Pos Surabaya Selatan', '1', 'Jl Jemur andayani surabaya', '100', '4', '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', '3.75', NULL, NULL, '2021-02-05 03:47:45', '2021-02-05 03:47:45'),
(37, NULL, 'Kementrian Agama Jawa Timur', '2', 'Jl. Raya Bandara Juanda No.26, Semalang, Semambung, Kec. Gedangan, Kabupaten Sidoarjo, Jawa Timur 61253', '100', '4', '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', '3.5', NULL, NULL, NULL, NULL, '2021-02-05 03:48:57', '2021-02-05 03:48:57'),
(38, NULL, 'PDAM Surya Sembada Kota Surabaya', '1', 'Jl. Mayjend Prof.Dr.Moestopo No.2 Surabaya', '100', '4', '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3.5', '3', NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 03:51:37', '2021-02-05 03:51:37'),
(39, NULL, 'PT KIPA TEKNOLOGI INDONESIA', '9', 'Jl simpang sulfat selatan kav no 4', '100', '4', '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', '4', NULL, NULL, '2021-02-05 03:52:53', '2021-02-05 03:52:53'),
(40, NULL, 'PT. SALWA ANUGERAH SEMESTA', '1', 'Komplek Bintang Diponggo Kav. 885', '100', '4', '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3.75', '3.75', NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 03:53:38', '2021-02-05 03:53:38'),
(41, NULL, 'PT. Telekomunikasi Seluler', '1', 'Jl. Pemuda No. 181 Surabaya', '100', '4', '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3.75', '4', NULL, NULL, '2021-02-05 03:54:21', '2021-02-05 03:54:21'),
(43, 'Bank Jatim Kantor Pusat Surabaya.jpg', 'Bank Jatim Kantor Pusat Surabaya', '1', '\"Jl. Basuki Rahmat No. 98-104 , Embong Kaliasin, Genteng  Kota Surabaya Jawa Timur 60271\"', '100', '2', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 03:59:57', '2021-02-05 03:59:57'),
(44, 'Dinas Komunikasi dan Informatika Pemerintah Provinsi Jawa Timur.jpg', 'Dinas Komunikasi dan Informasi Kabupaten Tulungagung', '7', 'Jl. Sultan Agung No.3, Dusun Kedungsingkal, Ketanon, Kec. Kedungwaru', '100', '2', '7', NULL, NULL, NULL, NULL, NULL, NULL, '2', '3.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 04:01:21', '2021-02-05 04:01:21'),
(45, 'Dinas Komunikasi dan Informatika Pemerintah Provinsi Jawa Timur.jpg', 'Dinas Komunikasi dan Informatika Provinsi Jawa Timur', '1', 'Jl. A. Yani 242 - 244, Surabaya', '100', '2', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', '3.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 04:02:49', '2021-02-05 04:02:49'),
(46, NULL, 'Dinas Pekerjaan Umum Bina Marga Provinsi Jawa Timur', '1', 'l. Gayung Kebonsari No.167, Gayungan, Kec. Gayungan, Kota SBY,', '100', '2', '4', NULL, NULL, NULL, NULL, NULL, NULL, '3.5', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 04:05:19', '2021-02-05 04:05:19'),
(47, NULL, 'Dinas Pekerjaan Umum Sumber Daya Air Jawa Timur', '1', 'Jl. Gayung Kebonsari No.169, Ketintang, Kec. Gayungan, Kota SBY, Jawa Timur 60235', '100', '2', '4', NULL, NULL, NULL, NULL, NULL, NULL, '4', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 04:06:47', '2021-02-05 04:06:47'),
(49, NULL, 'G-Smart IT Solution', '1', 'Surabaya', '100', '2', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', '3.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 05:04:21', '2021-02-05 05:04:21'),
(50, NULL, 'Hexavara Tech', '1', 'Jl. Dharmahusada V No.1, RT.004/RW.01, Pacar Kembang, Kec. Tambaksari,', '100', '2', '4', NULL, NULL, NULL, NULL, NULL, NULL, '4', '3.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 05:06:13', '2021-02-05 05:06:13'),
(51, NULL, 'Lembaga Penjaminan Mutu Pendidikan (LPMP) Provinsi Jawa Timur', '1', 'l. Ketintang Wiyata No.15, Ketintang, Kec. Gayungan, Kota SBY,', '100', '2', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3.5', '3.5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 05:07:04', '2021-02-05 05:07:04'),
(52, NULL, 'pawitra Network', '2', 'ds. medalem sukodono sidoarjo', '100', '2', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 05:08:08', '2021-02-05 05:08:08'),
(53, NULL, 'PDAM Delta Tirta Kabupaten Sidoarjo', '2', 'Jl. Pahlawan No.1, Rw6, Sidokumpul, Kec. Sidoarjo, Kabupaten Sidoarjo,', '100', '2', '4', NULL, NULL, NULL, NULL, NULL, NULL, '2', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 05:48:22', '2021-02-05 05:48:22'),
(54, NULL, 'Pengadilan Tata Usaha Negara Surabaya', '2', 'Jl. Raya Ir. H.Juanda No.89, Semawalang, Semambung, Kec. Gedangan', '100', '2', '5', NULL, NULL, NULL, NULL, '4', '3.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 05:49:36', '2021-02-05 05:49:36'),
(55, NULL, 'PPTI Unesa', '1', 'Jl. Lidah Wetan, Lidah Wetan, Kec. Lakarsantri', '100', '2', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', '3.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 05:50:50', '2021-02-05 05:50:50'),
(56, NULL, 'PT KAI Daop 7', '5', 'yosudarso', '100', '2', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3.5', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 05:52:15', '2021-02-05 05:52:15'),
(57, NULL, 'PT. Bimasakti Multi Sinergi', '2', 'Delta Raya Utara No 49, Waru', '100', '2', '4', NULL, NULL, NULL, NULL, NULL, NULL, '4', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 05:53:57', '2021-02-05 05:53:57'),
(58, NULL, 'PT. Semen Indonesia Tbk. Pabrik Tuban', '8', 'Desa Sumberarum Kecamatan Kerek Kabupaten Tuban', '100', '2', '4', NULL, NULL, NULL, NULL, NULL, NULL, '3', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-05 05:55:05', '2021-02-05 05:55:05'),
(60, 'Balai Riset dan Standarisasi Industri.jpeg', 'Balai Riset dan Standarisasi Industri', '1', 'Jl. Jagir Wonokromo no. 360 Panjang Jiwo, Tenggilis Mejoyo', '100', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '3.5', '2021-02-05 06:04:47', '2021-02-05 06:04:47'),
(61, 'Dealer Hyundai Jl. Sulawesi.png', 'Dealer Hyundai', '1', 'Jl. Sulawesi No.53, Gubeng, Kec. Gubeng, Kota SBY, Jawa Timur 60281', '100', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '3.5', '2021-02-05 06:05:38', '2021-02-05 06:06:25'),
(64, 'Dinas Tenaga Kerja  dan Transmigrasi Provinsi Jatim.jpg', 'Dinas Tenaga Kerja dan Transmigrasi Jawa Timur', '1', ' Jl. Dukuh Menanggal Sel. No.124-126, Dukuh Menanggal, Kec. Gayungan', '100', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '3.5', '2021-02-05 06:09:30', '2021-02-05 06:09:30'),
(65, 'Dinas Komunikasi dan Informatika Pemerintah Provinsi Jawa Timur.jpg', 'Dinas Komunikasi dan Informatika Pemerintah Provinsi Jawa Timur', '1', 'Jl. A Yani 242-244 Surabaya', '100', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3.5', '2', '2021-02-05 06:10:58', '2021-02-05 06:10:58'),
(66, NULL, 'Dinas perhubungan Pemerintah Provinsi Jawa Timur', '1', 'Jl. A Yani 212 Surabaya', '100', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '2', '2021-02-05 06:12:13', '2021-02-05 06:12:13'),
(67, 'IT Center-Tarlac Agricultural University.jpg', 'IT Center-Tarlac Agricultural University', '10', 'Malacampa, Camiling, Tarlac, Filipina 2306', '100', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3.75', '4', '2021-02-05 06:36:07', '2021-02-05 06:36:07'),
(68, 'Beacukai sidoarjo.png', 'Kantor Bea dan Cukai Sidoarjo', '2', ' Jl. Raya Bandara Juanda KM. 3-4, Sedati Agung, Sidoarjo, Manyar, Sedati Agung, Kec. Sedati, ', '100', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2.75', '3.5', '2021-02-05 06:37:12', '2021-02-05 06:37:12'),
(69, 'KPP Pratama Surabaya Karang Pilang.jpg', 'KPP Pratama Surabaya Karang Pilang', '1', 'Jl. Jagir Wonokromo', '100', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '3.75', '2021-02-05 06:38:12', '2021-02-05 06:38:12'),
(70, NULL, 'LPP TVRI Stasiun  Jawa timur', '1', 'Jl. Mayjend Sungkono no.124 Surabaya', '100', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2.5', '2.75', '2021-02-05 06:41:47', '2021-02-05 06:41:47'),
(71, 'Petrokimia.png', 'Petrokimia', '6', 'JL. Jendral Ahmad Yani, Ngipik, Ngipik, Gresik', '100', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2.75', '3.75', '2021-02-05 06:43:25', '2021-02-05 06:43:25'),
(74, 'PT. Fokus Jaya Mitra.png', 'PT. Fokus Jaya Mitra', '6', 'Jl. Prof. Muh. Yamin, SH, Tlogongipik, Jarangkuwung, Tlogopojok, Gresik', '100', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '3.5', '2021-02-05 06:46:58', '2021-02-05 06:46:58'),
(75, NULL, 'PT. Gema Solusindo Utama', '2', 'Perum. Pondok Wage Indah 2 L-3 Sidoarjo, Jawa Timur', '100', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', '3', '2021-02-05 06:49:49', '2021-02-05 06:49:49'),
(76, 'PT. KAI DAOP 8 Surabaya.png', 'PT. KAI DAOP 8 Surabaya', '1', 'Jl. Gubeng Masjid, Pacar Keling, Kec. Tambaksari, Kota SBY, Jawa Timur 60131', '100', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2.75', '3.5', '2021-02-05 06:52:05', '2021-02-05 06:52:05');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lokasi_nama_unique` (`nama`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
