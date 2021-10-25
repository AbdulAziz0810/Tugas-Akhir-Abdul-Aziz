-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2021 at 08:31 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `galery`
--

CREATE TABLE `galery` (
  `id_video` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `judul_video` varchar(128) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `video` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galery`
--

INSERT INTO `galery` (`id_video`, `id_user`, `name`, `judul_video`, `kategori`, `deskripsi`, `video`) VALUES
(2, 10, 'ameliaadin', 'Cinematic Akad Clip of Dylan & Tine by Alienco Photography', 'Wedding', 'Cinematic Akad Clip of Dylan & Tine by Alienco Photography', 'Cinematic Akad Clip of Dylan & Tine by Alienco Photography.mp4'),
(4, 11, 'gusti ariq musyafwan', 'NORWAY｜Cinematic Video', 'Travel', 'What a trip! So back in August I and three other creators decided to go on a two-week-long road trip in southern Norway. We explored the country for 14 days.', 'NORWAY｜Cinematic Video.mp4'),
(7, 11, 'gusti ariq musyafwan', 'INDONESIA - Our Home', 'Videography', 'INDONESIA - Our Home｜Cinematic Video\r\n\r\nIt\'s finally live! Not only my longest video to date but probably also my personal favorite and I am beyond excited to finally share this story from Indonesia and the Indonesian people.', 'INDONESIA - Our Home｜Cinematic Video.mp4'),
(8, 11, 'gusti ariq musyafwan', 'SLOVENIA｜Cinematic Video', 'Film', 'Last month I got the opportunity to travel to Slovenia as part of the @BestInTravel team. A country with so much to offer.', 'SLOVENIA｜Cinematic Video.mp4'),
(9, 11, 'gusti ariq musyafwan', 'Food Film | Cinematic Burger', 'Iklan', 'Who\'s hungry? This was the first home made burger we\'ve ever made... and it was DELICIOUS!', 'Food Film - Cinematic Burger.mp4'),
(24, 21, 'Steven Hidayat', 'Danau Laet', 'Videography', 'sedikit cerita ditempat wisata bernama danau laet di desa tayan', 'VID-20190211-WA0209.mp4'),
(25, 28, 'Ikbar Junakarta', 'DEFINO Parfum', 'Iklan', 'Defino Parfum adalah brand minyak wangi asli dari pontianak', 'DOVINO_PARFUM_finishing.mp4'),
(26, 28, 'Ikbar Junakarta', 'liquid borneo brewry', 'Event', 'liquid asli pontianak', 'uploud.mp4'),
(27, 28, 'Ikbar Junakarta', 'Restoran Pasta E Deli', 'Event', 'Event Pembukaan Restorant Pasta Edeli Pontianak', 'PAstaedeli.mp4'),
(29, 10, 'ameliaadin', 'Dokumentasi Pesawat jatuh', 'Videography', 'video ini dibuat untuk mengenang terjadinya kecelakaan pesawat', '_21.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_video` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `komentar` varchar(200) NOT NULL,
  `tgl_komentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_video`, `nama`, `komentar`, `tgl_komentar`) VALUES
