-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 29, 2024 at 04:03 PM
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
-- Database: `tinyelectronics`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindetails`
--

CREATE TABLE `admindetails` (
  `id` int(4) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phoneno` int(12) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admindetails`
--

INSERT INTO `admindetails` (`id`, `name`, `email`, `phoneno`, `password`) VALUES
(1, 'thenujan', 'thenu11@gmail.com', 786789876, '1234567890'),
(2, 'sri', 'sri22@gmail.com', 705054864, '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(1) NOT NULL,
  `name` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`) VALUES
(1, 'Hp', 'https://1000logos.net/wp-content/uploads/2017/02/Colors-HP-Logo.jpg'),
(2, 'Dell', 'https://static.vecteezy.com/system/resources/previews/021/514/860/non_2x/dell-logo-brand-computer-symbol-white-design-usa-laptop-illustration-with-black-background-free-vector.jpg'),
(3, 'Apple', 'https://media.designrush.com/inspiration_images/134802/conversions/_1511456315_653_apple-mobile.jpg'),
(4, 'Samsung', 'https://images.samsung.com/is/image/samsung/assets/za/about-us/brand/logo/mo/256_144_1.png?$512_N_PNG$');

-- --------------------------------------------------------

--
-- Table structure for table `buyproductsdetails`
--

