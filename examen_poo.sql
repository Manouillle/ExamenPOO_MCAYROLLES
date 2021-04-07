-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 07 avr. 2021 à 18:41
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
-- Base de données : `examen_poo`
--

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

DROP TABLE IF EXISTS `equipe`;
CREATE TABLE IF NOT EXISTS `equipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `score` int(250) NOT NULL,
  `butEncaisse` int(250) NOT NULL,
  `butMarque` int(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`id`, `name`, `score`, `butEncaisse`, `butMarque`) VALUES
(1, 'Marseille', 48, 36, 40),
(2, 'Nice', 42, 42, 41),
(3, 'Lens', 49, 43, 47),
(4, 'Montpellier', 45, 50, 49),
(5, 'Lille', 66, 19, 51),
(6, 'Monaco', 62, 38, 64),
(7, 'Rennes', 45, 35, 39),
(8, 'Nantes', 28, 48, 32),
(9, 'Reims', 39, 38, 38),
(10, 'Angers', 41, 44, 34),
(11, 'Lyon', 61, 31, 60),
(12, 'Strasbourg', 36, 46, 40),
(13, 'Bordeaux', 36, 41, 34),
(14, 'Nîmes', 29, 58, 30),
(15, 'Saint-Etienne', 36, 46, 32),
(16, 'Dijon', 15, 53, 20),
(17, 'Lorient', 32, 54, 37),
(18, 'Brest', 35, 54, 43),
(19, 'Metz', 42, 36, 36);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'Manon', 'examen');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
