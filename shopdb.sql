-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2017 at 06:10 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateurs`
--

CREATE TABLE IF NOT EXISTS `administrateurs` (
  `id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrateurs`
--

INSERT INTO `administrateurs` (`id`) VALUES
('admin');

-- --------------------------------------------------------

--
-- Table structure for table `bon_enlevement`
--

CREATE TABLE IF NOT EXISTS `bon_enlevement` (
  `id_bon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `id_client` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_cmd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `agent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_bon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bon_enlevement`
--

INSERT INTO `bon_enlevement` (`id_bon`, `date`, `id_client`, `id_cmd`, `agent`) VALUES
('BON1705ADR00003', '2017-05-30', '98B7777777', 'CMD1705ADR00003', ''),
('BON1705ADR00004', '2017-05-30', '98B7777777', 'CMD1705ADR00004', ''),
('BON1705ADR00005', '2017-05-30', '98B7777777', 'CMD1705ADR00005', ''),
('BON1705ADR00006', '2017-05-30', '98B7777777', 'CMD1705ADR00006', ''),
('BON1705ALG00001', '2017-05-29', '98B1111111', 'CMD1705ALG00001', 'agent'),
('BON1705ALG00002', '2017-05-29', '98B1111111', 'CMD1705ALG00002', ''),
('BON1705ALG00007', '2017-05-30', '98B1111111', 'CMD1705ALG00007', 'sihem'),
('BON1705ALG00008', '2017-05-30', '98B1234567', 'CMD1705ALG00008', ''),
('BON1705ALG00009', '2017-05-30', '98B1111111', 'CMD1705ALG00009', '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Anti-inflammatoire et antalgique'),
(2, 'Cardiologie'),
(3, 'Dermatologie'),
(4, 'Diabetologie'),
(5, 'Anti-infectieux'),
(6, 'Gastro-enterologie'),
(7, 'Gynecologie'),
(8, 'Neuro-psychatrie'),
(9, 'Pneumo-allergologie'),
(10, 'OTC');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id_client` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gest` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom_client` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `addresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code_postal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wilaya` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `society` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_achat` int(11) NOT NULL,
  `st` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `gest`, `nom_client`, `prenom`, `sexe`, `date`, `addresse`, `code_postal`, `ville`, `wilaya`, `telephone`, `society`, `mail`, `nombre_achat`, `st`) VALUES
