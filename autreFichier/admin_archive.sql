-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 13 sep. 2024 à 06:23
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
