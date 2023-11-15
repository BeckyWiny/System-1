-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 05, 2023 at 03:12 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prisons`
--

-- --------------------------------------------------------

--
-- Table structure for table `cell`
--

DROP TABLE IF EXISTS `cell`;
CREATE TABLE IF NOT EXISTS `cell` (
  `cell_id` int(11) NOT NULL AUTO_INCREMENT,
  `capacity` int(10) NOT NULL,
  `occupancy` int(10) NOT NULL,
  PRIMARY KEY (`cell_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cell`
--

INSERT INTO `cell` (`cell_id`, `capacity`, `occupancy`) VALUES
(1, 10, 5),
(2, 8, 3),
(3, 12, 8),
(4, 10, 5),
(5, 8, 3),
(6, 12, 7),
(7, 6, 2),
(8, 15, 10),
(9, 9, 4),
(10, 11, 6),
(11, 7, 3),
(12, 14, 9),
(13, 10, 5),
(14, 8, 3),
(15, 12, 7),
(16, 6, 2),
(17, 15, 10),
(18, 9, 4),
(19, 11, 6),
(20, 7, 3),
(21, 14, 9),
(22, 10, 5),
(23, 8, 3),
(24, 12, 7),
(25, 6, 2),
(26, 15, 10),
(27, 9, 4),
(28, 11, 6),
(29, 7, 3),
(30, 14, 9),
(31, 10, 5),
(32, 8, 3),
(33, 12, 7),
(34, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `name`) VALUES
(1, 'Administration'),
(2, 'Security'),
(3, 'Medical Services'),
(4, 'Mental Health Services'),
(5, 'Education and Vocational Training'),
(6, 'Rehabilitation and Reintegration'),
(7, 'Food Services'),
(8, 'Maintenance and Facilities'),
(9, 'Legal and Parole Services'),
(10, 'Records and Documentation');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`employee_id`),
  KEY `department_id` (`department_id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `name`, `contact`, `email`, `dateofbirth`, `department_id`, `role`) VALUES
