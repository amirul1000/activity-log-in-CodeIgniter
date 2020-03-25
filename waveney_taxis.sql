-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2020 at 03:56 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waveney_taxis`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) NOT NULL,
  `added_by_users_id` int(10) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_time` varchar(20) DEFAULT NULL,
  `customers_id` int(10) DEFAULT NULL,
  `number_of_passengers` int(10) DEFAULT NULL,
  `pickup_address` text,
  `drop_off_address` text,
  `return_journey` enum('Yes','No') DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `return_time` varchar(20) DEFAULT NULL,
  `return_flight_number` int(11) DEFAULT NULL,
  `contact_telephone_number` int(11) DEFAULT NULL,
  `total_fare` decimal(10,2) DEFAULT NULL,
  `paid_or_unpaid` enum('PAID','NOT PAID') DEFAULT NULL,
  `payment_method` enum('Cash','Bacs','Cheque','Account') DEFAULT NULL,
  `comments_for_booking` text,
  `type_of_taxi` enum('Local Taxi','Airport Taxi') DEFAULT NULL,
  `type_of_vehicle_required` int(11) DEFAULT NULL,
  `assign_to_driver_users_id` int(11) DEFAULT NULL,
  `allocated_pickup_time` varchar(20) DEFAULT NULL,
  `allocated_finish_time_of_booking_for_the_day` varchar(20) DEFAULT NULL,
  `customer_type` enum('New customer','Returning customer','Account customer') DEFAULT NULL,
  `source_of_booking` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `added_by_users_id`, `booking_date`, `booking_time`, `customers_id`, `number_of_passengers`, `pickup_address`, `drop_off_address`, `return_journey`, `return_date`, `return_time`, `return_flight_number`, `contact_telephone_number`, `total_fare`, `paid_or_unpaid`, `payment_method`, `comments_for_booking`, `type_of_taxi`, `type_of_vehicle_required`, `assign_to_driver_users_id`, `allocated_pickup_time`, `allocated_finish_time_of_booking_for_the_day`, `customer_type`, `source_of_booking`, `created_at`, `updated_at`) VALUES
(2, 9, '2020-03-13', '00:00', 1, 1, 'London', 'NY', 'Yes', '0000-00-00', 'bb', 0, 0, '0.00', '', '', '', '', 0, 10, '', '', 'New customer', 5, '2020-03-12 12:22:13', '2020-03-13 12:12:19'),
(3, 9, '2020-03-18', '10:00', 1, 44, 'Oxford', 'London', 'Yes', '2020-03-13', '12:05', 0, 0, '0.00', 'PAID', '', '', 'Local Taxi', 0, 10, '08:00', '', 'Returning customer', 55, '2020-03-13 08:02:23', '2020-03-13 12:12:09'),
(4, 9, '2020-03-19', '13:05', 1, 1, 'Ny', 'Oxford', 'Yes', '2020-03-13', '13:15', 0, 0, '0.00', '', '', '', '', 0, 11, '', '', 'New customer', 55, '2020-03-13 08:45:18', '2020-03-13 12:27:39'),
(5, 9, '2020-03-15', '22:30', 1, 33, '23677', '64555', 'Yes', '2020-03-13', '17:35', 6666, 666666, '66.00', 'PAID', 'Cash', '666', 'Local Taxi', 66, 11, '17:30', '55', 'New customer', 555, '2020-03-13 12:24:58', '2020-03-13 12:27:18'),
(6, 9, '2020-03-14', '02:20', 1, 44, 'C-20,JAkir Hossain Road,Block-E', 'Md-pur', 'Yes', '2020-03-14', '20:50', 0, 66565656, '66.00', 'PAID', 'Cash', '', 'Local Taxi', 0, 11, '', '', 'New customer', 0, '2020-03-13 21:53:24', '2020-03-14 17:45:11'),
(7, 9, '2020-03-25', '12:45', 1, 0, 'Dhaka', 'Md-pur', 'No', '2020-03-26', '21:45', 0, 66565656, '0.00', 'PAID', 'Cash', '', 'Local Taxi', 0, 11, '12:35', '55', 'New customer', 55, '2020-03-25 07:05:30', '2020-03-25 07:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(127) DEFAULT NULL,
  `address` text,
  `country` varchar(127) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `state` varchar(64) DEFAULT NULL,
  `zip` varchar(64) DEFAULT NULL,
  `file_company_logo` varchar(256) DEFAULT NULL,
  `file_report_logo` varchar(256) DEFAULT NULL,
  `file_report_background` varchar(256) DEFAULT NULL,
  `report_footer` varchar(256) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `address`, `country`, `city`, `state`, `zip`, `file_company_logo`, `file_report_logo`, `file_report_background`, `report_footer`) VALUES
