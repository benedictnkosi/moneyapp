-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 28, 2019 at 07:47 PM
-- Server version: 10.1.41-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sixtylee_moneyapp_preprod`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `name`, `type`, `active`) VALUES
(12, 'FNB Cheque Account', 7, 1),
(13, 'FNB Credit Card', 8, 1),
(14, 'Satrix Top 40', 9, 1),
(15, 'Randburg One Bedroom', 10, 1),
(16, 'Randburg One Bedroom', 11, 1),
(17, 'Hyundai i10', 12, 1),
(18, 'Hyundai i10 Loan', 8, 1),
(19, 'STD Bank', 7, 1),
(20, 'Retirement Annuity', 9, 1),
(21, 'FNB Bank Account', 7, 1),
(22, 'FNB Credit Card', 7, 1),
(23, 'Absa Credit Card', 8, 1),
(24, 'Nedbank Cheque', 7, 1),
(25, 'i10', 12, 1),
(26, 'Randburg 1 Bed', 11, 1),
(27, 'Cosmo City', 11, 1),
(28, 'Cosmo City', 10, 1),
(29, 'Satrix', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `account_type_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `active` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`account_type_id`, `name`, `active`) VALUES
(7, 'Bank Accounts', 1),
(8, 'Credit', 1),
(9, 'Investments', 1),
(10, 'Mortgages', 1),
(11, 'Properties', 1),
(12, 'Vehicles', 1);

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE `budget` (
  `budget_id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `transaction` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `active` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`budget_id`, `user`, `transaction`, `amount`, `active`) VALUES
(76, 18, 43, 200, 1),
(77, 18, 44, 200, 1),
(78, 18, 47, 382, 1),
(79, 18, 102, 50, 1),
(80, 18, 51, 500, 1),
(81, 18, 54, 1000, 1),
(82, 18, 58, 1500, 1),
(83, 18, 59, 1200, 1),
(84, 18, 64, 560, 1),
(85, 18, 70, 150, 1),
(86, 18, 73, 5800, 1),
(87, 18, 77, 1600, 1),
(88, 18, 86, 25000, 1),
(89, 18, 91, 5500, 1),
(90, 18, 94, 5000, 1),
(91, 18, 82, 0, 1),
(92, 18, 83, 1000, 1),
(93, 20, 44, 130, 1),
(94, 20, 86, 44800, 1),
(95, 20, 43, 200, 1),
(96, 20, 47, 380, 1),
(97, 20, 51, 500, 1),
(98, 20, 54, 500, 1),
(99, 20, 58, 1000, 1),
(100, 20, 59, 1280, 1),
(101, 20, 64, 560, 1),
(102, 20, 77, 1200, 1),
(103, 20, 92, 1450, 1),
(104, 20, 105, 89, 1),
(105, 20, 102, 140, 1),
(106, 20, 93, 37000, 1),
(107, 18, 90, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `name` int(11) DEFAULT NULL,
  `transaction_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` float DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  `category` int(11) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `user`, `name`, `transaction_date`, `amount`, `active`, `category`, `description`) VALUES
(124, 18, 43, '2019-05-07 15:59:41', 0, 1, 1, 'no description'),
(125, 18, 44, '2019-05-07 15:59:53', 0, 1, 1, 'no description'),
(126, 18, 47, '2019-05-07 15:59:57', 0, 1, 1, 'no description'),
(127, 18, 102, '2019-05-07 16:00:05', 0, 1, 1, 'no description'),
(128, 18, 51, '2019-05-07 16:00:11', 0, 1, 1, 'no description'),
(129, 18, 54, '2019-05-07 16:00:17', 0, 1, 1, 'no description'),
(130, 18, 58, '2019-05-07 16:00:21', 0, 1, 1, 'no description'),
(131, 18, 59, '2019-05-07 16:00:23', 0, 1, 1, 'no description'),
(132, 18, 64, '2019-05-07 16:00:30', 0, 1, 1, 'no description'),
(133, 18, 70, '2019-05-07 16:00:40', 0, 1, 1, 'no description'),
(134, 18, 73, '2019-05-07 16:00:52', 0, 1, 1, 'no description'),
(135, 18, 77, '2019-05-07 16:00:57', 0, 1, 1, 'no description'),
(136, 18, 86, '2019-05-07 16:01:28', 0, 1, 3, 'no description'),
(137, 18, 43, '2019-05-06 22:00:00', 150, 1, 1, 'no description'),
(138, 18, 44, '2019-05-06 22:00:00', 199, 1, 1, 'no description'),
(139, 18, 47, '2019-05-06 22:00:00', 382, 1, 1, 'no description'),
(140, 18, 102, '2019-05-06 22:00:00', 50, 1, 1, 'no description'),
(141, 18, 51, '2019-05-06 22:00:00', 400, 1, 1, 'no description'),
(142, 18, 54, '2019-05-06 22:00:00', 40, 1, 1, 'no description'),
(143, 18, 54, '2019-05-15 22:00:00', 90, 1, 1, 'no description'),
(144, 18, 54, '2019-05-19 22:00:00', 180, 1, 1, 'movies'),
(145, 18, 58, '2019-05-19 22:00:00', 350, 1, 1, 'Testing'),
(146, 18, 59, '2019-05-19 22:00:00', 1200, 1, 1, 'no description'),
(147, 18, 91, '2019-05-09 16:34:03', 0, 1, 4, 'no description'),
(148, 18, 94, '2019-05-09 16:34:06', 0, 1, 4, 'no description'),
(149, 18, 82, '2019-05-09 16:34:11', 0, 1, 2, 'no description'),
(150, 18, 83, '2019-05-09 16:34:13', 0, 1, 2, 'no description'),
(151, 18, 86, '2019-05-08 22:00:00', 20000, 1, 3, 'no description'),
(152, 18, 94, '2019-05-08 22:00:00', 5000, 1, 4, 'no description'),
(153, 18, 83, '2019-05-08 22:00:00', 6000, 1, 2, 'no description'),
(154, 18, 44, '2019-05-08 22:00:00', 500, 1, 1, 'no description'),
(155, 20, 44, '2019-05-27 18:36:04', 0, 1, 1, 'no description'),
(156, 20, 86, '2019-05-27 18:36:35', 0, 1, 3, 'no description'),
(157, 20, 43, '2019-05-27 18:37:28', 0, 1, 1, 'no description'),
(158, 20, 47, '2019-05-27 18:37:55', 0, 1, 1, 'no description'),
(159, 20, 51, '2019-05-27 18:38:02', 0, 1, 1, 'no description'),
(160, 20, 54, '2019-05-27 18:38:07', 0, 1, 1, 'no description'),
(161, 20, 58, '2019-05-27 18:38:17', 0, 1, 1, 'no description'),
(162, 20, 59, '2019-05-27 18:38:24', 0, 1, 1, 'no description'),
(163, 20, 64, '2019-05-27 18:38:31', 0, 1, 1, 'no description'),
(164, 20, 77, '2019-05-27 18:39:04', 0, 1, 1, 'no description'),
(165, 20, 92, '2019-05-27 18:40:05', 0, 1, 4, 'no description'),
(166, 20, 105, '2019-05-27 18:43:24', 0, 1, 1, 'no description'),
(167, 20, 102, '2019-05-27 18:44:40', 0, 1, 1, 'no description'),
(168, 20, 93, '2019-05-27 18:47:19', 0, 1, 4, 'no description'),
(169, 18, 90, '2019-06-30 13:29:11', 0, 1, 3, 'no description');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_category`
--

CREATE TABLE `transaction_category` (
  `transaction_category_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `active` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction_category`
--

INSERT INTO `transaction_category` (`transaction_category_id`, `name`, `active`) VALUES
(1, 'Personal Expenses', 1),
(2, 'Investments', 1),
(3, 'Income', 1),
(4, 'Loan Pay Down', 1),
(5, 'Business Expenses', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_name`
--

CREATE TABLE `transaction_name` (
  `transaction_name_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `custom` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction_name`
--

INSERT INTO `transaction_name` (`transaction_name_id`, `name`, `active`, `category`, `custom`) VALUES
(43, 'ATM and Cash', 1, 1, 0),
(44, 'Bank Charges and Fees', 1, 1, 0),
(47, 'Cellphone', 1, 1, 0),
(48, 'Children and Dependants', 1, 1, 0),
(49, 'Clothing and Shoes', 1, 1, 0),
(50, 'Donations to Charity', 1, 1, 0),
(51, 'Eating Out and Takeouts', 1, 1, 0),
(52, 'Electricity', 1, 1, 0),
(53, 'Electronics and Appliances', 1, 1, 0),
(54, 'Entertainment', 1, 1, 0),
(55, 'Furniture', 1, 1, 0),
(56, 'General Purchases', 1, 1, 0),
(57, 'Gifts', 1, 1, 0),
(58, 'Groceries', 1, 1, 0),
(59, 'Health and Medical', 1, 1, 0),
(60, 'Holidays and Travel', 1, 1, 0),
(61, 'Home and Garden', 1, 1, 0),
(62, 'Home Renovations', 1, 1, 0),
(63, 'Rates & Tax', 1, 1, 0),
(64, 'Insurance', 1, 1, 0),
(66, 'Interest', 1, 1, 0),
(67, 'Internet and Telephone', 1, 1, 0),
(68, 'Laundry', 1, 1, 0),
(69, 'Leisure and Sport', 1, 1, 0),
(70, 'Personal Care', 1, 1, 0),
(71, 'Pets', 1, 1, 0),
(72, 'Professional Services', 1, 1, 0),
(73, 'Rent', 1, 1, 0),
(74, 'Salaries and Wages', 1, 1, 0),
(75, 'Supper and lunch', 1, 1, 0),
(76, 'Tax', 1, 1, 0),
(77, 'Transport and Fuel', 1, 1, 0),
(79, 'Uncategorised', 1, 1, 0),
(80, 'Vehicle Expenses', 1, 1, 0),
(81, 'Education and Study', 1, 2, 0),
(82, 'Stock Market', 1, 2, 0),
(83, 'Property Investment', 1, 2, 0),
(84, 'Bitcoin', 1, 2, 0),
(85, 'Savings Account', 1, 2, 0),
(86, 'Salary & Wages', 1, 3, 0),
(87, 'Interest', 1, 3, 0),
(88, 'Rental Income', 1, 3, 0),
(89, 'Dividends', 1, 3, 0),
(90, 'Business Revenue', 1, 3, 0),
(91, 'Home Loan Repayments', 1, 4, 0),
(92, 'Vehicle Loan Repayments', 1, 4, 0),
(93, 'Personal Loan Repayments', 1, 4, 0),
(94, 'Credit Card Repayments', 1, 4, 0),
(95, 'Student Loan Repayments', 1, 4, 0),
(96, 'Other Business Expenses', 1, 5, 0),
(97, 'Salary & Wages', 1, 5, 0),
(98, 'Rent', 1, 5, 0),
(99, 'Black Tax', 1, 1, 1),
(100, 'Parking', 1, 1, 0),
(101, 'Open Field Poultry ', 1, 3, 1),
(102, 'Data Bundles', 1, 1, 1),
(103, 'Allan Grey', 1, 1, 1),
(104, 'Allan Grey', 1, 1, 1),
(105, 'FNB Legal Insurance', 1, 1, 1),
(106, 'FNB Legal Insurance', 1, 1, 1),
(107, 'FNB Legal Insurance', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  `creation_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `active`, `creation_date`) VALUES
(18, 'Demo', '$2y$10$nqC6u/1cR0xoM8iv0wfX/ukdfqocm69l1WLZc1X26aq48fPPVfGx6', 1, NULL),
(19, 'Bhavna812', '$2y$10$LEdZ/s/cZ5EoUq7s3KpQo.0.8.yhsIwIBo6M3eSpFl6DDtdoorEzS', 1, NULL),
(20, 'benzo', '$2y$10$jNLYZu7FFBCw4IsAn50NVuSBqJ547sIoa7Q5y6f6Z0wH1k8m6mTlq', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_account_id` int(11) NOT NULL,
  `account` int(11) DEFAULT NULL,
  `balance` float DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `transaction_date` timestamp NULL DEFAULT NULL,
  `goal_amount` float DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `interest` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_account_id`, `account`, `balance`, `active`, `transaction_date`, `goal_amount`, `user`, `interest`) VALUES
(43, 12, 5000, 1, '2019-05-07 16:50:18', 0, 18, 0),
(44, 13, -49000, 1, '2019-05-07 16:50:40', 0, 18, 0),
(45, 25, 65000, 1, '2019-05-07 16:50:56', 0, 18, 0),
(46, 26, 550000, 1, '2019-05-10 16:48:36', 0, 18, 0),
(47, 27, 950000, 1, '2019-05-10 16:48:44', 0, 18, 0),
(48, 28, -880000, 1, '2019-05-10 16:48:56', 0, 18, 0),
(49, 15, -481000, 1, '2019-05-10 16:49:08', 0, 18, 0),
(50, 29, 4800, 1, '2019-05-10 16:49:32', 0, 18, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_transaction_name`
--

CREATE TABLE `user_transaction_name` (
  `user_transaction_name_id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `transaction` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_transaction_name`
--

INSERT INTO `user_transaction_name` (`user_transaction_name_id`, `user`, `transaction`, `active`) VALUES
(423, 18, 43, 1),
(424, 18, 44, 1),
(425, 18, 47, 1),
(426, 18, 48, 1),
(427, 18, 49, 1),
(428, 18, 50, 1),
(429, 18, 51, 1),
(430, 18, 52, 1),
(431, 18, 53, 1),
(432, 18, 54, 1),
(433, 18, 55, 1),
(434, 18, 56, 1),
(435, 18, 57, 1),
(436, 18, 58, 1),
(437, 18, 59, 1),
(438, 18, 60, 1),
(439, 18, 61, 1),
(440, 18, 62, 1),
(441, 18, 63, 1),
(442, 18, 64, 1),
(443, 18, 66, 1),
(444, 18, 67, 1),
(445, 18, 68, 1),
(446, 18, 69, 1),
(447, 18, 70, 1),
(448, 18, 71, 1),
(449, 18, 72, 1),
(450, 18, 73, 1),
(451, 18, 74, 1),
(452, 18, 75, 1),
(453, 18, 76, 1),
(454, 18, 77, 1),
(455, 18, 79, 1),
(456, 18, 80, 1),
(457, 18, 81, 1),
(458, 18, 82, 1),
(459, 18, 83, 1),
(460, 18, 84, 1),
(461, 18, 85, 1),
(462, 18, 86, 1),
(463, 18, 87, 1),
(464, 18, 88, 1),
(465, 18, 89, 1),
(466, 18, 90, 1),
(467, 18, 91, 1),
(468, 18, 92, 1),
(469, 18, 93, 1),
(470, 18, 94, 1),
(471, 18, 95, 1),
(472, 18, 96, 1),
(473, 18, 97, 1),
(474, 18, 98, 1),
(475, 18, 99, 1),
(476, 18, 100, 1),
(477, 18, 101, 1),
(478, 18, 102, 1),
(479, 18, 103, 1),
(480, 18, 104, 1),
(481, 19, 43, 1),
(482, 19, 44, 1),
(483, 19, 47, 1),
(484, 19, 48, 1),
(485, 19, 49, 1),
(486, 19, 50, 1),
(487, 19, 51, 1),
(488, 19, 52, 1),
(489, 19, 53, 1),
(490, 19, 54, 1),
(491, 19, 55, 1),
(492, 19, 56, 1),
(493, 19, 57, 1),
(494, 19, 58, 1),
(495, 19, 59, 1),
(496, 19, 60, 1),
(497, 19, 61, 1),
(498, 19, 62, 1),
(499, 19, 63, 1),
(500, 19, 64, 1),
(501, 19, 66, 1),
(502, 19, 67, 1),
(503, 19, 68, 1),
(504, 19, 69, 1),
(505, 19, 70, 1),
(506, 19, 71, 1),
(507, 19, 72, 1),
(508, 19, 73, 1),
(509, 19, 74, 1),
(510, 19, 75, 1),
(511, 19, 76, 1),
(512, 19, 77, 1),
(513, 19, 79, 1),
(514, 19, 80, 1),
(515, 19, 81, 1),
(516, 19, 82, 1),
(517, 19, 83, 1),
(518, 19, 84, 1),
(519, 19, 85, 1),
(520, 19, 86, 1),
(521, 19, 87, 1),
(522, 19, 88, 1),
(523, 19, 89, 1),
(524, 19, 90, 1),
(525, 19, 91, 1),
(526, 19, 92, 1),
(527, 19, 93, 1),
(528, 19, 94, 1),
(529, 19, 95, 1),
(530, 19, 96, 1),
(531, 19, 97, 1),
(532, 19, 98, 1),
(533, 19, 99, 1),
(534, 19, 100, 1),
(535, 19, 101, 1),
(536, 19, 102, 1),
(537, 19, 103, 1),
(538, 19, 104, 1),
(539, 20, 43, 1),
(540, 20, 44, 1),
(541, 20, 47, 1),
(542, 20, 48, 1),
(543, 20, 49, 1),
(544, 20, 50, 1),
(545, 20, 51, 1),
(546, 20, 52, 1),
(547, 20, 53, 1),
(548, 20, 54, 1),
(549, 20, 55, 1),
(550, 20, 56, 1),
(551, 20, 57, 1),
(552, 20, 58, 1),
(553, 20, 59, 1),
(554, 20, 60, 1),
(555, 20, 61, 1),
(556, 20, 62, 1),
(557, 20, 63, 1),
(558, 20, 64, 1),
(559, 20, 66, 1),
(560, 20, 67, 1),
(561, 20, 68, 1),
(562, 20, 69, 1),
(563, 20, 70, 1),
(564, 20, 71, 1),
(565, 20, 72, 1),
(566, 20, 73, 1),
(567, 20, 74, 1),
(568, 20, 75, 1),
(569, 20, 76, 1),
(570, 20, 77, 1),
(571, 20, 79, 1),
(572, 20, 80, 1),
(573, 20, 81, 1),
(574, 20, 82, 1),
(575, 20, 83, 1),
(576, 20, 84, 1),
(577, 20, 85, 1),
(578, 20, 86, 1),
(579, 20, 87, 1),
(580, 20, 88, 1),
(581, 20, 89, 1),
(582, 20, 90, 1),
(583, 20, 91, 1),
(584, 20, 92, 1),
(585, 20, 93, 1),
(586, 20, 94, 1),
(587, 20, 95, 1),
(588, 20, 96, 1),
(589, 20, 97, 1),
(590, 20, 98, 1),
(591, 20, 99, 0),
(592, 20, 100, 1),
(593, 20, 101, 1),
(594, 20, 102, 1),
(595, 20, 103, 0),
(596, 20, 104, 0),
(597, 20, 105, 1),
(598, 20, 106, 0),
(599, 20, 107, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`),
  ADD KEY `account_accounttype_idx` (`type`);

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`account_type_id`);

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`budget_id`),
  ADD KEY `budget_user_idx` (`user`),
  ADD KEY `budget_transaction_idx` (`transaction`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `transaction_user_idx` (`user`),
  ADD KEY `transaction_transaction_name_idx` (`name`),
  ADD KEY `transaction_category_idx` (`category`);

--
-- Indexes for table `transaction_category`
--
ALTER TABLE `transaction_category`
  ADD PRIMARY KEY (`transaction_category_id`);

--
-- Indexes for table `transaction_name`
--
ALTER TABLE `transaction_name`
  ADD PRIMARY KEY (`transaction_name_id`),
  ADD KEY `transaction_name_category_idx` (`category`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_account_id`),
  ADD KEY `user_account_account_idx` (`account`),
  ADD KEY `user_account_user_idx` (`user`);

--
-- Indexes for table `user_transaction_name`
--
ALTER TABLE `user_transaction_name`
  ADD PRIMARY KEY (`user_transaction_name_id`),
  ADD KEY `user_transaction_name_user_idx` (`user`),
  ADD KEY `user_transaction_name_transactionname_idx` (`transaction`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `account_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `budget_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `transaction_category`
--
ALTER TABLE `transaction_category`
  MODIFY `transaction_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction_name`
--
ALTER TABLE `transaction_name`
  MODIFY `transaction_name_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user_transaction_name`
--
ALTER TABLE `user_transaction_name`
  MODIFY `user_transaction_name_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=600;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_accounttype` FOREIGN KEY (`type`) REFERENCES `account_type` (`account_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `budget`
--
ALTER TABLE `budget`
  ADD CONSTRAINT `budget_transaction` FOREIGN KEY (`transaction`) REFERENCES `transaction_name` (`transaction_name_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `budget_user` FOREIGN KEY (`user`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_category` FOREIGN KEY (`category`) REFERENCES `transaction_category` (`transaction_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `transaction_transaction_name` FOREIGN KEY (`name`) REFERENCES `transaction_name` (`transaction_name_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `transaction_user` FOREIGN KEY (`user`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaction_name`
--
ALTER TABLE `transaction_name`
  ADD CONSTRAINT `transaction_name_category` FOREIGN KEY (`category`) REFERENCES `transaction_category` (`transaction_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_account`
--
ALTER TABLE `user_account`
  ADD CONSTRAINT `user_account_account` FOREIGN KEY (`account`) REFERENCES `account` (`account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_account_user` FOREIGN KEY (`user`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_transaction_name`
--
ALTER TABLE `user_transaction_name`
  ADD CONSTRAINT `user_transaction_name_transactionname` FOREIGN KEY (`transaction`) REFERENCES `transaction_name` (`transaction_name_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_transaction_name_user` FOREIGN KEY (`user`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
