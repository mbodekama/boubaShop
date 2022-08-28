-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 31 mai 2021 à 17:49
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `attributs`
--

CREATE TABLE `attributs` (
  `id` int(11) NOT NULL,
  `type` varchar(150) NOT NULL,
  `libelle` varchar(45) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT 'description de l''élément'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `attributs`
--

INSERT INTO `attributs` (`id`, `type`, `libelle`, `code`, `description`) VALUES
(1, 'Aucun', 'ND', 'ND', 'description de la taille'),
(2, 'couleur', 'Noir', '#000', 'description de l\'élément'),
(3, 'pointure', '20', '20', 'description de l\'élément'),
(4, 'epaisseur', 'Epaisseur 1', '1', 'description de l\'élément'),
(5, 'epaisseur', 'Epaisseur 2', '2', 'description de l\'élément'),
(6, 'epaisseur', 'Epaisseur 3', '3', 'description de l\'élément'),
(7, 'epaisseur', 'Epaisseur 4', '4', 'description de l\'élément'),
(8, 'epaisseur', 'Epaisseur 5', '5', 'description de l\'élément'),
(9, 'epaisseur', 'Epaisseur 6', '6', 'description de l\'élément'),
(10, 'epaisseur', 'Epaisseur 7', '7', 'description de l\'élément'),
(11, 'epaisseur', 'Epaisseur 8', '8', 'description de l\'élément'),
(12, 'epaisseur', 'Epaisseur 9', '9', 'description de l\'élément'),
(13, 'epaisseur', 'Epaisseur 10', '10', 'description de l\'élément'),
(14, 'epaisseur', 'Epaisseur 11', '11', 'description de l\'élément'),
(15, 'epaisseur', 'Epaisseur 12', '12', 'description de l\'élément'),
(16, 'epaisseur', 'Epaisseur 13', '13', 'description de l\'élément'),
(17, 'epaisseur', 'Epaisseur 14', '14', 'description de l\'élément'),
(18, 'epaisseur', 'Epaisseur 15', '15', 'description de l\'élément'),
(19, 'epaisseur', 'Epaisseur 16', '16', 'description de l\'élément'),
(20, 'epaisseur', 'Epaisseur 17', '17', 'description de l\'élément'),
(21, 'epaisseur', 'Epaisseur 18', '18', 'description de l\'élément'),
(22, 'epaisseur', 'Epaisseur 19', '19', 'description de l\'élément'),
(23, 'epaisseur', 'Epaisseur 20', '20', 'description de l\'élément'),
(24, 'epaisseur', 'Epaisseur 21', '21', 'description de l\'élément'),
(25, 'epaisseur', 'Epaisseur 22', '22', 'description de l\'élément'),
(26, 'epaisseur', 'Epaisseur 23', '23', 'description de l\'élément'),
(27, 'epaisseur', 'Epaisseur 24', '24', 'description de l\'élément'),
(28, 'taille', 'L', 'L', 'description de la taille'),
(29, 'taille', 'XL', 'XL', 'description de la taille'),
(30, 'taille', 'XXL', 'XXL', 'description de la taille'),
(31, 'taille', 'XXXL', 'XXXL', 'description de la taille'),
(32, 'taille', 'M', 'M', 'description de la taille'),
(33, 'taille', 'S', 'S', 'description de la taille'),
(34, 'taille', 'XS', 'XS', 'description de la taille'),
(35, 'taille', 'XXS', 'XXS', 'description de la taille'),
(36, 'couleur', 'blanc', '#FFFFFF', 'description de l\'élément'),
(37, 'couleur', 'Argent', '#C0C0C0', 'description de l\'élément'),
(38, 'couleur', 'gris', '#808080', 'description de l\'élément'),
(39, 'couleur', 'rouge', '#FF0000', 'description de l\'élément'),
(40, 'couleur', 'Bordeaux', '#800000', 'description de l\'élément'),
(41, 'couleur', 'Jaune', '#FFFF00', 'description de l\'élément'),
(42, 'couleur', 'olive', '#808000', 'description de l\'élément'),
(43, 'couleur', 'Chaux', '#00FF00', 'description de l\'élément'),
(44, 'couleur', 'Vert', '#008000', 'description de l\'élément'),
(45, 'couleur', 'Aqua', '#00FFFF', 'description de l\'élément'),
(46, 'couleur', 'Sarcelle', '#008080', 'description de l\'élément'),
(47, 'couleur', 'Bleu', '#0000FF', 'description de l\'élément'),
(48, 'couleur', 'Marine', '#000080', 'description de l\'élément'),
(49, 'couleur', 'Violet', '#FF00FF', 'description de l\'élément'),
(50, 'couleur', 'Mauve', '#800080', 'description de l\'élément'),
(51, 'pointure', 'pointure 20', '20', 'description de l\'élément'),
(52, 'pointure', 'pointure 21', '21', 'description de l\'élément'),
(53, 'pointure', 'pointure 22', '22', 'description de l\'élément'),
(54, 'pointure', 'pointure 23', '23', 'description de l\'élément'),
(55, 'pointure', 'pointure 24', '24', 'description de l\'élément'),
(56, 'pointure', 'pointure 25', '25', 'description de l\'élément'),
(57, 'pointure', 'pointure 26', '26', 'description de l\'élément'),
(58, 'pointure', 'pointure 27', '27', 'description de l\'élément'),
(59, 'pointure', 'pointure 28', '28', 'description de l\'élément'),
(60, 'pointure', 'pointure 29', '29', 'description de l\'élément'),
(61, 'pointure', 'pointure 30', '30', 'description de l\'élément'),
(62, 'pointure', 'pointure 31', '31', 'description de l\'élément'),
(63, 'pointure', 'pointure 32', '32', 'description de l\'élément'),
(64, 'pointure', 'pointure 33', '33', 'description de l\'élément'),
(65, 'pointure', 'pointure 34', '34', 'description de l\'élément'),
(66, 'pointure', 'pointure 35', '35', 'description de l\'élément'),
(67, 'pointure', 'pointure 36', '36', 'description de l\'élément'),
(68, 'pointure', 'pointure 37', '37', 'description de l\'élément'),
(69, 'pointure', 'pointure 38', '38', 'description de l\'élément'),
(70, 'pointure', 'pointure 39', '39', 'description de l\'élément'),
(71, 'pointure', 'pointure 40', '40', 'description de l\'élément'),
(72, 'pointure', 'pointure 41', '41', 'description de l\'élément'),
(73, 'pointure', 'pointure 42', '42', 'description de l\'élément'),
(74, 'pointure', 'pointure 43', '43', 'description de l\'élément'),
(75, 'pointure', 'pointure 44', '44', 'description de l\'élément'),
(76, 'pointure', 'pointure 45', '45', 'description de l\'élément'),
(77, 'pointure', 'pointure 46', '46', 'description de l\'élément'),
(78, 'pointure', 'pointure 47', '47', 'description de l\'élément'),
(79, 'pointure', 'pointure 48', '48', 'description de l\'élément'),
(80, 'pointure', 'pointure 49', '49', 'description de l\'élément');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categorie` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `categorie`, `updated_at`, `created_at`) VALUES
(21, 'vêtement', '2021-05-14 13:42:21', '2021-05-14 13:42:21'),
(22, 'chaussure', '2021-05-14 13:42:37', '2021-05-14 13:42:37'),
(24, 'accessoire', '2021-05-16 07:28:44', '2021-05-16 07:28:44');

-- --------------------------------------------------------

--
-- Structure de la table `catg_has_scatgs`
--

CREATE TABLE `catg_has_scatgs` (
  `id` int(11) NOT NULL,
  `Idcatg` varchar(11) NOT NULL,
  `Idscatg` varchar(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `catg_has_scatgs`
--

INSERT INTO `catg_has_scatgs` (`id`, `Idcatg`, `Idscatg`, `created_at`, `updated_at`) VALUES
(13, '22', '7', '2021-05-14 13:44:55', '2021-05-14 13:44:55'),
(14, '22', '8', '2021-05-14 13:45:05', '2021-05-14 13:45:05'),
(15, '21', '9', '2021-05-14 13:45:26', '2021-05-14 13:45:26'),
(16, '21', '6', '2021-05-14 13:45:36', '2021-05-14 13:45:36');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` text,
  `prenom` text,
  `domicile` text COMMENT 'Domicile ',
  `ville` text,
  `pays` text,
  `numero_telephone` text,
  `mail` text,
  `pass` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `domicile`, `ville`, `pays`, `numero_telephone`, `mail`, `pass`, `created_at`, `updated_at`) VALUES