(2, 'Pata Corporation', 'C-20,JAkir Hossain Road,Block-E, Md-pur', 'Bangladesh', 'Dhaka', 'Dhaka Division', '1212', 'uploads/images/company/fb8a0bd3-c5df-40a9-8373-a9f209d95d64.jpg', 'uploads/images/company/fb8a0bd3-c5df-40a9-8373-a9f209d95d64.jpg', 'uploads/images/company/fb8a0bd3-c5df-40a9-8373-a9f209d95d64.jpg', 'footer content XXXXXXXXX XXXXXXX'),
(1, 'Pata Corporation', 'C-20,JAkir Hossain Road,Block-E, Md-pur', 'US', 'PArk', 'NY', '1212', NULL, NULL, NULL, 'footer content XXXXXXXXX XXXXXXX');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country` varchar(200) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country`) VALUES
(1, 'Afghanistan'),
(2, 'Ã…land Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua and Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bhutan'),
(27, 'Bolivia'),
(28, 'Bosnia and Herzegovina'),
(29, 'Botswana'),
(30, 'Bouvet Island'),
(31, 'Brazil'),
(32, 'British Indian Ocean Territory'),
(33, 'Brunei Darussalam'),
(34, 'Bulgaria'),
(35, 'Burkina Faso'),
(36, 'Burundi'),
(37, 'Cambodia'),
(38, 'Cameroon'),
(39, 'Canada'),
(40, 'Cape Verde'),
(41, 'Cayman Islands'),
(42, 'Central African Republic'),
(43, 'Chad'),
(44, 'Chile'),
(45, 'China'),
(46, 'Christmas Island'),
(47, 'Cocos (Keeling) Islands'),
(48, 'Colombia'),
(49, 'Comoros'),
(50, 'Congo'),
(51, 'Congo, The Democratic Republic of the'),
(52, 'Cook Islands'),
(53, 'Costa Rica'),
(54, 'CÃ´te D''Ivoire'),
(55, 'Croatia'),
(56, 'Cuba'),
(57, 'Cyprus'),
(58, 'Czech Republic'),
(59, 'Denmark'),
(60, 'Djibouti'),
(61, 'Dominica'),
(62, 'Dominican Republic'),
(63, 'Ecuador'),
(64, 'Egypt'),
(65, 'El Salvador'),
(66, 'Equatorial Guinea'),
(67, 'Eritrea'),
(68, 'Estonia'),
(69, 'Ethiopia'),
(70, 'Falkland Islands (Malvinas)'),
(71, 'Faroe Islands'),
(72, 'Fiji'),
(73, 'Finland'),
(74, 'France'),
(75, 'French Guiana'),
(76, 'French Polynesia'),
(77, 'French Southern Territories'),
(78, 'Gabon'),
(79, 'Gambia'),
(80, 'Georgia'),
(81, 'Germany'),
(82, 'Ghana'),
(83, 'Gibraltar'),
(84, 'Greece'),
(85, 'Greenland'),
(86, 'Grenada'),
(87, 'Guadeloupe'),
(88, 'Guam'),
(89, 'Guatemala'),
(90, 'Guernsey'),
(91, 'Guinea'),
(92, 'Guinea-Bissau'),
(93, 'Guyana'),
(94, 'Haiti'),
(95, 'Heard Island and McDonald Islands'),
(96, 'Holy See (Vatican City State)'),
(97, 'Honduras'),
(98, 'Hong Kong'),
(99, 'Hungary'),
(100, 'Iceland'),
(101, 'India'),
(102, 'Indonesia'),
(103, 'Iran, Islamic Republic of'),
(104, 'Iraq'),
(105, 'Ireland'),
(106, 'Isle of Man'),
(107, 'Israel'),
(108, 'Italy'),
(109, 'Jamaica'),
(110, 'Japan'),
(111, 'Jersey'),
(112, 'Jordan'),
(113, 'Kazakhstan'),
(114, 'Kenya'),
(115, 'Kiribati'),
(116, 'Korea, Democratic People''s Republic of'),
(117, 'Korea, Republic of'),
(118, 'Kuwait'),
(119, 'Kyrgyzstan'),
(120, 'Lao People''s Democratic Republic'),
(121, 'Latvia'),
(122, 'Lebanon'),
(123, 'Lesotho'),
(124, 'Liberia'),
(125, 'Libyan Arab Jamahiriya'),
(126, 'Liechtenstein'),
(127, 'Lithuania'),
(128, 'Luxembourg'),
(129, 'Macao'),
(130, 'Macedonia, The Former Yugoslav Republic of'),
(131, 'Madagascar'),
(132, 'Malawi'),
(133, 'Malaysia'),
(134, 'Maldives'),
(135, 'Mali'),
(136, 'Malta'),
(137, 'Marshall Islands'),
(138, 'Martinique'),
(139, 'Mauritania'),
(140, 'Mauritius'),
(141, 'Mayotte'),
(142, 'Mexico'),
(143, 'Micronesia, Federated States of'),
(144, 'Moldova, Republic of'),
(145, 'Monaco'),
(146, 'Mongolia'),
(147, 'Montenegro'),
(148, 'Montserrat'),
(149, 'Morocco'),
(150, 'Mozambique'),
(151, 'Myanmar'),
(152, 'Namibia'),
(153, 'Nauru'),
(154, 'Nepal'),
(155, 'Netherlands'),
(156, 'Netherlands Antilles'),
(157, 'New Caledonia'),
(158, 'New Zealand'),
(159, 'Nicaragua'),
(160, 'Niger'),
(161, 'Nigeria'),
(162, 'Niue'),
(163, 'Norfolk Island'),
(164, 'Northern Mariana Islands'),
(165, 'Norway'),
(166, 'Oman'),
(167, 'Pakistan'),
(168, 'Palau'),
(169, 'Palestinian Territory, Occupied'),
(170, 'Panama'),
(171, 'Papua New Guinea'),
(172, 'Paraguay'),
(173, 'Peru'),
(174, 'Philippines'),
(175, 'Pitcairn'),
(176, 'Poland'),
(177, 'Portugal'),
(178, 'Puerto Rico'),
(179, 'Qatar'),
(180, 'Reunion'),
(181, 'Romania'),
(182, 'Russian Federation'),
(183, 'Rwanda'),
(184, 'Saint BarthÃ©lemy'),
(185, 'Saint Helena'),
(186, 'Saint Kitts and Nevis'),
(187, 'Saint Lucia'),
(188, 'Saint Martin'),
(189, 'Saint Pierre and Miquelon'),
(190, 'Saint Vincent and the Grenadines'),
(191, 'Samoa'),
(192, 'San Marino'),
(193, 'Sao Tome and Principe'),
(194, 'Saudi Arabia'),
(195, 'Senegal'),
(196, 'Serbia'),
(197, 'Seychelles'),
(198, 'Sierra Leone'),
(199, 'Singapore'),
(200, 'Slovakia'),
(201, 'Slovenia'),
(202, 'Solomon Islands'),
(203, 'Somalia'),
(204, 'South Africa'),
(205, 'South Georgia and the South Sandwich Islands'),
(206, 'Spain'),
(207, 'Sri Lanka'),
(208, 'Sudan'),
(209, 'Suriname'),
(210, 'Svalbard and Jan Mayen'),
(211, 'Swaziland'),
(212, 'Sweden'),
(213, 'Switzerland'),
(214, 'Syrian Arab Republic'),
(215, 'Taiwan, Province Of China'),
(216, 'Tajikistan'),
(217, 'Tanzania, United Republic of'),
(218, 'Thailand'),
(219, 'Timor-Leste'),
(220, 'Togo'),
(221, 'Tokelau'),
(222, 'Tonga'),
(223, 'Trinidad and Tobago'),
(224, 'Tunisia'),
(225, 'Turkey'),
(226, 'Turkmenistan'),
(227, 'Turks and Caicos Islands'),
(228, 'Tuvalu'),
(229, 'Uganda'),
(230, 'Ukraine'),
(231, 'United Arab Emirates'),
(232, 'United Kingdom'),
(233, 'United States'),
(234, 'United States Minor Outlying Islands'),
(235, 'Uruguay'),
(236, 'Uzbekistan'),
(237, 'Vanuatu'),
(238, 'Venezuela'),
(239, 'Viet Nam'),
(240, 'Virgin Islands, British'),
(241, 'Virgin Islands, U.S.'),
(242, 'Wallis And Futuna'),
(243, 'Western Sahara'),
(244, 'Yemen'),
(245, 'Zambia'),
(246, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `full_name` varchar(127) DEFAULT NULL,
  `address` text,
  `postcode` varchar(20) DEFAULT NULL,
  `home_telephone` varchar(20) DEFAULT NULL,
  `mobile_mumber` varchar(20) DEFAULT NULL,
  `notes` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `address`, `postcode`, `home_telephone`, `mobile_mumber`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'Amirul Momenin', 'C-20,JAkir Hossain Road,Block-E\r\nMd-pur', '1207', '066565656', '', '', '2020-03-12 12:21:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(10) NOT NULL,
  `users_id` int(10) DEFAULT NULL,
  `action` text,
  `ip` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `users_id`, `action`, `ip`, `created_at`, `updated_at`) VALUES
