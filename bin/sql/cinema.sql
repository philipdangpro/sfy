SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `symfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteur`
--

CREATE TABLE `acteur` (
  `id` int(11) NOT NULL,
  `pays_id` int(11) DEFAULT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dateNaissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `acteur`
--

INSERT INTO `acteur` (`id`, `pays_id`, `prenom`, `nom`, `dateNaissance`) VALUES
(1, 1, 'roy', 'scheider', '1932-11-10'),
(2, 1, 'richard', 'dreyfuss', '1947-12-29'),
(3, 2, 'françois', 'truffaut', '1932-02-06'),
(4, 1, 'harrison', 'ford', '1942-07-13'),
(5, 3, 'toshirô', 'mifune', '1920-04-01'),
(6, 3, 'takashi', 'shimura', '1905-03-12'),
(7, 3, 'tatsuya', 'nakadai', '1932-12-13'),
(8, 2, 'isabelle', 'adjani', '1955-06-27'),
(9, 2, 'christophe', 'lambert', '1957-03-29'),
(10, 1, 'bruce', 'willis', '1955-03-19'),
(11, 4, 'milla', 'jovovich', '1975-12-17'),
(12, 1, 'scarlett', 'johansson', '1984-11-22'),
(13, 1, 'morgan', 'freeman', '1937-06-01'),
(14, 1, 'kirk', 'douglas', '1916-12-09'),
(15, 1, 'keir', 'dullea', '1936-05-30'),
(16, 1, 'jack', 'nicholson', '1937-04-22'),
(17, 1, 'cary', 'grant', '1904-01-18'),
(18, 1, 'eva', 'marie_saint', '1924-07-04'),
(19, 1, 'anthony', 'perkins', '1932-04-04'),
(20, 1, 'janet', 'leigh', '1927-07-06'),
(21, 1, 'tippi', 'hedren', '1930-06-19'),
(22, 6, 'rod', 'taylor', '1930-01-11'),
(23, 1, 'sean', 'penn', '1960-08-17'),
(24, 1, 'jim', 'caviezel', '1968-09-26'),
(25, 1, 'nick', 'nolte', '1941-02-08'),
(26, 1, 'clint', 'eastwood', '1930-05-31'),
(27, 1, 'lee', 'van_cleef', '1925-01-09'),
(28, 8, 'marianne', 'koch', '1931-08-19'),
(29, 1, 'eli', 'wallach', '1915-12-07'),
(30, 1, 'robert', 'de_niro', '1943-08-17'),
(31, 1, 'jodie', 'foster', '1962-11-19'),
(32, 1, 'ray', 'liotta', '1954-12-18'),
(33, 1, 'joe', 'pesci', '1943-02-09'),
(34, 1, 'sharon', 'stone', '1958-03-10');

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateSortie` date NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `film`
--

INSERT INTO `film` (`id`, `titre`, `dateSortie`, `description`) VALUES
(1, 'les dents de la mer', '1975-06-18', 'À quelques jours du début de la saison estivale, les habitants de la petite station balnéaire d\'Amity sont mis en émoi par la découverte sur le littoral du corps atrocement mutilé d\'une jeune vacancière.'),
(2, 'rencontres du 3ème type', '1978-02-24', 'Des faits étranges se produisent un peu partout dans le monde : des avions qui avaient disparu durant la Seconde Guerre mondiale sont retrouvés au Mexique en parfait état de marche, un cargo est découvert échoué au beau milieu du désert de Gobi.'),
(3, 'les aventuriers de l\'arche perdue', '1981-09-16', '1936. Parti à la recherche d\'une idole sacrée en pleine jungle péruvienne, l\'aventurier Indiana Jones échappe de justesse à une embuscade tendue par son plus coriace adversaire : le Français René Belloq.'),
(4, 'rashômon', '1952-04-18', 'Kyoto, au XIe siècle. Sous le portique d\'un vieux temple en ruines, Rashômon, trois hommes s\'abritent de la pluie. Les guerres et les famines font rage. Pourtant un jeune moine et un vieux bûcheron sont plus terrifiés encore par le procès auquel ils viennent d\'assister.'),
(5, 'les sept samouraïs', '1954-04-26', 'Au Moyen-Age, la tranquillité d\'un petit village japonais est troublée par les attaques répétées d\'une bande de pillards. Sept samouraïs sans maître acceptent de défendre les paysans impuissants.'),
(6, 'kagemusha, l\'ombre du guerrier', '1980-04-26', 'En 1573, le Japon est le théâtre de guerres incessantes entre clans rivaux. Le plus puissant de ces clans est commandé par Shingen Takeda. Au cours du siège du château de Noda, Takeda est blessé à mort par un tireur embusqué.'),
(7, 'subway', '1985-04-10', 'Après avoir dérobé des documents compromettants, un homme se réfugié dans l\'univers fascinant et agité du métro parisien.'),
(8, 'le cinquième élément', '1997-05-07', 'Au XXIII siècle, dans un univers étrange et coloré, où tout espoir de survie est impossible sans la découverte du cinquième élément, un héros affronte le mal pour sauver l\'humanité.'),
(9, 'lucy', '2014-08-06', 'À la suite de circonstances indépendantes de sa volonté, une jeune étudiante voit ses capacités intellectuelles se développer à l’infini. Elle « colonise » son cerveau, et acquiert des pouvoirs illimités.'),
(10, 'spartacus', '1960-10-07', 'Italie, 73 av. J.C. Esclave devenu gladiateur, Spartacus est épargné par un de ses compagnons d\'infortune dans un combat à mort.'),
(11, '2001 : l\'odyssée de l\'espace', '1968-09-27', 'À l\'aube de l\'Humanité, dans le désert africain, une tribu de primates subit les assauts répétés d\'une bande rivale, qui lui dispute un point d\'eau.'),
(12, 'shining', '1980-10-16', 'Jack Torrance, gardien d\'un hôtel fermé l\'hiver, sa femme et son fils Danny s\'apprêtent à vivre de longs mois de solitude.'),
(13, 'la mort aux trousses', '1959-10-21', 'Le publiciste Roger Tornhill se retrouve par erreur dans la peau d\'un espion. Pris entre une mystérieuse organisation qui cherche à le supprimer et la police qui le poursuit, Tornhill est dans une situation bien inconfortable.'),
(14, 'psychose', '1960-11-02', 'Marion Crane en a assez de ne pouvoir mener sa vie comme elle l\'entend. Son travail ne la passionne plus, son amant ne peut l\'épouser car il doit verser une énorme pension alimentaire le laissant sans le sou…'),
(15, 'les oiseaux', '1963-03-28', 'Melanie, jeune femme quelque peu superficielle, rencontre chez un marchand d\'oiseaux un brillant et séduisant avocat qui recherche des inséparables. Par jeu, Melanie achète les oiseaux et les apporte a Bodega Bay.'),
(16, 'la ligne rouge', '1999-02-24', 'La bataille de Guadalcanal fut une étape clé de la guerre du Pacifique. Marquée par des affrontements d\'une violence sans précédent, elle opposa durant de longs mois Japonais et Américains au coeur d\'un site paradisiaque, habité par de paisibles tribus mélanésiennes.'),
(17, 'et pour quelques dollars de plus', '1965-12-18', 'L\'indien, bandit cruel et fou, s\'est évadé de prison. Il se prépare à attaquer la banque d\'El Paso, la mieux gardée de tout l\'Ouest, avec une quinzaine d\'autres malfaiteurs.'),
(18, 'pour une poignée de dollars', '1966-03-01', 'Deux bandes rivales, les Baxter, trafiquants d\'armes, et les Rojo, qui font de la contrebande d\'alcool, se disputent la suprématie et la domination de la ville de San Miguel, au sud de la frontière américano-mexicaine.'),
(19, 'le bon, la brute et le truand', '1968-03-08', 'Pendant la Guerre de Sécession, trois hommes, préférant s\'intéresser à leur profit personnel, se lancent à la recherche d\'un coffre contenant 200 000 dollars en pièces d\'or volés à l\'armée sudiste. Tuco sait que le trésor se trouve dans un cimetière, tandis que Joe connaît le nom inscrit sur la pierre tombale qui sert de cache.'),
(20, 'taxi driver', '1976-06-02', 'Vétéran de la Guerre du Vietnam, Travis Bickle est chauffeur de taxi dans la ville de New York. Ses rencontres nocturnes et la violence quotidienne dont il est témoin lui font peu à peu perdre la tête.'),
(21, 'les affranchis', '1990-09-12', 'Depuis sa plus tendre enfance, Henry Hill, né d\'un père irlandais et d\'une mère sicilienne, veut devenir gangster et appartenir à la Mafia. Adolescent dans les années cinquante, il commence par travailler pour le compte de Paul Cicero et voue une grande admiration pour Jimmy Conway, qui a fait du détournement de camions sa grande spécialité.'),
(22, 'casino', '1996-03-13', 'En 1973, Sam Ace Rothstein est le grand manitou de la ville de toutes les folies, Las Vegas. Il achète et épouse une virtuose de l’arnaque, Ginger Mc Kenna, qui sombre bien vite dans l’alcool et la drogue.');

-- --------------------------------------------------------

--
-- Structure de la table `films_acteurs`
--

CREATE TABLE `films_acteurs` (
  `film_id` int(11) NOT NULL,
  `acteur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `films_acteurs`
--

INSERT INTO `films_acteurs` (`film_id`, `acteur_id`) VALUES
(1, 1),
(1, 2),
(2, 2),
(2, 3),
(3, 4),
(4, 5),
(5, 5),
(5, 6),
(6, 7),
(7, 8),
(7, 9),
(8, 10),
(8, 11),
(9, 12),
(9, 13),
(10, 14),
(11, 15),
(12, 16),
(13, 17),
(13, 18),
(14, 19),
(14, 20),
(15, 21),
(15, 22),
(16, 23),
(16, 24),
(16, 25),
(17, 26),
(17, 27),
(18, 26),
(18, 28),
(19, 26),
(19, 27),
(19, 29),
(20, 30),
(20, 31),
(21, 30),
(21, 32),
(21, 33),
(22, 30),
(22, 33),
(22, 34);

-- --------------------------------------------------------

--
-- Structure de la table `films_genres`
--

CREATE TABLE `films_genres` (
  `film_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `films_genres`
--

INSERT INTO `films_genres` (`film_id`, `genre_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(2, 6),
(3, 3),
(3, 5),
(4, 6),
(5, 3),
(5, 5),
(5, 6),
(6, 6),
(6, 7),
(6, 8),
(7, 9),
(8, 4),
(9, 3),
(9, 4),
(10, 7),
(10, 8),
(10, 10),
(10, 11),
(11, 4),
(12, 1),
(13, 5),
(13, 9),
(13, 12),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 6),
(16, 8),
(17, 3),
(17, 13),
(18, 3),
(18, 13),
(19, 13),
(20, 6),
(20, 9),
(21, 9),
(21, 14),
(22, 6);

-- --------------------------------------------------------

--
-- Structure de la table `films_realisateurs`
--

CREATE TABLE `films_realisateurs` (
  `film_id` int(11) NOT NULL,
  `realisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `films_realisateurs`
--

INSERT INTO `films_realisateurs` (`film_id`, `realisateur_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 2),
(5, 2),
(6, 2),
(7, 3),
(8, 3),
(9, 3),
(10, 4),
(11, 4),
(12, 4),
(13, 5),
(14, 5),
(15, 5),
(16, 6),
(17, 7),
(18, 7),
(19, 7),
(20, 8),
(21, 8),
(22, 8);

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `genre`
--

INSERT INTO `genre` (`id`, `nom`) VALUES
(3, 'action'),
(5, 'aventure'),
(11, 'biopic'),
(12, 'comédie'),
(6, 'drame'),
(8, 'guerre'),
(7, 'historique'),
(1, 'horreur'),
(14, 'judiciaire'),
(9, 'policier'),
(10, 'romance'),
(4, 'science fiction'),
(2, 'thriller'),
(13, 'western');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`id`, `nom`) VALUES
(8, 'allemagne'),
(6, 'australie'),
(1, 'états-unis d\'amérique'),
(2, 'france'),
(7, 'italie'),
(3, 'japon'),
(5, 'royaume-uni'),
(4, 'ukraine');

