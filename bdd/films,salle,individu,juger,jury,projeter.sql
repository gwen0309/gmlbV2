
--
-- Contenu de la table `films`
--

INSERT INTO `films` (`ID_FILM`, `NOM_FILM`, `GENRE_FILM`, `DUREE`, `CATEGORIE`) VALUES
(1, 'Superman', 'az', 90, 'LM'),
(2, 'Batman', 'zaz', 84, 'LM'),
(3, 'Ironman', 'zaz', 74, 'LM'),
(4, 'Journée trop longue', NULL, 28, 'CM'),
(5, 'Shakaponk', NULL, 32, 'CM'),
(6, 'Citizen Kane', NULL, 58, 'UCR'),
(7, 'GTA', NULL, 48, 'UCR');

--
-- Contenu de la table `individu`
--

INSERT INTO `individu` (`ID_INDIVIDU`, `NOM_INDIVIDU`, `PRENOM_INDIVIDU`, `TEL_INDIVIDU`, `TYPE_INDIVIDU`) VALUES
(1, 'Tartampion', 'Jean Jacques', NULL, NULL),
(2, 'Stark', 'Anthony', NULL, NULL),
(3, 'Parker', 'Peter', NULL, NULL),
(4, 'Dupond', 'Inspecteur', NULL, NULL),
(5, 'Durant', 'Docteur', NULL, NULL),
(6, 'Wayne', 'Bruce', NULL, NULL);


--
-- Contenu de la table `jury`
--

INSERT INTO `jury` (`ID_INDIVIDU`, `N__JURY`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2),
(5, 3),
(6, 3);


--
-- Contenu de la table `projeter`
--

INSERT INTO `projeter` (`ID_FILM`, `ID_SALLE`, `ID_PROJECTION`, `DATE_DEBUT_PROJECTION`, `DATE_FIN_PROJECTION`) VALUES
(1, 1, 102, '2015-05-21 08:00:00', '2015-05-21 07:30:00'),
(1, 1, 110, '2015-05-17 15:00:00', '2015-05-17 07:30:00'),
(1, 1, 111, '2015-05-15 09:00:00', '2015-05-15 07:30:00'),
(1, 2, 107, '2015-03-22 21:49:30', '2015-05-16 07:00:00'),
(1, 3, 109, '2015-05-16 20:00:00', '2015-05-16 07:00:00'),
(1, 5, 108, '2015-05-16 14:00:00', '2015-05-16 07:00:00'),
(2, 2, 101, '2015-05-13 08:00:00', '2015-05-13 07:54:00'),
(3, 5, 105, '2015-06-16 22:00:00', '2015-06-16 07:54:00');


--
-- Contenu de la table `salle`
--

INSERT INTO `salle` (`ID_SALLE`, `NOM_SALLE`, `CAPACITE`, `NUMERO_RUE_SALLE`, `RUE_SALLE`, `CODE_POSTAL_SALLE`, `VILLE_SALLE`) VALUES
(1, 'grand theatre lumiere', 15, 15, 'az', 15, 'az'),
(2, 'debussy', 15, 15, '15', 15, 'az'),
(3, 'bunuel', NULL, NULL, NULL, NULL, NULL),
(4, 'du soixantieme', NULL, NULL, NULL, NULL, NULL),
(5, 'bazin', NULL, NULL, NULL, NULL, NULL);
