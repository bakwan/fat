-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 17 Jan 2018 pada 14.03
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gi_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_asset`
--

CREATE TABLE `ms_asset` (
  `id` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `nama_asset` varchar(150) NOT NULL,
  `image` tinytext NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `delete_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_asset`
--

INSERT INTO `ms_asset` (`id`, `id_lokasi`, `nama_asset`, `image`, `create_at`, `update_at`, `delete_at`) VALUES
(1, 1, 'AC Polytron', '476e0dab11f342fdc394b375f5a0b226.jpg', '2017-07-30 13:25:34', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 3, 'AC Polytron', '4d212d23c5c1da83a52b5e0a2cf8c7b9.jpg', '2017-07-30 13:25:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 4, 'HP Iphone 6s', 'a45e8a424dc197263e4951f7a36ff293.png', '2017-07-30 13:26:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 2, 'AC Polytron', '4f33208bec2ba2f795ba8a9a55620e3a.jpg', '2017-07-30 13:26:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 'SONY Bravia LED TV', 'e41b02504887628cbd4cb7212e9b38a9.png', '2017-07-30 22:07:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 3, 'PROYEKTOR', 'f59d4d98ef349bd9940d6b67dde8f112.png', '2017-07-30 22:10:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 4, 'Taplak Meja', 'e5aa9882677f855fa5758e566e9a0838.png', '2017-07-30 22:12:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_footer`
--

CREATE TABLE `ms_footer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_footer`
--

