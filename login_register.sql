-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 12. Mrz 2024 um 16:15
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
  `street` varchar(255) NOT NULL,
  `houseNr` varchar(50) NOT NULL,
  `postalNr` varchar(50) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phoneNr` varchar(255) NOT NULL,
  `mobileNr` varchar(255) NOT NULL,
  `publicEmail` varchar(255) NOT NULL,
  `privateEmail` varchar(255) NOT NULL,
  `faxNumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `info`
--

INSERT INTO `info` (`ID`, `street`, `houseNr`, `postalNr`, `city`, `country`, `phoneNr`, `mobileNr`, `publicEmail`, `privateEmail`, `faxNumber`) VALUES
(2, 'Bornemann Straße', '23', '23443', 'Berlin', 'Germany', '2938749823', '34892389074', 'mustafa@gamil.com', 'mustafa@gamil.com', '3874ue'),
(4, 'christen straße', '34', '34556', 'Berlin', 'Germany', '398492384', '593859', '', '', ''),
(6, 'Alexander Straße', '34', '34552', 'Berlin', 'Germany', '', '5930430', 'john.doe@gmail.com', '', '493035jgd'),
(7, 'Prince Straße', '66', '23421', 'München', 'Germany', '030234352', '017429730024', 'zia.ozbeck@gmail.com', 'zia@gmal.de', '348dehw');

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
(1, 'Hassan', 'Yousefi', 'hassan.yousefi@gmail.com', '$2y$10$CCn1yYraYSKwJO7lvX6o8.P7ntMVlJq9pQ/auZ9Cwq0aUhKC1mTya', '2023-12-04 12:24:33'),
(2, 'Ulrike', 'Merz', 'ulrike@test.de', '$2y$10$/tG2g7RY8Z8tYANOds5LUuRHu1QdGGg7gK4TKmuoEWKBz2d/gdi.y', '2023-12-04 13:22:29'),
(3, 'Levi', 'Benath', 'levi@gmail.com', '$2y$10$lpLyqg2Ni/lj158ormh5peO4ICfev7U5TkcBlGaWganovg3bGD5gG', '2023-12-04 13:26:26'),
(4, 'amjad', 'al Mohammad', 'amjad@gmail.com', '$2y$10$/doOiBMA5PYYt1knYOl8PeMPZRSj3IoiCIVWWQ3T5MGQiJAn4Zj96', '2024-03-05 09:44:40'),
(5, 'Alex', 'Rankl', 'rankl@gmail.com', '$2y$10$.a0ExKlUVBoBJj6Uk.KCAessSPE8BlgIsoEY/9FhrsdmR770mdFFS', '2024-03-11 09:39:47'),
(6, 'mustafa', 'keineAhnung', 'mustafa@gamil.com', '$2y$10$NU65bR2XpIAHkIt6TZP4h.XKF.Zs1v8IEJ6mNDIgK.lXj1mZSCW5q', '2024-03-11 09:56:58'),
(7, 'person3', 'human', 'person3@gmail.com', '$2y$10$vBUyieSl0foPXyWveexSoOtwHdGE.uT89H7M3.6hskPGfShFYzoku', '2024-03-12 07:57:22'),
(8, 'Zija', 'Ozbeck', 'zia.ozbeck@gmail.com', '$2y$10$vxgRD1KAkbUerJHV5A.l/uehPwPEaP9..QO6VCykekqyA8vAAXP4a', '2024-03-12 14:53:14');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
