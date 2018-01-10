/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 100125
Source Host           : localhost:3306
Source Database       : peminjaman_alat

Target Server Type    : MYSQL
Target Server Version : 100125
File Encoding         : 65001

Date: 2018-01-10 13:07:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for alat
-- ----------------------------
DROP TABLE IF EXISTS `alat`;
CREATE TABLE `alat` (
  `id_alat` varchar(20) NOT NULL,
  `nama_alat` varchar(30) NOT NULL,
  `stok` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_alat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of alat
-- ----------------------------
INSERT INTO `alat` VALUES ('ALT0001', 'Wacom Bamboo', '5', '10');
INSERT INTO `alat` VALUES ('ALT0002', 'Kamera DSLR', '0', '2');
INSERT INTO `alat` VALUES ('ALT0003', 'Pulpen', '5', '5');

-- ----------------------------
-- Table structure for detail_peminjam
-- ----------------------------
DROP TABLE IF EXISTS `detail_peminjam`;
CREATE TABLE `detail_peminjam` (
  `id_detail` varchar(20) NOT NULL,
  `id_peminjam` varchar(20) NOT NULL,
  `id_alat` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  KEY `id_peminjam` (`id_peminjam`),
  KEY `id_alat` (`id_alat`),
  CONSTRAINT `id_alat` FOREIGN KEY (`id_alat`) REFERENCES `alat` (`id_alat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detail_peminjam
-- ----------------------------
INSERT INTO `detail_peminjam` VALUES ('DTL000001', 'PJM00001', 'ALT0002', '1', '0');
INSERT INTO `detail_peminjam` VALUES ('DTL000002', 'PJM00002', 'ALT0001', '1', '0');
INSERT INTO `detail_peminjam` VALUES ('DTL000003', 'PJM00002', 'ALT0002', '1', '0');

-- ----------------------------
-- Table structure for kelas
-- ----------------------------
DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas` (
  `id_kelas` varchar(10) NOT NULL,
  `nama_kelas` varchar(15) NOT NULL,
  PRIMARY KEY (`nama_kelas`),
  KEY `id_kelas` (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kelas
-- ----------------------------
INSERT INTO `kelas` VALUES ('KLS0001', '10 Animasi A');
INSERT INTO `kelas` VALUES ('KLS0002', '10 Animasi B');
INSERT INTO `kelas` VALUES ('KLS0003', '11 Animasi A');
INSERT INTO `kelas` VALUES ('KLS0004', '11 Animasi B');
INSERT INTO `kelas` VALUES ('KLS0005', '12 Animasi A');
INSERT INTO `kelas` VALUES ('KLS0006', '12 Animasi B');

-- ----------------------------
-- Table structure for keperluan
-- ----------------------------
DROP TABLE IF EXISTS `keperluan`;
CREATE TABLE `keperluan` (
  `id_keperluan` varchar(20) NOT NULL,
  `nama_keperluan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_keperluan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of keperluan
-- ----------------------------
INSERT INTO `keperluan` VALUES ('KPL001', 'Praktik');
INSERT INTO `keperluan` VALUES ('KPL002', 'Pribadi');

-- ----------------------------
-- Table structure for login
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `last_login` text NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of login
-- ----------------------------
INSERT INTO `login` VALUES ('jajang', 'b56b57039c86f8626ece5a1a35f86175', '');
INSERT INTO `login` VALUES ('ridhansholeh', 'ce741e2ff01555b58879487957d645dd', '2017-11-02');
INSERT INTO `login` VALUES ('udin', '3af4c9341e31bce1f4262a326285170d', '');

-- ----------------------------
-- Table structure for peminjam
-- ----------------------------
DROP TABLE IF EXISTS `peminjam`;
CREATE TABLE `peminjam` (
  `id_peminjam` varchar(20) NOT NULL,
  `nama_peminjam` varchar(50) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `id_keperluan` varchar(20) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_pengembalian_rencana` date NOT NULL,
  `catatan` text NOT NULL,
  `id_petugas` varchar(20) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_peminjam`),
  KEY `id_keperluan` (`id_keperluan`),
  KEY `id_petugas` (`id_petugas`),
  KEY `id_kelas` (`id_kelas`),
  CONSTRAINT `id_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  CONSTRAINT `id_keperluan` FOREIGN KEY (`id_keperluan`) REFERENCES `keperluan` (`id_keperluan`),
  CONSTRAINT `id_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of peminjam
-- ----------------------------
INSERT INTO `peminjam` VALUES ('PJM00001', 'Jajang S', '9981895817', 'KPL001', 'KLS0005', '+62895-2002-2712', '2018-01-10', '2018-01-15', '', 'PTG0001', '0');
INSERT INTO `peminjam` VALUES ('PJM00002', 'Maman P', '987654321', 'KPL002', 'KLS0004', '+62877-7545-4695', '2018-01-10', '2018-01-12', '', 'PTG0001', '0');

-- ----------------------------
-- Table structure for pengembalian
-- ----------------------------
DROP TABLE IF EXISTS `pengembalian`;
CREATE TABLE `pengembalian` (
  `id_pengembalian` varchar(20) NOT NULL,
  `id_peminjam` varchar(20) DEFAULT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  PRIMARY KEY (`id_pengembalian`),
  KEY `id_peminjam 2` (`id_peminjam`),
  CONSTRAINT `id_peminjam 2` FOREIGN KEY (`id_peminjam`) REFERENCES `peminjam` (`id_peminjam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pengembalian
-- ----------------------------

-- ----------------------------
-- Table structure for petugas
-- ----------------------------
DROP TABLE IF EXISTS `petugas`;
CREATE TABLE `petugas` (
  `id_petugas` varchar(20) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tmpt_lahir` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_petugas`),
  KEY `username` (`username`),
  CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `login` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of petugas
-- ----------------------------
INSERT INTO `petugas` VALUES ('PTG0001', 'Ridhan Sholeh', 'Jl. Cihanjuang', '+62 895-2002-2712', 'L', '1999-01-21', 'Cimahi', 'ridhansholeh', 'Admin');
INSERT INTO `petugas` VALUES ('PTG0002', 'Jajang', 'Cimahi', '+62 895-2002-2712', 'L', '1995-03-22', 'Bandung', 'jajang', 'Petugas');
INSERT INTO `petugas` VALUES ('PTG0003', 'Udin', 'Jl Cimahi', '+62 659-8775-1211', 'L', '2017-12-12', 'Bandung', 'udin', 'Admin');
