-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 13 sep. 2024 à 06:29
-- Version du serveur : 8.2.0
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_demande_approvisionnement`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email_adress` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `date_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `password`, `email_adress`, `role`, `date_creation`) VALUES
(1, 'Randria', 'Manana', '$2y$10$SUrVMjEiTF0bwBXMlGNhVu5v3kqX2qAso4UAO5bqzEebfhZ2zYXhe', 'mananaRandria@gmail.com', 'admin', '2024-08-26 07:37:53'),
(2, 'RAKOTOBE ', 'Jean', '$2y$10$ynu.DfoqRRXVtjBDaNumfeNoOtKlsd.L7n9zzdtmTtD4FPwlw5b7K', 'jeanRak@gmail.com', 'admin', '2024-08-26 07:38:59');

-- --------------------------------------------------------

--
-- Structure de la table `admin_archive`
--

DROP TABLE IF EXISTS `admin_archive`;
CREATE TABLE IF NOT EXISTS `admin_archive` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email_adress` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `date_suppression` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin_archive`
--

INSERT INTO `admin_archive` (`id`, `nom`, `prenom`, `password`, `email_adress`, `role`, `date_creation`, `date_suppression`) VALUES
(3, 'Rabenandrasana', 'Alphin', '$2y$10$U5ojrUOpacygJTS.R8vFROmM5ktNZHjoBfbXbI7p8fabm0ClRinhS', 'alphindrasana@gmail.com', 'admin', '2024-08-26', '2024-09-13 06:12:49');

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

DROP TABLE IF EXISTS `agence`;
CREATE TABLE IF NOT EXISTS `agence` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=146 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`id`, `nom`) VALUES
(137, 'agence exemple'),
(136, 'agence exemple'),
(135, 'agence exemple'),
(134, 'agence exemple'),
(133, 'agence exemple'),
(132, 'agence exemple'),
(131, 'agence exemple'),
(130, 'agence exemple'),
(129, 'agence exemple'),
(128, 'test'),
(127, 'test'),
(126, 'fourth try agence'),
(125, 'fourth try agence'),
(124, 'thirdTryAgence'),
(123, 'secondTryAgence'),
(122, 'secondTryAgence'),
(121, 'secondTryAgence'),
(120, 'firstTryAgence'),
(119, 'firstTryAgence'),
(118, 'two'),
(117, 'six'),
(116, 'five'),
(115, 'ANTANANARIVO'),
(145, 'exemple agence one'),
(144, 'agence exemple'),
(143, 'agence exemple'),
(142, 'agence exemple'),
(141, 'agence exemple'),
(140, 'agence exemple'),
(139, 'agence exemple'),
(138, 'agence exemple'),
(114, 'agence3'),
(113, 'agence2'),
(112, 'agence1');

-- --------------------------------------------------------

--
-- Structure de la table `agence_service`
--

DROP TABLE IF EXISTS `agence_service`;
CREATE TABLE IF NOT EXISTS `agence_service` (
  `id` int NOT NULL AUTO_INCREMENT,
  `agence_id` int DEFAULT NULL,
  `service_id` int DEFAULT NULL,
  `agence_nom` varchar(100) NOT NULL,
  `service_nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `agence_id` (`agence_id`),
  KEY `service_id` (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `agence_service`
--

INSERT INTO `agence_service` (`id`, `agence_id`, `service_id`, `agence_nom`, `service_nom`) VALUES
(110, 145, 5, 'exemple agence one', 'test two'),
(109, 145, 6, 'exemple agence one', 'test three'),
(108, 144, 4, 'agence exemple', 'test one'),
(107, 144, 5, 'agence exemple', 'test two'),
(106, 144, 6, 'agence exemple', 'test three'),
(104, 143, 5, 'agence exemple', 'test two'),
(105, 143, 4, 'agence exemple', 'test one');

-- --------------------------------------------------------

--
-- Structure de la table `application`
--

DROP TABLE IF EXISTS `application`;
CREATE TABLE IF NOT EXISTS `application` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code_appli` varchar(50) DEFAULT NULL,
  `nom_appli` varchar(100) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_appli` (`code_appli`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `application`
--

INSERT INTO `application` (`id`, `code_appli`, `nom_appli`, `date_creation`) VALUES
(1, 'APPRO', 'DEMANDE D\'APPROVISIONNEMENT', '2024-07-22');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(3, 'Founitures'),
(17, 'test first categorie'),
(16, 'test first categorie'),
(15, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `demande_appro`
--

DROP TABLE IF EXISTS `demande_appro`;
CREATE TABLE IF NOT EXISTS `demande_appro` (
  `id` int NOT NULL AUTO_INCREMENT,
  `agence` varchar(255) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `utilisateur` varchar(255) DEFAULT NULL,
  `date_heure_demande` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_fin_souhaite` date DEFAULT NULL,
  `type_demande` varchar(50) DEFAULT NULL,
  `entretient_equip` varchar(50) DEFAULT NULL,
  `categorie` varchar(50) DEFAULT NULL,
  `objet` text,
  `fichier1` varchar(255) DEFAULT NULL,
  `detail` text,
  `id_statut` int DEFAULT '1',
  `token` char(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_token` (`token`),
  KEY `fk_demande_appro_statut` (`id_statut`)
) ENGINE=MyISAM AUTO_INCREMENT=269 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `demande_appro`
--

INSERT INTO `demande_appro` (`id`, `agence`, `service`, `utilisateur`, `date_heure_demande`, `date_fin_souhaite`, `type_demande`, `entretient_equip`, `categorie`, `objet`, `fichier1`, `detail`, `id_statut`, `token`) VALUES
(266, 'agence exemple', 'test two', 'RAKOTOBE Jean', '2024-09-10 12:07:50', '2024-09-14', 'achat', 'non', 'test first categorie', 'Objet demande', '1725970070_logoHFF.jpg', 'Detail', 1, '50346e4832bb4947c9c75944f2cabd74'),
(267, 'agence exemple', 'test one', 'RAKOTOBE Jean', '2024-09-10 12:09:04', '2024-09-14', 'devis', 'oui', 'test first categorie', 'Try', '1725970144_Memoire de fin d\'étude.docx', 'Detail', 1, '67f8714a411f793be1f185456bde59c4'),
(264, 'agence exemple', 'test one', 'Mitia Rakoto', '2024-09-10 12:06:18', '2024-09-12', 'achat', 'non', 'test first categorie', 'Objet demande', '1725969978_My memo corigez2.docx,1725969978_My memo.docx', 'Exemple detail', 1, 'e2ebbb83bd1ee8fe65003472bdc251f1'),
(265, 'agence exemple', 'test one', 'Mahery RAKOTO', '2024-09-10 12:07:07', '2024-09-12', 'achat', 'non', 'Founitures', 'Objet demande', '1725970027_dom.PNG,1725970027_logoHFF.jpg', 'Detail', 1, 'b0f7151c9541d7d2713544f0095b0cca'),
(262, 'agence exemple', 'test one', 'Marie Rasoa', '2024-09-10 11:59:54', '2024-09-12', 'achat', 'non', 'Founitures', 'Objet demande', '1725969594_exercice.txt', 'Detail', 1, 'c212d7b7590e85f279bed8476cb50248');

-- --------------------------------------------------------

--
-- Structure de la table `demande_appro_archive`
--

DROP TABLE IF EXISTS `demande_appro_archive`;
CREATE TABLE IF NOT EXISTS `demande_appro_archive` (
  `id` int NOT NULL AUTO_INCREMENT,
  `agence` varchar(255) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `utilisateur` varchar(255) DEFAULT NULL,
  `date_heure_demande` datetime DEFAULT NULL,
  `date_fin_souhaite` date DEFAULT NULL,
  `type_demande` varchar(50) DEFAULT NULL,
  `entretient_equip` varchar(50) DEFAULT NULL,
  `categorie` varchar(50) DEFAULT NULL,
  `objet` text,
  `fichier1` varchar(255) DEFAULT NULL,
  `detail` text,
  `id_statut` int DEFAULT NULL,
  `date_suppression` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=152 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `demande_appro_archive`
--

INSERT INTO `demande_appro_archive` (`id`, `agence`, `service`, `utilisateur`, `date_heure_demande`, `date_fin_souhaite`, `type_demande`, `entretient_equip`, `categorie`, `objet`, `fichier1`, `detail`, `id_statut`, `date_suppression`) VALUES
(130, 'agence exemple', 'test two', 'Rakoto', '2024-08-20 14:50:25', '2024-08-25', 'devis', 'oui', 'Founitures', 'objet demande', '1724154625_My memo corigez first (1).docx', 'exemple demande 2', 1, '2024-08-20 12:30:40'),
(129, 'agence exemple', 'test three', 'Rasoa', '2024-08-20 14:49:21', '2024-08-23', 'achat', 'oui', 'Founitures', 'objet demande', '1724154561_excavators-digging-construction-site-sunset-ai-generative_123827-24407.avif,1724154561_orniformation-travaux-publique-cote-ivoire.jpg', 'exemple demande 1', 1, '2024-08-20 12:33:04'),
(132, 'agence exemple', 'test one', 'Jean Batiste', '2024-08-20 15:44:21', '2024-08-31', 'devis', 'oui', 'test', 'objet demande', '1724157861_construction-site-set-sunset-with-excavators-building_875722-11159.avif,1724157861_image one.jpg', 'test demande ', 1, '2024-08-20 12:45:34'),
(133, 'agence exemple', 'test three', 'Marie Rasoazanany', '2024-08-20 15:45:12', '2024-08-23', 'achat', 'oui', 'Founitures', 'objet demande', '1724157912_My memo corigez first (1).docx', 'test exemple demande', 1, '2024-08-20 12:59:41'),
(138, 'agence exemple', 'test one', 'Manana Ravao', '2024-08-20 16:11:46', '2024-08-25', 'devis', 'oui', 'test first categorie', 'objet demande', '1724159506_My memo corigez first (1).docx', 'demande', 1, '2024-08-27 07:11:51'),
(137, 'agence exemple', 'test one', 'Manana Ravao', '2024-08-20 16:10:40', '2024-08-25', 'devis', 'oui', 'test first categorie', 'objet demande', '1724159440_My memo corigez first (1).docx', 'demande', 1, '2024-08-27 07:33:27'),
(135, 'agence exemple', 'test one', 'Didier Rakotomalala', '2024-08-20 16:09:05', '2024-08-23', 'devis', 'oui', 'test first categorie', 'objet demande', '1724159345_construction site tp public.jpg', 'demande', 6, '2024-08-30 08:18:24'),
(142, 'agence exemple', '', 'Nomena', '2024-08-28 14:45:32', '2024-08-30', 'achat', 'non', 'Founitures', 'Test demande', '1724845532_page d\'acc3.jpg,1724845532_page d\'acc ito ko1.jfif,1724845532_page d\'acc2.jfif', 'Test detail demande', 6, '2024-08-30 08:18:27'),
(143, 'agence exemple', 'test one', 'Narindra', '2024-08-28 16:35:42', '2024-08-30', 'achat', 'non', 'Founitures', 'Test demande', '1724852142_page d\'acc ito ko1.jfif,1724852142_page d\'acc image.png', 'Test demande', 2, '2024-08-30 08:18:31'),
(141, 'agence exemple', 'test one', 'Nomena', '2024-08-28 14:44:51', '2024-08-30', 'achat', 'non', 'Founitures', 'test', '', '', 7, '2024-08-30 08:18:35'),
(139, 'agence exemple', 'test three', 'Tsiky', '2024-08-28 09:03:40', '2024-08-30', 'devis', 'non', 'Founitures', 'Test demande', '', 'Detail test demande', 7, '2024-08-30 08:18:39'),
(140, 'agence exemple', 'test three', 'Tsiky', '2024-08-28 09:06:49', '2024-08-30', 'devis', 'non', 'Founitures', 'Test demande', '1724825209_Image page d\'acc ito.png,1724825209_page d\'acc1.jfif', 'Detail test demande', 7, '2024-08-30 08:18:42'),
(134, 'agence exemple', 'test one', 'Didier Rakotomalala', '2024-08-20 16:08:46', '2024-08-23', 'devis', 'oui', 'test first categorie', 'objet demande', '1724159326_construction site tp public.jpg', 'demande', 6, '2024-08-30 08:18:45'),
(136, 'agence exemple', '', 'Didier Rakotomalala', '2024-08-20 16:09:10', '2024-08-23', 'devis', 'oui', 'test first categorie', 'objet demande', '1724159350_construction site tp public.jpg', 'demande', 7, '2024-08-30 08:18:48'),
(151, 'agence exemple', 'test one', 'Rasoa', '2024-08-30 16:56:27', '2024-08-31', 'devis', 'oui', 'test first categorie', 'test de', '', '', 1, '2024-08-30 13:56:33');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `nom`) VALUES
(6, 'test three'),
(5, 'test two'),
(4, 'test one'),
(7, 'test four'),
(8, 'ATELIER'),
(9, 'COMMERCIALE'),
(10, 'test 1'),
(11, 'new'),
(12, 'kkk'),
(13, 'test service num one'),
(14, 'test service num two'),
(15, 'test service num 3'),
(16, 'test Service 4'),
(17, 'new'),
(18, 'APPRO one'),
(19, 'tryy'),
(20, 'tryy'),
(21, 'service exemple');

-- --------------------------------------------------------

--
-- Structure de la table `statut_demande`
--

DROP TABLE IF EXISTS `statut_demande`;
CREATE TABLE IF NOT EXISTS `statut_demande` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_application` int DEFAULT NULL,
  `code_stat` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `date_modification` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_application` (`id_application`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `statut_demande`
--

INSERT INTO `statut_demande` (`id`, `id_application`, `code_stat`, `description`, `date_creation`, `date_modification`) VALUES
(1, 1, 'OUVRT', 'OUVERT', '2024-07-22', '2024-07-22'),
(2, 1, 'APPROUV', 'A APPROUVER', '2024-07-22', '2024-07-22'),
(3, 1, 'ENCOURS APPR', 'ENCOURS APPRO STOCK', '2024-07-22', '2024-07-22'),
(4, 1, 'STOCK INSUF', 'STOCK INSUFFISANT', '2024-07-22', '2024-07-22'),
(5, 1, 'ENCOURS ACHAT', 'ENCOURS ACHAT DIRECT', '2024-07-22', '2024-07-22'),
(6, 1, 'LIVR', 'LIVRER', '2024-07-22', '2024-07-22'),
(7, 1, 'INCOMPL', 'INCOMPLET', '2024-07-22', '2024-07-22');

-- --------------------------------------------------------

--
-- Structure de la table `user_login`
--

DROP TABLE IF EXISTS `user_login`;
CREATE TABLE IF NOT EXISTS `user_login` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `date_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `email_adress` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `agence` varchar(255) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `password`, `date_creation`, `email_adress`, `role`, `agence`, `service`) VALUES
(6, 'Rakotoarisoa', 'Stephanie', '$2y$10$YyxpRkyqovC3y8lWzAQLQOsugdRbWXDtgIxgUhv0AEGbicJ40uCn2', '2024-08-26 12:39:16', 'stephRak@gmail.com', 'utilisateur', NULL, NULL),
(7, 'Randrianatoandro', 'Samuel', '$2y$10$dM31xE76sohRtB5Cm8D5C.FtXGY/EeybvbQ2kf23SwD/4ajrbAmUm', '2024-09-03 07:39:50', 'samuelrandria@gmail.com', 'utilisateur', NULL, NULL),
(9, 'Randrianasolo', 'Samuel', NULL, '2024-09-03 07:41:19', 'samuelrandria@gmail.com', 'utilisateur', 'agence exemple', 'test two'),
(10, 'Rabe', 'Koto', '$2y$10$PB1dpxdyRsHl9JhCbWXVe.o0cIfZSKOqWTsfgw6EMBRwHPkXGtqXe', '2024-09-03 07:45:28', 'kotorabe@gmail.com', 'utilisateur', 'agence exemple', 'test three');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_archive`
--

DROP TABLE IF EXISTS `utilisateur_archive`;
CREATE TABLE IF NOT EXISTS `utilisateur_archive` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `email_adress` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `date_suppression` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `agence` varchar(255) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur_archive`
--

INSERT INTO `utilisateur_archive` (`id`, `nom`, `prenom`, `password`, `date_creation`, `email_adress`, `role`, `date_suppression`, `agence`, `service`) VALUES
(4, 'Holimalala', 'Sambatra', '$2y$10$tktna63vAmLWPdOP82rhsuxGs.S6jdt8mYawVBDwFIkM9T6Ioj5wi', '2024-08-26', 'Mahsambatraholimalala@gmail.com', 'utilisateur', '2024-08-26 12:28:59', NULL, NULL),
(8, 'Randrianatoandro', 'Samuel', '$2y$10$ADpZKymx.0JSMoA/k8QXvOVaKauVHNVKSqgWRAfWxbQS9VoxGC5Hm', '2024-09-03', 'samuelrandria@gmail.com', 'utilisateur', '2024-09-03 14:24:31', 'agence exemple', 'test two'),
(5, 'Rasoazananamanana', 'Mathild', '$2y$10$Lg.wSpwfAdAyLgaBK3UxceFxKwj8Q1dvcKel20Mr./wF4OGSkdCKG', '2024-08-26', 'mathildSoa@gmail.com', 'utilisateur', '2024-09-13 06:02:47', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `validateur`
--

DROP TABLE IF EXISTS `validateur`;
CREATE TABLE IF NOT EXISTS `validateur` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `date_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `code_statut` varchar(50) DEFAULT NULL,
  `id_statut` varchar(50) DEFAULT NULL,
  `email_adress` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `agence` varchar(255) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_statut_code` (`code_statut`),
  KEY `fk_statut_id` (`id_statut`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `validateur`
--

INSERT INTO `validateur` (`id`, `nom`, `prenom`, `password`, `date_creation`, `code_statut`, `id_statut`, `email_adress`, `role`, `agence`, `service`) VALUES
(26, 'Rasoa', 'Fitia', '$2y$10$sQixYb9rGDDOYB.Z1d/yiej4Yx7oKR8U8CgIR3DgzJttlIOj2PXyK', '2024-08-26 12:43:19', 'ENCOURS APPR', NULL, 'fitiaRas@gmail.com', 'validateur', NULL, NULL),
(27, 'Rakoto', 'Mitia', '$2y$10$rTrtzLUykpJFSOuYv3/FeekvvmlJca4y.Ga2zDsHKDxVZ90hnRobe', '2024-08-26 12:43:58', 'ENCOURS ACHAT', NULL, 'mitiaRK@gmail.com', 'validateur', NULL, NULL),
(28, 'Rasoamandimby', 'Francia', '$2y$10$hwJT9rIoR5pxGv4DtNQm0Ou42eD4ktbmFfb90nInPZOKnodWPKLlS', '2024-09-05 12:05:37', 'ENCOURS APPR', NULL, 'ndimbyrasoa@gmail.com', 'validateur', NULL, NULL),
(29, 'Rasoamandimby', 'Francia', '$2y$10$V7H.2/WGw07HvzYrbXedZuh11xBUFEtl42o2KX0JJGNmszkjwFkIa', '2024-09-05 12:08:55', 'ENCOURS APPR', NULL, 'ndimbyrasoa@gmail.com', 'validateur', 'agence exemple', 'test two'),
(30, 'Rasoamandimby', 'Natia', '$2y$10$EjLpDiBqgvw6kVGtPpE6uOgl5WeYqyM37OiiK.5TocZz6AZZY11Oy', '2024-09-05 12:11:40', 'ENCOURS APPR', NULL, 'ndimbynatia@gmail.com', 'validateur', 'agence exemple', 'test three');

-- --------------------------------------------------------

--
-- Structure de la table `validateur_archive`
--

DROP TABLE IF EXISTS `validateur_archive`;
CREATE TABLE IF NOT EXISTS `validateur_archive` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `code_statut` varchar(50) DEFAULT NULL,
  `email_adress` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `date_suppression` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `agence` varchar(255) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `validateur_archive`
--

INSERT INTO `validateur_archive` (`id`, `nom`, `prenom`, `password`, `date_creation`, `code_statut`, `email_adress`, `role`, `date_suppression`, `agence`, `service`) VALUES
(24, 'Rakoto', 'Mitia', '$2y$10$ztDJRed5xZUyTDQ/iywyfuHZOOmkJpAcgR/Lt8tc3hiR9GSBiRjAi', '2024-08-26', 'ENCOURS APPR', 'mitiaRK@gmail.com', 'validateur', '2024-08-26 12:15:19', NULL, NULL),
(23, 'Rakoto', 'Mitia', '$2y$10$3S9HM2Maz38ZTr0mWoJacOWmLTFxGIy3Qj937yTLBb.SSDK1kmaoC', '2024-08-26', '', 'mitiaRK@gmail.com', 'validateur', '2024-08-26 12:15:52', NULL, NULL),
(22, 'Rakoto', 'Mitia', '$2y$10$Rhbca8dueQwn3zLm0yf76eSLNM9/uX5iCmN9NXvFBbgO7iOmwbiKG', '2024-08-26', '', 'mitiaRK@gmail.com', NULL, '2024-08-26 12:16:03', NULL, NULL),
(21, 'Rakoto', 'Mitia', '$2y$10$AXWE0LgrZZfslBv6QO7NGeG0P87nDtEb/fWP1K3YEZY5i4hKtSWWG', '2024-08-26', '', 'mitiaRK@gmail.com', NULL, '2024-08-26 12:16:20', NULL, NULL),
(20, 'Rakoto', 'Miora', '$2y$10$FZJ.3kuptKWk2UWVMTfKHO7KtpOB4RaZ7s5lSEMRcp/5yTbmu0KFa', '2024-08-26', 'APPROUV', 'mioraKT@gmail.com', NULL, '2024-08-26 12:17:59', NULL, NULL),
(25, 'Ramanana', 'Niaina', '$2y$10$H.jIlwgAEVdP8SkxljWebOYigvIhFSt1KPbtUXoLDgKkK2yBFVpnG', '2024-08-26', 'APPROUV', 'mananaNiaina@gmail.com', 'validateur', '2024-09-13 06:12:16', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `validateur_stat_dem`
--

DROP TABLE IF EXISTS `validateur_stat_dem`;
CREATE TABLE IF NOT EXISTS `validateur_stat_dem` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `demande_id` int DEFAULT NULL,
  `validateur_id` int DEFAULT NULL,
  `statut_id` int DEFAULT NULL,
  `date_validation_dem` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `demande_id` (`demande_id`),
  KEY `validateur_id` (`validateur_id`),
  KEY `statut_id` (`statut_id`)
) ENGINE=MyISAM AUTO_INCREMENT=216 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `validateur_stat_dem`
--

INSERT INTO `validateur_stat_dem` (`id`, `demande_id`, `validateur_id`, `statut_id`, `date_validation_dem`) VALUES
(215, 127, 11, 7, '2024-08-14 07:04:27'),
(214, 127, 11, 4, '2024-08-14 07:04:13'),
(213, 127, 11, 4, '2024-08-14 07:03:14'),
(212, 127, 11, 2, '2024-08-14 06:18:01'),
(211, 127, 11, 2, '2024-08-14 06:14:13'),
(210, 128, 11, 4, '2024-08-14 05:52:32'),
(209, 128, 11, 4, '2024-08-14 05:49:15'),
(208, 128, 11, 3, '2024-08-14 05:48:44'),
(207, 128, 11, 2, '2024-08-14 05:48:19');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
