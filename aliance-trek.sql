-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2015 at 09:19 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aliance-trek`
--
CREATE DATABASE IF NOT EXISTS `aliance-trek` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `aliance-trek`;

-- --------------------------------------------------------

--
-- Table structure for table `advert`
--

CREATE TABLE IF NOT EXISTS `advert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `advertisement_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `caption` text,
  `is_active` char(1) DEFAULT NULL,
  `ext` char(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `advert`
--

INSERT INTO `advert` (`id`, `advertisement_id`, `title`, `url`, `caption`, `is_active`, `ext`) VALUES
(1, 1, 'Photo1', '', '&nbsp;', 'Y', 'jpg'),
(2, 1, 'Photo2', '', '&nbsp;', 'Y', 'jpg'),
(3, 1, 'Photo3', '', '&nbsp;', 'Y', 'jpg'),
(4, 1, 'Photo4', '', '&nbsp;', 'Y', 'jpg'),
(5, 1, 'Photo5', '', '&nbsp;', 'Y', 'jpg'),
(6, 1, 'Photo6', '', '&nbsp;', 'Y', 'jpg'),
(7, 1, 'Photo7', '', '&nbsp;', 'Y', 'jpg'),
(8, 1, 'Photo9', '', '&nbsp;', 'Y', 'jpg'),
(9, 1, 'Photo10', '', '&nbsp;', 'Y', 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE IF NOT EXISTS `advertisement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `order_by` char(4) NOT NULL DEFAULT 'ASC',
  `is_active` char(1) DEFAULT NULL,
  `howmany` varchar(20) NOT NULL,
  `ext` char(1) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`id`, `parent_id`, `name`, `order_by`, `is_active`, `howmany`, `ext`, `description`) VALUES
