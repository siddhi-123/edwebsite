-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2023 at 02:54 PM
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
-- Database: `edwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `uname` varchar(10) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `email_id` varchar(250) NOT NULL,
  `pwd` varchar(1250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uname`, `fname`, `lname`, `email_id`, `pwd`) VALUES
('siddhis', 'Siddhi', 'Solanki', 'siddhimsolanki@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
('smita', 'Smita', 'Solanki', 'smita123@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `uname` varchar(250) NOT NULL,
  `image` varchar(100) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `file_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `uname`, `image`, `course_name`, `price`, `file_name`) VALUES
(1, 'siddhi', 'html.jpg', 'Full Stack Web Development', '499', 'htmlcourse.php');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `rname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sub` varchar(255) NOT NULL,
  `mess` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` varchar(100) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `content` varchar(500) NOT NULL,
  `overview_file` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `image`, `course_name`, `description`, `price`, `file_name`, `content`, `overview_file`) VALUES
('1', 'html.jpg', 'Full Stack Web Development', 'Front End Development - HTML CSS JAVASCRIPT.\r\nBack End Development - PHP SQL', '499', 'htmlcourse.php', 'Welcome to XACKTON, your go-to destination for top-notch custom website development services. By leveraging cutting-edge technologies such as HTML, CSS, and JavaScript, we ensure that your website stands out from the crowd.', 'fswd.php'),
('2', 'programming.jpg', 'Programming', 'SCRATCH, PYTHON, and C++', '499', 'programming.php', 'Welcome to XACKTON, where we go beyond traditional learning! We offer a diverse range of courses, including SCRATCH, PYTHON, and C++, ensuring that everyone can find the perfect fit.', 'technology.php'),
('3', 'networking.jpg', 'Basics of Security', 'Linux Networking', '399', 'networking.php', 'Discover the transformative power of Linux and Networking at XACKTON. Our cutting-edge courses are carefully crafted to empower students with comprehensive knowledge and practical skills.', 'cyber.php');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_tokens`
--

CREATE TABLE `oauth_tokens` (
  `id` int(11) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `provider_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oauth_tokens`
--

INSERT INTO `oauth_tokens` (`id`, `provider`, `provider_value`) VALUES
(1, 'google', '1//0g4k4izntkoAiCgYIARAAGBASNwF-L9IrzpQgUxY_UsfQT8wosCs-ncBkAr_WdchMMPEr79nJRaUuASTHIDbp5o9ZlT10x8MlnYM');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `email_id` varchar(250) NOT NULL,
  `token` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`email_id`, `token`) VALUES
('siddhimsolanki@gmail.com', 'fb372a585d0be4eb91d772547ff2c6b5d3e45325ba6a2d6c39a1e375279fbdf84f0dbe488ebec923979a54425697f3e008ec'),
('siddhimsolanki@gmail.com', 'c6796ccd4bd99aee9536099b06fb894037732253baa59bd8b45647805180a6a257e583064cc9970cabc83a4304005365ed8c'),
('siddhimsolanki@gmail.com', '259115dbeba2912cb7dec2a0588ca1aef78c78c305e064a999cf0dc5da63ba588477de96353468671746ece9185b0f49cd65'),
('siddhi.ms@somaiya.edu', '0659384ebf785fe4b83f09246133fe2a88e8f6cb4b99bd21a7ff811ce914b881b8a32de2f56e1818d68be75ac5b3a8ec73bf'),
('siddhi.ms@somaiya.edu', '32e3a8c2f32e98ab39c1abd127bab972d7898e66c432098a5758348da4155696a71a68752aea32dee63c0c77858fd074e963'),
('siddhimsolanki@gmail.com', '9f679985758588e6c1353f0333c5227b1df7d688bc22c1fd3fbc14745641b9c2b5229617acace85dcf50b39732721f255889'),
('siddhimsolanki@gmail.com', '02f33957b4e5b4c94b8d519cfce6c2fe6651649660779c1b527aa28d48fd9a3ca9d55f4aceb76ed638b1e4c5553ead13d5ad');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `uname` varchar(10) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `email_id` varchar(250) NOT NULL,
  `pwd` varchar(250) NOT NULL,
  `cpwd` varchar(250) NOT NULL,
  `role` varchar(5) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `fname`, `lname`, `email_id`, `pwd`, `cpwd`, `role`, `verification_code`, `is_verified`) VALUES
(1, 'siddhi', 'Siddhi', 'Solanki', 'siddhimsolanki@gmail.com', 'Siddhi', 'Siddhi', 'user', '2f9080ceb9dd49e43b770e07b06d383a', 1),
(2, 'siddhis', 'jhk', 'jhk', 'khbk', 'kjb', 'kjb', 'user', 'c383c9993f07121fe6c90fef3addfbf5', 1),
(19, 'avyan', 'Avyan', 'Priyadarshi', 'siddhi.ms@somaiya.edu', 'Siddhi', 'Siddhi', 'user', 'ee8cc01b7b46f8835b4b6bd5466ab334', 1),
(20, 'smita', 'Smita', 'S', 'siddhi.ms@somaiya.edu', 'Siddhi', 'Siddhi', 'user', '1ba88952f42f4960e9438154bcdbdcec', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`uname`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_tokens`
--
ALTER TABLE `oauth_tokens`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oauth_tokens`
--
ALTER TABLE `oauth_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
