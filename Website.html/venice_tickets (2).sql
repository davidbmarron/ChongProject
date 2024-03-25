-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 25, 2024 at 06:50 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `venice_tickets`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodation`
--

DROP TABLE IF EXISTS `accommodation`;
CREATE TABLE IF NOT EXISTS `accommodation` (
  `AccommodationID` int NOT NULL AUTO_INCREMENT,
  `BookingID` int DEFAULT NULL,
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  PRIMARY KEY (`AccommodationID`),
  KEY `BookingID` (`BookingID`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `accommodation`
--

INSERT INTO `accommodation` (`AccommodationID`, `BookingID`, `Name`, `Address`, `Phone`, `Email`) VALUES
(1, 1, 'Hotel Risotto', '123 Main Street', '123-456-7890', 'hotel@example.com'),
(2, 5, 'Casanova Airbnb', '456 Maple Avenue', '456-789-0123', 'airbnb@example.com'),
(3, 10, 'Bellini Hostel', '789 Oak Street', '789-012-3456', 'hostel@example.com'),
(4, 15, 'Marco Polo Hotel', '987 Elm Street', '987-654-3210', 'marcopolo@example.com'),
(5, 20, 'Grand Canal Airbnb', '654 Pine Street', '321-654-0987', 'grandcanal@example.com'),
(6, 2, 'Hotel Risotto', '234 Cedar Street', '234-567-8901', 'hotel@example.com'),
(7, 6, 'Casanova Airbnb', '567 Birch Street', '567-890-1234', 'airbnb@example.com'),
(8, 11, 'Bellini Hostel', '890 Elmwood Avenue', '890-123-4567', 'hostel@example.com'),
(9, 16, 'Marco Polo Hotel', '876 Oakwood Drive', '876-543-2109', 'marcopolo@example.com'),
(10, 21, 'Grand Canal Airbnb', '765 Maplewood Road', '432-765-1098', 'grandcanal@example.com'),
(11, 3, 'Hotel Risotto', '345 Pinecrest Boulevard', '345-678-9012', 'hotel@example.com'),
(12, 7, 'Casanova Airbnb', '678 Oakridge Court', '678-901-2345', 'airbnb@example.com'),
(13, 12, 'Bellini Hostel', '901 Elmwood Terrace', '901-234-5678', 'hostel@example.com'),
(14, 17, 'Marco Polo Hotel', '765 Pinecrest Avenue', '765-432-1098', 'marcopolo@example.com'),
(15, 22, 'Grand Canal Airbnb', '654 Oakwood Lane', '543-876-0987', 'grandcanal@example.com'),
(16, 4, 'Hotel Risotto', '456 Maplecrest Circle', '456-789-0123', 'hotel@example.com'),
(17, 8, 'Casanova Airbnb', '789 Oakridge Drive', '789-012-3456', 'airbnb@example.com'),
(18, 13, 'Bellini Hostel', '012 Elmwood Court', '012-345-6789', 'hostel@example.com'),
(19, 18, 'Marco Polo Hotel', '876 Pinecrest Road', '876-543-2109', 'marcopolo@example.com'),
(20, 23, 'Grand Canal Airbnb', '765 Maplewood Drive', '321-654-0987', 'grandcanal@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `BookingID` int NOT NULL AUTO_INCREMENT,
  `UserID` int NOT NULL,
  `NumberOfAdults` int NOT NULL,
  `NumberOfChildren` int NOT NULL,
  `DateOfVisit` date NOT NULL,
  `TimeOfVisit` time NOT NULL,
  PRIMARY KEY (`BookingID`),
  KEY `UserID` (`UserID`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BookingID`, `UserID`, `NumberOfAdults`, `NumberOfChildren`, `DateOfVisit`, `TimeOfVisit`) VALUES
