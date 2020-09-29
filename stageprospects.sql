-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 29 sep. 2020 à 11:42
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stageprospects`
--

-- --------------------------------------------------------

--
-- Structure de la table `categ_formation`
--

CREATE TABLE `categ_formation` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categ_formation`
--

INSERT INTO `categ_formation` (`id`, `nom`) VALUES
(1, 'Contrat De Formation (formation initiale)'),
(2, 'Convention de formation (formation en alternance)');

-- --------------------------------------------------------

--
-- Structure de la table `charge_de`
--

CREATE TABLE `charge_de` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `charge_de`
--

INSERT INTO `charge_de` (`id`, `libelle`) VALUES
(1, 'Intégralement du candidat'),
(2, 'Partiellement du Candidat, montant : '),
(3, 'Structure Externe, nom :');

-- --------------------------------------------------------

--
-- Structure de la table `connu_par`
--

CREATE TABLE `connu_par` (
  `id` int(11) NOT NULL,
  `reseau` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `connu_par`
--

INSERT INTO `connu_par` (`id`, `reseau`) VALUES
(1, 'Bouche à oreilles'),
(2, 'Internet'),
(3, 'Publicité'),
(4, 'Salon de l\'étudiant');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20200915121112', '2020-09-15 12:11:27', 125),
('DoctrineMigrations\\Version20200915122826', '2020-09-15 12:28:36', 459),
('DoctrineMigrations\\Version20200915123044', '2020-09-15 12:30:54', 110),
('DoctrineMigrations\\Version20200915124825', '2020-09-15 12:48:34', 66),
('DoctrineMigrations\\Version20200915135644', '2020-09-15 13:56:53', 129),
('DoctrineMigrations\\Version20200915135724', '2020-09-15 14:41:10', 81),
('DoctrineMigrations\\Version20200915135729', '2020-09-15 14:41:10', 7),
('DoctrineMigrations\\Version20200915144059', '2020-09-15 14:41:10', 28),
('DoctrineMigrations\\Version20200916062833', '2020-09-16 06:28:48', 133),
('DoctrineMigrations\\Version20200916063407', '2020-09-16 06:34:13', 75),
('DoctrineMigrations\\Version20200921064936', '2020-09-21 06:49:46', 275),
('DoctrineMigrations\\Version20200921065840', '2020-09-21 06:58:46', 103),
('DoctrineMigrations\\Version20200921072707', '2020-09-21 08:33:04', 243),
('DoctrineMigrations\\Version20200921083423', '2020-09-21 08:34:32', 313),
('DoctrineMigrations\\Version20200922111822', '2020-09-22 11:18:32', 157),
('DoctrineMigrations\\Version20200923065549', '2020-09-23 06:56:03', 173),
('DoctrineMigrations\\Version20200928082714', '2020-09-28 08:27:26', 173);

-- --------------------------------------------------------

--
-- Structure de la table `etape`
--

CREATE TABLE `etape` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etape`
--

INSERT INTO `etape` (`id`, `nom`) VALUES
(1, 'Prospect'),
(2, 'Pré-Inscription');

-- --------------------------------------------------------

--
-- Structure de la table `financement`
--

CREATE TABLE `financement` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `financement`
--

INSERT INTO `financement` (`id`, `nom`) VALUES
(1, 'Alternance (Alpha PRIMO)'),
(2, 'CPF (Alpha Primo)'),
(3, 'Continue (Alpha PRIMO)'),
(4, 'Formation initiale conduisant à un diplôme d\'état (GROUPE ARES MATHZAP FORMATION)'),
(5, 'Formation privée (GROUPE ARES MATHZAP FORMATION)');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duree` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contenu_formation` longtext COLLATE utf8mb4_unicode_ci,
  `lieu_formation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cout_formation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_formation_id` int(11) DEFAULT NULL,
  `mat_supp` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id`, `type`, `duree`, `contenu_formation`, `lieu_formation`, `cout_formation`, `session_formation_id`, `mat_supp`) VALUES
