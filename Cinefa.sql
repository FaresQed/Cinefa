-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mer. 27 fév. 2019 à 06:39
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `Cinefa`
--

-- --------------------------------------------------------

--
-- Structure de la table `Actors`
--

CREATE TABLE `Actors` (
  `id_actor` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `gender` varchar(10) COLLATE utf8_bin NOT NULL,
  `age` int(11) NOT NULL,
  `portrait` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `Actors`
--

INSERT INTO `Actors` (`id_actor`, `name`, `gender`, `age`, `portrait`) VALUES
(1, 'Kristen Bell', 'F', 38, 'https://cdn.cliqueinc.com/cache/posts/255355/kristen-bell-parenting-tips-255355-1524177938560-main.700x0c.jpg'),
(5, 'Mandy Moore', 'F', 34, 'https://cdn.cliqueinc.com/cache/posts/235492/mandy-moore-new-face-of-garnier-235492-1505355741973-main.700x0c.jpg'),
(6, 'Jennifer Connelly', 'F', 48, 'https://cdn.celebyolo.com/jennifer-connelly-57123-display.jpg'),
(7, 'Jessica Rothe', 'F', 31, 'https://cdn.cliqueinc.com/cache/posts/237976/new-movie-actresses-fall-2017-237976-1507237617733-square.700x0c.jpg'),
(8, 'Cate Blanchett', 'F', 49, 'https://pixel.nymag.com/imgs/fashion/daily/2015/12/02/02-cate-blanchett.w700.h700.jpg'),
(9, 'Michael B. Jordan', 'M', 32, 'https://media1.popsugar-assets.com/files/thumbor/Nk6kAD1WUAIHzb4Nn2pgfVd49_0/fit-in/500x500/filters:format_auto-!!-:strip_icc-!!-/2015/03/18/050/n/1922398/94abb08c_edit_img_image_88_1422990433_MBJ.jpg'),
(10, 'Sylvester Stallone', 'M', 72, 'http://bzfilm.com/wp-content/uploads/2013/11/stallone-creed.jpg'),
(11, 'Tessa Thompson', 'F', 35, 'https://pixel.nymag.com/imgs/fashion/daily/2018/06/29/29-tessa-thompson.w700.h700.jpg'),
(12, 'James McAvoy', 'M', 39, 'https://jasmineshanelle.files.wordpress.com/2015/06/who-would-be-in-my-squad-james-mcavoy.jpg'),
(13, 'Bruce Willis', 'M', 63, 'https://pixel.nymag.com/imgs/daily/vulture/2018/07/16/bruce-willis/16-bruce-willis-roast-lede.w700.h700.jpg'),
(14, 'Samuel L. Jackson', 'M', 70, 'https://pixel.nymag.com/imgs/daily/vulture/2018/06/13/13-samuel-l-jackson.w700.h700.jpg'),
(15, 'Johnny Depp', 'M', 55, 'https://pixel.nymag.com/imgs/fashion/daily/2017/07/20/Johnny-Depp-.w700.h700.jpg'),
(16, 'Zoe Kravitz', 'F', 30, 'https://pixel.nymag.com/imgs/fashion/daily/2017/04/08/08-zoekravitz.w700.h700.jpeg'),
(17, 'Katherine Watherston', 'F', 38, 'https://akns-images.eonline.com/eol_images/Entire_Site/20181014/rs_600x600-181114042404-600-Katherine-Waterston-Fantasic-Beasts-Grindewald-London-LT-111418-GettyImages-1061365780.jpg?fit=around|700:700&crop=700:700;center,top&output-quality=90'),
(18, 'Amy Adams', 'F', 44, 'https://pixel.nymag.com/imgs/fashion/daily/2017/01/08/08-islafisher.w700.h700.jpeg'),
(19, 'Steve Carell', 'M', 56, 'https://akns-images.eonline.com/eol_images/Entire_Site/20181120/rs_600x600-181220191833-600-steve-carrell-siriusxm-me-122018.jpg?fit=around|700:700&crop=700:700;center,top&output-quality=90'),
(20, 'Sam Rockwell', 'M', 50, 'https://akns-images.eonline.com/eol_images/Entire_Site/201807/rs_600x600-180107180427-600.sam-rockwell-golden-globe-winner.jpg?fit=around|700:700&crop=700:700;center,top&output-quality=90'),
(21, 'Christian Bale', 'M', 45, 'https://cdn.celebyolo.com/christian-bale-75344-display.jpg'),
(22, 'Sofia Boutella', 'F', 36, 'https://cdn.cliqueinc.com/cache/posts/211052/sofia-boutella-style-211052-1481502034-square.700x0c.jpg'),
(24, 'Daniel Kaluuya', 'M', 29, 'https://pixel.nymag.com/imgs/fashion/daily/2018/03/06/06-daniel-kaluuya.w700.h700.jpg'),
(25, 'Allison Williams', 'F', 30, 'https://www.shape.com/sites/shape.com/files/styles/facebook_og_image/public/story/allison-williams-closeup-700_0.jpg'),
(26, 'Jaden Smith', 'M', 20, 'https://pixel.nymag.com/imgs/fashion/daily/2016/10/13/13-jaden-smith.w700.h700.jpg'),
(27, 'Will Smith', 'M', 50, 'https://pixel.nymag.com/imgs/daily/vulture/2017/10/17/17-will-smith.w700.h700.jpg'),
(28, 'Olivia DeJonge', 'F', 20, 'https://akimg0.ask.fm/assets2/123/633/189/888/normal/11820588_1041720155868825_438413730_n.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Actors`
--
ALTER TABLE `Actors`
  ADD PRIMARY KEY (`id_actor`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Actors`
--
ALTER TABLE `Actors`
  MODIFY `id_actor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