INSERT INTO `ms_footer` (`id`, `name`, `link`, `status`, `create_at`, `update_at`) VALUES
(4, 'website didukung dan dipelihara oleh', 'kartamedia.id', 1, '2016-11-04 16:50:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_header`
--

CREATE TABLE `ms_header` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_menu_admin`
--

CREATE TABLE `ms_menu_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `akses` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_menu_admin`
--

INSERT INTO `ms_menu_admin` (`id`, `nama`, `link`, `icon`, `akses`, `parent`, `status`) VALUES
(8, 'Dashboard', 'Dashboard', 'fa fa-dashboard', 1, 0, 1),
(9, 'Data', '#', 'fa fa-database', 1, 0, 1),
(11, 'Setting', '#', 'fa fa-gears', 1, 0, 1),
(12, 'Menu Admin', 'Ad_menu_admin', 'fa fa-circle-o', 1, 11, 1),
(13, 'keluhan', 'Ad_keluhan', 'fa fa-circle-o', 1, 9, 0),
(14, 'Menu Website', 'Ad_menu_website', 'fa fa-circle-o', 1, 11, 1),
(15, 'Footer', 'Ad_footer', 'fa fa-circle-o', 1, 11, 1),
(16, 'Header', 'Ad_header', 'fa fa-circle-o', 1, 11, 1),
(18, 'User Management', 'Ad_users', 'fa fa-circle-o', 1, 22, 1),
(19, 'User Level', 'Ad_user_level', 'fa fa-circle-o', 1, 22, 1),
(21, 'History', 'Ad_log', 'fa fa-circle-o', 1, 22, 1),
(22, 'Utility', '#', 'fa fa-eye', 1, 0, 1),
(23, 'KTP', 'ad_ktp', 'fa fa-circle-o', 1, 9, 0),
(24, 'Registration', 'Ad_registration', 'fa fa-circle-o', 1, 9, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_menu_website`
--

CREATE TABLE `ms_menu_website` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `icon` varchar(80) NOT NULL,
  `link` varchar(100) NOT NULL,
  `akses` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_menu_website`
--

INSERT INTO `ms_menu_website` (`id`, `nama`, `icon`, `link`, `akses`, `status`) VALUES
(1, 'Pengaduan', 'fa fa-envelope', 'Pengaduan', 1, 1),
(2, 'Konsumsi', 'fa fa-cart-plus', 'Konsumsi', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_users`
--

CREATE TABLE `ms_users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(150) NOT NULL,
  `last_login` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_users`
--

INSERT INTO `ms_users` (`id`, `username`, `email`, `name`, `password`, `last_login`, `status`, `level`, `create_at`, `update_at`) VALUES
(4, 'Krisna', 'krisna@gmail.com', 'krisna', 'e3d4e729c5bde345d37e4f7dfcc38bc8', '0000-00-00 00:00:00', 1, 2, '2017-08-07 09:06:09', '2017-10-25 12:12:56'),
(5, 'superadmin', 'superadmin@gmail.com', 'Superadmin', '652c5558610b61427ada3d05327396ff', '0000-00-00 00:00:00', 1, 1, '2017-08-07 09:08:19', '2017-11-03 22:45:38'),
(6, 'adminSarpras', 'adminsar@gmail.com', 'admin sarpras', '20ecd5ff2e93d197756fb0526127127d', '0000-00-00 00:00:00', 1, 2, '2017-12-19 10:57:07', '0000-00-00 00:00:00'),
(7, 'adminKonsumsi', 'konsumsiadmin@gmail.com', 'Konsumsi admin', '499fd6cd2a3b1f20cf594491161d7f14', '0000-00-00 00:00:00', 1, 2, '2017-12-19 12:47:16', '2017-12-19 12:47:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_user_level`
--

CREATE TABLE `ms_user_level` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_user_level`
--

INSERT INTO `ms_user_level` (`id`, `name`, `create_at`, `update_at`) VALUES
(1, 'Administrator', '2016-11-03 12:09:57', '0000-00-00 00:00:00'),
(2, 'PETUGAS', '2016-11-03 12:16:42', '0000-00-00 00:00:00'),
(3, 'SATPAM', '2016-11-04 06:43:39', '0000-00-00 00:00:00'),
(4, 'Admin', '2017-07-23 12:27:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_log`
--

CREATE TABLE `tb_log` (
  `id` int(11) NOT NULL,
  `users` varchar(20) NOT NULL,
  `level` int(11) NOT NULL,
  `activity` varchar(200) NOT NULL,
  `keterangan` varchar(123) NOT NULL,
  `tabel` varchar(100) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_log`
--

INSERT INTO `tb_log` (`id`, `users`, `level`, `activity`, `keterangan`, `tabel`, `create_at`) VALUES
(1, 'superadmin', 1, 'delete_data_menu_admin', '', 'ms_menu_admin', '2018-01-17 17:44:52'),
(2, 'superadmin', 1, 'delete_data_menu_admin', '', 'ms_menu_admin', '2018-01-17 17:44:58'),
(3, 'superadmin', 1, 'delete_data_menu_admin', '', 'ms_menu_admin', '2018-01-17 17:45:02'),
(4, 'superadmin', 1, 'delete_data_menu_admin', '', 'ms_menu_admin', '2018-01-17 17:45:11'),
(5, 'superadmin', 1, 'delete_data_menu_admin', '', 'ms_menu_admin', '2018-01-17 17:45:15'),
(6, 'superadmin', 1, 'delete_data_menu_admin', '', 'ms_menu_admin', '2018-01-17 17:45:23'),
(7, 'superadmin', 1, 'update_data_menu_admin', 'Registration', 'ms_menu_admin', '2018-01-17 17:46:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_notes`
--

CREATE TABLE `tb_notes` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `users` int(11) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users_gi`
--

CREATE TABLE `tb_users_gi` (
  `id` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `name` varchar(150) NOT NULL,
  `gender` enum('P','L') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `fat` varchar(10) NOT NULL,
  `negara` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tbadan` int(10) NOT NULL,
  `bbadan` int(10) NOT NULL,
  `kacamata` varchar(10) NOT NULL,
  `pendidikan` varchar(10) NOT NULL,
  `domisili` varchar(100) NOT NULL,
  `telp` int(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `motivasi` text NOT NULL,
  `family` varchar(50) NOT NULL,
  `full_foto` text NOT NULL,
  `pas_foto` text NOT NULL,
  `kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_users_gi`
--

INSERT INTO `tb_users_gi` (`id`, `nik`, `date`, `name`, `gender`, `tanggal_lahir`, `fat`, `negara`, `status`, `tbadan`, `bbadan`, `kacamata`, `pendidikan`, `domisili`, `telp`, `email`, `motivasi`, `family`, `full_foto`, `pas_foto`, `kota`) VALUES
(1, 123234, '2018-01-17 17:41:22', 'agustina wulan dari', 'P', '2018-01-25', '12312312', 'Indonesia', 'lajang', 170, 70, 'no', 's1', 'Semarang', 2147483647, 'baywan69@gmail.com', 'qrwerwer', 'no', 'd985da4e8f66d9846fddfd715247a396.jpg', 'd985da4e8f66d9846fddfd715247a396.jpg', 'jawa tengah'),
(2, 2147483647, '2018-01-17 19:31:47', 'zakka Musaddid', 'L', '1994-03-28', '7208957498', 'Indonesia', 'lajang', 168, 55, 'ya', 'SMA', 'Semarang', 821238289, 'zakkamusaddid@gmail.com', 'ingin kaya', 'ada', '609a6935ac8acd367cb0cbd4f1443f2b.jpg', '609a6935ac8acd367cb0cbd4f1443f2b.jpg', 'Semarang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ms_asset`
--
ALTER TABLE `ms_asset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_footer`
--
ALTER TABLE `ms_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_header`
--
ALTER TABLE `ms_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_menu_admin`
--
ALTER TABLE `ms_menu_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_menu_website`
--
ALTER TABLE `ms_menu_website`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_users`
--
ALTER TABLE `ms_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_user_level`
--
ALTER TABLE `ms_user_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_notes`
--
ALTER TABLE `tb_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users_gi`
--
ALTER TABLE `tb_users_gi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ms_asset`
--
ALTER TABLE `ms_asset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ms_footer`
--
ALTER TABLE `ms_footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ms_header`
--
ALTER TABLE `ms_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ms_menu_admin`
--
ALTER TABLE `ms_menu_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `ms_menu_website`
--
ALTER TABLE `ms_menu_website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ms_users`
--
ALTER TABLE `ms_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ms_user_level`
--
ALTER TABLE `ms_user_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_notes`
--
ALTER TABLE `tb_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_users_gi`
--
ALTER TABLE `tb_users_gi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
