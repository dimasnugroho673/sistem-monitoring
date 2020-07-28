-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2020 at 04:53 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmonitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `nama_client` varchar(255) NOT NULL,
  `gedung` varchar(30) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `simbol` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `ip`, `nama_client`, `gedung`, `status`, `simbol`) VALUES
(1, '10.1231', 'DACEN', 'A', 'down', '<svg height=\"50\" width=\"50\">\r\n		<circle cx=\"15\" cy=\"15\" r=\"10\" stroke-width=\"3\" fill=\"#DC3545\">\r\n	  </svg>'),
(2, '127.0.0.1', 'my pc', 'A', 'up', '<svg height=\"50\" width=\"50\">\r\n		<circle cx=\"15\" cy=\"15\" r=\"10\" stroke-width=\"3\" fill=\"#28A745\">\r\n	  </svg>'),
(3, '10.1231', 'pc orang', 'B', 'down', '<svg height=\"50\" width=\"50\">\r\n		<circle cx=\"15\" cy=\"15\" r=\"10\" stroke-width=\"3\" fill=\"#DC3545\">\r\n	  </svg>'),
(4, '10.5.130.141', 'my pc', 'A', 'up', '<svg height=\"50\" width=\"50\">\r\n		<circle cx=\"15\" cy=\"15\" r=\"10\" stroke-width=\"3\" fill=\"#28A745\">\r\n	  </svg>'),
(5, '192.168.1.1', 'wifi dimas', 'rumah dimas', 'up', '<svg height=\"50\" width=\"50\">\r\n		<circle cx=\"15\" cy=\"15\" r=\"10\" stroke-width=\"3\" fill=\"#28A745\">\r\n	  </svg>'),
(6, '12.21321.43', 'wifi dimas 2', 'rumah dimas', 'down', '<svg height=\"50\" width=\"50\">\r\n		<circle cx=\"15\" cy=\"15\" r=\"10\" stroke-width=\"3\" fill=\"#DC3545\">\r\n	  </svg>');

-- --------------------------------------------------------

--
-- Table structure for table `connection_speed`
--

CREATE TABLE `connection_speed` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `speed` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `connection_status`
--

CREATE TABLE `connection_status` (
  `id` bigint(20) NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `web_config`
--

CREATE TABLE `web_config` (
  `id_config` int(11) NOT NULL,
  `token_telegram` varchar(255) NOT NULL,
  `id_chat` varchar(255) NOT NULL,
  `latest_notif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_config`
--

INSERT INTO `web_config` (`id_config`, `token_telegram`, `id_chat`, `latest_notif`) VALUES
(1, '', '', '1595772033');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `connection_speed`
--
ALTER TABLE `connection_speed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `connection_status`
--
ALTER TABLE `connection_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_config`
--
ALTER TABLE `web_config`
  ADD PRIMARY KEY (`id_config`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `connection_speed`
--
ALTER TABLE `connection_speed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `connection_status`
--
ALTER TABLE `connection_status`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `web_config`
--
ALTER TABLE `web_config`
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
