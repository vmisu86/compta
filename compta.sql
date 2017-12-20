-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2017 at 03:24 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `compta`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(3) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `nom`, `prenom`, `adresse`, `phone`, `email`) VALUES
(1, 'Dupont', 'Jean', 'Nice, bld 41', '0666000475', 'dupont@mail.ocm'),
(3, 'Boglarka', 'Markovics', '15 avenue Docteur Dautheville', '782380422', 'markovics.boglarka@gmail.com'),
(5, 'Varga', 'Mihaly', '15 avenue Docteur Dautheville', '616644126', 'vmisu86@gmail.com'),
(6, 'Tjdflkjsfd', 'test client', '5 av derjfj', '65544', 'msiu@fdre.fr'),
(7, 'kksdfkkjsdfhkls', 'tekhafslkzlkzj', 'ljkjsdljkfdsjlksdjvkl', '21212123123', 'misu@der.de'),
(8, 'Siena', 'bYRAN', 'nice', '225154', 'test@BRYAN.com');

-- --------------------------------------------------------

--
-- Table structure for table `commande_client`
--

CREATE TABLE `commande_client` (
  `commande_id` int(11) NOT NULL,
  `facture_cl_id` int(11) NOT NULL,
  `produit_appellation` varchar(255) NOT NULL,
  `commande_produit_quantite` decimal(10,2) NOT NULL,
  `commande_produit_prix` decimal(10,2) NOT NULL,
  `commande_produit_actual_montant` decimal(10,2) NOT NULL,
  `commande_taxe_montant` decimal(10,2) NOT NULL,
  `commande_produit_final_montant` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `factures_cl`
--

CREATE TABLE `factures_cl` (
  `facture_cl_id` int(10) NOT NULL,
  `facture_cl_client_id` int(10) NOT NULL,
  `facture_cl_adresse` varchar(255) NOT NULL,
  `facture_cl_ref` varchar(255) NOT NULL,
  `facture_cl_date_em` date NOT NULL,
  `facture_cl_date_rec` date NOT NULL,
  `facture_cl_total_HT` double NOT NULL,
  `facture_cl_mont_TVA` double NOT NULL,
  `facture_cl_total_TTC` double NOT NULL,
  `facture_cl_payee` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `factures_cl`
--

INSERT INTO `factures_cl` (`facture_cl_id`, `facture_cl_client_id`, `facture_cl_adresse`, `facture_cl_ref`, `facture_cl_date_em`, `facture_cl_date_rec`, `facture_cl_total_HT`, `facture_cl_mont_TVA`, `facture_cl_total_TTC`, `facture_cl_payee`) VALUES
(1, 1, 'Bld 123 Nice', 'Ref25488741', '2017-11-08', '2017-12-30', 5000, 1000, 6000, 0),
(2, 1, 'Nice, bld 41', 'KDFR-45', '2017-12-06', '2017-12-14', 100, 20, 120, 0),
(3, 3, '15 avenue Docteur Dautheville', 'KDRR-45', '2017-12-01', '2017-12-23', 200, 40, 240, 1);

-- --------------------------------------------------------

--
-- Table structure for table `factures_fr`
--

CREATE TABLE `factures_fr` (
  `facture_fr_id` int(11) NOT NULL,
  `facture_fr_fournisseur_id` int(11) NOT NULL,
  `facture_fr_ref` varchar(255) NOT NULL,
  `facture_fr_desc` text NOT NULL,
  `facture_fr_date_em` date NOT NULL,
  `facture_fr_date_rec` date NOT NULL,
  `facture_fr_total_HT` double NOT NULL,
  `facture_fr_mont_TVA` double NOT NULL,
  `facture_fr_total_TTC` double NOT NULL,
  `factures_fr_payee` tinyint(1) NOT NULL,
  `facture_fr_pdf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `factures_fr`
--

INSERT INTO `factures_fr` (`facture_fr_id`, `facture_fr_fournisseur_id`, `facture_fr_ref`, `facture_fr_desc`, `facture_fr_date_em`, `facture_fr_date_rec`, `facture_fr_total_HT`, `facture_fr_mont_TVA`, `facture_fr_total_TTC`, `factures_fr_payee`, `facture_fr_pdf`) VALUES
(1, 1, 'HRW-87', 'Produits for the big factory', '2017-12-15', '2017-12-16', 100, 20, 120, 1, ''),
(2, 2, 'HREW-32', 'TEST DESCRIPTION', '2017-12-13', '2017-12-15', 500, 100, 600, 0, ''),
(4, 2, 'KFGT-365', 'test update', '2017-09-04', '2017-12-29', 500, 100, 600, 0, 'NSP-F-2014-195 (exemple facture pour le projet).pdf'),
(5, 1, 'KDDR-65', 'test facture', '2017-12-12', '2017-12-20', 600, 120, 720, 1, ''),
(6, 2, 'HPFK-65', 'test facture', '2017-12-14', '2018-01-31', 200, 40, 240, 0, ''),
(7, 1, 'KDF-65', 'facture internet', '2017-11-01', '2017-11-22', 200, 40, 240, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `fournisseur_id` int(10) NOT NULL,
  `fournisseur_nom` varchar(255) NOT NULL,
  `fournisseur_adresse` varchar(255) NOT NULL,
  `fournisseur_phone` varchar(255) NOT NULL,
  `fournisseur_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fournisseurs`
--

INSERT INTO `fournisseurs` (`fournisseur_id`, `fournisseur_nom`, `fournisseur_adresse`, `fournisseur_phone`, `fournisseur_email`) VALUES
(1, 'test_updated', 'test aderesse test', '06325478', 'tets@update.fr'),
(2, 'fournisseur_2', '33 av four_adresse', '13255464', 'fournisseur@test.fr');

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `produit_id` int(11) NOT NULL,
  `produit_appellation` varchar(255) NOT NULL,
  `produit_description` text NOT NULL,
  `produit_image` text NOT NULL,
  `produit_prix` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`produit_id`, `produit_appellation`, `produit_description`, `produit_image`, `produit_prix`) VALUES
(2, 'maki', 'super produit', 'family4.jpg', 1000),
(11, 'Maki', 'Maki', 'en_badge_web_generic.png', 100),
(12, 'Maki', 'Maki', 'family2.jpg', 100),
(13, 'Maki', 'Maki', 'logo2.jpg', 100),
(20, 'dskjfhkj UPDATED', 'dfkjlskdjflksjd', 'en_badge_web_generic.png', 1000),
(21, 'test produit 9', 'testsgd', 'logo.png', 100),
(23, 'tetrere', 'jhhdhkdhjkjsd', 'desktop_img.png', 1254),
(24, 'test UPDATED', 'testtsts', 'telecharger.png', 100111);

-- --------------------------------------------------------

--
-- Table structure for table `salaires`
--

CREATE TABLE `salaires` (
  `salarie_id` int(10) NOT NULL,
  `salarie_nom` varchar(255) NOT NULL,
  `salarie_prenom` varchar(255) NOT NULL,
  `salarie_phone` varchar(255) NOT NULL,
  `salarie_email` varchar(255) NOT NULL,
  `salarie_poste` varchar(255) NOT NULL,
  `salarie_salaire_NET` double NOT NULL,
  `salarie_salaire_BRUT` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salaires`
--

INSERT INTO `salaires` (`salarie_id`, `salarie_nom`, `salarie_prenom`, `salarie_phone`, `salarie_email`, `salarie_poste`, `salarie_salaire_NET`, `salarie_salaire_BRUT`) VALUES
(26, 'Boglarka', 'Markovics ', '+33782380422', 'markovics.boglarka@gmail.com', 'kkkkk', 1000000, 2000000),
(27, 'Varga', 'Miha', '+336166', 'vmi86@gmail.com', 'manager', 1000, 2000),
(28, 'Mark', 'Bill', '+36587456', 'bill@google.com', 'programmer', 2000, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `taxe_id` int(11) NOT NULL,
  `taxe_type` varchar(255) NOT NULL,
  `taxe_mont` double NOT NULL,
  `taxe_date_em` date NOT NULL,
  `taxe_date_rec` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`taxe_id`, `taxe_type`, `taxe_mont`, `taxe_date_em`, `taxe_date_rec`) VALUES
(1, 'taxe emission update', 200, '2017-12-03', '2017-12-26'),
(3, 'Taxe voiture', 100, '2017-12-13', '2018-01-04');

-- --------------------------------------------------------

--
-- Table structure for table `tva`
--

CREATE TABLE `tva` (
  `tva_id` int(10) NOT NULL,
  `tva_mont` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_nom` varchar(255) NOT NULL,
  `user_prenom` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `user_nom`, `user_prenom`, `user_email`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Varga', 'Mihaly', 'misu@google.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `commande_client`
--
ALTER TABLE `commande_client`
  ADD PRIMARY KEY (`commande_id`);

--
-- Indexes for table `factures_cl`
--
ALTER TABLE `factures_cl`
  ADD PRIMARY KEY (`facture_cl_id`);

--
-- Indexes for table `factures_fr`
--
ALTER TABLE `factures_fr`
  ADD PRIMARY KEY (`facture_fr_id`);

--
-- Indexes for table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`fournisseur_id`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`produit_id`);

--
-- Indexes for table `salaires`
--
ALTER TABLE `salaires`
  ADD PRIMARY KEY (`salarie_id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`taxe_id`);

--
-- Indexes for table `tva`
--
ALTER TABLE `tva`
  ADD PRIMARY KEY (`tva_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `commande_client`
--
ALTER TABLE `commande_client`
  MODIFY `commande_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `factures_cl`
--
ALTER TABLE `factures_cl`
  MODIFY `facture_cl_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `factures_fr`
--
ALTER TABLE `factures_fr`
  MODIFY `facture_fr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `fournisseur_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `produit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `salaires`
--
ALTER TABLE `salaires`
  MODIFY `salarie_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `taxe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tva`
--
ALTER TABLE `tva`
  MODIFY `tva_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
