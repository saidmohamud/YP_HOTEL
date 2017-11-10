-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2017 at 03:59 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpledata`
--

-- --------------------------------------------------------

--
-- Table structure for table `biling`
--

CREATE TABLE `biling` (
  `gid` int(10) NOT NULL,
  `gfullname` varchar(30) NOT NULL,
  `rno` varchar(20) NOT NULL,
  `floor` varchar(30) NOT NULL,
  `rtype` varchar(30) NOT NULL,
  `bdate` varchar(30) NOT NULL,
  `gdate` varchar(30) NOT NULL,
  `quantity` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `paid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biling`
--

INSERT INTO `biling` (`gid`, `gfullname`, `rno`, `floor`, `rtype`, `bdate`, `gdate`, `quantity`, `price`, `amount`, `paid`) VALUES
(135, 'Siciid maxamuud cumar', '108', 'Floor1', 'family', '10/16/2017', '10/02/2017', '14', '8', '112', ''),
(136, 'Siciid maxamuud cumar', '108', 'Floor1', 'family', '10/30/2017', '10/03/2017', '27', '8', '216', ''),
(137, 'farax gele cali', '109', 'Floor1', 'family', '10/12/2017', '2017-10-11', '2', ' 8', '16', '70'),
(138, 'farax gele cali', '109', 'Floor1', 'family', '', '2017-10-11', '', ' 8', 'NaN', '2'),
(139, 'maxamad', '303', 'Floor3', 'family', '10/30/2017', '2017-10-18', '5', ' 8', '32', '8'),
(140, 'farax gele cali', '109', 'Floor1', 'family', '10/29/2017', '2017-10-11', '2', ' 8', '16', '8'),
(141, 'maxamad', '303', 'Floor3', 'family', '10/30/2017', '2017-10-18', '3', '8', '24', '8'),
(142, 'farax gele cali', '109', 'Floor1', 'family', '10/29/2017', '2017-10-11', '2', ' 8', '16', '8'),
(143, 'ikraan cali warsame', '205', 'Floor2', 'single', '10/29/2017', '2017-10-04', '2', '4', '8', '4');

-- --------------------------------------------------------

--
-- Table structure for table `dbiling`
--

CREATE TABLE `dbiling` (
  `gid` int(10) NOT NULL,
  `gfullname` varchar(30) NOT NULL,
  `rno` varchar(30) NOT NULL,
  `floor` varchar(30) NOT NULL,
  `rtype` varchar(30) NOT NULL,
  `gdate` date NOT NULL,
  `paid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dbiling`
--

INSERT INTO `dbiling` (`gid`, `gfullname`, `rno`, `floor`, `rtype`, `gdate`, `paid`) VALUES
(15, 'farax gele cali', '109', 'Floor1', 'family', '2017-10-11', '10'),
(16, 'Siciid maxamuud cumar', '108', 'Floor1', 'family', '2017-10-05', '4'),
(17, 'ikraan cali warsame', '205', 'Floor2', 'single', '2017-10-04', '4');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `gid` int(11) NOT NULL,
  `gfullname` varchar(50) NOT NULL,
  `gaddress` varchar(100) NOT NULL,
  `gcountry` varchar(100) NOT NULL,
  `gcity` varchar(100) NOT NULL,
  `gdate` date NOT NULL,
  `gphone` int(20) NOT NULL,
  `gemail` varchar(50) NOT NULL,
  `ggender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`gid`, `gfullname`, `gaddress`, `gcountry`, `gcity`, `gdate`, `gphone`, `gemail`, `ggender`) VALUES
