-- phpMyAdmin SQL Dump
-- version 4.0.9deb1.precise~ppa.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Дек 09 2013 г., 17:50
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
  `url` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lft` int(10) unsigned NOT NULL,
  `rgt` int(10) unsigned NOT NULL,
  `level` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `left` (`lft`),
  KEY `right` (`rgt`),
  KEY `level` (`level`),
  KEY `root` (`root`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=49 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `root`, `name`, `url`, `lft`, `rgt`, `level`) VALUES
(1, 1, 'Организация мероприятий', 'organization-of-events', 1, 32, 1),
(2, 2, 'Представления, цирк, шоу', 'submissions-circus-show', 1, 34, 1),
(3, 3, 'Живопись, скульптура, графика', 'painting-sculpture-graphics', 1, 2, 1),
(4, 4, 'Музыка, танцы', 'music-dance', 1, 2, 1),
(5, 1, 'Организаторы выставок', 'trade-show-organizers', 2, 3, 2),
(6, 1, 'Организаторы свадеб', 'organizers-of-weddings', 4, 5, 2),
(7, 7, 'Архитектура', 'architecture', 1, 2, 1),
(9, 9, 'Фото, видео', 'photo-video', 1, 2, 1),
(10, 10, 'Декоративно-прикладное искусство', 'arts-and-crafts', 1, 2, 1),
(12, 12, 'Театр, кино', 'theater-cinema', 1, 2, 1),
(13, 13, 'Мода, стиль', 'fashion-style', 1, 2, 1),
(14, 14, 'Литература', 'literature', 1, 2, 1),
(15, 15, 'Искусствоведение', 'arts', 1, 2, 1),
(16, 16, 'Дизайн', 'design', 1, 2, 1),
(17, 1, 'Организаторы детских праздников', 'organizers-of-children-s-holidays', 6, 7, 2),
(18, 1, 'Организаторы корпоративных праздников', 'organizers-of-corporate-holidays', 8, 9, 2),
(19, 1, 'Организаторы новогодних мероприятий', 'organizers-of-christmas-events', 10, 11, 2),
(20, 1, 'Организаторы шоу', 'organizers-of-the-show', 12, 13, 2),
(21, 1, 'Организаторы вечеринок и дискотек', 'organisers-of-parties-and-discos', 14, 15, 2),
(22, 1, 'Организаторы выпускных вечеров', 'organizers-of-graduation-parties', 16, 17, 2),
(23, 1, 'Тимбилдинг', 'teambuilding', 18, 19, 2),
(24, 1, 'Оформление праздничных мероприятий (общее)', 'making-of-events-general', 20, 21, 2),
(25, 1, 'Оформление воздушными шарами', 'decoration-with-balloons', 22, 23, 2),
(26, 1, 'Световое оформление и пиротехника', 'lighting-design-and-pyrotechnics', 24, 25, 2),
(27, 1, 'Кейтеринг', 'catering', 26, 27, 2),
(28, 1, 'Флористика', 'floristics', 28, 29, 2),
(29, 1, 'Организация мероприятий (другие)', 'organisation-of-events-other', 30, 31, 2),
(31, 2, 'Ведущие, конферансье, тамада', 'entertainer-toastmaster', 2, 3, 2),
(32, 2, 'Аниматоры', 'animators', 4, 5, 2),
(33, 2, 'Оригинальный жанр', 'ingenious-genre', 6, 7, 2),
(34, 2, 'Фокусники', 'magicians', 8, 9, 2),
(36, 2, 'Клоуны', 'clowns', 10, 11, 2),
(37, 2, 'Ростовые куклы', 'mascots', 12, 13, 2),
(38, 2, 'Кукловоды', 'puppeteers', 14, 15, 2),
(39, 2, 'Дрессировщики', 'trainers', 16, 17, 2),
(40, 2, 'Акробаты', 'acrobats', 18, 19, 2),
(41, 2, 'Ходулисты', 'stilts', 20, 21, 2),
(42, 2, 'Мимы, живые статуи', 'mimes-living-statues', 22, 23, 2),
(43, 2, 'Бодибилдеры', 'bodybuilders', 24, 25, 2),
(44, 2, 'Стриптиз', 'striptease', 26, 27, 2),
(46, 2, 'Бармены (флейринг)', 'bartenders-flaring', 28, 29, 2),
(47, 2, 'Деды Морозы и Снегурочки', 'santas-and-snow-maiden', 30, 31, 2),
(48, 2, 'Представления, шоу, цирк (другие)', 'presentation-show-circus-other', 32, 33, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Дамп данных таблицы `region`
--

INSERT INTO `region` (`id`, `name`) VALUES
(1, 'Автономная Республика Крым'),
(2, 'Винницкая область'),
(3, 'Волынская область'),
(4, 'Днепропетровская область'),
(5, 'Донецкая область'),
(6, 'Житомирская область'),
(7, 'Закарпатская область'),
(8, 'Запорожская область'),
(9, 'Ивано-Франковская область'),
(10, 'Киевская область'),
(11, 'Кировоградская область'),
(12, 'Луганская область'),
(13, 'Львовская область'),
(14, 'Николаевская область'),
(15, 'Одесская область'),
(16, 'Полтавская область'),
(17, 'Ровненская область'),
(18, 'Сумская область'),
(19, 'Тернопольская область'),
(20, 'Харьковская область'),
(21, 'Херсонская область'),
(22, 'Хмельницкая область'),
(23, 'Черкасская область'),
(24, 'Черниговская область'),
(25, 'Черновицкая область');

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
  `avatar` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
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
  `icq` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `lat` double(20,17) NOT NULL,
  `lng` double(20,17) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_last_visit` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ban` int(1) unsigned NOT NULL DEFAULT '0',
  `ad` int(1) unsigned NOT NULL DEFAULT '0',
  `news` int(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `role`, `email`, `password`, `nick`, `avatar`, `name`, `surname`, `sex`, `company`, `city`, `postcode`, `address`, `tel1`, `tel2`, `site`, `skype`, `icq`, `lat`, `lng`, `date_create`, `date_update`, `date_last_visit`, `ban`, `ad`, `news`) VALUES
(1, 'admin', 'vlasiliy@gmail.com', 'b8811d34d454be08f90008373a16c4b7', 'admin', '', 'Василий', 'Пупкин', 1, '', '', '', '', '', '', '', '', '', 0.00000000000000000, 0.00000000000000000, '2013-08-06 09:15:25', '0000-00-00 00:00:00', '2013-12-09 12:47:54', 0, 0, 0),
(2, 'user', 'anli_v@mail.ru', 'b8811d34d454be08f90008373a16c4b7', 'anli', '', 'Анатолий', 'Иванов', 1, '', 'Черкассы', '20700', 'ул. Ленина 123, кв. 10', '096534986523423', '', 'http://www.test.com', 'anli_v', '', 50.44588815366918000, 30.50958473235391500, '2013-10-18 13:18:52', '2013-11-29 21:51:58', '2013-10-27 12:30:00', 0, 1, 0),
(3, 'provider', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'test', '', 'Тест', 'Тестов', 1, '', 'TestCity', '', 'ул. Тестова 15', '0965349865', '', '', '', '', 51.23663988545725000, 33.19478441029787000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user_category`
--

