-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 03 Octobre 2017 à 12:02
-- Version du serveur :  5.7.19-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_eval`
--

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE `projects` (
  `id_project` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `deadline` date NOT NULL,
  `id_project_type` int(11) NOT NULL,
  `project_state` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `projects`
--

INSERT INTO `projects` (`id_project`, `id_user`, `project_name`, `deadline`, `id_project_type`, `project_state`) VALUES
(1, 1, 'aaaa', '2017-11-11', 1, 1),
(2, 1, 'aaaaa', '2017-12-12', 2, 1),
(3, 1, 'aaaa', '2017-09-10', 4, 1),
(4, 1, 'Projet test deadline', '2017-09-30', 4, 1),
(5, 2, 'Nouveau projet', '2017-10-30', 2, 1),
(6, 2, 'nouveau projet 5459', '2018-10-20', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `project_steps`
--

CREATE TABLE `project_steps` (
  `id_step` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `step_name` varchar(255) NOT NULL,
  `step_state` tinyint(1) NOT NULL DEFAULT '0',
  `step_deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `project_steps`
--

INSERT INTO `project_steps` (`id_step`, `id_project`, `step_name`, `step_state`, `step_deadline`) VALUES
(2, 5, 'Test etape 2', 1, '2017-12-30'),
(4, 5, 'etape 2 projet5', 0, '2017-10-30'),
(5, 6, 'Etape 1 5459', 1, '2018-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `project_types`
--

CREATE TABLE `project_types` (
  `id_project_type` int(11) NOT NULL,
  `project_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `project_types`
--

INSERT INTO `project_types` (`id_project_type`, `project_type`) VALUES
(1, 'Maison individuelle'),
(2, 'Immeuble de bureau'),
(3, 'Immeuble de logement'),
(4, 'Gros oeuvre');

-- --------------------------------------------------------

--
-- Structure de la table `site_info`
--

CREATE TABLE `site_info` (
  `title` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `step_tasks`
--

CREATE TABLE `step_tasks` (
  `id_task` int(11) NOT NULL,
  `id_step` int(11) NOT NULL,
  `task_desc` varchar(255) NOT NULL,
  `task_state` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `step_tasks`
--

INSERT INTO `step_tasks` (`id_task`, `id_step`, `task_desc`, `task_state`) VALUES
(6, 2, 'Nouvelle tache', 0),
(9, 2, 'tache etape 1', 1),
(10, 2, 'tache 3 etape 1', 0),
(11, 4, 'tache 1 etape 2 projet 5', 1),
(12, 5, 'Nouvelle Tache 5459', 1),
(15, 5, 'test', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_rights` int(11) NOT NULL DEFAULT '2',
  `user_first_name` varchar(75) NOT NULL,
  `user_last_name` varchar(75) NOT NULL,
  `user_email` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `user_name`, `user_password`, `user_rights`, `user_first_name`, `user_last_name`, `user_email`) VALUES
(1, 'admin', '$2y$10$wGtQyTORXfAUodF9oexAheE2mhMcKTklaXxZukxDrKBrhcbOC.eOu', 2, 'Adam', 'Min', 'admin@ad.min'),
(2, 'testuser', '$2y$10$f7h7VrLiowlVAZw2uaVsxe0kI1r1fkHPkZHiQ5oyKqU075EuxVlPC', 2, 'Test', 'User', 'test@user.test'),
(3, 'testuser2', '$2y$10$E/QnNmNlY/iu7771wd9IvuTmWBH8wMinkbfsPRRhOZBgFZ51acAgy', 2, 'Test', 'Userr', 'test@test.hf');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_project_type` (`id_project_type`);

--
-- Index pour la table `project_steps`
--
ALTER TABLE `project_steps`
  ADD PRIMARY KEY (`id_step`),
  ADD KEY `id_project` (`id_project`);

--
-- Index pour la table `project_types`
--
ALTER TABLE `project_types`
  ADD PRIMARY KEY (`id_project_type`);

--
-- Index pour la table `step_tasks`
--
ALTER TABLE `step_tasks`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `id_step` (`id_step`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `projects`
--
ALTER TABLE `projects`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `project_steps`
--
ALTER TABLE `project_steps`
  MODIFY `id_step` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `project_types`
--
ALTER TABLE `project_types`
  MODIFY `id_project_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `step_tasks`
--
ALTER TABLE `step_tasks`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`id_project_type`) REFERENCES `project_types` (`id_project_type`) ON DELETE CASCADE;

--
-- Contraintes pour la table `project_steps`
--
ALTER TABLE `project_steps`
  ADD CONSTRAINT `project_steps_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id_project`) ON DELETE CASCADE;

--
-- Contraintes pour la table `step_tasks`
--
ALTER TABLE `step_tasks`
  ADD CONSTRAINT `step_tasks_ibfk_1` FOREIGN KEY (`id_step`) REFERENCES `project_steps` (`id_step`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
