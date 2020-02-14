-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2019 at 08:08 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animes`
--

-- --------------------------------------------------------

--
-- Table structure for table `anime`
--

CREATE TABLE `anime` (
  `idAnime` int(11) NOT NULL,
  `naslov` varchar(45) NOT NULL,
  `autor` varchar(30) NOT NULL,
  `likovi` tinytext NOT NULL,
  `opis` mediumtext NOT NULL,
  `trajanje` varchar(45) NOT NULL,
  `blagajna` varchar(45) NOT NULL,
  `poster` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

--
-- Dumping data for table `anime`
--

INSERT INTO `anime` (`idAnime`, `naslov`, `autor`, `likovi`, `opis`, `trajanje`, `blagajna`, `poster`) VALUES
(1, 'Dragonball Z', 'Akira Toriyama', 'Son Goku, Son Gohan, Krilin, Vegeta, Piccolo', 'Prošle su četiri godine otkako je Son-Goku pobijedio gornjeg vraga Piccola. Sada se oženio Chichi i ima četverogodišnjeg sina po imenu Son-Gohan. Život je miran za njegovu obitelj i prijatelje, ali se onda pojavljuje nepoznati brat, koji mu otkriva da su vanzemaljci. Nazivaju se Saiyans i osvajaju svaku planetu u svemiru korak po korak. Za Son-Goku  kaže da će ubiti točno 100 ljudi na zemlji i pridružiti se svom bratu. Da bi primorao Son-Gokua, Radditz (brat) uzima Son-Gohana kao taoca. Sad Son-Goku, čije se pravo ime zove Kakarott, i Piccolo moraju udružiti snage da poraze ovog zajedničkog neprijatelja ...', '20 min', '400 milijuna USD', 'dragonballz.png'),
(2, 'Inuyasha', 'Tite Kubo', 'Inuyasha, Kagome, Sesoma', 'Inuyasha je poludemon koji zajedno sa svojim prijeteljima traži dijamant od četiri duša kako bi postaopravi demon', '20 min', '140 milijuna USD', 'inuyasha.png'),
(3, 'Naruto Shippuden', 'Masashi Kishimoto', 'Naruto, Sasuke, Kakashi, Sakura, Orochimaru', 'Naruto je mladi ninđa koji unatoč tome što u sebi sadrži čudovište,ima cilj da postane hokage,vođasvog sela', '20min', '600 milijuna USD', 'narutoshippuden.png'),
(4, 'OnePiece', 'Eichiro Oda', 'Luffy,Zorro,Sanji,Nami,Chopper', 'Luffy D Monkey je 17 godišnji momak kojemu je cilj postati kralj gusara zajedno sa svojom gusarskom bandom', '20 min', '750 milijuna USD', 'onepiece.png');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `idKorisnik` int(11) NOT NULL,
  `ime` varchar(45) NOT NULL,
  `prezime` varchar(45) NOT NULL,
  `email` varchar(30) NOT NULL,
  `lozinka` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idKorisnik`, `ime`, `prezime`, `email`, `lozinka`) VALUES
(1, 'test1', 'test1', 'test@gmail.com', 'qwer1234'),
(2, 'test2', 'test2', 'test2@gmail.com', 'test1234'),
(3, 'test3', 'test3', 'test3@gmail.com', 'qwer1234'),
(4, 'test4', 'test4', 'test4@gmail.com', 'test1234'),
(5, 'test5', 'test5', 'test5@gmail.com', 'test1234'),
(6, 'test6', 'test6', 'test6@gmail.com', 'qwer1234'),
(7, 'test7', 'test7', 'test7@gmail.com', 'asdf1234'),
(8, 'test8', 'test8', 'test8@gmail.com', 'qwer1234'),
(9, 'admin', 'admin', 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `zanr`
--

CREATE TABLE `zanr` (
  `idZanr` int(11) NOT NULL,
  `nazivZanra` varchar(45) NOT NULL,
  `anime_idAnime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

--
-- Dumping data for table `zanr`
--

INSERT INTO `zanr` (`idZanr`, `nazivZanra`, `anime_idAnime`) VALUES
(1, 'Znanstvena-Fantastika', 1),
(2, 'Akcijska-Avantura', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`idAnime`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`idKorisnik`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`) USING BTREE;

--
-- Indexes for table `zanr`
--
ALTER TABLE `zanr`
  ADD PRIMARY KEY (`idZanr`),
  ADD UNIQUE KEY `fk_zanr_anime` (`anime_idAnime`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `anime`
  MODIFY `idAnime` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `idKorisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `zanr`
--
ALTER TABLE `zanr`
  MODIFY `idZanr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `zanr`
--
ALTER TABLE `zanr`
  ADD CONSTRAINT `zanr_ibfk_1` FOREIGN KEY (`anime_idAnime`) REFERENCES `anime` (`idAnime`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
