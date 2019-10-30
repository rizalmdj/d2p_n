-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2019 at 07:24 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_d2p`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(2) NOT NULL,
  `id_parent` int(2) NOT NULL,
  `icon` varchar(40) NOT NULL,
  `nama_menu` varchar(40) NOT NULL,
  `url` varchar(70) NOT NULL,
  `is_active` varchar(1) NOT NULL,
  `dropdown` varchar(1) NOT NULL,
  `id_role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `id_parent`, `icon`, `nama_menu`, `url`, `is_active`, `dropdown`, `id_role`) VALUES
(1, 0, 'icon-home icon-white', 'Home', 'index.php/admin', 'Y', 'N', '1,2,3,4'),
(2, 0, 'icon-book icon-white', 'Request D2P', 'index.php/request_d2p/request_d2p_list', 'Y', 'N', '1,2'),
(3, 0, 'icon-tag icon-white', 'View Request', 'index.php/view_requestd2p/view_requestd2p_list', 'Y', 'N', '1,3,4'),
(5, 0, 'icon-home icon-white', 'Master', '', 'Y', 'Y', '1'),
(6, 5, '', 'Data Departement', 'index.php/master_data/master_data_departemen', 'Y', 'N', '1'),
(7, 5, '', 'Data Divisi', 'index.php/master_divisi/master_data_divisi', 'Y', 'N', '1'),
(8, 5, '', 'Role Access', 'index.php/m_role_access/master_role_access', 'Y', 'N', '1'),
(9, 5, '', 'Data User', 'index.php/m_data_user/master_user', 'Y', 'N', '1');

-- --------------------------------------------------------

--
-- Table structure for table `m_status`
--

