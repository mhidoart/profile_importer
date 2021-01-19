-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 19 jan. 2021 à 11:30
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `profile_importer`
--

-- --------------------------------------------------------

--
-- Structure de la table `interviewer`
--

CREATE TABLE `interviewer` (
  `id` int(11) NOT NULL,
  `complete_name` varchar(40) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pass` varchar(38) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `profile_cv`
--

CREATE TABLE `profile_cv` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `num` text NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cv_path` text DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `date_apply` date DEFAULT NULL,
  `intern_or_job` int(11) DEFAULT NULL,
  `avis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `suivi_profile`
--

CREATE TABLE `suivi_profile` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_profile` int(11) DEFAULT NULL,
  `date_operation` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `interviewer`
--
ALTER TABLE `interviewer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `profile_cv`
--
ALTER TABLE `profile_cv`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `suivi_profile`
--
ALTER TABLE `suivi_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `interviewer`
--
ALTER TABLE `interviewer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profile_cv`
--
ALTER TABLE `profile_cv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `suivi_profile`
--
ALTER TABLE `suivi_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
