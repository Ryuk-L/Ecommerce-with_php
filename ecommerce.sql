-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2024 at 02:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`, `date`) VALUES
(4, 'root', 'root', '2023-11-27'),
(6, 'ryuk', 'ra11', '2023-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(10) NOT NULL,
  `libelle` varchar(10) NOT NULL,
  `description` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`, `description`, `date`, `icon`) VALUES
(16, 'mobile', 'smartphone', '2023-11-24 23:00:00', 'fa-solid fa-mobile'),
(17, 'pc', 'pc gamer', '2023-11-24 23:00:00', 'fa-solid fa-laptop'),
(18, 'PS', 'playstation', '2023-12-01 23:00:00', 'fa-brands fa-playstation'),
(19, 'TV', 'television', '2023-12-01 23:00:00', 'fa-solid fa-tv');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `total` decimal(10,3) NOT NULL,
  `valide` int(11) NOT NULL DEFAULT 0,
  `date_creation` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id`, `id_client`, `total`, `valide`, `date_creation`) VALUES
(6, 6, 27445.000, 1, '2023-12-03'),
(8, 6, 4150.000, 0, '2023-12-03'),
(9, 6, 6200.000, 0, '2023-12-03'),
(10, 6, 4844.000, 1, '2023-12-03'),
(11, 6, 4844.050, 0, '2023-12-03'),
(12, 8, 17176.100, 1, '2023-12-03'),
(13, 6, 50000.000, 1, '2023-12-04'),
(14, 6, 10000.000, 1, '2023-12-04'),
(15, 6, 5040.000, 0, '2023-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `prix` decimal(10,3) NOT NULL,
  `quantite` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ligne_commande`
--

INSERT INTO `ligne_commande` (`id`, `id_produit`, `id_commande`, `prix`, `quantite`, `total`) VALUES
(6, 22, 6, 2650.000, 1, 27445),
(7, 27, 6, 5099.000, 2, 27445),
(8, 25, 6, 2799.000, 3, 27445),
(9, 32, 6, 6200.000, 1, 27445),
(13, 22, 8, 2650.000, 1, 4150),
(14, 20, 8, 1500.000, 1, 4150),
(15, 32, 9, 6200.000, 1, 6200),
(16, 27, 10, 4844.000, 1, 4844),
(17, 27, 11, 4844.050, 1, 4844),
(18, 27, 12, 4844.050, 2, 17176),
(19, 29, 12, 11788.000, 4, 17176),
(20, 31, 12, 799.000, 1, 17176),
(21, 34, 13, 10000.000, 5, 50000),
(22, 34, 14, 10000.000, 1, 10000),
(23, 24, 15, 2520.000, 2, 5040);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `prix` decimal(10,3) NOT NULL,
  `discount` int(10) UNSIGNED DEFAULT NULL,
  `date` date NOT NULL,
  `id_c` int(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `prix`, `discount`, `date`, `id_c`, `description`, `image`) VALUES
