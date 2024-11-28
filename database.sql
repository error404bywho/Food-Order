-- DROP DATABASE IF EXISTS `ecommerce`;
-- Xóa database nếu tồn tại
-- Tạo database mới
-- CREATE DATABASE `ecommerce`;
-- USE `ecommerce`;


-- Bảng: users (người dùng)
CREATE TABLE `users` (

    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `fullname` VARCHAR(255),
    `phone` VARCHAR(20),
    `birthday` DATE,
    `address` TEXT,
    `balance` DECIMAL(10, 2) DEFAULT 0.00,
    `role` ENUM('user', 'admin') DEFAULT 'user',
    `dateCreated` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `dateUpdated` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `status` ENUM('active', 'inactive') DEFAULT 'active'
);
ALTER TABLE `users` AUTO_INCREMENT = 1000;
-- Bảng: category (danh mục sản phẩm)
CREATE TABLE `category` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `image` VARCHAR(255),
    `active` TINYINT(1) DEFAULT 1
);

-- Bảng: product (sản phẩm)
CREATE TABLE `product` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `image` VARCHAR(255),
    `price` DECIMAL(10, 2) NOT NULL,
    `voucher` DECIMAL(10, 2) DEFAULT 0.00, -- Giá trị giảm giá cho sản phẩm (nếu có)
    `quantity` INT NOT NULL,
    `hot` TINYINT(1) DEFAULT 0, -- Sản phẩm nổi bật
    `description` TEXT,
    `idCategory` INT NOT NULL,
    `active` TINYINT(1) DEFAULT 1,
    FOREIGN KEY (`idCategory`) REFERENCES `category`(`id`) ON DELETE CASCADE
);

-- Bảng: post (bài viết đánh giá)
CREATE TABLE `post` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `content` TEXT NOT NULL,
    `rating` INT CHECK(`rating` BETWEEN 1 AND 5), -- Đánh giá từ 1 đến 5
    `dateCreated` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `dateUpdated` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `idUser` INT NOT NULL,
    `idProduct` INT NOT NULL,
    FOREIGN KEY (`idUser`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`idProduct`) REFERENCES `product`(`id`) ON DELETE CASCADE
);

-- Bảng: voucher (mã giảm giá)
CREATE TABLE `voucher` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `code` VARCHAR(50) NOT NULL UNIQUE,
    `description` VARCHAR(255),
    `discountValue` DECIMAL(10, 2) NOT NULL,
    `type` ENUM('percent', 'fixed') DEFAULT 'percent',
    `validFrom` DATETIME,
    `validTo` DATETIME,
    `active` TINYINT(1) DEFAULT 1
);

-- Bảng: bill (hóa đơn)
CREATE TABLE `bill` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `email` VARCHAR(255) NOT NULL,
    `address` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(20) NOT NULL,
    `content` TEXT,
    `totalAmount` DECIMAL(10, 2) NOT NULL,
    `discountAmount` DECIMAL(10, 2) DEFAULT 0.00,
    `finalAmount` DECIMAL(10, 2) NOT NULL,
    `idUser` INT NOT NULL,
    `idVoucher` INT NULL, -- Mã voucher áp dụng
    `dateCreated` DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`idUser`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`idVoucher`) REFERENCES `voucher`(`id`) ON DELETE SET NULL
);

-- Bảng: voucher_usage (lịch sử sử dụng voucher)
CREATE TABLE `voucher_usage` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `idVoucher` INT NOT NULL,
    `idUser` INT NOT NULL,
    `idBill` INT NOT NULL, -- Liên kết với hóa đơn
    `usedAt` DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`idVoucher`) REFERENCES `voucher`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`idUser`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`idBill`) REFERENCES `bill`(`id`) ON DELETE CASCADE
);
