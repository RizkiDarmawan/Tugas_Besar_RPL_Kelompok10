-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 14, 2014 at 10:14 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lmai2014`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_f`
--

CREATE TABLE IF NOT EXISTS `admin_f` (
  `id` int(10) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `hp` int(11) NOT NULL,
  `id_fakultas` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_f`
--



-- --------------------------------------------------------

--
-- Table structure for table `admin_p`
--

CREATE TABLE IF NOT EXISTS `admin_p` (
  `id` int(10) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `hp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_p`
--



-- --------------------------------------------------------

--
-- Table structure for table `amalanyaumi`
--

CREATE TABLE IF NOT EXISTS `amalanyaumi` (
  `id` int(10) NOT NULL,
  `amalan` varchar(100) NOT NULL,
  `target` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amalanyaumi`
--



-- --------------------------------------------------------

--
-- Table structure for table `det_dosen_jur`
--

CREATE TABLE IF NOT EXISTS `det_dosen_jur` (
  `dosen` int(10) NOT NULL,
  `id_jurusan` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det_dosen_jur`
--



-- --------------------------------------------------------

--
-- Table structure for table `det_kelompok`
--

CREATE TABLE IF NOT EXISTS `det_kelompok` (
  `id` int(10) NOT NULL,
  `mentee` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det_kelompok`
--



-- --------------------------------------------------------

--
-- Table structure for table `det_kendali`
--

CREATE TABLE IF NOT EXISTS `det_kendali` (
  `id_kendali` int(10) NOT NULL,
  `bp` int(10) NOT NULL,
  `id_amalan` int(10) NOT NULL,
  `status` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det_kendali`
--



-- --------------------------------------------------------

--
-- Table structure for table `diskusi`
--

CREATE TABLE IF NOT EXISTS `diskusi` (
  `id_kelompok` int(10) NOT NULL,
  `bp` int(10) NOT NULL,
  `pesan` text NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id_kelompok`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diskusi`
--



-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `nip` int(10) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `hp` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--



-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE IF NOT EXISTS `fakultas` (
  `id` int(10) NOT NULL,
  `nama` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--



-- --------------------------------------------------------

--
-- Table structure for table `jadwal_alternatif`
--

CREATE TABLE IF NOT EXISTS `jadwal_alternatif` (
  `id` int(10) NOT NULL,
  `id_shift` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_alternatif`
--



-- --------------------------------------------------------

--
-- Table structure for table `jadwal_shift`
--

CREATE TABLE IF NOT EXISTS `jadwal_shift` (
  `id` int(10) NOT NULL,
  `shift` varchar(100) NOT NULL,
  `hari` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_shift`
--



-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `id` int(10) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `id_fakultas` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--



-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE IF NOT EXISTS `kelompok` (
  `id` int(10) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `mentor` int(10) NOT NULL,
  `comentor` int(10) NOT NULL,
  `jadwal` int(10) NOT NULL,
  `id_jurusan` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelompok`
--



-- --------------------------------------------------------

--
-- Table structure for table `kendali`
--

CREATE TABLE IF NOT EXISTS `kendali` (
  `id` int(10) NOT NULL,
  `id_kelompok` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendali`
--



-- --------------------------------------------------------

--
-- Table structure for table `khs`
--

CREATE TABLE IF NOT EXISTS `khs` (
  `mentee` int(10) NOT NULL,
  `id_mat_pel` int(10) NOT NULL,
  `nilai` decimal(10,0) NOT NULL,
  PRIMARY KEY (`mentee`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `khs`
--



-- --------------------------------------------------------

--
-- Table structure for table `mat_pel`
--

CREATE TABLE IF NOT EXISTS `mat_pel` (
  `id` int(10) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `persen` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mat_pel`
--



-- --------------------------------------------------------

--
-- Table structure for table `mentee`
--

CREATE TABLE IF NOT EXISTS `mentee` (
  `bp` int(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `hp` int(11) NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `golongan_darah` varchar(5) NOT NULL,
  `liqo` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `asal_sma` text NOT NULL,
  `nilai` decimal(10,0) NOT NULL,
  `id_jurusan` int(10) NOT NULL,
  PRIMARY KEY (`bp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentee`
--



-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE IF NOT EXISTS `mentor` (
  `bp` int(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `hp` int(11) NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `asal` text NOT NULL,
  `alamat` text NOT NULL,
  `golongan_darah` varchar(10) NOT NULL,
  `id_jurusan` int(10) NOT NULL,
  PRIMARY KEY (`bp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentor`
--



-- --------------------------------------------------------

--
-- Table structure for table `organisasi`
--

CREATE TABLE IF NOT EXISTS `organisasi` (
  `mentee` int(10) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisasi`
--



-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE IF NOT EXISTS `prestasi` (
  `mentee` int(10) NOT NULL,
  `lomba` varchar(100) NOT NULL,
  `juara` varchar(100) NOT NULL,
  `EO` varchar(100) NOT NULL,
  `tingkat` varchar(100) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prestasi`
--



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
