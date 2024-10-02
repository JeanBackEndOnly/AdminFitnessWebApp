-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2024 at 12:41 AM
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
-- Database: `kf_fitness_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `contract_id` int(11) NOT NULL,
  `members_id` int(11) NOT NULL,
  `contract_Renewal` date NOT NULL,
  `contract_Expiration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`contract_id`, `members_id`, `contract_Renewal`, `contract_Expiration`) VALUES
(43, 44, '2024-08-30', '2024-09-30'),
(45, 45, '2024-08-01', '2024-09-01'),
(46, 47, '2024-09-30', '2024-10-30'),
(47, 50, '2024-08-01', '2024-09-01'),
(48, 51, '2024-09-04', '2024-09-30'),
(49, 52, '2024-08-01', '2024-09-03');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `fullName` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `users_id`, `fullName`, `email`, `address`, `phone_no`, `gender`, `age`) VALUES
(44, 27, 'LUCAY-LUCAY ERIAL KATE', 'k8@gmai.com', 'EWAN KO PO', '09357745262', 'FEMALE', 22),
(45, 28, 'MARCO JEAN PAGOTAISIDRO', 'marcojean@gmail.com', 'MALAGUTAY', '09755684574', 'MALE', 20),
(46, 29, 'MARK LAURENZ BESIRA', 'mark@gmail.com', 'AYALA', '098899', 'MALE', 22),
(47, 30, 'DELLATAN JR. BRENDO', 'brando@gmail.com', 'LUYAHAN', '09357745262', 'MALE', 21),
(50, 33, 'akobatik ka bro?', 'akobatik@gmail.com', 'malay ko sayo', '09098079876', 'male', 20),
(51, 34, 'akobatik ka bro?!', 'haroldzkie23@gmail.com', 'malay ko sayo', '09098079876', 'male', 20),
(52, 35, 'akobatik ka bro?!!', 'haroldzkie233@gmail.com', 'malay ko sayo', '09098079876', 'male', 20);

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `plans_id` int(11) NOT NULL,
  `members_id` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `workout_day` varchar(20) NOT NULL,
  `diet_plan` text NOT NULL,
  `exercise` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `user_Role` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_Role`, `created_at`) VALUES
(1, 'a', '$2y$10$hfelQ/zMwYQLbi/Hi73abOl6BDnyBIawYbGHLtvkIhedbm7N.I8dW', 'admin', '2024-09-16 22:10:19'),
(27, 'keyt', '$2y$10$6lix5TMhrOMdK6Ys.goPpuZJbL7xENIU9oROXomZvi5KGsUx.Ebc2', 'members', '2024-09-28 00:40:59'),
(28, 'marco', '$2y$10$kddgjXobkROPwcNmU0hLse1lVBZestoefJm/dZoMz2GExT493NkOG', 'members', '2024-09-29 13:11:24'),
(29, 'mark', '$2y$10$nutnPA.E49Lxup8x3Dt7NufeUEIcd9tozCem4E1M4kPz2iMt/3W6m', 'members', '2024-09-29 13:11:45'),
(30, 'brando', '$2y$10$k5z8850d2OObURWuDel.0OenmD/B3CAR2BKoSSf9nPzpGgaeK2Pp.', 'members', '2024-09-29 13:12:09'),
(33, 'ngano', '$2y$10$MC2V1DpgKodB8txTSKQ6VOHz63QpCtMKxjoZ6Wq1DNOIH/M9I9Wh6', 'members', '2024-10-01 05:07:26'),
(34, 'abcd', '$2y$10$MCf7LiDcM0wk9fV7qm00puM2RtAQZcWGoTMGI.odUj4/P4mpTnXkK', 'members', '2024-10-01 05:08:04'),
(35, 'asdasd', '$2y$10$da3RKmZimEeZUt9AwwMgduYgvHbpy0fYH.m5EKxNAdvxxuwyYLB8u', 'members', '2024-10-01 05:08:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`contract_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`plans_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `contract_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `plans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
