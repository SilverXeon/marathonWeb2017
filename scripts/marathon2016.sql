-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Ven 25 Novembre 2016 à 08:23
-- Version du serveur :  5.5.38
-- Version de PHP :  5.5.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `marathon2016`
--

-- --------------------------------------------------------

--
-- Structure de la table `story_commentaire`
--

CREATE TABLE `story_commentaire` (
`id` int(11) NOT NULL,
  `texte` text NOT NULL,
  `datePost` datetime NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `idHistoire` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `story_commentaire`
---- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 30 Novembre 2016 à 14:16
-- Version du serveur :  5.6.28
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `marathon2016`
--

-- --------------------------------------------------------

--
-- Structure de la table `story_aime`
--

CREATE TABLE `story_aime` (
  `id` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `idHistoire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `story_aime`
--

INSERT INTO `story_aime` (`id`, `idUtilisateur`, `idHistoire`) VALUES
(1, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `story_commentaire`
--

CREATE TABLE `story_commentaire` (
  `id` int(11) NOT NULL,
  `texte` text NOT NULL,
  `datePost` datetime NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `idHistoire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `story_commentaire`
--

INSERT INTO `story_commentaire` (`id`, `texte`, `datePost`, `idUtilisateur`, `idHistoire`) VALUES
(1, 'j''adore ce que vous faites !', '2016-11-24 14:52:15', 3, 1),
(2, 'Merci beaucoup !', '2016-11-24 14:53:33', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `story_histoire`
--

CREATE TABLE `story_histoire` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `pitch` text NOT NULL,
  `creation` datetime NOT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `story_histoire`
--

INSERT INTO `story_histoire` (`id`, `titre`, `pitch`, `creation`, `idUtilisateur`) VALUES
(1, 'Ma journée aux oscars 2007', 'Cinéaste mondialement connu et réputé, réalisateur des Affranchis  comme de Raging Bull, avec Robert de Niro, Martin Scorsese raconte en cinq photos sa journée aux oscars, de son réveil à la remise des récompenses. Voici l’histoire de sa folle journée.', '2016-11-29 13:00:00', 2);

-- --------------------------------------------------------

--
-- Structure de la table `story_image`
--

CREATE TABLE `story_image` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `legende` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `idHistoire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `story_image`
--

INSERT INTO `story_image` (`id`, `titre`, `legende`, `url`, `idHistoire`) VALUES
(1, 'Réveil', 'Le sommeil est un territoire étrange, peuplé de rêves étonnants. Au réveil de cette matinée, je suis comme l’enfant que je n’ai jamais complètement cessé d’être, suspendu entre mes rêves les plus fous et la réalité qui arrive à grands coups de stridences électroniques par la voix du radio réveil, vestige d’un autre temps. Je n’ai jamais réussi à n’utiliser que mon téléphone pour me réveiller. J’aime cette lueur, déformée dans un brouillard rouge quand je n’ai pas mes lunettes.', 'assets/images/uploads/histoire1/histoire1_1.jpg', 1),
(2, 'Arrivée aux oscars', 'J’ai toujours détesté les récompenses, défendu des dizaines de cinéastes, de bluesmen oubliés en retraçant leur histoire dans mes documentaires mais avouons: Je n’ai pu m’empêcher de jouer le jeu, de commander un smoking. Je me sens à peu près autant à l’aise qu’un pingouin dans le désert de Gobi mais je joue le jeu, essayant de ne pas trop me crisper en souriant. J’ai bien senti que j’échouais en entendant le beuglement des photographes : « Relax, Martin. »', 'assets/images/uploads/histoire1/histoire1_2.jpg', 1),
(3, 'Yes, I can', 'J’ignorais moi-même à quel point cette récompense me ferait plaisir. J’ai souvent plaisanté sur les talents discutables du sculpteur mais je ne peux dissimuler ma joie. J’ai remercié avec une chaleur que je ne soupçonnais pas les magnats de l’industrie du cinéma, ceux qui ont estimé que ce film valait la récompense ultime. C’est tout le cinéma qui est récompensé. Ce n’est pas mon film le plus personnel : c’est celui qui reflète le plus mon amour du septième art. ', 'assets/images/uploads/histoire1/histoire1_3.jpg', 1),
(4, 'Merci Leo', 'J’ai vu Leo di Caprio sourire dans le public enthousiaste, de ce sourire éclatant et un brin carnassier qui me transperce. C’est un acteur d’une puissance incroyable qui peut absolument tout jouer, je le classe parmi les plus grands. Il a tellement su dépasser le mythe du jeune premier de Titanic que je ne comprends même pas pourquoi on lui en parle encore. Son amitié est indéfectible et il a su rester terriblement normal pour un acteur de sa renommée.', 'assets/images/uploads/histoire1/histoire1_4.jpg', 1),
(5, 'Le blues', 'Mais que vais je faire maintenant ?? A oui, un film magnifique sur Mélies !', 'assets/images/uploads/histoire1/histoire1_5.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `story_roles`
--

CREATE TABLE `story_roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(40) CHARACTER SET utf8 NOT NULL,
  `slug` varchar(40) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `story_roles`
--

INSERT INTO `story_roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Root', 'root', 'Use this account with extreme caution. When using this account it is possible to cause irreversible damage to the system.', '2016-06-04 23:48:00', '2016-06-04 23:48:00'),
(2, 'Administrator', 'administrator', 'Full access to create, edit, and update companies, and orders.', '2016-06-04 23:48:00', '2016-06-04 23:48:00'),
(3, 'Manager', 'manager', 'Ability to create new companies and orders, or edit and update any existing ones.', '2016-06-04 23:48:00', '2016-06-04 23:48:00'),
(4, 'Company Manager', 'company-manager', 'Able to manage the company that the user belongs to, including adding sites, creating new users and assigning licences.', '2016-06-04 23:48:00', '2016-06-04 23:48:00'),
(5, 'User', 'user', 'A standard user that can have a licence assigned to them. No administrative features.', '2016-06-04 23:48:00', '2016-06-04 23:48:00');

-- --------------------------------------------------------

--
-- Structure de la table `story_users`
--

CREATE TABLE `story_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` tinyint(4) UNSIGNED NOT NULL DEFAULT '0',
  `activation_code` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `story_users`
--

INSERT INTO `story_users` (`id`, `role_id`, `username`, `password`, `realname`, `email`, `active`, `activation_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '$2y$10$MZpxcVZpwTCCotIkkfPP5O1sDC7GiKzD9klh4MoM/aE44YaVm4Xga', 'Administrator', 'admin@novaframework.dev', 1, NULL, 'AwLf48zHSIXUJ3rKBAbC3UlAlYi8AKV1fwIbYn4aClBKEncr8xjxTMMvzxYe', '2016-06-03 08:15:00', '2016-11-30 13:15:37'),
(2, 5, 'scorsese', '$2y$10$j2eNSQE6TWaTrbK9kftqjOOLb6NiAAeb3EcTxbDWvNDu3nSfyU8RW', 'Martin Scorsese', 'scorsese@holywood.com', 1, NULL, 'Z8vEbgNHqJPAJa1Db1Umi3C4Kymu2OS4nhgH5QGBZR4JbNHxzsBXGoo3sNzL', '2016-11-24 13:35:42', '2016-11-30 13:12:08'),
(3, 5, 'fanmovie', '$2y$10$IfqNAKg561qb9r3C.aE0mep1OsKf20uDcmOfQhzLGndFNBe5dVz8i', 'fan movie', 'fan@wonderland.com', 1, NULL, NULL, '2016-11-24 13:37:24', '2016-11-24 13:37:24');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `story_aime`
--
ALTER TABLE `story_aime`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `story_commentaire`
--
ALTER TABLE `story_commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `story_histoire`
--
ALTER TABLE `story_histoire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `story_image`
--
ALTER TABLE `story_image`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `story_roles`
--
ALTER TABLE `story_roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `story_users`
--
ALTER TABLE `story_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `story_aime`
--
ALTER TABLE `story_aime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `story_commentaire`
--
ALTER TABLE `story_commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `story_histoire`
--
ALTER TABLE `story_histoire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `story_image`
--
ALTER TABLE `story_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `story_roles`
--
ALTER TABLE `story_roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `story_users`
--
ALTER TABLE `story_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

INSERT INTO `story_commentaire` (`id`, `texte`, `datePost`, `idUtilisateur`, `idHistoire`) VALUES
(1, 'j''adore ce que vous faites !', '2016-11-24 14:52:15', 3, 1),
(2, 'Merci beaucoup !', '2016-11-24 14:53:33', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `story_histoire`
--

CREATE TABLE `story_histoire` (
`id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `story_histoire`
--

INSERT INTO `story_histoire` (`id`, `titre`, `texte`, `idUtilisateur`) VALUES
(1, 'Ma journée aux oscars 2007', 'Ma folle journée aux oscars 2007. Première victoire avec les infiltrés. Gagner sur un remake, j''aurai pu faire mieux !!!\r\n', 2);

-- --------------------------------------------------------

--
-- Structure de la table `story_aime`
--

CREATE TABLE `story_aime` (
`id` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `idHistoire` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `story_aime`
--

INSERT INTO `story_aime` (`id`, `idUtilisateur`, `idHistoire`) VALUES
(1, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `story_photo`
--

CREATE TABLE `story_photo` (
`id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `moment` datetime NOT NULL,
  `titremoment` varchar(255) NOT NULL,
  `idHistoire` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `story_photo`
--

INSERT INTO `story_photo` (`id`, `titre`, `texte`, `url`, `moment`, `titremoment`, `idHistoire`) VALUES
(1, 'Réveil', 'Il est temps de se réveiller. Le stress monte...', 'assets/images/uploads/histoire1/histoire1_1.jpg', '2007-02-23 08:00:00', '8h00', 1),
(2, 'Arrivée aux oscars', 'Faut passer le tapis rouge, ne pas oublier de sourire, rester naturel', 'assets/images/uploads/histoire1/histoire1_2.jpg', '2007-02-23 18:00:00', '18h00', 1),
(3, 'Yes, I can', 'Ca y est, j''y suis arrivé !! Premier oscar en 30 ans de carrière', 'assets/images/uploads/histoire1/histoire1_3.jpg', '2007-02-23 21:00:00', '21h00', 1),
(4, 'Merci Leo', 'Leo a l''air ravi lui aussi', 'assets/images/uploads/histoire1/histoire1_4.jpg', '2007-02-23 21:05:00', '21h05', 1),
(5, 'Le blues', 'Mais que vais je faire maintenant ?? A oui, un film magnifique sur Mélies !', 'assets/images/uploads/histoire1/histoire1_5.jpg', '2007-02-24 00:05:00', '00h05', 1);

-- --------------------------------------------------------

--
-- Structure de la table `story_roles`
--

CREATE TABLE `story_roles` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(40) CHARACTER SET utf8 NOT NULL,
  `slug` varchar(40) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `story_roles`
--

INSERT INTO `story_roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Root', 'root', 'Use this account with extreme caution. When using this account it is possible to cause irreversible damage to the system.', '2016-06-04 23:48:00', '2016-06-04 23:48:00'),
(2, 'Administrator', 'administrator', 'Full access to create, edit, and update companies, and orders.', '2016-06-04 23:48:00', '2016-06-04 23:48:00'),
(3, 'Manager', 'manager', 'Ability to create new companies and orders, or edit and update any existing ones.', '2016-06-04 23:48:00', '2016-06-04 23:48:00'),
(4, 'Company Manager', 'company-manager', 'Able to manage the company that the user belongs to, including adding sites, creating new users and assigning licences.', '2016-06-04 23:48:00', '2016-06-04 23:48:00'),
(5, 'User', 'user', 'A standard user that can have a licence assigned to them. No administrative features.', '2016-06-04 23:48:00', '2016-06-04 23:48:00');

-- --------------------------------------------------------

--
-- Structure de la table `story_users`
--

CREATE TABLE `story_users` (
`id` int(11) unsigned NOT NULL,
  `role_id` int(11) unsigned NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `activation_code` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `story_users`
--

INSERT INTO `story_users` (`id`, `role_id`, `username`, `password`, `realname`, `email`, `active`, `activation_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '$2y$10$MZpxcVZpwTCCotIkkfPP5O1sDC7GiKzD9klh4MoM/aE44YaVm4Xga', 'Administrator', 'admin@novaframework.dev', 1, NULL, NULL, '2016-06-03 08:15:00', '2016-06-06 20:00:40'),
(2, 5, 'scorsese', '$2y$10$j2eNSQE6TWaTrbK9kftqjOOLb6NiAAeb3EcTxbDWvNDu3nSfyU8RW', 'Martin Scorsese', 'scorsese@holywood.com', 1, NULL, NULL, '2016-11-24 13:35:42', '2016-11-24 13:35:42'),
(3, 5, 'fanmovie', '$2y$10$IfqNAKg561qb9r3C.aE0mep1OsKf20uDcmOfQhzLGndFNBe5dVz8i', 'fan movie', 'fan@wonderland.com', 1, NULL, NULL, '2016-11-24 13:37:24', '2016-11-24 13:37:24');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `story_commentaire`
--
ALTER TABLE `story_commentaire`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `story_histoire`
--
ALTER TABLE `story_histoire`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `story_aime`
--
ALTER TABLE `story_aime`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `story_photo`
--
ALTER TABLE `story_photo`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `story_roles`
--
ALTER TABLE `story_roles`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `story_users`
--
ALTER TABLE `story_users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `story_commentaire`
--
ALTER TABLE `story_commentaire`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `story_histoire`
--
ALTER TABLE `story_histoire`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `story_aime`
--
ALTER TABLE `story_aime`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `story_photo`
--
ALTER TABLE `story_photo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `story_roles`
--
ALTER TABLE `story_roles`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `story_users`
--
ALTER TABLE `story_users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;