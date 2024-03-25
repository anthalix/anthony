DROP TABLE IF EXISTS `animals`;
CREATE TABLE `animals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `age` varchar(64) NOT NULL,
  `sex` varchar(12) NOT NULL,
  `size` varchar(12) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` varchar(24) NOT NULL,
  `ok_cat` tinyint(1) DEFAULT NULL,
  `ok_dog` tinyint(1) DEFAULT NULL,
  `ok_kid` tinyint(1) DEFAULT NULL,
  `name_of_adopter` varchar(64) DEFAULT NULL,
  `pictures` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `specie_id` bigint(20) unsigned NOT NULL,
  `age_range` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `specie_id` (`specie_id`),
  CONSTRAINT `animals_ibfk_2` FOREIGN KEY (`specie_id`) REFERENCES `species` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `animals` (`id`, `name`, `age`, `sex`, `size`, `description`, `status`, `ok_cat`, `ok_dog`, `ok_kid`, `name_of_adopter`, `pictures`, `created_at`, `updated_at`, `specie_id`, `age_range`) VALUES
(1,	'Mo',	'8',	'Male',	'Moyen',	'Croisé Old English Sheepdog et Border Collie entre autre. Mo aime se faire lancer des batons et pas les ramener. C\'est une dramaqueen professionnelle',	'Adopted',	2,	1,	2,	'Loïc',	'./src/assets/Mo-dog.jpg',	'2023-07-21 15:24:04',	'2023-07-21 15:24:04',	1,	'6 ans et +'),
(2,	'Floki',	'2',	'Male',	'Petit',	'Aime réveiller ses humains à 5h du matin.',	'Adopted',	1,	2,	2,	'Tam',	'./src/assets/Floki-cat.jpg',	'2023-07-21 15:24:47',	'2023-07-21 15:24:47',	2,	'2 à 5 ans'),
(3,	'Mimi',	'11',	'Male',	'Moyen',	'Chat croisé européen et Maincoon. Il est obèse et dort 23h/24. Ne connait pas l\'intimité, et adore prendre des bains',	'Adopted',	2,	2,	1,	'Nina',	'./src/assets/Mimi-cat.jpg',	'2023-07-21 15:26:11',	'2023-07-21 15:26:11',	2,	'6 ans et +'),
(4,	'Mao',	'12',	'Male',	'Petit',	'Son père avait 3 pattes. Il n\'aime pas l\'autorité. Tueur de plantes. Ses passions : dormir, manger, râler, vomir, manger les plantes',	'Adopted',	2,	1,	1,	'Christelle',	'./src/assets/Mao-cat.jpg',	'2023-07-21 15:26:27',	'2023-07-21 15:26:27',	2,	'6 ans et +'),
(5,	'Chamallow',	'2',	'Male',	'Petit',	'Chaton qui aime jouer globalement tout le temps. A un air béta en permanence. Aime tomber sur le dos pour jouer avec les doigts',	'Available',	1,	1,	1,	'Silvin',	'./src/assets/Chamallow-cat.jpg',	'2023-07-21 15:26:44',	'2023-07-21 15:26:44',	2,	'2 à 5 ans'),
(6,	'Soane',	'2',	'Femelle',	'Moyen',	'Ok chiens chats enfants. Besoin de se dépenser donc personnes actives ou sportives idéalement. Présence et terrain clos obligatoires',	'Available',	1,	1,	2,	NULL,	'./src/assets/Soane-dog.jpg',	'2023-07-21 15:28:53',	'2023-07-21 15:28:53',	1,	'2 à 5 ans'),
(7,	'Saïan',	'6',	'Male',	'Grand',	'Chiot mais déjà de grosse taille, Saïan est un bouvier bernois paisible, bien dans ses pattes. Il adore les enfants et les gratouilles sur le ventre. Serait parfait dans une famille avec enfant, et jardin clôturé. A besoin de présence. Éducation et dressage à faire.',	'Available',	1,	1,	1,	NULL,	'./src/assets/Saian-dog.jpg',	'2023-07-21 15:29:15',	'2023-07-21 15:29:15',	1,	'6 ans et +'),
(8,	'Senseï',	'1',	'Male',	'Grand',	'J\'ai un caractère bien trempé mais je reste une boule d\'amour. Pour Senseï, il lui faut un couple ou une personne sans enfant qui a une connaissance de la race ou des chiens à fort caractère. Il est forcément important pour lui d\'avoir une personne présente. Le \"assis\" il connaît une fois deux fois trois fois mais la quatrième fois si il n\'a pas envie il n\'a pas envie. C\'est un très grand gourmand de caresse et de friandises.',	'Available',	1,	1,	1,	NULL,	'./src/assets/Sensei-dog.jpg',	'2023-07-21 15:29:37',	'2023-07-21 15:29:37',	1,	'1 ans et -'),
(9,	'Samy',	'2',	'Male',	'Moyen',	'Ok chiens chats. Éduqués, besoin de présence et d\'un jardin clôturé',	'Available',	1,	1,	1,	NULL,	'./src/assets/Samy-dog.jpg',	'2023-07-21 15:30:04',	'2023-07-21 15:30:04',	1,	'2 à 5 ans'),
(10,	'Nini',	'6',	'Femelle',	'Moyen',	'Câline et calme un peu peureuse. N\'aime pas être surprise. Ok chiens en général mais peut avoir ses têtes. On évitera les enfants, chats non testés. Personnes présentes et terrain clos obligatoires',	'Adopted',	0,	1,	0,	NULL,	'./src/assets/Nini-dog.jpg',	'2023-07-21 15:30:21',	'2023-07-21 15:30:21',	1,	'6 ans et +'),
(11,	'Opi',	'6',	'Male',	'Petit',	'Terrain clos et personne présente',	'Available',	2,	1,	1,	NULL,	'./src/assets/Opi-dog.jpg',	'2023-07-21 15:31:18',	'2023-07-21 15:31:18',	1,	'6 ans et +'),
(12,	'Harley',	'4',	'Male',	'Moyen',	'Super loulou qui a appris à vivre en famille. OK chien femelle. Pas OK chats ni volailles. Besoin de présence et d\'un terrain clôturé',	'SOS Urgent',	0,	1,	1,	NULL,	'./src/assets/Harley-dog.jpg',	'2023-07-21 15:31:35',	'2023-07-21 15:31:35',	1,	'2 à 5 ans'),
(13,	'Pyko',	'3',	'Femelle',	'Petit',	'Chaton européen femelle de 3 mois, OK chien et adore les enfants',	'Available',	1,	1,	1,	NULL,	'./src/assets/Pyko-cat.jpg',	'2023-07-21 15:31:57',	'2023-07-21 15:31:57',	2,	'2 à 5 ans'),
(14,	'Sophie',	'8',	'Femelle',	'Petit',	'SOS pour Sophie, cette chatte très calme dont la propriétaire vient de décéder. Elle vivait seule avec sa maîtresse dont n\'est pas habituée au bruit et à l\'agitation. Est très affectueuse, mais timide. Serait parfaite pour une personne vivant seule, très présente au domicile.',	'SOS Urgent',	0,	0,	0,	NULL,	'./src/assets/Sophie-cat.jpg',	'2023-07-21 15:32:12',	'2023-07-21 15:32:12',	2,	'6 ans et +'),
(15,	'Otsuka',	'3',	'Male',	'Petit',	'Ce petit chat bicolore s’avère être très en demande d’affection et câlin. C\'est pourquoi nous lui cherchons une famille pour lui donner tout le confort et l’amour qu’il mérite. Propreté acquise. Un accès à un jardin sécurisé serait un plus. Testé positif au FIV, il est négatif à la leucose et en pleine santé.',	'Available',	2,	2,	1,	NULL,	'./src/assets/Otsuka-cat.jpg',	'2023-07-21 15:32:33',	'2023-07-21 15:32:33',	2,	'2 à 5 ans'),
(21,	'Banane',	'3',	'Femelle',	'Moyen',	'\"Instinct de chasse très développé, Banane est une chienne indépendante, bien codée, pas affectueuse.\r\n\r\nA besoin de beaucoup d\'exercice et d\'espace. Une tendance à faire l\'arbitre lorsque d\'autres chiens jouent ensemble\"',	'Available',	2,	1,	1,	NULL,	'./src/assets/Banane-dog.jpg',	NULL,	NULL,	1,	'2 à 5 ans'),
(22,	'Petit Pâté',	'7',	'male',	'Petit',	'Fils de Gros Pâté - 2 de QI, comme tous les chats oranges',	'Available',	1,	2,	1,	NULL,	'./src/assets/Pâté-cat.jpg',	NULL,	NULL,	2,	'6 ans et +'),
(23,	'Truffe',	'1',	'Male',	'Moyen',	'\"Croisé border collie et labrador, Truffe est un chien très vif et infatigable.\r\nIl adore l\'eau (et la boue), et les courses poursuite. Ce chien est un vrai clown, très affectueux et pot de colle.\r\nSerait parfait au sein d\'un foyer dynamique et sportif assez présente\"',	'Available',	2,	1,	1,	NULL,	'./src/assets/Truffe-dog.jpg',	NULL,	NULL,	1,	'1 ans et -'),
(24,	'Taiga',	'1',	'Femelle',	'Petit',	'chatte Isabelle qui aime miauler au velux du plafond pour qu\'on lui ouvre, se poser sur votre dos quand vous dormez, génocider tout ce qui n\'est pas félin ou humain dans le quartier',	'Available',	1,	2,	2,	NULL,	'./src/assets/Taiga-cat.jpg',	'2023-07-26 09:41:51',	'2023-07-26 09:41:51',	2,	'1 ans et -'),
(25,	'Bulle',	'2',	'Femelle',	'Petit',	'\"Bulle est une voleuse de chaussette professionnelle.\r\nElle a le talent de péter dans la pièce où vous êtes et de s\'en aller\r\nça n\'est pas la plus aiguisée du tiroir\"',	'Available',	1,	1,	1,	NULL,	'./src/assets/Bulle-dog.jpg',	NULL,	NULL,	1,	'2 à 5 ans');

