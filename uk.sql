-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2025 at 07:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_number` double NOT NULL,
  `password` text NOT NULL,
  `is_active` int(11) NOT NULL,
  `user_role` text NOT NULL,
  `role_name` varchar(10) NOT NULL COMMENT 'user= U, Admin= A, super admin= SA, manager = M',
  `user_id` int(11) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `email`, `mobile_number`, `password`, `is_active`, `user_role`, `role_name`, `user_id`, `cdate`) VALUES
(1, 'admin', 'admin@gtalentpro.com', 0, '$2b$10$79XgX5kBC2yFwtr2FkfF9utMje0NF9Exg.P6QomqaM1uizRrU6Lsq', 0, '4', '', 1, '0000-00-00 00:00:00'),
(3, 'Satheesh Raam', 'satheesh.raam@gtalentpro.com', 9880236319, '$2b$10$OPcFgmOnFIo3f07at.5lGOU8ClfQNpRTPRuncnz.gwADWZoHnbg82', 1, '4', 'U', 0, '2022-03-10 07:29:17'),
(4, 'dinesh', 'dineshindn@gmail.com', 8667320634, '$2b$10$aF8KuGM4pLUrpvKUEfyWG.u7E47BrzKwUaPqa216PFvGfnqm2EfAC', 0, '4', 'U', 0, '2022-11-04 20:37:02'),
(5, 'saran', 'saran@gtalentpro.com', 9513300922, '$2b$10$ZQSd8iTDRlw.rm6srx3DS.kBime.hT92xg9p5LU2Qux/fC.Txc7CW', 0, '4', 'U', 0, '2022-11-04 20:37:02'),
(6, 'kamlesh', 'Kamlesh@gtalentpro.com', 0, '$2b$10$NAOg0j9Qdt/vz3Hzj0iWAOCpYZkjRniFdBhusDSaxbuicKzQn/Nt6', 0, 'U', 'U', 0, '2024-02-11 20:39:10'),
(7, 'vaidegi', 'Vaidegi@gtalentpro.com', 0, '$2b$10$PZXa6iAx/wtCKl5wzQQLHeoMk5J892SkIt8zyQQ.qErTRcvNB09Ie', 1, 'U', 'U', 0, '2024-02-11 20:39:10'),
(8, 'Krishna', 'Krishna@gtalentpro.com', 1234567890, '$2b$10$67DNdRTFcd5QXu3UZOoI2.WcpyShC9SiEpnOD70/HcPv86XhE4H/W', 1, 'U', 'U', 0, '2024-02-11 20:39:10'),
(9, 'Nagma', 'nagma@gtalentpro.com', 7259106943, '$2b$10$hY3YiS67TF6lfrSmNnO9hefPb7W/a7ILB6ywLG7DFfapjxXg4/ZQa', 1, 'U', 'U', 0, '2024-03-27 04:40:24'),
(10, 'Aarti', 'aarti.jadhav@gtalentpro.com', 1234567890, '$2b$10$mldflIGNSlSNhl4qYbvhdezMrvMBibDLdtK/g0/U8kwH9412epDb.', 0, 'U', 'U', 0, '2024-03-27 06:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit` enum('grams','kilograms','ml','litters','pieces') DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 Active, 1= Inactive',
  `user_id` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `quantity`, `unit`, `image_url`, `tag`, `description`, `status`, `user_id`, `created_date`) VALUES
(1, 'Tamizhi tech', 4444.00, 564, 'grams', NULL, 'New', '\r\ngdfg\r\n', 0, NULL, '2025-04-05 17:01:24'),
(2, '1', 1.00, 1, 'kilograms', '2', 'New', '<p>1</p>', 0, NULL, '2025-04-05 17:03:01'),
(3, '1', 1.00, 1, 'kilograms', NULL, 'New', '<p>1</p>', 0, 4, '2025-04-05 17:13:48'),
(4, '1', 1.00, 1, 'kilograms', NULL, 'New', '<p>1</p>', 0, 4, '2025-04-05 17:14:00'),
(5, '1', 1.00, 1, 'kilograms', NULL, 'New', '<p>1</p>', 0, 4, '2025-04-05 17:14:44'),
(6, '1', 1.00, 1, 'kilograms', NULL, 'New', '<p>1</p>', 0, 4, '2025-04-05 17:15:38'),
(7, '1', 1.00, 1, 'kilograms', NULL, 'New', '<p>1</p>', 0, 4, '2025-04-05 17:15:46'),
(8, '1', 1.00, 1, 'kilograms', NULL, 'New', '<p>1</p>', 0, 4, '2025-04-05 17:16:25'),
(9, '1', 1.00, 1, 'kilograms', NULL, 'New', '<p>1</p>', 0, 4, '2025-04-05 17:17:25'),
(10, 'product 2', 2.00, 150, 'kilograms', '4', 'New', '<ul><li>new products</li><li>test prodict</li><li>qa produs</li></ul>', 1, 4, '2025-04-05 17:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `name`, `created_date`) VALUES
(1, '1743874050_Asset 4ab.png', NULL),
(2, '1743874169_ChatGPT Image Apr 2, 2025, 06_33_20 PM.png', NULL),
(3, '1743874535_ChatGPT Image Apr 2, 2025, 06_33_20 PM.png', NULL),
(4, '1743875159_23075956489_9683f527da_z.jpg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
