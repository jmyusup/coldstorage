/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 50725
 Source Host           : localhost:3306
 Source Schema         : coldstorage

 Target Server Type    : MySQL
 Target Server Version : 50725
 File Encoding         : 65001

 Date: 23/06/2019 12:16:03
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for inforuangan
-- ----------------------------
DROP TABLE IF EXISTS `inforuangan`;
CREATE TABLE `inforuangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime DEFAULT NULL,
  `suhu` int(11) DEFAULT NULL,
  `kelembaban` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of inforuangan
-- ----------------------------
BEGIN;
INSERT INTO `inforuangan` VALUES (1, '2019-04-28 09:10:14', 26, 70, '1');
INSERT INTO `inforuangan` VALUES (2, '2019-04-28 09:15:14', 25, 80, '1');
INSERT INTO `inforuangan` VALUES (3, '2019-04-28 09:20:14', 26, 70, '1');
INSERT INTO `inforuangan` VALUES (4, '2019-04-28 09:30:14', 28, 75, '1');
INSERT INTO `inforuangan` VALUES (5, '2019-04-28 09:40:14', 24, 80, '1');
INSERT INTO `inforuangan` VALUES (6, '2019-04-28 09:50:14', 23, 70, '1');
INSERT INTO `inforuangan` VALUES (7, '2019-04-28 10:00:14', 21, 65, '1');
INSERT INTO `inforuangan` VALUES (8, '2019-04-28 10:10:14', 26, 70, '1');
INSERT INTO `inforuangan` VALUES (9, '2019-04-28 10:20:14', 23, 75, '1');
COMMIT;

-- ----------------------------
-- Table structure for mmaterial
-- ----------------------------
DROP TABLE IF EXISTS `mmaterial`;
CREATE TABLE `mmaterial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(25) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `referensi` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of mmaterial
-- ----------------------------
BEGIN;
INSERT INTO `mmaterial` VALUES (1, '8723784', 'Besi', 'Ruang Lt.10', 10, 5, NULL, '1');
INSERT INTO `mmaterial` VALUES (2, '863468', 'Plastik', 'R6010', 12, 5, NULL, '2');
COMMIT;

-- ----------------------------
-- Table structure for mmaterial_history
-- ----------------------------
DROP TABLE IF EXISTS `mmaterial_history`;
CREATE TABLE `mmaterial_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idmaterial` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jampemakaian` time DEFAULT NULL,
  `jamselesai` time DEFAULT NULL,
  `jumlahterpakai` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mmaterial_history
-- ----------------------------
BEGIN;
INSERT INTO `mmaterial_history` VALUES (2, 1, '2019-06-23', '12:08:23', '12:14:53', 5, '1');
COMMIT;

-- ----------------------------
-- Table structure for muser
-- ----------------------------
DROP TABLE IF EXISTS `muser`;
CREATE TABLE `muser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(25) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `nama` varchar(125) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `idhakakses` char(1) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of muser
-- ----------------------------
BEGIN;
INSERT INTO `muser` VALUES (1, 'P0001', NULL, 'Gunali Rezqi Mauludi', 'gunalirezqi', 'e10adc3949ba59abbe56e057f20f883e', '2', '1');
INSERT INTO `muser` VALUES (2, 'P0002', NULL, 'Jajang M Yusuf', 'jajang', 'e10adc3949ba59abbe56e057f20f883e', '1', '1');
COMMIT;

-- ----------------------------
-- Procedure structure for KeluarStok
-- ----------------------------
DROP PROCEDURE IF EXISTS `KeluarStok`;
delimiter ;;
CREATE PROCEDURE `coldstorage`.`KeluarStok`(IN `xidobat` INT, IN `xkuantitas` INT)
BEGIN
	UPDATE mobat SET stok = stok-xkuantitas WHERE id = xidobat;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for MasukStok
-- ----------------------------
DROP PROCEDURE IF EXISTS `MasukStok`;
delimiter ;;
CREATE PROCEDURE `coldstorage`.`MasukStok`(IN `xidobat` INT, IN `xkuantitas` INT, IN `xharga` INT)
BEGIN
	UPDATE mobat SET stok = stok + xkuantitas, hargabeli = hargabeli + xharga WHERE id = xidobat;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