(1, 'BTS Comptabilité-gestion (A)', '24 mois', 'Référentiel pédagogique de la formation choisie.\r\nDocument consultable sur le site du ministère de l\'éducation nationale ou du ministère du travail.', '8 BD. Jules Ferry 42300 ROANNE', '5250 €', 3, 1),
(2, 'BTS Comptabilité-gestion (I)', '24 mois', 'Référentiel pédagogique de la formation choisie.\r\nDocument consultable sur le site du ministère de l\'éducation nationale ou du ministère du travail.', '8 BD. Jules Ferry 42300 ROANNE', '7600 €', 2, 1),
(3, 'BTS SIO (A)', '24 mois', 'Référentiel pédagogique de la formation choisie.\r\nDocument consultable sur le site du ministère de l\'éducation nationale ou du ministère du travail.', '8 bd. Jules Ferry 42300 ROANNE', '5360 €', 3, 0),
(4, 'BTS SIO (I)', '24 MOIS', 'Référentiel pédagogique de la formation choisie.\r\nDocument consultable sur le site du ministère de l\'éducation nationale ou du ministère du travail.', '8 bd. Jules Ferry 42300 ROANNE', '7950 €', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `nom`, `prenom`) VALUES
(1, 'Bassot ', 'Nadine'),
(2, 'Lacan', 'David');

-- --------------------------------------------------------

--
-- Structure de la table `parcours`
--

