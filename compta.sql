-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2017 at 02:58 PM
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
(3, 'Boglarka', 'Markovics', '22 avenue de La Pined', '0652474874', 'mar@gmail.com'),
(5, 'Varga', 'Mihaly', '15 avenue Docteur Dautheville', '616644126', 'vmisu86@gmail.com'),
(6, 'Philip', 'Carl', '22 bld de madlaine', '0725068965', 'msiu@fdre.fr'),
(7, 'Miku', 'Juchimi', '12 str Jarest Berlin', '+3269851478', 'hello@der.de'),
(8, 'Siena', 'Bryan', '15 rue de la pinaide', '0685478254', 'test@BRYAN.com');

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

--
-- Dumping data for table `commande_client`
--

INSERT INTO `commande_client` (`commande_id`, `facture_cl_id`, `produit_appellation`, `commande_produit_quantite`, `commande_produit_prix`, `commande_produit_actual_montant`, `commande_taxe_montant`, `commande_produit_final_montant`) VALUES
(22, 13, 'Linux server', '2.00', '200.00', '400.00', '80.00', '480.00'),
(23, 13, 'Blog writer', '1.00', '150.00', '150.00', '30.00', '180.00'),
(24, 13, 'Storage space 250Gb', '1.00', '625.00', '625.00', '125.00', '750.00'),
(25, 14, 'Linux server', '1.00', '200.00', '200.00', '40.00', '240.00'),
(26, 14, 'Web designe', '1.00', '250.00', '250.00', '50.00', '300.00'),
(27, 14, 'Storage space 250Gb', '2.00', '625.00', '1250.00', '250.00', '1500.00'),
(28, 14, 'SGBD oracle database', '1.00', '550.00', '550.00', '110.00', '660.00'),
(29, 15, 'Blog writer', '1.00', '150.00', '150.00', '30.00', '180.00'),
(30, 15, 'Facebook checker', '2.00', '75.00', '150.00', '30.00', '180.00'),
(31, 15, 'Storage space 250Gb', '2.00', '625.00', '1250.00', '250.00', '1500.00');

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
(13, 1, 'Nice, bld 41', 'HSWR - 1', '2017-12-01', '2017-12-14', 1175, 235, 1410, 0),
(14, 5, '15 avenue Docteur Dautheville', 'HSWR - 14', '2017-12-13', '2018-01-02', 2250, 450, 2700, 0),
(15, 7, '12 str Jarest Berlin', 'HSWR - 15', '2017-12-14', '2017-12-19', 1550, 310, 1860, 1);

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
(1, 'Google', '15 av Silicon Valay California USA', '0652478952', 'tets@google.com'),
(2, 'Microsoft', '33 av four_adresse', '13255464', 'microsoft@test.fr');

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
(1, 'Linux server', 'linux server location', 'linux.jpg', 200),
(2, 'Web designe', 'Creation website', 'design.png', 250),
(3, 'Blog writer', 'False profile maker program', 'blog.png\r\n', 150),
(4, 'Facebook checker', 'Service, some one check your website', 'facebook_checker.png', 75),
(5, 'SGBD oracle database', 'Oracle database creaation', 'oracle-db.png', 550),
(6, 'Mysql SGBD', 'Mysql database creation', 'mysql-db.png', 350),
(7, 'Storage space 250Gb', 'Storage space with 250Gb', 'data.png', 625),
(8, 'Storage space 500Gb', 'Storage space 500Gb', 'data.png', 800);

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
  MODIFY `commande_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `factures_cl`
--
ALTER TABLE `factures_cl`
  MODIFY `facture_cl_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
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
  MODIFY `produit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
