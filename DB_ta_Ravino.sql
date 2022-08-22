-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2022 at 07:24 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_2ndpc`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `ID_KATEGORI` int(11) NOT NULL,
  `KATEGORI` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`ID_KATEGORI`, `KATEGORI`) VALUES
(1, 'Prosessor'),
(2, 'RAM'),
(3, 'Motherboard'),
(4, 'HDD'),
(5, 'Power Supply'),
(6, 'VGA'),
(7, 'Casing'),
(8, 'Monitor'),
(9, 'Keyboard'),
(10, 'SSD'),
(11, 'Mouse'),
(12, 'Speaker'),
(15, 'Software'),
(16, 'Network'),
(17, 'Acc'),
(18, 'AIO'),
(19, 'Printer');

-- --------------------------------------------------------

--
-- Table structure for table `master_barang`
--

CREATE TABLE `master_barang` (
  `item_NAMEID` varchar(100) NOT NULL,
  `ID_KATEGORI` int(11) DEFAULT NULL,
  `NAMA_BARANG` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_barang`
--

INSERT INTO `master_barang` (`item_NAMEID`, `ID_KATEGORI`, `NAMA_BARANG`) VALUES
('BR001', 16, 'Totolink USB Wifi Receiver'),
('BR002', 10, 'Pioneer 120GB 2.5\" Sata III'),
('BR003', 2, 'VenomRX 4GB DDR3-12800'),
('BR004', 17, 'Fan Case RGB 12CM'),
('BR005', 2, 'Kingstone HyperX 8GB DDR3-12800'),
('BR007', 1, 'Intel Core i5-2400 3.10Ghz (1155)'),
('BR008', 5, 'Alcatroz Magnum Pro 225 230W'),
('BR009', 4, 'Seagate 500GB Video / Pipeline Sata 3.5\"'),
('BR010', 2, 'Kingstone HyperX 8GB DDR3-12800 (2)'),
('BR011', 1, 'Intel Core i5 9400F 2.9Ghz Up To 4.1Ghz'),
('BR012', 3, 'MSI H310M Pro VD Plus'),
('BR013', 4, 'Seagate 1TB Baracuda'),
('BR014', 4, 'WD Blue 1TB'),
('BR015', 6, 'MSI Geforce GTX 1650 Ventus XS 4G OC'),
('BR016', 5, 'Enlight 400W 80+'),
('BR017', 2, 'Klevv DDR4 Bolt X Series PC25600 3200MHz 16GB (2X8GB)'),
('BR018', 2, 'ADATA DDR4 XPG Gammix D30 PC24000 3000MHz 16GB (2X8GB)'),
('BR019', 6, 'MSI Geforce GTX 1660 Ventus XS 6G OC'),
('BR020', 10, 'Klevv Neo N400 120GB Sata'),
('BR021', 18, 'PC AIO Acer C22 i3-10110U 4GB 1TB Windows 10 21.5 Inch No DVD'),
('BR022', 19, 'Printer Canon G2010 All in One G 2010 - COMPETIBLE INK'),
('BR023', 3, 'Gigabyte H61M-DS2 Box (1155)'),
('BR024', 4, 'WD Blue 500GB Sata 3.5\"'),
('BR025', 7, 'Case VenomRX NEMESIS'),
('BR026', 17, 'Cooler Fan Deepcool Ice Edge Mini F5 '),
('BR027', 5, 'Deepcool 500W 80+'),
('BR028', 6, 'MSI Aero Geforce GT1030 2GB GDDR5'),
('BR029', 17, 'DVD Game Maxell '),
('BR030', 1, 'Intel Core I7-2600 3.40 Ghz (1155)'),
('BR032', 7, 'Cube Gaming Noch - Tempered Glass, ATX, 1x Rainbow RGB Fan'),
('BR033', 3, 'VenomRX H61M 1155'),
('BR034', 17, 'Vention M02 1M Kabel High Speed HDMI Male to Male - M02'),
('BR035', 17, 'Rexus Gladius GX100 Gamepad Wireless Android/PC/PS3'),
('BR036', 1, 'Intel Core i3-2120 3.30 Ghz (1155)'),
('BR037', 7, 'Case Buldozer Thanos + PSU'),
('BR038', 2, 'Kingstone 8GB DDR3-12800'),
('BR039', 10, 'Adata SSD SU650 240GB'),
('BR040', 17, 'Mousepad Gel Bantal'),
('BR041', 7, 'Case Futura Black M300 + PSU'),
('BR042', 3, 'FAST H61M 1155'),
('BR043', 1, 'Intel Core i5-3470 3.20 Ghz (1155)'),
('BR044', 6, 'Shappire Radeon RX 550 4GB DDR5'),
('BR045', 5, 'Infinity 400W 80+ Bronze'),
('BR046', 7, 'Casing Infinity Twin M-ATX + Free 2 Fan'),
('BR047', 2, 'Samsung 4GB DDR3-12800 Longdim'),
('BR048', 7, 'Cube Gaming Kellva White - Tempered Glass, mATX, 1x Black Fan'),
('BR049', 2, 'GEIL DDR4 Evo Potenza PC21330 2666MHz 8GB (2x4GB)'),
('BR050', 3, 'GALAX A320M (AM4, AMD Promontory A320, DDR4, USB 3.1, SATA3)'),
('BR051', 1, 'AMD AM4 Ryzen 5 3400G (Radeon Vega 11) 3.7Ghz'),
('BR052', 8, 'LED LG 20MK400H HDMI'),
('BR053', 9, 'AOC Keyboard Mouse Combo Gaming KM410'),
('BR054', 10, 'Adata SSD 120GB'),
('BR055', 7, 'Casing PowerUP Optimax + 500W PSU'),
('BR056', 8, 'LED LG 19M38'),
('BR057', 1, 'Intel Core i3 10100F 3.6Ghz (1200)'),
('BR058', 3, 'Galax H410M Elite'),
('BR059', 2, 'Klevv DDR4 Value Series PC21330 2666MHz 8GB (1x8GB)'),
('BR060', 1, 'Intel Core i7 10700F 2.9Ghz Up To 4.6Ghz Box'),
('BR061', 3, 'Asrock B460 Steel Legend LGA 1200'),
('BR062', 17, 'CUBE GAMING STORM - SINGLE FAN 12CM - Universal Socket'),
('BR063', 17, 'CUBE GAMING 12CM FAN INNER LED AUTOFLOW RGB'),
('BR064', 7, 'Cube Gaming Frins WHITE - Tempered Glass, ATX, 3x Rainbow RGB Fan'),
('BR065', 10, 'Adata SX6000 256GB NVME M.2'),
('BR066', 10, 'Klevv SSD Cras C710 512GB M.2 NVME PCIE GEN3X4'),
('BR067', 2, 'Team Elite DDR4 2666 8GB PC 21000'),
('BR068', 5, 'Deepcool Power Supply DN650 650W 80+ Sleeve Cable DN-650'),
('BR069', 9, 'Logitech MK120 Keyboard + Mouse'),
('BR070', 6, 'Inno3D RTX 2060 6GB Twin 2X'),
('BR071', 6, 'Nvidia Geforce GT 210 1GB DDR3 - No Brand'),
('BR072', 3, 'Gigabyte H410M-S2 (1200)'),
('BR073', 5, 'Paradox Gaming PSU ATX 450w'),
('BR074', 6, 'Colorful GT 1030 2GB DDR5'),
('BR075', 7, 'Case Venomrx Samurai'),
('BR076', 17, 'INFORCE COOLING FAN CASING 120MM 12 CM RGB CPU COOLER - RAINBOW'),
('BR077', 5, 'Aerocool Power Supply LUX RGB M 650W BRONZE Semi Modular'),
('BR078', 1, 'Intel Core i5 10400F 2.9Ghz Up To 4.3Ghz Box'),
('BR079', 17, 'Alseye TBF100 RGB'),
('BR080', 3, 'MSI H410M Pro VH LGA1200'),
('BR081', 5, 'Deepcool DE530 400W '),
('BR082', 7, 'Casing PowerUp Raptor 1606'),
('BR083', 17, 'Fan PowerUp Loop-Cooling Multicolors 12cm'),
('BR084', 9, 'Keyboard USB R-ONE'),
('BR085', 17, 'Alseye Fan Prosessor 2 Pipa AM90 RGB'),
('BR086', 10, 'Colorful SL300 120GB'),
('BR087', 7, 'Armaggeddon Nimitz N5 Aurora Micro ATX'),
('BR088', 10, 'Colorful 480GB 2.5\" Sata III'),
('BR089', 7, 'Casing PowerUp Raptor 1501'),
('BR090', 3, 'MSI H410M A Pro'),
('BR091', 10, 'Samsung SSD Evo 860 250GB Sata'),
('BR092', 2, 'Team Elite DDR4 2666 (4x2) 8GB PC 21000'),
('BR093', 7, 'Casing PowerUp Raptor 1607 + 3 Fan'),
('BR094', 8, 'Monitor LED Samsung 24\" CURVED C24F390FHE'),
('BR095', 7, 'Casing Simbada + 380W PSU'),
('BR096', 9, 'Logitech Wireless MK235'),
('BR097', 17, 'DVD RW LG'),
('BR098', 8, 'LED Monitor SPC SM-19HD 19 inch'),
('BR099', 3, 'Esonic H61FFL 1155'),
('BR100', 7, 'Casing DST Standart + PSU'),
('BR101', 7, 'Casing JoyFlash M-ATX + PSU'),
('BR102', 7, 'Casing Alcatroz Futura Black M300 + PSU'),
('BR103', 2, 'Team Vulcan Z 8GB (4x2 ) DDR4 PC2666'),
('BR104', 5, 'Innovation 400W 80+ Bronze'),
('BR105', 10, 'Klevv SSD Neo N400 240GB'),
('BR106', 7, 'Casing PowerUp Basic Series + 500W'),
('BR107', 7, 'Casing PowerUp Raptor 1607 Black'),
('BR108', 1, 'Intel Core i3 9100F 3.6Ghz Up To 4.2Ghz Box Coffee Lake'),
('BR109', 16, 'TP-Link 150Mbps WN725N Wireless USB Adapter'),
('BR110', 8, 'Monitor LG 24\" 24MK400H-B HDMI'),
('BR111', 3, 'MSI H310M Pro VH Plus'),
('BR112', 2, 'Team DDR4 3200 (8GBx2) Delta TUF RGB PC25600'),
('BR113', 3, 'Asrock B460M-HDV'),
('BR114', 6, 'ZOTAC GAMING Geforce RTX 3070 Twin Edge 8GB DDR6X 256 BIT'),
('BR115', 7, 'Casing DST C013 - ATX - Full Tempered Glass + 3 Fan 12CM'),
('BR116', 2, 'Kingstone 2GB DDR3-12800 Longdim'),
('BR117', 3, 'Gigabyte GA-H61M Tray'),
('BR118', 3, 'Fast Motherboard Intel H81M-H LGA1150'),
('BR119', 1, 'Intel Core i5-4570 3.2Ghz + Fan'),
('BR120', 3, 'MSI B450-A Pro Max'),
('BR121', 6, 'Colorful GTX 1660 6GB NB GDDR5'),
('BR122', 1, 'AMD AM4 Ryzen 5-2600 3.40Ghz'),
('BR123', 5, 'Aerocool LUX 550w 80+ Bronze'),
('BR124', 6, 'MSI GTX 1660 VENTUS XS 6G OC'),
('BR125', 1, 'Intel Core I3-10100 3,6GHZ Box'),
('BR127', 10, 'Adata SSD SU650 480GB'),
('BR128', 3, 'ASRock H410M-HDV LGA1200'),
('BR129', 6, 'Inno3D Nvidia GTX 1660 6GB Twin X2'),
('BR130', 8, 'Monitor LG 20MK400A-B'),
('BR131', 4, 'Seagate 500GB Baracuda Sata 3.5\"'),
('BR132', 9, 'Keyboard Mouse USB AOC KM110'),
('BR133', 7, 'Casing SPC SM2003 M-ATX + PSU'),
('BR134', 10, 'Colorful SL500 240GB Sata III'),
('BR135', 2, 'VenomRX DDR4 8GB DDR4 2666 Longdim'),
('BR136', 7, 'Casing Infinity Vesta + 4 Fan'),
('BR137', 7, 'Casing SPC + PSU 450W'),
('BR138', 1, 'AMD Ryzen 3 3200G (Radeon Vega 8) 3.6Ghz'),
('BR139', 3, 'Asrock A320M-HDV'),
('BR140', 7, 'Armaggeddon NIMITZ TR1100 + PSU Voltron 235FX - Black'),
('BR141', 2, 'VenomRX 4GB DDR4-2666'),
('BR142', 6, 'Inno3D Nvidia GTX 1050Ti 4GB Twin X2'),
('BR143', 8, 'LED LG 24MK400H-B'),
('BR144', 3, 'Asrock H410M-HVS'),
('BR145', 2, 'Kingstone 4GB DDR4-2666 Longdim'),
('BR146', 6, 'Gigabyte Nvidia GTX 1650 4GB OC GDDR6'),
('BR147', 6, 'Colorful GeForce GTX 1650 NB 4GD6-V GDDR6'),
('BR148', 6, 'MSI GTX 1660 SUPER Ventus XS 6GB DDR6'),
('BR149', 2, 'GEIL DDR4 AMD EDITION Orion PC24000 3000MHz 16GB (2x8GB)'),
('BR150', 7, 'Armaggeddon NIMITZ TR1100 + PSU Voltron 235FX - White'),
('BR151', 9, 'Logitech MK220 Wireless Mouse and keyboard'),
('BR152', 1, 'Intel Core i7 4790 + Fan'),
('BR153', 17, 'Mousepad Razer Mantis'),
('BR154', 6, 'Colorful GeForce GTX 1050 Ti 4G-V GDDR5'),
('BR155', 8, 'Monitor SPC Pro SM-24 Inch Full HD'),
('BR156', 17, 'Webcam SPC WC02 1080HD '),
('BR157', 3, 'MSI H410M PRO-E (1200)'),
('BR158', 1, 'Intel Pentium Gold G6400 4.0Ghz (1200)'),
('BR159', 7, 'Enlight Infinity Flash V3 White Edition'),
('BR160', 3, 'Gigabyte B460M-D2V (1200)'),
('BR161', 6, 'Colorful GTX 1660 Super NB 6GB DDR6'),
('BR162', 7, 'Casing PowerUp Raptor 1601 White'),
('BR163', 10, 'Klevv SSD Neo N400 240GB Sata'),
('BR164', 7, 'Casing PowerUP Aeromax + 500W PSU'),
('BR165', 9, 'Alcatroz C3300 Mouse Keyboard USB'),
('BR166', 2, 'Kingstone HyperX 1x8GB DDR4-2666Mhz'),
('BR167', 6, 'Biostar Radeon RX550 4GB GDDR5'),
('BR168', 3, 'Gigabyte B460M-DS3H (1200)'),
('BR169', 17, 'ID-COOLING SE-902 SD'),
('BR170', 7, 'Casing CoolerMaster Q300L'),
('BR171', 5, 'FSP HV PRO 550W 80+'),
('BR172', 16, 'TPlink UB400 Bluetooth USB'),
('BR173', 16, 'TPlink TL-WN781ND Wifi PCI-E Adapter'),
('BR174', 2, 'Kingston Hyper X Fury DDR4 3200 (2x16GB) PC25600'),
('BR175', 1, 'Intel Core i7 10700KF 3.8Ghz (1200)'),
('BR176', 17, 'TOSHIBA Flashdisk 32GB Kioxia'),
('BR177', 7, 'Simbada Battleground 148'),
('BR178', 7, 'Casing Magix M-Atx + PSU 500W'),
('BR179', 17, 'DVD RW Sata'),
('BR180', 7, 'Armaggeddon NIMITZ TR1100'),
('BR181', 17, 'Totolink N150USM Wifi USB'),
('BR182', 3, 'Gigabyte GA-H81M-S1 (1150) Tray'),
('BR183', 2, 'Hynix DDR3 4GB-12800 '),
('BR184', 6, 'Palit GT710 2GB GDDR3'),
('BR185', 8, 'LED Inforce 1560NH 16 inch'),
('BR186', 6, 'Zotac GTX 1650 AMP Core 4GB DDR6'),
('BR187', 7, 'Casing Vurrion Hyden - ATX - TEMPERED GLASS'),
('BR188', 8, 'Monitor LED Inforce 19\" 1950NH VGA'),
('BR189', 4, 'WD 500GB 3.5\" Sata'),
('BR190', 7, 'Casing Paradox Gaming Paisley'),
('BR191', 1, 'AMD Ryzen 3-3100 Box '),
('BR192', 5, 'Aerocool United 500W 80+ '),
('BR193', 9, 'Keyboard Gaming Sades Membrane Whisper'),
('BR194', 10, 'Colorful 120GB Sata III'),
('BR195', 10, 'Kingstone A400 240GB Sata'),
('BR196', 1, 'Intel Core i3-7100 Box'),
('BR197', 3, 'MSI H110M Pro-VH Plus'),
('BR198', 7, 'Casing SPC SM2002 M-ATX + PSU'),
('BR199', 9, 'Keyboard Mouse USB R-ONE'),
('BR200', 1, 'Inte Core 2 Duo E8400 3.0Ghz (775)'),
('BR201', 3, 'SPC G41 775'),
('BR202', 17, 'Flashdisk Sandisk Cruzer Blade 64GB'),
('BR203', 2, 'Hynix DDR4 4GB-2666'),
('BR204', 3, 'VR H61M 1155'),
('BR205', 8, 'Monitor LG 24\" 24MK430 HDMI+VGA'),
('BR206', 2, 'GEIL DDR4 Evo Potenza PC21330 2666MHz 16GB (2x8GB)'),
('BR207', 10, 'Midasforce 240GB Super Lightning SATA III'),
('BR208', 17, 'DVD Game / Pcs'),
('BR209', 5, 'CoolerMaster MWE 650W V2 80+ Bronze'),
('BR210', 17, 'Deepcool GAMMAXX 400 PRO Dual Fan'),
('BR211', 10, 'Adata 512GB M.2 NVME'),
('BR212', 2, 'Klevv DDR4 Bolt X Series PC25600 3200MHz 32GB (2X16GB)'),
('BR213', 7, 'Cube Gaming Byron WHITE - Tempered Glass Window, ATX, No Fan'),
('BR214', 6, 'Colorful Geforce RTX 3060 NB 12G -V'),
('BR215', 3, 'Asrock B560 Steel Legend'),
('BR216', 1, 'Intel Core I7-11700KF | Gen 11 LGA 1200 8 Core'),
('BR217', 1, 'AMD AM4 Ryzen 5-3500 BOX Wraith Cooler'),
('BR218', 6, 'ASUS GeForce GT 710 Silent 2GB GDDR5'),
('BR219', 10, 'Midasforce 120GB Super Lightning SATA III'),
('BR220', 16, 'Wifi Tenda W311MI Wireless N150 USB'),
('BR221', 7, 'Casing Raptor 1602 + LED Strip RGB'),
('BR222', 18, 'Lenovo Ideapad 3 Slim - N4020|4GB|256Gb SSD|W10+OHS'),
('BR223', 6, 'GIGABYTE GTX 750TI 2GB OC DDR5'),
('BR224', 2, 'Kingstone 4GB DDR3-12800 Longdim'),
('BR225', 6, 'Galax Geforce GT 1030 EXOC 2GB DDR5 White'),
('BR226', 10, 'AGI Storage SSD 240GB Sata 3'),
('BR227', 4, 'Seagate Backup Plus Slim 2TB - HDD Eksternal'),
('BR228', 7, 'Casing Predator Mini Series + PSU'),
('BR229', 1, 'AMD A6-7480 Box (FM2+)'),
('BR230', 8, 'Monitor LED Inforce 19\" 1950NH VGA + HDMI'),
('BR231', 3, 'SPC H61M Full Performance 1155'),
('BR232', 17, 'DVD RW Samsung Sata'),
('BR233', 5, 'Innovation 400W 80+ Gold'),
('BR234', 3, 'VenomRX H81M 1150'),
('BR235', 16, 'TP-LINK TG-3468 LAN Gigabit PCI Express '),
('BR236', 1, 'Intel Core I3-10100 3.6Ghz Tray (1200)'),
('BR237', 3, 'Gigabyte GA-H81M-DS2 (1150) Tray'),
('BR238', 9, 'LDKAI 832 Gaming Keyboard LED with Mouse'),
('BR239', 6, 'Colorful GT 1030 2GB V4-V'),
('BR240', 6, 'Zotac GTX 1050 Ti 4GB DDR5'),
('BR241', 6, 'ASUS Geforce GT 1030 Silent 2GB GDDR5'),
('BR242', 17, 'HDMI to VGA Converter'),
('BR243', 1, 'Intel Core i7-3770 3.4 Ghz (1155)'),
('BR244', 10, 'Kingmax SSD SMV32 240GB Sata 3'),
('BR245', 9, 'Alcatroz Xplorer Air 6600 - Keyboard Mouse Wireless Combo'),
('BR246', 1, 'Intel Core i3-4160 + FAN Socket LGA 1150'),
('BR247', 17, 'Kabel LAN UTP Cat 5e CCA Zimmlink - 20M'),
('BR248', 6, 'Zotac Geforce GT 1030 2GB GDDR5'),
('BR249', 8, 'LED Monitor VARRO 15.6 INCI HDMI'),
('BR250', 6, 'Gigabyte GeForce GT 1030 2GB GDDR4'),
('BR251', 7, 'Casing Raptor 1608 White Led Strip RGB - Tempered Glass - ATX'),
('BR252', 3, 'Asus PRIME H310M-E R2.0 LGA 1151'),
('BR253', 3, 'X-Star B75 M2 1155'),
('BR255', 4, 'Toshiba Canvio Basic 1TB - HDD Ekternal'),
('BR256', 7, 'Casing Armaggeddon TRON III (T3)'),
('BR257', 6, 'Palit VGA GeForce® GTX 1050 Ti StormX 4GB 128bit GDDR5'),
('BR258', 12, 'Speaker Logitech Z120'),
('BR259', 8, 'LED Monitor ACER KA242Y 23.8 Inch 75Hz Full HD HDMI VGA'),
('BR260', 17, 'Mic USB Desktop Mini Microphone'),
('BR261', 17, 'Kabel HDMI 2M Male to Male - Vention'),
('BR262', 7, 'Cube Gaming Eurchef - Tempered Glass, mATX, 3x RGB Fan'),
('BR263', 3, 'MAXXON H61M-X (LGA1155, DDR3, SATA2, USB2)'),
('BR264', 3, 'Extreme H81 (LGA1150, DDR3, HDMI, VGA, USB3)'),
('BR265', 2, 'Imperion 4GB DDR3-12800 - RAM PC'),
('BR266', 16, 'TP-LINK TL-WN722N Wireless Adapter'),
('BR267', 17, 'Kabel HDMI GOLD BAFO 2M Premium Quality'),
('BR268', 3, 'Esonic G41 DDR3 775'),
('BR269', 4, 'WD 320GB Sata 3.5\"'),
('BR270', 6, 'Palit Geforce GTX 1650 4GB GDDR6 Gaming Pro Dual Fan'),
('BR271', 10, 'WD Blue Sata 500GB 2.5\"'),
('BR272', 7, 'Cube Gaming Cabamesh BLACK - Tempered Glass, mATX, 2x RGB Fan'),
('BR273', 6, 'ASUS 1050Ti Cerberus OC 4Gb GDDR5 Dual Fan'),
('BR274', 3, 'ASUS Motherboard EX H410M-V3'),
('BR275', 3, 'Gigabyte A320M S2H (AM4)'),
('BR276', 4, 'Toshiba Canvio Basic 2TB - Hardisk External '),
('BR277', 7, 'Casing Basic Ersys PS450'),
('BR278', 2, 'Kingstone 8GB DDR4-2666 Longdim'),
('BR279', 3, 'EYOTA H61MC 1155'),
('BR280', 3, 'ASUS H410M-K 1200'),
('BR281', 2, 'Team Elite DDR4 3200 (16x2) 32GB PC25600'),
('BR282', 1, 'Intel Core i5 10400 Box 2.9Ghz 6C12T S1200'),
('BR283', 4, 'Seagate 320GB Sata 3.5\"'),
('BR284', 2, 'Samsung 8GB DDR3-12800 PC'),
('BR285', 6, 'Vurrion Radeon RX 550 4GB GDDR5'),
('BR286', 3, 'Esonic H81JEL 1150'),
('BR287', 2, 'Kingston HyperX Furry Beast 8GB DDR4-2666Mhz'),
('BR288', 3, 'MSI H510M BOMBER m-ATX LGA1200'),
('BR289', 7, 'Cube Gaming Galve - Tempered Glass Window, ATX, No Fan'),
('BR290', 1, 'Intel Core i5-4590 3.30Ghz (1150)'),
('BR291', 9, 'Keyboard Mouse Combo SPC SKO99'),
('BR292', 1, 'intel Core i3-10105F Comet Lake Box - LGA1200'),
('BR293', 7, 'Casing Raptor 1609 White - Tempered Glass - ATX'),
('BR294', 3, 'MSI H510M-A PRO LGA1200'),
('BR295', 17, 'Install Windows'),
('BR296', 17, 'Fan Case 12CM Infinity Twilight Sparkle - Rainbow'),
('BR297', 1, 'AMD AM4 Athlon 3000G Box (AM4)'),
('BR298', 9, 'Komic CMG 570 Combo Peripheral Gaming 4 in 1 RGB'),
('BR299', 5, 'EVGA 450W BR 80+ Bronze'),
('BR300', 7, 'Enlight EN120 Slim Case + 300W PSU'),
('BR301', 7, 'Casing Infinity F06 + 250W INF PSU - Side Acrylic Panel'),
('BR302', 10, 'Midasforce 128GB Super Lightning SATA III'),
('BR303', 8, 'LED Monitor Acer SA220Q-A 21.5\" 75Hz Full HD HDMI VGA'),
('BR304', 2, 'Hynix 8GB DDR3-12800 PC'),
('BR305', 3, 'GIGABYTE H310M DS2 1151'),
('BR306', 1, 'Intel Core I5-7500 3.40Ghz (1151)'),
('BR307', 16, 'Tenda W322E Wireless N300 Express Adapter '),
('BR308', 6, 'Colorful Geforce GT 1030 V5-V GDDR5'),
('BR309', 6, 'Zotac Geforce GTX 1650 4GB GDDR6 OC 128bit'),
('BR310', 2, 'Ramaxel 4GB DDR3-12800 PC'),
('BR311', 5, 'Inforce ATX 500W Box'),
('BR312', 6, 'ASUS GeForce GT 730 Silent 2GB GDDR5'),
('BR313', 18, 'Biaya Pengecekan'),
('BR314', 17, 'Fan Processor Intel Ori'),
('BR315', 6, 'Arktek Nvidia GeForce G210 1GB DDR3'),
('BR316', 16, 'Alfanext UW06 USB Wifi Adapter'),
('BR317', 7, 'Case Ace Power Hunter M07 PS400W - Slim'),
('BR318', 3, 'SPC H81M 1150'),
('BR319', 10, 'Midasforce Superlightning 512GB SATA III'),
('BR320', 3, 'Asus H61M-K 1155'),
('BR321', 1, 'AMD Ryzen 3 2300X Tray with Wraith Cooler'),
('BR322', 2, 'Team Elite DDR4 3200 8GB PC25600'),
('BR323', 6, 'Gigabyte Nvidia GT 730 2GB DDR5'),
('BR324', 17, 'USB Bluetooth 5.0 Adapter CSR V5'),
('BR325', 8, 'Monitor LED MAGIX 19\" VGA'),
('BR326', 17, 'Kabel VGA '),
('BR327', 17, 'Fan Case 8CM Black'),
('BR328', 17, 'Fan Case 12CM Black'),
('BR329', 7, 'Casing PowerUp Raptor 1650 - Tempered Glass - ATX'),
('BR330', 10, 'RX7 240GB Sata III'),
('BR331', 2, 'Team Elite DDR4 2666 4GB PC 21000'),
('BR332', 3, 'Colorful H310M-M.2 PLUS V20 1151'),
('BR333', 3, 'ASUS PRIME H510M-K (LGA1200, H510, DDR4 , USB3.0)'),
('BR334', 17, 'Kabel HDMI 1.5M'),
('BR335', 10, 'V-GEN SATA M.2 512GB'),
('BR336', 17, 'Converter Display Port Male to HDMI Female (DP to HDMI)'),
('BR337', 17, 'Converter DVI 24+1 Male To HDMI'),
('BR338', 4, 'WD Blue 2TB 3.5\" Sata'),
('BR339', 7, 'Casing Infinity F09 + 250W INF PSU - Side Acrylic Panel'),
('BR340', 2, 'G.Skill Ripjaws V DDR4 8GB-2666MHz'),
('BR341', 2, 'Team T-FORCE ZEUS DDR4 8GB 3200Mhz'),
('BR342', 3, 'ASUS PRIME H510M-E (LGA1200, H510, DDR4 , USB3.0)'),
('BR343', 7, 'Casing PowerUp Raptor 1652 - Tempered Glass - ATX'),
('BR344', 5, 'THERMALTAKE Lite Power 550W'),
('BR345', 8, 'Monitor LED PowerUP 19\" - HDMI'),
('BR346', 3, 'Powermax H61FHL 1155'),
('BR347', 17, 'Fan Casing LED PowerUp RGB Loop'),
('BR348', 9, 'Keyboard Mouse INFORCE KM1905 1905 USB'),
('BR349', 5, 'MSI MAG 550W Power Supply 80+ Bronze'),
('BR350', 16, 'D-Link Wifi Pcie Wireless DWA-548'),
('BR351', 10, 'Bulldozer 256GB SATA 2,5\"'),
('BR352', 10, 'Team Group SSD GX1 2.5 SATA III 240GB'),
('BR353', 3, 'Colorful H310M-T V20A 1151'),
('BR354', 1, 'Intel Core I5-650 3.2Ghz (1156)'),
('BR355', 3, 'EZPRO H55 LGA 1156'),
('BR356', 6, 'GAINWARD GeForce GTX 1650 D6 GHOST'),
('BRSM353', 3, 'Vurrion Duravel H61M-SV2 LGA 1155');

