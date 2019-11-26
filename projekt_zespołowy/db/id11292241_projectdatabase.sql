-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 26 Lis 2019, 21:37
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
  `Local` varchar(3) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `CoordX` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `CoordY` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `Address`
--

INSERT INTO `Address` (`ID`, `Street`, `Local`, `CoordX`, `CoordY`) VALUES
(1, 'Wielkopolska', '8', '0', '0'),
(2, 'Szeroka', '32', '0', '0'),
(3, 'Start', '99', '99', '99'),
(4, 'Stop', '76', '88', '88');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Notification`
--

CREATE TABLE `Notification` (
  `ID` int(10) UNSIGNED NOT NULL,
  `RideInfoID` int(10) UNSIGNED NOT NULL,
  `UserID` int(10) UNSIGNED DEFAULT NULL,
  `Comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Rating`
--

CREATE TABLE `Rating` (
  `ID` int(10) UNSIGNED NOT NULL,
  `RideInfoID` int(10) UNSIGNED NOT NULL,
  `UserID` int(10) UNSIGNED DEFAULT NULL,
  `Mark` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Ride`
--

CREATE TABLE `Ride` (
  `UserID` int(10) UNSIGNED NOT NULL,
  `RideInfoID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `RideInfo`
--

CREATE TABLE `RideInfo` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Driver` int(4) NOT NULL,
  `Date` date NOT NULL,
  `Start` int(4) NOT NULL,
  `Destination` int(4) NOT NULL,
  `Places` int(10) DEFAULT NULL,
  `LeavingTime` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `RideInfo`
--

INSERT INTO `RideInfo` (`ID`, `Driver`, `Date`, `Start`, `Destination`, `Places`, `LeavingTime`) VALUES
(1, 10, '2019-11-27', 1, 2, 4, '09:00:00.000000'),
(2, 1, '2019-11-27', 1, 2, 5, '13:00:00.000000'),
(3, 10, '2019-11-27', 3, 4, 3, '15:00:00.000000'),
(4, 10, '2019-11-27', 1, 4, 4, '13:00:00.000000');

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
(7, 'aaaaaaaaaaaa', 'aaaaaaaaaaa', 'aaaaaaaaaaaa', 'aaaaaaaa123', 'zas@zut.edu.pl', '123456789'),
(10, 'Admian', 'Rootowski', 'admin', 'd1c0e187a4a186f5cae8caab0f144cd1', 'admin1@zut.edu.pl', '123456789'),
(11, 'Janusz', 'Motyk', 'Janek123', '3fc0a7acf087f549ac2b266baf94b8b1', 'mj54321@zut.edu.pl', '987654321'),
(12, 'Janek', 'Kowalski', 'Admin1234', 'bdc87b9c894da5168059e00ebffb9077', 'ad1234@zut.edu.pl', '510510510'),
(13, 'Dawid', 'Dawidowski', 'dawid12345', 'd1c0e187a4a186f5cae8caab0f144cd1', 'dawid1@zut.edu.pl', '123456789'),
(14, 'Jan', 'Motyka', 'Student123', 'e4a6a34a2c625d52f26846f5e3d22064', 'mj@zut.edu.pl', '987654321'),
(16, 'Gawel', 'Gatyk', 'patykpatyk', 'a63edd9fa21ecd1a913e5e737d14ec8c', 'pp41473@zut.edu.pl', '510543865'),
(17, 'Guba', 'Giena', 'Kubakuba', '245e8af29e8de07cef40fc104bf51e1a', 'gg41473@zut.edu.pl', '510543865'),
(18, 'Gawel', 'Hatyk', 'Adminessa', '9858e204606b5504dbdbdbc37421dfaa', 'pp41473@zut.edu.pl', '510543865'),
(24, 'Pawek', 'Patyk', 'Adminadmin12234456', 'f42f640c5cd8efbc613e4196dc6ba100', 'pp16@zut.edu.pl', '510543865'),
(30, 'Hshsh', 'Hshsh', 'Essaesaa', '5505e83da4947f3e2a867f87c6d4a9d6', 'rr41723@zut.edu.pl', '510543865'),
(32, 'Pawe', 'Patyk', 'Shhshe16', 'f440d7d6e42f6b8459d3c458f20bce94', 'pp7272@zut.edu.pl', '510543865'),
(38, 'Pawe', 'Patyk', 'Shhshe16zbsh', '1efb0c2055f906d3f780cb48eabe7aed', 'pp7227s2@zut.edu.pl', '510543865'),
(39, 'Pawex', 'Patyk', 'Pawel', 'a63edd9fa21ecd1a913e5e737d14ec8c', 'pp41473@zut.edu.pl', '510543865'),
(40, 'pawel', 'patyk', 'pawex', '015c337b30b4951e35cb3628f11671a3', 'xddd@zut.edu.pl', '123456789'),
(41, 'Fff', 'Vggg', 'Gffhvd', '6c6f9d0c97c61660b011988c3b19d53a', 'pp100@zut.edu.pl', '123456789');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `UserCar`
--

CREATE TABLE `UserCar` (
  `UserID` int(4) NOT NULL,
  `Brand` varchar(16) CHARACTER SET utf8 NOT NULL,
  `Model` varchar(16) CHARACTER SET utf8 NOT NULL,
  `Description` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `UserCar`
--

INSERT INTO `UserCar` (`UserID`, `Brand`, `Model`, `Description`) VALUES
(10, 'Volvo', 'V40', 'Nie wpuszczam osób z jedzeniem. Samochód 5 drzwiowy z możliwością spakowania bagażu.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Verify`
--

CREATE TABLE `Verify` (
  `UserID` int(4) NOT NULL,
  `Vkey` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Verified` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `Verify`
--

INSERT INTO `Verify` (`UserID`, `Vkey`, `Verified`) VALUES
(0, 'd05c8d3f21f9a24f5b9eee9a9b41240e', 0),
(38, '6e99f89048c45f2ac347d2f440f252b1', 1),
(39, 'a3203d821e98b52ba441018b68ee9acd', 0),
(40, '2180dce79f24ac718ad09c826f842a9f', 0),
(41, '42d80b40e600ff84e284f16f8f83dd01', 0);

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
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FkNotificationRideInfo` (`RideInfoID`),
  ADD KEY `FkNotificationUser` (`UserID`);

--
-- Indeksy dla tabeli `Rating`
--
ALTER TABLE `Rating`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FkRatingUser` (`UserID`),
  ADD KEY `FkRationRideInfo` (`RideInfoID`);

--
-- Indeksy dla tabeli `Ride`
--
ALTER TABLE `Ride`
  ADD PRIMARY KEY (`UserID`,`RideInfoID`),
  ADD KEY `FkRideRideInfo` (`RideInfoID`);

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
-- Indeksy dla tabeli `UserCar`
--
ALTER TABLE `UserCar`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `Address`
--
ALTER TABLE `Address`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `User`
--
ALTER TABLE `User`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `Notification`
--
ALTER TABLE `Notification`
  ADD CONSTRAINT `FkNotificationRideInfo` FOREIGN KEY (`RideInfoID`) REFERENCES `RideInfo` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FkNotificationUser` FOREIGN KEY (`UserID`) REFERENCES `User` (`ID`) ON DELETE SET NULL;

--
-- Ograniczenia dla tabeli `Rating`
--
ALTER TABLE `Rating`
  ADD CONSTRAINT `FkRatingUser` FOREIGN KEY (`UserID`) REFERENCES `User` (`ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `FkRationRideInfo` FOREIGN KEY (`RideInfoID`) REFERENCES `RideInfo` (`ID`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `Ride`
--
ALTER TABLE `Ride`
  ADD CONSTRAINT `FkRideRideInfo` FOREIGN KEY (`RideInfoID`) REFERENCES `RideInfo` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FkRideUser` FOREIGN KEY (`UserID`) REFERENCES `User` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
