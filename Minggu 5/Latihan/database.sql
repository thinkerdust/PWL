-- thinkerdust A11201911654

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `db_toko_online` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_toko_online`;

DROP TABLE IF EXISTS `kendaraan`;
CREATE TABLE `kendaraan` (
  `no_plat` int(11) NOT NULL,
  `tahun` char(4) NOT NULL,
  `tarif` bigint(20) NOT NULL,
  PRIMARY KEY (`no_plat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan` (
  `no_ktp` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  PRIMARY KEY (`no_ktp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `sopir`;
CREATE TABLE `sopir` (
  `id_sopir` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `sim` varchar(255) NOT NULL,
  `tarif` bigint(20) NOT NULL,
  PRIMARY KEY (`id_sopir`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tipe_kendaraan`;
CREATE TABLE `tipe_kendaraan` (
  `id_type` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `no_transaksi` int(11) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali_rencana` date NOT NULL,
  `jam_kembali_rencana` time NOT NULL,
  `denda` int(11) NOT NULL,
  `kilometer_pinjam` float NOT NULL,
  `kilometer_kembali` float NOT NULL,
  `bbm_pinjam` float NOT NULL,
  `bbm_kembali` float NOT NULL,
  `kondisi_mobil_pinjam` text NOT NULL,
  `kondisi_mobil_kembali` text NOT NULL,
  `kerusakan` text NOT NULL,
  `biaya_kerusakan` bigint(20) NOT NULL,
  `biaya_bbm` bigint(20) NOT NULL,
  PRIMARY KEY (`no_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2021-04-02 08:05:20