-- --------------------------------------------------------

--
-- Table structure for table `output`
--

CREATE TABLE `output` (
  `id_tbl` int(11) NOT NULL,
  `item_ID` varchar(256) DEFAULT NULL,
  `item_NAMEID` varchar(256) DEFAULT NULL,
  `item_PRICE` double DEFAULT NULL,
  `item_USE` double DEFAULT NULL,
  `item_OutMamdani` double DEFAULT NULL,
  `item_OutSugeno` double DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `output`
--

INSERT INTO `output` (`id_tbl`, `item_ID`, `item_NAMEID`, `item_PRICE`, `item_USE`, `item_OutMamdani`, `item_OutSugeno`, `date`) VALUES
(265, 'SM/PC/1', 'BR297', 920000, 3, 518095, 646667, NULL),
(266, 'SM/PC/1', 'BR139', 720000, 3, 463492, 513333, NULL),
(267, 'SM/PC/1', 'Memory...', 0, 0, 0, 0, NULL),
(268, 'SM/PC/1', 'SSD...', 0, 0, 0, 0, NULL),
(269, 'SM/PC/1', 'Hardisk...', 0, 0, 0, 0, NULL),
(270, 'SM/PC/1', 'Graphic Card (VGA)...', 0, 0, 0, 0, NULL),
(271, 'SM/PC/1', 'Power Supply (PSU)...', 0, 0, 0, 0, NULL),
(272, 'SM/PC/1', 'Casing (Case)...', 0, 0, 0, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`ID_KATEGORI`);

--
-- Indexes for table `master_barang`
--
ALTER TABLE `master_barang`
  ADD PRIMARY KEY (`item_NAMEID`),
  ADD KEY `ID_KATEGORI` (`ID_KATEGORI`) USING BTREE;

--
-- Indexes for table `output`
--
ALTER TABLE `output`
  ADD PRIMARY KEY (`id_tbl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `ID_KATEGORI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `output`
--
ALTER TABLE `output`
  MODIFY `id_tbl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `master_barang`
--
ALTER TABLE `master_barang`
  ADD CONSTRAINT `master_barang_ibfk_1` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori` (`ID_KATEGORI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