(1, 0, 'Latest Travel in Nepal', 'DESC', 'Y', '30', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE IF NOT EXISTS `attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `myfile` varchar(4) COLLATE utf8_bin NOT NULL,
  `is_active` char(1) COLLATE utf8_bin NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=16 ;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `content_id`, `title`, `myfile`, `is_active`) VALUES
(2, 24, 'NEPAL', 'jpg', 'Y'),
(3, 25, 'BHUTAN', 'png', 'Y'),
(4, 26, 'INDIA', 'jpg', 'Y'),
(5, 27, 'TIBET', 'jpg', 'Y'),
(6, 29, 'Trisuhli Rafting', 'jpg', 'Y'),
(7, 30, 'Kathmandu Valley Trek', 'jpg', 'Y'),
(8, 31, 'Everset View Trek', 'jpg', 'Y'),
(12, 33, 'hit', 'png', 'Y'),
(13, 31, 'Everest', 'jpg', 'Y'),
(14, 15, 'rubey Valley', 'png', 'Y'),
(15, 15, 'rubey Valley1', 'png', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE IF NOT EXISTS `contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `menu_name` varchar(500) COLLATE utf8_bin NOT NULL,
  `pseudo_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `content_title` varchar(500) COLLATE utf8_bin NOT NULL,
  `short_description` text COLLATE utf8_bin NOT NULL,
  `detail_description` longtext COLLATE utf8_bin NOT NULL,
  `date` varchar(250) COLLATE utf8_bin NOT NULL,
  `weight` int(11) NOT NULL,
  `author` text COLLATE utf8_bin NOT NULL,
  `is_active` char(1) COLLATE utf8_bin NOT NULL DEFAULT 'Y',
  `page_title` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `meta_description` text COLLATE utf8_bin,
  `keywords` varchar(255) COLLATE utf8_bin NOT NULL,
  `extension` varchar(4) COLLATE utf8_bin NOT NULL,
  `display` char(1) COLLATE utf8_bin NOT NULL DEFAULT 'N',
  `duration` varchar(20) COLLATE utf8_bin NOT NULL,
  `code` varchar(10) COLLATE utf8_bin NOT NULL,
  `p_activity` varchar(100) COLLATE utf8_bin NOT NULL,
  `s_activity` varchar(100) COLLATE utf8_bin NOT NULL,
  `g_size` varchar(20) COLLATE utf8_bin NOT NULL,
  `maxalt` varchar(20) COLLATE utf8_bin NOT NULL,
  `arrival` varchar(50) COLLATE utf8_bin NOT NULL,
  `departure` varchar(50) COLLATE utf8_bin NOT NULL,
  `transport` varchar(80) COLLATE utf8_bin NOT NULL,
  `country` varchar(20) COLLATE utf8_bin NOT NULL,
  `meals` varchar(100) COLLATE utf8_bin NOT NULL,
  `accomode` varchar(100) COLLATE utf8_bin NOT NULL,
  `itnary` text COLLATE utf8_bin NOT NULL,
  `included` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo_name` (`pseudo_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=55 ;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `group_id`, `parent_id`, `menu_name`, `pseudo_name`, `content_title`, `short_description`, `detail_description`, `date`, `weight`, `author`, `is_active`, `page_title`, `meta_description`, `keywords`, `extension`, `display`, `duration`, `code`, `p_activity`, `s_activity`, `g_size`, `maxalt`, `arrival`, `departure`, `transport`, `country`, `meals`, `accomode`, `itnary`, `included`) VALUES
(1, 1, 0, 'Home', 'home', 'Home', 'Home', '&nbsp;Home', 'Jun 21 Sun 2015', 5, 'Admin', 'Y', 'Nepal trekking, Trekking in Nepal, Nepal treks, Everest trekking, Everest trek, Annapurna trekking, Langtang trekking, Manaslu trek, Dhaulagiri trek', ' Alliance treks & expedition arranges Nepal trekking, Trekking in Nepal, Nepal treks, Wildlife tour, Whitewater rafting', 'Nepal trekking,  Nepal tTrekking in Nepal,reks, Everest trekking, Everest trek, Everest base camp trekking, Annapurna trek, Annapurna trekking, Langtang trek, Langtang trekking, Dolpo Trek, Mustang trek, Kanchanjunga trek, Rara Trek, Ganesh Himal Trek, Ro', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 1, 0, 'About Us', 'about-us', 'About Us', '&nbsp;About Us', '&nbsp;About Us', 'Jun 21 Sun 2015', 10, 'Admin', 'Y', 'About Us', 'About Us', 'About Us', '', 'Y', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 1, 0, 'Nepal Trekking', 'nepal-trekking', 'Nepal Trekking', 'Nepal Trekking&nbsp;', '&nbsp;Nepal Trekking', 'Jun 21 Sun 2015', 15, 'Admin', 'Y', 'Nepal Trekking', 'Nepal Trekking', 'Nepal Trekking', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 1, 0, 'Nepal Peak Climbing', 'nepal-peak-climbing', 'Nepal Peak Climbing', '&nbsp;Nepal Peak Climbing', '&nbsp;Nepal Peak Climbing', 'Jun 21 Sun 2015', 20, 'Admin', 'Y', 'Nepal Peak Climbing', 'Nepal Peak Climbing', 'Nepal Peak Climbing', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 1, 0, 'Nepal Expedition ', 'nepal-expedition-', 'Nepal Expedition ', '&nbsp;Nepal Expedition', '&nbsp;Nepal Expedition', 'Jun 21 Sun 2015', 25, 'Admin', 'Y', 'Nepal Expedition ', 'Nepal Expedition ', 'Nepal Expedition ', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 1, 0, 'Day Tour ', 'day-tour-', 'Day Tour ', '&nbsp;Day Tour', '&nbsp;Day Tour', 'Jun 21 Sun 2015', 30, 'Admin', 'Y', 'Day Tour ', 'Day Tour ', 'Day Tour ', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 1, 0, 'Exclusive Tour', 'exclusive-tour', 'Exclusive Tour', '&nbsp;Exclusive Tour', '&nbsp;Exclusive Tour', 'Jun 21 Sun 2015', 35, 'Admin', 'Y', 'Exclusive Tour', 'Exclusive Tour', 'Exclusive Tour', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 1, 0, 'Social Responsibility', 'social-responsibility', 'Social Responsibility', '&nbsp;Social Responsibility', '&nbsp;Social Responsibility', 'Jun 21 Sun 2015', 40, 'Admin', 'Y', 'Social Responsibility', 'Social Responsibility', 'Social Responsibility', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 1, 0, 'Contact Us', 'contact-us', 'Contact Us', '&nbsp;Contact Us', '&nbsp;Contact Us', 'Jun 21 Sun 2015', 45, 'Admin', 'N', 'Contact Us', '  Contact Us  ', 'Contact Us', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 1, 2, 'Legal Documents', 'legal-documents', 'Legal Documents', 'Legal Documents', 'Legal Documents', 'Jun 22 Mon 2015', 50, 'Admin', 'Y', 'Legal Documents', '  Legal Documents  ', 'Legal Documents', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 1, 2, 'Our Team', 'our-team', 'Our Team', 'Our Team', 'Our Team', 'Jun 22 Mon 2015', 55, 'Admin', 'Y', 'Our Team', 'Our Team', 'Our Team', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 1, 2, 'Payment Terms & Conditions', 'payment-terms-and-conditions', 'Payment Terms & Conditions', 'Payment Terms &amp; Conditions', 'Payment Terms &amp; Conditions', 'Jun 22 Mon 2015', 60, 'Admin', 'Y', 'Payment Terms & Conditions', '  Payment Terms & Conditions  ', 'Payment Terms & Conditions', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 1, 2, 'Volunteering Opportunities', 'volunteering-opportunities', 'Volunteering Opportunities', 'Volunteering Opportunities', 'Volunteering Opportunities', 'Jun 22 Mon 2015', 65, 'Admin', 'Y', 'Nepal trekking, Trekking in Nepal, Nepal treks, Everest trekking, Everest trek, Annapurna trekking, Langtang trekking, Manaslu trek, Dhaulagiri trek', 'Volunteering Opportunities', 'Volunteering Opportunities', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 1, 2, 'Alert', 'alert', 'Alert', 'Alert', 'Alert', 'Jun 22 Mon 2015', 70, 'Admin', 'Y', 'Alert', 'Alert', 'Alert', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, 1, 3, 'Ruby Valley Trekking', 'ruby-valley-trekking', 'Ruby Valley Trekking', 'Ruby Valley Trekking', 'Dhading, Gorkha, Rasuwaa and Nuwakot districts are at the geographical center of Nepal and lie at the heart of the nation''s history. It is from these hills that Gorkha hillsmen, led by Prithvi Narayan Shah, set out to unite Nepal in the late 1700s. Since then, Gorkha soldiers have received international fame for their bravery and skill as warriors.<br />\r\n<br />\r\nAlthough near to both Kathmandu and Pokhara, the Ganesh Himal Region has remained a well-kept secret to all but Nepal''s most avid trekkers. The unexplored area is concealed between the popular destinations of Langtang National Park and the Mansaslu Conservation Area Project. <br />\r\n<br />\r\nWildflowers flourish, and waterfalls embellish the lush hill scenery in a land blessed with wide-ranging geographical, cultural and biological diversity. Sensational viewpoints feature the sublime Himalaya to the north. Most prominent is the Ganesh Himal Range, a family of peaks among the most attractive of the entire Himalaya. The Ganesh massif is named in honor of Hindu deity Ganesha, son of Shiva and Parvati. Selected viewpoints in the area offer immense panoramas!', 'Jun 22 Mon 2015', 75, 'Admin', 'Y', 'Ruby Valley Trekking', '          Ruby Valley Trekking          ', 'Ruby Valley Trekking', '', 'Y', '8 Days', 'HGTB-0130', 'Cultural & Traditional Tour', 'Trekking and Hiking', '2 - 12 People', '3180m / 7856m', 'nepal', 'nepal', '2 - 12 People', '2 - 12 People', 'All Meals', 'Standard Hotels', '&nbsp;Ruby valley Treaking&nbsp;', '&nbsp;new nepal,'),
(16, 1, 3, 'Everest Trekking', 'everest-trekking', 'Everest Trekking', '&nbsp;Everest Trekking', '&nbsp;Everest Trekking', 'Jun 22 Mon 2015', 80, 'Admin', 'Y', 'Everest Trekking', 'Everest Trekking', 'Everest Trekking', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 1, 3, 'AnnaPurna Trekking', 'annapurna-trekking', 'AnnaPurna Trekking', '&nbsp;AnnaPurna Trekking', 'AnnaPurna Trekking', 'Jun 22 Mon 2015', 85, 'Admin', 'Y', 'AnnaPurna Trekking', 'AnnaPurna Trekking', 'AnnaPurna Trekking', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 1, 3, 'Langtang Trekking', 'langtang-trekking', 'Langtang Trekking', '&nbsp;Langtang Trekking', '&nbsp;Langtang Trekking', 'Jun 22 Mon 2015', 90, 'Admin', 'Y', 'Langtang Trekking', 'Langtang Trekking    ', 'Langtang Trekking', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, 2, 0, 'FAQs', 'faqs', 'FAQs', 'FAQs&nbsp;', '&nbsp;FAQs', 'Jun 22 Mon 2015', 5, 'Admin', 'Y', 'FAQs', 'FAQs', 'FAQs', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, 2, 0, 'Link Exchange', 'link-exchange', 'Link Exchange', '&nbsp;Link Exchange', '&nbsp;Link Exchange', 'Jun 22 Mon 2015', 10, 'Admin', 'Y', 'Link Exchange', 'Link Exchange', 'Link Exchange', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, 2, 0, 'Feedback', 'feedback', 'Feedback', '&nbsp;Feedback', '&nbsp;Feedback', 'Jun 22 Mon 2015', 15, 'Admin', 'Y', 'Feedback', 'Feedback', 'Feedback', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(22, 2, 0, 'Sitemap', 'sitemap', 'Sitemap', '&nbsp;Sitemap', '&nbsp;Sitemap', 'Jun 22 Mon 2015', 20, 'Admin', 'Y', 'Sitemap', 'Sitemap', 'Sitemap', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(23, 2, 0, 'Contact', 'contact', 'Contact', '<h1>ALLIANCE TREKS &amp; EXPEDITION (P) LTD.</h1>\r\n<br />\r\nP.O. Box: 5270, Chhetrapati, J. P. School Road, Thamel, Kathmandu, Nepal <br />\r\nTel: 977-1- 4226667, 4220317, 4220130 Fax: 977-1-4231516 <br />\r\nE-Mail: info@gototrek.com <br />\r\nWeb: http://www.gototrek.com , http://www.alliancetrek.com <br />', '&nbsp;Contact', 'Jun 22 Mon 2015', 25, 'Admin', 'Y', 'Contact', '    Contact    ', 'Contact', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(24, 3, 0, 'NEPAL', 'nepal', 'NEPAL', '&nbsp;NEPAL', '&nbsp;NEPAL', 'Jun 22 Mon 2015', 5, 'Admin', 'Y', 'NEPAL', 'NEPAL', 'NEPAL', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(25, 3, 0, 'BHUTAN', 'bhutan', 'BHUTAN', '&nbsp;BHUTAN', '&nbsp;BHUTAN', 'Jun 22 Mon 2015', 10, 'Admin', 'Y', 'BHUTAN', 'BHUTAN', 'BHUTAN', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(26, 3, 0, 'INDIA', 'india', 'INDIA', '&nbsp;INDIA', '&nbsp;INDIA', 'Jun 22 Mon 2015', 15, 'Admin', 'Y', 'INDIA', 'INDIA', 'INDIA', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(27, 3, 0, 'TIBET', 'tibet', 'TIBET', '&nbsp;TIBET', '&nbsp;TIBET', 'Jun 22 Mon 2015', 20, 'Admin', 'Y', 'TIBET', 'TIBET', 'TIBET', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(28, 4, 0, 'NAMASTE AND HEARTLY WELCOME TO NEPAL', 'namaste-and-heartly-welcome-to-nepal', 'NAMASTE AND HEARTLY WELCOME TO NEPAL', '&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,<br />\r\nand more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum', '&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,<br />\r\nand more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum', 'Jun 22 Mon 2015', 5, 'Admin', 'Y', 'NAMASTE AND HEARTLY WELCOME TO NEPAL', 'NAMASTE AND HEARTLY WELCOME TO NEPAL', 'NAMASTE AND HEARTLY WELCOME TO NEPAL', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(29, 5, 0, 'Trisuhli Rafting', 'trisuhli-rafting', 'Trisuhli Rafting', '&nbsp;Trisuhli Rafting', '&nbsp;Trisuhli Rafting', 'Jun 22 Mon 2015', 5, 'Admin', 'Y', 'Trisuhli Rafting', 'Trisuhli Rafting', 'Trisuhli Rafting', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(30, 5, 0, 'Kathmandu Valley Trek', 'kathmandu-valley-trek', 'Kathmandu Valley Trek', '&nbsp;Kathmandu Valley Trek', '&nbsp;Kathmandu Valley Trek', 'Jun 22 Mon 2015', 10, 'Admin', 'Y', 'Kathmandu Valley Trek', '  Kathmandu Valley Trek  ', 'Kathmandu Valley Trek', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(31, 5, 0, 'Everset View Trek', 'everset-view-trek', 'Everset View Trek', '&nbsp;Everset View Trek', '&nbsp;Everset View Trek', 'Jun 22 Mon 2015', 15, 'Admin', 'Y', 'Everset View Trek', 'Everset View Trek', 'Everset View Trek', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(33, 6, 0, 'Lorem Ipsum is simply dummy text', 'lorem-ipsum-is-simply-dummy-textdd', 'Lorem Ipsum is simply dummy text', '&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Jun 22 Mon 2015', 5, 'Admin', 'Y', 'Lorem Ipsum is simply dummy text', 'Lorem Ipsum is simply dummy text', 'Lorem Ipsum is simply dummy text', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(34, 7, 0, 'Trekking in Nepal', 'trekking-in-nepall', 'Trekking in Nepal', '&nbsp;Trekking in Nepal', '&nbsp;Trekking in Nepal', 'Jun 25 Thu 2015', 5, 'Admin', 'Y', 'Trekking in Nepal', 'Trekking in Nepal', 'Trekking in Nepal', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(35, 7, 0, 'Tours in Nepal', 'tours-in-nepal', 'Tours in Nepal', 'Tours in Nepal', '&nbsp;Tours in Nepal', 'Jun 25 Thu 2015', 10, 'Admin', 'Y', 'Tours in Nepal', 'Tours in Nepal', 'Tours in Nepal', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(36, 7, 0, 'Safari in Nepal', 'safari-in-nepal', 'Safari in Nepal', 'Safari in Nepal', 'Safari in Nepal', 'Jun 28 Sun 2015', 15, 'Admin', 'Y', 'Safari in Nepal', '  Safari in Nepal  ', 'Nepal trekking', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(37, 7, 0, 'Expidition in Nepal', 'expidition-in-nepal', 'Expidition in Nepal', '&nbsp;Expidition in Nepal', '&nbsp;&nbsp;Expidition in Nepal', 'Jul 01 Wed 2015', 20, 'Admin', 'Y', 'Expidition in Nepal', '     Expidition in Nepal    ', ' Expidition in Nepal', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 7, 0, 'Tour in India', 'tour-in-india', 'Tour in India', '&nbsp;Tour in India', '&nbsp;Tour in India', 'Jul 01 Wed 2015', 25, 'Admin', 'Y', 'Tour in India', 'Tour in India', 'Tour in India', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(39, 7, 0, 'Hiking in Nepal', 'hiking-in-nepal', 'Hiking in Nepal', '&nbsp;Hiking in Nepal', '&nbsp;&nbsp;Hiking in Nepal', 'Jul 01 Wed 2015', 30, 'Admin', 'Y', 'Hiking in Nepal', ' Alliance treks & expedition arranges Nepal trekking, Trekking in Nepal, Nepal treks, Wildlife tour, Whitewater rafting', 'Nepal trekking, Trekking in Nepal, Nepal treks, Everest trekking, Everest trek, Everest base camp trekking, Annapurna trek, Annapurna trekking, Langtang trek, Langtang trekking, Dolpo Trek, Mustang trek, Kanchanjunga trek, Rara Trek, Ganesh Himal Trek, Ro', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(40, 7, 0, 'Air Ticketing', 'air-ticketing', 'Air Ticketing', '&nbsp;Air Ticketing', '&nbsp;Air Ticketing', 'Jul 01 Wed 2015', 35, 'Admin', 'Y', 'Air Ticketing', 'Air Ticketing', 'Air Ticketing', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(41, 7, 0, 'Bungy Jumping', 'bungy-jumping', 'Bungy Jumping', '&nbsp;Bungy Jumping', '&nbsp;Bungy Jumping', 'Jul 01 Wed 2015', 40, 'Admin', 'Y', 'Bungy Jumping', 'Bungy Jumping', 'Bungy Jumping', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(42, 7, 0, 'Bird Watching', 'bird-watching', 'Bird Watching', '&nbsp;Bird Watching', '&nbsp;Bird Watching', 'Jul 01 Wed 2015', 45, 'Admin', 'Y', 'Bird Watching', 'Bird Watching', 'Bird Watching', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(43, 7, 0, 'Peak Climbing in Nepal', 'peak-climbing-in-nepal', 'Peak Climbing in Nepal', '&nbsp;Peak Climbing in Nepal', 'Peak Climbing in Nepal&nbsp;', 'Jul 01 Wed 2015', 50, 'Admin', 'Y', 'Peak Climbing in Nepal', 'Peak Climbing in Nepal', 'Peak Climbing in Nepal', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(44, 7, 0, 'Rafting in Nepal', 'rafting-in-nepal', 'Rafting in Nepal', '&nbsp;Rafting in Nepal', '&nbsp;Rafting in Nepal', 'Jul 01 Wed 2015', 55, 'Admin', 'Y', 'Rafting in Nepal', 'Rafting in Nepal', 'Rafting in Nepal', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(45, 7, 0, 'Tours in Tibet', 'tours-in-tibet', 'Tours in Tibet', 'Tours in Tibet&nbsp;', 'Tours in Tibet&nbsp;', 'Jul 01 Wed 2015', 60, 'Admin', 'Y', 'Tours in Tibet', 'Tours in Tibet', 'Tours in Tibet', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(46, 7, 0, 'Trekking in Tibet', 'trekking-in-tibet', 'Trekking in Tibet', '&nbsp;Trekking in Tibet', '&nbsp;Trekking in Tibet', 'Jul 01 Wed 2015', 65, 'Admin', 'Y', 'Trekking in Tibet', 'Trekking in Tibet', 'Trekking in Tibet', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(47, 7, 0, 'Trekking in Bhutan', 'trekking-in-bhutan', 'Trekking in Bhutan', 'Trekking in Bhutan&nbsp;', '&nbsp;Trekking in Bhutan', 'Jul 01 Wed 2015', 70, 'Admin', 'Y', 'Trekking in Bhutan', 'Trekking in Bhutan', 'Trekking in Bhutan', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(48, 7, 0, 'Tours in Bhutan', 'tours-in-bhutan', 'Tours in Bhutan', '&nbsp;Tours in Bhutan', '&nbsp;Tours in Bhutan', 'Jul 01 Wed 2015', 75, 'Admin', 'Y', 'Tours in Bhutan', 'Tours in Bhutan', 'Tours in Bhutan', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(49, 7, 0, 'Tibet Tour', 'tibet-tour', 'Tibet Tour', 'Tibet Tour', 'Tibet Tour&nbsp;', 'Jul 01 Wed 2015', 80, 'Admin', 'Y', 'Tibet Tour', '    Tibet Tour    ', 'Tibet Tour', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(50, 8, 0, 'Getting to from Nepal', 'getting-tofrom-nepal', 'Getting to/from Nepal', 'Getting to/from Nepal', 'Route map', 'Jul 03 Fri 2015', 5, 'Admin', 'Y', 'Getting to/from Nepal', ' Getting to/from Nepal', ' Getting to/from Nepal', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', 'Getting to/from NepalRoute map11', '&nbsp;Getting to/from Nepal'),
(51, 8, 0, 'Nepalease Visa Information', 'nepalease-visa-information', 'Nepalease Visa Information', 'Nepalease Visa Information&nbsp; Day to', '&nbsp; Day to day itineary', 'Jul 05 Sun 2015', 10, 'Admin', 'Y', 'Nepalease Visa Information', '   Day to day itineary  ', ' Day to day itineary', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '&nbsp; Day to day itineary', 'Day to day itineary&nbsp;'),
(52, 8, 0, 'Festival', 'festival', 'Festival', 'Festival', '&nbsp;<span style="font-family: Roboto, sans-serif; font-size: 14px; line-height: 32px; text-align: justify; background-color: rgb(186, 231, 255);">Festival</span>', 'Jul 06 Mon 2015', 15, 'Admin', 'Y', 'Festival', ' Alliance treks & expedition arranges Nepal trekking, Trekking in Nepal, Nepal treks, Wildlife tour, Whitewater rafting', 'Nepal trekking, Trekking in Nepal, Nepal treks, Everest trekking, Everest trek, Everest base camp trekking, Annapurna trek, Annapurna trekking, Langtang trek, Langtang trekking, Dolpo Trek, Mustang trek, Kanchanjunga trek, Rara Trek, Ganesh Himal Trek, Ro', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '&nbsp;Festival', '&nbsp;<span style="font-family: Roboto, sans-serif; font-size: 14px; line-height: 32px; text-align: justify; background-color: rgb(186, 231, 255);">Festival</span>'),
(53, 8, 0, ' Trekking Permit', '-trekking-permit', '  Trekking Permit', '&nbsp; Trekking Permit', '&nbsp;&nbsp;&nbsp;Trekking Permit', 'Jul 06 Mon 2015', 20, 'Admin', 'Y', ' Trekking Permit', '  Trekking Permit', '  Trekking Permit', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', 'Trekking Permit&nbsp;', '&nbsp; Trekking Permit'),
(54, 8, 0, 'When to visit Nepal', 'cfaejlwcawhen-to-visit-nepal', 'When to visit Nepal', '&nbsp;When to visit Nepal', '&nbsp;When to visit Nepal', 'Jul 06 Mon 2015', 25, 'Admin', 'Y', 'When to visit Nepal', 'When to visit Nepal', 'When to visit Nepal', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', 'When to visit Nepal&nbsp;', 'When to visit Nepal&nbsp;');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `sirname` varchar(250) COLLATE utf8_bin NOT NULL,
  `address` varchar(250) COLLATE utf8_bin NOT NULL,
  `city` varchar(150) COLLATE utf8_bin NOT NULL,
  `country` varchar(250) COLLATE utf8_bin NOT NULL,
  `postal_code` varchar(250) COLLATE utf8_bin NOT NULL,
  `id_card` varchar(15) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `telephone` varchar(15) COLLATE utf8_bin NOT NULL,
  `message` text COLLATE utf8_bin NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `order_by` varchar(4) NOT NULL DEFAULT 'DESC',
  `howmany` varchar(20) NOT NULL,
  `is_active` char(1) DEFAULT NULL,
  `ext` char(1) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `parent_id`, `name`, `order_by`, `howmany`, `is_active`, `ext`, `description`) VALUES
(1, 0, 'Homepage Slider', 'DESC', '10', 'Y', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `glance`
--

CREATE TABLE IF NOT EXISTS `glance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `descrip` text,
  `myfile` char(3) NOT NULL,
  `is_active` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `glance`
--

INSERT INTO `glance` (`id`, `content_id`, `title`, `descrip`, `myfile`, `is_active`) VALUES
(1, 15, 'Route map', 'Route map', '', 'Y'),
(2, 15, 'Day to day itineary', 'Day to day itineary', '', 'Y'),
(3, 15, ' Cost details', ' Cost details', '', 'Y'),
(4, 15, ' What is included', ' What is included', '', 'Y'),
(5, 15, 'Accomodation', 'Accomodation', '', 'Y'),
(6, 15, ' What is not included', ' What is not included', '', 'Y'),
(7, 15, 'Meals', 'Meals', '', 'Y'),
(8, 15, 'Best seasons', '<span style="font-family: Roboto, sans-serif; font-size: 14px; line-height: 23px; text-align: justify; background-color: rgb(254, 255, 218);">Best seasons</span>', '', 'Y'),
(9, 15, ' Equipmemt and packing', '&nbsp;<span style="font-family: Roboto, sans-serif; font-size: 14px; line-height: 23px; text-align: justify; background-color: rgb(254, 255, 218);">&nbsp;Equipmemt and packing</span>', '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `order_by` varchar(4) NOT NULL DEFAULT 'DESC',
  `howmany` varchar(20) NOT NULL,
  `parent_id` varchar(500) NOT NULL,
  `is_active` char(1) NOT NULL DEFAULT 'Y',
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `order_by`, `howmany`, `parent_id`, `is_active`, `added_date`) VALUES
(1, 'Main Menu', 'ASC', '30', '0', 'Y', '2015-06-21 10:37:55'),
(2, 'Top Menu', 'ASC', '5', '0', 'Y', '2015-06-22 07:46:21'),
(3, 'Rounded Treks', 'DESC', '4', '0', 'Y', '2015-06-22 07:54:29'),
(4, 'HEARTLY WELCOME ', 'DESC', '1', '0', 'Y', '2015-06-22 08:09:33'),
(5, 'Our Best seller', 'DESC', '6', '0', 'Y', '2015-06-22 08:37:42'),
(6, 'Testimonial', 'DESC', '1', '0', 'Y', '2015-06-22 11:06:33'),
(7, 'Our Services', 'DESC', '16', '0', 'Y', '2015-06-25 07:50:42'),
(8, ' Traveller Information', 'DESC', '6', '0', 'Y', '2015-07-03 09:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` text NOT NULL,
  `caption` text,
  `is_active` char(1) DEFAULT NULL,
  `ext` char(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `gallery_id`, `title`, `url`, `caption`, `is_active`, `ext`) VALUES
(1, 1, 'Photo1', '', '&nbsp;', 'Y', 'jpg'),
(2, 1, 'Photo2', '', '&nbsp;', 'Y', 'jpeg'),
(3, 1, 'Photo3', '', '&nbsp;', 'Y', 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE IF NOT EXISTS `img` (
  `packages` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `country` varchar(20) NOT NULL,
  `description` mediumtext NOT NULL,
  `is_active` char(1) DEFAULT NULL,
  `ext` char(3) DEFAULT NULL,
  `amonths` varchar(10) NOT NULL,
  `aday` varchar(2) NOT NULL,
  `ayear` varchar(4) NOT NULL,
  `dmonths` varchar(10) NOT NULL,
  `dday` varchar(2) NOT NULL,
  `dyear` varchar(4) NOT NULL,
  `airlines` varchar(255) NOT NULL,
  `flightno` varchar(10) NOT NULL,
  `pickup` varchar(3) NOT NULL,
  `pamentmode` varchar(100) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `likebox`
--

CREATE TABLE IF NOT EXISTS `likebox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fb_id` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `url` char(11) DEFAULT NULL,
  `caption` text,
  `is_active` char(1) DEFAULT NULL,
  `ext` char(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` text,
  `is_active` char(1) DEFAULT NULL,
  `ext` char(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `link_id`, `title`, `url`, `is_active`, `ext`) VALUES
(3, 1, 'Nepal Logo', 'http://', 'Y', 'png'),
(4, 1, 'NTB', 'http://welcomenepal.com/promotional/', 'Y', 'jpg'),
(5, 1, 'nepalmountaineering', 'http://www.nepalmountaineering.org/', 'Y', 'png'),
(6, 1, 'TAN', 'http://www.taan.org.np/', 'Y', 'jpg'),
(7, 1, 'NATTA', 'http://www.natta.org.np/', 'Y', 'png'),
(8, 1, 'gototrek', 'http://www.gototrek.com/', 'Y', 'png');

-- --------------------------------------------------------

--
-- Table structure for table `link_album`
--

CREATE TABLE IF NOT EXISTS `link_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `is_active` char(1) DEFAULT NULL,
  `ext` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `link_album`
--

INSERT INTO `link_album` (`id`, `parent_id`, `name`, `description`, `is_active`, `ext`) VALUES
(1, 0, 'We are Affilated with', '&nbsp;', 'Y', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `middlead`
--

CREATE TABLE IF NOT EXISTS `middlead` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_active` char(1) DEFAULT NULL,
  `ext` char(1) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `middlead`
--

INSERT INTO `middlead` (`id`, `parent_id`, `name`, `is_active`, `ext`, `description`) VALUES
(1, 0, 'Downloads', 'Y', NULL, '&nbsp;');

-- --------------------------------------------------------

--
-- Table structure for table `middleadvert`
--

CREATE TABLE IF NOT EXISTS `middleadvert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `middlead_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `caption` text,
  `post` varchar(500) NOT NULL,
  `is_active` char(1) DEFAULT NULL,
  `ext` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `middleadvert`
--

INSERT INTO `middleadvert` (`id`, `middlead_id`, `title`, `url`, `caption`, `post`, `is_active`, `ext`) VALUES
(1, 1, 'Business Card', NULL, NULL, '', 'Y', 'jpg'),
(2, 1, 'E-Brousher', NULL, NULL, '', 'Y', 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE IF NOT EXISTS `social` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facebook` text,
  `title` varchar(255) NOT NULL,
  `youtube` text NOT NULL,
  `twitter` varchar(500) NOT NULL,
  `linkin` varchar(500) NOT NULL,
  `flicker` varchar(500) NOT NULL,
  `sharethis` varchar(500) NOT NULL,
  `rss` varchar(500) NOT NULL,
  `is_active` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `facebook`, `title`, `youtube`, `twitter`, `linkin`, `flicker`, `sharethis`, `rss`, `is_active`) VALUES
(1, 'https://www.facebook.com/', 'Social Media', 'https://www.youtube.com/', 'https://twitter.com/', '', '', '', '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--

CREATE TABLE IF NOT EXISTS `users1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `adress` varchar(500) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `is_active` char(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users1`
--

INSERT INTO `users1` (`id`, `name`, `username`, `email`, `adress`, `password`, `is_active`) VALUES
(1, 'Administrator', 'admin', 'admin@admin.com', 'Kathamndu', '21232f297a57a5a743894a0e4a801fc3', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `is_active` char(1) DEFAULT NULL,
  `ext` char(1) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `parent_id`, `name`, `is_active`, `ext`, `description`) VALUES
(1, 0, 'Video', 'Y', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `caption` text,
  `is_active` char(1) DEFAULT NULL,
  `ext` char(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video_id`, `title`, `url`, `caption`, `is_active`, `ext`) VALUES
(1, 1, 'Journey To Nepal ( Full Album )', 'KpraoWWzNBY', 'Journey To Nepal ( Full Album )', 'Y', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
