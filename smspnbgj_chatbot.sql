-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mer. 17 avr. 2019 à 11:39
-- Version du serveur :  10.2.23-MariaDB
-- Version de PHP :  7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `smspnbgj_chatbot`
--

-- --------------------------------------------------------

--
-- Structure de la table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `question` int(11) NOT NULL,
  `optionValue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nextQuestion` int(11) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `answer`
--

INSERT INTO `answer` (`id`, `question`, `optionValue`, `nextQuestion`, `createdAt`) VALUES
(1, 5, 'Moins de 5ans', 6, '2018-11-14 19:10:27'),
(2, 5, 'Entre 5 et 10 ans', 6, '2018-11-14 19:10:49'),
(3, 5, 'Plus de 10 ans', 6, '2018-11-14 19:13:14'),
(4, 5, 'Tellement vieux que je sais plus', 6, '2018-11-14 19:13:27'),
(8, 4, 'OUI', 5, '2018-11-25 10:15:56'),
(9, 4, 'NON', 5, '2018-11-25 10:17:09'),
(10, 7, 'Homme', 3, '2018-11-27 08:39:01'),
(12, 7, 'Femme', 3, '2018-11-27 08:41:43'),
(13, 8, 'Homme', 4, '2018-11-27 23:37:50'),
(14, 8, 'Femme', 10, '2018-11-27 23:37:56'),
(15, 8, 'Ne pas dire', 30, '2018-11-28 07:16:39'),
(16, 10, 'Homme', 30, '2018-11-28 07:20:15'),
(17, 10, 'Femme', 40, '2018-11-28 07:20:52'),
(18, 11, 'OUI', 50, '2018-11-28 07:22:13'),
(19, 11, 'NON', 50, '2018-11-28 07:22:40'),
(20, 17, 'Homme', 40, '2018-12-09 21:32:13'),
(21, 17, 'Femme', 40, '2018-12-09 21:32:19'),
(22, 21, 'Homme', 50, '2018-12-11 20:21:05'),
(23, 21, 'Femme', 40, '2018-12-11 20:21:10'),
(24, 22, 'OUI', 50, '2018-12-11 20:24:13'),
(25, 22, 'NON', 50, '2018-12-11 20:24:17'),
(26, 23, 'OUI', 60, '2018-12-11 20:30:17'),
(27, 23, 'NON', 60, '2018-12-11 20:30:22'),
(28, 25, '18-25', 30, '2019-03-28 11:57:33'),
(29, 25, '26-35', 30, '2019-03-28 11:57:55'),
(30, 25, '36-45', 30, '2019-03-28 11:58:11'),
(31, 25, 'plus de 45', 30, '2019-03-28 11:58:33'),
(32, 26, 'homme', 40, '2019-03-28 11:59:55'),
(33, 26, 'femme', 40, '2019-03-28 12:00:27'),
(34, 29, '18-25', 40, '2019-03-28 12:19:16'),
(35, 29, '26-35', 40, '2019-03-28 12:19:23'),
(36, 29, '36-45', 40, '2019-03-28 12:19:29'),
(37, 29, 'plus de 45', 40, '2019-03-28 12:19:36'),
(38, 30, 'homme', 50, '2019-03-28 12:20:18'),
(39, 30, 'femme', 50, '2019-03-28 12:20:23'),
(40, 31, 'fonctionnaires', 60, '2019-03-28 12:21:25'),
(41, 31, 'professeurs', 60, '2019-03-28 12:21:47'),
(42, 31, 'ouvriers', 60, '2019-03-28 12:22:02'),
(43, 31, 'chefs d\'entreprise', 60, '2019-03-28 12:22:22'),
(44, 31, 'étudiants', 60, '2019-03-28 12:22:37'),
(45, 32, 'oui', 70, '2019-03-28 12:23:52'),
(46, 32, 'non', 80, '2019-03-28 12:23:59'),
(47, 33, '1 ans', 80, '2019-03-28 12:25:29'),
(48, 33, '2 ans', 80, '2019-03-28 12:25:43'),
(49, 33, '3 ans', 80, '2019-03-28 12:25:53'),
(50, 33, 'plus de 3 ans', 80, '2019-03-28 12:26:05'),
(51, 34, 'oui', 90, '2019-03-28 12:29:09'),
(52, 34, 'non', 100, '2019-03-28 12:29:16'),
(53, 35, 'la banque populaire', 100, '2019-03-28 12:30:19'),
(54, 35, 'attijariwafa Bank', 100, '2019-03-28 12:30:57'),
(55, 35, 'BMCE', 100, '2019-03-28 12:31:12'),
(56, 35, 'la SGMB', 100, '2019-03-28 12:31:27'),
(57, 37, 'priorité1', 120, '2019-03-28 12:49:48'),
(58, 42, 'les services rendus par la BMCI sont bons pour le prix qu\'ils coûtent', 170, '2019-03-28 13:05:04'),
(59, 42, 'la BMCI dispose d\'une gamme de placements et de produits d\'épargne particulièrement intéressante.', 170, '2019-03-28 13:05:47'),
(60, 42, 'En matière d\'assurances, la BMCI est tout à fait à la hauteur des autres compagnies d\'assurances.', 170, '2019-03-28 13:06:07'),
(61, 42, 'Les produits et les services du BMCI sont généralement d\'un bon rapport qualité/PRIX. Si je dois emprunter pour acheter (un logement, véhicule,...) la BMCI me proposera un Crédit à un taux avantageux.', 170, '2019-03-28 13:06:48'),
(62, 44, 'oui', 180, '2019-03-28 13:07:47'),
(63, 44, 'non', 180, '2019-03-28 13:07:55'),
(64, 45, 'oui', 190, '2019-03-28 13:09:19'),
(65, 45, 'non', 190, '2019-03-28 13:09:22'),
(66, 46, 'oui', 200, '2019-03-28 13:11:10'),
(67, 46, 'non', 200, '2019-03-28 13:11:13'),
(68, 47, 'j\'accepte', 210, '2019-03-28 13:13:12'),
(69, 47, 'je refuse', 210, '2019-03-28 13:13:20'),
(70, 36, 'priorité1', 110, '2019-03-28 16:13:48'),
(71, 36, 'priorité2', 110, '2019-03-28 16:13:59'),
(72, 36, 'priorité3', 110, '2019-03-28 16:14:10'),
(73, 36, 'priorité4', 110, '2019-03-28 16:14:27'),
(74, 36, 'priorité5', 110, '2019-03-28 16:14:46'),
(75, 36, 'priorité6', 110, '2019-03-28 16:14:56'),
(76, 36, 'priorité7', 110, '2019-03-28 16:15:13'),
(77, 36, 'priorité8', 110, '2019-03-28 16:15:25'),
(78, 36, 'priorité9', 110, '2019-03-28 16:15:34'),
(79, 37, 'priorité2', 120, '2019-03-28 16:17:53'),
(80, 37, 'priorité3', 120, '2019-03-28 16:17:59'),
(81, 37, 'priorité4', 120, '2019-03-28 16:18:20'),
(82, 37, 'priorité5', 120, '2019-03-28 16:18:42'),
(83, 37, 'priorité6', 120, '2019-03-28 16:18:53'),
(84, 37, 'priorité7', 120, '2019-03-28 16:19:08'),
(85, 37, 'priorité8', 120, '2019-03-28 16:19:20'),
(86, 37, 'priorité9', 120, '2019-03-28 16:19:40'),
(87, 38, 'priorité1', 130, '2019-03-28 16:21:09'),
(88, 38, 'priorité2', 130, '2019-03-28 16:21:15'),
(89, 38, 'priorité3', 130, '2019-03-28 16:21:21'),
(90, 38, 'priorité4', 130, '2019-03-28 16:21:28'),
(91, 38, 'priorité5', 130, '2019-03-28 16:21:35'),
(92, 38, 'priorité6', 130, '2019-03-28 16:21:42'),
(93, 38, 'priorité7', 130, '2019-03-28 16:21:59'),
(94, 38, 'priorité8', 130, '2019-03-28 16:22:13'),
(95, 38, 'priorité9', 130, '2019-03-28 16:22:23'),
(96, 39, 'priorité1', 140, '2019-03-28 16:23:35'),
(97, 39, 'priorité2', 140, '2019-03-28 16:23:38'),
(98, 39, 'priorité3', 140, '2019-03-28 16:23:41'),
(99, 39, 'priorité4', 140, '2019-03-28 16:23:45'),
(100, 39, 'priorité5', 140, '2019-03-28 16:23:51'),
(101, 39, 'priorité6', 140, '2019-03-28 16:23:57'),
(102, 39, 'priorit7', 140, '2019-03-28 16:24:13'),
(103, 39, 'priorité8', 140, '2019-03-28 16:24:22'),
(104, 39, 'priorité9', 140, '2019-03-28 16:24:35'),
(105, 40, 'priorité1', 150, '2019-03-28 16:26:01'),
(106, 40, 'priorité2', 150, '2019-03-28 16:26:05'),
(107, 40, 'priorité3', 150, '2019-03-28 16:26:09'),
(108, 40, 'priorité4', 150, '2019-03-28 16:26:12'),
(109, 40, 'priorité5', 150, '2019-03-28 16:26:21'),
(110, 40, 'priorité6', 150, '2019-03-28 16:26:27'),
(111, 40, 'priorité7', 150, '2019-03-28 16:26:37'),
(112, 40, 'priorité8', 150, '2019-03-28 16:26:46'),
(113, 40, 'priorité9', 150, '2019-03-28 16:26:55');

