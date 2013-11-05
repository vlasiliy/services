-- phpMyAdmin SQL Dump
-- version 4.0.5deb1.precise~ppa.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 05 2013 г., 16:38
-- Версия сервера: 5.5.34-0ubuntu0.12.04.1
-- Версия PHP: 5.3.10-1ubuntu3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `services`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `root` int(10) unsigned NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `left` int(10) unsigned NOT NULL,
  `right` int(10) unsigned NOT NULL,
  `level` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `left` (`left`),
  KEY `right` (`right`),
  KEY `level` (`level`),
  KEY `id` (`id`),
  KEY `root` (`root`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `groupcategory`
--

CREATE TABLE IF NOT EXISTS `groupcategory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `groupcategory_category`
--

CREATE TABLE IF NOT EXISTS `groupcategory_category` (
  `groupcategory_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  KEY `groupcategory_id` (`groupcategory_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(10) unsigned NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `date_finished` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `price` int(10) unsigned NOT NULL,
  `currency` set('UAH','USD','EUR','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'UAH',
  `unit` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `search`
--

CREATE TABLE IF NOT EXISTS `search` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `object_id` int(10) unsigned NOT NULL,
  `words` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `table_name` (`table_name`,`object_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` set('admin','moder','executant','provider','user') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'executant',
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `nick` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `sex` int(1) unsigned NOT NULL COMMENT '0 - жен., 1 - муж.',
  `company` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `postcode` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `tel1` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `tel2` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `site` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `skype` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `icq` int(10) unsigned NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_last_visit` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ban` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `role`, `email`, `password`, `nick`, `name`, `surname`, `sex`, `company`, `city`, `postcode`, `address`, `tel1`, `tel2`, `site`, `skype`, `icq`, `lat`, `lng`, `date_create`, `date_update`, `date_last_visit`, `ban`) VALUES
(1, 'admin', 'vlasiliy@gmail.com', 'b8811d34d454be08f90008373a16c4b7', 'admin', 'Василий', 'Пупкин', 1, '', '', '', '', '', '', '', '', 0, 0, 0, '2013-08-06 09:15:25', '0000-00-00 00:00:00', '2013-11-05 10:34:43', 0),
(2, 'moder', 'anliko.v@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'anli', 'Анатолий', 'Иванов', 1, '', 'Черкассы', '20700', 'ул. Ленина 123, кв. 10', '0965349865', '', '', 'anli_v', 0, 0, 0, '2013-10-18 13:18:52', '0000-00-00 00:00:00', '2013-10-27 12:30:00', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user_category`
--

CREATE TABLE IF NOT EXISTS `user_category` (
  `user_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `begin_year` int(4) unsigned NOT NULL,
  `area_​​operations` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT 'регион деятельности / филиалы',
  `awards` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `agent` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `services` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'детальное описание / детальная информация',
  `tags` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) unsigned NOT NULL,
  `currency` set('UAH','USD','EUR','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'UAH',
  `unit` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `price_description` text COLLATE utf8_unicode_ci NOT NULL,
  `scheme_work` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'схема работы / режим работы',
  KEY `tags` (`tags`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user_region`
--

CREATE TABLE IF NOT EXISTS `user_region` (
  `user_id` int(10) unsigned NOT NULL,
  `region_id` int(10) unsigned NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `region_id` (`region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(10) unsigned NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `groupcategory_category`
--
ALTER TABLE `groupcategory_category`
  ADD CONSTRAINT `groupcategory_category_ibfk_1` FOREIGN KEY (`groupcategory_id`) REFERENCES `groupcategory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `groupcategory_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_category`
--
ALTER TABLE `user_category`
  ADD CONSTRAINT `user_category_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_region`
--
ALTER TABLE `user_region`
  ADD CONSTRAINT `user_region_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_region_ibfk_2` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
