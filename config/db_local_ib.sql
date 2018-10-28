-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Out-2018 às 11:35
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_local_ib`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ib_usersdata`
--

CREATE TABLE `ib_usersdata` (
  `usersData_id` int(11) NOT NULL,
  `usersData_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `usersData_account` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `usersData_pw` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usersData_balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ib_usersdata`
--
ALTER TABLE `ib_usersdata`
  ADD PRIMARY KEY (`usersData_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ib_usersdata`
--
ALTER TABLE `ib_usersdata`
  MODIFY `usersData_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
