-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 16 Mars 2019 à 16:59
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `twitter_med`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonne`
--

CREATE TABLE `abonne` (
  `id` int(11) NOT NULL,
  `id2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `abonne`
--

INSERT INTO `abonne` (`id`, `id2`) VALUES
(1, 2),
(3, 2),
(3, 1),
(1, 4),
(1, 8),
(11, 8),
(11, 4);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_comm` int(11) NOT NULL,
  `description` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_massage` int(11) NOT NULL,
  `description` text NOT NULL,
  `temps` datetime NOT NULL,
  `image` varchar(250) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id_massage`, `description`, `temps`, `image`, `id`) VALUES
(1, 'Aenean lacinia bibendum nulla sed consectetur. Vestibulum id ligula porta felis euismod semper. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2019-03-10 21:00:16', 'http://localhost/med_twitter/images/2.jpg\r\n', 1),
(2, 'Thank you to every single person who downloaded, streamed and listened to #sucker. This still feels like a dream, and the best part is is that itâ€™s just the beginning of this incredible new chapter. Thank you @Philymack we truly do have the best manager and team in the business!', '2019-03-11 10:31:31', 'http://localhost/med_twitter/status/8.jpg', 1),
(3, '#Trump thinking wind-powered electricity stops when the wind stops, perfectly sums up his pathetic understanding of the world. Then again, he doesnâ€™t sit at his desk unless thereâ€™s a camera on him, so...', '2019-03-11 11:37:21', 'http://localhost/med_twitter/status/cute_infant-wide.jpg', 3),
(4, 'se le armÃ³ una causa por PROXENETISMO a uno de un grupo kpop y hay mogÃ³licas q lo estÃ¡n defendiendo jfjskgjkskfjsjgk sÃ­ madre me imagino q debe ser re comÃºn q te acusen falsamente de prostituir minas cualquier trabajador se puede comer ese garrÃ³n', '2019-03-12 00:23:24', 'http://localhost/med_twitter/status/Simo Haram 20160111_202145.jpg', 3),
(5, '#Throwback to @yara_lb \'s last interview from #TheLuxuryNetworkUAE at #Dubai where she talked about her upcoming Lebanese/Egyption Album in addition to her other news â¤ Knowing that #Yara has been honoured under the category of Best Arabic Singer at the level of Arab world 2019', '2019-03-12 01:16:55', 'http://localhost/med_twitter/status/-1476908595.jpg', 4),
(6, 'gdjlqshbckjqnc', '2019-03-12 15:20:27', 'http://localhost/med_twitter/status/157142284.jpg', 11);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `nom2` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL,
  `background` varchar(250) NOT NULL,
  `abonne` int(11) NOT NULL,
  `twette` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `email`, `password`, `nom`, `nom2`, `image`, `background`, `abonne`, `twette`) VALUES
(1, 'medayoub.idrissi@gmail.com', '123456', 'MED AYOUB', '@_FREEWR', 'http://localhost/med_twitter/images/5.jpg', 'http://localhost/med_twitter/backgrounds/6.jpg', 0, 0),
(2, 'mostafa.bmk09@gmail.com', '123456', 'mostapha', '@_mostapha_85471232', 'http://localhost/med_twitter/images/7.jpg', 'http://localhost/med_twitter/backgrounds/3.jpg', 0, 0),
(3, 'fofo@gmail.com', '123456', 'fifo', '@_fifo', 'http://localhost/med_twitter/images/398600463.jpg', 'http://localhost/med_twitter/backgrounds/9.jpg', 0, 0),
(4, 'yassin@gmail.com', '123456', 'yass', '@_yass', 'http://localhost/med_twitter/images/210856030.jpg', 'http://localhost/med_twitter/backgrounds/1276018699.jpg', 0, 0),
(8, 'admin@gmail.com', '123456', 'Admin', '@_Admin', 'http://localhost/med_twitter/images/-218133775.jpg', 'http://localhost/med_twitter/backgrounds/2015-Yamaha-VMAX-Carbon-EU-Carbon-Action-003.jpg', 0, 0),
(10, 'soad@gmail.com', '123456', 'Souad', '@_Souad', 'http://localhost/med_twitter/images/-635364942.jpg', 'http://localhost/med_twitter/backgrounds/853819348.jpg', 0, 0),
(11, 'asma@gmail.com', '123456', 'asma', '@_asma', 'http://localhost/med_twitter/images/-1189453941.jpg', 'http://localhost/med_twitter/backgrounds/793587816.jpg', 0, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_comm`),
  ADD KEY `commentaire_utilisateur_FK` (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_massage`),
  ADD KEY `Message_utilisateur_FK` (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_comm` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_massage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_utilisateur_FK` FOREIGN KEY (`id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `Message_utilisateur_FK` FOREIGN KEY (`id`) REFERENCES `utilisateur` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
