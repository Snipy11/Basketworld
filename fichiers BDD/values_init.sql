-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2011 at 03:45 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `basketwo`
--

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `flag`) VALUES
(1, 'France', ''),
(4, 'Allemagne', ''),
(5, 'Angleterre', ''),
(6, 'Hollande', ''),
(7, 'Espagne', ''),
(8, 'Italie', '');

--
-- Dumping data for table `player_first_names`
--

INSERT INTO `player_first_names` (`id`, `first_name`, `country_id`) VALUES
(1, 'Moritz', 4),
(2, 'Olliver', 4),
(3, 'Malte', 4),
(4, 'Anton', 4),
(5, 'Emil', 4),
(6, 'Karl', 4),
(7, 'Max', 4),
(8, 'Jonas', 4),
(9, 'Jürgen', 4),
(10, 'Jörg', 4),
(11, 'Franz', 4),
(12, 'Clemens', 4),
(13, 'Rolf', 4),
(14, 'Wolfgang', 4),
(15, 'Helmut', 4),
(16, 'Johannes', 4),
(17, 'Peter', 4),
(18, 'Kurt', 4),
(19, 'Hans', 4),
(20, 'Julius', 4),
(21, 'Alan', 5),
(22, 'Bryan', 5),
(23, 'Andy', 5),
(24, 'Drew', 5),
(25, 'Morgan', 5),
(26, 'Gavin', 5),
(27, 'Harvey', 5),
(28, 'Harrison', 5),
(29, 'Jordan', 5),
(30, 'Kurt', 5),
(31, 'Larry', 5),
(32, 'Malcolm', 5),
(33, 'Owen', 5),
(34, 'Peter', 5),
(35, 'Ryan', 5),
(36, 'Ron', 5),
(37, 'Shaun', 5),
(38, 'Scott', 5),
(39, 'John', 5),
(40, 'Zack', 5),
(41, 'Paco', 7),
(42, 'Andres', 7),
(43, 'Salvadore', 7),
(44, 'Henriques', 7),
(45, 'Vicente', 7),
(46, 'Pablo', 7),
(47, 'Julio', 7),
(48, 'Pascual', 7),
(49, 'Alberto', 7),
(50, 'Filippo', 7),
(51, 'Francisco', 7),
(52, 'Armando', 7),
(53, 'Cristian', 7),
(54, 'Eduardo', 7),
(55, 'Orlando', 7),
(56, 'Emilio', 7),
(57, 'Armando', 7),
(58, 'Anibal', 7),
(59, 'Santos', 7),
(60, 'Rolando', 7),
(61, 'Enzo', 7),
(62, 'Miguel', 7),
(63, 'Emilio', 7),
(64, 'Roger', 1),
(65, 'Albert', 1),
(66, 'Marcel', 1),
(67, 'Florian', 1),
(68, 'Antoine', 1),
(69, 'Sébastien', 1),
(70, 'Jean-Paul', 1),
(71, 'Morgan', 1),
(72, 'Laurent', 1),
(73, 'Simon', 1),
(74, 'Nathan', 1),
(75, 'Jules', 1),
(76, 'Anthony', 1),
(77, 'Alexis', 1),
(78, 'Léo', 1),
(79, 'Quentin', 1),
(80, 'Alexandre', 1),
(81, 'Clément', 1),
(82, 'Romain', 1),
(83, 'Bertrand', 1),
(84, 'Vladimir', 1),
(85, 'Florent', 1),
(86, 'Maxime', 1),
(87, 'Corentin', 1),
(88, 'Guillaume', 1),
(89, 'Ludovic', 1),
(90, 'Jeremy', 1),
(91, 'Luc', 1),
(92, 'Bastien', 1),
(93, 'Franck', 1),
(94, 'William', 1),
(95, 'Bob', 1),
(96, 'Billy', 1),
(97, 'Matthieu', 1),
(98, 'Bart', 1),
(99, 'Fred', 1),
(100, 'Frederic', 1),
(101, 'Jean', 1),
(102, 'Paul', 1),
(103, 'Jean-Marc', 1),
(104, 'Kevin', 1),
(105, 'Sebastien', 1),
(106, 'Baptiste', 1),
(107, 'Jean-Baptiste', 1),
(108, 'Adrian', 1),
(109, 'Adrien', 1),
(110, 'Alan', 1),
(111, 'Albert', 1),
(112, 'Alex', 1),
(113, 'Anatole', 1),
(114, 'Aurele', 1),
(115, 'Arnaud', 1),
(116, 'Arthur', 1),
(117, 'Axel', 1),
(118, 'Aurelien', 1),
(119, 'Benoit', 1),
(120, 'Brunoit', 1),
(121, 'Calvin', 1),
(122, 'Camille', 1),
(123, 'Charles-Louis', 1),
(124, 'Cyril', 1),
(125, 'Emil', 1),
(126, 'Emmanuel', 1),
(127, 'Manu', 1),
(128, 'Eric', 1),
(129, 'Fabrice', 1),
(130, 'Francis', 1),
(131, 'Gaetan', 1),
(132, 'Hugo', 1),
(133, 'Jean-Philippe', 1),
(134, 'Johann', 1),
(135, 'Julian', 1),
(136, 'Jerome', 1),
(137, 'Leo', 1),
(138, 'Ludo', 1),
(139, 'Mathieu', 1),
(140, 'Matthieu', 1),
(141, 'Nicolas', 1),
(142, 'Nico', 1),
(143, 'Olivier', 1),
(144, 'Peter', 1),
(145, 'Pierre', 1),
(146, 'Raphael', 1),
(147, 'samuel', 1),
(148, 'Sylvain', 1),
(149, 'Thomas', 1),
(150, 'Ugo', 1),
(151, 'Valentin', 1),
(152, 'Yann', 1),
(153, 'Yoann', 1),
(154, 'Yves', 1),
(155, 'Adriaan', 6),
(156, 'Bastiaan', 6),
(157, 'Christiaan', 6),
(158, 'Klaas', 6),
(159, 'Dorus', 6),
(160, 'Ewen', 6),
(161, 'Egbert', 6),
(162, 'Erwin', 6),
(163, 'Frans', 6),
(164, 'Faas', 6),
(165, 'Gerolt', 6),
(166, 'Guus', 6),
(167, 'Jeroen', 6),
(168, 'Joren', 6),
(169, 'Jorgen', 6),
(170, 'Koen', 6),
(171, 'Krelis', 6),
(172, 'Elke', 6),
(173, 'Thijs', 6),
(174, 'Willem', 6),
(175, 'Angelo', 8),
(176, 'Augusto', 8),
(177, 'Andrea', 8),
(178, 'Basso', 8),
(179, 'Camillo', 8),
(180, 'Donatello', 8),
(181, 'Damiano', 8),
(182, 'Eugenio', 8),
(183, 'Eros', 8),
(184, 'Enrico', 8),
(185, 'Franco', 8),
(186, 'Fausto', 8),
(187, 'Giordano', 8),
(188, 'Giacomo', 8),
(189, 'Luciano', 8),
(190, 'Mario', 8),
(191, 'Paolo', 8),
(192, 'Moreno', 8),
(193, 'Orio', 8),
(194, 'Mauro', 8);

