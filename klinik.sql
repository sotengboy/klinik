-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 08, 2024 at 06:34 PM
-- Server version: 5.7.31
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `skill` varchar(200) NOT NULL,
  `working_hours` varchar(100) NOT NULL,
  `fee` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `full_name`, `username`, `password`, `email`, `phone`, `skill`, `working_hours`, `fee`, `status`) VALUES
(1, 'Dokter A', 'Dokter A', '$2y$10$Ivs.nekdyBbiY5PjVimWNOXR1Cq8bg9Ti1x3ZUkmLGx36msrWqNM.', 'doktera@gmail.com', '0812323434578', 'Umum', '09.00-15.00', 300000, 'Active'),
(2, 'Dokter B', 'dokterb', '$2y$10$YCaKZamhtzg1.A8o4cOYVO8uhCnLe9ENpEV6JYGpPKIzWTcn8Bp6S', 'dokterb@gmail.com', '0912312412', 'Umum', '09.00-15.00', 250000, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `inspections`
--

CREATE TABLE `inspections` (
  `inspection_id` int(11) NOT NULL,
  `medical_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `heart_beat` varchar(20) NOT NULL,
  `diagnosis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inspections`
--

INSERT INTO `inspections` (`inspection_id`, `medical_id`, `doctor_id`, `date`, `heart_beat`, `diagnosis`) VALUES
(1, 1, 1, '2023-12-21', 'Bagus', 'Kurang Istirahat');

-- --------------------------------------------------------

--
-- Table structure for table `medical_services`
--

CREATE TABLE `medical_services` (
  `medical_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `trx_no` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complaints` text COLLATE utf8mb4_unicode_ci,
  `admin_fee` double NOT NULL,
  `subtotal` double NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_services`
--

INSERT INTO `medical_services` (`medical_id`, `patient_id`, `user_id`, `doctor_id`, `service_id`, `trx_no`, `date`, `type`, `complaints`, `admin_fee`, `subtotal`, `status`) VALUES
(1, 1, 1, 1, 3, 'MED-8976', '2023-12-20', 'Umum', 'pusing mual muntah lemas', 50000, 50000, 'Pending'),
(2, 7, 1, 1, 3, 'MED-3743', '2024-01-07', 'Umum', NULL, 50000, 50000, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `med_id` int(11) NOT NULL,
  `med_name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `qty` int(11) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `dosage` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`med_id`, `med_name`, `description`, `qty`, `unit`, `dosage`, `price`, `type`, `status`) VALUES
(1, 'Paracetamol', 'Pereda Nyeri', 1000, 'pack', '3x sehari setelah makan', 10000, 'Tablet', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `full_name` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `medical_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `full_name`, `address`, `medical_number`, `age`, `gender`, `nik`, `phone`, `email`, `status`) VALUES
(1, 'Pasien 11', 'Jakarta Timur', '2212009', '23', 'Perempuan', '', '1', '-', 'Active'),
(2, 'test', 'Bekasi', '22120010', '45', 'Laki-laki', '', '5', '', 'Active'),
(4, 'pasien 3', 'Bekasi', '22120011', '30', 'Perempuan', '', '6', '', 'Active'),
(5, 'pelanggan4', 'Kota Bekasi', '22120012', '55', 'Laki-laki', '', '5', '', 'Active'),
(6, 'Harjo', 'Jakarta Utara', '240106333', '34', 'Laki-laki', '16', '08123456789', 'jonesjoker@gmail.com', 'Active'),
(7, 'Yanto', 'Depok', '240106141', '40', 'Laki-laki', '31759198945566', '0821213131312', 'yanto@gmail.com', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `payment_number` bigint(20) NOT NULL,
  `payment_date` date NOT NULL,
  `medical_id` int(11) NOT NULL,
  `pres_id` int(11) NOT NULL,
  `subtotal` double NOT NULL,
  `discount` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `payment_method` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_number`, `payment_date`, `medical_id`, `pres_id`, `subtotal`, `discount`, `tax`, `total`, `payment_method`, `payment_status`) VALUES
(2, 202312319212, '2023-12-20', 1, 1, 20230614, 2, 5000, 500000, '1', 'Pending Payment'),
(3, 202312319222, '2023-12-21', 1, 5, 20230622, 6, 5000, 23000, '1', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `pres_id` int(11) NOT NULL,
  `medical_id` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `total_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`pres_id`, `medical_id`, `total_price`, `total_qty`) VALUES
(9, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prescription_items`
--

CREATE TABLE `prescription_items` (
  `item_id` int(11) NOT NULL,
  `pres_id` int(11) NOT NULL,
  `med_id` int(11) NOT NULL,
  `usage` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `access`) VALUES
(1, 'Administrator', 'registration,vital,doctor,payment,pharmacy,master'),
(2, 'User', ''),
(3, 'Customer Service', 'registration'),
(4, 'Perawat', 'vital'),
(5, 'Dokter', 'doctor'),
(6, 'Farmasi', 'Array');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `service_desc` varchar(200) NOT NULL,
  `service_price` int(11) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_desc`, `service_price`, `status`) VALUES
(1, 'Periksa Gigi 1', 'Pemeriksaan Gigi', 50000, 'Active'),
(3, 'Periksa Umum', 'Pemeriksaan Umum', 100000, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `username`, `password`, `email`, `phone`, `role`, `status`) VALUES
(1, 'Administrator', 'admin', '$2y$10$oly2qy6MwW5PqrHCPlFuP.e/Q30PVbCu9Spa3qwRPTc.bwVNh4TWu', 'admin@mufadmedika.com', '-', '1', 'Active'),
(3, 'User', 'user', '$2y$10$looz7y8stR7978/awHMpOea86T9wVyjSwDm1aNxAOxvf5ILuPieJm', 'user@mufadmedika.com', '', '2', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `vital_sign`
--

CREATE TABLE `vital_sign` (
  `vital_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `medical_id` int(11) NOT NULL,
  `blood_presure` varchar(20) NOT NULL,
  `temperature` varchar(20) NOT NULL,
  `weight` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vital_sign`
--

INSERT INTO `vital_sign` (`vital_id`, `user_id`, `medical_id`, `blood_presure`, `temperature`, `weight`) VALUES
(1, 1, 1, '100/80', '36.7', '65');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `inspections`
--
ALTER TABLE `inspections`
  ADD PRIMARY KEY (`inspection_id`);

--
-- Indexes for table `medical_services`
--
ALTER TABLE `medical_services`
  ADD PRIMARY KEY (`medical_id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`med_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`pres_id`);

--
-- Indexes for table `prescription_items`
--
ALTER TABLE `prescription_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vital_sign`
--
ALTER TABLE `vital_sign`
  ADD PRIMARY KEY (`vital_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inspections`
--
ALTER TABLE `inspections`
  MODIFY `inspection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medical_services`
--
ALTER TABLE `medical_services`
  MODIFY `medical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `pres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prescription_items`
--
ALTER TABLE `prescription_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vital_sign`
--
ALTER TABLE `vital_sign`
  MODIFY `vital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
