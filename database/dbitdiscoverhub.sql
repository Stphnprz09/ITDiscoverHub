-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2024 at 07:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbitdiscoverhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `email`, `password`) VALUES
('Andrea Balaba', 'admin_Balaba@IDH.com', '1111'),
('Danica Malana', 'admin_Malana@IDH.com', '1111'),
('Einha Muday', 'admin_Muday@IDH.com', '1111'),
('Henry Torres', 'admin_Torres@IDH.com', '1111'),
('Kristine Lacampuenga', 'admin_Lacampuenga@IDH.com', '1111'),
('Kyle Castronuevo', 'admin_Castronuevo@IDH.com', '1111'),
('Stephen Perez', 'admin_Perez@IDH.com', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `tbllaptop`
--

CREATE TABLE `tbllaptop` (
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `os` varchar(255) NOT NULL,
  `processor` varchar(255) NOT NULL,
  `RAM` varchar(255) NOT NULL,
  `Storage` varchar(255) NOT NULL,
  `releaseDate` date DEFAULT NULL,
  `price` float NOT NULL,
  `imageFileName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbllaptop`
--

INSERT INTO `tbllaptop` (`brand`, `model`, `os`, `processor`, `RAM`, `Storage`, `releaseDate`, `price`, `imageFileName`) VALUES
('Dell', 'Dell New Inspiron 15.6', 'Windows 11 Home ', 'Intel Core i3, i5, or i7, or AMD Ryzen 3, 5, or 7', '8GB', '128GB', '2023-10-25', 422.5, 'dell-inspiron15.6.jpg'),
('Dell', 'Dell XPS 13', 'Windows 11 Home', '12th Gen Intel® Core™ i5-1230U ', '8GB', '256GB', '2024-01-18', 1149.99, 'Dell-XPS-13.jpg'),
('Dell', 'Dell Latitude 5430', 'Windows 11 Pro', '12th Gen Intel® Core™ processors, ranging from i3 to i7', '8GB', '256GB', '2022-03-31', 695, 'Dell-Latitude-5430.jpeg'),
('Dell', 'Dell Vostro 3510', 'Windows 11 Home', '11th Generation Intel® Core i3, i5 or i7 processors', '4GB', '256GB', '2021-08-04', 1398.99, 'Dell-Vostro-3510.jpeg'),
('Dell', 'Dell g15 5521 gaming', 'Windows 11 Home', '13th Gen Intel® Core™ i5-13450HX ', '8GB', '256GB', '2022-05-16', 2354.23, 'Dellg15.jpg'),
('Samsung', 'Galaxy Book 3 Pro 360', 'Windows 11 Home', 'Intel Core i5-1340P (up to 5.4GHz) 12th Gen', '16GB', '512GB', '2023-02-01', 1185.99, 'Samsung-Galaxy-Book-Pro.jpg'),
('Samsung', 'Samsung Galaxy Book2', 'Windows 11 Pro', 'Intel® Core™ i5-1235U vPro ', '16GB', '256GB', '2022-02-27', 1370.85, 'Samsung-Galaxy-Business.jpeg'),
('Samsung', 'Samsung Galaxy Book2 Pro', 'Windows 11 Home', '12th Gen Intel® Core™ i5', '16GB', '512GB', '2022-02-27', 1312.22, 'Samsung-Galaxy-Book2-Pro.jpg'),
('HP', 'HP Pavilion 15-DK0056 Gaming', 'Windows 10 Home', 'Intel Core i5-9300H ', '8GB', '256GB', '2019-08-20', 888, 'HP-Pavilion-15-DK0056-Gaming.jpg'),
('HP', 'HP Envy 13th Gen', 'Windows 11 Home', '13th Gen Intel Core i5-1335U ', '8GB', '512GB', NULL, 716.24, 'HP-Envy-13th-Gen-Intel-Core-i5-1335U.jpeg'),
('HP', 'HP Spectre X360', 'Windows 11 Home', '13th Gen Intel Core i5-1335U ', '8GB', '512GB', '2024-01-08', 1399, 'HP-Spectre.jpeg'),
('HP', 'HP Elitebook 820 G1/840', 'Windows 8.1 Pro', '4th generation Intel Core processors', '4GB', '128GB', '2013-10-01', 185.74, 'HP-Elitebook.jpg'),
('HP', 'HP Omen 16-B0002TX', 'Windows 11 Home', 'Intel® Core™ i5-11400H ', '16GB', '512GB', '2022-05-18', 1126.9, 'HP-Omen.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tblsmartphone`
--

CREATE TABLE `tblsmartphone` (
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `screen` text NOT NULL,
  `os` varchar(255) NOT NULL,
  `chipset` varchar(255) NOT NULL,
  `GPU` varchar(255) NOT NULL,
  `RAM` varchar(255) NOT NULL,
  `Storage` varchar(255) NOT NULL,
  `releaseDate` date DEFAULT NULL,
  `Price` float NOT NULL,
  `imageFileName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsmartphone`
--

INSERT INTO `tblsmartphone` (`brand`, `model`, `screen`, `os`, `chipset`, `GPU`, `RAM`, `Storage`, `releaseDate`, `Price`, `imageFileName`) VALUES
('Samsung', 'Samsung Galaxy S23 Ultra', '6.8-inch QHD+ Dynamic AMOLED 2X Display (1440 x 3088 Pixels, 501 ppi) with Corning Gorilla Glass Victus 2, 19.3:9 Aspect Ratio, 120Hz Refresh Rate, HDR10+, 1,750nits peak brightness, and punch-hole', 'Android 13 with One Ui 5.1', 'Qualcomm Snapdragon 8 Gen 2 Mobile Platform for Galaxy', 'Adreno 740', '12GB', '256GB', '2023-02-17', 829.5, 'Samsung Galaxy S23 Ultra.jpeg'),
('Samsung', 'Samsung Galaxy Z Flip 5', '6.7-inch Foldable FHD+ Dynamic AMOLED 2X Main Display (1080 x 2640 Pixels, 426 ppi) with 22:9 Aspect Ratio, 120Hz Refresh Rate, HDR10+, 1200 nits peak brightness, and punch-hole', 'Android 13 with One UI 5.1.1', 'Qualcomm Snapdragon 8 Gen 2 (4 nm)', 'Adreno 740', '8 GB', '256GB', '2023-08-11', 874.99, 'Samsung Galaxy Z Flip 5.jpg'),
('Samsung', 'Samsung Galaxy S23 FE', '6.4-inch FHD+ AMOLED Display (1080 x 2340 Pixels, 403 ppi) with Corning Gorilla Glass 5, 19.5:9 Aspect Ratio, 120Hz Refresh Rate, 1,450 nits peak brightness, HDR10+, and punch-hole', 'Android 13 with One UI 5.1', 'Exynos 2200', 'Xclipse 920', '8 GB', '128GB', '2023-10-04', 559.99, 'Samsung Galaxy S23 FE.jpg'),
('Samsung', 'Samsung Galaxy A05s', '6.7-inch FHD+ PLS LCD Display (1080 x 2400 Pixels, 393 ppi) with 20:9 Aspect Ratio, 90Hz Refresh Rate, and notch', 'Android 13 with One UI', 'Qualcomm Snapdragon 680 (6 nm)', 'Adreno 610', '4 GB', '128GB', '2023-10-18', 156.36, 'Samsung Galaxy A05s.jpeg'),
('Samsung', 'Samsung Galaxy A54 5G', '6.4-inch FHD+ Super AMOLED Display (1080 x 2340 Pixels, 403 ppi) with Scratch Resistant Glass, 19.5:9 Aspect Ratio, 120Hz Refresh Rate, 1000nits (high brightness mode), and punch-hole', 'Android 13 with One UI 5.1', 'Samsung Exynos 1380', 'Mali-G68 MP5', '8 GB', '256GB', '2023-03-24', 425.99, 'Samsung Galaxy A54 5G.jpeg'),
('Apple', 'iPhone 15 Pro Max', '6.7-inch WUXGA+ OLED Display (1290 x 2796 Pixels, 460 ppi) with Ceramic Shield, 120Hz Refresh Rate, HDR, Dolby Vision, 2000nits peak brightness, and Dynamic Island', 'iOS17', 'Apple A17 Pro (3 nm)', 'Apple 6-core GPU', '8 GB', '256GB', '2023-09-22', 84, 'iPhone 15 Pro Max.jpg'),
('Apple', 'iPhone 15 Pro', '6.1-inch FHD+ OLED Display (1179 x 2556 Pixels, 460 ppi) with Ceramic Shield, 120Hz Refresh Rate, HDR, Dolby Vision, 2000nits peak brightness, and Dynamic Island', 'iOS17', 'Apple A17 Pro', 'Apple 6-core GPU', '8 GB', '128GB', '2023-09-22', 70, 'iPhone 15 Pro.jpg'),
('Apple', 'iPhone 15', '6.1-inch FHD+ OLED Display (1179 x 2556 Pixels, 460 ppi) with Ceramic Shield, 60Hz Refresh Rate, HDR, Dolby Vision, 2000nits peak brightness, and Dynamic Island', 'iOS17', 'Apple A16 Bionic', '5-core Apple GPU', '6 GB', '128GB', '2023-09-13', 56, 'iPhone 15.jpg'),
('Apple', 'iPhone 15 Plus', '6.7-inch WUXGA+ OLED Display (1290 x 2796 Pixels, 460 ppi) with Ceramic Shield, 60Hz Refresh Rate, HDR, Dolby Vision, 2000nits peak brightness, and Dynamic Island', 'iOS17', 'Apple A16 Bionic', '5-core Apple GPU', '6 GB', '128GB', '2023-09-13', 63, 'iPhone 15 Plus.jpg'),
('Apple', 'iPhone 14 Pro Max', '6.7-inch WUXGA+ Super Retina XDR OLED Display (1290 x 2796 Pixels, 460 ppi) with Ceramic Shield, 19.5:9 Aspect Ratio, 120Hz ProMotion refresh rate, HDR, Dolby Vision, and HDR10 1,000 nits max brightness, 2,000 nits peak brightness Pill-shaped \"Dynamic Island\" screen cutout', 'iOS16', 'Apple A16 Bionic', '5-core Apple GPU', '6 GB', '128GB', '2023-09-08', 77, 'iPhone 14 Pro Max.jpeg'),
('Xiaomi', 'Xiaomi 13 Pro', '6.73-inch QHD+ LTPO AMOLED Display (1440 x 3200 Pixels, 522 ppi) with Corning Gorilla Glass Victus, 20:9 Aspect Ratio, 120Hz Refresh Rate, Dolby Vision, HDR10+, 1200nits brightness, 1900nits (peak), and punch-hole', 'Android 13 with MIUI 14', 'Qualcomm Snapdragon 8 Gen 2', 'Adreno 740', '12 GB', '256GB', '2023-03-01', 59, 'Xiaomi 13 Pro.jpg'),
('Xiaomi', 'Xiaomi 13', '6.36-inch FHD+ AMOLED Display (1080 x 2400 Pixels, 414 ppi) with Corning Gorilla Glass 5, 20:9 Aspect Ratio, 120Hz Refresh Rate, Dolby Vision, HDR10+, 1200nits brightness, 1900nits (peak), and punch-hole', 'Android 13 with MIUI 14', 'Qualcomm Snapdragon 8 Gen 2', 'Adreno 740', '8 GB', '256GB', '2023-03-01', 44, 'Xiaomi 13.jpeg'),
('Xiaomi', 'Xiaomi 13T', '6.67-inch WFHD+ AMOLED Display (1220 x 2712 Pixels, 446 ppi) with Corning Gorilla Glass 5, 20:9 Aspect Ratio, 144Hz Refresh Rate, 2600nits peak brightness, Dolby Vision, HDR10+, and punch-hole', 'Android 13 with MIUI 14', 'MediaTek Dimensity 8200 Ultra (4 nm)', 'Mali-G610 MC6', '12 GB', '256GB', '2023-09-26', 26, 'Xiaomi 13T.jpg'),
('Xiaomi', 'Xiaomi 12T Pro', '6.67-inch WFHD+ AMOLED Display (1220 x 2712 Pixels, 446 ppi) with Corning Gorilla Glass 5, 20:9 Aspect Ratio, 120Hz Refresh Rate, Dolby Vision, HDR10+, and punch-hole 900 nits (peak), 500 nits (typ) brightness', 'Android 12 with MIUI 13', 'Qualcomm Snapdragon 8+ Gen 1', 'Adreno 730', '12 GB', '256GB', '2022-11-17', 37, 'Xiaomi 12T Pro.jpeg'),
('Xiaomi', 'Xiaomi 12T', '6.67-inch WFHD+ AMOLED Display (1220 x 2712 Pixels, 446 ppi) with Corning Gorilla Glass 5, 20:9 Aspect Ratio, 120Hz Refresh Rate, HDR10+, and punch-hole', 'Android 12 with MIUI 13', 'MediaTek DImensity 8100-Ultra', 'Mali-G610 MC6', '8 GB', '256GB', '2022-11-17', 26, 'Xiaomi 12T.jpeg'),
('OPPO', 'OPPO Find N3 Flip', '6.8-inch Foldable FHD+ AMOLED Main Display (1080 x 2520 Pixels, 403 ppi) with Ultra Thin Glass, 21:9 Aspect Ratio, 120Hz Refresh Rate, 1600 nits peak brightness, HDR10+, and punch-hole 3.26-inch VGA+ AMOLED Secondary Display (382 x 720 Pixels, 250 ppi) with 60Hz Refresh Rate, 900 nits peak brightness', 'Android 13 with Color OS 13.2', 'MediaTek Dimensity 9200 (4 nm)', 'Immortalis-G715 MC11', '12 GB', '256GB', '2023-08-29', 64, 'OPPO Find N3 Flip.jpg'),
('OPPO', 'OPPO Reno10 Pro+', '6.74-inch FHD+ AMOLED Display (1240 x 2772 Pixels, 451 ppi) with AGC Dragontrail Star 2, 20:9 Aspect Ratio, 120Hz Refresh Rate, 1400nits peak brightness, 1100nits HBM, HDR10+, and punch-hole', 'Android 13 with Color OS 13.1', 'Qualcomm Snapdragon 8+ Gen 1 (4 nm)', 'Adreno 730', '12 GB', '256GB', '2023-08-03', 39, 'OPPO Reno10 Pro+.jpg'),
('OPPO', 'OPPO Reno10 Pro', '6.7-inch FHD+ AMOLED Display (1080 x 2412 Pixels, 394 ppi) with AGC Dragontrail Star 2, 20:9 Aspect Ratio, 120Hz Refresh Rate, 950nits peak brightness, HDR10+, and punch-hole', 'Android 13 with Color OS 13', 'Qualcomm Snapdragon 778G (6 nm)', 'Adreno 642L', '12 GB', '256GB', '2023-08-03', 29, 'OPPO Reno10 Pro.jpeg'),
('OPPO', 'OPPO A98 5G', '6.72-inch FHD+ LTPS LCD Display (1080 x 2400 Pixels, 392 ppi) with 20:9 Aspect Ratio, 120Hz Refresh Rate, 680 nits max brightness, and punch-hole', 'Android 13 with Color OS 13.1', 'Qualcomm Snapdragon 695', 'Adreno 619', '8 GB', '256GB', '2023-09-14', 18, 'OPPO A98 5G.jpg'),
('OPPO', 'OPPO A58', '6.72-inch FHD+ LTPS LCD Display (1080 x 2400 Pixels, 391 ppi) with 20:9 Aspect Ratio, 60Hz Refresh Rate, 680 nits max brightness, and punch-hole', 'Android 13 with Color OS 13.1', 'MediaTek Helio G85', 'Mali-G52 MC2', '6 GB', '128GB', '2023-08-25', 9, 'OPPO A98.jpeg'),
('Vivo', 'Vivo X80 Pro', '6.78-inch QHD+ LTPO AMOLED Display (1440 x 3200 Pixels, 517 ppi) with Corning Gorilla Glass, 20:9 Aspect Ratio, 120Hz Refresh Rate, HDR10+, and punch-hole', 'Android 12 with Funtouch OS 12', 'Qualcomm Snapdragon 8 Gen 1', 'Adreno 730', '12 GB', '256GB', '2022-06-09', 59, 'Vivo X80 Pro.jpeg'),
('Vivo', 'Vivo X80', '6.78-inch FHD+ AMOLED Display (1080 x 2400 Pixels, 388 ppi) with Corning Gorilla Glass, 20:9 Aspect Ratio, 120Hz Refresh Rate, and punch-hole', 'Android 12 with Funtouch OS 12', 'MediaTek Dimensity 9000', 'Mali-G710 MC10', '12 GB', '256GB', '2022-06-09', 45, 'Vivo X80.jpg'),
('Vivo', 'Vivo V25 Pro', '6.56-inch FHD+ AMOLED Display (1080 x 2376 Pixels, 398 ppi) with SCHOTT Xensation Glass, 19.8:9 Aspect Ratio, 120Hz Refresh Rate, HDR10+, and punch-hole', 'Android 12 with Funtouch OS 12', 'MediaTek Dimensity 1300', 'Mali-G77 MC9', '12 GB', '256GB', '2022-09-24', 29, 'Vivo V25 Pro.jpeg'),
('Vivo', 'Vivo V25e', '6.44-inch FHD+ AMOLED Display (1080 x 2404 Pixels, 409 ppi) with 20:9 Aspect Ratio, 90Hz Refresh Rate, and Halo notch', 'Android 12 with Funtouch OS 12', 'MediaTek Helio G99', 'Mali-G57 MC2', '8 GB', '256GB', '2022-09-21', 17, 'Vivo V25e.jpeg'),
('Vivo', 'Vivo V36 5G', '6.64-inch FHD+ IPS LCD Display (1080 x 2388 Pixels, 395 ppi) with 19.9:9 Aspect Ratio, 90Hz Refresh Rate, 650 nits peak brightness, and punch-hole', 'Android 13 with Funtouch OS 13', 'MediaTek Dimensity 6020', 'Mali-G57 MC2', '8 GB', '256GB', '2023-08-08', 14, 'Vivo V36 5G.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbltablet`
--

CREATE TABLE `tbltablet` (
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `screen` varchar(255) NOT NULL,
  `processor` varchar(255) NOT NULL,
  `RAM` varchar(255) NOT NULL,
  `storage` varchar(255) NOT NULL,
  `batteryLife` varchar(255) NOT NULL,
  `os` varchar(255) NOT NULL,
  `releaseDate` date NOT NULL,
  `price` float NOT NULL,
  `imageFileName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbltablet`
--

INSERT INTO `tbltablet` (`brand`, `model`, `screen`, `processor`, `RAM`, `storage`, `batteryLife`, `os`, `releaseDate`, `price`, `imageFileName`) VALUES
('Samsung', 'Galaxy Tab S9 Ultra', 'The device is equipped with a 14.6-inch Dynamic AMOLED 2X display with a resolution of 1848 x 2960 pixels.', 'Qualcomm Snapdragon 8 Gen 2', '12GB', '256GB', 'The device features a substantial 11,200mAh battery, and the actual usage time will vary based on the specific usage scenario.', 'Android 13 with One UI 5.1 on top', '2023-07-29', 1319, 'GalaxyTab.png'),
('Samsung', 'Galaxy Tab S9', '11.0-inch Dynamic AMOLED 2X display with 120Hz refresh rate and 1600 x 2560 resolution', 'Qualcomm Snapdragon 8 Gen 2', '8GB ', '128GB', 'Up to 15 hours of video playback (Wi-Fi) or 13 hours (5G)', 'Android 13', '2023-07-11', 399, 'Galaxy-Tab-S9.jpg'),
('Samsung', 'Samsung Galaxy Tab A8 Computer Tablet', 'The device boasts a 10.5-inch WUXGA+ TFT LCD display with a resolution of 1920 x 1200 pixels.', 'Octa-core (2GHz)', '4GB ', '32GB', 'The device is equipped with a 7,040mAh (typical) battery, providing up to 15 hours of video playback.', 'Android 12L', '2022-01-11', 173, 'Samsung-Galaxy-Tab-A8.jpg'),
('Samsung', 'Galaxy Tab S6 Lite 2022', '10.4-inch WUXGA+ (2000 x 1200) TFT LCD and 60Hz refresh rate', 'Qualcomm Snapdragon 732G octa-core (2.3 GHz Kryo 470 Gold + 1.8 GHz Kryo 470 Silver)', '4GB', '64GB ', '7040mAh battery and up to 15 hours of video playback (Wi-Fi)', 'Android 12 with One UI 4.1.2 ', '2023-05-23', 212.76, 'samsung-galaxy-tab-s6-lite.jpg'),
('Lenovo', 'Lenovo Tab P12 Pro', '12.7\" 3K (2944 x 1840) IPS LCD touchscreen, TDDI technology, 400 nits brightness', 'MediaTek Dimensity 7050 Octa-core CPU (2.60 GHz)', '8GB LPDDR4X', '128GB UFS 2.2', 'Up to 13 hours', 'Android 13', '2021-09-08', 699.99, 'lenovo-tab-p12-pro.jpg'),
('Lenovo', 'ThinkPad X12 Detachable', '10.6-inch 2K IPS LCD, 2000 x 1200 pixels', 'Qualcomm Snapdragon 680', '4GB ', '64GB ', '7700mAh', 'Android 12', '2021-01-11', 159.78, 'ThinkPad-X12-Detachable.jpg'),
('Lenovo', 'ThinkPad X12 Detachable', '10.6-inch 2K IPS LCD, 2000 x 1200 pixels', 'Qualcomm Snapdragon 680', '4GB ', '64GB ', '7700mAh', 'Android 12', '2021-01-11', 159.78, 'ThinkPad-X12-Detachable.jpg'),
('Lenovo', 'Lenovo Tab M11', 'The device features an 11-inch IPS LCD display with a resolution of 1200 x 1920 (2K), a brightness of 400 nits, and an anti-glare coating.', 'MediaTek Helio G88 octa-core processor (2.0 GHz)', '4GB ', '64GB ', '7040mAh', 'Android 11', '2021-01-15', 174.94, 'Lenovo-Tab-M11.jpeg'),
('Lenovo', 'Lenovo Tab P11 Plus', 'The device features an 11-inch 2K (1200 x 2000 pixels) IPS LCD display with narrow bezels, a brightness of 400 nits, and utilizes TDDI technology for enhanced touch responsiveness. Additionally, it holds Netflix HD certification.', 'MediaTek Helio G90T octa-core processor', '4GB ', '64GB ', 'Up to 15 hours of video playback', 'Android 11', '2021-07-28', 301.75, 'Lenovo-Tab-P11-Plus.jpg'),
('Lenovo', 'Lenovo Tab M8', '8\" IPS HD (1280 x 800) LCD, 350nits, 10-point multitouch', 'MediaTek Helio A22 Tab, quad-core, 2.0GHz', '2GB ', '32GB ', 'Up to 15 hours', 'Android 10 Pie', '2019-08-19', 66.53, 'Lenovo-Tab-M8.jpg'),
('Redmi', 'XIAOMI Redmi Pad', '10.61-inch 2K (1200 x 2000) IPS LCD, 90Hz refresh rate, 400 nits brightness', 'MediaTek Helio G99', '3GB', '64GB', '8000mAh', 'Android 12 with MIUI 13', '2022-05-10', 248.56, 'XIAOMI-Redmi-Pad.jpeg'),
('Redmi', 'Redmi Pad SE', 'The device is equipped with a 11-inch FHD+ LCD display boasting a resolution of 1920 x 1200 pixels', 'Qualcomm Snapdragon 680 6nm SoC', '4GB', '128GB ', '8000mAh ', 'MIUI Pad 14 based on Android 12', '2023-10-15', 195.29, 'Redmi-Pad-SE.jpg'),
('Redmi', 'Mi Pad 4 Plus (2018)', '10.1-inch IPS LCD display with a resolution of 1920 x 1200 pixels', 'Qualcomm Snapdragon 660 octa-core processor', '4GB ', '64GB ', 'Up to 15 hours of video playback', 'Android 8.1 Oreo (upgradable to Android 9 Pie)', '2018-06-02', 759.95, 'Xiaomi-Mi-Pad-4.jpg'),
('Redmi', 'XIAOMI Mi Pad 5', 'The device features an 11-inch display with a resolution of 2560 x 1600 WQHD+ (2.5K), a 120Hz refresh rate, and a brightness of 500 nits. It supports over 1 billion colors and includes DCI-P3 color gamut support.', 'Qualcomm® Snapdragon™ 860 Octa-core up to 2.96GHz', '6GB', '128GB', '8720mAh', 'MIUI 12.5 based on Android 11', '2021-08-21', 301.67, 'XIAOMI-Mi-Pad-5-Tablet.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profilePicture` varchar(100) NOT NULL DEFAULT '../images/profile-gradient-icon.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`firstName`, `lastName`, `email`, `password`, `profilePicture`) VALUES
('Andrea', 'Balaba', 'andengcute@gmail.com', '1234567', '../images/profile-gradient-icon.png'),
('Danica', 'Malana', 'danicamalana@gmail.com', '1234567', '../images/profile-gradient-icon.png'),
('Einha', 'Muday', 'einhalliahmuday@gmail.com', '1234567', '../images/profile-gradient-icon.png'),
('John Henry', 'Torres', 'johnhenrytorres@gmail.com', '1234567', '../images/profile-gradient-icon.png'),
('Kristine', 'Lacampuenga', 'kristinelacampuenga@gmail.com', '12345678', '../images/16.jpg'),
('Kyle', 'Castronuevo', 'kylecastronuevo@gmail.com', '1234567', '../images/profile-gradient-icon.png'),
('Stephen', 'Perez', 'stephenperez@gmail.com', '1234567', '../images/profile-gradient-icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `category` varchar(100) NOT NULL,
  `model` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `email`, `category`, `model`) VALUES
(12, 'einhalliahmuday@gmail.com', 'smartphones', 'Samsung Galaxy S23 FE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