-- --------------------------------------------------------

--
-- Structure de la table `realisateur`
--

CREATE TABLE `realisateur` (
  `id` int(11) NOT NULL,
  `pays_id` int(11) DEFAULT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dateNaissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `realisateur`
--

INSERT INTO `realisateur` (`id`, `pays_id`, `prenom`, `nom`, `dateNaissance`) VALUES
(1, 1, 'steven', 'spielberg', '1946-12-18'),
(2, 3, 'akira', 'kurosawa', '1910-03-23'),
(3, 2, 'luc', 'besson', '1959-03-18'),
(4, 1, 'stanley', 'kubrick', '1928-07-26'),
(5, 5, 'alfred', 'hitchcock', '1899-08-13'),
(6, 1, 'terrence', 'malick', '1943-11-30'),
(7, 7, 'sergio', 'leone', '1921-01-03'),
(8, 1, 'martin', 'scorsese', '1942-11-17');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `acteur`
--
ALTER TABLE `acteur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_EAFAD362A6E44244` (`pays_id`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `films_acteurs`
--
ALTER TABLE `films_acteurs`
  ADD PRIMARY KEY (`film_id`,`acteur_id`),
  ADD KEY `IDX_A526A0F567F5183` (`film_id`),
  ADD KEY `IDX_A526A0FDA6F574A` (`acteur_id`);

--
-- Index pour la table `films_genres`
--
ALTER TABLE `films_genres`
  ADD PRIMARY KEY (`film_id`,`genre_id`),
  ADD KEY `IDX_1FBF6EAF567F5183` (`film_id`),
  ADD KEY `IDX_1FBF6EAF4296D31F` (`genre_id`);

--
-- Index pour la table `films_realisateurs`
--
ALTER TABLE `films_realisateurs`
  ADD PRIMARY KEY (`film_id`,`realisateur_id`),
  ADD KEY `IDX_3EC13070567F5183` (`film_id`),
  ADD KEY `IDX_3EC13070F1D8422E` (`realisateur_id`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_835033F86C6E55B5` (`nom`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_349F3CAE6C6E55B5` (`nom`);

--
-- Index pour la table `realisateur`
--
ALTER TABLE `realisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_47933EFEA6E44244` (`pays_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `acteur`
--
ALTER TABLE `acteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `realisateur`
--
ALTER TABLE `realisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `acteur`
--
ALTER TABLE `acteur`
  ADD CONSTRAINT `FK_EAFAD362A6E44244` FOREIGN KEY (`pays_id`) REFERENCES `pays` (`id`);

--
-- Contraintes pour la table `films_acteurs`
--
ALTER TABLE `films_acteurs`
  ADD CONSTRAINT `FK_A526A0F567F5183` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A526A0FDA6F574A` FOREIGN KEY (`acteur_id`) REFERENCES `acteur` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `films_genres`
--
ALTER TABLE `films_genres`
  ADD CONSTRAINT `FK_1FBF6EAF4296D31F` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_1FBF6EAF567F5183` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `films_realisateurs`
--
ALTER TABLE `films_realisateurs`
  ADD CONSTRAINT `FK_3EC13070567F5183` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_3EC13070F1D8422E` FOREIGN KEY (`realisateur_id`) REFERENCES `realisateur` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `realisateur`
--
ALTER TABLE `realisateur`
  ADD CONSTRAINT `FK_47933EFEA6E44244` FOREIGN KEY (`pays_id`) REFERENCES `pays` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
