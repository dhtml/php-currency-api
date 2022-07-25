CREATE TABLE IF NOT EXISTS `countries` (
    `id` int NOT NULL AUTO_INCREMENT,
    `continent_code` char(2) DEFAULT NULL,
    `currency_code` char(3) DEFAULT NULL,
    `iso2_code` char(2) DEFAULT NULL,
    `iso3_code` char(3) DEFAULT NULL,
    `iso_numeric_code` int DEFAULT NULL,
    `fips_code` varchar(100) DEFAULT NULL,
    `calling_code` int DEFAULT NULL,
    `common_name` varchar(100) DEFAULT NULL,
    `official_name` varchar(100) DEFAULT NULL,
    `endonym` varchar(100) DEFAULT NULL,
    `demonym` varchar(100) DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `iso3_code` (`iso3_code`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
