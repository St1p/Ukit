-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Час створення: Лип 14 2016 р., 20:55
-- Версія сервера: 5.5.44-0ubuntu0.14.04.1
-- Версія PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База даних: `uk_orders`
--

-- --------------------------------------------------------

--
-- Структура таблиці `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) DEFAULT NULL,
  `customers_email` varchar(30) NOT NULL,
  `customers_phone` varchar(15) NOT NULL,
  `customers_time_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп даних таблиці `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customers_email`, `customers_phone`, `customers_time_order`) VALUES
(2, 'St1p', 'sss@aaa', '67676767', '2016-07-13 13:19:02'),
(4, 'fgfg', 'dfdfdf', 'dfdfd', '2016-07-13 19:57:13'),
(5, 'fgfg', 'fgfg', 'dfdfd', '2016-07-13 19:58:36'),
(6, 'fgfg', 'fgfg', '11112', '2016-07-13 19:59:16'),
(8, 'St1p1andr', 'St1p1990@gmail.com', '0939770755', '2016-07-13 20:33:36');

-- --------------------------------------------------------

--
-- Структура таблиці `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(30) DEFAULT NULL,
  `product_prise` int(15) DEFAULT NULL,
  `product_value` int(15) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `orders_ibfk_1` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Дамп даних таблиці `orders`
--

INSERT INTO `orders` (`order_id`, `product_name`, `product_prise`, `product_value`, `customer_id`) VALUES
(30, 'KO-919', 100, 1, 8),
(31, 'KO-919', 20000, 200, 8);

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
