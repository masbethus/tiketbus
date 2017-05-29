-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 23. Mei 2017 jam 03:59
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=979 ;

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
(976, 7, 1329, 'JKT-EXE', '4'),
(977, 9, 1330, 'JKT-BIS', '1'),
(978, 7, 1331, 'JKT-EXE', '5');

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
(10),
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=353 ;

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
('2017-05-16 11:43:47', '2017-05-09 09:45:26', '0073006500610074006D006100700020006B00790061006B00200067006D006E002C00200065006E007400690074006100730020006E007900200061006B0020006700200070006100680061006D', '+6282141705290', 'Default_No_Compression', '', '+62811078801', -1, 'seatmap kyak gmn, entitas ny ak g paham', 348, 'modem1', 'false'),
('2017-05-16 11:43:47', '2017-05-09 11:49:46', '004F0072006100200074007500730020006C00670020006C006F0072006F002000610071002C002000730073006B002000790065006E00200077006500730020006100770061006B00200071002000700065006E0061006B002C0020007200680069007300740079', '+6281224422871', 'Default_No_Compression', '', '+62811078801', -1, 'Ora tus lg loro aq, ssk yen wes awak q penak, rhisty', 349, 'modem1', 'false'),
('2017-05-16 11:43:47', '2017-05-09 12:51:24', '00530065006B002000730065006B002C00200069006E00690020007300690061007000610020007900610020003F00200047006B0020006B0065002000730061007600650020006400690020006B006F006E00740061006B0020006E0061006D0061006E00790061', '+6285786529943', 'Default_No_Compression', '', '+62816124', -1, 'Sek sek, ini siapa ya ? Gk ke save di kontak namanya', 350, 'modem1', 'false'),
('2017-05-11 07:04:48', '2017-05-07 17:29:09', '004A006B0074002D0062006900730023007300740061006E006C006500650023003000380032003100330038003400320034003700320030', '+6285715053497', 'Default_No_Compression', '', '+62816124', -1, 'Jkt-bis#stanlee#082138424720', 339, 'modem1', 'true'),
('2017-05-16 12:03:24', '2017-05-16 12:03:03', '004A006B0074002D0065007800650023006E006100740061006C006900610023003000380031003300320035003300330037003400380036', '+6285702413985', 'Default_No_Compression', '', '+62816124', -1, 'Jkt-exe#natalia#081325337486', 351, 'modem1', 'true'),
('2017-05-16 12:07:01', '2017-05-16 12:06:25', '004A006B0074002D0065007800650023006E006100740061006C006900610023003000380035003700300032003400310033003900380035', '+6285866402963', 'Default_No_Compression', '', '+62816124', -1, 'Jkt-exe#natalia#085702413985', 352, 'modem1', 'true');

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
(9, 'Albertus', 'bethus', '255a98cfbee414ebd9b21c2efc85dfd1', '2017-05-19'),
(10, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-05-22'),
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5608 ;

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
(0, '085786529943', '+6282136387230'),
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
('modem1', '2017-05-22 12:11:41', '2017-05-22 11:00:52', '2017-05-22 12:11:51', 'yes', 'yes', '865633012379576', 'Gammu 1.25.0, Windows Server 2007 SP1, GCC 4.3, MinGW 3.15', 0, 66, 0, 0);

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
-- Dumping data untuk tabel `sentitems`
--

INSERT INTO `sentitems` (`UpdatedInDB`, `InsertIntoDB`, `SendingDateTime`, `DeliveryDateTime`, `Text`, `DestinationNumber`, `Coding`, `UDH`, `SMSCNumber`, `Class`, `TextDecoded`, `ID`, `SenderID`, `SequencePosition`, `Status`, `StatusError`, `TPMR`, `RelativeValidity`, `CreatorID`) VALUES
('2017-05-16 12:07:34', '2017-05-16 12:07:01', '2017-05-16 12:07:34', NULL, '00500065006D006500730061006E0061006E002000540069006B00650074002C0020004E006F006D006F0072003A0020003000300031002C002000610074006100730020006E0061006D00610020004E004100540041004C00490041002C0020002000640065006E00670061006E0020004A00750072007500730061006E0020004A0041004B004100520054004100200042006500720068006100730069006C', '+6285866402963', 'Default_No_Compression', '', '+62816124', -1, 'Pemesanan Tiket, Nomor: 001, atas nama NATALIA,  dengan Jurusan JAKARTA Berhasil', 5306, 'modem1', 1, 'SendingOKNoReport', -1, 149, 255, 'Gammu'),
('2017-05-16 12:07:37', '2017-05-16 12:07:01', '2017-05-16 12:07:37', NULL, '0054006500720069006D00610020004B00610073006900680020004E004100540041004C00490041002C0020004E006F006D006F0072002000540069006B0065007400200041006E00640061003A005B003000300031005D002C0020004100670065006E0020006B00650062006500720061006E0067006B006100740061006E003A004B0061006E0074006F0072002000500075007300610074002C0020004A00750072007500730061006E0020004A0041004B0041005200540041002C00200075006E00740075006B00200069006E0066006F002000700065006D006500730061006E0061006E00200068007500620075006E00670069003A0020002B0036003200380035003800360036003400300032003900360033', '085702413985', 'Default_No_Compression', '', '+62816124', -1, 'Terima Kasih NATALIA, Nomor Tiket Anda:[001], Agen keberangkatan:Kantor Pusat, Jurusan JAKARTA, untuk info pemesanan hubungi: +6285866402963', 5307, 'modem1', 1, 'SendingOKNoReport', -1, 150, 255, 'Gammu');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1332 ;

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
(1329, 7, 'JKT-EXE', '063', 'RIFAI', '+6282141705290', 14, 11, '2017-05-08', '05:43:04', 'AKTIF', 180000),
(1330, 9, 'JKT-BIS', '031', 'STANLEE', '+6282138424720', 14, 10, '2017-05-11', '02:04:48', 'AKTIF', 115000),
(1331, 7, 'JKT-EXE', '001', 'NATALIA', '+6285702413985', 14, 13, '2017-05-16', '07:07:01', 'AKTIF', 180000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