CREATE TABLE `parcours` (
  `id` int(11) NOT NULL,
  `num_pole_emploi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dernier_diplome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dernier_emploi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dernier_contrat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `handicap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarque` longtext COLLATE utf8mb4_unicode_ci,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_referent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_referent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `structure_id` int(11) NOT NULL,
  `formation_id` int(11) NOT NULL,
  `encours_diplome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `parcours`
--

INSERT INTO `parcours` (`id`, `num_pole_emploi`, `cpf`, `dernier_diplome`, `dernier_emploi`, `dernier_contrat`, `handicap`, `remarque`, `cv`, `nom_referent`, `mail_referent`, `structure_id`, `formation_id`, `encours_diplome`) VALUES
(1, '12535564', '2500', 'Quia consequatur', 'Voluptatem', 'Sunt molli', '', 'Fuga Quia voluptate', NULL, 'Possimus ea quis aliqua Amet autem aliquam qui sed temporibus tempora maxime voluptatem Sint velit', 'weqevab@mailinator.com', 2, 2, 'Sit numquam');

-- --------------------------------------------------------

--
-- Structure de la table `pre_inscription`
--

CREATE TABLE `pre_inscription` (
  `id` int(11) NOT NULL,
  `prospect_id` int(11) NOT NULL,
  `charge_de_id` int(11) NOT NULL,
  `categ_formation_id` int(11) DEFAULT NULL,
  `financement_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `candidat_montant_partiel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_structure_financement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_structure_financement_valide` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`id`, `nom`) VALUES
(1, 'Client'),
(2, 'Etudiant'),
(3, 'Demandeur d\'emploi');

-- --------------------------------------------------------

--
-- Structure de la table `prospect`
--

CREATE TABLE `prospect` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pwd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `actif` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `profil_id` int(11) DEFAULT NULL,
  `parcours_id` int(11) DEFAULT NULL,
  `connu_par_id` int(11) DEFAULT NULL,
  `membre_id` int(11) DEFAULT NULL,
  `etape_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `lieu_naissance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dept_naissance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationalite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `session_formation`
--

CREATE TABLE `session_formation` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_debut` datetime DEFAULT NULL,
  `date_fin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `session_formation`
--

INSERT INTO `session_formation` (`id`, `nom`, `date_debut`, `date_fin`) VALUES
(1, 'session 2019/2021', '2019-09-01 09:44:44', '2021-06-30 09:44:44'),
(2, 'session 2020/2022 (A)', '2020-09-01 09:44:44', '2022-06-30 09:44:44'),
(3, 'session 2020/2022 (A)', '2020-09-01 09:47:36', '2021-06-30 09:47:36');

-- --------------------------------------------------------

--
-- Structure de la table `structure`
--

CREATE TABLE `structure` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `structure`
--

INSERT INTO `structure` (`id`, `nom`) VALUES
(1, 'AFPA'),
(2, 'structure Y');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categ_formation`
--
ALTER TABLE `categ_formation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `charge_de`
--
ALTER TABLE `charge_de`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `connu_par`
--
ALTER TABLE `connu_par`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `etape`
--
ALTER TABLE `etape`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `financement`
--
ALTER TABLE `financement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_404021BF9C9D95AF` (`session_formation_id`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parcours`
--
ALTER TABLE `parcours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_99B1DEE32534008B` (`structure_id`),
  ADD KEY `IDX_99B1DEE35200282E` (`formation_id`);

--
-- Index pour la table `pre_inscription`
--
ALTER TABLE `pre_inscription`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_B2AA45A9D182060A` (`prospect_id`),
  ADD KEY `IDX_B2AA45A9294C31AB` (`charge_de_id`),
  ADD KEY `IDX_B2AA45A9AC46B28` (`categ_formation_id`),
  ADD KEY `IDX_B2AA45A9A737ED74` (`financement_id`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prospect`
--
ALTER TABLE `prospect`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_C9CE8C7D6E38C0DB` (`parcours_id`),
  ADD KEY `IDX_C9CE8C7D275ED078` (`profil_id`),
  ADD KEY `IDX_C9CE8C7D7AD1553F` (`connu_par_id`),
  ADD KEY `IDX_C9CE8C7D6A99F74A` (`membre_id`),
  ADD KEY `IDX_C9CE8C7D4A8CA2AD` (`etape_id`);

--
-- Index pour la table `session_formation`
--
ALTER TABLE `session_formation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `structure`
--
ALTER TABLE `structure`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categ_formation`
--
ALTER TABLE `categ_formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `charge_de`
--
ALTER TABLE `charge_de`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `connu_par`
--
ALTER TABLE `connu_par`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `etape`
--
ALTER TABLE `etape`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `financement`
--
ALTER TABLE `financement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `parcours`
--
ALTER TABLE `parcours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `pre_inscription`
--
ALTER TABLE `pre_inscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `prospect`
--
ALTER TABLE `prospect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `session_formation`
--
ALTER TABLE `session_formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `structure`
--
ALTER TABLE `structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `FK_404021BF9C9D95AF` FOREIGN KEY (`session_formation_id`) REFERENCES `session_formation` (`id`);

--
-- Contraintes pour la table `parcours`
--
ALTER TABLE `parcours`
  ADD CONSTRAINT `FK_99B1DEE32534008B` FOREIGN KEY (`structure_id`) REFERENCES `structure` (`id`),
  ADD CONSTRAINT `FK_99B1DEE35200282E` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`id`);

--
-- Contraintes pour la table `pre_inscription`
--
ALTER TABLE `pre_inscription`
  ADD CONSTRAINT `FK_B2AA45A9294C31AB` FOREIGN KEY (`charge_de_id`) REFERENCES `charge_de` (`id`),
  ADD CONSTRAINT `FK_B2AA45A9A737ED74` FOREIGN KEY (`financement_id`) REFERENCES `financement` (`id`),
  ADD CONSTRAINT `FK_B2AA45A9AC46B28` FOREIGN KEY (`categ_formation_id`) REFERENCES `categ_formation` (`id`),
  ADD CONSTRAINT `FK_B2AA45A9D182060A` FOREIGN KEY (`prospect_id`) REFERENCES `prospect` (`id`);

--
-- Contraintes pour la table `prospect`
--
ALTER TABLE `prospect`
  ADD CONSTRAINT `FK_C9CE8C7D275ED078` FOREIGN KEY (`profil_id`) REFERENCES `profil` (`id`),
  ADD CONSTRAINT `FK_C9CE8C7D4A8CA2AD` FOREIGN KEY (`etape_id`) REFERENCES `etape` (`id`),
  ADD CONSTRAINT `FK_C9CE8C7D6A99F74A` FOREIGN KEY (`membre_id`) REFERENCES `membre` (`id`),
  ADD CONSTRAINT `FK_C9CE8C7D6E38C0DB` FOREIGN KEY (`parcours_id`) REFERENCES `parcours` (`id`),
  ADD CONSTRAINT `FK_C9CE8C7D7AD1553F` FOREIGN KEY (`connu_par_id`) REFERENCES `connu_par` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
