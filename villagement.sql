-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 06:13 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `villagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_desa`
--

CREATE TABLE `data_desa` (
  `id` char(26) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_desa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_desa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kepala_desa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kecamatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kabupaten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_desa`
--

INSERT INTO `data_desa` (`id`, `nama_desa`, `alamat_desa`, `nama_kepala_desa`, `nama_kecamatan`, `nama_kabupaten`, `created_at`, `updated_at`) VALUES
('', 'Wakanda', 'Jalan Wakanda 53, Kelurahan Wakanda, Kecamatan Wakanda Tua', 'Jo Kwon', 'Wakanda Tua', 'Wakanda lebih tua', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` char(26) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pertanyaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `pertanyaan`, `jawaban`, `is_active`, `created_at`, `updated_at`) VALUES
('01h23pmpwpwd9w09pwgecrzhck', 'Test Pertanyaan 1', 'Test Jawaban 1', 1, '2023-06-04 10:17:54', '2023-06-04 11:28:04'),
('01h23rvcy9jr4fecg2vwya0ywe', 'Test Pertanyaan 2', 'Test Jawaban 2', 1, '2023-06-04 10:56:30', '2023-06-04 10:56:30');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` char(26) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `replied_to` char(26) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upvote_count` bigint(20) NOT NULL DEFAULT 0,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `status` enum('menunggu','proses','selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'menunggu',
  `is_ditutup` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `creator_id`, `judul`, `content`, `replied_to`, `upvote_count`, `view_count`, `status`, `is_ditutup`, `created_at`, `updated_at`) VALUES
('01h21rvx25gvgjctzs2mz0zaw0', '01h1grgyj6fzj7w3kat0951awk', NULL, 'gesegssg', '01h20g9g0ryqy2w6h1m7z5wjzk', 0, 0, 'menunggu', 0, '2023-06-03 16:18:18', '2023-06-03 16:18:18'),
('01h21t30fygd8vte3nbxtrc2pg', '01h1grgyj6fzj7w3kat0951awk', 'Bismillah', 'ini cm test', NULL, 1, 3, 'proses', 1, '2023-06-03 16:39:39', '2023-06-05 00:13:32'),
('01h21wa24dpcqc9z3qajjawpbp', '01h1b4akb0w5ph6m2wjjeq2rs0', '', 'keluh kesah anda telah kami baca dan akan kami tindak lanjuti, terimakasih banyak!', '01h21t30fygd8vte3nbxtrc2pg', 0, 0, 'menunggu', 0, '2023-06-03 17:18:28', '2023-06-03 17:18:28'),
('01h21zpsfstvwsvr6aqmxpcq15', '01h1grgyj6fzj7w3kat0951awk', '', 'Siap Terimakasih', '01h21t30fygd8vte3nbxtrc2pg', 0, 0, 'menunggu', 0, '2023-06-03 18:17:50', '2023-06-03 18:17:50'),
('01h2566j72p0yjzc5mt9c9rat1', '01h255b6484y3xm4ah2kyr5g22', 'Ini test forum', 'ini test deskripsi forum', NULL, 1, 3, 'proses', 0, '2023-06-05 00:09:02', '2023-06-20 08:48:09'),
('01h2568p2hxn5dxwe0cr4dq6d8', '01h255b6484y3xm4ah2kyr5g22', '', 'Ini test komentar', '01h2566j72p0yjzc5mt9c9rat1', 0, 0, 'menunggu', 0, '2023-06-05 00:10:12', '2023-06-05 00:10:12'),
('01h256esxgyfvw1xea1rtavk5k', '01h1b4akb0w5ph6m2wjjeq2rs0', '', 'keluh kesah anda telah kami baca dan akan kami tindak lanjuti, terimakasih banyak!', '01h21t30fygd8vte3nbxtrc2pg', 0, 0, 'menunggu', 0, '2023-06-05 00:13:32', '2023-06-05 00:13:32'),
('01h39189ycakeeqmez5zf48dpg', '01h1b4akb0w5ph6m2wjjeq2rs0', '', 'keluh kesah anda telah kami baca dan akan kami tindak lanjuti, terimakasih banyak!', '01h2566j72p0yjzc5mt9c9rat1', 0, 0, 'menunggu', 0, '2023-06-18 22:15:16', '2023-06-18 22:15:16');

-- --------------------------------------------------------

--
-- Table structure for table `forum_media`
--

