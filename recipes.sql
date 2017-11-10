-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2017 at 08:09 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `c_email` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `c_pass` varchar(250) NOT NULL,
  `u_name` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `date_of_birth` varchar(50) NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `country` text NOT NULL,
  `gender` text NOT NULL,
  `p_o` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `new_recipe`
--

CREATE TABLE `new_recipe` (
  `id` int(10) NOT NULL,
  `post_title` varchar(250) NOT NULL,
  `post_image` varchar(250) NOT NULL,
  `post_author` varchar(250) NOT NULL,
  `post_date` date NOT NULL,
  `post_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_recipe`
--

INSERT INTO `new_recipe` (`id`, `post_title`, `post_image`, `post_author`, `post_date`, `post_desc`) VALUES
(0, 'Daal Chawal', 'DDAa.jpg', 'Kritee Sagar', '2017-11-09', '\r\n	Daal chawal is amazingly popular.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `c_email` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `c_pass` varchar(250) NOT NULL,
  `u_name` text NOT NULL,
  `address` text NOT NULL,
  `date_of_birth` varchar(50) NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `country` text NOT NULL,
  `gender` text NOT NULL,
  `p_o` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `l_name`, `email`, `c_email`, `pass`, `c_pass`, `u_name`, `address`, `date_of_birth`, `city`, `state`, `country`, `gender`, `p_o`) VALUES
(0, 'kritee', 'Sagar', 'kritee.sagar.lpu@gmail.com', 'kritee.sagar.lpu@gmail.com', 'kriteesagar', 'kriteesagar', 'kritee', '6th street, 3 apt', '12-08-1995', 'Ludhiana', 'Punjab', 'India', 'Female', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `new_recipe`
--
ALTER TABLE `new_recipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