('98B1111111', 'gest02', 'Bouguelia', 'Sara', 'Madame', '1995-09-29', '16 rue rabia662', '16000', 'bab zouar', 'Alger', '021141512', 'utshb', 'wafa.jil@hotmail.com', 3, '78954126985'),
('98B1234567', 'gest02', 'bezgali', 'meriem', 'Monsieur', '1995-05-05', '16 rue moukhtar zarhouni', '16000', 'bab zouar', 'Alger', '021212121', 'hydrapharm', 'wafa.jil@hotmail.com', 1, '1245783'),
('98B2222222', 'gest02', 'Boumazouza', 'ryma', 'Madame', '1995-09-29', '16 rue moukhtar zarhouni ', '16000', 'bab zouar', 'Adra', '021141512', 'utshb', 'wafa.jil@hotmail.com', 0, '78954126985'),
('98B3333333', 'gest02', 'Amirat', 'Anfel', 'Madame', '1995-09-29', '16 rue moukhtar zarhouni ', '16000', 'bab zouar', 'Adra', '021141512', 'utshb', 'wafa.jil@hotmail.com', 0, '78954126985'),
('98B4444444', 'gest02', 'meriem', 'Bezgali', 'Madame', '1995-09-29', '16 rue moukhtar zarhouni ', '16000', 'bab zouar', 'Adra', '021141512', 'utshb', 'wafa.jil@hotmail.com', 0, '78954126985'),
('98B6666666', '', 'yacine', 'Bezgali', 'Monsieur', '1995-09-29', '16 rue moukhtar zarhouni ', '16000', 'bab zouar', 'Adra', '021141512', 'utshb', 'wafa.jil@hotmail.com', 0, '78954126985'),
('98B7777777', '', 'khalfallah', 'sihem', 'Monsieur', '1995-08-04', 'alger', '16000', 'mouhamadia', 'Adra', '021563987', 'hydrapharm', 'sihem@hotmail.com', 0, '1122237');

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE IF NOT EXISTS `commandes` (
  `id_com` int(11) NOT NULL AUTO_INCREMENT,
  `id_produit` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_client` varchar(255) NOT NULL,
  `nom_client` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `total` double NOT NULL,
  `date` datetime NOT NULL,
  `prix_unite` float NOT NULL,
  `id_listecommande` varchar(255) NOT NULL,
  `qty_boit` int(11) NOT NULL,
  `manque` int(11) NOT NULL,
  PRIMARY KEY (`id_com`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`id_com`, `id_produit`, `id_client`, `nom_client`, `prenom`, `qty`, `total`, `date`, `prix_unite`, `id_listecommande`, `qty_boit`, `manque`) VALUES
(72, 'FL0001', '98B1111111', 'Bouguelia', 'Sara', 10, 501500, '2017-05-29 23:57:34', 590, 'CMD1705ALG00001', 850, 0),
(73, 'FL0001', '98B1111111', 'Bouguelia', 'Sara', 10, 501500, '2017-05-29 23:57:48', 590, 'CMD1705ALG00002', 850, 1),
(74, 'BI0007', '98B7777777', 'khalfallah', 'sihem', 1, 21000, '2017-05-30 10:08:18', 140, 'CMD1705ADR00003', 150, 0),
(75, 'BI0004', '98B7777777', 'khalfallah', 'sihem', 10, 159900, '2017-05-30 10:13:45', 130, 'CMD1705ADR00004', 1230, 0),
(76, 'BI0003', '98B1111111', 'Bouguelia', 'Sara', 1, 67200, '2017-05-30 10:15:16', 560, 'CMD1705ALG00007', 120, 0),
(78, 'BI0004', '98B1234567', 'bezgali', 'meriem', 12, 191880, '2017-05-30 13:52:11', 130, 'CMD1705ALG00008', 1476, 0),
(79, 'FE0005', '98B1234567', 'bezgali', 'meriem', 5, 348000, '2017-05-30 13:52:22', 870, 'CMD1705ALG00008', 400, 0),
(80, 'BI0003', '98B1111111', 'Bouguelia', 'Sara', 12, 806400, '2017-05-30 14:01:06', 560, 'CMD1705ALG00009', 1440, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `objet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

CREATE TABLE IF NOT EXISTS `facture` (
  `id_facture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_listecommande` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_facturation` date NOT NULL,
  `prixremise` float NOT NULL,
  PRIMARY KEY (`id_facture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `facture`
--

INSERT INTO `facture` (`id_facture`, `id_listecommande`, `date_facturation`, `prixremise`) VALUES
('FAC1705ADR00003', 'CMD1705ADR00003', '2017-05-30', 0),
('FAC1705ADR00004', 'CMD1705ADR00004', '2017-05-30', 0),
('FAC1705ADR00005', 'CMD1705ADR00005', '2017-05-30', 0),
('FAC1705ADR00006', 'CMD1705ADR00006', '2017-05-30', 0),
('FAC1705ALG00001', 'CMD1705ALG00001', '2017-05-29', 0),
('FAC1705ALG00002', 'CMD1705ALG00002', '2017-05-29', 0),
('FAC1705ALG00007', 'CMD1705ALG00007', '2017-05-30', 0),
('FAC1705ALG00008', 'CMD1705ALG00008', '2017-05-30', 0),
('FAC1705ALG00009', 'CMD1705ALG00009', '2017-05-30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gestionnaire`
--

CREATE TABLE IF NOT EXISTS `gestionnaire` (
  `prenom` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `sexe` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `date` date NOT NULL,
  `addresse` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `code_postal` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `wilaya` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `nbr_client` int(11) NOT NULL,
  `i` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`i`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `gestionnaire`
--

INSERT INTO `gestionnaire` (`prenom`, `nom`, `sexe`, `date`, `addresse`, `code_postal`, `ville`, `wilaya`, `telephone`, `mail`, `nbr_client`, `i`, `id`) VALUES
('ryma', 'boumazouza', 'Monsieur', '1995-05-05', '16 rue moukhtar zarhouni', '16000', 'mohammadia', 'Alger', '021212121', 'wafa.jil@hotmail.Com', 5, 8, 'gest02');

-- --------------------------------------------------------

--
-- Table structure for table `listecommande`
--

CREATE TABLE IF NOT EXISTS `listecommande` (
  `id_facture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_client` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` double NOT NULL,
  `date_livraison` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_envoie` datetime NOT NULL,
  `date_fix` datetime NOT NULL,
  `id_gest` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_listecommande` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `i` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`i`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=50 ;

--
-- Dumping data for table `listecommande`
--

INSERT INTO `listecommande` (`id_facture`, `id_client`, `etat`, `total`, `date_livraison`, `quantity`, `date_envoie`, `date_fix`, `id_gest`, `id_listecommande`, `i`) VALUES
('FAC1705ALG00001', '98B1111111', 'archiver', 501500, '2017-05-05', 10, '2017-05-29 23:57:39', '2017-05-30 23:58:50', '', 'CMD1705ALG00001', 41),
('FAC1705ALG00002', '98B1111111', 'manque', 501500, '0000-00-00', 10, '2017-05-29 23:57:53', '0000-00-00 00:00:00', '', 'CMD1705ALG00002', 42),
('FAC1705ADR00003', '98B7777777', '', 21000, '0000-00-00', 1, '2017-05-30 10:08:58', '0000-00-00 00:00:00', '', 'CMD1705ADR00003', 43),
('FAC1705ADR00004', '98B7777777', '', 159900, '0000-00-00', 10, '2017-05-30 10:13:50', '0000-00-00 00:00:00', '', 'CMD1705ADR00004', 44),
('FAC1705ADR00005', '98B7777777', '', 0, '0000-00-00', 0, '2017-05-30 10:13:50', '0000-00-00 00:00:00', '', 'CMD1705ADR00005', 45),
('FAC1705ADR00006', '98B7777777', '', 0, '0000-00-00', 0, '2017-05-30 10:13:52', '0000-00-00 00:00:00', '', 'CMD1705ADR00006', 46),
('FAC1705ALG00007', '98B1111111', 'livre', 67200, '2017-08-04', 1, '2017-05-30 10:15:27', '2017-05-31 10:15:46', 'gest02', 'CMD1705ALG00007', 47),
('FAC1705ALG00008', '98B1234567', 'valide', 539880, '0000-00-00', 17, '2017-05-30 13:54:15', '2017-05-31 13:55:20', '', 'CMD1705ALG00008', 48),
('FAC1705ALG00009', '98B1111111', 'valide', 806400, '0000-00-00', 12, '2017-05-30 14:01:11', '2017-05-31 14:01:31', 'gest02', 'CMD1705ALG00009', 49);

-- --------------------------------------------------------

--
-- Table structure for table `listeproforma`
--

CREATE TABLE IF NOT EXISTS `listeproforma` (
  `id_client` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_produit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_proforma` int(11) NOT NULL,
  `prix_total` float NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prix_net` float NOT NULL,
  `prix_brut` float NOT NULL,
  `qty_boite` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `listeproforma`
--

INSERT INTO `listeproforma` (`id_client`, `id_produit`, `quantity`, `id_proforma`, `prix_total`, `id`, `prix_net`, `prix_brut`, `qty_boite`) VALUES
('98B7777777', 'BI0007', 1, 1, 21000, 1, 140, 0, 150),
('98B7777777', 'BI0007', 1, 2, 21000, 2, 140, 0, 150),
('98B1234567', 'BI0004', 12, 3, 191880, 3, 130, 0, 1476),
('98B1234567', 'FE0005', 5, 3, 348000, 4, 870, 0, 400);

-- --------------------------------------------------------

--
-- Table structure for table `messagerie`
--

CREATE TABLE IF NOT EXISTS `messagerie` (
  `id_msg` int(20) NOT NULL AUTO_INCREMENT,
  `expediteur` varchar(225) COLLATE utf8_lithuanian_ci NOT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_envoie` datetime NOT NULL,
  `objet` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `destinateur` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `vers` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`id_msg`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci AUTO_INCREMENT=72 ;

--
-- Dumping data for table `messagerie`
--

INSERT INTO `messagerie` (`id_msg`, `expediteur`, `message`, `date_envoie`, `objet`, `destinateur`, `vers`) VALUES
(69, 'admin', 'message1', '2017-05-29 23:55:41', 'objet1', '98B1111111', 'vers1'),
(70, 'admin', 'message1', '2017-05-29 23:55:41', 'objet1', '98B1111111', 'vers2'),
(71, 'gest02', 'aaaaaa', '2017-05-30 10:18:20', 'sss', '98B1111111', 'vers1');

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prix` float NOT NULL,
  `quantite` int(11) NOT NULL,
  `categories` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `forme` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `presentation` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dosage` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `quantite_achete` int(11) NOT NULL,
  `qty_mnq` int(11) NOT NULL,
  `quantity_par_carton` int(11) NOT NULL,
  `id` varchar(255) NOT NULL,
  `i` int(11) NOT NULL AUTO_INCREMENT,
  `dci` varchar(255) NOT NULL,
  PRIMARY KEY (`i`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`nom`, `prix`, `quantite`, `categories`, `image`, `forme`, `presentation`, `dosage`, `quantite_achete`, `qty_mnq`, `quantity_par_carton`, `id`, `i`, `dci`) VALUES
('FLAGYL 500 mg ', 590, 0, 'Anti-infectieux', 'medi/flagyl-ovule-500-mg-b-10_l.png', 'Ovule vaginale', 'B/10', '500mg', 60, 194, 85, 'FL0001', 1, '	IRBESARTAN'),
('ZECUF  Fl/120ml', 99, 36500, 'Pneumo-allergologie', 'medi/zecuf-sans-sucre-sirop-fl-120m_l.png', '100MG / 60MG / 50MG / 10MG / 60MG / 20MG / 20MG / 10MG / 20MG / 50MG / 06MG PAR 10ML', 'sirop a base de plantes medicinales', 'F/120ML', 0, 0, 200, 'ZE0002', 2, ' DICLOFENAC SODIQUE '),
('BIOFENAC 1% ', 560, 15549580, 'Anti-inflammatoire et antalgique', 'medi/biofenac-gel-1-t-50g_l.png', 'Gel', 'tube de 50g', '1%', 405976, 0, 120, 'BI0003', 3, '	IRBESARTAN'),
('BIOFENAC 25 mg', 130, 654658733, 'Anti-inflammatoire et antalgique', 'medi/biofenac-comp-25mg-b-30_l.png', 'comprimés\r\n', 'boite de 30 ', '25mg', 66298, 9, 123, 'BI0004', 4, 'DICLOFENAC SODIQUE'),
('FENOXAM 0,5% ', 870, 2131321048, 'Anti-inflammatoire et antalgique', 'medi/fenoxam-gel-0-5-t-50g_l.png', 'Gel', 'tube de 50g', '0,50%', 65473, 0, 80, 'FE0005', 5, '	PIROXICAM '),
('KINADYN-Calcium 500 mg', 580, 2147483647, 'Anti-inflammatoire et antalgique', 'medi/kinadyn-calcium-500-mg_l.png', 'PDRE. P. SUSP. BUV. EN SACHET DOSE', 'B/30SACHETS', '500MG/SACHET', 0, 0, 75, 'KI0006', 6, 'ACIDE ACETYL SALICYLIQUE'),
('BIOFENAC 100mg ', 140, 56165050, 'Anti-inflammatoire et antalgique', 'medi/biofenac-suppo-100mg-b-10_l.png', 'suppositoire', 'boite de 10', '100mg', 24924, 0, 150, 'BI0007', 7, 'ACIDE ACETYL SALICYLIQUE'),
('CO-IRBEVEL ', 610, 23113703, 'Cardiologie', 'medi/co-irbevel-comp-pell-300-mg-25-mg-b-30_l.png', 'comprimés pelliculés', 'Boite de 30 comprimés', '300 / 25 mg', 41067, 0, 85, 'CO0008', 8, 'IRBESARTAN'),
('CLOTASOL  0,05% ', 799, 477779, 'Dermatologie', 'medi/clotasol-creme-0-05-t-45g123_l.png', 'crème', 'tube de 45gr', '0.05%', 321, 0, 130, 'CL0009', 9, 'ACIDE ACETYL SALICYLIQUE'),
('CO-IRBEVEL 150mg', 850, 780662, 'Cardiologie', 'medi/co-irbevel-comp-pell-150mg-12-5-mg-b-30_l.png', 'comprimés pelliculés', 'Boite de 30 comprimés', '150 / 12.5 mg', 338, 0, 100, 'CO0010', 10, 'ACIDE ACETYL SALICYLIQUE'),
('FENOXAM 20mg ', 120, 131313251, 'Anti-inflammatoire et antalgique', 'medi/fenoxam-comp-orodisp-20mg-b-10_l.png', 'Boite de 10 comprimés', 'comprimï¿½s orodispersible', '20mg', 457000, 0, 160, 'FE0011', 11, 'PIROXICAM'),
('OSMOSOFT 50ml', 499, 16000, 'Anti-inflammatoire et antalgique', 'medi/osmosoft-hydrogel-tube-50ml_l.png', 'Hydrogel', 'aucune', 'tube de 50 ml', 0, 0, 98, 'OS0012', 12, 'IRBESARTAN'),
('IRBEVEL 300mg \r\n', 1250, 300, 'Cardiologie', 'medi/irbevel-comp-300mg-b-30_l.png', 'comprimés pelliculés', 'boite de 30 cp', '300mg', 3201, 0, 50, 'IR0014', 14, 'HYDROCHLOROTHIAZIDE '),
('CO-IRBEVEL 300 mg ', 941, 451000, 'Cardiologie', 'medi/co-irbevel-comp-pell-300-mg-12-5-mg-b-30_l.png', 'comprimés pelliculés', 'Boite de 30 comprimés', '300 / 12.5 mg', 0, 0, 53, 'CO0015', 15, 'HYDROCHLOROTHIAZIDE '),
('LESLA Cp 10mg', 500, 123, 'Cardiologie', ' medi/lesla-cp-10mg_l.png', 'comprimÃ©s pelliculÃ©s ', 'boite de 30', '10 MG ', 0, 0, 50, 'LE0123', 16, 'BISOPROLOL'),
('IRBEVEL Comp 150mg ', 550, 1230, 'Cardiologie', ' medi/co-irbevel-comp-pell-150mg-12-5-mg-b-30_l.png', 'comprimÃ©s pelliculÃ©s', 'boite de 30 cp ', '150mg', 0, 0, 60, 'IR1236', 17, 'IRBESARTAN '),
('ASPIRINE CARDIO Comp', 550, 1230, 'Cardiologie', ' medi/aspirine-cardio-comp-100-mg-b-60_l.png', 'ComprimÃ©s ', 'boite de 60 ', '100 MG', 0, 0, 60, 'AS1598', 18, 'ACIDE ACETYL SALICYLIQUE'),
('KINADYN-Calcium 500 mg', 550, 100, 'Pneumo-allergologie', ' medi/kinadyn-calcium-500-mg_l.png', 'PDRE. P. SUSP. BUV. EN SACHET DOSE ', '		B/30SACHETS ', '		500MG/SACHET ', 0, 0, 60, 'KI0011', 19, ' CALCIUM'),
('ZECUF Sirop Fl/120ml', 600, 1004, 'Pneumo-allergologie', ' medi/zecuf-sirop-fl-120ml_l.png', 'SIROP A BASE DE ONZE PLANTES MEDICINALES ', 'FL/120ML ', '100MG / 60MG / 50MG / 10MG / 60MG / 20MG / 20MG / 10MG / 20MG / 50MG / 06MG par 10ML ', 0, 0, 78, 'ZE0011', 20, ' CALCIUM'),
('RYNZA Sachet 5gr B/5', 700, 104, 'Pneumo-allergologie', ' medi/rynza-sachet-5gr-b-5_l.png', 'PDRE. SOL. BUV. EN SACH.-DOSE ', 'B/5 SACH. DE 5G', '750MG/20MG/10MG/30MG/SACH. DE 5G ', 0, 0, 78, 'RY1560', 21, ' PARACETAMOL/PHENYLEPHRINE/PHENIRAMINE/CAFEINE'),
(' ZECUF sans sucre ', 650, 1486, 'Pneumo-allergologie', ' medi/zecuf-sans-sucre-sirop-fl-120m_l.png', '100MG / 60MG / 50MG / 10MG / 60MG / 20MG / 20MG / 10MG / 20MG / 50MG / 06MG PAR 10ML ', 'F/120ML ', 'SIROP A BASE DE ONZE PLANTES MEDICINALES ', 0, 0, 78, 'ZE0015', 22, 'SIROP A BASE DE PLANTES'),
('OSMOSOFT Hydrogel', 562, 2147483647, 'Dermatologie', ' medi/osmosoft-hydrogel-tube-50ml_l.png', 'Hydrogel ', 'tube de 50 ml', '50 ml', 0, 0, 30, 'OS0006', 23, 'HYDROGEL'),
('TERBINAN 1%', 562, 2147483647, 'Cardiologie', ' medi/terbinan-1-creme-tube-de-15g_l.png', 'crÃ¨me ', 'tube de 15gr ', '1%', 0, 0, 25, 'TE4875', 24, 'HYDROGEL'),
('CLOTASOL Gel 0,05%', 150, 2147483647, 'Dermatologie', ' medi/clotasol-creme-0-05-t-45g123_l.png', 'crÃ¨me ', 'tube de 45gr ', ' 0.05% ', 0, 0, 15, 'CL8954', 25, 'HYDROGEL'),
('NOBAC NOURRISSON', 350, 46529296, 'Gastro-enterologie', ' medi/nobac-nourrisson-susp-buv-150ml-b-1_l.png', 'B/1FL. DE 250ML ', 'B/1FL. DE 150ML +UNE SERING. GRADUEE ', ' 0.05% ', 0, 0, 18, 'NO6591', 26, '50MG/26,7MG/ML '),
('LOMAC Gelules 20MG', 250, 46529296, 'Gastro-enterologie', ' medi/lomac-gelules-20mg-b-15_l.png', '		GLES. A MICROGRANULES. GASTRORESISTES ', 'PILULIER DE 15 ', '20MG ', 0, 0, 25, 'LO5478', 27, '50MG/26,7MG/ML '),
('NOBAC ADULTE Susp', 300, 1548963, 'Gastro-enterologie', ' medi/nobac-adulte-susp-buv-50mg-26-7mg-ml_l.png', 'SUSP. BUV. ', 'B/1FL. DE 250ML ', '50MG/26,7MG/ML ', 0, 0, 35, 'NO4781', 28, 'ALGINATE DE SODIUM/BICARBONATE DE SODIUM');

-- --------------------------------------------------------

--
-- Table structure for table `proforma`
--

CREATE TABLE IF NOT EXISTS `proforma` (
  `date` date NOT NULL,
  `quantity_total` int(11) NOT NULL,
  `prix_total` double NOT NULL,
  `id_listeproforma` int(11) NOT NULL,
  `id_proforma` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_proforma`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `proforma`
--

INSERT INTO `proforma` (`date`, `quantity_total`, `prix_total`, `id_listeproforma`, `id_proforma`) VALUES
('2017-05-30', 150, 21000, 1, 1),
('2017-05-30', 150, 21000, 2, 2),
('2017-05-30', 1876, 539880, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `mot_de_passe`, `type`) VALUES
('98B1111111', '356a192b7913b04c54574d18c28d46e6395428ab', 'gr'),
('98B1234567', '356a192b7913b04c54574d18c28d46e6395428ab', 'gr'),
('98B2222222', '356a192b7913b04c54574d18c28d46e6395428ab', 'gr'),
('98B3333333', '356a192b7913b04c54574d18c28d46e6395428ab', 'gr'),
('98B4444444', '356a192b7913b04c54574d18c28d46e6395428ab', 'gr'),
('98B6666666', '356a192b7913b04c54574d18c28d46e6395428ab', 'gr'),
('98B7777777', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'gr'),
('admin', '53f4bd93b92add0bad428bf92b53f89f0c23bbdf', 'ad'),
('gest02', '356a192b7913b04c54574d18c28d46e6395428ab', 'gs');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
