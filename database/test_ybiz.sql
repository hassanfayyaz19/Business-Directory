-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 30, 2023 at 07:55 AM
-- Server version: 5.7.33
-- PHP Version: 8.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_ybiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `bizaddress`
--

CREATE TABLE `bizaddress` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `addNumber` varchar(100) NOT NULL,
  `addStreet` varchar(100) NOT NULL,
  `addCity` varchar(100) NOT NULL,
  `addState` varchar(100) NOT NULL,
  `zipCode` varchar(100) NOT NULL,
  `dateStarted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bizaddress`
--

INSERT INTO `bizaddress` (`id`, `user_id`, `addNumber`, `addStreet`, `addCity`, `addState`, `zipCode`, `dateStarted`, `updated_at`) VALUES
(1, 1, '204', 'Quod quisquam tempor', 'Magna vitae veniam ', 'Ipsa quas omnis id ', '44873', '2023-01-30 07:39:02', '2023-01-30 07:39:02'),
(2, 2, '986', 'Qui sint suscipit e', 'Vero at qui velit do', 'Aliquam incididunt i', '44873', '2023-01-30 07:39:33', '2023-01-30 07:39:33'),
(3, 3, '521', 'Ut architecto possim', 'Inventore qui tempor', 'Id nisi qui dolor d', '44873', '2023-01-30 07:40:12', '2023-01-30 07:40:12'),
(4, 4, '507', 'Debitis voluptas eli', 'Commodi qui ut quasi', 'Accusantium corrupti', '44873', '2023-01-30 07:40:43', '2023-01-30 07:40:43'),
(5, 6, '513', 'Maiores cupidatat qu', 'Eveniet do omnis mo', 'Cupiditate dolorem i', '44873', '2023-01-30 07:50:02', '2023-01-30 07:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `bizhours`
--

CREATE TABLE `bizhours` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `mon` varchar(100) NOT NULL,
  `tues` varchar(100) NOT NULL,
  `wed` varchar(100) NOT NULL,
  `thurs` varchar(100) NOT NULL,
  `fri` varchar(100) NOT NULL,
  `sat` varchar(100) NOT NULL,
  `sun` varchar(100) NOT NULL,
  `dateStarted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bizhours`
--

INSERT INTO `bizhours` (`id`, `user_id`, `mon`, `tues`, `wed`, `thurs`, `fri`, `sat`, `sun`, `dateStarted`, `updated_at`) VALUES
(1, 1, '13', '8', '25', '27', '8', '23', '5', '2023-01-30 07:39:06', '2023-01-30 07:39:06'),
(2, 2, '27', '23', '14', '23', '13', '10', '23', '2023-01-30 07:39:37', '2023-01-30 07:39:37'),
(3, 3, '13', '6', '21', '15', '15', '28', '17', '2023-01-30 07:40:16', '2023-01-30 07:40:16'),
(4, 4, '16', '5', '16', '27', '17', '28', '9', '2023-01-30 07:40:47', '2023-01-30 07:40:47'),
(5, 6, '9:00 AM to 5:00 PM', '9:00 AM to 5:00 PM', '9:00 AM to 5:00 PM', '9:00 AM to 5:00 PM', '9:00 AM to 5:00 PM', 'Closed', 'Closed', '2023-01-30 07:50:31', '2023-01-30 07:50:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cellPhone` varchar(100) NOT NULL,
  `bizPhone` varchar(100) NOT NULL,
  `coName` varchar(100) NOT NULL,
  `coImage` varchar(100) NOT NULL,
  `business_logo` varchar(255) DEFAULT NULL,
  `servLocation` varchar(100) NOT NULL,
  `bizDescription` text NOT NULL,
  `bizArea` varchar(100) NOT NULL,
  `dateStarted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FirstName`, `LastName`, `email`, `password`, `cellPhone`, `bizPhone`, `coName`, `coImage`, `business_logo`, `servLocation`, `bizDescription`, `bizArea`, `dateStarted`, `updated_at`) VALUES
(1, 'Yetta', 'Mcintosh', 'dovatefic@mailinator.com', 'Pa$$w0rd!', '+1 (638) 736-9819', '+1 (287) 361-5851', 'Oren Daugherty', 'assets/images/665d94de04b5a0220be57c649b87cc6a.jpg', NULL, 'Ipsum ratione ut mol', 'Et illum omnis saep', 'Nihil necessitatibus', '2023-01-30 02:38:51', '2023-01-30 02:38:51'),
(2, 'Amanda', 'Fields', 'zubirevug@mailinator.com', 'Pa$$w0rd!', '+1 (236) 407-8543', '+1 (106) 665-8127', 'Vivian Morrison', 'assets/images/665d94de04b5a0220be57c649b87cc6a.jpg', NULL, 'Sunt porro harum vel', 'Minus et autem vel q', 'Qui velit et tempora', '2023-01-30 02:39:24', '2023-01-30 02:39:24'),
(3, 'Ifeoma', 'Morrison', 'hemyfik@mailinator.com', 'Pa$$w0rd!', '+1 (514) 539-7667', '+1 (322) 563-4212', 'Nell Mckee', 'assets/images/665d94de04b5a0220be57c649b87cc6a.jpg', NULL, 'Illo qui ab molestia', 'Accusamus nihil dolo', 'Nulla asperiores sit', '2023-01-30 02:40:01', '2023-01-30 02:40:01'),
(4, 'Beau', 'Manning', 'pavohehixe@mailinator.com', 'Pa$$w0rd!', '+1 (848) 505-4564', '+1 (751) 802-6551', 'Rahim Soto', 'assets/images/665d94de04b5a0220be57c649b87cc6a.jpg', NULL, 'Est ipsa ea quia al', 'Sed sed lorem ipsa ', 'Recusandae Officia ', '2023-01-30 02:40:35', '2023-01-30 02:40:35'),
(5, 'Alana', 'Test', 'nelodeqi@mailinator.com', 'Pa$$w0rd!', '+1 (772) 116-3184', '+1 (351) 331-5809', 'Hanae Kelley', 'assets/images/1187b02cad6bdb5a41286788083f220e.png', NULL, 'Excepturi doloribus ', 'Odio odit magna dign', 'Et fugit obcaecati ', '2023-01-30 02:47:30', '2023-01-30 02:47:30'),
(6, 'Fleur', 'Test', 'coxozawire@mailinator.com', 'Pa$$w0rd!', '+1 (254) 155-1828', '+1 (199) 779-9653', 'Zeph Stokes', 'assets/images/2a8d92388f9956f8db32c4615984d4a6.png', NULL, 'Qui voluptatem non ', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci cumque dolorum ea fuga ipsam nulla, reprehenderit similique voluptatum! A adipisci deleniti dolorum excepturi, exercitationem expedita harum iusto maxime natus nostrum? Accusamus aliquid architecto autem blanditiis delectus deleniti dolores dolorum ducimus ea error est expedita facilis impedit, itaque maxime molestias non odio officia, pariatur quasi quia quo recusandae sapiente, sed sit soluta sunt ut! A ad aliquam consectetur consequuntur dolore eos, error fuga fugit harum in labore maiores, molestiae nihil officiis perferendis porro possimus quia, quibusdam quisquam rem repellendus reprehenderit sed similique soluta tempora totam voluptatem. Consequatur doloribus enim molestiae voluptatibus!', 'Eos numquam quis inv', '2023-01-30 02:49:35', '2023-01-30 02:49:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bizaddress`
--
ALTER TABLE `bizaddress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bizhours`
--
ALTER TABLE `bizhours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bizaddress`
--
ALTER TABLE `bizaddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bizhours`
--
ALTER TABLE `bizhours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
