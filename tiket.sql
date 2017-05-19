/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : 127.0.0.1:3306
Source Database       : tiket

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2017-05-17 02:10:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for agen
-- ----------------------------
DROP TABLE IF EXISTS `agen`;
CREATE TABLE `agen` (
  `agen_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `kota` varchar(70) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `PIN` int(4) NOT NULL,
  PRIMARY KEY (`agen_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of agen
-- ----------------------------
INSERT INTO `agen` VALUES ('14', 'Sambi Pitu', 'Jogjakarta', '+6285702413985', '1234');
INSERT INTO `agen` VALUES ('12', 'Gilingan', 'Surakarta', '+6285866402974', '1234');
INSERT INTO `agen` VALUES ('10', 'Sragen Baru', 'Sragen', '+6285715053497', '1234');
INSERT INTO `agen` VALUES ('11', 'Giwangan', 'Jogjakarta', '+6285329755578', '1234');
INSERT INTO `agen` VALUES ('13', 'Kantor Pusat', 'KarangAnyar', '+6285866402963', '1234');

-- ----------------------------
-- Table structure for balance
-- ----------------------------
DROP TABLE IF EXISTS `balance`;
CREATE TABLE `balance` (
  `id_stock` int(11) NOT NULL AUTO_INCREMENT,
  `agen_id` int(11) DEFAULT NULL,
  `kode_awal` varchar(10) DEFAULT NULL,
  `kode_akhir` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_stock`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of balance
-- ----------------------------
INSERT INTO `balance` VALUES ('8', '13', '001', '030');
INSERT INTO `balance` VALUES ('9', '10', '031', '060');
INSERT INTO `balance` VALUES ('10', '11', '061', '090');
INSERT INTO `balance` VALUES ('13', '14', '131', '150');
INSERT INTO `balance` VALUES ('12', '12', '091', '130');

-- ----------------------------
-- Table structure for daemons
-- ----------------------------
DROP TABLE IF EXISTS `daemons`;
CREATE TABLE `daemons` (
  `Start` text NOT NULL,
  `Info` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of daemons
-- ----------------------------

-- ----------------------------
-- Table structure for detail_kursi
-- ----------------------------
DROP TABLE IF EXISTS `detail_kursi`;
CREATE TABLE `detail_kursi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) DEFAULT NULL,
  `transaksi_id` int(11) DEFAULT NULL,
  `kode_tiket` varchar(30) DEFAULT NULL,
  `no_kursi` varchar(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=979 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detail_kursi
-- ----------------------------
INSERT INTO `detail_kursi` VALUES ('969', '6', '1322', 'JKT-SUP', '1');
INSERT INTO `detail_kursi` VALUES ('970', '7', '1323', 'JKT-EXE', '1');
INSERT INTO `detail_kursi` VALUES ('971', '7', '1324', 'BTN-EXE', '2');
INSERT INTO `detail_kursi` VALUES ('972', '7', '1325', 'PLB-EXE', '3');
INSERT INTO `detail_kursi` VALUES ('973', '8', '1326', 'LAM-VIP', '1');
INSERT INTO `detail_kursi` VALUES ('974', '6', '1327', 'JKT-SUP', '2');
INSERT INTO `detail_kursi` VALUES ('975', '8', '1328', 'BTN-VIP', '2');
INSERT INTO `detail_kursi` VALUES ('976', '7', '1329', 'JKT-EXE', '4');
INSERT INTO `detail_kursi` VALUES ('977', '9', '1330', 'JKT-BIS', '1');
INSERT INTO `detail_kursi` VALUES ('978', '7', '1331', 'JKT-EXE', '5');

-- ----------------------------
-- Table structure for gammu
-- ----------------------------
DROP TABLE IF EXISTS `gammu`;
CREATE TABLE `gammu` (
  `Version` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gammu
-- ----------------------------
INSERT INTO `gammu` VALUES ('10');
INSERT INTO `gammu` VALUES ('10');

-- ----------------------------
-- Table structure for inbox
-- ----------------------------
DROP TABLE IF EXISTS `inbox`;
CREATE TABLE `inbox` (
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
) ENGINE=MyISAM AUTO_INCREMENT=353 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of inbox
-- ----------------------------
INSERT INTO `inbox` VALUES ('2017-05-08 17:43:04', '2017-05-07 11:35:43', '004A006B0074002D007300750070002300610062006500740023003000380035003300320039003700350035003500370038', '+6285866402974', 'Default_No_Compression', '', '+62816124', '-1', 'Jkt-sup#abet#085329755578', '319', 'modem1', 'true');
INSERT INTO `inbox` VALUES ('2017-05-08 17:43:04', '2017-05-07 11:39:19', '004A006B0074002D00650078006500230061006C00760069006E0023003000380032003300310034003800350033003400390039', '+6285866402974', 'Default_No_Compression', '', '+62816124', '-1', 'Jkt-exe#alvin#082314853499', '320', 'modem1', 'true');
INSERT INTO `inbox` VALUES ('2017-05-08 17:43:04', '2017-05-07 11:40:58', '00420074006E002D006500780065002300620061006B007400690023003000380032003200320035003200330033003200330030', '+6285866402974', 'Default_No_Compression', '', '+62816124', '-1', 'Btn-exe#bakti#082225233230', '321', 'modem1', 'true');
INSERT INTO `inbox` VALUES ('2017-05-08 17:43:04', '2017-05-07 11:42:25', '0050006C0062002D0065007800650023007600650072006F006E0069006300610023003000380035003700310035003000350033003400390037', '+6285866402974', 'Default_No_Compression', '', '+62816124', '-1', 'Plb-exe#veronica#085715053497', '322', 'modem1', 'true');
INSERT INTO `inbox` VALUES ('2017-05-08 17:43:04', '2017-05-07 11:44:07', '004C0061006D002D007600690070002300720061006400690061006E002300300038003900380038003500350036003000310039', '+6285866402974', 'Default_No_Compression', '', '+62816124', '-1', 'Lam-vip#radian#08988556019', '323', 'modem1', 'true');
INSERT INTO `inbox` VALUES ('2017-05-08 17:43:04', '2017-05-07 11:47:19', '004A006B0074002D007300750070002300520069006F0023002B003600320038003500360032003500320030003400330030', '+6285329755578', 'Default_No_Compression', '', '+62811078801', '-1', 'Jkt-sup#Rio#+628562520430', '324', 'modem1', 'true');
INSERT INTO `inbox` VALUES ('2017-05-08 17:43:04', '2017-05-07 11:48:46', '00420074006E002D0076006900700023006100700072006900790061006E0074006F0023003000380035003700320035003000390039003800300033', '+6285329755578', 'Default_No_Compression', '', '+62811078801', '-1', 'Btn-vip#apriyanto#085725099803', '325', 'modem1', 'true');
INSERT INTO `inbox` VALUES ('2017-05-08 17:43:04', '2017-05-07 11:49:58', '004A006B0074002D0065007800650023005200690066006100690023003000380032003100340031003700300035003200390030', '+6285329755578', 'Default_No_Compression', '', '+62811078801', '-1', 'Jkt-exe#Rifai#082141705290', '326', 'modem1', 'true');
INSERT INTO `inbox` VALUES ('2017-05-16 18:43:47', '2017-05-09 16:45:26', '0073006500610074006D006100700020006B00790061006B00200067006D006E002C00200065006E007400690074006100730020006E007900200061006B0020006700200070006100680061006D', '+6282141705290', 'Default_No_Compression', '', '+62811078801', '-1', 'seatmap kyak gmn, entitas ny ak g paham', '348', 'modem1', 'false');
INSERT INTO `inbox` VALUES ('2017-05-16 18:43:47', '2017-05-09 18:49:46', '004F0072006100200074007500730020006C00670020006C006F0072006F002000610071002C002000730073006B002000790065006E00200077006500730020006100770061006B00200071002000700065006E0061006B002C0020007200680069007300740079', '+6281224422871', 'Default_No_Compression', '', '+62811078801', '-1', 'Ora tus lg loro aq, ssk yen wes awak q penak, rhisty', '349', 'modem1', 'false');
INSERT INTO `inbox` VALUES ('2017-05-16 18:43:47', '2017-05-09 19:51:24', '00530065006B002000730065006B002C00200069006E00690020007300690061007000610020007900610020003F00200047006B0020006B0065002000730061007600650020006400690020006B006F006E00740061006B0020006E0061006D0061006E00790061', '+6285786529943', 'Default_No_Compression', '', '+62816124', '-1', 'Sek sek, ini siapa ya ? Gk ke save di kontak namanya', '350', 'modem1', 'false');
INSERT INTO `inbox` VALUES ('2017-05-11 14:04:48', '2017-05-08 00:29:09', '004A006B0074002D0062006900730023007300740061006E006C006500650023003000380032003100330038003400320034003700320030', '+6285715053497', 'Default_No_Compression', '', '+62816124', '-1', 'Jkt-bis#stanlee#082138424720', '339', 'modem1', 'true');
INSERT INTO `inbox` VALUES ('2017-05-16 19:03:24', '2017-05-16 19:03:03', '004A006B0074002D0065007800650023006E006100740061006C006900610023003000380031003300320035003300330037003400380036', '+6285702413985', 'Default_No_Compression', '', '+62816124', '-1', 'Jkt-exe#natalia#081325337486', '351', 'modem1', 'true');
INSERT INTO `inbox` VALUES ('2017-05-16 19:07:01', '2017-05-16 19:06:25', '004A006B0074002D0065007800650023006E006100740061006C006900610023003000380035003700300032003400310033003900380035', '+6285866402963', 'Default_No_Compression', '', '+62816124', '-1', 'Jkt-exe#natalia#085702413985', '352', 'modem1', 'true');

-- ----------------------------
-- Table structure for jadwal
-- ----------------------------
DROP TABLE IF EXISTS `jadwal`;
CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `jam_berangkat` time DEFAULT NULL,
  `jurusan` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jadwal
-- ----------------------------
INSERT INTO `jadwal` VALUES ('14', '16:30:00', 'JAKARTA');
INSERT INTO `jadwal` VALUES ('15', '15:30:00', 'BANTEN');
INSERT INTO `jadwal` VALUES ('16', '15:00:00', 'PALEMBANG');
INSERT INTO `jadwal` VALUES ('17', '16:00:00', 'LAMPUNG');

-- ----------------------------
-- Table structure for kelas
-- ----------------------------
DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(20) NOT NULL,
  `jumlah_kursi` int(3) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kelas
-- ----------------------------
INSERT INTO `kelas` VALUES ('7', 'Executive', '32');
INSERT INTO `kelas` VALUES ('6', 'Super Executive', '22');
INSERT INTO `kelas` VALUES ('8', 'VIP', '40');
INSERT INTO `kelas` VALUES ('9', 'Bisnis', '49');

-- ----------------------------
-- Table structure for operator
-- ----------------------------
DROP TABLE IF EXISTS `operator`;
CREATE TABLE `operator` (
  `operator_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `last_login` date NOT NULL,
  PRIMARY KEY (`operator_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of operator
-- ----------------------------
INSERT INTO `operator` VALUES ('9', 'Albertus', 'bethus', '255a98cfbee414ebd9b21c2efc85dfd1', '2017-05-10');
INSERT INTO `operator` VALUES ('10', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-05-16');
INSERT INTO `operator` VALUES ('11', 'Mukidi', 'mukidi', '47b55511386d44681b64c36aaa7f5fe3', '2017-05-02');

-- ----------------------------
-- Table structure for outbox
-- ----------------------------
DROP TABLE IF EXISTS `outbox`;
CREATE TABLE `outbox` (
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
) ENGINE=MyISAM AUTO_INCREMENT=5608 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of outbox
-- ----------------------------

-- ----------------------------
-- Table structure for outbox_multipart
-- ----------------------------
DROP TABLE IF EXISTS `outbox_multipart`;
CREATE TABLE `outbox_multipart` (
  `Text` text,
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` varchar(160) DEFAULT NULL,
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`,`SequencePosition`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of outbox_multipart
-- ----------------------------
INSERT INTO `outbox_multipart` VALUES (null, 'Default_No_Compression', '050003240202', '-1', ' +6285866402963', '0', '2');

-- ----------------------------
-- Table structure for pbk
-- ----------------------------
DROP TABLE IF EXISTS `pbk`;
CREATE TABLE `pbk` (
  `GroupID` int(11) NOT NULL DEFAULT '-1',
  `Name` text NOT NULL,
  `Number` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pbk
-- ----------------------------
INSERT INTO `pbk` VALUES ('1230', 'RADIAN', '+628988556019');
INSERT INTO `pbk` VALUES ('564', 'BETUS', '+6282136387230');
INSERT INTO `pbk` VALUES ('0', '085786529943', '+6282136387230');
INSERT INTO `pbk` VALUES ('1230', 'RADIAN', '+628988556019');
INSERT INTO `pbk` VALUES ('564', 'BETUS', '+6282136387230');
INSERT INTO `pbk` VALUES ('0', '085786529943', '+6282136387230');

-- ----------------------------
-- Table structure for pbk_groups
-- ----------------------------
DROP TABLE IF EXISTS `pbk_groups`;
CREATE TABLE `pbk_groups` (
  `Name` text NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pbk_groups
-- ----------------------------

-- ----------------------------
-- Table structure for phones
-- ----------------------------
DROP TABLE IF EXISTS `phones`;
CREATE TABLE `phones` (
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

-- ----------------------------
-- Records of phones
-- ----------------------------
INSERT INTO `phones` VALUES ('modem1', '2017-05-16 22:46:31', '2017-05-16 18:43:46', '2017-05-16 22:46:41', 'yes', 'yes', '865633012379576', 'Gammu 1.25.0, Windows Server 2007 SP1, GCC 4.3, MinGW 3.15', '0', '51', '142', '5');

-- ----------------------------
-- Table structure for sentitems
-- ----------------------------
DROP TABLE IF EXISTS `sentitems`;
CREATE TABLE `sentitems` (
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

-- ----------------------------
-- Records of sentitems
-- ----------------------------
INSERT INTO `sentitems` VALUES ('2017-05-16 19:07:34', '2017-05-16 19:07:01', '2017-05-16 19:07:34', null, '00500065006D006500730061006E0061006E002000540069006B00650074002C0020004E006F006D006F0072003A0020003000300031002C002000610074006100730020006E0061006D00610020004E004100540041004C00490041002C0020002000640065006E00670061006E0020004A00750072007500730061006E0020004A0041004B004100520054004100200042006500720068006100730069006C', '+6285866402963', 'Default_No_Compression', '', '+62816124', '-1', 'Pemesanan Tiket, Nomor: 001, atas nama NATALIA,  dengan Jurusan JAKARTA Berhasil', '5306', 'modem1', '1', 'SendingOKNoReport', '-1', '149', '255', 'Gammu');
INSERT INTO `sentitems` VALUES ('2017-05-16 19:07:37', '2017-05-16 19:07:01', '2017-05-16 19:07:37', null, '0054006500720069006D00610020004B00610073006900680020004E004100540041004C00490041002C0020004E006F006D006F0072002000540069006B0065007400200041006E00640061003A005B003000300031005D002C0020004100670065006E0020006B00650062006500720061006E0067006B006100740061006E003A004B0061006E0074006F0072002000500075007300610074002C0020004A00750072007500730061006E0020004A0041004B0041005200540041002C00200075006E00740075006B00200069006E0066006F002000700065006D006500730061006E0061006E00200068007500620075006E00670069003A0020002B0036003200380035003800360036003400300032003900360033', '085702413985', 'Default_No_Compression', '', '+62816124', '-1', 'Terima Kasih NATALIA, Nomor Tiket Anda:[001], Agen keberangkatan:Kantor Pusat, Jurusan JAKARTA, untuk info pemesanan hubungi: +6285866402963', '5307', 'modem1', '1', 'SendingOKNoReport', '-1', '150', '255', 'Gammu');

-- ----------------------------
-- Table structure for tiket
-- ----------------------------
DROP TABLE IF EXISTS `tiket`;
CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL AUTO_INCREMENT,
  `kode_tiket` varchar(30) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `harga` int(12) NOT NULL,
  `jenis_tiket` enum('0','1') NOT NULL,
  PRIMARY KEY (`id_tiket`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tiket
-- ----------------------------
INSERT INTO `tiket` VALUES ('22', 'JKT-SUP', '6', '14', '265000', '1');
INSERT INTO `tiket` VALUES ('23', 'JKT-EXE', '7', '14', '180000', '1');
INSERT INTO `tiket` VALUES ('24', 'JKT-VIP', '8', '14', '160000', '1');
INSERT INTO `tiket` VALUES ('25', 'JKT-BIS', '9', '14', '115000', '0');
INSERT INTO `tiket` VALUES ('26', 'LAM-VIP', '8', '17', '385000', '1');
INSERT INTO `tiket` VALUES ('27', 'BTN-EXE', '7', '15', '200000', '1');
INSERT INTO `tiket` VALUES ('28', 'BTN-VIP', '8', '15', '175000', '1');
INSERT INTO `tiket` VALUES ('29', 'PLB-EXE', '7', '16', '470000', '1');
INSERT INTO `tiket` VALUES ('30', 'PLB-VIP', '8', '16', '415000', '1');

-- ----------------------------
-- Table structure for transaksi
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
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
) ENGINE=MyISAM AUTO_INCREMENT=1332 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of transaksi
-- ----------------------------
INSERT INTO `transaksi` VALUES ('1322', '6', 'JKT-SUP', '091', 'ABET', '+6285329755578', '14', '12', '2017-05-08', '05:43:04', 'AKTIF', '265000');
INSERT INTO `transaksi` VALUES ('1323', '7', 'JKT-EXE', '092', 'ALVIN', '+6282314853499', '14', '12', '2017-05-08', '05:43:04', 'AKTIF', '180000');
INSERT INTO `transaksi` VALUES ('1324', '7', 'BTN-EXE', '093', 'BAKTI', '+6282225233230', '15', '12', '2017-05-08', '05:43:04', 'AKTIF', '200000');
INSERT INTO `transaksi` VALUES ('1325', '7', 'PLB-EXE', '094', 'VERONICA', '+6285715053497', '16', '12', '2017-05-08', '05:43:04', 'AKTIF', '470000');
INSERT INTO `transaksi` VALUES ('1326', '8', 'LAM-VIP', '095', 'RADIAN', '+628988556019', '17', '12', '2017-05-08', '05:43:04', 'AKTIF', '385000');
INSERT INTO `transaksi` VALUES ('1327', '6', 'JKT-SUP', '061', 'RIO', '+628562520430', '14', '11', '2017-05-08', '05:43:04', 'AKTIF', '265000');
INSERT INTO `transaksi` VALUES ('1328', '8', 'BTN-VIP', '062', 'APRIYANTO', '+6285725099803', '15', '11', '2017-05-08', '05:43:04', 'AKTIF', '175000');
INSERT INTO `transaksi` VALUES ('1329', '7', 'JKT-EXE', '063', 'RIFAI', '+6282141705290', '14', '11', '2017-05-08', '05:43:04', 'AKTIF', '180000');
INSERT INTO `transaksi` VALUES ('1330', '9', 'JKT-BIS', '031', 'STANLEE', '+6282138424720', '14', '10', '2017-05-11', '02:04:48', 'AKTIF', '115000');
INSERT INTO `transaksi` VALUES ('1331', '7', 'JKT-EXE', '001', 'NATALIA', '+6285702413985', '14', '13', '2017-05-16', '07:07:01', 'AKTIF', '180000');
DROP TRIGGER IF EXISTS `inbox_timestamp`;
DELIMITER ;;
CREATE TRIGGER `inbox_timestamp` BEFORE INSERT ON `inbox` FOR EACH ROW BEGIN
    IF NEW.ReceivingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.ReceivingDateTime = CURRENT_TIMESTAMP();
    END IF;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `outbox_timestamp`;
DELIMITER ;;
CREATE TRIGGER `outbox_timestamp` BEFORE INSERT ON `outbox` FOR EACH ROW BEGIN
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
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `phones_timestamp`;
DELIMITER ;;
CREATE TRIGGER `phones_timestamp` BEFORE INSERT ON `phones` FOR EACH ROW BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.TimeOut = '0000-00-00 00:00:00' THEN
        SET NEW.TimeOut = CURRENT_TIMESTAMP();
    END IF;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `sentitems_timestamp`;
DELIMITER ;;
CREATE TRIGGER `sentitems_timestamp` BEFORE INSERT ON `sentitems` FOR EACH ROW BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.SendingDateTime = CURRENT_TIMESTAMP();
    END IF;
END
;;
DELIMITER ;
