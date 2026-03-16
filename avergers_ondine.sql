-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 16 mars 2026 à 21:13
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `avergers_ondine`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20260223222730', '2026-02-23 22:27:46', 69),
('DoctrineMigrations\\Version20260224001436', '2026-02-24 00:14:48', 123),
('DoctrineMigrations\\Version20260316003038', '2026-03-16 00:31:04', 191);

-- --------------------------------------------------------

--
-- Structure de la table `marquepage`
--

DROP TABLE IF EXISTS `marquepage`;
CREATE TABLE IF NOT EXISTS `marquepage` (
  `id` int NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `commentaire` longtext,
  `date_creation` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `marquepage`
--

INSERT INTO `marquepage` (`id`, `url`, `commentaire`, `date_creation`) VALUES
(1, 'https://anime-sama.tv/catalogue/jujutsu-kaisen/saison3/vostfr/', 'Jujutsu Kaisen - Saison 3', '2026-02-24 11:14:58'),
(2, 'https://www.breier-sports.com/fr/blog/a-la-decouverte-du-rugby-subaquatique-n6', 'Le Rugby sous marin', '2026-02-24 11:15:08'),
(3, 'blablabla', 'j\'ai tjrs pas d\'alternance', '2026-02-24 11:15:15'),
(4, 'https://symfony.com', 'Le site officiel de Symfony', '2026-02-27 02:45:13'),
(5, 'https://www.qwant.com', 'Moteur de recherche Qwant', '2026-02-27 02:45:13'),
(6, 'https://www.github.com', 'GitHub', '2026-02-27 02:45:13'),
(13, 'https://symfony.com', 'Le site officiel de Symfony', '2026-03-16 00:40:13'),
(14, 'https://www.qwant.com', 'Moteur de recherche Qwant', '2026-03-16 00:40:13'),
(15, 'https://www.github.com', 'GitHub', '2026-03-16 00:40:13');

-- --------------------------------------------------------

--
-- Structure de la table `marquepage_mot_cle`
--

DROP TABLE IF EXISTS `marquepage_mot_cle`;
CREATE TABLE IF NOT EXISTS `marquepage_mot_cle` (
  `marquepage_id` int NOT NULL,
  `mot_cle_id` int NOT NULL,
  PRIMARY KEY (`marquepage_id`,`mot_cle_id`),
  KEY `IDX_336E8830F98C4D8E` (`marquepage_id`),
  KEY `IDX_336E8830FE94535C` (`mot_cle_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `marquepage_mot_cle`
--

INSERT INTO `marquepage_mot_cle` (`marquepage_id`, `mot_cle_id`) VALUES
(13, 1),
(13, 2),
(13, 3),
(14, 4),
(15, 5),
(15, 6);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750` (`queue_name`,`available_at`,`delivered_at`,`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `mot_cle`
--

DROP TABLE IF EXISTS `mot_cle`;
CREATE TABLE IF NOT EXISTS `mot_cle` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `mot_cle`
--

INSERT INTO `mot_cle` (`id`, `libelle`) VALUES
(1, 'Symfony'),
(2, 'MVC'),
(3, 'PHP'),
(4, 'Recherche'),
(5, 'GitHub'),
(6, 'Code');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
