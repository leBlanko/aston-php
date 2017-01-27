-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 27 Janvier 2017 à 09:49
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `assurance`
--

-- --------------------------------------------------------

--
-- Structure de la table `assurance`
--

CREATE TABLE `assurance` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `idType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `assurance`
--

INSERT INTO `assurance` (`id`, `name`, `price`, `idType`) VALUES
(-1, 'N/A', 0, 1),
(1, 'Tout risques', 1299, 1),
(2, 'tiers payant', 555, 1),
(4, 'Assurance Vie Type 1', 1001, 2),
(5, 'Assurance Vie Type 2', 1250, 2);

-- --------------------------------------------------------

--
-- Structure de la table `assurancevie_client`
--

CREATE TABLE `assurancevie_client` (
  `id` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `idMandat` int(11) NOT NULL,
  `idAssurance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `assurancevie_client`
--

INSERT INTO `assurancevie_client` (`id`, `idClient`, `idMandat`, `idAssurance`) VALUES
(1, 5, 3, 5),
(2, 7, 3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `assurance_client`
--

CREATE TABLE `assurance_client` (
  `idClient` int(11) NOT NULL,
  `idAssurance` int(11) NOT NULL,
  `idVoiture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `assurance_client`
--

INSERT INTO `assurance_client` (`idClient`, `idAssurance`, `idVoiture`) VALUES
(5, -1, 10),
(5, 1, 11),
(6, -1, 12),
(7, 2, 13);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `adress1` varchar(255) NOT NULL,
  `adress2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postalCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `name`, `age`, `email`, `phone`, `adress1`, `adress2`, `city`, `postalCode`) VALUES
(5, 'Tony Malfoy', 22, 'malfoy.tony@gmail.com', '0658624141', '', '', '', 0),
(6, 'Victor Endouillie', 14, 'witek@witek.com', '0669696969', '', '', '', 0),
(7, 'Romain', 19, 'romain.guidelman@pig.fr', '0654521269', '', '', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `conseiller`
--

CREATE TABLE `conseiller` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sellCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `conseiller`
--

INSERT INTO `conseiller` (`id`, `name`, `sellCount`) VALUES
(1, 'Moussa', 0);

-- --------------------------------------------------------

--
-- Structure de la table `typeassurance`
--

CREATE TABLE `typeassurance` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `typeassurance`
--

INSERT INTO `typeassurance` (`id`, `name`) VALUES
(1, 'Voiture'),
(2, 'Vie');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `nbKm` int(11) NOT NULL,
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `voiture`
--

INSERT INTO `voiture` (`id`, `name`, `brand`, `year`, `color`, `nbKm`, `idClient`) VALUES
(10, 'Camaro', 'Chevrolet', 2016, 'Jaune', 5000, 5),
(11, 'R8', 'Audi', 2017, 'Noir', 12000, 5),
(12, 'Punto', 'Fiat', 1995, 'Verte', 354000, 6),
(13, 'Juke', 'Nissan', 2011, 'Rouge', 91000, 7);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `assurance`
--
ALTER TABLE `assurance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idType` (`idType`);

--
-- Index pour la table `assurancevie_client`
--
ALTER TABLE `assurancevie_client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAssurance` (`idAssurance`),
  ADD KEY `idClient` (`idClient`);

--
-- Index pour la table `assurance_client`
--
ALTER TABLE `assurance_client`
  ADD KEY `idAssurance` (`idAssurance`),
  ADD KEY `idClient` (`idClient`),
  ADD KEY `idVoiture` (`idVoiture`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `conseiller`
--
ALTER TABLE `conseiller`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `typeassurance`
--
ALTER TABLE `typeassurance`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idClient` (`idClient`),
  ADD KEY `idClient_2` (`idClient`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `assurance`
--
ALTER TABLE `assurance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `assurancevie_client`
--
ALTER TABLE `assurancevie_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `conseiller`
--
ALTER TABLE `conseiller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `typeassurance`
--
ALTER TABLE `typeassurance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `assurance`
--
ALTER TABLE `assurance`
  ADD CONSTRAINT `assurance_ibfk_1` FOREIGN KEY (`idType`) REFERENCES `typeassurance` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `assurancevie_client`
--
ALTER TABLE `assurancevie_client`
  ADD CONSTRAINT `assurancevie_client_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `client` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `assurancevie_client_ibfk_2` FOREIGN KEY (`idAssurance`) REFERENCES `assurance` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `assurance_client`
--
ALTER TABLE `assurance_client`
  ADD CONSTRAINT `assurance_client_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assurance_client_ibfk_2` FOREIGN KEY (`idAssurance`) REFERENCES `assurance` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assurance_client_ibfk_3` FOREIGN KEY (`idVoiture`) REFERENCES `voiture` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
