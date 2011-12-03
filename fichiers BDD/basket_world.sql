-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le : Sam 03 Décembre 2011 à 15:36
-- Version du serveur: 5.5.16
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `basket_world`
--

-- --------------------------------------------------------

--
-- Structure de la table `actions`
--

CREATE TABLE IF NOT EXISTS `actions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `actions_matches`
--

CREATE TABLE IF NOT EXISTS `actions_matches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` int(10) unsigned NOT NULL,
  `player1_id` int(10) unsigned NOT NULL,
  `player2_id` int(10) unsigned DEFAULT NULL,
  `action_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_actions_matches_matches1` (`match_id`),
  KEY `fk_actions_matches_players1` (`player1_id`),
  KEY `fk_actions_matches_players2` (`player2_id`),
  KEY `fk_actions_matches_actions1` (`action_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `action_descriptions`
--

CREATE TABLE IF NOT EXISTS `action_descriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `long_description` text NOT NULL,
  `action_id` int(10) unsigned NOT NULL,
  `language_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_action_descriptions_actions1` (`action_id`),
  KEY `fk_action_descriptions_languages1` (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country` varchar(64) NOT NULL,
  `flag` varchar(64) NOT NULL COMMENT 'Will make a default flag.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `country_UNIQUE` (`country`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `countries`
--

INSERT INTO `countries` (`id`, `country`, `flag`) VALUES
(1, 'Belgique', '');

-- --------------------------------------------------------

--
-- Structure de la table `divisions`
--

