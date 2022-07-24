START TRANSACTION;
SET time_zone = "+00:00";


--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int NOT NULL AUTO_INCREMENT,
  `continent_code` char(2) DEFAULT NULL,
  `currency_code` char(3) DEFAULT NULL,
  `iso2_code` char(2) DEFAULT NULL,
  `iso3_code` char(3) DEFAULT NULL,
  `iso_numeric_code` int DEFAULT NULL,
  `fips_code` int DEFAULT NULL,
  `calling_code` int DEFAULT NULL,
  `common_name` varchar(100) DEFAULT NULL,
  `official_name` varchar(100) DEFAULT NULL,
  `endonym` varchar(100) DEFAULT NULL,
  `demonym` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `iso_code` char(3) DEFAULT NULL,
  `iso_numeric_code` int DEFAULT NULL,
  `common_name` varchar(100) DEFAULT NULL,
  `official_name` varchar(100) DEFAULT NULL,
  `symbol` char(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;
