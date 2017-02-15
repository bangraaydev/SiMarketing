-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 04 Sep 2014 pada 18.37
-- Versi Server: 5.5.34
-- Versi PHP: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `marketing`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses_user`
--

CREATE TABLE IF NOT EXISTS `akses_user` (
  `id_akses` int(5) NOT NULL AUTO_INCREMENT,
  `jabatan_id` int(11) NOT NULL,
  `modul` varchar(200) NOT NULL,
  `add` int(11) NOT NULL DEFAULT '0',
  `view` int(11) NOT NULL DEFAULT '0',
  `edit` int(11) NOT NULL DEFAULT '0',
  `remove` int(11) NOT NULL DEFAULT '0',
  `cetak` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_akses`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=497 ;

--
-- Dumping data untuk tabel `akses_user`
--

INSERT INTO `akses_user` (`id_akses`, `jabatan_id`, `modul`, `add`, `view`, `edit`, `remove`, `cetak`) VALUES
(478, 2, 'USER_MANAGEMENT', 0, 0, 0, 0, 0),
(479, 2, 'USER', 0, 0, 0, 0, 0),
(480, 2, 'JABATAN', 0, 0, 0, 0, 0),
(494, 1, 'JOBDESK', 0, 0, 0, 0, 0),
(493, 1, 'REPORT_QUOTATION', 0, 0, 0, 0, 0),
(492, 1, 'REPORT', 0, 0, 0, 0, 0),
(491, 1, 'JABATAN', 1, 1, 1, 1, 1),
(490, 1, 'USER', 1, 1, 1, 1, 1),
(489, 1, 'USER_MANAGEMENT', 0, 1, 0, 0, 0),
(488, 1, 'CPROJECT', 1, 1, 1, 1, 1),
(487, 1, 'CLIST', 1, 1, 1, 1, 1),
(486, 1, 'CLIENT', 0, 1, 0, 0, 0),
(485, 1, 'KATALOG', 0, 1, 0, 0, 0),
(484, 1, 'ACCESORIES', 1, 1, 1, 1, 1),
(483, 1, 'FIXTURE', 1, 1, 1, 1, 1),
(482, 1, 'LAMPU', 1, 1, 1, 1, 1),
(477, 2, 'JOBDESK', 1, 1, 1, 1, 1),
(475, 2, 'REPORT', 0, 1, 0, 0, 0),
(476, 2, 'REPORT_QUOTATION', 1, 1, 1, 1, 1),
(474, 2, 'QUOTATION', 1, 1, 1, 1, 1),
(473, 2, 'CPROJECT', 1, 1, 1, 1, 1),
(472, 2, 'CLIST', 1, 1, 1, 1, 1),
(470, 2, 'KATALOG', 0, 1, 0, 0, 0),
(471, 2, 'CLIENT', 0, 1, 0, 0, 0),
(469, 2, 'ACCESORIES', 1, 1, 1, 1, 1),
(468, 2, 'FIXTURE', 1, 1, 1, 1, 1),
(481, 1, 'PRODUK', 0, 1, 0, 0, 0),
(467, 2, 'LAMPU', 1, 1, 1, 1, 1),
(466, 2, 'PRODUK', 0, 1, 0, 0, 0),
(495, 1, 'QUOTATION', 0, 0, 0, 0, 0),
(496, 1, 'PROJECT_LIST', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id_area` int(11) NOT NULL AUTO_INCREMENT,
  `area` varchar(100) NOT NULL,
  PRIMARY KEY (`id_area`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `area`
--

INSERT INTO `area` (`id_area`, `area`) VALUES
(1, 'Jawa Barat'),
(2, 'DKI Jakarta'),
(3, 'Lampung'),
(4, 'Semarang'),
(5, 'Jogjakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(20) NOT NULL AUTO_INCREMENT,
  `initial` varchar(6) NOT NULL,
  `nama_pt` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(100) NOT NULL,
  `last_update` datetime NOT NULL,
  `kode_client` varchar(200) NOT NULL,
  `updated_by` varchar(200) NOT NULL,
  `tipe_client` int(11) NOT NULL,
  PRIMARY KEY (`id_client`),
  KEY `initial` (`initial`),
  KEY `nama_pt` (`nama_pt`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `client`
--

INSERT INTO `client` (`id_client`, `initial`, `nama_pt`, `alamat`, `kota`, `last_update`, `kode_client`, `updated_by`, `tipe_client`) VALUES
(1, 'GJ', 'Ganjar investam', 'Jl. invest 930', 'Jakarta', '2014-07-01 06:43:55', '000001KN', 'Admin Miname', 1),
(2, 'MB', 'Mobile Tech', 'Kemangisan', 'Jakarta', '2014-07-01 11:05:54', '000002KS', 'Admin Miname', 2),
(3, 'NK', 'Nikel Kopal', 'Jl. perintis n0 32', 'Surabaya', '2014-07-01 11:05:13', '000003OW', 'Admin Miname', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `client_pic`
--

CREATE TABLE IF NOT EXISTS `client_pic` (
  `id_pic` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pic` varchar(200) NOT NULL,
  `email_pic` varchar(200) NOT NULL,
  `telp_pic` varchar(20) NOT NULL,
  `sales_pic` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  PRIMARY KEY (`id_pic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data untuk tabel `client_pic`
--

INSERT INTO `client_pic` (`id_pic`, `nama_pic`, `email_pic`, `telp_pic`, `sales_pic`, `id_client`) VALUES
(1, 'Arolve', 'srolve@yahoo.com', '0921212323', 2, 1),
(2, 'Yuli', 'yuliani@yahoo.com', '9332323233', 4, 1),
(34, 'Memet', 'memet@gmail.com', '033232832', 2, 3),
(35, 'Hendra', 'hendra@intip.com', '03929323', 2, 3),
(36, 'icih', 'icih@yahoo.com', '04923283', 4, 3),
(39, 'Noni', 'noni@gmail.com', '02921212', 4, 2),
(40, 'Cuplis', 'Cuplis@yahoo.com', '0334923283', 6, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `client_project`
--

CREATE TABLE IF NOT EXISTS `client_project` (
  `id_client_project` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  PRIMARY KEY (`id_client_project`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data untuk tabel `client_project`
--

INSERT INTO `client_project` (`id_client_project`, `id_client`, `id_project`) VALUES
(1, 1, 1),
(2, 1, 4),
(8, 1, 2),
(44, 3, 2),
(45, 3, 4),
(49, 2, 2),
(50, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_quotation`
--

CREATE TABLE IF NOT EXISTS `detail_quotation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_no` varchar(300) NOT NULL,
  `area` varchar(300) NOT NULL,
  `kode_desc` varchar(300) NOT NULL,
  `desc_client` text NOT NULL,
  `sku` varchar(300) NOT NULL,
  `deskripsi` varchar(300) NOT NULL,
  `harga` double NOT NULL,
  `qty` int(20) NOT NULL,
  `id_quotation` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `halaman_user`
--

CREATE TABLE IF NOT EXISTS `halaman_user` (
  `idhalaman` int(5) NOT NULL AUTO_INCREMENT,
  `halaman` varchar(50) NOT NULL,
  PRIMARY KEY (`idhalaman`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `halaman_user`
--

INSERT INTO `halaman_user` (`idhalaman`, `halaman`) VALUES
(1, 'home'),
(2, 'user'),
(3, 'product'),
(4, 'report'),
(5, 'akses'),
(6, 'view-product'),
(7, 'client'),
(8, 'quotation'),
(9, 'detail-quotation');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan_user`
--

CREATE TABLE IF NOT EXISTS `jabatan_user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `jabatan_user`
--

INSERT INTO `jabatan_user` (`id`, `jabatan`, `keterangan`) VALUES
(1, 'Administrator', 'Bertugas untuk mengatur sistem'),
(2, 'Manager', 'Bertugas...'),
(3, 'Sales', 'Seputar Sales');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jns_ballast`
--

CREATE TABLE IF NOT EXISTS `jns_ballast` (
  `id_jns` int(20) NOT NULL AUTO_INCREMENT,
  `nm_jns` varchar(200) NOT NULL,
  PRIMARY KEY (`id_jns`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `jns_ballast`
--

INSERT INTO `jns_ballast` (`id_jns`, `nm_jns`) VALUES
(1, 'Ballast CMH'),
(2, 'Ballast HID'),
(3, 'HID Capacitor'),
(4, 'Ignitor'),
(5, 'Ballast Tetra L'),
(6, 'Ballast CFL'),
(7, 'Ballast T5'),
(8, 'Ballast T8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jns_prod_lampu`
--

CREATE TABLE IF NOT EXISTS `jns_prod_lampu` (
  `id_jns_lamp` int(20) NOT NULL AUTO_INCREMENT,
  `nama_prod` varchar(200) NOT NULL,
  PRIMARY KEY (`id_jns_lamp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `jns_prod_lampu`
--

INSERT INTO `jns_prod_lampu` (`id_jns_lamp`, `nama_prod`) VALUES
(1, 'LED'),
(2, 'Halogen'),
(3, 'CFL'),
(4, 'LFL'),
(5, 'HID');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prod_accesories`
--

CREATE TABLE IF NOT EXISTS `prod_accesories` (
  `id_accesories` int(11) NOT NULL AUTO_INCREMENT,
  `sku` varchar(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `garansi` varchar(2) NOT NULL,
  `stock` int(7) NOT NULL,
  `harga` double NOT NULL,
  `unit` varchar(20) NOT NULL,
  `status` varchar(200) NOT NULL,
  `ket` text NOT NULL,
  `pic1` text NOT NULL,
  `pic2` text NOT NULL,
  `pic3` text NOT NULL,
  `pic4` text NOT NULL,
  `last_update` datetime NOT NULL,
  `updated_by` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `brand` varchar(200) NOT NULL,
  PRIMARY KEY (`id_accesories`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `prod_accesories`
--

INSERT INTO `prod_accesories` (`id_accesories`, `sku`, `deskripsi`, `garansi`, `stock`, `harga`, `unit`, `status`, `ket`, `pic1`, `pic2`, `pic3`, `pic4`, `last_update`, `updated_by`, `keterangan`, `brand`) VALUES
(8, '1243', 'hanya testing', '5', 4, 3, 'UNITS', 'C', 'Keterangan', '', '', '', '', '2013-12-25 00:00:00', 'oyo', '', ''),
(10, '123', 'dfd', '1', 2, 3, 'PCS', 'C', '4', '', '', '', '', '2014-06-29 14:24:23', 'Admin Miname', 'cobaaaa', 'GE'),
(12, 'SKU-ACC1', 'Testing', '1', 45, 67000, 'PCS', 'D', '', 'pic1_hidrosfer.jpg', '', 'pic3_foundation.png', '', '2014-06-29 14:18:08', 'Admin Miname', 'Keterangan cscs vfv', 'LOKAL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prod_fixture`
--

CREATE TABLE IF NOT EXISTS `prod_fixture` (
  `id_fixture` int(20) NOT NULL AUTO_INCREMENT,
  `tipe_fixture` int(11) NOT NULL,
  `sku` varchar(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `lamp` varchar(10) NOT NULL,
  `cut_out` varchar(5) NOT NULL,
  `h` varchar(5) NOT NULL,
  `w` varchar(5) NOT NULL,
  `l` varchar(5) NOT NULL,
  `weight` varchar(200) NOT NULL,
  `source` text NOT NULL,
  `accesories` text NOT NULL,
  `harga` double NOT NULL,
  `ip` int(7) NOT NULL,
  `stock` int(7) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `status` varchar(200) NOT NULL,
  `ket` text NOT NULL,
  `pic1` text NOT NULL,
  `pic2` text NOT NULL,
  `pic3` text NOT NULL,
  `pic4` text NOT NULL,
  `last_update` datetime NOT NULL,
  `garansi` int(11) DEFAULT NULL,
  `updated_by` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `fitting` varchar(200) NOT NULL,
  `brand` varchar(100) NOT NULL,
  PRIMARY KEY (`id_fixture`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `prod_fixture`
--

INSERT INTO `prod_fixture` (`id_fixture`, `tipe_fixture`, `sku`, `deskripsi`, `lamp`, `cut_out`, `h`, `w`, `l`, `weight`, `source`, `accesories`, `harga`, `ip`, `stock`, `unit`, `status`, `ket`, `pic1`, `pic2`, `pic3`, `pic4`, `last_update`, `garansi`, `updated_by`, `keterangan`, `fitting`, `brand`) VALUES
(1, 4, 'SKU-123', 'mas banyar', 'ganjar', '55', '66', '66', '66', '', 'Fixture ganjar', 'Burung', 90000, 12, 3, 'PCS', 'A', '', '', '', 'pic3_download_(1).jpg', 'pic4_contoh_segti.jpg', '2014-06-29 12:20:51', 2, 'Admin Miname', 'Mas ganjar', 'fiit', 'LOKAL'),
(2, 1, 'SKU-B73', 'http://teknosains.com', 'sains', '44', '55', '88', '77', '', 'teknosains.com', 'sains', 78000, 23, 56, 'MODUL', 'C', '', 'pic1_codetrash.png', 'pic2_jquery.png', 'pic3_ff.png', 'pic4_galaksi.jpg', '2014-06-29 12:27:19', 2, 'Admin Miname', 'http://teknosains.com', 'tekno', 'GE'),
(3, 7, '345345', '345', '345', '435', '435', '435', '53443', '', '345', '345', 4353, 345, 4353, 'PCS', 'A', '', 'pic1_ff.png', '', 'pic3_nodejs.png', '', '2014-06-29 12:29:44', 3, 'Admin Miname', '4354', '345', 'GE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prod_lamp`
--

CREATE TABLE IF NOT EXISTS `prod_lamp` (
  `id_lamp` int(20) NOT NULL AUTO_INCREMENT,
  `tipe_lamp` int(11) NOT NULL,
  `sku` varchar(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `daya` varchar(5) NOT NULL,
  `fitting` varchar(6) NOT NULL,
  `warna` varchar(4) NOT NULL,
  `derajat` varchar(3) NOT NULL,
  `tegangan` varchar(10) NOT NULL,
  `umur` varchar(10) NOT NULL,
  `garansi` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `harga` double NOT NULL,
  `stock` int(7) NOT NULL,
  `unit` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  `pic1` text NOT NULL,
  `pic2` text NOT NULL,
  `pic3` text NOT NULL,
  `pic4` text NOT NULL,
  `last_update` datetime NOT NULL,
  `updated_by` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_lamp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `prod_lamp`
--

INSERT INTO `prod_lamp` (`id_lamp`, `tipe_lamp`, `sku`, `deskripsi`, `daya`, `fitting`, `warna`, `derajat`, `tegangan`, `umur`, `garansi`, `brand`, `harga`, `stock`, `unit`, `status`, `keterangan`, `pic1`, `pic2`, `pic3`, `pic4`, `last_update`, `updated_by`) VALUES
(1, 5, 'SKU-123', 'coba coba', '70', 'fitok', 'Blue', '35', '90', '1200', 2, 'LOKAL', 76000, 30, 'PCS', 'A', 'Testing', 'pic1_a.jpg', 'pic2_chanell.jpg', 'pic3_codetrash.png', 'pic4_astronomi.png', '2014-06-29 10:18:28', 'Admin Miname'),
(4, 3, 'SKU-234', 'coba coba', '100', 'fit35', 'Yell', '45', '120', '3200', 2, 'LOKAL', 90000, 20, 'MODUL', 'A', 'COba saja', 'pic1_beasiswa.png', 'pic2_kunang.jpg', 'pic3_Dennis_hwang.jpg', '', '2014-06-29 10:34:42', 'Admin Miname'),
(5, 1, '435', '545', '54353', '435', '34', '543', '435', '34543', 0, 'GE', 76000, 43543, 'PCS', 'A', 'fdgdf', 'pic1_avatar6087049_8.gif', '', 'pic3_trogono_2.jpg', '', '2014-06-29 10:42:16', 'Admin Miname'),
(6, 8, 'gfbb', '3434', '34', '3434', '3454', '434', '3434', '3434', 3, 'LOKAL', 34, 34, 'PCS', 'A', '3434', '', 'pic2_laravel-logo.jpg', 'pic3_pdo.png', 'pic4_python.png', '2014-06-29 12:32:24', 'Admin Miname'),
(7, 3, 'gbgfb', '4343', '34', '343', 'fdvd', '4', '34', '34', 2, 'GE', 4555, 43, 'PCS', 'D', 'gfbg', 'pic1_the-roller-coaster-large.jpg', 'pic2_sains.png', 'pic3_python.png', '', '2014-06-29 12:49:43', 'Admin Miname');

-- --------------------------------------------------------

--
-- Struktur dari tabel `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id_project` int(11) NOT NULL AUTO_INCREMENT,
  `nama_project` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `last_update` datetime NOT NULL,
  `updated_by` varchar(200) NOT NULL,
  PRIMARY KEY (`id_project`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `project`
--

INSERT INTO `project` (`id_project`, `nama_project`, `deskripsi`, `last_update`, `updated_by`) VALUES
(1, 'Kla-project', 'Membuat lampu Pijar', '2014-06-29 18:31:53', 'Admin Miname'),
(2, 'Gajar XXD', 'membuat lampu pijar XC', '2014-06-30 10:36:46', 'Admin Miname'),
(4, 'Mas Banyar', 'Mas ganjurrrr', '2014-06-30 10:42:35', 'Admin Miname'),
(5, 'Project Blank', 'No issue project', '2014-07-01 10:48:25', 'Admin Miname'),
(6, 'N-Project', 'Servis lampu', '2014-07-01 10:48:35', 'Admin Miname');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quotation`
--

CREATE TABLE IF NOT EXISTS `quotation` (
  `id_quotation` int(20) NOT NULL AUTO_INCREMENT,
  `no_ref` text NOT NULL,
  `dari` varchar(50) NOT NULL,
  `subject` text NOT NULL,
  `kepada` int(11) NOT NULL,
  `id_sales` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `status` enum('T','F') NOT NULL COMMENT 'T=true, F=false',
  PRIMARY KEY (`id_quotation`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data untuk tabel `quotation`
--

INSERT INTO `quotation` (`id_quotation`, `no_ref`, `dari`, `subject`, `kepada`, `id_sales`, `id_client`, `tgl`, `status`) VALUES
(1, 'QU.1/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(2, 'QU.2/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(3, 'QU.3/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(4, 'QU.4/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(5, 'QU.5/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(6, 'QU.6/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(7, 'QU.7/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(8, 'QU.8/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(9, 'QU.9/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(10, 'QU.10/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(11, 'QU.11/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(12, 'QU.12/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(13, 'QU.13/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(14, 'QU.14/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(15, 'QU.15/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(16, 'QU.16/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(17, 'QU.17/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(18, 'QU.18/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(19, 'QU.19/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(20, 'QU.20/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(21, 'QU.21/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(22, 'QU.22/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(23, 'QU.23/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(24, 'QU.24/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(25, 'QU.25/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(26, 'QU.26/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(27, 'QU.27/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(28, 'QU.28/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(29, 'QU.29/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(30, 'QU.30/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(31, 'QU.31/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(32, 'QU.32/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(33, 'QU.33/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T'),
(34, 'QU.34/HP/NK/08/2014', 'Nadya Ek', 'testing', 34, 2, 3, '2014-08-24', 'T');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_client`
--

CREATE TABLE IF NOT EXISTS `tipe_client` (
  `id_tipe` int(20) NOT NULL AUTO_INCREMENT,
  `initial_tipe` varchar(2) NOT NULL,
  `desc_tipe` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipe`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tipe_client`
--

INSERT INTO `tipe_client` (`id_tipe`, `initial_tipe`, `desc_tipe`) VALUES
(1, 'KN', 'Kontraktor'),
(2, 'KS', 'Konsultan'),
(3, 'OW', 'Owner');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_fixture`
--

CREATE TABLE IF NOT EXISTS `tipe_fixture` (
  `id_tipe` int(10) NOT NULL AUTO_INCREMENT,
  `nama_tipe` varchar(50) NOT NULL,
  `ket` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipe`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `tipe_fixture`
--

INSERT INTO `tipe_fixture` (`id_tipe`, `nama_tipe`, `ket`) VALUES
(1, 'Downlight Adj', 'Adjustable'),
(2, 'Downlight Fix', 'Fixed'),
(3, 'Downlight SM', 'Surface Mounted'),
(4, 'Spotlight Track', 'Track Light'),
(5, 'Spotlight Plafon', 'Plafon Base'),
(6, 'Exit Lamp', ''),
(7, 'Wall Lamp', ''),
(8, 'Flood Light', ''),
(9, 'Street Light', ''),
(10, 'Garden Lamp', ''),
(11, 'Batten', ''),
(12, 'Louver', ''),
(13, 'Pendant Lamp', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_lamp`
--

CREATE TABLE IF NOT EXISTS `tipe_lamp` (
  `id_tipe` int(20) NOT NULL AUTO_INCREMENT,
  `nama_tipe` varchar(200) NOT NULL,
  `id_jns_lamp` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipe`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `tipe_lamp`
--

INSERT INTO `tipe_lamp` (`id_tipe`, `nama_tipe`, `id_jns_lamp`) VALUES
(1, 'LED Lamp', '1'),
(2, 'LED Fixture', '1'),
(3, 'LED Strip', '1'),
(4, 'FLE', '3'),
(5, 'PLC', '3'),
(6, 'T5', '4'),
(7, 'T8', '4'),
(8, 'CMH', '5'),
(9, 'QMH', '5'),
(10, 'HPS', '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `photo` text NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nik`, `nama`, `username`, `password`, `jabatan_id`, `photo`, `last_login`) VALUES
(1, '1233334', 'Admin Miname', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '', '2014-09-04 18:18:07'),
(2, '998', 'Nadya Ek', 'nadya', '1e6eb2590ee576e8f788729ad596403a', 3, '', '0000-00-00 00:00:00'),
(3, '2323', 'Erwan', 'erwan', 'ac4256575f3ccee1601f115d8a333551', 2, '', '0000-00-00 00:00:00'),
(4, '892', 'Ganjar', 'banyar', '2a4c466ee018a6b8cb2f9efd5c79cf59', 3, '', '0000-00-00 00:00:00'),
(5, '889', 'Euis', 'euis', 'ab6dc3049915c30afd62eb2994f867c8', 3, '', '0000-00-00 00:00:00'),
(6, '9382', 'Otong', 'otong', 'f8210b5a6219450b5f0082654fecd92c', 3, '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `valas_quotation`
--

CREATE TABLE IF NOT EXISTS `valas_quotation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sku` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  `qty` int(11) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `harga` decimal(12,2) NOT NULL,
  `id_detail_quotation` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
