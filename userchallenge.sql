-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 30 Janvier 2017 à 16:34
-- Version du serveur :  5.6.32-1+deb.sury.org~xenial+0.1
-- Version de PHP :  7.0.14-2+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `userchallenge`
--

-- --------------------------------------------------------

--
-- Structure de la table `challenge`
--

CREATE TABLE `challenge` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `password` varchar(200) NOT NULL,
  `username` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `challenge`
--

INSERT INTO `challenge` (`id`, `nom`, `password`, `username`) VALUES
(1, 'marchand', '123456', 'momo'),
(2, 'mary', '123456', 'bea'),
(3, 'chris', '456', 'cricri');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `prenom` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `jeux` varchar(30) NOT NULL,
  `age` date NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id`, `image`, `prenom`, `email`, `jeux`, `age`, `message`) VALUES
(65, 'call.jpg', 'papa', 'luciemoche@gmail.com', 'callofdutty', '1975-03-01', ''),
(66, 'seiya.jpg', 'christian', 'vid@gmail.com', 'seiya', '2000-12-12', ''),
(67, 'gtaV.jpg', 'coco', '', 'gtaV', '1975-03-01', ''),
(68, 'call.jpg', 'christian', '', 'carambar', '1975-03-01', ''),
(69, 'fff.jpg', 'fred', '', 'seiya', '1980-12-12', ''),
(70, 'jaquette-HD-PlayStation-4-FIFA-17.jpg', 'fred', '', '', '2000-12-12', '');

-- --------------------------------------------------------

--
-- Structure de la table `custom`
--

CREATE TABLE `custom` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `navbar` varchar(255) NOT NULL,
  `bouton` varchar(200) NOT NULL,
  `police` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `custom`
--

INSERT INTO `custom` (`id`, `titre`, `url`, `navbar`, `bouton`, `police`) VALUES
(1, '(189, 155, 0, 0.71)', '(212, 237, 000, 0.71)', '(10, 24, 41, 0.71)', '(100, 255, 0, 0.71)', 'Indie Flower');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `challenge`
--
ALTER TABLE `challenge`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `custom`
--
ALTER TABLE `custom`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `challenge`
--
ALTER TABLE `challenge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT pour la table `custom`
--
ALTER TABLE `custom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
