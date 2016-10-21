/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50516
Source Host           : 127.0.0.1:3306
Source Database       : db_ikati

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2014-06-23 14:06:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for angkatan
-- ----------------------------
DROP TABLE IF EXISTS `angkatan`;
CREATE TABLE `angkatan` (
  `no` int(2) NOT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of angkatan
-- ----------------------------
INSERT INTO `angkatan` VALUES ('1', '2007');
INSERT INTO `angkatan` VALUES ('2', '2008');
INSERT INTO `angkatan` VALUES ('3', '2009');
INSERT INTO `angkatan` VALUES ('4', '2010');
INSERT INTO `angkatan` VALUES ('5', '2011');
INSERT INTO `angkatan` VALUES ('6', '2012');
INSERT INTO `angkatan` VALUES ('7', '2013');
INSERT INTO `angkatan` VALUES ('8', '2014');

-- ----------------------------
-- Table structure for tbl_alumni
-- ----------------------------
DROP TABLE IF EXISTS `tbl_alumni`;
CREATE TABLE `tbl_alumni` (
  `no_alumni` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `jk` int(11) NOT NULL,
  `angkatan` year(4) NOT NULL,
  `ipk` float NOT NULL,
  `tl` year(4) NOT NULL,
  `thnbkrj` year(4) NOT NULL,
  `tb` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `is_isi` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`no_alumni`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_alumni
-- ----------------------------
INSERT INTO `tbl_alumni` VALUES ('1', 'YUDI DARMAWAN', '1', '2007', '3.04861', '2011', '2000', 'on process', 'JL. KARYA TANI GANG KE 2 NO 3 MEDAN', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('2', 'AGUSTINA MANURUNG', '2', '2007', '3.36111', '2011', '2000', 'on process', 'JL.JAMIN GINTING GG.DIPANEGARA 21 MEDAN', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('3', 'NURUL HAYATI', '2', '2007', '3.30208', '2011', '2000', 'on process', 'JL. SIGLI NO.3 Medan 20214', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('4', 'SABRINA PRATIWI', '2', '2007', '3.44792', '2011', '2000', 'on process', 'JL TURI UJUNG GANG PEMILU NO 6 MEDAN', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('5', 'ANDRENI M G', '2', '2007', '3.35069', '2011', '2000', 'on process', 'JL. FLAMBOYAN RAYA GG.KERJA SAMA NO.2 TANJUNG SELAMAT', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('6', 'MARISCHA ELVENY', '2', '2007', '3.27778', '2011', '2000', 'on process', 'JL KARYA JAYA GG EKA WAHID NO 12 MEDAN', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('7', 'ADINDA RENY S', '2', '2007', '2.98', '2012', '2000', 'on process', 'JL. DAMAR GG SUBUR 18 SEKIP MEDAN\n', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('8', 'MUHAMMAD ROMY ELMACO', '1', '2007', '3.42', '2012', '2000', 'on process', 'JALAN KARYA KASIH KOMPLEK PONDOK KARYA PRIMA INDAH BLOK A NO.6', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('9', 'VASKO EDO GULTOM', '1', '2007', '3.0625', '2012', '2000', 'on process', 'JL.AMPERA NO.1-J GLUGUR DARAT 2 KEC. MEDAN TIMUR\nPROVINSI SUMATERA UTARA\n -20238-', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('10', 'ANNA KESUMA DAULAY', '2', '2007', '3.27431', '2012', '2000', 'on process', 'JALAN SEI PADANG GANG BERKAH NO.15', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('11', 'KARINA LOLO MANIK', '2', '2007', '3.10069', '2012', '2000', 'on process', 'Jl.Murai 2 No.61 P.Mandala Medan', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('12', 'MASPIN SAHPUTRA', '1', '2007', '3.34722', '2012', '2000', 'on process', 'JL.B.Z.HAMID GG.RAHMAD NO.08', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('13', 'NURLAILATUSSIFAH S', '2', '2007', '2.89236', '2012', '2000', 'on process', 'JL RAYA MENTENG GG ABADI NO 18 MEDAN 20228', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('14', 'TIKA YUNITA', '2', '2007', '3.10764', '2012', '2000', 'on process', 'Jalan Medan - Batang Kuis Dusun 3 Desa Sei Rotan\nKEC. Percut Sei Tuan', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('15', 'SYAHFITRI KARTIKA LIDYA', '2', '2008', '3.46181', '2012', '2000', 'on process', 'JL DENAI JERMAL V NO.15 MEDAN', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('16', 'ISHRI IFDHILLAH MARBUN', '2', '2008', '3.60069', '2012', '2000', 'on process', 'MENTENG INDAH VI G BLOK. D7 NO 24', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('17', 'STEFFI ANDINA SEBAYANG', '2', '2007', '3.19097', '2012', '2000', 'on process', 'JLN SETIA BUDI PSR 1 KOMP PERTAMBANGAN NO 294-G, TJ SARI MEDAN', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('18', 'ERLIN UMAR DANI', '1', '2007', '3.01736', '2012', '2000', 'on process', 'JL. MEDAN AREA SELATAN GG. PEGANGSAAN NO. 5A', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('19', 'ITA DENISKA SIMAMORA', '2', '2007', '3.35069', '2012', '2000', 'on process', 'Jln Jamin Ginting No.98 P.Bulan Medan', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('20', 'ADFRIANSYAH', '1', '2007', '3.10764', '2012', '2000', 'on process', 'JL STM/SUKA IKHLASH NO 13 MEDAN', 'on process', '0', '1');
INSERT INTO `tbl_alumni` VALUES ('21', 'ARDANI DWI ATMOJO', '1', '2007', '3.27778', '2012', '2000', 'on process', 'ASRAMA SINGGASANA I/BB. JALAN SUMPAH PRAJURIT NO. 205. MEDAN-SUNGGAL.', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('22', 'RIDHA APRIANI', '2', '2007', '3.35417', '2012', '2000', 'on process', 'JLN. PINTU AIR IV KOMP. POLITEKNIK NO.23 MEDAN', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('23', 'POLIN SAUT P P', '1', '2007', '3.11458', '2012', '2000', 'on process', 'JALAN KARYA JAYA NO 31', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('24', 'KHAIRUNNISA', '2', '2007', '3.56597', '2012', '2000', 'on process', 'JL. IR. H. JUANDA NO. 38', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('25', 'MUHAMMAD REZA', '1', '2007', '3.05556', '2012', '2000', 'on process', 'JL.PROF T ZULKARNAIN NO.1/12 KOMP. USU MEDAN', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('26', 'M AZWAR ZULMI', '1', '2007', '3.09028', '2012', '2000', 'on process', 'JALAN. TAPIAN NAULI NO : 21 MEDAN', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('27', 'INDRA AULIA', '1', '2008', '3.56944', '2012', '2000', 'on process', 'JL DURUNG NO.140 MDN', 'on process', '0', '1');
INSERT INTO `tbl_alumni` VALUES ('28', 'MASYITA OKTAVIANI', '2', '2007', '3.09507', '2012', '2000', 'on process', 'JL.GURILLA GG,KASRAN NO.2 MEDAN', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('29', 'MAUZA SAPUTRI HANDAYANI', '2', '2008', '3.35417', '2012', '2000', 'on process', 'JL LETTERPRES NO. 34 MEDAN', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('30', 'HASNUL ARIEF FIKRI', '1', '2008', '3.39583', '2012', '2000', 'on process', 'JL. RAYA MENTENG G. BUDI NO. 22', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('31', 'ANANDIA ZELVINA', '2', '2007', '2.89236', '2012', '2000', 'on process', 'JL. TEH RAYA NO. 2 P. SIMALINGKAR MEDAN', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('32', 'AMINAH RIZKI LUBIS', '2', '2007', '2.6875', '2012', '2000', 'on process', 'JL.SETIA BUDI PSR II GG.BERLIAN NO.18, TJ.SARI,MEDAN', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('33', 'JHONI VERLANDO PURBA', '1', '2008', '3.10417', '2012', '2000', 'on process', 'SETIA WARGA NO 70 AEK NABARA', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('34', 'IKA HASNITA TANJUNG', '2', '2008', '3.34375', '2012', '2000', 'on process', 'JL SRIKANDI NO 110 P BATU', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('35', 'BAMBANG K', '1', '2007', '2.96875', '2012', '2000', 'on process', 'JL TEUKU CIK DITIRO NO 52 MEDAN', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('36', 'HENDRIK TAMPUBOLON', '1', '2007', '3.28472', '2012', '2000', 'on process', 'JL.TEROMPET NO.46 P.BULAN', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('37', 'AZARIA TARIGAN', '1', '2007', '3.15625', '2012', '2000', 'on process', 'JL. SETIA BUDI NO 110 A MEDAN', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('38', 'FAISAL AMRI', '1', '2007', '3.52778', '2012', '2000', 'on process', 'JL. SISINGAMANGARAJA NO.29/41', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('39', 'MUHAMMAD MUSYAFA HTG', '1', '2007', '2.90972', '2012', '2000', 'on process', 'JLN.ABDUL HAKIM KOMPLEK INSAN CITA GRIYA NO. B8 MEDAN', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('40', 'R M KHALIL PRASETYO', '1', '2007', '2.87153', '2012', '2000', 'on process', 'JL BUNGA BALDU 2 NO 25 MEDAN', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('41', 'FANNY DEVINA NABABAN', '2', '2008', '3.39', '2012', '2000', 'on process', 'JL KAMBOJA 3 NO 100 MEDAN', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('42', 'NANDA PUTRA', '1', '2008', '3.48', '2012', '2000', 'on process', 'ASRAMA PUTRA USU', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('43', 'EUNIKE JOHANNA', '2', '2007', '3.18', '2012', '2000', 'on process', 'JL. SEI ULAR BARU NO.59', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('44', 'MARIA MELISA br SINURAYA', '2', '2007', '3.37', '2012', '2000', 'on process', 'JLN MEDAN - BINJAI KM 16,2 DUSUN 1 SUMBER MELATI DISKI', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('45', 'FANINDIA', '2', '2007', '3.24', '2013', '2000', 'on process', 'JL.STM SUKA RINDU NO.2D', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('46', 'MUHAMMAD FADHLY SANI', '1', '2008', '3.72', '2013', '2000', 'on process', 'JL GURILLA GG PAERAN NO 5', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('47', 'RONALD O P', '1', '2007', '2.91', '2013', '2000', 'on process', 'JL. PAYA BAKUNG NO. 10 A, DISKI', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('48', 'BERLIAN GAUS', '2', '2008', '3.36', '2013', '2000', 'on process', 'JL TARUTUNG SIPIROK', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('49', 'KARINA AYESHA', '2', '2008', '3.32', '2013', '2000', 'on process', 'KOMPLEK WARTAWAN JALAN LETERPRES 13 MEDAN', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('50', 'SYAHMI SUHAEMI', '2', '2008', '3.02', '2013', '2000', 'on process', 'Aek Pamingke', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('51', 'CAHYA RIZKI D ASMONO', '2', '2008', '3.49', '2013', '2000', 'on process', 'JL BAJAK V KOMPLEK KEHUTANAN BLOK C NO 1 MEDAN AMPLAS', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('52', 'R M IRVAN RIDHO', '1', '2007', '2.8', '2013', '2000', 'on process', 'JLN. BUNGA TEROMPET 2 NO. 1 SEMBADA 16 MEDAN', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('53', 'RAJA PRANANTA', '1', '2007', '2.73', '2013', '2000', 'on process', 'JL SETIA BUDI PSR 1 KOMP PERTAMBANGAN NO 294 F TJ SARI MEDAN', 'on process', '0', '0');
INSERT INTO `tbl_alumni` VALUES ('54', 'AGNES MARGARETHA B', '2', '2007', '2.56', '2013', '2000', 'on process', 'JL.ANGGREK II NO.86 KOMP.GALINDA GALANG', 'on process', '0', '0');

-- ----------------------------
-- Table structure for tbl_data_alumni
-- ----------------------------
DROP TABLE IF EXISTS `tbl_data_alumni`;
CREATE TABLE `tbl_data_alumni` (
  `no` int(5) NOT NULL AUTO_INCREMENT,
  `nim` varchar(12) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `stambuk` varchar(4) DEFAULT NULL,
  `thn_lulus` varchar(4) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telp1` varchar(12) DEFAULT NULL,
  `telp2` varchar(12) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `pekerjaan` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`no`,`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_data_alumni
-- ----------------------------
INSERT INTO `tbl_data_alumni` VALUES ('1', '1014020', 'ihihmoij', '2009', '2013', 'alamat', 'telp1', 'telp2', 'email', 'pekerjaan');
INSERT INTO `tbl_data_alumni` VALUES ('2', '1014020', 'ihihmoij', '2009', '2013', 'alamat', 'telp1', 'telp2', 'email', 'pekerjaan');
INSERT INTO `tbl_data_alumni` VALUES ('3', '1014020', 'ihihmoij', '2009', '2013', 'iumi', 'jhgni', 'ihmuhm', 'uhmiuh', 'imu');
INSERT INTO `tbl_data_alumni` VALUES ('4', '081402064', 'Indra Aulia', '2008', '2012', 'Medan', '097654567', '5678899', 'indra.tplusu@gmail.com', 'Programmer');

-- ----------------------------
-- Table structure for tbl_jwb_kuisioner
-- ----------------------------
DROP TABLE IF EXISTS `tbl_jwb_kuisioner`;
CREATE TABLE `tbl_jwb_kuisioner` (
  `id_kuisioner` int(3) NOT NULL AUTO_INCREMENT,
  `id_alumni` int(3) NOT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `nomor1` int(1) NOT NULL,
  `nomor2` int(1) NOT NULL,
  `nomor3` int(1) NOT NULL,
  `nomor4` int(1) NOT NULL,
  `nomor5` int(1) NOT NULL,
  `nomor6` int(1) NOT NULL,
  `nomor7` int(1) NOT NULL,
  `komentar` text,
  PRIMARY KEY (`id_kuisioner`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_jwb_kuisioner
-- ----------------------------
INSERT INTO `tbl_jwb_kuisioner` VALUES ('5', '26', 'kas', '1', '1', '1', '1', '1', '1', '1', 'hauhashdak');

-- ----------------------------
-- Table structure for tbl_login
-- ----------------------------
DROP TABLE IF EXISTS `tbl_login`;
CREATE TABLE `tbl_login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_login
-- ----------------------------
INSERT INTO `tbl_login` VALUES ('1', 'indraaulia', 'cda2c99fbf5e19f20d331299c15a4491ffbae4be4295da311aec8b5caa0a78521d23bd94675c448a562899adf166bc9f', '1', '06177162020', 'Halat', 'Indra Aulia');
INSERT INTO `tbl_login` VALUES ('3', 'sani', 'cda2c99fbf5e19f20d331299c15a4491ffbae4be4295da311aec8b5caa0a78521d23bd94675c448a562899adf166bc9f', '1', '00', 'jjjj', 'sani');
INSERT INTO `tbl_login` VALUES ('5', 'temp', 'd8578edf8458ce06fbc5bb76a58c5ca4', '1', 'dimana saja', 'any time', 'Temp');
