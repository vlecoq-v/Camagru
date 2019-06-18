-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mar. 18 juin 2019 à 08:39
-- Version du serveur :  5.6.43
-- Version de PHP :  5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `camagru`
--

-- --------------------------------------------------------

--
-- Structure de la table `pics`
--

CREATE TABLE `pics` (
  `pic_path` varchar(100) NOT NULL,
  `pic_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pics`
--

INSERT INTO `pics` (`pic_path`, `pic_id`, `usr_id`) VALUES
('public/img/upload/5cdc0c3f2217d.png', 44, 27),
('public/img/upload/5cdc214cac262.png', 47, 27),
('public/img/upload/5ced0df82682a.png', 62, 27),
('public/img/upload/5cfa6bdc201af.png', 76, 27),
('public/img/upload/5d0901881b9d1.png', 89, 45);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `pics`
--
ALTER TABLE `pics`
  ADD PRIMARY KEY (`pic_id`),
  ADD KEY `usr_id` (`usr_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `pics`
--
ALTER TABLE `pics`
  MODIFY `pic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `pics`
--
ALTER TABLE `pics`
  ADD CONSTRAINT `usr_id` FOREIGN KEY (`usr_id`) REFERENCES `users` (`usr_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
