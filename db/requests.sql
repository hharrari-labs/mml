-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 27 Mars 2013 à 11:35
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `dev_mml`
--
-- --------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `dev_mml`;
use `dev_mml`;

--
-- Structure de la table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_vf` varchar(255) NOT NULL,
  `title_vo` varchar(255) NOT NULL,
  `year` date NOT NULL,
  `synopsis` text NOT NULL,
  `jacket` varchar(255) NOT NULL,
  `edition` varchar(255) NOT NULL,
  `distributor` varchar(255) NOT NULL,
  `zone` varchar(15) NOT NULL,
  `duration` int(11) NOT NULL,
  `trailer` varchar(255) NOT NULL,
  `loan` tinyint(1) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `manuel` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Contenu de la table `movies`
--

INSERT INTO `movies` (`id`, `title_vf`, `title_vo`, `year`, `synopsis`, `jacket`, `edition`, `distributor`, `zone`, `duration`, `trailer`, `loan`, `barcode`) VALUES
(1, 'avatar', 'avatar', '2012-11-09', 'ohfzeufoiu', 'bleu', 'usa', 'usa', 1, 8686756, 'fefkgfego', 0, 'kefe8664864'),
(2, 'test', 'en_test', '2013-02-12', 'hhh', 'beau', 'iui', 'kjkj', 4, 45, 'nope', 0, '1215457987'),
(3, 'district 9', 'district 9', '2013-02-11', 'lkl', 'kjkh', 'kjkj', 'kjkj', 5, 45, 'lmlm', 0, '45892586');

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adversity` varchar(255) NOT NULL,
  `signature` varchar(255) NOT NULL,
  `presentation` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `user_status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;


-- --------------------------------------------------------

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `email`, `password`, `adversity`, `signature`, `presentation`, `location`, `user_status_id`) VALUES
(1, 'administrator', 'moderator', 'admin@mml.fr', '098f6bcd4621d373cade4e832627b4f6', 'defe', 'efe', 'efef', 'efe', 1),
(2, 'member', 'toto', 'member@mml.fr', '098f6bcd4621d373cade4e832627b4f6', 'guefz', 'ezf', 'je suis un membre', 'zefze', 2),
(4, 'tristan', 'azais', 'test@mml.fr', '098f6bcd4621d373cade4e832627b4f6', 'n', 'ok', 'rien', 'paris', 1),
(5, 'membre', 'mm', 'membre@mml.fr', '5a99c8cac333affeed05a24fe0d6f61c', 'dsds', 'jyuy', 'jhhggf', '4', 2),
(6, 'real', 'admin', 'real@mml.fr', '4bca24304861acde5770fdbe3cc2503b', 'jh', 'hj', 'gh', '4', 1);

--
-- Structure de la table `loans`
--

CREATE TABLE IF NOT EXISTS `loans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11),
  `id_movie` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `firs_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY(`id_user`) REFERENCES users(`id`),
  FOREIGN KEY(`id_movie`) REFERENCES movies(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------



-- --------------------------------------------------------
--
-- Structure de la table `other_infos`
--

CREATE TABLE IF NOT EXISTS `other_infos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) UNIQUE NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Structure de la table `movies_other_infos`
--

CREATE TABLE IF NOT EXISTS `movies_other_infos` (
  `movie_id` int(255) NOT NULL,
  `other_info_id` int(255) NOT NULL,
  PRIMARY KEY (`movie_id`,`other_info_id`),
  FOREIGN KEY (`movie_id`) REFERENCES movies(`id`),
  FOREIGN KEY(`other_info_id`) REFERENCES other_infos(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `subtitles`
--

CREATE TABLE IF NOT EXISTS `subtitles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `track_sounds`
--

CREATE TABLE IF NOT EXISTS `track_sounds` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `language` varchar(255) NOT NULL,
  `encoding` varchar(255) NOT NULL,
  `standard_audio` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------
--
-- Structure de la table `movies_subtitles`
--

CREATE TABLE IF NOT EXISTS `movies_subtitles` (
  `movie_id` int(255) NOT NULL,
  `subtitle_id` int(255) NOT NULL,
  PRIMARY KEY (`movie_id`,`subtitle_id`),
  FOREIGN KEY(`movie_id`) REFERENCES movies(`id`),
  FOREIGN KEY(`subtitle_id`) REFERENCES subtitles(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `movies_teams`
--

CREATE TABLE IF NOT EXISTS `movies_teams` (
  `movie_id` int(255) NOT NULL,
  `team_id` int(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`movie_id`,`team_id`),
  FOREIGN KEY(`movie_id`) REFERENCES movies(`id`),
  FOREIGN KEY(`team_id`) REFERENCES teams(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `movies_track_sounds`
--

CREATE TABLE IF NOT EXISTS `movies_track_sounds` (
  `movie_id` int(255) NOT NULL,
  `track_sound_id` int(255) NOT NULL,
  PRIMARY KEY (`movie_id`,`track_sound_id`),
  FOREIGN KEY(`movie_id`) REFERENCES movies(`id`),
  FOREIGN KEY(`track_sound_id`) REFERENCES track_sounds(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `movies_users`
--

CREATE TABLE IF NOT EXISTS `movies_users` (
  `movie_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  PRIMARY KEY (`movie_id`,`user_id`),
  FOREIGN KEY(`movie_id`) REFERENCES movies(`id`),
  FOREIGN KEY(`user_id`) REFERENCES users(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Structure de la table `user_status`
--

CREATE TABLE IF NOT EXISTS `user_status` (
  `id` int(11) NOT NULL,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `movies_users`
--

INSERT INTO `movies_users` (`movie_id`, `user_id`) VALUES
(1, 4),
(2, 2);

--
-- Contenu de la table `user_status`
--

INSERT INTO `user_status` (`id`, `status`) VALUES
(1, 'ADMIN'),
(2, 'MEMBER');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
