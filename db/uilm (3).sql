-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2016 at 03:22 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `uilm`
--

-- --------------------------------------------------------

--
-- Table structure for table `uilm_admin`
--

CREATE TABLE IF NOT EXISTS `uilm_admin` (
`adminid` int(11) NOT NULL,
  `adminname` varchar(50) NOT NULL,
  `adminemail` varchar(255) NOT NULL,
  `adminpassword` varchar(255) NOT NULL,
  `adminrole` enum('0','1') NOT NULL,
  `status` enum('Active','InActive') NOT NULL,
  `insertip` varchar(20) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `editip` varchar(20) NOT NULL,
  `editdatetime` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uilm_admin`
--

INSERT INTO `uilm_admin` (`adminid`, `adminname`, `adminemail`, `adminpassword`, `adminrole`, `status`, `insertip`, `insertdatetime`, `editip`, `editdatetime`, `timestamp`) VALUES
(1, 'Admin', 'admin@uilm.com', '21232f297a57a5a743894a0e4a801fc3', '1', 'Active', '', '0000-00-00 00:00:00', '::1', '2015-10-04 11:47:27', '2015-06-28 09:46:47');

-- --------------------------------------------------------

--
-- Table structure for table `uilm_banners`
--

CREATE TABLE IF NOT EXISTS `uilm_banners` (
`bannerid` int(11) NOT NULL,
  `bannertitle` varchar(100) NOT NULL,
  `bannerimage` varchar(255) NOT NULL,
  `status` enum('Active','InActive') NOT NULL,
  `insertip` varchar(20) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `editip` varchar(20) NOT NULL,
  `editdatetime` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uilm_banners`
--

INSERT INTO `uilm_banners` (`bannerid`, `bannertitle`, `bannerimage`, `status`, `insertip`, `insertdatetime`, `editip`, `editdatetime`, `timestamp`) VALUES
(1, 'Banner 1', '20.png', 'Active', '', '0000-00-00 00:00:00', '::1', '2016-06-02 02:52:43', '2015-10-04 09:49:33'),
(2, 'Banner-2', '201.png', 'Active', '', '0000-00-00 00:00:00', '::1', '2016-06-02 02:52:57', '2015-10-04 09:50:10'),
(3, 'banner 3', '202.png', 'Active', '', '0000-00-00 00:00:00', '::1', '2016-06-02 02:53:11', '2015-10-04 09:50:26');

-- --------------------------------------------------------

--
-- Table structure for table `uilm_contactus`
--

CREATE TABLE IF NOT EXISTS `uilm_contactus` (
`id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `contact_message` text NOT NULL,
  `status` enum('pending','completed','cancel') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uilm_contactus`
--

INSERT INTO `uilm_contactus` (`id`, `contact_name`, `contact_email`, `contact_no`, `contact_message`, `status`) VALUES
(1, 'Aniket Bhatt', 'aniketbhatt031@gmail.com', 846075089, 'asas', 'pending'),
(2, 'Aniket Tapankumar Bhatt', 'aniketbhatt031@gmail.com', 846075089, 'fd', 'pending'),
(3, 'Aniket Tapankumar Bhatt', 'aniketbhatt031@gmail.com', 846075089, 'df', 'pending'),
(4, 'dfdf', 'a@gmail.com', 123456789, 'aa', 'pending'),
(5, '111', 'a@gmail.com', 123456789, 'sdsd', 'pending'),
(6, 'sd sd', 'a@gmail.com', 123456789, 'sd', 'pending'),
(7, 'Aniket Tapankumar Bhatt', 'aniketbhatt031@gmail.com', 846075089, 'sd', 'pending'),
(8, 'Aniket Tapankumar Bhatt', 'aniketbhatt031@gmail.com', 846075089, 'hgh', 'pending'),
(9, 'Aniket Tapankumar Bhatt', 'aniketbhatt031@gmail.com', 846075089, 'as', 'pending'),
(10, 'Aniket Tapankumar Bhatt', 'aniketbhatt031@gmail.com', 846075089, 'vc', 'pending'),
(11, 'Aniket Tapankumar Bhatt', 'aniketbhatt031@gmail.com', 846075089, 'fd', 'pending'),
(12, 'Aniket Tapankumar Bhatt', 'aniketbhatt031@gmail.com', 846075089, 'sd', 'pending'),
(13, 'Aniket Tapankumar Bhatt', 'aniketbhatt031@gmail.com', 846075089, 'ds', 'pending'),
(14, 'Aniket Tapankumar Bhatt', 'aniketbhatt031@gmail.com', 846075089, 'df', 'pending'),
(15, 'Aniket Tapankumar Bhatt', 'aniketbhatt031@gmail.com', 846075089, 'df', 'pending'),
(16, 'Aniket Tapankumar Bhatt', 'aniketbhatt031@gmail.com', 846075089, 'sdsd', 'pending'),
(17, 'Aniket Tapankumar Bhatt', 'aniketbhatt031@gmail.com', 846075089, 'sdds', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `uilm_emailsetting`
--

CREATE TABLE IF NOT EXISTS `uilm_emailsetting` (
`settingid` int(11) NOT NULL,
  `settingname` varchar(50) NOT NULL,
  `settingvalue` varchar(255) NOT NULL,
  `editip` varchar(20) NOT NULL,
  `editdatetime` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uilm_emailsetting`
--

INSERT INTO `uilm_emailsetting` (`settingid`, `settingname`, `settingvalue`, `editip`, `editdatetime`, `timestamp`) VALUES
(1, 'host name', 'mail.winspirewebsolution.com', '::1', '2016-02-22 12:26:45', '2016-02-22 11:04:50'),
(2, 'outgoing port', '587', '::1', '2016-02-23 08:03:38', '2016-02-22 11:05:15'),
(3, 'username', 'noreply@wwsptech.com', '::1', '2016-02-23 08:04:02', '2016-02-22 11:05:42'),
(4, 'password', 'reply123', '::1', '2016-02-23 08:04:16', '2016-02-22 11:06:15'),
(5, 'receiver email', 'aniketbhatt031@gmail.com', '::1', '2016-02-23 10:31:12', '2016-02-23 08:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `uilm_events`
--

CREATE TABLE IF NOT EXISTS `uilm_events` (
`eventid` int(11) NOT NULL,
  `eventtitle` varchar(100) NOT NULL,
  `eventurl` varchar(255) NOT NULL,
  `eventmetakeyword` varchar(255) NOT NULL,
  `eventmetadescription` varchar(255) NOT NULL,
  `eventshortdescription` varchar(255) NOT NULL,
  `eventimage` varchar(255) NOT NULL,
  `eventdescription` text NOT NULL,
  `eventstarttime` datetime NOT NULL,
  `eventendtime` datetime NOT NULL,
  `status` enum('Active','InActive') NOT NULL,
  `insertip` varchar(20) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `editip` varchar(20) NOT NULL,
  `editdatetime` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uilm_events`
--

INSERT INTO `uilm_events` (`eventid`, `eventtitle`, `eventurl`, `eventmetakeyword`, `eventmetadescription`, `eventshortdescription`, `eventimage`, `eventdescription`, `eventstarttime`, `eventendtime`, `status`, `insertip`, `insertdatetime`, `editip`, `editdatetime`, `timestamp`) VALUES
(1, 'What is cancer and what causes it?', 'what-is-cancer-and-what-causes-it', 'What is cancer and what causes it?', 'What is cancer and what causes it?', 'Cancer is a term used for diseases in which abnormal cells divide without control and are able to invade other tissues. Cancer cells can spread to other parts of the body through the blood and lymph systems. Cancer is not just one disease but many disease', 'n81.jpg', 'Cancer is the name given to a collection of related diseases. In all types of cancer, some of the body’s cells begin to divide without stopping and spread into surrounding tissues.\r\n\r\nCancer can start almost anywhere in the human body, which is made up of trillions of cells. Normally, human cells grow and divide to form new cells as the body needs them. When cells grow old or become damaged, they die, and new cells take their place.\r\n\r\nWhen cancer develops, however, this orderly process breaks down. As cells become more and more abnormal, old or damaged cells survive when they should die, and new cells form when they are not needed. These extra cells can divide without stopping and may form growths called tumors.\r\n\r\nMany cancers form solid tumors, which are masses of tissue. Cancers of the blood, such as leukemias, generally do not form solid tumors.\r\n\r\nCancerous tumors are malignant, which means they can spread into, or invade, nearby tissues. In addition, as these tumors grow, some cancer cells can break off and travel to distant places in the body through the blood or the lymph system and form new tumors far from the original tumor.\r\n\r\nUnlike malignant tumors, benign tumors do not spread into, or invade, nearby tissues. Benign tumors can sometimes be quite large, however. When removed, they usually don’t grow back, whereas malignant tumors sometimes do. Unlike most benign tumors elsewhere in the body, benign brain tumors can be life threatening.', '2016-02-10 03:00:00', '2016-03-09 03:00:00', 'Active', '::1', '2015-10-04 01:08:15', '::1', '0000-00-00 00:00:00', '2015-10-04 11:08:15'),
(3, 'VESTIBULUM IACULIS', 'ds', 'VESTIBULUM IACULIS', 'VESTIBULUM IACULIS', 'Cum sociis natoque penatibus et magnis. dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio.', 'n7.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2016-02-17 08:20:00', '2016-03-25 09:35:00', 'Active', '::1', '2016-02-01 03:45:13', '::1', '2016-02-15 12:26:39', '2016-02-01 14:45:13'),
(4, 'VESTIBULUM IACULIS', 'gf', 'VESTIBULUM IACULIS', 'Cum sociis natoque penatibus et magnis. dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio.', 'Cum sociis natoque penatibus et magnis. dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio.', 'n71.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2016-02-09 12:00:00', '2016-02-09 11:59:59', 'Active', '::1', '2016-02-01 03:46:22', '::1', '2016-02-15 12:26:58', '2016-02-01 14:46:22'),
(5, 'VESTIBULUM IACULIS', 'df', 'VESTIBULUM IACULIS', 'Cum sociis natoque penatibus et magnis. dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio.', 'Cum sociis natoque penatibus et magnis. dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio.', 'n72.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2016-10-13 02:00:00', '2016-11-17 02:00:00', 'Active', '::1', '2016-02-01 03:47:52', '::1', '2016-02-15 12:27:12', '2016-02-01 14:47:52'),
(7, 'VESTIBULUM IACULIS', 'new-1', 'VESTIBULUM IACULIS', 'Cum sociis natoque penatibus et magnis. dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio.', 'Cum sociis natoque penatibus et magnis. dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio.', 'n75.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2000-01-01 12:00:00', '2000-01-01 12:00:00', 'Active', '::1', '2016-02-08 12:32:21', '::1', '2016-02-15 12:27:37', '2016-02-08 11:32:21'),
(8, 'VESTIBULUM IACULIS', 'new2', 'VESTIBULUM IACULIS', 'Cum sociis natoque penatibus et magnis. dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio.', 'Cum sociis natoque penatibus et magnis. dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio.', 'n76.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2010-01-01 12:00:00', '2010-01-01 12:00:00', 'Active', '::1', '2016-02-08 12:35:27', '::1', '2016-02-15 12:27:53', '2016-02-08 11:35:27'),
(9, 'VESTIBULUM IACULIS', 'new3', 'VESTIBULUM IACULIS', 'Cum sociis natoque penatibus et magnis. dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio.', 'Cum sociis natoque penatibus et magnis. dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio.', 'n77.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2015-01-01 12:00:00', '2015-01-01 12:00:00', 'Active', '::1', '2016-02-08 12:36:00', '::1', '2016-02-15 12:28:05', '2016-02-08 11:36:00'),
(10, 'n', 'n', 'n', 'n', 'n', 'n8.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2016-02-08 12:00:00', '2016-02-08 11:59:59', 'Active', '::1', '2016-02-08 01:13:33', '::1', '0000-00-00 00:00:00', '2016-02-08 12:13:33'),
(11, 'today event', 'today-event', 'today event', 'today event', 'today event', 'n9.jpg', 'today event', '2016-02-17 12:00:00', '2016-02-17 11:59:59', 'Active', '::1', '2016-02-17 07:34:54', '::1', '0000-00-00 00:00:00', '2016-02-17 06:34:54'),
(12, '123', '123', '123', '123', '123', 'n78.jpg', '123', '2016-02-07 12:00:00', '2016-02-07 12:00:00', 'Active', '::1', '2016-02-17 11:46:32', '', '0000-00-00 00:00:00', '2016-02-17 10:46:32'),
(13, '123', '123-1', '123', '123', '123', 'n79.jpg', '123', '2016-02-07 12:00:00', '2016-02-07 12:00:00', 'Active', '::1', '2016-02-17 11:47:14', '', '0000-00-00 00:00:00', '2016-02-17 10:47:14'),
(14, '123', '123-2', '123', '123', '123', 'n710.jpg', '123', '2016-02-07 12:00:00', '2016-02-07 12:00:00', 'Active', '::1', '2016-02-17 11:47:45', '', '0000-00-00 00:00:00', '2016-02-17 10:47:45'),
(15, '123', '123-3', '123', '123', '123', 'n711.jpg', '123', '2016-02-07 12:00:00', '2016-02-07 12:00:00', 'Active', '::1', '2016-02-17 11:48:13', '', '0000-00-00 00:00:00', '2016-02-17 10:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `uilm_gallery`
--

CREATE TABLE IF NOT EXISTS `uilm_gallery` (
`galleryid` int(11) NOT NULL,
  `galleryimage` varchar(255) NOT NULL,
  `galleryvideo` varchar(255) NOT NULL,
  `gallerybrochure` varchar(255) NOT NULL,
  `status` enum('Active','InActive') NOT NULL,
  `insertip` varchar(20) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `editip` varchar(20) NOT NULL,
  `editdatetime` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uilm_gallery`
--

INSERT INTO `uilm_gallery` (`galleryid`, `galleryimage`, `galleryvideo`, `gallerybrochure`, `status`, `insertip`, `insertdatetime`, `editip`, `editdatetime`, `timestamp`) VALUES
(1, 'p1.jpg', '', '', 'Active', '', '0000-00-00 00:00:00', '::1', '2016-11-02 06:35:07', '2016-02-11 05:35:07'),
(2, 'p2.jpg', '', '', 'Active', '', '0000-00-00 00:00:00', '::1', '2016-11-02 06:35:17', '2016-02-11 05:35:17'),
(3, 'p3.jpg', '', '', 'Active', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '2016-02-11 05:35:28'),
(4, 'p4.jpg', '', '', 'Active', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '2016-02-11 05:35:45'),
(5, 'p5.jpg', '', '', 'Active', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '2016-02-11 05:35:54'),
(6, 'p6.jpg', '', '', 'Active', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '2016-02-11 05:36:13'),
(7, 'p7.jpg', '', '', 'Active', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '2016-02-11 05:36:27'),
(8, 'p8.jpg', '', '', 'Active', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '2016-02-11 05:36:37'),
(9, 'p9.jpg', '', '', 'Active', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '2016-02-11 05:36:49'),
(23, '', 'https://www.youtube.com/watch?v=GOpzNt2HfV8&feature=youtu.be', '', 'Active', '', '0000-00-00 00:00:00', '::1', '2016-11-02 01:09:10', '2016-02-11 12:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `uilm_invitation`
--

CREATE TABLE IF NOT EXISTS `uilm_invitation` (
`invitationid` int(11) NOT NULL,
  `invite_fname` varchar(255) NOT NULL,
  `invite_lname` varchar(255) NOT NULL,
  `invite_email` varchar(255) NOT NULL,
  `invite_contact_no` int(11) NOT NULL,
  `invite_purpose` varchar(255) NOT NULL,
  `invite_comment` varchar(255) NOT NULL,
  `status` enum('pending','completed','cancel') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uilm_invitation`
--

INSERT INTO `uilm_invitation` (`invitationid`, `invite_fname`, `invite_lname`, `invite_email`, `invite_contact_no`, `invite_purpose`, `invite_comment`, `status`) VALUES
(1, 'a', 'a', 'a', 0, 'a', 'a', 'pending'),
(2, 'z', 'z', 'z', 0, 'z', 'z', 'completed'),
(3, 'dsf', 'ds', 'sd', 0, 'sd', 'sd', 'pending'),
(4, 'df', 'df', 'fd', 0, 'df', 'sd', 'pending'),
(5, 'ds', 'sd', 'sd@dc.cx', 123, 'zx', 'zx', 'pending'),
(6, 'sd', 'sd', 'as@sa.as', 12, 'as', 'as', 'pending'),
(7, 'df', 'df', 'df', 0, 'df', 'df', 'pending'),
(8, 'xc', 'xc', 'xc', 0, 'xc', 'xc', 'pending'),
(9, 'aaa', 'aaa', 'aa', 0, 'aaa', 'aaa', 'pending'),
(10, '111', '111', '11', 11, '11', '111', 'completed'),
(11, 'ccc', 'ccc', 'ccc', 0, 'ccc', 'ccc', 'pending'),
(12, 'df', 'df', 'df', 0, 'df', 'df', 'pending'),
(13, '222', '222', '222', 222, '222', '222', 'pending'),
(14, '444', '444', '444', 444, '444', '444', 'pending'),
(15, '333', '333', '333', 333, '333', '333', 'pending'),
(16, '555', '555', '555', 555, '555', '555', 'pending'),
(17, '666', '666', '666', 666, '666', '666', 'pending'),
(18, '888', '888', '888', 888, '888', '888', 'pending'),
(19, '777', '777', '777', 777, '777', '777', 'pending'),
(20, '999', '999', '999', 999, '999', '999', 'pending'),
(21, '1212', '1212', '1212', 1212, '1212', '1212', 'cancel'),
(22, '1313', '1313', 'a@gmail.com', 1313131313, 'dsd', 'sdsd', 'pending'),
(23, '1515', '1515', 'a@gmail.com', 1515151515, 'm,m,', 'm,m,', 'pending'),
(24, 'sdsd', 'dsd', 'a@gmail.com', 123456789, 'cvcv', 'cvcv', 'pending'),
(25, 'sd', 'sd', 'a@gmail.com', 1111111111, 'sd', 'sd', 'pending'),
(26, 'Aniket', 'Bhatt', 'aniketbhatt031@gmail.com', 1111111111, 'sd', 'sd', 'completed'),
(27, 'Aniket', 'Bhatt', 'aniketbhatt031@gmail.com', 1111111111, 'Hello', 'fd', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `uilm_news`
--

CREATE TABLE IF NOT EXISTS `uilm_news` (
`newsid` int(11) NOT NULL,
  `newstitle` varchar(100) NOT NULL,
  `newsurl` varchar(255) NOT NULL,
  `newsimage` varchar(255) NOT NULL,
  `newstext` text NOT NULL,
  `status` enum('Active','InActive') NOT NULL,
  `insertip` varchar(20) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `editip` varchar(20) NOT NULL,
  `editdatetime` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uilm_news`
--

INSERT INTO `uilm_news` (`newsid`, `newstitle`, `newsurl`, `newsimage`, `newstext`, `status`, `insertip`, `insertdatetime`, `editip`, `editdatetime`, `timestamp`) VALUES
(1, 'News -1 ', 'news-1', 'biochemical-research-s-710400.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.', 'Active', '::1', '2015-10-04 01:11:12', '1.22.13.6', '2015-10-04 11:15:35', '2015-10-04 11:11:12'),
(2, 'News-2', 'news-2', 'consultation-s-1-150x150.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.', 'Active', '::1', '2015-10-04 01:11:34', '1.22.13.6', '2015-10-04 11:16:32', '2015-10-04 11:11:34');

-- --------------------------------------------------------

--
-- Table structure for table `uilm_pages`
--

CREATE TABLE IF NOT EXISTS `uilm_pages` (
`pageid` int(11) NOT NULL,
  `pagetitle` varchar(255) NOT NULL,
  `pageurl` varchar(255) NOT NULL,
  `pagemetakeyword` varchar(255) NOT NULL,
  `pagemetadescription` varchar(255) NOT NULL,
  `pageshortdescription` varchar(255) NOT NULL,
  `pagedescription` text NOT NULL,
  `insertip` varchar(20) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `editip` varchar(20) NOT NULL,
  `editdatetime` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uilm_pages`
--

INSERT INTO `uilm_pages` (`pageid`, `pagetitle`, `pageurl`, `pagemetakeyword`, `pagemetadescription`, `pageshortdescription`, `pagedescription`, `insertip`, `insertdatetime`, `editip`, `editdatetime`, `timestamp`) VALUES
(1, 'Home', 'home', 'Home Page Meta Keywords', 'Home Page Meta Description', 'Home Page Short Description', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. </p>\r\n', '::1', '2015-10-04 11:52:52', '::1', '2016-02-12 12:33:51', '2015-10-04 09:52:52'),
(2, 'Our Institute', 'aboutus', 'About Us page Meta Keyword', 'About Us page Meta Description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since th', '<div class="entry">\r\n<h4> </h4>\r\n\r\n<h4> </h4>\r\n\r\n<h4><span>The Universal Institute of Life Mastery ( UILM) is an amazing out of box innovation. It is a training company focusing only on achieving massive results. The impact of the training programmes conducted by other individuals or organizations last only for a few hours or a few days but our scientific training and consulting results into long-lasting life transformation. We assure you guaranteed results. Here, </span><b>" You just do not learn But You become the Master"</b></h4>\r\n\r\n<div class="cmsms_cc">\r\n<div class="one_half ui-sortable-handle">\r\n<div>\r\n<h2> </h2>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', '::1', '2015-10-04 11:53:58', '::1', '2016-02-12 01:54:50', '2015-10-04 09:53:58'),
(3, 'Services', 'services', 'Services page Meta Keyword', 'Services page Meta Description', 'Services page Short Description', '<p><strong>SERVICES</strong></p>\n\n<p><strong>Skin Cancer Clinic</strong></p>\n\n<p>Dr Esther Rasser is trained in the early detection and treatment of all types of skin cancers.  A skin check takes 15-30 minutes, depending on your skin type and the number of moles and spots to be looked at.  If you require treatment of your mole or spot, most cases can be dealt with at the surgery including skin flap and graft surgery.</p>\n\n<p><strong>Chronic Disease Clinics</strong></p>\n\n<p>If you suffer from a chronic illness your illness can be better managed with a comprehensive, structured GP management plan.</p>\n\n<p>Your GP management plan will be specifically tailored to your health needs and will:</p>\n\n<ul>\n <li>List the actions you can take to help manage your condition</li>\n <li>Set goals for your treatment</li>\n <li>Set out the services to be provided by your GP</li>\n <li>Be regularly reviewed, ensuring the plan changes along with your needs</li>\n</ul>\n\n<p>As part of your plan referrals can be made to allied health professionals e.g. Dieticians, physiotherapists, podiatrists etc. With these referrals in place, Medicare will give rebates for the services.</p>\n\n<p>Chronic Disease Clinics requires a 45-minute appointment with our Practice Nurse and a standard appointment with your regular doctor. The appointment will be BULK BILLED.</p>\n\n<p><strong>Health Assessment</strong></p>\n\n<p>As we get older, many of us become more vulnerable to illness. The federal government has recognised this and has introduced an annual health check for everyone over the age of 75years.</p>\n\n<p>The aim of the health check is to help find, prevent or lessen the effect of disease and identify any areas where assistance may be required to improve your lifestyle.</p>\n\n<p>It is preferred that the health check be performed in your home with one of our nurses. Alternatively, it can be done in the surgery.</p>\n\n<p>If you would like a 75+ years Health Assessment please contact reception. The Assessment will be BULK BILLED.</p>\n\n<p><strong>Home Medicine Reviews</strong></p>\n\n<p>If you are on multiple medications your GP may organise for your Pharmacist to visit you at home to review all your medications including over the counter medications and aids used (e.g. puffers and spacers). They will provide you with a copy of a proposed plan of action.</p>\n\n<p><strong>45-49 Health check</strong></p>\n\n<p>The federal government has introduced a new health check for everyone aged between 45 and 49 who may be at risk of developing a health complaint, like diabetes or heart problems.</p>\n\n<p>The aim of the health check is to help find, prevent or lessen the effect of the disease – it is better to avoid disease than to treat it. This health check will give us the opportunity to look at your lifestyle and medical/family history to find out if you are at risk.<br />\nAvailable upon request.</p>\n\n<p><strong>4 Year healthy kids checks</strong></p>\n\n<p>At Kurralta Park Surgery, we perform the Pre-School Healthy Kids Check. The Health Check is a comprehensive check up which includes a review of your child’s vision, hearing, development and any other health concerns. Appropriate referrals and follow-ups can be organised and 4-year-old immunisations are also available at this time.</p>\n\n<p>Appointments can be made with Reception. This assessment will be BULK BILLED.</p>\n\n<p><strong>Commercial Drivers Licence</strong></p>\n\n<p>Commercial Drivers Licence Medicals require a long appointment.</p>\n\n<p><strong>Drivers Licence</strong></p>\n\n<p>Standard Drivers Licence Medicals can be done in a standard appointment with your regular doctor. We have forms at the practice for your convenience.</p>\n\n<p><strong>Pre-employment Medical</strong></p>\n\n<p>Pre-employment medicals require a longer appointment. When booking the medical it helps if you can inform the receptionist of any tests required for the medical so they can book adequate time.</p>\n\n<p><strong>Cryotherapy</strong></p>\n\n<p>Most doctors are happy to perform cryotherapy to assist the removal of warts and lesions. This can be done in a standard appointment.</p>\n\n<p><strong>Removal of Lesions</strong></p>\n\n<p>Doctors remove skin lesions in the practice. Make a standard appointment for a doctor to perform a skin check, the doctor will then arrange appointments for any required procedures.</p>\n\n<p>Doctors may perform punch biopsies on skin lesions so a small sample can be sent to pathology for testing. Once Doctors receive your result they can then recommend the required treatment for your skin lesion.</p>\n\n<p><strong>IUD and Implanon insertion</strong></p>\n\n<p>We have Doctors who will insert and remove Implanon. Removal ‘only’ of Mirena can be done by Doctor Lochert. All GP’s are happy to discuss your contraception requirements with you and reception can then book any procedures you require.</p>\n\n<p><strong>Ambulatory Blood Pressure Monitor</strong></p>\n\n<p>A monitor is available to record blood pressures over a 24hr period. Two appointments are required 24 hours apart. Please contact reception for further information.</p>\n\n<p><strong>INR</strong></p>\n\n<p>Doctors refer patients to pathology for INR testing.</p>\n\n<p><strong>ECG</strong></p>\n\n<p>ECG’s are performed at the clinic by nursing staff with review by the doctor.</p>\n\n<p><strong>Spirometry</strong></p>\n\n<p>Spirometry’s (breathing test) are done by our nursing staff. The appointment takes 15 minutes with the nurse and a follow-up appointment with your doctor.</p>\n\n<p><strong>Treatment Room</strong></p>\n\n<p>For the additional comfort and convenience of our patients, Kurralta Park Surgery has a Treatment Room on each of its departments, giving access from the waiting areas and doctors’ rooms.</p>\n\n<p><strong>ANKLE BRACHIAL INDEX (ABI)<br />\nScreening For PVD (Peripheral Vascular Disease)</strong></p>\n\n<p><a href="/fileman/Uploads/kurralta_brochure.pdf" target="_blank"><strong>Download</strong></a></p>\n', '::1', '2015-10-04 11:54:31', '14.203.5.85', '2015-10-20 09:01:35', '2015-10-04 09:54:31'),
(4, 'Seminar', 'seminar', 'Seminar page Meta Keyword', 'Seminar page Meta Description', 'Seminar page Short Description', '<p>Seminar page Description</p>\r\n', '::1', '2015-10-04 11:54:54', '::1', '2016-02-12 12:39:02', '2015-10-04 09:54:54'),
(5, 'Lomesh Dave', 'mentor_1', 'Lomesh Dave page Meta Keyword', 'Lomesh Dave page Meta Description', 'Lomesh Dave page Short Description', '<p><img align="left" alt="" height="250" src="//localhost/uilm/uploads/ckimages/Lomesh photo.jpg"  width="200" /></p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p>Mr. Lomesh Dave is founder and CEO of Universal Institute of Life Mastery. He is known as a front stage magician. He is a great influencer, creating massive impact on lives of people in just few moments of the meeting. Lomesh has created massive breakthroughs in recent years and also helped thousands of people in making their life wealthy in every aspect of life. He has done deep study on human minds and psychology because it plays a major role for success.</p>\r\n\r\n<p>He is a post graduate in science. He started his  career in a pharmaceutical company but his passion for training inspired  him to start UILM.<br />\r\nHe is an excellent communicator, and explains difficult concepts in simple language so that the participants can understand and also apply easily.<br />\r\nHis only mission is to transform mankind by tapping their true potential.</p>\r\n', '::1', '2015-10-04 11:55:24', '::1', '2016-02-16 02:10:16', '2015-10-04 09:55:24'),
(6, 'Amit Patel', 'mentor_2', 'Amit Patel page Meta Keyword', 'Amit Patel page Meta Description', 'Amit Patel page Short Description', '<p><img align="left" alt="" height="250" src="http://localhost/uilm/uploads/ckimages/Amit photo.jpg" width="200" /></p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p>Mr. Amit Patel, Managing Director of Universal Institute of Life Mastery, is a key person with great passion and high level of commitment for charismatic transformation in individuals and organizations.<br />\r\nHe is a commerce graduate. He began his career with  the central government and worked with many well-known training companies.<br />\r\nHe has wide experience in managing organizations and building great relationships. He has vibrating energy and loves to take challenges, so he connected with UILM and now he is creating magic back stage</p>\r\n', '::1', '2015-10-04 11:55:47', '::1', '2016-02-11 06:23:38', '2015-10-04 09:55:47'),
(7, 'Gallery', 'gallery', 'Gallery page Meta Keyword', 'Gallery page Meta Description', 'Gallery page Short Description', '<p>Gallery page Description</p>\r\n', '::1', '2015-10-04 11:56:15', '::1', '2016-02-12 12:47:16', '2015-10-04 09:56:15'),
(8, 'Testimonials', 'testimonial', 'Testimonials', 'Testimonials', 'Testimonials', '<p>Testimonials</p>\r\n', '::1', '2015-10-04 11:56:37', '::1', '2016-02-12 12:47:46', '2015-10-04 09:56:37'),
(9, 'Invite Us', 'inviteus', 'Invite Us page Meta Keyword', 'Invite Us page Meta Description', 'Invite Us page Short Description', '<h2>Invite Us</h2>\r\n\r\n<p> </p>\r\n', '::1', '2015-10-04 12:02:00', '::1', '2016-02-12 01:06:40', '2015-10-04 10:02:00'),
(10, 'Contact Us', 'contact', 'Universal Institute of Life Mastery Contact us', 'Universal Institute of Life Mastery', 'Universal Institute of Life Mastery', '<div class="contactform">\r\n<div class="contactform">\r\n<h2>Address</h2>\r\n</div>\r\n\r\n<div class="c_address">\r\n<address>\r\n<p>contact no:  (079) 26934016</p>\r\n\r\n<p>Email ID: info@uilm.in</p>\r\n\r\n<p>Address: E/906, Titanium City Center, Nr. Sachin Tower, 100-feet-Anand Nagar Road, Satellite, Ahmedabad - 380015</p>\r\n</address>\r\n</div>\r\n</div>\r\n\r\n<p> </p>\r\n', '::1', '2015-10-04 12:02:29', '::1', '2016-02-16 03:21:02', '2015-10-04 10:02:29'),
(11, 'Photos', 'image', 'Photos page Meta Keyword', 'Photos page Meta Description', 'Photos page Short Description', '<p>Gallery Photos page Description</p>\r\n', '::1', '2015-10-04 12:11:35', '::1', '2016-02-17 01:44:35', '2015-10-04 10:11:35'),
(12, 'Videos', 'video', 'Videos page Meta Keyword', 'Videos page Meta Description', 'Videos page Short Description', '<p>Gallery Videos page Description</p>\r\n', '::1', '2015-10-04 12:12:05', '::1', '2016-02-12 12:58:04', '2015-10-04 10:12:05'),
(13, 'Brochure', 'brochure', 'Brochure', 'Brochure', 'Brochure', '<p>Brochure</p>\r\n', '::1', '2015-10-04 12:30:37', '::1', '2016-02-12 12:59:06', '2015-10-04 10:30:37'),
(14, 'Bulk Billing Available', 'fees-bulk-billing', 'Fees & Bulk Billing', 'Fees & Bulk Billing', '&nbsp', '<h2><strong>Fees & Bulk Billing</strong></h2>\n\n<ul>\n <li>Bulk Billing is available for holders of CURRENT Pension cards, Health Care Cards, commonwealth senior cards and for children under 16 years of<br />\n   age. Please have your Pension, Health Care & Medicare card with you at each consultation.</li>\n <li>DVA patients will be fully bulk billed.</li>\n <li>A procedure fee will be charged for excisions and some minor procedures.</li>\n <li>Patients will be  encouraged to pay in full at the time of consultation.</li>\n <li>Please note that investigations and procedures performed during a consultation may incur extra charges.</li>\n <li>Home & After Hours Visit Fees – Please ask office staff.</li>\n <li>Methods of payment – Cash, personal cheque, Visa, Bankcard, MasterCard & EFTPOS.</li>\n <li>Receipts/Accounts can be forwarded online to Medicare on your behalf.</li>\n</ul>\n', '::1', '2015-10-04 12:31:14', '103.247.83.218', '2015-11-04 03:22:03', '2015-10-04 10:31:14'),
(15, '24 Hours Service', '24-hours-service', '24 Hours Service', '24 Hours Service', '&nbsp', '<p>24 Hours Access to Medical Care can be obtained by contacting the practice on 82932994.<br />\nOur GP’s will be available during opening hours and if your call is outside of those hours you will be re-directed to the locum GP service through <strong>arrangements with National Home Doctor Service</strong>.</p>\n', '::1', '2015-10-04 12:31:56', '113.193.160.45', '2015-10-10 11:34:01', '2015-10-04 10:31:56'),
(16, 'workshop', 'workshop', 'workshop', 'workshop', 'workshop', '<p>workshop</p>\r\n', '::1', '2016-02-18 10:27:03', '', '0000-00-00 00:00:00', '2016-02-18 09:27:03'),
(17, 'eagle', 'eagle', 'eagle', 'eagle', 'eagle', '<p>eagle</p>\r\n', '::1', '2016-02-18 10:27:32', '', '0000-00-00 00:00:00', '2016-02-18 09:27:32'),
(18, 'Business Coaching', 'business_coaching', 'Business Coaching', 'Business Coaching', 'Business Coaching', '<p>Business Coaching</p>\r\n', '::1', '2016-02-18 10:28:22', '::1', '2016-02-18 10:29:46', '2016-02-18 09:28:22'),
(19, 'Personal Coaching', 'personal_coaching', 'Personal Coaching', 'Personal Coaching', 'Personal Coaching', '<p>Personal Coaching</p>\r\n', '::1', '2016-02-18 10:30:28', '::1', '2016-02-18 10:31:23', '2016-02-18 09:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `uilm_sem`
--

CREATE TABLE IF NOT EXISTS `uilm_sem` (
`semid` int(11) NOT NULL,
  `semname` varchar(50) NOT NULL,
  `semvalue` varchar(255) NOT NULL,
  `editip` varchar(20) NOT NULL,
  `editdatetime` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uilm_sem`
--

INSERT INTO `uilm_sem` (`semid`, `semname`, `semvalue`, `editip`, `editdatetime`, `timestamp`) VALUES
(1, 'Facebook', 'https://www.facebook.com/', '::1', '2015-10-04 02:47:53', '2015-06-29 06:11:19'),
(2, 'Twiter', 'https://www.twiter.com', '::1', '2015-10-04 02:48:19', '2015-06-29 06:11:19'),
(3, 'Google+', 'https://www.gplus.com', '::1', '2016-02-12 11:26:54', '2015-06-29 06:11:34'),
(4, 'Skype', 'Skype', '127.0.0.1', '2015-08-10 08:13:56', '2015-06-29 06:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `uilm_seo`
--

CREATE TABLE IF NOT EXISTS `uilm_seo` (
`seoid` int(11) NOT NULL,
  `seoname` varchar(50) NOT NULL,
  `seovalue` varchar(255) NOT NULL,
  `editip` varchar(20) NOT NULL,
  `editdatetime` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uilm_seo`
--

INSERT INTO `uilm_seo` (`seoid`, `seoname`, `seovalue`, `editip`, `editdatetime`, `timestamp`) VALUES
(1, 'Meta Keywords', 'Universal Institute of Life Mastery', '::1', '2016-02-12 11:25:18', '2015-06-29 06:37:44'),
(2, 'Meta Description', 'Universal Institute of Life Mastery', '::1', '2016-02-12 11:25:26', '2015-06-29 06:37:44'),
(3, 'Google Webmaster', 'Google Webmaster', '127.0.0.1', '2015-08-10 08:12:39', '2015-06-29 06:38:13'),
(4, 'Google Analytics', 'Google Analytics', '', '0000-00-00 00:00:00', '2015-06-29 06:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `uilm_services`
--

CREATE TABLE IF NOT EXISTS `uilm_services` (
`serviceid` int(11) NOT NULL,
  `servicetitle` varchar(255) NOT NULL,
  `serviceurl` varchar(255) NOT NULL,
  `serviceimage` varchar(255) NOT NULL,
  `servicemetakeyword` varchar(255) NOT NULL,
  `servicemetadescription` varchar(255) NOT NULL,
  `serviceshortdescription` varchar(255) NOT NULL,
  `servicedescription` text NOT NULL,
  `status` enum('Active','InActive') NOT NULL,
  `insertip` varchar(20) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `editip` varchar(20) NOT NULL,
  `editdatetime` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `uilm_setting`
--

CREATE TABLE IF NOT EXISTS `uilm_setting` (
`settingid` int(11) NOT NULL,
  `settingname` varchar(50) NOT NULL,
  `settingvalue` varchar(255) NOT NULL,
  `editip` varchar(20) NOT NULL,
  `editdatetime` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uilm_setting`
--

INSERT INTO `uilm_setting` (`settingid`, `settingname`, `settingvalue`, `editip`, `editdatetime`, `timestamp`) VALUES
(1, 'Site Name', 'UILM', '::1', '2016-02-17 11:19:37', '2015-06-28 08:42:40'),
(2, 'Owner Name', 'UILM', '::1', '2016-02-17 11:19:46', '2015-06-28 10:33:32'),
(3, 'Contact No', '(079) 26934016', '::1', '2016-02-16 03:25:01', '2015-06-28 10:33:32'),
(4, 'Address', 'E/906, Titanium City Center, Nr. Sachin Tower, 100-feet-Anand Nagar Road, Satellite, Ahmedabad - 380015', '::1', '2016-02-16 03:25:33', '2015-06-28 10:33:52'),
(5, 'Site Email', 'info@uilm.in', '::1', '2016-02-16 03:25:17', '2015-10-04 12:50:38'),
(6, 'Fax', '0000000000', '::1', '2016-02-01 01:31:23', '2015-06-28 10:33:32'),
(7, 'home page video', 'https://www.youtube.com/watch?v=RM55SnIw2uQ', '::1', '2016-02-18 10:46:46', '2016-02-18 09:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `uilm_staff_type`
--

CREATE TABLE IF NOT EXISTS `uilm_staff_type` (
`staffid` int(11) NOT NULL,
  `staffname` varchar(255) CHARACTER SET latin1 NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `insertip` varchar(20) CHARACTER SET latin1 NOT NULL,
  `editdatetime` datetime NOT NULL,
  `editip` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uilm_staff_type`
--

INSERT INTO `uilm_staff_type` (`staffid`, `staffname`, `insertdatetime`, `insertip`, `editdatetime`, `editip`) VALUES
(1, 'Doctor', '2015-08-12 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 'Nurse', '2015-08-12 00:00:00', '', '0000-00-00 00:00:00', ''),
(3, 'Administrator', '2015-08-12 00:00:00', '', '0000-00-00 00:00:00', ''),
(4, 'Allied Health', '2015-12-26 00:00:00', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `uilm_testimonials`
--

CREATE TABLE IF NOT EXISTS `uilm_testimonials` (
`testimonialid` int(11) NOT NULL,
  `clientname` varchar(100) NOT NULL,
  `clientimage` varchar(255) NOT NULL,
  `clientprofession` varchar(255) NOT NULL,
  `testimonialtext` text NOT NULL,
  `status` enum('Active','InActive') NOT NULL,
  `insertip` varchar(20) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `editip` varchar(20) NOT NULL,
  `editdatetime` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uilm_testimonials`
--

INSERT INTO `uilm_testimonials` (`testimonialid`, `clientname`, `clientimage`, `clientprofession`, `testimonialtext`, `status`, `insertip`, `insertdatetime`, `editip`, `editdatetime`, `timestamp`) VALUES
(1, 'lipsum', 't4.jpg', 'Manager', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Active', '::1', '2015-10-04 01:10:11', '::1', '2016-02-15 11:58:59', '2015-10-04 11:10:11'),
(2, 'lipsum -1', 't1.jpg', 'CEO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Active', '::1', '2015-10-04 01:10:40', '::1', '2016-11-02 07:05:42', '2015-10-04 11:10:40'),
(6, 'dhoni', '', 'player', 'https://www.youtube.com/watch?v=GOpzNt2HfV8&feature=youtu.be', 'Active', '::1', '2016-02-06 10:37:37', '::1', '2016-02-11 07:02:21', '2016-02-06 09:37:37'),
(7, 'lipsum-3', 't2.jpg', 'Clark', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Active', '::1', '2016-02-09 08:42:10', '::1', '2016-11-02 07:04:51', '2016-02-09 07:42:10'),
(8, 'lipsum', 'te2.jpg', 'Manager', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Active', '::1', '2016-02-15 11:58:25', '::1', '0000-00-00 00:00:00', '2016-02-15 10:58:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `uilm_admin`
--
ALTER TABLE `uilm_admin`
 ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `uilm_banners`
--
ALTER TABLE `uilm_banners`
 ADD PRIMARY KEY (`bannerid`);

--
-- Indexes for table `uilm_contactus`
--
ALTER TABLE `uilm_contactus`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uilm_emailsetting`
--
ALTER TABLE `uilm_emailsetting`
 ADD PRIMARY KEY (`settingid`);

--
-- Indexes for table `uilm_events`
--
ALTER TABLE `uilm_events`
 ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `uilm_gallery`
--
ALTER TABLE `uilm_gallery`
 ADD PRIMARY KEY (`galleryid`);

--
-- Indexes for table `uilm_invitation`
--
ALTER TABLE `uilm_invitation`
 ADD PRIMARY KEY (`invitationid`);

--
-- Indexes for table `uilm_news`
--
ALTER TABLE `uilm_news`
 ADD PRIMARY KEY (`newsid`);

--
-- Indexes for table `uilm_pages`
--
ALTER TABLE `uilm_pages`
 ADD PRIMARY KEY (`pageid`);

--
-- Indexes for table `uilm_sem`
--
ALTER TABLE `uilm_sem`
 ADD PRIMARY KEY (`semid`);

--
-- Indexes for table `uilm_seo`
--
ALTER TABLE `uilm_seo`
 ADD PRIMARY KEY (`seoid`);

--
-- Indexes for table `uilm_services`
--
ALTER TABLE `uilm_services`
 ADD PRIMARY KEY (`serviceid`);

--
-- Indexes for table `uilm_setting`
--
ALTER TABLE `uilm_setting`
 ADD PRIMARY KEY (`settingid`);

--
-- Indexes for table `uilm_staff_type`
--
ALTER TABLE `uilm_staff_type`
 ADD PRIMARY KEY (`staffid`);

--
-- Indexes for table `uilm_testimonials`
--
ALTER TABLE `uilm_testimonials`
 ADD PRIMARY KEY (`testimonialid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uilm_admin`
--
ALTER TABLE `uilm_admin`
MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `uilm_banners`
--
ALTER TABLE `uilm_banners`
MODIFY `bannerid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `uilm_contactus`
--
ALTER TABLE `uilm_contactus`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `uilm_emailsetting`
--
ALTER TABLE `uilm_emailsetting`
MODIFY `settingid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `uilm_events`
--
ALTER TABLE `uilm_events`
MODIFY `eventid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `uilm_gallery`
--
ALTER TABLE `uilm_gallery`
MODIFY `galleryid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `uilm_invitation`
--
ALTER TABLE `uilm_invitation`
MODIFY `invitationid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `uilm_news`
--
ALTER TABLE `uilm_news`
MODIFY `newsid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `uilm_pages`
--
ALTER TABLE `uilm_pages`
MODIFY `pageid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `uilm_sem`
--
ALTER TABLE `uilm_sem`
MODIFY `semid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `uilm_seo`
--
ALTER TABLE `uilm_seo`
MODIFY `seoid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `uilm_services`
--
ALTER TABLE `uilm_services`
MODIFY `serviceid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `uilm_setting`
--
ALTER TABLE `uilm_setting`
MODIFY `settingid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `uilm_staff_type`
--
ALTER TABLE `uilm_staff_type`
MODIFY `staffid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `uilm_testimonials`
--
ALTER TABLE `uilm_testimonials`
MODIFY `testimonialid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
