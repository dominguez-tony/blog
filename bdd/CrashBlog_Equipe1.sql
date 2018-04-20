-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 07 Mars 2018 à 13:55
-- Version du serveur :  5.7.21-0ubuntu0.16.04.1
-- Version de PHP :  7.0.25-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `CrashBlog_Equipe1`
--

-- --------------------------------------------------------

--
-- Structure de la table `Article`
--

CREATE TABLE `Article` (
  `ID_article` int(11) NOT NULL,
  `Titre` varchar(255) DEFAULT NULL,
  `Date_Creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Contenu` text,
  `URL_image` text,
  `Auteur` varchar(50) DEFAULT NULL,
  `Categorie` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Article`
--

INSERT INTO `Article` (`ID_article`, `Titre`, `Date_Creation`, `Contenu`, `URL_image`, `Auteur`, `Categorie`) VALUES
(1, 'Git', '2018-02-10 23:00:00', 'Qu\'est-ce que Git?', 'http://www.unixstickers.com/image/cache/data/stickers/git/git.sh-340x340.png', 'Tony', 'Versionning'),
(2, 'Getters & Setters d\'un objet', '2018-02-26 23:00:00', 'Basiquement, une propriété d\'objet. Mais elle offre plus de possibilités que les propriétés classiques (ou propriétés de données). Ces dernières stockent simplement une valeur dans l\'objet, appariée au nom de sa propriété.\r\n\r\nDans une propriété get / set, les actions mises en place dans le set pour traiter l\'information sont effectuées à chaque accès, et la valeur est retournée par le get. On parle d\'une propriété d\'accesseur : on y accède, du code est mouliné, incidemment ça renvoit une valeur.', 'http://51.254.203.143/crashcoders/blog/wp-content/uploads/2018/02/getSet-1.png', 'Laure', 'Développement'),
(3, 'Qu’est-ce que l’UX?', '2018-02-27 09:21:34', 'Le terme d\'expérience utilisateur (User eXperience) a été créé dans les années 90 par Donald Norman, qui travaillait chez Apple.\r\nPour lui, l\'UX correspond aux réponses et aux perceptions d’une personne qui résultent de l’usage ou de l’anticipation de l’usage d’un produit, d’un service ou d’un système. ', 'http://51.254.203.143/crashcoders/blog/wp-content/uploads/2018/01/UX_1-247x300.png', 'Caroline', 'Interface');

-- --------------------------------------------------------

--
-- Structure de la table `Auteur`
--

CREATE TABLE `Auteur` (
  `Nom_Auteur` varchar(50) NOT NULL DEFAULT '',
  `Mail_Auteur` varchar(65) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Auteur`
--

INSERT INTO `Auteur` (`Nom_Auteur`, `Mail_Auteur`) VALUES
('Tony', 'acs.tony@gmail.fr'),
('Laure', 'acs.laure@gmail.fr'),
('Jordan', 'acs.jordan@gmail.fr'),
('Gautier', 'acs.gautier@gmail.fr'),
('Caroline', 'acs.caroline@gmail.fr');

-- --------------------------------------------------------

--
-- Structure de la table `Categorie`
--

CREATE TABLE `Categorie` (
  `Nom_Categorie` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Categorie`
--

INSERT INTO `Categorie` (`Nom_Categorie`) VALUES
('Actualités'),
('Développement'),
('Ergonomie'),
('IDE'),
('Interface'),
('Méthode de travail'),
('Sécurité'),
('Tutoriel'),
('Versionning'),
('Web');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Article`
--
ALTER TABLE `Article`
  ADD PRIMARY KEY (`ID_article`);

--
-- Index pour la table `Auteur`
--
ALTER TABLE `Auteur`
  ADD PRIMARY KEY (`Nom_Auteur`);

--
-- Index pour la table `Categorie`
--
ALTER TABLE `Categorie`
  ADD PRIMARY KEY (`Nom_Categorie`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Article`
--
ALTER TABLE `Article`
  MODIFY `ID_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