CREATE TABLE IF NOT EXISTS `divisions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hierarchy` int(10) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `season_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_divisions_countries1` (`country_id`),
  KEY `fk_divisions_seasons1` (`season_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `divisions`
--

INSERT INTO `divisions` (`id`, `hierarchy`, `name`, `country_id`, `season_id`) VALUES
(5, 1, 'National', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` int(10) unsigned NOT NULL,
  `text` text COLLATE latin1_german2_ci NOT NULL,
  `created` datetime NOT NULL,
  `historical` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_events_teams1` (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `friendly_match_requests`
--

CREATE TABLE IF NOT EXISTS `friendly_match_requests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from_team_id` int(10) unsigned NOT NULL,
  `to_team_id` int(10) unsigned NOT NULL,
  `confirm` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `home` tinyint(1) NOT NULL,
  `date_match` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_friendly match requests_teams1` (`from_team_id`),
  KEY `fk_friendly match requests_teams2` (`to_team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from_user_id` int(10) unsigned NOT NULL,
  `to_user_id` int(10) unsigned NOT NULL,
  `confirm` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_amis_users1` (`from_user_id`),
  KEY `fk_amis_users2` (`to_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `goals`
--

CREATE TABLE IF NOT EXISTS `goals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` text COLLATE latin1_german2_ci NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `auto` tinyint(1) NOT NULL DEFAULT '0',
  `points` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `grades_matches`
--

CREATE TABLE IF NOT EXISTS `grades_matches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `grade` tinyint(3) unsigned NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_notes_matchs_matches1` (`match_id`),
  KEY `fk_notes_matchs_users1` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `instructions`
--

CREATE TABLE IF NOT EXISTS `instructions` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE latin1_german2_ci NOT NULL,
  `description` text COLLATE latin1_german2_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `language` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `matches`
--

CREATE TABLE IF NOT EXISTS `matches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `home_team_id` int(10) unsigned NOT NULL,
  `visitor_team_id` int(10) unsigned NOT NULL,
  `start_date` datetime NOT NULL,
  `home_points` smallint(5) unsigned DEFAULT NULL,
  `visitor_points` smallint(5) unsigned DEFAULT NULL,
  `normal_spectators` mediumint(8) unsigned NOT NULL,
  `vip_spectators` mediumint(8) unsigned NOT NULL,
  `finished` tinyint(1) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL COMMENT 'cup:0, ligue:1, friendly:2',
  PRIMARY KEY (`id`),
  KEY `id_equipe_dom` (`home_team_id`),
  KEY `id_equipe_ext` (`visitor_team_id`),
  KEY `buts_dom` (`home_points`),
  KEY `buts_ext` (`visitor_points`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `matches`
--

INSERT INTO `matches` (`id`, `home_team_id`, `visitor_team_id`, `start_date`, `home_points`, `visitor_points`, `normal_spectators`, `vip_spectators`, `finished`, `type`) VALUES
(1, 30, 31, '2011-11-23 14:12:00', 0, 0, 0, 0, 0, 1),
(2, 31, 30, '2011-12-02 10:59:00', 0, 0, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `matches_players`
--

CREATE TABLE IF NOT EXISTS `matches_players` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `match_id` int(10) unsigned NOT NULL,
  `players_team_id` int(10) unsigned NOT NULL,
  `position` tinyint(3) unsigned NOT NULL COMMENT 'Meneur:0, Arrière:1, Ailier_shooter:2, Ailier_fort:3, Pivot:4, Réserve:5',
  `at_home` tinyint(1) NOT NULL,
  `play_time` time NOT NULL DEFAULT '00:00:00',
  `2pts_attempts` smallint(5) unsigned DEFAULT NULL,
  `2pts_scored` smallint(5) unsigned DEFAULT NULL,
  `3pts_attempts` smallint(5) unsigned DEFAULT NULL,
  `3pts_scored` smallint(5) unsigned DEFAULT NULL,
  `rebounds_offensive` smallint(5) unsigned DEFAULT NULL,
  `rebounds_defensive` smallint(5) unsigned DEFAULT NULL,
  `freethrows_attempts` smallint(5) unsigned DEFAULT NULL,
  `freethrows_scored` smallint(5) unsigned DEFAULT NULL,
  `assists` smallint(5) unsigned DEFAULT NULL,
  `steals` smallint(5) unsigned DEFAULT NULL,
  `blocks` smallint(5) unsigned DEFAULT NULL,
  `fouls` smallint(5) unsigned DEFAULT NULL,
  `injury` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_players_matches_matches1` (`match_id`),
  KEY `fk_matches_players_players_teams1` (`players_team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `matches_players`
--

INSERT INTO `matches_players` (`id`, `match_id`, `players_team_id`, `position`, `at_home`, `play_time`, `2pts_attempts`, `2pts_scored`, `3pts_attempts`, `3pts_scored`, `rebounds_offensive`, `rebounds_defensive`, `freethrows_attempts`, `freethrows_scored`, `assists`, `steals`, `blocks`, `fouls`, `injury`) VALUES
(11, 1, 2, 0, 1, '13:41:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 1, 3, 1, 1, '13:42:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 1, 4, 2, 1, '13:42:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 1, 5, 3, 1, '13:43:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 1, 6, 4, 1, '13:43:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 1, 7, 0, 0, '13:43:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 1, 8, 1, 0, '13:43:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 1, 9, 2, 0, '13:43:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 1, 10, 3, 0, '13:43:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 1, 11, 4, 0, '13:43:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 2, 2, 0, 0, '11:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 2, 3, 1, 0, '11:01:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 2, 4, 2, 0, '11:01:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 2, 5, 3, 0, '11:01:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 2, 6, 4, 0, '11:02:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 2, 7, 0, 1, '11:02:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 2, 8, 1, 1, '11:02:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 2, 9, 2, 1, '11:02:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 2, 10, 3, 1, '11:02:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 2, 11, 4, 1, '11:03:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `age` tinyint(3) unsigned NOT NULL,
  `height` tinyint(3) unsigned NOT NULL,
  `salary` int(10) unsigned NOT NULL,
  `skill` smallint(5) unsigned NOT NULL,
  `shoot` tinyint(3) unsigned NOT NULL,
  `3points` tinyint(3) unsigned NOT NULL,
  `dribble` tinyint(3) unsigned NOT NULL,
  `assist` tinyint(3) unsigned NOT NULL,
  `rebound` tinyint(3) unsigned NOT NULL,
  `block` tinyint(3) unsigned NOT NULL,
  `steal` tinyint(3) unsigned NOT NULL,
  `defense` tinyint(3) unsigned NOT NULL,
  `form` tinyint(3) unsigned NOT NULL,
  `experience` mediumint(8) unsigned NOT NULL,
  `spirit` tinyint(3) unsigned NOT NULL COMMENT 'aggressive:0, calm:1, vicous:2, timid:3',
  `injury` tinyint(3) unsigned NOT NULL,
  `speciality` tinyint(3) unsigned NOT NULL COMMENT 'dunker:0, nasher:1, blocker:2',
  PRIMARY KEY (`id`),
  KEY `fk_players_countries1` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54264 ;

--
-- Contenu de la table `players`
--

INSERT INTO `players` (`id`, `country_id`, `first_name`, `name`, `age`, `height`, `salary`, `skill`, `shoot`, `3points`, `dribble`, `assist`, `rebound`, `block`, `steal`, `defense`, `form`, `experience`, `spirit`, `injury`, `speciality`) VALUES
(54254, 1, 'A3', 'PlayerA3', 22, 180, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0),
(54255, 1, 'A1', 'PlayerA1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0),
(54256, 1, 'A2', 'PlayerA2', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0),
(54257, 1, 'A4', 'PlayerA4', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0),
(54258, 1, 'A5', 'PlayerA5', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0),
(54259, 1, 'B1', 'PlayerB1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0),
(54260, 1, 'B2', 'PlayerB2', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0),
(54261, 1, 'B3', 'PlayerB3', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0),
(54262, 1, 'B4', 'PlayerB4', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0),
(54263, 1, 'B5', 'PlayerB5', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `players_teams`
--

CREATE TABLE IF NOT EXISTS `players_teams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` int(10) unsigned NOT NULL,
  `player_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_players_teams_players1` (`player_id`),
  KEY `fk_players_teams_teams1` (`team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `players_teams`
--

INSERT INTO `players_teams` (`id`, `team_id`, `player_id`) VALUES
(2, 30, 54255),
(3, 30, 54256),
(4, 30, 54254),
(5, 30, 54257),
(6, 30, 54258),
(7, 31, 54259),
(8, 31, 54260),
(9, 31, 54261),
(10, 31, 54262),
(11, 31, 54263);

-- --------------------------------------------------------

--
-- Structure de la table `press_releases`
--

CREATE TABLE IF NOT EXISTS `press_releases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` int(10) unsigned NOT NULL,
  `title` varchar(128) COLLATE latin1_german2_ci NOT NULL,
  `description` text COLLATE latin1_german2_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_communiques_teams1` (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `rankings`
--

CREATE TABLE IF NOT EXISTS `rankings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `division_id` int(10) unsigned NOT NULL,
  `team_id` int(10) unsigned NOT NULL,
  `points` tinyint(3) unsigned NOT NULL,
  `played` tinyint(3) unsigned NOT NULL,
  `victories` tinyint(3) unsigned NOT NULL,
  `defeats` tinyint(3) unsigned NOT NULL,
  `points_scored` smallint(5) unsigned NOT NULL,
  `points_against` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_classements_divisions1` (`division_id`),
  KEY `fk_classements_teams1` (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `rumors`
--

CREATE TABLE IF NOT EXISTS `rumors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `division_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `from` tinyint(3) unsigned NOT NULL COMMENT 'press:0, fan:1, player:2, coach:3',
  PRIMARY KEY (`id`),
  KEY `fk_rumeurs_divisions1` (`division_id`),
  KEY `fk_rumeurs_users1` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `seasons`
--

CREATE TABLE IF NOT EXISTS `seasons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `year` smallint(5) unsigned NOT NULL,
  `start_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `seasons`
--

INSERT INTO `seasons` (`id`, `year`, `start_date`) VALUES
(2, 1, '2011-11-20 12:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `strategies`
--

CREATE TABLE IF NOT EXISTS `strategies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` int(10) unsigned NOT NULL,
  `match_id` int(10) unsigned NOT NULL,
  `type` tinyint(3) unsigned NOT NULL COMMENT 'press:0, mantoman:1, zone:2, triangle:3, pick:4, quick:5, _3points:6',
  `condition` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_strategy_teams1` (`team_id`),
  KEY `fk_strategy_matches1` (`match_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `division_id` int(10) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `gymnasium_name` varchar(128) NOT NULL,
  `places_assises` mediumint(8) unsigned NOT NULL,
  `places_vip` mediumint(8) unsigned NOT NULL,
  `adjoints` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `attaches` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `eplucheurs` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `medecins` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `kines` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `chasseurs` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `stats` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `confiance` tinyint(3) unsigned NOT NULL,
  `cash` int(11) NOT NULL,
  `matos` tinyint(3) unsigned NOT NULL,
  `tenues` tinyint(3) unsigned NOT NULL,
  `muscu` tinyint(3) unsigned NOT NULL,
  `supporters` int(10) unsigned NOT NULL,
  `com_politique_gestion` tinyint(3) unsigned NOT NULL COMMENT 'nothing:0, not_relegated:1, middle:2, top:3, champion:4',
  `com_ambition` tinyint(3) unsigned NOT NULL COMMENT 'trading:0, formation:1',
  PRIMARY KEY (`id`),
  KEY `fk_teams_divisions1` (`division_id`),
  KEY `fk_teams_users1` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Contenu de la table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `division_id`, `name`, `logo`, `gymnasium_name`, `places_assises`, `places_vip`, `adjoints`, `attaches`, `eplucheurs`, `medecins`, `kines`, `chasseurs`, `stats`, `confiance`, `cash`, `matos`, `tenues`, `muscu`, `supporters`, `com_politique_gestion`, `com_ambition`) VALUES
(30, 117, 5, 'Equipe A', '', 'Dan''s Stadium', 100, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0),
(31, 117, 5, 'Equipe B', '', 'test stadium', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `trainers`
--

CREATE TABLE IF NOT EXISTS `trainers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` int(10) unsigned DEFAULT NULL,
  `first_name` varchar(64) COLLATE latin1_german2_ci NOT NULL,
  `name` varchar(64) COLLATE latin1_german2_ci NOT NULL,
  `age` smallint(5) unsigned NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `level` smallint(5) unsigned NOT NULL,
  `style` tinyint(3) unsigned NOT NULL COMMENT 'offensive:0, defensive:1, equal:2l',
  `salary` int(10) unsigned NOT NULL,
  `price` int(10) unsigned NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_trainers_countries1` (`country_id`),
  KEY `fk_trainers_teams1` (`team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `trainers`
--

INSERT INTO `trainers` (`id`, `team_id`, `first_name`, `name`, `age`, `country_id`, `level`, `style`, `salary`, `price`, `available`) VALUES
(2, NULL, 'John', 'Doe', 38, 1, 1, 0, 1000, 10000, 1);

-- --------------------------------------------------------

--
-- Structure de la table `trainings`
--

CREATE TABLE IF NOT EXISTS `trainings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` int(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `weekday` tinyint(4) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL COMMENT 'rest:0, shoot:1, _3points:2, dribble:3, assist:4, rebound:5, block:6, steal:7, defense:8',
  PRIMARY KEY (`id`),
  KEY `fk_trainings_teams1` (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` int(10) unsigned NOT NULL,
  `amount` int(11) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL COMMENT 'billeterie:0, sponsors:1, subventions:2, boutique:3, transferts:4, divers:5, salaires:6, personnels:7, entretien:8, formation:9',
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_economies_teams1` (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `transferts`
--

CREATE TABLE IF NOT EXISTS `transferts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `player_id` int(10) unsigned NOT NULL,
  `acquire_team_id` int(10) unsigned NOT NULL,
  `sell_team_id` int(10) unsigned NOT NULL,
  `gm_watch` int(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `finish_date` datetime NOT NULL,
  `first_price` int(10) unsigned NOT NULL,
  `current_price` int(10) unsigned NOT NULL,
  `sold` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_transferts_players1` (`player_id`),
  KEY `fk_transferts_teams2` (`acquire_team_id`),
  KEY `fk_transferts_teams3` (`sell_team_id`),
  KEY `fk_transferts_users1` (`gm_watch`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_german2_ci NOT NULL,
  `password` varchar(40) COLLATE latin1_german2_ci NOT NULL,
  `validated` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `lastconnect` datetime NOT NULL,
  `email` varchar(255) COLLATE latin1_german2_ci NOT NULL,
  `presentation` text COLLATE latin1_german2_ci NOT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` tinyint(3) unsigned NOT NULL COMMENT 'Male:0, Female:1',
  `ip` varchar(32) COLLATE latin1_german2_ci NOT NULL,
  `avatar` varchar(255) COLLATE latin1_german2_ci NOT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  `waiting` tinyint(1) NOT NULL DEFAULT '0',
  `group` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'member:0, moderator:1, gamemaster:2, anim_rp:3, admin:4',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=119 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `validated`, `created`, `lastconnect`, `email`, `presentation`, `birthdate`, `gender`, `ip`, `avatar`, `inactive`, `waiting`, `group`) VALUES
(117, 'daniel', '17c9ff8a453e01c38a952ee3e73189468d298b2a', 0, '2011-12-01 15:59:37', '2011-12-01 15:59:00', 'dan.gillet@email.com', '', '2011-12-01', 0, '192.168.1.1', '', 0, 0, 0),
(118, 'test', '5f8f76c3d258051fdf4a57e7d677c32475760c78', 0, '2011-12-02 10:51:41', '2011-12-02 10:51:00', 'test@test.com', '', '2011-12-02', 0, '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users_goals`
--

CREATE TABLE IF NOT EXISTS `users_goals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goal_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `gm_valid_user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_obj_membre_objectifs1` (`goal_id`),
  KEY `fk_obj_membre_users1` (`gm_valid_user_id`),
  KEY `fk_users_goals_users1` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `vips`
--

CREATE TABLE IF NOT EXISTS `vips` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_vip_users1` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `youth_investments`
--

CREATE TABLE IF NOT EXISTS `youth_investments` (
  `id` int(10) unsigned NOT NULL,
  `team_id` int(10) unsigned NOT NULL,
  `amount` smallint(5) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_youth_training_centers_teams1` (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `actions_matches`
--
ALTER TABLE `actions_matches`
  ADD CONSTRAINT `fk_actions_matches_actions1` FOREIGN KEY (`action_id`) REFERENCES `actions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_actions_matches_matches1` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_actions_matches_players1` FOREIGN KEY (`player1_id`) REFERENCES `players` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_actions_matches_players2` FOREIGN KEY (`player2_id`) REFERENCES `players` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `action_descriptions`
--
ALTER TABLE `action_descriptions`
  ADD CONSTRAINT `fk_action_descriptions_actions1` FOREIGN KEY (`action_id`) REFERENCES `actions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_action_descriptions_languages1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `divisions`
--
ALTER TABLE `divisions`
  ADD CONSTRAINT `fk_divisions_countries1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_divisions_seasons1` FOREIGN KEY (`season_id`) REFERENCES `seasons` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_events_teams1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `friendly_match_requests`
--
ALTER TABLE `friendly_match_requests`
  ADD CONSTRAINT `fk_friendly match requests_teams1` FOREIGN KEY (`from_team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_friendly match requests_teams2` FOREIGN KEY (`to_team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `fk_amis_users1` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_amis_users2` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `grades_matches`
--
ALTER TABLE `grades_matches`
  ADD CONSTRAINT `fk_notes_matchs_matches1` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_notes_matchs_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `fk_matches_teams1` FOREIGN KEY (`home_team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_matches_teams2` FOREIGN KEY (`visitor_team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `matches_players`
--
ALTER TABLE `matches_players`
  ADD CONSTRAINT `fk_players_matches_matches1` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `matches_players_ibfk_1` FOREIGN KEY (`players_team_id`) REFERENCES `players_teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `fk_players_countries1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `players_teams`
--
ALTER TABLE `players_teams`
  ADD CONSTRAINT `fk_players_teams_players1` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_players_teams_teams1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `press_releases`
--
ALTER TABLE `press_releases`
  ADD CONSTRAINT `fk_communiques_teams1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `rankings`
--
ALTER TABLE `rankings`
  ADD CONSTRAINT `fk_classements_divisions1` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_classements_teams1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `rumors`
--
ALTER TABLE `rumors`
  ADD CONSTRAINT `fk_rumeurs_divisions1` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rumeurs_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `strategies`
--
ALTER TABLE `strategies`
  ADD CONSTRAINT `fk_strategy_matches1` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_strategy_teams1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `fk_teams_divisions1` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_teams_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `trainers`
--
ALTER TABLE `trainers`
  ADD CONSTRAINT `fk_trainers_countries1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_trainers_teams1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `trainings`
--
ALTER TABLE `trainings`
  ADD CONSTRAINT `fk_trainings_teams1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_economies_teams1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `transferts`
--
ALTER TABLE `transferts`
  ADD CONSTRAINT `fk_transferts_players1` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transferts_teams2` FOREIGN KEY (`acquire_team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transferts_teams3` FOREIGN KEY (`sell_team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transferts_users1` FOREIGN KEY (`gm_watch`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `users_goals`
--
ALTER TABLE `users_goals`
  ADD CONSTRAINT `fk_obj_membre_objectifs1` FOREIGN KEY (`goal_id`) REFERENCES `goals` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_obj_membre_users1` FOREIGN KEY (`gm_valid_user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_goals_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `vips`
--
ALTER TABLE `vips`
  ADD CONSTRAINT `fk_vip_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `youth_investments`
--
ALTER TABLE `youth_investments`
  ADD CONSTRAINT `fk_youth_training_centers_teams1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
