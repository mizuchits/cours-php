-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 07 jan. 2026 à 08:48
-- Version du serveur : 8.4.7
-- Version de PHP : 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mediatheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `realisateur` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `duree` varchar(255) NOT NULL,
  `synopsis` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `affiche` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id`, `titre`, `realisateur`, `genre`, `duree`, `synopsis`, `user_id`, `affiche`) VALUES
(1, 'test', 'tom', 'action', '5h61', 'tkt', 3, ''),
(2, 'test2', 'tom', 'comic', '10h', 'tkt toujours', 3, ''),
(3, 'test3', 'tom', 'jsp', '24h', 'jsp', 3, ''),
(4, 'test4', 'zdaz', 'dzadaz', 'dazd', 'azdaz', 3, ''),
(5, 'test', 'test', 'test', 'test', 'test', 3, 'upload/695e1a4e4bbf5_Yuuri.png'),
(6, 'test5', 'Test', 'test', 'test', 'test', 3, 'upload/695e1a67d7cf9_Yuuri.png');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `password`) VALUES
(3, 'mizuchit', '$argon2i$v=19$m=65536,t=4,p=1$Yk16eGV6S2lvakVoVWcxRA$D9sPu60Wbq6b1O1x64xfnJxxrKLB1RgifE1cymfic3k');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
