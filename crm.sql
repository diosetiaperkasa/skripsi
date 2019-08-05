-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `Id_Barang` varchar(15) NOT NULL,
  `Nama_Barang` varchar(20) NOT NULL,
  `Id_Category` varchar(20) NOT NULL,
  `stok_awal` int(50) NOT NULL,
  `Stok` int(11) NOT NULL,
  `Satuan_Barang` varchar(10) NOT NULL,
  PRIMARY KEY (`Id_Barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `barang` (`Id_Barang`, `Nama_Barang`, `Id_Category`, `stok_awal`, `Stok`, `Satuan_Barang`) VALUES
('09191',	'Kopi',	'01',	10,	777,	'PCS'),
('091919',	'Susu',	'03',	10,	815,	'PCS'),
('09191983',	'Jagung',	'03',	10,	911,	'PCS'),
('091919834',	'Kacang',	'03',	10,	917,	'PCS'),
('uwuwuw',	'hahahha',	'003',	100,	-10,	'PCS');

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `Id_Category` varchar(10) NOT NULL,
  `Nama` varchar(25) NOT NULL,
  PRIMARY KEY (`Id_Category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `category` (`Id_Category`, `Nama`) VALUES
('003',	'ban luar'),
('01',	'Baju'),
('02',	'Celanaw'),
('03',	'Ban Dalam');

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `Id_Customer` varchar(10) NOT NULL,
  `Nama_Customer` char(50) NOT NULL,
  `Id_Wilayah` int(10) NOT NULL,
  `Alamat_Customer` char(250) NOT NULL,
  `No_Telepon` int(15) NOT NULL,
  `Keterangan` varchar(500) NOT NULL,
  `Limit_Kredit` int(11) NOT NULL,
  `Status` char(20) NOT NULL,
  PRIMARY KEY (`Id_Customer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `customer` (`Id_Customer`, `Nama_Customer`, `Id_Wilayah`, `Alamat_Customer`, `No_Telepon`, `Keterangan`, `Limit_Kredit`, `Status`) VALUES
('CS001',	'Indofood',	1,	'JAKARTA',	7711913,	'ok',	100000,	'Lancar'),
('CS002',	'Indomie',	3,	'Cihuy',	7890,	'okoko',	200000,	'Lancar'),
('Dicta nost',	'Ab mollitia quam vol',	3,	'Eveniet qui qui non',	0,	'Omnis saepe et perfe',	0,	'Lancar');

DROP TABLE IF EXISTS `salesman`;
CREATE TABLE `salesman` (
  `Id_Salesman` varchar(10) NOT NULL,
  `Nama_Salesman` varchar(25) NOT NULL,
  `No_Telepon` int(11) NOT NULL,
  `Id_Target` int(11) NOT NULL,
  PRIMARY KEY (`Id_Salesman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `salesman` (`Id_Salesman`, `Nama_Salesman`, `No_Telepon`, `Id_Target`) VALUES
('SL001',	'Cicit',	2323,	1),
('SL002',	'Koko',	2323,	0);

DROP TABLE IF EXISTS `suplier`;
CREATE TABLE `suplier` (
  `id_suplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  PRIMARY KEY (`id_suplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `suplier` (`id_suplier`, `nama`) VALUES
(1,	'Kinos');

DROP TABLE IF EXISTS `tagihan`;
CREATE TABLE `tagihan` (
  `Id_Tagihan` int(11) NOT NULL AUTO_INCREMENT,
  `No_Tagihan` int(11) NOT NULL,
  `Id_Transaksi` int(11) NOT NULL,
  `Tgl` varchar(20) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Id_Customer` varchar(20) NOT NULL,
  PRIMARY KEY (`Id_Tagihan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tagihan` (`Id_Tagihan`, `No_Tagihan`, `Id_Transaksi`, `Tgl`, `Jumlah`, `Id_Customer`) VALUES
(1,	1,	1,	'02/08/2017',	50000,	'CS001'),
(2,	9,	4,	'01/01/2019',	2,	'CS001');

DROP TABLE IF EXISTS `target_salesman`;
CREATE TABLE `target_salesman` (
  `Id_Target` varchar(12) NOT NULL,
  `Keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `target_salesman` (`Id_Target`, `Keterangan`) VALUES
('T002',	'500'),
('01',	'5000000');

DROP TABLE IF EXISTS `tbl_login`;
CREATE TABLE `tbl_login` (
  `id_user` varchar(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` char(10) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_login` (`id_user`, `username`, `password`, `level`, `status`) VALUES
('A001',	'admin',	'123',	'admin',	1),
('A002',	'nicken',	'123',	'spv',	1),
('A003',	'litan',	'123',	'direktur',	1),
('A004',	'fahmi',	'123',	'manager',	1);

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `Id_Transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `Tgl` varchar(10) NOT NULL DEFAULT '',
  `Tgl_Tempo` varchar(10) NOT NULL DEFAULT '',
  `No_transaksi` varchar(10) NOT NULL DEFAULT '',
  `Id_Salesman` varchar(10) NOT NULL DEFAULT '',
  `Id_Customer` varchar(10) NOT NULL DEFAULT '',
  `id_suplier` int(11) NOT NULL,
  `Jumlah` int(15) NOT NULL,
  `Sudah_Dibayar` int(15) NOT NULL,
  `Status` char(20) NOT NULL DEFAULT '',
  `counter` int(5) NOT NULL,
  PRIMARY KEY (`Id_Transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `transaksi` (`Id_Transaksi`, `Tgl`, `Tgl_Tempo`, `No_transaksi`, `Id_Salesman`, `Id_Customer`, `id_suplier`, `Jumlah`, `Sudah_Dibayar`, `Status`, `counter`) VALUES
(24,	'2019-06-11',	'19/06/2019',	'erewrew',	'SL001',	'CS001',	0,	1,	0,	'BELUM LUNAS',	0),
(25,	'2019-06-25',	'27/06/2019',	'3ew',	'',	'',	0,	3,	0,	'BELUM LUNAS',	0),
(26,	'2019-06-25',	'27/06/2019',	'3ewwwwwww',	'SL002',	'CS002',	0,	9,	0,	'BELUM LUNAS',	0),
(27,	'2019-06-23',	'29/06/2019',	'111',	'SL002',	'CS001',	0,	2,	0,	'BELUM LUNAS',	0),
(28,	'2019-06-20',	'20/06/2019',	'erewrew',	'SL002',	'CS002',	0,	3,	0,	'BELUM LUNAS',	0),
(29,	'2019-07-15',	'10/07/2019',	'hdhdhdhdh',	'SL001',	'Dicta nost',	0,	9000810,	0,	'BELUM LUNAS',	2),
(30,	'2019-07-17',	'24/07/2019',	'SO-030',	'SL002',	'Dicta nost',	0,	100000000,	0,	'BELUM LUNAS',	2),
(31,	'2019-07-26',	'26/07/2019',	'SO-031',	'SL001',	'CS002',	0,	1,	0,	'BELUM LUNAS',	2);

DROP TABLE IF EXISTS `transaksi_detail`;
CREATE TABLE `transaksi_detail` (
  `Id_Transaksi_Detail` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Transaksi` int(11) DEFAULT NULL,
  `Id_Barang` varchar(11) DEFAULT NULL,
  `Harga` int(11) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `Sales` varchar(11) DEFAULT NULL,
  `Customer` varchar(11) DEFAULT NULL,
  `suplier` varchar(20) DEFAULT NULL,
  `Tgl` varchar(15) DEFAULT NULL,
  `Wilayah` varchar(15) DEFAULT NULL,
  `kode_transaksi` varchar(20) DEFAULT NULL,
  `komplain` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`Id_Transaksi_Detail`),
  KEY `Harga` (`Harga`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `transaksi_detail` (`Id_Transaksi_Detail`, `Id_Transaksi`, `Id_Barang`, `Harga`, `Qty`, `Sales`, `Customer`, `suplier`, `Tgl`, `Wilayah`, `kode_transaksi`, `komplain`) VALUES
(26,	24,	'09191',	1,	1,	'SL001',	'CS001',	NULL,	'11/06/2019',	'1',	NULL,	NULL),
(27,	26,	'09191',	1,	1,	'SL002',	'CS002',	NULL,	'25/06/2019',	'3',	NULL,	NULL),
(28,	26,	'09191983',	2,	2,	'SL002',	'CS002',	NULL,	'25/06/2019',	'3',	NULL,	NULL),
(29,	26,	'09191983',	2,	2,	'SL002',	'CS002',	NULL,	'25/06/2019',	'3',	NULL,	NULL),
(30,	27,	'091919834',	1,	1,	'SL002',	'CS001',	NULL,	'23/06/2019',	'1',	NULL,	NULL),
(31,	27,	'09191',	1,	1,	'SL002',	'CS001',	NULL,	'23/06/2019',	'1',	NULL,	NULL),
(32,	28,	'091919834',	1,	1,	'SL002',	'CS002',	NULL,	'20/06/2019',	'3',	NULL,	NULL),
(33,	28,	'091919',	1,	2,	'SL002',	'CS002',	NULL,	'20/06/2019',	'3',	NULL,	NULL),
(34,	29,	'09191983',	800,	1,	'SL001',	'Dicta nost',	NULL,	'15/07/2019',	'3',	NULL,	NULL),
(35,	29,	'uwuwuw',	900001,	10,	'SL001',	'Dicta nost',	NULL,	'15/07/2019',	'3',	NULL,	NULL),
(36,	30,	'091919',	1000000,	100,	'SL002',	'Dicta nost',	NULL,	'17/07/2019',	'3',	'SO-030',	'rusak coy'),
(37,	31,	'09191',	1,	1,	'SL001',	'CS002',	NULL,	'26/07/2019',	'3',	'SO-031',	'FSDFSDFDSFDSFDSF');

DROP TABLE IF EXISTS `wilayah`;
CREATE TABLE `wilayah` (
  `Id_Wilayah` int(11) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_Wilayah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `wilayah` (`Id_Wilayah`, `Nama`) VALUES
(1,	'Jakarta'),
(3,	'Tangerang');

-- 2019-07-29 14:01:03
