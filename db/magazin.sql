-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mai 07, 2020 la 10:05 PM
-- Versiune server: 10.4.11-MariaDB
-- Versiune PHP: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `magazin`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `admin`
--

CREATE TABLE `admin` (
  `admin_nume` text NOT NULL,
  `admin_parola` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `categorii`
--

CREATE TABLE `categorii` (
  `id_categorie` smallint(5) UNSIGNED NOT NULL,
  `nume_categorie` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `comentarii`
--

CREATE TABLE `comentarii` (
  `id_comentariu` int(200) UNSIGNED NOT NULL,
  `id_carte` int(200) UNSIGNED NOT NULL,
  `nume_utilizator` text NOT NULL,
  `adresa_email` text NOT NULL,
  `comentariu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `domenii`
--

CREATE TABLE `domenii` (
  `id_domeniu` smallint(200) UNSIGNED NOT NULL,
  `nume_domeniu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `haine`
--

CREATE TABLE `haine` (
  `id_haine` int(10) UNSIGNED NOT NULL,
  `domeniu` text NOT NULL,
  `categorie` text NOT NULL,
  `marime` varchar(10) NOT NULL,
  `pret` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tranzactii`
--

CREATE TABLE `tranzactii` (
  `id_tranzactie` int(10) UNSIGNED NOT NULL,
  `data_tranzactiei` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `nume_cumparator` text NOT NULL,
  `adresa_cumparator` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `vanzari`
--

CREATE TABLE `vanzari` (
  `id_tranzactie` int(10) UNSIGNED NOT NULL,
  `id_haine` int(10) UNSIGNED NOT NULL,
  `nr_buc` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `categorii`
--
ALTER TABLE `categorii`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Indexuri pentru tabele `comentarii`
--
ALTER TABLE `comentarii`
  ADD PRIMARY KEY (`id_comentariu`);

--
-- Indexuri pentru tabele `domenii`
--
ALTER TABLE `domenii`
  ADD PRIMARY KEY (`id_domeniu`);

--
-- Indexuri pentru tabele `haine`
--
ALTER TABLE `haine`
  ADD PRIMARY KEY (`id_haine`);

--
-- Indexuri pentru tabele `tranzactii`
--
ALTER TABLE `tranzactii`
  ADD PRIMARY KEY (`id_tranzactie`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `categorii`
--
ALTER TABLE `categorii`
  MODIFY `id_categorie` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `comentarii`
--
ALTER TABLE `comentarii`
  MODIFY `id_comentariu` int(200) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `domenii`
--
ALTER TABLE `domenii`
  MODIFY `id_domeniu` smallint(200) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `haine`
--
ALTER TABLE `haine`
  MODIFY `id_haine` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `tranzactii`
--
ALTER TABLE `tranzactii`
  MODIFY `id_tranzactie` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
