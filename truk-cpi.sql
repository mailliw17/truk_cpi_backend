-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jul 2020 pada 17.29
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `truk-cpi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_history`
--

CREATE TABLE `tb_history` (
  `id_truk` int(11) NOT NULL,
  `plat_nomor` varchar(30) NOT NULL,
  `jenis_rute` varchar(30) NOT NULL,
  `lokasi_pabrik` enum('Genuk / KM.08','Sayung / KM.09') NOT NULL,
  `cp1` datetime DEFAULT NULL,
  `cp2` datetime DEFAULT NULL,
  `cp3` datetime DEFAULT NULL,
  `cp4` datetime DEFAULT NULL,
  `cp5` datetime DEFAULT NULL,
  `cp6` datetime DEFAULT NULL,
  `untuk_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_history`
--

INSERT INTO `tb_history` (`id_truk`, `plat_nomor`, `jenis_rute`, `lokasi_pabrik`, `cp1`, `cp2`, `cp3`, `cp4`, `cp5`, `cp6`, `untuk_delete`) VALUES
(93, 'Khusus km.09', 'Langsir', 'Genuk / KM.08', '2020-07-25 22:17:06', '0000-00-00 00:00:00', '2020-07-25 22:17:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-07-25 22:18:35', 6),
(93, 'Khusus km.09', 'Langsir', 'Sayung / KM.09', '2020-07-25 22:19:35', '0000-00-00 00:00:00', '2020-07-25 22:20:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-07-25 22:21:27', 7);

--
-- Trigger `tb_history`
--
DELIMITER $$
CREATE TRIGGER `hapus_perjalanan_now` AFTER INSERT ON `tb_history` FOR EACH ROW BEGIN
	UPDATE tb_registrasitruk SET lokasi_pabrik = NULL, cp1 = NULL, cp2 = NULL, cp3 = NULL, cp4 = NULL, cp5 = NULL, cp6 = NULL, waktu_last = NULL, checkpoint_last = NULL WHERE id_truk = NEW.id_truk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_max`
--

CREATE TABLE `tb_max` (
  `id_truk` int(11) NOT NULL,
  `plat_nomor` varchar(30) NOT NULL,
  `jenis_truk` varchar(30) NOT NULL,
  `jenis_rute` varchar(30) DEFAULT NULL,
  `lokasi_pabrik` enum('Genuk / KM.08','Sayung / KM.09') DEFAULT NULL,
  `waktu_last` datetime DEFAULT NULL,
  `checkpoint_last` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_max`
--

INSERT INTO `tb_max` (`id_truk`, `plat_nomor`, `jenis_truk`, `jenis_rute`, `lokasi_pabrik`, `waktu_last`, `checkpoint_last`) VALUES
(76, 'B 2121 OO', 'Langsir', 'SBM', NULL, NULL, NULL),
(93, 'Khusus km.09', 'kwkwkw', 'Langsir', NULL, NULL, NULL),
(94, '123', 'FGFDG', 'SBM', 'Genuk / KM.08', '2020-07-25 22:26:30', 'cp3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_registrasitruk`
--

CREATE TABLE `tb_registrasitruk` (
  `id_truk` int(11) NOT NULL,
  `plat_nomor` varchar(30) NOT NULL,
  `jenis_truk` varchar(50) NOT NULL,
  `jenis_rute` varchar(30) NOT NULL,
  `lokasi_pabrik` enum('Genuk / KM.08','Sayung / KM.09') DEFAULT NULL,
  `cp1` datetime DEFAULT NULL,
  `cp2` datetime DEFAULT NULL,
  `cp3` datetime DEFAULT NULL,
  `cp4` datetime DEFAULT NULL,
  `cp5` datetime DEFAULT NULL,
  `cp6` datetime DEFAULT NULL,
  `waktu_last` datetime DEFAULT NULL,
  `checkpoint_last` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_registrasitruk`
--

INSERT INTO `tb_registrasitruk` (`id_truk`, `plat_nomor`, `jenis_truk`, `jenis_rute`, `lokasi_pabrik`, `cp1`, `cp2`, `cp3`, `cp4`, `cp5`, `cp6`, `waktu_last`, `checkpoint_last`) VALUES
(76, 'B 2121 OO', 'Langsir', 'SBM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 'Khusus km.09', 'kwkwkw', 'Langsir', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, '123', 'FGFDG', 'SBM', 'Genuk / KM.08', NULL, NULL, '2020-07-25 22:26:30', NULL, NULL, NULL, '2020-07-25 22:26:30', 'cp3');

--
-- Trigger `tb_registrasitruk`
--
DELIMITER $$
CREATE TRIGGER `delete_truk` AFTER DELETE ON `tb_registrasitruk` FOR EACH ROW BEGIN
DELETE FROM tb_max WHERE tb_max.id_truk = OLD.id_truk;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_truk_baru` AFTER INSERT ON `tb_registrasitruk` FOR EACH ROW BEGIN
INSERT INTO tb_max (id_truk, plat_nomor, jenis_truk, jenis_rute, lokasi_pabrik, waktu_last, checkpoint_last) VALUES (NEW.id_truk, NEW.plat_nomor, NEW.jenis_truk, NEW.jenis_rute, NULL, NULL, NULL);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_checkpoint` AFTER UPDATE ON `tb_registrasitruk` FOR EACH ROW BEGIN
	UPDATE tb_max SET waktu_last = new.waktu_last, checkpoint_last = NEW.checkpoint_last, jenis_rute = NEW.jenis_rute, lokasi_pabrik = NEW.lokasi_pabrik WHERE id_truk = NEW.id_truk;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `role` enum('Super Admin','Admin','Barcoding','Inputan','') NOT NULL,
  `lokasi_pabrik` varchar(256) NOT NULL,
  `lokasi_checkpoint` varchar(256) NOT NULL COMMENT 'cp1:security IN, cp2: sampling, cp3: ts IN, cp4: proses bongkar/silo, cp5:ts OUT, cp6: security OUT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `email`, `password`, `role_id`, `date_created`, `role`, `lokasi_pabrik`, `lokasi_checkpoint`) VALUES
(13, 'admin', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 2, 1580701136, 'Admin', '', ''),
(22, 'Super Admin', 'superadmin', 'superadmin@gmail.com', '17c4520f6cfd1ab53d8745e84681eb49', 1, 1581392269, 'Super Admin', '', ''),
(25, 'William', 'wil', 'william@gmail.com', 'e39622164d485c2dc8970f518b0189cd', 1, 1581475691, 'Super Admin', '', ''),
(51, 'Operator Barcode', 'barcoding', '', '0aea9b8b2d26d4fe9a33cf2bca7795d6', 0, 1595400202, 'Barcoding', 'Genuk / KM.08', 'cp1'),
(52, 'Truck Scale', 'truckscale', '', 'ceb2b0a114d859426fe5129a1a2c7d9e', 0, 1595400224, 'Inputan', 'Genuk / KM.08', 'cp3'),
(63, 'cp5', 'cp5', '', '202cb962ac59075b964b07152d234b70', 0, 1595495219, 'Inputan', 'Genuk / KM.08', 'cp5'),
(64, 'cp4', 'cp4', '', '202cb962ac59075b964b07152d234b70', 0, 1595495259, 'Barcoding', 'Genuk / KM.08', 'cp4'),
(65, 'cp6', 'cp6', '', '202cb962ac59075b964b07152d234b70', 0, 1595495340, 'Barcoding', 'Genuk / KM.08', 'cp6'),
(66, 'cp1', 'cp1', '', '202cb962ac59075b964b07152d234b70', 0, 1595556773, 'Barcoding', 'Genuk / KM.08', 'cp1'),
(67, 'cp2', 'cp2', '', '202cb962ac59075b964b07152d234b70', 0, 1595556803, 'Barcoding', 'Genuk / KM.08', 'cp2'),
(68, 'cp3', 'cp3', '', '202cb962ac59075b964b07152d234b70', 0, 1595556844, 'Inputan', 'Genuk / KM.08', 'cp3'),
(69, '1cp', '1cp', '', '202cb962ac59075b964b07152d234b70', 0, 1595559225, 'Barcoding', 'Sayung / KM.09', 'cp1'),
(70, '2cp', '2cp', '', '202cb962ac59075b964b07152d234b70', 0, 1595559240, 'Barcoding', 'Sayung / KM.09', 'cp2'),
(71, '6cp', '6cp', '', '202cb962ac59075b964b07152d234b70', 0, 1595559256, 'Barcoding', 'Sayung / KM.09', 'cp6'),
(72, '3cp', '3cp', '', '202cb962ac59075b964b07152d234b70', 0, 1595560352, 'Inputan', 'Sayung / KM.09', 'cp3'),
(73, '5cp', '5cp', '', '202cb962ac59075b964b07152d234b70', 0, 1595561818, 'Inputan', 'Sayung / KM.09', 'cp5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Scan'),
(4, 'Inputan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_history`
--
ALTER TABLE `tb_history`
  ADD PRIMARY KEY (`untuk_delete`);

--
-- Indeks untuk tabel `tb_max`
--
ALTER TABLE `tb_max`
  ADD PRIMARY KEY (`id_truk`);

--
-- Indeks untuk tabel `tb_registrasitruk`
--
ALTER TABLE `tb_registrasitruk`
  ADD PRIMARY KEY (`id_truk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_history`
--
ALTER TABLE `tb_history`
  MODIFY `untuk_delete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_registrasitruk`
--
ALTER TABLE `tb_registrasitruk`
  MODIFY `id_truk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
