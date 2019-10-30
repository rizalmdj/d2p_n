-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Okt 2019 pada 09.37
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ilcs_db_d2p_new`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
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
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `id_parent`, `icon`, `nama_menu`, `url`, `is_active`, `dropdown`, `id_role`) VALUES
(1, 0, 'icon-home icon-white', 'Home', 'index.php/admin', 'Y', 'N', '1,2,3,4'),
(2, 0, 'icon-book icon-white', 'Request D2P', 'index.php/request_d2p/request_d2p_user_list', 'Y', 'N', '1,2'),
(3, 0, 'icon-tag icon-white', 'View Request', 'index.php/view_requestd2p/view_requestd2p_list', 'Y', 'N', '1,3,4'),
(5, 0, 'icon-home icon-white', 'Master', '', 'Y', 'Y', '1'),
(6, 5, '', 'Data Departement', 'index.php/master_data/master_data_departemen', 'Y', 'N', '1'),
(7, 5, '', 'Data Divisi', 'index.php/master_divisi/master_data_divisi', 'Y', 'N', '1'),
(8, 5, '', 'Role Access', 'index.php/m_role_access/master_role_access', 'Y', 'N', '1'),
(9, 5, '', 'Data User', 'index.php/m_data_user/master_user', 'Y', 'N', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_status`
--