CREATE TABLE `forum_media` (
  `id` char(26) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forum_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_file` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forum_media`
--

INSERT INTO `forum_media` (`id`, `forum_id`, `nama_file`, `created_at`, `updated_at`) VALUES
('01h21rvx2d5v5ta1brfgd75aq8', '01h21rvx25gvgjctzs2mz0zaw0', 'KrisnaPutraMariyanto_01h21rvx25gvgjctzs2mz0zaw0_1_2023-06-0323-18-18.png', '2023-06-03 16:18:18', '2023-06-03 16:18:18'),
('01h2566j7e2z3rzzdf8b5k8gk5', '01h2566j72p0yjzc5mt9c9rat1', '30_KrisnaPutraMariyanto_01h2566j72p0yjzc5mt9c9rat1_1_2023-06-0507-09-02.jpg', '2023-06-05 00:09:02', '2023-06-05 00:09:02'),
('01h2566j7hrka1e3txgkcbrqme', '01h2566j72p0yjzc5mt9c9rat1', '30_KrisnaPutraMariyanto_01h2566j72p0yjzc5mt9c9rat1_2_2023-06-0507-09-02.jpg', '2023-06-05 00:09:02', '2023-06-05 00:09:02'),
('01h2566j7mmp5stxchytc60ngm', '01h2566j72p0yjzc5mt9c9rat1', '30_KrisnaPutraMariyanto_01h2566j72p0yjzc5mt9c9rat1_3_2023-06-0507-09-02.jpg', '2023-06-05 00:09:02', '2023-06-05 00:09:02'),
('01h2568p307bxyxcpwz6jjtk1t', '01h2568p2hxn5dxwe0cr4dq6d8', '30_KrisnaPutraMariyanto_01h2568p2hxn5dxwe0cr4dq6d8_1_2023-06-0507-10-12.jpg', '2023-06-05 00:10:12', '2023-06-05 00:10:12'),
('01h2568p33n8pfz6y0ragvhng8', '01h2568p2hxn5dxwe0cr4dq6d8', '30_KrisnaPutraMariyanto_01h2568p2hxn5dxwe0cr4dq6d8_2_2023-06-0507-10-12.jpg', '2023-06-05 00:10:12', '2023-06-05 00:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `forum_views`
--

CREATE TABLE `forum_views` (
  `id` char(26) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forum_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forum_views`
--

INSERT INTO `forum_views` (`id`, `user_id`, `forum_id`, `created_at`, `updated_at`) VALUES
('01h21v0j4d2kecjcv25xjp83tw', '01h1grgyj6fzj7w3kat0951awk', '01h21t30fygd8vte3nbxtrc2pg', '2023-06-03 16:55:48', '2023-06-03 16:55:48'),
('01h21v87kjcqhvtba5r2zrzbnn', '01h1b4akb0w5ph6m2wjjeq2rs0', '01h21t30fygd8vte3nbxtrc2pg', '2023-06-03 16:59:59', '2023-06-03 16:59:59'),
('01h250jpfc6wkkezj89gnq1svp', '01h191vbkep5ke54cywq2drhye', '01h21t30fygd8vte3nbxtrc2pg', '2023-06-04 22:30:48', '2023-06-04 22:30:48'),
('01h2567wcf7xbsmc8qyt5aabjn', '01h255b6484y3xm4ah2kyr5g22', '01h2566j72p0yjzc5mt9c9rat1', '2023-06-05 00:09:45', '2023-06-05 00:09:45'),
('01h3917xc35qngqk5mqwtmbepg', '01h1b4akb0w5ph6m2wjjeq2rs0', '01h2566j72p0yjzc5mt9c9rat1', '2023-06-18 22:15:03', '2023-06-18 22:15:03'),
('01h3cqvvzgc00ed8eyfftkg9wt', '01h191vbkep5ke54cywq2drhye', '01h2566j72p0yjzc5mt9c9rat1', '2023-06-20 08:48:09', '2023-06-20 08:48:09');

-- --------------------------------------------------------

--
-- Table structure for table `forum_vote`
--

CREATE TABLE `forum_vote` (
  `id` char(26) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forum_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forum_vote`
--

INSERT INTO `forum_vote` (`id`, `user_id`, `forum_id`, `created_at`, `updated_at`) VALUES
('01h2228jy6krrhyeygpvr7yk33', '01h1grgyj6fzj7w3kat0951awk', '01h21t30fygd8vte3nbxtrc2pg', '2023-06-03 19:02:31', '2023-06-03 19:02:31'),
('01h2567jfk1avq87rbbba503e4', '01h255b6484y3xm4ah2kyr5g22', '01h2566j72p0yjzc5mt9c9rat1', '2023-06-05 00:09:35', '2023-06-05 00:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `kelengkapan_permohonan`
--

CREATE TABLE `kelengkapan_permohonan` (
  `id` char(26) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permohonan_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelengkapan_permohonan`
--

INSERT INTO `kelengkapan_permohonan` (`id`, `permohonan_id`, `nama_file`, `created_at`, `updated_at`) VALUES
('01h1sh5dabmgb9fz1nwtja5490', '01h1sh5da30cjvn7apas3cv2ep', 'KrisnaPutra_SuratKeteranganTidakMampu(SKTM)_1_2023-05-3118-29-45.pdf', '2023-05-31 11:29:45', '2023-05-31 11:29:45'),
('01h1sh5dafc17h274p45ted6ad', '01h1sh5da30cjvn7apas3cv2ep', 'KrisnaPutra_SuratKeteranganTidakMampu(SKTM)_2_2023-05-3118-29-45.png', '2023-05-31 11:29:45', '2023-05-31 11:29:45'),
('01h1sh8h4d2x4726efmb84hjy4', '01h1sh8h42kmzk038pfdcpc8md', 'KrisnaPutra_SuratKeteranganTidakMampu(SKTM)_1_2023-05-3118-31-28.jpg', '2023-05-31 11:31:28', '2023-05-31 11:31:28'),
('01h1sh8h4gcbjwfgwspeaqr7sz', '01h1sh8h42kmzk038pfdcpc8md', 'KrisnaPutra_SuratKeteranganTidakMampu(SKTM)_2_2023-05-3118-31-28.pdf', '2023-05-31 11:31:28', '2023-05-31 11:31:28'),
('01h22rygkxtpmtzf8s2dd356pv', '01h22rygjygqhrj2hz089whz5v', 'KrisnaPutraMariyanto_SuratKeteranganUsaha(SKU)_1_2023-06-0408-38-58.png', '2023-06-04 01:38:58', '2023-06-04 01:38:58'),
('01h22rygm2kww6ygzy465t2zf1', '01h22rygjygqhrj2hz089whz5v', 'KrisnaPutraMariyanto_SuratKeteranganUsaha(SKU)_2_2023-06-0408-38-58.png', '2023-06-04 01:38:58', '2023-06-04 01:38:58'),
('01h2561vrze855d3971wwwah1m', '01h2561vrd7rbtasm0vwqwwfnb', '30_KrisnaPutraMariyanto_SuratKeteranganUsaha(SKU)_1_2023-06-0507-06-28.pdf', '2023-06-05 00:06:28', '2023-06-05 00:06:28'),
('01h2561vs3b3pfj3mm1hz3vzt2', '01h2561vrd7rbtasm0vwqwwfnb', '30_KrisnaPutraMariyanto_SuratKeteranganUsaha(SKU)_2_2023-06-0507-06-28.pdf', '2023-06-05 00:06:28', '2023-06-05 00:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_layanan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `syarat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id`, `nama_layanan`, `deskripsi`, `syarat`, `template`, `is_active`) VALUES
(1, 'Surat Keterangan Tidak Mampu (SKTM)', 'surat keterangan tidak mampu (SKTM) diterbitkan bagi warga yang dalam kondisi tidak mampu secara finansial berdasarkan dokumen yang terlampir. surat keterangan ini berfungsi untuk keperluan administrasi perbankan, pengadilan dan pendidikan.', 'Surat Pengantar RT/RW;Foto Copy E-ktp elektronik (KTP);Foto Copy Kartu Keluarga (KK);Kartu identitas warga miskin dan formulir verifikasi warga miskin', NULL, 1),
(2, 'Surat Keterangan Usaha (SKU)', 'surat keterangan usaha (SKU) bukan merupakan surat izin usaha melainkan hanya surat keterangan usaha bagi warga yang memiliki usaha di wilayah Kelurahan Panggung , surat keterangan ini sebagai kelengkapan administrasi perbankan, leasing, pegadaian dll terkait pendanaan.', 'Pengantar RT dan RW;Fotocopy KTP dan KK', '<!DOCTYPE html>\r\n<html lang=\"en\">\r\n  <head>\r\n    <meta charset=\"UTF-8\" />\r\n    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />\r\n    <title>Document</title>\r\n  </head>\r\n  <body style=\"padding: 20px 30px\">\r\n    <header class=\"\" style=\"text-align: center; text-transform: uppercase\">\r\n      <p style=\"margin: 10px 0\">\r\n        pemerintahan kabupaten {{$data_desa->nama_kabupaten}}\r\n      </p>\r\n      <p style=\"margin: 10px 0\">kecamatan {{$data_desa->nama_kecamatan}}</p>\r\n      <p style=\"margin: 10px 0\">Kepala Desa {{$data_desa->nama_desa}}</p>\r\n      <p style=\"margin: 10px 0\">{{$data_desa->alamat_desa}}</p>\r\n    </header>\r\n    <hr />\r\n    <article>\r\n      <section style=\"text-align: center; padding: 10px 0\">\r\n        <p\r\n          style=\"\r\n            margin: 10px auto;\r\n            font-size: 1.5em;\r\n            text-transform: capitalize;\r\n          \"\r\n        >\r\n          {{$user->layanan->nama_layanan}}\r\n        </p>\r\n        <p style=\"margin: 10px auto\">Nomor : XX/SKU/19/2002</p>\r\n      </section>\r\n      <p style=\"margin: 10px 0\">\r\n        Kepala Desa {{$data_desa->nama_desa}}, Kecamatan\r\n        {{$data_desa->nama_kecamatan}}, menyatakan dengan ini bahwa :\r\n      </p>\r\n      <section>\r\n        <table style=\"text-align: start; width: 100%\">\r\n          <tr style=\"height: 30px\">\r\n            <th style=\"text-align: left\">Name</th>\r\n            <td style=\"text-align: left\">: {{$user->user->nama}}</td>\r\n          </tr>\r\n          <tr style=\"height: 30px\">\r\n            <th style=\"text-align: left\">NIK</th>\r\n            <td style=\"text-align: left\">: {{$user->user->nik}}</td>\r\n          </tr>\r\n          <tr style=\"height: 30px\">\r\n            <th style=\"text-align: left\">Tempat, Tanggal Lahir</th>\r\n            <td style=\"text-align: left; width: 70%\">\r\n              @php $date = new DateTime($user->user->tanggal_lahir) @endphp :\r\n              {{$user->user->tempat_lahir}}, {{$date->format(\'d-m-Y\')}}\r\n            </td>\r\n          </tr>\r\n          <tr style=\"height: 30px\">\r\n            <th style=\"text-align: left\">Agama</th>\r\n            <td style=\"text-align: left\">: {{$user->user->agama}}</td>\r\n          </tr>\r\n          <tr style=\"height: 30px\">\r\n            <th style=\"text-align: left\">Pekerjaan</th>\r\n            <td style=\"text-align: left\">: {{$user->user->pekerjaan}}</td>\r\n          </tr>\r\n          <tr style=\"height: 30px\">\r\n            <th style=\"text-align: left\">Alamat</th>\r\n            <td style=\"text-align: left\">\r\n              : Dusun {{$user->user->dusun}}, RT {{$user->user->rt}} RW\r\n              {{$user->user->rw}}, Desa {{$user->user->desa}}, Kec.\r\n              {{$user->user->kecamatan}}\r\n            </td>\r\n          </tr>\r\n        </table>\r\n      </section>\r\n      <section>\r\n        <p style=\"margin: 10px 0\">\r\n          Nama yang tertera di atas adalah benar penduduk yang berdomisili di\r\n          Desa {{$user->user->desa}} Kecamatan {{$user->user->kecamatan}}.\r\n        </p>\r\n      </section>\r\n      <section>\r\n        <p style=\"margin: 10px 0\">\r\n          Berdasarkan pengamatan kami bahwa orang yang bersangkutan adalah benar\r\n          memiliki usaha Produksi Mebel di wilayah Desa {{$user->user->desa}}.\r\n        </p>\r\n      </section>\r\n      <section>\r\n        <p style=\"margin: 10px 0\">\r\n          Demikian Surat Keterangan Usaha ini dibuat untuk dapat dipergunakan\r\n          sebagaimana mestinya.\r\n        </p>\r\n      </section>\r\n      <section style=\"margin: 30px 0\">\r\n        <p style=\"margin: 10px 0\">Dikeluarkan di : {{$data_desa->nama_desa}}</p>\r\n        <p style=\"margin: 10px 0\">Pada tanggal : {{date(\'d-m-Y\')}}</p>\r\n      </section>\r\n      <section style=\"margin: 70px 0\">\r\n        <div style=\"margin-bottom: 50px\">\r\n          <p style=\"margin: 10px 0\">Kepala Desa {{$data_desa->nama_desa}}</p>\r\n          <p style=\"margin: 10px 0\">\r\n            Kecamatan {{$data_desa->nama_kecamatan}}, Kabupaten\r\n            {{$data_desa->nama_kabupaten}}\r\n          </p>\r\n        </div>\r\n        <div>\r\n          <p style=\"margin: 10px 0\">{{$data_desa->nama_kepala_desa}}</p>\r\n        </div>\r\n      </section>\r\n    </article>\r\n  </body>\r\n</html>', 1),
(3, 'Surat Keterangan Nikah', NULL, 'Surat Pengantar RT/RW;Fotocopy Kartu Tanda Penduduk (calon suami dan istri);Fotocopy Kartu Keluarga (calon suami dan istri).;Fotocopy Akta Lahir (calon suami dan istri) .;Fotocopy Ijazah Terakhir (calon suami dan istri);Pas Foto 2×3 sebanyak 4 lembar (calon suami dan istri) .;Pas Foto 4×6 sebanyak 2 lembar (calon suami dan istri) .;Surat pernyataan belum pernah menikah, yang di tandatangani oleh Calon Pengantin dan Pengurus RT/RW, formulir ini bisa di dapat dari Kelurahan atau RT/TW setempat.;Surat pernyataan persetujuan orang tua / wali yang di tandatangani oleh Orang Tua, Saksi dan Pengurus RT/RW, formulir(N1-N4) ini juga bisa di dapat dari Kelurahan atau RT/RW setempat', NULL, 1),
(6, 'Surat test', 'ini deskripsi', 'Surat Pengantar RT/RW;Pengantar RT dan RW;Surat Pengantar RT', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2023_05_23_133617_create_layanan_table', 1),
(16, '2023_05_23_133618_create_permohonan_table', 1),
(17, '2023_05_23_133721_create_kelengkapan_permohonan_table', 1),
(18, '2023_05_23_133735_create_forum_table', 1),
(19, '2023_05_23_133741_create_forum_media_table', 1),
(20, '2023_05_23_143106_create_forum_vote_table', 1),
(21, '2023_06_03_232346_create_forum_views_table', 2),
(22, '2023_06_03_232356_create_data_desa_table', 2),
(23, '2023_06_04_165310_create_faqs_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permohonan`
--

CREATE TABLE `permohonan` (
  `id` char(26) COLLATE utf8mb4_unicode_ci NOT NULL,
  `layanan_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('proses','diterima','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'proses',
  `declined_reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permohonan`
--

INSERT INTO `permohonan` (`id`, `layanan_id`, `user_id`, `status`, `declined_reason`, `created_at`, `updated_at`) VALUES
('01h1sh5da30cjvn7apas3cv2ep', 1, '01h191vbkep5ke54cywq2drhye', 'ditolak', 'Data kurang lengkap', '2023-05-31 11:29:45', '2023-06-03 20:36:43'),
('01h1sh8h42kmzk038pfdcpc8md', 1, '01h191vbkep5ke54cywq2drhye', 'ditolak', 'Data kurang lengkap', '2023-05-31 11:31:28', '2023-06-03 21:13:59'),
('01h22rygjygqhrj2hz089whz5v', 2, '01h1grgyj6fzj7w3kat0951awk', 'diterima', NULL, '2023-06-04 01:38:58', '2023-06-04 08:11:58'),
('01h2561vrd7rbtasm0vwqwwfnb', 2, '01h255b6484y3xm4ah2kyr5g22', 'proses', NULL, '2023-06-05 00:06:28', '2023-06-05 00:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(26) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(23) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dusun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt` int(11) DEFAULT NULL,
  `rw` int(11) DEFAULT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_kawin` enum('belum','pernah','kawin') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kewarganegaraan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` enum('1','2') COLLATE utf8mb4_unicode_ci DEFAULT '2',
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `google_id`, `picture_url`, `nik`, `password`, `nama`, `dusun`, `rt`, `rw`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `desa`, `kecamatan`, `agama`, `status_kawin`, `kewarganegaraan`, `pekerjaan`, `level`, `is_active`) VALUES
('01h191vbkep5ke54cywq2drhye', 'krisnaputra1530@gmail.com', '108933736968369441984', 'https://lh3.googleusercontent.com/a/AAcHTtcXd07kk8igzGCwIFRwPbSMuYSCf8EX_J7w15fl=s96-c', '3504152077110659', '$2y$10$ftrUsLhGF/Ew8Nc1N1/xT.yKY3OBFm7oVjL3cFpaFwacp0T5X9rOy', 'Krisna Putra', 'Siyoto', 2, 78, 'Tulungagung', '2023-06-14', 'L', 'Wakanda', 'Wakanda', 'Islam', NULL, 'Indonesia', 'Full Stack Developer', '2', 1),
('01h1b4akb0w5ph6m2wjjeq2rs0', 'villagementadmin@gmail.com', NULL, NULL, NULL, '$2y$10$U.buMk6A2/aOoQ0PwNCIhuQlozyRWGkQmTaERlZHYGlbdV3sgspYW', 'Krisna Putra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1),
('01h1fcwh1eabm782kfcjg4gz2q', 'mrafi123@gmail.com', NULL, NULL, '3504152077110657', '$2y$10$nCSlgZ6A/SDVs6PSrSQICu7xH8wVsGBnSj6/C8eUOzC2pFsMOrxiG', 'Muhammad Rafi Faisal', 'Wakanda', 9, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', 1),
('01h1grgyj6fzj7w3kat0951awk', 'krisnap2002@gmail.com', '100601421684886331553', 'https://lh3.googleusercontent.com/a/AAcHTtc_JBntV9YCvRGLzKXzLdIQqMkiRkDglxBqhq8V=s96-c', '2503142560876531', '$2y$10$5agmejLPkc8Zzxn0YFf1KOyUF4XCr.nHa5BVVBmKGtL9.P.I/ji3S', 'Krisna Putra Mariyanto', 'Buahahaha', 9, 10, 'Tulungagung', '2023-06-26', 'P', 'Welahan', 'Besuki', 'Islam', 'belum', 'Indonesia', 'Mahasiswa', '2', 1),
('01h255b6484y3xm4ah2kyr5g22', 'krisnaputra@student.ub.ac.id', '108745814950347427850', 'https://lh3.googleusercontent.com/a/AAcHTtex_E2NI3ieWuSU2LRlAT_Ft8mTE_q1CeNlfHSZ=s96-c', '2503142560876536', NULL, '30_Krisna Putra Mariyanto', 'Siyoto', 2, 3, 'Tulungagung', '2002-04-29', 'L', 'Welahan', 'Besuki', 'Islam', 'belum', 'Indonesia', 'Mahasiswa', '2', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_desa`
--
ALTER TABLE `data_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forum_creator_id_foreign` (`creator_id`);

--
-- Indexes for table `forum_media`
--
ALTER TABLE `forum_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forum_media_forum_id_foreign` (`forum_id`);

--
-- Indexes for table `forum_views`
--
ALTER TABLE `forum_views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forum_views_forum_id_foreign` (`forum_id`),
  ADD KEY `forum_views_user_id_foreign` (`user_id`);

--
-- Indexes for table `forum_vote`
--
ALTER TABLE `forum_vote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forum_vote_forum_id_foreign` (`forum_id`);

--
-- Indexes for table `kelengkapan_permohonan`
--
ALTER TABLE `kelengkapan_permohonan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelengkapan_permohonan_permohonan_id_foreign` (`permohonan_id`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
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
-- Indexes for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permohonan_user_id_foreign` (`user_id`),
  ADD KEY `permohonan_layanan_id_foreign` (`layanan_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nik_unique` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forum_media`
--
ALTER TABLE `forum_media`
  ADD CONSTRAINT `forum_media_forum_id_foreign` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forum_views`
--
ALTER TABLE `forum_views`
  ADD CONSTRAINT `forum_views_forum_id_foreign` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forum_views_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forum_vote`
--
ALTER TABLE `forum_vote`
  ADD CONSTRAINT `forum_vote_forum_id_foreign` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelengkapan_permohonan`
--
ALTER TABLE `kelengkapan_permohonan`
  ADD CONSTRAINT `kelengkapan_permohonan_permohonan_id_foreign` FOREIGN KEY (`permohonan_id`) REFERENCES `permohonan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD CONSTRAINT `permohonan_layanan_id_foreign` FOREIGN KEY (`layanan_id`) REFERENCES `layanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permohonan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
