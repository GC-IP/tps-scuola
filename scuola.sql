-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 04, 2025 alle 20:20
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scuola`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `5ia`
--

CREATE TABLE `5ia` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `cognome` text NOT NULL,
  `assenze` int(150) NOT NULL,
  `media_voti` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `5ia`
--

INSERT INTO `5ia` (`id`, `nome`, `cognome`, `assenze`, `media_voti`) VALUES
(1, 'mario', 'rossi', 800, 2),
(2, 'Giulia', 'Bianchi', 3, 9),
(3, 'Luca', 'Verdi', 10, 7),
(4, 'Anna', 'Neri', 2, 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ruolo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `ruolo`) VALUES
(1, 'testuser', 'e16b2ab8d12314bf4efbd6203906ea6c', 'studente'),
(2, 'greta', '27b4b5b01b0d1fcab2046369720ff75e', 'studente'),
(3, 'andrea', '27b4b5b01b0d1fcab2046369720ff75e', 'docente'),
(4, 'randomuser', '48e03915a80e6ae6953aef8a20d980fb', 'docente');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `5ia`
--
ALTER TABLE `5ia`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