DROP TABLE IF EXISTS `animal_breed`;
CREATE TABLE `animal_breed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `animal_id` bigint(20) unsigned NOT NULL,
  `breed_id` bigint(20) unsigned NOT NULL,
  `create_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `animal_id` (`animal_id`),
  KEY `breed_id` (`breed_id`),
  CONSTRAINT `animal_breed_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`),
  CONSTRAINT `animal_breed_ibfk_2` FOREIGN KEY (`breed_id`) REFERENCES `breeds` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `animal_breed` (`id`, `animal_id`, `breed_id`, `create_update`) VALUES
(1,	1,	4,	'2023-07-28 06:17:13'),
(2,	2,	6,	'2023-07-28 06:17:26'),
(3,	3,	7,	'2023-07-28 06:17:37'),
(4,	4,	15,	'2023-07-28 06:17:49'),
(5,	5,	1,	'2023-07-28 06:18:00'),
(6,	6,	8,	'2023-07-28 06:18:10'),
(7,	7,	9,	'2023-07-28 12:04:36'),
(8,	8,	10,	'2023-07-28 12:05:04'),
(9,	9,	11,	'2023-07-28 12:05:55'),
(10,	10,	12,	'2023-07-28 12:06:55'),
(11,	11,	13,	'2023-07-28 12:07:36'),
(12,	12,	1,	'2023-07-28 12:08:19'),
(13,	13,	14,	'2023-07-28 12:08:54'),
(14,	14,	14,	'2023-07-28 12:09:41'),
(15,	15,	14,	'2023-07-28 12:10:23'),
(16,	21,	2,	'2023-07-28 12:12:14'),
(17,	22,	1,	'2023-07-28 12:12:59'),
(18,	23,	18,	'2023-07-28 12:15:32'),
(19,	24,	1,	'2023-07-28 12:16:10'),
(20,	25,	5,	'2023-07-28 12:17:20');

