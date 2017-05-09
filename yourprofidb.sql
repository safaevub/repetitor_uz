-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 05 2017 г., 16:05
-- Версия сервера: 5.6.31
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yourprofidb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `education`
--

CREATE TABLE IF NOT EXISTS `education` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_uz` varchar(255) DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `education`
--

INSERT INTO `education` (`id`, `name`, `name_uz`, `order_by`) VALUES
(1, 'Student', NULL, NULL),
(2, 'Graduate / Graduate Student', NULL, NULL),
(3, 'PhD', NULL, NULL),
(4, 'Native speaker', NULL, NULL),
(5, 'Ph.D', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `experience`
--

CREATE TABLE IF NOT EXISTS `experience` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_uz` varchar(255) DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `experience`
--

INSERT INTO `experience` (`id`, `name`, `name_uz`, `order_by`) VALUES
(1, 'Less experience', NULL, NULL),
(2, 'Average Experience', NULL, NULL),
(3, 'School teacher', NULL, NULL),
(4, 'Course Instructor', NULL, NULL),
(5, 'Serious experience', NULL, NULL),
(6, 'Professor of University', NULL, NULL),
(7, 'Tutor-expert', NULL, NULL),
(8, 'Professor', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_uz` varchar(255) DEFAULT NULL,
  `order_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `group`
--

INSERT INTO `group` (`id`, `name`, `name_uz`, `order_by`) VALUES
(3, 'ÐšÐ¸Ñ‚Ð°Ð¹ÑÐºÐ¸Ð¹ ÑÐ·Ñ‹Ðº', 'Ð¥Ð¸Ñ‚Ð¾Ð¹ Ñ‚Ð¸Ð»Ð¸', 10),
(4, 'ÐÐµÐ¼ÐµÑ†ÐºÐ¸Ð¹ ÑÐ·Ñ‹Ðº', 'ÐÐµÐ¼Ð¸Ñ Ñ‚Ð¸Ð»Ð¸', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `lesson`
--

CREATE TABLE IF NOT EXISTS `lesson` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `wordid` varchar(60) NOT NULL,
  `if_exam` tinyint(1) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_uz` varchar(255) DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lesson`
--

INSERT INTO `lesson` (`id`, `subject_id`, `wordid`, `if_exam`, `name`, `name_uz`, `order_by`) VALUES
(1, 1, 'general-english', 0, 'General English', NULL, NULL),
(2, 1, 'ielts', 1, 'IELTS', NULL, NULL),
(3, 1, 'toefl', 1, 'TOEFL', NULL, NULL),
(4, 1, 'sat', 1, 'SAT', '', 0),
(5, 1, 'english-for-kids', 0, 'Tutors English for kids', NULL, NULL),
(6, 1, 'english-for-enrollee', 0, 'English for school leavers', NULL, NULL),
(7, 1, 'english-literature', 0, 'English literature', NULL, NULL),
(8, 1, 'english-speaking', 0, 'Conversational English', NULL, NULL),
(9, 1, 'business-english', 0, 'Business English', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_uz` varchar(255) DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `location`
--

INSERT INTO `location` (`id`, `name`, `name_uz`, `order_by`) VALUES
(1, 'Tashkent', 'Tashkent', 10),
(2, 'Samarkand', 'Samarkand', 20),
(3, 'Fergana', 'Fergana', 30);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_bin NOT NULL,
  `phone` varchar(60) COLLATE utf8_bin NOT NULL,
  `email` varchar(60) COLLATE utf8_bin NOT NULL,
  `comment` text COLLATE utf8_bin NOT NULL,
  `order_date` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `email`, `comment`, `order_date`, `order_status`) VALUES
(1, 'Fazlik', '998 90 930 24 51', 'fazliddin@gmail.com', 'Testing order form', 1453618764, 1),
(3, 'Fazliddin', '+998935244334', 'fayz995@mail.ru', 'I need teacher from Biology.\r\n', 1493998607, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `order_tutors`
--

CREATE TABLE IF NOT EXISTS `order_tutors` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_uz` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `content_uz` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `parameter`
--

CREATE TABLE IF NOT EXISTS `parameter` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `parameter`
--

INSERT INTO `parameter` (`id`, `name`, `value`) VALUES
(1, 'login', 'admin'),
(2, 'password', 'dade6a7196d1202b685a7e97337b136f'),
(3, 'title', 'YourProfi.uz'),
(4, 'name', 'Администратор');

-- --------------------------------------------------------

--
-- Структура таблицы `price_group`
--

CREATE TABLE IF NOT EXISTS `price_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_uz` varchar(255) DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `price_group`
--

INSERT INTO `price_group` (`id`, `name`, `name_uz`, `order_by`) VALUES
(1, 'Minimum', NULL, NULL),
(2, 'Average', NULL, NULL),
(3, 'Above average', NULL, NULL),
(4, 'Maximum', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_uz` varchar(255) DEFAULT NULL,
  `location_id` int(11) NOT NULL,
  `order_by` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `region`
--

INSERT INTO `region` (`id`, `name`, `name_uz`, `location_id`, `order_by`) VALUES
(2, 'Bektemir district', 'Бектемир тумани', 1, 0),
(3, 'Mirzo Ulugbek district', 'Мирзо Улуғбек тумани', 1, 20),
(4, 'Mirobod district', 'Миробод тумани', 1, 30),
(5, 'Sergeli district', 'Сергели тумани', 1, 40),
(6, 'Olmazor district', 'Олмазор тумани', 1, 50),
(7, 'Kxamza district', 'Ҳамза тумани', 1, 60),
(8, 'Chilonzor district', 'Чилонзор тумани', 1, 70),
(9, 'Shaykxontokxur district', 'Шайхонтоҳур тумани', 1, 80),
(10, 'Yunusobod district', 'Юнусобод тумани', 1, 90),
(11, 'Uchtepa district', 'Учтепа тумани', 1, 100),
(12, 'Yakkasaroy district', 'Яккасарой тумани', 1, 110),
(13, 'Samarkand c', 'Самарқанд ш', 2, 120),
(14, 'East Fergana', 'Шарқий Фарғона', 3, 200);

-- --------------------------------------------------------

--
-- Структура таблицы `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `wordid` varchar(60) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_uz` varchar(255) DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subject`
--

INSERT INTO `subject` (`id`, `group_id`, `wordid`, `name`, `name_uz`, `order_by`) VALUES
(1, NULL, 'english', 'Английский язык', '', 0),
(2, NULL, 'biology', 'Биология', '', 20),
(3, NULL, 'accounting', 'Бухгалтерский Учет', '', 30),
(4, NULL, 'it', 'Информатика', '', 40),
(5, NULL, 'history', 'История', '', 50),
(6, NULL, 'italian', 'Итальянский язык', '', 50),
(7, NULL, 'chinese', 'Китайский Язык', '', 60),
(8, NULL, 'korean', 'Корейский язык', '', 70),
(9, NULL, 'logoped', 'Логопеды', '', 80),
(10, NULL, 'marketing', 'Маркетинг', '', 90),
(11, NULL, 'maths', 'Математика', '', 100),
(12, NULL, 'music', 'Музыка', '', 110),
(13, NULL, 'german', 'Немецкий язык', '', 120),
(14, NULL, 'school-prep', 'Подготовка к школе', '', 130),
(15, NULL, 'programming', 'Программирование', '', 140),
(16, NULL, 'psychology', 'Психология', '', 150),
(17, NULL, 'painting', 'Рисование', '', 160),
(18, NULL, 'russian', 'Русский язык', '', 170),
(19, NULL, 'turkish', 'Турецкий язык', '', 180),
(20, NULL, 'physics', 'Физика', '', 190),
(21, NULL, 'french', 'Французский язык', '', 200),
(22, NULL, 'chemistry', 'Химия', '', 210),
(23, NULL, 'drawing', 'Черчение', '', 220),
(24, NULL, 'chess', 'Шахматы', '', 230),
(25, NULL, 'economy', 'Экономика', '', 240),
(26, NULL, 'japanese', 'Японский язык', '', 250);

-- --------------------------------------------------------

--
-- Структура таблицы `teaching`
--

CREATE TABLE IF NOT EXISTS `teaching` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `lesson_id` int(11) DEFAULT NULL,
  `tutor_id` int(11) NOT NULL,
  `experience` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `price_group` int(4) DEFAULT NULL,
  `lesson_duration` varchar(15) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `teaching`
--

INSERT INTO `teaching` (`id`, `subject_id`, `lesson_id`, `tutor_id`, `experience`, `price`, `price_group`, `lesson_duration`) VALUES
(1, 1, 1, 6, 2, 50000, 1, '90'),
(6, 1, 2, 7, 3, 100000, 2, '90'),
(7, 2, NULL, 8, 5, 120000, 3, '90'),
(8, 12, NULL, 9, 7, 200000, 3, '120'),
(9, 1, 3, 6, 5, 100000, 3, '120'),
(10, 21, NULL, 6, 4, 90000, 2, '90');

-- --------------------------------------------------------

--
-- Структура таблицы `tutor`
--

CREATE TABLE IF NOT EXISTS `tutor` (
  `id` int(11) NOT NULL,
  `name` varchar(512) DEFAULT NULL,
  `gender` enum('FEMALE','MALE') DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `phone` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `location_id` int(11) NOT NULL,
  `living_region_id` int(11) DEFAULT NULL,
  `living_addr` varchar(255) DEFAULT NULL,
  `serving_dist` varchar(255) DEFAULT NULL,
  `edu_level` int(11) DEFAULT NULL,
  `to_home` enum('HOME','AWAY','BOTH') NOT NULL,
  `edu` text,
  `exp` text,
  `edu_uz` text,
  `exp_uz` text,
  `teach_lang` enum('RU','UZ','BOTH') DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tutor`
--

INSERT INTO `tutor` (`id`, `name`, `gender`, `image`, `phone`, `email`, `dob`, `location_id`, `living_region_id`, `living_addr`, `serving_dist`, `edu_level`, `to_home`, `edu`, `exp`, `edu_uz`, `exp_uz`, `teach_lang`) VALUES
(6, 'Popova Anna Borisovna', 'FEMALE', '56aca83f1ec33.jpg', '+998964589525', 'email@gmail.com', '1987-05-06', 1, 10, 'Yunusobod district, 5-quarter, house 5, apartment 56', NULL, 3, 'HOME', 'Tashkent Regional Pedagogical Institute, Faculty of Foreign Languages, specialty - teacher of English and German languages ​​(1977). ',' The experience of tutoring - since 1977.\r\nTeacher of the highest qualification category (2013). ', NULL, NULL, NULL),
(7, 'Kirilova Yekaterina Igorevna', 'FEMALE', '56aca91db9f90.jpg', '+9982482115', 'email@inbox.ru', '1995-09-23', 1, 5, 'Sergeli district, 9-quarter, house 4, apartment 12', '', 4, 'AWAY', 'Education: Tashkent Pedagogical University, Faculty of Romance and Germanic Philology, specialty - linguistics (French and English) (2008). ',' Teaching experience - half a year (in 2008).\r\nTutoring experience - since 2006. ', NULL, NULL, NULL),
(8, 'Popov Alexandr Alekseevich', 'MALE', '56aca9a295881.jpg', '+995447511558', 'olasdij@aaa.aa', '1992-07-09', 1, NULL, 'C-5, house 3, 9-quarter 9', NULL, 4, 'AWAY', 'Medical University, preparatory faculty, Russian language (2010-2011).\r\nSolar High School, Ceres (USA, 2007 г.).\r\nRidge High School, New Jersey (США, 2005-2006 гг.).\r\nAnglo-American Cultural Center, Spanish (2000-2004 yy.). ', 'Experience tutoring - since 2008. ', NULL, NULL, NULL),
(9, 'Grinberg Mikhail Markovich', 'MALE', '56acab74d4174.jpg', '+968465454', 'aspdof@aod.ap', '1978-12-22', 2, 13, 'Xojakent street, 34 house', NULL, 2, 'AWAY', 'Penza State Trade College, Lawyer.\r\nEducation: Penza State Pedagogical University, teacher of English and German languages ​​(1991). ',' Tutoring experience - since 2008. ', NULL, NULL, NULL),
(10, 'Fazliddin Anvarov Khabibullayevich', 'MALE', '56acab74d4174.jpg', '+998935244334', 'fayz995@mail.ru', '1995-06-11', 2, 13, 'Durmon yuli street, 34 house', NULL, 2, 'AWAY', 'Penza State Trade College, Lawyer.\r\nEducation: Inha University in Tashkent, teacher of English and Russian languages ​​(2015). ',' Tutoring experience - since 2015. ', NULL, NULL, NULL);


-- --------------------------------------------------------

--
-- Структура таблицы `tutor_doc`
--

CREATE TABLE IF NOT EXISTS `tutor_doc` (
  `id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_uz` varchar(255) DEFAULT NULL,
  `doc` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tutor_edu`
--

CREATE TABLE IF NOT EXISTS `tutor_edu` (
  `id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `vuz` varchar(255) DEFAULT NULL,
  `faculty` varchar(255) DEFAULT NULL,
  `graduated` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tutor_region`
--

CREATE TABLE IF NOT EXISTS `tutor_region` (
  `id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tutor_region`
--

INSERT INTO `tutor_region` (`id`, `tutor_id`, `region_id`) VALUES
(19, 3, 2),
(20, 3, 3),
(21, 3, 5),
(22, 3, 6),
(23, 3, 11),
(30, 1, 3),
(31, 1, 4),
(32, 4, 2),
(33, 4, 3),
(34, 4, 5),
(35, 4, 7),
(36, 4, 8),
(52, 5, 2),
(53, 5, 4),
(54, 5, 6),
(81, 7, 3),
(82, 7, 4),
(83, 7, 5),
(84, 7, 6),
(85, 7, 8),
(86, 8, 3),
(87, 8, 5),
(88, 8, 8),
(90, 9, 13),
(91, 6, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `tutor_review`
--

CREATE TABLE IF NOT EXISTS `tutor_review` (
  `id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_by` (`order_by`);

--
-- Индексы таблицы `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Индексы таблицы `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_tutors`
--
ALTER TABLE `order_tutors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `price_group`
--
ALTER TABLE `price_group`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location_id` (`location_id`);

--
-- Индексы таблицы `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Индексы таблицы `teaching`
--
ALTER TABLE `teaching`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lesson_id` (`lesson_id`),
  ADD KEY `tutor_id` (`tutor_id`);

--
-- Индексы таблицы `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location_id` (`location_id`);

--
-- Индексы таблицы `tutor_doc`
--
ALTER TABLE `tutor_doc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutor_id` (`tutor_id`);

--
-- Индексы таблицы `tutor_edu`
--
ALTER TABLE `tutor_edu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutor_id` (`tutor_id`);

--
-- Индексы таблицы `tutor_region`
--
ALTER TABLE `tutor_region`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutor_region_fk1` (`region_id`);

--
-- Индексы таблицы `tutor_review`
--
ALTER TABLE `tutor_review`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `order_tutors`
--
ALTER TABLE `order_tutors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `parameter`
--
ALTER TABLE `parameter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `price_group`
--
ALTER TABLE `price_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT для таблицы `teaching`
--
ALTER TABLE `teaching`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `tutor`
--
ALTER TABLE `tutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `tutor_doc`
--
ALTER TABLE `tutor_doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tutor_edu`
--
ALTER TABLE `tutor_edu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tutor_region`
--
ALTER TABLE `tutor_region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT для таблицы `tutor_review`
--
ALTER TABLE `tutor_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `fk_location_id` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `teaching`
--
ALTER TABLE `teaching`
  ADD CONSTRAINT `teaching_fk2` FOREIGN KEY (`tutor_id`) REFERENCES `tutor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tutor`
--
ALTER TABLE `tutor`
  ADD CONSTRAINT `tutor_fk` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tutor_doc`
--
ALTER TABLE `tutor_doc`
  ADD CONSTRAINT `tutor_doc_fk` FOREIGN KEY (`tutor_id`) REFERENCES `tutor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tutor_edu`
--
ALTER TABLE `tutor_edu`
  ADD CONSTRAINT `tutor_edu_fk` FOREIGN KEY (`tutor_id`) REFERENCES `tutor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tutor_region`
--
ALTER TABLE `tutor_region`
  ADD CONSTRAINT `tutor_region_fk1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
