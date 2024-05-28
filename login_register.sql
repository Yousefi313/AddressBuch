-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 28. Mai 2024 um 09:45
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `login_register`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `info`
--

CREATE TABLE `info` (
  `ID` int(11) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `houseNr` varchar(50) DEFAULT NULL,
  `postalNr` varchar(50) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phoneNr` varchar(255) DEFAULT NULL,
  `mobileNr` varchar(255) DEFAULT NULL,
  `publicEmail` varchar(255) DEFAULT NULL,
  `privateEmail` varchar(255) DEFAULT NULL,
  `faxNumber` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `info`
--

INSERT INTO `info` (`ID`, `firstName`, `lastName`, `company`, `street`, `houseNr`, `postalNr`, `city`, `country`, `phoneNr`, `mobileNr`, `publicEmail`, `privateEmail`, `faxNumber`) VALUES
(1, 'Denis', 'French', 'Pfefferwerk', 'Christinen Straße', '23', '12345', 'Berlin', 'Germany', '233436342', '233436342', 'dennis@gmail.com', 'deni@gmail.com', 'sdfasdf345'),
(2, 'mustafa', 'keineAhnung', 'Pfefferwerk', 'Christinen Straße', '23', '12345', 'Berlin', 'Germany', '7439850035', '7439850035', 'dennis@gmail.com', 'musi@gmail.com', 'djfks89');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`ID`, `first_name`, `last_name`, `email`, `password`, `date`) VALUES
(2, 'Ulrike', 'Merz', 'ulrike@test.de', '$2y$10$/tG2g7RY8Z8tYANOds5LUuRHu1QdGGg7gK4TKmuoEWKBz2d/gdi.y', '2023-12-04 13:22:29'),
(3, 'Levi', 'Benath', 'levi@gmail.com', '$2y$10$lpLyqg2Ni/lj158ormh5peO4ICfev7U5TkcBlGaWganovg3bGD5gG', '2023-12-04 13:26:26'),
(4, 'amjad', 'al Mohammad', 'amjad@gmail.com', '$2y$10$/doOiBMA5PYYt1knYOl8PeMPZRSj3IoiCIVWWQ3T5MGQiJAn4Zj96', '2024-03-05 09:44:40'),
(5, 'Alex', 'Rankl', 'rankl@gmail.com', '$2y$10$.a0ExKlUVBoBJj6Uk.KCAessSPE8BlgIsoEY/9FhrsdmR770mdFFS', '2024-03-11 09:39:47'),
(6, 'mustafa', 'keineAhnung', 'mustafa@gamil.com', '$2y$10$NU65bR2XpIAHkIt6TZP4h.XKF.Zs1v8IEJ6mNDIgK.lXj1mZSCW5q', '2024-03-11 09:56:58'),
(7, 'person3', 'human', 'person3@gmail.com', '$2y$10$vBUyieSl0foPXyWveexSoOtwHdGE.uT89H7M3.6hskPGfShFYzoku', '2024-03-12 07:57:22'),
(8, 'Zija', 'Ozbeck', 'zia.ozbeck@gmail.com', '$2y$10$vxgRD1KAkbUerJHV5A.l/uehPwPEaP9..QO6VCykekqyA8vAAXP4a', '2024-03-12 14:53:14'),
(9, 'Melih', 'Bulut', 'melih.bult@gamil.com', '$2y$10$lLyCDHTJI86HtJkifwWTT.G51.eHo822411ievrkXqr7n.wokaOuK', '2024-03-12 15:19:29'),
(10, 'George', 'Doglas', 'george@gmail.com', '$2y$10$SSMyWpKDaPUNgYmifWgmteW7yiBKPvNbwu6HdHPzysI6bDDrqQH8y', '2024-03-18 15:44:41'),
(11, 'Alice ', 'french', 'alice@gmail.com', '$2y$10$h./YjTRTNs/2oYDsiMa4eexibl9FsEpSEhqpF/lVXX8pQGNJgyB16', '2024-03-19 11:51:30'),
(14, 'test', 'test', 'test@gamil.com', '$2y$10$VfawKnNf28.dTt7hHTObcuIg9saNXzOzlaFu0MzUf1Qu2nGD5n3m.', '2024-04-04 14:13:11'),
(15, 'Test4', 'Testy', 'test4@gmail.com', '$2y$10$7jLmMGtLbiW3HZarMrJXYefl4hMwwdag5B2W9YzZvBOPiV5EcRVJe', '2024-05-27 06:51:08'),
(16, 'Dennis', 'french', 'dennis@gmail.com', '$2y$10$v/w3NoSAQ2KO.gJbyGFiIeICnTMe820kpeHMitzDHytwNmLdYtCDW', '2024-05-27 06:56:23');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `info`
--
ALTER TABLE `info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