CREATE TABLE `buyproductsdetails` (
  `id` int(4) NOT NULL,
  `uid` int(4) NOT NULL,
  `pid` int(4) NOT NULL,
  `count` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buyproductsdetails`
--

INSERT INTO `buyproductsdetails` (`id`, `uid`, `pid`, `count`) VALUES
(1, 3, 2, 1),
(2, 3, 2, 1),
(3, 3, 10, 1),
(4, 3, 4, 1),
(5, 2, 10, 3),
(6, 2, 5, 1),
(7, 3, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(4) NOT NULL,
  `model` varchar(225) NOT NULL,
  `price` int(10) NOT NULL,
  `deliveryCharge` int(10) NOT NULL,
  `image` varchar(225) NOT NULL,
  `details` varchar(225) NOT NULL,
  `count` int(4) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `discounts` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `model`, `price`, `deliveryCharge`, `image`, `details`, `count`, `brand`, `category`, `discounts`) VALUES
(1, 'iPhone 15 Pro Max', 490000, 1250, 'https://idealz.lk/wp-content/uploads/2023/09/iPhone-15-Pro-Max-Titanium.jpg', 'A17 Pro Game changing chip.\r\nTitanium, So Strong, So Light, So Pro.\r\nLongest optical zoom in iPhone ever.\r\nAll new action button\r\nA camera that captures your wildest imagination.\r\nWith 02-Years GNEXT Warranty.', 10, 'apple', 'mobile', 10),
(2, 'Samsung Galaxy S23 Ultra 5G', 420000, 0, 'https://m.media-amazon.com/images/I/51hqXIAVXAL._SX679_.jpg', 'HIGHEST PHONE CAMERA RESOLUTION: Create crystal-clear content worth sharing with Galaxy S23 Ultra’s 200MP camera — the highest camera resolution on a phone; Whether you’re posting or printing, Galaxy S23 Ultra always does the', 16, 'Samsung', 'mobile', 0),
(3, 'HP ProBook 440 G9 – i5', 235000, 1290, 'https://www.laptop.lk/wp-content/uploads/2023/09/new-02-28.jpg', 'ntel Core i5-1235U Processor\r\n– 8GB DDR4-3200 MHz RAM\r\n– 512GB PCIe NVMe M.2 SSD\r\n– 14″, FHD (1920 x 1080) Display\r\n– Intel Iris Xe Graphics\r\n– Backlit Keyboard\r\n– Silver Colour\r\n– FreeDOS', 25, 'HP', 'laptop', 15),
(4, 'Dell Gaming G15 5525 R7', 595000, 1280, 'https://dellshop.lk/wp-content/uploads/2021/12/1-8.jpg', 'AMD Ryzen(TM)7 6800H 8-Cores Processor (20M Cache, up to 4.7 GHz)\r\n– 16GB 2x8GB DDR5 4800MHz\r\n– 512GB M.2 PCIe Solid State Drive\r\n– NVIDIA(R) GeForce RTX(TM) 3060 6GB GDDR6\r\n– 15.6″ inch FHD Display 120Hz\r\n– Dark Shadow Grey.', 1, 'dell', 'laptop', 0),
(5, 'Apple Watch Series 9 45MM', 176000, 1230, 'https://lifemobile.lk/wp-content/uploads/2023/10/silver.jpg', '50M Water Resistant\r\nAlways-On Retina Display\r\nBlood Oxygen App\r\n1 Year Warranty', 0, 'apple', 'smart watch', 20),
(6, 'Nikon D7500 DSLR Camera (Body Only)', 299500, 1150, 'https://s3-ap-southeast-1.amazonaws.com/media.cameralk.com/394/1553593524_1380709.jpg', '20.9MP DX-Format CMOS Sensor and EXPEED 5 Image Processor\r\n4K UHD Video Recording\r\n1.3x-based movie image area provides a 1.3x crop of the DX sensor, and is used for recording Full HD and HD video.', 10, 'Nikon', 'camara', 14),
(7, 'JBL Partybox 110', 99999, 0, 'https://in.jbl.com/dw/image/v2/BFND_PRD/on/demandware.static/-/Sites-masterCatalog_Harman/default/dw41368c09/1_JBL_PARTYBOX_110_HERO_x2.png?sw=535&sh=535', 'Powerful JBL Original Pro Sound\r\nWhether you\'re at home or outdoors, the JBL PartyBox 110 makes your music amazing with two levels of deep, adjustable bass and powerful JBL Original Pro Sound\r\n\r\nUp to 12 hours of playtime\r\nPo', 2, 'JBL', 'speakers', 0),
(8, 'Samsung 32″ HD Smart TV', 110000, 1250, 'https://damro.lk/wp-content/uploads/2019/10/UA32N4300AR-1.jpg', '32″ HD\r\nPurcolor\r\nScreen Mirroring\r\nWide Color Enhancer (Plus)\r\nUltra Clean View\r\nTizen OS Smart\r\nSmart Hub', -1, 'Samsung', 'tv', 0),
(9, 'Samsung 43″ FHD Smart TV', 199015, 0, 'https://damro.lk/wp-content/uploads/2019/10/43T5400-web-1-548x450.jpg', '43″ FHD\r\nPurcolor\r\nScreen Mirroring\r\nWide Color Enhancer (Plus)\r\nUltra Clean View\r\nTizen OS Smart\r\nSmart Hub', 10, 'samsung', 'tv', 0),
(10, 'GAME PAD 801D', 6000, 0, 'https://www.sense.lk/images/uploads/product/52407_6075_GAME-PAD-801D-4.png', 'Interface: USB 2.0 / PS2/ PS3\r\nDimensions: 160 mm x 110 mm x 70 mm (gamepad), 65 mm x 50 mm x 10 mm (receiver)\r\nOperating distance: up to 7 m\r\nNet weight gamepad: 210 g', 2, 'logitech', 'game', 0),
(11, 'HP Intel - Core i7 Touch 14.0 FHD Notebook', 500000, 1000, 'https://cdn.buyabans.com/media/catalog/product/cache/b26914b4315099761016f66ddcabadb6/h/p/hppclpx360i711g-_m.jpg', 'Processor\r\n\r\nIntel® Core™ i7-1195G7 (up to 5.0 GHz with Intel® Turbo Boost Technology, 12 MB L3 cache, 4 cores, 8 threads)\r\n\r\nMemory\r\n\r\n16 GB DDR4-3200 MHz RAM (2 x 8 GB)\r\n\r\nStorage\r\n\r\n1 TB PCIe NVMe M.2 SSD\r\n\r\nDisplay\r\n\r\n35.', 20, 'hp', 'laptop', 10),
(12, 'HP 15 15.6\" Intel i3 13th Gen 8GB Laptop', 200000, 1000, 'https://cdn.buyabans.com/media/catalog/product/cache/b26914b4315099761016f66ddcabadb6/h/p/hppcl15fdi3_1.jpg', 'MODEL:	15-fd0148TU\r\nPROCESSOR:	\r\nIntel® CoreTM i3-1315U\r\nPROCESSOR CACHE:	10 MB L3\r\nPROCESSOR CORES:	6\r\nPROCESSOR FAMILY:	\r\n13th Generation Intel® CoreTM i3 processor\r\nCHIPSET:	\r\nIntel® Integrated SoC\r\nINTERNAL STORAGE:	\r\n256', 5, 'hp', 'laptop', 0),
(13, 'HP ENVY x360 - Intel 11th Gen i7 1165', 648988, 1000, 'https://cdn.buyabans.com/media/catalog/product/cache/b26914b4315099761016f66ddcabadb6/n/e/new_pnewsdfc.png', 'Product number-38Z26PA\r\nProduct name-HP ENVY x360 Convert 13-bd0068TU\r\nMicroprocessor-\r\nIntel® Core™ i7-1165G7 (up to 4.7 GHz with Intel® Turbo Boost Technology, 12 MB L3 cache, 4 cores, 8 threads)\r\nChipset-Intel® Integrated ', 12, 'hp', 'laptop', 10),
(14, 'Apple AirPods with Charging Case', 60000, 0, 'https://cdn.buyabans.com/media/catalog/product/cache/b26914b4315099761016f66ddcabadb6/w/e/web_3_1380.jpg', 'Designed by Apple\r\nAutomatically on, automatically connected\r\nEasy setup for all your Apple devices6\r\nQuick access to Siri by saying “Hey Siri” or setting up double tap\r\nDouble tap to play or skip forward\r\nCharges quickly in ', 4, 'apple', 'mobileacc', 0),
(15, 'Dell Inspiron 3520 – i3', 169500, 1000, 'https://techzone.lk/wp-content/uploads/2023/03/Dell-Inspiron-3520-1.jpg', '– Intel Core i3 – 1215U Processor\r\n– 8GB DDR4 RAM\r\n– 256GB M.2 NVMe SSD\r\n– 15.6″, FHD, 120Hz Refresh Rate Display\r\n– Intel UHD Graphics\r\n– Carbon Black / Platinum Silver\r\n– Windows 11 Home', 5, 'dell', 'laptop', 0),
(17, 'Dell Inspiron 5510 Intel® Core™ i5 Notebook', 285000, 1000, 'https://techzone.lk/wp-content/uploads/2022/01/1-4.jpg', 'Model	Dell Inspiron 5510 (i5) 11th Gen Processor\r\nProcessor	11th Generation Intel® Core™ i5-11320H Processor (8MB Cache, up to 4.5GHz)\r\nStorage	512GB Solid State Drive\r\nMemory	8GB, 8Gx1, DDR4, 2666MHz\r\nDisplay	15.6-inch FHD (', 1, 'dell', 'laptop', 0),
(18, 'Dell 5525 G15 Gaming Laptop – R5', 425000, 1500, 'https://techzone.lk/wp-content/uploads/2023/04/Dell-5525-G15-Gaming-Laptop-%E2%80%93-R5.jpg', 'AMD Ryzen 5 – 6800H Processor\r\n8GB DDR5 4800MHz RAM\r\n512GB PCIe SSD\r\nGeForce RTX 3050 4GB Graphics\r\n15.6″ FHD 120Hz Refresh Rate Display\r\nDark Shadow Grey Color\r\nWindows 11 Home', 1, 'dell', 'laptop', 10),
(19, 'Apple MacBook Air (MGN63LL/A)', 400000, 2000, 'https://techzone.lk/wp-content/uploads/2022/10/Apple-MacBook-Air-MGN63LL-A.jpg', 'M1 8-Core CPU\r\n8GB RAM\r\n256GB SSD\r\nWebCam/Bluetooth, Touch ID\r\n13.3″ Retine LED Blacklit Display\r\nTrue Tone Technology\r\nSpace Gray Color\r\nMac OS', 4, 'apple', 'laptop', 0),
(20, 'Apple MacBook Air M2 – MLXU3', 500000, 2500, 'https://techzone.lk/wp-content/uploads/2022/10/Apple-MacBook-Air-M2-%E2%80%93-MLXU3.jpg', 'Apple M2 8-Core CPU\r\n8GB Unified RAM\r\n256GB SSD\r\n13.6″ (diagonal) LED-backlit display with IPS Display\r\n1080p FaceTime HD Camera\r\nBacklit Magic Keyboard\r\nSilver Color\r\nmacOS', 3, 'apple', 'laptop', 10),
(21, 'Apple MacBook Air M2 – MLXW3', 500000, 2500, 'https://techzone.lk/wp-content/uploads/2022/10/Apple-MacBook-Air-M2-%E2%80%93-MLXW3-front.jpg', 'Apple M2 8-Core CPU\r\n8GB Unified RAM\r\n256GB SSD\r\n13.6″ (diagonal), LED-backlit display with IPS Display\r\n1080p FaceTime HD Camera\r\nBacklit Magic Keyboard\r\nSpace Gray Color\r\nmacOS', 5, 'apple', 'laptop', 0),
(22, 'Apple MacBook Pro 13 M2 Chip', 520000, 2500, 'https://techzone.lk/wp-content/uploads/2022/10/Apple-MacBook-Pro-13-M2-Chip-1.jpg', 'Apple M2 8-Core CPU\r\n8GB Unified RAM\r\n256GB SSD\r\n13.3″(diagonal) LED-backlit with IPS Display\r\n720p FaceTime HD camera\r\nBacklit Magic Keyboard\r\nSpace Gray Color\r\nmacOS', 2, '', 'laptop', 10),
(23, 'Razer Cynosa V2 – US GAMING KEYBOARD', 16500, 200, 'https://techzone.lk/wp-content/uploads/2021/05/2-14.jpg', 'Individually Backlit Gaming Keys\r\nPowered by Razer Chroma RGB\r\nFully Programmable Keys', 15, 'razer', 'gaming', 0),
(24, 'Razer Mamba Elite GAMING MOUSE', 21000, 200, 'https://techzone.lk/wp-content/uploads/2021/05/1-3.jpg', 'Extended Lighting Zones\r\nAdvanced Ergonomics with Improved Side Grips\r\nHybrid On-Board Memory and Cloud Storage\r\n1 year warranty', 17, 'razer', 'gaming', 0),
(25, 'Logitech G431 GAMING Headset', 22000, 200, 'https://techzone.lk/wp-content/uploads/2023/08/Logitech-G431-7.1-Surround-Sound-Gaming-Headset.jpg', 'Noice cancellation\r\nRGB coloured\r\nQuality sound', 6, 'logitech', 'gaming', 0),
(26, 'Logitech F310 Gaming Console Style Gamepad', 8000, 200, 'https://techzone.lk/wp-content/uploads/2021/04/f310-gaming-gamepad-images-500x500-1.jpg', 'Wired Gampad\r\nSPECIFICATIONS	1.8 Meter Cord\r\nConsole-Like Layout\r\n4 Switch D-Pad\r\nPackage Contents Gamepad and User documentation\r\n', 1, 'logitech', 'gaming', 0),
(27, 'Logitech G102 LIGHTSYNC RGB GAMING MOUSE', 8000, 200, 'https://techzone.lk/wp-content/uploads/2021/04/LOGITECH-G102-MOUSE.jpg', 'Wired Mouse\r\nSensor: HERO 25K\r\nUSB data format: 16 bits/axis\r\nLIGHTSPEED Wireless report rate: 1000 Hz (1ms)\r\nBluetooth report rate: 88-133 Hz (7.5-11.25 ms)\r\nMicroprocessor: 32-bit ARM', 2, 'logitech', 'gaming', 0),
(28, 'Nikon D7500 DSLR Camera with 18-140mm Lens', 332500, 500, 'https://s3-ap-southeast-1.amazonaws.com/media.cameralk.com/3057/nikon_d7500_dslr_camera_with_1492597269_1333200.jpg', '20.9MP DX-Format CMOS Sensor\r\nEXPEED 5 Image Processor\r\n3.2\" 922k-Dot Tilting Touchscreen LCD\r\n4K UHD Video Recording at 30 fps\r\n', 2, 'Nikon', 'camara', 0),
(29, 'Canon EOS 850D DSLR Camera with 18-55mm Lens', 285000, 2000, 'https://s3-ap-southeast-1.amazonaws.com/media.cameralk.com/5095/canon-frt-002-3456-ef69f7a4-11ea-8bb0-50eb71a1d0a0-%281%29.png', '24.1MP APS-C CMOS Sensor\r\nDIGIC 8 Image Processor\r\n3.0\" 1.04m-Dot Vari-Angle Touchscreen\r\nUHD 4K24p Video\r\nVertical Video Support', 1, 'cannon', 'camara', 0),
(32, 'Canon EOS 7D Mark II DSLR Camera (Body Only)', 195000, 1500, 'https://s3-ap-southeast-1.amazonaws.com/media.cameralk.com/3027/Canon-EOS-7D-Mark-II-DSLR-Camera-%28Body-Only%29.jpg', '20.2MP APS-C CMOS Sensor\r\nDual DIGIC 6 Image Processors\r\n3.0\" 1.04m-Dot Clear View II LCD Monitor\r\nFull HD 1080p/60 Video & Movie Servo AF', 4, 'canon', 'camara', 5),
(33, 'JBL Boombox 3 Wi-Fi', 216000, 500, 'https://lifemobile.lk/wp-content/uploads/2023/10/Boombox-3-WiFi.jpg', 'Massive JBL Original Pro Sound with deepest bass.\r\nWi-Fi and Bluetooth connectivity.\r\nPortability with 24 hours of battery life.\r\n6 Months Warranty', 14, 'JBL', 'speakers', 7),
(34, 'JBL Clip 3', 15000, 500, 'https://lifemobile.lk/wp-content/uploads/2019/04/JBL_Clip3_Front_Midnight-Black-1605x1605px.jpg', 'Wireless Bluetooth Streaming\r\n10 hours of playtime\r\nIPX7 waterproof\r\nIntegrated Carabiner\r\nSpeakerphone\r\nDurable Design\r\n6 Months Warranty', 11, 'JBL', 'speakers', 7),
(35, 'JBL Clip 4', 22000, 500, 'https://lifemobile.lk/wp-content/uploads/2021/08/jbl-clip-4-03.jpg', 'IP67 waterproof and dustproof\r\n10 hours of battery life\r\nWirelessly stream music from your phone, tablet, or any other Bluetooth-enabled device\r\n3 Months Warranty', 7, 'JBL', 'speakers', 7),
(36, 'Beats Pill+', 58000, 500, 'https://lifemobile.lk/wp-content/uploads/2019/12/Beats-Pill.jpg', 'Defined, pure sound quality in a portable, compact design\r\nPair and play with your Bluetooth? device\r\n12-hour rechargeable battery\r\nBuilt-in speakerphone\r\nCharge out to charge your iPhone and other devices\r\nPower adapter and ', 6, 'Beats', 'speakers', 0),
(37, 'Beats Pill Bluetooth Wireless Speaker', 3000, 200, 'https://lifemobile.lk/wp-content/uploads/2019/04/beats20pill202.jpg', 'SMALL SIZE BIG SOUND\r\nBLUETOOTH CONFERENCING\r\nTOTALLY PORTABLE\r\n3 MONTHS WARRANTY', 3, 'Beats', 'speakers', 0),
(38, 'Beats Pill + - Beats by Dre', 38000, 500, 'https://techmart.lk/pub/media/catalog/product/cache/1/image/500x500/e9c3970ab036de70892d86c6d221abfe/b/e/beatspillplus.png', 'Weight (kg): 0.745\r\nHeight (mm): 63\r\nLength of Cable (m): 0.21\r\nType of Jack: Lightning to USB-A charging cable', 4, 'Beats', 'speakers', 0),
(39, 'Apple Watch Series 7', 120000, 400, 'https://appleasia.lk/wp-content/uploads/2023/04/I-Watch-Series-7-Midnigth-41mm-2.jpg', '1 Year Apple Care Warranty\r\nSize   41mm 45mm\r\nGPS Connectivity\r\nColors  Blue and Green\r\nBrand Apple\r\n\r\n', 18, 'apple', 'smart watch', 11),
(40, 'Apple Watch Ultra 2 Alpine Loop', 300000, 400, 'https://appleasia.lk/wp-content/uploads/2023/09/Apple-Watch-Ultra-2-Blue-Alp-860x860.webp', 'colour  blue and indigo\r\nbrand apple\r\n1 year warranty\r\nwater proof\r\n', 16, 'apple', 'smart watch', 11),
(41, 'Apple Watch Series 9 Aluminum', 150000, 400, 'https://appleasia.lk/wp-content/uploads/2023/09/Appe-Watch-aluminum-midnight-3.webp', 'brand apple\r\ncolour midnight pink and red\r\naluminium\r\nwater proof\r\nGPS', 6, 'apple', 'smart watch', 0),
(42, 'Samsung Galaxy Watch 4 Classic 42MM (Black)', 65000, 300, 'https://lifemobile.lk/wp-content/uploads/2021/08/Samsung-Galaxy-Watch4-Classic-42MM-Black.jpg', 'The watch that knows you best\r\nThis rotating bezel turns more than heads\r\nA new day. A new watch face\r\n6 Months Warranty', 11, 'samsung', 'smart watch', 0),
(43, 'Samsung Galaxy Watch 6 43MM Classic', 100000, 300, 'https://lifemobile.lk/wp-content/uploads/2023/08/watch6.jpg', 'A Sleep Couch on your wrist\r\nTrack Your Workouts\r\nChipset Exynos W930\r\n6 Months Warranty', 7, 'samsung', 'smart watch', 0),
(44, 'Samsung Galaxy Watch 4 Classic 42MM (Silver)', 70000, 300, 'https://lifemobile.lk/wp-content/uploads/2021/09/Samsung-Galaxy-Watch-4-Classic-46mm-Black.jpg', 'The watch that knows you best\r\nThis rotating bezel turns more than heads\r\nA new day. A new watch face\r\n6 Months Warranty', 14, 'samsung', 'smart watch', 0),
(45, 'Samsung T Series TU7000 55 Inch Crystal UHD 4K Smart TV', 200000, 2000, 'https://lifemobile.lk/wp-content/uploads/2020/11/Samsung-T-Series-TU7000-55-Inch-Crystal-UHD-4K-Smart-TV.jpg', 'Crystal Processor 4K\r\nA sleek and elegant design that draws you to the purest picture\r\nMake life more connected. Samsung TV works seamlessly with AirPlay 2', 0, 'samsung', 'tv', 0),
(46, 'SAMSUNG AU7700 CRYSTAL 4K UHD SMART TV 43\"', 260000, 1000, 'https://www.singhagiri.lk/cdn/shop/products/samsung_au7700_crystal_4k_uhd_smart_tv_43__front_view_600x.jpg?v=1689049696', 'LED screen 43\"\r\nCrystal Processor 4K\r\nSmart tv\r\nsurround sound system\r\n', 4, 'samsung', 'tv', 10),
(47, 'Samsung 32\" UHD Curved Monitor', 127000, 1000, 'https://objectstorage.ap-mumbai-1.oraclecloud.com/n/softlogicbicloud/b/cdn/o/products/600-600/b_UR59C_001_Front_Black--1646805190.jpg', 'Realistic viewing experience with the world†s most curved 4K UHD screen\r\nIncrediby vibrant and darker blacks with 1 billion colors & 2500:1 contrast ratio\r\nSleek and stylish design with V-slim metal stand', 7, 'samsung', 'monitor', 13),
(48, 'SAMSUNG 23.8″T45F 75HZ LED/HD IPS MONITOR', 65000, 300, 'https://www.nexxcom.lk/wp-content/uploads/2023/10/SAMSUNG-23.8T45F-LEDHD-IPS-MONITOR-min.png', '24″ (23.8″ Viewable)\r\nIPS FHD 1920 x 1080\r\n75 Hz\r\n1,000:1\r\n16.7 Million\r\n1 x DisplayPort 1.2 / 2 x HDMI 1.4\r\nHDMI Cable\r\nDisplay Port Cable\r\nQuick Setup Guide', 9, 'samsung', 'monitor', 12),
(49, 'DELL E2216H 22″ Full HD 1080p LED MONITOR (Refurbished)', 16000, 300, 'https://www.nexxcom.lk/wp-content/uploads/2023/01/DELL-E2216H-22%E2%80%B3-Full-HD-1080p-LED-MONITOR-Refurbished-copy-min.png', '22\" LED screen\r\n1920 x 1080 resolution\r\nHDMI\r\nThunderbolt N/A\r\n\r\n\r\n', 20, 'dell', 'monitor', 0),
(50, 'DELL ULTRASHARP U2312HMT 23″ LED/ FHD / IPS / USB MONITOR (Refurbished)', 20000, 500, 'https://www.nexxcom.lk/wp-content/uploads/2023/12/DELL-UltraSharp-U2312HMT-23-FULL-HD-IPS-LED-MONITOR-copy-min.png', '1920 x 1080 Full HD Resolution @ 60Hz\r\n8ms (GTG) Response Time\r\nVGA, DVI-D, DisplayPort Video Inputs\r\n4 x USB 2.0 Type A 1 x USB 2.0 Type B Ports\r\n16.7 Million Color Support\r\nHDCP Support\r\nHeight\r\nSwivel\r\nTilt Adjustable\r\nVES', 12, 'dell', 'monitor', 0),
(51, 'Ssd Adata 1tb Su650 Sata (3y)', 20000, 0, 'Ssd Adata 1tb Su650 Sata (3y)', 'Sequential reads/writes performance up to 520/450MB/s\r\nLower power consumption and noise level\r\nFree downloadable ADATA SSD File Management and Data migration software\r\nLDPC (Low Density Parity Check) error correcting code to', 16, 'adata', 'storage', 0),
(52, 'Ssd Adata Xpg 128gb M.2 Nvme Sx6000 (3y)', 6400, 0, 'https://www.barclays.lk/mmBC/Images/SSDA0864.jpg', 'TBW: 120TB\r\nNVMe 1.3 support\r\n3D NAND Flash for higher capacity and durability\r\nAdvanced LDPC ECC Technology\r\nHMB (Host Memory Buffer) and SLC Caching\r\nCompact M.2 2280 form factor - ideal for high-end desktops notebooks and ', 20, 'adata', 'storage', 0),
(53, 'Ext Hard Asus 1tb Usb 3.1 Rgb (1y)', 18500, 0, 'https://www.barclays.lk/mmBC/Images/HDPA0001.jpg', 'Color - Black\r\nInterface - USB3.2 Gen1\r\nSpeed - 5Gbps\r\nCapacity - 1TB\r\nOS Compatility - Windows® 7\r\nWindows® 8 / 8.1\r\nWindows® 10\r\nMac OS® X 10.6 and above\r\nAura System Requirement - Windows® 8 / 8.1 64bit\r\nWindows® 10 64bit\r', 9, 'asus', 'storage', 0),
(54, 'Ext Hard Toshiba Canvio 1tb Usb 3.0(2y)', 18500, 0, 'https://www.barclays.lk/mmBC/Images/HDPT4769.jpg', 'Capacity: 1 TB \r\nWeight: 241.00GM\r\nBrands: Toshiba\r\nWarranty: 2 Years (700 Days Carry In Warranty*)\r\nStock: Yes\r\nModel: DTP210', 7, 'Toshiba', 'storage', 0),
(55, 'Samsung Galaxy S24 Ultra 5G 12GB RAM 256GB', 570000, 1500, 'https://lifemobile.lk/wp-content/uploads/2024/01/ultra-1.jpg', 'Display: 6.8″ 120HZ Refresh rate\r\nChip: Qualcomm SM8650-AC Snapdragon 8 Gen 3 (4 nm)\r\nBattery: 5000 mAh Battery\r\nPre-order\r\n2 Years Company and One Time Screen Replacement Warranty', 20, 'samsung', 'mobile', 0),
(56, 'Samsung Galaxy Fold 5 12GB RAM 512GB', 532000, 1500, 'https://lifemobile.lk/wp-content/uploads/2023/08/fold5.jpg', 'Display: Foldable Dynamic AMOLED 2X\r\nCamera: Triple Camera\r\nBattery: Li-Po 4400 mAh\r\n1 Year Warranty', 19, 'samsung', 'mobile', 0),
(57, 'Apple iPhone 15 Pro 1TB', 285000, 1500, 'https://lifemobile.lk/wp-content/uploads/2023/09/15pro3.jpg', 'Processor: Apple A17 Bionic\r\nDisplay: 6.1 inches\r\nCamera: Quad Camera\r\nBattery: Li-Ion 4300mAh\r\n1 Year Warranty', 17, 'apple', 'mobile', 0),
(58, 'Apple iPhone 15 Plus 256GB', 350000, 1500, 'https://lifemobile.lk/wp-content/uploads/2023/09/15-3.png', 'Processor: Apple A16 Bionic\r\nDisplay: 6.71 inches\r\nCamera: Dual Camera\r\nBattery: Li-Ion 4532mAh\r\n1 Year Warranty', 15, 'apple', 'mobile', 0),
(59, 'Joyroom L-P210 20W PD Fast Portable Charger', 8000, 0, 'https://lifemobile.lk/wp-content/uploads/2023/12/1-74.jpg', 'Compatible with iPhone 12/13 whole series for PD 20W fast charge, and backward compatible with iPhone8-11 whole series for 18W fast charge. \r\nSmall and portable, easy to carry.\r\nIntelligent chip, harmless to battery, \r\n6 Mont', 14, 'Joyroom', 'mobileacc', 0),
(60, 'oyroom JR-TCF05 20W A+C Dual-Port Charger With Type-C to Lightning Cable', 7500, 0, 'https://lifemobile.lk/wp-content/uploads/2023/12/tcf05.jpg', 'Fast charge your devices with the JOYROOM TCF05 20W A+C Dual-Port Charger. It features a PD 20W fast charging port and a QC 3.0 fast charging port, so you can charge your devices quickly and efficiently.\r\nIncludes a Type-C to', 10, 'Joyroom', 'mobileacc', 0),
(61, 'JBL Endurance Run 2 Wired', 12000, 0, 'https://lifemobile.lk/wp-content/uploads/2023/08/run.jpg', 'Hands-free calls\r\nJBL Pure Bass Sound\r\nIPX5 Water Resistant Rating\r\n3 Months Warranty', 3, 'JBL', 'mobileacc', 0),
(62, 'Logitech M240 Silent Bluetooth Wireless Mouse', 9000, 0, 'https://lifemobile.lk/wp-content/uploads/2023/12/cyber-product-temp-copy.jpg', 'With its voice input function, the VOICE M240 significantly increases input speed as compared to typing.\r\nThanks to smart speech recognition technology, users can dictate text that is digitalised.\r\nBluetooth\r\nSilentTouch tech', 17, 'logitech', 'pc', 0),
(63, 'Logitech Ergo M575 Wireless Mouse', 23000, 0, 'https://lifemobile.lk/wp-content/uploads/2023/12/01-2.jpg', '2.4 GHz & Bluetooth Connectivity\r\nUp to 2000 dpi Setting\r\nTrackball Control\r\nUp to 33-Foot Range\r\nUp to 24-Month Battery Life\r\nWindows, macOS & iPadOS Compatible\r\n6 Months Warranty', 8, 'logitech', 'pc', 0),
(64, 'Apple MK293 Magic Keyboard with Touch ID', 55000, 0, 'https://lifemobile.lk/wp-content/uploads/2022/05/Mk293.png', 'Comfortable and precise typing\r\nEasy, and secure authentication\r\n1 Year Warranty', 4, 'apple', 'pc', 0),
(65, 'Logitech Pop Keys Mechanical Emoji Wireless Keyboard', 45000, 0, 'https://lifemobile.lk/wp-content/uploads/2023/06/Logitech-POP-Keys-blast-1.jpg', 'Unleash personality onto your deskspace and beyond with POP Keys.\r\nDesigned for a positive future.\r\nCompact and comfy.\r\n6 Months Warranty', 15, 'logitech', 'pc', 0);

-- --------------------------------------------------------

--
-- Table structure for table `superadmindetails`
--

CREATE TABLE `superadmindetails` (
  `id` int(1) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phoneno` int(12) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `superadmindetails`
--

INSERT INTO `superadmindetails` (`id`, `name`, `email`, `phoneno`, `password`) VALUES
(1, 'nilushiya', 'nilu11@gmail.com', 770712417, '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `usercart`
--

CREATE TABLE `usercart` (
  `id` int(4) NOT NULL,
  `uid` int(4) NOT NULL,
  `pid` int(4) NOT NULL,
  `quantity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usercart`
--

INSERT INTO `usercart` (`id`, `uid`, `pid`, `quantity`) VALUES
(2, 1, 5, 2),
(3, 0, 1, 1),
(5, 2, 2, 1),
(6, 0, 3, 1),
(8, 3, 3, 1),
(10, 3, 2, 1),
(11, 0, 5, 1),
(12, 3, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `id` int(10) NOT NULL,
  `name` varchar(225) NOT NULL,
  `mail` varchar(225) NOT NULL,
  `phoneno` int(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `address` varchar(225) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`id`, `name`, `mail`, `phoneno`, `password`, `address`, `status`) VALUES
(1, 'Thenuz', 'thenujan13@gmail.com', 789876789, '1234567890', 'colombo', 'Deactive'),
(2, 'nilushiya', 'nilumma123@gmail.com', 765054864, '1234567890', 'chunnakam jaffna', 'Active'),
(3, 'nilu', 'nilushiya1234@gmail.com', 765054864, '1234567890', 'Kelaniya', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindetails`
--
ALTER TABLE `admindetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyproductsdetails`
--
ALTER TABLE `buyproductsdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superadmindetails`
--
ALTER TABLE `superadmindetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usercart`
--
ALTER TABLE `usercart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admindetails`
--
ALTER TABLE `admindetails`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `buyproductsdetails`
--
ALTER TABLE `buyproductsdetails`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `superadmindetails`
--
ALTER TABLE `superadmindetails`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usercart`
--
ALTER TABLE `usercart`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
