CREATE TABLE `seller` (
                           `id` CHAR(36) NOT NULL,
                           `name` VARCHAR(255) NOT NULL,
                           `email` VARCHAR(255) NOT NULL,
                           PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;