(20, 'Samsung s21', 1500.000, 0, '2023-11-25', 16, 'SAMSUNG Galaxy S21 - Ecran 6.2\" tactile capacitif Dynamic AMOLED x2 - Résolution: (2400 x 1080) - Systéme d\'exploitation:  Android 10.0 - Processeur: Exynos 2100 ,Fréquence du processeur 2.9 GHz - Mémoire RAM: 8 Go - Stockage: 256 Go  - Appareil photo Arr', '656233528b418MicrosoftTeams-image-73-845x563.jpg'),
(21, 'infinix hot 30', 1000.000, 0, '2023-11-25', 16, 'Écran 6.78\" LCD IPS (1080 x 2460pixels), 90Hz - Processeur: Mediatek Helio G88 (12nm) Octa-core  (2x2.0 GHz Cortex-A75 & 6x1.8 GHz Cortex-A55) - Système d\'exploitation: Android 13, XOS 12.6 - Mémoire RAM: 8Go - Stockage: 128Go - Appareil Photo Arriére: 50', '6562332e74677infinix-hot30-1.jpg'),
(22, 'gigabyte ', 2650.000, 0, '2023-11-26', 17, 'Écran 15.6\" Full HD, 144Hz - Processeur: Intel Core i5-12500H (Up to 4,50 GHz Turbo max, 18 Mo de mémoire cache, 12-Cores) - Système d\'exploitation: Windows 11 Famille - Mémoire: 8 Go DDR4 - Disque dur: 512Go SSD - Carte graphique: NVIDIA GeForce RTX 3050', '65632ec2bf613pc-portable-gigabyte-g5-md-clevo-i5-11e-gen-16-go-rtx-3050ti-noir.jpg'),
(23, 'katana', 4420.000, 0, '2023-11-26', 17, 'Écran 17.3\" Full HD IPS, 144 Hz - Processeur: Intel Core i7-12650H (up to 4,70 GHz Turbo max, 24 Mo de mémoire cache, 10-Cores) - Système d\'exploitation: FreeDos - Mémoire RAM: 8 Go DDR5 - Disque dur: 512 Go SSD - Carte graphique: NVIDIA GeForce RTX 4050 ', '65632f8fce71fpc-portable-msi-gaming-katana-17-b12vfk-417xfr-i7-12650h-rtx-4060-8g-24-go.jpg'),
(24, 'PS4', 2800.000, 10, '2023-12-02', 18, 'Console de jeux PlayStation 4  - Processeur AMD Jaguar octo-core, 1.6 GHz - Chipset graphique AMD Radeon Next-Gen - Mémoire 8 Go - Stockage 500 Go amovible - Port Ethernet - WiFi - Bluetooth - USB 3.0 - HDMI - Dimensions 305 x 275 x 53 mm', '656b2ce5e95d3playstation-4-500-go.jpg'),
(25, 'ps5', 2799.000, 0, '2023-12-02', 18, 'Console PlayStation 5 Edition Digitale + God of War Ragnarök + Station de charge Dual Sense - Digital Edition - Console Ultra HD 8K - Processeur AMD Ryzen Zen 2 - Chipset graphique AMD RDNA 2 10.28 TFLOPs - RAM 16 Go GDDR6 - Stockage 825 Go SSD - Framerat', '656b2d7d2d9afconsole-playstation-5-edition-digitale-god-of-war-ragnaroek.jpg'),
(26, 'IPHONE 14 PLUS', 5499.000, 0, '2023-12-02', 16, 'Écran Super Retina XDR 6,7 pouces\r\nAutonomie d’une journée entière et jusqu’à 26 heures de lecture vidéo\r\nDesign conçu pour durer avec Ceramic Shield et résistance à l’eau\r\nPuce A15 Bionic avec GPU 5 cœurs, pour des performances fulgurantes. Connectivité ', '656b457bd0b45iphone-14-plus-128-go-couleur-midnight.jpg'),
(27, 'IPHONE 13 Pro', 5099.000, 5, '2023-12-02', 16, 'iPhone 13 Pro Max. Un système photo pro amélioré comme jamais, avec trois nouveaux appareils. Avec photo macro et vidéo ProRes. Faites des photos et des vidéos incroyables en conditions de faible éclairage. Apportez de la magie à vos vidéos avec l', '656b45ee1dd39iphone-13-pro-128-go.jpg'),
(28, 'LENOVO LÉGION PRO 7', 13289.000, 30, '2023-12-02', 17, 'Écran 16\" WQXGA IPS Display HDR - Résolution (2560 x 1600 px) - Taux de rafraîchissement 240 Hz - G-SYNC - Processeur Intel Core i9-13900HX, up to 5,4 GHz, 36 Mo de mémoire cache - Mémoire 32 Go (2x 16 Go) DDR5-5600 - Disque SSD 1 To M.2 NVMe - Carte Grap', '656b71d245989pc-portable-lenovo-legion-pro-7-16irx8h-i9-13900hx-13e-gen-rtx-4090-16g-32go-.jpg'),
(29, 'MACEBOOK PRO M2', 11788.000, 0, '2023-12-02', 17, 'Écran 16\" Liquid Retina XDR  - Processeur Apple M2 Pro, (12 cœurs CPU / 19 cœurs GPU) - Mémoire 16 Go - Disque SSD 1 To - Caméra HD 1080p - Système à six haut-parleurs avec Audio spatial - Ensemble de trois micros de qualité studio - Wi‑Fi 6E - Bluetooth ', '656b72132c084apple-macebook-pro-m2-16-16-go-1-to-ssd-gris.jpg'),
(30, 'DELL LATITUDE 7340', 6099.000, 0, '2023-12-02', 17, 'Écran 13.3\" FHD+ (1920 x 1200 px), Tactile - Processeur Intel Core i7-1365U de 13e génération, up to 5.2 GHz, 12 Mo de mémoire cache - Mémoire 16 Go DDR5 - Disque SSD 512 Go M.2 PCIe NVMe - Carte Carte graphique Intel Iris Xe Graphics - 1 USB 3.2 Gen 1 Ty', '656b727a23021pc-portable-dell-latitude-7340-i7-1365u-de-13e-gen-16-go-ddr5-512-go-ssd.jpg'),
(31, 'TV VEGA 42', 799.000, 0, '2023-12-02', 19, '6 * Paiement sans intérêt - TV VEGA 42\" Full HD LED - Récepteur intégré - Résolution 1920 x 1080 - Aspect ratio 16:9 - Contraste 3000:1 - Angle de vue: 178° x 178° - Maximum colors 16.7M - Temps de réponse 8 ms - DVB-T/T2/C - Fonction Amélioration du sign', '656b740f1439ctv-vega-42-full-hd-avec-recepteur-integre-noir-support.jpg'),
(32, 'TV LG 55', 6200.000, 20, '2023-12-02', 19, '6 * Paiement sans intérêt - TV 55\" 55A26LA OLED UHD 4K + Récepteur intégré - Résolution 3840 x 2160 - Processeur α7 Gen 5 AI - Smart Tv - Alimentation AC 100~240V 50-60Hz - HDR - Optimiseur de jeu vidéo - Assistant Google intégré - Système d’exploitation ', '656b752ca4fc9tv-lg-55-55a26la-oled-uhd-4k-smart-tv-wifi-recepteur-integre.jpg'),
(33, 'TV SABA 50', 1275.000, 0, '2023-12-02', 19, '6 * Paiement sans intérêt - Téléviseur 4K UHD LED 50\" - Smart TV Android - Résolution 3840 x 2160 pixels - 2x HDMI - 2x USB - 2x Haut-parleurs 10W - Audio Dolby Digital Plus - DTS HD - HDR10 - Dolby Vision HDR - Netflix 4K - Garantie 2 ans + Un Abonnement', '656b75a66cf44tv-saba-50-smart-tv-android-4k-uhd-led-un-abonnement-waves-iptv-12-mois-offert.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(10) NOT NULL,
  `login` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `password`, `date`) VALUES
(6, 'ryuk', 'ra11', '2023-11-27 18:30:42'),
(7, 'rayen', 'ray', '2023-11-27 18:30:57'),
(8, 'khaled', 'kha1', '2023-11-27 18:30:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