(1, 1, 2, 3, '2024-03-29', '12:00:00'),
(2, 1, 2, 3, '2024-03-29', '12:00:00'),
(4, 6, 4, 0, '2024-03-31', '03:00:00'),
(5, 7, 2, 1, '2024-04-05', '10:30:00'),
(6, 8, 3, 0, '2024-04-10', '13:45:00'),
(7, 9, 4, 2, '2024-04-15', '11:00:00'),
(8, 10, 2, 0, '2024-04-20', '15:15:00'),
(9, 11, 3, 1, '2024-04-25', '09:45:00'),
(10, 12, 4, 0, '2024-05-01', '12:30:00'),
(11, 13, 2, 1, '2024-05-06', '14:00:00'),
(12, 14, 3, 0, '2024-05-11', '10:45:00'),
(13, 15, 4, 2, '2024-05-16', '16:30:00'),
(14, 16, 2, 0, '2024-05-21', '08:30:00'),
(15, 17, 3, 1, '2024-05-26', '12:15:00'),
(16, 18, 4, 0, '2024-05-31', '14:45:00'),
(17, 19, 2, 1, '2024-06-05', '11:30:00'),
(18, 20, 3, 0, '2024-06-10', '15:00:00'),
(19, 1, 4, 2, '2024-06-15', '09:00:00'),
(20, 2, 2, 0, '2024-06-20', '13:45:00'),
(21, 3, 3, 1, '2024-06-25', '10:30:00'),
(22, 4, 4, 0, '2024-06-30', '14:15:00'),
(23, 5, 2, 1, '2024-07-05', '11:45:00'),
(67, 1, 11, 11, '2024-03-14', '10:16:00'),
(66, 1, 55, 55, '2024-03-25', '17:55:00'),
(65, 1, 55, 55, '2024-03-25', '17:55:00'),
(64, 1, 88, 99, '1111-11-11', '11:11:00'),
(63, 1, 88, 99, '1111-11-11', '11:11:00'),
(62, 1, 55, 3, '1111-11-11', '11:11:00'),
(61, 1, 55, 3, '1111-11-11', '11:11:00'),
(60, 1, 1111, 33, '1111-11-11', '11:11:00'),
(59, 1, 1111, 33, '1111-11-11', '11:11:00'),
(58, 1, 1111, 33, '1111-11-11', '11:11:00'),
(57, 1, 1111, 33, '1111-11-11', '11:11:00'),
(56, 1, 55, 3, '1111-11-11', '11:11:00'),
(55, 1, 55, 3, '1111-11-11', '11:11:00'),
(54, 1, 55, 3, '1111-11-11', '11:11:00'),
(53, 1, 77, 77, '1111-11-11', '11:11:00'),
(52, 1, 77, 77, '1111-11-11', '11:11:00'),
(51, 1, 98, 13, '1111-11-11', '14:22:00'),
(50, 1, 12, 1, '1111-11-11', '11:11:00'),
(49, 1, 11, 11, '1111-11-11', '11:11:00'),
(47, 0, 10001, 10001, '1212-12-12', '12:12:00'),
(68, 1, 11, 11, '2024-03-14', '10:16:00'),
(69, 1, 1900, 55, '1121-11-11', '12:12:00'),
(70, 1, 1900, 55, '1121-11-11', '12:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `booking_accommodation`
--

DROP TABLE IF EXISTS `booking_accommodation`;
CREATE TABLE IF NOT EXISTS `booking_accommodation` (
  `BookingID` int NOT NULL,
  `AccommodationID` int NOT NULL,
  `StayDuration` int NOT NULL,
  `FeeAmount` decimal(10,2) NOT NULL,
  `CardNumber` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`BookingID`,`AccommodationID`),
  KEY `AccommodationID` (`AccommodationID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking_accommodation`
--

INSERT INTO `booking_accommodation` (`BookingID`, `AccommodationID`, `StayDuration`, `FeeAmount`, `CardNumber`) VALUES
(1, 1, 3, 150.00, '1234567812345678'),
(2, 2, 5, 250.00, '8765432187654321'),
(3, 3, 2, 100.00, '9876543298765432'),
(4, 4, 4, 200.00, '5678123456781234'),
(5, 5, 7, 350.00, '4321987654321987'),
(6, 6, 3, 150.00, '3456781234567812'),
(7, 7, 5, 250.00, '3219876543219876'),
(8, 8, 2, 100.00, '6543298765432987'),
(9, 9, 4, 200.00, '2345678123456781'),
(10, 10, 7, 350.00, '5432198765432198'),
(11, 11, 3, 150.00, '4567812345678123'),
(12, 12, 5, 250.00, '4321987654321987'),
(13, 13, 2, 100.00, '3219876543219876'),
(14, 14, 4, 200.00, '6543298765432987'),
(15, 15, 7, 350.00, '2345678123456781'),
(16, 16, 3, 150.00, '5432198765432198'),
(17, 17, 5, 250.00, '4567812345678123'),
(18, 18, 2, 100.00, '4321987654321987'),
(19, 19, 4, 200.00, '3219876543219876'),
(20, 20, 7, 350.00, '6543298765432987');

-- --------------------------------------------------------

--
-- Table structure for table `checkpoint`
--

DROP TABLE IF EXISTS `checkpoint`;
CREATE TABLE IF NOT EXISTS `checkpoint` (
  `CheckPointID` int NOT NULL AUTO_INCREMENT,
  `Location` varchar(255) NOT NULL,
  `Type` varchar(50) NOT NULL,
  PRIMARY KEY (`CheckPointID`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `checkpoint`
--

INSERT INTO `checkpoint` (`CheckPointID`, `Location`, `Type`) VALUES
(1, 'Marco Polo Airport', 'Airport'),
(2, 'Santa Lucia Train Station', 'Train Station'),
(3, 'Piazzale Roma', 'Bus Station'),
(4, 'Tronchetto Parking', 'Parking Lot'),
(5, 'Venice Cruise Port', 'Port'),
(6, 'Mestre Railway Station', 'Train Station'),
(7, 'San Giuliano Parking', 'Parking Lot'),
(8, 'Venice Marco Polo Airport Water Taxi Terminal', 'Water Taxi Terminal'),
(9, 'Treviso Airport', 'Airport'),
(10, 'Piazzale Roma Tram Station', 'Tram Station'),
(11, 'Tronchetto Ferry Terminal', 'Ferry Terminal'),
(12, 'San Zaccaria Water Bus Station', 'Water Bus Station'),
(13, 'Venice People Mover Terminal', 'People Mover Terminal'),
(14, 'Venezia Mestre Train Station Parking', 'Parking Lot'),
(15, 'Marco Polo Airport Bus Terminal', 'Bus Terminal'),
(16, 'Favaro Veneto Railway Station', 'Train Station'),
(17, 'San Marco Vallaresso Water Bus Station', 'Water Bus Station'),
(18, 'Venezia Santa Lucia Water Bus Station', 'Water Bus Station'),
(19, 'Venezia Mestre Train Station', 'Train Station'),
(20, 'Venice Cruise Port People Mover Terminal', 'People Mover Terminal');

-- --------------------------------------------------------

--
-- Table structure for table `exemption`
--

DROP TABLE IF EXISTS `exemption`;
CREATE TABLE IF NOT EXISTS `exemption` (
  `ExemptionID` int NOT NULL AUTO_INCREMENT,
  `UserID` int NOT NULL,
  `ExemptionType` varchar(50) NOT NULL,
  `ExemptionStartDate` date NOT NULL,
  `ExemptionEndDate` date NOT NULL,
  PRIMARY KEY (`ExemptionID`),
  KEY `UserID` (`UserID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `exemption`
--

INSERT INTO `exemption` (`ExemptionID`, `UserID`, `ExemptionType`, `ExemptionStartDate`, `ExemptionEndDate`) VALUES
(1, 1, 'Citizen', '2023-01-01', '2023-12-31'),
(2, 2, 'City Resident', '2023-02-01', '2023-12-31'),
(3, 3, 'Locally Employed', '2023-03-01', '2023-12-31'),
(4, 4, 'Citizen', '2023-04-01', '2023-12-31'),
(5, 5, 'City Resident', '2023-05-01', '2023-12-31'),
(6, 6, 'Locally Employed', '2023-06-01', '2023-12-31'),
(7, 7, 'Citizen', '2023-07-01', '2023-12-31'),
(8, 8, 'City Resident', '2023-08-01', '2023-12-31'),
(9, 1, 'resident', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `PaymentID` int NOT NULL AUTO_INCREMENT,
  `BookingID` int NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `DateOfPayment` date NOT NULL,
  `PaymentMethod` varchar(50) NOT NULL,
  PRIMARY KEY (`PaymentID`),
  KEY `BookingID` (`BookingID`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `BookingID`, `Amount`, `DateOfPayment`, `PaymentMethod`) VALUES
(21, 1, 50.00, '2024-04-01', 'Credit Card'),
(22, 2, 75.00, '2024-04-05', 'PayPal'),
(23, 3, 100.00, '2024-04-10', 'Credit Card'),
(24, 4, 120.00, '2024-04-15', 'Credit Card'),
(25, 5, 90.00, '2024-04-20', 'Credit Card'),
(26, 6, 110.00, '2024-04-25', 'PayPal'),
(27, 7, 80.00, '2024-05-01', 'Credit Card'),
(28, 8, 95.00, '2024-05-06', 'Credit Card'),
(29, 9, 130.00, '2024-05-11', 'PayPal'),
(30, 10, 70.00, '2024-05-16', 'Credit Card'),
(31, 11, 85.00, '2024-05-21', 'Credit Card'),
(32, 12, 115.00, '2024-05-26', 'PayPal'),
(33, 13, 60.00, '2024-05-31', 'Credit Card'),
(34, 14, 95.00, '2024-06-05', 'Credit Card'),
(35, 15, 105.00, '2024-06-10', 'PayPal'),
(36, 16, 80.00, '2024-06-15', 'Credit Card'),
(37, 17, 120.00, '2024-06-20', 'Credit Card'),
(38, 18, 110.00, '2024-06-25', 'PayPal'),
(39, 19, 65.00, '2024-06-30', 'Credit Card'),
(40, 20, 100.00, '2024-07-05', 'Credit Card'),
(44, 68, 0.00, '2024-03-25', 'Credit Card'),
(43, 66, 47381290.00, '2024-03-25', 'Credit Card'),
(45, 70, 74321432.00, '2024-03-25', 'Credit Card');

-- --------------------------------------------------------

--
-- Table structure for table `penalty`
--

DROP TABLE IF EXISTS `penalty`;
CREATE TABLE IF NOT EXISTS `penalty` (
  `PenaltyID` int NOT NULL AUTO_INCREMENT,
  `UserID` int NOT NULL,
  `ViolationType` varchar(255) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `DateOfPenalty` date NOT NULL,
  PRIMARY KEY (`PenaltyID`),
  KEY `UserID` (`UserID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `penalty`
--

INSERT INTO `penalty` (`PenaltyID`, `UserID`, `ViolationType`, `Amount`, `DateOfPenalty`) VALUES
(1, 1, 'Late payment', 50.00, '2024-01-10'),
(2, 2, 'Unauthorized access', 100.00, '2024-02-15'),
(3, 3, 'Violation of terms', 75.00, '2024-03-20'),
(4, 4, 'Misuse of facilities', 80.00, '2024-04-25'),
(5, 5, 'Failure to comply', 60.00, '2024-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `qrcode`
--

DROP TABLE IF EXISTS `qrcode`;
CREATE TABLE IF NOT EXISTS `qrcode` (
  `QRCodeID` int NOT NULL AUTO_INCREMENT,
  `UserID` int NOT NULL,
  `Code` varchar(255) NOT NULL,
  `ValidFromDate` date NOT NULL,
  `ValidToDate` date NOT NULL,
  PRIMARY KEY (`QRCodeID`),
  KEY `UserID` (`UserID`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `qrcode`
--

INSERT INTO `qrcode` (`QRCodeID`, `UserID`, `Code`, `ValidFromDate`, `ValidToDate`) VALUES
(1, 1, 'QR123', '2024-01-01', '2024-01-31'),
(2, 2, 'QR456', '2024-01-01', '2024-01-31'),
(3, 3, 'QR789', '2024-01-01', '2024-01-31'),
(4, 4, 'QR321', '2024-01-01', '2024-01-31'),
(5, 5, 'QR654', '2024-01-01', '2024-01-31'),
(6, 6, 'QR987', '2024-01-01', '2024-01-31'),
(7, 7, 'QR1234', '2024-01-01', '2024-01-31'),
(8, 8, 'QR5678', '2024-01-01', '2024-01-31'),
(9, 9, 'QR9012', '2024-01-01', '2024-01-31'),
(10, 10, 'QR3456', '2024-01-01', '2024-01-31'),
(11, 11, 'QR7890', '2024-01-01', '2024-01-31'),
(12, 12, 'QR12345', '2024-01-01', '2024-01-31'),
(13, 13, 'QR67890', '2024-01-01', '2024-01-31'),
(14, 14, 'QR123456', '2024-01-01', '2024-01-31'),
(15, 15, 'QR234567', '2024-01-01', '2024-01-31'),
(16, 16, 'QR345678', '2024-01-01', '2024-01-31'),
(17, 17, 'QR456789', '2024-01-01', '2024-01-31'),
(18, 18, 'QR567890', '2024-01-01', '2024-01-31'),
(19, 19, 'QR678901', '2024-01-01', '2024-01-31'),
(20, 20, 'QR789012', '2024-01-01', '2024-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `ResidenceAddress` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Name`, `Role`, `Username`, `Password`, `DateOfBirth`, `Email`, `PhoneNumber`, `ResidenceAddress`) VALUES
(1, 'John Smith', 'Admin', 'john_admin', '$2y$10$/G11U0V6ER/O4vENUjkvJeUmmPsThQCpcYbFGrhdCf3gUcrLCmqIS', '1990-05-15', 'john@example.com', '123-456-7890', '123 Main St'),
(2, 'Alice Johnson', 'User', 'alice_user', '$2y$10$/G11U0V6ER/O4vENUjkvJeUmmPsThQCpcYbFGrhdCf3gUcrLCmqIS', '1985-09-21', 'alice@example.com', '456-789-0123', '456 Elm St'),
(3, 'Michael Brown', 'User', 'michael_user', '$2y$10$/G11U0V6ER/O4vENUjkvJeUmmPsThQCpcYbFGrhdCf3gUcrLCmqIS', '1978-03-12', 'michael@example.com', '789-012-3456', '789 Oak St'),
(4, 'Emily Davis', 'User', 'emily_user', '$2y$10$/G11U0V6ER/O4vENUjkvJeUmmPsThQCpcYbFGrhdCf3gUcrLCmqIS', '1992-11-30', 'emily@example.com', '012-345-6789', '101 Pine St'),
(5, 'Jessica Wilson', 'User', 'jessica_user', '$2y$10$/G11U0V6ER/O4vENUjkvJeUmmPsThQCpcYbFGrhdCf3gUcrLCmqIS', '1982-07-18', 'jessica@example.com', '345-678-9012', '202 Cedar St'),
(6, 'Matthew Miller', 'User', 'matthew_user', '$2y$10$/G11U0V6ER/O4vENUjkvJeUmmPsThQCpcYbFGrhdCf3gUcrLCmqIS', '1975-01-25', 'matthew@example.com', '678-901-2345', '303 Maple St'),
(7, 'Emma Moore', 'User', 'emma_user', '$2y$10$/G11U0V6ER/O4vENUjkvJeUmmPsThQCpcYbFGrhdCf3gUcrLCmqIS', '1995-08-03', 'emma@example.com', '901-234-5678', '404 Birch St'),
(8, 'Daniel Taylor', 'User', 'daniel_user', '$2y$10$/G11U0V6ER/O4vENUjkvJeUmmPsThQCpcYbFGrhdCf3gUcrLCmqIS', '1988-04-17', 'daniel@example.com', '234-567-8901', '505 Walnut St'),
(9, 'Olivia Anderson', 'User', 'olivia_user', '$2y$10$/G11U0V6ER/O4vENUjkvJeUmmPsThQCpcYbFGrhdCf3gUcrLCmqIS', '1980-06-22', 'olivia@example.com', '567-890-1234', '606 Oakwood Ave'),
(10, 'James Martinez', 'User', 'james_user', '$2y$10$/G11U0V6ER/O4vENUjkvJeUmmPsThQCpcYbFGrhdCf3gUcrLCmqIS', '1991-10-08', 'james@example.com', '789-012-3456', '707 Pinecrest Rd'),
(11, 'Sophia Hernandez', 'User', 'sophia_user', '$2y$10$/G11U0V6ER/O4vENUjkvJeUmmPsThQCpcYbFGrhdCf3gUcrLCmqIS', '1987-02-14', 'sophia@example.com', '012-345-6789', '808 Elmwood Dr'),
(12, 'Alexander Gonzalez', 'User', 'alex_user', '$2y$10$/G11U0V6ER/O4vENUjkvJeUmmPsThQCpcYbFGrhdCf3gUcrLCmqIS', '1989-04-30', 'alex@example.com', '345-678-9012', '909 Cedar Ave'),
(13, 'Liam Wilson', 'User', 'liam_user', '$2y$10$/G11U0V6ER/O4vENUjkvJeUmmPsThQCpcYbFGrhdCf3gUcrLCmqIS', '1993-12-11', 'liam@example.com', '678-901-2345', '1010 Oak St'),
(14, 'Charlotte Taylor', 'User', 'charlotte_user', '$2y$10$/G11U0V6ER/O4vENUjkvJeUmmPsThQCpcYbFGrhdCf3gUcrLCmqIS', '1983-08-25', 'charlotte@example.com', '890-123-4567', '1111 Pine Rd'),
(15, 'Ethan Anderson', 'User', 'ethan_user', '$2y$10$/G11U0V6ER/O4vENUjkvJeUmmPsThQCpcYbFGrhdCf3gUcrLCmqIS', '1996-06-05', 'ethan@example.com', '234-567-8901', '1212 Elm St'),
(16, 'Amelia Brown', 'User', 'amelia_user', '$2y$10$/G11U0V6ER/O4vENUjkvJeUmmPsThQCpcYbFGrhdCf3gUcrLCmqIS', '1979-11-19', 'amelia@example.com', '456-789-0123', '1313 Oak St'),
(17, 'Mia Davis', 'User', 'mia_user', '$2y$10$/G11U0V6ER/O4vENUjkvJeUmmPsThQCpcYbFGrhdCf3gUcrLCmqIS', '1990-03-17', 'mia@example.com', '567-890-1234', '1414 Maple St'),
(18, 'Benjamin Wilson', 'User', 'benjamin_user', '$2y$10$/G11U0V6ER/O4vENUjkvJeUmmPsThQCpcYbFGrhdCf3gUcrLCmqIS', '1985-05-29', 'benjamin@example.com', '789-012-3456', '1515 Cedar Ave'),
(19, 'Lucas Thomas', 'User', 'lucas_user', '$2y$10$/G11U0V6ER/O4vENUjkvJeUmmPsThQCpcYbFGrhdCf3gUcrLCmqIS', '1977-09-08', 'lucas@example.com', '012-345-6789', '1616 Elm St'),
(20, 'Harper Martinez', 'User', 'harper_user', '$2y$10$/G11U0V6ER/O4vENUjkvJeUmmPsThQCpcYbFGrhdCf3gUcrLCmqIS', '1994-07-02', 'harper@example.com', '234-567-8901', '1717 Oak St'),
(46, 'bill', 'User', 'billyb', 'password', '1212-12-12', 'bill@gmail.com', '89898989', '55 fox rd'),
(43, 'fjfj', 'User', 'fjfj', 'fjfj', '1111-11-11', 'fjfj', 'fjfj', 'fjfj'),
(45, 'David Benjamin Marron', 'User', 'john_admin', 'c', '2024-03-25', 'davidbmarron@gmail.com', '9254640416', '3480 Silver Springs Rd'),
(44, 'fjfj', 'User', 'fjfj', 'fjfj', '1111-11-11', 'fjfj', 'fjfj', 'fjfj');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
