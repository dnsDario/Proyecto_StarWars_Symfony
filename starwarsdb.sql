-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3400
-- Tiempo de generación: 21-01-2025 a las 07:43:54
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `starwarsdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `character`
--

CREATE TABLE `character` (
  `id` int(11) NOT NULL,
  `planet_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `species` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `mass` varchar(255) NOT NULL,
  `birth_year` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `character`
--

INSERT INTO `character` (`id`, `planet_id`, `name`, `species`, `height`, `mass`, `birth_year`, `image`) VALUES
(19, 4, 'Luke Skywalker', 'Human', '172', '77', '19BBY', '/images/characters/677ff85b185b5.png'),
(20, 4, 'C-3PO', 'Droid', '167', '75', '112BBY', '/images/characters/677f7de7e38a8.png'),
(21, 7, 'R2-D2', 'Droid', '96', '32', '33BBY', '/images/characters/677f7dfa0dde3.png'),
(22, 4, 'Darth Vader', 'Human', '202', '136', '41.9BBY', '/images/characters/677f7e0725b76.png'),
(23, 5, 'Leia Organa', 'Human', '150', '49', '19BBY', '/images/characters/677ff88b1d2e4.png'),
(24, 4, 'Owen Lars', 'Human', '178', '120', '52BBY', '/images/characters/6787672998130.png'),
(25, 4, 'Beru Whitesun Lars', 'Human', '165', '75', '47BBY', '/images/characters/678766e26625c.png'),
(26, 4, 'R5-D4', 'Droid', '97', '32', 'unknown', '/images/characters/677f81750551e.png'),
(27, 4, 'Biggs Darklighter', 'Human', '183', '84', '24BBY', '/images/characters/677f829876f41.jpg'),
(28, 8, 'Obi-Wan Kenobi', 'Human', '182', '77', '57BBY', '/images/characters/677f82c82d514.png'),
(29, 9, 'Wilhuff Tarkin', 'Human', '180', 'unknown', '64BBY', '/images/characters/677f831b4e0bf.png'),
(30, 10, 'Chewbacca', 'Wookiee', '228', '112', '200BBY', '/images/characters/677f832709c63.png'),
(31, 11, 'Han Solo', 'Human', '180', '80', '29BBY', '/images/characters/677f8333da3ae.png'),
(32, 12, 'Greedo', 'Rodian', '173', '74', '44BBY', '/images/characters/677f83ed7c169.png'),
(33, 13, 'Jabba Desilijic Tiure', 'Hutt', '175', '1,358', '600BBY', '/images/characters/677f85a0d1c85.png'),
(34, 11, 'Wedge Antilles', 'Human', '170', '77', '21BBY', '/images/characters/677f866747aed.png'),
(35, 14, 'Jek Tono Porkins', 'Human', '180', '110', 'unknown', '/images/characters/677f86f0882d4.jpg'),
(36, 5, 'Raymus Antilles', 'Human', '188', '79', 'unknown', '/images/characters/678770f23bc01.png'),
(37, 19, 'Yoda', 'Yoda\'s species', '66', '17', '896BBY', '/images/characters/677f882f9194b.png'),
(38, 7, 'Palpatine', 'Human', '170', '75', '82BBY', '/images/characters/677f883b87f0f.png'),
(39, 20, 'Boba Fett', 'Human', '183', '78.2', '31.5BBY', '/images/characters/677f884bc44bd.png'),
(40, 19, 'IG-88', 'Droid', '200', '140', '15BBY', '/images/characters/677f888186077.png'),
(41, 21, 'Bossk', 'Trandoshan', '190', '113', '53BBY', '/images/characters/677f88bc4b98a.png'),
(42, 22, 'Lando Calrissian', 'Human', '177', '79', '31BBY', '/images/characters/677f89c3c52f4.png'),
(43, 17, 'Lobot', 'Human', '175', '79', '37BBY', '/images/characters/678778de56571.png'),
(44, 25, 'Ackbar', 'Mon Calamari', '180', '83', '41BBY', '/images/characters/677f8a9949ff0.png'),
(45, 26, 'Mon Mothma', 'Human', '150', 'unknown', '48BBY', '/images/characters/677f8b7382ce0.png'),
(46, 19, 'Arvel Crynyd', 'Human', 'unknown', 'unknown', 'unknown', '/images/characters/67823c8c2c118.png'),
(47, 23, 'Wicket Systri Warrick', 'Ewok', '88', '20', '8BBY', '/images/characters/6786422012761.png'),
(48, 27, 'Nien Nunb', 'Sullustan', '160', '68', 'unknown', '/images/characters/677f8d42bd31d.png'),
(49, 28, 'Bib Fortuna', 'Twi\'lek', '180', 'unknown', 'unknown', '/images/characters/677f8df64b720.png'),
(50, 4, 'Anakin Skywalker', 'Human', '188', '84', '41.9BBY', '/images/characters/677f8e98b28db.png'),
(51, 19, 'Qui-Gon Jinn', 'Human', '193', '89', '92BBY', '/images/characters/677f8fc3ef8f3.png'),
(52, 29, 'Nute Gunray', 'Neimodian', '191', '90', 'unknown', '/images/characters/677f901f46262.png'),
(53, 24, 'Finis Valorum', 'Human', '170', 'unknown', '91BBY', '/images/characters/677f93642eef8.jpg'),
(54, 7, 'Padmé Amidala', 'Human', '185', '45', '46BBY', '/images/characters/677f945005781.png'),
(55, 7, 'Jar Jar Binks', 'Gungan', '196', '66', '52BBY', '/images/characters/677f95a66e8ef.png'),
(56, 7, 'Roos Tarpals', 'Gungan', '224', '82', 'unknown', '/images/characters/6786402d79371.png'),
(57, 7, 'Rugor Nass', 'Gungan', '206', 'unknown', 'unknown', '/images/characters/6786403d61a1b.png'),
(58, 7, 'Ric Olié', 'Human', '183', 'unknown', 'unknown', '/images/characters/678643ac5c579.png'),
(59, 30, 'Watto', 'Toydarian', '137', 'unknown', 'unknown', '/images/characters/677f9a6eb2f0e.png'),
(60, 31, 'Sebulba', 'Dug', '112', '40', 'unknown', '/images/characters/677f9ad634024.png'),
(61, 7, 'Quarsh Panaka', 'Human', '183', 'unknown', '62BBY', '/images/characters/6786408fb2e2c.png'),
(62, 4, 'Shmi Skywalker', 'Human', '163', 'unknown', '72BBY', '/images/characters/6786451d2481b.png'),
(63, 32, 'Darth Maul', 'Zabrak', '175', '80', '54BBY', '/images/characters/677f9cb828c65.png'),
(64, 28, 'Ayla Secura', 'Twi\'lek', '178', '55', '48BBY', '/images/characters/677f9d40bf96e.png'),
(65, 33, 'Ratts Tyerel', 'Aleena', '79', '15', 'unknown', '/images/characters/678639b58afd5.png'),
(66, 34, 'Dud Bolt', 'Vulptereen', '94', '45', 'unknown', '/images/characters/67863ef9364e2.png'),
(67, 35, 'Gasgano', 'Xexto', '122', 'unknown', 'unknown', '/images/characters/677fb4315cf05.jpg'),
(68, 36, 'Ben Quadinaros', 'Toong', '163', '65', 'unknown', '/images/characters/678640b5c33c5.png'),
(69, 37, 'Mace Windu', 'Human', '188', '84', '72BBY', '/images/characters/677fb4bd3e1a1.png'),
(70, 38, 'Ki-Adi-Mundi', 'Cerean', '198', '82', '92BBY', '/images/characters/677fb4e176345.png'),
(71, 39, 'Kit Fisto', 'Nautolan', '196', '87', 'unknown', '/images/characters/677fb4f32380e.png'),
(72, 40, 'Eeth Koth', 'Zabrak', '171', 'unknown', 'unknown', '/images/characters/678638d4561cd.png'),
(73, 24, 'Adi Gallia', 'Tholothian', '184', '50', 'unknown', '/images/characters/6786379ae29b9.png'),
(74, 41, 'Saesee Tiin', 'Iktotchi', '188', 'unknown', 'unknown', '/images/characters/6782523d0c967.jpg'),
(75, 42, 'Yarael Poof', 'Quermian', '264', 'unknown', 'unknown', '/images/characters/6782524d22fdb.jpg'),
(76, 43, 'Plo Koon', 'Kel Dor', '188', '80', '22BBY', '/images/characters/6782525b72878.jpg'),
(77, 44, 'Mas Amedda', 'Chagrian', '196', 'unknown', 'unknown', '/images/characters/6787676f9a2d6.png'),
(78, 7, 'Gregar Typho', 'Human', '185', '85', 'unknown', '/images/characters/678252800be83.jpg'),
(79, 7, 'Cordé', 'Unknown', '157', 'unknown', 'unknown', '/images/characters/678252984b5a0.jpg'),
(80, 4, 'Cliegg Lars', 'Human', '183', 'unknown', '82BBY', '/images/characters/67876abee20ad.png'),
(81, 45, 'Poggle the Lesser', 'Geonosian', '183', '80', 'unknown', '/images/characters/678252f47273d.png'),
(82, 46, 'Luminara Unduli', 'Mirialan', '170', '56.2', '58BBY', '/images/characters/6782537f3eb29.png'),
(83, 46, 'Barriss Offee', 'Mirialan', '166', '50', '40BBY', '/images/characters/67876590649cb.png'),
(84, 7, 'Dormé', 'Human', '165', 'unknown', 'unknown', '/images/characters/67876bc8a3be3.png'),
(85, 47, 'Dooku', 'Human', '193', '80', '102BBY', '/images/characters/678000ccb8273.png'),
(86, 5, 'Bail Prestor Organa', 'Human', '191', 'unknown', '67BBY', '/images/characters/67876098378a8.png'),
(87, 48, 'Jango Fett', 'Human', '183', '79', '66BBY', '/images/characters/678761bc3ba57.png'),
(88, 49, 'Zam Wesell', 'Clawdite', '168', '55', 'unknown', '/images/characters/67824ad62d6b8.png'),
(89, 50, 'Dexter Jettster', 'Besalisk', '198', '102', 'unknown', '/images/characters/6787607eca5b9.png'),
(90, 20, 'Lama Su', 'Kaminoan', '229', '88', 'unknown', '/images/characters/67824c4d042fc.png'),
(91, 20, 'Taun We', 'Kaminoan', '213', 'unknown', 'unknown', '/images/characters/678769ca5d7b1.png'),
(92, 24, 'Jocasta Nu', 'Human', '167', 'unknown', 'unknown', '/images/characters/67824cf6f052c.png'),
(93, 19, 'R4-P17', 'Unknown', '96', 'unknown', 'unknown', '/images/characters/6787623011252.png'),
(94, 51, 'Wat Tambor', 'Skakoan', '193', '48', 'unknown', '/images/characters/6787693677ae2.png'),
(95, 52, 'San Hill', 'Muun', '191', 'unknown', 'unknown', '/images/characters/678768888df39.png'),
(96, 53, 'Shaak Ti', 'Togruta', '178', '57', 'unknown', '/images/characters/67877679be557.png'),
(97, 54, 'Sly Moore', 'Unknown', '178', '48', 'unknown', '/images/characters/6787655f79ff1.png'),
(98, 61, 'Grievous', 'Kaleesh', '216', '159', 'unknown', '/images/characters/678001c8252bf.png'),
(99, 10, 'Tarfful', 'Wookiee', '234', '136', 'unknown', '/images/characters/67877776cb29e.png'),
(100, 55, 'Tion Medon', 'Pau\'an', '206', '80', 'unknown', '/images/characters/6782a457698c1.png'),
(101, 19, 'Finn', 'Human', 'unknown', 'unknown', 'unknown', '/images/characters/6782a55158819.png'),
(102, 19, 'Rey', 'Human', 'unknown', 'unknown', 'unknown', '/images/characters/678001f7b5e6d.png'),
(103, 19, 'Poe Dameron', 'Human', 'unknown', 'unknown', 'unknown', '/images/characters/6782a6017fa9f.png'),
(104, 19, 'BB8', 'Droid', 'none', 'unknown', 'unknown', '/images/characters/6780022f72851.png'),
(105, 19, 'Captain Phasma', 'Human', 'none', 'unknown', 'unknown', '/images/characters/678777e30a089.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `character_starships`
--

CREATE TABLE `character_starships` (
  `character_id` int(11) NOT NULL,
  `starships_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `character_starships`
--

INSERT INTO `character_starships` (`character_id`, `starships_id`) VALUES
(19, 15),
(19, 17),
(22, 16),
(27, 15),
(28, 18),
(28, 19),
(28, 20),
(28, 21),
(28, 22),
(30, 13),
(30, 17),
(31, 13),
(31, 17),
(34, 15),
(35, 15),
(39, 25),
(42, 13),
(46, 28),
(48, 13),
(50, 19),
(50, 21),
(50, 32),
(54, 20),
(54, 32),
(54, 35),
(58, 33),
(63, 34),
(76, 18),
(78, 32),
(98, 22),
(103, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20250106105814', '2025-01-08 11:43:31', 1456),
('DoctrineMigrations\\Version20250107114710', '2025-01-08 11:43:33', 85),
('DoctrineMigrations\\Version20250117092519', '2025-01-17 10:33:14', 300);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `episode_id` int(11) NOT NULL,
  `opening_crawl` longtext NOT NULL,
  `director` varchar(255) NOT NULL,
  `producer` varchar(255) NOT NULL,
  `release_date` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `film`
--

INSERT INTO `film` (`id`, `title`, `episode_id`, `opening_crawl`, `director`, `producer`, `release_date`, `image`) VALUES
(2, 'A New Hope', 4, 'It is a period of civil war.Rebel spaceships, strikingfrom a hidden base, have wontheir first victory againstthe evil Galactic Empire.During the battle, Rebelspies managed to steal secretplans to the Empire\'sultimate weapon, the DEATHSTAR, an armored spacestation with enough powerto destroy an entire planet.Pursued by the Empire\'ssinister agents, PrincessLeia races home aboard herstarship, custodian of thestolen plans that can save herpeople and restorefreedom to the galaxy....', 'George Lucas', 'Gary Kurtz, Rick McCallum', '1977-05-25', '/images/films/677fb2eb018e1.jpg'),
(3, 'The Empire Strikes Back', 5, 'It is a dark time for the Rebellion. Although the DeathStar has been destroyed, Imperial troops have driven the Rebel forces from their hidden base and pursued them across the galaxy. Evading the dreaded Imperial Starfleet, a group of freedom fighters led by Luke Skywalkerhas established a new secret base on the remote ice world of Hoth. The evil lord Darth Vader, obsessed with finding young Skywalker, has dispatched thousands of remote probes intothe far reaches of space....', 'Irvin Kershner', 'Gary Kurtz, Rick McCallum', '1980-05-17', '/images/films/677fb30101c05.jpg'),
(4, 'Return of the Jedi', 6, 'Luke Skywalker has returned tohis home planet of Tatooine inan attempt to rescue hisfriend Han Solo from theclutches of the vile gangsterJabba the Hutt.Little does Luke know that theGALACTIC EMPIRE has secretlybegun construction on a newarmored space station evenmore powerful than the firstdreaded Death Star.When completed, this ultimateweapon will spell certain doomfor the small band of rebelsstruggling to restore freedomto the galaxy...', 'Richard Marquand', 'Howard G. Kazanjian, George Lucas, Rick McCallum', '1983-05-25', '/images/films/677fb32286a9f.jpg'),
(5, 'The Phantom Menace', 1, 'Turmoil has engulfed the Galactic Republic. The taxation of trade routes to outlying star systems is in dispute. Hoping to resolve the matter with a blockade of deadly battleships, the greedy Trade Federation has stopped all shipping to the small planet of Naboo. While the Congress of the Republic endlessly debates this alarming chain of events, the Supreme Chancellor has secretly dispatched two Jedi Knights, the guardians of peace and justice in the galaxy, to settle the conflict....', 'George Lucas', 'Rick McCallum', '1999-05-19', '/images/films/677fb29a57882.jpg'),
(6, 'Attack of the Clones', 2, 'There is unrest in the GalacticSenate. Several thousand solarsystems have declared theirintentions to leave the Republic.This separatist movement,under the leadership of themysterious Count Dooku, hasmade it difficult for the limitednumber of Jedi Knights to maintain peace and order in the galaxy.Senator Amidala, the formerQueen of Naboo, is returningto the Galactic Senate to voteon the critical issue of creatingan ARMY OF THE REPUBLICto assist the overwhelmedJedi....', 'George Lucas', 'Rick McCallum', '2002-05-16', '/images/films/677fb2ad70479.jpg'),
(7, 'Revenge of the Sith', 3, 'War! The Republic is crumblingunder attacks by the ruthlessSith Lord, Count Dooku.There are heroes on both sides.Evil is everywhere.In a stunning move, thefiendish droid leader, GeneralGrievous, has swept into theRepublic capital and kidnappedChancellor Palpatine, leader ofthe Galactic Senate.As the Separatist Droid Armyattempts to flee the besiegedcapital with their valuablehostage, two Jedi Knights lead adesperate mission to rescue thecaptive Chancellor....', 'George Lucas', 'Rick McCallum', '2005-05-19', '/images/films/677fb2c54ffb0.jpg'),
(8, 'The Force Awakens', 7, 'Luke Skywalker has vanished. In his absence, the sinister FIRST ORDER has risen from the ashes of the Empire and will not rest until Skywalker, the last Jedi, has been destroyed. With the support of the REPUBLIC, General Leia Organa leads a brave RESISTANCE. She is desperate to find her brother Luke and gain his help in restoring peace and justice to the galaxy. Leia has sent her most daring pilot on a secret mission to Jakku, where an old ally has discovered a clue to Luke\'s where abouts....', 'J. J. Abrams', 'Kathleen Kennedy, J. J. Abrams, Bryan Burk', '2015-12-11', '/images/films/677ebfc72b159.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `film_character`
--

CREATE TABLE `film_character` (
  `film_id` int(11) NOT NULL,
  `character_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `film_character`
--

INSERT INTO `film_character` (`film_id`, `character_id`) VALUES
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(3, 19),
(3, 20),
(3, 21),
(3, 22),
(3, 23),
(3, 28),
(3, 30),
(3, 31),
(3, 34),
(3, 37),
(3, 38),
(3, 39),
(3, 40),
(3, 41),
(3, 42),
(3, 43),
(4, 19),
(4, 20),
(4, 21),
(4, 22),
(4, 23),
(4, 28),
(4, 30),
(4, 31),
(4, 33),
(4, 34),
(4, 37),
(4, 38),
(4, 39),
(4, 42),
(4, 44),
(4, 45),
(4, 46),
(4, 47),
(4, 48),
(4, 49),
(5, 20),
(5, 21),
(5, 28),
(5, 33),
(5, 37),
(5, 38),
(5, 49),
(5, 50),
(5, 51),
(5, 52),
(5, 53),
(5, 54),
(5, 55),
(5, 56),
(5, 57),
(5, 58),
(5, 59),
(5, 60),
(5, 61),
(5, 62),
(5, 63),
(5, 64),
(5, 65),
(5, 66),
(5, 67),
(5, 68),
(5, 69),
(5, 70),
(5, 71),
(5, 72),
(5, 73),
(5, 74),
(5, 75),
(5, 76),
(5, 77),
(6, 20),
(6, 21),
(6, 24),
(6, 25),
(6, 28),
(6, 37),
(6, 38),
(6, 39),
(6, 50),
(6, 52),
(6, 54),
(6, 55),
(6, 59),
(6, 62),
(6, 64),
(6, 69),
(6, 70),
(6, 71),
(6, 76),
(6, 77),
(6, 78),
(6, 79),
(6, 80),
(6, 81),
(6, 82),
(6, 83),
(6, 84),
(6, 85),
(6, 86),
(6, 87),
(6, 88),
(6, 89),
(6, 90),
(6, 91),
(6, 92),
(6, 93),
(6, 94),
(6, 95),
(6, 96),
(6, 97),
(7, 19),
(7, 20),
(7, 21),
(7, 22),
(7, 23),
(7, 24),
(7, 25),
(7, 28),
(7, 29),
(7, 30),
(7, 36),
(7, 37),
(7, 38),
(7, 50),
(7, 52),
(7, 54),
(7, 64),
(7, 69),
(7, 70),
(7, 71),
(7, 72),
(7, 73),
(7, 74),
(7, 76),
(7, 81),
(7, 82),
(7, 85),
(7, 86),
(7, 93),
(7, 96),
(7, 97),
(7, 98),
(7, 99),
(7, 100),
(8, 19),
(8, 21),
(8, 23),
(8, 30),
(8, 31),
(8, 44),
(8, 101),
(8, 102),
(8, 103),
(8, 104),
(8, 105);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `film_planet`
--

CREATE TABLE `film_planet` (
  `film_id` int(11) NOT NULL,
  `planet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `film_planet`
--

INSERT INTO `film_planet` (`film_id`, `planet_id`) VALUES
(2, 4),
(2, 5),
(2, 6),
(3, 15),
(3, 16),
(3, 17),
(3, 18),
(4, 4),
(4, 7),
(4, 16),
(4, 23),
(4, 24),
(5, 4),
(5, 7),
(5, 24),
(6, 4),
(6, 7),
(6, 20),
(6, 24),
(6, 45),
(7, 4),
(7, 5),
(7, 7),
(7, 10),
(7, 16),
(7, 24),
(7, 29),
(7, 55),
(7, 56),
(7, 57),
(7, 58),
(7, 59),
(7, 60),
(8, 62);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `film_starships`
--

CREATE TABLE `film_starships` (
  `film_id` int(11) NOT NULL,
  `starships_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `film_starships`
--

INSERT INTO `film_starships` (`film_id`, `starships_id`) VALUES
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(3, 10),
(3, 13),
(3, 14),
(3, 15),
(3, 17),
(3, 23),
(3, 24),
(3, 25),
(3, 26),
(4, 9),
(4, 10),
(4, 13),
(4, 14),
(4, 15),
(4, 17),
(4, 23),
(4, 24),
(4, 26),
(4, 27),
(4, 28),
(4, 29),
(5, 30),
(5, 31),
(5, 32),
(5, 33),
(5, 34),
(6, 18),
(6, 25),
(6, 31),
(6, 32),
(6, 35),
(6, 36),
(6, 37),
(6, 38),
(6, 39),
(7, 9),
(7, 18),
(7, 19),
(7, 20),
(7, 21),
(7, 22),
(7, 31),
(7, 40),
(7, 41),
(7, 42),
(7, 43),
(7, 44),
(8, 13),
(8, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planet`
--

CREATE TABLE `planet` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `population` varchar(255) NOT NULL,
  `climate` varchar(255) DEFAULT NULL,
  `orbital_period` varchar(255) DEFAULT NULL,
  `rotation_period` varchar(255) DEFAULT NULL,
  `terrain` varchar(255) DEFAULT NULL,
  `gravity` varchar(255) DEFAULT NULL,
  `diameter` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `planet`
--

INSERT INTO `planet` (`id`, `name`, `population`, `climate`, `orbital_period`, `rotation_period`, `terrain`, `gravity`, `diameter`, `image`) VALUES
(4, 'Tatooine', '200000', 'arid', '304', '23', 'desert', '1 standard', '10465', '/images/planets/6784bbc19e68a.png'),
(5, 'Alderaan', '2000000000', 'temperate', '364', '24', 'grasslands, mountains', '1 standard', '12500', '/images/planets/6784bc317f70b.png'),
(6, 'Yavin IV', '1000', 'temperate, tropical', '4818', '24', 'jungle, rainforests', '1 standard', '10200', '/images/planets/6784bcb2eaeaf.png'),
(7, 'Naboo', '4500000000', 'temperate', '312', '26', 'grassy hills, swamps, forests, mountains', '1 standard', '12120', '/images/planets/6784bcd801f11.png'),
(8, 'Stewjon', 'unknown', 'temperate', 'unknown', 'unknown', 'grass', '1 standard', '0', NULL),
(9, 'Eriadu', '22000000000', 'polluted', '360', '24', 'cityscape', '1 standard', '13490', '/images/planets/6784bda5abbde.png'),
(10, 'Kashyyyk', '45000000', 'tropical', '381', '26', 'jungle, forests, lakes, rivers', '1 standard', '12765', '/images/planets/6784bdb4516d6.png'),
(11, 'Corellia', '3000000000', 'temperate', '329', '25', 'plains, urban, hills, forests', '1 standard', '11000', '/images/planets/6784bdc5c151b.png'),
(12, 'Rodia', '1300000000', 'hot', '305', '29', 'jungles, oceans, urban, swamps', '1 standard', '7549', '/images/planets/6784bdd293dd9.png'),
(13, 'Nal Hutta', '7000000000', 'temperate', '413', '87', 'urban, oceans, swamps, bogs', '1 standard', '12150', '/images/planets/6784be0535dfb.png'),
(14, 'Bestine IV', '62000000', 'temperate', '680', '26', 'rocky islands, oceans', 'unknown', '6400', '/images/planets/6788c7d361f1f.png'),
(15, 'Hoth', 'unknown', 'frozen', '549', '23', 'tundra, ice caves, mountain ranges', '1.1 standard', '7200', '/images/planets/6784be21653cf.png'),
(16, 'Dagobah', 'unknown', 'murky', '341', '23', 'swamp, jungles', 'N/A', '8900', '/images/planets/6784e4fe0f92b.png'),
(17, 'Bespin', '6000000', 'temperate', '5110', '12', 'gas giant', '1.5 (surface), 1 standard (Cloud City)', '118000', '/images/planets/6784be502c83f.png'),
(18, 'Ord Mantell', '4000000000', 'temperate', '334', '26', 'plains, seas, mesas', '1 standard', '14050', '/images/planets/6784be5ec0e8b.png'),
(19, 'unknown', 'unknown', 'unknown', '0', '0', 'unknown', 'unknown', '0', NULL),
(20, 'Kamino', '1000000000', 'temperate', '463', '27', 'ocean', '1 standard', '19720', '/images/planets/6784bfa8f2fba.png'),
(21, 'Trandosha', '42000000', 'arid', '371', '25', 'mountains, seas, grasslands, deserts', '0.62 standard', '0', '/images/planets/6788cea360f1f.png'),
(22, 'Socorro', '300000000', 'arid', '326', '20', 'deserts, mountains', '1 standard', '0', '/images/planets/6784c10f9aad2.jpg'),
(23, 'Endor', '30000000', 'temperate', '402', '18', 'forests, mountains, lakes', '0.85 standard', '4900', '/images/planets/6788d0527f37c.png'),
(24, 'Coruscant', '1000000000000', 'temperate', '368', '24', 'cityscape, mountains', '1 standard', '12240', '/images/planets/6784c13ea5a6b.png'),
(25, 'Mon Cala', '27000000000', 'temperate', '398', '21', 'oceans, reefs, islands', '1', '11030', '/images/planets/6784c14b5ce16.png'),
(26, 'Chandrila', '1200000000', 'temperate', '368', '20', 'plains, forests', '1', '13500', '/images/planets/6784c15880257.png'),
(27, 'Sullust', '18500000000', 'superheated', '263', '20', 'mountains, volcanoes, rocky deserts', '1', '12780', '/images/planets/6784c165d7f8e.png'),
(28, 'Ryloth', '1500000000', 'temperate, arid, subartic', '305', '30', 'mountains, valleys, deserts, tundra', '1', '10600', '/images/planets/6788c800821ab.png'),
(29, 'Cato Neimoidia', '10000000', 'temperate, moist', '278', '25', 'mountains, fields, forests, rock arches', '1 standard', '0', '/images/planets/6784e5836fdf3.png'),
(30, 'Toydaria', '11000000', 'temperate', '184', '21', 'swamps, lakes', '1', '7900', '/images/planets/6784c319bf1b2.png'),
(31, 'Malastare', '2000000000', 'arid, temperate, tropical', '201', '26', 'swamps, deserts, jungles, mountains', '1.56', '18880', '/images/planets/6784c3287d359.png'),
(32, 'Dathomir', '5200', 'temperate', '491', '24', 'forests, deserts, savannas', '0.9', '10480', '/images/planets/6788ce5688b2a.png'),
(33, 'Aleen Minor', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', '/images/planets/6788c9ef15c6b.png'),
(34, 'Vulpter', '421000000', 'temperate, artic', '391', '22', 'urban, barren', '1', '14900', '/images/planets/6784c7f1e9659.png'),
(35, 'Troiken', 'unknown', 'unknown', 'unknown', 'unknown', 'desert, tundra, rainforests, mountains', 'unknown', 'unknown', '/images/planets/6784ca76a4bb6.png'),
(36, 'Tund', '0', 'unknown', '1770', '48', 'barren, ash', 'unknown', '12190', '/images/planets/6784cc845771c.png'),
(37, 'Haruun Kal', '705300', 'temperate', '383', '25', 'toxic cloudsea, plateaus, volcanoes', '0.98', '10120', '/images/planets/6784ccf5e6987.png'),
(38, 'Cerea', '450000000', 'temperate', '386', '27', 'verdant', '1', 'unknown', '/images/planets/6784cd2335261.png'),
(39, 'Glee Anselm', '500000000', 'tropical, temperate', '206', '33', 'lakes, islands, swamps, seas', '1', '15600', '/images/planets/6788ca0a03e6c.png'),
(40, 'Iridonia', 'unknown', 'unknown', '413', '29', 'rocky canyons, acid pools', 'unknown', 'unknown', '/images/planets/6784cdbb009bc.png'),
(41, 'Iktotch', 'unknown', 'arid, rocky, windy', '481', '22', 'rocky', '1', 'unknown', '/images/planets/6788ca20c6674.png'),
(42, 'Quermia', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', '/images/planets/6788c9b223a4e.png'),
(43, 'Dorin', 'unknown', 'temperate', '409', '22', 'unknown', '1', '13400', '/images/planets/6788cdce4860f.png'),
(44, 'Champala', '3500000000', 'temperate', '318', '27', 'oceans, rainforests, plateaus', '1', 'unknown', '/images/planets/6784cf82ebd29.png'),
(45, 'Geonosis', '100000000000', 'temperate, arid', '256', '30', 'rock, desert, mountain, barren', '0.9 standard', '11370', '/images/planets/6784e8e88867d.png'),
(46, 'Mirial', 'unknown', 'unknown', 'unknown', 'unknown', 'deserts', 'unknown', 'unknown', '/images/planets/6784d21fe9a14.png'),
(47, 'Serenno', 'unknown', 'unknown', 'unknown', 'unknown', 'rainforests, rivers, mountains', 'unknown', 'unknown', '/images/planets/6784d2c08c5e4.png'),
(48, 'Concord Dawn', 'unknown', 'unknown', 'unknown', 'unknown', 'jungles, forests, deserts', 'unknown', 'unknown', '/images/planets/6788d527ad2ee.png'),
(49, 'Zolan', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', '/images/planets/6784d430f2d96.png'),
(50, 'Ojom', '500000000', 'frigid', 'unknown', 'unknown', 'oceans, glaciers', 'unknown', 'unknown', '/images/planets/6784d538767b8.png'),
(51, 'Skako', '500000000000', 'temperate', '384', '27', 'urban, vines', '1', 'unknown', '/images/planets/6788cb5abe8a6.png'),
(52, 'Muunilinst', '5000000000', 'temperate', '412', '28', 'plains, forests, hills, mountains', '1', '13800', '/images/planets/6784d6f4abc36.png'),
(53, 'Shili', 'unknown', 'temperate', 'unknown', 'unknown', 'cities, savannahs, seas, plains', '1', 'unknown', '/images/planets/6784d76343c31.png'),
(54, 'Umbara', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', '/images/planets/6784dd2c744b9.png'),
(55, 'Utapau', '95000000', 'temperate, arid, windy', '351', '27', 'scrublands, savanna, canyons, sinkholes', '1 standard', '12900', '/images/planets/6784dd39a18bf.png'),
(56, 'Mustafar', '20000', 'hot', '412', '36', 'volcanoes, lava rivers, mountains, caves', '1 standard', '4200', '/images/planets/6784dd455efd5.png'),
(57, 'Polis Massa', '1000000', 'artificial temperate', '590', '24', 'airless asteroid', '0.56 standard', '0', '/images/planets/6784ddc19fcd9.png'),
(58, 'Mygeeto', '19000000', 'frigid', '167', '12', 'glaciers, mountains, ice canyons', '1 standard', '10088', '/images/planets/6784ddff6504a.png'),
(59, 'Felucia', '8500000', 'hot, humid', '231', '34', 'fungus forests', '0.75 standard', '9100', '/images/planets/6784de8157169.png'),
(60, 'Saleucami', '1400000000', 'hot', '392', '26', 'caves, desert, mountains, volcanoes', 'unknown', '14920', '/images/planets/6784e0c482db9.png'),
(61, 'Kalee', '4000000000', 'arid, temperate, tropical', '378', '23', 'rainforests, cliffs, canyons, seas', '1', '13850', '/images/planets/6788cd01cc61b.png'),
(62, 'Jakku', 'unknown', 'unknown', 'unknown', 'unknown', 'deserts', 'unknown', 'unknown', '/images/planets/6788cd1612702.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `starships`
--

CREATE TABLE `starships` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `cost_in_credits` varchar(255) NOT NULL,
  `max_atmosphering_speed` varchar(255) NOT NULL,
  `passengers` varchar(255) NOT NULL,
  `cargo_capacity` varchar(255) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `length` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `starships`
--

INSERT INTO `starships` (`id`, `name`, `model`, `cost_in_credits`, `max_atmosphering_speed`, `passengers`, `cargo_capacity`, `manufacturer`, `length`, `image`) VALUES
(9, 'CR90 corvette', 'CR90 corvette', '3500000', '950', '600', '3000000', 'Corellian Engineering Corporation', '150', '/images/starships/67861002e13b6.png'),
(10, 'Star Destroyer', 'Imperial I-class Star Destroyer', '150000000', '975', 'n/a', '36000000', 'Kuat Drive Yards', '1,600', '/images/starships/678610f68191e.png'),
(11, 'Sentinel-class landing craft', 'Sentinel-class landing craft', '240000', '1000', '75', '180000', 'Sienar Fleet Systems, Cyngus Spaceworks', '38', '/images/starships/6786108442bff.png'),
(12, 'Death Star', 'DS-1 Orbital Battle Station', '1000000000000', 'n/a', '843,342', '1000000000000', 'Imperial Department of Military Research, Sienar Fleet Systems', '120000', '/images/starships/67861098da1f1.png'),
(13, 'Millennium Falcon', 'YT-1300 light freighter', '100000', '1050', '6', '100000', 'Corellian Engineering Corporation', '34.37', '/images/starships/67861117561c3.png'),
(14, 'Y-wing', 'BTL Y-wing', '134999', '1000km', '0', '110', 'Koensayr Manufacturing', '14', '/images/starships/6786112509f81.png'),
(15, 'X-wing', 'T-65 X-wing', '149999', '1050', '0', '110', 'Incom Corporation', '12.5', '/images/starships/6786113727c6b.png'),
(16, 'TIE Advanced x1', 'Twin Ion Engine Advanced x1', 'unknown', '1200', '0', '150', 'Sienar Fleet Systems', '9.2', '/images/starships/6786115a18a76.png'),
(17, 'Imperial shuttle', 'Lambda-class T-4a shuttle', '240000', '850', '20', '80000', 'Sienar Fleet Systems', '20', '/images/starships/67861166010de.png'),
(18, 'Jedi starfighter', 'Delta-7 Aethersprite-class interceptor', '180000', '1150', '0', '60', 'Kuat Systems Engineering', '8', '/images/starships/678611724a4ea.png'),
(19, 'Trade Federation cruiser', 'Providence-class carrier/destroyer', '125000000', '1050', '48247', '50000000', 'Rendili StarDrive, Free Dac Volunteers Engineering corps.', '1088', '/images/starships/6786118289c88.png'),
(20, 'Naboo star skiff', 'J-type star skiff', 'unknown', '1050', '3', 'unknown', 'Theed Palace Space Vessel Engineering Corps/Nubia Star Drives, Incorporated', '29.2', '/images/starships/67861192b4098.png'),
(21, 'Jedi Interceptor', 'Eta-2 Actis-class light interceptor', '320000', '1500', '0', '60', 'Kuat Systems Engineering', '5.47', '/images/starships/6786119f013f8.png'),
(22, 'Belbullab-22 starfighter', 'Belbullab-22 starfighter', '168000', '1100', '0', '140', 'Feethan Ottraw Scalable Assemblies', '6.71', '/images/starships/678611ace8e22.png'),
(23, 'Executor', 'Executor-class star dreadnought', '1143350000', 'n/a', '38000', '250000000', 'Kuat Drive Yards, Fondor Shipyards', '19000', '/images/starships/6786130b50944.png'),
(24, 'Rebel transport', 'GR-75 medium transport', 'unknown', '650', '90', '19000000', 'Gallofree Yards, Inc.', '90', '/images/starships/6786131800680.png'),
(25, 'Slave 1', 'Firespray-31-class patrol and attack', 'unknown', '1000', '6', '70000', 'Kuat Systems Engineering', '21.5', '/images/starships/678613236783b.png'),
(26, 'EF76 Nebulon-B escort frigate', 'EF76 Nebulon-B escort frigate', '8500000', '800', '75', '6000000', 'Kuat Drive Yards', '300', '/images/starships/6786133092b1c.png'),
(27, 'Calamari Cruiser', 'MC80 Liberty type Star Cruiser', '104000000', 'n/a', '1200', 'unknown', 'Mon Calamari shipyards', '1200', '/images/starships/6786133c9fc38.png'),
(28, 'A-wing', 'RZ-1 A-wing Interceptor', '175000', '1300', '0', '40', 'Alliance Underground Engineering, Incom Corporation', '9.6', '/images/starships/67861351b04f9.png'),
(29, 'B-wing', 'A/SF-01 B-wing starfighter', '220000', '950', '0', '45', 'Slayn & Korpil', '16.9', '/images/starships/678613614094f.png'),
(30, 'Republic Cruiser', 'Consular-class cruiser', 'unknown', '900', '16', 'unknown', 'Corellian Engineering Corporation', '115', '/images/starships/67861372e0b0e.png'),
(31, 'Droid control ship', 'Lucrehulk-class Droid Control Ship', 'unknown', 'n/a', '139000', '4000000000', 'Hoersch-Kessel Drive, Inc.', '3170', '/images/starships/678613e2afb8a.png'),
(32, 'Naboo fighter', 'N-1 starfighter', '200000', '1100', '0', '65', 'Theed Palace Space Vessel Engineering Corps', '11', '/images/starships/678613f40eb02.png'),
(33, 'Naboo Royal Starship', 'J-type 327 Nubian royal starship', 'unknown', '920', 'unknown', 'unknown', 'Theed Palace Space Vessel Engineering Corps, Nubia Star Drives', '76', '/images/starships/6786338de8c3b.png'),
(34, 'Scimitar', 'Star Courier', '55000000', '1180', '6', '2500000', 'Republic Sienar Systems', '26.5', '/images/starships/6786147216aa8.png'),
(35, 'H-type Nubian yacht', 'H-type Nubian yacht', 'unknown', '8000', 'unknown', 'unknown', 'Theed Palace Space Vessel Engineering Corps', '47.9', '/images/starships/6786147e62b8b.png'),
(36, 'J-type diplomatic barge', 'J-type diplomatic barge', '2000000', '2000', '10', 'unknown', 'Theed Palace Space Vessel Engineering Corps, Nubia Star Drives', '39', '/images/starships/6786148c5adb8.png'),
(37, 'AA-9 Coruscant freighter', 'Botajef AA-9 Freighter-Liner', 'unknown', 'unknown', '30000', 'unknown', 'Botajef Shipyards', '390', '/images/starships/6786149bed58f.png'),
(38, 'Republic Assault ship', 'Acclamator I-class assault ship', 'unknown', 'unknown', '16000', '11250000', 'Rothana Heavy Engineering', '752', '/images/starships/678614bbc1c82.png'),
(39, 'Solar Sailer', 'Punworcca 116-class interstellar sloop', '35700', '1600', '11', '240', 'Huppla Pasa Tisc Shipwrights Collective', '15.2', '/images/starships/678614c74795a.png'),
(40, 'Theta-class T-2c shuttle', 'Theta-class T-2c shuttle', '1000000', '2000', '16', '50000', 'Cygnus Spaceworks', '18.5', '/images/starships/678614d3b4654.png'),
(41, 'Republic attack cruiser', 'Senator-class Star Destroyer', '59000000', '975', '2000', '20000000', 'Kuat Drive Yards, Allanteen Six shipyards', '1137', '/images/starships/678614e2ba282.png'),
(42, 'Arc-170', 'Aggressive Reconnaissance-170 starfighte', '155000', '1000', '0', '110', 'Incom Corporation, Subpro Corporation', '14.5', '/images/starships/678614f2a94e4.png'),
(43, 'Banking clan frigte', 'Munificent-class star frigate', '57000000', 'unknown', 'unknown', '40000000', 'Hoersch-Kessel Drive, Inc, Gwori Revolutionary Industries', '825', '/images/starships/67861505ab749.png'),
(44, 'V-wing', 'Alpha-3 Nimbus-class V-wing starfighter', '102500', '1050', '0', '60', 'Kuat Systems Engineering', '7.9', '/images/starships/678615124d284.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `name`) VALUES
(1, 'darioAdmin@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$P2jaFkaa9To79mvPTDRrqOy2o5Hv7Exy58ELrn2Z0M6L8BqjwbTNC', 'Dario'),
(10, 'guestAdmin@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$gWrLF0B/eldizimU7Sk4m.wrnQ.YxhcEfhf9rFcuoMDssla25P3ei', 'guestAdmin'),
(11, 'guestAdmin2@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$1hvVfBx1dxoKLtmL9yKe.eBurD.4qT1bMvIxm8EFiNiqN.QPUgade', 'guestAdmin2'),
(12, 'guestUser@gmail.com', '[\"ROLE_USER\"]', '$2y$13$OYBF6Vl5JewCUphu3JbrDuMwkqwzjZ1SlBM9GObFIj81PQiCyuSD6', 'guestUser');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `character`
--
ALTER TABLE `character`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_937AB034A25E9820` (`planet_id`);

--
-- Indices de la tabla `character_starships`
--
ALTER TABLE `character_starships`
  ADD PRIMARY KEY (`character_id`,`starships_id`),
  ADD KEY `IDX_A93D1581136BE75` (`character_id`),
  ADD KEY `IDX_A93D1582AAF09FB` (`starships_id`);

--
-- Indices de la tabla `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `film_character`
--
ALTER TABLE `film_character`
  ADD PRIMARY KEY (`film_id`,`character_id`),
  ADD KEY `IDX_A7B6EE07567F5183` (`film_id`),
  ADD KEY `IDX_A7B6EE071136BE75` (`character_id`);

--
-- Indices de la tabla `film_planet`
--
ALTER TABLE `film_planet`
  ADD PRIMARY KEY (`film_id`,`planet_id`),
  ADD KEY `IDX_3E157AF567F5183` (`film_id`),
  ADD KEY `IDX_3E157AFA25E9820` (`planet_id`);

--
-- Indices de la tabla `film_starships`
--
ALTER TABLE `film_starships`
  ADD PRIMARY KEY (`film_id`,`starships_id`),
  ADD KEY `IDX_B90F2D50567F5183` (`film_id`),
  ADD KEY `IDX_B90F2D502AAF09FB` (`starships_id`);

--
-- Indices de la tabla `planet`
--
ALTER TABLE `planet`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `starships`
--
ALTER TABLE `starships`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `character`
--
ALTER TABLE `character`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de la tabla `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `planet`
--
ALTER TABLE `planet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `starships`
--
ALTER TABLE `starships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `character`
--
ALTER TABLE `character`
  ADD CONSTRAINT `FK_937AB034A25E9820` FOREIGN KEY (`planet_id`) REFERENCES `planet` (`id`);

--
-- Filtros para la tabla `character_starships`
--
ALTER TABLE `character_starships`
  ADD CONSTRAINT `FK_A93D1581136BE75` FOREIGN KEY (`character_id`) REFERENCES `character` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A93D1582AAF09FB` FOREIGN KEY (`starships_id`) REFERENCES `starships` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `film_character`
--
ALTER TABLE `film_character`
  ADD CONSTRAINT `FK_A7B6EE071136BE75` FOREIGN KEY (`character_id`) REFERENCES `character` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A7B6EE07567F5183` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `film_planet`
--
ALTER TABLE `film_planet`
  ADD CONSTRAINT `FK_3E157AF567F5183` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_3E157AFA25E9820` FOREIGN KEY (`planet_id`) REFERENCES `planet` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `film_starships`
--
ALTER TABLE `film_starships`
  ADD CONSTRAINT `FK_B90F2D502AAF09FB` FOREIGN KEY (`starships_id`) REFERENCES `starships` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B90F2D50567F5183` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
