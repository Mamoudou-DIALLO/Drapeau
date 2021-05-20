-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : Dim 14 juin 2020 à 04:52
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jeu`
--

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE `historique` (
  `email` varchar(255) NOT NULL,
  `nomPays` varchar(255) NOT NULL,
  `nomContinent` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `points` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `question_c`
--

CREATE TABLE `question_c` (
  `id_c` int(25) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `coord` varchar(255) NOT NULL,
  `points` int(25) NOT NULL DEFAULT 0,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `question_c`
--

INSERT INTO `question_c` (`id_c`, `pays`, `coord`, `points`, `image`) VALUES
(1, 'Australie', '-24.776109,134.755', 10, 'aus.svg'),
(1, 'Guinée', '10.722623,-10.708359', 15, 'gin.svg'),
(1, 'Maroc', '31.1728205,-7.3362482', 15, 'mar.svg'),
(1, 'France', '46.603354,1.8883335', 15, 'fra.svg'),
(1, 'Espagne', '39.3262345,-4.8380649', 15, 'esp.svg'),
(1, 'Canada', '61.0666922,-107.9917071', 15, 'can.svg'),
(1, 'Etats-Unis', '39.7837304,-100.4458825', 15, 'usa.svg');

-- --------------------------------------------------------

--
-- Structure de la table `question_p`
--

CREATE TABLE `question_p` (
  `id_p` int(25) NOT NULL,
  `continent` varchar(255) NOT NULL,
  `corrd` varchar(255) NOT NULL,
  `points` int(25) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `question_p`
--

INSERT INTO `question_p` (`id_p`, `continent`, `corrd`, `points`) VALUES
(1, 'Europe ', '50.8465573,4.351697', 15),
(1, 'Afrique', '12.368148,-1.527085', 15),
(1, 'Europe', '43.8519774,18.3866868', 15),
(1, 'Asie', '55.7504461,37.6174943', 15),
(1, 'Amérique', '-10.3333333,-53.2', 10),
(1, 'Afrique', '0.390002,9.454001', 15),
(1, 'Asie', '35.6828387,139.7594549', 15);

-- --------------------------------------------------------

--
-- Structure de la table `quiz_c`
--

CREATE TABLE `quiz_c` (
  `id_c` int(11) NOT NULL,
  `points_total` int(11) NOT NULL DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `quiz_c`
--

INSERT INTO `quiz_c` (`id_c`, `points_total`) VALUES
(1, 100);

-- --------------------------------------------------------

--
-- Structure de la table `quiz_p`
--

CREATE TABLE `quiz_p` (
  `id_p` int(11) NOT NULL,
  `points_total` int(11) NOT NULL DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `quiz_p`
--

INSERT INTO `quiz_p` (`id_p`, `points_total`) VALUES
(1, 100);

-- --------------------------------------------------------

--
-- Structure de la table `score_c`
--

CREATE TABLE `score_c` (
  `id` int(25) NOT NULL,
  `id_c` int(25) NOT NULL,
  `score_c` int(25) DEFAULT NULL,
  `date_s` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `score_p`
--

CREATE TABLE `score_p` (
  `id` int(25) NOT NULL,
  `id_p` int(25) NOT NULL,
  `score_p` int(25) DEFAULT NULL,
  `date_s` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mot_de_passe` varchar(25) NOT NULL,
  `confirmation` varchar(255) NOT NULL,
  `securite` varchar(255) NOT NULL,
  `reponse` varchar(255) NOT NULL,
  `date_i` date NOT NULL DEFAULT current_timestamp(),
  `score` int(10) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `historique` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `email`, `mot_de_passe`, `confirmation`, `securite`, `reponse`, `date_i`, `score`, `image`, `historique`) VALUES
(23, 'Regragui', 'youssireg123@gmail.com', 'e10adc3949ba59abbe56e057f', 'Yousra123.', 'what is your favorite country?', 'korea', '0000-00-00', 0, '', ''),
(24, 'korka diallo', 'mkorka96.diallo@gmail.com', '1234', '1234', 'why?', 'me', '0000-00-00', 0, '', ''),
(25, 'nom', 'email@email.com', '123456789', '123456789', 'what is your favorite country?', 'canada', '0000-00-00', 0, '', ''),
(26, 'sfgsf', 'aehtaet@yahoo.fr', '123456789', '123456789', 'what is your favorite country?', 'France', '2020-06-13', NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `historique`
--
ALTER TABLE `historique`
  ADD KEY `email` (`email`),
  ADD KEY `email_2` (`email`),
  ADD KEY `email_3` (`email`);

--
-- Index pour la table `question_c`
--
ALTER TABLE `question_c`
  ADD KEY `id_c` (`id_c`),
  ADD KEY `id_c_2` (`id_c`);

--
-- Index pour la table `question_p`
--
ALTER TABLE `question_p`
  ADD KEY `id_p` (`id_p`);

--
-- Index pour la table `quiz_c`
--
ALTER TABLE `quiz_c`
  ADD PRIMARY KEY (`id_c`);

--
-- Index pour la table `quiz_p`
--
ALTER TABLE `quiz_p`
  ADD PRIMARY KEY (`id_p`);

--
-- Index pour la table `score_c`
--
ALTER TABLE `score_c`
  ADD PRIMARY KEY (`id`,`id_c`),
  ADD KEY `id` (`id`),
  ADD KEY `fk_id_c_id_cc` (`id_c`);

--
-- Index pour la table `score_p`
--
ALTER TABLE `score_p`
  ADD PRIMARY KEY (`id`,`id_p`),
  ADD KEY `fk_id_p_id_pp` (`id_p`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `quiz_c`
--
ALTER TABLE `quiz_c`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `quiz_p`
--
ALTER TABLE `quiz_p`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `question_p`
--
ALTER TABLE `question_p`
  ADD CONSTRAINT `fk_id_p_id_p` FOREIGN KEY (`id_p`) REFERENCES `quiz_p` (`id_p`);

--
-- Contraintes pour la table `score_c`
--
ALTER TABLE `score_c`
  ADD CONSTRAINT `fk_id_c_id_cc` FOREIGN KEY (`id_c`) REFERENCES `quiz_c` (`id_c`),
  ADD CONSTRAINT `fk_id_id` FOREIGN KEY (`id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `score_p`
--
ALTER TABLE `score_p`
  ADD CONSTRAINT `fk_id_p_id` FOREIGN KEY (`id`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `fk_id_p_id_pp` FOREIGN KEY (`id_p`) REFERENCES `quiz_p` (`id_p`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