(1, 'client1', 'testera', NULL, NULL, NULL, '2250153808065', 'admin@academy.com', 'admin1234', '2021-05-17 10:31:16', '2021-05-17 10:31:16'),
(2, 'CLIENT', 'TESTER', NULL, NULL, NULL, '2250112131415', 'admin@connectika.com', 'meneya2020', '2021-05-19 10:03:13', '2021-05-19 10:03:13'),
(3, 'TESTER2', 'TEST', NULL, NULL, NULL, '8785123231', 'client@connectika.com', 'admin1234', '2021-05-19 10:23:19', '2021-05-19 10:23:19'),
(4, 'BEDDA', 'ERNEST', NULL, NULL, NULL, '54525658', 'beda@connectika.com', 'beda@connectika.com', '2021-05-19 11:04:26', '2021-05-19 11:04:26'),
(5, 'testeur1', 'TEST', NULL, NULL, NULL, '54654654645465', 'testeur1@meneya.com', 'testeur1@meneya.com', '2021-05-19 15:11:59', '2021-05-19 15:11:59');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `montant` int(11) DEFAULT NULL,
  `dateComd` text,
  `numComd` text COMMENT 'Numéro unique de la commande\n',
  `Statut` int(11) DEFAULT NULL COMMENT '0 : New\r\n\r\n1 : livré\r\n\r\n2 : refusé',
  `paiement` text COMMENT '1 : Payé à la livraison\r\n2 : Payer avant  la livraison',
  `solde` int(11) DEFAULT NULL COMMENT '1:soldé/0:non soldé',
  `client_id` int(11) NOT NULL,
  `lieuLivraison` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `montant`, `dateComd`, `numComd`, `Statut`, `paiement`, `solde`, `client_id`, `lieuLivraison`, `created_at`, `updated_at`) VALUES