CREATE TABLE IF NOT EXISTS `user_category` (
  `user_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `begin_year` int(4) unsigned NOT NULL DEFAULT '0',
  `area_operations` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT 'регион деятельности / филиалы',
  `awards` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `agent` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `service` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'детальное описание / детальная информация',
  `tags` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) unsigned NOT NULL DEFAULT '0',
  `currency` set('UAH','USD','EUR','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'UAH',
  `unit` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `price_description` text COLLATE utf8_unicode_ci NOT NULL,
  `scheme_work` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'схема работы / режим работы',
  KEY `tags` (`tags`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user_category`
--

INSERT INTO `user_category` (`user_id`, `category_id`, `begin_year`, `area_operations`, `awards`, `agent`, `service`, `description`, `tags`, `price`, `currency`, `unit`, `price_description`, `scheme_work`) VALUES
(2, 6, 0, '', '', '', '', '', '', 0, 'UAH', '', '', ''),
(2, 21, 2010, 'только Смела', '', '', 'Тамада, конферансье', '', '', 0, '', '', '', '');

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

--
-- Дамп данных таблицы `user_region`
--

INSERT INTO `user_region` (`user_id`, `region_id`) VALUES
(3, 3),
(3, 7),
(2, 2),
(2, 4),
(2, 5),
(2, 8),
(2, 10),
(2, 17),
(2, 19);

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
