-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 27 juin 2023 à 22:04
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_parking`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idclt` int(11) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `sexe` varchar(5) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `adresse` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idclt`, `prenom`, `nom`, `sexe`, `telephone`, `adresse`) VALUES
(3, 'Sangare', 'aaaaaa', 'fmnv,', '78 78 98 87', 'vmvngf,m'),
(4, 'moussa', 'keite', 'Homme', '76 48 48 09', 'lafia');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `idl` int(11) NOT NULL,
  `voiture_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `numpermis` varchar(30) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `cout_journalie` varchar(50) NOT NULL,
  `montant` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `payement`
--

CREATE TABLE `payement` (
  `idp` int(11) NOT NULL,
  `voiture_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `montant` varchar(50) NOT NULL,
  `statut` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE `vente` (
  `idvente` int(11) NOT NULL,
  `voiture_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `montant` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `idv` int(11) NOT NULL,
  `matricule` varchar(50) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `photo` blob NOT NULL,
  `prix_vente` varchar(50) NOT NULL,
  `prix_location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`idv`, `matricule`, `marque`, `model`, `photo`, `prix_vente`, `prix_location`) VALUES
(4, 'A001c3', 'Toyota', 'Rav4', '', '2 100 000 fcfa', '100 000 fcfa');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idclt`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD KEY `client` (`client_id`),
  ADD KEY `matricule` (`voiture_id`),
  ADD KEY `voiture_id` (`voiture_id`,`client_id`);

--
-- Index pour la table `payement`
--
ALTER TABLE `payement`
  ADD PRIMARY KEY (`idp`),
  ADD KEY `voiture_id` (`voiture_id`,`client_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Index pour la table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`idvente`),
  ADD KEY `client` (`client_id`),
  ADD KEY `matricule` (`voiture_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`idv`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idclt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `payement`
--
ALTER TABLE `payement`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `vente`
--
ALTER TABLE `vente`
  MODIFY `idvente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `idv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`voiture_id`) REFERENCES `voiture` (`idv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `location_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `client` (`idclt`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `payement`
--
ALTER TABLE `payement`
  ADD CONSTRAINT `payement_ibfk_1` FOREIGN KEY (`voiture_id`) REFERENCES `voiture` (`idv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payement_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `client` (`idclt`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `vente_ibfk_1` FOREIGN KEY (`voiture_id`) REFERENCES `voiture` (`idv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vente_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `client` (`idclt`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
