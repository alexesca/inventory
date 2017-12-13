-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 13, 2017 at 07:58 AM
-- Server version: 5.7.19
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
-- Database: `acme`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `categoryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(30) NOT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=292 DEFAULT CHARSET=latin1 COMMENT='Category classifications of inventory items';

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`) VALUES
(1, 'Cannon'),
(2, 'Explosive'),
(3, 'Misc'),
(4, 'Rocket'),
(5, 'Trap'),
(289, 'dsad'),
(290, 'Acme'),
(291, 'GUN');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `clientId` int(11) NOT NULL AUTO_INCREMENT,
  `clientFirstname` varchar(15) NOT NULL,
  `clientLastname` varchar(25) NOT NULL,
  `clientEmail` varchar(40) NOT NULL,
  `clientPassword` varchar(255) NOT NULL,
  `clientLevel` enum('1','2','3','') DEFAULT '1',
  `comments` text,
  PRIMARY KEY (`clientId`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientId`, `clientFirstname`, `clientLastname`, `clientEmail`, `clientPassword`, `clientLevel`, `comments`) VALUES
(1, 'Tony', 'Stark', 'tony@starkent.com', 'Iam1ronM@n', '1', 'I am the real Ironman'),
(2, 'Tony', 'Stark', 'tony@starkent.com', 'Iam1ronM@n', '3', 'I am the real Ironman'),
(3, 'Tony', 'Stark', 'tony@starkent.com', 'Iam1ronM@n', '1', 'I am the real Ironman'),
(4, 'alex', 'moreno', 'alex@alex.com', '323wewewqewqewqe', '1', ''),
(5, 'Alexander', 'Escamilla', 'alex@gmail.com', '1', '1', NULL),
(6, 'Alexand', 'Escam', 'alex@gmail.co', '$2y$10$oQHnYBTLkPymqdflJ8K.UOG4a6dsj2WYnr9cObkLCRmyqn/mUx2LW', '1', NULL),
(7, 'Escamill', 'Miguel', 'miguelk@GMAIL.COM', '$2y$10$91X4tzCGXNZfsQltKY0To.M.upE6NuuqfDxaX9Dm.GYXEn1UmnSh.', '1', NULL),
(8, 'Nancy', 'Villegas', 'nancy@gmail.com', '$2y$10$odujY8gWKP8NFaaHZIWCVuOC5vaxxBBBEO1Ct5QVJ9j0Q9f8vRVWe', '1', NULL),
(9, 'Alexander', 'Escamilla', 'ALEXESCAMORE@GMAIL.COM', '$2y$10$KCtjtqVAeCjUMzDZs8ChHO10Ic0TnpmGSIZggU3OMPWlTtTElmkPe', '1', NULL),
(10, 'Mike', 'Miker', 'mike@gmail.com', '$2y$10$uFjIoeTAJhPk3idXNnDGyeEWIZcAU5teVPARSNflr3KYm.pT65Ese', '1', NULL),
(11, 'migue', 'migue', 'migue@gmail.com', '$2y$10$esVp07mJC9GpWdMaaon/ROaBlslDi50q3mqXFJ38qB4AtsakL58Fq', '1', NULL),
(12, 'mbappe', 'mbappe', 'm@gmail.com', '$2y$10$7jvI9Av4c5P9HsBO3IB9Hu43pUongjGFVxgKa1p2LUTVDvshwEM1e', '1', NULL),
(13, 'Administrator', 'of the servers', 'admin@cit336.net', '$2y$10$6Joo1W6z9aB6thDweew1Gu7iKSw/5az908zOf4F2cKDuS2nGfH4NC', '3', NULL),
(14, 'Carlos', 'Tenorio', 'carlos@gmail.com', '$2y$10$ImnxHGZOUYVb73u.qDfcAOOKddeXkI2Y57MbaGIRg0IP.iz5FQRKm', '1', NULL),
(15, 'Pedro', 'Peter', 'pedro@gmail.com', '$2y$10$xIa15ZkjrbfUKXDJYKAT..dBmClpf6Qut5WF9D4C37tjhU.//KnK6', '1', NULL),
(16, 'Cristiano', 'Ronaldo', 'cristianoRonaldo@gmail.com', '$2y$10$6o9ubbwCn2SiWC9jynN0R.dyrCE1Xc05Cd03nMBgj.v4hTnh.WNVq', '1', NULL),
(17, 'qwerty', 'asdfgh', 'qwerty@gm.com', '$2y$10$oBVuzYT.zMlnkRtZbtGFTeog7.2lZyZnRKiV2LQLIvNsdim70LFY6', '1', NULL),
(18, 'Robert', 'Robertson', 'robert@g.com', '$2y$10$fB5qhnvHdQzkXYHsPgWC7.nVSR4e0mVy/qh3C3XHiwumiL63nHB4G', '1', NULL),
(19, 'Alexander', 'Escamilla', 'ALEXESCAORE@GMAIL.COM', '$2y$10$6ydXYwtNIwWQvKxkK3rwGuvBGqzIFYFkWdvc.KhBYP.djXCxo9O72', '1', NULL),
(20, 'Alexander', 'Escamilla', 'io@GMAIL.COM', '$2y$10$BjTSFxC/RYaV4A8D5Qo71OSKv52kdGfId4faUaECZECQ6PXbm0T42', '1', NULL),
(21, 'Alexander', 'Escamilla', 'opo@GMAIL.COM', '$2y$10$LLK.cIzA0A0uV0KROUDUae.LPTcemO4fV7m66izjWtfLugW.3ycIG', '1', NULL),
(22, 'Alexander', 'Escamilla', 'jjj@GMAIL.COM', '$2y$10$CThJXvjKztikjqBPw90OneJnujoRZz6QtTutDad.EUA7wuZrZK8Bq', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `imgId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `invId` int(10) NOT NULL,
  `imgName` varchar(100) NOT NULL,
  `imgPath` int(150) NOT NULL,
  `imgDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`imgId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `invId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `invName` varchar(50) NOT NULL DEFAULT '',
  `invDescription` text NOT NULL,
  `invImage` varchar(50) NOT NULL DEFAULT '',
  `invThumbnail` varchar(50) NOT NULL DEFAULT '',
  `invPrice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `invStock` smallint(6) NOT NULL DEFAULT '0',
  `invSize` smallint(6) NOT NULL DEFAULT '0',
  `invWeight` smallint(6) NOT NULL DEFAULT '0',
  `invLocation` varchar(35) NOT NULL DEFAULT '',
  `categoryId` int(10) UNSIGNED NOT NULL,
  `invVendor` varchar(20) NOT NULL DEFAULT '',
  `invStyle` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`invId`),
  KEY `categoryId` (`categoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1 COMMENT='Acme Inc. Inventory Table';

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invId`, `invName`, `invDescription`, `invImage`, `invThumbnail`, `invPrice`, `invStock`, `invSize`, `invWeight`, `invLocation`, `categoryId`, `invVendor`, `invStyle`) VALUES
(2, 'Back-mounted Rocket', 'Rocket for multiple purposes. This can be launched independently to deliver a payload or strapped on to help get you to where you want to be FAST!!! Really Fast!', '/acme/images/products/rocket.png', '/acme/images/products/rocket-tn.png', '1320.00', 5, 60, 90, 'California', 4, 'Goddard', 'metal'),
(3, 'Mortar', 'Our Mortar is very powerful. This cannon can launch a projectile or bomb 3 miles. Made of solid steel and mounted on cement or metal stands [not included].', '/acme/images/products/mortar.jpg', '/acme/images/products/mortar-tn.jpg', '1500.00', 26, 250, 750, 'San Jose', 1, 'Smith & Wesson', 'Metal'),
(4, 'Catapult', 'Our best wooden catapult. Ideal for hurling objects for up to 1000 yards. Payloads of up to 300 lbs.', '/acme/images/products/catapult.png', '/acme/images/products/catapult-tn.png', '2500.00', 4, 1569, 400, 'Cedar Point, IO', 1, 'Wooden Creations', 'Wood'),
(5, 'Female RoadRuner Cutout', 'This carbon fiber backed cutout of a female roadrunner is sure to catch the eye of any male roadrunner.', '/acme/images/products/roadrunner.jpg', '/acme/images/products/roadrunner-tn.jpg', '20.00', 500, 27, 2, 'San Jose', 5, 'Picture Perfect', 'Carbon Fiber'),
(6, 'Giant Mouse Trap', 'Our big mouse trap. This trap is multifunctional. It can be used to catch dogs, mountain lions, road runners or even muskrats. Must be staked for larger varmints [stakes not included] and baited with approptiate bait [sold seperately].\r\n', '/acme/images/products/trap.jpg', '/acme/images/products/trap-tn.jpg', '20.00', 34, 470, 28, 'Cedar Point, IO', 5, 'Rodent Control', 'Wood'),
(7, 'Instant Hole', 'Instant hole - Wonderful for creating the appearance of openings.', '/acme/images/products/hole.png', '/acme/images/products/hole-tn.png', '25.00', 269, 24, 2, 'San Jose', 3, 'Hidden Valley', 'Ether'),
(8, 'Koenigsegg CCX', 'This high performance car is sure to get you where you are going fast. It holds the production car land speed record at an amazing 250mph.', '/acme/images/products/no-image.png', '/acme/images/products/no-image.png', '500000.00', 1, 25000, 3000, 'San Jose', 3, 'Koenigsegg', 'Metal'),
(9, 'Large Anvil', '50 lb. Anvil - perfect for any task requireing lots of weight. Made of solid, tempered steel.', '/acme/images/products/anvil.png', '/acme/images/products/anvil-tn.png', '150.00', 15, 80, 50, 'San Jose', 5, 'Steel Made', 'Metal'),
(10, 'Medium Anvil', 'This solid iron 35 lb. anvil is sure to crush anything under it and provide a solid surface for all metal on it.', '/acme/images/products/anvil.png', '/acme/images/products/anvil-tn.png', '65.00', 5000, 60, 35, 'San Jose', 5, 'Steel Made', 'Metal'),
(11, 'Monster Rubber Band', 'These are not tiny rubber bands. These are MONSTERS! These bands can stop a train locamotive or be used as a slingshot for cows. Only the best materials are used!', '/acme/images/products/rubberband.jpg', '/acme/images/products/rubberband-tn.jpg', '4.00', 4589, 75, 1, 'Cedar Point, IO', 3, 'Rubbermaid', 'Rubber'),
(12, 'Mallet', 'Ten pound mallet for bonking roadrunners on the head. Can also be used for bunny rabbits.', '/acme/images/products/mallet.png', '/acme/images/products/mallet-tn.png', '25.00', 100, 36, 10, 'Cedar Point, IA', 3, 'Wooden Creations', 'Wood'),
(13, 'TNT', 'The biggest bang for your buck with our nitro-based TNT. Price is per stick.', '/acme/images/products/tnt.png', '/acme/images/products/tnt-tn.png', '10.00', 1000, 25, 2, 'San Jose', 2, 'Nobel Enterprises', 'Plastic'),
(14, 'Roadrunner Custom Bird Seed Mix', 'Our best varmint seed mix - varmints on two or four legs can\'t resist this mix. Contains meat, nuts, cereals and our own special ingredient. Guaranteed to bring them in. Can be used with our monster trap.', '/acme/images/no-image.png', '/acme/images/no-image.png', '8.00', 150, 24, 3, 'San Jose', 5, 'Acme', 'Plastic'),
(15, 'Grand Piano', 'This upright grand piano is guaranteed to play well and smash anything beneath it if dropped from a height.', '/acme/images/products/piano.jpg', '/acme/images/products/piano-tn.jpg', '3500.00', 36, 500, 1200, 'Cedar Point, IA', 3, 'Wulitzer', 'Wood'),
(16, 'Crash Helmet', 'This carbon fiber and plastic helmet is the ultimate in protection for your head. comes in assorted colors.', '/acme/images/products/helmet.png', '/acme/images/products/helmet-tn.png', '100.00', 25, 48, 9, 'San Jose', 3, 'Suzuki', 'Carbon Fiber'),
(17, 'Nylon Rope', 'This nylon rope is ideal for all uses. Each rope is the highest quality nylon and comes in 100 foot lengths.', '/acme/images/products/rope.jpg', '/acme/images/products/rope-tn.jpg', '15.00', 200, 200, 6, 'San Jose', 3, 'Marina Sales', 'Nylon'),
(18, 'Sticky Fence', 'This fence is covered with Gorilla Glue and is guaranteed to stick to anything that touches it and is sure to hold it tight.', '/acme/images/products/fence.png', '/acme/images/products/fence-tn.png', '75.00', 15, 48, 2, 'San Jose', 3, 'Acme', 'Nylon'),
(19, 'Small Bomb', 'Bomb with a fuse - A little old fashioned, but highly effective. This bomb has the ability to devistate anything within 30 feet.', '/acme/images/products/bomb.png', '/acme/images/products/bomb-tn.png', '275.00', 58, 30, 12, 'San Jose', 2, 'Nobel Enterprises', 'Metal'),
(20, 'Large Mortar', 'This mortar is great for getting over those large mountains that get in the way.', '/acme/images/products/mortar.jpg', '/acme/images/products/mortar-tn.jpg', '125.00', 2, 207, 87, 'Las Vegas', 1, 'Mortar Baby', 'Metal'),
(22, 'Rubber Boa', 'Realistic', '/acme/images/products/no-image.png', '/acme/images/products/no-image.png', '12.00', 3, 90, 2, 'Bangkok', 7, 'Thai Novelties', 'Rubber');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `reviewId` int(11) NOT NULL AUTO_INCREMENT,
  `reviewText` text NOT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `invId` int(11) NOT NULL,
  `clientId` int(11) NOT NULL,
  PRIMARY KEY (`reviewId`),
  KEY `clientId` (`clientId`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewId`, `reviewText`, `reviewDate`, `invId`, `clientId`) VALUES
(3, 'Alex', '2017-12-11 20:30:23', 9, 13),
(5, 'Alex', '2017-12-11 20:36:24', 9, 13),
(6, 'Alex', '2017-12-11 20:41:12', 9, 13),
(7, 'Alex', '2017-12-11 20:43:41', 9, 13),
(8, 'Alex', '2017-12-11 20:45:03', 9, 13),
(12, 'dfsafdsfdf', '2017-12-11 20:54:22', 9, 13),
(13, 'dfsafdsfdf', '2017-12-11 21:05:23', 9, 13),
(14, 'dfsafdsfdf', '2017-12-11 21:05:48', 9, 13),
(15, 'dfsafdsfdf', '2017-12-12 00:34:23', 9, 13),
(16, 'dfsafdsfdf', '2017-12-12 00:35:18', 9, 13),
(17, 'dfsafdsfdf', '2017-12-12 00:35:46', 9, 13),
(26, 'fdsfdf', '2017-12-12 06:36:41', 10, 12),
(27, '78', '2017-12-12 06:40:15', 9, 12),
(28, '78', '2017-12-12 06:40:33', 9, 12),
(33, 'First bird review of the night', '2017-12-13 06:26:14', 5, 13),
(34, 'heheh the trap crud review', '2017-12-13 07:05:03', 6, 13),
(35, 'heheh the trap crud review', '2017-12-13 07:05:03', 6, 13),
(36, 'the second trap review with header', '2017-12-13 07:08:46', 6, 13),
(37, 'dsdasd', '2017-12-13 07:09:15', 5, 13),
(38, 'sdsad', '2017-12-13 07:09:48', 6, 13),
(39, 'dasdsadasdasd dkasdjlkasjd asdjasl djsal djsal djlas djlsa djlas dasld', '2017-12-13 07:10:15', 5, 13),
(40, 'dasdsadsadsad', '2017-12-13 07:12:13', 5, 13),
(41, 'dasdsad', '2017-12-13 07:13:33', 5, 13),
(42, 'Hey. Here is a review', '2017-12-13 07:40:57', 5, 14);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`clientId`) REFERENCES `clients` (`clientId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
