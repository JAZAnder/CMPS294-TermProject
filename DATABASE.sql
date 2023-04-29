-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Apr 29, 2023 at 06:10 AM
-- Server version: 8.0.32
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MYSQL_DATABASE`
--

-- --------------------------------------------------------

--
-- Table structure for table `Books`
--

CREATE TABLE `Books` (
  `Title` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `ISBN` bigint NOT NULL,
  `Publisher` varchar(255) NOT NULL,
  `Year` int NOT NULL,
  `imagePath` varchar(255) NOT NULL DEFAULT '/images/default.png',
  `Active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`Title`, `Author`, `ISBN`, `Publisher`, `Year`, `imagePath`, `Active`) VALUES
('The Hidden Ivies, 3rd Edition: 63 of America\'s Top Liberal Arts Colleges and Universities (Greene\'s Guides)', 'Howard Greene', 62420909, 'Collins Reference', 2016, '/images/default.png', 1),
('Colleges That Change Lives: 40 Schools That Will Change the Way You Think About Colleges', 'Loren Pope', 143122304, 'Penguin Books', 2012, '/images/default.png', 1),
(' PWN the SAT: Math Guide', 'Mike McClenathan', 692984364, 'PWN Test Prep', 2022, '/images/default.png', 1),
('Magnus Chase and the Gods of Asgard', ' Rick Riordan', 1423163370, 'Disney-Hyperion', 2017, '/images/default.png', 1),
('The Lightning Thief', 'Rick Riordan', 9780786838653, 'Disney-Hyperion', 2006, '/images/default.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cookie` varchar(255) NOT NULL,
  `ISBN` bigint NOT NULL,
  `volume` int NOT NULL DEFAULT '1',
  `ID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ISBN` (`ISBN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `ISBN` FOREIGN KEY (`ISBN`) REFERENCES `Books` (`ISBN`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
