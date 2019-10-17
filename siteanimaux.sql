-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 17 oct. 2019 à 16:30
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `siteanimaux`
--

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

CREATE TABLE `animal` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `origine` varchar(255) NOT NULL,
  `taille` float UNSIGNED NOT NULL,
  `idDanger` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `animal_bestiaire_contenir`
--

CREATE TABLE `animal_bestiaire_contenir` (
  `idBestiaire` int(11) NOT NULL,
  `idAnimal` int(11) NOT NULL,
  `nbAnimal` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `bestiaire`
--

CREATE TABLE `bestiaire` (
  `idBestiaire` int(11) NOT NULL,
  `idAnimal` int(11) NOT NULL,
  `nomUser` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `dangerosite`
--

CREATE TABLE `dangerosite` (
  `idDanger` int(11) NOT NULL,
  `letal` tinyint(1) NOT NULL,
  `blesser` tinyint(1) NOT NULL,
  `offensif` tinyint(1) NOT NULL,
  `resistance` tinyint(1) NOT NULL,
  `furtivite` tinyint(1) NOT NULL,
  `peur` tinyint(1) NOT NULL,
  `repartition` tinyint(1) NOT NULL,
  `intelligence` tinyint(1) NOT NULL,
  `unique` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `nom` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `idBestiaire` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `animal_bestiaire_contenir`
--
ALTER TABLE `animal_bestiaire_contenir`
  ADD PRIMARY KEY (`idBestiaire`,`idAnimal`);

--
-- Index pour la table `bestiaire`
--
ALTER TABLE `bestiaire`
  ADD PRIMARY KEY (`idBestiaire`);

--
-- Index pour la table `dangerosite`
--
ALTER TABLE `dangerosite`
  ADD PRIMARY KEY (`idDanger`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`nom`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
