-- SQLBook: Code

-- phpMyAdmin SQL Dump

-- version 4.5.4.1deb2ubuntu2

-- http://www.phpmyadmin.net

--

-- Client :  localhost

-- Généré le :  Jeu 26 Octobre 2017 à 13:53

-- Version du serveur :  5.7.19-0ubuntu0.16.04.1

-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Base de données :  `simple-mvc`

--

-- --------------------------------------------------------

--

-- Structure de la table `item`

--

CREATE TABLE
    `item` (
        `id` int(11) UNSIGNED NOT NULL,
        `title` varchar(255) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

--

-- Contenu de la table `item`

--

INSERT INTO
    `item` (`id`, `title`)
VALUES (1, 'Stuff'), (2, 'Doodads');

--

-- Index pour les tables exportées

--

--

-- Index pour la table `item`

--

ALTER TABLE `item` ADD PRIMARY KEY (`id`);

--

-- AUTO_INCREMENT pour les tables exportées

--

--

-- AUTO_INCREMENT pour la table `item`

--

ALTER TABLE
    `item` MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

;

CREATE TABLE `EVENT`(`ID` 
	int NOT NULL AUTO_INCREMENT PRIMARY KEY, `text` text );
	CREATE TABLE
	    `product` (
	        `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	        `type` varchar(50) NOT NULL,
	        `name` varchar(50) NOT NULL,
	        `description` TEXT NOT NULL,
	        `information` TEXT
	    );
	CREATE TABLE
	    `devis` (
	        `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	        `firstname` varchar(50) NOT NULL,
	        `lastname` varchar(50) NOT NULL,
	        `phone` varchar(50) NOT NULL,
	        `email` varchar(80) NOT NULL,
	        `address` varchar(255),
	        `delivery` BOOLEAN default 0,
	        `comment` TEXT,
	        `product_id` INT NOT NULL,
	        CONSTRAINT fk_devis_product FOREIGN KEY (product_id) REFERENCES product(id)
	    );
	CREATE TABLE
	    `recipe` (
	        `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	        `name` varchar(255) NOT NULL,
	        `content` text NOT NULL,
	        `back_content` text NOT NULL
	    );
	INSERT INTO `event` (`text`)
	VALUES (
	        'Marché de Rochefort tous les mardis.'
	    ), (
	        'Marché de Saujon tous les jeudis.'
	    ), (
	        'Dégustation et visite de l’entreprise le samedi matin sur réservation.'
	    );
	INSERT INTO
	    `product` (
	        `type`,
	        `name`,
	        `description`,
	        `information`
	    )
	VALUES (
	        'huitre',
	        'Fine de Claires',
	        'Les huîtres de type fines de claire sont cultivées dans des bassins
								        d\'eau salée appelés claires. Elles peuvent être de couleur
								        blanche ou verte et sont affinées hors de la mer pendant un à deux mois,
								        avec un maximum de 20 coquillages par mètre carré. La chair de la fine de claire
								        est plus ferme que celle
								        des huîtres de parc et a un léger goût de noisette. Bien que leur teneur en chair
								        soit la même que celle des huîtres de parc, les fines de claire ont une forme arrondie et bombée.',
	        'Du 1/04 au 31/10 : 14 jours <br> Du 1/11 au 31/03 : 28 jours'
	    ), (
	        'huitre',
	        'Spéciale de Claires',
	        'La spéciale de claire est une variété d\'huîtres élevée dans des bassins
							        d\'eau salée appelés
							        claires. Ce type d\'huître a été engraissé pendant une période plus longue allant de deux
							        à quatre mois, avec une densité d\'élevage très réduite de seulement deux à six
							        individus par mètre carré. Les spéciales de claire sont connues pour être particulièrement
							        dodues et délicieuses.
							        La faible densité d\'élevage est intentionnelle pour obtenir une huître plus
							        charnue avec une saveur plus prononcée. Les spéciales de claire ont une coquille
							        creuse et arrondie et sont moins salées que les fines de claire.',
	        'Du 1/04 au 31/10 : 14 jours<br> Du 1/11 au 31/03 : 28 jours'
	    ), (
	        'huitre',
	        'Pousse en Claires',
	        'La variété d\'huîtres nommée fine de claire verte Label Rouge
							                est connue pour sa texture peu charnue et sa forme homogène. Les branchies
							                de ces huîtres sont d\'une teinte verte appréciée des consommateurs, et leur
							                 manteau est translucide voir blanc, sans présence de laitance. Leur saveur est équilibrée,
							                 avec un goût salé suivi d\'une note sucrée et un arôme de terroir de claires.
							                  La consistance de ces huîtres peut aller de molle à un peu ferme, et leur longueur en
							                   bouche est moyenne.',
	        '4 mois minimum'
	    ), (
	        'huitre',
	        'Label Rouge (verdissement)',
	        'Les ostréiculteurs sont fiers de produire cette huître exceptionnelle.
							                 Elle est élevée à très
							                faible densité, avec un maximum de 5 individus par mètre carré dans une claire, et ce
							                 pendant une période de 4 à 8 mois,
							                 en fonction de la saison. Au cours de sa croissance, l\'huître forme des
							                  lignes de pousses en dentelle sur sa coquille. Dans les claires,
							                 elle développe une chair ferme et croquante avec un taux de chair élevé.
							                  Lors de la dégustation, cette huître offre une saveur douce et charnue avec une note de noisette,
							                  et sa longueur en bouche est soutenue.',
	        'Du 1/04 au 31/10 : 14 jours <br> Du 1/11 au 31/03 : 28 jours'
	    ), (
	        'moule',
	        'Moule de bouchot',
	        'La moule de bouchot est une variété de moule cultivée sur
						                 des pieux en bois, appelés bouchots, qui sont plantés dans la mer.
						                Cette technique d\'élevage permet de produire des moules de haute qualité,
						                car elles sont nourries par les nutriments présents dans l\'eau de mer
						                 et protégées des prédateurs terrestres. Les bouchots sont placés dans des
						                  zones de faible profondeur, où les moules peuvent se développer dans un environnement protégé.
						                 Elles sont appréciées pour leur chair ferme et savoureuse, ainsi que pour
						                  leur faible teneur en sable et en algues. ',
	        NULL
	    ), (
	        'moule',
	        'Moule d\'Irlande',
	        'La moule d\'Irlande est une variété de moule cultivée dans
						                 les eaux froides et cristallines
						                 de l\'Atlantique Nord. Elle est appréciée pour sa chair ferme et son goût
						                 délicat, qui rappelle celui des fruits de mer frais.
						                 La moule d\'Irlande est élevée sur des cordes qui sont suspendues à des
						                 bouées en mer, où elles se nourrissent de phytoplancton et
						                 de nutriments marins. Ce mode d\'élevage permet de produire des moules
						                  de grande qualité, car elles sont constamment baignées dans l\'eau de mer
						                  pure et riche en nutriments.',
	        NULL
	    );
	INSERT INTO
	    `recipe` (
	        `name`,
	        `content`,
	        `back_content`
	    )
	VALUES (
	        'Huîtres, poivron confit et lard',
	        '<li>Pour un plat : calibre N° 2 ou N°3</li>
				                <li>Pour l’apéritif : calibre N° 4</li>
				                <li>10 à 12 huîtres Marennes Oléron</li>
				                <li>3 tranches de poitrine fumée</li>
				                <li>2 poivrons rouge</li>
				                </ul>',
	        '<ul>
				                <li>Préparation : 30min | Cuisson : 20min</li>
				                <li>Laver puis éplucher les poivrons, les émincer et les faire revenir doucement
				                 dans une casserole avec un filet d’huile d’olive.
				                 Faire revenir à feux doux dans une poêle la poitrine fumée.</li>
				                <li>Juste avant de servir sortir les tranches de poitrine fumée et les laisser reposer
				                 sur un papier absorbant. Couper la tranche en morceaux carrés.</li>
				                <li>Prenez vos huîtres Marennes Oléron, décrochez juste le petit muscle et laisser les
				                 en coquille. Au moment de servir vider l’eau de l’huitre Marennes Oléron.
				                Ajouter le poivron confit et les carrés de poitrine fumée encore tiède.</li>
				                </ul>'
	    ), (
	        'Eclade de moules',
	        '<ul>
				                <li>2 litres de moules</li>
				                <li>Aiguilles de pin séchées</li>
				                </ul>',
	        '<ul>
				                <li>Préparation : 15min | Cuisson : 5min</li>
				                <li>Posez les moules sur une planche en bois. La fente d’ouverture des
				                 moules doit être mis côté planche (important pour la cuisson).</li>
				                <li>Posez les planches dehors, dans un endroit sécurisé et couvrez-les d’une bonne
				                 couche d’aiguilles de pin séchées (au moins 10 cm).</li>
				                <li>Mettez le feu aux aiguillettes de pin pour faire cuire les moules.
				                 La cuisson dure environ 5 min. Les coquilles doivent être noires ou blanches
				                (si elles sont marrons elles manquent de cuisson et on peut couvrir à nouveau
				                 d’aiguilles de pin et remettre le feu).</li>
				                <li>Retirez la braise et dégustez les moules avec un bon vin blanc de pays charentais.</li>
				                </ul>'
	    ), (
	        'Huître, kiwi, gingembre
				                et lait de coco',
	        '<ul>
				                <li>Pour l’apéritif : calibre N° 4</li>
				                <li>Pour un plat : calibre N° 3</li>
				                <li>1 brique de lait ou crème de coco</li>
				                <li>50 g de gingembre frais râpé</li>
				                <li>3 kiwis</li>
				                </ul>',
	        '<ul>
				                <li>Préparation : 20min | Attente : 30min</li>
				                <li>Eplucher puis tailler le kiwi en petits dés. Râper le gingembre dans le lait/crème de coco.
				                 Laisser infuser au réfrigérateur au moins 30 minutes recouvert
				                 d’un film transparent.</li>
				                <li>Prenez vos huîtres Marennes Oléron, décrochez juste le petit muscle et laisser les en coquille.
				                 Au moment de servir vider l’eau de l’huitre.</li>
				                <li>Ajouter les dés de kiwi et verser une cuillère à café d’infusion coco et gingembre par huître.</li>
				                </ul>'
	    ), (
	        'Huître, cacahuète, miel
				                et sauce soja',
	        '<ul>
				                <li>Pour un plat : calibre N° 3 ou N°2</li>
				                <li>Pour l’apéritif : calibre N° 4</li>
				                <li>10 à 12 Huîtres Marennes Oléron</li>
				                <li>Cuillères a soupe de sauce soja par Huître Marennes Oléron servie</li>
				                <li>1/2 cuillère à café de miel par Huître Marennes Oléron servie</li>
				                </ul>',
	        '<ul>
				                <li>Préparation : 20min</li>
				                <li>Mixer les cacahuètes, ajouter le miel et la sauce soja.
				                 Le sirop ainsi obtenu doit être liquide mais pas trop pour napper l’huître et ne pas s’y noyer.
				                 Rectifier au besoin le rapport miel/sauce soja.</li>
				                <li>Prenez vos huitres Marennes Oléron, décrochez juste le petit muscle et laisser les en coquille.
				                 Au moment de servir vider l’eau de l’huître Marennes Oléron.
				                 Ajouter en nappage le mélange cacahuète, miel et sauce soja.</li>
				                </ul>'
	    );
