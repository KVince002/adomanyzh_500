-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3306
-- Létrehozás ideje: 2022. Már 16. 15:56
-- Kiszolgáló verziója: 8.0.21
-- PHP verzió: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `adomany_oldal`
--
CREATE DATABASE IF NOT EXISTS `adomany_oldal` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `adomany_oldal`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `adomanycelok`
--

DROP TABLE IF EXISTS `adomanycelok`;
CREATE TABLE IF NOT EXISTS `adomanycelok` (
  `CelID` int NOT NULL AUTO_INCREMENT,
  `Cim` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Leiras` text COLLATE utf8mb4_general_ci,
  `Szervezo` int DEFAULT NULL,
  `Cel` int DEFAULT NULL,
  `MinOsszeg` int DEFAULT NULL,
  `Jelenleg` int DEFAULT NULL,
  PRIMARY KEY (`CelID`),
  KEY `Szervezo` (`Szervezo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `adomanyszerv_profil`
--

DROP TABLE IF EXISTS `adomanyszerv_profil`;
CREATE TABLE IF NOT EXISTS `adomanyszerv_profil` (
  `ProfilID` int NOT NULL AUTO_INCREMENT,
  `FelhID` int DEFAULT NULL,
  `Elnevezes` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Leiras` text COLLATE utf8mb4_general_ci,
  `Tel` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`ProfilID`),
  KEY `FelhID` (`FelhID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

DROP TABLE IF EXISTS `felhasznalok`;
CREATE TABLE IF NOT EXISTS `felhasznalok` (
  `FelhID` int NOT NULL AUTO_INCREMENT,
  `FelhTipus` int DEFAULT NULL,
  `FelhNev` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Jelszo` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`FelhID`),
  KEY `FelhTipus` (`FelhTipus`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`FelhID`, `FelhTipus`, `FelhNev`, `Email`, `Jelszo`) VALUES
(1, 1, 'zolika', 'kiss.zoli99@gmail.hu', '59ae6b6e9ea875016f298f048e4f7b23cb5f2e421df03b886ef583295122db3691a27965fbfb6c8e0fb271ae2638610568cb0877e74c625632c06d7c34e3c617');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalo_tipusok`
--

DROP TABLE IF EXISTS `felhasznalo_tipusok`;
CREATE TABLE IF NOT EXISTS `felhasznalo_tipusok` (
  `TipusID` int NOT NULL AUTO_INCREMENT,
  `TipusNev` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`TipusID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `felhasznalo_tipusok`
--

INSERT INTO `felhasznalo_tipusok` (`TipusID`, `TipusNev`) VALUES
(1, 'felhasználó'),
(2, 'adományszerv'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felh_profil`
--

DROP TABLE IF EXISTS `felh_profil`;
CREATE TABLE IF NOT EXISTS `felh_profil` (
  `ProfilID` int NOT NULL AUTO_INCREMENT,
  `FelhID` int DEFAULT NULL,
  `Keresztnev` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Vezeteknev` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Tel` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Fabatka` int DEFAULT NULL,
  PRIMARY KEY (`ProfilID`),
  KEY `FelhID` (`FelhID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `felh_profil`
--

INSERT INTO `felh_profil` (`ProfilID`, `FelhID`, `Keresztnev`, `Vezeteknev`, `Tel`, `Fabatka`) VALUES
(1, 1, 'Kiss', 'Zoltán', '06702225544', 25000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