(1, 4, 'anselma putri', 'mantaf bang video nya', '2021-08-23'),
(2, 4, 'risky', 'keren bet', '2021-08-23'),
(3, 7, 'risky', 'mantaf gan', '2021-08-23'),
(4, 2, 'risky', 'kerenn bangg', '2021-08-29'),
(5, 2, 'risky', 'kerenn bangg', '2021-08-29'),
(6, 5, 'risky', 'sabiii', '2021-08-29'),
(7, 5, 'risky', 'manjiiw', '2021-08-29'),
(8, 5, 'risky', 'keren bang', '2021-08-29'),
(9, 7, 'risky', 'kece abis', '2021-08-29'),
(10, 24, 'ameliaadin', 'kerennn', '2021-08-29'),
(11, 7, 'Ikbar Junakarta', 'keren bang sabiii', '2021-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `price_order`
--

CREATE TABLE `price_order` (
  `id_order` int(11) NOT NULL,
  `kategori_order` int(11) NOT NULL,
  `tanggal_order` date NOT NULL,
  `alamat_order` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `price_order`
--

INSERT INTO `price_order` (`id_order`, `kategori_order`, `tanggal_order`, `alamat_order`) VALUES
(1, 1, '2021-07-16', 'jl dr wahidin no 45');

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `id_brg` int(11) NOT NULL,
  `kategori_brg` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `durasi` varchar(128) NOT NULL,
  `proses` varchar(128) NOT NULL,
  `bonus` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`id_brg`, `kategori_brg`, `harga`, `durasi`, `proses`, `bonus`) VALUES
(1, 'WEDDING', 1000000, '1-3', '1', 'photo acara resepsi'),
(2, 'TRAVEL', 2000000, '2-5', '7', 'Biaya Perjalanan di Tanggung Konsumen'),
(3, 'EVENT', 2000000, '2-5', '3', 'photo dokumentasi'),
(4, 'FILM', 4000000, '10-20 ', '5', 'subtitle'),
(5, 'VIDOEGRAPHY', 1500000, '1-3', '3', 'dubing'),
(6, 'IKLAN', 2000000, '1-3', '4', 'Biaya Produksi Ditanggung Konsumen');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `id_pemesan` int(11) DEFAULT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `no_tlpn` varchar(128) NOT NULL,
  `id_videographer` varchar(50) NOT NULL,
  `tanggal_pesanan` date DEFAULT NULL,
  `jam_pemesanan` time(4) DEFAULT NULL,
  `batas_pembayaran` date NOT NULL,
  `alamat_pemesan` text NOT NULL,
  `status` enum('bayar','belum_bayar','Tolak','Selesai') NOT NULL,
  `image_bayar` varchar(200) NOT NULL,
  `video_jasa` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) DEFAULT NULL,
  `id_brg` int(11) DEFAULT NULL,
  `id_videographer` int(11) NOT NULL,
  `kategori_brg` varchar(128) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_daftar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_daftar`) VALUES
(9, 'Abdul Aziz', 'caviolaaziz9@gmail.com', 'IMG_06991.JPG', '$2y$10$rqWHrJ2Ks6BrHqs39xbDjeS7WBFBXCKVq19lxSqM1jw.u7tKbnBPa', 1, 1, 1625290693),
(10, 'ameliaadin', 'alehitam89@gmail.com', 'team-3.jpg', '$2y$10$vvv3Vr0rgDjrOAsVmB.uiOPJVp38wY7ES1MPMVlXLodrD6157yqwq', 2, 1, 1625301367),
(11, 'gusti ariq musyafwan', 'GustiAriq99@gmail.com', 'team-4.jpg', '$2y$10$hsWTOKDRt0xXM36bve8CbegQeoirR8Wt7mdMhseA9XRSZaVOrCf6u', 2, 1, 1625640621),
(12, 'anselma putri', 'anselma@gmail.com', '2-27cc314a1c2c1d1e149ddafe225a31391.jpg', '$2y$10$bENiUT.TLtbjycedlgmcp.cQh7Fq3cjGkCfeqRzmylScw66b7peEa', 3, 1, 1627539990),
(20, 'azizabdul', 'fandiananta07@gmail.com', 'default.jpg', '$2y$10$UQIO8s96HpAkKh.U3.QlTeIVpzvv9jwyoApP6fG2lv4QhYhfb6V7W', 3, 1, 1627636762),
(21, 'Steven Hidayat', 'hidayatsteven9@gmail.com', 'team-2.jpg', '$2y$10$5cwY5mE5aOGL3GiQPbHc6.R1.y45OFFplHWncuXvuQHyDRUPUIE3i', 2, 1, 1627981081),
(27, 'risky', 'risky@gmail.com', 'f2cb4f38c4709e4be6b566505ba32766.jpg', '$2y$10$NtfGYQWM0ql6oggtjgLHROa8MYbxEUlfShjXZGrZYKBsKvbBY3KJy', 3, 1, 1629444843),
(28, 'Ikbar Junakarta', 'ikbar@gmail.com', 'FB_IMG_1586611037941.jpg', '$2y$10$5ohtWy2wkKz0L7c.pehFlOC5zxZQbsCxLcOfgl.6JLR1NUaFIgvw6', 2, 1, 1630227720);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 2),
(5, 2, 3),
(6, 3, 3),
(7, 1, 4),
(8, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'vidoegrapher'),
(3, 'member'),
(4, 'menu');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'vidoegrapher'),
(3, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 2, 'Dashboard', 'Videographer/penjual', 'fas fa-fw fa-tachometer-alt', 1),
(2, 3, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 3, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(5, 2, 'Upload Video', 'Upload/video', 'fas fa-fw fa-upload', 1),
(7, 1, 'Upload Jasa', 'Upload/barang', 'fas fa-fw fa-upload', 1),
(9, 2, 'Invoice', 'Invoice', 'fa fa-list-alt', 1),
(10, 4, 'Pemesanan', 'Services/detail_pengunjung', 'fa fa-shopping-cart', 1),
(11, 1, 'Menajemen ', 'Videographer/menajemen', 'fas fa-fw fa-user-edit', 1),
(13, 1, 'Videographer', 'Login/registrasi_videographer', 'fas fa-fw fa-user-edit', 1),
(14, 3, 'kontak', 'User/kontak', 'fa fa-phone', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `price_order`
--
ALTER TABLE `price_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `kategori_order` (`kategori_order`);

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pemesan` (`id_pemesan`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `galery`
--
ALTER TABLE `galery`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `price_order`
--
ALTER TABLE `price_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `galery`
--
ALTER TABLE `galery`
  ADD CONSTRAINT `galery_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `price_order`
--
ALTER TABLE `price_order`
  ADD CONSTRAINT `price_order_ibfk_1` FOREIGN KEY (`kategori_order`) REFERENCES `pricing` (`id_brg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD CONSTRAINT `tb_invoice_ibfk_1` FOREIGN KEY (`id_pemesan`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
