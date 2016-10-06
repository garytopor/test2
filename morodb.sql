-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 06 2016 г., 15:12
-- Версия сервера: 5.5.50
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `morodb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `alias` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(10) NOT NULL,
  `showInMenu` smallint(2) DEFAULT '1',
  `icon` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `alias`, `sort`, `showInMenu`, `icon`) VALUES
(1, 'home', 1, 1, 'icon-home4'),
(2, 'about_company', 2, 1, 'icon-brain'),
(3, 'our_services', 3, 1, 'icon-anchor'),
(4, 'clients_and_partners', 4, 1, 'icon-people'),
(5, 'contacts', 5, 1, 'icon-list');

-- --------------------------------------------------------

--
-- Структура таблицы `category_lang`
--

CREATE TABLE IF NOT EXISTS `category_lang` (
  `id` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `lang` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `val` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `category_lang`
--

INSERT INTO `category_lang` (`id`, `idCategory`, `lang`, `val`) VALUES
(1, 1, 'en', 'home'),
(2, 1, 'ru', 'главная'),
(3, 1, 'cn', '家'),
(4, 2, 'en', 'about company'),
(5, 2, 'ru', 'о компании'),
(6, 2, 'cn', '关于公司'),
(7, 3, 'en', 'our services'),
(8, 3, 'ru', 'наши услуги'),
(9, 3, 'cn', '我们的服务'),
(10, 4, 'en', 'clients and partners'),
(11, 4, 'ru', 'клиенты и партнеры'),
(12, 4, 'cn', '客户和合作伙伴'),
(13, 5, 'en', 'contacts'),
(14, 5, 'ru', 'контакты'),
(15, 5, 'cn', '往来');

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL,
  `idCountry` int(11) NOT NULL,
  `lat` decimal(10,6) NOT NULL,
  `lon` decimal(10,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `city_lang`
--

CREATE TABLE IF NOT EXISTS `city_lang` (
  `id` int(11) NOT NULL,
  `idCity` int(11) NOT NULL,
  `lang` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `val` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `country_lang`
--

CREATE TABLE IF NOT EXISTS `country_lang` (
  `id` int(11) NOT NULL,
  `idCountry` int(11) NOT NULL,
  `lang` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `val` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `field`
--

CREATE TABLE IF NOT EXISTS `field` (
  `id` int(11) NOT NULL,
  `alias` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `i18n` smallint(2) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `field`
--

INSERT INTO `field` (`id`, `alias`, `type`, `i18n`) VALUES
(1, 'title', 'text', 1),
(2, 'meta-description', 'text', 1),
(3, 'meta-keywords', 'text', 1),
(4, 'content-top', 'html', 1),
(5, 'content-main', 'html', 1),
(6, 'img-top', 'image', 0),
(7, 'img-main', 'image', 0),
(8, 'img-icon', 'image', 0),
(9, 'fio', 'text', 0),
(10, 'post', 'text', 1),
(11, 'tel', 'tel', 0),
(12, 'email', 'email', 0),
(13, 'createdAt', 'date', 0),
(14, 'isMain', 'checkbox', 0),
(15, 'tech-data', 'html', 1),
(16, 'isRed', 'checkbox', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `field_lang`
--

CREATE TABLE IF NOT EXISTS `field_lang` (
  `id` int(11) NOT NULL,
  `idField` int(11) NOT NULL,
  `lang` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `val` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `field_lang`
--

INSERT INTO `field_lang` (`id`, `idField`, `lang`, `val`) VALUES
(1, 1, 'en', 'Title'),
(2, 1, 'ru', 'Заголовок'),
(3, 1, 'cn', '标题'),
(4, 2, 'en', 'Meta-description'),
(5, 2, 'ru', 'Мета-описание'),
(6, 2, 'cn', '元描述'),
(7, 3, 'en', 'Meta-keywords'),
(8, 3, 'ru', 'Ключевые слова'),
(9, 3, 'cn', '元关键字'),
(10, 4, 'en', 'Content Top'),
(11, 4, 'ru', 'Содержание'),
(12, 4, 'cn', '内容顶'),
(13, 5, 'en', 'Body content'),
(14, 5, 'ru', 'Остальное содержание'),
(15, 5, 'cn', '正文内容'),
(16, 6, 'en', 'Top image'),
(17, 6, 'ru', 'Верхняя картинка'),
(18, 6, 'cn', '最上面的图片'),
(19, 7, 'en', 'Text image'),
(20, 7, 'ru', 'Текстовое изображение'),
(21, 7, 'cn', '文字图片'),
(22, 8, 'en', 'Icon'),
(23, 8, 'ru', 'Иконка'),
(24, 8, 'cn', '图标'),
(25, 9, 'en', 'Name'),
(26, 9, 'ru', 'Имя'),
(27, 9, 'cn', '名称'),
(28, 10, 'en', 'Position'),
(29, 10, 'ru', 'Должность'),
(30, 10, 'cn', '位置'),
(31, 11, 'en', 'Phone number'),
(32, 11, 'ru', 'Номер телефона'),
(33, 11, 'cn', '电话号码'),
(34, 12, 'en', 'Email'),
(35, 12, 'ru', 'Эл. адрес'),
(36, 12, 'cn', '电子邮件');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1475677661),
('m130524_201442_init', 1475677669);

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `alias` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `childAlias` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isChild` smallint(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`id`, `idCategory`, `alias`, `childAlias`, `isChild`) VALUES
(1, 2, 'company_history_and_possibilities', '', 0),
(4, 2, 'managment', 'managers', 0),
(5, 2, 'current_jobs', 'vacancies', 0),
(6, 2, 'responsibility_and_security', '', 0),
(7, 2, 'company_news', 'news', 0),
(8, 3, 'cargo_selection', 'cargos', 0),
(9, 3, 'our_route', '', 0),
(10, 3, 'sea_inland_air_service', 'transports', 0),
(11, 3, 'dangerous_goods', 'goods', 0),
(12, 3, 'your_questions_and_our_answers', 'faq', 0),
(13, 4, 'our_clients', 'client', 0),
(14, 4, 'our_partners', 'partner', 0),
(15, 1, 'home', NULL, NULL),
(17, 2, 'managers', NULL, 1),
(18, 2, 'managers', NULL, 1),
(19, 2, 'managers', NULL, 1),
(20, 2, 'managers', NULL, 1),
(21, 2, 'news', NULL, 1),
(22, 2, 'news', NULL, 1),
(23, 3, 'cargos', NULL, 1),
(24, 3, 'cargos', NULL, 1),
(25, 3, 'cargos', NULL, 1),
(26, 3, 'cargos', NULL, 1),
(27, 3, 'cargos', NULL, 1),
(28, 3, 'cargos', NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `page_field`
--

CREATE TABLE IF NOT EXISTS `page_field` (
  `id` int(11) NOT NULL,
  `aliasPage` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aliasField` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `page_field`
--

INSERT INTO `page_field` (`id`, `aliasPage`, `aliasField`) VALUES
(1, 'company_history_and_possibilities', 'title'),
(2, 'company_history_and_possibilities', 'meta-description'),
(3, 'company_history_and_possibilities', 'meta-keywords'),
(4, 'company_history_and_possibilities', 'content-top'),
(5, 'company_history_and_possibilities', 'content-main'),
(6, 'managment', 'title'),
(7, 'managment', 'meta-description'),
(8, 'managment', 'meta-keywords'),
(9, 'managment', 'content-top'),
(10, 'managment', 'content-main'),
(11, 'current_jobs', 'title'),
(12, 'current_jobs', 'meta-description'),
(13, 'current_jobs', 'meta-keywords'),
(14, 'current_jobs', 'content-top'),
(15, 'current_jobs', 'content-main'),
(16, 'responsibility_and_security', 'title'),
(17, 'responsibility_and_security', 'meta-description'),
(18, 'responsibility_and_security', 'meta-keywords'),
(19, 'responsibility_and_security', 'content-top'),
(20, 'responsibility_and_security', 'content-main'),
(21, 'company_news', 'title'),
(22, 'company_news', 'meta-description'),
(23, 'company_news', 'meta-keywords'),
(26, 'cargo_selection', 'title'),
(31, 'our_route', 'title'),
(32, 'our_route', 'meta-description'),
(33, 'our_route', 'meta-keywords'),
(36, 'sea_inland_air_service', 'title'),
(41, 'dangerous_goods', 'title'),
(42, 'dangerous_goods', 'meta-description'),
(43, 'dangerous_goods', 'meta-keywords'),
(44, 'dangerous_goods', 'content-top'),
(46, 'your_questions_and_our_answers', 'title'),
(47, 'your_questions_and_our_answers', 'meta-description'),
(48, 'your_questions_and_our_answers', 'meta-keywords'),
(49, 'your_questions_and_our_answers', 'content-top'),
(51, 'our_clients', 'title'),
(56, 'our_partners', 'title'),
(61, 'company_history_and_possibilities', 'img-top'),
(62, 'company_history_and_possibilities', 'img-main'),
(63, 'managment', 'img-top'),
(64, 'current_jobs', 'img-top'),
(65, 'responsibility_and_security', 'img-top'),
(66, 'managers', 'fio'),
(67, 'managers', 'post'),
(68, 'managers', 'tel'),
(69, 'managers', 'email'),
(70, 'vacancies', 'title'),
(71, 'vacancies', 'content-top'),
(72, 'news', 'title'),
(73, 'news', 'content-top'),
(74, 'news', 'createdAt'),
(75, 'news', 'isMain'),
(76, 'news', 'img-top'),
(77, 'news', 'img-main'),
(78, 'cargos', 'title'),
(79, 'cargos', 'meta-description'),
(80, 'cargos', 'meta-keywords'),
(81, 'cargos', 'content-top'),
(82, 'cargos', 'tech-data'),
(83, 'cargos', 'img-icon'),
(84, 'cargos', 'img-top'),
(85, 'transports', 'title'),
(86, 'transports', 'meta-description'),
(87, 'transports', 'meta-keywords'),
(88, 'transports', 'content-top'),
(90, 'transports', 'img-icon'),
(91, 'transports', 'img-top'),
(92, 'goods', 'title'),
(93, 'goods', 'content-top'),
(94, 'goods', 'isRed'),
(95, 'faq', 'title'),
(96, 'faq', 'content-top'),
(97, 'client', 'title'),
(98, 'client', 'meta-description'),
(99, 'client', 'meta-keywords'),
(100, 'client', 'content-top'),
(102, 'client', 'img-icon'),
(103, 'client', 'img-top'),
(104, 'partner', 'title'),
(105, 'partner', 'meta-description'),
(106, 'partner', 'meta-keywords'),
(107, 'partner', 'content-top'),
(109, 'partner', 'img-icon'),
(110, 'partner', 'img-top'),
(111, 'home', 'title'),
(112, 'home', 'meta-description'),
(113, 'home', 'meta-keywords');

-- --------------------------------------------------------

--
-- Структура таблицы `page_image`
--

CREATE TABLE IF NOT EXISTS `page_image` (
  `id` int(11) NOT NULL,
  `idPage` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `device` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `src` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ext` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `x` int(5) DEFAULT NULL,
  `y` int(5) DEFAULT NULL,
  `w` int(5) DEFAULT NULL,
  `h` int(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=212 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `page_image`
--

INSERT INTO `page_image` (`id`, `idPage`, `type`, `device`, `src`, `ext`, `x`, `y`, `w`, `h`) VALUES
(125, 1, 'img-top', 'source', 'company_history_and_possibilities-img-top-57f5e27bdfff8', 'jpg', 0, 0, 550, 359),
(128, 1, 'img-main', 'source', 'company_history_and_possibilities-img-main-57f5e27bea408', 'jpg', 0, 0, 1210, 359),
(131, 4, 'img-top', 'source', 'managment-img-top-57f5e289b15e0', 'jpg', 0, 0, 588, 359),
(132, 4, 'img-top', 'desktop', 'managment-img-top--desktop-57f5e289b3cf0', 'jpg', NULL, NULL, NULL, NULL),
(133, 4, 'img-top', 'mobile', 'managment-img-top--mobile-57f5e289b7f58', 'jpg', NULL, NULL, NULL, NULL),
(134, 21, 'img-top', 'source', 'news-img-top-57f5e34d0e521', 'jpg', 0, 0, 1359, 359),
(135, 21, 'img-top', 'desktop', 'news-img-top--desktop-57f5e34d10c32', 'jpg', NULL, NULL, NULL, NULL),
(136, 21, 'img-top', 'mobile', 'news-img-top--mobile-57f5e34d18d1d', 'jpg', NULL, NULL, NULL, NULL),
(137, 21, 'img-main', 'source', 'news-img-main-57f5e34d29aac', 'jpg', 0, 0, 400, 266),
(138, 21, 'img-main', 'desktop', 'news-img-main--desktop-57f5e34d2ae34', 'jpg', NULL, NULL, NULL, NULL),
(139, 21, 'img-main', 'mobile', 'news-img-main--mobile-57f5e34d2e4e6', 'jpg', NULL, NULL, NULL, NULL),
(140, 22, 'img-top', 'source', 'news-img-top-57f5e3be69f49', 'jpg', 0, 0, 1359, 287),
(143, 22, 'img-main', 'source', 'news-img-main-57f5e3be83593', 'jpg', 0, 0, 400, 266),
(154, 22, 'img-top', 'desktop', 'news-img-top--desktop-57f618678ea52', 'jpg', NULL, NULL, NULL, NULL),
(155, 22, 'img-top', 'mobile', 'news-img-top--mobile-57f618679730d', 'jpg', NULL, NULL, NULL, NULL),
(156, 22, 'img-main', 'desktop', 'news-img-main--desktop-57f61867a6544', 'jpg', NULL, NULL, NULL, NULL),
(157, 22, 'img-main', 'mobile', 'news-img-main--mobile-57f61867aa3c5', 'jpg', NULL, NULL, NULL, NULL),
(172, 23, 'img-icon', 'source', 'cargos-img-icon-57f622de52636', 'png', 0, 0, 697, 348),
(173, 23, 'img-icon', 'desktop', 'cargos-img-icon--desktop-57f622de53da6', 'png', NULL, NULL, NULL, NULL),
(174, 23, 'img-icon', 'mobile', 'cargos-img-icon--mobile-57f622de6723e', 'png', NULL, NULL, NULL, NULL),
(175, 23, 'img-top', 'source', 'cargos-img-top-57f622de7aabe', 'png', 0, 0, 60, 43),
(176, 23, 'img-top', 'desktop', 'cargos-img-top--desktop-57f622de7be46', 'png', NULL, NULL, NULL, NULL),
(177, 23, 'img-top', 'mobile', 'cargos-img-top--mobile-57f622de7e16e', 'png', NULL, NULL, NULL, NULL),
(178, 24, 'img-icon', 'source', 'cargos-img-icon-57f62690a620e', 'png', 0, 0, 697, 348),
(179, 24, 'img-icon', 'desktop', 'cargos-img-icon--desktop-57f62690a8536', 'png', NULL, NULL, NULL, NULL),
(180, 24, 'img-icon', 'mobile', 'cargos-img-icon--mobile-57f62690bc19e', 'png', NULL, NULL, NULL, NULL),
(181, 24, 'img-top', 'source', 'cargos-img-top-57f62690cea7e', 'png', 0, 0, 60, 43),
(182, 24, 'img-top', 'desktop', 'cargos-img-top--desktop-57f62690cfa1e', 'png', NULL, NULL, NULL, NULL),
(183, 24, 'img-top', 'mobile', 'cargos-img-top--mobile-57f62690d1d46', 'png', NULL, NULL, NULL, NULL),
(184, 25, 'img-icon', 'source', 'cargos-img-icon-57f6280642a11', 'png', 0, 0, 697, 348),
(185, 25, 'img-icon', 'desktop', 'cargos-img-icon--desktop-57f6280646896', 'png', NULL, NULL, NULL, NULL),
(186, 25, 'img-icon', 'mobile', 'cargos-img-icon--mobile-57f628065c070', 'png', NULL, NULL, NULL, NULL),
(187, 25, 'img-top', 'source', 'cargos-img-top-57f628066e967', 'png', 0, 0, 60, 43),
(188, 25, 'img-top', 'desktop', 'cargos-img-top--desktop-57f628066fcf0', 'png', NULL, NULL, NULL, NULL),
(189, 25, 'img-top', 'mobile', 'cargos-img-top--mobile-57f628067201b', 'png', NULL, NULL, NULL, NULL),
(190, 26, 'img-icon', 'source', 'cargos-img-icon-57f6283c909f5', 'png', 0, 0, 697, 348),
(191, 26, 'img-icon', 'desktop', 'cargos-img-icon--desktop-57f6283c93106', 'png', NULL, NULL, NULL, NULL),
(192, 26, 'img-icon', 'mobile', 'cargos-img-icon--mobile-57f6283cb6394', 'png', NULL, NULL, NULL, NULL),
(193, 26, 'img-top', 'source', 'cargos-img-top-57f6283cc9064', 'png', 0, 0, 60, 43),
(194, 26, 'img-top', 'desktop', 'cargos-img-top--desktop-57f6283cca004', 'png', NULL, NULL, NULL, NULL),
(195, 26, 'img-top', 'mobile', 'cargos-img-top--mobile-57f6283ccc32d', 'png', NULL, NULL, NULL, NULL),
(196, 27, 'img-icon', 'source', 'cargos-img-icon-57f6286353117', 'png', 0, 0, 697, 348),
(197, 27, 'img-icon', 'desktop', 'cargos-img-icon--desktop-57f6286357b51', 'png', NULL, NULL, NULL, NULL),
(198, 27, 'img-icon', 'mobile', 'cargos-img-icon--mobile-57f628636ac09', 'png', NULL, NULL, NULL, NULL),
(199, 27, 'img-top', 'source', 'cargos-img-top-57f628637d8d9', 'png', 0, 0, 60, 43),
(200, 27, 'img-top', 'desktop', 'cargos-img-top--desktop-57f628637e879', 'png', NULL, NULL, NULL, NULL),
(201, 27, 'img-top', 'mobile', 'cargos-img-top--mobile-57f6286380ba2', 'png', NULL, NULL, NULL, NULL),
(202, 28, 'img-icon', 'source', 'cargos-img-icon-57f628845f598', 'png', 0, 0, 697, 348),
(203, 28, 'img-icon', 'desktop', 'cargos-img-icon--desktop-57f6288461ca9', 'png', NULL, NULL, NULL, NULL),
(204, 28, 'img-icon', 'mobile', 'cargos-img-icon--mobile-57f6288474d61', 'png', NULL, NULL, NULL, NULL),
(205, 28, 'img-top', 'source', 'cargos-img-top-57f6288487260', 'png', 0, 0, 60, 43),
(206, 28, 'img-top', 'desktop', 'cargos-img-top--desktop-57f62884885e9', 'png', NULL, NULL, NULL, NULL),
(207, 28, 'img-top', 'mobile', 'cargos-img-top--mobile-57f628848a912', 'png', NULL, NULL, NULL, NULL),
(208, 1, 'img-top', 'desktop', 'company_history_and_possibilities-img-top--desktop-57f63e510e44d', 'jpg', NULL, NULL, NULL, NULL),
(209, 1, 'img-top', 'mobile', 'company_history_and_possibilities-img-top--mobile-57f63e511ab85', 'jpg', NULL, NULL, NULL, NULL),
(210, 1, 'img-main', 'desktop', 'company_history_and_possibilities-img-main--desktop-57f63e512cc95', 'jpg', NULL, NULL, NULL, NULL),
(211, 1, 'img-main', 'mobile', 'company_history_and_possibilities-img-main--mobile-57f63e514206d', 'jpg', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `page_lang`
--

CREATE TABLE IF NOT EXISTS `page_lang` (
  `id` int(11) NOT NULL,
  `idPage` int(11) NOT NULL,
  `lang` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `val` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=359 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `page_lang`
--

INSERT INTO `page_lang` (`id`, `idPage`, `lang`, `type`, `val`) VALUES
(7, 5, 'en', 'title', 'Current Jobs'),
(8, 5, 'ru', 'title', 'Текущие Вакансии'),
(9, 5, 'cn', 'title', '当前作业'),
(10, 6, 'en', 'title', 'Responsibility and security'),
(11, 6, 'ru', 'title', 'Ответственность и безопасность'),
(12, 6, 'cn', 'title', '责任和安全'),
(13, 7, 'en', 'title', 'Company news'),
(14, 7, 'ru', 'title', 'Новости компании'),
(15, 7, 'cn', 'title', '责任和安全'),
(16, 8, 'en', 'title', 'Cargo selection'),
(17, 8, 'ru', 'title', 'Выбор грузов'),
(18, 8, 'cn', 'title', '选货'),
(19, 9, 'en', 'title', 'Our route'),
(20, 9, 'ru', 'title', 'Наш маршрут'),
(21, 9, 'cn', 'title', '我们的路线'),
(22, 10, 'en', 'title', 'Sea, Inland, air service'),
(23, 10, 'ru', 'title', 'Морское, наземное, воздушное транспортировка'),
(24, 10, 'cn', 'title', '海，岛，航空服务'),
(25, 11, 'en', 'title', 'Dangerous goods'),
(26, 11, 'ru', 'title', 'Опасные грузы'),
(27, 11, 'cn', 'title', '危险物品'),
(28, 12, 'en', 'title', 'Your questions and our answers'),
(29, 12, 'ru', 'title', 'Ваши вопросы и наши ответы'),
(30, 12, 'cn', 'title', '您的问题，我们的答案'),
(31, 13, 'en', 'title', 'Our clients'),
(32, 13, 'ru', 'title', 'Наши клиенты'),
(33, 13, 'cn', 'title', '我们的客户'),
(34, 14, 'en', 'title', 'Our partners'),
(35, 14, 'ru', 'title', 'Наши партнеры'),
(36, 14, 'cn', 'title', '我们的合作伙伴'),
(194, 4, 'ru', 'title', 'Менеджмент'),
(195, 4, 'en', 'title', 'Managment'),
(279, 1, 'ru', 'title', 'История создания и возможности'),
(280, 1, 'en', 'title', 'Company history and possibilities'),
(281, 1, 'cn', 'title', '公司的历史和可能性'),
(282, 1, 'en', 'content-top', '<h4>10 years of hard work, success and grow</h4>Nlngbo Rul-speed International freight forwarders Ltd. Is a sea, air and land transport as an Integrated International freight forwarding companies. In 2005, the prototype of the company in Nlngbo; then, In the development of the SAR Shenzhen, vitality and charm of Shanghai, Qlngdao; today, Is planning to close to Ben Thanh Tlanjln and Xiamen, two of the sea.<h4></h4>'),
(283, 1, 'en', 'content-main', '<p>Nlngbo Rul-speed international freight forwarders Ltd. Is a sea. air and land transport as an Integrated International freight forwarding companies. In 2005, the prototype of the company In Nlngbo; then, In the development of the SAR Shenzhen, vitality and charm of Shanghai, Qlngdao; today, Is planning to close to Ben Thanh Tianjin and Xiamen, two of the sea.</p><p>Our company has the right to direct booking and comprehensive global agency network, with operations in every corner of the world, where the core business Is focused on romantic European Russia. Britain. France, Finland. Spain, as well as Southeast Asia. Thailand. Malaysia, Vietnam and the Philippines and other countries exotic, as well as the United States, the Middle East and Australia, totaling about It, there are a total of Division I business relationships with more than 50 countries.</p><p>After five years of growth, our company has been formed FCL (FCL), LCL (LCL) import and export freight forwarders, air cargo Import and export freight forwarders, container Inland transportation and door to door service, customs clearance services in Eastern Europe and Russia. Continental bridge transport services and customs declaration, inspection, insurance agents, etc. all aspects of logistics service system, and a determined effort from the coast Into the Inland city of the Chinese coast, out Nelxlu China, to the wider world and become a link global freight forwarders people trusted to provide door to door transport services.</p><div><div><p>Our advantage routes In Europe, the Middle East. Southeast Asia and the United States, with many world-renowned shipping companies have a direct relationship, now has fixed more than 2.000 customers, it Is expected to export proxy container 30000 TEU, annual import agent container 5000 TEU. The company has been adhering to the \\\\\\\\"service to win customers, In good faith pool staff, web development enterprise\\\\\\\\" business philosophy to \\\\\\\\"the development of modern logistics industry\\\\\\\\" as its mission, with the leading edge services and national logistics service system, is seeking a pragmatic Hony Endeavour, honesty, practical, ambitious and dedicated to provide \\\\\\\\"safe, efficient, economic and thoughtful\\\\\\\\" first-class service to our customers around the world.</p></div></div>'),
(284, 1, 'ru', 'meta-description', ''),
(285, 1, 'ru', 'meta-keywords', ''),
(286, 1, 'ru', 'content-top', '<h4>10 лет напряженной работы, успеха и роста</h4>Nlngbo Rul-ступенчатая коробка передач Международные экспедиторы Ltd. Является морской, воздушный и наземный транспорт в качестве комплексной международной транспортно-экспедиторских компаний. В 2005 году прототип компании в Nlngbo; Затем, в развитии SAR Шэньчжэнь, жизненной силы и очарование Шанхая, Qlngdao; сегодня, планирует закрыть Бен Тхань Tlanjln и Сямэнь, два моря.'),
(287, 1, 'ru', 'content-main', '<p>Nlngbo Rul-ступенчатая коробка передач международные экспедиторы Ltd. Является море. воздушного и наземного транспорта в комплексной международной транспортно-экспедиторских компаний. В 2005 году прототип компании В Nlngbo; Затем, в развитии SAR Шэньчжэнь, жизненной силы и очарование Шанхая, Qlngdao; сегодня, планирует закрыть Бен Тхань Тяньцзинь и Сямэнь, два моря.</p><p>Наша компания имеет право на прямое бронирование и всеобъемлющую глобальную агентскую сеть, с операциями в каждом уголке мира, где основной бизнес сосредоточен на романтическом европейской части России. Британия. Франция, Финляндия. Испания, а также Юго-Восточной Азии. Таиланд. Малайзии, Вьетнаме и на Филиппинах и в других странах экзотические, а также Соединенные Штаты Америки, Ближнего Востока и Австралии, в общей сложности об этом, есть в общей сложности деловых отношений Отдел I с более чем 50 странах мира.</p><p>После пяти лет роста, наша компания была образована FCL (FCL), LCL (LCL) импорта и экспорта экспедиторы, авиагруз Импорт и экспорт экспедиторы, контейнерные внутренние перевозки и двери к двери обслуживание, услуги по таможенному оформлению в Восточной Европе и Россия. Континентальный мост транспортные услуги и таможенная декларация, инспекции, страховые агенты и т.д. все аспекты системы логистических услуг, а также решительные усилия от побережья в город внутренних китайского побережья, из Nelxlu Китая, к более широкому миру и стать связующим звеном глобальные экспедиторы люди доверяют, чтобы обеспечить двери до двери транспортных услуг.</p><div><p>Наше преимущество маршрутов в Европе, на Ближнем Востоке. Юго-Восточной Азии и США, со многими всемирно известных судоходных компаний имеют прямое отношение, в настоящее время зафиксировала более 2000 клиентов, предполагается экспортировать прокси-контейнер 30000 TEU, годовой импорт агента контейнера 5000 TEU. Компания была придерживаясь \\\\\\\\ "службы, чтобы выиграть клиентов, в хорошем персонала вера бассейн, веб-разработки предприятия \\\\\\\\" философия бизнеса к \\\\\\\\ "Развитие современной индустрии логистики \\\\\\\\" в качестве своей миссии, с передовыми услугами и национальной системы службы материально-технического обеспечения, ищет прагматичную HONY Endeavour, честность, практический, амбициозный и посвященный предоставить \\\\\\\\ "безопасное, эффективное, экономическое и вдумчивый \\\\\\\\" первого класс обслуживания для наших клиентов по всему миру.</p></div>'),
(288, 15, 'en', 'title', 'Home'),
(289, 15, 'ru', 'title', 'Главная'),
(290, 15, 'cn', 'title', '家'),
(291, 15, 'ru', 'meta-description', ''),
(292, 15, 'ru', 'meta-keywords', ''),
(293, 4, 'en', 'meta-description', ''),
(294, 4, 'en', 'meta-keywords', ''),
(295, 4, 'en', 'content-top', '<h4>Together we make your business more efficient</h4><span>Ningbo Rui-speed international freight forwarders Ltd. is a sea, air and land transport as an integrated international freight forwarding companies. In 2005, the prototype of the company in Ningbo; then, in the development of the SAR Shenzhen, vitality and charm of Shanghai, Qingdao; today, is planning to close to Ben Thanh Tianjin and Xiamen, two of the sea.</span>'),
(296, 4, 'en', 'content-main', '<p>Nlngbo Ru)-speed International freight forwarders Ltd. Is a sea, air and land transport as an Integrated International freight forwarding companies. In 2005. the prototype of the company In Nlngbo; then. In the development of the SAR Shenzhen, vitality and charm of Shanghai, Qlngdao; today, is planning to close to Ben Thanh Tlanjln and Xiamen, two of the sea.</p><p>Our company has the right to direct booking and comprehensive global agency network, with operations In every corner of the world, where the core business Is focused on romantic European Russia, Britain. France, Finland, Spain, as well as Southeast Asia, Thailand, Malaysia, Vietnam and the Philippines and other countries exotic, as well as the United States, the Middle East and Australia, totaling about It. there are a total of Division I business relationships with more than 50 countries.</p>'),
(297, 4, 'ru', 'meta-description', ''),
(298, 4, 'ru', 'meta-keywords', ''),
(299, 4, 'ru', 'content-top', '<h4>Вместе мы можем сделать свой бизнес более эффективным</h4>Ningbo Руи-ступенчатая коробка передач международная транспортно-экспедиторских Ltd. является морской, воздушный и наземный транспорт в качестве интегрированных международных транспортно-экспедиторских компаний. В 2005 году прототип компании в Нинбо; затем, в развитии SAR Шэньчжэнь, жизненной силы и очарования Шанхай, Циндао; сегодня планирует закрыть Бен Тхань Тяньцзинь и Сямэнь, два моря.'),
(300, 4, 'ru', 'content-main', '<p>Nlngbo Ru) -скоростной международных экспедиторов Лтд является морской, воздушный и наземный транспорт в качестве комплексной международной транспортно-экспедиторских компаний. В 2005 году прототип компании В Nlngbo; тогда. В развитии SAR Шэньчжэнь, жизненной силы и очарование Шанхая, Qlngdao; сегодня планирует закрыть Бен Тхань Tlanjln и Сямэнь, два моря.</p><p>Наша компания имеет право на прямое бронирование и всеобъемлющую глобальную агентскую сеть, с операциями в каждом уголке мира, где основной бизнес сосредоточен на романтическом европейской части России, Великобритании. Франция, Финляндия, Испания, а также Юго-Восточной Азии, Таиланде, Малайзии, Вьетнаме и на Филиппинах и в других странах, экзотических, а также Соединенных Штатов Америки, Ближнего Востока и Австралии, в общей сложности об этом. Есть в общей сложности деловых отношений Отдел I с более чем 50 странах мира.</p>'),
(301, 17, 'i18n', 'fio', 'Имя человека'),
(302, 17, 'en', 'post', 'export and import director'),
(303, 17, 'i18n', 'tel', '574-87259554'),
(304, 17, 'i18n', 'email', 'l@incomoro.hk'),
(305, 18, 'i18n', 'fio', 'Имя человека'),
(306, 18, 'en', 'post', 'export and import director'),
(307, 18, 'i18n', 'tel', '574-87259554 '),
(308, 18, 'i18n', 'email', 'l@incomoro.hk'),
(309, 19, 'i18n', 'fio', 'Имя человека1'),
(310, 19, 'en', 'post', 'export and import director'),
(311, 19, 'i18n', 'tel', '213123123213'),
(312, 19, 'i18n', 'email', 'l@incomoro.hk'),
(313, 20, 'i18n', 'fio', 'Имя человека'),
(314, 20, 'en', 'post', 'export and import director'),
(315, 20, 'i18n', 'tel', '574-87259554'),
(316, 20, 'i18n', 'email', 'l@incomoro.hk'),
(317, 20, 'ru', 'post', 'экспорт и импорт директор1'),
(318, 19, 'ru', 'post', 'экспорт и импорт директор'),
(319, 18, 'ru', 'post', 'экспорт и импорт директор'),
(320, 17, 'ru', 'post', 'экспорт и импорт директор'),
(321, 21, 'ru', 'title', 'Rusal and Maersk Line  announce long-term  cooperation'),
(322, 21, 'ru', 'content-top', '<p>Ningbo Rui-speed international freight forwarders Ltd. is a sea, air and land transport as an integrated international freight forwarding companies. In 2005, the prototype of the company in Ningbo; then, in the development of the SAR Shenzhen, vitality and charm of Shanghai, Qingdao; today, is planning to close to Ben Thanh Tianjin and Xiamen, two of the sea.</p><p>Our company has the right to direct booking and comprehensive global agency network, with operations in every corner of the world, where the core business is focused on romantic European Russia, Britain, France, Finland, Spain, as well as Southeast Asia, Thailand, Malaysia, Vietnam and the Philippines and other countries exotic, as well as the United States, the Middle East and Australia, totaling about it, there are a total of Division I business relationships with more than 50 countries.</p><p>After five years of growth, our company has been formed FCL (FCL), LCL (LCL) import and export freight forwarders, air cargo import and export freight forwarders, container inland transportation and door to door service, customs clearance services in Eastern Europe and Russia, Continental bridge transport services and customs declaration, inspection, insurance agents, etc. all aspects of logistics service system, and a determined effort from the coast into the inland city of the Chinese coast, out Neixiu China, to the wider world and become a link global freight forwarders people trusted to provide door to door transport services.</p>'),
(323, 21, 'i18n', 'createdAt', '5 October, 2016'),
(324, 21, 'i18n', 'isMain', '1'),
(325, 22, 'ru', 'title', 'Rusal and Maersk Line <br> announce long-term  <br> cooperation'),
(326, 22, 'ru', 'content-top', '<p>Ningbo Rui-speed international freight forwarders Ltd. is a sea, air and land transport as an integrated international freight forwarding companies. In 2005, the prototype of the company in Ningbo; then, in the development of the SAR Shenzhen, vitality and charm of Shanghai, Qingdao; today, is planning to close to Ben Thanh Tianjin and Xiamen, two of the sea.</p><p>Our company has the right to direct booking and comprehensive global agency network, with operations in every corner of the world, where the core business is focused on romantic European Russia, Britain, France, Finland, Spain, as well as Southeast Asia, Thailand, Malaysia, Vietnam and the Philippines and other countries exotic, as well as the United States, the Middle East and Australia, totaling about it, there are a total of Division I business relationships with more than 50 countries.</p><p>After five years of growth, our company has been formed FCL (FCL), LCL (LCL) import and export freight forwarders, air cargo import and export freight forwarders, container inland transportation and door to door service, customs clearance services in Eastern Europe and Russia, Continental bridge transport services and customs declaration, inspection, insurance agents, etc. all aspects of logistics service system, and a determined effort from the coast into the inland city of the Chinese coast, out Neixiu China, to the wider world and become a link global freight forwarders people trusted to provide door to door transport services.</p>'),
(327, 22, 'i18n', 'createdAt', '5 October, 2016'),
(328, 22, 'i18n', 'isMain', '1'),
(329, 23, 'ru', 'title', 'Dry Van'),
(330, 23, 'ru', 'meta-description', ''),
(331, 23, 'ru', 'meta-keywords', ''),
(332, 23, 'ru', 'content-top', '<p>Dry Van (In other words the ''General Purpose'' container) like all other types of containers Is the standardized multlreusable tare Intended for transportation of goods by highway, railway, sea and airtransport.</p><p>The main convenience of any container Is Its Intermodallty - I.e. possibility of change of the mode of transportation without reloading a cargo from one container to another. Dry Van Is Intended for transportation of commodities In bundles, cartons and boxes, loose cargo, bulk, furniture, etc.</p>'),
(333, 23, 'ru', 'tech-data', '<ul><li><p>20-feet: length&nbsp;-5.902 м.</p><p>width&nbsp;- 2,350 м.</p><p>height&nbsp;- 2,392 м.</p><p>max. payload&nbsp;-21,8/28,23 tons,</p><p>capacity&nbsp;- 33,2 м3</p></li>&nbsp;<li><p>40-feet:&nbsp;length - 12,032 м,</p><p>width&nbsp;- 2.350 м.</p><p>height&nbsp;- 2,390 м,</p><p>max. payload&nbsp;-26,68/28,7 tons.</p><p>capacity&nbsp;- 67,6 м3</p></li></ul>'),
(334, 24, 'ru', 'title', 'Dry Van'),
(335, 24, 'ru', 'meta-description', ''),
(336, 24, 'ru', 'meta-keywords', ''),
(337, 24, 'ru', 'content-top', 'Dry Van (In other words the ''General Purpose'' container) like all other types of containers Is the standardized multlreusable tare Intended for transportation of goods by highway, railway, sea and airtransport.The main convenience of any container Is Its Intermodallty - I.e. possibility of change of the mode of transportation without reloading a cargo from one container to another. Dry Van Is Intended for transportation of commodities In bundles, cartons and boxes, loose cargo, bulk, furniture'),
(338, 24, 'ru', 'tech-data', 'Dry Van (In other words the ''General Purpose'' container) like all other types of containers Is the standardized multlreusable tare Intended for transportation of goods by highway, railway, sea and airtransport.The main convenience of any container Is Its Intermodallty - I.e. possibility of change of the mode of transportation without reloading a cargo from one container to another. Dry Van Is Intended for transportation of commodities In bundles, cartons and boxes, loose cargo, bulk, furniture'),
(339, 25, 'ru', 'title', 'Dry Van'),
(340, 25, 'ru', 'meta-description', ''),
(341, 25, 'ru', 'meta-keywords', ''),
(342, 25, 'ru', 'content-top', 'Dry Van (In other words the ''General Purpose'' container) like all other types of containers Is the standardized multlreusable tare Intended for transportation of goods by highway, railway, sea and airtransport.The main convenience of any container Is Its Intermodallty - I.e. possibility of change of the mode of transportation without reloading a cargo from one container to another. Dry Van Is Intended for transportation of commodities In bundles, cartons and boxes, loose cargo, bulk, furniture&nbsp;'),
(343, 25, 'ru', 'tech-data', 'Dry Van (In other words the ''General Purpose'' container) like all other types of containers Is the standardized multlreusable tare Intended for transportation of goods by highway, railway, sea and airtransport.The main convenience of any container Is Its Intermodallty - I.e. possibility of change of the mode of transportation without reloading a cargo from one container to another. Dry Van Is Intended for transportation of commodities In bundles, cartons and boxes, loose cargo, bulk, furniture&nbsp;'),
(344, 26, 'ru', 'title', 'Dry Van'),
(345, 26, 'ru', 'meta-description', ''),
(346, 26, 'ru', 'meta-keywords', ''),
(347, 26, 'ru', 'content-top', 'Dry Van (In other words the ''General Purpose'' container) like all other types of containers Is the standardized multlreusable tare Intended for transportation of goods by highway, railway, sea and airtransport.The main convenience of any container Is Its Intermodallty - I.e. possibility of change of the mode of transportation without reloading a cargo from one container to another. Dry Van Is Intended for transportation of commodities In bundles, cartons and boxes, loose cargo, bulk, furniture&nbsp;'),
(348, 26, 'ru', 'tech-data', 'Dry Van (In other words the ''General Purpose'' container) like all other types of containers Is the standardized multlreusable tare Intended for transportation of goods by highway, railway, sea and airtransport.The main convenience of any container Is Its Intermodallty - I.e. possibility of change of the mode of transportation without reloading a cargo from one container to another. Dry Van Is Intended for transportation of commodities In bundles, cartons and boxes, loose cargo, bulk, furniture&nbsp;'),
(349, 27, 'ru', 'title', 'Dry Van'),
(350, 27, 'ru', 'meta-description', ''),
(351, 27, 'ru', 'meta-keywords', ''),
(352, 27, 'ru', 'content-top', 'Dry Van (In other words the ''General Purpose'' container) like all other types of containers Is the standardized multlreusable tare Intended for transportation of goods by highway, railway, sea and airtransport.The main convenience of any container Is Its Intermodallty - I.e. possibility of change of the mode of transportation without reloading a cargo from one container to another. Dry Van Is Intended for transportation of commodities In bundles, cartons and boxes, loose cargo, bulk, furniture&nbsp;'),
(353, 27, 'ru', 'tech-data', 'Dry Van (In other words the ''General Purpose'' container) like all other types of containers Is the standardized multlreusable tare Intended for transportation of goods by highway, railway, sea and airtransport.The main convenience of any container Is Its Intermodallty - I.e. possibility of change of the mode of transportation without reloading a cargo from one container to another. Dry Van Is Intended for transportation of commodities In bundles, cartons and boxes, loose cargo, bulk, furniture&nbsp;'),
(354, 28, 'ru', 'title', 'Dry Van'),
(355, 28, 'ru', 'meta-description', ''),
(356, 28, 'ru', 'meta-keywords', ''),
(357, 28, 'ru', 'content-top', 'Dry Van (In other words the ''General Purpose'' container) like all other types of containers Is the standardized multlreusable tare Intended for transportation of goods by highway, railway, sea and airtransport.The main convenience of any container Is Its Intermodallty - I.e. possibility of change of the mode of transportation without reloading a cargo from one container to another. Dry Van Is Intended for transportation of commodities In bundles, cartons and boxes, loose cargo, bulk, furniture&nbsp;'),
(358, 28, 'ru', 'tech-data', 'Dry Van (In other words the ''General Purpose'' container) like all other types of containers Is the standardized multlreusable tare Intended for transportation of goods by highway, railway, sea and airtransport.The main convenience of any container Is Its Intermodallty - I.e. possibility of change of the mode of transportation without reloading a cargo from one container to another. Dry Van Is Intended for transportation of commodities In bundles, cartons and boxes, loose cargo, bulk, furniture&nbsp;');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` tinyint(3) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `val` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'XaQFqmmIzWse3zjGUR7nOZ4TfhI3UIyW', '$2y$13$u.4MgIhMdC62rQ9hIC634ucuNjc0B.jL/n2nQiu0iRdN7x/TtzGOK', '', 'admin@email.com', 10, 1475080941, 1475080941);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category_lang`
--
ALTER TABLE `category_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_idCategory_9493_00` (`idCategory`),
  ADD KEY `idx_idCategory_9493_01` (`idCategory`);

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_idCountry_9523_02` (`idCountry`);

--
-- Индексы таблицы `city_lang`
--
ALTER TABLE `city_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_idCity_9693_03` (`idCity`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `country_lang`
--
ALTER TABLE `country_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_idCountry_9933_04` (`idCountry`);

--
-- Индексы таблицы `field`
--
ALTER TABLE `field`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_alias_0003_05` (`alias`);

--
-- Индексы таблицы `field_lang`
--
ALTER TABLE `field_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_idField_0023_06` (`idField`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_idCategory_0053_07` (`idCategory`),
  ADD KEY `idx_alias_0053_08` (`alias`);

--
-- Индексы таблицы `page_field`
--
ALTER TABLE `page_field`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_aliasPage_0083_09` (`aliasPage`),
  ADD KEY `idx_aliasField_0083_10` (`aliasField`),
  ADD KEY `idx_aliasPage_0083_11` (`aliasPage`),
  ADD KEY `idx_aliasField_0083_12` (`aliasField`);

--
-- Индексы таблицы `page_image`
--
ALTER TABLE `page_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_idPage_0113_13` (`idPage`);

--
-- Индексы таблицы `page_lang`
--
ALTER TABLE `page_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_idPage_0273_14` (`idPage`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_UNIQUE_username_0323_15` (`username`),
  ADD UNIQUE KEY `idx_UNIQUE_email_0323_16` (`email`),
  ADD UNIQUE KEY `idx_UNIQUE_password_reset_token_0323_17` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `category_lang`
--
ALTER TABLE `category_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `city_lang`
--
ALTER TABLE `city_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `country_lang`
--
ALTER TABLE `country_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `field`
--
ALTER TABLE `field`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `field_lang`
--
ALTER TABLE `field_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT для таблицы `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT для таблицы `page_field`
--
ALTER TABLE `page_field`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT для таблицы `page_image`
--
ALTER TABLE `page_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=212;
--
-- AUTO_INCREMENT для таблицы `page_lang`
--
ALTER TABLE `page_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=359;
--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `category_lang`
--
ALTER TABLE `category_lang`
  ADD CONSTRAINT `fk_category_9493_00` FOREIGN KEY (`idCategory`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `fk_country_9513_01` FOREIGN KEY (`idCountry`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `city_lang`
--
ALTER TABLE `city_lang`
  ADD CONSTRAINT `fk_city_9683_02` FOREIGN KEY (`idCity`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `country_lang`
--
ALTER TABLE `country_lang`
  ADD CONSTRAINT `fk_country_9923_03` FOREIGN KEY (`idCountry`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `field_lang`
--
ALTER TABLE `field_lang`
  ADD CONSTRAINT `fk_field_0023_04` FOREIGN KEY (`idField`) REFERENCES `field` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `fk_category_0053_05` FOREIGN KEY (`idCategory`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `page_image`
--
ALTER TABLE `page_image`
  ADD CONSTRAINT `fk_page_0113_06` FOREIGN KEY (`idPage`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `page_lang`
--
ALTER TABLE `page_lang`
  ADD CONSTRAINT `fk_page_0273_07` FOREIGN KEY (`idPage`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
