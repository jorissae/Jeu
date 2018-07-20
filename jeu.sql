-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 20 Juillet 2018 à 20:44
-- Version du serveur :  10.0.34-MariaDB-0ubuntu0.16.04.1
-- Version de PHP :  7.1.16-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jeu`
--

-- --------------------------------------------------------

--
-- Structure de la table `app_users`
--

CREATE TABLE `app_users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tree_lvl` int(10) UNSIGNED NOT NULL,
  `tree_left` int(10) UNSIGNED NOT NULL,
  `tree_right` int(10) UNSIGNED NOT NULL,
  `tree_root` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `resume` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`, `tree_lvl`, `tree_left`, `tree_right`, `tree_root`, `parent_id`, `resume`) VALUES
(1, 'Famille', 0, 0, 13, 1, NULL, 'A'),
(2, 'Jeune', 1, 1, 6, 1, 1, 'B'),
(3, '5-10 ans', 2, 2, 3, 1, 2, NULL),
(4, '11 20 ans', 2, 4, 5, 1, 2, NULL),
(5, 'Vieux', 1, 7, 12, 1, 1, NULL),
(6, '+20', 2, 8, 9, 1, 5, NULL),
(7, '+40', 2, 10, 11, 1, 5, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_message_tranche` tinyint(1) DEFAULT NULL,
  `test` datetime DEFAULT NULL,
  `test2` time DEFAULT NULL,
  `test3` date DEFAULT NULL,
  `test4` int(11) DEFAULT NULL,
  `var_price_base` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choice_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `base_visuel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_name_elm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_name_elm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `css_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `base` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `duration`
--

CREATE TABLE `duration` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `duration`
--

INSERT INTO `duration` (`id`, `name`) VALUES
(1, 60);

-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--

CREATE TABLE `editeur` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `editeur`
--

INSERT INTO `editeur` (`id`, `name`) VALUES
(1, 'Asmodee'),
(2, 'babar');

-- --------------------------------------------------------

--
-- Structure de la table `editor`
--

CREATE TABLE `editor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `editor`
--

INSERT INTO `editor` (`id`, `name`, `logo`) VALUES
(1, 'Asmodee', 'e14840dfb1c997b664057291df9dbf9c.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `circonstance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visuel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vignette` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variable` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double DEFAULT NULL,
  `prix2` double DEFAULT NULL,
  `sub_libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aide` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jeu`
--

CREATE TABLE `jeu` (
  `id` int(11) NOT NULL,
  `editeur_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbPlayer` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `pictur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `jeu`
--

INSERT INTO `jeu` (`id`, `editeur_id`, `name`, `nbPlayer`, `age`, `pictur`, `description`, `note`) VALUES
(1, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(2, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(3, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(4, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(5, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(6, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(7, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(8, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(9, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(10, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(11, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(12, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(13, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(14, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(15, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(16, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(17, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(18, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(19, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(20, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(21, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(22, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(23, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(24, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(25, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(26, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(27, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(28, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(29, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(30, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(31, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(32, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(33, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(34, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(35, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(36, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(37, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(38, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(39, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(40, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(41, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(42, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(43, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(44, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(45, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(46, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(47, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(48, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(49, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(50, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(51, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(52, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(53, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(54, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(55, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(56, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(57, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(58, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(59, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(60, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(61, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(62, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(63, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(64, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(65, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(66, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(67, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(68, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(69, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(70, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(71, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(72, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(73, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(74, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(75, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(76, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(77, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(78, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(79, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(80, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(81, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(82, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(83, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(84, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(85, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(86, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(87, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(88, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(89, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(90, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(91, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(92, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(93, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(94, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(95, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(96, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(97, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(98, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(99, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(100, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(101, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(102, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(103, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(104, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(105, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(106, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(107, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(108, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(109, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(110, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(111, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(112, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(113, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(114, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(115, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(116, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(117, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(118, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(119, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(120, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(121, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(122, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(123, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(124, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(125, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(126, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(127, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(128, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(129, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(130, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(131, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(132, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(133, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(134, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(135, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(136, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(137, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(138, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(139, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(140, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(141, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(142, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(143, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(144, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(145, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(146, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(147, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(148, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(149, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(150, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(151, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(152, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(153, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(154, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(155, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(156, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(157, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(158, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(159, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(160, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(161, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(162, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(163, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(164, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(165, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(166, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(167, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(168, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(169, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(170, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(171, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(172, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(173, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(174, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(175, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(176, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(177, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(178, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(179, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(180, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(181, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(182, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(183, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(184, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(185, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(186, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(187, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(188, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(189, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(190, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(191, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(192, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(193, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(194, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(195, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(196, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(197, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(198, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(199, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(200, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(201, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(202, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(203, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(204, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(205, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(206, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(207, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(208, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(209, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(210, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(211, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(212, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(213, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(214, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(215, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(216, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(217, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(218, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(219, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(220, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(221, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(222, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(223, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(224, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(225, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(226, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(227, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(228, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(229, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(230, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(231, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(232, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(233, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(234, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(235, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(236, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(237, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(238, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(239, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(240, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(241, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(242, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(243, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(244, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(245, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(246, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(247, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(248, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(249, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(250, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(251, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(252, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(253, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(254, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(255, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(256, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(257, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(258, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(259, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(260, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(261, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(262, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(263, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(264, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(265, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(266, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(267, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(268, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(269, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(270, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(271, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(272, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(273, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(274, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(275, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(276, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(277, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(278, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(279, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(280, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(281, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(282, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(283, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(284, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(285, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(286, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(287, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(288, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(289, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(290, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(291, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(292, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(293, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(294, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(295, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(296, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(297, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(298, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(299, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(300, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(301, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(302, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(303, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(304, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(305, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(306, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(307, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(308, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(309, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(310, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(311, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(312, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(313, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(314, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(315, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(316, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(317, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(318, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(319, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(320, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(321, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(322, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(323, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(324, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(325, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(326, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(327, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(328, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(329, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(330, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(331, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(332, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(333, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(334, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(335, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(336, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(337, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(338, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(339, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(340, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(341, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(342, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(343, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(344, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(345, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(346, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(347, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(348, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(349, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(350, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(351, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(352, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(353, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(354, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(355, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(356, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(357, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(358, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(359, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(360, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(361, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(362, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(363, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(364, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(365, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(366, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(367, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(368, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(369, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(370, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(371, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(372, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(373, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(374, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(375, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(376, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(377, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(378, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(379, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(380, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(381, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(382, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(383, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(384, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(385, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(386, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(387, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(388, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(389, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(390, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(391, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(392, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(393, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(394, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(395, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(396, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(397, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(398, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(399, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(400, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(401, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(402, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(403, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(404, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(405, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(406, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(407, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(408, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(409, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(410, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(411, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(412, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(413, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(414, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(415, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(416, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(417, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(418, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(419, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(420, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(421, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(422, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(423, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(424, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(425, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(426, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(427, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(428, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(429, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(430, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(431, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(432, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(433, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(434, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(435, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(436, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(437, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(438, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(439, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(440, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(441, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(442, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(443, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(444, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(445, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(446, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(447, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(448, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(449, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(450, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(451, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(452, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(453, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(454, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(455, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(456, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(457, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(458, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(459, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(460, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(461, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(462, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(463, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(464, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(465, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(466, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(467, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(468, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(469, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(470, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(471, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(472, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(473, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(474, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(475, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(476, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(477, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(478, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(479, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(480, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(481, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(482, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(483, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(484, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(485, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(486, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(487, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(488, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(489, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(490, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(491, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(492, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(493, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(494, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(495, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(496, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(497, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(498, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(499, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(500, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(501, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(502, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(503, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(504, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(505, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(506, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(507, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(508, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(509, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(510, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(511, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(512, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(513, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(514, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(515, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(516, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(517, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(518, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(519, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(520, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(521, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(522, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(523, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(524, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(525, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(526, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(527, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(528, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(529, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(530, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(531, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(532, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(533, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(534, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(535, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(536, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(537, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(538, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(539, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(540, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(541, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0),
(542, 1, 'The jeu', 5, 22, '', 'Un super jeu', 0);

-- --------------------------------------------------------

--
-- Structure de la table `jeu2`
--

CREATE TABLE `jeu2` (
  `id` int(11) NOT NULL,
  `editeur_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbPlayer` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `star` tinyint(1) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `join_play_author`
--

CREATE TABLE `join_play_author` (
  `id` int(11) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `play_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `join_play_duration`
--

CREATE TABLE `join_play_duration` (
  `id` int(11) NOT NULL,
  `duration_id` int(11) DEFAULT NULL,
  `play_id` int(11) DEFAULT NULL,
  `nb_player` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `join_play_duration`
--

INSERT INTO `join_play_duration` (`id`, `duration_id`, `play_id`, `nb_player`) VALUES
(1, 1, 1, 5),
(12, 1, 1, 1),
(14, 1, NULL, 15),
(15, 1, NULL, 123),
(16, 1, NULL, 5),
(17, 1, 1, 36);

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `play_category`
--

CREATE TABLE `play_category` (
  `play_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id` int(11) NOT NULL,
  `data` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nb_volet` int(11) NOT NULL,
  `nb_volet_qte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `step`
--

CREATE TABLE `step` (
  `id` int(11) NOT NULL,
  `configurateur_id` int(11) DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label_header` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label_recap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label_next` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reset` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hidden_recap` tinyint(1) DEFAULT NULL,
  `final` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enable` tinyint(1) DEFAULT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:array)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `user`
--
-- --------------------------------------------------------

--
-- Structure de la table `variable`
--

CREATE TABLE `variable` (
  `id` int(11) NOT NULL,
  `step_id` int(11) DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choice` int(11) DEFAULT NULL,
  `base` tinyint(1) DEFAULT NULL,
  `intro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_intro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_validate` tinyint(1) DEFAULT NULL,
  `hidden_recap` tinyint(1) DEFAULT NULL,
  `widget` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aide_html` longtext COLLATE utf8mb4_unicode_ci,
  `html` longtext COLLATE utf8mb4_unicode_ci,
  `css_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_option` tinyint(1) DEFAULT NULL,
  `option_intro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vars` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `app_users`
--
ALTER TABLE `app_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_C2502824F85E0677` (`username`);

--
-- Index pour la table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_64C19C1A977936C` (`tree_root`),
  ADD KEY `IDX_64C19C1727ACA70` (`parent_id`);

--
-- Index pour la table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `duration`
--
ALTER TABLE `duration`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `editeur`
--
ALTER TABLE `editeur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `editor`
--
ALTER TABLE `editor`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jeu`
--
ALTER TABLE `jeu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_82E48DB53375BD21` (`editeur_id`);

--
-- Index pour la table `jeu2`
--
ALTER TABLE `jeu2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A15C1D833375BD21` (`editeur_id`);

--
-- Index pour la table `join_play_author`
--
ALTER TABLE `join_play_author`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BB80D01EF675F31B` (`author_id`),
  ADD KEY `IDX_BB80D01E25576DBD` (`play_id`);

--
-- Index pour la table `join_play_duration`
--
ALTER TABLE `join_play_duration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5FE66C4437B987D8` (`duration_id`),
  ADD KEY `IDX_5FE66C4425576DBD` (`play_id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `play_category`
--
ALTER TABLE `play_category`
  ADD PRIMARY KEY (`play_id`,`category_id`),
  ADD KEY `IDX_CD5BB42A25576DBD` (`play_id`),
  ADD KEY `IDX_CD5BB42A12469DE2` (`category_id`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `step`
--
ALTER TABLE `step`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_43B9FE3C34AE8AA7` (`configurateur_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `variable`
--
ALTER TABLE `variable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CC4D878D73B21E9C` (`step_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `app_users`
--
ALTER TABLE `app_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `duration`
--
ALTER TABLE `duration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `editeur`
--
ALTER TABLE `editeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `editor`
--
ALTER TABLE `editor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `jeu`
--
ALTER TABLE `jeu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=543;
--
-- AUTO_INCREMENT pour la table `jeu2`
--
ALTER TABLE `jeu2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `join_play_author`
--
ALTER TABLE `join_play_author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `join_play_duration`
--
ALTER TABLE `join_play_duration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `step`
--
ALTER TABLE `step`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `variable`
--
ALTER TABLE `variable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `FK_64C19C1727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_64C19C1A977936C` FOREIGN KEY (`tree_root`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `jeu`
--
ALTER TABLE `jeu`
  ADD CONSTRAINT `FK_82E48DB53375BD21` FOREIGN KEY (`editeur_id`) REFERENCES `editor` (`id`);

--
-- Contraintes pour la table `jeu2`
--
ALTER TABLE `jeu2`
  ADD CONSTRAINT `FK_A15C1D833375BD21` FOREIGN KEY (`editeur_id`) REFERENCES `editor` (`id`);

--
-- Contraintes pour la table `join_play_author`
--
ALTER TABLE `join_play_author`
  ADD CONSTRAINT `FK_BB80D01E25576DBD` FOREIGN KEY (`play_id`) REFERENCES `jeu` (`id`),
  ADD CONSTRAINT `FK_BB80D01EF675F31B` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`);

--
-- Contraintes pour la table `join_play_duration`
--
ALTER TABLE `join_play_duration`
  ADD CONSTRAINT `FK_5FE66C4425576DBD` FOREIGN KEY (`play_id`) REFERENCES `jeu` (`id`),
  ADD CONSTRAINT `FK_5FE66C4437B987D8` FOREIGN KEY (`duration_id`) REFERENCES `duration` (`id`);

--
-- Contraintes pour la table `play_category`
--
ALTER TABLE `play_category`
  ADD CONSTRAINT `FK_CD5BB42A12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_CD5BB42A25576DBD` FOREIGN KEY (`play_id`) REFERENCES `jeu` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `step`
--
ALTER TABLE `step`
  ADD CONSTRAINT `FK_43B9FE3C34AE8AA7` FOREIGN KEY (`configurateur_id`) REFERENCES `config` (`id`);

--
-- Contraintes pour la table `variable`
--
ALTER TABLE `variable`
  ADD CONSTRAINT `FK_CC4D878D73B21E9C` FOREIGN KEY (`step_id`) REFERENCES `step` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
