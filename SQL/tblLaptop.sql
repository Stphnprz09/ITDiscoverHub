-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 21, 2024 at 11:27 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbITDiscoverHub`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblLaptop`
--

CREATE TABLE `tblLaptop` (
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `os` varchar(255) NOT NULL,
  `processor` varchar(255) NOT NULL,
  `RAM` varchar(255) NOT NULL,
  `Storage` varchar(255) NOT NULL,
  `releaseDate` date DEFAULT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblLaptop`
--

INSERT INTO `tblLaptop` (`brand`, `model`, `os`, `processor`, `RAM`, `Storage`, `releaseDate`, `price`) VALUES
('Dell', 'Dell New Inspiron 15.6', 'Windows 11 Home ', 'Intel Core i3, i5, or i7, or AMD Ryzen 3, 5, or 7', '8GB', '128GB', '2023-10-25', 422.5),
('Dell', 'Dell XPS 13', 'Windows 11 Home', '12th Gen Intel® Core™ i5-1230U ', '8GB', '256GB', '2024-01-18', 1149.99),
('Dell', 'Dell Latitude 5430 ', 'Windows 11 Pro', '12th Gen Intel® Core™ processors, ranging from i3 to i7', '8GB', '256GB', '2022-03-31', 695),
('Dell', 'Dell Vostro 3510', 'Windows 11 Home', '11th Generation Intel® Core i3, i5 or i7 processors', '4GB', '256GB', '2021-08-04', 1398.99),
('Dell', 'Dell g15 5521 gaming', 'Windows 11 Home', '13th Gen Intel® Core™ i5-13450HX ', '8GB', '256GB', '2022-05-16', 2354.23),
('Samsung', 'Galaxy Book 3 Pro 360', 'Windows 11 Home', 'Intel Core i5-1340P (up to 5.4GHz) 12th Gen', '16GB', '512GB', '2023-02-01', 1185.99),
('Samsung', 'Samsung Galaxy Book2 Business Laptop', 'Windows 11 Pro', 'Intel® Core™ i5-1235U vPro ', '16GB', '256GB', '2022-02-27', 1370.85),
('Samsung', 'Samsung Galaxy Book2 Pro', 'Windows 11 Home', '12th Gen Intel® Core™ i5', '16GB', '512GB', '2022-02-27', 1312.22),
('Samsung', 'Samsung XE303c12 11.6', 'Chrome OS', 'Samsung Exynos 5250 dual-core 1.7GHz', '2GB', '32GB', '2012-09-18', 28),
('Samsung', 'Samsung Chromebook 4 (XE310XBA-K01US)', 'Chrome OS', 'Intel Celeron N4000 (1.1 GHz base, up to 2.6 GHz burst)', '4GB', '32GB', '2019-10-05', 175),
('HP', 'HP Pavilion 15-DK0056 Gaming', 'Windows 10 Home', 'Intel Core i5-9300H ', '8GB', '256GB', '2019-08-20', 888),
('HP', 'HP Envy 13th Gen Intel Core i5-1335U', 'Windows 11 Home', '13th Gen Intel Core i5-1335U ', '8GB', '512GB', NULL, 716.24),
('HP', 'HP Spectre X360 14-EF0013DX 13.5\" 3k2k UWVA Touch Laptop', 'Windows 11 Home', '13th Gen Intel Core i5-1335U ', '8GB', '512GB', '2024-01-08', 1399),
('HP', 'HP Laptop Brand New Original Elitebook 820 G1/840 ', 'Windows 8.1 Pro', '4th generation Intel Core processors', '4GB', '128GB', '2013-10-01', 185.74),
('HP', 'HP Omen 16-B0002TX Gaming Laptop', 'Windows 11 Home', 'Intel® Core™ i5-11400H ', '16GB', '512GB', '2022-05-18', 1126.9);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
