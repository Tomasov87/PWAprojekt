-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 04:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vijesti_portal`
--
CREATE DATABASE IF NOT EXISTS `vijesti_portal` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `vijesti_portal`;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'john_doe', 'johns_password', 'john@example.com', '2024-06-07 12:59:49'),
(2, 'toma', 'tom', 'tt@example.com', '2024-06-07 13:03:51'),
(4, 'tomaaaaaaaaaaaaaaaaaaa', 'tom', '', '2024-06-07 13:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

DROP TABLE IF EXISTS `vijesti`;
CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `title`, `description`, `category`, `image_path`, `created_at`) VALUES
(29, 'LUKA BOZIC', 'LUKA BOZIC MVP 23/24', 'sport', 'images/slika2.jpg', '2024-06-09 09:39:17'),
(30, 'REAL MADRID', 'Luka upisao 6. naslov prvaka', 'sport', 'images/slika1.jpg', '2024-06-09 09:42:04'),
(31, 'Magični Alcaraz', 'Dječak 2003. godiste, parira Đokoviću', 'sport', 'images/slika3.jpg', '2024-06-09 09:42:46'),
(32, 'iPhone 8 plus', 'Najveći do sad', 'tehnologija', 'images/slika6.jpg', '2024-06-09 09:43:21'),
(33, 'iPhone 13', 'Spoj jednostavnosti i moći', 'tehnologija', 'images/slika5.jpg', '2024-06-09 09:43:54'),
(34, 'iPhone 15 pro max', 'Jednom riječi, zvijer!', 'tehnologija', 'images/slika4.jpg', '2024-06-09 09:44:32'),
(35, 'ZADAR PRVAK HRV', 'Zadru je bilo potrebno 5 utakmica da savlada Split', 'sport', 'images/slika2.jpg', '2024-06-09 09:46:29'),
(36, 'Mbappe vs Modric', 'Mbappe nemoćan', 'sport', 'images/slika1.jpg', '2024-06-09 09:58:34'),
(37, 'Grande Luka', 'Luka najveći u povijesti', 'sport', 'images/slika1.jpg', '2024-06-09 10:08:03'),
(38, 'Veliki Alcaraz', 'Nasljednik Novaka Đokovića', 'sport', 'images/slika3.jpg', '2024-06-09 10:12:21'),
(39, 'Nevjorovatan', 'Luka Bozic MVP', 'sport', 'images/slika2.jpg', '2024-06-09 10:50:15'),
(40, 'Luka Modric', 'Najveci u povijesti igre', 'sport', 'images/slika1.jpg', '2024-06-09 10:53:46'),
(41, 'Tenis', 'hahahahhahaha', 'sport', 'images/slika3.jpg', '2024-06-10 14:15:52'),
(42, 'iPhone 17', 'Iphoneeeeweeee', 'tehnologija', 'images/slika6.jpg', '2024-06-10 14:19:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