CREATE TABLE `m_status` (
  `id_status` int(2) NOT NULL,
  `status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_status`
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
-- Struktur dari tabel `tb_departemen`
--

CREATE TABLE `tb_departemen` (
  `id_dep` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `nama_departemen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_departemen`
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
-- Struktur dari tabel `tb_divisi`
--

CREATE TABLE `tb_divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_divisi`
--

INSERT INTO `tb_divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'Operation and Service Delivery'),
(2, 'System Development and Integration'),
(3, 'Product Management');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dokumen`
--

CREATE TABLE `tb_dokumen` (
  `id_dok` int(11) NOT NULL,
  `id_req` int(11) NOT NULL,
  `dokumen` varchar(50) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_role_access`
--

CREATE TABLE `tb_role_access` (
  `id_role_access` int(11) NOT NULL,
  `role_access` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_role_access`
--

INSERT INTO `tb_role_access` (`id_role_access`, `role_access`) VALUES
(1, 'ADMIN'),
(2, 'STAFF'),
(3, 'MANAGER'),
(4, 'GENERAL MANAGER');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_instansi`
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
-- Dumping data untuk tabel `tr_instansi`
--

INSERT INTO `tr_instansi` (`id`, `nama`, `alamat`, `kepsek`, `nip_kepsek`, `logo`) VALUES
(1, 'ILCS', 'Telkom Plaza North Jakarta\r\n4th Floor. Yos Sudarso 22-24,\r\nTanjung Priok North Jakarta,\r\nIndonesia. ', '', '', 'logo ILCS.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_request`
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
  `update_date` timestamp NULL DEFAULT NULL,
  `id_upload_file` int(11) NOT NULL,
  `created_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tr_request`
--

INSERT INTO `tr_request` (`id`, `name`, `project_name`, `project_id`, `project_manager`, `keterangan`, `req_date`, `created_date`, `status_req`, `update_date`, `id_upload_file`, `created_by`) VALUES
(1, 'Rizal muhammad', 'Himakom 13', 'kuliah 13', 'setengah 13', 'dari sini setengah 3 dari sini setengah tiga', '2019-10-11', '0000-00-00', '6', '2019-10-15 23:40:59', 1, 1),
(4, 'Administrator', 'aplikasi d2p', '12345', 'rola', '0', '2019-09-03', '2019-09-02', '1', '2019-10-15 23:27:08', 0, 1),
(9, 'rola', 'cinta takan salah fix', '121 fix', '121 fix', '12sasaas fix', '2019-10-11', '2019-10-11', '1', '2019-10-15 23:27:10', 9, 2),
(10, 'rola', 'ada apan dengan cinta ko 90', 'kkjjk 90', 'kjkjjk 90', 'kjjk 90', '2019-10-11', '2019-10-11', '1', '2019-10-15 23:27:12', 10, 2),
(11, 'rola', 'tes1 edit', 'qwe edit', 'qwe edit', 'qwqwq edit', '2019-10-11', '2019-10-11', '1', '2019-10-15 23:27:13', 11, 2),
(12, 'rola', 'bongkar 1', 'mkkkk', '0909', '121121wqwq', '2019-10-11', '2019-10-11', '1', '2019-10-15 23:27:15', 12, 2),
(26, 'Rola Setia Putra', 'Tutu', '9kksu', 'kjkjkjaksa', 'yajjakjshkahskjahdkhahdklhlahad', '2019-10-16', '2019-10-16', '2', '2019-10-28 21:01:30', 13, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_upload_file`
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
-- Dumping data untuk tabel `tr_upload_file`
--

INSERT INTO `tr_upload_file` (`id`, `upload_file1`, `upload_file2`, `upload_file3`, `upload_file4`, `upload_file5`, `upload_file6`) VALUES
(1, '', '', '', '', '', ''),
(2, '', '', '', '', '', ''),
(3, 'ebec1001a2905cb209ce7c91754ce986.jpg', 'f0b0f552ef954c1fd86d4fbd55b3d195.jpg', '0072e2a2492024a7941aff36d4271f1c.jpg', 'a50557194d770c25bf6141ad99b12eac.jpg', '26a0f76111c2d581e9c0c9eb3eb1d858.jpg', 'dd502959423e3807d110c23b03ed0bbb.jpg'),
(4, '717e23c5e0a4ef5a2c388d8f40215309.png', '4d2e495634dcc6a400106a318ef7914b.png', 'd7c04d726747e0e2f4f68de5cfa98db3.png', '552b21040b3b66bab26b5410fbcc39da.png', '56920ab7e8e8d2ec1db5652639e23636.png', '4b15ba7fac16fd36a893a17ce531b904.png'),
(5, '2a83ffe0fa792e113070afce06334e84.png', 'b8e9e6c0407a7b38e364373123a19247.png', '4edde21c91d154c5c29206475dd4c9b9.png', '8165e8d569c2866aca87c8c5558320bc.png', '22169b0e1720c3270f12ea79c7322a0d.png', 'ee3a961a43f3c965885ab98efea4fdb4.png'),
(6, '8bb31c6de7a8ebabec9008b749f23d2b.png', 'abb75f4edcbefc7b8bc7271aa307dba9.png', 'fc56661a04aec218d1a56c32c43cb002.png', 'dd817f213208d4855d2e4f6649292645.png', '1e2f94ebcf1a43467b0936d6369c841f.png', '2083de69423eed60c18dc064b59efaee.png'),
(7, '03d4bdac2103e087bd7456a6969641c1.png', 'ffda9b43d0218e75e5803a296fe5ef52.png', '3bb2453ecd2cedb39b31ac9f29bc84b6.png', 'a01610697d9bd3810796c9224e886901.png', '638ffd23b067193b3386c3a036c64245.png', 'de4e13e641513688f7fba7475b5c38f0.png'),
(8, '07d4924956c9f7f77d59640f77ea2eef.pdf', 'c5ff7f6a7a7765bee01c1c776a5804dc.pdf', 'c4d686bd4b6a91950e0f70d17f4676a3.pdf', '125f3fa86b79467e765098bce5a91ac3.pdf', 'b1139ea5424333f92503e6ed76a9a540.pdf', 'a78c3739222f09de7878ee9fe34fcf3c.pdf'),
(9, '361f295eebad49792995828b6e3388f2.png', 'a5245b997490917bb8909f7a456cca17.png', '5ec33b2c2e4373b6db8a5f4ac9814777.png', 'e51173f7df25fc84214b664032aafd9a.png', '47f238c6c018906e2359d8a79f5bfa30.png', 'b362e0f56b053c9bf79eb0c46b91ccdf.png'),
(10, '68697b3cfb0d1d643b064647c1df5e92.png', '689de06837bd715aad7b6a8d39a924d1.png', '2d61268474922f85bf2f93c5096cb617.png', '674247f9ea8ccae573208330fcf760c9.png', 'ae0bb5c096cc49b5ba5a76e963f0000a.png', 'e4caaa5c3417192cba854dad8fe06728.png'),
(11, '2d0eb591eb483f281f8bf4e428a6754c.png', '0e28cbbc47a1c8bcd9cc0a1a8e643803.png', '35d63170a54556da25e7c237a5ee1940.png', 'd3b87ea376a251689cd61efa35fed29e.png', 'd2155a4fa1ffc838fb484b488b1e1fd1.png', '139ba72c74ab0901d6230eb9ee3e07e4.png'),
(12, '4427b50e0e190c48a427ab70f31e6ced.jpeg', '56d3caef16e61dab7c6c364754bacdcc.jpeg', 'b52a2b316c850203b1edd4de91434723.jpeg', 'bf2262d9bcb36549548545a1de6c064b.jpeg', 'c1df0f19fef100c20bc145c40024ea18.jpeg', '491d2eeb051dd903ade04a5054c6ee2e.jpeg'),
(13, '14f3b19078ba825b711ef4741962bf19.jpeg', '4072b17a208e99d14e2c4eb66e917e75.jpeg', '6dc202fe7b9428a5d071236475dcb06b.pdf', 'ded6b90dcbac1c3703e751bf5f586b40.pdf', '7020e4eb6db518aa143551c28f534e40.pdf', 'ec72c69be8da734ef6cfd7c970699de2.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_admin`
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
  `id_dep` int(11) NOT NULL,
  `status_pas` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_admin`
--

INSERT INTO `t_admin` (`id`, `username`, `password`, `nama`, `nip`, `level`, `id_karyawan`, `email`, `status`, `id_role_access`, `id_divisi`, `id_dep`, `status_pas`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '11941124', 'Super Admin', 11941124, 'admin@ilcs.co.id', 'Active', 1, 1, 1, 1),
(2, 'rola', '21232f297a57a5a743894a0e4a801fc3', 'Rola Setia Putra', '11941124', 'Super Admin', 11941124, 'rola@ilcs.co.id', 'Active', 2, 1, 1, 1),
(3, 'yoga', '21232f297a57a5a743894a0e4a801fc3', 'Prayoga Hari Wicaksono', '11941124', 'Super Admin', 1122333, 'yoga@ilcs.co.id', 'Active', 3, 1, 1, 1),
(4, 'rizalmdj', '21232f297a57a5a743894a0e4a801fc3', 'Rizal muhammad', '', '', 123451, 'rizalmuhammad91s1@gm', 'Active', 2, 1, 1, 1),
(5, 'cum', '21232f297a57a5a743894a0e4a801fc3', 'cumi cumi', '', '', 123456, 'pega.kurniawan.02@gm', 'Active', 4, 1, 1, 1),
(8, 'phuu', '202cb962ac59075b964b07152d234b70', 'thee', '', 'Super Admin', 12345678, '12@gmail.com', 'Active', 1, 2, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_status`
--
ALTER TABLE `m_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `tb_departemen`
--
ALTER TABLE `tb_departemen`
  ADD PRIMARY KEY (`id_dep`);

--
-- Indeks untuk tabel `tb_divisi`
--
ALTER TABLE `tb_divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  ADD PRIMARY KEY (`id_dok`);

--
-- Indeks untuk tabel `tb_role_access`
--
ALTER TABLE `tb_role_access`
  ADD PRIMARY KEY (`id_role_access`);

--
-- Indeks untuk tabel `tr_instansi`
--
ALTER TABLE `tr_instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tr_request`
--
ALTER TABLE `tr_request`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tr_upload_file`
--
ALTER TABLE `tr_upload_file`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_departemen`
--
ALTER TABLE `tb_departemen`
  MODIFY `id_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_divisi`
--
ALTER TABLE `tb_divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tr_request`
--
ALTER TABLE `tr_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tr_upload_file`
--
ALTER TABLE `tr_upload_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
