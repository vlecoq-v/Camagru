-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  jeu. 16 mai 2019 à 10:38
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
-- Structure de la table `comm`
--

CREATE TABLE `comm` (
  `user_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comm` text NOT NULL,
  `pic_id` int(11) NOT NULL,
  `comm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comm`
--

INSERT INTO `comm` (`user_id`, `create_date`, `comm`, `pic_id`, `comm_id`) VALUES
(32, '2019-05-16 13:14:50', 'Mamen le PREMIER commentaires !', 51, 1),
(35, '2019-05-16 16:54:27', 'asdf', 54, 2),
(35, '2019-05-16 17:04:06', 'asdf', 54, 3),
(35, '2019-05-16 17:36:28', 'mamen', 54, 4),
(35, '2019-05-16 17:36:41', 'mamen', 54, 5);

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `user_id` int(11) NOT NULL,
  `pic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`user_id`, `pic_id`) VALUES
(27, 44);

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
('public/img/upload/5cdc0d04cc26e.png', 45, 27),
('public/img/upload/5cdc0f793f7ac.png', 46, 27),
('public/img/upload/5cdc214cac262.png', 47, 27),
('public/img/upload/5cdd43b22edc4.png', 48, 27),
('public/img/upload/5cdd5cf25c8e6.png', 49, 27),
('public/img/upload/5cdd5cfad7889.png', 50, 27),
('public/img/upload/5cdd5d08c402a.png', 51, 27),
('public/img/upload/5cdd6301ea2ac.png', 52, 27),
('public/img/upload/5cdd7d3e5412b.png', 53, 27),
('public/img/upload/5cdd7e8bb0acb.png', 54, 27);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `usr_id` int(11) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `pwd` varchar(200) NOT NULL,
  `username` varchar(42) NOT NULL,
  `usr_pic` varchar(100) DEFAULT NULL,
  `validated` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`usr_id`, `mail`, `pwd`, `username`, `usr_pic`, `validated`) VALUES
(14, 'mamen@gmail.com', '1ce8086959a6598790ce25adedba04e987a684ff7a6b58dfc368afa1f0acf95c4fc0e32a0e0d1aa8d861e55070c42f7592fd', 'mamen', NULL, 0),
(16, 'vlecoq-v@student.42.fr', 'def4d8fc452e67bd9c8b8075f239b1cb683b2b83e47e0fe1d0534e38f7c459c012bc8b90c976ba40a7114f58497d4657fa10', 'vlecoq-v', NULL, 0),
(17, 'jocohen@student.42.fr', 'def4d8fc452e67bd9c8b8075f239b1cb683b2b83e47e0fe1d0534e38f7c459c012bc8b90c976ba40a7114f58497d4657fa10', 'jocohen', NULL, 0),
(22, 'morgani', 'def4d8fc452e67bd9c8b8075f239b1cb683b2b83e47e0fe1d0534e38f7c459c012bc8b90c976ba40a7114f58497d4657fa10125ba7ac7c3a5d63acc2d76a2815', 'morgani', NULL, 0),
(27, 'asdf@gmail.com', 'def4d8fc452e67bd9c8b8075f239b1cb683b2b83e47e0fe1d0534e38f7c459c012bc8b90c976ba40a7114f58497d4657fa10125ba7ac7c3a5d63acc2d76a2815', 'asdf', NULL, 0),
(28, 'asdfasdf@gmail.com', 'def4d8fc452e67bd9c8b8075f239b1cb683b2b83e47e0fe1d0534e38f7c459c012bc8b90c976ba40a7114f58497d4657fa10125ba7ac7c3a5d63acc2d76a2815', 'asdfasdf', NULL, 0),
(29, 'asdf1@gmail.com', 'def4d8fc452e67bd9c8b8075f239b1cb683b2b83e47e0fe1d0534e38f7c459c012bc8b90c976ba40a7114f58497d4657fa10125ba7ac7c3a5d63acc2d76a2815', 'asdf1', NULL, 0),
(30, 'asdf2@gmail.com', 'def4d8fc452e67bd9c8b8075f239b1cb683b2b83e47e0fe1d0534e38f7c459c012bc8b90c976ba40a7114f58497d4657fa10125ba7ac7c3a5d63acc2d76a2815', 'asdf2', NULL, 0),
(32, 'asdf4', 'def4d8fc452e67bd9c8b8075f239b1cb683b2b83e47e0fe1d0534e38f7c459c012bc8b90c976ba40a7114f58497d4657fa10125ba7ac7c3a5d63acc2d76a2815', 'asdf4', NULL, 0),
(33, 'asdf5@gmail.com', '8f7d5a8870fa0925784fa1e8007517dfec082095a2c0910f5b75a6ec2f54d3ba4498278a26f032ecb4ac39e7aecc1c3cda3640567b52b9db5da6c0636e33d003', 'asdf55', NULL, 0),
(35, 'asdf3@gmail.com', 'def4d8fc452e67bd9c8b8075f239b1cb683b2b83e47e0fe1d0534e38f7c459c012bc8b90c976ba40a7114f58497d4657fa10125ba7ac7c3a5d63acc2d76a2815', 'asdf3', NULL, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comm`
--
ALTER TABLE `comm`
  ADD PRIMARY KEY (`comm_id`),
  ADD KEY `user_cascade` (`user_id`),
  ADD KEY `pics cascade` (`pic_id`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD KEY `pic_cascade` (`pic_id`),
  ADD KEY `userXlike_cascade` (`user_id`);

--
-- Index pour la table `pics`
--
ALTER TABLE `pics`
  ADD PRIMARY KEY (`pic_id`),
  ADD KEY `usr_id` (`usr_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usr_id`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `pseudo` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comm`
--
ALTER TABLE `comm`
  MODIFY `comm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `pics`
--
ALTER TABLE `pics`
  MODIFY `pic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comm`
--
ALTER TABLE `comm`
  ADD CONSTRAINT `pics cascade` FOREIGN KEY (`pic_id`) REFERENCES `pics` (`pic_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_cascade` FOREIGN KEY (`user_id`) REFERENCES `users` (`usr_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `pic_cascade` FOREIGN KEY (`pic_id`) REFERENCES `pics` (`pic_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userXlike_cascade` FOREIGN KEY (`user_id`) REFERENCES `users` (`usr_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `pics`
--
ALTER TABLE `pics`
  ADD CONSTRAINT `usr_id` FOREIGN KEY (`usr_id`) REFERENCES `users` (`usr_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
