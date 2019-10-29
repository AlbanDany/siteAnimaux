-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 29 oct. 2019 à 12:29
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
-- Structure de la table `motdepasse`
--

CREATE TABLE `motdepasse` (
  `idMotdepasse` int(11) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `dateDebut` date NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `motdepasse`
--

INSERT INTO `motdepasse` (`idMotdepasse`, `mdp`, `dateDebut`, `idUser`) VALUES
(4, 'monmdp', '2019-10-29', 1),
(5, '$2y$10$sljxJZPIDu.yKNpaUfIV2.ooBqPE7c63omo2RsLuia/TaA8si9x.S', '2019-10-29', 1),
(6, '$2y$10$5gYMBlhxOtze9PwtPS3pbezmjKGcYdKZxNE1H.YdoGEKeV4FVB9oW', '2019-10-29', 1),
(7, '$2y$10$JHai/1n0yzoJCEKCY.BxG.cv7iXs.lgRcoH5mNXoUlWK6QhG9MnWm', '2019-10-29', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUser` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `idBestiaire` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `confirmKey` int(16) NOT NULL,
  `actif` tinyint(1) NOT NULL
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
-- Index pour la table `motdepasse`
--
ALTER TABLE `motdepasse`
  ADD PRIMARY KEY (`idMotdepasse`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `motdepasse`
--
ALTER TABLE `motdepasse`
  MODIFY `idMotdepasse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
