CREATE TABLE `seller`
(
    `id`    CHAR(36)     NOT NULL,
    `name`  VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `product`
(
    `id`          CHAR(36)       NOT NULL,
    `name`        VARCHAR(255)   NOT NULL,
    `description` VARCHAR(255)   NOT NULL,
    `price`       DECIMAL(10, 2) NOT NULL,
    `sellerId`    CHAR(36)       NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `cart`
(
    `id`        CHAR(36) NOT NULL,
    `productId` CHAR(36) NOT NULL,
    `qt`        int      NOT NULL,
    `confirmed` BOOLEAN  NOT NULL,
    PRIMARY KEY (`id`, `productId`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;