(1, 9, 'successfully login', '::1', '2020-03-14 17:38:35', '2020-03-14 17:38:35'),
(2, 9, 'update bookings 6', '::1', '2020-03-14 17:45:12', '2020-03-14 17:45:12'),
(3, 9, 'successfully login', '::1', '2020-03-16 09:32:50', '2020-03-16 09:32:50'),
(4, 9, 'successfully login', '::1', '2020-03-17 01:48:37', '2020-03-17 01:48:37'),
(5, 9, 'successfully login', '::1', '2020-03-17 02:49:21', '2020-03-17 02:49:21'),
(6, 9, 'successfully login', '::1', '2020-03-20 21:42:52', '2020-03-20 21:42:52'),
(7, 9, 'successfully login', '::1', '2020-03-20 21:45:11', '2020-03-20 21:45:11'),
(8, 9, 'successfully login', '::1', '2020-03-25 03:43:52', '2020-03-25 03:43:52'),
(9, 9, 'save bookings 7', '::1', '2020-03-25 07:05:31', '2020-03-25 07:05:31'),
(10, 9, 'update bookings 7', '::1', '2020-03-25 07:06:30', '2020-03-25 07:06:30'),
(11, 9, 'update bookings 7', '::1', '2020-03-25 07:12:28', '2020-03-25 07:12:28'),
(12, 9, 'update bookings 7', '::1', '2020-03-25 07:16:12', '2020-03-25 07:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `email` varchar(127) NOT NULL,
  `password` varchar(127) NOT NULL,
  `digit_code` varchar(20) DEFAULT NULL,
  `title` varchar(127) NOT NULL,
  `first_name` varchar(127) NOT NULL,
  `last_name` varchar(127) NOT NULL,
  `file_picture` varchar(256) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `company` varchar(127) DEFAULT NULL,
  `address` varchar(127) DEFAULT NULL,
  `city` varchar(127) DEFAULT NULL,
  `state` varchar(127) DEFAULT NULL,
  `zip` varchar(127) DEFAULT NULL,
  `country_id` varchar(127) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_type` enum('office','driver','admin') NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `digit_code`, `title`, `first_name`, `last_name`, `file_picture`, `phone_no`, `dob`, `company`, `address`, `city`, `state`, `zip`, `country_id`, `created_at`, `updated_at`, `user_type`, `status`) VALUES
(9, 'xx@xx.com', '9336ebf25087d91c818ee6e9ec29f8c1', '1234', 'Mr.', 'John', 'Smith', 'uploads/images/users/1.jpg', '', '2020-03-13', '', '', '', '', '', '231', '2011-10-19 00:00:00', '2020-03-13 03:53:04', 'admin', 'active'),
(10, 'drtger@dfdfdf.com', '123', NULL, 'test', 'Mike', 'White', '', '65656565', '2020-03-13', '6565656', '565656', '56565', '65656', '556565', '232', '2020-03-13 08:00:59', NULL, 'driver', 'active'),
(11, 'aa@aa.com', '4124bc0a9335c27f086f24ba207a4912', '1234', '', 'Stive', 'Alien', 'uploads/images/users/1.jpg', '44545', '2020-03-13', '', '', '', '', '', '242', '2020-03-13 08:38:19', '2020-03-14 12:58:52', 'driver', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
