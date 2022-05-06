-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Generation Time: May 04, 2022 at 10:51 AM
-- Server version: 8.0.29
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password_hash` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `notes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `text` text NOT NULL,
  `filepath` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- admin:password
INSERT INTO `users` (`id`, `username`, `password_hash`) VALUES
(1, 'admin', '$2y$10$xlz9iW79045qVwxoUGRY2ufSTYGaxWdAKCZMPDP.Twn.tpcMBQJnS');



INSERT INTO `notes` (`id`, `user_id`, `text`, `filepath`, `date`) VALUES
(1, 1, '123123123', '', '2022-05-04 10:56:25');