(26, 3004, '11-04-2021 09:44:02', '20210411094402', 1, '1', 0, 8, 'Côte d\'ivoire-Yamoussoukro : 3000 cfa', '2021-04-11 07:44:03', '2021-04-11 07:44:03'),
(27, 2036, '11-04-2021 18:15:06', '20210411181506', 0, '1', 0, 8, 'Côte d\'ivoire-Abidjan : 2000 cfa', '2021-04-11 16:15:07', '2021-04-11 16:15:07'),
(31, 10001, '19-04-2021 15:38:10', '20210419153810', 1, '1', 0, 11, 'Côte d\'ivoire-Dabou : 5000 cfa', '2021-04-19 13:38:10', '2021-04-19 13:38:10'),
(32, 29000, '17-05-2021 12:03:05', '20210517120305', 0, '1', 0, 1, 'Côte d\'ivoire-Dabou : 5000 cfa', '2021-05-17 11:03:09', '2021-05-17 11:03:09'),
(33, 15000, '17-05-2021 12:07:16', '20210517120716', 0, '1', 0, 1, 'Côte d\'ivoire-Dabou : 5000 cfa', '2021-05-17 11:07:21', '2021-05-17 11:07:21'),
(34, 15000, '17-05-2021 12:15:29', '20210517121529', 0, '1', 0, 1, 'Côte d\'ivoire-Dabou : 5000 cfa', '2021-05-17 11:15:30', '2021-05-17 11:15:30'),
(35, 15000, '18-05-2021 12:55:59', '20210518125559', 0, '1', 0, 1, 'Côte d\'ivoire-Dabou : 5000 cfa', '2021-05-18 11:56:00', '2021-05-18 11:56:00'),
(36, 26000, '18-05-2021 13:01:35', '20210518130135', 0, '1', 0, 1, 'Côte d\'ivoire-Dabou : 5000 cfa', '2021-05-18 12:01:36', '2021-05-18 12:01:36'),
(37, 15000, '19-05-2021 11:20:59', '20210519112059', 0, '1', 0, 2, 'Côte d\'ivoire-Dabou : 5000 cfa', '2021-05-19 10:21:00', '2021-05-19 10:21:00'),
(38, 10000, '19-05-2021 11:24:30', '20210519112430', 1, '1', 0, 3, 'Côte d\'ivoire-Dabou : 5000 cfa', '2021-05-19 10:24:31', '2021-05-19 10:24:31'),
(39, 60000, '19-05-2021 11:28:01', '20210519112801', 0, '1', 0, 3, 'Côte d\'ivoire-Dabou : 5000 cfa', '2021-05-19 10:28:03', '2021-05-19 10:28:03'),
(40, 13000, '19-05-2021 12:04:36', '20210519120436', 0, '1', 0, 4, 'Côte d\'ivoire-Dabou : 5000 cfa', '2021-05-19 11:04:55', '2021-05-19 11:04:55'),
(41, 10000, '19-05-2021 12:22:15', '20210519122215', 0, '1', 0, 4, 'Côte d\'ivoire-Dabou : 5000 cfa', '2021-05-19 11:22:17', '2021-05-19 11:22:17'),
(42, 15000, '19-05-2021 12:29:47', '20210519122947', 0, '1', 0, 4, 'Côte d\'ivoire-Dabou : 5000 cfa', '2021-05-19 11:29:47', '2021-05-19 11:29:47'),
(43, 10000, '19-05-2021 12:30:36', '20210519123036', 0, '1', 0, 4, 'Côte d\'ivoire-Dabou : 5000 cfa', '2021-05-19 11:30:36', '2021-05-19 11:30:36'),
(44, 15000, '19-05-2021 12:32:19', '20210519123219', 0, '1', 0, 4, 'Côte d\'ivoire-Dabou : 5000 cfa', '2021-05-19 11:32:20', '2021-05-19 11:32:20');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `images` text,
  `produits_id` int(11) NOT NULL,
  `produits_categorie_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `images`, `produits_id`, `produits_categorie_id`, `updated_at`, `created_at`) VALUES
(1, 'storage/imgProd/ilbG87Mp01u3bWz2WdX5PwdYT1nmsYMRVZ9iLUmM.jpeg', 49, 21, '2021-05-21 15:07:26', '2021-05-21 15:07:26'),
(2, 'storage/imgProd/zUQ190Om4rVK3xzi7FuCzSdZOCjlowMWBgma1YNh.jpeg', 49, 21, '2021-05-21 15:07:26', '2021-05-21 15:07:26'),
(3, 'storage/imgProd/AHbEsXdcCd24EDEiPRKaNRfPVUPV6CTWDCA1CRdw.jpeg', 54, 22, '2021-05-31 09:33:35', '2021-05-31 09:33:35');

-- --------------------------------------------------------

--
-- Structure de la table `img_prd_by_colors`
--

CREATE TABLE `img_prd_by_colors` (
  `id` int(11) NOT NULL,
  `lien` varchar(250) DEFAULT NULL,
  `produits_id` int(11) NOT NULL,
  `attributs_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `img_prd_by_colors`
--

INSERT INTO `img_prd_by_colors` (`id`, `lien`, `produits_id`, `attributs_id`, `created_at`, `updated_at`) VALUES
(2, 'storage/imgPrdByColor/pV1BTK7GZRNuShkQkX7kWRNE2FkfOT7aP2RH1Igs.jpeg', 54, 44, '2021-05-31 10:59:52', '2021-05-31 10:59:52'),
(3, 'storage/imgProd/qDDZQtQxJi5dmg307hP2F5t5m3h0JGYF8ZwyZGrC.jpeg', 54, 41, '2021-05-31 10:59:53', '2021-05-31 10:59:53'),
(4, 'storage/imgPrdByColor/pV1BTK7GZRNuShkQkX7kWRNE2FkfOT7aP2RH1Igs.jpeg', 54, 44, '2021-05-31 11:15:07', '2021-05-31 11:15:07'),
(5, 'storage/imgProd/qDDZQtQxJi5dmg307hP2F5t5m3h0JGYF8ZwyZGrC.jpeg', 54, 41, '2021-05-31 11:15:07', '2021-05-31 11:15:07'),
(6, 'storage/imgPrdByColor/8sxsGKXwQkqH8kNX5ITBO87IOPMhG4mqEobPtAbO.png', 55, 38, '2021-05-31 11:33:53', '2021-05-31 11:33:53');

-- --------------------------------------------------------

--
-- Structure de la table `livraisons`
--

