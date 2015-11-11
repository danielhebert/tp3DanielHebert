-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 11 Novembre 2015 à 04:08
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `speedrunbreakdown`
--

-- --------------------------------------------------------

--
-- Structure de la table `exploits`
--

CREATE TABLE IF NOT EXISTS `exploits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `exploits`
--

INSERT INTO `exploits` (`id`, `name`, `details`) VALUES
(1, 'Out of Bounds', 'To go outside of the playing field of the game.'),
(2, 'Minor glitches', 'Non gamebreaking glitches.'),
(3, 'Luck manipulation', 'Abusing the game''s random number generator in order to always obtain the same result.'),
(5, 'Total control', 'Rewriting the game''s code while playing the game. Usually impossible to do for humans and the techniques vary.');

-- --------------------------------------------------------

--
-- Structure de la table `exploits_tutorials`
--

CREATE TABLE IF NOT EXISTS `exploits_tutorials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exploit_id` int(11) NOT NULL,
  `tutorial_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Contenu de la table `exploits_tutorials`
--

INSERT INTO `exploits_tutorials` (`id`, `exploit_id`, `tutorial_id`) VALUES
(5, 2, 1),
(6, 2, 2),
(7, 2, 4),
(8, 5, 4);

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `platform` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Contenu de la table `games`
--

INSERT INTO `games` (`id`, `name`, `platform`, `image`) VALUES
(1, 'The Legend of Zelda: A Link to the Past', 'Super Nintendo', 'uploads/The_Legend_of_Zelda_A_Link_to_the_Past_SNES_Game_Cover.jpg'),
(2, 'Super Mario World', 'Super Nintendo', 'uploads/Super_Mario_World_Coverart.png'),
(10, 'Donkey Kong Country', 'Super Nintendo', 'uploads/Dkc_snes_boxart.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `platforms`
--

CREATE TABLE IF NOT EXISTS `platforms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `platforms`
--

INSERT INTO `platforms` (`id`, `name`) VALUES
(1, 'Super Nintendo'),
(2, 'PlayStation'),
(3, 'Nintendo 64'),
(4, 'NES'),
(5, 'Gameboy'),
(6, 'Sega Genesis');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'author');

-- --------------------------------------------------------

--
-- Structure de la table `segments`
--

CREATE TABLE IF NOT EXISTS `segments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `goodtime` int(11) NOT NULL,
  `tutorial_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `segments`
--

INSERT INTO `segments` (`id`, `name`, `details`, `goodtime`, `tutorial_id`, `user_id`, `created`, `modified`) VALUES
(1, 'Tower of Hera', 'To beat the boss, always hold your sword out and dash through it when it approches you.', 360, 1, 2, '2015-10-03', '2015-10-06'),
(2, 'Palace of Darkness', 'You need 110 rupees to enter the dungeons. You absolutely need to get the hammer inside the dungeon to beat the boss.', 420, 2, 2, '2015-10-04', '2015-10-04');

-- --------------------------------------------------------

--
-- Structure de la table `times`
--

CREATE TABLE IF NOT EXISTS `times` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` int(11) NOT NULL,
  `commentary` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `segment_id` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `times`
--

INSERT INTO `times` (`id`, `time`, `commentary`, `user_id`, `segment_id`, `created`, `modified`) VALUES
(1, 400, 'Got blocked by the deadrocks.', 2, 1, '2015-10-04', '2015-10-04'),
(2, 760, 'First try, barely knew what I was doing.', 3, 1, '2015-10-06', '2015-10-06');

-- --------------------------------------------------------

--
-- Structure de la table `tutorials`
--

CREATE TABLE IF NOT EXISTS `tutorials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rules` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version_id` int(11) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Contenu de la table `tutorials`
--

INSERT INTO `tutorials` (`id`, `name`, `rules`, `version_id`, `user_id`, `created`, `modified`) VALUES
(1, 'Any% No Major Glitches', 'No out of bounds, exploration glitch or yuzuhara''s bottle adventure.', 1, 1, '2015-09-27', '2015-10-06'),
(2, '100%', 'Get all items on the menu.', 1, 2, '2015-09-28', '2015-10-06'),
(4, 'Any%', 'Do anything you can to get to the end credits.', 4, 3, '2015-10-06', '2015-11-11');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`, `email`, `created`, `modified`, `active`) VALUES
(1, 'admin', '$2a$10$ObnCXEhcafY0vqV1do.8B.Ykh0Jl4yjerwARXGIxxyRuZEK.GMS/.', 1, 'admin@srb.com', '2015-09-27', '2015-09-27', 1),
(2, 'auteur', '$2a$10$tuIt3FLh8odkvlv1t9INquNCDLxrHcop.OL3j4wHYzXkfjkYrhHkG', 2, 'test@test.test', '2015-09-27', '2015-09-27', 1),
(3, 'auteur2', '$2a$10$aQ/HcLa7aG8eco9P5hRiwOx74Nrip/vXJL8qQ1h0ZiJXNr9FrjIeS', 2, 'test@test.test', '2015-09-28', '2015-09-28', 1);

-- --------------------------------------------------------

--
-- Structure de la table `versions`
--

CREATE TABLE IF NOT EXISTS `versions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Contenu de la table `versions`
--

INSERT INTO `versions` (`id`, `game_id`, `name`) VALUES
(1, 1, 'Japan 1.0'),
(2, 1, 'Japan 1.1'),
(3, 1, 'US 1.2'),
(4, 2, 'Japan'),
(5, 2, 'US'),
(8, 10, '1.0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
