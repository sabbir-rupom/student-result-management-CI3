-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.1.0.5598
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for result_management
DROP DATABASE IF EXISTS `result_management`;
CREATE DATABASE IF NOT EXISTS `result_management` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `result_management`;

-- Dumping structure for table result_management.students_info
CREATE TABLE IF NOT EXISTS `students_info` (
  `student_id` int(10) NOT NULL AUTO_INCREMENT,
  `stu_name` varchar(50) NOT NULL,
  `stu_roll` varchar(50) NOT NULL,
  `reg` varchar(50) NOT NULL,
  `board` varchar(50) NOT NULL,
  `institute` varchar(100) NOT NULL,
  `stu_pic` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `stu_roll_reg_board` (`stu_roll`,`reg`,`board`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table result_management.students_info: ~1 rows (approximately)
/*!40000 ALTER TABLE `students_info` DISABLE KEYS */;
INSERT INTO `students_info` (`student_id`, `stu_name`, `stu_roll`, `reg`, `board`, `institute`, `stu_pic`) VALUES
	(1, 'Karim', '1111', '1000', 'rajshahi', 'New Degree College, Rajshahi', '');
/*!40000 ALTER TABLE `students_info` ENABLE KEYS */;

-- Dumping structure for table result_management.students_results
CREATE TABLE IF NOT EXISTS `students_results` (
  `result_sl` int(10) NOT NULL AUTO_INCREMENT,
  `student_id` int(10) NOT NULL DEFAULT 0,
  `b_m` int(4) NOT NULL,
  `b_g` varchar(10) NOT NULL,
  `b_c` float NOT NULL,
  `e_m` int(10) NOT NULL,
  `e_g` varchar(10) NOT NULL,
  `e_c` float NOT NULL,
  `m_m` int(10) NOT NULL,
  `m_g` varchar(10) NOT NULL,
  `m_c` float NOT NULL,
  `s_m` int(10) NOT NULL,
  `s_g` varchar(10) NOT NULL,
  `s_c` float NOT NULL,
  `ss_m` int(10) NOT NULL,
  `ss_g` varchar(10) NOT NULL,
  `ss_c` float NOT NULL,
  `r_m` int(10) NOT NULL,
  `r_g` varchar(10) NOT NULL,
  `r_c` float NOT NULL,
  `grade_alpha` varchar(10) NOT NULL,
  `cgpa` float NOT NULL,
  `result` varchar(10) NOT NULL,
  PRIMARY KEY (`result_sl`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table result_management.students_results: ~1 rows (approximately)
/*!40000 ALTER TABLE `students_results` DISABLE KEYS */;
INSERT INTO `students_results` (`result_sl`, `student_id`, `b_m`, `b_g`, `b_c`, `e_m`, `e_g`, `e_c`, `m_m`, `m_g`, `m_c`, `s_m`, `s_g`, `s_c`, `ss_m`, `ss_g`, `ss_c`, `r_m`, `r_g`, `r_c`, `grade_alpha`, `cgpa`, `result`) VALUES
	(1, 1, 40, 'C', 2, 70, 'A', 4, 50, 'B', 3, 60, 'A-', 3.5, 87, 'A+', 5, 80, 'A+', 5, 'A-', 3.75, 'Passed');
/*!40000 ALTER TABLE `students_results` ENABLE KEYS */;

-- Dumping structure for table result_management.user_admin
CREATE TABLE IF NOT EXISTS `user_admin` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table result_management.user_admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_admin` DISABLE KEYS */;
INSERT INTO `user_admin` (`admin_id`, `name`, `email`, `pass`, `status`) VALUES
	(1, 'Sabbir Hossain', 'a@a.com', '$2y$12$NojPtQRFi3dgfSVKpc1B9idTEuN3cBScszNHP9sw5jtS38n2tVEGi', 1);
/*!40000 ALTER TABLE `user_admin` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
