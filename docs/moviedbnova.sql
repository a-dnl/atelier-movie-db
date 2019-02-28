-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 28 Février 2019 à 13:24
-- Version du serveur :  5.7.20-0ubuntu0.16.04.1
-- Version de PHP :  7.2.14-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `moviedbnova`
--

-- --------------------------------------------------------

--
-- Structure de la table `casting`
--

CREATE TABLE `casting` (
  `id` int(11) NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_credit` smallint(6) NOT NULL,
  `person_id` int(11) DEFAULT NULL,
  `movie_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `casting`
--

INSERT INTO `casting` (`id`, `role`, `order_credit`, `person_id`, `movie_id`) VALUES
(1, 'Marin grande pêche', 61, 61, 12),
(2, 'Ingénieur halieute', 30, 66, 45),
(3, 'Litigeur transport', 169, 44, 46),
(4, 'Assistant de justice', 62, 20, 44),
(5, 'Technicien plateau', 132, 58, 24),
(6, 'Géomètre', 9, 18, 7),
(7, 'Ravaleur-ragréeur', 1, 45, 13),
(8, 'Epithésiste', 72, 24, 48),
(9, 'Photographe d\'art', 94, 82, 15),
(10, 'Armurier d\'art', 159, 70, 22),
(11, 'Kiwiculteur', 103, 36, 12),
(12, 'Vendeur carreau', 169, 1, 40),
(13, 'Cintrier-machiniste', 61, 81, 32),
(14, 'Coutelier d\'art', 140, 61, 15),
(15, 'Pilote automobile', 25, 53, 35),
(16, 'Expert back-office', 31, 59, 24),
(17, 'Oenologue', 122, 33, 27),
(18, 'Bâtonnier d\'art', 183, 29, 39),
(19, 'Maçon', 63, 49, 10),
(20, 'Endivier', 114, 77, 19),
(21, 'Fraiseur mouliste', 26, 39, 33),
(22, 'Marbrier-poseur', 84, 72, 8),
(23, 'Recherche', 17, 57, 20),
(24, 'Frigoriste maritime', 127, 80, 13),
(25, 'Pareur en abattoir', 97, 81, 46),
(28, 'Epithésiste', 75, 24, 48),
(29, 'Facteur', 63, 61, 49),
(30, 'Vendeur carreau', 169, 34, 40),
(31, 'Galeriste', 40, 70, 19),
(32, 'Maître de ballet', 122, 35, 33),
(33, 'Corniste', 185, 91, 36),
(34, 'Pareur en abattoir', 140, 55, 13),
(35, 'Ingénieur halieute', 124, 3, 20),
(36, 'Etancheur', 91, 20, 13),
(37, 'Chef porion', 173, 39, 2),
(38, 'Professeur d\'italien', 68, 85, 31),
(39, 'Marin grande pêche', 156, 67, 27),
(40, 'Façadier-bardeur', 115, 81, 43),
(41, 'Aide couvreur', 61, 52, 22),
(42, 'Appareilleur-gazier', 44, 11, 18),
(43, 'Chef des ventes', 188, 88, 36),
(44, 'Verrier d\'art', 5, 9, 24),
(45, 'Recuiseur', 194, 73, 22),
(46, 'Médecin scolaire', 43, 15, 47),
(47, 'Carrier', 152, 87, 39),
(48, 'Poissonnier-traiteur', 150, 33, 21),
(49, 'Ouvrier d\'abattoir', 176, 76, 33),
(50, 'Verrier à la main', 147, 17, 22),
(51, 'Tester', 1, 82, 14),
(52, 'Tester', 1, 82, 14),
(53, 'Vendeur car', 169, 1, 40),
(54, 'Tester', 1, 82, 33),
(55, 'Fraiseur mouliste', 22, 39, 33);

-- --------------------------------------------------------

--
-- Structure de la table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `dpt_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `department`
--

INSERT INTO `department` (`id`, `dpt_name`) VALUES
(2, 'Réalisation'),
(3, 'Maquillage'),
(4, 'Prise de son');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Court Métrage'),
(2, 'Fantastique'),
(3, 'Film à Sketches'),
(4, 'Science-Fiction'),
(5, 'Historique'),
(6, 'Biographique'),
(7, 'Film Musical'),
(8, 'Documentaire'),
(9, 'Drame Psychologique'),
(10, 'Thriller'),
(11, 'Comédie Romantique'),
(12, 'Théâtre'),
(13, 'Essai'),
(14, 'Animation'),
(15, 'Espionnage'),
(16, 'Aventure'),
(17, 'Téléfilm'),
(18, 'Policier'),
(19, 'Comédie Dramatique'),
(20, 'Mélodrame'),
(21, 'Karaté'),
(22, 'Comédie Policière'),
(23, 'Muet'),
(24, 'Comédie'),
(25, 'Politique'),
(26, 'Drame'),
(27, 'Horreur'),
(28, 'Epouvante'),
(29, 'Catastrophe'),
(30, 'Manga'),
(31, 'Envie de dormir');

-- --------------------------------------------------------

--
-- Structure de la table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `job_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `job`
--

INSERT INTO `job` (`id`, `job_name`, `department_id`) VALUES
(1, 'Metteur en scène', 2);

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190226091814', '2019-02-26 09:18:16'),
('20190226092348', '2019-02-26 09:23:53'),
('20190226092838', '2019-02-26 09:28:42'),
('20190226093503', '2019-02-26 09:35:08'),
('20190226103839', '2019-02-26 10:38:46');

-- --------------------------------------------------------

--
-- Structure de la table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `movie`
--

INSERT INTO `movie` (`id`, `title`, `image`) VALUES
(1, 'Bee Movie', NULL),
(2, 'Mr. & Mrs. Smith', NULL),
(3, 'Madagascar', NULL),
(4, 'Intermission', NULL),
(5, 'Man on a Ledge', NULL),
(6, 'The Little Rascals', NULL),
(7, 'Lucy', NULL),
(8, 'Cast Away', NULL),
(9, 'Just Friends', NULL),
(10, 'Flushed Away', NULL),
(12, 'Pulp Fiction', NULL),
(13, 'The Princess Diaries 2: Royal Engagement', NULL),
(14, 'Argo', NULL),
(15, 'Equilibrium', NULL),
(16, 'The Help', NULL),
(18, 'Horrible Bosses 2', NULL),
(19, 'Babe', NULL),
(20, 'Tropic Thunder', NULL),
(21, 'The Wolf of Wall Street', NULL),
(22, 'Robots', NULL),
(23, 'Mrs. Doubtfire', NULL),
(24, 'Gone Girl', NULL),
(25, 'Minutes or Less', NULL),
(26, 'Paul', NULL),
(27, 'The Little Mermaid', NULL),
(30, 'Captain Philips', NULL),
(31, 'Me, Myself & Irene', NULL),
(32, 'Aquamarine', NULL),
(33, 'Bridget Jones\'s Diary', NULL),
(34, 'Tangled', NULL),
(35, 'Toy Story 3', NULL),
(36, 'The Cable Guy', NULL),
(37, 'Penelope', NULL),
(39, 'WALL·E', NULL),
(40, '& Over', 'http://fr.web.img4.acsta.net/r_1920_1080/medias/nmedia/18/94/58/95/20340769.jpg'),
(41, 'The Vow', NULL),
(43, 'Jump Street', NULL),
(44, 'Monster-in-Law', NULL),
(45, 'The Day After Tomorrow', NULL),
(46, 'The Jungle Book', NULL),
(47, 'Interstellar', NULL),
(48, 'American Beauty 2', NULL),
(49, 'Jump Street (2014)', NULL),
(50, 'She\'s the Man', NULL),
(52, 'Star wars 1', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `movie_genre`
--

CREATE TABLE `movie_genre` (
  `movie_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `movie_genre`
--

INSERT INTO `movie_genre` (`movie_id`, `genre_id`) VALUES
(1, 2),
(1, 24),
(1, 29),
(2, 7),
(2, 13),
(2, 14),
(3, 11),
(3, 16),
(3, 29),
(4, 2),
(4, 4),
(4, 27),
(5, 1),
(5, 13),
(5, 20),
(6, 9),
(6, 13),
(6, 18),
(7, 11),
(7, 28),
(7, 30),
(8, 2),
(8, 11),
(8, 13),
(9, 9),
(9, 16),
(9, 27),
(10, 1),
(10, 8),
(10, 15),
(12, 3),
(12, 15),
(12, 16),
(13, 8),
(13, 16),
(13, 19),
(14, 6),
(14, 7),
(14, 21),
(15, 9),
(15, 17),
(15, 28),
(16, 6),
(16, 7),
(16, 29),
(18, 13),
(18, 18),
(18, 20),
(19, 5),
(19, 16),
(19, 25),
(20, 6),
(20, 15),
(20, 19),
(21, 9),
(21, 11),
(21, 29),
(22, 7),
(22, 20),
(22, 27),
(23, 1),
(23, 13),
(23, 14),
(24, 11),
(24, 13),
(24, 30),
(25, 7),
(25, 16),
(25, 22),
(26, 9),
(26, 11),
(26, 15),
(27, 9),
(27, 11),
(27, 19),
(30, 4),
(30, 9),
(30, 27),
(31, 6),
(31, 17),
(31, 23),
(32, 7),
(32, 9),
(32, 29),
(33, 2),
(33, 5),
(33, 8),
(34, 4),
(34, 18),
(34, 30),
(35, 18),
(35, 21),
(35, 27),
(36, 2),
(36, 15),
(36, 24),
(37, 9),
(37, 10),
(37, 25),
(39, 19),
(39, 22),
(39, 24),
(40, 14),
(41, 1),
(41, 19),
(41, 23),
(43, 7),
(43, 18),
(43, 22),
(44, 14),
(44, 21),
(44, 28),
(45, 3),
(45, 24),
(45, 26),
(46, 7),
(46, 8),
(46, 20),
(47, 4),
(47, 19),
(47, 29),
(48, 6),
(48, 15),
(48, 24),
(49, 7),
(49, 28),
(49, 30),
(50, 2),
(50, 22),
(50, 24),
(52, 4);

-- --------------------------------------------------------

--
-- Structure de la table `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `person`
--

INSERT INTO `person` (`id`, `name`) VALUES
(1, 'Diane Le Beckerer'),
(3, 'Lucas de la Pierre Le Grand'),
(4, 'Stéphane Salmon'),
(5, 'Léon Becker'),
(6, 'Virginie-Aimée Fournier'),
(7, 'Antoine David'),
(8, 'Astrid de la Rodriguez'),
(9, 'Emmanuelle Marechal'),
(10, 'Véronique Leveque'),
(11, 'Rémy Riviere'),
(12, 'Jérôme Pichon'),
(13, 'Philippe Marchal'),
(14, 'Frédéric De Sousa'),
(15, 'Emmanuelle Dos Santos-Goncalves'),
(16, 'Noël Rodrigues'),
(17, 'Céline-Antoinette Baudry'),
(18, 'Alphonse Peron'),
(19, 'Louise Charpentier-Olivier'),
(20, 'Philippe Mace'),
(21, 'Bertrand Pichon-Rossi'),
(22, 'Zacharie Collin'),
(23, 'Georges de Delorme'),
(24, 'Emmanuelle-Odette Lecoq'),
(25, 'Grégoire-Thibault Parent'),
(26, 'Audrey Coste'),
(27, 'Claire Nicolas'),
(28, 'Capucine Lemaire'),
(29, 'Thérèse-Suzanne Lejeune'),
(30, 'Martin Renault-Jacquot'),
(31, 'Gérard Benard'),
(32, 'Matthieu Guillon'),
(33, 'Caroline de la Lenoir'),
(34, 'Daniel Muller-Lecomte'),
(35, 'Charles de Mace'),
(36, 'Timothée Lopes'),
(37, 'Marcel Prevost'),
(38, 'Adrien Mendes'),
(39, 'Roland de Vincent'),
(40, 'Margaret Vidal'),
(41, 'Anaïs de la Legrand'),
(42, 'Victor Perrin'),
(43, 'Hugues Fabre'),
(44, 'Véronique Michaud'),
(45, 'Hortense Herve-Paris'),
(46, 'Thierry Gallet'),
(47, 'Henriette Prevost'),
(48, 'Amélie Picard-Lemonnier'),
(49, 'Noémi Marchand'),
(50, 'Lucy Aubry-Moreno'),
(51, 'Virginie-Zoé Thibault'),
(52, 'Auguste Aubert'),
(53, 'Augustin Legendre-Collet'),
(54, 'Stéphanie Bourdon'),
(55, 'Roger Fournier'),
(56, 'Antoine Roux'),
(57, 'Lorraine Loiseau'),
(58, 'Charlotte-Marcelle Le Roux'),
(59, 'Laurence Dumas'),
(60, 'Élisabeth Carpentier'),
(61, 'Emmanuel Becker'),
(62, 'Roger Neveu'),
(63, 'Odette Descamps'),
(64, 'Michèle Daniel'),
(65, 'Thibault Leclercq'),
(66, 'Maryse Ruiz'),
(67, 'Théophile de Lemaire'),
(68, 'Astrid Laroche'),
(69, 'Nicolas-Adrien Lebon'),
(70, 'Anastasie-Nathalie Etienne'),
(71, 'Juliette-Sophie Francois'),
(72, 'Hortense Girard-Diallo'),
(73, 'Aurore Schmitt'),
(74, 'Sébastien Jourdan'),
(75, 'Nathalie Aubry'),
(76, 'Camille Dupont'),
(77, 'Aurore Lejeune'),
(78, 'Charles-Philippe Faivre'),
(79, 'Dorothée Mallet'),
(80, 'Margaret Seguin'),
(81, 'Susan Gilbert'),
(82, 'Adélaïde Bailly'),
(83, 'François Antoine'),
(84, 'Marcel Moreau'),
(85, 'Gilbert Bonnin'),
(86, 'Adrienne du Menard'),
(87, 'Adèle Pierre'),
(88, 'Thierry Besnard'),
(89, 'Marcel Perrot'),
(90, 'Isaac Albert'),
(91, 'Dorothée-Clémence Arnaud'),
(92, 'Élise Benoit'),
(93, 'Louis Gaudin'),
(94, 'Christophe de la Maillot'),
(95, 'Émilie Pons-Reynaud'),
(96, 'Guy-David Gautier'),
(97, 'Tristan Le Roy'),
(98, 'Laure Vaillant'),
(99, 'Jeannine-Michèle Petit'),
(100, 'Clémence Petit'),
(102, 'Tester');

-- --------------------------------------------------------

--
-- Structure de la table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `person_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `casting`
--
ALTER TABLE `casting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D11BBA50217BBB47` (`person_id`),
  ADD KEY `IDX_D11BBA508F93B6FC` (`movie_id`);

--
-- Index pour la table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FBD8E0F8AE80F5DF` (`department_id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD PRIMARY KEY (`movie_id`,`genre_id`),
  ADD KEY `IDX_FD1229648F93B6FC` (`movie_id`),
  ADD KEY `IDX_FD1229644296D31F` (`genre_id`);

--
-- Index pour la table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C4E0A61F8F93B6FC` (`movie_id`),
  ADD KEY `IDX_C4E0A61F217BBB47` (`person_id`),
  ADD KEY `IDX_C4E0A61FBE04EA9` (`job_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `casting`
--
ALTER TABLE `casting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT pour la table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT pour la table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT pour la table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT pour la table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `casting`
--
ALTER TABLE `casting`
  ADD CONSTRAINT `FK_D11BBA50217BBB47` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`),
  ADD CONSTRAINT `FK_D11BBA508F93B6FC` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`);

--
-- Contraintes pour la table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `FK_FBD8E0F8AE80F5DF` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`);

--
-- Contraintes pour la table `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD CONSTRAINT `FK_FD1229644296D31F` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_FD1229648F93B6FC` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `FK_C4E0A61F217BBB47` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`),
  ADD CONSTRAINT `FK_C4E0A61F8F93B6FC` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`),
  ADD CONSTRAINT `FK_C4E0A61FBE04EA9` FOREIGN KEY (`job_id`) REFERENCES `job` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
