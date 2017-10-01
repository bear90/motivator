-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Хост: mysql5.activeby.net
-- Время создания: Окт 01 2017 г., 06:13
-- Версия сервера: 5.5.52
-- Версия PHP: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `user2034796_penkiby_dev`
--

-- --------------------------------------------------------

--
-- Структура таблицы `configuration`
--

DROP TABLE IF EXISTS `configuration`;
CREATE TABLE IF NOT EXISTS `configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` enum('string','integer','array','float') NOT NULL,
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_code`
--

DROP TABLE IF EXISTS `tbl_code`;
CREATE TABLE IF NOT EXISTS `tbl_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expiredAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '1',
  `hidden` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Дамп данных таблицы `tbl_code`
--

INSERT INTO `tbl_code` (`id`, `code`, `comment`, `createdAt`, `expiredAt`, `deleted`, `type`, `hidden`) VALUES
(20, 'ka7N96', NULL, '2017-07-31 06:22:37', '2017-08-07 06:22:53', 1, 1, 1),
(32, 'aL99u0', NULL, '2017-08-08 17:49:00', '2017-10-17 22:49:17', 0, 1, 0),
(33, 'Bm755b', NULL, '2017-08-08 17:49:00', '2017-10-17 22:49:17', 0, 1, 0),
(34, 'wg3J78', NULL, '2017-08-08 17:49:00', '2017-10-17 22:49:17', 0, 1, 0),
(35, '288qQe', NULL, '2017-08-08 17:49:00', '2017-10-17 22:49:17', 0, 1, 0),
(36, '835xgk', NULL, '2017-08-08 17:49:00', '2017-10-17 22:49:17', 0, 1, 0),
(37, '39VLC9', NULL, '2017-08-08 17:49:00', '2017-10-17 22:49:17', 0, 1, 0),
(38, 'Vu2A75', NULL, '2017-08-08 17:49:00', '2017-10-17 22:49:17', 0, 1, 0),
(39, 'W1A3p6', NULL, '2017-08-08 17:49:00', '2017-10-17 22:49:17', 0, 1, 0),
(40, '735Tuz', NULL, '2017-08-08 17:49:00', '2017-10-17 22:49:17', 0, 1, 0),
(41, 'e7Dn43', NULL, '2017-08-08 17:49:00', '2017-10-17 22:49:17', 0, 1, 0),
(42, 'e0ER91', NULL, '2017-08-08 17:49:00', '2017-10-17 22:49:17', 0, 1, 0),
(43, '3I4u5Q', NULL, '2017-08-08 17:49:00', '2017-10-17 22:49:17', 0, 1, 0),
(44, '4ITy13', NULL, '2017-08-08 17:49:00', '2017-10-17 22:49:17', 0, 1, 0),
(45, 'tbL177', NULL, '2017-08-08 17:49:00', '2017-10-17 22:49:17', 0, 1, 0),
(46, 'e99L1c', NULL, '2017-08-08 17:49:00', '2017-10-17 22:49:17', 0, 1, 0),
(47, '178glf', NULL, '2017-08-08 17:49:00', '2017-10-17 22:49:17', 0, 1, 0),
(48, 'Z709Tp', NULL, '2017-08-08 17:49:00', '2017-10-17 22:49:17', 0, 1, 0),
(49, '75JPA7', NULL, '2017-08-08 17:49:00', '2017-10-17 22:49:17', 0, 1, 0),
(50, 'vPG581', NULL, '2017-08-08 17:49:00', '2017-10-17 22:49:17', 0, 1, 0),
(51, 'vGm140', NULL, '2017-08-08 17:49:00', '2017-10-17 22:49:17', 0, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_configuration`
--

DROP TABLE IF EXISTS `tbl_configuration`;
CREATE TABLE IF NOT EXISTS `tbl_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` enum('string','integer','array','float') NOT NULL,
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Дамп данных таблицы `tbl_configuration`
--

INSERT INTO `tbl_configuration` (`id`, `name`, `type`, `value`) VALUES
(1, 'FIRST_NOTICE_TERM', 'integer', '5'),
(2, 'SITE_DOMAIN', 'string', 'http://www.test.penki.by'),
(3, 'SECOND_NOTICE_TERM', 'integer', '6'),
(5, 'LAST_NOTICE_TERM', 'integer', '7'),
(7, 'TASK_PROLONG_TERM', 'integer', '7'),
(9, 'CODE_PHONE_LIVE_TIME', 'integer', '2'),
(8, 'CODE_LIVE_TIME', 'integer', '1685'),
(10, 'SLIDE_SHOWING_TIME_1', 'integer', '2'),
(11, 'SLIDE_SHOWING_TIME_2', 'integer', '4'),
(12, 'SLIDE_SHOWING_TIME_3', 'integer', '4'),
(13, 'SLIDE_SHOWING_TIME_4', 'integer', '4'),
(14, 'SLIDE_SHOWING_TIME_5', 'integer', '5'),
(15, 'SLIDE_SHOWING_TIME_6', 'integer', '4'),
(16, 'SLIDE_SHOWING_TIME_7', 'integer', '3'),
(17, 'SLIDE_SHOWING_TIME_8', 'integer', '5'),
(18, 'SLIDE_SHOWING_TIME_9', 'integer', '4'),
(19, 'SLIDE_SHOWING_TIME_10', 'integer', '3'),
(20, 'SLIDE_SHOWING_TIME_11', 'integer', '3'),
(21, 'SLIDE_SHOWING_TIME_12', 'integer', '3'),
(22, 'SLIDE_SHOWING_TIME_13', 'integer', '3'),
(23, 'SLIDE_SHOWING_TIME_14', 'integer', '4'),
(24, 'SLIDE_SHOWING_TIME_15', 'integer', '4'),
(25, 'SLIDE_SHOWING_TIME_16', 'integer', '4'),
(26, 'SLIDE_SHOWING_TIME_17', 'integer', '2'),
(27, 'SLIDE_SHOWING_TIME_18', 'integer', '2'),
(28, 'SLIDE_SHOWING_TIME_19', 'integer', '2'),
(29, 'SLIDE_SHOWING_TIME_20', 'integer', '2'),
(30, 'SLIDE_SHOWING_TIME_21', 'integer', '6'),
(31, 'SLIDE_SHOWING_TIME_22', 'integer', '4'),
(32, 'SLIDE_SHOWING_TIME_23', 'integer', '2'),
(33, 'SLIDE_SHOWING_TIME_24', 'integer', '2'),
(34, 'SLIDE_SHOWING_TIME_25', 'integer', '2'),
(35, 'SLIDE_SHOWING_TIME_26', 'integer', '2'),
(36, 'SLIDE_SHOWING_TIME_27', 'integer', '5'),
(37, 'SLIDE_SHOWING_TIME_28', 'integer', '6'),
(38, 'SLIDE_SHOWING_TIME_29', 'integer', '3'),
(39, 'SLIDE_SHOWING_TIME_30', 'integer', '5'),
(40, 'SLIDE_SHOWING_TIME_31', 'integer', '5'),
(41, 'SLIDE_SHOWING_TIME_32', 'integer', '5'),
(42, 'SLIDE_SHOWING_TIME_33', 'integer', '9'),
(43, 'SLIDE_SHOWING_TIME_34', 'integer', '3'),
(44, 'SLIDE_SHOWING_TIME_35', 'integer', '3'),
(45, 'SLIDE_SHOWING_TIME_36', 'integer', '3'),
(46, 'SLIDE_SHOWING_TIME_37', 'integer', '3'),
(47, 'SLIDE_SHOWING_TIME_38', 'integer', '3'),
(48, 'SLIDE_SHOWING_TIME_39', 'integer', '3'),
(49, 'SLIDE_SHOWING_TIME_40', 'integer', '3');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_country`
--

DROP TABLE IF EXISTS `tbl_country`;
CREATE TABLE IF NOT EXISTS `tbl_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=120 ;

--
-- Дамп данных таблицы `tbl_country`
--

INSERT INTO `tbl_country` (`id`, `name`) VALUES
(1, 'Абхазия'),
(2, 'Австралия'),
(3, 'Австрия'),
(4, 'Азербайджан'),
(5, 'Албания'),
(6, 'Андорра'),
(7, 'Аргентина'),
(8, 'Армения'),
(9, 'Багамские острова'),
(10, 'Барбадос'),
(11, 'Беларусь'),
(12, 'Бельгия'),
(13, 'Бермудские острова'),
(14, 'Болгария'),
(15, 'Босния и Герцеговина'),
(16, 'Бразилия'),
(17, 'Ватикан'),
(18, 'Великобритания'),
(19, 'Венгрия'),
(20, 'Венесуэла'),
(21, 'Вьетнам'),
(22, 'Гаити'),
(23, 'Германия'),
(24, 'Гонконг'),
(25, 'Гренландия'),
(26, 'Греция'),
(27, 'Грузия'),
(28, 'Дания'),
(29, 'Доминикана'),
(30, 'Египет'),
(31, 'Израиль'),
(32, 'Индия'),
(33, 'Индонезия'),
(34, 'Иордания'),
(35, 'Иран'),
(36, 'Ирландия'),
(37, 'Исландия'),
(38, 'Испания'),
(39, 'Италия'),
(40, 'Казахстан'),
(41, 'Каймановы острова'),
(42, 'Камбоджа'),
(43, 'Канада'),
(44, 'Катар'),
(45, 'Кипр'),
(46, 'Китай'),
(47, 'Корея'),
(48, 'Крым'),
(49, 'Куба'),
(50, 'Кыргызстан'),
(51, 'Лаос'),
(52, 'Латвия'),
(53, 'Литва'),
(54, 'Лихтенштейн'),
(55, 'Люксембург'),
(56, 'Маврикий'),
(57, 'Мадагаскар'),
(58, 'Македония'),
(59, 'Малайзия'),
(60, 'Мальдивы'),
(61, 'Мальта'),
(62, 'Марокко'),
(63, 'Мартиника'),
(64, 'Мексика'),
(65, 'Мозамбик'),
(66, 'Молдова'),
(67, 'Монако'),
(68, 'Монголия'),
(69, 'Мьянма'),
(70, 'Непал'),
(71, 'Нидерланды'),
(72, 'Новая Зеландия'),
(73, 'Норвегия'),
(74, 'ОАЭ'),
(75, 'Оман'),
(76, 'Панама'),
(77, 'Парагвай'),
(78, 'Перу'),
(79, 'Польша'),
(80, 'Португалия'),
(81, 'Россия'),
(82, 'Румыния'),
(83, 'Сейшелы'),
(84, 'Сербия'),
(85, 'Сингапур'),
(86, 'Сирия'),
(87, 'Словакия'),
(88, 'Словения'),
(89, 'США'),
(90, 'Таджикистан'),
(91, 'Таиланд'),
(92, 'Тайвань'),
(93, 'Тибет'),
(94, 'Тунис'),
(95, 'Туркменистан'),
(96, 'Турция'),
(97, 'Узбекинстан'),
(98, 'Украина'),
(99, 'Фиджи'),
(100, 'Филлипины'),
(101, 'Финляндия'),
(102, 'Франция'),
(103, 'Хорватия'),
(104, 'Черногория'),
(105, 'Чехия'),
(106, 'Чили'),
(107, 'Швейцария'),
(108, 'Швеция'),
(109, 'Шотландия'),
(110, 'Шри Ланка'),
(111, 'Эквадор'),
(112, 'Эстония'),
(113, 'ЮАР'),
(114, 'Ямайка'),
(115, 'Япония'),
(118, 'Голландия'),
(119, 'Южная Корея');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_feedback`
--

DROP TABLE IF EXISTS `tbl_feedback`;
CREATE TABLE IF NOT EXISTS `tbl_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `text` text,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_feedback_userId` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `userId`, `text`, `createdAt`) VALUES
(1, 1, 'Первый отзыв', '2017-09-17 06:44:15'),
(2, 1, 'Ответ от Михаила', '2017-09-17 07:01:51'),
(3, 1, 'Ответ.', '2017-09-17 07:03:17'),
(5, 1, 'Я не верю ни в какие посреднические сервисы!!!', '2017-09-17 07:09:49'),
(6, 1, 'ОК-2.', '2017-09-17 07:10:11'),
(8, 1, 'ОК_4', '2017-09-17 07:15:12'),
(9, 1, 'Не захотел!', '2017-09-17 09:51:18'),
(10, 1, 'Не было времени.', '2017-09-18 04:35:41');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_migration`
--

DROP TABLE IF EXISTS `tbl_migration`;
CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1497111552),
('m160302_145642_structure', 1497111554),
('m170610_133158_create_task_table', 1497111554),
('m170623_185955_create_tbl_user', 1498279860),
('m170624_033948_create_configuration_table', 1498279860),
('m170624_083928_create_offer_table', 1498405188),
('m170625_141628_alter_task_table', 1498405188),
('m170626_040008_alter_offer_table', 1498538464),
('m170628_152624_alter_offer_table', 1498664882),
('m170630_040703_create_temlate_table', 1498796807),
('m170703_054601_alter_table_task', 1499063273),
('m170709_063431_alter_table_task_add_prolong_date', 1499749465),
('m170712_210251_create_table_code', 1499982783),
('m170716_062843_alter_table_offer', 1500267196),
('m170718_041845_alter_table_offer', 1500352334),
('m170719_050026_alter_table_code', 1500441774),
('m170727_041751_alter_table_code', 1501131078),
('m170731_203737_alter_table_task', 1501536964),
('m170802_043109_alter_table_code', 1501649703),
('m170804_044359_alter_table_user', 1501822367),
('m170811_040709_create_table_touragent', 1502485560),
('m170815_040552_alter_table_task', 1502771203),
('m170816_033731_create_table_touragent_offer', 1502857128),
('m170819_062355_alter_table_offer', 1503124155),
('m170917_054008_create_table_feedback', 1505630614);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_offer`
--

