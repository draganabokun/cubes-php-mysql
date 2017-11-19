-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2017 at 04:20 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cubesphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `title` char(50) NOT NULL,
  `website_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `website_url`) VALUES
(1, 'Apple', ''),
(2, 'Beko', ''),
(3, 'Bosh', ''),
(4, 'Gorenje', ''),
(5, 'HTC', ''),
(6, 'Huawei', ''),
(7, 'LG', ''),
(8, 'Samsung', ''),
(9, 'Sony', ''),
(10, 'Siemens', ''),
(11, 'Vivax', ''),
(12, 'Pegla na paru', 'http://www.sams.com');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` char(20) NOT NULL,
  `description` longtext NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `group_id`) VALUES
(1, 'Mobilni Telefon', '', 1),
(2, 'Televizor', '', 2),
(3, 'Frizider', '', 2),
(4, 'Ves Masina', '', 2),
(5, 'Sporet', '', 2),
(6, 'Fen za kosu', '', 2),
(7, 'Laptop', '', 3),
(8, '', '', 0),
(9, '', '', 0),
(10, 'Pegla na paru', 'fdfdf', 2),
(11, 'Pegla na paru', 'fdfd', 2);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `title`) VALUES
(1, 'Mobilni Uredjaji'),
(2, 'Bela Tehnika'),
(3, 'Racunari');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `content` longtext,
  `photo_filename` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `section_id`, `title`, `description`, `content`, `photo_filename`, `created_at`) VALUES
