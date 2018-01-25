/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 100125
Source Host           : localhost:3306
Source Database       : peminjaman_alat

Target Server Type    : MYSQL
Target Server Version : 100125
File Encoding         : 65001

Date: 2018-01-25 13:03:49
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
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id_alat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for alat_detail
-- ----------------------------
DROP TABLE IF EXISTS `alat_detail`;
CREATE TABLE `alat_detail` (
  `id_alat` varchar(20) NOT NULL,
  `kode_alat` varchar(25) NOT NULL,
  `kondisi` varchar(15) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`kode_alat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for keperluan
-- ----------------------------
DROP TABLE IF EXISTS `keperluan`;
CREATE TABLE `keperluan` (
  `id_keperluan` varchar(20) NOT NULL,
  `nama_keperluan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_keperluan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `tgl_req_peminjaman` date NOT NULL,
  `tgl_pengembalian_rencana` date NOT NULL,
  `catatan` text NOT NULL,
  `id_petugas` varchar(20) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `status_acc` int(11) NOT NULL,
  PRIMARY KEY (`id_peminjam`),
  KEY `id_keperluan` (`id_keperluan`),
  KEY `id_petugas` (`id_petugas`),
  KEY `id_kelas` (`id_kelas`),
  CONSTRAINT `id_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  CONSTRAINT `id_keperluan` FOREIGN KEY (`id_keperluan`) REFERENCES `keperluan` (`id_keperluan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for peminjam_detail
-- ----------------------------
DROP TABLE IF EXISTS `peminjam_detail`;
CREATE TABLE `peminjam_detail` (
  `id_detail` varchar(20) NOT NULL,
  `id_peminjam` varchar(20) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `id_alat` varchar(20) NOT NULL,
  `tgl_req_peminjaman` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  KEY `id_peminjam` (`id_peminjam`),
  KEY `id_alat` (`id_alat`),
  CONSTRAINT `id_alat` FOREIGN KEY (`id_alat`) REFERENCES `alat` (`id_alat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for siswa
-- ----------------------------
DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa` (
  `nis` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nama_ortu` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
