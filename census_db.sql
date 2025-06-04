-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2025 at 04:23 AM
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
-- Database: `census_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangays`
--

CREATE TABLE `barangays` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(10) NOT NULL,
  `municipality_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barangays`
--

INSERT INTO `barangays` (`id`, `name`, `code`, `municipality_id`, `created_at`) VALUES
(1, 'Barangay 1 San Lorenzo', 'BZ1', 1, '2025-06-04 01:38:02'),
(2, 'Barangay 2 La Paz', 'BZ2', 1, '2025-06-04 01:38:02'),
(3, 'Barangay 3 Quiling Norte', 'BZ3', 2, '2025-06-04 01:38:02'),
(4, 'Barangay 4 Colo', 'BZ4', 2, '2025-06-04 01:38:02'),
(5, 'Barangay 5 Suba', 'BZ5', 3, '2025-06-04 01:38:02'),
(6, 'Barangay 6 Nalasin', 'BZ6', 3, '2025-06-04 01:38:02'),
(7, 'Barangay 7 Bayog', 'BZ7', 4, '2025-06-04 01:38:02'),
(8, 'Barangay 8 Ablan', 'BZ8', 4, '2025-06-04 01:38:02'),
(9, 'Barangay 9 Puyupuyan', 'BZ9', 5, '2025-06-04 01:38:02'),
(10, 'Barangay 10 Estancia', 'BZ10', 5, '2025-06-04 01:38:02'),
(11, 'Barangay 11 Ayusan Norte', 'BZ11', 6, '2025-06-04 01:38:02'),
(12, 'Barangay 12 Mindoro', 'BZ12', 6, '2025-06-04 01:38:02'),
(13, 'Barangay 13 Calaoaan', 'BZ13', 7, '2025-06-04 01:38:02'),
(14, 'Barangay 14 Darapidap', 'BZ14', 7, '2025-06-04 01:38:02'),
(15, 'Barangay 15 Lacong', 'BZ15', 8, '2025-06-04 01:38:02'),
(16, 'Barangay 16 Libtong', 'BZ16', 8, '2025-06-04 01:38:02'),
(17, 'Barangay 17 Bulanos', 'BZ17', 9, '2025-06-04 01:38:02'),
(18, 'Barangay 18 Naguilian', 'BZ18', 9, '2025-06-04 01:38:02'),
(19, 'Barangay 19 Bia-o', 'BZ19', 10, '2025-06-04 01:38:02'),
(20, 'Barangay 20 Calumbaya', 'BZ20', 10, '2025-06-04 01:38:02'),
(21, 'Barangay 21 Pagdaraoan', 'BZ21', 11, '2025-06-04 01:38:02'),
(22, 'Barangay 22 Tanqui', 'BZ22', 11, '2025-06-04 01:38:02'),
(23, 'Barangay 23 Sta. Rita', 'BZ23', 12, '2025-06-04 01:38:02'),
(24, 'Barangay 24 Aringay', 'BZ24', 12, '2025-06-04 01:38:02'),
(25, 'Barangay 25 Quirino', 'BZ25', 13, '2025-06-04 01:38:02'),
(26, 'Barangay 26 Cabaroan', 'BZ26', 13, '2025-06-04 01:38:02'),
(27, 'Barangay 27 Central East', 'BZ27', 14, '2025-06-04 01:38:02'),
(28, 'Barangay 28 Paringao', 'BZ28', 14, '2025-06-04 01:38:02'),
(29, 'Barangay 29 Bimmotobot', 'BZ29', 15, '2025-06-04 01:38:02'),
(30, 'Barangay 30 Ortiz', 'BZ30', 15, '2025-06-04 01:38:02'),
(31, 'Barangay 31 Pantal', 'BZ31', 16, '2025-06-04 01:38:02'),
(32, 'Barangay 32 Bonuan Gueset', 'BZ32', 16, '2025-06-04 01:38:02'),
(33, 'Barangay 33 Pagal', 'BZ33', 17, '2025-06-04 01:38:02'),
(34, 'Barangay 34 PNR', 'BZ34', 17, '2025-06-04 01:38:02'),
(35, 'Barangay 35 Palamis', 'BZ35', 18, '2025-06-04 01:38:02'),
(36, 'Barangay 36 San Vicente', 'BZ36', 18, '2025-06-04 01:38:02'),
(37, 'Barangay 37 Naguilayan', 'BZ37', 19, '2025-06-04 01:38:02'),
(38, 'Barangay 38 Poblacion', 'BZ38', 19, '2025-06-04 01:38:02'),
(39, 'Barangay 39 Maniboc', 'BZ39', 20, '2025-06-04 01:38:02'),
(40, 'Barangay 40 Libsong East', 'BZ40', 20, '2025-06-04 01:38:02'),
(41, 'Barangay 41 Kayvaluganan', 'BZ41', 21, '2025-06-04 01:38:02'),
(42, 'Barangay 42 San Antonio', 'BZ42', 21, '2025-06-04 01:38:02'),
(43, 'Barangay 43 Tuhel', 'BZ43', 22, '2025-06-04 01:38:02'),
(44, 'Barangay 44 Salagao', 'BZ44', 22, '2025-06-04 01:38:02'),
(45, 'Barangay 45 Raele', 'BZ45', 23, '2025-06-04 01:38:02'),
(46, 'Barangay 46 Mayan', 'BZ46', 23, '2025-06-04 01:38:02'),
(47, 'Barangay 47 Kaumbakan', 'BZ47', 24, '2025-06-04 01:38:02'),
(48, 'Barangay 48 Diura', 'BZ48', 24, '2025-06-04 01:38:02'),
(49, 'Barangay 49 Kayuganan', 'BZ49', 25, '2025-06-04 01:38:02'),
(50, 'Barangay 50 Itbud', 'BZ50', 25, '2025-06-04 01:38:02'),
(51, 'Barangay 51 Atulayan Norte', 'BZ51', 26, '2025-06-04 01:38:02'),
(52, 'Barangay 52 Bagay', 'BZ52', 26, '2025-06-04 01:38:02'),
(53, 'Barangay 53 Maura', 'BZ53', 27, '2025-06-04 01:38:02'),
(54, 'Barangay 54 Centro', 'BZ54', 27, '2025-06-04 01:38:02'),
(55, 'Barangay 55 Baribar', 'BZ55', 28, '2025-06-04 01:38:02'),
(56, 'Barangay 56 Tanglagan', 'BZ56', 28, '2025-06-04 01:38:02'),
(57, 'Barangay 57 Afusing Bato', 'BZ57', 29, '2025-06-04 01:38:02'),
(58, 'Barangay 58 San Juan', 'BZ58', 29, '2025-06-04 01:38:02'),
(59, 'Barangay 59 Casambalangan', 'BZ59', 30, '2025-06-04 01:38:02'),
(60, 'Barangay 60 San Vicente', 'BZ60', 30, '2025-06-04 01:38:02'),
(61, 'Barangay 61 Baligatan', 'BZ61', 31, '2025-06-04 01:38:02'),
(62, 'Barangay 62 Marana I', 'BZ62', 31, '2025-06-04 01:38:02'),
(63, 'Barangay 63 District I', 'BZ63', 32, '2025-06-04 01:38:02'),
(64, 'Barangay 64 Turayong', 'BZ64', 32, '2025-06-04 01:38:02'),
(65, 'Barangay 65 Bantug', 'BZ65', 33, '2025-06-04 01:38:02'),
(66, 'Barangay 66 San Jose', 'BZ66', 33, '2025-06-04 01:38:02'),
(67, 'Barangay 67 Sinamar Norte', 'BZ67', 34, '2025-06-04 01:38:02'),
(68, 'Barangay 68 Villaflor', 'BZ68', 34, '2025-06-04 01:38:02'),
(69, 'Barangay 69 San Fermin', 'BZ69', 35, '2025-06-04 01:38:02'),
(70, 'Barangay 70 Aurora East', 'BZ70', 35, '2025-06-04 01:38:02');

