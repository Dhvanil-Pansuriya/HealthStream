-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2023 at 05:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthstream`
--

-- --------------------------------------------------------

--
-- Table structure for table `assistant`
--

CREATE TABLE `assistant` (
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assistant`
--

INSERT INTO `assistant` (`name`, `email`, `phonenumber`, `password`, `datetime`) VALUES
('Raman', 'raman@gmail.com', '258147963', '12345', '2023-10-05 05:18:05');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `name` varchar(125) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(30) NOT NULL,
  `specialist` varchar(200) NOT NULL,
  `experience` varchar(125) NOT NULL,
  `doctorid` varchar(30) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `password` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`name`, `email`, `phonenumber`, `specialist`, `experience`, `doctorid`, `description`, `password`) VALUES
('Harshad Maheta', 'mrharshad@gmail.com', '741258963', 'Heart', '3 Year\'s of Expirince', '20031', 'Hello,\r\nI am Dr. Harshad Maheta\r\nI am Heart specialist in this hospital with 3 year\'s of experience ', '12345'),
('Charan Sharma', 'mrcharan@gmail.com', '365897412', 'Eye', '4 Years of Experience', '27731', 'Hello,\r\nI am Dr. Charan Sharma\r\nI am Eye specialist in this hospital with 3 year\'s of experience ', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `sudo-admin`
--

CREATE TABLE `sudo-admin` (
  `name` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sudo-admin`
--

INSERT INTO `sudo-admin` (`name`, `password`) VALUES
('Dhvanil', 'Dhvanil@123');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `registered_date` datetime NOT NULL,
  `password` varchar(32) NOT NULL,
  `address` varchar(10000) NOT NULL,
  `allocateddoctor` varchar(100) NOT NULL,
  `disease` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `phonenumber`, `registered_date`, `password`, `address`, `allocateddoctor`, `disease`) VALUES
('RohanBhai', 'rohan@gmail.com', '123456789', '2023-10-05 10:51:09', '12345', 'Baroda, Gujarat', 'Harshad Maheta ', 'Mini Heart Attack '),
('ManaliBen', 'manali@gmail.com', '321456987', '2023-10-05 10:51:59', '12345', 'Surat, Gujarat', 'Harshad Maheta ', 'Heart Pain'),
('ChagganBhai', 'chagan@gmail.com', '987456321', '2023-10-05 10:59:26', '12345', 'Baroda', 'Charan Sharma ', 'Eye Flue');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