DROP TABLE IF EXISTS `breeds`;
CREATE TABLE `breeds` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `breeds` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'Unknown',	NULL,	NULL),
(2,	'Griffon Nivemais',	NULL,	NULL),
(3,	'Labrador',	NULL,	NULL),
(4,	'Old English Sheepdog',	NULL,	NULL),
(5,	'Carlin',	NULL,	NULL),
(6,	'Sacré de Birmanie',	NULL,	NULL),
(7,	'Croisé',	NULL,	NULL),
(8,	'Whippet',	NULL,	NULL),
(9,	'Bouvier Bernois',	NULL,	NULL),
(10,	'Laïka de Yakoutie',	NULL,	NULL),
(11,	'Cocker Anglais',	NULL,	NULL),
(12,	'Fox Terrier',	NULL,	NULL),
(13,	'Chihuahua',	NULL,	NULL),
(14,	'Européen',	NULL,	NULL),
(15,	'Border Collie',	NULL,	NULL),
(16,	'Caniche',	'2023-07-25 10:31:31',	'2023-07-25 10:31:31'),
(17,	'Rottweiler',	'2023-07-25 17:46:08',	'2023-07-25 17:46:08'),
(18,	'border Collie-Labrador',	NULL,	NULL);

DROP TABLE IF EXISTS `formulaires`;
CREATE TABLE `formulaires` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `zip_code` bigint(20) NOT NULL,
  `city` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `formulaires` (`id`, `lastname`, `firstname`, `email`, `phone`, `adress`, `zip_code`, `city`, `message`, `created_at`, `updated_at`) VALUES
