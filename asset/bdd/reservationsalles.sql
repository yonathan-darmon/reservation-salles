-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 09 déc. 2021 à 08:51
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `reservationsalles`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES
(1, 'Ceci est un titre', 'Ceci est une descritption', '2021-12-08 13:00:00', '2021-12-08 14:00:00', 3),
(2, 'le premier event', 'tshreq', '2021-12-09 09:00:00', '2021-12-09 10:00:00', 3),
(3, 'la ceremonie du thÃ© ', 'ceci est la ceremonie du thÃ© pour celebrer la nouvelle annÃ©e', '2021-12-30 13:00:00', '2021-12-30 14:00:00', 3),
(5, 'testet', 'testete', '2021-12-09 11:00:00', '2021-12-09 12:00:00', 3),
(8, 'Ceci est the last test', 'parceque si Ã§a marche on envoi le fichier sur plesk', '2021-12-09 14:00:00', '2021-12-09 15:00:00', 6);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(5, 'koobiak', '$2y$10$.gu.oLT1urxxnZktRjQPoORH4q5kglvnkRL5MPbZ5oQyHNjQSY06C'),
(2, 'test', '$2y$10$0b6O2/PutWMSSZ0QU9Cb5O223WHiDPl/Rzv41a39yE6sEZSMhMXCe'),
(3, 'admin', '$2y$10$9O.dv9aTNKPmx4sCp8qm.Oa3YZj6iozmI5.p7Cj4VOizpe0UR8G5m'),
(6, 'Yoni', '$2y$10$WFE1Gb91sU3Ghv05b4XKP.OzmVncX/yvouQ/WCdmxaEMw2nXmZAUK');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