CREATE TABLE `m_status` (
  `id_status` int(2) NOT NULL,
  `status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_status`
--

INSERT INTO `m_status` (`id_status`, `status_name`) VALUES
(1, 'Draft'),
(2, 'Waiting Approval Manager User'),
(3, 'Waiting Approval Manager Operation'),
(4, 'Waiting Approval GM Operation'),
(5, 'Approved GM Operation'),
(6, 'Reject by Manager'),
(7, 'Reject by Manager Operation'),
(8, 'Reject by GM Operation');

-- --------------------------------------------------------

--
-- Table structure for table `tb_departemen`
--

CREATE TABLE `tb_departemen` (
  `id_dep` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `nama_departemen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_departemen`
--

INSERT INTO `tb_departemen` (`id_dep`, `id_divisi`, `nama_departemen`) VALUES
(1, 1, 'O&M Application Platform and Database'),
(2, 1, 'Customer Care'),
(3, 2, 'System Development'),
(4, 2, 'System Integration'),
(5, 3, 'Port Solution'),
(6, 3, 'E-Payment Solution');

-- --------------------------------------------------------

--
-- Table structure for table `tb_divisi`
--

CREATE TABLE `tb_divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_divisi`
--

INSERT INTO `tb_divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'Operation and Service Delivery'),
(2, 'System Development and Integration'),
(3, 'Product Management');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokumen`
--

CREATE TABLE `tb_dokumen` (
  `id_dok` int(11) NOT NULL,
  `id_req` int(11) NOT NULL,
  `dokumen` varchar(50) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_role_access`
--

CREATE TABLE `tb_role_access` (
  `id_role_access` int(11) NOT NULL,
  `role_access` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_role_access`
--

INSERT INTO `tb_role_access` (`id_role_access`, `role_access`) VALUES
(1, 'ADMIN'),
(2, 'STAFF'),
(3, 'MANAGER'),
(4, 'GENERAL MANAGER');

-- --------------------------------------------------------

--
-- Table structure for table `tr_instansi`
--

CREATE TABLE `tr_instansi` (
  `id` int(1) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kepsek` varchar(100) NOT NULL,
  `nip_kepsek` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_instansi`
--

INSERT INTO `tr_instansi` (`id`, `nama`, `alamat`, `kepsek`, `nip_kepsek`, `logo`) VALUES
(1, 'ILCS', 'Telkom Plaza North Jakarta\r\n4th Floor. Yos Sudarso 22-24,\r\nTanjung Priok North Jakarta,\r\nIndonesia. ', '', '', 'logo ILCS.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tr_request`
--

CREATE TABLE `tr_request` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `project_name` varchar(200) NOT NULL,
  `project_id` varchar(100) NOT NULL,
  `project_manager` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `req_date` date NOT NULL,
  `created_date` date NOT NULL,
  `status_req` varchar(5) NOT NULL,
  `update_date` date DEFAULT NULL,
  `id_upload_file` int(11) NOT NULL,
  `created_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_request`
--

INSERT INTO `tr_request` (`id`, `name`, `project_name`, `project_id`, `project_manager`, `keterangan`, `req_date`, `created_date`, `status_req`, `update_date`, `id_upload_file`, `created_by`) VALUES
(1, 'ROLA', 'NPKTOS BANTEN', '123456789', 'NICO', 'PATCH1', '2019-07-05', '0000-00-00', '2', '0000-00-00', 1, 1),
(4, 'Administrator', 'aplikasi d2p', '12345', 'rola', '0', '2019-09-03', '2019-09-02', '2', '0000-00-00', 0, 1),
(5, 'Rola Setia Putra', 'BARU', '9191919', 'BERRY', '0', '2019-09-20', '2019-09-02', '4', '0000-00-00', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tr_upload_file`
--

CREATE TABLE `tr_upload_file` (
  `id` int(11) NOT NULL,
  `upload_file1` varchar(50) NOT NULL,
  `upload_file2` varchar(50) NOT NULL,
  `upload_file3` varchar(50) NOT NULL,
  `upload_file4` varchar(50) NOT NULL,
  `upload_file5` varchar(50) NOT NULL,
  `upload_file6` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_upload_file`
--

INSERT INTO `tr_upload_file` (`id`, `upload_file1`, `upload_file2`, `upload_file3`, `upload_file4`, `upload_file5`, `upload_file6`) VALUES
(1, 'rola1.jpg', 'rola2.jpg', 'rola3.jpg', 'rola4.jpg', 'rola5.jpg', 'rola6.jpg'),
(2, 'berry1.jpg', 'berry2.jpg', 'berry3.jpg', 'berry4.jpg', 'berry5.jpg', 'berry6.jpg'),
(3, 'regia1.jpg', 'regia2.jpg', 'regia3.jpg', 'regia4.jpg', 'regia5.jpg', 'regia6.jpg'),
(4, 'LYY75M_BOARDINGPASS.pdf', 'Presentasi_Laporan_Ganggn_SJB_20190804_Direksi.pdf', 'GKDPYH_30-JUL-2019.pdf', 'GKDPYH_30-JUL-2019_(1).pdf', 'Daily_Report.pdf', 'LYY75M_BOARDINGPASS_(1).pdf'),
(5, 'WhatsApp_Image_2019-08-29_at_13.52_.57_.jpeg', 'WhatsApp_Image_2019-08-29_at_13.52_.57_1.jpeg', 'WhatsApp_Image_2019-08-29_at_13.52_.57_2.jpeg', 'WhatsApp_Image_2019-08-29_at_13.52_.57_3.jpeg', 'WhatsApp_Image_2019-08-29_at_13.52_.57_4.jpeg', 'WhatsApp_Image_2019-08-29_at_13.52_.57_5.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `id` int(2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(75) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `level` enum('Super Admin','Admin') NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `id_role_access` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `id_dep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`id`, `username`, `password`, `nama`, `nip`, `level`, `id_karyawan`, `email`, `status`, `id_role_access`, `id_divisi`, `id_dep`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '11941124', 'Super Admin', 11941124, 'admin@ilcs.co.id', 'Active', 1, 1, 1),
(2, 'rola', '21232f297a57a5a743894a0e4a801fc3', 'Rola Setia Putra', '11941124', 'Super Admin', 11941124, 'rola@ilcs.co.id', 'Active', 2, 1, 1),
(3, 'yoga', '21232f297a57a5a743894a0e4a801fc3', 'Prayoga Hari Wicaksono', '11941124', 'Super Admin', 1122333, 'yoga@ilcs.co.id', 'Active', 3, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_status`
--
ALTER TABLE `m_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tb_departemen`
--
ALTER TABLE `tb_departemen`
  ADD PRIMARY KEY (`id_dep`);

--
-- Indexes for table `tb_divisi`
--
ALTER TABLE `tb_divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  ADD PRIMARY KEY (`id_dok`);

--
-- Indexes for table `tb_role_access`
--
ALTER TABLE `tb_role_access`
  ADD PRIMARY KEY (`id_role_access`);

--
-- Indexes for table `tr_instansi`
--
ALTER TABLE `tr_instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_request`
--
ALTER TABLE `tr_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_upload_file`
--
ALTER TABLE `tr_upload_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_departemen`
--
ALTER TABLE `tb_departemen`
  MODIFY `id_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_divisi`
--
ALTER TABLE `tb_divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tr_request`
--
ALTER TABLE `tr_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tr_upload_file`
--
ALTER TABLE `tr_upload_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