DROP TABLE IF EXISTS `tbl_offer`;
CREATE TABLE IF NOT EXISTS `tbl_offer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taskId` int(11) DEFAULT NULL,
  `touragentId` int(11) DEFAULT NULL,
  `contact` text,
  `description` text,
  `createdBy` int(11) DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `earlyPrice` decimal(15,2) DEFAULT NULL,
  `lastMinPrice` decimal(15,2) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_tbl_offer_taskId` (`taskId`),
  KEY `FK_tbl_offer_createdBy` (`createdBy`),
  KEY `FK_tbl_offer_touragentId` (`touragentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Дамп данных таблицы `tbl_offer`
--

INSERT INTO `tbl_offer` (`id`, `taskId`, `touragentId`, `contact`, `description`, `createdBy`, `price`, `earlyPrice`, `lastMinPrice`, `type`, `sort`) VALUES
(44, 1, 20, '<p>Турагентство: Туристическая компания &laquo;АлатанТур&raquo;</p>\r\n<p>Сайт: <a href="http://www.alatantour.by" target="_blank">http://www.alatantour.by </a></p>\r\n<p>Менеджер: Катерина</p>', '<p><a href="http://www.sltour.by/napravleniya/netherlands.html" target="_blank">http://www.sltour.by/napravleniya/netherlands.html</a></p>\r\n<p>Супер-тур!</p>', 148, 165.00, NULL, NULL, 0, 1),
(45, 10, 18, '<p>Турагентство: Компания &laquo;Респектор Трэвел&raquo;</p>\r\n<p>Сайт: <a href="http://respector.by" target="_blank">http://respector.by </a></p>\r\n<p>Менеджер: Иван.</p>', '<p>Ссылка такая-то.</p>', 146, 170.00, NULL, NULL, 0, 1),
(46, 10, 65, '<p>Турагентство: Туристическая компания &laquo;Престиж Аква Тур&raquo;</p>\r\n<p>Сайт: <a href="http://www.aquatour.by" target="_blank">http://www.aquatour.by</a></p>\r\n<p>Менеджер: Николай.</p>', '<p>Ссылка</p>', 193, 165.00, NULL, NULL, 0, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_task`
--

DROP TABLE IF EXISTS `tbl_task`;
CREATE TABLE IF NOT EXISTS `tbl_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `tourType` int(11) DEFAULT NULL,
  `adultCount` int(11) DEFAULT NULL,
  `childCount` int(11) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `startedAt` timestamp NULL DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `generalPrice` decimal(15,2) DEFAULT NULL,
  `earlyPrice` decimal(15,2) DEFAULT NULL,
  `lastMinPrice` decimal(15,2) DEFAULT NULL,
  `userId` int(11) NOT NULL,
  `prolongationDate` timestamp NULL DEFAULT NULL,
  `planPrice` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `FK_tbl_task_userId` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `tbl_task`
--

INSERT INTO `tbl_task` (`id`, `name`, `email`, `tourType`, `adultCount`, `childCount`, `days`, `startedAt`, `createdAt`, `generalPrice`, `earlyPrice`, `lastMinPrice`, `userId`, `prolongationDate`, `planPrice`) VALUES
(10, '590', 'konditer-print@mail.ru', 28, 2, 0, 14, '2017-10-07 21:00:00', '2017-09-26 04:53:37', 165.00, NULL, NULL, 195, '2017-10-03 04:53:37', '');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_task_child_age`
--

DROP TABLE IF EXISTS `tbl_task_child_age`;
CREATE TABLE IF NOT EXISTS `tbl_task_child_age` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taskId` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_task_child_age_taskId` (`taskId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `tbl_task_child_age`
--

INSERT INTO `tbl_task_child_age` (`id`, `taskId`, `age`) VALUES
(1, 2, 4),
(2, 2, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_task_country`
--

DROP TABLE IF EXISTS `tbl_task_country`;
CREATE TABLE IF NOT EXISTS `tbl_task_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taskId` int(11) DEFAULT NULL,
  `countryId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_task_country_taskId` (`taskId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `tbl_task_country`
--

INSERT INTO `tbl_task_country` (`id`, `taskId`, `countryId`) VALUES
(1, 1, 118),
(2, 2, 96),
(3, 3, 79),
(4, 3, 23),
(5, 3, 118),
(6, 3, 102),
(7, 3, 107),
(8, 3, 39),
(9, 4, 31),
(10, 5, 103),
(11, 6, 38),
(12, 7, 1),
(13, 8, 38),
(14, 9, 2),
(15, 10, 96);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_template`
--

DROP TABLE IF EXISTS `tbl_template`;
CREATE TABLE IF NOT EXISTS `tbl_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(50) DEFAULT NULL,
  `content` text,
  `comment` varchar(255) DEFAULT NULL,
  `updatedAt` timestamp NULL DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `tbl_template`
--

INSERT INTO `tbl_template` (`id`, `key`, `content`, `comment`, `updatedAt`, `subject`, `position`) VALUES
(1, 'add-task', '<p>~name~!</p>\r\n<p>Ваша заявка на тур успешно размещена на <span style="color: #ff6600;">П</span>ортале <span style="color: #ff6600;">penki.by</span></p>\r\n<p>Номер Вашей заявки: ~cabinetNumber~, пароль для входа в её раздел: ~password~.</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Порядок обслуживания заявки следующий:</p>\r\n<p>- первоначально заявка размещается на срок 7 дней;</p>\r\n<p>- Вы можете продлить размещение своей заявки на следующий срок 7 дней неограниченное число раз (в случае не продления размещения, заявка будет автоматически удалена);</p>\r\n<p>- после выбора/покупки тура заявку следует удалить (в связи с потерей ею актуальности для менеджеров турагентств);</p>\r\n<p>- Вы можете разместить как несколько заявок с указанием одной страны отдыха, так и одну заявку с перечнем интересующих вас стран.</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Советы от <span style="color: #ff6600;">П</span>ортала:</p>\r\n<p>-&nbsp;уточняйте у отправителей предложений: все ли платежи за тур включены в указанную ими стоимость!</p>\r\n<p>- не гонитесь за излишней дешевизной тура; помните о том, что показатель выгодности покупки это - наилучшее соотношение цены тура и его качества;</p>\r\n<p>- расскажите о <span style="color: #ff6600;">П</span>ортале <span style="color: #ff6600;">penki.by</span> своим знакомым и друзьям,-</p>\r\n<p>чем больше заявок будет размещено на <span style="color: #ff6600;">П</span>ортале, тем активней с ним будут сотрудничать конкурирующие друг с другом менеджеры турагентств, а, значит, тем более выгодные предложения будут поступать авторам заявок.</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Для перехода в раздел заявки нажмите &ndash; <a href="~autologinLink~">перейти в раздел заявки</a></p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #ff6600;">П</span>ортал <span style="color: #ff6600;">penki.by</span></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'Письмо с паролем.', '2017-08-26 08:44:01', 'Размещение заявки', 0),
(2, 'first-notification', '<p>~name~!</p>\r\n<p>Через 2 дня Ваша заявка будет автоматически удалена в связи с не подтверждением её актуальности. Вы можете продлить срок размещения своей заявки соответствующим кликом в её разделе.&nbsp;</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #ff6600;">П</span>ортал <span style="color: #ff6600;">penki.by</span></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'О продлении размещения заявки_1', '2017-08-26 05:31:27', 'О продлении размещения заявки', 0),
(3, 'second-notification', '<p>~name~!</p>\r\n<p>Завтра Ваша заявка будет автоматически удалена в связи с не подтверждением её актуальности. Вы можете продлить срок размещения своей заявки соответствующим кликом в её разделе.&nbsp;</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #ff6600;">П</span>ортал <span style="color: #ff6600;">penki.by</span></p>\r\n<p>&nbsp;</p>', 'О продлении размещения заявки_2', '2017-08-26 05:35:04', 'О продлении размещения заявки', 0),
(6, 'prolong-task', '<p>~name~!</p>\r\n<p>Размещение Вашей заявки успешно продлено до ~expiredAt~.</p>\r\n<p>Расскажите о <span style="color: #ff6600;">П</span>ортале <span style="color: #ff6600;">penki.by</span> своим знакомым и друзьям,- чем больше заявок будет размещено на <span style="color: #ff6600;">П</span>ортале, тем активней с ним будут сотрудничать конкурирующие друг с другом менеджеры турагентств, а, значит, тем более выгодные предложения будут поступать авторам заявок.</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #ff6600;">П</span>ортал <span style="color: #ff6600;">penki.by</span></p>', 'Размещение заявки продлено', '2017-08-26 05:37:41', 'Размещение заявки продлено', 0),
(4, 'last-notification', '<p>~name~!</p>\r\n<p>Ваша заявка на тур была автоматически удалена.</p>\r\n<p>Для повторного участия в работе <span style="color: #ff6600;">П</span>ортала Вы можете разместить новую заявку.</p>\r\n<p>С надеждой на сотрудничество,</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #ff6600;">П</span>ортал <span style="color: #ff6600;">penki.by</span></p>', 'Об удалении заявки', '2017-08-26 05:36:25', 'Об удалении заявки', 0),
(5, 'add-offer', '<p>~name~!</p>\r\n<p>В разделе Вашей заявки размещено новое предложение.</p>\r\n<p>Вы можете поместить его вверху списка, присвоив предложению статус "ПРИОРИТЕТНОЕ", а можете добавить его в общий список (в дальнейшем Вы всегда сможете его переместить).</p>\r\n<p>Предложения по Вашей заявке видны всем менеджерам (при этом данные турагентства и контактные данные отправителя предложения скрыты от них).</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #ff6600;">П</span>ортал <span style="color: #ff6600;">penki.by</span></p>\r\n<p>&nbsp;</p>', 'О получении предложения', '2017-08-26 05:41:23', 'О получении предложения', 0),
(7, 'admin-deletion', '<p>~name~!</p>\r\n<p>Ваша заявка была удалена администратором.</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color: #ff6600;">П</span>ортал <span style="color: #ff6600;">рenki.by</span></p>', 'Удаление заявки администратором', '2017-08-26 05:42:02', 'Удаление заявки администратором', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_touragent`
--

DROP TABLE IF EXISTS `tbl_touragent`;
CREATE TABLE IF NOT EXISTS `tbl_touragent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `site` varchar(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_tbl_touragent_userId_idx` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=212 ;

--
-- Дамп данных таблицы `tbl_touragent`
--

INSERT INTO `tbl_touragent` (`id`, `name`, `site`, `userId`, `status`) VALUES
(17, 'Туристическая компания «КОМАРК»', 'http://komark.by		', 145, 1),
(18, 'Компания «Респектор Трэвел»', 'http://respector.by	', 146, 1),
(19, 'ЧТУП «Энивей Трэвел Плюс»', 'http://anyway.by ', 147, 1),
(20, 'Туристическая компания «АлатанТур» ', 'http://www.alatantour.by	', 148, 1),
(21, 'ЗАО «Мастер ВГ тур»', 'www.mastervgtour.by', 149, 1),
(22, 'Турагентство «TravelHouse»	', 'https://www.travelhouse.by	 ', 150, 1),
(23, 'Туристическая компания «Траст Аэро Турс»', 'http://transaerotours.by	', 151, 1),
(24, 'Туристическая компания «ТрейдВояж»', 'http://tradevoyage.by', 152, 1),
(25, 'Туристическое агентство «Лемур Тур»', 'http://letour.by	', 153, 1),
(26, 'Туристическая компания «Авалон-Тур»', 'http://www.avalon-tour.by', 154, 1),
(27, 'Туристическое агентство «Ай Си Турс»', 'https://ictours.by/', 155, 1),
(28, 'Туристическая компания «Академия отдыха»', 'http://academytour.by', 156, 1),
(29, 'Туристическая компания «Актам»', 'http://www.aktam.by', 157, 1),
(30, 'Туристическое агентство «Альфа-Тур»', 'http://alphatour.by', 158, 1),
(31, 'Туристическое агентство «АнитаВу»', 'http://www.anitatour.by', 159, 1),
(32, 'Компания «Апельсин-тур»', 'http://apelsin-tour.by', 160, 1),
(33, 'ООО «Аэротрэвел»', 'http://airtravel.by', 161, 1),
(34, 'ЧТУП «Бенефис-тур»', 'http://benefis-tur.by', 162, 1),
(35, 'Турфирма «Блис»', 'http://www.bliss-tour.by', 163, 1),
(36, 'Туристическая компания «Блисвэй»', 'http://blissway.by', 164, 1),
(37, 'ООО «БогемияТрэвел»', 'http://bogemia.by', 165, 1),
(38, 'ЧТУП «Валерия Тур»', 'http://valeriatour.by', 166, 1),
(39, 'Туристическая компания «Гардика Тур»', 'http://www.gardika.by', 167, 1),
(40, 'ЧТУП «Глоубал Трэвэл»', 'http://global-travel.by	', 168, 1),
(41, 'ООО «Голден Тур»', 'http://www.goldentour.by', 169, 1),
(42, 'Компания «Два Солнца»', 'http://www.2sun.by', 170, 1),
(43, 'Туристическое агентство «ДенимТрэвел»', 'http://www.denimtravel.by', 171, 1),
(44, 'Туристическая компания «Димиди Трэвел»', 'http://dimidi.by', 172, 1),
(45, 'Турагентство «ДиНастия Трэвел»', 'http://dinastiatravel.by', 173, 1),
(46, 'ЧУП «Дискавери бизнес групп»', 'http://visaclub.by', 174, 1),
(47, 'ЧТУП «Долина туров»', 'http://doltour.by', 175, 1),
(48, 'ЧТУП «Золотой Глобус»', 'https://globe.by', 176, 1),
(49, 'ЧУП «ИНТЕРЛЮКС Тур»', 'http://interlux.by', 177, 1),
(50, 'ОДО «ИриАнна»', 'http://irianna.com', 178, 1),
(51, 'Турагентство «КасаБланка»', 'http://casablanca.by', 179, 1),
(52, 'Туристическая компания «Катим с нами»', 'http://katimsnami.by', 180, 1),
(53, 'Туристическая компания «КолорЛэнд»', 'http://otdyhaem.by', 181, 1),
(54, 'Туристическая компания «Боншанс»', 'http://bonchance.by', 182, 1),
(55, 'Компания «СТС»', 'http://www.sporttourservice.by', 183, 1),
(56, 'Турфирма «Контур-ламн»', 'http://contour-lamn.com', 184, 1),
(57, 'ООО «ЛайтТопСистемс»', 'https://ltop.by', 185, 1),
(58, 'ЧТУП «Магнифик Трэвел»', 'https://mtravel.by', 186, 1),
(59, 'Турагентство «Мистер туристер»', 'http://tourister.by', 187, 1),
(60, 'Турфирма «Натаян Тур»', 'http://natayan.by', 188, 1),
(61, 'ООО «Натурленд Тревел»', 'http://www.nland.by', 189, 1),
(62, 'ОДО «НОВА ТУР»', 'http://novatour.by', 190, 1),
(63, 'Туристическая компания «Одиссея-Тур»', 'http://www.odisseya.by', 191, 1),
(64, 'ООО «Парус Трэвел»', 'https://parustravel.by', 192, 1),
(65, 'Туристическая компания «Престиж Аква Тур»', 'http://www.aquatour.by', 193, 1),
(66, 'ЧТУП «Релакс-Тур»', 'http://www.sabtur.by', 194, 1),
(67, 'Туристическая компания «Санни Дримс»', 'http://sunnydreams.by', 196, 1),
(68, 'Центр туризма «Санни Дэйс»', 'http://sunny-days.by', 197, 1),
(69, 'Турагентство «Сантарен»', 'http://santaren.by', 198, 1),
(70, 'Турагентство «Свэлна»', 'http://svelna.com', 199, 1),
(71, 'Туристическая компания «Селант-плюс»', 'https://turs.by', 200, 1),
(72, 'ООО «СКтур»', 'https://sktour.by', 201, 1),
(73, 'ЧТП «СтарБусТрэвел»', 'http://www.bus.by', 202, 1),
(74, 'Мастерская путешествий «Студио Трэвел»', 'http://studiotravel.by', 203, 1),
(75, 'Туристическая компания «Сэвэн Трэвел»', 'http://107.by', 204, 1),
(76, 'Туристическая компания «Трэвор»', 'http://trawor.by', 205, 1),
(77, 'ООО «Тур От Кутюр»', 'http://thctravel.by', 206, 1),
(78, 'Компания «ТурТрансРу»', 'http://minsk.tourtrans.ru', 207, 1),
(79, 'ЧП «Фаворит-Тревел»', 'http://favorit-travel.by', 208, 1),
(80, 'Турагентство «Фреш Лайм»', 'http://freshlviv.by', 209, 1),
(81, 'ОДО «Чехтурс»', 'https://www.czechtours.by', 210, 1),
(82, 'Туристическая компания «ШАМПАНЬ»', 'http://www.shampan.by', 211, 1),
(83, 'Туристическая компания «Элдиви»', 'http://travellive.by', 212, 1),
(84, 'Туристическое агентство «Элладатур»', 'http://elladatour.by', 213, 1),
(85, 'Центр туризма «ЮЖНЫЙ КРАЙ» ', 'http://www.turcentr.by', 214, 1),
(86, 'Туристическая компания «Видимый мир»', 'http://v-mir.by', 215, 1),
(87, 'Туристическая компания «БалтикТрэвел»', 'http://baltictravel.by', 216, 1),
(88, 'ООО «Территория отдыха»', 'http://territory.by', 217, 1),
(89, 'ООО «КРОСС ТУР»', 'http://crosstour.by', 218, 1),
(90, 'Турагентство «4 стороны света»', 'http://www.4cc.by', 219, 1),
(91, 'Туристическая компания «4emodan»', 'http://4emodan.by', 220, 1),
(92, 'Туристическая компания «7 чудес света»', 'http://7wow.by', 221, 1),
(93, 'Туристическая компания «ALLTOUR.by»', ' http://alltour.by/ ', 222, 1),
(94, ' Туристическая фирма «ВиАрЛайнс»', ' http://vr.by/', 223, 1),
(95, 'ООО «Авантаж-тур»', 'http://www.avantag.by', 224, 1),
(96, 'Туристическая компания «Авентура трэвел»', 'http://aventura.by', 225, 1),
(97, 'ООО «Авангард-вояж»', 'http://tourfirm.by', 226, 1),
(98, 'Туристическая компания «Адель Трэвел»', 'http://adeltravel.by', 227, 1),
(99, 'ООО «Акуна Матата Тревел» ', 'http://akunatravel.by ', 228, 1),
(100, 'Частное предприятие «АлексСистем»', ' http://astour.by', 229, 1),
(101, 'ЧТУП «Алиприана»', 'http://alipriana.by', 230, 1),
(102, 'Туристическое агентство «Аллиола» ', 'http://alliola.by ', 231, 1),
(103, 'Турагентство «Аллора»', 'http://www.allora-tour.by', 232, 1),
(104, 'ООО «Алые паруса»  ', 'http://aparusa.by ', 233, 1),
(105, 'Компания«Альтамар Трэвел»', ' https://www.altamar.by', 234, 1),
(106, 'Компания «Альтус Тур»', ' http://altustour.by', 235, 1),
(107, 'Турагентство «Амиго Тур»', 'http://amigotur.by', 236, 1),
(108, 'Туристическая компания «Анадимтур»', 'http://anadimtour.by', 237, 1),
(109, 'Туристическое  агентство   «АнанасТур» ', 'http://ananastour.by ', 238, 1),
(110, 'ПТООО «Анбоста»', 'http://www.anbosta.by', 239, 1),
(111, 'Туроператор «Анекс Тур»', 'http://anextour.com.by', 240, 1),
(112, 'ООО «АнМариТур»', 'http://amtour.by', 241, 1),
(113, 'Туристическая компания «Анна Турс»', 'http://anna-tours.by', 242, 1),
(114, 'Туристическая фирма «Арготур»', 'http://argotour.by', 243, 1),
(115, 'ООО "Аргус Сити"', 'http://argustravel.by', 244, 1),
(116, 'Компания «Астрэвел» ', 'http://www.astravel.by', 245, 1),
(117, 'Туристическое агентство «Асфо-травел»', 'http://asfo-travel.by', 246, 1),
(118, 'Туристическая компания «Атлас Мира»', 'http://www.atlasmira.by', 247, 1),
(119, ' ЧТУП «Багама Тур»', 'http://www.bagama-tour.by', 248, 1),
(120, 'ООО «Балтик-Медиа»', 'http://balticmedia.by', 249, 1),
(121, ' ЧТУП «Балу Трэвел» ', 'http://baloo.by', 250, 1),
(122, 'ЧТУП «БасТур»', 'http://bus-tour.by', 251, 1),
(123, 'Туристическое агентство «Батерфляй»', 'http://www.by-tur.com', 252, 1),
(124, 'Компания «Бел Сервис Кампани Трэвел»', 'http://bsk-travel.by', 253, 1),
(125, 'ТЭУП «Беларустурист»', 'http://belarustourist.by', 254, 1),
(126, 'ООО «БелДАВ Клуб»', 'http://davclub.by', 255, 1),
(127, 'ООО «Белевротур»', 'http://beleurotour.by', 256, 1),
(128, 'Компания «Белинтурист»', 'http://www.belintourist.com', 257, 1),
(129, 'ООО «БелСлавГарант»', 'http://belslavgarant.by', 258, 1),
(130, 'ЧТУП «БЕЛ-ТУР Проспект»', 'http://bel-tour.com', 259, 1),
(131, 'ООО «Компания БЕЛФРЕШ» ', 'https://www.belfresh.by', 260, 1),
(132, 'Турагентство «Белый Мишка»', 'https://bely-mishka.by', 261, 1),
(133, 'Туристическая компания «BEARS Travel»', 'http://grandbears.by', 262, 1),
(134, 'Туристическая фирма «Биртан-тур»', 'https://birtantour.by', 263, 1),
(135, 'ООО «Компания Би-Тур» ', 'http://www.putevki.by', 264, 1),
(136, 'Компания «Благо Трэвел»', 'http://blagotravel.by', 265, 1),
(137, 'ООО "Бюро путешествий "Вентотур"', 'http://www.vento.by', 266, 1),
(138, 'Бюро путешествий «Кругозор» ', 'http://krugozor-travel.com', 267, 1),
(139, 'Турагентство «В отпуск.by»', 'http://votpusk.by', 268, 1),
(140, 'ЧТУП «ВегаБус Тревел»', 'http://vegabus.by', 269, 1),
(141, 'Туристическое агентство «ВЕЛЛ»', 'http://wellminsk.by', 270, 1),
(142, 'Турагентство «ВЕРШИНА»', ' http://vershina.by', 271, 1),
(143, 'Туристическое агентство «Вечерний бриз»', 'http://vecerbriz.by', 272, 1),
(144, 'ИТТУП «ВиАрЛайнс»', 'https://vr.by', 273, 1),
(145, 'ТЧУП «Вижн-Лайн»', 'http://www.vl-by.com', 274, 1),
(146, 'ЧТУП «ВИЗА БАЙ»', 'https://visaby.com', 275, 1),
(147, 'Туристическая компания «VIZATUR.BY»', 'http://vizatur.by', 276, 1),
(148, 'СОДО «Визит-тур»', 'https://visit-tour.net', 277, 1),
(149, 'Компания «Викинг Туристик»', 'http://www.viking.by', 278, 1),
(150, 'КДТУП «Виктория-Тур»', 'http://victoria-tour.by', 279, 1),
(151, 'ЧТУП «ВИП-ТУРС»', 'http://vip365.by', 280, 1),
(152, 'Турагентство «Vispaniu»', 'http://www.vispaniu.by', 281, 1),
(153, 'ОДО «ВИСТА-ТРЭВЭЛ»', 'http://vista-travel.by', 282, 1),
(154, 'Компания «Ваше Лучшее Путешествие»', 'http://vlp.by', 283, 1),
(155, 'Туристическая компания «Вокруг света»', 'http://www.vokrugsveta.by', 284, 1),
(156, 'Туристическая компания «World Expert»', 'http://worldexpert.by', 285, 1),
(157, 'ОДО «Вояжтур»', 'http://www.vtour.by', 286, 1),
(158, 'ООО «Время Фэнтэзи»', 'http://fantasytours.by', 287, 1),
(159, 'ООО «ВСЕГДАЛЕТО»', 'http://vsegdaleto.by', 288, 1),
(160, 'Компания «ВЭЛИН»', 'http://www.bytravel.by', 289, 1),
(161, 'Туристическая компания «Галар-экспо»', 'https://galar-expo.by', 290, 1),
(162, 'ЧТУП «Галерея Путешествий»', 'https://nepal.by', 291, 1),
(163, 'Турагентство «ГалилеоТур»', 'http://galileotour.by', 292, 1),
(164, 'Туристическое агентство «Гарант Тур Плюс»', 'http://www.garanttour.by', 293, 1),
(165, 'Tурагентство «География»', 'http://www.mitravel.by', 294, 1),
(166, 'ЧУП «Гермаида»', 'http://germaida.by', 295, 1),
(167, 'Компания «Gold Travel»', 'http://goldtravel.by', 296, 1),
(168, 'Турагентство «Голд Фокс Трэвел»', 'https://goldfox.by', 297, 1),
(169, 'УП «Голубая птица»', 'https://bluebird.by	', 298, 1),
(170, 'Туристическая компания «Голубой парус»', 'http://bsail.by', 299, 1),
(171, 'Бюро путешествий «Трэвел Домино»', 'http://www.hottdom.com', 300, 1),
(172, 'ОДО «АДС ГАРАНТ»', 'http://www.adsgarant.com', 301, 1),
(173, 'Компания «ДатаТур»', 'http://datatour.by', 302, 1),
(174, 'OOO «ДВ-Тур» ', 'http://dv-tour.by', 303, 1),
(175, 'Турагентство «Дельта-тур» ', 'https://deltatour.by', 304, 1),
(176, 'Туристическая фирма «Дельфин тур»', 'http://delfin-tur.by', 305, 1),
(177, 'ООО «ДЕЛЮКС-ТРЕВЕЛ»', 'http://deluxe-travel.by', 306, 1),
(178, 'Туристическая компания «ДЕРЖАВА»', 'http://www.derzava.by', 307, 1),
(179, 'Туристическая компания «ДЖЕКФРУТ»', 'http://jackfruit.by', 308, 1),
(180, 'Турфирма «Gin-tour»', 'http://gin-tour.by', 309, 1),
(181, 'Туроператор «Join UP»', 'https://joinup.by', 310, 1),
(182, 'Туристическая компания «Джорни Плюс»', 'http://www.journey-tur.by', 311, 1),
(183, 'Турагентство «ДиАртис»', 'http://www.diartis.ru', 312, 1),
(184, 'Туристическое предприятие «ДИЛИЖАНСТУР»', ' http://dili.by', 313, 1),
(185, 'Частное предприятие «Динамакс» ', 'http://diliya.by', 314, 1),
(186, 'Туристическая компания «Дискавери Трэвел»', 'http://dtravel.by', 315, 1),
(187, 'ООО «Дискаунтер Путешествий»', 'http://discount-travel.by', 316, 1),
(188, 'Туристическая компания «ДитаТур»', 'http://ditatour.by', 317, 1),
(189, 'Туристическое агентство «Дитриб»', 'http://www.ditrib.by', 318, 1),
(190, 'Туристический центр «Дортур»', 'http://www.rw.by/tourism_and_recreation/', 319, 1),
(191, 'Компания «Дриант»', 'http://driant.com', 320, 1),
(192, 'Турагентство «Другая реальность»', 'http://yourtour.by', 321, 1),
(193, 'Туристическая компания «Дэнви Трэвел»', 'http://denvi.by', 322, 1),
(194, 'ООО «Ё-ТРЭВЕЛ»', 'http://zavizoi.by', 323, 1),
(195, 'Турагентство «За солнцем»', 'http://zasolncem.by', 324, 1),
(196, 'Турфирма «Загорай Трэвел»', 'http://zagorai-travel.by', 325, 1),
(197, 'Туристическая компания «Золотая Миля»', 'http://www.goldenmile.biz', 326, 1),
(198, 'ООО «ИдеалТур»', 'http://www.idealtour.by', 327, 1),
(199, 'Туристическое агентство «Анса Трэвел»', 'http://ansatravel.by', 328, 1),
(200, 'Компания «EasyTrip»', 'http://easytrip.by', 329, 1),
(201, 'ООО «ИксЭль тур»', 'http://exceltour.by', 330, 1),
(202, 'ООО «Илиос Тур»', 'http://iliostour.by', 331, 1),
(203, 'ЧТУП «Индустрия путешествий»', 'https://1tur.by', 332, 1),
(204, 'ООО «Индустрия туризма»', 'http://in-tour.by', 333, 1),
(205, 'ООО «Инклюзив-Трэвел»', 'http://inclusive-travel.by', 334, 1),
(206, 'Туристическая фирма «Инминтур»', 'http://inmintour.com', 335, 1),
(207, 'ООО «БелЮниИнтерКом»', 'http://www.intercomtour.org', 336, 1),
(208, ' ОДО «ИНТЕРСИТИ»   ', 'https://intercity.by', 337, 1),
(209, 'Туристическая компания «INFINITY TRAVEL»', 'https://infinity.by', 338, 1),
(210, ' Туристическое  агентство «АБИтрэвел»', 'http://www.abitravel.by', 339, 1),
(211, ' ООО «ИШИТЕРИ»', 'https://ishiteri.by', 340, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_touragent_offer`
--

DROP TABLE IF EXISTS `tbl_touragent_offer`;
CREATE TABLE IF NOT EXISTS `tbl_touragent_offer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `touragentId` int(11) NOT NULL,
  `offerId` int(11) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_touragent_offer_touragentId` (`touragentId`),
  KEY `FK_tbl_touragent_offer_offerId` (`offerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `tbl_touragent_offer`
--

INSERT INTO `tbl_touragent_offer` (`id`, `touragentId`, `offerId`, `createdAt`) VALUES
(4, 20, 44, '2017-09-25 06:21:34'),
(5, 18, 45, '2017-09-27 06:33:32'),
(6, 65, 46, '2017-09-29 04:40:16');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_tour_type`
--

DROP TABLE IF EXISTS `tbl_tour_type`;
CREATE TABLE IF NOT EXISTS `tbl_tour_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Дамп данных таблицы `tbl_tour_type`
--

INSERT INTO `tbl_tour_type` (`id`, `name`) VALUES
(28, 'Отдых на море'),
(29, 'Экскурсионный тур'),
(30, 'Экскурсии + отдых'),
(31, 'Лечение, оздоровление'),
(32, 'Горнолыжный тур'),
(34, 'Экзотический тур'),
(35, 'Свадебный тур'),
(36, 'Круиз'),
(37, 'Индивидуальный тур'),
(38, 'Спорт, походы, экстрим'),
(39, 'Дайвинг'),
(40, 'Сафари, охота, рыбалка'),
(41, 'Фестивали, соревнования, турниры'),
(42, 'Шоп-тур'),
(43, 'Паломнический тур');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(45) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `roleId` int(11) NOT NULL,
  `firstLogin` timestamp NULL DEFAULT NULL,
  `lastLogin` timestamp NULL DEFAULT NULL,
  `hidden` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_tbl_user_roleId` (`roleId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=393 ;

--
-- Дамп данных таблицы `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `password`, `code`, `roleId`, `firstLogin`, `lastLogin`, `hidden`) VALUES
(1, '333333', NULL, 3, '2017-06-26 08:02:35', '2017-10-01 06:02:31', 0),
(133, '848WAk', NULL, 1, '2017-09-09 04:57:42', '2017-09-29 03:33:05', 0),
(134, '5t9R0Z', NULL, 1, '2017-09-09 04:59:07', '2017-09-09 04:59:07', 0),
(135, '23llF6', NULL, 1, '2017-09-09 04:56:40', '2017-09-22 08:04:38', 0),
(136, '1Fix48', NULL, 1, '2017-09-09 04:56:19', '2017-09-22 08:04:55', 0),
(137, 'y0LQ40', NULL, 1, '2017-09-09 04:55:35', '2017-09-22 07:56:15', 0),
(138, 'S446OG', NULL, 1, NULL, NULL, 0),
(139, '8k06JZ', NULL, 1, '2017-09-04 05:55:39', '2017-09-04 05:55:39', 0),
(140, 'jyF679', NULL, 1, '2017-09-05 04:41:51', '2017-09-05 04:41:51', 0),
(141, 'l7tD54', NULL, 1, '2017-09-05 04:56:32', '2017-09-24 04:48:06', 0),
(145, 'O65R07gG', NULL, 2, '2017-09-29 05:33:23', '2017-09-29 05:33:23', 1),
(146, 'KW2La241', NULL, 2, '2017-09-27 06:31:13', '2017-09-27 06:36:15', 1),
(147, 'E1j90Fy9', NULL, 2, NULL, NULL, 1),
(148, 'E1Dg9B14', NULL, 2, '2017-09-25 06:16:36', '2017-09-25 06:16:36', 1),
(149, 'MR9390dp', NULL, 2, NULL, NULL, 1),
(150, 'DqU4916h', NULL, 2, NULL, NULL, 1),
(151, 'f839kv2c', NULL, 2, NULL, NULL, 1),
(152, 'ZDy1i502', NULL, 2, NULL, NULL, 1),
(153, 'Q7A1kq91', NULL, 2, NULL, NULL, 1),
(154, '6y0N31PH', NULL, 2, NULL, NULL, 1),
(155, 'D4R88IJ1', NULL, 2, NULL, NULL, 1),
(156, '1Iyf2S74', NULL, 2, NULL, NULL, 1),
(157, '2G4di22s', NULL, 2, NULL, NULL, 1),
(158, '8F86HJ9w', NULL, 2, NULL, NULL, 1),
(159, '33aqm65G', NULL, 2, NULL, NULL, 1),
(160, '4097pGDx', NULL, 2, NULL, NULL, 1),
(161, '9Pd1O3d5', NULL, 2, NULL, NULL, 1),
(162, '6wAXJ690', NULL, 2, NULL, NULL, 1),
(163, 'H007Q7bl', NULL, 2, NULL, NULL, 1),
(164, '5x4eh4N1', NULL, 2, NULL, NULL, 1),
(165, '63AR8Rc6', NULL, 2, NULL, NULL, 1),
(166, 'k594b7Ab', NULL, 2, NULL, NULL, 1),
(167, 'Yps375l0', NULL, 2, NULL, NULL, 1),
(168, '1W50d8ME', NULL, 2, NULL, NULL, 1),
(169, '5i819Cqq', NULL, 2, NULL, NULL, 1),
(170, '7521ImEi', NULL, 2, NULL, NULL, 1),
(171, 'bFxT0424', NULL, 2, NULL, NULL, 1),
(172, 'lAjr9020', NULL, 2, NULL, NULL, 1),
(173, 'WD3V0m66', NULL, 2, NULL, NULL, 1),
(174, '9ze3KM75', NULL, 2, NULL, NULL, 1),
(175, '6y4m2Yq3', NULL, 2, NULL, NULL, 1),
(176, 'kp1tZ354', NULL, 2, NULL, NULL, 1),
(177, 'T79N3Vs1', NULL, 2, NULL, NULL, 1),
(178, 'J11S2Ts3', NULL, 2, NULL, NULL, 1),
(179, 'S68H6M5t', NULL, 2, NULL, NULL, 1),
(180, 'Z564qfA3', NULL, 2, NULL, NULL, 1),
(181, 'A241nd2r', NULL, 2, NULL, NULL, 1),
(182, '3Y3wbh10', NULL, 2, NULL, NULL, 1),
(183, 'p16FPn83', NULL, 2, NULL, NULL, 1),
(184, '9j0DT06D', NULL, 2, NULL, NULL, 1),
(185, '2o0q50ZZ', NULL, 2, NULL, NULL, 1),
(186, 'hiAY8055', NULL, 2, NULL, NULL, 1),
(187, 'C2g0T4o8', NULL, 2, NULL, NULL, 1),
(188, '24N84Oxq', NULL, 2, NULL, NULL, 1),
(189, '0424iemi', NULL, 2, NULL, NULL, 1),
(190, '2vT1Gv62', NULL, 2, NULL, NULL, 1),
(191, 'wy271y0v', NULL, 2, NULL, NULL, 1),
(192, 'f0n80ba1', NULL, 2, NULL, NULL, 1),
(193, '0adY0e29', NULL, 2, '2017-09-29 04:16:55', '2017-09-29 05:41:23', 1),
(194, 'Z0qT36H6', NULL, 2, NULL, NULL, 0),
(195, '774JIZ', NULL, 1, '2017-09-26 04:53:51', '2017-10-01 05:56:30', 0),
(196, '3617omQE', NULL, 2, '2017-09-29 04:04:27', '2017-09-29 04:04:27', 0),
(197, 'fqy0940U', NULL, 2, NULL, NULL, 0),
(198, '78f9HIt8', NULL, 2, NULL, NULL, 0),
(199, 'Se9964jh', NULL, 2, NULL, NULL, 0),
(200, 'OX26q10q', NULL, 2, NULL, NULL, 0),
(201, '2r5LL87k', NULL, 2, NULL, NULL, 0),
(202, 'I9XnT727', NULL, 2, NULL, NULL, 0),
(203, '1Cx7w41m', NULL, 2, NULL, NULL, 0),
(204, '2723Dhjy', NULL, 2, NULL, NULL, 0),
(205, '871xNgT5', NULL, 2, NULL, NULL, 0),
(206, 's1305eHE', NULL, 2, NULL, NULL, 0),
(207, 'S99t83gH', NULL, 2, NULL, NULL, 0),
(208, '8b0d0QP9', NULL, 2, NULL, NULL, 0),
(209, 'T3pWA074', NULL, 2, NULL, NULL, 0),
(210, '9Fl0Dm75', NULL, 2, NULL, NULL, 0),
(211, '9826DQsL', NULL, 2, NULL, NULL, 0),
(212, 'LL7ix792', NULL, 2, NULL, NULL, 0),
(213, 'h136U7FK', NULL, 2, NULL, NULL, 0),
(214, '3GLS9E82', NULL, 2, NULL, NULL, 0),
(215, 'B1K133uE', NULL, 2, NULL, NULL, 0),
(216, 'ykgm8968', NULL, 2, NULL, NULL, 0),
(217, '2O0g7We1', NULL, 2, NULL, NULL, 0),
(218, '33Jt4U0o', NULL, 2, NULL, NULL, 0),
(219, 'Hdh81I51', NULL, 2, NULL, NULL, 0),
(220, 'Pk6fM198', NULL, 2, NULL, NULL, 0),
(221, '77c48LvC', NULL, 2, NULL, NULL, 0),
(222, '50E0t2Ep', NULL, 2, NULL, NULL, 0),
(223, 'iJ8Ym026', NULL, 2, NULL, NULL, 0),
(224, 'Lyo3500I', NULL, 2, NULL, NULL, 0),
(225, 'JkQX5821', NULL, 2, NULL, NULL, 0),
(226, 'W7391MXn', NULL, 2, NULL, NULL, 0),
(227, 'lMt9077s', NULL, 2, NULL, NULL, 0),
(228, '6E1q9i4F', NULL, 2, NULL, NULL, 0),
(229, '2b314nhc', NULL, 2, NULL, NULL, 0),
(230, '3IuA3J63', NULL, 2, NULL, NULL, 0),
(231, '5C9t6vn9', NULL, 2, NULL, NULL, 0),
(232, '287lZ4AV', NULL, 2, NULL, NULL, 0),
(233, '993W3xSD', NULL, 2, NULL, NULL, 0),
(234, '2tuQD863', NULL, 2, NULL, NULL, 0),
(235, 'tb28CW11', NULL, 2, NULL, NULL, 0),
(236, '2k621xZO', NULL, 2, NULL, NULL, 0),
(237, 'bJO2Q464', NULL, 2, NULL, NULL, 0),
(238, '41hq1L3y', NULL, 2, NULL, NULL, 0),
(239, 'aY71RB57', NULL, 2, NULL, NULL, 0),
(240, 'Y4U827Sh', NULL, 2, NULL, NULL, 0),
(241, '0E427ScA', NULL, 2, NULL, NULL, 0),
(242, 'H9849jcj', NULL, 2, NULL, NULL, 0),
(243, '60sFL9t1', NULL, 2, NULL, NULL, 0),
(244, 'HT473k6X', NULL, 2, NULL, NULL, 0),
(245, 'd4E2G34B', NULL, 2, NULL, NULL, 0),
(246, '9S1jCO13', NULL, 2, NULL, NULL, 0),
(247, 'Q72JI5S3', NULL, 2, NULL, NULL, 0),
(248, 'pQ74N7b8', NULL, 2, NULL, NULL, 0),
(249, 'a173kpI9', NULL, 2, NULL, NULL, 0),
(250, '1X594McK', NULL, 2, NULL, NULL, 0),
(251, 'Vl7558vU', NULL, 2, NULL, NULL, 0),
(252, 'e1FPl116', NULL, 2, NULL, NULL, 0),
(253, '6NiD6u88', NULL, 2, NULL, NULL, 0),
(254, 'h9004qRC', NULL, 2, NULL, NULL, 0),
(255, 'v9PL936t', NULL, 2, NULL, NULL, 0),
(256, 'N9156MVa', NULL, 2, NULL, NULL, 0),
(257, 'Oyj317W0', NULL, 2, NULL, NULL, 0),
(258, '278o6FDm', NULL, 2, NULL, NULL, 0),
(259, '1b88i1aO', NULL, 2, NULL, NULL, 0),
(260, 'fyTk8206', NULL, 2, NULL, NULL, 0),
(261, '33X2G3gz', NULL, 2, NULL, NULL, 0),
(262, '6l1w3r8C', NULL, 2, NULL, NULL, 0),
(263, '2p34e2Xp', NULL, 2, NULL, NULL, 0),
(264, 'XP1F43U8', NULL, 2, NULL, NULL, 0),
(265, 'zA9Nl942', NULL, 2, NULL, NULL, 0),
(266, '2U0Z49ye', NULL, 2, NULL, NULL, 0),
(267, 'Ly7aE010', NULL, 2, NULL, NULL, 0),
(268, 'N0bF58v0', NULL, 2, NULL, NULL, 0),
(269, '9DVVJ478', NULL, 2, NULL, NULL, 0),
(270, 'r3739zbh', NULL, 2, NULL, NULL, 0),
(271, 'O73UM94v', NULL, 2, NULL, NULL, 0),
(272, 'a6s205Gq', NULL, 2, NULL, NULL, 0),
(273, 'b73btj68', NULL, 2, NULL, NULL, 0),
(274, '068c4nmc', NULL, 2, NULL, NULL, 0),
(275, 'b71f5d7w', NULL, 2, NULL, NULL, 0),
(276, 'Z63dwR48', NULL, 2, NULL, NULL, 0),
(277, '7r7koe04', NULL, 2, NULL, NULL, 0),
(278, 'bk145N9R', NULL, 2, NULL, NULL, 0),
(279, '72K24MWT', NULL, 2, NULL, NULL, 0),
(280, '2o8Fy08e', NULL, 2, NULL, NULL, 0),
(281, 'Qe7nW588', NULL, 2, NULL, NULL, 0),
(282, 'R8929PTD', NULL, 2, NULL, NULL, 0),
(283, 'fF0XO105', NULL, 2, NULL, NULL, 0),
(284, 'aZ26d38w', NULL, 2, NULL, NULL, 0),
(285, 'z0jxx004', NULL, 2, NULL, NULL, 0),
(286, '7i3aNo61', NULL, 2, NULL, NULL, 0),
(287, 'h708OKU0', NULL, 2, NULL, NULL, 0),
(288, '5Pq820VR', NULL, 2, NULL, NULL, 0),
(289, '1o946AhF', NULL, 2, NULL, NULL, 0),
(290, 'N24m40Sf', NULL, 2, NULL, NULL, 0),
(291, '5oW8c8H2', NULL, 2, NULL, NULL, 0),
(292, '34qmA18K', NULL, 2, NULL, NULL, 0),
(293, '5emTl130', NULL, 2, NULL, NULL, 0),
(294, '5i4X7j0O', NULL, 2, NULL, NULL, 0),
(295, '85s95Apv', NULL, 2, NULL, NULL, 0),
(296, '53a2BQi4', NULL, 2, NULL, NULL, 0),
(297, 'F45n8F3Q', NULL, 2, NULL, NULL, 0),
(298, 'SI85z6D2', NULL, 2, NULL, NULL, 0),
(299, '3tD384uk', NULL, 2, NULL, NULL, 0),
(300, 'Hx1K6J62', NULL, 2, NULL, NULL, 0),
(301, 'D7oz7L02', NULL, 2, NULL, NULL, 0),
(302, 'y4EkO851', NULL, 2, NULL, NULL, 0),
(303, 'Y6Wc8F74', NULL, 2, NULL, NULL, 0),
(304, '8ig9Hy07', NULL, 2, NULL, NULL, 0),
(305, '9z9J0R5m', NULL, 2, NULL, NULL, 0),
(306, 'MhKi1003', NULL, 2, NULL, NULL, 0),
(307, 'J4ZmY696', NULL, 2, NULL, NULL, 0),
(308, 'zbc17E17', NULL, 2, NULL, NULL, 0),
(309, '6o57WB4p', NULL, 2, NULL, NULL, 0),
(310, '7guoq191', NULL, 2, NULL, NULL, 0),
(311, 'ZbI8a956', NULL, 2, NULL, NULL, 0),
(312, 'ZhFN4218', NULL, 2, NULL, NULL, 0),
(313, 'A463W2pu', NULL, 2, NULL, NULL, 0),
(314, 'H9lHh164', NULL, 2, NULL, NULL, 0),
(315, 'J4BW8U96', NULL, 2, NULL, NULL, 0),
(316, 'XypR7885', NULL, 2, NULL, NULL, 0),
(317, 'bf2W56w3', NULL, 2, NULL, NULL, 0),
(318, 'zKfK1825', NULL, 2, NULL, NULL, 0),
(319, 'c70i57Di', NULL, 2, NULL, NULL, 0),
(320, 'sD4Z0U43', NULL, 2, NULL, NULL, 0),
(321, '078aIMM5', NULL, 2, NULL, NULL, 0),
(322, '4o4Q85KL', NULL, 2, NULL, NULL, 0),
(323, '6828Imab', NULL, 2, NULL, NULL, 0),
(324, '46CM9u8o', NULL, 2, NULL, NULL, 0),
(325, 'wV4Mj999', NULL, 2, NULL, NULL, 0),
(326, 'Y7341aVz', NULL, 2, NULL, NULL, 0),
(327, '1m8eJd04', NULL, 2, NULL, NULL, 0),
(328, '8w926uSO', NULL, 2, NULL, NULL, 0),
(329, 'un82dA24', NULL, 2, NULL, NULL, 0),
(330, '35s5Q2uj', NULL, 2, NULL, NULL, 0),
(331, '91DW2UN6', NULL, 2, NULL, NULL, 0),
(332, '8cWG0I27', NULL, 2, NULL, NULL, 0),
(333, 'aU1Vd095', NULL, 2, NULL, NULL, 0),
(334, 'NQwY3804', NULL, 2, NULL, NULL, 0),
(335, 'lbA0O370', NULL, 2, NULL, NULL, 0),
(336, '2pse656S', NULL, 2, NULL, NULL, 0),
(337, '171v9Ais', NULL, 2, NULL, NULL, 0),
(338, 'f34N16SO', NULL, 2, NULL, NULL, 0),
(339, '1Enf2R86', NULL, 2, NULL, NULL, 0),
(340, 'vQo3u953', NULL, 2, NULL, NULL, 0),
(341, 'zLI937B9', NULL, 2, NULL, NULL, 0),
(342, '6MI67eG4', NULL, 2, NULL, NULL, 0),
(343, 'dV8042Jz', NULL, 2, NULL, NULL, 0),
(344, '299FG5Kh', NULL, 2, NULL, NULL, 0),
(345, 'tNN3E053', NULL, 2, NULL, NULL, 0),
(346, '41Fd04yM', NULL, 2, NULL, NULL, 0),
(347, '6789hWBq', NULL, 2, NULL, NULL, 0),
(348, 'Tat1U080', NULL, 2, NULL, NULL, 0),
(349, '2dEv025I', NULL, 2, NULL, NULL, 0),
(350, '51eeLO16', NULL, 2, NULL, NULL, 0),
(351, '59r2F6lc', NULL, 2, NULL, NULL, 0),
(352, '0Fl3y4e8', NULL, 2, NULL, NULL, 0),
(353, 'b3w853Ul', NULL, 2, NULL, NULL, 0),
(354, '6la39uQ2', NULL, 2, NULL, NULL, 0),
(355, '2453UuHY', NULL, 2, NULL, NULL, 0),
(356, 'W10J86Ec', NULL, 2, NULL, NULL, 0),
(357, 'T2ML6S02', NULL, 2, NULL, NULL, 0),
(358, 'cjf8R528', NULL, 2, NULL, NULL, 0),
(359, '4UT2fU47', NULL, 2, NULL, NULL, 0),
(360, 'Y1WT7O22', NULL, 2, NULL, NULL, 0),
(361, '3mZ006ry', NULL, 2, NULL, NULL, 0),
(362, 'Y4dj268o', NULL, 2, NULL, NULL, 0),
(363, 'P9Qp257e', NULL, 2, NULL, NULL, 0),
(364, '2V902vel', NULL, 2, NULL, NULL, 0),
(365, '1843ptqR', NULL, 2, NULL, NULL, 0),
(366, 'zCr9Y669', NULL, 2, NULL, NULL, 0),
(367, 'm4b72m8M', NULL, 2, NULL, NULL, 0),
(368, '05gIz4Z9', NULL, 2, NULL, NULL, 0),
(369, '1Y642ysC', NULL, 2, NULL, NULL, 0),
(370, 'rD5P29O9', NULL, 2, NULL, NULL, 0),
(371, 'ZPmr6459', NULL, 2, NULL, NULL, 0),
(372, '59d3qu3W', NULL, 2, NULL, NULL, 0),
(373, 'O0W356KS', NULL, 2, NULL, NULL, 0),
(374, '0Xh0M01C', NULL, 2, NULL, NULL, 0),
(375, '282WR3Mk', NULL, 2, NULL, NULL, 0),
(376, '9Qt07pu6', NULL, 2, NULL, NULL, 0),
(377, 'i8I011rQ', NULL, 2, NULL, NULL, 0),
(378, '2T271MQF', NULL, 2, NULL, NULL, 0),
(379, 'KP0SC158', NULL, 2, NULL, NULL, 0),
(380, 'x37gM32o', NULL, 2, NULL, NULL, 0),
(381, 's7047pJH', NULL, 2, NULL, NULL, 0),
(382, 'L88U5JK8', NULL, 2, NULL, NULL, 0),
(383, 'q4ub16M4', NULL, 2, NULL, NULL, 0),
(384, 'x1n0xi43', NULL, 2, NULL, NULL, 0),
(385, 'BsFM3423', NULL, 2, NULL, NULL, 0),
(386, 'ET4uv417', NULL, 2, NULL, NULL, 0),
(387, '9gW2oX73', NULL, 2, NULL, NULL, 0),
(388, 'Tn41AH35', NULL, 2, NULL, NULL, 0),
(389, '3S94UzQ0', NULL, 2, NULL, NULL, 0),
(390, '0nJ223AL', NULL, 2, NULL, NULL, 0),
(391, '3GR36K4D', NULL, 2, NULL, NULL, 0),
(392, '2P610HNJ', NULL, 2, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_user_name`
--

DROP TABLE IF EXISTS `tbl_user_name`;
CREATE TABLE IF NOT EXISTS `tbl_user_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=669 ;

--
-- Дамп данных таблицы `tbl_user_name`
--

INSERT INTO `tbl_user_name` (`id`, `type`, `name`) VALUES
(34, 1, 'Авдей'),
(35, 1, 'Адам'),
(36, 1, 'Адольф'),
(37, 1, 'Адриан'),
(38, 1, 'Азарий'),
(39, 1, 'Аким'),
(41, 1, 'Алекс'),
(42, 1, 'Александр'),
(43, 1, 'Алексей'),
(44, 1, 'Алесь'),
(45, 1, 'Альберт'),
(46, 1, 'Альгерд'),
(47, 1, 'Анатолий'),
(48, 1, 'Андрей'),
(49, 1, 'Ансельм'),
(50, 1, 'Антон'),
(51, 1, 'Аристарх'),
(52, 1, 'Аркадий'),
(53, 1, 'Арсен'),
(54, 1, 'Арсений'),
(55, 1, 'Артём'),
(56, 1, 'Артемий'),
(57, 1, 'Артур'),
(59, 1, 'Архип'),
(60, 1, 'Афанасий'),
(61, 1, 'Богдан'),
(62, 1, 'Боголюб'),
(63, 1, 'Борис'),
(64, 1, 'Бронислав'),
(65, 1, 'Вадим'),
(66, 1, 'Валентин'),
(67, 1, 'Валерий'),
(68, 1, 'Василий'),
(69, 1, 'Вениамин'),
(70, 1, 'Виктор'),
(71, 1, 'Вильям'),
(72, 1, 'Винсент'),
(73, 1, 'Виталий'),
(74, 1, 'Витольд'),
(75, 1, 'Владимир'),
(76, 1, 'Владислав'),
(77, 1, 'Влас'),
(78, 1, 'Всеволод'),
(79, 1, 'Всеслав'),
(80, 1, 'Вячеслав'),
(81, 1, 'Гавриил'),
(82, 1, 'Геннадий'),
(83, 1, 'Георгий'),
(84, 1, 'Герман'),
(85, 1, 'Глеб'),
(86, 1, 'Гордей'),
(87, 1, 'Григорий'),
(88, 1, 'Давид'),
(89, 1, 'Дамир'),
(90, 1, 'Даниэль'),
(91, 1, 'Даниил'),
(92, 1, 'Данила'),
(93, 1, 'Дариан'),
(94, 1, 'Дарий'),
(95, 1, 'Демид'),
(96, 1, 'Дементий'),
(97, 1, 'Демьян'),
(98, 1, 'Денис'),
(99, 1, 'Динасий'),
(100, 1, 'Дионисий'),
(101, 1, 'Дмитрий'),
(102, 1, 'Добрыня'),
(103, 1, 'Довлат'),
(104, 1, 'Доминик'),
(105, 1, 'Донат'),
(106, 1, 'Дэннис'),
(107, 1, 'Евгений'),
(108, 1, 'Евстафий'),
(109, 1, 'Егор'),
(110, 1, 'Елизар'),
(111, 1, 'Елисей'),
(112, 1, 'Емельян'),
(113, 1, 'Ермак'),
(114, 1, 'Ерофей'),
(115, 1, 'Ефим'),
(116, 1, 'Жан'),
(117, 1, 'Захар'),
(118, 1, 'Иван'),
(119, 1, 'Игнат'),
(120, 1, 'Игорь'),
(121, 1, 'Илларион'),
(122, 1, 'Илья'),
(123, 1, 'Иннокентий'),
(124, 1, 'Иоанн'),
(125, 1, 'Карен'),
(126, 1, 'Кирилл'),
(127, 1, 'Клим'),
(128, 1, 'Климентий'),
(129, 1, 'Константин'),
(130, 1, 'Корней'),
(131, 1, 'Кристиан'),
(132, 1, 'Кузьма'),
(133, 1, 'Кондрат'),
(134, 1, 'Корней'),
(135, 1, 'Лев'),
(136, 1, 'Леон'),
(137, 1, 'Леонард'),
(138, 1, 'Леонид'),
(139, 1, 'Лука'),
(140, 1, 'Макар'),
(141, 1, 'Максим'),
(142, 1, 'Максимилиан'),
(143, 1, 'Марат'),
(144, 1, 'Марк'),
(145, 1, 'Маркел'),
(146, 1, 'Мартин'),
(147, 1, 'Марьян'),
(148, 1, 'Матвей'),
(149, 1, 'Матфей'),
(150, 1, 'Милан'),
(151, 1, 'Мирон'),
(152, 1, 'Мирослав'),
(153, 1, 'Михаил'),
(154, 1, 'Назар'),
(155, 1, 'Назарий'),
(156, 1, 'Никас'),
(157, 1, 'Никита'),
(158, 1, 'Николай'),
(159, 1, 'Никон'),
(160, 1, 'Олег'),
(161, 1, 'Павел'),
(162, 1, 'Пётр'),
(163, 1, 'Платон'),
(164, 1, 'Потап'),
(165, 1, 'Прохор'),
(166, 1, 'Радомир'),
(167, 1, 'Ратмир'),
(168, 1, 'Ринат'),
(169, 1, 'Ричард'),
(170, 1, 'Роберт'),
(171, 1, 'Родион'),
(172, 1, 'Роман'),
(173, 1, 'Ростислав'),
(174, 1, 'Руслан'),
(175, 1, 'Рустам'),
(176, 1, 'Савва'),
(177, 1, 'Савелий'),
(178, 1, 'Светозар'),
(179, 1, 'Светослав'),
(180, 1, 'Святослав'),
(181, 1, 'Севастьян'),
(182, 1, 'Семён'),
(183, 1, 'Серафим'),
(184, 1, 'Сергей'),
(185, 1, 'Станислав'),
(186, 1, 'Степан'),
(187, 1, 'Стефан'),
(188, 1, 'Тарас'),
(189, 1, 'Теодор'),
(190, 1, 'Тигран'),
(191, 1, 'Тимофей'),
(192, 1, 'Тимур'),
(193, 1, 'Тихон'),
(194, 1, 'Трофим'),
(195, 1, 'Устин'),
(196, 1, 'Фадей'),
(197, 1, 'Феликс'),
(198, 1, 'Фёдор'),
(199, 1, 'Филипп'),
(200, 1, 'Эдвард'),
(201, 1, 'Эдуард'),
(202, 1, 'Эльдар'),
(203, 1, 'Эмиль'),
(204, 1, 'Эммануил'),
(205, 1, 'Эрик'),
(206, 1, 'Эрнест'),
(207, 1, 'Юлиан'),
(208, 1, 'Юлий'),
(209, 1, 'Юрий'),
(210, 1, 'Яков'),
(211, 1, 'Якуб'),
(212, 1, 'Ян'),
(213, 1, 'Яромил'),
(214, 1, 'Ярослав'),
(454, 2, 'Августина'),
(455, 2, 'Авелина'),
(456, 2, 'Аврора'),
(457, 2, 'Агата'),
(458, 2, 'Аглая'),
(459, 2, 'Агнесса'),
(460, 2, 'Агнета'),
(461, 2, 'Агния'),
(462, 2, 'Ада'),
(463, 2, 'Аделаида'),
(464, 2, 'Аделаина'),
(465, 2, 'Аделия'),
(466, 2, 'Аделя'),
(467, 2, 'Адель'),
(468, 2, 'Адриана'),
(469, 2, 'Айрис'),
(470, 2, 'Аксинья'),
(471, 2, 'Алана'),
(472, 2, 'Александра'),
(473, 2, 'Алевтина'),
(474, 2, 'Алекса'),
(475, 2, 'Алеся'),
(476, 2, 'Алёна'),
(477, 2, 'Алина'),
(478, 2, 'Алиса'),
(479, 2, 'Алисия'),
(480, 2, 'Алия'),
(481, 2, 'Алла'),
(482, 2, 'Альбина'),
(483, 2, 'Альжбета'),
(484, 2, 'Амалия'),
(485, 2, 'Амелия'),
(486, 2, 'Амина'),
(487, 2, 'Амура'),
(488, 2, 'Анастасия'),
(489, 2, 'Ангела'),
(490, 2, 'Ангелина'),
(491, 2, 'Анжела'),
(492, 2, 'Анжелика'),
(493, 2, 'Анита'),
(494, 2, 'Анисья'),
(495, 2, 'Анна'),
(496, 2, 'Антонина'),
(497, 2, 'Анфиса'),
(498, 2, 'Апполинария'),
(499, 2, 'Ариана'),
(500, 2, 'Арина'),
(501, 2, 'Арсения'),
(502, 2, 'Ася'),
(503, 2, 'Беата'),
(504, 2, 'Богдана'),
(505, 2, 'Божена'),
(506, 2, 'Валентина'),
(507, 2, 'Валерия'),
(508, 2, 'Варвара'),
(509, 2, 'Василина'),
(510, 2, 'Василиса'),
(511, 2, 'Велина'),
(512, 2, 'Венера'),
(513, 2, 'Вера'),
(514, 2, 'Вероника'),
(515, 2, 'Верослава'),
(516, 2, 'Веселина'),
(517, 2, 'Веста'),
(518, 2, 'Вета'),
(519, 2, 'Виктория'),
(520, 2, 'Виола'),
(521, 2, 'Виолетта'),
(522, 2, 'Вита'),
(523, 2, 'Виталина'),
(524, 2, 'Виталия'),
(525, 2, 'Влада'),
(526, 2, 'Владислава'),
(527, 2, 'Галина'),
(528, 2, 'Гертруда'),
(529, 2, 'Глафира'),
(530, 2, 'Дана'),
(531, 2, 'Даниэлла'),
(532, 2, 'Данута'),
(533, 2, 'Дарина'),
(534, 2, 'Дарья'),
(535, 2, 'Диамара'),
(536, 2, 'Диана'),
(537, 2, 'Дина'),
(538, 2, 'Динара'),
(539, 2, 'Доминика'),
(540, 2, 'Ева'),
(541, 2, 'Евангелина'),
(542, 2, 'Евгения'),
(543, 2, 'Евдокия'),
(544, 2, 'Екатерина'),
(545, 2, 'Елена'),
(546, 2, 'Елизавета'),
(547, 2, 'Есения'),
(548, 2, 'Ефросинья'),
(549, 2, 'Забава'),
(550, 2, 'Зара'),
(551, 2, 'Зинаида'),
(552, 2, 'Злата'),
(553, 2, 'Зоя'),
(554, 2, 'Иветта'),
(555, 2, 'Ивонна'),
(556, 2, 'Изабелла'),
(557, 2, 'Илария'),
(558, 2, 'Илона'),
(559, 2, 'Инга'),
(560, 2, 'Инесса'),
(561, 2, 'Инна'),
(562, 2, 'Иоанна'),
(563, 2, 'Ирина'),
(564, 2, 'Ирэна'),
(565, 2, 'Камилла'),
(566, 2, 'Карелия'),
(567, 2, 'Карина'),
(568, 2, 'Каролина'),
(569, 2, 'Кира'),
(570, 2, 'Кристина'),
(571, 2, 'Ксения'),
(572, 2, 'Лада'),
(573, 2, 'Лариса'),
(574, 2, 'Лаура'),
(575, 2, 'Леся'),
(576, 2, 'Лиана'),
(577, 2, 'Лидия'),
(578, 2, 'Лика'),
(579, 2, 'Лилиана'),
(580, 2, 'Лилия'),
(581, 2, 'Лия'),
(582, 2, 'Любава'),
(583, 2, 'Любовь'),
(584, 2, 'Людмила'),
(585, 2, 'Майя'),
(586, 2, 'Маргарита'),
(587, 2, 'Мари'),
(588, 2, 'Марианна'),
(589, 2, 'Марина'),
(590, 2, 'Мария'),
(591, 2, 'Марья'),
(592, 2, 'Марфа'),
(593, 2, 'Марта'),
(594, 2, 'Марьяна'),
(595, 2, 'Мелания'),
(596, 2, 'Мелиса'),
(597, 2, 'Мила'),
(598, 2, 'Милада'),
(599, 2, 'Милана'),
(600, 2, 'Милена'),
(601, 2, 'Мирослава'),
(602, 2, 'Мира'),
(603, 2, 'Мирра'),
(604, 2, 'Михалина'),
(605, 2, 'Мия'),
(606, 2, 'Муза'),
(607, 2, 'Настасья'),
(608, 2, 'Наталья'),
(609, 2, 'Надежда'),
(610, 2, 'Нелли'),
(611, 2, 'Ника'),
(612, 2, 'Николь'),
(613, 2, 'Нина'),
(614, 2, 'Нонна'),
(615, 2, 'Оксана'),
(616, 2, 'Олеся'),
(617, 2, 'Оливия'),
(618, 2, 'Ольга'),
(619, 2, 'Паулина'),
(620, 2, 'Полина'),
(621, 2, 'Раиса'),
(622, 2, 'Регина'),
(623, 2, 'Рената'),
(624, 2, 'Римма'),
(625, 2, 'Роза'),
(626, 2, 'Роксана'),
(627, 2, 'Руслана'),
(628, 2, 'Сабина'),
(629, 2, 'Сабрина'),
(630, 2, 'Сания'),
(631, 2, 'Светлана'),
(632, 2, 'Серафима'),
(633, 2, 'Симона'),
(634, 2, 'Снежана'),
(635, 2, 'София'),
(636, 2, 'Софья'),
(637, 2, 'Станислава'),
(638, 2, 'Стелла'),
(639, 2, 'Стефания'),
(640, 2, 'Сусанна'),
(641, 2, 'Сюзанна'),
(642, 2, 'Таисия'),
(643, 2, 'Тамара'),
(644, 2, 'Тамила'),
(645, 2, 'Татьяна'),
(646, 2, 'Ульяна'),
(647, 2, 'Устина'),
(648, 2, 'Фаина'),
(649, 2, 'Фелиция'),
(650, 2, 'Фиона'),
(651, 2, 'Фредерика'),
(652, 2, 'Христина'),
(653, 2, 'Цветана'),
(654, 2, 'Эвелина'),
(655, 2, 'Элеонора'),
(656, 2, 'Элиза'),
(657, 2, 'Элина'),
(658, 2, 'Элла'),
(659, 2, 'Эльвира'),
(660, 2, 'Эльза'),
(661, 2, 'Эмилия'),
(662, 2, 'Эмма'),
(663, 2, 'Эрика'),
(664, 2, 'Юлиана'),
(665, 2, 'Юлия'),
(666, 2, 'Юнона'),
(667, 2, 'Юстина'),
(668, 2, 'Ядвига');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_user_roles`
--

DROP TABLE IF EXISTS `tbl_user_roles`;
CREATE TABLE IF NOT EXISTS `tbl_user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `tbl_user_roles`
--

INSERT INTO `tbl_user_roles` (`id`, `name`) VALUES
(1, 'user'),
(2, 'manager'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `text`
--

DROP TABLE IF EXISTS `text`;
CREATE TABLE IF NOT EXISTS `text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(50) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `text` text,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Дамп данных таблицы `text`
--

INSERT INTO `text` (`id`, `key`, `comment`, `text`, `createdAt`, `updatedAt`, `position`) VALUES
(23, 'gaide', 'Текстовый блок "Пользовательское соглашение".', '<p><strong>ПОЛЬЗОВАТЕЛЬСКОЕ СОГЛАШЕНИЕ</strong></p>\r\n<p>Лазарев Дмитрий Алексеевич (далее по тексту &ndash; СОБСТВЕННИК САЙТА), с одной стороны, и пользователь интернет-сайта penki.by (далее по тексту - САЙТ), принявший публичное предложение (Оферту) о заключении настоящего пользовательского соглашения (далее - ПОЛЬЗОВАТЕЛЬ), с другой стороны, вместе именуемые СТОРОНЫ, заключили настоящее пользовательское соглашение (далее &ndash; СОГЛАШЕНИЕ), о нижеследующем:</p>\r\n<ol>\r\n<li>СОГЛАШЕНИЕ вступает в силу немедленно после выражения согласия с ним ПОЛЬЗОВАТЕЛЯ путем простановки галочки в соответствующей форме с текстом об ознакомлении с пользовательским соглашением (без простановки вышеуказанной галочки невозможна регистрация ПОЛЬЗОВАТЕЛЯ на САЙТЕ/размещение предложения по заявке на тур).</li>\r\n</ol>\r\n<p><strong>В&nbsp; ЧАСТИ&nbsp; ТУРИСТОВ/АВТОРОВ ЗАЯВОК НА ТУРЫ:</strong></p>\r\n<ol start="2">\r\n<li>Чтобы зарегистрироваться на САЙТЕ ПОЛЬЗОВАТЕЛЬ обязан заполнить регистрационную форму (здесь и далее в данном разделе, касающемся туристов: ПОЛЬЗОВАТЕЛЬ это &ndash; пользователь САЙТА, разместивший свою заявку на тур).</li>\r\n<li>СОБСТВЕННИК САЙТА не несёт ответственность за сбой в обслуживании ПОЛЬЗОВАТЕЛЯ в случае, если последний неверно ввёл данные при своей регистрации.</li>\r\n<li>ПОЛЬЗОВАТЕЛЬ подтверждает, что на момент регистрации на САЙТЕ он достиг восемнадцатилетнего возраста.</li>\r\n<li>После заполнения регистрационной формы и завершения процедуры регистрации ПОЛЬЗОВАТЕЛЬ получает пароль. ПОЛЬЗОВАТЕЛЬ несёт ответственность за безопасность своего пароля, а также за все действия, совершаемые кем-либо на САЙТЕ под паролем ПОЛЬЗОВАТЕЛЯ. СОБСТВЕННИК САЙТА не несёт ответственность за использование пароля ПОЛЬЗОВАТЕЛЯ третьим лицом.</li>\r\n<li>СОБСТВЕННИК САЙТА имеет право без предварительного уведомления ПОЛЬЗОВАТЕЛЯ прекратить действие учетной записи ПОЛЬЗОВАТЕЛЯ и его доступ к услугам САЙТА (с удалением заявки на тур) в случае:</li>\r\n</ol>\r\n<p>- несоблюдения ПОЛЬЗОВАТЕЛЕМ условий СОГЛАШЕНИЯ;</p>\r\n<p>- содержания в разделе заявки на тур некорректной информации;</p>\r\n<p>- требования государственного органа или государственной организации.</p>\r\n<ol start="7">\r\n<li>ПОЛЬЗОВАТЕЛЬ соглашается и предоставляет СОБСТВЕННИКУ САЙТА доступ к данным его учетной записи/разделу заявки на тур.</li>\r\n<li>ПОЛЬЗОВАТЕЛЬ имеет право пользоваться услугами САЙТА исключительно в целях и порядке, предусмотренных СОГЛАШЕНИЕМ и не запрещенных законодательством Республики Беларусь.</li>\r\n<li>ПОЛЬЗОВАТЕЛЬ обязуется:</li>\r\n</ol>\r\n<p>- при состоявшемся выборе тура/покупке тура удалить свою заявку ввиду её неактуальности для менеджеров турагентств;</p>\r\n<p>- не осуществлять деятельность, которая может препятствовать предоставлению услуг, работе соответствующих серверов или сетей, которые соединены с услугами, или нарушает порядок их предоставления.</p>\r\n<p><strong>В&nbsp; ЧАСТИ&nbsp; МЕНЕДЖЕРОВ&nbsp; ТУРАГЕНТСТВ, РАЗМЕЩАЮЩИХ&nbsp; СВОИ&nbsp; ПРЕДЛОЖЕНИЯ&nbsp; ПО&nbsp; ЗАЯВКАМ НА ТУРЫ:</strong></p>\r\n<ol start="10">\r\n<li>ПОЛЬЗОВАТЕЛЬ (здесь и далее в данном разделе, касающемся менеджеров турагентств: ПОЛЬЗОВАТЕЛЬ это &ndash; пользователь САЙТА, разместивший своё предложение посредством рабочего кабинета определённого турагентства/с использованием пароля данного турагентства) подтверждает, что на момент размещения предложения он достиг восемнадцатилетнего возраста и что он является сотрудником/полномочным представителем турагентства, который имеет право платно размещать от имени своего турагентства предложения по заявкам на туры.</li>\r\n<li>Простановкой галочки в соответствующей форме с текстом об ознакомлении с пользовательским соглашением ПОЛЬЗОВАТЕЛЬ подтверждает свою осведомлённость о стоимости платного размещении предложения по заявке на тур, а также о том, что данная сумма подлежит оплате его турагентством.</li>\r\n<li>ПОЛЬЗОВАТЕЛЬ размещает предложения по заявкам на туры посредством рабочего кабинета своего турагентства; пароль для входа в рабочий кабинет предоставляется СОБСТВЕННИКОМ САЙТА турагентству/ПОЛЬЗОВАТЕЛЮ в электронном письме, отправленном по электронному адресу турагентства, либо в почтовой письме, отправленном по почтовому адресу турагентства.</li>\r\n<li>ПОЛЬЗОВАТЕЛЬ несёт ответственность за безопасность пароля своего турагентства, а также,- коллегиально с другими ПОЛЬЗОВАТЕЛЯМИ, также имеющими доступ в общий с ним рабочий кабинет,- за все действия, совершаемые кем-либо на САЙТЕ под паролем турагентства ПОЛЬЗОВАТЕЛЯ.</li>\r\n<li>СОБСТВЕННИК САЙТА не несёт ответственность за использование пароля турагентства третьими лицами, не получившими права от руководителя турагентства пользоваться услугами САЙТА посредством рабочего кабинета данного турагентства.</li>\r\n<li>При размещении своего предложения по заявке на тур ПОЛЬЗОВАТЕЛЬ обязуется указывать полную стоимость предлагаемого туристу тура с учётом всех платежей за него,- как осуществляемых туристом при покупке тура, так и вносимых им в процессе отдыха за границей.</li>\r\n<li>По окончании отчётного периода СОБСТВЕННИК САЙТА направляет турагентству счёт за платные услуги, оказанные САЙТОМ ПОЛЬЗОВАТЕЛЮ/ПОЛЬЗОВАТЕЛЯМ, использовавшим пароль данного турагентства при размещении своих предложений; порядок и условия оплаты услуг оговариваются в счёте.</li>\r\n<li>СОБСТВЕННИК САЙТА имеет право без предварительного уведомления турагентства/ПОЛЬЗОВАТЕЛЕЙ временно приостановить/прекратить работу рабочего кабинета данного турагентства в случае:</li>\r\n</ol>\r\n<p>- несоблюдения ПОЛЬЗОВАТЕЛЕМ условий СОГЛАШЕНИЯ;</p>\r\n<p>- содержания в размещённом ПОЛЬЗОВАТЕЛЕМ предложении &nbsp;некорректной информации;</p>\r\n<p>- неоплаты выставленного счёта в указанный в нём срок.</p>\r\n<ol start="18">\r\n<li>ПОЛЬЗОВАТЕЛЬ соглашается и предоставляет СОБСТВЕННИКУ САЙТА доступ к данным рабочего кабинета его турагентства.</li>\r\n<li>ПОЛЬЗОВАТЕЛЬ имеет право пользоваться услугами САЙТА исключительно в целях и порядке, предусмотренных СОГЛАШЕНИЕМ и не запрещенных законодательством Республики Беларусь.</li>\r\n<li>ПОЛЬЗОВАТЕЛЬ обязуется:</li>\r\n</ol>\r\n<p>- оказывать услуги от имени своего турагентства в соответствии с размещённым предложением по заявке;</p>\r\n<p>- не осуществлять деятельность, которая может препятствовать предоставлению услуг, работе соответствующих серверов или сетей, которые соединены с услугами, или нарушает порядок их предоставления.</p>\r\n<p><strong>ПОЛОЖЕНИЯ, ОБЩИЕ&nbsp; ДЛЯ&nbsp; ВСЕХ&nbsp; ПОЛЬЗОВАТЕЛЕЙ:</strong></p>\r\n<ol start="21">\r\n<li>ПОЛЬЗОВАТЕЛЬ признает и соглашается, что:</li>\r\n</ol>\r\n<p>- САЙТ может содержать гиперссылки, ведущие на другие сайты над которыми СОБСТВЕННИК САЙТА не имеет контроля и за содержание которых не отвечает;</p>\r\n<p>- СОБСТВЕННИК САЙТА не несет ответственность за убытки, которые ПОЛЬЗОВАТЕЛЬ может понести в результате доступа к другим сайтам и (или) ресурсам, в результате использования рекламы, продукта, иных материалов на таких сайтах и (или) ресурсах, посредством использования таких сайтов и (или) ресурсов, а также за убытки, которые ПОЛЬЗОВАТЕЛЬ может понести в результате общения/сотрудничества с менеджерами турагентств/продавцами туров либо с туристами/авторами заявок на туры;</p>\r\n<p>- ПОЛЬЗОВАТЕЛЬ получает через САЙТ рассылки рекламно-информационного характера (рассылки поступают в виде письма на электронный адрес).</p>\r\n<ol start="22">\r\n<li>ПОЛЬЗОВАТЕЛЬ соглашается не удалять, не скрывать, не изменять какие-либо знаки принадлежности прав (включая знаки авторских прав и товарные знаки), которые могут находиться или содержаться на САЙТЕ.</li>\r\n<li>ПОЛЬЗОВАТЕЛЬ признает и соглашается, что СОБСТВЕННИК САЙТА или третьи лица, размещающие на САЙТЕ информацию о своих сервисах, обладают всеми имущественными и неимущественными правами в отношении объектов интеллектуальной собственности вне зависимости от того, зарегистрированы такие права или нет, а также вне зависимости от юрисдикции, где такие права могут возникнуть. Указанные права не передаются и не отчуждаются ПОЛЬЗОВАТЕЛЮ.</li>\r\n<li>СОГЛАШЕНИЕ не предоставляет ПОЛЬЗОВАТЕЛЮ право на использование каких-либо фирменных наименований, товарных знаков, знаков обслуживания, логотипов, доменных имён, брендов или иных отличительных знаков СОБСТВЕННИКА САЙТА или третьих лиц, размещающих на САЙТЕ свою информацию.</li>\r\n<li>СОБСТВЕННИК САЙТА оставляет за собой право в любое время без предварительного уведомления ПОЛЬЗОВАТЕЛЕЙ изменять алгоритм работы САЙТА, набор оказываемых в его рамках услуг, <strong>стоимость размещения предложения по заявке на тур</strong> (актуальная стоимость размещения предложения по заявке на тур указана в форме, обслуживающей размещение предложения).</li>\r\n<li>СОБСТВЕННИК САЙТА имеет право в одностороннем порядке вносить изменения и дополнения в СОГЛАШЕНИЕ. Актуальная версия СОГЛАШЕНИЯ всегда находится на САЙТЕ. Факт приобретения ПОЛЬЗОВАТЕЛЕМ услуг/работ/товаров с помощью САЙТА после внесения изменений и дополнений в СОГЛАШЕНИЕ подтверждает принятие ПОЛЬЗОВАТЕЛЕМ новой редакции СОГЛАШЕНИЯ.</li>\r\n<li>СОБСТВЕННИК САЙТА доводит до сведения ПОЛЬЗОВАТЕЛЕЙ информацию посредством электронной почты и размещения информации на САЙТЕ.</li>\r\n<li>В случае нарушения приведенных в данном СОГЛАШЕНИИ правил СОБСТВЕННИК САЙТА оставляет за собой право применять все допустимые законодательством Республики Беларусь средства по отношению к нарушителям.</li>\r\n<li>По вопросам, прямо не урегулированным СОГЛАШЕНИЕМ, СТОРОНЫ руководствуются законодательством Республики Беларусь.</li>\r\n</ol>', '2017-08-27 07:30:04', '2017-08-26 06:14:52', 100),
(38, 'turistam-description', 'Текстовый блок под слоганом.', '', '2017-06-12 05:44:38', '2017-08-03 08:29:56', 35),
(39, 'turistam-slogan', 'Слоган', '<h2 style="text-align: center;"><span style="font-size: 24px;">Хотите найти тур по самой выгодной цене? </span><br /><span style="font-size: 24px;"><span style="color: #ff6600;">П</span>ортал <span style="color: #ff6600;">penki.by</span> сделает это за вас!</span><br /><span style="font-size: 24px;">Шаг 1: Бесплатно разместите заявку на тур и получите в её раздел "вкусные" предложения&nbsp;</span><br /><span style="font-size: 24px;">от конкурирующих друг с другом турагентств.</span><br /><span style="font-size: 24px;">Шаг 2: Свяжитесь с отправителем самого выгодного предложения и купите тур</span><br /><span style="font-size: 24px;">с наилучшим соотношением "цена/качество".</span><br /><span style="font-size: 24px;"><span style="color: #ff6600;">Снимите пенки</span> с бонусных программ турагентств!</span></h2>', '2017-06-16 21:26:20', '2017-09-17 04:31:58', 35),
(40, 'sent-email-message', 'Уведомление при размещении заявки', '<p>На ваш e-mail отправлено письмо с паролем и правилами обслуживания.</p>', '2017-07-01 05:36:44', '2017-07-17 19:18:13', 0),
(41, 'empty-offers', 'Текст вместо предложений', '<p>По вашей заявке пока нет предложений.</p>', '2017-07-06 04:42:29', '2017-08-03 08:29:49', 0),
(42, 'kontakty', 'Дежурный текст на стр. "КОНТАКТЫ".', '<p>&nbsp;</p>\r\n<p>&nbsp;Адрес для отправки писем с вопросами и предложениями по работе <span style="color: #ff6600;">П</span>ортала:&nbsp;<a href="mailto:info@penki.by">info@penki.by</a>&nbsp;</p>\r\n<p>&nbsp;</p>', '2017-08-26 07:18:18', '2017-08-23 13:35:36', 160),
(43, 'turagentam', 'Дежурный текст на стр. "ТУРАГЕНТАМ".', '<p style="text-align: center;"><span style="font-size: 24px;">Хотите продавать больше туров?</span><br /><span style="font-size: 24px;"><span style="color: #ff6600;">П</span>ортал <span style="color: #ff6600;">penki.by</span> предоставляет вам уникальную возможность</span><br /><span style="font-size: 24px;">разместить свои конкурентные предложения в личных разделах заявок реальных туристов.</span></p>\r\n<p style="text-align: left;"><strong>Чтобы продать тур с помощью <span style="color: #ff6600;">П</span>ортала <span style="color: #ff6600;">penki.by</span>:</strong></p>\r\n<ul>\r\n<li style="text-align: left;"><span style="font-size: 16px;">Шаг 1: Введите пароль и войдите в рабочий кабинет вашего турагентства.</span></li>\r\n<li style="text-align: left;"><span style="font-size: 16px;">Шаг 2: Перейдите к таблице заявок на туры, изучите предложения конкурентов по каждой заявке (если предложений пока нет - будьте первыми!).</span></li>\r\n<li><span style="font-size: 16px;">Шаг 3: </span><span style="font-size: 16px;">Разместите предложение, более выгодное, чем у конкурентов, и ожидайте звонок от автора заявки.</span></li>\r\n</ul>\r\n<p><span style="font-size: 16px;">&nbsp;<strong>Правила работы:</strong></span></p>\r\n<p>- сотрудничество менеджеров турагентств с <span style="color: #ff6600;">П</span>орталом осуществляется на основании/при условии соблюдения <a href="/files/penki.docx" target="_blank">пользовательского соглашения</a>;</p>\r\n<p>- просмотр чужих предложений по заявкам и размещение собственных предложений производится переходом из рабочего кабинета турагентства к таблице заявок на туры (контактные данные отправителей предложений видны только авторам заявок);</p>\r\n<p>- в предложении указывайте полную стоимость тура с учётом всех платежей за него,- как осуществляемых туристом при покупке тура, так и вносимых им в процессе отдыха за границей;</p>\r\n<p>- в случае не подтверждения туристом актуальности своей заявки она автоматически удалится через 7 дней после даты размещения.</p>\r\n<p><span style="font-size: 16px;"><strong>Советы от <span style="color: #ff6600;">П</span>ортала <span style="color: #ff6600;">penki.by</span>:</strong></span></p>\r\n<p><span style="font-size: 16px;">- размещайте предложения по одной и той же заявке повторно, делая их с каждый разом всё привлекательнее;</span></p>\r\n<p><span style="font-size: 16px;">- помните, что в тендере побеждает не цена, а соотношение цены тура и его качества:&nbsp;</span><span style="font-size: 16px;">размещайте предложения не только с турами меньшей стоимостью, но и с более качественными турами по ценам, несколько превышающим уже заявленные вашими конкурентами;</span></p>\r\n<p><span style="font-size: 16px;">- используйте <span style="color: #ff6600;">П</span>ортал в качестве "рекламной площадки": привлеките внимание большого количества туристов к своему турагентству за счёт временного снижения цен на туры, участвующие в тендерах;</span></p>\r\n<p><span style="font-size: 16px;">- будьте щедры к покупателям и активны - и вы добьётесь поставленной цели.</span></p>\r\n<p><span style="font-size: 16px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Удачных &nbsp;продаж!</span></p>', '2017-08-27 06:57:29', '2017-08-26 09:43:27', 110),
(44, 'turoperatoram', 'Дежурный текст на стр. "О портале".', '<p><strong>О технологии работы <span style="color: #ff6600;">П</span>ортала <span style="color: #ff6600;">penki.by</span>:</strong></p>\r\n<ul>\r\n<li>Туристы (как потенциальные покупатели туров) бесплатно размещают свои заявки на туры.</li>\r\n<li>Менеджеры турагентств (как потенциальные продавцы туров) размещают в разделах заявок туристов свои предложения, с каждым новым размещением делая их более привлекательными, чем у конкурентов.</li>\r\n<li>Туристы связываются с отправителями заинтересовавших их предложений и покупают туры.</li>\r\n</ul>\r\n<p><strong>Таким образом:</strong></p>\r\n<p>- <span style="color: #ff6600;">П</span>ортал предназначен для облегчения/ускорения поиска туров туристами и служит для турагентств дополнительным прямым каналом активных продаж.&nbsp;</p>\r\n<p>- <span style="color: #ff6600;">П</span>ортал позволяет туристам удобно, без особых затрат времени и сил, практически в режиме пассивного ожидания приобрести желаемые туры по лучшей цене.</p>\r\n<p>&nbsp;- В основу работы <span style="color: #ff6600;">П</span>ортала положен принцип честного тендера, абсолютно прозрачного для всех его участников.</p>\r\n<p>- В отличие от традиционного размещения затратных безадресных рекламных предложений, <span style="color: #ff6600;">П</span>ортал обеспечивает прямой выход менеджеров турагентств на потенциальных покупателей туров.</p>', '2017-07-06 04:00:26', '2017-08-26 19:21:04', 150),
(45, 'offer-gaide', 'Текстовый блок "Об ознакомлении".', '<p>Я ознакомлен(а) с&nbsp;<a href="/files/penki.docx" target="_blank">пользовательским соглашением</a>&nbsp;и обязуюсь выполнять оговоренные в нём условия.</p>\r\n<p>Мне известно, что стоимость размещения предложения составляет 0 бел.руб.</p>', '2017-08-27 06:58:04', '2017-08-26 05:22:39', 120),
(46, 'offer-contract', 'договор оферты', 'договор оферты', '2017-08-18 05:37:05', '2017-08-18 05:36:37', 130),
(47, 'touristam-cout-tourgents', 'Количество турагентств', '<p>247 минских турагентств имеют свои рабочие кабинеты на <span style="color: #ff6600;">П</span>ортале <span style="color: #ff6600;">penki.by</span></p>', '2017-09-11 04:29:48', '2017-09-23 14:11:01', 21),
(48, 'top-slogan', 'Текст В самом верху страницы', '<p><span style="font-size: 18px;"><span style="color: #ff6600;"><strong><span style="color: #000000;">●</span>&nbsp;</strong>П</span>ортал <span style="color: #ff6600;">penki.by</span> - онлайн-площадка, на которой каждый желающий выгодно купить тур может устроить свой персональный &laquo;тендер&raquo;.</span></p>\r\n<p><span style="font-size: 18px;"><strong>●&nbsp;</strong>Для этого надо всего лишь бесплатно разместить заявку на тур!</span></p>\r\n<p><span style="font-size: 18px;"><strong>●&nbsp;</strong>247 минских турагентств имеют на <span style="color: #ff6600;">П</span>ортале свои рабочие кабинеты, позволяющие им участвовать в конкурентном соперничестве &laquo;кто предложит лучшую цену тура&raquo;.</span></p>\r\n<p>&nbsp;</p>', '2017-09-15 05:14:30', '2017-09-24 08:20:36', 1);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD CONSTRAINT `FK_tbl_feedback_userId` FOREIGN KEY (`userId`) REFERENCES `tbl_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Ограничения внешнего ключа таблицы `tbl_offer`
--
ALTER TABLE `tbl_offer`
  ADD CONSTRAINT `FK_tbl_offer_touragentId` FOREIGN KEY (`touragentId`) REFERENCES `tbl_touragent` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tbl_touragent`
--
ALTER TABLE `tbl_touragent`
  ADD CONSTRAINT `tbl_touragent_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tbl_touragent_offer`
--
ALTER TABLE `tbl_touragent_offer`
  ADD CONSTRAINT `FK_tbl_touragent_offer_offerId` FOREIGN KEY (`offerId`) REFERENCES `tbl_offer` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_touragent_offer_touragentId` FOREIGN KEY (`touragentId`) REFERENCES `tbl_touragent` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