-- --------------------------------------------------------

--
-- Structure de la table `chat_bot`
--

CREATE TABLE `chat_bot` (
  `id` int(11) NOT NULL,
  `botName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `starterMsg` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `closingMsg` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `owner` int(11) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `bot_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `chat_bot`
--

INSERT INTO `chat_bot` (`id`, `botName`, `starterMsg`, `closingMsg`, `createdAt`, `email`, `owner`, `description`, `bot_link`) VALUES
(1, 'Jemmy Carry', 'Bienvenue, Je suis Jemmy le bot de AET. Ensemble nous allons répondre a une série questions concernant l\'avenir de notre chère AET', 'Merci pour votre attention. L\'AET tiendra compte de vos remarques. A bientot .', '2018-11-11 10:34:18', 'denis.kombate@gmail.com', 1, '', ''),
(2, 'Enquete AEET 2018', 'Bienvenue, je suis Armel votre bot pour vous aider dans le choix de votre police d\'assurance auto.', 'Merci! Vos informations ont été enregistrées. Vous recevrez votre contrat pour signature dans un délai de 24h.', '2018-11-11 10:44:19', 'denis.kombate@gmail.com', 1, 'Chat bot de souscription a la police d\'assurance auto', '5bfcefcf8ee65U'),
(3, 'AEET Enquete', 'Bienvenue a AEET', 'Merci de votre particiaption', '2018-11-27 08:18:39', 'denis.kombate@gmail.com', 1, 'aeet enquete', '5bfcefcf8ee65'),
(4, 'AEET Enquete 2018', 'salut', 'bye', '2018-12-09 21:25:38', 'denis.kombate@gmail.com', 1, 'description ici', '5c0d7a42764b2'),
(5, 'AEET Enquete 2018 - 5', 'salut', 'bye', '2018-12-09 21:28:33', 'denis.kombate@gmail.com', 1, 'description ici', '5c0d7af15d172'),
(6, 'TEST PERSONALITE', 'Bonjour je suis Amry. Le bot qui va t\'aider a decouvrir ta personnalité', 'Merci de ta disponibilité j\'espère que tu aimes ta personalité que nous t\'avons fait découvrir.  CIAO', '2018-12-11 20:16:59', 'denis.kombate@gmail.com', 3, 'Bot de test de la personalité', '5c100d2bb3d30'),
(7, 'test1', 'test1', 'test1', '2019-03-28 11:50:14', 'test@test.com', 4, 'test1', '5c9ca6e6b065d'),
(8, 'Questionnaire administré aux clients de la BMCI', 'Notre objectif à travers cette étude est d\'expliquer l\'importance de la satisfaction dans la fidélisation des clients bancaires. Puis analyser la contribution de la satisfaction par les produits ou par les services dans le degré de fidélité des clients de la BMCI. et en fin étudier les critères de choix les plus importants pour la clientèle de BMCI.', 'Merci', '2019-03-28 12:12:56', 'apegnowoudiane8@gmail.com', 4, 'enquête 2017', '5c9cac3826fe0');

-- --------------------------------------------------------

--
-- Structure de la table `choice`
--

CREATE TABLE `choice` (
  `id` int(11) NOT NULL,
  `question` int(11) NOT NULL,
  `choiceValue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `people` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `choice`
--

INSERT INTO `choice` (`id`, `question`, `choiceValue`, `createdAt`, `people`) VALUES
(1, 4, 'OUI', '2018-11-13 09:42:33', NULL),
(2, 4, 'NON', '2018-11-13 09:42:33', NULL),
(3, 15, 'KOKOU', '2018-12-10 11:13:47', NULL),
(4, 16, 'JOPP', '2018-12-10 11:13:48', NULL),
(5, 17, '21', '2018-12-10 11:13:48', NULL),
(6, 18, 'sdfs', '2018-12-10 11:13:48', NULL),
(7, 15, 'KOKOU', '2018-12-10 11:13:48', NULL),
(8, 16, 'JOPP', '2018-12-10 11:13:48', NULL),
(9, 17, '21', '2018-12-10 11:13:48', NULL),
(10, 18, 'sdfs', '2018-12-10 11:13:48', NULL),
(11, 15, 'KOKOU', '2018-12-10 11:13:49', NULL),
(12, 16, 'JOPP', '2018-12-10 11:13:49', NULL),
(13, 17, '21', '2018-12-10 11:13:49', NULL),
(14, 18, 'sdfs', '2018-12-10 11:13:49', NULL),
(15, 15, 'KOKOU', '2018-12-10 11:14:36', NULL),
(16, 16, 'JOPP', '2018-12-10 11:14:36', NULL),
(17, 17, '21', '2018-12-10 11:14:36', NULL),
(18, 18, 'sdfs', '2018-12-10 11:14:36', NULL),
(19, 15, 'KOKOU', '2018-12-10 11:14:37', NULL),
(20, 16, 'JOPP', '2018-12-10 11:14:37', NULL),
(21, 17, '21', '2018-12-10 11:14:37', NULL),
(22, 18, 'sdfs', '2018-12-10 11:14:37', NULL),
(23, 15, 'KOKOU', '2018-12-10 12:08:09', '5c0e491955851'),
(24, 16, 'JOPP', '2018-12-10 12:08:09', '5c0e491955851'),
(25, 17, '21', '2018-12-10 12:08:09', '5c0e491955851'),
(26, 18, 'sdfs', '2018-12-10 12:08:09', '5c0e491955851'),
(27, 15, 'KOKOU', '2018-12-10 12:08:10', '5c0e491a5500b'),
(28, 16, 'JOPP', '2018-12-10 12:08:10', '5c0e491a5500b'),
(29, 17, '21', '2018-12-10 12:08:10', '5c0e491a5500b'),
(30, 18, 'sdfs', '2018-12-10 12:08:10', '5c0e491a5500b'),
(31, 15, 'KOKOU', '2018-12-10 12:08:13', '5c0e491d2b8b0'),
(32, 16, 'JOPP', '2018-12-10 12:08:13', '5c0e491d2b8b0'),
(33, 17, '21', '2018-12-10 12:08:13', '5c0e491d2b8b0'),
(34, 18, 'sdfs', '2018-12-10 12:08:13', '5c0e491d2b8b0'),
(35, 15, 'KOKOU', '2018-12-10 12:08:14', '5c0e491e5dcf9'),
(36, 16, 'JOPP', '2018-12-10 12:08:14', '5c0e491e5dcf9'),
(37, 17, '21', '2018-12-10 12:08:14', '5c0e491e5dcf9'),
(38, 18, 'sdfs', '2018-12-10 12:08:14', '5c0e491e5dcf9'),
(39, 15, 'KOKOU', '2018-12-10 12:08:17', '5c0e49213925c'),
(40, 16, 'JOPP', '2018-12-10 12:08:17', '5c0e49213925c'),
(41, 17, '21', '2018-12-10 12:08:17', '5c0e49213925c'),
(42, 18, 'sdfs', '2018-12-10 12:08:17', '5c0e49213925c'),
(43, 15, 'KOKOU', '2018-12-10 12:08:18', '5c0e492254e46'),
(44, 16, 'JOPP', '2018-12-10 12:08:18', '5c0e492254e46'),
(45, 17, '21', '2018-12-10 12:08:18', '5c0e492254e46'),
(46, 18, 'sdfs', '2018-12-10 12:08:18', '5c0e492254e46'),
(47, 15, 'KOKOU', '2018-12-10 12:10:24', '5c0e49a0085de'),
(48, 16, 'JOPP', '2018-12-10 12:10:24', '5c0e49a0085de'),
(49, 17, '21', '2018-12-10 12:10:24', '5c0e49a0085de'),
(50, 18, 'sdfs', '2018-12-10 12:10:24', '5c0e49a0085de'),
(51, 15, 'KOKOU', '2018-12-10 12:10:25', '5c0e49a11dc5f'),
(52, 16, 'JOPP', '2018-12-10 12:10:25', '5c0e49a11dc5f'),
(53, 17, '21', '2018-12-10 12:10:25', '5c0e49a11dc5f'),
(54, 18, 'sdfs', '2018-12-10 12:10:25', '5c0e49a11dc5f'),
(55, 15, '', '2018-12-10 12:11:54', '5c0e49fae5601'),
(56, 16, 'JOPP', '2018-12-10 12:11:55', '5c0e49fae5601'),
(57, 17, '21', '2018-12-10 12:11:55', '5c0e49fae5601'),
(58, 18, '', '2018-12-10 12:11:55', '5c0e49fae5601'),
(59, 15, '', '2018-12-10 12:11:55', '5c0e49fbdfe6a'),
(60, 16, 'JOPP', '2018-12-10 12:11:56', '5c0e49fbdfe6a'),
(61, 17, '21', '2018-12-10 12:11:56', '5c0e49fbdfe6a'),
(62, 18, '', '2018-12-10 12:11:56', '5c0e49fbdfe6a'),
(63, 15, '', '2018-12-11 11:56:59', '5c0f97fb23e88'),
(64, 16, 'JOPP', '2018-12-11 11:56:59', '5c0f97fb23e88'),
(65, 17, '22', '2018-12-11 11:56:59', '5c0f97fb23e88'),
(66, 18, '', '2018-12-11 11:56:59', '5c0f97fb23e88'),
(67, 15, '', '2018-12-11 11:57:00', '5c0f97fc395db'),
(68, 16, 'JOPP', '2018-12-11 11:57:00', '5c0f97fc395db'),
(69, 17, '22', '2018-12-11 11:57:00', '5c0f97fc395db'),
(70, 18, '', '2018-12-11 11:57:00', '5c0f97fc395db'),
(71, 15, '', '2018-12-11 12:07:03', '5c0f9a5701c5a'),
(72, 16, 'JOPP', '2018-12-11 12:07:03', '5c0f9a5701c5a'),
(73, 17, '22', '2018-12-11 12:07:03', '5c0f9a5701c5a'),
(74, 18, '', '2018-12-11 12:07:03', '5c0f9a5701c5a'),
(75, 15, '', '2018-12-11 12:07:03', '5c0f9a57f29b8'),
(76, 16, 'JOPP', '2018-12-11 12:07:03', '5c0f9a57f29b8'),
(77, 17, '22', '2018-12-11 12:07:03', '5c0f9a57f29b8'),
(78, 18, '', '2018-12-11 12:07:03', '5c0f9a57f29b8'),
(79, 15, '', '2018-12-11 12:07:47', '5c0f9a83cd23a'),
(80, 16, 'JOPP', '2018-12-11 12:07:47', '5c0f9a83cd23a'),
(81, 17, '22', '2018-12-11 12:07:47', '5c0f9a83cd23a'),
(82, 18, '', '2018-12-11 12:07:47', '5c0f9a83cd23a'),
(83, 15, '', '2018-12-11 12:07:48', '5c0f9a84df2b8'),
(84, 16, 'JOPP', '2018-12-11 12:07:48', '5c0f9a84df2b8'),
(85, 17, '22', '2018-12-11 12:07:48', '5c0f9a84df2b8'),
(86, 18, '', '2018-12-11 12:07:48', '5c0f9a84df2b8'),
(87, 15, '', '2018-12-11 12:08:08', '5c0f9a98a6e07'),
(88, 16, 'JOPP', '2018-12-11 12:08:08', '5c0f9a98a6e07'),
(89, 17, '22', '2018-12-11 12:08:08', '5c0f9a98a6e07'),
(90, 18, '', '2018-12-11 12:08:08', '5c0f9a98a6e07'),
(91, 15, '', '2018-12-11 12:08:09', '5c0f9a99c1087'),
(92, 16, 'JOPP', '2018-12-11 12:08:09', '5c0f9a99c1087'),
(93, 17, '22', '2018-12-11 12:08:09', '5c0f9a99c1087'),
(94, 18, '', '2018-12-11 12:08:09', '5c0f9a99c1087'),
(95, 15, '', '2018-12-11 12:08:57', '5c0f9ac913835'),
(96, 16, 'JOPP', '2018-12-11 12:08:57', '5c0f9ac913835'),
(97, 17, 'Homme', '2018-12-11 12:08:57', '5c0f9ac913835'),
(98, 18, '', '2018-12-11 12:08:57', '5c0f9ac913835'),
(99, 15, '', '2018-12-11 12:08:58', '5c0f9aca1e10e'),
(100, 16, 'JOPP', '2018-12-11 12:08:58', '5c0f9aca1e10e'),
(101, 17, 'Homme', '2018-12-11 12:08:58', '5c0f9aca1e10e'),
(102, 18, '', '2018-12-11 12:08:58', '5c0f9aca1e10e'),
(103, 15, '', '2018-12-11 12:18:39', '5c0f9d0fa10c3'),
(104, 16, 'JOPP', '2018-12-11 12:18:39', '5c0f9d0fa10c3'),
(105, 17, 'Homme', '2018-12-11 12:18:39', '5c0f9d0fa10c3'),
(106, 18, '', '2018-12-11 12:18:39', '5c0f9d0fa10c3'),
(107, 15, '', '2018-12-11 12:18:40', '5c0f9d10908c3'),
(108, 16, 'JOPP', '2018-12-11 12:18:40', '5c0f9d10908c3'),
(109, 17, 'Homme', '2018-12-11 12:18:40', '5c0f9d10908c3'),
(110, 18, '', '2018-12-11 12:18:40', '5c0f9d10908c3'),
(111, 15, '', '2018-12-11 12:20:48', '5c0f9d90ea59e'),
(112, 16, 'AGOKOLI Chimene', '2018-12-11 12:20:48', '5c0f9d90ea59e'),
(113, 17, 'Femme', '2018-12-11 12:20:48', '5c0f9d90ea59e'),
(114, 18, '', '2018-12-11 12:20:48', '5c0f9d90ea59e'),
(115, 15, '', '2018-12-11 12:20:49', '5c0f9d915d21c'),
(116, 16, 'AGOKOLI Chimene', '2018-12-11 12:20:49', '5c0f9d915d21c'),
(117, 17, 'Femme', '2018-12-11 12:20:49', '5c0f9d915d21c'),
(118, 18, '', '2018-12-11 12:20:49', '5c0f9d915d21c'),
(119, 15, '', '2018-12-11 12:20:50', '5c0f9d926c1bd'),
(120, 16, 'AGOKOLI Chimene', '2018-12-11 12:20:50', '5c0f9d926c1bd'),
(121, 17, 'Femme', '2018-12-11 12:20:50', '5c0f9d926c1bd'),
(122, 18, '', '2018-12-11 12:20:50', '5c0f9d926c1bd'),
(123, 15, '', '2018-12-11 14:41:15', '5c0fbe7b59062'),
(124, 16, 'AGOKOLI Chimene', '2018-12-11 14:41:15', '5c0fbe7b59062'),
(125, 17, 'Femme', '2018-12-11 14:41:15', '5c0fbe7b59062'),
(126, 18, '', '2018-12-11 14:41:15', '5c0fbe7b59062'),
(127, 15, '', '2018-12-11 14:41:16', '5c0fbe7c3cd2f'),
(128, 16, 'AGOKOLI Chimene', '2018-12-11 14:41:16', '5c0fbe7c3cd2f'),
(129, 17, 'Femme', '2018-12-11 14:41:16', '5c0fbe7c3cd2f'),
(130, 18, '', '2018-12-11 14:41:16', '5c0fbe7c3cd2f'),
(131, 15, '', '2018-12-11 14:49:32', '5c0fc06c7fc84'),
(132, 16, 'AGOKOLI Chimene', '2018-12-11 14:49:32', '5c0fc06c7fc84'),
(133, 17, 'Femme', '2018-12-11 14:49:32', '5c0fc06c7fc84'),
(134, 18, '', '2018-12-11 14:49:32', '5c0fc06c7fc84'),
(135, 15, 'KOKOU', '2018-12-11 14:50:45', '5c0fc0b500dce'),
(136, 16, '2018', '2018-12-11 14:50:45', '5c0fc0b500dce'),
(137, 17, 'Femme', '2018-12-11 14:50:45', '5c0fc0b500dce'),
(138, 18, 'LOGOPE', '2018-12-11 14:50:45', '5c0fc0b500dce'),
(139, 19, 'simon dodji', '2018-12-11 21:15:52', '5c101af8bfa97'),
(140, 20, '34', '2018-12-11 21:15:52', '5c101af8bfa97'),
(141, 21, 'Femme', '2018-12-11 21:15:52', '5c101af8bfa97'),
(142, 22, 'NON', '2018-12-11 21:15:52', '5c101af8bfa97'),
(143, 23, 'NON', '2018-12-11 21:15:52', '5c101af8bfa97'),
(144, 19, 'KOKOU ZINDOBO', '2019-01-29 15:46:15', '5c5067376b970'),
(145, 20, '12', '2019-01-29 15:46:15', '5c5067376b970'),
(146, 21, 'Homme', '2019-01-29 15:46:15', '5c5067376b970'),
(147, 23, 'NON', '2019-01-29 15:46:15', '5c5067376b970'),
(148, 7, 'Homme', '2019-02-09 10:41:11', '5c5ea037854fe'),
(149, 7, 'Femme', '2019-02-09 10:41:19', '5c5ea03f31304'),
(150, 15, 'KOFFY GOMBO', '2019-02-09 10:42:19', '5c5ea07b9d2f4'),
(151, 16, '2019', '2019-02-09 10:42:19', '5c5ea07b9d2f4'),
(152, 17, 'Femme', '2019-02-09 10:42:19', '5c5ea07b9d2f4'),
(153, 18, 'Agoè', '2019-02-09 10:42:19', '5c5ea07b9d2f4'),
(154, 24, 'komla', '2019-03-28 12:01:39', '5c9ca9938720f'),
(155, 25, 'plus de 45', '2019-03-28 12:01:39', '5c9ca9938720f'),
(156, 26, 'homme', '2019-03-28 12:01:39', '5c9ca9938720f'),
(157, 24, 'afi', '2019-03-28 12:02:47', '5c9ca9d76b691'),
(158, 25, '18-25', '2019-03-28 12:02:47', '5c9ca9d76b691'),
(159, 26, 'femme', '2019-03-28 12:02:47', '5c9ca9d76b691'),
(160, 24, 'kokou', '2019-03-28 14:45:33', '5c9ccffdaf17c'),
(161, 25, '36-45', '2019-03-28 14:45:33', '5c9ccffdaf17c'),
(162, 26, 'femme', '2019-03-28 14:45:33', '5c9ccffdaf17c'),
(163, 27, 'Lol ok', '2019-04-01 16:31:18', '5ca220b60c5a7'),
(164, 29, 'plus de 45', '2019-04-01 16:31:18', '5ca220b60c5a7'),
(165, 30, 'homme', '2019-04-01 16:31:18', '5ca220b60c5a7'),
(166, 31, 'chefs d\'entreprise', '2019-04-01 16:31:18', '5ca220b60c5a7'),
(167, 32, 'oui', '2019-04-01 16:31:18', '5ca220b60c5a7'),
(168, 33, 'plus de 3 ans', '2019-04-01 16:31:18', '5ca220b60c5a7'),
(169, 34, 'non', '2019-04-01 16:31:18', '5ca220b60c5a7'),
(170, 36, 'priorité5', '2019-04-01 16:31:18', '5ca220b60c5a7'),
(171, 37, 'priorité4', '2019-04-01 16:31:18', '5ca220b60c5a7'),
(172, 38, 'priorité8', '2019-04-01 16:31:18', '5ca220b60c5a7'),
(173, 39, 'priorité2', '2019-04-01 16:31:18', '5ca220b60c5a7'),
(174, 40, 'priorité9', '2019-04-01 16:31:18', '5ca220b60c5a7'),
(175, 27, 'Simon', '2019-04-01 16:32:25', '5ca220f984596'),
(176, 29, '18-25', '2019-04-01 16:32:25', '5ca220f984596'),
(177, 30, 'femme', '2019-04-01 16:32:25', '5ca220f984596'),
(178, 31, 'étudiants', '2019-04-01 16:32:25', '5ca220f984596'),
(179, 32, 'oui', '2019-04-01 16:32:25', '5ca220f984596'),
(180, 33, '3 ans', '2019-04-01 16:32:25', '5ca220f984596'),
(181, 34, 'oui', '2019-04-01 16:32:25', '5ca220f984596'),
(182, 35, 'la banque populaire', '2019-04-01 16:32:25', '5ca220f984596'),
(183, 36, 'priorité3', '2019-04-01 16:32:25', '5ca220f984596'),
(184, 37, 'priorité2', '2019-04-01 16:32:25', '5ca220f984596'),
(185, 38, 'priorité5', '2019-04-01 16:32:25', '5ca220f984596'),
(186, 39, 'priorit7', '2019-04-01 16:32:25', '5ca220f984596'),
(187, 40, 'priorité6', '2019-04-01 16:32:25', '5ca220f984596');

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `suscriber` int(11) DEFAULT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `suscriber`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, NULL, 'admin', 'admin', 'denis.kombate@gmail.com', 'denis.kombate@gmail.com', 1, NULL, '$2y$13$k5DCxNTlshoIQt9CKhGNHOlr5pW.rkmxg.ihp9uuW3fDeegzTHXW.', '2019-04-03 11:05:20', NULL, NULL, 'a:0:{}'),
(2, NULL, 'aet', 'aet', 'erzertzer@gmail.com', 'erzertzer@gmail.com', 1, NULL, '$2y$13$/TvA3d1358BRY7xq9lvGq.zvlr5TeRS9ycMYsFvVYOE7Y2x5Ncsyy', '2018-11-13 00:20:25', NULL, NULL, 'a:0:{}'),
(3, NULL, 'manager', 'manager', 'info@landogroupcie.com', 'info@landogroupcie.com', 1, NULL, '$2y$13$eipuk8m4CP5wYTmFUnjOCe2L079wdG.7NSQoRvKdKnY8kkYOW8/L6', '2019-01-29 15:51:19', NULL, NULL, 'a:0:{}'),
(4, NULL, 'diane', 'diane', 'apegnowoudiane8@gmail.com', 'apegnowoudiane8@gmail.com', 1, NULL, '$2y$13$8efrKzVZzy29o42O9Owx6u085UgXDkylRYmSsYgGB7J52mLSwNWma', '2019-04-01 16:23:52', NULL, NULL, 'a:0:{}');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `answerAsInput` tinyint(1) NOT NULL,
  `chatbot` int(11) NOT NULL,
  `index_key` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id`, `title`, `createdAt`, `answerAsInput`, `chatbot`, `index_key`) VALUES
(6, 'Votre nom et prenoms', '2018-11-27 08:37:02', 1, 3, 5),
(7, 'Vous etes', '2018-11-27 08:38:00', 0, 3, 2),
(9, 'Votre nom et prenoms', '2018-11-28 07:18:39', 1, 2, 10),
(10, 'Vous etes', '2018-11-28 07:18:51', 0, 2, 20),
(11, 'Etes-vous enceinte ?', '2018-11-28 07:21:51', 0, 2, 40),
(12, 'Votre age', '2018-11-28 07:23:11', 1, 2, 30),
(14, 'telephone', '2018-11-28 07:24:06', 1, 2, 50),
(15, 'Votre nom et prenoms', '2018-12-09 21:31:30', 1, 5, 10),
(16, 'Promotion', '2018-12-09 21:31:44', 1, 5, 20),
(17, 'Vous etes', '2018-12-09 21:31:53', 0, 5, 30),
(18, 'Adresse', '2018-12-09 21:32:40', 1, 5, 40),
(19, 'Votre identité', '2018-12-11 20:17:25', 1, 6, 10),
(20, 'Votre age', '2018-12-11 20:17:42', 1, 6, 20),
(21, 'Votre sexe', '2018-12-11 20:18:03', 0, 6, 30),
(22, 'Votre cycle menstruel est régulier', '2018-12-11 20:23:44', 0, 6, 40),
(23, 'Avez vous des tendance succidaires ?', '2018-12-11 20:30:12', 0, 6, 50),
(24, 'votre pseudonyme', '2019-03-28 11:51:59', 1, 7, 10),
(25, 'votre age', '2019-03-28 11:52:40', 0, 7, 20),
(26, 'votre sexe', '2019-03-28 11:59:41', 0, 7, 30),
(27, 'Identification', '2019-03-28 12:15:42', 1, 8, 10),
(29, 'votre âge', '2019-03-28 12:18:53', 0, 8, 30),
(30, 'sexe', '2019-03-28 12:20:12', 0, 8, 40),
(31, 'profession', '2019-03-28 12:21:07', 0, 8, 50),
(32, 'êtes-vous client de BMCI ?', '2019-03-28 12:23:44', 0, 8, 60),
(33, 'depuis combien de temps étiez-vous client de la BMCI ?', '2019-03-28 12:25:02', 0, 8, 70),
(34, 'êtes-vous client dans d\'autres banques ?', '2019-03-28 12:28:59', 0, 8, 80),
(35, 'si oui, lesquelles ?', '2019-03-28 12:30:00', 0, 8, 90),
(36, 'quels sont selon vous les critères les plus importants lorsque vous choisissez votre banque. Classez-les par ordre d\'importance ? / Placement de l\'agence', '2019-03-28 12:48:29', 0, 8, 100),
(37, 'quels sont selon vous les critères les plus importants lorsque vous choisissez votre banque. Classez-les par ordre d\'importance ? / rapidité des services', '2019-03-28 12:49:06', 0, 8, 110),
(38, 'quels sont selon vous les critères les plus importants lorsque vous choisissez votre banque. Classez-les par ordre d\'importance ?/prix des services', '2019-03-28 12:52:29', 0, 8, 120),
(39, 'quels sont selon vous les critères les plus importants lorsque vous choisissez votre banque. Classez-les par ordre d\'importance ?/disponibilité de personnel', '2019-03-28 12:54:32', 0, 8, 130),
(40, 'quels sont selon vous les critères les plus importants lorsque vous choisissez votre banque. Classez-les par ordre d\'importance ?/conseil et information', '2019-03-28 13:02:09', 0, 8, 140),
(42, 'comment trouvez-vous les services et produits de votre agence ?', '2019-03-28 13:03:31', 0, 8, 160),
(43, 'recommanderiez-vous la BMCI à vos amis ?', '2019-03-28 13:07:39', 0, 8, 170),
(44, 'recommanderiez-vous la BMCI à vos amis ?', '2019-03-28 13:07:40', 0, 8, 170),
(45, 'si vous deviez demain ré acheter un produit ou service bancaire diriez-vous plutôt', '2019-03-28 13:09:13', 0, 8, 180),
(46, 'si au cours du prochain mois, vous seriez déçus par un service proposé par votre banque (erreur, mauvais conseil, non respect des détails, etc.)', '2019-03-28 13:11:06', 0, 8, 190),
(47, 'si au cours du prochain mois, une banque concurrente vous proposait une offre attractive (offre de crédit pour l\'achat d\'un véhicule ou crédit personnel par exemple)', '2019-03-28 13:13:02', 0, 8, 200);

-- --------------------------------------------------------

--
-- Structure de la table `suscriber`
--

CREATE TABLE `suscriber` (
  `id` int(11) NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pays` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DADD4A25B6F7494E` (`question`);

--
-- Index pour la table `chat_bot`
--
ALTER TABLE `chat_bot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_21D522B4CF60E67C` (`owner`);

--
-- Index pour la table `choice`
--
ALTER TABLE `choice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C1AB5A92B6F7494E` (`question`);

--
-- Index pour la table `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`),
  ADD UNIQUE KEY `UNIQ_957A6479B0995892` (`suscriber`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B6F7494E7DC4B004` (`chatbot`);

--
-- Index pour la table `suscriber`
--
ALTER TABLE `suscriber`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_B0995892444F97DD` (`phone`),
  ADD UNIQUE KEY `UNIQ_B0995892E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT pour la table `chat_bot`
--
ALTER TABLE `chat_bot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `choice`
--
ALTER TABLE `choice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT pour la table `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `suscriber`
--
ALTER TABLE `suscriber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `FK_DADD4A25B6F7494E` FOREIGN KEY (`question`) REFERENCES `question` (`id`);

--
-- Contraintes pour la table `chat_bot`
--
ALTER TABLE `chat_bot`
  ADD CONSTRAINT `FK_21D522B4CF60E67C` FOREIGN KEY (`owner`) REFERENCES `fos_user` (`id`);

--
-- Contraintes pour la table `choice`
--
ALTER TABLE `choice`
  ADD CONSTRAINT `FK_C1AB5A92B6F7494E` FOREIGN KEY (`question`) REFERENCES `question` (`id`);

--
-- Contraintes pour la table `fos_user`
--
ALTER TABLE `fos_user`
  ADD CONSTRAINT `FK_957A6479B0995892` FOREIGN KEY (`suscriber`) REFERENCES `suscriber` (`id`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `FK_B6F7494E7DC4B004` FOREIGN KEY (`chatbot`) REFERENCES `chat_bot` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
