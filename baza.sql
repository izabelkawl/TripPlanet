-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Cze 2019, 23:16
-- Wersja serwera: 10.1.38-MariaDB
-- Wersja PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `baza`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `miasto`
--

CREATE TABLE `miasto` (
  `id` int(11) NOT NULL,
  `panstwo` text COLLATE utf8_polish_ci NOT NULL,
  `miasto` text COLLATE utf8_polish_ci NOT NULL,
  `hotel` text COLLATE utf8_polish_ci NOT NULL,
  `ilosc_dni` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `wylot` text COLLATE utf8_polish_ci NOT NULL,
  `zdj` text COLLATE utf8_polish_ci NOT NULL,
  `nr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `miasto`
--

INSERT INTO `miasto` (`id`, `panstwo`, `miasto`, `hotel`, `ilosc_dni`, `cena`, `wylot`, `zdj`, `nr`) VALUES
(37, 'Polska', 'Zakopane', 'Hotel Gold Zakopane & SPA', 6, 522, '-', 'PZ.jpg', 1),
(38, 'Polska', 'Szczecin', 'Sheraton Poznan Hotel', 5, 738, '-', 'PS.jpg', 2),
(39, 'Polska', 'Warszawa', 'Hotel Warszawa', 5, 1224, '-', 'PW.jpg', 3),
(41, 'Niemcy', 'Berlin', 'Hotel Amano', 12, 1299, 'Warszawa Okęcie', 'NB.jpg', 1),
(42, 'Niemcy', 'Drezno', 'Park Inn by Radisson Dresden', 7, 431, 'Rzeszów Jasionka', 'ND.jpg', 2),
(43, 'Niemcy', 'Monahium', 'Eurodom', 14, 299, 'Poznań Ławica', 'NM.jpg', 3),
(44, 'Grecja', 'Ateny', 'Dorian Inn Hotel', 4, 5122, 'Kraków Balice', 'GA.jpg', 1),
(45, 'Grecja', 'Lamia', 'HOTEL THERMOPYLES', 7, 981, 'Modlin', 'GL.jpg', 2),
(46, 'Irlandia', 'Dublin', 'Dublin Central Inn', 3, 599, 'Poznań Ławica', 'ID.jpg', 1),
(47, 'Irlandia', 'Cork', 'Clayton Hotel Cork City', 5, 722, 'Kraków Balice', 'IC.jpg', 2),
(48, 'Irlandia', 'Limerick', 'Limerick Strand Hotel', 7, 4099, 'Kraków Balice', 'IL.jpg', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `telefon` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL,
  `ilosc_logowan` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `imie`, `nazwisko`, `email`, `telefon`, `haslo`, `ilosc_logowan`) VALUES
(36, 'Adam', 'Nowak', 'adam@gmail.com', '123456789', '$2y$10$tPtsG8iJnlYc/HB.gOWJbe1TTQhguQbNgldKsGwMeUQQW1Au37F5.', 66),
(37, 'Magdalena', 'Nowakowska', 'magdalena@gmail.com', '987654321', '$2y$10$Xdu1.ldLM9KDxD5twNbegu7ca0hpWbNHPB4EtlIMAn3fGBhQ131h2', 0),
(38, 'Martyna', 'Zygmunt', 'martyna@gmail.com', '123123123', '$2y$10$//EPCoqpxGHndtgOaX7i5uAh.jMPwv3Zg6i6LdowuhWu78C7oHg4a', 5),
(39, 'Karol', 'Nowak', 'karol@gmail.com', '234234234', '$2y$10$pS/C8Lb1cBoK7mJUmWtxkOqd3Bu0sJKVVjkcaqfCTE5QCVNIc1OpO', 4),
(52, 'Admin', 'Admin', 'admin@gmail.com', '12345678', '$2y$10$iCNnAMcFEcy0anYy4l3Wreij6dm43VdpOsA6ak1my/Nf7dr6qE.lO', 20);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wycieczki`
--

CREATE TABLE `wycieczki` (
  `id_wycieczki` int(11) NOT NULL,
  `data_wyjazdu` text COLLATE utf8_polish_ci NOT NULL,
  `id_miasta` int(11) NOT NULL,
  `nazwa_miasta` text COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `cena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wycieczki`
--

INSERT INTO `wycieczki` (`id_wycieczki`, `data_wyjazdu`, `id_miasta`, `nazwa_miasta`, `email`, `imie`, `nazwisko`, `cena`) VALUES
(5, '2019-06-06', 43, 'Drezno', 'karol@gmail.com', 'Karol', 'Nowak', 431),
(6, '2019-11-15', 43, 'Monahium', 'martyna@gmail.com', 'Martyna', 'Zygmunt', 897);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `miasto`
--
ALTER TABLE `miasto`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `email` (`email`);
ALTER TABLE `uzytkownicy` ADD FULLTEXT KEY `nazwisko` (`nazwisko`);

--
-- Indeksy dla tabeli `wycieczki`
--
ALTER TABLE `wycieczki`
  ADD PRIMARY KEY (`id_wycieczki`),
  ADD KEY `id_wycieczki` (`id_miasta`),
  ADD KEY `email` (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `miasto`
--
ALTER TABLE `miasto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT dla tabeli `wycieczki`
--
ALTER TABLE `wycieczki`
  MODIFY `id_wycieczki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
