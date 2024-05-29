-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 29 mai 2024 à 13:19
-- Version du serveur : 5.7.39
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Lyak-Etude`
--

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `id_connexion` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL,
  `date_connexion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`id_connexion`, `id_utilisateur`, `email`, `mot_de_passe`, `date_connexion`) VALUES
(1, 8, 'musa1@gmail.com', '07285217Alex18@', '2024-04-03 08:29:36'),
(2, 9, 'ojioso@gmail.com', '0987654321Al@', '2024-04-03 08:36:08');

-- --------------------------------------------------------

--
-- Structure de la table `connexion-pro`
--

CREATE TABLE `connexion-pro` (
  `id_connexion` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL,
  `date_connexion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `connexion-pro`
--

INSERT INTO `connexion-pro` (`id_connexion`, `id_utilisateur`, `email`, `mot_de_passe`, `date_connexion`) VALUES
(1, 3, '269@gmail.com', '$2y$10$r0ExtOL2sEql9pzT7XjYl.d2o.jssLO3eMmshoCM4q7KxXNQHuk2i', '2024-04-03 08:28:16');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date_contact` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `prenom`, `nom`, `telephone`, `email`, `message`, `date_contact`) VALUES
(1, 'lionnel', 'idika', '0783251110', 'alexidika1@gmail.com', 'J\'ai un bug', '2024-05-29 08:11:27');

-- --------------------------------------------------------

--
-- Structure de la table `contact_pro`
--