--
-- Dumping data for table `player_names`
--

INSERT INTO `player_names` (`id`, `name`, `country_id`) VALUES
(1, 'Klein', 4),
(2, 'Betstein', 4),
(3, 'Burst', 4),
(4, 'Diesdorf', 4),
(5, 'Hettinger', 4),
(6, 'Rotzweiler', 4),
(7, 'Rüttich', 4),
(8, 'Ubach', 4),
(9, 'Gross', 4),
(10, 'Schulter', 4),
(11, 'Tobler', 4),
(12, 'Shuck', 4),
(13, 'Kreuser', 4),
(14, 'Bentz', 4),
(15, 'Bergmann', 4),
(16, 'Braun', 4),
(17, 'Drummer', 4),
(18, 'Frantz', 4),
(19, 'Freud', 4),
(20, 'Hänzel', 4),
(21, 'Lucas', 1),
(22, 'Théo', 1),
(23, 'Valentin', 1),
(24, 'Philippe', 1),
(25, 'Enzo', 1),
(26, 'Maxime', 1),
(27, 'Mathis', 1),
(28, 'Moison', 1),
(29, 'Corentin', 1),
(30, 'Martin', 1),
(31, 'Rémi', 1),
(32, 'Evan', 1),
(33, 'Bastien', 1),
(34, 'Mohamed', 1),
(35, 'Guillaume', 1),
(36, 'Samuel', 1),
(37, 'Dorian', 1),
(38, 'Dylan', 1),
(39, 'Axel', 1),
(40, 'Baptiste', 1),
(41, 'Cook', 5),
(42, 'Grant', 5),
(43, 'Johnson', 5),
(44, 'Gordon', 5),
(45, 'Wilson', 5),
(46, 'Day', 5),
(47, 'Roberts', 5),
(48, 'Clinton', 5),
(49, 'Hodgkin', 5),
(50, 'Richards', 5),
(51, 'Kennedy', 5),
(52, 'White', 5),
(53, 'Young', 5),
(54, 'St John', 5),
(55, 'Scott', 5),
(56, 'Blair', 5),
(57, 'Bush', 5),
(58, 'Ford', 5),
(59, 'Shakespeare', 5),
(60, 'Simpson', 5),
(61, 'Iglesias', 7),
(62, 'Cuenca', 7),
(63, 'Jorquera', 7),
(64, 'Perez', 7),
(65, 'Lopez', 7),
(66, 'Murillo', 7),
(67, 'Torres', 7),
(68, 'Gomez', 7),
(69, 'Garcia', 7),
(70, 'Diaz', 7),
(71, 'Bueno', 7),
(72, 'Castillo', 7),
(73, 'Blanco', 7),
(74, 'Picasso', 7),
(75, 'Flores', 7),
(76, 'Martinez', 7),
(77, 'Sanchez', 7),
(78, 'Albéniz', 7),
(79, 'Alvarez', 7),
(80, 'Climent', 7),
(81, 'Vanbiervliet ', 6),
(82, 'Vancamberg ', 6),
(83, 'Drukker', 6),
(84, 'Zylstra ', 6),
(85, 'Groen ', 6),
(86, 'Hartig ', 6),
(87, 'Wolders ', 6),
(88, 'Van Marwijk ', 6),
(89, 'De Zeeuw ', 6),
(90, 'Stekelenburg ', 6),
(91, 'Verhoeven ', 6),
(92, 'Van Houten', 6),
(93, 'De Lint ', 6),
(94, 'Koch', 6),
(95, 'Friesch ', 6),
(96, 'Van Gogh', 6),
(97, 'Gans', 6),
(98, 'Hauer ', 6),
(99, 'Van Warmerdam ', 6),
(100, 'Stelling ', 6),
(101, 'sbranna', 8),
(102, 'Arcoraci', 8),
(103, 'Belcori', 8),
(104, 'Bonici', 8),
(105, 'Bertolotti', 8),
(106, 'Bellini', 8),
(107, 'Bruni', 8),
(108, 'Bugatti', 8),
(109, 'Cantara', 8),
(110, 'Calvo', 8),
(111, 'Conti', 8),
(112, 'Ferrari', 8),
(113, 'Ferricelli', 8),
(114, 'Gallino', 8),
(115, 'Giaccomo', 8),
(116, 'Gigliotti', 8),
(117, 'Panetta', 8),
(118, 'Greco', 8),
(119, 'Martini', 8),
(120, 'Orlandi', 8);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `validated`, `created`, `lastconnect`, `email`, `presentation`, `birthdate`, `gender`, `ip`, `avatar`, `inactive`, `waiting`, `group`) VALUES
(115, 'daniel', '17c9ff8a453e01c38a952ee3e73189468d298b2a', 0, '2011-12-11 08:52:51', '2011-12-11 08:52:00', 'dan.gillet@email.com', '', '2011-12-11', 0, '', '', 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
