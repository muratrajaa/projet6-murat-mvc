-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : Dim 04 oct. 2020 à 20:30
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Soraya_Shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `taille` varchar(10) NOT NULL,
  `prix` int(11) NOT NULL,
  `description` varchar(300) NOT NULL,
  `image` varchar(50) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT 1,
  `date_created_art` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `titre`, `taille`, `prix`, `description`, `image`, `etat`, `date_created_art`, `id_categorie`) VALUES
(1, 'Caftan Syrene', 'S', 150, '', 'SyreneCiel.jpg', 0, '2020-08-31 22:00:00', 2),
(2, 'Caftan Soie de Medine', 'S/M', 180, 'Me and Mother\\\'s', 'Mom&Me.jpg', 0, '2020-08-31 22:00:00', 2),
(3, 'Caftan Blanche neige', 'S/M', 200, '', 'BlancheNeige.jpg', 0, '2020-09-14 22:00:00', 2),
(11, 'Caftan Sendri', 'M/L', 170, '', 'Sendri.jpg', 1, '2020-09-19 22:00:00', 2),
(14, 'Caftan Cleopatra', 'M/L', 250, '', 'Cliopatra.jpg', 1, '2020-09-12 22:00:00', 2),
(15, 'Caftan Aiglesse', 'S/L', 350, '', 'Aiglesse.jpg', 1, '2020-09-21 15:08:59', 2),
(27, 'Jabadour', 'M/L', 150, 'Jabadour  ideal  pour mariage', 'Jabadour.jpg', 1, '2020-10-03 19:26:02', 7),
(28, 'Jellaba Sousdi', 'L', 80, 'Jellaba Sousdi  ideal f&ecirc;te', 'Zaitra.png', 1, '2020-10-03 19:32:04', 7),
(29, 'Gandoura', 'M/L', 55, 'Gandoura Homme tissus tr&egrave;s l&eacute;ger', 'gandoura.jpg', 1, '2020-10-03 19:34:13', 7);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(20) NOT NULL,
  `date_created_cat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`, `date_created_cat`) VALUES
(2, 'Femme', '2020-09-20 18:14:33'),
(7, 'Homme', '2020-09-25 14:43:04');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `login` varchar(10) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `role` int(1) NOT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `prenom`, `email`, `login`, `pass`, `role`, `statut`) VALUES
(1, 'Rajaa', 'Murat', 'muratrajaa@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(2, 'Rabia', 'Malika', 'rabiamalika@gmail.fr', 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 2, 1),
(3, 'Hanen', 'Seguiri', 'hanenseghiri@gmail.com', 'admin2', 'c84258e9c39059a89ab77d846ddab909', 1, 1),
(4, 'Ouz', 'Karim', 'ouz@karim.fr', 'user2', '7e58d63b60197ceb55a1c487989a3720', 2, 1),
(5, 'Lisa', 'Murat', 'lisa@murat.fr', 'user3', '92877af70a45fd6a2ed7fe81e1236b78', 2, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `article_categorie_FK` (`id_categorie`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_categorie_FK` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
