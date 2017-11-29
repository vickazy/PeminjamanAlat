/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 100125
Source Host           : localhost:3306
Source Database       : peminjaman_alat

Target Server Type    : MYSQL
Target Server Version : 100125
File Encoding         : 65001

Date: 2017-11-29 14:00:19
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
  PRIMARY KEY (`id_alat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of alat
-- ----------------------------
INSERT INTO `alat` VALUES ('ALT0001', 'Wacom Bamboo', '10');
INSERT INTO `alat` VALUES ('ALT0002', 'Kamera DSLR', '2');

-- ----------------------------
-- Table structure for kelas
-- ----------------------------
DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas` (
  `nama_kelas` varchar(15) NOT NULL,
  PRIMARY KEY (`nama_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kelas
-- ----------------------------
INSERT INTO `kelas` VALUES ('X Animasi A');
INSERT INTO `kelas` VALUES ('X Animasi B');
INSERT INTO `kelas` VALUES ('XI Animasi A');
INSERT INTO `kelas` VALUES ('XI Animasi B');
INSERT INTO `kelas` VALUES ('XII Animasi A');
INSERT INTO `kelas` VALUES ('XII Animasi B');

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
INSERT INTO `login` VALUES ('ridhansholeh', 'cmlkaGFucw==', '2017-11-02');

-- ----------------------------
-- Table structure for petugas
-- ----------------------------
DROP TABLE IF EXISTS `petugas`;
CREATE TABLE `petugas` (
  `id_petugas` varchar(20) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_petugas`),
  KEY `username` (`username`),
  CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `login` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of petugas
-- ----------------------------
INSERT INTO `petugas` VALUES ('PTG00001', 'Ridhan Sholeh', 'ridhansholeh', 'Admin');

-- ----------------------------
-- Table structure for peminjam
-- ----------------------------
DROP TABLE IF EXISTS `peminjam`;
CREATE TABLE `peminjam` (
  `id_peminjam` varchar(20) NOT NULL,
  `nama_peminjam` varchar(50) NOT NULL,
  `nis` int(11) NOT NULL,
  `id_keperluan` varchar(20) NOT NULL,
  `nama_kelas` varchar(15) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tgl_pengambilan` date NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `catatan` text NOT NULL,
  `id_petugas` varchar(20) NOT NULL,
  PRIMARY KEY (`id_peminjam`),
  KEY `nama_kelas` (`nama_kelas`),
  KEY `id_keperluan` (`id_keperluan`),
  KEY `id_petugas` (`id_petugas`),
  CONSTRAINT `id_keperluan` FOREIGN KEY (`id_keperluan`) REFERENCES `keperluan` (`id_keperluan`),
  CONSTRAINT `id_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`),
  CONSTRAINT `nama_kelas` FOREIGN KEY (`nama_kelas`) REFERENCES `kelas` (`nama_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of peminjam
-- ----------------------------

-- ----------------------------
-- Table structure for detail_peminjam
-- ----------------------------
DROP TABLE IF EXISTS `detail_peminjam`;
CREATE TABLE `detail_peminjam` (
  `id_detail` varchar(20) NOT NULL,
  `id_peminjam` varchar(20) NOT NULL,
  `id_alat` varchar(20) NOT NULL,
  KEY `id_peminjam` (`id_peminjam`),
  KEY `id_alat` (`id_alat`),
  CONSTRAINT `id_alat` FOREIGN KEY (`id_alat`) REFERENCES `alat` (`id_alat`),
  CONSTRAINT `id_peminjam` FOREIGN KEY (`id_peminjam`) REFERENCES `peminjam` (`id_peminjam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detail_peminjam
-- ----------------------------