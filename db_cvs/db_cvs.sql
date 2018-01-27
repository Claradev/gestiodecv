-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 27 jan. 2018 à 23:21
-- Version du serveur :  10.1.28-MariaDB
-- Version de PHP :  7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_cvs`
--

-- --------------------------------------------------------

--
-- Structure de la table `codeuse`
--

CREATE TABLE `codeuse` (
  `id` int(10) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `dnaissance` date NOT NULL,
  `photo` varchar(250) NOT NULL,
  `specialisation` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `codeuse`
--

INSERT INTO `codeuse` (`id`, `nom`, `prenom`, `dnaissance`, `photo`, `specialisation`, `email`, `mdp`, `description`) VALUES
(5, 'Konan', 'Marie', '1993-02-26', 'cv1.jpg', 'Coding', 'konan@konan.com', '0000', 'je suis front end developpeur debutante chez sheisthecode, passionnÃ©e de Java, j\'aime crÃ©er des sites beaux et dynamiques pour les utlisateurs'),
(7, 'kouadio', 'amoin', '1991-05-08', 'cv2.jpg', 'java', 'kouadio@kouadio.com', '', 'je suis front end developpeur debutante chez sheisthecode, passionnÃ©e de Java, j\'aime crÃ©er des sites beaux et dynamiques pour les utlisateurs');

-- --------------------------------------------------------

--
-- Structure de la table `cv`
--

CREATE TABLE `cv` (
  `id` int(10) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `github` varchar(50) NOT NULL,
  `id_codeuse` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `diplome`
--

CREATE TABLE `diplome` (
  `id` int(10) NOT NULL,
  `etablissement` varchar(50) NOT NULL,
  `diplome` varchar(50) NOT NULL,
  `dateob` date NOT NULL,
  `id_codeuse` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `diplome`
--

INSERT INTO `diplome` (`id`, `etablissement`, `diplome`, `dateob`, `id_codeuse`) VALUES
(1, 'fghjklmlkj', 'ghjklmlkjh', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

CREATE TABLE `experience` (
  `id` int(10) NOT NULL,
  `entreprise` varchar(50) NOT NULL,
  `poste` varchar(50) NOT NULL,
  `ddebut` date NOT NULL,
  `dfin` date NOT NULL,
  `id_codeuse` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `experience`
--

INSERT INTO `experience` (`id`, `entreprise`, `poste`, `ddebut`, `dfin`, `id_codeuse`) VALUES
(2, 'xcvbn,;:;,nb', 'dfghjklmlkjhg', '0000-00-00', '0000-00-00', 0),
(3, 'fghjkl', 'ccvbn,;', '0000-00-00', '0000-00-00', 0),
(4, 'sheisthecode', 'codeuse', '2012-02-02', '2012-04-05', 0),
(5, 'orange', 'developpeur', '0000-00-00', '0000-00-00', 0),
(6, 'orange', 'developpeur', '2018-02-19', '2018-03-20', 0),
(7, 'orange', 'developpeur', '2018-02-19', '2018-03-20', 0),
(8, 'ghjklm', 'ghjklm', '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `interet`
--

CREATE TABLE `interet` (
  `id` int(10) NOT NULL,
  `titre` text NOT NULL,
  `description` varchar(50) NOT NULL,
  `id_codeuse` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `interet`
--

INSERT INTO `interet` (`id`, `titre`, `description`, `id_codeuse`) VALUES
(1, 'Moto volante Hoverbike Scorpion3', 'la moto volante', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `codeuse`
--
ALTER TABLE `codeuse`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `diplome`
--
ALTER TABLE `diplome`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `interet`
--
ALTER TABLE `interet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `codeuse`
--
ALTER TABLE `codeuse`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `cv`
--
ALTER TABLE `cv`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `diplome`
--
ALTER TABLE `diplome`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `interet`
--
ALTER TABLE `interet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
