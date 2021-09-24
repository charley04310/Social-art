

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE `Avoir` (
  `Id_Poste` int(11) NOT NULL,
  `Id_Com` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Fournir`
--

CREATE TABLE `Fournir` (
  `Id_Com` int(11) NOT NULL,
  `Id_Users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `MetaPost`
--

CREATE TABLE `MetaPost` (
  `Id_Com` int(11) NOT NULL,
  `Desc_Com` varchar(255) NOT NULL,
  `Like_Com` int(255) DEFAULT NULL,
  `Dislike_Com` int(11) DEFAULT NULL,
  `Pseudo_User` varchar(100) DEFAULT NULL,
  `Id_Poste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `MetaPost`
--

INSERT INTO `MetaPost` (`Id_Com`, `Desc_Com`, `Like_Com`, `Dislike_Com`, `Pseudo_User`, `Id_Poste`) VALUES
(1, 'saluuuuuut', NULL, NULL, 'Charley04310@', 23),
(2, 'salutt', NULL, NULL, 'Charley04310@', 23),
(3, 'teeeeest', NULL, NULL, 'Charley04310@', 23),
(4, 'coucouuuu :)', NULL, NULL, 'Charley04310@', 2),
(5, 'ca va????', NULL, NULL, 'Charley04310@', 2),
(6, 'coucou :) ', NULL, NULL, 'Julie', 23),
(7, 'bonnjouuur chrichri', NULL, NULL, 'Julie', 8),
(8, 'saluuuuut', NULL, NULL, 'client', 8),
(9, 'saaalut', NULL, NULL, 'client', 23),
(10, 'couuucouuuu', NULL, NULL, 'client', 1),
(11, 'cc', NULL, NULL, 'merci', 2),
(12, 'wouuuua ', NULL, NULL, 'Charley04310@', 29),
(13, 'super image', NULL, NULL, 'Charley04310@', 29),
(14, 'couuuucouuu', NULL, NULL, 'Charley04310@', 25),
(15, 'ggggg', NULL, NULL, 'Charley04310@', 1),
(16, 'saluuut', NULL, NULL, 'Charley04310@', 1),
(17, 'coool ça', NULL, NULL, 'Charley04310@', 26);

-- --------------------------------------------------------

--
-- Structure de la table `Postes`
--

CREATE TABLE `Postes` (
  `Id_Poste` int(11) NOT NULL,
  `Titre_Poste` varchar(150) NOT NULL,
  `Cat_Poste` varchar(255) NOT NULL,
  `Date_Poste` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Desc_Poste` varchar(255) NOT NULL,
  `Nbr_Comment` int(11) DEFAULT NULL,
  `Nbr_Avis` int(11) DEFAULT '0',
  `Img_Poste` varchar(255) DEFAULT NULL,
  `Id_Users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Postes`
--

INSERT INTO `Postes` (`Id_Poste`, `Titre_Poste`, `Cat_Poste`, `Date_Poste`, `Desc_Poste`, `Nbr_Comment`, `Nbr_Avis`, `Img_Poste`, `Id_Users`) VALUES
(1, 'VOICI Mon dernier logo !!', 'Détente', '2021-08-30 13:18:20', 'Lorem ipsum dolor sit amet con praesentium. Labore non error necessitatibus consequatur reiciendis, recusandae explicabo doloribus maxime.', 5, 4, NULL, 6),
(2, 'Mon premier manga !!!! ', 'Illustration', '2021-08-27 14:55:12', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, praesentium. Labore non error aspernatur magni eligendi autem suscipit quis? Voluptas est vero quo necessitatibus consequatur reiciendis, recusandae explicabo doloribus maxime.', 12, 1, NULL, 8),
(3, 'Que pensez du design de cette voiture ???', 'Illustration', '2021-08-26 15:19:56', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, praesentium. Labore non error aspernatur magni eligendi autem suscipit quis? Voluptas est vero quo necessitatibus consequatur reiciendis, ', 12, 1, NULL, 24),
(4, 'Quoi de mieux que Adobe XD ?N-', 'Détente', '2021-08-27 14:54:29', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, praesentium. Labore non error aspernatur magni eligendi autem suscipit quis? Voluptas est vero quo necessitatibus consequatur reiciendis, recusandae explicabo doloribus maxime.', 122, 1, NULL, 15),
(5, 'Mon script javascript pour le switch mode !!', 'Réseau', '2021-08-26 16:11:14', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam molestias quia illo praesentium sunt, necessitatibus voluptates error excepturi illum recusandae quam eum magnam ab corrupti quisquam asperiores? Accusantium, tempora esse.', 2333, 1, NULL, 19),
(6, 'Voici une technique pour sécuriser votre environnement WEB!!', 'Réseau', '2021-08-25 17:13:57', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam molestias quia illo praesentium sunt, necessitatibus voluptates error excepturi illum recusandae quam eum magnam ab corrupti quisquam asperiores? Accusantium, tempora esse.', 45, 0, NULL, 16),
(7, 'Un panda va bientôt naitre en france !!!!', 'Détente', '2021-08-25 17:13:57', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam molestias quia illo praesentium sunt, necessitatibus voluptates error excepturi illum recusandae quam eum magnam ab corrupti quisquam asperiores? Accusantium, tempora esse.', 98, 0, NULL, 8),
(8, 'Voyage au philippine pour les digitals nomades', 'Détente', '2021-08-25 17:13:57', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam molestias quia illo praesentium sunt, necessitatibus voluptates error excepturi illum recusandae quam eum magnam ab corrupti quisquam asperiores? Accusantium, tempora esse.', 12, 0, NULL, 14),
(9, 'Un site wordpress et ses failles', 'Cyber-Sécurité', '2021-08-25 17:13:57', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam molestias quia illo praesentium sunt, necessitatibus voluptates error excepturi illum recusandae quam eum magnam ab corrupti quisquam asperiores? Accusantium, tempora esse.', 11, 0, NULL, 10),
(10, 'un ancien code d\'authentification ', 'Cyber-Sécurité', '2021-08-25 17:13:57', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam molestias quia illo praesentium sunt, necessitatibus voluptates error excepturi illum recusandae quam eum magnam ab corrupti quisquam asperiores? Accusantium, tempora esse.', 22, 0, NULL, 3),
(17, 'saluuuut', 'Cyber-Sécurité', '2021-08-25 07:09:39', 'lorem lorem ipsum loremmmmmmmmmm', NULL, NULL, NULL, 22),
(19, 'saluuut ceci est mon premier poste', 'Développement', '2021-08-30 12:22:46', 'loremrelomellllllemessssssssfffffqjssssss', NULL, 0, NULL, 6),
(20, 'ggggggg', 'Illustration', '2021-08-30 12:22:46', 'gggggggg', NULL, 0, NULL, 6),
(21, 'Test d\'ajout d\'article', 'Développement', '2021-08-30 12:22:46', 'test', NULL, 0, NULL, 6),
(22, 'test pour savoir si ca marchee', 'Développement', '2021-08-30 12:22:46', 'ca marche ? ', NULL, 0, NULL, 6),
(23, 'test pour savoir si ca marchee', 'Développement', '2021-08-30 12:22:46', 'ca marche ? ', NULL, 0, NULL, 6),
(24, 'Mon article !!! ', 'Développement', '2021-08-30 12:22:46', 'comment créer un blog facilement ? ', NULL, 0, NULL, 30),
(25, 'jooooouruuu', 'Développement', '2021-08-30 12:22:46', 'jouruuu', NULL, 0, NULL, 30),
(26, 'gggg', 'Illustration', '2021-08-30 13:04:44', 'gggggg', NULL, 1, NULL, 30),
(27, 'salut toi', 'Développement', '2021-08-30 12:22:46', 'coucoucoucoucou', NULL, 0, '/Applications/MAMP/htdocs/social\'art/Social-art/img/articles/saluttoi6.jpg', 6),
(28, 'merdeeee', 'Développement', '2021-08-30 12:22:46', 'meeeerde', NULL, 0, '../img/articles/merdeeee6.jpg', 6),
(29, 'koko', 'Développement', '2021-08-30 12:22:46', 'koko', NULL, 0, 'img/articles/koko6.jpg', 6),
(30, 'estelle pu ducu', 'Développement', '2021-08-30 12:22:46', 'elle pu ducu', NULL, 0, 'img/articles/estellepuducu6.jpeg', 6),
(31, 'test du nombre de like', 'Développement', '2021-08-27 18:04:25', 'liiiike', NULL, 1, 'img/articles/testdunombredelike6.png', 6),
(32, 'Mon premier article', 'Développement', '2021-08-30 12:55:02', 'blablablabla', NULL, 0, 'img/articles/Monpremierarticle41.png', 41);

-- --------------------------------------------------------

--
-- Structure de la table `Recuperation`
--

CREATE TABLE `Recuperation` (
  `Id_recuperation` int(255) NOT NULL,
  `Id_user` int(255) NOT NULL,
  `Email_user` varchar(100) NOT NULL,
  `Recup_code` int(4) NOT NULL,
  `Confirmation` int(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Recuperation`
--

INSERT INTO `Recuperation` (`Id_recuperation`, `Id_user`, `Email_user`, `Recup_code`, `Confirmation`) VALUES
(2, 27, 'Geoffroy-Charley@hotmail.fr', 340, 0),
(3, 7, 'charley.geoffroy@protonmail.com', 691, 1),
(4, 28, 'julie@klio.fr', 411, 0);

-- --------------------------------------------------------

--
-- Structure de la table `Roles`
--

CREATE TABLE `Roles` (
  `Id_Permission` int(11) NOT NULL,
  `Type_Role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Roles`
--

INSERT INTO `Roles` (`Id_Permission`, `Type_Role`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Structure de la table `User_Like`
--

CREATE TABLE `User_Like` (
  `Id_like` int(11) NOT NULL,
  `Like_user` int(11) NOT NULL,
  `Dislike_user` int(11) NOT NULL,
  `Id_Post` int(11) NOT NULL,
  `id_user` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `User_Like`
--

INSERT INTO `User_Like` (`Id_like`, `Like_user`, `Dislike_user`, `Id_Post`, `id_user`) VALUES
(27, 1, 0, 1, 30),
(28, 1, 0, 1, 6),
(29, 1, 0, 1, 8),
(30, 1, 0, 3, 6),
(31, 1, 0, 5, 6),
(32, 1, 0, 2, 6),
(33, 1, 0, 26, 6),
(34, 1, 0, 4, 6),
(35, 1, 0, 29, 6),
(36, 1, 0, 30, 6),
(37, 1, 0, 31, 6),
(38, 1, 0, 1, 41),
(39, 1, 0, 26, 41);

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateurs`
--

CREATE TABLE `Utilisateurs` (
  `Id_Users` int(11) NOT NULL,
  `Pseudo_Users` varchar(50) NOT NULL,
  `Mdp_Users` varchar(255) NOT NULL,
  `Bio_Users` varchar(255) DEFAULT NULL,
  `Date_Users` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Natio_Users` varchar(255) DEFAULT NULL,
  `Email_Users` varchar(255) NOT NULL,
  `Avatar_Users` varchar(255) DEFAULT NULL,
  `Img_Users` varchar(255) DEFAULT NULL,
  `Id_Permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Utilisateurs`
--

INSERT INTO `Utilisateurs` (`Id_Users`, `Pseudo_Users`, `Mdp_Users`, `Bio_Users`, `Date_Users`, `Natio_Users`, `Email_Users`, `Avatar_Users`, `Img_Users`, `Id_Permission`) VALUES
(2, 'charley', '*FC7F465C75897BA075D15957F6F3CA4EB317FB31', 'Bonjour, je m\'appelle charley j\'ai 25 ans je suis étudiant au CESI de Montpellier, je souhaite partager avec vous mes créations digitales blablabla', '2021-07-19 14:26:07', 'France', 'charley@charley', '', '', 1),
(3, 'charlotte', 'charlotte', 'salut', '2021-07-20 13:19:49', 'france', 'charly@reste.fr', '', '', 1),
(5, 'Chris', 'chris', NULL, '2021-07-20 14:53:33', NULL, 'chris@test.fr', NULL, NULL, 1),
(6, 'Charley04310@', '$2y$10$x5sXzHQ8sv8nlI3hiPJUHeMRAFcZuv68CF5tc9c.iMdNDbrYaL/VW', 'souriant et sympathique', '2021-08-20 14:51:54', 'Belgique', 'test@test.fr', 'img/avatars/6.png', NULL, 1),
(7, 'Charley', '$2y$10$Za1Aj5j/jXxbcFFxxYFAV.bcsd9qVl7fuUr.Q4HUnhnt5d2I8j3by', NULL, '2021-07-20 15:02:45', NULL, 'charley.geoffroy@protonmail.com', NULL, NULL, 1),
(8, 'Julie', '$2y$10$EX0M2VO7knihL8YuNxkuVOtJ4onaCnSLZj98asGOPO2j0Rcr7gXfW', NULL, '2021-07-20 16:03:41', NULL, 'julie@test.fr', NULL, NULL, 1),
(9, 'patrick', '$2y$10$uaFTjLUqKlCMSsLsYEsureB0b7PimFGqFmB/7HkZZNr6wmKF3O/f6', NULL, '2021-07-21 08:15:07', NULL, 'greg@greg.fr', NULL, NULL, 1),
(10, 'fabien', '$2y$10$1fGzr5TmL9r.5hJ4Us7vC.Umg8pkAxcJYWigwB5Ojo/lvIZSs.jSi', NULL, '2021-07-21 09:41:05', NULL, 'greg@greg.fr', NULL, NULL, 1),
(11, '', '$2y$10$1vaGw6LqDz6xYGAztODcUO4son3UNUMLfJr3y6sOTBz4/YFAoxhe2', NULL, '2021-07-21 13:35:55', NULL, '', NULL, NULL, 1),
(12, '', '$2y$10$qWGR7135.aiaJVShT65MaOFFE.n5XgvCvii7KtVudzeT6UMPIxRLi', NULL, '2021-07-21 13:36:38', NULL, '', NULL, NULL, 1),
(13, '', '$2y$10$u.0dGlF2XqAK9W0YrXI0ROa1L3C9Q4rtLqyPQCvzdTEYeKqHobP3i', NULL, '2021-07-21 13:39:57', NULL, '', NULL, NULL, 1),
(14, 'christianne', '$2y$10$8DkMQecssqw6h2VhWa01mOsVTk/L7ezLf0K7.6cppiwb08.IAmc42', NULL, '2021-07-21 13:45:12', NULL, 'test@test.org', NULL, NULL, 1),
(15, 'momo', '$2y$10$Brg058PTnbyY45umkydEYejlo1NJReFo.CxropGhXMsYU2E6wV2N6', NULL, '2021-07-21 13:46:32', NULL, 'test@test.net', NULL, NULL, 1),
(16, 'Mireille', '$2y$10$0Vou1DQ1ef5t3E37tDSQh.qs3yd75RI0YehrTZwuPoRQTkkwZFgFO', NULL, '2021-07-21 13:55:40', NULL, 'test@test.po', NULL, NULL, 1),
(17, 'thierry', '$2y$10$boB6DyCIMAC9dXsFZjzUf.mXZc1wubHjjfbxmh8TM.LCjOKL/MD2.', NULL, '2021-07-21 17:07:32', NULL, 'carlos@carlos.fr', NULL, NULL, 1),
(18, 'claire', '$2y$10$SHtETdSHSB2VIGLLqd7Zau6wgtf7e13uM5EDLzBzEvszmWd897tA6', NULL, '2021-07-21 17:37:45', NULL, 'claire@claire.fr', NULL, NULL, 1),
(19, 'marie', '$2y$10$qu8wIr0iM0P5pNB8R.oP.O0yyZrvJ1lVQ0PKNORF/LoKDaiT8aqOq', NULL, '2021-07-21 17:53:52', NULL, 'marie@marie.fr', NULL, NULL, 1),
(20, 'marie2', '$2y$10$M2N2aT9w9SYMQoJl5BK5fOIkF.fg92odmoZLwHEiefMzJCvhpGe9O', NULL, '2021-07-21 18:06:38', NULL, 'marie1@marie.fr', NULL, NULL, 1),
(21, 'marie233', '$2y$10$hl2.sZs3gp3K8sCFRtNVB.fvZamdoHJdfZte3g7p3cJrXBH5se4Bm', NULL, '2021-07-22 08:48:33', NULL, 'test@test.fmpppp', NULL, NULL, 1),
(22, 'roger', '$2y$10$jivKAcM/Kd1e8kNnCZn2puNwPoG4uIeIa3B/wOgZ5GcuVuyjFV9LC', NULL, '2021-07-22 09:27:19', NULL, 'roger@roger.fr', NULL, NULL, 1),
(23, 'pedro', '$2y$10$uXvU73IPyGWQ4iyTtOn/VOQ8uebyuTp8qvlB77VTaYYExFTFtSMf2', NULL, '2021-07-22 10:24:09', NULL, 'pedro@pedro.pedro', NULL, NULL, 1),
(24, 'mounier', '$2y$10$pOQWl906TVCMhx8A4/rmOOcYCaFi7nHkWSPlsXn.gcIgca9vt/iyi', NULL, '2021-07-22 12:28:10', NULL, 'mounier@mounier.fr', NULL, NULL, 1),
(25, 'Charley04', '$2y$10$NlLqqlBIi2OLEv.BhvrTm.aUhWcqnXDxLtOKqvz1ul3..Nwv6UKqC', NULL, '2021-07-22 13:42:00', NULL, 'test@test.frrrrr', NULL, NULL, 1),
(26, 'patron', '$2y$10$XYyg.0UbiF4URUeuHidWaehqpBg8BOgeRC.WgHJyPxt.S/Mvp60Tq', NULL, '2021-07-23 12:56:52', NULL, 'patron@patron.patron', NULL, NULL, 1),
(27, 'client', '$2y$10$APqXOt2lV8xTBVDtDZ2fN.uzniM1YzIzF9W7QZDgptC.TlySekSq.', NULL, '2021-08-16 14:39:13', NULL, 'Geoffroy-Charley@hotmail.fr', NULL, NULL, 1),
(28, 'Juulie', '$2y$10$gbAaLUbt.fzbf8fd7J4mj.H75bqlH9lBPXfwwjuhB6z/7WcvhGjyC', NULL, '2021-08-17 12:37:53', NULL, 'julie@klio.fr', NULL, NULL, 1),
(29, 'panda', '$2y$10$.rDibiqMsp6hQ55SPfF4GOZpqPvMHTDAJyDm6Saze4WqTMDv9yZ1e', NULL, '2021-08-19 13:48:11', NULL, 'panda@panda.fr', NULL, NULL, 1),
(30, 'merci', '$2y$10$y.3ABJ77rHYW6zfMlB5WaObGIXa1w30PPl7qvXfFU8aLi8Q2ei4x2', NULL, '2021-08-30 12:51:56', NULL, 'merci@merci.fr', NULL, NULL, 1),
(31, 'talent', '$2y$10$IXyWJa1rNJcB.a.UsIiPd.Q7uj6HgpKAVfAunOOZB0ByCVwMOjniq', NULL, '2021-08-19 13:51:19', NULL, 'talent@talent.fr', NULL, NULL, 1),
(32, 'dent', '$2y$10$cSb//Sni2ZnGloNWgi.p9Ofky2241DV7ik0b7NMtrLAp0D8Xt9XJO', NULL, '2021-08-19 13:52:31', NULL, 'dent@dent.fr', NULL, NULL, 1),
(33, 'plus', '$2y$10$xlJo7faw4V.IrbN5uN.2rud7XYmEZO4tkSiu242BWmeAF/lR5lv36', NULL, '2021-08-19 13:53:24', NULL, 'plus@plus.fr', NULL, NULL, 1),
(34, 'ddd', '$2y$10$1lgk16Igigef4TIVPfi4AOqomcBS0XSqWY9dULooV238lBw5uoen.', NULL, '2021-08-19 14:00:21', NULL, 'ddd@ddd.fr', NULL, NULL, 1),
(35, 'dede', '$2y$10$D0.R9f6TwdoZZF1tuSj3E.GqoKJJ2whdZcth9ROJBZTuyOmhOQfru', NULL, '2021-08-19 14:02:40', NULL, 'dede@dede.fr', NULL, NULL, 1),
(36, 'fefe', '$2y$10$QrBLR6z3J1d/IYit62JNb.JMdrq8YAKV73d5LAFbIl46pdLUOfUti', NULL, '2021-08-19 14:03:42', NULL, 'fefe@fefe.fr', NULL, NULL, 1),
(37, 'zaza', '$2y$10$JXg1x9i5rUNVJiGqM2Z9YuWi627XZn5itCt76WeJROU5uGFBJH0bq', NULL, '2021-08-19 14:05:04', NULL, 'zaza@zaza.fr', NULL, NULL, 1),
(38, 'zazaz', '$2y$10$kB2xRyO.niwfPdEqr5G.3e6BZ5c.Kg6USX6PxM0Mmsoic8ZDmu4.K', NULL, '2021-08-19 14:05:31', NULL, 'zaza@zazaz.fr', NULL, NULL, 1),
(39, 'tete', '$2y$10$Mg/NqnMFgQRa9ZD8P6ZV2eE/lzuOccjDwe3Iuv70.f0oC/ELdGKmO', NULL, '2021-08-19 14:10:03', NULL, 'tete@tete.fr', NULL, NULL, 1),
(40, 'popo', '$2y$10$cU6bQz4D0B7ttdMg53Z2kuvj5.E47vRsCB7YQE.nOtY8ILqaUzi7O', NULL, '2021-08-20 08:28:10', NULL, 'po@po.fr', NULL, NULL, 1),
(41, 'flo', '$2y$10$C7b9Iv3HLb58eZuq6dxeCeeon6ZX1wFo.M3L73RIPUsGwB.KA72wm', 'Douce et Gentille', '2021-08-30 12:54:01', 'Belgique', 'flo@flo.fr', 'img/avatars/41.jpg', NULL, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Avoir`
--
ALTER TABLE `Avoir`
  ADD PRIMARY KEY (`Id_Poste`,`Id_Com`),
  ADD KEY `Avoir_MetaPost0_FK` (`Id_Com`);

--
-- Index pour la table `Fournir`
--
ALTER TABLE `Fournir`
  ADD PRIMARY KEY (`Id_Com`,`Id_Users`),
  ADD KEY `Fournir_Utilisateurs0_FK` (`Id_Users`);

--
-- Index pour la table `MetaPost`
--
ALTER TABLE `MetaPost`
  ADD PRIMARY KEY (`Id_Com`);

--
-- Index pour la table `Postes`
--
ALTER TABLE `Postes`
  ADD PRIMARY KEY (`Id_Poste`),
  ADD KEY `Postes_Utilisateurs_FK` (`Id_Users`);

--
-- Index pour la table `Recuperation`
--
ALTER TABLE `Recuperation`
  ADD PRIMARY KEY (`Id_recuperation`);

--
-- Index pour la table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`Id_Permission`);

--
-- Index pour la table `User_Like`
--
ALTER TABLE `User_Like`
  ADD PRIMARY KEY (`Id_like`);

--
-- Index pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  ADD PRIMARY KEY (`Id_Users`),
  ADD KEY `Utilisateurs_Roles_FK` (`Id_Permission`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `MetaPost`
--
ALTER TABLE `MetaPost`
  MODIFY `Id_Com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `Postes`
--
ALTER TABLE `Postes`
  MODIFY `Id_Poste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `Recuperation`
--
ALTER TABLE `Recuperation`
  MODIFY `Id_recuperation` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `Roles`
--
ALTER TABLE `Roles`
  MODIFY `Id_Permission` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `User_Like`
--
ALTER TABLE `User_Like`
  MODIFY `Id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  MODIFY `Id_Users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Avoir`
--
ALTER TABLE `Avoir`
  ADD CONSTRAINT `Avoir_MetaPost0_FK` FOREIGN KEY (`Id_Com`) REFERENCES `MetaPost` (`Id_Com`),
  ADD CONSTRAINT `Avoir_Postes_FK` FOREIGN KEY (`Id_Poste`) REFERENCES `Postes` (`Id_Poste`);

--
-- Contraintes pour la table `Fournir`
--
ALTER TABLE `Fournir`
  ADD CONSTRAINT `Fournir_MetaPost_FK` FOREIGN KEY (`Id_Com`) REFERENCES `MetaPost` (`Id_Com`),
  ADD CONSTRAINT `Fournir_Utilisateurs0_FK` FOREIGN KEY (`Id_Users`) REFERENCES `Utilisateurs` (`Id_Users`);

--
-- Contraintes pour la table `Postes`
--
ALTER TABLE `Postes`
  ADD CONSTRAINT `Postes_Utilisateurs_FK` FOREIGN KEY (`Id_Users`) REFERENCES `Utilisateurs` (`Id_Users`);

--
-- Contraintes pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  ADD CONSTRAINT `Utilisateurs_Roles_FK` FOREIGN KEY (`Id_Permission`) REFERENCES `Roles` (`Id_Permission`);
