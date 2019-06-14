-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Mar 2019 pada 13.13
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `disposisi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(8) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `mulai` datetime NOT NULL,
  `selesai` datetime NOT NULL,
  `id_surat` int(8) DEFAULT NULL,
  `tempat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `judul`, `mulai`, `selesai`, `id_surat`, `tempat`) VALUES
(1, 'KKP', '2019-03-04 07:00:00', '2019-03-04 10:00:00', 1, 'ampenan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bagian_bidang`
--

CREATE TABLE `bagian_bidang` (
  `id_bagian` int(8) NOT NULL,
  `nama_bidang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bagian_bidang`
--

INSERT INTO `bagian_bidang` (`id_bagian`, `nama_bidang`) VALUES
(1, 'Admin'),
(2, 'Utama'),
(3, 'Subag Umum'),
(4, 'Informasi dan Komunikasi Publikasi'),
(5, 'Pengelolaan TIK'),
(6, 'Persandian dan LPSE'),
(7, 'Statistik'),
(8, 'Balai Teknologi Informasi dan Edukasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dis_surat`
--

CREATE TABLE `dis_surat` (
  `id_dis` int(8) NOT NULL,
  `id_surat` int(8) DEFAULT NULL,
  `idpengirim` int(8) DEFAULT NULL,
  `idpenerima` int(8) DEFAULT NULL,
  `isi_disposisi` text,
  `status` varchar(50) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `id_proses` int(8) DEFAULT NULL,
  `jabatan_pegawai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dis_surat`
--

INSERT INTO `dis_surat` (`id_dis`, `id_surat`, `idpengirim`, `idpenerima`, `isi_disposisi`, `status`, `tanggal`, `id_proses`, `jabatan_pegawai`) VALUES
(1, 2, 5, NULL, 'tes 2', 'Pendataan', '2019-03-06 14:03:08', NULL, NULL),
(2, 3, 25, 5, 'tes', 'Pendataan', '2019-03-06 14:03:07', NULL, NULL),
(3, 2, 5, 2, 'tes', 'Menunggu Disposisi', '2019-03-06 14:03:30', NULL, NULL),
(4, 3, 5, 25, 'tessss', 'Ditolak', '2019-03-06 14:03:44', NULL, NULL),
(5, 3, 25, 25, '', 'Proses Ulang', '2019-03-06 14:03:48', NULL, NULL),
(6, 3, 25, 5, 'tes', 'Pendataan', '2019-03-06 14:46:16', NULL, NULL),
(7, 3, 5, 2, 'proses', 'Menunggu Disposisi', '2019-03-07 03:00:19', NULL, NULL),
(8, 2, 2, 21, '', 'Belum Diproses', '2019-03-07 03:00:50', NULL, NULL),
(9, 3, 2, 21, '', 'Belum Diproses', '2019-03-07 03:01:06', NULL, NULL),
(10, 2, 21, 10, '', 'Sedang Diproses', '2019-03-07 03:01:42', NULL, NULL),
(11, 3, 21, 10, '', 'Sedang Diproses', '2019-03-07 03:01:53', NULL, NULL),
(12, 2, 10, 10, 'proses', 'Sedang diproses pegawai', '2019-03-07 03:03:31', NULL, NULL),
(13, 3, 10, 10, 'finish', 'Selesai', '2019-03-07 03:03:47', NULL, NULL),
(14, 2, 10, 10, 'finish', 'Selesai', '2019-03-07 03:05:50', NULL, NULL),
(15, 4, 25, 5, 'tessss', 'Pendataan', '2019-03-07 03:08:19', NULL, NULL),
(16, 4, 5, 2, 'tessss', 'Menunggu Disposisi', '2019-03-07 03:08:49', NULL, NULL),
(17, 4, 2, 21, '', 'Belum Diproses', '2019-03-07 03:09:45', NULL, NULL),
(18, 4, 21, 10, '', 'Sedang Diproses', '2019-03-07 03:11:11', NULL, NULL),
(19, 4, 10, 10, 'segera proses', 'Sedang diproses pegawai', '2019-03-07 03:11:57', NULL, NULL),
(20, 4, 10, 10, 'finish', 'Selesai', '2019-03-07 03:12:42', NULL, NULL),
(21, 6, 25, NULL, '', '', '2019-03-07 04:03:45', 3, NULL),
(22, 7, 25, NULL, NULL, 'Belum Dikirim', '2019-03-07 04:03:54', 3, NULL),
(23, 5, 25, 5, 'tes', 'Pendataan', '2019-03-07 04:33:45', 3, NULL),
(24, 6, 25, 5, 'tes', 'Pendataan', '2019-03-07 04:34:20', 3, NULL),
(25, 7, 25, 5, 'tes', 'Pendataan', '2019-03-07 04:34:27', 3, NULL),
(26, 5, 5, 25, 'dsadsa', 'Ditolak', '2019-03-07 04:36:55', NULL, NULL),
(27, 6, 5, 25, 'asf', 'Ditolak', '2019-03-07 04:37:54', 4, NULL),
(28, 7, 5, 2, 'asdg', 'Menunggu Disposisi', '2019-03-07 04:39:04', 4, NULL),
(29, 5, 25, 25, '', 'Proses Ulang', '2019-03-07 04:42:35', 3, NULL),
(30, 6, 25, NULL, NULL, 'Proses Ulang', '2019-03-07 04:44:25', 3, NULL),
(31, 5, 25, 5, 'sdasgassd', 'Pendataan', '2019-03-07 04:44:57', 3, NULL),
(32, 6, 25, 5, 'sdaafag', 'Pendataan', '2019-03-07 04:45:16', 3, NULL),
(33, 5, 5, 2, 'asdga', 'Menunggu Disposisi', '2019-03-07 04:45:40', 4, NULL),
(34, 6, 5, 2, 'aasdg', 'Menunggu Disposisi', '2019-03-07 04:46:12', 4, NULL),
(35, 5, 2, 21, 'sadsa', 'Belum Diproses', '2019-03-07 04:47:49', 2, NULL),
(36, 6, 2, 21, 'dasda', 'Belum Diproses', '2019-03-07 04:48:52', 2, NULL),
(37, 7, 2, 21, 'dasda', 'Belum Diproses', '2019-03-07 04:49:00', 2, NULL),
(38, 5, 21, 10, 'ads', 'Sedang Diproses', '2019-03-07 04:49:59', 5, NULL),
(39, 6, 21, 10, 'asda', 'Sedang Diproses', '2019-03-07 04:50:05', 5, NULL),
(40, 7, 21, 10, 'asd', 'Sedang Diproses', '2019-03-07 04:50:12', 5, NULL),
(41, 5, 10, 10, 'asd', 'Sedang diproses pegawai', '2019-03-07 04:51:55', 6, NULL),
(42, 6, 10, 10, 'asd', 'Selesai', '2019-03-07 04:52:06', 6, NULL),
(43, 7, 10, 10, 'dasd', 'Sedang diproses pegawai', '2019-03-07 04:52:22', 6, NULL),
(44, 5, 10, NULL, 'daaa', 'Selesai', '2019-03-07 04:53:18', 7, NULL),
(45, 7, 10, NULL, 'hdhdfg', 'Selesai', '2019-03-07 04:53:28', 7, NULL),
(46, 8, 25, NULL, NULL, 'Belum Dikirim', '2019-03-07 04:03:09', 3, NULL),
(47, 8, 25, 5, 'fsdfs', 'Pendataan', '2019-03-07 04:55:29', 3, NULL),
(48, 8, 5, 2, 'fsad', 'Menunggu Disposisi', '2019-03-07 04:57:05', 4, NULL),
(50, 8, 2, 5, 'asdsa', 'Dikembalikan', '2019-03-07 05:00:14', 2, NULL),
(51, 8, 5, 2, 'asdad', 'Menunggu Disposisi', '2019-03-07 05:07:08', 4, NULL),
(52, 8, 2, 21, 'tes return', 'Belum Diproses', '2019-03-07 05:07:44', 2, NULL),
(53, 8, 21, 2, 'asdad', 'Dikembalikan', '2019-03-07 05:11:46', 5, NULL),
(54, 8, 2, 21, 'adsad', 'Belum Diproses', '2019-03-07 05:15:15', 2, NULL),
(55, 8, 21, 10, 'sadsda', 'Sedang Diproses', '2019-03-07 05:16:11', 5, NULL),
(56, 8, 10, 21, 'adsad', 'Dikembalikan', '2019-03-07 05:41:36', 6, NULL),
(57, 8, 21, 10, 'asd', 'Sedang Diproses', '2019-03-07 05:42:06', 5, NULL),
(58, 8, 10, 10, 'asd', 'Sedang diproses pegawai', '2019-03-07 05:42:27', 6, NULL),
(59, 8, 10, NULL, 'asd', 'Selesai', '2019-03-07 05:43:01', 7, NULL),
(60, 9, 10, NULL, NULL, 'Belum Dikirim', '2019-03-07 06:00:32', 7, NULL),
(61, 9, 10, 10, 'tes1', 'Validasi Kasi', '2019-03-07 06:54:45', 7, NULL),
(62, 9, 10, 10, 'tes', 'Dikembalikan', '2019-03-07 07:20:15', 6, NULL),
(63, 9, 10, NULL, NULL, 'Proses Ulang', '2019-03-07 07:25:26', 7, NULL),
(64, 9, 10, 10, 'tes', 'Validasi Kasi', '2019-03-07 07:25:52', 7, NULL),
(65, 9, 10, 21, 'tes pak', 'Validasi Kabid', '2019-03-07 07:28:24', 6, NULL),
(66, 9, 21, 10, 'tes', 'Dikembalikan', '2019-03-07 07:36:34', 5, NULL),
(67, 9, 10, 21, 'tes', 'Validasi Kabid', '2019-03-07 07:38:28', 6, NULL),
(68, 9, 21, 26, 'lanjut', 'Sedang Diproses', '2019-03-07 07:45:02', 5, NULL),
(69, 9, 26, 21, 'tes', 'Dikembalikan', '2019-03-07 07:49:14', 8, NULL),
(70, 9, 21, 26, 'tes', 'Sedang Diproses', '2019-03-07 07:52:41', 5, NULL),
(71, 9, 26, 2, 'tes', 'Validasi Akhir', '2019-03-07 07:55:33', 8, NULL),
(72, 9, 2, 5, 'tes', 'Pemberian Nomor', '2019-03-07 08:03:55', 2, NULL),
(73, 9, 5, NULL, 'finish', 'Selesai', '2019-03-07 08:14:24', 4, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `title` text,
  `user_id` int(8) DEFAULT NULL,
  `backgroundColor` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `events`
--

INSERT INTO `events` (`id`, `start`, `end`, `title`, `user_id`, `backgroundColor`) VALUES
(3, '2019-03-04 05:00:00', '2019-03-04 08:00:00', 'tes lagi', NULL, NULL),
(4, '2019-03-06 09:00:00', '2019-03-06 10:30:00', 'percobaan pertama', NULL, '#f56954'),
(5, '2019-03-06 16:23:00', '2019-03-06 18:23:00', 'pasti saja', 1, '#f56954');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kantor`
--

CREATE TABLE `kantor` (
  `id_kantor` int(8) NOT NULL,
  `nama_kantor` varchar(50) NOT NULL,
  `alamat_kantor` varchar(100) NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `email_kantor` varchar(50) NOT NULL,
  `fax_kantor` varchar(20) NOT NULL,
  `foto_kantor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_bidang`
--

CREATE TABLE `sub_bidang` (
  `id_sub` int(8) NOT NULL,
  `nama_sub` varchar(50) NOT NULL,
  `id_bidang` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sub_bidang`
--

INSERT INTO `sub_bidang` (`id_sub`, `nama_sub`, `id_bidang`) VALUES
(1, 'Administrator', 1),
(2, 'Kepala Dinas', 2),
(5, 'Subag Umum', 3),
(7, 'Pengelolaan dan Dokumentasi', 4),
(8, 'Publikasi', 4),
(9, 'Kelembagaan', 4),
(10, 'Aplikasi dan Teknologi', 5),
(11, 'Infrastruktur', 5),
(12, 'Tata Kelola Teknologi', 5),
(13, 'Persandian dan Keamanan Informasi', 6),
(14, 'Pelayanan Pengadaan Secara Elektronik', 6),
(15, 'Teknologi dan Pengendalian', 6),
(16, 'Statistik Sosial', 7),
(17, 'Statistik Ekonomi', 7),
(18, 'Statistik Sumber Daya Alam', 7),
(19, 'Balai Teknologi Informasi dan Edukasi', 8),
(20, 'Informasi dan Komunikasi Publikasi', 4),
(21, 'Pengelolaan TIK', 5),
(22, 'Persandian dan LPSE', 6),
(23, 'Statistik', 7),
(24, 'Balai Teknologi Informasi dan Edukasi	', 8),
(25, 'Front Office', 3),
(26, 'Sekretaris', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(8) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi_singkat` varchar(50) DEFAULT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `pengirim` varchar(50) DEFAULT NULL,
  `no_pengirim` varchar(50) DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `no_dinas` varchar(50) NOT NULL,
  `lampiran` varchar(100) DEFAULT NULL,
  `id_input` int(8) DEFAULT NULL,
  `id_pengirim` int(8) DEFAULT NULL,
  `id_penerima` int(8) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `surat_jadi` varchar(100) DEFAULT NULL,
  `catatan` varchar(50) NOT NULL,
  `pegawai` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`id_surat`, `judul`, `isi_singkat`, `jenis_surat`, `pengirim`, `no_pengirim`, `tanggal_surat`, `no_dinas`, `lampiran`, `id_input`, `id_pengirim`, `id_penerima`, `status`, `tanggal_input`, `tanggal_selesai`, `surat_jadi`, `catatan`, `pegawai`) VALUES
(1, 'percobaan 1', 'uji coba', 'Surat Masuk', 'pengirim 1', '8787878979', '2019-03-06', '1', '../upload/20131216-104725.jpg', 25, 21, 10, 'Selesai', '2019-03-06 09:03:26', '2019-03-06', '../upload/com.lq.racingtransformGP.jpg', 'voltec time break', 'ya'),
(2, 'percobaan 2', 'tes lagi', 'Surat Masuk', 'pengirim 2', '47832749', '2019-03-06', '2', '../upload/20131216-104725.jpg', 25, 21, 10, 'Selesai', '2019-03-06 13:03:42', '2019-03-07', '../upload/5271012607940001.doc', 'finish', 'ya'),
(3, 'percobaan 3', 'tes tes tes', 'Surat Masuk', 'pengirim 3', '54478924', '2019-03-06', '3', '../upload/hatsune-miku-wallpapers-hd-hatsune-miku-vocaloid-hatsune-miku-4.jpg', 25, 21, 10, 'Selesai', '2019-03-06 14:03:46', '2019-03-07', '../upload/20131216-104725.jpg', 'finish', NULL),
(4, 'percobaan 4', 'tes coeg', 'Surat Masuk', 'pengirim 4', '444', '2019-03-07', '4', '../upload/screen-7.jpg', 25, 21, 10, 'Selesai', '2019-03-07 03:03:16', '2019-03-07', '../upload/screen-6.jpg', 'finish', 'ya'),
(5, 'percobaan 5', 'asga', 'Surat Masuk', 'pengirim 5', '4514', '2019-03-07', '5', '../upload/ALFAMART_LOGO_BARU.png', 25, 21, 10, 'Selesai', '2019-03-07 04:03:04', '2019-03-07', '../upload/20131216-104725.jpg', 'daaa', 'ya'),
(6, 'percobaan 6', 'dfhsdfhkj', 'Surat Masuk', 'fhjdsb', '325987029', '2019-03-07', '6', '../upload/ALFAMART_LOGO_BARU.png', 25, 21, 10, 'Selesai', '2019-03-07 04:03:45', '2019-03-07', '../upload/ALFAMART_LOGO_BARU.png', 'asd', NULL),
(7, 'percobaan 7', 'gfjshfieuh', 'Surat Masuk', 'dfsdg', '324325', '2019-03-07', '7', '../upload/hatsune-miku-wallpapers-hd-hatsune-miku-vocaloid-hatsune-miku-4.jpg', 25, 21, 10, 'Selesai', '2019-03-07 04:03:54', '2019-03-07', '../upload/ALFAMART_LOGO_BARU.png', 'hdhdfg', 'ya'),
(8, 'percobaan 8', 'dgasjgdj', 'Surat Masuk', 'sadsagh', '8787878979', '2019-03-07', '8', '../upload/20131216-104725.jpg', 25, 21, 10, 'Selesai', '2019-03-07 04:03:09', '2019-03-07', '../upload/20131216-104725.jpg', 'asd', 'ya'),
(9, 'uji 1', 'tes', 'Surat Keluar', '10', '877', '2019-03-07', '100', '../upload/ALFAMART_LOGO_BARU.png', 10, 2, 5, 'Selesai', '2019-03-07 06:00:32', '2019-03-07', '../upload/25481_vocaloid_hatsune_miku.jpg', 'finish', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(8) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `id_bag` int(8) DEFAULT NULL,
  `id_sub` int(8) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `foto_user` varchar(100) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nip_nik` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama_user`, `jabatan`, `id_bag`, `id_sub`, `username`, `password`, `foto_user`, `ttl`, `alamat`, `telepon`, `email`, `nip_nik`) VALUES
(1, 'admin', 'Admin', 1, 1, 'admin', 'admin', '../upload/RacingTransform.png', 'Ampenan, 19-April-1996', 'ampenan', '34242521478', 'riyanefendi01@gmail.com', '6183719'),
(2, 'Riyan Efendi', 'Kepala Dinas', 2, 2, 'kadis', 'kadis', '../upload/mff.png', 'Ampenan, 19-April-1996', 'ampenan', '087701767488', 'riyanefendi01@gmail.com', '9898989898'),
(3, 'yudiantara', 'Front Office', 3, 25, 'fron', 'fron', '../upload/RacingTransform.png', 'umum, 01 januari 2001', 'umum', '08788787', 'diskominfotik@pemprovntb.go.id', '8989898989'),
(4, 'aris munandar', 'Tata Usaha', 3, 5, 'umum', 'umum', '../upload/250px-Logo_of_Ministry_of_Education_and_Culture_of_Republic_of_Indonesia.svg.png', 'umum, 01 januari 2001', 'ampean', '6491408079787', 'diskominfotik@pemprovntb.go.id', '8755856588'),
(5, 'ptik', 'Kepala Bidang', 5, 21, 'kabid', 'kabid', '../upload/RacingTransform.png', 'mataram, 27-02-1990', 'ampenan', '8989789678', 'tes@admin.com', '8989898989'),
(6, 'kasi', 'Kepala Seksi', 5, 10, 'kasi', 'kasi', '../upload/MarvelFutureFight-Logo.jpg', 'mataram, 27-02-1990', 'dhsad', '8989789678', 'tes@admin.com', '67875890'),
(7, 'pegawai', 'Pegawai', 5, 10, 'pegawai', 'pegawai', '../upload/mff.png', 'mataram, 27-02-1990', 'afkajsh', '7851074', 'tes@admin.com', '4987234'),
(8, 'sekretaris', 'Sekretaris', 2, 26, 'sekret', 'sekret', '../upload/RacingTransform.png', 'mataram, 27-02-1990', 'sekret', '8989789678', 'tes@admin.com', '4872364');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_bidang`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_bidang` (
`nama_sub` varchar(50)
,`nama_bidang` varchar(50)
,`id_bagian` int(8)
,`id_sub` int(8)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_user`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_user` (
`id` int(8)
,`nama_user` varchar(50)
,`jabatan` varchar(50)
,`nama_sub` varchar(50)
,`foto_user` varchar(100)
,`ttl` varchar(50)
,`alamat` varchar(100)
,`telepon` varchar(20)
,`email` varchar(30)
,`nip_nik` varchar(30)
,`id_sub` int(8)
,`username` varchar(20)
,`password` varchar(20)
,`id_bag` int(8)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_bidang`
--
DROP TABLE IF EXISTS `v_bidang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_bidang`  AS  select `sub_bidang`.`nama_sub` AS `nama_sub`,`bagian_bidang`.`nama_bidang` AS `nama_bidang`,`bagian_bidang`.`id_bagian` AS `id_bagian`,`sub_bidang`.`id_sub` AS `id_sub` from (`bagian_bidang` join `sub_bidang` on((`sub_bidang`.`id_bidang` = `bagian_bidang`.`id_bagian`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_user`
--
DROP TABLE IF EXISTS `v_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_user`  AS  select `user`.`id` AS `id`,`user`.`nama_user` AS `nama_user`,`user`.`jabatan` AS `jabatan`,`sub_bidang`.`nama_sub` AS `nama_sub`,`user`.`foto_user` AS `foto_user`,`user`.`ttl` AS `ttl`,`user`.`alamat` AS `alamat`,`user`.`telepon` AS `telepon`,`user`.`email` AS `email`,`user`.`nip_nik` AS `nip_nik`,`user`.`id_sub` AS `id_sub`,`user`.`username` AS `username`,`user`.`password` AS `password`,`user`.`id_bag` AS `id_bag` from (`user` join `sub_bidang` on((`user`.`id_sub` = `sub_bidang`.`id_sub`))) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indeks untuk tabel `bagian_bidang`
--
ALTER TABLE `bagian_bidang`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indeks untuk tabel `dis_surat`
--
ALTER TABLE `dis_surat`
  ADD PRIMARY KEY (`id_dis`),
  ADD KEY `id_surat` (`id_surat`),
  ADD KEY `id_sub` (`idpengirim`),
  ADD KEY `id_penerima` (`idpenerima`),
  ADD KEY `id_proses` (`id_proses`);

--
-- Indeks untuk tabel `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `kantor`
--
ALTER TABLE `kantor`
  ADD PRIMARY KEY (`id_kantor`);

--
-- Indeks untuk tabel `sub_bidang`
--
ALTER TABLE `sub_bidang`
  ADD PRIMARY KEY (`id_sub`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `id_input` (`id_input`),
  ADD KEY `id_pengirim` (`id_pengirim`),
  ADD KEY `id_penerima` (`id_penerima`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sub` (`id_sub`),
  ADD KEY `id_bag` (`id_bag`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bagian_bidang`
--
ALTER TABLE `bagian_bidang`
  MODIFY `id_bagian` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `dis_surat`
--
ALTER TABLE `dis_surat`
  MODIFY `id_dis` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `sub_bidang`
--
ALTER TABLE `sub_bidang`
  MODIFY `id_sub` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dis_surat`
--
ALTER TABLE `dis_surat`
  ADD CONSTRAINT `dis_surat_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id_surat`),
  ADD CONSTRAINT `dis_surat_ibfk_2` FOREIGN KEY (`idpengirim`) REFERENCES `sub_bidang` (`id_sub`),
  ADD CONSTRAINT `dis_surat_ibfk_3` FOREIGN KEY (`idpenerima`) REFERENCES `sub_bidang` (`id_sub`),
  ADD CONSTRAINT `dis_surat_ibfk_4` FOREIGN KEY (`id_proses`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `sub_bidang`
--
ALTER TABLE `sub_bidang`
  ADD CONSTRAINT `sub_bidang_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `bagian_bidang` (`id_bagian`);

--
-- Ketidakleluasaan untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_ibfk_5` FOREIGN KEY (`id_penerima`) REFERENCES `sub_bidang` (`id_sub`),
  ADD CONSTRAINT `surat_ibfk_6` FOREIGN KEY (`id_pengirim`) REFERENCES `sub_bidang` (`id_sub`),
  ADD CONSTRAINT `surat_ibfk_7` FOREIGN KEY (`id_input`) REFERENCES `sub_bidang` (`id_sub`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_sub`) REFERENCES `sub_bidang` (`id_sub`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_bag`) REFERENCES `bagian_bidang` (`id_bagian`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
