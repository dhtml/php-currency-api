CREATE TABLE IF NOT EXISTS `currencies` (
    `id` int NOT NULL AUTO_INCREMENT,
    `iso_code` char(3) DEFAULT NULL,
    `iso_numeric_code` int DEFAULT NULL,
    `common_name` varchar(100) DEFAULT NULL,
    `official_name` varchar(100) DEFAULT NULL,
    `symbol` char(5) DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `official_name` (`official_name`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
