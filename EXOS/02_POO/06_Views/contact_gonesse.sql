-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 14 nov. 2024 à 09:17
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `contact_gonesse`
--

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `created_at`) VALUES
(1, 'Hugues', 'hugues@email.com', '01-02-03-04-05', '2024-11-08 14:01:39'),
(2, 'Cassie', 'cassie@email.com', '01-02-03-04-05', '2024-11-08 14:03:03'),
(3, 'Gertrude', 'gertrude@email.com', '01-02-03-04-05', '2024-11-08 14:21:49'),
(4, 'Michel', 'michel@email.com', '01-02-03-04-05', '2024-11-08 14:25:18'),
(5, 'Jean', 'jean@email.com', '01-02-03-04-05', '2024-11-08 14:47:39'),
(6, 'Violette', 'violette@email.com', '01-02-03-04-05', '2024-11-08 15:54:25'),
(7, 'Lionel', 'lionel@email.com', '01-02-03-04-05', '2024-11-08 15:57:11'),
(8, 'Julie', 'jules@email.com', '01-02-03-04-05', '2024-11-10 11:26:20'),
(9, 'Marvin', 'marvin@email.com', '', '2024-11-10 11:28:17'),
(10, 'Luc', 'luc@email.com', '01-02-03-04-05', '2024-11-10 11:42:50'),
(11, 'Sharon', 'sharon@email.com', '01-02-03-04-05', '2024-11-13 14:17:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
