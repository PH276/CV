-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 08 déc. 2017 à 17:01
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

--
-- Déchargement des données de la table `t_competences`
--

INSERT INTO `t_competences` (`id`, `competence`, `c_niveau`, `id_utilisateur`) VALUES
(1, 'PHP7.1.0', 80, 1),
(2, '', 0, 1),
(3, '', 0, 1),
(4, '', 0, 1);

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
  `id_utilisateur` int(3) DEFAULT NULL,
  `e_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_experiences`
--

INSERT INTO `t_experiences` (`id`, `e_titre`, `e_soustitre`, `e_dates`, `e_description`, `id_utilisateur`, `e_type`) VALUES
(1, 'ana prog', NULL, NULL, NULL, NULL, ''),
(2, 'ope RT', NULL, NULL, NULL, NULL, ''),
(3, 'adm sys', NULL, NULL, NULL, NULL, ''),
(4, 'Administrateur systèmes (assistant)', '', '', '', 1, ''),
(5, 'Opérateur réseau et télécom', '', '', '', 1, ''),
(6, 'analyste-programmeur', '', '', '', 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `t_formations`
--

CREATE TABLE `t_formations` (
  `id` int(3) NOT NULL,
  `f_titre` varchar(100) DEFAULT NULL,
  `f_soustitre` varchar(50) DEFAULT NULL,
  `f_dates` varchar(50) DEFAULT NULL,
  `f_description` text,
  `id_utilisateur` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_formations`
--

INSERT INTO `t_formations` (`id`, `f_titre`, `f_soustitre`, `f_dates`, `f_description`, `id_utilisateur`) VALUES
(1, 'Licence Droit, économie et gestion, filiale économie et gestion (parcours MIAGE)', '', '', '', 1),
(2, 'DUT RT', '', '', '', 1),
(3, 'DUT GEII', '', '', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_interets`
--

CREATE TABLE `t_interets` (
  `id` int(3) NOT NULL,
  `centre` varchar(50) NOT NULL,
  `id_utilisateur` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_interets`
--

INSERT INTO `t_interets` (`id`, `centre`, `id_utilisateur`) VALUES
(1, 'Président du conseil syndical de ma résidence', 1),
(2, 'trésorier de mon club de billard', 1),
(3, 'tennis de table', 1),
(4, 'broderie (point de croix compté)', 1),
(5, 'marche', 1),
(6, 'développement informatique', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_logos`
--

CREATE TABLE `t_logos` (
  `id` int(3) NOT NULL,
  `src` varchar(50) NOT NULL,
  `alt` varchar(50) NOT NULL,
  `id_utilisateur` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_logos`
--

INSERT INTO `t_logos` (`id`, `src`, `alt`, `id_utilisateur`) VALUES
(1, 'html-css.png', 'HTML5/CSS3', 1),
(2, 'bootstrap-logo.png', 'Bootstrap', 1),
(3, 'js.png', 'javascript', 1),
(4, 'jQuery.png', 'jQuery', 1),
(5, 'wordpress.jpg', 'wordpress', 1),
(6, 'PHP.jpg', 'PHP', 1),
(7, 'MySQL.png', 'MySQL', 1),
(8, 'silex.jpg', 'silex', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_loisirs`
--

CREATE TABLE `t_loisirs` (
  `id` int(3) NOT NULL,
  `loisir` varchar(30) DEFAULT NULL,
  `id_utilisateur` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_loisirs`
--

INSERT INTO `t_loisirs` (`id`, `loisir`, `id_utilisateur`) VALUES
(39, 'maraaaaaaaaaaaaaaaaaaaaaaaaaaa', 1),
(40, 'popo', 1),
(41, 'yiyi', 1),
(42, 'titi', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_points_forts`
--

CREATE TABLE `t_points_forts` (
  `id` int(3) NOT NULL,
  `point_fort` varchar(50) NOT NULL,
  `id_utilisateur` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_points_forts`
--

INSERT INTO `t_points_forts` (`id`, `point_fort`, `id_utilisateur`) VALUES
(1, 'logique', 1),
(2, 'persévérant', 1),
(3, 'curieux', 1),
(4, 'esprit d\'équipe', 1),
(5, 'observateur', 1),
(6, 'avenant', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_realisations`
--

CREATE TABLE `t_realisations` (
  `id` int(3) NOT NULL,
  `r_titre` varchar(100) DEFAULT NULL,
  `r_soustitre` varchar(50) DEFAULT NULL,
  `r_dates` varchar(50) DEFAULT NULL,
  `r_description` text,
  `id_utilisateur` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_realisations`
--

INSERT INTO `t_realisations` (`id`, `r_titre`, `r_soustitre`, `r_dates`, `r_description`, `id_utilisateur`) VALUES
(1, 'création du site mypetstar.fr', '', '', '', 1),
(3, 'développement d\'une application de gestion de mon club de billard', '', '', '', 1),
(4, 'développement de 2 applications de compteur de jeu de billard', '', '', '', 1);

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

--
-- Déchargement des données de la table `t_reseaux`
--

INSERT INTO `t_reseaux` (`id`, `nom`, `logo`, `lien`, `id_utilisateur`) VALUES
(2, 'github', 'fa-github-square', 'https://github.com/PH276', 1),
(3, 'linkedin', 'fa-linkedin-square', 'https://www.linkedin.com/in/pascal-huitorel-14ab96133/?ppe=1', 1),
(4, 'viadeo', 'fa-viadeo-square', 'https://www.viadeo.com/p/00221cjstha3qxtp/edit', 1),
(5, 'twitter', 'fa-twitter-square', 'https://twitter.com/PH276', 1),
(6, 'facebook', 'fa-facebook-square', 'https://www.facebook.com/profile.php?id=100018829567115', 1);

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

--
-- Déchargement des données de la table `t_titre_cv`
--

INSERT INTO `t_titre_cv` (`id`, `titre_cv`, `accroche`, `logo`, `id_utilisateur`) VALUES
(1, 'intégrateur - développeur web junior', 'Je suis passionné d\'informatique, plus précisément de programmation.\n\nMon projet est de devenir développeur web.\n\nPour commencer, j\'ai créé mon premier site web (mypetstar.fr) pour CRIS Production à sa grande satisfaction.\nPour renforcer mes compétences, je suis actuellement en formation d\'intégrateur développeur web.', '', 1);

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
(1, 'Pascal', 'HUITOREL', 'pascal.huitorel@lepoles.com', 0634018341, 0174546406, '123456', 'PH276', 'pashuit.jpg', '1966-07-22', 'H', 'M.', '10 rue Henri Barbusse', 92390, 'Villeneuve-la-Garenne', 'France', 'pascalhuitorel.fr', 1);

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
-- Index pour la table `t_interets`
--
ALTER TABLE `t_interets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_logos`
--
ALTER TABLE `t_logos`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_loisirs`
--
ALTER TABLE `t_loisirs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_points_forts`
--
ALTER TABLE `t_points_forts`
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
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `t_experiences`
--
ALTER TABLE `t_experiences`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `t_formations`
--
ALTER TABLE `t_formations`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `t_interets`
--
ALTER TABLE `t_interets`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `t_logos`
--
ALTER TABLE `t_logos`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `t_loisirs`
--
ALTER TABLE `t_loisirs`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `t_points_forts`
--
ALTER TABLE `t_points_forts`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `t_realisations`
--
ALTER TABLE `t_realisations`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `t_reseaux`
--
ALTER TABLE `t_reseaux`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `t_titre_cv`
--
ALTER TABLE `t_titre_cv`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `t_utilisateurs`
--
ALTER TABLE `t_utilisateurs`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
