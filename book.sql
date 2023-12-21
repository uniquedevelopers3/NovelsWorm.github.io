-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2023 at 04:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `novelsworm`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `name` varchar(40) NOT NULL,
  `author` varchar(40) NOT NULL,
  `genre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`name`, `author`, `genre`) VALUES
('عرين الأسد', 'أسامة المسلم', 'فانتازيا'),
('الشبح', 'جو نيسبو', 'جريمة / بوليسي'),
('رجل الثلج', 'جو نيسبو', 'جريمة / بوليسي'),
('صاحب الظل الطويل', 'جين ويبستر', 'أدب الناشئة'),
('عدوي اللدود', 'جين ويبستر', 'أدب الناشئة'),
('أنا يوسف', 'أيمن العتوم', 'تاريخي'),
('خوف', 'أسامة المسلم', 'فانتازيا / رعب'),
('بساتين عربستان', 'أسامة المسلم', 'فانتازيا');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
