-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 16, 2023 at 12:32 AM
-- Server version: 10.3.39-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codekal1_upmega`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `addressline` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `town_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` longtext DEFAULT NULL,
  `description` longtext NOT NULL,
  `image_big` varchar(255) NOT NULL,
  `image_small` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image_big`, `image_small`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Recliner Chair', 'recliner-chair', 'Recliner Chair', '3631.jpg', '8015.jpg', 1, '2023-09-27 14:02:27', '2023-09-27 14:02:31'),
(2, 'Recliner Sofa Set', 'recliner-sofa-set', 'Recliner Sofa Set', '7251.jpg', '9951.jpg', 1, '2023-09-27 14:19:18', '2023-09-27 14:19:19'),
(3, 'Recliner Sectional', 'recliner-sectional', 'Recliner Sectional', '9988.jpg', '2572.jpg', 1, '2023-09-27 14:19:51', '2023-09-27 14:19:52');

-- --------------------------------------------------------

--
-- Table structure for table `category_images`
--

CREATE TABLE `category_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `image_big` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_image_alts`
--

CREATE TABLE `category_image_alts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `image_small` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `state_id` varchar(255) NOT NULL,
  `state_code` varchar(255) NOT NULL,
  `state_name` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `country_id` varchar(255) NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `country_name` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `wikiDataId` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state_id`, `state_code`, `state_name`, `country_id`, `country_code`, `country_name`, `latitude`, `longitude`, `wikiDataId`) VALUES
(64772, 'Ahero', '171', '17', 'Kisumu', '113', 'KE', 'Kenya', '-0.17359000', '34.91890000', 'Q2280998'),
(64773, 'Athi River', '184', '22', 'Machakos', '113', 'KE', 'Kenya', '-1.45630000', '36.97826000', 'Q4813647'),
(64774, 'Baringo', '181', '01', 'Baringo', '113', 'KE', 'Kenya', '0.46667000', '35.96667000', 'Q4813647'),
(64775, 'Bondo', '186', '38', 'Siaya', '113', 'KE', 'Kenya', '0.23522000', '34.28086000', 'Q1013242'),
(64776, 'Bungoma', '168', '03', 'Bungoma', '113', 'KE', 'Kenya', '0.56350000', '34.56055000', 'Q996851'),
(64777, 'Busia', '161', '04', 'Busia', '113', 'KE', 'Kenya', '0.46005000', '34.11169000', 'Q1111957'),
(64778, 'Butere', '158', '11', 'Kakamega', '113', 'KE', 'Kenya', '0.20694000', '34.49006000', 'Q1017895'),
(64779, 'Chepareria', '208', '47', 'West Pokot', '113', 'KE', 'Kenya', '1.30583000', '35.20365000', 'Q1017895'),
(64780, 'Chuka', '185', '41', 'Tharaka-Nithi', '113', 'KE', 'Kenya', '-0.33316000', '37.64587000', 'Q1017895'),
(64781, 'Eldama Ravine', '181', '01', 'Baringo', '113', 'KE', 'Kenya', '0.05196000', '35.72734000', 'Q1009186'),
(64782, 'Eldoret', '169', '44', 'Uasin Gishu', '113', 'KE', 'Kenya', '0.52036000', '35.26993000', 'Q322149'),
(64783, 'Embu', '163', '06', 'Embu', '113', 'KE', 'Kenya', '-0.53987000', '37.45743000', 'Q186362'),
(64784, 'Garissa', '196', '07', 'Garissa', '113', 'KE', 'Kenya', '-0.45275000', '39.64601000', 'Q845717'),
(64785, 'Gazi', '173', '19', 'Kwale', '113', 'KE', 'Kenya', '-4.42402000', '39.50588000', 'Q5526462'),
(64786, 'Hola', '205', '40', 'Tana River', '113', 'KE', 'Kenya', '-1.48256000', '40.03341000', 'Q2738432'),
(64787, 'Homa Bay', '195', '08', 'Homa Bay', '113', 'KE', 'Kenya', '-0.52731000', '34.45714000', 'Q1009161'),
(64788, 'Isiolo', '170', '09', 'Isiolo', '113', 'KE', 'Kenya', '0.35462000', '37.58218000', 'Q1020292'),
(64789, 'Iten', '174', '14', 'Kilifi', '113', 'KE', 'Kenya', '0.67028000', '35.50806000', 'Q1020292'),
(64790, 'Kabarnet', '181', '01', 'Baringo', '113', 'KE', 'Kenya', '0.49194000', '35.74303000', 'Q166916'),
(64791, 'Kajiado', '197', '10', 'Kajiado', '113', 'KE', 'Kenya', '-1.85238000', '36.77683000', 'Q2349480'),
(64792, 'Kakamega', '158', '11', 'Kakamega', '113', 'KE', 'Kenya', '0.28422000', '34.75229000', 'Q302912'),
(64793, 'Kangema', '178', '29', 'Murang’a', '113', 'KE', 'Kenya', '-0.68553000', '36.96463000', 'Q302912'),
(64794, 'Kangundo', '184', '22', 'Machakos', '113', 'KE', 'Kenya', '-1.30342000', '37.34813000', 'Q6362919'),
(64795, 'Kapenguria', '208', '47', 'West Pokot', '113', 'KE', 'Kenya', '1.23889000', '35.11194000', 'Q3239214'),
(64796, 'Kapsabet', '165', '32', 'Nandi', '113', 'KE', 'Kenya', '0.20387000', '35.10500000', 'Q1323405'),
(64797, 'Kapsowar', '174', '14', 'Kilifi', '113', 'KE', 'Kenya', '0.97890000', '35.55854000', 'Q1009149'),
(64798, 'Karuri', '178', '29', 'Murang’a', '113', 'KE', 'Kenya', '-0.70000000', '37.18333000', 'Q6373732'),
(64799, 'Kericho', '193', '12', 'Kericho', '113', 'KE', 'Kenya', '-0.36774000', '35.28314000', 'Q6373732'),
(64800, 'Keroka', '209', '34', 'Nyamira', '113', 'KE', 'Kenya', '-0.77612000', '34.94678000', 'Q6373732'),
(64801, 'Kerugoya', '167', '15', 'Kirinyaga', '113', 'KE', 'Kenya', '-0.49887000', '37.28031000', 'Q1021572'),
(64802, 'Kiambu', '199', '13', 'Kiambu', '113', 'KE', 'Kenya', '-1.17139000', '36.83556000', 'Q3242959'),
(64803, 'Kihancha', '190', '27', 'Migori', '113', 'KE', 'Kenya', '-1.19347000', '34.61967000', 'Q5243392'),
(64804, 'Kijabe', '203', '31', 'Nakuru', '113', 'KE', 'Kenya', '-0.93334000', '36.57233000', 'Q2719508'),
(64805, 'Kikuyu', '199', '13', 'Kiambu', '113', 'KE', 'Kenya', '-1.24627000', '36.66291000', 'Q1026079'),
(64806, 'Kilifi', '174', '14', 'Kilifi', '113', 'KE', 'Kenya', '-3.63045000', '39.84992000', 'Q1009199'),
(64807, 'Kinango', '173', '19', 'Kwale', '113', 'KE', 'Kenya', '-4.13723000', '39.31528000', 'Q1009199'),
(64808, 'Kipini', '205', '40', 'Tana River', '113', 'KE', 'Kenya', '-2.52565000', '40.52620000', 'Q1009199'),
(64809, 'Kipkelion', '193', '12', 'Kericho', '113', 'KE', 'Kenya', '-0.19982000', '35.46735000', 'Q6703164'),
(64810, 'Kisii', '159', '16', 'Kisii', '113', 'KE', 'Kenya', '-0.68174000', '34.76666000', 'Q1007719'),
(64811, 'Kisumu', '171', '17', 'Kisumu', '113', 'KE', 'Kenya', '-0.10221000', '34.76171000', 'Q214485'),
(64812, 'Kitale', '183', '42', 'Trans Nzoia', '113', 'KE', 'Kenya', '1.01572000', '35.00622000', 'Q523000'),
(64813, 'Kitui', '211', '18', 'Kitui', '113', 'KE', 'Kenya', '-1.36696000', '38.01055000', 'Q3056770'),
(64814, 'Konza', '184', '22', 'Machakos', '113', 'KE', 'Kenya', '-1.73947000', '37.13195000', 'Q6430460'),
(64815, 'Kwale', '173', '19', 'Kwale', '113', 'KE', 'Kenya', '-4.17375000', '39.45206000', 'Q635215'),
(64816, 'Lamu', '166', '21', 'Lamu', '113', 'KE', 'Kenya', '-2.27169000', '40.90201000', 'Q635215'),
(64817, 'Limuru', '199', '13', 'Kiambu', '113', 'KE', 'Kenya', '-1.11360000', '36.64205000', 'Q1825607'),
(64818, 'Litein', '193', '12', 'Kericho', '113', 'KE', 'Kenya', '-0.58249000', '35.18969000', 'Q2613483'),
(64819, 'Lodwar', '206', '43', 'Turkana', '113', 'KE', 'Kenya', '3.11988000', '35.59642000', 'Q995707'),
(64820, 'Londiani', '193', '12', 'Kericho', '113', 'KE', 'Kenya', '-0.16552000', '35.59359000', 'Q6669717'),
(64821, 'Luanda', '161', '04', 'Busia', '113', 'KE', 'Kenya', '0.31354000', '34.07146000', 'Q6669717'),
(64822, 'Lugulu', '161', '04', 'Busia', '113', 'KE', 'Kenya', '0.39337000', '34.30399000', 'Q6669717'),
(64823, 'Machakos', '184', '22', 'Machakos', '113', 'KE', 'Kenya', '-1.52233000', '37.26521000', 'Q693093'),
(64824, 'Magadi', '197', '10', 'Kajiado', '113', 'KE', 'Kenya', '-1.90122000', '36.28700000', 'Q693093'),
(64825, 'Makueni Boma', '188', '23', 'Makueni', '113', 'KE', 'Kenya', '-1.80388000', '37.62405000', 'Q693093'),
(64826, 'Malaba', '161', '04', 'Busia', '113', 'KE', 'Kenya', '0.63513000', '34.28165000', 'Q6740728'),
(64827, 'Malikisi', '168', '03', 'Bungoma', '113', 'KE', 'Kenya', '0.67694000', '34.42167000', 'Q6740728'),
(64828, 'Malindi', '174', '14', 'Kilifi', '113', 'KE', 'Kenya', '-3.21799000', '40.11692000', 'Q271411'),
(64829, 'Mandera', '187', '24', 'Mandera', '113', 'KE', 'Kenya', '3.93726000', '41.85688000', 'Q949915'),
(64830, 'Maragua', '178', '29', 'Murang’a', '113', 'KE', 'Kenya', '-0.79602000', '37.13292000', 'Q1892268'),
(64831, 'Maralal', '207', '37', 'Samburu', '113', 'KE', 'Kenya', '1.09667000', '36.69806000', 'Q2341879'),
(64832, 'Mariakani', '174', '14', 'Kilifi', '113', 'KE', 'Kenya', '-3.86261000', '39.47458000', 'Q6761771'),
(64833, 'Marsabit', '194', '25', 'Marsabit', '113', 'KE', 'Kenya', '2.33468000', '37.99086000', 'Q1709128'),
(64834, 'Maua', '198', '26', 'Meru', '113', 'KE', 'Kenya', '0.23320000', '37.94086000', 'Q690356'),
(64835, 'Meru', '198', '26', 'Meru', '113', 'KE', 'Kenya', '0.04626000', '37.65587000', 'Q934149'),
(64836, 'Migori', '190', '27', 'Migori', '113', 'KE', 'Kenya', '-1.06343000', '34.47313000', 'Q1932505'),
(64837, 'Molo', '203', '31', 'Nakuru', '113', 'KE', 'Kenya', '-0.24849000', '35.73194000', 'Q3506442'),
(64838, 'Mombasa', '200', '28', 'Mombasa', '113', 'KE', 'Kenya', '-4.05466000', '39.66359000', 'Q225641'),
(64839, 'Moyale', '194', '25', 'Marsabit', '113', 'KE', 'Kenya', '3.52661000', '39.05610000', 'Q1009179'),
(64840, 'Mtito Andei', '188', '23', 'Makueni', '113', 'KE', 'Kenya', '-2.68987000', '38.16687000', 'Q6930477'),
(64841, 'Muhoroni', '171', '17', 'Kisumu', '113', 'KE', 'Kenya', '-0.15816000', '35.19645000', 'Q6930477'),
(64842, 'Mumias', '158', '11', 'Kakamega', '113', 'KE', 'Kenya', '0.33474000', '34.48796000', 'Q1020110'),
(64843, 'Murang’a', '178', '29', 'Murang’a', '113', 'KE', 'Kenya', '-0.72104000', '37.15259000', 'Q974323'),
(64844, 'Mwingi', '211', '18', 'Kitui', '113', 'KE', 'Kenya', '-0.93605000', '38.05955000', 'Q974323'),
(64845, 'Nairobi', '191', '110', 'Nairobi City', '113', 'KE', 'Kenya', '-1.28333000', '36.81667000', 'Q3870'),
(64846, 'Naivasha', '203', '31', 'Nakuru', '113', 'KE', 'Kenya', '-0.71383000', '36.43261000', 'Q1007647'),
(64847, 'Nakuru', '203', '31', 'Nakuru', '113', 'KE', 'Kenya', '-0.30719000', '36.07225000', 'Q239421'),
(64848, 'Nambare', '161', '04', 'Busia', '113', 'KE', 'Kenya', '0.45813000', '34.25353000', 'Q239421'),
(64849, 'Nandi Hills', '165', '32', 'Nandi', '113', 'KE', 'Kenya', '0.10366000', '35.18426000', 'Q239421'),
(64850, 'Nanyuki', '164', '20', 'Laikipia', '113', 'KE', 'Kenya', '0.00624000', '37.07398000', 'Q123160'),
(64851, 'Naro Moru', '180', '36', 'Nyeri', '113', 'KE', 'Kenya', '-0.16357000', '37.01773000', 'Q2743647'),
(64852, 'Narok', '175', '33', 'Narok', '113', 'KE', 'Kenya', '-1.08083000', '35.87111000', 'Q998813'),
(64853, 'Ngong', '197', '10', 'Kajiado', '113', 'KE', 'Kenya', '-1.35270000', '36.66990000', 'Q1279716'),
(64854, 'Nyahururu', '164', '20', 'Laikipia', '113', 'KE', 'Kenya', '0.03813000', '36.36339000', 'Q948344'),
(64855, 'Nyamira', '209', '34', 'Nyamira', '113', 'KE', 'Kenya', '-0.56333000', '34.93583000', 'Q657924'),
(64856, 'Nyeri', '180', '36', 'Nyeri', '113', 'KE', 'Kenya', '-0.42013000', '36.94759000', 'Q380130'),
(64857, 'Ogembo', '159', '16', 'Kisii', '113', 'KE', 'Kenya', '-0.80116000', '34.72579000', 'Q2526331'),
(64858, 'Ol Kalou', '192', '35', 'Nyandarua', '113', 'KE', 'Kenya', '-0.27088000', '36.37917000', 'Q7082832'),
(64859, 'Othaya', '180', '36', 'Nyeri', '113', 'KE', 'Kenya', '-0.54655000', '36.93178000', 'Q7108565'),
(64860, 'Oyugis', '195', '08', 'Homa Bay', '113', 'KE', 'Kenya', '-0.50974000', '34.73067000', 'Q7108565'),
(64861, 'Port Victoria', '161', '04', 'Busia', '113', 'KE', 'Kenya', '0.09809000', '33.97248000', 'Q7108565'),
(64862, 'Pumwani', '191', '110', 'Nairobi City', '113', 'KE', 'Kenya', '-1.28333000', '36.85000000', 'Q7259868'),
(64863, 'Rachuonyo District', '195', '08', 'Homa Bay', '113', 'KE', 'Kenya', '-0.44000000', '34.73900000', 'Q2125323'),
(64864, 'Rongai', '203', '31', 'Nakuru', '113', 'KE', 'Kenya', '-0.17344000', '35.86313000', 'Q984201'),
(64865, 'Rumuruti', '164', '20', 'Laikipia', '113', 'KE', 'Kenya', '0.27250000', '36.53806000', 'Q7379442'),
(64866, 'Sagana', '167', '15', 'Kirinyaga', '113', 'KE', 'Kenya', '-0.66806000', '37.20875000', 'Q7193402'),
(64867, 'Sawa Sawa', '173', '19', 'Kwale', '113', 'KE', 'Kenya', '-4.47166000', '39.48463000', 'Q7193402'),
(64868, 'Shimoni', '173', '19', 'Kwale', '113', 'KE', 'Kenya', '-4.64756000', '39.38175000', 'Q2395680'),
(64869, 'Siaya', '186', '38', 'Siaya', '113', 'KE', 'Kenya', '0.06070000', '34.28806000', 'Q2422035'),
(64870, 'Sotik', '210', '02', 'Bomet', '113', 'KE', 'Kenya', '-0.69069000', '35.11102000', 'Q2422035'),
(64871, 'Sotik Post', '210', '02', 'Bomet', '113', 'KE', 'Kenya', '-0.78129000', '35.34156000', 'Q891951'),
(64872, 'Takaungu', '174', '14', 'Kilifi', '113', 'KE', 'Kenya', '-3.68350000', '39.85687000', 'Q3236500'),
(64873, 'Taveta', '208', '47', 'West Pokot', '113', 'KE', 'Kenya', '-3.39879000', '37.68336000', 'Q2096406'),
(64874, 'Thika', '199', '110', 'Kiambu', '113', 'KE', 'Kenya', '-1.03326000', '37.06933000', 'Q589616'),
(64875, 'Voi', '208', '47', 'West Pokot', '113', 'KE', 'Kenya', '-3.39605000', '38.55609000', 'Q1552910'),
(64876, 'Wajir', '182', '46', 'Wajir', '113', 'KE', 'Kenya', '1.74710000', '40.05732000', 'Q730791'),
(64877, 'Webuye', '168', '03', 'Bungoma', '113', 'KE', 'Kenya', '0.60040000', '34.77119000', 'Q185340'),
(64878, 'Witu', '166', '21', 'Lamu', '113', 'KE', 'Kenya', '-2.38892000', '40.43827000', 'Q185340'),
(64879, 'Wote', '188', '23', 'Makueni', '113', 'KE', 'Kenya', '-1.78079000', '37.62882000', 'Q7193508'),
(64880, 'Wundanyi', '208', '47', 'West Pokot', '113', 'KE', 'Kenya', '-3.39642000', '38.35729000', 'Q3056743'),
(64881, 'Yala', '186', '38', 'Siaya', '113', 'KE', 'Kenya', '0.09438000', '34.53602000', 'Q3130935');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_towns`
--

CREATE TABLE `delivery_towns` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_towns`
--

