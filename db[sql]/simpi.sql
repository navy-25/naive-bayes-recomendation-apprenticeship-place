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
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Surabaya', '2021-02-05 01:45:09', '2021-02-05 01:45:09'),
(2, 'Sidoarjo', '2021-02-05 01:45:14', '2021-02-05 01:45:14'),
(3, 'Mojokerto', '2021-02-05 01:45:18', '2021-02-05 01:45:18'),
(4, 'Lamongan', '2021-02-05 01:45:24', '2021-02-05 01:45:24'),
(5, 'Madiun', '2021-02-05 01:45:28', '2021-02-05 01:45:28'),
(6, 'Gresik', '2021-02-05 01:45:38', '2021-02-05 01:45:38'),
(7, 'Tulungagung', '2021-02-05 01:45:53', '2021-02-05 01:45:53'),
(8, 'Tuban', '2021-02-05 01:46:07', '2021-02-05 01:46:07'),
(9, 'Malang', '2021-02-05 01:46:31', '2021-02-05 01:46:31'),
(10, 'Filiphina', '2021-02-05 01:46:47', '2021-02-05 01:46:47'),
(11, 'Magelang', '2021-02-07 05:47:05', '2021-02-07 05:47:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `magang`
--

CREATE TABLE `magang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_users` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_29_064630_create_magang_table', 1),
(5, '2021_01_29_064726_create_laporan_table', 1),
(6, '2021_01_29_064740_create_program_studi_table', 1),
(7, '2021_01_29_064750_create_peminatan_table', 1),
(8, '2021_01_29_064811_create_nilai_table', 1),
(9, '2021_01_29_064821_create_kota_table', 1),
(10, '2021_01_29_064833_create_train_data_table', 1),
(11, '2021_01_29_130630_create_lokasi_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminatan`
--

CREATE TABLE `peminatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_program_studi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peminatan`
--

INSERT INTO `peminatan` (`id`, `nama`, `id_program_studi`, `created_at`, `updated_at`) VALUES
(1, 'Enterprise', '1', NULL, NULL),
(2, 'Tata Kelola TI', '1', NULL, NULL),
(3, 'Jaringan Multimedia', '2', '2021-02-05 01:42:13', '2021-02-05 01:42:13'),
(4, 'Teknologi Perangkat Lunak', '2', '2021-02-05 01:42:22', '2021-02-05 01:42:22'),
(5, 'Computer Science', '2', '2021-02-05 01:42:42', '2021-02-05 01:42:42'),
(6, 'Teknologi Multimedia', '4', '2021-02-05 01:43:09', '2021-02-05 01:43:09'),
(7, 'Rekayasa Perangkat Lunak', '4', '2021-02-05 01:43:15', '2021-02-05 01:43:15'),
(8, 'Teknologi Jaringan', '4', '2021-02-05 01:43:36', '2021-02-05 01:43:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_studi`
--

CREATE TABLE `program_studi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `program_studi`
--

INSERT INTO `program_studi` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Sistem Informasi', NULL, NULL),
(2, 'Teknik Informatika', NULL, NULL),
(3, 'Manajemen Informatika', NULL, NULL),
(4, 'Pendidikan Teknologi Informasi', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `train_data`
--

CREATE TABLE `train_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_kota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_program_studi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Dumping data untuk tabel `train_data`
--

INSERT INTO `train_data` (`id`, `id_lokasi`, `jenis_kelamin`, `id_kota`, `id_program_studi`, `id_peminatan`, `Nilai_SIE`, `Nilai_MLP`, `Nilai_MLTI`, `Nilai_PITI`, `Nilai_KK`, `Nilai_NKB`, `Nilai_VVPL`, `Nilai_KA`, `Nilai_PAG`, `Nilai_JKKG`, `Nilai_KJK`, `Nilai_MJ`, `Nilai_PCD`, `Nilai_TA`, `Nilai_MP`, `Nilai_PBD`, `Nilai_PPF`, `Nilai_JKL`, `created_at`, `updated_at`) VALUES
(414, 'PT. Wilmar Nabati Indonesia', 'L', 'Gresik', 'SI', 'Enterprise', 'A-', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(415, 'PT. INKA Madiun ', 'L', 'Madiun', 'SI', 'Enterprise', 'A-', 'B+', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(416, 'PT. POS', 'L', 'Sidoarjo', 'SI', 'Enterprise', 'A-', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(417, 'Badan Penelitian dan Pengembangan Provinsi Jawa Timur', 'L', 'Surabaya', 'SI', 'Enterprise', 'A', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(418, 'Delta Sinergi Prima', 'L', 'Surabaya', 'SI', 'Enterprise', 'A', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(419, 'Dinas Tenaga Kerja dan Transmigrasi Provinsi Jawa Timur', 'L', 'Surabaya', 'SI', 'Enterprise', 'A', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(420, 'IT Nusaindotechnolog', 'L', 'Surabaya', 'SI', 'Enterprise', 'A-', 'A-', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(421, 'Pelindo III', 'L', 'Surabaya', 'SI', 'Enterprise', 'A', 'B+', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(422, 'PT. Kinetic Digital Indonesia', 'L', 'Surabaya', 'SI', 'Enterprise', 'B+', 'B+', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(423, 'KPP PRATAMA MOJOKERTO', 'P', 'Mojokerto', 'SI', 'Enterprise', 'A', 'A-', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(424, 'PT BOEMI WELIRANG MODJOPAHIT', 'P', 'Mojokerto', 'SI', 'Enterprise', 'A', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(425, 'Alit Indonesia', 'P', 'Surabaya', 'SI', 'Enterprise', 'A', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(426, 'Badan Pusat Statistika Kota Surabaya', 'P', 'Surabaya', 'SI', 'Enterprise', 'A', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(427, 'BID TIK Polda Jatim', 'P', 'Surabaya', 'SI', 'Enterprise', 'A', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(428, 'Distrik Navigasi Kelas 1 Surabaya', 'P', 'Surabaya', 'SI', 'Enterprise', 'A', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(429, 'PT Kasir Pintar Internasional', 'P', 'Surabaya', 'SI', 'Enterprise', 'A', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(430, 'PT. Eastern Logistics', 'L', 'Lamongan', 'SI', 'Tata Kelola TI', '', '', 'B+', 'B+', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(431, 'Jahitin', 'L', 'Sidoarjo', 'SI', 'Tata Kelola TI', '', '', 'A-', 'A-', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(432, 'PT. Perkebunan Nusantara XII', 'L', 'Surabaya', 'SI', 'Tata Kelola TI', '', '', 'A', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(433, 'Dinas PU Bina Marga Provinsi Jawa Timur', 'P', 'Surabaya', 'SI', 'Tata Kelola TI', '', '', 'A-', 'A-', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(434, 'PT. SPINDO,Tbk', 'P', 'Surabaya', 'SI', 'Tata Kelola TI', '', '', 'A-', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(435, 'PT. Taspen', 'P', 'Surabaya', 'SI', 'Tata Kelola TI', '', '', 'B+', 'B+', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(436, 'Dinas Pekerjaan Umum Sumber Daya Air Provinsi Jawa Timur', 'P', 'Surabaya', 'SI', 'Tata Kelola TI', '', '', 'A-', 'A-', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(437, 'Balai Riset dan Standarisasi Industri', 'L', 'Surabaya', 'MI', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'B', 'B+', NULL, NULL),
(438, 'Dealer Hyundai', 'L', 'Surabaya', 'MI', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'A-', 'A', NULL, NULL),
(439, 'Dinas Tenaga Kerja dan Transmigrasi Jawa Timur', 'P', 'Surabaya', 'MI', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'B', 'B+', NULL, NULL),
(440, 'IT Center-Tarlac Agricultural University', 'L', 'Filiphina', 'MI', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'A-', 'A', NULL, NULL),
(441, 'Kantor Bea dan Cukai Sidoarjo', 'L', 'Sidoarjo', 'MI', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'B-', 'B+', NULL, NULL),
(442, 'KPP Pratama Surabaya Karang Pilang', 'P', 'Surabaya', 'MI', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'B', 'A-', NULL, NULL),
(443, 'LPP TVRI Stasiun  Jawa timur', 'L', 'Surabaya', 'MI', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'B', 'B+', NULL, NULL),
(444, 'Petrokimia', 'L', 'Gresik', 'MI', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'C+', 'B+', NULL, NULL),
(445, 'PT. Bimasakti Multi Sinergi', 'L', 'Sidoarjo', 'MI', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'B+', 'B', NULL, NULL),
(446, 'PT. Fokus Jaya Mitra', 'P', 'Gresik', 'MI', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'B', 'B+', NULL, NULL),
(447, 'PT. Gema Solusindo Utama', 'L', 'Sidoarjo', 'MI', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'A', 'B', NULL, NULL),
(448, 'PT. KAI DAOP 8 Surabaya', 'L', 'Surabaya', 'MI', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'B-', 'B+', NULL, NULL),
(449, 'Dinas Kebudayaan dan Pariwisata Provinsi Jawa Timur', 'L', 'Surabaya', 'PTI', 'Teknologi Multimedia', '', '', '', '', '', '', '', '', '', '', '', '', 'A', 'A', '', '', '', '', NULL, NULL),
(450, 'Balai Riset dan Standardisasi Industri Surabaya', 'L', 'Surabaya', 'PTI', 'Teknologi Multimedia', '', '', '', '', '', '', '', '', '', '', '', '', 'A-', 'A', '', '', '', '', NULL, NULL),
(451, 'Dinas sosial Kabupaten Sidoarjo', 'L', 'Sidoarjo', 'PTI', 'Teknologi Multimedia', '', '', '', '', '', '', '', '', '', '', '', '', 'A', 'A', '', 'B', '', '', NULL, NULL),
(452, 'Kementrian Agama Jawa Timur', 'L', 'Sidoarjo', 'PTI', 'Teknologi Multimedia', '', '', '', '', '', '', '', '', '', '', '', '', 'A-', 'A', '', '', '', '', NULL, NULL),
(453, 'PT. SALWA ANUGERAH SEMESTA', 'L', 'Surabaya', 'PTI', 'Rekayasa Perangkat Lunak', '', '', '', '', '', '', '', '', '', '', 'A-', 'A-', '', '', '', '', '', '', NULL, NULL),
(454, 'Graha Kreatif Investama Group', 'L', 'Surabaya', 'PTI', 'Teknologi Multimedia', '', '', '', '', '', '', '', '', '', '', '', '', 'B', 'B', '', '', '', '', NULL, NULL),
(455, 'PT KIPA TEKNOLOGI INDONESIA', 'L', 'Malang', 'PTI', 'Rekayasa Perangkat Lunak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'A', 'A', '', '', NULL, NULL),
(456, 'Lembaga Penjaminan Mutu Pendidikan (LPMP) Provinsi Jawa Timur', 'L', 'Surabaya', 'PTI', 'Teknologi Jaringan', '', '', '', '', '', '', '', '', '', '', 'A', 'A', '', '', '', '', '', '', NULL, NULL),
(457, 'CV. ELECTRA GROUP', 'L', 'Surabaya', 'PTI', 'Rekayasa Perangkat Lunak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'B', 'B', '', '', NULL, NULL),
(458, 'PDAM Surya Sembada Kota Surabaya', 'L', 'Surabaya', 'PTI', 'Teknologi Jaringan', '', '', '', '', '', '', '', '', '', '', 'A', 'A', '', '', '', '', '', '', NULL, NULL),
(459, 'Badan Perencanaan Pembangunan Kota Surabaya', 'L', 'Surabaya', 'PTI', 'Teknologi Multimedia', '', '', '', '', '', '', '', '', '', '', '', '', 'A', 'A-', '', '', '', '', NULL, NULL),
(460, 'Dispendukcapil Kota Surabaya', 'P', 'Surabaya', 'PTI', 'Teknologi Multimedia', '', '', '', '', '', '', '', '', '', '', '', '', 'A-', 'A', '', '', '', '', NULL, NULL),
(461, 'Kantor pos surabaya selatan', 'P', 'Surabaya', 'PTI', 'Rekayasa Perangkat Lunak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'A-', 'A', '', '', NULL, NULL),
(462, 'PT. Telekomunikasi Seluler', 'P', 'Surabaya', 'PTI', 'Rekayasa Perangkat Lunak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'A-', 'A', '', '', NULL, NULL),
(463, 'Dinas Pendidikan Kota Surabaya', 'P', 'Surabaya', 'PTI', 'Teknologi Jaringan', '', '', '', '', '', '', '', '', '', '', 'A', 'A', '', '', '', '', '', '', NULL, NULL),
(464, 'DINAS SOSIAL JAWA TIMUR', 'P', 'Surabaya', 'PTI', 'Teknologi Multimedia', '', '', '', '', '', '', '', '', '', '', '', '', 'B', 'A', '', 'B', '', '', NULL, NULL),
(465, 'DINAS PENDIDIKAN UPT. TIKP', 'P', 'Surabaya', 'PTI', 'Teknologi Jaringan', '', '', '', '', '', '', '', '', '', '', 'B+', 'A', '', '', '', '', '', '', NULL, NULL),
(466, 'Kantor Dinas Kependudukan dan Pencatatan Sipil Kota Surabaya', 'P', 'Surabaya', 'PTI', 'Teknologi Jaringan', '', '', '', '', '', '', '', '', '', '', 'A', 'A', '', '', '', '', '', '', NULL, NULL),
(467, 'Dinas Pendidikan Provinsi Jawa Timur', 'P', 'Surabaya', 'PTI', 'Teknologi Jaringan', '', '', '', '', '', '', '', '', '', '', 'A', 'A', '', '', '', '', '', '', NULL, NULL),
(468, 'pawitra Network', 'L', 'Sidoarjo', 'TI', 'Jaringan Multimedia', '', '', '', '', '', 'B', '', '', '', 'B', '', '', '', '', '', '', '', '', NULL, NULL),
(469, 'PT KAI Daop 7', 'L', 'Madiun', 'TI', 'Jaringan Multimedia', '', '', '', '', '', '', 'B+', '', 'B', '', '', '', '', '', '', '', '', '', NULL, NULL),
(470, 'Dinas Komunikasi dan Informatika Provinsi Jawa Timur', 'L', 'Surabaya', 'TI', 'Teknologi Perangkat Lunak', '', '', '', '', '', '', 'B+', '', 'A', '', '', '', '', '', '', '', '', '', NULL, NULL),
(471, 'Hexavara Tech', 'L', 'Surabaya', 'TI', 'Teknologi Perangkat Lunak', '', '', '', '', '', '', 'A', '', 'A', '', '', '', '', '', '', '', '', '', NULL, NULL),
(472, 'PDAM Delta Tirta Kabupaten Sidoarjo', 'L', 'Sidoarjo', 'TI', 'Teknologi Perangkat Lunak', '', '', '', '', '', '', 'A-', '', 'A-', '', '', '', '', '', '', '', '', '', NULL, NULL),
(473, 'PPTI Unesa', 'L', 'Surabaya', 'TI', 'Jaringan Multimedia', '', '', '', '', '', 'A', '', '', '', 'A-', '', '', '', '', '', '', '', '', NULL, NULL),
(474, 'Dinas Komunikasi dan Informasi Kabupaten Tulungagung', 'L', 'Tulungagung', 'TI', 'Jaringan Multimedia', '', '', '', '', '', 'A', '', '', '', 'B', '', '', '', '', '', '', '', '', NULL, NULL),
(475, 'Dinas Pekerjaan Umum Sumber Daya Air Jawa Timur', 'L', 'Surabaya', 'TI', 'Teknologi Perangkat Lunak', '', '', '', '', '', '', 'A', '', 'A', '', '', '', '', '', '', '', '', '', NULL, NULL),
(476, 'PT. Semen Indonesia Tbk. Pabrik Tuban', 'L', 'Tuban', 'TI', 'Teknologi Perangkat Lunak', '', '', '', '', '', '', 'A', '', 'A', '', '', '', '', '', '', '', '', '', NULL, NULL),
(477, 'Bank Jatim Kantor Pusat Surabaya', 'P', 'Surabaya', 'TI', 'Teknologi Perangkat Lunak', '', '', '', '', '', '', 'B-', '', 'B', '', '', '', '', '', '', '', '', '', NULL, NULL),
(478, 'Dinas Pekerjaan Umum Bina Marga Provinsi Jawa Timur', 'P', 'Surabaya', 'TI', 'Jaringan Multimedia', '', '', '', '', '', 'B', '', '', '', 'A', '', '', '', '', '', '', '', '', NULL, NULL),
(479, 'G-Smart IT Solution', 'P', 'Surabaya', 'TI', 'Jaringan Multimedia', '', '', '', '', '', 'A', '', '', '', 'A-', '', '', '', '', '', '', '', '', NULL, NULL),
(480, 'Pengadilan Tata Usaha Negara Surabaya', 'P', 'Sidoarjo', 'TI', 'Computer Science', '', '', '', '', 'A', '', '', 'A-', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(497, 'PT. Mina Laut', 'P', 'Gresik', 'MI', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'A', 'B', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akses` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_studi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peminatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `akses`, `nim`, `gender`, `program_studi`, `peminatan`, `telepon`, `status`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '-', 'L', '1', '1', '-', 'Belom', 'admin123@gmail.com', NULL, '$2y$10$Ho0vVWLT5c.TUy4V0zT2Kuupk7A8mATllX6f3eG9zgCpwBpXuiq/a', NULL, '2021-02-05 01:41:12', '2021-02-05 01:41:12'),
(2, 'SI_Enterprise', 'user', '2021001', 'L', '1', '1', '085232070001', 'Belom', 'enterprise123@gmail.com', NULL, '$2y$10$mNP42U8RYiLM5TAXtKK/JOouIwt9ewfrs9skvt.qCJCDC2bsx/I/6', NULL, '2021-02-05 01:48:09', '2021-02-14 21:36:14'),
(3, 'SI_TataKelolaTI', 'user', '2017002', 'L', '1', '2', '085232070002', 'Belom', 'tatakelolati123@gmail.com', NULL, '$2y$10$5SBU7RwHpECDJzKAuExn5O4ohnG0al4e06LzPc4wDLv6nbydviNHK', NULL, '2021-02-05 01:48:48', '2021-02-05 01:48:48'),
(4, 'TI_JaringanMultimedia', 'user', '2017003', 'L', '2', '3', '085232070003', 'Belom', 'jaringanmultimedia123@gmail.com', NULL, '$2y$10$5peu.tnakBnVQ/EVl5KCoeDI9sSzkTOgKNJLSAlemfKozhkKH8BO6', NULL, '2021-02-05 01:49:59', '2021-02-05 01:49:59'),
(5, 'TI_TeknologiPerangkatLunak', 'user', '2017004', 'L', '2', '4', '085232070004', 'Belom', 'teknologiperangkatlunak123@gmail.com', NULL, '$2y$10$h/5NsSUdYyvceTxBBrqK5.B8S8RB21yiqv1ugWqScxQW5SuT5GI2S', NULL, '2021-02-05 01:50:47', '2021-02-05 01:50:47'),
(6, 'TI_ComputerScience', 'user', '2017005', 'L', '2', '5', '085232070005', 'Belom', 'computerscience123@gmail.com', NULL, '$2y$10$gFMQbZNH6N5zhgvCMAyqken9y0bNEMAsvtMdgl9yqY4tjedqLpL3u', NULL, '2021-02-05 01:51:20', '2021-02-05 01:51:20'),
(7, 'MI_ManajemenInformatika', 'user', '2017006', 'L', '3', '0', '085232070006', 'Belom', 'manajemeninformatika123@gmail.com', NULL, '$2y$10$9msvS5cF9zMssMuq4Ai1dO.vnRREeeb7VVGWAmNaJBW1mFBb3Kkhu', NULL, '2021-02-05 01:55:01', '2021-02-14 09:29:48'),
(8, 'PTI_TeknologiMultimedia', 'user', '2017007', 'L', '4', '6', '085232070007', 'Belom', 'teknologimultimedia123@gmail.com', NULL, '$2y$10$GCZmX89glcEXyhp7TIbv4.Wr47QRXYQQ3GRaxwMHM4qp7oI6HuWzy', NULL, '2021-02-05 01:56:57', '2021-02-06 13:40:33'),
(9, 'PTI_RekayasaPerangkatLunak', 'user', '2017008', 'L', '4', '7', '085232070008', 'Belom', 'rekayasaperangkatlunak123@gmail.com', NULL, '$2y$10$kzzrBG0C9UGQazprQRIRCe/OpMMkybPhyngrFdhYJjdHQslgl/oty', NULL, '2021-02-05 01:57:36', '2021-02-05 01:57:36'),
(10, 'PTI_TeknologiJaringan', 'user', '2017009', 'L', '4', '8', '085232070009', 'Belom', 'teknologijaringan123@gmail.com', NULL, '$2y$10$rc8hxosmITGemu6wUnuFKuNBGdTNpQ5LIemXMbBXt6pedLFyBjJ02', NULL, '2021-02-05 01:58:07', '2021-02-05 01:58:07');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kota_nama_unique` (`nama`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `magang`
--
ALTER TABLE `magang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `peminatan`
--
ALTER TABLE `peminatan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `peminatan_nama_unique` (`nama`);

--
-- Indeks untuk tabel `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `program_studi_nama_unique` (`nama`);

--
-- Indeks untuk tabel `train_data`
--
ALTER TABLE `train_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nim_unique` (`nim`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kota`
--
ALTER TABLE `kota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `magang`
--
ALTER TABLE `magang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `peminatan`
--
ALTER TABLE `peminatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `program_studi`
--
ALTER TABLE `program_studi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `train_data`
--
ALTER TABLE `train_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=498;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