-- --------------------------------------------------------

--
-- Table structure for table `households`
--

CREATE TABLE `households` (
  `id` int(11) NOT NULL,
  `head_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `barangay_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `households`
--

INSERT INTO `households` (`id`, `head_name`, `address`, `barangay_id`, `created_at`) VALUES
(1, 'Juan Dela Cruz', 'Blk 1 Lot 1, Purok 1', 1, '2025-06-03 17:53:18'),
(2, 'Maria Santos', 'Blk 1 Lot 2, Purok 1', 2, '2025-06-03 17:53:18'),
(3, 'Jose Garcia', 'Blk 1 Lot 3, Purok 1', 3, '2025-06-03 17:53:18'),
(4, 'Ana Reyes', 'Blk 1 Lot 4, Purok 2', 4, '2025-06-03 17:53:18'),
(5, 'Carlos Mendoza', 'Blk 1 Lot 5, Purok 2', 5, '2025-06-03 17:53:18'),
(6, 'Luisa Lopez', 'Blk 2 Lot 1, Purok 3', 6, '2025-06-03 17:53:18'),
(7, 'Pedro Ramos', 'Blk 2 Lot 2, Purok 3', 7, '2025-06-03 17:53:18'),
(8, 'Carmen Flores', 'Blk 2 Lot 3, Purok 4', 8, '2025-06-03 17:53:18'),
(9, 'Mark Lim', 'Blk 2 Lot 4, Purok 4', 9, '2025-06-03 17:53:18'),
(10, 'Ella Cruz', 'Blk 2 Lot 5, Purok 5', 10, '2025-06-03 17:53:18'),
(11, 'David Tan', 'Blk 3 Lot 1, Purok 5', 11, '2025-06-03 17:53:18'),
(12, 'Isabel Gomez', 'Blk 3 Lot 2, Purok 6', 12, '2025-06-03 17:53:18'),
(13, 'Joel Sy', 'Blk 3 Lot 3, Purok 6', 13, '2025-06-03 17:53:18'),
(14, 'Bianca Torres', 'Blk 3 Lot 4, Purok 7', 14, '2025-06-03 17:53:18'),
(15, 'Andres Bautista', 'Blk 3 Lot 5, Purok 7', 15, '2025-06-03 17:53:18'),
(16, 'Lorna Javier', 'Blk 4 Lot 1, Purok 8', 16, '2025-06-03 17:53:18'),
(17, 'Miguel Navarro', 'Blk 4 Lot 2, Purok 8', 17, '2025-06-03 17:53:18'),
(18, 'Rita Vega', 'Blk 4 Lot 3, Purok 9', 18, '2025-06-03 17:53:18'),
(19, 'Enrique Castillo', 'Blk 4 Lot 4, Purok 9', 19, '2025-06-03 17:53:18'),
(20, 'Nina Romero', 'Blk 4 Lot 5, Purok 10', 20, '2025-06-03 17:53:18'),
(21, 'Oscar Ferrer', 'Blk 5 Lot 1, Purok 10', 21, '2025-06-03 17:53:18'),
(22, 'Joan Aguilar', 'Blk 5 Lot 2, Purok 11', 22, '2025-06-03 17:53:18'),
(23, 'Victor Chua', 'Blk 5 Lot 3, Purok 11', 23, '2025-06-03 17:53:18'),
(24, 'Marites Lim', 'Blk 5 Lot 4, Purok 12', 24, '2025-06-03 17:53:18'),
(25, 'Jorge dela Vega', 'Blk 5 Lot 5, Purok 12', 25, '2025-06-03 17:53:18'),
(26, 'Clarissa Uy', 'Blk 6 Lot 1, Purok 13', 26, '2025-06-03 17:53:18'),
(27, 'Edgar Cruz', 'Blk 6 Lot 2, Purok 13', 27, '2025-06-03 17:53:18'),
(28, 'Roxanne Santos', 'Blk 6 Lot 3, Purok 14', 28, '2025-06-03 17:53:18'),
(29, 'Alfredo Nunez', 'Blk 6 Lot 4, Purok 14', 29, '2025-06-03 17:53:18'),
(30, 'Mika Salvador', 'Blk 6 Lot 5, Purok 15', 30, '2025-06-03 17:53:18'),
(31, 'Tony Garcia', 'Blk 7 Lot 1, Purok 15', 31, '2025-06-03 17:53:18'),
(32, 'Joy Mendoza', 'Blk 7 Lot 2, Purok 16', 32, '2025-06-03 17:53:18'),
(33, 'Samuel Reyes', 'Blk 7 Lot 3, Purok 16', 33, '2025-06-03 17:53:18'),
(34, 'Grace Tan', 'Blk 7 Lot 4, Purok 17', 34, '2025-06-03 17:53:18'),
(35, 'Christian Ramos', 'Blk 7 Lot 5, Purok 17', 35, '2025-06-03 17:53:18'),
(36, 'Nerissa Lopez', 'Blk 8 Lot 1, Purok 18', 36, '2025-06-03 17:53:18'),
(37, 'Paolo Dominguez', 'Blk 8 Lot 2, Purok 18', 37, '2025-06-03 17:53:18'),
(38, 'Karen Villanueva', 'Blk 8 Lot 3, Purok 19', 38, '2025-06-03 17:53:18'),
(39, 'Manuel Pascual', 'Blk 8 Lot 4, Purok 19', 39, '2025-06-03 17:53:18'),
(40, 'Leslie Bautista', 'Blk 8 Lot 5, Purok 20', 40, '2025-06-03 17:53:18'),
(41, 'Adrian Ong', 'Blk 9 Lot 1, Purok 20', 41, '2025-06-03 17:53:18'),
(42, 'Vera Ledesma', 'Blk 9 Lot 2, Purok 21', 42, '2025-06-03 17:53:18'),
(43, 'Reynaldo Cruz', 'Blk 9 Lot 3, Purok 21', 43, '2025-06-03 17:53:18'),
(44, 'Angela Ruiz', 'Blk 9 Lot 4, Purok 22', 44, '2025-06-03 17:53:18'),
(45, 'Rolando Ramos', 'Blk 9 Lot 5, Purok 22', 45, '2025-06-03 17:53:18'),
(46, 'Monica Uy', 'Blk 10 Lot 1, Purok 23', 46, '2025-06-03 17:53:18'),
(47, 'Noel Angeles', 'Blk 10 Lot 2, Purok 23', 47, '2025-06-03 17:53:18'),
(48, 'Tessa Ventura', 'Blk 10 Lot 3, Purok 24', 48, '2025-06-03 17:53:18'),
(49, 'Arnold Tan', 'Blk 10 Lot 4, Purok 24', 49, '2025-06-03 17:53:18'),
(50, 'Yasmin Javier', 'Blk 10 Lot 5, Purok 25', 50, '2025-06-03 17:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `municipalities`
--

CREATE TABLE `municipalities` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(10) NOT NULL,
  `province_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `municipalities`
--

INSERT INTO `municipalities` (`id`, `name`, `code`, `province_id`, `created_at`) VALUES
(1, 'Laoag City', 'LAO', 1, '2025-06-04 01:21:00'),
(2, 'Batac City', 'BAT', 1, '2025-06-04 01:21:00'),
(3, 'Paoay', 'PAO', 1, '2025-06-04 01:21:00'),
(4, 'Burgos', 'BUR', 1, '2025-06-04 01:21:00'),
(5, 'Pasuquin', 'PAS', 1, '2025-06-04 01:21:00'),
(6, 'Vigan City', 'VIG', 2, '2025-06-04 01:21:00'),
(7, 'Candon City', 'CAN', 2, '2025-06-04 01:21:00'),
(8, 'Tagudin', 'TAG', 2, '2025-06-04 01:21:00'),
(9, 'Narvacan', 'NAR', 2, '2025-06-04 01:21:00'),
(10, 'Santa Maria', 'STM', 2, '2025-06-04 01:21:00'),
(11, 'San Fernando City', 'SFC', 3, '2025-06-04 01:21:00'),
(12, 'Agoo', 'AGO', 3, '2025-06-04 01:21:00'),
(13, 'Bacnotan', 'BAC', 3, '2025-06-04 01:21:00'),
(14, 'Bauang', 'BAU', 3, '2025-06-04 01:21:00'),
(15, 'Naguilian', 'NAG', 3, '2025-06-04 01:21:00'),
(16, 'Dagupan City', 'DAG', 4, '2025-06-04 01:21:00'),
(17, 'San Carlos City', 'SCC', 4, '2025-06-04 01:21:00'),
(18, 'Alaminos City', 'ALM', 4, '2025-06-04 01:21:00'),
(19, 'Binmaley', 'BIN', 4, '2025-06-04 01:21:00'),
(20, 'Lingayen', 'LIN', 4, '2025-06-04 01:21:00'),
(21, 'Basco', 'BAS', 5, '2025-06-04 01:21:00'),
(22, 'Ivana', 'IVA', 5, '2025-06-04 01:21:00'),
(23, 'Itbayat', 'ITB', 5, '2025-06-04 01:21:00'),
(24, 'Mahatao', 'MAH', 5, '2025-06-04 01:21:00'),
(25, 'Uyugan', 'UYG', 5, '2025-06-04 01:21:00'),
(26, 'Tuguegarao City', 'TUG', 6, '2025-06-04 01:21:00'),
(27, 'Aparri', 'APA', 6, '2025-06-04 01:21:00'),
(28, 'Gattaran', 'GAT', 6, '2025-06-04 01:21:00'),
(29, 'Lal-lo', 'LAL', 6, '2025-06-04 01:21:00'),
(30, 'Santa Ana', 'STA', 6, '2025-06-04 01:21:00'),
(31, 'Ilagan City', 'ILA', 7, '2025-06-04 01:21:00'),
(32, 'Cauayan City', 'CAU', 7, '2025-06-04 01:21:00'),
(33, 'Roxas', 'ROX', 7, '2025-06-04 01:21:00'),
(34, 'San Mateo', 'SMT', 7, '2025-06-04 01:21:00'),
(35, 'Alicia', 'ALC', 7, '2025-06-04 01:21:00'),
(36, 'Bayombong', 'BAY', 8, '2025-06-04 01:21:00'),
(37, 'Solano', 'SOL', 8, '2025-06-04 01:21:00'),
(38, 'Bambang', 'BAM', 8, '2025-06-04 01:21:00'),
(39, 'Kasibu', 'KAS', 8, '2025-06-04 01:21:00'),
(40, 'Aritao', 'ARI', 8, '2025-06-04 01:21:00'),
(41, 'Baler', 'BAL', 9, '2025-06-04 01:21:00'),
(42, 'Dingalan', 'DIN', 9, '2025-06-04 01:21:00'),
(43, 'Dipaculao', 'DIP', 9, '2025-06-04 01:21:00'),
(44, 'Maria Aurora', 'MAA', 9, '2025-06-04 01:21:00'),
(45, 'San Luis', 'SNL', 9, '2025-06-04 01:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(10) NOT NULL,
  `region_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `code`, `region_id`) VALUES
(1, 'Ilocos Norte', 'ILN', 1),
(2, 'Ilocos Sur', 'ILS', 1),
(3, 'La Union', 'LU', 1),
(4, 'Pangasinan', 'PAN', 1),
(5, 'Batanes', 'BTN', 2),
(6, 'Cagayan', 'CAG', 2),
(7, 'Isabela', 'ISA', 2),
(8, 'Nueva Vizcaya', 'NVZ', 2),
(9, 'Aurora', 'AUR', 3),
(10, 'Bataan', 'BAN', 3),
(11, 'Bulacan', 'BUL', 3),
(12, 'Pampanga', 'PAM', 3),
(13, 'Batangas', 'BTG', 4),
(14, 'Cavite', 'CAV', 4),
(15, 'Laguna', 'LAG', 4),
(16, 'Quezon', 'QUE', 4),
(17, 'Albay', 'ALB', 6),
(18, 'Camarines Norte', 'CAN', 6),
(19, 'Camarines Sur', 'CAS', 6),
(20, 'Sorsogon', 'SOR', 6),
(21, 'Aklan', 'AKL', 7),
(22, 'Antique', 'ANT', 7),
(23, 'Capiz', 'CAP', 7),
(24, 'Iloilo', 'ILO', 7),
(25, 'Bohol', 'BOH', 8),
(26, 'Cebu', 'CEB', 8),
(27, 'Negros Oriental', 'NER', 8),
(28, 'Leyte', 'LEY', 9),
(29, 'Samar', 'SAM', 9),
(30, 'Southern Leyte', 'SLE', 9);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `code`, `created_at`) VALUES
(1, 'Ilocos Region', 'I', '2025-06-04 01:20:38'),
(2, 'Cagayan Valley', 'II', '2025-06-04 01:20:38'),
(3, 'Central Luzon', 'III', '2025-06-04 01:20:38'),
(4, 'CALABARZON', 'IV-A', '2025-06-04 01:20:38'),
(5, 'MIMAROPA', 'IV-B', '2025-06-04 01:20:38'),
(6, 'Bicol Region', 'V', '2025-06-04 01:20:38'),
(7, 'Western Visayas', 'VI', '2025-06-04 01:20:38'),
(8, 'Central Visayas', 'VII', '2025-06-04 01:20:38'),
(9, 'Eastern Visayas', 'VIII', '2025-06-04 01:20:38'),
(10, 'Zamboanga Peninsula', 'IX', '2025-06-04 01:20:38'),
(11, 'Northern Mindanao', 'X', '2025-06-04 01:20:38'),
(12, 'Davao Region', 'XI', '2025-06-04 01:20:38'),
(13, 'SOCCSKSARGEN', 'XII', '2025-06-04 01:20:38'),
(14, 'Caraga', 'XIII', '2025-06-04 01:20:38'),
(15, 'Bangsamoro Autonomous Region in Muslim Mindanao (BARMM)', 'BARMM', '2025-06-04 01:20:38');

