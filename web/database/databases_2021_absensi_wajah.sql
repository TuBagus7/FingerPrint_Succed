# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.30)
# Database: databases_2021_absensi_wajah_smkn1_sintuk
# Generation Time: 2023-02-03 07:02:34 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table data_absensi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `data_absensi`;

CREATE TABLE `data_absensi` (
  `id_absensi` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` varchar(100) DEFAULT NULL,
  `id_mahasiswa` varchar(50) DEFAULT NULL,
  `status` enum('hadir','sakit','izin','alfa') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `data_absensi` WRITE;
/*!40000 ALTER TABLE `data_absensi` DISABLE KEYS */;

INSERT INTO `data_absensi` (`id_absensi`, `tanggal`, `jam`, `id_mahasiswa`, `status`)
VALUES
	('ABS20210609004842848','2021-06-09','00:48:42','SIS20210608174145544','hadir'),
	('ABS20211208145542706','2021-12-08','14:55:42','SIS20210608174145544','hadir');

/*!40000 ALTER TABLE `data_absensi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table data_admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `data_admin`;

CREATE TABLE `data_admin` (
  `id_admin` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` tinytext,
  `no_telepon` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `data_admin` WRITE;
/*!40000 ALTER TABLE `data_admin` DISABLE KEYS */;

INSERT INTO `data_admin` (`id_admin`, `nama`, `alamat`, `no_telepon`, `username`, `password`)
VALUES
	('ADM20210512101743582','admin','admin\r\n','085369237896','admin','21232f297a57a5a743894a0e4a801fc3');

/*!40000 ALTER TABLE `data_admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table data_guru
# ------------------------------------------------------------

DROP TABLE IF EXISTS `data_guru`;

CREATE TABLE `data_guru` (
  `id_guru` varchar(50) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` tinytext,
  `no_telepon` varchar(50) DEFAULT NULL,
  `jenim_kelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `data_guru` WRITE;
/*!40000 ALTER TABLE `data_guru` DISABLE KEYS */;

INSERT INTO `data_guru` (`id_guru`, `nip`, `nama`, `alamat`, `no_telepon`, `jenim_kelamin`, `username`, `password`)
VALUES
	('GUR20210512102430287','1122940','fajarudin sidik','jambi\r\n','085369237896','laki-laki','guru','21232f297a57a5a743894a0e4a801fc3'),
	('GUR20210608173024512','234324','bayu','jambi','08536484774','laki-laki','bayu','21232f297a57a5a743894a0e4a801fc3');

/*!40000 ALTER TABLE `data_guru` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table data_jadwal
# ------------------------------------------------------------

DROP TABLE IF EXISTS `data_jadwal`;

CREATE TABLE `data_jadwal` (
  `id_jadwal` varchar(50) DEFAULT NULL,
  `hari` enum('senin','selasa','rabu','kamis','jumat','sabtu','mingu') DEFAULT NULL,
  `jam` varchar(50) DEFAULT NULL,
  `id_kelas` varchar(50) DEFAULT NULL,
  `id_matapelajaran` varchar(50) DEFAULT NULL,
  `id_guru` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `data_jadwal` WRITE;
/*!40000 ALTER TABLE `data_jadwal` DISABLE KEYS */;

INSERT INTO `data_jadwal` (`id_jadwal`, `hari`, `jam`, `id_kelas`, `id_matapelajaran`, `id_guru`)
VALUES
	('JAD20210512102730498','senin','08:00','KEL20210512102626849','MAT20210512102612466','GUR20210512102430287'),
	('JAD20210604091921706','selasa','08:00','KEL20210512102626849','MAT20210512102612466','GUR20210512102430287'),
	('JAD20210604091934813','rabu','08:00','KEL20210512102626849','MAT20210604091638380','GUR20210512102430287'),
	('JAD20210604091948341','kamis','08:00','KEL20210512102626849','MAT20210604091648772','GUR20210512102430287'),
	('JAD20210604092002900','jumat','08:00','KEL20210512102626849','MAT20210512102612466','GUR20210512102430287'),
	('JAD20210604092016761','sabtu','08:00','KEL20210512102626849','MAT20210512102612466','GUR20210512102430287');

/*!40000 ALTER TABLE `data_jadwal` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table data_jurusan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `data_jurusan`;

CREATE TABLE `data_jurusan` (
  `id_jurusan` varchar(50) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `data_jurusan` WRITE;
/*!40000 ALTER TABLE `data_jurusan` DISABLE KEYS */;

INSERT INTO `data_jurusan` (`id_jurusan`, `jurusan`)
VALUES
	('JUR20210610001029924','TKJ'),
	('JUR20210610001036164','RPL'),
	('JUR20210610001046284','TSM'),
	('JUR20210610001056658','TATA BOGA');

/*!40000 ALTER TABLE `data_jurusan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table data_kelas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `data_kelas`;

CREATE TABLE `data_kelas` (
  `id_kelas` varchar(50) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `data_kelas` WRITE;
/*!40000 ALTER TABLE `data_kelas` DISABLE KEYS */;

INSERT INTO `data_kelas` (`id_kelas`, `kelas`)
VALUES
	('KEL20210512102626849','kelas 1'),
	('KEL20210604091706937','kelas 2'),
	('KEL20210604091713310','kelas 3');

/*!40000 ALTER TABLE `data_kelas` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table data_matapelajaran
# ------------------------------------------------------------

DROP TABLE IF EXISTS `data_matapelajaran`;

CREATE TABLE `data_matapelajaran` (
  `id_matapelajaran` varchar(50) DEFAULT NULL,
  `matapelajaran` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `data_matapelajaran` WRITE;
/*!40000 ALTER TABLE `data_matapelajaran` DISABLE KEYS */;

INSERT INTO `data_matapelajaran` (`id_matapelajaran`, `matapelajaran`)
VALUES
	('MAT20210512102612466','matematika'),
	('MAT20210604091630279','Bahasa indonesia'),
	('MAT20210604091638380','IPA'),
	('MAT20210604091648772','IPS'),
	('MAT20210604091653277','PPKN');

/*!40000 ALTER TABLE `data_matapelajaran` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table data_mahasiswa
# ------------------------------------------------------------

DROP TABLE IF EXISTS `data_mahasiswa`;

CREATE TABLE `data_mahasiswa` (
  `id_mahasiswa` varchar(50) DEFAULT NULL,
  `nim` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` tinytext,
  `jenim_kelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `id_kelas` varchar(50) DEFAULT NULL,
  `id_jurusan` varchar(50) DEFAULT NULL,
  `id_tahun_ajaran` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `data_mahasiswa` WRITE;
/*!40000 ALTER TABLE `data_mahasiswa` DISABLE KEYS */;

INSERT INTO `data_mahasiswa` (`id_mahasiswa`, `nim`, `nama`, `alamat`, `jenim_kelamin`, `id_kelas`, `id_jurusan`, `id_tahun_ajaran`)
VALUES
	('SIS20210512102810533','8443958','Andi','jambi\r\n','laki-laki','KEL20210512102626849','JUR20210610001029924','TAH20210512102638950'),
	('SIS20210604092046536','8443959','Ali','Jambi','laki-laki','KEL20210512102626849','JUR20210610001029924','TAH20210512102638950'),
	('SIS20210604092102151','8443952','Bambang','Jambi','laki-laki','KEL20210512102626849','JUR20210610001029924','TAH20210512102638950'),
	('SIS20210608174145544','8443953','fajar','jambi','laki-laki','KEL20210512102626849','JUR20210610001029924','TAH20210512102638950');

/*!40000 ALTER TABLE `data_mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table data_tahun_ajaran
# ------------------------------------------------------------

DROP TABLE IF EXISTS `data_tahun_ajaran`;

CREATE TABLE `data_tahun_ajaran` (
  `id_tahun_ajaran` varchar(50) DEFAULT NULL,
  `tahun_ajaran` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `data_tahun_ajaran` WRITE;
/*!40000 ALTER TABLE `data_tahun_ajaran` DISABLE KEYS */;

INSERT INTO `data_tahun_ajaran` (`id_tahun_ajaran`, `tahun_ajaran`)
VALUES
	('TAH20210512102638950','2021');

/*!40000 ALTER TABLE `data_tahun_ajaran` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
