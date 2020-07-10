-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2020 at 10:13 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

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
-- Table structure for table `tb_max`
--

CREATE TABLE `tb_max` (
  `id_truk` int(11) NOT NULL,
  `plat_nomor` varchar(30) NOT NULL,
  `jenis_truk` varchar(30) NOT NULL,
  `jenis_rute` varchar(30) DEFAULT NULL,
  `waktu_last` datetime DEFAULT NULL,
  `checkpoint_last` varchar(30) DEFAULT NULL,
  `untuk_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_max`
--

INSERT INTO `tb_max` (`id_truk`, `plat_nomor`, `jenis_truk`, `jenis_rute`, `waktu_last`, `checkpoint_last`, `untuk_delete`) VALUES
(69, 'B sdfgd', 'kwkw', 'SBM', NULL, NULL, 42),
(70, 'B 1234 PF', 'Langsir', 'SBM', NULL, '', 43),
(71, 'H 6567 OP', 'Langsir', 'Langsir', NULL, NULL, 44),
(72, 'kucing', 'kwkwkwkw', 'SBM', '2020-04-24 10:27:40', 'cp1', 45),
(73, 'B 4578 KL', 'Dump truck', 'SBM', NULL, '', 46);

-- --------------------------------------------------------

--
-- Table structure for table `tb_registrasitruk`
--

CREATE TABLE `tb_registrasitruk` (
  `id_truk` int(11) NOT NULL,
  `plat_nomor` varchar(30) NOT NULL,
  `jenis_truk` varchar(50) NOT NULL,
  `jenis_rute` varchar(30) NOT NULL,
  `cp1` datetime DEFAULT NULL,
  `cp2` datetime DEFAULT NULL,
  `cp3` datetime DEFAULT NULL,
  `cp4` datetime DEFAULT NULL,
  `cp5` datetime DEFAULT NULL,
  `cp6` datetime DEFAULT NULL,
  `cp_selesai` datetime DEFAULT NULL,
  `waktu_last` datetime DEFAULT NULL,
  `checkpoint_last` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_registrasitruk`
--

INSERT INTO `tb_registrasitruk` (`id_truk`, `plat_nomor`, `jenis_truk`, `jenis_rute`, `cp1`, `cp2`, `cp3`, `cp4`, `cp5`, `cp6`, `cp_selesai`, `waktu_last`, `checkpoint_last`) VALUES
(70, 'B 1234 PF', 'Langsir', 'SBM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(71, 'H 6567 OP', 'Langsir', 'Langsir', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'B 4578 KL', 'Dump truck', 'SBM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '');

--
-- Triggers `tb_registrasitruk`
--
DELIMITER $$
CREATE TRIGGER `tambah_tb_max` AFTER INSERT ON `tb_registrasitruk` FOR EACH ROW BEGIN
INSERT INTO tb_max (id_truk, plat_nomor, jenis_truk, jenis_rute, waktu_last, checkpoint_last) VALUES (NEW.id_truk, NEW.plat_nomor, NEW.jenis_truk, NEW.jenis_rute, NULL, NULL);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_tb_max` AFTER UPDATE ON `tb_registrasitruk` FOR EACH ROW BEGIN
	UPDATE tb_max SET waktu_last = new.waktu_last, checkpoint_last = NEW.checkpoint_last, jenis_rute = NEW.jenis_rute WHERE id_truk = NEW.id_truk;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_timestamp`
--

CREATE TABLE `tb_timestamp` (
  `id_truk` int(11) NOT NULL,
  `plat_nomor` varchar(30) NOT NULL,
  `jenis_rute` varchar(30) DEFAULT NULL,
  `cp1` datetime DEFAULT NULL,
  `cp2` datetime DEFAULT NULL,
  `cp3` datetime DEFAULT NULL,
  `cp4` datetime DEFAULT NULL,
  `cp5` datetime DEFAULT NULL,
  `cp6` datetime DEFAULT NULL,
  `cp_selesai` datetime DEFAULT NULL,
  `untuk_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_timestamp`
--

INSERT INTO `tb_timestamp` (`id_truk`, `plat_nomor`, `jenis_rute`, `cp1`, `cp2`, `cp3`, `cp4`, `cp5`, `cp6`, `cp_selesai`, `untuk_delete`) VALUES
(70, 'B 1234 PF', 'SBM', '2020-04-23 21:13:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-04-23 21:16:54', '0000-00-00 00:00:00', '2020-04-23 21:27:56', 47),
(70, 'B 1234 PF', 'SBM', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-04-24 10:05:15', '0000-00-00 00:00:00', '2020-04-24 10:08:06', 48),
(73, 'B 4578 KL', 'SBM', '2020-04-29 11:44:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-04-29 11:50:03', '2020-04-29 11:50:50', 49);

--
-- Triggers `tb_timestamp`
--
DELIMITER $$
CREATE TRIGGER `update_tb_registrasitruk` AFTER INSERT ON `tb_timestamp` FOR EACH ROW BEGIN
	UPDATE tb_registrasitruk SET cp1 = NULL, cp2 = NULL, cp3 = NULL, cp4 = NULL, cp5 = NULL, cp6 = NULL, cp_selesai = NULL, waktu_last = NULL WHERE id_truk = NEW.id_truk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `role_id`, `date_created`) VALUES
(13, 'admin', 'admin@gmail.com', '$2y$10$MPniDD870QBwajMVHi9CZOVca8jvP4GXTv87tOxGzAhmYO2hmRvm6', 2, 1580701136),
(14, 'mini admin', 'miniadmin@gmail.com', '$2y$10$3/KU6k2aP6jW3aPWFfzgVONycJhB.whtWYfkr8p4MdVBhJNU6rGra', 3, 1580701180),
(22, 'Super Admin', 'superadmin@gmail.com', '$2y$10$OfGomp.YwzzFoCuTyEYbOOY/ey7NZ/WKzZKIjK5V2L7G.xUzofnHW', 1, 1581392269),
(25, 'William', 'william@gmail.com', '$2y$10$ts3tAOAIYfruR0Py5W6Z3.moMxk6SssEGqYHwO7YUTwFBNj5Qnq22', 1, 1581475691),
(29, 'Truck Scale', 'truckscale@gmail.com', '$2y$10$n63ahR49XNVqFrRhUjbdIe0/gZWE6wg/FopDlfi4J.zRRrqxllPHm', 4, 1581497488);

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
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Mini Admin'),
(4, 'Mini Admin 2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_max`
--
ALTER TABLE `tb_max`
  ADD PRIMARY KEY (`untuk_delete`);

--
-- Indexes for table `tb_registrasitruk`
--
ALTER TABLE `tb_registrasitruk`
  ADD PRIMARY KEY (`id_truk`);

--
-- Indexes for table `tb_timestamp`
--
ALTER TABLE `tb_timestamp`
  ADD PRIMARY KEY (`untuk_delete`),
  ADD KEY `penghubung1` (`id_truk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_max`
--
ALTER TABLE `tb_max`
  MODIFY `untuk_delete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tb_registrasitruk`
--
ALTER TABLE `tb_registrasitruk`
  MODIFY `id_truk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tb_timestamp`
--
ALTER TABLE `tb_timestamp`
  MODIFY `untuk_delete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_timestamp`
--
ALTER TABLE `tb_timestamp`
  ADD CONSTRAINT `penghubung1` FOREIGN KEY (`id_truk`) REFERENCES `tb_registrasitruk` (`id_truk`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