-- --------------------------------------------------------

--
-- Table structure for table `residents`
--

CREATE TABLE `residents` (
  `id` int(11) NOT NULL,
  `household_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `birthdate` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `residents`
--

INSERT INTO `residents` (`id`, `household_id`, `first_name`, `last_name`, `gender`, `birthdate`, `created_at`) VALUES
(1, 1, 'Anna', 'Garcia', 'Female', '1990-01-15', '2025-06-04 02:21:36'),
(2, 2, 'Miguel', 'Santos', 'Male', '1988-03-10', '2025-06-04 02:21:36'),
(3, 3, 'Liza', 'Torres', 'Female', '1992-07-08', '2025-06-04 02:21:36'),
(4, 4, 'Carlos', 'Reyes', 'Male', '1985-05-22', '2025-06-04 02:21:36'),
(5, 5, 'Julia', 'Cruz', 'Female', '1999-11-30', '2025-06-04 02:21:36'),
(6, 6, 'Ernesto', 'Lopez', 'Male', '1975-09-15', '2025-06-04 02:21:36'),
(7, 7, 'Ivy', 'Mendoza', 'Female', '2000-04-25', '2025-06-04 02:21:36'),
(8, 8, 'Daniel', 'Flores', 'Male', '1983-12-05', '2025-06-04 02:21:36'),
(9, 9, 'Faith', 'Lim', 'Female', '1994-08-18', '2025-06-04 02:21:36'),
(10, 10, 'Harold', 'Chua', 'Male', '1979-02-02', '2025-06-04 02:21:36'),
(11, 11, 'Tina', 'Bautista', 'Female', '1986-10-12', '2025-06-04 02:21:36'),
(12, 12, 'Ryan', 'Sy', 'Male', '1991-01-01', '2025-06-04 02:21:36'),
(13, 13, 'Gina', 'Tan', 'Female', '1995-06-06', '2025-06-04 02:21:36'),
(14, 14, 'Leo', 'Navarro', 'Male', '1982-03-29', '2025-06-04 02:21:36'),
(15, 15, 'Melanie', 'Aguilar', 'Female', '1993-05-11', '2025-06-04 02:21:36'),
(16, 16, 'Oscar', 'Romero', 'Male', '1980-07-04', '2025-06-04 02:21:36'),
(17, 17, 'Denise', 'Gomez', 'Female', '1996-12-20', '2025-06-04 02:21:36'),
(18, 18, 'Mark', 'Castillo', 'Male', '1998-09-13', '2025-06-04 02:21:36'),
(19, 19, 'Rina', 'Vega', 'Female', '1984-11-09', '2025-06-04 02:21:36'),
(20, 20, 'Arman', 'Dominguez', 'Male', '1990-01-17', '2025-06-04 02:21:36'),
(21, 21, 'Nicole', 'Uy', 'Female', '1997-04-14', '2025-06-04 02:21:36'),
(22, 22, 'Francis', 'Pascual', 'Male', '1992-06-30', '2025-06-04 02:21:36'),
(23, 23, 'Elaine', 'Villanueva', 'Female', '1989-10-18', '2025-06-04 02:21:36'),
(24, 24, 'Victor', 'Nunez', 'Male', '1981-05-06', '2025-06-04 02:21:36'),
(25, 25, 'Angela', 'Salvador', 'Female', '2001-02-25', '2025-06-04 02:21:36'),
(26, 26, 'Noel', 'Javier', 'Male', '1993-07-27', '2025-06-04 02:21:36'),
(27, 27, 'Tricia', 'Angeles', 'Female', '1994-12-12', '2025-06-04 02:21:36'),
(28, 28, 'Jason', 'Ledesma', 'Male', '1987-08-23', '2025-06-04 02:21:36'),
(29, 29, 'Stephanie', 'Reyes', 'Female', '1999-03-09', '2025-06-04 02:21:36'),
(30, 30, 'Julio', 'Santos', 'Male', '1986-01-03', '2025-06-04 02:21:36'),
(31, 31, 'Patricia', 'Garcia', 'Female', '1991-09-17', '2025-06-04 02:21:36'),
(32, 32, 'Nathan', 'Cruz', 'Male', '1983-11-28', '2025-06-04 02:21:36'),
(33, 33, 'Clarisse', 'Lopez', 'Female', '1998-04-01', '2025-06-04 02:21:36'),
(34, 34, 'Mario', 'Torres', 'Male', '1985-06-22', '2025-06-04 02:21:36'),
(35, 35, 'Karla', 'Flores', 'Female', '1996-08-30', '2025-06-04 02:21:36'),
(36, 36, 'Jomar', 'Bautista', 'Male', '1990-10-05', '2025-06-04 02:21:36'),
(37, 37, 'Elaiza', 'Lim', 'Female', '1997-12-15', '2025-06-04 02:21:36'),
(38, 38, 'Daryl', 'Mendoza', 'Male', '1982-02-18', '2025-06-04 02:21:36'),
(39, 39, 'Bea', 'Aguilar', 'Female', '1994-09-24', '2025-06-04 02:21:36'),
(40, 40, 'Eric', 'Tan', 'Male', '1989-03-12', '2025-06-04 02:21:36'),
(41, 41, 'Irene', 'Sy', 'Female', '1992-05-19', '2025-06-04 02:21:36'),
(42, 42, 'Jude', 'Reyes', 'Male', '1993-07-14', '2025-06-04 02:21:36'),
(43, 43, 'April', 'Chua', 'Female', '1990-10-22', '2025-06-04 02:21:36'),
(44, 44, 'Brian', 'Vega', 'Male', '1986-01-26', '2025-06-04 02:21:36'),
(45, 45, 'Cathy', 'Castillo', 'Female', '1995-11-30', '2025-06-04 02:21:36'),
(46, 46, 'Dennis', 'Romero', 'Male', '1981-04-11', '2025-06-04 02:21:36'),
(47, 47, 'Fatima', 'Navarro', 'Female', '1998-06-09', '2025-06-04 02:21:36'),
(48, 48, 'Zaldy', 'Dominguez', 'Male', '1987-02-08', '2025-06-04 02:21:36'),
(49, 49, 'Shiela', 'Salvador', 'Female', '1999-09-03', '2025-06-04 02:21:36'),
(50, 50, 'Arturo', 'Pascual', 'Male', '1983-12-19', '2025-06-04 02:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','enumerator','viewer') DEFAULT 'admin',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Admin User', 'admin@gmail.com', '$2y$10$o446LiUABMtDBEUy4eyR3OWrr7BpCxiKVATe12GEFf9uOn63nVBGS', 'admin', '2025-06-03 09:40:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangays`
--
ALTER TABLE `barangays`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `municipality_id` (`municipality_id`);

--
-- Indexes for table `households`
--
ALTER TABLE `households`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangay_id` (`barangay_id`);

--
-- Indexes for table `municipalities`
--
ALTER TABLE `municipalities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `region_id` (`region_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `residents`
--
ALTER TABLE `residents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `household_id` (`household_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangays`
--
ALTER TABLE `barangays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `households`
--
ALTER TABLE `households`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `municipalities`
--
ALTER TABLE `municipalities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `residents`
--
ALTER TABLE `residents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangays`
--
ALTER TABLE `barangays`
  ADD CONSTRAINT `barangays_ibfk_1` FOREIGN KEY (`municipality_id`) REFERENCES `municipalities` (`id`);

--
-- Constraints for table `households`
--
ALTER TABLE `households`
  ADD CONSTRAINT `households_ibfk_1` FOREIGN KEY (`barangay_id`) REFERENCES `barangays` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `municipalities`
--
ALTER TABLE `municipalities`
  ADD CONSTRAINT `municipalities_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

--
-- Constraints for table `provinces`
--
ALTER TABLE `provinces`
  ADD CONSTRAINT `provinces_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);

--
-- Constraints for table `residents`
--
ALTER TABLE `residents`
  ADD CONSTRAINT `residents_ibfk_1` FOREIGN KEY (`household_id`) REFERENCES `households` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
