-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 17 mai 2022 à 15:42
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `clinica`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `idcl` int(11) NOT NULL AUTO_INCREMENT,
  `mat` varchar(10) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `pren` varchar(50) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `datn` date NOT NULL,
  `adr` text NOT NULL,
  `dos_med` varchar(100) DEFAULT NULL,
  `tel` varchar(8) NOT NULL,
  `email` varchar(100) NOT NULL,
  `modp` varchar(50) NOT NULL,
  PRIMARY KEY (`idcl`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`idcl`, `mat`, `nom`, `pren`, `genre`, `datn`, `adr`, `dos_med`, `tel`, `email`, `modp`) VALUES
(5, '02020202', 'Gharib', 'Rama', 'femme', '2002-01-01', 'Tunis', 'grippe', '25025252', 'ramagharib@gmail.com', 'rama'),
(7, '0099', 'gharib', 'rama', 'femme', '2001-01-02', 'kheiridinne', 'grippe', '1234568', 'rama2@gmail.com', 'rama');

-- --------------------------------------------------------

--
-- Structure de la table `consultations`
--

DROP TABLE IF EXISTS `consultations`;
CREATE TABLE IF NOT EXISTS `consultations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idenv` varchar(10) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `datenv` date NOT NULL,
  `profile` varchar(20) NOT NULL,
  `vers` varchar(10) NOT NULL,
  `statut` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `consultations`
--

INSERT INTO `consultations` (`id`, `idenv`, `titre`, `message`, `datenv`, `profile`, `vers`, `statut`) VALUES
(2, '1', 'titulaire', 'test d\'envoi', '2022-05-14', 'patient', '1', 'oui'),
(3, '1', 'Test3', 'test3', '2022-05-14', 'patient', '1', 'oui'),
(8, '1', 'Consultation', 'azeazeazeaze', '2022-05-15', 'docteur', '1', 'oui'),
(9, '1', 'Consultation', 'grippex\r\ndoliprane', '2022-05-17', 'docteur', '1', 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `suj` varchar(300) NOT NULL,
  `msg` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

DROP TABLE IF EXISTS `devis`;
CREATE TABLE IF NOT EXISTS `devis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `genre` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `pren` varchar(50) NOT NULL,
  `adr` varchar(200) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `cp` varchar(20) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `assur` varchar(20) NOT NULL,
  `msg` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `docteurs`
--

DROP TABLE IF EXISTS `docteurs`;
CREATE TABLE IF NOT EXISTS `docteurs` (
  `iddoc` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `specialite` varchar(200) NOT NULL,
  `tel` varchar(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login` varchar(20) NOT NULL,
  `modp` varchar(20) NOT NULL,
  PRIMARY KEY (`iddoc`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `docteurs`
--

INSERT INTO `docteurs` (`iddoc`, `nom`, `prenom`, `specialite`, `tel`, `email`, `login`, `modp`) VALUES
(1, 'Basli', 'mohamed', 'génicologie', '25001001', 'basly@yahoo.fr', 'basly', 'basly'),
(2, 'Gargouri', 'Mohamed', 'généraliste', '98520025', 'gargouri@gmail.com', 'gargouri', 'gargouri'),
(3, 'Sahbi', 'Fatma', 'Coeur', '21212121', 'fatma@fatma.fr', 'fatma', 'fatma'),
(4, 'test', 'test', 'test', 'test', 'test@test.com', 'test', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(100) NOT NULL,
  `cin` varchar(100) NOT NULL,
  `motdepasse` varchar(20) NOT NULL,
  `adresse` varchar(20) NOT NULL,
  `date naissance` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `rendezvous`
--

DROP TABLE IF EXISTS `rendezvous`;
CREATE TABLE IF NOT EXISTS `rendezvous` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcl` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `pren` varchar(50) NOT NULL,
  `genre` varchar(10) NOT NULL,
  `sympt` text NOT NULL,
  `iddoc` varchar(10) NOT NULL,
  `dater` date NOT NULL,
  `status` char(1) DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `pren` varchar(50) NOT NULL,
  `login` varchar(20) NOT NULL,
  `modp` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `pren`, `login`, `modp`) VALUES
(1, 'Gharib', 'Rama', 'admin', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