INSERT INTO `delivery_towns` (`id`, `name`, `amount`, `created_at`, `updated_at`) VALUES
(2, 'Mombasa', 300, '2021-10-02 04:04:01', '2021-10-09 07:12:37'),
(3, 'Kisumu', 300, '2021-10-02 04:04:01', '2021-10-09 07:13:18'),
(4, 'Nakuru', 300, '2021-10-02 04:04:02', '2021-10-09 07:13:32'),
(5, 'Eldoret', 300, '2021-10-02 04:04:02', '2021-10-09 07:13:55'),
(7, 'Ruiru Same day delivery', 500, '2021-10-02 04:04:02', '2021-10-09 07:17:09'),
(8, 'Kikuyu Same day delivery', 500, '2021-10-02 04:04:02', '2021-10-09 07:19:28'),
(10, 'Malindi', 300, '2021-10-02 04:04:02', '2021-10-09 07:23:07'),
(11, 'Naivasha', 300, '2021-10-02 04:04:03', '2021-10-09 07:23:17'),
(12, 'Kitui', 300, '2021-10-02 04:04:03', '2021-10-09 07:23:27'),
(13, 'Machakos', 300, '2021-10-02 04:04:03', '2021-10-09 07:23:36'),
(14, 'Thika', 250, '2021-10-02 04:04:03', '2021-10-09 07:24:16'),
(15, 'Athi River (Mavoko)', 200, '2021-10-02 04:04:03', '2021-10-09 07:24:48'),
(17, 'Nyeri', 300, '2021-10-02 04:04:03', '2021-10-09 07:25:20'),
(18, 'Kilifi', 300, '2021-10-02 04:04:03', '2021-10-09 07:25:34'),
(19, 'Garissa', 550, '2021-10-02 04:04:03', '2021-10-09 07:26:48'),
(21, 'Mumias', 300, '2021-10-02 04:04:03', '2021-10-09 07:27:34'),
(22, 'Bomet', 300, '2021-10-02 04:04:03', '2021-10-09 07:27:49'),
(23, 'Molo', 300, '2021-10-02 04:04:03', '2021-10-09 07:28:00'),
(24, 'Ngong same day delivery', 800, '2021-10-02 04:04:03', '2021-10-09 07:28:45'),
(25, 'Kitale', 300, '2021-10-02 04:04:04', '2021-10-09 07:29:21'),
(27, 'Limuru', 250, '2021-10-02 04:04:04', '2021-10-09 07:29:57'),
(28, 'Kericho', 300, '2021-10-02 04:04:04', '2021-10-09 07:30:10'),
(31, 'Kakamega', 300, '2021-10-02 04:04:04', '2021-10-09 07:30:45'),
(32, 'Kapsabet', 300, '2021-10-02 04:04:04', '2021-10-09 07:30:57'),
(34, 'Kiambu town same day delivery', 500, '2021-10-02 04:04:04', '2021-10-09 07:32:08'),
(36, 'Nyamira', 300, '2021-10-02 04:04:05', '2021-10-09 07:33:42'),
(37, 'Mwingi', 300, '2021-10-02 04:04:05', '2021-10-09 07:33:55'),
(38, 'Kisii', 300, '2021-10-02 04:04:05', '2021-10-09 07:34:08'),
(40, 'Rongo', 300, '2021-10-02 04:04:05', '2021-10-09 07:34:53'),
(41, 'Bungoma', 300, '2021-10-02 04:04:05', '2021-10-09 07:35:08'),
(42, 'Ahero', 300, '2021-10-02 04:04:05', '2021-10-09 07:36:24'),
(43, 'Nandi Hills', 300, '2021-10-02 04:04:05', '2021-10-09 07:36:36'),
(44, 'Makuyu', 300, '2021-10-02 04:04:05', '2021-10-09 07:36:51'),
(45, 'Kapenguria', 300, '2021-10-02 04:04:05', '2021-10-09 07:37:09'),
(46, 'Taveta', 300, '2021-10-02 04:04:06', '2021-10-09 07:37:23'),
(47, 'Narok', 300, '2021-10-02 04:04:06', '2021-10-09 07:37:33'),
(50, 'Webuye', 300, '2021-10-02 04:04:06', '2021-10-09 07:38:03'),
(51, 'Malaba', 300, '2021-10-02 04:04:06', '2021-10-09 07:38:13'),
(53, 'Ukunda', 300, '2021-10-02 04:04:06', '2021-10-09 07:38:37'),
(54, 'Wundanyi', 300, '2021-10-02 04:04:06', '2021-10-09 07:38:48'),
(55, 'Busia', 300, '2021-10-02 04:04:06', '2021-10-09 07:38:59'),
(56, 'Runyenjes', 300, '2021-10-02 04:04:06', '2021-10-09 07:39:11'),
(57, 'Migori', 300, '2021-10-02 04:04:08', '2021-10-09 07:39:21'),
(60, 'Embu', 300, '2021-10-02 04:04:08', '2021-10-09 07:40:12'),
(62, 'Homa Bay', 300, '2021-10-02 04:04:08', '2021-10-09 07:40:30'),
(63, 'Lodwar', 550, '2021-10-02 04:04:08', '2021-10-09 07:41:11'),
(64, 'Kitengela same day delivery', 600, '2021-10-02 04:04:08', '2021-10-09 07:42:57'),
(65, 'Utawala next day delivery', 280, '2021-10-02 04:04:08', '2021-10-09 08:30:25'),
(67, 'Meru', 300, '2021-10-02 04:04:08', '2021-10-09 08:35:45'),
(68, 'Matuu', 300, '2021-10-02 04:04:09', '2021-10-09 08:35:55'),
(69, 'Oyugis', 300, '2021-10-02 04:04:09', '2021-10-09 08:36:08'),
(70, 'Nyahururu', 300, '2021-10-02 04:04:09', '2021-10-09 08:38:30'),
(73, 'Nanyuki', 300, '2021-10-02 04:04:09', '2021-10-09 10:16:04'),
(74, 'Maua', 300, '2021-10-02 04:04:09', '2021-10-09 10:16:15'),
(75, 'Mtwapa', 300, '2021-10-02 04:04:09', '2021-10-09 10:16:27'),
(76, 'Isiolo', 300, '2021-10-02 04:04:09', '2021-10-09 10:16:37'),
(77, 'Eldama Ravine', 300, '2021-10-02 04:04:09', '2021-10-09 10:16:48'),
(78, 'Voi', 300, '2021-10-02 04:04:09', '2021-10-09 10:16:57'),
(79, 'Siaya', 300, '2021-10-02 04:04:09', '2021-10-09 10:18:42'),
(83, 'Chuka', 300, '2021-10-02 04:04:09', '2021-10-09 10:22:53'),
(85, 'Juja same day delivery', 700, '2021-10-02 04:04:10', '2021-10-09 10:23:57'),
(86, 'Ongata Rongai next day delivery', 280, '2021-10-02 04:04:10', '2021-10-09 10:25:37'),
(90, 'Gilgil', 300, '2021-10-02 04:04:10', '2021-10-09 10:29:39'),
(94, 'Kerugoya/Kutus', 300, '2021-10-02 04:04:10', '2021-10-15 05:43:54'),
(99, 'Maragua', 300, '2021-10-02 04:04:10', '2021-10-15 05:45:55'),
(100, 'Kendu Bay', 300, '2021-10-02 04:04:10', '2021-10-15 05:46:32'),
(101, 'Westlands C', 250, '2021-10-05 13:51:44', '2021-10-15 05:55:02'),
(102, 'Kileleshwa', 300, '2021-10-06 03:15:51', '2021-10-06 03:15:51'),
(103, 'Lavington', 300, '2021-10-06 03:16:08', '2021-10-06 03:16:08'),
(104, 'westlands', 250, '2021-10-06 03:16:20', '2021-10-06 03:16:20'),
(105, 'Ngara', 250, '2021-10-06 03:16:30', '2021-10-06 03:16:30'),
(106, 'Upperhill', 250, '2021-10-06 03:16:41', '2021-10-06 03:16:41'),
(107, 'Madaraka', 250, '2021-10-06 03:16:52', '2021-10-06 03:16:52'),
(108, 'Nyayo stadium', 250, '2021-10-09 07:12:20', '2021-10-09 07:12:20'),
(109, 'Ruiru next day delivery', 280, '2021-10-09 07:17:37', '2021-10-09 07:17:37'),
(110, 'Ngong same next day delivery', 280, '2021-10-09 07:29:10', '2021-10-09 07:29:10'),
(111, 'Kiambu town next day delivery', 300, '2021-10-09 07:33:17', '2021-10-09 07:33:17'),
(112, 'Kitengela next day delivery', 280, '2021-10-09 07:43:23', '2021-10-09 07:43:23'),
(113, 'Utawala same day delivery', 500, '2021-10-09 08:34:07', '2021-10-09 08:34:07'),
(114, 'Juja next day delivery', 280, '2021-10-09 10:24:18', '2021-10-09 10:24:18'),
(115, 'Rongai same day delivery', 500, '2021-10-09 10:26:35', '2021-10-09 10:26:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(3, '2014_10_12_100000_create_password_resets_table', 3),
(4, '2019_08_19_000000_create_failed_jobs_table', 4),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 5),
(6, '2023_07_05_184555_create_permission_tables', 6),
(9, '2023_07_29_163322_create_contacts_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(5, 'App\\Models\\User', 1),
(5, 'App\\Models\\User', 7),
(5, 'App\\Models\\User', 41),
(5, 'App\\Models\\User', 45),
(5, 'App\\Models\\User', 50),
(5, 'App\\Models\\User', 68),
(6, 'App\\Models\\User', 2),
(6, 'App\\Models\\User', 42),
(8, 'App\\Models\\User', 48),
(8, 'App\\Models\\User', 54),
(8, 'App\\Models\\User', 56),
(8, 'App\\Models\\User', 58),
(8, 'App\\Models\\User', 60),
(8, 'App\\Models\\User', 61),
(8, 'App\\Models\\User', 65),
(8, 'App\\Models\\User', 66),
(8, 'App\\Models\\User', 67),
(8, 'App\\Models\\User', 69),
(8, 'App\\Models\\User', 70);

-- --------------------------------------------------------

--
-- Table structure for table `mpesa_transactions`
--

CREATE TABLE `mpesa_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TransactionType` varchar(255) DEFAULT NULL,
  `TransID` varchar(255) DEFAULT NULL,
  `TransTime` varchar(255) DEFAULT NULL,
  `account` varchar(255) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `api_ref` varchar(255) DEFAULT NULL,
  `value` float DEFAULT NULL,
  `charges` float DEFAULT NULL,
  `challenge` varchar(255) DEFAULT NULL,
  `BillRefNumber` longtext DEFAULT NULL,
  `invoice_id` longtext DEFAULT NULL,
  `registration_id` varchar(255) DEFAULT NULL,
  `host` varchar(255) DEFAULT NULL,
  `trans_updated_at` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `MiddleName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `clearing_status` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `net_amount` float DEFAULT NULL,
  `retry_count` varchar(255) DEFAULT NULL,
  `failed_reason` varchar(255) DEFAULT NULL,
  `failed_code` varchar(255) DEFAULT NULL,
  `failed_code_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mpesa_transactions`
--

INSERT INTO `mpesa_transactions` (`id`, `TransactionType`, `TransID`, `TransTime`, `account`, `provider`, `api_ref`, `value`, `charges`, `challenge`, `BillRefNumber`, `invoice_id`, `registration_id`, `host`, `trans_updated_at`, `FirstName`, `MiddleName`, `LastName`, `state`, `clearing_status`, `currency`, `created_at`, `updated_at`, `net_amount`, `retry_count`, `failed_reason`, `failed_code`, `failed_code_link`) VALUES
(42, 'M-PESA', NULL, '2023-09-01T23:10:49.775802+03:00', '254712345678', NULL, '11', 1, 0, 'Season2030', NULL, '0L37O9Y', NULL, '185.61.153.94', '2023-09-01T23:10:49.775830+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-02 00:10:51', '2023-09-02 00:10:51', 1, '0', NULL, NULL, NULL),
(81, 'M-PESA', NULL, '2023-09-07T12:16:57.209623+03:00', '254748422765', NULL, '24', 1740, 0, 'Season2030', NULL, 'Y57ZRVK', NULL, '185.61.153.94', '2023-09-07T12:17:17.148998+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-07 13:17:18', '2023-09-07 13:17:18', 1740, '0', 'Request cancelled by user', '1032', NULL),
(82, 'M-PESA', NULL, '2023-09-07T12:41:19.030643+03:00', '254796309986', NULL, '25', 1740, 0, 'Season2030', NULL, 'KQVXNR0', NULL, '185.61.153.94', '2023-09-07T12:41:19.030671+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-07 13:41:20', '2023-09-07 13:41:20', 1740, '0', NULL, NULL, NULL),
(83, 'M-PESA', NULL, '2023-09-07T12:41:19.030643+03:00', '254796309986', NULL, '25', 1740, 0, 'Season2030', NULL, 'KQVXNR0', NULL, '185.61.153.94', '2023-09-07T12:41:23.846810+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-07 13:41:25', '2023-09-07 13:41:25', 1740, '0', NULL, NULL, NULL),
(84, 'M-PESA', NULL, '2023-09-07T12:41:19.030643+03:00', '254796309986', NULL, '25', 1740, 0, 'Season2030', NULL, 'KQVXNR0', NULL, '185.61.153.94', '2023-09-07T12:41:48.856008+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-07 13:41:50', '2023-09-07 13:41:50', 1740, '0', 'The balance is insufficient for the transaction.', '1', NULL),
(85, 'M-PESA', NULL, '2023-09-07T12:48:38.856517+03:00', '254796309986', NULL, '26', 1740, 0, 'Season2030', NULL, 'YP2OLQY', NULL, '185.61.153.94', '2023-09-07T12:48:38.856540+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-07 13:48:40', '2023-09-07 13:48:40', 1740, '0', NULL, NULL, NULL),
(86, 'M-PESA', NULL, '2023-09-07T12:48:38.856517+03:00', '254796309986', NULL, '26', 1740, 0, 'Season2030', NULL, 'YP2OLQY', NULL, '185.61.153.94', '2023-09-07T12:48:43.558113+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-07 13:48:44', '2023-09-07 13:48:44', 1740, '0', NULL, NULL, NULL),
(87, 'M-PESA', 'RI7256XGZ2', '2023-09-07T12:48:38.856517+03:00', '254796309986', NULL, '26', 1740, 52.2, 'Season2030', NULL, 'YP2OLQY', NULL, '185.61.153.94', '2023-09-07T12:49:02.631438+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-07 13:49:04', '2023-09-07 13:49:04', 1687.8, '0', NULL, NULL, NULL),
(88, 'M-PESA', NULL, '2023-09-07T12:59:30.282776+03:00', '254715771516', NULL, '27', 1740, 0, 'Season2030', NULL, 'YG4L9OK', NULL, '185.61.153.94', '2023-09-07T12:59:30.282802+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-07 13:59:31', '2023-09-07 13:59:31', 1740, '0', NULL, NULL, NULL),
(89, 'M-PESA', NULL, '2023-09-07T12:59:30.282776+03:00', '254715771516', NULL, '27', 1740, 0, 'Season2030', NULL, 'YG4L9OK', NULL, '185.61.153.94', '2023-09-07T12:59:35.070362+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-07 13:59:36', '2023-09-07 13:59:36', 1740, '0', NULL, NULL, NULL),
(90, 'M-PESA', NULL, '2023-09-07T12:59:30.282776+03:00', '254715771516', NULL, '27', 1740, 0, 'Season2030', NULL, 'YG4L9OK', NULL, '185.61.153.94', '2023-09-07T12:59:48.954820+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-07 13:59:50', '2023-09-07 13:59:50', 1740, '0', 'Request cancelled by user', '1032', NULL),
(91, 'M-PESA', NULL, '2023-09-07T13:01:14.799908+03:00', '254715771516', NULL, '28', 1740, 0, 'Season2030', NULL, '08R3O6Y', NULL, '185.61.153.94', '2023-09-07T13:01:14.799945+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-07 14:01:16', '2023-09-07 14:01:16', 1740, '0', NULL, NULL, NULL),
(92, 'M-PESA', NULL, '2023-09-07T13:01:14.799908+03:00', '254715771516', NULL, '28', 1740, 0, 'Season2030', NULL, '08R3O6Y', NULL, '185.61.153.94', '2023-09-07T13:01:19.701100+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-07 14:01:20', '2023-09-07 14:01:20', 1740, '0', NULL, NULL, NULL),
(93, 'M-PESA', NULL, '2023-09-07T13:01:14.799908+03:00', '254715771516', NULL, '28', 1740, 0, 'Season2030', NULL, '08R3O6Y', NULL, '185.61.153.94', '2023-09-07T13:01:55.569084+03:00', NULL, NULL, NULL, 'RETRY', NULL, 'KES', '2023-09-07 14:01:56', '2023-09-07 14:01:56', 1740, '1', 'Failed to initiate transaction. Ensure your phone is on and sim card updated. Dial *234*1*6# from your Safaricom sim card to update it and try again.', '1037', NULL),
(94, 'M-PESA', NULL, '2023-09-07T13:05:32.760122+03:00', '254715771516', NULL, '29', 1740, 0, 'Season2030', NULL, '0XP3V5K', NULL, '185.61.153.94', '2023-09-07T13:05:32.760141+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-07 14:05:34', '2023-09-07 14:05:34', 1740, '0', NULL, NULL, NULL),
(95, 'M-PESA', NULL, '2023-09-07T13:05:32.760122+03:00', '254715771516', NULL, '29', 1740, 0, 'Season2030', NULL, '0XP3V5K', NULL, '185.61.153.94', '2023-09-07T13:05:37.576395+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-07 14:05:38', '2023-09-07 14:05:38', 1740, '0', NULL, NULL, NULL),
(96, 'M-PESA', 'RI7658OY4G', '2023-09-07T13:05:32.760122+03:00', '254715771516', NULL, '29', 1740, 52.2, 'Season2030', NULL, '0XP3V5K', NULL, '185.61.153.94', '2023-09-07T13:06:00.170571+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-07 14:06:01', '2023-09-07 14:06:01', 1687.8, '0', NULL, NULL, NULL),
(97, 'M-PESA', NULL, '2023-09-07T14:12:49.600906+03:00', '254715937770', NULL, '30', 1740, 0, 'Season2030', NULL, 'Y3BPEEY', NULL, '185.61.153.94', '2023-09-07T14:12:49.600935+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-07 15:12:51', '2023-09-07 15:12:51', 1740, '0', NULL, NULL, NULL),
(98, 'M-PESA', NULL, '2023-09-07T14:12:49.600906+03:00', '254715937770', NULL, '30', 1740, 0, 'Season2030', NULL, 'Y3BPEEY', NULL, '185.61.153.94', '2023-09-07T14:12:54.442956+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-07 15:12:55', '2023-09-07 15:12:55', 1740, '0', NULL, NULL, NULL),
(99, 'M-PESA', NULL, '2023-09-07T14:12:49.600906+03:00', '254715937770', NULL, '30', 1740, 0, 'Season2030', NULL, 'Y3BPEEY', NULL, '185.61.153.94', '2023-09-07T14:13:37.493485+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-07 15:13:38', '2023-09-07 15:13:38', 1740, '0', 'The initiator information is invalid.', '2001', NULL),
(100, 'M-PESA', NULL, '2023-09-07T14:16:27.373014+03:00', '254715937770', NULL, '31', 1740, 0, 'Season2030', NULL, 'YMMLJ3Y', NULL, '185.61.153.94', '2023-09-07T14:16:27.373037+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-07 15:16:28', '2023-09-07 15:16:28', 1740, '0', NULL, NULL, NULL),
(101, 'M-PESA', NULL, '2023-09-07T14:16:27.373014+03:00', '254715937770', NULL, '31', 1740, 0, 'Season2030', NULL, 'YMMLJ3Y', NULL, '185.61.153.94', '2023-09-07T14:16:32.235292+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-07 15:16:33', '2023-09-07 15:16:33', 1740, '0', NULL, NULL, NULL),
(102, 'M-PESA', 'RI785GARDM', '2023-09-07T14:16:27.373014+03:00', '254715937770', NULL, '31', 1740, 52.2, 'Season2030', NULL, 'YMMLJ3Y', NULL, '185.61.153.94', '2023-09-07T14:16:52.162781+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-07 15:16:53', '2023-09-07 15:16:53', 1687.8, '0', NULL, NULL, NULL),
(103, 'M-PESA', NULL, '2023-09-07T15:12:06.967548+03:00', '254715437214', NULL, '32', 1740, 0, 'Season2030', NULL, 'KJ4W3R0', NULL, '185.61.153.94', '2023-09-07T15:12:06.967567+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-07 16:12:08', '2023-09-07 16:12:08', 1740, '0', NULL, NULL, NULL),
(104, 'M-PESA', NULL, '2023-09-07T15:12:06.967548+03:00', '254715437214', NULL, '32', 1740, 0, 'Season2030', NULL, 'KJ4W3R0', NULL, '185.61.153.94', '2023-09-07T15:12:12.064085+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-07 16:12:13', '2023-09-07 16:12:13', 1740, '0', NULL, NULL, NULL),
(105, 'M-PESA', NULL, '2023-09-07T15:12:06.967548+03:00', '254715437214', NULL, '32', 1740, 0, 'Season2030', NULL, 'KJ4W3R0', NULL, '185.61.153.94', '2023-09-07T15:12:45.889409+03:00', NULL, NULL, NULL, 'RETRY', NULL, 'KES', '2023-09-07 16:12:47', '2023-09-07 16:12:47', 1740, '1', 'Failed to initiate transaction. Ensure your phone is on and sim card updated. Dial *234*1*6# from your Safaricom sim card to update it and try again.', '1037', NULL),
(106, 'M-PESA', NULL, '2023-09-07T18:18:19.357236+03:00', '254720127324', NULL, '33', 1740, 0, 'Season2030', NULL, 'KOJXQQY', NULL, '185.61.153.94', '2023-09-07T18:18:19.357265+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-07 19:18:21', '2023-09-07 19:18:21', 1740, '0', NULL, NULL, NULL),
(107, 'M-PESA', NULL, '2023-09-07T18:18:19.357236+03:00', '254720127324', NULL, '33', 1740, 0, 'Season2030', NULL, 'KOJXQQY', NULL, '185.61.153.94', '2023-09-07T18:18:24.256340+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-07 19:18:25', '2023-09-07 19:18:25', 1740, '0', NULL, NULL, NULL),
(108, 'M-PESA', NULL, '2023-09-07T18:18:19.357236+03:00', '254720127324', NULL, '33', 1740, 0, 'Season2030', NULL, 'KOJXQQY', NULL, '185.61.153.94', '2023-09-07T18:18:45.810320+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-07 19:18:47', '2023-09-07 19:18:47', 1740, '0', 'Request cancelled by user', '1032', NULL),
(109, 'M-PESA', NULL, '2023-09-07T20:19:41.209361+03:00', '254729660753', NULL, '34', 1740, 0, 'Season2030', NULL, 'YD422WK', NULL, '185.61.153.94', '2023-09-07T20:19:41.209378+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-08 00:19:42', '2023-09-08 00:19:42', 1740, '0', NULL, NULL, NULL),
(110, 'M-PESA', NULL, '2023-09-07T20:19:41.209361+03:00', '254729660753', NULL, '34', 1740, 0, 'Season2030', NULL, 'YD422WK', NULL, '185.61.153.94', '2023-09-07T20:19:46.144861+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-08 00:19:47', '2023-09-08 00:19:47', 1740, '0', NULL, NULL, NULL),
(111, 'M-PESA', NULL, '2023-09-07T20:19:41.209361+03:00', '254729660753', NULL, '34', 1740, 0, 'Season2030', NULL, 'YD422WK', NULL, '185.61.153.94', '2023-09-07T20:20:42.146037+03:00', NULL, NULL, NULL, 'RETRY', NULL, 'KES', '2023-09-08 00:20:43', '2023-09-08 00:20:43', 1740, '1', 'Failed to initiate transaction. Ensure your phone is on and sim card updated. Dial *234*1*6# from your Safaricom sim card to update it and try again.', '1037', NULL),
(112, 'M-PESA', NULL, '2023-09-07T20:38:49.067159+03:00', '254714991251', NULL, '35', 1740, 0, 'Season2030', NULL, 'YE4VRX0', NULL, '185.61.153.94', '2023-09-07T20:38:49.067186+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-08 00:38:50', '2023-09-08 00:38:50', 1740, '0', NULL, NULL, NULL),
(113, 'M-PESA', NULL, '2023-09-07T20:38:49.067159+03:00', '254714991251', NULL, '35', 1740, 0, 'Season2030', NULL, 'YE4VRX0', NULL, '185.61.153.94', '2023-09-07T20:38:54.818758+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-08 00:38:56', '2023-09-08 00:38:56', 1740, '0', NULL, NULL, NULL),
(114, 'M-PESA', NULL, '2023-09-07T20:38:49.067159+03:00', '254714991251', NULL, '35', 1740, 0, 'Season2030', NULL, 'YE4VRX0', NULL, '185.61.153.94', '2023-09-07T20:39:26.084377+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-08 00:39:27', '2023-09-08 00:39:27', 1740, '0', 'Request cancelled by user', '1032', NULL),
(115, 'M-PESA', NULL, '2023-09-07T20:19:41.209361+03:00', '254729660753', NULL, '34', 1740, 52.2, 'Season2030', NULL, 'YD422WK', NULL, '185.61.153.94', '2023-09-07T20:39:34.113921+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-08 00:39:35', '2023-09-08 00:39:35', 1687.8, '1', 'Failed to initiate transaction. Ensure your phone is on and sim card updated. Dial *234*1*6# from your Safaricom sim card to update it and try again.', '1037', NULL),
(116, 'M-PESA', NULL, '2023-09-07T21:51:31.948364+03:00', '254727266187', NULL, '36', 1740, 0, 'Season2030', NULL, 'YR6XZGK', NULL, '185.61.153.94', '2023-09-07T21:51:31.948386+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-08 01:51:33', '2023-09-08 01:51:33', 1740, '0', NULL, NULL, NULL),
(117, 'M-PESA', NULL, '2023-09-07T21:51:31.948364+03:00', '254727266187', NULL, '36', 1740, 0, 'Season2030', NULL, 'YR6XZGK', NULL, '185.61.153.94', '2023-09-07T21:51:36.812612+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-08 01:51:38', '2023-09-08 01:51:38', 1740, '0', NULL, NULL, NULL),
(118, 'M-PESA', NULL, '2023-09-07T21:51:31.948364+03:00', '254727266187', NULL, '36', 1740, 0, 'Season2030', NULL, 'YR6XZGK', NULL, '185.61.153.94', '2023-09-07T21:51:58.270947+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-08 01:51:59', '2023-09-08 01:51:59', 1740, '0', 'Request cancelled by user', '1032', NULL),
(119, 'M-PESA', NULL, '2023-09-08T01:52:42.546546+03:00', '254722628717', NULL, '37', 1740, 0, 'Season2030', NULL, 'KB4R4WY', NULL, '185.61.153.94', '2023-09-08T01:52:42.546564+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-08 05:52:44', '2023-09-08 05:52:44', 1740, '0', NULL, NULL, NULL),
(120, 'M-PESA', NULL, '2023-09-08T01:52:42.546546+03:00', '254722628717', NULL, '37', 1740, 0, 'Season2030', NULL, 'KB4R4WY', NULL, '185.61.153.94', '2023-09-08T01:52:47.442446+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-08 05:52:48', '2023-09-08 05:52:48', 1740, '0', NULL, NULL, NULL),
(121, 'M-PESA', NULL, '2023-09-08T01:52:42.546546+03:00', '254722628717', NULL, '37', 1740, 0, 'Season2030', NULL, 'KB4R4WY', NULL, '185.61.153.94', '2023-09-08T01:53:16.933301+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-08 05:53:18', '2023-09-08 05:53:18', 1740, '0', 'Request cancelled by user', '1032', NULL),
(122, 'M-PESA', NULL, '2023-09-08T08:03:22.401698+03:00', '254722628717', NULL, '38', 1740, 0, 'Season2030', NULL, '0XP3W6K', NULL, '185.61.153.94', '2023-09-08T08:03:22.401730+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-08 12:03:24', '2023-09-08 12:03:24', 1740, '0', NULL, NULL, NULL),
(123, 'M-PESA', NULL, '2023-09-08T08:03:22.401698+03:00', '254722628717', NULL, '38', 1740, 0, 'Season2030', NULL, '0XP3W6K', NULL, '185.61.153.94', '2023-09-08T08:03:25.283222+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-08 12:03:26', '2023-09-08 12:03:26', 1740, '0', NULL, NULL, NULL),
(124, 'M-PESA', 'RI897FXFT5', '2023-09-08T08:03:22.401698+03:00', '254722628717', NULL, '38', 1740, 52.2, 'Season2030', NULL, '0XP3W6K', NULL, '185.61.153.94', '2023-09-08T08:03:56.242174+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-08 12:03:57', '2023-09-08 12:03:57', 1687.8, '0', NULL, NULL, NULL),
(125, 'M-PESA', NULL, '2023-09-08T09:57:04.802689+03:00', '254793763130', NULL, '39', 1740, 0, 'Season2030', NULL, 'Y63BR9Y', NULL, '185.61.153.94', '2023-09-08T09:57:04.802717+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-08 13:57:06', '2023-09-08 13:57:06', 1740, '0', NULL, NULL, NULL),
(126, 'M-PESA', NULL, '2023-09-08T09:57:04.802689+03:00', '254793763130', NULL, '39', 1740, 0, 'Season2030', NULL, 'Y63BR9Y', NULL, '185.61.153.94', '2023-09-08T09:57:09.867470+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-08 13:57:11', '2023-09-08 13:57:11', 1740, '0', NULL, NULL, NULL),
(127, 'M-PESA', NULL, '2023-09-08T09:57:04.802689+03:00', '254793763130', NULL, '39', 1740, 0, 'Season2030', NULL, 'Y63BR9Y', NULL, '185.61.153.94', '2023-09-08T09:57:24.390002+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-08 13:57:25', '2023-09-08 13:57:25', 1740, '0', 'Request cancelled by user', '1032', NULL),
(128, 'M-PESA', NULL, '2023-09-08T10:05:55.945828+03:00', '254704972708', NULL, '40', 1740, 0, 'Season2030', NULL, 'Y57Z6GK', NULL, '185.61.153.94', '2023-09-08T10:05:55.945854+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-08 14:05:57', '2023-09-08 14:05:57', 1740, '0', NULL, NULL, NULL),
(129, 'M-PESA', NULL, '2023-09-08T10:05:55.945828+03:00', '254704972708', NULL, '40', 1740, 0, 'Season2030', NULL, 'Y57Z6GK', NULL, '185.61.153.94', '2023-09-08T10:06:00.766021+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-08 14:06:02', '2023-09-08 14:06:02', 1740, '0', NULL, NULL, NULL),
(130, 'M-PESA', 'RI807QZE26', '2023-09-08T10:05:55.945828+03:00', '254704972708', NULL, '40', 1740, 52.2, 'Season2030', NULL, 'Y57Z6GK', NULL, '185.61.153.94', '2023-09-08T10:06:15.915316+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-08 14:06:17', '2023-09-08 14:06:17', 1687.8, '0', NULL, NULL, NULL),
(131, 'M-PESA', NULL, '2023-09-07T12:15:39.137178+03:00', '254700', NULL, '23', 1, 0, 'Season2030', NULL, 'Y63BQ3Y', NULL, '185.61.153.94', '2023-09-08T11:06:43.709872+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-08 15:06:45', '2023-09-08 15:06:45', 1, '0', 'Payment cancelled.', NULL, NULL),
(132, 'M-PESA', NULL, '2023-09-08T12:25:29.689009+03:00', '254746454737', NULL, '41', 1740, 0, 'Season2030', NULL, 'KOJX2PY', NULL, '185.61.153.94', '2023-09-08T12:25:29.689030+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-08 16:25:31', '2023-09-08 16:25:31', 1740, '0', NULL, NULL, NULL),
(133, 'M-PESA', NULL, '2023-09-08T12:25:29.689009+03:00', '254746454737', NULL, '41', 1740, 0, 'Season2030', NULL, 'KOJX2PY', NULL, '185.61.153.94', '2023-09-08T12:25:31.609555+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-08 16:25:32', '2023-09-08 16:25:32', 1740, '0', NULL, NULL, NULL),
(134, 'M-PESA', 'RI8685ERW0', '2023-09-08T12:25:29.689009+03:00', '254746454737', NULL, '41', 1740, 52.2, 'Season2030', NULL, 'KOJX2PY', NULL, '185.61.153.94', '2023-09-08T12:25:56.685111+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-08 16:25:58', '2023-09-08 16:25:58', 1687.8, '0', NULL, NULL, NULL),
(135, 'M-PESA', NULL, '2023-09-09T16:49:01.275098+03:00', '254112822426', NULL, '42', 1740, 0, 'Season2030', NULL, 'YG4LJ8K', NULL, '185.61.153.94', '2023-09-09T16:49:01.275117+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-09 20:49:03', '2023-09-09 20:49:03', 1740, '0', NULL, NULL, NULL),
(136, 'M-PESA', NULL, '2023-09-09T16:49:01.275098+03:00', '254112822426', NULL, '42', 1740, 0, 'Season2030', NULL, 'YG4LJ8K', NULL, '185.61.153.94', '2023-09-09T16:49:06.377280+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-09 20:49:08', '2023-09-09 20:49:08', 1740, '0', NULL, NULL, NULL),
(137, 'M-PESA', NULL, '2023-09-09T16:49:01.275098+03:00', '254112822426', NULL, '42', 1740, 0, 'Season2030', NULL, 'YG4LJ8K', NULL, '185.61.153.94', '2023-09-09T16:49:33.104681+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-09 20:49:34', '2023-09-09 20:49:34', 1740, '0', 'Request cancelled by user', '1032', NULL),
(138, 'M-PESA', NULL, '2023-09-09T23:25:53.589210+03:00', '254710524212', NULL, '43', 1740, 0, 'Season2030', NULL, '0L3GNMY', NULL, '185.61.153.94', '2023-09-09T23:25:53.589235+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-10 03:25:54', '2023-09-10 03:25:54', 1740, '0', NULL, NULL, NULL),
(139, 'M-PESA', NULL, '2023-09-09T23:25:53.589210+03:00', '254710524212', NULL, '43', 1740, 0, 'Season2030', NULL, '0L3GNMY', NULL, '185.61.153.94', '2023-09-09T23:25:58.424940+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-10 03:25:59', '2023-09-10 03:25:59', 1740, '0', NULL, NULL, NULL),
(140, 'M-PESA', 'RI97DE9D67', '2023-09-09T23:25:53.589210+03:00', '254710524212', NULL, '43', 1740, 52.2, 'Season2030', NULL, '0L3GNMY', NULL, '185.61.153.94', '2023-09-09T23:26:11.991159+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-10 03:26:13', '2023-09-10 03:26:13', 1687.8, '0', NULL, NULL, NULL),
(141, 'M-PESA', NULL, '2023-09-11T11:38:39.123020+03:00', '254798329566', NULL, '44', 1740, 0, 'Season2030', NULL, '0WPQRDY', NULL, '185.61.153.94', '2023-09-11T11:38:39.123045+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-11 15:38:41', '2023-09-11 15:38:41', 1740, '0', NULL, NULL, NULL),
(142, 'M-PESA', NULL, '2023-09-11T11:38:39.123020+03:00', '254798329566', NULL, '44', 1740, 0, 'Season2030', NULL, '0WPQRDY', NULL, '185.61.153.94', '2023-09-11T11:38:44.080671+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-11 15:38:45', '2023-09-11 15:38:45', 1740, '0', NULL, NULL, NULL),
(143, 'M-PESA', NULL, '2023-09-11T11:38:39.123020+03:00', '254798329566', NULL, '44', 1740, 0, 'Season2030', NULL, '0WPQRDY', NULL, '185.61.153.94', '2023-09-11T11:39:08.185340+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-11 15:39:09', '2023-09-11 15:39:09', 1740, '0', 'Request cancelled by user', '1032', NULL),
(144, 'M-PESA', NULL, '2023-09-11T11:53:56.254663+03:00', '254700422699', NULL, '45', 1, 0, 'Season2030', NULL, 'KZPQV40', NULL, '185.61.153.94', '2023-09-11T11:53:56.254680+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-11 15:53:57', '2023-09-11 15:53:57', 1, '0', NULL, NULL, NULL),
(145, 'M-PESA', NULL, '2023-09-11T11:53:56.254663+03:00', '254700422699', NULL, '45', 1, 0, 'Season2030', NULL, 'KZPQV40', NULL, '185.61.153.94', '2023-09-11T11:54:01.292148+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-11 15:54:02', '2023-09-11 15:54:02', 1, '0', NULL, NULL, NULL),
(146, 'M-PESA', 'RIB0H4T5LY', '2023-09-11T11:53:56.254663+03:00', '254700422699', NULL, '45', 1, 0.03, 'Season2030', NULL, 'KZPQV40', NULL, '185.61.153.94', '2023-09-11T11:54:13.733640+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-11 15:54:15', '2023-09-11 15:54:15', 0.97, '0', NULL, NULL, NULL),
(147, 'M-PESA', NULL, '2023-09-11T11:59:05.219547+03:00', '254700422699', NULL, '46', 1, 0, 'Season2030', NULL, '04BJXNY', NULL, '185.61.153.94', '2023-09-11T11:59:05.219569+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-11 15:59:06', '2023-09-11 15:59:06', 1, '0', NULL, NULL, NULL),
(148, 'M-PESA', NULL, '2023-09-11T11:59:05.219547+03:00', '254700422699', NULL, '46', 1, 0, 'Season2030', NULL, '04BJXNY', NULL, '185.61.153.94', '2023-09-11T11:59:09.962646+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-11 15:59:11', '2023-09-11 15:59:11', 1, '0', NULL, NULL, NULL),
(149, 'M-PESA', 'RIB5H5BU89', '2023-09-11T11:59:05.219547+03:00', '254700422699', NULL, '46', 1, 0.03, 'Season2030', NULL, '04BJXNY', NULL, '185.61.153.94', '2023-09-11T11:59:22.178334+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-11 15:59:23', '2023-09-11 15:59:23', 0.97, '0', NULL, NULL, NULL),
(150, 'M-PESA', NULL, '2023-09-11T12:14:26.152648+03:00', '254700422699', NULL, '47', 1, 0, 'Season2030', NULL, 'KQVW450', NULL, '185.61.153.94', '2023-09-11T12:14:26.152676+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-11 16:14:28', '2023-09-11 16:14:28', 1, '0', NULL, NULL, NULL),
(151, 'M-PESA', NULL, '2023-09-11T12:14:26.152648+03:00', '254700422699', NULL, '47', 1, 0, 'Season2030', NULL, 'KQVW450', NULL, '185.61.153.94', '2023-09-11T12:14:30.978192+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-11 16:14:32', '2023-09-11 16:14:32', 1, '0', NULL, NULL, NULL),
(152, 'M-PESA', 'RIB9H6UISF', '2023-09-11T12:14:26.152648+03:00', '254700422699', NULL, '47', 1, 0.03, 'Season2030', NULL, 'KQVW450', NULL, '185.61.153.94', '2023-09-11T12:14:41.435455+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-11 16:14:43', '2023-09-11 16:14:43', 0.97, '0', NULL, NULL, NULL),
(153, 'M-PESA', NULL, '2023-09-11T12:17:34.411434+03:00', '254700422699', NULL, '48', 1, 0, 'Season2030', NULL, 'Y9JOEMK', NULL, '185.61.153.94', '2023-09-11T12:17:34.411454+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-11 16:17:36', '2023-09-11 16:17:36', 1, '0', NULL, NULL, NULL),
(154, 'M-PESA', NULL, '2023-09-11T12:17:34.411434+03:00', '254700422699', NULL, '48', 1, 0, 'Season2030', NULL, 'Y9JOEMK', NULL, '185.61.153.94', '2023-09-11T12:17:39.271207+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-11 16:17:40', '2023-09-11 16:17:40', 1, '0', NULL, NULL, NULL),
(155, 'M-PESA', 'RIB4H74HKY', '2023-09-11T12:17:34.411434+03:00', '254700422699', NULL, '48', 1, 0.03, 'Season2030', NULL, 'Y9JOEMK', NULL, '185.61.153.94', '2023-09-11T12:17:54.365797+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-11 16:17:56', '2023-09-11 16:17:56', 0.97, '0', NULL, NULL, NULL),
(156, 'M-PESA', NULL, '2023-09-11T12:21:15.491378+03:00', '254700422699', NULL, '49', 1, 0, 'Season2030', NULL, 'KB47O2Y', NULL, '185.61.153.94', '2023-09-11T12:21:15.491397+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-11 16:21:17', '2023-09-11 16:21:17', 1, '0', NULL, NULL, NULL),
(157, 'M-PESA', NULL, '2023-09-11T12:21:15.491378+03:00', '254700422699', NULL, '49', 1, 0, 'Season2030', NULL, 'KB47O2Y', NULL, '185.61.153.94', '2023-09-11T12:21:20.206095+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-11 16:21:21', '2023-09-11 16:21:21', 1, '0', NULL, NULL, NULL),
(158, 'M-PESA', 'RIB3H7G7PL', '2023-09-11T12:21:15.491378+03:00', '254700422699', NULL, '49', 1, 0.03, 'Season2030', NULL, 'KB47O2Y', NULL, '185.61.153.94', '2023-09-11T12:21:31.873107+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-11 16:21:33', '2023-09-11 16:21:33', 0.97, '0', NULL, NULL, NULL),
(159, 'M-PESA', NULL, '2023-09-11T12:24:40.680721+03:00', '254700422699', NULL, '50', 1, 0, 'Season2030', NULL, 'YE4R340', NULL, '185.61.153.94', '2023-09-11T12:24:40.680760+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-11 16:24:42', '2023-09-11 16:24:42', 1, '0', NULL, NULL, NULL),
(160, 'M-PESA', NULL, '2023-09-11T12:24:40.680721+03:00', '254700422699', NULL, '50', 1, 0, 'Season2030', NULL, 'YE4R340', NULL, '185.61.153.94', '2023-09-11T12:24:45.420561+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-11 16:24:47', '2023-09-11 16:24:47', 1, '0', NULL, NULL, NULL),
(161, 'M-PESA', 'RIB5H7QHM1', '2023-09-11T12:24:40.680721+03:00', '254700422699', NULL, '50', 1, 0.03, 'Season2030', NULL, 'YE4R340', NULL, '185.61.153.94', '2023-09-11T12:25:01.783003+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-11 16:25:03', '2023-09-11 16:25:03', 0.97, '0', NULL, NULL, NULL),
(162, 'M-PESA', NULL, '2023-09-11T15:17:13.470107+03:00', '254113089811', NULL, '51', 1, 0, 'Season2030', NULL, 'KB47D2Y', NULL, '185.61.153.94', '2023-09-11T15:17:13.470131+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-11 19:17:15', '2023-09-11 19:17:15', 1, '0', NULL, NULL, NULL),
(163, 'M-PESA', NULL, '2023-09-11T15:17:13.470107+03:00', '254113089811', NULL, '51', 1, 0, 'Season2030', NULL, 'KB47D2Y', NULL, '185.61.153.94', '2023-09-11T15:17:18.416736+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-11 19:17:20', '2023-09-11 19:17:20', 1, '0', NULL, NULL, NULL),
(164, 'M-PESA', NULL, '2023-09-11T15:17:13.470107+03:00', '254113089811', NULL, '51', 1, 0, 'Season2030', NULL, 'KB47D2Y', NULL, '185.61.153.94', '2023-09-11T15:17:33.448743+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-11 19:17:35', '2023-09-11 19:17:35', 1, '0', 'Request cancelled by user', '1032', NULL),
(165, 'M-PESA', NULL, '2023-09-11T17:47:53.406012+03:00', '254700422699', NULL, '52', 1740, 0, 'Season2030', NULL, '04BJLNY', NULL, '185.61.153.94', '2023-09-11T17:47:53.406035+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-11 21:47:55', '2023-09-11 21:47:55', 1740, '0', NULL, NULL, NULL),
(166, 'M-PESA', NULL, '2023-09-11T17:47:53.406012+03:00', '254700422699', NULL, '52', 1740, 0, 'Season2030', NULL, '04BJLNY', NULL, '185.61.153.94', '2023-09-11T17:47:58.200115+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-11 21:47:59', '2023-09-11 21:47:59', 1740, '0', NULL, NULL, NULL),
(167, 'M-PESA', NULL, '2023-09-11T17:47:53.406012+03:00', '254700422699', NULL, '52', 1740, 0, 'Season2030', NULL, '04BJLNY', NULL, '185.61.153.94', '2023-09-11T17:48:13.281409+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-11 21:48:14', '2023-09-11 21:48:14', 1740, '0', 'Request cancelled by user', '1032', NULL),
(168, 'M-PESA', NULL, '2023-09-11T18:01:21.453911+03:00', '254700422699', NULL, '53', 1740, 0, 'Season2030', NULL, 'KQVWE50', NULL, '185.61.153.94', '2023-09-11T18:01:21.453931+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-11 22:01:23', '2023-09-11 22:01:23', 1740, '0', NULL, NULL, NULL),
(169, 'M-PESA', NULL, '2023-09-11T18:01:21.453911+03:00', '254700422699', NULL, '53', 1740, 0, 'Season2030', NULL, 'KQVWE50', NULL, '185.61.153.94', '2023-09-11T18:01:26.303326+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-11 22:01:27', '2023-09-11 22:01:27', 1740, '0', NULL, NULL, NULL),
(170, 'M-PESA', NULL, '2023-09-12T12:53:04.524413+03:00', '254700422699', NULL, '77', 1, 0, 'Mukombero1812!', NULL, 'KOJZO4Y', NULL, '185.61.153.94', '2023-09-12T12:53:04.524435+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-12 16:53:06', '2023-09-12 16:53:06', 1, '0', NULL, NULL, NULL),
(171, 'M-PESA', NULL, '2023-09-12T12:53:04.524413+03:00', '254700422699', NULL, '77', 1, 0, 'Mukombero1812!', NULL, 'KOJZO4Y', NULL, '185.61.153.94', '2023-09-12T12:53:09.368033+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-12 16:53:11', '2023-09-12 16:53:11', 1, '0', NULL, NULL, NULL),
(172, 'M-PESA', 'RIC1KCO3O3', '2023-09-12T12:53:04.524413+03:00', '254700422699', NULL, '77', 1, 0.03, 'Mukombero1812!', NULL, 'KOJZO4Y', NULL, '185.61.153.94', '2023-09-12T12:53:21.627691+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-12 16:53:23', '2023-09-12 16:53:23', 0.97, '0', NULL, NULL, NULL),
(173, 'M-PESA', 'RIC9JUM3EB', '2023-09-12T12:53:04.524413+03:00', '254723841682', NULL, '77', 1740, 52.2, 'Mukombero1812!', NULL, 'YMMX66Y', NULL, '185.61.153.94', '2023-09-12T12:53:21.627691+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-12 16:53:23', '2023-09-12 16:53:23', 1687.8, '0', NULL, NULL, NULL),
(174, 'M-PESA', NULL, '2023-09-12T13:16:06.728146+03:00', '254700422699', NULL, '78', 1, 0, 'Mukombero1812!', NULL, 'YMMXD3Y', NULL, '185.61.153.94', '2023-09-12T13:16:06.728176+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-12 17:16:08', '2023-09-12 17:16:08', 1, '0', NULL, NULL, NULL),
(175, 'M-PESA', NULL, '2023-09-12T13:16:06.728146+03:00', '254700422699', NULL, '78', 1, 0, 'Mukombero1812!', NULL, 'YMMXD3Y', NULL, '185.61.153.94', '2023-09-12T13:16:11.601810+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-12 17:16:13', '2023-09-12 17:16:13', 1, '0', NULL, NULL, NULL),
(176, 'M-PESA', 'RIC7KF1ROP', '2023-09-12T13:16:06.728146+03:00', '254700422699', NULL, '78', 1, 0.03, 'Mukombero1812!', NULL, 'YMMXD3Y', NULL, '185.61.153.94', '2023-09-12T13:16:22.890442+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-12 17:16:24', '2023-09-12 17:16:24', 0.97, '0', NULL, NULL, NULL),
(177, 'M-PESA', NULL, '2023-09-12T13:45:57.429132+03:00', '254700422699', NULL, '79', 1, 0, 'Mukombero1812!', NULL, 'Y634Q3Y', NULL, '185.61.153.94', '2023-09-12T13:45:57.429156+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-12 17:45:59', '2023-09-12 17:45:59', 1, '0', NULL, NULL, NULL),
(178, 'M-PESA', NULL, '2023-09-12T13:45:57.429132+03:00', '254700422699', NULL, '79', 1, 0, 'Mukombero1812!', NULL, 'Y634Q3Y', NULL, '185.61.153.94', '2023-09-12T13:45:57.429156+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-12 17:45:59', '2023-09-12 17:45:59', 1, '0', NULL, NULL, NULL),
(179, 'M-PESA', NULL, '2023-09-12T13:45:57.429132+03:00', '254700422699', NULL, '79', 1, 0, 'Mukombero1812!', NULL, 'Y634Q3Y', NULL, '185.61.153.94', '2023-09-12T13:46:02.337382+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-12 17:46:04', '2023-09-12 17:46:04', 1, '0', NULL, NULL, NULL),
(180, 'M-PESA', 'RIC8KI9QV4', '2023-09-12T13:45:57.429132+03:00', '254700422699', NULL, '79', 1, 0.03, 'Mukombero1812!', NULL, 'Y634Q3Y', NULL, '185.61.153.94', '2023-09-12T13:46:28.847228+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-12 17:46:30', '2023-09-12 17:46:30', 0.97, '0', NULL, NULL, NULL),
(181, 'M-PESA', NULL, '2023-09-12T14:06:28.086649+03:00', '254706052917', NULL, '80', 1740, 0, 'Mukombero1812!', NULL, 'KZPN4V0', NULL, '185.61.153.94', '2023-09-12T14:06:28.086673+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-12 18:06:29', '2023-09-12 18:06:29', 1740, '0', NULL, NULL, NULL),
(182, 'M-PESA', NULL, '2023-09-12T14:06:28.086649+03:00', '254706052917', NULL, '80', 1740, 0, 'Mukombero1812!', NULL, 'KZPN4V0', NULL, '185.61.153.94', '2023-09-12T14:06:28.086673+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-12 18:06:29', '2023-09-12 18:06:29', 1740, '0', NULL, NULL, NULL),
(183, 'M-PESA', NULL, '2023-09-12T14:06:28.086649+03:00', '254706052917', NULL, '80', 1740, 0, 'Mukombero1812!', NULL, 'KZPN4V0', NULL, '185.61.153.94', '2023-09-12T14:06:33.033798+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-12 18:06:34', '2023-09-12 18:06:34', 1740, '0', NULL, NULL, NULL),
(184, 'M-PESA', NULL, '2023-09-12T14:06:28.086649+03:00', '254706052917', NULL, '80', 1740, 0, 'Mukombero1812!', NULL, 'KZPN4V0', NULL, '185.61.153.94', '2023-09-12T14:07:06.818769+03:00', NULL, NULL, NULL, 'RETRY', NULL, 'KES', '2023-09-12 18:07:08', '2023-09-12 18:07:08', 1740, '1', 'Failed to initiate transaction. Ensure your phone is on and sim card updated. Dial *234*1*6# from your Safaricom sim card to update it and try again.', '1037', NULL),
(185, 'M-PESA', NULL, '2023-09-12T15:28:44.504744+03:00', '254715771516', NULL, '81', 1740, 0, 'Mukombero1812!', NULL, 'KJ4Z3W0', NULL, '185.61.153.94', '2023-09-12T15:28:44.504772+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-12 19:28:46', '2023-09-12 19:28:46', 1740, '0', NULL, NULL, NULL),
(186, 'M-PESA', NULL, '2023-09-12T15:28:44.504744+03:00', '254715771516', NULL, '81', 1740, 0, 'Mukombero1812!', NULL, 'KJ4Z3W0', NULL, '185.61.153.94', '2023-09-12T15:28:44.504772+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-12 19:28:46', '2023-09-12 19:28:46', 1740, '0', NULL, NULL, NULL),
(187, 'M-PESA', NULL, '2023-09-12T15:28:44.504744+03:00', '254715771516', NULL, '81', 1740, 0, 'Mukombero1812!', NULL, 'KJ4Z3W0', NULL, '185.61.153.94', '2023-09-12T15:28:49.544931+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-12 19:28:51', '2023-09-12 19:28:51', 1740, '0', NULL, NULL, NULL),
(188, 'M-PESA', NULL, '2023-09-12T15:28:44.504744+03:00', '254715771516', NULL, '81', 1740, 0, 'Mukombero1812!', NULL, 'KJ4Z3W0', NULL, '185.61.153.94', '2023-09-12T15:29:14.441602+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-12 19:29:16', '2023-09-12 19:29:16', 1740, '0', 'The balance is insufficient for the transaction.', '1', NULL),
(213, 'M-PESA', NULL, '2023-09-12T17:45:16.900599+03:00', '254720081077', NULL, '88', 1740, 0, 'Mukombero1812!', NULL, 'KOJZQ4Y', NULL, '185.61.153.94', '2023-09-12T17:45:16.900626+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-12 21:45:18', '2023-09-12 21:45:18', 1740, '0', NULL, NULL, NULL),
(214, 'M-PESA', NULL, '2023-09-12T17:45:16.900599+03:00', '254720081077', NULL, '88', 1740, 0, 'Mukombero1812!', NULL, 'KOJZQ4Y', NULL, '185.61.153.94', '2023-09-12T17:45:16.900626+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-12 21:45:18', '2023-09-12 21:45:18', 1740, '0', NULL, NULL, NULL),
(215, 'M-PESA', NULL, '2023-09-12T17:45:16.900599+03:00', '254720081077', NULL, '88', 1740, 0, 'Mukombero1812!', NULL, 'KOJZQ4Y', NULL, '185.61.153.94', '2023-09-12T17:45:21.778847+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-12 21:45:23', '2023-09-12 21:45:23', 1740, '0', NULL, NULL, NULL),
(216, 'M-PESA', 'RIC3L8BC4H', '2023-09-12T17:45:16.900599+03:00', '254720081077', NULL, '88', 1740, 52.2, 'Mukombero1812!', NULL, 'KOJZQ4Y', NULL, '185.61.153.94', '2023-09-12T17:45:35.532510+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-12 21:45:37', '2023-09-12 21:45:37', 1687.8, '0', NULL, NULL, NULL),
(217, 'M-PESA', NULL, '2023-09-12T22:58:02.939411+03:00', '254720081077', NULL, '89', 1740, 0, 'Mukombero1812!', NULL, '0L3449Y', NULL, '185.61.153.94', '2023-09-12T22:58:02.939430+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-13 02:58:04', '2023-09-13 02:58:04', 1740, '0', NULL, NULL, NULL),
(218, 'M-PESA', NULL, '2023-09-12T22:58:02.939411+03:00', '254720081077', NULL, '89', 1740, 0, 'Mukombero1812!', NULL, '0L3449Y', NULL, '185.61.153.94', '2023-09-12T22:58:02.939430+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-13 02:58:04', '2023-09-13 02:58:04', 1740, '0', NULL, NULL, NULL),
(219, 'M-PESA', NULL, '2023-09-12T22:58:02.939411+03:00', '254720081077', NULL, '89', 1740, 0, 'Mukombero1812!', NULL, '0L3449Y', NULL, '185.61.153.94', '2023-09-12T22:58:07.840299+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-13 02:58:09', '2023-09-13 02:58:09', 1740, '0', NULL, NULL, NULL),
(220, 'M-PESA', NULL, '2023-09-12T22:58:02.939411+03:00', '254720081077', NULL, '89', 1740, 0, 'Mukombero1812!', NULL, '0L3449Y', NULL, '185.61.153.94', '2023-09-12T22:58:24.627908+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-13 02:58:26', '2023-09-13 02:58:26', 1740, '0', 'Request cancelled by user', '1032', NULL),
(221, 'M-PESA', NULL, '2023-09-13T06:34:29.647316+03:00', '254706398150', NULL, '90', 1740, 0, 'Mukombero1812!', NULL, 'Y3B477Y', NULL, '185.61.153.94', '2023-09-13T06:34:29.647341+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-13 10:34:31', '2023-09-13 10:34:31', 1740, '0', NULL, NULL, NULL),
(222, 'M-PESA', NULL, '2023-09-13T06:34:29.647316+03:00', '254706398150', NULL, '90', 1740, 0, 'Mukombero1812!', NULL, 'Y3B477Y', NULL, '185.61.153.94', '2023-09-13T06:34:29.647341+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-13 10:34:31', '2023-09-13 10:34:31', 1740, '0', NULL, NULL, NULL),
(223, 'M-PESA', NULL, '2023-09-13T06:34:29.647316+03:00', '254706398150', NULL, '90', 1740, 0, 'Mukombero1812!', NULL, 'Y3B477Y', NULL, '185.61.153.94', '2023-09-13T06:34:34.525524+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-13 10:34:36', '2023-09-13 10:34:36', 1740, '0', NULL, NULL, NULL),
(224, 'M-PESA', NULL, '2023-09-13T06:34:29.647316+03:00', '254706398150', NULL, '90', 1740, 0, 'Mukombero1812!', NULL, 'Y3B477Y', NULL, '185.61.153.94', '2023-09-13T06:34:49.540989+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-13 10:34:51', '2023-09-13 10:34:51', 1740, '0', 'Request cancelled by user', '1032', NULL),
(225, 'M-PESA', NULL, '2023-09-13T07:21:18.253983+03:00', '254713500111', NULL, '91', 1740, 0, 'Mukombero1812!', NULL, 'KZPNMG0', NULL, '185.61.153.94', '2023-09-13T07:21:18.254000+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-13 11:21:19', '2023-09-13 11:21:19', 1740, '0', NULL, NULL, NULL),
(226, 'M-PESA', NULL, '2023-09-13T07:21:18.253983+03:00', '254713500111', NULL, '91', 1740, 0, 'Mukombero1812!', NULL, 'KZPNMG0', NULL, '185.61.153.94', '2023-09-13T07:21:18.254000+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-13 11:21:19', '2023-09-13 11:21:19', 1740, '0', NULL, NULL, NULL),
(227, 'M-PESA', NULL, '2023-09-13T07:21:18.253983+03:00', '254713500111', NULL, '91', 1740, 0, 'Mukombero1812!', NULL, 'KZPNMG0', NULL, '185.61.153.94', '2023-09-13T07:21:23.141163+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-13 11:21:24', '2023-09-13 11:21:24', 1740, '0', NULL, NULL, NULL),
(228, 'M-PESA', NULL, '2023-09-13T07:21:18.253983+03:00', '254713500111', NULL, '91', 1740, 0, 'Mukombero1812!', NULL, 'KZPNMG0', NULL, '185.61.153.94', '2023-09-13T07:21:39.985144+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-13 11:21:41', '2023-09-13 11:21:41', 1740, '0', 'The balance is insufficient for the transaction.', '1', NULL),
(229, 'M-PESA', NULL, '2023-09-13T07:29:27.667353+03:00', '254713500111', NULL, '92', 1740, 0, 'Mukombero1812!', NULL, 'KQV76O0', NULL, '185.61.153.94', '2023-09-13T07:29:27.667406+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-13 11:29:29', '2023-09-13 11:29:29', 1740, '0', NULL, NULL, NULL),
(230, 'M-PESA', NULL, '2023-09-13T07:29:27.667353+03:00', '254713500111', NULL, '92', 1740, 0, 'Mukombero1812!', NULL, 'KQV76O0', NULL, '185.61.153.94', '2023-09-13T07:29:27.667406+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-13 11:29:29', '2023-09-13 11:29:29', 1740, '0', NULL, NULL, NULL),
(231, 'M-PESA', NULL, '2023-09-13T07:29:27.667353+03:00', '254713500111', NULL, '92', 1740, 0, 'Mukombero1812!', NULL, 'KQV76O0', NULL, '185.61.153.94', '2023-09-13T07:29:32.580908+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-13 11:29:34', '2023-09-13 11:29:34', 1740, '0', NULL, NULL, NULL),
(232, 'M-PESA', 'RID7MJGLY5', '2023-09-13T07:29:27.667353+03:00', '254713500111', NULL, '92', 1740, 52.2, 'Mukombero1812!', NULL, 'KQV76O0', NULL, '185.61.153.94', '2023-09-13T07:29:49.802962+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-13 11:29:51', '2023-09-13 11:29:51', 1687.8, '0', NULL, NULL, NULL),
(233, 'M-PESA', NULL, '2023-09-13T09:06:10.386035+03:00', '254718797195', NULL, '93', 1740, 0, 'Mukombero1812!', NULL, 'Y2BNJX0', NULL, '185.61.153.94', '2023-09-13T09:06:10.386054+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-13 13:06:12', '2023-09-13 13:06:12', 1740, '0', NULL, NULL, NULL),
(234, 'M-PESA', NULL, '2023-09-13T09:06:10.386035+03:00', '254718797195', NULL, '93', 1740, 0, 'Mukombero1812!', NULL, 'Y2BNJX0', NULL, '185.61.153.94', '2023-09-13T09:06:10.386054+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-13 13:06:12', '2023-09-13 13:06:12', 1740, '0', NULL, NULL, NULL),
(235, 'M-PESA', NULL, '2023-09-13T09:06:10.386035+03:00', '254718797195', NULL, '93', 1740, 0, 'Mukombero1812!', NULL, 'Y2BNJX0', NULL, '185.61.153.94', '2023-09-13T09:06:16.785598+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-13 13:06:18', '2023-09-13 13:06:18', 1740, '0', NULL, NULL, NULL),
(236, 'M-PESA', NULL, '2023-09-13T09:06:10.386035+03:00', '254718797195', NULL, '93', 1740, 0, 'Mukombero1812!', NULL, 'Y2BNJX0', NULL, '185.61.153.94', '2023-09-13T09:06:29.849767+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-13 13:06:31', '2023-09-13 13:06:31', 1740, '0', 'The balance is insufficient for the transaction.', '1', NULL),
(237, 'M-PESA', NULL, '2023-09-13T12:09:36.889306+03:00', '254725365665', NULL, '94', 1740, 0, 'Mukombero1812!', NULL, 'KQV7450', NULL, '185.61.153.94', '2023-09-13T12:09:36.889329+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-13 16:09:39', '2023-09-13 16:09:39', 1740, '0', NULL, NULL, NULL),
(238, 'M-PESA', NULL, '2023-09-13T12:09:36.889306+03:00', '254725365665', NULL, '94', 1740, 0, 'Mukombero1812!', NULL, 'KQV7450', NULL, '185.61.153.94', '2023-09-13T12:09:36.889329+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-13 16:09:39', '2023-09-13 16:09:39', 1740, '0', NULL, NULL, NULL),
(239, 'M-PESA', NULL, '2023-09-13T12:09:36.889306+03:00', '254725365665', NULL, '94', 1740, 0, 'Mukombero1812!', NULL, 'KQV7450', NULL, '185.61.153.94', '2023-09-13T12:09:41.890436+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-13 16:09:43', '2023-09-13 16:09:43', 1740, '0', NULL, NULL, NULL),
(240, 'M-PESA', NULL, '2023-09-13T12:09:36.889306+03:00', '254725365665', NULL, '94', 1740, 0, 'Mukombero1812!', NULL, 'KQV7450', NULL, '185.61.153.94', '2023-09-13T12:09:54.431775+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-13 16:09:56', '2023-09-13 16:09:56', 1740, '0', 'Request cancelled by user', '1032', NULL),
(241, 'M-PESA', NULL, '2023-09-13T12:17:35.697186+03:00', '254725365665', NULL, '95', 1740, 0, 'Mukombero1812!', NULL, 'YP29ZGY', NULL, '185.61.153.94', '2023-09-13T12:17:35.697209+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-13 16:17:37', '2023-09-13 16:17:37', 1740, '0', NULL, NULL, NULL),
(242, 'M-PESA', NULL, '2023-09-13T12:17:35.697186+03:00', '254725365665', NULL, '95', 1740, 0, 'Mukombero1812!', NULL, 'YP29ZGY', NULL, '185.61.153.94', '2023-09-13T12:17:35.697209+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-13 16:17:37', '2023-09-13 16:17:37', 1740, '0', NULL, NULL, NULL),
(243, 'M-PESA', NULL, '2023-09-13T12:17:35.697186+03:00', '254725365665', NULL, '95', 1740, 0, 'Mukombero1812!', NULL, 'YP29ZGY', NULL, '185.61.153.94', '2023-09-13T12:17:40.589014+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-13 16:17:42', '2023-09-13 16:17:42', 1740, '0', NULL, NULL, NULL),
(244, 'M-PESA', 'RID4N9D14E', '2023-09-13T12:17:35.697186+03:00', '254725365665', NULL, '95', 1740, 52.2, 'Mukombero1812!', NULL, 'YP29ZGY', NULL, '185.61.153.94', '2023-09-13T12:17:54.222100+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-13 16:17:55', '2023-09-13 16:17:55', 1687.8, '0', NULL, NULL, NULL),
(245, 'M-PESA', NULL, '2023-09-13T17:58:49.335257+03:00', '254790844181', NULL, '96', 1740, 0, 'Mukombero1812!', NULL, '0VP2E60', NULL, '185.61.153.94', '2023-09-13T17:58:49.335281+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-13 21:58:51', '2023-09-13 21:58:51', 1740, '0', NULL, NULL, NULL),
(246, 'M-PESA', NULL, '2023-09-13T17:58:49.335257+03:00', '254790844181', NULL, '96', 1740, 0, 'Mukombero1812!', NULL, '0VP2E60', NULL, '185.61.153.94', '2023-09-13T17:58:49.335281+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-13 21:58:51', '2023-09-13 21:58:51', 1740, '0', NULL, NULL, NULL),
(247, 'M-PESA', NULL, '2023-09-13T17:58:49.335257+03:00', '254790844181', NULL, '96', 1740, 0, 'Mukombero1812!', NULL, '0VP2E60', NULL, '185.61.153.94', '2023-09-13T17:58:54.212382+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-13 21:58:55', '2023-09-13 21:58:55', 1740, '0', NULL, NULL, NULL),
(248, 'M-PESA', NULL, '2023-09-13T17:58:49.335257+03:00', '254790844181', NULL, '96', 1740, 0, 'Mukombero1812!', NULL, '0VP2E60', NULL, '185.61.153.94', '2023-09-13T17:59:37.950742+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-13 21:59:39', '2023-09-13 21:59:39', 1740, '0', 'Request cancelled by user', '1032', NULL),
(249, 'M-PESA', NULL, '2023-09-13T18:01:48.519043+03:00', '254790844181', NULL, '97', 1740, 0, 'Mukombero1812!', NULL, 'Y634Z9Y', NULL, '185.61.153.94', '2023-09-13T18:01:48.519066+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-13 22:01:50', '2023-09-13 22:01:50', 1740, '0', NULL, NULL, NULL),
(250, 'M-PESA', NULL, '2023-09-13T18:01:48.519043+03:00', '254790844181', NULL, '97', 1740, 0, 'Mukombero1812!', NULL, 'Y634Z9Y', NULL, '185.61.153.94', '2023-09-13T18:01:48.519066+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-13 22:01:50', '2023-09-13 22:01:50', 1740, '0', NULL, NULL, NULL),
(251, 'M-PESA', NULL, '2023-09-13T18:01:48.519043+03:00', '254790844181', NULL, '97', 1740, 0, 'Mukombero1812!', NULL, 'Y634Z9Y', NULL, '185.61.153.94', '2023-09-13T18:01:53.432459+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-13 22:01:55', '2023-09-13 22:01:55', 1740, '0', NULL, NULL, NULL),
(252, 'M-PESA', NULL, '2023-09-13T18:01:48.519043+03:00', '254790844181', NULL, '97', 1740, 0, 'Mukombero1812!', NULL, 'Y634Z9Y', NULL, '185.61.153.94', '2023-09-13T18:02:29.093964+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-13 22:02:30', '2023-09-13 22:02:30', 1740, '0', 'Request cancelled by user', '1032', NULL),
(253, 'M-PESA', NULL, '2023-09-13T18:10:17.233551+03:00', '254790844181', NULL, '98', 1740, 0, 'Mukombero1812!', NULL, '0L34PNY', NULL, '185.61.153.94', '2023-09-13T18:10:17.233569+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-13 22:10:19', '2023-09-13 22:10:19', 1740, '0', NULL, NULL, NULL),
(254, 'M-PESA', NULL, '2023-09-13T18:10:17.233551+03:00', '254790844181', NULL, '98', 1740, 0, 'Mukombero1812!', NULL, '0L34PNY', NULL, '185.61.153.94', '2023-09-13T18:10:17.233569+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-13 22:10:19', '2023-09-13 22:10:19', 1740, '0', NULL, NULL, NULL),
(255, 'M-PESA', NULL, '2023-09-13T18:10:17.233551+03:00', '254790844181', NULL, '98', 1740, 0, 'Mukombero1812!', NULL, '0L34PNY', NULL, '185.61.153.94', '2023-09-13T18:10:22.109056+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-13 22:10:23', '2023-09-13 22:10:23', 1740, '0', NULL, NULL, NULL),
(256, 'M-PESA', 'RID2OBUL6A', '2023-09-13T18:10:17.233551+03:00', '254790844181', NULL, '98', 1740, 52.2, 'Mukombero1812!', NULL, '0L34PNY', NULL, '185.61.153.94', '2023-09-13T18:10:47.138882+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-13 22:10:48', '2023-09-13 22:10:48', 1687.8, '0', NULL, NULL, NULL),
(257, 'M-PESA', NULL, '2023-09-13T18:12:09.454053+03:00', '254717600926', NULL, '99', 1740, 0, 'Mukombero1812!', NULL, '0WPVNDY', NULL, '185.61.153.94', '2023-09-13T18:12:09.454077+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-13 22:12:11', '2023-09-13 22:12:11', 1740, '0', NULL, NULL, NULL),
(258, 'M-PESA', NULL, '2023-09-13T18:12:09.454053+03:00', '254717600926', NULL, '99', 1740, 0, 'Mukombero1812!', NULL, '0WPVNDY', NULL, '185.61.153.94', '2023-09-13T18:12:14.350180+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-13 22:12:15', '2023-09-13 22:12:15', 1740, '0', NULL, NULL, NULL),
(259, 'M-PESA', NULL, '2023-09-13T18:12:09.454053+03:00', '254717600926', NULL, '99', 1740, 0, 'Mukombero1812!', NULL, '0WPVNDY', NULL, '185.61.153.94', '2023-09-13T18:12:25.569031+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-13 22:12:27', '2023-09-13 22:12:27', 1740, '0', 'Request cancelled by user', '1032', NULL),
(260, 'M-PESA', NULL, '2023-09-13T19:20:32.561681+03:00', '254797045743', NULL, '100', 1740, 0, 'Mukombero1812!', NULL, 'YR63JRK', NULL, '185.61.153.94', '2023-09-13T19:20:32.561698+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-13 23:20:34', '2023-09-13 23:20:34', 1740, '0', NULL, NULL, NULL);
INSERT INTO `mpesa_transactions` (`id`, `TransactionType`, `TransID`, `TransTime`, `account`, `provider`, `api_ref`, `value`, `charges`, `challenge`, `BillRefNumber`, `invoice_id`, `registration_id`, `host`, `trans_updated_at`, `FirstName`, `MiddleName`, `LastName`, `state`, `clearing_status`, `currency`, `created_at`, `updated_at`, `net_amount`, `retry_count`, `failed_reason`, `failed_code`, `failed_code_link`) VALUES
(261, 'M-PESA', NULL, '2023-09-13T19:20:32.561681+03:00', '254797045743', NULL, '100', 1740, 0, 'Mukombero1812!', NULL, 'YR63JRK', NULL, '185.61.153.94', '2023-09-13T19:20:37.603626+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-13 23:20:39', '2023-09-13 23:20:39', 1740, '0', NULL, NULL, NULL),
(262, 'M-PESA', NULL, '2023-09-13T19:20:32.561681+03:00', '254797045743', NULL, '100', 1740, 0, 'Mukombero1812!', NULL, 'YR63JRK', NULL, '185.61.153.94', '2023-09-13T19:21:11.513137+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-13 23:21:13', '2023-09-13 23:21:13', 1740, '0', 'The initiator information is invalid.', '2001', NULL),
(263, 'M-PESA', NULL, '2023-09-13T19:25:33.381613+03:00', '254797045743', NULL, '101', 1740, 0, 'Mukombero1812!', NULL, 'Y2BN2P0', NULL, '185.61.153.94', '2023-09-13T19:25:33.381641+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-13 23:25:35', '2023-09-13 23:25:35', 1740, '0', NULL, NULL, NULL),
(264, 'M-PESA', NULL, '2023-09-13T19:25:33.381613+03:00', '254797045743', NULL, '101', 1740, 0, 'Mukombero1812!', NULL, 'Y2BN2P0', NULL, '185.61.153.94', '2023-09-13T19:25:38.245774+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-13 23:25:39', '2023-09-13 23:25:39', 1740, '0', NULL, NULL, NULL),
(265, 'M-PESA', NULL, '2023-09-13T19:25:33.381613+03:00', '254797045743', NULL, '101', 1740, 0, 'Mukombero1812!', NULL, 'Y2BN2P0', NULL, '185.61.153.94', '2023-09-13T19:26:40.251620+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-13 23:26:41', '2023-09-13 23:26:41', 1740, '0', 'The initiator information is invalid.', '2001', NULL),
(266, 'M-PESA', NULL, '2023-09-13T19:31:03.050636+03:00', '254797045743', NULL, '102', 1740, 0, 'Mukombero1812!', NULL, 'Y634N2Y', NULL, '185.61.153.94', '2023-09-13T19:31:03.050656+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-13 23:31:04', '2023-09-13 23:31:04', 1740, '0', NULL, NULL, NULL),
(267, 'M-PESA', NULL, '2023-09-13T19:31:03.050636+03:00', '254797045743', NULL, '102', 1740, 0, 'Mukombero1812!', NULL, 'Y634N2Y', NULL, '185.61.153.94', '2023-09-13T19:31:08.030359+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-13 23:31:09', '2023-09-13 23:31:09', 1740, '0', NULL, NULL, NULL),
(268, 'M-PESA', 'RID9OP5U1J', '2023-09-13T19:31:03.050636+03:00', '254797045743', NULL, '102', 1740, 52.2, 'Mukombero1812!', NULL, 'Y634N2Y', NULL, '185.61.153.94', '2023-09-13T19:31:31.180921+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-13 23:31:32', '2023-09-13 23:31:32', 1687.8, '0', NULL, NULL, NULL),
(269, 'M-PESA', NULL, '2023-09-14T12:44:04.199609+03:00', '254714880423', NULL, '103', 1740, 0, 'Mukombero1812!', NULL, 'KJ44BW0', NULL, '185.61.153.94', '2023-09-14T12:44:04.199627+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-14 16:44:05', '2023-09-14 16:44:05', 1740, '0', NULL, NULL, NULL),
(270, 'M-PESA', NULL, '2023-09-14T12:44:04.199609+03:00', '254714880423', NULL, '103', 1740, 0, 'Mukombero1812!', NULL, 'KJ44BW0', NULL, '185.61.153.94', '2023-09-14T12:44:09.016019+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-14 16:44:10', '2023-09-14 16:44:10', 1740, '0', NULL, NULL, NULL),
(271, 'M-PESA', NULL, '2023-09-14T12:44:04.199609+03:00', '254714880423', NULL, '103', 1740, 0, 'Mukombero1812!', NULL, 'KJ44BW0', NULL, '185.61.153.94', '2023-09-14T12:44:13.731447+03:00', NULL, NULL, NULL, 'RETRY', NULL, 'KES', '2023-09-14 16:44:15', '2023-09-14 16:44:15', 1740, '1', 'Failed to initiate transaction. Ensure your phone is on and sim card updated. Dial *234*1*6# from your Safaricom sim card to update it and try again.', '1037', NULL),
(272, 'M-PESA', NULL, '2023-09-14T17:44:16.314816+03:00', '254723066278', NULL, '104', 1740, 0, 'Mukombero1812!', NULL, 'KJ44JW0', NULL, '185.61.153.94', '2023-09-14T17:44:16.314833+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-14 21:44:17', '2023-09-14 21:44:17', 1740, '0', NULL, NULL, NULL),
(273, 'M-PESA', NULL, '2023-09-14T17:44:16.314816+03:00', '254723066278', NULL, '104', 1740, 0, 'Mukombero1812!', NULL, 'KJ44JW0', NULL, '185.61.153.94', '2023-09-14T17:44:21.211216+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-14 21:44:22', '2023-09-14 21:44:22', 1740, '0', NULL, NULL, NULL),
(274, 'M-PESA', NULL, '2023-09-14T17:44:16.314816+03:00', '254723066278', NULL, '104', 1740, 0, 'Mukombero1812!', NULL, 'KJ44JW0', NULL, '185.61.153.94', '2023-09-14T17:44:57.948628+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-14 21:44:59', '2023-09-14 21:44:59', 1740, '0', 'Request cancelled by user', '1032', NULL),
(275, 'M-PESA', NULL, '2023-09-14T17:54:50.864782+03:00', '254723066278', NULL, '105', 1740, 0, 'Mukombero1812!', NULL, '0VPPJ20', NULL, '185.61.153.94', '2023-09-14T17:54:50.864813+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-14 21:54:52', '2023-09-14 21:54:52', 1740, '0', NULL, NULL, NULL),
(276, 'M-PESA', NULL, '2023-09-14T17:54:50.864782+03:00', '254723066278', NULL, '105', 1740, 0, 'Mukombero1812!', NULL, '0VPPJ20', NULL, '185.61.153.94', '2023-09-14T17:54:55.731459+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-14 21:54:57', '2023-09-14 21:54:57', 1740, '0', NULL, NULL, NULL),
(277, 'M-PESA', 'RIE4RABNN0', '2023-09-14T17:54:50.864782+03:00', '254723066278', NULL, '105', 1740, 52.2, 'Mukombero1812!', NULL, '0VPPJ20', NULL, '185.61.153.94', '2023-09-14T17:55:18.825185+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-14 21:55:20', '2023-09-14 21:55:20', 1687.8, '0', NULL, NULL, NULL),
(293, 'M-PESA', 'RIF3VB1FQ9', '2023-09-15T21:33:06.647529+03:00', '254719231990', NULL, '117', 1740, 52.2, 'Mukombero1812!', NULL, 'KOJJ8PY', NULL, '185.61.153.94', '2023-09-15T21:33:40.952181+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-16 01:33:42', '2023-09-16 01:33:42', 1687.8, '0', NULL, NULL, NULL),
(304, 'M-PESA', NULL, '2023-09-16T08:25:55.189081+03:00', '254726 756615', NULL, '124', 1740, 0, 'Mukombero1812!', NULL, '04B2RJY', NULL, '185.61.153.94', '2023-09-16T08:25:55.189095+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-16 12:25:56', '2023-09-16 12:25:56', 1740, '0', NULL, NULL, NULL),
(351, 'M-PESA', 'RIG7WCPDAF', '2023-09-16T11:20:33.814166+03:00', '254726756615', NULL, '159', 1740, 52.2, 'Mukombero1812!', NULL, 'KOJ56GY', NULL, '185.61.153.94', '2023-09-16T11:20:56.670118+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-16 15:20:57', '2023-09-16 15:20:57', 1687.8, '0', NULL, NULL, NULL),
(352, 'M-PESA', NULL, '2023-09-18T00:23:33.631927+03:00', '254720081077', NULL, '160', 1740, 0, 'Mukombero1812!', NULL, 'YE4EPG0', NULL, '185.61.153.94', '2023-09-18T00:23:33.631944+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-18 04:23:35', '2023-09-18 04:23:35', 1740, '0', NULL, NULL, NULL),
(353, 'M-PESA', NULL, '2023-09-18T00:23:33.631927+03:00', '254720081077', NULL, '160', 1740, 0, 'Mukombero1812!', NULL, 'YE4EPG0', NULL, '185.61.153.94', '2023-09-18T00:23:38.395951+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-18 04:23:39', '2023-09-18 04:23:39', 1740, '0', NULL, NULL, NULL),
(354, 'M-PESA', NULL, '2023-09-18T00:23:33.631927+03:00', '254720081077', NULL, '160', 1740, 0, 'Mukombero1812!', NULL, 'YE4EPG0', NULL, '185.61.153.94', '2023-09-18T00:23:47.910942+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-18 04:23:49', '2023-09-18 04:23:49', 1740, '0', 'Request cancelled by user', '1032', NULL),
(355, 'M-PESA', NULL, '2023-09-18T09:23:11.484347+03:00', '254700422699', NULL, '161', 1, 0, 'Mukombero1812!', NULL, '0VPR6G0', NULL, '185.61.153.94', '2023-09-18T09:23:11.484373+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-18 13:23:12', '2023-09-18 13:23:12', 1, '0', NULL, NULL, NULL),
(356, 'M-PESA', NULL, '2023-09-18T09:23:11.484347+03:00', '254700422699', NULL, '161', 1, 0, 'Mukombero1812!', NULL, '0VPR6G0', NULL, '185.61.153.94', '2023-09-18T09:23:14.410928+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-18 13:23:15', '2023-09-18 13:23:15', 1, '0', NULL, NULL, NULL),
(357, 'M-PESA', 'RII732X0MR', '2023-09-18T09:23:11.484347+03:00', '254700422699', NULL, '161', 1, 0.03, 'Mukombero1812!', NULL, '0VPR6G0', NULL, '185.61.153.94', '2023-09-18T09:23:37.558832+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-18 13:23:38', '2023-09-18 13:23:38', 0.97, '0', NULL, NULL, NULL),
(358, 'M-PESA', NULL, '2023-09-16T10:52:38.333474+03:00', '254726 756615', NULL, '155', 1740, 0, 'Mukombero1812!', NULL, '04B2G3Y', NULL, '185.61.153.94', '2023-09-18T10:14:57.221736+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:14:58', '2023-09-18 14:14:58', 1740, '0', 'Payment cancelled.', NULL, NULL),
(359, 'M-PESA', NULL, '2023-09-16T10:46:56.605899+03:00', '254726 756615', NULL, '152', 1740, 0, 'Mukombero1812!', NULL, 'Y57VJZK', NULL, '185.61.153.94', '2023-09-18T10:14:57.305771+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:14:58', '2023-09-18 14:14:58', 1740, '0', 'Payment cancelled.', NULL, NULL),
(360, 'M-PESA', NULL, '2023-09-16T10:46:01.557491+03:00', '254726 756615', NULL, '151', 1740, 0, 'Mukombero1812!', NULL, 'Y636X8Y', NULL, '185.61.153.94', '2023-09-18T10:14:57.337344+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:14:58', '2023-09-18 14:14:58', 1740, '0', 'Payment cancelled.', NULL, NULL),
(361, 'M-PESA', NULL, '2023-09-16T10:44:59.698282+03:00', '254726 756615', NULL, '150', 1740, 0, 'Mukombero1812!', NULL, '0VPRGJ0', NULL, '185.61.153.94', '2023-09-18T10:14:57.369045+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:14:58', '2023-09-18 14:14:58', 1740, '0', 'Payment cancelled.', NULL, NULL),
(362, 'M-PESA', NULL, '2023-09-16T11:15:14.207469+03:00', '254726 756615', NULL, '158', 1740, 0, 'Mukombero1812!', NULL, 'YG47N8K', NULL, '185.61.153.94', '2023-09-18T10:14:57.127113+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:14:58', '2023-09-18 14:14:58', 1740, '0', 'Payment cancelled.', NULL, NULL),
(363, 'M-PESA', NULL, '2023-09-16T10:49:51.130192+03:00', '254726 756615', NULL, '153', 1740, 0, 'Mukombero1812!', NULL, '0L32N4Y', NULL, '185.61.153.94', '2023-09-18T10:14:57.277105+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:14:58', '2023-09-18 14:14:58', 1740, '0', 'Payment cancelled.', NULL, NULL),
(364, 'M-PESA', NULL, '2023-09-16T10:53:52.564306+03:00', '254726 756615', NULL, '156', 1740, 0, 'Mukombero1812!', NULL, 'YD4E3BK', NULL, '185.61.153.94', '2023-09-18T10:14:57.188561+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:14:58', '2023-09-18 14:14:58', 1740, '0', 'Payment cancelled.', NULL, NULL),
(365, 'M-PESA', NULL, '2023-09-16T11:12:08.166224+03:00', '254726 756615', NULL, '157', 1740, 0, 'Mukombero1812!', NULL, 'YE4EQL0', NULL, '185.61.153.94', '2023-09-18T10:14:57.156899+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:14:58', '2023-09-18 14:14:58', 1740, '0', 'Payment cancelled.', NULL, NULL),
(366, 'M-PESA', NULL, '2023-09-16T10:50:45.294458+03:00', '254726 756615', NULL, '154', 1740, 0, 'Mukombero1812!', NULL, '0WPJXPY', NULL, '185.61.153.94', '2023-09-18T10:14:57.248280+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:14:58', '2023-09-18 14:14:58', 1740, '0', 'Payment cancelled.', NULL, NULL),
(367, 'M-PESA', NULL, '2023-09-16T09:06:32.449168+03:00', '254726 756615', NULL, '143', 1740, 0, 'Mukombero1812!', NULL, 'KZP6B60', NULL, '185.61.153.94', '2023-09-18T10:14:57.566134+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:00', '2023-09-18 14:15:00', 1740, '0', 'Payment cancelled.', NULL, NULL),
(368, 'M-PESA', NULL, '2023-09-16T09:17:30.096856+03:00', '254726 756615', NULL, '145', 1740, 0, 'Mukombero1812!', NULL, 'KQVLDP0', NULL, '185.61.153.94', '2023-09-18T10:14:57.509913+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:00', '2023-09-18 14:15:00', 1740, '0', 'Payment cancelled.', NULL, NULL),
(369, 'M-PESA', NULL, '2023-09-16T09:09:06.102633+03:00', '254726 756615', NULL, '144', 1740, 0, 'Mukombero1812!', NULL, '04B2D3Y', NULL, '185.61.153.94', '2023-09-18T10:14:57.537704+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:00', '2023-09-18 14:15:00', 1740, '0', 'Payment cancelled.', NULL, NULL),
(370, 'M-PESA', NULL, '2023-09-16T09:03:28.556603+03:00', '254726 756615', NULL, '141', 1740, 0, 'Mukombero1812!', NULL, 'Y57VQZK', NULL, '185.61.153.94', '2023-09-18T10:14:57.616624+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:00', '2023-09-18 14:15:00', 1740, '0', 'Payment cancelled.', NULL, NULL),
(371, 'M-PESA', NULL, '2023-09-16T10:41:32.869457+03:00', '254726 756615', NULL, '147', 1740, 0, 'Mukombero1812!', NULL, 'YR6WLMK', NULL, '185.61.153.94', '2023-09-18T10:14:57.459846+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:00', '2023-09-18 14:15:00', 1740, '0', 'Payment cancelled.', NULL, NULL),
(372, 'M-PESA', NULL, '2023-09-16T10:43:31.937884+03:00', '254726 756615', NULL, '149', 1740, 0, 'Mukombero1812!', NULL, 'Y2BR3E0', NULL, '185.61.153.94', '2023-09-18T10:14:57.401055+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:00', '2023-09-18 14:15:00', 1740, '0', 'Payment cancelled.', NULL, NULL),
(373, 'M-PESA', NULL, '2023-09-16T09:05:03.548296+03:00', '254726 756615', NULL, '142', 1740, 0, 'Mukombero1812!', NULL, '0L32V4Y', NULL, '185.61.153.94', '2023-09-18T10:14:57.592243+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:00', '2023-09-18 14:15:00', 1740, '0', 'Payment cancelled.', NULL, NULL),
(374, 'M-PESA', NULL, '2023-09-16T09:19:20.782034+03:00', '254726 756615', NULL, '146', 1740, 0, 'Mukombero1812!', NULL, 'Y9JL5EK', NULL, '185.61.153.94', '2023-09-18T10:14:57.484039+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:00', '2023-09-18 14:15:00', 1740, '0', 'Payment cancelled.', NULL, NULL),
(375, 'M-PESA', NULL, '2023-09-16T10:42:20.919203+03:00', '254726 756615', NULL, '148', 1740, 0, 'Mukombero1812!', NULL, 'KJ4REB0', NULL, '185.61.153.94', '2023-09-18T10:14:57.434044+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:00', '2023-09-18 14:15:00', 1740, '0', 'Payment cancelled.', NULL, NULL),
(376, 'M-PESA', NULL, '2023-09-16T09:00:13.828430+03:00', '254726 756615', NULL, '140', 1740, 0, 'Mukombero1812!', NULL, 'Y636J8Y', NULL, '185.61.153.94', '2023-09-18T10:14:57.642688+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:02', '2023-09-18 14:15:02', 1740, '0', 'Payment cancelled.', NULL, NULL),
(377, 'M-PESA', NULL, '2023-09-16T08:53:43.831990+03:00', '254726 756615', NULL, '138', 1740, 0, 'Mukombero1812!', NULL, 'KJ4RGB0', NULL, '185.61.153.94', '2023-09-18T10:14:57.690323+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:02', '2023-09-18 14:15:02', 1740, '0', 'Payment cancelled.', NULL, NULL),
(378, 'M-PESA', NULL, '2023-09-16T08:44:22.428071+03:00', '254726 756615', NULL, '132', 1740, 0, 'Mukombero1812!', NULL, 'Y7M5DL0', NULL, '185.61.153.94', '2023-09-18T10:14:57.846369+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:02', '2023-09-18 14:15:02', 1740, '0', 'Payment cancelled.', NULL, NULL),
(379, 'M-PESA', NULL, '2023-09-16T08:49:10.889781+03:00', '254726 756615', NULL, '135', 1740, 0, 'Mukombero1812!', NULL, 'Y3BJMMY', NULL, '185.61.153.94', '2023-09-18T10:14:57.767963+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:02', '2023-09-18 14:15:02', 1740, '0', 'Payment cancelled.', NULL, NULL),
(380, 'M-PESA', NULL, '2023-09-16T08:56:59.301337+03:00', '254726 756615', NULL, '139', 1740, 0, 'Mukombero1812!', NULL, '0VPRLJ0', NULL, '185.61.153.94', '2023-09-18T10:14:57.665790+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:02', '2023-09-18 14:15:02', 1740, '0', 'Payment cancelled.', NULL, NULL),
(381, 'M-PESA', NULL, '2023-09-16T08:45:30.574801+03:00', '254726 756615', NULL, '133', 1740, 0, 'Mukombero1812!', NULL, 'Y3BJG6Y', NULL, '185.61.153.94', '2023-09-18T10:14:57.823461+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:02', '2023-09-18 14:15:02', 1740, '0', 'Payment cancelled.', NULL, NULL),
(382, 'M-PESA', NULL, '2023-09-16T08:48:03.338471+03:00', '254726 756615', NULL, '134', 1740, 0, 'Mukombero1812!', NULL, 'YR6WNRK', NULL, '185.61.153.94', '2023-09-18T10:14:57.794117+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:02', '2023-09-18 14:15:02', 1740, '0', 'Payment cancelled.', NULL, NULL),
(383, 'M-PESA', NULL, '2023-09-16T08:51:22.424021+03:00', '254726 756615', NULL, '137', 1740, 0, 'Mukombero1812!', NULL, 'YR6WQMK', NULL, '185.61.153.94', '2023-09-18T10:14:57.713637+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:02', '2023-09-18 14:15:02', 1740, '0', 'Payment cancelled.', NULL, NULL),
(384, 'M-PESA', NULL, '2023-09-16T08:50:14.485304+03:00', '254726 756615', NULL, '136', 1740, 0, 'Mukombero1812!', NULL, 'YMMVO6Y', NULL, '185.61.153.94', '2023-09-18T10:14:57.742640+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:02', '2023-09-18 14:15:02', 1740, '0', 'Payment cancelled.', NULL, NULL),
(385, 'M-PESA', NULL, '2023-09-16T08:38:58.132065+03:00', '254726 756615', NULL, '130', 1740, 0, 'Mukombero1812!', NULL, 'YE4E6P0', NULL, '185.61.153.94', '2023-09-18T10:14:57.894020+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:05', '2023-09-18 14:15:05', 1740, '0', 'Payment cancelled.', NULL, NULL),
(386, 'M-PESA', NULL, '2023-09-16T08:32:19.791393+03:00', '254726 756615', NULL, '128', 1740, 0, 'Mukombero1812!', NULL, 'YP2NDRY', NULL, '185.61.153.94', '2023-09-18T10:14:57.937938+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:05', '2023-09-18 14:15:05', 1740, '0', 'Payment cancelled.', NULL, NULL),
(387, 'M-PESA', NULL, '2023-09-16T08:29:03.367586+03:00', '254726 756615', NULL, '126', 1740, 0, 'Mukombero1812!', NULL, 'KQVLGV0', NULL, '185.61.153.94', '2023-09-18T10:14:57.982670+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:05', '2023-09-18 14:15:05', 1740, '0', 'Payment cancelled.', NULL, NULL),
(388, 'M-PESA', NULL, '2023-09-16T08:40:19.630324+03:00', '254726 756615', NULL, '131', 1740, 0, 'Mukombero1812!', NULL, 'YG47ORK', NULL, '185.61.153.94', '2023-09-18T10:14:57.870712+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:05', '2023-09-18 14:15:05', 1740, '0', 'Payment cancelled.', NULL, NULL),
(389, 'M-PESA', NULL, '2023-09-16T08:30:34.778085+03:00', '254726 756615', NULL, '127', 1740, 0, 'Mukombero1812!', NULL, 'Y9JL6LK', NULL, '185.61.153.94', '2023-09-18T10:14:57.959667+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:05', '2023-09-18 14:15:05', 1740, '0', 'Payment cancelled.', NULL, NULL),
(390, 'M-PESA', NULL, '2023-09-16T08:37:33.483333+03:00', '254726 756615', NULL, '129', 1740, 0, 'Mukombero1812!', NULL, 'KB4E9BY', NULL, '185.61.153.94', '2023-09-18T10:14:57.916016+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:05', '2023-09-18 14:15:05', 1740, '0', 'Payment cancelled.', NULL, NULL),
(391, 'M-PESA', NULL, '2023-09-16T08:25:55.189081+03:00', '254726 756615', NULL, '124', 1740, 0, 'Mukombero1812!', NULL, '04B2RJY', NULL, '185.61.153.94', '2023-09-18T10:14:58.027572+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:05', '2023-09-18 14:15:05', 1740, '0', 'Payment cancelled.', NULL, NULL),
(392, 'M-PESA', NULL, '2023-09-16T08:18:56.227142+03:00', '254726 756615', NULL, '122', 1740, 0, 'Mukombero1812!', NULL, 'KNR65OY', NULL, '185.61.153.94', '2023-09-18T10:14:58.052747+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:05', '2023-09-18 14:15:05', 1740, '0', 'Payment cancelled.', NULL, NULL),
(393, 'M-PESA', NULL, '2023-09-16T08:27:29.780894+03:00', '254726 756615', NULL, '125', 1740, 0, 'Mukombero1812!', NULL, 'YD4EV6K', NULL, '185.61.153.94', '2023-09-18T10:14:58.004998+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:05', '2023-09-18 14:15:05', 1740, '0', 'Payment cancelled.', NULL, NULL),
(394, 'M-PESA', NULL, '2023-09-16T06:06:08.270137+03:00', '254726 756615', NULL, '121', 1740, 0, 'Mukombero1812!', NULL, 'YE447P0', NULL, '185.61.153.94', '2023-09-18T10:14:58.077202+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:05', '2023-09-18 14:15:05', 1740, '0', 'Payment cancelled.', NULL, NULL),
(395, 'M-PESA', NULL, '2023-09-16T05:44:57.545742+03:00', '254726 756615', NULL, '119', 1740, 0, 'Mukombero1812!', NULL, 'Y9JJXLK', NULL, '185.61.153.94', '2023-09-18T10:14:58.123131+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:06', '2023-09-18 14:15:06', 1740, '0', 'Payment cancelled.', NULL, NULL),
(396, 'M-PESA', NULL, '2023-09-16T05:57:15.307173+03:00', '254726 756615', NULL, '120', 1740, 0, 'Mukombero1812!', NULL, 'YP22XRY', NULL, '185.61.153.94', '2023-09-18T10:14:58.100691+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-18 14:15:06', '2023-09-18 14:15:06', 1740, '0', 'Payment cancelled.', NULL, NULL),
(397, 'M-PESA', NULL, '2023-09-18T11:38:01.839855+03:00', '254112000680', NULL, '162', 1740, 0, 'Mukombero1812!', NULL, 'Y7M5GL0', NULL, '185.61.153.94', '2023-09-18T11:38:01.839877+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-18 15:38:03', '2023-09-18 15:38:03', 1740, '0', NULL, NULL, NULL),
(398, 'M-PESA', NULL, '2023-09-18T11:38:01.839855+03:00', '254112000680', NULL, '162', 1740, 0, 'Mukombero1812!', NULL, 'Y7M5GL0', NULL, '185.61.153.94', '2023-09-18T11:38:06.791959+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-18 15:38:08', '2023-09-18 15:38:08', 1740, '0', NULL, NULL, NULL),
(399, 'M-PESA', NULL, '2023-09-18T11:38:01.839855+03:00', '254112000680', NULL, '162', 1740, 0, 'Mukombero1812!', NULL, 'Y7M5GL0', NULL, '185.61.153.94', '2023-09-18T11:38:40.575422+03:00', NULL, NULL, NULL, 'RETRY', NULL, 'KES', '2023-09-18 15:38:41', '2023-09-18 15:38:41', 1740, '1', 'Failed to initiate transaction. Ensure your phone is on and sim card updated. Dial *234*1*6# from your Safaricom sim card to update it and try again.', '1037', NULL),
(400, 'M-PESA', NULL, '2023-09-18T11:38:01.839855+03:00', '254112000680', NULL, '162', 1740, 52.2, 'Mukombero1812!', NULL, 'Y7M5GL0', NULL, '185.61.153.94', '2023-09-18T11:43:44.387068+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-18 15:43:46', '2023-09-18 15:43:46', 1687.8, '1', 'Failed to initiate transaction. Ensure your phone is on and sim card updated. Dial *234*1*6# from your Safaricom sim card to update it and try again.', '1037', NULL),
(401, 'M-PESA', NULL, '2023-09-18T12:51:16.832895+03:00', '254728135533', NULL, '163', 1740, 0, 'Mukombero1812!', NULL, 'Y63692Y', NULL, '185.61.153.94', '2023-09-18T12:51:16.832912+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-18 16:51:18', '2023-09-18 16:51:18', 1740, '0', NULL, NULL, NULL),
(402, 'M-PESA', NULL, '2023-09-18T12:51:16.832895+03:00', '254728135533', NULL, '163', 1740, 0, 'Mukombero1812!', NULL, 'Y63692Y', NULL, '185.61.153.94', '2023-09-18T12:51:19.631314+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-18 16:51:20', '2023-09-18 16:51:20', 1740, '0', NULL, NULL, NULL),
(403, 'M-PESA', NULL, '2023-09-18T12:51:16.832895+03:00', '254728135533', NULL, '163', 1740, 0, 'Mukombero1812!', NULL, 'Y63692Y', NULL, '185.61.153.94', '2023-09-18T12:52:05.787503+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-18 16:52:07', '2023-09-18 16:52:07', 1740, '0', 'Request cancelled by user', '1032', NULL),
(404, 'M-PESA', NULL, '2023-09-18T14:57:12.004132+03:00', '254716719079', NULL, '164', 1740, 0, 'Mukombero1812!', NULL, 'KZP7GR0', NULL, '185.61.153.94', '2023-09-18T14:57:12.004148+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-18 18:57:13', '2023-09-18 18:57:13', 1740, '0', NULL, NULL, NULL),
(405, 'M-PESA', NULL, '2023-09-18T14:57:12.004132+03:00', '254716719079', NULL, '164', 1740, 0, 'Mukombero1812!', NULL, 'KZP7GR0', NULL, '185.61.153.94', '2023-09-18T14:57:16.813777+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-18 18:57:18', '2023-09-18 18:57:18', 1740, '0', NULL, NULL, NULL),
(406, 'M-PESA', 'RII340LBDJ', '2023-09-18T14:57:12.004132+03:00', '254716719079', NULL, '164', 1740, 52.2, 'Mukombero1812!', NULL, 'KZP7GR0', NULL, '185.61.153.94', '2023-09-18T14:57:43.807753+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-18 18:57:45', '2023-09-18 18:57:45', 1687.8, '0', NULL, NULL, NULL),
(407, 'M-PESA', NULL, '2023-09-18T16:56:32.852203+03:00', '254111602311', NULL, '165', 1740, 0, 'Mukombero1812!', NULL, '0L3ZV7Y', NULL, '185.61.153.94', '2023-09-18T16:56:32.852223+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-18 20:56:34', '2023-09-18 20:56:34', 1740, '0', NULL, NULL, NULL),
(408, 'M-PESA', NULL, '2023-09-18T16:56:32.852203+03:00', '254111602311', NULL, '165', 1740, 0, 'Mukombero1812!', NULL, '0L3ZV7Y', NULL, '185.61.153.94', '2023-09-18T16:57:17.982089+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-18 20:57:19', '2023-09-18 20:57:19', 1740, '0', 'Problem experienced due to network or system issue. We have beeen notified and we are looking into it.', NULL, NULL),
(409, 'M-PESA', NULL, '2023-09-18T17:52:42.835930+03:00', '254700181122', NULL, '166', 1740, 0, 'Mukombero1812!', NULL, 'KB4MJBY', NULL, '185.61.153.94', '2023-09-18T17:52:42.835945+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-18 21:52:44', '2023-09-18 21:52:44', 1740, '0', NULL, NULL, NULL),
(410, 'M-PESA', NULL, '2023-09-18T17:52:42.835930+03:00', '254700181122', NULL, '166', 1740, 0, 'Mukombero1812!', NULL, 'KB4MJBY', NULL, '185.61.153.94', '2023-09-18T17:52:47.839591+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-18 21:52:49', '2023-09-18 21:52:49', 1740, '0', NULL, NULL, NULL),
(411, 'M-PESA', NULL, '2023-09-18T17:52:42.835930+03:00', '254700181122', NULL, '166', 1740, 0, 'Mukombero1812!', NULL, 'KB4MJBY', NULL, '185.61.153.94', '2023-09-18T17:53:03.941441+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-18 21:53:05', '2023-09-18 21:53:05', 1740, '0', 'Request cancelled by user', '1032', NULL),
(412, 'M-PESA', NULL, '2023-09-18T19:45:25.144905+03:00', '254712677779', NULL, '167', 1740, 0, 'Mukombero1812!', NULL, '04B3G3Y', NULL, '185.61.153.94', '2023-09-18T19:45:25.144922+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-18 23:45:26', '2023-09-18 23:45:26', 1740, '0', NULL, NULL, NULL),
(413, 'M-PESA', NULL, '2023-09-18T19:45:25.144905+03:00', '254712677779', NULL, '167', 1740, 0, 'Mukombero1812!', NULL, '04B3G3Y', NULL, '185.61.153.94', '2023-09-18T19:45:26.902086+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-18 23:45:28', '2023-09-18 23:45:28', 1740, '0', NULL, NULL, NULL),
(414, 'M-PESA', NULL, '2023-09-18T19:57:39.073840+03:00', '254714880423', NULL, '168', 1740, 0, 'Mukombero1812!', NULL, 'YG46N8K', NULL, '185.61.153.94', '2023-09-18T19:57:39.073855+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-18 23:57:40', '2023-09-18 23:57:40', 1740, '0', NULL, NULL, NULL),
(415, 'M-PESA', NULL, '2023-09-18T19:57:39.073840+03:00', '254714880423', NULL, '168', 1740, 0, 'Mukombero1812!', NULL, 'YG46N8K', NULL, '185.61.153.94', '2023-09-18T19:57:49.610696+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-18 23:57:51', '2023-09-18 23:57:51', 1740, '0', NULL, NULL, NULL),
(416, 'M-PESA', NULL, '2023-09-18T19:57:39.073840+03:00', '254714880423', NULL, '168', 1740, 17.4, 'Mukombero1812!', NULL, 'YG46N8K', NULL, '185.61.153.94', '2023-09-18T20:00:04.918495+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-19 00:00:06', '2023-09-19 00:00:06', 1722.6, '0', NULL, NULL, NULL),
(417, 'M-PESA', NULL, '2023-09-18T19:45:25.144905+03:00', '254712677779', NULL, '167', 1740, 0, 'Mukombero1812!', NULL, '04B3G3Y', NULL, '185.61.153.94', '2023-09-19T09:58:23.736586+03:00', NULL, NULL, NULL, 'CANCELED', NULL, 'KES', '2023-09-19 13:58:25', '2023-09-19 13:58:25', 1740, '0', 'Payment cancelled.', NULL, NULL),
(418, 'M-PESA', NULL, '2023-09-19T19:42:44.287049+03:00', '254720438028', NULL, '169', 1740, 0, 'Mukombero1812!', NULL, '08R22OY', NULL, '185.61.153.94', '2023-09-19T19:42:44.287065+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-19 23:42:45', '2023-09-19 23:42:45', 1740, '0', NULL, NULL, NULL),
(419, 'M-PESA', NULL, '2023-09-19T19:42:44.287049+03:00', '254720438028', NULL, '169', 1740, 0, 'Mukombero1812!', NULL, '08R22OY', NULL, '185.61.153.94', '2023-09-19T19:42:49.227219+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-19 23:42:50', '2023-09-19 23:42:50', 1740, '0', NULL, NULL, NULL),
(420, 'M-PESA', NULL, '2023-09-19T19:42:44.287049+03:00', '254720438028', NULL, '169', 1740, 0, 'Mukombero1812!', NULL, '08R22OY', NULL, '185.61.153.94', '2023-09-19T19:43:38.668744+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-19 23:43:40', '2023-09-19 23:43:40', 1740, '0', 'Request cancelled by user', '1032', NULL),
(421, 'M-PESA', NULL, '2023-09-19T23:21:00.739477+03:00', '254758912013', NULL, '170', 1740, 0, 'Mukombero1812!', NULL, 'KNR3P4Y', NULL, '185.61.153.94', '2023-09-19T23:21:00.739493+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-20 03:21:02', '2023-09-20 03:21:02', 1740, '0', NULL, NULL, NULL),
(422, 'M-PESA', NULL, '2023-09-19T23:21:00.739477+03:00', '254758912013', NULL, '170', 1740, 0, 'Mukombero1812!', NULL, 'KNR3P4Y', NULL, '185.61.153.94', '2023-09-19T23:21:05.529908+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-20 03:21:06', '2023-09-20 03:21:06', 1740, '0', NULL, NULL, NULL),
(423, 'M-PESA', NULL, '2023-09-20T16:43:11.578930+03:00', '254726533478', NULL, '171', 1740, 0, 'Mukombero1812!', NULL, '0VPZLG0', NULL, '185.61.153.94', '2023-09-20T16:43:11.578947+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-20 20:43:13', '2023-09-20 20:43:13', 1740, '0', NULL, NULL, NULL),
(424, 'M-PESA', NULL, '2023-09-20T16:43:11.578930+03:00', '254726533478', NULL, '171', 1740, 0, 'Mukombero1812!', NULL, '0VPZLG0', NULL, '185.61.153.94', '2023-09-20T16:43:16.458420+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-20 20:43:17', '2023-09-20 20:43:17', 1740, '0', NULL, NULL, NULL),
(425, 'M-PESA', NULL, '2023-09-20T16:43:11.578930+03:00', '254726533478', NULL, '171', 1740, 0, 'Mukombero1812!', NULL, '0VPZLG0', NULL, '185.61.153.94', '2023-09-20T16:43:59.990978+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-20 20:44:01', '2023-09-20 20:44:01', 1740, '0', 'The initiator information is invalid.', '2001', NULL),
(426, 'M-PESA', NULL, '2023-09-20T16:54:13.754251+03:00', '254720438028', NULL, '172', 1740, 0, 'Mukombero1812!', NULL, '0WPOGWY', NULL, '185.61.153.94', '2023-09-20T16:54:13.754265+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-20 20:54:15', '2023-09-20 20:54:15', 1740, '0', NULL, NULL, NULL),
(427, 'M-PESA', NULL, '2023-09-20T16:54:13.754251+03:00', '254720438028', NULL, '172', 1740, 0, 'Mukombero1812!', NULL, '0WPOGWY', NULL, '185.61.153.94', '2023-09-20T16:54:18.612387+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-20 20:54:19', '2023-09-20 20:54:19', 1740, '0', NULL, NULL, NULL),
(428, 'M-PESA', 'RIK9AFP2JN', '2023-09-20T16:54:13.754251+03:00', '254720438028', NULL, '172', 1740, 52.2, 'Mukombero1812!', NULL, '0WPOGWY', NULL, '185.61.153.94', '2023-09-20T16:54:48.802087+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-20 20:54:50', '2023-09-20 20:54:50', 1687.8, '0', NULL, NULL, NULL),
(429, 'M-PESA', NULL, '2023-09-20T16:56:55.476051+03:00', '254720438028', NULL, '173', 1740, 0, 'Mukombero1812!', NULL, 'KZPMBR0', NULL, '185.61.153.94', '2023-09-20T16:56:55.476067+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-20 20:56:56', '2023-09-20 20:56:56', 1740, '0', NULL, NULL, NULL),
(430, 'M-PESA', NULL, '2023-09-20T16:56:55.476051+03:00', '254720438028', NULL, '173', 1740, 0, 'Mukombero1812!', NULL, 'KZPMBR0', NULL, '185.61.153.94', '2023-09-20T16:57:00.411132+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-20 20:57:01', '2023-09-20 20:57:01', 1740, '0', NULL, NULL, NULL),
(431, 'M-PESA', NULL, '2023-09-20T16:56:55.476051+03:00', '254720438028', NULL, '173', 1740, 0, 'Mukombero1812!', NULL, 'KZPMBR0', NULL, '185.61.153.94', '2023-09-20T16:57:44.571693+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-20 20:57:45', '2023-09-20 20:57:45', 1740, '0', 'Request cancelled by user', '1032', NULL),
(432, 'M-PESA', NULL, '2023-09-21T13:29:58.609747+03:00', '254718849103', NULL, '174', 1740, 0, 'Mukombero1812!', NULL, 'Y5762VK', NULL, '185.61.153.94', '2023-09-21T13:29:58.609763+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-21 17:30:00', '2023-09-21 17:30:00', 1740, '0', NULL, NULL, NULL),
(433, 'M-PESA', NULL, '2023-09-21T13:29:58.609747+03:00', '254718849103', NULL, '174', 1740, 0, 'Mukombero1812!', NULL, 'Y5762VK', NULL, '185.61.153.94', '2023-09-21T13:30:03.459013+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-21 17:30:04', '2023-09-21 17:30:04', 1740, '0', NULL, NULL, NULL),
(434, 'M-PESA', NULL, '2023-09-21T13:29:58.609747+03:00', '254718849103', NULL, '174', 1740, 0, 'Mukombero1812!', NULL, 'Y5762VK', NULL, '185.61.153.94', '2023-09-21T13:30:28.219921+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-21 17:30:29', '2023-09-21 17:30:29', 1740, '0', 'Request cancelled by user', '1032', NULL),
(435, 'M-PESA', NULL, '2023-09-21T17:02:59.812228+03:00', '254726533478', NULL, '176', 1740, 0, 'Mukombero1812!', NULL, 'KOJ2J4Y', NULL, '185.61.153.94', '2023-09-21T17:02:59.812249+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-21 21:03:01', '2023-09-21 21:03:01', 1740, '0', NULL, NULL, NULL),
(436, 'M-PESA', NULL, '2023-09-21T17:02:59.812228+03:00', '254726533478', NULL, '176', 1740, 0, 'Mukombero1812!', NULL, 'KOJ2J4Y', NULL, '185.61.153.94', '2023-09-21T17:03:04.681813+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-21 21:03:05', '2023-09-21 21:03:05', 1740, '0', NULL, NULL, NULL),
(437, 'M-PESA', NULL, '2023-09-21T17:02:59.812228+03:00', '254726533478', NULL, '176', 1740, 0, 'Mukombero1812!', NULL, 'KOJ2J4Y', NULL, '185.61.153.94', '2023-09-21T17:03:49.218756+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-21 21:03:50', '2023-09-21 21:03:50', 1740, '0', 'Request cancelled by user', '1032', NULL),
(438, 'M-PESA', NULL, '2023-09-22T11:52:59.532347+03:00', '254726533478', NULL, '177', 1740, 0, 'Mukombero1812!', NULL, 'YMMR8PY', NULL, '185.61.153.94', '2023-09-22T11:52:59.532364+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-22 15:53:01', '2023-09-22 15:53:01', 1740, '0', NULL, NULL, NULL),
(439, 'M-PESA', NULL, '2023-09-22T11:52:59.532347+03:00', '254726533478', NULL, '177', 1740, 0, 'Mukombero1812!', NULL, 'YMMR8PY', NULL, '185.61.153.94', '2023-09-22T11:53:04.311861+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-22 15:53:05', '2023-09-22 15:53:05', 1740, '0', NULL, NULL, NULL),
(440, 'M-PESA', 'RIM9FOFAW3', '2023-09-22T11:52:59.532347+03:00', '254726533478', NULL, '177', 1740, 52.2, 'Mukombero1812!', NULL, 'YMMR8PY', NULL, '185.61.153.94', '2023-09-22T11:53:26.511989+03:00', NULL, NULL, NULL, 'COMPLETE', 'AVAILABLE', 'KES', '2023-09-22 15:53:27', '2023-09-22 15:53:27', 1687.8, '0', NULL, NULL, NULL),
(441, 'M-PESA', NULL, '2023-09-22T21:07:25.138412+03:00', '254725793678', NULL, '178', 1740, 0, 'Mukombero1812!', NULL, 'YP2P6RY', NULL, '185.61.153.94', '2023-09-22T21:07:25.138429+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-23 01:07:26', '2023-09-23 01:07:26', 1740, '0', NULL, NULL, NULL),
(442, 'M-PESA', NULL, '2023-09-22T21:07:25.138412+03:00', '254725793678', NULL, '178', 1740, 0, 'Mukombero1812!', NULL, 'YP2P6RY', NULL, '185.61.153.94', '2023-09-22T21:07:30.057013+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-23 01:07:31', '2023-09-23 01:07:31', 1740, '0', NULL, NULL, NULL),
(443, 'M-PESA', NULL, '2023-09-22T21:10:50.768362+03:00', '254725793679', NULL, '179', 1740, 0, 'Mukombero1812!', NULL, 'YE4PQP0', NULL, '185.61.153.94', '2023-09-22T21:10:50.768377+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-23 01:10:52', '2023-09-23 01:10:52', 1740, '0', NULL, NULL, NULL),
(444, 'M-PESA', NULL, '2023-09-22T21:10:50.768362+03:00', '254725793679', NULL, '179', 1740, 0, 'Mukombero1812!', NULL, 'YE4PQP0', NULL, '185.61.153.94', '2023-09-22T21:10:55.837886+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-23 01:10:57', '2023-09-23 01:10:57', 1740, '0', NULL, NULL, NULL),
(445, 'M-PESA', NULL, '2023-09-22T21:10:50.768362+03:00', '254725793679', NULL, '179', 1740, 0, 'Mukombero1812!', NULL, 'YE4PQP0', NULL, '185.61.153.94', '2023-09-23T07:02:49.702443+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-23 11:02:52', '2023-09-23 11:02:52', 1740, '0', 'The balance is insufficient for the transaction.', '1', NULL),
(446, 'M-PESA', NULL, '2023-09-22T21:10:50.768362+03:00', '254725793679', NULL, '179', 1740, 0, 'Mukombero1812!', NULL, 'YE4PQP0', NULL, '185.61.153.94', '2023-09-23T07:02:49.703219+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-23 11:02:52', '2023-09-23 11:02:52', 1740, '0', 'The balance is insufficient for the transaction.', '1', NULL),
(447, 'M-PESA', NULL, '2023-09-22T21:07:25.138412+03:00', '254725793678', NULL, '178', 1740, 0, 'Mukombero1812!', NULL, 'YP2P6RY', NULL, '185.61.153.94', '2023-09-23T07:02:49.711769+03:00', NULL, NULL, NULL, 'RETRY', NULL, 'KES', '2023-09-23 11:02:52', '2023-09-23 11:02:52', 1740, '1', 'Failed to initiate transaction. Ensure your phone is on and sim card updated. Dial *234*1*6# from your Safaricom sim card to update it and try again.', '1037', NULL),
(448, 'M-PESA', NULL, '2023-09-22T21:07:25.138412+03:00', '254725793678', NULL, '178', 1740, 0, 'Mukombero1812!', NULL, 'YP2P6RY', NULL, '185.61.153.94', '2023-09-23T07:02:49.729455+03:00', NULL, NULL, NULL, 'RETRY', NULL, 'KES', '2023-09-23 11:02:56', '2023-09-23 11:02:56', 1740, '1', 'Failed to initiate transaction. Ensure your phone is on and sim card updated. Dial *234*1*6# from your Safaricom sim card to update it and try again.', '1037', NULL),
(449, 'M-PESA', NULL, '2023-09-23T07:12:24.125369+03:00', '254748616578', NULL, '180', 1740, 0, 'Mukombero1812!', NULL, 'KB4ZWVY', NULL, '185.61.153.94', '2023-09-23T07:12:24.125389+03:00', NULL, NULL, NULL, 'PENDING', NULL, 'KES', '2023-09-23 11:12:25', '2023-09-23 11:12:25', 1740, '0', NULL, NULL, NULL),
(450, 'M-PESA', NULL, '2023-09-23T07:12:24.125369+03:00', '254748616578', NULL, '180', 1740, 0, 'Mukombero1812!', NULL, 'KB4ZWVY', NULL, '185.61.153.94', '2023-09-23T07:12:28.959742+03:00', NULL, NULL, NULL, 'PROCESSING', NULL, 'KES', '2023-09-23 11:12:30', '2023-09-23 11:12:30', 1740, '0', NULL, NULL, NULL),
(451, 'M-PESA', NULL, '2023-09-23T07:12:24.125369+03:00', '254748616578', NULL, '180', 1740, 0, 'Mukombero1812!', NULL, 'KB4ZWVY', NULL, '185.61.153.94', '2023-09-23T07:12:47.050191+03:00', NULL, NULL, NULL, 'FAILED', NULL, 'KES', '2023-09-23 11:12:48', '2023-09-23 11:12:48', 1740, '0', 'The balance is insufficient for the transaction.', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `shop_id` varchar(255) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `orderno` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `ref_no` varchar(255) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `paid` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_logs`
--

CREATE TABLE `payment_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `plan` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `renew_date` timestamp NULL DEFAULT NULL,
  `expiry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2022-03-31 03:14:25', '2022-03-31 03:14:25'),
(2, 'role-create', 'web', '2022-03-31 03:14:26', '2022-03-31 03:14:26'),
(3, 'role-edit', 'web', '2022-03-31 03:14:26', '2022-03-31 03:14:26'),
(4, 'role-delete', 'web', '2022-03-31 03:14:26', '2022-03-31 03:14:26'),
(13, 'user-list', 'web', '2022-03-31 08:02:33', '2022-03-31 08:02:33'),
(14, 'user-create', 'web', '2022-03-31 08:02:33', '2022-03-31 08:02:33'),
(15, 'user-edit', 'web', '2022-03-31 08:02:33', '2022-03-31 08:02:33'),
(16, 'user-delete', 'web', '2022-03-31 08:02:33', '2022-03-31 08:02:33'),
(105, 'mpesa_transaction-list', 'web', '2022-11-17 16:57:32', '2022-11-17 16:57:32'),
(106, 'mpesa_transaction-create', 'web', '2022-11-17 16:57:32', '2022-11-17 16:57:32'),
(107, 'mpesa_transaction-edit', 'web', '2022-11-17 16:57:32', '2022-11-17 16:57:32'),
(108, 'mpesa_transaction-delete', 'web', '2022-11-17 16:57:33', '2022-11-17 16:57:33'),
(109, 'payment_log-list', 'web', '2022-11-17 16:57:33', '2022-11-17 16:57:33'),
(110, 'payment_log-create', 'web', '2022-11-17 16:57:33', '2022-11-17 16:57:33'),
(111, 'payment_log-edit', 'web', '2022-11-17 16:57:33', '2022-11-17 16:57:33'),
(112, 'payment_log-delete', 'web', '2022-11-17 16:57:33', '2022-11-17 16:57:33'),
(161, 'category-list', 'web', '2023-09-27 12:21:28', '2023-09-27 12:21:28'),
(162, 'category-create', 'web', '2023-09-27 12:21:29', '2023-09-27 12:21:29'),
(163, 'category-edit', 'web', '2023-09-27 12:21:30', '2023-09-27 12:21:30'),
(164, 'category-delete', 'web', '2023-09-27 12:21:30', '2023-09-27 12:21:30'),
(165, 'product-list', 'web', '2023-09-27 12:21:31', '2023-09-27 12:21:31'),
(166, 'product-create', 'web', '2023-09-27 12:21:31', '2023-09-27 12:21:31'),
(167, 'product-edit', 'web', '2023-09-27 12:21:31', '2023-09-27 12:21:31'),
(168, 'product-delete', 'web', '2023-09-27 12:21:31', '2023-09-27 12:21:31'),
(169, 'sub_category-list', 'web', '2023-09-27 12:21:31', '2023-09-27 12:21:31'),
(170, 'sub_category-create', 'web', '2023-09-27 12:21:32', '2023-09-27 12:21:32'),
(171, 'sub_category-edit', 'web', '2023-09-27 12:21:32', '2023-09-27 12:21:32'),
(172, 'sub_category-delete', 'web', '2023-09-27 12:21:32', '2023-09-27 12:21:32'),
(173, 'order-list', 'web', '2023-09-27 12:21:32', '2023-09-27 12:21:32'),
(174, 'order-create', 'web', '2023-09-27 12:21:32', '2023-09-27 12:21:32'),
(175, 'order-edit', 'web', '2023-09-27 12:21:32', '2023-09-27 12:21:32'),
(176, 'order-delete', 'web', '2023-09-27 12:21:33', '2023-09-27 12:21:33'),
(177, 'wishlist-list', 'web', '2023-09-27 12:21:33', '2023-09-27 12:21:33'),
(178, 'wishlist-create', 'web', '2023-09-27 12:21:33', '2023-09-27 12:21:33'),
(179, 'wishlist-edit', 'web', '2023-09-27 12:21:33', '2023-09-27 12:21:33'),
(180, 'wishlist-delete', 'web', '2023-09-27 12:21:33', '2023-09-27 12:21:33'),
(181, 'review-list', 'web', '2023-09-27 12:21:33', '2023-09-27 12:21:33'),
(182, 'review-create', 'web', '2023-09-27 12:21:34', '2023-09-27 12:21:34'),
(183, 'review-edit', 'web', '2023-09-27 12:21:34', '2023-09-27 12:21:34'),
(184, 'review-delete', 'web', '2023-09-27 12:21:34', '2023-09-27 12:21:34'),
(185, 'setting-list', 'web', '2023-09-27 12:21:34', '2023-09-27 12:21:34'),
(186, 'setting-create', 'web', '2023-09-27 12:21:34', '2023-09-27 12:21:34'),
(187, 'setting-edit', 'web', '2023-09-27 12:21:34', '2023-09-27 12:21:34'),
(188, 'setting-delete', 'web', '2023-09-27 12:21:35', '2023-09-27 12:21:35'),
(189, 'cart-list', 'web', '2023-09-27 12:21:35', '2023-09-27 12:21:35'),
(190, 'cart-create', 'web', '2023-09-27 12:21:35', '2023-09-27 12:21:35'),
(191, 'cart-edit', 'web', '2023-09-27 12:21:35', '2023-09-27 12:21:35'),
(192, 'cart-delete', 'web', '2023-09-27 12:21:35', '2023-09-27 12:21:35');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext NOT NULL,
  `slug` longtext DEFAULT NULL,
  `category_id` varchar(255) NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL DEFAULT '0',
  `description` longtext NOT NULL,
  `product_details` longtext NOT NULL,
  `price_badge` varchar(255) NOT NULL,
  `price_offer` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `image_alt` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `category_id`, `sub_category_id`, `price`, `quantity`, `description`, `product_details`, `price_badge`, `price_offer`, `image`, `image_alt`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Modern Black Real Leather Recliner Furniture Power Reclinable Sectional Living Room Sofa With Two Cup Holder', 'modern-black-real-leather-recliner-furniture-power-reclinable-sectional-living-room-sofa-with-two-cup-holder', '2', NULL, 120000, '1', 'Modern Black Real Leather Recliner Furniture Power Reclinable Sectional Living Room Sofa With Two Cup Holder', '<p>Modern Black Real Leather Recliner Furniture Power Reclinable Sectional Living Room Sofa With Two Cup Holder<br></p>', '1 Set', 0, '8668.jpg', NULL, '1', '2023-09-27 14:56:55', '2023-09-27 14:56:57'),
(2, 'CHEERS Wholesale Italian Furniture Modern Sectional Power Reclining Recliner Sofa', 'cheers-wholesale-italian-furniture-modern-sectional-power-reclining-recliner-sofa', '3', NULL, 150000, '1', 'CHEERS Wholesale Italian Furniture Modern Sectional Power Reclining Recliner Sofa', '<p>CHEERS Wholesale Italian Furniture Modern Sectional Power Reclining Recliner Sofa<br></p>', '1 Set', 0, '3722.jpg', NULL, '1', '2023-09-27 15:19:26', '2023-09-27 15:19:27'),
(3, 'Wholesale Oversized 3 + 1 seat Genuine Leather Electric Reclining Sofa Living Room Recliner set With USB', 'wholesale-oversized-3-1-seat-genuine-leather-electric-reclining-sofa-living-room-recliner-set-with-usb', '2', NULL, 120000, '1', 'Wholesale Oversized 3 + 1 seat Genuine Leather Electric Reclining Sofa Living Room Recliner set With USB', '<h1 data-spm-anchor-id=\"a2700.details.0.i73.50b56c28cgOQyX\" style=\"border: 0px; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-size: 20px; font-weight: 600; margin-right: 0px; margin-bottom: 8px; margin-left: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; line-height: 26px; font-family: Inter, &quot;SF Pro Text&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, &quot;PingFang SC&quot;, &quot;Microsoft YaHei&quot;; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; color: rgb(34, 34, 34);\">Wholesale Oversized 3 + 1 seat Genuine Leather Electric Reclining Sofa Living Room Recliner set With USB</h1>', '1 set', 0, '5931.jpg', NULL, '1', '2023-09-27 15:39:32', '2023-09-27 15:39:32'),
(4, 'Luxury Designer Furniture Living Room Corner Sofa Power Leather Recliner Sectional Couch Sofa Set', 'luxury-designer-furniture-living-room-corner-sofa-power-leather-recliner-sectional-couch-sofa-set', '3', NULL, 150000, '1', 'Luxury Designer Furniture Living Room Corner Sofa Power Leather Recliner Sectional Couch Sofa Set', '<h1 data-spm-anchor-id=\"a2700.details.0.i76.1a5945f0QFD5ek\" style=\"border: 0px; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-size: 20px; font-weight: 600; margin-right: 0px; margin-bottom: 8px; margin-left: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; line-height: 26px; font-family: Inter, &quot;SF Pro Text&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, &quot;PingFang SC&quot;, &quot;Microsoft YaHei&quot;; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; color: rgb(34, 34, 34);\">Luxury Designer Furniture Living Room Corner Sofa Power Leather Recliner Sectional Couch Sofa Set</h1>', '1 set', 0, '4952.jpg', NULL, '1', '2023-09-27 15:40:53', '2023-09-27 15:40:54'),
(5, 'Hot-selling Fabric Living Room Sofa 5-Seater Power Reclining Sectional with Console and Storage for Living Room', 'hot-selling-fabric-living-room-sofa-5-seater-power-reclining-sectional-with-console-and-storage-for-living-room', '1', NULL, 120000, '1', 'Hot-selling Fabric Living Room Sofa 5-Seater Power Reclining Sectional with Console and Storage for Living Room', '<h1 data-spm-anchor-id=\"a2700.details.0.i76.6c782c88DfynoU\" style=\"border: 0px; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-size: 20px; font-weight: 600; margin-right: 0px; margin-bottom: 8px; margin-left: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; line-height: 26px; font-family: Inter, &quot;SF Pro Text&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, &quot;PingFang SC&quot;, &quot;Microsoft YaHei&quot;; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; color: rgb(34, 34, 34);\">Hot-selling Fabric Living Room Sofa 5-Seater Power Reclining Sectional with Console and Storage for Living Room</h1>', '1 chair', 0, '6806.jpg', NULL, '1', '2023-09-27 15:44:46', '2023-09-27 15:44:46'),
(6, 'Grey Fabric Living Room Sofa 5-Seater Manual Reclining Sectional with Storage and Light for Living Room', 'grey-fabric-living-room-sofa-5-seater-manual-reclining-sectional-with-storage-and-light-for-living-room', '2', NULL, 150000, '1', 'Grey Fabric Living Room Sofa 5-Seater Manual Reclining Sectional with Storage and Light for Living Room', '<h1 data-spm-anchor-id=\"a2700.details.0.i77.58a27418vKF6Rb\" style=\"border: 0px; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-size: 20px; font-weight: 600; margin-right: 0px; margin-bottom: 8px; margin-left: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; line-height: 26px; font-family: Inter, &quot;SF Pro Text&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, &quot;PingFang SC&quot;, &quot;Microsoft YaHei&quot;; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; color: rgb(34, 34, 34);\">&nbsp;Grey Fabric Living Room Sofa 5-Seater Manual Reclining Sectional with Storage and Light for Living Room</h1>', '1set', 0, '5164.jpg', NULL, '1', '2023-09-27 15:47:02', '2023-09-27 15:47:02'),
(7, 'Euro Fabric Living Room Sofa Grey 5-Seater Power Reclining Sectional with Chaise and Drawer for Living Room', 'euro-fabric-living-room-sofa-grey-5-seater-power-reclining-sectional-with-chaise-and-drawer-for-living-room', '2', NULL, 200000, '1', 'Euro Fabric Living Room Sofa Grey 5-Seater Power Reclining Sectional with Chaise and Drawer for Living Room', '<h1 data-spm-anchor-id=\"a2700.details.0.i77.5b0f53e9PqLe1F\" style=\"border: 0px; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-size: 20px; font-weight: 600; margin-right: 0px; margin-bottom: 8px; margin-left: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; line-height: 26px; font-family: Inter, &quot;SF Pro Text&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, &quot;PingFang SC&quot;, &quot;Microsoft YaHei&quot;; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; color: rgb(34, 34, 34);\">Euro Fabric Living Room Sofa Grey 5-Seater Power Reclining Sectional with Chaise and Drawer for Living Room</h1>', '1 set', 0, '6210.jpg', NULL, '1', '2023-09-27 15:48:22', '2023-09-27 15:48:22'),
(8, '5-Seater Electric Fabric Zero Gravity Sectional Recliner Sofa Set with Wireless Charging and Power Headrest', '5-seater-electric-fabric-zero-gravity-sectional-recliner-sofa-set-with-wireless-charging-and-power-headrest', '2', NULL, 120000, '1', '5-Seater Electric Fabric Zero Gravity Sectional Recliner Sofa Set with Wireless Charging and Power Headrest', '<h1 data-spm-anchor-id=\"a2700.details.0.i68.d343167aALShNW\" style=\"border: 0px; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-size: 20px; font-weight: 600; margin-right: 0px; margin-bottom: 8px; margin-left: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; line-height: 26px; font-family: Inter, &quot;SF Pro Text&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, &quot;PingFang SC&quot;, &quot;Microsoft YaHei&quot;; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; color: rgb(34, 34, 34);\">5-Seater Electric Fabric Zero Gravity Sectional Recliner Sofa Set with Wireless Charging and Power Headrest</h1>', '1set', 0, '9856.jpg', NULL, '1', '2023-09-27 15:50:09', '2023-09-27 15:50:09'),
(9, 'Modern Fabric Single Sofa with Cup Holder Manual Glider Rocker Recliner Sofa Chair', 'modern-fabric-single-sofa-with-cup-holder-manual-glider-rocker-recliner-sofa-chair', '2', NULL, 45000, '1', 'Modern Fabric Single Sofa with Cup Holder Manual Glider Rocker Recliner Sofa Chair', '<h1 data-spm-anchor-id=\"a2700.details.0.i68.42c548af6e51ok\" style=\"border: 0px; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-size: 20px; font-weight: 600; margin-right: 0px; margin-bottom: 8px; margin-left: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; line-height: 26px; font-family: Inter, &quot;SF Pro Text&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, &quot;PingFang SC&quot;, &quot;Microsoft YaHei&quot;; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; color: rgb(34, 34, 34);\">Modern Fabric Single Sofa with Cup Holder Manual Glider Rocker Recliner Sofa Chair</h1>', '1 set', 0, '2642.jpg', NULL, '1', '2023-09-27 16:29:30', '2023-09-27 16:29:30'),
(10, 'Modern Fabric Single Sofa with Cup Holder Manual Glider Rocker Recliner Sofa Chair', 'modern-fabric-single-sofa-with-cup-holder-manual-glider-rocker-recliner-sofa-chair-10', '3', NULL, 120000, '1', 'Modern Fabric Single Sofa with Cup Holder Manual Glider Rocker Recliner Sofa Chair', '<h1 data-spm-anchor-id=\"a2700.details.0.i68.42c548af6e51ok\" style=\"border: 0px; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-size: 20px; font-weight: 600; margin-right: 0px; margin-bottom: 8px; margin-left: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; line-height: 26px; font-family: Inter, &quot;SF Pro Text&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, &quot;PingFang SC&quot;, &quot;Microsoft YaHei&quot;; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; color: rgb(34, 34, 34);\">Modern Fabric Single Sofa with Cup Holder Manual Glider Rocker Recliner Sofa Chair</h1>', '1 set', 0, '6765.jpg', NULL, '1', '2023-09-27 16:31:10', '2023-09-27 16:31:10'),
(11, 'Hot Selling Power Leather Recliner Adjustable Sofa Single Chair for Living Room Furniture', 'hot-selling-power-leather-recliner-adjustable-sofa-single-chair-for-living-room-furniture', '3', NULL, 150000, '1', 'Hot Selling Power Leather Recliner Adjustable Sofa Single Chair for Living Room Furniture', '<h1 data-spm-anchor-id=\"a2700.details.0.i63.22b46925Dm6spp\" style=\"border: 0px; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-size: 20px; font-weight: 600; margin-right: 0px; margin-bottom: 8px; margin-left: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; line-height: 26px; font-family: Inter, &quot;SF Pro Text&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, &quot;PingFang SC&quot;, &quot;Microsoft YaHei&quot;; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; color: rgb(34, 34, 34);\">Hot Selling Power Leather Recliner Adjustable Sofa Single Chair for Living Room Furniture</h1>', '1 set', 0, '4957.jpg', NULL, '1', '2023-09-27 16:34:39', '2023-09-27 16:34:39'),
(12, 'Hot Selling Power Leather Recliner Adjustable Sofa Single Chair for Living Room Furniture', 'hot-selling-power-leather-recliner-adjustable-sofa-single-chair-for-living-room-furniture-12', '1', NULL, 43000, '1', 'Hot Selling Power Leather Recliner Adjustable Sofa Single Chair for Living Room Furniture', '<h1 data-spm-anchor-id=\"a2700.details.0.i63.22b46925Dm6spp\" style=\"border: 0px; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-size: 20px; font-weight: 600; margin-right: 0px; margin-bottom: 8px; margin-left: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; line-height: 26px; font-family: Inter, &quot;SF Pro Text&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, &quot;PingFang SC&quot;, &quot;Microsoft YaHei&quot;; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; color: rgb(34, 34, 34);\">Hot Selling Power Leather Recliner Adjustable Sofa Single Chair for Living Room Furniture</h1>', '1 set', 0, '5418.jpg', NULL, '1', '2023-09-27 16:35:59', '2023-09-27 16:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_image_alts`
--

CREATE TABLE `product_image_alts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `image_alt` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `rating` int(11) DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `uwezo` int(11) NOT NULL DEFAULT 0,
  `youth` int(11) NOT NULL DEFAULT 0,
  `id_no` varchar(255) DEFAULT NULL,
  `passport_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `youth_fund` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `invoice_id` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `mpesa_transaction_id` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `medical_condition` varchar(255) DEFAULT NULL,
  `experience` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(3, 'Employee', 'web', '2022-03-31 03:34:23', '2022-03-31 03:34:23'),
(5, 'System Admin', 'web', '2022-04-13 17:53:51', '2022-04-13 17:53:51'),
(6, 'Super Admin', 'web', '2022-06-13 18:04:44', '2022-06-13 18:04:44'),
(8, 'Customer', 'web', '2022-11-29 08:34:24', '2023-01-09 20:32:18');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 5),
(1, 6),
(2, 6),
(3, 6),
(4, 6),
(13, 5),
(13, 6),
(14, 5),
(14, 6),
(15, 6),
(16, 6),
(105, 3),
(105, 5),
(105, 6),
(105, 8),
(106, 6),
(106, 8),
(107, 6),
(108, 6),
(109, 3),
(109, 5),
(109, 6),
(109, 8),
(110, 6),
(111, 6),
(112, 6),
(129, 3),
(129, 5),
(129, 8),
(130, 8),
(161, 6),
(162, 6),
(163, 6),
(164, 6),
(165, 6),
(166, 6),
(167, 6),
(168, 6),
(169, 6),
(170, 6),
(171, 6),
(172, 6),
(173, 6),
(174, 6),
(175, 6),
(176, 6),
(177, 6),
(178, 6),
(179, 6),
(180, 6),
(181, 6),
(182, 6),
(183, 6),
(184, 6),
(185, 6),
(186, 6),
(187, 6),
(188, 6),
(189, 6),
(190, 6),
(191, 6),
(192, 6);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `slug` longtext DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `category_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `towns`
--

CREATE TABLE `towns` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `towns`
--

INSERT INTO `towns` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Nairobi', '2019-03-30 03:04:57', '2019-03-30 03:04:57'),
(2, 'Mombasa', '2019-03-30 03:11:42', '2019-03-30 03:11:42'),
(3, 'Kisumu', '2019-03-30 03:11:56', '2019-03-30 03:11:56'),
(4, 'Nakuru', '2019-03-30 03:14:24', '2019-03-30 03:14:24'),
(5, 'Eldoret', '2019-03-30 03:14:31', '2019-03-30 03:14:31'),
(6, 'Kehancha', '2019-03-30 03:14:47', '2019-03-30 03:14:47'),
(7, 'Ruiru', '2019-03-30 03:14:54', '2019-03-30 03:14:54'),
(8, 'Kikuyu', '2019-03-30 03:15:01', '2019-03-30 03:15:01'),
(9, 'Kangundo - Tala', '2019-03-30 03:15:13', '2019-03-30 03:15:13'),
(10, 'Malindi', '2019-03-30 03:15:21', '2019-03-30 03:15:21'),
(11, 'Naivasha', '2019-03-30 03:15:28', '2019-03-30 03:15:28'),
(12, 'Kitui', '2019-03-30 03:15:34', '2019-03-30 03:15:34'),
(13, 'Machakos', '2019-03-30 03:21:13', '2019-03-30 03:21:13'),
(14, 'Thika', '2019-03-30 03:21:19', '2019-03-30 03:21:19'),
(15, 'Athi River (Mavoko)', '2019-03-30 03:21:37', '2019-03-30 03:21:37'),
(16, 'Karuri', '2019-03-30 03:21:50', '2019-03-30 03:21:50'),
(17, 'Nyeri', '2019-03-30 03:22:01', '2019-03-30 03:22:01'),
(18, 'Kilifi', '2019-03-30 03:22:07', '2019-03-30 03:22:07'),
(19, 'Garissa', '2019-03-30 03:22:13', '2019-03-30 03:22:13'),
(20, 'Vihiga', '2019-03-30 03:22:20', '2019-03-30 03:22:20'),
(21, 'Mumias', '2019-03-30 03:22:28', '2019-03-30 03:22:28'),
(22, 'Bomet', '2019-03-30 03:22:34', '2019-03-30 03:22:34'),
(23, 'Molo', '2019-03-30 03:22:40', '2019-03-30 03:22:40'),
(24, 'Ngong', '2019-03-30 03:22:44', '2019-03-30 03:22:44'),
(25, 'Kitale', '2019-03-30 03:22:49', '2019-03-30 03:22:49'),
(26, 'Litein', '2019-03-30 03:22:57', '2019-03-30 03:22:57'),
(27, 'Limuru', '2019-03-30 03:23:03', '2019-03-30 03:23:03'),
(28, 'Kericho', '2019-03-30 03:23:10', '2019-03-30 03:23:10'),
(29, 'Kimilili', '2019-03-30 03:23:18', '2019-03-30 03:23:18'),
(30, 'Awasi', '2019-03-30 03:23:23', '2019-03-30 03:23:23'),
(31, 'Kakamega', '2019-03-30 03:23:29', '2019-03-30 03:23:29'),
(32, 'Kapsabet', '2019-03-30 03:23:37', '2019-03-30 03:23:37'),
(33, 'Mariakani', '2019-03-30 03:23:47', '2019-03-30 03:23:47'),
(34, 'Kiambu', '2019-03-30 03:23:53', '2019-03-30 03:23:53'),
(35, 'Mandera', '2019-03-30 03:23:59', '2019-03-30 03:23:59'),
(36, 'Nyamira', '2019-03-30 03:24:05', '2019-03-30 03:24:05'),
(37, 'Mwingi', '2019-03-30 03:24:30', '2019-03-30 03:24:30'),
(38, 'Kisii', '2019-03-30 03:24:36', '2019-03-30 03:24:36'),
(39, 'Wajir', '2019-03-30 03:24:42', '2019-03-30 03:24:42'),
(40, 'Rongo', '2019-03-30 03:25:09', '2019-03-30 03:25:09'),
(41, 'Bungoma', '2019-03-30 03:25:19', '2019-03-30 03:25:19'),
(42, 'Ahero', '2019-03-30 03:25:37', '2019-03-30 03:25:37'),
(43, 'Nandi Hills', '2019-03-30 03:25:48', '2019-03-30 03:25:48'),
(44, 'Makuyu', '2019-03-30 03:25:54', '2019-03-30 03:25:54'),
(45, 'Kapenguria', '2019-03-30 03:26:04', '2019-03-30 03:26:04'),
(46, 'Taveta', '2019-03-30 03:26:10', '2019-03-30 03:26:10'),
(47, 'Narok', '2019-03-30 03:26:17', '2019-03-30 03:26:17'),
(48, 'Ol Kalou', '2019-03-30 03:26:24', '2019-03-30 03:26:24'),
(49, 'Kakuma', '2019-03-30 03:26:29', '2019-03-30 03:26:29'),
(50, 'Webuye', '2019-03-30 03:26:36', '2019-03-30 03:26:36'),
(51, 'Malaba', '2019-03-30 03:26:42', '2019-03-30 03:26:42'),
(52, 'Mbita Point', '2019-03-30 03:26:54', '2019-03-30 03:26:54'),
(53, 'Ukunda', '2019-03-30 03:26:59', '2019-03-30 03:26:59'),
(54, 'Wundanyi', '2019-03-30 03:27:05', '2019-03-30 03:27:05'),
(55, 'Busia', '2019-03-30 03:27:13', '2019-03-30 03:27:13'),
(56, 'Runyenjes', '2019-03-30 03:27:24', '2019-03-30 03:27:24'),
(57, 'Migori', '2019-03-30 03:27:31', '2019-03-30 03:27:31'),
(58, 'Malava', '2019-03-30 03:27:39', '2019-03-30 03:27:39'),
(59, 'Suneka', '2019-03-30 03:27:45', '2019-03-30 03:27:45'),
(60, 'Embu', '2019-03-30 03:27:50', '2019-03-30 03:27:50'),
(61, 'Ogembo', '2019-03-30 03:27:57', '2019-03-30 03:27:57'),
(62, 'Homa Bay', '2019-03-30 03:28:04', '2019-03-30 03:28:04'),
(63, 'Lodwar', '2019-03-30 03:28:10', '2019-03-30 03:28:10'),
(64, 'Kitengela', '2019-03-30 03:28:16', '2019-03-30 03:28:16'),
(65, 'Ukwala', '2019-03-30 03:28:21', '2019-03-30 03:28:21'),
(66, 'Keroka', '2019-03-30 03:28:27', '2019-03-30 03:28:27'),
(67, 'Meru', '2019-03-30 03:28:33', '2019-03-30 03:28:33'),
(68, 'Matuu', '2019-03-30 03:28:39', '2019-03-30 03:28:39'),
(69, 'Oyugis', '2019-03-30 03:28:47', '2019-03-30 03:28:47'),
(70, 'Nyahururu', '2019-03-30 03:28:58', '2019-03-30 03:28:58'),
(71, 'Kipkelion', '2019-03-30 03:29:08', '2019-03-30 03:29:08'),
(72, 'Luanda', '2019-03-30 03:29:16', '2019-03-30 03:29:16'),
(73, 'Nanyuki', '2019-03-30 03:29:28', '2019-03-30 03:29:28'),
(74, 'Maua', '2019-03-30 03:29:37', '2019-03-30 03:29:37'),
(75, 'Mtwapa', '2019-03-30 03:29:46', '2019-03-30 03:29:46'),
(76, 'Isiolo', '2019-03-30 03:29:53', '2019-03-30 03:29:53'),
(77, 'Eldama Ravine', '2019-03-30 03:30:06', '2019-03-30 03:30:06'),
(78, 'Voi', '2019-03-30 03:30:11', '2019-03-30 03:30:11'),
(79, 'Siaya', '2019-03-30 03:30:18', '2019-03-30 03:30:18'),
(80, 'Nyansiongo', '2019-03-30 03:30:35', '2019-03-30 03:30:35'),
(81, 'Londiani', '2019-03-30 03:30:47', '2019-03-30 03:30:47'),
(82, 'Iten/Tambach', '2019-03-30 03:31:03', '2019-03-30 03:31:03'),
(83, 'Chuka', '2019-03-30 03:31:10', '2019-03-30 03:31:10'),
(84, 'Malakisi', '2019-03-30 03:31:19', '2019-03-30 03:31:19'),
(85, 'Juja', '2019-03-30 03:31:27', '2019-03-30 03:31:27'),
(86, 'Ongata Rongai', '2019-03-30 03:31:38', '2019-03-30 03:31:38'),
(87, 'Bondo', '2019-03-30 03:31:44', '2019-03-30 03:31:44'),
(88, 'Moyale', '2019-03-30 03:31:51', '2019-03-30 03:31:51'),
(89, 'Maralal', '2019-03-30 03:31:59', '2019-03-30 03:31:59'),
(90, 'Gilgil', '2019-03-30 03:32:11', '2019-03-30 03:32:11'),
(91, 'Nambale', '2019-03-30 03:32:34', '2019-03-30 03:32:34'),
(92, 'Tabaka', '2019-03-30 03:32:41', '2019-03-30 03:32:41'),
(93, 'Muhoroni', '2019-03-30 03:32:48', '2019-03-30 03:32:48'),
(94, 'Kerugoya/Kutus', '2019-03-30 03:33:00', '2019-03-30 03:33:00'),
(95, 'Ugunja', '2019-03-30 03:33:10', '2019-03-30 03:33:10'),
(96, 'Yala', '2019-03-30 03:33:14', '2019-03-30 03:33:14'),
(97, 'Ramurusi', '2019-03-30 03:33:24', '2019-03-30 03:33:24'),
(98, 'Burnt Forest', '2019-03-30 03:33:39', '2019-03-30 03:33:39'),
(99, 'Maragua', '2019-03-30 03:33:51', '2019-03-30 03:33:51'),
(100, 'Kendu Bay', '2019-03-30 03:33:59', '2019-03-30 03:33:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `selfie` varchar(255) DEFAULT NULL,
  `admin` int(11) NOT NULL DEFAULT 0,
  `added_by` varchar(255) DEFAULT NULL,
  `kra_pin_no` varchar(255) DEFAULT NULL,
  `id_no` varchar(255) DEFAULT NULL,
  `national_id` varchar(255) DEFAULT NULL,
  `kra_pin` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `slug` longtext DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `updated_by`, `phone`, `email`, `dob`, `image`, `selfie`, `admin`, `added_by`, `kra_pin_no`, `id_no`, `national_id`, `kra_pin`, `status`, `email_verified_at`, `password`, `slug`, `last_seen`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Seasonal Admin', '1', '0', 'admin@admin.com', '2023-09-02', '4875.jpg', NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$5Hr8Q.gO4liycIWi/u4aHOVRI79sNN6LyPh0fUZ5IoimQ8Fa.A/Vi', 'seasonaldev', '2022-11-07 15:29:57', 'IQ4BP0efyImkYnnSbUihGdb8hkkPtvAhUAJJA5xBDUK9KLf2DwNmZyZyiSMj', '2022-10-17 20:12:50', '2023-09-23 01:51:35'),
(2, 'Mkuu', '2', '0712345678', 'mkuu254@gmail.com', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$G1thSJG29k5sv.vacX7q4ugwEW6ijwXYmmg5Rhpfp7vKx7PodwANC', 'mkuu_42', '2023-01-11 06:54:11', 'VBxbJQjc50mbXLJitn0a2clfUOipqn9Rm92CrogCMWl0qXJjDqH7UxI94PPG', '2022-11-07 15:00:59', '2023-09-02 01:22:28'),
(65, 'Juma', '2', '0700422699', 'jumaa@gmail.com', NULL, '3056.jpg', NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$ETj3Lw092zaSAhosIBYU8upogm5xjgshxCDFL9YVGJyp0W49k6CRm', 'mkuu', NULL, NULL, '2023-09-01 16:49:09', '2023-09-02 01:39:15'),
(66, 'Kabwela', NULL, NULL, 'kabwela254@gmail.com', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$CfA8dN6dwEKLYyBWZzBwB.rss2vDjknZ0CisYaDtzoGc0ebPlc1ii', NULL, NULL, NULL, '2023-09-03 13:17:59', '2023-09-03 13:17:59'),
(67, 'Kimani', NULL, NULL, 'kb@admin.com', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$0QMDaR.KBd2qg1ReGd20lu.3QRIu.fiz6v7GAIJaVJTljmG9T8gzy', NULL, NULL, NULL, '2023-09-05 12:40:51', '2023-09-12 22:49:24'),
(68, 'admin@', NULL, '0', 'admin@r.com', NULL, '5508.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$4Sm6/Jj5aLkWhHOkd1ULG.Kl3WHnE37WlAYou63WYIjieR4vTtev.', 'admin@', NULL, '0ngfETDIf2zbFx6iNOA83bf5hnuxq29KTogKYImuAPQ2RKuNuw9sw9umERAL', '2023-09-13 01:42:24', '2023-09-13 01:42:24'),
(69, 'Jumaaa', NULL, NULL, 'jumaaa@gmail.com', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$Y3fgMRsCidrUu5A1W74/eeTyd1YbIvzILM9PVa7MmlUyxBf6B2s1e', NULL, NULL, 'Tz1cfzggP3sLeNVWIbudg20Um4g5HFuMU94IYcI4O891Hxbx2rJbgJMcfwuo', '2023-09-28 12:42:52', '2023-09-28 12:42:52'),
(70, 'kingoripatrick294@gmail.com', NULL, NULL, 'kingoripatrick294@gmail.com', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$v8bl8PYrAh57K8jdo60K/.jTRjYAVPhEZQcJUGSFwSv4TYH5zv4CO', NULL, NULL, NULL, '2023-10-04 03:51:49', '2023-10-04 03:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `wish_lists`
--

CREATE TABLE `wish_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_images`
--
ALTER TABLE `category_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_image_alts`
--
ALTER TABLE `category_image_alts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_towns`
--
ALTER TABLE `delivery_towns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `mpesa_transactions`
--
ALTER TABLE `mpesa_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_logs`
--
ALTER TABLE `payment_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image_alts`
--
ALTER TABLE `product_image_alts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `towns`
--
ALTER TABLE `towns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category_images`
--
ALTER TABLE `category_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_image_alts`
--
ALTER TABLE `category_image_alts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64882;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_towns`
--
ALTER TABLE `delivery_towns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mpesa_transactions`
--
ALTER TABLE `mpesa_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=452;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_logs`
--
ALTER TABLE `payment_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_image_alts`
--
ALTER TABLE `product_image_alts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `towns`
--
ALTER TABLE `towns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `wish_lists`
--
ALTER TABLE `wish_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