(8, 'John Kaweesi', '+256701234567', 'john.kaweesi@gmail.com', '1990-01-01', 1, 'Manager'),
(9, 'Mary Nakalema', '+256702345678', 'mary.nakalema@gmail.com', '1992-03-15', 2, 'Security Guard'),
(10, 'Joseph Ogwal', '+256703456789', 'joseph.ogwal@gmail.com', '1988-05-20', 3, 'Doctor'),
(11, 'Sarah Lubega', '++25677777777', 'sarah.lubega@gmail.com', '1991-08-10', 4, 'Psychiatrist'),
(12, 'David Nalubega', '+256705678901', 'david.nalubega@gmail.com', '1989-12-05', 5, 'Teacher'),
(13, 'Joyce Ochieng', '+256706789012', 'joyce.ochieng@gmail.com', '1993-07-25', 6, 'Rehabilitation Specialist'),
(14, 'Michael Ssempiira', '+256707890123', 'michael.ssempiira@gmail.com', '1994-04-18', 7, 'Food Services Manager'),
(15, 'Jane Namutebi', '+256708901234', 'jane.namutebi@gmail.com', '1996-11-08', 8, 'Facilities Technician'),
(16, 'Daniel Kato', '+256709012345', 'daniel.kato@gmail.com', '1997-09-30', 9, 'Parole Officer'),
(17, 'Grace Nabatanzi', '+256709876543', 'grace.nabatanzi@gmail.com', '1995-02-28', 10, 'Archivist'),
(18, 'Patrick Okello', '+256710987654', 'patrick.okello@gmail.com', '1992-06-12', 2, 'Security Officer'),
(19, 'Rebecca Mugisha', '+256712098765', 'rebecca.mugisha@gmail.com', '1993-09-22', 3, 'Nurse'),
(20, 'Andrew Lubega', '+256714210987', 'andrew.lubega@gmail.com', '1991-04-02', 4, 'Therapist'),
(21, 'Sarah Nakato', '+256715321098', 'sarah.nakato@gmail.com', '1994-11-11', 5, 'Instructor'),
(22, 'Josephine Nalubwama', '+256716432109', 'josephine.nalubwama@gmail.com', '1993-01-23', 6, 'Social Worker'),
(23, 'Charles Ochieng', '+256717543210', 'charles.ochieng@gmail.com', '1988-08-15', 7, 'Cook'),
(24, 'Florence Namuddu', '+256718654321', 'florence.namuddu@gmail.com', '1990-12-31', 8, 'Maintenance Supervisor'),
(25, 'Mark Kato', '+256719765432', 'mark.kato@gmail.com', '1996-02-10', 9, 'Legal Assistant'),
(26, 'Juliet Nabatanzi', '+256720876543', 'juliet.nabatanzi@gmail.com', '1997-07-07', 10, 'Documentation Specialist'),
(27, 'Simon Kizito', '+256721987654', 'simon.kizito@gmail.com', '1990-03-03', 1, 'Administrator'),
(28, 'Alice Nakalema', '+256723098765', 'alice.nakalema@gmail.com', '1992-10-16', 2, 'Security Officer'),
(29, 'Peter Ogwang', '+256725210987', 'peter.ogwang@gmail.com', '1989-11-25', 3, 'Surgeon'),
(30, 'Christine Lubega', '+256727321098', 'christine.lubega@gmail.com', '1991-12-07', 4, 'Counselor'),
(31, 'Andrew Ssebaggala', '+256729432109', 'andrew.ssebaggala@gmail.com', '1994-06-13', 5, 'Vocational Trainer'),
(32, 'Susan Namutebi', '+256731543210', 'susan.namutebi@gmail.com', '1993-04-04', 6, 'Reintegration Specialist'),
(33, 'Robert Kato', '+256733654321', 'robert.kato@gmail.com', '1995-08-27', 7, 'Chef'),
(34, 'Helen Nakato', '+256735765432', 'helen.nakato@gmail.com', '1990-09-18', 8, 'Maintenance Technician'),
(35, 'Stephen Lubega', '+256737876543', 'stephen.lubega@gmail.com', '1996-01-07', 9, 'Paralegal'),
(36, 'Sarah Nabatanzi', '+256739987654', 'sarah.nabatanzi@gmail.com', '1997-03-29', 10, 'Records Clerk'),
(37, 'Peter Kizito', '+256741098765', 'peter.kizito@gmail.com', '1993-04-12', 1, 'Administrator'),
(38, 'Alice Nakabugo', '+256743210987', 'alice.nakabugo@gmail.com', '1995-11-23', 2, 'Security Officer'),
(39, 'Paul Ogik', '+256745321098', 'paul.ogik@gmail.com', '1992-02-05', 3, 'Surgeon'),
(40, 'Christine Namuwonge', '+256747432109', 'christine.namuwonge@gmail.com', '1990-10-17', 4, 'Counselor'),
(41, 'Isaac Ssempijja', '+256749543210', 'isaac.ssempijja@gmail.com', '1996-07-14', 5, 'Vocational Trainer'),
(42, 'Esther Namuwanga', '+256751654321', 'esther.namuwanga@gmail.com', '1994-05-25', 6, 'Reintegration Specialist'),
(43, 'Robert Kakooza', '+256753765432', 'robert.kakooza@gmail.com', '1991-09-08', 7, 'Chef'),
(44, 'Hannah Nakabuye', '+256755876543', 'hannah.nakabuye@gmail.com', '1993-12-27', 8, 'Maintenance Technician'),
(45, 'David Lubulwa', '+256757987654', 'david.lubulwa@gmail.com', '1995-02-19', 9, 'Paralegal'),
(46, 'Angela Nabukalu', '+256759098765', 'angela.nabukalu@gmail.com', '1997-08-31', 10, 'Records Clerk'),
(47, 'Fredrick Otim', '+256761210987', 'fredrick.otim@gmail.com', '1991-07-03', 2, 'Security Officer'),
(48, 'Gloria Mugabi', '+256763321098', 'gloria.mugabi@gmail.com', '1994-10-13', 3, 'Nurse'),
(49, 'Samuel Ogik', '+256765432109', 'samuel.ogik@gmail.com', '1989-03-26', 4, 'Therapist'),
(50, 'Diana Nakayiza', '+256767543210', 'diana.nakayiza@gmail.com', '1992-06-07', 5, 'Instructor'),
(51, 'Patrick Nanyombi', '+256769654321', 'patrick.nanyombi@gmail.com', '1995-01-29', 6, 'Social Worker'),
(52, 'Sarah Achiro', '+256771765432', 'sarah.achiro@gmail.com', '1988-11-20', 7, 'Cook'),
(53, 'Joyce Namutebi', '+256773876543', 'joyce.namutebi@gmail.com', '1990-12-11', 8, 'Maintenance Supervisor'),
(54, 'Simon Katumba', '+256775987654', 'simon.katumba@gmail.com', '1997-04-30', 9, 'Legal Assistant'),
(55, 'Caroline Nakitende', '+256778098765', 'caroline.nakitende@gmail.com', '1993-06-22', 10, 'Documentation Specialist'),
(56, 'Samuel Kisitu', '+256780210987', 'samuel.kisitu@gmail.com', '1996-09-02', 1, 'Manager'),
(57, 'Evelyn Nakalembe', '+256782321098', 'evelyn.nakalembe@gmail.com', '1991-08-14', 2, 'Security Officer'),
(58, 'Francis Okello', '+256784432109', 'francis.okello@gmail.com', '1994-02-25', 3, 'Doctor'),
(59, 'Catherine Lubega', '+256786543210', 'catherine.lubega@gmail.com', '1990-03-07', 4, 'Psychiatrist'),
(60, 'Timothy Nsubuga', '+256788654321', 'timothy.nsubuga@gmail.com', '1993-10-18', 5, 'Teacher'),
(61, 'Mercy Ochola', '+256790765432', 'mercy.ochola@gmail.com', '1995-05-29', 6, 'Rehabilitation Specialist'),
(62, 'Samson Ssenyonga', '+256792876543', 'samson.ssenyonga@gmail.com', '1992-09-10', 7, 'Food Services Manager'),
(63, 'Martha Namutebi', '+256794987654', 'martha.namutebi@gmail.com', '1994-12-01', 8, 'Facilities Technician'),
(64, 'Emmanuel Kato', '+256797098765', 'emmanuel.kato@gmail.com', '1996-02-22', 9, 'Parole Officer'),
(65, 'Esther Nabukenya', '+256799210987', 'esther.nabukenya@gmail.com', '1997-11-13', 10, 'Archivist'),
(66, 'Ronald Okello', '+256711321098', 'ronald.okello@gmail.com', '1992-07-24', 2, 'Security Officer'),
(67, 'Sylvia Mugisha', '+256713432109', 'sylvia.mugisha@gmail.com', '1993-09-05', 3, 'Nurse'),
(68, 'Christopher Ogwal', '+256715543210', 'christopher.ogwal@gmail.com', '1989-04-16', 4, 'Therapist'),
(69, 'Dorothy Lubega', '+256717654321', 'dorothy.lubega@gmail.com', '1991-01-27', 5, 'Instructor'),
(70, 'Pauline Nakalema', '+256719765432', 'pauline.nakalema@gmail.com', '1993-06-08', 6, 'Social Worker'),
(71, 'Moses Ochieng', '+256721876543', 'moses.ochieng@gmail.com', '1988-05-19', 7, 'Cook'),
(72, 'Joy Namuddu', '+256723987654', 'joy.namuddu@gmail.com', '1990-09-30', 8, 'Maintenance Supervisor'),
(73, 'Thomas Kato', '+256726098765', 'thomas.kato@gmail.com', '1996-11-11', 9, 'Legal Assistant'),
(74, 'Lydia Nakabugo', '+256728210987', 'lydia.nakabugo@gmail.com', '1997-03-02', 10, 'Documentation Specialist'),
(75, 'Peter Ssempijja', '+256730321098', 'peter.ssempijja@gmail.com', '1990-04-13', 1, 'Administrator'),
(76, 'Angela Nakazibwe', '+256732432109', 'angela.nakazibwe@gmail.com', '1992-08-24', 2, 'Security Officer'),
(77, 'Godfrey Ogwang', '+256734543210', 'godfrey.ogwang@gmail.com', '1989-02-05', 3, 'Surgeon'),
(78, 'Ssebakijje Web David', '+256708163155', 'ssebakijjeweb@gmail.com', '1992-12-28', 1, 'Director'),
(79, 'Auther James', '+256708163155', 'kyaligonzawarren44@gmail.com', '1973-09-19', 7, 'Chef');

