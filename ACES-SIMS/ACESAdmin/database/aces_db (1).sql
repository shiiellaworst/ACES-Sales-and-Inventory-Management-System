-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2022 at 02:42 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aces_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `aces_inventory`
--

CREATE TABLE `aces_inventory` (
  `ID` int(11) NOT NULL,
  `product_id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_details` varchar(10000) NOT NULL,
  `product_designer` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `acro` varchar(6) NOT NULL,
  `price` int(100) NOT NULL,
  `size` varchar(10) NOT NULL,
  `img` varchar(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date_added` date NOT NULL,
  `time_added` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aces_inventory`
--

INSERT INTO `aces_inventory` (`ID`, `product_id`, `product_name`, `product_details`, `product_designer`, `category`, `acro`, `price`, `size`, `img`, `qty`, `status`, `date_added`, `time_added`) VALUES
(1, 3121, 'BLACK PANTHER', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error voluptatem ipsa excepturi, libero plSFAGH BRTVA', 'Sebastian', 't-shirt', 'BSCS', 150, 'S', 'p4.png', 1, '', '2022-04-23', '00:23:10'),
(2, 3121, 'BLACK PANTHER', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error voluptatem ipsa excepturi, libero plSFAGH BRTVA', 'Sebastian', 't-shirt', 'BSCS', 150, 'S', 'p4.png', 1, '', '2022-04-23', '00:23:10'),
(3, 3122, 'BLACK PANTHER', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error voluptatem ipsa excepturi, libero plSFAGH BRTVA', 'Sebastian', 't-shirt', 'BSIT', 150, 'S', 'p1.png', 1, '', '2022-04-23', '00:23:10'),
(4, 3123, 'BLACK PANTHER', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error voluptatem ipsa excepturi, libero plSFAGH BRTVA', 'Sebastian', 't-shirt', 'BSIS', 150, 'M', 'p2.png', 1, '', '2022-04-23', '00:23:10'),
(5, 3124, 'BLACK PANTHER', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error voluptatem ipsa excepturi, libero plSFAGH BRTVA', 'Sebastian', 't-shirt', 'BSEMC', 150, 'L', 'p3.png', 1, '', '2022-04-23', '00:23:10'),
(6, 5431, 'BLACK PANTHER W/ ACES', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error voluptatem ipsa excepturi, libero plSFAGH BRTVA', 'Sebastian', 't-shirt', 'BSCS', 150, 'L', 'PBSCS.png', 1, 'NEW', '2022-04-23', '00:23:10'),
(7, 5432, 'BLACK PANTHER W/ ACES', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error voluptatem ipsa excepturi, libero plSFAGH BRTVA', 'Sebastian', 't-shirt', 'BSIT', 150, 'L', 'PBSIT.png', 1, 'NEW', '2022-04-23', '00:23:10'),
(8, 5433, 'BLACK PANTHER W/ ACES', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error voluptatem ipsa excepturi, libero plSFAGH BRTVA', 'Sebastian', 't-shirt', 'BSIS', 150, 'S', 'P2BSIS.png', 1, 'NEW', '2022-04-23', '00:23:10'),
(9, 5434, 'BLACK PANTHER W/ ACES', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error voluptatem ipsa excepturi, libero plSFAGH BRTVA', 'Sebastian', 't-shirt', 'BSEMC', 150, 'M', 'PBSEMC.png', 1, 'NEW', '2022-04-23', '00:23:10'),
(10, 5431, 'BLACK PANTHER W/ ACES', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error voluptatem ipsa excepturi, libero plSFAGH BRTVA', 'Sebastian', 't-shirt', 'BSCS', 150, 'L', 'PBSCS.png', 1, '', '2022-04-23', '00:23:10'),
(11, 5432, 'BLACK PANTHER W/ ACES', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error voluptatem ipsa excepturi, libero plSFAGH BRTVA', 'Sebastian', 't-shirt', 'BSIT', 150, 'S', 'PBSIT.png', 1, '', '2022-04-23', '00:23:10'),
(12, 5433, 'BLACK PANTHER W/ ACES', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error voluptatem ipsa excepturi, libero plSFAGH BRTVA', 'Sebastian', 't-shirt', 'BSIS', 150, 'M', 'P2BSIS.png', 1, '', '2022-04-23', '00:23:10'),
(13, 5434, 'BLACK PANTHER W/ ACES', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error voluptatem ipsa excepturi, libero plSFAGH BRTVA', 'Sebastian', 't-shirt', 'BSEMC', 150, 'M', 'PBSEMC.png', 1, '', '2022-04-23', '00:23:10'),
(14, 13571, 'ACES', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error voluptatem ipsa excepturi, libero plSFAGH BRTVA', 'Sebastian', 't-shirt', 'BSCS', 150, 'L', 'P2BSCS.png', 1, '', '2022-04-23', '00:23:10'),
(15, 13572, 'ACES', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error voluptatem ipsa excepturi, libero plSFAGH BRTVA', 'Sebastian', 't-shirt', 'BSIT', 150, 'L', 'P2BSIT.png', 1, '', '2022-04-23', '00:23:10'),
(16, 13573, 'ACES', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error voluptatem ipsa excepturi, libero plSFAGH BRTVA', 'Sebastian', 't-shirt', 'BSIS', 150, 'S', 'PBSIS.png', 1, '', '2022-04-23', '00:23:10'),
(17, 13574, 'ACES', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error voluptatem ipsa excepturi, libero plSFAGH BRTVA', 'Sebastian', 't-shirt', 'BSEMC', 150, 'M', 'P2BSEMC.png', 1, '', '2022-04-23', '00:23:10'),
(18, 13571, 'ACES', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error voluptatem ipsa excepturi, libero plSFAGH BRTVA', 'Sebastian', 't-shirt', 'BSCS', 150, 'M', 'P2BSCS.png', 1, '', '2022-04-23', '00:23:10'),
(19, 13572, 'ACES', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error voluptatem ipsa excepturi, libero plSFAGH BRTVA', 'Sebastian', 't-shirt', 'BSIT', 150, 'M', 'P2BSIT.png', 1, '', '2022-04-23', '00:23:10'),
(20, 13573, 'ACES', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error voluptatem ipsa excepturi, libero plSFAGH BRTVA', 'Sebastian', 't-shirt', 'BSIS', 150, 'S', 'PBSIS.png', 1, '', '2022-04-23', '00:23:10'),
(21, 13574, 'ACES', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error voluptatem ipsa excepturi, libero plSFAGH BRTVA', 'Sebastian', 't-shirt', 'BSEMC', 150, 'L', 'P2BSEMC.png', 1, '', '2022-04-23', '00:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `aces_product`
--

CREATE TABLE `aces_product` (
  `ID` int(11) NOT NULL,
  `product_id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `acro` varchar(6) NOT NULL,
  `img` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `product_supplier` varchar(100) NOT NULL,
  `date_added` date NOT NULL,
  `time_added` time NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aces_product`
--

INSERT INTO `aces_product` (`ID`, `product_id`, `product_name`, `price`, `qty`, `acro`, `img`, `category`, `product_supplier`, `date_added`, `time_added`, `status`) VALUES
(1, 3121, 'BLACK PANTHER', 150, 1, 'BSCS', 'p4.png', 't-shirt', 'None Company', '2022-04-23', '00:23:10', ''),
(2, 3122, 'BLACK PANTHER', 150, 1, 'BSIT', 'p1.png', 't-shirt', 'None Company', '2022-04-23', '00:23:10', ''),
(3, 3123, 'BLACK PANTHER', 150, 1, 'BSIS', 'p2.png', 't-shirt', 'None Company', '2022-04-23', '00:23:10', ''),
(4, 3124, 'BLACK PANTHER', 150, 1, 'BSEMC', 'p3.png', 't-shirt', 'None Company', '2022-04-23', '00:23:10', ''),
(5, 5431, 'BLACK PANTHER W/ ACES', 150, 1, 'BSCS', 'PBSCS.png', 't-shirt', 'None Company', '2022-04-23', '00:23:10', 'NEW'),
(6, 5432, 'BLACK PANTHER W/ ACES', 150, 1, 'BSIT', 'PBSIT.png', 't-shirt', 'None Company', '2022-04-23', '00:23:10', 'NEW'),
(7, 5433, 'BLACK PANTHER W/ ACES', 150, 1, 'BSIS', 'P2BSIS.png', 't-shirt', 'None Company', '2022-04-23', '00:23:10', 'NEW'),
(8, 5434, 'BLACK PANTHER W/ ACES', 150, 1, 'BSEMC', 'PBSEMC.png', 't-shirt', 'None Company', '2022-04-23', '00:23:10', 'NEW'),
(9, 13571, 'ACES', 150, 1, 'BSCS', 'P2BSCS.png', 't-shirt', 'None Company', '2022-04-23', '00:23:10', ''),
(10, 13572, 'ACES', 150, 1, 'BSIT', 'P2BSIT.png', 't-shirt', 'None Company', '2022-04-23', '00:23:10', ''),
(11, 13573, 'ACES', 150, 1, 'BSIS', 'PBSIS.png', 't-shirt', 'None Company', '2022-04-23', '00:23:10', ''),
(12, 13574, 'ACES', 150, 1, 'BSEMC', 'P2BSEMC.png', 't-shirt', 'None Company', '2022-04-23', '00:23:10', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `ID` int(80) NOT NULL,
  `ADMIN_NUMBER` varchar(80) NOT NULL,
  `STUDENT_NUMBER` int(8) NOT NULL,
  `FIRST_NAME` varchar(100) NOT NULL,
  `LAST_NAME` varchar(100) NOT NULL,
  `COURSE` varchar(10) NOT NULL,
  `YEAR` varchar(20) NOT NULL,
  `SECTION` varchar(20) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(80) NOT NULL,
  `ROLE` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`ID`, `ADMIN_NUMBER`, `STUDENT_NUMBER`, `FIRST_NAME`, `LAST_NAME`, `COURSE`, `YEAR`, `SECTION`, `EMAIL`, `PASSWORD`, `ROLE`) VALUES
(1, '123456789', 20192371, 'Novie Dame', 'Marbas', 'BSCS', '3', 'C', 'noviedamemarbas@gmail.com', 'qutie29', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart_info`
--

CREATE TABLE `cart_info` (
  `ID` int(11) NOT NULL,
  `cart_num` int(100) NOT NULL,
  `student_num` int(8) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `acro` varchar(6) NOT NULL,
  `size` varchar(10) NOT NULL,
  `img` varchar(10000) NOT NULL,
  `qty` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_info`
--

INSERT INTO `cart_info` (`ID`, `cart_num`, `student_num`, `product_name`, `acro`, `size`, `img`, `qty`, `price`, `total`) VALUES
(6, 0, 20192372, 'black panther', '', '', '', 0, 0, 0),
(13, 517278470, 20192293, 'ACES', 'BSIS', 'S', 'PBSIS.png', 2, 150, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `ID` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `transaction_num` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `size` varchar(20) NOT NULL,
  `price` int(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pending_info`
--

CREATE TABLE `pending_info` (
  `ID` int(11) NOT NULL,
  `PENDING_NUMBER` varchar(20) NOT NULL,
  `ITEM_NAME` varchar(80) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `COURSE` varchar(10) NOT NULL,
  `DESCRIPTION` varchar(1000) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `STUDENT_NUMBER` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pending_info`
--

INSERT INTO `pending_info` (`ID`, `PENDING_NUMBER`, `ITEM_NAME`, `NAME`, `COURSE`, `DESCRIPTION`, `filename`, `STUDENT_NUMBER`) VALUES
(21, '54953', 'ARGarg', 'MARBAS	', 'BSCS', 'srnuyhtbydte', '558653_277939545648452_554478115_n.jpg', 20192371);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `ID` int(80) NOT NULL,
  `STUDENT_NUMBER` int(8) NOT NULL,
  `FIRST_NAME` varchar(80) NOT NULL,
  `MIDDLE_NAME` varchar(80) NOT NULL,
  `LAST_NAME` varchar(80) NOT NULL,
  `COURSE` varchar(80) NOT NULL,
  `YEAR` varchar(20) NOT NULL,
  `SECTION` varchar(20) NOT NULL,
  `ADDRESS` varchar(80) NOT NULL,
  `CONTACT` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`ID`, `STUDENT_NUMBER`, `FIRST_NAME`, `MIDDLE_NAME`, `LAST_NAME`, `COURSE`, `YEAR`, `SECTION`, `ADDRESS`, `CONTACT`) VALUES
(1, 20190846, 'RUEL 				\r\n', 'AYUCO', 'ALMONIA', 'BSCS', '3', 'C', 'MRH NHA SITE 4 BUILDING 4A 1-U-11 BARANGAY 188 TALA, CALOOCAN CITY', '0909-813-2923'),
(2, 20191127, 'MARK JOEL 				', 'VIVAR', 'CALIMAG	', 'BSCS', '3', 'C', 'BLOCK 3 LOT 6 ROSARIO VILLE LLANO, CALOOCAN CITY\r\n', '0955-395-6362'),
(3, 20120754, 'MARISSA 				\r\n', 'RAMIREZ', 'CAPINIG', 'BSCS', '3', 'C', 'BLOCK 2 LOT 8 CASA ASUNCION DELOS SANTOS COMPOUND BRGY. 171 BAGUMBONG CALOOCAN C', '0956-552-5709'),
(4, 20191805, 'Lea', 'Tumbocon', 'Gallardo', 'BSCS', '3', 'C', 'PH.8A PKG12A BLK.161 LOT.8 BAGONG SILANG CALOOCAN CITY\r\n', '0921-332-2540	'),
(5, 20192091, 'JESSICA JOY\r\n', 'SUMODEBILA', 'GAPUSAN', 'BSCS', '3', 'C', 'NARRA AVE PANGARAP VILLE BARANGAY 181 CALOOCAN CITY\r\n', '0908-862-8209	'),
(6, 20192562, 'ALLAN JONAS\r\n', 'DELA CRUZ', 'GENOVE', 'BSCS', '3', 'C', 'PURIFICATION ST.MOUNTAIN HEIGHTS SUBD.CALOOCAN CITY\r\n', '0951-875-8084	'),
(7, 20192271, 'MARYROSE\r\n', 'FUENTES', 'GONZALES', 'BSCS', '3', 'C', 'BLK 20 LT 14 SILVER ST MERRYHOMES CALOOCAN CITY\r\n', '0945-806-7020	'),
(8, 20192217, 'FRANCIS OLIVER\r\n', 'DUCUSIN', 'HILOMA	', 'BSCS', '3', 'C', 'PH1, PKG2, BLK6 LOT11 BAGONG SILANG CALOOCAN CITY\r\n', '0950-448-0820	'),
(9, 20192060, 'CHRISTIAN\r\n', 'VILLACASTIN', 'JAMAYBAY	', 'BSCS', '3', 'C', 'BLK 36 LOT 12 LA FORTEZA SUBD.2 CAMARIN, CALOOCAN CITY\r\n', '0927-594-8550	'),
(10, 20192127, 'MARY JOY\r\n', 'COMAHIG', 'LACOPANTO	', 'BSCS', '3', 'C', 'PHASE 8A, PACKAGE 7, BLOCK 107, LOT EXCESS BAGONG SILANG CALOOCAN CITY\r\n', '0907-272-8529	'),
(11, 20192135, 'JHUNRIZ\r\n', 'BARCOMA', 'LALATA	', 'BSCS', '3', 'C', 'PH 8A PKG 11 BLK 174 LOT 1 BAGONG SILANG CALOOCAN CITY\r\n', '0921-329-0206	'),
(12, 20192108, 'MISCHELE\r\n', 'ZATE', 'LOBRENO', 'BSCS', '3', 'C', 'BLK 68 LOT 19 ROSE ST CAMARIN CALOOCAN CITY\r\n', '0966-261-6353	'),
(13, 20192129, 'SHARLYMAINE', 'MOLDES\r\n', 'MAHUSAY	', 'BSCS', '3', 'C', 'BLK 77 LOT 6 BRGY. 174 CAMARIN CALOOCAN CITY\r\n', '0921-306-9562	'),
(14, 20192371, 'NOVIE DAME\r\n', 'ENCARQUEZ', 'MARBAS	', 'BSCS', '3', 'C', '1191 LANSONES ST., CAMARIN, CALOOCAN CITY\r\n', '0936-785-6319	'),
(15, 20192006, 'ERICSON\r\n', 'CUSTODIO', 'MARISCOTES	', 'BSCS', '3', 'C', 'BLK1, DUHAT ST. ADCNAI SANVICENTE FERRER CAMARIN CALOOCAN CITY\r\n', '0928-203-0001	'),
(16, 20191982, 'BERNARDO', 'SOMERA\r\n', 'MARMOL JR.', 'BSCS', '3', 'C', '', ''),
(17, 20192593, 'KIMBERLY', 'L', 'MILITANTE	', 'BSCS', '3', 'C', '', ''),
(18, 20191886, 'ROMAR\r\n', 'SITOY', 'MONTERO	', 'BSCS', '3', 'C', 'PHASE 9 PKG 5 BLOCK 13A LOT 36 BAGONG SILANG CALOOCAN CITY\r\n', '0915-374-0498	'),
(19, 20192280, 'MARY EUGENIA', 'DELA CRUZ\r\n', 'NAVAL	', 'BSCS', '3', 'C', 'VILLA REFORM STREET DEL MUNDO VILLAGE LLANO\r\n', '0915-045-5496	'),
(20, 20191940, 'SARAH GRACE ARLYN', '', 'OBEN	', 'BSCS', '3', 'C', 'PHASE 9 PACKAGE 3 BLK 32 LT 20 BAGONG SILANG CALOOCAN CITY\r\n', '0953-126-4239	'),
(21, 20192166, 'JUAN PAOLO	\r\n', 'ZEPEDA', 'ORTEGA	', 'BSCS', '3', 'C', 'PHASE 3 PACKAGE 2 BLK 31 LT 24 BAGONG SILANG CALOOCAN CITY', '0909-988-1041	\r\n'),
(22, 20192440, 'AHMAD		\r\n', 'EBUS', 'PENDI	', 'BSCS', '3', 'C', 'PHASE 6 PUROK 3 CAMARIN CALOOCAN CITY\r\n', '0919-246-7862	\r\n'),
(23, 20191992, 'JUSTINE		\r\n', 'FRANCISCO', 'PODIOTAN', 'BSCS', '3', 'C', '#86 MOUNTAIN HEIGHTS BRGY. 183 CALOOCAN CITY\r\n', '0947-323-7950	'),
(24, 20192233, 'JOHN KENNETH		\r\n', 'PATIO', 'REYES	', 'BSCS', '3', 'C', '#2379 SITIO MATARIK CALOOCAN CITY\r\n', '0963-662-8693	'),
(25, 20192128, 'JENNYLYN		\r\n', 'BAYBAYON', 'RIEGO	', 'BSCS', '3', 'C', 'PHASE 1 KAPATID BLK 8 LT 9 HOAI SUBD. BAGBAGUIN CALOOCAN CITY\r\n', '0933-820-8367	'),
(26, 20192136, 'REILLY KYLE		\r\n', 'LASMBINO', 'RUBANTE	', 'BSCS', '3', 'C', 'PHASE 1 KAPATID BLK 8 LT 9 HOAI SUBD. BAGBAGUIN CALOOCAN CITY\r\n', '0933-820-8367	'),
(27, 20191823, 'SHIELLA MAY	\r\n', 'MANGUBAT', 'SAJOL	', 'BSCS', '3', 'C', '4U7 BLDG13-B NHA MRH SITE 4 TALA CALOOCAN CITY\r\n', '0945-635-7859	'),
(28, 20192509, 'JIMUEL		\r\n', 'LAPIDES', 'SANCHEZ	', 'BSCS', '3', 'C', 'BLK 4 LT 5 CELINA HOMES BRGY. 175 CAMARIN CALOOCAN CITY\r\n', '0920-451-1245	'),
(29, 20192293, 'CZAR MCGOKOU		', 'SALAR', 'SEBASTIAN	', 'BSCS', '3', 'C', 'PHASE 8A PACKAGE 11 BLK 181 LT 1 EXCESS BAGONG SILANG CALOOCAN CITY\r\n', '0915-888-0911\r\n'),
(30, 20192085, 'DOMINIC JHON		\r\n', 'VILLA', 'SULAT	', 'BSCS', '3', 'C', 'BLK 66 LT 3 HARMONY HILLS II BRGY. LOMA DE GATO MARILAO BULACAN\r\n', '0906-335-6258	'),
(31, 20192221, 'CARL EMMANUEL		\r\n', 'ALVARADO', 'SY	', 'BSCS', '3', 'C', 'PHASE 4 PACKAGE 3 BLK 18 LT 2 BAGONG SILANG CALOOCAN CITY\r\n', '0930-125-0774'),
(32, 20192595, 'EMMANUELITO		\r\n', 'L', 'TANEO	', 'BSCS', '3', 'C', '1958 PHASE 3 B BLOCK 6 LOT 12, AREA A, BRGY 175, CAMARIN, CALOOCAN CITY\r\n', '0951-937-2850	'),
(33, 20191766, 'SATURNINO		\r\n', 'VILLEGAS', 'URSUA JR.', 'BSCS', '3', 'C', 'PHASE 8A PACKAGE 11 BLK 185 LT EXCESS BAGONG SILANG CALOOCAN CITY\r\n', '0919-856-3332	'),
(34, 20192208, 'RENJE		\r\n', 'GERVICE', 'VACNOT	', 'BSCS', '3', 'C', '#2229 SITIO MATARIK CAMARIN CALOOCAN CITY\r\n', '0910-000-5252	'),
(35, 20192390, 'JAKE		\r\n', 'COSMILLA', 'VALERA	', 'BSCS', '3', 'C', 'BLK 7 LT 32 EVERLASTING ST. DOLMAR GOLDEN HILLS SUBD. BRGY. 167 LLANO RD. CALOOC', '0915-558-4877	'),
(36, 20191114, 'CHRISTIAN JADE		\r\n', 'FERNANDEZ', 'VILLALUZ	', 'BSCS', '3', 'C', '21D KABATUHAN ST. DEPARO CALOOCAN CITY\r\n', '0961-289-4322	'),
(37, 20192281, 'JOSHUA			\r\n', 'ALFARO', 'VILLANUEVA	', 'BSCS', '3', 'C', 'BLK 20 LT 24 DAISY ST. SAN JOSE DEL MONTE BULACAN\r\n', '0909-791-7604	'),
(38, 20191299, 'NIKKI				\r\n', 'ESPARZA', 'BA-ALAN	', 'BSCS', '3', 'A', '2957 A. MABINI ST. PAGASA CAMARIN', '0938-638-1770'),
(39, 20190374, 'KENT				\r\n', 'CAUSING ', 'BALLESTEROS	', 'BSCS', '3', 'A', '1230 BO. SANJOSE CATTLEYA ST. TALA', '0948-605-4996'),
(40, 20191251, 'EDRIANE				\r\n\r\n', 'DIOSANA', 'BARCITA', 'BSCS', '3', 'A', 'BLOCK 20 LOT 8 ASCENCION ST. CAPITOL PARK HOMES 2', '0995-766-1089'),
(41, 20190800, 'BRIOL			', '', 'JEFFRIX	 ', 'BSCS', '3', 'A', '0859 GENERAL LUIS ST. BAGBAGUIN', '0920-538-3092'),
(42, 20191375, 'JOHN PHILIP				\r\n\r\n', 'NADAL', 'BULACLAC	', 'BSCS', '3', 'A', 'BLK 14 LOT 16 CHAMPACA ROAD ALMAR SUDVISION CAMARIN', '0961-581-5184'),
(43, 20190502, 'ALEXANDER		', '', 'CABERTO	', 'BSCS', '3', 'A', 'PHASE 10 A PACKAGE 3 BLOCK 71 LOT EXCESS BAGONG SILANG BRGY 176', '0933-335-0748'),
(44, 20190391, 'DANICA				\r\n', 'ORTEGA', 'CABULLO	', 'BSCS', '3', 'A', '#544 B AVOCADO ST. BO STA RITA NORTH, TALA', '0950-448-0249'),
(45, 20190791, 'CHRISTOPHER			', 'OCSALES', 'CALLEJA	', 'BSCS', '3', 'A', 'BLOCKK 2 LOT 5 PH 2 CELINA HOMES CAMARIN\r\n', '0999-545-0528	'),
(46, 20190987, 'ZHYREX				\r\n\r\n', 'LUMABAD', 'CANINO	', 'BSCS', '3', 'A', 'PHASE 9 PACKAGE 7B BLOCK 21 LOT 28 BAGONG SILANG', '0999-906-6435'),
(47, 20190719, 'KENNY LLOYD			', 'VISTAL', 'CASTILLO	', 'BSCS', '3', 'A', 'PH ASE 5 PACKAGE 2 BLOCK 6 LOT 14 BAGONG SILANG', '0910-637-1639	'),
(48, 20190531, 'GERALD				\r\n', 'TORILLOS', 'CHAVEZ	', 'BSCS', '3', 'A', 'PHASE 10 A PACKAGE 4 BLOCK 57 LOT 2 BAGONG SILANG', '0977-472-8414'),
(49, 20191155, 'KEVIN				', 'ZAFRA', 'CORPIN	', 'BSCS', '3', 'A', 'BLK 95 LOT 10 NORTHVILLE 2B BAGUMBONG\r\n', '0948-296-7743'),
(50, 20191060, 'CARLO				\r\n', 'LAUTIYA', 'DIAZ	', 'BSCS', '3', 'A', '849 DONA AURORA STREET BARRIO CONCEPCION TALA', '0946-562-0818'),
(51, 20190066, 'JERUZAEL			', 'RICAFORTE', 'DUMALE	', 'BSCS', '3', 'A', 'PHASE  7 PACKAGE 1 BLOCK 57 EXCESS LOT BSCC\r\n', '0912-576-1566	'),
(52, 20191105, 'SEAN KIM			\r\n', 'TIONGCO', 'EBARLE	', 'BSCS 3A\r\n', '', '', 'PH ASE 7B PACKAGE 2 BLOCK 30 LOT 15 BAGONG SILANG', '0930-621-2577	'),
(53, 20191094, 'DEMVERLEEN				', 'ROVIRA', 'ESPINOLA	', 'BSCS', '3', 'A', 'PHASE  7C PACKAGE 11 BLOCK 10 LOT 17 BAGONG SILANG\r\n', '0967-327-4040'),
(54, 20190323, 'TROY				\r\n', 'DAZAL', 'EXCLAMADO	', 'BSCS', '3', 'A', '686 SUN FLOWER ST. BO SAN ROQUE TALA', '0920-459-8428'),
(55, 20191285, 'MIKKIE			', '', 'GREGORIO	', 'BSCS', '3', 'A', '0018 1-T REGAL LILLY ST. LILLES SUB II', '0961-219-9995\r\n'),
(56, 20190700, 'JADE	 		\r\n', '', 'IBARRA	', 'BSCS', '3', 'A', '2807 R. HIDALGO ST. VILLA IMELDA, CAMARIN', '0930-729-9712	'),
(57, 20191323, 'JOHN LLOYD			', 'NALANGAN', 'IGHARAS	', 'BSCS', '3', 'A', 'PHASSE 6, BRGY 180 MIRAMONTE HEIGHTS\r\n', '0950-827-4985	'),
(58, 20191367, 'JERECHO			\r\n', 'LEGASPI', 'JOLO	', 'BSCS', '3', 'A', '3349 TANDANG SORA ST. BRGY 175 CAMARIN', '0909-697-5419	'),
(59, 20191172, 'TRIZHALYN				', 'LUCAS', 'MAGLANGIT	', 'BSCS', '3', 'A', '#2345 CAMARIN RD. BRGY 178 CAMARIN\r\n', '0927-152-1764'),
(60, 20191172, 'TRIZHALYN				\r\n', 'LUCAS', 'MAGLANGIT	', 'BSCS', '3', 'A', '#2345 CAMARIN RD. BRGY 178 CAMARIN', '0927-152-1764'),
(61, 20191071, 'GABRIELLE			\r\n', 'DOMINGO', 'NAPOTO	', 'BSCS', '3', 'A', 'PH 4, PKG 1 BLK 7 LOT 27 BAGONG SILANG', '0909-923-7895	'),
(62, 20191181, 'BILLY JOU			\r\n', 'PAYNO', 'NILLOS	', 'BSCS', '3', 'A', '4178 SANANA BAHAI BUKID CAMARIN', '0912-804-2020	'),
(63, 20190060, 'ANDREI NOWELL			', 'GUTIERREZ', 'ONG	', 'BSCS', '3', 'A', 'GK8,ACACIA STREET,AMPARO SUDVISION\r\n', '0945-974-8950	'),
(64, 20191368, 'JOHN JOSUAH			\r\n', 'MANIEGO', 'PAMINTUAN	', 'BSCS', '3', 'A', 'BLK 1 LOT 11 CASTLE SPRING CAMARIN', '0919-495-8198	'),
(65, 20190344, 'JACQUELINE			', 'COMBIS', 'PORRAL	', 'BSCS', '3', 'A', '11293 PH 6 PUROK 3 CAMARIN\r\n', '0946-174-5653	'),
(66, 20191309, 'JOHN	 		\r\n', '', 'QUIA	', 'BSCS', '3', 'A', 'PHASE 10B PKG6 BLK 95 LOT EXCESS BAGONG SILANG', '0949-965-1456	'),
(67, 20190981, 'KHYLE ANDREI			\r\n', 'TINDUGAN', 'REMOLONA	', 'BSCS', '3', 'A', '1070B ANONAS ST. CAMARIN', '0956-298-0689	1070B ANONAS ST. CAMARIN'),
(68, 20191115, 'EFRHAIM JAY				\r\n', 'JAVIEN', 'RIATE	', 'BSCS', '3', 'A', '265 MELCHORA AQUINO ST. BRGY 178 CAMARIN', '0919-320-1739'),
(69, 20190586, 'ROGER MOORE			', 'ACOSTA', 'SANGOL	', 'BSCS', '3', 'A', 'PHASE 9 PACKAGE 3C BLOCK 8 LOT 20 BAGONG SILANG\r\n', '0915-297-2264	'),
(70, 20191112, 'KARL ALDRINNE			\r\n', 'DIESTA', 'SEBASTIAN	', 'BSCS', '3', 'A', 'PHASE 4C PACKAGE 6 BLOCK 4 LOT 11 BAGONG SILANG', '0909-734-4344'),
(71, 20191136, 'JOHN RALPH			', 'B.', 'SILA	', 'BSCS', '3', 'A', '6070 SAMPALOC ST. CAMARIN\r\n', '0995-547-5220	'),
(72, 20190996, 'CHARLES DANIEL		\r\n', 'MAGULLADO', 'TURIAGA	', 'BSCS', '3', 'A', 'PHASE 1 PACKAGE 1 BLOCK 10 LOT EXCESS BAGONG SILANG', '093-806-43381	'),
(73, 20191382, 'KARL EDUARD			\r\n', 'BARIOLATA', 'VIANA	', 'BSCS', '3', 'A', '901 FRANVILLE 2 AREA A CAMARIN', '0915-569-8185	'),
(74, 20191065, 'JAYMAR			\r\n', 'MEDRANO', 'WALOHAN	', 'BSCS', '3', 'A', '1285 SAMPALOK ST. CAMARIN', '0910-076-6410	'),
(75, 20191131, 'DEMZIL IAN			', 'LLORCA', 'ZAMORA	', 'BSCS', '3', 'A', '651 AREA A CAMARIN ROAD LA FORTEZA ST. BRGY 175\r\n', '0948-934-7120	'),
(76, 20190994, 'VADA 			\r\n', 'BANGALISAN', 'ALABE	', 'BSCS', '3', 'B', '2846 R. HIDALGO ST. VILLA IMELDA CAMARIN CALOOCAN CITY', '0926-341-3703	'),
(77, 20191208, 'GEOFREY	\r\n', 'BILENA', 'ALEMAN	', 'BSCS', '3', 'B', 'BLK 25 LOT 28, NEOVISTA HOMES, BAGUMBONG, CALOOCAN CITY.', '0965-614-9910	'),
(78, 20191335, 'WAREN  		 \r\n', 'BERNAL', 'ARTUGUE	', 'BSCS', '3', 'B', '11 KALANTIAO ST. URDUJA VILLAGE', '0929-891-8775	'),
(79, 20191029, 'KJ			\r\n\r\n', 'BINAYA', 'AYNERA	', 'BSCS', '3', 'B', 'BLK 9 L1 TAURUS STR. MARIA LUISA SUBD. CALOOCAN CITY', '0921-920-2625	'),
(80, 20191518, 'RAYBHEN\r\n', 'RAMADA	', 'BARBACHANO	', 'BSCS', '3', 'B', 'PHASE 9 PACKAGE 3 BLK 32 LOT 50 DAMAYAN BSCC', '0912-519-4174	'),
(81, 20191326, 'JERRYL MAE			\r\n', 'GONLOT', 'BELIC	', 'BSCS', '3', 'B', '2201 -C ST. MICHAEL STREET ADMINISTRATION SITE TALA CALOOCAN CITY', '0912-622-5795	'),
(82, 20191456, 'GEOFFREY			\r\n', 'PADUA', 'BIACO', 'BSCS', '3', 'B', 'PHASE 8A PKG11 BRGY BAGONG SILANG CALOOCAN CITY', '0991-200-6658	'),
(83, 20191339, 'EDGARDO			\r\n', 'MANIANITA', 'CABALLERO	', 'BSCS', '3', 'B', 'BLK 6 LOT 14 UNION HOMES LLANO CALOOCAN CITY', '0948-160-4242	'),
(84, 20191280, 'REYNEL			\r\n', 'MUNOÑOZ', 'CIABAL   	', 'BSCS', '3', 'B', '#2 LUKBAN ST. AMPARO SUBD. CALOOCAN CITY', '0915-045-5029'),
(85, 20191079, 'CARLO			', 'TIÑGEL', 'CORTES	', 'BSCS', '3', 'B', 'BLK 14 LOT 21 DAGAT-DAGATAN ST. PUROK LALOMA, BRGY. 178,  CAMARIN, CALOOCAN CITY', '0938-603-6203	'),
(86, 20180156, 'JULIUS			\r\n', 'DE LEON', 'DAPOSALA\r\n', 'BSCS', '3', 'B', 'SITIO ABUYOD BRGY.ABUYOD TERESA RIZAL', '0955-790-8317	'),
(87, 20191082, 'IVAN REY			\r\n\r\n', 'GUNOY', 'DELFIN', 'BSCS', '3', 'B', 'BLK 24 LOT 29 ICELAND ST. HH1 SJDM BULACAN', '0921-955-7177	'),
(88, 20191097, 'RHENDEL', 'CAMPOS', 'DIOSO', 'BSCS', '3', 'B', 'BRGY. 178 NICDAO COMP. SAMPALOC EXT. CAMARIN CALOOCAN CITY', '0912-476-7914	'),
(89, 20191407, 'JAN EDWARD			\r\n', 'LEOPOLDO', 'ESPERE	', 'BSCS', '3', 'B', 'PH7A, PKG.10, BLK.20, E-LOT BAGONG SILABG CALOOCAN CITY', '0919-430-7397	'),
(90, 20191039, 'MARK NEIL			\r\n\r\n', 'DOLOR', 'EMBILE	', 'BSCS', '3', 'B', '2916 A. BONIFACIO ST. PAG-ASA, CAMARIN, CALOOCAN CITY', '0950-946-6215	'),
(91, 20191010, 'ALDIN JAY			\r\n', 'OÑATE', 'FLORANDA	', 'BSCS', '3', 'B', 'BLK 1 LOT 12 NOVA ROMANIA 1 SUBD. DEPARO, CALOOCAN CITY', '0909-173-8944	'),
(92, 20191411, 'JAKE			\r\n', 'LUNARIA', 'FLORES	', 'BSCS', '3', 'B', '286 KABATUHAN RD DEPARO CALOOCAN CITY', '0912-887-8239	'),
(93, 20191276, 'MAXI TRANX 		\r\n', 'GONZALES', 'FURISCAL 	', 'BSCS', '3', 'B', '12 ANUBING ST. AMPARO SUBDIVISION CALOOCAN CITY', '0912-725-5689	'),
(94, 20191187, 'HAZEL			\r\n', 'MACARAEG', 'IGNACIO	', 'BSCS', '3', 'B', 'PHASE 8 B PACKAGE 5 BLOCK 63 LOT 11 BSCC', '0919-236-0451	'),
(95, 20190997, 'TIFFANY 			\r\n', 'SACOBO', 'LAGADON	', 'BSCS', '3', 'B', 'PH.8B, PKG.13, BLK.26, LOT 31, BAGONG SILANG, CALOOCAN CITY', '0927-298-9360	'),
(96, 20191056, 'MARK STEVEN			\r\n', 'GALERO', 'LANSANGAN 	', 'BSCS', '3', 'B', 'L5 B5 EASTERLILY ST. BF HOMES PH. 3 DEPARO CALOOCAN CITY', '0920-840-9138	'),
(97, 20190992, 'JONATHAN			\r\n', 'CAPONONG', 'LLEMIT JR.', 'BSCS', '3', 'B', 'PHASE 8A, PACKAGE 14, BLOCK 16, LOT 82, BAGONG SILANG, CALOOCAN CITY', '0909-885-9974	'),
(98, 20191012, 'JOHN-LENARD			\r\n', 'CLEMENTE', 'MANGAY-AYAM  	', 'BSCS', '3', 'B', 'BLDG.2A 2U10 MRH NHA SITE 4, BRGY.188 TALA CALOOCAN CITY', '0938-437-9875	'),
(99, 20191012, 'JON ROLANDO			\r\n', 'DESUNIA', 'MANUEL 	', 'BSCS', '3', 'B', '1650 JASMIN ST. BICOL AREA, BARANGAY 175, CAMARIN CALOOCAN CITY.', '0945-736-2369	'),
(100, 20191366, 'AMAR			\r\n', 'CAHINDE', 'MARAVILLA  	', 'BSCS', '3', 'B', 'PHS 4 BAGONG SILANG CALOOCAN CITY', '0927-518-4627	'),
(101, 20191194, 'JOHN VINCENT			\r\n', 'TIPAY', '', 'BSCS', '3', 'B', 'BRGY 185 PUROK 2 648 MALARIA CALOOCAN CITY', '0923-756-9583	'),
(102, 20191408, 'JASON 			\r\n', 'PRADA', 'NARVAEZ	', 'BSCS', '3', 'B', 'PHS3 PKG3 BLK84 LOT12 BAGONG SILANG CALOOCAN CITY', '0951-000-9956	'),
(103, 20191193, 'JERUD			\r\n', 'VERANO', 'OCAMPO 	', 'BSCS', '3', 'B', '0111(F) LEO STREET, ESPERANZA HEIGHTS SUBDIVISION, BARANGAY 168, DEPARO, CALOOCA', '0920-828-1567	'),
(104, 20191058, 'CLRENCE JAMES			\r\n', 'GUANSING', 'ORIAS	', 'BSCS', '3', 'B', 'BLOCK 49 LOT 58 LANGKA ST. PANGARAP VILLAGE CALOOCAN CITY', '0950-288-8260	'),
(105, 20191005, 'JOHN PAULO		\r\n', 'LINGHON	', 'PATIÑO	', 'BSCS', '3', 'B', 'LOT 5, BLK. 87, NARCISUS ST., AREA C, CAMARIN, CALOOCAN CITY', '0995-941-2722	'),
(106, 20191047, 'BRANDELL BOBBY			\r\n', 'RODULFO', 'REYES	', 'BSCS', '3', 'B', 'BLK 2 LOT 6 CIELITO HOMES CALOOCAN CITY', '0960-520-0692'),
(107, 20191027, 'JON BRYAN			\r\n', 'BURBANO', 'SAMSON	', 'BSCS', '3', 'B', 'PH9, PKG2A, BLK3, LOT26, BAGONG SILANG, CALOOCAN CITY', '0945-302-0552	'),
(108, 20192225, 'ANGELICA KRISTINE			\r\n', 'YUNG', 'SAN DIEGO	', 'BSCS', '3', 'B', '100 LOT 9 BLOCK 9 JUAN LUNA ST PINAGBUKLOD CAMARIN AREA D BRGY 178 CALOOCAN CITY', '0939-189-7341	'),
(109, 20191013, 'RUSSEL			\r\n', 'BASAÑES', 'TAJADA	', 'BSCS', '3', 'B', 'PHS 10 A PKG 3 BLK 55 EXCESS LOT BAGONG SILANG CALOOCAN CITY', '0956-297-9524'),
(110, 20191001, 'JEREMY', 'TOMACLAS', 'TANSO	', 'BSCS', '3', 'B', 'BLOCK 6 LOT 7, CORPINVILLE, BARANGAY 171, BAGUMBONG, CALOOCAN CITY', '0930-970-3801	'),
(111, 20191011, 'RICHARD			', 'TOCO', 'VELORIA JR.', 'BSCS', '3', 'B', 'PHASE 10 PACKAGE 6 BLOCK 77 LOT 4 BAGONG SILANG, CALOOCAN CITY', '0926-631-5600	');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_info`
--

CREATE TABLE `supplier_info` (
  `id` int(20) NOT NULL,
  `supplier_id` int(20) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_address` varchar(100) NOT NULL,
  `supplier_contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_info`
--

INSERT INTO `supplier_info` (`id`, `supplier_id`, `supplier_name`, `supplier_address`, `supplier_contact`) VALUES
(0, 123456, 'Someone`s Company', '1234 Address St. Village Philippines City', '09583759275'),
(0, 654321, 'You Know Company', '1234 Block 6 Lot 9 Bogangvilla Philippines City', '09471923841'),
(0, 789101, 'Kahit Saan Printers', 'BGC CUTIE NEAR INTRA, Philippines City', '09999592175');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `STUDENT_NUMBER` int(8) NOT NULL,
  `FIRST_NAME` varchar(80) NOT NULL,
  `MIDDLE_NAME` varchar(80) NOT NULL,
  `LAST_NAME` varchar(80) NOT NULL,
  `COURSE` varchar(80) NOT NULL,
  `acro` varchar(10) NOT NULL,
  `ADDRESS` varchar(100) NOT NULL,
  `BIRTHDAY` varchar(100) NOT NULL,
  `CONTACT` varchar(20) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `ROLE` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `STUDENT_NUMBER`, `FIRST_NAME`, `MIDDLE_NAME`, `LAST_NAME`, `COURSE`, `acro`, `ADDRESS`, `BIRTHDAY`, `CONTACT`, `EMAIL`, `PASSWORD`, `ROLE`) VALUES
(4, 20192371, 'NOVIE DAME', 'ENCARQUEZ', 'MARBAS	', 'BS Computer Science', 'BSCS', '1191 Lanzones St. Camarin Caloo,can City', '', '09187681314', 'novie@gmail.com', 'novie', 'users'),
(6, 20192293, 'CZAR MCGOKOU		', 'SALAR', 'SEBASTIAN	', 'BS Computer Science', 'BSCS', '---', '---', '---', 'marbas0907@gmail.com', '12345', 'users');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aces_inventory`
--
ALTER TABLE `aces_inventory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `aces_product`
--
ALTER TABLE `aces_product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `STUDENT_NUMBER` (`STUDENT_NUMBER`);

--
-- Indexes for table `cart_info`
--
ALTER TABLE `cart_info`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `transaction_num` (`cart_num`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pending_info`
--
ALTER TABLE `pending_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `STUDENT_NUMBER` (`STUDENT_NUMBER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aces_inventory`
--
ALTER TABLE `aces_inventory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `aces_product`
--
ALTER TABLE `aces_product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `ID` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_info`
--
ALTER TABLE `cart_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pending_info`
--
ALTER TABLE `pending_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `ID` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
