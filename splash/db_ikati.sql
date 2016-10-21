/*
Navicat MySQL Data Transfer

Source Server         : it.usu.ac.id_3306
Source Server Version : 50543
Source Host           : it.usu.ac.id:3306
Source Database       : db_ikati

Target Server Type    : MYSQL
Target Server Version : 50543
File Encoding         : 65001

Date: 2015-06-05 14:49:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for alumni
-- ----------------------------
DROP TABLE IF EXISTS `alumni`;
CREATE TABLE `alumni` (
  `no_alumni` varchar(100) NOT NULL,
  `nama` varchar(550) NOT NULL,
  `tempat_lahir` varchar(450) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenkel` enum('Pria','Wanita') NOT NULL,
  `angkatan` int(10) NOT NULL,
  `tahun_lulus` int(10) NOT NULL,
  `alamat` varchar(450) NOT NULL,
  `kelurahan` varchar(450) NOT NULL,
  `kecamatan` varchar(450) NOT NULL,
  `provinsi` varchar(450) NOT NULL,
  `kab_kota` varchar(450) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(500) NOT NULL,
  `pekerjaan` varchar(450) NOT NULL,
  `nama_per` varchar(450) NOT NULL,
  `alamat_per` varchar(450) NOT NULL,
  `fax_em_telp` varchar(450) NOT NULL,
  `web_per` varchar(500) NOT NULL,
  `jabatan` varchar(400) NOT NULL,
  `profpic` varchar(450) NOT NULL,
  PRIMARY KEY (`no_alumni`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of alumni
-- ----------------------------
INSERT INTO `alumni` VALUES ('001/2011/001', 'Muhammad Suryansyah Manik', 'Medan', '1992-08-10', 'Pria', '2011', '2014', 'Jl.Maluku No.10 A', 'Pandau Hilir', 'Medan Perjuangan', 'Sumatera Utara', 'Medan', '087868354751', '4530464', 'msuryansah@gmail.com', 'Freelance', 'PT.Garuda Jaya', 'Jl. Pandu No.10 A Cikeas', '-', 'garuda.jaya.com', 'Karyawan', '001-2011-001.jpg');
INSERT INTO `alumni` VALUES ('001/2009/001', 'Atras', 'Medan', '1950-01-01', 'Pria', '2009', '2013', 'Jl. Alumni', 'Pandau Hilir', 'Medan Amplas', 'Sumatera Utara', 'Medan', '081360785074', '4539464', 'atras@gmail.com', 'mahasiswa', '', '', '', '', '', '001-2009-001.jpg');
INSERT INTO `alumni` VALUES ('002/2011/001', 'Rifqi Adly Barus', 'Medan', '1992-09-14', 'Pria', '2011', '2014', 'Jl. Bayangkara No. 12 A', 'Padang Golf', 'Medan Timur', 'Sumatera Utara', 'Medan', '081360785432', '0614521878', 'cangcut@gmail.com', 'Mahasiswa', '', '', '', '', '', '002-2011-001.jpg');
INSERT INTO `alumni` VALUES ('003/2011/002', 'Surya Alonso', 'Medan', '1992-09-18', 'Pria', '2011', '2013', 'Jl. Mangkubumi No. 8 A', 'Cemara', 'Medan Amplas', 'Sumatera Utara', 'Medan', '081345670988', '0614530787', 'msuryansah@gmail.com', 'Freelancer', 'PT. Abadi Jaya', 'Jl.Kemuning No.6A', 'abadi@gmail.com', 'abadijaya.com', 'Programmer', '003-2011-002.jpg');
INSERT INTO `alumni` VALUES ('004/2011/003', 'Trian Saputra', 'Pematang Siantar', '1988-04-07', 'Pria', '2011', '2015', 'Jl. Teuku Umar No 19 A', 'Kecubung', 'Medan Area', 'Sumatera Utara', 'Medan', '081360785422', '0614521890', 'suryabubur52@gmail.com', 'Freelance', '', '', '', '', '', '004-2011-003.jpg');
INSERT INTO `alumni` VALUES ('005/2008/001', 'Denny Syahputra', 'Medan', '1989-06-14', 'Pria', '2008', '2012', 'Jl. Tempuling No. 15 B', 'Sei Kera Hilir', 'Medan Area', 'Sumatera Utara', 'Medan', '087865123454', '4530424', 'msuryansah@gmail.com', 'Freelance', '', '', '', '', '', '005-2008-001.jpg');
INSERT INTO `alumni` VALUES ('006/2011/004', 'Fahrus', 'Medan', '1992-01-09', 'Wanita', '2011', '2013', 'Jl. Alumni', 'Belawan', 'Medan Belawan', 'Sumatera Utara', 'Medan', '087865123411', '0614521876', 'msuryansah@gmail.com', 'Freelance', '', '', '', '', '', '006-2011-004.jpg');
INSERT INTO `alumni` VALUES ('007/2007/001', 'Laila', 'Medan', '1991-01-01', 'Wanita', '2007', '2011', 'Jl.Kapten Muslim No.15A', 'Seruni', 'Medan Amplas', 'Sumatera Utara', 'Medan', '081360785442', '-', 'msuryansah@gmail.com', 'mahasiswa', '', '', '', '', '', '007-2007-001.jpg');
INSERT INTO `alumni` VALUES ('008/2011/005', 'Rifki Aulia', 'Medan', '1992-06-08', '', '2011', '2013', 'Jl. Antasari No. 12', 'Seruni', 'Medan Perjuangan', 'Sumatera Utara', 'Medan', '081360785411', '0614521833', 'msuryansah@gmail.com', 'Freelance', 'PT. Abadi Jaya', 'Jl.Kemuning No.6A', '-', '-', '-', '008-2011-005.jpg');

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
-- Table structure for shared_link
-- ----------------------------
DROP TABLE IF EXISTS `shared_link`;
CREATE TABLE `shared_link` (
  `id_link` int(220) NOT NULL AUTO_INCREMENT,
  `no_alumni` varchar(650) NOT NULL,
  `links` text NOT NULL,
  `tag_link` varchar(650) NOT NULL,
  `time_shared` datetime NOT NULL,
  PRIMARY KEY (`id_link`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shared_link
-- ----------------------------
INSERT INTO `shared_link` VALUES ('1', '001/2011/001', 'https://accounts.google.com/ServiceLoginAuth', 'Google Enhancement Recruitment', '2015-06-02 21:35:24');
INSERT INTO `shared_link` VALUES ('2', '001/2011/001', 'https://wiki.archlinux.org/index.php/Change_username', 'Tutorial Change username in Linux', '2015-06-02 21:42:10');
INSERT INTO `shared_link` VALUES ('3', '001/2011/001', 'http://how-old.net/#results', 'Microsoft New Image Recognition APP', '2015-06-02 21:42:59');
INSERT INTO `shared_link` VALUES ('4', '002/2011/001', 'www.microsoft.com', 'Open Recruitment Microsoft', '2015-06-02 21:44:25');
INSERT INTO `shared_link` VALUES ('5', '002/2011/001', 'www.gemnastik-ugm.com', 'Pendaftaran Gemastik 2015', '2015-06-02 21:47:54');
INSERT INTO `shared_link` VALUES ('6', '002/2011/001', 'trello.com', 'Trello Project Management APP', '2015-06-02 21:48:45');
INSERT INTO `shared_link` VALUES ('7', '002/2011/001', 'www.google.com', 'Google drive', '2015-06-02 22:02:45');
INSERT INTO `shared_link` VALUES ('8', '002/2011/001', 'www.abc.com', 'Urgent !! Lowongan PT ABC Indonesia', '2015-06-02 22:04:45');
INSERT INTO `shared_link` VALUES ('9', '002/2011/001', 'http://google.com', 'Tester Data 9', '2015-06-02 22:09:25');
INSERT INTO `shared_link` VALUES ('10', '002/2011/001', 'https://google.com', 'Tester Data 10 Coy', '2015-06-02 22:10:10');
INSERT INTO `shared_link` VALUES ('11', '002/2011/001', 'https://www.ask.fm', 'Tester Data 11', '2015-06-02 22:10:36');

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
-- Table structure for tbl_hak_akses
-- ----------------------------
DROP TABLE IF EXISTS `tbl_hak_akses`;
CREATE TABLE `tbl_hak_akses` (
  `level_user` int(5) NOT NULL AUTO_INCREMENT,
  `hak_akses` varchar(400) NOT NULL,
  PRIMARY KEY (`level_user`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_hak_akses
-- ----------------------------
INSERT INTO `tbl_hak_akses` VALUES ('1', 'administrator');
INSERT INTO `tbl_hak_akses` VALUES ('2', 'user');
INSERT INTO `tbl_hak_akses` VALUES ('3', 'operator');

-- ----------------------------
-- Table structure for tbl_jwb_kuisioner
-- ----------------------------
DROP TABLE IF EXISTS `tbl_jwb_kuisioner`;
CREATE TABLE `tbl_jwb_kuisioner` (
  `id_kuisioner` int(150) NOT NULL AUTO_INCREMENT,
  `id_alumni` varchar(250) NOT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `nomor1` text NOT NULL,
  `nomor2` text NOT NULL,
  `nomor3` text NOT NULL,
  `nomor4` text NOT NULL,
  `nomor5` text NOT NULL,
  `nomor6` text NOT NULL,
  `nomor7` text NOT NULL,
  `komentar` text,
  PRIMARY KEY (`id_kuisioner`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_jwb_kuisioner
-- ----------------------------
INSERT INTO `tbl_jwb_kuisioner` VALUES ('1', '001/2011/001', 'Mahasiswa', 'Sangat Baik', 'Sangat Baik', 'Baik', 'Cukup', 'Baik', '6-12 Bulan', '3-5 Juta', 'Coba lagi komntar nya ya..hahaha');
INSERT INTO `tbl_jwb_kuisioner` VALUES ('2', '002/2011/001', 'Gitaris Band', 'Sangat Baik', 'Baik', 'Baik', 'Cukup', 'Baik', '12-18 Bulan', '< 1 Juta', 'Maaf, selama ini saya malas mengikuti perkuliahan sehingga terancam D.O kemarin.');

-- ----------------------------
-- Table structure for tbl_login
-- ----------------------------
DROP TABLE IF EXISTS `tbl_login`;
CREATE TABLE `tbl_login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `no_alumni` varchar(40) NOT NULL,
  `password` varchar(400) NOT NULL,
  `level` int(5) NOT NULL,
  `in_date` date NOT NULL,
  `in_time` time NOT NULL,
  `out_date` date NOT NULL,
  `out_time` time NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_login
-- ----------------------------
INSERT INTO `tbl_login` VALUES ('7', '001/2009/001', '24c9e15e52afc47c225b757e7bee1f9d', '2', '2015-03-11', '16:34:10', '2015-05-27', '16:02:19');
INSERT INTO `tbl_login` VALUES ('6', '001/2011/001', 'aff8fbcbf1363cd7edc85a1e11391173', '2', '2015-02-15', '15:25:54', '2015-06-02', '21:43:43');
INSERT INTO `tbl_login` VALUES ('8', '002/2011/001', '321cd5982f2945b3bd2495f029a0b372', '2', '2015-05-26', '18:57:08', '2015-06-02', '22:30:28');
INSERT INTO `tbl_login` VALUES ('9', '003/2011/002', '4c6aa22ff0ca8ef5faf7abe3e9716bdf', '2', '2015-06-04', '13:37:45', '0000-00-00', '00:00:00');
INSERT INTO `tbl_login` VALUES ('10', '004/2011/003', 'c74f3ccc4106c90372918a69ff3adec3', '2', '2015-06-04', '15:11:14', '0000-00-00', '00:00:00');
INSERT INTO `tbl_login` VALUES ('11', '005/2008/001', '3b5354bdb3b4c20203b74aeacbe199f2', '2', '2015-06-04', '15:30:04', '0000-00-00', '00:00:00');
INSERT INTO `tbl_login` VALUES ('12', '006/2011/004', 'ae2b1fca515949e5d54fb22b8ed95575', '2', '2015-06-04', '15:46:45', '0000-00-00', '00:00:00');
INSERT INTO `tbl_login` VALUES ('13', '007/2007/001', 'f30618ed64655812746272636a992b95', '2', '2015-06-04', '16:22:58', '0000-00-00', '00:00:00');
INSERT INTO `tbl_login` VALUES ('17', '008/2011/005', '', '2', '2015-06-04', '18:11:16', '0000-00-00', '00:00:00');