(1, 2, 'One su nepoÅ¾eljne u Kini', 'Vizu nisu dobile ni manekenke ÄiÄ‘i Hadid (zbog poreÄ‘enja sa Budom) i Adrijana Lima (diplomatski problem)', 'KINESKE vlasti odbile su da izdaju vizu pop pevaÄici Keti Peri (33), koja je sutra trebalo da nastupi na reviji kuÄ‡e \"Viktorijas sikret\" u Å angaju. Ova komunistiÄka zemlja zamerila je Keti Å¡to se 2015. na koncertu u \"Tajpej areni\" ogrnula tajvanskom zastavom, ali i Å¡to je nastupala u kostimu sa slikom suncokreta, jer je taj cvet bio simbol Studentskog pokreta \"Suncokret\" koji je 2014. protestovao zbog kineskog trgovinskog sporazuma. Vizu nisu dobile ni manekenke ÄiÄ‘i Hadid (zbog poreÄ‘enja sa Budom) i Adrijana Lima (diplomatski problem).', '1_nepozeljne_u_kini.jpg', '2017-11-01 23:12:44'),
(2, 4, 'Hrabre slike sveta', 'Pobednici Berlina, Kana, Venecije pred publikom na festivalu autorskog filma. Ostvarenja odvaÅ¾nih autora koja probijaju sve zadate granice, kliÅ¡ee i zabrane', 'Pod metaforiÄnim naslovom \"Duh `67.\" FAF Ä‡e prikazati 91 ostvarenje, meÄ‘u kojima su i pobednici najveÄ‡ih svetskih festivala. U Glavnom programu videÄ‡emo 22 filma, a u trku za Gran-pri \"Aleksandar SaÅ¡a PetroviÄ‡\" ulazi devet ostvarenja; dokumentarci \"Makala\" Emanuela Grasa (kanska nagrada u \"Nedelji kritike\"), i \"Kaniba\" Verane Paravel i Lusjena Kastenja Tejlora (nagrada Å¾irija u Veneciji), \"Felisite\" Alena Gomisa (Srebrni medved u Berlinu), \"Barbara\" Matjea Amalrika (nagrada u Hamburgu). U konkurenciji su i \"ÄŒovek od integriteta\" Mohamada Rasulofa (kanska nagrada u programu \"Izvestan pogled\"), \"Kada dan nije imao ime\" Teone Strugar Mitevske, \"Projekat Florida\" Å ona Bejkera (nagrada kritike u Hamburgu). Tu su i dva debitantska filma - \"Starateljstvo\" Gzavijea Legrana (\"Srebrni lav\" za reÅ¾iju i \"Lav\" buduÄ‡nosti u Veneciji), i \"Vojnici. PriÄa iz Ferentarija\" Ivane MladenoviÄ‡.', '2_Starateljstvo-film.jpg', '2017-11-14 12:52:00'),
(3, 5, 'Kragujevac: Svat pucao iz gasnog piÅ¡tolja', 'KragujevaÄka policija oduzela je gasni piÅ¡tolj od muÅ¡karca (28) iz AranÄ‘elovca, iz kojeg je pucano iz vozila u svadbenoj koloni', 'KragujevaÄka policija oduzela je gasni piÅ¡tolj od muÅ¡karca (28) iz AranÄ‘elovca, iz kojeg je pucano iz vozila u svadbenoj koloni, preneli su danas lokalni mediji.\r\n\r\nPolicajci su zaustavili kolonu svatova kod stadiona \"ÄŒika DaÄa\" u Kragujevcu i kod mladiÄ‡a iz AranÄ‘elovca pronaÅ¡li i oduzeli gasni piÅ¡tolj iz kojeg je pucano.\r\n\r\nProtiv osobe koja je pucala biÄ‡e podneta kriviÄna prijava.', '3_lisice.jpg', '2017-11-06 20:30:12'),
(6, 5, 'GreÅ¡kom ga optuÅ¾ili za zloÄin, pa sad tuÅ¾i drÅ¾avu', 'OsloboÄ‘en Milan DobriÄ‡, osumnjiÄen da je usmrtio poÅ¡tara. Nije bilo dokaza da je pucao u Sretena AnÄ‘elkoviÄ‡a', 'ZBOG neosnovanog liÅ¡avanja slobode, drÅ¾anja u pritvoru, duÅ¡evnih patnji i bolova koje je pretrpeo, Milan DobriÄ‡ (59) koji je uhapÅ¡en zbog sumnje da je pre 15 godina brutalno ubio poÅ¡tara Sretena AnÄ‘elkoviÄ‡a (54) u Zemunu, presavio je tabak i reÅ¡io da tuÅ¾i drÅ¾avu. On je pre dva dana puÅ¡ten na slobodu jer protiv njega nema dokaza da je poÄinio ovo delo.\r\n\r\nDobriÄ‡ je uhapÅ¡en krajem septembra zbog sumnje da je 25. decembra 2002. sa dva hica iz piÅ¡tolja usmrtio Sretena AnÄ‘elkoviÄ‡a. Ubistvo se dogodilo u ulazu stambene zgrade u Prvomajskoj ulici u Zemunu, kada je nepoznati muÅ¡karac priÅ¡ao poÅ¡taru s leÄ‘a i pucao mu u vrat i leÄ‘a.', '6_greskom-optuzili.jpg', '2017-11-18 22:12:14'),
(7, 4, 'NEMA KOMPROMISA SA UMETNOÅ Ä†U', 'VeliÄkoviÄ‡ev Å¾ivotni put i Å¡ta je video u ranim radovima Marine AbramoviÄ‡', 'VeÄeras (19) u Galeriji RIMA u Beogradu premijerno Ä‡e biti predstavljena nova dela Vladimira VeliÄkoviÄ‡a. Ovaj umetnik je u okviru ciklusa predavanja \"Susreti sa stvaraocima â€“ masterklas\" u SANU govorio o svojim poÄecima, nadahnuÄ‡ima i izazovima jednog umetnika nekad i sad.', '7_kultura.jpg', '2017-11-18 23:36:41'),
(8, 7, 'NAÅ LI SMO ENISA, HEROJA SA KOÅ ARA', '\"Ostao sam bez noge, imam geler u glavi, ali sam ponosan Å¡to sam branio svoju zemlju\"', 'NaÅ¡li smo Enisa! Nakon teksta u kojem smo pisali o Darku GajiÄ‡u, koji je Å¾eleo da pronaÄ‘e svog ratnog druga Enisa SuljeviÄ‡a sa Kosova 1999. javio nam se veliki broj njegovih poznanika i prijatelja. Danas ratni vojni invalid u penziji i heroj sa KoÅ¡ara Å¾ivi u Prijepolju, sreÄ‡no je oÅ¾enjen i ima troje dece.', '8_heroj_sa_kosara.jpg', '2017-11-18 23:41:02'),
(9, 8, 'NE VERUJU VUÄŒIÄ†U, ÄŒEKAJU JANUAR', 'Ovo su prve reakcije OPOZICIJE na odluku SNS o izborima', 'Dok koalicioni partneri SNS socijalisti hvale odluku naprednjaka da se uz gradske sledeÄ‡e godine ne odrÅ¾e i vanredni parlamentarni izbori, opozicja poruÄuje, grubo reÄeno, da lideru SNS Aleksandru VuÄiÄ‡u ne veruje, i da joÅ¡ niÅ¡ta nije gotovo.', '9_jankovic.jpg', '2017-11-18 23:43:45'),
(10, 9, 'Danas oblaÄno i hladno, mestimiÄno kiÅ¡a, na planinama slab sneg', 'U Srbiji Ä‡e danas biti oblaÄno i hladno, mestimiÄno sa kiÅ¡om u viÅ¡im planinskim predelima jugozapadne Srbije slab sneg.', 'Vetar slab i umeren, istoÄni i severoistoÄni. NajniÅ¾a temperatura od 3 do 7 C, najvisa od 5 do 10 C, saopÅ¡tio je RepubliÄki hidrometeoroloski zavod.\r\n\r\nI u Beogradu oblaÄno i hladno, povremeno sa slabom kiÅ¡om. Vetar slab i umeren, istoÄni. NajniÅ¾a temperatura 4, najvisa 8 C.', '10_kisni_dan.jpg', '2017-11-19 14:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `polaznici`
--

CREATE TABLE `polaznici` (
  `id` int(11) NOT NULL,
  `ime` char(50) CHARACTER SET utf8mb4 NOT NULL,
  `prezime` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `polaznici`
--

INSERT INTO `polaznici` (`id`, `ime`, `prezime`) VALUES
(1, 'Aleksandar', 'Dimic');

-- --------------------------------------------------------

--
-- Table structure for table `product-tags`
--

CREATE TABLE `product-tags` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product-tags`
--

INSERT INTO `product-tags` (`id`, `product_id`, `tag_id`) VALUES
(1, 39, 1),
(2, 39, 2),
(3, 39, 4),
(4, 31, 5),
(5, 11, 2),
(6, 11, 3),
(7, 22, 2),
(8, 22, 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `photo_filename` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `specification` longtext,
  `price` decimal(10,2) NOT NULL,
  `quantity` float NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `on_sale` tinyint(1) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `title`, `photo_filename`, `description`, `specification`, `price`, `quantity`, `category_id`, `on_sale`, `discount`, `created_at`) VALUES
(7, 1, 'Apple iPhone7 32GB', '7_lisice.jpg_1511096692', 'Mobilni Telefon Apple iPhone7 32GB', '', '98546.21', 23, 6, 0, '0.00', '2016-06-12 12:53:00'),
(8, 1, 'Apple iPhone7 64GB', '', 'Mobilni Telefon Apple iPhone7 64GB', '', '112345.12', 2, 1, 0, '0.00', '2016-12-13 13:53:00'),
(9, 1, 'Apple iPhone7 32GB Gold', '', 'Mobilni Telefon Apple iPhone7 32GB Gold', '', '101234.23', 1, 1, 0, '0.00', '2016-03-14 14:53:00'),
(10, 1, 'Apple iPhone8 32GB', '', 'Mobilni Telefon Apple iPhone8 32GB', '', '141889.32', 12, 1, 1, '15.00', '2017-04-15 15:53:00'),
(11, 1, 'Apple iPhone8 64GB', '', 'Mobilni Telefon Apple iPhone8 64GB', '', '151339.32', 2, 1, 0, '0.00', '2017-06-16 16:53:00'),
(12, 1, 'Apple iPhone8 32GB Gold', '', 'Mobilni Telefon Apple iPhone8 32GB Gold', '', '161323.37', 0, 1, 0, '0.00', '2017-08-17 17:53:00'),
(13, 8, 'Samsung Galaxy S8', '', 'Mobilni Telefon Samsung Galaxy S8', '', '99876.34', 12, 1, 0, '0.00', '2017-06-18 18:53:00'),
(14, 8, 'Samsung Galaxy S7', '', 'Mobilni Telefon Samsung Galaxy S7', '', '69887.34', 3, 1, 0, '0.00', '2016-07-19 14:53:00'),
(15, 8, 'Samsung Galaxy S6', '', 'Mobilni Telefon Samsung Galaxy S6', '', '55763.34', 3, 1, 0, '0.00', '2015-02-20 11:53:00'),
(16, 6, 'Huawei P10', '', 'Mobilni Telefon Huawei P10', '', '67898.77', 6, 1, 0, '0.00', '2016-11-21 12:53:00'),
(17, 6, 'Huawei P9', '', 'Mobilni Telefon Huawei P9', '', '65632.33', 12, 1, 0, '0.00', '2015-03-22 12:53:00'),
(18, 5, 'HTC Desire 820', '', 'Mobilni Telefon HTC Desire 820', '', '32456.76', 3, 1, 0, '0.00', '2014-08-23 12:53:00'),
(19, 5, 'HTC One A9', '', 'Mobilni Telefon HTC One A9', '', '42323.47', 11, 1, 1, '20.00', '2016-05-24 12:53:00'),
(20, 5, 'HTC U11', '', 'Mobilni Telefon HTC U11', '', '55736.43', 7, 1, 0, '0.00', '2017-06-25 12:53:00'),
(21, 8, 'Samsung UE-32J4000AWXXH', '', 'Televizor Samsung UE-32J4000AWXXH', '', '32985.76', 0, 2, 0, '0.00', '2015-12-26 12:53:00'),
(22, 8, 'Samsung UE-32K4102AKXXH', '', 'Televizor Samsung UE-32K4102AKXXH', '', '34323.32', 5, 2, 0, '0.00', '2016-11-27 12:53:00'),
(23, 8, 'Samsung', '', 'Televizor Samsung', '', '11212.12', 0, 2, 0, '0.00', '2017-09-28 12:53:00'),
(24, 7, 'LG 32LH510B', '', 'Televizor LG 32LH510B', '', '14544.32', 6, 2, 0, '0.00', '2017-01-29 12:53:00'),
(25, 7, 'LG 32LH510U', '', 'Televizor LG 32LH510U', '', '12345.54', 8, 2, 0, '0.00', '2016-08-30 12:53:00'),
(26, 9, 'Sony KD 65XE9005BAEP', '', 'Televizor Sony KD 65XE9005BAEP', '', '88989.33', 12, 2, 1, '10.00', '2015-07-01 12:53:00'),
(27, 9, 'Sony LED LCD KDL 50W755CBAEP', '', 'Televizor Sony LED LCD KDL 50W755CBAEP', '', '72098.23', 2, 2, 0, '0.00', '2014-10-02 12:53:00'),
(28, 9, 'Sony 40WD650BAEP', '', 'Televizor Sony 40WD650BAEP', '', '56765.32', 12, 2, 0, '0.00', '2013-10-03 12:53:00'),
(29, 9, 'Sony TV KDL32WE615BAEP', '', 'Televizor Sony TV KDL32WE615BAEP', '', '32345.56', 4, 2, 0, '0.00', '2015-04-04 12:53:00'),
(30, 2, 'Beko RCS A300K 20W', '', 'Frizider Beko RCS A300K 20W', '', '28999.99', 2, 3, 1, '5.00', '2013-07-05 12:53:00'),
(31, 2, 'Beko DSA 28020', '', 'Frizider Beko DSA 28020', '', '27654.23', 1, 3, 0, '0.00', '2017-08-06 12:53:00'),
(32, 4, 'Gorenje RC 4180 AW', '', 'Frizider Gorenje RC 4180 AW', '', '32456.65', 0, 3, 0, '0.00', '2014-01-07 12:53:00'),
(33, 4, 'Gorenje RF 4120 AW', '', 'Frizider Gorenje RF 4120 AW', '', '21987.72', 3, 3, 0, '0.00', '2012-03-08 12:53:00'),
(34, 3, 'Bosh KGN 36NL30', '', 'Frizider Bosh KGN 36NL30', '', '54320.43', 1, 3, 0, '0.00', '2013-07-09 12:53:00'),
(35, 2, 'Beko WRE 5400 B', '', 'Ves Masina Beko WRE 5400 B', '', '19887.23', 1, 4, 0, '0.00', '2015-06-10 12:53:00'),
(36, 4, 'Gorenje W 6723 S', '', 'Ves Masina Gorenje W 6723 S', '', '19932.23', 0, 4, 1, '30.00', '2014-01-11 12:53:00'),
(37, 3, 'Bosh WAB 24262BY', '', 'Ves Masina Bosh WAB 24262BY', '', '32456.23', 3, 4, 0, '0.00', '2016-09-12 12:53:00'),
(38, NULL, 'Whirpool AWOC 70100', '', 'Ves Masina Whirpool AWOC 70100', '', '26786.56', 1, 4, 0, '0.00', '2017-07-13 12:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `title`) VALUES
(2, 'Zabava'),
(4, 'Kultura'),
(5, 'Crna hronika'),
(7, 'DruÅ¡tvo'),
(8, 'Vesti'),
(9, 'Vremenska prognoza'),
(10, 'Sport i rekreacija');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`) VALUES
(1, 'Najprodavaniji'),
(2, 'Ekstra kvalitet'),
(3, 'Pobednik sajma tehnike'),
(4, 'Garancija 2 godine'),
(5, 'Garancija 5 godina');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `polaznici`
--
ALTER TABLE `polaznici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product-tags`
--
ALTER TABLE `product-tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `polaznici`
--
ALTER TABLE `polaznici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product-tags`
--
ALTER TABLE `product-tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
