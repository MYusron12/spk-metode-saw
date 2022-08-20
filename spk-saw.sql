-- Adminer 4.2.4 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `alternatif`;
CREATE TABLE `alternatif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_alternatif` varchar(255) NOT NULL,
  `keterangan_alternatif` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `alternatif` (`id`, `kode_alternatif`, `keterangan_alternatif`) VALUES
(1,	'A1',	'Alternatif 1'),
(4,	'A2',	'Alternatif 2 '),
(5,	'A3',	'Alternatif 3'),
(6,	'A4',	'Alternatif 4'),
(7,	'A5',	'Alternatif 5');

DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kriteria` varchar(255) NOT NULL,
  `tipe_kriteria` varchar(255) NOT NULL,
  `bobot_nilai_kriteria` int(11) NOT NULL,
  `urutan_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `kriteria` (`id`, `nama_kriteria`, `tipe_kriteria`, `bobot_nilai_kriteria`, `urutan_id`) VALUES
(6,	'C1 Ketertiban',	'Benefit',	25,	1),
(7,	'C2 Kedisiplinan',	'Benefit',	30,	2),
(8,	'C3 Absensi',	'Cost',	10,	3),
(9,	'C4 Kerjasama',	'Benefit',	20,	4),
(10,	'C5 Kreativitas',	'Benefit',	15,	5);

DROP TABLE IF EXISTS `nilai_alternatif_kriteria`;
CREATE TABLE `nilai_alternatif_kriteria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alternatif_id` int(11) NOT NULL,
  `c1` int(11) NOT NULL,
  `c2` int(11) NOT NULL,
  `c3` int(11) NOT NULL,
  `c4` int(11) NOT NULL,
  `c5` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `nilai_alternatif_kriteria` (`id`, `alternatif_id`, `c1`, `c2`, `c3`, `c4`, `c5`) VALUES
(1,	1,	6,	8,	8,	2,	10),
(2,	4,	8,	2,	8,	10,	4),
(3,	5,	10,	2,	4,	6,	6),
(4,	6,	4,	4,	10,	8,	10),
(5,	7,	4,	8,	10,	10,	8);

DROP TABLE IF EXISTS `nilai_preferensi`;
CREATE TABLE `nilai_preferensi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(255) NOT NULL,
  `skor_nilai` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `nilai_preferensi` (`id`, `keterangan`, `skor_nilai`) VALUES
(1,	'Sangat Buruk',	2),
(2,	'Buruk',	4),
(3,	'Cukup Baik',	6),
(4,	'Baik',	8),
(5,	'Sangat Baik',	10);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(6,	'user',	'user@user.com',	'default.jpg',	'$2y$10$.ybE/KxYJAjHDBaP5nlrKOguRQz7WMvDJEleRoKzCzGYsjY4fyhR.',	2,	1,	1552285263),
(12,	'admin',	'admin@admin.com',	'default.jpg',	'$2y$10$VgiXi8BbKDSROpfXM1F9kexQTWKmPsYfJwdpbe0fZQ90gQ64dS.Hi',	1,	1,	1552285263);

DROP TABLE IF EXISTS `user_access_menu`;
CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1,	1,	1),
(3,	2,	2),
(7,	1,	3),
(8,	1,	2),
(10,	1,	5);

DROP TABLE IF EXISTS `user_menu`;
CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1,	'Admin'),
(2,	'User'),
(3,	'Menu'),
(5,	'SAW'),
(6,	'PIECES');

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_role` (`id`, `role`) VALUES
(1,	'Administrator'),
(2,	'Member');

DROP TABLE IF EXISTS `user_sub_menu`;
CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1,	1,	'Dashboard',	'admin',	'fas fa-fw fa-tachometer-alt',	1),
(2,	2,	'My Profile',	'user',	'fas fa-fw fa-user',	1),
(3,	2,	'Edit Profile',	'user/edit',	'fas fa-fw fa-user-edit',	1),
(4,	3,	'Menu Management',	'menu',	'fas fa-fw fa-folder',	1),
(5,	3,	'Submenu Management',	'menu/submenu',	'fas fa-fw fa-folder-open',	1),
(7,	1,	'Role',	'admin/role',	'fas fa-fw fa-user-tie',	1),
(8,	2,	'Change Password',	'user/changepassword',	'fas fa-fw fa-key',	1),
(9,	5,	'Dashboard SAW',	'saw',	'fas fa-fw fa-copy',	1),
(10,	5,	'Alternatif',	'saw/alternatif',	'fas fa-fw fa-copy',	1),
(11,	5,	'Kriteria',	'saw/kriteria',	'fas fa-fw fa-copy',	1),
(12,	5,	'Nilai Preferensi',	'saw/preferensi',	'fas fa-fw fa-copy',	1),
(13,	5,	'Nilai Alternatif Kriteria',	'saw/nilai',	'fas fa-fw fa-copy',	1),
(14,	6,	'Skala Likert',	'pieces/skalalikert',	'fas fa-fw fa-copy',	1),
(15,	6,	'Pieces Framework',	'pieces/framework',	'fas fa-fw fa-copy',	1),
(16,	6,	'Indikator Pertanyaan',	'pieces/pertanyaan',	'fas fa-fw fa-copy',	1),
(17,	6,	'Variable Indikator',	'pieces/indikator',	'fas fa-fw fa-copy',	0),
(18,	6,	'Rata-rata kepuasan',	'pieces/ratarata',	'fas fa-fw fa-copy',	1),
(19,	5,	'Normalisasi ',	'saw/normalisasi',	'fas fa-fw fa-copy',	1);

DROP TABLE IF EXISTS `user_token`;
CREATE TABLE `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2022-08-20 05:39:39
