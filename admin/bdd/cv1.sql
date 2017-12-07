-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 27 nov. 2017 à 09:20
-- Version du serveur :  10.1.28-MariaDB
-- Version de PHP :  7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cv`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_competences`
--

CREATE TABLE `t_competences` (
  `id` int(3) NOT NULL,
  `competence` varchar(30) DEFAULT NULL,
  `c_niveau` int(3) DEFAULT NULL,
  `id_utilisateur` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_experiences`
--

CREATE TABLE `t_experiences` (
  `id` int(3) NOT NULL,
  `e_titre` varchar(50) DEFAULT NULL,
  `e_soustitre` varchar(50) DEFAULT NULL,
  `e_dates` varchar(50) DEFAULT NULL,
  `e_description` text,
  `id_utilisateur` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_formations`
--

CREATE TABLE `t_formations` (
  `id` int(3) NOT NULL,
  `f_titre` varchar(50) DEFAULT NULL,
  `f_soustitre` varchar(50) DEFAULT NULL,
  `f_dates` varchar(50) DEFAULT NULL,
  `f_description` text,
  `id_utilisateur` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_loisirs`
--

CREATE TABLE `t_loisirs` (
  `id` int(3) NOT NULL,
  `loisir` varchar(30) DEFAULT NULL,
  `id_utilisateur` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_realisations`
--

CREATE TABLE `t_realisations` (
  `id` int(3) NOT NULL,
  `r_titre` varchar(50) DEFAULT NULL,
  `r_soustitre` varchar(50) DEFAULT NULL,
  `r_dates` varchar(50) DEFAULT NULL,
  `r_description` text,
  `id_utilisateur` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_reseaux`
--

CREATE TABLE `t_reseaux` (
  `id` int(3) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `lien` varchar(255) NOT NULL,
  `id_utilisateur` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_titre_cv`
--

CREATE TABLE `t_titre_cv` (
  `id` int(3) NOT NULL,
  `titre_cv` text,
  `accroche` text,
  `logo` varchar(20) DEFAULT NULL,
  `id_utilisateur` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateurs`
--

CREATE TABLE `t_utilisateurs` (
  `id` int(3) NOT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telephone` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `autre_tel` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `mdp` varchar(12) DEFAULT NULL,
  `pseudo` varchar(30) DEFAULT NULL,
  `avatar` varchar(20) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `sexe` enum('H','F') DEFAULT NULL,
  `etat_civil` enum('M.','Mme') DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `code_postal` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `ville` varchar(30) DEFAULT NULL,
  `pays` varchar(20) DEFAULT NULL,
  `site_web` varchar(50) DEFAULT NULL,
  `statut` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_utilisateurs`
--

INSERT INTO `t_utilisateurs` (`id`, `prenom`, `nom`, `email`, `telephone`, `autre_tel`, `mdp`, `pseudo`, `avatar`, `date_naissance`, `sexe`, `etat_civil`, `adresse`, `code_postal`, `ville`, `pays`, `site_web`, `statut`) VALUES
(1, 'Pascal', 'HUITOREL', 'pascal.huitorel@lepoles.com', 0000000000, 0174546406, '123456', 'PH276', 'pashuit.jpg', '1966-07-22', 'H', 'M.', '10 rue Henri Barbusse', 92390, 'Villeneuve-la-Garenne', 'France', 'pascalhuitorel.fr', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_competences`
--
ALTER TABLE `t_competences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_experiences`
--
ALTER TABLE `t_experiences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_formations`
--
ALTER TABLE `t_formations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_loisirs`
--
ALTER TABLE `t_loisirs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_realisations`
--
ALTER TABLE `t_realisations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_reseaux`
--
ALTER TABLE `t_reseaux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_titre_cv`
--
ALTER TABLE `t_titre_cv`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_utilisateurs`
--
ALTER TABLE `t_utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statut` (`statut`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_competences`
--
ALTER TABLE `t_competences`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_experiences`
--
ALTER TABLE `t_experiences`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_formations`
--
ALTER TABLE `t_formations`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_loisirs`
--
ALTER TABLE `t_loisirs`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `t_realisations`
--
ALTER TABLE `t_realisations`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_reseaux`
--
ALTER TABLE `t_reseaux`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_titre_cv`
--
ALTER TABLE `t_titre_cv`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_utilisateurs`
--
ALTER TABLE `t_utilisateurs`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
