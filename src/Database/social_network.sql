-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 18 déc. 2022 à 22:38
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `social_network`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id_comment` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_publication` int NOT NULL,
  `message` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `date` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id_comment`, `id_user`, `id_publication`, `message`, `date`) VALUES
(15, 36, 31, 'c\'est surtout très pratique !', '2022-12-18 23:11:42'),
(14, 36, 32, 'Depuis le temps 😎', '2022-12-18 23:11:19'),
(12, 35, 31, 'Je suis d\'accord 👌', '2022-12-18 23:10:16'),
(13, 35, 30, 'Salut Shadow ! 😁', '2022-12-18 23:10:34'),
(16, 36, 29, 'Bonjour 🙌', '2022-12-18 23:12:12'),
(17, 34, 32, 'Hello', '2022-12-18 23:15:14'),
(18, 34, 30, 'Yo', '2022-12-18 23:15:25'),
(19, 34, 29, 'Bienvenue !', '2022-12-18 23:17:49'),
(20, 37, 31, 'Je like', '2022-12-18 23:18:49'),
(21, 37, 29, 'Hello 👌', '2022-12-18 23:21:01');

-- --------------------------------------------------------

--
-- Structure de la table `friends_list`
--

DROP TABLE IF EXISTS `friends_list`;
CREATE TABLE IF NOT EXISTS `friends_list` (
  `id_request` int NOT NULL AUTO_INCREMENT,
  `id_user_1` int NOT NULL,
  `id_user_2` int NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_request`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `friends_list`
--

INSERT INTO `friends_list` (`id_request`, `id_user_1`, `id_user_2`, `status`) VALUES
(47, 37, 35, 1),
(46, 36, 34, 1),
(45, 36, 37, 1),
(44, 35, 34, 0),
(48, 33, 38, 1),
(49, 33, 34, 0),
(50, 36, 35, 0);

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

DROP TABLE IF EXISTS `publication`;
CREATE TABLE IF NOT EXISTS `publication` (
  `id_publication` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `message` varchar(399) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `date` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_publication`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`id_publication`, `id_user`, `message`, `date`) VALUES
(40, 37, 'Vos avis sur MHA', '2022-12-18 23:37:53'),
(39, 33, 'Salut, voici le travail à faire.', '2022-12-17 11:37:53'),
(38, 38, 'Coucou, voilà mon message...', '2022-12-08 21:37:53'),
(37, 37, 'Elon Musk rachète twitter', '2022-12-11 23:37:53'),
(36, 34, 'Help !', '2022-12-16 16:47:13'),
(35, 34, 'Vos avis sur Avatar 2', '2022-12-15 23:37:53'),
(34, 35, 'Mon premier com !', '2022-12-10 13:37:53'),
(32, 35, 'J\'ai enfin crée un compte !', '2022-12-18 9:37:53'),
(31, 34, 'Le php c\'est cool', '2022-12-17 18:37:53'),
(30, 37, 'Hello world !', '2022-12-16 11:37:53'),
(29, 33, 'Salut, bienvenue sur mon premier post.', '2022-12-16 11:37:53'),
(33, 35, 'Que pensez vous de la B2 INFO ?', '2022-12-10 23:37:53');

-- --------------------------------------------------------

--
-- Structure de la table `reaction`
--

DROP TABLE IF EXISTS `reaction`;
CREATE TABLE IF NOT EXISTS `reaction` (
  `id_reaction` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_publication` int NOT NULL,
  `reaction` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_reaction`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `reaction`
--

INSERT INTO `reaction` (`id_reaction`, `id_user`, `id_publication`, `reaction`) VALUES
(15, 36, 31, '👍'),
(14, 36, 32, '❤️'),
(13, 35, 29, '😂'),
(12, 35, 30, '❤️'),
(11, 35, 31, '👍'),
(16, 36, 29, '👍'),
(17, 34, 32, '😥'),
(18, 34, 29, '👍'),
(19, 37, 31, '👍'),
(20, 37, 29, '😂');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `gender` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `first_name` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `last_name` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `pseudo` varchar(19) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `birth_date` varchar(254) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `gender`, `first_name`, `last_name`, `pseudo`, `email`, `password`, `birth_date`) VALUES
(37, 'Homme', 'Matthieu', 'Mounier', 'Shadow', 'Matthieu.mounier@gmail.com', '753cb0dddb7354b7fbd2671fc75a257486892652b22ded793606207975ffda2c', '2001-06-08'),
(36, 'Homme', 'Thomas', 'Quadro', 'Thetjqnhpp', 'thomas.quadro@gmail.com', 'd38681074467c0bc147b17a9a12b9efa8cc10bcf545f5b0bccccf5a93c4a2b79', '2003-09-11'),
(35, 'Homme', 'Alexis', 'Giromagny', 'Rokuroo', 'alexis.giromagny@gmail.com', '8c4fd8b2c24ffcc223dbf09088bd79734e8404cd4d9e90fc418ecb490622d1ca', '2000-03-26'),
(34, 'Homme', 'Gregory', 'Balatre', 'Gregbal', 'greg.balatre@gmail.com', '0d05845a31cfa01390dee7a91fb7c8ee2590fcee7875fa9a80583e307f10e4f7', '2003-07-30'),
(33, 'Homme', 'Gil', 'Campini', 'Mister-PHP', 'Gil.campini@gmail.com', '4c75ea444d4c645ae142ec0fc4159b01d5973c9d7d6c4e97602137a3791f6873', '1998-01-01'),
(38, 'Autre', 'Admin', 'Root', 'Admin', 'admin@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '2000-01-01');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;