-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2021 at 03:41 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id_grade` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `grade` int(2) NOT NULL,
  `time_grade` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id_grade`, `id_user`, `name`, `grade`, `time_grade`) VALUES
(1, 2, 'student1', 4, '2021-07-12 10:32:46'),
(2, 3, 'student2', 8, '2021-07-12 10:32:46'),
(3, 6, 'student5', 6, '2021-07-12 10:41:39'),
(4, 5, 'student4', 3, '2021-07-12 10:41:39'),
(5, 9, 'student8', 6, '2021-07-12 10:41:39'),
(6, 2, 'student1', 9, '2021-07-12 10:41:39'),
(7, 2, 'student1', 3, '2021-07-12 10:41:39'),
(8, 8, 'student7', 4, '2021-07-12 10:41:39'),
(9, 8, 'student7', 10, '2021-07-12 10:41:39'),
(10, 3, 'student2', 3, '2021-07-12 10:41:39'),
(11, 4, 'student3', 9, '2021-07-12 10:41:39'),
(12, 3, 'student2', 7, '2021-07-12 10:41:39'),
(13, 9, 'student8', 5, '2021-07-12 10:41:39'),
(14, 7, 'student6', 5, '2021-07-12 10:41:39'),
(15, 4, 'student3', 3, '2021-07-12 10:41:39'),
(16, 8, 'student7', 9, '2021-07-12 10:41:39'),
(17, 5, 'student4', 9, '2021-07-12 10:41:39'),
(18, 9, 'student8', 7, '2021-07-12 10:41:39'),
(19, 3, 'student2', 6, '2021-07-12 10:41:39'),
(20, 6, 'student5', 3, '2021-07-12 10:41:39'),
(21, 6, 'student5', 8, '2021-07-12 10:41:39'),
(22, 7, 'student6', 8, '2021-07-12 10:41:39'),
(23, 6, 'student5', 4, '2021-07-12 10:43:58'),
(24, 9, 'student8', 3, '2021-07-12 10:43:58'),
(25, 8, 'student7', 10, '2021-07-12 12:09:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `surname`, `email`, `password`, `active`) VALUES
(1, 'stud1', 'stud1', 'admin@gmail.com', '$2y$12$TrV/lk8RwHSs.cucw0mVGe6hHjoUg4YKCOYRvRYtZ1IbHWKJp8Mhi', 1),
(2, 'student1', 'student1', 'stud1@gmail.com', '$2y$12$plSJsBA97SZBPYHAcj.8T.BGui7HsNaxYuJYHSdPJri6qrTNwCN5m', 1),
(3, 'student2', 'student2', 'stud2@gmail.com', '$2y$12$LkwU9mYN4.FiIQpZfnwGuONxd147MZ8bOsK2ydNx34IgBZiXaT0HS', 1),
(4, 'student3', 'student3', 'stud3@gmail.com', '$2y$12$mo9FQn3jQj2gDJE2u6Dkve45JcC2QIYvXDeY1aNYBB6620S2xU136', 1),
(5, 'student4', 'student4', 'stud4@gmail.com', '$2y$12$Y3oQmuzOv02LLBoycxlKEulq0lL8Szf4HL2XEADGQK2dRJCVfp9iu', 1),
(6, 'student5', 'student5', 'stud5@org.com', '$2y$12$Z7vQ2nrk/nVs5BxfRJiZr.nfMMt8Pmfm.qRW6sOsAfU26ve./GExi', 1),
(7, 'student6', 'student6', 'stud6@org.rs', '$2y$12$GJaW7PUDXEwpH28DtrZCjOUmyAvsIKkGdbO.4kHh33Yb5Pa5h3fHS', 1),
(8, 'student7', 'student7', 'stud7@org.rs', '$2y$12$N5Yz3n7S/k0w7CRp0FFEu.9kouH9/XMyqARWJL96RKFz/iqzGqoBK', 1),
(9, 'student8', 'student8', 'stud8@com.org', '$2y$12$WrRse/FctfhEnr28ALW7P.P2nswICcmLYTBFJT4NKsZ1OQaIWaCDi', 1),
(10, 'student9', 'student9', 'stud9@gmail.com', '$2y$12$AWJaPvGhw8L7A3N7GS/k2O83U6RqTeSge7DhUAqb/bHtUGgwBrg8y', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id_grade`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id_grade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