CREATE TABLE `contact_pro` (
  `id` int(11) NOT NULL,
  `nom_entreprise` varchar(255) NOT NULL,
  `personne_contact` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `contact_mail` varchar(100) DEFAULT NULL,
  `contact_telephone` varchar(100) DEFAULT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact_pro`
--

INSERT INTO `contact_pro` (`id`, `nom_entreprise`, `personne_contact`, `telephone`, `email`, `message`, `contact_mail`, `contact_telephone`, `date_creation`) VALUES
(1, 'YNOV', 'idika', '0783251110', 'YNOV@gmail.com', 'AZERTYUIOP', 'Oui', 'Non', '2024-05-29 08:00:57');

-- --------------------------------------------------------

--
-- Structure de la table `notation_entreprise`
--

CREATE TABLE `notation_entreprise` (
  `id` int(11) NOT NULL,
  `prenom_etudiant` varchar(255) NOT NULL,
  `nom_famille_etudiant` varchar(255) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `comprehension_missions` text NOT NULL,
  `autonomie_responsabilite` text NOT NULL,
  `initiative` text NOT NULL,
  `atout_pour_entreprise` text NOT NULL,
  `recommandation` enum('oui','non') NOT NULL,
  `avis` text NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `notation_entreprise`
--

INSERT INTO `notation_entreprise` (`id`, `prenom_etudiant`, `nom_famille_etudiant`, `date_debut`, `date_fin`, `comprehension_missions`, `autonomie_responsabilite`, `initiative`, `atout_pour_entreprise`, `recommandation`, `avis`, `date_creation`) VALUES
(2, 'idika', 'lionnel', '2024-11-09', '2025-11-09', 'oui', 'oui', 'oui', 'oui', 'oui', 'oui', '2024-05-29 09:14:18');

-- --------------------------------------------------------

--
-- Structure de la table `notation_etudiant`
--

CREATE TABLE `notation_etudiant` (
  `id` int(11) NOT NULL,
  `entreprise` varchar(255) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `missions` text NOT NULL,
  `informations` text NOT NULL,
  `competences` text NOT NULL,
  `experience` text NOT NULL,
  `recommandation` text,
  `avis` text NOT NULL,
  `date_evaluation` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `notation_etudiant`
--

INSERT INTO `notation_etudiant` (`id`, `entreprise`, `date_debut`, `date_fin`, `missions`, `informations`, `competences`, `experience`, `recommandation`, `avis`, `date_evaluation`) VALUES
(1, 'YNOV', '2024-09-11', '2025-09-11', 'oui', 'oui', 'oui', 'oui', 'Oui', 'oui', '2024-05-29'),
(2, 'YNOV', '2024-09-11', '2025-09-11', 'oui', 'oui', 'oui', 'oui', 'Oui', 'oui', '2024-05-29');

-- --------------------------------------------------------

--
-- Structure de la table `notation_referent`
--

CREATE TABLE `notation_referent` (
  `id` int(11) NOT NULL,
  `prenom_etudiant` varchar(255) NOT NULL,
  `nom_famille_etudiant` varchar(255) NOT NULL,
  `nom_entreprise` varchar(255) NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `objectifs_atteints` text NOT NULL,
  `investissement` text NOT NULL,
  `implication` text NOT NULL,
  `pratique_connaissances` text NOT NULL,
  `avis` text NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `profil_entreprise`
--

CREATE TABLE `profil_entreprise` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `secteur_activite` varchar(255) DEFAULT NULL,
  `localisation` varchar(255) DEFAULT NULL,
  `description` text,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `profil_etudiant`
--

CREATE TABLE `profil_etudiant` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text,
  `photo` varchar(255) DEFAULT NULL,
  `lien_profil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `profil_mentor`
--

CREATE TABLE `profil_mentor` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text,
  `photo` varchar(255) DEFAULT NULL,
  `lien_profil` varchar(255) DEFAULT NULL,
  `etudiant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `type_utilisateur` varchar(20) NOT NULL DEFAULT 'étudiant',
  `nom_utilisateur` varchar(12) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `prenom`, `nom`, `date_naissance`, `email`, `adresse`, `telephone`, `type_utilisateur`, `nom_utilisateur`, `mot_de_passe`) VALUES
(7, 'idika lionnel', 'ANGOUNE UDUMA', '2010-03-11', 'alexidika1@gmail.com', '19 RUE GALVANI', '0783251110', 'etudiant', 'idika', '$2y$10$e5JO4QnWNQjpycEv4q/pw.ayzpsg/W/l3t7CyY1Kgeg7mxb20oBMu'),
(8, 'musa', 'adamu', '2003-02-02', 'musa1@gmail.com', '3 rue emmanuel arago', '0787657865', 'etudiant', 'adamu musa', '$2y$10$gdIK9YqUFofmlNyy3TCSKuLHy3pBhf9A9E7jYYHANONA3jBGLOoA6'),
(9, 'idika', 'ojioso', '2002-11-11', 'ojioso@gmail.com', '93100', '0728289010', 'etudiant', 'ojioso', '$2y$10$jTGsSlSdqmO7SfhqrehY4eSt9H1mYa4b1Zzc.diEPS5PK4kvXEJQO');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs-pro`
--

CREATE TABLE `utilisateurs-pro` (
  `id_utilisateur` int(11) NOT NULL,
  `nom_entreprise` varchar(255) NOT NULL,
  `email` varchar(20) NOT NULL,
  `type_utilisateur` varchar(255) NOT NULL DEFAULT 'professionnel',
  `nom_utilisateurPro` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs-pro`
--

INSERT INTO `utilisateurs-pro` (`id_utilisateur`, `nom_entreprise`, `email`, `type_utilisateur`, `nom_utilisateurPro`, `mot_de_passe`) VALUES
(1, 'HP', 'hp@gmail.com', 'professionnel', 'HP', '$2y$10$ODB41A.rz/PaSr.rD5OYmOdWiH1PdFLublp/ekdyenUergU72S.s.'),
(2, 'Yendi', 'ye@gmail.com', 'professionnel', 'Yendi', '$2y$10$NjNwYTsw3ktJjxAQb6qBrOtS6nch3uFN0mbLbEjPehJgDSPhYqJFO'),
(3, '269', '269@gmail.com', 'professionnel', '269', '$2y$10$r0ExtOL2sEql9pzT7XjYl.d2o.jssLO3eMmshoCM4q7KxXNQHuk2i');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`id_connexion`),
  ADD UNIQUE KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `connexion-pro`
--
ALTER TABLE `connexion-pro`
  ADD PRIMARY KEY (`id_connexion`),
  ADD UNIQUE KEY `id_utilisateur` (`id_connexion`,`id_utilisateur`),
  ADD KEY `id_utilisateur_2` (`id_utilisateur`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact_pro`
--
ALTER TABLE `contact_pro`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notation_entreprise`
--
ALTER TABLE `notation_entreprise`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notation_etudiant`
--
ALTER TABLE `notation_etudiant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notation_referent`
--
ALTER TABLE `notation_referent`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `profil_entreprise`
--
ALTER TABLE `profil_entreprise`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `profil_etudiant`
--
ALTER TABLE `profil_etudiant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `profil_mentor`
--
ALTER TABLE `profil_mentor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etudiant_id` (`etudiant_id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- Index pour la table `utilisateurs-pro`
--
ALTER TABLE `utilisateurs-pro`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `connexion`
--
ALTER TABLE `connexion`
  MODIFY `id_connexion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `connexion-pro`
--
ALTER TABLE `connexion-pro`
  MODIFY `id_connexion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `contact_pro`
--
ALTER TABLE `contact_pro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `notation_entreprise`
--
ALTER TABLE `notation_entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `notation_etudiant`
--
ALTER TABLE `notation_etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `notation_referent`
--
ALTER TABLE `notation_referent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profil_entreprise`
--
ALTER TABLE `profil_entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profil_etudiant`
--
ALTER TABLE `profil_etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profil_mentor`
--
ALTER TABLE `profil_mentor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `utilisateurs-pro`
--
ALTER TABLE `utilisateurs-pro`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD CONSTRAINT `connexion_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Contraintes pour la table `connexion-pro`
--
ALTER TABLE `connexion-pro`
  ADD CONSTRAINT `connexion-pro_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs-pro` (`id_utilisateur`);

--
-- Contraintes pour la table `profil_mentor`
--
ALTER TABLE `profil_mentor`
  ADD CONSTRAINT `profil_mentor_ibfk_1` FOREIGN KEY (`etudiant_id`) REFERENCES `profil_etudiant` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