(1,	'Testeur',	'Testa',	'testeurtesta@popopo.com',	'0',	'4 rue Du testo',	36000,	'Testarara',	'Je suis testeur interessé pour le chien/chat de o\'refuge.',	'2023-07-22 09:05:04',	'2023-07-22 09:05:04'),
(2,	'antho',	'antho',	'antho@gamil.com',	'06-05-04-03-02',	'1 rue mimosa',	31780,	'castel',	'bcp trop d\'essai déjà',	'2023-07-29 14:29:00',	'2023-07-29 14:29:00'),
(3,	'maud',	'maud',	'maud@oclock.io',	'0624052305',	'2 rue des galers',	31410,	'limoges',	'je reteste ce formulaire',	'2023-07-30 01:20:19',	'2023-07-30 01:20:19'),
(4,	'richard',	'pierre',	'pierre@oclock.io',	'0658452913',	'1 rue du cinema',	75000,	'Paris',	'tu es trop distrait!!',	'2023-07-30 03:24:42',	'2023-07-30 03:24:42');

DROP TABLE IF EXISTS `species`;
CREATE TABLE `species` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `species` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'Dog',	NULL,	NULL),
(2,	'Cat',	NULL,	NULL);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Testeur',	'testeur@gmail.com',	NULL,	'$2y$10$wpvcbjOAiRpqJP2edpV7hux24xSwfLRJu9SnCRZcSb5XYi6Lmawpe',	NULL,	'2023-07-22 13:02:49',	'2023-07-22 13:02:49'),
(2,	'El Hadi',	'ehdi@gmail.com',	NULL,	'$2y$10$vUdOySGk7u.A/CfiMADEtunsHrSQfWFpXKALCAs.P7wsXotJ4r0aS',	NULL,	'2023-07-23 07:10:20',	'2023-07-23 07:10:20');
