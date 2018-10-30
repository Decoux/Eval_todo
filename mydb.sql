-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 30 Octobre 2018 à 09:30
-- Version du serveur :  5.7.24-0ubuntu0.16.04.1
-- Version de PHP :  7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mydb`
--

-- --------------------------------------------------------

--
-- Structure de la table `lists`
--

CREATE TABLE `lists` (
  `id` int(11) NOT NULL,
  `name_list` text,
  `deadline` date DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL,
  `projects_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `lists`
--

INSERT INTO `lists` (`id`, `name_list`, `deadline`, `delete`, `projects_id`, `users_id`) VALUES
(1, 'sdvfsqd', '0053-05-04', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name_project` varchar(255) DEFAULT NULL,
  `description_project` text,
  `deadline` date DEFAULT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `projects`
--

INSERT INTO `projects` (`id`, `name_project`, `description_project`, `deadline`, `categorie`, `delete`, `users_id`) VALUES
(1, 'sssssssssss', 'sss', '2018-11-01', 'php', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name_task` varchar(255) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `done` varchar(255) DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL,
  `lists_id` int(11) NOT NULL,
  `lists_projects_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tasks`
--

INSERT INTO `tasks` (`id`, `name_task`, `deadline`, `done`, `delete`, `lists_id`, `lists_projects_id`) VALUES
(1, 'ef', '0045-03-05', NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name_user` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name_user`, `email`, `pass`, `age`, `firstname`, `admin`) VALUES
(1, 'Decoux', 'decouxpaul1@gmail.com', '$2y$10$nzWM3p7HLUV08rSNrIBPzO.XH3fg975pSStU0ItkkiCb9ORmwx8qi', 2, 'Paul', NULL),
(2, 'Decoux', 'decoux.laurie@gmail.com', '$2y$10$gAgQtMWTyjoP6CUSHwF/CO3Oty70t5miQFxYl0g60uWFG0OD1tTUS', 29, 'Laurie', NULL),
(3, 'decoux2', 'decouxpaul0@gmail.com', '$2y$10$mgV9qk27cjS6wX7l.dFe0emRkjAUscIUClWO/3BeFLDLkgcDfuXWa', 2, 'Paul2', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`id`,`projects_id`),
  ADD KEY `fk_lists_projects_idx` (`projects_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Index pour la table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`,`users_id`),
  ADD KEY `fk_projects_users1_idx` (`users_id`);

--
-- Index pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`,`lists_id`,`lists_projects_id`),
  ADD KEY `fk_tasks_lists1_idx` (`lists_id`,`lists_projects_id`),
  ADD KEY `lists_projects_id` (`lists_projects_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `lists`
--
ALTER TABLE `lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `lists`
--
ALTER TABLE `lists`
  ADD CONSTRAINT `lists_ibfk_1` FOREIGN KEY (`projects_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`lists_id`) REFERENCES `lists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`lists_projects_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
