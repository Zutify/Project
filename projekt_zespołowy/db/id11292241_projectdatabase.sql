-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 09 Lis 2019, 12:49
-- Wersja serwera: 10.3.16-MariaDB
-- Wersja PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `id11292241_projectdatabase`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Address`
--

CREATE TABLE `Address` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Street` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Local` varchar(3) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Notification`
--

CREATE TABLE `Notification` (
  `ID` int(10) UNSIGNED NOT NULL,
  `RideID` int(10) NOT NULL,
  `UserID` int(10) NOT NULL,
  `Comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Rating`
--

CREATE TABLE `Rating` (
  `ID` int(10) UNSIGNED NOT NULL,
  `RideID` int(10) NOT NULL,
  `UserID` int(10) NOT NULL,
  `Mark` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Ride`
--

CREATE TABLE `Ride` (
  `UserID` int(10) NOT NULL,
  `RideInfoID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `RideInfo`
--

CREATE TABLE `RideInfo` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Date` date NOT NULL,
  `Start` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Destination` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Places` int(10) DEFAULT NULL,
  `LeavingTime` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `User`
--

CREATE TABLE `User` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Surname` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Login` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Email` varchar(320) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `PhoneNumber` varchar(9) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `User`
--

INSERT INTO `User` (`ID`, `Name`, `Surname`, `Login`, `Password`, `Email`, `PhoneNumber`) VALUES
(1, 'Paweł', 'Patyk', 'deblil', 'Poziom1a', 'ppawdadpawdaw@zut.edu.pl', '123456789'),
(7, 'aaaaaaaaaaaa', 'aaaaaaaaaaa', 'aaaaaaaaaaaa', 'aaaaaaaa123', 'zas@zut.edu.pl', '123456789');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `Address`
--
ALTER TABLE `Address`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `Notification`
--
ALTER TABLE `Notification`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `Rating`
--
ALTER TABLE `Rating`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `Ride`
--
ALTER TABLE `Ride`
  ADD PRIMARY KEY (`UserID`,`RideInfoID`);

--
-- Indeksy dla tabeli `RideInfo`
--
ALTER TABLE `RideInfo`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Login` (`Login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `Address`
--
ALTER TABLE `Address`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `Notification`
--
ALTER TABLE `Notification`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `Rating`
--
ALTER TABLE `Rating`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `RideInfo`
--
ALTER TABLE `RideInfo`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `User`
--
ALTER TABLE `User`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
