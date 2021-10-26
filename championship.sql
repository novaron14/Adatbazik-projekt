-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Nov 29. 19:58
-- Kiszolgáló verziója: 10.4.16-MariaDB
-- PHP verzió: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `championship`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `bajnoksag`
--

CREATE TABLE `bajnoksag` (
  `nev` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `bajnoksagID` int(3) NOT NULL,
  `sportag` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `bajnoksag`
--

INSERT INTO `bajnoksag` (`nev`, `bajnoksagID`, `sportag`) VALUES
('Sí Kupa', 1, 'Síelés'),
('Box Kupa', 2, 'Box'),
('Golf Kupa', 3, 'Golf'),
('Lovagló Kupa', 4, 'Lovaglás'),
('Freestyle Kupa (foci', 5, 'Freestyle foci'),
('Súlyemelés', 6, 'Súlyemelés');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `mérkőzés`
--

CREATE TABLE `mérkőzés` (
  `merkozesID` int(3) NOT NULL,
  `biro_neve` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `helye` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `bajnoksagID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `mérkőzés`
--

INSERT INTO `mérkőzés` (`merkozesID`, `biro_neve`, `helye`, `bajnoksagID`) VALUES
(1, 'Kovács Ákos', '1', 1),
(2, 'Kovács Ákos', '2', 1),
(3, 'Berki Lajos', '3', 1),
(4, 'Berki Lajos', '2', 1),
(5, 'Kovács Ákos', '4', 1),
(6, 'Oláh Ádám', '1', 2),
(7, 'Hordós Iván', '5', 2),
(8, 'Hugh Mungus', '3', 2),
(9, 'Kovács Ákos', '2', 3),
(10, 'Lyu Xiajoun', '8', 6),
(11, 'Kelemen Anna', '12', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `résztvevő`
--

CREATE TABLE `résztvevő` (
  `resztvevoID` int(3) NOT NULL,
  `szurkolo_nev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `eletkor` int(3) NOT NULL,
  `merkozesID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `résztvevő`
--

INSERT INTO `résztvevő` (`resztvevoID`, `szurkolo_nev`, `eletkor`, `merkozesID`) VALUES
(0, 'Kristin Medina', 27, 4),
(1, 'Dani Hays', 43, 1),
(2, 'Elyse Reilly', 35, 2),
(3, 'Mohsin Houston', 23, 1),
(4, 'Mahira Duran', 65, 5),
(5, 'Alba Rivera', 78, 4),
(6, 'Lori Curry', 87, 7),
(7, 'Vikki Lord', 98, 3),
(8, 'Rita Randolph', 23, 5),
(9, 'Stanislaw Lamb', 34, 7),
(10, 'Sahib Krueger', 45, 6),
(11, 'Nelly Moreno', 38, 9),
(12, 'Constance Mueller', 56, 8),
(13, 'Nia Chavez', 67, 5),
(14, 'Josiah Mullen', 28, 9),
(15, 'Roseanna Talbot', 36, 7),
(16, 'Jae Mcloughlin', 42, 4),
(17, 'Jimmy Dickson', 17, 9),
(18, 'Aisling Battle', 23, 7),
(19, 'Jose East', 49, 2),
(20, 'Ayda Lancaster', 45, 6),
(21, 'Aliesha Reader', 42, 8),
(22, 'Jillian Wilks', 76, 7),
(23, 'Keeva Quintana', 39, 8),
(24, 'Marni Blevins', 54, 7),
(25, 'Giacomo Petty', 97, 4);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `versenyző`
--

CREATE TABLE `versenyző` (
  `versenyzoID` int(3) NOT NULL,
  `nemzetiseg` varchar(20) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `nev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `eletkor` int(3) NOT NULL,
  `pontszam` int(4) DEFAULT NULL,
  `merkozesID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `versenyző`
--

INSERT INTO `versenyző` (`versenyzoID`, `nemzetiseg`, `nev`, `eletkor`, `pontszam`, `merkozesID`) VALUES
(1, 'svéd', 'Ville Fagerudd', 23, 45, 1),
(2, 'svéd', 'Edgar Blix', 34, 35, 1),
(3, 'svéd', 'Emmanuel Gunnarsson', 29, 34, 2),
(4, 'magyar', 'Kovács István', 34, 26, 2),
(5, 'német', 'Lucas Schwarz', 42, 12, 10),
(6, 'egyiptomi', 'Adib Ihab', 28, 23, 5),
(7, 'angol', 'Olivia-Rose Black', 54, 3, 2),
(8, 'kínai', 'Lyu Xiaojun', 35, 99, 6),
(9, 'angol', 'Libby Santos', 34, 87, 6),
(10, 'svéd', 'Felix Kjellberg', 36, 543, 1),
(11, 'líbia', 'Ahmed Abdul', 65, 21, 1);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `bajnoksag`
--
ALTER TABLE `bajnoksag`
  ADD PRIMARY KEY (`bajnoksagID`);

--
-- A tábla indexei `mérkőzés`
--
ALTER TABLE `mérkőzés`
  ADD PRIMARY KEY (`merkozesID`),
  ADD KEY `bajnoksagID` (`bajnoksagID`);

--
-- A tábla indexei `résztvevő`
--
ALTER TABLE `résztvevő`
  ADD PRIMARY KEY (`resztvevoID`),
  ADD KEY `merkozesID` (`merkozesID`);

--
-- A tábla indexei `versenyző`
--
ALTER TABLE `versenyző`
  ADD PRIMARY KEY (`versenyzoID`),
  ADD KEY `merkozesID` (`merkozesID`);

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `mérkőzés`
--
ALTER TABLE `mérkőzés`
  ADD CONSTRAINT `mérkőzés_ibfk_1` FOREIGN KEY (`bajnoksagID`) REFERENCES `bajnoksag` (`bajnoksagID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `résztvevő`
--
ALTER TABLE `résztvevő`
  ADD CONSTRAINT `résztvevő_ibfk_1` FOREIGN KEY (`merkozesID`) REFERENCES `mérkőzés` (`merkozesID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `versenyző`
--
ALTER TABLE `versenyző`
  ADD CONSTRAINT `versenyző_ibfk_1` FOREIGN KEY (`merkozesID`) REFERENCES `mérkőzés` (`merkozesID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