-- --------------------------------------------------------

--
-- Table structure for table `prisoner`
--

DROP TABLE IF EXISTS `prisoner`;
CREATE TABLE IF NOT EXISTS `prisoner` (
  `prisoner_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `nationality` varchar(45) NOT NULL,
  `offenses` varchar(70) NOT NULL,
  `image_url` blob,
  `sentence_length` int(11) NOT NULL,
  `cell_id` int(11) NOT NULL,
  `incarsaration_date` date DEFAULT NULL,
  PRIMARY KEY (`prisoner_id`),
  KEY `cell_id_idx` (`cell_id`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=latin1 COMMENT='this is the prisoner table';

--
-- Dumping data for table `prisoner`
--

INSERT INTO `prisoner` (`prisoner_id`, `name`, `date_of_birth`, `gender`, `nationality`, `offenses`, `image_url`, `sentence_length`, `cell_id`, `incarsaration_date`) VALUES
(19, 'Mary Nakalema', '1992-03-15', 'Female', 'Ugandan', 'Assault', 0x777031303732383033382d746563682d776f726c642d6c6f676f2d77616c6c7061706572732e6a7067, 8, 6, '2021-11-22'),
(20, 'Joseph Ogwal', '1988-05-20', 'Male', 'Ugandan', 'Drug trafficking', NULL, 10, 3, '2023-01-05'),
(21, 'Sarah Lubega', '1991-08-10', 'Female', 'Ugandan', 'Forgery', NULL, 6, 4, '2022-07-18'),
(22, 'David Sselubega', '1989-12-05', 'Male', 'Ugandan', 'Robbery', NULL, 7, 5, '2023-04-01'),
(23, 'Joyce Ochieng', '1993-07-25', 'Female', 'Ugandan', 'Burglary', NULL, 4, 6, '2021-09-12'),
(24, 'Michael Ssempiira', '1994-04-18', 'Male', 'Ugandan', 'Fraud', NULL, 3, 7, '2022-03-05'),
(25, 'Jane Namutebi', '1996-11-08', 'Female', 'Ugandan', 'Kidnapping', NULL, 12, 8, '2023-02-20'),
(26, 'Daniel Kato', '1997-09-30', 'Male', 'Ugandan', 'Arson', NULL, 9, 9, '2022-08-14'),
(27, 'Grace Nabatanzi', '1995-02-28', 'Female', 'Ugandan', 'Money laundering', NULL, 11, 10, '2021-12-30'),
(28, 'Patrick Okello', '1992-06-12', 'Male', 'Ugandan', 'Assault', NULL, 7, 1, '2022-02-05'),
(29, 'Rebecca Mugisha', '1993-09-22', 'Female', 'Ugandan', 'Fraud', NULL, 5, 2, '2023-03-18'),
(30, 'Andrew Lubega', '1991-04-02', 'Male', 'Ugandan', 'Robbery', NULL, 8, 3, '2021-10-30'),
(31, 'Sarah Nakato', '1994-11-11', 'Female', 'Ugandan', 'Forgery', NULL, 6, 4, '2022-06-14'),
(32, 'Josephine Nalubwama', '1993-01-23', 'Female', 'Ugandan', 'Drug trafficking', NULL, 9, 5, '2022-12-01'),
(33, 'Charles Ochieng', '1988-08-15', 'Male', 'Ugandan', 'Burglary', NULL, 4, 6, '2023-05-10'),
(34, 'Florence Namuddu', '1990-12-31', 'Female', 'Ugandan', 'Assault', NULL, 5, 7, '2021-11-22'),
(35, 'Mark Kato', '1996-02-10', 'Male', 'Ugandan', 'Forgery', NULL, 3, 8, '2022-02-03'),
(36, 'Juliet Nabatanzi', '1997-07-07', 'Female', 'Ugandan', 'Robbery', NULL, 7, 9, '2023-04-17'),
(37, 'Simon Kizito', '1990-03-03', 'Male', 'Ugandan', 'Arson', NULL, 10, 10, '2022-09-05'),
(38, 'Alice Nakalema', '1992-10-16', 'Female', 'Ugandan', 'Money laundering', NULL, 11, 1, '2021-10-19'),
(39, 'Peter Ogwang', '1989-11-25', 'Male', 'Ugandan', 'Assault', NULL, 8, 2, '2022-05-01'),
(40, 'Christine Lubega', '1991-12-07', 'Female', 'Ugandan', 'Forgery', NULL, 6, 3, '2023-01-14'),
(41, 'Andrew Ssebaggala', '1994-06-13', 'Male', 'Ugandan', 'Robbery', NULL, 9, 4, '2022-07-27'),
(42, 'Susan Namutebi', '1993-04-04', 'Female', 'Ugandan', 'Drug trafficking', NULL, 10, 5, '2021-09-30'),
(43, 'Robert Kato', '1995-08-27', 'Male', 'Ugandan', 'Burglary', NULL, 4, 6, '2023-03-14'),
(44, 'Helen Nakato', '1990-09-18', 'Female', 'Ugandan', 'Fraud', NULL, 5, 7, '2022-01-27'),
(45, 'Stephen Lubega', '1996-01-07', 'Male', 'Ugandan', 'Forgery', NULL, 3, 8, '2023-02-10'),
(46, 'Sarah Nabatanzi', '1997-03-29', 'Female', 'Ugandan', 'Robbery', NULL, 7, 9, '2022-08-03'),
(47, 'Alice Kibira', '1990-02-15', 'Female', 'Tanzanian', 'Fraud', NULL, 6, 7, '2022-06-25'),
(48, 'Samuel Mwangi', '1989-07-20', 'Male', 'Kenyan', 'Robbery', NULL, 8, 5, '2023-03-15'),
(49, 'Esther Uwimana', '1991-12-10', 'Female', 'Rwandan', 'Forgery', NULL, 6, 3, '2021-11-01'),
(50, 'Peter Mugisha', '1992-04-25', 'Male', 'Ugandan', 'Theft', NULL, 5, 1, '2022-08-10'),
(51, 'Grace Achieng', '1993-09-08', 'Female', 'Kenyan', 'Assault', NULL, 7, 2, '2023-02-22'),
(52, 'David Magara', '1988-06-19', 'Male', 'Tanzanian', 'Drug trafficking', NULL, 10, 3, '2021-12-05'),
(53, 'Rachel Uwase', '1990-01-27', 'Female', 'Rwandan', 'Robbery', NULL, 7, 5, '2022-05-19'),
(54, 'Andrew Owino', '1991-11-08', 'Male', 'Kenyan', 'Forgery', NULL, 6, 4, '2023-01-08'),
(55, 'Josephine Muhumuza', '1994-05-12', 'Female', 'Ugandan', 'Burglary', NULL, 4, 6, '2021-09-25'),
(56, 'Charles Karekezi', '1993-02-28', 'Male', 'Rwandan', 'Assault', NULL, 8, 7, '2022-03-11'),
(57, 'Faith Nyambura', '1995-07-17', 'Female', 'Kenyan', 'Fraud', NULL, 5, 2, '2023-04-02'),
(58, 'Emmanuel Nkunda', '1989-03-06', 'Male', 'Rwandan', 'Forgery', NULL, 6, 1, '2022-07-16'),
(59, 'Sarah Auma', '1992-09-22', 'Female', 'Kenyan', 'Robbery', NULL, 7, 3, '2021-10-30'),
(60, 'John Kamau', '1990-12-12', 'Male', 'Kenyan', 'Drug trafficking', NULL, 9, 4, '2022-02-15'),
(61, 'Mercy Nyirabahizi', '1993-07-29', 'Female', 'Rwandan', 'Forgery', NULL, 6, 5, '2023-03-05'),
(62, 'Henry Muthoni', '1988-05-19', 'Male', 'Kenyan', 'Burglary', NULL, 4, 6, '2022-06-12'),
(63, 'Sylvia Namukasa', '1991-11-01', 'Female', 'Ugandan', 'Assault', NULL, 7, 7, '2023-01-25'),
(64, 'Joseph Gashumba', '1994-03-18', 'Male', 'Rwandan', 'Robbery', NULL, 8, 8, '2021-09-10'),
(65, 'Hannah Chebet', '1990-08-27', 'Female', 'Kenyan', 'Fraud', NULL, 5, 9, '2022-04-15'),
(66, 'Robert Kamande', '1992-02-10', 'Male', 'Kenyan', 'Forgery', NULL, 6, 10, '2023-03-30'),
(67, 'Naomi Mbabazi', '1991-09-07', 'Female', 'Rwandan', 'Theft', NULL, 5, 1, '2022-08-02'),
(68, 'George Odhiambo', '1989-04-11', 'Male', 'Kenyan', 'Assault', NULL, 7, 2, '2023-01-14'),
(69, 'Janet Kiiza', '1993-12-31', 'Female', 'Ugandan', 'Drug trafficking', NULL, 9, 3, '2021-10-22'),
(70, 'Paul Mwangi', '1995-05-28', 'Male', 'Kenyan', 'Robbery', NULL, 8, 4, '2022-05-02'),
(71, 'Anita Mukarugwiza', '1990-06-19', 'Female', 'Rwandan', 'Forgery', NULL, 6, 5, '2023-02-15'),
(72, 'Elijah Kibaki', '1988-03-02', 'Male', 'Kenyan', 'Burglary', NULL, 4, 6, '2021-12-20'),
(73, 'Faith Masika', '1991-10-14', 'Female', 'Kenyan', 'Fraud', NULL, 5, 7, '2022-03-05'),
(74, 'Samuel Ntawutarama', '1994-04-06', 'Male', 'Rwandan', 'Forgery', NULL, 6, 8, '2023-01-20'),
(75, 'Grace Mwende', '1992-11-28', 'Female', 'Kenyan', 'Assault', NULL, 7, 9, '2021-09-05'),
(76, 'Andrew Omondi', '1993-08-09', 'Male', 'Kenyan', 'Robbery', NULL, 8, 10, '2022-04-18'),
(77, 'Catherine Njeri', '1990-03-18', 'Female', 'Kenyan', 'Fraud', NULL, 6, 7, '2022-07-01'),
(78, 'Samson Rwabuhihi', '1989-09-02', 'Male', 'Rwandan', 'Robbery', NULL, 8, 5, '2023-04-15'),
(79, 'Diana Wanjiku', '1991-01-13', 'Female', 'Kenyan', 'Forgery', NULL, 6, 3, '2021-12-28'),
(80, 'Franklin Kateregga', '1992-05-26', 'Male', 'Ugandan', 'Theft', NULL, 5, 1, '2022-09-10'),
(81, 'Tabitha Achieng', '1993-10-09', 'Female', 'Kenyan', 'Assault', NULL, 7, 2, '2023-02-22'),
(82, 'Samuel Gasana', '1988-07-28', 'Male', 'Rwandan', 'Drug trafficking', NULL, 10, 3, '2021-12-05'),
(83, 'Rose Uwamahoro', '1990-02-01', 'Female', 'Rwandan', 'Robbery', NULL, 7, 5, '2022-05-19'),
(84, 'Martin Ndirangu', '1991-12-15', 'Male', 'Kenyan', 'Forgery', NULL, 6, 4, '2023-01-08'),
(85, 'Gloria Namakula', '1994-06-18', 'Female', 'Ugandan', 'Burglary', NULL, 4, 6, '2021-09-25'),
(86, 'Eric Munyaneza', '1993-03-05', 'Male', 'Rwandan', 'Assault', NULL, 8, 7, '2022-03-11'),
(87, 'Lilian Akinyi', '1995-08-29', 'Female', 'Kenyan', 'Fraud', NULL, 5, 2, '2023-04-02'),
(88, 'Steven Uwase', '1989-04-13', 'Male', 'Rwandan', 'Forgery', NULL, 6, 1, '2022-07-16'),
(89, 'Jane Wanjiru', '1992-10-25', 'Female', 'Kenyan', 'Robbery', NULL, 7, 3, '2021-10-30'),
(90, 'Joseph Bizimana', '1990-12-27', 'Male', 'Rwandan', 'Drug trafficking', NULL, 9, 4, '2022-02-15'),
(91, 'Sandra Mukamazimpaka', '1993-08-13', 'Female', 'Rwandan', 'Forgery', NULL, 6, 5, '2023-03-05'),
(92, 'Kennedy Mwangi', '1988-06-24', 'Male', 'Kenyan', 'Burglary', NULL, 4, 6, '2022-06-12'),
(93, 'Violet Nakato', '1991-11-03', 'Female', 'Ugandan', 'Assault', NULL, 7, 7, '2023-01-25'),
(94, 'Emmanuel Gakwaya', '1994-03-17', 'Male', 'Rwandan', 'Fraud', NULL, 5, 8, '2021-12-10'),
(95, 'Faith Auma', '1992-09-30', 'Female', 'Kenyan', 'Robbery', NULL, 8, 9, '2022-03-22'),
(96, 'Daniel Nkunda', '1993-05-22', 'Male', 'Rwandan', 'Forgery', NULL, 6, 10, '2023-04-05'),
(97, 'Joyce Achieng', '1990-01-08', 'Female', 'Kenyan', 'Assault', NULL, 7, 1, '2022-07-21'),
(98, 'Fredrick Gathogo', '1991-04-20', 'Male', 'Kenyan', 'Robbery', NULL, 8, 2, '2023-01-02'),
(99, 'Phiona Kamau', '1993-12-03', 'Female', 'Kenyan', 'Forgery', NULL, 6, 3, '2021-10-15'),
(100, 'Samuel Mwiza', '1988-07-17', 'Male', 'Rwandan', 'Drug trafficking', NULL, 10, 5, '2022-05-31'),
(101, 'Monica Umutoni', '1990-02-10', 'Female', 'Rwandan', 'Robbery', NULL, 7, 4, '2023-01-13'),
(102, 'Peter Njuguna', '1991-12-24', 'Male', 'Kenyan', 'Forgery', NULL, 6, 6, '2021-09-29'),
(103, 'Esther Nakitende', '1994-06-07', 'Female', 'Ugandan', 'Burglary', NULL, 4, 7, '2022-03-13'),
(104, 'John Ndungu', '1993-03-22', 'Male', 'Kenyan', 'Assault', NULL, 8, 8, '2023-01-26'),
(105, 'Cynthia Uwamwezi', '1995-08-14', 'Female', 'Rwandan', 'Forgery', NULL, 6, 9, '2021-12-11'),
(106, 'Moses Kimani', '1989-05-27', 'Male', 'Kenyan', 'Robbery', NULL, 7, 10, '2022-04-24'),
(107, 'Daniel Mwangi', '1993-07-12', 'Male', 'Kenyan', 'Assault', NULL, 6, 2, '2022-08-25'),
(108, 'Grace Nalwanga', '1991-09-28', 'Female', 'Ugandan', 'Robbery', NULL, 8, 3, '2023-03-10'),
(109, 'Emmanuel Uwimana', '1994-04-01', 'Male', 'Rwandan', 'Forgery', NULL, 6, 4, '2021-11-23'),
(110, 'Angela Achieng', '1990-01-15', 'Female', 'Kenyan', 'Theft', NULL, 5, 5, '2022-06-06'),
(111, 'John Kamau', '1988-05-03', 'Male', 'Kenyan', 'Fraud', NULL, 7, 6, '2023-01-19'),
(112, 'Alice Niyonsaba', '1991-02-24', 'Female', 'Rwandan', 'Drug trafficking', NULL, 10, 7, '2022-07-02'),
(113, 'Stephen Oduor', '1993-09-08', 'Male', 'Kenyan', 'Robbery', NULL, 7, 1, '2023-04-16'),
(114, 'Esther Mukamana', '1990-12-20', 'Female', 'Rwandan', 'Forgery', NULL, 6, 2, '2022-12-29'),
(115, 'David Kipchirchir', '1995-06-02', 'Male', 'Kenyan', 'Burglary', NULL, 4, 3, '2022-09-11'),
(116, 'Grace Umutoni', '1992-03-25', 'Female', 'Rwandan', 'Assault', NULL, 8, 4, '2021-10-22'),
(117, 'Peter Otieno', '1994-08-14', 'Male', 'Kenyan', 'Fraud', NULL, 5, 5, '2023-03-05'),
(118, 'Jacqueline Nyirabahutu', '1989-04-18', 'Female', 'Rwandan', 'Forgery', NULL, 6, 6, '2021-12-12'),
(119, 'Samuel Mugo', '1991-11-10', 'Male', 'Kenyan', 'Robbery', NULL, 7, 7, '2022-05-25'),
(120, 'Sandra Uwase', '1994-07-26', 'Female', 'Rwandan', 'Drug trafficking', NULL, 9, 1, '2023-02-01'),
(121, 'Simon Masai', '1990-03-19', 'Male', 'Kenyan', 'Assault', NULL, 6, 2, '2022-07-14'),
(122, 'Caroline Namatovu', '1991-10-05', 'Female', 'Ugandan', 'Robbery', NULL, 8, 3, '2023-01-27'),
(123, 'Jean Baptiste Nzeyimana', '1994-05-18', 'Male', 'Rwandan', 'Forgery', NULL, 6, 4, '2021-09-30'),
(124, 'Hannah Wambui', '1990-02-02', 'Female', 'Kenyan', 'Theft', NULL, 5, 5, '2022-04-15'),
(125, 'Patrick Kamau', '1988-06-14', 'Male', 'Kenyan', 'Fraud', NULL, 7, 6, '2023-01-29'),
(126, 'Claire Uwamahoro', '1991-03-27', 'Female', 'Rwandan', 'Drug trafficking', 0x777031313032373632362d6165737468657469632d636172746f6f6e2d6465736b746f702d346b2d77616c6c7061706572732e6a7067, 10, 7, '2022-07-12'),
(129, 'Judas Iscariot', '2022-10-01', 'Male', 'Kenyan', 'Betrayal', 0x777031303634363835312d746563686e6f6c6f67792d6c6f676f2d77616c6c7061706572732e706e67, 2, 3, '2023-06-05'),
(130, 'Bugatti Jonah', '2023-06-02', 'Male', 'Zimbabweans', 'Theft', 0x75706c6f6164732f636f6e746163742d62672e6a7067, 4, 2, '2023-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `position` varchar(20) DEFAULT NULL,
  `department` varchar(45) DEFAULT NULL,
  `contact` varchar(45) DEFAULT NULL,
  `role` varchar(20) DEFAULT 'Basic',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`user_id`, `user_name`, `password`, `email`, `position`, `department`, `contact`, `role`) VALUES
(3, 'Kyaligonza', '123', 'kyaligonzawarren44@gmail.com', 'Secretary', 'Human Resource ', '0708163155', 'admin'),
(4, 'John', '1', 'kyaligonzawarren44@gmail.com', 'Secretary', 'Human Resource ', '0708163155', 'Basic'),
(5, 'Warren', '1234', 'kyaligonzawarren44@gmail.com', 'Admin', 'Human Resource ', '0708163155', 'admin'),
(6, 'Jones', '111', 'ssebakijjeweb@gmail.com', 'Secretary', 'Human Resource ', '0708163155', 'Basic'),
(7, 'Tina', 'Tina', 'ssebakijjeweb@gmail.com', 'Admin', 'Management', '0708163155', 'Basic');

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

DROP TABLE IF EXISTS `visit`;
CREATE TABLE IF NOT EXISTS `visit` (
  `visit_id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `prisoner_id` int(11) NOT NULL,
  `visit_date` date NOT NULL,
  `reason` varchar(225) NOT NULL,
  `contact` varchar(20) NOT NULL,
  PRIMARY KEY (`visit_id`),
  KEY `prisoner_id_idx` (`prisoner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visit`
--

INSERT INTO `visit` (`visit_id`, `name`, `prisoner_id`, `visit_date`, `reason`, `contact`) VALUES
(46, 'John Kamau', 22, '2022-05-10', 'Family visit', '+256701234567'),
(47, 'Mary Auma Stacy', 28, '2022-06-15', 'Legal consultation', '+256709876543'),
(48, 'David Mwangi', 36, '2022-07-20', 'Social visit', '+256755555555'),
(49, 'Sarah Nyambura', 45, '2022-08-25', 'Family visit', '+2567111111111'),
(50, 'Michael Odhiambo', 60, '2022-09-30', 'Legal consultation', '+256722222222'),
(51, 'Jennifer Wanjiku', 74, '2022-10-05', 'Social visit', '+256733333333'),
(52, 'Christopher Kimani', 88, '2022-11-10', 'Family visit', '+256744444444'),
(53, 'Amanda Njeri', 93, '2022-12-15', 'Legal consultation', '+256766666666'),
(54, 'Daniel Mwende', 105, '2023-01-20', 'Social visit', '+256777777777'),
(55, 'Jessica Achieng', 116, '2023-02-25', 'Family visit', '+256788888888'),
(56, 'John Kamau', 22, '2023-03-30', 'Legal consultation', '+256799999999'),
(57, 'Mary Auma', 28, '2023-04-05', 'Social visit', '+256711111111'),
(58, 'David Mwangi', 36, '2023-05-10', 'Family visit', '+256722222222'),
(59, 'Sarah Nyambura', 45, '2023-06-15', 'Legal consultation', '+256733333333'),
(60, 'Michael Odhiambo', 60, '2023-07-20', 'Social visit', '+256744444444'),
(61, 'Jennifer Wanjiku', 74, '2023-08-25', 'Family visit', '+256755555555'),
(62, 'Christopher Kimani', 88, '2023-09-30', 'Legal consultation', '+256766666666'),
(63, 'Amanda Njeri', 93, '2023-10-05', 'Social visit', '+256777777777'),
(64, 'Daniel Mwende', 105, '2023-11-10', 'Family visit', '+256788888888'),
(65, 'Jessica Achieng', 116, '2023-12-15', 'Legal consultation', '+256799999999'),
(66, 'John Kamau', 22, '2023-01-20', 'Social visit', '+256711111111'),
(67, 'Mary Auma', 28, '2023-02-25', 'Family visit', '+256722222222'),
(68, 'David Mwangi', 36, '2023-03-30', 'Legal consultation', '+256733333333'),
(69, 'Sarah Nyambura', 45, '2023-04-05', 'Social visit', '+256744444444'),
(70, 'Michael Odhiambo', 60, '2023-05-10', 'Family visit', '+256755555555'),
(71, 'Jennifer Wanjiku', 74, '2023-06-15', 'Legal consultation', '+256766666666'),
(72, 'Christopher Kimani', 88, '2023-07-20', 'Social visit', '+256777777777'),
(73, 'Amanda Njeri', 93, '2023-08-25', 'Family visit', '+256788888888'),
(74, 'Daniel Mwende', 105, '2023-09-30', 'Legal consultation', '+256799999999'),
(75, 'Jessica Achieng', 116, '2023-10-05', 'Social visit', '+256711111111'),
(76, 'Pauline Nakayima', 28, '2023-11-10', 'Family visit', '+256722222222'),
(77, 'Brian Ssebunya', 45, '2023-12-15', 'Legal consultation', '+256733333333'),
(78, 'Esther Namboozo', 60, '2023-01-20', 'Social visit', '+256744444444'),
(79, 'Samuel Ogwang', 74, '2023-02-25', 'Family visit', '+256755555555'),
(80, 'Sylvia Nakato', 93, '2023-03-30', 'Legal consultation', '+256766666666'),
(81, 'Robert Ssempala', 105, '2023-04-05', 'Social visit', '+256777777777'),
(82, 'Joyce Nansubuga', 116, '2023-05-10', 'Family visit', '+256788888888'),
(83, 'Emmanuel Oryema', 22, '2023-06-15', 'Legal consultation', '+256799999999'),
(84, 'Christine Namazzi', 28, '2023-07-20', 'Social visit', '+256711111111'),
(85, 'Simon Kaweesa', 36, '2023-08-25', 'Family visit', '+256722222222'),
(86, 'Mercy Nalweyiso', 45, '2023-09-30', 'Legal consultation', '+256733333333'),
(87, 'Isaac Balikuddembe', 60, '2023-10-05', 'Social visit', '+256744444444'),
(88, 'Grace Namutebi', 74, '2023-11-10', 'Family visit', '+256755555555'),
(89, 'Joshua Lubega', 88, '2023-12-15', 'Legal consultation', '+256766666666'),
(90, 'Rebecca Atim', 93, '2024-01-20', 'Social visit', '+256777777777'),
(91, 'Henry Ssekabira', 105, '2024-02-25', 'Family visit', '+256788888888'),
(92, 'Anita Nakitende', 116, '2024-03-30', 'Legal consultation', '+256799999999'),
(93, 'Pauline Nakayima', 28, '2024-04-05', 'Social visit', '+256711111111'),
(94, 'Brian Ssebunya', 45, '2024-05-10', 'Family visit', '+256722222222'),
(95, 'Esther Namboozo', 60, '2024-06-15', 'Legal consultation', '+256733333333'),
(96, 'Samuel Ogwang', 74, '2024-07-20', 'Social visit', '+256744444444'),
(97, 'Sylvia Nakato', 93, '2024-08-25', 'Family visit', '+256755555555'),
(98, 'Robert Ssempala', 105, '2024-09-30', 'Legal consultation', '+256766666666'),
(99, 'Joyce Nansubuga', 116, '2024-10-05', 'Social visit', '+256788888888'),
(100, 'Emmanuel Oryema', 22, '2024-11-10', 'Family visit', '+256799999999'),
(101, 'Christine Namazzi', 28, '2024-12-15', 'Legal consultation', '+256711111111'),
(102, 'Simon Kaweesa', 36, '2025-01-20', 'Social visit', '+256722222222'),
(103, 'Mercy Nalweyiso', 45, '2025-02-25', 'Family visit', '+256733333333'),
(104, 'Isaac Balikuddembe', 60, '2025-03-30', 'Legal consultation', '+256744444444'),
(105, 'Grace Namutebi', 74, '2025-04-05', 'Social visit', '+256755555555'),
(106, 'Josephine Nakazzi', 45, '2025-05-10', 'Family visit', '+256766666666'),
(107, 'Andrew Ssempala', 88, '2025-06-15', 'Legal consultation', '+256777777777'),
(108, 'Hannah Nalweyiso', 93, '2025-07-20', 'Social visit', '+256788888888'),
(109, 'Richard Balikuddembe', 105, '2025-08-25', 'Family visit', '+256799999999'),
(110, 'Mercy Namutebi', 116, '2025-09-30', 'Legal consultation', '+256711111111'),
(111, 'Joshua Lubega', 22, '2025-10-05', 'Social visit', '+256722222222'),
(112, 'Rebecca Atim', 28, '2025-11-10', 'Family visit', '+256733333333'),
(113, 'Henry Ssekabira', 36, '2025-12-15', 'Legal consultation', '+256744444444'),
(114, 'Anita Nakitende', 45, '2026-01-20', 'Social visit', '+256755555555'),
(115, 'Pauline Nakayima', 60, '2026-02-25', 'Family visit', '+256766666666'),
(116, 'Brian Ssebunya', 74, '2026-03-30', 'Legal consultation', '+256777777777'),
(117, 'Esther Namboozo', 88, '2026-04-05', 'Social visit', '+256788888888'),
(118, 'Samuel Ogwang', 93, '2026-05-10', 'Family visit', '+256799999999'),
(119, 'Sylvia Nakato', 105, '2026-06-15', 'Legal consultation', '+256711111111'),
(120, 'Robert Ssempala', 116, '2026-07-20', 'Social visit', '+256722222222'),
(121, 'Joyce Nansubuga', 22, '2026-08-25', 'Family visit', '+256733333333'),
(122, 'Emmanuel Oryema', 28, '2026-09-30', 'Legal consultation', '+256744444444'),
(123, 'Christine Namazzi', 36, '2026-10-05', 'Social visit', '+256755555555'),
(124, 'Simon Kaweesa', 45, '2026-11-10', 'Family visit', '+256766666666'),
(125, 'Mercy Nalweyiso', 60, '2026-12-15', 'Legal consultation', '+256777777777'),
(126, 'Isaac Balikuddembe', 74, '2027-01-20', 'Social visit', '+256788888888'),
(127, 'Grace Namutebi', 88, '2027-02-25', 'Family visit', '+256799999999'),
(128, 'Joshua Lubega', 93, '2027-03-30', 'Legal consultation', '+256711111111'),
(129, 'Rebecca Atim', 105, '2027-04-05', 'Social visit', '+256722222222'),
(130, 'Henry Ssekabira', 116, '2027-05-10', 'Family visit', '+256733333333'),
(131, 'Anita Nakitende', 22, '2027-06-15', 'Legal consultation', '+256744444444'),
(132, 'Pauline Nakayima', 28, '2027-07-20', 'Social visit', '+256755555555'),
(133, 'Brian Ssebunya', 36, '2027-08-25', 'Family visit', '+256766666666'),
(134, 'Esther Namboozo', 45, '2027-09-30', 'Legal consultation', '+256777777777'),
(135, 'Samuel Ogwang', 60, '2027-10-05', 'Social visit', '+256788888888'),
(136, 'Ghad Door', 22, '2023-06-01', 'My money ', '+256708163155');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prisoner`
--
ALTER TABLE `prisoner`
  ADD CONSTRAINT `cell_id` FOREIGN KEY (`cell_id`) REFERENCES `cell` (`cell_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cell` FOREIGN KEY (`cell_id`) REFERENCES `cell` (`cell_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_prisoner_cell` FOREIGN KEY (`cell_id`) REFERENCES `cell` (`cell_id`) ON DELETE CASCADE;

--
-- Constraints for table `visit`
--
ALTER TABLE `visit`
  ADD CONSTRAINT `fk_visit_prisoner` FOREIGN KEY (`prisoner_id`) REFERENCES `prisoner` (`prisoner_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prisoner_id` FOREIGN KEY (`prisoner_id`) REFERENCES `prisoner` (`prisoner_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
