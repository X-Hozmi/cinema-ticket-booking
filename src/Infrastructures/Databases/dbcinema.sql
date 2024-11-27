SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;
-- ----------------------------
-- Table structure for employee
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `idemployee` int NOT NULL AUTO_INCREMENT,
  `employee_name` varchar(255) NULL DEFAULT NULL,
  PRIMARY KEY (`idemployee`) USING BTREE
);
-- ----------------------------
-- Records of employee
-- ----------------------------
INSERT INTO `employee`
VALUES (2, 'Abdillah Haidar Mahendro');
INSERT INTO `employee`
VALUES (3, 'imam rabbani budi putra');
INSERT INTO `employee`
VALUES (4, 'Hans');
INSERT INTO `employee`
VALUES (5, 'Gunter');
INSERT INTO `employee`
VALUES (6, 'Hozumi');
INSERT INTO `employee`
VALUES (7, 'Mayer');
-- ----------------------------
-- Table structure for movie
-- ----------------------------
DROP TABLE IF EXISTS `movie`;
CREATE TABLE `movie` (
  `idmovie` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NULL DEFAULT NULL,
  `kategori` varchar(255) NULL DEFAULT NULL,
  PRIMARY KEY (`idmovie`) USING BTREE
);
-- ----------------------------
-- Records of movie
-- ----------------------------
INSERT INTO `movie`
VALUES (2, 'ABCDEF', 'Komedi');
-- ----------------------------
-- Table structure for price
-- ----------------------------
DROP TABLE IF EXISTS `price`;
CREATE TABLE `price` (
  `idprice` int NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) NULL DEFAULT NULL,
  `total_price` decimal(10, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`idprice`) USING BTREE
);
-- ----------------------------
-- Records of price
-- ----------------------------
INSERT INTO `price`
VALUES (2, 'Premium', 3000.00);
-- ----------------------------
-- Table structure for seat
-- ----------------------------
DROP TABLE IF EXISTS `seat`;
CREATE TABLE `seat` (
  `idseat` int NOT NULL AUTO_INCREMENT,
  `nama_seat` varchar(255) NULL DEFAULT NULL,
  PRIMARY KEY (`idseat`) USING BTREE
);
-- ----------------------------
-- Records of seat
-- ----------------------------
INSERT INTO `seat`
VALUES (2, 'Depan A');
-- ----------------------------
-- Table structure for studio
-- ----------------------------
DROP TABLE IF EXISTS `studio`;
CREATE TABLE `studio` (
  `idstudio` int NOT NULL AUTO_INCREMENT,
  `nama_studio` varchar(255) NULL DEFAULT NULL,
  `jumlah_kursi_baris` int NULL DEFAULT NULL,
  `jumlah_kursi_kolom` int NULL DEFAULT NULL,
  PRIMARY KEY (`idstudio`) USING BTREE
);
-- ----------------------------
-- Records of studio
-- ----------------------------
INSERT INTO `studio`
VALUES (2, 'Gedung A1', 5, 5);
INSERT INTO `studio`
VALUES (4, 'Gedung A2', 6, 8);
INSERT INTO `studio`
VALUES (5, 'Gedung A3', 4, 4);
INSERT INTO `studio`
VALUES (6, 'Gedung B1', 10, 10);
INSERT INTO `studio`
VALUES (7, 'Gedung B2', 5, 8);
INSERT INTO `studio`
VALUES (8, 'Gedung B3', 4, 4);
-- ----------------------------
-- Table structure for jadwal
-- ----------------------------
DROP TABLE IF EXISTS `jadwal`;
CREATE TABLE `jadwal` (
  `idjadwal` int NOT NULL AUTO_INCREMENT,
  `tanggal` date NULL DEFAULT NULL,
  `jam` varchar(255) NULL DEFAULT NULL,
  `idstudio` int NULL DEFAULT NULL,
  `idmovie` int NULL DEFAULT NULL,
  `idemployee` int NULL DEFAULT NULL,
  PRIMARY KEY (`idjadwal`) USING BTREE,
  INDEX `fk_jadwal_studio`(`idstudio` ASC) USING BTREE,
  INDEX `fk_jadwal_movie`(`idmovie` ASC) USING BTREE,
  INDEX `fk_jadwal_employee`(`idemployee` ASC) USING BTREE,
  CONSTRAINT `fk_jadwal_employee` FOREIGN KEY (`idemployee`) REFERENCES `employee` (`idemployee`) ON DELETE
  SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk_jadwal_movie` FOREIGN KEY (`idmovie`) REFERENCES `movie` (`idmovie`) ON DELETE
  SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk_jadwal_studio` FOREIGN KEY (`idstudio`) REFERENCES `studio` (`idstudio`) ON DELETE
  SET NULL ON UPDATE CASCADE
);
-- ----------------------------
-- Records of jadwal
-- ----------------------------
INSERT INTO `jadwal`
VALUES (2, '2024-11-04', '11:00', 2, 2, 3);
INSERT INTO `jadwal`
VALUES (4, '2024-11-24', '12:00', 5, 2, 6);
INSERT INTO `jadwal`
VALUES (5, '2024-11-28', '15:00', 6, 2, 2);
-- ----------------------------
-- Table structure for ticket
-- ----------------------------
DROP TABLE IF EXISTS `ticket`;
CREATE TABLE `ticket` (
  `idticket` int NOT NULL AUTO_INCREMENT,
  `idjadwal` int NULL DEFAULT NULL,
  `idstudio` int NULL DEFAULT NULL,
  `idprice` int NULL DEFAULT NULL,
  `booked_seats` text NULL,
  `total_price` decimal(10, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`idticket`) USING BTREE,
  INDEX `fk_ticket_jadwal`(`idjadwal` ASC) USING BTREE,
  INDEX `fk_ticket_price`(`idprice` ASC) USING BTREE,
  INDEX `fk_studio`(`idstudio` ASC) USING BTREE,
  CONSTRAINT `fk_ticket_jadwal` FOREIGN KEY (`idjadwal`) REFERENCES `jadwal` (`idjadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ticket_price` FOREIGN KEY (`idprice`) REFERENCES `price` (`idprice`) ON DELETE
  SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk_studio` FOREIGN KEY (`idstudio`) REFERENCES `studio` (`idstudio`) ON DELETE CASCADE ON UPDATE CASCADE
);
-- ----------------------------
-- Records of ticket
-- ----------------------------
INSERT INTO `ticket`
VALUES (
    6,
    2,
    2,
    2,
    'B1, B2, B3, B4, B5, A1, A2, A3, A4, A5',
    30000.00
  );
SET FOREIGN_KEY_CHECKS = 1;