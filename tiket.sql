-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 09. Mei 2017 jam 18:45
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tiket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agen`
--

CREATE TABLE IF NOT EXISTS `agen` (
  `agen_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `kota` varchar(70) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `PIN` int(4) NOT NULL,
  PRIMARY KEY (`agen_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `agen`
--

INSERT INTO `agen` (`agen_id`, `nama`, `kota`, `no_hp`, `PIN`) VALUES
(12, 'Gilingan', 'Surakarta', '+6285866402974', 1234),
(10, 'Sragen Baru', 'Sragen', '+6285715053497', 1234),
(11, 'Giwangan', 'Jogjakarta', '+6285329755578', 1234),
(13, 'Kantor Pusat', 'KarangAnyar', '+6285866402963', 1234);

-- --------------------------------------------------------

--
-- Struktur dari tabel `balance`
--

CREATE TABLE IF NOT EXISTS `balance` (
  `id_stock` int(11) NOT NULL AUTO_INCREMENT,
  `agen_id` int(11) DEFAULT NULL,
  `kode_awal` varchar(10) DEFAULT NULL,
  `kode_akhir` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_stock`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `balance`
--

INSERT INTO `balance` (`id_stock`, `agen_id`, `kode_awal`, `kode_akhir`) VALUES
(8, 13, '001', '030'),
(9, 10, '031', '060'),
(10, 11, '061', '090'),
(12, 12, '091', '130');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daemons`
--

CREATE TABLE IF NOT EXISTS `daemons` (
  `Start` text NOT NULL,
  `Info` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kursi`
--

CREATE TABLE IF NOT EXISTS `detail_kursi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) DEFAULT NULL,
  `transaksi_id` int(11) DEFAULT NULL,
  `kode_tiket` varchar(30) DEFAULT NULL,
  `no_kursi` varchar(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=977 ;

--
-- Dumping data untuk tabel `detail_kursi`
--

INSERT INTO `detail_kursi` (`id`, `id_kelas`, `transaksi_id`, `kode_tiket`, `no_kursi`) VALUES
(969, 6, 1322, 'JKT-SUP', '1'),
(970, 7, 1323, 'JKT-EXE', '1'),
(971, 7, 1324, 'BTN-EXE', '2'),
(972, 7, 1325, 'PLB-EXE', '3'),
(973, 8, 1326, 'LAM-VIP', '1'),
(974, 6, 1327, 'JKT-SUP', '2'),
(975, 8, 1328, 'BTN-VIP', '2'),
(976, 7, 1329, 'JKT-EXE', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gammu`
--

CREATE TABLE IF NOT EXISTS `gammu` (
  `Version` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `gammu`
--

INSERT INTO `gammu` (`Version`) VALUES
(10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ReceivingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text NOT NULL,
  `SenderNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` varchar(160) NOT NULL DEFAULT '',
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `RecipientID` text NOT NULL,
  `Processed` enum('false','true') NOT NULL DEFAULT 'false',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=338 ;

--
-- Dumping data untuk tabel `inbox`
--

INSERT INTO `inbox` (`UpdatedInDB`, `ReceivingDateTime`, `Text`, `SenderNumber`, `Coding`, `UDH`, `SMSCNumber`, `Class`, `TextDecoded`, `ID`, `RecipientID`, `Processed`) VALUES
('2017-05-08 10:43:04', '2017-05-07 04:35:43', '004A006B0074002D007300750070002300610062006500740023003000380035003300320039003700350035003500370038', '+6285866402974', 'Default_No_Compression', '', '+62816124', -1, 'Jkt-sup#abet#085329755578', 319, 'modem1', 'true'),
('2017-05-08 10:43:04', '2017-05-07 04:39:19', '004A006B0074002D00650078006500230061006C00760069006E0023003000380032003300310034003800350033003400390039', '+6285866402974', 'Default_No_Compression', '', '+62816124', -1, 'Jkt-exe#alvin#082314853499', 320, 'modem1', 'true'),
('2017-05-08 10:43:04', '2017-05-07 04:40:58', '00420074006E002D006500780065002300620061006B007400690023003000380032003200320035003200330033003200330030', '+6285866402974', 'Default_No_Compression', '', '+62816124', -1, 'Btn-exe#bakti#082225233230', 321, 'modem1', 'true'),
('2017-05-08 10:43:04', '2017-05-07 04:42:25', '0050006C0062002D0065007800650023007600650072006F006E0069006300610023003000380035003700310035003000350033003400390037', '+6285866402974', 'Default_No_Compression', '', '+62816124', -1, 'Plb-exe#veronica#085715053497', 322, 'modem1', 'true'),
('2017-05-08 10:43:04', '2017-05-07 04:44:07', '004C0061006D002D007600690070002300720061006400690061006E002300300038003900380038003500350036003000310039', '+6285866402974', 'Default_No_Compression', '', '+62816124', -1, 'Lam-vip#radian#08988556019', 323, 'modem1', 'true'),
('2017-05-08 10:43:04', '2017-05-07 04:47:19', '004A006B0074002D007300750070002300520069006F0023002B003600320038003500360032003500320030003400330030', '+6285329755578', 'Default_No_Compression', '', '+62811078801', -1, 'Jkt-sup#Rio#+628562520430', 324, 'modem1', 'true'),
('2017-05-08 10:43:04', '2017-05-07 04:48:46', '00420074006E002D0076006900700023006100700072006900790061006E0074006F0023003000380035003700320035003000390039003800300033', '+6285329755578', 'Default_No_Compression', '', '+62811078801', -1, 'Btn-vip#apriyanto#085725099803', 325, 'modem1', 'true'),
('2017-05-08 10:43:04', '2017-05-07 04:49:58', '004A006B0074002D0065007800650023005200690066006100690023003000380032003100340031003700300035003200390030', '+6285329755578', 'Default_No_Compression', '', '+62811078801', -1, 'Jkt-exe#Rifai#082141705290', 326, 'modem1', 'true'),
('2017-05-07 04:56:44', '2017-05-07 04:56:10', '00540069006B0065007400200061007000610020007900610061002C0020007000650072006100730061006E00200074006900640061006B0020007000650072006E00610068002000200070006500730061006E002000740069006B0065007400200073006100790061002C002C0020002000640061006E0020006D006F0068006F006E0020006D0061006100660020006E0069002000730069006100700061002000790061003F', '+6282314853499', 'Default_No_Compression', '', '+62811078801', -1, 'Tiket apa yaa, perasan tidak pernah  pesan tiket saya,,  dan mohon maaf ni siapa ya?', 327, 'modem1', 'false'),
('2017-05-07 16:34:35', '2017-05-07 16:34:21', '0041006C00680061006D00640075006C0069006C006C006100680020006800690072006F00620069006C00200061006C0061006D0069006E0020006D0061007300690068002000640069002000700065007200680061007400690069006E006E006E', '+6285642272372', 'Default_No_Compression', '', '+62816124', -1, 'Alhamdulillah hirobil alamin masih di perhatiinnn', 337, 'modem1', 'false');

--
-- Trigger `inbox`
--
DROP TRIGGER IF EXISTS `inbox_timestamp`;
DELIMITER //
CREATE TRIGGER `inbox_timestamp` BEFORE INSERT ON `inbox`
 FOR EACH ROW BEGIN
    IF NEW.ReceivingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.ReceivingDateTime = CURRENT_TIMESTAMP();
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `jam_berangkat` time DEFAULT NULL,
  `jurusan` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `jam_berangkat`, `jurusan`) VALUES
(14, '16:30:00', 'JAKARTA'),
(15, '15:30:00', 'BANTEN'),
(16, '15:00:00', 'PALEMBANG'),
(17, '16:00:00', 'LAMPUNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(20) NOT NULL,
  `jumlah_kursi` int(3) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `jumlah_kursi`) VALUES
(7, 'Executive', 32),
(6, 'Super Executive', 22),
(8, 'VIP', 40),
(9, 'Bisnis', 49);

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator`
--

CREATE TABLE IF NOT EXISTS `operator` (
  `operator_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `last_login` date NOT NULL,
  PRIMARY KEY (`operator_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `operator`
--

INSERT INTO `operator` (`operator_id`, `nama_lengkap`, `username`, `password`, `last_login`) VALUES
(9, 'Albertus', 'bethus', '255a98cfbee414ebd9b21c2efc85dfd1', '2017-04-29'),
(10, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-05-08'),
(11, 'Mukidi', 'mukidi', '47b55511386d44681b64c36aaa7f5fe3', '2017-05-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `outbox`
--

CREATE TABLE IF NOT EXISTS `outbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` varchar(160) NOT NULL DEFAULT '',
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MultiPart` enum('false','true') DEFAULT 'false',
  `RelativeValidity` int(11) DEFAULT '-1',
  `SenderID` varchar(255) DEFAULT NULL,
  `SendingTimeOut` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryReport` enum('default','yes','no') DEFAULT 'default',
  `CreatorID` text NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `outbox_date` (`SendingDateTime`,`SendingTimeOut`),
  KEY `outbox_sender` (`SenderID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5003 ;

--
-- Trigger `outbox`
--
DROP TRIGGER IF EXISTS `outbox_timestamp`;
DELIMITER //
CREATE TRIGGER `outbox_timestamp` BEFORE INSERT ON `outbox`
 FOR EACH ROW BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.SendingDateTime = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingTimeOut = '0000-00-00 00:00:00' THEN
        SET NEW.SendingTimeOut = CURRENT_TIMESTAMP();
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `outbox_multipart`
--

CREATE TABLE IF NOT EXISTS `outbox_multipart` (
  `Text` text,
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` varchar(160) DEFAULT NULL,
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`,`SequencePosition`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `outbox_multipart`
--

INSERT INTO `outbox_multipart` (`Text`, `Coding`, `UDH`, `Class`, `TextDecoded`, `ID`, `SequencePosition`) VALUES
(NULL, 'Default_No_Compression', '050003240202', -1, ' +6285866402963', 0, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pbk`
--

CREATE TABLE IF NOT EXISTS `pbk` (
  `GroupID` int(11) NOT NULL DEFAULT '-1',
  `Name` text NOT NULL,
  `Number` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pbk`
--

INSERT INTO `pbk` (`GroupID`, `Name`, `Number`) VALUES
(1230, 'RADIAN', '+628988556019'),
(564, 'BETUS', '+6282136387230'),
(0, '085786529943', '+6282136387230');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pbk_groups`
--

CREATE TABLE IF NOT EXISTS `pbk_groups` (
  `Name` text NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `phones`
--

CREATE TABLE IF NOT EXISTS `phones` (
  `ID` text NOT NULL,
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TimeOut` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Send` enum('yes','no') NOT NULL DEFAULT 'no',
  `Receive` enum('yes','no') NOT NULL DEFAULT 'no',
  `IMEI` varchar(35) NOT NULL,
  `Client` text NOT NULL,
  `Battery` int(11) NOT NULL DEFAULT '0',
  `Signal` int(11) NOT NULL DEFAULT '0',
  `Sent` int(11) NOT NULL DEFAULT '0',
  `Received` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IMEI`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `phones`
--

INSERT INTO `phones` (`ID`, `UpdatedInDB`, `InsertIntoDB`, `TimeOut`, `Send`, `Receive`, `IMEI`, `Client`, `Battery`, `Signal`, `Sent`, `Received`) VALUES
('modem1', '2017-05-08 15:21:17', '2017-05-08 14:48:33', '2017-05-08 15:21:27', 'yes', 'yes', '865633012379576', 'Gammu 1.25.0, Windows Server 2007 SP1, GCC 4.3, MinGW 3.15', 0, 54, 433, 0);

--
-- Trigger `phones`
--
DROP TRIGGER IF EXISTS `phones_timestamp`;
DELIMITER //
CREATE TRIGGER `phones_timestamp` BEFORE INSERT ON `phones`
 FOR EACH ROW BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.TimeOut = '0000-00-00 00:00:00' THEN
        SET NEW.TimeOut = CURRENT_TIMESTAMP();
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sentitems`
--

CREATE TABLE IF NOT EXISTS `sentitems` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryDateTime` timestamp NULL DEFAULT NULL,
  `Text` text NOT NULL,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` varchar(160) NOT NULL DEFAULT '',
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SenderID` varchar(255) NOT NULL,
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error') NOT NULL DEFAULT 'SendingOK',
  `StatusError` int(11) NOT NULL DEFAULT '-1',
  `TPMR` int(11) NOT NULL DEFAULT '-1',
  `RelativeValidity` int(11) NOT NULL DEFAULT '-1',
  `CreatorID` text NOT NULL,
  PRIMARY KEY (`ID`,`SequencePosition`),
  KEY `sentitems_date` (`DeliveryDateTime`),
  KEY `sentitems_tpmr` (`TPMR`),
  KEY `sentitems_dest` (`DestinationNumber`),
  KEY `sentitems_sender` (`SenderID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Trigger `sentitems`
--
DROP TRIGGER IF EXISTS `sentitems_timestamp`;
DELIMITER //
CREATE TRIGGER `sentitems_timestamp` BEFORE INSERT ON `sentitems`
 FOR EACH ROW BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.SendingDateTime = CURRENT_TIMESTAMP();
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE IF NOT EXISTS `tiket` (
  `id_tiket` int(11) NOT NULL AUTO_INCREMENT,
  `kode_tiket` varchar(30) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `harga` int(12) NOT NULL,
  `jenis_tiket` enum('0','1') NOT NULL,
  PRIMARY KEY (`id_tiket`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `kode_tiket`, `id_kelas`, `id_jadwal`, `harga`, `jenis_tiket`) VALUES
(22, 'JKT-SUP', 6, 14, 265000, '1'),
(23, 'JKT-EXE', 7, 14, 180000, '1'),
(24, 'JKT-VIP', 8, 14, 160000, '1'),
(25, 'JKT-BIS', 9, 14, 115000, '0'),
(26, 'LAM-VIP', 8, 17, 385000, '1'),
(27, 'BTN-EXE', 7, 15, 200000, '1'),
(28, 'BTN-VIP', 8, 15, 175000, '1'),
(29, 'PLB-EXE', 7, 16, 470000, '1'),
(30, 'PLB-VIP', 8, 16, 415000, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `transaksi_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) NOT NULL,
  `kode_tiket` varchar(10) NOT NULL,
  `no_tiket` varchar(13) NOT NULL,
  `nama_pelanggan` varchar(40) NOT NULL,
  `nohp_pelanggan` varchar(15) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_agen` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jam_transaksi` time NOT NULL,
  `status` enum('BATAL','AKTIF') NOT NULL DEFAULT 'AKTIF',
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`transaksi_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1330 ;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `id_kelas`, `kode_tiket`, `no_tiket`, `nama_pelanggan`, `nohp_pelanggan`, `id_jadwal`, `id_agen`, `tgl_transaksi`, `jam_transaksi`, `status`, `harga`) VALUES
(1322, 6, 'JKT-SUP', '091', 'ABET', '+6285329755578', 14, 12, '2017-05-08', '05:43:04', 'AKTIF', 265000),
(1323, 7, 'JKT-EXE', '092', 'ALVIN', '+6282314853499', 14, 12, '2017-05-08', '05:43:04', 'AKTIF', 180000),
(1324, 7, 'BTN-EXE', '093', 'BAKTI', '+6282225233230', 15, 12, '2017-05-08', '05:43:04', 'AKTIF', 200000),
(1325, 7, 'PLB-EXE', '094', 'VERONICA', '+6285715053497', 16, 12, '2017-05-08', '05:43:04', 'AKTIF', 470000),
(1326, 8, 'LAM-VIP', '095', 'RADIAN', '+628988556019', 17, 12, '2017-05-08', '05:43:04', 'AKTIF', 385000),
(1327, 6, 'JKT-SUP', '061', 'RIO', '+628562520430', 14, 11, '2017-05-08', '05:43:04', 'AKTIF', 265000),
(1328, 8, 'BTN-VIP', '062', 'APRIYANTO', '+6285725099803', 15, 11, '2017-05-08', '05:43:04', 'AKTIF', 175000),
(1329, 7, 'JKT-EXE', '063', 'RIFAI', '+6282141705290', 14, 11, '2017-05-08', '05:43:04', 'AKTIF', 180000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