CREATE TABLE `livraisons` (
  `id` int(11) NOT NULL,
  `livraison` varchar(45) DEFAULT NULL COMMENT 'prix de la livraison\n',
  `ville_id` int(11) NOT NULL,
  `ville_pays_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livraisons`
--

INSERT INTO `livraisons` (`id`, `livraison`, `ville_id`, `ville_pays_id`, `updated_at`, `created_at`) VALUES
(3, '5000', 3, 1, '2021-04-19 13:11:21', '2021-04-19 13:11:21'),
(4, '0', 4, 1, '2021-05-19 16:03:31', '2021-05-19 16:03:31');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `paiements`
--

CREATE TABLE `paiements` (
  `id` int(11) NOT NULL COMMENT 'table de vérification du paiement cinetpay',
  `codepaiement` text NOT NULL,
  `statuPaiement` text NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `paiements`
--

INSERT INTO `paiements` (`id`, `codepaiement`, `statuPaiement`, `amount`, `created_at`, `updated_at`) VALUES
(1, '19052021142009', '0', 5005, '2021-05-19 13:20:09', '2021-05-19 13:20:09'),
(2, '19052021142347', '0', 5029, '2021-05-19 13:23:47', '2021-05-19 13:23:47'),
(3, '19052021142624', '0', 5029, '2021-05-19 13:26:24', '2021-05-19 13:26:24'),
(4, '19052021142901', '0', 34000, '2021-05-19 13:29:01', '2021-05-19 13:29:01'),
(5, '19052021161211', '0', 10000, '2021-05-19 15:12:11', '2021-05-19 15:12:11'),
(6, '19052021165432', '0', 10000, '2021-05-19 15:54:32', '2021-05-19 15:54:32'),
(7, '19052021170414', '0', 100, '2021-05-19 16:04:14', '2021-05-19 16:04:14'),
(8, '19052021170900', '0', 100, '2021-05-19 16:09:00', '2021-05-19 16:09:00'),
(9, '19052021171104', '0', 100, '2021-05-19 16:11:04', '2021-05-19 16:11:04'),
(10, '21052021103559', '0', 23487, '2021-05-21 09:35:59', '2021-05-21 09:35:59'),
(11, '21052021103611', '0', 23487, '2021-05-21 09:36:11', '2021-05-21 09:36:11'),
(12, '21052021104116', '0', 23487, '2021-05-21 09:41:16', '2021-05-21 09:41:16'),
(13, '21052021104856', '0', 23487, '2021-05-21 09:48:56', '2021-05-21 09:48:56'),
(14, '21052021105059', '0', 23487, '2021-05-21 09:50:59', '2021-05-21 09:50:59'),
(15, '21052021111234', '0', 100, '2021-05-21 10:12:34', '2021-05-21 10:12:34'),
(16, '21052021111313', '0', 100, '2021-05-21 10:13:13', '2021-05-21 10:13:13'),
(17, '21052021111330', '0', 100, '2021-05-21 10:13:30', '2021-05-21 10:13:30'),
(18, '21052021112619', '0', 100, '2021-05-21 10:26:19', '2021-05-21 10:26:19');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id` int(11) NOT NULL,
  `pays` text,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `pays`, `updated_at`, `created_at`) VALUES
(1, 'Côte d\'ivoire', '2021-04-19 09:54:35', '2021-04-19 09:54:35');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` text,
  `prix` text,
  `quantite` int(11) NOT NULL,
  `img` text,
  `description` text,
  `categorie_id` int(11) NOT NULL,
  `idsctg` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `statut` int(11) NOT NULL COMMENT '0:nouvelle / 1:publie/2:bloque'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `prix`, `quantite`, `img`, `description`, `categorie_id`, `idsctg`, `updated_at`, `created_at`, `statut`) VALUES
(36, 'Chemises Bleu', '5000', 0, 'storage/imgProd/Z4ECo6Sgeu9FoXSg8LFVWQTAYONjFA8YMLSSj4ep.png', 'un produit fait local par PRUNEK', 21, 9, '2021-05-14 13:47:22', '2021-05-14 13:47:22', 1),
(37, 'Chemises orange', '8000', 0, 'storage/imgProd/KtjjihzhWLkl4yP0A8Jt8JBsUYhMJceLcO5D8F1y.png', 'Achetez et rendrez vous beau chez PRUNEK', 21, 9, '2021-05-14 13:48:07', '2021-05-14 13:48:07', 1),
(38, 'Paire Adidas', '5000', 0, 'storage/imgProd/O9FgjNfpXOqrGymVeK3gDsjYINmwUllrh2PDu3gg.png', 'Que de beaux articles avec nous', 22, 10, '2021-05-15 21:43:16', '2021-05-15 21:43:16', 1),
(39, 'Sac gucci', '5000', 0, 'storage/imgProd/RbExrNaHRQG0HQWCCeMue0zu0yXj9iUU3z1BkbXq.jpeg', 'rendez vous tres chics', 24, 10, '2021-05-16 07:32:24', '2021-05-16 07:32:24', 1),
(47, 'Babouche Jaune', '7800', 0, 'storage/imgProd/OQqZTPidoK31NkbB7LTTkYgU3fbyIOwdJedqckw8.png', 'babouche', 22, 10, '2021-05-21 11:50:46', '2021-05-21 11:50:46', 1),
(49, 'chemise en pagne', '45000', 0, 'storage/imgProd/H5bEFsBbGf9FdhhdH9RrI02kI2Ae9qNRtUQnD4RH.jpeg', 'tunique en crèpe', 21, 10, '2021-05-21 15:07:26', '2021-05-21 15:07:26', 1),
(50, 'TEST FOOT', '15400', 0, 'storage/imgProd/9XSEN3AMjnwqIMPvqo82EhJjvxasWr20T6UoPxFO.jpeg', 'IMAGE DE TEST', 22, 10, '2021-05-25 15:55:00', '2021-05-25 15:55:00', 1),
(53, 'azerty', '1500', 10, 'storage/imgProd/iO5vBHHDIzQfiRTRDdhMJ8Ug9sBtuWw6tWbJJCRY.jpeg', NULL, 24, 10, '2021-05-28 18:10:55', '2021-05-28 18:10:55', 1),
(54, 'PAIRE DOLCE', '45700', 55, 'storage/imgProd/qDDZQtQxJi5dmg307hP2F5t5m3h0JGYF8ZwyZGrC.jpeg', 'PAIRE DOLGE', 22, 10, '2021-05-31 09:33:35', '2021-05-31 09:33:35', 1),
(55, 'Cahier', '1250', 10, 'storage/imgProd/jCAMzMpUAJtE6gdLm68GCecPqG0zmbB8jetWmUBl.png', NULL, 24, 10, '2021-05-31 11:31:26', '2021-05-31 11:31:26', 1),
(56, 'azertyy', '1', 1200, 'storage/imgProd/Bl3d3leE5VmS5Y2VuO7KdiLgKZO2H2eqHnaQWXil.png', NULL, 24, 10, '2021-05-31 13:27:54', '2021-05-31 13:27:54', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produits_has_attributs`
--

CREATE TABLE `produits_has_attributs` (
  `id` int(11) NOT NULL,
  `produits_id` int(11) NOT NULL,
  `attributs_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits_has_attributs`
--

INSERT INTO `produits_has_attributs` (`id`, `produits_id`, `attributs_id`, `created_at`, `updated_at`) VALUES
(9, 54, 29, '2021-05-31 10:59:52', '2021-05-31 10:59:52'),
(10, 54, 44, '2021-05-31 10:59:52', '2021-05-31 10:59:52'),
(11, 54, 30, '2021-05-31 10:59:52', '2021-05-31 10:59:52'),
(12, 54, 41, '2021-05-31 10:59:52', '2021-05-31 10:59:52'),
(13, 54, 29, '2021-05-31 11:15:07', '2021-05-31 11:15:07'),
(14, 54, 44, '2021-05-31 11:15:07', '2021-05-31 11:15:07'),
(15, 54, 30, '2021-05-31 11:15:07', '2021-05-31 11:15:07'),
(16, 54, 41, '2021-05-31 11:15:07', '2021-05-31 11:15:07'),
(17, 55, 28, '2021-05-31 11:33:53', '2021-05-31 11:33:53'),
(18, 55, 3, '2021-05-31 11:33:53', '2021-05-31 11:33:53'),
(19, 55, 4, '2021-05-31 11:33:53', '2021-05-31 11:33:53'),
(20, 55, 38, '2021-05-31 11:33:53', '2021-05-31 11:33:53');

-- --------------------------------------------------------

--
-- Structure de la table `produits_has_clients`
--

CREATE TABLE `produits_has_clients` (
  `id` int(11) NOT NULL,
  `produits_id` int(11) NOT NULL,
  `produits_categorie_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `datecomd` text NOT NULL,
  `numComd` text NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits_has_clients`
--

INSERT INTO `produits_has_clients` (`id`, `produits_id`, `produits_categorie_id`, `client_id`, `qte`, `montant`, `datecomd`, `numComd`, `updated_at`, `created_at`) VALUES
(6, 38, 7, 8, 1, 4, '10-04-2021 21:43:34', '20210410214334', '2021-04-10 19:43:34', '2021-04-10 19:43:34'),
(7, 38, 7, 8, 1, 4, '10-04-2021 21:44:49', '20210410214449', '2021-04-10 19:44:49', '2021-04-10 19:44:49'),
(8, 38, 7, 8, 1, 4, '10-04-2021 21:45:37', '20210410214537', '2021-04-10 19:45:37', '2021-04-10 19:45:37'),
(9, 38, 7, 8, 1, 4, '10-04-2021 21:45:46', '20210410214546', '2021-04-10 19:45:47', '2021-04-10 19:45:47'),
(10, 38, 7, 8, 1, 4, '10-04-2021 21:46:08', '20210410214608', '2021-04-10 19:46:08', '2021-04-10 19:46:08'),
(11, 38, 7, 8, 1, 4, '10-04-2021 21:46:18', '20210410214618', '2021-04-10 19:46:18', '2021-04-10 19:46:18'),
(12, 38, 7, 8, 1, 4, '10-04-2021 21:46:50', '20210410214650', '2021-04-10 19:46:50', '2021-04-10 19:46:50'),
(13, 38, 7, 8, 1, 4, '11-04-2021 07:45:27', '20210411074527', '2021-04-11 05:45:27', '2021-04-11 05:45:27'),
(14, 38, 7, 8, 1, 4, '11-04-2021 07:45:47', '20210411074547', '2021-04-11 05:45:47', '2021-04-11 05:45:47'),
(15, 38, 7, 8, 1, 4, '11-04-2021 07:51:26', '20210411075126', '2021-04-11 05:51:26', '2021-04-11 05:51:26'),
(16, 38, 7, 8, 1, 4, '11-04-2021 07:53:42', '20210411075342', '2021-04-11 05:53:42', '2021-04-11 05:53:42'),
(17, 38, 7, 8, 1, 4, '11-04-2021 07:53:57', '20210411075357', '2021-04-11 05:53:57', '2021-04-11 05:53:57'),
(23, 38, 7, 8, 1, 4, '11-04-2021 09:44:02', '20210411094402', '2021-04-11 07:44:02', '2021-04-11 07:44:02'),
(24, 38, 7, 8, 9, 36, '11-04-2021 18:15:06', '20210411181506', '2021-04-11 16:15:06', '2021-04-11 16:15:06'),
(28, 9, 15, 11, 1, 5001, '19-04-2021 15:38:10', '20210419153810', '2021-04-19 13:38:10', '2021-04-19 13:38:10'),
(29, 37, 21, 1, 1, 8000, '17-05-2021 11:36:37', '20210517113637', '2021-05-17 10:36:37', '2021-05-17 10:36:37'),
(30, 37, 21, 1, 1, 8000, '17-05-2021 11:36:37', '20210517113637', '2021-05-17 10:36:37', '2021-05-17 10:36:37'),
(31, 37, 21, 1, 1, 8000, '17-05-2021 11:36:37', '20210517113637', '2021-05-17 10:36:37', '2021-05-17 10:36:37'),
(32, 37, 21, 1, 1, 8000, '17-05-2021 11:58:30', '20210517115830', '2021-05-17 10:58:30', '2021-05-17 10:58:30'),
(33, 37, 21, 1, 1, 8000, '17-05-2021 11:58:30', '20210517115830', '2021-05-17 10:58:30', '2021-05-17 10:58:30'),
(34, 37, 21, 1, 1, 8000, '17-05-2021 11:58:30', '20210517115830', '2021-05-17 10:58:30', '2021-05-17 10:58:30'),
(35, 37, 21, 1, 1, 8000, '17-05-2021 11:59:36', '20210517115936', '2021-05-17 10:59:36', '2021-05-17 10:59:36'),
(36, 37, 21, 1, 1, 8000, '17-05-2021 11:59:36', '20210517115936', '2021-05-17 10:59:37', '2021-05-17 10:59:37'),
(37, 37, 21, 1, 1, 8000, '17-05-2021 11:59:36', '20210517115936', '2021-05-17 10:59:37', '2021-05-17 10:59:37'),
(38, 37, 21, 1, 1, 8000, '17-05-2021 12:02:14', '20210517120214', '2021-05-17 11:02:14', '2021-05-17 11:02:14'),
(39, 37, 21, 1, 1, 8000, '17-05-2021 12:02:14', '20210517120214', '2021-05-17 11:02:14', '2021-05-17 11:02:14'),
(40, 37, 21, 1, 1, 8000, '17-05-2021 12:02:14', '20210517120214', '2021-05-17 11:02:14', '2021-05-17 11:02:14'),
(41, 37, 21, 1, 1, 8000, '17-05-2021 12:03:05', '20210517120305', '2021-05-17 11:03:05', '2021-05-17 11:03:05'),
(42, 37, 21, 1, 1, 8000, '17-05-2021 12:03:05', '20210517120305', '2021-05-17 11:03:05', '2021-05-17 11:03:05'),
(43, 37, 21, 1, 1, 8000, '17-05-2021 12:03:05', '20210517120305', '2021-05-17 11:03:05', '2021-05-17 11:03:05'),
(44, 38, 22, 1, 1, 5000, '17-05-2021 12:06:28', '20210517120628', '2021-05-17 11:06:28', '2021-05-17 11:06:28'),
(45, 38, 22, 1, 1, 5000, '17-05-2021 12:06:28', '20210517120628', '2021-05-17 11:06:28', '2021-05-17 11:06:28'),
(46, 38, 22, 1, 1, 5000, '17-05-2021 12:07:16', '20210517120716', '2021-05-17 11:07:16', '2021-05-17 11:07:16'),
(47, 38, 22, 1, 1, 5000, '17-05-2021 12:07:16', '20210517120716', '2021-05-17 11:07:16', '2021-05-17 11:07:16'),
(48, 36, 21, 1, 1, 5000, '17-05-2021 12:14:32', '20210517121432', '2021-05-17 11:14:32', '2021-05-17 11:14:32'),
(49, 36, 21, 1, 1, 5000, '17-05-2021 12:14:32', '20210517121432', '2021-05-17 11:14:32', '2021-05-17 11:14:32'),
(50, 36, 21, 1, 1, 5000, '17-05-2021 12:15:29', '20210517121529', '2021-05-17 11:15:29', '2021-05-17 11:15:29'),
(51, 36, 21, 1, 1, 5000, '17-05-2021 12:15:29', '20210517121529', '2021-05-17 11:15:29', '2021-05-17 11:15:29'),
(52, 36, 21, 1, 1, 5000, '17-05-2021 12:44:15', '20210517124415', '2021-05-17 11:44:15', '2021-05-17 11:44:15'),
(53, 36, 21, 1, 1, 5000, '17-05-2021 12:44:15', '20210517124415', '2021-05-17 11:44:15', '2021-05-17 11:44:15'),
(54, 36, 21, 1, 1, 5000, '17-05-2021 12:46:11', '20210517124611', '2021-05-17 11:46:11', '2021-05-17 11:46:11'),
(55, 36, 21, 1, 1, 5000, '17-05-2021 12:46:11', '20210517124611', '2021-05-17 11:46:11', '2021-05-17 11:46:11'),
(56, 36, 21, 1, 1, 5000, '17-05-2021 12:48:31', '20210517124831', '2021-05-17 11:48:31', '2021-05-17 11:48:31'),
(57, 36, 21, 1, 1, 5000, '17-05-2021 12:48:31', '20210517124831', '2021-05-17 11:48:32', '2021-05-17 11:48:32'),
(58, 36, 21, 1, 1, 5000, '17-05-2021 12:51:46', '20210517125146', '2021-05-17 11:51:46', '2021-05-17 11:51:46'),
(59, 36, 21, 1, 1, 5000, '17-05-2021 12:51:46', '20210517125146', '2021-05-17 11:51:46', '2021-05-17 11:51:46'),
(60, 36, 21, 1, 1, 5000, '17-05-2021 12:52:45', '20210517125245', '2021-05-17 11:52:45', '2021-05-17 11:52:45'),
(61, 36, 21, 1, 1, 5000, '17-05-2021 12:52:45', '20210517125245', '2021-05-17 11:52:45', '2021-05-17 11:52:45'),
(62, 38, 22, 1, 1, 5000, '18-05-2021 09:45:54', '20210518094554', '2021-05-18 08:45:54', '2021-05-18 08:45:54'),
(63, 38, 22, 1, 1, 5000, '18-05-2021 12:55:59', '20210518125559', '2021-05-18 11:55:59', '2021-05-18 11:55:59'),
(64, 38, 22, 1, 1, 5000, '18-05-2021 12:55:59', '20210518125559', '2021-05-18 11:55:59', '2021-05-18 11:55:59'),
(65, 36, 21, 1, 1, 5000, '18-05-2021 13:01:35', '20210518130135', '2021-05-18 12:01:35', '2021-05-18 12:01:35'),
(66, 37, 21, 1, 1, 8000, '18-05-2021 13:01:35', '20210518130135', '2021-05-18 12:01:35', '2021-05-18 12:01:35'),
(67, 37, 21, 1, 1, 8000, '18-05-2021 13:01:35', '20210518130135', '2021-05-18 12:01:35', '2021-05-18 12:01:35'),
(68, 36, 21, 2, 1, 5000, '19-05-2021 11:05:12', '20210519110512', '2021-05-19 10:05:12', '2021-05-19 10:05:12'),
(69, 38, 22, 2, 1, 5000, '19-05-2021 11:05:12', '20210519110512', '2021-05-19 10:05:12', '2021-05-19 10:05:12'),
(70, 36, 21, 2, 1, 5000, '19-05-2021 11:20:09', '20210519112009', '2021-05-19 10:20:09', '2021-05-19 10:20:09'),
(71, 38, 22, 2, 1, 5000, '19-05-2021 11:20:09', '20210519112009', '2021-05-19 10:20:09', '2021-05-19 10:20:09'),
(72, 36, 21, 2, 1, 5000, '19-05-2021 11:20:59', '20210519112059', '2021-05-19 10:20:59', '2021-05-19 10:20:59'),
(73, 38, 22, 2, 1, 5000, '19-05-2021 11:20:59', '20210519112059', '2021-05-19 10:20:59', '2021-05-19 10:20:59'),
(74, 38, 22, 3, 1, 5000, '19-05-2021 11:24:30', '20210519112430', '2021-05-19 10:24:30', '2021-05-19 10:24:30'),
(75, 36, 21, 3, 1, 5000, '19-05-2021 11:28:01', '20210519112801', '2021-05-19 10:28:01', '2021-05-19 10:28:01'),
(76, 38, 22, 3, 10, 50000, '19-05-2021 11:28:01', '20210519112801', '2021-05-19 10:28:02', '2021-05-19 10:28:02'),
(77, 37, 21, 4, 1, 8000, '19-05-2021 12:04:36', '20210519120436', '2021-05-19 11:04:37', '2021-05-19 11:04:37'),
(78, 36, 21, 4, 1, 5000, '19-05-2021 12:22:15', '20210519122215', '2021-05-19 11:22:15', '2021-05-19 11:22:15'),
(79, 38, 22, 4, 1, 5000, '19-05-2021 12:29:47', '20210519122947', '2021-05-19 11:29:47', '2021-05-19 11:29:47'),
(80, 38, 22, 4, 1, 5000, '19-05-2021 12:29:47', '20210519122947', '2021-05-19 11:29:47', '2021-05-19 11:29:47'),
(81, 38, 22, 4, 1, 5000, '19-05-2021 12:30:36', '20210519123036', '2021-05-19 11:30:36', '2021-05-19 11:30:36'),
(82, 36, 21, 4, 1, 5000, '19-05-2021 12:32:19', '20210519123219', '2021-05-19 11:32:19', '2021-05-19 11:32:19'),
(83, 38, 22, 4, 1, 5000, '19-05-2021 12:32:19', '20210519123219', '2021-05-19 11:32:19', '2021-05-19 11:32:19');

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `devises` varchar(255) NOT NULL,
  `mail` text NOT NULL,
  `logo` text NOT NULL,
  `site` text NOT NULL,
  `tel` text NOT NULL,
  `lieu` text NOT NULL,
  `heur` text NOT NULL,
  `pass` text NOT NULL,
  `year` varchar(225) NOT NULL,
  `about` text NOT NULL,
  `plays` text NOT NULL,
  `faceb` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`id`, `devises`, `mail`, `logo`, `site`, `tel`, `lieu`, `heur`, `pass`, `year`, `about`, `plays`, `faceb`) VALUES
(1, 'cfa', 'contact@prunekcreation.com', 'storage/imgLogo/Hsto2eyxGqZGfRwpe2OWxB6pipCsoD7oD0E0Dsbc.png', 'PRUNEK', '+225 01 01 08 43 57', 'Abidjan - Marcory (Stade Champroux)', '24H/24', '1234NG', '2021', 'On avait envie de créer une marque qui a du sens, en laquelle les gens pourraient croire et qui pourrait représenter nos valeurs et nos origines.\r\nNos designs originaux et uniques, vous permettront de vous exprimer et d’affirmer votre style en toute élégance.', 'https://www.playstore.com/', 'https://www.facebook.com/Dianys-105084564762334');

-- --------------------------------------------------------

--
-- Structure de la table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `fichier` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `fichier2` text NOT NULL,
  `fichier3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `slides`
--

INSERT INTO `slides` (`id`, `fichier`, `updated_at`, `created_at`, `fichier2`, `fichier3`) VALUES
(16, 'myapp/storage/app/public/slide/sPOEc0Ugee1Rc4xjlqoAhCMtEk4YQP4Jlip2as44.png', '2021-04-05 17:37:07', '2021-04-05 17:37:07', 'myapp/storage/app/public/slide/qVhROub5DKmFU0jtDx0xqkCHRGK3q9tzD5L1rz9g.png', 'myapp/storage/app/public/slide/7hj6OpwIY3NFXsphvA2gYDfUullaXDAdykCHjQMk.png');

-- --------------------------------------------------------

--
-- Structure de la table `souscategories`
--

CREATE TABLE `souscategories` (
  `id` int(11) NOT NULL,
  `libele` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `souscategories`
--

INSERT INTO `souscategories` (`id`, `libele`, `created_at`, `updated_at`) VALUES
(10, 'aucun', '2021-05-15 21:42:38', '2021-05-15 21:42:38');

-- --------------------------------------------------------

--
-- Structure de la table `stock_prds`
--

CREATE TABLE `stock_prds` (
  `id` int(11) NOT NULL,
  `taille` varchar(45) DEFAULT NULL,
  `couleur` varchar(45) DEFAULT NULL,
  `pointure` varchar(45) DEFAULT NULL,
  `epaisseur` varchar(45) DEFAULT NULL,
  `qte` varchar(45) DEFAULT NULL,
  `prixPrd` varchar(45) DEFAULT NULL,
  `produits_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stock_prds`
--

INSERT INTO `stock_prds` (`id`, `taille`, `couleur`, `pointure`, `epaisseur`, `qte`, `prixPrd`, `produits_id`, `created_at`, `updated_at`) VALUES
(1, '29', '44', '1', '1', '10', '4500', 54, '2021-05-31 10:59:52', '2021-05-31 10:59:52'),
(2, '30', '41', '1', '1', '5', '40000', 54, '2021-05-31 10:59:53', '2021-05-31 10:59:53'),
(3, '29', '44', '1', '1', '10', '4500', 54, '2021-05-31 11:15:07', '2021-05-31 11:15:07'),
(4, '30', '41', '1', '1', '5', '40000', 54, '2021-05-31 11:15:07', '2021-05-31 11:15:07'),
(5, '28', '38', '3', '4', '10', '1250', 55, '2021-05-31 11:33:53', '2021-05-31 11:33:53');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `id` int(11) NOT NULL,
  `ville` varchar(45) DEFAULT NULL,
  `pays_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `villes`
--

INSERT INTO `villes` (`id`, `ville`, `pays_id`, `updated_at`, `created_at`) VALUES
(1, 'Abibjan', 1, '2021-04-19 09:54:35', '2021-04-19 09:54:35'),
(2, 'Cocody', 1, '2021-04-19 09:55:24', '2021-04-19 09:55:24'),
(3, 'Dabou', 1, '2021-04-19 13:11:21', '2021-04-19 13:11:21'),
(4, 'Abidjan', 1, '2021-05-19 16:03:31', '2021-05-19 16:03:31');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `attributs`
--
ALTER TABLE `attributs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `catg_has_scatgs`
--
ALTER TABLE `catg_has_scatgs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`,`client_id`),
  ADD KEY `fk_commandes_client1_idx` (`client_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`,`produits_id`,`produits_categorie_id`),
  ADD KEY `fk_images_produits1_idx` (`produits_id`,`produits_categorie_id`);

--
-- Index pour la table `img_prd_by_colors`
--
ALTER TABLE `img_prd_by_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attributs_id` (`attributs_id`),
  ADD KEY `produits_id` (`produits_id`);

--
-- Index pour la table `livraisons`
--
ALTER TABLE `livraisons`
  ADD PRIMARY KEY (`id`,`ville_id`,`ville_pays_id`),
  ADD KEY `fk_livraison_ville1_idx` (`ville_id`,`ville_pays_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`,`categorie_id`),
  ADD KEY `fk_produits_categorie_idx` (`categorie_id`);

--
-- Index pour la table `produits_has_attributs`
--
ALTER TABLE `produits_has_attributs`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `attributs_id` (`attributs_id`),
  ADD KEY `produits_id` (`produits_id`);

--
-- Index pour la table `produits_has_clients`
--
ALTER TABLE `produits_has_clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `souscategories`
--
ALTER TABLE `souscategories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stock_prds`
--
ALTER TABLE `stock_prds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produits_id` (`produits_id`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id`,`pays_id`),
  ADD KEY `fk_ville_pays1_idx` (`pays_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `attributs`
--
ALTER TABLE `attributs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `catg_has_scatgs`
--
ALTER TABLE `catg_has_scatgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `img_prd_by_colors`
--
ALTER TABLE `img_prd_by_colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `livraisons`
--
ALTER TABLE `livraisons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `paiements`
--
ALTER TABLE `paiements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'table de vérification du paiement cinetpay', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `produits_has_attributs`
--
ALTER TABLE `produits_has_attributs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `produits_has_clients`
--
ALTER TABLE `produits_has_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT pour la table `souscategories`
--
ALTER TABLE `souscategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `stock_prds`
--
ALTER TABLE `stock_prds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `img_prd_by_colors`
--
ALTER TABLE `img_prd_by_colors`
  ADD CONSTRAINT `img_prd_by_colors_ibfk_1` FOREIGN KEY (`attributs_id`) REFERENCES `attributs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `img_prd_by_colors_ibfk_2` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produits_has_attributs`
--
ALTER TABLE `produits_has_attributs`
  ADD CONSTRAINT `produits_has_attributs_ibfk_1` FOREIGN KEY (`attributs_id`) REFERENCES `attributs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produits_has_attributs_ibfk_2` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `stock_prds`
--
ALTER TABLE `stock_prds`
  ADD CONSTRAINT `stock_prds_ibfk_1` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