(13, 'maxamad', 'lantahawada', 'Puntland State', 'Saylac', '2017-10-04', 907776765, 'yusro@gmail.com', 'Male'),
(14, 'maxamad', 'lantahawada', 'Puntland State', 'Boosaaso', '2017-10-17', 907666565, 'maxamad40@gmail.com', 'Male'),
(15, 'Siciid maxamuud cumar', 'lantahawada', 'Maakhir State', 'Baran', '2017-10-16', 907666565, 'gele@gmail.com', 'Male'),
(16, 'maxamad cali yasin', 'Rawda', 'Puntland State', 'Ceynabo', '2017-10-09', 907666565, 'cali@gmail.com', 'Male'),
(17, 'yusro cali gedi', 'new bosaso', 'Jubalad State', 'Kismaayo', '2017-10-10', 907273268, 'yusro@gmail.com', 'Female'),
(18, 'ikraan cali warsame', 'new bosaso', 'Maakhir State', 'Baran', '2017-10-18', 907273268, 'ikran@gmail.com', 'Female'),
(19, 'farax gele cali', 'Rawda', 'Jubalad State', 'Kismaayo', '2017-10-08', 2147483647, 'gele@gmail.com', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `hrooms`
--

CREATE TABLE `hrooms` (
  `gid` int(10) NOT NULL,
  `floor` enum('Floor1','Floor2','Floor3') NOT NULL,
  `rtype` enum('SIngle','Family') NOT NULL,
  `rno` int(11) NOT NULL,
  `rprice` varchar(50) NOT NULL,
  `rstatus` enum('AVailble','Occupied','Cleaning') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hrooms`
--

INSERT INTO `hrooms` (`gid`, `floor`, `rtype`, `rno`, `rprice`, `rstatus`) VALUES
(4, 'Floor1', 'SIngle', 0, '$ 4', 'AVailble'),
(5, 'Floor2', 'Family', 0, '$ 8', 'Occupied'),
(6, 'Floor3', '', 0, '', 'Cleaning');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` enum('Member','Administrator') NOT NULL DEFAULT 'Member'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `type`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator'),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--

CREATE TABLE `nationality` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nationality`
--

INSERT INTO `nationality` (`id`, `name`) VALUES
(1, 'Aruba'),
(2, 'Afghanistan'),
(3, 'Angola'),
(4, 'Anguilla'),
(5, 'Albania'),
(6, 'Andorra'),
(7, 'Netherlands Antilles'),
(8, 'United Arab Emirates'),
(9, 'Argentina'),
(10, 'Armenia'),
(11, 'American Samoa'),
(12, 'Antarctica'),
(13, 'French Southern territories'),
(14, 'Antigua and Barbuda'),
(15, 'Australia'),
(16, 'Austria'),
(17, 'Azerbaijan'),
(18, 'Burundi'),
(19, 'Belgium'),
(20, 'Benin'),
(21, 'Burkina Faso'),
(22, 'Bangladesh'),
(23, 'Bulgaria'),
(24, 'Bahrain'),
(25, 'Bahamas'),
(26, 'Bosnia and Herzegovina'),
(27, 'Belarus'),
(28, 'Belize'),
(29, 'Bermuda'),
(30, 'Bolivia'),
(31, 'Brazil'),
(32, 'Barbados'),
(33, 'Brunei'),
(34, 'Bhutan'),
(35, 'Bouvet Island'),
(36, 'Botswana'),
(37, 'Central African Republic'),
(38, 'Canada'),
(39, 'Cocos (Keeling) Islands'),
(40, 'Switzerland'),
(41, 'Chile'),
(42, 'China'),
(43, 'CÃ´te dâ€™Ivoire'),
(44, 'Cameroon'),
(45, 'Congo, The Democratic Republic'),
(46, 'Congo'),
(47, 'Cook Islands'),
(48, 'Colombia'),
(49, 'Comoros'),
(50, 'Cape Verde'),
(51, 'Costa Rica'),
(52, 'Cuba'),
(53, 'Christmas Island'),
(54, 'Cayman Islands'),
(55, 'Cyprus'),
(56, 'Czech Republic'),
(57, 'Germany'),
(58, 'Djibouti'),
(59, 'Dominica'),
(60, 'Denmark'),
(61, 'Dominican Republic'),
(62, 'Algeria'),
(63, 'Ecuador'),
(64, 'Egypt'),
(65, 'Eritrea'),
(66, 'Western Sahara'),
(67, 'Spain'),
(68, 'Estonia'),
(69, 'Ethiopia'),
(70, 'Finland'),
(71, 'Fiji Islands'),
(72, 'Falkland Islands'),
(73, 'France'),
(74, 'Faroe Islands'),
(75, 'Micronesia, Federated States o'),
(76, 'Gabon'),
(77, 'United Kingdom'),
(78, 'Georgia'),
(79, 'Ghana'),
(80, 'Gibraltar'),
(81, 'Guinea'),
(82, 'Guadeloupe'),
(83, 'Gambia'),
(84, 'Guinea-Bissau'),
(85, 'Equatorial Guinea'),
(86, 'Greece'),
(87, 'Grenada'),
(88, 'Greenland'),
(89, 'Guatemala'),
(90, 'French Guiana'),
(91, 'Guam'),
(92, 'Guyana'),
(93, 'Hong Kong'),
(94, 'Heard Island and McDonald Isla'),
(95, 'Honduras'),
(96, 'Croatia'),
(97, 'Haiti'),
(98, 'Hungary'),
(99, 'Indonesia'),
(100, 'India'),
(101, 'British Indian Ocean Territory'),
(102, 'Ireland'),
(103, 'Iran'),
(104, 'Iraq'),
(105, 'Iceland'),
(106, 'Israel'),
(107, 'Italy'),
(108, 'Jamaica'),
(109, 'Jordan'),
(110, 'Japan'),
(111, 'Kazakstan'),
(112, 'Kenya'),
(113, 'Kyrgyzstan'),
(114, 'Cambodia'),
(115, 'Kiribati'),
(116, 'Saint Kitts and Nevis'),
(117, 'South Korea'),
(118, 'Kuwait'),
(119, 'Laos'),
(120, 'Lebanon'),
(121, 'Liberia'),
(122, 'Libyan Arab Jamahiriya'),
(123, 'Saint Lucia'),
(124, 'Liechtenstein'),
(125, 'Sri Lanka'),
(126, 'Lesotho'),
(127, 'Lithuania'),
(128, 'Luxembourg'),
(129, 'Latvia'),
(130, 'Macao'),
(131, 'Morocco'),
(132, 'Monaco'),
(133, 'Moldova'),
(134, 'Madagascar'),
(135, 'Maldives'),
(136, 'Mexico'),
(137, 'Marshall Islands'),
(138, 'Macedonia'),
(139, 'Mali'),
(140, 'Malta'),
(141, 'Myanmar'),
(142, 'Mongolia'),
(143, 'Northern Mariana Islands'),
(144, 'Mozambique'),
(145, 'Mauritania'),
(146, 'Montserrat'),
(147, 'Martinique'),
(148, 'Mauritius'),
(149, 'Malawi'),
(150, 'Malaysia'),
(151, 'Mayotte'),
(152, 'Namibia'),
(153, 'New Caledonia'),
(154, 'Niger'),
(155, 'Norfolk Island'),
(156, 'Nigeria'),
(157, 'Nicaragua'),
(158, 'Niue'),
(159, 'Netherlands'),
(160, 'Norway'),
(161, 'Nepal'),
(162, 'Nauru'),
(163, 'New Zealand'),
(164, 'Oman'),
(165, 'Pakistan'),
(166, 'Panama'),
(167, 'Pitcairn'),
(168, 'Peru'),
(169, 'Philippines'),
(170, 'Palau'),
(171, 'Papua New Guinea'),
(172, 'Poland'),
(173, 'Puerto Rico'),
(174, 'North Korea'),
(175, 'Portugal'),
(176, 'Paraguay'),
(177, 'Palestine'),
(178, 'French Polynesia'),
(179, 'Qatar'),
(180, 'RÃ©union'),
(181, 'Romania'),
(182, 'Russian Federation'),
(183, 'Rwanda'),
(184, 'Saudi Arabia'),
(185, 'Sudan'),
(186, 'Senegal'),
(187, 'Singapore'),
(188, 'South Georgia and the South Sa'),
(189, 'Saint Helena'),
(190, 'Svalbard and Jan Mayen'),
(191, 'Solomon Islands'),
(192, 'Sierra Leone'),
(193, 'El Salvador'),
(194, 'San Marino'),
(195, 'Somalia'),
(196, 'Saint Pierre and Miquelon'),
(197, 'Sao Tome and Principe'),
(198, 'Suriname'),
(199, 'Slovakia'),
(200, 'Slovenia'),
(201, 'Sweden'),
(202, 'Swaziland'),
(203, 'Seychelles'),
(204, 'Syria'),
(205, 'Turks and Caicos Islands'),
(206, 'Chad'),
(207, 'Togo'),
(208, 'Thailand'),
(209, 'Tajikistan'),
(210, 'Tokelau'),
(211, 'Turkmenistan'),
(212, 'East Timor'),
(213, 'Tonga'),
(214, 'Trinidad and Tobago'),
(215, 'Tunisia'),
(216, 'Turkey'),
(217, 'Tuvalu'),
(218, 'Taiwan'),
(219, 'Tanzania'),
(220, 'Uganda'),
(221, 'Ukraine'),
(222, 'United States Minor Outlying I'),
(223, 'Uruguay'),
(224, 'United States'),
(225, 'Uzbekistan'),
(226, 'Holy See (Vatican City State)'),
(227, 'Saint Vincent and the Grenadin'),
(228, 'Venezuela'),
(229, 'Virgin Islands, British'),
(230, 'Virgin Islands, U.S.'),
(231, 'Vietnam'),
(232, 'Vanuatu'),
(233, 'Wallis and Futuna'),
(234, 'Samoa'),
(235, 'Yemen'),
(236, 'Yugoslavia'),
(237, 'South Africa'),
(238, 'Zambia'),
(239, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `pob`
--

CREATE TABLE `pob` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pob`
--

INSERT INTO `pob` (`id`, `name`) VALUES
(1, 'Hargeysa'),
(2, 'Berbera'),
(3, 'Gebilay'),
(4, 'Boorame'),
(5, 'Saylac'),
(6, 'Baki'),
(7, 'Lug-haye'),
(8, 'Seylac'),
(9, 'Burco'),
(10, 'Buuhoodle'),
(11, 'Ood-weyne'),
(12, 'Sheikh'),
(13, 'Laas-caanood'),
(14, 'Taleex'),
(15, 'Ceynabo'),
(16, 'Xuddun'),
(17, 'Ceerigaabo'),
(18, 'Xuddun'),
(19, 'Laas-qoray'),
(20, 'Ceel-afwen'),
(21, 'Baran'),
(22, 'Boosaaso'),
(23, 'Bandar-beyla'),
(24, 'Qardho'),
(25, 'Isku-shuban'),
(26, 'Qandala'),
(27, 'Caluula'),
(28, 'Baar-gaal'),
(29, 'Xaafuun'),
(30, 'Garowe'),
(31, 'Eyl'),
(32, 'Dan-gorayo'),
(33, 'Bur-tinle'),
(34, 'Gaal-kacyo'),
(35, 'Hobyo'),
(36, 'Xarar-dheere'),
(37, 'Jarriiban'),
(38, 'Goldogob'),
(39, 'Dhuusa-mareeb'),
(40, 'Ceel-buur'),
(41, 'Ceel-dheer'),
(42, 'Cadaado'),
(43, 'Cabuud-waaq'),
(44, 'Gal-hareeri'),
(45, 'Balan-bal'),
(46, 'Beled-weyne'),
(47, 'Buulo-burte'),
(48, 'Jalalaqsi'),
(49, 'Matabaan'),
(50, 'Maxaas'),
(51, 'Jowhar'),
(52, 'Bal-cad'),
(53, 'Cadale'),
(54, 'Aadan yabaal'),
(55, 'Mahaddaay'),
(56, 'Ruun-nirgood'),
(57, 'War-sheikh'),
(58, 'Marka'),
(59, 'Af-gooye'),
(60, 'Wanle-weyn'),
(61, 'Qoryo-leey'),
(62, 'Baraawe'),
(63, 'Sablaale'),
(64, 'Kurtun-waareey'),
(65, 'Dajuuma'),
(66, 'Aw-dheegle'),
(67, 'Bu-aale'),
(68, 'Jilib'),
(69, 'Saakoow'),
(70, 'Kismaayo'),
(71, 'Jamaame'),
(72, 'Af-madow'),
(73, 'Badhaadhe'),
(74, 'Xagar'),
(75, 'Baydhabo'),
(76, 'Buur-hakaba'),
(77, 'Baydhabo'),
(78, 'Diin-soor'),
(79, 'Qansax-dheere'),
(80, 'Berdaale'),
(81, 'Xuddur'),
(82, 'Tayeegloow'),
(83, 'Waa-jid'),
(84, 'Ceel-berde'),
(85, 'Yeed'),
(86, 'Rab-dhuurre'),
(87, 'Garba-haarreey'),
(88, 'Luuq'),
(89, 'Baar-dheere'),
(90, 'Beled-xaawo'),
(91, 'Dooloow'),
(92, 'Ceel-waaq'),
(93, 'Xamar-weyne'),
(94, 'Xamar-jajab'),
(95, 'Boon-dheere'),
(96, 'Waaberi'),
(97, 'Wada-jir'),
(98, 'Dharkeyn-leey'),
(99, 'Hodon'),
(100, 'Howl-wadaag'),
(101, 'War-dhiigleey'),
(102, 'Shibis'),
(103, 'C/casiis'),
(104, 'Kaaraan'),
(105, 'Huriwaa'),
(106, 'Dayniile'),
(107, 'Yaaq-shiid'),
(108, 'Shingaani');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `gid` int(10) NOT NULL,
  `gfullname` varchar(50) NOT NULL,
  `gdate` date DEFAULT NULL,
  `floor` varchar(50) NOT NULL,
  `rno` varchar(255) NOT NULL,
  `rtype` varchar(50) NOT NULL,
  `rprice` varchar(50) NOT NULL,
  `paid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`gid`, `gfullname`, `gdate`, `floor`, `rno`, `rtype`, `rprice`, `paid`) VALUES
(109, 'Siciid maxamuud cumar', '2017-10-05', 'Floor1', '108', 'family', '8', '8');

-- --------------------------------------------------------

--
-- Table structure for table `roomno`
--

CREATE TABLE `roomno` (
  `room_id` int(10) NOT NULL,
  `rno` varchar(50) NOT NULL,
  `floor` varchar(50) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `room_status` enum('Available','Accupied') NOT NULL,
  `room_price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomno`
--

INSERT INTO `roomno` (`room_id`, `rno`, `floor`, `room_type`, `room_status`, `room_price`) VALUES
(4, '104', 'Floor1', 'family', 'Available', '$ 8'),
(5, '105', 'Floor1', 'single', 'Available', '$ 8'),
(6, '106', 'Floor1', 'single', 'Accupied', '$ 4'),
(7, '107', 'Floor1', 'single', 'Accupied', '$ 4'),
(8, '108', 'Floor1', 'single', 'Accupied', '$ 4'),
(9, '109', 'Floor1', 'family', 'Accupied', '$ 8'),
(10, '110', 'Floor1', 'single', 'Available', '$ 4'),
(11, '201', 'Floor2', 'single', 'Available', '$ 4'),
(12, '202', 'Floor2', 'famliy', 'Available', '$ 8'),
(13, '203', 'Floor2', 'single', 'Available', '$ 4'),
(14, '205', 'Floor2', 'single', 'Accupied', '$ 4'),
(15, '206', 'Floor2', 'single', 'Accupied', '$ 4'),
(16, '207', 'Floor2', 'single', 'Accupied', '$ 4'),
(17, '208', 'Floor2', 'single', 'Accupied', '$ 4'),
(18, '209', 'Floor2', 'family', 'Available', '$ 8'),
(19, '210', 'Floor2', 'single', 'Available', '$ 4'),
(20, '301', 'Floor3', 'single', 'Available', '$ 4'),
(21, '302', 'Floor3', 'family', 'Available', '$ 8'),
(22, '303', 'Floor3', 'single', 'Accupied', '$ 4'),
(23, '304', 'Floor3', 'single', 'Accupied', '$ 4'),
(24, '305', 'Floor3', 'single', 'Accupied', '$ 4'),
(25, '306', 'Floor3', 'single', 'Accupied', '$ 4'),
(26, '307', 'Floor3', 'single', 'Available', '$ 4'),
(27, '308', 'Floor3', 'single', 'Available', '$ 4'),
(28, '309', 'Floor3', 'single', 'Available', '$ 8'),
(29, '310', 'Floor3', 'single', 'Available', '$ 4');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `gid` int(10) NOT NULL,
  `floor` varchar(50) NOT NULL,
  `rtype` varchar(50) NOT NULL,
  `rprice` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`gid`, `floor`, `rtype`, `rprice`) VALUES
(1, 'floor1', 'single', '$ 4'),
(2, 'floor2', 'family', '$ 8'),
(3, 'floor 3', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'Select State'),
(2, 'Maakhir State'),
(3, 'Puntland State'),
(4, 'Galmudug State'),
(5, 'Jubalad State'),
(6, 'Hirshabele State'),
(7, 'Koonfur Galbees State'),
(8, 'Somaliland State');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biling`
--
ALTER TABLE `biling`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `dbiling`
--
ALTER TABLE `dbiling`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`gid`),
  ADD KEY `gfullname` (`gfullname`);

--
-- Indexes for table `hrooms`
--
ALTER TABLE `hrooms`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `nationality`
--
ALTER TABLE `nationality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pob`
--
ALTER TABLE `pob`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `roomno`
--
ALTER TABLE `roomno`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biling`
--
ALTER TABLE `biling`
  MODIFY `gid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
--
-- AUTO_INCREMENT for table `dbiling`
--
ALTER TABLE `dbiling`
  MODIFY `gid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `hrooms`
--
ALTER TABLE `hrooms`
  MODIFY `gid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nationality`
--
ALTER TABLE `nationality`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;
--
-- AUTO_INCREMENT for table `pob`
--
ALTER TABLE `pob`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `gid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `roomno`
--
ALTER TABLE `roomno`
  MODIFY `room_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `gid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
