-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  lun. 10 juin 2019 à 01:48
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
(27, '2019-05-28 11:51:31', 'asdf', 62, 10),
(27, '2019-05-28 11:51:43', 'sdfg', 62, 11),
(27, '2019-05-28 11:55:57', 'cvbcn', 62, 12),
(27, '2019-05-28 11:56:34', 'cvbcn', 62, 13),
(27, '2019-06-07 14:32:15', 'Mamen', 76, 31),
(27, '2019-06-07 14:32:18', 'zxcvv', 76, 32),
(27, '2019-06-07 14:32:22', 'zxcvv', 76, 33),
(45, '2019-06-07 14:33:52', 'cvcv', 62, 34),
(48, '2019-06-10 08:41:38', 'lkjnsdflkjvn', 88, 35),
(48, '2019-06-10 08:41:42', 'zxcvvvv', 88, 36);

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `usr_id` int(11) NOT NULL,
  `pic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`usr_id`, `pic_id`) VALUES
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
('public/img/upload/5cdc214cac262.png', 47, 27),
('public/img/upload/5ced0df82682a.png', 62, 27),
('public/img/upload/5cfa6bdc201af.png', 76, 27),
('public/img/upload/5cfa77d9c52df.png', 84, 45),
('public/img/upload/5cfa789d26646.png', 85, 45),
('public/img/upload/5cfa78a47da0b.png', 86, 45),
('public/img/upload/5cfa78ab44845.png', 87, 45),
('public/img/upload/5cfa78b33441c.png', 88, 45);

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
  `validated` int(11) NOT NULL DEFAULT '0',
  `email_notif` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`usr_id`, `mail`, `pwd`, `username`, `usr_pic`, `validated`, `email_notif`, `hash`) VALUES
(14, 'mamen@gmail.com', '1ce8086959a6598790ce25adedba04e987a684ff7a6b58dfc368afa1f0acf95c4fc0e32a0e0d1aa8d861e55070c42f7592fd', 'mamen', NULL, 0, 1, ''),
(27, 'asdf@gmail.com', 'def4d8fc452e67bd9c8b8075f239b1cb683b2b83e47e0fe1d0534e38f7c459c012bc8b90c976ba40a7114f58497d4657fa10125ba7ac7c3a5d63acc2d76a2815', 'asdf', NULL, 1, 1, ''),
(28, 'asdfasdf@gmail.com', 'def4d8fc452e67bd9c8b8075f239b1cb683b2b83e47e0fe1d0534e38f7c459c012bc8b90c976ba40a7114f58497d4657fa10125ba7ac7c3a5d63acc2d76a2815', 'asdfasdf', NULL, 1, 1, ''),
(33, 'asdf5@gmail.com', '8f7d5a8870fa0925784fa1e8007517dfec082095a2c0910f5b75a6ec2f54d3ba4498278a26f032ecb4ac39e7aecc1c3cda3640567b52b9db5da6c0636e33d003', 'asdf55', NULL, 0, 1, ''),
(35, 'asdf3@gmail.com', 'def4d8fc452e67bd9c8b8075f239b1cb683b2b83e47e0fe1d0534e38f7c459c012bc8b90c976ba40a7114f58497d4657fa10125ba7ac7c3a5d63acc2d76a2815', 'asdf3', NULL, 0, 1, ''),
(37, 'vasfd@gmail.com', 'def4d8fc452e67bd9c8b8075f239b1cb683b2b83e47e0fe1d0534e38f7c459c012bc8b90c976ba40a7114f58497d4657fa10125ba7ac7c3a5d63acc2d76a2815', 'vasdf', NULL, 0, 1, ''),
(41, 'vlecoq-v@student.42.fr', 'def4d8fc452e67bd9c8b8075f239b1cb683b2b83e47e0fe1d0534e38f7c459c012bc8b90c976ba40a7114f58497d4657fa10125ba7ac7c3a5d63acc2d76a2815', 'vlecoq-v', NULL, 1, 0, ''),
(42, 'morgani@student.42.fr', 'def4d8fc452e67bd9c8b8075f239b1cb683b2b83e47e0fe1d0534e38f7c459c012bc8b90c976ba40a7114f58497d4657fa10125ba7ac7c3a5d63acc2d76a2815', 'morgani', NULL, 0, 1, ''),
(43, 'qwer@gmail.com', 'def4d8fc452e67bd9c8b8075f239b1cb683b2b83e47e0fe1d0534e38f7c459c012bc8b90c976ba40a7114f58497d4657fa10125ba7ac7c3a5d63acc2d76a2815', 'qwer', NULL, 0, 1, ''),
(44, 'mutuy@2p-mail.com', '8b224c65d52ffc99441c482a2e07a7b7bf6e368d69d718c7b0f21b5a18fa193e468c500d08b0d16d8844e0993c445e58713ff65ef7a69811a447f123bcd1180f', 'mutuy2', NULL, 1, 1, ''),
(45, 'maga@rockmailapp.com', 'def4d8fc452e67bd9c8b8075f239b1cb683b2b83e47e0fe1d0534e38f7c459c012bc8b90c976ba40a7114f58497d4657fa10125ba7ac7c3a5d63acc2d76a2815', 'zxcv', NULL, 1, 0, ''),
(47, 'gebes@2p-mail.com', 'def4d8fc452e67bd9c8b8075f239b1cb683b2b83e47e0fe1d0534e38f7c459c012bc8b90c976ba40a7114f58497d4657fa10125ba7ac7c3a5d63acc2d76a2815', 'gebes', NULL, 0, 1, '2ba596643cbbbc20318224181fa46b28'),
(48, 'rarejoy@crypto-net.club', '99681e845c3a09757678654c63b00169d176dba8bbc339da9eb9e5855a10860d6b55100a392f443358bb49f70832fe90b262983888df8bbbe23335403ed7d91a', 'raarejoy', NULL, 1, 0, '8f14e45fceea167a5a36dedd4bea2543');

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
  ADD KEY `userXlike_cascade` (`usr_id`);

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
  MODIFY `comm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `pics`
--
ALTER TABLE `pics`
  MODIFY `pic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

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
  ADD CONSTRAINT `userXlike_cascade` FOREIGN KEY (`usr_id`) REFERENCES `users` (`usr_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `pics`
--
ALTER TABLE `pics`
  ADD CONSTRAINT `usr_id` FOREIGN KEY (`usr_id`) REFERENCES `users` (`usr_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
