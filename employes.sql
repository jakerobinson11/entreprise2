-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2024 at 03:42 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `entreprise`
--

-- --------------------------------------------------------

--
-- Table structure for table `employes`
--

DROP TABLE IF EXISTS `employes`;
CREATE TABLE IF NOT EXISTS `employes` (
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_employes` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(20) DEFAULT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `sexe` enum('m','f') NOT NULL,
  `service` varchar(30) DEFAULT NULL,
  `date_embauche` date DEFAULT NULL,
  `salaire` int DEFAULT NULL,
  `avatar` varchar(200) NOT NULL,
  PRIMARY KEY (`id_employes`)
) ENGINE=InnoDB AUTO_INCREMENT=1018 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employes`
--

INSERT INTO `employes` (`email`, `password`, `id_employes`, `prenom`, `nom`, `sexe`, `service`, `date_embauche`, `salaire`, `avatar`) VALUES
('cgallet@entreprise.fr', '$2y$10$OR4z0GKcxjkGHu.J.4Gzju12zSwqdVQANmL2PaOsVMoP6uIMxwOT2', 388, 'Clement', 'Gallet', 'm', 'commercial', '2000-01-15', 2300, 'avatar/avatar--6757055b17906.png'),
('twinter@entreprise.fr', '$2y$10$OR4z0GKcxjkGHu.J.4Gzju12zSwqdVQANmL2PaOsVMoP6uIMxwOT2', 415, 'Thomas', 'Winter', 'm', 'commercial', '2000-05-03', 3550, ''),
('cdunbar@entreprise.fr', '$2y$10$OR4z0GKcxjkGHu.J.4Gzju12zSwqdVQANmL2PaOsVMoP6uIMxwOT2', 417, 'Chloe', 'Dubar', 'f', 'production', '2001-09-05', 2400, 'avatar/avatar--675709366072a.png'),
('efellier@entreprise.fr', '$2y$10$OR4z0GKcxjkGHu.J.4Gzju12zSwqdVQANmL2PaOsVMoP6uIMxwOT2', 491, 'Elodie', 'Fellier', 'f', 'secretariat', '2002-02-22', 1900, ''),
('fgrand@entreprise.fr', '$2y$10$OR4z0GKcxjkGHu.J.4Gzju12zSwqdVQANmL2PaOsVMoP6uIMxwOT2', 509, 'Fabrice', 'Grand', 'm', 'comptabilite', '2003-02-20', 2600, 'avatar/avatar--675705e050940.png'),
('mcollier@entreprise.fr', '$2y$10$OR4z0GKcxjkGHu.J.4Gzju12zSwqdVQANmL2PaOsVMoP6uIMxwOT2', 547, 'Melanie', 'Collier', 'f', 'commercial', '2004-09-08', 3100, ''),
('lblanchet@entreprise.fr', '$2y$10$OR4z0GKcxjkGHu.J.4Gzju12zSwqdVQANmL2PaOsVMoP6uIMxwOT2', 592, 'Laura', 'Blanchet', 'f', 'direction', '2005-06-09', 4500, 'avatar/avatar--67570779c52cb.png'),
('gmiller@entreprise.fr', '$2y$10$OR4z0GKcxjkGHu.J.4Gzju12zSwqdVQANmL2PaOsVMoP6uIMxwOT2', 627, 'Guillaume', 'Miller', 'm', 'commercial', '2006-07-02', 1900, ''),
('cperrin@entreprise.fr', '$2y$10$OR4z0GKcxjkGHu.J.4Gzju12zSwqdVQANmL2PaOsVMoP6uIMxwOT2', 655, 'Celine', 'Perrin', 'f', 'commercial', '2006-09-10', 2700, 'avatar/avatar--675707fa5e275.png'),
('jcottet@entreprise.fr', '$2y$10$OR4z0GKcxjkGHu.J.4Gzju12zSwqdVQANmL2PaOsVMoP6uIMxwOT2', 699, 'Julien', 'Cottet', 'm', 'secretariat', '2007-01-18', 1900, ''),
('mvignal@entreprise.fr', '$2y$10$OR4z0GKcxjkGHu.J.4Gzju12zSwqdVQANmL2PaOsVMoP6uIMxwOT2', 701, 'Mathieu', 'Vignal', 'm', 'informatique', '2008-12-03', 2000, ''),
('tdesprez@entreprise.fr', '$2y$10$OR4z0GKcxjkGHu.J.4Gzju12zSwqdVQANmL2PaOsVMoP6uIMxwOT2', 739, 'Thierry', 'Desprez', 'm', 'secretariat', '2009-11-17', 1900, ''),
('athoyer@entreprise.fr', '$2y$10$OR4z0GKcxjkGHu.J.4Gzju12zSwqdVQANmL2PaOsVMoP6uIMxwOT2', 780, 'Amandine', 'Thoyer', 'f', 'communication', '2010-01-23', 1500, ''),
('ddurand@entreprise.fr', '$2y$10$OR4z0GKcxjkGHu.J.4Gzju12zSwqdVQANmL2PaOsVMoP6uIMxwOT2', 802, 'Damien', 'Durand', 'm', 'informatique', '2010-07-05', 2250, 'avatar/avatar--67570871cd1d0.png'),
('dchevel@entreprise.fr', '$2y$10$OR4z0GKcxjkGHu.J.4Gzju12zSwqdVQANmL2PaOsVMoP6uIMxwOT2', 854, 'Daniel', 'Chevel', 'm', 'informatique', '2011-09-28', 2100, 'avatar/avatar--67570982e94c6.png'),
('nmartin@entreprise.fr', '$2y$10$OR4z0GKcxjkGHu.J.4Gzju12zSwqdVQANmL2PaOsVMoP6uIMxwOT2', 876, 'Nathalie', 'Martin', 'f', 'juridique', '2012-01-12', 3200, ''),
('blagarde@entreprise.fr', '$2y$10$OR4z0GKcxjkGHu.J.4Gzju12zSwqdVQANmL2PaOsVMoP6uIMxwOT2', 900, 'Benoit', 'Lagarde', 'm', 'production', '2013-01-03', 2550, ''),
('esennard@entreprise.fr', '$2y$10$OR4z0GKcxjkGHu.J.4Gzju12zSwqdVQANmL2PaOsVMoP6uIMxwOT2', 933, 'Emilie', 'Sennard', 'f', 'commercial', '2014-09-11', 1800, ''),
('slafaye@entreprise.fr', '$2y$10$OR4z0GKcxjkGHu.J.4Gzju12zSwqdVQANmL2PaOsVMoP6uIMxwOT2', 990, 'Stephanie', 'Lafaye', 'f', 'assistant', '2015-06-02', 1775, ''),
('jrobinson@entreprise.fr', 'hello1234', 991, 'Jacob', 'Robinson', 'm', 'developpeur', NULL, 5000, ''),
('newguy@entreprise.fr', '$2y$10$OR4z0GKcxjkGHu.J.4Gzju12zSwqdVQANmL2PaOsVMoP6uIMxwOT2', 1017, 'Guy', 'New', 'm', 'stagaire', NULL, 500, 'avatar/avatar--675704471d182.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
